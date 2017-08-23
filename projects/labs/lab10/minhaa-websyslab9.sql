-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 03:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minhaa-websyslab9`
--
CREATE DATABASE IF NOT EXISTS `minhaa-websyslab9` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `minhaa-websyslab9`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(35090, 'PSYC', 1200, 'General Psychology', 2, 2017),
(35130, 'CHME', 2020, 'Energy, Entropy, and Equilibrium', 1, 2017),
(35303, 'ECON', 1200, 'Introductory Economics', 1, 2017),
(35392, 'PSYC', 1200, 'Critical Thinking', 1, 2017),
(35439, 'CSCI', 1100, 'Computer Science 1', 1, 2017),
(35444, 'CSCI', 1200, 'Data Structures', 1, 2017),
(35672, 'CHEM', 1100, 'Chemistry 1', 1, 2017),
(37350, 'ITWS', 1220, 'IT and Society', 1, 2017),
(37565, 'MGMT', 2510, 'Microcomputers and Applications', 1, 2017),
(37889, 'BIOL', 1010, 'Introduction to Biology', 1, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `crn` int(11) NOT NULL,
  `rin` int(11) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
(1, 35090, 660350644, 85),
(2, 35130, 661170510, 80),
(3, 35303, 661170544, 90),
(4, 35392, 661370610, 80),
(5, 35439, 661370622, 100),
(6, 35444, 661370632, 85),
(7, 35672, 661370644, 70),
(8, 37350, 661370689, 80),
(9, 37565, 661384441, 90),
(10, 37889, 661570644, 96),
(11, 35090, 660350644, 50),
(12, 35130, 661170510, 100),
(13, 35303, 661170544, 75),
(14, 35392, 661370610, 98),
(15, 35439, 661370622, 90),
(16, 35444, 661370632, 80),
(17, 35672, 661370644, 80),
(18, 37350, 661370689, 100),
(19, 37565, 661384441, 50),
(20, 37889, 661570644, 80);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rin` int(9) NOT NULL,
  `rcsid` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rin`, `rcsid`, `first name`, `last name`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES
(660350644, 'slotep', 'Parker', 'Slote', 'Park', 516777777, '2 Alva Road', 'Niskayuna', 'NY', 12309),
(661170510, 'minhay', 'Yousuf', 'Minhas', 'You', 518123444, '1 Cherry Road', 'Troy', 'NY', 12110),
(661170544, 'minhar', 'Robert', 'Minhas', 'Rob', 518444444, '2 Menlo Park Road', 'Niskayuna', 'NY', 12309),
(661370610, 'phillic', 'Christine', 'Phillips', 'Christy', 1111111111, '5 Congress Street', 'Troy', 'NY', 12110),
(661370622, 'minhah', 'Hunter', 'Minhas', 'Hunt', 518364555, '1 Orchard Park Road', 'Niskayuna', 'NY', 12309),
(661370632, 'minhao', 'Osama', 'Minhas', 'Os', 518777777, '3 13th Street', 'Troy', 'NY', 12110),
(661370644, 'minhaa', 'Adeel', 'Minhas', 'AJM', 999999999, '10 Alva Road', 'Albany', 'NY', 12309),
(661370689, 'turne1', 'Rebecca', 'Turner', 'Becca', 555555555, '10 Hoosick Street', 'Troy', 'NY', 12110),
(661384441, 'gardnh1', 'Helen', 'Gardner', 'Hel', 518999999, '1 15th Streer', 'Troy', 'NY', 12110),
(661570644, 'minhaj', 'Joesph', 'Minhas', 'Joe', 518234555, '3 13th Street', 'Troy', 'NY', 12110);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crn`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crn` (`crn`),
  ADD KEY `rin` (`rin`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_crn` FOREIGN KEY (`crn`) REFERENCES `courses` (`crn`),
  ADD CONSTRAINT `grades_rin` FOREIGN KEY (`rin`) REFERENCES `students` (`rin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
