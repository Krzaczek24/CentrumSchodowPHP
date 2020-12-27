<?php

namespace CS\Models\Frontend\SlideInLabel;

use DOMDocument;

/**
 * Contains lines to display in sliding in label and generates ready HTML node
 */
class LabelModel
{
    /** @var LabelLineModel[] $lines */
    private array $lines;
    private array $description;
    private bool $upperCasedDescription;
    private bool $slideInFromRight;

    public function __construct(bool $slideInFromRight = false)
    {
        $this->lines = [];
        $this->description = [];
        $this->slideInFromRight = $slideInFromRight;
    }

    /**
     * Makes label slide in from right side
     */
    public function setSlideInFromRight()
    {
        $this->slideInFromRight = true;
    }

    /**
     * Makes label slide in from left side
     */
    public function setSlideInFromLeft()
    {
        $this->slideInFromRight = false;
    }

    /**
     * @param LabelLineModel $line a LabelLineModel object
     */
    public function addReadyLine(LabelLineModel $line)
    {
        array_push($this->lines, $line);
    }

    /**
     * @param String $normal text which will be shown without bold
     * @param String $bold text which will be bolded
     */
    public function addLine(string $normal = "", string $bold = "")
    {
        array_push($this->lines, new LabelLineModel($normal, $bold));
    }

    /**
     * @param String[] $paragraphs text which will be shown below line
     */
    public function setDescription(array $paragraphs, bool $upperCased = false)
    {
        $this->description = $paragraphs;
        $this->upperCasedDescription = $upperCased;
    }

    /**
     * @return String ready HTML node render as SlideInLabel
     */
    public function getHTMLedLabel()
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $dom->appendChild($this->getDomElement($dom));
        return $dom->saveHTML();
    }

    /**
     * @param DOMDocument $dom
     * @return \DOMNode
     */
    public function getDomElement(DOMDocument $dom)
    {
        $main = $dom->createElement('div');
        $main->setAttribute('class', 'slide-in-label-main-container');
        $main->setAttribute('data-shown', 'false');

        $sideClass = ' slide-in-label-' . ($this->slideInFromRight ? 'right' : 'left');

        foreach ($this->lines as $line)
        {
            $htmlLine = $line->getHTMLedLabelLine($dom);
            $htmlLine->setAttribute('class', $htmlLine->getAttribute('class') . $sideClass);
            $main->appendChild($htmlLine);
        }

        $underline = $dom->createElement('div');
        $underline->setAttribute('class', 'underline slide-in-label-underline' . $sideClass);

        $main->appendChild($underline);

        if (isset($this->description))
        {
            foreach ($this->description as $paragraph)
            {
                $classes = 'slide-in-label-description-line' . $sideClass;
                if ($this->upperCasedDescription)
                    $classes .= ' slide-in-label-description-uppercase';

                $p = $dom->createElement('p', $paragraph);
                $p->setAttribute('class', $classes);
                $main->appendChild($p);
            }
        }

        return $main;
    }
}