<?php

namespace CS\Models\Frontend\SlideInLabel;

use DOMDocument;

/**
 * Contains sliding in label lines sentences and generates ready HTML node
 */
class LabelLineModel
{
    private string $normal;
    private string $bold;

    /**
     * @param String $normal text which will be shown without bold
     * @param String $bold text which will be bolded
     */
    public function __construct(string $normal = "", string $bold = "")
    {
        $this->normal = $normal;
        $this->bold = $bold;
    }

    /**
     * @param String $sentence
     */
    public function setNormalSentence(string $sentence)
    {
        $this->normal = $sentence;
    }

    /**
     * @param String $sentence
     */
    public function setBoldSentence(string $sentence)
    {
        $this->bold = $sentence;
    }

    /**
     * @param DOMDocument $dom
     * @return \DOMElement ready HTML node for SlideInLabel
     */
    public function getHTMLedLabelLine(DOMDocument $dom)
    {
        $normal = $dom->createElement('span', $this->normal);
        $normal->setAttribute('class', 'slide-in-label-normal');

        $bold = $dom->createElement('span', $this->bold);
        $bold->setAttribute('class', 'slide-in-label-bold');

        $line = $dom->createElement('div');
        $line->setAttribute('class', 'slide-in-label-header-line');
        $line->appendChild($normal);
        $line->appendChild($bold);

        return $line;
    }
}