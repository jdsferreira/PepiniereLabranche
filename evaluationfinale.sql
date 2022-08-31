-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2022 at 08:02 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluationfinale`
--

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `PanierID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProduitID` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prix` double NOT NULL,
  `QteDisp` int(11) NOT NULL,
  KEY `PanierID` (`PanierID`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ProduitID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prix` double NOT NULL DEFAULT '0',
  `Quantite` int(11) NOT NULL DEFAULT '0',
  `Categorie` varchar(255) NOT NULL,
  `Descr` text NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Details` varchar(10000) NOT NULL,
  `NomDetaille` varchar(250) NOT NULL,
  KEY `ProduitID` (`ProduitID`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`ProduitID`, `Nom`, `Prix`, `Quantite`, `Categorie`, `Descr`, `Image`, `Details`, `NomDetaille`) VALUES
(1, 'Aster', 10.99, 100, 'fleurs', 'Petites fleurs blanches au cur rose qui aime les expositions au soleil à mi-ombre', 'images/asters.jpg', '<li><strong>Exposition </strong>: Soleil à Mi-ombre</li>\r\n			<li><strong>Hauteur </strong>: 95 centimètres</li>\r\n			<li><strong>Largeur </strong>: 60 centimètres</li>\r\n			<li><strong>Feuillage </strong>: Jeunes pousses sont pourpre et deviennent vert foncé avec l’âge.</li>\r\n			<li><strong>Fleurs </strong>: Jeunes pousses sont pourpre et deviennent vert foncé avec l’âge.</li>', 'Aster à fleurs latérales \"Lady in Black\"'),
(2, 'Betteraves', 3.99, 100, 'legumes', 'Betteraves du Québec', 'images/betteraves.jpg', '<li><strong>Exposition </strong>: Soleil</li>\r\n			<li><strong>Sol </strong>: profond, souple et léger, légèrement sablonneux, bien drainé et riche en matière organique.</li>\r\n			<li><strong>Entretien </strong>: Facile</li>\r\n			<li><strong>Besoin en eau </strong>: Moyen</li>', 'Betterave \"Cylindra Formanova\"'),
(3, 'Carottes', 5.99, 100, 'legumes', 'Carotte d\'Asie du Sud-Est', 'images/carottes.jpg', '<li><strong>Exposition </strong>: Soleil</li>\r\n			<li><strong>Sol </strong>: Sol sableux, Humus, Terreau</li>\r\n			<li><strong>Entretien </strong>: Facile</li>\r\n			<li><strong>Besoin en eau </strong>: Moyen</li>', 'Carotte \"Shin Kuroda\" Légumes d\'Asie'),
(4, 'Tomates', 2.99, 100, 'legumes', 'Tomates du Manitoba', 'images/tomates.jpg', '<li><strong>Exposition </strong>: Plein soleil</li>\r\n			<li><strong>Sol </strong>: Sol drainé et riche. Éviter les sols compacts et trop humides.</li>\r\n			<li><strong>Entretien </strong>: Facile</li>\r\n			<li><strong>Besoin en eau </strong>: Moyen</li>', 'Tomate \"Manitoba\"'),
(5, 'Zucchinis', 6.99, 100, 'legumes', 'Zucchini de l\'Italie de type hybride', 'images/zucchinis.jpg', '<li><strong>Exposition </strong>: Soleil</li>\r\n			<li><strong>Sol </strong>: Sol riche</li>\r\n			<li><strong>Entretien </strong>: Facile</li>\r\n			<li><strong>Besoin en eau </strong>: Moyen</li>', 'Zucchini Hybride \"Elite\"');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
