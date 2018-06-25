-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 11:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `hall_id` int(10) NOT NULL,
  `slot` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `client_id`, `hall_id`, `slot`, `date`) VALUES
(1, 1, 1, 'night', '2018-02-24'),
(2, 1, 1, 'day', '2018-02-28'),
(3, 2, 1, 'night', '2018-02-28'),
(4, 2, 1, 'night', '2018-02-28'),
(5, 3, 3, 'day', '2018-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `phone`, `address`, `email`) VALUES
(1, 'Shafiq', '0182xxxxxxxx', 'chittagong', 'safiq@yahoo.com'),
(2, 'israt', '0197xxxxxx', 'ctg', 'israt.jahan@gmail.com'),
(3, 'mehedi', '01855xxxx', 'agrabad,ctg', 'mehedihasan@gmail.com'),
(4, 'aneey', '0175xxxxx', 'deowanhat', 'aneey@yahoo.com'),
(5, 'arif', '01856xxxxxx', 'ctg', 'arif@yahoo.com'),
(6, '', '', '', ''),
(7, 'a', '123', 'Chittagong', 'test'),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, 'Ashik', '017xxxx', 'Chittagong', 'test@test.com'),
(11, 'Irfan', '018xx', 'Chittagong', 'test3'),
(12, 'Irfan', '018xx', 'Chittagong', 'test3'),
(13, 'Irfan', '018xx', 'Chittagong', 'test3'),
(14, 'Irfan', '018xx', 'Chittagong', 'test3'),
(15, 'Ashik', '017xxxx', 'Chittagong', 'test@test.com'),
(16, 'Ashik', '017xxxx', 'Chittagong', 'test@test.com'),
(17, 'Ashik', '017xxxx', 'Chittagong', 'test@test.com'),
(18, 'Ashik', '018xx', 'Chittagong', 'test@test.com'),
(19, 'Ashik', '018xx', 'Chittagong', 'test@test.com'),
(20, 'Ashik', '018xx', 'Chittagong', 'test@test.com'),
(21, 'Ashik', '018xx', 'Chittagong', 'test@test.com'),
(22, 'Ashik', '018xx', 'Chittagong', 'test@test.com'),
(23, 'Ashik', '018xx', 'Chittagong', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `rent` int(10) NOT NULL,
  `manager_id` int(10) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `name`, `address`, `rent`, `manager_id`, `size`) VALUES
(1, 'gec conventon hall', 'gec', 40000, 1, '1220sft'),
(2, 'agrabad convention', 'ctg', 120000, 1, '1200'),
(3, 'kajir deowri convention', 'kajir deori,ctg', 200000, 2, '1500'),
(4, 'CDA convention', 'Halishahar.ctg', 120000, 3, '1400'),
(5, 'lalkhan bazar community hall', 'lalkhan bazar', 2000000, 3, '1550'),
(6, 'GEC Convention', 'Chittagong', 5000, 2, '500\'');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `name`, `phone`, `email`) VALUES
(1, 'abir', '019832252xxx', 'abir@yahoo.com'),
(2, 'abir', '01975xxxxx', 'abir.kajal@yahoo.com'),
(3, 'mehedi', '01755xxxxx', 'mehedi@gmail.com'),
(4, 'shawlin', '019xxxxxxx', 'israt@yahoo.com'),
(5, 'israt', '018555xxxx', 'isratjahan@gmail.com'),
(6, 'Absar', '123', '{email}'),
(7, 'Absar', '123', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`) ON UPDATE CASCADE;

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
