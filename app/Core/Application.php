<?php

namespace CS\Core;

use CS\Helpers\Logger;
use Exception;

class ControllerNotFoundException extends Exception {}
class ControllersMethodNotFoundException extends Exception {}

/**
 * Main app
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @version 1.0
 */
class Application
{
    public function __construct()
    {
        $this->_unregister_globals();

        try
        {    
            Router::route($_GET['url']);
        }
        catch (Exception $ex)
        {
            Logger::writeException($ex);
            throw $ex;
        }
    }

    private function _unregister_globals()
    {
        if(ini_get('register_globals'))
        {
            $globalsArray = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_ENV', '_FILES'];

            foreach($globalsArray as $global)
            {
                foreach($GLOBALS[$global] as $key => $value)
                {
                    if($GLOBALS[$key] === $value)
                    {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}