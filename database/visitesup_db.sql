-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 13 avr. 2021 à 16:54
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `virutale_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionsvisiteur`
--

CREATE TABLE `actionsvisiteur` (
  `actionVisiteurID` int(100) NOT NULL,
  `visiteID` int(15) NOT NULL,
  `typeAction` varchar(20) NOT NULL,
  `descriptionAction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `adminID` int(5) NOT NULL,
  `login` varchar(10) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenoms` varchar(55) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `categorie` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `badgevisiteurs`
--

CREATE TABLE `badgevisiteurs` (
  `badgeID` int(11) NOT NULL,
  `isForMe` tinyint(1) NOT NULL DEFAULT '1',
  `affilliation` varchar(45) DEFAULT NULL,
  `nomVisiteur` varchar(20) DEFAULT NULL,
  `prenomVisiteur` varchar(55) DEFAULT NULL,
  `numTelVisiteur` varchar(15) DEFAULT NULL,
  `niveauEtudes` varchar(255) DEFAULT NULL,
  `anneeBac` int(4) DEFAULT NULL,
  `typeBac` varchar(255) DEFAULT NULL,
  `etablissementActuel` varchar(255) DEFAULT NULL,
  `orientationetudSup` varchar(255) DEFAULT NULL,
  `domaineExpePro` varchar(255) DEFAULT NULL,
  `experiencePro` varchar(255) DEFAULT NULL,
  `visiteurID` int(15) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badgevisiteurs`
--

INSERT INTO `badgevisiteurs` (`badgeID`, `isForMe`, `affilliation`, `nomVisiteur`, `prenomVisiteur`, `numTelVisiteur`, `niveauEtudes`, `anneeBac`, `typeBac`, `etablissementActuel`, `orientationetudSup`, `domaineExpePro`, `experiencePro`, `visiteurID`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, NULL, NULL, '08987654', NULL, 2020, 'bac sciences mathématiques b', NULL, NULL, '', 'a', 11, '2021-04-11 14:45:01', '2021-04-11 14:45:01'),
(2, 1, NULL, NULL, NULL, '08987654', NULL, 2020, 'bac sciences mathématiques b', NULL, NULL, '', 'Aucune expérience', 13, '2021-04-11 15:08:46', '2021-04-11 15:08:46'),
(3, 1, NULL, NULL, NULL, '08987654', NULL, 2020, 'bac sciences mathématiques b', NULL, NULL, '', 'Aucune expérience', 14, '2021-04-11 15:11:15', '2021-04-11 15:11:15'),
(4, 1, NULL, NULL, NULL, '08987654', NULL, 2013, 'bac sciences agronomiques', NULL, NULL, '', 'Techniciens agronnaume chez partyGro', 15, '2021-04-11 15:13:07', '2021-04-11 15:13:07'),
(5, 1, 'parent', 'Jule', 'Gregoire', '0678987609', NULL, 2013, 'bac sciences mathématiques a', NULL, NULL, '', NULL, 23, '2021-04-11 15:24:45', '2021-04-11 15:24:45'),
(6, 1, NULL, NULL, NULL, '08987654', NULL, 2013, 'bac sciences mathématiques a', NULL, NULL, '', NULL, 24, '2021-04-11 15:29:14', '2021-04-11 15:29:14'),
(7, 1, NULL, NULL, NULL, '098765432', NULL, NULL, NULL, NULL, NULL, '', NULL, 25, '2021-04-11 15:30:06', '2021-04-11 15:30:06'),
(8, 1, 'parent', 'Jule1', 'Gregoire2', '0678987609', NULL, NULL, NULL, NULL, NULL, '', NULL, 26, '2021-04-11 15:31:54', '2021-04-11 15:31:54'),
(9, 1, NULL, NULL, NULL, '098765432', 'primaire', NULL, NULL, 'Lycee LLV', 'Aucune', NULL, NULL, 28, '2021-04-11 15:35:47', '2021-04-11 15:35:47'),
(10, 0, 'autre', 'Gate', 'Ryaon', '0678987609', 'collège', NULL, NULL, 'Lycee Hassan II', 'Ingénierie de conception', NULL, NULL, 30, '2021-04-11 15:38:21', '2021-04-11 15:38:21'),
(11, 1, NULL, NULL, NULL, NULL, NULL, 2020, 'bac sciences agronomiques', NULL, NULL, '', 'Aucune', 32, '2021-04-13 14:19:10', '2021-04-13 14:19:10'),
(12, 1, NULL, NULL, NULL, NULL, NULL, 2020, 'bac sciences mathématiques b', NULL, NULL, '', 'Aucune', 33, '2021-04-13 15:52:51', '2021-04-13 15:52:51');

-- --------------------------------------------------------

--
-- Structure de la table `conseilerorientation`
--

CREATE TABLE `conseilerorientation` (
  `conseilerOrientationID` int(11) NOT NULL,
  `nomConseiler` varchar(20) NOT NULL,
  `prenConseiler` varchar(55) NOT NULL,
  `contactConseiler` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `etablissementID` int(11) NOT NULL,
  `nomEtabli` varchar(255) NOT NULL,
  `typeEtabli` varchar(60) NOT NULL,
  `sitewebEtabli` varchar(255) NOT NULL,
  `lienVisiteEtabli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ficheinfoetablissement`
--

CREATE TABLE `ficheinfoetablissement` (
  `ficheInfoID` int(11) NOT NULL,
  `downloadLink` varchar(255) NOT NULL,
  `nbdownload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_04_08_235837_test', 1),
(9, '2021_04_11_132836_add_updated_at_to_visiteurs_table', 2),
(10, '2021_04_11_140342_add_updated_at_to_badgevisiteurs_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `visioconf`
--

CREATE TABLE `visioconf` (
  `visioConfID` int(11) NOT NULL,
  `actionVisiteID` int(11) NOT NULL,
  `visioConflink` varchar(255) NOT NULL,
  `visioConfDateTime` datetime NOT NULL,
  `dureevisioConf` int(11) NOT NULL,
  `lienEnregVisioConf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `visiteID` int(15) NOT NULL,
  `visiteurID` int(15) NOT NULL,
  `etablissementID` int(11) NOT NULL,
  `visteDateTime` datetime NOT NULL,
  `visiteDuree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `visiteurID` int(11) NOT NULL,
  `nomVisiteur` varchar(20) NOT NULL,
  `prenomVisiteur` varchar(45) NOT NULL,
  `loginVisiteur` varchar(35) NOT NULL,
  `emailVisiteur` varchar(255) NOT NULL,
  `pwdVisiteur` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`visiteurID`, `nomVisiteur`, `prenomVisiteur`, `loginVisiteur`, `emailVisiteur`, `pwdVisiteur`, `updated_at`, `created_at`) VALUES
(1, 'Guei', 'Marc', 'ge@gmail.com', 'ge@gmail.com', '@123.', '2021-04-11 13:31:09', '2021-04-11 13:31:09'),
(2, 'Mesk', 'Tery', 'e@gmail.com', 'e@gmail.com', '@123.', '2021-04-11 13:32:41', '2021-04-11 13:32:41'),
(4, 'Mesk', 'Tery', 't@gmail.com', 't@gmail.com', '@123.', '2021-04-11 13:35:14', '2021-04-11 13:35:14'),
(5, 'Kaou', 'Tery', 'h@gmail.com', 'h@gmail.com', '@123.', '2021-04-11 13:38:35', '2021-04-11 13:38:35'),
(6, 'TestNom', 'Tes Prenom', 'test@gmail.com', 'test@gmail.com', '@123.', '2021-04-11 13:49:33', '2021-04-11 13:49:33'),
(7, 'TestNom', 'Tes Prenom', 'test0@gmail.com', 'test0@gmail.com', '@123.', '2021-04-11 13:52:32', '2021-04-11 13:52:32'),
(8, 'TestNom', 'Tes Prenom', 'test01@gmail.com', 'test01@gmail.com', '@123.', '2021-04-11 13:54:37', '2021-04-11 13:54:37'),
(9, 'TestNom', 'Tes Prenom', 'test013@gmail.com', 'test013@gmail.com', '@123.', '2021-04-11 13:56:00', '2021-04-11 13:56:00'),
(10, 'Nom', 'Prenoms users', 'test093@gmail.com', 'test093@gmail.com', '@123.', '2021-04-11 13:58:51', '2021-04-11 13:58:51'),
(11, 'Nomd', 'Prenoms usersd', 'd@gmail.com', 'd@gmail.com', '@123.', '2021-04-11 14:44:59', '2021-04-11 14:44:59'),
(13, 'Allalo', 'Sirylle', 'd12@gmail.com', 'd12@gmail.com', '@123.', '2021-04-11 15:08:44', '2021-04-11 15:08:44'),
(14, 'SomeName', 'Some Prenoms', 'sommail@gmail.com', 'sommail@gmail.com', '@123.', '2021-04-11 15:11:13', '2021-04-11 15:11:13'),
(15, 'SomeName', 'Some Prenoms', 'mail@gmail.com', 'mail@gmail.com', '@123.', '2021-04-11 15:13:05', '2021-04-11 15:13:05'),
(17, 'SomeName', 'Some Prenoms', 'testmail21@gmail.com', 'testmail21@gmail.com', '@123.', '2021-04-11 15:17:19', '2021-04-11 15:17:19'),
(18, 'SomeName', 'Some Prenoms', 'ttmail21@gmail.com', 'ttmail21@gmail.com', '@123.', '2021-04-11 15:17:57', '2021-04-11 15:17:57'),
(20, 'SomeName', 'Some Prenoms', 'y00mail21@gmail.com', 'y00mail21@gmail.com', '@123.', '2021-04-11 15:18:56', '2021-04-11 15:18:56'),
(21, 'SomeName', 'Some Prenoms', 't98mail@gmail.com', 't98mail@gmail.com', '@123.', '2021-04-11 15:23:12', '2021-04-11 15:23:12'),
(22, 'SomeName', 'Some Prenoms', 't8mail@gmail.com', 't8mail@gmail.com', '@123.', '2021-04-11 15:23:36', '2021-04-11 15:23:36'),
(23, 'SomeName', 'Some Prenoms', 't1mail@gmail.com', 't1mail@gmail.com', '@123.', '2021-04-11 15:24:39', '2021-04-11 15:24:39'),
(24, 'SomeName', 'Some Prenoms', 'tomail@gmail.com', 'tomail@gmail.com', '@123.', '2021-04-11 15:29:13', '2021-04-11 15:29:13'),
(25, 'SomeName', 'Some Prenoms', 't_mail@gmail.com', 't_mail@gmail.com', '@123.', '2021-04-11 15:30:04', '2021-04-11 15:30:04'),
(26, 'SomeName', 'Some Prenoms', 'u7mail@gmail.com', 'u7mail@gmail.com', '@123.', '2021-04-11 15:31:52', '2021-04-11 15:31:52'),
(27, 'SomeName', 'Some Prenoms', 'u-mail@gmail.com', 'u-mail@gmail.com', '@123.', '2021-04-11 15:34:37', '2021-04-11 15:34:37'),
(28, 'SomeName', 'Some Prenoms', 'u-3mail@gmail.com', 'u-3mail@gmail.com', '@123.', '2021-04-11 15:35:46', '2021-04-11 15:35:46'),
(30, 'SomeName', 'Some Prenoms', 'dg78@gmail.com', 'dg78@gmail.com', '@123.', '2021-04-11 15:38:19', '2021-04-11 15:38:19'),
(32, 'Yanh', 'Yanh', 'yanh@gmail.com', 'yanh@gmail.com', '@123.', '2021-04-13 14:19:08', '2021-04-13 14:19:08'),
(33, 'Yan', 'Yan', 'yan@gmail.com', 'yan@gmail.com', '@123.', '2021-04-13 15:52:49', '2021-04-13 15:52:49'),
(34, 'Yho', 'Yho Man', 'mand@gmail.com', 'mand@gmail.com', '@123.', '2021-04-13 16:04:41', '2021-04-13 16:04:41'),
(35, 'Yho', 'Yho Man', 'man@gmail.com', 'man@gmail.com', '@123.', '2021-04-13 16:07:04', '2021-04-13 16:07:04'),
(36, 'Hicham', 'Kourimate', 'mate@gmail.com', 'mate@gmail.com', '@123.', '2021-04-13 16:11:00', '2021-04-13 16:11:00'),
(37, 'Hicham', 'Kourimate', 'k@gmail.com', 'k@gmail.com', '@123.', '2021-04-13 16:15:13', '2021-04-13 16:15:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actionsvisiteur`
--
ALTER TABLE `actionsvisiteur`
  ADD PRIMARY KEY (`actionVisiteurID`),
  ADD KEY `fk_visiteID` (`visiteID`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`adminID`);

--
-- Index pour la table `badgevisiteurs`
--
ALTER TABLE `badgevisiteurs`
  ADD PRIMARY KEY (`badgeID`),
  ADD KEY `tfk_visiteurID` (`visiteurID`);

--
-- Index pour la table `conseilerorientation`
--
ALTER TABLE `conseilerorientation`
  ADD PRIMARY KEY (`conseilerOrientationID`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`etablissementID`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ficheinfoetablissement`
--
ALTER TABLE `ficheinfoetablissement`
  ADD PRIMARY KEY (`ficheInfoID`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `visioconf`
--
ALTER TABLE `visioconf`
  ADD PRIMARY KEY (`visioConfID`),
  ADD KEY `fk_actionVisiteID` (`actionVisiteID`);

--
-- Index pour la table `visites`
--
ALTER TABLE `visites`
  ADD PRIMARY KEY (`visiteID`),
  ADD KEY `fk_etablissementID` (`etablissementID`),
  ADD KEY `fk_visiteurID` (`visiteurID`) USING BTREE;

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`visiteurID`),
  ADD UNIQUE KEY `uk_loginvisiteur` (`loginVisiteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actionsvisiteur`
--
ALTER TABLE `actionsvisiteur`
  MODIFY `actionVisiteurID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `badgevisiteurs`
--
ALTER TABLE `badgevisiteurs`
  MODIFY `badgeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `conseilerorientation`
--
ALTER TABLE `conseilerorientation`
  MODIFY `conseilerOrientationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `etablissementID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ficheinfoetablissement`
--
ALTER TABLE `ficheinfoetablissement`
  MODIFY `ficheInfoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visioconf`
--
ALTER TABLE `visioconf`
  MODIFY `visioConfID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visites`
--
ALTER TABLE `visites`
  MODIFY `visiteID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `visiteurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionsvisiteur`
--
ALTER TABLE `actionsvisiteur`
  ADD CONSTRAINT `actionsvisiteur_ibfk_1` FOREIGN KEY (`visiteID`) REFERENCES `visites` (`visiteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `badgevisiteurs`
--
ALTER TABLE `badgevisiteurs`
  ADD CONSTRAINT `tfk_visiteurID` FOREIGN KEY (`visiteurID`) REFERENCES `visiteurs` (`visiteurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `visites`
--
ALTER TABLE `visites`
  ADD CONSTRAINT `fk_etablissementID` FOREIGN KEY (`etablissementID`) REFERENCES `etablissements` (`etablissementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_visiteurID` FOREIGN KEY (`visiteurID`) REFERENCES `visiteurs` (`visiteurID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
