<?php

namespace CS\Controllers;

use CS\Core\Controller;
use CS\ViewModels\OfferCategoryModel;
use CS\Models\Frontend\Gallery\GalleryElementModel;
use CS\Models\Frontend\SlideInLabel\LabelModel;
use CS\ViewModels\OfferDetailsModel;
use CS\ViewModels\OfferDetailsSegmentModel;

/**
 * Offer page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class OfferController extends Controller
{
    public function index()
    {
        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("nasza ", "oferta");
        $model->tiles = [
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/wood-steel.jpg",    "schody stalowo-drewniane", null, "offer/woodsteel"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/carpet.jpg",        "schody dywanowe",          null, "offer/carpet"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/spiral.jpg",        "schody spiralne",          null, "offer/spiral"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/concrete.jpg",      "schody na beton",          null, "offer/concrete"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/shelf.jpg",         "schody półkowe",           null, "offer/shelf"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/wood.jpg",          "schody drewniane",         null, "offer/wood"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/small.jpg",         "małe schody",              null, "offer/small"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/outdoor.jpg",       "schody zewnętrzne",        null, "offer/outdoor"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/balustrades.jpg",   "balustrady i poręcze",     null, "offer/balustrades")
        ];

        $this->view("Offer/category", $model, []);
    }

    public function balustrades()
    {
        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("balustrady ", "i poręcze");

        for ($i = 1; $i <= 21; $i++)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/ballustrades/b$i.jpg", "B$i",  null, null));
        }

        $this->view("Offer/category", $model, []);
    }

    public function carpet()
    {
        $model = new OfferDetailsModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "dywanowe");

        $this->view("Offer/details", $model, []);
    }

    public function concrete()
    {
        $model = new OfferDetailsModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "betownowe");

        $this->view("Offer/details", $model, []);
    }
    
    public function shelf()
    {
        $model = new OfferDetailsModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "półkowe");

        $this->view("Offer/details", $model, []);
    }

    public function small($mark = null)
    {
        $names = ["jednobelkowe", "modułowe", "stalowe", "drewniane"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferDetailsModel();
            $model->header = new LabelModel();
            $model->header->addLine("schody ", $mark);

            switch ($mark)
            {
                case "jednobelkowe":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "modułowe":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "stalowe":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "drewniane":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
            }

            $this->view("Offer/details", $model, []);
            return;
        }

        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "małe");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/small/$name.jpg", "schody kaczki $name", null, "offer/small/$name"));
        }

        $this->view("Offer/category", $model, []);
    }

    public function spiral($mark = null)
    {
        $names = ["julia", "ola", "sandra", "sylwia", "kasandra", "kamila", "lila", "linda", "tania"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferDetailsModel();
            $model->getHeader()->addLine("schody spiralne ", $mark);

            switch ($mark)
            {
                case "julia":
                    $model->setSegments([
                        new OfferDetailsSegmentModel("Schody spiralne Julia – innowacja połączona z funkcjonalnością", [
                            "Wielu ludzi marzy o eleganckich schodach spiralnych w swoim domu. Dlatego też, gdy nadchodzi moment wyboru odpowiedniego modelu schodów do nowego domu, bardzo szerokie grono klientów interesuje się właśnie modelami kręconymi. Schody spiralne Julia to prawdziwa perełka w naszej ofercie. Projekt ten jest dostępny w czterech różnych wariantach, tak, aby spełnić oczekiwania wszystkich naszych klientów."
                        ]),
                        new OfferDetailsSegmentModel("W jakich sytuacjach sprawdzą się schody Julia?", [
                            "Jest to rozwiązanie dedykowane wszystkim wnętrzom, w których oszczędność miejsca stoi na pierwszym miejscu. Innowacyjny projekt sprawia, że schody nie zajmują dużej przestrzeni i mogą łączyć ze sobą kilka pięter. Tego typu schody mogą również prowadzić na poddasze lub być wykorzystane jako elegancki łącznik w budynkach biurowych. Do dyspozycji klientów oddajemy kilka materiałów, dzięki czemu, schody spiralne Julia mogą zostać wkomponowane do każdego pomieszczenia, niezależnie od obowiązującej aranżacji wnętrza."
                        ]),
                        new OfferDetailsSegmentModel("Materiały wykorzystane do produkcji schodów", [
                            "Jak już wspomnieliśmy, schody Julia są dostępne w czterech wariantach. Sercem schodów zawsze jest nośny słup centralny z giętego policzka metalowego. Tutaj montowane są stopnie wykonane z wytrzymałego dębu, blachy ryflowanej, gładkiej lub metalu. W każdym projekcie stosowane są metalowe balustrady, które różnią się między sobą kolorem, a także sposobem okalania poszczególnych stopni.",
                            "Wszechstronny wybór produktów sprawia, że schody spiralne Julia sprawdzą się w każdym wnętrzu. Model z drewnianymi stopniami świetnie wkomponuje się w styl skandynawski oraz klasyczny. Z kolei stopnie z blachy pasują do stylu industrialnego oraz nowoczesnego. Projekty mogą być oczywiście modyfikowane w taki sposób, aby lepiej spełnić indywidualne potrzeby oraz oczekiwania naszych klientów."
                        ]),
                        new OfferDetailsSegmentModel("Czym odznaczają się schody spiralne Julia?", [
                            "Każdy realizowany przez naszą firmę projekt stawia szczególny nacisk na maksymalne bezpieczeństwo oraz komfort klientów. Materiały wykorzystany w procesie produkcji są najpierw poddawane szczegółowej i starannej selekcji. Dzięki temu, oferowane przez nas schody odznaczają się maksymalną wytrzymałością oraz łatwością w codziennym czyszczeniu i konserwacji.",
                            "Ogromną zaletą jest również niebanalny wygląd, który za każdym razem cieszy nasze oczy. Schody spiralne Julia można wykorzystać w dowolnej aranżacji ze względu na bogatą paletę stosowanych materiałów. Kolejną ważną cechą jest praktyczność. Schody nie zajmują dużo miejsca, mogą łączyć ze sobą kilka pięter i sięgać dowolnej wysokości."
                        ]),
                        new OfferDetailsSegmentModel("Projekt dostosowany do potrzeb każdego klienta", [
                            "Dysponujemy wieloletnim doświadczeniem w produkcji nowoczesnych schodów spiralnych. Nasze produkty trafiały zarówno do domów prywatnych, jak również budynków biurowych. Jesteśmy otwarci na wszelkie propozycje i proponujemy niezbędne modyfikacje w projekcie, tak, aby schody spiralne Julia w pełni sprostały Twoim oczekiwaniom."
                        ]),
                    ]);
                    break;
                case "ola":
                    
                    break;
            }

            $this->view("Offer/details", $model, []);
            return;
        }

        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "spiralne");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/spiral/$name.jpg", "schody $name", null, "offer/spiral/$name"));
        }

        $this->view("Offer/category", $model, []);
    }

    public function wood($mark = null)
    {
        $names = ["beata", "klasyczne", "jednobelkowe"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferDetailsModel();
            $model->header = new LabelModel();
            $model->header->addLine("schody ", $mark);

            switch ($mark)
            {
                case "patryk":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "dawid":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
            }

            $this->view("Offer/details", $model, []);
            return;
        }

        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "drewniane");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/wood/$name.jpg", "schody drewniane $name", null, "offer/wood/$name"));
        }

        $this->view("Offer/category", $model, []);
    }

    public function woodsteel($mark = null)
    {
        $names = ["patryk", "dawid", "ada", "ignacy", "patryko-rzymskie", "rzymskie", "tymon", "natalia", "matylda", "bartek", "ceownikowe", "krzysia", "klara", "franek", "kuba", "jeremi", "tytus"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferDetailsModel();
            $model->header = new LabelModel();
            $model->header->addLine("schody ", $mark);

            switch ($mark)
            {
                case "patryk":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "dawid":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
            }

            $this->view("Offer/details", $model, []);
            return;
        }

        $model = new OfferCategoryModel();
        $model->header = new LabelModel();
        $model->header->addLine("schody ", "drewniano stalowe");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$name.jpg", "schody $name", null, "offer/woodsteel/$name"));
        }

        $this->view("Offer/category", $model, []);
    }
}