<!DOCTYPE HTML>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="/public/extras/images/icons/page-icon.png" sizes="32x32" />
        <script src="/public/extras/js/jQuery/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="/public/extras/css/common.css">
        <link rel="stylesheet" href="/public/extras/css/error.css">
    </head>
    <body>
        <?php require(__DIR__ . "/../../ViewHelpers/MenuBar.php"); ?>
        <div class="main-container">
            <div class="central-container">
                <h1>Błąd <span class="code"><?=$data["code"]?></span></h1>

                <?php
                    $codeErrorPagePath = __DIR__ . "/" . $data["code"] . ".php";

                    if (file_exists($codeErrorPagePath))
                    {
                        require($codeErrorPagePath);
                    }
                    else
                    {
                        require(__DIR__ . "/unknown.php");
                    }
                ?>
            </div>
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