<!doctype html>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="/public/extras/images/icons/page-icon.png" sizes="32x32" />
        <script src="/public/extras/js/jQuery/jquery-3.5.1.min.js"></script>
        <script src="/public/extras/js/common.js"></script>
        <script src="/public/extras/js/offer.js"></script>
        <link rel="stylesheet" href="/public/extras/css/common.css">
        <link rel="stylesheet" href="/public/extras/css/offer.css">
    </head>
    <body>
        <?php
            require(__DIR__ . "/../../ViewHelpers/MenuBar.php");
        ?>
        <p><strong>Podstrona z ofertą z schodami spiralnymi</strong></p>
        <p>testerere sub page</p>
        
        <div id="contact" class="full-width page-section">
            <?php
                include_once(__DIR__ . "/../../ViewHelpers/ContactSection.php");
            ?>
        </div>

    </body>
</html>