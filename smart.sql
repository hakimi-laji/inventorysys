-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 05:29 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` tinyint(5) NOT NULL,
  `client` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `ronmax` int(25) NOT NULL,
  `dslmax` int(25) NOT NULL,
  `roncurrent` int(25) NOT NULL,
  `dslcurrent` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client`, `station`, `ronmax`, `dslmax`, `roncurrent`, `dslcurrent`) VALUES
(5, 'none', 'no station', 333, 222, 75, 40),
(6, 'ganu', 'kuala tganu', 200, 100, 140, 80),
(7, 'ali', 'jalan raya', 100, 80, 95, 75);

-- --------------------------------------------------------

--
-- Table structure for table `dailylog`
--

CREATE TABLE `dailylog` (
  `id` tinyint(5) NOT NULL,
  `client` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ronsales` int(11) NOT NULL,
  `dslsales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailylog`
--

INSERT INTO `dailylog` (`id`, `client`, `date`, `ronsales`, `dslsales`) VALUES
(8, 'none', '2021-06-28', 12, 2),
(9, 'none', '2021-06-28', 21, 120),
(10, 'none', '2021-06-28', 25, 0),
(11, 'none', '2021-06-28', 25, 55),
(12, 'ganu', '2021-06-28', 50, 10),
(13, 'ganu', '2021-06-28', 10, 10),
(14, 'ali', '2021-06-28', 5, 5),
(15, 'none', '2021-06-30', 200, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` tinyint(5) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `orderdate` varchar(50) NOT NULL,
  `ronquantity` int(255) NOT NULL,
  `ronprice` int(255) NOT NULL,
  `ronamount` int(255) NOT NULL,
  `dslquantity` int(255) NOT NULL,
  `dslprice` int(255) NOT NULL,
  `dslamount` int(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `user`, `date`, `orderdate`, `ronquantity`, `ronprice`, `ronamount`, `dslquantity`, `dslprice`, `dslamount`, `status`) VALUES
(11, 'ali', '2021-06-28', '2021-06-27', 1, 10, 10, 1, 20, 20, 'wait'),
(13, 'none', '2021-06-30', '2021-06-09', 200, 10, 2000, 180, 5, 900, 'wait'),
(14, 'none', '2021-07-01', '2021-07-01', 0, 0, 0, 0, 0, 0, 'pass'),
(15, 'none', '2021-07-01', '2021-07-01', 10, 0, 0, 10, 0, 0, ''),
(16, 'none', '2021-07-01', '2021-07-15', 58, 0, 0, 82, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(19, 'none', '111'),
(20, 'ganu', '123'),
(21, 'ali', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailylog`
--
ALTER TABLE `dailylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dailylog`
--
ALTER TABLE `dailylog`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
