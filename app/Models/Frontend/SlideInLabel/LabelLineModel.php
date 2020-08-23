<?php

namespace CS\Models\Frontend\SlideInLabel;

/**
 * Contains sliding in label lines sentences and generates ready HTML node
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
        $normal->setAttribute('class', 'slide-in-label-normal');

        $bold = $dom->createElement('span', $this->bold);
        $bold->setAttribute('class', 'slide-in-label-bold');

        $line = $dom->createElement('div');
        $line->setAttribute('class', 'slide-in-label-line');
        $line->appendChild($normal);
        $line->appendChild($bold);

        return $line;
    }
}