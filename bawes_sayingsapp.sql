-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2014 at 08:37 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bawes_sayingsapp`
--
CREATE DATABASE IF NOT EXISTS `bawes_sayingsapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bawes_sayingsapp`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_sort` int(11) NOT NULL,
  `category_datetime` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_sort`, `category_datetime`) VALUES
(1, 'وفاه', 10, '2014-12-23 22:33:38'),
(2, 'حزن', 9, '2014-12-23 22:33:52'),
(3, 'تهنئة', 1, '2014-12-23 22:36:40'),
(4, 'مولود جديد', 3, '2014-12-23 22:36:56'),
(5, 'خطبة', 5, '2014-12-23 22:37:11'),
(6, 'سيارة جديدة', 6, '2014-12-23 22:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_saying` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_response` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_datetime` datetime NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='requests from users' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saying`
--

CREATE TABLE IF NOT EXISTS `saying` (
  `saying_id` int(11) NOT NULL AUTO_INCREMENT,
  `saying_saying` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `saying_response` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `saying_datetime` datetime NOT NULL,
  PRIMARY KEY (`saying_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `saying`
--

INSERT INTO `saying` (`saying_id`, `saying_saying`, `saying_response`, `saying_datetime`) VALUES
(3, 'مبروك', ' الله يبارك فيك', '2014-12-23 22:03:47'),
(4, 'عظم الله أجركم', 'أجرنا وأجركم', '2014-12-23 22:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `saying_category`
--

CREATE TABLE IF NOT EXISTS `saying_category` (
  `saying_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`saying_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saying_category`
--

INSERT INTO `saying_category` (`saying_id`, `category_id`) VALUES
(3, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saying_category`
--
ALTER TABLE `saying_category`
  ADD CONSTRAINT `saying_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `saying_category_ibfk_1` FOREIGN KEY (`saying_id`) REFERENCES `saying` (`saying_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
