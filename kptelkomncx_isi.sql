-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 02:32 PM
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
  `asset_con` varchar(225) DEFAULT NULL,
  `approval_sm_con` int(11) DEFAULT NULL,
  `approval_ubc_con` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connectivity`
--

INSERT INTO `connectivity` (`id`, `id_ncx`, `no_agreement_con`, `no_order_con`, `baso_con`, `jenis_termin_con`, `billing_nol_con`, `billing_com_con`, `asset_con`, `approval_sm_con`, `approval_ubc_con`) VALUES
(21, 19, 'a', '', 2, 1, '2020-01-17', '0000-00-00', 'nomor aset', 1, 2);

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
  `asset` varchar(225) DEFAULT NULL,
  `approval_sm` int(11) DEFAULT NULL,
  `approval_ubc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpe`
--

INSERT INTO `cpe` (`id`, `id_ncx`, `dok_p6`, `dok_p8`, `dok_kl_wo`, `no_agreement`, `approval_sm_crm`, `no_order`, `wfm_mitra`, `approval_wfm`, `status_nde`, `approval_des`, `baso`, `jenis_termin`, `billing_nol`, `billing_com`, `asset`, `approval_sm`, `approval_ubc`) VALUES
(10, 20, 1, 2, 1, '', 0, '', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(11, 21, 2, 2, 1, 'agre', 2, 'orderan', 0, 0, 0, 0, 0, 1, '2020-01-17', '2020-01-18', 'asetnya diedit', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kendala`
--

CREATE TABLE `kendala` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_ncx` int(11) DEFAULT NULL,
  `kendala` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendala`
--

INSERT INTO `kendala` (`id`, `id_level`, `id_ncx`, `kendala`) VALUES
(19, 9, 19, 'kendala edit'),
(20, 10, 19, 'kendalanya billnol'),
(21, 11, 19, 'aset tok'),
(22, 13, 19, 'ubc edit'),
(23, 2, 20, 'kendala p8 20'),
(24, 1, 21, 'kendala p6 21'),
(25, 2, 21, 'kendala p8 21'),
(26, 4, 21, 'aproval sm crm 21'),
(27, 10, 21, 'kendalanya bilnol 21'),
(28, 11, 21, 'kendala aset 21');

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

--
-- Dumping data for table `ncx`
--

INSERT INTO `ncx` (`id`, `nama_cc`, `nama_pekerjaan`, `mitra`, `nilai_nrc`, `nilai_mrc`, `status_ncx`, `no_quote`, `tipe_order`) VALUES
(19, 'conon', 'a edit', 'a', 'a', '', '', '', 1),
(20, 'cpe non', 'a', 'a', 'a', '', '', '', 2),
(21, 'cpe termin', 'a', 'a', 'a', '', '', '', 2);

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
  ADD KEY `id_ncx` (`id_ncx`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cpe`
--
ALTER TABLE `cpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kendala`
--
ALTER TABLE `kendala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ncx`
--
ALTER TABLE `ncx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `kendala_ibfk_2` FOREIGN KEY (`id_ncx`) REFERENCES `ncx` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
