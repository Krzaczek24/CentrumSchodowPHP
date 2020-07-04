<script src="/public/extras/js/fullScreenGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/fullScreenGallery.css">

<?php

/**
 * Comment here
 * @param array $galleryElements comment here
 */
function renderSlides($galleryElements)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'main-container');

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