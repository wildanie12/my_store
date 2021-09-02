-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2021 pada 12.18
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '0cbd049789a1389c6551381b096c4bdd', '2021-08-31 12:14:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'Reguler User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin', NULL, '2021-08-26 10:00:54', 0),
(2, '::1', 'admin@gmail.com', 9, '2021-08-26 10:03:34', 1),
(3, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 10:04:31', 1),
(4, '::1', 'admin@gmail.com', 9, '2021-08-26 10:07:00', 1),
(5, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 10:09:42', 1),
(6, '::1', 'udin@gmail.com', 4, '2021-08-26 10:11:27', 1),
(7, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 10:12:57', 1),
(8, '::1', 'udin', NULL, '2021-08-26 10:22:56', 0),
(9, '::1', 'udin', NULL, '2021-08-26 10:23:02', 0),
(10, '::1', 'udin@gmail.com', 2, '2021-08-26 10:23:20', 1),
(11, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 10:23:38', 1),
(12, '::1', 'Saepudin', NULL, '2021-08-26 10:24:56', 0),
(13, '::1', 'saepudin@gmail.com', 10, '2021-08-26 10:27:09', 1),
(14, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 10:28:41', 1),
(15, '::1', 'bagas15', NULL, '2021-08-26 11:45:16', 0),
(16, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 11:45:29', 1),
(17, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-26 21:23:51', 1),
(18, '::1', 'udin', NULL, '2021-08-27 04:04:24', 0),
(19, '::1', 'saepudin@gmail.com', 10, '2021-08-27 04:04:34', 1),
(20, '::1', 'bagas', NULL, '2021-08-27 04:06:02', 0),
(21, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 04:06:13', 1),
(22, '::1', 'saepudin@gmail.com', 10, '2021-08-27 04:32:49', 1),
(23, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 04:34:30', 1),
(24, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 04:36:21', 1),
(25, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 04:36:58', 1),
(26, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 06:06:34', 1),
(27, '::1', 'saepudin@gmail.com', 10, '2021-08-27 06:07:05', 1),
(28, '::1', '000000', NULL, '2021-08-27 06:08:37', 0),
(29, '::1', 'user@gmail.com', 11, '2021-08-27 06:09:06', 1),
(30, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 06:11:01', 1),
(31, '::1', 'admin', NULL, '2021-08-27 07:01:12', 0),
(32, '::1', 'bagasmoza07@gmail.com', 1, '2021-08-27 07:01:16', 1),
(33, '::1', 'Admin@gmail.com', 1, '2021-08-31 12:12:33', 1),
(34, '::1', 'bagasmoza07@gmail.com', 3, '2021-08-31 12:14:31', 1),
(35, '::1', 'fava@mail.com', 4, '2021-08-31 12:19:51', 1),
(36, '::1', 'admin2@gmail.com', 2, '2021-08-31 12:20:18', 1),
(37, '::1', 'fava@mail.com', 4, '2021-09-01 09:56:09', 1),
(38, '::1', 'fava@mail.com', 4, '2021-09-01 09:56:22', 1),
(39, '::1', 'bagasmoza07@gmail.com', 3, '2021-09-01 09:57:03', 1),
(40, '::1', 'admin2@gmail.com', 2, '2021-09-01 10:03:03', 1),
(41, '::1', 'fava@mail.com', 4, '2021-09-01 10:53:27', 1),
(42, '::1', 'cokk@mail.com', 5, '2021-09-01 11:06:42', 1),
(43, '::1', 'fava@mail.com', 4, '2021-09-01 11:14:16', 1),
(44, '::1', 'fava@mail.com', 4, '2021-09-01 11:14:23', 1),
(45, '::1', 'udin@gmail.com', 6, '2021-09-01 11:24:52', 1),
(46, '::1', 'udin@gmail.com', 7, '2021-09-01 11:29:28', 1),
(47, '::1', 'udin@gmail.com', 7, '2021-09-01 11:29:41', 1),
(48, '::1', 'udin@gmail.com', 8, '2021-09-01 11:31:57', 1),
(49, '::1', 'udin@gmail.com', 8, '2021-09-01 11:32:03', 1),
(50, '::1', 'admin2', NULL, '2021-09-02 02:19:01', 0),
(51, '::1', 'admin2@gmail.com', 2, '2021-09-02 02:19:08', 1),
(52, '::1', 'Admin@gmail.com', 1, '2021-09-02 02:37:27', 1),
(53, '::1', 'mozarela', NULL, '2021-09-02 02:38:38', 0),
(54, '::1', 'moza@gmail.com', 9, '2021-09-02 02:38:43', 1),
(55, '::1', 'fava@mail.com', 4, '2021-09-02 03:04:10', 1),
(56, '::1', 'fava@mail.com', 4, '2021-09-02 03:12:31', 1),
(57, '::1', 'fava@mail.com', 4, '2021-09-02 03:13:37', 1),
(58, '::1', 'coki@gmail.com', 10, '2021-09-02 03:15:03', 1),
(59, '::1', 'coki@gmail.com', 10, '2021-09-02 03:15:13', 1),
(60, '::1', 'bagasmoza07@gmail.com', 3, '2021-09-02 03:15:24', 1),
(61, '::1', 'bagasmoza07@gmail.com', 3, '2021-09-02 04:02:36', 1),
(62, '::1', 'bagasmoza07@gmail.com', 3, '2021-09-02 04:03:08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage Users Profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1629818697, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `customer`, `nama_produk`, `harga`, `unit`, `tgl_beli`, `total_harga`, `created_at`, `updated_at`) VALUES
(7, 'Miyamura', 'Beng Beng', '2000', '2', '2021-09-02 16:54:00', '4000', '2021-08-25 10:40:33', '2021-09-02 04:54:11'),
(9, 'Markodol', 'Whiskas', '25000', '1', '2021-08-25 22:54:00', '25000', '2021-08-25 10:54:19', '2021-08-25 10:54:19'),
(10, 'Hori', 'Lolipop', '3000', '2', '2021-08-25 22:54:00', '6000', '2021-08-25 10:54:48', '2021-08-25 10:54:48'),
(11, 'Madara', 'Buble Gum', '1000', '3', '2021-08-25 22:55:00', '3000', '2021-08-25 10:55:14', '2021-08-25 10:55:14'),
(12, 'Dio', 'Shampo Lifeboy', '1000', '3', '2021-08-26 22:39:00', '3000', '2021-08-26 10:39:33', '2021-08-26 10:39:33'),
(13, 'Jojo', 'Potato', '2000', '1', '2021-08-27 09:24:00', '2000', '2021-08-26 21:24:29', '2021-08-26 21:24:29'),
(23, 'Ew Ew', 'Lasegar', '2000', '4', '2021-09-01 00:21:00', '8000', '2021-08-31 12:22:01', '2021-08-31 12:22:01'),
(24, 'Bagas', 'Aqua Galon', '22000', '1', '2021-09-02 16:54:00', '22000', '2021-09-02 04:54:36', '2021-09-02 04:54:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama`, `slug`, `status`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Ultra Milk All Varian 200ml', 'ultra-milk-all-varian-200ml', 'Tersedia', '6000', 'UltraMilk.jpg', '2021-09-02 04:34:17', '2021-09-02 04:34:36'),
(2, 'Indomie Aneka Rasa', 'indomie-aneka-rasa', 'Tersedia', '3000', 'Indomie.jpg', '2021-09-02 04:35:47', '2021-09-02 04:35:47'),
(3, 'Beng Beng', 'beng-beng', 'Tersedia', '2000', 'bengbeng.png', '2021-09-02 04:36:40', '2021-09-02 04:36:40'),
(4, 'Frisian Flag All Varian', 'frisian-flag-all-varian', 'Tersedia', '2500', 'FrisinFlag.jpg', '2021-09-02 04:40:34', '2021-09-02 04:40:52'),
(5, 'Yupi Baby Bears', 'yupi-baby-bears', 'Tersedia', '1000', 'yupi baby bears.jpg', '2021-09-02 04:42:53', '2021-09-02 04:42:53'),
(6, 'Yupi Gatot Kaca', 'yupi-gatot-kaca', 'Tidak Tersedia', '1000', 'yupi gatot kaca.jpg', '2021-09-02 04:44:11', '2021-09-02 04:44:11'),
(7, 'Minyak Goreng Resto', 'minyak-goreng-resto', 'Tidak Tersedia', '6500', 'minyak resto.jpg', '2021-09-02 04:49:54', '2021-09-02 04:49:54'),
(8, 'Nabati All Varian', 'nabati-all-varian', 'Tersedia', '2000', 'nabati.jpeg', '2021-09-02 04:52:50', '2021-09-02 04:52:50'),
(9, 'Aqua Galon', 'aqua-galon', 'Tersedia', '22000', 'aqua.jpeg', '2021-09-02 04:53:15', '2021-09-02 04:53:15'),
(10, 'Gas 3Kg', 'gas-3kg', 'Tersedia', '24000', 'gas3kg.jpg', '2021-09-02 04:53:41', '2021-09-02 04:53:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin@gmail.com', 'Admin', NULL, 'default.svg', '$2y$10$T27zYiHhLKgWeWTjtqYtleSXkFVc0TENyrvK.UsWd1NX3a0aI.ZMy', NULL, NULL, NULL, 'e545980c2ca9227b7809e20355623e86', NULL, NULL, 1, 0, '2021-08-31 12:11:58', '2021-08-31 12:11:58', NULL),
(2, 'admin2@gmail.com', 'Admin2', 'Admin', 'default.svg', '$2y$10$Sqp7WnA3H6IHBsClpjzLAeE/UvKSRYwKvhBQYBUor5e2xwDbT6VkW', NULL, NULL, NULL, '359861f4b8493694c06a25f7c2e7549c', NULL, NULL, 1, 0, '2021-08-31 12:13:32', '2021-08-31 12:13:32', NULL),
(3, 'bagasmoza07@gmail.com', 'bagasarya15', 'Bagas Arya P', 'default.svg', '$2y$10$4oq3WxmN2pT3YTT7h74cOu/TRSkOh.9EX13AWqY07UTNMH8VB9hqC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-31 12:14:13', '2021-09-02 03:34:25', NULL),
(10, 'coki@gmail.com', 'fava', NULL, 'default.svg', '$2y$10$TTmKoh42UFzy5d/pAv/3iu3WBY9c6uIMn4P66qMc/eE7NSenhvYtW', NULL, NULL, NULL, '8206df3259f862da6082338f47060529', NULL, NULL, 1, 0, '2021-09-02 03:14:42', '2021-09-02 03:14:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
