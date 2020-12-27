<!doctype html>

<html>
    <head>
        <?php require_once(__DIR__ . "/../../ViewHelpers/CommonHead.php"); ?>
        <script src="/public/extras/js/offer.js"></script>
        <link rel="stylesheet" href="/public/extras/css/offer.css">
    </head>
    <body>
        <?php
            require_once(__DIR__ . "/../../ViewHelpers/MenuBar.php");
            require_once(__DIR__ . "/../../ViewHelpers/OfferDetails.php");
            require_once(__DIR__ . "/../../ViewHelpers/SlidingInLabel.php");
            //require_once(__DIR__ . "/../../ViewHelpers/TableGallery.php");
            //side by side gallery tutej wjedzie

        ?>

        <div class="full-width page-section">
            <?php
                if ($model->getHeader() !== null)
                {
                    echo $model->getHeader()->getHTMLedLabel();
                }
            ?>
        </div>

        <div class="full-width page-section">
            <?php
                renderOfferDetailsText($model);
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