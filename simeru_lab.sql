-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 05:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simeru_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `kode_barang` int(11) NOT NULL,
  `kode_ruang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`kode_barang`, `kode_ruang`, `nama_barang`, `jumlah`, `keterangan`) VALUES
(14, 5, 'PC', 20, 'mulus'),
(15, 5, 'PC', 322, 'rusak sebagian'),
(16, 5, 'laptop', 20, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `book_waktuMulai` varchar(250) NOT NULL,
  `book_waktuSelesai` varchar(250) NOT NULL,
  `book_tanggal` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `keperluan` varchar(250) NOT NULL,
  `status_book` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `book_waktuMulai`, `book_waktuSelesai`, `book_tanggal`, `user_id`, `ruang_id`, `keperluan`, `status_book`) VALUES
(25, '11:21', '12:22', '2022-01-23', 5, 7, 'sholat', 1),
(26, '11:30', '15:34', '2022-01-23', 5, 5, 'gaming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `ruang_id` int(11) NOT NULL,
  `ruang_nama` varchar(250) NOT NULL,
  `ruang_kapasitas` varchar(250) NOT NULL,
  `fasilitas` text NOT NULL,
  `status_ruang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`ruang_id`, `ruang_nama`, `ruang_kapasitas`, `fasilitas`, `status_ruang`) VALUES
(5, 'Lab Multimedia', 'Multimedia', '20 pc, keadaan rusak, ac, whiteboard, projector', 'kosong'),
(7, 'Lab Televisi', 'Televisi', '20 pc, keadaan mulus, ac, whiteboard, projector', 'penuh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_level` varchar(25) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_nama` varchar(250) NOT NULL,
  `user_status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level`, `user_email`, `user_username`, `user_password`, `user_nama`, `user_status`) VALUES
(5, 'customer', 'customer@customer.com', 'customer', '91ec1f9324753048c0096d036a694f86', 'customer', 'on'),
(6, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'on'),
(7, 'admin', 'rijal.1344@gmail.com', 'rijal', 'cirebon123', 'rijal', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ruang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `ruang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
