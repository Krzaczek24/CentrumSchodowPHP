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

use CS\Models\SiteMapModel;

function getSitesMap()
{
    return [
        new SiteMapModel("Strona główna", "home"),
        new SiteMapModel("Realizacje", "#anchor"),
        new SiteMapModel("Oferta", "offer", [
            new SiteMapModel("Test", "Test"),
            new SiteMapModel("Krzaczełke", "Krzaczełke"),
            new SiteMapModel("Cheeki", "Cheeki")
        ]),
        new SiteMapModel("Cheeki", "offer", [
            new SiteMapModel("Obi Wan Kenobi", "Obi Wan Kenobi"),
            new SiteMapModel("Yoda", "Yoda"),
            new SiteMapModel("Qui-Gon Jinn", "Qui-Gon Jinn")
        ]),
        new SiteMapModel("Breeki", "offer", [
            new SiteMapModel("Cień Czarnobyla", "Cień Czarnobyla"),
            new SiteMapModel("Czyste Niebo", "Czyste Niebo"),
            new SiteMapModel("Zew Prypeci", "Zew Prypeci")
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
        $div->setAttribute('class', 'main-menu-bar-table-item-content main-menu-clickable');
        $div->setAttribute('data-href', $item->getAddress());
        $div->appendChild($span);

        $td = $dom->createElement('td');
        $td->setAttribute('class', 'main-menu-bar-table-item');
        $td->appendChild($div);
        drawSubMenuTable($dom, $td, $item->getSubSites());

        $tr->appendChild($td);
    }

    $table->appendChild($tr);
    $dom->appendChild($table);
    echo $dom->saveHTML();
}

function drawSubMenuTable($dom, $targetHtmlElement, $subSites = [])
{
    $table = $dom->createElement('table');
    $table->setAttribute('class', 'submenu-table');

    foreach ($subSites as $subSite)
    {
        $span = $dom->createElement('span', $subSite->getDisplayName());
        $span->setAttribute('class', 'submenu-table-item-content-text');

        $div = $dom->createElement('div');
        $div->setAttribute('class', 'submenu-table-item-content main-menu-clickable');
        $div->setAttribute('data-href', $subSite->getAddress());     
        $div->appendChild($span);

        $td = $dom->createElement('td');
        $td->setAttribute('class', 'submenu-table-item');
        $td->appendChild($div);

        $tr = $dom->createElement('tr');
        $tr->appendChild($td);

        $table->appendChild($tr);
    }

    $targetHtmlElement->appendChild($table);
}