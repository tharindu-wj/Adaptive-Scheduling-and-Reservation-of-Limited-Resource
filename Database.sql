-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2017 at 07:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`b_id`, `b_name`, `b_location`) VALUES
(1, 'Stage 1', 0),
(2, 'Stage 2', 0),
(3, 'ICT', 0),
(4, 'L11 building', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Common'),
(2, 'ComputerScience');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(10) NOT NULL,
  `r_name` varchar(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `LAB` varchar(10) NOT NULL,
  `AC` varchar(10) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`, `b_id`, `capacity`, `LAB`, `AC`, `dept_id`) VALUES
(1, 'ICT LAB', 3, 20, 'true', 'true', 2),
(2, 'L10', 3, 20, 'false', 'false', 2),
(3, 'L8', 2, 20, 'false', 'false', 1),
(4, 'L11', 4, 20, 'false', 'false', 2),
(5, 'CS LAB', 1, 20, 'true', 'true', 2),
(7, 'test', 4, 20, 'true', 'true', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sch`
--

CREATE TABLE `sch` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `occupency` int(11) NOT NULL,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch`
--

INSERT INTO `sch` (`id`, `month`, `day`, `date`, `time`, `r_id`, `occupency`, `updateTime`) VALUES
(1, 'August', 24, 'Thursday', 18, 1, 3, '2017-08-24 12:39:35'),
(2, 'August', 24, 'Thursday', 8, 1, 30, '2017-08-24 12:41:56'),
(6, 'August', 26, 'Saturday', 8, 1, 35, '2017-08-26 03:15:17'),
(4, 'August', 24, 'Thursday', 19, 1, 3, '2017-08-24 13:30:36'),
(5, 'August', 24, 'Thursday', 20, 1, 3, '2017-08-24 14:30:11'),
(7, 'August', 26, 'Saturday', 9, 1, 35, '2017-08-26 03:29:58'),
(8, 'August', 7, 'Monday', 10, 1, 35, '2017-08-27 11:56:10'),
(9, 'August', 7, 'Monday', 11, 1, 35, '2017-08-27 11:56:10'),
(10, 'August', 7, 'Monday', 13, 1, 45, '2017-08-27 11:57:52'),
(41, 'August', 29, 'Tuesday', 11, 1, 2, '2017-08-29 06:07:52'),
(12, 'August', 7, 'Monday', 15, 1, 60, '2017-08-27 11:59:22'),
(14, 'August', 7, 'Monday', 16, 1, 60, '2017-08-27 12:01:08'),
(16, 'August', 8, 'Tuesday', 13, 1, 50, '2017-08-27 12:03:55'),
(17, 'August', 8, 'Tuesday', 14, 1, 50, '2017-08-27 12:03:55'),
(18, 'August', 8, 'Tuesday', 15, 1, 50, '2017-08-27 12:05:19'),
(19, 'August', 9, 'Wednesday', 8, 1, 55, '2017-08-27 12:10:01'),
(20, 'August', 9, 'Wednesday', 9, 1, 55, '2017-08-27 12:10:06'),
(21, 'August', 9, 'Wednesday', 10, 1, 55, '2017-08-27 12:10:06'),
(22, 'August', 10, 'Thursday', 9, 1, 60, '2017-08-27 12:13:28'),
(23, 'August', 10, 'Thursday', 10, 1, 60, '2017-08-27 12:13:28'),
(24, 'August', 10, 'Thursday', 11, 1, 60, '2017-08-27 12:13:32'),
(25, 'August', 11, 'Friday', 15, 1, 35, '2017-08-27 12:16:13'),
(26, 'August', 11, 'Friday', 13, 1, 35, '2017-08-27 12:16:16'),
(27, 'August', 11, 'Friday', 14, 1, 45, '2017-08-27 12:16:16'),
(28, 'August', 14, 'Monday', 10, 1, 45, '2017-08-27 12:18:56'),
(29, 'August', 14, 'Monday', 11, 1, 35, '2017-08-27 12:18:56'),
(30, 'August', 14, 'Monday', 14, 1, 45, '2017-08-27 12:23:23'),
(31, 'August', 14, 'Monday', 13, 1, 45, '2017-08-27 12:23:23'),
(32, 'August', 15, 'Tuesday', 11, 1, 50, '2017-08-27 12:32:17'),
(33, '', 0, '', 0, 0, 0, '2017-08-27 12:32:17'),
(34, 'August', 28, 'Monday', 14, 1, 35, '2017-08-28 09:00:21'),
(36, 'August', 28, 'Monday', 21, 1, 23, '2017-08-28 15:53:57'),
(37, 'August', 28, 'Monday', 22, 1, 23, '2017-08-28 17:11:07'),
(38, 'August', 28, 'Monday', 23, 1, 23, '2017-08-28 17:52:53'),
(39, 'August', 29, 'Tuesday', 0, 1, 23, '2017-08-28 18:30:00'),
(40, 'August', 29, 'Tuesday', 1, 1, 23, '2017-08-28 19:49:55'),
(42, 'August', 29, 'Tuesday', 12, 1, 6, '2017-08-29 06:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `s_code` varchar(15) NOT NULL,
  `std_group` int(15) NOT NULL,
  `dept_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `r_id`, `date`, `time`, `u_id`, `s_code`, `std_group`, `dept_id`) VALUES
(57, 1, 'friday', '10 ', 'lec008', 'ICT1201P', 1, 2),
(58, 1, 'friday', '11 ', 'lec008', 'ICT1201P', 1, 2),
(59, 1, 'friday', '13 ', 'lec008', 'ICT1201P', 1, 2),
(60, 1, 'friday', '14 ', 'lec008', 'ICT1201P', 1, 2),
(61, 1, 'friday', '15 ', 'lec008', 'ICT1201P', 1, 2),
(56, 1, 'friday', '9 ', 'lec008', 'ICT1201P', 1, 2),
(72, 1, 'monday', '10 ', 'lec006', 'ICT2402P', 2, 2),
(73, 1, 'monday', '11 ', 'lec006', 'ICT2402P', 2, 2),
(74, 1, 'monday', '13 ', 'lec009', 'ICT2403P', 2, 2),
(75, 1, 'monday', '14 ', 'lec009', 'ICT2403P', 2, 2),
(76, 1, 'monday', '15 ', 'lec009', 'ICT2403P', 2, 2),
(83, 1, 'tuesday', '13 ', 'lec009', 'ICT2403', 2, 2),
(81, 1, 'tuesday', '14 ', 'lec009', 'ICT2403', 2, 2),
(82, 1, 'tuesday', '15 ', 'lec009', 'ICT2403', 2, 2),
(47, 1, 'wednesday', '10 ', 'lec002', 'ICT1402P', 1, 2),
(45, 1, 'wednesday', '8 ', 'lec002', 'ICT1402P', 1, 2),
(46, 1, 'wednesday', '9 ', 'lec002', 'ICT1402P', 1, 2),
(102, 2, 'friday', '14 ', 'lec011', 'ICT3303', 3, 2),
(103, 2, 'friday', '15 ', 'lec011', 'ICT3303', 3, 2),
(104, 2, 'friday', '16 ', 'lec011', 'ICT3303', 3, 2),
(37, 2, 'monday', '10 ', 'lec002', 'ICT1402', 1, 2),
(38, 2, 'monday', '11 ', 'lec002', 'ICT1402', 1, 2),
(39, 2, 'monday', '13 ', 'lec003', 'ICT1303', 1, 2),
(40, 2, 'monday', '14 ', 'lec003', 'ICT1303', 1, 2),
(41, 2, 'monday', '15 ', 'lec004', 'FDN1204', 1, 2),
(51, 2, 'thursday', '10 ', 'lec005', 'FDN1201', 1, 2),
(52, 2, 'thursday', '11 ', 'lec005', 'FDN1201', 1, 2),
(53, 2, 'thursday', '13 ', 'lec005', 'FDN1201', 1, 2),
(54, 2, 'thursday', '14 ', 'lec005', 'FDN1201', 1, 2),
(55, 2, 'thursday', '15 ', 'lec001', 'FDN1205', 1, 1),
(112, 2, 'thursday', '8 ', 'lec016', 'ICT3301', 4, 2),
(42, 2, 'tuesday', '10 ', 'lec004', 'FDN1204', 1, 2),
(43, 2, 'tuesday', '11 ', 'lec004', 'FDN1204', 1, 2),
(44, 2, 'tuesday', '13 ', 'lec003', 'ICT1303', 1, 2),
(77, 2, 'tuesday', '8 ', 'lec009', 'ICT2403', 2, 2),
(78, 2, 'tuesday', '9 ', 'lec009', 'ICT2403', 2, 2),
(48, 2, 'wednesday', '13 ', 'lec005', 'FDN1201', 1, 2),
(49, 2, 'wednesday', '14 ', 'lec005', 'FDN1201', 1, 2),
(50, 2, 'wednesday', '15 ', 'lec005', 'FDN1205', 1, 2),
(108, 3, 'tuesday', '14 ', 'lec004', 'ICT3202', 4, 2),
(109, 3, 'tuesday', '15 ', 'lec004', 'ICT3202', 4, 2),
(98, 3, 'wednesday', '13 ', 'lec008', 'ICT3205', 3, 2),
(99, 3, 'wednesday', '14 ', 'lec008', 'ICT3205', 3, 2),
(100, 3, 'wednesday', '15 ', 'lec015', 'ICT3213', 3, 2),
(101, 3, 'wednesday', '16 ', 'lec015', 'ICT3213', 3, 2),
(116, 4, 'friday', '10 ', 'lec017', 'ICT3304', 4, 2),
(117, 4, 'friday', '11 ', 'lec017', 'ICT3304', 4, 2),
(91, 4, 'thursday', '10 ', 'lec002', 'ICT2301', 2, 2),
(92, 4, 'thursday', '11 ', 'lec002', 'ICT2301', 2, 2),
(90, 4, 'thursday', '9 ', 'lec002', 'ICT2301', 2, 2),
(79, 4, 'tuesday', '10 ', 'lec006', 'ICT2402', 2, 2),
(80, 4, 'tuesday', '11 ', 'lec006', 'ICT2402', 2, 2),
(85, 4, 'wednesday', '10 ', 'lec010', 'ICT2404', 2, 2),
(86, 4, 'wednesday', '11 ', 'lec010', 'ICT2404', 2, 2),
(111, 4, 'wednesday', '13 ', 'lec016', 'ICT3301', 4, 2),
(110, 4, 'wednesday', '14 ', 'lec016', 'ICT3301', 4, 2),
(84, 4, 'wednesday', '9 ', 'lec010', 'ICT2404', 2, 2),
(114, 5, 'thursday', '10 ', 'lec017', 'ICT3304', 4, 2),
(115, 5, 'thursday', '11 ', 'lec017', 'ICT3304', 4, 2),
(93, 5, 'thursday', '13 ', 'lec010', 'ICT2404P', 2, 2),
(94, 5, 'thursday', '14 ', 'lec010', 'ICT2404P', 2, 2),
(95, 5, 'thursday', '15 ', 'lec010', 'ICT2404P', 2, 2),
(113, 5, 'thursday', '9 ', 'lec017', 'ICT3304P', 4, 2),
(106, 5, 'tuesday', '10 ', 'lec017', 'ICT3304P', 4, 2),
(107, 5, 'tuesday', '11 ', 'lec017', 'ICT3304P', 4, 2),
(105, 5, 'tuesday', '9 ', 'lec017', 'ICT3304P', 4, 2),
(87, 5, 'wednesday', '13 ', 'lec010', 'ICT2404P', 2, 2),
(88, 5, 'wednesday', '14 ', 'lec010', 'ICT2404P', 2, 2),
(89, 5, 'wednesday', '15 ', 'lec010', 'ICT2404P', 2, 2),
(126, 7, 'monday', '8 ', 'test', 'aaa', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `std_group`
--

CREATE TABLE `std_group` (
  `std_group` int(15) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `nu_std` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_group`
--

INSERT INTO `std_group` (`std_group`, `semester`, `nu_std`) VALUES
(1, '1st year 1st semester', 65),
(2, '2nd year 1st semester', 67),
(3, '3rd year 1st semester', 63),
(4, '3rd year 2nd semester', 60);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `s_code` varchar(15) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `nu_lectures` int(11) NOT NULL,
  `LAB` varchar(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `std_group` int(10) NOT NULL,
  `nu_std` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `s_code`, `s_name`, `nu_lectures`, `LAB`, `dept_id`, `u_id`, `std_group`, `nu_std`) VALUES
(1, 'ICT1201', 'Fundamentals of Computer', 2, 'true', 2, 'test', 4, 25),
(2, 'ICT1201P', 'Fundamentals of Computer(Pr)', 1, 'true', 2, 'lec008', 1, 0),
(3, 'ICT1402', 'Principles of Programming', 3, 'false', 2, 'lec002', 1, 0),
(4, 'ICT1402P', 'Principles of Programming(Pr)', 1, 'true', 2, 'lec002', 1, 0),
(5, 'ICT1303', 'Basic Electronic & Design Logic', 3, 'false', 2, 'lec003', 1, 0),
(6, 'FDN1204', 'Basic Mathematics', 2, 'false', 1, 'lec004', 1, 0),
(7, 'FDN1201', 'General English', 2, 'false', 1, 'lec005', 1, 0),
(8, 'FDN1203', 'General Biology', 2, 'false', 1, 'lec007', 1, 0),
(9, 'FDN1205', 'Basic Science', 2, 'false', 1, 'lec001', 1, 0),
(10, 'ICT2301', 'Design & Analysis of Algorithm', 3, 'false', 2, 'lec002', 1, 0),
(11, 'ICT2402', 'Software Engineering', 3, 'false', 2, 'lec006', 2, 0),
(12, 'ICT2404', 'Multimedia & Web Technology', 3, 'false', 2, 'lec010', 2, 0),
(13, 'ICT2403', 'Graphics & Image Processing', 3, 'false', 2, 'lec009', 2, 0),
(14, 'ICT2403P', 'Graphics & Image Processing(Pr)', 3, 'true', 2, 'lec009', 2, 0),
(15, 'ICT2404P', 'Multimedia & Web Technology(Pr)', 1, 'true', 2, 'lec010', 2, 0),
(16, 'ICT3303', 'Information System Security', 3, 'false', 2, 'lec011', 3, 0),
(17, 'ICT3205', 'Project Management', 2, 'false', 2, 'lec008', 3, 0),
(18, 'ICT3207', 'Professional Practice and Ethics', 2, 'false', 2, 'lec012', 3, 0),
(19, 'ICT3209', 'Principle of Accounting', 2, 'false', 2, 'lec013', 3, 0),
(20, 'ICT3310', 'Marketing', 3, 'false', 2, 'lec014', 3, 0),
(21, 'ICT3213P', 'Intelligent Systems(Pr)', 1, 'true', 2, 'lec015', 3, 0),
(22, 'ICT3213', 'Intelligent Systems', 2, 'false', 2, 'lec015', 3, 0),
(23, 'ICT3301', 'Human Computer Interaction', 3, 'false', 2, 'lec016', 4, 0),
(24, 'ICT3202', 'Operational Research', 2, 'false', 2, 'lec004', 4, 0),
(25, 'ICT3304', 'Embedded Systems', 3, 'false', 2, 'lec017', 4, 20),
(26, 'ICT3304P', 'Embedded Systems(Pr)', 1, 'true', 2, 'lec017', 4, 0),
(27, 'ICT3208', 'Entrepreneurship', 2, 'false', 2, 'lec018', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `u_type` varchar(15) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `fullName`, `email`, `contact`, `password`, `salt`, `u_type`, `subjects`) VALUES
(1, 'lec001', 'Dr. Harshani', 'abcd@gmail.com', 1234567890, '12345', '', 'lecturer', 'Basic Science'),
(2, 'lec002', 'Mr. P.S.Palliyaguruge', 'abcd@gmail.com', 1234567890, '12345', '', 'lecturer', 'Principles of Programming/Principles of Programming(Pr)/Design & Analysis of Algorithm'),
(3, 'lec003', 'Mr. N.S.Weerakoon', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'Basic Electronic & Design Logic'),
(4, 'lec004', 'Mrs. Chamila Priyangika', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'Basic Mathematics/Operational Research'),
(5, 'lec005', 'Mr. Shantha Kumara', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'General English'),
(6, 'lec006', 'Mr. Akalanka Hettige', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'Software Engineering'),
(7, 'lec007', 'Mr. Gayan', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'General Biology'),
(8, 'lec008', 'Ms. Tharushika', 'abcd@gmail.com', 1234567890, '48c510731ebbedc7230c1ae17e47c0bc476616255b9002dd511a48cb8e2be16deb957eb3b9696ea50a41fa5d59911ddaf720b4ad8ec8dd68c4b3075c03881d62', '380ea013f9a83c1aa3b05e305e8422fad40541f22fac358a608decc7eff5764d', 'lecturer', 'Fundamentals of Computer/Fundamentals of Computer(Pr)/Project Management'),
(9, 'lec009', 'Mr. Hemantha Kulathilaka', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Graphics & Image Processing/Graphics & Image Processing(Pr)'),
(10, 'lec010', 'Mr. Amarakoon', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Multimedia & Web Technology/Multimedia & Web Technology(pr)'),
(11, 'lec011', 'Mr. Ajith Nilwakke', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Information System Security'),
(12, 'lec012', 'Mr. Chandana', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Professional Practice and Ethics'),
(13, 'lec014', 'Mr. Udurawana', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Marketing'),
(14, 'lec013', 'Mr. Prageeth', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'Principle of Accounting'),
(15, 'lec015', 'Mrs. Dinusha', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Intelligent Systems'),
(16, 'lec016', 'Mrs. Anupama Gunathilaka', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Human Computer Interaction'),
(17, 'lec017', 'Mr. Thilina Yapa', 'abcd@gmail.com\r\n', 1234567890, '12345', '', 'lecturer', 'Embedded Systems/Embedded Systems(Pr)'),
(18, 'lec018', 'Mr. Thusitha ', 'abcd@gmail.com\r\n', 1234567890, '12345\r\n', '', 'lecturer', 'Entrepreneurship'),
(19, 'test', 'Test', 'jhtw22@gmail.com', 123456789, 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', '55c89c5f6295e93cb9da7aaccaeb829c8549793d66d3eb79fe01402ff7e3aef9', 'lecturer', 'TestSubject ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `sch`
--
ALTER TABLE `sch`
  ADD PRIMARY KEY (`month`,`day`,`time`,`r_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`r_id`,`date`,`time`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `s_code` (`s_code`),
  ADD KEY `std_group` (`std_group`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `std_group`
--
ALTER TABLE `std_group`
  ADD PRIMARY KEY (`std_group`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_code` (`s_code`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `std_group` (`std_group`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sch`
--
ALTER TABLE `sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `std_group`
--
ALTER TABLE `std_group`
  MODIFY `std_group` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `building` (`b_id`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`u_id`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `schedule_ibfk_7` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`),
  ADD CONSTRAINT `schedule_ibfk_8` FOREIGN KEY (`std_group`) REFERENCES `std_group` (`std_group`),
  ADD CONSTRAINT `schedule_ibfk_9` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_4` FOREIGN KEY (`u_id`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `subject_ibfk_5` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `subject_ibfk_6` FOREIGN KEY (`std_group`) REFERENCES `std_group` (`std_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
