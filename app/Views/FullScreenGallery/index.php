<script src="/public/extras/js/fullScreenGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/fullScreenGallery.css">

<div class="full-screen-container">
    <?php renderSlides(getGalleryElements()); ?>

    <div class="gallery-arrow gallery-side-arrow gallery-arrow-left" data-direction="left">
        <div class="non-hovered">
            <img src="/public/extras/images/icons/left-arrow.svg">
        </div>
        <div class="hovered">
            
        </div>
    </div>
    <div class="gallery-arrow gallery-side-arrow gallery-arrow-right" data-direction="right">
        <div class="non-hovered">
            <img src="/public/extras/images/icons/right-arrow.svg">
        </div>
        <div class="hovered">
            
        </div>
    </div>
    <div class="gallery-arrow gallery-bottom-arrow" data-direction="down">
        <div class="non-hovered">
            <img src="/public/extras/images/icons/down-arrow.svg">
        </div>
    </div>
</div>

<?php

use CS\Models\GalleryElementModel;

function getGalleryElements()
{
    return [
        new GalleryElementModel('/public/extras/images/gallery/photo1.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo2.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo3.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo4.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo5.jpg', null, null)
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
        $img = $dom->createElement('img');
        $img->setAttribute('src', $slide->getImagePath());
        $img->setAttribute('class', 'image-fill');

        $dom->appendChild($img);
    }

    echo $dom->saveHTML();
}