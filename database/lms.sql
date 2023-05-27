-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 09:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `c_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`c_name`) VALUES
('Australia'),
('India'),
('Japan'),
('USA');

-- --------------------------------------------------------

--
-- Table structure for table `csvdata`
--

CREATE TABLE `csvdata` (
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE `email_log` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_log`
--

INSERT INTO `email_log` (`id`, `email`) VALUES
(6, 'ravimandani@gmail.com'),
(7, 'sumitrajput@gmail.com'),
(10, 'ravimandani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userid`, `name`, `mobileno`, `gender`, `skill`, `state`, `country`, `CreatedAt`) VALUES
(164, 'Rutul Sheladiya', '8320893080', 'male', 'HTML , CSS , jQuery , PHP , Laravel', 'Canberra', 'Australia', '2023-05-25 11:15:28'),
(165, 'Ravi Mandani', '6456451111', 'female', 'HTML , CSS , PHP , Laravel', 'Gujarat', 'India', '2023-05-25 11:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `imgname` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `imgname`, `userid`) VALUES
(203, '31027061315.jpg', 164),
(204, '20078153664.jpg', 164),
(205, '306625103.jpg', 165),
(206, '4389042992.jpg', 165),
(207, '2354647021.jpg', 165);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `mobileno`, `email`, `password`, `gender`, `hobbies`, `profile`, `CreatedAt`, `status`, `token`) VALUES
(1, 'Rutul Sheladiya', '8320893080', 'rutulsheladiya2@gmail.com', '$2y$10$vDt2a5wLVJtm4xSRDRvm0uBfBLvIDvs0qeLsGrimOZ0VjQVSfMTa6', 'male', 'cricket,chess,', 'Screenshot from 2023-05-17 14-28-11.png', '2023-05-17 14:04:58', 1, ''),
(2, 'Ravi Mandani', '8963214785', 'ravimandani@gmail.com', '$2y$10$Cab4Z1O0onJTfPCwRWmVPemTJlCwbDXRMpRYWv3L/amq0Dutp3bga', 'male', 'cricket,chess,', 'Screenshot from 2023-05-16 18-55-52.png', '2023-05-17 14:05:15', 1, ''),
(9, 'Dhenish Jivani', '9090909087', 'dhenishjivani@gmail.com', '$2y$10$RhMUTd0R/dkWN94Q.TJAheQu4yUrM5sBqP8nfhlIaOOT9mNhm/IiK', 'male', 'cricket,chess,football,', '1.jpg', '2023-05-24 09:01:50', 1, NULL),
(10, 'Dheno123456789!@#$%^', '8765432123', 'dheno2@gmail.com', '$2y$10$LO7VoVRxy.ogJtSzl4SvpuVHFRfOyr9JCN.XYKK2Iy2Dk2gUOFmVO', 'female', 'cricket,chess,football,', '5.jpg', '2023-05-24 09:04:05', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`s_id`, `s_name`, `c_name`) VALUES
(1, 'Gujarat', 'India'),
(2, 'Rajasthan', 'India'),
(3, 'Delhi', 'India'),
(4, 'Uttarpradesh', 'India'),
(5, 'Madhyapradesh', 'India'),
(6, 'Kerala', 'India'),
(7, 'Queensland', 'Australia'),
(8, 'Canberra', 'Australia'),
(9, 'Victoria', 'Australia'),
(10, 'Tohoku', 'Japan'),
(11, 'Shikoku', 'Japan'),
(12, 'Hokkaido', 'Japan'),
(13, 'Wdhington', 'USA'),
(14, 'Clifornia', 'USA'),
(15, 'NewYork', 'USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `email_log`
--
ALTER TABLE `email_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useridfk` (`userid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `c_name` (`c_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `useridfk` FOREIGN KEY (`userid`) REFERENCES `employee` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `country_fk` FOREIGN KEY (`c_name`) REFERENCES `country` (`c_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
