-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 04:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxsight`
--

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `unpaid_tax` decimal(10,2) NOT NULL,
  `paid_tax` decimal(10,2) NOT NULL,
  `total_tax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id`, `nama`, `npwp`, `unpaid_tax`, `paid_tax`, `total_tax`) VALUES
(1, 'Budi Santoso', '123456789', 5000000.00, 15000000.00, 20000000.00),
(2, 'Siti Rahma', '987654321', 2500000.00, 7500000.00, 10000000.00),
(3, 'Agus Pratama', '112233445', 1000000.00, 4000000.00, 5000000.00),
(4, 'Dewi Lestari', '554433221', 3000000.00, 12000000.00, 15000000.00),
(5, 'Eko Supriyanto', '998877665', 750000.00, 4250000.00, 5000000.00),
(6, 'Fitri Handayani', '112233666', 1500000.00, 3500000.00, 5000000.00),
(7, 'Gita Pratiwi', '223344777', 2000000.00, 8000000.00, 10000000.00),
(8, 'Hadi Susanto', '334455888', 4000000.00, 16000000.00, 20000000.00),
(9, 'Indah Permata', '445566999', 1250000.00, 3750000.00, 5000000.00),
(10, 'Joko Widodo', '556677000', 10000000.00, 40000000.00, 50000000.00),
(11, 'Kartika Sari', '667788111', 500000.00, 4500000.00, 5000000.00),
(12, 'Luki Hermawan', '778899222', 3500000.00, 11500000.00, 15000000.00),
(13, 'Mawar Melati', '889900333', 2250000.00, 7750000.00, 10000000.00),
(14, 'Nusa Indah', '990011444', 1750000.00, 8250000.00, 10000000.00),
(15, 'Oscar Putra', '1122555', 6000000.00, 24000000.00, 30000000.00),
(16, 'Putri Anastasia', '223344666', 3250000.00, 11750000.00, 15000000.00),
(17, 'Qori Sandika', '334455777', 1000000.00, 9000000.00, 10000000.00),
(18, 'Rini Susanti', '445566888', 2750000.00, 12250000.00, 15000000.00),
(19, 'Surya Darma', '556677999', 4500000.00, 15500000.00, 20000000.00),
(20, 'Tuti Wulandari', '667788000', 750000.00, 4250000.00, 5000000.00),
(21, 'Umar Bakri', '778899111', 3000000.00, 7000000.00, 10000000.00),
(22, 'Vina Panduwinata', '889900222', 5500000.00, 24500000.00, 30000000.00),
(23, 'Wawan Setiawan', '990011333', 1500000.00, 3500000.00, 5000000.00),
(24, 'Xaverius Wijaya', '1122444', 2000000.00, 13000000.00, 15000000.00),
(25, 'Yenny Kristanti', '112233555', 4000000.00, 26000000.00, 30000000.00),
(26, 'Zulfan Sugeha', '123032005', 2300000.00, 20000000.00, 22300000.00);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pajak`
--

CREATE TABLE `riwayat_pajak` (
  `id` int NOT NULL,
  `pajak_id` int NOT NULL,
  `tahun` year NOT NULL,
  `jumlah_pajak` decimal(12,2) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riwayat_pajak`
--

INSERT INTO `riwayat_pajak` (`id`, `pajak_id`, `tahun`, `jumlah_pajak`, `status_pembayaran`, `tanggal_pembayaran`) VALUES
(1, 1, '2019', 18000000.00, 'Lunas', '2019-12-15'),
(2, 1, '2020', 19000000.00, 'Lunas', '2020-12-20'),
(3, 1, '2021', 19500000.00, 'Lunas', '2021-12-18'),
(4, 1, '2022', 20000000.00, 'Lunas', '2022-12-22'),
(5, 1, '2023', 20000000.00, 'Belum Lunas', NULL),
(6, 2, '2019', 8500000.00, 'Lunas', '2019-11-30'),
(7, 2, '2020', 9000000.00, 'Lunas', '2020-12-05'),
(8, 2, '2021', 9500000.00, 'Lunas', '2021-12-10'),
(9, 2, '2022', 10000000.00, 'Lunas', '2022-12-15'),
(10, 2, '2023', 10000000.00, 'Belum Lunas', NULL),
(11, 3, '2019', 4000000.00, 'Lunas', '2019-12-01'),
(12, 3, '2020', 4300000.00, 'Lunas', '2020-12-03'),
(13, 3, '2021', 4600000.00, 'Lunas', '2021-12-05'),
(14, 3, '2022', 4800000.00, 'Lunas', '2022-12-07'),
(15, 3, '2023', 5000000.00, 'Belum Lunas', NULL),
(16, 4, '2019', 13000000.00, 'Lunas', '2019-12-10'),
(17, 4, '2020', 13500000.00, 'Lunas', '2020-12-12'),
(18, 4, '2021', 14000000.00, 'Lunas', '2021-12-14'),
(19, 4, '2022', 14500000.00, 'Lunas', '2022-12-16'),
(20, 4, '2023', 15000000.00, 'Belum Lunas', NULL),
(21, 5, '2019', 4200000.00, 'Lunas', '2019-11-25'),
(22, 5, '2020', 4400000.00, 'Lunas', '2020-11-27'),
(23, 5, '2021', 4600000.00, 'Lunas', '2021-11-29'),
(24, 5, '2022', 4800000.00, 'Lunas', '2022-12-01'),
(25, 5, '2023', 5000000.00, 'Belum Lunas', NULL),
(26, 6, '2019', 4200000.00, 'Lunas', '2019-12-05'),
(27, 6, '2020', 4400000.00, 'Lunas', '2020-12-07'),
(28, 6, '2021', 4600000.00, 'Lunas', '2021-12-09'),
(29, 6, '2022', 4800000.00, 'Lunas', '2022-12-11'),
(30, 6, '2023', 5000000.00, 'Belum Lunas', NULL),
(31, 7, '2019', 8500000.00, 'Lunas', '2019-12-20'),
(32, 7, '2020', 9000000.00, 'Lunas', '2020-12-22'),
(33, 7, '2021', 9500000.00, 'Lunas', '2021-12-24'),
(34, 7, '2022', 9800000.00, 'Lunas', '2022-12-26'),
(35, 7, '2023', 10000000.00, 'Belum Lunas', NULL),
(36, 8, '2019', 17000000.00, 'Lunas', '2019-12-15'),
(37, 8, '2020', 18000000.00, 'Lunas', '2020-12-17'),
(38, 8, '2021', 19000000.00, 'Lunas', '2021-12-19'),
(39, 8, '2022', 19500000.00, 'Lunas', '2022-12-21'),
(40, 8, '2023', 20000000.00, 'Belum Lunas', NULL),
(41, 9, '2019', 4200000.00, 'Lunas', '2019-11-28'),
(42, 9, '2020', 4400000.00, 'Lunas', '2020-11-30'),
(43, 9, '2021', 4600000.00, 'Lunas', '2021-12-02'),
(44, 9, '2022', 4800000.00, 'Lunas', '2022-12-04'),
(45, 9, '2023', 5000000.00, 'Belum Lunas', NULL),
(46, 10, '2019', 42000000.00, 'Lunas', '2019-12-10'),
(47, 10, '2020', 44000000.00, 'Lunas', '2020-12-12'),
(48, 10, '2021', 46000000.00, 'Lunas', '2021-12-14'),
(49, 10, '2022', 48000000.00, 'Lunas', '2022-12-16'),
(50, 10, '2023', 50000000.00, 'Belum Lunas', NULL),
(51, 11, '2019', 4200000.00, 'Lunas', '2019-12-01'),
(52, 11, '2020', 4400000.00, 'Lunas', '2020-12-03'),
(53, 11, '2021', 4600000.00, 'Lunas', '2021-12-05'),
(54, 11, '2022', 4800000.00, 'Lunas', '2022-12-07'),
(55, 11, '2023', 5000000.00, 'Belum Lunas', NULL),
(56, 12, '2019', 12500000.00, 'Lunas', '2019-12-18'),
(57, 12, '2020', 13000000.00, 'Lunas', '2020-12-20'),
(58, 12, '2021', 13500000.00, 'Lunas', '2021-12-22'),
(59, 12, '2022', 14000000.00, 'Lunas', '2022-12-24'),
(60, 12, '2023', 15000000.00, 'Belum Lunas', NULL),
(61, 13, '2019', 8500000.00, 'Lunas', '2019-12-05'),
(62, 13, '2020', 9000000.00, 'Lunas', '2020-12-07'),
(63, 13, '2021', 9500000.00, 'Lunas', '2021-12-09'),
(64, 13, '2022', 9800000.00, 'Lunas', '2022-12-11'),
(65, 13, '2023', 10000000.00, 'Belum Lunas', NULL),
(66, 14, '2019', 8500000.00, 'Lunas', '2019-12-12'),
(67, 14, '2020', 9000000.00, 'Lunas', '2020-12-14'),
(68, 14, '2021', 9500000.00, 'Lunas', '2021-12-16'),
(69, 14, '2022', 9800000.00, 'Lunas', '2022-12-18'),
(70, 14, '2023', 10000000.00, 'Belum Lunas', NULL),
(71, 15, '2019', 25000000.00, 'Lunas', '2019-12-20'),
(72, 15, '2020', 26000000.00, 'Lunas', '2020-12-22'),
(73, 15, '2021', 27000000.00, 'Lunas', '2021-12-24'),
(74, 15, '2022', 28000000.00, 'Lunas', '2022-12-26'),
(75, 15, '2023', 30000000.00, 'Belum Lunas', NULL),
(76, 16, '2019', 12500000.00, 'Lunas', '2019-12-15'),
(77, 16, '2020', 13000000.00, 'Lunas', '2020-12-17'),
(78, 16, '2021', 13500000.00, 'Lunas', '2021-12-19'),
(79, 16, '2022', 14000000.00, 'Lunas', '2022-12-21'),
(80, 16, '2023', 15000000.00, 'Belum Lunas', NULL),
(81, 17, '2019', 8500000.00, 'Lunas', '2019-12-08'),
(82, 17, '2020', 9000000.00, 'Lunas', '2020-12-10'),
(83, 17, '2021', 9500000.00, 'Lunas', '2021-12-12'),
(84, 17, '2022', 9800000.00, 'Lunas', '2022-12-14'),
(85, 17, '2023', 10000000.00, 'Belum Lunas', NULL),
(86, 18, '2019', 12500000.00, 'Lunas', '2019-12-22'),
(87, 18, '2020', 13000000.00, 'Lunas', '2020-12-24'),
(88, 18, '2021', 13500000.00, 'Lunas', '2021-12-26'),
(89, 18, '2022', 14000000.00, 'Lunas', '2022-12-28'),
(90, 18, '2023', 15000000.00, 'Belum Lunas', NULL),
(91, 19, '2019', 17000000.00, 'Lunas', '2019-12-18'),
(92, 19, '2020', 18000000.00, 'Lunas', '2020-12-20'),
(93, 19, '2021', 19000000.00, 'Lunas', '2021-12-22'),
(94, 19, '2022', 19500000.00, 'Lunas', '2022-12-24'),
(95, 19, '2023', 20000000.00, 'Belum Lunas', NULL),
(96, 20, '2019', 4200000.00, 'Lunas', '2019-12-01'),
(97, 20, '2020', 4400000.00, 'Lunas', '2020-12-03'),
(98, 20, '2021', 4600000.00, 'Lunas', '2021-12-05'),
(99, 20, '2022', 4800000.00, 'Lunas', '2022-12-07'),
(100, 20, '2023', 5000000.00, 'Belum Lunas', NULL),
(101, 21, '2019', 8500000.00, 'Lunas', '2019-12-10'),
(102, 21, '2020', 9000000.00, 'Lunas', '2020-12-12'),
(103, 21, '2021', 9500000.00, 'Lunas', '2021-12-14'),
(104, 21, '2022', 9800000.00, 'Lunas', '2022-12-16'),
(105, 21, '2023', 10000000.00, 'Belum Lunas', NULL),
(106, 22, '2019', 25000000.00, 'Lunas', '2019-12-20'),
(107, 22, '2020', 26000000.00, 'Lunas', '2020-12-22'),
(108, 22, '2021', 27000000.00, 'Lunas', '2021-12-24'),
(109, 22, '2022', 28000000.00, 'Lunas', '2022-12-26'),
(110, 22, '2023', 30000000.00, 'Belum Lunas', NULL),
(111, 23, '2019', 4200000.00, 'Lunas', '2019-12-05'),
(112, 23, '2020', 4400000.00, 'Lunas', '2020-12-07'),
(113, 23, '2021', 4600000.00, 'Lunas', '2021-12-09'),
(114, 23, '2022', 4800000.00, 'Lunas', '2022-12-11'),
(115, 23, '2023', 5000000.00, 'Belum Lunas', NULL),
(116, 24, '2019', 12500000.00, 'Lunas', '2019-12-15'),
(117, 24, '2020', 13000000.00, 'Lunas', '2020-12-17'),
(118, 24, '2021', 13500000.00, 'Lunas', '2021-12-19'),
(119, 24, '2022', 14000000.00, 'Lunas', '2022-12-21'),
(120, 24, '2023', 15000000.00, 'Belum Lunas', NULL),
(121, 25, '2019', 25000000.00, 'Lunas', '2019-12-18'),
(122, 25, '2020', 26000000.00, 'Lunas', '2020-12-20'),
(123, 25, '2021', 27000000.00, 'Lunas', '2021-12-22'),
(124, 25, '2022', 28000000.00, 'Lunas', '2022-12-24'),
(125, 25, '2023', 30000000.00, 'Belum Lunas', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pajak`
--
ALTER TABLE `riwayat_pajak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pajak_id` (`pajak_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `riwayat_pajak`
--
ALTER TABLE `riwayat_pajak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pajak`
--
ALTER TABLE `riwayat_pajak`
  ADD CONSTRAINT `fk_pajak_id` FOREIGN KEY (`pajak_id`) REFERENCES `pajak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pajak_ibfk_1` FOREIGN KEY (`pajak_id`) REFERENCES `pajak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
