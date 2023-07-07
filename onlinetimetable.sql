-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 04:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinetimetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(5, 'CSC1311 '),
(6, 'SEN 2311'),
(7, 'SEN2212'),
(8, 'SEN 2313'),
(9, 'SEN 2214'),
(10, 'SEN2215'),
(11, 'CSC3315'),
(12, 'SEN3311'),
(13, 'SEN3312'),
(14, 'SEN3313'),
(15, 'SEN4312'),
(16, 'SEN4313'),
(17, 'SEN4214');

-- --------------------------------------------------------

--
-- Table structure for table `invigilators`
--

CREATE TABLE `invigilators` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invigilators`
--

INSERT INTO `invigilators` (`id`, `name`) VALUES
(1, 'Sadik Yusuf'),
(3, 'Abubakar Sadik'),
(4, 'Muhammad Sani '),
(5, 'Sanee Itas'),
(6, 'Hamza Usman'),
(7, 'Aisha Umar');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(10) NOT NULL,
  `course_id` varchar(1000) DEFAULT NULL,
  `date_` date DEFAULT NULL,
  `day_` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `from_` varchar(255) DEFAULT NULL,
  `to_` varchar(255) DEFAULT NULL,
  `invigilator_id_i` varchar(255) DEFAULT NULL,
  `invigilator_id_ii` varchar(255) DEFAULT NULL,
  `invigilator_id_iii` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `course_id`, `date_`, `day_`, `venue`, `from_`, `to_`, `invigilator_id_i`, `invigilator_id_ii`, `invigilator_id_iii`) VALUES
(3, '16', '2023-07-06', 'Thursday', 'SLT', '08:30', '10:30', '7', '6', '4'),
(4, '14', '2023-07-07', 'Friday', 'MLK', '10:00', '12:00', '7', '3', '1'),
(6, '11', '2023-07-10', 'Monday', 'MLK', '14:00', '16:00', '4', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`) VALUES
(1, 'Sanee Itas', 'saneeitas@gmail.com', 'student', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Muhammad Sani ', 'muhdsanee87@gmail.com', 'lecturer', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invigilators`
--
ALTER TABLE `invigilators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invigilators`
--
ALTER TABLE `invigilators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
