<script src="/public/extras/js/tableGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/tableGallery.css">

<?php

/**
 * Renders slides for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 * @param integer $columnsNumber number of columns in the table, if not stated then number of columns is equal to number of images
 */
function renderTableGallery($galleryElements, $columnsNumber = null)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('table');
    $main->setAttribute('class', 'tile-gallery-main-container');

    $galleryElementsCount = count($galleryElements);
    $maxColumns = is_null($columnsNumber) ? $galleryElementsCount : $columnsNumber;
    $maxRows = ceil($galleryElementsCount / $maxColumns);
    for ($row = 0; $row < $maxRows; $row++)
    {
        $tr = $dom->createElement('tr');
        for ($column = 0; $column < $maxColumns; $column++)
        {
            $td = $dom->createElement('td');
            $td->setAttribute('class', 'tile-gallery-cell');

            $imgNo = $row * $maxColumns + $column;
            if (isset($galleryElements[$imgNo]))
            {
                $td->setAttribute('onclick', 'window.location.href=\'' . $galleryElements[$imgNo]->getUrl() . '\'');

                $text = $dom->createElement('span', $galleryElements[$imgNo]->getTitle());

                $textContainer = $dom->createElement('div');
                $textContainer->setAttribute('class', 'tile-gallery-text-container');
                $textContainer->appendChild($text);

                $td->appendChild($textContainer);

                $image = $dom->createElement('img');
                $image->setAttribute('src', $galleryElements[$imgNo]->getImagePath());

                $imageContainer = $dom->createElement('div');
                $imageContainer->setAttribute('class', 'tile-gallery-image-container');
                $imageContainer->appendChild($image);

                $td->appendChild($imageContainer);
            }

            $tr->appendChild($td);
        }
        $main->appendChild($tr);
    }

    $dom->appendChild($main);

    echo $dom->saveHTML();
}