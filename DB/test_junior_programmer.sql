-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 18.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_junior_programmer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(41, 'L QUEENLY'),
(42, 'L MTH AKSESORIS (IM)'),
(43, 'L MTH TABUNG (LK)'),
(44, 'SP MTH SPAREPART (LK)'),
(45, 'CI MTH TINTA LAIN (IM)'),
(46, 'L MTH AKSESORIS (LK)'),
(47, 'S MTH STEMPEL (IM)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(6, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 41, 53),
(9, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 42, 53),
(11, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 42, 53),
(12, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 42, 54),
(15, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 42, 53),
(17, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 42, 53),
(18, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 42, 54),
(19, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 42, 54),
(22, 'ARM PENDEK MODEL U', 13000, 42, 53),
(23, 'ARM SUPPORT KECIL', 13000, 43, 54),
(24, 'ARM SUPPORT KOTAK PUTIH', 13000, 42, 54),
(26, 'ARM SUPPORT PENDEK POLOS', 13000, 43, 53),
(27, 'ARM SUPPORT S IM', 1000, 42, 54),
(28, 'ARM SUPPORT T (IMPORT)', 13000, 42, 53),
(29, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 43, 53),
(50, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 42, 54),
(56, 'BODY PRINTER CANON IP2770', 500, 44, 53),
(58, 'BODY PRINTER T13X', 15000, 44, 53),
(59, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 45, 53),
(60, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 45, 54),
(61, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 45, 53),
(62, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 45, 54),
(63, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 45, 54),
(64, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 45, 53),
(65, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 45, 54),
(66, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 45, 53),
(67, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 45, 54),
(68, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 45, 54),
(70, 'BOTOL KOTAK 100ML LK', 1000, 46, 53),
(72, 'BOTOL 10ML IM', 1000, 47, 54),
(78, 'produk testing 23 44', 20000, 46, 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` bigint(20) NOT NULL,
  `nama_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(53, 'bisa dijual'),
(54, 'tidak bisa dijual');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori produk` (`kategori_id`),
  ADD KEY `status produk` (`status_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
