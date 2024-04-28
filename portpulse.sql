-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 03:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portpulse`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subj` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `fName`, `lName`, `email`, `subj`, `msg`) VALUES
(1, 'Kevin', 'Montecalvo', 'kevin@gmail.com', 'I cannot track my luggage', 'Please fix it.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobileNum` int(10) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `addtype` varchar(20) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `fName`, `bday`, `email`, `mobileNum`, `nationality`, `religion`, `addtype`, `addr`, `city`, `state`, `country`, `zip`) VALUES
(1, 'Clarize Dizon', '0000-00-00', 'clang@gmail.com', 2147483647, 'Filipino', 'Roman Catholic', 'Temporary', 'Jersey St Brgy Bahay Toro', 'Quezon City', 'Metro Manila', 'Philippines', 1106),
(2, 'Kim Apostol', '0000-00-00', 'kim@gmail.com', 2147483647, 'Filipino', 'Roman Catholic', 'Temporary', 'Jersey St Brgy Bahay Toro', 'Quezon City', 'Metro Manila', 'Philippines', 1106),
(3, 'Kevin Montecalvo', '0000-00-00', 'kevin@gmail.com', 2147483647, 'Filipino', 'Roman Catholic', 'Permanent', 'Jersey St Brgy Bahay Toro', 'Quezon City', 'Metro Manila', 'Philippines', 1106);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `ID` int(11) NOT NULL,
  `generatedID` varchar(7) NOT NULL,
  `stat` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `qr` blob NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`ID`, `generatedID`, `stat`, `loc`, `date`, `qr`, `remarks`) VALUES
(12, '0', '', '', '', '', 'Luggage is big and as per customer it has fragile '),
(46, 'N-30944', '', '', '', '', 'sample999'),
(47, 'N-25474', '', '', '', '', 'chuchu'),
(48, 'N-58558', '', '', '', '', 'dcjnscijsnisd'),
(49, 'N-70821', '', '', '', '', 'deuwbedibdc'),
(50, 'N-78881', '', '', '', '', 'chuchu'),
(51, 'N-45867', '', '', '', '', 'sample999'),
(52, 'N-53771', '', '', '', '', 'ang cute ko..01'),
(53, 'N-72924', '', '', '', '', 'sample999');

-- --------------------------------------------------------

--
-- Table structure for table `luggage`
--

CREATE TABLE `luggage` (
  `ID` int(11) NOT NULL,
  `custname` varchar(20) NOT NULL,
  `luggtype` varchar(10) NOT NULL,
  `weight` int(2) NOT NULL,
  `addr` varchar(20) NOT NULL,
  `targetAddr` varchar(20) NOT NULL,
  `mobileNum` int(10) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luggage`
--

INSERT INTO `luggage` (`ID`, `custname`, `luggtype`, `weight`, `addr`, `targetAddr`, `mobileNum`, `remarks`) VALUES
(1, 'Clarize Dizon', 'check in', 5, 'Jersey St Brgy Bahay', 'Canada', 2147483647, 'Luggage is big and as per customer it has fragile ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `idNum` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `fName`, `idNum`, `username`, `pswd`) VALUES
(1, 'Eingel Naguit', 1, 'admin01', 'eingel1234'),
(2, 'Cheilo Isidro', 2, 'admin02', 'cheilo1234'),
(3, 'Ralph Opena', 3, 'admin03', 'ralph1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `luggage`
--
ALTER TABLE `luggage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `luggage`
--
ALTER TABLE `luggage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
