<!doctype html>

<html>
    <head>
        <title>Centrum Schodów - Tczew</title>
        <script>
            $(document).ready(function(){
                $('#kill_session_btn').click(function() {
                    $.post('Home/killSession/', function() {
                        alert('Sesja została wyczyszczona!');
                    });
                });

                $('#to_logs_btn').click(function() {
                    $.post('Logs/index/');
                });
            });
            
        </script>
    </head>
    <body>
        <p><strong>Witaj na stronie domowej</strong></p>
        <p>Wybacz że jest tutaj tak pusto</p>
        <p>Serwis ten będzie się rozwijał</p>
        <p>Na tę chwilę jest to dopiero początek</p>
        <br />
        <table>
            <tr><td>Jedno jest pewne, wszystko będzie w porządku…</td></tr>
            <tr><td style="text-align: right">~Bezimienny</td></tr>
        </table>
        <h2>[<?= $data["text"] ?>]</h2>
        <h2>[<?= $model->something ?>]</h2>
        <input value="Wyczyść sesję" type="button" id="kill_session_btn"/>
        <input value="Przejdź do logów" type="button" id="to_logs_btn" onclick="window.location.href='/logs'"/>
    </body>
</html>