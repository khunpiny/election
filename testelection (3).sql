-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 03:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testelection`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `admin_name`, `header_id`, `tel`, `comment`, `image`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1', 1, '0954191539', NULL, '1531233120.JPG', 'admin1@hotmail.com', '1', '$2y$10$F0nHp.Z4glSTXVr.jIvOneLvhVDs4Yo0Ruty8oO25qyZbSSLlqddK', NULL, '2018-07-10 07:26:50', '2018-07-10 07:32:00'),
(2, 'admin2', 'admin2', 1, '0966341673', NULL, 'profile.jpg', 'admin2@hotmail.com', '1', '$2y$10$tm.kpSkZoIQYc9UXdGBENuEW8M6/WkmV1vp1uvo5v4FB6fIj51ZVe', NULL, '2018-07-10 07:49:12', '2018-07-10 13:00:13'),
(3, 'admin21', 'admin21', 2, '0954191539', NULL, 'profile.jpg', 'admin21@hotmail.com', '1', '$2y$10$EoSv/PTBIkTN0CfVcRO7B.Olhia6h3Neq9CLApOtcBXEK8IC8Cdou', NULL, '2018-07-10 10:24:21', '2018-07-10 10:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'เขต1รองเมือง', 1, '2018-07-10 07:27:31', '2018-07-10 07:27:31'),
(2, 'เขต2นะจ้าา', 1, '2018-07-10 07:27:31', '2018-07-10 07:27:31'),
(3, 'เขตข้างน้ำตก', 2, '2018-07-10 07:49:36', '2018-07-10 07:49:36'),
(4, 'เขตโรงเรียนราชประชา', 3, '2018-07-10 10:24:42', '2018-07-10 10:24:42'),
(5, 'เขตรถไฟ', 3, '2018-07-10 10:26:43', '2018-07-10 10:26:43'),
(6, 'เขตใหม่ไฉไล', 1, '2018-07-11 05:38:13', '2018-07-11 05:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amphoe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headers`
--

INSERT INTO `headers` (`id`, `name`, `header_name`, `master_id`, `tel`, `province`, `amphoe`, `district`, `comment`, `image`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'header1', 'header1', 1, '0954191539', 'กรุงเทพมหานคร', 'ปทุมวัน', 'รองเมือง', NULL, '1531232673.JPG', 'header1@hotmail.com', '1', '$2y$10$Krx80t1VwCiZ.NBR5lBTP.5rx//DIXSD9LFeIrjFlVVlCC0wQrsEq', NULL, '2018-07-10 07:23:05', '2018-07-10 07:24:33'),
(2, 'header2', 'header2', 1, '0954191539', 'ชุมพร', 'ทุ่งตะโก', 'ทุ่งตะไคร', NULL, 'profile.jpg', 'header2@hotmail.com', '1', '$2y$10$GQ1kyKB2iYDdzaCIxSAWQuffZf1JY3Od9ZYoEvGpITTpsX0FjMYR6', NULL, '2018-07-10 10:22:19', '2018-07-10 13:06:09');

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
(91, '2014_10_12_000000_create_users_table', 1),
(92, '2014_10_12_100000_create_password_resets_table', 1),
(93, '2018_06_28_175744_create_headers_table', 1),
(94, '2018_06_29_175524_create_admins_table', 1),
(95, '2018_07_02_160312_create_areas_table', 1),
(96, '2018_07_03_160324_create_scores_table', 1);

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
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL,
  `master_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `header_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `score`, `date`, `master_id`, `admin_id`, `area_id`, `header_id`, `created_at`, `updated_at`) VALUES
(1, 10, '2018-07-10', 1, 1, 1, 1, '2018-07-10 07:45:53', '2018-07-10 07:45:53'),
(2, 15, '2018-07-11', 1, 1, 1, 1, '2018-07-10 07:46:22', '2018-07-10 07:46:22'),
(3, 100, '2018-07-10', 1, 1, 2, 1, '2018-07-10 07:46:34', '2018-07-10 07:46:34'),
(5, 100, '2018-07-11', 1, 3, 4, 2, '2018-07-10 10:25:28', '2018-07-10 10:25:28'),
(6, 150, '2018-07-12', 1, 3, 5, 2, '2018-07-10 10:27:21', '2018-07-10 10:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `master_name`, `email`, `password`, `party_name`, `tel`, `province`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'master1', 'master1', 'master1@hotmail.com', '$2y$10$IFnmjZFZsnWGuv1NC8haE.S8zoF5f/mdek8JNuGf6qNc4J2Rk1zUa', 'ไทยรักไทย', '0954191539', 'กรุงเทพมหานคร', 'profile.jpg', 'o9vtmf2Oxh4DYspkgoNxkCOu7yzo0ofphRhqg9WRuwRRqgxKjJhTu8PkHF9C', '2018-07-10 07:20:41', '2018-07-10 07:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_header_id_foreign` (`header_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `headers_email_unique` (`email`),
  ADD KEY `headers_master_id_foreign` (`master_id`);

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
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `scores_master_id_foreign` (`master_id`),
  ADD KEY `scores_admin_id_foreign` (`admin_id`),
  ADD KEY `scores_area_id_foreign` (`area_id`),
  ADD KEY `scores_header_id_foreign` (`header_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_header_id_foreign` FOREIGN KEY (`header_id`) REFERENCES `headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `headers`
--
ALTER TABLE `headers`
  ADD CONSTRAINT `headers_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `scores_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `scores_header_id_foreign` FOREIGN KEY (`header_id`) REFERENCES `headers` (`id`),
  ADD CONSTRAINT `scores_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
