-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 01:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--
CREATE DATABASE IF NOT EXISTS `estore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `estore`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Sep 11, 2020 at 11:42 AM
-- Last update: Oct 01, 2020 at 10:44 AM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(500) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `admin_pass` varchar(500) NOT NULL,
  `admin_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT DELAYED IGNORE INTO `admin` VALUES(6, 'lina', 'lina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1601549047c1.jpg');
INSERT DELAYED IGNORE INTO `admin` VALUES(7, 'rawan', 'rawan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1601549022c8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Sep 11, 2020 at 11:55 AM
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(500) NOT NULL,
  `cat_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `category`:
--

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
--
-- Dumping data for table `category`
--

INSERT DELAYED IGNORE INTO `category` VALUES(12, 'iphon', '1601056383c15.jpg');
INSERT DELAYED IGNORE INTO `category` VALUES(13, 'samsumg', '1601056411c3.jpg');
INSERT DELAYED IGNORE INTO `category` VALUES(14, 'huawi', '1601056454c14.gif');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
-- Creation: Sep 11, 2020 at 11:54 AM
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(500) NOT NULL,
  `customer_email` varchar(500) NOT NULL,
  `customer_pass` varchar(500) NOT NULL,
  `customer_mobile` int(100) NOT NULL,
  `customer_adress` varchar(500) NOT NULL,
  `customer_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Truncate table before insert `customer`
--

TRUNCATE TABLE `customer`;
--
-- Dumping data for table `customer`
--

INSERT DELAYED IGNORE INTO `customer` VALUES(9, 'ahmad', 'ahmad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 52463524, 'irbid', '1601543389c7.jpg');
INSERT DELAYED IGNORE INTO `customer` VALUES(10, 'sawsan', 'sawsan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 772705883, 'irbid', '1601543729c13.jpg');
INSERT DELAYED IGNORE INTO `customer` VALUES(11, 'jojo', 'jojo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 772705883, 'irbid', '1601543954111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favert_details`
--
-- Creation: Sep 29, 2020 at 12:52 PM
-- Last update: Oct 01, 2020 at 11:05 AM
--

DROP TABLE IF EXISTS `favert_details`;
CREATE TABLE IF NOT EXISTS `favert_details` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(500) NOT NULL,
  `pro_img` varchar(1000) NOT NULL,
  `pro_desc` varchar(500) NOT NULL,
  `pro_price` varchar(500) NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `favert_details`:
--

--
-- Truncate table before insert `favert_details`
--

TRUNCATE TABLE `favert_details`;
--
-- Dumping data for table `favert_details`
--

INSERT DELAYED IGNORE INTO `favert_details` VALUES(60, 31, 'cover2', '1601087496c17.jpg', 'The finest and best types of phones and their accessories', '14');
INSERT DELAYED IGNORE INTO `favert_details` VALUES(62, 28, 'samsung phone ', '1601087339c3.jpg', 'The finest and best types of phones and their accessories', '300');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--
-- Creation: Sep 25, 2020 at 12:00 PM
-- Last update: Oct 01, 2020 at 11:05 AM
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_order` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(500) NOT NULL,
  `pro_price` varchar(500) NOT NULL,
  `pro_qua` int(11) NOT NULL,
  `total` varchar(1000) NOT NULL,
  `pro_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `order_details`:
--

--
-- Truncate table before insert `order_details`
--

TRUNCATE TABLE `order_details`;
--
-- Dumping data for table `order_details`
--

INSERT DELAYED IGNORE INTO `order_details` VALUES(23, 1, 0, 31, 'cover2', '14', 3, '42', '1601087496c17.jpg');
INSERT DELAYED IGNORE INTO `order_details` VALUES(24, 1, 0, 28, 'samsung phone ', '300', 3, '900', '1601087339c3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Sep 20, 2020 at 05:34 AM
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `pro_name` varchar(500) NOT NULL,
  `pro_price` varchar(500) NOT NULL,
  `pro_desc` varchar(1000) NOT NULL,
  `numpro` int(11) NOT NULL,
  `pro_img` varchar(1000) NOT NULL,
  `block_allow` varchar(500) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--

--
-- Truncate table before insert `product`
--

TRUNCATE TABLE `product`;
--
-- Dumping data for table `product`
--

INSERT DELAYED IGNORE INTO `product` VALUES(27, 12, 15, 0, 'phone1', '200', 'The finest and best types of phones and their accessories', 0, '1601087296card-phone.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(28, 13, 15, 0, 'samsung phone ', '300', 'The finest and best types of phones and their accessories', 0, '1601087339c3.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(29, 14, 15, 0, 'huawi phone', '210', 'The finest and best types of phones and their accessories', 0, '1601087402c14.gif', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(30, 12, 16, 0, 'cover1', '12', 'The finest and best types of phones and their accessories', 0, '1601087444111.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(31, 13, 16, 0, 'cover2', '14', 'The finest and best types of phones and their accessories', 0, '1601087496c17.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(32, 14, 16, 0, 'cover3', '16', 'The finest and best types of phones and their accessories', 0, '1601087532c20.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(33, 12, 17, 0, 'headset1', '20', 'The finest and best types of phones and their accessories', 0, '160108758044.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(34, 13, 17, 0, 'headset2', '14', 'The finest and best types of phones and their accessories', 0, '160108761666.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(35, 12, 17, 0, 'headset3', '15', 'The finest and best types of phones and their accessories', 100, '160119941244.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(36, 12, 15, 9, 'phone-h', '520', 'The finest and best types of phones and their accessories', 10, '1601099657c18.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(37, 12, 16, 9, 'cover-h', '11', 'The finest and best types of phones and their accessories', 10, '1601099720c1.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(38, 12, 17, 9, 'headset-h', '25', 'The finest and best types of phones and their accessories', 10, '160109977711.jpg', 'allow');
INSERT DELAYED IGNORE INTO `product` VALUES(39, 13, 17, 0, 'headset5', '320', 'The finest and best types of phones and their accessories', 0, '160119869799.jpg', 'block');
INSERT DELAYED IGNORE INTO `product` VALUES(40, 14, 16, 0, 'cover8', '13', 'The finest and best types of phones and their accessories', 50, '1601199517c5.jpg', 'allow');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--
-- Creation: Sep 26, 2020 at 02:16 AM
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(500) NOT NULL,
  `sub_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sub_category`:
--

--
-- Truncate table before insert `sub_category`
--

TRUNCATE TABLE `sub_category`;
--
-- Dumping data for table `sub_category`
--

INSERT DELAYED IGNORE INTO `sub_category` VALUES(15, 0, 'phone', '1601086890cat22.jpg');
INSERT DELAYED IGNORE INTO `sub_category` VALUES(16, 0, 'cover', '1601086908cat11.jpg');
INSERT DELAYED IGNORE INTO `sub_category` VALUES(17, 0, 'headset', '1601086926cat33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_msg`
--
-- Creation: Oct 01, 2020 at 10:25 AM
-- Last update: Oct 01, 2020 at 11:03 AM
--

DROP TABLE IF EXISTS `user_msg`;
CREATE TABLE IF NOT EXISTS `user_msg` (
  `user_msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `msg_subject` varchar(500) NOT NULL,
  `themsg` varchar(500) NOT NULL,
  PRIMARY KEY (`user_msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user_msg`:
--

--
-- Truncate table before insert `user_msg`
--

TRUNCATE TABLE `user_msg`;
--
-- Dumping data for table `user_msg`
--

INSERT DELAYED IGNORE INTO `user_msg` VALUES(1, 'lina', 'lina@gmail.com', 'hi all', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii');
INSERT DELAYED IGNORE INTO `user_msg` VALUES(4, 'heba', 'heba@gmail.com', 'order', 'hi my name is lina i want to order prodact to jordan please');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--
-- Creation: Sep 14, 2020 at 05:34 PM
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(500) NOT NULL,
  `vendor_email` varchar(500) NOT NULL,
  `vendor_pass` varchar(500) NOT NULL,
  `vendor_img` varchar(1000) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `vendor`:
--

--
-- Truncate table before insert `vendor`
--

TRUNCATE TABLE `vendor`;
--
-- Dumping data for table `vendor`
--

INSERT DELAYED IGNORE INTO `vendor` VALUES(9, 'heba', 'heba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1601099361l1.jpg');
INSERT DELAYED IGNORE INTO `vendor` VALUES(10, 'aya', 'aya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1601103113l2.jpg');


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table admin
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table category
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table customer
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT DELAYED IGNORE INTO `pma__table_uiprefs` VALUES('root', 'estore', 'customer', '{\"sorted_col\":\"`customer`.`customer_id` ASC\"}', '2020-09-14 13:53:58');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table favert_details
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table order_details
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT DELAYED IGNORE INTO `pma__table_uiprefs` VALUES('root', 'estore', 'order_details', '{\"sorted_col\":\"`order_details`.`group_order`  ASC\"}', '2020-09-25 13:28:23');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table product
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT DELAYED IGNORE INTO `pma__table_uiprefs` VALUES('root', 'estore', 'product', '{\"CREATE_TIME\":\"2020-09-19 22:34:08\",\"col_order\":[0,1,2,3,4,5,6,7,9,8],\"col_visib\":[1,1,1,1,1,1,1,1,1,1],\"sorted_col\":\"`product`.`block_allow` ASC\"}', '2020-09-29 12:28:36');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table sub_category
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table user_msg
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table vendor
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for database estore
--

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
