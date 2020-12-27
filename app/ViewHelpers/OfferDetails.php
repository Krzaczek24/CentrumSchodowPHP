<link rel="stylesheet" href="/public/extras/css/helpers/offerSegments.css">

<?php

/**
 * @param OfferDetailsSegmentModel[] $offerTextParagraphs
 */
function renderOfferDetailsText(array $offerTextParagraphs)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'offer-segments-main-container');

    $center = $dom->createElement('div');
    $center->setAttribute('class', 'offer-segments-centering-block');

    foreach ($offerTextParagraphs as $segmentData)
    {
        $segment_header = $dom->createElement('h2', $segmentData->getHeader());
        $segment_header->setAttribute('class', 'offer-segments-header');
        $center->appendChild($segment_header);
        
        foreach ($segmentData->getParagraphs() as $paragraphText)
        {
            $paragraph = $dom->createElement('p', $paragraphText);
            $paragraph->setAttribute('class', 'offer-segments-paragraph');
            $center->appendChild($paragraph);
        }
    }
    
    $main->appendChild($center);
    $dom->appendChild($main);

    echo $dom->saveHTML();
}