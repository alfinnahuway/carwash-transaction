-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queen_steam`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `ID_KENDARAAN` int(11) NOT NULL,
  `JENIS_KENDARAAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`ID_KENDARAAN`, `JENIS_KENDARAAN`) VALUES
(1, 'MOTOR'),
(2, 'MOBIL'),
(4, 'SEPEDA');

-- --------------------------------------------------------

--
-- Table structure for table `paket_cucian`
--

CREATE TABLE `paket_cucian` (
  `ID_PAKET` int(11) NOT NULL,
  `ID_KENDARAAN` int(11) NOT NULL,
  `JENIS_PAKET` varchar(100) NOT NULL,
  `HARGA_PAKET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_cucian`
--

INSERT INTO `paket_cucian` (`ID_PAKET`, `ID_KENDARAAN`, `JENIS_PAKET`, `HARGA_PAKET`) VALUES
(1, 1, 'Motor + Hidrolik', 15000),
(2, 1, 'Motor Besar + Hidrolik', 20000),
(3, 2, 'Mobil (Non Hidrolik)', 30000),
(5, 2, 'Mobil + Hidrolik', 40000),
(6, 2, 'Mobil + Hidrolik + Cuci mesin', 45000),
(8, 2, 'Mobil Besar (Non Hidrolik)', 40000),
(9, 2, 'Mobil Besar + Hidrolik', 50000),
(19, 0, 'dwa', 123),
(20, 2, 'MOBIL SUV', 55000),
(24, 4, 'SEPEDA GUNUNG', 7000),
(26, 2, 'CUCI EXPRESS MEDIUM CAR', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `NO_TRANSAKSI` bigint(12) NOT NULL,
  `TANGGAL` date NOT NULL,
  `TOTAL` int(15) NOT NULL,
  `JAM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `NO_TRANSAKSI`, `TANGGAL`, `TOTAL`, `JAM`) VALUES
(31, 2147483647, '2023-01-13', 40000, '15:49:17'),
(32, 2147483647, '2023-01-13', 15000, '15:50:08'),
(33, 2147483647, '2023-01-13', 59000, '16:11:47'),
(35, 2147483647, '2023-01-13', 30000, '16:38:35'),
(36, 2147483647, '2023-01-14', 40000, '23:33:08'),
(37, 2147483647, '2023-01-15', 40000, '21:07:35'),
(38, 2147483647, '2023-01-15', 15000, '21:29:06'),
(39, 2147483647, '2023-01-15', 40000, '21:29:19'),
(40, 2147483647, '2023-01-15', 45000, '21:36:17'),
(41, 2147483647, '2023-01-17', 40000, '09:51:09'),
(42, 2147483647, '2023-01-17', 40000, '09:51:32'),
(43, 2147483647, '2023-01-17', 40000, '11:23:38'),
(44, 20230117002, '2023-01-17', 40000, '16:37:00'),
(45, 20230117003, '2023-01-17', 45000, '23:17:51'),
(46, 20230117004, '2023-01-17', 40000, '23:21:04'),
(47, 20230117005, '2023-01-17', 40000, '23:22:27'),
(48, 20230117006, '2023-01-17', 40000, '23:35:35'),
(49, 20230117007, '2023-01-17', 40000, '23:39:55'),
(50, 20230117008, '2023-01-17', 40000, '23:40:54'),
(51, 20230117006, '2023-01-17', 40000, '23:47:18'),
(52, 20230117009, '2023-01-17', 40000, '23:48:41'),
(53, 20230117010, '2023-01-17', 45000, '23:50:36'),
(54, 20230117011, '2023-01-17', 30000, '23:55:20'),
(55, 20230117012, '2023-01-17', 45000, '23:56:41'),
(56, 20230117013, '2023-01-17', 20000, '23:59:20'),
(57, 20230117014, '2023-01-18', 20000, '00:00:03'),
(58, 20230118001, '2023-01-18', 45000, '11:56:34'),
(59, 20230118002, '2023-01-18', 55000, '16:23:31'),
(60, 20230118003, '2023-01-19', 40000, '00:08:59'),
(61, 20230118004, '2023-01-19', 7000, '00:11:07'),
(62, 20230119001, '2023-01-19', 40000, '00:12:45'),
(63, 20230119002, '2023-01-19', 45000, '09:45:32'),
(64, 20230119003, '2023-01-19', 45000, '10:06:32'),
(65, 20230119004, '2023-01-19', 45000, '10:07:50'),
(66, 20230119005, '2023-01-19', 50000, '10:10:43'),
(67, 20230119006, '2023-01-19', 40000, '10:14:06'),
(68, 20230119007, '2023-01-19', 45000, '10:14:28'),
(69, 20230119008, '2023-01-19', 45000, '10:21:20'),
(70, 20230119009, '2023-01-19', 30000, '10:22:06'),
(71, 20230119010, '2023-01-19', 40000, '10:23:47'),
(72, 20230119011, '2023-01-19', 40000, '10:25:52'),
(73, 20230119012, '2023-01-19', 45000, '10:27:39'),
(74, 20230119013, '2023-01-19', 45000, '10:28:33'),
(75, 20230119014, '2023-01-19', 45000, '10:29:45'),
(76, 20230119015, '2023-01-19', 55000, '10:30:55'),
(77, 20230119016, '2023-01-19', 45000, '10:33:07'),
(78, 20230119017, '2023-01-19', 40000, '10:33:30'),
(79, 20230119018, '2023-01-19', 40000, '10:35:27'),
(80, 20230119019, '2023-01-19', 40000, '10:37:34'),
(81, 20230119020, '2023-01-19', 40000, '10:40:59'),
(82, 20230119021, '2023-01-19', 40000, '10:41:20'),
(83, 20230119022, '2023-01-19', 45000, '10:42:00'),
(84, 20230119023, '2023-01-19', 40000, '10:51:42'),
(85, 20230119024, '2023-01-19', 40000, '10:57:36'),
(86, 20230119025, '2023-01-19', 20000, '11:00:10'),
(87, 20230119026, '2023-01-19', 40000, '11:01:17'),
(88, 20230119027, '2023-01-19', 45000, '11:02:05'),
(89, 20230119028, '2023-01-19', 45000, '13:34:35'),
(90, 20230119029, '2023-01-19', 40000, '13:40:44'),
(91, 20230119030, '2023-01-19', 20000, '13:41:56'),
(92, 20230119031, '2023-01-19', 40000, '13:46:01'),
(93, 20230119032, '2023-01-19', 40000, '13:48:09'),
(94, 20230119033, '2023-01-19', 20000, '13:52:58'),
(95, 20230119034, '2023-01-24', 40000, '15:49:45'),
(96, 20230119034, '2023-01-24', 40000, '15:51:37'),
(97, 20230124001, '2023-01-24', 40000, '16:09:52'),
(98, 20230124001, '2023-01-24', 40000, '16:10:29'),
(99, 20230125001, '2023-01-25', 41000, '16:32:32'),
(100, 20230126001, '2023-01-26', 45000, '11:02:48'),
(101, 20230127001, '2023-01-27', 32000, '15:22:45'),
(102, 20230129001, '2023-01-29', 40000, '15:14:57'),
(103, 20230129002, '2023-01-29', 45000, '15:33:42'),
(104, 20230130001, '2023-01-30', 45000, '15:01:20'),
(105, 20230131001, '2023-01-31', 45000, '11:19:20'),
(106, 20230131002, '2023-01-31', 40000, '11:21:11'),
(107, 20230131003, '2023-01-31', 15000, '11:46:39'),
(108, 20230131004, '2023-01-31', 45000, '12:08:09'),
(109, 20230131005, '2023-01-31', 40000, '12:11:55'),
(110, 20230131006, '2023-01-31', 45000, '12:12:55'),
(111, 20230131007, '2023-01-31', 45000, '12:19:55'),
(112, 20230131008, '2023-01-31', 45000, '12:22:18'),
(113, 20230131009, '2023-01-31', 45000, '15:19:49'),
(114, 20230131010, '2023-01-31', 15000, '15:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `NO_KELUARAN` int(15) NOT NULL,
  `TANGGAL` date NOT NULL,
  `ALASAN` text NOT NULL,
  `BIAYA` int(15) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`NO_KELUARAN`, `TANGGAL`, `ALASAN`, `BIAYA`, `ID_USER`) VALUES
(40, '2023-01-14', 'dawdaw', 100, 0),
(41, '2023-01-17', 'UANG MAKAN KARYAWAN', 75000, 1),
(42, '2023-01-15', 'e2eq2', 100000, 1),
(43, '2023-01-19', 'Gaji Udin', 1000000, 1),
(44, '2023-01-19', 'Belanja Sabun', 250000, 1),
(45, '2023-01-25', 'Belanja Sabun', 200000, 1),
(46, '2023-01-29', 'MAKAN MAKAN', 20000, 1),
(47, '2023-01-29', 'SEVICE VAKUM', 120000, 1),
(48, '2023-01-30', 'awdwa', 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `NO_TRANSAKSI` varchar(12) NOT NULL,
  `TANGGAL` date NOT NULL DEFAULT current_timestamp(),
  `NOPLAT` varchar(10) NOT NULL,
  `ID_KENDARAAN` int(11) NOT NULL,
  `ID_PAKET` int(11) NOT NULL,
  `STATUS_CUCI` varchar(100) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `BAYAR` int(11) NOT NULL,
  `KEMBALI` int(11) NOT NULL,
  `ID_USER` int(15) NOT NULL,
  `JAM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`NO_TRANSAKSI`, `TANGGAL`, `NOPLAT`, `ID_KENDARAAN`, `ID_PAKET`, `STATUS_CUCI`, `HARGA`, `BAYAR`, `KEMBALI`, `ID_USER`, `JAM`) VALUES
('20230113001', '2023-01-13', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 0, '15:49:09'),
('20230113002', '2023-01-13', 'B 1245 OOW', 1, 1, 'SUDAH DIBAYAR', 15000, 50000, 35000, 0, '15:50:00'),
('20230113003', '2023-01-13', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 59000, 100000, 41000, 0, '16:10:45'),
('20230113004', '2023-01-13', 'B 1245 OOW', 1, 25, 'SUDAH DIBAYAR', 30000, 50000, 20000, 0, '16:38:06'),
('20230114001', '2023-01-14', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 0, '09:32:30'),
('20230114002', '2023-01-14', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 0, '23:31:39'),
('20230115001', '2023-01-15', 'B 121 QWD', 1, 1, 'SUDAH DIBAYAR', 15000, 50000, 35000, 1, '00:18:30'),
('20230115002', '2023-01-15', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 14, '00:21:33'),
('20230115003', '2023-01-15', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 13, '21:36:08'),
('20230115004', '2023-01-15', 'B 2124 TTT', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 13, '22:16:42'),
('20230115005', '2023-01-15', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '22:31:46'),
('20230117001', '2023-01-17', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 1, '11:23:27'),
('20230117002', '2023-01-17', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '14:12:51'),
('20230117003', '2023-01-17', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 100000, 55000, 1, '22:09:58'),
('20230117004', '2023-01-17', 'B 2124 TTT', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 1, '23:20:52'),
('20230117005', '2023-01-17', 'B 2232 KIW', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 1, '23:22:16'),
('20230117006', '2023-01-17', 'B 121 QWD', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 1, '23:27:02'),
('20230117007', '2023-01-17', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 40000, 0, 1, '23:39:37'),
('20230117008', '2023-01-17', 'B 2232 KIW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '23:40:45'),
('20230117009', '2023-01-17', 'B 121 QWD', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '23:42:24'),
('20230117010', '2023-01-17', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '23:50:26'),
('20230117011', '2023-01-17', 'B 1 WOW', 2, 3, 'SUDAH DIBAYAR', 30000, 40000, 10000, 1, '23:54:45'),
('20230117012', '2023-01-17', 'B 2129 HGF', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '23:56:28'),
('20230117013', '2023-01-17', 'B 1521 FOG', 1, 2, 'SUDAH DIBAYAR', 20000, 50000, 30000, 1, '23:57:52'),
('20230117014', '2023-01-17', 'B 2167 LIK', 1, 2, 'SUDAH DIBAYAR', 20000, 20000, 0, 1, '23:59:48'),
('20230118001', '2023-01-18', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 45000, 0, 1, '11:56:25'),
('20230118002', '2023-01-18', 'B 3 BE', 2, 20, 'SUDAH DIBAYAR', 55000, 60000, 5000, 14, '16:23:20'),
('20230118003', '2023-01-18', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '18:03:57'),
('20230118004', '2023-01-18', 'ADAW 22', 4, 24, 'SUDAH DIBAYAR', 7000, 50000, 43000, 1, '18:58:42'),
('20230119001', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '00:12:01'),
('20230119002', '2023-01-19', 'B 1223 KWA', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '00:14:15'),
('20230119003', '2023-01-19', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '09:45:52'),
('20230119004', '2023-01-19', 'B 2124 TTT', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:07:40'),
('20230119005', '2023-01-19', 'B 2323 KLO', 2, 9, 'SUDAH DIBAYAR', 50000, 50000, 0, 1, '10:10:25'),
('20230119006', '2023-01-19', 'B 121 QWD', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:13:58'),
('20230119007', '2023-01-19', 'B 2232 KIW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:14:21'),
('20230119008', '2023-01-19', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:21:11'),
('20230119009', '2023-01-19', 'B 2323 KLO', 2, 3, 'SUDAH DIBAYAR', 30000, 50000, 20000, 1, '10:21:57'),
('20230119010', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:23:37'),
('20230119011', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:25:44'),
('20230119012', '2023-01-19', 'B 1152 JFR', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:27:30'),
('20230119013', '2023-01-19', 'B 1235 KKA', 2, 6, 'SUDAH DIBAYAR', 45000, 45000, 0, 1, '10:28:22'),
('20230119014', '2023-01-19', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:29:27'),
('20230119015', '2023-01-19', 'B 2323 KLO', 2, 20, 'SUDAH DIBAYAR', 55000, 60000, 5000, 1, '10:30:42'),
('20230119016', '2023-01-19', 'B 121 QWD', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:32:58'),
('20230119017', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:33:19'),
('20230119018', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:35:17'),
('20230119019', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:37:25'),
('20230119020', '2023-01-19', 'AA 2323 KK', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:40:52'),
('20230119021', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:41:12'),
('20230119022', '2023-01-19', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '10:41:51'),
('20230119023', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:51:33'),
('20230119024', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '10:57:27'),
('20230119025', '2023-01-19', 'B 2323 KLO', 1, 2, 'SUDAH DIBAYAR', 20000, 50000, 30000, 1, '11:00:00'),
('20230119026', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '11:01:08'),
('20230119027', '2023-01-19', 'B 122 KWA', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '11:01:57'),
('20230119028', '2023-01-19', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '11:17:03'),
('20230119029', '2023-01-19', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '13:36:27'),
('20230119030', '2023-01-19', 'B 2323 KLO', 1, 2, 'SUDAH DIBAYAR', 20000, 50000, 30000, 1, '13:41:39'),
('20230119031', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '13:45:50'),
('20230119032', '2023-01-19', 'B 2232 KIW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '13:47:59'),
('20230119033', '2023-01-19', 'B 2323 KLO', 1, 2, 'SUDAH DIBAYAR', 20000, 50000, 30000, 1, '13:50:32'),
('20230119034', '2023-01-19', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '14:19:30'),
('20230124001', '2023-01-24', 'B 121 QWD', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '16:09:37'),
('20230125001', '2023-01-25', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 41000, 50000, 9000, 1, '15:50:56'),
('20230126001', '2023-01-26', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '11:02:40'),
('20230127001', '2023-01-27', 'FREED', 2, 3, 'SUDAH DIBAYAR', 32000, 50000, 18000, 1, '15:20:21'),
('20230129001', '2023-01-29', 'B 1245 OOW', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '15:12:51'),
('20230129002', '2023-01-29', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '15:33:36'),
('20230130001', '2023-01-30', 'B 4252 KKA', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '14:17:00'),
('20230131001', '2023-01-31', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '11:14:26'),
('20230131002', '2023-01-31', 'B 2323 KLO', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '11:21:04'),
('20230131003', '2023-01-31', 'B 2323 KLO', 1, 1, 'SUDAH DIBAYAR', 15000, 50000, 35000, 1, '11:25:59'),
('20230131004', '2023-01-31', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '12:06:26'),
('20230131005', '2023-01-31', 'B 1152 JFR', 2, 5, 'SUDAH DIBAYAR', 40000, 50000, 10000, 1, '12:08:32'),
('20230131006', '2023-01-31', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '12:12:30'),
('20230131007', '2023-01-31', 'B 2323 KLO', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '12:15:45'),
('20230131008', '2023-01-31', 'B 1245 OOW', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '12:22:10'),
('20230131009', '2023-01-31', 'B 121 QWD', 2, 6, 'SUDAH DIBAYAR', 45000, 50000, 5000, 1, '12:33:23'),
('20230131010', '2023-01-31', 'B 121 QWD', 1, 1, 'SUDAH DIBAYAR', 15000, 15000, 0, 1, '15:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAME` varchar(128) NOT NULL,
  `EMAIL` varchar(128) NOT NULL,
  `IMAGE` varchar(128) NOT NULL,
  `PASSWORD` varchar(256) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `IS_ACTIVE` int(1) NOT NULL,
  `DATE_CREATED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAME`, `EMAIL`, `IMAGE`, `PASSWORD`, `ROLE_ID`, `IS_ACTIVE`, `DATE_CREATED`) VALUES
(1, 'ALFIN TOMY NAHUWAY', 'dertien@gmail.com', 'dertien.JPG', '$2y$10$YuBs1i2Bkh154psIUBtB1.Z73EmMu3BlbB8D4UI0jV/WOFmcEVv2G', 1, 1, 1674981036),
(4, 'Dertien', 'alfin1380@gmail.com', 'images1.jpeg', '$2y$10$y15Zi0KkS8SJx9TsoJAiK.DRhTaxST63c3oXSwY9LxZ/T4TQnJ41W', 1, 1, 1674125712),
(6, 'ardhi', 'ardhi@gmail.com', 'images_(1)2.png', '$2y$10$fweX1ZGur.lX/2fWYm5ZIu7YC2xaTUuocX3lC5t.xXj3UGBzu1KuG', 1, 1, 1666443597),
(12, 'Nusye Lesiyela', 'nusye@gmail.com', 'Capture001.png', '$2y$10$UOGIv227R5Vg7DTW/psaK.huCxnVF.iv8wwCUhM8PXQyFREhvUrcm', 2, 1, 1666755749),
(13, 'Bang Ngeker', 'ngeker@gmail.com', 'WINDOWS_MINIMALIS.jpg', '$2y$10$d2MXtWKyJhOib1Di.xcPh.p.AhS.lTKBn.ZhcBAiM5lf8BgW5Ucl6', 2, 1, 1674551045),
(14, ' FATRICIA ZANY NAHUWAY', 'queenjir@gmail.com', 'wallpaperbetter_com_3840x21601.jpg', '$2y$10$Rjrz4aMHEc1pMTR17RK6SuUX/NTkd45wkLoSes0B./mx7UW2b25b.', 2, 1, 1674033754),
(15, 'Luffi Septia', 'luffi@gmail.com', '20210507_105717.png', '$2y$10$1iMZvZeEv5OE7snU9gX0oO6t5rU5krAlVgfd4US12QJnvb7CzfoCS', 2, 0, 1674631777);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(13, 1, 2),
(15, 2, 2),
(31, 1, 3),
(34, 1, 4),
(35, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icons` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icons`) VALUES
(1, 'Admin', 'fa fa-laptop'),
(2, 'Pengguna', 'fa fa-user'),
(3, 'Transaksi', 'fa fa-exchange'),
(4, 'Data Master', 'fa fa-folder-open'),
(5, 'Set-Up Aplikasi', 'fa  fa-gear');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ROLE_ID`, `ROLE`) VALUES
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 5, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 5, 'Hak Akses', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 3, 'Catat Kendaraan', 'transaksi', 'fas fa-fw fa-car-alt', 1),
(14, 12, 'Penghasilan', 'datamaster/penghasilan', 'fas fa-fw fa-wallet', 1),
(15, 3, 'Antrian', 'transaksi/antrian', '', 1),
(16, 3, 'Pembayaran', 'transaksi/pembayaran', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`ID_KENDARAAN`);

--
-- Indexes for table `paket_cucian`
--
ALTER TABLE `paket_cucian`
  ADD PRIMARY KEY (`ID_PAKET`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`NO_KELUARAN`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NO_TRANSAKSI`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `ID_KENDARAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket_cucian`
--
ALTER TABLE `paket_cucian`
  MODIFY `ID_PAKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `NO_KELUARAN` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
