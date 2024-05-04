-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2024 pada 17.09
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
-- Database: `db_posyandu2`
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
(6, 'Polio IV', '2024-02-20 06:28:01', '2024-02-20 06:28:01');

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
(1, 'Admin', 'admin@puskesmas.com', '$2y$10$WPi9x6rAEtz93yNgwzLJ0.G9rw7fCmhma0Cp/wIkODiu6rmCtrO3i', 'default.jpg', 1, 1, '2024-04-27 07:58:09', '2024-04-27 07:58:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gizi_anak`
--
ALTER TABLE `gizi_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gizi_ibu_hamil`
--
ALTER TABLE `gizi_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gizi_status`
--
ALTER TABLE `gizi_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ibu_hamil`
--
ALTER TABLE `ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kaders`
--
ALTER TABLE `kaders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kehamilan`
--
ALTER TABLE `kehamilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kematian_anak`
--
ALTER TABLE `kematian_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kematian_ibu_hamil`
--
ALTER TABLE `kematian_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `monitoring_ibu_hamil`
--
ALTER TABLE `monitoring_ibu_hamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `monitoring_kegiatan_posyandu`
--
ALTER TABLE `monitoring_kegiatan_posyandu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `timbangan_anak`
--
ALTER TABLE `timbangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_imunisasi`
--
ALTER TABLE `tipe_imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
