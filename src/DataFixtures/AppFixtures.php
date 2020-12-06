<?php

namespace App\DataFixtures;

use App\Entity\Capacity;
use App\Entity\Family;
use App\Entity\Pokemon;
use App\Entity\Talent;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        /* Talents */
        // $talent_01 = new Talent();
        // $talent_01->setName('Glissade');
        // $talent_01->setDetails("Si le climat est pluvieux, le Pokemon doté de Glissade voit sa statistique de Vitesse multipliée par deux. Glissade n'a aucun effet hors combat.");
        // $manager->persist($talent_01);
        // $talent_02 = new Talent();
        // $talent_02->setName('Ignifu-Voile');
        // $talent_02->setDetails("Un Pokemon doté de ce talent ne peut pas subir de brûlure. Si un Pokemon obtient ce talent en cours de combat (grâce aux capacités Imitation, Morphing ou par le talent Calque) en étant déjà brûlé, son statut est alors soigné. S'il est amené à perdre à nouveau ce talent, sa brûlure revient. Ignifu-Voile n'a aucun effet hors combat.");
        // $manager->persist($talent_02);

        /* Capacities */
        $capacity_01 = new Capacity();
        $capacity_01->setTitle('Physique');
        $capacity_01->setDetails("Les capacités physiques utilisent les statistiques physiques (attaque et défense)");
        $capacity_01->setLogoMaxi('images/categories/physique_maxi.png');
        $capacity_01->setLogoMini('images/categories/physique_mini.png');
        $manager->persist($capacity_01);

        $capacity_02 = new Capacity();
        $capacity_02->setTitle('Spéciale');
        $capacity_02->setDetails("Les capacités spéciales utilisent les statistiques spéciales (attaque spéciale et défense spéciale, ou uniquement le spécial dans la première génération)");
        $capacity_02->setLogoMaxi('images/categories/speciale_maxi.png');
        $capacity_02->setLogoMini('images/categories/speciale_mini.png');
        $manager->persist($capacity_02);

        $capacity_03 = new Capacity();
        $capacity_03->setTitle('Statut');
        $capacity_03->setDetails("Les capacités de statut sont toutes les autres capacités, celles qui ne provoquent pas de dégâts selon la formule habituelle (dégâts fixes, augmentation de statistiques, changement de statut, etc.)");
        $capacity_03->setLogoMaxi('images/categories/statut_maxi.png');
        $capacity_03->setLogoMini('images/categories/statut_mini.png');
        $manager->persist($capacity_03);


        /* Categories */
        $category_01 = new Category();
        $category_01->setName('Acier');
        $category_01->setDescription("Regroupant les Pokemon faits de métaux en tous genres, le category Acier est de loin le meilleur category défensif du jeu avec 11 résistances, dont une immunité notoire face au category Poison, et par corollaire une quasi-immunité à l'empoisonnement (seulement mise en défaut par le talent rare Corrosion). Pour donner un aperçu du potentiel défensif de l'Acier, celui-ci pourrait couvrir à lui seul les faiblesses des category Combat, Dragon et Fée ; il a même été légèrement affaibli en sixième génération avec la suppression des résistances Spectre et Ténèbres. En contrepartie, les Pokemon Acier sont souvent lents et leurs statistiques offensives bien en deçà de leur Défense, qui est en moyenne la plus élevée tous category confondus.
                                Le category Acier n'a que trois faiblesses, mais ce sont autant de category de couverture : Feu (un category majoritairement Spécial qui bat en brèche l'Acier sur les deux plans), Combat (qui efface 5 category et met à l'épreuve la haute défense du groupe Acier) et Sol (autre category employé par les sweepers physiques). Seuls un second category ainsi que le talent Lévitation permettent de gommer l'une ou l'autre de ces faiblesses. Quant aux attaques Acier, si elles sont peu dangereuses pour les category Eau et Electrik, elles s'avèrent en revanche très efficaces contre les Fées.");
        $category_01->setSymbol('images/category/Acier.png');
        $category_01->setColor('#FF9E54');
        $category_01->setCapacity($capacity_01);
        $manager->persist($category_01);

        $category_02 = new category();
        $category_02->setName('Combat');
        $category_02->setDescription("Le groupe Combat est celui des Pokemon spécialisés dans la force brute, dont les dresseurs sont souvent eux-mêmes versés dans les arts martiaux (à l'image d'Aldo ou Faïza), et à ce titre, sa statistique dominante est naturellement l'Attaque. Les quelques combattants frappant dans le Spécial doivent leur particularité à un second category, le plus souvent Feu ou Psy. Dans les autres statistiques, l'écart-category est élevé et l'on peut distinguer deux classes de Pokemon Combat : ceux qui misent sur la Vitesse, et ceux qui privilégient l'endurance.
                                Dans la hiérarchie des category, Combat égalise le Sol en couvrant 5 category, mais il est bloqué par 6 category, dont les 3 super efficaces contre lui. Pour rappel, l'immunité du category Spectre est rendue caduque par Clairvoyance et par le talent Querelleur.
                                On peut ajouter que la combinaison offensive Combat/Spectre n'est arrêtée par aucun double category existant, et que le category Acier couplé à Combat remplace les trois faiblesses du second par celles de l'Acier.");
        $category_02->setSymbol('images/category/Combat.png');
        $category_02->setColor('#CE3F6B');
        $category_02->setCapacity($capacity_01);
        $manager->persist($category_02);

        $category_03 = new category();
        $category_03->setName('Insecte');
        $category_03->setDescription("Le category Insecte regroupe divers Pokemon à l'image des animaux du même nom. Certaines familles d'évolution poussent la ressemblance jusqu'à reproduire les trois stades du cycle évolutif propre aux insectes (larve, chrysalide, imago) comme on peut le constater dans le cas de Chenipotte entre autres, mais on trouve également dans ce groupe des Pokemon inspirés d'autres invertébrés, tels Escargaume ou Mimigal.
                                Les Pokemon Insecte, du moins ceux qui évoluent, atteignent souvent très tôt leur stade d'évolution final (avant le niveau 15 pour certains) au prix de statistiques plus basses que la moyenne.
                                Avec une force offensive réduite face à 7 category, rares sont les doubles category contre lesquels Insecte peut être joué efficacement. Toutefois, certains Pokemon Psy comme Ténèbres y sont très vulnérables, ce qui laisse une fenêtre de tir pour les Pokemon Insecte offensifs.
                                Défensivement, Insecte présente autant de résistances (3) que de faiblesses, mais il a le mérite de bloquer les category Combat et Sol, soit les deux meilleurs en matière de couverture. Note historique : en première génération, les category Insecte et Poison s'éliminaient mutuellement.");
        $category_03->setSymbol('images/category/Insecte.png');
        $category_03->setColor('#92C22B');
        $category_03->setCapacity($capacity_01);
        $manager->persist($category_03);

        $category_04 = new category();
        $category_04->setName('Normal');
        $category_04->setDescription("Beaucoup de capacités de category Normal ne requièrent pas de pouvoir particulier, mais certaines d'entre elles sont basées sur le son. Ces dernières passent au travers des clones depuis la sixième génération, mais sont bloquées par le talent Anti-Bruit.
                                Plusieurs attaques Normal de première génération ont nécessité un correctif, comme Ultralaser, qui à l'époque perdait son tour de recharge si le lanceur mettait K.O. le Pokemon adverse, mais aussi Triplattaque, qui avant la troisième génération pouvait brûler le category Feu et geler le category Glace, sans oublier Clonage, qui a connu de très nombreux ajustements en raison de ses interactions complexes avec d'autres capacités ou des talents.
                                Sans avantage offensif autre que le STAB, le category Normal est le plus limité dans cet aspect, bien qu'il puisse dans certains cas toucher le category Spectre. Les Pokemon Normal doivent par conséquent compléter leur moveset avec des capacités de couverture pour atteindre les category qui leur résistent, telles que Séisme, Casse-Brique ou encore Griffe Ombre, sans le multiplicateur 1,5 des attaques de leur category.
                                Le groupe Normal est défensivement le plus neutre, avec une seule faiblesse et une seule résistance ou immunité, et malgré la présence de Pokemon à haute vitalité (comme Leuphorie et ses 255 PV de base), ses statistiques défensives restent modestes en raison des nombreuses évolutions finales précoces.");
        $category_04->setSymbol('images/category/Normal.png');
        $category_04->setColor('#929BA3');
        $category_04->setCapacity($capacity_01);
        $manager->persist($category_04);

        $category_05 = new category();
        $category_05->setName('Poison');
        $category_05->setDescription("Le category Poison est associé au venin, à la toxicité et à l'altération de statut qui fait perdre à la victime plus ou moins de PV à chaque tour selon la capacité qui en est à l'origine. Certains représentants du groupe Poison peuvent d'ailleurs être vus comme des allégories de la pollution (Tadmorv et Smogo notamment). Néanmoins, seuls les Pokemon dotés du talent de septième génération Corrosion sont capables d'empoisonner n'importe quel category, y compris Poison lui-même.
                                Poison s'emploie mieux défensivement qu'offensivement puisqu'il comporte 5 résistances pour 2 faiblesses, ce qui est aussi le bilan offensif du category. En particulier, le category Acier est immunisé tant aux attaques Poison qu'à l'empoisonnement (en deuxième génération, il était possible d'empoisonner l'Acier avec Double-Dard), et le category Sol le bat dans les deux domaines.
                                Malgré son manque d'efficacité offensive, le category Poison est l'un des deux seuls à avoir l'avantage sur le category Fée, et son tableau de statistiques témoigne d'une prévalence des attaquants physiques, que le récent category gère moins bien que les spéciaux.");
        $category_05->setSymbol('images/category/Poison.png');
        $category_05->setColor('#AB6BC9');
        $category_05->setCapacity($capacity_01);
        $manager->persist($category_05);

        $category_06 = new category();
        $category_06->setName('Roche');
        $category_06->setDescription("Le groupe Roche rassemble les Pokemon faits de la matière du même nom, mais aussi les Pokemon préhistoriques (que l'on obtient en jeu à l'état de fossiles) et ceux inspirés d'espèces panchroniques (Relicanth). À l'instar du category Glace contre lequel il a l'avantage, le category Roche est associé à une altération climatique : la Tempête de Sable, qui affecte 15 category sur 18 et donne 50 % de Défense Spéciale supplémentaire aux Pokemon Roche.
                                Bien que les statistiques défensives de ces Pokemon montent parfois très haut (jusqu'à 230 pour Caratroc dans les deux aspects), celles-ci sont mises à mal par un nombre conséquent de faiblesses, lesquelles incluent les 3 category résistants à la Roche, et l'autre category à 5 faiblesses à savoir Plante. Faits notables : les 4 category battus par la Roche correspondent à des vulnérabilités du category Plante, tandis que ce dernier annule 3 des faiblesses du category Roche et vice versa. En conséquence, le double category Roche/Plante n'accuse que 4 faiblesses.
                                Ce category possède aussi des Pokemon offensifs (comme Charkos qui culmine à 165 en Attaque ou Méga-Diancie qui affiche 160 dans les deux statistiques), mais seuls cinq éléments dépassent les 100 points de Vitesse de base (Ptéra arrive en tête avec 130, ou 150 s'il est méga-évolué). La Vitesse moyenne des Pokemon Roche est par ailleurs la plus basse tous category confondus.");
        $category_06->setSymbol('images/category/Roche.png');
        $category_06->setColor('#CDBC91');
        $category_06->setCapacity($capacity_01);
        $manager->persist($category_06);

        $category_07 = new category();
        $category_07->setName('Sol');
        $category_07->setDescription("Basé sur la terre et les forces telluriques, le category Sol est celui qui assure la meilleure couverture offensive avec 5 avantages, notamment contre Electrik qu'il neutralise complètement ainsi que les trois category à 5 résistances ou plus, tout en n'étant contrarié que par 3 category. De plus, le Sol entre dans plusieurs combinaisons permettant de tripler les dégâts sur 8 category, et même 9 pour le binôme Glace/Sol.
                                Le talent Lévitation a été introduit avec la troisième génération pour rendre des Pokemon de category autre que Vol invulnérables au category Sol. Dans les deux cas, on peut désactiver cette immunité par le biais de Gravité ou d'Anti-Air, voire de Myria-Flèches, l'unique attaque de son category à atteindre un Pokemon dans les airs. Par ailleurs, les capacités Sol offensives d'un Pokemon doté de Brise Moule passent outre Lévitation.
                                Statistiquement, le groupe Sol est bien plus axé sur le physique (Attaque et Défense) que sur le Spécial ou la Vitesse. Or, les attaquants spéciaux sont majoritaires au sein des trois category dominant le Sol.");
        $category_07->setSymbol('images/category/Sol.png');
        $category_07->setColor('#DA7943');
        $category_07->setCapacity($capacity_01);
        $manager->persist($category_07);

        $category_08 = new category();
        $category_08->setName('Spectre');
        $category_08->setDescription("Le category Spectre est peuplé de Pokemon dont l'aspect suffit à expliquer leur double immunité caractéristique : fantômes, objets possédés par des esprits ou encore créatures flasques au toucher (Viskuse). On les croise la plupart du temps dans des cimetières (Tour Pokemon), des lieux abandonnés (Vieux Château) ou abritant un portail vers une autre dimension (Grotte Retour).
                                Les Pokemon Spectre forment un groupe assez disparate avec des éléments spécialisés dans chacune des statistiques, que ce soient l'Attaque (Golemastoc), l'Attaque Spéciale (Corayôme, Lugulabre), les Défenses (Noctunoir, Exagide forme Parade), la Vitesse (Lanssorien) ou même la vitalité (Grodrive).
                                S'il n'est super efficace que contre 2 category dont le sien, le category Spectre est également celui qui rencontre le moins de résistances depuis la sixième génération (2 à égalité avec Dragon). On peut noter que la combinaison Combat/Spectre est la seule permettant de toucher tous les Pokemon du jeu, en l'absence d'un double category Normal/Spectre (même à l'époque où Spectre était peu efficace face au category Acier, car ce dernier est battu par Combat). Défensivement, le category Spectre est le seul doté naturellement de deux immunités, bien que celles-ci puissent être contournées (par les capacités Clairvoyance et Flair ainsi que le talent Querelleur).
                                Depuis la sixième génération, le category Spectre ne subit donc plus la résistance de l'Acier, et n'est plus affecté par le talent Piège Sable ni par les capacités bloquantes telles que Siphon. Enfin, les Pokemon Spectre peuvent fuir devant les Pokemon sauvages du premier coup, quelle que soit la Vitesse des uns et des autres.");
        $category_08->setSymbol('images/category/Spectre.png');
        $category_08->setColor('#5169AF');
        $category_08->setCapacity($capacity_01);
        $manager->persist($category_08);

        $category_09 = new category();
        $category_09->setName('Vol');
        $category_09->setDescription("Arborant presque tous des designs d'oiseaux et autres créatures ailées, les Pokemon Vol utilisent essentiellement le vent et leurs appendices corporels pour se battre. À l'instar d'autres category dont la statistique de Vitesse est supérieure à la moyenne (le plus rapide étant Ninjask avec 160 points de base), le groupe Vol n'est pas réputé pour sa Défense, physique comme spéciale, malgré quelques exceptions.
                                Le trait principal des Pokemon Vol est leur insensibilité aux attaques terrestres, et par corollaire aux Picots, aux Pics Toxik et au talent Piège Sable. En contrepartie, ils ne bénéficient pas des bonus de champ dont profitent leurs alliés au sol, et leur faiblesse Roche peut leur valoir de lourds dégâts sur Piège de Roc. Pour rappel, il est possible de rendre un Pokemon aérien sensible aux attaques de category Sol, en le lestant d'une Balle Fer à l'aide de Passe-Passe ou Tour de Magie, ou directement via les capacités Anti-Air, Gravité et Myria-Flèches, à moins que le Pokemon n'annule lui-même son immunité en utilisant Atterrissage ou Racines.
                                Offensivement, le category Vol peut s'allier au category Sol pour combattre les trois category qui lui résistent.
                                Depuis la cinquième génération, un Pokemon Vol sans double category qui utilise Atterrissage prend jusqu'à la fin du tour le category Normal. En effet, cette capacité introduite en quatrième génération donnait auparavant le category inconnu à un tel Pokemon (le seul concerné était Arceus, mais il est impossible de lui enseigner Atterrissage de manière conventionnelle).");
        $category_09->setSymbol('images/category/Vol.png');
        $category_09->setColor('#90ACDF');
        $category_09->setCapacity($capacity_01);
        $manager->persist($category_09);

        $category_10 = new category();
        $category_10->setName('Dragon');
        $category_10->setDescription("Le groupe Dragon, qui comprend de nombreux Pokemon reptiliens mais ne correspond pas à l'ensemble des Pokemon apparentés aux créatures dont ce category porte le nom, se démarque des autres par une moyenne de statistiques de base supérieure à 100. Cela peut s'expliquer par le grand nombre de Pokemon légendaires et de Méga-Pokemon qu'il recense, mais aussi par des évolutions finales très tardives (parfois au-delà du niveau 50). De fait, beaucoup de ses représentants sont classés Uber ou OverUsed.
                                Très neutre offensivement, le category Dragon n'est super efficace que contre lui-même (et même aucun Pokemon en première génération puisque l'unique capacité de l'époque, Draco-Rage, était à dégâts fixes). Le category Acier a longtemps été son seul contre jusqu'à la sixième génération et l'arrivée du category Fée, qui bloque totalement le category Dragon. Comme la puissance de leurs attaques se retrouve encore réduite de moitié dans le Champ Brumeux, les Pokemon Dragon ont tout intérêt à maîtriser des capacités d'autres category.
                                Défensivement, si les category de départ et Electrik sont tous contrés par les Dragons, ces derniers en revanche sont vulnérables aux category Glace (surtout s'ils ont Sol ou Vol pour second category, d'autant que beaucoup de Pokemon Eau notamment peuvent apprendre Blizzard ou Laser Glace) et donc Fée.");
        $category_10->setSymbol('images/category/Dragon.png');
        $category_10->setColor('#036DC4');
        $category_10->setCapacity($capacity_02);
        $manager->persist($category_10);

        $category_11 = new category();
        $category_11->setName('Eau');
        $category_11->setDescription("Le groupe Eau, dont les Pokemon utilisent l'élément du même nom dans toutes leurs attaques, présente des statistiques très homogènes. Crédité de 4 résistances, le category Eau ne craint que 2 category ainsi que la capacité Lyophilisation, et les Pokemon Eau avec les talents Absorbe-Eau et Lavabo ne reçoivent pas de dégâts de la part de leur propre category.
                                La couverture offensive de l'Eau est également assez neutre avec 3 résistances et 3 faiblesses rencontrées. Ses représentants profitent souvent d'un second STAB, puisque le category Eau se combine avec tous les autres. Les attaques Eau sont néanmoins à éviter sur les adversaires dotés de Peau Sèche.
                                Le category Eau est aussi associé à la pluie, qui augmente ses dégâts de 50 % et conforte sa prépondérance sur le Feu. Les équipes basées sur ce climat sont d'ailleurs appelées Rain Teams, et les Pokemon chargés de faire pleuvoir au moyen de Danse-Pluie ou du talent Crachin s'appellent les Rain Dancers. On peut trouver dans de telles équipes des Pokemon dont la Vitesse est doublée sous la pluie grâce à Glissade ; d'autres qui se régénèrent entre les tours avec Cuvette ; ou tout simplement des Pokemon offensifs qui optimisent leurs attaques Eau. À l'inverse, la puissance de l'Eau est réduite de moitié sous le soleil.");
        $category_11->setSymbol('images/category/Eau.png');
        $category_11->setColor('#5091D5');
        $category_11->setCapacity($capacity_02);
        $manager->persist($category_11);

        $category_12 = new category();
        $category_12->setName("Electrik");
        $category_12->setDescription("Déclinant l'électricité sous toutes ses formes, le groupe Electrik se caractérise principalement par son Attaque Spéciale et sa Vitesse, au détriment de ses statistiques défensives. Comme des courants électriques se manifestent typiquement autour des Pokemon paralysés, Electrik est souvent associé à ce statut, bien qu'il ne soit pas le seul category à pouvoir l'induire. À l'inverse, depuis la sixième génération, il n'est plus possible de paralyser un Pokemon Electrik, quelle que soit la capacité employée.
                                Electrik est assez pauvre en couverture offensive, mais les deux category qu'il domine (Eau et Vol) sont parmi les plus représentés. Comme son contre attitré, le category Sol, est aussi son unique faiblesse, il en résulte qu'un Pokemon Electrik pur lévitant (tel Ohmassacre) n'est faible face à aucun category (sauf en cas d'annulation par un talent comme Brise Moule, ou après une capacité comme Rayon Simple).
                                On peut ajouter que la puissance des attaques Electrik est divisée par 3 durant 5 tours si la capacité Lance-Boue vient d'être jouée.");
        $category_12->setSymbol('images/category/Electrik.png');
        $category_12->setColor('#F4D339');
        $category_12->setCapacity($capacity_02);
        $manager->persist($category_12);

        $category_13 = new category();
        $category_13->setName('Feu');
        $category_13->setDescription("À l'image de son élément, le groupe Feu est à caractère offensif, avec une Attaque Spéciale qui se détache assez nettement. Le category Feu a face à lui 4 category faibles et autant de résistances, et les Pokemon dotés de Peau Sèche ou de Boule de Poils y sont aussi exposés. Le soleil renforce les attaques Feu en multipliant leurs dégâts par 1,5 ; activé par la capacité Zénith ou le talent Sécheresse, ce climat permet en outre d'annuler l'avantage de l'Eau sur le Feu. D'autres talents comme Brasier ou Torche peuvent également intervenir et augmenter encore la puissance des attaques Feu. La pluie au contraire les affaiblit, mais pas autant que Tourniquet (–67 %).
                                En défense, le category Feu possède la deuxième couverture derrière Acier avec 6 résistances, notamment face aux Fées. En revanche, les faiblesses Roche et Sol sont impossibles à parer simultanément : un Pokemon Feu dont le second category résiste à l'un des deux category ci-avant hérite en général de faiblesses supplémentaires (par exemple un double category Feu/Vol, doublement vulnérable à la Roche, perd d'entrée de jeu la moitié de ses PV sur Piège de Roc). À noter que la plupart des Pokemon Feu peuvent apprendre Lance-Soleil, une capacité de category Plante qui couvre leurs trois faiblesses à la fois et dont le tour de chargement est ignoré si le soleil est actif.
                                Les Pokemon Feu n'ont pas toujours été insensibles au statut de brûlure, qui divise par deux l'Attaque du Pokemon touché et lui enlève 1/16 de ses PV maximaux par tour (1/8 de la deuxième à la sixième génération). En effet, dans les deux premières générations, ils étaient certes immunisés aux brûlures causées par les attaques de leur category, mais pas au statut lui-même, que la capacité Normal Triplattaque pouvait encore leur transmettre.");
        $category_13->setSymbol('images/category/Feu.png');
        $category_13->setColor('#FF9E54');
        $category_13->setCapacity($capacity_02);
        $manager->persist($category_13);

        $category_14 = new category();
        $category_14->setName('Glace');
        $category_14->setDescription("Spécialisé dans les basses températures, le category Glace est beaucoup plus intéressant offensivement que défensivement : en effet, avec une seule résistance (face à lui-même) contre 4 faiblesses, c'est le plus mauvais category défensif du jeu. Plutôt équilibré au regard des statistiques, il est indissociable du statut de gel, qui laisse la victime figée sur place. Comme les capacités à pouvoir l'induire, ce statut est neutralisé par le Feu.
                                Note historique : les Pokemon Glace ont attendu la troisième génération pour être complètement immunisés au gel (qui les affectait auparavant via Triplattaque).
                                Sur le plan offensif, le category Glace efface 4 category, en particulier Dragon qu'il a longtemps été le seul à inquiéter jusqu'à l'arrivée du category Fée, et la combinaison Glace/Sol réalise la meilleure couverture offensive possible (9 category). De plus, la capacité spéciale Lyophilisation, qui est super efficace contre le category Eau, inflige 280 points de dégâts (hors STAB ou coup critique) à certains Pokemon aquatiques.
                                La Grêle est le climat propre à la Glace : elle enlève à chaque tour 1/16 des PV totaux aux Pokemon non protégés par le category Glace ou un talent tel que Ciel Gris.");
        $category_14->setSymbol('images/category/Glace.png');
        $category_14->setColor('#74CFC1');
        $category_14->setCapacity($capacity_02);
        $manager->persist($category_14);

        $category_15 = new category();
        $category_15->setName('Plante');
        $category_15->setDescription("Le groupe Plante n'est pas composé que de Pokemon à l'apparence de plantes proprement dites. En effet, nombre d'entre eux sont simplement des créatures animales faisant pousser feuilles et fleurs sur leur corps (voire fruits dans le cas de Tropius), et contrairement à ce qu'affirme la biologie réelle, les Pokemon champignons (Paras et Spododo) sont aussi affiliés au category Plante. En revanche, tous tirent leurs pouvoirs du monde végétal.
                                Malgré son potentiel offensif, le category Plante se heurte à 7 résistances (seul le category Insecte en rencontre autant) et ne touche efficacement que 3 category. Il est cependant le seul à dominer le double category Eau/Sol.
                                Sur le plan défensif, il est vulnérable au Feu et à quatre autres category basés sur les « ennemis » des végétaux, mais résiste à la fois aux category Electrik, Eau et Sol. Les Pokemon Plante ne sont pas affectés par les capacités de statut de leur category à commencer par Vampigraine (les autres capacités à base de graines ou de spores ont suivi en sixième génération), et ceux qui sont au sol bénéficient des effets de Fertilisation et du Champ Herbu. La capacité Fée Garde Florale et le talent Flora-Voile des Pokemon Fée sont également dédiés au category Plante.");
        $category_15->setSymbol('images/category/Plante.png');
        $category_15->setColor('#63BD5A');
        $category_15->setCapacity($capacity_02);
        $manager->persist($category_15);

        $category_16 = new category();
        $category_16->setName('Psy');
        $category_16->setDescription("Le category Psy regroupe tous les Pokemon ayant des pouvoirs mentaux (télékinésie, télépathie, téléportation, prescience, etc.) en contrepoint du category Combat qu'ils sont censés battre. Certains Pokemon Psy se distinguent par une intelligence ou une puissance de calcul hors normes (Alakazam, Métalosse). Il arrive que leurs dresseurs présentent eux-mêmes des facultés paranormales : les Kinésistes peuvent faire léviter des Poké Balls, et la championne Morgane de Safrania peut tordre des cuillères par la pensée.
                                Les faiblesses du category Psy sont basées sur trois peurs humaines récurrentes : les insectes, l'obscurité et les fantômes. Un talent, Phobique, leur est d'ailleurs dédié.
                                Pour compenser leur faible Défense caractéristique, les Pokemon Psy, au profil majoritairement Spécial, doivent frapper régulièrement en premier : Deoxys sous sa forme Vitesse détient la seconde place dans cette statistique (puisqu'il est détrôné par Regieleki depuis la huitième génération) avec 180 points de base (150 sous sa forme normale), et Alakazam, méga-évolué ou non (120 + 30), est lui aussi très rapide.
                                En première génération, le category Psy a posé un problème d'équilibrage en raison de sa trop grande force offensive, ce qui a motivé l'introduction dès la deuxième génération de ses deux contres, Acier et surtout Ténèbres, en plus d'ignorer les attaques de category Spectre contrairement à ce qui est convenu dans les guides officiels, dans le dessin animé et même dans Pokemon Rouge et Bleu (un PNJ y explique que « les Pokemon Psy ne craignent que les insectes et les fantômes »).");
        $category_16->setSymbol('images/category/Psy.png');
        $category_16->setColor('#FA727A');
        $category_16->setCapacity($capacity_02);
        $manager->persist($category_16);

        $category_17 = new category();
        $category_17->setName('Tenebres');
        $category_17->setDescription("Si la couleur noire du thème semble évoquer l'obscurité ou la nuit, le category Ténèbres trouve plutôt son origine dans la notion de malveillance. Cela ne veut pas dire que ce category ne compte que des Pokemon agressifs ou adeptes de tactiques sournoises. Certains d'entre eux ont un bon fond et sont simplement affublés d'une réputation peu enviable (Absol en particulier).
                                Introduit avec Acier dans le but de contrer le category Psy, le category Ténèbres est insensible à ce dernier (nonobstant l'utilisation d'Œil Miracle) et domine également le category Spectre. Il forme un double category remarquable avec Poison, qui annule ses trois faiblesses et ne l'expose qu'au category Sol.
                                Le groupe Ténèbres est essentiellement tourné vers l'offensive : sa statistique dominante est l'Attaque (dont dépendent aujourd'hui toutes les capacités Ténèbres offensives antérieures à la quatrième génération), et on y trouve aussi des Pokemon rapides ou dotés d'une forte Attaque Spéciale. En contrepartie, ce groupe est assez fragile défensivement.
                                Depuis la septième génération, les capacités de statut rendues prioritaires par le talent Farceur ainsi que les éventuelles attaques induites par ces capacités échouent sur les Pokemon Ténèbres.");
        $category_17->setSymbol('images/category/Tenebres.png');
        $category_17->setColor('#5A5265A');
        $category_17->setCapacity($capacity_02);
        $manager->persist($category_17);

        $category_18 = new category();
        $category_18->setName('Inconnu');
        $category_18->setDescription("Le category inconnu est totalement neutre vis-à-vis des autres category, n'ayant ni résistances, ni faiblesses, ni multiplicateur de dégâts. La seule attaque permettant de vérifier cette propriété est Ball'Météo dans Pokemon XD : le Souffle des Ténèbres, qui obtient le category ??? sous le climat de Ciel Noir. De plus, lorsqu'une telle capacité touche un Pokemon doté du talent Déguisement, ce dernier prend le category Normal.
                                Par ailleurs, Adaptation ne permet pas d'obtenir le category inconnu, puisque la seule capacité ayant ce category en permanence dans les quatre premières générations est Malédiction et qu'Adaptation échoue si lancée par un Pokemon n'ayant que ces deux attaques dans son moveset.");
        $category_18->setSymbol('images/category/Inconnu.png');
        $category_18->setColor('#5A5365');
        $category_18->setCapacity($capacity_03);
        $manager->persist($category_18);

        $category_19 = new category();
        $category_19->setName('Obscur');
        $category_19->setDescription("Les capacités Obscures n'ont pas de véritable category. Ce sont des versions corrompues de capacités tirées du movepool des Pokemon Obscurs, à l'instar de la signature de XD001 Aéro Noir, l'équivalent de l'Aéroblast de Lugia. Ces attaques ont une puissance numérique généralement inférieure à celle des capacités d'origine, mais n'ont pas de limite de PP, ce qui les rend utilisables autant de fois que l'on veut dans un même combat.
                                Les capacités Obscures offensives sont réparties entre les catégories physique et spéciale, contrairement aux attaques standard des trois premières générations dont le couple Attaque-Défense entrant dans le calcul des dégâts est déterminé par leur category (ce n'est qu'à partir de la quatrième génération que les attaques ne sont plus catégorisées en fonction de leur category).
                                Les Pokemon Obscurs étant exclus des échanges, les capacités Obscures n'existent donc pas en dehors des deux jeux conçus pour la GameCube. Elles ne peuvent pas non plus être copiées via Gribouille.
                                Dans Pokemon XD, le category Obscur est avantagé sur les Pokemon classiques, mais se révèle peu efficace contre les Pokemon Obscurs, ce qui en fait le seul category de capacité à ne jamais occasionner de dégâts neutres.");
        $category_19->setSymbol('images/category/Obscur.png');
        $category_19->setColor('#434349');
        $category_19->setCapacity($capacity_03);
        $manager->persist($category_19);




        /* Families */
        $family_01 = new Family();
        $family_01->setName('Abysse');
        $manager->persist($family_01);
        $family_02 = new Family();
        $family_02->setName('Acclameur');
        $manager->persist($family_02);
        $family_03 = new Family();
        $family_03->setName('ADN');
        $manager->persist($family_03);
        $family_04 = new Family();
        $family_04->setName('Agent Secret');
        $manager->persist($family_04);
        $family_05 = new Family();
        $family_05->setName('Aiglon');
        $manager->persist($family_05);
        $family_06 = new Family();
        $family_06->setName('Ailes Pomme');
        $manager->persist($family_06);
        $family_07 = new Family();
        $family_07->setName('Aimant');
        $manager->persist($family_07);
        $family_08 = new Family();
        $family_08->setName('Allongé');
        $manager->persist($family_08);
        $family_09 = new Family();
        $family_09->setName('Alliage');
        $manager->persist($family_09);
        $family_10 = new Family();
        $family_10->setName('Alpha');
        $manager->persist($family_10);


        $family_11 = new Family();
        $family_11->setName('Âme');
        $manager->persist($family_11);
        $family_12 = new Family();
        $family_12->setName('Âme Errante');
        $manager->persist($family_12);
        $family_13 = new Family();
        $family_13->setName('Âne');
        $manager->persist($family_13);
        $family_14 = new Family();
        $family_14->setName('Annihilation');
        $manager->persist($family_14);
        $family_15 = new Family();
        $family_15->setName('Antenne');
        $manager->persist($family_15);
        $family_16 = new Family();
        $family_16->setName('Ailes Pomme');
        $manager->persist($family_16);
        $family_17 = new Family();
        $family_17->setName('Appel');
        $manager->persist($family_17);
        $family_18 = new Family();
        $family_18->setName('Apprenti');
        $manager->persist($family_18);
        $family_19 = new Family();
        $family_19->setName('Aquabelette');
        $manager->persist($family_19);
        $family_20 = new Family();
        $family_20->setName('Aquabulle');
        $manager->persist($family_20);


        $family_21 = new Family();
        $family_21->setName('Aqualapin');
        $manager->persist($family_21);
        $family_22 = new Family();
        $family_22->setName('Aqualimace');
        $manager->persist($family_22);
        $family_23 = new Family();
        $family_23->setName('Aquaplante');
        $manager->persist($family_23);
        $family_24 = new Family();
        $family_24->setName('Aquasouris');
        $manager->persist($family_24);
        $family_25 = new Family();
        $family_25->setName('Araclectrik');
        $manager->persist($family_25);
        $family_26 = new Family();
        $family_26->setName('Arbregelé');
        $manager->persist($family_26);
        $family_27 = new Family();
        $family_27->setName('Arc-en-ciel');
        $manager->persist($family_27);
        $family_28 = new Family();
        $family_28->setName('Ardent');
        $manager->persist($family_28);
        $family_29 = new Family();
        $family_29->setName('Armoiseau');
        $manager->persist($family_29);
        $family_30 = new Family();
        $family_30->setName('Armure');
        $manager->persist($family_30);


        $family_31 = new Family();
        $family_31->setName('Armurfer');
        $manager->persist($family_31);
        $family_32 = new Family();
        $family_32->setName('Aurore');
        $manager->persist($family_32);
        $family_33 = new Family();
        $family_33->setName('Art Martial');
        $manager->persist($family_33);
        $family_34 = new Family();
        $family_34->setName('Artificiel');
        $manager->persist($family_34);
        $family_35 = new Family();
        $family_35->setName('Artificier');
        $manager->persist($family_35);
        $family_36 = new Family();
        $family_36->setName('Assemblage');
        $manager->persist($family_36);
        $family_37 = new Family();
        $family_37->setName('Attachant');
        $manager->persist($family_37);
        $family_38 = new Family();
        $family_38->setName('Audition');
        $manager->persist($family_38);
        $family_39 = new Family();
        $family_39->setName('Aura');
        $manager->persist($family_39);
        $family_40 = new Family();
        $family_40->setName('Avaltouron');
        $manager->persist($family_40);


        /* Pokemons */
        $pokemon_01 = new Pokemon();
        $pokemon_01->setName('Serpang');
        $pokemon_01->setPicture('images/pokemons/Serpang.png');
        $pokemon_01->setHeight(170);
        $pokemon_01->setWeight(27);
        $pokemon_01->setFamily($family_01);
        $pokemon_01->setDetails("Ce piètre nageur se sert de sa queue pour appâter ses proies. Il les gobe si elles approchent de trop près.");
        $manager->persist($pokemon_01);

        $pokemon_02 = new Pokemon();
        $pokemon_02->setName('Posipi');
        $pokemon_02->setPicture('images/pokemons/Posipi.png');
        $pokemon_02->setHeight(40);
        $pokemon_02->setWeight(4.2);
        $pokemon_02->setFamily($family_02);
        $pokemon_02->setDetails("Posipi sert de supporter à ses partenaires. Chaque fois qu'un membre de son équipe fait une belle action dans un combat, ce Pokémon court-circuite son corps et libère des étincelles pour montrer sa joie.");
        $manager->persist($pokemon_02);

        $pokemon_03 = new Pokemon();
        $pokemon_03->setName('Négapi');
        $pokemon_03->setPicture('images/pokemons/Négapi.png');
        $pokemon_03->setHeight(40);
        $pokemon_03->setWeight(4.2);
        $pokemon_03->setFamily($family_02);
        $pokemon_03->setDetails("Négapi n'hésite pas à se mettre en danger pour soutenir ses partenaires. Il court-circuite son corps pour faire jaillir des gerbes d'étincelles et de donner du cœur à l'ouvrage à ses équipiers.");
        $manager->persist($pokemon_03);

        $pokemon_04 = new Pokemon();
        $pokemon_04->setName('Deoxys | Forme Normale');
        $pokemon_04->setPicture('images/pokemons/Deoxys_(Forme_Normale).png');
        $pokemon_04->setHeight(170);
        $pokemon_04->setWeight(27);
        $pokemon_04->setFamily($family_03);
        $pokemon_04->setDetails("En 3G, Deoxys prend cette forme sur Rubis et Saphir. Dans les jeux suivants, c'est sa forme de base, qu'il peut retrouver en interagissant avec une météorite.");
        $manager->persist($pokemon_04);

        $pokemon_05 = new Pokemon();
        $pokemon_05->setName('Deoxys | Forme Attaque');
        $pokemon_05->setPicture('images/pokemons/Deoxys_(Forme_Attaque).png');
        $pokemon_05->setHeight(170);
        $pokemon_05->setWeight(27);
        $pokemon_05->setFamily($family_03);
        $pokemon_05->setDetails("En 3G, Deoxys prend cette forme sur Rouge Feu. Dans les jeux suivants, il prend cette forme en interagissant avec une météorite.");
        $manager->persist($pokemon_05);

        $pokemon_06 = new Pokemon();
        $pokemon_06->setName('Deoxys | Forme Défense');
        $pokemon_06->setPicture('images/pokemons/Deoxys_(Forme_Défense).png');
        $pokemon_06->setHeight(170);
        $pokemon_06->setWeight(27);
        $pokemon_06->setFamily($family_03);
        $pokemon_06->setDetails("En 3G, Deoxys prend cette forme sur Vert Feuille. Dans les jeux suivants, il prend cette forme en interagissant avec une météorite.");
        $manager->persist($pokemon_06);

        $pokemon_07 = new Pokemon();
        $pokemon_07->setName('Deoxys | Forme Vitesse');
        $pokemon_07->setPicture('images/pokemons/Deoxys_(Forme_Vitesse).png');
        $pokemon_07->setHeight(170);
        $pokemon_07->setWeight(27);
        $pokemon_07->setFamily($family_03);
        $pokemon_07->setDetails("En 3G, Deoxys prend cette forme sur Émeraude. Dans les jeux suivants, il prend cette forme en interagissant avec une météorite.");
        $manager->persist($pokemon_07);

        $manager->flush();
    }
}
