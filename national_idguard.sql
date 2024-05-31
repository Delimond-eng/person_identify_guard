-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 30 mai 2024 à 17:56
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `national_idguard`
--

-- --------------------------------------------------------

--
-- Structure de la table `chefferies`
--

CREATE TABLE `chefferies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chefferie_libelle` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `secteur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chefferies`
--

INSERT INTO `chefferies` (`id`, `chefferie_libelle`, `status`, `secteur_id`, `created_at`, `updated_at`) VALUES
(1, 'Terminus', 'actif', 285, NULL, NULL),
(2, 'Sous région', 'actif', 285, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `conjoints`
--

CREATE TABLE `conjoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conjoint_nom` varchar(255) NOT NULL,
  `conjoint_date_naissance` timestamp NULL DEFAULT NULL,
  `personne_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

CREATE TABLE `enfants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eft_nom` varchar(255) NOT NULL,
  `eft_date_naissance` timestamp NULL DEFAULT NULL,
  `personne_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etude_titres`
--

CREATE TABLE `etude_titres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre_libelle` varchar(255) NOT NULL,
  `titre_date_obtention` timestamp NULL DEFAULT NULL,
  `personne_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille_charges`
--

CREATE TABLE `famille_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_membre_famille` varchar(255) NOT NULL,
  `lien_parent` varchar(255) NOT NULL,
  `personne_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_29_112445_create_personnes_table', 1),
(6, '2024_05_29_114310_create_conjoints_table', 1),
(7, '2024_05_29_114841_create_enfants_table', 1),
(8, '2024_05_29_115330_create_famille_charges_table', 1),
(9, '2024_05_29_115633_create_etude_titres_table', 1),
(10, '2024_05_29_115908_create_provinces_table', 1),
(11, '2024_05_29_120031_create_territoires_table', 1),
(12, '2024_05_29_120202_create_secteurs_table', 1),
(13, '2024_05_29_120407_create_chefferies_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idnat` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `postnom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` timestamp NULL DEFAULT NULL,
  `sexe` varchar(255) NOT NULL,
  `etat_civil` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `nbre_personne_famille` varchar(255) DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `territoire_id` bigint(20) UNSIGNED NOT NULL,
  `secteur_id` bigint(20) UNSIGNED NOT NULL,
  `chefferie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_libelle` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provinces`
--

INSERT INTO `provinces` (`id`, `province_libelle`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kinshasa', 'actif', NULL, NULL),
(2, 'Kongo-Central', 'actif', NULL, NULL),
(3, 'Kwango', 'actif', NULL, NULL),
(4, 'Kwilu', 'actif', NULL, NULL),
(5, 'Mai-Ndombe', 'actif', NULL, NULL),
(6, 'Equateur', 'actif', NULL, NULL),
(7, 'Nord-Ubangi', 'actif', NULL, NULL),
(8, 'Sud-Ubangi', 'actif', NULL, NULL),
(9, 'Mongala', 'actif', NULL, NULL),
(10, 'Tshuapa', 'actif', NULL, NULL),
(11, 'Tshopo', 'actif', NULL, NULL),
(12, 'Bas-Uele', 'actif', NULL, NULL),
(13, 'Haut-Uele', 'actif', NULL, NULL),
(14, 'Ituri', 'actif', NULL, NULL),
(15, 'Nord-Kivu', 'actif', NULL, NULL),
(16, 'Sud-Kivu', 'actif', NULL, NULL),
(17, 'Maniema', 'actif', NULL, NULL),
(18, 'Haut-Katanga', 'actif', NULL, NULL),
(19, 'Haut-Lomami', 'actif', NULL, NULL),
(20, 'Lualaba', 'actif', NULL, NULL),
(21, 'Tanganyka', 'actif', NULL, NULL),
(22, 'Lomami', 'actif', NULL, NULL),
(23, 'Sankuru', 'actif', NULL, NULL),
(24, 'Kasai Oriental', 'actif', NULL, NULL),
(25, 'Kasai', 'actif', NULL, NULL),
(26, 'Tshuapa', 'actif', NULL, NULL),
(27, 'Kasai Central', 'actif', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

CREATE TABLE `secteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `secteur_libelle` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `territoire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteurs`
--

INSERT INTO `secteurs` (`id`, `secteur_libelle`, `status`, `territoire_id`, `created_at`, `updated_at`) VALUES
(1, 'Kasangulu', 'actif', 1, NULL, NULL),
(2, 'Luila', 'actif', 1, NULL, NULL),
(3, 'Lukunga-Mputu', 'actif', 1, NULL, NULL),
(4, 'Benga', 'actif', 2, NULL, NULL),
(5, 'Lubisi', 'actif', 2, NULL, NULL),
(6, 'Lula-Lumene', 'actif', 2, NULL, NULL),
(7, 'Fubu', 'actif', 3, NULL, NULL),
(8, 'Kakongo', 'actif', 3, NULL, NULL),
(9, 'Patu', 'actif', 3, NULL, NULL),
(10, 'Tsanga-Sud', 'actif', 3, NULL, NULL),
(11, 'Tsundi-Sud', 'actif', 3, NULL, NULL),
(12, 'Balari', 'actif', 4, NULL, NULL),
(13, 'Kenge', 'actif', 4, NULL, NULL),
(14, 'Kimbanza', 'actif', 4, NULL, NULL),
(15, 'Kimumba', 'actif', 4, NULL, NULL),
(16, 'Kinkenge', 'actif', 4, NULL, NULL),
(17, 'Kivunda', 'actif', 4, NULL, NULL),
(18, 'Mbanza Mona', 'actif', 4, NULL, NULL),
(19, 'Mbanza Mwembe', 'actif', 4, NULL, NULL),
(20, 'Mbanza Ngoyo', 'actif', 4, NULL, NULL),
(21, 'Mongo Luala', 'actif', 4, NULL, NULL),
(22, 'Kinkosi (Luidi)', 'actif', 5, NULL, NULL),
(23, 'Mfidi Malele', 'actif', 5, NULL, NULL),
(24, 'Mfuma-Kibambi', 'actif', 5, NULL, NULL),
(25, 'Ngeba', 'actif', 5, NULL, NULL),
(26, 'Ngufu', 'actif', 5, NULL, NULL),
(27, 'Wungu', 'actif', 5, NULL, NULL),
(28, 'Boko', 'actif', 6, NULL, NULL),
(29, 'Gombe-Matadi', 'actif', 6, NULL, NULL),
(30, 'Gombe-Sud', 'actif', 6, NULL, NULL),
(31, 'Kivulu', 'actif', 6, NULL, NULL),
(32, 'Kwilu-Ngongo', 'actif', 6, NULL, NULL),
(33, 'Lunzadi', 'actif', 6, NULL, NULL),
(34, 'Ntimansi', 'actif', 6, NULL, NULL),
(35, 'Assolongo', 'actif', 7, NULL, NULL),
(36, 'Boma-Bungu', 'actif', 7, NULL, NULL),
(37, 'la Mer', 'actif', 7, NULL, NULL),
(38, 'Bundi', 'actif', 8, NULL, NULL),
(39, 'Isangila', 'actif', 8, NULL, NULL),
(40, 'Lufu', 'actif', 8, NULL, NULL),
(41, 'Mbavu', 'actif', 8, NULL, NULL),
(42, 'Sumbi', 'actif', 8, NULL, NULL),
(43, 'Bamboma', 'actif', 9, NULL, NULL),
(44, 'Kimpese', 'actif', 9, NULL, NULL),
(45, 'Luima', 'actif', 9, NULL, NULL),
(46, 'Palabala', 'actif', 9, NULL, NULL),
(47, 'Sindi', 'actif', 9, NULL, NULL),
(48, 'Bundi', 'actif', 10, NULL, NULL),
(49, 'Mbanga', 'actif', 10, NULL, NULL),
(50, 'Mvuangu', 'actif', 10, NULL, NULL),
(51, 'Wungu', 'actif', 10, NULL, NULL),
(52, 'Gombe-Sud', 'actif', 11, NULL, NULL),
(53, 'Kwango-Kasai', 'actif', 11, NULL, NULL),
(54, 'Lungata', 'actif', 11, NULL, NULL),
(55, 'Kenge', 'actif', 11, NULL, NULL),
(56, 'Kakongo', 'actif', 12, NULL, NULL),
(57, 'Ngongo', 'actif', 12, NULL, NULL),
(58, 'Mpangu', 'actif', 13, NULL, NULL),
(59, 'Kingoma', 'actif', 13, NULL, NULL),
(60, 'Feshi', 'actif', 13, NULL, NULL),
(61, 'Kenge', 'actif', 13, NULL, NULL),
(62, 'Lukula', 'actif', 14, NULL, NULL),
(63, 'Kimvula', 'actif', 14, NULL, NULL),
(64, 'Maluku', 'actif', 14, NULL, NULL),
(65, 'Bandundu', 'actif', 14, NULL, NULL),
(66, 'Kasangulu', 'actif', 15, NULL, NULL),
(67, 'Lukunga-Mputu', 'actif', 15, NULL, NULL),
(68, 'Luila', 'actif', 15, NULL, NULL),
(69, 'Ngeba', 'actif', 15, NULL, NULL),
(70, 'Mfidi Malele', 'actif', 15, NULL, NULL),
(71, 'Ngufu', 'actif', 15, NULL, NULL),
(72, 'Lunzadi', 'actif', 16, NULL, NULL),
(73, 'Kivulu', 'actif', 16, NULL, NULL),
(74, 'Kwilu-Ngongo', 'actif', 16, NULL, NULL),
(75, 'Ntimansi', 'actif', 16, NULL, NULL),
(76, 'Banga', 'actif', 17, NULL, NULL),
(77, 'Gungu', 'actif', 17, NULL, NULL),
(78, 'Kenge', 'actif', 17, NULL, NULL),
(79, 'Mbanza-Ngungu', 'actif', 17, NULL, NULL),
(80, 'Palabala', 'actif', 17, NULL, NULL),
(81, 'Kimpese', 'actif', 17, NULL, NULL),
(82, 'Sindi', 'actif', 17, NULL, NULL),
(83, 'Luima', 'actif', 17, NULL, NULL),
(84, 'Boko', 'actif', 18, NULL, NULL),
(85, 'Gombe-Matadi', 'actif', 18, NULL, NULL),
(86, 'Gombe-Sud', 'actif', 18, NULL, NULL),
(87, 'Kivulu', 'actif', 18, NULL, NULL),
(88, 'Kwilu-Ngongo', 'actif', 18, NULL, NULL),
(89, 'Lunzadi', 'actif', 18, NULL, NULL),
(90, 'Ntimansi', 'actif', 18, NULL, NULL),
(91, 'Assolongo', 'actif', 19, NULL, NULL),
(92, 'Boma-Bungu', 'actif', 19, NULL, NULL),
(93, 'la Mer', 'actif', 19, NULL, NULL),
(94, 'Bundi', 'actif', 20, NULL, NULL),
(95, 'Isangila', 'actif', 20, NULL, NULL),
(96, 'Lufu', 'actif', 20, NULL, NULL),
(97, 'Mbavu', 'actif', 20, NULL, NULL),
(98, 'Sumbi', 'actif', 20, NULL, NULL),
(99, 'Banga', 'actif', 21, NULL, NULL),
(100, 'Gungu', 'actif', 21, NULL, NULL),
(101, 'Kenge', 'actif', 21, NULL, NULL),
(102, 'Mbanza-Ngungu', 'actif', 21, NULL, NULL),
(103, 'Palabala', 'actif', 21, NULL, NULL),
(104, 'Kimpese', 'actif', 21, NULL, NULL),
(105, 'Sindi', 'actif', 21, NULL, NULL),
(106, 'Luima', 'actif', 21, NULL, NULL),
(107, 'Boko', 'actif', 22, NULL, NULL),
(108, 'Gombe-Matadi', 'actif', 22, NULL, NULL),
(109, 'Gombe-Sud', 'actif', 22, NULL, NULL),
(110, 'Kivulu', 'actif', 22, NULL, NULL),
(111, 'Kwilu-Ngongo', 'actif', 22, NULL, NULL),
(112, 'Lunzadi', 'actif', 22, NULL, NULL),
(113, 'Ntimansi', 'actif', 22, NULL, NULL),
(114, 'Assolongo', 'actif', 23, NULL, NULL),
(115, 'Boma-Bungu', 'actif', 23, NULL, NULL),
(116, 'la Mer', 'actif', 23, NULL, NULL),
(117, 'Bundi', 'actif', 24, NULL, NULL),
(118, 'Isangila', 'actif', 24, NULL, NULL),
(119, 'Lufu', 'actif', 24, NULL, NULL),
(120, 'Mbavu', 'actif', 24, NULL, NULL),
(121, 'Sumbi', 'actif', 24, NULL, NULL),
(122, 'Banga', 'actif', 25, NULL, NULL),
(123, 'Gungu', 'actif', 25, NULL, NULL),
(124, 'Kenge', 'actif', 25, NULL, NULL),
(125, 'Mbanza-Ngungu', 'actif', 25, NULL, NULL),
(126, 'Palabala', 'actif', 25, NULL, NULL),
(127, 'Kimpese', 'actif', 25, NULL, NULL),
(128, 'Sindi', 'actif', 25, NULL, NULL),
(129, 'Luima', 'actif', 25, NULL, NULL),
(130, 'Boko', 'actif', 26, NULL, NULL),
(131, 'Gombe-Matadi', 'actif', 26, NULL, NULL),
(132, 'Gombe-Sud', 'actif', 26, NULL, NULL),
(133, 'Kivulu', 'actif', 26, NULL, NULL),
(134, 'Kwilu-Ngongo', 'actif', 26, NULL, NULL),
(135, 'Lunzadi', 'actif', 26, NULL, NULL),
(136, 'Ntimansi', 'actif', 26, NULL, NULL),
(137, 'Assolongo', 'actif', 27, NULL, NULL),
(138, 'Boma-Bungu', 'actif', 27, NULL, NULL),
(139, 'la Mer', 'actif', 27, NULL, NULL),
(140, 'Bundi', 'actif', 28, NULL, NULL),
(141, 'Isangila', 'actif', 28, NULL, NULL),
(142, 'Lufu', 'actif', 28, NULL, NULL),
(143, 'Mbavu', 'actif', 28, NULL, NULL),
(144, 'Sumbi', 'actif', 28, NULL, NULL),
(145, 'Banga', 'actif', 29, NULL, NULL),
(146, 'Gungu', 'actif', 29, NULL, NULL),
(147, 'Kenge', 'actif', 29, NULL, NULL),
(148, 'Mbanza-Ngungu', 'actif', 29, NULL, NULL),
(149, 'Palabala', 'actif', 29, NULL, NULL),
(150, 'Kimpese', 'actif', 29, NULL, NULL),
(151, 'Sindi', 'actif', 29, NULL, NULL),
(152, 'Luima', 'actif', 29, NULL, NULL),
(153, 'Boko', 'actif', 30, NULL, NULL),
(154, 'Gombe-Matadi', 'actif', 30, NULL, NULL),
(155, 'Gombe-Sud', 'actif', 30, NULL, NULL),
(156, 'Kivulu', 'actif', 30, NULL, NULL),
(157, 'Kwilu-Ngongo', 'actif', 30, NULL, NULL),
(158, 'Lunzadi', 'actif', 30, NULL, NULL),
(159, 'Ntimansi', 'actif', 30, NULL, NULL),
(160, 'Assolongo', 'actif', 31, NULL, NULL),
(161, 'Boma-Bungu', 'actif', 31, NULL, NULL),
(162, 'la Mer', 'actif', 31, NULL, NULL),
(163, 'Bundi', 'actif', 32, NULL, NULL),
(164, 'Isangila', 'actif', 32, NULL, NULL),
(165, 'Lufu', 'actif', 32, NULL, NULL),
(166, 'Mbavu', 'actif', 32, NULL, NULL),
(167, 'Sumbi', 'actif', 32, NULL, NULL),
(168, 'Banga', 'actif', 33, NULL, NULL),
(169, 'Gungu', 'actif', 33, NULL, NULL),
(170, 'Kenge', 'actif', 33, NULL, NULL),
(171, 'Mbanza-Ngungu', 'actif', 33, NULL, NULL),
(172, 'Palabala', 'actif', 33, NULL, NULL),
(173, 'Kimpese', 'actif', 33, NULL, NULL),
(174, 'Sindi', 'actif', 33, NULL, NULL),
(175, 'Luima', 'actif', 33, NULL, NULL),
(176, 'Boko', 'actif', 34, NULL, NULL),
(177, 'Gombe-Matadi', 'actif', 34, NULL, NULL),
(178, 'Gombe-Sud', 'actif', 34, NULL, NULL),
(179, 'Kivulu', 'actif', 34, NULL, NULL),
(180, 'Kwilu-Ngongo', 'actif', 34, NULL, NULL),
(181, 'Lunzadi', 'actif', 34, NULL, NULL),
(182, 'Ntimansi', 'actif', 34, NULL, NULL),
(183, 'Assolongo', 'actif', 35, NULL, NULL),
(184, 'Boma-Bungu', 'actif', 35, NULL, NULL),
(185, 'la Mer', 'actif', 35, NULL, NULL),
(186, 'Bundi', 'actif', 36, NULL, NULL),
(187, 'Isangila', 'actif', 36, NULL, NULL),
(188, 'Lufu', 'actif', 36, NULL, NULL),
(189, 'Mbavu', 'actif', 36, NULL, NULL),
(190, 'Sumbi', 'actif', 36, NULL, NULL),
(191, 'Banga', 'actif', 37, NULL, NULL),
(192, 'Gungu', 'actif', 37, NULL, NULL),
(193, 'Kenge', 'actif', 37, NULL, NULL),
(194, 'Mbanza-Ngungu', 'actif', 37, NULL, NULL),
(195, 'Palabala', 'actif', 37, NULL, NULL),
(196, 'Kimpese', 'actif', 37, NULL, NULL),
(197, 'Sindi', 'actif', 37, NULL, NULL),
(198, 'Luima', 'actif', 37, NULL, NULL),
(199, 'Boko', 'actif', 38, NULL, NULL),
(200, 'Gombe-Matadi', 'actif', 38, NULL, NULL),
(201, 'Gombe-Sud', 'actif', 38, NULL, NULL),
(202, 'Kivulu', 'actif', 38, NULL, NULL),
(203, 'Kwilu-Ngongo', 'actif', 38, NULL, NULL),
(204, 'Lunzadi', 'actif', 38, NULL, NULL),
(205, 'Ntimansi', 'actif', 38, NULL, NULL),
(206, 'Assolongo', 'actif', 39, NULL, NULL),
(207, 'Boma-Bungu', 'actif', 39, NULL, NULL),
(208, 'la Mer', 'actif', 39, NULL, NULL),
(209, 'Bundi', 'actif', 40, NULL, NULL),
(210, 'Isangila', 'actif', 40, NULL, NULL),
(211, 'Lufu', 'actif', 40, NULL, NULL),
(212, 'Mbavu', 'actif', 40, NULL, NULL),
(213, 'Sumbi', 'actif', 40, NULL, NULL),
(214, 'Banga', 'actif', 41, NULL, NULL),
(215, 'Gungu', 'actif', 41, NULL, NULL),
(216, 'Kenge', 'actif', 41, NULL, NULL),
(217, 'Mbanza-Ngungu', 'actif', 41, NULL, NULL),
(218, 'Palabala', 'actif', 41, NULL, NULL),
(219, 'Kimpese', 'actif', 41, NULL, NULL),
(220, 'Sindi', 'actif', 41, NULL, NULL),
(221, 'Luima', 'actif', 41, NULL, NULL),
(222, 'Boko', 'actif', 42, NULL, NULL),
(223, 'Gombe-Matadi', 'actif', 42, NULL, NULL),
(224, 'Gombe-Sud', 'actif', 42, NULL, NULL),
(225, 'Kivulu', 'actif', 42, NULL, NULL),
(226, 'Kwilu-Ngongo', 'actif', 42, NULL, NULL),
(227, 'Lunzadi', 'actif', 42, NULL, NULL),
(228, 'Ntimansi', 'actif', 42, NULL, NULL),
(229, 'Assolongo', 'actif', 43, NULL, NULL),
(230, 'Boma-Bungu', 'actif', 43, NULL, NULL),
(231, 'la Mer', 'actif', 43, NULL, NULL),
(232, 'Bundi', 'actif', 44, NULL, NULL),
(233, 'Isangila', 'actif', 44, NULL, NULL),
(234, 'Lufu', 'actif', 44, NULL, NULL),
(235, 'Mbavu', 'actif', 44, NULL, NULL),
(236, 'Sumbi', 'actif', 44, NULL, NULL),
(237, 'Banga', 'actif', 45, NULL, NULL),
(238, 'Gungu', 'actif', 45, NULL, NULL),
(239, 'Kenge', 'actif', 45, NULL, NULL),
(240, 'Mbanza-Ngungu', 'actif', 45, NULL, NULL),
(241, 'Palabala', 'actif', 45, NULL, NULL),
(242, 'Kimpese', 'actif', 45, NULL, NULL),
(243, 'Sindi', 'actif', 45, NULL, NULL),
(244, 'Luima', 'actif', 45, NULL, NULL),
(245, 'Boko', 'actif', 46, NULL, NULL),
(246, 'Gombe-Matadi', 'actif', 46, NULL, NULL),
(247, 'Gombe-Sud', 'actif', 46, NULL, NULL),
(248, 'Kivulu', 'actif', 46, NULL, NULL),
(249, 'Kwilu-Ngongo', 'actif', 46, NULL, NULL),
(250, 'Lunzadi', 'actif', 46, NULL, NULL),
(251, 'Ntimansi', 'actif', 46, NULL, NULL),
(252, 'Assolongo', 'actif', 47, NULL, NULL),
(253, 'Boma-Bungu', 'actif', 47, NULL, NULL),
(254, 'la Mer', 'actif', 47, NULL, NULL),
(255, 'Bundi', 'actif', 48, NULL, NULL),
(256, 'Isangila', 'actif', 48, NULL, NULL),
(257, 'Lufu', 'actif', 48, NULL, NULL),
(258, 'Mbavu', 'actif', 48, NULL, NULL),
(259, 'Sumbi', 'actif', 48, NULL, NULL),
(260, 'Abattoir', 'actif', 84, NULL, NULL),
(261, 'Boba', 'actif', 84, NULL, NULL),
(262, 'Congo', 'actif', 84, NULL, NULL),
(263, 'Efoloko', 'actif', 84, NULL, NULL),
(264, 'Imbali', 'actif', 84, NULL, NULL),
(265, 'Kasai', 'actif', 84, NULL, NULL),
(266, 'Kimbangu', 'actif', 84, NULL, NULL),
(267, 'Mafuta Kizola', 'actif', 84, NULL, NULL),
(268, 'Mapela', 'actif', 84, NULL, NULL),
(269, 'Lokari', 'actif', 84, NULL, NULL),
(270, 'Lubamba', 'actif', 84, NULL, NULL),
(271, 'Mandiangu', 'actif', 84, NULL, NULL),
(272, 'Kivu', 'actif', 84, NULL, NULL),
(273, 'Matadi', 'actif', 84, NULL, NULL),
(274, 'Mfumu Suka', 'actif', 84, NULL, NULL),
(275, 'Nzuzi wa Mbombo', 'actif', 84, NULL, NULL),
(276, 'Pelende', 'actif', 84, NULL, NULL),
(277, 'Sans Fil', 'actif', 84, NULL, NULL),
(278, 'Tshango', 'actif', 84, NULL, NULL),
(279, 'Tshuenge', 'actif', 84, NULL, NULL),
(280, 'Télévision', 'actif', 84, NULL, NULL),
(281, 'Kimpwanza', 'actif', 79, NULL, NULL),
(282, 'Madrandele', 'actif', 79, NULL, NULL),
(283, 'Ecole', 'actif', 79, NULL, NULL),
(284, 'Masano', 'actif', 79, NULL, NULL),
(285, 'Foire', 'actif', 79, NULL, NULL),
(286, 'Salongo', 'actif', 79, NULL, NULL),
(287, 'Livulu', 'actif', 79, NULL, NULL),
(288, 'Mbanza Lemba', 'actif', 79, NULL, NULL),
(289, 'Kemi', 'actif', 79, NULL, NULL),
(290, 'Molo', 'actif', 79, NULL, NULL),
(291, 'Gombele', 'actif', 79, NULL, NULL),
(292, 'Commercial', 'actif', 79, NULL, NULL),
(293, 'Tadi', 'actif', 79, NULL, NULL),
(294, 'Djaga', 'actif', 79, NULL, NULL),
(295, 'Malolo', 'actif', 79, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `territoires`
--

CREATE TABLE `territoires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territoire_libelle` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'actif',
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `territoires`
--

INSERT INTO `territoires` (`id`, `territoire_libelle`, `status`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Kasangulu', 'actif', 2, NULL, NULL),
(2, 'Kimvula', 'actif', 2, NULL, NULL),
(3, 'Lukula', 'actif', 2, NULL, NULL),
(4, 'Luozi', 'actif', 2, NULL, NULL),
(5, 'Madimba', 'actif', 2, NULL, NULL),
(6, 'Mbanza-Ngungu', 'actif', 2, NULL, NULL),
(7, 'Moanda', 'actif', 2, NULL, NULL),
(8, 'Seke-Banza', 'actif', 2, NULL, NULL),
(9, 'Songololo', 'actif', 2, NULL, NULL),
(10, 'Tshela', 'actif', 2, NULL, NULL),
(11, 'Feshi', 'actif', 3, NULL, NULL),
(12, 'Kahemba', 'actif', 3, NULL, NULL),
(13, 'Kasongo-Lunda', 'actif', 3, NULL, NULL),
(14, 'Kenge', 'actif', 3, NULL, NULL),
(15, 'Popokabaka', 'actif', 3, NULL, NULL),
(16, 'Bagata', 'actif', 4, NULL, NULL),
(17, 'Bulungu', 'actif', 4, NULL, NULL),
(18, 'Gungu', 'actif', 4, NULL, NULL),
(19, 'Idiofa', 'actif', 4, NULL, NULL),
(20, 'Masi-Manimba', 'actif', 4, NULL, NULL),
(21, 'Bolobo', 'actif', 5, NULL, NULL),
(22, 'Inongo', 'actif', 5, NULL, NULL),
(23, 'Kiri', 'actif', 5, NULL, NULL),
(24, 'Kutu', 'actif', 5, NULL, NULL),
(25, 'Kwamouth', 'actif', 5, NULL, NULL),
(26, 'Mushie', 'actif', 5, NULL, NULL),
(27, 'Oshwe', 'actif', 5, NULL, NULL),
(28, 'Yumbi', 'actif', 5, NULL, NULL),
(29, 'Basankusu', 'actif', 6, NULL, NULL),
(30, 'Bikoro', 'actif', 6, NULL, NULL),
(31, 'Bolomba', 'actif', 6, NULL, NULL),
(32, 'Bomongo', 'actif', 6, NULL, NULL),
(33, 'Ingende', 'actif', 6, NULL, NULL),
(34, 'Lukolela', 'actif', 6, NULL, NULL),
(35, 'Makanza', 'actif', 6, NULL, NULL),
(36, 'Bosobolo', 'actif', 7, NULL, NULL),
(37, 'Businga', 'actif', 7, NULL, NULL),
(38, 'Mobayi-Mbongo', 'actif', 7, NULL, NULL),
(39, 'Yakoma', 'actif', 7, NULL, NULL),
(40, 'Budjala', 'actif', 8, NULL, NULL),
(41, 'Gemena', 'actif', 8, NULL, NULL),
(42, 'Kungu', 'actif', 8, NULL, NULL),
(43, 'Libenge', 'actif', 8, NULL, NULL),
(44, 'Bongandanga', 'actif', 9, NULL, NULL),
(45, 'Bumba', 'actif', 9, NULL, NULL),
(46, 'Lisala', 'actif', 9, NULL, NULL),
(47, 'Befale', 'actif', 10, NULL, NULL),
(48, 'Boende', 'actif', 10, NULL, NULL),
(49, 'Bokungu', 'actif', 10, NULL, NULL),
(50, 'Djolu', 'actif', 10, NULL, NULL),
(51, 'Ikela', 'actif', 10, NULL, NULL),
(52, 'Monkoto', 'actif', 10, NULL, NULL),
(53, 'Bafwasende', 'actif', 11, NULL, NULL),
(54, 'Banalia', 'actif', 11, NULL, NULL),
(55, 'Basoko', 'actif', 11, NULL, NULL),
(56, 'Isangi', 'actif', 11, NULL, NULL),
(57, 'Opala', 'actif', 11, NULL, NULL),
(58, 'Ubundu', 'actif', 11, NULL, NULL),
(59, 'Yahuma', 'actif', 11, NULL, NULL),
(60, 'Aketi', 'actif', 12, NULL, NULL),
(61, 'Ango', 'actif', 12, NULL, NULL),
(62, 'Bambesa', 'actif', 12, NULL, NULL),
(63, 'Bondo', 'actif', 12, NULL, NULL),
(64, 'Buta', 'actif', 12, NULL, NULL),
(65, 'Poko', 'actif', 12, NULL, NULL),
(66, 'Dungu', 'actif', 13, NULL, NULL),
(67, 'Faradje', 'actif', 13, NULL, NULL),
(68, 'Niangara', 'actif', 13, NULL, NULL),
(69, 'Kinshasa', 'actif', 1, NULL, NULL),
(70, 'Barumbu', 'actif', 1, NULL, NULL),
(71, 'Bumbu', 'actif', 1, NULL, NULL),
(72, 'Gombe', 'actif', 1, NULL, NULL),
(73, 'Kalamu', 'actif', 1, NULL, NULL),
(74, 'Kasa-Vubu', 'actif', 1, NULL, NULL),
(75, 'Kimbanseke', 'actif', 1, NULL, NULL),
(76, 'Kinshasa', 'actif', 1, NULL, NULL),
(77, 'Kintambo', 'actif', 1, NULL, NULL),
(78, 'Kisenso', 'actif', 1, NULL, NULL),
(79, 'Lemba', 'actif', 1, NULL, NULL),
(80, 'Limete', 'actif', 1, NULL, NULL),
(81, 'Lingwala', 'actif', 1, NULL, NULL),
(82, 'Makala', 'actif', 1, NULL, NULL),
(83, 'Maluku', 'actif', 1, NULL, NULL),
(84, 'Masina', 'actif', 1, NULL, NULL),
(85, 'Matete', 'actif', 1, NULL, NULL),
(86, 'Mont Ngafula', 'actif', 1, NULL, NULL),
(87, 'Ndjili', 'actif', 1, NULL, NULL),
(88, 'Ngaba', 'actif', 1, NULL, NULL),
(89, 'Ngaliema', 'actif', 1, NULL, NULL),
(90, 'Ngiri-Ngiri', 'actif', 1, NULL, NULL),
(91, 'Nsele', 'actif', 1, NULL, NULL),
(92, 'Selembao', 'actif', 1, NULL, NULL),
(93, 'Bandalungwa', 'actif', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chefferies`
--
ALTER TABLE `chefferies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conjoints`
--
ALTER TABLE `conjoints`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etude_titres`
--
ALTER TABLE `etude_titres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `famille_charges`
--
ALTER TABLE `famille_charges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secteurs`
--
ALTER TABLE `secteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `territoires`
--
ALTER TABLE `territoires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chefferies`
--
ALTER TABLE `chefferies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `conjoints`
--
ALTER TABLE `conjoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enfants`
--
ALTER TABLE `enfants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etude_titres`
--
ALTER TABLE `etude_titres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille_charges`
--
ALTER TABLE `famille_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `secteurs`
--
ALTER TABLE `secteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT pour la table `territoires`
--
ALTER TABLE `territoires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
