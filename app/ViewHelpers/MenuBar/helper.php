<?php

use CS\Helpers\StringHelper;

class SiteLink
{
    public $displayName;
    public $href;
    public $subSites;

    public function __construct($displayName, $href, $subSites = [])
    {
        $this->displayName = $displayName;
        $this->href = $href;
        $this->subSites = $subSites;
    }
}

function getSitesMap()
{
    return [
        new SiteLink("Strona główna", "home"),
        new SiteLink("Realizacje", "#anchor"),
        new SiteLink("Oferta", "offer", [
            new SiteLink("Test", "testowa")
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
    $table->setAttribute('id', 'main-menu-bar');
    $tr = $dom->createElement('tr');

    foreach ($map as $item)
    {
        $span = $dom->createElement('span', $item->displayName);
        $span->setAttribute('class', 'main-menu-bar-item-content-text');

        $div = $dom->createElement('div');
        $div->setAttribute('class', 'main-menu-bar-item-content');
        if (StringHelper::startsWith($item->href, '#'))
        {
            $div->setAttribute('data-href', $item->href);
        }
        $div->appendChild($span);

        $td = $dom->createElement('td');
        $td->setAttribute('class', 'main-menu-bar-item');
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