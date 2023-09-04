-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2019 at 12:32 AM
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
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(2200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `pro_name`, `created_at`, `updated_at`) VALUES
(1, 'បន្ទាយមានជ័យ/ Banteay Meanchey', NULL, NULL),
(2, 'បាត់ដំបង/ Battambang', NULL, NULL),
(3, 'កំពង់ចាម/ Kampong Cham', NULL, NULL),
(4, 'កំពង់ឆ្នាំង/ Kampong Chhnang', NULL, NULL),
(5, 'កំពង់ស្ពឺ/ Kampong Speu', NULL, NULL),
(6, 'កំពង់ធំ/ Kampong Thom', NULL, NULL),
(7, 'កំពត/ Kampot', NULL, NULL),
(8, 'កណ្ដាល/ Kandal', NULL, NULL),
(9, 'កោះកុង/ Koh Kong', NULL, NULL),
(10, 'ក្រចេះ/ Kratie', NULL, NULL),
(11, 'មណ្ឌលគីរី/ Mondul Kiri', NULL, NULL),
(12, 'ភ្នំពេញ/ Phnom Penh', NULL, NULL),
(13, 'ព្រះវិហារ/ Preah Vihear', NULL, NULL),
(14, 'ព្រៃវែង/ Prey Veng', NULL, NULL),
(15, 'ពោសាត់/ Pursat', NULL, NULL),
(16, 'រតនៈគីរី/ Ratanak Kiri', NULL, NULL),
(17, 'សៀមរាប/ Siemreap', NULL, NULL),
(18, 'ព្រះសីហនុ/ Preah Sihanouk', NULL, NULL),
(19, 'ស្ទឹងត្រែង/ Stung Treng', NULL, NULL),
(20, 'ស្វាយរៀង/ Svay Rieng', NULL, NULL),
(21, 'តាកែវ/ Takeo', NULL, NULL),
(22, 'ឧត្តរមានជ័យ/ Oddar Meanchey', NULL, NULL),
(23, 'កែប/ Kep', NULL, NULL),
(24, 'ប៉ៃលិន/ Pailin', NULL, NULL),
(25, 'ត្បូងឃ្មុំ/ Tboung Khmum', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
