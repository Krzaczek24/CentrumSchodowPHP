<?php

namespace CS\Constants;

/**
 * Contains constant variables for Logger helper
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class LoggerConstants
{
    public static $filesPath = __DIR__ . "/../../logs/";
    public static $filesWriteMode = FILE_APPEND;
    public static $filesExtension = ".log";
    public static $errorFileName = "errors";

    /**
     * @return string full path to error log file
     */
    public static function getErrorsLogFileFullPath()
    {
        return 
            LoggerConstants::$filesPath . 
            LoggerConstants::$errorFileName .
            LoggerConstants::$filesExtension;
    }
}