-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 sep. 2023 à 09:51
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crazydev`
--

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sock_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_665648E912FBC9FA` (`sock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `label`, `tw_class`, `sock_id`) VALUES
(37, 'rouge', 'red', NULL),
(38, 'bleu', 'blue', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230919164917', '2023-09-19 16:49:22', 38),
('DoctrineMigrations\\Version20230919215118', '2023-09-19 21:51:27', 327),
('DoctrineMigrations\\Version20230920120610', '2023-09-20 12:06:34', 149);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pair`
--

DROP TABLE IF EXISTS `pair`;
CREATE TABLE IF NOT EXISTS `pair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pair_story` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sock_id` int(11) NOT NULL,
  `other_sock_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95A1E6912FBC9FA` (`sock_id`),
  KEY `IDX_95A1E691A65796` (`other_sock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pair`
--

INSERT INTO `pair` (`id`, `pair_story`, `sock_id`, `other_sock_id`) VALUES
(3, 'Je suis une paire de chaussettes', 14, 15);

-- --------------------------------------------------------

--
-- Structure de la table `pattern`
--

DROP TABLE IF EXISTS `pattern`;
CREATE TABLE IF NOT EXISTS `pattern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pattern`
--

INSERT INTO `pattern` (`id`, `path`) VALUES
(37, 'rayures'),
(38, 'carreaux'),
(39, 'pois');

-- --------------------------------------------------------

--
-- Structure de la table `sock`
--

DROP TABLE IF EXISTS `sock`;
CREATE TABLE IF NOT EXISTS `sock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pair_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_found` tinyint(1) NOT NULL,
  `is_matched` tinyint(1) NOT NULL,
  `color_id` int(11) NOT NULL,
  `pattern_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8FF5DCC7E7927C74` (`email`),
  KEY `IDX_8FF5DCC77EB8B2A3` (`pair_id`),
  KEY `IDX_8FF5DCC77ADA1FB5` (`color_id`),
  KEY `IDX_8FF5DCC7F734A20F` (`pattern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sock`
--

INSERT INTO `sock` (`id`, `pair_id`, `email`, `roles`, `password`, `story`, `is_found`, `is_matched`, `color_id`, `pattern_id`, `username`) VALUES
(14, NULL, 'benjamin.forest@gmail.com', '[]', '$2y$13$Xe6bUic2ZSxuR.5S3N15FuyJn0BgyVMQGLhiTjZ4c.HZbhwA91g5W', 'Je suis une chaussette', 1, 0, 37, 37, 'Benjamin'),
(15, NULL, 'john.doe@gmail.com', '[]', '$2y$13$AlHg992YLKIk31NU9z0Lmuz.NX0ftV3yqg2l7Ax25mdN7U4PdhD5i', 'Je suis une chaussette 2', 1, 0, 38, 38, 'John'),
(16, NULL, 'truc@gmail.com', '[\"ROLE_USER\"]', '$2y$13$wTUPdW2aSNox0cmfITBWR.wpnCbFrJCDJBIXQDxkxg2WrfHw.BRHa', 'je suis un truc', 0, 0, 38, 38, 'truc'),
(17, NULL, 'michel@gmail.com', '[\"ROLE_USER\"]', '$2y$13$tA8XAfiRPdB90/BeIX95jO8QhSyalUxzz5AmJzy8UKnx4BEZpnmjO', 'je sus michel', 0, 0, 37, 37, 'Michel'),
(18, NULL, 'machin@gmail.com', '[\"ROLE_USER\"]', '$2y$13$trWVqOrCZb//KGU2X7Yo3exuVh8XUfsro4ucdyZfh.0BC02N2BF9S', 'je sis un machin', 0, 0, 37, 38, 'machin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `FK_665648E912FBC9FA` FOREIGN KEY (`sock_id`) REFERENCES `sock` (`id`);

--
-- Contraintes pour la table `pair`
--
ALTER TABLE `pair`
  ADD CONSTRAINT `FK_95A1E6912FBC9FA` FOREIGN KEY (`sock_id`) REFERENCES `sock` (`id`),
  ADD CONSTRAINT `FK_95A1E691A65796` FOREIGN KEY (`other_sock_id`) REFERENCES `sock` (`id`);

--
-- Contraintes pour la table `sock`
--
ALTER TABLE `sock`
  ADD CONSTRAINT `FK_8FF5DCC77ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_8FF5DCC77EB8B2A3` FOREIGN KEY (`pair_id`) REFERENCES `pair` (`id`),
  ADD CONSTRAINT `FK_8FF5DCC7F734A20F` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
