-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 10 Mars 2014 à 18:56
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `saul`
--

-- --------------------------------------------------------

--
-- Structure de la table `champs`
--

CREATE TABLE IF NOT EXISTS `champs` (
  `ID_CHAMPS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CERFA` varchar(40) NOT NULL,
  `LIBELLE` varchar(40) DEFAULT NULL,
  `TYPE` varchar(40) DEFAULT NULL,
  `MDEBUT` varchar(40) DEFAULT NULL,
  `MDEFIN` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID_CHAMPS`),
  KEY `FK_A` (`ID_CERFA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `champs`
--

INSERT INTO `champs` (`ID_CHAMPS`, `ID_CERFA`, `LIBELLE`, `TYPE`, `MDEBUT`, `MDEFIN`) VALUES
(1, '4748', 'NOM D''USAGE', 'TEXT', '            d''usage', 'Ne(e)'),
(2, '4748', 'DATE DE NAISSANCE ET VILLE', 'Date', 'le:', 'Nationalité'),
(3, '4748', 'NOM DU PERE', 'TEXT', '            père', 'Nom'),
(4, '4748', 'NOM DE LA MERE', 'INT', '  Nom   et  prénom   de    la      mere ', 'Prestations'),
(5, '4748', 'ADRESSE', 'INT', 'adresse', 'Date'),
(6, '4748', 'DATE D''ENTRE AU LOGEMENT', 'TEXT', 'logement', 'Vos'),
(7, '4748', 'Mail', 'TEXT', '         Mél ', 'Portable'),
(8, '4748', 'TITULAIRE COMPTE BANCAIRE', 'TEXT', '          Titulaire    du compte', 'IBAN'),
(9, '4748', 'IBAN DU TITULAIRE', 'TEXT', 'IBAN', 'BIC');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `champs`
--
ALTER TABLE `champs`
  ADD CONSTRAINT `FK_A` FOREIGN KEY (`ID_CERFA`) REFERENCES `modele` (`ID_CERFA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
