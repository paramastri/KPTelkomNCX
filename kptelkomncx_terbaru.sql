-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2020 pada 03.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kptelkomncx`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ncx`
--

CREATE TABLE `ncx` (
  `id` int(11) NOT NULL,
  `id_level_cpe` int(11) DEFAULT NULL,
  `nama_cc` varchar(225) DEFAULT NULL,
  `nama_pekerjaan` varchar(225) DEFAULT NULL,
  `mitra` varchar(225) DEFAULT NULL,
  `nilai_nrc` varchar(225) DEFAULT NULL,
  `nilai_mrc` varchar(225) DEFAULT NULL,
  `status_ncx` varchar(225) DEFAULT NULL,
  `no_quote` varchar(225) DEFAULT NULL,
  `no_agreement` varchar(225) DEFAULT NULL,
  `kendala` text,
  `tipe_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_cpe` (`id_level_cpe`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD CONSTRAINT `ncx_ibfk_1` FOREIGN KEY (`id_level_cpe`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
