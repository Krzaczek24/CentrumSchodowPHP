<?php

namespace CS\ViewModels;

use CS\Models\Frontend\SlideInLabel\LabelModel;

class OfferDetailsModel
{
    private LabelModel $header;
    private array $segments;

    public function __construct()
    {
        $this->header = new LabelModel();
        $this->segments = [];
    }

    /**
     * @return LabelModel
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return OfferDetailsSegmentModel[]
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /** 
     * @param OfferDetailsSegmentModel[] $paragraphs 
     */
    public function setSegments(array $segments)
    {
        $this->segments = $segments;
    }
}

class OfferDetailsSegmentModel
{
    private string $header;
    private array $paragraphs;

    /**
     * @param string $header 
     * @param string[] $paragraphs 
     */
    public function __construct($header, $paragraphs)
    {
        $this->header = $header;

        if ($paragraphs === null)
            $this->paragraphs = [];
        else
            $this->paragraphs = $paragraphs;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getParagraphs()
    {
        return $this->paragraphs;
    }
}