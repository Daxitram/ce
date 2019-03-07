-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Mai 2018 à 11:58
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `centre_equestre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cavalier`
--

CREATE TABLE IF NOT EXISTS `cavalier` (
  `numCavalier` int(11) NOT NULL AUTO_INCREMENT,
  `nomCavalier` varchar(50) NOT NULL,
  `prenomCavalier` varchar(50) NOT NULL,
  `optionReprise` varchar(10) DEFAULT NULL,
  `nbTickets` int(11) NOT NULL,
  `codeTypeMonture` char(1) NOT NULL,
  PRIMARY KEY (`numCavalier`),
  KEY `codeTypeMonture` (`codeTypeMonture`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cavalier`
--

INSERT INTO `cavalier` (`numCavalier`, `nomCavalier`, `prenomCavalier`, `optionReprise`, `nbTickets`, `codeTypeMonture`) VALUES
(1, 'DUPONT', 'Henri', NULL, 0, 'C'),
(2, 'DURAND', 'Richard', 'Forfait', 0, 'C'),
(3, 'MARTIN', 'Elsa', 'Ticket', 10, 'C'),
(4, 'ALBERT', 'Francis', 'Forfait', 0, 'P');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE IF NOT EXISTS `connexion` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `numMoniteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `numMoniteur` (`numMoniteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connexion`
--

INSERT INTO `connexion` (`login`, `mdp`, `numMoniteur`) VALUES
('admin', 'admin', NULL),
('bourgeois', 'bourgeois', 1),
('pasqualini', 'pasqualini', 2),
('techer', 'techer', 3),
('bogusz', 'bogusz', 4);

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE IF NOT EXISTS `moniteur` (
  `numMoniteur` int(11) NOT NULL AUTO_INCREMENT,
  `nomMoniteur` varchar(50) NOT NULL,
  `prenomMoniteur` varchar(50) NOT NULL,
  PRIMARY KEY (`numMoniteur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `moniteur`
--

INSERT INTO `moniteur` (`numMoniteur`, `nomMoniteur`, `prenomMoniteur`) VALUES
(1, 'BOURGEOIS', 'Agnès'),
(2, 'PASQUALINI', 'Claude'),
(3, 'TECHER', 'Charles'),
(4, 'BOGUSZ', 'Thierry');

-- --------------------------------------------------------

--
-- Structure de la table `monture`
--

CREATE TABLE IF NOT EXISTS `monture` (
  `numMonture` int(11) NOT NULL AUTO_INCREMENT,
  `nomMonture` varchar(50) NOT NULL,
  `sexe` char(1) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `race` varchar(30) NOT NULL,
  `robe` varchar(30) NOT NULL,
  `photoMonture` varchar(50) NOT NULL,
  `codeTypeMonture` char(1) NOT NULL,
  `numCavalier` int(11) DEFAULT NULL,
  PRIMARY KEY (`numMonture`),
  KEY `numCavalier` (`numCavalier`),
  KEY `codeTypeMonture` (`codeTypeMonture`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `monture`
--

INSERT INTO `monture` (`numMonture`, `nomMonture`, `sexe`, `poids`, `taille`, `race`, `robe`, `photoMonture`, `codeTypeMonture`, `numCavalier`) VALUES
(1, 'CACAHUETE', 'F', 800, 125, 'Fjord', 'Autre', 'cacahuete.jpg', 'P', 1),
(2, 'BISCOTTE', 'F', 800, 150, 'Falabella', 'Alezan', 'biscotte.jpg', 'P', 1),
(3, 'CONFETTI', 'M', 900, 170, 'Frison', 'Noir', 'confetti.jpg', 'C', NULL),
(4, 'CAROTTE', 'F', 200, 250, 'pur sang', 'Bai', 'cacahuete.jpg', 'C', 1),
(5, 'BILOUTE', 'F', 306, 255, 'Percheron', 'Alezan', 'cacahuete.jpg', 'C', 0),
(7, 'Ã§Ã©Ã¨Ã ', 'F', 155, 888, 'pur', 'Bai', 'biscote.jpg', 'C', 4);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `numPlanning` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(10) NOT NULL,
  `heure` time NOT NULL,
  `codeTypeReprise` varchar(3) NOT NULL,
  PRIMARY KEY (`numPlanning`),
  KEY `codeTypeReprise` (`codeTypeReprise`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `planning`
--

INSERT INTO `planning` (`numPlanning`, `jour`, `heure`, `codeTypeReprise`) VALUES
(1, 'Lundi', '17:45:00', 'G23'),
(2, 'Lundi', '18:45:00', 'G45'),
(3, 'Lundi', '19:45:00', 'G67'),
(4, 'Mardi', '17:45:00', 'G12'),
(5, 'Mardi', '18:45:00', 'G34'),
(6, 'Mardi', '19:45:00', 'G67'),
(7, 'Mercredi', '13:45:00', 'G34'),
(8, 'Mercredi', '14:45:00', 'G56'),
(9, 'Mercredi', '16:45:00', 'G45'),
(10, 'Mercredi', '17:45:00', 'G12'),
(11, 'Mercredi', '18:45:00', 'G56'),
(12, 'Mercredi', '19:45:00', 'G67'),
(13, 'Jeudi', '18:30:00', 'G45'),
(14, 'Jeudi', '19:30:00', 'G56'),
(15, 'Vendredi', '17:45:00', 'G12'),
(16, 'Vendredi', '18:45:00', 'G34'),
(17, 'Samedi', '09:00:00', 'G45'),
(18, 'Samedi', '10:00:00', 'G67'),
(19, 'Samedi', '11:00:00', 'G34'),
(20, 'Samedi', '14:00:00', 'G23'),
(21, 'Samedi', '15:00:00', 'G56'),
(22, 'Samedi', '16:00:00', 'G12'),
(23, 'Samedi', '17:00:00', 'G67'),
(24, 'Samedi', '18:00:00', 'G56'),
(25, 'Dimanche', '10:00:00', 'G23'),
(26, 'Dimanche', '11:00:00', 'G34'),
(27, 'Mercredi', '13:30:00', 'C2'),
(28, 'Mercredi', '14:30:00', 'D2'),
(29, 'Mercredi', '15:30:00', 'BP'),
(30, 'Mercredi', '16:30:00', 'D1'),
(31, 'Mercredi', '17:30:00', 'C1'),
(32, 'Samedi', '09:00:00', 'D2'),
(33, 'Samedi', '10:00:00', 'C2'),
(34, 'Samedi', '11:00:00', 'D1'),
(35, 'Samedi', '14:00:00', 'D1'),
(36, 'Samedi', '15:00:00', 'C1'),
(37, 'Samedi', '16:00:00', 'BP'),
(38, 'Samedi', '17:00:00', 'D2');

-- --------------------------------------------------------

--
-- Structure de la table `type_monture`
--

CREATE TABLE IF NOT EXISTS `type_monture` (
  `codeTypeMonture` char(1) NOT NULL,
  `libTypeMonture` varchar(10) NOT NULL,
  PRIMARY KEY (`codeTypeMonture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_monture`
--

INSERT INTO `type_monture` (`codeTypeMonture`, `libTypeMonture`) VALUES
('P', 'Poney'),
('C', 'Cheval');

-- --------------------------------------------------------

--
-- Structure de la table `type_reprise`
--

CREATE TABLE IF NOT EXISTS `type_reprise` (
  `codeTypeReprise` varchar(3) NOT NULL,
  `libTypeReprise` varchar(30) NOT NULL,
  `numMoniteur` int(11) NOT NULL AUTO_INCREMENT,
  `codeTypeMonture` char(1) NOT NULL,
  PRIMARY KEY (`codeTypeReprise`),
  KEY `numMoniteur` (`numMoniteur`),
  KEY `codeTypeMonture` (`codeTypeMonture`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `type_reprise`
--

INSERT INTO `type_reprise` (`codeTypeReprise`, `libTypeReprise`, `numMoniteur`, `codeTypeMonture`) VALUES
('G12', 'Galop 1-2', 2, 'C'),
('G23', 'Galop 2-3', 3, 'C'),
('G34', 'Galop 3-4', 4, 'C'),
('G45', 'Galop 4-5', 4, 'c'),
('G56', 'Galop 5-6', 1, 'C'),
('G67', 'Galop 6-7', 1, 'C'),
('BP', 'Baby poney', 2, 'P'),
('D1', 'Débutants 1ère année', 2, 'P'),
('D2', 'Débutants 2ème année', 3, 'P'),
('C1', 'Confirmés 1ère année', 3, 'P'),
('C2', 'Confirmés 2ème année', 4, 'P');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
