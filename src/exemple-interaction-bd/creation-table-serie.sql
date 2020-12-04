-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 04 déc. 2020 à 03:02
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
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id_serie` int NOT NULL COMMENT 'Clé primaire, identifiant unique pour une série',
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom de la série',
  `synopsis` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Synopsis de la série',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Description de la série',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de la création de la série',
  `date_modification` date DEFAULT NULL COMMENT 'Date de la modification de la série',
  `date_suppression` datetime DEFAULT NULL COMMENT 'Date de suppression de la série'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire, identifiant unique pour une série';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
