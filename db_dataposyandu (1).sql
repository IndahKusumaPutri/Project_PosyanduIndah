-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 13.05
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dataposyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibus`
--

CREATE TABLE `ibus` (
  `id_ibu` int(10) UNSIGNED NOT NULL,
  `ID` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ibus`
--

INSERT INTO `ibus` (`id_ibu`, `ID`, `nik`, `nama_ibu`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'I-0001', '111111111111111', 'Dwiyono', '1111111111111111', 'Rawa Panjang RT 25/08, Desa Cengklong, Kec. Kosambi', '2022-11-15 15:38:01', '2022-11-15 15:38:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasis`
--

CREATE TABLE `imunisasis` (
  `id_imunisasi` int(10) UNSIGNED NOT NULL,
  `kode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `tgl_imun` date NOT NULL,
  `id_kader` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaders`
--

CREATE TABLE `kaders` (
  `id_kader` int(10) UNSIGNED NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `nama_kader` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel_kader` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(230, '2022_08_11_134330_create_layanan_kesehatans_table', 1),
(342, '2022_08_11_135004_create_registrasi_events_table', 2),
(391, '2022_08_18_013041_create_jadwal__controls_table', 3),
(401, '2022_08_18_011606_create_kegiatan_rutins_table', 4),
(478, '2022_08_12_022732_create_layanankaders_table', 5),
(526, '2022_08_25_082928_create_kegiatanrutins_table', 6),
(631, '2022_08_24_071807_create_registrasis_table', 7),
(657, '2022_08_24_071807_create_registrasievents_table', 8),
(661, '2022_08_30_093805_create_registrasi_pasiens_table', 8),
(782, '2022_08_25_023330_create_jadwalcontrols_table', 9),
(900, '2022_08_30_093805_create_regispasiens_table', 10),
(944, '2022_08_11_132239_create_events_table', 11),
(961, '2022_08_24_071807_create_regisevents_table', 12),
(966, '2022_09_11_090630_create_anaks_table', 12),
(992, '2022_08_11_134732_create_kategoris_table', 13),
(1273, '2022_08_23_032551_create_lakes_table', 14),
(1277, '2022_08_30_094740_create_kegiatan_rutins_table', 14),
(1288, '2022_08_30_093805_create_programs_table', 15),
(1543, '2014_10_12_000000_create_users_table', 16),
(1544, '2014_10_12_100000_create_password_resets_table', 16),
(1545, '2022_08_11_141248_create_pasiens_table', 16),
(1546, '2022_08_11_142739_create_kaders_table', 16),
(1547, '2022_08_28_124328_add_lavel_to_users_table', 16),
(1548, '2022_08_30_014418_create_tugas_table', 16),
(1549, '2022_09_30_093928_create_ibus_table', 16),
(1550, '2022_10_03_095615_create_nimbangs_table', 16),
(1551, '2022_10_06_090917_create_imunisasis_table', 16),
(1552, '2022_10_13_104227_create_vaksins_table', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nimbangs`
--

CREATE TABLE `nimbangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_timbang` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `berat` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_gizi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nimbangs`
--

INSERT INTO `nimbangs` (`id`, `id_timbang`, `id_pasien`, `tgl`, `berat`, `tinggi`, `status_gizi`, `created_at`, `updated_at`) VALUES
(1, 'T-0001', 1, '2022-11-15', '6 KG', '7 CM', 'Lebih diperhatikan lagi pola makannya', '2022-11-15 15:43:31', '2022-11-15 15:54:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiens`
--

CREATE TABLE `pasiens` (
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `NIB` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasiens`
--

INSERT INTO `pasiens` (`id_pasien`, `NIB`, `nama_pasien`, `jenkel`, `tempat_lahir`, `tanggal_lahir`, `usia`, `id_ibu`, `created_at`, `updated_at`) VALUES
(1, 'B-0001', 'Nadila', 'laki-laki', 'Tangerang', '2022-01-15', '10', 1, '2022-11-15 15:39:34', '2022-11-15 15:41:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(10) UNSIGNED NOT NULL,
  `nm_tugas` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$vHhqSVUrDfiTxymDR2XfcOdLwCZE08x3Wpuh93OQvcLidBl92qtay', NULL, '2022-11-15 15:36:23', '2022-11-15 15:36:23', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaksins`
--

CREATE TABLE `vaksins` (
  `id_vaksin` int(10) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(57) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia_wajib` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ibus`
--
ALTER TABLE `ibus`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indeks untuk tabel `imunisasis`
--
ALTER TABLE `imunisasis`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indeks untuk tabel `kaders`
--
ALTER TABLE `kaders`
  ADD PRIMARY KEY (`id_kader`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nimbangs`
--
ALTER TABLE `nimbangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vaksins`
--
ALTER TABLE `vaksins`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ibus`
--
ALTER TABLE `ibus`
  MODIFY `id_ibu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `imunisasis`
--
ALTER TABLE `imunisasis`
  MODIFY `id_imunisasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kaders`
--
ALTER TABLE `kaders`
  MODIFY `id_kader` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1553;

--
-- AUTO_INCREMENT untuk tabel `nimbangs`
--
ALTER TABLE `nimbangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vaksins`
--
ALTER TABLE `vaksins`
  MODIFY `id_vaksin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
