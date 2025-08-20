-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 18 août 2025 à 14:06
-- Version du serveur : 8.0.42
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `celio`
--
CREATE DATABASE IF NOT EXISTS `celio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `celio`;

-- --------------------------------------------------------

--
-- Structure de la table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
CREATE TABLE IF NOT EXISTS `clothes` (
  `clo_id` int NOT NULL AUTO_INCREMENT,
  `clo_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `clo_size` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `clo_price` decimal(10,2) NOT NULL,
  `gen_id` int NOT NULL,
  `typ_id` int NOT NULL,
  PRIMARY KEY (`clo_id`),
  KEY `gen_id` (`gen_id`),
  KEY `typ_id` (`typ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clothes`
--

INSERT INTO `clothes` (`clo_id`, `clo_name`, `clo_size`, `clo_price`, `gen_id`, `typ_id`) VALUES
(1, 'T-shirt bleu', 'M', 19.99, 1, 1),
(2, 'Pantalon noir', 'L', 39.99, 2, 2),
(3, 'Sweat gris', 'S', 29.99, 3, 3),
(4, 'Pull rouge', 'XL', 49.99, 4, 4),
(5, 'Chemise blanche', 'M', 34.99, 1, 5),
(6, 'T-shirt vert', 'S', 18.99, 2, 1),
(7, 'Pantalon beige', 'M', 42.50, 3, 2),
(8, 'Sweat bleu marine', 'L', 31.99, 4, 3),
(9, 'Pull noir', 'M', 45.00, 1, 4),
(10, 'Chemise à carreaux', 'L', 36.75, 2, 5),
(11, 'T-shirt imprimé', 'XL', 22.00, 3, 1),
(12, 'Pantalon cargo', 'S', 40.00, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `gen_id` int NOT NULL AUTO_INCREMENT,
  `gen_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genders`
--

INSERT INTO `genders` (`gen_id`, `gen_name`) VALUES
(1, 'homme'),
(2, 'femme'),
(3, 'enfant'),
(4, 'unisexe');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `pic_id` int NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pic_main` int NOT NULL,
  `clo_id` int NOT NULL,
  PRIMARY KEY (`pic_id`),
  KEY `clo_id` (`clo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`pic_id`, `pic_name`, `pic_main`, `clo_id`) VALUES
(1, 'tshirt_bleu_1.jpg', 1, 1),
(2, 'tshirt_bleu_2.jpg', 0, 1),
(3, 'tshirt_bleu_3.jpg', 0, 1),
(4, 'pantalon_noir_1.jpg', 1, 2),
(5, 'pantalon_noir_2.jpg', 0, 2),
(6, 'sweat_gris_1.jpg', 1, 3),
(7, 'sweat_gris_2.jpg', 0, 3),
(8, 'sweat_gris_3.jpg', 0, 3),
(9, 'pull_rouge_1.jpg', 1, 4),
(10, 'pull_rouge_2.jpg', 0, 4),
(11, 'chemise_blanche_1.jpg', 1, 5),
(12, 'chemise_blanche_2.jpg', 0, 5),
(13, 'chemise_blanche_3.jpg', 0, 5),
(14, 'tshirt_vert_1.jpg', 1, 6),
(15, 'tshirt_vert_2.jpg', 0, 6),
(16, 'pantalon_beige_1.jpg', 1, 7),
(17, 'pantalon_beige_2.jpg', 0, 7),
(18, 'pantalon_beige_3.jpg', 0, 7),
(19, 'sweat_marine_1.jpg', 1, 8),
(20, 'sweat_marine_2.jpg', 0, 8),
(21, 'pull_noir_1.jpg', 1, 9),
(22, 'pull_noir_2.jpg', 0, 9),
(23, 'pull_noir_3.jpg', 0, 9),
(24, 'chemise_carreaux_1.jpg', 1, 10),
(25, 'chemise_carreaux_2.jpg', 0, 10),
(26, 'tshirt_imprime_1.jpg', 1, 11),
(27, 'tshirt_imprime_2.jpg', 0, 11),
(28, 'tshirt_imprime_3.jpg', 0, 11),
(29, 'pantalon_cargo_1.jpg', 1, 12),
(30, 'pantalon_cargo_2.jpg', 0, 12);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `typ_id` int NOT NULL AUTO_INCREMENT,
  `typ_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`typ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`typ_id`, `typ_name`) VALUES
(1, 't-shirt'),
(2, 'pantalon'),
(3, 'sweat-shirt'),
(4, 'pull'),
(5, 'chemise');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`gen_id`) REFERENCES `genders` (`gen_id`),
  ADD CONSTRAINT `clothes_ibfk_2` FOREIGN KEY (`typ_id`) REFERENCES `types` (`typ_id`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`clo_id`) REFERENCES `clothes` (`clo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
