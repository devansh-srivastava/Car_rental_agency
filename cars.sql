-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 05:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`, `gender`, `email`, `phone`, `location`) VALUES
(1, 'admin@gmail.com', 'admin', NULL, NULL, NULL, NULL),
(2, 'Ayush', 'ayush', 'Male', 'Ayush@gmail.com', '123123123', 'Delhi'),
(3, 'sanjay', '12345', 'Male', 'sanjay@gmail.com', '1177226633', 'Noida');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `hire_cost` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `car_number` varchar(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_type`, `image`, `hire_cost`, `capacity`, `car_number`, `status`) VALUES
(1, 'Mercedes Benz', 'Mercedes Benz', 'car1.jpg', 22000, 5, NULL, 'Available'),
(2, 'Range Rover', 'LandRover', 'car2.jpg', 18500, 6, 'UP32DL123', 'Unavailable'),
(3, 'Harrier', 'Toyota', 'car3.jpg', 19000, 6, NULL, 'Available'),
(5, 'LandCruiser V8', 'LandCruiser ', 'images (2).jpg', 18000, 5, NULL, 'Available'),
(6, 'Security Vehicles', 'Hammar Cars', 'sonkort2.png', 20000, 8, NULL, 'Available'),
(7, 'Wedding Limousine', 'Wedding Limousine', 'images (3).jpg', 21000, 10, NULL, 'Available'),
(9, 'Nano', 'Tata', 'tata nano.jpeg', 3000, 4, 'UP32HH0001', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mpesa` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `no_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fname`, `email`, `id_no`, `phone`, `location`, `gender`, `car_id`, `status`, `mpesa`, `start_date`, `no_days`) VALUES
(2, 'felix kiamba', 'kiambafelix@yahoo.com', 30073147, 705053484, 'nairobi', 'Male', 1, 'Approved', 'GTD45H7H6', NULL, NULL),
(3, 'concepter', 'concybogita@gmail.com', 27695131, 707403614, 'kisii', 'Female', 2, 'Approved', 'DJFL870FDK9', NULL, NULL),
(4, 'enock bosire', 'enock@gmail.com', 1234567, 717056766, 'narok', 'Male', 2, 'Approved', 'HJHK678X', NULL, NULL),
(5, 'devansh', 'devansh.srivastava2@gmail.com', 1233, 2147483647, 'Noida', 'Male', 5, 'Pending', '22Y38J3', '2023-01-28', 2),
(6, 'devansh', 'devansh.srivastava2@gmail.com', 1233, 2147483647, 'noida', 'Male', 5, 'Pending', '22Y38J3', '2023-01-28', 2),
(7, 'devansh', 'devansh.srivastava2@gmail.com', 0, 2147483647, 'Noida', 'Male', 5, 'Pending', '', '2023-01-28', 2),
(8, '', '', 0, 0, '', '', 2, 'Pending', '', '2013-11-10', 12),
(9, 'Suvigya', 'suvigya@gmail.com', 12345, 2147483647, 'Gurgoan', 'Male', 2, 'Approved', '11155ggdh', '2023-01-28', 12),
(10, 'anny', 'anny@gmail.com', 12345, 1222331, 'Delhi', 'Female', 6, 'Approved', '11155ggdh', '2023-01-27', 2),
(11, 'anushka', 'anushka@gmail.com', 12345, 122334455, 'Noida', 'Female', 0, 'Available', '11155ggdh', NULL, NULL),
(12, 'shaka', 'shaka@gmail.com', 12345, 126266262, 'Noida', 'Male', 0, 'Available', '11155ggdh', NULL, NULL),
(13, 'Reena', 'reena@gmail.com', 12345, 1177226622, 'Noida', 'Female', 9, 'Approved', '11155ggdh', '2023-01-29', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
