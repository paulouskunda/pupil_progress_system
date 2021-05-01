-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2021 at 07:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupil_progress_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminUserName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUserName`, `password`, `dateCreated`) VALUES
(1, 'admin', '1234', '2020-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `exam_grade` int(11) NOT NULL,
  `exam_intake` varchar(100) NOT NULL,
  `pupil_exam_id` varchar(100) NOT NULL,
  `exams_marks_obtained` double NOT NULL,
  `school_of_origin` varchar(100) NOT NULL,
  `school_passed_to` varchar(100) NOT NULL,
  `date_uploaded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `exam_grade`, `exam_intake`, `pupil_exam_id`, `exams_marks_obtained`, `school_of_origin`, `school_passed_to`, `date_uploaded`) VALUES
(1, 7, '2020', '2020001', 790, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(2, 7, '2020', '2020002', 728, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(3, 7, '2020', '2020003', 650, 'Kansenshi Sec School', 'Ndola Basic School', '2021-05-01 17:51:51'),
(4, 7, '2020', '2020004', 800, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(5, 7, '2020', '2020005', 720, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(6, 7, '2020', '2020006', 890, 'Kansenshi Sec School', 'Hillcrest Sec School', '2021-05-01 17:51:51'),
(7, 7, '2020', '2020007', 790, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(8, 7, '2020', '2020008', 720, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(9, 7, '2020', '2020009', 750, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 17:51:51'),
(10, 9, '2019', '2019001', 400, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(11, 9, '2019', '2019002', 420, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(12, 9, '2019', '2019003', 430, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(13, 9, '2019', '2019004', 410, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(14, 9, '2019', '2019005', 422, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(15, 9, '2019', '2019006', 500, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(16, 9, '2019', '2019007', 490, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(17, 9, '2019', '2019008', 431, 'Ndola Basic School', 'Kansenshi Sec School', '2021-05-01 18:13:30'),
(18, 9, '2019', '2019009', 429, 'Kansenshi Sec School', 'Kansenshi Sec School', '2021-05-01 18:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` int(11) NOT NULL,
  `parentName` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `dateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `parentName`, `phoneNumber`, `address`, `dateCreated`) VALUES
(1, 'Paul Kunda', '0987656761', 'Mercy street', '2020-04-12 11:09:39'),
(2, 'Mwenya Evernly Kunda', '0987656761', '3rd Street', '2020-05-14 21:04:29'),
(3, 'Paul Boo Kunda', '972157418', 'Zambia', '2020-05-14 21:07:57'),
(4, 'Nias Nasi', '09123121221', 'niear too be', '2020-05-14 21:08:54'),
(6, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:17:53'),
(7, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:24'),
(8, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:44'),
(9, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:44'),
(10, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:45'),
(11, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:45'),
(12, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:46'),
(13, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:46'),
(14, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:46'),
(15, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:47'),
(16, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:47'),
(17, 'Paul Kunda', '972157418', 'Zambia', '2020-05-14 21:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

CREATE TABLE `pupil` (
  `pupilID` int(11) NOT NULL,
  `pupilName` varchar(50) NOT NULL,
  `parentID` int(11) NOT NULL,
  `dateOfBirth` varchar(10) NOT NULL,
  `grade` int(11) NOT NULL,
  `yearStarted` varchar(20) NOT NULL,
  `dateModified` date DEFAULT NULL,
  `activeStatus` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`pupilID`, `pupilName`, `parentID`, `dateOfBirth`, `grade`, `yearStarted`, `dateModified`, `activeStatus`) VALUES
(1, 'Val Bundu', 1, '2009-03-21', 3, '2005-09-13', '0000-00-00', 'active'),
(15, 'Talyah Monnery', 15, '2002-01-16', 6, '2014-05-11', '0000-00-00', 'active'),
(16, 'Kasolo Kasolo', 16, '2015-08-28', 2, '2019-02-24', '0000-00-00', 'active'),
(17, 'Luwi Ngosa', 17, '2006-05-22', 2, '2017-07-13', '2020-06-16', 'active'),
(19, 'Gardy Hilldrop', 19, '2003-08-25', 6, '2006-05-11', '0000-00-00', 'active'),
(20, 'Chanda Chanda', 20, '2010-03-13', 6, '2019-11-29', '0000-00-00', 'active'),
(31, 'Wayford Ngoma', 31, '2010-05-27', 3, '2004-08-06', '0000-00-00', 'active'),
(32, 'Niza Phiri', 32, '2016-01-12', 6, '2005-03-07', '0000-00-00', 'active'),
(35, 'Zulu Zulu', 35, '2013-06-22', 7, '2011-01-06', '0000-00-00', 'active'),
(37, 'Joan Zimba', 37, '2009-11-30', 4, '2011-11-02', '0000-00-00', 'active'),
(42, 'Lawrence Milimo', 42, '2005-01-23', 4, '2010-12-14', '0000-00-00', 'suspended'),
(43, 'Simon Lwipa', 43, '2003-06-08', 2, '2013-03-04', '2020-06-16', 'suspended'),
(44, 'Cythian Muyanbago', 44, '', 5, '2011-10-29', '0000-00-00', 'suspended'),
(55, 'Martin Musonda', 55, '2015-11-07', 5, '2007-10-27', '0000-00-00', 'suspended'),
(58, 'Saxe Phiri', 58, '2001-04-21', 5, '2017-10-02', '0000-00-00', 'No Progress'),
(59, 'Lwipa Zimo', 59, '2001-06-09', 2, '2019-10-27', '2020-06-16', 'No Progress'),
(61, 'Bright Makema', 61, '2015-11-21', 3, '2018-01-02', '0000-00-00', 'No Progress'),
(67, 'Bankwell Zimowala', 67, '2013-01-10', 4, '2018-04-13', '0000-00-00', 'No Progress'),
(71, 'Lala Banda', 71, '2004-06-22', 3, '2019-07-28', '0000-00-00', 'No Progress'),
(73, 'Kenneth Musonda', 73, '2008-11-24', 5, '2013-05-01', '0000-00-00', 'No Progress'),
(74, 'Roma McLewd', 74, '2014-04-14', 6, '2005-09-22', '0000-00-00', 'No Progress'),
(79, 'Aaron Sichula', 79, '2015-10-20', 4, '2015-03-19', '0000-00-00', 'Transfer'),
(82, 'Herman Simwala', 82, '2001-11-29', 3, '2019-01-05', '0000-00-00', 'Transfer'),
(84, 'Lilly Kunda', 84, '2017-08-18', 2, '2017-01-27', '0000-00-00', 'Transfer'),
(86, 'Mavotu Kagwanga', 86, '2000-09-23', 2, '2005-08-03', '2020-06-16', 'Transfer'),
(87, 'Innocent Shatamuka', 87, '2008-11-04', 7, '2016-10-23', '0000-00-00', 'Transfer'),
(88, 'Himwell Yakobo', 88, '2010-05-25', 7, '2013-07-15', '0000-00-00', 'Transfer'),
(89, 'Mwamba Nwigobo', 89, '2006-08-31', 6, '2016-01-18', '0000-00-00', 'Transfer'),
(90, 'Paulo Banda', 90, '2018-03-13', 1, '2018-02-22', '2020-06-16', 'Transfer'),
(92, 'Mwabwe Mabwe', 92, '2015-04-22', 2, '2013-09-15', '0000-00-00', 'Transfer'),
(94, 'Ngosa Mainga', 94, '2001-07-09', 2, '2019-05-04', '0000-00-00', 'Transfer'),
(96, 'Beti Chanagala', 96, '2014-11-19', 7, '2013-06-10', '0000-00-00', 'Transfer'),
(97, 'Odey Kaunda', 97, '2007-07-17', 5, '2019-07-09', '0000-00-00', 'Transfer'),
(99, 'Loviness  Zulu', 99, '2005-07-30', 5, '2008-09-02', '0000-00-00', 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `reasonID` int(11) NOT NULL,
  `pupilID` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `reasonDetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `grade_class` int(11) DEFAULT NULL,
  `dateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `phoneNumber`, `address`, `password`, `grade_class`, `dateCreated`) VALUES
(1, 'Natasha Smalls', '0987656761', 'Ku Mulenga', '12345', 6, '2020-04-12 00:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingID` int(11) NOT NULL,
  `pupilID` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `dateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`trackingID`, `pupilID`, `grade`, `dateModified`) VALUES
(1, 1, 2, '2020-04-12'),
(2, 17, 1, '2020-06-16'),
(3, 43, 1, '2020-06-16'),
(4, 59, 1, '2020-06-16'),
(5, 63, 1, '2020-06-16'),
(6, 77, 1, '2020-06-16'),
(7, 86, 1, '2020-06-16'),
(8, 17, 1, '2020-06-16'),
(9, 43, 1, '2020-06-16'),
(10, 59, 1, '2020-06-16'),
(11, 63, 1, '2020-06-16'),
(12, 77, 1, '2020-06-16'),
(13, 86, 1, '2020-06-16'),
(14, 90, 1, '2020-06-16'),
(15, 17, 2, '2020-06-16'),
(16, 43, 2, '2020-06-16'),
(17, 59, 2, '2020-06-16'),
(18, 63, 2, '2020-06-16'),
(19, 77, 2, '2020-06-16'),
(20, 86, 2, '2020-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`);

--
-- Indexes for table `pupil`
--
ALTER TABLE `pupil`
  ADD PRIMARY KEY (`pupilID`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`reasonID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pupil`
--
ALTER TABLE `pupil`
  MODIFY `pupilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `reasonID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;