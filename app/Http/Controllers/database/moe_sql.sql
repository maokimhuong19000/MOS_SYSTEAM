-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2019 at 11:15 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe`
--

-- --------------------------------------------------------

--
-- Table structure for table `aquotas`
--

DROP TABLE IF EXISTS `aquotas`;
CREATE TABLE IF NOT EXISTS `aquotas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` decimal(16,2) NOT NULL,
  `material_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aquotas_material_id_year_unique` (`material_id`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cominfos`
--

DROP TABLE IF EXISTS `cominfos`;
CREATE TABLE IF NOT EXISTS `cominfos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `tel` varchar(2200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `personid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cominfos`
--

INSERT INTO `cominfos` (`id`, `customer_id`, `tel`, `fax`, `email`, `city`, `district`, `commune`, `village`, `street`, `house`, `contact_person`, `position`, `gender`, `nationality`, `created_at`, `updated_at`, `personid`) VALUES
(2, 1, '232323', '232323', 'nvrith@gmail.com', 'uu', 'ddwdqwd', 'cwwwec', '4', '32', '345345', 'rsodarith', 'Sale MGT', 'boy', 'cambodian', '2019-01-18 18:52:30', '2019-01-18 19:16:33', '32323'),
(3, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '2019-01-18 23:36:13', '2019-01-18 23:36:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comquotas`
--

DROP TABLE IF EXISTS `comquotas`;
CREATE TABLE IF NOT EXISTS `comquotas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aquota_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(2200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcard` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_date` datetime DEFAULT NULL,
  `company_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id_date` datetime DEFAULT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_activity` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `astatus` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tin_path` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_path` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(2200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_name`, `password`, `remember_token`, `idcard`, `tin`, `tin_date`, `company_id`, `company_id_date`, `company_name`, `company_activity`, `status`, `astatus`, `created_at`, `updated_at`, `tin_path`, `id_path`, `tel`, `fax`, `email`, `city`, `district`, `commune`, `village`, `street`, `house`) VALUES
(1, 'scoopy', '$2y$10$gLvKBM0aF9.ax3U.gXwCwO5ckTrW285eT3ogKpQKvpizqCAVjIDEC', '7zud9P7RyLjUhh3SmsRPmQY9kL6ysgfxbKvkVYT8aGo5xt5ODPb53bWBn0Ot', 'cam0001', '2343434', '2019-01-23 00:00:00', NULL, '2019-01-31 00:00:00', 'HOME AIRCON', NULL, 1, 1, '2019-01-18 18:52:28', '2019-01-18 23:30:45', 'uploads/tin/cam0001/Scan0001.jpg', '$Customer->id_path', '232323', NULL, NULL, 'uu', '34fsfdsdf', 'fwef', '4', '32', '345345'),
(2, 'dave', '$2y$10$etRX1SsyqIDdUKbYunKG5ebZuLqZ7ui/5Kz/L1HsmBTS8nYdrbG5W', NULL, 'cam0001', NULL, NULL, NULL, NULL, 'babab', NULL, 1, 1, '2019-01-18 23:36:13', '2019-01-18 23:36:13', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `substance` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `product_name`, `capacity`, `substance`, `code`, `taxcode`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pannasonic', '2HP', 'CHC,', '0001', '373745-232', 'New', 1, '2018-12-26 21:03:46', '2018-12-26 21:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `ifees`
--

DROP TABLE IF EXISTS `ifees`;
CREATE TABLE IF NOT EXISTS `ifees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `feetype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(16,2) NOT NULL,
  `from` decimal(8,2) NOT NULL,
  `to` decimal(8,2) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ifees`
--

INSERT INTO `ifees` (`id`, `feetype`, `fee`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'equipment', '250000.00', '1.00', '12.00', 1, '2018-12-26 21:04:20', '2018-12-26 21:04:57'),
(2, 'equipment', '300000.00', '1.00', '20000.00', 1, '2018-12-26 21:04:50', '2018-12-26 21:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `com_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chemical` varchar(2200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `substance` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taxcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cas` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `un3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `com_name`, `chemical`, `substance`, `code`, `taxcode`, `type`, `status`, `created_at`, `updated_at`, `cas`, `un3`) VALUES
(1, 'Trichlorofluoromethane', 'CCl3F', 'CFC-11', '001', '75-69-4', 'Virgin', 1, '2018-12-07 10:00:00', '2018-12-07 10:00:00', NULL, NULL),
(2, 'Dichlorodifluoromethane', 'CCl2F2', 'CFC-12', '002', '75-71-8', 'Virgin', 1, '2018-12-07 10:00:00', '2018-12-07 10:00:00', NULL, NULL),
(3, 'Trichlorotrifluoroethane', '(C2F3Cl3) 1,1,2-', 'CFC-113', '003', '76-13-1', 'Virgin', 1, '2018-12-10 19:52:21', '2018-12-10 19:52:21', NULL, NULL),
(4, 'Dichlorotetrafluoroethane', 'C2F4Cl2', 'CFC-114', '004', '76-14-2', 'Virgin', 1, '2018-12-10 20:01:48', '2018-12-10 20:01:48', NULL, NULL),
(5, 'Bromochlorodifluoromethane', 'CF2ClBr', 'Halon 1211', '005', '353-59-3', 'Virgin', 1, '2018-12-10 20:19:29', '2018-12-10 20:19:29', NULL, NULL),
(6, 'Bromotrifluoromethane', 'CF2ClBrCF3Br', 'Halon 1301', '006', '75-63-8', 'Virgin', 1, '2018-12-10 20:24:16', '2018-12-10 20:24:16', NULL, NULL),
(7, 'Chlorotrifluoromethane', 'CF3Cl', 'CFC-13', '007', '75-72-9', 'Reclaimed', 1, '2018-12-10 21:04:29', '2018-12-10 21:04:29', NULL, NULL),
(8, 'Pentachlorofluoroethane', 'C2FCl5', 'CFC-111', '008', '354-56-3', 'Reclaimed', 1, '2018-12-11 04:28:39', '2018-12-11 04:28:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_10_17_075921_create_persions_table', 1),
('2013_07_25_145943_create_languages_table', 2),
('2013_07_25_145958_create_translations_table', 2),
('2016_06_02_124154_increase_locale_length', 2),
('2018_12_07_181111_create_products_table', 3),
('2018_12_08_095742_create_materials_table', 3),
('2018_12_08_095759_create_equipment_table', 3),
('2018_12_08_095819_create_mquota_table', 3),
('2018_12_11_094501_change_column_chemical', 4),
('2018_12_15_040247_create_ifees_table', 4),
('2018_12_24_045401_create_customers_table', 5),
('2018_12_25_031459_create_cominfo_table', 5),
('2018_12_25_043640_create_comquota_table', 5),
('2018_12_25_044714_create_aquotas_table', 5),
('2019_01_10_103418_create_permission_tables', 6),
('2019_01_18_083225_add_uniquekey_to_aquotas', 7),
('2019_01_18_190928_add_personid_to_cominfos', 7),
('2019_01_18_205212_add_file_to_customers', 7),
('2019_01_19_015902_add_column_to_customers', 8),
('2019_01_28_103408_add_fileds_to_materials', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mquota`
--

DROP TABLE IF EXISTS `mquota`;
CREATE TABLE IF NOT EXISTS `mquota` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` decimal(16,2) NOT NULL,
  `material_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `persions`
--

DROP TABLE IF EXISTS `persions`;
CREATE TABLE IF NOT EXISTS `persions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `translator_languages`
--

DROP TABLE IF EXISTS `translator_languages`;
CREATE TABLE IF NOT EXISTS `translator_languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translator_languages_locale_unique` (`locale`),
  UNIQUE KEY `translator_languages_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translator_languages`
--

INSERT INTO `translator_languages` (`id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kh', 'Khmer', '2018-11-27 04:29:16', '2018-11-27 04:29:16', NULL),
(2, 'en', 'English', '2018-11-27 04:29:33', '2018-11-27 04:29:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translator_translations`
--

DROP TABLE IF EXISTS `translator_translations`;
CREATE TABLE IF NOT EXISTS `translator_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namespace` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unstable` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translator_translations_locale_namespace_group_item_unique` (`locale`,`namespace`,`group`,`item`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translator_translations`
--

INSERT INTO `translator_translations` (`id`, `locale`, `namespace`, `group`, `item`, `text`, `unstable`, `locked`, `created_at`, `updated_at`) VALUES
(1, 'kh', '*', 'label', 'department', 'អគ្គនាយកដ្ឋានគាំពារបរិស្ថាន', 0, 0, NULL, NULL),
(2, 'en', '*', 'label', 'department', 'Environmental Protection', 0, 0, NULL, NULL),
(10, 'en', '*', 'label', 'dashboard', 'dashboard', 0, 0, NULL, NULL),
(11, 'kh', '*', 'label', 'dashboard', 'ទំព័រដើម', 0, 0, NULL, NULL),
(15, 'kh', '*', 'label', 'item1', 'សារធាតុ / បរិក្ខារ', 0, 0, NULL, '2019-01-28 03:14:29'),
(16, 'en', '*', 'label', 'item1', 'Substances / Equipment', 0, 0, NULL, '2019-01-28 03:14:29'),
(17, 'kh', '*', 'label', 'item2', 'បញ្ជីសារធាតុ', 0, 0, NULL, NULL),
(18, 'en', '*', 'label', 'item2', 'Substances List', 0, 0, NULL, NULL),
(19, 'en', '*', 'label', 'item3', 'Equipment List', 0, 0, NULL, '2019-01-28 03:14:06'),
(20, 'kh', '*', 'label', 'item3', 'បញ្ជីបរិក្ខារ', 0, 0, NULL, '2019-01-28 03:14:06'),
(21, 'en', '*', 'label', 'item4', 'Fee', 0, 0, NULL, '2019-01-18 20:13:05'),
(22, 'kh', '*', 'label', 'item4', 'តម្លៃ', 0, 0, NULL, NULL),
(23, 'en', '*', 'label', 'item5', 'Annual Quota ', 0, 0, NULL, NULL),
(24, 'kh', '*', 'label', 'item5', '\r\nកូតាប្រចាំឆ្នាំ', 0, 0, NULL, NULL),
(25, 'en', '*', 'label', 'item6', 'Registered Company', 0, 0, NULL, NULL),
(26, 'kh', '*', 'label', 'item6', 'ក្រុមហ៊ុនចុះបញ្ជី', 0, 0, NULL, NULL),
(28, 'en', '*', 'label', 'item7', 'company List', 0, 0, NULL, NULL),
(29, 'kh', '*', 'label', 'item7', 'បញ្ចីក្រុមហ៊ុន', 0, 0, NULL, NULL),
(30, 'en', '*', 'label', 'item8', 'Create Company', 0, 0, NULL, NULL),
(31, 'kh', '*', 'label', 'item8', 'បង្កើតក្រុមហ៊ុន', 0, 0, NULL, NULL),
(32, 'en', '*', 'import', 'menu', 'import request', 0, 0, NULL, NULL),
(33, 'kh', '*', 'import', 'menu', 'ស្នើរសុំការនាំចូល', 0, 0, NULL, NULL),
(34, 'en', '*', 'import', 'item1', 'Alert Request', 0, 0, NULL, NULL),
(35, 'kh', '*', 'import', 'item1', 'ការស្នើរសុំ', 0, 0, NULL, NULL),
(36, 'en', '*', 'import', 'item2', 'Annual Quota Request', 0, 0, NULL, NULL),
(37, 'kh', '*', 'import', 'item2', 'ការស្នើរសុំប្រចាំឆ្នាំ', 0, 0, NULL, NULL),
(41, 'en', '*', 'import', 'item3', 'Import Request', 0, 0, NULL, NULL),
(42, 'kh', '*', 'import', 'item3', 'ការស្នើរសុំការនាំចូល', 0, 0, NULL, NULL),
(43, 'en', '*', 'report', 'menu', 'Report', 0, 0, NULL, NULL),
(44, 'kh', '*', 'report', 'menu', 'របាយការណ៏', 0, 0, NULL, NULL),
(45, 'en', '*', 'report', 'item1', 'Annual Import', 0, 0, NULL, NULL),
(46, 'kh', '*', 'report', 'item1', 'ការនាំចូលប្រចាំឆ្នាំ', 0, 0, NULL, NULL),
(47, 'en', '*', 'report', 'item2', 'Date between Filter  Import', 0, 0, NULL, NULL),
(48, 'kh', '*', 'report', 'item2', '\r\nកាលបរិច្ឆេទរវាងការនាំចូលតម្រង', 0, 0, NULL, NULL),
(49, 'en', '*', 'report', 'item3', 'Annual Import by Company', 0, 0, NULL, NULL),
(50, 'kh', '*', 'report', 'item3', '\r\nការនាំចូលប្រចាំឆ្នាំរបស់ក្រុមហ៊ុន', 0, 0, NULL, NULL),
(55, 'en', '*', 'report', 'item4', 'Import Income Date between  Filter', 0, 0, NULL, NULL),
(56, 'kh', '*', 'report', 'item4', 'នាំចូលកាលបរិច្ឆេទចំណូលរវាងតម្រង', 0, 0, NULL, NULL),
(57, 'en', '*', 'report', 'item5', 'Quota Import by company', 0, 0, NULL, NULL),
(58, 'kh', '*', 'report', 'item5', 'កូតានាំចូលដោយក្រុមហ៊ុន', 0, 0, NULL, NULL),
(59, 'en', '*', 'permission', 'menu', 'User and Access Permission', 0, 0, NULL, NULL),
(60, 'kh', '*', 'permission', 'menu', ' ផ្ដល់សិទ្ធិអោយអ្នកប្រើប្រាស់', 0, 0, NULL, NULL),
(65, 'en', '*', 'permission', 'item1', 'list user', 0, 0, NULL, NULL),
(66, 'kh', '*', 'permission', 'item1', 'បញ្ចីរអ្នកប្រើប្រាស់', 0, 0, NULL, NULL),
(69, 'en', '*', 'permission ', 'item2', 'add new user', 0, 0, NULL, NULL),
(70, 'kh', '*', 'permission', 'item2', 'បង្កើតគណនឹអោយអ្នកប្រើប្រាស់', 0, 0, NULL, NULL),
(71, 'en', '*', 'thead', 'import', 'kind of the substance', 0, 0, NULL, NULL),
(72, 'kh', '*', 'thead', 'import', 'ប្រភេទសារធាតុ', 0, 0, NULL, NULL),
(73, 'en', '*', 'theadcol2', 'import', 'Commercial Name ', 0, 0, NULL, NULL),
(74, 'kh', '*', 'theadcol2', 'import', 'ឈ្មោះពាណិជ្ជកម្ម', 0, 0, NULL, NULL),
(75, 'en', '*', 'theadcol3', 'import', 'Chemicals', 0, 0, NULL, NULL),
(76, 'kh', '*', 'theadcol3', 'import', 'សាមាសធាតុគីមី', 0, 0, NULL, NULL),
(77, 'en', '*', 'theadcol4', 'import', 'Substance', 0, 0, NULL, NULL),
(78, 'kh', '*', 'theadcol4', 'import', 'លេខសំគាល់', 0, 0, NULL, NULL),
(79, 'en', '*', 'theadcol5', 'import', 'Quality', 0, 0, NULL, NULL),
(80, 'kh', '*', 'theadcol5', 'import', 'គុណភាព', 0, 0, NULL, NULL),
(81, 'en', '*', 'theadcol6', 'import', 'HS Code (TAX)', 0, 0, NULL, NULL),
(82, 'kh', '*', 'theadcol6', 'import', 'លេខក្នុងតារាងពន្ធគយ', 0, 0, NULL, NULL),
(83, 'en', '*', 'theadcol7', 'import', 'Option', 0, 0, NULL, NULL),
(84, 'kh', '*', 'theadcol7', 'import', 'សកម្មភាព', 0, 0, NULL, NULL),
(85, 'en', '*', 'theadcol1', 'material', 'Equipment Name', 0, 0, NULL, NULL),
(86, 'kh', '*', 'theadcol1', 'material', 'ឈ្មោះបរិក្ខារ', 0, 0, NULL, NULL),
(87, 'en', '*', 'theadcol2', 'material', 'ability', 0, 0, NULL, NULL),
(88, 'kh', '*', 'theadcol2', 'material', 'សមត្ថភាព', 0, 0, NULL, NULL),
(89, 'en', '*', 'theadcol3', 'material', 'substace to use', 0, 0, NULL, NULL),
(90, 'kh', '*', 'theadcol3', 'material', 'សារធាតុដែលប្រើ', 0, 0, NULL, NULL),
(95, 'en', '*', 'theadcol4', 'material', '\r\nStuff', 0, 0, NULL, NULL),
(96, 'kh', '*', 'theadcol4', 'material', 'កូ​នសារធាតុ', 0, 0, NULL, NULL),
(97, 'en', '*', 'theadcol5', 'material', 'ability', 0, 0, NULL, NULL),
(98, 'kh', '*', 'theadcol5', 'material', 'គុណភាព', 0, 0, NULL, NULL),
(99, 'en', '*', 'theadcol6', 'material', 'Tax number', 0, 0, NULL, NULL),
(100, 'kh', '*', 'theadcol6', 'material', 'លេខសំគាល់គយ', 0, 0, NULL, NULL),
(101, 'en', '*', 'theadcol7', 'material', 'option', 0, 0, NULL, NULL),
(102, 'kh', '*', 'theadcol7', 'material', 'សកម្មភាព', 0, 0, NULL, NULL),
(103, 'en', '*', 'theadcol1', 'price', 'quantity', 0, 0, NULL, NULL),
(104, 'kh', '*', 'theadcol1', 'price', 'បរិមាណ', 0, 0, NULL, NULL),
(105, 'en', '*', 'theadcol2', 'price', 'to quantity', 0, 0, NULL, NULL),
(106, 'kh', '*', 'theadcol2', 'price', 'ដល់បរិមាណ', 0, 0, NULL, NULL),
(107, 'en', '*', 'theadcol3', 'price', 'price', 0, 0, NULL, NULL),
(108, 'kh', '*', 'theadcol3', 'price', 'តម្លៃ', 0, 0, NULL, NULL),
(109, 'en', '*', 'theadcol4', 'price', 'kind', 0, 0, NULL, NULL),
(110, 'kh', '*', 'theadcol4', 'price', 'ប្រភេទ', 0, 0, NULL, NULL),
(111, 'en', '*', 'theadcol5', 'price', 'option', 0, 0, NULL, NULL),
(112, 'kh', '*', 'theadcol5', 'price', 'សកម្មភាព', 0, 0, NULL, NULL),
(113, 'en', '*', 'theadcol1', 'quota', 'substance', 0, 0, NULL, NULL),
(114, 'kh', '*', 'theadcol1', 'quota', 'សារធាតុ', 0, 0, NULL, NULL),
(115, 'en', '*', 'theadcol2', 'quota', 'total quality(kg)', 0, 0, NULL, NULL),
(116, 'kh', '*', 'theadcol2', 'quota', 'បរិមាណសរុប(kg)', 0, 0, NULL, NULL),
(117, 'en', '*', 'theadcol3', 'quota', 'Used up(kg)', 0, 0, NULL, NULL),
(118, 'kh', '*', 'theadcol3', 'quota', 'ប្រើប្រាស់អស់(kg)', 0, 0, NULL, NULL),
(119, 'en', '*', 'theadcol4', 'quota', 'the rest(kg)', 0, 0, NULL, NULL),
(120, 'kh', '*', 'theadcol4', 'quota', 'នៅសល់(kg)', 0, 0, NULL, NULL),
(121, 'en', '*', 'theadcol5', 'quota', 'option', 0, 0, NULL, NULL),
(122, 'kh', '*', 'theadcol5', 'quota', 'សកម្មភាព', 0, 0, NULL, NULL),
(123, 'en', '*', 'theadcol1', 'register', 'register number', 0, 0, NULL, NULL),
(124, 'kh', '*', 'theadcol1', 'register', 'លេខចុះបញ្ជី', 0, 0, NULL, NULL),
(125, 'en', '*', 'theadcol2', 'register', 'company name', 0, 0, NULL, NULL),
(126, 'kh', '*', 'theadcol2', 'register', 'ឈ្មោះក្រុុមហ៊ុន', 0, 0, NULL, NULL),
(127, 'en', '*', 'theadcol3', 'register', 'imported', 0, 0, NULL, NULL),
(128, 'kh', '*', 'theadcol3', 'register', 'ចំនួននាំចូល', 0, 0, NULL, NULL),
(129, 'en', '*', 'theadcol4', 'register', 'register date', 0, 0, NULL, NULL),
(130, 'kh', '*', 'theadcol4', 'register', 'ថ្ងៃចុះឈ្មោះ', 0, 0, NULL, NULL),
(131, 'en', '*', 'theadcol5', 'register', 'option', 0, 0, NULL, NULL),
(132, 'kh', '*', 'theadcol5', 'register', 'សកម្មភាព', 0, 0, NULL, NULL),
(133, 'en', '*', 'label', 'editproduct', 'add new', 0, 0, NULL, NULL),
(134, 'kh', '*', 'label', 'editproduct', 'បង្កើតថ្មី', 0, 0, NULL, NULL),
(135, 'en', '*', 'input', 'productimport', 'code', 0, 0, NULL, NULL),
(136, 'kh', '*', 'input', 'productimport', 'លេខកូដ', 0, 0, NULL, NULL),
(139, 'en', '*', 'inputco', 'productimport', 'Tax code', 0, 0, NULL, NULL),
(140, 'kh', '*', 'inputco', 'productimport', 'លេខកូដពន្ធគយ', 0, 0, NULL, NULL),
(141, 'en', '*', 'inputlimit', 'productimport', 'Amount import limit', 0, 0, NULL, NULL),
(142, 'kh', '*', 'inputlimit', 'productimport', 'ចំនួនកំណត់នៃការនាំចូល', 0, 0, NULL, NULL),
(143, 'en', '*', 'buttonsave', 'productimport', 'Save', 0, 0, NULL, NULL),
(144, 'kh', '*', 'buttonsave', 'productimport', 'រក្សាទុក', 0, 0, NULL, NULL),
(145, 'en', '*', 'buttoncancel', 'productimport', 'Cancel', 0, 0, NULL, NULL),
(146, 'kh', '*', 'buttoncancel', 'productimport', 'បោះបង់', 0, 0, NULL, NULL),
(147, 'en', '*', 'inputfrom', 'price', 'From', 0, 0, NULL, NULL),
(148, 'kh', '*', 'inputfrom', 'price', 'ចាប់ផ្ដើម', 0, 0, NULL, NULL),
(149, 'en', '*', 'inputto', 'price', 'To', 0, 0, NULL, NULL),
(150, 'kh', '*', 'inputto', 'price', 'ដល់', 0, 0, NULL, NULL),
(151, 'en', '*', 'label', 'assignquota', 'substance', 0, 0, NULL, NULL),
(152, 'kh', '*', 'label', 'assignquota', 'សារធាតុ', 0, 0, NULL, NULL),
(155, 'en', '*', 'label1', 'assignquota', 'aviable', 0, 0, NULL, NULL),
(156, 'kh', '*', 'label1', 'assignquota', 'មាន', 0, 0, NULL, NULL),
(157, 'en', '*', 'labeluse', 'assignquota', 'use', 0, 0, NULL, NULL),
(158, 'kh', '*', 'labeluse', 'assignquota', 'ការប្រើប្រាស់', 0, 0, NULL, NULL),
(159, 'en', '*', 'addcompany', 'assignquota', 'Add Company', 0, 0, NULL, NULL),
(160, 'kh', '*', 'addcompany', 'assignquota', 'បង្កើតក្រុមហ៊ុន', 0, 0, NULL, NULL),
(161, 'en', '*', 'namecomp', 'assignquota', 'Name company', 0, 0, NULL, NULL),
(162, 'kh', '*', 'namecomp', 'assignquota', 'ឈ្មោះរបស់ក្រុមហ៊ុន', 0, 0, NULL, NULL),
(163, 'en', '*', 'buttonadd', 'assignquota', 'add new', 0, 0, NULL, NULL),
(164, 'kh', '*', 'buttonadd', 'assignquota', 'បង្កើតថ្មី', 0, 0, NULL, NULL),
(165, 'en', '*', 'company', 'assignquota', 'Campany', 0, 0, NULL, NULL),
(166, 'kh', '*', 'company', 'assignquota', 'ក្រុមហ៊ុន', 0, 0, NULL, NULL),
(167, 'en', '*', 'quanlity', 'assignquota', 'Quality quota(kg)', 0, 0, NULL, NULL),
(168, 'kh', '*', 'quanlity', 'assignquota', 'គុណភាព​ quota(kg)', 0, 0, NULL, NULL),
(171, 'en', '*', 'labelusag', 'assignquota', 'use(kg)', 0, 0, NULL, NULL),
(172, 'kh', '*', 'labelusag', 'assignquota', 'ការប្រើប្រាស់(kg)', 0, 0, NULL, NULL),
(173, 'en', '*', 'total', 'assignquota', 'Total(kg)', 0, 0, NULL, NULL),
(174, 'kh', '*', 'total', 'assignquota', 'សរុប(kg)', 0, 0, NULL, NULL),
(175, 'en', '*', 'username', 'createuser', 'Company Name', 0, 0, NULL, '2019-01-15 22:07:53'),
(176, 'kh', '*', 'username', 'createuser', 'ឈ្មោះក្រុមហ៊ុន', 0, 0, NULL, '2019-01-15 22:07:53'),
(177, 'en', '*', 'password', 'createuser', 'Password', 0, 0, NULL, NULL),
(178, 'kh', '*', 'password', 'createuser', 'លេខកូដ', 0, 0, NULL, NULL),
(179, 'en', '*', 'labelaccount', 'createuser', 'Create Account Company', 0, 0, NULL, NULL),
(180, 'kh', '*', 'labelaccount', 'createuser', 'បង្កើតគណនីអោយក្រុមហ៊ុន', 0, 0, NULL, NULL),
(181, 'en', '*', 'navbar', 'register', 'detail company', 0, 0, NULL, NULL),
(182, 'kh', '*', 'navbar', 'register', 'លំអិតអំពីក្រុមហ៊ុន', 0, 0, NULL, NULL),
(189, 'en', '*', 'col4', 'comdetail', 'Import date', 0, 0, NULL, NULL),
(190, 'kh', '*', 'col4', 'comdetail', 'ថ្ងៃនាំចូល', 0, 0, NULL, NULL),
(191, 'en', '*', 'col6', 'comdetail', 'Authorization', 0, 0, NULL, NULL),
(192, 'kh', '*', 'col6', 'comdetail', 'លិខិតអនុញ្ញាតគយ', 0, 0, NULL, NULL),
(195, 'en', '*', 'col7', 'comdetail', 'Customer', 0, 0, NULL, NULL),
(196, 'kh', '*', 'col7', 'comdetail', 'លិខិតគយ', 0, 0, NULL, NULL),
(197, 'en', '*', 'col8', 'comdetail', 'Action', 0, 0, NULL, NULL),
(198, 'kh', '*', 'col8', 'comdetail', 'សកម្មភាព', 0, 0, NULL, NULL),
(199, 'en', '*', 'tab', 'detail', 'Company info', 0, 0, NULL, NULL),
(200, 'kh', '*', 'tab', 'detail', 'ពណ៏មានក្រុមហ៊ុន', 0, 0, NULL, NULL),
(203, 'en', '*', 'tab1', 'detail', 'Contact info', 0, 0, NULL, NULL),
(204, 'kh', '*', 'tab1', 'detail', 'ទំនាក់ទំនាក់ពណ៏មាន', 0, 0, NULL, NULL),
(207, 'en', '*', 'tab2\r\n', 'detail', 'Import info', 0, 0, NULL, NULL),
(208, 'kh', '*', 'tab2', 'detail', 'ពណ៏មាននាំចូល', 0, 0, NULL, NULL),
(209, 'en', '*', 'tabbar', 'addnewSubstance', 'substance', 0, 0, NULL, NULL),
(210, 'kh', '*', 'tabbar', 'addnewSubstance', 'បង្កើតសារធាតុថ្មី', 0, 0, NULL, NULL),
(211, 'en', '*', 'tabar', 'editsubstance', 'Edit Substance', 0, 0, NULL, NULL),
(212, 'kh', '*', 'tabar', 'editsubstance', 'កែប្រែលសារធាតុ', 0, 0, NULL, NULL),
(213, 'en', '*', 'label', 'createpricekh', 'Create add', 0, 0, NULL, NULL),
(214, 'kh', '*', 'label', 'createpricekh', 'បង្កើតតារាងតម្លៃថ្មី', 0, 0, NULL, NULL),
(215, 'en', '*', 'bar-edit', 'priceedit', 'list Edit', 0, 0, NULL, NULL),
(216, 'kh', '*', 'bar-edit', 'priceedit', 'កែប្រែល', 0, 0, NULL, NULL),
(217, 'en', '*', 'label', 'equipment', 'Add Equipment', 0, 0, NULL, NULL),
(218, 'kh', '*', 'label', 'equipment', 'បង្កើតបរិក្ខាថ្មី', 0, 0, NULL, NULL),
(219, 'en', '*', 'label', 'labelnew', 'virgin', 0, 0, NULL, '2019-01-28 03:19:51'),
(220, 'kh', '*', 'label', 'labelnew', 'ផលិតផលសុទ្ធ', 0, 0, NULL, '2019-01-28 03:19:51'),
(221, 'en', '*', 'label', 'labelused', 'Used', 0, 0, NULL, NULL),
(222, 'kh', '*', 'label', 'labelused', 'បានប្រើប្រាស់', 0, 0, NULL, NULL),
(223, 'en', '*', 'label', 'labelReclaimed', 'Reclaimed', 0, 0, NULL, NULL),
(224, 'kh', '*', 'label', 'labelReclaimed', 'កែច្នៃឡើងវិញ', 0, 0, NULL, '2019-01-28 03:21:32'),
(225, 'en', '*', 'label', 'labelRecycled', 'Recycled', 0, 0, NULL, NULL),
(226, 'kh', '*', 'label', 'labelRecycled', 'សម្អាត', 0, 0, NULL, '2019-01-28 03:20:58'),
(227, 'en', '*', 'label ', 'createuser', 'Username', 0, 0, NULL, NULL),
(228, 'kh', '*', 'label', 'createuser', 'អ្នកប្រើប្រាស់', 0, 0, NULL, NULL),
(229, 'en', '*', 'label', 'creater', 'Company Code', 0, 0, NULL, '2019-01-15 22:18:14'),
(230, 'kh', '*', 'label', 'creater', 'លេខចុះបញ្ចី', 0, 0, NULL, NULL),
(231, 'en', '*', 'navbar', 'reg_update', 'Edit Company', 0, 0, NULL, NULL),
(232, 'kh', '*', 'navbar', 'reg_update', 'កែប្រែលបញ្ជីក្រុមហ៊ុន', 0, 0, NULL, NULL),
(235, 'en', '*', 'teste', 'test', 'test', 0, 0, NULL, NULL),
(236, 'en', '*', 'test', 'test', 'test', 0, 0, NULL, NULL),
(237, 'en', '*', 'label', 'translate\r\n', 'Translatation', 0, 0, NULL, NULL),
(238, 'kh', '*', 'label', 'translate', 'តារាងបកប្រែលភាសា', 0, 0, NULL, NULL),
(239, 'en', '*', 'buttonsave', 'save_print', 'Save & Print', 0, 0, NULL, NULL),
(240, 'kh', '*', 'buttonsave', 'save_print', 'រក្សាទុករួចបោះពុម្ភ', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cchr', 'rsodarith@gmail.com', '$2y$10$A2R5jMFMZlhRNg25cv8PAeeJfZithwI9H8pODEickRYbaZhHFLW8O', 'vr88FXZXHlo1BNEYC2blhVfkTZMpAJdFDwZwd0oC8Q9HQamD1yjesehkct0r', '2018-10-19 03:09:59', '2018-11-02 01:42:01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `translator_translations`
--
ALTER TABLE `translator_translations`
  ADD CONSTRAINT `translator_translations_locale_foreign` FOREIGN KEY (`locale`) REFERENCES `translator_languages` (`locale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
