-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 02:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madrasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anneescolaires`
--

CREATE TABLE `anneescolaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anneeactive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anneescolaires`
--

INSERT INTO `anneescolaires` (`id`, `datedebut`, `datefin`, `label`, `anneeactive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2019-10-29', '2019-12-03 19:46:12', '2018/2019', 1, '2019-11-16 17:46:18', '2019-11-16 17:46:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `label_fr`, `label_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sciences expérimentales', 'العلوم التجريبية', NULL, NULL, NULL),
(2, 'Sciences physiques chimies', 'العلوم الفيزيائية و الكيميائية', NULL, NULL, NULL),
(3, 'Sciences économiques', 'العلوم الإقتصادية', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `circuits`
--

CREATE TABLE `circuits` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vehicule_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idmassar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `niveau_id` int(10) UNSIGNED DEFAULT NULL,
  `branche_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `code`, `label_fr`, `idmassar`, `capacite`, `created_at`, `updated_at`, `deleted_at`, `niveau_id`, `branche_id`) VALUES
(52, 'PS-1', 'PS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'MS-1', 'MS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'MS-2', 'MS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'GS-1', 'GS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'GS-2', 'GS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '1AEP-1', '1AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '1AEP-2', '1AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '1AEP-3', '1AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '2AEP-1', '2AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '2AEP-2', '2AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2AEP-3', '2AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '3AEP-1', '3AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '3AEP-2', '3AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '3AEP-3', '3AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '4AEP-1', '4AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '5AEP-1', '5AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '6AEP-1', '6AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'PS-2', 'PS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '4AEP-2', '4AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '5AEP-2', '5AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '6AEP-2', '6AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '4AEP-3', '4AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'TPS-1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'TPS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'GS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'PS-1', 'PS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'MS-1', 'MS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'MS-2', 'MS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'GS-1', 'GS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'GS-2', 'GS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '1AEP-1', '1AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '1AEP-2', '1AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '1AEP-3', '1AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '2AEP-1', '2AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '2AEP-2', '2AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '2AEP-3', '2AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '3AEP-1', '3AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '3AEP-2', '3AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '3AEP-3', '3AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '4AEP-1', '4AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '5AEP-1', '5AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '6AEP-1', '6AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'PS-2', 'PS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '4AEP-2', '4AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '5AEP-2', '5AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '6AEP-2', '6AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '4AEP-3', '4AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'TPS-1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'TPS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'GS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '5AEP-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'PS-1', 'PS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'MS-1', 'MS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'MS-2', 'MS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'GS-1', 'GS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'GS-2', 'GS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '1AEP-1', '1AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '1AEP-2', '1AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '1AEP-3', '1AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '2AEP-1', '2AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '2AEP-2', '2AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '2AEP-3', '2AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '3AEP-1', '3AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '3AEP-2', '3AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '3AEP-3', '3AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '4AEP-1', '4AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '5AEP-1', '5AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '6AEP-1', '6AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'PS-2', 'PS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '4AEP-2', '4AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '5AEP-2', '5AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '6AEP-2', '6AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '4AEP-3', '4AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'TPS-1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'TPS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'GS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '5AEP-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '6AEP-3', '6AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'MS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'PS-1', 'PS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'MS-1', 'MS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'MS-2', 'MS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'GS-1', 'GS-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'GS-2', 'GS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '1AEP-1', '1AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '1AEP-2', '1AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '1AEP-3', '1AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '2AEP-1', '2AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '2AEP-2', '2AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '2AEP-3', '2AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '3AEP-1', '3AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '3AEP-2', '3AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '3AEP-3', '3AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '4AEP-1', '4AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '5AEP-1', '5AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '6AEP-1', '6AEP-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'PS-2', 'PS-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '4AEP-2', '4AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '5AEP-2', '5AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '6AEP-2', '6AEP-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '4AEP-3', '4AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'TPS-1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'TPS', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'GS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '5AEP-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '6AEP-3', '6AEP-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'MS-3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'GS-4', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `communes`
--

CREATE TABLE `communes` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communes`
--

INSERT INTO `communes` (`id`, `label_fr`, `label_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casablanca', NULL, NULL, NULL, NULL),
(2, 'Aîn-chock', NULL, NULL, NULL, NULL),
(3, 'Aîn-sebaâ', NULL, NULL, NULL, NULL),
(4, 'Anfa', NULL, NULL, NULL, NULL),
(5, 'Al-fida', NULL, NULL, NULL, NULL),
(6, 'Assoukhour Assawda', NULL, NULL, NULL, NULL),
(7, 'Ben M\'sick', NULL, NULL, NULL, NULL),
(8, 'El Maarif', NULL, NULL, NULL, NULL),
(9, 'Hay-hassani', NULL, NULL, NULL, NULL),
(10, 'Hay Mohammadi', NULL, NULL, NULL, NULL),
(11, 'Mers-sultan', NULL, NULL, NULL, NULL),
(12, 'Moulay Rachid', NULL, NULL, NULL, NULL),
(13, 'Sbata', NULL, NULL, NULL, NULL),
(14, 'Sidi Belyout', NULL, NULL, NULL, NULL),
(15, 'Sidi Bernoussi', NULL, NULL, NULL, NULL),
(16, 'Sidi Moumen', NULL, NULL, NULL, NULL),
(17, 'Sidi Othmane', NULL, NULL, NULL, NULL),
(18, 'Mechouar De Casablanca', NULL, NULL, NULL, NULL),
(19, 'Mediouna', NULL, NULL, NULL, NULL),
(20, 'Tit Mellil', NULL, NULL, NULL, NULL),
(21, 'Al Majjatia Oulad Taleb', NULL, NULL, NULL, NULL),
(22, 'Lahraouyine', NULL, NULL, NULL, NULL),
(23, 'Sidi Hajjaj Oued Hassar', NULL, NULL, NULL, NULL),
(24, 'Mohammedia', NULL, NULL, NULL, NULL),
(25, 'Ain Harrouda(m)', NULL, NULL, NULL, NULL),
(26, 'Mohammedia', NULL, NULL, NULL, NULL),
(27, 'Bni Yakhlef', NULL, NULL, NULL, NULL),
(28, 'Ech-challalate', NULL, NULL, NULL, NULL),
(29, 'Sidi Moussa Ben Ali', NULL, NULL, NULL, NULL),
(30, 'Sidi Moussa Majdoub', NULL, NULL, NULL, NULL),
(31, 'Nouaceur', NULL, NULL, NULL, NULL),
(32, 'Bouskoura', NULL, NULL, NULL, NULL),
(33, 'Dar Bouazza', NULL, NULL, NULL, NULL),
(34, 'Oulad Salah', NULL, NULL, NULL, NULL),
(35, 'Ouled Azouz', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cycles`
--

CREATE TABLE `cycles` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cycles`
--

INSERT INTO `cycles` (`id`, `label_fr`, `label_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maternelle', 'الحضانة', NULL, NULL, NULL),
(2, 'Primaire', 'الإبتدائي', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

CREATE TABLE `eleves` (
  `id` int(10) UNSIGNED NOT NULL,
  `matricule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` int(11) DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cne` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idmassar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `datepremiereentree` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupesangin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_handicaped` tinyint(4) DEFAULT 0,
  `pediatrenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telpediatre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `particularites` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traitement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbreanneedouble` int(11) DEFAULT NULL,
  `allergiealimentaire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intolerancealimentaire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comportementalimentaire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `famille_id` int(10) UNSIGNED DEFAULT NULL,
  `tuteur_id` int(10) UNSIGNED DEFAULT NULL,
  `quartier_id` int(10) UNSIGNED DEFAULT NULL,
  `img_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eleves`
--

INSERT INTO `eleves` (`id`, `matricule`, `prenom_fr`, `prenom_ar`, `nom_fr`, `nom_ar`, `sexe`, `cin`, `cne`, `idmassar`, `tel`, `adresse`, `datenaissance`, `datepremiereentree`, `email`, `nationalite`, `groupesangin`, `is_handicaped`, `pediatrenom`, `telpediatre`, `allergies`, `particularites`, `traitement`, `nbreanneedouble`, `allergiealimentaire`, `intolerancealimentaire`, `comportementalimentaire`, `created_at`, `updated_at`, `deleted_at`, `famille_id`, `tuteur_id`, `quartier_id`, `img_path`) VALUES
(1, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-16', '2019-11-16', 'example@example.net', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-16 17:47:10', '2019-11-16 17:47:10', NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'reda', NULL, 'hiuy', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, 'mo', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 07:53:13', '2019-11-17 07:53:13', NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'had', NULL, 'syd jdid', 'kl', 1, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, 'lpo', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 08:34:28', '2019-11-17 08:34:28', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'dhj', 'hjdhj', 'hjdhj', 'hjdhj', NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:18:18', '2019-11-17 09:18:18', NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'reda', 'hjdhj', 'hiuy', 'kl', 1, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:21:49', '2019-11-17 09:21:49', NULL, NULL, NULL, NULL, NULL),
(6, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:24:04', '2019-11-17 09:24:04', NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'kl', NULL, 'kl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:29:52', '2019-11-17 09:29:52', NULL, NULL, NULL, NULL, NULL),
(8, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:35:41', '2019-11-17 09:35:41', NULL, NULL, NULL, NULL, NULL),
(9, NULL, 'dko', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:37:28', '2019-11-17 09:37:28', NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:41:34', '2019-11-17 10:18:28', '2019-11-17 10:18:28', NULL, NULL, NULL, NULL),
(11, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:42:42', '2019-11-17 10:18:24', '2019-11-17 10:18:24', NULL, NULL, NULL, NULL),
(12, NULL, 'reda', NULL, 'hiuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 09:46:41', '2019-11-17 10:18:21', '2019-11-17 10:18:21', NULL, NULL, NULL, NULL),
(13, NULL, 'fgdg', 'hg', 'jkoi', NULL, 0, 'BK374565', NULL, NULL, NULL, NULL, '2019-11-17', '2019-11-17', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 10:36:27', '2019-11-17 11:04:04', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `familles`
--

CREATE TABLE `familles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateentree` datetime DEFAULT NULL,
  `interne` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `classe_id` int(10) UNSIGNED DEFAULT NULL,
  `circuit_id` int(10) UNSIGNED DEFAULT NULL,
  `niveau_id` int(10) UNSIGNED DEFAULT NULL,
  `anneescolaire_id` int(10) UNSIGNED DEFAULT NULL,
  `preinscription_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienparentes`
--

CREATE TABLE `lienparentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienparentes`
--

INSERT INTO `lienparentes` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Père', NULL, NULL, NULL),
(2, 'Mère', NULL, NULL, NULL),
(3, 'Frère', NULL, NULL, NULL),
(4, 'Sœur', NULL, NULL, NULL),
(5, 'Oncle(p)', NULL, NULL, NULL),
(6, 'Tante(p)', NULL, NULL, NULL),
(7, 'Oncle(m)', NULL, NULL, NULL),
(8, 'Tante(m)', NULL, NULL, NULL),
(9, 'Grand père', NULL, NULL, NULL),
(10, 'Grand-mère', NULL, NULL, NULL),
(11, 'Ami de la famille', NULL, NULL, NULL),
(12, 'Autre', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2000_01_01_000000_create_media_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_11_16_143035_create_1573907435_permissions_table', 1),
(10, '2019_11_16_143036_create_1573907436_roles_table', 1),
(11, '2019_11_16_143039_create_1573907439_users_table', 1),
(12, '2019_11_16_143040_create_5dcfebee85e88_permission_role_table', 1),
(13, '2019_11_16_143043_create_5dcfebf1337f2_role_user_table', 1),
(14, '2019_11_16_143109_update_1573907469_users_table', 1),
(15, '2019_11_16_143111_custom_1573907471_approve_existing_users', 1),
(16, '2019_11_16_143122_create_1573907481_user_actions_table', 1),
(17, '2019_11_16_143123_add_5dcfec1ac120a_relationships_to_useraction_table', 1),
(18, '2019_11_16_143237_add_5dcfec6546bfa_relationships_to_useraction_table', 1),
(19, '2019_11_16_144108_create_1573908068_preinscriptions_table', 1),
(20, '2019_11_16_144215_drop_5dcfeea7659c1_preinscriptions_table', 1),
(21, '2019_11_16_144418_create_1573908258_anneescolaires_table', 1),
(22, '2019_11_16_144851_create_1573908531_cycles_table', 1),
(23, '2019_11_16_144918_create_1573908558_niveaux_table', 1),
(24, '2019_11_16_144945_create_1573908585_branches_table', 1),
(25, '2019_11_16_145118_create_1573908678_classes_table', 1),
(26, '2019_11_16_145249_add_5dcff121c7070_relationships_to_classe_table', 1),
(27, '2019_11_16_145408_create_1573908848_quartiers_table', 1),
(28, '2019_11_16_145446_create_1573908886_vehicules_table', 1),
(29, '2019_11_16_145551_create_1573908950_circuits_table', 1),
(30, '2019_11_16_145552_add_5dcff1d831816_relationships_to_circuit_table', 1),
(31, '2019_11_16_145614_add_5dcff1ee1bd50_relationships_to_circuit_table', 1),
(32, '2019_11_16_145812_create_1573909092_familles_table', 1),
(33, '2019_11_16_145846_create_1573909126_lienparentes_table', 1),
(34, '2019_11_16_145915_create_1573909155_communes_table', 1),
(35, '2019_11_16_150054_create_1573909253_tuteurs_table', 1),
(36, '2019_11_16_150055_add_5dcff3080ebdf_relationships_to_tuteur_table', 1),
(37, '2019_11_16_150250_create_1573909369_eleves_table', 1),
(38, '2019_11_16_150251_add_5dcff37d859e4_relationships_to_eleve_table', 1),
(39, '2019_11_16_150413_add_5dcff3cd742eb_relationships_to_eleve_table', 1),
(40, '2019_11_16_150444_add_5dcff3ecd74cf_relationships_to_eleve_table', 1),
(41, '2019_11_16_150622_create_1573909581_preinscriptions_table', 1),
(42, '2019_11_16_150623_add_5dcff44fd0efa_relationships_to_preinscription_table', 1),
(43, '2019_11_16_150755_create_1573909674_inscriptions_table', 1),
(44, '2019_11_16_150756_add_5dcff4ac1502c_relationships_to_inscription_table', 1),
(45, '2019_11_16_151157_add_5dcff59d6b200_relationships_to_inscription_table', 1),
(46, '2019_11_16_151247_add_5dcff5cf26ae8_relationships_to_preinscription_table', 1),
(47, '2019_11_16_151403_add_5dcff61bd4e5a_relationships_to_preinscription_table', 1),
(48, '2019_11_16_154134_update_1573911694_eleves_table', 1),
(49, '2019_11_16_154135_add_5dcffc8fa39c6_relationships_to_eleve_table', 1),
(50, '2019_11_16_154858_add_5dcffe4a770f4_relationships_to_eleve_table', 1),
(51, '2019_11_16_202023_add_5dd03de71391d_relationships_to_preinscription_table', 1),
(52, '2019_11_16_202227_update_1573928547_inscriptions_table', 1),
(53, '2019_11_16_202228_add_5dd03e6488368_relationships_to_inscription_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `label_fr`, `label_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toute petite section', '', NULL, NULL, NULL),
(2, 'Petite section', '', NULL, NULL, NULL),
(3, 'Moyenne section', '', NULL, NULL, NULL),
(4, 'Grande section', '', NULL, NULL, NULL),
(5, '1AEP', 'الأول إبتدائي', NULL, NULL, NULL),
(6, '2AEP', 'الثاني إبتدائي', NULL, NULL, NULL),
(7, '3AEP', 'الثالث إبتدائي', NULL, NULL, NULL),
(8, '4AEP', 'الرابع إبتدائي', NULL, NULL, NULL),
(9, '5AEP', 'الخامس إبتدائي', NULL, NULL, NULL),
(10, '6AEP', 'السادس إبتدائي', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'user_management_access', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(2, 'permission_access', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(3, 'permission_create', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(4, 'permission_edit', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(5, 'permission_view', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(6, 'permission_delete', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(7, 'role_access', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(8, 'role_create', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(9, 'role_edit', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(10, 'role_view', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(11, 'role_delete', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(12, 'user_access', '2019-11-16 17:31:02', '2019-11-16 17:31:02'),
(13, 'user_create', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(14, 'user_edit', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(15, 'user_view', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(16, 'user_delete', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(17, 'user_action_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(18, 'parametre_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(19, 'etudiant_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(20, 'gestion_des_class_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(21, 'transport_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(27, 'anneescolaire_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(28, 'anneescolaire_create', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(29, 'anneescolaire_edit', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(30, 'anneescolaire_view', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(31, 'anneescolaire_delete', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(32, 'cycle_access', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(33, 'cycle_create', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(34, 'cycle_edit', '2019-11-16 17:31:03', '2019-11-16 17:31:03'),
(35, 'cycle_view', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(36, 'cycle_delete', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(37, 'niveau_access', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(38, 'niveau_create', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(39, 'niveau_edit', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(40, 'niveau_view', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(41, 'niveau_delete', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(42, 'branche_access', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(43, 'branche_create', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(44, 'branche_edit', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(45, 'branche_view', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(46, 'branche_delete', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(47, 'classe_access', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(48, 'classe_create', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(49, 'classe_edit', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(50, 'classe_view', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(51, 'classe_delete', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(52, 'quartier_access', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(53, 'quartier_create', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(54, 'quartier_edit', '2019-11-16 17:31:04', '2019-11-16 17:31:04'),
(55, 'quartier_view', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(56, 'quartier_delete', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(57, 'vehicule_access', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(58, 'vehicule_create', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(59, 'vehicule_edit', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(60, 'vehicule_view', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(61, 'vehicule_delete', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(62, 'circuit_access', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(63, 'circuit_create', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(64, 'circuit_edit', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(65, 'circuit_view', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(66, 'circuit_delete', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(67, 'famille_access', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(68, 'famille_create', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(69, 'famille_edit', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(70, 'famille_view', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(71, 'famille_delete', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(72, 'lienparente_access', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(73, 'lienparente_create', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(74, 'lienparente_edit', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(75, 'lienparente_view', '2019-11-16 17:31:05', '2019-11-16 17:31:05'),
(76, 'lienparente_delete', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(77, 'commune_access', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(78, 'commune_create', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(79, 'commune_edit', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(80, 'commune_view', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(81, 'commune_delete', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(82, 'tuteur_access', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(83, 'tuteur_create', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(84, 'tuteur_edit', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(85, 'tuteur_view', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(86, 'tuteur_delete', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(87, 'eleve_access', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(88, 'eleve_create', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(89, 'eleve_edit', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(90, 'eleve_view', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(91, 'eleve_delete', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(92, 'preinscription_access', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(93, 'preinscription_create', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(94, 'preinscription_edit', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(95, 'preinscription_view', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(96, 'preinscription_delete', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(97, 'inscription_access', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(98, 'inscription_create', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(99, 'inscription_edit', '2019-11-16 17:31:06', '2019-11-16 17:31:06'),
(100, 'inscription_view', '2019-11-16 17:31:07', '2019-11-16 17:31:07'),
(101, 'inscription_delete', '2019-11-16 17:31:07', '2019-11-16 17:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2);

-- --------------------------------------------------------

--
-- Table structure for table `preinscriptions`
--

CREATE TABLE `preinscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomprofesseurtest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notetest` double(15,2) DEFAULT NULL,
  `resultattest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_acceptedintest` tinyint(4) DEFAULT 0,
  `fraistest` int(11) DEFAULT NULL,
  `fraispayed` tinyint(4) DEFAULT 0,
  `transport` tinyint(4) DEFAULT 0,
  `datetest` datetime DEFAULT NULL,
  `datelimiteinscription` datetime DEFAULT NULL,
  `observations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `anneescolaire_id` int(10) UNSIGNED DEFAULT NULL,
  `eleve_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preinscriptions`
--

INSERT INTO `preinscriptions` (`id`, `nomprofesseurtest`, `notetest`, `resultattest`, `is_acceptedintest`, `fraistest`, `fraispayed`, `transport`, `datetest`, `datelimiteinscription`, `observations`, `created_at`, `updated_at`, `deleted_at`, `anneescolaire_id`, `eleve_id`) VALUES
(1, 'djk', 90.00, '90', 1, -1, 1, 1, '2019-11-16 19:47:31', '2019-11-16 19:47:32', NULL, '2019-11-16 17:47:44', '2019-11-16 17:47:44', NULL, 1, 1),
(2, NULL, NULL, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '2019-11-17 10:04:28', '2019-11-17 10:04:28', NULL, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `quartiers`
--

CREATE TABLE `quartiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quartiers`
--

INSERT INTO `quartiers` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HAY MY ABDALLAH HAY CHABAB YASMINA BD KHALIL', NULL, NULL, NULL),
(2, 'AIN CHOK HAY RMILA BIN LAMDOUNE DERB LKHIR', NULL, NULL, NULL),
(3, 'SIDI MAAROUF LIA ABDELMOUMEN', NULL, NULL, NULL),
(4, 'AL OMARIA MANDARONA JNANE CALIFORNIE BD QODS', NULL, NULL, NULL),
(5, 'INARA HAY FATH HAY FADL SIDI MASSOUD ', NULL, NULL, NULL),
(6, 'SBATA JAMILA ... MASSOUDIA', NULL, NULL, NULL),
(7, 'DRISSIA IFRIQUIA HAY FARAH BOURNAZIL', NULL, NULL, NULL),
(8, 'L\'HERMITAGE OULAD ZIANE BEN TACHFINE LA VILLETTE', NULL, NULL, NULL),
(9, 'SALMIA HAY ENNOUR EL BAIDA THEATRE MUNICIPAL SIDI OYHMANE', NULL, NULL, NULL),
(10, 'SIDI OTMANE BD NIL DRISS HARTI IDAA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2019-11-16 17:31:07', '2019-11-16 17:31:07'),
(2, 'Simple user', '2019-11-16 17:31:07', '2019-11-16 17:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuteurs`
--

CREATE TABLE `tuteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `prenom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lienparente_id` int(10) UNSIGNED DEFAULT NULL,
  `famille_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `approved`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$2BFwxe4MuEayBhJpbEemJ.VV15s.0g5WpDQVTPUH5.jgLv0a1Uvk2', '', '2019-11-16 17:31:07', '2019-11-16 17:31:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE `user_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'created', 'anneescolaires', 1, '2019-11-16 17:46:18', '2019-11-16 17:46:18', 1),
(2, 'created', 'eleves', 1, '2019-11-16 17:47:10', '2019-11-16 17:47:10', 1),
(3, 'created', 'preinscriptions', 1, '2019-11-16 17:47:44', '2019-11-16 17:47:44', 1),
(4, 'updated', 'preinscriptions', 1, '2019-11-16 17:57:24', '2019-11-16 17:57:24', 1),
(5, 'updated', 'preinscriptions', 1, '2019-11-16 19:46:31', '2019-11-16 19:46:31', 1),
(6, 'created', 'eleves', 2, '2019-11-17 07:53:13', '2019-11-17 07:53:13', 1),
(7, 'created', 'eleves', 3, '2019-11-17 08:34:28', '2019-11-17 08:34:28', 1),
(8, 'created', 'eleves', 4, '2019-11-17 09:18:18', '2019-11-17 09:18:18', 1),
(9, 'created', 'eleves', 5, '2019-11-17 09:21:49', '2019-11-17 09:21:49', 1),
(10, 'created', 'eleves', 6, '2019-11-17 09:24:04', '2019-11-17 09:24:04', 1),
(11, 'created', 'eleves', 7, '2019-11-17 09:29:52', '2019-11-17 09:29:52', 1),
(12, 'created', 'eleves', 8, '2019-11-17 09:35:41', '2019-11-17 09:35:41', 1),
(13, 'created', 'eleves', 9, '2019-11-17 09:37:28', '2019-11-17 09:37:28', 1),
(14, 'created', 'eleves', 10, '2019-11-17 09:41:35', '2019-11-17 09:41:35', 1),
(15, 'created', 'eleves', 11, '2019-11-17 09:42:42', '2019-11-17 09:42:42', 1),
(16, 'created', 'eleves', 12, '2019-11-17 09:46:41', '2019-11-17 09:46:41', 1),
(17, 'created', 'preinscriptions', 2, '2019-11-17 10:04:29', '2019-11-17 10:04:29', 1),
(18, 'deleted', 'eleves', 12, '2019-11-17 10:18:21', '2019-11-17 10:18:21', 1),
(19, 'deleted', 'eleves', 11, '2019-11-17 10:18:24', '2019-11-17 10:18:24', 1),
(20, 'deleted', 'eleves', 10, '2019-11-17 10:18:28', '2019-11-17 10:18:28', 1),
(21, 'updated', 'eleves', 9, '2019-11-17 10:21:59', '2019-11-17 10:21:59', 1),
(22, 'created', 'eleves', 13, '2019-11-17 10:36:27', '2019-11-17 10:36:27', 1),
(23, 'updated', 'eleves', 13, '2019-11-17 10:57:39', '2019-11-17 10:57:39', 1),
(24, 'updated', 'eleves', 13, '2019-11-17 11:04:04', '2019-11-17 11:04:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datemiseencirculation` datetime DEFAULT NULL,
  `dateacquisition` datetime DEFAULT NULL,
  `echeanceassurance` datetime DEFAULT NULL,
  `nombredeplace` int(11) DEFAULT NULL,
  `echeancevisitetechnique` datetime DEFAULT NULL,
  `echeanceautorisation` datetime DEFAULT NULL,
  `consommationmin` int(11) DEFAULT NULL,
  `consommationmax` int(11) DEFAULT NULL,
  `vidange` int(11) DEFAULT NULL,
  `observations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anneescolaires_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `circuits`
--
ALTER TABLE `circuits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circuits_deleted_at_index` (`deleted_at`),
  ADD KEY `42605_5dcff1d768c4c` (`vehicule_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_deleted_at_index` (`deleted_at`),
  ADD KEY `42602_5dcff120d19ed` (`niveau_id`),
  ADD KEY `42602_5dcff120d7f0f` (`branche_id`);

--
-- Indexes for table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communes_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cycles_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleves_deleted_at_index` (`deleted_at`),
  ADD KEY `42610_5dcff37b77758` (`famille_id`),
  ADD KEY `42610_5dcff37b8359e` (`tuteur_id`),
  ADD KEY `42610_5dcff3cca500c` (`quartier_id`);

--
-- Indexes for table `familles`
--
ALTER TABLE `familles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `familles_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_deleted_at_index` (`deleted_at`),
  ADD KEY `42612_5dcff4ab18c5f` (`classe_id`),
  ADD KEY `42612_5dcff59c3fe59` (`circuit_id`),
  ADD KEY `42612_5dcff59c50989` (`niveau_id`),
  ADD KEY `42612_5dcff59c661eb` (`anneescolaire_id`),
  ADD KEY `42612_5dcff59c6f381` (`preinscription_id`);

--
-- Indexes for table `lienparentes`
--
ALTER TABLE `lienparentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lienparentes_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveaux_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `fk_p_42589_42590_role_per_5dcfebee85f55` (`permission_id`),
  ADD KEY `fk_p_42590_42589_permissi_5dcfebee85faa` (`role_id`);

--
-- Indexes for table `preinscriptions`
--
ALTER TABLE `preinscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preinscriptions_deleted_at_index` (`deleted_at`),
  ADD KEY `42611_5dcff44ec4717` (`anneescolaire_id`),
  ADD KEY `42611_5dd03de62b20e` (`eleve_id`);

--
-- Indexes for table `quartiers`
--
ALTER TABLE `quartiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quartiers_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `fk_p_42590_42591_user_rol_5dcfebf1338ba` (`role_id`),
  ADD KEY `fk_p_42591_42590_role_use_5dcfebf1338ff` (`user_id`);

--
-- Indexes for table `tuteurs`
--
ALTER TABLE `tuteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuteurs_deleted_at_index` (`deleted_at`),
  ADD KEY `42609_5dcff306e5331` (`lienparente_id`),
  ADD KEY `42609_5dcff306ede25` (`famille_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `42592_5dcfec19ddccb` (`user_id`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicules_deleted_at_index` (`deleted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `circuits`
--
ALTER TABLE `circuits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `familles`
--
ALTER TABLE `familles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lienparentes`
--
ALTER TABLE `lienparentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `preinscriptions`
--
ALTER TABLE `preinscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quartiers`
--
ALTER TABLE `quartiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tuteurs`
--
ALTER TABLE `tuteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `circuits`
--
ALTER TABLE `circuits`
  ADD CONSTRAINT `42605_5dcff1d768c4c` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `42602_5dcff120d19ed` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42602_5dcff120d7f0f` FOREIGN KEY (`branche_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `42610_5dcff37b77758` FOREIGN KEY (`famille_id`) REFERENCES `familles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42610_5dcff37b8359e` FOREIGN KEY (`tuteur_id`) REFERENCES `tuteurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42610_5dcff3cca500c` FOREIGN KEY (`quartier_id`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `42612_5dcff4ab18c5f` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42612_5dcff59c3fe59` FOREIGN KEY (`circuit_id`) REFERENCES `circuits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42612_5dcff59c50989` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42612_5dcff59c661eb` FOREIGN KEY (`anneescolaire_id`) REFERENCES `anneescolaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42612_5dcff59c6f381` FOREIGN KEY (`preinscription_id`) REFERENCES `preinscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `fk_p_42589_42590_role_per_5dcfebee85f55` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_42590_42589_permissi_5dcfebee85faa` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `preinscriptions`
--
ALTER TABLE `preinscriptions`
  ADD CONSTRAINT `42611_5dcff44ec4717` FOREIGN KEY (`anneescolaire_id`) REFERENCES `anneescolaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42611_5dd03de62b20e` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_p_42590_42591_user_rol_5dcfebf1338ba` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_42591_42590_role_use_5dcfebf1338ff` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tuteurs`
--
ALTER TABLE `tuteurs`
  ADD CONSTRAINT `42609_5dcff306e5331` FOREIGN KEY (`lienparente_id`) REFERENCES `lienparentes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `42609_5dcff306ede25` FOREIGN KEY (`famille_id`) REFERENCES `familles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `42592_5dcfec19ddccb` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
