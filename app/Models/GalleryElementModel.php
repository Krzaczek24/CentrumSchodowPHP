<?php

namespace CS\Models;

class GalleryElementModel
{
    private $imagePath;
    private $description;

    /**
     * Comment here
     * @param string $imagePath
     * @param object $description
     */
    public function __construct($imagePath, $description)
    {
        $this->imagePath = $imagePath;
        $this->description = $description;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getDescription()
    {
        return $this->description;
    }
}