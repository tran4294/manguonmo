-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 03:19 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `author` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catid` int(10) unsigned DEFAULT NULL,
  `price` float(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `catid`, `price`, `description`) VALUES
('0672317842', 'Quốc Cường', 'LT PHP và My SQL', 1, 49.99, 'Sách bán chạy nhất 2015'),
('0672318040', 'Như Chức', 'Thiết kế web', 4, 16.26, 'Sách về thiết kế web hay nhất 2000'),
('0672319241', 'Chiến Thắng', 'Mạng MCSA', 2, 22.29, 'Sách về Mạng MCSA hay nhất 2003'),
('0672319242', 'Công Vinh', 'Photoshop CS6', 1, 15.29, 'Sách về Photoshop CS6 hay nhất 2012'),
('0672319243', 'Quốc Hướng', 'Corel Draw', 3, 30.22, 'Sách về Corel Draw hay nhất 2012'),
('0672319244', 'Hương Nhài', 'Thiết kế Illustrator', 4, 27.24, 'Sách về Thiết kế Illustrator hay nhất 2012'),
('0672319245', 'Cẩm Chướng', 'Dàn trang Indesign', 2, 19.29, 'Sách về Dàn trang Indesign 2008'),
('0672319246', 'Huy Cận', 'CCMA', 4, 22.29, 'Sách về mạng CCNA hay nhất 2010'),
('0672319247', 'Hữu Công', 'Hacker Mũ Trắng', 3, 10.28, 'Sách về Hacker Mũ Trắng hay nhất 2011'),
('0672319248', 'Chính Thắng', 'Lập trình C#', 2, 18.22, 'Sách về Lập trình C# hay nhất 2013');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'internet'),
(2, 'Lập Trình'),
(3, 'Nữ công gia chánh'),
(4, 'Thể thao');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` char(80) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `state`, `zip`, `country`) VALUES
(1, 'Bich Ha', '34 Trần Hưng Đạo', 'Cần Thơ', 'Cần Thơ', '23', 'Viêt Nam'),
(2, 'Như Chức', '994A/136 Huỳnh Tấn Phát', 'Hồ Chí Minh', 'Sài Gòn', '08', 'Viêt Nam'),
(3, 'Hương Trầm', '78 Hai Bà Trưng', 'Hà Nội', 'Hà Nội', '04', 'Viêt Nam'),
(4, 'Hữu Công', '64 Nguyễn Chí Vịnh', 'Vinh', 'Vinh', '65', 'Viêt Nam'),
(5, 'Quang Vinh', '98 Đinh Bộ Lĩnh', 'Vũng Tàu', 'Bà rịa Vũng Tàu', '45', 'Viêt Nam'),
(6, 'Phương Thanh', '65 Nam Kỳ khỡi Nghĩa', 'Biên Hòa', 'Đồng Nai', '76', 'Viêt Nam'),
(7, 'Mỹ Tâm', '432 Đồng Khởi', 'Bến Tre', 'Bến Tre', '86', 'Viêt Nam'),
(8, 'Bich Ha', '34 Trần Hưng Đạo', 'Thái Bình', 'Thái Bình', '87', 'Viêt Nam'),
(9, 'Trần Công', '784 Lê Hữu Trí', 'Thủ Dầu Một', 'Bình Dương', '05', 'Viêt Nam'),
(10, 'Kiên Giang', '4534 Trân Xuân Xoạn', 'Đà Lạt', 'Đà Lạt', '54', 'Viêt Nam'),
(11, 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `date` date NOT NULL,
  `order_status` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_name` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `ship_address` char(80) COLLATE utf8_unicode_ci NOT NULL,
  `ship_city` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `ship_state` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_zip` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_country` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `order_status`, `ship_name`, `ship_address`, `ship_city`, `ship_state`, `ship_zip`, `ship_country`) VALUES
(1, 11, 184.90, '2015-12-01', 'PARTIAL', 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam'),
(2, 11, 97.30, '2015-12-01', 'PARTIAL', 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam'),
(3, 11, 97.30, '2015-12-01', 'PARTIAL', 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam'),
(4, 11, 19.29, '2015-12-01', 'PARTIAL', 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam'),
(5, 11, 15.29, '2015-12-01', 'PARTIAL', 'Chức', '994A/136 Huỳnh Tấn Phát KP 4 Phường Tân Phú Quận 7', 'Tp Hồ Chí Minh', 'Sài Gòn', '84', 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(8,2) NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `item_price`, `quantity`) VALUES
(3, '0672319243', 30.22, 1),
(3, '0672319248', 18.22, 1),
(3, '0672319245', 19.29, 2),
(3, '0672319247', 10.28, 1),
(4, '0672319245', 19.29, 1),
(5, '0672319242', 15.29, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
