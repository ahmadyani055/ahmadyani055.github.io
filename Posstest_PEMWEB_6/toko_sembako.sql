-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 04:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` varchar(255) DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `alamat`, `produk`, `jumlah`, `pembayaran`, `tanggal_pemesanan`, `file`, `file_upload`) VALUES
(1, 'NICO', 'jl kaaa', 'Beras Premium', 4, 'Transfer Bank', '2024-10-16 12:17:17', NULL, NULL),
(2, 'sufi', 'grogot', 'Beras Premium', 2, 'Transfer Bank', '2024-10-16 13:03:51', NULL, NULL),
(3, 'jj', 'yaa', 'Beras Premium', 4, 'Transfer Bank', '2024-10-16 13:16:40', NULL, NULL),
(4, 'amat', 'yaya', 'Beras Premium', 5, 'Transfer Bank', '2024-10-16 13:22:48', NULL, NULL),
(5, 'ff', 'rg', 'Beras Premium', 5, 'Transfer Bank', '2024-10-16 13:26:50', NULL, NULL),
(6, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:32:42', NULL, NULL),
(7, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:37:07', NULL, NULL),
(8, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:42:21', NULL, NULL),
(9, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:46:07', NULL, NULL),
(10, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:48:45', NULL, NULL),
(11, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:57:18', NULL, NULL),
(12, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:57:21', NULL, NULL),
(13, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:58:45', NULL, NULL),
(14, 'sufi', 'ggg', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 13:58:48', NULL, NULL),
(15, 'dani', 'iooio', 'Beras Premium', 23, 'Transfer Bank', '2024-10-16 14:00:19', NULL, NULL),
(16, 'amay', 'yoii', 'Beras Premium', 4, 'Transfer Bank', '2024-10-16 14:19:58', NULL, '2024-10-16 16.19.58.png'),
(17, 'yani', 'we', 'Beras Premium', 2, 'Transfer Bank', '2024-10-16 14:26:13', NULL, '2024-10-16 16.26.13.jpeg'),
(18, 'amat', 'yaayay', 'Beras Premium', 1, 'Transfer Bank', '2024-10-16 14:29:25', NULL, '2024-10-16 16.29.25.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
