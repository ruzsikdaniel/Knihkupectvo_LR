<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\BookCategory;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => 'Ľúbostný list',
                'author' => 'Lucinda Riley',
                'price' => 20.23,
                'detail' => 'Existuje ľúbostný list, ktorý by mohol zmeniť dejiny Anglicka. Tento ľúbostný list sa nachádza v pozostalosti známeho herca sira Jamesa Harrisona. Jeho odchod okrem smútiacej rodiny zanecháva aj šokujúce tajomstvo, aké by nikdy nemalo uzrieť svetlo sveta.

            Mladá ambiciózna novinárka Joanna Haslamová sa zúčastní na pohrebe jedného z najslávnejších britských hercov svojej generácie a náhodou tam začuje klebety o existencii záhadného listu, ktorý po sebe zanechal. Dlho neváha a pustí sa do pátrania na vlastnú päsť, netuší však, do akého nebezpečenstva sa púšťa… a ohrozí nielen seba, ale aj ľudí vo svojej blízkosti. Ten list sa snažia získať aj ľudia z najvyšších spoločenských kruhov s obrovským vplyvom a dotieravá novinárka je im tŕňom v oku. Nezastavia sa pred ničím. To však ani ona.

            Napínavý Thriller z pera autorky série Sedem sestier, odohrávajúci sa v dvadsiatych rokoch 20. storočia, zachytáva skutočné dobové reálie i postavy, šikovne pretkané fikciou, ako to dokáže len Lucinda Rileyová.',
                'genre' => 'Detective',
                'language' => 'Slovenčina',
                'pages' => 432,
                'publisher' => 'Tatran',
                'year' => 2020,
                'state' => 'je na sklade',
            ],
            [
                'name' => 'Bezmocná',
                'author' => 'Lauren Roberts',
                'price' => 15.80,
                'detail' => 'Elita už po desetiletí disponuje zvláštními schopnostmi, jež jí daroval Mor. Ačkoliv ne všichni měli to štěstí, že nemoc přežili a zároveň dostali do vínku moc. A právě ti jsou doslova Obyčejní. Když je král vykáže z království, nedostatek schopností se náhle stává hrdelním zločinem. Jedním z vyděděnců je i Paedyn Grayová. Skrývá se v chudinské čtvrti, kde je život mimořádně krutý, a vydává se za Elitu, aby splynula s ostatními a vyhnula se problémům. Jenže pak zachrání mladého cizince, aniž tuší, že to je jeden z ilyjských princů, Kai Azer. Za „odměnu“ je vybrána do Očistných zkoušek, brutální soutěže, která má demonstrovat sílu Elity. Pokud ji však nezabijí protivníci, postará se o ni Kai, k němuž začíná něco cítit. Jestli totiž zjistí, že Paedyn je ve skutečnosti Obyčejná, bude to znamenat její konec.',
                'genre' => 'Romantika',
                'language' => 'Čeština',
                'pages' => 344,
                'publisher' => 'YOLi CZ',
                'year' => 2023,
                'state' => 'je na sklade',
            ],
            [
                'name' => 'Bezohledná',
                'author' => 'Lauren Roberts',
                'price' => 11.80,
                'detail' => 'Království Ilya právě potlačilo povstání Odboje, ale klid nezavládl. Paedyn Grayová, patřící k Obyčejným, přežila Očistné zkoušky a poté, co v sebeobraně zabila krále, je na útěku před tím, komu začala až příliš důvěřovat. Kai Azer je nyní ilyjským Vymahatelem. Novým králem je jeho bratr Kitt, který ho pověřil, aby Paedyn našel a přivedl mu ji. Kai stopuje Paedyn přes nebezpečnou poušť Spáleniště do útrob nepřátelského města Dor a v hloubi duše si přeje, aby ji pronásledovat nemusel. Ve městě, kde Elity nic neznamenají, se však role lovce a kořisti mohou snadno měnit – a vnitřní souboj mezi touhou a smyslem pro povinnost může být smrtelný.',
                'genre' => 'Romantika',
                'language' => 'Čeština',
                'pages' => 290,
                'publisher' => 'YOLi CZ',
                'year' => 2025,
                'state' => 'je na sklade',
            ],
            [
                'name' => 'Odvážná',
                'author' => 'Lauren Roberts',
                'price' => 14.99,
                'detail' => 'Mírnou Adenu a bojovnou Paedyn svedl osud dohromady už v dětství a od té doby jsou nerozlučné. Vždycky si kryly záda a chránily svůj domov ve slumech Kořistné. Teď ale Paedyn – která patří k Obyčejným – vybrali do Očistných zkoušek, což pro ni znamená téměř jistou smrt. Adena zůstala v Kořistné sama a musí se naučit bránit. Po neúspěšném pokusu o krádež ji zachrání neznámý muž z trhu. Makova záhadná Minulosť a utajovaná moc ho odlišují od ostatních nižších Elit. Společně utvoří tým, aby mohli své milované vidět před Zkouškami, a jejich životu nebezpečná mise prověří sílu jejich loajálnosti i lásky.',
                'genre' => 'Romantika',
                'language' => 'Čeština',
                'pages' => 350,
                'publisher' => 'YOLi CZ',
                'year' => 2023,
                'state' => 'je na sklade',
            ],
            [
                'name' => 'Fearless',
                'author' => 'Lauren Roberts',
                'price' => 13.80,
                'detail' => 'Paedyn Gray and Kai Azer return to the Kingdom of Ilya... And Paedyn has a life-altering choice to make. Whatever she decides will determine her fate – and the fate of those around her – forever. ​
​
                In the ultimate battle of love and loyalty, who wins? Be swept away by the conclusion to the smash hit, dagger-to-the-throat romantasy trilogy.',
                'genre' => 'Romantika',
                'language' => 'English',
                'pages' => 380,
                'publisher' => 'Simon Schuster',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Reckless',
                'author' => 'Lauren Roberts',
                'price' => 23.80,
                'detail' => 'With more than 60 million views on TikTok, the second heart-racing instalment in this bestselling and sizzling fantasy romance trilogy. Perfect for fans of Fourth Wing and The Hunger Games.

The kingdom of Ilya is in turmoil…

After surviving the Purging Trials, Ordinary-born Paedyn Gray has killed the King, and kickstarted a Resistance throughout the land. Now she’s running from the one person she had wanted to run to.

Kai Azer is now Ilya’s Enforcer, loyal to his brother Kitt, the new King. He has vowed to find Paedyn and bring her to justice.

Across the deadly Scorches, and deep into the hostile city of Dor, Kai pursues the one person he wishes he didn’t have to. But in a city without Elites, the balance between the hunter and hunted shifts – and the battle between duty and desire is deadly.

Be swept away by this bestselling, dagger-to-the-throat romantasy trilogy taking the world by storm.',
                'genre' => 'Romantika',
                'language' => 'English',
                'pages' => 280,
                'publisher' => 'Simon Schuster',
                'year' => 2025,
                'state' => 'nie je na sklade',

            ],
            [
                'name' => 'Powerful',
                'author' => 'Lauren Roberts',
                'price' => 19.80,
                'detail' => 'Perfect for fans of The Hunger Games and Fourth Wing. Adena and Paedyn have always been inseparable. Fate brought them together when they were young, but friendship ensured they’d always protect each other and the home they built in the slums of Loot.

But now Paedyn – an Ordinary – has been selected for The Purging Trials, which means almost certain death. Now alone in Loot, Adena must fend for herself. After attempting to steal, it’s a mysterious man from the market who comes to her rescue. Mak’s shadowy past and secretive power set him apart from the other low-level Elites of Loot.',
                'genre' => 'Romantika',
                'language' => 'English',
                'pages' => 280,
                'publisher' => 'Simon Schuster',
                'year' => 2025,
                'state' => 'nie je na sklade',

            ],
            [
                'name' => 'Kráľovná ničoho',
                'author' => 'Holly Black',
                'price' => 13.80,
                'detail' => 'Moc sa dá získať veľmi jednoducho, zložitejšie je udržať si ju. Jude to zažila na vlastnej koži, keď sa výmenou za neobmedzené vládnutie vzdala kontroly nad skazeným kráľom Cardanom. Ako férska kráľovná vo vyhnanstve je Jude úplne bezmocná. Cardanova zrada ju vnútorne zožiera a čaká na vhodnú príležitosť, aby mohla získať späť všetko, o čo ju pripravil. Tá sa jej naskytne vo chvíli, keď sa jej dvojička, Taryn, ocitne v ohrození života. Jude si trúfne vrátiť sa na zradný férsky dvor, postaviť sa zoči-voči neutíchajúcim citom ku Cardanovi, a to všetko preto, aby zachránila svoju sestru. Elfham sa však medzičasom zmenil na nepoznanie. Schyľuje sa k vojne, a čím je Jude bližšie k nepriateľským líniám, tým väčšmi je zapletená do krvavej vojnovej politiky. Keď však začne účinkovať dávna kliatba, krajinu premkne panika a Jude si musí vybrať medzi vlastnými ambíciami a ľudskosťou…',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 400,
                'publisher' => 'Slovart',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Krutý princ',
                'author' => 'Holly Black',
                'price' => 16.93,
                'detail' => 'Holly Black, jedna z najúspešnejších autoriek detskej a YA literatúry súčasnosti, odštartovala v novej trilógii príbeh o manipulácii, kráse i krutosti sveta mágie a nevyspytateľných vášňach.

Jude mala len sedem rokov, keď jej rodičov brutálne zavraždili a spolu s jej dvomi sestrami ju uniesli zo sveta smrteľníkov, aby žili na Najvyššom dvore vo férskej ríši obývanej prastarými, často zákernými magickými bytosťami. O desať rokov neskôr si Jude neželá nič iné než medzi nich zapadnúť. Väčšina férov však smrteľníkmi opovrhuje. Najmä princ Cardan, najmladší a najskazenejší syn Najvyššieho kráľa. Jude sa čoraz viac zapletá do dvorných intríg a klamstiev a zisťuje, že aj ona dokáže podvádzať a prelievať krv. Ale v najvyšších kruhoch dochádza k zrade a hrozí, že Kráľovský dvor pohltí násilie. Jude preto bude riskovať vlastný život v nebezpečnom spojenectve, aby zachránila svoje sestry a samotnú ríšu.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 340,
                'publisher' => 'Slovart',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Skazený kráľ',
                'author' => 'Holly Black',
                'price' => 14.93,
                'detail' => 'Jude si rafinovanou dohodou k sebe pripútala krutého Cardana, a tak sa stala bábkarom ťahajúcim za nitky, tajnou vládkyňou skazeného kráľa. Mánevrovať v sieti neustále sa meniacich politických hier by však bolo náročné, aj keby sa dal Cardan jednoducho ovládať. On však robí všetko preto, aby ju ponížil a podryl jej autoritu, hoci je ňou nevysvetliteľne fascinovaný. Navyše, všetko nasvedčuje tomu, že pre Jude predstavuje niekto z jej blízkych hrozbu. Aby si Jude udržala moc, musí čo najskôr odhaliť zradcu – popri boji s vlastnými komplikovanými citmi voči Cardanovi. V pokračovaní bestselleru Krutý princ rozohráva jedna z najúspešnejších autoriek fantasy Holly Black nebezpečnú hru spletitých intríg a potlačovanej túžby.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 340,
                'publisher' => 'Slovart',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Ukradnutý dedič',
                'author' => 'Holly Black',
                'price' => 17.43,
                'detail' => 'Nenechajte si ujsť návrat do sveta krutých férov!
Od Bitky hada uplynulo osem rokov. Lady Nore z Dvora zubov sa opäť usadila na neprístupnom severe, kde vdychuje život príšerám z konárov a snehu, verným služobníkom, ktorí sú pripravení svoju paniu pomstiť. Jediná, kto má nad krutou lady moc, je jej dcéra, mladučká kráľovná Dvora zubov. Suren však utiekla do sveta smrteľníkov a zvolila si divoký život v lesoch, presvedčená, že sa na ňu zabudlo. Všetko sa zmení, keď ju nočnými ulicami začne prenasledovať Bogdana, bosorka búrok, a Suren sa dočká nečakanej záchrany – z rúk princa Oaka, dediča Elfhamu. Už roky voči nemu prechováva nevraživosť, hoci mala byť jeho nevestou. Šarmantného Oaka, zvyknutého omotať si všetkých okolo prsta, vedie výprava na sever a prišiel poprosiť
Suren o pomoc. Jej súhlas by však znamenal, že mladá kráľovná bude musieť čeliť všemožným nástrahám – a hlavne chlapcovi, ktorého poznala ako dieťa, princovi, ktorému sa nedá veriť. A hrôzam, ktoré mali ostať pochované hlboko v minulosti.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 320,
                'publisher' => 'Slovart',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Väzňov trón',
                'author' => 'Holly Black',
                'price' => 14.23,
                'detail' => 'Uväznený princ. Pomstychtivá kráľovná. A vojna, ktorá rozhodne o osude celého Elfhamu.
Princ Oak si v žalári odpykáva trest za svoju zradu, odkázaný na milosť a nemilosť novej desivej kráľovnej nevľúdneho severu. Neostalo mu nič, len jeho šarm a prefíkanosť. Bude to však stačiť na prežitie? Najvyšší kráľ Cardan a Najvyššia kráľovná Jude hodlajú nasadiť všetky páky, aby ukradnutého dediča elfhamskej koruny priviedli späť domov, no Oak je na pochybách. Má bojovať o stratenú dôveru dievčiny, ktorú vždy miloval? Alebo zachovať vernosť Elfhamu a zvrhnúť samozvanú kráľovnú z trónu, hoci na to Wren môže doplatiť životom? Krajinu však sužuje prísľub vojny a zradcovia číhajú na každom kroku, a tak ani princov dôvtip a prešibanosť nemusia stačiť na záchranu tých, ktorých má rád. A hoci všetky cesty vedú do záhuby, Oakovi neostáva nič iné, len sa rozhodnúť, po ktorej vykročí.

Bestsellerová autorka Holly Black prináša pútavé zakončenie dilógie Ukradnutý dedič, v ktorom nepotečú len slzy, ale aj krv.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 390,
                'publisher' => 'Slovart',
                'year' => 2025,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Mor',
                'author' => 'Laura Thalassa',
                'price' => 20.70,
                'detail' => 'MOR, VÁLKA, HLAD, SMRT - ČTYŘI JEZDCI NA SVÝCH DĚSIVÝCH OŘÍCH SE ROZJELI PO SVĚTĚ. ČTYŘI JEZDCI NADANÍ MOCÍ ZAHUBIT VEŠKERÉ LIDSTVO. PŘIŠLI NA ZEMI. PŘIŠLI NÁS ZNIČIT.

Když Mor, první z Jezdců, zamíří k rodnému městu Sary Burnsové, jedno jí je jasné: všichni, které miluje, jsou odsouzeni k smrti. Pokud ho ovšem někdo nezastaví - a přesně to má Sara v úmyslu, když toho andělsky vyhlížejícího parchanta sestřelí z jeho hřebce.
Bohužel jí nikdo neřekl, že Mor je nesmrtelný.
Velmi živý a velmi naštvaný Jezdec Saru zajme, odhodlaný přimět ji trpět za pokus o narušení jeho svatého poslání. Zdá se, že žádná z jejích proseb jím nemůže pohnout, aby ustoupil od svého záměru vyhladit lidstvo. Čím delší dobu však Mor ve společnosti odvážné a soucitné Sary stráví, tím více jako by rozuměl nejen jí, ale i lidskému druhu. A čím déle cestuje Sara po boku Mora, tím větší nejistotu pociťuje ohledně povahy jeho citů vůči ní… a svých vlastních.
Sara má pořád naději zachránit svět, možná však bude muset obětovat své srdce.',
                'genre' => 'Fantasy',
                'language' => 'Čeština',
                'pages' => 544,
                'publisher' => 'Slovart CZ',
                'year' => 2023,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Válka',
                'author' => 'Laura Thalassa',
                'price' => 19.70,
                'detail' => 'Přišli na zemi - Mor, Válka, Hlad a Smrt - čtyři Jezdci apokalypsy, kteří se na svých hrůzostrašných ořích rozjeli po světě nadáni mocí zahubit veškeré lidstvo.

Když Jeruzalém padne do rukou armády nájezdníků, Miriam Elmahdyová je přesvědčená, že její život skončil. Domy hoří, ulice rudnou krví a vojáci masakrují nevinné - tohle nemůže přežít… A potom upoutá pozornost děsivého vůdce uchvatitelů, samotného Války. Jezdec se vydá Miriam pronásledovat, ale místo aby ji zabil, nazve ji svou „manželkou" a unese ji do svého tábora. Od té chvíle mladá žena z první řady sleduje konec světa, kdy město za městem lehá popelem, zatímco ten, kdo je za to zodpovědný - její nesmrtelný apokalyptický „manžel" - ji drží v zajetí. Vedle krutosti jí však Válka ukazuje i svou druhou tvář, láskavou a milující, která si ji podmaňuje, a Miriam možná nebude dost silná, aby odolala. Jestliže se však v životě něco naučila, pak to, že láska a válka nemohou existovat vedle sebe. Musí učinit zásadní volbu: vzdát se Válce a sledovat pád lidstva, nebo obětovat vše, aby ho zastavila.',
                'genre' => 'Fantasy',
                'language' => 'Čeština',
                'pages' => 544,
                'publisher' => 'Slovart CZ',
                'year' => 2023,
                'state' => 'nie je na sklade',

            ],
            [
                'name' => 'The Ever King',
                'author' => 'L.J. Andrews',
                'price' => 29.35,
                'detail' => 'They stole his crown. So, he stole their daughter…

For years Erik, the scarred king of the Ever Kingdom, has thought of nothing but vengeance against the man who killed his father and trapped him beneath the waves, making him a prisoner in his own realm.

Until his enemy’s daughter unintentionally breaks the chains on the Ever, and Erik makes her the unwitting pawn in his vicious game of revenge.

She’s innocent. He’s vicious. But he will take back what he lost, no matter the price.',
                'genre' => 'Fantasy',
                'language' => 'English',
                'pages' => 474,
                'publisher' => 'The Ever Seas',
                'year' => 2025,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Večný kráľ',
                'author' => 'L.J. Andrews',
                'price' => 19.35,
                'detail' => 'Ukradli mu korunu. On im za to ukradol dcéru... Erik, zjazvený kráľ Večného kráľovstva, už roky nemyslí na nič iné, len na pomstu mužovi, ktorý mu zabil otca, uväznil ho pod hladinou a urobil z neho väzňa vo vlastnej ríši. Až do chvíle, keď dcéra jeho nepriateľa neúmyselne pretrhne putá Večného kráľovstva a Erik z nej spraví nevedomého pešiaka vo svojej krutej pomste. Je nevinná a on zlomyseľný. Vezme si späť, čo stratil, bez ohľadu na cenu. Ak mu ona najskôr neukradne srdce.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 474,
                'publisher' => 'Zelený kocúr',
                'year' => 2025,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Večná kráľovná',
                'author' => 'L.J. Andrews',
                'price' => 19,
                'detail' => 'Vtáčatko:
Zajatkyňa. Vyzývateľka. Kráľovná.
Nepriatelia ju vytrhli z náručia muža, ktorému patrí jej srdce. Možno sa nazdávajú, že je len figúrkou v ich zlomyseľnej hre, no zabúdajú, že čelia prvej Večnej kráľovnej všetkých čias, ktorá neprestane bojovať, kým sa opäť nevráti do jeho objatia.

Had:
Väzniteľ. Zloduch. Kráľ.
Nepriatelia ho zradili pre chamtivosť a túžbu po korune. Uniesli mu ženu, ktorá si podmanila jeho dušu. On jej však daroval svoje srdce a nikdy ju neprestane hľadať. Neprestane, kým nerozleje krv nepriateľov a nezavesí Večnej kráľovnej na krk náhrdelník z ich kostí.',
                'genre' => 'Fantasy',
                'language' => 'Slovenčina',
                'pages' => 474,
                'publisher' => 'Zelený kocúr',
                'year' => 2025,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'I Hope This Doesn\'t Find You',
                'author' => 'Ann Liang',
                'price' => 12.95,
                'detail' => 'Sadie doesn\'t have to hold back in her email drafts because nobody will ever read them ... that is, until someone sends them out. Seventeen-year-old Sadie Wen is perfect on paper.
It\’s a reputation she\’s fought hard to earn at the highly prestigious Woodvale Academy, and one she\’s determined to maintain until graduation. The trick to keeping her model-student-smile plastered on her face at all times? She channels all her petty frustrations into her email drafts. One for the math teacher who refused to round her eighty-nine-point-nine percent up to ninety; one for the girl who blatantly copied her science project and took the credit for it.
But most of her vehemently-worded emails are for her smug, infuriating co-captain, Julius Gong, who\’s been the sharpest thorn in her side ever since they were kids. Sadie never meant for these emails to get out ... but now her whole life is about to change...
From the author of THIS TIME IT\'S REAL comes another own-voices love story with a high-concept twist Perfect for fans of Jenny Han and Crazy Rich Asians Gorgeously page-turning and endlessly readable, I HOPE THIS DOESN\'T FIND YOU is perfect for BookTok and the Netflix generation',
                'genre' => 'Romantika',
                'language' => 'English',
                'pages' => 314,
                'publisher' => 'Scholastic',
                'year' => 2024,
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Sunrise on the Reaping',
                'author' => 'Suzanne Collins',
                'price' => 21.28,
                'detail' => 'When you\'ve been set up to lose everything you love, what is there left to fight for? As the day dawns on the fiftieth annual Hunger Games, fear grips the districts of Panem. This year, in honour of the Quarter Quell, twice as many tributes will be taken from their homes. Back in District 12, Haymitch Abernathy is trying not to think too hard about his chances. All he cares about is making it through the day and being with the girl he loves. When Haymitch\'s name is called, he can feel all his dreams break. He\'s torn from his family and his love, shuttled to the Capitol with the three other District 12 tributes: a young friend who\'s nearly a sister to him, a compulsive oddsmaker, and the most stuck-up girl in town. As the Games begin, Haymitch understands he\'s been set up to fail. But there\'s something in him that wants to fight... and have that fight reverberate far beyond the deadly arena.',
                'genre' => 'Fantasy',
                'language' => 'English',
                'pages' => 416,
                'publisher' => 'Scholastic',
                'year' => '2025',
                'state' => 'je na sklade',

            ],
            [
                'name' => 'Psychológia peňazí',
                'author' => 'Morgan Housel',
                'price' => 25.28,
                'detail' => 'To, čo vieme o peniazoch – investície, osobné financie a obchodné rozhodnutia – sa bežne učíme ako matematickú oblasť, kde nám dáta a vzorce presne povedia, čo máme robiť. Ale v skutočnom svete ľudia nerobia finančné rozhodnutia prostredníctvom tabuliek. Robia ich pri spoločnom stolovaní alebo v zasadačkách, kde sú ich osobné skúsenosti, vlastné jedinečné videnie sveta, ego, hrdosť, marketing a iné neobvyklé podnety zmiešané do jedného celku. V Psychológii peňazí sa s vami oceňovaný autor Morgan Housel podelí o 19 krátkych príbehov, v ktorých preskúma, ako ľudia rozmýšľajú o peniazoch, a naučí vás, ako lepšie pochopiť jeden z najdôležitejších faktorov ľudského života, akým peniaze bezpochyby sú.',
                'genre' => 'Financie',
                'language' => 'English',
                'pages' => 256,
                'publisher' => 'Aurora',
                'year' => '2019',
                'state' => 'je na sklade',

            ],
            [
                'name' => 'The Stoic Path to Wealth',
                'author' => 'Darius Foroux',
                'price' => 15.78,
                'detail' => 'The only way to beat inflation and grow your wealth is by investing. The greatest investors approach the markets with discipline, emotional distance, and self-mastery—lessons that the Stoics have been teaching us for thousands of years. Combining ancient wisdom with practical investment strategies drawn from analysis of the greatest investors of all time, The Stoic Path to Wealth will teach you how to:
- cultivate an investing edge by managing your emotions and developing your unique skills and talents.
- develop the discipline to ignore short-term market fluctuations and avoid living in the future.
- foster a mindset that allows you to enjoy what you have and avoid greed.
- create a sustainable approach to trading.

As financial markets become increasingly unpredictable and chaotic, The Stoic Path to Wealth offers the key to weathering any economic storm while building wealth that will last a lifetime and beyond.',
                'genre' => 'Financie',
                'language' => 'English',
                'pages' => 120,
                'publisher' => 'Aurora',
                'year' => '2020',
                'state' => 'nie je na sklade',
            ],
        ];

        foreach($books as $book){
            Book::create($book);
        }

        //create categories
        $categories = ['Fantasy', 'Romantika', 'Zmiznutie', 'Zločin', 'Vyšetrovanie', 'Vraždy', 'Thriller',
                        'Dobro a zlo', 'Nepriatelia', 'Tajomstvo', 'Láska', 'Mágia', 'Minulosť', 'Pomsta',
                        'Osud', 'Svadba', 'Páchateľ', 'Tragédia', 'Dobrodružstvo', 'Neočakávané', 'Prekvapenie',
                        'Motivácia', 'Nový život', 'Komunikácia', 'Nádej', 'Strach', 'Biografia', 'Financie',
                        'Horror'
        ];

        foreach($categories as $category){
            Category::create([
                'name'=>$category,
            ]);
        }

        //create category_book
        $categoriesID = Category::pluck('id')->toArray(); //get the categories id
        $booksID = Book::pluck('id')->toArray(); //get the books id

        foreach($booksID as $bID){ //go throught list of book`s id
            $getCatId = array_rand($categoriesID, 5); //choose 5 random categories
            foreach($getCatId as $key){
                BookCategory::create([
                    'id_category'=>$categoriesID[$key], //get the category id by generated number
                    'id_book'=>$bID, //get the book`s id
                ]);
            }
        }
    }
}
