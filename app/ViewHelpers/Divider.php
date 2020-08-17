<link rel="stylesheet" href="/public/extras/css/helpers/divider.css">

<?php

/**
 * Renders divider in the center of selected element with passed text
 * @param string $text text which will be shown in the center of divider
 */
function renderDivider($text)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $topLine = $dom->createElement('hr');
    $topLine->setAttribute('class', 'divider-line divider-line-top');

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'divider-main-container');

    $text = $dom->createElement('span', $text);
    $text->setAttribute('class', 'divider-text');

    $bottomLine = $dom->createElement('hr');
    $bottomLine->setAttribute('class', 'divider-line divider-line-bottom');

    $main->appendChild($text);

    $dom->appendChild($topLine);
    $dom->appendChild($main);
    $dom->appendChild($bottomLine);

    echo $dom->saveHTML();
}