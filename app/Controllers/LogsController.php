<?php

namespace CS\Controllers;

use CS\Constants\LoggerConstants;
use CS\Core\Controller;
use CS\Core\Response;
use CS\Enums\FileOperationResults;
use Exception;

/**
 * Logs page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class LogsController extends Controller
{
    /**
     * @param string $date day for which log will be loaded (yyyy-mm-dd)
     */
    public function index($date = "")
    {
        $this->view("logs/index", $this->getFreshLogs($date));
    }

    /**
     * Returns content of log files
     */
    private function getFreshLogs($date)
    {
        if ($date == "")
        {
            $date = date("Y-m-d");
        }

        $model = $this->model("LogsModel");

        $errors_path = LoggerConstants::$filesPath . LoggerConstants::$errorFileName . LoggerConstants::$filesExtension;
        $logs_path = LoggerConstants::$filesPath . $date . LoggerConstants::$filesExtension;

        if(file_exists($errors_path))
        {
            $model->errors = array_reverse(explode(PHP_EOL, file_get_contents($errors_path)));
        }
        
        if(file_exists($logs_path))
        {
            $model->dayLogs = array_reverse(explode(PHP_EOL, file_get_contents($logs_path)));
        }

        return $model;
    }

    /**
     * Returns new logs every javascript interval call
     */
    public function refresh($date = "")
    {
        $response = new Response();
        $response->body = $this->getFreshLogs($date);
        $response->send();
    }

    /**
     * Handles actions
     */
    public function action()
    {
        $required_data = ['used_button'];

        foreach($required_data as $data)
        {
            if(!isset($_POST[$data]))
            {
                throw new Exception("Required argument not found: [$data]!");
            }
        }

        $response = new Response();
        $response->body = new class {
            public $resultMessage;
        };

        switch($_POST['used_button'])
        {
            case "clear":                
                $response->body->resultMessage = $this->clearLogs();
                break;
            default:
                break;
        }

        $response->send();
    }

    private function clearLogs()
    {
        $errorsLogFile = LoggerConstants::getErrorsLogFileFullPath();
        if(file_exists($errorsLogFile))
        {
            try
            {
                unlink($errorsLogFile);
                $result = FileOperationResults::SuccessfullyRemoved;
            }
            catch (Exception $ex)
            {
                $result = FileOperationResults::CannotBeRemoved;
            }
        }
        else
        {
            $result = FileOperationResults::DoesNotExists;
        }

        return $result;
    }
}