-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 08:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tution_request`
--

CREATE TABLE `tution_request` (
  `tution_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `is_accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tution_request`
--

INSERT INTO `tution_request` (`tution_id`, `student_id`, `tutor_id`, `is_accepted`) VALUES
(1591373751, 1591118807, 1, 0),
(1591373839, 1591118807, 1591286557, 1),
(1591375699, 1591118807, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email_id`, `password`, `mobile`, `type`) VALUES
(0, 'Rishit Aggarwal', 'rishitaggarwal1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '7015457296', 'Tutor'),
(1, 'Ritik Aggarwal', 'ritikaggarwal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '7015457529', 'Tutor'),
(1591118807, 'RA', 'ra@ra.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Student'),
(1591286557, 'Abcd', 'a@a.com', '81dc9bdb52d04dc20036dbd8313ed055', '9996505966', 'Tutor');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_id` int(11) NOT NULL,
  `highest_qualification` varchar(50) NOT NULL DEFAULT '-',
  `gender` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL DEFAULT '-',
  `district` varchar(50) NOT NULL DEFAULT '-',
  `state` varchar(50) NOT NULL DEFAULT '-',
  `above_class` varchar(50) NOT NULL,
  `subject1` varchar(50) NOT NULL,
  `subject2` varchar(50) NOT NULL,
  `subject3` varchar(50) NOT NULL,
  `average_tution_fees` varchar(50) NOT NULL DEFAULT '-',
  `about` varchar(200) NOT NULL,
  `recent_school` varchar(100) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `degree_image` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `people_rated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_id`, `highest_qualification`, `gender`, `address`, `district`, `state`, `above_class`, `subject1`, `subject2`, `subject3`, `average_tution_fees`, `about`, `recent_school`, `profile_image`, `degree_image`, `resume`, `rating`, `people_rated`) VALUES
(0, 'B.Tech', 'Male', 'Meerut', 'Meerut', 'Uttar Pradesh', '10th', 'Physics', 'Chemistry', 'Maths', '10,000', 'Very Passionate to do work.', 'Arya Senior Seconday School', '1.jpg', '1.jpg', '1.jpg', 2, 5),
(1, 'MSc (Science)', 'Male', 'Kurukshetra', 'Kurukshetra', 'Haryana', '9th', 'Physics', 'Chemistry', 'Biology', '5000', 'Love to do work.', 'D.A.V. Public School', '1.jpg', '1.jpg', '1.jpg', 4, 4),
(1591286557, 'M.S (Science)', 'Male', 'Dehradun', 'Dehradun', 'Uttrakhand', '11th', 'Physics', 'Chemistry', 'Biology', '8000', 'Very hardworking.', 'DPS Public School', '1.jpg', '', '', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tution_request`
--
ALTER TABLE `tution_request`
  ADD PRIMARY KEY (`tution_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
