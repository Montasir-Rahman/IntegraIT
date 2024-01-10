-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 04:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integrait`
--

-- --------------------------------------------------------

--
-- Table structure for table `recordex`
--

CREATE TABLE `recordex` (
  `User_ID` varchar(40) DEFAULT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `User_Email` varchar(50) DEFAULT NULL,
  `User_Age` varchar(20) DEFAULT NULL,
  `User_Agex` varchar(20) DEFAULT NULL,
  `User_Agey` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recordex`
--

INSERT INTO `recordex` (`User_ID`, `User_Name`, `User_Email`, `User_Age`, `User_Agex`, `User_Agey`) VALUES
('10-12-2023', 'Mobile Payment', 'Bkash', 'Figma Design', '$100', '$120');

-- --------------------------------------------------------

--
-- Table structure for table `recordpr`
--

CREATE TABLE `recordpr` (
  `User_ID` varchar(50) DEFAULT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `User_Email` varchar(50) DEFAULT NULL,
  `User_Age` varchar(20) DEFAULT NULL,
  `User_Agex` varchar(20) DEFAULT NULL,
  `User_Agey` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recordpr`
--

INSERT INTO `recordpr` (`User_ID`, `User_Name`, `User_Email`, `User_Age`, `User_Agex`, `User_Agey`) VALUES
('1', '$300', '$310', '$400', '$600', '$120');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `User_ID` varchar(11) DEFAULT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `User_Email` varchar(50) DEFAULT NULL,
  `User_Age` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`User_ID`, `User_Name`, `User_Email`, `User_Age`) VALUES
('Adobe', 'Adobe Desgin', '2', '$50'),
('Figma', 'Figma Design', '2', '$100');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `Units` int(40) NOT NULL,
  `Fixed` int(40) NOT NULL,
  `Variable` int(40) NOT NULL,
  `Total` int(40) NOT NULL,
  `Sales` int(40) NOT NULL,
  `Profit` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
