<script src="/public/extras/js/sideBySideGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/sideBySideGallery.css">

<?php

use CS\Models\Frontend\SlideInLabel\LabelModel as SlideInLabelModel;
use CS\Models\GalleryElementModel;

require_once(__DIR__ . "/SlidingInLabel.php");

/**
 * Renders side by side gallery for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 * @param bool $upperCasedDescription should description to be uppercased
 * @param bool $invert gallery starts with image at left side instead of right
 */
function renderSideBySideGallery(array $galleryElements, bool $upperCasedDescription = false, bool $invert = false)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'side-by-side-gallery-main-container top-bottom-border');

    $table = $dom->createElement('table');

    $even = $invert;

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
        $textContainer = $dom->createElement('div');
        $textContainer->setAttribute('class', 'side-by-side-gallery-text-container');
        $slideInLabel = new SlideInLabelModel();
        if ($galleryElement->getDescription() !== null)
        {
            foreach ($galleryElement->getDescription()->getHeaderLines() as $descriptionHeaderLine)
            {
                $slideInLabel->addReadyLine($descriptionHeaderLine);
            }
            $slideInLabel->setDescription($galleryElement->getDescription()->getDescriptionLines(), $upperCasedDescription);
        }
        $slideInLabel->setSlideInFromRight($even);
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