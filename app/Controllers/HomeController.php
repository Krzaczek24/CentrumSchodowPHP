<?php

namespace CS\Controllers;

use CS\Core\Controller;
use CS\Models\Database\TestDbModel;
use Exception;

/**
 * Home page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * 
     */
    public function index($name = "alex", $mood = "happy")
    {
        $tekst = TestDbModel::all();

        $tekst2 = TestDbModel::where('id', 3)->first();

        $model = $this->model("HomeModel");
        $model->something = isset($tekst2["tekst"]) ? $tekst2["tekst"] : null;

        foreach($tekst as $lol)
        {
            $terere = $lol->tekst;
        }

        $this->view("Home/index", $model, [
            "text" => $name
        ]);
    }

    /**
     * 
     */
    public function createTest($id, $tekst)
    {
        TestDbModel::add($id, $tekst);
    }

    /**
     * 
     */
    public function killSession()
    {
        session_destroy();
    }
}