-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 29 nov. 2020 à 05:37
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demo_acces_donnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL COMMENT 'Clé primaire pour identifier un utilisateur',
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom de l''utilisateur',
  `prenom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Prénom de l''utilisateur',
  `date_naissance` date NOT NULL COMMENT 'Date de naissance de l''utilisateur',
  `date_suppression` datetime DEFAULT NULL COMMENT 'Date de la suppression de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `date_naissance`, `date_suppression`) VALUES
(1, 'Garon-Michaud', 'Alexis', '1992-04-08', NULL),
(3, 'Garon-Michaud', 'Sacha', '1997-04-12', NULL),
(4, 'Garon-Michaud', 'François', '1994-11-17', NULL),
(5, 'Garon-Michaud', 'Élisabeth', '1990-03-10', NULL),
(6, 'Michaud', 'Laurianne', '1988-10-16', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire pour identifier un utilisateur', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
