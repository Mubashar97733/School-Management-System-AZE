-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2024 at 12:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aze`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int NOT NULL,
  `campus_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`) VALUES
(1, 'Main'),
(2, 'SR');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `c_id` int NOT NULL,
  `c_class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int NOT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_phone` varchar(255) DEFAULT NULL,
  `s_sex` varchar(255) DEFAULT NULL,
  `s_pay` int NOT NULL DEFAULT '0',
  `s_edu` varchar(255) DEFAULT NULL,
  `s_post` int DEFAULT NULL,
  `s_campus` int DEFAULT NULL,
  `s_join_year` int DEFAULT NULL,
  `s_join_month` int DEFAULT NULL,
  `s_join_date` date DEFAULT NULL,
  `s_join_comment` varchar(255) DEFAULT NULL,
  `s_leave_year` int DEFAULT NULL,
  `s_leave_month` int DEFAULT NULL,
  `s_leave_date` date DEFAULT NULL,
  `s_leave_reason` varchar(255) DEFAULT NULL,
  `s_leave_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `s_phone`, `s_sex`, `s_pay`, `s_edu`, `s_post`, `s_campus`, `s_join_year`, `s_join_month`, `s_join_date`, `s_join_comment`, `s_leave_year`, `s_leave_month`, `s_leave_date`, `s_leave_reason`, `s_leave_status`) VALUES
(1, 'Saba Ahmad', '03001234567', 'Female', 7000, 'BSCS', 5, 2, 2024, 1, '2024-01-01', NULL, 2024, 7, '2024-07-26', 'Marriage', 1),
(2, 'Consect', '606', 'Male', 216, 'Graduation', 7, 2, 2024, 1, '2024-01-01', NULL, 2024, 7, '2024-07-28', 'Transfer to other school', 1),
(3, 'Sadaf', '03000000501', 'Female', 10000, 'Masters', 3, 2, 2024, 1, '2024-01-01', NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Shuaib', '03001234567', 'Female', 10000, 'Graduation', 4, 2, 2024, 8, '2024-08-01', NULL, 2024, 8, '2024-08-03', 'QWERTy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_pay`
--

CREATE TABLE `staff_pay` (
  `sp_id` int NOT NULL,
  `s_id` int DEFAULT NULL,
  `sp_payable` int NOT NULL DEFAULT '0',
  `sp_pay` int NOT NULL DEFAULT '0',
  `sp_det` int NOT NULL DEFAULT '0',
  `sp_det_reason` varchar(255) DEFAULT NULL,
  `sp_date` date DEFAULT NULL,
  `sp_month` int DEFAULT NULL,
  `sp_year` int DEFAULT NULL,
  `sp_campus` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_pay`
--

INSERT INTO `staff_pay` (`sp_id`, `s_id`, `sp_payable`, `sp_pay`, `sp_det`, `sp_det_reason`, `sp_date`, `sp_month`, `sp_year`, `sp_campus`) VALUES
(1, 3, 2000, 1800, 200, 'Due to leave', '2024-06-27', 6, 2024, 2),
(4, 2, 2000, 1800, 200, 'Due to leave', '2024-06-27', 6, 2024, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff_post`
--

CREATE TABLE `staff_post` (
  `sp_id` int NOT NULL,
  `sp_post` varchar(255) DEFAULT NULL,
  `sp_badge` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_post`
--

INSERT INTO `staff_post` (`sp_id`, `sp_post`, `sp_badge`) VALUES
(1, 'Principal', 'badge-success'),
(2, 'Voice Principal', 'badge-success'),
(3, 'Head Teacher', 'badge-warning'),
(4, 'Teacher', 'badge-warning'),
(5, 'Coordinator', 'badge-warning'),
(6, 'Guard', 'badge-secondary'),
(7, 'Sweeper', 'badge-secondary'),
(8, 'Mad', 'badge-secondary'),
(9, 'Helper', 'badge-secondary');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int NOT NULL,
  `st_class` int DEFAULT NULL,
  `st_campus` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_phone` varchar(255) DEFAULT NULL,
  `u_sex` varchar(255) DEFAULT NULL,
  `u_status` int DEFAULT NULL,
  `u_un` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  `u_campus` varchar(255) DEFAULT NULL,
  `u_approve` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_phone`, `u_sex`, `u_status`, `u_un`, `u_pass`, `u_campus`, `u_approve`) VALUES
(1, 'Uzma Bukhari', '0300123467', 'Female', 2, 'uzma', 'uzma', '1', 1),
(2, 'Samera Imran', '0300123467', 'Female', 1, 'samera', 'samera', '1', 1),
(3, 'Izaz Ahmad', '0300123467', 'Male', 1, 'izaz', 'izaz', '2', 1),
(7, 'Sidra Bashir', '03001234567', 'Female', 2, 'sidra', 'sidra', '2', 1),
(8, 'shuaib', '03001234567', 'Male', 2, 'shuaib', 'shuaib', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `us_id` int NOT NULL,
  `us_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`us_id`, `us_status`) VALUES
(1, 'Principal'),
(2, 'Data Operator'),
(3, 'Helper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `staff_pay`
--
ALTER TABLE `staff_pay`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `staff_post`
--
ALTER TABLE `staff_post`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_pay`
--
ALTER TABLE `staff_pay`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_post`
--
ALTER TABLE `staff_post`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `us_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
