-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 avr. 2018 à 00:07
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suplinks`
--

-- --------------------------------------------------------

--
-- Structure de la table `clicks`
--

DROP TABLE IF EXISTS `clicks`;
CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `id_link` varchar(5) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clicks`
--

INSERT INTO `clicks` (`id`, `clicks`, `id_link`, `date`, `created_at`, `updated_at`) VALUES
(20, 17, 'T9Ws5', '2018-04-26', '2018-04-26 08:12:58', '2018-04-26 09:04:32'),
(10, 0, 'T9Ws5', '2018-04-24', '2018-04-24 17:40:45', '2018-04-24 17:40:45'),
(17, 4, 'T9Ws5', '2018-04-25', '2018-04-25 17:14:04', '2018-04-25 18:12:25'),
(23, 5, 'T9Ws5', '2018-04-27', '2018-04-26 23:42:11', '2018-04-27 11:35:04'),
(29, 1, 'T9Ws5', '2018-04-29', '2018-04-28 22:06:07', '2018-04-28 22:06:07'),
(28, 2, 'ex7Cb', '2018-04-29', '2018-04-28 22:05:52', '2018-04-28 22:06:00'),
(26, 2, 'T9Ws5', '2018-04-28', '2018-04-28 08:43:21', '2018-04-28 09:59:44'),
(27, 1, 'ex7Cb', '2018-04-28', '2018-04-28 13:57:00', '2018-04-28 13:57:07');

-- --------------------------------------------------------

--
-- Structure de la table `country_stats`
--

DROP TABLE IF EXISTS `country_stats`;
CREATE TABLE IF NOT EXISTS `country_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `id_link` varchar(5) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `country_stats`
--

INSERT INTO `country_stats` (`id`, `country`, `id_link`, `clicks`, `created_at`, `updated_at`) VALUES
(6, 'XX', 'T9Ws5', 29, '2018-04-25 17:17:48', '2018-04-28 22:06:07'),
(5, 'US', 'T9Ws5', 0, '2018-04-24 17:40:45', '2018-04-24 17:40:45'),
(10, 'XX', 'ex7Cb', 3, '2018-04-28 13:57:00', '2018-04-28 22:06:00');

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `id_user`, `enable`, `clicks`, `created_at`, `updated_at`) VALUES
('T9Ws5', 'X-men', 'https://fr.wikipedia.org/wiki/X-Men', 3, 1, 29, '2018-04-24 17:40:44', '2018-04-24 17:40:44'),
('ex7Cb', 'Laravel Courses', 'https://openclassrooms.com/courses/decouvrez-le-framework-php-laravel-1', 3, 1, 3, '2018-04-28 13:56:58', '2018-04-28 13:56:58');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Hugo.CAPUANO@supinfo.com', '$2y$10$i536.HOhgobO0HeLRIj9leGRQkzbxxubPQVdf6DRuaGO2of89Y8Cu', '2018-04-26 09:02:50');

-- --------------------------------------------------------

--
-- Structure de la table `reffer_stats`
--

DROP TABLE IF EXISTS `reffer_stats`;
CREATE TABLE IF NOT EXISTS `reffer_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reffer` varchar(255) NOT NULL DEFAULT 'https://www.google.com/',
  `id_link` varchar(5) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reffer_stats`
--

INSERT INTO `reffer_stats` (`id`, `reffer`, `id_link`, `clicks`, `created_at`, `updated_at`) VALUES
(4, 'http://localhost:8000/', 'T9Ws5', 25, '2018-04-24 17:40:45', '2018-04-28 22:06:07'),
(11, 'Direct', 'T9Ws5', 3, '2018-04-26 23:42:11', '2018-04-27 11:18:18'),
(12, 'http://localhost:8000/stats/T9Ws5', 'T9Ws5', 1, '2018-04-27 11:35:04', '2018-04-27 11:35:04'),
(15, 'Direct', 'ex7Cb', 2, '2018-04-28 22:05:52', '2018-04-28 22:06:00'),
(14, 'http://localhost:8000/', 'ex7Cb', 1, '2018-04-28 13:57:00', '2018-04-28 13:57:07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'test@test.com', '$2y$10$tD96IYBumkXDtx6xPsz9QO96V3tDcb1EBijt0eZLZA2Ny.K1znNw6', 'vlSDV5vurcBLSbohMsMCHysH4eXPDOAamGKHdAKngliDzynaO3rptKGhf0uI', '2018-04-28 14:11:05', '2018-04-28 14:11:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
