-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 mai 2018 à 09:15
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecebond`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `idalbum` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(20) NOT NULL,
  `photos` text,
  `titre` varchar(30) NOT NULL,
  PRIMARY KEY (`idalbum`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`idalbum`, `iduser`, `photos`, `titre`) VALUES
(1, 'ab191382', 'chemin de la photo a mettre', 'Vacances 2018'),
(2, 'od191654', NULL, 'Bangor');

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `id_du_post` int(11) NOT NULL,
  `id_personne` varchar(20) NOT NULL,
  `moment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `txt` text NOT NULL,
  PRIMARY KEY (`id_du_post`,`id_personne`),
  KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE IF NOT EXISTS `discussion` (
  `id_discus` int(11) NOT NULL AUTO_INCREMENT,
  `emetteur` varchar(20) NOT NULL,
  `recepteur` varchar(20) NOT NULL,
  PRIMARY KEY (`id_discus`),
  KEY `emmetteur` (`emetteur`),
  KEY `recepteur` (`recepteur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `discussion`
--

INSERT INTO `discussion` (`id_discus`, `emetteur`, `recepteur`) VALUES
(3, 'ef141352', 'od191654'),
(5, 'ab191382', 'cl181647'),
(6, 'ad', 'ef141352'),
(7, 'cl181647', 'od191654'),
(8, 'od191654', 'ad');

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `domaine` varchar(20) NOT NULL,
  `contrat` varchar(10) NOT NULL,
  `description` text,
  `id_utilisateur` varchar(20) NOT NULL,
  `moment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_emploi`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id_emploi`, `domaine`, `contrat`, `description`, `id_utilisateur`, `moment`) VALUES
(1, 'finance', 'stage', 'Proposition de faire un stage en banque de 3 mois.', 'od191654', '2018-05-03 08:54:33');

-- --------------------------------------------------------

--
-- Structure de la table `liker`
--

DROP TABLE IF EXISTS `liker`;
CREATE TABLE IF NOT EXISTS `liker` (
  `id_post` int(11) NOT NULL,
  `id_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`id_post`,`id_utilisateur`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_discussion` int(11) NOT NULL,
  `id_emetteur` varchar(20) NOT NULL,
  `moment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `textemessage` text,
  PRIMARY KEY (`id_message`),
  KEY `id_discussion` (`id_discussion`),
  KEY `id_emetteur` (`id_emetteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_discussion`, `id_emetteur`, `moment`, `textemessage`) VALUES
(1, 3, 'ad', '2018-05-04 09:13:39', NULL),
(2, 6, 'cl181647', '2018-05-04 09:13:39', 'coucou, comment vas tu ????'),
(3, 8, 'ab191382', '2018-05-04 09:14:56', 'alors on se voit ou et quand ?'),
(4, 8, 'od191654', '2018-05-04 09:14:56', 'a 8h à l\'ecole E2 - 316\r\na +'),
(5, 3, 'ad', '2018-05-04 09:01:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `partager`
--

DROP TABLE IF EXISTS `partager`;
CREATE TABLE IF NOT EXISTS `partager` (
  `id_p` int(11) NOT NULL,
  `id_u` varchar(20) NOT NULL,
  `date_heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_partage` text,
  PRIMARY KEY (`id_p`,`id_u`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `log_utilisateur` varchar(20) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `commentaire` text,
  `lieu` varchar(30) DEFAULT NULL,
  `humeur` varchar(25) DEFAULT NULL,
  `activite` varchar(45) DEFAULT NULL,
  `visibilite` int(3) NOT NULL,
  `d_h` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  KEY `log_utilisateur` (`log_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `log_utilisateur`, `libelle`, `chemin`, `commentaire`, `lieu`, `humeur`, `activite`, `visibilite`, `d_h`) VALUES
(2, 'cl181647', 'photo', 'chemin de la photo', 'trop cool le pot de passation', 'ece paris', NULL, NULL, 1, '2018-05-03 10:28:41'),
(3, 'ab191382', 'cv', 'chemin cv', 'cherche stage de 1 mois; partager s\'il vous plait', NULL, NULL, NULL, 2, '2018-05-03 10:29:36'),
(4, 'ad', 'video', 'chemin de la video', NULL, 'france', 'content', NULL, 3, '2018-05-03 10:30:20');

-- --------------------------------------------------------

--
-- Structure de la table `reseaux`
--

DROP TABLE IF EXISTS `reseaux`;
CREATE TABLE IF NOT EXISTS `reseaux` (
  `log_pers_un` varchar(20) NOT NULL,
  `log_pers_deux` varchar(20) NOT NULL,
  `amis` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`log_pers_un`,`log_pers_deux`),
  KEY `log_pers_deux` (`log_pers_deux`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reseaux`
--

INSERT INTO `reseaux` (`log_pers_un`, `log_pers_deux`, `amis`) VALUES
('ab191382', 'ef141352', NULL),
('cl181647', 'od191654', 1),
('od191654', 'cl181647', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `anniversaire` date DEFAULT NULL,
  `travail` varchar(50) DEFAULT NULL,
  `promotion` varchar(30) DEFAULT NULL,
  `majeure` varchar(30) DEFAULT NULL,
  `photoprofil` varchar(255) DEFAULT NULL,
  `dateco` datetime DEFAULT NULL,
  `formations` text,
  `experiences` text,
  `photofond` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `email`, `nom`, `prenom`, `password`, `anniversaire`, `travail`, `promotion`, `majeure`, `photoprofil`, `dateco`, `formations`, `experiences`, `photofond`) VALUES
('ab191382', 'audrey.bertrand@edu.ece.fr', 'Bertrand', 'Audrey', 'tata8', '2000-06-13', NULL, 'ING1', NULL, NULL, '2018-05-03 04:54:12', NULL, NULL, NULL),
('ad', 'alexis.durant@edu.ece.fr', 'Durant', 'Alexis', '96', '1990-02-11', 'BNP', 'ALUMNI', 'SI', NULL, '2011-05-19 03:31:26', NULL, NULL, NULL),
('aoaoaoa', 'o.a@edu.ece.fr', 'Aoooooo', 'a', 'a', '1998-05-02', 'NULL', 'ING1', 'NULL', NULL, NULL, NULL, NULL, NULL),
('cl181647', 'chloe.lachevre@edu.ece.fr', 'Lachevre', 'Chloe', 'tutu1515', '1990-01-19', 'l\'oreal', 'alumni', 'se', NULL, '2014-06-01 12:16:41', NULL, NULL, NULL),
('cl191785', 'come.l-ollivier@edu.ece.fr', 'L Ollivier', 'Come', 'tata1719', '1997-02-25', 'NULL', 'ING3', '', NULL, NULL, NULL, NULL, NULL),
('ef141352', 'etienne.fallont@edu.ece.fr', 'Fallont', 'Etienne', 'tutu1515', '1994-04-16', NULL, 'ING5', 'Environnement', NULL, '2018-05-04 10:22:26', 'LYCEE PARIS\r\nECE PARIS \r\n....', 'McDo 5 mois ', NULL),
('fd', 'francoise.doli@edu.ece.fr', 'Doli', 'Francoise', 'ff78', '1998-06-05', 'NULL', 'ING2', 'NULL', NULL, '2018-05-04 10:49:58', NULL, NULL, NULL),
('gd', 'gregoire.deconzages@edu.ece.fr', 'Deconzages', 'Gregoire', 'tutu1414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('od191654', 'olivier.decazes@edu.ece.fr', 'Decazes', 'Olivier', 'olioli', '1996-01-12', NULL, 'ING3', NULL, NULL, '2016-07-20 20:32:49', 'Lycee sainte marie Grand Lebrun\r\nPrepa \r\nECE Paris ', 'Monoprix Bordeaux 2 mois\r\nBNP 1 mois\r\n', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`id_du_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`emetteur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`recepteur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD CONSTRAINT `emplois_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liker`
--
ALTER TABLE `liker`
  ADD CONSTRAINT `liker_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liker_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id_discus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_emetteur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partager`
--
ALTER TABLE `partager`
  ADD CONSTRAINT `partager_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partager_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`log_utilisateur`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reseaux`
--
ALTER TABLE `reseaux`
  ADD CONSTRAINT `reseaux_ibfk_1` FOREIGN KEY (`log_pers_un`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reseaux_ibfk_2` FOREIGN KEY (`log_pers_deux`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
