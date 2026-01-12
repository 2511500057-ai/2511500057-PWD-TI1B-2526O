-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2026 at 06:07 AM
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
-- Table structure for table `orang_keren`
--

CREATE TABLE `orang_keren` (
  `cid` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `pasangan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nama_orang_tua` varchar(150) DEFAULT NULL,
  `nama_kakak` varchar(150) DEFAULT NULL,
  `nama_adik` varchar(150) DEFAULT NULL,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orang_keren`
--

INSERT INTO `orang_keren` (`cid`, `nim`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `hobi`, `pasangan`, `pekerjaan`, `nama_orang_tua`, `nama_kakak`, `nama_adik`, `dcreated_at`) VALUES
(1, '2511500058', 'Steven Marcelino', 'pkpp', '2026-01-07', 'masak', 'adalah', 'mahasiswa', 'aceng', 'joko', 'eca', '2026-01-12 09:48:27'),
(2, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'masak', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:24:04'),
(3, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'kj', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:27:43'),
(6, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'masak', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:43:38'),
(7, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'masak', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:46:56'),
(8, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'masak', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:53:16'),
(9, '2511500057', 'Mamat', 'pancur', '2007-05-06', 'masak', 'adalah', 'mahasiswa', 'aceng', 'eci', 'eca', '2026-01-12 12:53:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orang_keren`
--
ALTER TABLE `orang_keren`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orang_keren`
--
ALTER TABLE `orang_keren`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
