-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 09:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `request2`
--

CREATE TABLE `request2` (
  `id` tinyint(4) NOT NULL,
  `nstesen` varchar(100) NOT NULL,
  `thantar` varchar(50) NOT NULL,
  `jminyak` varchar(5) NOT NULL,
  `kpesan` int(15) NOT NULL,
  `hbelian` int(15) NOT NULL,
  `abayaran` int(15) NOT NULL,
  `abdate` varchar(50) NOT NULL,
  `stutup` int(15) NOT NULL,
  `stdate` varchar(50) NOT NULL,
  `pjualan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request2`
--

INSERT INTO `request2` (`id`, `nstesen`, `thantar`, `jminyak`, `kpesan`, `hbelian`, `abayaran`, `abdate`, `stutup`, `stdate`, `pjualan`) VALUES
(4, 'wfaadtu', '2021-06-02', 'ron95', 4, 4, 124, '2021-06-04', 123, '2021-06-03', 235),
(7, 'hakimi333', '2021-06-25', 'disel', 2, 66, 234, '2021-06-11', 234, '2021-06-21', 234),
(8, 'hakimi23423', '2021-06-25', 'disel', 2, 66, 234, '2021-06-11', 234, '2021-06-21', 234),
(9, 'felda', '2021-06-02', 'disel', 123, 123, 324, '2021-06-10', 234, '2021-06-15', 234325),
(10, 'testttttttt', '2021-07-01', 'null', 0, 0, 0, '', 0, '', 0),
(11, 'boboi', '2021-06-21', 'ron95', 0, 0, 0, '', 0, '', 0),
(12, 'testttttttttttttttttttttttttttt', '', 'ron95', 0, 0, 0, '', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request2`
--
ALTER TABLE `request2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request2`
--
ALTER TABLE `request2`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
