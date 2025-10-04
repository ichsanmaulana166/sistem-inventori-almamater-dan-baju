-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 09:46 AM
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
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `almamater`
--

CREATE TABLE `almamater` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` enum('S','M','L','XL','XXL') NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `almamater`
--

INSERT INTO `almamater` (`id`, `size`, `total`, `created_at`, `updated_at`) VALUES
(25, 'S', 6, '2024-11-21 02:12:49', '2024-11-22 02:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` enum('2','3','4','5','6') NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id`, `size`, `total`, `created_at`, `updated_at`) VALUES
(13, '6', 6, '2024-11-21 02:13:02', '2024-11-22 02:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penambahan`
--

CREATE TABLE `laporan_penambahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe_barang` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_penambahan`
--

INSERT INTO `laporan_penambahan` (`id`, `tipe_barang`, `size`, `penambahan`, `tanggal`, `created_at`, `updated_at`) VALUES
(33, 'almamater', 'S', 10, '2024-11-21', '2024-11-21 02:12:49', '2024-11-21 02:12:49'),
(34, 'baju', '6', 10, '2024-11-21', '2024-11-21 02:13:02', '2024-11-21 02:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pengambilans`
--

CREATE TABLE `laporan_pengambilans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_pengambilans`
--

INSERT INTO `laporan_pengambilans` (`id`, `nisn`, `tanggal`, `jumlah`, `ukuran`, `jenis`, `created_at`, `updated_at`) VALUES
(51, '21060025', '2024-11-21', 1, 'S', 'almamater', '2024-11-21 02:13:28', '2024-11-21 02:13:28'),
(52, '21060025', '2024-11-21', 1, '6', 'baju', '2024-11-21 02:13:28', '2024-11-21 02:13:28'),
(53, '746578236', '2024-11-22', 1, 'S', 'almamater', '2024-11-22 02:05:24', '2024-11-22 02:05:24'),
(54, '746578236', '2024-11-22', 1, '6', 'baju', '2024-11-22 02:05:24', '2024-11-22 02:05:24'),
(55, '21060001', '2024-11-22', 1, 'S', 'almamater', '2024-11-22 02:08:52', '2024-11-22 02:08:52'),
(56, '21060001', '2024-11-22', 1, '6', 'baju', '2024-11-22 02:08:52', '2024-11-22 02:08:52'),
(57, '746578236', '2024-11-22', 1, 'S', 'almamater', '2024-11-22 02:10:05', '2024-11-22 02:10:05'),
(58, '746578236', '2024-11-22', 1, '6', 'baju', '2024-11-22 02:10:05', '2024-11-22 02:10:05');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_20_125726_create_roles_table', 2),
(5, '2024_10_20_125900_create_role_user_table', 3),
(6, '2024_10_23_031238_add_role_to_users_table', 4),
(7, '2024_10_30_094540_create_tahun_masuk_table', 5),
(8, '2024_10_30_162326_create_tahun_masuk_table', 6),
(9, '2024_10_30_162326_create_tahun_masuks_table', 7),
(10, '2024_10_31_162547_create_siswas_table', 8),
(11, '2024_10_31_172231_add_nisn_to_siswas_table', 9),
(12, '2024_11_03_144936_create_baju_table', 10),
(13, '2024_11_03_145033_create_almamater_table', 10),
(14, '2024_11_03_151522_create_almamater_table', 11),
(15, '2024_11_03_151615_create_baju_table', 11),
(16, '2024_11_04_063629_create_laporan_penambahan_table', 12),
(17, '2024_11_05_161125_create_laporan_pengambilan_table', 13),
(18, '2024_11_06_053316_create_laporan_pengambilans_table', 14),
(19, '2024_11_07_123917_add_role_to_users_table', 15);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vGVzz7yq9I6N18p4BNhRApvnX0wLHHZt4xZWvaLt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTc5dFZvNzdjREZtQnlCSlRtSnVRQ0RiOFZyUG5mTjRHU2puOEVGdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1732351434);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `tahun_masuk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nama`, `kelas`, `status_pembayaran`, `tahun_masuk_id`, `created_at`, `updated_at`) VALUES
(43, '21060040', 'ICHSAN MAULANA', 12, 'Sudah Membayar', 44, '2024-11-22 01:48:12', '2024-11-22 01:48:12'),
(44, '21060001', 'nbhjdabfcjhsadb', 12, 'Sudah Membayar', 45, '2024-11-22 01:48:46', '2024-11-22 01:48:46'),
(45, '746578236', 'shdgbfhdsbf', 12, 'Sudah Membayar', 44, '2024-11-22 02:04:06', '2024-11-22 02:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_masuks`
--

CREATE TABLE `tahun_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_masuks`
--

INSERT INTO `tahun_masuks` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(44, '2024', '2024-11-22 01:47:49', '2024-11-22 01:47:49'),
(45, '2023', '2024-11-22 01:47:54', '2024-11-22 01:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('super admin','admin keuangan','admin barang') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(33, 'admin keuangan', 'adminkeuangan@gmail.com', 'admin keuangan', NULL, '$2y$12$m/dVm/mmzc9N2F.mHKlKNeD1aWdfdXi7C0BwZnB.EzJJnJoPllTjK', NULL, '2024-11-07 21:08:30', '2024-11-07 21:08:30'),
(34, 'admin barang', 'adminbarang@gmail.com', 'admin barang', NULL, '$2y$12$0DuBjMaOTWUjVV/KkBMuZ./WMmSaMMxMuScutfqXSXZu02ViQi2wa', NULL, '2024-11-07 21:08:57', '2024-11-07 21:08:57'),
(36, 'super admin', 'superadmin@gmail.com', 'super admin', NULL, '$2y$12$tQ2cOvp4VkCFqo6IDkIoZ.7qQE2yTnVyuE.j3ZVNSymDlSX378C9m', NULL, '2024-11-08 00:33:48', '2024-11-08 00:33:48'),
(53, 'aaa', 'aaa@gmail.com', 'admin keuangan', NULL, '$2y$12$z35G1T1RV2E.64KeegscyuOcOqQjjPX4.s96aG4w/kSjU/54vDCWS', NULL, '2024-11-17 08:04:20', '2024-11-17 08:04:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almamater`
--
ALTER TABLE `almamater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penambahan`
--
ALTER TABLE `laporan_penambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pengambilans`
--
ALTER TABLE `laporan_pengambilans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_tahun_masuk_id_foreign` (`tahun_masuk_id`);

--
-- Indexes for table `tahun_masuks`
--
ALTER TABLE `tahun_masuks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun_masuks_tahun_unique` (`tahun`);

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
-- AUTO_INCREMENT for table `almamater`
--
ALTER TABLE `almamater`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_penambahan`
--
ALTER TABLE `laporan_penambahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `laporan_pengambilans`
--
ALTER TABLE `laporan_pengambilans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tahun_masuks`
--
ALTER TABLE `tahun_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_tahun_masuk_id_foreign` FOREIGN KEY (`tahun_masuk_id`) REFERENCES `tahun_masuks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
