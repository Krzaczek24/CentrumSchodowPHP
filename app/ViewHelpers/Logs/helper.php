<?php

use CS\Enums\FileOperationResults;

/**
 * Draws table with data passed as array of strings
 * @param array $dataArray array with log records
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
function drawTable($dataArray)
{
    $dom = new DOMDocument();
    $table = $dom->createElement('table');
    $table->setAttribute('class', 'log-table');

    foreach ($dataArray as $row)
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

function getFilesOperationResults()
{
    $enum = FileOperationResults::toArray();
    return json_encode($enum);
}