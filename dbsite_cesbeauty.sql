-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2019 at 02:57 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsite_cesbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`) VALUES
(2, 'fieq', 'fieq97', 'syafiq muhammad'),
(4, 'Admin', 'Admin987', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `br_id` int(6) NOT NULL AUTO_INCREMENT,
  `br_nm` varchar(50) NOT NULL,
  `br_kat` varchar(30) NOT NULL,
  `br_des` text NOT NULL,
  `br_hrg` int(10) NOT NULL,
  `br_stok` int(9) NOT NULL,
  `br_sat` varchar(30) NOT NULL,
  `br_gbr` varchar(100) NOT NULL,
  `ket` varchar(950) NOT NULL,
  `Penjual` varchar(25) NOT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

DROP TABLE IF EXISTS `kurir`;
CREATE TABLE IF NOT EXISTS `kurir` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `telp`) VALUES
(1, 'JNE', '123456789123'),
(2, 'JNT', '088888888888'),
(3, 'POS Express', '0888888'),
(4, 'TIKI', '0888888'),
(5, 'Wahana Express', '0888888');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kdpos` int(25) NOT NULL,
  `kota` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `foto` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `tgl_daftar`, `nama`, `alamat`, `kdpos`, `kota`, `email`, `telp`, `foto`) VALUES
(1, 'fieq', 'password', '0000-00-00', 'Syafiq Muhammad', 'Jl. Pinus VI Perum Grand Tanjung Elok Permai', 53144, 'Purwokerto', 'syaffmedia@gmail.com', '0895422723151', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kdpos` int(25) NOT NULL,
  `kota` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `narek` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `no_beli` int(10) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nm_barang` varchar(55) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no`, `tanggal`, `nama`, `alamat`, `kdpos`, `kota`, `email`, `telp`, `narek`, `norek`, `bank`, `no_beli`, `kd_barang`, `nm_barang`, `jumlah`, `harga`, `subtotal`, `total`, `status`, `kurir`) VALUES
(46, '2018-03-27', 'Muhammad Syafiq Izzaudin', 'Pasiraman Kidul RT 02/02 Pekuncen, Banyumas', 53164, 'Purwokerto', 'syafiqmuhammad@outlook.com', '088166941100', '0', '0', '0', 1522138713, '33', 'Semangka Organik', 5, 45000, 225000, 225000, 1, 'Bagus'),
(45, '2018-03-27', 'Muhammad Syafiq Izzaudin', 'Pasiraman Kidul RT 02/02 Pekuncen, Banyumas', 53164, 'Purwokerto', 'syafiqmuhammad@outlook.com', '088166941100', '0', '0', '0', 1522137455, '32', 'Apel Hijau', 3, 25000, 75000, 75000, 3, 'Safik');

--
-- Triggers `pesanan`
--
DROP TRIGGER IF EXISTS `update_stok`;
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
UPDATE barang SET br_stok=br_stok-new.jumlah
WHERE br_id=new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE IF NOT EXISTS `testimoni` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `br_id` int(5) NOT NULL,
  `judul` text NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`no`, `tanggal`, `nama`, `email`, `br_id`, `judul`, `pesan`) VALUES
(5, '2018-03-27', 'Syafiq Muhammad', 'syaffmedia@gmail.com', 32, 'tadi pagi beli 3kg', 'Buahnya dikemas rapi dan masih segar ternyata..'),
(7, '2018-04-01', 'fieq9721', 'syafiqmuhammad@outlook.com', 34, 'wortel oren', 'gede jumbooo\r\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
