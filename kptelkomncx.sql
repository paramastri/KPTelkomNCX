-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2020 pada 08.45
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
-- Struktur dari tabel `connectivity`
--

CREATE TABLE `connectivity` (
  `id` int(11) NOT NULL,
  `no_order` varchar(225) DEFAULT NULL,
  `baso` int(11) DEFAULT NULL,
  `jenis_termin` int(11) DEFAULT NULL,
  `billing_nol` date DEFAULT NULL,
  `billcom` date DEFAULT NULL,
  `asset` varchar(225) DEFAULT NULL,
  `approval_sm` int(11) DEFAULT NULL,
  `approval_ubc` int(11) DEFAULT NULL,
  `kendala` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpe`
--

CREATE TABLE `cpe` (
  `id` int(11) NOT NULL,
  `dok_p6` int(11) DEFAULT NULL,
  `dok_p8` int(11) DEFAULT NULL,
  `dok_kl_wo` int(11) DEFAULT NULL,
  `dok_sm_crm` int(11) DEFAULT NULL,
  `no_order` varchar(225) DEFAULT NULL,
  `wfm_mitra` int(11) DEFAULT NULL,
  `approval_wfm` int(11) DEFAULT NULL,
  `status_nde` int(11) DEFAULT NULL,
  `approval_des` int(11) DEFAULT NULL,
  `baso` int(11) DEFAULT NULL,
  `jenis_termin` int(11) DEFAULT NULL,
  `billing_nol` date DEFAULT NULL,
  `asset` varchar(225) DEFAULT NULL,
  `approval_sm` int(11) DEFAULT NULL,
  `approval_ubc` int(11) DEFAULT NULL,
  `billcom` date DEFAULT NULL,
  `kendala` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ncx`
--

CREATE TABLE `ncx` (
  `id` int(11) NOT NULL,
  `nama_cc` varchar(225) DEFAULT NULL,
  `nama_pekerjaan` varchar(225) DEFAULT NULL,
  `mitra` varchar(225) DEFAULT NULL,
  `nilai_nrc` varchar(225) DEFAULT NULL,
  `nilai_mrc` varchar(225) DEFAULT NULL,
  `status_ncx` varchar(225) DEFAULT NULL,
  `no_quote` varchar(225) DEFAULT NULL,
  `no_agreement` varchar(225) DEFAULT NULL,
  `tipe_order` int(11) DEFAULT NULL,
  `id_connectivity` int(11) DEFAULT NULL,
  `id_CPE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `connectivity`
--
ALTER TABLE `connectivity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cpe`
--
ALTER TABLE `cpe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_CPE` (`id_CPE`),
  ADD KEY `id_connectivity` (`id_connectivity`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `connectivity`
--
ALTER TABLE `connectivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cpe`
--
ALTER TABLE `cpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ncx`
--
ALTER TABLE `ncx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD CONSTRAINT `ncx_ibfk_1` FOREIGN KEY (`id_CPE`) REFERENCES `cpe` (`id`),
  ADD CONSTRAINT `ncx_ibfk_2` FOREIGN KEY (`id_connectivity`) REFERENCES `connectivity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
