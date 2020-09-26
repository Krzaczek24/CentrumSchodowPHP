<!DOCTYPE HTML>

<html>
    <head>
        <?php require_once(__DIR__ . "/../../ViewHelpers/CommonHead.php"); ?>
        <link rel="stylesheet" href="/public/extras/css/error.css">
    </head>
    <body>
        <?php require_once(__DIR__ . "/../../ViewHelpers/MenuBar.php"); ?>
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