<?php

namespace CS\Models\Frontend\TileWithMultiText;

use Exception;

/**
 * Contains tile image url, title and subtiles to generate ready HTML node
 */
class TileModel
{
    private $imageUrl;
    private $mainTitle;
    private $subTiles;

    /**
     * @param String $imageUrl image which will be shown on left side
     * @param LabelModel $mainTitle
     * @param SubTileModel[] $subTiles small tiles
     */
    public function __construct($imageUrl = "", $mainTitle = null, $subTiles = null)
    {
        if (count($subTiles) > 4)
        {
            throw new Exception("This model can hold maximum 4 subtiles!");
            return;
        }

        $this->imageUrl = $imageUrl;
        $this->mainTitle = $mainTitle;
        $this->subTiles = $subTiles == null ? [] : $subTiles;
    }

    /**
     * @param String $url
     */
    public function setImageUrl($url)
    {
        $this->imageUrl = $url;
    }

    /**
     * @return String
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param LabelModel $mainTitle
     */
    public function setMainTitle($mainTitle)
    {
        $this->mainTitle = $mainTitle;
    }

    /**
     * @return LabelModel
     */
    public function getMainTitle()
    {
        return $this->mainTitle;
    }

    /**
     * @param SubTileModel $subTile
     */
    public function addSubTile($subTile)
    {
        if (count($this->subTiles) >= 4)
        {
            throw new Exception("This model can hold maximum 4 subtiles!");
            return;
        }
        
        array_push($this->subTiles, $subTile);
    }

    /**
     * @return SubTileModel[]
     */
    public function getSubTiles()
    {
        return $this->subTiles;
    }

    /**
     * @param DOMDocument $dom
     * @return \DOMNode
     */
    public function getDomElement($dom)
    {
        $tile = $dom->createElement('div');
        $tile->setAttribute('class', 'tile-with-multi-text-main-container');

        // LEFT SIDE
        $imageContainer = $dom->createElement('div');
        $imageContainer->setAttribute('class', 'tile-with-multi-text-image-container');

        $image = $dom->createElement('img');
        $image->setAttribute('src', $this->imageUrl);

        $imageContainer->appendChild($image);

        // RIGTH SIDE
        $textContainer = $dom->createElement('div');
        $textContainer->setAttribute('class', 'tile-with-multi-text-text-container');
        $textContainer->appendChild($this->mainTitle->getDomElement($dom));

        $subTileIndex = 0;
        $subTiles = $dom->createElement('table');

        $firstRow = $dom->createElement('tr');

        $firstRowFirstCell = $dom->createElement('td');
        $firstRowFirstCell->appendChild($this->subTiles[$subTileIndex++]->getDomElement($dom));

        $firstRow->appendChild($firstRowFirstCell);

        $firstRowSecondCell = $dom->createElement('td');
        $firstRowSecondCell->appendChild($this->subTiles[$subTileIndex++]->getDomElement($dom));

        $firstRow->appendChild($firstRowSecondCell);

        $subTiles->appendChild($firstRow);

        $secondRow = $dom->createElement('tr');

        $secondRowFirstCell = $dom->createElement('td');
        $secondRowFirstCell->appendChild($this->subTiles[$subTileIndex++]->getDomElement($dom));

        $secondRow->appendChild($secondRowFirstCell);

        $secondRowSecondCell = $dom->createElement('td');
        $secondRowSecondCell->appendChild($this->subTiles[$subTileIndex++]->getDomElement($dom));

        $secondRow->appendChild($secondRowSecondCell);

        $subTiles->appendChild($secondRow);

        $subTiles->appendChild($firstRow);
        $subTiles->appendChild($secondRow);

        $textContainer->appendChild($subTiles);

        // MERGING
        $tile->appendChild($imageContainer);
        $tile->appendChild($textContainer);

        return $tile;
    }
}