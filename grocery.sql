-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 04:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(100) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Title`, `Description`, `Image`) VALUES
(17, 'Fruits & Vegetables', 'Fruits, Vegetables, Cut Fresh, Spourts & herbs', 'FruitsVeg.jpg'),
(18, 'Meat & SeaFood', 'Meat, Poultry, Sea Food', 'Meat.jpg'),
(19, 'Home & Kitchen', 'Bathroom Essentials, Cookware, Kitchen Tools,  Accessories, Dining Servings, Cleaning Equipment', 'HomeKitchen.jpg'),
(20, 'Personal Care', 'Bath body, Haircare, Skincare, Oralcare, Facecare, Shavingneeds, Healt Wellness, Deos, Perfumes', 'PersonalCare.jpg'),
(21, 'Grocery & Staples', 'Pulses, Atta, Rice, DryFruits, Oil, Ghee, Spices, Salt, Sugar, Vinegar, Dressing', 'Groccery.jpg'),
(23, 'Beverages', 'SoftDrinks, Juices, Concentrates, Tea, Coffee, EnergyDrinks, Water, Milk Drinks', 'Bevrages.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserName` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`UserName`, `Password`, `Email`) VALUES
('iMunnan', '25465879A', 'mmunnan450@gmail.com'),
('iRao', '0321Rao', 'raoammar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
