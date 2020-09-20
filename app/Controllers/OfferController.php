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

    public function balustrades()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/balustrades", $model, []);
    }

    public function carpet()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/carpet", $model, []);
    }

    public function concrete()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/concrete", $model, []);
    }

    public function outdoor()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/outdoor", $model, []);
    }
    
    public function shelf()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/shelf", $model, []);
    }

    public function small()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/small", $model, []);
    }

    public function spiral()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/spiral", $model, []);
    }

    public function wood()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/wood", $model, []);
    }

    public function woodsteel()
    {
        $model = $this->model("OfferModels\\SubofferModel");

        $this->view("Offer/wood-steel", $model, []);
    }
}