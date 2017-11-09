-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2017 at 01:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arthylene`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficeSante`
--

--Table pour la partie "Bénéfice sur la santé" de la fiche produit
--Table pas jolie, mais dans la fiche il s'agit d'un tableau en 2D ou le texte des paragraphes
--(1-2)-(3-4)-(5-6) sont lier mais nom pas d'index ou quelques choses pour les différentier
--Attention S majuscule très important
CREATE TABLE `beneficeSante` (
  `idBeneficeSante` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `benefice1` longtext,
  `benefice2` longtext,
  `benefice3` longtext,
  `benefice4` longtext,
  `benefice5` longtext,
  `benefice6` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficeSante`
--

INSERT INTO `beneficeSante` (`idBeneficeSante`, `idProduit`, `benefice1`, `benefice2`, `benefice3`, `benefice4`, `benefice5`, `benefice6`) VALUES
(6, 2, 'sdvds', 'sdsvsdv', 'sdvsdsvsdv', 'dvsdvssd', 'dvsdvdvsvsd', 'sdvsdv'),
(3, 11, 'Contient de l\'acide oléique, un gras\r\nmonoinsaturés qui peuvent aider\r\npour réduire le cholestérol.', 'Aide à maintenir le cœur sain en améliorant l\'absorption des caroténoïdes bénéfiques en cas de maladie cardiaque.', 'Aide à prévenir le cancer car contient des phytonutriments.', 'Soulage les douleurs rhumatismales,\r\njoint et muscles.', 'Aide à guérir les conditions cutanées\r\n(eczéma, irritations, peau sèche,\r\netc.). C\'est apaisant, guérissant,\r\nélimine les pellicules, renforce et\r\nadoucit les cheveux.', 'El aceite de aguacate posee propiedades antioxidantes. Su\r\nconsumo previene la aparición de\r\nestrías en las mujeres embarazadas.'),
(7, 25, 'sdfs', 'sdf', 'sdf', 'df', 'fsdf', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `cagette`
--

CREATE TABLE `cagette` (
  `idCagette` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `varieteProduit` varchar(50) NOT NULL,
  `idRayon` int(11) NOT NULL,
  `CheckEmplacement` tinyint(1) NOT NULL,
  `ChekcMaturité` tinyint(1) NOT NULL,
  `CheckEtat` tinyint(1) NOT NULL,
  `idChariot` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `caracteristique`
--

CREATE TABLE `caracteristique` (
  `idCaracteristique` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `famille` varchar(255) DEFAULT NULL,
  `espece` varchar(255) DEFAULT NULL,
  `origine` longtext,
  `forme` longtext,
  `taillePoids` longtext,
  `couleurTexture` longtext,
  `saveur` longtext,
  `principauxProducteurs` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caracteristique`
--

INSERT INTO `caracteristique` (`idCaracteristique`, `idProduit`, `famille`, `espece`, `origine`, `forme`, `taillePoids`, `couleurTexture`, `saveur`, `principauxProducteurs`) VALUES
(22, 9, 'scv', 'ssdcv', 'svsd', 'sdv', 'svs', 'vds', 'sdv', 'sdv'),
(23, 11, 'Lauráceas', 'Persea americana', 'Le Mexique, puis s\'est répandu dans les Antilles.', 'En forme de poire, à l\'intérieur il contient une graine unique arrondi en couleur claire et de 2 à 4 cm de longueur (sauf variété), qui est recouvert d\'une couche mince marron boisé.', 'Bien qu\'il existe des variétés de 100 g à 2 kg, ceux qui sont plus commercialisés mesurent habituellement 10-13 cm, avec un poids de 150 à 350 g.', 'La croûte, épaisse et dure, avec une rugosité, présente une couleur verte d\'une intensité différente selon la variété. Le la pulpe est crémeuse, huileuse, crème verte, verte blanc pâle ou jaunâtre, très semblable au beurre.', 'Le goût de la pulpe ressemble à celui du noix et de la noisette.', 'En Espagne: Malaga, Grenade et les îles Canaries (en particulier pour consommation insulaire). Importations: Pérou, Chili et Mexique.'),
(26, 2, 'ssefev', 'sdvsdv', 'sdvs', 'dvsdv', 'sdvs', 'sdvs', 'dvsd', 'vsdv'),
(27, 18, 'qef', 'qsf', 'sdfsdf', 'sdf', 'sdf', 'sfds', 'sffs', 'sdf'),
(28, 21, 'sdcvssdvsdv', 'vsdffffffvsdqs', 'vsvvsdvsdv', 'sdvssdv', 'vdvsdv', 'vsdvsdvsdv', 'sdvsdvsdv', 'dvsdv');

-- --------------------------------------------------------

--
-- Table structure for table `chariot`
--

CREATE TABLE `chariot` (
  `idChariot` int(11) NOT NULL,
  `ListeProduit` text NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `isChecked` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `isImportant` int(11) NOT NULL,
  `idPhoto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conseil`
--
--Table pour la partie "Conseil de cosommation" de la fiche produit
--Structure de la table pas propre est similaire à la table beneficeSante
CREATE TABLE `conseil` (
  `idConseil` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `conseil1` longtext,
  `conseil2` longtext,
  `conseil3` longtext,
  `conseil4` longtext,
  `conseil5` longtext,
  `conseil6` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conseil`
--

INSERT INTO `conseil` (`idConseil`, `idProduit`, `conseil1`, `conseil2`, `conseil3`, `conseil4`, `conseil5`, `conseil6`) VALUES
(5, 2, 'dazd', 'azda', 'azd', 'zd', 'azd', 'az'),
(3, 11, 'Si elle est mûre, la consommation devrait être immédiat, bien qu\'il puisse être maintenu réfrigéré jusqu\'à une semaine.', 'Si elle n\'est pas mature, elle peut être stockée dans sacs en papier et stockés à température ambiante pendant 3 à 5 jours. Pour accélérer la maturation, entreposer avec une banane ou une pomme (1-3 jours)', 'Si elle est mûre, la consommation devrait être immédiat, bien qu\'il puisse être maintenu réfrigéré jusqu\'à une semaine. Savoir que votre point de maturité est suffisant en le pressant et voir s\'il cède', 'Il devrait être ouvert juste avant la consommation, puisque la pulpe noircit rapidement. On peut l\'éviter avec quelques gouttes de citron ou dossier', 'Il est conseillé de ne pas le faire cuire à mesure qu\'il devient amer, bien qu\'il puisse être chauffé.', 'Le sel devrait être ajouté dans le même\r\nmoment de le manger, parce que la pulpe Il fait sombre si vous le mettez en avance.'),
(6, 25, 'qsc', 'qsc', 'cqsc', 'qs', 'qsc', 'qs');

-- --------------------------------------------------------

--
-- Table structure for table `etat`
--

CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `idPhoto` int(11) DEFAULT NULL,
  `textePopup` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etat`
--

INSERT INTO `etat` (`idEtat`, `idProduit`, `contenu`, `idPhoto`, `textePopup`) VALUES
(1, 5, '', 1, ''),
(2, 6, '', 1, ''),
(3, 7, '', 1, ''),
(4, 15, '', 1, ''),
(5, 16, '', 1, ''),
(6, 17, '', 1, ''),
(7, 28, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `etiquette`
--

CREATE TABLE `etiquette` (
  `idEtiquette` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `idCagette` int(11) DEFAULT NULL,
  `idPhoto` int(11) DEFAULT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `varieteProduit` varchar(50) NOT NULL,
  `ordreEte` tinyint(4) NOT NULL,
  `ordreAutomne` tinyint(4) NOT NULL,
  `ordreHiver` tinyint(4) NOT NULL,
  `ordrePrintemps` tinyint(4) NOT NULL,
  `nombreDeCouche` int(11) NOT NULL,
  `maturiteMin` int(11) NOT NULL,
  `maturiteMax` int(11) NOT NULL,
  `emplacementChariot` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etiquette`
--

INSERT INTO `etiquette` (`idEtiquette`, `code`, `idCagette`, `idPhoto`, `nomProduit`, `varieteProduit`, `ordreEte`, `ordreAutomne`, `ordreHiver`, `ordrePrintemps`, `nombreDeCouche`, `maturiteMin`, `maturiteMax`, `emplacementChariot`) VALUES
(1, 'svsvs', NULL, NULL, 'Zefzsvg', 'Sdv', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--
--Table pour la partie "Marketing" de la fiche produit
--Structure de la table similaire à la table "beneficeSante" mais les champ ici sont a déterminé.
--Car il s'agit d'une catégorie qui résume beaucoup de paragraphe de la fiche produit
CREATE TABLE `marketing` (
  `idMarketing` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `marketing1` longtext,
  `marketing2` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`idMarketing`, `idProduit`, `marketing1`, `marketing2`) VALUES
(10, 2, 'sdfze', 'gfzegze'),
(7, 11, 'Température supérieure à 3-7 ° C selon la variété et l\'humidité relative de 85 à 90%', 'L\'avocat mature (doux) nécessite une manipulation soignée pour minimiser les dommages physiciens.'),
(11, 25, 'sdf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `maturite`
--

CREATE TABLE `maturite` (
  `idMaturite` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `idPhoto` int(11) DEFAULT NULL,
  `maturiteIdeale` tinyint(1) DEFAULT NULL,
  `textePopup` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maturite`
--

INSERT INTO `maturite` (`idMaturite`, `idProduit`, `contenu`, `idPhoto`, `maturiteIdeale`, `textePopup`) VALUES
(1, 2, '', 1, 0, ''),
(2, 3, '', NULL, 1, ''),
(3, 4, '', 1, 0, ''),
(4, 12, '', 1, 0, ''),
(5, 13, '', 1, 0, ''),
(6, 14, '', 1, 1, ''),
(9, 22, 'sdvs', 1, 0, 'sdv'),
(8, 21, 'azerty', 1, 0, 'azerty'),
(10, 23, '', 1, 0, ''),
(11, 24, '', 1, 0, ''),
(12, 25, '', 1, 0, ''),
(13, 26, '', 1, 0, ''),
(14, 27, '', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `chemin` varchar(250) NOT NULL,
  `namePhoto` varchar(150) NOT NULL,
  `typePhoto` varchar(150) NOT NULL,
  `sizePhoto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `idPresentation` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `contenu` longtext NOT NULL,
  `idPhoto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`idPresentation`, `idProduit`, `contenu`, `idPhoto`) VALUES
(1, 1, 'The peach (Prunus persica) is a deciduous tree native to the region of Northwest China between the Tarim Basin and the north slopes of the Kunlun Shan mountains, where it was first domesticated and cultivated. It bears an edible juicy fruit called a peach or a nectarine.', 1),
(2, 8, 'Une pomme golden', 1),
(3, 9, 'Une banane jaune', 1),
(4, 10, 'Une fraise mon gars !!!', 1),
(5, 11, 'Le mot « avocat » provient de l\'espagnol aguacate, lui-même dérivé du mot de langue nahuatl ahuacatl qui signifie « testicule », par analogie à la forme de cet organe.', 1),
(6, 18, 'Un produit test', 1),
(7, 20, 'azerty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `varieteProduit` varchar(50) NOT NULL,
  `niveauMaturite` tinyint(4) DEFAULT NULL,
  `idMaturite` int(11) DEFAULT NULL,
  `niveauEtat` tinyint(4) DEFAULT NULL,
  `idEtat` int(11) DEFAULT NULL,
  `idPresentation` int(11) DEFAULT NULL,
  `idBeneficeSante` int(11) DEFAULT NULL,
  `idCaracteristique` int(11) DEFAULT NULL,
  `idConseil` int(11) DEFAULT NULL,
  `idMarketing` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `varieteProduit`, `niveauMaturite`, `idMaturite`, `niveauEtat`, `idEtat`, `idPresentation`, `idBeneficeSante`, `idCaracteristique`, `idConseil`, `idMarketing`) VALUES
(1, 'Peach', 'Nectarine', NULL, NULL, NULL, NULL, 1, 6, NULL, 5, 10),
(2, 'Peach', 'Nectarine', 1, 1, NULL, NULL, 1, 6, 26, 5, 10),
(21, 'Azerty', 'Azerty', 1, 8, NULL, NULL, 7, 7, 28, 6, 11),
(5, 'Peach', 'Nectarine', NULL, NULL, 1, 1, 1, 6, NULL, 5, 10),
(6, 'Peach', 'Nectarine', NULL, NULL, 2, 2, 1, 6, NULL, 5, 10),
(7, 'Peach', 'Nectarine', NULL, NULL, 3, 3, 1, 6, NULL, 5, 10),
(11, 'Avocado', 'Alligator_pear', NULL, NULL, NULL, NULL, 5, 3, 23, 3, 7),
(22, 'Azerty', 'Azerty', 2, 9, NULL, NULL, 7, 7, 28, 6, 11),
(12, 'Avocado', 'Alligator_pear', 1, 4, NULL, NULL, 5, 3, 23, 3, 7),
(13, 'Avocado', 'Alligator_pear', 2, 5, NULL, NULL, 5, 3, 23, 3, 7),
(14, 'Avocado', 'Alligator_pear', 3, 6, NULL, NULL, 5, 3, 23, 3, 7),
(15, 'Avocado', 'Alligator_pear', NULL, NULL, 1, 4, 5, 3, 23, 3, 7),
(16, 'Avocado', 'Alligator_pear', NULL, NULL, 2, 5, 5, 3, 23, 3, 7),
(17, 'Avocado', 'Alligator_pear', NULL, NULL, 3, 6, 5, 3, 23, 3, 7),
(20, 'Azerty', 'Azerty', NULL, NULL, NULL, NULL, 7, 7, 28, 6, 11),
(23, 'Azerty', 'Azerty', 3, 10, NULL, NULL, 7, 7, 28, 6, 11),
(24, 'Azerty', 'Azerty', 4, 11, NULL, NULL, 7, 7, 28, 6, 11),
(25, 'Azerty', 'Azerty', 16, 12, NULL, NULL, 7, 7, 28, 6, 11),
(26, 'Azerty', 'Azerty', 5, 13, NULL, NULL, 7, 7, 28, 6, 11),
(27, 'Azerty', 'Azerty', 23, 14, NULL, NULL, 7, 7, 28, 6, 11),
(28, 'Azerty', 'Azerty', NULL, NULL, 1, 7, 7, 7, 28, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `idRayon` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `CheckRayon` tinyint(1) NOT NULL,
  `Disposition` point NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficeSante`
--
ALTER TABLE `beneficeSante`
  ADD PRIMARY KEY (`idBeneficeSante`);

--
-- Indexes for table `cagette`
--
ALTER TABLE `cagette`
  ADD PRIMARY KEY (`idCagette`);

--
-- Indexes for table `caracteristique`
--
ALTER TABLE `caracteristique`
  ADD PRIMARY KEY (`idCaracteristique`);

--
-- Indexes for table `chariot`
--
ALTER TABLE `chariot`
  ADD PRIMARY KEY (`idChariot`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`idConseil`);

--
-- Indexes for table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`idEtat`);

--
-- Indexes for table `etiquette`
--
ALTER TABLE `etiquette`
  ADD PRIMARY KEY (`idEtiquette`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`idMarketing`);

--
-- Indexes for table `maturite`
--
ALTER TABLE `maturite`
  ADD PRIMARY KEY (`idMaturite`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`idPresentation`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `idProduit` (`idProduit`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`idRayon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficeSante`
--
ALTER TABLE `beneficeSante`
  MODIFY `idBeneficeSante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cagette`
--
ALTER TABLE `cagette`
  MODIFY `idCagette` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caracteristique`
--
ALTER TABLE `caracteristique`
  MODIFY `idCaracteristique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `chariot`
--
ALTER TABLE `chariot`
  MODIFY `idChariot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conseil`
--
ALTER TABLE `conseil`
  MODIFY `idConseil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `etat`
--
ALTER TABLE `etat`
  MODIFY `idEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `etiquette`
--
ALTER TABLE `etiquette`
  MODIFY `idEtiquette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `idMarketing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `maturite`
--
ALTER TABLE `maturite`
  MODIFY `idMaturite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `idPresentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `idRayon` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
