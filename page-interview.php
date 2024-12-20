<?php

get_header();

require_once get_template_directory() . '/partials/functions/page-starter.php';

ob_start();

?>

<h1 class="font-heading text-heading-xl" data-scroll-appear>Interview</h1>

<?php

pageStarter(ob_get_clean());

?>

<div class="px-6 py-6 flex flex-col gap-6">
    <audio
        data-scroll-appear
        class="w-full max-w-7xl mx-auto" 
        src="<?php echo get_template_directory_uri(); ?>/assets/audio/Interview_Recording.mp3" 
        controls
    >
    </audio>
    <hr class="w-full h-[2px] max-w-7xl mx-auto bg-neutral-300 rounded-full">
</div>

<section class="px-6 py-9">
    <div class="w-full max-w-7xl mx-auto flex flex-col gap-36">
        <h2 class="sr-only">Over het interview</h2>
        <div class="flex flex-col gap-12 grid-cols-2 md:grid md:gap-24" data-scroll-appear>
            <div class="h-full flex items-center">
                <div class="flex flex-col gap-9 lg:px-6">
                    <h3 class="font-heading text-heading-sm">Wie hebben wij geïnterviewd?</h3>
                    <div class="flex flex-col gap-6">
                        <p>
                            <span class="text-primary">Robbe Moysen</span>, beter bekend als Vibraphonics op sociale media, is al bijna zijn hele leven gepassioneerd door percussie. Percussie omvat een breed scala aan slagwerkinstrumenten, groot en klein, afkomstig uit verschillende delen van de wereld. Robbe beheerst diverse vormen van slagwerk, zoals klein slagwerk, drums, pauken en melodische percussie, waaronder de vibrafoon.
                        </p>
                        <p>
                            Met meer dan 15 jaar ervaring als muzikant heeft Robbe aan talrijke projecten meegewerkt. <span class="text-primary">Hij speelt al sinds zijn jeugd in een harmonieorkest, maakt deel uit van een bluesband en is al zeven jaar actief in een Schotse pipeband.</span> Met deze laatste heeft hij door West-Europa getourd in landen zoals Nederland, Frankrijk, Duitsland en Zwitserland.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center h-full">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/interview_picture_1.png" alt="Een foto van Robbe Moysen">
            </div>
        </div>
        <div class="flex flex-col gap-12 grid-cols-2 md:grid md:gap-24" data-scroll-appear>
            <div class="h-full flex items-center">
                <div class="flex flex-col gap-9 lg:px-6">
                    <h3 class="font-heading text-heading-sm">Waarom hebben wij Robbe Moysen gekozen voor dit interview?</h3>
                    <div class="flex flex-col gap-6">
                        <p>
                            Met zijn 15 jaar ervaring in de muziekwereld en zijn immense passie voor muziek, die waarschijnlijk zelfs groter is dan die van ons, leek Robbe ons de ideale kandidaat voor een interview op onze website. Het bood ons niet alleen de kans om zijn verhaal te delen, maar ook om zelf meer te leren over de wereld van muziek.
                        </p>
                        <p>
                            Als iemand die <span class="text-primary">zelf muziek heeft gecomponeerd en gepubliceerd, begrijpt Robbe als geen ander de uitdagingen waar kleine muzikanten mee te maken krijgen.</span> Hij heeft uit eerste hand ervaren hoe moeilijk het kan zijn om muziek te maken, een publiek te bereiken en jezelf te promoten via sociale media. Deze unieke inzichten maken Robbe de perfecte persoon om van te leren.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center h-full md:-order-1">
                <img class="max-w-md w-full" src="<?php echo get_template_directory_uri(); ?>/assets/images/interview_picture_2.jpg" alt="Een foto van Robbe Moysen">
            </div>
        </div>
        <div class="flex flex-col gap-12 grid-cols-2 md:grid md:gap-24" data-scroll-appear>
            <div class="h-full flex items-center">
                <div class="flex flex-col gap-9 lg:px-6">
                    <h3 class="font-heading text-heading-sm">Wat hebben we uit het interview geleerd?</h3>
                    <div class="flex flex-col gap-6">
                        <p>
                            Dit interview met Robbe Moysen heeft ons enorm veel inzichten gegeven, zowel over hem als persoon als over zijn uitgebreide ervaringen in de muziekwereld. We kregen een inkijk in zijn muzikale reis, die al begon toen hij nog jong was, en hoe die zich door de jaren heen heeft ontwikkeld.
                        </p>
                        <p>
                            Daarnaast leerden we over <span class="text-primary">AMV, oftewel Algemene Muziekvorming</span>, een basisopleiding die in muziekscholen wordt aangeboden. Robbe legde uit hoe dit programma werkt en hoe het een opstap kan zijn naar verdere muzikale specialisaties binnen de muziekschool.
                        </p>
                        <p>
                            Ook vertelde hij ons over zijn betrokkenheid bij een <span class="text-primary">Schotse pipeband</span>, waarbij hij de unieke aspecten van deze muziekstijl en traditie belichtte. Tot slot kregen we zelfs een stukje muziektheorie mee: Robbe introduceerde ons in het concept van time signatures. Dit is een aanduiding in muzieknotatie die aangeeft hoeveel tellen van een bepaalde nootwaarde er in een maat passen. Hij illustreerde dit met voorbeelden uit bekende muziekstukken en vertelde ons over enkele van de meest bijzondere en <span class="text-primary">complexe time signatures</span> die hij kent of zelf heeft gebruikt.
                        </p>
                        <p>
                            Dit interview heeft ons niet alleen meer geleerd over Robbe, maar ook over muziek in het algemeen, en het inspireerde ons om nog dieper in deze fascinerende wereld te duiken.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center h-full">
                <img class="max-w-md w-full" src="<?php echo get_template_directory_uri(); ?>/assets/images/interview_picture_3.jpg" alt="Een foto van Robbe Moysen">
            </div>
        </div>
    </div>
</section>

<div aria-hidden="true" class="px-6">
    <hr class="w-full h-[2px] max-w-7xl mx-auto bg-neutral-300 rounded-full">
</div>

<section class="px-6 py-12">
    <div class="w-full max-w-7xl mx-auto flex flex-col gap-12">
        <div class="flex flex-col gap-3" data-scroll-appear>
            <h2 class="text-heading-base font-heading text-center">Transcriptie</h2>
            <p class="italic font-light text-center">vanaf 24:27 tot 31:02</p>
        </div>
        <div class="max-w-lg mx-auto flex flex-col gap-12">
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Seppe]</h3>
                <p>
                    Je staat niet elke dag in het Sportpaleis. Kan je ons eens doorlopen hoe die ervaring was met de pipeband?
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Als je zo’n shows doet, is dat een hele dag werk. Gelukkig heb je bij zo’n grote shows als artiest niet veel opbouw te doen, want daar hebben ze al een heel team voor. Als artiest begint je dag rond de middag, wanneer je er aankomt om te eten. Dat is ook vooral omdat je met zoveel muzikanten werkt. Zeker toen, met “Music Show Scotland,” dat waren een aantal honderd muzikanten die meespeelden. Iedereen moet daar aankomen en ze komen uit verschillende landen, zoals Duitsland, de verste kanten van Nederland, of zelfs sommige uit Zwitserland.
                </p>
                <p>
                    Daarna beginnen de repetities, waar je alles doorloopt. Je kleedt je dan nog niet aan in je uniform, wat voor een pipeband redelijk belangrijk is. Dit houdt voor ons in een Scottish full dress: dat is een kilt, herenschoenen, kilt hoses (dat zijn speciale hoge sokken), en een Sgian-dubh, wat een mes is dat je in je sokken steekt. Bij ons is dat niet echt, want je vertrouwt mensen op de Meir niet echt om dat niet uit je sokken te halen. Daarboven heb je een specifieke vest van de Scottish full dress met twee soort van vleugeltjes op je schouders om breder te lijken. Dan heb je een plaid, wat eigenlijk een soort van sjaal is, en een crossbelt. Voor de doedelzakspelers hangt daar niets aan, maar voor drummers zoals ik hangt daar je drum aan om mee te marcheren.
                </p>
                <p>
                    Dus voor het omkleden is het eerst een hele namiddag repeteren waarbij alles op het programma wordt doorgenomen, want je speelt wel in veel van het programma mee. Daarna wordt er nog eens gegeten en omgekleed. Terwijl we dat aan het doen zijn, gebeuren er soundchecks van wat ze “castle band” noemen, wat eigenlijk een band en een orkest is dat met ons meespeelt. Ik zeg “castle band” omdat je niet alleen op het podium staat; ook de grondvloer wordt gebruikt om te marcheren.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Seppe]</h3>
                <p>
                    Oh wauw, dus dan zitten de mensen alleen maar aan de zijkant en van boven?
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Die zitten enkel in de coulisse en helemaal vanachter, waar het podium zou staan, staat een kasteel. Als je start, marcheer je achter het kasteel, door het kasteel en op het plein. Daar begin je je formatie en figuren te vormen, en heel het plein wordt gevuld met mensen die spelen.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Seppe]</h3>
                <p>
                    Dat is dan toch wel een gek beeld om te zien. Maar dat vergt toch veel coördinatie, zelfs buiten het muziek spelen?
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Ja, binnen de pipebandwereld noemen ze dat “marching and discipline.” Dat is nog een hele discipline daarnaast. Je moet ten eerste zien dat je op de maat start, ten tweede dat je met de juiste voet start, en ten derde dat je gelijnd staat met de personen naast en voor je. Ten vierde: op wie moeten we exact lijnen? Bijvoorbeeld, is de middelste persoon het belangrijkste, of is de rechter persoon het belangrijkste? Hoe lopen we? Wie volgen we? Dat zijn allemaal disciplines die je moet leren voor de pipeband.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Tim]</h3>
                <p>
                    Heb je live ooit al een fout gemaakt, of een redelijk grote fout?
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Euhm, ja, het is 100% al gebeurd, want ik heb al zoveel shows gespeeld met die band. Maar ik moet er even over nadenken.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Tim]</h3>
                <p>
                    Want het lijkt wel redelijk moeilijk om alles juist te doen, zeker op zo’n momenten.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Grote fouten nog niet direct zelf, maar mijn broer al wel. Daar ga ik het niet over hebben, want ik denk niet dat ik zijn toestemming krijg om dat online te delen. Er was wel iemand die al te laat opgekomen is en die, terwijl al iedereen op het plein stond, tussen iedereen door naar zijn plek moest lopen. Gelukkig staan er veel mensen op dat plein, dus dat zie je niet zo makkelijk. Ik heb iemand gekend die continu zijn stokken liet vallen. Zelf heb ik dat gelukkig nog nooit gehad, maar ik heb al wel gehad dat ik ernaast aan het spelen was en dat ik even moest stoppen met spelen om te zien waar ik weer kon inpikken.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Seppe]</h3>
                <p>
                    Maar ik neem aan dat, zoals je al zei, met zoveel mensen dat niet zo opvalt of dat het niet zo moeilijk is om daarna weer in te pikken? Dat het zeker geen ramp is.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold text-primary">[Robbe]</h3>
                <p>
                    Nee, dat is absoluut niet zo erg. Toch zeker niet met het soort muziek en de soort bands waarmee ik meespeel. Dat zou bijvoorbeeld anders zijn als je met een competitieband meespeelt, want daar wordt op alles gelet en daar wordt dat wel echt heel hard op gehamerd. Maar daar is natuurlijk het niveau van spelen ook veel hoger.
                </p>
            </div>
            <div class="flex flex-col gap-6" data-scroll-appear>
                <h3 class="font-semibold">[Einde transcriptie]</h3>
            </div>
        </div>
    </div>
</section>

<div aria-hidden="true" class="px-6">
    <hr class="w-full h-[2px] max-w-7xl mx-auto bg-neutral-300 rounded-full">
</div>

<section class="px-6 py-12 pb-24" data-scroll-appear>
    <div class="max-w-7xl mx-auto flex flex-col gap-12">
        <h2 class="text-center font-heading text-heading-base">Eigen muziekstuk gecomponeerd door Robbe Moyson</h2>
        <div class="w-full aspect-[16/9] rounded-3xl overflow-hidden" data-scroll-appear>
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wDS7JaxQQqk?si=ThBzzwrvuFUeWJDR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</section>



<?php

get_footer();

?>