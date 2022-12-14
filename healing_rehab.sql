-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 05:18 PM
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
(84, 'Lotion'),
(83, 'Oil'),
(85, 'Soap');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `Pprice` float DEFAULT NULL,
  `Sprice` float DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `qty`, `Pprice`, `Sprice`, `category_id`) VALUES
(94, 'La neige', 2, 19.99, 34.99, 83),
(95, 'Dove Ultra Soft', 8, 9.99, 29.99, 84),
(96, 'AX body spray', 5, 14.99, 19.99, 85),
(97, 'Crest White strips', 5, 12.99, 44.99, NULL),
(98, 'Listerine', 21, 2.99, 6.99, NULL),
(99, 'Harrys Body soap', 7, 5.99, 10.99, 85);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT '(not specified)',
  `last_name` varchar(30) DEFAULT '(not specified)',
  `address` varchar(50) DEFAULT '(not specified)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `last_name`, `address`) VALUES
(57, 75, '(not specified)', '(not specified)', '(not specified)'),
(87, 106, 'Julien', 'Bernardo', '1250 rue patrick'),
(88, 107, 'Johnathan', '(not specified)', '(not specified)'),
(89, 108, '(not specified)', '(not specified)', '(not specified)'),
(90, 109, '(not specified)', '(not specified)', '(not specified)');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

DROP TABLE IF EXISTS `summary`;
CREATE TABLE `summary` (
  `summary_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `purchaseP` float NOT NULL,
  `sellingP` float DEFAULT NULL,
  `item_name` varchar(25) NOT NULL,
  `originalSP` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`summary_id`, `date`, `amount`, `discount`, `user`, `purchaseP`, `sellingP`, `item_name`, `originalSP`) VALUES
(265, '2022-12-14', '+ 10', NULL, 'admin', 12.99, NULL, 'Crest White strips', 44.99),
(266, '2022-12-14', '+ 6', NULL, 'admin', 2.99, NULL, 'Listerine', 6.99),
(267, '2021-12-15', '- 7', 15, 'admin', 5.99, 9.34, 'Harrys Body soap', 10.99),
(268, '2022-12-14', '- 3', 0, 'admin', 19.99, 34.99, 'La neige', 34.99),
(269, '2022-12-14', '- 8', 10, 'admin', 12.99, 40.49, 'Crest White strips', 44.99),
(270, '2021-11-14', '- 2', 5, 'Julien', 14.99, 18.99, 'AX body spray', 19.99),
(271, '2022-12-14', '+ 5', NULL, 'Julien', 14.99, NULL, 'AX body spray', 19.99),
(272, '2021-12-23', '- 4', 0, 'Johnathan', 14.99, 19.99, 'AX body spray', 19.99);

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
(75, 'admin', '$2y$10$OG8zc424qmRTVjeUuo17yOS3XNsKke5d4gzlFHNYAXc9S1L9cujKu', 'admin'),
(106, 'Julien', '$2y$10$K3VUlsiRRYQSmyDGwEG0JO9aN8qboUE0hrIHhG6I5.gOsTUeZ6tVK', 'employee'),
(107, 'Johnathan', '$2y$10$ikoaPH/Sxep8bK7J1xawkOAWDwlX65dTedO4aCPAl43jG4CO5pWj.', 'employee'),
(108, 'Fiacre', '$2y$10$lsZbj.jN.R05s2xhnbGCQ.Y2sPBYOpPnyrsAutd0Idk/JgBS9brz2', 'employee'),
(109, 'Xiao', '$2y$10$s5mEcvs2kbwSL9Vl2pd2dOkkDHWg9LV5mwkfM1II29KV9suCDs9Hi', 'employee');

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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`summary_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `summary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_to_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
