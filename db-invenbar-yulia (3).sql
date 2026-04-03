-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2026 pada 06.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-invenbar-yulia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `satuan` varchar(20) NOT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL DEFAULT 'Baik',
  `tanggal_pengadaan` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode_barang`, `nama_barang`, `kategori_id`, `lokasi_id`, `jumlah`, `satuan`, `kondisi`, `tanggal_pengadaan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'LPOO1', 'Laptop Dell Latitude 5420', 1, 4, 1, 'Unit', 'Baik', '2023-05-15', '81ZmYNzQ3C04MzINk4WTfQ9xSiDhN2tR9bi4KIjd.jpg', '2025-09-21 17:54:09', '2025-09-28 23:15:16'),
(2, 'PRJ01', 'Proyektor Epson EB-X500', 1, 1, 1, 'Unit', 'Rusak Ringan', '2022-11-20', 'yUQZioCp1zvNgFbRJuGtzIkreE5iOvq5Ukl1ptbp.jpg', '2025-09-21 17:54:09', '2025-09-22 23:18:56'),
(3, 'MJ005', 'Meja Rapat Kayu Jati', 2, 2, 3, 'Buah', 'Rusak Ringan', '2021-02-10', '0YxOi6WaTb6Z9kT62akce2vQ9YhQegOX9gOM65OA.jpg', '2025-09-21 17:54:09', '2025-09-28 23:14:25'),
(4, 'ATK-SP-01', 'Spidol Whiteboard Snowman', 3, 3, 12, 'Unit', 'Baik', '2024-01-30', 'gUAmfcLn9FZxKkfKv8K6TyCqwb6WEqlYbE92PXzU.jpg', '2025-09-21 17:54:09', '2025-09-30 20:05:24'),
(5, 'YUL09', 'Pulpen', 3, 1, 100, 'unit', 'Rusak Ringan', '2025-09-29', 'NF60lvpAAzrtlAG4h64YE8zBtC2dGuHl2demFOOH.jpg', '2025-09-29 05:52:57', '2025-09-30 20:21:06'),
(6, 'LP001', 'AC', 1, 5, 1, 'Unit', 'Rusak Berat', '2025-10-06', 'WV4mwkRNABhqCu9gOxIqRB9pdH3NqE26OvdnUAxn.jpg', '2025-10-05 23:46:54', '2025-10-06 00:35:23'),
(7, 'LP002', 'Kipas', 1, 5, 3, 'Unit', 'Rusak Ringan', '2025-10-06', 'AjJPk2DMUzGdN5k4ljnWtd3ibLCsPtI5THMIjow4.jpg', '2025-10-05 23:47:29', '2025-10-06 00:38:40'),
(8, 'LP003', 'Komputer', 1, 5, 24, 'Unit', 'Baik', '2025-10-06', 'xGRuHcMtCCjHwxsDRauuGjEbQvdFjGdyJjweMne3.jpg', '2025-10-05 23:48:05', '2025-10-06 00:32:40'),
(9, 'LP004', 'CCTV', 1, 5, 1, 'Unit', 'Baik', '2025-10-06', 'NM3eB9gkrMHCQUql6AliWSg5bnELU45dzDhAJTOn.jpg', '2025-10-05 23:48:43', '2025-10-06 00:39:45'),
(10, 'LP005', 'Keyboard & mouse', 1, 5, 24, 'Unit', 'Rusak Ringan', '2025-10-06', 'd0apOKbFtKs4g9CeBUAkyIYCrUAd0WE5q4MrmFia.jpg', '2025-10-05 23:50:18', '2025-10-06 00:37:45'),
(11, 'LP006', 'Sapu', 8, 5, 2, 'Buah', 'Baik', '2025-10-06', 'a5LRcHG05e3xKRGvpAWXlS0S3bXkyRlY6pmYMckY.jpg', '2025-10-05 23:54:38', '2025-10-06 00:35:43'),
(12, 'LP007', 'Meja kayu', 2, 6, 1, 'Unit', 'Baik', '2025-10-06', 'GEM65qThmQwzd6FizkYN3P5IaUejVDjsn8bIWJkt.jpg', '2025-10-05 23:57:48', '2025-10-06 00:45:37'),
(13, 'LP008', 'Ac', 1, 6, 2, 'Unit', 'Rusak Ringan', '2025-10-06', 'jMfm4m0EiJdNrRPLgPdLDM0cTnmpLhbdKhyYbu2P.jpg', '2025-10-05 23:59:35', '2025-10-06 00:46:29'),
(14, 'LP009', 'Komputer', 1, 6, 30, 'Unit', 'Baik', '2025-10-06', 'xXBxCJYRgMTYWYoej7CbSRBMLd1wRS7fC6XHF8cT.jpg', '2025-10-06 00:00:13', '2025-10-06 00:46:11'),
(15, 'LP10', 'Kursi', 2, 5, 31, 'Unit', 'Baik', '2025-10-06', 'JsRd5G9ZM5rzf9MseNkpBORqwvi383CZYsACNcSB.jpg', '2025-10-06 00:01:02', '2025-10-06 00:45:24'),
(16, 'LP11', 'Komputer', 1, 5, 1, 'Unit', 'Rusak Berat', '2025-10-06', 'qYLtcojScUcVB2m1G2dFISQWtdSacML4a5OpJwie.jpg', '2025-10-06 00:03:19', '2025-10-06 00:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('invenbar-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:6:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"manage barang\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"delete barang\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:13:\"view kategori\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"manage kategori\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"view lokasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:13:\"manage lokasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:7:\"petugas\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1760407292);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(2, 'Mebel & Furnitur', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(3, 'Alat Tulis Kantor (ATK)', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(4, 'Aset Gedung', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(7, 'Kesehatan', '2025-10-05 23:35:32', '2025-10-05 23:35:32'),
(8, 'Kebersihan', '2025-10-05 23:37:07', '2025-10-05 23:37:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Rapat Utama', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(2, 'Lobi Depan', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(3, 'Gudang Arsip', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(4, 'Ruang Kepala Dinas', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(5, 'LAB PPLGB2', '2025-10-05 23:32:28', '2025-10-05 23:32:28'),
(6, 'Lab PPLG 1', '2025-10-05 23:33:43', '2025-10-05 23:43:38'),
(7, 'Lab PPLG 3', '2025-10-05 23:33:58', '2025-10-05 23:44:04'),
(8, 'UKS', '2025-10-06 00:01:35', '2025-10-06 00:01:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_16_022037_create_permission_tables', 1),
(5, '2025_09_16_035355_create_kategoris_table', 1),
(6, '2025_09_16_035416_create_lokasis_table', 1),
(7, '2025_09_16_035444_create_barangs_table', 1),
(8, '2025_09_24_071829_create_peminjamans_table', 2),
(9, '2025_09_29_013131_create_peminjaman_table', 3),
(10, '2025_09_29_013131_create_peminjamans_table', 4),
(11, '2025_09_29_022036_create_peminjamans_table', 5),
(12, '2025_09_29_023024_create_peminjamans_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(255) NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `kontak_peminjam` varchar(255) NOT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali_rencana` date NOT NULL,
  `tanggal_kembali_aktual` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') NOT NULL DEFAULT 'dipinjam',
  `kondisi_pinjam` enum('baik','rusak ringan','rusak berat') NOT NULL,
  `kondisi_kembali` enum('baik','rusak ringan','rusak berat') DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `catatan` text DEFAULT NULL,
  `catatan_pengembalian` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `kode_peminjaman`, `barang_id`, `nama_peminjam`, `kontak_peminjam`, `divisi`, `tanggal_pinjam`, `tanggal_kembali_rencana`, `tanggal_kembali_aktual`, `status`, `kondisi_pinjam`, `kondisi_kembali`, `jumlah`, `catatan`, `catatan_pengembalian`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'PJM-20250930-0001', 1, 'rara', '09876543', 'tata usaha', '2025-09-30', '2025-10-03', NULL, 'terlambat', 'baik', NULL, 10, 'untuk keperluan rapat', NULL, 2, '2025-09-30 16:50:12', '2025-10-05 23:26:27'),
(6, 'PJM-20251001-0001', 4, 'yulia', '09876543', 'Tata usaha', '2025-10-01', '2025-10-03', '2025-10-01', 'dikembalikan', 'baik', 'rusak ringan', 1, 'Keperluan untuk rapat', 'BARANG RUSAK RINGAN', 2, '2025-09-30 17:03:16', '2025-09-30 20:04:33'),
(7, 'PJM-20251001-0002', 3, 'Anita', '098765432', 'guru', '2025-10-01', '2025-10-02', NULL, 'terlambat', 'rusak ringan', NULL, 1, 'untuk rapat', NULL, 1, '2025-09-30 20:19:16', '2025-10-05 23:26:27'),
(8, 'PJM-20251001-0003', 5, 'rosa', '09876543', 'guru', '2025-10-01', '2025-10-02', NULL, 'terlambat', 'baik', NULL, 1, 'untuk rapat', NULL, 1, '2025-09-30 20:20:24', '2025-10-05 23:26:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage barang', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(2, 'delete barang', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(3, 'view kategori', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(4, 'manage kategori', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(5, 'view lokasi', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(6, 'manage lokasi', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'petugas', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09'),
(2, 'admin', 'web', '2025-09-21 17:54:09', '2025-09-21 17:54:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 1),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4dVmh1OpVx12OeGeb5lOFY2XOePLfsn3wcrUcqKN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQURQQjBINFlTRnpOUjc2bUtLUFZCWEw3UkZSMFZ6MEJlek5zMjU2NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771320018),
('CLWeATQ1nOaGq9F4Ei5IcGsCRAWtAMbaClpGuAmq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmkxZ0dsQWNob21WdG1MdzNmQjJCeFBmMnNSTkJ3QVhhOEI2Y3Y5VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1760486833),
('M580R8r0NwlxwyffDszBVqtu1NK1JcUGPqD79W2H', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia3YzbFhMdEE5TUdUbzdWeDJwcHY1bW52NnhlejFLTGZOWDR4MXlFVyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGVtaW5qYW1hbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1760342177),
('OLA7FVZy7ISXkx3kqnAasgQLRlohTZFKBKPKadkT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmlVREx4RENwZGpnaThYZjNmalVJTEdUZ0pjclJ1d1FZVlNPSDhZdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1775186280),
('UC8D0USrNmMalNg31W4jAYY9HpWjRw2xPbI3M6P2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1o1NE5FOHc2eU95UlVKSEJRUHc4MURobjdGbkRCT2xMVUhMcXV2byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1760328763);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '2025-09-21 17:54:10', '$2y$12$AKSvWC.mgsO6W6wcTYaKAegXXiulx4gIbji1uxYIF9Go/3WZrUs9e', 'tBsg0m0T4YegMtMF16rmCXpQUEAuAlrPP4wZF3D9aAYQ7p7J7HtfWLr2NR37', '2025-09-21 17:54:11', '2025-09-21 17:54:11'),
(2, 'Petugas Inventaris', 'petugas@mail.com', '2025-09-21 17:54:11', '$2y$12$AKSvWC.mgsO6W6wcTYaKAegXXiulx4gIbji1uxYIF9Go/3WZrUs9e', 'Rs1vQHu2Lc1hmrwB4dPc2llnafyp3mB1oOTLCBaQqPzcmHYEgtFVbBub5VE3', '2025-09-21 17:54:11', '2025-09-21 17:54:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_kode_barang_unique` (`kode_barang`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barangs_lokasi_id_foreign` (`lokasi_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peminjamans_kode_peminjaman_unique` (`kode_peminjaman`),
  ADD KEY `peminjamans_barang_id_foreign` (`barang_id`),
  ADD KEY `peminjamans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barangs_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
