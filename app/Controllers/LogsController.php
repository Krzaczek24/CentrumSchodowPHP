<?php

namespace CS\Controllers;

use CS\Constants\LoggerConstants;
use CS\Core\Controller;
use Exception;

/**
 * Logs page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @version 1.0
 * @since 1.0 Shows all errors and logs for selected day
 */
class LogsController extends Controller
{
    /**
     * @param string $date day for which log will be loaded (yyyy-mm-dd)
     */
    public function index($date = "")
    {
        if ($date == "")
        {
            $date = date("Y-m-d");
        }

        $errors_path = LoggerConstants::$filesPath . "errors" . LoggerConstants::$filesExtension;
        $logs_path = LoggerConstants::$filesPath . $date . LoggerConstants::$filesExtension;

        $model = $this->model("LogsModel");

        if(file_exists($errors_path))
        {
            $model->errors = explode(PHP_EOL, file_get_contents($errors_path));
        }
        
        if(file_exists($logs_path))
        {
            $model->dayLogs = explode(PHP_EOL, file_get_contents($logs_path));
        }

        $this->view("logs/index", $model);
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

        switch($_POST['used_button'])
        {
            case "clear":
                $this->clearLogs();
                $this->index();
                break;
            default:
                break;
        }
    }

    private function clearLogs()
    {
        $result = "";

        $errorsLogFile = LoggerConstants::getErrorsLogFileFullPath();
        if(file_exists($errorsLogFile))
        {
            try
            {
                unlink($errorsLogFile);
                $result = "file_successfully_removed";
            }
            catch (Exception $ex)
            {
                $result = "file_removal_failed";
            }
        }
        else
        {
            $result = "file_not_exists";
        }

        return $result;
    }
}