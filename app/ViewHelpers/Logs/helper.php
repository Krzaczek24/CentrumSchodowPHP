<style>
    .log-table-details:nth-child(1)
    {
        color: yellow;
    }

    .log-table-details:nth-child(2)
    {
        color: lightgreen;
    }

    .log-table-details:nth-child(3)
    {
        color: lightsalmon;
    }

    .log-table-details:nth-child(4), .log-table-details:nth-child(5)
    {
        color: white;
    }
</style>

<script>
    $(document).ready(function() 
    {
        $('.log-table td').each(function(idx, elem)
        {
            $(elem).html(elem.innerText.replace(/\[/g, '[<span class="log-table-details">').replace(/\]/g, '</span>]'));
        });
    });
</script>

<?php

/**
 * Draws table with data passed as array of strings
 * @param array $dataArray array with log records
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 * @version 1.0
 */
function drawTable($dataArray)
{
    $dom = new DOMDocument();
    $table = $dom->createElement('table');
    $table->setAttribute('class', 'log-table');

    foreach (array_reverse($dataArray) as $row)
    {
        $tr = $dom->createElement('tr');
        $table->appendChild($tr);

        $td = $dom->createElement('td', $row);
        $tr->appendChild($td);

        $table->appendChild($tr);
    }

    $dom->appendChild($table);
    echo $dom->saveHTML();
}