<link rel="stylesheet" href="/public/extras/css/helpers/footer.css">

<?php
    use CS\Models\SiteMapModel;
?>

<div class="footer-main-container">
    <div class="footer-centering-block">
        <div class="footer-columns-block">
            <div class="footer-column">
                <img class="footer-logo" src="/public/extras/images/logo/logo-black.png"></img>
                <p>Rokitki</p>
                <p>ul. Piękna 123</p>
                <p>tel. +48 123 45 67</p>
                <p>info@centrum-schodow.com.pl</p>
                <p>Godziny otwarcia:</p>
                <p>codziennie - od 8:00 do 16:00</p>
                <p>sobota niedziela - nieczynne</p>
            </div>
            <div class="footer-column">
                <h3 class="title">Nasza oferta</h3>
                <?php
                    renderOfferLinks([
                        new SiteMapModel("Schody drewniano-stalowe", "offer/woodsteel"),
                        new SiteMapModel("Schody dywanowe", "offer/carpet"),
                        new SiteMapModel("Schody spiralne", "offer/spiral"),
                        new SiteMapModel("Schody na beton", "offer/concrete"),
                        new SiteMapModel("Schody półkowe", "offer/shelf"),
                        new SiteMapModel("Schody drewniane", "offer/wood"),
                        new SiteMapModel("Małe schody", "offer/small"),
                        new SiteMapModel("Schody zewnętrzne", "offer/outdoor"),
                        new SiteMapModel("Balustrady i poręcze", "offer/balustrades")
                    ]);
                ?>
            </div>
            <div class="footer-column">
                <h3 class="title">Informacje</h3>
                <p></p>
            </div>
        </div>
        <div class="footer-line"></div>
        <div class="footer-socials">
            <div class="footer-author">
                <span>Tomasz Drewek</span>
            </div>
            <div class="footer-hyperlinks">
                <i class="fab fa-facebook" onclick="window.open('https://www.facebook.com/Centrum-Schodów-Izabela-Wyczling-1069229283285649', '_blank')"></i>
            </div>
        </div>
    </div>
</div>

<?php

/**
 * Render offers links
 * @param array $siteMap array of SiteMapModel
 */
function renderOfferLinks($siteMap)
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;

    foreach ($siteMap as $siteAddress)
    {
        $p = $dom->createElement('p');

        $a = $dom->createElement('span', $siteAddress->getDisplayName());
        $a->setAttribute('onClick', "window.location.href='" . $siteAddress->getAddress() . "'");

        $p->appendChild($a);

        $dom->appendChild($p);
    }

    echo $dom->saveHTML();
}