-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: w-apartment-cms-db
-- Generation Time: Nov 24, 2021 at 07:55 AM
-- Server version: 8.0.26
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `type`, `order_index`, `created_at`, `updated_at`) VALUES
(5, 'ihjiuhiu', 1, '2021-10-18 19:46:29', '2021-10-20 14:21:39'),
(8, 'dg', 6, '2021-10-21 15:45:36', '2021-10-21 15:45:36'),
(14, 'dsdaff', 11, '2021-10-21 16:03:13', '2021-10-21 16:03:13'),
(20, 'sdsdfsf', 12, '2021-10-24 13:22:19', '2021-10-24 13:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `order_index`, `created_at`, `updated_at`) VALUES
(38, 'iuououo', 3, '2021-10-20 00:19:56', '2021-10-24 16:18:03'),
(40, 'jkl', 1, '2021-10-20 00:23:38', '2021-10-24 16:18:03'),
(41, 'sdfsdfsdf', 4, '2021-10-20 00:27:37', '2021-10-24 16:18:03'),
(42, 'dgdfgd', 2, '2021-10-20 00:29:29', '2021-10-24 16:18:03'),
(43, 'sdfsfsfdfdf', 5, '2021-10-20 15:16:21', '2021-10-24 16:18:03'),
(64, 'iopipip', 7, '2021-10-24 04:58:29', '2021-10-24 16:18:03'),
(65, 'sdfsdf', 8, '2021-10-24 07:19:42', '2021-10-24 16:18:03'),
(66, 'sdfewre', 9, '2021-10-24 13:22:27', '2021-10-24 16:18:03'),
(67, 'oioiopi', 10, '2021-10-24 13:44:18', '2021-10-24 16:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended_flag` tinyint(1) NOT NULL,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_profile` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `author_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `public_status`, `featured_image_url`, `recommended_flag`, `author_name`, `author_profile`, `author_image_url`, `category`, `created_at`, `updated_at`) VALUES
(22, '大阪府内の一等地に', '<p>記事の冒頭文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br></p>', '1', '/uploads/blog/featured-image/16363788641636378864.png', 0, NULL, NULL, '/uploads/no_image.png', 26, '2021-11-08 13:41:04', '2021-11-08 13:41:04'),
(23, '大阪府内の一等地に', '<p>大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に<br></p>', '1', '/uploads/blog/featured-image/16363789061636378906.png', 1, NULL, NULL, '/uploads/no_image.png', 27, '2021-11-08 13:41:46', '2021-11-08 13:41:46'),
(24, '大阪府内の一等地に', '<p>大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に大阪府内の一等地に<br></p>', '1', '/uploads/no_image.png', 0, NULL, NULL, '/uploads/no_image.png', 29, '2021-11-08 13:44:17', '2021-11-08 13:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `order_index`, `created_at`, `updated_at`) VALUES
(26, 'カテゴリ1', 1, '2021-11-08 09:49:46', '2021-11-08 09:49:46'),
(27, 'カテゴリ2', 2, '2021-11-08 09:52:59', '2021-11-08 09:52:59'),
(29, 'カテゴリ3', 3, '2021-11-08 09:53:42', '2021-11-08 09:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `house_types`
--

CREATE TABLE `house_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `house_types`
--

INSERT INTO `house_types` (`id`, `type`, `order_index`, `created_at`, `updated_at`) VALUES
(8, 'jhgjhgj', 3, '2021-10-20 14:11:00', '2021-10-24 13:22:00'),
(9, 'wdfsdf', 4, '2021-10-20 14:12:21', '2021-10-20 14:12:21'),
(10, 'sdfsdffd', 5, '2021-10-20 14:12:25', '2021-10-24 14:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `housings`
--

CREATE TABLE `housings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_status` int NOT NULL,
  `featured_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ow_image_urls` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `book` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_image_urls` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voice_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `housings`
--

INSERT INTO `housings` (`id`, `title`, `public_status`, `featured_image_url`, `video_url`, `ow_image_urls`, `book`, `gallery_image_urls`, `voice_url`, `url`, `created_at`, `updated_at`) VALUES
(38, 'Minimal', 0, '/images/lineup01.png', '/uploads/housings/videos/16377368221637736822.wmv', '/uploads/housings/ow-images/1637737680.png,/uploads/housings/ow-images/1637737680.png,/uploads/housings/ow-images/1637737680.png,/uploads/housings/ow-images/1637737680.png', '', 'images/top_support.png', 'https://assets.codepen.io/6093409/river.mp4', 'https://www.w3schools.com/', '2021-11-24 06:53:42', '2021-11-24 07:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_08_180815_create_posts_table', 1),
(5, '2021_10_08_235907_create_contacts_table', 1),
(6, '2021_10_12_184020_create_blogs_table', 1),
(7, '2021_10_13_123636_create_housings_table', 1),
(8, '2021_10_13_224359_create_categories_table', 1),
(9, '2021_10_17_052019_create_areas_table', 1),
(10, '2021_10_17_052113_create_amounts_table', 1),
(11, '2021_10_17_180725_create_house_types_table', 1),
(12, '2021_10_17_184334_create_results_table', 1),
(13, '2021_10_20_024355_add_order_index_to_amounts_table', 2),
(14, '2021_10_20_024415_add_order_index_to_house_types_table', 2),
(15, '2021_10_24_145405_add_order_index_to_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `state`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '5645646', '<p>tryrtyrty</p>', '0', '/uploads/16345080791634508079.jpg', '2021-10-17 22:01:19', '2021-10-17 22:01:19'),
(2, 'sdfsdfsdf', '<p>sdfasdfsdfsfsdf</p>', '1', '/uploads/16345235831634523583.jpg', '2021-10-18 02:19:43', '2021-10-18 02:19:43'),
(3, 'sdfsdf', '<p>sdfdsfsf</p>', '1', '/uploads/16345415151634541515.jpg', '2021-10-18 07:18:36', '2021-10-18 07:18:36'),
(4, 'dgdfg', '<p>dfgdgdg</p>', '1', '/uploads/16345422621634542262.jpg', '2021-10-18 07:31:02', '2021-10-18 07:31:02'),
(5, 'fasdf', '<p>asdadsff</p>', '1', '/uploads/16345852231634585223.png', '2021-10-18 19:27:03', '2021-10-18 19:27:03'),
(7, 'fasdf', '<p>asdadsff</p>', '1', '/uploads/16345852611634585261.png', '2021-10-18 19:27:41', '2021-10-18 19:27:41'),
(10, 'fasdf', '<p>asdadsff</p>', '1', '/uploads/16345855631634585563.png', '2021-10-18 19:32:43', '2021-10-18 19:32:43'),
(12, 'hjghjh', '<p>ghjghjghjghj</p>', '1', '/uploads/16346131721634613172.png', '2021-10-19 03:12:40', '2021-10-19 03:12:52'),
(13, 'jhgjhgjhgjhjkj', '<p>sdfsdfsdf</p>', '1', '/uploads/16346132731634613273.png', '2021-10-19 03:14:33', '2021-10-19 03:14:33'),
(14, 'sdfsdf', '<p>sdfsfsdf</p>', '1', '/uploads/16346133041634613304.png', '2021-10-19 03:15:05', '2021-10-19 03:15:05'),
(15, 'sdfdsfas', '<p>dfsdfsdfsdfs</p>', '1', '/uploads/16346133801634613380.png', '2021-10-19 03:16:20', '2021-10-19 03:16:20'),
(16, 'sdfsdf', '<p>sdfsdsd</p>', '1', '/uploads/16346134461634613446.png', '2021-10-19 03:17:20', '2021-10-19 03:17:26'),
(17, 'sdfsdf', '<p>sdfsdfsdfsdf</p>', '1', '/uploads/16346469951634646995.png', '2021-10-19 12:36:35', '2021-10-19 12:36:35'),
(18, 'xdgfdfs', '<p>sdfsdfsfsdf</p>', '1', '/uploads/16346470871634647087.png', '2021-10-19 12:37:59', '2021-10-19 12:38:07'),
(19, 'sdfsfsdf', '<p>sdfdsfsf</p>', '1', '/uploads/16347158301634715830.png', '2021-10-20 07:43:50', '2021-10-20 07:43:50'),
(22, 'asdf', '<p>sdfdsf</p>', '1', '/images/lineup01.png', '2021-11-22 09:04:42', '2021-11-22 09:04:42'),
(23, 'dsfsdf', '<p>sdfdsf</p>', '1', '/images/lineup01.png', '2021-11-22 09:06:41', '2021-11-22 09:06:41'),
(24, 'sdfdsf', '<p><span style=\"font-size: 1rem;\">sdfsdf</span><br></p>', '1', '/images/lineup01.png', '2021-11-22 09:12:59', '2021-11-22 09:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_status` int NOT NULL,
  `eyecatch_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int NOT NULL,
  `amount_id` int NOT NULL,
  `housetype_id` int NOT NULL,
  `firstview_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_summary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_effects` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_bg_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `choosing_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `choosing_reason_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_introduction_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_introduction_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `future_outlook_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_material_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `title`, `public_status`, `eyecatch_image_url`, `area_id`, `amount_id`, `housetype_id`, `firstview_url`, `instructor_name`, `instruction_summary`, `instruction_effects`, `instruction_details`, `instruction_bg_url`, `choosing_reason`, `choosing_reason_url`, `post_introduction_details`, `post_introduction_url`, `future_outlook_details`, `download_material_url`, `url`, `created_at`, `updated_at`) VALUES
(2, 'etretertt', 0, '/uploads/results/eyecatch_images/16345189501634518950.jpg', 3, 4, 2, '/uploads/results/firstviews/16345189501634518950.jpg', 'sdfsdf', 'gdfgdfgdg', 'fgdfg', 'dgdfgdg', '/uploads/results/instruction_backgrounds/16345189501634518950.jpg', 'dfgsgdg', '/uploads/results/choosing_reason_images/16345189501634518950.jpg', 'etertertwtyuntyuytmuntyu', '/uploads/results/post_introduction_images/16345189501634518950.jpg', '89o89p89o8o', '/uploads/results/download_materials/16345189501634518950.jpg', 'rwverwervwervw', '2021-10-18 01:02:30', '2021-10-18 01:02:30'),
(3, 'rtyrtyrtytrty', 0, '/uploads/results/eyecatch_images/16345189661634518966.jpg', 3, 4, 2, '/uploads/results/firstviews/16345189661634518966.jpg', 'sdfsdffsdf', 'gdfgdfgdg', 'fgdfg', 'dgdfgdg', '/uploads/results/instruction_backgrounds/16345189661634518966.jpg', 'dfgsgdg', '/uploads/results/choosing_reason_images/16345189661634518966.jpg', 'etertertwtyuntyuytmuntyu', '/uploads/results/post_introduction_images/16345189661634518966.jpg', '89o89p89o8o', '/uploads/results/download_materials/16345189661634518966.jpg', 'rwverwervwervw', '2021-10-18 01:02:46', '2021-10-18 01:02:46'),
(4, 'ergdsg', 1, '/uploads/results/eyecatch_images/16345858321634585832.png', 2, 4, 1, '/uploads/results/firstviews/16345858321634585832.png', 'ertert', 'gdfgdfgdg', 'fgdfg', 'sdfg', '/uploads/results/instruction_backgrounds/16345858321634585832.png', 'sdgs', '/uploads/results/choosing_reason_images/16345858321634585832.png', 'etertertwtyuntyuytmuntyu', '/uploads/results/post_introduction_images/16345858321634585832.png', 'asdfa', '/uploads/results/download_materials/16345858321634585832.png', 'adsf', '2021-10-18 19:37:12', '2021-10-18 19:37:12'),
(5, 'ergdsg', 1, '/uploads/results/eyecatch_images/16345859861634585986.png', 2, 4, 1, '/uploads/results/firstviews/16345859861634585986.png', 'ertert', 'gdfgdfgdg', 'fgdfg', 'sdfg', '/uploads/results/instruction_backgrounds/16345859861634585986.png', 'sdgs', '/uploads/results/choosing_reason_images/16345859861634585986.png', 'etertertwtyuntyuytmuntyu', '/uploads/results/post_introduction_images/16345859861634585986.png', 'asdfa', '/uploads/results/download_materials/16345859861634585986.png', 'adsf', '2021-10-18 19:39:46', '2021-10-18 19:39:46'),
(6, 'ergdsg', 1, '/uploads/results/eyecatch_images/16345859881634585988.png', 2, 4, 1, '/uploads/results/firstviews/16345859881634585988.png', 'ertert', 'gdfgdfgdg', 'fgdfg', 'sdfg', '/uploads/results/instruction_backgrounds/16345859881634585988.png', 'sdgs', '/uploads/results/choosing_reason_images/16345859881634585988.png', 'etertertwtyuntyuytmuntyu', '/uploads/results/post_introduction_images/16345859881634585988.png', 'asdfa', '/uploads/results/download_materials/16345859881634585988.png', 'adsf', '2021-10-18 19:39:48', '2021-10-18 19:39:48'),
(7, 'rgertetre', 1, '/uploads/results/eyecatch_images/16346202301634620230.png', 3, 4, 3, '/uploads/results/firstviews/16346202301634620230.png', 'sdfsdf', 'sdfsdfsf', 'sdfsfdsf', 'sdfsdfs', '/uploads/results/instruction_backgrounds/16346202301634620230.png', 'sdfsdfsf', '/uploads/results/choosing_reason_images/16346202301634620230.png', 'sdfsdf', '/uploads/results/post_introduction_images/16346202301634620230.png', 'sdfsdfsdf', '/uploads/results/download_materials/16346202301634620230.png', 'sfdsdfsf', '2021-10-19 05:10:30', '2021-10-19 05:10:30'),
(8, 'rgertetre', 1, '/uploads/results/eyecatch_images/16346202341634620234.png', 3, 4, 3, '/uploads/results/firstviews/16346202341634620234.png', 'sdfsdf', 'sdfsdfsf', 'sdfsfdsf', 'sdfsdfs', '/uploads/results/instruction_backgrounds/16346202341634620234.png', 'sdfsdfsf', '/uploads/results/choosing_reason_images/16346202341634620234.png', 'sdfsdf', '/uploads/results/post_introduction_images/16346202341634620234.png', 'sdfsdfsdf', '/uploads/results/download_materials/16346202341634620234.png', 'sfdsdfsf', '2021-10-19 05:10:34', '2021-10-19 05:10:34'),
(9, 'sdfsdfsdf', 1, '/uploads/results/eyecatch_images/16346202881634620288.png', 25, 5, 2, '/uploads/results/firstviews/16346202881634620288.png', 'sdfdsf', 'sdfsdfsf', 'sdfsfsfsdf', 'sdfsfsf', '/uploads/results/instruction_backgrounds/16346202881634620288.png', 'sdfsdfsdf', '/uploads/results/choosing_reason_images/16346202881634620288.png', 'sdfsfsfsf', '/uploads/results/post_introduction_images/16346202881634620288.png', 'sdfsfsf', '/uploads/results/download_materials/16346202881634620288.png', 'sdfdsfsfsdf', '2021-10-19 05:11:28', '2021-10-19 05:11:28'),
(10, 'ertert', 1, '/uploads/results/eyecatch_images/16346212921634621292.png', 3, 4, 2, '/uploads/results/firstviews/16346212921634621292.png', 'sdfsdff', 'sdfsdfsf', 'sdfsdfsf', 'sdfsdfsf', '/uploads/results/instruction_backgrounds/16346212921634621292.png', 'sdfsdfsf', '/uploads/results/choosing_reason_images/16346212921634621292.png', 'sdfsdfsdf', '/uploads/results/post_introduction_images/16346212921634621292.png', 'sdfsdfsf', '/uploads/results/download_materials/16346212921634621292.png', 'sdfsfsf', '2021-10-19 05:28:12', '2021-10-19 05:28:12'),
(11, 'sdfsddfsf', 1, '/uploads/results/eyecatch_images/16346214161634621416.png', 2, 5, 2, '/uploads/results/firstviews/16346214161634621416.png', 'sdfdsfsf', 'gdfgdfgfdg', 'gjtytuytu', 'wqeqeqe', '/uploads/results/instruction_backgrounds/16346214161634621416.png', 'hjkhjkhjk', '/uploads/results/choosing_reason_images/16346214161634621416.png', '\'opo[o[', '/uploads/results/post_introduction_images/16346214161634621416.png', 'uoiuiou', '/uploads/results/download_materials/16346214161634621416.png', 'w23iuyi', '2021-10-19 05:30:09', '2021-10-19 05:30:16'),
(12, 'sdfdsfsf', 1, '/uploads/results/eyecatch_images/16346216461634621646.png', 3, 5, 2, '/uploads/results/firstviews/16346216461634621646.png', 'dfgdg', 'sdfsdf', 'sdfdsddf', 'sdfsdf', '/uploads/results/instruction_backgrounds/16346216461634621646.png', 'sdfdsdfsf', '/uploads/results/choosing_reason_images/16346216461634621646.png', 'etertret', '/uploads/results/post_introduction_images/16346216461634621646.png', 'ertretet', '/uploads/results/download_materials/16346216461634621646.png', 'ertertert', '2021-10-19 05:32:16', '2021-10-19 05:34:06'),
(13, 'ssdasdasd', 1, '/uploads/results/eyecatch_images/16346220701634622070.png', 2, 5, 2, '/uploads/results/firstviews/16346220701634622070.png', 'sdfsf', 'dsfdsfsf', 'sdfsdfsdf', 'sdsdfsf', '/uploads/results/instruction_backgrounds/16346220701634622070.png', 'sdfdsfsf', '/uploads/results/choosing_reason_images/16346220701634622070.png', 'sdssf', '/uploads/results/post_introduction_images/16346220701634622070.png', 'fdgdfgdfg', '/uploads/results/download_materials/16346220701634622070.png', 'dfgdfgdfgdg', '2021-10-19 05:41:05', '2021-10-19 05:41:10'),
(14, 'dfsdfsdfsdffsdf', 1, '/uploads/results/eyecatch_images/16348793181634879318.png', 42, 14, 9, '/uploads/results/firstviews/16348793181634879318.png', 'sdfsdfsfwes', 'sdfawerewerwer', 'dfsfsdfsdfsdfsdf', 'sdfsdfsdfsdffsdfs', '/uploads/results/instruction_backgrounds/16348793181634879318.png', 'sdfsdfsdfewrwer', '/uploads/results/choosing_reason_images/16348793181634879318.png', 'sadffsdfsdsdf', '/uploads/results/post_introduction_images/16348793181634879318.png', 'rwerewerewrwerew', '/uploads/results/download_materials/16348793181634879318.png', '5345345354erte', '2021-10-22 05:08:30', '2021-10-22 05:08:38'),
(15, 'fdgfdgdfgdgdg', 1, '/uploads/results/eyecatch_images/16349046191634904619.png', 40, 12, 9, '/uploads/results/firstviews/16349046191634904619.png', 'werewrertyry', 'akjkuiytrete', 'fsfvrtetuyiui', 'wercvadswe', '/uploads/results/instruction_backgrounds/16349046191634904619.png', 'kuihkhjkhtryr', '/uploads/results/choosing_reason_images/16349046191634904619.png', 'ewreryrtyrtyhgfh', '/uploads/results/post_introduction_images/16349046191634904619.png', 'wewedfsdf', '/uploads/results/download_materials/16349046191634904619.png', 'tkjllkjljkljkljlk', '2021-10-22 12:10:07', '2021-10-22 12:10:19'),
(17, 'ertrtertnrenternt', 1, '/uploads/results/eyecatch_images/16349101101634910110.png', 41, 13, 9, '/uploads/results/firstviews/16349101101634910110.png', 'dfsdfsdfsdf', 'sdfsdfwerwrwe', 'ergfghfghfgh', 'fghgjtyjtyjytjtyj', '/uploads/results/instruction_backgrounds/16349101101634910110.png', 'srwerwerwer', '/uploads/results/choosing_reason_images/16349101101634910110.png', 'sdfsdfsdfsdffsdf', '/uploads/results/post_introduction_images/16349101101634910110.png', 'xfdferwerwerwer', '/uploads/results/download_materials/16349101101634910110.png', 'werewrwerewerwer', '2021-10-22 13:41:44', '2021-10-22 13:41:50'),
(18, 'erewerwrw', 1, '/uploads/results/eyecatch_images/16349103521634910352.png', 41, 13, 9, '/uploads/results/firstviews/16349103521634910352.png', 'dsadasdasdasd', 'lkjlkjoijpoijoi', 'jhvvhygfygygfy', 'uhblklmlkmlkm', '/uploads/results/instruction_backgrounds/16349103521634910352.png', 'tfytfyfyfyghjh', '/uploads/results/choosing_reason_images/16349103521634910352.png', 'ssrdcvbjnbjhbj', '/uploads/results/post_introduction_images/16349103521634910352.png', 'ertertert', '/uploads/results/download_materials/16349103521634910352.png', 'werwerggfdfgdfg', '2021-10-22 13:45:13', '2021-10-22 13:45:52'),
(19, 'dfgdgdg', 1, '/uploads/results/eyecatch_images/16349104121634910412.png', 43, 15, 9, '/uploads/results/firstviews/16349104121634910412.png', 'dgdfgdgdgg', 'wqrwrerseers', 'gffgfghghgh', 'ghjghjghjgjgj', '/uploads/results/instruction_backgrounds/16349104121634910412.png', 'aweadsdsddddsdf', '/uploads/results/choosing_reason_images/16349104121634910412.png', ',kjkjkliului', '/uploads/results/post_introduction_images/16349104121634910412.png', 'ghjghjhgj', '/uploads/results/download_materials/16349104121634910412.png', 'kjhkhjkhjkhjk', '2021-10-22 13:46:46', '2021-10-22 13:46:52'),
(21, 'dfgxfbxv', 1, '/uploads/case-study/eyecatch_images/16375566581637556658.png', 41, 5, 8, '/uploads/case-study/firstviews/16375566581637556658.png', 'zxcvbcvb', 'xcvbcvb', 'cvb', 'xcvbcvb', '/uploads/case-study/instruction_backgrounds/16375566581637556658.png', 'cvbcvb', '/uploads/case-study/choosing_reason_images/16375566581637556658.png', 'cvbcvb', '/uploads/case-study/post_introduction_images/16375566581637556658.png', 'cvbcv', '/uploads/case-study/download_materials/16375566581637556658.png', 'cvbcvb', '2021-11-22 04:50:58', '2021-11-22 04:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `house_types`
--
ALTER TABLE `house_types`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `housings`
--
ALTER TABLE `housings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_types`
--
ALTER TABLE `house_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `housings`
--
ALTER TABLE `housings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
