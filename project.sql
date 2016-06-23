-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2016 at 07:00 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infoempire_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_data`
--

CREATE TABLE IF NOT EXISTS `client_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field1` varchar(50) NOT NULL,
  `field2` varchar(50) NOT NULL,
  `field3` varchar(50) NOT NULL,
  `field4` varchar(50) NOT NULL,
  `field5` varchar(50) NOT NULL,
  `client_data_type` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client_data`
--

INSERT INTO `client_data` (`id`, `field1`, `field2`, `field3`, `field4`, `field5`, `client_data_type`, `userid`) VALUES
(1, 'field1 dentist', 'field2 dentist', 'field3 dentist', 'field4 dentist', 'field5 dentist', 1, 1),
(2, 'docc', 'asdftwo', 'three', 'four', 'oooo', 2, 1),
(3, 'physio1', 'and', 'physio3', 'and', 'physio5', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `data`, `admin_user_id`, `client_user_id`, `record_date`) VALUES
(5, 'SET Field 1 from <strong>222</strong> to <strong>physio1</strong> <br>\n		Set Field 2 from <strong>update</strong> to and <br>\n		Set Field 3 from <strong>p3</strong> to physio3 <br>\n		Set Field 4 from <strong>p4</strong> to and <br>\n		Set Field 5 from <strong>p5555</strong> to physio5 <br>\n		', 4, 1, '2016-01-26 23:53:41'),
(6, 'Set Field 1 from <strong>kalads;ljfkdsflj</strong> to <strong>field1 dentist</strong> <br>\n		Set Field 2 from <strong>lkjdsaflkj</strong> to field2 dentist</strong> <br>\n		Set Field 3 from <strong>lkajsdflkjsa</strong> to field3 dentist</strong> <br>\n		Set Field 4 from <strong>lkajdsfjsakdlf</strong> to field4 dentist</strong> <br>\n		Set Field 5 from <strong>lkjdsafs</strong> to field5 dentist</strong> <br>\n		', 2, 1, '2016-01-26 23:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `usertype` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `fname`, `lname`, `dob`, `usertype`) VALUES
(1, 'username', 'password', 'Tom', 'Brady', '1980-05-19', 1),
(2, 'admin_dentist', 'password', 'tim', 'duncan', '1978-12-23', 2),
(3, 'admin_doctor', 'password', 'Dwayne', 'Wayde', '1982-01-30', 3),
(4, 'admin_physio', 'password', 'Jerry', 'Rice', '1984-11-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `update_data`
--

CREATE TABLE IF NOT EXISTS `update_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `update_field1` varchar(50) NOT NULL,
  `update_field2` varchar(50) NOT NULL,
  `update_field3` varchar(50) NOT NULL,
  `update_field4` varchar(50) NOT NULL,
  `update_field5` varchar(50) NOT NULL,
  `update_data_type` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `update_data`
--

INSERT INTO `update_data` (`id`, `update_field1`, `update_field2`, `update_field3`, `update_field4`, `update_field5`, `update_data_type`, `userid`) VALUES
(27, '', '', '', '', '', '', 1),
(28, '', '', '', '', '', '', 1),
(29, '', '', '', '', '', '', 1),
(39, 'docfield1', 'docfield2', 'three', 'four', 'docfield5', '2', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
