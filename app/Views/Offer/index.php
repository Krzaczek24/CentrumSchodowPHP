<!doctype html>

<?php 
    use CS\Enums\OfferGalleryMode;
?>

<html>
    <head>
        <?php
            require_once(__DIR__ . "/../../ViewHelpers/CommonHead.php");
        ?>
        <script src="/public/extras/js/offer.js"></script>
        <link rel="stylesheet" href="/public/extras/css/offer.css">
    </head>
    <body>
        <?php
            require_once(__DIR__ . "/../../ViewHelpers/MenuBar.php");
            require_once(__DIR__ . "/../../ViewHelpers/OfferDetails.php");
            require_once(__DIR__ . "/../../ViewHelpers/SlidingInLabel.php");
            require_once(__DIR__ . "/../../ViewHelpers/SideBySideGallery.php");
            require_once(__DIR__ . "/../../ViewHelpers/TableGallery.php"); 
        ?>

        <div class="full-width page-section">
            <?php
                if ($model->getPageHeader() !== null)
                {
                    echo $model->getPageHeader()->getHTMLedLabel();
                }
            ?>
        </div>

        <div class="full-width page-section">
            <?php
                renderOfferDetailsText($model->getTextParagraphs());
            ?>
        </div>
        
        <div class="full-width page-section">
            <?php
                if (!empty($model->getGallery()))
                {
                    if ($model->getGalleryMode() == OfferGalleryMode::SideBySide
                    ||  $model->getGalleryMode() == OfferGalleryMode::InvertedSideBySide)
                    {
                        renderSideBySideGallery($model->getGallery(), true, $model->getGalleryMode() == OfferGalleryMode::InvertedSideBySide);
                    }                        
                    else if ($model->getGalleryMode() == OfferGalleryMode::Tiles)
                    {
                        renderTableGallery($model->getGallery(), 3);
                    }       
                }
            ?>
        </div>

        <div id="contact" class="full-width page-section">
            <?php
                include_once(__DIR__ . "/../../ViewHelpers/ContactSection.php");
            ?>
        </div>

        <div class="full-width page-section">
            <?php
                include_once(__DIR__ . "/../../ViewHelpers/Footer.php");
            ?>
        </div>        
    </body>
</html>