-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `judul_brand` varchar(250) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `judul_brand`, `visible`) VALUES
(8, 'Intel', 1),
(9, 'AMD', 1),
(10, 'Nvidia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_produk` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `id_produk`, `judul_produk`, `ip_address`, `qty`) VALUES
(4, 1, '', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `judul_kategori` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `judul_kategori`, `visible`) VALUES
(6, 'CPU', 1),
(7, 'Graphic Card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `kategori_produk` int(100) NOT NULL,
  `merk_produk` int(100) NOT NULL,
  `judul_produk` varchar(255) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `desc_produk` text NOT NULL,
  `image_produk` text NOT NULL,
  `keywords_produk` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_produk`, `merk_produk`, `judul_produk`, `harga_produk`, `desc_produk`, `image_produk`, `keywords_produk`, `views`, `visible`, `date`) VALUES
(1, 7, 9, 'Radeon™ RX 6900 XT', 14600000, 'Boost Frequency: Up to 2250 MHz\r\nGPU Power: 300 W\r\nGPU Memory: 16GB GDDR6\r\nHDMI 4K Support: Yes', 'AMD_Radeon_RX_6000_Series_Graphics_Card.jpg', 'rx 6900 xt', 0, 1, ''),
(2, 7, 10, 'GEFORCE RTX 3090', 30000000, 'NVIDIA CUDA Cores	10496\r\nBoost Clock	1.70 GHz\r\nMemory Size	24 GB\r\nMemory Type	GDDR6X', 'screen-shot-2020-09-01-at-9-35-51-am.png', 'rtx 3090', 0, 1, ''),
(3, 6, 8, 'Intel® Core™ i9-10900K Processor', 8350000, '10 Cores & 20 Threads, 3.7 GHz Clock Speed, 5.3 GHz Maximum Turbo Frequency, LGA 1200 Socket, 20MB Cache Memory, Intel UHD Graphics 630, Dual-Channel DDR4-2933 Memory, Supports Intel Optane Memory, 10th Generation (Comet Lake) The Core i9-10900K 3.7 GHz Ten-Core LGA 1200 Processor from Intel has a base clock speed of 3.7 GHz and comes with features such as Intel Optane Memory support Intel vPro technology Intel Boot Guard Intel VT-d virtualization technology for directed I/O and Intel Hyper-Threading technology.', '71DTS32f6cL._AC_SL1500_.jpg', 'intel core i9', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest',
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `notel`, `image`, `role`, `visible`) VALUES
(13, '::1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'City', 'Aviary Stock Photo 1.png', 'admin', 1),
(14, '::1', 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'City', '', 'guest', 1),
(15, '::1', 'customer', 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', 'City', '', 'guest', 1),
(16, '::1', 'Muhamad Miftah R', 'xtractxtract10@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'qwerty', 'F_20200213112144AA08hn.BMP', 'guest', 1),
(18, '::1', 'Muhammad Naufal Ramadhan', 'mnoval2k1@gmail.com', 'bef2075f47803b39260d0bb0d921f2d8', '123123123123', 'tyler.jpg', 'admin', 1),
(19, '::1', 'loba', 'loba@gmail.com', 'd8e3e188b39af79c07b502c92bc2b3de', '1233124515', 'hahaha.PNG', 'guest', 1),
(20, '::1', 'naufal', 'naufal@gmail.com', 'f065808d76dfa1e396984e20bfcdb7cf', '33333', '', 'guest', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
