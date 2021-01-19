-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 déc. 2020 à 02:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pepiniere`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `qttePanier` int(11) NOT NULL,
  PRIMARY KEY (`idPanier`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `idProduit`, `qttePanier`) VALUES
(106, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(255) NOT NULL,
  `descriptionProduit` text NOT NULL,
  `prixProduit` decimal(4,0) NOT NULL,
  `stockProduit` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descriptionProduit`, `prixProduit`, `stockProduit`) VALUES
(1, 'Abies grandis ‘Van Dedem\'s Dwarf’', 'Forme buissonnante miniature.Rustique.A planter en sol légèrement acide dans les rocailles terrasses et bacs. Atteint 15cm en 10ans. Adulte:30cm', '40', 8),
(2, 'Abies koreana ‘Kohout s Ice Breaker’', 'Forme boule miniature. Ses Aiguilles enroulées dévoilent la face argentée et lui donne une luminosité exceptionnelle. Pour bac et rocaille. Atteint 0,15 x 0,40 en 10 ans.', '60', 20),
(3, 'Abies procera ‘Procumbens’ Saboulimen prairis', 'Forme de coussin aplati, compact et dense.  Les aiguilles sont d\'un magnifique bleu-argenté très lumineux. Rustique, à planter au soleil ou mi-ombre. De croissance lente, il sera parfait en rocaille ou en bac. Atteint 60/80 cm en 10 ans.', '50', 20),
(4, 'Chamaecyparis obtusa ‘Chabo-yadori’', 'Chamaecyparis obtusa \'Chabo-yadori\' est un petit arbuste à croissance lente. Son port est conique arrondie avec un feuillage vert mélangeant pousses juvéniles et adultes. Convient pour rocaille,terrasse et bac. Atteint 0,60 m en 10 ans.', '25', 20),
(5, 'Chamaecyparis obtusa ‘Chima-anihiba’', 'Chamaecyparis obtusa \'Chima-anihiba\' est un arbuste de forme buissonnante au feuillage doré qui vire au bronze en hiver. Convient pour rocailles, terrasses et bacs. Atteint 0,50 m en 10 ans.', '30', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
