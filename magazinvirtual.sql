-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2019 at 09:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazinvirtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
CREATE TABLE IF NOT EXISTS `clienti` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_username` text NOT NULL,
  `client_password` text NOT NULL,
  `client_email` text NOT NULL,
  `client_strada` text,
  `client_oras` text,
  `client_tara` text,
  `clinet_codpost` text,
  `client_nrcard` int(11) DEFAULT NULL,
  `client_tipcard` int(11) DEFAULT NULL,
  `client_dataexpcard` int(11) DEFAULT NULL,
  `acceptemail` int(11) DEFAULT NULL,
  `client_nume` text,
  `client_nnnregRC` text,
  `cod_fiscal` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`client_id`, `client_username`, `client_password`, `client_email`, `client_strada`, `client_oras`, `client_tara`, `clinet_codpost`, `client_nrcard`, `client_tipcard`, `client_dataexpcard`, `acceptemail`, `client_nume`, `client_nnnregRC`, `cod_fiscal`) VALUES
(3, 'Miodrag', '202cb962ac59075b964b07152d234b70', 'bilicimio@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Vasile', 'fcabcedae74a680e22e57fb8b7e452fb', 'vasile@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Ion', '31e6a7de72799d9cd2469a064d5f82bf', 'ion@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Ion', '31e6a7de72799d9cd2469a064d5f82bf', 'ion@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

DROP TABLE IF EXISTS `cos`;
CREATE TABLE IF NOT EXISTS `cos` (
  `cos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cos_clientID` int(11) NOT NULL,
  `cos_produsID` int(11) NOT NULL,
  `cos_cantitate` int(11) NOT NULL,
  PRIMARY KEY (`cos_id`),
  KEY `cos_produsID` (`cos_produsID`),
  KEY `cos_clientID` (`cos_clientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordin`
--

DROP TABLE IF EXISTS `ordin`;
CREATE TABLE IF NOT EXISTS `ordin` (
  `ordin_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordin_produsID` int(11) NOT NULL,
  `ordin_calitate` int(11) NOT NULL,
  `ordin_clientID` int(11) NOT NULL,
  `ordin_dataintrod` datetime NOT NULL,
  `ordin_stare` int(11) NOT NULL,
  `ordin_shipdate` datetime NOT NULL,
  PRIMARY KEY (`ordin_id`),
  KEY `ordin_produsID` (`ordin_produsID`),
  KEY `ordin_clientID` (`ordin_clientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parola`
--

DROP TABLE IF EXISTS `parola`;
CREATE TABLE IF NOT EXISTS `parola` (
  `user_id` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

DROP TABLE IF EXISTS `produse`;
CREATE TABLE IF NOT EXISTS `produse` (
  `produs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produs_nume` text NOT NULL,
  `produs_pret` double NOT NULL,
  `produs_imagine` text NOT NULL,
  `produs_categorie` text NOT NULL,
  `produs_descriere` text NOT NULL,
  `produs_descrierecompl` text NOT NULL,
  `produs_stare` int(11) DEFAULT NULL,
  `produs_oferta` int(11) DEFAULT NULL,
  `produs_noutati` int(11) DEFAULT NULL,
  PRIMARY KEY (`produs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`produs_id`, `produs_nume`, `produs_pret`, `produs_imagine`, `produs_categorie`, `produs_descriere`, `produs_descrierecompl`, `produs_stare`, `produs_oferta`, `produs_noutati`) VALUES
(1, 'Husa Samsung Galaxy S10+ Plus - SPIGEN Core Armor Black', 66, 'husa-samsung.jpg', 'Huse si carcase', 'Husa premium din gel TPU pentru Samsung Galaxy S10+ Plus.\r\nHusa este foarte subtire si usoara.\r\nCuloare: Negru', 'Husa premium din gel TPU pentru Samsung Galaxy S10+ Plus.\r\nHusa este foarte subtire si usoara.\r\nCuloare: Negru\r\nSe muleaza perfect si nu se deformeaza in timp.\r\nDecupaje precise\r\nPentru porturi si acoperire perfecta pentru butoane.', 0, 0, 0),
(2, 'Husa iPhone 11 Pro Max - SPIGEN Hybrid Crystal Clear', 70, 'husa-iphone11.jpg', 'Huse si carcase', 'Husa premium pentru iPhone 11 Pro Max cu spatele din policarbonat rigid si lucios si marginile din gel moale.\r\n\r\n\r\nHusa este foarte subtire si usoara.\r\n\r\n \r\n\r\nCuloare: Transparenta', 'Husa premium pentru iPhone 11 Pro Max cu spatele din policarbonat rigid si lucios si marginile din gel moale.\r\n\r\n\r\nHusa este foarte subtire si usoara.\r\n\r\n \r\n\r\nCuloare: Transparenta', NULL, NULL, NULL),
(3, 'Set 2 folii de protectie ecran Samsung Galaxy S10 Plus - SPIGEN Neo Flex Case Friendly', 75, 'folie-s10+.jpg', 'Folii de protectie', 'Folie de protectie ecran Spigen Neo Flex pentru Samsung Galaxy S10 Plus.\r\n\r\n\r\n', 'Folie de protectie ecran Spigen Neo Flex pentru Samsung Galaxy S10 Plus.\r\n\r\nFolia este flexibila, se muleaza pe margini si acopera aproape tot ecranul.\r\nEste compatibila cu majoritatea huselor.\r\n\r\nAplicarea se face cu telefonul deja in husa dumneavoastra pentru a putea centra folia cat mai bine.', NULL, NULL, NULL),
(4, 'Incarcator auto HOCO Z17 - Black', 39.2, 'incarcator-auto-hoco.jpg', 'Incarcatoare auto', 'Incarcator auto universal pentru telefoane si tablete.', 'Incarcator auto universal pentru telefoane si tablete.\r\n\r\nCompatibil atat cu telefoane Android cat si Apple.\r\n\r\nIesire: 5V/3.1A\r\n\r\nCablul: 1m\r\n\r\nCuloare: Negru', NULL, NULL, NULL),
(5, 'Incarcator auto - BASEUS 30W Dual Quick Charge / Fast Charge Black (CCALL-DS01)', 49.55, 'baseus-incarcator.jpg', 'Incarcatoare auto', 'Incarcator auto original BASEUS pentru telefoane si tablete cu Fast Charge / Quick Charge', 'Incarcator auto original BASEUS pentru telefoane si tablete cu Fast Charge / Quick Charge.\r\n\r\n \r\n\r\nAmbele porturi USB sunt Quick Charge.\r\n\r\nPot fi incarcate simultan 2 telefoane cu incarcare rapida.\r\n\r\n\r\nPoate fi conectat la incarcatoarele wireless.\r\n\r\nIesire: 4.5V/5A, 9V/3A,12V/2.5A(Max)\r\n\r\nCuloare: Negru', NULL, NULL, NULL),
(6, 'Incarcator retea Quick Charge Dual USB - Baseus 30W White', 69.05, 'incarcator-retea-baseus.jpg', 'Incarcatoare priza\r\n\r\n', 'Incarcator retea universal pentru telefoane si tablete.', 'Incarcator retea universal pentru telefoane si tablete.\r\n\r\n \r\n\r\nDispune de 2 porturi USB:\r\n\r\n \r\n\r\n-1 port USB:DC 5V/3A, 9V/3A, 12V/2.5A, 15V/2A, 20V/1.5A Max\r\n\r\n \r\n\r\n-1 port USB:DC 4.5V/5A, 5V/4.5A, 9V/3A, 12V/2.5A Max\r\n\r\nIesire: \r\nMaxim 5V/5A Max cu incarcare inteligenta pentru a nu strica bateria telefonului.\r\nInclude un circuit de protectie la suprasarcina sau supra-incalzire.\r\nCuloare:Alb', NULL, NULL, NULL),
(7, 'Incarcator retea - 5V 1A White', 24.99, 'incarcator-retea-5v.jpg', 'Incarcatoare retea', 'Incarcator retea universal pentru telefoane si tablete.', 'Incarcator retea universal pentru telefoane si tablete.\r\n\r\n\r\nIesire: 1A \r\n\r\n \r\n\r\nCuloare: Alb', NULL, NULL, NULL),
(8, 'Incarcator QI wireless (inductie) SPIGEN - Essential® F303W Fast Wireless (pana la 9W) White', 146.59, 'incarcator-wireless.jpg', 'Incarcatoare wireless', 'Incarcator prin inductie Fast Wireless pentru telefoane compatibile cu standardul QI.', 'Incarcator prin inductie Fast Wireless pentru telefoane compatibile cu standardul QI.\r\n\r\nIncarcare rapida a telefonului cu pana la 9W.\r\n\r\n \r\n\r\nAlimentare: USB Type C', NULL, NULL, NULL),
(9, 'Casti audio premium - BASEUS Encok H05 White', 65.48, 'casti-audio-premium.jpg', 'Casti audio', 'Casti audio Hi-Resolution aluminiu BASEUS compatibile cu smartphone-urile Apple si Android.', 'Casti audio Hi-Resolution aluminiu BASEUS compatibile cu smartphone-urile Apple si Android.\r\n\r\n \r\n\r\nCertificate Hi-Resolution de Japan Audio Society. ', NULL, NULL, NULL),
(10, 'Casti originale Apple - EarPods 3.5mm cu telecomanda', 157.45, 'casti-originale-apple.jpg', 'Casti audio', 'Casti originale Apple EarPods cu telecomanda incorporata si Jack 3.5mm.', 'Casti originale Apple EarPods cu telecomanda incorporata si Jack 3.5mm.\r\n\r\nCuloare: Alb\r\n\r\n', NULL, NULL, NULL),
(11, 'Boxa portabila Bluetooth - DIVOOM Airbeat-10 Albastra', 85.42, 'boxa-portabila1.jpg', 'Boxa portabila', 'Boxa externa portabila Bluetooth DIVOOM Airbeat 10.', 'Boxa externa portabila Bluetooth DIVOOM Airbeat 10.\r\n\r\n \r\n\r\nDifuzor din neodymium pentru un sunet clar si puternic.\r\n\r\n\r\nInclude ventuza si suport prindere pe bicicleta.', NULL, NULL, NULL),
(12, 'Boxa portabila Bluetooth - DIVOOM Bluetune Bean Albastra', 74.56, 'boxa-portabila2.jpg', 'Boxa portabila', 'Boxa externa portabila Bluetooth DIVOOM Bluetune Bean Albastru.', 'Difuzor din neodymium pentru un sunet clar si puternic.\r\n\r\n\r\nCarlig metalic pentru a putea fi agatat oriunde.', NULL, NULL, NULL),
(13, 'Baterie externa cu incarcare wireless 10.000 mAh 18 W - Baseus White', 131.99, 'baterie-externa1.jpg', 'Baterie externa', 'Baterie externa 10.000 mAh de la Baseus cu suport.', 'Baterie externa 10.000 mAh de la Baseus cu suport.\r\n\r\nSe pot incarca atat telefoane cat si tablete.\r\n\r\nCompatibila cu dispozitivele Apple si Android.\r\n\r\nDispune de 1 port USB, un port micro USB si un port Type C.\r\n\r\nIesiri: \r\n\r\nUSB-A DC 5V/2.4A 9V/2.0A 12V/1.5A Max\r\n\r\nIntrari:\r\n\r\nMicro DC 5V/2.0A 9V/2.0A 12V/1.5A Max\r\n\r\nType-C DC 5V/2.4A 9V/2.0A 12V/1.5A Max\r\n\r\nCapacitate: 10.000mAh\r\n\r\nCuloare: Alb', NULL, NULL, NULL),
(14, 'Cablu USB Type-C 5A - BASEUS Real Red', 30.95, 'cablu-usb-type-c.jpg', 'Cabluri', 'Cablu incarcare si transmisie date USB Type-C ce suporta pana la 5A.', 'Cablu incarcare si transmisie date USB Type-C ce suporta pana la 5A.\r\n\r\n \r\n\r\nCompatibil cu toate telefoanele cu incarcare rapida (Fast Charge / Quick Charge / Super Charge).\r\n\r\n \r\nCei 5A va folosesc pentru a utiliza functia SuperCharge a telefoanelor Huawei la maxim.\r\n\r\n \r\n\r\nCuloare: Rosu\r\n\r\nLungime: 1m', NULL, NULL, NULL),
(15, 'Stick memorie USB - MFI - NETAC U651 32 GB', 147.03, 'stick-memorie.jpg', 'stick', 'Stick memorie.\r\n\r\nVa permite sa conectati stick-ul la telefon pentru a transfera fisiere, filme si poze de pe calculator sau de pe un card MicroSD.', 'Stick memorie.\r\n\r\nVa permite sa conectati stick-ul la telefon pentru a transfera fisiere, filme si poze de pe calculator sau de pe un card MicroSD.\r\n\r\nDispozitibul este certificat Apple MFI.\r\n\r\nInterface: USB 3.0/Lightning 8Pin\r\nDimensiuni: 51.4 x 17.6 x 6.9mm\r\n\r\nCompatibil cu: iPhone, iPad, iPod, Desktop, Laptop \r\n\r\nCapacitate: 32GB', NULL, NULL, NULL),
(16, 'Card memorie 64 GB Micro SDHC (MicroSD) - NETAC Clasa 10 UHS-I3 V30 High Speed 4K', 59.52, 'card-memorie.jpg', 'Carduri de memorie', 'Card memorie Micro SD HC 64 GB de la NETAC recomandat pentru inregistrat si vizionat filme in format 4K.', 'Card memorie Micro SD HC 64 GB de la NETAC recomandat pentru inregistrat si vizionat filme in format 4K.\r\n\r\nViteza de scriere de pana la 40MB/s.\r\n\r\nViteza de citire de pana la 100MB/s.\r\n\r\nCapacitate: 64GB\r\n\r\nClasa de viteza: 10 UHS-I3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situatievizita`
--

DROP TABLE IF EXISTS `situatievizita`;
CREATE TABLE IF NOT EXISTS `situatievizita` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numepagvizit` text NOT NULL,
  `platforma` text NOT NULL,
  `referrer` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `host` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
