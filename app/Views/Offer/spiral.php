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
        ?>
        <p><strong>Podstrona z ofertą z schodami spiralnymi</strong></p>
        <p>testerere sub page</p>
        
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