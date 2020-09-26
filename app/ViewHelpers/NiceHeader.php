<link rel="stylesheet" href="/public/extras/css/helpers/niceHeader.css">

<?php

/**
 * Renders header
 * @param string $text text to display
 */
function renderNiceHeader($text, $inverted = false)
{
    $words = explode(' ', $text);

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'nice-header-main-container' . ($inverted ? ' inverted' : ''));

    foreach ($words as $word)
    {
        $span = $dom->createElement('span', $word . ' ');
        $main->appendChild($span);
    }

    $dom->appendChild($main);

    echo $dom->saveHTML();
}