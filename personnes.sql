-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 31 mai 2024 à 14:39
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
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idnat` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `postnom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` timestamp NULL DEFAULT NULL,
  `sexe` varchar(255) NOT NULL,
  `etat_civil` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `nbre_personne_famille` varchar(255) DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `territoire_id` bigint(20) UNSIGNED NOT NULL,
  `secteur_id` bigint(20) UNSIGNED NOT NULL,
  `chefferie_id` bigint(20) UNSIGNED NOT NULL,
  `niveau_etude` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `profession_institution` varchar(255) DEFAULT NULL,
  `nationalite` varchar(255) NOT NULL DEFAULT 'congolaise',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `idnat`, `photo`, `nom`, `postnom`, `prenom`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `email`, `telephone`, `nbre_personne_famille`, `province_id`, `territoire_id`, `secteur_id`, `chefferie_id`, `niveau_etude`, `profession`, `profession_institution`, `nationalite`, `created_at`, `updated_at`) VALUES
(1, 'D4N85E72', 'http://127.0.0.1:8000/uploads/persons/1717158696.png', 'KALOMBO', 'KAYEMBE', 'Fridolin', '1999-06-19 23:00:00', 'M', 'celibataire', '039, Kinshasa', 'freddy@gmail.com', '0394883939', NULL, 1, 79, 285, 1, NULL, 'IT Developer', NULL, 'congolaise', '2024-05-31 11:31:36', '2024-05-31 11:31:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
