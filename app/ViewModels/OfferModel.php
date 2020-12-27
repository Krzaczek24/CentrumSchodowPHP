<?php

namespace CS\ViewModels;

use CS\Enums\OfferGalleryMode;
use CS\Models\Frontend\Gallery\GalleryElementModel;
use CS\Models\Frontend\SlideInLabel\LabelModel;

class OfferModel
{
    private LabelModel $pageHeader;
    private array $textParagraphs;
    private array $gallery;
    private string $galleryMode;

    /**
     * @param OfferGalleryMode $galleryMode is that side by side or tiles gallery
     */
    public function __construct(string $galleryMode = OfferGalleryMode::SideBySide)
    {
        $this->pageHeader = new LabelModel();
        $this->textParagraphs = [];
        $this->gallery = [];
        $this->galleryMode = $galleryMode;
    }

    /**
     * @return LabelModel
     */
    public function getPageHeader()
    {
        return $this->pageHeader;
    }

    /**
     * @return OfferDetailsSegmentModel[]
     */
    public function getTextParagraphs()
    {
        return $this->textParagraphs;
    }

    /**
     * @return GalleryElementModel[]
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @return OfferGalleryMode
     */
    public function getGalleryMode()
    {
        return $this->galleryMode;
    }

    /** 
     * @param OfferDetailsSegmentModel[] $textParagraphs 
     */
    public function setTextParagraphs(array $textParagraphs)
    {
        $this->textParagraphs = $textParagraphs;
    }

    /** 
     * @param GalleryElementModel[] $galleryElements 
     */
    public function setGallery(array $galleryElements)
    {
        $this->gallery = $galleryElements;
    }

    /** 
     * @param GalleryElementModel $galleryElement
     */
    public function addGalleryElement(GalleryElementModel $galleryElement)
    {
        array_push($this->gallery, $galleryElement);
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