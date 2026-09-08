-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2026 pada 03.52
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komersial_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_nama` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id`, `admin_id`, `admin_nama`, `action`, `detail`, `ip`, `created_at`) VALUES
(7, 1, 'Administrator', 'CLEAR_LOG', 'Log aktivitas dibersihkan', '127.0.0.1', '2026-04-20 02:21:50'),
(8, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Masjid Agung Jawa Tengah\'', '127.0.0.1', '2026-04-20 02:26:42'),
(9, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Gereja Blenduk\'', '127.0.0.1', '2026-04-20 02:41:59'),
(10, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Candi Gedong Songo\'', '127.0.0.1', '2026-04-20 03:15:55'),
(11, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Candi Gedong Songo\'', '127.0.0.1', '2026-04-20 03:19:25'),
(12, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Klenteng Sam Poo Kong\'', '127.0.0.1', '2026-04-20 03:21:26'),
(13, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Klenteng Sam Poo Kong\'', '127.0.0.1', '2026-04-20 03:21:45'),
(14, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Kota Lama Semarang\'', '127.0.0.1', '2026-04-20 03:25:57'),
(15, 1, 'Administrator', 'UPDATE_WISATA', 'Memperbarui destinasi: \'Pantai Marina\'', '127.0.0.1', '2026-04-20 03:28:37'),
(16, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-20 06:09:40'),
(17, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-21 03:48:36'),
(18, 1, 'Administrator', 'EXPORT', 'Export CSV destinasi wisata', '127.0.0.1', '2026-04-21 04:06:20'),
(19, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-21 07:42:19'),
(20, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-22 01:43:36'),
(21, 1, 'Administrator', 'DELETE_WISATA', 'Hapus destinasi \'Pantai Marina\' (ID: 6)', '127.0.0.1', '2026-04-22 02:49:35'),
(22, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-22 14:18:25'),
(23, 1, 'Administrator', 'DELETE_WISATA', 'Hapus \'Masjid Agung Jawa Tengah\' (ID:1)', '127.0.0.1', '2026-04-22 15:10:56'),
(24, 1, 'Administrator', 'CHANGE_PASSWORD', 'Password berhasil diubah', '127.0.0.1', '2026-04-22 15:25:58'),
(25, 1, 'Administrator', 'LOGOUT', 'Admin keluar dari sistem', '127.0.0.1', '2026-04-22 15:26:04'),
(26, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-22 15:26:12'),
(27, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 127.0.0.1', '127.0.0.1', '2026-04-23 02:50:42'),
(28, 1, 'Administrator', 'DELETE_WISATA', 'Hapus \'Candi Gedong Songo\' (ID:5)', '127.0.0.1', '2026-04-23 05:11:25'),
(29, 1, 'Administrator', 'DELETE_WISATA', 'Hapus \'Gereja Blenduk\' (ID:3)', '127.0.0.1', '2026-04-23 05:12:04'),
(30, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Kota Lama Semarang\' (ID:4)', '127.0.0.1', '2026-04-23 05:27:51'),
(31, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Masjid Agung Jawa Tengah\' (ID:7)', '127.0.0.1', '2026-04-23 05:31:14'),
(32, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Candi Gedong Songo\' (ID:8)', '127.0.0.1', '2026-04-23 05:42:10'),
(33, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Goa Kreo\' (ID:9)', '127.0.0.1', '2026-04-23 05:52:46'),
(34, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'TINJOMOYO\' (ID:10)', '127.0.0.1', '2026-04-23 06:01:30'),
(35, 1, 'Administrator', 'LOGOUT', 'Admin keluar dari sistem', '10.7.104.194', '2026-04-28 07:23:18'),
(36, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.194', '10.7.104.194', '2026-04-28 07:23:34'),
(37, 1, 'Administrator', 'LOGOUT', 'Admin keluar dari sistem', '10.7.104.194', '2026-04-28 07:24:07'),
(38, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.194', '10.7.104.194', '2026-04-28 07:27:10'),
(39, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'TINJOMOYO\' (ID:10)', '10.7.104.194', '2026-04-28 07:33:09'),
(40, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Goa Kreo\' (ID:9)', '10.7.104.194', '2026-04-28 08:51:56'),
(41, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'TINJOMOYO\' (ID:10)', '10.7.104.194', '2026-04-28 08:52:12'),
(42, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'TINJOMOYO\' (ID:10)', '10.7.104.194', '2026-04-28 08:53:23'),
(43, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Candi Gedong Songo\' (ID:8)', '10.7.104.194', '2026-04-28 08:53:53'),
(44, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Masjid Agung Jawa Tengah\' (ID:7)', '10.7.104.194', '2026-04-28 08:54:13'),
(45, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Kota Lama Semarang\' (ID:4)', '10.7.104.194', '2026-04-28 08:54:39'),
(46, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Klenteng Sam Poo Kong\' (ID:2)', '10.7.104.194', '2026-04-28 08:55:37'),
(47, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.188', '10.7.104.188', '2026-04-29 02:20:06'),
(48, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Pantai Marina\' (ID:11)', '10.7.104.188', '2026-04-29 02:23:26'),
(49, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Pantai Marina\' (ID:11)', '10.7.104.188', '2026-04-29 02:25:50'),
(50, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Gedangan\' (ID:12)', '10.7.104.188', '2026-04-29 02:30:23'),
(51, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Gedangan\' (ID:12)', '10.7.104.188', '2026-04-29 02:31:26'),
(52, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'GPIB Immanuel Semarang (Gereja Blenduk)\' (ID:13)', '10.7.104.188', '2026-04-29 02:34:49'),
(53, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Curug Gondoriyo\' (ID:14)', '10.7.104.188', '2026-04-29 02:40:05'),
(54, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Lawang Sewu Semarang\' (ID:15)', '10.7.104.188', '2026-04-29 02:43:05'),
(55, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Maerokoco Semarang\' (ID:16)', '10.7.104.188', '2026-04-29 02:47:55'),
(56, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Pagoda Avalokitesvara\' (ID:17)', '10.7.104.188', '2026-04-29 02:50:13'),
(57, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Pecinan Semarang\' (ID:18)', '10.7.104.188', '2026-04-29 02:52:37'),
(58, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Pura Agung Giri Natha Semarang\' (ID:19)', '10.7.104.188', '2026-04-29 02:57:47'),
(59, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Klenteng Sam Poo Kong\' (ID:2)', '10.7.104.188', '2026-04-29 03:36:43'),
(60, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Kota Lama Semarang\' (ID:4)', '10.7.104.188', '2026-04-29 03:37:12'),
(61, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Masjid Agung Jawa Tengah\' (ID:7)', '10.7.104.188', '2026-04-29 03:37:30'),
(62, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Candi Gedong Songo\' (ID:8)', '10.7.104.188', '2026-04-29 03:37:51'),
(63, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Goa Kreo\' (ID:9)', '10.7.104.188', '2026-04-29 03:38:02'),
(64, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'TINJOMOYO\' (ID:10)', '10.7.104.188', '2026-04-29 03:39:02'),
(65, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Pantai Marina\' (ID:11)', '10.7.104.188', '2026-04-29 03:39:14'),
(66, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Gedangan\' (ID:12)', '10.7.104.188', '2026-04-29 03:39:29'),
(67, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'GPIB Immanuel Semarang (Gereja Blenduk)\' (ID:13)', '10.7.104.188', '2026-04-29 03:39:42'),
(68, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Curug Gondoriyo\' (ID:14)', '10.7.104.188', '2026-04-29 03:39:53'),
(69, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Lawang Sewu Semarang\' (ID:15)', '10.7.104.188', '2026-04-29 03:40:07'),
(70, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Maerokoco Semarang\' (ID:16)', '10.7.104.188', '2026-04-29 03:40:18'),
(71, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Pagoda Avalokitesvara\' (ID:17)', '10.7.104.188', '2026-04-29 03:40:29'),
(72, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Pecinan Semarang\' (ID:18)', '10.7.104.188', '2026-04-29 03:40:40'),
(73, 1, 'Administrator', 'UPDATE_WISATA', 'Update \'Pura Agung Giri Natha Semarang\' (ID:19)', '10.7.104.188', '2026-04-29 03:40:52'),
(74, NULL, NULL, 'LOGIN_FAILED', 'Percobaan login gagal: signage', '10.7.104.123', '2026-05-04 01:35:19'),
(75, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.123', '10.7.104.123', '2026-05-04 01:35:32'),
(76, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.213', '10.7.104.213', '2026-05-04 02:22:30'),
(77, 1, 'Administrator', 'ADD_ADMIN', 'Admin baru \'star\' ditambahkan', '10.7.104.213', '2026-05-04 02:23:37'),
(78, 1, 'Administrator', 'LOGOUT', 'Admin keluar dari sistem', '10.7.104.213', '2026-05-04 02:23:45'),
(79, 2, 'rockstar', 'LOGIN', 'Login berhasil dari IP: 10.7.104.213', '10.7.104.213', '2026-05-04 02:23:53'),
(80, NULL, NULL, 'LOGIN_FAILED', 'Percobaan login gagal: star', '10.7.104.186', '2026-05-05 04:26:47'),
(81, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.186', '10.7.104.186', '2026-05-05 04:26:53'),
(82, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.197', '10.7.104.197', '2026-05-06 02:46:23'),
(83, 1, 'Administrator', 'CREATE_WISATA', 'Tambah destinasi \'Danau BSB\' (ID:20)', '10.7.104.197', '2026-05-06 02:47:58'),
(84, 1, 'Administrator', 'DELETE_WISATA', 'Hapus \'Danau BSB\' (ID:20)', '10.7.104.197', '2026-05-06 02:50:09'),
(85, 1, 'Administrator', 'LOGIN', 'Login berhasil dari IP: 10.7.104.201', '10.7.104.201', '2026-05-11 04:46:12'),
(86, 1, 'Administrator', 'LOGOUT', 'Admin keluar dari sistem', '10.7.104.201', '2026-05-11 04:49:36'),
(87, NULL, NULL, 'LOGIN_FAILED', 'Percobaan login gagal: star', '10.7.104.201', '2026-05-11 04:49:43'),
(88, 2, 'rockstar', 'LOGIN', 'Login berhasil dari IP: 10.7.104.201', '10.7.104.201', '2026-05-11 04:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `last_login`, `created_at`) VALUES
(1, 'admin', '$2y$12$G8jqozu4rhCzdJPOg6IlFugMuSeseqrgz3GWx/1iBhbBrys6BI/4.', 'Administrator', '2026-05-11 11:46:12', '2026-04-28 03:34:37'),
(2, 'star', '$2y$12$8BuCK12zzrt..RsEzYCZROt6OIFj/PUgGYlAkZHVPwdzu5SizZX6G', 'rockstar', '2026-05-11 11:49:57', '2026-05-04 02:23:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `lantai_1` int(11) NOT NULL DEFAULT '0',
  `lantai_2` int(11) NOT NULL DEFAULT '0',
  `mezanine` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `foto`, `lantai_1`, `lantai_2`, `mezanine`, `status`) VALUES
(1, 'Mushola', 'mushola.jpg', 1, 1, 0, 1),
(2, 'Atm Center', 'atmcenter.jpg', 1, 0, 0, 1),
(3, 'Lift', 'lift.jpg', 1, 1, 1, 1),
(4, 'Smoking Area', 'smokearea.jpg', 0, 0, 1, 1),
(5, 'Escalator', 'escalator.jpg', 1, 1, 1, 1),
(6, 'Loby', 'loby.jpg', 0, 1, 0, 1),
(7, 'Money Changer', 'moneychanger.jpg', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `poss_id` varchar(191) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`id`, `type`, `poss_id`, `nama`, `status`) VALUES
(1, 'Tenant', '1', 'Retail', 1),
(2, 'Tenant', '2', 'F&B', 1),
(3, 'Wisata', '1', 'Religi', 1),
(4, 'Wisata', '2', 'Warisan Budaya', 1),
(5, 'Assistance', '1', 'Travelling', 1),
(6, 'Wisata', '3', 'Alam', 1),
(7, 'Assistance', '2', 'Assintance', 1),
(8, 'Assistance', '3', 'Other Assistance', 1),
(9, 'Tenant', '3', 'Service', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 3),
(5, '2019_10_10_061311_create_sessions_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan_bandara`
--

CREATE TABLE `panduan_bandara` (
  `id` int(11) NOT NULL,
  `post_id` varchar(5) NOT NULL,
  `post_title` varchar(191) NOT NULL,
  `en_title` varchar(191) DEFAULT NULL,
  `post_desc` text NOT NULL,
  `en_desc` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panduan_bandara`
--

INSERT INTO `panduan_bandara` (`id`, `post_id`, `post_title`, `en_title`, `post_desc`, `en_desc`, `status`) VALUES
(1, 'p01', 'Panduan Kedatangan', 'Arrival Guide', '<br>1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" ke pengambilan bagasi.<br>\r\n2. Untuk pengambilan Bagasi, periksa layar informasi di conveyer belt sesuai penerbangan Anda.<br>\r\n3. Staf maskapai akan melakukan pemeriksaan sesuai dengan baggage claim tag.<br>\r\n4. Apabila kehilangan bagasi, Anda dapat menghubungi staf maskapai di konter Lost and Found.<br>\r\n5. Tersedia fasilitas trolley di area pengambilan bagasi.<br>\r\n6. Bila diperlukan, Anda dapat menggunakan jasa porter untuk membantu membawa barang bawaan.<br>\r\n7. Harap mengingat nomor petugas porter anda dan laporkan apabila terjadi hal-hal yang tidak diharapkan.<br><br>\r\n\r\n<b><i>Hall Kedatangan</i></b><br>\r\nArea ini diperuntukkan untuk proses penjemputan setelah penumpang keluar dari terminal kedatangan.<br>\r\n\r\n<br><b><i>Pick-up Zone</i></b></br>\r\nDisediakan bagi kendaran penjemput untuk menaikkan penumpang dan bagasi.<br>', '<br>1. On arrival at the arrival terminal, follow the \"Arrival\" instructions to the baggage claim.<br>\r\n2. To take luggage, check the screen information on the conveyer belt according your flight.<br>\r\n3. The airline staff will conduct an inspection according to the luggage claim tag.<br>\r\n4. If the luggage lost, you can contact the airline staff at the Lost and Found counter.<br>\r\n5. It’s available the trolley facilities in the luggage claim area.<br>\r\n6. If needed, you can use the services of a porter to help carry baggage.<br>\r\n7. Please remember the numbers of your porter officer and report in case things are not expected.<br><br>', 1),
(2, 'p02', 'Panduan Keberangkatan', 'Departure Guide', '<p><br>Berikut ini tahapan - tahapan yang harus dilalui penumpang: <br><br>\r\n<b>Pemeriksaan Security</b><br>\r\nUntuk memasuki terminal keberangkatan, seluruh penumpang harus melalui pintu Pemeriksaan Security. Yang harus diperhatikan pada tahapan ini antara lain:<br><br>\r\n\r\n1. Siapkan dokumen perjalanan anda sebagai berikut: <br>\r\n&nbsp &nbsp - sesuai tanggal keberangkatan<br>\r\n&nbsp &nbsp - Kartu Identitas<br>\r\n2. Seluruh barang bawaan wajib diperiksa melalui mesin x-ray.<br>\r\n3. Untuk kelancaran proses pemeriksaan, agar seluruh benda logam seperti telepon genggam, kunci, dan lain sebagainya dimasukkan ke dalam tas.<br>\r\n4. Seluruh penumpang wajib melalui Walk Through Metal Detector (WTMD).<br>\r\n5. Apabila diperlukan, penumpang dan barang bawaan dapat diperiksa secara manual oleh Petugas Security Bandara.<br>\r\n6. Laporkan kepada Petugas Security Bandara apabila Anda <br>\r\n&nbsp &nbsp - Menggunakan alat pacu jantung<br>\r\n&nbsp &nbsp - Membawa senjata api<br>\r\n7. Tidak diperkenankan membawa benda tajam dan barang berbahaya seperti pisau, pisau lipat, alat pemotong kuku, cutter, korek api, korek gas, dan sebagainya.<br><br>\r\n\r\n<b>Pelaporan (check in)</b><br></br>\r\n1. Siapkan dokumen perjalanan anda, sebagai berikut: <br>\r\n&nbsp &nbsp - Tiket sesuai tanggal keberangkatan<br>\r\n&nbsp &nbsp - Kartu Identitas<br>\r\n2. Antrilah pada meja pelaporan (check in counter) yang sesuai dengan maskapai penerbangan Anda. Meja pelaporan dibuka 2 jam sebelum waktu keberangkatan.<br>\r\n3. Untuk keselamatan penerbangan, laporkan bagasi Anda yang beratnya lebih dari 7 Kg, dan hanya diperkenankan membawa 1 bagasi yang beratnya kurang dari 7 Kg ke dalam kabin pesawat.<br><br>\r\n<b>Scanning / Tapping Boarding Pass</b><br>\r\nSerahkan boarding pass Anda kepada petugas tapping.<br><br>\r\n\r\n<b>Pemeriksaan Security 2</b><br>\r\nPenumpang wajib melepaskan ikat pinggang, jam tangan, topi, jaket, kunci, koin dan mengosongkan isi kantung celana / baju.<br><br>\r\n\r\n<b>Ruang Keberangkatan</b><br>\r\nSetelah melaporkan keberangkatan Anda di meja pelaporan, Anda dapat menunggu waktu kebarangkatan di Ruang Keberangkatan sesuai dengan lokasi yang tertera pada Boarding Pass.\r\n</p>', '<p><br>Here are the stages - stages that must be passed by passengers:<br><br>\r\n\r\n<b>Security inspection</b><br>\r\n\r\nTo enter the departure terminal, all passengers must go through security checks doors. That must be considered at this stage include:<br><br>\r\n\r\n1. Prepare your travel documents as follows: <br>\r\n&nbsp &nbsp - Tickets as corresponding dates<br>\r\n&nbsp &nbsp - Identity card<br>\r\n2. All luggage must be checked through the x-ray machine.<br>\r\n3. To facilitate the inspection process, so that all metal objects such as mobile phones, keys, and other, to be put into bags.<br>\r\n4. All passengers must go through Walk through Metal Detector (WTMD).<br>\r\n5. If necessary, passengers and luggage can be checked manually by Airport Security Officer.<br>\r\n6. Report to the Security Officer if your service<br>\r\n&nbsp &nbsp - Using pacemakers<br>\r\n&nbsp &nbsp - Carrying of firearms<br>\r\n&nbsp &nbsp &nbsp 1. Not allowed to bring along sharp and dangerous items such as knives, penknives, nail clipper, cutter, lighters, matches, gas, and so forth.<br><br>', 1),
(3, 'p03', 'Panduan Transit', 'Transits Guide', '<br>1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" menuju konter transit dan transfer untuk melakukan pelaporan diri dan pemeriksaan dokumen penerbangan sesuai maskapai penerbangan Anda.<br>\r\n2. Penumpang transit dan transfer tidak perlu keluar untuk melakukan pemeriksaan Security (kecuali jika diperlukan)<br>\r\n3. Setelah pemeriksaan, Anda dapat langsung menuju ruang tunggu keberangkatan untuk menunggu waktu naik pesawat (boarding time)<br>', '<br>\r\n1. When arrive at the arrival terminal, follow the \"arrival\" instructions to the transit counter and transfer to self-reporting and document checking your airline\'s flight.\r\n<br>\r\n2. Transit and transfer passengers do not need to go out to do the inspection Security (unless necessary)<br>\r\n3. After the inspection, you can go directly to the departure lounge to wait on the boarding time.<br>', 1),
(4, 'p04', 'Panduan Keamanan', 'Security Guide', '<br> 1. Security Screening<br>\r\n&nbsp &nbsp - Persiapkan dokumen perjalanan anda (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperlukan))<br>\r\n&nbsp &nbsp - Letakkan barang-barang yang mengandung Cairan, Aerosol dan Gel kedalam tray <br>\r\n&nbsp &nbsp - Letakkan barang-barang elektronik (mis. laptop, mobile phones, tablets) dan metal (mis. kunci, coin) kedalam tray yang lain.<br>\r\n&nbsp &nbsp - Lepas jaket, sweater, topi dan sepatu kemudian letakan kedalam tray\r\n&nbsp &nbsp - Masukan barang bawaan anda ke dalam X-Ray conveyor belt<br>\r\n&nbsp &nbsp - Pemeriksaan secara fisik akan dilakukan dengan menggunakan walkthrough metal detectors.<br>\r\n2. Bagasi Terlarang<br>\r\nIndonesia memiliki peraturan yang ketat bagi penumpang yang membawa barang terlarang dalam penerbangan. Anda sangat disarankan untuk bertanya pada staf maskapai sebelum check-in jika tidak yakin dengan barang yang ada dalam tas tangan Anda, untuk mencegah penundaan yang tidak perlu.<br>\r\n3. Panduan untuk Cairan, Aerosol dan Gel dalam Tas Tangan <br>\r\n&nbsp &nbsp - Cairan, aerosol dan gel harus berada dalam wadah berkapasitas maksimal masing-masing 100ml.<br>\r\n&nbsp &nbsp - Wadah-wadah ini harus berada di dalam kantung transparan bersegel ukuran 1 liter.  <br>\r\n&nbsp &nbsp - Segel kantung plastik harus ditutup dengan rapat. <br>\r\n&nbsp &nbsp - Setiap orang hanya boleh membawa 1 kantung plastik bersegel. Kantung bersegel ini harus ditunjukkan kepada petugas di tempat pemeriksaan.<br>\r\n&nbsp &nbsp - Pengecualian diizinkan untuk obat-obatan, makanan bayi dan makanan spesial lainnya.<br>\r\n&nbsp &nbsp - Minuman keras atau cairan lainnya, produk aerosol, dan gel (lebih dari 100ml) yang dibeli dari bandara luar negeri harus tertutup rapat dalam kantung bersegel.<br>', '<br>\r\n1. Security Screening\r\n<br>\r\n&nbsp &nbsp - Prepare your travel documents (valid passport, airline ticket or booking confirmation, and visa (if needed)\r\n<br>\r\n&nbsp &nbsp - Put items containing liquids, aerosols and gel into the tray\r\n<br>\r\n&nbsp &nbsp - Put electronic items (i.e. laptops, mobile phones, tablets) and metal (e.g., locks, coin) into another tray.\r\n<br>\r\n&nbsp &nbsp - Loose jackets, sweaters, hats and shoes then put into a tray\r\n<br>\r\n&nbsp &nbsp - Put your luggage in the X-ray conveyor belt\r\n<br>\r\n&nbsp &nbsp - Physical examination will be carried out by using a walkthrough metal detector.<br>', 1),
(5, 'p05', 'Panduan Kedatangan', 'Arrival Guide', '<br><b>Visa On Arrival (VOA)</b>atau Visa Kunjungan Saat Kedatangan diberikan kepada Warga Negara Asing yang bermaksud mengadakan kunjungan ke Indonesia dalam rangka wisata, kunjungan sosial budaya, kunjungan usaha, atau tugas pemerintahan. <br><br>\r\n\r\n<b>Visa On Arrival</b> diberikan oleh pejabat imigrasi kepada Warga Negara Asing yang memenuhi persyaratan, pada saat tiba di wilayah Indonesia melalui tempat pemeriksaan Imigrasi tertentu.<br>\r\n\r\n<br>Persyaratan untuk mengajukan Visa On Arrival sebagai berikut : <br>\r\n1. Surat perjalanan atau paspor kebangsaan dengan masa berlaku minimal 6 (enam) bulan <br>\r\n2. Tidak terdaftar dalam daftar penangkalan <br>\r\n 3. Membayar biaya sesuai dengan ketentuan yang berlaku<br><br>\r\n\r\nVisa On Arrival diberikan untuk jangka waktu 30 (tiga puluh) hari dengan ketentuan :<br>\r\n\r\n1.	Dapat diperpanjang ijin keimigrasiannya paling lama 30 (tiga puluh) hari <br>\r\n2.	Tidak dapat dialihstatuskan menjadi Izin Keimigrasian lainnya<br>\r\n<p>Visa On Arrival diberikan dengan membubuhkan cap atau stiker visa pada Surat Perjalanan atau Paspor Kebangsaan yang sah dan masih berlaku.</p>', '<br>\r\n1. On arrival at the arrival terminal, follow the \"Arrival\" instructions to the baggage claim.\r\n<br>\r\n2. To take luggage, check the screen information on the conveyer belt according your flight.\r\n<br>\r\n3. The airline staff will conduct an inspection according to the luggage claim tag.\r\n<br>\r\n4. If the luggage lost, you can contact the airline staff at the Lost and Found counter.\r\n<br>\r\n5. It’s available the trolley facilities in the luggage claim area.\r\n<br>\r\n6. If needed, you can use the services of a porter to help carry baggage.\r\n<br>\r\n7. Please remember the numbers of your porter officer and report in case things are not expected.<br><br>\r\n \r\n\r\n<b><i>Arrival Hall</i></b><br>\r\n\r\nThis area reserved for passenger pick-up process after the exit of the arrival terminal.<br>\r\n\r\n<br><b><i>Pick-up Zone</i></b></br>\r\n\r\nIt’s provided for pick-upvehicle to raise passengers and luggage.<br>\r\n\r\nFor you who want to use theTaxi facilities, please visit the official taxi counter in the Public Hall Domestic Arrivals.<br>', 1),
(6, 'p06', 'Panduan Keberangkatan', 'Departure Guide', '<br> 1. Packing semua barang - barang anda, termasuk tas tangan yang anda bawa, sesuai dengan pedoman keamanan.<br> \r\n2. Ketika anda tiba di bandara, periksa  info penerbangan yang ada di layar informasi penerbangan untuk mengetahui konter check-in dan waktu keberangkatan maskapai penerbangan anda.<br> \r\n3. Antrilah pada meja pelaporan (check in counter) yang sesuai dengan maskapai penerbangan Anda dengan dokumen perjalan (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperkukan)). Meja pelaporan dibuka 2 jam sebelum waktu keberangkatan.<br> \r\n4. Periksa boarding pass dan dokumen perjalanan anda sebelum meninggalkan konter check-in <br> \r\n5. Menuju ke konter imigrasi dengan dokumen perjalan anda (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperkukan))<br> \r\n6. Masuk ke ruang tunggu keberangkatan sesuai yang tertera di boarding pass atau layar informasi penerbangan <br>', '<p><br>Here are the stages - stages that must be passed by passengers:<br><br>\r\n\r\n<b>Security inspection</b><br>\r\n\r\nTo enter the departure terminal, all passengers must go through security checks doors. That must be considered at this stage include:<br><br>\r\n\r\n1. Prepare your travel documents as follows: <br>\r\n&nbsp &nbsp - Tickets as corresponding dates<br>\r\n&nbsp &nbsp - Identity card<br>\r\n2. All luggage must be checked through the x-ray machine.<br>\r\n3. To facilitate the inspection process, so that all metal objects such as mobile phones, keys, and other, to be put into bags.<br>\r\n4. All passengers must go through Walk through Metal Detector (WTMD).<br>\r\n5. If necessary, passengers and luggage can be checked manually by Airport Security Officer.<br>\r\n6. Report to the Security Officer if your service<br>\r\n&nbsp &nbsp - Using pacemakers<br>\r\n&nbsp &nbsp - Carrying of firearms<br>\r\n&nbsp &nbsp &nbsp 1. Not allowed to bring along sharp and dangerous items such as knives, penknives, nail clipper, cutter, lighters, matches, gas, and so forth.<br><br>\r\n\r\n<b>Reporting (check in)</b><br><br>\r\n\r\n1. Prepare your travel documents, as follows:<br>\r\n&nbsp &nbsp - Tickets corresponding dates<br>\r\n&nbsp &nbsp - Identity card<br>\r\n2. Please queue up the reporting table (the check-in counter) corresponding to your airline. Table reporting at least 2 hours before departure time.<br>\r\n3. For flight safety, report your luggage weighing more than 7 kg, da only allowed to carry one luggage that weighs less than 7 kg into the aircraft cabin.\r\nScanning / Tapping Boarding Pass<br><br>\r\n\r\nSubmit your boarding pass to the attendant tapping.<br><br>\r\n\r\n<b>Security Inspection 2</b><br>\r\n\r\nPassengers are obliged to release the belts, watches, hats, jackets, keys, coins and empty the contents of the pocket / shirt.<br><br>\r\n\r\n<b>Departure Lounge</b><br>\r\n\r\nAfter reporting your departure in the reporting table, you can wait the departure time in Departure Lounge according to the location indicated on the Boarding Pass.\r\n</p>', 1),
(7, 'p07', 'Panduan Transit', 'Transits Guide', '<br> 1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" menuju konter transit dan transfer untuk melakukan pelaporan diri dan pemeriksaan dokumen penerbangan sesuai maskapai penerbangan Anda.\r\n<br> 2. Penumpang transit dan transfer tidak perlu keluar untuk mengurus kepabeanan (Custom, Imigration & Quarantine)\r\n<br> 3. Setelah pemeriksaan keamanan, Anda dapat langsung menuju ruang tunggu keberangkatan di lantai 3 (tiga) dengan menggunakan elevator untuk menunggu waktu naik pesawat (boarding time)\r\n<br>', '<br>\r\n1. When arrive at the arrival terminal, follow the \"arrival\" instructions to the transit counter and transfer to self-reporting and document checking your airline\'s flight.\r\n<br>\r\n2. Transit and transfer passengers do not need to go out to do the inspection Security (unless necessary)<br>\r\n3. After the inspection, you can go directly to the departure lounge to wait on the boarding time.<br>', 1),
(8, 'p08', 'Panduan Imigrasi', 'Immigration Guide', '<br> 1. Meja  imigrasi dibagi menjadi beberapa bagian untuk warga negara Indonesia dan pengunjung.\r\n<br> 2. Pengunjung yang masuk Indonesia diwajibkan untuk menyerahkan form declare.\r\n<br> 3. Pemegang  paspor Indonesia tidak diharuskan untuk mengisi form declare.\r\n<br> 4. Jika anda berasal dari Negara yang tanpa bebas VISA,  maka anda harus membayar biaya sesuai dengan ketentuan yang berlaku. \r\n<br> 5. Penumpang disarankan untuk antri di meja imigrasi dan menyiapkan dokumen perjalanan (paspor, kartu kedatangan dan dokumen lainnya). Petugas Imigrasi akan memverifikasi ID foto Anda dan mungkin bertanya beberapa pertanyaan sesuai dengan prosedur screening. kerjasama Anda sangat dihargai\r\n<br>', '<br> 1. The immigration table is divided into sections for Indonesian citizens and visitors.\r\n<br> 2. Visitors who enter Indonesia are required to submit a declare form.\r\n<br> 3. Indonesian passport holders are not required to fill in the declare form.\r\n<br> 4. If you are from a country without VISA-free, then you must pay a fee in accordance with applicable regulations.\r\n<br> 5. Passengers are advised to queue at the immigration desk and prepare travel documents (passport, arrival card and other documents). The Immigration Officer will verify your photo ID and may ask a few questions according to the screening procedure. Your cooperation is greatly appreciated<br>', 1),
(9, 'p09', 'Panduan Karantina', 'Quarantine Guide', '<br>Karantina dan sertifikasi untuk penumpang, hewan, dan tumbuhan akan diperiksa di sini. Silahkan memverifikasi persyaratan yang relevan sebelum bepergian.\r\n<br><br>\r\n \r\n\r\nCatatan: Prosedur Karantina harus diselesaikan sebelum check-in untuk mempercepat prosedur check-in<br>', '<br>Quarantine and certification for passengers, animals and plants will be examined here. Please verify the relevant requirements before traveling.<br><br>\r\n\r\n \r\n\r\nNote: Quarantine procedures must be completed before check-in to speed up check-in procedures<br>', 1),
(10, 'p10', 'Pendampingan Khusus', 'Special Assistance', '<br>Jika Anda memiliki permintaan khusus atau memerlukan bentuk bantuan pada penerbangan Anda, mitra maskapai kami akan membantu Anda. Atau, hubungi telepon layanan 24-jam di +62 21 172.<br>', '<br>If you have special requests or need a form of assistance on your flight, our airline partners will help you. Or, call 24-hour telephone service at +62 21 172.<br>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@ap1.com', '$2y$10$X3nDjq2dJZBTsG.Vx8qwLOVcN3k2kisrmXdGP9kJhuHJiTSy.67b6', '2019-09-15 22:50:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `qrname` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `qr`
--

INSERT INTO `qr` (`id`, `qrname`, `foto`, `status`) VALUES
(8, 'qr-1572511004.png', '1572511004.png', 1),
(9, 'qr-1572913869.png', '1572913869.png', 1),
(10, 'qr-1573030306.png', '1573030306.png', 1),
(11, 'qr-1573350814.png', '1573350814.png', 1),
(12, 'qr-1573861086.png', '1573861086.png', 1),
(13, 'qr-1573862987.png', '1573862987.png', 1),
(14, 'qr-1573869997.png', '1573869997.png', 1),
(15, 'qr-1574160295.png', '1574160295.png', 1),
(16, 'qr-1574729994.png', '1574729994.png', 1),
(17, 'qr-1574734653.png', '1574734653.png', 1),
(18, 'qr-1576287493.png', '1576287492.png', 1),
(19, 'qr-1576677453.png', '1576677453.png', 1),
(20, 'qr-1578229090.png', '1578229090.png', 1),
(21, 'qr-1578906764.png', '1578906764.png', 1),
(22, 'qr-1578972389.png', '1578972389.png', 1),
(23, 'qr-1579359248.png', '1579359247.png', 1),
(24, 'qr-1580269778.png', '1580269778.png', 1),
(25, 'qr-1580269850.png', '1580269850.png', 1),
(26, 'qr-1580720942.png', '1580720942.png', 1),
(27, 'qr-1580783179.png', '1580783179.png', 1),
(28, 'qr-1582510490.png', '1582510489.png', 1),
(29, 'qr-1582510555.png', '1582510555.png', 1),
(30, 'qr-1582768079.png', '1582768079.png', 1),
(31, 'qr-1582859985.png', '1582859985.png', 1),
(32, 'qr-1583563762.png', '1583563762.png', 1),
(33, 'qr-1583582427.png', '1583582427.png', 1),
(34, 'qr-1583644437.png', '1583644437.png', 1),
(35, 'qr-1657602005.png', '1657602005.png', 1),
(36, 'qr-1658990802.png', '1658990802.png', 1),
(37, 'qr-1659001121.png', '1659001121.png', 1),
(38, 'qr-1659001354.png', '1659001354.png', 1),
(39, 'qr-1659076840.png', '1659076840.png', 1),
(40, 'qr-1659236855.png', '1659236855.png', 1),
(41, 'qr-1659521282.png', '1659521282.png', 1),
(42, 'qr-1661049061.png', '1661049060.png', 1),
(43, 'qr-1665291988.png', '1665291988.png', 1),
(44, 'qr-1666927008.png', '1666927008.png', 1),
(45, 'qr-1667110631.png', '1667110631.png', 1),
(46, 'qr-1670409198.png', '1670409197.png', 1),
(47, 'qr-1670815925.png', '1670815925.png', 1),
(48, 'qr-1670815945.png', '1670815945.png', 1),
(49, 'qr-1671973305.png', '1671973305.png', 1),
(50, 'qr-1672461858.png', '1672461858.png', 1),
(51, 'qr-1673493479.png', '1673493479.png', 1),
(52, 'qr-1675639482.png', '1675639482.png', 1),
(53, 'qr-1675664203.png', '1675664203.png', 1),
(54, 'qr-1677569309.png', '1677569309.png', 1),
(55, 'qr-1677820477.png', '1677820477.png', 1),
(56, 'qr-1677820530.png', '1677820530.png', 1),
(57, 'qr-1679717580.png', '1679717579.png', 1),
(58, 'qr-1681524855.png', '1681524855.png', 1),
(59, 'qr-1681993173.png', '1681993173.png', 1),
(60, 'qr-1682995900.png', '1682995900.png', 1),
(61, 'qr-1683004758.png', '1683004758.png', 1),
(62, 'qr-1683162663.png', '1683162663.png', 1),
(63, 'qr-1683414094.png', '1683414094.png', 1),
(64, 'qr-1683595983.png', '1683595983.png', 1),
(65, 'qr-1683632119.png', '1683632119.png', 1),
(66, 'qr-1684810185.png', '1684810185.png', 1),
(67, 'qr-1686196007.png', '1686196007.png', 1),
(68, 'qr-1687065896.png', '1687065896.png', 1),
(69, 'qr-1688626993.png', '1688626993.png', 1),
(70, 'qr-1689138155.png', '1689138155.png', 1),
(71, 'qr-1689331478.png', '1689331478.png', 1),
(72, 'qr-1689331497.png', '1689331497.png', 1),
(73, 'qr-1689666308.png', '1689666307.png', 1),
(74, 'qr-1690420201.png', '1690420200.png', 1),
(75, 'qr-1690943237.png', '1690943237.png', 1),
(76, 'qr-1691938901.png', '1691938901.png', 1),
(77, 'qr-1691938930.png', '1691938930.png', 1),
(78, 'qr-1692497095.png', '1692497095.png', 1),
(79, 'qr-1692857963.png', '1692857963.png', 1),
(80, 'qr-1693189838.png', '1693189838.png', 1),
(81, 'qr-1693306758.png', '1693306758.png', 1),
(82, 'qr-1694244874.png', '1694244874.png', 1),
(83, 'qr-1694571059.png', '1694571058.png', 1),
(84, 'qr-1710294220.png', '1710294220.png', 1),
(85, 'qr-1710910201.png', '1710910201.png', 1),
(86, 'qr-1712122294.png', '1712122294.png', 1),
(87, 'qr-1712239162.png', '1712239162.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `special_asistence`
--

CREATE TABLE `special_asistence` (
  `id` int(11) NOT NULL,
  `poss_id` varchar(250) NOT NULL,
  `name_en` varchar(250) DEFAULT NULL,
  `name` text NOT NULL,
  `deskripsi_en` text,
  `type` int(1) NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `deskripsi` text NOT NULL,
  `video` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `special_asistence`
--

INSERT INTO `special_asistence` (`id`, `poss_id`, `name_en`, `name`, `deskripsi_en`, `type`, `image`, `status`, `deskripsi`, `video`) VALUES
(1, 'poss001', 'Nursing Room', 'Ruangan Menyusui', 'If your baby is traveling with you, you can bring breast milk on the plane. If not, you need to store milk in containers that do not exceed 100ml. therefore we provide space for mothers who want to breastfeed their children.', 1, 'babymilk.png', 1, 'Jika bayi Anda bepergian dengan Anda, Anda dapat membawa ASI di dalam pesawat. Jika tidak, Anda perlu menyimpan susu dalam wadah yang tidak melebihi 100ml. maka dari itu kami menyediakan ruang untuk ibu yang ingin menyusui anaknya.', NULL),
(2, 'poss002', 'Strollers', 'Kereta Bayi', 'You may loan strollers, on a first-come first-served basis. \r\nFrom our Information and Customer Service: 172', 1, 'bayi.png', 1, 'Anda dapat meminjamkan kereta bayi, berdasarkan siapa cepat dia dapat. Dari Informasi dan Layanan Pelanggan kami: 172', ''),
(3, 'poss003', 'Unaccompanied Minor Service', 'Layanan tanpa pendamping', 'If your child is below the age of 12 and travelling alone, you can contact your airline for unaccompanied minor service. ', 1, 'pramugari.png', 1, 'Jika anak Anda berusia di bawah 12 tahun dan bepergian sendirian, Anda dapat menghubungi maskapai Anda untuk layanan kecil tanpa pendamping.', ''),
(4, 'poss004', 'Requesting for Special Assistance', 'Meminta Bantuan Khusus', 'You may require additional assistance at the airport if you have any disability, mobility difficulties, or are travelling with an assistance dog or personal mobility aids.</br>\r\n<br>To request for special assistance please advise your travel agent and /or airline at the point of booking or get in touch with the airline at least 48 hours before flight departure. You are encouraged to get in touch with your airline as early as possible.</br>\r\n<br>*Each airline at Ahmad Yani Airport may have differing rules and regulations on booking of special assistance. Additional charges may apply depending on the airline. Passengers are advised to contact their own airline for further information before they travel. ', 2, 'call_center.png', 1, 'Anda mungkin memerlukan bantuan tambahan di bandara jika Anda memiliki cacat, kesulitan mobilitas, atau bepergian dengan anjing bantuan atau alat bantu mobilitas pribadi. </br> <br> Untuk meminta bantuan khusus, harap beri tahu agen perjalanan Anda dan / atau maskapai penerbangan pada saat pemesanan atau hubungi maskapai setidaknya 48 jam sebelum keberangkatan. Anda disarankan untuk menghubungi maskapai Anda sedini mungkin. </br> <br> * Setiap maskapai di Bandara Ahmad Yani mungkin memiliki aturan dan regulasi yang berbeda dalam pemesanan bantuan khusus. Biaya tambahan mungkin berlaku tergantung pada maskapai. Penumpang disarankan untuk menghubungi maskapai penerbangan mereka sendiri untuk informasi lebih lanjut sebelum mereka bepergian.', 'customer.mp4'),
(5, 'poss005', 'Wheelchairs', 'Kursi Roda', 'If you require a wheelchair, you may make a request from our Information and Customer Service counters offer wheelchairs to passengers on a complimentary and first-come first-served basis.\r\nFrom our Information and Customer Service: 172\r\n', 2, 'wheelchair.png', 1, 'Jika Anda memerlukan kursi roda, Anda dapat mengajukan permintaan dari bagian Informasi dan Layanan Pelanggan kami menawarkan kursi roda untuk penumpang secara gratis dan layanan first-first-first-served. Dari Informasi dan Layanan Pelanggan kami: 172', ''),
(6, 'poss006', 'Airlines Assistance', 'Bantuan Penerbangan', 'List of Airlines.<br> 1. Lion Group (lion air batik, wings)<br>2. Garuda (Garuda Indonesia, Citilink)\r\n<br>3. Sriwijaya (Sriwijaya air, NAM Air)\r\n<br>4. Trigana\r\n<br>5. Silk Air\r\n<br>6. Air Asia', 3, '', 1, 'Daftar maskapai. <br> 1. Lion Group (lion air batik, wings) <br> 2. Garuda (Garuda Indonesia, Citilink) <br> 3. Sriwijaya (Sriwijaya air, NAM Air) <br> 4. Trigana <br> 5. Silk Air <br> 6. Air Asia', ''),
(7, 'poss007', 'Family Facilities', 'Fasilitas Keluarga', 'From playgrounds to baby care rooms, we have all you need to entertain and take care of your kids. Find out what we offer at each terminal. ', 1, 'fasilitas.png', 1, 'Dari taman bermain hingga kamar perawatan bayi, kami memiliki semua yang Anda butuhkan untuk menghibur dan merawat anak-anak Anda. Cari tahu apa yang kami tawarkan di setiap terminal.', ''),
(8, 'poss008', 'Accessible Drop-Off Points', 'titik perhentian pengemudi', 'Accessible parking space:<br>\r\n\r\nEligible drivers with Class 1 and Class 2 labels (only for drivers with persons with disabilities on board the car) may choose to pre-book* accessible parking space in the car parks at Terminal 2, 3 and 4. ', 2, 'disable.png', 1, 'Tempat parkir yang dapat diakses:</br>  Pengemudi yang memenuhi syarat dengan label Kelas 1 dan Kelas 2 (hanya untuk pengemudi penyandang cacat di atas mobil) dapat memilih untuk memesan di muka * tempat parkir yang dapat diakses di tempat parkir di Terminal 2, 3 dan 4.', ''),
(9, 'poss009', 'Porter Service', 'Service Porter', 'A porter service is available at all terminals to help you with your baggage, when departing from or arriving in Ahmad Yani Airport. Please make your booking at least 4 hours before your flight departs or arrives.\r\nFrom our Information and Customer Service: 172\r\n', 2, 'porter.png', 1, 'Layanan porter tersedia di semua terminal untuk membantu Anda dengan bagasi Anda, ketika berangkat dari atau tiba di Bandara Ahmad Yani. Silakan melakukan pemesanan Anda setidaknya 4 jam sebelum penerbangan Anda berangkat atau tiba. Dari Informasi dan Layanan Pelanggan kami: 172', 'troly.mp4'),
(10, 'poss010', 'Security Screening', 'Penyaringan Keamanan', 'security screening of passengers and baggage before boarding or loading an aircraft is an important security layer and is the responsibility of authorized screening authorities. Find more information about aviation security screening standards and the responsibilities of screening authorities below.', 2, 'security.png', 1, 'penyaringan keamanan penumpang dan bagasi sebelum naik atau memuat pesawat terbang adalah lapisan keamanan yang penting dan merupakan tanggung jawab otoritas penyaringan yang berwenang. Temukan informasi lebih lanjut tentang standar penyaringan keamanan penerbangan dan tanggung jawab otoritas penyaringan di bawah ini.', ''),
(11, 'poss011', 'Public Transport Accessibility', 'Akses Transportasi Umum', 'Public Transport Accessibilty<br>\r\n\r\nAccessibility is the suitability of the public transport network to get individuals from their system entry point to their system exit location in a reasonable amount of time. Thus, accessibility encompasses the operational functioning of a system for regional travel.', 2, 'publictransport.png', 1, 'Aksesibilitas Transportasi Umum<br>Aksesibilitas adalah kesesuaian jaringan transportasi umum untuk mendapatkan individu dari titik masuk sistem mereka ke lokasi keluar sistem mereka dalam jumlah waktu yang wajar. Dengan demikian, aksesibilitas mencakup fungsi operasional sistem untuk perjalanan regional.', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jalur`
--

CREATE TABLE `tabel_jalur` (
  `id_jalur` int(11) NOT NULL,
  `nama_jalur` varchar(255) NOT NULL,
  `nomor_jalur` int(11) DEFAULT NULL,
  `lantai_jalur` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `logo_jalur` varchar(255) DEFAULT NULL,
  `video_jalur` varchar(255) DEFAULT NULL,
  `link_jalur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_jalur`
--

INSERT INTO `tabel_jalur` (`id_jalur`, `nama_jalur`, `nomor_jalur`, `lantai_jalur`, `type`, `logo_jalur`, `video_jalur`, `link_jalur`) VALUES
(3, 'KOPITIAM', 1, 1, 'tenant', '1775390441_Kopitiam.png', '1775790367_1.mp4', ''),
(4, 'PickupZone', 1, 1, 'pickupzone', 'logo_1774877194.png', 'video_1774877194.mp4', 'PickupZone.html'),
(5, 'BaseusOlike', 2, 1, 'tenant', 'logo_1774877883.png', 'video_1774877883.mp4', 'BaseusOlike.html'),
(6, 'Solaria', 3, 1, 'tenant', '1774923328_solaria.png', '1774886873_3.mp4', 'no3.html'),
(7, 'Tirta Gift Shop', 4, 1, 'tenant', 'logo_1774892073.png', 'video_1774892073.mp4', 'TirtaGiftShop.html'),
(8, 'Alfa Express', 5, 1, 'tenant', 'logo_1774892647.png', 'video_1774892647.mp4', 'AlfaExpress.html'),
(9, 'Temara', 6, 1, 'tenant', 'logo_1774892982.png', 'video_1774892982.mp4', 'Temara.html'),
(10, 'BaksoIbuKota', 7, 1, 'tenant', 'logo_1774920503.png', 'video_1774920503.mp4', 'BaksoIbuKota.html'),
(11, 'ReadyMeal', 8, 1, 'tenant', 'logo_1774921131.png', 'video_1774921132.mp4', 'ReadyMeal.html'),
(12, 'Puyo', 9, 1, 'tenant', 'logo_1774921368.png', 'video_1774921368.mp4', 'Puyo.html'),
(13, 'Dunkin', 10, 1, 'tenant', 'logo_1774921546.png', 'video_1774921546.mp4', 'Dunkin.html'),
(14, 'KopiKenangan', 11, 1, 'tenant', 'logo_1774921952.png', 'video_1774921952.mp4', 'KopiKenangan.html'),
(15, 'Rotio', 12, 1, 'tenant', 'logo_1774922293.png', 'video_1774922293.mp4', 'Rotio.html'),
(16, 'GaleriUKM', 13, 1, 'tenant', 'logo_1774922492.png', 'video_1774922492.mp4', 'GaleriUKM.html'),
(17, 'AW', 14, 1, 'tenant', 'logo_1774922699.png', 'video_1774922699.mp4', 'AW.html'),
(18, 'Antarestar', 15, 1, 'tenant', 'logo_1774923022.png', 'video_1774923022.mp4', 'Antarestar.html'),
(19, 'IndomaretPoint', 16, 1, 'tenant', 'logo_1774923529.png', 'video_1774923529.mp4', 'IndomaretPoint.html'),
(20, 'idle', 17, 1, 'tenant', '', 'video_1774923632.mp4', 'no17.html'),
(22, 'PickupZone', 2, 1, 'pickupzone', 'logo_1774924030.png', 'video_1774924030.mp4', 'PickupZone.html'),
(23, 'PickupZone', 3, 1, 'pickupzone', 'logo_1774924195.png', 'video_1774924195.mp4', 'PickupZone.html'),
(24, 'PickupZone', 4, 1, 'pickupzone', 'logo_1774924347.png', 'video_1774924347.mp4', 'PickupZone.html'),
(25, 'PickupZone', 5, 1, 'pickupzone', 'logo_1774924604.png', 'video_1774924604.mp4', 'PickupZone.html'),
(26, 'Seni&RasaSemarang', 1, 2, 'tenant', 'logo_1774931873.png', '1784773556_1 REVISI.mp4', ''),
(27, 'WE CLOTH', 2, 2, 'tenant', 'logo_1774944246.png', '1784773621_2 REVISI.mp4', ''),
(28, 'Polo', 3, 2, 'tenant', 'logo_1775039047.png', '1784707278_3 REVISI.mp4', ''),
(29, 'BaksoIbuKota', 4, 2, 'tenant', 'logo_1775039234.png', '1784707324_4 REVISI.mp4', ''),
(30, 'THE FIELD', 5, 2, 'tenant', 'logo_1777286085_TheField.png', '1784773641_5 REVISI.mp4', ''),
(31, 'Anantari', 6, 2, 'tenant', 'logo_1784779744_images.jpg', '1784707424_6 REVISI.mp4', ''),
(32, 'Soerabaja', 7, 2, 'tenant', 'logo_1784778699_soerabajacafe.png', '1784707560_7 REVISI.mp4', ''),
(33, 'Starbuck', 8, 2, 'tenant', 'logo_1775039869.png', '1784773672_8 REVISI.mp4', ''),
(34, 'MOSQUE', 1, 2, 'fasilitas', '1775788769_masjid.png', '1775788769_MOSQUE.mp4', ''),
(36, 'kopitiam', 1, 4, 'tenant', 'logo_1777356148_Kopitiam.png', '1776399664_1.mp4', ''),
(37, 'CIP LOUNGE', 1, 3, 'fasilitas', 'logo_1775235149.png', '1776935734_ciplounge.mp4', ''),
(39, 'CUSTOMER SERVICE', 1, 1, 'fasilitas', '1776049935_cs.png', '1776049935_customerS.mp4', ''),
(40, 'TOILET', 2, 1, 'fasilitas', '1776050039_toilet.png', '1776050039_toilet.mp4', ''),
(41, 'Teh Poci', 18, 1, 'tenant', 'logo_1775389642.png', 'video_1775389642.mp4', ''),
(42, 'Tirta Gift Shop', 9, 2, 'tenant', 'logo_1784778743_tirtagiftshop.png', '1784708242_9 REVISI.mp4', ''),
(43, 'TOILET ', 3, 3, 'fasilitas', 'logo_1775525909.png', '1776935763_toilet.mp4', ''),
(44, 'TOILET', 1, 4, 'fasilitas', 'logo_1775526020.png', '1776400555_toilet.mp4', ''),
(45, 'baseus&olike', 2, 4, 'tenant', 'logo_1776399452_baseus & olike.png', '1776399703_2.mp4', ''),
(46, 'Beauty Center', 10, 2, 'tenant', 'logo_1775787058.png', '1784773690_10 REVISI.mp4', ''),
(47, 'Reivan', 11, 2, 'tenant', 'logo_1784778768_reivanartgallery.png', '1784708294_11 REVISI.mp4', ''),
(48, 'Eatmood', 12, 2, 'tenant', 'logo_1784778791_wanwan.png', '1784708421_12 REVISI.mp4', ''),
(49, 'De Wave', 13, 2, 'tenant', 'logo_1784778819_de wave.png', '1784708498_13 REVISI.mp4', ''),
(50, 'CUSTOMER SERVICE', 2, 2, 'fasilitas', 'logo_1775787855.png', 'video_1775787855.mp4', ''),
(51, 'IMMIGRATION', 3, 2, 'fasilitas', 'logo_1775787979.png', 'video_1775787979.mp4', ''),
(52, 'TOILET', 4, 2, 'fasilitas', 'logo_1775788630.png', 'video_1775788630.mp4', ''),
(53, 'LANTAI 3', 5, 2, 'fasilitas', 'logo_1775789027.png', 'video_1775789027.mp4', ''),
(54, 'PLAYGROUND KIDS', 6, 2, 'fasilitas', 'logo_1775789136.png', 'video_1775789136.mp4', ''),
(55, 'FLIGHT GATE', 7, 2, 'fasilitas', 'logo_1775789259.png', 'video_1775789259.mp4', ''),
(56, 'INTERNET CORNER', 8, 2, 'fasilitas', 'logo_1775789306.png', 'video_1775789306.mp4', ''),
(57, 'READING CORNER', 9, 2, 'fasilitas', 'logo_1775789377.png', 'video_1775789377.mp4', ''),
(58, 'Tirta Food Court', 14, 2, 'tenant', 'logo_1784778847_tirtafoodcourt.png', '1784708526_14 REVISI.mp4', ''),
(59, 'Ramyeon', 15, 2, 'tenant', 'logo_1784778871_ramyeon.png', '1784708621_15 REVISI.mp4', ''),
(60, 'Olike', 16, 2, 'tenant', 'logo_1784778933_olike.png', '1784708654_16 REVISI.mp4', ''),
(61, 'Periplus', 17, 2, 'tenant', 'logo_1784778950_periplus.png', '1784708738_17 REVISI.mp4', ''),
(62, 'Indomaret', 18, 2, 'tenant', 'logo_1784778973_indomaretpoint.png', '1784708766_18 REVISI.mp4', ''),
(63, 'Tjentik Manis', 19, 2, 'tenant', 'logo_1784873985_WhatsApp Image 2026-07-24 at 13.19.00.jpeg', '1784708824_19 REVISI.mp4', ''),
(64, 'Roti\'O', 20, 2, 'tenant', 'logo_1784779032_rotio.png', '1784708860_20 REVISI.mp4', ''),
(65, 'Reivan', 21, 2, 'tenant', 'logo_1784779056_reivanartgallery.png', '1784708907_21 REVISI.mp4', ''),
(71, 'PLAYGROUND KIDS', 6, 3, 'fasilitas', 'logo_1776239557.png', '1776935820_playgroundkids.mp4', ''),
(72, 'blue bird', 1, 4, 'pickupzone', 'logo_1776240029.png', 'video_1776240029.mp4', ''),
(73, 'yellow bird', 2, 4, 'pickupzone', 'logo_1776240079.png', 'video_1776240079.mp4', ''),
(74, 'airport taxi', 3, 4, 'pickupzone', 'logo_1776240178.png', 'video_1776240178.mp4', ''),
(75, 'GRAB MAXIM', 4, 4, 'pickupzone', 'logo_1776240279.png', 'video_1776240279.mp4', ''),
(76, 'DAY TRANS', 6, 4, 'pickupzone', 'logo_1776240332.png', 'video_1776240332.mp4', ''),
(79, 'solaria', 3, 4, 'tenant', 'logo_1776399621.png', '1777284174_3.mp4', ''),
(80, 'tirta gift shop', 4, 4, 'tenant', 'logo_1776399778.png', '1777284290_4.mp4', ''),
(81, 'alfa express', 5, 4, 'tenant', 'logo_1776399835.png', '1777284342_5.mp4', ''),
(82, 'temara', 6, 4, 'tenant', 'logo_1776399873.png', '1777284432_6.mp4', ''),
(83, 'bakso ibukota', 7, 4, 'tenant', 'logo_1776399949.png', '1777284492_7.mp4', ''),
(84, 'ready meal', 8, 4, 'tenant', 'logo_1776399987.png', '1777284551_8.mp4', ''),
(85, 'puyo', 9, 4, 'tenant', 'logo_1776400021.png', '1777284590_9.mp4', ''),
(86, 'dunkin', 10, 4, 'tenant', 'logo_1776400050.png', '1777284632_10.mp4', ''),
(87, 'kopi kenangan', 11, 4, 'tenant', 'logo_1776400096.png', '1777284685_11.mp4', ''),
(88, 'roti\'o', 12, 4, 'tenant', 'logo_1776400150.png', '1777284725_12.mp4', ''),
(89, 'galeri ukm', 13, 4, 'tenant', 'logo_1776400192.png', '1777284778_13.mp4', ''),
(90, 'A&W', 14, 4, 'tenant', 'logo_1776400233.png', '1777284819_14.mp4', ''),
(91, 'antarestar', 15, 4, 'tenant', 'logo_1776400285.png', '1777284863_15.mp4', ''),
(92, 'indomaretpoint', 16, 4, 'tenant', 'logo_1776400336.png', '1777284907_16.mp4', ''),
(93, 'idle', 17, 4, 'tenant', '', '1777284944_17.mp4', ''),
(94, 'tenpoci', 18, 4, 'tenant', 'logo_1776400457.png', '1777284977_18.mp4', ''),
(95, 'customer service', 2, 4, 'fasilitas', 'logo_1776400636.png', '1777285368_cs.mp4', ''),
(96, 'atm', 3, 4, 'fasilitas', 'logo_1776400694.png', '1777285227_atm.mp4', ''),
(97, 'mosque', 4, 4, 'fasilitas', 'logo_1776400799.png', '1777285289_MOSQUE.mp4', ''),
(98, 'ATM', 3, 1, 'fasilitas', 'logo_1777014681_atm.png', '1777285913_atm.mp4', ''),
(99, 'MOSQUE', 4, 3, 'fasilitas', 'logo_1776935129_masjid.png', '1776935794_mosque.mp4', ''),
(100, 'LANTAI 2', 5, 3, 'fasilitas', 'logo_1776935957.png', 'video_1776935957.mp4', ''),
(101, 'MAKAROV COFFE', 1, 3, 'tenant', 'logo_1777282753_Makarov Coffe (1).png', 'video_1776936099.mp4', ''),
(102, 'LANTAI 1', 7, 3, 'fasilitas', 'logo_1777346244_lantai1.png', '1777285104_inter-lantai1.mp4', ''),
(103, 'CONVENIENCE GO', 2, 3, 'tenant', 'logo_1777282710_convenience go (1).png', 'video_1776936685.mp4', ''),
(104, 'Lantai 2', 4, 1, 'fasilitas', 'logo_1777253347_lantai2.png', '1777285969_lantai1-2.mp4', ''),
(105, 'QUARANTINE', 5, 1, 'fasilitas', 'logo_1777280139.png', 'video_1777280139.mp4', ''),
(106, 'MOSQUE', 6, 1, 'fasilitas', 'logo_1777282492.png', 'video_1777282492.mp4', ''),
(107, 'Lantai  3', 7, 1, 'fasilitas', 'logo_1777283860.png', '1777284045_lantai1-3.mp4', ''),
(108, 'INTERNASIONAL', 8, 1, 'fasilitas', 'logo_1777284098.png', 'video_1777284098.mp4', ''),
(109, 'CHECK-IN AREA', 9, 1, 'fasilitas', 'logo_1777284387.png', 'video_1777284387.mp4', ''),
(110, 'DROP ZONE', 10, 1, 'fasilitas', 'logo_1777284450.png', 'video_1777284450.mp4', ''),
(111, 'ARRIVAL AREA', 11, 1, 'fasilitas', 'logo_1777284603.png', 'video_1777284603.mp4', ''),
(112, 'SMOKING AREA', 12, 1, 'fasilitas', 'logo_1777284769.png', 'video_1777284769.mp4', ''),
(113, 'CIP LOUNGE', 13, 1, 'fasilitas', 'logo_1777284890.png', 'video_1777284890.mp4', ''),
(114, 'PEMDA JAWA TENGAH', 14, 1, 'fasilitas', 'logo_1777285011.png', 'video_1777285011.mp4', ''),
(115, 'DISPLAY INFORMATION', 15, 1, 'fasilitas', 'logo_1777285642_display infomation.png', 'video_1777285568.mp4', ''),
(118, 'Istana Mie', 23, 2, 'tenant', 'logo_1784779080_istanamie&mie.png', '1784708974_23 REVISI.mp4', ''),
(120, ' IDLE', 22, 2, 'tenant', '', '1784780530_22 REVISI.mp4', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenants_fasilitas`
--

CREATE TABLE `tenants_fasilitas` (
  `no` int(11) NOT NULL,
  `poss_id` varchar(250) NOT NULL,
  `name_tenant` varchar(250) NOT NULL,
  `lantai_1` tinyint(1) NOT NULL,
  `lantai_2` tinyint(1) NOT NULL,
  `mezanine` tinyint(1) NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi_en` text NOT NULL,
  `type` int(1) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tenants_fasilitas`
--

INSERT INTO `tenants_fasilitas` (`no`, `poss_id`, `name_tenant`, `lantai_1`, `lantai_2`, `mezanine`, `deskripsi`, `deskripsi_en`, `type`, `image`, `status`) VALUES
(1, 'poss001', 'TRAC', 1, 0, 0, 'Untuk pengunjung yang bingung saat sampai di Bandara Internasional Jenderal Ahmad Yani Semarang tidak ada yang menjemput, tenang saja, dengan Trac perjalanan anda lebih mudah. \r\n\r\nJenis Usaha : SERVICES\r\n\r\nLokasi : Area Baggage Claim\r\n\r\nJam Operasional : 08:00 WIB – 15:00 WIB\r\n\r\nKontak : 085363762284\r\n\r\nEmail : milissalesrentalsemarang@trac.astra.co.id \r\n\r\nWebsite : www.trac.astra.co.id ', 'For visitors who are confused when they arrive at General Ahmad Yani International Airport, Semarang, no one is picking them up, don\'t worry, with Trac, your trip will be easier.\r\n\r\n\r\nBusiness Type : SERVICES\r\nLocation : Baggage Claim Area\r\nOperational Hours: 08:00 WIB – 15:00 WIB\r\nContact : 085363762284\r\nEmail : milissalesrentalsemarang@trac.astra.co.id\r\nWebsite : www.trac.astra.co.id', 1, 'trac.jpg', 1),
(2, 'poss002', 'Total Baggage Solution', 1, 0, 0, '“Travel Easily Without Your Baggage” sesuai namanya, layanan baru ini memberikan kemudahan terkait pengiriman Barang bawaan atau Bagasi, tanpa repot dan ribet, sekaligus bisa mengirim bagasi sahabat semua sampai ke alamat rumah loh!\r\n\r\nLayanan ini merupakan pengembangan dari Total Baggage Solution yang sudah beroperasi di Area Check In, dan dikelola oleh Angkasa Pura Logistik, yang sebelumnya juga sudah mempunyai jasa layanan Baggage Wrapping dan Box Strapping.\r\n\r\nLayanan ini juga bisa mengakomodir semisal sahabat waktu check in di maskapai, kemudian mengalami Over Baggage dari ketentuan maskapai yang bersangkutan, kalian bisa nih menggunakan jasa layanan ini, dijamin barang bawaan atau bagasi sahabat semua terhandle dan terkirim dengan aman, praktis dan mudah. Kalian bisa memilih pick up di bandara tujuan ataupun bisa delivery sampai alamat rumah.\r\n\r\nOh iya satu, di sini juga bisa melayani penitipan atau loker barang bagasi.\r\n\r\nTravelling tanpa repot dan ribet? Bisa banget dong! Yuk kunjungi Total Baggage Solution!\r\n\r\nJenis Usaha : SERVICES \r\n\r\nLokasi : Cek In Area \r\n\r\nJam Operasional : 05:00 WIB – Last Flight\r\n\r\nKontak : 085200459888\r\n\r\nEmail : dicky.permana@aplog.co \r\n\r\nWebsite : www.aplog.co.id', '\"Travel Easily Without Your Baggage\" as the name implies, this new service provides convenience regarding the delivery of luggage or luggage, without the hassle and hassle, as well as being able to send all your friends\' luggage to your home address!\r\nThis service is a development of the Total Baggage Solution which is already operating in the Check In Area, and is managed by Angkasa Pura Logistik, which previously also had Baggage Wrapping and Box Strapping services.\r\nThis service can also accommodate, for example, friends when checking in at the airline, then experiencing Over Baggage from the provisions of the airline concerned, you can use this service, guaranteed that all of your luggage or luggage is handled and sent safely, practically and easily. You can choose to pick up at the destination airport or delivery to your home address.\r\nOh yes one, here can also serve luggage storage or lockers.\r\nTraveling without the hassle and hassle? You can do that! Come visit Total Baggage Solution!\r\n\r\n\r\nBusiness Type : SERVICES\r\nLocation: Check In Area\r\nOperational Hours: 05:00 WIB – Last Flight\r\nContact : 085200459888\r\nEmail : dicky.permana@aplog.co\r\nWebsite : www.aplog.co.id', 1, '1574219798_TBS.jpg', 1),
(3, 'poss003', 'KFC', 1, 0, 0, 'Pasti sudah tidak asing lagi dengan KFC. KFC kini membuka gerainya di Bandara Internasional Jenderal Ahmad Yani Semarang lho, letaknya ada di area Exhibition Hall lantai 1.\r\nBuat Kalian yang akan berangkat, baru datang, sedang mengantar ataupun sedang menjemput, boleh banget untuk mampir di Gerai KFC ini, ada beragam pilihan menu yang bisa Sahabat beli di sini loh, pilihannya nggak kalah lengkap sama yang tersedia di mall.\r\n\r\nJenis Usaha : Food & Beverage\r\n\r\nLokasi : Exhibition Hall\r\n\r\nJam Operasional : 05:00 WIB – Last Flight\r\n\r\nKontak : 08118657630\r\n\r\nEmail : bas@ffi.co.id \r\n\r\nWebsite : www.kfcku.com ', 'you must be familiar with KFC. KFC is now opening its outlet at Jenderal Ahmad Yani International Airport, Semarang, you know, it\'s located in the 1st floor Exhibition Hall area.\r\nFor those of you who are leaving, have just arrived, are delivering or picking up, it\'s really okay to stop by at this KFC outlet, there are various menu choices that friends can buy here, the choices are no less complete than those available at the mall.\r\nBusiness Type : Food & Beverage\r\nLocation: Exhibition Hall\r\nOperational Hours: 05:00 WIB – Last Flight\r\nContact : 08118657630\r\nEmail : bas@ffi.co.id\r\nWebsite : www.kfcku.com', 2, '1684313145_photo_2023-04-10_10-44-01.jpg', 1),
(4, 'poss004', 'MAGERSARI Food Court', 0, 1, 0, 'Food court yang menyediakan makanan khas daerah magersari.', 'Food court that provides food typical of the Magersari region.', 2, 'magersari.jpg', 0),
(5, 'poss005', 'BREADBAKER - DOMESTIK', 0, 1, 0, 'Sajian roti tidak sekadar untuk mengganjal perut tetapi juga soal cita rasa dan suasana. Bread Bakers menawarkan roti berkualitas dan tentunya fresh-baked untuk Anda yang akan melakukan perjalanan. Wangi aroma roti yang fresh dari oven menambah cita rasa tak terlupakan dan meninggalkan aftertaste yang khas.\r\n\r\nJenis Usaha : Food & Beverage\r\n\r\nLokasi : WAITING ROOM\r\n\r\nJam Operasional : 06:00 WIB – Last Flight\r\n\r\nKontak : 081329315061\r\n\r\nEmail : breadbakerssrg1823@gmail.com \r\n\r\nWebsite : http://www.aph.co.id ', 'Serving bread is not just to prop up the stomach but also a matter of taste and atmosphere. Bread Bakers offers quality bread and of course fresh-baked for those of you who are going on a trip. The smell of fresh bread from the oven adds an unforgettable taste and leaves a distinctive aftertaste.\r\n\r\nBusiness Type : Food & Beverage\r\nLocation: WAITING ROOM\r\nOperational Hours: 06:00 WIB – Last Flight\r\nContact : 081329315061\r\nEmail : breadbakerssrg1823@gmail.com\r\nWebsite : http://www.aph.co.id', 2, '1574219662_Bread Bakers Domestik.jpeg', 1),
(6, 'poss006', 'CONCORDIA LOUNGE', 0, 0, 1, 'Menunggu keberangkatan pesawat tidak lagi membosankan bersama Concordia Lounge. Ruang tunggu eksklusif yang akan memanjakan Anda dengan fasilitas bermutu dan privat. Selain tempat yang nyaman, kami juga menyediakan sajian cake, kopi, salad, bahkan masakan nusantara.\r\n\r\nPrice List : Reguler : Rp150.000,- VIP : Rp300.000,- Credit Card : Free\r\n\r\nJenis Usaha : SERVICES\r\n\r\nLokasi : Lantai 3\r\n\r\nJam Operasional : 06:00 WIB - Last Flight\r\n\r\nKontak : 081259476692\r\n\r\nEmail : concordialoungesrg@gmail.com \r\n\r\nWebsite : www.aph.co.id ', 'Waiting for flight departure is no longer boring with Concordia Lounge. An exclusive waiting room that will pamper you with quality and private facilities. Besides being a comfortable place, we also provide cakes, coffee, salads, and even Indonesian dishes.\r\n\r\nPrice List : Regular : IDR 150,000 VIP : IDR 300,000 Credit Card : Free\r\n\r\nBusiness Type : SERVICES\r\n\r\nLocation : Floor 3\r\n\r\nOperational Hours : 06:00 WIB - Last Flight\r\n\r\nContact : 081259476692\r\n\r\nEmail : concordialoungesrg@gmail.com\r\n\r\nWebsite : www.aph.co.id', 2, 'concordia.jpg', 1),
(7, 'poss007', 'INDOMARET POINT 1', 1, 0, 0, 'Indomaret Point tidak hanya tersedia di Ruang Tunggu Keberangkatan Domestik. Akan tetapi hadir juga di Exhibition Hall Lantai 1, sehingga buat kalian yang hanya mengantar bisa juga mengunjungi Indomaret Point yang ada di Bandara Internasional Ahmad Yani Semarang. \r\nJenis Usaha : RETAIL\r\n\r\nLokasi : Exhibition Hall\r\n\r\nJam Operasional : 05:00 WIB – Last Flight\r\n\r\nKontak : 082220440028\r\n\r\nEmail : kontak@indomaret.co.id \r\n\r\nWebsite : www.indomaret.co.id ', 'Indomaret Point is not only available in the Domestic Departure Lounge. However, they are also present at the 1st Floor Exhibition Hall, so those of you who are only driving can also visit the Indomaret Point at Ahmad Yani International Airport, Semarang.\r\n\r\n\r\nBusiness Type : RETAIL\r\nLocation: Exhibition Hall\r\nOperational Hours: 05:00 WIB – Last Flight\r\nContact : 082220440028\r\nEmail : Kontak@indomaret.co.id\r\nWebsite : www.indomaret.co.id', 1, '1684311919_INDOMARET LT.1 NEW.png', 1),
(8, 'poss008', 'KUKOMART 2', 0, 1, 0, 'Indomaret Point Bandar Udara Jenderal Ahmad Yani Semarang adalah sahabat kebutuhan Anda dalam perjalanan. Buat kalian yang ingin membeli snack, minuman ringan atau mungkin lagi butuh sesuatu yang kelupaan dibawa, dan kopi point kesayangan anda, sekarang nggak usah khawatir lagi deh. Indomaret Point siap melayani anda. \r\n\r\nJenis Usaha : RETAIL\r\nLokasi : WAITING ROOM\r\n\r\nJam Operasional : 05:00 WIB – Last Flight\r\nKontak : 082220440028\r\nEmail : kontak@indomaret.co.id\r\nWebsite : www.indomaret.co.id', 'Indomaret Point Jenderal Ahmad Yani Airport Semarang is your companion for your travel needs. For those of you who want to buy snacks, soft drinks or maybe you need something you forgot to bring, and your favorite coffee point, now you don\'t have to worry anymore. Indomaret Point is ready to serve you.\r\n\r\nBusiness Type : RETAIL\r\nLocation: WAITING ROOM\r\nOperational Hours: 05:00 WIB – Last Flight\r\nContact : 082220440028\r\nEmail : Kontak@indomaret.co.id\r\nWebsite : www.indomaret.co.id', 1, '1684313243_photo_2023-04-10_10-43-33.jpg', 1),
(9, 'poss009', 'BREADBAKER - INTERNASIONAL', 0, 0, 1, 'Food court yang menyediakan makanan khas daerah magersari.', 'Booth selling various kinds of bread, drinks and light snacks.', 2, '1574235352_bread baker international.jpg', 1),
(10, 'poss010', 'MY INDONESIA', 0, 1, 0, 'Booth penjualan makanan dan minuman khas Indonesia', 'Indonesian food and beverage sales booth', 1, 'indonesia.jpg', 1),
(11, 'poss011', 'BATIK KERIS', 0, 1, 0, 'Booth yang menjual berbagai koleksi produk batik modern dengan kualitas terbaik, kerajinan, dan oleh oleh khas Indonesia.', 'Booth that sells various collections of modern batik products of the highest quality, handicrafts, and by Indonesian specialties.', 1, 'batikkeris.jpg', 1),
(12, 'poss012', 'STARBUCKS', 0, 0, 1, 'Booth ternama yang menjual berbagai macam jenis kopi.', 'Famous booth that sells various types of coffee and snacks.', 2, '1574220037_starbuck.jpg', 1),
(13, 'poss013', 'EATON', 1, 0, 0, 'Eaton Bakery menyediakan berbagai kue, kue, roti, kue kering, gift set.', 'Eaton Bakery provides a variety of cakes, cakes, breads, pastries, gift sets.', 2, '1574661080_eatonbg.jpg', 1),
(14, 'poss014', 'PERIPLUS', 0, 1, 0, 'Ilmu pengetahuan dan hiburan tidak ada batasnya. Bahkan jika Anda sedang di bandara sekalipun. Periplus hadir di Bandar Udara Internasional Jenderal Ahmad Yani Semarang. Sembari menunggu penerbangan, pengunjung dapat menghabiskan waktu dengan membeli bahan bacaan, majalah, menambah pengetahuan tentang tempat - tempat yang akan dikunjungi. Selain buku dan majalah, Pengunjung juga bisa membeli perlengkapan gadget, seperti Headset, Casing Handphone, Powerbank, Travel Pillow, dan masih banyak pernak-pernik menarik lainnya.\r\n\r\nMenunggu penerbangan bukan lagi hal yang membosankan bersama PERIPLUS.\"\r\n\r\nJenis Usaha : Toko Buku / Bookshop\r\nLokasi : WAITING ROOM\r\nJam Operasional : 06:00 WIB – Last Flight \r\nKontak : +62 877-8286-6073\r\nEmail : pp603@periplus.co.id \r\nWebsite : www.periplus.com ', 'Science and entertainment have no boundaries. Even if you\'re at the airport though. Periplus is present at General Ahmad Yani International Airport in Semarang.\r\n\r\nWhile waiting for the flight, visitors can spend time buying reading materials, magazines, increasing knowledge about the places to be visited. Apart from books and magazines, visitors can also buy gadget equipment, such as headsets, cellphone cases, power banks, travel pillows, and many other interesting knick-knacks.\r\nWaiting for flights is no longer a boring thing with PERIPLUS.\"\r\n\r\nBusiness Type : Bookstore / Bookshop\r\nLocation: WAITING ROOM\r\nOperational Hours: 06:00 WIB – Last Flight\r\nContact : +62 877-8286-6073\r\nEmail : pp603@periplus.co.id\r\nWebsite : www.periplus.com', 1, '1684313400_photo_2023-04-10_10-43-37.jpg', 1),
(15, 'poss015', 'A&W', 1, 0, 0, 'Booth fast food yang menjual makanan cepat saji.', 'Fast food booth that sells special fast food such as chicken and other.', 2, '1574661020_awbg.JPG', 1),
(16, 'poss016', 'POLO', 0, 1, 0, 'Booth penjualan pakaian berbagai macam.', 'Booth various kinds of clothing sales.', 1, 'polo.jpg', 1),
(17, 'poss017', 'SOERABAJA CAFE', 0, 0, 0, 'Booth penjualan berbagai macam kopi dan snack ringan.', 'A booth selling various kinds of coffee and light snacks.', 2, 'soerabaja.jpg', 1),
(18, 'poss018', 'ROTI O', 0, 0, 0, 'Booth penjualan berbagai macam roti, minuman dan snack ringan.', 'A booth selling various kinds of coffee and light snacks.', 2, 'rotio.jpg', 0),
(19, 'poss019', 'IPORT', 0, 1, 0, 'Outlet penjualan resmi aksesoris berbagai macam.', 'Booth various kinds of accesories sales.', 1, 'portshop.jpg', 1),
(20, 'poss020', 'INDOCEV MONEY CHANGER', 1, 0, 0, 'Booth yang melayani penukaran uang cash.', 'A booth that serves cash exchange.', 1, 'moneychanger.jpg', 1),
(21, 'poss021', 'UMKM', 1, 0, 0, 'Booth yang menjual berbagai produk UMKM daerah.', 'Booth that sells a variety of regional UMKM products.', 1, '1574220100_umkm.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Angkasa Pura I', 'admin@ap1.com', 'users/default.png', NULL, '$2y$10$.jjjeyP8dXYRuzqjQla0XOcl/fAt8duf1bxGYfIJzFioqL0GsgZC6', NULL, '2019-10-14 06:35:04', '2019-10-14 06:35:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=Religi, 2=Budaya, 3=Alam',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci COMMENT 'Embed iframe Google Maps',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Aktif, 0=Nonaktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `deskripsi`, `type`, `image`, `qrlink`, `lokasi`, `status`, `created_at`, `updated_at`, `views`) VALUES
(2, 'Klenteng Sam Poo Kong', 'Kelenteng Gedung Kuno Sam Poo Kong (Hanzi: 三保洞, Sānbǎo Dòng) secara harfiah dapat diterjemahkan sebagai “Gua Tiga Perlindungan”, adalah sebuah kelenteng di Kota Semarang, Provinsi Jawa Tengah, Indonesia. Istilah “tiga perlindungan” merujuk pada doktrin Buddhisme tentang berlindung pada Triratna (bahasa Sanskerta) atau Tiratana (bahasa Pali), yaitu Buddha, Dharma, dan Sangha.\r\n\r\nDalam catatan Sejarah Dinasti Ming (明史) volume 304 mengenai “Akun Zeng He”, karakter “Pao” ditulis sebagai 保 (pǎo), yang berarti “perlindungan”. Karakter ini merupakan homonim yang disederhanakan dari 寶 (bǎo), yang bermakna “permata”. Konsep “tiga permata” tersebut bersumber dari istilah Buddhistik Sanskerta Triratna, yang merujuk pada Buddha (佛), Dharma (法), dan Sangha (僧).\r\n\r\nBerdasarkan pemahaman tersebut, wihara atau kelenteng Triratna yang terdapat di Asia Tenggara kerap dikaitkan dengan tokoh Cheng Ho dan oleh karena itu dianggap sebagai klenteng Cheng Ho.', 1, 'img_69f0760929aff0.47546363.jpg', 'img_69f17ccbaec093.43947718.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1133197516115!2d110.39591767499715!3d-6.995933493005224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b46faaaaaab%3A0xef7fe551fe13bd76!2sSAM%20POO%20KONG!5e0!3m2!1sid!2sid!4v1776655216395!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-17 02:56:50', '2026-09-01 08:05:37', 169),
(4, 'Kota Lama Semarang', 'Kota Lama Semarang (bahasa Jawa: ꦏꦶꦛꦭꦩꦱꦼꦩꦫꦁ, translit. Kitha Lama Semarang, bahasa Belanda: Semarang Oude Stad) adalah suatu kawasan di Semarang, Jawa Tengah yang menjadi pusat perdagangan pada abad 19-20. Pada masa itu, untuk mengamankan warga dan wilayahnya, kawasan itu dibangun benteng, yang dinamai benteng Vijfhoek. Untuk mempercepat jalur perhubungan antar ketiga pintu gerbang di benteng itu maka dibuat jalan-jalan perhubungan, dengan jalan utamanya dinamai Heerenstraat. Saat ini bernama Jl. Letjen Soeprapto. Salah satu lokasi pintu benteng yang ada sampai saat ini adalah Jembatan Berok, yang disebut De Zuider Por. Kata Berok sendiri merupakan hasil pelafalan masyarakat Pribumi yang kesulitan melafalkan kata Burg dalam bahasa Belanda.\r\n\r\nDi sekitar Kota Lama dibangun kanal-kanal air yang keberadaannya masih bisa disaksikan hingga kini meski tidak terawat. Hal inilah yang menyebabkan Kota Lama mendapat julukan sebagai \"Little Netherland\".', 2, 'img_69f075cf758d69.68010263.jpg', 'img_69f17ce85cf653.89876257.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7920.684661642642!2d110.42314219129311!3d-6.968880272126807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f35649aa5e89%3A0x36af9cb064c11968!2sKota%20Lama%20Semarang!5e0!3m2!1sid!2sid!4v1776655542634!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-17 02:56:50', '2026-09-01 08:05:07', 172),
(7, 'Masjid Agung Jawa Tengah', 'Masjid Agung Jawa Tengah (bahasa Jawa: ꦩꦱ꧀ꦗꦶꦢ꧀ꦄꦒꦼꦁꦗꦮꦶꦩꦢꦾ, translit. Masjid Agêng Jawi Madya) adalah masjid yang terletak di Semarang, Jawa Tengah, Indonesia.\r\n\r\nMasjid ini mulai dibangun sejak tahun 2001 hingga selesai secara keseluruhan pada tahun 2006. Masjid ini berdiri di atas lahan 10 hektare. Masjid Agung diresmikan oleh Presiden Susilo Bambang Yudhoyono pada tanggal 14 November 2006. Masjid Agung Jawa Tengah (MAJT) merupakan masjid provinsi bagi provinsi Jawa Tengah.', 1, 'img_69f075b52b7a24.71828466.jpg', 'img_69f17cfa748620.64351416.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2163184702126!2d110.44301627499708!3d-6.983779093017123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708cb76c98241f%3A0x6afb73af24d41bf9!2sMasjid%20Agung%20Jawa%20Tengah%20(MAJT)!5e0!3m2!1sid!2sid!4v1776922256878!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-23 05:31:14', '2026-09-02 13:42:40', 88),
(8, 'Candi Gedong Songo', 'Candi Gedong Songo (bahasa Jawa: ꦕꦤ꧀ꦝꦶꦒꦼꦝꦺꦴꦁꦱꦔ, translit. Candhi Gedhong Sanga) diperkirakan oleh para ahli dibuat semasa dengan Candi Dieng yang dibuat pada kurun waktu abad ke 7 sampai 9 Masehi pada masa Dinasti Sanjaya dari Kerajaan Mataram Lama. Nama Gedongsongo diberikan oleh penduduk setempat yang berasal dari bahasa Jawa, \"Gedong\" berarti rumah atau bangunan, \"Songo\" berarti sembilan. Jadi arti kata Gedongsongo adalah sembilan (kelompok) bangunan.[1] Semua candi terdiri dari tiga bagian yaitu bagian bawah (alas candi) yang menggambarkan alam manusia, bagian tengah candi menggambarkan alam yang menghubungkan alam manusia dan lama dewa, dan bagian atas (puncak candi) yang menggambarkan alam para dewa.\r\n\r\nKeberadaan candi-candi ini diungkapkan pertama kali oleh Loten pada tahun 1740 M. Kemudian tahun 1840 dilaporkan kepada Th. Stamford Raffles sebagai Candi Banyukuning, tetapi dalam bukunya The History of Java (1817), Raffles mencatat kompleks tersebut dengan nama Gedong Pitoe karena hanya ditemukan tujuh kelompok bangunan. Van Braam membuat publikasi pada tahun 1825 M dengan membuat lukisannya yang sekarang disimpan di Museum Leiden. Friederich dan Hoopermans membuat tulisan tentang Gedongsongo pada tahun 1865 M. Setelah ditemukan, dilakukan beberapa penelitian terhadap candi oleh para arkeolog Belanda, antara lain Van Stein Callenfels (1908 M) dan Knebel (1911 M). Dalam penelitian tersebut ditemukan dua kelompok candi lain, sehingga namanya diubah menjadi Gedongsongo (dalam bahasa Jawa berarti sembilan bangunan).\r\n\r\nPada tahun 1928 1929 M, dinas purbakala pada zaman pemerintahan Belanda melakukan pemugaran terhadap Candi Gedong 1. Kemudian pada tahun 1939-1931 dilakukan pemugaran terhadap Candi Gedong II.\r\n\r\nPada tahun 1977-1978 Candi Gedong II, Candi Gedong IV, dan Candi Gedong V dipugar oleh Suaka Peninggalan Sejarah dan Purbakala Jawa Tengah. Pemugaran candi dan penataan lingkungan juga. dilakukan oleh pemerintah Indonesia selama hampir 10 tahun dari tahun 1972 1982 M. Tahun 1997 dilakukan penataan dan pengembangan Kompleks Percandian Gedongsongo oleh Suaka Peninggalan Sejarah dan Purbakala Jawa Tengah.', 2, 'img_69f075a13d9683.79785763.jpg', 'img_69f17d0f44ad97.31889471.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.290682487501!2d110.33746637499921!3d-7.207641642797949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70874ef3f95a73%3A0x5331ed5ca2e4242a!2sLisin%20gedongsongo!5e0!3m2!1sid!2sid!4v1776922882837!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-23 05:42:10', '2026-09-04 01:33:26', 45),
(9, 'Goa Kreo', 'Gua Kreo (bahasa Jawa: ꦒꦸꦮꦏꦽꦪꦺꦴ, translit. Guwa Kreo) adalah objek wisata yang terdapat di Kota Semarang. Gua Kreo merupakan Gua yang terbentuk oleh alam dan terletak di tengah-tengah Waduk Jatibarang, sebuah bendungan yang membendung Kali Kreo.\r\n\r\nGua Kreo memiliki tempat parkir dan area kuliner luas yang menawarkan berbagai makanan dan minuman dalam harga murah. Pada halaman utama, terdapat pelataran yang berguna untuk menggelar acara adat bernama sesaji rewanda, yaitu sejenis upacara adat yang digelar dengan menyajikan hasil bumi gratis kepada monyet-monyet yang ada di kawasan ini, diiringi persembahan iring-iringan kampung dan tari tradisional setempat.\r\n\r\nUntuk menuju gua-gua Kreo yang ada di Pulau Kreo, pengunjung perlu melewati tangga berundak yang cukup panjang serta sebuah jembatan berpelengkung merah. Jalur yang ada di Pulau Kreo terdapat di area pesisir dan terbilang sempit. Terdapat dua gua utama di Pulau Kreo, keduanya diyakini sebagai tempat bertapanya Dewa Rama dan Sunan Kalijaga.\r\n\r\nKata \"Kreo\" berasal dari kata Mangreho artinya jagalah atau peliharalah. Gua ini pernah digunakan Sunan Kalijaga untuk bertapa. Di sini terdapat ratusan monyet yang beretnis Macaca fascicularis atau biasa disebut monyet ekor panjang, dan menurut legenda juga terdapat tiga monyet gaib anak buah dari Sunan Kalijaga untuk menjaga hutan tersebut. Masyarakat sekitar juga meyakini bahwa kera ekor panjang tersebut merupakan keturunan dari kera yang setia pada zaman Sunan Kalijaga. Pada saat hasil bumi melimpah, masyarakat sekitar Goa Kreo akan mengadakan acara Rewanda, yaitu acara tradisional yang dilakukan sebagai bentuk dari hasil rasa syukur dan mengasihi makhluk hidup, dengan memberikan hasil bumi atau makanan untuk kera ekor panjang yang terdapat dikawasan tersebut', 1, 'img_69f0752c566827.35039201.jpg', 'img_69f17d1a70fdf6.74536367.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.749418608237!2d110.34849417499753!3d-7.038708542963278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708a3f2cf58ddb%3A0x2e396176ca27c669!2sObyek%20Wisata%20Goa%20Kreo!5e0!3m2!1sid!2sid!4v1776923552553!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-23 05:52:46', '2026-08-30 10:34:57', 79),
(10, 'TINJOMOYO', 'Kota Semarang dikenal sebagai pusat pemerintahan dan perdagangan di Jawa Tengah, namun dibalik hiruk-pikuk kotanya yang padat, tersimpan Hutan Wisata Tinjomoyo sebuah destinasi ekowisata di Kecamatan Gunungpati yang menawarkan keindahan hutan, udara segar, dan suasana menenangkan. Terletak di bagian barat daya kota, kawasan seluas 57,5 hektar ini menjadi alternatif menarik bagi wisatawan lokal maupun luar kota untuk melepas penat, beraktivitas di alam terbuka, atau sekadar menikmati perpaduan lanskap bukit, sungai, serta hutan jati dan pinus yang masih asri.\r\n\r\nSejarah dan Transformasi Kawasan\r\nHutan Tinjomoyo dulunya merupakan kawasan Kebun Binatang Semarang sebelum dipindahkan ke kawasan Mangkang. Setelah pemindahan tersebut, pemerintah kota melihat potensi besar yang dimiliki oleh kawasan ini sebagai destinasi wisata berbasis alam. Kawasan ini kemudian ditata ulang dan dikembangkan menjadi hutan wisata, yaitu sebuah konsep wisata hutan yang menggabungkan pelestarian lingkungan dengan sarana rekreasi.', 1, 'img_69f07583ae5641.35572985.jpg', 'img_69f17d567d5271.24673288.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31678.243322047383!2d110.39152935610727!3d-7.035075099868806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b92ef75d6a7%3A0x5a1acbf1ddb91d13!2sTinjomoyo%2C%20Kec.%20Banyumanik%2C%20Kota%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1776923736656!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-23 06:01:30', '2026-09-01 08:05:27', 108),
(11, 'Pantai Marina', 'Pantai Marina Semarang adalah destinasi wisata pantai di utara Semarang yang terkenal dengan suasana tenang, ombak kecil, dan pemandangan sunset yang memukau. Bekas kawasan hutan bakau ini menawarkan berbagai aktivitas seperti naik perahu, memancing, dan kulineran dengan tiket masuk terjangkau, yaitu sekitar Rp5.000 per orang.', 3, 'img_69f16b9e383e08.38927037.jpg', 'img_69f17d62719014.95801546.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.044379410983!2d110.37027408715822!3d-6.948876999999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4e56e4f8ea1%3A0xcf2bee72d0606dd0!2sPantai%20Marina!5e0!3m2!1sid!2sid!4v1777429547994!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:23:26', '2026-09-01 08:05:13', 42),
(12, 'Gedangan', 'Gereja Santo Yusuf Gedangan adalah gereja Katolik pertama di Semarang dan tertua di Jawa Tengah, dibangun antara 1870-1875. Terletak di Jl. Ronggowarsito No. 11, Semarang Timur, gereja bersejarah ini menampilkan arsitektur Neogotik kolonial yang dirancang oleh W.I. van Bakel.', 1, 'img_69f16d3f980300.15343143.jpg', 'img_69f17d7159d9d8.47275615.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.364590119193!2d110.4286617747574!3d-6.966245193034313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f3596c8535af%3A0x4df81966843ad861!2sGereja%20Katolik%20Santo%20Yusuf%2C%20Gedangan!5e0!3m2!1sid!2sid!4v1777429826292!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:30:23', '2026-09-01 08:06:21', 48),
(13, 'GPIB Immanuel Semarang (Gereja Blenduk)', 'Gereja Blenduk adalah salah satu ikon paling terkenal di Kota Lama Semarang dan merupakan gereja Protestan tertua di Jawa Tengah. Bangunan ini bukan cuma tempat ibadah, tapi juga simbol sejarah panjang kolonial dan perkembangan kota Semarang.\r\n\r\nDeskripsi Singkat\r\nGereja ini dikenal dengan kubah besar berwarna mencolok dan dua menara kembar yang membuatnya mudah dikenali. Nama “Blenduk” sendiri berasal dari bahasa Jawa mblenduk, yang berarti “menggelembung”, merujuk pada bentuk kubahnya yang bulat.\r\n\r\nSejarah\r\nGereja Blenduk pertama kali dibangun pada tahun 1753 oleh bangsa Portugis dengan bentuk awal sederhana seperti rumah panggung bergaya Jawa.\r\nSeiring waktu, bangunan ini mengalami beberapa kali renovasi besar oleh Belanda hingga akhirnya memiliki bentuk megah seperti sekarang, terutama pada akhir abad ke-18 dan renovasi besar tahun 1894.', 1, 'img_69f16e49812422.65564230.jpg', 'img_69f17d7ec3e490.48524250.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.348609524573!2d110.42485227475743!3d-6.968137093032458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f34349b8e345%3A0x8fd1c780aa92f074!2sGPIB%20Immanuel%20Semarang%20(Gereja%20Blenduk)!5e0!3m2!1sid!2sid!4v1777430001109!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:34:49', '2026-09-01 08:06:34', 49),
(14, 'Curug Gondoriyo', 'Deskripsi Singkat\r\nCurug Gondoriyo adalah destinasi wisata alam berupa air terjun yang berada di tengah perkampungan warga di Kecamatan Ngaliyan, Semarang. Meski lokasinya dekat kota, suasananya masih sangat asri dan tenang, cocok untuk melepas penat.\r\n\r\nCiri Khas\r\nMemiliki ketinggian sekitar ±15 meter\r\nDikenal sebagai “air terjun pelangi” karena dihiasi lampu warna-warni saat malam hari\r\nAirnya berwarna kebiruan kehijauan dengan aliran cukup deras\r\nDikelilingi pepohonan hijau dan tebing alami yang masih terjaga', 3, 'img_69f16f85a0cdf1.54019102.png', 'img_69f17d8965da31.72901377.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0379567980663!2d110.32097138416034!3d-7.004813430270161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70610ee858f31d%3A0x673a1429d233ead4!2sCurug%20Gondoriyo!5e0!3m2!1sid!2sid!4v1777430219311!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:40:05', '2026-09-02 03:47:09', 48),
(15, 'Lawang Sewu Semarang', 'Lawang Sewu adalah bangunan bersejarah ikonik di Semarang yang terkenal dengan julukan “seribu pintu”. Sebenarnya jumlah pintunya tidak benar-benar seribu, tapi karena desainnya memiliki banyak pintu dan jendela besar yang mirip pintu.\r\n\r\nSejarah\r\nBangunan ini dibangun pada tahun 1904 oleh pemerintah kolonial Belanda sebagai kantor pusat perusahaan kereta api Nederlandsch-Indische Spoorweg Maatschappij (NIS).\r\nSaat masa penjajahan Jepang, Lawang Sewu sempat digunakan sebagai penjara, terutama bagian ruang bawah tanahnya.', 2, 'img_69f1703986f6d7.75113731.jpg', 'img_69f17d978edd83.82045006.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2151203973362!2d110.40797742475759!3d-6.983920593016968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4f19af0393%3A0x11304de4230ded0d!2sLawang%20Sewu%20Semarang!5e0!3m2!1sid!2sid!4v1777430558356!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:43:05', '2026-09-01 08:06:02', 58),
(16, 'Maerokoco Semarang', 'Grand Maerakaca (sering disebut Maerokoco) adalah taman wisata edukasi yang menampilkan miniatur rumah adat dari berbagai kabupaten/kota di Jawa Tengah. Tempat ini sering dijuluki “Taman Mini Jawa Tengah” karena konsepnya mirip dengan Taman Mini Indonesia Indah, tapi fokus ke budaya daerah Jawa Tengah.\r\n\r\nKonsep & Daya Tarik\r\nAnjungan rumah adat dari tiap daerah di Jawa Tengah\r\nWisata edukasi budaya (pakaian, kerajinan, kuliner khas)\r\nTracking mangrove dengan jembatan kayu panjang\r\nDanau buatan yang bisa dinaiki perahu\r\nBanyak spot foto instagramable', 3, 'img_69f1715b456c52.37644714.jpg', 'img_69f17da2954d14.23000035.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.2061485919514!2d110.38656191323851!3d-6.960594236963285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f5d1b1f3bbaf%3A0x6b752b51be0a68cf!2sMaerokoco%20Semarang!5e0!3m2!1sid!2sid!4v1777430800126!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:47:55', '2026-08-30 10:34:50', 35),
(17, 'Pagoda Avalokitesvara', 'Pagoda Avalokitesvara adalah salah satu landmark wisata religi paling ikonik di Semarang. Pagoda ini berada di kawasan Vihara Buddhagaya Watugong dan dikenal sebagai pagoda tertinggi di Indonesia.\r\n\r\nCiri Khas\r\nMemiliki 7 lantai dengan tinggi sekitar 45 meter\r\nDidominasi warna merah dan emas yang mencolok\r\nDihiasi patung Dewi Kwan Im (Avalokitesvara)\r\nStruktur bertingkat khas arsitektur Tiongkok\r\nDaya Tarik\r\nWisata religi umat Buddha\r\nSpot foto ikonik, terutama saat malam hari dengan lampu menyala\r\nSuasana tenang dan damai untuk refleksi diri\r\nKombinasi arsitektur megah dan lingkungan yang rapi\r\nMakna & Fungsi\r\n\r\nPagoda ini bukan sekadar objek wisata, tapi juga tempat ibadah dan simbol spiritual. Setiap tingkatnya melambangkan perjalanan menuju pencerahan dalam ajaran Buddha.', 1, 'img_69f171e52832d8.66641268.jpg', 'img_69f17dad967383.27546770.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63349.43655999698!2d110.3332862486328!3d-7.086551899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70893b6870aa0f%3A0xcde64a0584b6e2e5!2sPagoda%20Avalokitesvara!5e0!3m2!1sid!2sid!4v1777430945705!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:50:13', '2026-09-01 08:05:45', 65),
(18, 'Pecinan Semarang', 'Kawasan Pecinan Semarang adalah kawasan bersejarah yang menjadi pusat budaya Tionghoa di Semarang. Terletak di sekitar Gang Lombok, area ini terkenal dengan suasana khas Tionghoa yang masih terasa kuat, mulai dari arsitektur, kuliner, hingga tradisi.\r\n\r\nSejarah\r\nPecinan sudah ada sejak masa kolonial Belanda, ketika masyarakat Tionghoa ditempatkan di area tertentu untuk aktivitas perdagangan. Sejak saat itu, kawasan ini berkembang menjadi pusat ekonomi dan budaya yang tetap hidup hingga sekarang.', 2, 'img_69f172756e3fa1.72969806.jpg', 'img_69f17db83124a5.40005340.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63364.651385283774!2d110.42484449999999!3d-6.974987199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4aab14d29ab%3A0xbe7ff6928f077887!2sPecinan%20Semarang!5e0!3m2!1sid!2sid!4v1777431161744!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:52:37', '2026-09-01 08:06:03', 32),
(19, 'Pura Agung Giri Natha Semarang', 'Pura Agung Giri Natha adalah tempat ibadah umat Hindu yang terletak di kawasan perbukitan Semarang. Pura ini terkenal karena lokasinya yang tinggi dan memiliki pemandangan kota dari atas, sehingga sering disebut sebagai salah satu spot religi dengan view terbaik di Semarang.\r\n\r\nCiri Khas\r\nMemiliki patung Dewa Ganesha besar di bagian depan\r\nArsitektur khas pura Bali dengan gapura dan ukiran detail\r\nTerletak di dataran tinggi dengan suasana sejuk\r\nArea yang bersih, tenang, dan tertata\r\n\r\nFungsi & Makna\r\nPura ini digunakan sebagai tempat sembahyang dan kegiatan keagamaan umat Hindu di Semarang. Selain itu, juga menjadi simbol keberagaman budaya dan toleransi antar umat beragama di kota ini.', 1, 'img_69f173ab6f9823.40117237.jpg', 'img_69f17dc472c0c0.46334131.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63361.395732889476!2d110.4106094!3d-6.9990084999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b68526dc645%3A0x810834973e7abd20!2sPura%20Agung%20Giri%20Natha%20Semarang!5e0!3m2!1sid!2sid!4v1777431446846!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2026-04-29 02:57:47', '2026-09-01 08:05:35', 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata2`
--

CREATE TABLE `wisata2` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi_en` text,
  `lokasi` text NOT NULL,
  `qrlink` varchar(191) DEFAULT NULL,
  `image` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata2`
--

INSERT INTO `wisata2` (`id`, `nama`, `deskripsi`, `deskripsi_en`, `lokasi`, `qrlink`, `image`, `type`, `status`) VALUES
(1, 'Masjid Agung Jawa Tengah', 'Masjid ini mulai dibangun sejak tahun 2001 hingga selesai secara keseluruhan pada tahun 2006. Masjid ini berdiri di atas lahan 10 hektare. Masjid Agung diresmikan oleh Presiden Indonesia Susilo Bambang Yudhoyono pada tanggal 14 November 2006. Masjid Agung Jawa Tengah dirancang dalam gaya arsitektural campuran Jawa, Islam dan Romawi. Diarsiteki oleh Ir. H. Ahmad Fanani dari PT. Atelier Enam Jakarta yang memenangkan sayembara desain MAJT tahun 2001.', 'The mosque was built since 2001 until it was completely finished in 2006. The mosque is built on 10 hectares of land. The Great Mosque was inaugurated by Indonesian President Susilo Bambang Yudhoyono on November 14, 2006. The Great Mosque of Central Java was designed in a architectural style blending Javanese, Islamic and Roman. Diarsiteki by Ir. H. Ahmad Fanani from PT. Atelier Enam Jakarta won the 2001 MAJT design contest.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m24!1m8!1m3!1d126728.96643889269!2d110.41058800000002!3d-6.976230000000001!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20West%20Semarang%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708cb76c98241f%3A0x6afb73af24d41bf9!2sGreat%20Mosque%20of%20Central%20Java%2C%20Jl.%20Gajah%20Raya%2C%20Sambirejo%2C%20Gayamsari%2C%20Semarang%20City%2C%20Central%20Java%2050166!3m2!1d-6.984195499999999!2d110.4454457!5e0!3m2!1sen!2sid!4v1572494005046!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'qr-1572494022.png', 'majtt.jpg', '1', 1),
(2, 'Gereja Blenduk', 'Gereja Kristen tertua di Jawa Tengah yang dibangun oleh masyarakat Belanda yang tinggal di kota itu pada 1753, dengan bentuk oktagonal (persegi delapan). Arsitektur di dalamnya dibuat berdasarkan salib Yunani. Gereja ini direnovasi pada 1894 oleh W. Westmaas dan H.P.A. de Wilde, yang menambahkan kedua menara di depan gedung gereja ini. Nama Blenduk adalah julukan dari masyarakat setempat yang berarti kubah. Gereja ini hingga sekarang masih dipergunakan setiap hari Minggu. Di sekitar gereja ini juga terdapat sejumlah bangunan lain dari masa kolonial Belanda.', 'The oldest Christian church in Central Java, which was built by the Dutch people who lived in the city in 1753, with an octagonal shape (square eight). The architecture inside is based on the Greek cross. This church was renovated in 1894 by W. Westmaas and H.P.A. de Wilde, who added the two towers in front of this church building. The name Blenduk is a nickname from the local community which means dome. This church is still used every Sunday. Around this church there are also a number of other buildings from the Dutch colonial period.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m24!1m8!1m3!1d8637.490169658678!2d110.42984423635593!3d-6.973095708149098!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20West%20Semarang%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f34349b8e345%3A0x8fd1c780aa92f074!2sProtestant%20Church%20in%20Western%20Indonesia%20Immanuel%20Semarang%2C%20Jl.%20Letjen%20Suprapto%20No.32%2C%20Tanjung%20Mas%2C%20North%20Semarang%2C%20Semarang%20City%2C%20Central%20Java%2050174!3m2!1d-6.968212899999999!2d110.42745749999999!5e0!3m2!1sen!2sid!4v1572494116568!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'qr-1572494159.png', 'gerejablenduk.jpg', '1', 1),
(3, 'Gereja Gedangan', 'Gereja ini merupakan gereja Katolik pertama di kota Semarang. Secara administratif, gereja ini merupakan bagian dari Paroki Santo Yusuf di Keuskupan Agung Semarang.\r\n\r\nGereja ini dirancang oleh arsitek Belanda, W.I. van Bakel dan dibangun pada tahun 1870 hingga 1875 dengan biaya 110.000 gulden untuk memenuhi kebutuhan pertumbuhan penduduk Katolik Semarang.', 'This church is the first Catholic church in the city of Semarang. Administratively, this church is part of the St. Joseph Parish in the Semarang Archdiocese.\r\n\r\nThis church was designed by the Dutch architect, W.I. van Bakel and was built in 1870 to 1875 at a cost of 110,000 guilders to meet the growing needs of the Semarang Catholic population.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31682.871025039978!2d110.38460714245642!3d-6.96692147891669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sAhmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f3596c8535af%3A0x4df81966843ad861!2sSaint%20Joseph&#39;s%20Church%2C%20Jalan%20Ronggowarsito%2C%20Rejomulyo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9662234!2d110.4312305!5e0!3m2!1sen!2sid!4v1568621917388!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'qr-1572494660.png', 'gedangan.jpg', '1', 1),
(4, 'Klenteng Sam Poo Kong', 'Klenteng ini adalah sebuah petilasan, yaitu bekas tempat persinggahan dan pendaratan pertama seorang Laksamana Tiongkok beragama Islam yang bernama Zheng He / Cheng Ho. Kompleks Sam Po Tong berada di daerah Simongan, sebelah barat daya Kota Semarang. Tanda yang menunjukan sebagai bekas petilasan yang berciri keislaman dengan ditemukannya tulisan berbunyi \"marilah kita mengheningkan cipta dengan mendengarkan bacaan Al Qur\'an\".', 'This temple is a petilasan, the former landing and landing place of a Muslim Chinese Admiral named Zheng He / Cheng Ho. Sam Po Tong complex is located in the Simongan area, southwest of Semarang City. Signs that indicate as a former Islamic character with the discovery of writing reads \"let us silence by listening to the reading of the Qur\'an\".', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31681.833094998223!2d110.3704793924664!3d-6.982264979616892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sAhmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708b46faaaaaab%3A0xef7fe551fe13bd76!2sSam%20Poo%20Kong%20Temple%2C%20Jalan%20Simongan%2C%20Bongsari%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9959864!2d110.3983714!5e0!3m2!1sen!2sid!4v1568621971537!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'sampookong.jpg', '1', 1),
(5, 'Vihara Pagoda Avalokitesvara', 'Vihara Buddhagaya Watugong atau juga dikenal dengan nama Vihara Buddhagaya merupakan salah satu tempat ibadah agama Buddha yang terletak di Pudakpayung, Banyumanik, Semarang Jawa Tengah. Komplek Vihara Buddhagaya Watugong tersebut terdiri dari dua bangunan induk utama yaitu Pagoda Avalokitesvara dan Dhammasala serta beberapa bangunan lain. Pagoda Avalokitesvara adalah bangunan yang mempunyai nilai artistik tinggi, dengan tinggi mencapai 45 meter dan ditetapkan sebagai pagoda tertinggi di Indonesia. ', 'The Buddhist temple of Watugong or also known as the Buddhagaya Vihara is one of the Buddhist places of worship located in Pudakpayung, Banyumanik, Semarang Central Java. The Watagha Buddhagaya Vihara Complex consists of two main master buildings namely the Avalokitesvara and Dhammasala Pagoda and several other buildings. The Avalokitesvara Pagoda is a building of high artistic value, with a height of 45 meters and is considered the tallest pagoda in Indonesia.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d126717.68577473763!2d110.34187944251411!3d-7.017787025561532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sAhmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70893b6870aa0f%3A0xcde64a0584b6e2e5!2sPagoda%20Avalokitesvara%2C%20Jalan%20Perintis%20Kemerdekaan%2C%20Pudakpayung%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-7.086811399999999!2d110.40919629999999!5e0!3m2!1sen!2sid!4v1568622027356!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'pagoda.jpg', '1', 1),
(6, 'Pura Agung Giri Natha', 'Bangunan ini terletak di Jl.Sumbing dengan luas area 4.000 meter persegi. Tempat ini juga dilengkapi dengan berbagai fasilitas diantaranya perpustakaan, sekretariat, Bale Kerta Sambha, ruang kelas untuk pendalaman agama Hindu.', 'This building is located on Jl. Sumbing with an area of 4,000 square meters. This place is also equipped with various facilities including a library, secretariat, Bale KertaSambha, classrooms for deepening Hinduism.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d44805.70232674363!2d110.38537622194616!3d-6.973652876763166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sAhmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708b68526dc645%3A0x810834973e7abd20!2sGreat%20Temple%20Of%20Giri%20Natha%2C%20Jl.%20Sumbing%20No.12%2C%20Bendungan%2C%20Gajahmungkur%2C%20Semarang%20City%2C%20Central%20Java%2050231!3m2!1d-6.9984759!2d110.4106468!5e0!3m2!1sen!2sid!4v1568864071664!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'pura.jpg', '1', 1),
(7, 'Kota Lama', ' Area Kota Lama Semarang atau yang sering disebut Outstadt atau Little Netherland meliputi deretan gedung-gedung yang dibangun sejak zaman Belanda. Secara umum karakter bangunan di wilayah ini dipengaruhi gaya arsitektur Eropa sekitar tahun 1700-an. Hal ini bisa dilihat ciri arsitektur bangunan yang khas dan ornamen-ornamen yang identik dengan gaya Eropa. Seperti ukuran pintu dan jendela yang luar biasa besar, penggunaan kaca-kaca berwarna, bentuk atap yang unik, sampai adanya ruang bawah tanah. Dari segi tata kota, wilayah ini dibuat memusat dengan gereja Blenduk  dan kantor-kantor pemerintahan sebagai pusatnya. Bagaimanapun bentuknya dan apapun fungsinya saat ini, Kota Lama merupakan aset yang berharga bila dikemas dengan baik. Sebuah bentuk nyata sejarah Semarang dan sejarah Indonesia bernuansa tempo doeloe yang luar biasa besar nilai sejarahnya.', 'Semarang Old Town Area or often called Outstadt or Little Netherland includes rows of buildings built since the Dutch era. In general, the character of buildings in this region is influenced by European architectural styles around the 1700s. This can be seen from the distinctive architectural characteristics of buildings and ornaments that are identical to European styles. Such as the size of doors and windows that are extraordinarily large, the use of colored glass, the unique shape of the roof, to the existence of a cellar. In terms of urban planning, this area was made centralized with the Blenduk church and government offices as its center. Whatever its form and whatever its function now, the Old City is a valuable asset if properly packaged. A real form of history of Semarang and Indonesian history nuanced tempo tempo doeloe extraordinary historical value.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31682.8681465267!2d110.38220137404502!3d-6.9669640778670185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sAhmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f4a9c5b90845%3A0xcdad87f56d2be6e!2sKota%20Lama%20Semarang%2C%20Old%20Town%2C%20Bandarharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9683741!2d110.4251997!5e0!3m2!1sen!2sid!4v1568865371312!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'kotalama.jpg', '2', 1),
(8, 'Chinatown', 'Di kawasan pecinan  terdapat Warung Semawis yang lokasinya di Jalan Gang Warung Kelurahan Kranggan Kecamatan Semarang Tengah. Di kawasan ini terdapat deretan warung kaki lima yang menjual aneka makanan yang dikenal paling enak di Semarang dengan nuansa oriental. Juga tersedia berbagai menu makanan seperti nasi tela, bakmi jowo, aneka masakan oriental khas gang warung, es marem, soto, aneka bubur, sate, ayam goreng. Warung Semawis buka hari Jumat, Sabtu, dan Minggu pukul 17.00 sampai dengan dini hari.', 'In the Chinatown, there is Semawis Warung, which is located on Jalan Gang Warung, Kranggan, Central Semarang District. In this area there are rows of street food stalls that sell a variety of foods that are known to be the most delicious in Semarang with an oriental feel. Also available are various food menus such as rice tela, jowo noodles, various oriental dishes typical of warung alleys, ice marem, soto, various porridge, satay, fried chicken. Semawis Warung is open on Fridays, Saturdays, and Sundays at 17:00 until early morning.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31682.57609550025!2d110.38220137404696!3d-6.971284777671204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f4aab14d29ab%3A0xbe7ff6928f077887!2sSemarang%20Chinatown%2C%20Kauman%2C%20Central%20Semarang%2C%20Semarang%20City%2C%20Central%20Java%2050188!3m2!1d-6.974992299999999!2d110.424954!5e0!3m2!1sen!2sid!4v1568865963146!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'qr-1572494707.png', 'pecinan.jpg', '2', 1),
(9, 'Lawang Sewu', ' Lawang Sewu merupakan sebuah gedung bersejarah memiliki nilai historis sangat tinggi,    berdiri tepat di pusat keramaian di jantung Kota  Semarang, Jawa Tengah. Pada masa  lalu, gedung ini  merupakan kantor dari Nederlands-Indische Spoorweg Maatschappij atau Jawatan Kereta Api. Dibangun pada tahun 1904 dan selesai pada tahun 1907. Terletak di kawasan bundaran Tugu Muda yang dahulu kala disebut Wilhelminaplein. Bangunan kuno dan megah berlantai dua ini setelah masa kemerdekaan Indonesia dipakai sebagai kantor Djawatan Kereta Api Repoeblik Indonesia (DKARI) atau sekarang PT. Kereta Api Indonesia. Pernah dipakai sebagai Kantor Badan Prasarana Komando Daerah Militer (Kodam IV/Diponegoro) dan Kantor Wilayah (Kanwil) Kementerian Perhubungan Jawa Tengah.', 'Lawang Sewu is a historical building that has very high historical value, standing right in the center of the crowd in the heart of Semarang City, Central Java. In the past, this building was the office of the Nederlands-Indische Spoorweg Maatschappij or the Railway Service. It was built in 1904 and completed in 1907. It is located in the Tugu Muda roundabout area which was once called Wilhelminaplein. This ancient and magnificent two-story building after Indonesia\'s independence was used as the office of the Indonesian Repoeblik Railway Department (DKARI) or now PT. Indonesian Railways. It was once used as the Office of the Military Regional Command Infrastructure Agency (Kodam IV / Diponegoro) and the Regional Office (Kanwil) of the Ministry of Transportation in Central Java.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31682.71417757958!2d110.37418242404601!3d-6.969242277763773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708b4f19af0393%3A0x11304de4230ded0d!2sLawang%20Sewu%2C%20Jalan%20Pemuda%2C%20Sekayu%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9839424999999995!2d110.4103811!5e0!3m2!1sen!2sid!4v1568866081243!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'lawangsewu.jpg', '2', 1),
(10, 'Goa Kreo', 'Goa Kreo adalah sebuah goa yang dipercaya sebagai petilasan Sunan Kalijaga saat mencari kayu Jati untuk membangun Masjid Agung Demak. Menurut cerita legenda, Sunan Kalijaga bertemu sekawanan kera yang kemudian disuruh menjaga kayu jati. Kata \"Kreo\" berasal dari Mangreho yang berarti peliharalah atau jagalah. Kata inilah yang kemudian menjadikan goa ini disebut Goa Kreo dan sejak saat itu kawanan kera yang menghuni kawasan ini menjadi penunggu. Selain menikmati pemandangan alam yang indah dan udara yang sejuk serta bercanda dengan kera penunggu kawasan ini, pengunjung juga bisa menikmati pemandangan waduk Jatibarang, bermain ski air, atau memancing. Objek wisata ini kurang lebih 8 km dari Tugumuda dan setiap 3 Syawal diadakan Sesaji Rewanda.', 'Kreo Cave is a cave that is believed to be a pioneer of Sunan Kalijaga when searching for Teak wood to build the Great Mosque of Demak. According to legend, Sunan Kalijaga met a herd of apes who were then told to guard teak wood. The word \"Kreo\" comes from Mangreho which means to preserve or protect. This word later made this cave called Goa Kreo and since then the herd of monkeys that inhabit this area have become watchmen. In addition to enjoying the beautiful natural scenery and cool air and joking with the area\'s watchman apes, visitors can also enjoy the view of the Jatibarang reservoir, water skiing, or fishing. This tourist attraction is approximately 8 km from Tugumuda and every 3 Shawwal there are Rewanda offerings.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d63361.07573780649!2d110.3402759160792!3d-7.00136510520046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708a3f2cf58ddb%3A0x2e396176ca27c669!2sObyek%20Wisata%20Goa%20Kreo%2C%20Jalan%20Raya%20Goa%20Kreo%2C%20Kandri%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-7.0372113!2d110.34761639999999!5e0!3m2!1sen!2sid!4v1568866406886!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'goakreo.jpg', '3', 1),
(11, 'Pantai Marina', 'Pantai Marina menarik pengunjung dengan deburan ombak yang tenang dan berirama membuat jiwa nyaman, dan pemandangan keindahan pantai. Ini juga dilengkapi dengan kolam renang, taman bermain anak-anak, gazebo, lapangan voli pantai, serta rekreasi air, langit air dan speed boat. Trek jogging, sehingga cocok untuk berolahraga.', 'Marina Beach attracts visitors with calm and rhythmic waves making the soul comfortable, and a beautiful view of the beach. It is also equipped with a swimming pool, children\'s playground, gazebo, beach volleyball court, as well as water recreation, sky water and speed boat. Jogging track, so it is suitable for sports.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d15841.74583028295!2d110.37422081593111!3d-6.957730669572374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f4e56e4f8ea1%3A0xcf2bee72d0606dd0!2sPantai%20Marina%20Semarang%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9488769999999995!2d110.38932849999999!5e0!3m2!1sen!2sid!4v1568866578135!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'marina.jpg', '3', 1),
(12, 'Hutan Wisata Tinjomoyo', 'Tinjomoyo merupakan hutan wisata yang dapat dimanfaatkan sebagai area combat game, camping ground, outing activity, bird watching, juga terdapat flying fox. Tempat ini sangat ideal karena merupakan perpaduan hutan, bukit, dan sungai sehingga para penggemar combat game dapat menikmati petualangan alam medan tempur, dengan standar keamanan yang tinggi untuk keselamatan pemainnya. Area ini dibuka untuk umum dan dapat dijangkau dengan kendaraan umum maupun pribadi.', 'Tinjomoyo is a tourist forest that can be used as a combat game area, camping ground, outing activity, bird watching, and also has a flying fox. This place is ideal because it is a blend of forests, hills and rivers so that combat game fans can enjoy the battlefield nature adventure, with high safety standards for the safety of the players. This area is open to the public and can be reached by public and private vehicles.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d63361.781738876896!2d110.35797626606943!3d-6.996164706142992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e708b96e09f98a7%3A0x1309462505debcd4!2sHutan%20Wisata%20Tinjomoyo%20Semarang%2C%20Tinjomoyo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-7.0296837!2d110.3999611!5e0!3m2!1sen!2sid!4v1568866978480!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'tinjomoyo.jpg', '3', 1),
(13, 'Puri Maekoroco', 'Sebagai taman mini Jawa Tengah yang merangkum semua rumah adat – biasa disebut anjungan - dari 35 kabupaten dan kota yang ada di Jawa Tengah. Di dalam rumah-rumah tersebut digelar hasil-hasil industri dan kerajinan yang diproduksi oleh masing-masing daerah. Selain menampilkan rumah-rumah adat, obyek wisata ini dilengkapi dengan fasilitas rekreasi air seperti, sepeda air, perahu, juga kereta bagi pengunjung. Lokasinya mudah dijangkau dengan kendaraan umum maupun kendaraan pribadi.', 'As a mini park in Central Java that encapsulates all traditional houses - commonly called pavilions - from 35 regencies and cities in Central Java. Within these houses, industrial and handicraft products are produced by each region. In addition to displaying traditional houses, these attractions are equipped with water recreation facilities such as, water bicycles, boats, as well as trains for visitors. The location is easily accessible by public transportation or private vehicles.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d7920.774638346254!2d110.37627947143083!3d-6.963553479876712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70f4d1d1aea6e7%3A0xf936da89553247a2!2sPuri%20Maerokoco%2C%20Jalan%20Puri%20Anjasmoro%2C%20Tawangsari%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9605225!2d110.38639409999999!5e0!3m2!1sen!2sid!4v1568867089139!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'maerokoco.jpg', '3', 1),
(14, 'Curug Gondoriyo', 'Kawasan air terjun yang semula terabaikan, kini dipercantik dengan ornamen-ornamen. Kesegaran air yang mengalir di ketinggian 15 meter ini menjadi lebih menarik setelah ditata.Air terjun yang letaknya di tengah perkampungan warga ini, bersumber dari Sungai Bukit Semarang Baru dan menyambung ke Sungai Beringin. Memadukan keindahan wisata alam dan konsep wisata kekinian.Pemandangan di sekitar curug yang asri dan hijau, dipadukan dengan instalasi 16 buah lampu lampu di bagian bawah air terjun. Ide tersebut membuat tampilan Gondoriyo jadi cantik sekali.', 'The waterfall area which was originally neglected, is now enhanced with ornaments. The freshness of the water that flows at a height of 15 meters becomes more interesting after it is arranged. The waterfall, which is located in the middle of the village, is sourced from the Bukit Baru Baru River and connects to the Beringin River. Combining the beauty of nature tourism and the concept of contemporary tourism. The view around the beautiful and green waterfall, combined with the installation of 16 pieces of lights at the bottom of the waterfall. The idea made Gondoriyo look so beautiful.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d63362.9002865973!2d110.32052501605409!3d-6.987917607637802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70610ee858f31d%3A0x673a1429d233ead4!2sCurug%20gondoriyo%2C%20Gondoriyo%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-7.0048134!2d110.32097139999999!5e0!3m2!1sen!2sid!4v1568867227259!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 'gondoriyo.jpg', '3', 1),
(22, 'Pondok Kopi', 'Tempat Ngopi', 'Coffee Shop', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d253387.41970384205!2d110.26638148966137!3d-7.105309111277268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x2e708c9f55796881%3A0x30d916983ba7e760!2sJenderal%20Ahmad%20Yani%20International%20Airport%2C%20Tambakharjo%2C%20West%20Semarang%2C%20Semarang%20City%2C%20Central%20Java!3m2!1d-6.9663454!2d110.3749891!4m5!1s0x2e70871073d211d5%3A0x894a4448f7d3e991!2sPondok%20Kopi%20Umbul%20Sidomukti%2C%20Manggung%2C%20Jimbaran%2C%20Semarang%2C%20Central%20Java!3m2!1d-7.1933199!2d110.366002!5e0!3m2!1sen!2sid!4v1572500044982!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'qr-1572500140.png', '1572500140_bus.png', '2', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ip_time` (`ip`,`attempted_at`);

--
-- Indeks untuk tabel `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `possid` (`poss_id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panduan_bandara`
--
ALTER TABLE `panduan_bandara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `special_asistence`
--
ALTER TABLE `special_asistence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `poss_id` (`poss_id`) USING BTREE;

--
-- Indeks untuk tabel `tabel_jalur`
--
ALTER TABLE `tabel_jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indeks untuk tabel `tenants_fasilitas`
--
ALTER TABLE `tenants_fasilitas`
  ADD PRIMARY KEY (`poss_id`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_type_status` (`type`,`status`);

--
-- Indeks untuk tabel `wisata2`
--
ALTER TABLE `wisata2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `panduan_bandara`
--
ALTER TABLE `panduan_bandara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `special_asistence`
--
ALTER TABLE `special_asistence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tabel_jalur`
--
ALTER TABLE `tabel_jalur`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `tenants_fasilitas`
--
ALTER TABLE `tenants_fasilitas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `wisata2`
--
ALTER TABLE `wisata2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
