-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 10:42 AM
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
-- Database: `awlad_elsayeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `PH_NUMBER` varchar(15) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`PH_NUMBER`, `NAME`, `ADDRESS`) VALUES
('0123456781', 'مجدي مجدي', 'المنوفية'),
('21321', 'asdasd', 'sdgsdgds');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMP_ID` int(11) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `SALARY` decimal(10,2) NOT NULL,
  `NUMBER` varchar(15) NOT NULL,
  `JOB_TITLE` varchar(100) NOT NULL,
  `HIRE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `IMAGE`, `NAME`, `SALARY`, `NUMBER`, `JOB_TITLE`, `HIRE_DATE`) VALUES
(1, 'images/me.jpg', 'شيف', '99999.99', '01032533937', 'المدير المدير', '2023-05-14 18:38:48'),
(9, 'images/ragb.jpg', 'رجب', '2232.00', '12131232', 'النادل', '2023-05-21 10:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ITEM_ID` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `ITEM_SIZE` varchar(10) NOT NULL,
  `IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ITEM_ID`, `TYPE`, `NAME`, `PRICE`, `ITEM_SIZE`, `IMAGE`) VALUES
(1, 'FOOD', 'كباب', '10.00', 'L', 'images/kebab.jpg'),
(2, 'FOOD', 'كباب', '7.00', 'M', 'images/kebab.jpg'),
(4, 'DRINKS', 'عصير تفاح طبيعي', '10.50', 'M', 'images/apple_juice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_NO` int(11) NOT NULL,
  `CUST_NUMBER` varchar(15) NOT NULL,
  `TOTAL_PRICE` decimal(5,2) NOT NULL,
  `NOTES` varchar(200) DEFAULT NULL,
  `ITEMS_ID` text NOT NULL,
  `ITEMS_QUANTITY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_NO`, `CUST_NUMBER`, `TOTAL_PRICE`, `NOTES`, `ITEMS_ID`, `ITEMS_QUANTITY`) VALUES
(4, '0123456781', '250.00', 'الكباب بدون بصل', '{1,2,3}', '{2,2,1}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`PH_NUMBER`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ITEM_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_NO`),
  ADD KEY `PLACE` (`CUST_NUMBER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `PLACE` FOREIGN KEY (`CUST_NUMBER`) REFERENCES `customers` (`PH_NUMBER`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
