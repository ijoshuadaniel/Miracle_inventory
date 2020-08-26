-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2020 at 09:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miracle_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cylinder`
--

CREATE TABLE `add_cylinder` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empty`
--

CREATE TABLE `empty` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `empty_receipt` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `recipt` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refilling`
--

CREATE TABLE `refilling` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `dc_no` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refilling_company`
--

CREATE TABLE `refilling_company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `dc_no` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `bill_date` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `rotation_no` varchar(50) NOT NULL,
  `manufacture_no` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `dc_no` varchar(50) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `gas` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cylinder`
--
ALTER TABLE `add_cylinder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empty`
--
ALTER TABLE `empty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refilling`
--
ALTER TABLE `refilling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refilling_company`
--
ALTER TABLE `refilling_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cylinder`
--
ALTER TABLE `add_cylinder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empty`
--
ALTER TABLE `empty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `refilling`
--
ALTER TABLE `refilling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `refilling_company`
--
ALTER TABLE `refilling_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
