-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Ağu 2025, 16:10:23
-- Sunucu sürümü: 8.0.43
-- PHP Sürümü: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `nextalya`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `businessrequest`
--

CREATE TABLE `businessrequest` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 24, 'test', '2025-08-26 00:50:50', '2025-08-26 00:50:50'),
(2, 2, 24, 'asd', '2025-08-26 00:50:54', '2025-08-26 00:50:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `communities`
--

CREATE TABLE `communities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `community_token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `communityproducts`
--

CREATE TABLE `communityproducts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `community_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customlogs`
--

CREATE TABLE `customlogs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `customlogs`
--

INSERT INTO `customlogs` (`id`, `user_id`, `type`, `content`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 'like', 'Ultra HD 4K Televizyon 50 ürünü abdullah balıkçı tarafından beğenildi.', 'unread', '2025-08-26 00:15:13', '2025-08-26 00:15:13'),
(7, 2, 'favorite', 'Masaüstü Nemlendirici Difüzör ürünü abdullah balıkçı tarafından favorilere eklendi.', 'unread', '2025-08-26 00:17:13', '2025-08-26 00:17:13'),
(8, 2, 'like', 'Kaymaz Tabanlı Banyo Paspası ürünü abdullah balıkçı tarafından beğenildi.', 'unread', '2025-08-26 00:28:27', '2025-08-26 00:28:27'),
(9, 2, 'favorite', 'Kaymaz Tabanlı Banyo Paspası ürünü abdullah balıkçı tarafından favorilere eklendi.', 'unread', '2025-08-26 00:28:29', '2025-08-26 00:28:29'),
(10, 2, 'favorite', 'Kaymaz Tabanlı Banyo Paspası ürünü abdullah balıkçı tarafından favorilere eklendi.', 'unread', '2025-08-26 00:38:17', '2025-08-26 00:38:17'),
(11, 2, 'like', 'Kaymaz Tabanlı Banyo Paspası ürünü abdullah balıkçı tarafından beğenildi.', 'unread', '2025-08-26 00:38:18', '2025-08-26 00:38:18'),
(12, 2, 'like', 'Kaymaz Tabanlı Banyo Paspası ürününüze abdullah balıkçı tarafından yorum yapıldı.', 'unread', '2025-08-26 00:50:50', '2025-08-26 00:50:50'),
(13, 2, 'like', 'Kaymaz Tabanlı Banyo Paspası ürününüze abdullah balıkçı tarafından yorum yapıldı.', 'unread', '2025-08-26 00:50:54', '2025-08-26 00:50:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favories`
--

CREATE TABLE `favories` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `favories`
--

INSERT INTO `favories` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 19, 2, '2025-08-26 00:05:05', '2025-08-26 00:05:05'),
(4, 23, 2, '2025-08-26 00:17:13', '2025-08-26 00:17:13'),
(6, 24, 2, '2025-08-26 00:38:17', '2025-08-26 00:38:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follows`
--

CREATE TABLE `follows` (
  `id` bigint UNSIGNED NOT NULL,
  `follower_id` bigint UNSIGNED NOT NULL,
  `following_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2025-08-22 23:51:01', '2025-08-22 23:51:01'),
(3, 2, 4, '2025-08-22 23:51:03', '2025-08-22 23:51:03'),
(4, 5, 4, '2025-08-23 00:27:16', '2025-08-23 00:27:16'),
(5, 5, 3, '2025-08-23 00:27:18', '2025-08-23 00:27:18'),
(6, 5, 2, '2025-08-23 00:27:18', '2025-08-23 00:27:18'),
(7, 2, 3, '2025-08-25 23:21:29', '2025-08-25 23:21:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lowcats`
--

CREATE TABLE `lowcats` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_07_172420_create_topcats_table', 1),
(5, '2025_03_07_172428_create_subcats_table', 1),
(6, '2025_03_07_172435_create_lowcats_table', 1),
(7, '2025_07_12_050820_add_multiple_columns_to_users_table', 1),
(8, '2025_07_25_102602_add_columnname_to_users_table', 1),
(9, '2025_07_28_091730_create_products_table', 1),
(10, '2025_07_28_091948_create_productfeatures_table', 1),
(11, '2025_07_28_092027_create_productviews_table', 1),
(12, '2025_07_30_101642_create_productlikes_table', 1),
(13, '2025_07_30_184411_create_businessrequest_table', 1),
(14, '2025_07_30_194508_create_favories_table', 1),
(15, '2025_07_31_122346_create_communities_table', 1),
(16, '2025_08_06_204337_create_communityproducts_table', 1),
(17, '2025_08_13_195200_create_follows_table', 1),
(18, '2025_08_20_012124_create_customlogs_table', 1),
(19, '2025_08_20_152821_create_reposts_table', 1),
(20, '2025_09_26_114610_create_polloptions_table', 1),
(21, '2025_09_26_114654_create_pollvotes_table', 1),
(22, '2025_08_26_032516_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `polloptions`
--

CREATE TABLE `polloptions` (
  `id` bigint UNSIGNED NOT NULL,
  `poll_id` bigint UNSIGNED NOT NULL,
  `option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `polloptions`
--

INSERT INTO `polloptions` (`id`, `poll_id`, `option_text`, `created_at`, `updated_at`) VALUES
(6, 17, 'Çok iyi', '2025-08-22 23:49:14', '2025-08-22 23:49:14'),
(7, 17, 'Ortalama', '2025-08-22 23:49:14', '2025-08-22 23:49:14'),
(8, 17, 'Daha iyi olabilir', '2025-08-22 23:49:14', '2025-08-22 23:49:14'),
(9, 17, 'Meryem işi bıraksın', '2025-08-22 23:49:14', '2025-08-22 23:49:14'),
(10, 26, 'asdsa', '2025-08-25 23:41:12', '2025-08-25 23:41:12'),
(11, 26, 'dsad', '2025-08-25 23:41:12', '2025-08-25 23:41:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pollvotes`
--

CREATE TABLE `pollvotes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `poll_id` bigint UNSIGNED NOT NULL,
  `poll_option_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pollvotes`
--

INSERT INTO `pollvotes` (`id`, `user_id`, `poll_id`, `poll_option_id`, `created_at`, `updated_at`) VALUES
(1, 2, 17, 9, '2025-08-23 00:27:12', '2025-08-23 00:27:12'),
(2, 5, 17, 9, '2025-08-23 00:27:22', '2025-08-23 00:27:22'),
(3, 2, 26, 10, '2025-08-25 23:53:50', '2025-08-25 23:53:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productfeatures`
--

CREATE TABLE `productfeatures` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `feature_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `productfeatures`
--

INSERT INTO `productfeatures` (`id`, `product_id`, `feature_name`, `created_at`, `updated_at`) VALUES
(7, 8, 'özellik 1', '2025-08-22 23:38:18', '2025-08-22 23:38:18'),
(8, 8, 'özellik 2', '2025-08-22 23:38:18', '2025-08-22 23:38:18'),
(9, 9, 'özellik 1', '2025-08-22 23:38:42', '2025-08-22 23:38:42'),
(10, 9, 'özellik 2', '2025-08-22 23:38:42', '2025-08-22 23:38:42'),
(11, 10, 'özellik 1', '2025-08-22 23:39:16', '2025-08-22 23:39:16'),
(12, 10, 'özellik 2', '2025-08-22 23:39:16', '2025-08-22 23:39:16'),
(13, 11, 'özellik 1', '2025-08-22 23:39:40', '2025-08-22 23:39:40'),
(14, 11, 'özellik 2', '2025-08-22 23:39:40', '2025-08-22 23:39:40'),
(15, 12, 'özellik 1', '2025-08-22 23:40:05', '2025-08-22 23:40:05'),
(16, 12, 'özellik 2', '2025-08-22 23:40:05', '2025-08-22 23:40:05'),
(17, 13, 'özellik 1', '2025-08-22 23:40:22', '2025-08-22 23:40:22'),
(18, 13, 'özellik 2', '2025-08-22 23:40:22', '2025-08-22 23:40:22'),
(19, 19, 'Özellik', '2025-08-25 23:16:34', '2025-08-25 23:16:34'),
(20, 19, 'özellik 2', '2025-08-25 23:16:34', '2025-08-25 23:16:34'),
(21, 20, 'özellik 1', '2025-08-25 23:16:55', '2025-08-25 23:16:55'),
(22, 20, 'özellik 2', '2025-08-25 23:16:55', '2025-08-25 23:16:55'),
(23, 21, 'özellik 1', '2025-08-25 23:17:22', '2025-08-25 23:17:22'),
(24, 21, 'özellik 2', '2025-08-25 23:17:22', '2025-08-25 23:17:22'),
(25, 22, 'özellik 1', '2025-08-25 23:17:45', '2025-08-25 23:17:45'),
(26, 22, 'özellik 2', '2025-08-25 23:17:45', '2025-08-25 23:17:45'),
(27, 23, 'özellik 1', '2025-08-25 23:18:07', '2025-08-25 23:18:07'),
(28, 23, 'özellik 2', '2025-08-25 23:18:07', '2025-08-25 23:18:07'),
(29, 24, 'özellik 1', '2025-08-25 23:18:31', '2025-08-25 23:18:31'),
(30, 24, 'özellik 2', '2025-08-25 23:18:31', '2025-08-25 23:18:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productlikes`
--

CREATE TABLE `productlikes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `productlikes`
--

INSERT INTO `productlikes` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 23, 2, '2025-08-26 00:14:39', '2025-08-26 00:14:39'),
(14, 10, 2, '2025-08-26 00:15:13', '2025-08-26 00:15:13'),
(16, 24, 2, '2025-08-26 00:38:18', '2025-08-26 00:38:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `topcat_id` bigint UNSIGNED DEFAULT NULL,
  `subcat_id` bigint UNSIGNED DEFAULT NULL,
  `lowcat_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('friends','everyone','just_me') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('product','post','poll','discussion') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `user_id`, `topcat_id`, `subcat_id`, `lowcat_id`, `title`, `slug`, `description`, `image`, `price`, `platform`, `url`, `base_token`, `visibility`, `type`, `created_at`, `updated_at`) VALUES
(8, 3, 1, NULL, NULL, 'Akıllı Saat X100', 'akilli-saat-x100-d35GxPVDo7NuKQx3', 'Adım sayar, uyku takibi ve kalp ritmi ölçümü özelliklerine sahip modern tasarımlı akıllı saat.', '68a8ff6abc0b3.jpg', '1.299', NULL, 'https://nextalya.com', 'd35GxPVDo7NuKQx3', 'friends', 'product', '2025-08-22 23:38:18', '2025-08-22 23:38:18'),
(9, 4, 1, NULL, NULL, 'Kablosuz Bluetooth Kulaklık Pro', 'kablosuz-bluetooth-kulaklik-pro-FACpcZN0MJ4jGx9A', 'Gürültü engelleme, hızlı şarj ve 24 saat pil ömrü sunan yüksek kaliteli kulaklık.', '68a8ff8293dc4.jpg', '899', NULL, 'https://nextalya.com', 'FACpcZN0MJ4jGx9A', 'friends', 'product', '2025-08-22 23:38:42', '2025-08-22 23:38:42'),
(10, 4, 1, NULL, NULL, 'Ultra HD 4K Televizyon 50', 'ultra-hd-4k-televizyon-50-bIvY77vQxebV1mpn', '4K çözünürlük, HDR desteği ve dahili uygulamalarla eğlence deneyimini artıran televizyon.', '68a8ffa4bc4cb.jpg', '8.499', NULL, 'https://nextalya.com', 'bIvY77vQxebV1mpn', 'friends', 'product', '2025-08-22 23:39:16', '2025-08-22 23:39:16'),
(11, 5, 1, NULL, NULL, 'Ergonomik Ofis Sandalyesi', 'ergonomik-ofis-sandalyesi-KZkRsx3Q4xl7i4uc', 'Bel ve boyun destekli, ayarlanabilir kolçaklı rahat ofis sandalyesi.', '68a8ffbc1a370.jpg', '2.199', NULL, 'https://nextalya.com', 'KZkRsx3Q4xl7i4uc', 'friends', 'product', '2025-08-22 23:39:40', '2025-08-22 23:40:46'),
(12, 5, 1, NULL, NULL, 'Dizüstü Bilgisayar 15.6 i5', 'dizustu-bilgisayar-156-i5-JGK7HbAEtrNkYRZe', 'Intel i5 işlemci, 8GB RAM ve 512GB SSD ile günlük işlerinizi hızla yapabileceğiniz laptop.', '68a8ffd5abcda.jpg', '14.999', NULL, 'https://nextalya.com', 'JGK7HbAEtrNkYRZe', 'friends', 'product', '2025-08-22 23:40:05', '2025-08-22 23:40:49'),
(13, 5, 1, NULL, NULL, 'Akıllı Robot Süpürge Max', 'akilli-robot-supurge-max-twG05vTwouG1PRdA', 'Haritalama özelliği, güçlü emiş gücü ve mobil uygulama kontrolüyle evinizi zahmetsizce temizleyen robot süpürge.', '68a8ffe6c1164.jpg', '6.799', NULL, 'https://nextalya.com', 'twG05vTwouG1PRdA', 'friends', 'product', '2025-08-22 23:40:22', '2025-08-22 23:40:33'),
(14, 5, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent felis nibh, porta dictum interdum quis, fringilla vitae mi. Donec dui elit, lacinia vel elementum sed, congue et dolor', NULL, NULL, NULL, NULL, 'jyOKNdNdtxk5hP0C', 'just_me', 'post', '2025-08-22 23:46:06', '2025-08-22 23:46:06'),
(15, 5, NULL, NULL, NULL, NULL, NULL, 'Suspendisse aliquam bibendum neque. Praesent feugiat eros et facilisis condimentum. Vivamus a ex in massa consectetur ornare. Quisque lacus diam, facilisis id quam vitae, faucibus convallis orci. Duis tellus diam, lobortis sit amet erat sit amet, mollis consectetur sapien. Nulla ultricies nisl eget', NULL, NULL, NULL, NULL, '4J2STRotGeZe2LOi', 'friends', 'post', '2025-08-22 23:46:16', '2025-08-22 23:46:16'),
(16, 5, NULL, NULL, NULL, NULL, NULL, NULL, '68a9016cc5573.jpg', NULL, NULL, NULL, 'XLdtB60vjyBUMX3p', 'everyone', 'post', '2025-08-22 23:46:52', '2025-08-22 23:46:52'),
(17, 4, NULL, NULL, NULL, 'Nextalya platformu hakkında ne düşünüyorsunuz?', NULL, NULL, NULL, NULL, NULL, NULL, 'opOiGb2BMvAi6Akn', 'friends', 'poll', '2025-08-22 23:49:14', '2025-08-22 23:49:14'),
(18, 5, NULL, NULL, NULL, 'Bu konu hakkındaki tartışma konumuz', 'bu-konu-hakkindaki-tartisma-konumuz-SQkr0KxbsMeRbiXW', 'Curabitur fermentum fringilla mauris eu tincidunt. Suspendisse tristique eu dui in malesuada. Sed eget pretium leo. Sed dolor leo, ullamcorper ac varius id, accumsan at risus. Donec a eros lorem. Integer risus massa, elementum pulvinar justo sagittis, maximus gravida elit. Donec mattis sem mi, ac co', NULL, NULL, NULL, NULL, 'SQkr0KxbsMeRbiXW', 'friends', 'discussion', '2025-08-23 00:13:45', '2025-08-23 00:13:45'),
(19, 2, 4, NULL, NULL, 'Katlanabilir Çamaşır Kurutmalık', 'katlanabilir-camasir-kurutmalik-dyUfTtHgVuQx0DMq', 'Dayanıklı metal gövdesi ve geniş asma alanı sayesinde çamaşırlarınızı pratik şekilde kurutabilirsiniz. Katlanabilir yapısıyla yer kaplamaz.', '68aceed204676.jpg', '649', NULL, 'https://nextalya.com', 'dyUfTtHgVuQx0DMq', 'everyone', 'product', '2025-08-25 23:16:34', '2025-08-25 23:16:34'),
(20, 2, 4, NULL, NULL, 'Bambu Çamaşır Sepeti', 'bambu-camasir-sepeti-6qqKAAsQSY3b6i2q', 'Doğal bambu malzemeden üretilmiş, şık ve sağlam çamaşır sepeti. Ev dekorasyonunuza uyum sağlar, geniş iç hacmi ile kullanışlıdır', '68aceee778768.jpg', '459', NULL, 'https://nextalya.com', '6qqKAAsQSY3b6i2q', 'everyone', 'product', '2025-08-25 23:16:55', '2025-08-25 23:16:55'),
(21, 2, 4, NULL, NULL, 'Vakumlu Saklama Torbası', 'vakumlu-saklama-torbasi-oPmHXxpBGdRbM6W0', 'Yorgan, battaniye ve kıyafetleri %75’e kadar küçülterek saklamanıza yardımcı olur. Seyahatlerde de pratik kullanım sunar.', '68acef022efe2.jpg', '299', NULL, 'https://nextalya.com', 'oPmHXxpBGdRbM6W0', 'everyone', 'product', '2025-08-25 23:17:22', '2025-08-25 23:17:22'),
(22, 2, 2, NULL, NULL, 'Dijital Oda Termometresi ve Higrometre', 'dijital-oda-termometresi-ve-higrometre-uzok6VvFfhh7ZzyS', 'İç mekân sıcaklık ve nem oranını ölçer. Sağlıklı bir yaşam ortamı oluşturmanız için idealdir', '68acef19311dd.jpg', '229', NULL, 'https://nextalya.com', 'uzok6VvFfhh7ZzyS', 'everyone', 'product', '2025-08-25 23:17:45', '2025-08-25 23:17:45'),
(23, 2, 2, NULL, NULL, 'Masaüstü Nemlendirici Difüzör', 'masaustu-nemlendirici-difuzor-H6LQkjsmAQr2OZYe', 'Sessiz çalışma özelliğiyle havayı nemlendirir, esansiyel yağlarla kullanıldığında ferah bir ortam oluşturur.', '68acef2f55893.jpg', '379', NULL, 'https://nextalya.com', 'H6LQkjsmAQr2OZYe', 'everyone', 'product', '2025-08-25 23:18:07', '2025-08-25 23:18:07'),
(24, 2, 3, NULL, NULL, 'Kaymaz Tabanlı Banyo Paspası', 'kaymaz-tabanli-banyo-paspasi-od9CkznTsw7uJnEP', 'Yumuşak dokulu, suyu hızlı emer ve kaymaz tabanı sayesinde güvenli kullanım sağlar. Çamaşır makinesinde kolayca yıkanabilir', '68acef47bd4f4.jpg', '189', NULL, 'https://nextalya.com', 'od9CkznTsw7uJnEP', 'everyone', 'product', '2025-08-25 23:18:31', '2025-08-25 23:18:31'),
(25, 4, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, 'd4nCoGPJqemOu3cA', 'friends', 'post', '2025-08-25 23:39:57', '2025-08-25 23:39:57'),
(26, 4, NULL, NULL, NULL, 'asdsad', NULL, NULL, NULL, NULL, NULL, NULL, 'A3PeBOb7XEzApMGA', 'everyone', 'poll', '2025-08-25 23:41:12', '2025-08-25 23:41:12'),
(27, 2, NULL, NULL, NULL, 'asdas', 'asdas-wWEqJhxZB1XxHuRh', 'dasdsadsadsad', NULL, NULL, NULL, NULL, 'wWEqJhxZB1XxHuRh', 'just_me', 'discussion', '2025-08-25 23:45:51', '2025-08-25 23:45:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productviews`
--

CREATE TABLE `productviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `view_user_id` bigint UNSIGNED NOT NULL,
  `view_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reposts`
--

CREATE TABLE `reposts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `reposts`
--

INSERT INTO `reposts` (`id`, `product_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 13, 2, 'test repost yorumu', '2025-08-23 00:45:32', '2025-08-23 00:45:32'),
(2, 13, 2, 'bu ürün repostlandı', '2025-08-23 00:55:58', '2025-08-23 00:55:58'),
(3, 12, 2, 'teasdsa', '2025-08-25 23:12:08', '2025-08-25 23:12:08'),
(4, 10, 2, 'asdasdsad', '2025-08-25 23:12:11', '2025-08-25 23:12:11'),
(5, 12, 2, 'asdasdasd', '2025-08-25 23:12:14', '2025-08-25 23:12:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('01uv0L32f8e6HlKbXk0qIvlunpeccEFH35EAJzcV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGE1TDRlTnNXSzRBZ0Y2WTAzdnpkWWZMazZwaXZ3WVFRUEd6REpUdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907109),
('02rmGWlpNkbA1xuI9Z20LLPu02vIMi1yqlDDDC2D', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiem9nM0g1TGVTNTFWYkVXOFlOTWhtVExzZ1g3WElxV2tzeWhLRnFaNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898983),
('0Eq5Ed5NXb85ULwgatvfhp0DT8D7FSvjaKRvEIrw', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0Rxek1TaXBZQXJlQnFUSTljMVRFZ3QzNVczaFlTNUkwTmNZdWxUZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908455),
('0EYbtnOzhYk5siMfcUv9BL050AvempkeTrFPVB7H', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0tYeVduOTZtaDN3NXNPU0l2akc2eWhGRU9sTUZTYXhXdW12Qm1vSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907902),
('0GDIAdcXNU2eRW0PZXPB5BAwilOOGajIfPUVTban', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjdnM3pCR2dzS2QwQURURTJFZlFicU81UVNHRXJZZlV6cllITDh4cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907118),
('0i1FrhbhhDF5h2hK1knsvhYpHmcqYNu1ALB21Pie', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTFZN2VVTkV4dGNaTXRZYVUya01PV29yNTZMOEdPZFA2UVBZVVZieiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168758),
('0iinMtB5TMHMnBIHm0kw4EP9yFqg60s4GpcXD1Gd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXVWRnpwMlVOU21vdEpoZWJwdUtXVXpPdlBOdmtRUlFueEtkbG9qNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165613),
('0RZvVM8tUxN3axuD9XmZCUqF80GiUuY8XRRP104i', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXZncTIxcnZkazRpMjFKajN4S2FlcE9wUlhYcFBkUmhLekVMSXVCTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899870),
('1908s3BmoGIyCg1c0S9oRWBODTU9rw0rzbjAUfwo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTklKS3VRT3pUd2RDcVZod245OXhmckF4QVFtT2djT2c5OWx5Tk1hbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901844),
('1EeCLLyPDaIA9412eKHbKvW1D1SYK12rM5GS8zK4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDM1VldpRkJwNUxsdzRXVmdCNWJaS09SQkxQVzhBSEVEY3V0QkVUaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756154922),
('1IvX89OHOwKdPilHHcXyCP14KT17VuBOCpdDE9fc', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRE9qYnZRNEhwRnBzdmNka1hCVzQ4MFE5RGlGNDB1cHZQOWpqWjZ6NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910038),
('1K9iD7hQhYcm94nqITwEIIJepIGFwu3kDTc86zZP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0JkOWtjbk05eThSNmExY3pXbDI3M21aa2hsOWN0elI2MU0wUUlrZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168729),
('1Kc8Gwp3f8mD6hbuOB62KYpVlLlvE8C4dYx0LIyL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1pYZTNiUEVXQ2tKaGJSejN5a1h4Q1cxdVZ0VkhjUm5NVWNKYTM1NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163547),
('1ku224B3lp0cnNI0KjCs2eD0S1p2DXEVOlfF5lIX', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE9qYkdNTkdUZG10MHFZMElidnVMWTZsUXlXVkVVUVJ6Q25lc0YweiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910030),
('1x9z2Gii9wY6dCpxG6waee8IfNLJTayXUxoylAo9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkVsRDFZbldTY3ZCZXVwVnVVazQ0TGliWTF6TU5TcXVLU2FOanQ2QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900501),
('1XsYJIXR7yppDFNR97SzVuykX11QrfUkvkKJgdJn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmRXWkhYRU1YRHlEU1lMbzNyMlVZMDhKVE83TTRPZUhTUkI0TERjRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168963),
('3zoOx0c9SozTyrYZaFKvSTmXRJREDQE54NqGQlIK', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTAyek9VcXFyZURTODJsMmFnVVlLS05zZHJzMzJWN295RzEzSnk1aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909894),
('40kVbbZRcETSsvLq3CKJTRW2LtTaxolxRAbdKJVE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkxCVlhaTHhKSTJuUmFFd3ZDMlY1aTZ2bzhYZWtPUDRGSjNtMEtzMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899224),
('43RQhN4GTeJiu1PMgzocutifCt8qlUcIEccNk3FS', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianM0bWwxTHNsMnZHU0F4SGpxZ2VWdUN3VHJlMEk3Q2Juamwyb2RBcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907103),
('43TW9v6woRM9hHr7rF9DW11mYWL9mtfHlkPv8mId', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzdxc09VZGZaVkZhM28xbEw2N1JpZ00zc2lUMUtGRGtldUVSNkk0SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163940),
('4aA3ECpjgQMPY9GK4C9wqzuj1zfzvGUPnqRbGmto', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnpHYWFxYWhlMk4zZTBQa1FQWjFGRjZpb24zTUtKYzJkbHd4anJhbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165089),
('4FTIOghWefZhd2WjZtQRPF3yLC6hSZ16vW9PxLVo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGxsYzZPQnJhS1RyNW1LNHVaZlhsQ2ZtM3lOY2h6YWJyOFJhT3BIRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164468),
('5L3kqvq2sEad5CFp47BTQjTI74176UGozh0PI6TQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVlBeHE0SDk1MFo0ZFJ1Ynl4MXlsYlhRN2pVRkZSejJVblVRV2xFbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901846),
('5w6Xx4uTngQZDdt4JXnYJfVeJfo8StuSi3AmFKdZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVVDZUN6MHhNSGRlUW5ONmZUUjJ6a1B5dXpKNjZRcWxjUjdVbDJmbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168266),
('64UdbrCS44b9x9S570SZ6inatrX9qIybgCGLhvt7', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWl5VUlOR2JSNGFBRW54c1ZaZVE5R3BQM0pwOWZqQ3hhY0d0OEpZdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906862),
('6E5KhbITE3Dm10EP840ghmqXWwerQDnVjjPPy5Bn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmdxVHZvbFZJZDI2QVFibXNWRjhyTnBaeVptbjJyRDhPY3NpeThYWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910051),
('6g6NXAmsUgyDXlD8b3UCORIUdnw0mn0RzbcK5aCA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjQyT3dpeFg3UGY3Q21Mb0RDYjQxNFZuMUZWMHJiUDE0d095NXpkYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909420),
('6HGauRbJulRufzMaRR4g84PZaFxj1RB6DdIXjtCs', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0 (Edition Yx GX TR 2)', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiempVcmxZYzNmbWdEcXNZUFBvRnJkNk42SGhvRGFIVmhCNE0zMUdCRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRheS9rYXltYXotdGFiYW5saS1iYW55by1wYXNwYXNpLW9kOUNrem5Uc3c3dUpuRVAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MjI6IlBIUERFQlVHQkFSX1NUQUNLX0RBVEEiO2E6MDp7fX0=', 1756169613),
('6iNxeCaah0rootkh7MnpJ7lttEiweNxI7iZRfJ0P', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHc3VHRjRWlwZDZiQk1OVlhYYmlLTnhsS2NvbGRPMWZCRXRORU0yaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168331),
('6U2RvUpEP5cMJq2vwteE6XNInWtP6FQ3dVDkQbst', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianhxMlgyT1hNOVRGcTAzckVXZjZVVDQ5WE5BeHpTSGxra1o2eDlCRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909306),
('6VvCBSgaUl7uClE6aqGo2HbDY6Z4289g99GkjsPl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVY2UlpXVzhyV21oNHZXalhxdVg4SnR3OXhjaUV4RVR5ME11NkJWWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898750),
('6vxPIX1vOQKu2uwT2HiJkW7JDhLJqOEs5YuzLki3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2R2VE5GckNZQkxzeVVMcUlKalZiRmRCUUMwWmYxc0I2QjMxMWZndyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166127),
('6zK0pxCnMdQvAYSyBqXYP013RCwG2BWAKMhbf86l', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUtBUXhxbGRyNGtIMEtGb3JEZ2RPVElGbW9KZWhCZXZaR0E1clhNbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899049),
('7mwlXQz9jIdDqXVXi14gd10lmmev55M1Ybso93hM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME41dDVtTFdWVWJla2RZSXJ2ZTY5MlFEdXZXNlh5V2NwTXNFMzZVVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906739),
('8GL6oAPNHptI0VzeMEexCBm0FwNszGG26tTS1H3b', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienRQWUJuSmNrT3VNcVp3T1Rra0U5U0RhSlZIa2FwT2sxejhWMTFaYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907799),
('8GnJFkeKDIBb4dOAmaRcCMYLC2grRmTa8d2ZwVpO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW93VjlFSkxCZVBLTENPY0tzYmxpNEg3RkN3UFRPU3pmdHJVT25oMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167307),
('8i1esoW08EHPcsZELfTd3IK4K8wrCNaUoil4Li4v', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUQwWlVlRTdWWldlZldENjlsMjJSOUtqVlo2T0hrc1A3MHFpdmw0dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165516),
('8kR0nsvdwpjl5QWCVf8GiBBO9wMjjG7li82BJEAP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFVHZ0hLdFhMQVA1MFU0eXA5VWhha1V2ZVNuYlFxSzAzTW1qdlJCeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168754),
('8kVW971frJrEKUT2QANarJXcuJwQ3GFGrleBBIqW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibU54aGw3eVFWZjYzcGR0RmNNdHZWaHhDcFRhd2l2RDBmeHJQcFhxTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907852),
('91MrQDdJ3H7NX1n3Mg1qKLdUZeOrYlfPkkDAWrO1', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclFyeWRwYk8zM0hyNWhjT09TQTZqb1NudGFnZlFzdW45YVJFWVpqYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166501),
('95NvXGXPw2JI8qoZGLpUROsrNyL3tpZ7HrpWFa7A', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWhlNWNJMG9ORmZSdkN3YU42WUdFejlhdXBYM0xCM1dSejkzNFd2UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168379),
('9fJJh0yqfSCjh5Iuu7UcmgOX6WeAD6efVsWGoSg0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNExLQlYyRGhYUW1GSnNEWVU2MUxJdk9FTUJXbTNmd0MxQzE3c25wbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163408),
('9GvM3GEFqFAMZjhzc1aKqrOqMYrfLV76crvZvWIG', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkdWeW5YNjhSQm90bFMxbWJrUndXd1I5RHo1d2NmZTFTZVprTTZweiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901378),
('9pyTlM9TC9yduKoduRq4894AMvh9kAlc1pe3OPkW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRG90RXRBZDR4QzJrOG5EYno4M3NHMHlRZERoZzlkQ1ZhZFhxUlAxVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908528),
('a12mGFcGME4t3tFVLY58jRbj8pfQAaySL0UBHM6j', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDFHVm5xSkVxVFNDQUV5S1dEYm5NbEQwMWhDOWxwRUd4YkdBR0puQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901363),
('A8FQDAnM09jmgmtYTVmZcF7tvLikRP5HeP5TDifq', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1l4d3VYdHR2YTQ5Z3MzelFRM3ZiWkM1RjZTeW9yeGJXSjNic0dtNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166132),
('ALc9jNR5m2F23n6xx0SeDA9zn3Rr9KpOp7XcAepg', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWp5ajNqMk83eGRUc1VOcXQyV0hJVzJQVjZ0cGlyMTlyaXppOW5EeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164202),
('anHjFl1N21wdju9eLiKeD5LQsMe51pucKlYtnXxn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDhvY3pTS2NPYk01eWVQYnptYW5oMFAwc2NRSFlUbEQyOVk2ckFtVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167480),
('ANHp6UN0vmhLgx7WWiHTex1mMCMgPv6QORXyTXLx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0lKdG1TazJyTGJ4VnZHeTR0U1pLcFczekJHUnZxUGZmNHp6U014WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910020),
('atIl0aOkWWFUXUtg9EKoqoVPIqLa0uyviXtAp9JP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2wySndFeEJ3Q09zQVBBWTJjSTNRVGtwV2NiRGk3eG9LNXIzZVNwTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907881),
('b1Bd5ClFuw1p8mVDPf1GRwHCEFev6j4rx9Zj0qEW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1FRa1hoMmtkS0kxTVRnQmNjOHliRTMwRWZwcnlLVWhtMm80TGwzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165241),
('baxbC2sCPajzO0Gzuujh3QdVcjKsvgZkHmHtW3Wq', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek5NNVo3djRQZ1FMaFNmd3ZsckJlTURQbE5aZ3pRb2s4QlBMQ05CeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167423),
('bclTuaIEBUVp14l0rCdtMlxLOeyJF2n6Hb741BRl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2d1QmpaUE1kS0xCNFFid09TQ3A5eUZSVzdUVG5tQ3BoaEt6SktSWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166492),
('belTSgsXWHB1HtWo1CUMn5qOc1zpydA7t2xXa0ON', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjMxdzFSbUd0U1NEbjJlaVhyY0d6ZUI5RHp2WXdSOGdTZExGRDdSWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898837),
('BIGrxqclzN3hmCJ2T8rcMh8lG5eoqCzCysbOTCel', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2lIZjI3TW02VTNiSVBzSjVTWVdXMG5WV1RLejhDOEUzaHFTWkpRRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166137),
('BLDBUCe2wInkjiYgAQMyVuuOOmBDv2Wa2DiWStqm', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHFPNnhkY3BRSGEzV1lqWHhremp6YUNXTzhteDhkaTRTZlJuMGVKTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168172),
('bLmhhuHYrgc3mLuKIW6bgai8o6SKJ3XWkTEcaSWQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzRHVmJ6QWp4cXc4SUF5enBHOTk0aUVEbTJ2OG9pY08xcjdhSmozNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899033),
('BRxXzet4T8WQs5tQ4Z98lwUVRipDuEGphR0Bhbs3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekhieDdsRlMxbU9yQk9XOEMzSmIxMnNDdUx3VnJablZPVDZrUTNISyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169406),
('BzTwVSZsBpH8VvCYWeB7TovmwbahESZQmRza8ga8', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT01XV2k2MlVQRDRJSEtrNEgxVGxCWUFpOFJkT2hOQ1ViTHozekhKVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909431),
('BZWD1E4Jvf45g6ffXZ6lNZz64dHmvWn8loIthcw9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHVRZk5nakJndk8yaExXMGxtZWc0NFFrWmFFdTd3aUtWcHRvVHltNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906868),
('c2GVq2JoQ4Kv1xANQWA8Qnp3WW3fltniQkcCTaX8', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmJzanZqbDA2MGRSQUhLRDIxTXhrTTIwUUdFckF3OHRtZ0tXY045TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899865),
('c3TWyCBaRvAICZvlV7o7hWvmCoXTmG1ea2wIwlhA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3M4cEU2d0VKZG5IMDdpNWJlcmVhWnA5MFJpd2VnM3BDUWgxdDd0QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901939),
('c7Pv3phzoZyP7uMv4viDagmK8vq02Cu5hxAjtW2S', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWtldVVTaFRMakFzRHVtWTF6bXM3eFhVdWxjYkw1MmhwTFc4VGxSRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906726),
('ccdA4DFe2JgkDzaGukfnxucsa0BwBWOcHF8N5QZn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkE1cFhBVTdlQktYdUg1SjZQSWFHM2RtZ2pBSDNVTTJMUmZuY2xDbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910008),
('cDu9Ar6bNRI9XeXFkrrrNyyytkvZKCCtcXOTu4Nx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVN4VjZPTEExSjh2ZGRGWVByVmFwTFpBSGdIS3k0dnFyRGtuTW9jSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899128),
('CKQfbBL07uMbjPCk9ADkULkg5CROGJcwRn7QYVB5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVYyUHMwVlhmTVFQcmFRQVpsUjdmWXNEZTBuQjZmYmd4NVpyOEg4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907938),
('CL0IYzwbSGToyLygbBuxzFgxFmBESZTZN1Q07vkh', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFYwbEIya01WazlUUFVEMkd3djZHSTdDSHBnakprTXdhbjd4QkZwUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898755),
('ctoOeotDkm3iCJ9ludrIxpJl2iWQBgpiTqkd6GoO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2lWclE0QmVuSVFPQnZLWmVZbGtsOG5oZHpTQnVlNGVXRTVzc1plYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898773),
('cwLMtNa8X2sg2fZKoeieRfquSRIY3D9BbHQ0T290', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkdyRmhiWnp0Wmx0cDhuQWtFbllRR05wWlpNSDI4WVZiS0lraXNPaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166026),
('d66AlhLAEcDyM1J9bvLzTFLz8TeY7Q7GAttACo8h', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiang0UGQyOVNrMzhDeFlyQ045ODJkZHM3dmVDMW1TOVRFcGF3YjR2SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908825),
('dIRqYI4ez6xi0yXX6llr3kegDt1cGqWZfu9X7eFP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVQyU1RGbjZBeUpXNTN0RWFyNVBzakg1NWF4cmhrVG9HWXB1cHFYVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168989),
('DLWAjnU19h3rIXYYn7GLc1r00u5MEhdMHZcXwFFw', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3ZkUzRBZkplS1I0T3gyS3RmR09TRjhjS2dmdGx5NEdKSDFSZnl2MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907998),
('dRcuOMQVz8qzYoSjuTv9bXcx6kEdix7Bu3K46sME', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGNQeEFXeWxuSWx3Mmc0bVptbGEyV0laWHJSWUdhYmpiRFlUNTRlUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165971),
('E46oqL8YxwFtnqKV82zLsXXG59LNajfOn3Ud08d2', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEN1cmRtSFVTc0lDTjN0eGhjMkhGeGN2Q1RZamhuS3ZLemlvYkpMUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169438),
('eAgdsaDE1AGeydwqYKlj8hPOYEwAKqNiYENBxVBx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGJKRzg1eHFYTjRmemZqRjJjTElsU0Z3NmJaMk8wMk5haHg0OGxORCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169546),
('ealXjDqVhtgwoNUjToS625LsmZZIDFAAVeOZFwxg', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkpsbWZEUUdCQkcybEtrb1lOZXJpYjdnU2M1NnNxMlpnSXlXMVZreiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168726),
('edi8ELx1Tp3OzCni6Fcjvj3M5Y6boxW0pjd6SPxu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2lqMXlxdHZteGxpY25leDh1NmNKYkFTWGRtcTY3NGUzVVBad2IxSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899141),
('EgA8C8plL83OHmsI7HQEVCrjRtswuF4iOs2KUWP6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3pWeGRUU09QYXcwS2NkWDg1T0pXemlCVTRFRGF0OWJVOXlZSWpQbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898979),
('EJDG794Q7FwRlesY5VX4Dp4Bk2W9R1BYRexw72yH', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZDeE5CWVZXZHd6TWgxTXJhbnhzM0VDSTBKNnhqU1JGeXJLcFJXMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165488),
('Ek4m0KMfvBOPhGCuqP7JbObuqTqNrPSK7mWwVJ9M', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGZCNlVEQ2h1cDMxNjhTZmhOaVpIRFFWS2xNNU9nYXRyZjc3ZlR5ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165268),
('ELUSX2V8xtccsI3gyl4Nk4yj4WuN6BfMDhNcbtvE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUlycXJmbHk0Q2x0S3RQbGhvbjZoQlB2aDY0MjdBQjl1NzVtaG5VZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166563),
('EqShvpOnCcCDXxD4R9Zbhc42C4ieihgsjerC89Ex', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1k2UVd5MUNsejZabTR3WVZrNEt4RTdJRGRrS01rZlhCVkNGSWt1diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168609),
('EsDH1QDlEdWpmV6b34trDYeVIuId9ZQRsxYovs3u', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHdaWHpIcGtjU28zTUloNnBPTHhpU1FNMWRYUEZvMVZSd3VEZ090SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910460),
('Et8jdrUWcylIGHyI1wKbHNc4PJPye69J4HgLgjZD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUNrMkJCZ0NyTkh0UG1wTG1PQXZpWFR1M0hjUENaV3RraThSVXBGYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907036),
('f5Z9E4jt5deBktTnWnrvwlhCLOyglZbBQnn1f4EU', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNm5hQ2k4YWk0RkE5dW1rVjF0Y2VEcTdrTmY5Z3VDZU5ZcWo1TjVYUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909915),
('FcPs5QTHAsoU4SORAxAnw9nEdezOfkny50osEipK', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickdlZjNSMjJ0dkpHZ09IT0c0bGJNNXhPSzZXdHYxeDlhckZkb2drdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909396),
('FFq50f6Ko83ICSKQK0XGjApbDIoCvQZZQknoV9aQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkxrVVNWblJCSFpNck5NMnBlcExBa3FocmNMWWJHN3k5ZHNMUG5PaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166081),
('FGWzC9JueS3xEO4OcDe9qT8HRxY2pRqhaDilshl6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieG5RNFNORlhMSEljcGlhRlpFckhsMEJxS0RjdFp4MmIya2lNanY3YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163430),
('FiUXJkzzgXkINsmv7g51CB0b4DVkJyR3XSI7zjtV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE44WkY4YlNyZU9aejV0YU0wUjg4em9VWHk2ZndzemZNWFFlTDNvbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910451),
('fji3BqYF9V2rVXR5jeSKMTFzpsL7f8idVsTv2man', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWpQekNnRU01d09yaFlvcW5xMWJEM3I4cHpObHZDaGtaY0tzRGduYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165254),
('Fk1QBMQGTyxzrDSMYdkKhccPoSp79cy6nE3woBxI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2VjSHQ1RDhCYkVRMkFYbXl6WEZGbUhZWkhhSGZDd2tvaVhJdGFGYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899520),
('FQjZyOoT6cNv0e0VO6nzh0PbyBx3hJJagdVzTfR4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkV3cjVCRDFkYlplTzE1WUNOaFJ3TmdjdDJWSnU4b2hoZEVvcE02MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165148),
('G1fqxrshYcfVvUMECPt761QsAWNAEMsgnYRzBUkn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXpURllNaDJYUFd4SVhueU1YQVJMWndrcmFkWnk2dWVvZTA3VUs2VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164051),
('g4slk0wCQMlP4kNKJEZJrAemij50ENgZm3e758YO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTVSTEUwRWM0QUp5V1pCQ0I0VzlxT0lndnJCVVV2bFI5U3JzQ1FIViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166096),
('g63BvsbWpJdRkKY7dDjUZTWSYHl8agKXg4y6gz21', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHJCN2w4akVKTXJJSkw0MWN0TDhRUk90WFAzMXhWZTlTTEdKa0RiSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901858),
('g7YkNqvgAtoFhw0L2AxsONTH3ldx8IuhMq2Ba8ZX', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGxZSzA5Ynk3V0ZzVWNIa3p3dUtacUdrbDd1dlZhbDlDMVBEZ2pWRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165647),
('G8Bb4WHCKV16CMxRDtYjVHZkn0BgMsdL2XNSlZNT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1dYNTE2VXVYQnh2YVAyWW9NRmcxdU5QdjRDbEprdUh2bnpnSWQwViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906941),
('GbOs2yWqdqQXlyoGBsivIsHPkvO36KUndGShwIXC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmhvMzlibExTZ1Zma1JhazZuMUZEblB0WDhtTXhvVlVLc1RWM1IwcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166774),
('gEO8JWQLRpb43uZw47hNpwjxZb2dkr5B4VnDn5x0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmVMaTA5RXFMMGEzU25GeTNCTnZEdUdlTXIyS2hSekJRSGtzNUFYbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909663),
('ghatg3dGfq5TjqQg2GXYnkhPZ80qQDrFcglp4YJd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaklkN2d4NjZHMVc2WHpnNkJDb3JpWWVvRGFGWkdoQVExOE5qYkdrdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901309),
('GIWtDcqFkpKJS1L1rY6LToSnjoSVgZOb51OCZnwD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1p0bXF2NjR2TGtzN0dXSUFzQjRpdDlSckpRVFYzdG53aVh6VXcybyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168850),
('gIxynVpFgCDLeS0pERAm7Y2rpQyiDmeigtsGT0lA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG9FV1lMNkJpYnl5SGNMMWdhV0dqbXBWVGZkT3Z1YVdzZURvTVlGYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898781),
('gM8YFY25AaNMhh2rBXsOGzrirymbkYUQCfo11Du0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaE1UUVVoUkVtc3JHb2JzakFLc3lJNVpCMUFyd1I2RUJ0T09GZjdZSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909827),
('gO26NZ0gRhqf4WF0I1IiDrFCRdU49AL7oPLIP7I0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDhjdXh5OWhBcDRvMnNES3hMQ2xHWDBRQVBSN1FOV1kzVTJuY3JkSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166196),
('gpmIVRma0sp14YNu942HHK4w1GGdZhtsk7vUF7cd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmxxeXl3M2Jrb3l1TmJUQzYwaElZT2xUbTF3UWN1bXRLN3lscmZ0ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167265),
('gPtE5Lpc8ckCOtAuyTyKayS4UUtFr5Qen3T3rQ9W', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXhsSXByUDRuUXJFOXdJWXBVcWZJYmlJQ1JuV01iRXJHNHlNWmh3YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907392),
('GQxI8h7B1fsi0529uEf2mz7oTXGBsFWkpBu8yyBW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDZjYzRlY2RDTlpvOFg1N0dsQWk2S1lxWlFYbDVXWGd4RGFaUVJPQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906920),
('gvxG8qRyeRJVvXubeV67498QO6H738dluUzR5r9r', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnZLMXp1MUFiWEo5WHU3NHN2TjJoZlFmd0dqampUbHFNSXNsUzYzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909976),
('GWctOPJTsnaMq8gQEmYxkznG63TaIFlg2GoTV21B', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjJxNzVVTmVuVGppSE5Gc1NPOWFCSFY2VXhrZ1NNV21GZENjek5FRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899089),
('GXqAw1bTTOnV3T3QKcmyR3zHzTtrwpOw9oZs1PIi', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM21SUDBYTFFLdFlZcDJrU3JqV0paUnN1SVBZS0JUdHJoSmdvRnZhbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166475),
('GXT7lsSGG67V08NtYfUyYBOef6EVsLGCCQ8774WA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjUwZHU4MVg5YlNBY0JqeHhQbHVYZ2c3ZE16TWRjR3o4V3Rmb0YxcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164506),
('Gzvf3jUTNAQ2EPtGgPDX19FV5weAjB82nqgsOtai', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFNuOVVzZENDcVUxY2FsOFEyZ0hPQzV1NlNZaTVlSnFHeng4NGFDSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165475),
('H0zJzoY08RYD9TVh04qvkhYkmqRckliKCE5huTUY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTh3UmpiVWtMV3drVWhUV0RhWUl5V2lHc1pIQjE1UVk3UU5Na3NvVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899179),
('H6GHBvUF9hPvMq1mla0MZreeiauwhg6vRnFuchHG', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRm5NRXJ1R1N2MTk2QkVXTHMzaGtENHhQa2U4cUpXMVc3cnN5aGh2RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898770),
('Hat1AAipdHsFEfGDDtYTcyHPdNVo1PHj8o9qtcax', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDhMUm1WSkJ6YkhNeUhwRWdxNU10RkxpNnZKZFZtUVFlZUtkWlJHZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168877),
('hb4zvLbS9jT2cLAI4nxBnXg99MOsOwRkcVzX9YlV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWNVcGJWOW5Sdm4ydFBPQ3h4cXdLRXpQeGdYaGoweU0ybkhKMmcwTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907125),
('hD6fr1228o8zOXSX5tFggTMTBNJ275EKG4MtqCq3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzJ5dGNwYkhXOGlaRDk4TlFrUVgwWUtYSkl4NjRBdFI1M0JnYnZxQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165100),
('hIfu1z8vz0yPUqHvawYHgzb55Uabbq0P5su8CvSA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQllobks2eDE5d2dLR0lQVnhuOUdHQUZUOFIzNlNtNlYzMFVNOHhPRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908509),
('HJb2oBul35vyHm6Mm47yKoF0VbuEPOgyzU8wA2Ge', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzl5T2thQWQwS1pxUm1SS1VWY3FoYVh4djQ5UEtQTkVlTGtDU2d5NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165809),
('hQS7MPryYVlI3HmKFMIc0l6FgGj2gmLfbDOBrZzl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkNKa0dUSVBhTlZENGVubzBaaTVPS2pnUnNEMzRXVUNuWGkwMmo4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909361),
('huO5EvcjerKm2hzqlI7UNVnstT0Eg5GWVRPSZJcO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1gwVWRqTjE4b0Y0ajJueEdaZGZPOEhuS1dLWkR5UEpuMVBLdmVHZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909933),
('HvNpqM8i3KenxlHbJBW5ENN2lnU8s37EfoI4lzFy', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWU15Q2lmN3p5VGJiTTdjQnA1dkNjNmZKd3NNR3pFbXZhMWNmOUFoSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909444),
('I8Mp3j0c4Syrxuz1vPc0DCzec20vZlRco5f868nD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmY1MHZ5VEl5Z1FwNU1Bd3hpVkpEd2JVVE04Nkprd01zNWxqTW9sdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168449),
('i8TEheAl2pbPBirFyMrmj0xcZP3qN8BbT1jyD0JZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWdCazFWT0xVYmFQN0hzM0JBT1NiMUNwZUlWVXo0Vjl5U0tIeXdlTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164959),
('IAswCoNjsrGkolfnmsOZcLlX6OMOMaOxidbBVzav', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1lsMXg1UVc5T3RMT2RvM1RMUzNBZ3hnbWVDTERONHpDTGR5dkdaeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901943),
('Ijeeh59UBf5PskgEYW4frMWJf0yeGNG4m3oX5IqV', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3JOTjN0QUUwanFLTFdid0R0dTZadjdaOG5wV2ptRFVjdnNjVEtpRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909898),
('iLhe8WRuKKC2a1kw3y6d5iTLk6RuYdGYJDIUFUq2', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickpGUTdFY1lkTTk4RjR5d2JIR2poRDhGWEFFM2pPcUh0WndKcTl4QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907234),
('Im8cqqubmqh5JDFmDJI8Xzj6TzvvcHqD9kp5u9p6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2daMklKWXZMc3hEWDhYMVdyWVJPaDZJQUphcWZoN2xlT2xIN0M0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165504),
('iMXzmdR56ISEDFGERfoAdXkivS38cLVi5OyomucY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlpGeGpOVk9yNkRvUmxWVUF5SDhzd0w3QTQzYUplSWQyYkhveURkNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165642),
('in3bQDNSFBaBug7itumeuIM9RZK90Hragh8YMqEx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3hzNmFrdmROcE9BRkUyMERUMnowVjE3b0JDQkJVcFl6OU5KemNCQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908901),
('ioiVWuk63gehm9jDeDMWNHpEQm1ky5cf1fX2MUHB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlpQeDJURU5QMm9CV3pHekcweERVVFJhYmhRbTJlenJDUElQRXpuRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908377),
('iQpE8cbG3oe4LemtrEErstqNjUPrKfDXyzAA0tqj', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0VqeGp1aXBWVE1vYUd1WmI1ZmNtSGpNa0x5V3h6WENpTG5YTlo3NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901741),
('IrMeJhmvpzmxg312bliV10wLsfg513VkiM5LdS4G', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDVjTFpoZktJckZtRmMyMEVyeVEyZVl2bDNCcGkzRUFhSGd0dHltMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165108),
('it3ZnwRRXCzXMYSDYiPzftf0TiZtGM7P8zlUm9ek', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2gxR0FvdEdDenNYbldxWHZoS1NBUzkyVHJRMHUyZFpZUjRtVTNOaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165173),
('iTgQpr6PKKy7cPtPqmlxGZsnPq7YMyWBfuh2yyA6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia21uWjdyRE12QjE4WW9xNVJPZUk3cFp3QjBOZHB3R1lVMUsxZ1dFcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167399),
('IVrjy2JQZ76nE3AsGY5bjAeAWqHcNEItDofbOalm', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlliYklmTVFjQkZRYzRRR3EyOFczUDJaellRdEFEc0hESjVXNWpZTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169267),
('iXIerFuH7Yk4yWmAfh56SSmaqNN8o8iKVW4wzEjy', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0xLSmxHOWdFZEI0dWF3eXNGNjM4Ym9wekFCZDd6eDJ3NDlyMk1sdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899923),
('j8q6Sqk6VEmmYAr7eh93OZmNin1RrB0PMwBhcMFB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEk3UGNaYk10N2V4eWlPNjBRTm9zWlRab3prank3b3VYRU1PM211dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168479),
('J9JcJe97scY7solrLi6JP7vfrTNqXa44cIyluHjR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWRzYlNRUzdGTEJvOHhvNjFYVk9HSGJBcFB5UEtMWlVPTjBTVFdDZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900080),
('JbBC4q9isn8tfbGK2XF4YvfM5ZZcwsD6aIroEE3T', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUR2eFhzc3RqMWR2UDFpbExhMjFmQjVqMXREY1NOSEc0NGRlTDV3WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901793),
('jkvQKylELpYCt3FGGOojXHAmr6riNUp9AZxUGYg7', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk1pUVlYOUNtUmc2S2Z0RENqWTJ6SW1haW9wd1FKZDZSZUdsM3I5WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168218),
('JptJkXXAxcxpA6QFXqvuXGdZZxgwsm8gTiu78hyt', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1VZVkRxZVh1YVBUNThCZlJIY1Zhb0ZETVJCelByb2cxTmNaZWg0aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169469),
('JRggvLadAXqzDoiQchv60i7oEwPOSlSGWMzAVTUk', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmZZQ3EzeWh4N1o1V0l1QzAzaWtSUmRmVk5WQ1k0MklEMkdFUUh3biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169025),
('JshcV7SuTNC5uvT7op02KqgIBSq9Av5dbQkO5XUf', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVVLbWVkVm5UNGZwM2RVYUN1VkpsUklIQ0JINXg1bTBvRFh1bGRnQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901969),
('jX8PQ6gEzw4IhU5THFU8lxhr0PzwOHSEZXfXUKXr', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGNtc2pNbkNvQ3FIaDZIUlZqY0k1MVZmWkJiMHhvU0xPUkNIVFU3WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899037),
('JY5DU7ejZDYCYiOUiHIK6HD50FdGq5NfglCnrk1h', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlNDM0tZZDlZeDczcGZRYnJra1NCb0NRbXhhckdQeGFtc2cwZGpXMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907116),
('kgn8hwPJOT3zz6PB3rNtSzHqoiH5gL2kJtr5DScx', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzM0YTc0NUhoNjNMbmlLSXVCUThFUkZSRmpvUDU4aTU5THBPS1BVUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898883),
('kL0pvj2CXXaMsd9VCveCLO9vIHVtex0FVEfevSoZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjVub0NZZXFYUXJFZ2NBOE84VHZLaVR0RlBPU3A3cFNDejc1dm8wayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907925),
('l82muaQ8qvQFAq6RLpxktCgw2tf0XjdzhRgNGXxQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1pEOGxvU2dabGI5SG56ckNnb0dQcXdERXJJcGp3S3ZKUHd0dFJzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169543),
('lavt21YfxeBaWVMk3hfPu9N0n8UXPKDgkqFvu9H6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEhSaVp0VlVsTzNJWEVLZERSSFhDTlRtRmlFYWFhRWlQbFYyVU5DViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907142),
('lBiayDf4MIXB5aZOt5DFZ4VOGHuiUdi8L8kU6EYG', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTBleDY5cmlzTlpqenp0aFdNTkNuOXl5cU1TWFNGd1JzZ01ZUXdvQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166617),
('Ld5ijwTFeHshz5CBYHk1WvtUX4zg4eO5oivt2idA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUk1Ja0pYdWxrQWFkZjVsOHZ6RDRNMFNRS2NIMEEwcWdDVDdSelRBVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165651),
('lFqb0WH3q8F698VFdI8qcgUGU2aVFE38ztMmSvY8', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVM0amJUM2w2YWJHb0xrdG9pUkJNak1NdmZZZVVwN0s4cmFpakhaUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166150),
('LIa2WnVhx4CA0Uepk8WmUYYxdNLaQ0ww0kEUnbgC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUc5cjltYmlBaVZidm5FWDlQdllid3R0S2FBaHpoRXBMc2VQMFRGcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898846),
('lIQDtUNij4k3QH347wzADh6aIjGt5vB4g7eXEJ3q', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzA0Y2pKWlZUbkJrR3FSeEdKbE43YkVSdU5ha1M4UGc1bmE2U2tXQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899938),
('Lkht5I94b8T4CLReH7yBqJaJ2eoR6WdIexdKpvm0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm1VMzM2NnUzUlBYRzVLM1k5dWpGWVVieDR5QVhNT3NVUHloSnJKMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901927),
('lNaeBA6UwHN5dy12h27Qmv0uIDh3YJms5hPezcoL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGZTQ2N1TmhOS2kxMWNnQkNJUTJZZ2FrWHVjSzVlZWRGNTNUYldyZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907089),
('LqNQy0SpJmVWWwRCd8yujK9p54GmeIdvhGiXTZ9c', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXEyVkc3ZFMxbTJEU3hzSmdhQWFKajNCTW1zT1BPMTVvU2VROENYTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908693),
('LUGJp4lVutbJGYTfKwqSQBAHDdLvJA0Hzc9K9kt5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjl5NGhKVWhyYUg1ZHF2WFJIajhUUFJBNVZJMkNvREZtVGl1VmtaUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165959),
('MaYsGjI2tBpXZ6rPmcksZcfYbseTAdehWGRHFqHE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3pXWjQ5bVdwREM0WUhPVk1YUzRaQ1FzTUtkQXBCV1M5dXAyaVo4QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898764),
('ME0CPU5KyyXoqSFDnmHuWgii35W2RKUoHXyIw1ER', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlp1dGxHTUVxQ3NQRG0xTXdyVThPeE5rT2JSMGthZEd2T2xJZEczeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898897),
('Mes6D02YGAciCicnLEEb7MdKHq73XlW6uPE9GWOz', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1QxR1ROenhvcTIzbThiOWVFcGk4VWZRTDF3QTJJUG9sUGx1SHZORCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165983),
('mICWM5MYd8LPcXMQaSJa3r4jHJ0kzJrDTKRdXSNW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmM1WU1aWUhyaTcyaVRqYnZNUkFpbzI5eXlOU0pKTjNDdlVlWEEzSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169245),
('MJ9dgMTA0HYxq1N5GRWjm3GExTQ9MSUOwDNXC0M9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW44MHRudmdHZEo0eTZEYUhTTFJHeVNUaTViOUdXTmQ5NnE4bTk4cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168587),
('mPDnhxuFtE3azM4aeQN9g6aPUBYELf87sX2mos9u', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibExSNENxM1FLcnQ3YXdiODVkaXNxNnZrOGNEQWtsVEh5d2FMUmRqOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166226),
('MQpQkgJvbWVELPkVAzahCDw2d4Ootca383LTDxMh', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkZvanJQaFVDWW9LYzRSZFZXeWNwV283dWZLMnhBem1FVEh3WThKdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906887),
('mrUEyRreqwF6p07HAfKfrLdRM0Q1wEsrWeDrWJSY', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVhkUVk1NzB4d1Z4cTBGcVVKeHVsa0h3TFo5Nnp2amNoblNvRlh1NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907711);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MT37OjlEcGIto8Y28kEv6k1lfS8npWedcvDggyqR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnRMQnd1RXdFOWhEc1M2YThEWmhQOG40bzIzc0YxYWhPamdOYzNtWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899187),
('MuA2Z6Z45nIoPxFuSJZ2SI27i3hh3ZT3PMS9hOG4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTNxVUNkb3VqckRCczdnN2FXeHFNTDdDeUI0eThWY2lnakt2cENZSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169573),
('N49knKBLToPoAoCsCa1T8eqJfO8qSgc67OtnjQDc', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEc1dUc4OW5MOWh1Z2lWeHp1TUp1cEFQM0tUSnRIVU1wUHhoUlRFYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899019),
('NiHIsQiB38AGuXCejmOZGTUuaWhJxCrajjwrSOfJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzBMT1ZZRW5meE10bzcySjBtbDhKaTM5SFlsa2FCSktWc2h2M054WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901896),
('NOfURLSMw0wHAombfsksoXG7E10jut5evrJC2W6I', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVU5TaVNTSTRZSjZaem5hWm1TTGlXeml0bTJwU1JCWXhxaTRTdlZBUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901737),
('nrG72uo3RRDTV8FTpnJRx3YgqdNSGPWwIe9WQPQR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEFMSk5YS3BNN2JyTDQ3enhsVlFxR215WXZsWlo1RUg1ZUh4OEM5TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909997),
('nS5QzKgeKOQX1OSKh5lic3XKBhnYsUhNDk53w4es', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibURUdnA3V1VTOHlDb0dRR3dPOHlUNE1vMnhuYnRZMGl1WTNpMjBMUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165180),
('nTVxGpmolEgHhM0rexehGS9JXKaUMw6yVdM1f5s5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjF1ZHBrNnRUdmJpVDZXZ1o5bkdFUG9KclF1bWplNkFUemlKcm1rbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169428),
('nuCMrbGHF7GwZbcvrexVUucGt6ikFLaN9xxe1cfZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGZGaFdtVnpkbVZsbGJSWnZjWVBCNXR5bG9qVFVxbG9RNWJ4RXB3NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169164),
('nvlVCbPIjekp8lcdS9VOKSy3WG8AuN5C5bk8u0V0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYm9oNEZ3VGpPYks2cmJTQnF1Q3dZdm5ZbEhzeUhmR0JpMU5XUTEybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166084),
('O3dsCrTFXp7CpwgzLRJPE80nyKhmRpvSxJglq9VG', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDdjbENkclVId25GQ0V4anpzMVJHcDdsZUpxV2tVcUJEM3pSdnN1VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163415),
('o7oNNjmyhYUHTgYWB1nfKr711f1eGjjFvGZxUA3C', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1FmbUpaMDNZbTlzSmlTWFJLUVM1M1hRMXNyWnhtTFRuOGJsTGZCSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755948117),
('OBInrKe9kKpqCmV6hswXlT62ovBY3HKXzeAoZDVu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk9QWGZRZ0JOMFV4bWxRTndtTzhWdzZFZjJXNlRRNXJXVkRBMG1jYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168250),
('oDPAsz2ZpfL52d3jTXYgeBWM0vFVsm6R6IKp7XvU', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTNiWHFqRldWSkd1aHczaml4anllaWVxMGxpNmdIOGZrWVdFbkxJTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168693),
('oe57DTdAZitwO6Yo1ngPPxAHp7u7PuBvCpFYQf5r', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFVOaHJUUjhySERENFpHbFpNbFpGWGUydlVGNzBwUzJ6ajBvQnJabyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907692),
('OEchJEYcuMZNc2TNYkki1ZeGHUo6H7agpvwnQEs1', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2hBVm44VWpQbE1kelFjemVqSkRrSHVlZHFMdmhxc0Y5WFI3SHExMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910475),
('ofd013be2NTGF7VeLIeU1G2TAy9DuoeVLGrph8QN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMExjeWxXakRHaGttN0RWY2xCNUN5aWpjMFQ0ZVNVQW5yZmM2bzBaNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164895),
('OgAHYVIFb8UKg4CcN9LS5UPhiY9Y59V4xs771vOE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnJJQXVselRrRWZ5Y0dNUTJCcU9LMGd1Z3hhRndROEp6OFdPY3FHdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168901),
('OHuQjCVGHw97SRjqFByWJY0a80on9Vs1SKuLX6Z6', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWthdHVGTjdaMHp6STRsN0pYMHJON3YzdjhzY2haNzlleldHa3FxeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166124),
('Om8Z4KRv6a3UakdM4ygsA0Ynwlo8SdsSRsaokrmB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVZtVUFUOVdFRnJPMjhwVTBHYVZJWHh0ZEFRa0dLTWdodTltQVV5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908892),
('opaH9KCLydvsy5yuNco0x6h8h5n9bEvOfEJoPAWZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1Z2ZTRUUWJVZUFuZVpJNGpUNDJXWmhEcTlBTzVQQ3FGN212MVoyVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910440),
('OtnmalQ0F1DQmpaYZMb3asFoFAIzdhJaaJDzSpLQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDA0MllLdGtHZWluaHpJcjFURWJwdGc1cDlPTExVSXVyb2lZYk1OVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898886),
('ov29XrA6yWEJKOz2JMC5mLlDVFsEBIlYtL4F4KRN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE9YSTBxamxPY2xSaVlJWm1zaUZZVER5WjFOMzJLdW5Hak9IenBHQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169255),
('oYAVuqSN9nENgPJQ2nn3PcYHEGcynb2JyvuoMmco', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieW1tR0xEVDZ2cldqcE9reGprSU5rM0lHdnZTQkxiTWcwYzdOQzdjZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898911),
('oz2MTXSUVrCVgSPkzdXzIWPcXF7AUzR06KQRHjqc', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWpzTkVTYXpmaG41elB1VVNHVElPQjlWUGZPdWhSQ053QThwNnJOTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165041),
('p3qhejDf5lRVAjE7JpkWwIq2TKM4wsiEFqiRVdCb', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2l0MzdpVzlEYmU5TWNmclcwdHI2VWpwcXlaMVRGb0lSRnJVVjlDcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165035),
('p7gxeJAFo4cFu2Mdr6dfA64mMgP1KJYOkS8xozrI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVW5TckFnQTQ2OGdtSEphcWNsM25IeDU5anZqV3hDOXFUN2dvV3VLMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168435),
('PAqNirmY0n6C6wOTVr0ZJWeNEliG7krfvn8oJPIk', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2FTRkZtVEk2NkdYWjNYMTN3WmhHRDY0cEhFMTlqWHVGVXFBVFNsRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163406),
('pB4VQojpHOhpPpgcevSJJFakgKEIb4bz6hqBhoOF', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXJhZU1Ya3BRSU1HZWpxT1EwRTFSQ0ZQMXlDOTI4cm5qOEFOOXByMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166007),
('pidBRFYcZzUuC6YbNTMeYUEDyMz9OyDOpMFbnziL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzRONmc3SUVlYUxvSGpLdWhhUUhzejRKZlU5Z25QdndDRjRVMnp5diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901733),
('pOvXt8K9yw4cEtEaIwNQ7MF1HPRpDC0tTebG54Y3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieElYRzNRY2p1RnhaUlBRVEt5SWN2dU8xVjlDekt0WnlpTk1PbjBSWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168685),
('ptA18nHawE2Ma3hKLQkbI5DYG7IrV5zLSZB1oJG5', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkdWMHZ5cHowMDVJWmtSeGlYZEw3aWMxdTNmZWhxelVvbmdMd2xKWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165976),
('PUFXw7pHVpy6j62AlIFePPA83Vki9fmPQcVMTAcd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHVZWjVEcmQ0b0VsbmRubHNYQkI5Yjh1VTV1bHNDS01BYlFCYVVNYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900526),
('pViQVnbGrb1ssUqyCIKVsk5hQTSSp5yDI5yz0EOo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFtczgxMGVoaHpnTFduT1hwSFY4eG1yazBYSGZONTdidUM4TDhyNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899026),
('PXE6126AZDAQmaArVQkLWMeASAdXMn1EvbeJ85bu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMElrcnltd0tkMGJCZXVoUDVFZTkxclFQVU1PWXltc3JCeDc2SzU3NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166676),
('q53pvPYh3BQOeFQxI3Urv2DaNP4ZpJKdLOTx2NaL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidW1zcUFEOHN4dzdQdjVTUjRhRnoxc1ZzSlVwN3RyUkgwaTdXZlgwRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910422),
('qbARdAjJjoxflYfbVaGaOe9tqq0jn6w1GmHq2VPd', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFVZRHhYa1NuTlcxb3I1bVJNZXlZOHlXcnF6Wlcyczg5TGNkOXlaWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168195),
('qBxI5AlfqMIUEemHcAvjkREOJvOl1hbc97JBdUkw', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXRTWnlUY0NnQnRCQXc4ZkMyZXROUGtmVmNrTjQ5YnI0TjY4MDZ0dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165248),
('QCDYSfOaqxHgrA20g823TtZD125dDgkVQj4BZ4DL', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczFsWUhvNVAxNFpCWUFuQkVZQlBueTdxaHoyanBKZEZDTG9oekt2UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907913),
('QDeyXM3rsDJwybBRVFGntL8RBqXPhFcQAxBkoITr', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiempuUk1iaDVCWU5kTGk2bDRlR3JiVnFKaUJscFF2c2hJb0pQNWZTTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899911),
('qHYfi663DsxRmvOvihwl35BNAWtDKHKfac36MnS4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWU1HczhNUzN0Nk5YU1FjQzRyTnJHYldxMGZrWDE3WUI3SUQ0ekEyWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169597),
('QHYlbfXxHd11bWEtO0TiMBt7eAnpuT2S0Dr5vB3b', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWpFMG1Tb2JTR1Y0bXJBNXh4THVXYnFSTHZ5Y0hoTVJNM2dJVTRlZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168285),
('qjLzwQnvKdmQKSohJoNVUV2KtBnNLGDWFIs2yrw4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnUyUGp2aEFJNnRZZVJrMlRIR2ZtTmREVlFmZ0ZkRGFGUTFEaVdLMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898844),
('qkSj0REmPwRZU136YEtWtI3Qavw56kjhoKIW0pXQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1VTSUhPdGFnczQxVHE5Y0pnYUQ0c2hvcG5NdGxaRmZaNmdLbU04MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166099),
('qKVsaRRx6RJZToMjuF3Ecl7FitZPTeEuCbQBfJcQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTlBZFBudG1uRE5QOEk1c3NQZ1pQaE9DTkpSUjdOUUowSWNyUWRoQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899730),
('QlWptJINi3iixF2BntpPaLfykgq8coRx9PowlpMD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamdIWmtMbVNCQ1lJNmg4NEFya1ZkRllzTmpGVXBFS1FwbXZkUkxYVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910334),
('Qs6fbyW5rnqCkaP6AkDvKWkNf7rrJj4D6cBdJnnR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamVFTUdSdXNLSEhGQnJEelppRzRMS2d5Q3VBSXVxcXRRZFViSHQzbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907591),
('qz0r1OOM9ZzcrAO9oI78SuDXloO9QCxVEpD0iD0s', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzFOR0hMSExZajZlaHNNZU1XQTNSWEtzQmlEWUN2RW85QkFiV2FvMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907217),
('QzwlEUFfYVVVJEO51bWBg1OAJrkgEEmkRVyzw32f', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1dVc1lHVkFkV2VJTzRBQ2ZpQ2NhVTdUaTZWelZCSTFNbzdkRTRtZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165045),
('rCsKwfIG8gs2dNA2pSv9KhQdb6QFiHMJC9PjNRKf', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHNuQndpZVR1a0h4ZXk2Vll4bUVPUWdSQURUUmVxRmhFRlJKcU83dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909493),
('RfSwjOflfzVZuyLuJ2rncKrz4JM534UyqmOW1vEa', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWluU0pRRlVSYUkzeDRHakZhQTk5SGR0YVdGbDd6dEFaaXhHNHdtNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168459),
('Rg11S8D4BD9hk8Ff7k8X2AX9UVLTQwKGUs5voBcB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGNqd01iMmRYbFRQYjhqcjBMU3c1Q05vTmdtaEpESGYwcVIwdTc1RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169559),
('rHi9JYH4qKgHorplUIkbk2MnVn2Pv7GvOBuTpLOE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVNHT1JQUjM2MTJUd0NRTVVaWGRKOTkzdGJoSTAyWFJxbERWTERycyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168391),
('RiHO0kjZ5Kj4gJ416H487OXdTq4vip0zctwIo1Ru', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjg4ZnlQcjRsdVZLR1FqNlM3NU4zaVVtblVzcTd3OTFLNHpDeHlhZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164182),
('rL0TL5K1YJ7f8rj3cyK7ppujVkPLYuNEtXP14HUu', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDZscmpHOGRmWVdGU0E3c25ZQ1dDSGpjMUJvY1ZlNWlXTW9qYk9zSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899147),
('rll9N1I4u9TT8wcl68TohiQhrT13c8vO9SoNJSje', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnBXbFNSM1V2Zm93b3lYYWxmeVhyTWNCN2dMV0VGbjJocG4xdXA0MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166051),
('RMho9X73B2MsFRx0nxt2K4191cSjpwnaw27hAuN0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHNjWnFTRzFmRkpXOE5RSDVPeTVhUHV1MUFyT0JtZ0xnVFFWUFpwRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900517),
('RnfzpyDmt4QXk7jHKOOvCwuQmASbM4BlgmHGLFiW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTZuekN1Z094ZmVFT0c2TVFqVW5zVUYycXJzZ0hJcjB3Z0tMVHhEQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907681),
('ryHXSz3nK4rVdasixq2UdduaOFPpbCLK6gKCIxTK', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0lheXZFYUdQQm0zUExRRUxJVlJKMFYzbmQ2ZnFjekdndWxtTmxTTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164250),
('s4fdL8eLaiEgPQviNz7XZAzFjQOA9GE41EezEH0I', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMktOelh0MWhlZTNKN3duanh6UGE2dFdlSHJiS1g4WGdoWTVFbXoxViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907623),
('sA1wuGvsenqPi2hl2DbxmNAwxASq4378NZcn0jR3', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiek1HRG5GZXFnaTFFUkhLNVEwWW94a2xjNVJDbmQxN3lvTXBDN25YVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163497),
('sALhrVW0ZOWGrhK3QVcL3rBxLOhy89gF902mBPOP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3E1U05BWDU4dUl3MmFZdWp0WXdZVkdhTkVBS2RKS3N1Z0h6Q1ZCSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755906938),
('sAOcMRBNbkLKcVs0qKOeglCiIVNLHgXIAyeKTNsM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0JBeHdEQlM0ckJpclVHZ3lPYko5MTlaU2hvdm5SaERid0tCZnhVcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898869),
('sExbsihglHSxxPAHLVjuW5H8ZKuhPnpWkFXqaKJD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVY0dHF1RVc1TGVPVTUyZFdhVVVqMmVpZzhqV1lQUzRUS0JQVHFJRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900787),
('sn5omHvJ9sBGlr2AhR8FzXS3tFm3gus1bodaJ55w', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlNCaEpOZWhXSExJN0JkTFdrZ1p5blVHV3dWelBjcEI1UGUySFFhcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169593),
('SooCigeAFYVkyispLSzfIHOaiL0A6vpCplb7ivqO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT09Ka1h0Sm9taFowRXRhR0hUNW9TRHh3WEdGRWtocW5pVjNmREhXRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164209),
('sUgkeNE1QFBiLoNTwhNKMysvcr0sZhuyGIi60qAn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNE9GZjA3ZEdRcXdFYUtUZnh6dTJha2k1ZjBVUVRiMHBGVTFEcWVGUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165104),
('szetubSrQYNqDx2yXMONwqlZ9t8gSGg4LGcLOH4w', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDZUNDFDN0VHUVZ2bmk4RUwyM1JDT1IwS01obG9CbVpqdEVFR293RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907048),
('T5KIBjhECS6CBVFvOAPP7Z0LI0a1zMy2OKwGvLLk', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnFvZEk2eUtsUm5Edm9EYXc0ZWtPb2NYcDBHeTU5YVNnTlA0MmlEZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169442),
('t7SRZBzgqKXXHUEkGwNYcLq9r8W6dW7N7z7jPOY9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjdpcmVaYkNVWjBhVUZRNWxCUG42VnFldmNkaXZBR2hxUm9tVkI1QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909747),
('T8iJvgkybvA2ob31HRX8HAYLcjQtlUEH4oMaq8PQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0RKVlBzT2lYQ0JVN1hDbDlMMEo4dW5TM3B1bDN1SkJDNUNRaFBMbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165469),
('TCqvRz75zuc7qMUPVPdvxVTIM23FFPS0H3qbMNNo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGhLUmsydmpVQnY4T2pReXRBbG9tRW83Nnk0NDMxS2ZiNEJEQzZKMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166110),
('Tdl9PrA1Kpd0ctgurx6Kbb9lM3IgCgP4wkeVbAPT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3hRRTRLMDNqWkdOYmN5a0Z1elNlRk9JdnZ4OWxtSzVwamlVU1NNcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899213),
('tdlfffhL7IAdW7zbMAcBYNlFguiHgFnGIec3hawM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTlXMEkyRjBnR2JiS1RsMUxNOUpVUUF2U2J4b2pXQUxoQ2NWRHpkdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755901312),
('tf9r9ZsE7eSDehyq8XBcAJ3q7RMwO7z9v5lC47wI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUFkQVZNSG00UnNpaFlOQ0JjQlJ1OHA5eUhDQkd1eVRzekRZeDhMeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899905),
('tGt43jArbyOtkJk0SXbQs7rK3BZoyIGxQ8IvFwIj', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVlmWUhqSnVaUlpHV0psTUs5WXY4RUxMTnhKZm9KZ1VnNXM5MGdzeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909510),
('th7u0vCM3DZRyBJmwvS1F8Zuxe0ogivy5qwE66bU', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHJQUDZTUUNnaXg4SDl0SFQ2bFN6S1J1bzkyOWxVdkxFU0ZKOGI1cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166777),
('TiZVL5hhYpaV5VmuSgkycLnkelYrn1jo6fdyzpVW', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVduQkZ0UXBlSUgzYzlvcHNQTEFjNVQ0T293ck1LUkh1dTVscHJsWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169431),
('TnjdGixZZmzVHkCGouPuZGCN8zrOF7PomEbyTQRB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXJLN2JGb1E2UFFZR2pXMktqOUw3dlFCRUhDT1VoMTVvVGpmN1p2eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909735),
('TrxF0FAc7gfeyvvH9YL2JUy80al3aJ1hodc5i1Z2', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmZYeHZPNXpSeVhpYjRGbjc4RVdwQ1VJQ3R1YkJQeVdlajFaVFBnOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MjI6IlBIUERFQlVHQkFSX1NUQUNLX0RBVEEiO2E6MDp7fX0=', 1755908842),
('TzskxB4dVcKfjwoZf4UwDv9zMnWjt4dpNIYcROgB', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWtXV3FrYjdJOGVjaFJod0s2ZDk1eGttcUxoQ2U1NnljMlJaQXlyRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909519),
('u4a9lOYONu6MTR5mfqFWD3zBO8O29I13Y3WbP1Sz', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVQ4ejhWV3BMSmM5Mkg2M2tkSW92MzBQRFVHelpBSzFwTlZoampXQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168689),
('uBu1AOKnzGBVeNiDMfoD04h2PtQJZiYjbAcgHgxN', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0h3TVdGUHBLbEdNcmgyM2dCYUx2QlNsN1pvU05FcVE4MVRVNzdtMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899022),
('UcvzrC7TYJCI9VWG5hrc3UlenCi8zXp1WvU5SYwC', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3N1cVNUYUkwZzd6MFU3NTcwcGt2ejRoOThoY1ZZaGo1YjRMWVM3TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168557),
('uDMz6HshLbrU3mqyLVu1ygVG6miI6zchmI2RG0d4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0Z2eHZyQTcwTEFmaFlCY1lFRUVmaVc1RDA3a2t1U0UyamNwWnJHbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908817),
('UiELqqXvpuKvYpcFPygSJG0E3njaTkElLY76izne', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGZXV3F5WXhEZ21PeWFwRURzclRldVpQYnNyVEdtWThjOE9sdzhldiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167488),
('uikly1zGisJpjc7YqPWSF7OmKxbfDOLZYtMQaZy0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamRHc2RvaE1KOUVZOGFpYU5lYTlvb25KcEJUeHJDOTA1NlBqZ3NTbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755900486),
('uVp5zWqjcjCJqNkCPjYhOlI7Glf2LMG4gIQhKROT', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUc5V09LNTNTS2RTVkNEdlRGb0FvQWgxeldxbW5UZ3hFMnk5OHRXSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169411),
('Uvvmdw5eNRGQcLVIXZ7hyKcybfvr4nvzGdm23oGP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianRzU29CaXlHSXo1ZHJaYW5aMUZsUWppTUlUQkZHWnl3MjhUNUhteSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907791),
('uw7DdmhqjKLnmZlxGuIAoDjebOJ63HHhkwA5dZWJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWx0cEExN0o4S2psTmNxcEdVQWJIWXRSRzhOYWFSUWxWeGJYUldYViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908338),
('UWa1OkFUxBFwBKEC4up18EDnSr40ZrldF1GbW4ic', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWZ2NkdCcVl4S01Yem5Ma1pEdmQ0SjlGNmtyQnBMczd0WnVKZEhMVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166532),
('V6g3IEzjFqAcz5tFOBch1kf8GZTLHEQaYnc5wKX4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXF2aW9aUDB4YUtiN1l4RUptUjRldE9CcDlTNURXcXpwZWpBVmRrdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169603),
('v6ujnDn5WUXznH3kJNMo64p3c34Jvzhw1ZDhTPNR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHNJcEpoMExuMEkxNlVvN2kxVFA4UW5QRGxJcUZ6YjFHaHhHTEd1WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164216),
('Va9orCxZFIsjxUetYmV8XfbScS1BrHKblWYjKgyI', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVRVdmZnVklMYkpVZ0VZUFBKUElwQ1NENjd5elZDNFF1a0ZObDdOOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909682),
('VFuOuDvMNsmmb6OwGsKGRXT7q1MnSe0o5pgqvPud', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGRxM1RmZ2h5clFiUnZuejEwa0hWOWtYblNGaFhZV3Z4SGJvamhnNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169276),
('vGn5sg7FVGnu5RuDbMQRemYPRT9vCnzzt1jsnyKM', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWdCd2pBbmg5SWxtQ0VnT3R4Rlo0M25Cd2ViTHVrcnU5Z3ZtRVBGWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166113),
('VHBx2JPWNQsF9zGRE6aHiplsrz8BwvEiO5QGiKzO', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWpveXlRRjNtcWN4MzBpZWl4ck5raVN3WDAyb285ZlBGRDZOMTRDZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907728),
('vhQKR6zKTV9LuGLKZBUoK9XfaeEqVaao6y2aCCz2', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUU14U3lCZDl5bjQxeXNaYWJOMWxLRGlIalNCZUNLQlFBNEMwNHR2VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165145),
('ViVs40DglUwqQwsgQxyMkAP2H6BT6DY3Vw1TA41g', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTZ3V2FEVDBQRzdZSFo0SkppWHV3bk9wZHJuQzdEcGl6Z3FtSWZQaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899000),
('vLqS3XeKNf41IzqWsPTtU3ORhpckuMhAKj6XFPRP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVBPd2c0WWRTdVlISW9yZjIwTnF1R2x4N0tvS05pSUVrcHhwVWdNRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755910015),
('vOOsI9lsckYFTBOkrWUubeRkcorr6Yf08dxt96yf', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3k2NHNpT3VER0hYWnJZdEkxOGNCbHdOYWVLVGhoRG9ObTBtQWZxTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165480),
('VvvgCr5NELstHtq3D6Pqz3SoPewAeJKGHZtTfJyy', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUNMNjNRZEJJZ0NWUUV3aGVyY0Q1TjhyYmxtTk50OHE2R1RYNGFBYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908452),
('wJ2Nz6agGVQdIq5VAEAaMDYpO9fIIUnoANtLMTkH', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0M0MXlySkx3a2NpS3FHM1V0M0VmVkl1UnFxZG9iemxHUG1TcVgzQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164019),
('WJKncq2nNfkLVcGCRoGkR580kEQdeCA3VOKoajUQ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVhzWmNvR1YxaENXcndiYnhQczlTSjZUMUh2R1cwYkZHSHlybmxtWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756165457),
('WlHCEX0m6bQXkJZ1yDJ9zDig1Yqw53qvzP3lGq5O', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTURTTXN4MnA4TklUY3pjUVBvb08yRzNMQ2VHQ2R0SWdvNWJydVZpViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898991),
('WM5o5bzs3BMHzas9qZbo9cJvWRRL6AdaVloF5tKP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlo2M3dvQnFmVHdHaEgxckxRUUxXcUNiVVYxYzFtNzJrY1FyeWJNMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755908521),
('wOp8YklnzKhOD0Q9prR65XIMWb5zKD2rfCyLuHQK', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGFLcUpUYkNTWEZ5MjFoRGJaYUJ0MlRwM2dWNEcwUlAzTWY3aVdFMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167575),
('Wq0n2ui7OASxQOsyA9dhEJ2O0t9lhLjy9jDj13vt', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTd0OHAwZEZybmlJcVdWeFZmUDlDTjJoUmpTM2NWZjFKUEZXWEQzVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898995),
('wq92fQhR7zlQPG8p3ZdORMoXvZNdaGeWsUY4xXe0', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZE5YMlVHWDkxS3ZtN2pHSXVZa0RNRzlpSk91Vm1LdENqdUxZSlE4TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166685),
('WqmvmzC45bqNBf8TAvbsIWAqOyUmPdigFz4nCWA4', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2pmM01aVzh6NExGaFlpSTRKY0R6NU1rVUJYU1BwbGpSVjhReXhvaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756164238),
('WYxClwGHT70zvqn6VZARhWCxa9K7oe6E7GYjhc0h', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDhZRXVjUTkwTXV6a0pBRldHVFl4STdaeTJzMWw5VFBXRHhiQmJvQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909911),
('wzTxjpU1JVgByg4G1fjYXlMl3aurqksAn7CmNzan', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1RnbFl6VEdmUXRtVUVtZjNiSGZKeE5QVks5MHdlM1UzN2IwS1dDTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756198271),
('xb9MgNDotQIPiGyQEuTnsTMyrNuamRlOPhZVKFrb', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1Q3TUd6REtqdE10MjFJZVdQbjNwZFhVRjFKdkhycUVCU1o2WTdDSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909463),
('xcxkLwHdoTWzdsoiQ5XEOM1VuCSVH5TTsFH2yiau', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianp5d3hYWkhDSlBBNWRwaTVmSXNSS1YzeGdVZmRFcXVDR201OXdqVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166064),
('xDZHoz9LKH6TGeu7sRcYCJlderMionHNhS0pvuXA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXh2SDZBdDU2MUxFQ3RVNVN0TFJ1QWFHTlNrOFFaZnhKRkZWTlZFdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909350),
('XelBFsht8HUsYrjjFyYZeA9OS8NYhtGTvwhuPUsD', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVROd1RRZTBlcWRKdm5CRUFiMldKd3hkVGIyR3ZrVUJNNWE2Q3VrZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168238),
('XfHtFLXm4BZNhcSHQYxLKDqcnaiwgwa1fKb4Jo9R', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWlKQ2NkVVNMOGhjVnU4U0RYVG1hV1hkZWdHUXQwSjZIbXZucVVjNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167184),
('XwM9j9EPFB4oE7cgP30hbbWrNdYHrL8piBgiVR0Y', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMlZwWktFQm1oWW9OcmY4SG1adlpZcXBDOWJkNTRrN0NZTm0ybm1aRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898933),
('Y5kn74oZpcpuhsW9rXSMuWFetTHmquCIumC1wcbn', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGpCd1V3WXprV0xRYlUxb29uYzRVVHcyZDRnQm1FNWpKM1hGOFFQWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163422),
('YFABlRANfXyzrGTxC2ripDpab1T3UEqf9lFCaA9m', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHNTUHJVMDBLS2JsaGR0UFZ1bWd6b1FUWUtuNWN3b3lORngwcnB5RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166068),
('ygTwPUSdvlV4ha61XmCa7MwsI2HCkfhPkQKR5j9D', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1phbnRxaUZGeEJDVXlPMnRPU2pwUUxrZ2Yxam4yNDMwYVJFVGZ2ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907368),
('yIWB6vBOyqIdJFzHCJYxBntwRkdqtgw2X1p3P4IJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN01wYjN4TFZXd1NXajBwcVhiUE9Ub2dja3l0cXhwdEpmTHNaZmtCTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168745),
('YLNfAX99jv8XR9O2brVjV6AbdUCVnhkrG2KaiO5d', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0NrMFp4aHV6UE5MRjNrMHdJMFNGTjdSeldNaGVtM2lmV1BVN21iOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755898985),
('Yo0vxipMLMbTFqnDEYxNGN3x9doqchsbxK0UNzEP', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHFEeVR2VnBLa1pGbmFsT1FJU2VVTHJFWEYzM2JHT2U1MmF1cFp0ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166624),
('ysZlU7gmIgEprTy4YallVM891cyNf8XU1UnRvKQZ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlhIejVPcWpqTHNSWmQwMjk2U2NQcHhDZFBPWnQ4bDVFY3AxV3NGaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755899098),
('Ywonhc2S6yiK7jUvYUppgeCQYLP0qbqc1zmnas25', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1FlR0I0Q1N2WmZYS3NQNEdvS0xhRGtuYUlXM2lpVkxBS2VNUnh6cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166090),
('YWxNoyvVO4fRQZ1vHpyr9yVoQBpBEkox2KB2hZKh', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2lSYjhpMXFzd25GMTNqYWZQT29nTkpVMGp3VE1IVWc3NGJGYzNFVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169304),
('z6QWgUJ4vFLno3tN8I5ZzESdgwfZFxq2gePJ2jxA', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib240UW1LbWtwY2RvT1FzQkx2c2d5MHBVMFV2bjllTHVyRkJyT3UzUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755909990),
('ZB7eNs54eL5zp3Pyt1PaBAtL434lV9JQfBxnqY1d', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVRLbnVLMEp0R2lBaDZDVEZBYnhQV0UwMmZqVlA3VDdpb2RLRkJkciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907134),
('zCZW9Gomd4LRm84yyjJSFKQzY8pkdvXWHeCcQa75', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDY1c3RjcEwzYWlsYkR1SGY2cFJESzNXd25aQU5HVVVROWtnbmM0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756169028),
('zH9sqbiMZn1oPOsDu9YXxBU2xacQBKH1XNzg39UJ', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWFTRTFBOTdaR0R0TlI2Wk5xSTA1M1JhcGxYeE0xMk5NSHA0dWFmeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756163513),
('Zj34oNtPYUV0qkyosfvl7XPnGPxHitOrNubZg4Jl', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFBhWWJYcnc4WWZuQ3FLR1F1OWpEMUwxVmpXdllZTUY0U2J5R1R0NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907838),
('ZNm6bSSZle65SkDwLPhw2zVOvHtYlomlOrgWpwrv', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3pSUmRWOXhPc2NnTHBiUzhJQzJoYVBad0JSYzJxWDZqR05FWlBPSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166653),
('zrq5voEGFSjYK2kICvScxDzhtJXTMUiBwf8KPxDE', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkYxYjVCa0ZSOFBiT25HYThKMXRucGN5Q1E4VmM3UEk3cmZGNTF5cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755907975),
('Zyhl3qqaYr4U9rSPBQ2DVUWCa38Gu5AwN1Br3xwo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOURzaW5GSmpSQ0podWlSU3ZwUm1iWnBwUW9IRWtiakc2M0tDckhDViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756166204),
('ZZLRzw54xim9UAQbfx8UNn5wdpszCl6iTIWq7am9', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUpMWTk4NHkzc3FoOGFYQnRkZEFSYVdMaDliU3ZTZFVhU2Fwb0lpdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756168260);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subcats`
--

CREATE TABLE `subcats` (
  `id` bigint UNSIGNED NOT NULL,
  `top_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topcats`
--

CREATE TABLE `topcats` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `topcats`
--

INSERT INTO `topcats` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Erkek', 'erkek', '2025-08-22 22:53:42', '2025-08-22 22:53:42'),
(2, 'Kadın', 'kadin', '2025-08-22 22:53:42', '2025-08-22 22:53:42'),
(3, 'Elektronik', 'elektronik', '2025-08-22 22:53:42', '2025-08-22 22:53:42'),
(4, 'Ev & yaşam', 'ev-yasam', '2025-08-22 22:53:42', '2025-08-22 22:53:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatars/avatar.png',
  `role` enum('admin','user','business') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `role`, `username`, `gender`, `bio`) VALUES
(2, 'abdullah balıkçı', 'admin@admin.com', NULL, '$2y$12$t1YcDJ6odsMKcx65jT1EjOXZEPb.854dvVJrolNhTrH0sw37WnO2i', NULL, '2025-08-22 22:52:18', '2025-08-22 22:52:18', 'avatars/avatar.png', 'business', 'admin', NULL, NULL),
(3, 'Barton Aguilar', 'barton@aguilar.com', NULL, '$2y$12$fYBxFmYxazx21ZA45NNa9.P1ZsfwZhnD2lnnA6dskpQSZ33P7v4/W', NULL, '2025-08-22 22:52:54', '2025-08-22 22:52:54', 'avatars/avatar.png', 'user', 'bartonaguilar', NULL, NULL),
(4, 'Charles Shea', 'charles@shea.com', NULL, '$2y$12$7qHDoewwmB2pUaBNLGKZ2ecGf.vo7Ut9iIWlD99/BkTrVCZTFPUE6', NULL, '2025-08-22 22:53:12', '2025-08-22 22:53:12', 'avatars/avatar.png', 'user', 'charlesshea', NULL, NULL),
(5, 'Ezra Gregory', 'ezra@gregory', NULL, '$2y$12$ZAqLBO6GevYZqMTi4qXih.oI2nCtt4bF6WBcG5Qe9XfIkgzeESG4u', NULL, '2025-08-22 22:53:28', '2025-08-22 22:53:28', 'avatars/avatar.png', 'user', 'ezragregory', NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `businessrequest`
--
ALTER TABLE `businessrequest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `businessrequest_company_email_unique` (`company_email`),
  ADD KEY `businessrequest_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `communities_slug_unique` (`slug`),
  ADD UNIQUE KEY `communities_community_token_unique` (`community_token`),
  ADD KEY `communities_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `communityproducts`
--
ALTER TABLE `communityproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communityproducts_product_id_foreign` (`product_id`),
  ADD KEY `communityproducts_community_id_foreign` (`community_id`),
  ADD KEY `communityproducts_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `customlogs`
--
ALTER TABLE `customlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customlogs_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `favories`
--
ALTER TABLE `favories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favories_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `favories_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `follows_follower_id_following_id_unique` (`follower_id`,`following_id`),
  ADD KEY `follows_following_id_foreign` (`following_id`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lowcats`
--
ALTER TABLE `lowcats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lowcats_title_unique` (`title`),
  ADD UNIQUE KEY `lowcats_slug_unique` (`slug`),
  ADD KEY `lowcats_sub_id_foreign` (`sub_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `polloptions`
--
ALTER TABLE `polloptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polloptions_poll_id_foreign` (`poll_id`);

--
-- Tablo için indeksler `pollvotes`
--
ALTER TABLE `pollvotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pollvotes_user_id_poll_id_unique` (`user_id`,`poll_id`),
  ADD KEY `pollvotes_poll_id_foreign` (`poll_id`),
  ADD KEY `pollvotes_poll_option_id_foreign` (`poll_option_id`);

--
-- Tablo için indeksler `productfeatures`
--
ALTER TABLE `productfeatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productfeatures_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `productlikes`
--
ALTER TABLE `productlikes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productlikes_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `productlikes_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_base_token_unique` (`base_token`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_topcat_id_foreign` (`topcat_id`),
  ADD KEY `products_subcat_id_foreign` (`subcat_id`),
  ADD KEY `products_lowcat_id_foreign` (`lowcat_id`);

--
-- Tablo için indeksler `productviews`
--
ALTER TABLE `productviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productviews_product_id_foreign` (`product_id`),
  ADD KEY `productviews_view_user_id_foreign` (`view_user_id`);

--
-- Tablo için indeksler `reposts`
--
ALTER TABLE `reposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reposts_product_id_foreign` (`product_id`),
  ADD KEY `reposts_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `subcats`
--
ALTER TABLE `subcats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcats_title_unique` (`title`),
  ADD UNIQUE KEY `subcats_slug_unique` (`slug`),
  ADD KEY `subcats_top_id_foreign` (`top_id`);

--
-- Tablo için indeksler `topcats`
--
ALTER TABLE `topcats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topcats_title_unique` (`title`),
  ADD UNIQUE KEY `topcats_slug_unique` (`slug`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `businessrequest`
--
ALTER TABLE `businessrequest`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `communities`
--
ALTER TABLE `communities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `communityproducts`
--
ALTER TABLE `communityproducts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customlogs`
--
ALTER TABLE `customlogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `favories`
--
ALTER TABLE `favories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lowcats`
--
ALTER TABLE `lowcats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `polloptions`
--
ALTER TABLE `polloptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `pollvotes`
--
ALTER TABLE `pollvotes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `productfeatures`
--
ALTER TABLE `productfeatures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `productlikes`
--
ALTER TABLE `productlikes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `productviews`
--
ALTER TABLE `productviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `reposts`
--
ALTER TABLE `reposts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `subcats`
--
ALTER TABLE `subcats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `topcats`
--
ALTER TABLE `topcats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `businessrequest`
--
ALTER TABLE `businessrequest`
  ADD CONSTRAINT `businessrequest_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `communityproducts`
--
ALTER TABLE `communityproducts`
  ADD CONSTRAINT `communityproducts_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `communityproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `communityproducts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `customlogs`
--
ALTER TABLE `customlogs`
  ADD CONSTRAINT `customlogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `favories`
--
ALTER TABLE `favories`
  ADD CONSTRAINT `favories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_following_id_foreign` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `lowcats`
--
ALTER TABLE `lowcats`
  ADD CONSTRAINT `lowcats_sub_id_foreign` FOREIGN KEY (`sub_id`) REFERENCES `subcats` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `polloptions`
--
ALTER TABLE `polloptions`
  ADD CONSTRAINT `polloptions_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `pollvotes`
--
ALTER TABLE `pollvotes`
  ADD CONSTRAINT `pollvotes_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pollvotes_poll_option_id_foreign` FOREIGN KEY (`poll_option_id`) REFERENCES `polloptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pollvotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productfeatures`
--
ALTER TABLE `productfeatures`
  ADD CONSTRAINT `productfeatures_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productlikes`
--
ALTER TABLE `productlikes`
  ADD CONSTRAINT `productlikes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productlikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_lowcat_id_foreign` FOREIGN KEY (`lowcat_id`) REFERENCES `lowcats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcat_id_foreign` FOREIGN KEY (`subcat_id`) REFERENCES `subcats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_topcat_id_foreign` FOREIGN KEY (`topcat_id`) REFERENCES `topcats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productviews`
--
ALTER TABLE `productviews`
  ADD CONSTRAINT `productviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productviews_view_user_id_foreign` FOREIGN KEY (`view_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `reposts`
--
ALTER TABLE `reposts`
  ADD CONSTRAINT `reposts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reposts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `subcats`
--
ALTER TABLE `subcats`
  ADD CONSTRAINT `subcats_top_id_foreign` FOREIGN KEY (`top_id`) REFERENCES `topcats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
