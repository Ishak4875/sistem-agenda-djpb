-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 06:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agenda_djpb`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `mengundang_pak_kanwil` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_agenda`, `tanggal_agenda`, `waktu_mulai`, `waktu_akhir`, `penanggung_jawab`, `via`, `ruang`, `mengundang_pak_kanwil`, `status`, `event_id`) VALUES
(21, 'Morning Call Revisi', '2023-02-13', '08:00:00', '09:00:00', 'PPA 1', 'Offline', 'TLC', 'Mengundang Pak Kanwil', 'Sudah Berlangsung', 'qknri5oo7842h8if4e461fc8ng'),
(22, 'Bimbingan Mental', '2023-02-17', '15:00:00', '16:00:00', 'PPA 1', 'Offline', 'Ruang Rapat Lantai 2', 'Mengundang Pak Kanwil', 'Belum Berlangsung', '4v7g7r8tg108ko5a8midcisdu4'),
(23, 'Morning Call', '2023-02-20', '08:00:00', '09:00:00', 'PPA 1', 'Offline', 'TLC', 'Mengundang Pak Kanwil', 'Belum Berlangsung', '7tfubg4pq5amh5gjm5o8v8ogsk'),
(24, 'Bimbingan Mental', '2023-03-03', '15:00:00', '16:00:00', 'PPA 1', 'Offline', 'Ruang Rapat Lantai 2', 'Mengundang Pak Kanwil', 'Belum Berlangsung', '48pl1cedmitlmgtvdm4kmde9s4'),
(25, 'Morning Call', '2023-02-27', '08:00:00', '09:00:00', 'PPA 1', 'Offline', 'TLC', 'Mengundang Pak Kanwil', 'Belum Berlangsung', 'grviqa6i02ja8pbikk2fm750lc'),
(26, 'Bimbingan Mental', '2023-02-24', '08:00:00', '09:00:00', 'PPA 1', 'Offline', 'Ruang Rapat Lantai 2', 'Mengundang Pak Kanwil', 'Belum Berlangsung', 'd50sujbrufdpnkpf05q32hkr8g'),
(27, 'Morning Call', '2023-03-06', '08:00:00', '09:00:00', 'PPA 1', 'Offline', 'TLC', 'Mengundang Pak Kanwil', 'Belum Berlangsung', '6eoack3a99s9fbaf7e7mu7hsv4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'UserDJPB', 'djpbsultra@gmail.com', NULL, '$2y$10$FzJgcO0j.hpJAbUqXcwTSu8OSVK.ZQyz1nJaQPsDIFzUza/VkJNrW', NULL, '2023-01-31 19:33:54', '2023-02-16 18:07:21'),
(2, 'SKKI', 'skki27djpbn@gmail.com', NULL, '$2y$10$QeYRcrEkiE1ShM3IGX20UeZXt8diDvpfdlJXbvhd7Bbp5w9jV6kPK', NULL, '2023-02-09 16:41:38', '2023-02-09 17:18:17'),
(3, 'UMUM', 'umumdjpbsultra@gmail.com', NULL, '$2y$10$1WHujQMtv6MBXe0Js6fn2.NK5scpdL6Qs1ArLfovR1oGv/DmyWD4y', NULL, '2023-02-09 17:19:20', '2023-02-09 17:19:20'),
(4, 'PPA 1', 'ppa1djpbsultra@gmail.com', NULL, '$2y$10$UOHgDJDtlzz9T6Swv38sfOqDWQy8p4XO5RyctsEfDlTKdZvdCa1zq', NULL, '2023-02-09 17:20:51', '2023-02-09 17:20:51'),
(5, 'PPA 2', 'ppa2djpbsultra@gmail.com', NULL, '$2y$10$IpPf26Af.9onbhrZ1K9ya.2mQJ1cVfJjNiuDSdrviygU6O8vz8GdG', NULL, '2023-02-09 17:21:39', '2023-02-09 17:21:39'),
(6, 'PAPK', 'papkdjpbsultra@gmail.com', NULL, '$2y$10$EnYCCKXkMDdrPdmF0q35p.HMGV4L9TnMBva17myQQlKSzeWs3HE36', NULL, '2023-02-09 17:22:42', '2023-02-09 17:22:42'),
(7, 'djpb', 'djpbtest@gmail.com', NULL, '$2y$10$GGx1ZCnjmAVxwpSSAomJM.lH25KTaBrjCQhV5ARzaV7cLyI9qmlzq', NULL, '2023-02-12 22:07:39', '2023-02-12 22:07:39'),
(8, 'djpb', 'djpb123@gmail.com', NULL, '$2y$10$Ievb955SRxhY1xpWYuhcmeyyIGHaXCyXXPmf1XbmFjdILYjoQrhH.', NULL, '2023-02-16 07:05:19', '2023-02-16 07:05:19'),
(9, 'djpbsultra', 'djpb12345@gmail.com', NULL, '$2y$10$SqH8B4jSXgi0ig/3ecbOwey10jmwBQrdcjN1jKatqSFQz.h0rmuSC', NULL, '2023-02-16 16:31:42', '2023-02-16 16:31:42');

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
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
