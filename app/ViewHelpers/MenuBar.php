<script src="/public/extras/js/menuBar.js"></script>
<link rel="stylesheet" href="/public/extras/css/helpers/menuBar.css">

<?php
    use CS\Models\SiteMapModel;
?>

<div class="sticky-top-container top">
    <div class="main-menu-bar">
        <a href="..">
            <div class="main-menu-bar-logo" alt="Centrum Schodów">
                <img id="logo-black" src="/public/extras/images/logo/logo-black.png">
                <img id="logo-white" src="/public/extras/images/logo/logo-white.png" class="hidden">
            </div>
        </a>
        <?php 
            drawMainMenuTable([
                new SiteMapModel("strona główna", "home"),
                new SiteMapModel("realizacje", "#realizations"),
                new SiteMapModel("oferta", "offer", [
                    new SiteMapModel("schody drewniano-stalowe", "offer/woodsteel"),
                    new SiteMapModel("schody dywanowe", "offer/carpet"),
                    new SiteMapModel("schody spiralne", "offer/spiral"),
                    new SiteMapModel("schody na beton", "offer/concrete"),
                    new SiteMapModel("schody półkowe", "offer/shelf"),
                    new SiteMapModel("schody drewniane", "offer/wood"),
                    new SiteMapModel("małe schody", "offer/small"),
                    new SiteMapModel("schody zewnętrzne", "offer/outdoor"),
                    new SiteMapModel("balustrady i poręcze", "offer/balustrades")
                ]),
                new SiteMapModel("kontakt", "#contact", [
                    new SiteMapModel("wyceń swoje schody", "form")
                ])
            ]);
        ?>
    </div>
</div>

<?php

/**
 * Draws main menu bar table
 * @param array $siteMap array of SiteMapModel
 */
function drawMainMenuTable($siteMap)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $table = $dom->createElement('table');
    $table->setAttribute('class', 'main-menu-bar-table');
    $tr = $dom->createElement('tr');

    foreach ($siteMap as $item)
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

/**
 * Draws submenu panels
 * @param object $dom DOMDocument object used to create dom structure
 * @param object $targetHtmlElement DOMElement object in the middle of which it will be formed submenu
 * @param array $subSites list of subsites for which it will be created buttons
 */
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