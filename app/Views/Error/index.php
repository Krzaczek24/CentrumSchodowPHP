<!DOCTYPE HTML>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/public/extras/css/common.css">
        <link rel="stylesheet" href="/public/extras/css/error.css">
    </head>
    <body>
        <?php require(__DIR__ . "/../MenuBar/index.php"); ?>
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
    </body>
</html>