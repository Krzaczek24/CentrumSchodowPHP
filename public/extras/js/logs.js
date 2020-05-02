var drawTable = function(logType, source) {
    var htmlContent = '<table>';
    source.forEach(function(elem) {
        var row = elem.replace(/\[/g, '[<span class="log-table-details">').replace(/\]/g, '</span>]');
        htmlContent += '<tr><td>' + row + '</td></tr>';
    });
    htmlContent += '</table>';
    $('#logs-container-' + logType).html(htmlContent);
};

$(document).ready(function() {
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

    $('.log-table td').each(function(idx, elem) {
        $(elem).html(elem.innerText.replace(/\[/g, '[<span class="log-table-details">').replace(/\]/g, '</span>]'));
    });

    $('#clear_btn').click(function(){
        var form = $('#form');
        var url = form.attr("action");
        var clicked_button_name = $(this).val();
        form.find('input[name="used_button"]').val(clicked_button_name);
        var formData = form.serialize();

        $.post(url, formData, function(response, status) { 
            if (status == "success") {
                switch (response.body.resultMessage) {
                    case filesOperationResults['SuccessfullyRemoved']:
                        $('#logs-container-errors').empty();
                        break;
                    case filesOperationResults['DoesNotExists']:
                        alert('Plik z błędami jest już pusty!');
                        break;
                    case filesOperationResults['CannotBeRemoved']:
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