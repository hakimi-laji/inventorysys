-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 08:58 AM
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
  `ronstock` int(255) NOT NULL,
  `ronaverage` int(255) NOT NULL,
  `dslquantity` int(255) NOT NULL,
  `dslprice` int(255) NOT NULL,
  `dslamount` int(255) NOT NULL,
  `dslstock` int(255) NOT NULL,
  `dslaverage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `user`, `date`, `orderdate`, `ronquantity`, `ronprice`, `ronamount`, `ronstock`, `ronaverage`, `dslquantity`, `dslprice`, `dslamount`, `dslstock`, `dslaverage`) VALUES
(4, 'felda', '2021-06-24', '2021-06-27', 234234, 234, 0, 0, 0, 0, 523, 0, 0, 23),
(6, 'qwe', '2021-06-25', '2021-06-25', 555, 555, 0, 0, 0, 0, 0, 555, 555, 123),
(7, 'felda', '2021-06-25', '2021-09-27', 999, 999, 999, 999, 999, 999, 999, 999, 999, 999);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `station`, `password`) VALUES
(1, 'admin', 'station', 'admin'),
(2, 'felda', 'station', '123'),
(3, 'qwe', 'qwe sad', '111'),
(4, 'test', '', 'test'),
(5, 'shitstation', '', 'asd'),
(6, 'real', 'real shit', 'qwe'),
(7, 'popo', 'qwe', 'qqq'),
(8, 'hai', 'hai', 'hi'),
(11, 'ali', 'bukit payong', '123');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
