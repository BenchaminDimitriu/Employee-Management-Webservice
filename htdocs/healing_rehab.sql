-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 02:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healing_rehab`
--
CREATE DATABASE IF NOT EXISTS `healing_rehab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `healing_rehab`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(22, '1'),
(21, '2'),
(20, '3'),
(19, 'aaa'),
(26, 'Cool'),
(12, 'Cream'),
(17, 'dd'),
(18, 'dds'),
(27, 'f'),
(29, 'hhh'),
(23, 'md'),
(15, 'R'),
(24, 's'),
(16, 'ss'),
(14, 'test3'),
(28, 'undefined'),
(25, 'x');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `Pprice` float NOT NULL,
  `Sprice` float NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `qty`, `Pprice`, `Sprice`, `discount`, `category_id`) VALUES
(4, 'Test2', 3, 100, 120, NULL, 12),
(5, 'test', 1, 12, 33, NULL, 14),
(6, 'x', 3, 11, 45, NULL, 15),
(7, 'dd', 0, 0, 0, NULL, 19),
(8, 'd', 1, 3, 4, NULL, 19),
(9, 'ws', 5, 2, 2, NULL, 18),
(10, 's', 1, 1, 1, NULL, 16),
(11, '1', 1, 1, 1, NULL, 22),
(12, '111', 1, 1, 1, NULL, 21),
(13, 'a', 1, 1, 1, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `modification`
--

DROP TABLE IF EXISTS `modification`;
CREATE TABLE `modification` (
  `modification_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT '(not defined)',
  `last_name` varchar(30) DEFAULT '(not defined)',
  `address` varchar(50) DEFAULT '(not defined)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `last_name`, `address`) VALUES
(57, 75, '(not defined)', '(not defined)', '(not defined)'),
(66, 85, 'Julien', 'Bernardo', 'H7Y2C4');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `role` enum('employee','admin') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `role`) VALUES
(75, 'admin', '$2y$10$4MQ0wca0lDTw35R6xUWa/e/Q7A5sktPj3OU2GSvhgtFEgFRkcS9gO', 'admin'),
(85, 'Julien', '$2y$10$02rCnvZhJ1xpf15kx2./u.7VvHvD8p7WPKk6wbDzKoahAY5hElfze', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_to_category` (`category_id`);

--
-- Indexes for table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`modification_id`),
  ADD KEY `modification_to_item` (`item_id`),
  ADD KEY `modification_to_result` (`result_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `modification`
--
ALTER TABLE `modification`
  MODIFY `modification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_to_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `modification_to_result` FOREIGN KEY (`result_id`) REFERENCES `result` (`result_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
