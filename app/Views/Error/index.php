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
            $code_page = $data["code"] . ".php";

            if (file_exists("../app/views/error/$code_page"))
            {
                require($code_page);
            }
            else
            {
                require("unknown.php");
            }
        ?>
    </body>
</html>