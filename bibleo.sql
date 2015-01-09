-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 17 Mars 2013 à 00:24
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bibleo`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL DEFAULT '1',
  `nom` varchar(50) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `desc` mediumtext CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `tags` varchar(250) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `img` varchar(15) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `nombre_visiteurs` int(11) NOT NULL DEFAULT '0',
  `date d'ajout` date NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id`, `nom`, `desc`, `tags`, `img`, `nombre_visiteurs`, `date d'ajout`, `available`) VALUES
(1, 'Programmer en Java', 'la 3eme edition de Programmer en Java du CLAUDE DELANNOY, un trés bon livre pour bien comprendre java avec des exemples', 'programmation,java,CLAUDE DELANNOY', 'img.jpg', 189, '2013-03-14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL DEFAULT '1',
  `utilisateur` int(11) NOT NULL,
  `livre` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `date_remise` date NOT NULL,
  `book_back` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id`, `utilisateur`, `livre`, `date_reservation`, `date_remise`, `book_back`) VALUES
(1, 5, 1, '2013-03-16', '2013-03-14', 1),
(2, 5, 1, '2013-03-16', '2013-03-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL DEFAULT '1',
  `user` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `CIN` varchar(15) NOT NULL,
  `date_inscr` date NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CIN` (`CIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `user`, `pass`, `CIN`, `date_inscr`, `isAdmin`) VALUES
(1, 'admin', 'admin_pass', 'SDFSD', '2013-03-12', 1),
(2, 'admin', 'ad', 'sfsdf', '2013-03-12', 0),
(3, 'admin3', 'admin', 'sdfsd234f', '2013-03-14', 0),
(5, 'user_SDFSDF', 'pass_SDFSDF', 'SDFSDF', '2013-03-16', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
