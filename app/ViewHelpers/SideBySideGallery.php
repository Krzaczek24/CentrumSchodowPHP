<script src="/public/extras/js/sideBySideGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/sideBySideGallery.css">

<?php

use CS\Models\Frontend\SlideInLabel\LabelModel as SlideInLabelModel;
use CS\Models\Frontend\TileWithMultiText\LabelModel;
use CS\Models\GalleryElementModel;

require_once(__DIR__ . "/SlidingInLabel.php");

/**
 * Renders side by side gallery for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 */
function renderSideBySideGallery($galleryElements)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'side-by-side-gallery-main-container top-bottom-border');

    $table = $dom->createElement('table');

    $oddRow = true;

    foreach ($galleryElements as $galleryElement)
    {
        $row = $dom->createElement('tr');

        $imageCell = $dom->createElement('td');
        $imageContainer = $dom->createElement('div');
        $imageContainer->setAttribute('class', 'side-by-side-gallery-image-container');
        $image = $dom->createElement('img');
        $image->setAttribute('src', $galleryElement->getImagePath());
        $imageContainer->appendChild($image);
        $imageCell->appendChild($imageContainer);

        $textCell = $dom->createElement('td');
        $textCell2 = $dom->createElement('td');

        $textContainer = $dom->createElement('div');
        $textContainer->setAttribute('class', 'side-by-side-gallery-text-container');

        $textContainer2 = $dom->createElement('div');
        $textContainer2->setAttribute('class', 'side-by-side-gallery-text-container');

        $temp = $dom->createElement('div');
        $temp->setAttribute('class', 'slide-in-label-main-container');

        $texts = explode(' ', $galleryElement->getTitle(), 2);

        /* ##################### */
        $slideInLabel = new SlideInLabelModel();
        $slideInLabel->addLine($texts[0]);
        $slideInLabel->addLine("", $texts[1]);
        $slideInLabel->setDescription($galleryElement->getDescription());
        //echo $slideInLabel->getHTMLedLabel();
        $temp->appendChild($slideInLabel->getDomElement($dom));
        $textContainer2->appendChild($temp);
        $textCell2->appendChild($textContainer2);
        /* ##################### */

        
        $textLabel = new LabelModel();
        $textLabel->addLine($texts[0]);
        $textLabel->addLine("", $texts[1]);
        $desciption = $dom->createElement('span', $galleryElement->getDescription());
        $textContainer->appendChild($textLabel->getDomElement($dom));
        $textContainer->appendChild($desciption);
        $textCell->appendChild($textContainer);

        if ($oddRow = !$oddRow)
        {
            $row->appendChild($imageCell);
            $row->appendChild($textCell2);
        }
        else
        {
            $row->appendChild($textCell);
            $row->appendChild($imageCell);
        }

        $table->appendChild($row);
    }

    $main->appendChild($table);

    $dom->appendChild($main);

    echo $dom->saveHTML();
}