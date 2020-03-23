-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 03:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classid` int(11) NOT NULL,
  `leaveid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `section` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dte` date NOT NULL,
  `adjusted_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classid`, `leaveid`, `year`, `period`, `section`, `dte`, `adjusted_id`, `fac_status`) VALUES
(1, 1, 3, 2, 'a', '2020-02-24', 'ANiL0422', 0),
(2, 1, 1, 5, 'b', '2020-02-25', 'ANIL1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leaveid` int(11) NOT NULL,
  `userid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hod_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leaveid`, `userid`, `from_date`, `to_date`, `type`, `reason`, `hod_status`) VALUES
(1, 'ANIL7777', '2020-02-24', '2020-02-25', 'cl', 'sick', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `department` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cse',
  `cl` int(11) NOT NULL DEFAULT 6,
  `od` int(11) NOT NULL DEFAULT 10,
  `al` int(11) NOT NULL DEFAULT 10,
  `el` int(11) NOT NULL DEFAULT 0,
  `lop` int(11) NOT NULL DEFAULT 0,
  `usertype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'faculty',
  `doj` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `mobile`, `pwd`, `gender`, `age`, `department`, `cl`, `od`, `al`, `el`, `lop`, `usertype`, `doj`) VALUES
('ANIL7777', 'hi', 'hi@gmail.com', 4567890123, '81dc9bdb52d04dc20036dbd8313ed055', 'male', 78, 'cse', 6, 10, 10, 0, 0, 'faculty', '2020-02-29'),
('ANIL9999', 'Hod', 'hod@gmail.com', 9012345678, '17d84f171d54c301fabae1391a125c4e', 'female', 50, 'cse', 6, 10, 10, 0, 0, 'hod', '2020-02-29'),
('ANIL1234', 'hello', 'hello@gmail.com', 2345678901, '81dc9bdb52d04dc20036dbd8313ed055', 'male', 54, 'cse', 6, 10, 10, 0, 0, 'faculty', '2020-02-28'),
('ANIL0422', 'Priyanka', 'priyanka@gmail.com', 9652266927, '81dc9bdb52d04dc20036dbd8313ed055', 'female', 30, 'cse', 6, 10, 10, 0, 0, 'faculty', '2017-06-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leaveid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leaveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
