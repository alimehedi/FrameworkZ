-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2013 at 07:17 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frameworkz`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `title`, `description`, `user_id`, `group_id`) VALUES
(1, 'Apartment Rental', 'Apartment Rental', 0, 1),
(2, 'Shared Accommodation', 'Shared Accommodation', 0, 1),
(3, 'Real Estate', 'Real Estate', 0, 1),
(4, 'Vacation Rental', 'Vacation Rental', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorygroup`
--

CREATE TABLE IF NOT EXISTS `categorygroup` (
  `group_id` int(10) unsigned NOT NULL,
  `title` varchar(16) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorygroup`
--

INSERT INTO `categorygroup` (`group_id`, `title`, `description`, `user_id`) VALUES
(1, 'Auction', 'Auction', 0),
(2, 'Businesses', 'Businesses', 0),
(3, 'For Sale', 'For Sale', 0),
(4, 'Housing', 'Housing', 0),
(5, 'Jobs', 'Jobs', 0),
(6, 'Personal', 'Personal', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `categorygroup` (`group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
