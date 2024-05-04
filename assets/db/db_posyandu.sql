-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2024 pada 16.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak`
--

CREATE TABLE `anak` (
  `id` int(11) NOT NULL,
  `id_kms` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posyandu_id` int(11) NOT NULL,
  `orang_tua_id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` varchar(32) NOT NULL,
  `golongan_darah` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `is_death` tinyint(1) NOT NULL DEFAULT 0,
  `bb_lahir` int(11) NOT NULL,
  `pb_lahir` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anak`
--

INSERT INTO `anak` (`id`, `id_kms`, `user_id`, `posyandu_id`, `orang_tua_id`, `nik`, `jk`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `alamat`, `anak_ke`, `is_death`, `bb_lahir`, `pb_lahir`, `created_at`, `updated_at`) VALUES
(1, 9999, 3, 5, 2, 838383, 'L', 'Jombang', '2024-02-12', 'O', 'Jl.Pramuka', 3, 0, 0, 0, '2024-02-18 08:18:40', '2024-02-18 08:18:40'),
(2, 93939, 11, 1, 2, 99922, 'P', 'Jakarta', '2024-02-14', 'O', 'Jl.Pramuka', 2, 1, 0, 0, '2024-02-23 08:50:18', '2024-02-23 08:50:18'),
(3, 43434, 13, 1, 1, 9409403, 'L', 'Jombang', '2024-02-24', 'A', 'Jakarta Selatan', 2, 0, 0, 0, '2024-02-24 06:32:03', '2024-02-24 06:32:03'),
(4, 0, 24, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-07 02:10:46', '2024-04-07 02:10:46'),
(5, 0, 25, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-07 02:12:43', '2024-04-07 02:12:43'),
(6, 0, 26, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-07 02:40:51', '2024-04-07 02:40:51'),
(7, 0, 27, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-07 02:41:33', '2024-04-07 02:41:33'),
(8, 0, 28, 6, 6, 0, 'P', 'Jakarta', '2024-04-07', '', 'Jakarta Selatan', 1, 0, 12, 21, '2024-04-07 02:44:04', '2024-04-07 02:44:04'),
(9, 0, 29, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-08 03:07:28', '2024-04-08 03:07:28'),
(10, 0, 31, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-24 15:19:04', '2024-04-24 15:19:04'),
(11, 0, 32, 7, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-24 15:37:06', '2024-04-24 15:37:06'),
(12, 0, 34, 0, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-27 03:35:32', '2024-04-27 03:35:32'),
(13, 0, 35, 1, 0, 0, 'L', '', '', '', '', 0, 0, 0, 0, '2024-04-27 03:36:29', '2024-04-27 03:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(32) NOT NULL,
  `kategori` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `deskripsi`, `image`, `kategori`, `created_at`, `updated_at`) VALUES
(6, 'one piece', 'mantap', '1_submit_candidat1.png', '2', '2024-02-22 17:41:45', '2024-02-22 17:41:45'),
(7, 'Test', 'sasasas', '5083153.jpg', '2', '2024-02-24 07:11:25', '2024-02-24 07:11:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gizi_anak`
--

CREATE TABLE `gizi_anak` (
  `id` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `timbangan_anak_id` int(11) NOT NULL,
  `status_gizi` varchar(23) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gizi_ibu_hamil`
--

CREATE TABLE `gizi_ibu_hamil` (
  `id` int(11) NOT NULL,
  `bumil_id` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `trimester` varchar(11) NOT NULL,
  `sesi` int(11) NOT NULL,
  `nilai_gizi` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gizi_ibu_hamil`
--

INSERT INTO `gizi_ibu_hamil` (`id`, `bumil_id`, `berat_badan`, `tinggi_badan`, `trimester`, `sesi`, `nilai_gizi`, `created_at`, `updated_at`) VALUES
(1, 4, 50, 160, 'Trimester 2', 2, 19.53125, '2024-03-12 03:33:08', '2024-03-12 03:33:08'),
(2, 4, 65, 150, 'Trimester 1', 6, 28.888888888889, '2024-03-12 03:33:08', '2024-03-12 03:33:08'),
(4, 3, 50, 160, 'Trimester 3', 2, 19.53125, '2024-03-12 03:33:08', '2024-03-12 03:33:08'),
(5, 4, 50, 178, 'Trimester 2', 2, 15.780835753061, '2024-03-12 03:33:56', '2024-03-12 03:33:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gizi_status`
--

CREATE TABLE `gizi_status` (
  `id` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `g_min` double NOT NULL,
  `g_middle` double NOT NULL,
  `g_max` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gizi_status`
--

INSERT INTO `gizi_status` (`id`, `umur`, `jk`, `g_min`, `g_middle`, `g_max`, `created_at`, `updated_at`) VALUES
(1, 0, 'P', 1.7, 2.1, 4, '2024-04-07 04:41:12', '2024-04-07 04:41:12'),
(2, 1, 'P', 2.1, 2.7, 5.1, '2024-04-07 04:41:41', '2024-04-07 04:41:41'),
(3, 0, 'L', 1.9, 2.3, 4.3, '2024-04-07 06:01:47', '2024-04-07 06:01:47'),
(6, 1, 'L', 2.1, 2.8, 5.5, '2024-04-08 00:51:39', '2024-04-08 00:51:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibu`
--

CREATE TABLE `ibu` (
  `id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `n_ibu` varchar(36) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ibu`
--

INSERT INTO `ibu` (`id`, `nik`, `n_ibu`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 20221006, 'Santi', 'Jakarta', '2024-02-19', 'O', 'Jl. Kunyit', '87777', '2024-02-18 17:19:06', '2024-02-18 17:19:06'),
(2, 989898, 'Siti', 'Jombang', '2024-02-12', 'A', 'Jl.Cikini', '87777', '2024-02-19 03:46:24', '2024-02-19 03:46:24'),
(3, 111111, 'maryam', 'Jakarta', '2024-02-20', 'O', 'Jl. Gatot Kaca', '939393', '2024-02-19 03:55:34', '2024-02-19 03:55:34'),
(5, 12343434, 'Sumiyanti', '', '', '', 'Buaran', '0877777', '2024-04-07 02:03:58', '2024-04-07 02:03:58'),
(6, 3232323, 'Annisa', '', '', '', 'Jl.Pramuka', '081234', '2024-04-07 02:08:34', '2024-04-07 02:08:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibu_hamil`
--

CREATE TABLE `ibu_hamil` (
  `id` int(11) NOT NULL,
  `no_medis` varchar(32) NOT NULL,
  `nik` varchar(36) NOT NULL,
  `password` varchar(100) NOT NULL,
  `n_ibu` varchar(50) NOT NULL,
  `n_suami` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `pekerjaan` varchar(36) NOT NULL,
  `agama` varchar(36) NOT NULL,
  `pendidikan_terakhir` varchar(36) NOT NULL,
  `riwayat_penyakit` varchar(36) NOT NULL,
  `is_death` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ibu_hamil`
--

INSERT INTO `ibu_hamil` (`id`, `no_medis`, `nik`, `password`, `n_ibu`, `n_suami`, `alamat`, `telepon`, `tgl_lahir`, `golongan_darah`, `pekerjaan`, `agama`, `pendidikan_terakhir`, `riwayat_penyakit`, `is_death`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'K-0012', '20221006', '$2y$10$WPi9x6rAEtz93yNgwzLJ0.G9rw7fCmhma0Cp/wIkODiu6rmCtrO3i', 'Nurjanah', 'Aripin', 'Buaran', '87777', '2024-03-05', 'A', 'Guru', 'Islam', 'S2', '-', 1, '9720037.jpg', '2024-03-05 09:32:50', '2024-03-05 09:32:50'),
(4, '99999', '123', '$2y$10$WPi9x6rAEtz93yNgwzLJ0.G9rw7fCmhma0Cp/wIkODiu6rmCtrO3i', 'Maryam', 'Riski', 'JAKARTA', '08080808080808656565', '', 'O', 'Guru', 'Islam', 'S2', '-', 0, '97200371.jpg', '2024-03-06 02:23:09', '2024-03-06 02:23:09'),
(6, 'K-0015', '20221006', '1234', 'Siti', 'Ahmad', 'Jakarta Timur', '9090909', '2024-03-22', 'AB', 'Guru', 'Islam', 'S2', '-', 0, '', '2024-03-22 03:35:20', '2024-03-22 03:35:20'),
(7, 'K-0016', '20221006', '1234', 'Riska', 'Riski', 'Jl.Cikini', '08939401', '', 'O', 'Guru', 'Islam', 'S1', '-', 0, '', '2024-03-24 08:19:49', '2024-03-24 08:19:49'),
(8, 'K-0017', '321', '$2y$10$xMtwM28Su4HRYWj9LdAIUuW177Z36VkxC9a7EQNJ4BhIuglmPDn6C', 'Ayu', 'Sueb', 'Jakarta Selatan', '08939393', '', 'A', 'Guru', 'Islam', 'S2', '-', 0, 'default_jpg.jpg', '2024-03-24 23:03:50', '2024-03-24 23:03:50'),
(9, '3434', '202210064', '$2y$10$iPeRt.rL3FQeE78.F7fuoeObtuOtGJdJ18/ZOXxsQulWKNUTRY7Ay', 'Suryani', 'Sueb', 'Jl.Cikini', '0887777', '', 'O', 'Guru', '', 'S1', '-', 0, 'Screenshot_2024-04-01_at_11_27_46.pn', '2024-04-01 08:52:31', '2024-04-01 08:52:31'),
(10, 'K-0013', '20221006', '', 'Fans', 'Riski', 'Jl.Cikini', '083232323', '', '0', '', '', '', '', 0, '', '2024-04-04 08:03:07', '2024-04-04 08:03:07'),
(11, 'K-0013', '1', '', 'Susanti', 'Riski', 'JAKARTA', '08939393', '', 'O', '', '', '', '', 0, '', '2024-04-04 10:54:32', '2024-04-04 10:54:32'),
(12, '12345', '1111', '$2y$10$ObckFKY.1e5c6l48DYh4HeYpDmSzCgZx9M/elOKaeHhXeCVIZFenO', 'Yolanda', 'Riski', 'Jl.Cikini', '08999', '', 'O', '', '', '', '', 0, '', '2024-04-06 23:33:37', '2024-04-06 23:33:37'),
(13, '3323444', '4444', '$2y$10$cTBl7puT7I30/nXE77vz1eg2v1N3WldUxQQzJoeJGXjoE8ySi02Tq', 'Sania', 'Soni', 'JAKARTA', '08999999', '', 'O', '', '', '', '', 0, '', '2024-04-27 03:33:37', '2024-04-27 03:33:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tanggal_imunisasi` varchar(36) NOT NULL,
  `jam_masuk` varchar(36) NOT NULL,
  `jam_keluar` varchar(36) NOT NULL,
  `tipe_imunisasi_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `anak_id`, `tanggal_imunisasi`, `jam_masuk`, `jam_keluar`, `tipe_imunisasi_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-02-12', '', '', 1, 2, '2024-02-20 06:49:56', '2024-02-20 06:49:56'),
(3, 13, '2024-02-24', '', '', 6, 1, '2024-02-24 07:48:21', '2024-02-24 07:48:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaders`
--

CREATE TABLE `kaders` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `posyandu_id` int(20) NOT NULL,
  `nik` int(20) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kaders`
--

INSERT INTO `kaders` (`id`, `user_id`, `posyandu_id`, `nik`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `pendidikan_terakhir`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 99999, 'Sekretaris', 'Jombang', '2024-02-18', 'Jl.Cikini', '87777', 'S2', '2024-02-17 11:09:50', '2024-02-17 11:09:50'),
(2, 4, 7, 0, 'Sekretaris', 'Jakarta', '2024-02-13', 'Jl.Pramuka', '089090909', 'S1', '2024-02-17 11:43:51', '2024-02-17 11:43:51'),
(4, 6, 1, 84748474, 'Ketua', 'Jakarta', '2024-02-19', 'Bekasi', '999', 'S1', '2024-02-17 11:54:52', '2024-02-17 11:54:52'),
(5, 7, 5, 0, 'Sekretaris', 'Jakarta', '2024-02-29', 'JAKARTA', '0', 'S1', '2024-02-17 12:00:07', '2024-02-17 12:00:07'),
(6, 9, 0, 0, '', '', '', '', '0', '', '2024-02-17 18:07:54', '2024-02-17 18:07:54'),
(7, 10, 1, 938383, 'Ketua', 'Jakarta', '2024-02-20', 'Jl. Gatot Kaca', '08218222', 'S1', '2024-02-19 13:34:56', '2024-02-19 13:34:56'),
(8, 12, 0, 0, '', '', '', '', '0', '', '2024-02-24 02:43:21', '2024-02-24 02:43:21'),
(9, 14, 0, 0, '', '', '', '', '0', '', '2024-02-24 07:44:51', '2024-02-24 07:44:51'),
(10, 15, 1, 0, '', '', '', '', '0', '', '2024-02-24 07:45:21', '2024-02-24 07:45:21'),
(11, 16, 0, 0, '', '', '', '', '0', '', '2024-02-27 13:33:52', '2024-02-27 13:33:52'),
(12, 18, 0, 0, '', '', '', '', '0', '', '2024-02-27 13:45:15', '2024-02-27 13:45:15'),
(13, 30, 7, 0, 'Sekretaris', 'Jakarta', '2024-04-24', 'Jl.Pramuka', '08999999', 'S1', '2024-04-24 14:49:31', '2024-04-24 14:49:31'),
(14, 33, 8, 111, 'Ketua', 'Jombang', '2024-04-24', 'Buaran', '08999999', 'S1', '2024-04-24 15:43:47', '2024-04-24 15:43:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(36) NOT NULL,
  `kategori` varchar(36) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` varchar(36) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `kategori`, `deskripsi`, `waktu`, `image`, `created_at`, `updated_at`) VALUES
(2, 'dddddd', 'anak', 'sasasas', '2024-03-13', '5083153.jpg', '2024-03-13 07:19:02', '2024-03-13 07:19:02'),
(3, 'one piece', 'bumil', '&lt;h1&gt;sasas&lt;/h1&gt;&lt;p&gt;sasassasasssddsdsdsd dsdsdsd dsojdsojdso lorem  fodkodfk&lt;strong&gt; fdodok dsdsd&lt;/strong&gt; dsdsd&lt;em&gt; dsdsds&lt;/em&gt; dsdsd&lt;u&gt;ds dsdsds&lt;/u&gt;&lt;/p&gt;&lt;p&gt;sasasssssssssss dsdsds dsdsd koko ok oko ko ko ko ko ko kokoko kok ok ok ok ok ok okokokoko kokokok kokokok okoko koko ko kok ok ok ok ok ok ok o&lt;/p&gt;', '2024-03-13', '9720037.jpg', '2024-03-13 07:47:07', '2024-03-13 07:47:07'),
(4, 'as', 'anak', '&lt;h1&gt;asassa sasasss&lt;/h1&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;assasasas sdsdsdsd sdsdsdsd sd as dasdsdsds ds d sdsdsdsd ssds dsdsdsdsaa sds ad asd asd s dsd sdssdss dsd ds ds sdsdsd&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;sdsdsdsdsdsdsdsdsdsddddddsas sasassdksokdso mook ok ok ok okoko ko ko k okoko kokoko ko ko ko koko kok okokokokokdokoskdsddsds dsdsdsdsdskds dsdsodkodsds dsdoksdoksod dsokdsokdsod dsokdsokdod dokdsokdod doskdokds dokdokdfeskofds fdofkdofksofkdsof dofkdsofkdfd fdokfdockdod fdofkdof dokfdof&lt;/p&gt;', '2024-03-13', '50831531.jpg', '2024-03-13 08:05:35', '2024-03-13 08:05:35'),
(5, 'Masuk', 'bumil', '&lt;p class=&quot;ql-align-justify&quot;&gt;masuk bang hehehehehe&lt;strong&gt;wawwdw ddssd&lt;em&gt;dsdddddddd&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;strong&gt;&lt;em&gt;dsdsdd&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;strong&gt;&lt;em&gt;dddddds&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;strong&gt;&lt;em&gt;dsdsd&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;strong&gt;&lt;em&gt;d&lt;/em&gt;&lt;/strong&gt;ddsddd&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;br&gt;&lt;/p&gt;', '2024-04-13', '62b564cc52531_300x300.png', '2024-04-13 13:38:25', '2024-04-13 13:38:25'),
(6, 'paten', 'anak', '&lt;p&gt;sasass sasasa sasasas&lt;/p&gt;&lt;p&gt;sasasa&lt;/p&gt;&lt;p&gt;sasasas&lt;/p&gt;', '2024-04-18', 'WhatsApp_Image_2024-03-02_at_21_21_15.jpeg', '2024-04-19 22:41:55', '2024-04-19 22:41:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehamilan`
--

CREATE TABLE `kehamilan` (
  `id` int(11) NOT NULL,
  `bumil_id` int(11) NOT NULL,
  `hamil_ke` int(10) NOT NULL,
  `hpht` varchar(20) NOT NULL,
  `htp` varchar(20) NOT NULL,
  `jml_kehamilan` int(11) NOT NULL,
  `jml_keguguran` int(11) NOT NULL,
  `jml_lahir_hidup` int(11) NOT NULL,
  `jml_lahir_mati` int(11) NOT NULL,
  `jarak_persalinan_terakhir` int(11) NOT NULL,
  `jenis_persalinan_terakhir` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kehamilan`
--

INSERT INTO `kehamilan` (`id`, `bumil_id`, `hamil_ke`, `hpht`, `htp`, `jml_kehamilan`, `jml_keguguran`, `jml_lahir_hidup`, `jml_lahir_mati`, `jarak_persalinan_terakhir`, `jenis_persalinan_terakhir`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2024-03-18', '2024-03-18', 2, 0, 3, 1, 6, 'Normal', '2024-03-17 16:38:13', '2024-03-17 16:38:13'),
(3, 4, 2, '2024-03-21', '2024-03-23', 2, 3, 3, 1, 7, '', '2024-03-22 02:04:22', '2024-03-22 02:04:22'),
(4, 6, 1, '2024-03-19', '2024-04-03', 2, 3, 3, 1, 7, '', '2024-03-24 06:40:18', '2024-03-24 06:40:18'),
(5, 6, 2, '2024-03-27', '2024-03-27', 2, 3, 3, 5, 6, '', '2024-03-24 07:05:14', '2024-03-24 07:05:14'),
(6, 4, 3, '2024-03-12', '2024-03-29', 2, 0, 3, 0, 6, '', '2024-03-24 22:10:41', '2024-03-24 22:10:41'),
(7, 7, 1, '2024-03-26', '2024-03-26', 2, 0, 3, 1, 7, 'SC', '2024-03-24 22:26:35', '2024-03-24 22:26:35'),
(8, 4, 3, '2024-03-30', '2024-03-30', 2, 0, 3, 1, 0, 'SC', '2024-03-30 01:43:05', '2024-03-30 01:43:05'),
(9, 10, 1, '2024-04-04', '2024-04-05', 2, 0, 3, 0, 6, 'tidak ada', '2024-04-04 08:05:14', '2024-04-04 08:05:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian_anak`
--

CREATE TABLE `kematian_anak` (
  `id` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_kematian` varchar(36) NOT NULL,
  `penyebab` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kematian_anak`
--

INSERT INTO `kematian_anak` (`id`, `anak_id`, `tgl_kematian`, `penyebab`, `created_at`, `updated_at`) VALUES
(7, 11, '2024-04-06', 'Sakit kepala', '2024-04-06 09:50:04', '2024-04-06 09:50:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian_ibu_hamil`
--

CREATE TABLE `kematian_ibu_hamil` (
  `id` int(11) NOT NULL,
  `bumil_id` int(11) NOT NULL,
  `tgl_kematian` varchar(32) NOT NULL,
  `usia` int(11) NOT NULL,
  `penyebab` varchar(36) NOT NULL,
  `jenis` varchar(36) NOT NULL,
  `meninggal_di` varchar(36) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kematian_ibu_hamil`
--

INSERT INTO `kematian_ibu_hamil` (`id`, `bumil_id`, `tgl_kematian`, `usia`, `penyebab`, `jenis`, `meninggal_di`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 3, '2024-03-07', 3, 'Kelainan Jantung', 'Meninggal sebelum melahirkan', 'Rumah Sakit', 'Bayi selamat', '2024-03-06 02:31:44', '2024-03-06 02:31:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring_ibu_hamil`
--

CREATE TABLE `monitoring_ibu_hamil` (
  `id` int(11) NOT NULL,
  `bumil_id` int(11) NOT NULL,
  `kehamilan_id` int(11) NOT NULL,
  `hamil_ke` int(11) NOT NULL,
  `tanggal_periksa` varchar(36) NOT NULL,
  `keluhan` varchar(36) NOT NULL,
  `kunjungan` varchar(36) NOT NULL,
  `sesi` int(11) NOT NULL,
  `tekanan_darah` varchar(20) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `umur_kehamilan` int(11) NOT NULL,
  `tinggi_fundus` int(11) NOT NULL,
  `umur_ibu` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `status_gizi` varchar(36) NOT NULL,
  `hiv` varchar(36) NOT NULL,
  `hibsag` varchar(36) NOT NULL,
  `sifilis` varchar(36) NOT NULL,
  `lila` varchar(36) NOT NULL,
  `kunjungan_berikutnya` varchar(36) NOT NULL,
  `keterangan` varchar(36) NOT NULL,
  `s_timbang_berat_badan` varchar(36) NOT NULL,
  `s_tekanan_darah` varchar(36) NOT NULL,
  `s_tinggi_puncak_rahim` varchar(36) NOT NULL,
  `s_vaksinasi_tetanus` varchar(36) NOT NULL,
  `s_tablet_zat_besi` varchar(36) NOT NULL,
  `s_tes_laboratorium` varchar(36) NOT NULL,
  `s_temu_wicara` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `monitoring_ibu_hamil`
--

INSERT INTO `monitoring_ibu_hamil` (`id`, `bumil_id`, `kehamilan_id`, `hamil_ke`, `tanggal_periksa`, `keluhan`, `kunjungan`, `sesi`, `tekanan_darah`, `berat_badan`, `umur_kehamilan`, `tinggi_fundus`, `umur_ibu`, `tinggi_badan`, `status_gizi`, `hiv`, `hibsag`, `sifilis`, `lila`, `kunjungan_berikutnya`, `keterangan`, `s_timbang_berat_badan`, `s_tekanan_darah`, `s_tinggi_puncak_rahim`, `s_vaksinasi_tetanus`, `s_tablet_zat_besi`, `s_tes_laboratorium`, `s_temu_wicara`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 3, '2024-04-05', 'Keluhan', 'Trimester 2', 1, '132/80', 50, 4, 20, 75, 150, 'Normal', 'Positif', 'Positif', 'NR', '14', '2024-04-04', 'Selalu dibuka selamanya', 'sudah', 'belum', 'sudah', 'sudah', 'belum', 'sudah', 'sudah', '2024-04-04 08:08:41', '2024-04-04 08:08:41'),
(2, 4, 8, 3, '2024-04-12', 'Keluhan', 'Trimester 1', 1, '132/80', 75, 5, 20, 75, 150, 'Obesitas', 'NR', 'NR', 'NR', '14', '2024-04-23', 'Bayi selamat', 'sudah', 'belum', 'belum', 'sudah', 'belum', 'belum', 'sudah', '2024-04-13 14:37:41', '2024-04-13 14:37:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring_kegiatan_posyandu`
--

CREATE TABLE `monitoring_kegiatan_posyandu` (
  `id` int(11) NOT NULL,
  `kader_id` int(11) NOT NULL,
  `posyandu_id` int(11) NOT NULL,
  `n_kegiatan` text NOT NULL,
  `tujuan` text NOT NULL,
  `sasaran` varchar(36) NOT NULL,
  `parameter_keberhasilan` varchar(32) NOT NULL,
  `j1` varchar(32) NOT NULL,
  `j2` varchar(32) NOT NULL,
  `j3` varchar(32) NOT NULL,
  `j4` varchar(32) NOT NULL,
  `j5` varchar(32) NOT NULL,
  `j6` varchar(32) NOT NULL,
  `j7` varchar(32) NOT NULL,
  `j8` varchar(32) NOT NULL,
  `j9` varchar(32) NOT NULL,
  `j10` varchar(32) NOT NULL,
  `photo` varchar(36) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `monitoring_kegiatan_posyandu`
--

INSERT INTO `monitoring_kegiatan_posyandu` (`id`, `kader_id`, `posyandu_id`, `n_kegiatan`, `tujuan`, `sasaran`, `parameter_keberhasilan`, `j1`, `j2`, `j3`, `j4`, `j5`, `j6`, `j7`, `j8`, `j9`, `j10`, `photo`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'vaksinasi campak', 'tujuanku', 'sasaranku', 'heheh not bad', 'ya', 'tidak', 'ya', 'tidak', 'ya', 'ya', '7', '2', '3', '4', '', 1, '2024-04-07 01:42:39', '2024-04-08 19:43:06'),
(5, 10, 1, 'vaksinasi 12', 'tujuanku', 'sasaranku', 'kokoko', 'tidak', 'ya', 'ya', 'tidak', 'ya', 'ya', '12', '32', '33', '11', 'photo_1712624134.jpeg', 0, '2024-04-09 00:55:34', '2024-04-09 00:55:34'),
(6, 1, 7, 'vaksinasi 3', 'tujuanku', 'ssasa', 'kokoko', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'ya', '2', '3', '1', '2', '', 0, '2024-05-04 11:46:00', '2024-05-04 11:46:00'),
(7, 4, 7, 'Semoga sukses 3', 'tujuanku', 'ssasa', 'semoga sukses', 'tidak', 'ya', 'ya', 'ya', 'tidak', 'ya', '3', '4', '5', '1', '', 0, '2024-05-04 11:49:07', '2024-05-04 11:49:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `bumil_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(36) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `bumil_id`, `message`, `date`, `is_read`, `created_at`) VALUES
(1, 4, 'Jangan Lupa Datang Ya Bunda 2024-04-04', '2024-04-04', 0, '2024-04-04 08:08:41'),
(2, 4, 'Jangan Lupa Datang Ya Bunda 2024-04-23', '2024-04-23', 0, '2024-04-13 14:37:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkembangan_anak`
--

CREATE TABLE `perkembangan_anak` (
  `id` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `usia` int(20) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `nilai_gizi` double NOT NULL,
  `tanggal_periksa` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `perkembangan_anak`
--

INSERT INTO `perkembangan_anak` (`id`, `anak_id`, `usia`, `berat_badan`, `tinggi_badan`, `nilai_gizi`, `tanggal_periksa`, `created_at`, `updated_at`) VALUES
(1, 0, 3, 20, 100, 20, '2024-02-19', '2024-02-19 13:11:47', '2024-02-19 13:11:47'),
(2, 3, 4, 20, 50, 80, '2024-02-13', '2024-02-19 13:14:27', '2024-02-19 13:14:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandu`
--

CREATE TABLE `posyandu` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `n_posyandu` varchar(36) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `posyandu`
--

INSERT INTO `posyandu` (`id`, `user_id`, `n_posyandu`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mawar', 'Jawa Barat', 'Selalu dibuka selamanya', '2024-02-18 07:06:27', '2024-02-18 07:06:27'),
(5, 1, 'Melati', 'Jl.Pramuka', 'SASASASASASASSASASASA', '2024-02-19 13:40:31', '2024-02-19 13:40:31'),
(6, 1, 'Sayang', 'Buaran', 'Selalu dibuka selamanya', '2024-02-27 13:53:29', '2024-02-27 13:53:29'),
(7, 1, 'Tebet', 'tebet timur dalem 9', 'hehehe', '2024-04-24 14:48:24', '2024-04-24 14:48:24'),
(8, 1, 'Putri', 'Jl.Cikini', '1234', '2024-04-24 15:43:10', '2024-04-24 15:43:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kader'),
(3, 'Anak'),
(4, 'Poli Gizi'),
(5, 'Ibu Hamil'),
(6, 'Koordinator Imunisasi'),
(7, 'Bidan'),
(8, 'Poli KIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `posyandu_id` int(11) NOT NULL,
  `tanggal` varchar(36) NOT NULL,
  `jam_buka` varchar(36) NOT NULL,
  `jam_tutup` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id`, `posyandu_id`, `tanggal`, `jam_buka`, `jam_tutup`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-02-19', '09:03', '13:05', '2024-02-21 06:59:40', '2024-02-21 06:59:40'),
(3, 5, '2024-02-21', '14:34', '20:34', '2024-02-21 07:34:32', '2024-02-21 07:34:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timbangan_anak`
--

CREATE TABLE `timbangan_anak` (
  `id` int(11) NOT NULL,
  `anak_id` int(11) NOT NULL,
  `tgl_ukur` varchar(36) NOT NULL,
  `umur` int(11) NOT NULL,
  `lingkar_kepala` int(11) NOT NULL,
  `berat_badan` double NOT NULL,
  `tinggi_badan` double NOT NULL,
  `status_gizi` varchar(25) NOT NULL,
  `photo` varchar(36) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `timbangan_anak`
--

INSERT INTO `timbangan_anak` (`id`, `anak_id`, `tgl_ukur`, `umur`, `lingkar_kepala`, `berat_badan`, `tinggi_badan`, `status_gizi`, `photo`, `keterangan`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 3, '2024-04-01', 1, 20, 2.91, 86, 'Gizi Baik', '', '', '', '2024-03-13 04:43:28', '2024-03-13 04:43:28'),
(5, 3, '2024-04-08', 1, 20, 3, 12, 'Gizi Baik', '', 'Bayi selamat', '', '2024-04-08 03:04:38', '2024-04-08 03:04:38'),
(18, 13, '2024-04-01', 10, 12, 21, 21, '', '', 'Selalu dibuka 24 jam', 'Kader 1', '2024-04-08 10:02:52', '2024-04-08 10:02:52'),
(20, 13, '2024-05-10', 1, 12, 22, 23, 'Gizi Lebih', '', 'asas', 'Kader 1', '2024-04-24 08:14:36', '2024-04-24 08:14:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_imunisasi`
--

CREATE TABLE `tipe_imunisasi` (
  `id` int(11) NOT NULL,
  `n_imunisasi` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tipe_imunisasi`
--

INSERT INTO `tipe_imunisasi` (`id`, `n_imunisasi`, `created_at`, `updated_at`) VALUES
(1, 'BCG', '2024-02-20 04:57:58', '2024-02-20 04:57:58'),
(2, 'Campak', '2024-02-20 04:57:58', '2024-02-20 04:57:58'),
(3, 'Polio I', '2024-02-20 05:02:40', '2024-02-20 05:02:40'),
(4, 'Polio II', '2024-02-20 06:27:43', '2024-02-20 06:27:43'),
(5, 'Polio III', '2024-02-20 06:27:54', '2024-02-20 06:27:54'),
(8, 'Polio IV', '2024-05-04 11:27:38', '2024-05-04 11:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(20) NOT NULL,
  `is_active` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@posyandu.com', '$2y$10$WPi9x6rAEtz93yNgwzLJ0.G9rw7fCmhma0Cp/wIkODiu6rmCtrO3i', 'default.jpg', 1, 1, '2024-02-17 10:22:19', '2024-02-17 10:22:19'),
(2, 'Faqih', 'ahmadfaqih796@gmail.com', '$2y$10$p/PHX5qM7F6d5P2w7Eu88Om93qKIiUX8vb2hqleudb33FRXqqrNoy', 'default.jpg', 2, 1, '2024-02-17 10:42:32', '2024-02-17 10:42:32'),
(3, 'Aji', 'aji@gmail.com', '$2y$10$CsvXFJuHOeHbaDtwd3MLf.xWHXBUGkjm.8SaHoQ2rcUQyKdrW8XXa', 'default.jpg', 3, 1, '2024-02-17 11:03:16', '2024-02-17 11:03:16'),
(4, 'Sopo', 'adit@gmail.com', '$2y$10$rvWvUbsGFwXcRcZAsrtDiuwDk.gcxrY0dlD1swX7g0GB1hYXHnW3W', 'default.jpg', 2, 1, '2024-02-17 11:36:16', '2024-02-17 11:36:16'),
(6, 'master', 'admin@hadir.com', '$2y$10$sb69zgdhCDtm1Cmx2Q8X3uPN.sxyXpjLsQRRfFeDcq2noyxc4cAQS', 'default.jpg', 2, 0, '2024-02-17 11:53:21', '2024-02-17 11:53:21'),
(7, 'Ahmad Faqih Arifin', 'admin@connector.com', '$2y$10$ZZLJQlewVpj7Trcu05eFQO3qcpjSkXHKNOffuVQ63d2Fo2BN6g61i', 'default.jpg', 2, 1, '2024-02-17 11:59:52', '2024-02-17 11:59:52'),
(8, 'Andoyo', 'andi@mail.com', '$2y$10$4IYFnUo5P.vH3EVY.wgO4.OXrctGRuH2hykAO0KDN/5qNbm7mhyC2', 'default.jpg', 6, 1, '2024-02-17 18:04:10', '2024-02-17 18:04:10'),
(9, 'Matematika SD', 'faqih@jc.com', '$2y$10$la2bxz9vYamu68.A9FIX5eweSlKZp4KNcHf0ltn.DK6QFNngbKsVa', 'default.jpg', 2, 1, '2024-02-17 18:07:33', '2024-02-17 18:07:33'),
(10, 'Kader 1', 'kader@mail.com', '$2y$10$Hqz8v9oUM24y2gQLyrq9cOYVVjtbdDB/xvecnYqDIRQn3lPJtEU1e', 'default.jpg', 2, 1, '2024-02-19 13:33:52', '2024-02-19 13:33:52'),
(11, 'Ani', 'ani@mail.com', '$2y$10$unkhCF54Bm3OhyMPB4Hx5OKZhLCEC9UhUzcWCXm1Av9TtK8ugQhr6', 'default.jpg', 3, 1, '2024-02-23 08:50:18', '2024-02-23 08:50:18'),
(12, 'Ahmad Faqih Arifin', 'faqih21212@jc.com', '$2y$10$yeCxXXX6W/y46Mk9x71w/..RlThhhLXxVA/8cHrY1oigm5rrMCGle', 'default.jpg', 2, 1, '2024-02-24 02:42:53', '2024-02-24 02:42:53'),
(13, 'Aldi', 'aldi@mail.com', '$2y$10$iOTkA9xOUX2V.LgEqBwZC.J319eF/Y7CrVfibJkGI7JksLfxduIfS', 'default.jpg', 3, 1, '2024-02-24 06:32:03', '2024-02-24 06:32:03'),
(14, 'Riska', 'riska@gmail.com', '$2y$10$xfrv2HQ5CtB4On1XxYIYlOVi2XesbipugsjGHHrZ3lqpcFjxMpjAa', 'default.jpg', 2, 1, '2024-02-24 07:43:04', '2024-02-24 07:43:04'),
(15, 'Riska', 'riska@mail.com', '$2y$10$feNUDBk6l40bkemsyLzl4.m6NTbEjG1GdneneMFlehFjRRphHiqoK', 'default.jpg', 2, 1, '2024-02-24 07:43:09', '2024-02-24 07:43:09'),
(16, 'aaa', 'fery@gmail.com', '$2y$10$RTeeOcNrN8MSjTTAZiFR3uknZcJtcSc2d2KocdSbPfFNKPKyoxWuO', 'default.jpg', 2, 1, '2024-02-27 13:33:05', '2024-02-27 13:33:05'),
(17, 'ferry', 'ferry', '$2y$10$HAxfCi9GxAKpZHmf25hTNu7RJh/JHNnYqRvyDx2V/PwwLpMut9yru', 'default.jpg', 1, 0, '2024-02-27 13:40:55', '2024-02-27 13:40:55'),
(18, 'ferry', 'ferry@', '$2y$10$Oki4Lgv13ZU9q4EoVwDKNOB7q0C2xYuSZPL87UIuKPFEXkDZKTC.O', 'default.jpg', 2, 1, '2024-02-27 13:44:46', '2024-02-27 13:44:46'),
(19, 'Bidan Putri', 'putri@mail.com', '$2y$10$oaFAEv0FwkIrhl0SdgRwsOrM4Wb5MdgpNUmKl/SKHQvl.IHmrFGZW', 'default.jpg', 7, 1, '2024-03-20 02:38:31', '2024-03-20 02:38:31'),
(20, 'Gmase', 'gmase@mail.com', '$2y$10$p12aSqUJo20ms/8VfuUzkOmqH0l67NV0TeavYZQUbVlxD5yFJeiWC', 'default.jpg', 5, 0, '2024-03-20 02:45:09', '2024-03-20 02:45:09'),
(21, 'Tina', 'tina@mail.com', '$2y$10$ZNMYZZsEr6ATJfLgdF28mOex7dtaw3l2ZhE8aSyvwblQH8mtmDzoe', 'default.jpg', 5, 1, '2024-03-20 02:46:20', '2024-03-20 02:46:20'),
(22, 'Joni', 'polikia@mail.com', '$2y$10$YLhp27m4TvwuvBL9Zt/XI.OfkUI4vjwCOhFiwijqtphuXOdbzcHZW', 'default.jpg', 8, 1, '2024-04-06 10:23:52', '2024-04-06 10:23:52'),
(23, 'Syamsul', 'poligizi@mail.com', '$2y$10$nzMnZ6sDeZ33LIGxOBfuueJgOd80l2ZOpigZMAKLjO2kXcQnYQbeG', 'default.jpg', 4, 1, '2024-04-06 10:24:37', '2024-04-06 10:24:37'),
(24, 'Doni', 'doni@mail.com', '$2y$10$z5ihpsQtfMxdRpMjYw/21OCO1Dme5PnNnRBCL47/wzNjsA50URjyO', 'default.jpg', 3, 1, '2024-04-07 02:10:46', '2024-04-07 02:10:46'),
(25, 'Susanti', 'susanti@mail.com', '$2y$10$9HhR8ueW6y1HlAIjwfN1Led7fZpeAGtamip61cVhoYhtJNO.aIPUO', 'default.jpg', 3, 1, '2024-04-07 02:12:36', '2024-04-07 02:12:36'),
(26, 'master', 'master@mail.com', '$2y$10$6yh7FLCq31UO31GipBNEPunTVLB5MveT0JQyLosDUSZiN66WDuJ46', 'default.jpg', 3, 1, '2024-04-07 02:40:51', '2024-04-07 02:40:51'),
(27, 'faqihproject', 'faqih@test.com', '$2y$10$s9BYcgXs/birxQIJ80qwB.ytioGyUtnLHsDXTbBWn4sKVHEkJFZjO', 'default.jpg', 3, 1, '2024-04-07 02:41:33', '2024-04-07 02:41:33'),
(28, 'Riska Cantik', 'riska123@mail.com', '$2y$10$L8nxMuALX6.lbsG8ZEL9IO4Iop8Dh95k2YVZN7ERRG1YGjtclEqhq', 'default.jpg', 3, 1, '2024-04-07 02:44:04', '2024-04-07 02:44:04'),
(29, 'Jopi', 'jopi@mail.com', '$2y$10$ca1np5VRm13KbstXbdxBGe7HGRL/NEDYF/bgiWBiU/pfv3oAi6EPy', 'default.jpg', 3, 1, '2024-04-08 03:07:28', '2024-04-08 03:07:28'),
(30, 'Tebet', 'tebet@mail.com', '$2y$10$UPhywcDUBVVkhSMkjBE4guzeOlrDMfcVtPo1GJeC.6wDAV4dmzWsa', 'default.jpg', 2, 1, '2024-04-24 14:49:07', '2024-04-24 14:49:07'),
(31, 'Ririn', 'ririn@mail.com', '$2y$10$SmhL5knLhIj/fYF2jtiO0ORuVBmySvnmC9m4Yj8j0mZI8NW7rgRPu', 'default.jpg', 3, 1, '2024-04-24 15:19:04', '2024-04-24 15:19:04'),
(32, 'test', 'test12@hadir.com', '$2y$10$xiL1pbsJGkhQGoidhlrSEeRuQFC0NGEqfKqZGvGt3gdckgAZ8G.XW', 'default.jpg', 3, 1, '2024-04-24 15:37:06', '2024-04-24 15:37:06'),
(33, 'hehe', 'hehe@mail.com', '$2y$10$xayvgE4q8DSj56Vov7PPEeD.KrOVUcKR/dvdhd/T2o15xWX5BMfFK', 'default.jpg', 2, 1, '2024-04-24 15:43:39', '2024-04-24 15:43:39'),
(34, 'Asep', 'asep@mail.com', '$2y$10$Tob4OF7bGShQew8QbUy9aev/6kSHOxYFjwg/jxC1EUHsI3SkM/OdW', 'default.jpg', 3, 1, '2024-04-27 03:35:23', '2024-04-27 03:35:23'),
(35, 'Suep', 'suep@mail.com', '$2y$10$O/RU/tcLPJAMstUye577Pep2WliNSPtT5MxxmTzkUp/GIZ.RoxIe2', 'default.jpg', 3, 1, '2024-04-27 03:36:29', '2024-04-27 03:36:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gizi_anak`
--
ALTER TABLE `gizi_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gizi_ibu_hamil`
--
ALTER TABLE `gizi_ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gizi_status`
--
ALTER TABLE `gizi_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kaders`
--
ALTER TABLE `kaders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehamilan`
--
ALTER TABLE `kehamilan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kematian_anak`
--
ALTER TABLE `kematian_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kematian_ibu_hamil`
--
ALTER TABLE `kematian_ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring_ibu_hamil`
--
ALTER TABLE `monitoring_ibu_hamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring_kegiatan_posyandu`
--
ALTER TABLE `monitoring_kegiatan_posyandu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `timbangan_anak`
--
ALTER TABLE `timbangan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_imunisasi`
--
ALTER TABLE `tipe_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak`
--
ALTER TABLE `anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `gizi_anak`
--
ALTER TABLE `gizi_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gizi_ibu_hamil`
--
ALTER TABLE `gizi_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gizi_status`
--
ALTER TABLE `gizi_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kaders`
--
ALTER TABLE `kaders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kehamilan`
--
ALTER TABLE `kehamilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kematian_anak`
--
ALTER TABLE `kematian_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kematian_ibu_hamil`
--
ALTER TABLE `kematian_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `monitoring_ibu_hamil`
--
ALTER TABLE `monitoring_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `monitoring_kegiatan_posyandu`
--
ALTER TABLE `monitoring_kegiatan_posyandu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `timbangan_anak`
--
ALTER TABLE `timbangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tipe_imunisasi`
--
ALTER TABLE `tipe_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
