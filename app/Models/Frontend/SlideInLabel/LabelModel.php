<?php

namespace CS\Models\Frontend\SlideInLabel;

use DOMDocument;

/**
 * Contains lines to display in sliding in label and generates ready HTML node
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
     * @return String ready HTML node render as SlideInLabel
     */
    public function getHTMLedLabel()
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $main = $dom->createElement('div');
        $main->setAttribute('class', 'slide-in-label-main-container');
        $main->setAttribute('data-shown', 'false');

        foreach ($this->lines as $line)
        {
            $main->appendChild($line->getHTMLedLabelLine($dom));
        }

        $underline = $dom->createElement('div');
        $underline->setAttribute('class', 'underline');

        $main->appendChild($underline);

        $dom->appendChild($main);

        return $dom->saveHTML();
    }
}