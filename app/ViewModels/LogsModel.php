<?php

namespace CS\ViewModels;

class LogsModel
{
    public $errors;
    public $dayLogs;

    public function __construct()
    {
        $this->errors = [];
        $this->dayLogs = [];
    }
}