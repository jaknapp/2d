-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2014 at 09:30 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2d`
--

-- --------------------------------------------------------

--
-- Table structure for table `sprite`
--

CREATE TABLE IF NOT EXISTS `sprite` (
  `spriteid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `base64` text COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `filex` int(10) unsigned NOT NULL,
  `filey` int(10) unsigned NOT NULL,
  PRIMARY KEY (`spriteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tileset`
--

CREATE TABLE IF NOT EXISTS `tileset` (
  `tilesetid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filepath` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tilesetid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
