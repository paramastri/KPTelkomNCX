-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 12:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `connectivity`
--

CREATE TABLE `connectivity` (
  `id` int(11) NOT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `no_agreement_con` varchar(225) DEFAULT NULL,
  `no_order_con` varchar(225) DEFAULT NULL,
  `baso_con` int(11) DEFAULT NULL,
  `jenis_termin_con` int(11) DEFAULT NULL,
  `billing_nol_con` date DEFAULT NULL,
  `billing_com_con` date DEFAULT NULL,
  `asset_con` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cpe`
--

CREATE TABLE `cpe` (
  `id` int(11) NOT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `dok_p6` int(11) DEFAULT NULL,
  `dok_p8` int(11) DEFAULT NULL,
  `dok_kl_wo` int(11) DEFAULT NULL,
  `no_agreement` varchar(225) DEFAULT NULL,
  `approval_sm_crm` int(11) DEFAULT NULL,
  `no_order` varchar(225) DEFAULT NULL,
  `wfm_mitra` int(11) DEFAULT NULL,
  `approval_wfm` int(11) DEFAULT NULL,
  `status_nde` int(11) DEFAULT NULL,
  `approval_des` int(11) DEFAULT NULL,
  `baso` int(11) DEFAULT NULL,
  `jenis_termin` int(11) DEFAULT NULL,
  `billing_nol` date DEFAULT NULL,
  `billing_com` date DEFAULT NULL,
  `asset` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kendala`
--

CREATE TABLE `kendala` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `kendala` varchar(1000) DEFAULT NULL,
  `id_sequence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'p6'),
(2, 'p8'),
(3, 'kl_wo'),
(4, 'approval_sm_crm'),
(5, 'wfm_mitra'),
(6, 'approval_wfm'),
(7, 'status_nde'),
(8, 'approval_des'),
(9, 'baso'),
(10, 'billing_nol'),
(11, 'asset'),
(12, 'approval_sm'),
(13, 'approval_ubc');

-- --------------------------------------------------------

--
-- Table structure for table `ncx`
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
  `tipe_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sequence`
--

CREATE TABLE `sequence` (
  `id` int(11) NOT NULL,
  `nomor` varchar(11) DEFAULT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `nilai_termin` varchar(100) DEFAULT NULL,
  `approval_sm` int(11) DEFAULT NULL,
  `approval_ubc` int(11) DEFAULT NULL,
  `billing_com` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'lutfi', '$2y$12$WVBNOWRkTTlHRmZ2TktMUu1cKhzL6Lor7isLSiZghDHchKWTA/HEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connectivity`
--
ALTER TABLE `connectivity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_ibfk_1` (`id_ncx`);

--
-- Indexes for table `cpe`
--
ALTER TABLE `cpe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpe_ibfk_1` (`id_ncx`);

--
-- Indexes for table `kendala`
--
ALTER TABLE `kendala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_ncx` (`id_ncx`),
  ADD KEY `id_sequence` (`id_sequence`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncx`
--
ALTER TABLE `ncx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence`
--
ALTER TABLE `sequence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ncx` (`id_ncx`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connectivity`
--
ALTER TABLE `connectivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cpe`
--
ALTER TABLE `cpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kendala`
--
ALTER TABLE `kendala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ncx`
--
ALTER TABLE `ncx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sequence`
--
ALTER TABLE `sequence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connectivity`
--
ALTER TABLE `connectivity`
  ADD CONSTRAINT `connectivity_ibfk_1` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);

--
-- Constraints for table `cpe`
--
ALTER TABLE `cpe`
  ADD CONSTRAINT `cpe_ibfk_1` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);

--
-- Constraints for table `kendala`
--
ALTER TABLE `kendala`
  ADD CONSTRAINT `kendala_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `kendala_ibfk_2` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`),
  ADD CONSTRAINT `kendala_ibfk_3` FOREIGN KEY (`id_sequence`) REFERENCES `sequence` (`id`);

--
-- Constraints for table `sequence`
--
ALTER TABLE `sequence`
  ADD CONSTRAINT `sequence_ibfk_1` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
