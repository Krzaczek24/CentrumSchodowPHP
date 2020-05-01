<?php

namespace CS\Controllers;

use CS\Core\Controller;

/**
 * Errors page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class ErrorController extends Controller
{
    /**
     * @param integer $code html error code
     * @param array $parameters additional data
     */
    public function index($code = 400, $parameters = [])
    {
        

        $this->view("Error/index", [
            "code" => $code,
            "parameters" => $parameters
        ]);
    }
}