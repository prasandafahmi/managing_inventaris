-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2014 at 06:11 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `managing_inventaris`
--
CREATE DATABASE IF NOT EXISTS `managing_inventaris` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `managing_inventaris`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` char(12) NOT NULL,
  `name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `permission` enum('Kepala Lab','Waka Sapras','Kepala Sekolah') NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `employee_code`, `name`, `password`, `image`, `permission`) VALUES
(1, 'admin2', 'Tri Priyo Saputro', 'admin2', 'admin2.png', 'Kepala Lab'),
(2, 'admin', 'Ahmad Fauzi', 'admin', 'admin1.png', 'Kepala Lab'),
(3, 'wakasapras', 'Bpk. Waka Sapras', 'wakasapras', 'wakasapras.png', 'Waka Sapras'),
(4, 'kepsek', 'Bpk. Usman Hasan', 'kepsek', 'kepsek.png', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE IF NOT EXISTS `item_list` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `supplier` varchar(300) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id_item`, `item_name`, `total`, `position`, `supplier`, `time`) VALUES
(19, 'CPU', '40', 'Lab RPL', 'Tri Priyo Saputro', '2014-10-12 14:43:41'),
(20, 'Laptop', '20', 'Lab RPL', 'Ahmad Fauzi', '2014-10-12 14:43:57'),
(21, 'Monitor', '40', 'Lab RPL', 'Ahmad Fauzi', '2014-10-12 14:44:10'),
(22, 'Mouse Logitech', '40', 'Lab RPL', 'Ahmad Fauzi', '2014-10-12 14:44:22'),
(23, 'Keyboard Genius', '25', 'Lab RPL', 'Tri Priyo Saputro', '2014-10-12 14:44:35'),
(25, 'Projector', '1', 'Lab RPL', 'Tri Priyo Saputro', '2014-10-12 14:57:33'),
(26, 'Mousepad', '40', 'Lab RPL', 'Ahmad Fauzi', '2014-10-12 20:18:50'),
(32, 'Sapu', '4', 'Lab RPL', 'Tri Priyo Saputro', '2014-10-14 08:58:35'),
(33, 'Pel', '3', 'Lab RPL', 'Ahmad Fauzi', '2014-10-14 08:58:46'),
(34, 'Lemari', '1', 'Lab RPL', 'Ahmad Fauzi', '2014-10-14 08:58:52'),
(35, 'AC', '2', 'Lab RPL', 'Tri Priyo Saputro', '2014-10-14 08:59:02'),
(36, 'Papan Tulis', '2', 'Lab RPL', 'Ahmad Fauzi', '2014-10-14 08:59:11'),
(37, 'Meja', '40', 'Lab RPL', 'Ahmad Fauzi', '2014-10-14 08:59:25'),
(38, 'Matras', '4', 'Lab RPL', 'Ahmad Fauzi', '2014-10-14 08:59:37'),
(39, 'Pengharum Ruangan', '2', 'Lab RPL', 'Ahmad Fauzi', '2014-10-23 14:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `item_out`
--

CREATE TABLE IF NOT EXISTS `item_out` (
  `id_out` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `total_out` int(11) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_out`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `item_out`
--

INSERT INTO `item_out` (`id_out`, `id_item`, `item_name`, `total_out`, `supplier`, `position`, `time`) VALUES
(8, 29, 'Ember', 10, 'Ahmad Fauzi', 'Lab RPL', '2014-10-13 10:42:22'),
(9, 33, 'Pel', 1, 'Tri Priyo Saputro', 'Lab RPL', '2014-10-14 09:01:54'),
(10, 23, 'Keyboard Genius', 5, 'Tri Priyo Saputro', 'Lab RPL', '2014-10-14 09:02:11'),
(11, 23, 'Keyboard Genius', 10, 'Tri Priyo Saputro', 'Lab RPL', '2014-10-14 09:02:16'),
(12, 40, 'Tes', 123, 'Ahmad Fauzi', 'Lab RPL', '2014-10-23 06:58:53'),
(13, 40, 'CPU', 2, 'Ahmad Fauzi', 'Lab RPL', '2014-10-23 17:11:05');

--
-- Triggers `item_out`
--
DROP TRIGGER IF EXISTS `stock_update`;
DELIMITER //
CREATE TRIGGER `stock_update` AFTER INSERT ON `item_out`
 FOR EACH ROW BEGIN
	UPDATE item_list AS ST SET ST.total = ST.total-NEW.total_out WHERE ST.id_item = NEW.id_item;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id_position` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(300) NOT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `position`) VALUES
(1, 'RPL'),
(2, 'MM'),
(3, 'TKJ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
