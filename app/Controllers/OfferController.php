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
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "sandra":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                
                    break;

                case "sylwia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
            
                    break;
                    
                case "kasandra":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);

                    break;

                case "kamila":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);

                    break;

                case "lila":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);

                    break;

                case "linda":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);

                    break;

                case "tania":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
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
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "dawid":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "ada":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "ignacy":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "patryko-rzymskie":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "rzymskie":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;

                case "tymon":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "natalia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "matylda":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "bartek":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "ceownikowe":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "krzysia":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "klara":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "franek":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "kuba":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "jeremi":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
                    ]);
                    
                    break;
                    
                case "tytus":
                    $model->setTextParagraphs([
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ]),
                        new OfferDetailsSegmentModel("", [
                            ""
                        ])
                    ]);

                    $model->setGallery([
                        new GalleryElementModel("/public/extras/images/gallery/offer/concrete/1/1.jpg", null, new LabelModel([new LabelLineModel("schody"), new LabelLineModel("na beton ", "1")], ["", "", ""]))
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