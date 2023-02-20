-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 02:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1->user,2->admin',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `phoneNumber`, `role`, `createdAt`) VALUES
(22, 'rabie', 'rabie@site.com', '$2y$10$515Npkq1SonCC8MkL.yun.y9TIqrm1nnpEdzaurVxKSv03.K8OO4i', 'amman', '000000000', 2, '2022-12-26 10:24:33'),
(25, 'admin', 'admin@gmail.com', '$2y$10$AYzzpnyjM6uYbCyyQtdbsun7mHH2D5ZMlrRywcsY49TsxzaiB9o32', 'amman', '9623456789', 1, '2023-01-04 10:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `about`, `price`) VALUES
(21, 'Basic', 'aa', '20.50'),
(22, 'VIP', 'Access to all gym.', '30');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `totalAmount` double NOT NULL,
  `planId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `address`, `phoneNumber`, `startDate`, `expiryDate`, `discount`, `totalAmount`, `planId`, `createdAt`) VALUES
(48, 'mohammad ali', 'aqaba', '0783251406', '2023-01-16', '2023-04-16', 50, 30.75, 21, '2023-01-21 17:26:18'),
(49, 'Rabie smadi', 'ajloun', '0777452178', '2023-02-13', '2023-04-13', 50, 30, 22, '2023-02-13 11:14:16'),
(51, 'mohammad ali', 'amman', '0772298958', '2023-02-19', '2023-04-19', 30, 42, 22, '2023-02-19 11:06:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptionId` (`planId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
