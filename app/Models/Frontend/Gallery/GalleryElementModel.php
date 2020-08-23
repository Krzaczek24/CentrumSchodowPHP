<?php

namespace CS\Models\Frontend\Gallery;

class GalleryElementModel
{
    private $imagePath;
    private $title;
    private $description;
    private $url;

    /**
     * Comment here
     * @param string $imagePath
     * @param string $title
     * @param string $description
     * @param string $url
     */
    public function __construct($imagePath, $title = null, $description = null, $url = null)
    {
        $this->imagePath = $imagePath;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
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

    public function getUrl()
    {
        return $this->url;
    }
}