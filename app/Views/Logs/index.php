<!doctype html>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <?php require_once(__DIR__ . "/../../ViewHelpers/Logs/helper.php") ?>
        <script>
            var filesOperationResults = $.parseJSON('<?php echo getFilesOperationResults() ?>');
        </script>
        <script src="/public/extras/js/logs.js"></script>
        <link rel="stylesheet" href="/public/extras/css/common.css">
        <link rel="stylesheet" href="/public/extras/css/logs.css">
    </head>
    <body>
        <div class="logs-header">
            <h1 style="float: left;">Errors</h1>
            <form id="form" action="/logs/action" method="post">
                <input type="hidden" name="used_button" value=""/>
                <input type="button" id="clear_btn" value="clear" class="buttons"/>
                <input type="button" id="return_btn" value="go back" class="buttons" onclick="window.location.href='..'"/>
            </form>
        </div>
        <div id="logs-container-errors" class="logs-container">
            <?php drawTable($model->errors); ?>
        </div>
        <br />
        <div class="logs-header">
            <h1>Todays - Logs</h1>
        </div>
        <div id="logs-container-day-logs" class="logs-container">
            <?php drawTable($model->dayLogs); ?>
        </div>
    </body>
</html>