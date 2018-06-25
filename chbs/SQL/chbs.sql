-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:36 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yearstech_chbs`
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
(2, 1, 1, 'Night', '2018-02-28'),
(3, 2, 1, 'Night', '2018-02-28'),
(4, 2, 1, 'Day', '2018-02-28'),
(5, 3, 3, 'day', '2018-02-28'),
(7, 3, 3, 'Day', '2018-04-07');

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
(2, 'Israt', '0197xxxxxx', 'Chittagong', 'israt.jahan@gmail.com'),
(3, 'mehedi', '01855xxxx', 'agrabad,ctg', 'mehedihasan@gmail.com'),
(4, 'aneey', '0175xxxxx', 'deowanhat', 'aneey@yahoo.com'),
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
(24, 'Sukanta Paul', '01746539987', 'Chittagong', 'test@test.com'),
(25, 'Test client', '01xxxxxx', 'CTG', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `rent` int(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `manager_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `name`, `phone`, `address`, `rent`, `size`, `manager_id`) VALUES
(1, 'Gec Convention Hall', '018259999', 'GEC circle', 40000, '1200', 8),
(2, 'agrabad convention', '', 'ctg', 120000, '1200', 1),
(3, 'kajir deowri convention', '', 'kajir deori,ctg', 200000, '1200', 2),
(4, 'CDA convention', '', 'Halishahar.ctg', 120000, '1200', 3),
(6, 'GEC Convention', '', 'Chittagong', 5000, '1200', 2),
(10, 'Test Hall', '018xxxx', 'CTG', 1200, '1200', 6);

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
(7, 'Absar', '123', 'test@test.com'),
(8, 'Faruk Store', '019xxxxxxxx', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`) VALUES
('admin', '123', 'admin');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
