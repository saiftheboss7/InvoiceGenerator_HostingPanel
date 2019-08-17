-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2019 at 05:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`) VALUES
(1, 'saiftheboss7@gmail.com', '123456', 'Saif');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(20) DEFAULT NULL,
  `domain_name` varchar(30) NOT NULL,
  `hostingType` int(20) NOT NULL,
  `order_date` timestamp(6) NOT NULL,
  `expire_date` timestamp(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `password`, `email`, `phone`, `address`, `domain_name`, `hostingType`, `order_date`, `expire_date`) VALUES
(1, 'Saif', '123456', 'saif@wphive.com', '1521332872', 'MyDhaka1', 'asdasd.com', 1, '2019-04-28 13:38:20.000000', '2020-04-28 13:38:20.000000'),
(2, 'Saif', '01191355619', 'saif@gmail.com', '1521332872', 'asdsadasd', 'asd.com', 1, '2019-04-28 15:35:44.000000', '2020-04-28 15:35:44.000000'),
(3, 'Hasan', '123456', 'hasan@gmail.com', '01812123123', 'Address', 'hasan.com', 1, '2019-05-08 09:54:26.000000', '2020-05-08 09:54:26.000000');

-- --------------------------------------------------------

--
-- Table structure for table `client_domain_list`
--

DROP TABLE IF EXISTS `client_domain_list`;
CREATE TABLE IF NOT EXISTS `client_domain_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `hostingType` int(20) NOT NULL,
  `order_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_domain_list`
--

INSERT INTO `client_domain_list` (`id`, `email`, `hostingType`, `order_date`, `expire_date`, `domain_name`) VALUES
(1, 'saif@wphive.com', 1, '2019-05-06', '2020-05-06', 'asdasd.com'),
(2, 'saif@gmail.com', 1, '2019-05-06', '2020-05-06', 'asd.com'),
(4, 'saif@wphive.com', 2, '2019-05-05', '2020-05-05', 'saifhassan.info'),
(5, 'hasan@gmail.com', 1, '2019-05-08', '2020-05-08', 'hasan.com'),
(6, 'hasan@gmail.com', 1, '2019-05-08', '2020-05-08', 'newsabc.com');

-- --------------------------------------------------------

--
-- Table structure for table `hosting_packages`
--

DROP TABLE IF EXISTS `hosting_packages`;
CREATE TABLE IF NOT EXISTS `hosting_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosting_packages`
--

INSERT INTO `hosting_packages` (`id`, `package_name`) VALUES
(1, 'Cloud Hosting'),
(2, 'Shared Hosting');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(30) NOT NULL,
  `hostingType` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `modifiedBy` varchar(200) DEFAULT NULL,
  `order_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `FifteenDaysBefore` date NOT NULL,
  `SevenDaysBefore` date NOT NULL,
  `ThreeDaysBefore` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `domain_name`, `hostingType`, `status`, `notes`, `modifiedBy`, `order_date`, `expire_date`, `email`, `FifteenDaysBefore`, `SevenDaysBefore`, `ThreeDaysBefore`) VALUES
(1, 'asd.com', 1, 1, '', NULL, '2019-04-28', '2019-05-05', 'saif@wphive.com', '2020-04-12', '2020-04-20', '2020-04-24'),
(4, 'asdasd.com', 1, 2, '', 'saiftheboss7@gmail.com', '2019-05-05', '2020-05-05', 'saif@wphive.com', '2020-04-19', '2020-04-27', '2020-05-01'),
(3, 'asd.com', 1, 3, '', NULL, '2019-04-28', '2020-05-30', 'saif@wphive.com', '2020-05-15', '2020-05-23', '2020-05-27'),
(8, 'asdasd.com', 1, 1, 'Test', 'saiftheboss7@gmail.com', '2019-05-05', '2020-08-29', 'saif@wphive.com', '2020-08-14', '2020-08-22', '2020-08-26'),
(9, 'hasan.com', 1, 1, 'Test', 'saiftheboss7@gmail.com', '2019-05-08', '2020-05-08', 'hasan@gmail.com', '2020-04-22', '2020-04-30', '2020-05-04'),
(10, 'newsabc.com', 1, 1, '', NULL, '2019-05-08', '2020-05-08', 'hasan@gmail.com', '2020-04-22', '2020-04-30', '2020-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `statusName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `statusName`) VALUES
(1, 'Upcoming'),
(2, 'Due'),
(3, 'Paid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
