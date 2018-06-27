-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 06:14 PM
-- Server version: 5.5.59-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'confused', '64c4fdcae985702b85bb259e662583eb8848326b');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `number` varchar(20) NOT NULL,
  `category` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `start_hour` varchar(11) NOT NULL,
  `end_hour` varchar(11) NOT NULL,
  `start_minute` varchar(11) NOT NULL,
  `end_minute` varchar(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `slot` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `number`, `category`, `cat_name`, `start_hour`, `end_hour`, `start_minute`, `end_minute`, `day`, `month`, `year`, `slot`) VALUES
(10, 'confused', '7441183308', 5, 'Medium', '10', '10', '10', '22', 25, 6, 18, 4),
(11, 'confused', '7441183308', 5, 'Medium', '09', '10', '50', '02', 25, 6, 18, 4),
(12, 'confused', '7441183308', 6, 'Normal', '06', '06', '02', '08', 25, 6, 18, 5),
(13, 'confused', '7441183308', 5, 'Medium', '07', '07', '13', '25', 16, 7, 18, 5),
(14, 'confused', '7441183308', 6, 'Normal', '05', '06', '55', '01', 25, 6, 18, 5),
(15, 'confused', '7441183308', 6, 'Normal', '06', '07', '54', '00', 25, 6, 18, 5),
(16, 'confused', '7441183308', 6, 'Normal', '20', '20', '54', '59', 26, 6, 18, 6),
(17, 'confused', '7441183308', 7, 'High', '10', '12', '45', '14', 3, 7, 18, 6),
(18, 'confused', '7441183308', 7, 'High', '15', '17', '50', '19', 10, 7, 18, 6),
(19, 'Gaurav', 'Khare', 5, 'Medium', '20', '20', '40', '51', 26, 6, 18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(200) NOT NULL,
  `cat_minutes` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_minutes`) VALUES
(5, 'Medium', 12),
(6, 'Normal', 6),
(7, 'High', 90);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(200) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE IF NOT EXISTS `panels` (
  `panel_id` int(11) NOT NULL AUTO_INCREMENT,
  `panel_num` int(11) NOT NULL,
  PRIMARY KEY (`panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`panel_id`, `panel_num`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE IF NOT EXISTS `slots` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `day_id` int(11) NOT NULL,
  `start_hour` varchar(11) NOT NULL,
  `start_minute` varchar(11) NOT NULL,
  `end_hour` varchar(11) NOT NULL,
  `end_minute` varchar(11) NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `day_id`, `start_hour`, `start_minute`, `end_hour`, `end_minute`) VALUES
(6, 2, '10', '00', '21', '00'),
(7, 1, '9', '00', '12', '00'),
(8, 1, '5', '00', '8', '00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
