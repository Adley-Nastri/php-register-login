-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2019 at 03:13 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u524817853_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `FirstName` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `LastName` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Username` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Founder` int(3) NOT NULL,
  `email` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `pass` char(40) COLLATE latin1_general_ci DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `banned_id` int(10) NOT NULL DEFAULT 0,
  `CEO` int(1) NOT NULL DEFAULT 0,
  `DateTime` datetime NOT NULL,
  `Date` text COLLATE latin1_general_ci NOT NULL,
  `Gender` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `Age` int(3) NOT NULL,
  `UserBio` text COLLATE latin1_general_ci NOT NULL,
  `Picture` text COLLATE latin1_general_ci NOT NULL,
  `ConfirmID` int(1) NOT NULL DEFAULT 0,
  `ConfirmCode` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
ALTER TABLE `users` ADD FULLTEXT KEY `FirstName` (`FirstName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
