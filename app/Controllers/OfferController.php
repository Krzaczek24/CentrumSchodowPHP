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

        $model->setTextParagraphs([
            new OfferDetailsSegmentModel("Innowacyjne schody dywanowe z wytrzymałego dębu", [
                "Schody dywanowe prezentują się przepięknie w każdym wnętrzu. To prawdziwa innowacja, która stawia nie tylko na funkcjonalność, ale również na świetny i ponadczasowy wygląd. Co szczególnie istotne, ten model schodów można poddawać licznym modyfikacjom, aby uzyskać satysfakcjonujący efekt końcowy. Najlepszą rekomendacją dla schodów dywanowych są opinie klientów zachwyconych z finalnego rezultatu."
            ]),
            new OfferDetailsSegmentModel("Czym odznaczają się schody dywanowe?", [
                "Jest to specyficzna forma prowadzenia kolejnych stopni schodów, w taki sposób, aby przypominały one zwiewny dywan, który okala całą konstrukcję i swobodnie spływa w dół. Uzyskanie takiego efektu wizualnego nie jest proste, jednak nasze wieloletnie doświadczenie sprawia, że doskonale wiemy jak to zrobić. Nowoczesne schody dywanowe pozwalają zaoszczędzić dodatkową przestrzeń, są wyjątkowo funkcjonalne, a co więcej, stanowią wspaniałą dekorację wnętrza, która przyciąga wzrok."
            ]),
            new OfferDetailsSegmentModel("Z jakich materiałów wykonane są schody?", [
                "Stopnie wykonano z solidnego i ponadczasowego dębu w stonowanym, jaśniejszym odcieniu. Balustrada jest natomiast wykonana ze stali nierdzewnej. Jej obudowę wykonano z wytrzymałego i odpornego na zarysowania szkła hartowanego. Nowoczesne schody dywanowe w naszej ofercie mają grubość 8cm. Co szczególnie istotne, możemy zaprojektować specjalny podest po łuku, który pozwala zmienić kierunek schodów i bez trudu dostać się do każdej wysokości w budynku."
            ]),
            new OfferDetailsSegmentModel("Najważniejsze zalety schodów dywanowych", [
                "Ich głównym atutem jest oczywiści przepiękny i ponadczasowy wygląd. Schody dywanowe można zastosować zarówno w stonowanym stylu skandynawskim, klasycznym, jak również industrialnym. Dokładamy wszelkich starań, aby każdy projekt spełniał indywidualne oczekiwania naszego klienta. Proponujemy zatem niezbędne przeróbki w projekcie, tak, aby schody dywanowe idealnie pasowały do każdego pomieszczenia. Struktura schodów pozwala na zastosowanie ciekawej aranżacji oświetlenia ledowego.",
                "Ważną zaletą jest również funkcjonalność. Nowoczesne schody dywanowe nie zajmują dużo miejsca, a co więcej, mogą być doprowadzone na każdą wysokość. Wszystko za sprawą możliwości stworzenia specjalnego podestu po łuku. Wysoka balustrada zapewnia natomiast maksymalny poziom bezpieczeństwa. Zastosowane materiały odznaczają się odpornością na uszkodzenia mechaniczne, a jednocześnie, nie sprawiają trudności przy czyszczeniu oraz konserwacji. To model ceniony przez szerokie grono klientów."
            ]),
            new OfferDetailsSegmentModel("Czy warto wybrać schody dywanowe?", [
                "Jeśli zależy Ci na imponującym projekcie schodów, które za każdym razem będą cieszyć Twoje oczy, schody dywanowe to doskonałe rozwiązanie. Jak już mówiliśmy, sprawdzą się w każdym budynku, niezależnie od aranżacji wnętrza. Wytrzymałe materiały zostały poddane starannej selekcji, tak, aby zagwarantować klientom maksymalny poziom trwałości oraz komfortu użytkowego. W naszej ofercie znajdują się dwa projekty schodów dywanowych, które mogą zostać dostosowane do indywidualnych potrzeb klientów."
            ])
        ]);

        $model->setGallery([
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "1")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "2")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada wycinana z blachy"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "3")], ["schody dywanowe grubości 8 cm z podestem po łuku", "dębowe", "balustrada z szyby hartowanej z pochwytem metalowym"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "4")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada wycinana z blachy"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "5")], ["schody dywanowe grubości 10 cm", "dębowe", "balustrada częściowo obustronna z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/6/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "6")], ["schody dywanowe grubości 4,5 cm częściowo na betonie", "dębowe", "balustrada z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/7/1.png", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "7")], ["schody dywanowe grubości 8 cm", "bukowe malowane na biało", "balustrada  z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/carpet/8/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "8")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada stalowa spawana"]))
        ]);

        $this->view("Offer/index", $model, []);
    }

    public function concrete()
    {
        $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
        $model->getPageHeader()->addLine("schody ", "na beton");

        $model->setTextParagraphs([
            new OfferDetailsSegmentModel("Schody betonowe – jakość i solidność", [
                "Jednym z najpowszechniej używanych materiałów budowlanych jest oczywiście beton. Konstrukcje budowane z niego cechują się dużą wytrzymałością, dzięki czemu służą przez wiele lat. Nic dziwnego, że stosuje się go również do wykonywania schodów – zarówno w domach, jak też w obiektach publicznych. Jeśli jesteś zainteresowany schodami betonowymi w swoim budynku, niezależnie od jego przeznaczenia, koniecznie zapoznaj się z naszymi propozycjami."
            ]),
            new OfferDetailsSegmentModel("Bezpieczeństwo", [
                "Schody betonowe z racji swojej konstrukcji uważane są za jedne z bezpieczniejszych, na jakie można się zdecydować. Jest to idealne rozwiązanie dla osób, które mają obawy co do solidności i bezpieczeństwa konstrukcji schodów drewnianych lub wykonanych z innych materiałów. Betonowa konstrukcja to zawsze duża wytrzymałość i stabilność, co jest czymś bardzo pożądanym, gdy mówimy o schodach, po których mamy schodzić i wchodzić każdego dnia po kilka/kilkanaście razy dziennie."
            ]),
            new OfferDetailsSegmentModel("Eleganckie drewniane obłożenie", [
                "Swoją prostotą i masywnością schody betonowe mogą zniechęcać jednak wielu właścicielu prywatnych domów. Ich wygląd może być zbyt surowy. Czy jest sposób na to, aby uatrakcyjnić schody betonowe? Zastosować można na nich eleganckie, drewniane obłożenia. Dzięki temu schody betonowe zyskają elegancję i lekkość konstrukcji drewnianych, co z pewnością trafi w estetykę i gust nawet najbardziej wymagających klientów.",
                "Wśród oferowanych przez nas wzorów schodów drewnianych na beton odnajdziesz wiele interesujących propozycji. Oferujemy różne rodzaje obłożenia, zarówno na same stopnie, jak też obłożenia pełne – włącznie z podstopniami i listwami. Możesz w związku z tym wybrać wariant, który będzie estetyczny i praktyczny w Twoim wnętrzu. Ponadto stosujemy różne rodzaje drewna. Znajdzie się coś dla miłośników wyglądu drewna dębowego, jak i drewna bukowego."
            ]),
            new OfferDetailsSegmentModel("Wygodna balustrada", [
                "Solidna konstrukcja betonowa, a także zastosowanie wysokiej jakości drewna na schodach to wciąż nie wszystko, czego potrzeba, aby zapewnić Twoim schodom drewnianym na beton wyjątkowy wygląd oraz bezpieczeństwo użytkownikowi. Kolejnym elementem schodów, do którego wykonania przykładamy dużą wagę, jest przecież jeszcze balustrada. Balustrady również wykonujemy w różny sposób – w zależności od wzoru schodów, który wybierzesz. Wykonujemy balustrady drewniane, ze stali nierdzewnej, czy szyby hartowanej. Możesz postawić zatem na rozwiązanie, które najlepiej trafi w Twój gust i będzie pasować do wnętrza Twojego domu. Wspólną cechą wszystkich z wymienionych opcji jest jednak przede wszystkim ich solidne wykonanie, gwarantujące bezpieczeństwo każdej osobie korzystającej ze schodów."
            ])
        ]);

        $model->setGallery([
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["obłożenie dywanowe", "stopnie i podstopnie dębowe o grubości 4 cm", "balustrada szklana z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "2")], ["stopnie i listwy przyścienne bukowe", "balustrada drewniano-metalowa"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "3")], ["obłożenie pełne (stopnie, podstopnie, listwy)", "drewno dębowe", "balustrada z elementami kutymi"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "4")], ["obłożenie pełne (stopnie, podstopnie, listwy)", "drewno bukowe", "balustrada ze stali nierdzewnej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "5")], ["obłożenie pełne (stopnie, podstopnie, listwy)", "drewno bukowe", "balustrada z giętym pochwytem drewnianym"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "6")], ["stopnie i listwy podstopnicowe", "drewno merbau"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/concrete/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "7")], ["obłożenie pełne (stopnie, podstopnie, listwy)", "drewno bukowe", "balustrada z giętym pochwytem drewnianym"]))
        ]);

        $this->view("Offer/index", $model, []);
    }
    
    public function shelf()
    {
        $model = new OfferModel(OfferGalleryMode::InvertedSideBySide);
        $model->getPageHeader()->addLine("schody ", "półkowe");

        $model->setTextParagraphs([
            new OfferDetailsSegmentModel("Schody półkowe – hit dla miłośników nowoczesnych rozwiązań", [
                "Wielu klientów poszukuje do swoich domów rozwiązań nowoczesnych, wyróżniających się swoją estetyką i kreatywnością. Nie wszystkim odpowiadają klasyczne, drewniane lub betonowe konstrukcje schodów. Również o takich klientach nie mogliśmy więc zapomnieć i mamy coś, co z pewnością odnajdzie się w każdym nowoczesnym wnętrzu, gdzie nie ma miejsca na estetyczne kompromisy i nudne, sztampowe rozwiązania. Zobacz, dlaczego wybrać schody półkowe."
            ]),
            new OfferDetailsSegmentModel("Wyjątkowa konstrukcja", [
                "Schody półkowe bez wątpienia wyróżniają się swoją konstrukcją, która jest zupełnie inna od np. klasycznie wylewanych schodów betonowych. Czym tak bardzo się one wyróżniają? Stopnie mocuje się bezpośrednio do ściany nośnej i są one jedynymi elementami schodów, po których chodzimy. Oznacza to, że nie mamy podstopni ani żadnej widocznej konstrukcji – przestrzeń pomiędzy stopniami jest pusta, przez co wyglądają one tak, jakby wisiały w powietrzu. Również mocowanie schodów w ścianie może być całkowicie ukryte. Efekt, jaki uzyskasz, będzie niepowtarzalny i zaimponuje nawet najbardziej wybrednemu miłośnikowi nowoczesnych i nietypowych rozwiązań aranżacyjnych w domach i mieszkaniach."
            ]),
            new OfferDetailsSegmentModel("Stwórz unikatowy wystrój wnętrza", [
                "Drewniane i stalowe schody półkowe możliwe są do wykonania praktycznie w każdym wnętrzu. Są jednak aranżacje domów i mieszkań, w których taki rodzaj schodów sprawdzi się w wyjątkowy sposób. Minimalistyczna konstrukcja stopni-półek sprawia, że schody takie doskonale uzupełnią wnętrze urządzone właśnie w stylu minimalistycznym. Mowa o wszelkich rustykalnych, czy skandynawskich aranżacjach. Z drugiej strony, wszelkie nietypowe, kreatywne rozwiązania to cecha wnętrz designerskich i nowoczesnych – do nich więc również można odpowiednio wkomponować swoje schody półkowe. Jak widać, nie jest to propozycja przeznaczona dla wąskiego grona klientów – nietuzinkowa konstrukcja powoduje, że, wbrew pozorom, można ją wykorzystać w wielu różnorodnie urządzonych domach."
            ]),
            new OfferDetailsSegmentModel("Kreatywne i bezpieczne rozwiązanie", [
                "Wygląd stalowych schodów półkowych to nie jest wszystko, na czym zależy każdemu klientowi. Schody powinny przecież wygodnie i bezpiecznie służyć domownikom. Jest to w tym przypadku tym ważniejsze, gdyż pomiędzy stopniami mamy pustą przestrzeń. Proponujemy w związku z tym sprawdzone rozwiązania, które gwarantują użytkownikom schodów w Twoim domu maksymalny poziom bezpieczeństwa. Każda konstrukcja wykonywana jest w precyzyjny, solidny sposób, dzięki czemu schody są stabilne i mogą służyć przez wiele lat. Ponadto zabezpieczysz osoby korzystające ze schodów balustradą. Możesz bowiem wybrać wzór schodów zarówno bez, jak i z balustradą z szyby hartowanej. Idealnie pasuje ona do designerskiej, nowocześnie prezentującej się konstrukcji schodów półkowych, a także skutecznie zabezpieczy przed upadkiem – nawet wszędzie tam, gdzie w domu znajdują się mniejsze dzieci.",
                "Jeśli nasze propozycje zainteresowały Cię, to sprawdź przykładowe schody wykonane przez naszych specjalistów, które zobaczysz poniżej i wybierz wyjątkowe, nietypowe schody półkowe do swojego wnętrza. Z chęcią wykonamy je również dla Ciebie."
            ])
        ]);

        $model->setGallery([
            new GalleryElementModel("/public/extras/images/gallery/offer/shelf/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("półkowe ", "1")], ["konstrukcja nośna stalowa maskowana w ścianie", "stopnie-kasty malowane na biało", "balustrada szklana z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/shelf/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("półkowe ", "2")], ["konstrukcja nośna stalowa maskowana w ścianie", "stopnie-kasty z drewna dębowego", "balustrada szklana z szyby hartowanej"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/shelf/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("półkowe ", "3")], ["konstrukcja nośna stalowa malowana proszkowo", "stopnie blaszano-bukowe"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/shelf/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("półkowe ", "4")], ["konstrukcja nośna stalowa maskowana w ścianie", "stopnie-kasty bukowe"])),
            new GalleryElementModel("/public/extras/images/gallery/offer/shelf/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("półkowe ", "5")], ["konstrukcja nośna stalowa malowana proszkowo", "stopnie-kasty malowane na biało"]))
        ]);

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
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/1/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "1")], ["konstrukcja nośna z słupa centralnego oraz giętego policzka metalowego", "stopnie metalowe", "balustrada metalowa z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/2/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "2")], ["konstrukcja nośna ze słupa centralnego i giętego policzka metalowego", "stopnie z blachy ryflowanej", "balustrada okalająca na piętrze"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/3/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "3")], ["konstrukcja nośna z słupa centralnego oraz giętego policzka metalowego", "stopnie metalowe", "balustrada metalowa z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/julia/4/1.jpg", null, new LabelModel([new LabelLineModel("julia ", "4")], ["konstrukcja nośna ze słupa centralnego i giętego policzka metalowego", "stopnie z blachy gładkiej", "pochwyt gięty stalowy na schodach"]))
                    ]);

                    break;

                case "ola":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody spiralne Ola", [
                            "Jeśli poszukujesz rozwiązania do swojego domu, które wyróżni się designem i będzie czymś, co odmieni całkowicie każde wnętrze, to powinieneś zastanowić się nad schodami spiralnymi. Jest to nic innego, jak schody na planie koła, stąd też ich często występujące określenie jako schody okrągłe. Oprócz planu, na jakim się je buduje, a raczej w wyniku tego planu, każdy ze schodków wyróżnia się innym kształtem – wśród schodów znajdziesz trapezy, prostokąty, a nawet trójkąty.",
                            "Jeśli zainteresowaliśmy Cię tematem, to poznaj nowoczesne schody spiralne Ola. To pomysł wyróżniający się nietuzinkowym wyglądem, który sprawdzi się w każdym wnętrzu, gdzie praktyka idzie w parze z unikatowym designem. Nie oznacza to jednak, że Ola nie będzie prezentować się dobrze w pomieszczeniach klasycznych, prostych."
                        ]),
                        new OfferDetailsSegmentModel("Wysokiej jakości drewno", [
                            "Tym, co sprawia, że schody spiralne Ola są doskonałe dla różnego rodzaju wnętrz, jest m.in. wysokiej jakości drewno, które stosujemy na stopniach. Dostępne są stopnie wykonane z drewna dębowego lub bukowego. To materiał ponadczasowy i elegancki, sprawiający, że nawet mimo nowoczesnego designu samych schodów, będą one dobrze prezentowały się we wnętrzach klasycznych. Perfekcyjne wykonanie i dbałość o każdy, nawet najdrobniejszy szczegół, powodują, że drewno takie wygląda zawsze pięknie i stylowo."
                        ]),
                        new OfferDetailsSegmentModel("Bezpieczeństwo i elegancja", [
                            "Estetyka powinna iść w parze z kwestiami bezpieczeństwa. Wchodzenie po schodkach o tak różnorodnym kształcie może nie być przecież początkowo łatwe dla małego dziecka, czy osoby starszej. Wsparcie zapewni będąca częścią schodów spiralnych Ola balustrada. Jest ona wyjątkowo solidna za sprawą metalowego wykonania, lecz elegancko wykończona drewnianym, giętym pochwytem. Całość daje masywny, ale też bardzo klasowy, subtelny efekt."
                        ]),
                        new OfferDetailsSegmentModel("Solidna konstrukcja", [
                            "Mówiąc o solidności i bezpieczeństwie, nie można nie wspomnieć o samej konstrukcji schodów spiralnych Ola. Składa się ona ze słupa centralnego i dystansów między stopniami lub drewnianych tulei. Jej doskonałe wykonanie zapewnia możliwość korzystania ze schodów przez długie lata, bez utraty walorów praktycznych ani estetycznych."
                        ]),
                        new OfferDetailsSegmentModel("Kiedy wybrać?", [
                            "Schody spiralne Ola to korzystna opcja nie tylko dla dużych, ale też mniejszych przestrzeni. Zajmują niewielką powierzchnię, a swoją prezencją, niemal wisząc w powietrzu, sprawiają wrażenie zwiększania przestrzenności danego wnętrza. Pomieszczenie z takim rodzajem schodów wydaje się lekkie i dynamiczne, co jest przewagą nad tradycyjnymi schodami, które, nieodpowiednio dobrane, mogą wydawać się topornymi i ograniczającymi przestrzeń."
                        ]),
                        new OfferDetailsSegmentModel("Centrum Schodów", [
                            "Zobacz wykonywane przez nas schody i poznaj nas lepiej. Zobacz na własne oczy, dlaczego warto zdecydować się na nowoczesne schody spiralne Ola. Zapewniamy najlepszą jakość wykonania oraz najwyższy poziom obsługi. Poznaj nasze 3 dostępne opcje tego rodzaju schodów – zobacz najlepsze projekty naszych specjalistów. Uatrakcyjnij każde wnętrze, dodając do niego funkcjonalność oraz ponadczasową estetykę w postaci nowoczesnych, lecz odpowiednich również do klasycznych wnętrz schodów spiralnych Ola."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/ola/1/1.jpg", null, new LabelModel([new LabelLineModel("ola ", "1")], ["konstrukcja nośna ze słupa centralnego i dystansów między stopniami", "stopnie bukowe", "balustrada metalowa z drewnianym giętym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/ola/2/1.jpg", null, new LabelModel([new LabelLineModel("ola ", "2")], ["konstrukcja nośna ze słupa centralnego z drewnianymi tulejami", "stopnie dębowe", "balustrada metalowa z drewnianym giętym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/ola/3/1.jpg", null, new LabelModel([new LabelLineModel("ola ", "3")], ["konstrukcja nośna ze słupa centralnego i dystansów między stopniami", "stopnie bukowe", "balustrada metalowa z drewnianym giętym pochwytem"]))
                    ]);
                    
                    break;

                case "sandra":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Czym są schody spiralne?", [
                            "Schody spiralne to opcja dla wszystkich tych, którzy cenią w swoich wnętrzach rozwiązania eleganckie, lecz nietypowe, przełamujące schematy i gwarantujące, że aranżacja pomieszczenia nigdy nie będzie nudna. Schody spiralne nazywane są bowiem schodami kręconymi ze względu na to, że budowane są na planie koła. Stopnie zakręcają, tworząc wyjątkowy efekt. Wśród zalet takiego typu schodów podkreśla się, że wyglądają one tak, jakby częściowo wisiały w powietrzu bez żadnego oparcia."
                        ]),
                        new OfferDetailsSegmentModel("Kręcone schody Sandra", [
                            "Jednym z modeli schodów, które oferujemy naszym klientom, jest model Sandra. Polecamy je zarówno, gdy poszukujesz uzupełnienia nowoczesnego wnętrza o unikalnym designie, jak też wówczas, gdy interesuje Cię klasyczny, lecz niebanalny, elegancki wystrój pomieszczenia. Jest to możliwe za sprawą unikalnego połączenia konstrukcji metalowych oraz drewna, które chcemy Ci zaproponować."
                        ]),
                        new OfferDetailsSegmentModel("Unikatowy styl", [
                            "Możemy zaproponować jedno z dwóch wykonań schodów Spiralnych Sandra. W obydwu stopnie tworzone są z drewna bukowego, a balustrada z giętym drewnianym pochwytem może być, do wyboru: metalowa lub ze stali nierdzewnej. Kreatywne połączenie wykonanej metodą laserową balustrady oraz wymienionych materiałów sprawia, że nie sposób przejść wobec schodów Sandra obojętnie. Pomimo stosunkowo prostego designu przykuwają wzrok i gustownie wieńczą każde wnętrze."
                        ]),
                        new OfferDetailsSegmentModel("Wysokie standardy bezpieczeństwa", [
                            "Bezpieczeństwo i stabilność całej konstrukcji kręconych schodów Sandra zapewniamy poprzez konstrukcję nośną ze słupa centralnego z dystansami między stopniami. O bezpieczeństwo korzystających ze schodów zadba natomiast stabilna balustrada, która zabezpieczy Cię przed spadkiem ze schodów przy przypadkowym potknięciu się, poślizgnięciu lub zachwianiu równowagi. To ponadto doskonałe zabezpieczenie w przypadku, gdy ze schodów korzystać mają dzieci lub osoby starsze."
                        ]),
                        new OfferDetailsSegmentModel("Uniwersalny wybór", [
                            "Po kręcone schody Sandra może sięgnąć zarówno miłośnik nowoczesnego budownictwa, ceniącego nietypowe elementy, jak też osoba ceniąca proste wnętrza. Pierwsza z nich na pewno doceni kreatywną konstrukcję schodów i efekt, jaki daje ich wykonanie na planie koła. Druga natomiast – zachwyci się wysokiej jakości bukowym drewnem, pasującym nawet do surowego, skandynawskiego stylu wystroju wnętrz. Zastosowanie we wnętrzu schodów spiralnych Sandra pozwoli optycznie powiększyć pomieszczenie, nadać mu lekkości, a także przełamać zbytnią statyczność i nudę. Nie odbiera to jednak niczego z solidności i stabilności całej konstrukcji schodów."
                        ]),
                        new OfferDetailsSegmentModel("Wysokiej jakości stylowe schody", [
                            "Zobacz wykonywane przez nas projekty i zaufaj naszym specjalistom. Nie boimy się łączyć tego, co nieoczywiste, aby stworzyć dla Ciebie coś wyjątkowego. Proponujemy rozwiązania proste, lecz zarazem kreatywne, mające na celu uzyskanie doskonałej harmonii z każdym pięknym, stylowym wnętrzem. Tworzymy w ten sposób niebanalne połączenie tego, co klasyczne z tym, co nowe, nieznane, nietypowe. Zaufaj naszym doświadczonym i kreatywnym specjalistom, aby móc cieszyć się rozwiązaniami takimi, jak schody spiralne Sandra w swojej domowej przestrzeni."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/sandra/1/1.jpg", null, new LabelModel([new LabelLineModel("sandra ", "1")], ["konstrukcja nośna ze słupa centralnego oraz dystansów między stopniami", "stopnie bukowe", "balustrada ze stali nierdzewnej z giętym drewnianym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/sandra/2/1.jpg", null, new LabelModel([new LabelLineModel("sandra ", "2")], ["konstrukcja nośna ze słupa centralnego oraz dystansów między stopniami", "stopnie bukowe", "balustrada metalowa z giętym drewnianym pochwytem"]))
                    ]);
                
                    break;

                case "sylwia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Połączenie estetyki z wygodą", [
                            "Nie ulega wątpliwości, że podczas wyboru schodów do wnętrza, kierujesz się głównie kwestiami praktycznymi. Schody mają przede wszystkim dobrze Ci służyć. Pozostaję one jednak częścią aranżacji i kompozycji danego pomieszczenia, więc zależy Ci również na tym, aby efektownie wyglądały. Tradycyjne schody często tracą ten element elegancji i pomysłowości, stając się po prostu kolejnym koniecznym elementem danego pomieszczenia. Traktowanie konieczności zamontowania schodów w ten sposób to jednak duży błąd, ponieważ tracisz wiele z tego, co mógłbyś dodać do aranżacji swojego wnętrza. Jaki będzie w związku z tym odpowiedni wybór, który połączy to, co praktyczne, z czymś nowocześniejszym, nietypowym? Sprawdź kręcone schody Sylwia."
                        ]),
                        new OfferDetailsSegmentModel("Schody spiralne Sylwia", [
                            "Przestawiamy model spiralnych schodów Sylwia. Tak jak inne schody tego typu, Sylwia tworzona jest na planie koła. Jest to kluczowy element odróżniający opisywane schody od innych modeli z rynku. Schody zakręcają bowiem, a poruszający się po nich użytkownik chodzi w rzeczywistości po okręgu aż do momentu dostania się na wyższy poziom.",
                            "Kręcone schody Sylwia cechują się najwyższą jakością wykonania. Użyliśmy do nich sprawdzonych materiałów, jakie nie tylko estetycznie wyglądają, ale też spełniają wszelkie standardy bezpieczeństwa. Konstrukcją nośną schodów jest słup centralny ze stali nierdzewnej wraz z dystansami między stopniami. Dzięki temu całość jest stabilna i masywna, pomimo swojej lekkości i elegancji. Stopnie wykonane są ze szkła, co oznacza, że będziesz widzieć przez nie to, co znajduje się pod schodami. Nie zapomnieliśmy oczywiście o bezpieczeństwie korzystających ze schodów. Co bowiem zrobić, gdy zachwiejesz się lub będziesz potrzebować podparcia podczas wnoszenia czegoś po schodach? Podparcie to zapewni Ci równie solidna i masywna balustrada ze stali nierdzewnej wraz z giętym pochwytem metalowym."
                        ]),
                        new OfferDetailsSegmentModel("Kiedy wybrać?", [
                            "Kręcone schody Sylwia są modelem odpowiednim do różnego rodzaju wnętrz, a także mogącym spełnić potrzeby wielu, nawet bardzo wymagających klientów. Kwestie estetyczne dzięki przezroczystym schodom oraz lekkiej, nietypowej konstrukcji zachwycą każdego. Detale te sprawiają, że będzie to model schodów pasujący do nowoczesnych, a nawet industrialnych wnętrz. Ci z Was, którzy ponad wygląd stawiają funkcjonalność i bezpieczeństwo, również nie będą zawiedzeni schodami spiralnymi Sylwia. Wygodna balustrada pozwoli korzystać ze schodów nawet osobom starszym oraz zabezpieczy najmłodszych domowników przed upadkiem z wysokości."
                        ]),
                        new OfferDetailsSegmentModel("Schody do każdego wnętrza", [
                            "Tworzymy rozwiązania, które pasują do każdego rodzaju wnętrz. Nie boimy łączyć się klasycznych elementów z tym, co modne i nowoczesne. Powstają w ten sposób projekty takie, jak kręcone schody Sylwia, które możesz zobaczyć poniżej. Tak wyjątkowe połączenie pozwala nam na dotarcie zarówno do klientów preferujących klasyczne, spokojniejsze elementy wystroju wnętrz, jak też do wszystkich tych, którym zależy na podążaniu za najnowszymi trendami. Wobec naszych produktów, jak np. schodów spiralnych Sylwia nie można pozostać obojętnym."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/sylwia/1/1.jpg", null, new LabelModel([new LabelLineModel("sylwia ", "1")], ["konstrukcja nośna ze stali nierdzewnej z słupem centralnym oraz dystansów między stopniami", "stopnie szklane", "balustrada ze stali nierdzewnej z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/sylwia/2/1.jpg", null, new LabelModel([new LabelLineModel("sylwia ", "2")], ["konstrukcja nośna ze stali nierdzewnej z słupem centralnym oraz dystansów między stopniami", "stopnie szklane", "balustrada ze stali nierdzewnej z giętym metalowym pochwytem"]))
                    ]);
            
                    break;
                    
                case "kasandra":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Dlaczego schody spiralne?", [
                            "W naszej ofercie posiadamy szeroki wybór schodów spiralnych. Dlaczego stawiamy na ten rodzaj schodów podczas tworzenia naszej oferty? Powodów jest kilka. Pierwszym z nich bez wątpienia jest nietypowa konstrukcja i, co za tym idzie, jej wyjątkowa estetyka. Schody spiralne, jak łatwo się domyślić, tworzone są na planie koła, przez co osoba korzystająca zakręca po okręgu, wchodząc na wyższy poziom. Jest to więc rozwiązanie znacząco różniące się od typowych schodów, które znamy chociażby z klatek schodowych w blokach. Konstrukcja taka daje wrażenie lekkości i według niektórych wygląda tak, jakby wisiała w powietrzu bez żadnego podparcia. Wiąże się z tym jeszcze jedna zaleta takich schodów – można wykorzystać je nawet na małej przestrzeni, nie przytłaczając jej. Schody mogą być w takich pomieszczeniach centralnym punktem ze względu na ich wyjątkowy wygląd, a nie toporność i duże rozmiary. Mówiąc o schodach spiralnych, należy też obalić mit, iż miałyby być one niewygodne i stwarzające zagrożenie chociażby dla małych dzieci. Wystarczy, aby były masywne i stabilne oraz miały zabezpieczenia takie, jak odpowiedniej wysokości balustrada z trwałego materiału, by poruszanie się po nich nie sprawiało nikomu większego kłopotu."
                        ]),
                        new OfferDetailsSegmentModel("Kręcone schody Kasandra", [
                            "Przedstawiamy model schodów spiralnych idealnie wpisujący się w opisany powyżej obraz pięknych i funkcjonalnych schodów na planie koła. Schody spiralne Kasandra to coś, co możemy z dumą i pełną świadomością polecić każdemu z naszych klientów. Tworzymy je, łącząc ze sobą różne materiały, wzmacniając jeszcze nietuzinkowy efekt wizualny – docierając do gustów zarówno bardziej tradycyjnych, jak też nowoczesnych klientów. Kręcone schody Kasandra posiadają konstrukcję nośną spawaną, obłożoną płytami gipsowo-kartonowymi, wykończoną stiukami dekoracyjnymi. Solidność balustrady zapewnia stal nierdzewna, z której jest wykonana oraz gięty metalowy pochwyt. Stopnie w tym modelu schodów mogą być wykonane z drewna bukowego lub granitu. Wszystkie wymienione elementy tworzą konstrukcję o wyjątkowych cechach. Jest to coś efektownego, lecz też eleganckiego, pełnego klasy, pasującego zarówno do nowoczesnych, designerskich wnętrz, jak też klasycznych, stylowych. W pierwszym wypadku schody takie będą idealnym dopełnieniem większego projektu aranżacyjnego – jeszcze jednym doskonale wpasowanym elementem całej koncepcji. W drugim z wymienionych przypadków schody spiralne Kasandra przełamią statyczność przestrzeni, nie naruszając jednak jej harmonii oraz elegancji."
                        ]),
                        new OfferDetailsSegmentModel("Najlepsi specjaliści", [
                            "Zaufaj nam i pozwól, abyśmy również dla Ciebie stworzyli projekt schodów idealnie dopasowanych do Twojego wnętrza. Być może również w Twoim domu lub obiekcie o innym charakterze doskonałym wyborem okażą się kręcone schody Kasandra. Każde pomieszczenie z odpowiednio dobranymi do niego schodami może stać się bardziej reprezentacyjne, stylowe, a także nowocześniejsze i ubarwiające przestrzeń. Sprawdź nasze projekty i skontaktuj się z nami – chętnie stworzymy schody również dla Ciebie."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/kasandra/1/1.jpg", null, new LabelModel([new LabelLineModel("kasandra ", "1")], ["konstrukcja nośna spawana stalowa obłożona płytami gipsowo-kartonowymi i wykończona stiukami dekoracyjnymi", "stopnie granitowe", "balustrada ze stali nierdzewnej z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/kasandra/2/1.jpg", null, new LabelModel([new LabelLineModel("kasandra ", "2")], ["konstrukcja nośna spawana stalowa obłożona płytami gipsowo-kartonowymi i wykończona stiukami dekoracyjnymi", "stopnie i podstopnie bukowe", "balustrada ze stali nierdzewnej z giętym metalowym pochwytem"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/kasandra/3/1.jpg", null, new LabelModel([new LabelLineModel("kasandra ", "3")], ["konstrukcja nośna spawana stalowa obłożona płytami gipsowo-kartonowymi i wykończona stiukami dekoracyjnymi", "stopnie granitowe", "balustrada ze stali nierdzewnej z giętym metalowym pochwytem"]))
                    ]);

                    break;

                case "kamila":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Nowoczesne schody spiralne Kamila", [
                            "Wybór odpowiednich schodów domu powinien być podyktowany kilkoma kluczowymi czynnikami – przede wszystkim dostępną przestrzenią oraz rozmieszczeniem pomieszczeń a także wystrojem jaki ma panować w domu. W przypadku domów o niższym metrażu, znakomitą propozycję stanowią schody spiralne które nie tylko pozwalają zaoszczędzić dużą ilość miejsca, ale również wywołują niebywałe wrażenie wizualne! Takie właśnie są nowoczesne schody spiralne Kamila, w których nowoczesność efektownie łączy się z klasyką."
                        ]),
                        new OfferDetailsSegmentModel("Drewniane schody w nowoczesnym domu i nie tylko", [
                            "Wyjątkowe walory estetyczne, jakimi może pochwalić się naturalne drewno, są właściwie bezdyskusyjne! Zastosowanie drewna we wnętrzach za każdym razem robi pozytywne wrażenie – ten naturalny surowiec pozwala wprowadzić do domu aurę ciepła i niepowtarzalnego klimatu, którego nie da się z niczym porównać. Trudno więc dyskutować z tym, że drewniane schody są znakomitym rozwiązaniem do każdego wnętrza!",
                            "Drewno ma szlachetny, a jednocześnie uniwersalny charakte r, dzięki czemu ładnie komponuje się z aranżacjami w różnych stylach. Warto jednak zadbać o to, aby surowiec ten powtórzył się w różnych elementach domowego wystroju, pozwalając na stworzenie wnętrza w którym panuje niebywały ład oraz harmonia."
                        ]),
                        new OfferDetailsSegmentModel("Do jakich wnętrz pasują schody Kamila?", [
                            "Schody spiralne Kamila w umiejętny sposób łączą w sobie nowoczesną linię z ponadczasową klasyką. Odnajdą się znakomicie właściwie w każdym wnętrzu, za każdym razem robiąc niebywałe wrażenie. Doskonale sprawdzą się w każdej nowoczesnej aranżacji, jak również w modnym wnętrzu w stylu skandynawskim lub hygge. Za sprawą swej niezwykle eleganckiej konstrukcji  skutecznie przyciągną spojrzenia i zachwycą nienagannym, drobiazgowym wykonaniem.",
                            "Nowoczesne schody spiralne Kamila oparte są na konstrukcji nośnej ze słupa centralnego z drewnianymi tulejami oraz giętym policzkiem z drewna. Stopnie wykonane są ze szlachetnego drewna bukowego które słynie z wysokiej trwałości oraz solidności, a przy tym prezentuje się niezwykle estetycznie i wyjątkowo.",
                            "Schody dodatkowo posiadają giętą balustradę, zapewniającą większe bezpieczeństwo oraz wygodę. Całość prezentuje się nadzwyczaj gustownie i stylowo sprawiając, że każda domowa aranżacja nabiera bardziej szlachetnego charakteru."
                        ]),
                        new OfferDetailsSegmentModel("Centrum Schodów – poznaj naszą firmę!", [
                            "Szczególnym atutem naszej firmy jest to, że możemy pochwalić się już ponad 20 – letnim doświadczeniem w swojej branży. Realizujemy projekty w całej Polsce, a także za granicą. W rezultacie mamy już ponad 6 tysięcy zadowolonych klientów, którzy mogli już przekonać się o wysokiej jakości naszych usług! Mamy również bogate doświadczenie w wykonywaniu nietypowych realizacji.",
                            "Nasza oferta to szeroki wybór schodów w różnych stylach. Jesteśmy przekonani, że każdy może u nas znaleźć idealne schody do swojego domu. Serdecznie zachęcamy do zapoznania się z ofertą naszej firmy i dopasowania optymalnego rozwiązania, adekwatnego do własnych potrzeb."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/kamila/1/1.jpg", null, new LabelModel([new LabelLineModel("kamila ", "1")], ["konstrukcja nośna ze słupa centralnego z drewnianymi tulejami i giętym policzkiem drewnianym", "stopnie bukowe", "balustrada gięta drewniana"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/kamila/2/1.jpg", null, new LabelModel([new LabelLineModel("kamila ", "2")], ["konstrukcja nośna ze słupa centralnego z drewnianymi tulejami i giętym policzkiem drewnianym", "stopnie bukowe", "balustrada z metalowymi tralkami i giętym pochwytem drewnianym"]))
                    ]);

                    break;

                case "lila":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody spiralne Lila", [
                            "Często stosowanym zabiegiem w nowoczesnych aranżacjach jest łączenie materiałów, które z pozoru wcale do siebie nie pasują. Doskonałym tego przykładem są kręcone schody Lila, idealne do każdego wnętrza w nowoczesnym stylu. Schody opierają się na malowanej proszkowo, metalowej konstrukcji, stopnie natomiast wykonane są z drewna bukowego. Ten niezwykle efektowny wariant schodów znakomicie sprawdzi się we wnętrzach, które nie dysponują pokaźnym metrażem. Wybierając spiralne schody możemy zaoszczędzić sporo miejsca i zyskać cenną przestrzeń."
                        ]),
                        new OfferDetailsSegmentModel("Wyjątkowe schody do nowoczesnych wnętrz", [
                            "Aranżacja nowoczesnego wnętrza wymaga starannego przemyślenia oraz zaplanowania. Bardzo ważne jest to, aby wszystkie elementy wystroju pasowały do siebie stylistycznie, tworząc spójną i estetyczną całość. Kręcone schody Lila doskonale wyglądają w towarzystwie drewnianych mebli oraz jasnego parkietu lub paneli. Pięknym tłem mogą być dla niego również modne, szare płytki podłogowe. Przyciągającym wzrok elementem jest spiralna metalowa konstrukcja nośna, która wykończona została designerską balustradą. Konstrukcja wykonana jest z giętych, pospawanych ze sobą policzków, zapewniających nienaganną trwałość. Malowany proszkowo metal w eleganckim, grafitowym kolorze prezentuje się stylowo i zapewnia ponadczasowy charakter. Uwagę przykuwają również wykonane z drewna bukowego stopnie, które mają niezwykle oryginalny i nietypowy kształt przypominający żagiel."
                        ]),
                        new OfferDetailsSegmentModel("Bukowe schody spiralne Lila – do jakich wnętrz pasują?", [
                            "Ze względu na swoją nowoczesną, niezwykle designerską formę, bukowe schody spiralne Lila dedykowane są aranżacjom w nowoczesnym stylu. Doskonale odnajdą się również w modnych wnętrzach modern classic, łączących w sobie klasykę z najnowszymi trendami. Te oryginalne schody w efektowny sposób dopełnią domową aranżację, zwracając na siebie uwagę nietypowym designem. Schody spiralne to świetne rozwiązanie nie tylko do wnętrz o ograniczonym metrażu. Wspaniale będą wyglądać również w przestronnym domu, a dzięki drobiazgowemu wykonaniu oraz wykorzystaniu najwyższej jakości materiałów, nawet po wielu latach wciąż będą zachwycać nienagannym i niezmiennym wyglądem!"
                        ]),
                        new OfferDetailsSegmentModel("Poznaj nasz oryginalne propozycje i wybierz najlepsze schody do własnego domu", [
                            "Firma Centrum-Schodów już od ponad 20 -stu lat zajmuje się realizowaniem rozmaitych projektów schodów na terenie całej Polski. Nasz wykwalifikowany zespół składa się ze specjalistów, którzy z pasją i zaangażowaniem wykonują swoją pracę. Rezultatem są tysiące zadowolonych klientów, którzy zdecydowali się skorzystać z naszych usług i dzięki temu mogą cieszyć się doskonale wykonanymi i niebywale wytrzymałymi schodami o nienagannej prezencji. Wykonujemy schody drewniane, metalowe, a także wiele innych. Dzięki temu każdy może znaleźć u nas coś odpowiedniego dla siebie. Zachęcamy do zapoznania się z szerokim wachlarzem możliwości, jakie oferuje nasza firma. Sprawdź nasze atrakcyjne propozycje i wybierz najlepszy wariant do swojego domu!"
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/lila/1/1.jpg", null, new LabelModel([new LabelLineModel("lila ", "1")], ["konstrukcja nośna z giętych i pospawanych policzków", "stopnie bukowe", "balustrada metalowa malowana proszkowo"]))
                    ]);

                    break;

                case "linda":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody spiralne Linda", [
                            "Już na etapie projektowania własnego domu musimy zastanowić się, jakie schody będą w nim najbardziej odpowiednie. Wybór uzależniony jest od wielu kwestii, w tym przede wszystkim od układu pomieszczeń oraz metrażu, jakim dysponujemy. W przypadku małych domów, doskonałe rozwiązanie stanowią schody o spiralnym układzie, takie jak nowoczesne, stalowo-drewniane schody spiralne Linda. Tą propozycję z pewnością doceni każdy, kto lubi nieszablonowe rozwiązania oraz ciekawą stylistykę. Pomimo swej prostej formy, schody skutecznie przykuwają uwagę i urzekają swą elegancją."
                        ]),
                        new OfferDetailsSegmentModel("Ciekawe połączenia materiałów w nowoczesnych wnętrzach", [
                            "Połączenie stali z drewnem jest często stosowanym zabiegiem w nowoczesnych aranżacjach. Takie rozwiązanie prezentuje się niezwykle ciekawie, a przy tym gwarantuje trwałość oraz odporność na najwyższym poziomie. Zastosowanie drewna pozwala skutecznie ocieplić surowy, chłodny charakter stali, dzięki czemu całość stwarza przyjemne wrażenie wizualne.",
                            "Schody spiralne Linda oparte są na solidnej konstrukcji nośnej ze stali nierdzewnej, ze słupem centralnym oraz dystansami. Stalowa balustrada wykończona jest giętą, drewnianą poręczą. Stopnie schodów zostały wykonane z drewna bukowego, wyróżniającego się niezwykle szlachetnym charakterem, znakomitymi parametrami oraz wysoką odpornością na zużycie. Tak unikalna budowa czyni nasze schody niezwykle wytrzymałymi i w pełni bezpiecznymi. Nawet po upływie wielu lat, wciąż mogą zachwycać niezmienioną formą, a przy tym nie wymagają szczególnej pielęgnacji i łatwo można je utrzymać w należytej czystości."
                        ]),
                        new OfferDetailsSegmentModel("Do jakich wnętrz pasują schody spiralne Linda?", [
                            "Te wyjątkowe schody o ponadczasowym charakterze doskonale podkreślą nowoczesną aranżację wnętrza i świetnie będą się prezentować w każdym domu, niezależnie od metrażu którym on dysponuje. Spiralna konstrukcja pozwala zaoszczędzić przestrzeń, a użycie najwyższej jakości materiałów pozwala cieszyć się nienaganną estetyką przez wiele lat. Kręcone bukowe schody Linda doskonale wyglądają na tle jasnych paneli oraz wykonanych z jasnego drewna mebli. Za sprawą stonowanej kolorystyki, zgrabnie wkomponują się w każdy wystrój i zapewnią wyjątkowe wrażenie."
                        ]),
                        new OfferDetailsSegmentModel("Poznaj szeroką ofertę firmy Centrum-Schodów!", [
                            "Jeśli poszukujesz rzetelnego wykonawcy który zrealizuje wymarzony projekt schodów w Twoim domu, a przy tym zagwarantuje jakość oraz trwałość na najwyższym poziomie, oferta naszej firmy z łatwością spełni Twoje oczekiwania! Możemy pochwalić się już ponad 20 – letnim doświadczeniem w swojej dziedzinie. Szczególne znaczenie ma dla nas zadowolenie naszych klientów, dlatego w pełni angażujemy się w każdy realizowany projekt. Ponadto wyróżnia nas bogate doświadczenie w podejmowaniu się nietypowych realizacji.",
                            "Oprócz wysokiego poziomu usług, dodatkowo zapewniamy niezwykle bogatą i zróżnicowaną ofertę w której dostępne są zarówno schody w stylu nowoczesnym, jak i klasycznym. Nie mamy żadnych wątpliwości, że każdy może u nas znaleźć idealny wariant schodów na miarę własnych potrzeb!"
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/linda/1/1.jpg", null, new LabelModel([new LabelLineModel("linda ", "1")], ["konstrukcja nośna ze stali nierdzewnej ze słupem centralnym oraz dystansów między stopniami", "stopnie bukowe", "balustrada ze stali nierdzewnej z giętym drewnianym pochwytem"]))
                    ]);

                    break;

                case "tania":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody spiralne Tania", [
                            "Ten nietuzinkowy wariant przypadnie do gustu miłośnikom designerskich, nowoczesnych form. Bukowe schody spiralne Tania posiadają konstrukcję nośną ze słupa centralnego oraz dystansów między stopniami. Uwagę zwraca charakterystyczna „fajkowa” balustrada, wykonana z metalu malowanego proszkowo. Stopnie schodów to najwyższej klasy drewno bukowe, które może pochwalić się znakomitą trwałością oraz odpornością na zużycie. Schody spiralne Tania pozwolą nam cieszyć oczy przez wiele lat, pozostając praktycznie w niezmienionej formie i skutecznie opierając się upływowi czasu."
                        ]),
                        new OfferDetailsSegmentModel("Znajdź najlepsze schody dla siebie i swojej rodziny!", [
                            "Jak wybrać idealnie dopasowane schody do swojego domu? Trzeba przyznać, że nie jest to zadanie łatwe, jednak jeśli będziemy kierować się kilkoma podstawowymi zasadami, z pewnością dokonamy trafnego wyboru! Najlepiej zastanowić się nad tą kwestią już na etapie projektowania domu, tak aby mieć pewność, że będziemy w pełni zadowoleni z końcowego efektu.",
                            "Jednym z najważniejszych czynników podczas wyboru właściwych schodów jest dostępna w pomieszczeniu przestrzeń. Jeśli miejsca nie ma zbyt wiele, doskonałe rozwiązanie stanowią schody w układzie spiralnym, takie jak na przykład bukowe schody spiralne Tania. Model ten można zgrabnie wkomponować w domową aranżację, a dzięki stosunkowo prostej konstrukcji, nie rzuca on się zanadto w oczy, jednocześnie nadając wnętrzu wrażenie lekkości i przestronności."
                        ]),
                        new OfferDetailsSegmentModel("Schody spiralne Tania – idealny wybór do domu w nowoczesnym stylu", [
                            "Jeśli cenisz sobie nietuzinkowe rozwiązania i szukasz ucieczki od szablonowego designu, schody spiralne Tania niewątpliwie przyciągną Twoją uwagę  i pozwolą stworzyć oryginalną aranżację we własnym domu. Stanowią wręcz idealne rozwiązanie do wnętrz w nowoczesnym stylu, a ze względu na ciekawą, metalową konstrukcję, odnajdą się również w klimatach industrialnych. W tym modelu zgrabnie połączyliśmy klasyczne piękno bukowego drewna z malowanym proszkowo metalem w uniwersalnym szarym kolorze. Całość gwarantuje ciekawy, nietuzinkowy efekt i wygląda zjawiskowo w każdym wnętrzu.",
                            "Schody spiralne Tania warto zestawić z innymi elementami wykonanymi z drewna, np. drewnianymi meblami lub dodatkami. W taki sposób możemy stworzyć przepełniony harmonią i niezwykle przytulny domowy wystrój!"
                        ]),
                        new OfferDetailsSegmentModel("Najwyższej klasy schody? Tylko w Centrum Schodów!", [
                            "W naszej firmie wierzymy, że miarą sukcesu jest pasja oraz zaangażowanie, które wkładamy w każdą podejmowaną przez nas realizację. Dzięki temu stale rośnie liczba klientów, którzy są zadowoleni z naszych usług! Atuty które nas wyróżniają to wieloletnie doświadczenie w swojej branży, stosowanie najwyższej jakości materiałów oraz skrupulatne realizowanie każdego projektu. Podejmujemy się zleceń na terenie całej Polski, mamy również na koncie wiele projektów zagranicznych. Bogata i zróżnicowana oferta naszego sklepu zapewnia szeroki wachlarz możliwości i umożliwia dopasowanie do każdego wnętrza, niezależnie od panującego w nim wystroju czy układu pomieszczeń."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/spiral/tania/1/1.jpg", null, new LabelModel([new LabelLineModel("tania ", "1")], ["konstrukcja nośna ze słupa centralnego i dystansów między stopniami", "stopnie bukowe", "balustrada \"fajkowa\" malowana proszkowo"]))
                    ]);

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
                ])
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
            
            switch ($mark)
            {
                case "beata":
                    $model->getPageHeader()->addLine("schody ", "dywanowe");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Innowacyjne schody dywanowe z wytrzymałego dębu", [
                            "Schody dywanowe prezentują się przepięknie w każdym wnętrzu. To prawdziwa innowacja, która stawia nie tylko na funkcjonalność, ale również na świetny i ponadczasowy wygląd. Co szczególnie istotne, ten model schodów można poddawać licznym modyfikacjom, aby uzyskać satysfakcjonujący efekt końcowy. Najlepszą rekomendacją dla schodów dywanowych są opinie klientów zachwyconych z finalnego rezultatu."
                        ]),
                        new OfferDetailsSegmentModel("Czym odznaczają się schody dywanowe?", [
                            "Jest to specyficzna forma prowadzenia kolejnych stopni schodów, w taki sposób, aby przypominały one zwiewny dywan, który okala całą konstrukcję i swobodnie spływa w dół. Uzyskanie takiego efektu wizualnego nie jest proste, jednak nasze wieloletnie doświadczenie sprawia, że doskonale wiemy jak to zrobić. Nowoczesne schody dywanowe pozwalają zaoszczędzić dodatkową przestrzeń, są wyjątkowo funkcjonalne, a co więcej, stanowią wspaniałą dekorację wnętrza, która przyciąga wzrok."
                        ]),
                        new OfferDetailsSegmentModel("Z jakich materiałów wykonane są schody?", [
                            "Stopnie wykonano z solidnego i ponadczasowego dębu w stonowanym, jaśniejszym odcieniu. Balustrada jest natomiast wykonana ze stali nierdzewnej. Jej obudowę wykonano z wytrzymałego i odpornego na zarysowania szkła hartowanego. Nowoczesne schody dywanowe w naszej ofercie mają grubość 8cm. Co szczególnie istotne, możemy zaprojektować specjalny podest po łuku, który pozwala zmienić kierunek schodów i bez trudu dostać się do każdej wysokości w budynku."
                        ]),
                        new OfferDetailsSegmentModel("Najważniejsze zalety schodów dywanowych", [
                            "Ich głównym atutem jest oczywiści przepiękny i ponadczasowy wygląd. Schody dywanowe można zastosować zarówno w stonowanym stylu skandynawskim, klasycznym, jak również industrialnym. Dokładamy wszelkich starań, aby każdy projekt spełniał indywidualne oczekiwania naszego klienta. Proponujemy zatem niezbędne przeróbki w projekcie, tak, aby schody dywanowe idealnie pasowały do każdego pomieszczenia. Struktura schodów pozwala na zastosowanie ciekawej aranżacji oświetlenia ledowego.",
                            "Ważną zaletą jest również funkcjonalność. Nowoczesne schody dywanowe nie zajmują dużo miejsca, a co więcej, mogą być doprowadzone na każdą wysokość. Wszystko za sprawą możliwości stworzenia specjalnego podestu po łuku. Wysoka balustrada zapewnia natomiast maksymalny poziom bezpieczeństwa. Zastosowane materiały odznaczają się odpornością na uszkodzenia mechaniczne, a jednocześnie, nie sprawiają trudności przy czyszczeniu oraz konserwacji. To model ceniony przez szerokie grono klientów."
                        ]),
                        new OfferDetailsSegmentModel("Czy warto wybrać schody dywanowe?", [
                            "Jeśli zależy Ci na imponującym projekcie schodów, które za każdym razem będą cieszyć Twoje oczy, schody dywanowe to doskonałe rozwiązanie. Jak już mówiliśmy, sprawdzą się w każdym budynku, niezależnie od aranżacji wnętrza. Wytrzymałe materiały zostały poddane starannej selekcji, tak, aby zagwarantować klientom maksymalny poziom trwałości oraz komfortu użytkowego. W naszej ofercie znajdują się dwa projekty schodów dywanowych, które mogą zostać dostosowane do indywidualnych potrzeb klientów."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "1")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrady z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "2")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada wycinana z blachy"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "3")], ["schody dywanowe grubości 8 cm z podestem po łuku", "dębowe", "balustrada z szyby hartowanej z pochwytem metalowym"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "4")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada wycinana z blachy"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "5")], ["schody dywanowe grubości 10 cm", "dębowe", "balustrada częściowo obustronna z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/6/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "6")], ["schody dywanowe grubości 4,5 cm częściowo na betonie", "dębowe", "balustrady z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/7/1.png", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "7")], ["schody dywanowe grubości 8 cm", "", "balustrady z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/beata/8/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("dywanowe ", "8")], ["schody dywanowe grubości 8 cm", "dębowe", "balustrada stalowa spawana"]))
                    ]);

                    break;
                case "klasyczne":
                    $model->getPageHeader()->addLine("schody ", "klasyczne");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Klasyczne schody do Twojego domu", [
                            "Trendy w aranżacji wnętrz oraz rozwiązania stosowane w aranżacji domów i mieszkań przez cały czas ulegają zmianie. Bardzo popularne w ostatnich latach są wszelkiego rodzaju nowoczesne wystroje wnętrz, w których przeważają nietypowe kształty i inne, nietuzinkowe pomysły. Czy oznacza to jednak, że musisz zrezygnować z klasycznych rozwiązań? Oczywiście, że nie! Niektóre materiały oraz wzory pozostają w modzie przez cały czas, niezależnie od upływu czasu i zmieniających się trendów. Jednym z materiałów, które bez wątpienia należą do nich, jest drewno, a jeden z elementów konstrukcyjnych w Twoim domu, do którego możesz je wykorzystać – klasyczne drewniane schody!"
                        ]),
                        new OfferDetailsSegmentModel("Ponadczasowe rozwiązanie do Twojego domu", [
                            "Co wpływa na niezmienną popularność drewnianych schodów w budynkach różnego przeznaczenia? Pierwszym z czynników jest z pewnością solidność i wytrzymałość uzyskiwanych w ten sposób konstrukcji. Materiał, jakim jest drewno, to sposób na otrzymanie schodów, które będą funkcjonalne i estetyczne przez wiele lat. Przechodzimy w ten sposób od razu do drugiego ważnego powodu zastosowania schodów drewnianych. Wygląd drewna sprawia, że schody wykonywane z niego pasują praktycznie do każdego pomieszczenia! Bardzo łatwo dzięki temu dowolnie zmieniać wystrój we wnętrzu i przeprowadzać remonty, bez konieczności zmiany schodów, ponieważ doskonale wkomponują się one w większą całość za każdym razem. Jest to też coś, co doceniają osoby, którym zależy na wnętrzach spokojnych, harmonijnych, czy też neutralnych, uniwersalnych – np. hotelowych oraz w domach na wynajem."
                        ]),
                        new OfferDetailsSegmentModel("Wybierz schody drewniane z Centrum Schodów", [
                            "Oferujemy wiele wzorów klasycznych schodów drewnianych. Doskonale wiemy, jak wielu z naszych klientów docenia tę ponadczasową klasykę, dlatego, chcąc zaspokoić ich potrzeby i oczekiwania, dołożyliśmy starań, aby również te rozwiązania były dostępne w naszej ofercie. Oferujemy drewniane schody wewnętrzne z różnego rodzaju podstopniami oraz z różnych rodzajów drewna. Jeśli chcesz nadać swoim schodom charakteru i pragniesz, aby połączyć prostotę z nieco bardziej fantazyjnym elementem, możesz postawić na nietypową, wymyślną balustradę, np. owijaną wokół słupów."
                        ]),
                        new OfferDetailsSegmentModel("Bezpieczeństwo dla każdego domownika", [
                            "Możemy zapewnić Cię, że wykonywane przez nas schody cechują się najwyższą jakością. Stosujemy wyłącznie najlepsze materiały, a nasi specjaliści mają wieloletnie doświadczenie w tworzeniu konstrukcji schodów w domach naszych klientów. Rozwiązanie takie polecane jest do wnętrza każdego typu – zarówno przeznaczenia prywatnego, jak i publicznego. Z poruszaniem się po drewnianych schodach wewnętrznych nie będą miały problemów nawet osoby starsze oraz dzieci. Wpływa to więc na jeszcze większą uniwersalność schodów drewnianych – możemy w związku z tym polecić je każdemu zainteresowanemu wykonaniem schodów w swoim domu.",
                            "Sprawdź, jakie wzory schodów wykonywaliśmy u innych naszych klientów. Przekonaj się o jakości pracy naszych specjalistów i wybierz to klasyczne rozwiązanie dla siebie. Jesteśmy do Twojej dyspozycji – wybierz klasyczne schody drewniane z Centrum Schodów."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/klasyczne/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("klasyczne ", "1")], ["schody drewniane z białymi podstopniami", "bukowe", "balustrada drewniana"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/klasyczne/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("klasyczne ", "2")], ["schody drewniane z podstopniami", "bukowe", "balustrada drewniano-stalowa"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/klasyczne/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("klasyczne ", "3")], ["schody drewniane z podstopniami", "bukowe", "balustrada owijana wokół słupów"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/klasyczne/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("klasyczne ", "4")], ["schody drewniane gięte z podstopniami", "bukowe", "balustrada drewniano-stalowa"]))
                    ]);

                    break;
                case "jednobelkowe":
                    $model->getPageHeader()->addLine("schody ", "jednobelkowe");

                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Drewniane jednobelkowe schody", [
                            "Spełniając marzenie o budowie własnego domu, musimy podjąć decyzję, czy chcemy, aby był on parterowy, czy może piętrowy. Wiele osób wybiera drugą opcję, tworząc na górnej kondygnacji sypialnię, pokoje dla dzieci i piękne, przestronne tarasy, które są nieocenione w okresie letnim. Ale żeby móc dostać się z parteru na piętro, niezbędne są do tego schody. Ich wybór jest bardzo duży, co widać po naszej szerokiej ofercie, jaką dla Państwa przygotowaliśmy. Wśród wielu propozycji zasługujących na uwagę znajdują się drewniane jednobelkowe schody, które zachwycają wysoką jakością, precyzją wykonania oraz designem. Takie schody to ozdoba każdego domu."
                        ]),
                        new OfferDetailsSegmentModel("Zalety, jakimi wyróżniają się drewniane jednobelkowe schody", [
                            "Projektując dom, staramy się wszystko umieścić w taki sposób, aby całość była funkcjonalna, a przy tym prezentowała się przestronnie. Jeżeli chodzi o schody, to te niewątpliwie mają duży wpływ na efekt końcowy. Stąd też powinniśmy wybierać produkty wysokiej jakości, takie jak oferowane przez nas schody bukowe, które nie zmieniają się mimo upływu lat i cały czas stanowią piękną ozdobę. Co kryje się pod nazwą schody jednobelkowe? Otóż wyróżniają się one tym, że posiadają centralną konstrukcję, czyli jedną belkę, która umieszczona jest osiowo i stanowi nośną konstrukcję dla stopni. Takie drewniane jednobelkowe schody znajdują zastosowanie zarówno w domach piętrowych, jak i w nowoczesnych wnętrzach z antresolą. Warte podkreślenia jest to, że schody jednobelkowe prezentują się bardzo lekko, na pewno nie przytłaczają swoją konstrukcją, dzięki czemu idealnie pasują do niewielkich pomieszczeń. Takie schody dostępne są w wersji na belce drewnianej z podestem lub bez, na belce drewnianej nośnej lub giętej."
                        ]),
                        new OfferDetailsSegmentModel("Drewniane jednobelkowe schody, czyli ponadczasowość, trwałość i wysoka estetyka", [
                            "Schody drewniane cieszą się dużą popularnością i są często wybierane, m.in. ze względu na uniwersalność. Potrafią pięknie wkomponować się we wnętrze w stylu klasycznym, jak i nowoczesnym. Jednym z większych atutów, jakimi charakteryzują się schody drewniane, jest ich odporność na zniszczenia, a co się z tym wiąże – trwałość. Przy odpowiedniej pielęgnacji takie schody mogą zachować się w perfekcyjnym stanie przez kilkadziesiąt lat. Nie należy zapominać o tym, że drewno ociepla wnętrza i nadaje im przytulny charakter, co niewątpliwie przemawia za tym, żeby zainwestować w jednobelkowe schody drewniane."
                        ]),
                        new OfferDetailsSegmentModel("Schody na belce drewnianej z efektowną balustradą", [
                            "Wybierając schody do swojego domu, musimy zdecydować się nie tylko na rodzaj materiału, z jakiego mają być one wykonane czy jakie mają posiadać stopnie, ale ważną kwestię stanowi także balustrada. Jej zadaniem jest zapewnić bezpieczeństwo i uchronić przed ewentualnym upadkiem z wysokości, choć nie można odmówić jej też tego, że dodatkowo pełni funkcję ozdobną. Stąd też u nas można zamówić schody na belce drewnianej z różnymi wariantami balustrad. Mogą być one np. nierdzewne bądź drewniano-metalowe. Lśniąca stal doskonale wygląda w zestawieniu z drewnem i stanowi bardzo nowoczesne rozwiązanie. Idealne do designerskich wnętrz, w których dużo uwagi poświęca się estetyce. A wybierając schody na belce drewnianej, otrzymujemy nie tylko piękny produkt, ale przede wszystkim funkcjonalny, wysokiej jakości i stworzony z myślą o bezpieczeństwie użytkowników.",
                            "Drewniane jednobelkowe schody to klasyka, która dodaje pomieszczeniom ciepła, jest trwała i efektowna. Jeżeli szukamy pięknych schodów na lata, to te wykonane z drewna są wyborem najlepszym z możliwych."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/jednobelkowe/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("drewniane"), new LabelLineModel("jednobelkowe ", "1")], ["schody na belce drewnianej", "bukowe", "balustrada nierdzewna"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/jednobelkowe/2/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("drewniane"), new LabelLineModel("jednobelkowe ", "2")], ["schody na drewnianej belce z podestem", "bukowe", "balustrada owijana wokół słupa"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/jednobelkowe/3/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("drewniane"), new LabelLineModel("jednobelkowe ", "3")], ["schody na drewnianej belce nośnej", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/jednobelkowe/4/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("drewniane"), new LabelLineModel("jednobelkowe ", "4")], ["schody na belce drewnianej", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/wood/jednobelkowe/5/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("drewniane"), new LabelLineModel("jednobelkowe ", "5")], ["schody na belce drewnianej giętej", "stopnie bukowe", "balustrada drewniano-metalowa"]))
                    ]);

                    break;
            }
        }
        else
        {
            $model = new OfferModel(OfferGalleryMode::Tiles);
            $model->getPageHeader()->addLine("schody ", "drewniane");

            $model->setTextParagraphs([
                new OfferDetailsSegmentModel("Jak wybrać odpowiednie schody?", [
                    "Wybór schodów do danego wnętrza jest nieraz bardzo trudny. Należy wziąć pod uwagę nie tylko ich funkcjonalność, ale też wygląd. Niekiedy dokładnie wiemy, jak ma wyglądać aranżacja danego wnętrza – wówczas łatwo sprecyzować nasze oczekiwania co do schodów. Bywa jednak, że chcemy postawić na jak największą neutralność pomieszczeń i uniwersalność. Być może za rok lub dwa zdecydujesz się przecież na remont i dane wnętrze będzie wyglądać już zupełnie inaczej. Czy oznacza to, że do wymiany muszą być wówczas za każdym razem schody w Twoim domu? Oczywiście, że nie! Możesz postawić na rozwiązanie, które pasować będzie do każdego wnętrza, niezależnie od tego, w jakim stylu zdecydujesz się je urządzisz. Jakie to rozwiązanie?"
                ]),
                new OfferDetailsSegmentModel("Schody drewniane – uniwersalność i ponadczasowość", [
                    "Jednym z materiałów, który zawsze prezentuje się dobrze i elegancko, jest drewno. Odpowiednim rozwiązaniem, gdy chcesz postawić na ponadczasowość i uniwersalność, będą właśnie schody drewniane. Wykonuje się je od pokoleń – to klasyka, którą warto wybrać zarówno do minimalistycznego, oszczędnego wnętrza, jak i do bardziej nowoczesnej aranżacji, gdzie dominują nietypowe kształty i odważne kolory. Drewno daje też poczucie przytulności wnętrza, co jest bardzo ważne, gdy zależy Ci na wykonaniu schodów we własnym domu, w którym będziesz funkcjonować każdego dnia. Materiał ten ociepla wygląd pomieszczenia i daje poczucie spokoju, harmonii. Poza tym, schody drewniane będą bardzo bezpieczne dla domowników. Poprawnie wykonana konstrukcja oraz wysokiej jakości drewno dadzą konstrukcję, która może estetycznie prezentować się i sprawdzać się pod względem praktycznym nie przez kilka, lecz nawet kilkanaście/kilkadziesiąt lat."
                ]),
                new OfferDetailsSegmentModel("Schody drewniane z Centrum Schodów", [
                    "W naszej ofercie znajdziesz wiele różnorodnych wzorów schodów drewnianych, z którymi stworzysz swoje własne wnętrze, jakie będzie Twoją przystanią oraz miejscem, gdzie będziesz czuć się bezpiecznie wspólnie ze swoimi bliskimi. Możesz postawić na schody drewniane zabiegowe lub jednobelkowe. Oferujemy schody z różnych rodzajów drewna – bukowego, czy też dębowego. To, czym możesz jeszcze bardziej spersonalizować wygląd schodów w swoim domu lub budynku innego przeznaczenia, jest ich balustrada. To nie tylko niezbędne wyposażenie schodów pod względem bezpieczeństwa, ale też element mogący być czymś stricte dekoracyjnym, nadającym schodom zupełnie inny wymiar. Każdy wykonywany przez nas wzór jest czymś wyjątkowym, czemu nadajemy unikatowy charakter, aby Twoje wnętrze było jedyne w swoim rodzaju i spełniało oczekiwania Twoje oraz innych domowników. Gwarantujemy najwyższą jakość wykonania oraz materiałów, które wykorzystujemy do stworzenia każdej konstrukcji.",
                    "Mamy dla Ciebie wyjątkowe drewniane schody zabiegowe, jednobelkowe oraz wiele klasycznych wzorów. Sprawdź, jak nasze schody prezentują się u innych klientów, zaufaj naszym specjalistom i pozwól nam wykonać schody również w twoim domu lub budynku. Zapraszamy. Więcej szczegółów technicznych o interesujących Cię schodach znajdziesz w opisie konkretnego wzoru."
                ])
            ]);

            foreach ($names as $name)
            {
                $model->addGalleryElement(new GalleryElementModel("/public/extras/images/gallery/offer/wood/$name.jpg", "schody drewniane $name", null, "offer/wood/$name"));
            }
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
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Patryk", [
                            "Schody stanowią niezwykle ważny element w każdym domu oraz mieszkaniu wielopoziomowym. Oczywiście ich montaż wiąże się z celem przede wszystkim funkcjonalnym. W praktyce jednak tworzą również bardzo istotny akcent, wpływający bezpośrednio na estetykę całego wnętrza. Z tego też powodu warto wybrać do swojego lokum schody, które idealnie dopełnią charakter pomieszczenia i sprawią, że będzie się ono prezentować elegancko i stylowo. Nie można zapomnieć także o bezpieczeństwie, dlatego niezwykle ważne, aby stawiać przede wszystkim na konstrukcje wykonane z najlepszej jakości materiałów. Takie są właśnie nowoczesne schody wewnętrzne PATRYK, proponowane przez nas. Naszym celem jest tworzenie produktów, które zachwycą naszych klientów swym designem oraz funkcjonalnością. W naszym katalogu znajdziesz dziesiątki propozycji, które doskonale sprawdzą się w Twoim domu."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesne schody wewnętrzne Patryk — idealne połączenie materiałów", [
                            "Schody powinny wyróżniać się przede wszystkim swą solidnością. W końcu stanowią one połączenie pięter, z którego korzysta się przynajmniej kilka razy dziennie. Jeśli produkt wykonany będzie więc z najlepszej jakości materiałów, zapewni użytkownikom pełne bezpieczeństwo i satysfakcję. Nowoczesne schody wewnętrzne PATRYK powstają  w wyniku połączenia najwyższej klasy drewna oraz  solidnej  stali. Dzięki temu tworzą idealną kompozycję estetyczną oraz użytkową.",
                            "Do wykonania stopni w modelu PATRYK, wykorzystujemy gatunki drewna wyróżniające się największą trwałością i odpornością na uszkodzenia. Zazwyczaj jest to buk oraz dąb, ponieważ to właśnie one sprawdzają się najlepiej. W połączeniu ze stalową konstrukcją tworzą bardzo stylowy efekt, który doskonale sprawdzi się przede wszystkim we wnętrzach nowoczesnych i industrialnych."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesne schody wewnętrzne Patryk — trwałość i solidność", [
                            "Metalowa konstrukcja to gwarancja solidności schodów. Twardy, odporny na wszelkie uszkodzenia oraz bardzo trwały materiał to po prostu idealna baza do stworzenia bezpiecznego i wręcz niezniszczalnego szkieletu. Do niedawna właśnie z tego powodu stosowano go przede wszystkim przy budowie schodów zewnętrznych. Jednak nowoczesne podejście designerów sprawiło, że coraz częściej konstrukcje takie zobaczyć możemy wewnątrz domów oraz mieszkań."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesne schody wewnętrzne Patryk — konstrukcja dopasowana do Twoich potrzeb", [
                            "Najważniejszą wartością jest dla nas zadowolenie i satysfakcja klientów. Z tego też powodu zapewniamy dopasowanie naszych projektów do ich potrzeb indywidualnych. Nowoczesne schody wewnętrzne PATRYK stworzą idealną kompozycję z aranżacją Twojego wnętrza, ponieważ wspólnie dostosujemy ich parametry do Twoich oczekiwań. Do dyspozycji mamy dziesiątki możliwości. Schody mogą przybierać rozmaite formy, a wybór materiałów zastosowanych w ich konstrukcji zależy właśnie od Ciebie. Z chęcią pomożemy Ci wybrać idealny projekt."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z profili o przekroju 6 x 6 cm", "stopnie dębowe", "podciąg do stropu z prętów kwadratowych"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z profili o przekroju 6 x 6 cm", "stopnie dębowe", "balustrada z poziomymi wypełnieniami"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna z profili o przekroju 4 x 8 cm", "stopnie bukowe", "balustrada z wypełnieniem szklanym"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna z profili o przekroju 6 x 6 cm", "stopnie dębowe", "balustrada z linkami"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/5/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "5")], ["konstrukcja nośna z profili o przekroju 6 x 6 cm", "stopnie dębowe", "balustrada stalowo-drewniana"]))
                    ]);
                    
                    break;

                case "dawid":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Dawid", [
                            "Nowoczesne schody wewnętrzne Dawid mogę być wykonane z e stali nierdzewnej lub zwykłej malowanej proszkowo. Balustrady wykonane są ze stali nierdzewnej, do której została zamocowana tafla hartowanego szkła. Zastosowanie tych odpornych materiałów gwarantuje, że wykonana z nich balustrada posłuży nam wiele lat. Nie wymaga ona również stosowania specjalistycznych zabiegów konserwujących. Stal nie rdzewieje i nie przebarwia się, natomiast hartowane szkło jest odporne na niewielkie uszkodzenia mechaniczne i rozbicie. Takie schody są równocześnie inwestycją przyszłościową, ponieważ nie wymagają napraw, są niezwykle odporne na zarysowania. Użycie najlepszych materiałów do wykonania stopni jak buk lub dąb gwarantuje, że schody nie rozsychają się, nie trzeszczą i nie skrzypią podczas użytkowania. Dodatkowym atutem jest wycięta z blachy konstrukcja nośna  wyglądająca bardzo nowocześnie."
                        ]),
                        new OfferDetailsSegmentModel("Designerskie nowoczesne schody wewnętrzne Dawid w czterech wygodnych wariantach", [
                            "Nowoczesne schody wewnętrzne Dawid to przede wszystkim możliwość wyboru wygodnego rozwiązania. Występują bowiem w czterech wariantach, z których każdy znajdzie dla siebie wygodne rozwiązanie. Pierwsze to schody Dawid zabiegowe, w których do wykonania stopni użyto dębu, a barierka została wykonana z szkła hartowanego. Jest to idealne rozwiązanie w domach, gdzie mieszkają dzieci. Szklana barierka zapobiega możliwości przedostania się dziecka na drugą stronę jak jest to możliwe w przypadku tradycyjnych poręczy ustawionych poziomo. Kolejna wersja schodów, czyli DAWID 2 posiada barierkę taką, jak w przypadku pierwszych, jednak stopnie zostały wykonane z drzewa bukowego. Zastosowanie innego rodzaju drzewa powoduje, że stopnie mają charakterystyczne dla buka, interesujące, naturalne usłojenia. Ostatnie ze schodów Dawid to połączenie dębowych stopni i designerskiej balustrady ze stali nierdzewnej. Te ostatnie wyróżniają się charakterystycznym kształtem i usytuowaniem. Nie są ustawione bowiem tradycyjnie pod ścianą, lecz kierują użytkownika na górną kondygnację ze środka holu. Daje to wrażenie, że pomieszczenie jest dużo większe, i, że cały dom urządzony luksusowo."
                        ]),
                        new OfferDetailsSegmentModel("Uniwersalne, ale oryginalne, nowoczesne schody wewnętrzne Dawid", [
                            "Wszystkie schody Dawid są bardzo uniwersalne, ponieważ do ich wykonania posłużyły elementy, które będą pasowały w każdym domu. Jednak całość została zrobiona w oryginalnym stylu, dlatego obecność takiej konstrukcji we wnętrzu sprawi, że dom będzie prezentował się oryginalnie, elegancko, ale i ponadczasowo. Będzie piękną wizytówką domu i jego największą ozdobą, która zachwyci wszystkich gości."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna wycinana z blachy", "stopnie dębowe", "balustrada z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna wycinana z blachy", "stopnie bukowe", "balustrada z wypełnieniem szklanym"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna wycinana z blachy", "stopnie dębowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna wycinana z blachy", "stopnie dębowe", "balustrada ze stali nierdzewnej"]))
                    ]);
                    
                    break;

                case "ada":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Ada", [
                            "Schody z policzków metalowych posiadają doskonale skonstruowaną konstrukcję nośną, dlatego bezpiecznie mogą się po nich poruszać zarówno dzieci, jak i dorośli. Produkt jest również idealnie zabezpieczony, m.in. przy pomocy balustrady szklanej, metalowej, czy też szkła hartowanego. Każdy może wybrać dla siebie idealny model balustrady, tak aby całość tworzyła niesamowitą kombinację. Zainteresowani mają również szeroki wybór, jeśli chodzi o stopnie, ponieważ w tym przypadku można wybrać takie wersje jak: jesion, dąb, buk oraz szkło."
                        ]),
                        new OfferDetailsSegmentModel("Schody z policzków metalowych - odświeżenie dotychczasowych wnętrz", [
                            "Decydując się na zakup schodów z policzków metalowych ma się pewność tego, że optymalnie odświeża się dotychczasowe wnętrza. To bardzo istotne, ponieważ raz na jakiś czas powinno się przeprowadzić taką czynność, aby we własnym domu poczuć się bardziej komfortowo i tym samym polepszyć swoje samopoczucie. Schody są nowoczesne, wytrzymałe, pasują do wnętrz urządzonych w różnorakich stylach, np. skandynawskim lub angielskim. Balustrady, które są do nich dołączone mogą mieć wypalane wzory, wszystko zależy od tego, jakie konkretnie preferencje ma klient."
                        ]),
                        new OfferDetailsSegmentModel("Schody z policzków metalowych - uniwersalność i wygoda", [
                            "Schody z policzków metalowych są w pełni uniwersalne oraz bardzo wygodne w użytkowaniu. Spiszą się więc doskonale zarówno w domach, w których mieszkają młode, jak i nieco starsze osoby. Dzięki takim schodom całe wnętrze nabierze zdecydowanie innego charakteru, zacznie żyć własnym życiem. Postawienie na nowoczesne rozwiązania to bardzo dobry wybór, ponieważ zapewnienie sobie relaksu we własnym domu to w dzisiejszych czasach konieczność. W domach spędza się dużo czasu, a więc powinny znajdować się tam wydajne i wygodne produkty użytku codziennego, takie jak np. schody. Policzki metalowe sprawią, iż schody będą wytrzymałe i odporne na uszkodzenia. Co za tym idzie zainteresowani nie będą musieli przejmować się tym, iż po paru miesiącach ulegną poważnym usterkom technicznym."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z policzków metalowych", "stopnie szklane", "pochwyt przyścienny"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z policzków metalowych", "stopnie dębowe", "balustrada szklana wraz z maskownicami na rotule"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna z policzków metalowych", "stopnie bukowe", "balustrada metalowa z wypalanymi wzorami"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna z policzków metalowych", "stopnie jesionowe", "balustrada metalowa z wycinanymi wzorami"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/5/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "5")], ["konstrukcja nośna z policzków metalowych", "stopnie dębowe", "balustrada z szybami hartowanymi"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/6/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "6")], ["konstrukcja nośna z policzków metalowych", "stopnie dębowe", "balustrada szklana z maskownicami na rotule"]))
                    ]);
                    
                    break;

                case "ignacy":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Ignacy", [
                            "Jednobelkowe schody stalowo-drewniane sprawdzą się w nowocześnie urządzonych pomieszczeniach. Poszczególne modele są innowacyjne oraz intrygujące, posiadają zróżnicowaną konstrukcję nośną (np. zygzakowatą). Z racji swojej konstrukcji są łatwe w montażu, stabilne oraz trwałe. Wykazują się podwyższoną odpornością na zwiększone obciążenia. Co za tym idzie decyzja o ich zakupie do własnego mieszkania będzie jedną z najlepszych, na jaką domownicy mogli się zdecydować. Przy okazji tego typu produkty nie pochłoną wielkich pieniędzy z budżetu domowego."
                        ]),
                        new OfferDetailsSegmentModel("Jednobelkowe schody stalowo-drewniane – różne wersje stopni", [
                            "Jeśli chodzi o schody z tej kategorii zainteresowani mogą zdecydować się na różne wersje stopni, m.in. bukowe, czy też malowane na biało. Poza tym idealnie łączą się z solidnymi balustradami. W tym przypadku klienci również mają bogaty wybór, ponieważ do ich dyspozycji oddano balustrady ze szkła hartowanego, ze stali nierdzewnej lub też drewniano-metalowe. Warto przeanalizować wszystkie opcje spośród wyżej wymienionych i na sam koniec zdecydować, która balustrada będzie pasowała do tak eleganckich schodów."
                        ]),
                        new OfferDetailsSegmentModel("Jednobelkowe schody stalowo-drewniane – zwieńczenie pięknych wnętrz", [
                            "Nie ulega wątpliwości, iż jednobelkowe schody stalowo-drewniane to doskonałe zwieńczenie pięknie urządzanych wnętrz. Osoby chcące postawić na nietuzinkowe rozwiązania, powinny wziąć pod uwagę właśnie takie rozwiązania. Z pewnością przypadną im do gustu oraz posłużą przez wiele długich sezonów. Schody wykonywane są z bardzo solidnych materiałów, nie ma mowy o tym, aby nawet podczas intensywnego użytkowania pojawiły się na nich jakieś uchybienia. Osoby zdecydowane na ich zakup nacieszą oczy klasyczną urodą drewna. Wchodzenie po takich schodach będzie dla domowników jedynie przyjemnością. Warto czasami postawić na zupełnie nowy look dotychczasowych wnętrz, ponieważ tym samym człowiek odmienia swoje całe życie i wizję świata. To udany sposób na szybką i bezproblemową poprawę samopoczucia."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna jednobelkowa zygzakowata", "stopnie wybielane na biało", "balustrada szklana z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna jednobelkowa ze stali nierdzewnej", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna jednobelkowa ze stali nierdzewnej", "stopnie bukowe", "balustrada drewniano-metalowa"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna jednobelkowa malowana proszkowo", "stopnie bukowe malowane na biało", "balustrada szklana z szyby hartowanej"]))
                    ]);
                    
                    break;

                case "patryko-rzymskie":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Patryko - Rzymskie", [
                            "Bukowe schody rzymskie to rozwiązanie, które sprawdzi się w wielu salonach. Jeśli ktoś chciałby urządzić własne pomieszczenia w nietuzinkowy sposób, to taka opcja jest właściwym wyborem. Konstrukcja nośna wykonana jest ze starannie dobranych profili, dystans między nimi nie jest zbyt duży. Dzięki temu poruszanie się po schodach nie sprawia trudności żadnemu domownikowi. Zainteresowani mogą wybrać stopnie dębowe lub też bukowe. Każda z tych propozycji jest nie tylko wytrzymała, ale również bardzo klasowa."
                        ]),
                        new OfferDetailsSegmentModel("Bukowe schody rzymskie - pełne bezpieczeństwo we własnym domu", [
                            "Inwestując w schody rzymskie, pieniądze przeznacza się nie tylko na ponadczasowe rozwiązania domowe. Ponadto inwestuje się we własne bezpieczeństwo, ponieważ tego typu schody połączone są z trwałymi i niezawodnymi balustradami. Mogą być one wykonane z metalu, z szyby hartowanej lub też stali nierdzewnej. Poza tym są malowane proszkowo, a cała kombinacja prezentuje się nie tylko pięknie, ale też zapewnia bezpieczne użytkowanie, nawet w przypadku małych dzieci. Warto zdecydować się na tak sprawdzone produkty, dzięki którym wchodzenie oraz schodzenie ze schodów będzie komfortowym doświadczeniem."
                        ]),
                        new OfferDetailsSegmentModel("Bukowe schody rzymskie - kreatywność oraz najwyższej jakości materiały", [
                            "Bukowe schody rzymskie wykonywane są z najwyższej jakości materiałów, poza tym są bardzo kreatywne, dlatego spiszą się doskonale w nowoczesnych i awangardowych wnętrzach. Czasami remont we własnym domu jest koniecznością, warto bazować w takich przypadkach na oryginalnych rozwiązaniach, zwłaszcza jeśli chodzi o schody. W piętrowych domach korzysta się z nich bardzo często, a więc powinny zapewniać komfort i pełne bezpieczeństwo. Różnią się od siebie wykończeniem oraz zestawieniem profili. W związku z tym każdy domownik może przeznaczyć zaoszczędzone środki finansowe, na takie schody jakie przypadną mu do gustu. Możliwości wykonań w takich przypadkach jest naprawdę sporo, dlatego wszystko zależy od indywidualnej koncepcji klienta lub fachowców."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie dębowe", "balustrada szklana z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie bukowe", "balustrada metalowa malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie bukowe", "balustrada metalowa malowana proszkowo"]))
                    ]);
                    
                    break;

                case "rzymskie":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe rzymskie", [
                            "Metalowe schody rzymskie to świetna propozycja dla osób, które mieszkają w domu piętrowym. Wiadomo, że w takich domach potrzebne są schody, aby można było swobodnie przemieścić się z dołu na górę oraz z powrotem. Domownicy powinni polegać na nowoczesnych, eleganckich i trwałych rozwiązaniach. Schody rzymskie sprawdzą się w tym przypadku optymalnie. Klientom zapewniona jest wytrzymała konstrukcja nośna, poszczególne stopnie malowane są na biało. Można zdecydować się również na kolor jesionowy. Schody łączy się ze specjalnie dobraną balustradą, aby zapewnić wszystkim domownikom należyte bezpieczeństwo. Tyczy się to zwłaszcza rodzin, w których są małe dzieci."
                        ]),
                        new OfferDetailsSegmentModel("Metalowe schody rzymskie - wygodne przemieszczanie się z piętra na piętro", [
                            "Atutem metalowych schodów rzymskich jest to, iż można z ich pomocą wygodnie przemieszczać się z piętra na piętro. W związku z tym na pewno warto skorzystać z tak ciekawej możliwości i zainwestować w wydajne rozwiązania domowe. Schody charakteryzują się wspaniałym designem, balustrada jest w tym przypadku malowana proszkowo. Do produkcji schodów wykorzystywane są najlepsze materiały na rynku, dlatego potrafią wytrzymać spore obciążenia i nie zawodzą nawet po kilku latach użytkowania."
                        ]),
                        new OfferDetailsSegmentModel("Metalowe schody rzymskie - odrobina nowoczesności w każdym domu", [
                            "Każdy domownik chciałby od czasu do czasu zapewnić sobie odrobinę nowoczesności, a metalowe schody rzymskie mogą mu w tym pomóc. Warto więc polegać na takich materiałach i zdecydować się na ich montaż pomiędzy piętrami. Ich zaletą są również niepowtarzalne kształty, montować powinni je jednak doświadczeni fachowcy, aby cały proces przebiegł bez przykrych niespodzianek. Należy pamiętać o tym, że schody powinny być co jakiś czas poddawane profesjonalnej konserwacji, czym wydłuży się ich żywotność. Jeśli ktoś chce odmienić swoje wnętrza na bardziej nowoczesne, to takie produkty są dla niego doskonałym wyborem. Nie warto zastanawiać się zbyt długo nad taką inwestycją, tylko jak najszybciej ją zrealizować."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z dystansami między stopniami oraz bolcami w ścianach", "stopnie malowane na biało", "balustrada metalowa malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z dystansami między stopniami ze stali nierdzewnej", "stopnie jesionowe", "balustrada ze stali nierdzewnej"]))
                    ]);
                    
                    break;

                case "tymon":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Tymon", [
                            "Dobre schody wewnętrzne to nie tylko element konstrukcyjny budynku, umożliwiający komunikację między kondygnacjami. Sztuką jest zaprojektować takie schody, które są funkcjonalne i idealnie wkomponowane w architekturę wnętrza pomieszczenia. Nasza firma wychodzi naprzeciw oczekiwaniom klientów i oferuje nowoczesne, stylowe i piękne schody, które będą ozdobą każdego nowoczesnego domu."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesne schody w nowoczesnym domu", [
                            "Wewnętrzne schody Tymon to solidna konstrukcja opierająca się na jednej belce. Dzięki takiej konstrukcji schody wydają się lekkie i swobodnie komponują się z otoczeniem. Nowoczesna i unikalna konstrukcja idealnie pasuje do każdego nowoczesnego domu, mieszkania czy biura. Dzięki wieloletniej tradycji nasze schody zachwycają wszystkich gości naszych zadowolonych klientów."
                        ]),
                        new OfferDetailsSegmentModel("Jedna konstrukcja wiele możliwości", [
                            "Nowoczesne schody wewnętrzne Tymon to unikalna konstrukcja, która daje wiele możliwości. W każdej konfiguracji schodów TYMON stosujemy ciepłe, solidne i bardzo wytrzymałe schody dębowe. Stopnie posiadają wysoką odporność na ścieranie i na uderzenia mechaniczne. Dzięki temu już nie trzeba się martwić o spadające przedmioty i szalone zabawy dzieci.",
                            "Pojedyncza belka konstrukcyjne może być prosta i umiejscowiona tradycyjnie wzdłuż ściany, lecz nie ma problemów, jeżeli zachodzi potrzeba zastosowania schodów łamanych lub kręconych. Praktycznie wszystkie opcje w dowolnej konfiguracji są możliwe do wykonania.",
                            "Sześć opcji schodów Tymon zapewnia zastosowanie różnych ciekawych i stabilnych balustrad. Każdy znajdzie odpowiedni typ balustrady pasujący do wielu wnętrz. W naszej ofercie znajdą Państwo olśniewające balustrady szklane z poręczą drewnianą, wytrzymałe spawane balustrady metalowe oraz tradycyjne drewniane. Balustrady szklane montowane są panelowo do każdego stopnia i posiadają zwiększoną wytrzymałość. Wszystkie balustrady metalowe są malowane proszkowo i posiadają wysoką wytrzymałość na zarysowania. Tradycyjne balustrady drewniane wyposażone są w wysokiej jakości drewniane szczeble przymocowane do każdego stopnia schodów."
                        ]),
                        new OfferDetailsSegmentModel("Ciepłe, przyjazne i ergonomiczne schody wewnętrzne Tymon", [
                            "Prezentowane schody doskonale współgrają z każdym nowoczesnym pomieszczeniem. Nasze konstrukcje dodają pomieszczeniom blasku i ciepła. Wysokiej jakości materiały zastosowane do budowy schodów łatwo utrzymuje się w czystości. Idealna wysokość stopni sprawi, że każdy swobodnie będzie mógł korzystać ze schodów. Dzięki luksusowym dębowym stopniom, chodzenie bosą stopą po schodach to sama przyjemność. Balustrada na idealnej wysokości skutecznie pomoże wejść na górę i zapobiegnie upadkowi podczas schodzenia. Wiele wzorów i kolorów balustrad zapewni duży wybór i dostosowanie do wymagań każdego klienta."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.png", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada stalowa spawana malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada stalowa spawana malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada stalowa spawana malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada stalowa spawana malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/5/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "5")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada stalowa spawana malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/6/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "6")], ["konstrukcja nośna jednobelkowa", "stopnie dębowe", "balustrada drewniana"]))
                    ]);
                    
                    break;
                    
                case "natalia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Natalia Stalowa", [
                            "Schody ze stali nierdzewnej to rozwiązania znajdujące zastosowanie w wielu tradycyjnych wnętrzach. Są bardzo solidne, stabilne oraz wytrzymałe. Dodatkowo charakteryzują się podwyższoną odporność na nieco większe obciążenia. Ich konstrukcja nośna jest w pełni zadowalająca, a dystans między stopniami nie jest zbyt duży. Dzięki temu nawet osoby starsze nie będą mieć problemów z tym, aby swobodnie poruszać się po takich schodach. Schody mogą być połączone z balustradami ze stali nierdzewnej, metalowymi (malowanymi proszkowo) lub też z wypełnieniem szklanym."
                        ]),
                        new OfferDetailsSegmentModel("Schody ze stali nierdzewnej - tradycja i piękno w jednym miejscu", [
                            "Największą zaletą proponowanych schodów ze stali nierdzewnej jest to, iż łączą w sobie tradycję oraz wysublimowane piękno. Warto zdecydować się na zainwestowanie w nie, z tego względu, iż posłużą w domach przez wiele lat. Przy okazji nie trzeba obawiać się o występowanie niebezpiecznych uszczerbków. Stopnie w takich schodach dostępne są w wersji dębowej lub też bukowej. Każda osoba powinna się zastanowić nad tym, która konkretnie opcja jest dla niej bardziej korzystna, biorąc pod uwagę np. aranżację całego pomieszczenia lub preferowane style architektoniczne."
                        ]),
                        new OfferDetailsSegmentModel("Schody ze stali nierdzewnej - konstrukcja odpowiadająca wymaganiom każdego klienta", [
                            "Schody ze stali nierdzewnej zostały stworzone w taki sposób, aby ich całkowita konstrukcja odpowiadała w stu procentach wymaganiom każdego klienta. To bardzo ważne, ponieważ takie schody mają służyć przede wszystkim ludziom. Oczywiście klienci dbają o to, aby pięknie wyglądały, ale jednocześnie muszą być funkcjonalne i wydajne. W tym przypadku nie ma się co o to martwić, ponieważ oczekiwania klientów z pewnością będą zaspokojone. To stosunkowo niedrogie modele, w porównaniu do innych propozycji rynkowych. Stal nierdzewna charakteryzuje się jednak podwyższoną odpornością na wiele różnych czynników zewnętrznych. Z racji tego taka inwestycja ma ogrom plusów i jeśli ktoś szuka dla siebie odpowiednich schodów, to te wykonane ze stali nierdzewnej będą optymalne."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna jednobelkowa ze stali nierdzewnej", "stopnie dębowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna jednobelkowa malowana proszkowo", "stopnie dębowe", "balustrada metalowa malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna jednobelkowa ze stali nierdzewnej", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/4/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "4")], ["konstrukcja nośna jednobelkowa ze stali nierdzewnej", "stopnie bukowe", "balustrada z wypełnieniem szklanym"]))
                    ]);
                    
                    break;
                    
                case "matylda":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Matylda", [
                            "Kręte schody stalowo-drewniane to strzał w dziesiątkę, jeśli ktoś chce postawić na pełną oryginalność we własnym domu. Posiadanie krętych schodów to w wielu przypadkach marzenie z dzieciństwa. Nie ulega wątpliwości, iż jest to atrakcyjne rozwiązanie nie tylko dla dorosłych, ale też dla dzieci. Zaletą takich produktów jest to, że są doskonale zabezpieczone, a więc podczas wchodzenia i schodzenia ze schodów nikomu nie stanie się krzywda. Stopnie proponowane klientom dostępne są w odmianie bukowej. Świetnie odświeżą każde wnętrze."
                        ]),
                        new OfferDetailsSegmentModel("Kręte schody stalowo-drewniane - bardzo wytrzymała konstrukcja nośna", [
                            "Na uwagę zasługuje to, że kręte schody stalowo-drewniane posiadają bardzo wytrzymałą konstrukcję nośną. Poza tym zainteresowani powinni docenić to, iż dystans pomiędzy kolejnymi stopniami nie jest zbyt duży, co jest dobrą informacją dla rodzin, w których żyją małe dzieci lub osoby starsze i schorowane. Pokonywanie stopni będzie więc bardzo wygodną czynnością, nikomu nie przysporzy większych trudności oraz dyskomfortu. Balustrada wykonywana do takich schodów wykonywana jest ze stali nierdzewnej lub też z drewna. Ostateczny wybór będzie należał w tej kategorii do samego klienta."
                        ]),
                        new OfferDetailsSegmentModel("Kręte schody stalowo-drewniane - elegancja na pierwszym miejscu", [
                            "Opisywana odmiana schodów to prawdziwa elegancja, więc jeśli komuś zależy na takich produktach powinien w nie jak najszybciej zainwestować i się przed tym nie wzbraniać. Produkty dostępne są w naprawdę dobrych cenach, cechują się wydłużoną żywotnością, trwałością i ponadczasowym designem. Tego właśnie oczekuje się od zakupionych modeli. Nic dziwnego, że ich popularność na polskim rynku jest bardzo duża. Najważniejszą informacją dla zainteresowanych jest to, iż proces montażu wybranych schodów stalowo-drewnianych w krętej wersji nie jest skomplikowaną czynnością. Wystarczy zatrudnić do takiego zadania wykwalifikowanych fachowców, którzy będą wiedzieli jakie prace wykonać krok po kroku, aby domownicy mogli jak najszybciej skorzystać z nowego asortymentu."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie bukowe", "balustrada gięta drewniana"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z profila o przekroju 6 x 6 cm oraz dystansów między stopniami", "stopnie bukowe", "balustrada ze stali nierdzewnej"]))
                    ]);
                    
                    break;
                    
                case "bartek":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody Bartek", [
                            "Schody powinny posiadać wymiar praktyczny, ale także cieszyć oko piękną oprawą. Takie właśnie są schody bukowe Bartek."
                        ]),
                        new OfferDetailsSegmentModel("Niezwykłe właściwości drewna", [
                            "Drewniane schody cieszą się niesłabnącą od lat popularnością. Nic dziwnego, posiadają wiele zalet. Stawia się je na etapie już prac wykończeniowych, dzięki czemu można indywidualnie dopasować je do pomieszczenia i swoich potrzeb. Drewno, czyli materiał w większości użyty do ich wykonania cechuje niezwykła wytrzymałość na czynniki zewnętrzne. Drewno emanuje ciepłem, wprowadzając przytulny klimat do każdej aranżacji. Materiał ten zapewnia także lekkość konstrukcji. Dzięki temu schody są niezawodne i umożliwiają wieloletnie użytkowanie.",
                            "Schody w domu jednorodzinnym są zwykle często i intensywnie użytkowane. Mimo lekkości schodów drewnianych, są one mocne i niezwykle wytrzymałe, więc zdecydowanie nadają się do budynków mieszkalnych. Solidne schody bukowe będą świetnie współgrać z innymi elementami wnętrza, np. cegłą lub metalem. Ponadto drewno jest materiałem ponadczasowym, który zawsze będzie w modzie. Stawiasz zatem na klasykę połączoną z najlepszej rangi jakością produktów."
                        ]),
                        new OfferDetailsSegmentModel("Drobiazgowe wykończenie", [
                            "Proponowane schody zostały wykonane z dbałością o każdy szczegół. Wykończone balustradą ze stali nierdzewnej, która również znana jest ze swojej trwałości. Oprócz tego zapewnia elegancki design, który świetnie wpisze się w każdą aranżację wnętrza, niezależnie od stylu w jakim jest utrzymana. Schody bukowe Bartek doskonale sprawdzą się we wnętrzu utrzymanym w klasycznym tonie, jak i nowoczesnym. Wpiszą się w styl industrialny czy hollywoodzki. Zapewniają szeroką dowolność aranżacji wnętrza. Gustowne wykończenie wprowadzi do wnętrza szyk i klasę, podkreślając jednocześnie jego charakter.",
                            "Schody bukowe Bartek są wygodne w użytkowaniu i świetnie wpisują się w każde pomieszczenie, nie zabierając tym samym nadmiernej ilości przestrzeni. Wybierając proponowane przez nas schody, wybierasz najwyższą jakość produktu połączoną z unikalnym wyglądem."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna modułowa", "stopnie bukowe", "balustrada metalowa malowana proszkowo"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna modułowa ze stali nierdzewnej polerowanej", "stopnie bukowe", "balustrada ze stali nierdzewnej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/3/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "3")], ["konstrukcja nośna modułowa", "stopnie bukowe", "balustrada metalowa malowana proszkowo"]))
                    ]);
                    
                    break;
                    
                case "ceownikowe":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Czym są schody ceownikowe?", [
                            "Ceowniki, które stanowią element składowy schodów są wyrobami hutniczymi, które w przekroju przypominają literę C. Zimnogięte lub gorącowalcowane kształtowniki są niezwykle uniwersalne w zastosowaniu, przybierając nieograniczone rozmiary. Znakomitej jakości materiał konstrukcyjny sprawdza się w budownictwie, przemyśle oraz wielu dziedzinach, wymagających zastosowania tego typu kształtowników. Jako składowa schodów ceowniki zostały ubrane w nowoczesną formę, zamkniętą w drewnianą zaślepkę. Połączenie drewna i stali sprawia, że schody ceownikowe są nie tylko solidne i trwałe, ale i wyjątkowo efektowne."
                        ]),
                        new OfferDetailsSegmentModel("Modne schody ozdobą wnętrza", [
                            "Dobór schodów do domu lub firmy wiąże się nie tylko z uwzględnieniem solidności i trwałości wykonania. Schody powinny doskonale odzwierciedlać charakter pomieszczeń oraz wyznaczać stylistykę aranżacji. Dostępne w wielu wersjach schody nowoczesne charakteryzują się zastosowaniem materiałów takich jak stal i drewno. Podobnie prezentowane, wyjątkowe schody ceownikowe z balustradą ze stali, malowaną proszkowo. Praktyczne, trwałe i niezwykle efektowne schody to stabilność użytkowania przez wiele lat."
                        ]),
                        new OfferDetailsSegmentModel("Gdzie sprawdzą się schody ceownikowe?", [
                            "Zastosowanie ażurowych stopni drewnianych w połączeniu ze stalową balustradą, również o wysokiej transparentności dodaje konstrukcji lekkości. Schody odpowiednie będą w przypadku projektów, uwzględniających schody w salonie. Wpisane w kompozycję wystroju salonu schody ceownikowe będą jego wyjątkową ozdobą, a jednocześnie wygodnym ciągiem komunikacyjnym, zapewniającym łatwość przemieszczania się. Zastosowanie schodów  tego typu w pomieszczeniach biurowych oraz lokalach gastronomicznych wydobędzie nowoczesny charakter pomieszczeń oraz zapewni znakomity efekt wizualny. Wygodne w użyciu schody sprawią, że wielokrotne pokonywanie odległości, pomiędzy niższą, a wyższą kondygnacją nie będzie uciążliwe. Jakość materiału i montażu stanowi gwarancję niezawodności."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z ceowników wraz z maskownicami dębowymi", "stopnie dębowe", "balustrada metalowa malowana proszkowo"]))
                    ]);
                    
                    break;
                    
                case "krzysia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody metalowe Krzysia", [
                            "W dzisiejszych czasach schody wewnętrzne to nie tylko element konstrukcyjny budynku, ale i wysokiej klasy ozdoba domu i mieszkania. Projektując nasze schody, staramy się zaspokoić wszystkie potrzeby naszych klientów i stworzyć element bezpieczny, wytrzymały i cieszący oko. Wieloletnie doświadczenie umożliwiło nam stworzenie nowoczesnych schodów, które pasują do stylowej i ekstrawaganckiej architektury dzisiejszych domów."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesne schody wewnętrzne Krzysia", [
                            "Konstrukcja schodów Krzysia opiera się na dwóch metalowych policzkach ze stali nierdzewnej. Element konstrukcyjny jest ażurowy i ma wycięte oczka, co sprawia, że schody mają dużą wytrzymałość i są lekkie. Schody wewnętrzne Krzysia stanowią element zwieńczający i dopełniający całość konstrukcji budynku. Gwarantujemy, że nasze schody staną się obiektem pożądania i zazdrości Państwa rodziny i sąsiadów. Zapewniamy, że nasze schody można dostosować do różnych wysokości kondygnacji i wielu konstrukcji budynków."
                        ]),
                        new OfferDetailsSegmentModel("Dwie konfiguracje schodów wewnętrznych", [
                            "Unikalną konstrukcję schodów wewnętrznych Krzysia przedstawiamy w dwóch konfiguracjach. Konstrukcja w każdej konfiguracji pozostaje bez zmian i opiera się na dwóch płaskich, metalowych, wytrzymałych policzkach."
                        ]),
                        new OfferDetailsSegmentModel("Krzysia 1", [
                            "Schody Krzysia 1 to propozycja o jaśniejszej kolorystyce. Gustowne policzki konstrukcyjne ze stali nierdzewnej są polerowane i idealnie komponują się ze szklaną balustradą. Schody posiadają wysokiej klasy stopnie jesionowe, które są odporne na ścieranie i mają podwyższoną wytrzymałość na uderzenia mechaniczne. Takie rozwiązanie sprawdzi się, gdy mamy dzieci lub w przypadku częstszego korzystania z wyższej kondygnacji.",
                            "Piękna szklana balustrada z szyby hartowanej zapewnia wysoką wytrzymałość. Balustrada przymocowana jest do policzków za pomocą gustownych, chromowanych trzpieni. Zwieńczeniem balustrady jest wysokiej jakości drewniana poręcz."
                        ]),
                        new OfferDetailsSegmentModel("Krzysia 2", [
                            "Druga konfiguracja schodów Krzysia charakteryzuje się ciemniejszymi kolorami. Element konstrukcyjny w postaci policzków jest matowy. Przyjemne stopnie schodów wykonane są z dębu i doskonale komponują się z ażurowymi policzkami. Dębowe stopnie to również gwarancja wysokiej wytrzymałości i trwałości na lata.",
                            "W schodach Krzysia 2 dodatkowym elementem jest zastosowanie pionowych szczebli, które stanowią element konstrukcyjny całej balustrady. Do szczebli za pomocą zacisków stabilnie przymocowane są szklane panele z szyby hartowanej. Ciemne dębowe poręcze są idealnym zwieńczeniem balustrady."
                        ]),
                        new OfferDetailsSegmentModel("Bezpieczeństwo i ergonomia", [
                            "Szerokie i stabilne stopnie naszych schodów zapewnią bezpieczne poruszanie się między kondygnacjami. Idealna wysokość stopnia sprawia, że wchodzenie po schodach nie będzie męczące. Ciepłe, drewniane stopnie zachęcą do poruszania się gołą stopą. Luksusowa poręcz zapewni stabilny chwyt i pomoże wejść na piętro. Odpowiednia wysokość balustrady chroni przed niekontrolowanym upadkiem."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z policzków metalowych ze stali nierdzewnej z wyciętymi \"oczkami\"", "stopnie jesionowe", "balustrada szklana z szyby hartowanej"])),
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/2/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "2")], ["konstrukcja nośna z policzków metalowych ze stali nierdzewnej z wyciętymi \"oczkami\"", "stopnie dębowe", "balustrada szklana z szyby bezpiecznej"]))
                    ]);
                    
                    break;
                    
                case "klara":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Eleganckie i solidne schody Klara do każdego wnętrza", [
                            "Wybór właściwych schodów wewnętrznych to niełatwe zadanie. Musimy wziąć pod uwagę funkcjonalność, wygląd pasujący do wnętrza, a także jakość wykonania. Jeśli szukasz czegoś wyjątkowego, nowoczesne schody Klara z całą pewnością sprostają Twoim oczekiwaniom. Cechują się one lekką i przestronną konstrukcją, a jednocześnie nie zajmują wiele miejsca. To sprawia, że są wyjątkowo cenione przez klientów."
                        ]),
                        new OfferDetailsSegmentModel("Funkcjonalna konstrukcja nośna", [
                            "Ten model schodów jest ustawiany w taki sposób, aby jeden bok mógł zostać zamontowany na ścianie. Wykorzystuje się konstrukcje nośne wykonane z eleganckiej, ciemnej stali. To one zapewniają schodom oczekiwaną stabilność. Do konstrukcji nośnej przymocowane są natomiast drewniane szczeble. Bok zewnętrzny jest obudowany balustradą ze stali nierdzewnej. Cała konstrukcja jest wyjątkowo lekka oraz daje uczucie przestronności. To świetny wybór do pomieszczeń, w których stawiamy na większą oszczędność miejsca."
                        ]),
                        new OfferDetailsSegmentModel("W jakich sytuacjach sprawdzą się te schody?", [
                            "Jest to model stosowany wewnątrz budynku. Dębowe schody Klara łączą w sobie cechy elegancji i prostoty typowej dla stylu skandynawskiego. Niemniej jednak świetnie sprawdzą się także w bardziej surowych, industrialnych wnętrzach. Projekt w swojej pełnej krasie robi ogromne wrażenie na klientach. Przemyślane łączenie drewna oraz stali nierdzewnej sprawia, że schody komponują się perfekcyjnie z wieloma aranżacjami.",
                            "Mamy tu trzy dominujące kolory: Konstrukcja nośna oraz poręcz balustrady są wykonane z ciemnej stali wchodzącej w czerń. Stopnie wykonano natomiast z jasnego dębu. Wewnętrzną zabudowę balustrady uzupełniają cienkie, srebrne pręty. Wykorzystano zatem bardzo praktyczne kolory świetnie odnajdujące się w każdej sytuacji."
                        ]),
                        new OfferDetailsSegmentModel("Z myślą o bezpieczeństwie i komforcie klientów", [
                            "Materiały, z których produkowane są dębowe schody Klara, są starannie selekcjonowane w trosce o maksymalne bezpieczeństwo naszych klientów. Wybieramy jedynie najtrwalsze materiały, które przez wiele, wiele lat będą odznaczać się nienaganną wytrzymałością oraz odpornością na uszkodzenia mechaniczne. Zarówno dębowe stopnie, jak również stalowa balustrada cechują się perfekcyjnym wykonaniem. Dokładamy wszelkich starań, aby produkty dostępne w naszej ofercie stanowiły idealne połączenie innowacji z jakościowym wykonaniem."
                        ]),
                        new OfferDetailsSegmentModel("Schody Klara to rozwiązanie dla wymagających", [
                            "Jeśli oczekujesz od schodów połączenia funkcjonalności, eleganckiego wyglądu, a także solidnego wykonania, nowoczesne schody Klara z całą pewnością sprostają Twoim oczekiwaniom. To oryginalny projekt, który stawia na ponadczasowy wygląd, dzięki czemu schody świetnie wkomponują się do każdego pomieszczenia. To jeden z najbardziej prestiżowych i popularnych modeli w naszej ofercie. Setki klientów mogą wystawić pozytywną rekomendację pod adresem schodów Klara."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z policzków metalowych", "stopnie dębowe", "balustrada ze stali zwykłej i nierdzewnej"]))
                    ]);
                    
                    break;
                    
                case "franek":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody Franek", [
                            "Proponowane przez nasz sklep schody Franek to doskonała propozycja dla wszystkich miłośników nowoczesnego i industrialnego stylu. Zostały wykonane z najwyższej klasy materiałów, dlatego stanowią doskonały kompromis pomiędzy funkcjonalnością i estetyką."
                        ]),
                        new OfferDetailsSegmentModel("Nowoczesność i elegancja", [
                            "Stopnie wykonane z bukowego drewna oraz balustrada z hartowanego szkła to elementy, które wpływają na unikalny design schodów Fanek. Już pierwszy rzut oka na tę konstrukcję przekonuje, że będzie ona idealnym uzupełnieniem wnętrza utrzymanego w nowoczesnym stylu. Połączenie drewna i szkła to jeden z najbardziej charakterystycznych trendów wnętrzarskich ostatnich lat. Schody te będą doskonale pasowały do drewnianych podłóg wyszlifowanych na wysoki połysk oraz do ścian utrzymanych w białych lub szarych barwach. Również wnętrza industrialne będą doskonałym miejscem do zamontowania proponowanego modelu schodów. Schody Franek pasują zarówno do otwartego salonu, jak i do hallu lub zamkniętej klatki schodowej."
                        ]),
                        new OfferDetailsSegmentModel("Trwałość na lata", [
                            "Bukowe schody z szklaną balustradą Franek zostały wykonane z najlepszej klasy materiałów. Połączenie bukowego drewna, hartowanego szkła i stali to mieszkanka, która tworzy wyjątkowo stabilną i estetyczną konstrukcję. Bukowe drewno jest znane ze swojej wyjątkowej wytrzymałości, dlatego decydując się na ten model schodów możemy mieć pewność, że przy odpowiedniej konserwacji będą służyły nam przez długie lata. Istotną rolę pełni tutaj nowoczesna szklana balustrada, która cechuje się optymalną wysokością. Jedną z najważniejszych kwestii, jakie bierzemy pod uwagę podczas wyboru schodów jest bezpieczeństwo, które powinny one zapewnić domownikom. Dzięki stabilności, którą zapewniają metalowe wkręty, bukowe drewna i rzeczona balustrada, schody Franek doskonale sprawdzą się zarówno w domu, w którym mieszkają dzieci, jak i w tym, w którym obecni są seniorzy. To doskonałe połączenie trwałości i piękna, które z pewnością zachwyci miłośników nowoczesnych rozwiązań i ponadczasowej jakości."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z profila 4 x 8 cm oraz bolców do ścian", "stopnie bukowe", "balustrada szklana z szyby hartowanej"]))
                    ]);
                    
                    break;
                    
                case "kuba":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Dębowe schody z balustradą z linkami - połączenie tradycji z nowoczesnością", [
                            "Uniwersalność aranżacji wnętrza możliwa jest dzięki zastosowaniu materiałów ponadczasowych, tworzących wygodne, dopasowane do gustu i potrzeb wnętrze. Kształty, określające styl, w jakim utrzymana jest stylistyka pomieszczenia są ściśle związane z zastosowanym materiałem oraz precyzyjnym wykończeniem. Schody dębowe, które powstają na konstrukcji metalowej to znakomite rozwiązanie w miejscu, gdzie tradycja spotyka się z nowoczesnością. Skuś się na nowoczesne rozwiązanie przy użyciu tradycyjnych materiałów."
                        ]),
                        new OfferDetailsSegmentModel("Nośna konstrukcja, efekt lekkości", [
                            "Wyjątkowej lekkości nadają stopnie wraz z ażurowymi odstępami. Połączone stelażem metalowym, przebiegającym przez środek stopnia schody prezentują się solidnie, a jednocześnie nie przytłaczają wnętrza. Dębowe schody z balustradą z linkami stanowią nowoczesny element wystroju. Modne, doskonale napięte linki wzmacniają efekt lekkości, zapewniając transparentność oraz swobodę użytkowania. Drewniana, gustowna balustrada o minimalistycznym kształcie zapewnia wrażenie nowoczesnego minimalizmu. Konstrukcja metalowa zapewnia stabilność, a najwyższej klasy specjaliści, zajmujący się montażem stanowią gwarancję trwałości."
                        ]),
                        new OfferDetailsSegmentModel("Gdzie sprawdzą się dębowe schody z balustradą z linkami?", [
                            "Stylowe i praktyczne schody na metalowej, nośnej konstrukcji doskonale sprawdzą się w domach, w których nie chcemy poświęcać schodom zbyt wiele przestrzeni. Dzięki wrażeniu lekkości optycznie powiększają przestrzeń wokół, zapewniając doskonałe dopasowanie pozostałych elementów wyposażenia domu. Znakomicie pasują do biur, w których dwupoziomowe wnętrza służą pracownikom. Schody, wyposażone w linkową balustradę, posiadają drewniana poręcz, zapewniającą bezpieczne przemieszczanie się w obydwu kierunkach. Schody z stopniami dębowymi, stanowiącymi oddzielne fragmenty, wymagają zachowania ostrożności podczas użytkowania. Efekt zachwyca i zapewnia trwałość użytkowania przez wiele lat."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna modułowa", "stopnie dębowe", "balustrada z linkami"]))
                    ]);
                    
                    break;
                    
                case "jeremi":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Metalowo-dębowe schody Jeremi -  Ty też możesz mieć nowoczesne schody", [
                            "Przekonanie o niedostępności nowoczesnych, stylowych schodów z uwagi na cenę nie ma zastosowania w ofercie naszej firmy. Od blisko ćwierć wieku tworzymy dla Was schody z uwzględnieniem oczekiwań, potrzeb, doskonałych materiałów oraz nowoczesnych trendów aranżacyjnych. Chcemy, aby w waszych domach schody były powodem do dumy oraz stanowiły bezpieczny, trwały i użyteczny ciąg komunikacyjny. Nasze metalowo-dębowe schody Jeremi zachwycają nowoczesnością... i przystępnością."
                        ]),
                        new OfferDetailsSegmentModel("Czy metalowo-dębowe schody pasują do Twojego domu?", [
                            "Konsekwencja w tworzeniu wystroju wnętrz ma duże znaczenie. Projektując swój wymarzony dom lub mieszkanie dwupoziomowe, warto wykonać wizualizację przestrzeni wewnętrznej, aby zaplanować rozmieszczenie elementów, kolorystykę oraz styl, w jakim utrzymana zostanie aranżacja. Jeżeli Twoimi ulubionymi materiałami, otaczającymi Cię we wnętrzach są metal i drewno, nie musisz z żadnego rezygnować. Połączenie ciepłego drewna z zimnym metalem przynosi nadspodziewanie dobre efekty. Czy można dołączyć trzeci składnik w postaci szkła? W pomieszczeniach, w których króluje nowoczesność i styl industrialny zdecydowanie tak."
                        ]),
                        new OfferDetailsSegmentModel("Wyjątkowo nowoczesne, zachwycająco proste", [
                            "Metalowo-dębowe schody Jeremi to konstrukcja z metalu, której stopnie pokryte zostały drewnem dębowym. Widoczne, metalowe połączenia nadają całości surowego charakteru, zapewniającego wzmocnienie minimalizmu w stylistyce wnętrza. Aranżacja, która bogata jest w elementy metalowe i drewniane, które poza schodami warto wykorzystać w pozostałych składowych wystroju doskonale łączy w sobie nowoczesność z ciepłem i przytulnością. Szklana balustrada sprawdzi się wtedy, gdy pomieszczenie doświetlone jest dużymi oknami, wprowadzającymi dużą ilość naturalnego światła. Balustrada transparentna umożliwi dotarcie promieni słonecznych do klatki schodowej. Schody, które oferujemy to gwarancja niezawodności i trwałości."
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna z policzków metalowych", "stopnie metalowo-dębowe", "balustrada z wypełnieniem szklanym"]))
                    ]);
                    
                    break;
                    
                case "tytus":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("Schody Tytus", [
                            "Jesionowe schody Tytus to doskonała propozycja dla miłośników nowoczesnych wnętrz i praktycznego stylu. Bielone stopnie wykonane z drewna jesionowego oraz metalowa rama to gwarancja trwałości i doskonałej jakości."
                        ]),
                        new OfferDetailsSegmentModel("Lekkość i nowoczesność", [
                            "Jesionowe schody Tytus to niezwykle lekka i utrzymana w minimalistycznym designie propozycja dla  świeżych i nowoczesnych wnętrz.  Prosta i minimalistyczna konstrukcja schodów to rozwiązanie, które coraz częściej pojawia się w domach i biurach należących do osób, które znają się na najnowszych trendach. Nie ma jednak żadnych przeszkód, aby zdobiły one bardziej przytulne wnętrza, na przykład te w stylu skandynawskim. Połączenie jasnego drewna z czarną ramą to uniwersalny i elegancki zestaw, który sprawdzi się niemal w każdej przestrzeni. Drewniane stopnie doskonale skomponują się z podłogami wykonanymi z tego samego materiału. Jesionowe schody Tytus to konstrukcja, która nie zajmuje zbyt wiele miejsca, dlatego będzie się świetnie prezentować nie tylko w dużych domach, ale także w niewielkich dwupoziomowych apartamentach. Przestrzeń pod schodami może być wówczas dowolnie zaadaptowana, co stanowi dodatkowy atut proponowanych schodów."
                        ]),
                        new OfferDetailsSegmentModel("Stabilność przede wszystkim", [
                            "Schody jesionowe Tytus zostały zaprojektowane w jednobelkowej stalowej konstrukcji nośnej. Zapewnia ona stabilność i niezwykły komfort użytkowania. Jesionowe drewno, z którego wykonane zostały stopnie znane jest ze swojej ogromnej trwałości, dlatego możemy mieć pewność, że montując te schody w swoim domu zapewniamy sobie wygodę i bezpieczeństwo na długie lata. Niezależnie od tego, czy w domu są dzieci lub osoby starsze, możemy mieć pewność, że schody Tytus zapewnią wszystkim mieszkańcom optymalny komfort codziennego korzystania.",
                            "Ta doskonała konstrukcja będzie nie tylko funkcjonalnym elementem przestrzeni, ale także prawdziwą ozdobą domu, niezależnie od tego, czy planujemy, aby schody znajdowały się w hallu, czy na przykład w salonie. To idealne połączenie funkcjonalności i estetyki"
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$mark/1/1.jpg", null, new LabelModel([new LabelLineModel("$mark ", "1")], ["konstrukcja nośna jednobelkowa stalowa", "stopnie jesionowe bielone"]))
                    ]);
                    
                    break;                                              
            }
        }
        else
        {
            $model = new OfferModel(OfferGalleryMode::Tiles);
            $model->getPageHeader()->addLine("schody ", "drewniano stalowe");
    
            foreach ($names as $name)
            {
                $model->addGalleryElement(new GalleryElementModel("/public/extras/images/gallery/offer/woodsteel/$name.jpg", "schody $name", null, "offer/woodsteel/$name"));
            }
        }

        $this->view("Offer/index", $model, []);
    }
}