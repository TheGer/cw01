-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2013 at 10:58 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `carid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `enginesize` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`carid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carid`, `name`, `model`, `enginesize`, `mileage`, `notes`) VALUES
(1, 'Toyota', 'Yaris', 1300, 7500, 'Brand new 1'),
(2, 'Peugeot', '306', 1900, 8000, 'Peugeot Diesel engine');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `contentid` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorid` int(11) NOT NULL,
  PRIMARY KEY (`contentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `content`, `date`, `authorid`) VALUES
(1, 'This is a test front page article', '2013-02-13 09:58:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `secondname` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `firstname`, `secondname`, `address`, `type`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Gerard', 'Said', 'NA', 1),
(2, 'frontpage', '202cb962ac59075b964b07152d234b70', 'frontpage', 'user', 'frontpage address', 2),
(3, 'cms', '202cb962ac59075b964b07152d234b70', 'content', 'manager', 'content manager address 1 ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`typeid`, `type`) VALUES
(1, 'dms'),
(2, 'frontpage'),
(3, 'cms');

-- --------------------------------------------------------

--
-- Table structure for table `viewing`
--

CREATE TABLE IF NOT EXISTS `viewing` (
  `viewingid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `dateofviewing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booked` tinyint(1) NOT NULL,
  PRIMARY KEY (`viewingid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
