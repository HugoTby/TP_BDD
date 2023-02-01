-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 fév. 2023 à 19:55
-- Version du serveur :  8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `td_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `devoirs`
--

DROP TABLE IF EXISTS `devoirs`;
CREATE TABLE IF NOT EXISTS `devoirs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `dateEmission` datetime NOT NULL,
  `dateRendu` datetime NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `Matiere` varchar(60) NOT NULL,
  `idProfesseur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProfesseur` (`idProfesseur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `devoirs`
--

INSERT INTO `devoirs` (`id`, `titre`, `dateEmission`, `dateRendu`, `contenu`, `Matiere`, `idProfesseur`) VALUES
(1, 'TestBDD', '2023-02-01 18:37:45', '2023-02-02 18:37:45', 'Ici se trouve le contenu du travail a faire', 'Informatique & Réseaux', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `img_grade` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`,`prenom`,`role`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `password`, `role`, `img_grade`) VALUES
(1, 'NomEleve', 'PrenomEleve', 'eleve', 'eleve', 'Élève', 'default.jpg'),
(2, 'NomProf', 'PrenomProf', 'professeur', 'professeur', 'Professeur', 'default.jpg'),
(3, 'NomParent', 'PrenomParent', 'parent', 'parent', 'Parent', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
