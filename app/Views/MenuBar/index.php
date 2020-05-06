<script src="/public/extras/js/commonFunctions.js"></script>
<script src="/public/extras/js/menuBar.js"></script>
<link rel="stylesheet" href="/public/extras/css/menuBar.css">

<div class="sticky-top-container top">
    <div class="main-menu-bar">
        <a href="..">
            <div class="main-menu-bar-logo" alt="Centrum Schodów">
                <img id="logo-black" src="/public/extras/images/logo-black.png">
                <img id="logo-white" src="/public/extras/images/logo-white.png" class="hidden">
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
        new SiteMapModel("strona główna", "home"),
        new SiteMapModel("realizacje", "#anchor"),
        new SiteMapModel("oferta", "offer", [
            new SiteMapModel("test", "Test"),
            new SiteMapModel("krzaczełke", "Krzaczełke"),
            new SiteMapModel("cheeki", "Cheeki")
        ]),
        new SiteMapModel("cheeki", "offer", [
            new SiteMapModel("Obi Wan Kenobi", "Obi Wan Kenobi"),
            new SiteMapModel("Yoda", "Yoda"),
            new SiteMapModel("Qui-Gon Jinn", "Qui-Gon Jinn")
        ]),
        new SiteMapModel("breeki", "offer", [
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

        $innerDiv = $dom->createElement('div');
        $innerDiv->setAttribute('class', 'main-menu-bar-table-item-content-text');
        $innerDiv->appendChild($span);

        $div = $dom->createElement('div');
        $div->setAttribute('class', 'main-menu-bar-table-item-content main-menu-clickable');
        $div->setAttribute('data-href', $item->getAddress());
        $div->appendChild($innerDiv);

        $td = $dom->createElement('td');
        $td->setAttribute('class', 'main-menu-bar-table-item');
        $td->appendChild($div);
        if ($item->hasAnySubSites())
        {
            drawSubMenuTable($dom, $td, $item->getSubSites());
        }

        $tr->appendChild($td);
    }

    $table->appendChild($tr);
    $dom->appendChild($table);
    echo $dom->saveHTML();
}

function drawSubMenuTable($dom, $targetHtmlElement, $subSites = [])
{
    $subMenu = $dom->createElement('div');
    $subMenu->setAttribute('class', 'submenu');

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

    $subMenu->appendChild($table);

    $targetHtmlElement->appendChild($subMenu);
}