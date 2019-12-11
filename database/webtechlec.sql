-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2019 at 06:03 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechlec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super','admin') NOT NULL,
  `status` enum('Enabled','Disabled') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'super', 'super', 'super', 'super@gmail.com', '$2y$10$CFqhsh2HbQYMzFvIHwY2/e7vn1P7l9ghbbc4Wy/kYnobLV3VnXfx6', 'super', 'Enabled'),
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$CFqhsh2HbQYMzFvIHwY2/e7vn1P7l9ghbbc4Wy/kYnobLV3VnXfx6', 'admin', 'Enabled'),
(3, 'super1super1', 'super1', 'super1', 'super1@gmail.com', '$2y$10$zg1nFxCdNZ1.MK2hiisyiOcVgs8GjvmRfG/NzxsbKkWa2S0KbMGVG', 'super', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` enum('On Duty','Absent') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `firstname`, `lastname`, `contact`, `role`, `status`) VALUES
(1, 'personnel1', 'personnel1', 56546, 'Housekeeping', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenantID` int(11) NOT NULL,
  `request` varchar(255) NOT NULL,
  `personincharge` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Scheduled','Done') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `tenantID`, `request`, `personincharge`, `status`) VALUES
(1, 1, 'Housekeeping', 'personnel1 personnel1', 'Pending'),
(2, 1, 'Laundry', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tower` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` enum('Vacant','Occupied','Reserved','Not Available') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `tower`, `room`, `status`) VALUES
(1, 'Tower A', 'A1', 'Occupied'),
(2, 'Tower A', 'A2', 'Vacant'),
(3, 'Tower A', 'A3', 'Vacant'),
(4, 'Tower A', 'A4', 'Vacant'),
(5, 'Tower A', 'A5', 'Vacant'),
(6, 'Tower A', 'A6', 'Vacant'),
(7, 'Tower A', 'A7', 'Vacant'),
(8, 'Tower A', 'A8', 'Vacant'),
(9, 'Tower A', 'A9', 'Vacant'),
(10, 'Tower A', 'A10', 'Vacant'),
(11, 'Tower A', 'A11', 'Vacant'),
(12, 'Tower A', 'A12', 'Vacant'),
(13, 'Tower A', 'A13', 'Vacant'),
(14, 'Tower A', 'A14', 'Vacant'),
(15, 'Tower A', 'A15', 'Vacant'),
(16, 'Tower A', 'A16', 'Vacant'),
(17, 'Tower A', 'A17', 'Vacant'),
(18, 'Tower A', 'A18', 'Vacant'),
(19, 'Tower A', 'A19', 'Vacant'),
(20, 'Tower A', 'A20', 'Vacant'),
(21, 'Tower B', 'B1', 'Vacant'),
(22, 'Tower B', 'B2', 'Vacant'),
(23, 'Tower B', 'B3', 'Vacant'),
(24, 'Tower B', 'B4', 'Vacant'),
(25, 'Tower B', 'B5', 'Vacant'),
(26, 'Tower B', 'B6', 'Vacant'),
(27, 'Tower B', 'B7', 'Vacant'),
(28, 'Tower B', 'B8', 'Vacant'),
(29, 'Tower B', 'B9', 'Vacant'),
(30, 'Tower B', 'B10', 'Vacant'),
(31, 'Tower B', 'B11', 'Vacant'),
(32, 'Tower B', 'B12', 'Vacant'),
(33, 'Tower B', 'B13', 'Vacant'),
(34, 'Tower B', 'B14', 'Vacant'),
(35, 'Tower B', 'B15', 'Vacant'),
(36, 'Tower B', 'B16', 'Vacant'),
(37, 'Tower B', 'B17', 'Vacant'),
(38, 'Tower B', 'B18', 'Vacant'),
(39, 'Tower B', 'B19', 'Vacant'),
(40, 'Tower B', 'B20', 'Vacant'),
(41, 'Tower C', 'C1', 'Vacant'),
(42, 'Tower C', 'C2', 'Vacant'),
(43, 'Tower C', 'C3', 'Vacant'),
(44, 'Tower C', 'C4', 'Vacant'),
(45, 'Tower C', 'C5', 'Vacant'),
(46, 'Tower C', 'C6', 'Vacant'),
(47, 'Tower C', 'C7', 'Vacant'),
(48, 'Tower C', 'C8', 'Vacant'),
(49, 'Tower C', 'C9', 'Vacant'),
(50, 'Tower C', 'C10', 'Vacant'),
(51, 'Tower C', 'C11', 'Vacant'),
(52, 'Tower C', 'C12', 'Vacant'),
(53, 'Tower C', 'C13', 'Vacant'),
(54, 'Tower C', 'C14', 'Vacant'),
(55, 'Tower C', 'C15', 'Vacant'),
(56, 'Tower C', 'C16', 'Vacant'),
(57, 'Tower C', 'C17', 'Vacant'),
(58, 'Tower C', 'C18', 'Vacant'),
(59, 'Tower C', 'C19', 'Vacant'),
(60, 'Tower C', 'C20', 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `datestart` varchar(255) NOT NULL,
  `dateend` varchar(255) NOT NULL,
  `months` decimal(65,2) NOT NULL,
  `room` varchar(255) NOT NULL,
  `totalpayment` decimal(65,2) NOT NULL,
  `status` enum('Paid','Pending') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `lastname`, `contact`, `datestart`, `dateend`, `months`, `room`, `totalpayment`, `status`) VALUES
(1, 'tenants1', 'tenants1', 99999, '2019-12-01', '2020-04-30', '4.00', 'A1', '6000.00', 'Paid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
