-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 09:09 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_mamage`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerlist`
--

CREATE TABLE `customerlist` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerlist`
--

INSERT INTO `customerlist` (`id`, `firstname`, `lastname`, `phone`, `email`) VALUES
(4, 'hong', 'pham', '3372804509', 'hhphamtrinh@hotmail.com'),
(5, 'Kimbly', 'hoang', '123-123-1234', 'ha@hot.com'),
(8, 'ggg', 'dddd', '1231231234', 'hanh@gmail.com'),
(12, 'Trong', 'Do', '123-123-1234', 'none@none.com');

-- --------------------------------------------------------

--
-- Table structure for table `customernotes`
--

CREATE TABLE `customernotes` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `note_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customernotes`
--

INSERT INTO `customernotes` (`id`, `cust_id`, `note_content`) VALUES
(8, 4, 'test 1 '),
(9, 5, 'test 1 test updated 1'),
(10, 5, 'test 2 test updated 2'),
(13, 8, 'test1233'),
(17, 12, 'test 1 add more'),
(18, 12, 'test updated good ');

-- --------------------------------------------------------

--
-- Table structure for table `tlb_admin`
--

CREATE TABLE `tlb_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlb_admin`
--

INSERT INTO `tlb_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'hanh', 'hanh', 'admin@store.com', '202cb962ac59075b964b07152d234b70', 0),
(2, 'hanh2', 'hanh2', 'hanh2@yahoo.com', 'hanh2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerlist`
--
ALTER TABLE `customerlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customernotes`
--
ALTER TABLE `customernotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tlb_admin`
--
ALTER TABLE `tlb_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerlist`
--
ALTER TABLE `customerlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customernotes`
--
ALTER TABLE `customernotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tlb_admin`
--
ALTER TABLE `tlb_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
