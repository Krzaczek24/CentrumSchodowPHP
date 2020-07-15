<?php

namespace CS\Controllers;

use CS\Core\Controller;

/**
 * Offer page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class OfferController extends Controller
{
    public function index()
    {
        $model = $this->model("OfferModels\\OfferModel");

        $this->view("Offer/index", $model, []);
    }

    public function wood()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/wood", $model, []);
    }
}