<!DOCTYPE HTML>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>Błąd 
            <div style="display: inline; color: red;"><?=$data["code"]?></div>
        </h1>

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
    </body>
</html>