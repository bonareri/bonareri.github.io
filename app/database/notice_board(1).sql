-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 07:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notice_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_alt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `subject`, `description`, `image`, `created_alt`) VALUES
(1, 'Cultural Day Festival', 'Cultural Day is to be held at carnivore grounds', '1629822183cultural.jpg', '2021-08-24 18:04:55'),
(2, 'Miss University competition', 'Miss CUEA competition is to be held next month at carnivore grounds', '1629822124MissUni.jpg', '2021-08-24 18:04:55'),
(3, 'Graduation ceremony', 'Graduation ceremony will be held virtually', '1629816261Graduation.jpg', '2021-08-24 18:04:55'),
(4, 'Sports Day', 'Annual sports day event will be held in August 26 ', '1629818900sports1.jpg', '2021-08-24 18:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_alt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `subject`, `message`, `created_alt`) VALUES
(2, 'melody', 'melody@gmail.com', 'Graduation ceremony', 'When is the project defence starting', '2021-09-13'),
(3, 'melody', 'melody@gmail.com', 'Information received', 'The notice was successfully received', '2021-09-13'),
(9, 'melody', 'melody@gmail.com', 'something', 'When are we going for long holiday', '2021-09-13'),
(13, 'melody', 'melody@gmail.com', 'something', 'I will pass the project', '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_alt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`, `description`, `image`, `file`, `created_alt`) VALUES
(2, 'Project Defence Date', 'Project Defence is schedulled to begin next week but one', '1631368467cultural2.jpg', '1631549612project communication.pdf', '2021-08-24 18:03:32'),
(9, 'Registration of units', 'The portal will be open for unit registration starting from 9 th September to 15th Sepember', '1630511793Graduation.webp', '1631549727Degree Project marking scheme.pdf', '2021-09-01 18:56:33'),
(14, 'School Clearance', 'Students who have fully completed their projects can begin clearing from 21-08-2021.', '', '1631549174GRADUATION APPLICATION FORM 2021.docx', '2021-09-13 19:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(11, 'small', 'small@gmail.com', 'ed4ea2148182e9c2e6fc2c79225fd074', 'admin'),
(12, 'melody', 'melody@gmail.com', '88772f11c2916fcb4425161c2c58a165', 'student'),
(13, 'caro', 'caro123@gmail.com', '437612e345ed8c59db6e905a8dc0d1c6', 'admin'),
(14, 'juliet', 'juliet@gmail.com', '8e7be747a990f47f81656240d07e457a', 'student'),
(15, 'Pius', 'pius@gmail.com', '2d7db2ebdac0bd0168b2668e6d59acd1', 'student'),
(16, 'admin', 'admin@gmail.com', 'ecd00aa1acd325ba7575cb0f638b04a5', 'admin'),
(17, 'joyce', 'joyce@gmail.com', 'bc22ef99f8f4c1771e016bb09f6630de', 'student'),
(18, 'Alex', 'alex@gmail.com', '534b44a19bf18d20b71ecc4eb77c572f', 'student'),
(19, 'naomi', 'naomi@gmail.com', 'af019c0530e1f9cb4103b6ca522b6047', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
