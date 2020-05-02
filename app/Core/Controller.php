<?php

namespace CS\Core;

use CS\Helpers\Logger;
use CS\Helpers\UUIDGenerator;
use DateTime;

session_start();
$ipAddress = getenv('REMOTE_ADDR');
if(isset($_SESSION['ID']))
{
    $_SESSION['LAST_UPDATE'] = new DateTime();
    $log_message = "Session [" . $_SESSION['ID'] . "] from ip [$ipAddress] started at [" . $_SESSION['STARTED_AT']->format('Y-m-d H:i:s') . "] time elapsed [" . $_SESSION['LAST_UPDATE']->diff($_SESSION['STARTED_AT'])->format('%H:%I:%S') . "]";
}
else
{
    $_SESSION['ID'] = UUIDGenerator::getUUIDv4();
    $_SESSION['STARTED_AT'] = new DateTime();
    $_SESSION['LAST_UPDATE'] = new DateTime();
    $_SESSION['IP_ADDRESS'] = getenv('REMOTE_ADDR');
    $log_message = "New session started [" . $_SESSION['ID'] . "] from ip [" . $_SESSION['IP_ADDRESS'] . "]";
}

Logger::writeLog($log_message);

/**
 * Base controller class
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
abstract class Controller
{
    /**
     * @param string $model model name
     * @return object view model object
     * @todo try to get name of derived class and set view name without passing an argument
     */
    public function model($model)
    {
        $model_class = "CS\\ViewModels\\$model";
        return new $model_class();
    }

    /**
     * @param string $view path to view file
     * @param object $model view model object
     * @param array $data array of additional parameters
     * @todo try to get name of derived class and set view and view model names without passing an arguments
     */
    public function view($view, $model, $data=[])
    {
        require_once("../app/Views/$view.php");
    }
}