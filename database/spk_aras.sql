-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 13, 2023 at 11:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_aras`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `name`, `description`) VALUES
(6, 'A1', 'Berkat Baja'),
(7, 'A2', 'PD. Masa Baru'),
(8, 'A3', 'Pt. Cahaya Sukses Pratama'),
(9, 'A4', 'Pt. Oasis Surya sukses'),
(10, 'A5', 'Cv. Sinar Surya sentosa'),
(11, 'A6', 'Cv. Maju Jaya'),
(12, 'A7', 'Pt. Adhi Cakra Utama Mulya'),
(13, 'A8', 'Cv. Karya Guna Lestari'),
(14, 'A9', 'Mega Baja'),
(15, 'A10', 'Logam Tech');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `weight` float NOT NULL,
  `jenis` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `name`, `description`, `weight`, `jenis`) VALUES
(7, 'C1', 'Kualitas Barang', 0.2, 'benefit'),
(8, 'C2', 'Harga barang', 0.3, 'cost'),
(9, 'C3', 'Waktu pengiriman barang', 0.15, 'cost'),
(10, 'C4', 'Banyaknya stok barang', 0.15, 'benefit'),
(11, 'C5', 'Pelayanan', 0.2, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `alternative_id` int(11) DEFAULT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `criteria_id`, `alternative_id`, `value`) VALUES
(9, 7, 6, 5),
(10, 8, 6, 4),
(11, 9, 6, 1),
(12, 10, 6, 4),
(13, 11, 6, 1),
(14, 7, 7, 3),
(15, 8, 7, 5),
(16, 9, 7, 5),
(17, 10, 7, 3),
(18, 11, 7, 4),
(19, 7, 8, 4),
(20, 8, 8, 3),
(21, 9, 8, 4),
(22, 10, 8, 3),
(23, 11, 8, 5),
(24, 7, 9, 4),
(25, 8, 9, 4),
(26, 9, 9, 4),
(27, 10, 9, 5),
(28, 11, 9, 4),
(29, 7, 10, 3),
(30, 8, 10, 5),
(31, 9, 10, 3),
(32, 10, 10, 2),
(33, 11, 10, 4),
(34, 7, 11, 4),
(35, 8, 11, 4),
(36, 9, 11, 1),
(37, 10, 11, 2),
(38, 11, 11, 3),
(39, 7, 12, 3),
(40, 8, 12, 3),
(41, 9, 12, 3),
(42, 10, 12, 2),
(43, 11, 12, 4),
(44, 7, 13, 4),
(45, 8, 13, 3),
(46, 9, 13, 2),
(47, 10, 13, 3),
(48, 11, 13, 3),
(49, 7, 14, 5),
(50, 8, 14, 1),
(51, 9, 14, 4),
(52, 10, 14, 1),
(53, 11, 14, 3),
(54, 7, 15, 1),
(55, 8, 15, 3),
(56, 9, 15, 4),
(57, 10, 15, 4),
(58, 11, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `alternative_id` int(11) DEFAULT NULL,
  `result` decimal(10,4) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `alternative_id`, `result`, `ranking`) VALUES
(1, 6, '0.5528', 2),
(2, 7, '0.4004', 9),
(3, 8, '0.5216', 4),
(4, 9, '0.5118', 5),
(5, 10, '0.3963', 10),
(6, 11, '0.5289', 3),
(7, 12, '0.4501', 8),
(8, 13, '0.5049', 6),
(9, 14, '0.7081', 1),
(10, 15, '0.4599', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subcriteria`
--

CREATE TABLE `subcriteria` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcriteria`
--

INSERT INTO `subcriteria` (`id`, `criteria_id`, `name`, `description`, `weight`) VALUES
(11, 7, 'Selisih Dimensi >1 s/d <=0 mm', 'Sangat baik', 5),
(12, 7, 'Selisih Dimensi >2 s/d <=1 mm', 'Baik', 4),
(13, 7, 'Selisih Dimensi >3 s/d <=2 mm', 'cukup', 3),
(14, 8, '>80 s/d <=100 Juta', '', 5),
(15, 8, '>60 s/d <=80 Juta', '', 4),
(17, 8, '>40 s/d <=60 Juta', '', 3),
(18, 9, '1-3 Hari', '', 5),
(19, 9, '3-6 Hari', '', 4),
(20, 9, '6-9 Hari', '', 3),
(21, 10, 'Sesuai Pesanan', '', 5),
(22, 10, 'Kurang dari pesanan (minus 5 barang)', '', 4),
(23, 10, 'Kurang dari pesanan (minus 10 barang)', '', 3),
(24, 11, 'Respon sangat cepat', '', 5),
(25, 11, 'Respon cepat', '', 4),
(26, 11, 'Respon tidak cepat dan tidak lambat', '', 3),
(27, 7, 'Selisih Dimensi >4 s/d <=3 mm', 'Buruk', 2),
(28, 7, 'Selisih Dimensi >5 s/d <=4 mm', 'Sangat buruk', 1),
(29, 8, '>20 s/d <=40 Juta', '', 2),
(30, 8, '>10 s/d <=20 Juta', '', 1),
(31, 9, '9-12 hari', '', 2),
(32, 9, '> 9 hari', '', 1),
(33, 10, 'Kurang dari pesanan (minus 15 barang)', '', 2),
(34, 10, 'Kurang dari pesanan (minus 20 barang)', '', 1),
(35, 11, 'Respon lambat', '', 2),
(36, 11, 'Respon sangat lambat', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_id` (`criteria_id`),
  ADD KEY `alternative_id` (`alternative_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_id` (`alternative_id`);

--
-- Indexes for table `subcriteria`
--
ALTER TABLE `subcriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_id` (`criteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcriteria`
--
ALTER TABLE `subcriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_ibfk_3` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`);

--
-- Constraints for table `subcriteria`
--
ALTER TABLE `subcriteria`
  ADD CONSTRAINT `subcriteria_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
