-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 04:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kelulusan`
--

CREATE TABLE `data_kelulusan` (
  `id_kelulusan` int(10) UNSIGNED NOT NULL,
  `no_ujian` int(11) NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_indo` int(11) NOT NULL,
  `nilai_mtk` int(11) NOT NULL,
  `nilai_eng` int(11) NOT NULL,
  `nilai_kejurusan` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_siswas`
--

CREATE TABLE `data_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` int(11) NOT NULL,
  `kip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `hobi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cita_cita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_disabilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_tempuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antar_jemput` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_siswas`
--

INSERT INTO `data_siswas` (`id`, `nik`, `nama`, `nisn`, `kip`, `tmp_lahir`, `tgl_lhr`, `jns_kelamin`, `agama`, `anak`, `jml_saudara`, `hobi`, `cita_cita`, `no_hp`, `email`, `biaya_sekolah`, `kebutuhan_disabilitas`, `kebutuhan_khusus`, `alamat`, `tmp_tinggal`, `jarak_tinggal`, `waktu_tempuh`, `antar_jemput`, `foto_siswa`, `created_at`, `updated_at`) VALUES
(1, 12345678, 'Achmad Sofyan Hadi', 12345678, 'ya', 'Malang', '20-14-2002', 'Laki-Laki', 'Islam', 1, 2, 'Mengoding', 'Pengusaha', 812345678, 'ash@me.com', 'orang tua', 'tidak ada', 'tidak ada', 'Jl rumah saya', 'Malang', '500', '5 menit', 'motor', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_07_14_015617_create_roles_table', 2),
(26, '2022_07_15_064050_sekolah', 2),
(28, '2022_07_15_133155_create_notifs_table', 3),
(30, '2022_07_18_033038_create_uploads_table', 4),
(31, '2022_07_18_040111_create_sekolahs_table', 5),
(32, '2022_07_19_023748_kelurahan', 6),
(33, '2022_07_19_023804_kecamatan', 6),
(34, '2022_07_20_030417_create_sessions_table', 7),
(35, '2022_07_23_054446_create_kelas_table', 8),
(36, '2022_07_23_054739_create_jurusans_table', 8),
(37, '2022_07_23_055106_create_tahun_ajarans_table', 8),
(38, '2022_07_23_055330_create_kelompok_pelajarans_table', 8),
(39, '2022_07_23_055445_create_mata_pelajarans_table', 8),
(40, '2022_07_23_061916_create_data_siswas_table', 8),
(41, '2022_07_23_061930_create_data_gurus_table', 8),
(42, '2022_07_23_061955_create_data_ortus_table', 8),
(43, '2022_07_24_132105_kelulusan', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`id`, `nama_pengumuman`, `isi_pengumuman`, `file_pengumuman`, `status_pengumuman`, `created_at`, `updated_at`) VALUES
(10, 'Pengumuman Test', 'Ini Adalah Tes Untuk Pengumuman', 'WhatsApp Image 2022-07-16 at 10.56.19.jpeg', '0', '2022-07-18 22:06:53', '2022-07-18 22:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_name`, `roles_access`, `id_roles`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6hV7Dt0gbr7ZULR7vRrcfartGPKLFk9UaenJGBB4', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMzVaMGk0MUp4eFZaU0hIemJxT0dYNjZuMlZBdmVPSGI1d1dvRHVmMiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbG9jYWxob3N0L2Rldi9ha2FkZW1pay9zaXN3YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1658560880),
('BRrfJWfWijK2fUjlwTkK4BYCBxpTBtiAIzdMJBMj', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUpld0RCU3FZMGRxeXU3eWdzVzhmWksxYWtnbnpPRG9hcGRORXQyUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2xvY2FsaG9zdC9kZXYvc2Vrb2xhaEFwcCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0L2Rldi9zZWtvbGFoQXBwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658591004),
('KHzgvjzMwFhYMGfuaVV2H3a2VxhjnwJGZ8G48cMz', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDNzZUlwZmRuaWZqa1FRT3N6dWpQUlJwS3JmVG84aWFydlRRZ3JrdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2xvY2FsaG9zdC9kZXYvc2Vrb2xhaEFwcCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0L2Rldi9zZWtvbGFoQXBwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658666982),
('o5WXVxAFO8MF3IWkPn4loSzKcWyEgiUktT9LYPpg', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMkhvQUlDbE1qUExaM29WRzFJQ1J0blFQcHkya0RoVjg5cHNrcDZXbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vbG9jYWxob3N0L2Rldi9ha2FkZW1pay9wcmVkaWthdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1658593003),
('xAbgFUAbEkTUKdY6bEuAtyZzvmG2iJwNulTFE8lK', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWkdyeHNnbTU3VXVoM205WTF3MU9vTjJtbU1YUmdFMHRuZmVOMFZCMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vbG9jYWxob3N0L2FrYWRlbWlrIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1658287565);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `status_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(3, 'WhatsApp Image 2022-07-16 at 10.56.18.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\public/uploads/WhatsApp Image 2022-07-16 at 10.56.18.jpeg', '2022-07-18 21:52:41', '2022-07-18 21:52:41'),
(4, 'WhatsApp Image 2022-07-16 at 10.56.17.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.17.jpeg', '2022-07-18 21:53:27', '2022-07-18 21:53:27'),
(5, 'WhatsApp Image 2022-07-16 at 10.56.19.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.19.jpeg', '2022-07-18 22:06:53', '2022-07-18 22:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'CHOIRUL', 'admin@sipinter.com', NULL, '$2y$10$J5QhqMQTJpdcYAL9zgetsOzi3N0j5n0uxu2hNY6uYX/GGXDRvYoMa', '1', NULL, NULL, '2022-07-17 21:37:56'),
(5, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$iHKGKSXkXhPhQOqFp71F/u34lxryrJv/MmK2B3l0Wu4NAr6QKfAqa', '1', NULL, '2022-07-18 20:16:53', '2022-07-18 20:16:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelulusan`
--
ALTER TABLE `data_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indexes for table `data_siswas`
--
ALTER TABLE `data_siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_siswas_email_unique` (`email`);

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
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `data_kelulusan`
--
ALTER TABLE `data_kelulusan`
  MODIFY `id_kelulusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_siswas`
--
ALTER TABLE `data_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
