<script src="/public/extras/js/autoGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/autoGallery.css">

<?php

/**
 * Renders slides for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 */
function renderAutoGallery($galleryElements)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'auto-gallery-main-container');

    foreach ($galleryElements as $slide)
    {
        $img = $dom->createElement('img');
        $img->setAttribute('src', $slide->getImagePath());
        $img->setAttribute('class', 'image-fill');

        $main->appendChild($img);
    }

    $dom->appendChild($main);

    echo $dom->saveHTML();
}