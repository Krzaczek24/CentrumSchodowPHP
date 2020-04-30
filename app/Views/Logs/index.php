<!doctype html>
<html>
    <head>
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
            $(document).ready(function(){
                $('#refresh_btn').click(function(){
                    location.reload();
                });

                $('#clear_btn').click(function(){
                    var form = $('#form');
                    var url = form.attr("action");
                    var clicked_button_name = $(this).val();
                    form.find('input[name="used_button"]').val(clicked_button_name);
                    var formData = form.serialize();

                    $.post(url, formData, function(data) {  
                        console.log('Successfully cleared logs!');
                        console.log(data);
                        alert('Successfully cleared logs!');
                    });
                });
            });
        </script>
        <?php require("../app/ViewHelpers/Logs/helper.php") ?>
    </head>
    <body>
        <div class="logs-header">
            <h1 style="float: left;">Errors</h1>
            <form id="form" action="/logs/action" method="post">
                <input type="hidden" name="used_button" value=""/>
                <input type="button" id="clear_btn" value="clear" class="buttons"/>
                <input type="button" id="refresh_btn" value="refresh" class="buttons"/>
                <input type="button" id="return_btn" value="go back" class="buttons" onclick="window.location.href='..'"/>
            </form>
        </div>
        <div class="logs-container">
            <?php drawTable($model->errors); ?>
        </div>
        <br />
        <div class="logs-header">
            <h1>Todays - Logs</h1>
        </div>
        <div class="logs-container">
            <?php drawTable($model->dayLogs); ?>
        </div>
    </body>
</html>