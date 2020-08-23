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

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'divider-main-container top-bottom-border');

    $center = $dom->createElement('div');
    $center->setAttribute('class', 'divider-centering-block');

    $text = $dom->createElement('span', $text);
    $text->setAttribute('class', 'divider-text');

    $center->appendChild($text);
    $main->appendChild($center);
    $dom->appendChild($main);

    echo $dom->saveHTML();
}