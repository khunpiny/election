-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 08:39 PM
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
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Error reading data for table testelection.admins: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `testelection`.`admins`' at line 1

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
(2, 'เขต1', 12, '2018-07-06 07:34:08', '2018-07-06 08:30:51'),
(3, '150', 13, '2018-07-06 07:35:06', '2018-07-06 07:35:06'),
(4, '15', 13, '2018-07-06 07:39:10', '2018-07-06 07:39:10'),
(5, '15', 15, '2018-07-06 07:46:33', '2018-07-06 07:46:33'),
(6, 'เขต78', 16, '2018-07-06 08:59:36', '2018-07-06 08:59:36'),
(7, 'เขต17', 16, '2018-07-06 09:06:16', '2018-07-06 09:06:16'),
(8, 'เขต18', 16, '2018-07-06 09:06:27', '2018-07-06 09:06:27'),
(9, 'เขต78999', 16, '2018-07-06 09:09:32', '2018-07-06 09:09:32'),
(10, '25', 16, '2018-07-06 09:10:30', '2018-07-06 09:10:30'),
(11, 'เขต224', 2, '2018-07-06 09:23:27', '2018-07-06 09:23:51'),
(12, 'เขต60', 17, '2018-07-06 10:35:05', '2018-07-06 10:35:05'),
(13, 'เขต90', 1, '2018-07-06 10:35:05', '2018-07-06 10:35:05'),
(14, 'เขต92', 1, '2018-07-06 10:35:05', '2018-07-06 10:35:05'),
(15, 'เขต99', 18, '2018-07-08 09:46:42', '2018-07-08 09:46:42'),
(16, 'เขต100', 18, '2018-07-08 09:46:42', '2018-07-08 09:46:42'),
(17, 'เขต55', 20, '2018-07-08 09:54:58', '2018-07-08 09:54:58');

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

INSERT INTO `headers` (`id`, `name`, `header_name`, `master_id`, `tel`, `province`, `amphoe`, `district`, `image`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'header1', 'header1', 1, '123456789', 'ชุมพร', 'ท่าแซะ', 'หงษ์เจริญ', 'profile.jpg', 'header1@hotmail.com', '0', '123456789', NULL, '2018-07-03 10:30:08', '2018-07-03 10:30:08'),
(2, 'header2', 'header2', 1, '0954191539', 'เลย', 'เมืองเลย', 'กกดู่', 'profile.jpg', '้header2@hotmail.com', '0', '123456789', NULL, '2018-07-04 06:35:01', '2018-07-04 06:35:01'),
(5, 'header3', 'header3', 1, '0954191539', 'ขอนแก่น', 'ชนบท', 'ชนบท', 'profile.jpg', 'header3@hotmail.com', '1', '$2y$10$nrFJocvJikcRiK1dw/H6Y.D0YEAN2sOTITB2bexDkcnP7imdTGty2', NULL, '2018-07-04 06:57:20', '2018-07-04 06:57:20'),
(7, 'header4', 'header4', 1, '0954191539', 'หนองคาย', 'โพนพิสัย', 'ชุมช้าง', 'profile.jpg', 'header4@hotmail.com', '1', '$2y$10$y32gf742X6f3m6miQw8GoeQ1MmLXgFfWTiUudi4JaSY2CTwL0F88i', NULL, '2018-07-04 06:58:36', '2018-07-04 06:58:36'),
(8, 'header5', 'header5', 1, '0954191539', 'นครสวรรค์', 'ชุมตาบง', 'ชุมตาบง', 'profile.jpg', 'header5@hotmail.com', '0', '$2y$10$9UIVxkx134T/VUznjH2SD.HcGU3BEqtx59OKc5LP1lDkJ6g98KZcm', NULL, '2018-07-04 07:02:07', '2018-07-08 05:26:24'),
(9, 'header6', 'header6', 1, '0954191539', 'ร้อยเอ็ด', 'อาจสามารถ', 'บ้านแจ้ง', 'profile.jpg', 'header6@hotmail.com', '1', '$2y$10$B2M9l48MPTaqlZSv9DvfmO8fZdKcLQdNlgVJMWm.0VENB3x.F4neW', NULL, '2018-07-04 07:04:28', '2018-07-08 05:26:22'),
(11, 'header8', 'header8', 1, '123456789', 'ยะลา', 'กรงปินัง', 'กรงปินัง', '1530898294.jpg', 'header8@hotmail.com', '1', '$2y$10$K0PfUMBTz5kDFuj9xkQc0uYgydrLHU5kMXm79cJP9.79.DkWcVJIK', NULL, '2018-07-04 07:08:03', '2018-07-08 08:33:57'),
(12, 'Header9', 'Header9', 2, '0954191539', 'สมุทรสาคร', 'บ้านแพ้ว', 'ยกกระบัตร', 'profile.jpg', 'Header9@hotmail.com', '1', '$2y$10$2ltJ3Nu2TDwaW4lPY4EkP.0v0y4kcIWssfg5PbNJ4oz3iBAmyLzVW', NULL, '2018-07-08 09:43:50', '2018-07-08 09:43:50');

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
(73, '2014_10_12_000000_create_users_table', 1),
(74, '2014_10_12_100000_create_password_resets_table', 1),
(75, '2018_06_28_175744_create_headers_table', 1),
(76, '2018_06_29_175524_create_admins_table', 1),
(77, '2018_07_02_160312_create_areas_table', 1),
(78, '2018_07_03_160324_create_scores_table', 1);

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
  `master_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `score`, `master_id`, `admin_id`, `area_id`, `date`, `created_at`, `updated_at`) VALUES
(2, 50, 1, 1, 13, '2018-07-20', '2018-07-07 11:57:33', '2018-07-08 04:28:39'),
(3, 5123, 1, 1, 14, '2018-07-17', '2018-07-07 11:59:52', '2018-07-07 11:59:52'),
(4, 1500, 1, 13, 3, '2018-07-08', '2018-07-08 08:46:46', '2018-07-08 08:46:46'),
(6, 150, 1, 13, 3, '2018-07-10', '2018-07-08 10:44:27', '2018-07-08 10:44:27');

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
(1, 'master1', 'master1', 'master1@hotmail.com', '$2y$10$.Pwi0IUSaiLIuKTnQPzTpOxwS2z9YycuWkGaevhzRQ9f7C0a4QQCq', 'party1', '0954191539', 'phuket', '1530805246.jpg', 'aOcqw66W0lce5XXvQ2X85fKw9DLVoeJ3jmjZAJZ1LunWUcqivBz2BIysPoW5', '2018-07-03 08:35:23', '2018-07-08 08:24:24'),
(2, 'Master2', 'Master2', 'master2@hotmail.com', '$2y$10$Q230yxgWZjJEWBArngVrtOQIabzk4G8MnddSAKFL02u4Te2xAohsC', 'พรรค2', '0954191539', 'สงขลา', 'profile.jpg', '2VerM4jI6cyrp9AU9Am9pae9trvJHvB9yMH5Is1ccu7Ldj63vq99qRLaE8lg', '2018-07-08 09:41:51', '2018-07-08 09:41:51');

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
  ADD KEY `scores_area_id_foreign` (`area_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `scores_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
