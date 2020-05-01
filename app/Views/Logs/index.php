<!doctype html>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            body 
            {
                background-color: black;
                color: white;
            }

            .logs-container
            {
                overflow-y: scroll;
                overflow-x: auto;
                height: 37.5vh;
                width: 99%;
                color: green;
                padding: 3px;
                border: gray 2px solid;
            }

            .buttons
            {
                float: left;
                padding: 6px 12px;
                margin: 24px 0px 0px 16px;
            }
        </style>
        <script>
            var drawTable = function(logType, source) {
                var htmlContent = '<table>';
                source.forEach(function(elem) {
                    var row = elem.replace(/\[/g, '[<span class="log-table-details">').replace(/\]/g, '</span>]');
                    htmlContent += '<tr><td>' + row + '</td></tr>';
                });
                htmlContent += '</table>';
                $('#logs-container-' + logType).html(htmlContent);
            };

            $(document).ready(function(){
                setInterval(function() {
                    $.post('/logs/refresh', null, function(response, status) { 
                        if (status == "success") {
                            drawTable('errors', response.body.errors);
                            drawTable('day-logs', response.body.dayLogs);
                        } else {
                            alert('Something went wrong!');
                            console.log('Status [' + status + ']');
                        }                        
                    }, 'json');
                }, 30000);

                $('#clear_btn').click(function(){
                    var form = $('#form');
                    var url = form.attr("action");
                    var clicked_button_name = $(this).val();
                    form.find('input[name="used_button"]').val(clicked_button_name);
                    var formData = form.serialize();

                    $.post(url, formData, function(response, status) { 
                        if (status == "success") {
                            <?php use CS\Enums\FileOperationResults; ?>
                            switch (response.body.resultMessage) {
                                case '<?php echo FileOperationResults::SuccessfullyRemoved ?>':
                                    $('#logs-container-errors').empty();
                                    break;
                                case '<?php echo FileOperationResults::DoesNotExists ?>':
                                    alert('Plik z błędami jest już pusty!');
                                    break;
                                case '<?php echo FileOperationResults::CannotBeRemoved ?>':
                                    alert('Wystąpił błąd! Nie można wyczyścić pliku.');
                                    break;
                                default:
                                    alert('Wystąpił nieznany błąd!');
                                    break;
                            }
                        } else {
                            alert('Something went wrong!');
                            console.log('Status [' + status + ']');
                        }                        
                    }, 'json');
                });
            });
        </script>
        
        <?php require_once(__DIR__ . "/../../ViewHelpers/Logs/helper.php") ?>
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