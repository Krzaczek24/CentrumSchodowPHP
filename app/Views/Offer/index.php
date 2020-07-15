<!doctype html>

<?php 
    use CS\Models\Frontend\SlideInLabel\Label;
?>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <script src="/public/extras/js/jQuery/jquery-3.5.1.min.js"></script>
        <script src="/public/extras/js/common.js"></script>
        <script src="/public/extras/js/offer.js"></script>
        <link rel="stylesheet" href="/public/extras/css/common.css">
        <link rel="stylesheet" href="/public/extras/css/offer.css">
    </head>
    <body>
        <?php
            require(__DIR__ . "/../MenuBar/index.php");
            include_once(__DIR__ . "/../SlidingInLabel/index.php");
        ?>

        <div class="full-width page-section">
            <?php
                $slideInLabel = new Label();
                $slideInLabel->addLine("Nasza ", "oferta");
                echo $slideInLabel->getHTMLedLabel();
            ?>
        </div>
        
        <div class="full-width">
            <?php
                require(__DIR__ . "/../TileGallery/index.php");
                renderTiles(getGalleryElements());
            ?>
        </div>
    </body>
</html>

<?php

use CS\Models\GalleryElementModel;

function getGalleryElements()
{
    return [
        new GalleryElementModel('/public/extras/images/gallery/photo1.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo2.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo3.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo4.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo5.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo1.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo2.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo3.jpg', null, null),
        new GalleryElementModel('/public/extras/images/gallery/photo4.jpg', null, null)
    ];
}