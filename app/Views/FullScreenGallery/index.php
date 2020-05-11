<script src="/public/extras/js/fullScreenGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/fullScreenGallery.css">

<div class="full-screen-container">
    <?php renderSlides(getGalleryElements()); ?>
</div>

<?php

use CS\Models\GalleryElementModel;

function getGalleryElements()
{
    return [
        new GalleryElementModel('/public/extras/images/gallery/photo1.jpg', null),
        new GalleryElementModel('/public/extras/images/gallery/photo2.jpg', null),
        new GalleryElementModel('/public/extras/images/gallery/photo3.jpg', null),
        new GalleryElementModel('/public/extras/images/gallery/photo4.jpg', null),
        new GalleryElementModel('/public/extras/images/gallery/photo5.jpg', null)
    ];
}

/**
 * Comment here
 * @param array $galleryElements comment here
 */
function renderSlides($galleryElements)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    foreach ($galleryElements as $slide)
    {
        $background = $dom->createElement('img');
        $background->setAttribute('src', $slide->getImagePath());
        $background->setAttribute('class', 'image-fill');

        $dom->appendChild($background);
    }

    echo $dom->saveHTML();
}