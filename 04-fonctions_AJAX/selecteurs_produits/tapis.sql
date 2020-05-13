-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Mars 2019 à 10:41
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `diw3_tapispointcom`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(4) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `forme` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `matiere`, `couleur`, `forme`, `photo`) VALUES
(1, 'laine', 'blanc', 'rectangulaire', 'photo1.jpg'),
(2, 'laine', 'gris', 'rectangulaire', 'photo2.jpg'),
(3, 'laine', 'bleu', 'rectangulaire', 'photo3.jpg'),
(4, 'laine', 'blanc', 'rond', 'photo4.jpg'),
(5, 'laine', 'gris', 'rond', 'photo5.jpg'),
(6, 'laine', 'bleu', 'rond', 'photo6.jpg'),
(7, 'viscose', 'blanc', 'rectangulaire', 'photo1.jpg'),
(8, 'viscose', 'gris', 'rectangulaire', 'photo2.jpg'),
(9, 'viscose', 'bleu', 'rectangulaire', 'photo3.jpg'),
(10, 'viscose', 'blanc', 'rond', 'photo4.jpg'),
(11, 'viscose', 'gris', 'rond', 'photo5.jpg'),
(12, 'viscose', 'bleu', 'rond', 'photo6.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
