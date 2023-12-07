-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 07, 2023 at 10:35 PM
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
(6, 'A1', 'PT. A'),
(7, 'A2', 'PT. B'),
(8, 'A3', 'PT. C'),
(9, 'A4', 'PT. D'),
(10, 'A5', 'PT. E');

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
(7, 'C1', 'Kualitas Barang', 0.3, 'benefit'),
(8, 'C2', 'Harga barang', 0.2, 'cost'),
(9, 'C3', 'Waktu pengiriman barang', 0.2, 'cost'),
(10, 'C4', 'Banyaknya stok barang', 0.15, 'benefit'),
(11, 'C5', 'Pelayanan', 0.15, 'benefit');

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
(9, 7, 6, 0.7),
(10, 8, 6, 1),
(11, 9, 6, 0.7),
(12, 10, 6, 1),
(13, 11, 6, 1),
(14, 7, 7, 0.7),
(15, 8, 7, 1),
(16, 9, 7, 1),
(17, 10, 7, 0.7),
(18, 11, 7, 1),
(19, 7, 8, 1),
(20, 8, 8, 0.7),
(21, 9, 8, 1),
(22, 10, 8, 0.7),
(23, 11, 8, 0.7),
(24, 7, 9, 1),
(25, 8, 9, 0.7),
(26, 9, 9, 1),
(27, 10, 9, 0.5),
(28, 11, 9, 0.7),
(29, 7, 10, 1),
(30, 8, 10, 0.5),
(31, 9, 10, 0.7),
(32, 10, 10, 0.7),
(33, 11, 10, 0.7);

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
(1, 6, '0.8057', 2),
(2, 7, '0.6990', 3),
(3, 8, '0.7857', 4),
(4, 9, '0.7534', 5),
(5, 10, '0.9079', 1);

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
(11, 7, 'Barang tidak catat dan stok baru', '', 1),
(12, 7, 'Barang catat dan stok baru', '', 0.7),
(13, 7, 'Barang catat dan stok lama', '', 0.5),
(14, 8, '<= Rp. 1.300.000', '', 1),
(15, 8, 'Rp 1.310.000 – Rp 2.000.000', '', 0.7),
(17, 8, '=> Rp 2.000.000', '', 0.5),
(18, 9, '1-2 Hari', '', 1),
(19, 9, '3-4 Hari', '', 0.7),
(20, 9, '> 4 Hari', '', 0.5),
(21, 10, 'Banyak', '', 1),
(22, 10, 'Cukup', '', 0.7),
(23, 10, 'Sedikit', '', 0.5),
(24, 11, 'Sopan dan respon cepat', '', 1),
(25, 11, 'Sopan dan respon lambat', '', 0.7),
(26, 11, 'Tidak sopan dan respon lambat', '', 0.5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcriteria`
--
ALTER TABLE `subcriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
