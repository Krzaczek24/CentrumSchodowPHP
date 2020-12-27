<?php

namespace CS\ViewModels;

use CS\Models\Frontend\SlideInLabel\LabelModel;

class OfferCategoryModel
{
    public LabelModel $header;
    public array $tiles = [];
}