<?php

namespace CS\Core;

use CS\Helpers\Logger;

/**
 * Translates received URL into controller, controllers method and parameters fot that method.
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @var $controller selected controller
 * @var $method selected controllers method
 * @var $params selected controller method parameters
 */
class Router
{
    protected static $controller = "HomeController";
    protected static $method = "index";
    protected static $params = [];

    /**
     * Get controller, method and parameters from url and calls proper function
     * @param string $url url passed in address bar
     */
    public static function route($url)
    {
        $parsed_url = self::parseUrl($url);

        $controller_found = self::setController($parsed_url);
        if ($controller_found)
        {
            self::setControllersMethod($parsed_url);
            self::setMethodParameters($parsed_url);
        }

        call_user_func_array([self::$controller, self::$method], self::$params);
    }

    /**
     * @param string $url url passed in address bar 
     * @return array splited url (controller/method/params)
     */
    private static function parseUrl($url)
    {
        if (!isset($url) || empty($url))
        {
            return [];
        }
        else
        {
            return explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL));
        }
    }

    /**
     * Searches for controller, if not found then redirects to error controller
     * @param array $url string array with controller name in first element
     * @return bool true if controller file found, otherwise returns false
     */
    private static function setController(&$url)
    {
        $found = false;

        if (isset($url[0]) && !empty($url[0]))
        {
            $controller = ucfirst(strtolower($url[0])) . "Controller";

            if ($found = file_exists("../app/Controllers/$controller.php"))
            {
                self::$controller = $controller;
            }

            unset($url[0]);
        }

        self::$controller = "CS\\Controllers\\" . self::$controller;
        self::$controller = new self::$controller();

        return $found;
    }

    /**
     * Searches for controllers method
     * @param array $url string array with controllers method name in second element
     */
    private static function setControllersMethod(&$url)
    {
        if (isset($url[1]))
        {
            if (method_exists(self::$controller, $url[1]))
            {
                self::$method = $url[1];
            }
            else
            {
                $message = sprintf("No such method [%s] in [%s] controller!", $url[1], get_class(self::$controller));
                Logger::writeLog($message);                
            }

            unset($url[1]);
        }
    }

    /**
     * Parses controller method parameters
     * @param array $url string array with controllers method parameters in third and further elements
     */
    private static function setMethodParameters(&$url)
    {
        self::$params = $url ? array_values($url) : [];
    }
}