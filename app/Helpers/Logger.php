<?php

namespace CS\Helpers;

use CS\Constants\LoggerConstants;
use Exception;
use InvalidArgumentException;

/**
 * Helper to write messages or exceptions to proper files
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @version 1.0
 */
class Logger
{
    /**
     * Writes message to log file which name depends on current date.
     * @param string $message
     */
    public static function writeLog($message)
    {
        $path = LoggerConstants::$filesPath . date("Y-m-d") . LoggerConstants::$filesExtension;

        file_put_contents(
            $path, 
            Logger::formatMessage($message), 
            LoggerConstants::$filesWriteMode
        );
    }

    /**
     * Writes message to log file which name depends on current date.
     * @param string $message
     * @throws InvalidArgumentException
     */
    public static function writeErrorMessage(string $message)
    {
        if (is_int($message) || is_float($message))
        {
            $message = strval($message);
        }

        if (is_string($message))
        {
            file_put_contents(
                LoggerConstants::getErrorsLogFileFullPath(),
                Logger::formatMessage($message),
                LoggerConstants::$filesWriteMode
            );
        }
        else throw new InvalidArgumentException('WriteErrorMessage($message) argument must be a string, integer or float object type!');
    }

    public static function writeException(Exception $exception)
    {
        $string_builder = new StringBuilder();

        $line = sprintf(
            "Exception of type '%s' coded '%d' was thrown:", 
            get_class($exception),
            $exception->getMessage(),
            $exception->getCode()
        );
        $string_builder->addLine($line);

        $trace = $exception->getTrace();
        foreach($trace as $key => $value)
        {
            $line = sprintf("\t#%d at %s(%d): %s%s%s", 
                $key, 
                $value["file"], 
                $value["line"], 
                isset($value["class"]) ? $value["class"] : "", 
                isset($value["type"]) ? $value["type"] : "", 
                isset($value["function"]) ? $value["function"] : "", 
                isset($value["args"]) ? " with args " . json_encode($value["args"]) : ""
            );
            $string_builder->addLine($line);
        }

        $line = sprintf("\t#%d at %s(%d) with message '%s'", count($trace), $exception->getFile(), $exception->getLine(), $exception->getMessage());
        $string_builder->addLine($line);

        file_put_contents(
            LoggerConstants::$filesPath . "errors.log",
            Logger::formatMessage($string_builder->toString()),
            LoggerConstants::$filesWriteMode
        );
    }

    private static function formatMessage($message)
    {
        $prefix = "[" . date("Y-m-d H:i:s") . "] ";
        return $prefix . $message . PHP_EOL;
    }
}