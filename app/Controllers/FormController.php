<?php

namespace CS\Controllers;

use CS\Core\Controller;
use CS\Models\Database\TestDbModel;
use Exception;

/**
 * Form page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class FormController extends Controller
{
    public function index()
    {
        $model = $this->model("FormModel");

        $this->view("Form/index", $model, []);
    }
}