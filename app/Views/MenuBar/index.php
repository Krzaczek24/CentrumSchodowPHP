<script src="/public/extras/js/commonFunctions.js"></script>
<script src="/public/extras/js/menuBar.js"></script>
<link rel="stylesheet" href="/public/extras/css/menuBar.css">

<div class="sticky-top-container">
    <div class="main-menu-bar">
        <a href="..">
            <div class="main-menu-bar-logo main-menu-clickable">
                <img src="/public/extras/images/logo.png" alt="Centrum Schodów">
            </div>
        </a>
        <?php drawMainMenuTable() ?>
    </div>
</div>

<?php

use CS\Helpers\StringHelper;
use CS\Models\SiteMapModel;

function getSitesMap()
{
    return [
        new SiteMapModel("Strona główna", "home"),
        new SiteMapModel("Realizacje", "#anchor"),
        new SiteMapModel("Oferta", "offer", [
            new SiteMapModel("Test", "testowa")
        ])
    ];
}

/**
 * Draws main menu bar table
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
function drawMainMenuTable()
{
    $map = getSitesMap();

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $table = $dom->createElement('table');
    $table->setAttribute('class', 'main-menu-bar-table');
    $tr = $dom->createElement('tr');

    foreach ($map as $item)
    {
        $span = $dom->createElement('span', $item->getDisplayName());
        $span->setAttribute('class', 'main-menu-bar-table-item-content-text');

        $div = $dom->createElement('div');
        $div->setAttribute('class', 'main-menu-bar-table-item-content');
        $div->appendChild($span);

        $td = $dom->createElement('td');
        $td->setAttribute('class', 'main-menu-bar-table-item main-menu-clickable');
        if (StringHelper::startsWith($item->getAddress(), '#'))
        {
            $td->setAttribute('data-href', $item->getAddress());
        }
        $td->appendChild($div);

        $tr->appendChild($td);
    }

    $table->appendChild($tr);
    $dom->appendChild($table);
    echo $dom->saveHTML();
}

function drawSubMenuTable()
{

}