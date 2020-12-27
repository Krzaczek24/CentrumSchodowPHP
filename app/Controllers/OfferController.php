<?php

namespace CS\Controllers;

use CS\Core\Controller;
use CS\Enums\OfferGalleryMode;
use CS\ViewModels\OfferModel;
use CS\Models\Frontend\Gallery\GalleryElementModel;
use CS\Models\Frontend\SlideInLabel\LabelLineModel;
use CS\Models\Frontend\SlideInLabel\LabelModel;
use CS\ViewModels\OfferDetailsSegmentModel;

/**
 * Offer page controller
 * @author Tomasz Drewek <tomaszdrewek94@gmail.com>
 */
class OfferController extends Controller
{
    public function index()
    {
        $model = new OfferModel(OfferGalleryMode::Tiles);
        $model->getPageHeader()->addLine("nasza ", "oferta");
        $model->setGallery([
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/wood-steel.jpg",    "schody stalowo-drewniane", null, "offer/woodsteel"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/carpet.jpg",        "schody dywanowe",          null, "offer/carpet"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/spiral.jpg",        "schody spiralne",          null, "offer/spiral"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/concrete.jpg",      "schody na beton",          null, "offer/concrete"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/shelf.jpg",         "schody półkowe",           null, "offer/shelf"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/wood.jpg",          "schody drewniane",         null, "offer/wood"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/small.jpg",         "małe schody",              null, "offer/small"),
            new GalleryElementModel("/public/extras/images/gallery/offer/stairs-types/balustrades.jpg",   "balustrady i poręcze",     null, "offer/balustrades")
        ]);

        $this->view("Offer/index", $model, []);
    }

    public function balustrades()
    {
        $model = new OfferModel(OfferGalleryMode::Tiles);
        $model->getPageHeader()->addLine("balustrady ", "i poręcze");

        for ($i = 1; $i <= 21; $i++)
        {
            $model->addGalleryElement(new GalleryElementModel("/public/extras/images/gallery/offer/ballustrades/b$i.jpg", "B$i",  null, null));
        }

        $this->view("Offer/index", $model, []);
    }

    public function carpet()
    {
        $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
        $model->getPageHeader()->addLine("schody ", "dywanowe");

        $this->view("Offer/index", $model, []);
    }

    public function concrete()
    {
        $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
        $model->getPageHeader()->addLine("schody ", "betownowe");

        $this->view("Offer/index", $model, []);
    }
    
    public function shelf()
    {
        $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
        $model->getPageHeader()->addLine("schody ", "półkowe");

        $this->view("Offer/index", $model, []);
    }

    public function small($mark = null)
    {
        $names = ["jednobelkowe", "modulowe", "stalowe", "drewniane"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);

            switch ($mark)
            {
                case "jednobelkowe":
                    $model->getPageHeader()->addLine("kaczki ", "jednobelkowe");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Jednobelkowe schody kaczki", [
                            "Schody to inwestycja na długie lata, dlatego ich wybór nie powinien być przypadkowy. Zanim podejmiemy decyzję o zakupie konkretnego rodzaju schodów, powinniśmy dokładnie przemyśleć, jakie mamy względem nich oczekiwania, jaki efekt chcemy uzyskać i na czym nam najbardziej zależy. Oferta sprzedażowa jest bogata, dzięki czemu każdy powinien znaleźć u nas coś dla siebie. A jeśli pojawią się jakieś pytania, to my chętnie na wszystkie udzielimy odpowiedzi i postaramy się najlepiej, jak tylko potrafimy, doradzić w kwestii zakupu schodów. Rozważasz zakup schodów, jakie stanowią jednobelkowe stalowo – drewniane kaczki? Doskonały wybór i efekt, który będzie robił piorunujące wrażenie."
                        ]),
                        new OfferDetailsSegmentModel("Jednobelkowe schody kaczki do różnych rodzajów wnętrz", [
                            "Jesteś posiadaczem domku o niewielkim metrażu i zależy Ci na tym, żeby schody zabierały jak najmniej wolnej przestrzeni? Wobec tego doskonałym wyborem będą jednobelkowe schody kaczki. Ich montaż szczególnie poleca się w dość małych i wąskich pomieszczeniach. Ten rodzaj schodów często wybierany jest w przypadku poddaszy oraz antresoli. Choć nic nie stoi na przeszkodzie, żeby znalazły się we wnętrzu dużym i przestronnym. Dobór schodów w dużej mierze zależy od indywidualnych preferencji i gustu. Najważniejsze jest tylko to, żeby były one wysokiej jakości, bowiem dzięki temu będą łatwe w utrzymaniu, nie będzie na nich widać śladów użytkowania i będą się pięknie prezentowały mimo upływu lat. I właśnie takie są oferowane przez nas jednobelkowe schody kaczki."
                        ]),
                        new OfferDetailsSegmentModel("Jednobelkowe stalowo – drewniane kaczki – charakterystyka", [
                            "Jak już wspomnieliśmy, jednobelkowe stalowo – drewniane kaczki to znakomite schody do niewielkich domów, w których zależy nam na tym, żeby zabierały one jak najmniej miejsca. Typowe dla tego rodzaju stopni jest to, że mają one budowę naprzemienną, są bardziej strome i węższe od tradycyjnych schodów. Ale decydując się na taką konstrukcję, nie przytłaczamy małych pomieszczeń, a co więcej – dodajemy im lekkości. Stąd też schody te cieszą się dużą popularnością. Kaczki nazywane są też schodami rzymskimi, a ich nazwa wzięła się stąd, że zachodzące na siebie stopnie przywołują na myśl kaczy chód."
                        ]),
                        new OfferDetailsSegmentModel("Jednobelkowe schody kaczki bukowe i dębowe", [
                            "W naszym sklepie do nabycia są jednobelkowe schody kaczki wykonane z dębu oraz buku. Obydwa rodzaje drewna wyróżniają się znaczną odpornością na ścieranie oraz zarysowania. Nie bez znaczenia jest tutaj twardość drewna, która przekłada się na trwałość stopni. Schodom z naturalnego drewna nie można też z całą pewnością odmówić oryginalnego designu, za który odpowiadają chociażby piękne słoje, które układają się w ciekawe wzory. A co z balustradami? Te mogą być wykonane ze stali nierdzewnej lub stanowić połączenie drewna i metalu. Wybierz to, co bardziej Ci odpowiada i stwórz dom swoich marzeń.",
                            "Jednobelkowe schody kaczki, jakie posiadamy w swojej ofercie, zapewniają komfortowe poruszanie się między kondygnacjami, wyróżniają się wysoką jakością, dbałością o każdy detal i trwałością. Idealnie wkomponują się we wnętrze nowoczesne, jak i klasyczne."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/belkowe/1/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("jednobelkowe ", "1")], ["konstrukcja nośna metalowa jednobelkowa", "stopnie dębowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/belkowe/2/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("jednobelkowe ", "2")], ["konstrukcja nośna metalowa jednobelkowa", "stopnie bukowe", "balustrada drewniano-metalowa"]))
                    ]);

                    break;

                case "modulowe":
                    $model->getPageHeader()->addLine("kaczki ", "modułowe");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Modułowe schody kaczki", [
                            "Masz dom o niewielkim metrażu albo małe dwukondygnacyjne mieszkanie i szukasz schodów, które zajmą jak najmniej miejsca? W takim razie naszą propozycją są modułowe schody kaczki. Ten typ schodów jest tak naprawdę na każdy wymiar i doskonale wpisze się nawet w wyjątkowo ciasne i wąskie pomieszczenia. Ale mówiąc o funkcjonalności i praktyczności kaczek, nie można zapominać o ich ciekawym designie. Jednym słowem są to schody, które kryją w sobie wiele zalet i dlatego warto w nie zainwestować, szczególnie jeśli zależy nam na zachowaniu maksymalnej ilości wolnej przestrzeni."
                        ]),
                        new OfferDetailsSegmentModel("Modułowe schody kaczki dopasowane do potrzeb", [
                            "Wybierając schody, często napotykamy na różne problemy. Bywa, że coś, co nam się spodobało, nie jest odpowiednie do naszego wnętrza, ma zbyt duże gabaryty albo cena przewyższa nasze możliwości. Na szczęście my potrafimy temu zaradzić i sprawić, aby klient otrzymał to, co mu się podoba i pasuje do jego wnętrza w bardzo atrakcyjnej cenie. I tak właśnie jest z produktem, jaki stanowią modułowe schody kaczki. Jeżeli wszystkie dotychczas oglądane schody miały zbyt duże wymiary do naszego domu, to idealną propozycją powinny okazać się kaczki modułowe. Ze względu na swoje niewielkie rozmiary będą pasowały nawet do wyjątkowo trudnych i wymagających pod względem aranżacji wnętrz."
                        ]),
                        new OfferDetailsSegmentModel("Kaczki modułowe, czyli szybko, tanio i efektownie", [
                            "Kaczki modułowe, jak sama nazwa wskazuje, to konstrukcja  składająca się  się z gotowych stalowych modułów, które wymagają wyłącznie połączenia, aby utworzyć pięknie wyglądające schody. Tym samym montaż takich schodów jest bardzo szybki i sprawny. Moduły mają też tę zaletę, że dają wiele możliwości, jeśli chodzi o ostateczny kształt schodów, jaki chcemy uzyskać. Możemy zamontować je w linii prostej, w kształcie łuku lub litery Z. Wszystko zależy od indywidualnych preferencji oraz możliwości metrażowych. Przy projektowaniu schodów warto wziąć też pod uwagę funkcjonalność. Modułowe schody kaczki w kształcie litery S będą się ciekawie prezentowały, ale wnoszenie na piętro np. mebli czy innych przedmiotów o dużych gabarytach może wiązać się z niedogodnościami. Dlatego, biorąc pod uwagę powyższy aspekt, najlepiej sprawdzają się kaczki modułowe zamontowane w linii prostej. Ale decyzja odnośnie tego, jaki kształt schodów chcemy posiadać w swoim domu, zależy wyłącznie od nas – użytkowników, a kaczki modułowe dają wiele możliwości."
                        ]),
                        new OfferDetailsSegmentModel("Modułowe schody kaczki w różnych wariantach", [
                            "Schody bez wątpienia muszą być funkcjonalne, ale też dobrze wpisywać się w wystrój domu. Stąd też w swojej ofercie mamy kaczki modułowe wykonane z różnego rodzaju drewna – buku i jesionu. W zależności od efektu, jaki chcemy uzyskać, możemy wybrać drewno w kolorze jasnym, które optycznie powiększy wnętrze lub w kolorze ciemnym, pięknie prezentującym się w połączeniu ze srebrnymi elementami konstrukcji.",
                            "Modułowe schody kaczki to połączenie prostoty i elegancji. Idealnie pasują do małych wnętrz i umożliwiają maksymalne dopasowanie ich do wolnej przestrzeni. Doskonale wpisują się w pomieszczenia urządzone w stylu nowoczesnym, jak i klasycznym."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/modułowe/1/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("modułowe ", "1")], ["konstrukcja nośna modułowa", "stopnie bukowe", "balustrada z pionowymi wypełnieniami"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/modułowe/2/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("modułowe ", "2")], ["konstrukcja nośna modułowa", "stopnie jesionowe", "balustrada \"fajkowa\""])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/modułowe/3/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("modułowe ", "3")], ["konstrukcja nośna modułowa", "stopnie bukowe", "balustrada \"fajkowa\""]))
                    ]);

                    break;

                case "stalowe":
                    $model->getPageHeader()->addLine("kaczki ", "stalowe");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Stalowe schody kaczki", [
                            "Nie lubisz popularnych rozwiązań, cenisz oryginalny styl i szukasz unikatowych schodów do swojego nowego domu? Wobec tego powinny Cię zainteresować stalowe schody kaczki, które nie często są spotykane we wnętrzach mieszkalnych. Zazwyczaj ten rodzaj schodów znajduje zastosowanie w zakładach pracy, jak również stal jest popularnym materiałem, z jakiego wykonywane są schody zewnętrzne. Nie wiedzieć czemu nie doceniamy go we wnętrzach, a jest to błąd, ponieważ kaczki stalowe znakomicie prezentują się w pomieszczeniach, które urządzone są w stylu nowoczesnym. Takie schody to prawdziwa wisienka na torcie. Dodaje uroku, a przy tym umożliwia komfortowe przemieszczanie się między kondygnacjami."
                        ]),
                        new OfferDetailsSegmentModel("Stalowe schody kaczki i ich liczne zalety", [
                            "Schody to inwestycja na lata, co oznacza, że przy ich wyborze powinniśmy kierować się nie tylko wyglądem, ale też wysoką jakością. To idealne połączenie znajdziemy w schodach stalowych, które są kwintesencją piękna, trwałości oraz funkcjonalności. Jedną z większych zalet, jakimi charakteryzują się te schody, jest to, że w większości zajmują mniej miejsca niż schody wykonane z drewna, a przy tym mają lżejszą, mniej toporną konstrukcję. Choć wśród nowoczesnych schodów drewnianych tez możemy znaleźć takie, które wręcz stworzone zostały z myślą o małych pomieszczeniach. Pamiętajmy o tym, że stalowe schody kaczki to nie tylko stopnie, ale również efektowne balustrady. Takie schody prezentują się bardzo nowocześnie, są stylowe, a co nie mniej ważne, ich montaż nie jest skomplikowany, dzięki czemu w krótkim czasie możemy stać się posiadaczami odmienionego wnętrza."
                        ]),
                        new OfferDetailsSegmentModel("Kaczki stalowe czyli piękno tkwi w prostocie", [
                            "Stylowe schody, aby robiły wrażenie, nie muszą być  drewniane i stanowić olbrzymiej konstrukcji. Kaczki stalowe, które należą do najmniejszych stopni, jakie tylko można wyprodukować, również mogą zapierać dech w piersiach i zachwycać swoim designem. Dowodem na to są oferowane przez schody stalowe, których konstrukcja nośna wykonana została z policzków metalowych, natomiast stopnie z blachy ryflowanej. Co jest charakterystyczne dla stopni kaczych, to zwężenie z jednej strony, podczas gdy standardowa szerokość znajduje się tylko po stronie drugiej. Tak oryginalne schody ułożone są naprzemiennie, co zapewnia komfortowe wchodzenie na górę oraz schodzenie w dół, mimo dość dużego stopnia nachylenia. Kaczki stalowe często stosowane są na poddaszach oraz przy antresolach."
                        ]),
                        new OfferDetailsSegmentModel("Stalowe schody kaczki i metalowa balustrada", [
                            "W aranżacji wnętrz ważne jest to, żeby utrzymywać spójność. Stąd też, jeśli stopnie schodów wykonane są ze stali, to balustrada powinna z nimi idealnie współgrać. W dostępnych u nas schodach metalowych balustrada wykonana jest z metalu, a na uwagę zasługują wycinane w nim wzory. Stalowe schody kaczki w wersji białej są urokliwą ozdobą wnętrz w stylu skandynawskim, minimalistycznym oraz nowoczesnym.",
                            "Stalowe schody kaczki o nowoczesnym designie to doskonała propozycja do wnętrz niebanalnych, o niewielkim metrażu, w których chcemy postawić na funkcjonalność, wysoką jakość, trwałość i efektowność."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/stalowe/1/1.jpg", null, new LabelModel([new LabelLineModel("kaczki stalowe"), new LabelLineModel("", "1")], ["konstrukcja nośna z policzków metalowych", "stopnie z blachy ryflowanej", "balustrada metalowa z wycinanymi wzorami"]))
                    ]);

                    break;

                case "drewniane":
                    $model->getPageHeader()->addLine("kaczki ", "drewniane");

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/drewniane/1/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("drewniane ", "1")], ["konstrukcja nośna z policzków drewnianych", "stopnie bukowe", "balustrada drewniano-metalowa"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/small/drewniane/2/1.jpg", null, new LabelModel([new LabelLineModel("kaczki"), new LabelLineModel("drewniane ", "2")], ["konstrukcja nośna z drewnianych regałów", "stopnie bukowe", "pochwyt metalowy"]))
                    ]);

                    break;
            }
        }
        else
        {
            $model = new OfferModel(OfferGalleryMode::Tiles);
            $model->getPageHeader()->addLine("schody ", "małe");
            $model->setGallery([
                new GalleryElementModel("/public/extras/images/gallery/offer/small/jednobelkowe.jpg", "schody kaczki jednobelkowe", null, "offer/small/jednobelkowe"),
                new GalleryElementModel("/public/extras/images/gallery/offer/small/modulowe.jpg", "schody kaczki modułowe", null, "offer/small/modulowe"),
                new GalleryElementModel("/public/extras/images/gallery/offer/small/stalowe.jpg", "schody kaczki stalowe", null, "offer/small/stalowe"),
                new GalleryElementModel("/public/extras/images/gallery/offer/small/drewniane.jpg", "schody kaczki drewniane", null, "offer/small/drewniane")
            ]);
        }

        $this->view("Offer/index", $model, []);
    }

    public function spiral($mark = null)
    {
        $names = ["julia", "ola", "sandra", "sylwia", "kasandra", "kamila", "lila", "linda", "tania"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
            $model->getPageHeader()->addLine("schody spiralne ", $mark);

            switch ($mark)
            {
                case "julia":
                    $model->setTextParagraphs([
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

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/1/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "1")], ["konstrukcja nośna z słupa centralnego oraz giętego policzka metalowego", "stopnie metalowe", "balustrada metalowa z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/2/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "2")], ["konstrukcja nośna ze słupa centralnego i giętego policzka metalowego", "stopnie z blachy ryflowanej", "balustrada okalająca na piętrze"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/3/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "3")], ["konstrukcja nośna z słupa centralnego oraz giętego policzka metalowego", "stopnie metalowe", "balustrada metalowa z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/4/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "4")], ["konstrukcja nośna ze słupa centralnego i giętego policzka metalowego", "stopnie z blachy gładkiej", "pochwyt gięty stalowy na schodach"]))
                    ]);
                    break;
                case "ola":
                    
                    break;
                case "sandra":
                
                    break;
                case "sylwia":
            
                    break;
                case "kasandra":
        
                    break;
                case "kamila":
    
                    break;
                case "lila":

                    break;
                case "linda":

                    break;
                case "tania":

                    break;
            }
        }
        else
        {
            $model = new OfferModel(OfferGalleryMode::Tiles);
            $model->getPageHeader()->addLine("schody ", "spiralne");

            $model->setTextParagraphs([
                new OfferDetailsSegmentModel("Schody spiralne – kiedy warto postawić na to rozwiązanie?", [
                    "Spiralne schody to świetny wybór do budynków, w których chcemy zachować dużą przestronność i komfort użytkowy. Takie modele zajmują bardzo mało miejsca, a co więcej, mogą być dostosowane do potrzeb klientów. W naszej ofercie dostępnych jest dziewięć innowacyjnych projektów schodów kręconych. Dzięki temu, każdy klient może znaleźć model w pełni pasujący do aranżacji wnętrza."
                ]),
                new OfferDetailsSegmentModel("Jakie materiały są wykorzystywane przy schodach kręconych?", [
                    "Wybór materiału zależy oczywiście od określonego elementu schodów. Szczeble najczęściej wykonuje się z wytrzymałego drewna dębowego, choć w naszej ofercie znajdziesz również stopnie granitowe położone na zabudowie wykonanej z karton gipsu. Prawdziwie awangardowym rozwiązaniem są szczeble wykonane z hartowanego szkła.",
                    "Zabudowa balustrady jest zazwyczaj wykonana ze stali nierdzewnej. W naszych modelach stosujemy zarówno stal jasną, jak i ciemniejsze odcienie. Sama poręcz może być natomiast wykonana z drewna komponującego się ze stopniami. W naszych projektach stawiamy na lekkość konstrukcji, dzięki czemu, nowoczesne schody spiralne stanowią doskonały element dekoracyjny wnętrza. To rozwiązanie można dostosować do każdej aranżacji."
                ]),
                new OfferDetailsSegmentModel("Kiedy warto wybrać schody kręcone?", [
                    "Spiralne schody stanowią świetną propozycję do domu, gdy nie dysponujemy dużym i przestronnym wnętrzem. Wówczas, możemy zdecydować się na funkcjonalny model, który nie zajmuje dużo miejsca, a jednocześnie, pozwala dotrzeć na dowolną wysokość. To wyjątkowo wygodne rozwiązanie, które można w każdej sytuacji dostosować do potrzeb klienta. Niemniej jednak, nowoczesne schody kręcone świetnie komponują się także z wolną przestrzenią i mogą zostać umieszczone na środku eleganckiego patio. Taka aranżacja bardzo ładnie prezentuje się w budynkach biurowych."
                ]),
                new OfferDetailsSegmentModel("Czym charakteryzują się schody spiralne w naszej ofercie?", [
                    "Każdy projekt tworzymy z myślą o maksymalnym komforcie oraz bezpieczeństwie użytkowników. Stosujemy starannie wyselekcjonowane materiały odznaczające się wysoką wytrzymałością, a także łatwością w czyszczeniu oraz konserwacji. Dzięki temu, nasze schody spiralne przez wiele lat zachwycają swoim wyglądem. Specyfika takich modeli sprawia, że projekt może zostać zrealizowany zgodnie z indywidualnymi potrzebami każdego klienta. W ciągu wieloletniej działalności na rynku, nowoczesne schody spiralne dostarczaliśmy zarówno do budynków biurowych, jak również domów prywatnych."
                ]),
                new OfferDetailsSegmentModel("Kręcony schody idealnie pasują do każdego wnętrza", [
                    "Mnogość materiałów, a także możliwość wprowadzenia modyfikacji na życzenia klienta to gwarancja uzyskania projektu doskonale komponującego się z każdym wnętrzem. Jesteśmy otwarci na propozycję oraz chętnie zrealizujemy projekt zgodny z Twoimi indywidualnymi oczekiwaniami. Dysponujemy wieloletnim doświadczeniem w produkcji schodów kręconych stosowanych we wnętrzach klasycznych oraz nowoczesnych."
                ]),
            ]);
    
            foreach ($names as $name)
            {
                $model->addGalleryElement(new GalleryElementModel("/public/extras/images/gallery/offer/spiral/$name.jpg", "schody $name", null, "offer/spiral/$name"));
            }
        }

        $this->view("Offer/index", $model, []);
    }

    public function wood($mark = null)
    {
        $names = ["beata", "klasyczne", "jednobelkowe"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
            $model->getPageHeader()->addLine("schody ", $mark);

            switch ($mark)
            {
                case "patryk":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "dawid":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
            }

            $this->view("Offer/index", $model, []);
            return;
        }

        $model = new OfferModel(OfferGalleryMode::Tiles);
        $model->getPageHeader()->addLine("schody ", "drewniane");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/wood/$name.jpg", "schody drewniane $name", null, "offer/wood/$name"));
        }

        $this->view("Offer/index", $model, []);
    }

    public function woodsteel($mark = null)
    {
        $names = ["patryk", "dawid", "ada", "ignacy", "patryko-rzymskie", "rzymskie", "tymon", "natalia", "matylda", "bartek", "ceownikowe", "krzysia", "klara", "franek", "kuba", "jeremi", "tytus"];

        if ($mark !== null && in_array($mark, $names))
        {
            $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
            $model->getPageHeader()->addLine("schody ", $mark);

            switch ($mark)
            {
                case "patryk":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
                case "dawid":
                    $this->view("Error/index", null, ["code" => 404]);
                    break;
            }

            $this->view("Offer/index", $model, []);
            return;
        }

        $model = new OfferModel(OfferGalleryMode::Tiles);
        $model->getPageHeader()->addLine("schody ", "drewniano stalowe");

        foreach ($names as $name)
        {
            array_push($model->tiles, new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$name.jpg", "schody $name", null, "offer/woodsteel/$name"));
        }

        $this->view("Offer/index", $model, []);
    }
}