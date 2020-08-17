<?php

namespace CS\Models\Frontend\TileWithMultiText;

use DOMDocument;

/**
 * Contains lines to display in tile with multi text and generates ready HTML node
 */
class LabelModel
{
    private $lines;

    public function __construct()
    {
        $this->lines = [];
    }

    /**
     * @param LabelLineModel $line a LabelLineModel object
     */
    public function addReadyLine($line)
    {
        array_push($this->lines, $line);
    }

    /**
     * @param String $normal text which will be shown without bold
     * @param String $bold text which will be bolded
     */
    public function addLine($normal = "", $bold = "")
    {
        array_push($this->lines, new LabelLineModel($normal, $bold));
    }

    /**
     * @param DOMDocument $dom
     * @return \DOMNode
     */
    public function getDomElement($dom)
    {
        $main = $dom->createElement('div');
        $main->setAttribute('class', 'tile-with-multi-text-title-container');

        foreach ($this->lines as $line)
        {
            $main->appendChild($line->getHTMLedLabelLine($dom));
        }

        $underline = $dom->createElement('div');
        $underline->setAttribute('class', 'underline');

        $main->appendChild($underline);

        return $main;
    }
}

/**
 * Contains tile with multi text lines sentences and generates ready HTML node
 */
class LabelLineModel
{
    private $normal;
    private $bold;

    /**
     * @param String $normal text which will be shown without bold
     * @param String $bold text which will be bolded
     */
    public function __construct($normal = "", $bold = "")
    {
        $this->normal = $normal;
        $this->bold = $bold;
    }

    /**
     * @param String $sentence
     */
    public function setNormalSentence($sentence)
    {
        $this->normal = $sentence;
    }

    /**
     * @param String $sentence
     */
    public function setBoldSentence($sentence)
    {
        $this->bold = $sentence;
    }

    /**
     * @return DOMElement ready HTML node for SlideInLabel
     */
    public function getHTMLedLabelLine($dom)
    {
        $normal = $dom->createElement('span', $this->normal);
        $normal->setAttribute('class', 'tile-with-multi-text-title-normal');

        $bold = $dom->createElement('span', $this->bold);
        $bold->setAttribute('class', 'tile-with-multi-text-title-bold');

        $line = $dom->createElement('div');
        $line->setAttribute('class', 'tile-with-multi-text-title-line');
        $line->appendChild($normal);
        $line->appendChild($bold);

        return $line;
    }
}