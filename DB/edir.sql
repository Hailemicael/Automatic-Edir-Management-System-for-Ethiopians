-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 02:33 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edir`
--
CREATE DATABASE IF NOT EXISTS `edir` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `edir`;

-- --------------------------------------------------------

--
--  Table structure for table `accountant`
--

CREATE TABLE IF NOT EXISTS `accountant` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `name`, `address`, `mobile`, `password`) VALUES
('accountant', 'Helen Mesfin', 'Addis Ababa', '0944137246', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `mobile`, `password`) VALUES
(1, 'Abel Million', 'admin', '0911107770', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE IF NOT EXISTS `clearance` (
  `id` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `replay` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance`
--


-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `emaill` varchar(100) NOT NULL,
  `comment` varchar(205) NOT NULL,
  `cday` date NOT NULL,
  `rply` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`emaill`, `comment`, `cday`, `rply`) VALUES
('abe@gmail.com', 'sdtghsdfgsdfgsdg', '2020-08-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `mid` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`mid`, `id`, `name`, `address`, `mobile`, `sex`) VALUES
('mem3', 'mem33', 'ALMAZ ABEBE', 'Addis Ababa', '0911010101', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `address`, `mobile`, `password`) VALUES
('manager', 'Alemayehu Tesfaye', 'Addis Ababa', '0913147651', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `quantity`, `type`) VALUES
('mat1', 'Kubaya', '156', 'Lastik'),
('mat2', 'Sahin', '300', 'lastik');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `address`, `mobile`, `password`, `sex`) VALUES
('mem1', 'Temesgen Nibret', 'Addis Ababa', '0912602706', '12345', 'Male'),
('mem2', 'Lidiya Biniyam', 'Addis Ababa', '0924029607', '12345', 'Female'),
('mem3', 'ABEBE BEKELE', 'Addis Ababa', '0911000000', '12345', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `hday` date NOT NULL,
  `title` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `file`, `type`, `size`, `content`, `hday`, `title`) VALUES
(27, 'Login.jpg', 'image/jpeg', 36, 'Family will be at Abo Ethiopian \r\nOrthodox  church Wednesday starting at 6:00 AM bole 02 abo sefer Addis Ababa ', '2020-08-04', 'Announcements'),
(26, '89236-d1ac91a6bb87b944616b53417bbb289810749bd0dd02f091350185921b787339.jpg', 'image/jpeg', 36, 'The Church of St. Abo has been accepted as a legal Edir System after continues attempt to be approved by the committee and now we can a funeral ground thanks to our team to come this far. Have a great time.', '2020-08-05', 'Church');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `member_id`, `date`, `status`) VALUES
(3, 'mem1', '13-08-2020', '50'),
(10, 'mem2', '13-08-2020', '50'),
(14, 'mem3', '14-08-2020', '50');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `replay` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `content`, `date`, `replay`) VALUES
('Mem3', 'I am Sick ', '13/08/2020', 'Allow');

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE IF NOT EXISTS `punishment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `Member_id` varchar(20) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `birr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`id`, `Member_id`, `reason`, `birr`) VALUES
(5, 'mem1', 'mekret', '20'),
(6, 'mem2', 'Kebir', '100');
