<script src="/public/extras/js/sideBySideGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/sideBySideGallery.css">

<?php

use CS\Models\Frontend\SlideInLabel\LabelModel as SlideInLabelModel;
use CS\Models\GalleryElementModel;

require_once(__DIR__ . "/SlidingInLabel.php");

/**
 * Renders side by side gallery for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 */
function renderSideBySideGallery($galleryElements, $upperCasedDescription = false)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'side-by-side-gallery-main-container top-bottom-border');

    $table = $dom->createElement('table');

    $even = false;

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

        $texts = explode(' ', $galleryElement->getTitle(), 2);
        $textCell = $dom->createElement('td');
        $textContainer = $dom->createElement('div');
        $textContainer->setAttribute('class', 'side-by-side-gallery-text-container');
        $slideInLabel = new SlideInLabelModel($even);
        $slideInLabel->addLine($texts[0]);
        $slideInLabel->addLine("", $texts[1]);
        $slideInLabel->setDescription($galleryElement->getDescription(), $upperCasedDescription);
        $textContainer->appendChild($slideInLabel->getDomElement($dom));
        $textCell->appendChild($textContainer);

        if ($even = !$even) // even
        {
            $row->appendChild($textCell);
            $row->appendChild($imageCell);
        }
        else // odd
        {
            $row->appendChild($imageCell);
            $row->appendChild($textCell);
        }

        $table->appendChild($row);
    }

    $main->appendChild($table);

    $dom->appendChild($main);

    echo $dom->saveHTML();
}