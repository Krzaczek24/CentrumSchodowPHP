<script src="/public/extras/js/niceLinkButton.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/niceLinkButton.css">

<?php

/**
 * Renders redirectional button
 * @param string $url target address
 * @param string $title text to display
 */
function renderNiceLinkButton($url, $title)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('div');
    $main->setAttribute('class', 'nice-link-button-main-container top-bottom-border');
    $main->setAttribute('onclick', 'window.location.href=\'' . $url . '\'');

    $center = $dom->createElement('div');
    $center->setAttribute('class', 'nice-link-button-centering-block');

    $text = $dom->createElement('span', $title);
    $text->setAttribute('class', 'nice-link-button-text');

    $center->appendChild($text);
    $main->appendChild($center);
    $dom->appendChild($main);

    echo $dom->saveHTML();
}