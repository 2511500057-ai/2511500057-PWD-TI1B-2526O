-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2026 at 04:35 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `orang_hebat`
--

CREATE TABLE `orang_hebat` (
  `kode_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(100) NOT NULL,
  `alamat_rumah` text,
  `tanggal_kunjungan` date DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `asal_slta` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `nama_pacar` varchar(100) DEFAULT NULL,
  `nama_mantan` varchar(100) DEFAULT NULL,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orang_hebat`
--

INSERT INTO `orang_hebat` (`kode_pengunjung`, `nama_pengunjung`, `alamat_rumah`, `tanggal_kunjungan`, `hobi`, `asal_slta`, `pekerjaan`, `nama_orang_tua`, `nama_pacar`, `nama_mantan`, `dcreated_at`, `cid`) VALUES
(1231232, 'asfsfdsfdsfdsf', 'fsdfdsfdsdsdssd', '2026-01-01', 'sfdsvsvdvdvd', 'fvdfvfsvd', 'dvsdvsdvdssv', 'dsvsdvdsvds', 'dvsdvdsv', 'dvsdvdsv', '2026-01-22 11:35:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orang_hebat`
--
ALTER TABLE `orang_hebat`
  ADD PRIMARY KEY (`kode_pengunjung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orang_hebat`
--
ALTER TABLE `orang_hebat`
  MODIFY `kode_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1231233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
