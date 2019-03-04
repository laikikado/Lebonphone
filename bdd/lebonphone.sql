-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 nov. 2018 à 08:49
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lebonphone`
--

-- --------------------------------------------------------

--
-- Structure de la table `achete`
--

DROP TABLE IF EXISTS `achete`;
CREATE TABLE IF NOT EXISTS `achete` (
  `idprod` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idprod`,`iduser`),
  KEY `Achete_Utilisateur0_FK` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idmarque` int(11) NOT NULL AUTO_INCREMENT,
  `nommarque` varchar(20) NOT NULL,
  PRIMARY KEY (`idmarque`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`idmarque`, `nommarque`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Asus'),
(4, 'Nokia'),
(5, 'BlackBerry'),
(6, 'Sony'),
(7, 'Wiko'),
(8, 'LG'),
(9, 'Huawei'),
(10, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `idoffre` int(11) NOT NULL AUTO_INCREMENT,
  `idprod` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `tailleecran` varchar(30) NOT NULL,
  `connectivite` varchar(30) NOT NULL,
  `stockagememoire` varchar(30) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `systemexploit` varchar(20) NOT NULL,
  `idtype` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmarque` int(11) NOT NULL,
  PRIMARY KEY (`idoffre`),
  KEY `telephone` (`idprod`),
  KEY `utilisateur` (`iduser`),
  KEY `marque` (`idmarque`),
  KEY `type` (`idtype`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idoffre`, `idprod`, `libelle`, `prix`, `etat`, `description`, `photo`, `tailleecran`, `connectivite`, `stockagememoire`, `couleur`, `systemexploit`, `idtype`, `iduser`, `idmarque`) VALUES
(2, 7, 'iPhone 7', 450, 'Bon', 'Débloquer tout opérateur. \r\nLe téléphone est vendu avec sa boîte d\'origine ainsi que son chargeur et ses écouteurs. \r\nVitre en verre trempée fissurée mais écran tactile en très bon état. ', '1', '5', 'Oui', '32Go', 'Rouge', 'iOS', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE IF NOT EXISTS `telephone` (
  `idprod` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `tailleecran` varchar(30) NOT NULL,
  `connectivite` varchar(30) NOT NULL,
  `stockagememoire` varchar(30) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `systemexploit` varchar(20) NOT NULL,
  `idtype` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmarque` int(11) NOT NULL,
  PRIMARY KEY (`idprod`),
  KEY `Telephone_Type_FK` (`idtype`),
  KEY `Telephone_Utilisateur0_FK` (`iduser`),
  KEY `Telephone_Marque1_FK` (`idmarque`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `telephone`
--

INSERT INTO `telephone` (`idprod`, `libelle`, `prix`, `etat`, `description`, `photo`, `tailleecran`, `connectivite`, `stockagememoire`, `couleur`, `systemexploit`, `idtype`, `iduser`, `idmarque`) VALUES
(1, 'S7 edge', 200, 'Très bon', 'S7 Edge 32go état neuf. Garantie Mars 2019. Aucunes rayures, batterie neuve.\r\n', '', '5', 'Oui', '32Go', 'Or', 'Android', 2, 1, 2),
(7, 'iPhone 7', 450, 'Bon', 'Débloquer tout opérateur. \r\nLe téléphone est vendu avec sa boîte d\'origine ainsi que son chargeur et ses écouteurs. \r\nVitre en verre trempée fissurée mais écran tactile en très bon état. ', '1', '5', 'Oui', '32Go', 'Rouge', 'iOS', 1, 1, 1),
(8, 'J3 Pro', 170, 'Neuf', 'Samsung j3 pro 2017 16 giga tout neuf jamais utilisé', NULL, '4,8', 'Oui', '16Go', 'Or', 'Android', 1, 3, 2),
(9, 'Ace', 55, 'Très bon', 'Bonjour je vends un samsung Galaxy ace \r\nTrès bon état \r\nAvec la boîte et ses accessoires', NULL, '3,8', 'Non', '4Go', 'Noir', 'Android', 1, 8, 2),
(10, 'GT-1190', 30, 'Très bon', 'Samsung GT-1190 en excellent état comme neuf, débloquer tout opérateur vendu avec son chargeur ', NULL, '3 ou moins', 'Non', '2Go et moins', 'Noir', 'Autre', 3, 9, 2),
(11, 'S9 Plus', 600, 'Neuf', 'comme neuf avec tous ses accessoires et la boîte d origine.', NULL, '6', 'Oui', '32Go', 'Violet', 'Android', 1, 10, 2),
(12, 'A3', 50, 'Hors Service', 'Pour pièce ou réparer. L\'écran reste noir mes les touches du bas s\'allume.', NULL, '4,7', 'Oui', '16Go', 'Noir', 'Android', 1, 11, 2),
(13, 'Note 3', 140, 'Bon', 'Samsung note 3 blanc 16 go avec son stylet chargeur écouteur ', NULL, '5,2', 'Oui', '32Go', 'Blanc', 'Android', 1, 12, 2),
(14, 'A5 2016', 140, 'Très bon', 'Tout opérateurs débloqué. Vendu avec boite, chargeur, cable, écouteurs..', NULL, '4,7', 'Oui', '16Go', 'Or', 'Android', 1, 13, 2),
(15, 'Gold 4G', 180, 'Très bon', 'Complet avec tout ses accessoires + facture et garantie.', NULL, '4,5', 'Oui', '16Go', 'Or', 'Android', 1, 14, 2),
(16, 'iPhone 6', 210, 'Très bon', 'Etat irréprochable, Batterie neuve !', NULL, '5', 'Oui', '64Go', 'Gris Sidéral', 'iOS', 1, 3, 1),
(17, 'iPhone 7', 450, 'Très bon', 'Débloqué acheté à Apple, facture à l\'appuie \r\nComprenant : écouteurs, chargeurs, adaptateur écouteurs, et coque transparente', NULL, '5', 'Oui', '128Go', 'Blanc', 'iOS', 1, 9, 1),
(18, 'iPhone 6S Plus', 270, 'Très bon', 'Je vends mon iPhone 6s Plus 16 giga car j\'en ai acheté un nouveau. Je n\'en ai plus l\'utilité.\r\nLe téléphone est dans un état irréprochable. Avec sa boîte ses écouteurs et son chargeur. \r\nL\'iPhone n\'est plus garantie Apple , car le téléphone vient de dépasser ses 1 ans.', NULL, '5', 'Oui', '16Go', 'Or', 'iOS', 1, 11, 1),
(19, 'iPhone 8', 540, 'Neuf', 'IPhone 8 64 gb couleur or debloqué garanti 2 ans sous blister.\r\n\r\nPossibilité de le faire verifier par Apple lors de la transaction (Accepte tout autre démarche de vérification)', NULL, '5', 'Oui', '64Go', 'Or', 'iOS', 1, 13, 1),
(20, 'iPhone X', 750, 'Très bon', 'Vends iPhone X état neuf, débloque tout opérateur.\r\nChangé en garantie par Apple il y a 2 mois à peine.\r\nIl est vendu avec accessoires et boîte, et certificat de cession.', NULL, '6,4', 'Oui', '64Go', 'Gris Sidéral', 'iOS', 1, 13, 1),
(21, 'Max Plus M1', 120, 'Très bon', 'vends telephone smartphone dans un état quasi neuf dans sa boîte d\'origine.\r\ndébloqué tout opérateur.', NULL, '4,5', 'Oui', '32Go', 'Or', 'Android', 1, 8, 3),
(22, '2', 40, 'Hors Service', 'Écran HS.\r\nAppareil photo HS.\r\nDébloqué tout opérateur', NULL, '4,5', 'Oui', '32Go', 'Noir', 'Android', 1, 11, 3),
(23, 'Selfie', 70, 'Bon', 'Vend mon Asus Zenfone Selfie, très bon état, vitre protégée par film transparent.', NULL, '4,2', 'Oui', '16Go', 'Blanc', 'Android', 1, 2, 3),
(24, '4 Max', 130, 'Neuf', ' parfait état. Il as servi 1 mois (29/09/2018) et Encore sous garantie Fnac prix magasin (179Euro(s))', NULL, '4,9', 'Oui', '32Go', 'Or', 'Android', 1, 9, 3),
(25, '5', 270, 'Très bon', 'vente mon Asus ZenFone 5.\r\nle téléphone a 3 mois comme vous verrez sur la facture.', NULL, '6,2', 'Oui', '64Go', 'Noir', 'Android', 1, 11, 3),
(26, '2', 80, 'Bon', 'Je vends un Asus zenfone en bon état\r\nAttention un câble pour les données mobiles à été sectionné du coup pour aller sur internet cela ne sera possible qu\'avec le wifi.', NULL, '4,5', 'Oui', '32Go', 'Noir', 'Android', 1, 14, 3),
(27, 'Lumia 640', 70, 'Très bon', 'Etat comme neuf débloqué a tout la mémoire 16go , vendu seule avec la boîte.', NULL, '5', 'Oui', '16Go', 'Bleu', 'Windows Mobile', 1, 12, 4),
(28, 'C6', 30, 'Bon', 'Nokia C6-00 noir, avec clavier escamotable qwerty. Avec chargeur secteur.\r\nS\'allume et se charge correctement, accès au menu, appareil photo, etc...\r\nIl est SIMLOCKé (affiche \'Carte SIM non valide).', NULL, '3,1', 'Non', '8Go', 'Noir', 'Autre', 2, 2, 4),
(29, '6700 Slide', 50, 'Très bon', 'Je vends mon Nokia 6700 slide coulissant débloqué tout opérateurs et vendu avec le chargeur.', NULL, '2,6', 'Non', '2Go ou moins', 'Gris', 'Autre', 4, 11, 4),
(30, '6700s', 50, 'Bon', 'En bon état, débloqué opérateur', NULL, '3 ou moins', 'Non', '2Go ou moins', 'Gris', 'Aucun', 4, 8, 4),
(31, '6100', 15, 'Médiocre', 'Le boîtier fonctionne. \r\nLe clavier est bien effacé mais un utilisateur qui connaît les touches par coeur saura l\'utiliser. \r\nBloqué Orange. \r\nFourni avec écouteurs (jamais utilisé), chargeur d\'origine fonctionnel, notice et boîte d\'origine ', NULL, '3 ou moins', 'Non', '2Go ou moins', 'Gris', 'Aucun', 5, 9, 4),
(32, 'Lumia 520', 60, 'Très bon', 'Vends Nokia Lumia 520 bleu en bon état de couleur bleu', NULL, '3,8', 'Non', '8Go', 'Bleu', 'Windows Mobile', 1, 3, 4),
(33, 'Z30', 100, 'Bon', 'Blackberry Z30 16go Blanc en très bon état débloqué tt opérateur sans aucunes rayures ni chocs . On peut inséré une carte micro SD Ou SDHC jusqu\'à 64go. Une oreillette bluetooth Blackberry est offerte avec.', NULL, '3,2', 'Non', '16Go', 'Blanc', 'Blackberry OS', 1, 13, 5),
(34, 'Porsche Design P9983', 295, 'Très bon', 'vends blackberry porsche design p\'9983 débloqué tout opérateur clavier azerty vendu avec le chargeur compatible. Produit original Blackberry c\'est pas une contrefaçon', NULL, '3,8', 'Non', '8Go', 'Noir (finition cuir)', 'Blackberry OS', 5, 12, 5),
(35, 'Q5', 50, 'Très bon', 'Tres bon etat , peu utiliser', NULL, '3,8', 'Non', '8Go', 'Noir', 'Blackberry OS', 5, 11, 5),
(36, 'Bold 9790', 65, 'Neuf', 'Vends mon BlackBerry Bold 9790 neuf. \r\nJe ne m\'en suis jamais servi, il est donc dans un état irréprochable et fonctionne parfaitement. \r\nFourni dans la boîte d\'origine avec chargeur, câble USB, écouteurs, notices et carte micro SD 8Go. ', NULL, '3,8', 'Non', '8Go', 'Noir', 'Blackberry OS', 5, 1, 5),
(37, 'Torch 9800', 65, 'Très bon', 'Vends mon blackberry torch 9800 très bon état débloqué tout opérateur vendu avec le chargeur compatible', NULL, '3,8', 'Non', '8Go', 'Noir', 'Blackberry OD', 5, 8, 5),
(38, 'KeyOne', 250, 'Neuf', 'Blackberry keyone\r\n32go extensible via micro sd\r\nDébloquer\r\nFacture et garantie 11/2019\r\nDans sa boîte avec tous les accessoires\r\nÉtat excellent', NULL, '5', 'Oui', '32Go', 'Noir Mat', 'Android', 1, 11, 5),
(39, 'Black', 100, 'Très bon', 'Sony xperia Black 64Giga, débloqué et état neuf, WiFi, GPS, applications android...\r\nComplet avec tout ses accessoires\r\nexcellent smartphone.', NULL, '4,6', 'Oui', '64Go', 'Noir', 'Android', 1, 10, 6),
(40, 'Z5 Compact', 150, 'Bon', 'Sony xperia Z5 compact 4G+ 128Giga (grosse capacité) 23 Mégapixels, débloqué, très bon état juste petite fissures non gênante sur la coque arrière (elle vaut 2,30Euro(s) sur le net). \r\nWiFi, GPS, applications, grand écran, processeur puissant...\r\navec tout ses accessoires.', NULL, '5,5', 'Oui', '128Go', 'Noir', 'Android', 1, 13, 6),
(41, 'XZ', 120, 'Très bon', 'très bon état il marche très très bien aucun problème , débloquer a tout opérateur ,la mémoire 32 go, vendu seul.', NULL, '5', 'Oui', '32Go', 'argent', 'Android', 1, 8, 6),
(42, 'Z1 Compact', 90, 'Bon', 'Sony z1 compact débloqué, mieux qu\'un iPhone!\r\nSlot micro SD\r\nProcesseur quadri coeur 2,2ghz\r\n16go de stockage\r\nAppareil photo 20,7 mega pixels...\r\nBatterie neuve\r\nÉcran nickel toujours protégé par une vitre en verre trempé\r\nVendue avec 2 coques\r\nJuste quelques traces sur l\'arrière et les coins', NULL, '5,3', 'Oui', '32Go', 'Noir', 'Android', 1, 9, 6),
(43, 'M', 45, 'Très bon', 'Sony Xperia M très bon état, fonctionne parfaitement \r\nUtilisé moins d\'un an ', NULL, '4,2', 'Oui', '16Go', 'Noir', 'Android', 1, 3, 6),
(44, 'Z3 Compact', 80, 'Hors Service', 'Vends smartphone Sony Xperia Z3 compact. \r\nLe connecteur de charge est hs, il ne peut donc pas être chargé.', NULL, '4', 'Oui', '16Go', 'Blanc', 'Android', 1, 12, 6),
(45, 'Tommy 3', 80, 'Neuf', 'Téléphone Smartphone 5,5 pouces Wiko Tommy 3 NEUF + Facture + Garantie jusqu\'au 10/10/2020 !', NULL, '5,5', 'Oui', '16Go', 'Noir', 'Android', 1, 1, 7),
(46, 'Rainbow Lite 4G', 50, 'Très bon', 'Double Sim\r\n4G\r\nTient bien la charge\r\nDébloquer\r\nAndroid 5.1.1', NULL, '5,2', 'Oui', '16Go', 'Noir', 'Android', 1, 14, 7),
(47, 'Wax 4G', 50, 'Bon', 'Fourni avec cable d\'alimentation chargeur, cable écouteur, housse en cuir un peu élimée plus coque du dos en parfait état avec sa batterie d\'origine\r\nCe modèle possède un bon appareil photo pour des prises de vues de bonnes qualité, très pratique pour accéder aux diverses applications\r\n', NULL, '4,8', 'Oui', '8Go', 'Noir', 'Android', 1, 2, 7),
(48, 'Selfie Originial', 110, '', 'wiko selfi original neuf avec sa boîte et ses accessoires. ', NULL, '4,6', 'Non', '8Go', 'Noir', 'Android', 1, 12, 7),
(49, 'Goa', 75, 'Neuf', 'vend super wiko goa neuf jamais ouvert. cadeau mais achat en double.', NULL, '5', 'Oui', '16Go', 'Noir', 'Android', 1, 3, 7),
(50, 'Sunny', 30, 'Très bon', 'Wiko Sunny blanc en bon état vendu avec une coque de protection blanche', NULL, '4,2', 'Non', '8Go', 'Blanc', 'Android', 1, 11, 7),
(51, 'KM500', 30, 'Bon', 'mobile LG KM500 débloqué. Fournit avec boite et chargeur.', NULL, '3 ou moins', 'Non', '2Go ou moind', 'Gris', 'Autre', 4, 13, 8),
(52, 'G2', 100, 'Très bon', 'smartphone en très bon état, fonctionne parfaitement.', NULL, '4,6', 'Oui', '16Go', 'Noir', 'Android', 1, 10, 8),
(53, 'G4 Edition Cuir', 210, 'Très bon', 'LG G4 CUIR CAMEL\r\nDesign unique\r\n32 GO de mémoire, ecran ultra haute définition lumineux 5,5\' bordeless, Photo 16M de pixels. avec HDR auto, mode manuel avec tous les réglages , objectif f: 1.8..selfis 8M de pixels\r\nvendu avec tous les accessoires sur photos + un câble slimport', NULL, '5,5', 'Oui', '32Go', 'Cuir Camel', 'Android', 1, 9, 8),
(54, '250', 10, 'Bon', 'Bon etat de fonctionnement et esthetique.\r\nDesimlocké tout opérateur.\r\nVendu avec son chargeur.', NULL, '3 ou moins', 'Non', '2Go ou moins', 'Noir', 'Autre', 3, 8, 8),
(55, 'G3', 70, 'Bon', 'Aucune rayure sur l\'écran et la coque.\r\nProblème de scintillement de temps en temps de l\'écran.', NULL, '4,2', 'Oui', '16Go', 'Noir', 'Android', 1, 3, 8),
(56, 'G3', 40, 'Hors Service', 'Au bout de quelques minutes le telephone scintille et s\'eteint, je pense a un probleme de carte mere.\r\nSinon il est en tres bon état, pas la moindre rayure, la batterie tient tres bien la charge.\r\nJe le vend donc dans l\'etat, avec une deuxieme housse-coque de protection neuve (photo 2),boite d\'origine, pas de chargeur\r\n', NULL, '4,2', 'Oui', '16Go', 'Noir', 'Android', 1, 11, 8),
(57, 'Y6 2018', 135, 'Très bon', 'Très bon portable en très bon état, vendu avec sa boîte d\'origine ses écouteurs et son chargeur', NULL, '5,2', 'Oui', '16Go', 'Noir', 'Android', 1, 1, 9),
(58, 'P20 Pro', 600, 'Très bon', 'Huawei p20 pro en parfait état. Acheter en mi juillet 2018 à Bouygues. Je vend le téléphone avec sa boîte et ses accessoires d\'origines. Aucun problème ni fissures. ', NULL, '6', 'Oui', '64Go', 'Noir', 'Android', 1, 14, 9),
(59, ' G620S', 65, 'Neuf', 'Vends téléphone Huawei G620S en parfait état, comme neuf, débloqué tout opérateur.\r\nAucune rayure, tel protégé par une coque et écran protégé par un film verre trempé.\r\nAvec boite d\'origine + écouteurs + chargeur avec câble microUSB + coque de protection.', NULL, '5', 'Oui', '32Go', 'Noir', 'Android', 1, 2, 9),
(60, 'Y7 2018', 110, 'Neuf', 'Acheté en septembre 2018 donc neuf, housse et écran de protection offerts', NULL, '5,5', 'Oui', '16Go', 'Noir', 'Android', 1, 12, 9),
(61, 'P8 Lite 2018', 115, 'Très bon', 'Désimlocké \r\nSuper état comme neuf aucune rayure \r\nTrès peu servi \r\nToujours utilisé avec protection d\'écran et coque', NULL, '5,2', 'Oui', '16Go', 'Noir', 'Android', 1, 11, 9),
(63, 'Map 10 Lite', 200, 'Neuf', 'Vend ou échange huawei mate 10lite comme neuf', NULL, '4,8', 'Oui', '16Go', 'Rose', 'Android', 1, 9, 9),
(64, 'OnePlus 6', 480, 'Neuf', 'Je vends mon Oneplus 6.\r\nEtat neuf.\r\nAcheté début juillet 2018 sur le site Amazon.\r\nColoris \"Mirror Black\".\r\nVersion 8GO de RAM et 128GO de ROM (mémoire).\r\nVendu dans sa boîte complète.', NULL, '6', 'Oui', '128Go', 'Noir Mirroir', 'Android', 1, 13, 10),
(65, 'OnePlus 5', 250, 'Bon', 'Oneplus 5 64 go bon état. \r\nvendu avec une coque Spigen.', NULL, '5,8', 'Oui', '64Go', 'Noir', 'Android', 1, 11, 10),
(66, 'Honor 7', 100, 'Bon', 'vend mon honor 7 en assez bonne état car j\'ai changer de telephone. Avec facture', NULL, '5', 'Oui', '32Go', 'Or', 'Android', 1, 14, 10),
(67, 'Honor 8 lite', 95, 'Très bon', 'SMARTPHONE HONOR 8 Lite couleur blanc, avec une coque à rabat\r\nAcheté le 23.03.2018 (facture)\r\nLe tout en Excellent état , boite et accessoires d\'origine.', NULL, '5,2', 'Oui', '32Go', 'Blanc', 'Android', 1, 13, 10),
(68, 'Gigaset GS100', 100, 'neuf', 'Téléphone neuf sous blister gagné lors d\'un challenge commercial\r\nGigaset GS100 bleu cobalt 8GB Dual sim (nano-sim, micro-sim) emplacement carte SD', NULL, '5', 'Oui', '8go', 'Bleu Cobalt', 'Android', 1, 3, 10),
(69, 'Lenovo ZUK Z2', 190, 'Très bon', 'Marque : Lenovo\r\nModèle: ZUK Z2\r\nSystème d\'exploitation:Android 8.0\r\nCPU:Qualcomm Snapdragon 820 64bit Quad Core\r\nGPU:Adreno 530\r\nVitesse du Processeur (max): 2.15GHz\r\nMémoire: ROM 64Go + RAM 4Go', NULL, '5', 'Oui', '64Go', 'Blanc', 'Android', 1, 12, 10),
(70, 'S8', 330, 'Très bon', 'Toujours protégé vendu avec boîte et accessoires, il est débloqué opérateur.', NULL, '5,1', 'Oui', '32Go', 'Noir', 'Android', 1, 2, 2);

--
-- Déclencheurs `telephone`
--
DROP TRIGGER IF EXISTS `AchatTelephone`;
DELIMITER $$
CREATE TRIGGER `AchatTelephone` AFTER DELETE ON `telephone` FOR EACH ROW INSERT INTO offre(idoffre, idprod, libelle, prix, etat, description, photo, tailleecran, connectivite, stockagememoire, couleur, systemexploit, idtype, iduser, idmarque)
SELECT idoffre, idprod, libelle, prix, etat, description, photo, tailleecran, connectivite, stockagememoire, couleur, systemexploit, idtype, iduser, idmarque
FROM deleted
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `typetel`
--

DROP TABLE IF EXISTS `typetel`;
CREATE TABLE IF NOT EXISTS `typetel` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `nomtype` varchar(100) NOT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typetel`
--

INSERT INTO `typetel` (`idtype`, `nomtype`) VALUES
(1, 'Écran tactile (Smartphone)'),
(2, 'Écran tactile'),
(3, 'Téléphone à clapet'),
(4, 'Téléphone coulissant'),
(5, 'Téléphone à clavier');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `datenaissance` date NOT NULL,
  `adresse1` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `idville` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `Utilisateur_Ville_FK` (`idville`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `genre`, `nom`, `prenom`, `numero`, `mail`, `motdepasse`, `datenaissance`, `adresse1`, `credit`, `idville`) VALUES
(1, 'Homme', 'Bernard', 'Philippe', 680763542, 'philippe.bernard@gmail.com', 'philippe', '1961-10-03', '35 rue des arbousiers', 1089, 19),
(2, 'Homme', 'Bernard', 'Jean', 784737493, 'jean.bernard@gmail.com', 'jean', '1978-12-24', '32 impasse des houx', 0, 272),
(3, 'Homme', 'Dupont', 'Frédérick', 634223644, 'frederick.dupont@gmail.com', 'frederick', '1998-11-17', '12 avenue de la république', 0, 32),
(8, 'Femme', 'Roux', 'Lucile', 605165489, 'lucile.roux@gmail.com', 'lucile', '1989-03-04', '255 rue de la mathe', 0, 75),
(9, 'Femme', 'Rousseau', 'Mathilde', 673489202, 'mathilde.rousseau@gmail.com', 'malthilde', '1996-01-11', '13 rue du paradis', 0, 214),
(10, 'Femme', 'Martines', 'Justine', 755548201, 'justine.martines@gmail.com', 'justine', '1986-03-15', '164 avenue des champs', 0, 95),
(11, 'Homme', 'Levivre', 'Thibaud', 612135489, 'thibaud.levivre@gmail.com', 'thibaud', '1998-10-14', '14 impasse saint-jean', 0, 136),
(12, 'Homme', 'Guers', 'Jacques', 715466597, 'jacques.guers@gmai.com', 'jacques', '1958-03-29', '54 rue de l\'église', 0, 177),
(13, 'Femme', 'Durrin', 'Manon', 654122548, 'manon.durrin@gmail.com', 'manon', '1984-08-16', '40 avenue voltaire', 0, 229),
(14, 'Homme', 'Hugues', 'Martin', 612454384, 'martin.hugues@gmail.com', 'martin', '1968-06-02', '9 rue du château', 0, 110),
(15, 'Homme', 'admin', 'admin', 111111111, 'admin', 'admin', '1990-12-12', 'adresse', 0, 45);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idville` int(11) NOT NULL AUTO_INCREMENT,
  `nomville` varchar(100) NOT NULL,
  PRIMARY KEY (`idville`)
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idville`, `nomville`) VALUES
(1, 'Abeilhan (34290)'),
(2, 'Adissan (34230)'),
(3, 'Agde (34300)'),
(4, 'Agel (34210)'),
(5, 'Agonès (34190)'),
(6, 'Aigne (34210)'),
(7, 'Aigues-Vives (34210)'),
(8, 'Alignan-du-Vent (34290)'),
(9, 'Aniane (34150)'),
(10, 'Arboras (34150)'),
(11, 'Argelliers (34380)'),
(12, 'Aspiran (34800)'),
(13, 'Assas (34820)'),
(14, 'Assignan (34360)'),
(15, 'Aumelas (34230)'),
(16, 'Aumes (34530)'),
(17, 'Autignac (34480)'),
(18, 'Avène (34260)'),
(19, 'Azillanet (34210)'),
(20, 'Babeau-Bouldoux (34360)'),
(21, 'Baillargues (34670)'),
(22, 'Balaruc-le-Vieux (34540)'),
(23, 'Balaruc-les-Bains (34540)'),
(24, 'Bassan (34290)'),
(25, 'Beaufort (34210)'),
(26, 'Beaulieu (34160)'),
(27, 'Bédarieux (34600)'),
(28, 'Bélarga (34230)'),
(29, 'Berlou (34360)'),
(30, 'Bessan (34550)'),
(31, 'Béziers (34500)'),
(32, 'Boisseron (34160)'),
(33, 'Boisset (34220)'),
(34, 'Boujan-sur-Libron (34760)'),
(35, 'Bouzigues (34140)'),
(36, 'Brenas (34650)'),
(37, 'Brignac (34800)'),
(38, 'Brissac (34190)'),
(39, 'Buzignargues (34160)'),
(40, 'Cabrerolles (34480)'),
(41, 'Cabrières (34800)'),
(42, 'Cambon-et-Salvergues (34330)'),
(43, 'Campagnan (34230)'),
(44, 'Campagne (34160)'),
(45, 'Camplong (34260)'),
(46, 'Candillargues (34130)'),
(47, 'Canet (34800)'),
(48, 'Capestang (34310)'),
(49, 'Carlencas-et-Levas (34600)'),
(50, 'Cassagnoles (34210)'),
(51, 'Castanet-le-Haut (34610)'),
(52, 'Castelnau-de-Guers (34120)'),
(53, 'Castelnau-le-Lez (34170)'),
(54, 'Castries (34160)'),
(55, 'Causse-de-la-Selle (34380)'),
(56, 'Causses-et-Veyran (34490)'),
(57, 'Caussiniojouls (34600)'),
(58, 'Caux (34720)'),
(59, 'Cazedarnes (34460)'),
(60, 'Cazevieille (34270)'),
(61, 'Cazilhac (34190)'),
(62, 'Cazouls-d\'Hérault (34120)'),
(63, 'Cazouls-lès-Béziers (34370)'),
(64, 'Cébazan (34360)'),
(65, 'Ceilhes-et-Rocozels (34260)'),
(66, 'Celles (34700)'),
(67, 'Cers (34420)'),
(68, 'Cessenon-sur-Orb (34460)'),
(69, 'Cesseras (34210)'),
(70, 'Ceyras (34800)'),
(71, 'Clapiers (34830)'),
(72, 'Claret (34270)'),
(73, 'Clermont-l\'Hérault (34800)'),
(74, 'Colombières-sur-Orb (34390)'),
(75, 'Colombiers (34440)'),
(76, 'Combaillaux (34980)'),
(77, 'Combes (34240)'),
(78, 'Corneilhan (34490)'),
(79, 'Coulobres (34290)'),
(80, 'Courniou (34220)'),
(81, 'Cournonsec (34660)'),
(82, 'Cournonterral (34660)'),
(83, 'Creissan (34370)'),
(84, 'Cruzy (34310)'),
(85, 'Dio-et-Valquières (34650)'),
(86, 'Espondeilhan (34290)'),
(87, 'Fabrègues (34690)'),
(88, 'Faugères (34600)'),
(89, 'Félines-Minervois (34210)'),
(90, 'Ferrals-les-Montagnes (34210)'),
(91, 'Ferrières-les-Verreries (34190)'),
(92, 'Ferrières-Poussarou (34360)'),
(93, 'Florensac (34510)'),
(94, 'Fontanès (34270)'),
(95, 'Fontès (34320)'),
(96, 'Fos (34320)'),
(97, 'Fouzilhon (34480)'),
(98, 'Fozières (34700)'),
(99, 'Fraisse-sur-Agout (34330)'),
(100, 'Frontignan (34110)'),
(101, 'Gabian (34320)'),
(102, 'Galargues (34160)'),
(103, 'Ganges (34190)'),
(104, 'Garrigues (34160)'),
(105, 'Gigean (34770)'),
(106, 'Gignac (34150)'),
(107, 'Gorniès (34190)'),
(108, 'Grabels (34790)'),
(109, 'Graissessac (34260)'),
(110, 'Guzargues (34820)'),
(111, 'Hérépian (34600)'),
(112, 'Jacou (34830)'),
(113, 'Joncels (34650)'),
(114, 'Jonquières (34725)'),
(115, 'Juvignac (34990)'),
(116, 'La Boissière (34150)'),
(117, 'La Caunette (34210)'),
(118, 'La Grande-Motte (34280)'),
(119, 'La Livinière (34210)'),
(120, 'La Salvetat-sur-Agout (34330)'),
(121, 'La Tour-sur-Orb (34260)'),
(122, 'La Vacquerie-et-Saint-Martin-de-Castries (34520)'),
(123, 'Lacoste (34800)'),
(124, 'Lagamas (34150)'),
(125, 'Lamalou-les-Bains (34240)'),
(126, 'Lansargues (34130)'),
(127, 'Laroque (34190)'),
(128, 'Lattes (34970)'),
(129, 'Laurens (34480)'),
(130, 'Lauret (34270)'),
(131, 'Lauroux (34700)'),
(132, 'Lavalette (34700)'),
(133, 'Lavérune (34880)'),
(134, 'Le Bosc (34700)'),
(135, 'Le Bousquet-d\'Orb (34260)'),
(136, 'Le Caylar (34520)'),
(137, 'Le Crès (34920)'),
(138, 'Le Cros (34520)'),
(139, 'Le Pouget (34230)'),
(140, 'Le Poujol-sur-Orb (34600)'),
(141, 'Le Pradal (34600)'),
(142, 'Le Puech (34700)'),
(143, 'Le Soulié (34330)'),
(144, 'Le Triadou (34270)'),
(145, 'Les Aires (34600)'),
(146, 'Les Matelles (34270)'),
(147, 'Les Plans (34700)'),
(148, 'Les Rives (34520)'),
(149, 'Lespignan (34710)'),
(150, 'Lézignan-la-Cèbe (34120)'),
(151, 'Liausson (34800)'),
(152, 'Lieuran-Cabrières (34800)'),
(153, 'Lieuran-lès-Béziers (34290)'),
(154, 'Lignan-sur-Orb (34490)'),
(155, 'Lodève (34700)'),
(156, 'Loupian (34140)'),
(157, 'Lunas (34650)'),
(158, 'Lunel (34400)'),
(159, 'Lunel-Viel (34400)'),
(160, 'Magalas (34480)'),
(161, 'Maraussan (34370)'),
(162, 'Margon (34320)'),
(163, 'Marseillan (34340)'),
(164, 'Marsillargues (34590)'),
(165, 'Mas-de-Londres (34380)'),
(166, 'Mauguio (34130)'),
(167, 'Maureilhan (34370)'),
(168, 'Mérifons (34800)'),
(169, 'Mèze (34140)'),
(170, 'Minerve (34210)'),
(171, 'Mireval (34110)'),
(172, 'Mons (34390)'),
(173, 'Montady (34310)'),
(174, 'Montagnac (34530)'),
(175, 'Montarnaud (34570)'),
(176, 'Montaud (34160)'),
(177, 'Montbazin (34560)'),
(178, 'Montblanc (34290)'),
(179, 'Montels (34310)'),
(180, 'Montesquieu (34320)'),
(181, 'Montferrier-sur-Lez (34980)'),
(182, 'Montouliers (34310)'),
(183, 'Montoulieu (34190)'),
(184, 'Montpellier (34000)'),
(185, 'Montpeyroux (34150)'),
(186, 'Moulès-et-Baucels (34190)'),
(187, 'Mourèze (34800)'),
(188, 'Mudaison (34130)'),
(189, 'Murles (34980)'),
(190, 'Murviel-lès-Béziers (34490)'),
(191, 'Murviel-lès-Montpellier (34570)'),
(192, 'Nébian (34800)'),
(193, 'Neffiès (34320)'),
(194, 'Nézignan-l\'Évêque (34120)'),
(195, 'Nissan-lez-Enserune (34440)'),
(196, 'Nizas (34320)'),
(197, 'Notre-Dame-de-Londres (34380)'),
(198, 'Octon (34800)'),
(199, 'Olargues (34390)'),
(200, 'Olmet-et-Villecun (34700)'),
(201, 'Olonzac (34210)'),
(202, 'Oupia (34210)'),
(203, 'Pailhès (34490)'),
(204, 'Palavas-les-Flots (34250)'),
(205, 'Pardailhan (34360)'),
(206, 'Paulhan (34230)'),
(207, 'Pégairolles-de-Buèges (34380)'),
(208, 'Pégairolles-de-l\'Escalette (34700)'),
(209, 'Péret (34800)'),
(210, 'Pérols (34470)'),
(211, 'Pézenas (34120)'),
(212, 'Pézènes-les-Mines (34600)'),
(213, 'Pierrerue (34360)'),
(214, 'Pignan (34570)'),
(215, 'Pinet (34850)'),
(216, 'Plaissan (34230)'),
(217, 'Poilhes (34310)'),
(218, 'Pomérols (34810)'),
(219, 'Popian (34230)'),
(220, 'Portiragnes (34420)'),
(221, 'Poujols (34700)'),
(222, 'Poussan (34560)'),
(223, 'Pouzolles (34480)'),
(224, 'Pouzols (34230)'),
(225, 'Prades-le-Lez (34730)'),
(226, 'Prades-sur-Vernazobre (34360)'),
(227, 'Prémian (34390)'),
(228, 'Puéchabon (34150)'),
(229, 'Puilacher (34230)'),
(230, 'Puimisson (34480)'),
(231, 'Puissalicon (34480)'),
(232, 'Puisserguier (34620)'),
(233, 'Quarante (34310)'),
(234, 'Restinclières (34160)'),
(235, 'Rieussec (34220)'),
(236, 'Riols (34220)'),
(237, 'Romiguières (34650)'),
(238, 'Roquebrun (34460)'),
(239, 'Roqueredonde (34650)'),
(240, 'Roquessels (34320)'),
(241, 'Rosis (34610)'),
(242, 'Rouet (34380)'),
(243, 'Roujan (34320)'),
(244, 'Saint-André-de-Buèges (34190)'),
(245, 'Saint-André-de-Sangonis (34725)'),
(246, 'Saint-Aunès (34130)'),
(247, 'Saint-Bauzille-de-la-Sylve (34230)'),
(248, 'Saint-Bauzille-de-Montmel (34160)'),
(249, 'Saint-Bauzille-de-Putois (34190)'),
(250, 'Saint-Brès (34670)'),
(251, 'Saint-Chinian (34360)'),
(252, 'Saint-Christol (34400)'),
(253, 'Saint-Clément-de-Rivière (34980)'),
(254, 'Saint-Drézéry (34160)'),
(255, 'Saint-Étienne-d\'Albagnan (34390)'),
(256, 'Saint-Étienne-de-Gourgas (34700)'),
(257, 'Saint-Étienne-Estréchoux (34260)'),
(258, 'Saint-Félix-de-l\'Héras (34520)'),
(259, 'Saint-Félix-de-Lodez (34725)'),
(260, 'Saint-Gély-du-Fesc (34980)'),
(261, 'Saint-Geniès-de-Fontedit (34480)'),
(262, 'Saint-Geniès-de-Varensal (34610)'),
(263, 'Saint-Geniès-des-Mourgues (34160)'),
(264, 'Saint-Georges-d\'Orques (34680)'),
(265, 'Saint-Gervais-sur-Mare (34610)'),
(266, 'Saint-Guilhem-le-Désert (34150)'),
(267, 'Saint-Guiraud (34725)'),
(268, 'Saint-Hilaire-de-Beauvoir (34160)'),
(269, 'Saint-Jean-de-Buèges (34380)'),
(270, 'Saint-Jean-de-Cornies (34160)'),
(271, 'Saint-Jean-de-Cuculles (34270)'),
(272, 'Saint-Jean-de-Fos (34150)'),
(273, 'Saint-Jean-de-la-Blaquière (34700)'),
(274, 'Saint-Jean-de-Minervois (34360)'),
(275, 'Saint-Jean-de-Védas (34430)'),
(276, 'Saint-Julien (34390)'),
(277, 'Saint-Just (34400)'),
(278, 'Saint-Martin-de-l\'Arçon (34390)'),
(279, 'Saint-Martin-de-Londres (34380)'),
(280, 'Saint-Mathieu-de-Tréviers (34270)'),
(281, 'Saint-Maurice-Navacelles (34190)'),
(282, 'Saint-Michel (34520)'),
(283, 'Saint-Nazaire-de-Ladarez (34490)'),
(284, 'Saint-Nazaire-de-Pézan (34400)'),
(285, 'Saint-Pargoire (34230)'),
(286, 'Saint-Paul-et-Valmalle (34570)'),
(287, 'Saint-Pierre-de-la-Fage (34520)'),
(288, 'Saint-Pons-de-Mauchiens (34230)'),
(289, 'Saint-Pons-de-Thomières (34220)'),
(290, 'Saint-Privat (34700)'),
(291, 'Saint-Saturnin-de-Lucian (34725)'),
(292, 'Saint-Sériès (34400)'),
(293, 'Saint-Thibéry (34630)'),
(294, 'Saint-Vincent-d\'Olargues (34390)'),
(295, 'Saint-Vincent-de-Barbeyrargues (34730)'),
(296, 'Sainte-Croix-de-Quintillargues (34270)'),
(297, 'Salasc (34800)'),
(298, 'Saturargues (34400)'),
(299, 'Saussan (34570)'),
(300, 'Saussines (34160)'),
(301, 'Sauteyrargues (34270)'),
(302, 'Sauvian (34410)'),
(303, 'Sérignan (34410)'),
(304, 'Servian (34290)'),
(305, 'Sète (34200)'),
(306, 'Siran (34210)'),
(307, 'Sorbs (34520)'),
(308, 'Soubès (34700)'),
(309, 'Soumont (34700)'),
(310, 'Sussargues (34160)'),
(311, 'Taussac-la-Billière (34600)'),
(312, 'Teyran (34820)'),
(313, 'Thézan-lès-Béziers (34490)'),
(314, 'Tourbes (34120)'),
(315, 'Tressan (34230)'),
(316, 'Usclas-d\'Hérault (34230)'),
(317, 'Usclas-du-Bosc (34700)'),
(318, 'Vacquières (34270)'),
(319, 'Vailhan (34320)'),
(320, 'Vailhauquès (34570)'),
(321, 'Valergues (34130)'),
(322, 'Valflaunès (34270)'),
(323, 'Valmascle (34800)'),
(324, 'Valras-Plage (34350)'),
(325, 'Valros (34290)'),
(326, 'Vélieux (34220)'),
(327, 'Vendargues (34740)'),
(328, 'Vendémian (34230)'),
(329, 'Vendres (34350)'),
(330, 'Vérargues (34400)'),
(331, 'Verreries-de-Moussans (34220)'),
(332, 'Vias (34450)'),
(333, 'Vic-la-Gardiole (34110)'),
(334, 'Vieussan (34390)'),
(335, 'Villemagne-l\'Argentière (34600)'),
(336, 'Villeneuve-lès-Béziers (34420)'),
(337, 'Villeneuve-lès-Maguelone (34750)'),
(338, 'Villeneuvette (34800)'),
(339, 'Villespassans (34360)'),
(340, 'Villetelle (34400)'),
(341, 'Villeveyrac (34560)'),
(342, 'Viols-en-Laval (34380)'),
(343, 'Viols-le-Fort (34380)');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achete`
--
ALTER TABLE `achete`
  ADD CONSTRAINT `Achete_Telephone_FK` FOREIGN KEY (`idprod`) REFERENCES `telephone` (`idprod`),
  ADD CONSTRAINT `Achete_Utilisateur0_FK` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);

--
-- Contraintes pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD CONSTRAINT `Telephone_Marque1_FK` FOREIGN KEY (`idmarque`) REFERENCES `marque` (`idmarque`),
  ADD CONSTRAINT `Telephone_Type_FK` FOREIGN KEY (`idtype`) REFERENCES `typetel` (`idtype`),
  ADD CONSTRAINT `Telephone_Utilisateur0_FK` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Utilisateur_Ville_FK` FOREIGN KEY (`idville`) REFERENCES `ville` (`idville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
