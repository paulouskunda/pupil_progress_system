-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 08:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'Val Stollard', 1, '2009-03-21', 3, '2005-09-13', '0000-00-00', 'active'),
(2, 'Quintana Patillo', 2, '2017-07-15', 4, '2014-11-01', '0000-00-00', 'active'),
(3, 'Gerick Lukovic', 3, '2008-11-25', 5, '2017-07-21', '0000-00-00', 'active'),
(4, 'Brooke Scogings', 4, '2006-02-27', 6, '2009-04-07', '0000-00-00', 'active'),
(5, 'Niel Beazley', 5, '2009-02-03', 6, '2011-06-08', '0000-00-00', 'active'),
(6, 'Georgie Haines', 6, '2000-12-25', 3, '2019-04-26', '0000-00-00', 'active'),
(7, 'Glyn Gaskamp', 7, '2014-02-03', 5, '2012-11-18', '0000-00-00', 'active'),
(8, 'Elna McDavid', 8, '2014-09-26', 4, '2017-11-13', '0000-00-00', 'active'),
(9, 'Candide Stogill', 9, '2012-07-02', 2, '2018-02-17', '0000-00-00', 'active'),
(10, 'Audrey Townsend', 10, '2017-02-27', 2, '2018-02-21', '0000-00-00', 'active'),
(11, 'Claretta Lutman', 11, '2013-01-11', 6, '2006-09-27', '0000-00-00', 'active'),
(12, 'Berty Elliott', 12, '2008-12-15', 6, '2007-04-06', '0000-00-00', 'active'),
(13, 'Penelope Marrows', 13, '2003-03-08', 3, '2018-04-02', '0000-00-00', 'active'),
(14, 'Rafi Strelitzki', 14, '2016-11-01', 2, '2014-11-20', '0000-00-00', 'active'),
(15, 'Talyah Monnery', 15, '2002-01-16', 6, '2014-05-11', '0000-00-00', 'active'),
(16, 'Lynna Beavors', 16, '2015-08-28', 2, '2019-02-24', '0000-00-00', 'active'),
(17, 'Marielle McGilmartin', 17, '2006-05-22', 1, '2017-07-13', '0000-00-00', 'active'),
(18, 'Janey Comrie', 18, '2001-02-05', 3, '2011-05-11', '0000-00-00', 'active'),
(19, 'Gardy Hilldrop', 19, '2003-08-25', 6, '2006-05-11', '0000-00-00', 'active'),
(20, 'Ashla Blakeney', 20, '2010-03-13', 6, '2019-11-29', '0000-00-00', 'active'),
(21, 'Sabina Illsley', 21, '2013-05-07', 1, '2015-01-22', '0000-00-00', 'active'),
(22, 'Vivyanne Clubley', 22, '2011-02-03', 5, '2005-03-25', '0000-00-00', 'active'),
(23, 'Quentin Aitcheson', 23, '2017-01-05', 1, '2005-11-22', '0000-00-00', 'active'),
(24, 'Norina Weeds', 24, '2010-03-25', 5, '2013-08-07', '0000-00-00', 'active'),
(25, 'Northrop Pechold', 25, '2007-01-25', 2, '2005-02-05', '0000-00-00', 'active'),
(26, 'Dugald Grundwater', 26, '2006-05-10', 2, '2014-10-17', '0000-00-00', 'active'),
(27, 'Lesley Morde', 27, '2001-04-14', 2, '2016-07-10', '0000-00-00', 'active'),
(28, 'Boony Collinette', 28, '2011-11-11', 4, '2017-04-16', '0000-00-00', 'active'),
(29, 'Ode Gotthard', 29, '2006-09-23', 4, '2012-11-05', '0000-00-00', 'active'),
(30, 'Willi Collacombe', 30, '2017-12-28', 5, '2019-12-21', '0000-00-00', 'active'),
(31, 'Way Bampforth', 31, '2010-05-27', 3, '2004-08-06', '0000-00-00', 'active'),
(32, 'Hetty Westcott', 32, '2016-01-12', 6, '2005-03-07', '0000-00-00', 'active'),
(33, 'Irma Poter', 33, '2014-03-11', 2, '2004-04-20', '0000-00-00', 'active'),
(34, 'Lenard Sprowell', 34, '2016-09-19', 5, '2015-04-02', '0000-00-00', 'active'),
(35, 'Audrye Ovize', 35, '2013-06-22', 7, '2011-01-06', '0000-00-00', 'active'),
(36, 'Filbert Huzzey', 36, '2017-12-23', 3, '2006-09-21', '0000-00-00', 'active'),
(37, 'Ashien Chasson', 37, '2009-11-30', 4, '2011-11-02', '0000-00-00', 'active'),
(38, 'Kim Crichmere', 38, '2012-12-16', 7, '2013-03-14', '0000-00-00', 'active'),
(39, 'Symon Diver', 39, '2014-09-11', 6, '2004-06-21', '0000-00-00', 'suspended'),
(40, 'Didi Bettles', 40, '2013-05-08', 5, '2015-02-25', '0000-00-00', 'suspended'),
(41, 'Tadd Iremonger', 41, '2002-05-06', 6, '2012-10-08', '0000-00-00', 'suspended'),
(42, 'Stafani Waldren', 42, '2005-01-23', 4, '2010-12-14', '0000-00-00', 'suspended'),
(43, 'Seka Ashtonhurst', 43, '2003-06-08', 1, '2013-03-04', '0000-00-00', 'suspended'),
(44, 'Tiphany Turpey', 44, '2011-04-13', 5, '2011-10-29', '0000-00-00', 'suspended'),
(45, 'Jimmie Connelly', 45, '2012-04-04', 1, '2011-11-11', '0000-00-00', 'suspended'),
(46, 'Joey Hillitt', 46, '2015-05-04', 2, '2005-05-02', '0000-00-00', 'suspended'),
(47, 'Colby Bourdas', 47, '2017-08-05', 2, '2007-12-12', '0000-00-00', 'suspended'),
(48, 'Pru Joye', 48, '2012-07-23', 6, '2007-09-30', '0000-00-00', 'suspended'),
(49, 'Andy Onthank', 49, '2005-01-28', 3, '2008-01-03', '0000-00-00', 'suspended'),
(50, 'Madeleine Garn', 50, '2017-06-29', 1, '2011-12-15', '0000-00-00', 'suspended'),
(51, 'Cathy Savidge', 51, '2018-03-05', 7, '2010-11-22', '0000-00-00', 'suspended'),
(52, 'Lauren Glowinski', 52, '2010-08-29', 1, '2009-02-27', '0000-00-00', 'suspended'),
(53, 'Trefor Gaisford', 53, '2011-08-01', 3, '2018-11-07', '0000-00-00', 'suspended'),
(54, 'Ulric Tilston', 54, '2006-03-07', 2, '2007-11-13', '0000-00-00', 'suspended'),
(55, 'Ravi Graeme', 55, '2015-11-07', 5, '2007-10-27', '0000-00-00', 'suspended'),
(56, 'Kary Eassom', 56, '2007-04-09', 7, '2013-05-08', '0000-00-00', 'No Progress'),
(57, 'Asher Rothermel', 57, '2018-03-18', 4, '2010-03-26', '0000-00-00', 'No Progress'),
(58, 'Saxe Lezemere', 58, '2001-04-21', 5, '2017-10-02', '0000-00-00', 'No Progress'),
(59, 'Fitzgerald Boch', 59, '2001-06-09', 1, '2019-10-27', '0000-00-00', 'No Progress'),
(60, 'Harriett Whisker', 60, '2001-10-18', 7, '2017-06-13', '0000-00-00', 'No Progress'),
(61, 'Bill Lightman', 61, '2015-11-21', 3, '2018-01-02', '0000-00-00', 'No Progress'),
(62, 'Pippo Seaking', 62, '2008-11-19', 5, '2004-09-01', '0000-00-00', 'No Progress'),
(63, 'Jobey Buyers', 63, '2016-07-05', 1, '2016-06-26', '0000-00-00', 'No Progress'),
(64, 'Catlaina Sidwick', 64, '2012-06-27', 3, '2016-05-10', '0000-00-00', 'No Progress'),
(65, 'Jedidiah Sarfatti', 65, '2004-04-14', 6, '2011-12-12', '0000-00-00', 'No Progress'),
(66, 'Gerri Bowyer', 66, '2009-11-07', 6, '2004-10-21', '0000-00-00', 'No Progress'),
(67, 'Banky Da Costa', 67, '2013-01-10', 4, '2018-04-13', '0000-00-00', 'No Progress'),
(68, 'Patience Janousek', 68, '2001-09-23', 4, '2018-10-21', '0000-00-00', 'No Progress'),
(69, 'Gertruda Kliner', 69, '2012-03-03', 7, '2018-02-14', '0000-00-00', 'No Progress'),
(70, 'Elsworth Durnill', 70, '2006-01-18', 6, '2014-08-06', '0000-00-00', 'No Progress'),
(71, 'Sidnee Dufer', 71, '2004-06-22', 3, '2019-07-28', '0000-00-00', 'No Progress'),
(72, 'Johnathon Cowgill', 72, '2004-07-21', 5, '2005-02-13', '0000-00-00', 'No Progress'),
(73, 'Kevyn Simco', 73, '2008-11-24', 5, '2013-05-01', '0000-00-00', 'No Progress'),
(74, 'Roma McLewd', 74, '2014-04-14', 6, '2005-09-22', '0000-00-00', 'No Progress'),
(75, 'Roda Reidie', 75, '2010-12-27', 7, '2013-09-16', '0000-00-00', 'No Progress'),
(76, 'Ezechiel Tennet', 76, '2016-02-22', 7, '2006-06-19', '0000-00-00', 'No Progress'),
(77, 'Wynn Farres', 77, '2008-07-10', 1, '2006-04-20', '0000-00-00', 'No Progress'),
(78, 'Tandi Mac', 78, '2013-05-01', 3, '2010-06-06', '0000-00-00', 'No Progress'),
(79, 'Hervey Featherstone', 79, '2015-10-20', 4, '2015-03-19', '0000-00-00', 'Transfer'),
(80, 'Faye Winridge', 80, '2007-06-28', 7, '2015-07-07', '0000-00-00', 'Transfer'),
(81, 'Adelina Ickovic', 81, '2008-06-22', 5, '2015-08-15', '0000-00-00', 'Transfer'),
(82, 'Hermina Colbourn', 82, '2001-11-29', 3, '2019-01-05', '0000-00-00', 'Transfer'),
(83, 'Jaquenetta Byrne', 83, '2010-05-10', 1, '2015-05-01', '0000-00-00', 'Transfer'),
(84, 'Lynne Aubrey', 84, '2017-08-18', 2, '2017-01-27', '0000-00-00', 'Transfer'),
(85, 'Glen Alves', 85, '2013-10-26', 4, '2013-12-01', '0000-00-00', 'Transfer'),
(86, 'Ilsa Maevela', 86, '2000-09-23', 1, '2005-08-03', '0000-00-00', 'Transfer'),
(87, 'Jocelin Cuming', 87, '2008-11-04', 7, '2016-10-23', '0000-00-00', 'Transfer'),
(88, 'Bern Ygoe', 88, '2010-05-25', 7, '2013-07-15', '0000-00-00', 'Transfer'),
(89, 'Dewie Stansell', 89, '2006-08-31', 6, '2016-01-18', '0000-00-00', 'Transfer'),
(90, 'Ella Peers', 90, '2018-03-13', 1, '2018-02-22', '0000-00-00', 'Transfer'),
(91, 'Tonya Setchfield', 91, '2002-10-06', 1, '2009-08-31', '0000-00-00', 'Transfer'),
(92, 'Candis Arndt', 92, '2015-04-22', 2, '2013-09-15', '0000-00-00', 'Transfer'),
(93, 'Vikki Collick', 93, '2014-05-28', 1, '2005-06-16', '0000-00-00', 'Transfer'),
(94, 'Damaris Magrane', 94, '2001-07-09', 2, '2019-05-04', '0000-00-00', 'Transfer'),
(95, 'Astrid Spileman', 95, '2017-10-13', 6, '2011-01-14', '0000-00-00', 'Transfer'),
(96, 'Linet Dounbare', 96, '2014-11-19', 7, '2013-06-10', '0000-00-00', 'Transfer'),
(97, 'Odey Levicount', 97, '2007-07-17', 5, '2019-07-09', '0000-00-00', 'Transfer'),
(98, 'Whitney Wakeham', 98, '2006-03-06', 3, '2015-04-27', '0000-00-00', 'Transfer'),
(99, 'Loise Sivess', 99, '2005-07-30', 5, '2008-09-02', '0000-00-00', 'Transfer'),
(100, 'Melamie Blazey', 100, '2016-12-06', 4, '2011-09-28', '0000-00-00', 'Transfer');

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
  `dateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `phoneNumber`, `address`, `password`, `dateCreated`) VALUES
(1, 'Natasha Smalls', '0987656761', 'Ku Mulenga', '12345', '2020-04-12 00:54:00');

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
(1, 1, 2, '2020-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

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
  MODIFY `trackingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
