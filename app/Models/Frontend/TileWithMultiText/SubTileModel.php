<?php

namespace CS\Models\Frontend\TileWithMultiText;

/**
 * Contains subtile image url, title and text to generate ready HTML node
 */
class SubTileModel
{
    private $imageUrl;
    private $mainTitle;
    private $text;

    /**
     * @param String $imageUrl image which will be shown on left side
     * @param String $mainTitle
     * @param String $text
     */
    public function __construct($imageUrl = "", $mainTitle = "", $text = "")
    {
        $this->imageUrl = $imageUrl;
        $this->mainTitle = $mainTitle;
        $this->text = $text;
    }

    /**
     * @param String $url
     */
    public function setImageUrl($url)
    {
        $this->imageUrl = $url;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param String $mainTitle
     */
    public function setMainTitle($mainTitle)
    {
        $this->mainTitle = $mainTitle;
    }

    public function getMainTitle()
    {
        return $this->mainTitle;
    }

    /**
     * @param String $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    /**
     * @param DOMDocument $dom
     * @return \DOMNode
     */
    public function getDomElement($dom)
    {
        $subtile = $dom->createElement('div');
        $subtile->setAttribute('class', 'tile-with-multi-text-subtile');

        // LEFT SIDE
        $imageContainer = $dom->createElement('div');
        $imageContainer->setAttribute('class', 'tile-with-multi-text-subtile-image');
        
        $image = $dom->createElement('img');
        $image->setAttribute('src', $this->getImageUrl());
        $image->setAttribute('width', '48px');
        $image->setAttribute('height', '48px');

        $imageContainer->appendChild($image);

        // RIGHT SIDE
        $textContainer = $dom->createElement('div');
        $textContainer->setAttribute('class', 'tile-with-multi-text-subtile-text');
        
        $title = $dom->createElement('span', $this->mainTitle);
        $text = $dom->createElement('span', $this->text);

        $textContainer->appendChild($title);
        $textContainer->appendChild($dom->createElement('br'));
        $textContainer->appendChild($text);

        // MERGING
        $subtile->appendChild($imageContainer);
        $subtile->appendChild($textContainer);

        return $subtile;
    }
}