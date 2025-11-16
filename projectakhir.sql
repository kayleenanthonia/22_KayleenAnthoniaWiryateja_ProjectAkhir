-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2025 at 03:40 AM
-- Server version: 8.0.43
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int NOT NULL,
  `jenis_kamar` enum('Standard','Deluxe','Suite') COLLATE utf8mb4_general_ci NOT NULL,
  `fasilitas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `status` enum('tersedia','dipesan') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `jenis_kamar`, `fasilitas`, `harga`, `status`) VALUES
(1, 'Standard', 'AC, Wi-Fi, TV', 300000, 'tersedia'),
(2, 'Standard', 'AC, Wi-Fi, TV', 300000, 'tersedia'),
(3, 'Standard', 'AC, Wi-Fi, TV', 300000, 'tersedia'),
(4, 'Deluxe', 'AC, TV, Breakfast, Wi-Fi', 500000, 'tersedia'),
(5, 'Deluxe', 'AC, TV, Breakfast, Wi-Fi', 500000, 'dipesan'),
(6, 'Suite', 'AC, TV, Bathtub, Balcony, Wi-Fi', 800000, 'tersedia'),
(7, 'Suite', 'AC, TV, Bathtub, Balcony, Wi-Fi', 800000, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `hp` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `hp`, `email`) VALUES
(6, 'hime', '$2y$10$XqWhc1YsvqX0Yn1lgp6Z5.NiNMm0qzYXD/FzgKH4feAMJRw3f..vK', 'Vienna', 1111222, 'hime@gmail.com'),
(7, 'mimimama', '$2y$10$ZDPM.t/qFDTSYZlfAfWF0OEPOgX/n/uSpKmLipeR4JFr1HW.SXcOm', 'Mimi Mama', 81336, 'mima@gmail.com'),
(8, '12', '$2y$10$MalUgQpm03t2q548TmHzLOIJUmxdA6RHpyRynqLYZh9zCJAvnpnQ6', 'as', 12, 'as@a'),
(9, 'aicnerolf', '$2y$10$x..w2y26KBxXnFBKskZzB.SXcD065Z5655od7DKKWt4BHUbBtMb0y', 'Florencia', 20080327, 'lenca@gmail.com'),
(10, 'sdfg', '$2y$10$8Fy5..AKOHVz6yMUjPuJCOKOaEjHlcVE/y/oOq8bOZBzWN9ycUTaC', 'subegyo', 81336, 'subegyo@gmail.com'),
(11, 'fifii', '$2y$10$xpTkDFmGMVcQlpWPGP.DSehX1LF9o/N74VNAylX0YF3YyvQcZJD7.', 'Fifi', 8777, 'fifi@ha');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_kamar` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `jmlhorg` int NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `hargatot` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_pelanggan`, `id_kamar`, `check_in`, `check_out`, `jmlhorg`, `catatan`, `hargatot`) VALUES
(11, 11, 5, '2025-11-14', '2025-11-15', 1, '', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
