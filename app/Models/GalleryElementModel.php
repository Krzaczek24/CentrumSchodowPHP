<?php

namespace CS\Models;

class GalleryElementModel
{
    private $imagePath;
    private $title;
    private $description;

    /**
     * Comment here
     * @param string $imagePath
     * @param string $title
     * @param string $description
     */
    public function __construct($imagePath, $title, $description)
    {
        $this->imagePath = $imagePath;
        $this->title = $title;
        $this->description = $description;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }
}