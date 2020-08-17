<script src="/public/extras/js/tableGallery.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/tableGallery.css">

<?php

/**
 * Renders slides for given array of gallery elements
 * @param GalleryElementModel[] $galleryElements list of objects with path, header and description
 */
function renderTableGallery($galleryElements)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    $main = $dom->createElement('table');
    $main->setAttribute('class', 'tile-gallery-main-container');

    $maxColumns = 3;
    $maxRows = ceil(count($galleryElements) / $maxColumns);
    for ($row = 0; $row < $maxRows; $row++)
    {
        $tr = $dom->createElement('tr');
        for ($column = 0; $column < $maxColumns; $column++)
        {
            $td = $dom->createElement('td');

            $imgNo = $row * $maxColumns + $column;
            if (isset($galleryElements[$imgNo]))
            {
                $container = $dom->createElement('div');
                $container->setAttribute('class', 'img-container');

                $img = $dom->createElement('img');
                $img->setAttribute('src', $galleryElements[$imgNo]->getImagePath());
                $img->setAttribute('class', 'image-fill');

                $container->appendChild($img);

                $td->appendChild($container);
            }

            $tr->appendChild($td);
        }
        $main->appendChild($tr);
    }

    $dom->appendChild($main);

    echo $dom->saveHTML();
}