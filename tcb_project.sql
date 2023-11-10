-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 05:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcb_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `nid` text NOT NULL,
  `phone_number` text NOT NULL,
  `photo` text NOT NULL,
  `card_no` text NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upozila_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=received,2=hold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `name`, `father_name`, `mother_name`, `nid`, `phone_number`, `photo`, `card_no`, `division_id`, `zila_id`, `upozila_id`, `union_id`, `village_id`, `ward_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Rakib Mahmud', 'জাহাঙ্গীর আলম', 'সুমি আক্তার', '234234', '01757967432', '1699330132.jpg', '234234555', 2, 1, 1, 1, 1, 3, '2023-11-06 21:56:50', '2023-11-06 22:08:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `card_no_start` varchar(255) DEFAULT NULL,
  `card_no_end` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upzila_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `phone_number`, `card_no_start`, `card_no_end`, `nid_no`, `division_id`, `zila_id`, `upzila_id`, `union_id`, `created_at`, `updated_at`) VALUES
(1, 'আশিকুর রহমান', '01757967432', '32353453', '3453445634', '34563456', 2, 1, 1, 1, '2023-11-06 21:53:55', '2023-11-06 21:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `distribution_date` date DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upozila_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_eng` varchar(255) NOT NULL,
  `name_ban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name_eng`, `name_ban`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'ঢাকা', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(2, 'Chattogram', 'চট্টগ্রাম', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(3, 'Rajshahi', 'রাজশাহী', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(4, 'Khulna', 'খুলনা', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(5, 'Dhaka', 'সিলেট', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(6, 'Barishal', 'বরিশাল ', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(7, 'Rangpur', 'রংপুর ', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(8, 'Mymensingh ', 'ময়মনসিংহ ', '2023-11-06 21:39:21', '2023-11-06 21:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_08_051223_create_divisions_table', 1),
(6, '2023_10_08_051235_create_zilas_table', 1),
(7, '2023_10_08_051244_create_upozilas_table', 1),
(8, '2023_10_08_051300_create_unions_table', 1),
(9, '2023_10_08_051556_create_users_table', 1),
(10, '2023_10_08_072308_create_dealers_table', 1),
(11, '2023_10_08_072308_create_stocks_table', 1),
(12, '2023_10_08_082349_create_otps_table', 1),
(13, '2023_11_06_011302_create_villages_table', 1),
(14, '2023_11_08_065804_create_beneficiaries_table', 1),
(15, '2023_11_09_065549_create_distributions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `distribution_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `sent` timestamp NULL DEFAULT NULL,
  `expiration` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upzila_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `dealer_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upozila_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `division_id`, `zila_id`, `upozila_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'বারাপারা', '2023-11-06 21:52:11', '2023-11-06 21:52:11'),
(2, 2, 1, 1, 'গৌরীপুর', '2023-11-06 21:52:31', '2023-11-06 21:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `upozilas`
--

CREATE TABLE `upozilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upozilas`
--

INSERT INTO `upozilas` (`id`, `division_id`, `zila_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'দাউদকান্দি', '2023-11-06 21:51:35', '2023-11-06 21:51:35'),
(2, 2, 1, 'তিতাস', '2023-11-06 21:51:50', '2023-11-06 21:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(10) UNSIGNED NOT NULL COMMENT '1: Admin, 2: Division, 3: Zila, 4: Upzila, 5: Union, 6:Dealer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_number`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rakib Mahmud', 'rakibas375', '01757967432', 'rakibas375@gmail.com', '2023-11-06 21:39:21', '$2y$10$TozJ3Hz41Me/7oyXR.jsFel.Hksuwq2fTxYF3VrkepLIyHEsdFSmC', 1, '0TSmtZlvyCUVxyYnJLbnNS2YkqlDBlppHcMPMt9jBbnM46Eakfcs0W55eAEN', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(2, 'Shakib Khan', 'shakib', '01757967433', 'shakib@gmail.com', '2023-11-06 21:39:21', '$2y$10$7XD5Y1tTI0wnz0/u.KiDVec4PCR/7KbcPfIKqImNwEApWgKXnY6Va', 2, 'OetxRX8PHO', '2023-11-06 21:39:21', '2023-11-06 21:39:21'),
(3, 'jihad Khan', 'jihad', '01757967434', 'jihad@gmail.com', '2023-11-06 21:39:21', '$2y$10$D9Iw8fmlMeQwV6fVpd2xreFcHjRsHoQezbWWgaGW7BhugIuym5I1G', 3, 'PAYwd3bZCu', '2023-11-06 21:39:22', '2023-11-06 21:39:22'),
(4, 'Mahid Khan', 'mahid', '01757967435', 'mahid@gmail.com', '2023-11-06 21:39:22', '$2y$10$iCyZeOn6p5TOS2rCqvK12e/2lSnNk58DAysi89xqfULlZf0LbEKVK', 4, 'Lj1cwWZaMA', '2023-11-06 21:39:22', '2023-11-06 21:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `zila_id` bigint(20) UNSIGNED NOT NULL,
  `upozila_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `division_id`, `zila_id`, `upozila_id`, `union_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'কানরা', '2023-11-06 21:52:54', '2023-11-06 21:52:54'),
(2, 2, 1, 1, 2, 'সরকাপুর', '2023-11-06 21:53:09', '2023-11-06 21:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `zilas`
--

CREATE TABLE `zilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zilas`
--

INSERT INTO `zilas` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'কুমিল্লা', '2023-11-06 21:51:08', '2023-11-06 21:51:08'),
(2, 2, 'ফেনী', '2023-11-06 21:51:17', '2023-11-06 21:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiaries_division_id_foreign` (`division_id`),
  ADD KEY `beneficiaries_zila_id_foreign` (`zila_id`),
  ADD KEY `beneficiaries_upozila_id_foreign` (`upozila_id`),
  ADD KEY `beneficiaries_union_id_foreign` (`union_id`),
  ADD KEY `beneficiaries_village_id_foreign` (`village_id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealers_division_id_foreign` (`division_id`),
  ADD KEY `dealers_zila_id_foreign` (`zila_id`),
  ADD KEY `dealers_upzila_id_foreign` (`upzila_id`),
  ADD KEY `dealers_union_id_foreign` (`union_id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributions_beneficiary_id_foreign` (`beneficiary_id`),
  ADD KEY `distributions_division_id_foreign` (`division_id`),
  ADD KEY `distributions_zila_id_foreign` (`zila_id`),
  ADD KEY `distributions_upozila_id_foreign` (`upozila_id`),
  ADD KEY `distributions_union_id_foreign` (`union_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_division_id_foreign` (`division_id`),
  ADD KEY `stocks_zila_id_foreign` (`zila_id`),
  ADD KEY `stocks_upzila_id_foreign` (`upzila_id`),
  ADD KEY `stocks_union_id_foreign` (`union_id`),
  ADD KEY `stocks_dealer_id_foreign` (`dealer_id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unions_division_id_foreign` (`division_id`),
  ADD KEY `unions_zila_id_foreign` (`zila_id`),
  ADD KEY `unions_upozila_id_foreign` (`upozila_id`);

--
-- Indexes for table `upozilas`
--
ALTER TABLE `upozilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upozilas_division_id_foreign` (`division_id`),
  ADD KEY `upozilas_zila_id_foreign` (`zila_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_division_id_foreign` (`division_id`),
  ADD KEY `villages_zila_id_foreign` (`zila_id`),
  ADD KEY `villages_upozila_id_foreign` (`upozila_id`),
  ADD KEY `villages_union_id_foreign` (`union_id`);

--
-- Indexes for table `zilas`
--
ALTER TABLE `zilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zilas_division_id_foreign` (`division_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upozilas`
--
ALTER TABLE `upozilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zilas`
--
ALTER TABLE `zilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD CONSTRAINT `beneficiaries_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beneficiaries_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beneficiaries_upozila_id_foreign` FOREIGN KEY (`upozila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beneficiaries_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beneficiaries_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dealers`
--
ALTER TABLE `dealers`
  ADD CONSTRAINT `dealers_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealers_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealers_upzila_id_foreign` FOREIGN KEY (`upzila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dealers_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `distributions`
--
ALTER TABLE `distributions`
  ADD CONSTRAINT `distributions_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributions_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributions_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributions_upozila_id_foreign` FOREIGN KEY (`upozila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributions_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_upzila_id_foreign` FOREIGN KEY (`upzila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unions`
--
ALTER TABLE `unions`
  ADD CONSTRAINT `unions_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unions_upozila_id_foreign` FOREIGN KEY (`upozila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unions_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upozilas`
--
ALTER TABLE `upozilas`
  ADD CONSTRAINT `upozilas_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upozilas_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `villages_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `villages_upozila_id_foreign` FOREIGN KEY (`upozila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `villages_zila_id_foreign` FOREIGN KEY (`zila_id`) REFERENCES `zilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zilas`
--
ALTER TABLE `zilas`
  ADD CONSTRAINT `zilas_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
