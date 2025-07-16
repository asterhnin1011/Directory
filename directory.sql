-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2025 at 05:52 AM
-- Server version: 8.4.5-0ubuntu0.1
-- PHP Version: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Myeik`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2025_05_15_050525_create_pois_table', 1),
(12, '2025_06_10_182912_create_posts_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pois`
--

CREATE TABLE `pois` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `fid` int DEFAULT NULL,
  `shape` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dps_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poi_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poi_n_win` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poi_n_zaw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poi_n_myn3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dps_tsp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_type_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_cod` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `st_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `st_n_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_n_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tsp_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tsp_n_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_n_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_r_n_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_r_n_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hn_eng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hn_myn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `verify_dat` date DEFAULT NULL,
  `poi_pictur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pois`
--

INSERT INTO `pois` (`id`, `user_id`, `fid`, `shape`, `dps_id`, `source_id`, `source`, `uid`, `poi_n_eng`, `poi_n_win`, `poi_n_zaw`, `poi_n_myn3`, `type`, `dps_tsp`, `type_code`, `sub_type_c`, `postal_cod`, `st_n_eng`, `st_n_myn`, `ward_n_eng`, `ward_n_myn`, `tsp_n_eng`, `tsp_n_myn`, `dist_n_eng`, `dist_n_myn`, `s_r_n_eng`, `s_r_n_myn`, `hn_eng`, `hn_myn`, `address`, `phone`, `longitude`, `latitude`, `remark`, `verify_dat`, `poi_pictur`, `project`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Myint Mo Hotel', NULL, NULL, 'မြင်းမိုရ် ဟိုတယ်', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No(222), Bandula street, Upper Yaypone Qtr Myeik, 14051', '9765005641', 98.61383280, 12.45633875, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Hotel Drift', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kannar Rd, Myeik 14051', '9424702050', 98.59762418, 12.45161510, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ပုလဲသန္တာ ဟိုတယ်', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FH8X+V9M, ကလွင်လမ်း၊ ရေပုန်းရပ်, Myeik', '5942126', 98.59840200, 12.46733900, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Warm Home', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No.30,Sabar Shwe War Str,Upper Yaybone Qtr,Myeik, Myeik', '9678177806', 98.61004498, 12.46103580, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'MYA SEESEIN HOTEL', NULL, NULL, 'မြစည်းစိမ် ဟိုတယ်', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kannar Rd, Myeik', '9253554430', 98.59385757, 12.43553276, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'GREEN EYE HOTEL', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', 'None', 98.59616212, 12.43729819, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(8, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'La Yeik Guest House', NULL, NULL, 'လရိပ် တည်းခိုခန်:', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ9+4J6, Myeik', 'None', 98.61893046, 12.43801264, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(9, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Regent Hotel', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '131 Kan Phyar Rd, Myeik', '9899990420', 98.61115138, 12.45143334, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(10, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Hotel Grand Jade', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No 28, 30 Myit Nge St, Myeik', '9962441999', 98.59931528, 12.44188603, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(11, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'White Pearl Hotel', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHPV+7M7, second strand road, talaing zu qtr, Myeik', '9252888812', 98.59416468, 12.43567262, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(12, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ငွေတောင်တန်း တည်းခိုခန်း', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', '9458546903', 98.59549631, 12.44105368, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(13, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မိုးထက်သာ တည်းခိုခန်း', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHVW+99J, Kannar Rd, Myeik', 'None', 98.59594379, 12.44347402, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(14, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Seasons Island Hotel', NULL, NULL, NULL, 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No(15 Kannar Rd, Myeik 14051)', '9899069966', 98.59600631, 12.44363443, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(15, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'နန်းတော်ဝင် အဆင့်မြင့်ဧည့်ရိပ်မွန်', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', 'None', 98.60040698, 12.46382865, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(16, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ကြယ်ပျံ ဟိုတယ်', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', '5942135', 98.59755861, 12.44534455, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(17, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'i Hostel', NULL, NULL, 'None', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Myit Nge St, Myeik 14051', '9795822277', 98.59782800, 12.44409970, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(18, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Chan Myae Guest House', NULL, NULL, NULL, 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No.520, New Wave Street Seik Nge Quarter, Myeik, Myeik 11111', '949890027', 98.59513013, 12.43879528, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(19, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'MODERN HOTEL', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No.(54), Bo Gyoke Road &, Middle Strand St, Myeik', '9782778866', 98.59455323, 12.43683539, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(20, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Royal Myeik', NULL, NULL, 'တော်ဝင်မြိတ်', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHQV+FP7, Myeik', '931666532', 98.59431728, 12.43874452, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(21, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Arr Yone Oo Guest House', NULL, NULL, 'အာရုံဦး', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHPV+GHX, Kannar Rd, Myeik', '9425098665', 98.59401653, 12.43643347, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(22, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'GhonYeeThar Guest House', NULL, NULL, NULL, 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No(347), Nauk Lae (7) & Padauk Shwe War Street Coner, Myeik', '941004711', 98.59671197, 12.43260615, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(23, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Myeik Nan Bone Guest houses', NULL, NULL, 'မြိတ်နန်းဘုံတည်ခိုးရိပ်သာ', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Near the Datkhinadipar Hospital, No(77),Myay Ni Road, Kan Phyar Rd, Myeik 14051', '9253163546', 98.61179216, 12.44458614, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(24, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Kyi Nu Yieik Guest House', NULL, NULL, NULL, 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJV3+CGM, Myeik', '9250616915', 98.60383870, 12.44378786, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(25, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Myeik Sweety Hotel', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thit Sat (2) Street, Kyaung Nge Quarter Myeik, 14051', '9444999324', 98.60281479, 12.43451532, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(26, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Dolphin Inn Myeik', NULL, NULL, 'None', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No.139, Kan Phyar Road, Kan Phyar Yat, Myeik 11122', '9253100581', 98.60958849, 12.43451532, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(27, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Golden Sky Hotel', NULL, NULL, 'ရွှေကောင်းကင်', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ68+MF Myeik', '5941991', 98.61615631, 12.46182280, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(28, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Hotel Mergui', NULL, NULL, 'ဟိုတယ်မြိတ်မြို့', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No.216, Kachin Street, Kalwin Quarter, Near Microwave Tower, Myeik 11111', '941005476', 98.61752960, 12.46059186, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(29, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Shwe La Pyae Guest House', NULL, NULL, 'ရွှေလပြည့်', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Near 5 star ship ward, No.11, U Nyan, Lay Street, Myeik 11111', '9422204940', 98.60760732, 12.46414026, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(30, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Flower Dream', NULL, NULL, 'ပန်းအိပ်မက်', 'Guest House', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJC7+4RR, No.1458, Ft 60 Road Parami 10 Ward, Myeik, Sein Let Thar Yar Rd, Myeik 11111', '9422225836', 98.61262224, 12.47018317, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(31, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'တရုတ်မ', 'Restaurant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHMV+HQ3, Bo Kyoke Rd, Myeik', '9697133069', 98.59439987, 12.43394666, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(32, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Kaung Store', NULL, NULL, 'ကောင်း', 'ဆေးဆိုင်', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHMV+XHQ, Myeik', '9962402100', 98.59413552, 12.43500588, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(33, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဇာဏီ Mobile', 'Mobile phone repair shop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', 98.59452594, 12.43425573, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(34, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'လေးကျွန်းဆီမီး သိမ်တော်ကြီး စေတီတော်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHRW+2X2, မြိတ်', 'None', 98.59745938, 12.44006420, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(35, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ကမ္ဘာလုံးဘုရား', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMH9+JC7, မြိတ်', 'None', 98.66861723, 12.47916644, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(36, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ရွှေအင်းဝတောင်ကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMCC+XRQ, Thel Inn Gu Stree,Sandawut Village,Myeik, မြိတ်', 'None', 98.67196533, 12.47294728, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(37, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ပေါ်တော်မူဘုရား', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ7C+V57, မြိတ်', 'None', 98.62041220, 12.46480018, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(38, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'Mahar Theikdhi Zaya Pagoda', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMG7+9JC, Yangon - Myeik Hiway Road, မြိတ်', 'None', 98.66404896, 12.47585101, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(39, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မိုးကောင်းပရိယတ္တိစာသင်တိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMCM+Q8P, မြိတ်', 'None', 98.68327827, 12.47216995, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(40, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'နိဗ္ဗိန္ဒပရိယတ္တိစာသင်တိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJJ6+F8, မြိတ်', 'None', 98.61091055, 12.43152140, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(41, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အောင်ဘောဂကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJJ6+F8, မြိတ်', 'None', 98.61170985, 12.43057320, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(42, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Taw Kyaung Monastery', NULL, NULL, 'Taw Kyaung Monastery', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJP2+822, မြိတ်', 'None', 98.59977936, 12.43585841, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(43, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'နဂါးရာဇ်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJM5+R9V, ကလွင်, မြိတ်', 'None', 98.60845404, 12.43500024, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(44, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အရှေ့သိမ်ကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ9+RHW, လေယာဉ်ကွင်းလမ်း, မြိတ်', 'None', 98.61887606, 12.43996390, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(45, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အရိယာဝါသကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ7+RJ3, မြိတ်', 'None', 98.61328252, 12.44019297, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(46, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အေးရိပ်သာကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ5+CQ4, မြိတ်', 'None', 98.60967379, 12.43955864, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(47, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အောင်မြေရတနာကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ5+CQ4, မြိတ်', 'None', 98.60931400, 12.43878201, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(48, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'သစ္စာဓမ္မရိပ်သာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJR8+V22, မြိတ်', 'None', 98.61506585, 12.44235285, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(49, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မြိ့တော်ဦးကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJJ5+78P, Unnamed Road, မြိတ်', 'None', 98.60833842, 12.43082436, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(50, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မြို့မကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '79 Sagawar Rd, မြိတ်', 'None', 98.59964620, 12.43705413, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(51, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'လေးမိုင်ယဉ်ငေးရိပ်သာကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FM34+27H, မြိတ်', 'None', 98.65579860, 12.45268059, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(52, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဘိတ်ဂျလန်းကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJP7+25Q, မြိတ်', 'None', 98.61340209, 12.43405767, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(53, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'သာသနာ့မာရ်အောင် ကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJM9+RR8, မြိတ်', 'None', 98.61952496, 12.43467335, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(54, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဓမ္မပါလ ရိပ်သာ ကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ6V+Q8, မြိတ်', 'None', 98.64338062, 12.46208568, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(55, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဗုဒ္ဓဂုဏ်ရည်မိုးကုတ် ဓမ္မရိပ်သာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ4M+V5G, မြိတ်', 'None', 98.63287700, 12.45728398, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(56, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အေးချမ်းအောင်မြေ ရေသိမ်စေတီတော်မြတ်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMFJ+WP, မြိတ်', 'None', 98.68178450, 12.47510843, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(57, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'သာသနသုခတောရကျောင်းဆရာတော်ဦးသုခဓမ္မ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMCH+47, မြိတ်', 'None', 98.67839600, 12.47063914, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(58, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ပဏ္ဍဝံသာရာမ​ကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMFH+29, မြိတ်', 'None', 98.67844216, 12.47263290, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(59, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Dama Yandanar Monastary', NULL, NULL, 'Dama Yandanar Monastary', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJV4+P43,ကန်ဖျားလမ်းမြိတ်', 'None', 98.61277902, 12.43241484, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(60, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဘုရားငါးဆူ ကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', 98.60529033, 12.44420452, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(61, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အရဟံ စေတီတော်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FM88+72 မြိတ်', 'None', 98.66493740, 12.46573238, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(62, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'အောင်မြင့်မိုရ် ဘုရားမြိတ်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GPJ8+W85, Unnamed Road, Lutlut', 'None', 98.71587474, 12.53242904, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(63, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ရန်ကင်းတောင် စေတီ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FPX2+77 Kyaukpya', 'None', 98.70066360, 12.49821277, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(64, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'စာလီမာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJXG+PR3, မြိတ်', 'None', 98.62708374, 12.44937823, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(65, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ရှိတ်မဒီနာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ5+CQ4, မြိတ်', 'None', 98.60945284, 12.43908441, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(66, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Zay Gaung Masjid', NULL, NULL, 'Zay Gaung Masjid', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHMW+P86, မြိတ်', 'None', 98.59582844, 12.43463303, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(67, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Ancient Mosque مسجد', NULL, NULL, 'Ancient Mosque مسجد', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHQX+774, မြိတ်', 'None', 98.59825113, 12.43820300, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(68, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Sri Krishna Hindu Temple', NULL, NULL, 'Sri Krishna Hindu Temple', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHPX+X46, မြိတ်', 'None', 98.59782734, 12.43752723, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(69, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'La Mat Pin Masjid مسجد', NULL, NULL, 'La Mat Pin Masjid مسجد', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ2+264, Sagawar Rd, မြိတ်', 'None', 98.60059473, 12.43761926, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(70, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Shay Haung Masjid مسجد', NULL, NULL, 'Shay Haung Masjid مسجد', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJQ2+GCX, မြိတ်', 'None', 98.60108698, 12.43895142, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(71, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'တောင်သာယာစေတီတော်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ7G+F3W, Unnamed RoadMergui, မြိတ်', 'None', 98.62506832, 12.46385324, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(72, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မိဘဂုဏ်ရည်သီလရှင် စာသင်တိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ7G+H6C, မြိတ်', 'None', 98.62554739, 12.46396239, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(73, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'တောင်သာယာဘိုးဘွားရိပ်သာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ8F+V32, မြိတ်', 'None', 98.62260418, 12.46719497, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(74, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ရွှေပါရမီ ဘုန်း‌ကြီးကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ79+X82, မြိတ်', 'None', 98.61769634, 12.46560540, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(75, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ပုပ္ဖါရုံကျောင်း', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ79+R47, မြိတ်', 'None', 98.61778180, 12.46454405, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(76, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'တိုက်ခွဲ (၃၂) သဲအင်းဂူဝိပဿနာဓမ္မရိပ်သာ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ9C+JG, မြိတ်', 'None', 98.62128234, 12.46912819, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(77, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'Theinngu 32,', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ9C+J6W, BoBwarYakeThar Road, မြိတ်', 'None', 98.62056655, 12.46921289, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(78, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ပထက်တောင်ရွှေသာလျောင်းဘုရားကြီး', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHMQ+J9X, မြိတ်', 'None', 98.58847772, 12.43415421, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(79, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pa-Auk Forest', NULL, NULL, 'Pa-Auk Forest (Myeik) ဖားအောက်တောရ', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMGX+QMM, မြိတ်', 'None', 98.69912265, 12.47703821, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(80, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Yan Kin Hill Pagoda', NULL, NULL, 'Yan Kin Hill Pagoda', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'X5QC+84P, ပုသိမ်ကြီး', 'None', 96.17031554, 21.98835089, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(81, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Taung pyo', NULL, NULL, 'Taung pyo', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJCH+9MH, မြိတ်', 'None', 98.62926652, 12.47094983, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(82, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'ဖနူန်းစုံ စေတီတော်,ရွှေနတ်တောင် ကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FM8P+2MW', 'None', 98.68671687, 12.46513839, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(83, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'သစ်ညီနောင်ဓမ္မရိပ့်သာကျောင်းတိုက်', 'Religious building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FM9Q+W5, မြိတ်', 'None', 98.68790451, 12.46994401, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(84, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'SMA Gas Station', NULL, NULL, 'SMA Gas Station', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FMGH+63 မြိတ်', 'None', 98.67770475, 12.47556392, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(85, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'MCL', NULL, NULL, 'MCL', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ7X+FPJ, 8, မြိတ်', 'None', 98.65049972, 12.46531987, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(86, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pyae Wa Gas Shop', NULL, NULL, 'Pyae Wa Gas Shop', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHMW+8JM, မြိတ်', 'None', 98.59658404, 12.43334538, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(87, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'eco LPGas', NULL, NULL, 'eco LPGas', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FJ6J+9G မြိတ်', 'None', 98.63134426, 12.46091152, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(88, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Yo Yo Lay Gas', NULL, NULL, 'Yo Yo Lay Gas', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHJW+MGJ, မြိတ်', 'None', 98.59626024, 12.43170170, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(89, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Arr Yone Oo', NULL, NULL, 'Arr Yone Oo', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHRX+VX မြိတ်', 'None', 98.59999261, 12.44215525, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL),
(90, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'မြိတ်အများပိုင်စက်သုံးဆီဆိုင်', 'Gas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CJM9+8PX, ေအးရိပ္ျၿငိမ္း, မြိတ်', NULL, 98.61934406, 12.43292136, NULL, '2025-06-11', 'None', 'None', '2025-07-07 22:15:07', '2025-07-07 22:15:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Impedit unde tempor', 'Non at qui accusamus', 'posts/ebrIGGOudBC1HdLYEAUgT05BfrcYHudkTUHWEHEn.jpg', '2025-06-22 06:42:29', '2025-06-22 06:42:29'),
(2, NULL, 'Sunt modi quidem cu', 'Maiores consectetur', 'posts/ipKFppGBgHbYuVTQZztyQlIKUqjXGOVwdbHULBUq.jpg', '2025-06-22 06:42:57', '2025-06-22 06:42:57'),
(3, NULL, 'Vel odit aliquam ad', 'Dolor sed quae persp', 'posts/AAeiuSlZMlWvvHKkHmxYLnYwX20SiJMVhxnSgBpr.jpg', '2025-06-22 20:36:04', '2025-06-22 20:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `image`, `address`, `phone`, `country`, `city`, `date_of_birth`, `last_login`, `ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2025-06-22 06:14:11', '$2y$10$kCrccWkZtp5fd088n1ZssevBallT3zGe.z0rWNhVmZdwkr./iND22', 1, NULL, 'Yangon', '09450000000', 'Myanmar', 'Yangon', '1990-01-01', '2025-07-07 22:15:28', '127.0.0.1', NULL, '2025-06-22 06:14:11', '2025-07-07 22:15:28'),
(2, 'Lin Htut Kyaw', 'linhtut123451@gmail.com', NULL, '$2y$10$1Z8witzrJwqvV2CN88c7Muv2M1YhtGAMy1v9wDAs/eynhjUxZieF2', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-22 20:35:44', '127.0.0.1', NULL, '2025-06-22 06:43:32', '2025-06-22 20:35:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pois`
--
ALTER TABLE `pois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pois_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pois`
--
ALTER TABLE `pois`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pois`
--
ALTER TABLE `pois`
  ADD CONSTRAINT `pois_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
