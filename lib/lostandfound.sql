-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 12:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostandfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `foundproduct`
--

CREATE TABLE `foundproduct` (
  `fproductid` int(11) NOT NULL,
  `objectname` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `postdate` varchar(50) NOT NULL,
  `postimg` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `number` int(11) NOT NULL,
  `fland` varchar(45) NOT NULL,
  `fountry` varchar(45) NOT NULL,
  `fcity` varchar(45) NOT NULL,
  `rland` varchar(45) NOT NULL,
  `rcity` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lostproduct`
--

CREATE TABLE `lostproduct` (
  `lproductid` int(11) NOT NULL,
  `objectname` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `postdate` varchar(50) NOT NULL,
  `postimg` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `lcountry` varchar(40) NOT NULL,
  `lcity` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foundproduct`
--
ALTER TABLE `foundproduct`
  ADD PRIMARY KEY (`fproductid`);

--
-- Indexes for table `lostproduct`
--
ALTER TABLE `lostproduct`
  ADD PRIMARY KEY (`lproductid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foundproduct`
--
ALTER TABLE `foundproduct`
  MODIFY `fproductid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lostproduct`
--
ALTER TABLE `lostproduct`
  MODIFY `lproductid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
