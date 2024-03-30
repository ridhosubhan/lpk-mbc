-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2023 at 09:12 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_lpk_mbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id` int NOT NULL,
  `spp_id` int NOT NULL,
  `siswa_id` int NOT NULL,
  `bulan_bayar` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_bayar` timestamp NOT NULL,
  `tagihan_id` int NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lunas` enum('y','n') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id`, `spp_id`, `siswa_id`, `bulan_bayar`, `tanggal_bayar`, `tagihan_id`, `bukti_transfer`, `lunas`, `created_at`, `updated_at`) VALUES
(2, 4, 11, '08', '2023-08-01 12:30:52', 1, 'transfers/ft68jMoLtRryG3uQ0UNvA1UPjUt29UCBFYmxBMzh.pdf', 'y', '2023-08-01 12:30:52', '2023-08-01 12:34:02'),
(3, 3, 10, '08', '2023-08-01 12:32:21', 1, 'transfers/zdx29PLNCdP1gzWTe6Jgi25mXJbbCExtT5DhdQnF.pdf', 'y', '2023-08-01 12:32:21', '2023-08-01 12:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_pegawai`
--

CREATE TABLE `profil_pegawai` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('l','p') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kat_pegawai` enum('guru','tenaga_pendidik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_pegawai`
--

INSERT INTO `profil_pegawai` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `kat_pegawai`, `email_user`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Bandung', '2023-07-01', 'l', 'bandung', 'images/Admin-Profile-Vector-PNG-Picture.png', 'guru', 'admin@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_daftar` enum('belum_verifikasi','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'belum_verifikasi',
  `email_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `status_daftar`, `email_user`, `created_at`, `updated_at`) VALUES
(10, 'Salim Ahmad', 'Bogor', '2023-08-01', 'l', 'bogor', 'images/RiZrpEY7d2Au3COxlmTZwSmSpXuLYbHcl9SfIuWR.jpg', 'diterima', 'salimahmad@gmail.com', '2023-08-01 12:27:23', '2023-08-02 03:14:06'),
(11, 'Zainuddin', 'Blitar', '2023-08-02', 'p', 'Bandung', 'images/OrgWfiAynufvQNbia47YQqkwTOgXJdUgvX6D0YNj.jpg', 'diterima', 'zainuddin@gmail.com', '2023-08-01 12:28:11', '2023-08-01 12:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `setting_pembayaran`
--

CREATE TABLE `setting_pembayaran` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` float NOT NULL,
  `tahun_id` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_pembayaran`
--

INSERT INTO `setting_pembayaran` (`id`, `nama`, `nominal`, `tahun_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'bayar_full', 5000000, 2023, 'Pembayaran LKP MBC ', '2023-07-01 06:07:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_pembayaran`
--

CREATE TABLE `tagihan_pembayaran` (
  `id` int NOT NULL,
  `siswa_id` int NOT NULL,
  `setting_pembayaran_id` int NOT NULL,
  `bulan_tagihan` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` enum('y','n','process') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan_pembayaran`
--

INSERT INTO `tagihan_pembayaran` (`id`, `siswa_id`, `setting_pembayaran_id`, `bulan_tagihan`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 10, 1, '08', 'n', '2023-08-01 12:27:23', '2023-08-01 12:34:09'),
(4, 11, 1, '08', 'n', '2023-08-01 12:28:11', '2023-08-01 12:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `siswa_id` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `siswa_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$ZcDB8vE8xifXdFbnbUHFKuOzp6dsy3RftcH.Q8KPXJYXKvR/IY2ma', 'admin', 1, NULL, '2023-07-29 23:52:13', '2023-07-29 23:52:13'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$yYcWowU9SovCiKrgtAbmleBXfPc62l5F2ZhTNm9HBqXyiiMVMAgBe', 'user', 0, NULL, '2023-07-29 23:52:13', '2023-07-29 23:52:13'),
(15, 'Salim Ahmad', 'salimahmad@gmail.com', NULL, '$2y$10$764CesWsNopfCbAxhv.I.e5KTyT8ULwhF10zMIlJ21NX2zVF/jfGe', 'user', 10, NULL, '2023-08-01 12:27:23', '2023-08-02 03:32:59'),
(16, 'Zainuddin', 'zainuddin@gmail.com', NULL, '$2y$10$IyOKK0ZNkmQut2H4sE.oGe25HYwlwlCxIerB7JU/QZN4aKaIaASLO', 'user', 11, NULL, '2023-08-01 12:28:11', '2023-08-01 12:28:11');

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
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profil_pegawai`
--
ALTER TABLE `profil_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_pembayaran`
--
ALTER TABLE `setting_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan_pembayaran`
--
ALTER TABLE `tagihan_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_pegawai`
--
ALTER TABLE `profil_pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setting_pembayaran`
--
ALTER TABLE `setting_pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tagihan_pembayaran`
--
ALTER TABLE `tagihan_pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
