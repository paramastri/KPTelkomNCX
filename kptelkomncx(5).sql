-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2020 pada 04.02
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
  `id_ncx` int(11) DEFAULT NULL,
  `no_order_con` varchar(225) DEFAULT NULL,
  `baso_con` int(11) DEFAULT NULL,
  `jenis_termin_con` int(11) DEFAULT NULL,
  `billing_nol_con` date DEFAULT NULL,
  `asset_con` varchar(225) DEFAULT NULL,
  `approval_sm_con` int(11) DEFAULT NULL,
  `approval_ubc_con` int(11) DEFAULT NULL,
  `billcom_termin_con` date DEFAULT NULL,
  `billcom_nonter_con` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `connectivity`:
--   `id_ncx`
--       `ncx` -> `id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpe`
--

CREATE TABLE `cpe` (
  `id` int(11) NOT NULL,
  `id_ncx` int(11) DEFAULT NULL,
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
  `billcom_nonter_cpe` date DEFAULT NULL,
  `billcom_termin_cpe` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `cpe`:
--   `id_ncx`
--       `ncx` -> `id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendala`
--

CREATE TABLE `kendala` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `kendala` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `kendala`:
--   `id_level`
--       `level` -> `id`
--   `id_ncx`
--       `ncx` -> `id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `level`:
--

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'p6'),
(2, 'p8'),
(3, 'kl_wo'),
(4, 'no_agreement'),
(5, 'dok_sm_crm'),
(6, 'no_order'),
(7, 'wfm_mitra'),
(8, 'approval_wfm'),
(9, 'status_nde'),
(10, 'approval_des'),
(11, 'baso'),
(12, 'billing_nol'),
(13, 'asset'),
(14, 'approval_sm'),
(15, 'approval_ubc'),
(16, 'billcom');

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
-- RELATIONSHIPS FOR TABLE `ncx`:
--   `id_level_cpe`
--       `level` -> `id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'lutfi', '$2y$12$WVBNOWRkTTlHRmZ2TktMUu1cKhzL6Lor7isLSiZghDHchKWTA/HEW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `connectivity`
--
ALTER TABLE `connectivity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_ibfk_1` (`id_ncx`);

--
-- Indeks untuk tabel `cpe`
--
ALTER TABLE `cpe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpe_ibfk_1` (`id_ncx`);

--
-- Indeks untuk tabel `kendala`
--
ALTER TABLE `kendala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_ncx` (`id_ncx`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_cpe` (`id_level_cpe`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `connectivity`
--
ALTER TABLE `connectivity`
  ADD CONSTRAINT `con_ibfk_1` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);

--
-- Ketidakleluasaan untuk tabel `cpe`
--
ALTER TABLE `cpe`
  ADD CONSTRAINT `cpe_ibfk_1` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);

--
-- Ketidakleluasaan untuk tabel `kendala`
--
ALTER TABLE `kendala`
  ADD CONSTRAINT `kendala_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `kendala_ibfk_2` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);

--
-- Ketidakleluasaan untuk tabel `ncx`
--
ALTER TABLE `ncx`
  ADD CONSTRAINT `ncx_ibfk_1` FOREIGN KEY (`id_level_cpe`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
