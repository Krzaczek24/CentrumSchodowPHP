<?php

namespace CS\Core;

/**
 * Used to return data for post request that comes from frontend
 * @var $header constant structure for every response
 * @var $body allows to return data with dynamic structure 
 * e.g. response->body = new class { public $variable; ... }
 * response->body->variable = ...
 */
class Response
{
    public $header;
    public $body;  

    public function __construct()
    {
        $this->header = new Header();
    }

    /**
     * Encodes response to JSON and transfers it to frontend
     */
    public function send()
    {
        echo json_encode($this);
    }
}

class Header
{
    public $success;
    public $message;
    public $request;

    public function __construct()
    {
        $this->success = true;
        $this->message = "";
        $this->request = $_POST;
    }
}