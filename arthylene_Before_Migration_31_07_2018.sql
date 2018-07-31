-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 31 Juillet 2018 à 17:06
-- Version du serveur :  5.5.59-0ubuntu0.14.04.1
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arthylene`
--

-- --------------------------------------------------------

--
-- Structure de la table `audio`
--

CREATE TABLE `audio` (
  `idAudio` int(11) NOT NULL,
  `audio` varchar(250) DEFAULT NULL,
  `chemin` varchar(250) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `audio`
--

INSERT INTO `audio` (`idAudio`, `audio`, `chemin`, `name`, `type`, `size`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'http://vps342611.ovh.net/Audio/1510262339EL_PLATANO.mp3', 'EL_PLATANO.mp3', 'audio/mp3', 8296759),
(4, NULL, 'http://vps342611.ovh.net/Audio/1510262244EL_TOMATE.mp3', 'EL_TOMATE.mp3', 'audio/mp3', 6905107),
(5, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `beneficeSante`
--

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
-- Contenu de la table `beneficeSante`
--

INSERT INTO `beneficeSante` (`idBeneficeSante`, `idProduit`, `benefice1`, `benefice2`, `benefice3`, `benefice4`, `benefice5`, `benefice6`) VALUES
(1, 0, '', '', '', '', '', ''),
(6, 2, 'sdvds', 'sdsvsdv', 'sdvsdsvsdv', 'dvsdvssd', 'dvsdvdvsvsd', 'sdvsdv'),
(3, 11, 'Contiene ácido oleico, una grasa monoinsaturada que puede ayudar a reducir el colesterol.\r\n', 'Ayuda a mantener el corazón saludable al mejorar la absorción de los carotenoides, beneficiosos en caso de enfermedad cardíaca.\r\n', 'Ayuda a prevenir el cáncer, ya que contiene fitonutrientes.\r\n', 'Alivia dolores reumáticos, articulares y musculares.\r\n', 'Ayuda a curar afecciones de la piel (eccemas, irritaciones, piel seca, etc.). Es suavizante, cicatrizante, elimina la caspa, fortalece y suaviza el cabello.\r\n', 'El aceite de aguacate posee propiedades antioxidantes. Su\r\nconsumo previene la aparición de\r\nestrías en las mujeres embarazadas.'),
(7, 25, 'sdfs', 'sdf', 'sdf', 'df', 'fsdf', 'd'),
(8, 0, '', '', '', '', '', ''),
(9, 0, '', '', '', '', '', ''),
(10, 0, '', '', '', '', '', ''),
(11, 0, '', '', '', '', '', ''),
(12, 0, '', '', '', '', '', ''),
(13, 0, '', '', '', '', '', ''),
(14, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.'),
(15, 38, 'Contiene gran cantidad de licopeno, un antioxidante muy eficaz contra los problemas del cáncer que causan los radicales libres.\r\n', 'Alto contenido en agua y muy bajo en calorías. \r\n', 'Contrarresta el efecto del tabaco.\r\n', 'Alto contenido en vitaminas, A, C y E.\r\n', 'Reduce el colesterol y protege el corazón: se ha demostrado que su consumo regular disminuye los niveles de colesterol.\r\n', 'También contiene: hierro, esencial para la sangre; potasio, vital en el mantenimiento de la salud del nervio.\r\n'),
(16, 44, 'Debido a su composición formada por almidón, azúcares y fibra, el plátano  tiene un efecto saciante considerable, lo que contribuye a controlar el apetito y el peso corporal.\r\n', 'El plátano estimula el crecimiento de bifidobacterias y lactobacilos presentes en el colon, lo que equilibra la flora intestinal.\r\n', 'Cabe destacar su alto contenido en vitaminas A, B1, B2, B6, C y E, así como en dos minerales fundamentales: potasio y magnesio.\r\n', '', '', ''),
(17, 45, 'Constituye una buena fuente de vitamina C y fibra, además de buenas cantidades de potasio, yodo y vitaminas A y B.\r\n', 'Previene muchas molestias digestivas e intestinales y podemos tomarla para ayudar a combatir catarros, alergias, reumatismo, hipertensión, colesterol alto\r\n', 'La piña ejerce un efecto saciante.\r\n', 'La piña es muy rica en hidratos de carbono de absorción lenta.\r\n', 'Contiene otros compuestos no nutritivos como y otras sustancias con poder antioxidante.\r\n', 'Aporta una considerable cantidad de vitaminas y minerales: tiamina (vitamina B1), vitamina B6, ácido fólico y magnesio');

-- --------------------------------------------------------

--
-- Structure de la table `cagette`
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
-- Structure de la table `caracteristique`
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
-- Contenu de la table `caracteristique`
--

INSERT INTO `caracteristique` (`idCaracteristique`, `idProduit`, `famille`, `espece`, `origine`, `forme`, `taillePoids`, `couleurTexture`, `saveur`, `principauxProducteurs`) VALUES
(22, 9, 'scv', 'ssdcv', 'svsd', 'sdv', 'svs', 'vds', 'sdv', 'sdv'),
(23, 11, 'Lauráceas', 'Persea americana', 'México, luego se difundió hasta las Antillas.\r\n', 'Con forma de pera, en su interior contiene una única semilla redondeada de color claro y 2-4 cm de longitud (salvo la variedad dátil), que aparece recubierta de una delgada capa leñosa de color marrón.\r\n', 'Aunque existen variedades desde los 100 g hasta los 2 kg, los que más se comercializan suelen medir 10-13 cm, con un peso de 150-350 g.\r\n', 'La corteza, gruesa y dura, con rugosidades, presenta una  coloración verde de distinta intensidad según la variedad. La pulpa es cremosa, aceitosa, de color verde crema, verde pálido o blanco amarillento, muy similar a la mantequilla.\r\n', 'El sabor de la pulpa recuerda al de la nuez y la avellana.\r\n', 'En España: Málaga, Granada y Canarias (sobre todo para autoconsumo insular).\r\nImportaciones: Perú, Chile y México.\r\n'),
(26, 2, 'ssefev', 'sdvsdv', 'sdvs', 'dvsdv', 'sdvs', 'sdvs', 'dvsd', 'vsdv'),
(27, 18, 'qef', 'qsf', 'sdfsdf', 'sdf', 'sdf', 'sfds', 'sffs', 'sdf'),
(28, 21, 'sdcvssdvsdv', 'vsdffffffvsdqs', 'vsvvsdvsdv', 'sdvssdv', 'vdvsdv', 'vsdvsdvsdv', 'sdvsdvsdv', 'dvsdv'),
(30, 37, 'azerty', 'azerty', 'azerty', 'azerty', 'azerty', 'azerty', 'azerty', 'azerty'),
(31, 39, 'Musáceas\r\n', 'Musa cavendishii\r\n', 'África, Asia y China.\r\n', '', 'Longitud: > 14 cm (la banana puede alcanzar hasta los 25 cm). Grosor: > 27 mm. El rango de pesos varía desde los 75 hasta los 200 g, y la media está establecida entre los 85 y los 150 g.\r\n', 'Exteriormente, el color del plátano varía según la maduración que presente: desde verde oliva (cuando está inmaduro), hasta amarillo intenso (maduro).  Durante el proceso de maduración, aparecen motitas de color marrón en la piel. Cuando el fruto está en su fase más avanzada de maduración, el color marrón cubre la práctica totalidad de la piel. \r\nLa presencia de heridas y rozaduras es habitual porque en los lugares de procedencia del plátano y la banana se dan fuertes rachas de viento en determinadas épocas del año, lo que afecta a las zonas de producción.\r\n', 'Dulce.\r\n', 'El denominado plátano hace referencia al fruto proveniente de las Islas Canarias (España). Los orígenes de la banana son diversos: África, Asia, América Central y América del Sur, islas del Caribe, etc.\r\n'),
(32, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.'),
(33, 38, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.'),
(34, 45, 'Bromeliaceae\r\n', 'Ananas comosus (L.) Merr.\r\n', 'Centro y Sudamérica, después se extendió por África y Asia.\r\n', 'Tiene forma ovoide compuesta por inflorescencias, con una corona en la parte superior.\r\n', 'Mide unos 30-40 cm incluyendo la corona. La parte comestible mide unos 15-25 cm. El peso varía desde 1,3 a 2,5 kg, incluida la corona. El peso más comercializable es de 1,4 a 2,1 kg.\r\nLa corona no debe representar más de la mitad de la altura total de la piña (o la misma altura que la parte comestible).\r\n', 'El color exterior varía desde el verde en los estadios de maduración baja hasta el amarillo cuando está madura.\r\nLa parte interior comestible es amarilla. Varía del blanco al amarillo dependiendo del grado de maduración. Puede presentar traslucencia (vitrescencia) en estadios altos de maduración.\r\nEs de textura fibrosa.\r\n', 'La pulpa es muy aromática y de sabor dulce.\r\n', 'Costa Rica, Brasil, Ecuador, Costa de Marfil, y para producto en conserva Asia (Filipinas). En España: las Islas Canarias, sobre todo para consumo insular.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `chariot`
--

CREATE TABLE `chariot` (
  `idChariot` int(11) NOT NULL,
  `ListeProduit` text NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `isChecked` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `isImportant` int(11) NOT NULL,
  `idPhoto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `checklist`
--

INSERT INTO `checklist` (`id`, `titre`, `contenu`, `isImportant`, `idPhoto`) VALUES
(1, 'Aguacate: Verificación requisitos de calidad', '1. Estar enteros. 2. Estar sanos. 3. Estar limpios. 4. Estar exentos de cualquier olor o sabor extraños. 5. Tener un pedúnculo inferior a 10 mm, cortado limpiamente, o no tenerlo.', 0, -1),
(2, 'Aguacate: Planograma hortalizas fin de semana', 'Mantenerlo alejado de productos con alta producción de etileno como: plátanos, manzanas, kiwis, etc. Mantenerlo lejos de cualquier fuente de humedad excesiva. ', 0, -1),
(3, 'Retirada de productos. Piñas', 'Daños en coronas, heridas, deshidratación en cuerpo. Con colores impropios y olores extraños.', 1, -1),
(4, 'Aprendizaje variedades Aguacate', 'Hass; Pinkerton; Bacon; Fuerte', 0, -1);

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

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
-- Contenu de la table `conseil`
--

INSERT INTO `conseil` (`idConseil`, `idProduit`, `conseil1`, `conseil2`, `conseil3`, `conseil4`, `conseil5`, `conseil6`) VALUES
(5, 2, 'dazd', 'azda', 'azd', 'zd', 'azd', 'az'),
(3, 11, 'Si está maduro el consumo debe ser inmediato, aunque puede mantenerse refrigerado hasta una semana. \r\nPara saber su punto de madurez basta con presionarlo y ver si cede.\r\n', 'Si está sin madurar puede guardarse en bolsas de papel y almacenarse a temperatura ambiente durante 3-5 días. Para acelerar la maduración, guardar con un plátano o una manzana (1-3 días).\r\n', 'Para abrirlo, cortarlo longitudinalmente hasta el hueso, dándole la vuelta completa al fruto. Girar las mitades en sentido contrario hasta que se desprenda el hueso de una de ellas.\r\n', 'Debe abrirse justo antes de su consumo, ya que la pulpa se ennegrece con rapidez. Puede evitarse con unas gotas de limón o lima.\r\n', 'Se aconseja no cocerlo, ya que se vuelve amargo, aunque sí se puede calentar.\r\n', 'La sal debe añadirse en el mismo momento de comerlo, pues la pulpa se oscurece si se pone con anticipación.\r\n'),
(6, 25, 'qsc', 'qsc', 'cqsc', 'qs', 'qsc', 'qs'),
(7, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.'),
(8, 38, 'Especialmente indicado para ensaladas.\r\n', '', '', '', '', ''),
(9, 39, 'Los plátanos son muy dulces, por lo que suelen consumirse frescos como postre, en ensaladas, batidos, etc.\r\n', 'También se comen fritos, caramelizados, en compota y como ingrediente de infinidad de postres.\r\n', '', '', '', ''),
(10, 45, 'Para su consumo en fresco, se recomienda cortarla longitudinalmente como un melón, ya que la zona de la base es más dulce que la que está próxima a la corona.\r\n', 'Tirar con suavidad de las hojas interiores de su plantón. Si se desprenden con facilidad, está en su estado de maduración perfecto.\r\n', 'La piña baby se puede vaciar y utilizar como recipiente para platos dulces (macedonias, helados…) o salados (verduras con marisco o carne).\r\n', 'Elegir una piña que sea uniforme en su aspecto exterior y que tenga un plantón verde y fresco, de tono dorado.\r\n', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `idPhoto` int(11) DEFAULT NULL,
  `textePopup` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`idEtat`, `idProduit`, `contenu`, `idPhoto`, `textePopup`) VALUES
(1, 5, '', 1, ''),
(2, 6, '', 1, ''),
(3, 7, '', 1, ''),
(4, 15, '', 1, ''),
(5, 16, '', 1, ''),
(6, 17, '', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `etiquette`
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
-- Contenu de la table `etiquette`
--

INSERT INTO `etiquette` (`idEtiquette`, `code`, `idCagette`, `idPhoto`, `nomProduit`, `varieteProduit`, `ordreEte`, `ordreAutomne`, `ordreHiver`, `ordrePrintemps`, `nombreDeCouche`, `maturiteMin`, `maturiteMax`, `emplacementChariot`) VALUES
(1, 'svsvs', NULL, NULL, 'Zefzsvg', 'Sdv', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `marketing`
--

CREATE TABLE `marketing` (
  `idMarketing` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `marketing1` longtext,
  `marketing2` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marketing`
--

INSERT INTO `marketing` (`idMarketing`, `idProduit`, `marketing1`, `marketing2`) VALUES
(10, 2, 'sdfze', 'gfzegze'),
(7, 11, 'RECOMENDADO\r\nExhibir el producto fuera del área de frío para promover su maduración natural.\r\nExhibir el producto en las mismas cajas en que viene envasado.\r\nColocar el producto manualmente, para no dañarlo. Así puede separarse por grado de madurez.\r\nExhibir junto a productos que contrasten con su color como cebollas blancas, pimientos (rojos y amarillos) y tomates.\r\n\r\n', 'NO RECOMENDADO\r\nColocar más de 4 capas, para minimizar los daños por compresión, que son más graves cuando el producto ya está maduro.\r\nMezclar cajas y producto a granel en el mueble\r\nVolcar las cajas directamente en el mueble, porque se causarían daños irreversibles.\r\nEl producto maduro siempre debe ir al frente del expositor, nunca debajo, para evitar mermas y facilitar la rotación.\r\n'),
(11, 25, 'sdf', 'sdf'),
(12, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut turpis est. Mauris maximus libero vel velit faucibus ornare. Nam ornare lacus tincidunt molestie ornare.'),
(13, 38, 'RECOMENDADO\r\nExhibir el producto a granel en las mismas cajas en que está envasado. Sacar las barquetas de las cajas y colocarlas en el lineal.\r\nExhibir junto a productos que contrasten con su color.\r\nTener una buena rotación del producto en tienda, siempre que sea posible, y colocar el producto más nuevo en la parte posterior para evitar mermas.\r\n', 'NO RECOMENDADO\r\nVolcar cajas a granel directamente sobre el mueble, esto daría lugar a daños físicos y futuras podredumbres.\r\nMezclar cajas y producto a granel en el mueble.\r\nEsconder el producto más antiguo bajo el expositor.\r\n'),
(14, 44, 'EXHIBICION\r\nColocar alejado de frutos que desprendan etileno en su maduración, ya que esto podría acelerar el cambio de color y la pérdida de firmeza.\r\n', 'ALMACENAJE EN TIENDA\r\nEl plátano y la banana deben madurar por acción del etileno, a temperatura y humedad adecuadas para poder ser consumidos.\r\nAlgunas producciones llegan inmaduras desde el origen.\r\n'),
(15, 45, 'EXHIBICIÓN DEL PRODUCTO\r\nEntero o partido, según proceda.\r\nNo amontonar más de dos alturas, preferiblemente una y de pie. Proteger las coronas.\r\nAdemás de posición fija, colocarlas junto a otros productos para que llamen la atención.\r\n', 'ALMACENAJE Y CONSERVACIÓN\r\nProducto climatérico, que madura después de la cosecha exponiéndolo a temperatura adecuada y a una atmósfera de etileno (la maduración no se nota exteriormente pero sí en el interior).\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `maturite`
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
-- Contenu de la table `maturite`
--

INSERT INTO `maturite` (`idMaturite`, `idProduit`, `contenu`, `idPhoto`, `maturiteIdeale`, `textePopup`) VALUES
(1, 2, '', NULL, 0, ''),
(2, 3, '', NULL, 1, ''),
(3, 4, '', NULL, 0, ''),
(4, 12, '', NULL, 0, ''),
(5, 13, '', NULL, 0, ''),
(6, 14, '', NULL, 1, ''),
(18, 44, '', 1, 0, 'Retirar de la venta'),
(17, 43, '', NULL, 1, 'Mantener en venta'),
(16, 42, '', 1, 0, 'Mantener en venta');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `chemin` varchar(250) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `photo`, `chemin`, `name`, `type`, `size`) VALUES
(1, NULL, 'http://vps342611.ovh.net/Picture/1507054328peachV1.png', 'peachV1.png', 'image/png', 581189),
(2, NULL, 'http://vps342611.ovh.net/Picture/1507052450avocado.png', 'avocado.png', 'image/png', 169210),
(3, NULL, 'http://vps342611.ovh.net/Picture/1508273896bananaV4.png', 'bananaV4.png', 'image/png', 101218),
(4, NULL, 'http://vps342611.ovh.net/Picture/1507924822tomato.png', 'tomato.png', 'image/png', 232381),
(5, '', 'http://vps342611.ovh.net/Picture/1507924756bananaV4.png', 'bananaV4.png', 'image/png', 101218),
(6, '', 'http://vps342611.ovh.net/Picture/1508168583PIÑA.png', 'PIÑA.png', 'image/png', 189500);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `idPresentation` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `contenu` longtext NOT NULL,
  `idPhoto` int(11) DEFAULT NULL,
  `idAudio` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `presentation`
--

INSERT INTO `presentation` (`idPresentation`, `idProduit`, `contenu`, `idPhoto`, `idAudio`) VALUES
(1, 1, 'The peach (Prunus persica) is a deciduous tree native to the region of Northwest China between the Tarim Basin and the north slopes of the Kunlun Shan mountains, where it was first domesticated and cultivated. It bears an edible juicy fruit called a peach or a nectarine.', 1, 1),
(2, 8, 'Une pomme golden', NULL, NULL),
(3, 9, 'Une banane jaune', NULL, NULL),
(4, 10, 'Une fraise mon gars !!!', NULL, NULL),
(5, 11, 'Le mot « avocat » provient de l''espagnol aguacate, lui-même dérivé du mot de langue nahuatl ahuacatl qui signifie « testicule », par analogie à la forme de cet organe.', 2, 2),
(6, 18, 'Un produit test', NULL, NULL),
(7, 20, 'azerty', NULL, NULL),
(8, 29, 'dfbdfb', NULL, NULL),
(9, 30, 'dvs', NULL, NULL),
(10, 31, 'sdvsdv', NULL, NULL),
(11, 32, 'sdvsdv', NULL, NULL),
(12, 33, 'sdvsvdvs', NULL, NULL),
(13, 34, 'cdvfbgn', NULL, NULL),
(14, 35, 'qsvqsvqsv', NULL, NULL),
(15, 36, 'Eh eh', NULL, NULL),
(18, 40, 'The banana is an edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called plantains, in contrast to dessert bananas. The fruit is variable in size, color and firmness, but is usually elongated and curved, with soft flesh rich in starch covered with a rind which may be green, yellow, red, purple, or brown when ripe. ', 0, 0),
(16, 38, 'El tomate es una verdura de temporada', 4, 4),
(17, 39, 'Plátano', 3, 3),
(19, 41, 'The banana is an edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa.', 5, 5),
(20, 45, 'PINEAPPLE', 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
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
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `varieteProduit`, `niveauMaturite`, `idMaturite`, `niveauEtat`, `idEtat`, `idPresentation`, `idBeneficeSante`, `idCaracteristique`, `idConseil`, `idMarketing`) VALUES
(1, 'Peach', 'Nectarine', NULL, NULL, NULL, NULL, 1, 6, 26, 5, 10),
(2, 'Peach', 'Nectarine', 1, 1, NULL, NULL, 1, 6, 26, 5, 10),
(5, 'Peach', 'Nectarine', NULL, NULL, 1, 1, 1, 6, 26, 5, 10),
(6, 'Peach', 'Nectarine', NULL, NULL, 2, 2, 1, 6, 26, 5, 10),
(7, 'Peach', 'Nectarine', NULL, NULL, 3, 3, 1, 6, 26, 5, 10),
(11, 'AVOCADO', 'Alligator_pear', NULL, NULL, NULL, NULL, 5, 3, 23, 3, 7),
(12, 'AVOCADO', 'Alligator_pear', 1, 4, NULL, NULL, 5, 3, 23, 3, 7),
(13, 'AVOCADO', 'Alligator_pear', 2, 5, NULL, NULL, 5, 3, 23, 3, 7),
(14, 'AVOCADO', 'Alligator_pear', 3, 6, NULL, NULL, 5, 3, 23, 3, 7),
(15, 'AVOCADO', 'Alligator_pear', NULL, NULL, 1, 4, 5, 3, 23, 3, 7),
(16, 'AVOCADO', 'Alligator_pear', NULL, NULL, 2, 5, 5, 3, 23, 3, 7),
(17, 'AVOCADO', 'Alligator_pear', NULL, NULL, 3, 6, 5, 3, 23, 3, 7),
(45, 'PINEAPPLE', 'PINEAPPLE', NULL, NULL, NULL, NULL, 20, 17, 34, 10, 15),
(44, 'Banana', 'Plátano', 3, 18, NULL, NULL, 17, 16, 31, 9, 14),
(43, 'Banana', 'Plátano', 2, 17, NULL, NULL, 17, 16, 31, 9, 14),
(42, 'Banana', 'Plátano', 1, 16, NULL, NULL, 17, 16, 31, 9, 14),
(41, 'Banana_old', 'Sweet', NULL, NULL, NULL, NULL, 19, 14, 32, 7, 12),
(39, 'Banana', 'Plátano', NULL, NULL, NULL, NULL, 17, 16, 31, 9, 14),
(38, 'TOMATO', 'ENSALADA', NULL, NULL, NULL, NULL, 16, 15, 33, 8, 13);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `idRayon` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `CheckRayon` tinyint(1) NOT NULL,
  `Disposition` point NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`idAudio`);

--
-- Index pour la table `beneficeSante`
--
ALTER TABLE `beneficeSante`
  ADD PRIMARY KEY (`idBeneficeSante`);

--
-- Index pour la table `cagette`
--
ALTER TABLE `cagette`
  ADD PRIMARY KEY (`idCagette`);

--
-- Index pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  ADD PRIMARY KEY (`idCaracteristique`);

--
-- Index pour la table `chariot`
--
ALTER TABLE `chariot`
  ADD PRIMARY KEY (`idChariot`);

--
-- Index pour la table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conseil`
--
ALTER TABLE `conseil`
  ADD PRIMARY KEY (`idConseil`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`idEtat`);

--
-- Index pour la table `etiquette`
--
ALTER TABLE `etiquette`
  ADD PRIMARY KEY (`idEtiquette`);

--
-- Index pour la table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`idMarketing`);

--
-- Index pour la table `maturite`
--
ALTER TABLE `maturite`
  ADD PRIMARY KEY (`idMaturite`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`idPresentation`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `idProduit` (`idProduit`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`idRayon`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `audio`
--
ALTER TABLE `audio`
  MODIFY `idAudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `beneficeSante`
--
ALTER TABLE `beneficeSante`
  MODIFY `idBeneficeSante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `cagette`
--
ALTER TABLE `cagette`
  MODIFY `idCagette` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  MODIFY `idCaracteristique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `chariot`
--
ALTER TABLE `chariot`
  MODIFY `idChariot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `conseil`
--
ALTER TABLE `conseil`
  MODIFY `idConseil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `idEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `etiquette`
--
ALTER TABLE `etiquette`
  MODIFY `idEtiquette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `idMarketing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `maturite`
--
ALTER TABLE `maturite`
  MODIFY `idMaturite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `idPresentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `idRayon` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
