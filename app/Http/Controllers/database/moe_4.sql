-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2019 at 11:27 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aquotas`
--

INSERT INTO `aquotas` (`id`, `amount`, `material_id`, `year`, `created_at`, `updated_at`) VALUES
(1, '200000.00', 1, 2019, '2019-01-30 03:51:32', '2019-01-30 03:51:32'),
(2, '500000.00', 2, 2020, '2019-01-30 03:53:36', '2019-01-30 03:53:36'),
(3, '300000.00', 7, 2019, '2019-03-01 01:41:29', '2019-03-01 01:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `id_card` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cominfos`
--

INSERT INTO `cominfos` (`id`, `customer_id`, `tel`, `fax`, `email`, `city`, `district`, `commune`, `village`, `street`, `house`, `contact_person`, `position`, `gender`, `nationality`, `created_at`, `updated_at`, `personid`, `id_card`) VALUES
(2, 1, '232323', '232323', 'nvrith@gmail.com', 'uu', 'ddwdqwd', 'cwwwec', '4', '32', '345345', 'rsodarith', 'Sale MGT', 'boy', 'cambodian', '2019-01-18 18:52:30', '2019-01-18 19:16:33', '32323', NULL),
(3, 2, '232323', '345345', 'henglina@habbybaby.com', 'uu', 'df', 'cwwwec', 'cewecwc', '234', '345345', 'rsodarith', 'GM', 'male', 'cambodian', '2019-01-18 23:36:13', '2019-02-07 01:35:14', '03452324234', 'uploads/cominfo/id/3/68593.pdf'),
(4, 3, '232323', '232323', 'rsodarith@inklusivity.com', 'dsf', '34fsfdsdf', 'fwef', 'fewfwe', '32', 'sdsd', 'panharoth', 'GM', 'male', 'cambodian', '2019-01-30 22:41:15', '2019-01-31 04:11:13', '03452324234', 'uploads/cominfo/id/4/28879211_1885638361467031_1256435646_o.jpg'),
(5, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '2019-02-28 21:42:06', '2019-02-28 21:42:06', NULL, NULL),
(6, 5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '2019-02-28 21:47:23', '2019-02-28 21:47:23', NULL, NULL),
(7, 6, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '2019-03-01 02:08:33', '2019-03-01 02:08:33', NULL, NULL),
(8, 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '2019-03-01 02:12:57', '2019-03-01 02:12:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `communes`
--

DROP TABLE IF EXISTS `communes`;
CREATE TABLE IF NOT EXISTS `communes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commune_name` varchar(2200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comquotas`
--

INSERT INTO `comquotas` (`id`, `aquota_id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2000.00', '2019-01-30 03:51:32', '2019-01-30 03:51:32'),
(2, 1, 2, '3000.00', '2019-01-30 03:51:32', '2019-01-30 03:51:32'),
(3, 2, 1, '7000.00', '2019-01-30 03:53:36', '2019-01-30 03:53:36'),
(4, 2, 2, '9000.00', '2019-01-30 03:53:36', '2019-01-30 03:53:36'),
(5, 3, 3, '1000.00', '2019-03-01 01:41:29', '2019-03-01 01:41:29'),
(6, 3, 4, '2000.00', '2019-03-01 01:41:29', '2019-03-01 01:41:29');

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
  `id_card` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_name`, `password`, `remember_token`, `idcard`, `tin`, `tin_date`, `company_id`, `company_id_date`, `company_name`, `company_activity`, `status`, `astatus`, `created_at`, `updated_at`, `tin_path`, `id_path`, `tel`, `fax`, `email`, `city`, `district`, `commune`, `village`, `street`, `house`, `id_card`, `ctype`) VALUES
(1, 'scoopy', '$2y$10$Nr0nngQiITqWC5KNQhzvsuU0QJDgvHxvOntcgvuz1kzkUUvSKdR.u', 'sZvQBOqxhNNOaQpZP1LQyhc75RWPgrosKhqnIrtv1QIcuwJH9MRbFUBToZWv', 'cam0001', '2343434', '2019-01-23 00:00:00', 'id-0932433', '2019-01-31 00:00:00', 'HOME AIRCON', NULL, 1, 1, '2019-01-18 18:52:28', '2019-03-01 02:13:21', '$Customer->tin_path', '$Customer->id_path', '232323', '232323', 'Sokleang.mean@gmail.com', 'uu', '34fsfdsdf', 'fwef', '4', '32', '345345', 'uploads/ids/cam0001/28879211_1885638361467031_1256435646_o.jpg', 0),
(2, 'dave', '$2y$10$dUIndhZeVhZJiKUbuUS/tumFRGi8y/DNUp/yc0t9i5lueD8siDLR.', 'Lnz6D2qZSFkG4911TUTqnYAlxk29BYtosjX6bvMaaNQdZacSPpZvL5762lAd', 'cam0001', '123e', '2019-02-12 00:00:00', '4567', '2019-02-22 00:00:00', 'babab', NULL, 1, 1, '2019-01-18 23:36:13', '2019-02-28 21:49:14', 'uploads/tin/cam0001/Quotation Of Happy Technology Solutions Updated with signature.ods', 'uploads/id/cam0001/KIng of beggars-PK1.jpg', '232323', '232323', 'henglina@habbybaby.com', 'dsf', 'ddwdqwd', 'fwef', 'fewfwe', '5656', '3435', 'uploads/ids/cam0001/1379211_656978164333063_1635591538_n.jpg', 1),
(3, 'nvrith', '$2y$10$F6zoi.B3PLOL1RyymclKo.ZH.lfQbUs7MfF0Od3JeL.Ih4zAWYEIe', 'o6rvJ5RdcAumQ69M4cZPdbsqmgxB0MDXWim5EZxxO2Iyp3f7bmndGtLzFctn', 'cam000191', NULL, NULL, NULL, NULL, 'Rith Inc', NULL, 1, 1, '2019-01-30 22:41:15', '2019-01-30 22:41:15', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'gaga', '$2y$10$8EnaLVu1o.CRv4tuPpVije1TtYHp5ZoJaLOud02oAaIr9j7mcLYtm', NULL, 'cam00012234', NULL, NULL, NULL, NULL, 'GAGA', NULL, 1, 1, '2019-02-28 21:42:06', '2019-02-28 21:42:06', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'heel', '$2y$10$iDnVa6hb08gtqnVgqRbH4Oq1VR3C8yBJBLDP3aPqL6cJAm4KwiBsW', NULL, 'cam00014546', NULL, NULL, NULL, NULL, 'HELLO', NULL, 1, 1, '2019-02-28 21:47:22', '2019-02-28 21:47:22', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(6, 'sodarith', '$2y$10$TfKsX9YbMVNYG085dTNIaeQp5b6EPqCXBEAhXiVChKaEHNzIe3YEu', NULL, '034seew22edee', NULL, NULL, NULL, NULL, 'ABCCCDDD', NULL, 1, 1, '2019-03-01 02:08:33', '2019-03-01 02:08:33', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'back', '$2y$10$AtxzQcFvEzFhPDolhjdGPeOa3dLTDMNICPnOO0R/47lEIju2gEG4S', NULL, '0330cam', NULL, NULL, NULL, NULL, 'ABa bank', NULL, 1, 1, '2019-03-01 02:12:57', '2019-03-01 02:12:57', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dis_name` varchar(2200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(2200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `substance` varchar(2200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `product_name`, `capacity`, `substance`, `code`, `taxcode`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pannasonic', '2HP', 'CHC,', '0001', '373745-232', 'New', 0, '2018-12-26 21:03:46', '2019-03-01 01:32:58'),
(2, 'ឧបករណ៍បឺតខ្យល់', NULL, NULL, 'equip_1', '8414.10.00', ' ', 1, '2019-01-29 09:32:28', '2019-03-07 03:02:58'),
(3, 'ឧបករណ៍បូម​ខ្យល់បញ្ជាដោយ​​ដៃ ​ឬជើង​', NULL, NULL, 'equip_2', '8414.20', ' ', 1, '2019-01-29 09:32:28', '2019-03-07 03:03:13'),
(4, 'ស្នប់កង់', NULL, NULL, 'equip_3', '8414.20.10', ' ', 1, '2019-01-29 09:32:28', '2019-03-07 03:03:25'),
(5, '- - ផ្សេងទៀត', ' ', ' ', 'equip_4', '8414.20.90', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(6, 'កុំប្រេស័រ ជាប្រភេទ​ដែលប្រើជា​ឧបករណ៍​ធ្វើឲ្យ​ត្រជាក់', NULL, NULL, 'equip_5', '8414.30', ' ', 1, '2019-01-29 09:32:28', '2019-03-07 03:04:03'),
(7, '- - ដែលមានកម្លាំង​​ធ្វើឲ្យ​ត្រជាក់លើស ២១,១០ ​​kW ឬ ដែលមានទំហំចលនា​ក្នុង​មួយជុំ​ស្មើ​ ២២០​ cc ឬ លើស', ' ', ' ', 'equip_6', '8414.30.40', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(8, '- - ផ្សេងទៀត', ' ', ' ', 'equip_7', '8414.30.90', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(9, '- កុំប្រេស័រខ្យល់ ដំឡើងនៅតួសាក់ស៊ីមាន​កង់សម្រាប់សណ្ដោង អូស ឬទាញ ', ' ', ' ', 'equip_8', '8414.40.00', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(10, '- - កង្ហារនៅលើតុ, កម្រាល, ជញ្ជាំង, បង្អួច, និងពិដាន ដែលភ្ជាប់ដោយម៉ូទ័រអគ្គិសនីមានកម្លាំងមិនលើស ១២៥ W ៖', ' ', ' ', 'equip_10', '8414.51', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(11, '- - - កង្ហារដាក់​លើតុ និងកង្ហារក្នុង​ប្រអប់', ' ', ' ', 'equip_11', '8414.51.10', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(12, '- - - - ដែលមានរបាំងការពារ​', ' ', ' ', 'equip_13', '8414.51.91', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(13, '- - - - ផ្សេងទៀត', ' ', ' ', 'equip_14', '8414.51.99', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(14, '- - ផ្សេងទៀត ៖', ' ', ' ', 'equip_15', '8414.59', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(15, '- - - - កង្ហារធន់នឹងការផ្ទុះ​ ជាប្រភេទ​ប្រើក្នុង​អាជីវកម្មរ៉ែ​ក្រោមដី', ' ', ' ', 'equip_17', '8414.59.20', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(16, '- - - - ម៉ាស៊ីនផ្លុំ​ខ្យល់​', ' ', ' ', 'equip_18', '8414.59.30', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(17, '- - - - - ដែលមាន​របាំងការពារ​', ' ', ' ', 'equip_20', '8414.59.41', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(18, '- - - - - ផ្សេងទៀត', ' ', ' ', 'equip_21', '8414.59.49', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(19, '- - - ផ្សេងទៀត​ ៖', ' ', ' ', 'equip_22', ' ', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(20, '- - - - ឧបករណ៍ផ្លុំ​ខ្យល់​', ' ', ' ', 'equip_23', '8414.59.50', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(21, '- - - - - ដែលមានរបាំងការពារ​', ' ', ' ', 'equip_25', '8414.59.91', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(22, '- - - - - កង្ហារធន់នឹងការផ្ទុះ ជាប្រភេទ​ប្រើក្នុង​អាជីវកម្មរ៉ែ​ក្រោមដី', ' ', ' ', 'equip_26', '8414.59.92', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(23, '- - - - - ផ្សេងទៀត', ' ', ' ', 'equip_27', '8414.59.99', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(24, '- គម្រប​បឺត​ខ្យល់​ដែលមានជ្រុងដេក​អតិបរមា​មិនលើស​ ១២០ ​cm ៖', ' ', ' ', 'equip_28', '8414.60', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(25, '- - - ទូបឺតខ្យល់​ឡាមីណារ​', ' ', ' ', 'equip_30', '8414.60.11', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(26, '- - - ផ្សេងទៀត', ' ', ' ', 'equip_31', '8414.60.19', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(27, '- - - សមស្របសម្រាប់សម្រាប់​ការប្រើប្រាស់ក្នុងឧស្សាហកម្ម​', ' ', ' ', 'equip_33', '8414.60.91', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(28, '- - - ផ្សេងទៀត', ' ', ' ', 'equip_34', '8414.60.99', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(29, '- ផ្សេងទៀត ៖ ', ' ', ' ', 'equip_35', '8414.80', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(30, '- - - - ទូ​បឺតខ្យល់​ឡាមីណារ​', ' ', ' ', 'equip_38', '8414.80.11', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(31, '- - - - ផ្សេងទៀត', ' ', ' ', 'equip_39', '8414.80.19', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(32, '- - - - សមស្របសម្រាប់សម្រាប់​ប្រើ​​ប្រាស់​ក្នុង​ឧស្សាហកម្ម', ' ', ' ', 'equip_41', '8414.80.21', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(33, '- - - - ផ្សេងទៀត', ' ', ' ', 'equip_42', '8414.80.29', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(34, '- - ម៉ាស៊ីនដែលគ្មានពីស្ដុងសម្រាប់តួប៊ីនឧស្ម័ន', ' ', ' ', 'equip_43', '8414.80.30', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(35, '- - - មូឌុល​​សម្ពាធ​ឧស្ម័ន​ សម្រាប់​ប្រើ​ក្នុង​ប្រតិបត្តិការខួង​ប្រេង​', ' ', ' ', 'equip_45', '8414.80.41', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(36, '- - - ជាប្រភេទ​ប្រើ​សម្រាប់​ម៉ាស៊ីន​ត្រជាក់រថយន្ត', ' ', ' ', 'equip_46', '8414.80.42', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(37, '- - - ឧបករណ៍បិទជិត​សម្រាប់​ម៉ាស៊ីន​ត្រជាក់', ' ', ' ', 'equip_47', '8414.80.43', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(38, '- - - ផ្សេងទៀត', ' ', ' ', 'equip_48', '8414.80.49', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(39, '- - ស្នប់ខ្យល់​', ' ', ' ', 'equip_49', '8414.80.50', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(40, '- - ផ្សេងទៀត', ' ', ' ', 'equip_50', '8414.80.90', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(41, '- បំណែកភាគ ៖', ' ', ' ', 'equip_51', '8414.90', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(42, '- - - នៃ​ទំនិញ​ទីតាំង​លេខ ៨៤.១៥​, ៨៤.១៨,​ ៨៥.០៩​ ឬ​៨៥.១៦​', ' ', ' ', 'equip_53', '8414.90.21', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(43, '- - - នៃ​ឧបករណ៍ផ្លុំខ្យល់', ' ', ' ', 'equip_54', '8414.90.22', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(44, '- - - ផ្សេងទៀត', ' ', ' ', 'equip_55', '8414.90.29', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(45, '- - - នៃទំនិញ​​ក្នុងទីតាំងរង​លេខ ​៨៤១៤.៦០​', ' ', ' ', 'equip_57', '8414.90.31', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(46, '- - - នៃទំនិញ​ក្នុង​ទីតាំង​រងលេខ ​៨៤១៤.៨០​', ' ', ' ', 'equip_58', '8414.90.32', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(47, '- - - សម្រាប់​ម៉ាស៊ីន​ដំណើរ​ការ​ដោយ​អគ្គិសនី', ' ', ' ', 'equip_60', '8414.90.41', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(48, '- - - សម្រាប់​ម៉ាស៊ីន​មិន​ដំណើរ​ការ​ដោយ​អគិ្គសនី', ' ', ' ', 'equip_61', '8414.90.42', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(49, '- - នៃ​ទំនិញក្នុងទីតាំង​រង​លេខ ៨៤១៤.២០', ' ', ' ', 'equip_62', '8414.90.50', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(50, '- - នៃទំនិញក្នុងទីតាំង​រង​លេខ ៨៤១៤.៣០', ' ', ' ', 'equip_63', '8414.90.60', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(51, '- - - សម្រាប់​ម៉ាស៊ីន​ដំណើរ​ការ​ដោយ​អគ្គិសនី', ' ', ' ', 'equip_65', '8414.90.71', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(52, '- - - សម្រាប់​ម៉ាស៊ីន​មិន​ដំណើរ​ការ​ដោយ​អគិ្គសនី', ' ', ' ', 'equip_66', '8414.90.72', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(53, '- - - សម្រាប់​ម៉ាស៊ីន​ដំណើរ​ការ​ដោយ​អគ្គិសនី', ' ', ' ', 'equip_68', '8414.90.91', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28'),
(54, '- - - សម្រាប់​ម៉ាស៊ីន​មិន​ដំណើរ​ការ​ដោយ​អគិ្គសនី', ' ', ' ', 'equip_69', '8414.90.92', ' ', 1, '2019-01-29 09:32:28', '2019-01-29 09:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentrequestdetails`
--

DROP TABLE IF EXISTS `equipmentrequestdetails`;
CREATE TABLE IF NOT EXISTS `equipmentrequestdetails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentrequests`
--

DROP TABLE IF EXISTS `equipmentrequests`;
CREATE TABLE IF NOT EXISTS `equipmentrequests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `to` decimal(16,2) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ifees`
--

INSERT INTO `ifees` (`id`, `feetype`, `fee`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Equipment', '80000.00', '1.00', '49.00', 1, '2018-12-26 21:04:20', '2019-03-01 01:34:52'),
(2, 'Equipment', '150000.00', '50.00', '99.00', 1, '2018-12-26 21:04:50', '2019-03-07 03:28:59'),
(3, 'Equipment', '300000.00', '100.00', '99999999999999.00', 1, '2019-01-29 04:27:45', '2019-03-07 03:28:30'),
(4, 'Material', '200000.00', '1.00', '2000.00', 1, '2019-01-29 04:28:50', '2019-01-29 04:28:50'),
(5, 'Material', '400000.00', '2001.00', '99999999999999.00', 1, '2019-01-29 04:29:24', '2019-03-07 03:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `materialrequestdetails`
--

DROP TABLE IF EXISTS `materialrequestdetails`;
CREATE TABLE IF NOT EXISTS `materialrequestdetails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `materialrequests`
--

DROP TABLE IF EXISTS `materialrequests`;
CREATE TABLE IF NOT EXISTS `materialrequests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `com_name` varchar(2200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `com_name`, `chemical`, `substance`, `code`, `taxcode`, `type`, `status`, `created_at`, `updated_at`, `cas`, `un3`) VALUES
(1, 'Trichlorofluoromethane', 'CFCI3', 'CFC-11', 'sub_1', '2903.41', '', 1, '2019-01-29 05:53:20', '2019-03-01 01:29:51', '', '1017'),
(2, 'Dichlorodifluoromethane', 'CF2CI2', 'CFC-12', 'sub_2', '2903.42', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1028'),
(3, 'Trichlorotrifluoroethanes', 'C2F3CI3', 'CFC-113', 'sub_3', '2903.43', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(4, 'Dichlorotetrafluoroethanes', 'C2F4CI2', 'CFC-114', 'sub_4', '2903.44', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1958'),
(5, 'Chloropentafluoroethane', 'CCIF2CF3', 'CFC-115', 'sub_5', '2903.44', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1020'),
(6, 'Bromochlorodifluromethane', 'CF2BrCl', 'Halon-1211', 'sub_7', '2903.46', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1974'),
(7, 'Bromotrifluromethane', 'CF3Br', 'Halon-1301', 'sub_8', '2903.45', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1009'),
(8, 'Dibromotetrafluroethanes', 'C2F4Br2', 'Halon-2402', 'sub_9', '2903.46', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(9, 'Chlorotrifluoromethane', 'CF3Cl', 'CFC-13', 'sub_11', '2903.45', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(10, NULL, 'CCl4', 'Tetrachloromethane or carbon tetrachloride', 'sub_13', '2903.14', '', 1, '2019-01-29 05:53:20', '2019-03-07 02:50:02', '1234e3', '1864'),
(11, NULL, 'C2H3Cl3', 'trichloroethane or methyl chloroform', 'sub_15', '2903.19', '', 1, '2019-01-29 05:53:20', '2019-03-07 02:50:19', NULL, '2831'),
(12, 'Chlorodifluoromethane', 'CHF2Cl', 'HCFC-22', 'sub_17', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-03-07 02:21:57', 'dsaa', '1018'),
(13, 'Dichlorotrifluoroethanes', 'C2HF3Cl2', 'HCFC-123', 'sub_18', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(14, 'Chlorotetrafluoroethanes', 'C2HF4Cl', 'HCFC-124', 'sub_19', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(15, 'Dichlorofluoroethanes', 'C2H3FCl2', 'HCFC-141', 'sub_20', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(16, '1,1-dichloro-1-fluoroethane', 'CH3CFCl2', 'HCFC-141b', 'sub_21', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(17, 'Chlorodifluoroethanes', 'C2H3F2Cl', 'HCFC-142', 'sub_22', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(18, '1-chloro-1,1-difluoroethane', 'CH3CF2Cl', 'HCFC-142b', 'sub_23', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(19, 'Dichloropentafluoropropanes', 'C3HF5Cl2', 'HCFC-225', 'sub_24', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(20, 'Bromodifluoromethane', 'CHF2Br', 'HBFC-22B1', 'sub_26', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(21, '', 'CH2BrCl', 'Bromochloromethane', 'sub_28', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(22, '', 'CH3Br', 'Methyl bromide (or Bromomethane)', 'sub_30', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1062'),
(23, 'CFC-12 / HFC-152a', '', 'R-5005', 'sub_32', '3824.71', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(24, 'HCFC-22 / CFC-115', '', 'R-5025', 'sub_33', '3824.71', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1973'),
(25, 'HCFC-22/HFC-152a/HCFC-124', '', 'R-401A (MP-39)', 'sub_34', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(26, 'R-22/R-600a/R-142b (55/04/41)', NULL, 'R-406A', 'sub_35', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-03-06 03:16:15', NULL, NULL),
(27, 'HCFC-22/HFC-143a/HFC-125', '', 'R-408A (FX 10)', 'sub_36', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(28, 'HCFC-22 / HCFC-124/HCFC-142b', '', 'R-409A (FX 56)', 'sub_37', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(29, 'R-22/R-152a (25/75)', '', 'R-415B', 'sub_38', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(30, 'HC-290/HCFC-22/HFC-152a', '', 'R-418A', 'sub_39', '3824.74', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(31, '1,1,1,2-Tetrafluoroethane', 'CF3CH2F', 'HFC-134a', 'sub_41', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '3159'),
(32, '1,1-Difluoroethane', 'CHF2CH3', 'HFC-152a', 'sub_42', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(33, 'Pentafluoroethane', 'CF3CHF2', 'HFC-125', 'sub_43', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(34, '1.1.1-trifluoroethane', 'CF3CH3', 'HFC-143a', 'sub_44', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(35, 'Difluoromethane', 'CH2F2', 'HFC-32', 'sub_45', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(36, 'Trifluoromethane', 'CHF3', 'HFC-23', 'sub_46', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(37, '1,1,1,3,3-Pentafluoropropane', 'CF3CH2CHF2', 'HFC-245fa', 'sub_47', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(38, '2,3,3,3-Tetrafluoropropene', 'CH2=CFCF3', 'HFC-1,2,3,4yf', 'sub_48', '2903.39', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(39, 'R143a/125/134a', '', 'R-404A', 'sub_50', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(40, 'R143a/125', '', 'R-507A', 'sub_51', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(41, 'R32/125/134a', '', 'R-407A', 'sub_52', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(42, 'R32/125/134a', '', 'R-407B', 'sub_53', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(43, 'R32/125/134a', '', 'R-407C', 'sub_54', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(44, 'R32/125', '', 'R-410A', 'sub_55', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(45, 'R23/116', '', 'R-508A', 'sub_56', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(46, 'R23/116', '', 'R-508B', 'sub_57', '3824.78', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(47, 'Ammonia', 'NH3', 'R-717', 'sub_59', '2814.10', '', 1, '2019-01-29 05:53:20', '2019-01-28 23:05:11', '1234', '1005'),
(48, 'Carbon dioxide', 'CO2', 'R-744', 'sub_60', '2811.21', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(49, 'Butane', 'CH3CH2CH2CH3', 'R-600', 'sub_61', '2901.1', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', ''),
(50, 'Iso-Butane', 'C4H10', 'R-600a', 'sub_62', '2901.1', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1969'),
(51, 'Propane', 'C3H8', 'R-290', 'sub_63', '2711.12', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '1978'),
(52, '', '', ' HCFC', 'sub_67', '2903.49', '', 1, '2019-01-29 05:53:20', '2019-01-29 05:53:20', '', '');

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
('2019_01_28_103408_add_fileds_to_materials', 9),
('2019_01_30_182743_add_fields_to_customers', 10),
('2019_01_30_183008_add_fields_to_cominfos', 10),
('2019_02_09_060950_add_resourses_to_permissions', 11),
('2019_02_13_071044_create_quotarequests_table', 12),
('2019_02_13_071921_create_materialrequests_table', 12),
('2019_02_13_071939_create_equipmentrequests_table', 12),
('2019_02_13_072041_create_quotarequestdetails_table', 12),
('2019_02_13_072059_create_materialrequestdetails_table', 12),
('2019_02_13_072111_create_equipmentrequestdetails_table', 12),
('2019_02_13_073237_create_quotarequestfiles_table', 13),
('2019_02_13_085446_create_provinces_table', 14),
('2019_02_13_085713_create_communes_table', 14),
('2019_02_13_091330_create_districts_table', 14),
('2019_02_13_092207_create_villages_table', 14),
('2019_02_28_092403_create_articles_table', 14),
('2019_03_07_091758_change_com_name_table_materials', 15),
('2019_03_07_095916_change_column_table_equipment', 16);

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

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(5, 'App\\User', 1),
(6, 'App\\User', 1),
(7, 'App\\User', 1),
(8, 'App\\User', 1),
(9, 'App\\User', 1),
(10, 'App\\User', 1),
(11, 'App\\User', 1),
(12, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 2),
(4, 'App\\User', 2),
(6, 'App\\User', 2),
(7, 'App\\User', 2),
(8, 'App\\User', 2),
(9, 'App\\User', 2),
(10, 'App\\User', 2),
(11, 'App\\User', 2),
(12, 'App\\User', 2);

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
  `resourse` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`) VALUES
(1, 'equipment.view', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'equipment'),
(2, 'equipment.create', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'equipment'),
(3, 'equipment.edit', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'equipment'),
(4, 'material.view', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'material'),
(5, 'material.create', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'material'),
(6, 'material.edit', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'material'),
(7, 'price.view', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'price'),
(8, 'price.create', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'price'),
(9, 'price.edit', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'price'),
(10, 'company.view', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'company'),
(11, 'company.create', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'company'),
(12, 'company.edit', 'web', '2019-02-01 17:00:00', '2019-02-01 17:00:00', 'company');

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
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(2200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `quotarequestdetails`
--

DROP TABLE IF EXISTS `quotarequestdetails`;
CREATE TABLE IF NOT EXISTS `quotarequestdetails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotarequest_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `import_date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `old_amount` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `quotarequestdetails`
--

INSERT INTO `quotarequestdetails` (`id`, `quotarequest_id`, `material_id`, `import_date`, `amount`, `old_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1970-01-01', '222.00', '333.00', '2019-03-01 00:15:59', '2019-03-01 00:15:59'),
(2, 2, 1, '1970-01-01', '232.00', '22.00', '2019-03-01 00:16:17', '2019-03-01 00:16:17'),
(3, 3, 1, '1970-01-01', '232.00', '22.00', '2019-03-01 00:16:49', '2019-03-01 00:16:49'),
(4, 4, 1, '1970-01-01', '232.00', '22.00', '2019-03-01 00:17:43', '2019-03-01 00:17:43'),
(5, 5, 1, '1970-01-01', '232.00', '22.00', '2019-03-01 00:18:11', '2019-03-01 00:18:11'),
(6, 6, 1, '2019-03-30', '222.00', '22.00', '2019-03-01 00:20:11', '2019-03-01 00:20:11'),
(7, 7, 1, '2019-03-30', '222.00', '22.00', '2019-03-01 00:21:28', '2019-03-01 00:21:28'),
(8, 8, 1, '2019-03-30', '222.00', '333.00', '2019-03-01 00:22:13', '2019-03-01 00:22:13'),
(9, 9, 1, '2019-03-30', '222.00', '333.00', '2019-03-01 00:26:56', '2019-03-01 00:26:56'),
(10, 10, 1, '2019-03-30', '222.00', '333.00', '2019-03-01 00:27:36', '2019-03-01 00:27:36'),
(11, 11, 1, '1970-01-01', '222.00', '22.00', '2019-03-01 00:30:13', '2019-03-01 00:30:13'),
(12, 12, 1, '1970-01-01', '2333.00', '222.00', '2019-03-01 00:32:59', '2019-03-01 00:32:59'),
(13, 13, 1, '1970-01-01', '2333.00', '222.00', '2019-03-01 00:34:54', '2019-03-01 00:34:54'),
(14, 14, 1, '1970-01-01', '444.00', '333.00', '2019-03-01 00:35:16', '2019-03-01 00:35:16'),
(15, 15, 1, '2019-03-30', '4444.00', '222.00', '2019-03-01 00:38:13', '2019-03-01 00:38:13'),
(16, 16, 1, '1970-01-01', '1200.00', '1100.00', '2019-03-04 20:13:16', '2019-03-04 20:13:16'),
(17, 16, 2, '1970-01-01', '12890.00', '11111.00', '2019-03-04 20:13:16', '2019-03-04 20:13:16'),
(18, 17, 1, '1970-01-01', '300.00', '340.00', '2019-03-04 20:14:09', '2019-03-04 20:14:09'),
(19, 17, 2, '1970-01-01', '300.00', '200.00', '2019-03-04 20:14:09', '2019-03-04 20:14:09'),
(20, 18, 1, '1970-01-01', '300.00', '340.00', '2019-03-04 20:15:04', '2019-03-04 20:15:04'),
(21, 18, 2, '1970-01-01', '300.00', '200.00', '2019-03-04 20:15:05', '2019-03-04 20:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `quotarequestfiles`
--

DROP TABLE IF EXISTS `quotarequestfiles`;
CREATE TABLE IF NOT EXISTS `quotarequestfiles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotarequest_id` int(11) NOT NULL,
  `file_path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `quotarequestfiles`
--

INSERT INTO `quotarequestfiles` (`id`, `quotarequest_id`, `file_path`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'C:\\fakepath\\Cost of Good Slod-system.xlsx', 'ww', '2019-03-01 00:16:17', '2019-03-01 00:16:17'),
(2, 3, 'C:\\fakepath\\Cost of Good Slod-system.xlsx', 'ww', '2019-03-01 00:16:49', '2019-03-01 00:16:49'),
(3, 4, 'C:\\fakepath\\Cost of Good Slod-system.xlsx', 'ww', '2019-03-01 00:17:43', '2019-03-01 00:17:43'),
(4, 5, 'C:\\fakepath\\Cost of Good Slod-system.xlsx', 'ww', '2019-03-01 00:18:11', '2019-03-01 00:18:11'),
(5, 6, 'C:\\fakepath\\tbl_product.sql', '222', '2019-03-01 00:20:11', '2019-03-01 00:20:11'),
(6, 7, 'C:\\fakepath\\tbl_product.sql', '222', '2019-03-01 00:21:28', '2019-03-01 00:21:28'),
(7, 8, 'C:\\fakepath\\abc.xlsx', 'sss', '2019-03-01 00:22:13', '2019-03-01 00:22:13'),
(8, 9, 'C:\\fakepath\\abc.xlsx', 'sss', '2019-03-01 00:26:56', '2019-03-01 00:26:56'),
(9, 10, 'C:\\fakepath\\abc.xlsx', 'www', '2019-03-01 00:27:36', '2019-03-01 00:27:36'),
(10, 11, 'C:\\fakepath\\tbl_product.sql', 'sss', '2019-03-01 00:30:13', '2019-03-01 00:30:13'),
(11, 12, 'C:\\fakepath\\tbl_product.sql', 'ddd', '2019-03-01 00:32:59', '2019-03-01 00:32:59'),
(12, 13, 'C:\\fakepath\\tbl_product.sql', 'ddd', '2019-03-01 00:34:54', '2019-03-01 00:34:54'),
(13, 14, 'C:\\fakepath\\aryank pro.xlsx', 'ddd', '2019-03-01 00:35:16', '2019-03-01 00:35:16'),
(14, 15, 'C:\\fakepath\\aryank pro.xlsx', 'ddd', '2019-03-01 00:38:13', '2019-03-01 00:38:13'),
(15, 17, 'C:\\fakepath\\QUATATION-Secondhand-computer.pdf', '66776', '2019-03-04 20:14:09', '2019-03-04 20:14:09'),
(16, 18, 'C:\\fakepath\\QUATATION-Secondhand-computer.pdf', '66776', '2019-03-04 20:15:05', '2019-03-04 20:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `quotarequests`
--

DROP TABLE IF EXISTS `quotarequests`;
CREATE TABLE IF NOT EXISTS `quotarequests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `quotarequests`
--

INSERT INTO `quotarequests` (`id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2019-03-01 00:15:59', '2019-03-01 00:15:59'),
(2, 2, 1, '2019-03-01 00:16:17', '2019-03-01 00:16:17'),
(3, 2, 1, '2019-03-01 00:16:49', '2019-03-01 00:16:49'),
(4, 2, 1, '2019-03-01 00:17:43', '2019-03-01 00:17:43'),
(5, 2, 1, '2019-03-01 00:18:11', '2019-03-01 00:18:11'),
(6, 2, 1, '2019-03-01 00:20:11', '2019-03-01 00:20:11'),
(7, 2, 1, '2019-03-01 00:21:27', '2019-03-01 00:21:27'),
(8, 2, 1, '2019-03-01 00:22:12', '2019-03-01 00:22:12'),
(9, 2, 1, '2019-03-01 00:26:56', '2019-03-01 00:26:56'),
(10, 2, 1, '2019-03-01 00:27:35', '2019-03-01 00:27:35'),
(11, 2, 1, '2019-03-01 00:30:13', '2019-03-01 00:30:13'),
(12, 2, 1, '2019-03-01 00:32:59', '2019-03-01 00:32:59'),
(13, 2, 1, '2019-03-01 00:34:54', '2019-03-01 00:34:54'),
(14, 2, 1, '2019-03-01 00:35:16', '2019-03-01 00:35:16'),
(15, 2, 1, '2019-03-01 00:38:13', '2019-03-01 00:38:13'),
(16, 2, 1, '2019-03-04 20:13:15', '2019-03-04 20:13:15'),
(17, 2, 1, '2019-03-04 20:14:09', '2019-03-04 20:14:09'),
(18, 2, 1, '2019-03-04 20:15:04', '2019-03-04 20:15:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-01-31 17:00:00', '2019-01-31 17:00:00'),
(2, 'root', 'web', '2019-02-01 03:36:03', '2019-02-01 03:36:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, 'en', '*', 'label', 'item4', 'Fee (Riel )', 0, 0, NULL, '2019-01-30 20:06:09'),
(22, 'kh', '*', 'label', 'item4', 'តម្លៃ ( រៀល )', 0, 0, NULL, '2019-01-30 20:06:09'),
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
(77, 'en', '*', 'theadcol4', 'import', 'Code', 0, 0, NULL, NULL),
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
(89, 'en', '*', 'theadcol3', 'material', 'Substances Used', 0, 0, NULL, '2019-01-30 19:55:49'),
(90, 'kh', '*', 'theadcol3', 'material', 'សារធាតុដែលត្រូវប្រើ', 0, 0, NULL, '2019-01-30 19:55:48'),
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
(107, 'en', '*', 'theadcol3', 'price', 'Fee (Riel )', 0, 0, NULL, '2019-03-07 03:33:58'),
(108, 'kh', '*', 'theadcol3', 'price', 'តម្លៃ ( រៀល )', 0, 0, NULL, '2019-03-07 03:33:58'),
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
(123, 'en', '*', 'theadcol1', 'register', 'Code', 0, 0, NULL, '2019-01-30 20:08:22'),
(124, 'kh', '*', 'theadcol1', 'register', 'លេខសំគាល់', 0, 0, NULL, '2019-01-30 20:08:22'),
(125, 'en', '*', 'theadcol2', 'register', 'company name', 0, 0, NULL, NULL),
(126, 'kh', '*', 'theadcol2', 'register', 'ឈ្មោះក្រុុមហ៊ុន', 0, 0, NULL, NULL),
(127, 'en', '*', 'theadcol3', 'register', 'imported', 0, 0, NULL, NULL),
(128, 'kh', '*', 'theadcol3', 'register', 'ចំនួននាំចូល', 0, 0, NULL, NULL),
(129, 'en', '*', 'theadcol4', 'register', 'register date', 0, 0, NULL, NULL),
(130, 'kh', '*', 'theadcol4', 'register', 'ថ្ងៃចុះឈ្មោះ', 0, 0, NULL, NULL),
(131, 'en', '*', 'theadcol5', 'register', 'option', 0, 0, NULL, NULL),
(132, 'kh', '*', 'theadcol5', 'register', 'សកម្មភាព', 0, 0, NULL, NULL),
(133, 'en', '*', 'label', 'editproduct', 'Edit', 0, 0, NULL, '2019-03-06 03:18:04'),
(134, 'kh', '*', 'label', 'editproduct', 'កែប្រែ', 0, 0, NULL, '2019-03-06 03:18:04'),
(135, 'en', '*', 'input', 'productimport', 'code', 0, 0, NULL, NULL),
(136, 'kh', '*', 'input', 'productimport', 'លេខសំគាល់', 0, 0, NULL, NULL),
(139, 'en', '*', 'inputco', 'productimport', 'HS Code (TAX) ', 0, 0, NULL, NULL),
(140, 'kh', '*', 'inputco', 'productimport', 'លេខក្នុងតារាងពន្ធគយ', 0, 0, NULL, NULL),
(141, 'en', '*', 'inputlimit', 'productimport', 'Amount import limit', 0, 0, NULL, NULL),
(142, 'kh', '*', 'inputlimit', 'productimport', 'ចំនួនកំណត់នៃការនាំចូល', 0, 0, NULL, NULL),
(143, 'en', '*', 'buttonsave', 'productimport', 'Save', 0, 0, NULL, NULL),
(144, 'kh', '*', 'buttonsave', 'productimport', 'រក្សាទុក', 0, 0, NULL, NULL),
(145, 'en', '*', 'buttoncancel', 'productimport', 'Cancel', 0, 0, NULL, NULL),
(146, 'kh', '*', 'buttoncancel', 'productimport', 'បោះបង់', 0, 0, NULL, NULL),
(147, 'en', '*', 'inputfrom', 'price', 'Quaintly From', 0, 0, NULL, '2019-03-07 03:34:33'),
(148, 'kh', '*', 'inputfrom', 'price', 'បរិមាណចាប់ពី', 0, 0, NULL, '2019-03-07 03:34:33'),
(149, 'en', '*', 'inputto', 'price', 'To Quantity', 0, 0, NULL, '2019-03-07 03:35:28'),
(150, 'kh', '*', 'inputto', 'price', 'ដល់បរិមាណ', 0, 0, NULL, '2019-03-07 03:35:28'),
(151, 'en', '*', 'label', 'assignquota', 'substance', 0, 0, NULL, NULL),
(152, 'kh', '*', 'label', 'assignquota', 'សារធាតុ', 0, 0, NULL, NULL),
(155, 'en', '*', 'label1', 'assignquota', 'Annual Quantity ', 0, 0, NULL, NULL),
(156, 'kh', '*', 'label1', 'assignquota', 'បរិមាណប្រចាំឆ្នាំ', 0, 0, NULL, NULL),
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
(215, 'en', '*', 'bar-edit', 'priceedit', 'Edit Fee', 0, 0, NULL, '2019-03-07 03:32:44'),
(216, 'kh', '*', 'bar-edit', 'priceedit', 'កែប្រែតម្លៃ', 0, 0, NULL, '2019-03-07 03:32:44'),
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
(240, 'kh', '*', 'buttonsave', 'save_print', 'រក្សាទុករួចបោះពុម្ភ', 0, 0, NULL, NULL),
(241, 'en', '*', 'theadcol9', 'import', 'CAS#', 0, 0, NULL, NULL),
(242, 'kh', '*', 'theadcol9', 'import', 'CAS#', 0, 0, NULL, NULL),
(243, 'en', '*', 'theadcol8', 'import', 'UN3#', 0, 0, NULL, NULL),
(244, 'kh', '*', 'theadcol8', 'import', 'UN3#', 0, 0, NULL, NULL),
(245, 'en', '*', 'label', 'assignquo', 'Assign Quota', 0, 0, NULL, NULL),
(246, 'kh', '*', 'label', 'assignquo', 'កំណត់កូតា', 0, 0, NULL, NULL),
(247, 'en', '*', 'ctype', 'createuser', 'Company Type', 0, 0, NULL, NULL),
(248, 'kh', '*', 'ctype', 'createuser', 'ប្រភេទក្រុមហ៊ុន', 0, 0, NULL, NULL),
(249, 'en', '*', 'importe', 'createuser', 'Import Equipment', 0, 0, NULL, NULL),
(250, 'kh', '*', 'importe', 'createuser', 'នាំចូលបរិក្ខារ', 0, 0, NULL, NULL),
(251, 'en', '*', 'importm', 'createuser', 'Import material', 0, 0, NULL, NULL),
(252, 'kh', '*', 'importm', 'createuser', 'នាំចូលសារធាតុ', 0, 0, NULL, NULL),
(253, 'en', '*', 'importall', 'createuser', 'Import All', 0, 0, NULL, NULL),
(254, 'kh', '*', 'importall', 'createuser', 'នាំចូលទាំងអស់', 0, 0, NULL, NULL),
(255, 'en', '*', 'label', 'companyname', 'Company Name', 0, 0, '2019-02-10 21:06:21', '2019-02-10 21:06:21'),
(256, 'kh', '*', 'label', 'companyname', 'ឈ្មោះក្រុមហ៊ុន', 0, 0, '2019-02-10 22:11:55', '2019-02-10 22:11:55'),
(257, 'en', '*', 'label', 'contactname', 'Contact Name', 0, 0, '2019-02-28 21:54:33', '2019-02-28 21:54:33'),
(258, 'kh', '*', 'label', 'contactname', 'ឈ្មោះអ្នកទំនាក់ទំនង', 0, 0, '2019-02-28 21:55:05', '2019-02-28 21:55:31'),
(259, 'kh', '*', 'label', 'gender', 'ភេទ', 0, 0, '2019-02-28 21:56:03', '2019-02-28 21:56:03'),
(260, 'en', '*', 'label', 'gender', 'Gender', 0, 0, '2019-02-28 21:56:17', '2019-02-28 21:56:17'),
(261, 'kh', '*', 'label', 'nationality', 'សញ្ញាតិ', 0, 0, '2019-02-28 21:56:44', '2019-02-28 21:56:44'),
(263, 'en', '*', 'label', 'nationality', 'Nationality', 0, 0, '2019-02-28 21:57:19', '2019-02-28 21:57:19'),
(264, 'kh', '*', 'label', 'RoleCompany', 'មុខងារក្នងក្រុមហ៊ុន', 0, 0, '2019-02-28 21:57:56', '2019-02-28 21:57:56'),
(266, 'en', '*', 'label', 'RoleCompany', 'Role In Company', 0, 0, '2019-02-28 21:58:22', '2019-02-28 21:58:22'),
(267, 'kh', '*', 'label', 'Idnumber', 'អត្តសញ្ញាណប័ណ្ណ', 0, 0, '2019-02-28 21:59:12', '2019-02-28 23:02:35'),
(268, 'en', '*', 'label', 'Idnumber', 'Identification Card', 0, 0, '2019-02-28 21:59:33', '2019-02-28 23:02:35'),
(269, 'kh', '*', 'label', 'numHome', 'ផ្ទះលេខ', 0, 0, '2019-02-28 22:00:40', '2019-02-28 22:00:40'),
(270, 'en', '*', 'label', 'numHome', 'House No', 0, 0, '2019-02-28 22:01:03', '2019-02-28 22:01:03'),
(271, 'kh', '*', 'label', 'NumberRoad', 'ផ្លូវលេខ', 0, 0, '2019-02-28 22:01:29', '2019-02-28 22:01:29'),
(272, 'en', '*', 'label', 'NumberRoad', 'Street No', 0, 0, '2019-02-28 22:01:51', '2019-02-28 22:01:51'),
(273, 'kh', '*', 'label', 'village', 'ភូមិ', 0, 0, '2019-02-28 22:02:39', '2019-02-28 22:02:39'),
(274, 'en', '*', 'label', 'village', 'Village', 0, 0, '2019-02-28 22:03:03', '2019-02-28 22:03:03'),
(275, 'kh', '*', 'label', 'CummuneSongkat', 'ឃុំ/សង្កាត់', 0, 0, '2019-02-28 22:48:36', '2019-02-28 22:48:36'),
(276, 'en', '*', 'label', 'CummuneSongkat', 'Commune', 0, 0, '2019-02-28 22:49:01', '2019-02-28 22:49:01'),
(277, 'kh', '*', 'label', 'District', 'ស្រុក/ខណ្ឌ', 0, 0, '2019-02-28 22:49:55', '2019-02-28 22:49:55'),
(278, 'en', '*', 'label', 'District', 'District', 0, 0, '2019-02-28 22:50:16', '2019-02-28 22:50:16'),
(279, 'kh', '*', 'label', 'province', 'ខេត្ត/រាជធានី', 0, 0, '2019-02-28 22:51:40', '2019-02-28 22:51:40'),
(280, 'en', '*', 'label', 'province', 'Province', 0, 0, '2019-02-28 22:51:58', '2019-02-28 22:51:58'),
(281, 'kh', '*', 'label', 'phone', 'ទូរស័ព្ទ', 0, 0, '2019-02-28 22:52:30', '2019-02-28 22:52:30'),
(282, 'en', '*', 'label', 'phone', 'Phone', 0, 0, '2019-02-28 22:52:51', '2019-02-28 22:52:51'),
(283, 'kh', '*', 'label', 'fax', 'ទូរសា', 0, 0, '2019-02-28 22:53:17', '2019-02-28 22:53:17'),
(284, 'en', '*', 'label', 'fax', 'Fax', 0, 0, '2019-02-28 22:53:33', '2019-02-28 22:53:33'),
(285, 'kh', '*', 'label', 'email', 'សារអេឡិចត្រូនិច', 0, 0, '2019-02-28 22:54:40', '2019-02-28 22:54:40'),
(286, 'en', '*', 'label', 'email', 'Email', 0, 0, '2019-02-28 22:54:54', '2019-02-28 22:54:54'),
(287, 'kh', '*', 'front', 'request_quota', 'ស្នើសុំចុះបញ្ចីអ្នកនាំចូលសារធាតុបំផ្លាញស្រទាប់អូហ្សូន', 0, 0, '2019-02-28 22:58:36', '2019-02-28 22:58:36'),
(288, 'en', '*', 'front', 'request_quota', 'Request Member Import Material', 0, 0, '2019-02-28 22:59:13', '2019-02-28 22:59:13'),
(289, 'kh', '*', 'front', 'c_address', 'អាសយដ្ឋានក្រុមហ៊ុន', 0, 0, '2019-02-28 23:00:46', '2019-02-28 23:00:46'),
(290, 'en', '*', 'front', 'c_address', 'Company Address', 0, 0, '2019-02-28 23:01:08', '2019-02-28 23:01:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'moe_admin', 'scoopy.mikini@gmail.com', '$2y$10$cfyR5Ta3R4yPhYFGcUaXieYYB1f02wYTzsRLUgKwwG6atdB36E8/G', '4DZgInuRyrcrVgsmIZibgli9w2zfZSLqnEvrLjgpxMwumZ7d5z8febsLBunF', '2018-10-19 03:09:59', '2019-02-27 21:29:41'),
(2, 'departments', 'department@gmail.com', '$2y$10$pFvXTN6cdfRAuP/yivG2Lun733Dix4mP.a10PIHfkGP2e1Wo0JvJe', NULL, '2019-02-02 00:31:11', '2019-03-05 03:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

DROP TABLE IF EXISTS `villages`;
CREATE TABLE IF NOT EXISTS `villages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vill_name` varchar(2200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
