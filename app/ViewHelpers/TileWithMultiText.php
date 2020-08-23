<link rel="stylesheet" href="/public/extras/css/helpers/tileWithMultiText.css">

<?php

use CS\Models\Frontend\TileWithMultiText\TileModel;

/**
 * Renders a tile with image, title and multiple texts
 * @param TileModel $tileModel model that contains all required data to render image, main title and subtiles.
 */
function renderTileWithMultiText($tileModel)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $dom->appendChild(($tileModel->getDomElement($dom)));

    echo $dom->saveHTML();
}