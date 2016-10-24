-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 12:17 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `family_table`
--

CREATE TABLE `family_table` (
  `famliy_id` smallint(6) NOT NULL,
  `parent_user_id` varchar(100) NOT NULL,
  `children_user_id` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `misc_duties_table`
--

CREATE TABLE `misc_duties_table` (
  `duty_id` smallint(6) NOT NULL,
  `duty_name` varchar(30) NOT NULL,
  `duty_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `user_id` smallint(6) NOT NULL,
  `courses_completed` text NOT NULL,
  `current_courses` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `user_id` smallint(6) NOT NULL,
  `courses_taught` text NOT NULL,
  `current_courses` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` mediumint(9) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `misc_duties` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family_table`
--
ALTER TABLE `family_table`
  ADD PRIMARY KEY (`famliy_id`);

--
-- Indexes for table `misc_duties_table`
--
ALTER TABLE `misc_duties_table`
  ADD PRIMARY KEY (`duty_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family_table`
--
ALTER TABLE `family_table`
  MODIFY `famliy_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `misc_duties_table`
--
ALTER TABLE `misc_duties_table`
  MODIFY `duty_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
