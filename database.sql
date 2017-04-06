-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2017 at 05:33 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customername` varchar(256) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventroy`
--

CREATE TABLE `inventroy` (
  `itemId` int(11) NOT NULL,
  `item name` varchar(256) NOT NULL,
  `itemdec` text NOT NULL,
  `itemcount` int(11) NOT NULL,
  `itemprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventroy`
--

INSERT INTO `inventroy` (`itemId`, `item name`, `itemdec`, `itemcount`, `itemprice`) VALUES
(10, 'Ibuprofen', '200mg tab oral, for fever and pain killer', 519, 1.32),
(11, 'Indomethacin', '25mg capsule oral, pain killer', 4532, 12.33),
(12, 'Mefenamic acid', '250mg tab , for menstrual pain', 2324, 1.99),
(13, 'Indomethacin', '25mg capsule oral, general pain killer', 3876, 25.78),
(14, 'Diclofenac sodium', '50mg tab, general pain killer', 2323, 18.78),
(15, 'Augmentin', '600mg injection. To treat infection caused by susceptible organism', 358, 89.64),
(16, 'Amoxicilin', '250mg capsule. To treat infection caused by susceptible organism', 798, 65.48),
(17, 'Augmentin', '600mg injection. To treat infection caused by susceptible organism', 897, 53.45),
(18, 'Amoxicilin', '250mg capsule. To treat infection caused by susceptible organism', 587, 23.56),
(19, 'Ampicilin ', '500mg capsule. To treat infection caused by susceptible organism', 489, 68.14),
(20, 'Penicillin V', '125mg tab. To treat infection caused by susceptible organism', 8746, 11.45),
(21, 'Erythromycin', '250mg tab. To treat infection caused by susceptible organism', 6870, 23.21),
(22, 'Azithromycin', '250mg tab. To treat infection caused by susceptible organism', 12, 8785),
(23, 'Vancomycin HCl', '500mg injection. To treat infection caused by susceptible organism', 3857, 123.7),
(24, 'Rifampicin', '150mg capsule. Anti-tuberculosis agent.', 5401, 85.12),
(25, 'Isoniazid', '400mg tab. Anti-tuberculosis agent.', 4587, 54.132),
(26, 'Ethambutol HCl', '400mg tab. Anti-tuberculosis agent.', 5478, 25.89),
(27, 'Pyrazinamide', '500mg tab. Anti-tuberculosis agent.', 897, 64.45),
(28, 'Streptomycin sulphate ', '1g injection. Anti-tuberculosis agent.', 6354, 79.13),
(29, 'Cefuroxime', '1.5g injection. To treat infection caused by susceptible organism', 689, 64.46),
(30, 'Ceftazidime', '2g injection. To treat infection caused by susceptible organism', 9847, 12.654),
(31, 'Bonjela', '200g gel. Contains keratolytic and mildly antiseptic salicylic acid in the form of its salt choline salicylate and the antiseptic cetalkonium chloride as active ingredients. **ONLY SUITABLE FOR PEOPLE AGED 16 OR ABOVE**', 653, 15.32),
(32, 'Metronidazole', '200mg tab. Cures anaerobic infection.', 3541, 78.2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int(11) NOT NULL,
  `salesDate` date NOT NULL,
  `invoicenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `salesDate`, `invoicenumber`) VALUES
(1, '2010-02-01', 0),
(2, '2010-10-17', 0),
(3, '2010-10-18', 0),
(5, '2010-10-11', 0),
(6, '2010-10-02', 0),
(7, '2010-10-02', 0),
(8, '2010-10-02', 0),
(9, '2010-10-02', 0),
(10, '2010-10-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesitem`
--

CREATE TABLE `salesitem` (
  `salesID` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `itemcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesitem`
--

INSERT INTO `salesitem` (`salesID`, `itemId`, `itemcount`) VALUES
(1, 10, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `inventroy`
--
ALTER TABLE `inventroy`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `salesitem`
--
ALTER TABLE `salesitem`
  ADD PRIMARY KEY (`salesID`,`itemId`),
  ADD KEY `SalesItem_ibfk_2` (`itemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventroy`
--
ALTER TABLE `inventroy`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `salesitem`
--
ALTER TABLE `salesitem`
  ADD CONSTRAINT `SalesItem_ibfk_1` FOREIGN KEY (`salesID`) REFERENCES `sales` (`salesID`),
  ADD CONSTRAINT `SalesItem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `inventroy` (`itemId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
