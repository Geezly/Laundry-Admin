-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2025 at 08:35 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

DROP TABLE IF EXISTS `harga`;
CREATE TABLE IF NOT EXISTS `harga` (
  `harga_per_kilo` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`harga_per_kilo`) VALUES
(8000);

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

DROP TABLE IF EXISTS `pakaian`;
CREATE TABLE IF NOT EXISTS `pakaian` (
  `pakaian_id` int NOT NULL AUTO_INCREMENT,
  `pakaian_transaksi` int NOT NULL,
  `pakaian_jenis` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pakaian_jumlah` int NOT NULL,
  PRIMARY KEY (`pakaian_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`pakaian_id`, `pakaian_transaksi`, `pakaian_jenis`, `pakaian_jumlah`) VALUES
(35, 13, 'celana', 7),
(34, 13, 'baju', 5),
(33, 13, 'kemeja', 2),
(32, 12, 'jaket', 5),
(31, 12, 'celana', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `pelanggan_id` int NOT NULL AUTO_INCREMENT,
  `pelanggan_nama` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_hp` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pelanggan_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES
(11, 'rion', '02328292', 'cibubur'),
(10, 'ghea', '123453', 'bandung');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int NOT NULL AUTO_INCREMENT,
  `transaksi_tgl` date NOT NULL,
  `transaksi_pelanggan` int NOT NULL,
  `transaksi_harga` int NOT NULL,
  `transaksi_berat` int NOT NULL,
  `transaksi_tgl_selesai` date NOT NULL,
  `transaksi_status` int NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tgl`, `transaksi_pelanggan`, `transaksi_harga`, `transaksi_berat`, `transaksi_tgl_selesai`, `transaksi_status`) VALUES
(11, '2025-05-02', 9, 6000, 6000, '2025-05-05', 1),
(10, '2025-04-22', 8, 6000, 6000, '2025-04-22', 2),
(9, '2025-02-13', 7, 6000, 6000, '2025-02-13', 1),
(12, '2025-05-14', 10, 42000, 7, '2025-05-16', 0),
(13, '2025-05-14', 11, 48000, 8, '2025-05-23', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
