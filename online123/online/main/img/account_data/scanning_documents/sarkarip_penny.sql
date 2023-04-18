-- phpMyAdmin SQL Dump

-- version 3.4.11.1

-- http://www.phpmyadmin.net

--

-- Host: fwbubcom.fatcowmysql.com

-- Generation Time: Mar 21, 2013 at 08:49 AM

-- Server version: 5.5.30

-- PHP Version: 5.2.17



SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8 */;



--

-- Database: `sarkarip_penny`

--



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_accesseshistoric`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_accesseshistoric`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_accesseshistoric` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` char(4) NOT NULL DEFAULT '',

  `pageviews` int(11) NOT NULL DEFAULT '0',

  `uniquevisitiors` int(11) NOT NULL DEFAULT '0',

  `usersessions` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_accounts`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_accounts`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_accounts` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `user` int(32) NOT NULL DEFAULT '0',

  `description` varchar(255) NOT NULL DEFAULT '',

  `operation_date` varchar(8) NOT NULL DEFAULT '',

  `operation_type` int(1) NOT NULL DEFAULT '0',

  `operation_amount` double NOT NULL DEFAULT '0',

  `account_balance` double NOT NULL DEFAULT '0',

  `auction` varchar(32) NOT NULL DEFAULT '',

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_adminusers`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_adminusers`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_adminusers` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `username` varchar(32) NOT NULL DEFAULT '',

  `password` varchar(32) NOT NULL DEFAULT '',

  `created` varchar(8) NOT NULL DEFAULT '',

  `lastlogin` varchar(14) NOT NULL DEFAULT '',

  `status` int(2) NOT NULL DEFAULT '0',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;



--

-- Dumping data for table `PHPAUCTIONXL_adminusers`

--



INSERT INTO `PHPAUCTIONXL_adminusers` (`id`, `username`, `password`, `created`, `lastlogin`, `status`) VALUES

(12, 'admin', 'd59014422c4acb3c8017c79a54b69c65', '20130319', '20130321063409', 1),

(11, 'admin1', 'd59014422c4acb3c8017c79a54b69c65', '20130312', '0', 1);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_altpayments`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_altpayments`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_altpayments` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `title` varchar(255) NOT NULL DEFAULT '',

  `description` text NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



--

-- Dumping data for table `PHPAUCTIONXL_altpayments`

--



INSERT INTO `PHPAUCTIONXL_altpayments` (`id`, `title`, `description`) VALUES

(2, 'Bank Transfer', 'Test Bank\r<BR>123 Worthwood Road\r<BR>Miami USA'),

(3, 'Money Order', 'TEst text for\r\nMoney order');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_auccounter`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_auccounter`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_auccounter` (

  `auction_id` int(11) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0',

  PRIMARY KEY (`auction_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_auccounter`

--



INSERT INTO `PHPAUCTIONXL_auccounter` (`auction_id`, `counter`) VALUES

(1004, 1),

(1008, 18),

(1009, 12),

(1011, 1),

(1012, 7),

(1013, 1),

(1014, 1),

(1015, 6),

(1016, 9),

(1017, 2),

(1018, 2),

(1019, 30),

(1020, 1),

(1021, 7),

(1022, 3),

(1023, 2),

(1024, 1),

(1025, 4),

(1026, 2),

(1027, 1),

(1028, 72),

(1029, 18),

(1031, 5),

(1032, 2),

(1033, 1),

(1000, 1),

(1034, 3),

(1035, 1);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_auctionextension`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_auctionextension`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_auctionextension` (

  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',

  `timebefore` int(11) NOT NULL DEFAULT '0',

  `extend` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_auctionextension`

--



INSERT INTO `PHPAUCTIONXL_auctionextension` (`status`, `timebefore`, `extend`) VALUES

('enabled', 1, 10);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_auctions`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_auctions`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_auctions` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `user` int(32) DEFAULT NULL,

  `title` tinytext,

  `starts` varchar(14) DEFAULT NULL,

  `description` text,

  `pict_url` tinytext,

  `category` int(11) DEFAULT NULL,

  `minimum_bid` double(16,2) DEFAULT NULL,

  `reserve_price` double(16,2) DEFAULT NULL,

  `buy_now` double(16,2) DEFAULT NULL,

  `auction_type` char(1) DEFAULT NULL,

  `duration` varchar(7) DEFAULT NULL,

  `increment` double(8,2) NOT NULL DEFAULT '0.00',

  `location` varchar(30) DEFAULT NULL,

  `location_zip` varchar(10) DEFAULT NULL,

  `shipping` char(1) DEFAULT NULL,

  `payment` tinytext,

  `international` char(1) DEFAULT NULL,

  `ends` varchar(14) DEFAULT NULL,

  `current_bid` double(16,2) DEFAULT NULL,

  `closed` char(2) DEFAULT NULL,

  `photo_uploaded` char(1) DEFAULT NULL,

  `quantity` int(11) DEFAULT NULL,

  `suspended` int(1) DEFAULT '0',

  `private` enum('y','n') NOT NULL DEFAULT 'n',

  `relist` int(11) NOT NULL DEFAULT '0',

  `relisted` int(11) NOT NULL DEFAULT '0',

  `num_bids` int(11) NOT NULL DEFAULT '0',

  `sold` enum('y','n','s') NOT NULL DEFAULT 'n',

  `shipping_terms` tinytext NOT NULL,

  `bn_only` enum('y','n') NOT NULL DEFAULT 'n',

  `adultonly` enum('y','n') NOT NULL DEFAULT 'n',

  `current_high_bidder` varchar(30) NOT NULL,

  `retail` double(16,2) NOT NULL,

  `return_policy` tinytext NOT NULL,

  `shipping_fee` tinytext NOT NULL,

  `paid` int(1) NOT NULL DEFAULT '0',

  `promotion` varchar(32) NOT NULL,

  `auction_type2` varchar(32) NOT NULL,

  `unique1` varchar(3) NOT NULL,

  `unique2` varchar(3) NOT NULL,

  `ae_activation` int(11) NOT NULL DEFAULT '0',

  `ae_increment` int(11) NOT NULL DEFAULT '0',

  `ae_type` int(2) NOT NULL DEFAULT '0',

  `time_increment` int(11) NOT NULL DEFAULT '0',

  `featured` int(1) NOT NULL DEFAULT '0',

  `seat_qty` int(5) NOT NULL DEFAULT '0',

  `seat_price` double(16,2) NOT NULL DEFAULT '0.00',

  `auction_counter` int(11) NOT NULL DEFAULT '0',

  `quantity_available` int(11) DEFAULT NULL,

  `refund` int(1) NOT NULL DEFAULT '0',

  `bids_purchased` varchar(4) NOT NULL,

  `allow_autobidder` varchar(1) NOT NULL,

  `bid_credits_reqd` varchar(3) NOT NULL,

  `free_seat_bids` varchar(4) NOT NULL,

  `shipped` varchar(1) NOT NULL,

  `ends2` varchar(14) DEFAULT NULL,

  `dbl_bidding` varchar(1) DEFAULT NULL,

  `hard_reset` varchar(1) DEFAULT NULL,

  `notimer` int(1) NOT NULL DEFAULT '0',

  `winlimit` int(1) NOT NULL DEFAULT '0',

  `lockout` int(1) NOT NULL DEFAULT '0',

  `lockout_bids` varchar(3) NOT NULL,

  `reserve_lockout` varchar(3) NOT NULL,

  `reserve_lockout_bids` varchar(3) NOT NULL,

  `win_limit_override` varchar(3) NOT NULL,

  `reserve_met_close` varchar(3) NOT NULL,

  PRIMARY KEY (`id`),

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1036 ;



--

-- Dumping data for table `PHPAUCTIONXL_auctions`

--



INSERT INTO `PHPAUCTIONXL_auctions` (`id`, `user`, `title`, `starts`, `description`, `pict_url`, `category`, `minimum_bid`, `reserve_price`, `buy_now`, `auction_type`, `duration`, `increment`, `location`, `location_zip`, `shipping`, `payment`, `international`, `ends`, `current_bid`, `closed`, `photo_uploaded`, `quantity`, `suspended`, `private`, `relist`, `relisted`, `num_bids`, `sold`, `shipping_terms`, `bn_only`, `adultonly`, `current_high_bidder`, `retail`, `return_policy`, `shipping_fee`, `paid`, `promotion`, `auction_type2`, `unique1`, `unique2`, `ae_activation`, `ae_increment`, `ae_type`, `time_increment`, `featured`, `seat_qty`, `seat_price`, `auction_counter`, `quantity_available`, `refund`, `bids_purchased`, `allow_autobidder`, `bid_credits_reqd`, `free_seat_bids`, `shipped`, `ends2`, `dbl_bidding`, `hard_reset`, `notimer`, `winlimit`, `lockout`, `lockout_bids`, `reserve_lockout`, `reserve_lockout_bids`, `win_limit_override`, `reserve_met_close`) VALUES

(1000, 1, 'abc', '20130301051455', 'hi', '', 1, 0.00, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312054754', 0.11, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'kapiltare', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130329051455', '1', '0', 0, 0, 0, '1', '0', '1', '0', '1'),

(1001, 1, 'mno', '20130301054037', 'hello', 'b1dca8762a92ce729c5e8cd9bd65b429.jpg', 1, 0.00, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312054549', 0.11, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'kapiltare', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130315054037', '1', '0', 1, 0, 0, '1', '0', '1', '0', '1'),

(1002, 1, 'test12', '20130312055055', 'test12', '4ab04c6c0caeeda3c5878d24112e44d6.jpg', 1, 0.03, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312055955', 0.11, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 60, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130312055055', '1', '1', 1, 0, 0, '1', '0', '1', '0', '0'),

(1003, 1, 'test abc', '20130227055619', 'test abc', '2dc739ef82c4c1b283ddd6ba4e64cf4b.jpg', 1, 0.00, 0.15, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312055900', 0.16, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130329055619', '1', '0', 1, 0, 0, '1', '0', '1', '0', '1'),

(1011, 1, '', '20130313170246', '', '', 1, 0.00, 0.00, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130313170446', 0.01, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 2.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130313170246', '0', '0', 0, 0, 0, '1', '0', '1', '0', '0'),

(1022, 1, 'aarontest20_03_13', '20130319163821', 'test', '', 1, 0.00, 0.05, 1.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130319164128', 0.07, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 5.20, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130321163821', '1', '0', 0, 0, 0, '1', '0', '1', '0', '1'),

(1005, 1, 'mno', '20130312063255', 'hello', 'b1dca8762a92ce729c5e8cd9bd65b429.jpg', 1, 0.00, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312064449', 0.01, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130312054549', '1', '0', 1, 0, 0, '1', '0', '1', '0', '1'),

(1006, 1, 'test abc', '20130312063314', 'test abc', '2dc739ef82c4c1b283ddd6ba4e64cf4b.jpg', 1, 0.00, 0.15, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312062000', 0.00, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'No Bids Yet!', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130312055900', '1', '0', 1, 0, 0, '1', '0', '1', '0', '1'),

(1007, 1, 'test12', '20130312063426', 'test12', '4ab04c6c0caeeda3c5878d24112e44d6.jpg', 1, 0.03, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130312062355', 0.03, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'No Bids Yet!', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 60, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130312055955', '1', '1', 1, 0, 0, '1', '0', '1', '0', '1'),

(1009, 1, 'hello', '20130313024720', 'hello', 'e4a88967333e342fbb6869bb01c82548.jpg', 1, 0.00, 0.20, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130313033220', 0.24, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'kapiltare', 0.00, '', '', 0, 'free_bidding.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130313024720', '0', '0', 0, 0, 0, '1', '0', '1', '0', '0'),

(1010, 1, 'txt', '20130313053754', 'txt', '5eb39997bb6e55f9ceb09b06c6040175.jpg', 1, 0.00, 0.10, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130313054154', 0.00, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'No Bids Yet!', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130313053754', '0', '0', 0, 0, 0, '1', '0', '1', '0', '0'),

(1013, 1, 'aaronbasictest2', '20130313170859', 'test2', '', 1, 0.00, 0.04, 1.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130313171147', 0.05, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 2.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 60, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130329170859', '1', '0', 0, 0, 0, '1', '0', '1', '0', '1'),

(1014, 1, 'aaronbasictest3', '20130313171326', 'test3', '', 1, 0.00, 0.05, 1.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130313171548', 0.07, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 3.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130330171326', '1', '0', 1, 0, 0, '1', '0', '1', '0', '1'),

(1035, 1, 'samsung mob2', '20130321064204', 'smsung mob2', '0e7c845058051d7978821a450e264ea3.png', 1, 0.00, 33.33, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130331064204', 0.07, '0', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130331064204', '1', '0', 0, 0, 0, '1', '0', '1', '0', '1'),

(1020, 1, 'test19_3_13', '20130318180505', 'test', '', 1, 0.00, 0.03, 1.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130318180710', 0.04, '1', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 31.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130330180505', '1', '0', 0, 0, 1, '1', '0', '1', '0', '1'),

(1017, 1, 'Test123', '20130314014906', 'test123', '94dcf1acfc58b5320426528625ebeb95.jpg', 1, 0.00, 0.00, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130314020406', 0.01, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130314014906', '0', '0', 0, 0, 0, '1', '0', '1', '1', '0'),

(1018, 1, 'Test123', '20130314020513', 'test123', '94dcf1acfc58b5320426528625ebeb95.jpg', 1, 0.00, 0.00, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130314020926', 0.24, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'AdminUser', 0.00, '', '', 0, 'beginner_auction.gif', 'beginner', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130314020406', '1', '0', 0, 0, 0, '1', '0', '1', '1', '0'),

(1029, 1, 'aarontesttonight', '20130320053059', 'test tonight', '', 1, 0.00, 0.04, 1.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130330172859', 0.46, '0', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'reliance', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '1', '1', '', '', '20130328053059', '1', '0', 0, 0, 0, '1', '0', '1', '0', '0'),

(1032, 1, 'New Item', '20130320064057', 'abc', '', 1, 0.00, 0.02, 0.00, '1', '', 0.01, ' ', '11111', '1', 'paypal', '0', '20130323183511', 0.10, '0', '0', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'lokesh101', 5.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '20', '1', '1', '', '', '20130321063711', '1', '0', 0, 0, 1, '2', '0', '1', '0', '0'),

(1024, 1, 'test 20 march', '20130319235747', 'testing point one', 'b54a504b5dd3cc7f700dcc83ee7398ce.png', 1, 100.00, 2.05, 0.00, '1', '', 0.01, ' ', '11111', '1', '', '0', '20130319235747', 100.00, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'No Bids Yet!', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130319235747', '0', '0', 0, 0, 0, '1', '0', '1', '0', '0'),

(1034, 1, 'samsung mobile', '20130321063509', 'samsung', '1d86d0c5a75ea43293fd2b4d834bf6f6.png', 1, 0.00, 16.67, 0.00, '1', '', 1.00, ' ', '11111', '1', '', '0', '20130321064111', 50.00, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'No Bids Yet!', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130331063509', '1', '0', 0, 0, 0, '1', '0', '1', '0', '1'),

(1028, 1, 'testing point 2', '20130320003807', '', 'b28e21fc7a4313d27dfc3610397a73e0.png', 1, 10.00, 38.33, 0.00, '1', '', 1.00, ' ', '11111', '1', '', '0', '20130320211307', 39.00, '1', '1', 1, 0, 'n', 0, 0, 0, 'n', '', 'n', 'n', 'lokesh101', 0.00, '', '', 0, 'promo_invisible.gif', 'none', '0', '0', 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, '', '0', '1', '', '', '20130320003807', '0', '0', 1, 0, 0, '1', '0', '1', '0', '0');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_auctions2`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_auctions2`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_auctions2` (

  `id` int(32) NOT NULL DEFAULT '0',

  `title` tinytext,

  `starts` varchar(14) DEFAULT NULL,

  `pict_url` tinytext,

  `ends` varchar(14) DEFAULT NULL,

  `closed` char(2) DEFAULT NULL,

  `suspended` int(1) DEFAULT '0',

  `retail` double(16,2) NOT NULL,

  `ends2` varchar(14) DEFAULT NULL,

  `current_high_bidder` varchar(30) NOT NULL,

  `current_bid` double(16,2) DEFAULT NULL,

  `reserve_price` double(16,2) DEFAULT NULL,

  `increment` double(8,2) NOT NULL DEFAULT '0.00',

  `notimer` int(1) NOT NULL DEFAULT '0',

  `promotion` varchar(32) NOT NULL,

  `seat_qty` int(10) DEFAULT '0',

  `seats_taken` int(10) DEFAULT '0',

  PRIMARY KEY (`id`),

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_auctions2`

--



INSERT INTO `PHPAUCTIONXL_auctions2` (`id`, `title`, `starts`, `pict_url`, `ends`, `closed`, `suspended`, `retail`, `ends2`, `current_high_bidder`, `current_bid`, `reserve_price`, `increment`, `notimer`, `promotion`, `seat_qty`, `seats_taken`) VALUES

(1000, 'abc', '20130301051455', '', '20130312054754', '1', 0, 0.00, '20130329051455', 'kapiltare', 0.11, 0.10, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1001, 'mno', '20130301054037', 'b1dca8762a92ce729c5e8cd9bd65b429.jpg', '20130312054549', '1', 0, 0.00, '20130315054037', 'kapiltare', 0.11, 0.10, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1002, 'test12', '20130312055055', '4ab04c6c0caeeda3c5878d24112e44d6.jpg', '20130312055955', '1', 0, 0.00, '20130312055055', 'AdminUser', 0.11, 0.10, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1003, 'test abc', '20130227055619', '2dc739ef82c4c1b283ddd6ba4e64cf4b.jpg', '20130312055900', '1', 0, 0.00, '20130329055619', 'AdminUser', 0.16, 0.15, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1011, '', '20130313170246', '', '20130313170446', '1', 0, 2.00, '20130313170246', 'AdminUser', 0.01, 0.00, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1032, 'New Item', '20130320064057', '', '20130323183511', '0', 0, 5.00, '20130321063711', 'lokesh101', 0.10, 0.02, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1005, 'mno', '20130312063255', 'b1dca8762a92ce729c5e8cd9bd65b429.jpg', '20130312064649', '1', 0, 0.00, '20130312054549', 'AdminUser', 0.01, 0.10, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1006, 'test abc', '20130312063314', '2dc739ef82c4c1b283ddd6ba4e64cf4b.jpg', '20130312062000', '1', 0, 0.00, '20130312055900', 'No Bids Yet!', 0.00, 0.15, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1007, 'test12', '20130312063426', '4ab04c6c0caeeda3c5878d24112e44d6.jpg', '20130312062455', '1', 0, 0.00, '20130312055955', 'No Bids Yet!', 0.03, 0.10, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1009, 'hello', '20130313024720', 'e4a88967333e342fbb6869bb01c82548.jpg', '20130313033220', '1', 0, 0.00, '20130313024720', 'kapiltare', 0.24, 0.20, 0.01, 0, 'free_bidding.gif', 0, 0),

(1010, 'txt', '20130313053754', '5eb39997bb6e55f9ceb09b06c6040175.jpg', '20130313054154', '1', 0, 0.00, '20130313053754', 'No Bids Yet!', 0.00, 0.10, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1013, 'aaronbasictest2', '20130313170859', '', '20130313171147', '1', 0, 2.00, '20130329170859', 'AdminUser', 0.05, 0.04, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1014, 'aaronbasictest3', '20130313171326', '', '20130313171548', '1', 0, 3.00, '20130330171326', 'AdminUser', 0.07, 0.05, 0.01, 1, 'promo_invisible.gif', 0, 0),

(1022, 'aarontest20_03_13', '20130319163821', '', '20130319164128', '1', 0, 5.20, '20130321163821', 'AdminUser', 0.07, 0.05, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1029, 'aarontesttonight', '20130320053059', '', '20130330172859', '0', 0, 0.00, '20130328053059', 'reliance', 0.46, 0.04, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1017, 'Test123', '20130314014906', '94dcf1acfc58b5320426528625ebeb95.jpg', '20130314020406', '1', 0, 0.00, '20130314014906', 'AdminUser', 0.01, 0.00, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1018, 'Test123', '20130314020513', '94dcf1acfc58b5320426528625ebeb95.jpg', '20130314020926', '1', 0, 0.00, '20130314020406', 'AdminUser', 0.24, 0.00, 0.01, 0, 'beginner_auction.gif', 0, 0),

(1030, 'abc', '19991130000000', '', '19991130003600', '1', 0, 0.00, '19991130000000', 'No Bids Yet!', 0.00, 0.10, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1020, 'test19_3_13', '20130318180505', '', '20130318180710', '1', 0, 31.00, '20130330180505', 'AdminUser', 0.04, 0.03, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1024, 'test 20 march', '20130319235747', 'b54a504b5dd3cc7f700dcc83ee7398ce.png', '20130319235747', '1', 0, 0.00, '20130319235747', 'No Bids Yet!', 100.00, 2.05, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1034, 'samsung mobile', '20130321063509', '1d86d0c5a75ea43293fd2b4d834bf6f6.png', '20130321064111', '1', 0, 0.00, '20130331063509', 'No Bids Yet!', 50.00, 16.67, 1.00, 0, 'promo_invisible.gif', 0, 0),

(1035, 'samsung mob2', '20130321064204', '0e7c845058051d7978821a450e264ea3.png', '20130331064204', '0', 0, 0.00, '20130331064204', 'AdminUser', 0.07, 33.33, 0.01, 0, 'promo_invisible.gif', 0, 0),

(1028, 'testing point 2', '20130320003807', 'b28e21fc7a4313d27dfc3610397a73e0.png', '20130320211307', '1', 0, 0.00, '20130320003807', 'lokesh101', 39.00, 38.33, 1.00, 1, 'promo_invisible.gif', 0, 0);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_auction_seats`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_auction_seats`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_auction_seats` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `userid` int(10) NOT NULL DEFAULT '0',

  `auctionid` int(10) NOT NULL DEFAULT '0',

  `paid` int(1) NOT NULL DEFAULT '0',

  `seat_bids_remaining` int(5) NOT NULL DEFAULT '0',

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_banners`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_banners`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_banners` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `name` varchar(255) DEFAULT NULL,

  `type` enum('gif','jpg','png','swf') DEFAULT NULL,

  `views` int(11) DEFAULT NULL,

  `clicks` int(11) DEFAULT NULL,

  `url` varchar(255) DEFAULT NULL,

  `sponsortext` varchar(255) DEFAULT NULL,

  `alt` varchar(255) DEFAULT NULL,

  `purchased` int(11) NOT NULL DEFAULT '0',

  `width` int(11) NOT NULL DEFAULT '0',

  `height` int(11) NOT NULL DEFAULT '0',

  `user` int(11) NOT NULL DEFAULT '0',

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bannerscategories`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bannerscategories`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bannerscategories` (

  `banner` int(11) NOT NULL DEFAULT '0',

  `category` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bannerskeywords`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bannerskeywords`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bannerskeywords` (

  `banner` int(11) NOT NULL DEFAULT '0',

  `keyword` varchar(255) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bannerssettings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bannerssettings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bannerssettings` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `sizetype` enum('fix','any') DEFAULT NULL,

  `width` int(11) DEFAULT NULL,

  `height` int(11) DEFAULT NULL,

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



--

-- Dumping data for table `PHPAUCTIONXL_bannerssettings`

--



INSERT INTO `PHPAUCTIONXL_bannerssettings` (`id`, `sizetype`, `width`, `height`) VALUES

(1, 'any', 468, 60);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bannersstats`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bannersstats`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bannersstats` (

  `banner` int(11) DEFAULT NULL,

  `purchased` int(11) DEFAULT NULL,

  `views` int(11) DEFAULT NULL,

  `clicks` int(11) DEFAULT NULL,

  KEY `id` (`banner`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bannersusers`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bannersusers`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bannersusers` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `name` varchar(255) DEFAULT NULL,

  `company` varchar(255) DEFAULT NULL,

  `email` varchar(255) DEFAULT NULL,

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bidfind`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bidfind`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bidfind` (

  `bidfind` enum('enabled','disabled') NOT NULL DEFAULT 'enabled'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_bidfind`

--



INSERT INTO `PHPAUCTIONXL_bidfind` (`bidfind`) VALUES

('disabled');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bids`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bids`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bids` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `auction` int(32) DEFAULT NULL,

  `bidder` int(32) DEFAULT NULL,

  `bid` double(16,2) DEFAULT NULL,

  `bidwhen` varchar(14) DEFAULT NULL,

  `quantity` int(11) DEFAULT '0',

  `current_high_bidder` varchar(30) NOT NULL,

  `accounttype` varchar(10) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=525 ;



--

-- Dumping data for table `PHPAUCTIONXL_bids`

--



INSERT INTO `PHPAUCTIONXL_bids` (`id`, `auction`, `bidder`, `bid`, `bidwhen`, `quantity`, `current_high_bidder`, `accounttype`) VALUES

(1, 1000, 2, 0.01, '20130312053832', 1, 'kapiltare', 'unique'),

(2, 1000, 2, 0.02, '20130312053835', 1, 'kapiltare', 'unique'),

(3, 1000, 2, 0.03, '20130312053838', 1, 'kapiltare', 'unique'),

(4, 1000, 2, 0.04, '20130312053843', 1, 'kapiltare', 'unique'),

(5, 1000, 2, 0.05, '20130312053847', 1, 'kapiltare', 'unique'),

(6, 1001, 2, 0.01, '20130312054512', 1, 'kapiltare', 'unique'),

(7, 1001, 2, 0.02, '20130312054515', 1, 'kapiltare', 'unique'),

(8, 1001, 2, 0.03, '20130312054518', 1, 'kapiltare', 'unique'),

(9, 1001, 2, 0.04, '20130312054521', 1, 'kapiltare', 'unique'),

(10, 1001, 2, 0.05, '20130312054524', 1, 'kapiltare', 'unique'),

(11, 1001, 2, 0.06, '20130312054527', 1, 'kapiltare', 'unique'),

(12, 1001, 2, 0.07, '20130312054530', 1, 'kapiltare', 'unique'),

(13, 1001, 2, 0.08, '20130312054533', 1, 'kapiltare', 'unique'),

(14, 1001, 2, 0.09, '20130312054537', 1, 'kapiltare', 'unique'),

(15, 1001, 2, 0.10, '20130312054542', 1, 'kapiltare', 'unique'),

(16, 1001, 2, 0.11, '20130312054545', 1, 'kapiltare', 'unique'),

(17, 1000, 2, 0.06, '20130312054556', 1, 'kapiltare', 'unique'),

(18, 1000, 2, 0.07, '20130312054600', 1, 'kapiltare', 'unique'),

(19, 1000, 2, 0.08, '20130312054603', 1, 'kapiltare', 'unique'),

(20, 1000, 2, 0.09, '20130312054609', 1, 'kapiltare', 'unique'),

(21, 1000, 2, 0.10, '20130312054743', 1, 'kapiltare', 'unique'),

(22, 1000, 2, 0.11, '20130312054747', 1, 'kapiltare', 'unique'),

(23, 1002, 1, 0.04, '20130312055757', 1, 'AdminUser', 'unique'),

(24, 1002, 1, 0.05, '20130312055803', 1, 'AdminUser', 'unique'),

(25, 1002, 1, 0.06, '20130312055806', 1, 'AdminUser', 'unique'),

(26, 1002, 1, 0.07, '20130312055809', 1, 'AdminUser', 'unique'),

(27, 1002, 1, 0.08, '20130312055812', 1, 'AdminUser', 'unique'),

(28, 1002, 1, 0.09, '20130312055814', 1, 'AdminUser', 'unique'),

(29, 1002, 1, 0.10, '20130312055817', 1, 'AdminUser', 'unique'),

(30, 1002, 1, 0.11, '20130312055820', 1, 'AdminUser', 'unique'),

(33, 1003, 1, 0.03, '20130312055847', 1, 'AdminUser', 'unique'),

(34, 1003, 1, 0.04, '20130312055848', 1, 'AdminUser', 'unique'),

(35, 1003, 1, 0.05, '20130312055849', 1, 'AdminUser', 'unique'),

(36, 1003, 1, 0.06, '20130312055849', 1, 'AdminUser', 'unique'),

(37, 1003, 1, 0.07, '20130312055850', 1, 'AdminUser', 'unique'),

(38, 1003, 1, 0.08, '20130312055851', 1, 'AdminUser', 'unique'),

(39, 1003, 1, 0.09, '20130312055852', 1, 'AdminUser', 'unique'),

(40, 1003, 1, 0.10, '20130312055852', 1, 'AdminUser', 'unique'),

(41, 1003, 1, 0.11, '20130312055853', 1, 'AdminUser', 'unique'),

(42, 1003, 1, 0.12, '20130312055854', 1, 'AdminUser', 'unique'),

(43, 1003, 1, 0.13, '20130312055855', 1, 'AdminUser', 'unique'),

(44, 1003, 1, 0.14, '20130312055856', 1, 'AdminUser', 'unique'),

(45, 1003, 1, 0.15, '20130312055857', 1, 'AdminUser', 'unique'),

(46, 1003, 1, 0.16, '20130312055858', 1, 'AdminUser', 'unique'),

(58, 1005, 1, 0.01, '20130312063504', 1, 'AdminUser', 'unique'),

(519, 1035, 1, 0.02, '20130321064445', 1, 'AdminUser', 'unique'),

(151, 1014, 1, 0.07, '20130313171535', 1, 'AdminUser', 'unique'),

(150, 1014, 1, 0.06, '20130313171535', 1, 'AdminUser', 'unique'),

(149, 1014, 1, 0.05, '20130313171535', 1, 'AdminUser', 'unique'),

(148, 1014, 1, 0.04, '20130313171534', 1, 'AdminUser', 'unique'),

(147, 1014, 1, 0.03, '20130313171533', 1, 'AdminUser', 'unique'),

(131, 1009, 2, 0.18, '20130313032948', 1, 'kapiltare', 'unique'),

(146, 1014, 1, 0.02, '20130313171531', 1, 'AdminUser', 'unique'),

(145, 1014, 1, 0.01, '20130313171524', 1, 'AdminUser', 'unique'),

(130, 1009, 1, 0.17, '20130313032946', 1, 'AdminUser', 'unique'),

(144, 1013, 1, 0.05, '20130313171123', 1, 'AdminUser', 'unique'),

(143, 1013, 1, 0.04, '20130313171121', 1, 'AdminUser', 'unique'),

(142, 1013, 1, 0.03, '20130313171119', 1, 'AdminUser', 'unique'),

(141, 1013, 1, 0.02, '20130313171116', 1, 'AdminUser', 'unique'),

(140, 1013, 1, 0.01, '20130313171113', 1, 'AdminUser', 'unique'),

(410, 1022, 1, 0.04, '20130319164035', 1, 'AdminUser', 'unique'),

(138, 1011, 1, 0.01, '20130313170314', 1, 'AdminUser', 'unique'),

(133, 1009, 2, 0.20, '20130313032952', 1, 'kapiltare', 'unique'),

(132, 1009, 1, 0.19, '20130313032950', 1, 'AdminUser', 'unique'),

(135, 1009, 2, 0.22, '20130313033042', 1, 'kapiltare', 'unique'),

(134, 1009, 1, 0.21, '20130313033026', 1, 'AdminUser', 'unique'),

(137, 1009, 2, 0.24, '20130313033108', 1, 'kapiltare', 'unique'),

(136, 1009, 1, 0.23, '20130313033054', 1, 'AdminUser', 'unique'),

(481, 1028, 5, 35.00, '20130320053653', 1, 'lokesh101', 'unique'),

(517, 1029, 4, 0.46, '20130321020454', 1, 'reliance', 'unique'),

(124, 1009, 1, 0.11, '20130313032856', 1, 'AdminUser', 'unique'),

(125, 1009, 2, 0.12, '20130313032918', 1, 'kapiltare', 'unique'),

(126, 1009, 1, 0.13, '20130313032926', 1, 'AdminUser', 'unique'),

(127, 1009, 2, 0.14, '20130313032937', 1, 'kapiltare', 'unique'),

(128, 1009, 1, 0.15, '20130313032941', 1, 'AdminUser', 'unique'),

(129, 1009, 2, 0.16, '20130313032944', 1, 'kapiltare', 'unique'),

(515, 1029, 5, 0.44, '20130320080211', 1, 'lokesh101', 'unique'),

(488, 1029, 1, 0.36, '20130320054329', 1, 'AdminUser', 'unique'),

(505, 1032, 5, 0.03, '20130320080128', 1, 'lokesh101', 'unique'),

(442, 1028, 7, 25.00, '20130320030635', 1, 'lokesh', 'unique'),

(443, 1028, 5, 26.00, '20130320030638', 1, 'lokesh101', 'unique'),

(487, 1029, 1, 0.35, '20130320054327', 1, 'AdminUser', 'unique'),

(407, 1022, 1, 0.01, '20130319164014', 1, 'AdminUser', 'unique'),

(514, 1029, 5, 0.43, '20130320080210', 1, 'lokesh101', 'unique'),

(508, 1032, 5, 0.06, '20130320080134', 1, 'lokesh101', 'unique'),

(494, 1029, 4, 0.41, '20130320054827', 1, 'reliance', 'unique'),

(294, 1020, 1, 0.04, '20130318180707', 1, 'AdminUser', 'unique'),

(293, 1020, 1, 0.03, '20130318180704', 1, 'AdminUser', 'unique'),

(504, 1028, 5, 39.00, '20130320075407', 1, 'lokesh101', 'unique'),

(292, 1020, 1, 0.02, '20130318180700', 1, 'AdminUser', 'unique'),

(171, 1017, 1, 0.01, '20130314020257', 1, 'AdminUser', 'unique'),

(189, 1018, 1, 0.18, '20130314020859', 1, 'AdminUser', 'unique'),

(188, 1018, 1, 0.17, '20130314020856', 1, 'AdminUser', 'unique'),

(191, 1018, 1, 0.20, '20130314020904', 1, 'AdminUser', 'unique'),

(190, 1018, 1, 0.19, '20130314020902', 1, 'AdminUser', 'unique'),

(193, 1018, 1, 0.22, '20130314020909', 1, 'AdminUser', 'unique'),

(192, 1018, 1, 0.21, '20130314020906', 1, 'AdminUser', 'unique'),

(195, 1018, 1, 0.24, '20130314020917', 1, 'AdminUser', 'unique'),

(194, 1018, 1, 0.23, '20130314020913', 1, 'AdminUser', 'unique'),

(409, 1022, 1, 0.03, '20130319164025', 1, 'AdminUser', 'unique'),

(408, 1022, 1, 0.02, '20130319164020', 1, 'AdminUser', 'unique'),

(182, 1018, 1, 0.11, '20130314020839', 1, 'AdminUser', 'unique'),

(183, 1018, 1, 0.12, '20130314020841', 1, 'AdminUser', 'unique'),

(184, 1018, 1, 0.13, '20130314020843', 1, 'AdminUser', 'unique'),

(185, 1018, 1, 0.14, '20130314020846', 1, 'AdminUser', 'unique'),

(186, 1018, 1, 0.15, '20130314020850', 1, 'AdminUser', 'unique'),

(187, 1018, 1, 0.16, '20130314020853', 1, 'AdminUser', 'unique'),

(491, 1029, 4, 0.38, '20130320054819', 1, 'reliance', 'unique'),

(490, 1029, 4, 0.37, '20130320054819', 1, 'reliance', 'unique'),

(486, 1029, 1, 0.34, '20130320054323', 1, 'AdminUser', 'unique'),

(485, 1029, 1, 0.33, '20130320054321', 1, 'AdminUser', 'unique'),

(451, 1028, 7, 34.00, '20130320052527', 1, 'lokesh', 'unique'),

(450, 1028, 5, 33.00, '20130320052317', 1, 'lokesh101', 'unique'),

(449, 1028, 1, 32.00, '20130320033819', 1, 'AdminUser', 'unique'),

(447, 1028, 1, 30.00, '20130320033006', 1, 'AdminUser', 'unique'),

(448, 1028, 5, 31.00, '20130320033646', 1, 'lokesh101', 'unique'),

(493, 1029, 4, 0.40, '20130320054827', 1, 'reliance', 'unique'),

(446, 1028, 3, 29.00, '20130320031837', 1, 'abc123', 'unique'),

(291, 1020, 1, 0.01, '20130318180657', 1, 'AdminUser', 'unique'),

(518, 1035, 1, 0.01, '20130321064435', 1, 'AdminUser', 'unique'),

(445, 1028, 5, 28.00, '20130320031436', 1, 'lokesh101', 'unique'),

(444, 1028, 7, 27.00, '20130320031412', 1, 'lokesh', 'unique'),

(411, 1022, 1, 0.05, '20130319164037', 1, 'AdminUser', 'unique'),

(412, 1022, 1, 0.06, '20130319164038', 1, 'AdminUser', 'unique'),

(413, 1022, 1, 0.07, '20130319164040', 1, 'AdminUser', 'unique'),

(507, 1032, 5, 0.05, '20130320080134', 1, 'lokesh101', 'unique'),

(489, 1028, 4, 36.00, '20130320054815', 1, 'reliance', 'unique'),

(492, 1029, 4, 0.39, '20130320054826', 1, 'reliance', 'unique'),

(516, 1029, 4, 0.45, '20130321020132', 1, 'reliance', 'unique'),

(506, 1032, 5, 0.04, '20130320080132', 1, 'lokesh101', 'unique'),

(503, 1028, 1, 38.00, '20130320075315', 1, 'AdminUser', 'unique'),

(499, 1032, 1, 0.01, '20130320064427', 1, 'AdminUser', 'unique'),

(500, 1032, 1, 0.02, '20130320064429', 1, 'AdminUser', 'unique'),

(502, 1028, 5, 37.00, '20130320073546', 1, 'lokesh101', 'unique'),

(509, 1032, 5, 0.07, '20130320080135', 1, 'lokesh101', 'unique'),

(510, 1032, 5, 0.08, '20130320080136', 1, 'lokesh101', 'unique'),

(511, 1032, 5, 0.09, '20130320080136', 1, 'lokesh101', 'unique'),

(512, 1032, 5, 0.10, '20130320080137', 1, 'lokesh101', 'unique'),

(513, 1029, 5, 0.42, '20130320080209', 1, 'lokesh101', 'unique'),

(520, 1035, 1, 0.03, '20130321064510', 1, 'AdminUser', 'unique'),

(521, 1035, 1, 0.04, '20130321064739', 1, 'AdminUser', 'unique'),

(522, 1035, 1, 0.05, '20130321064741', 1, 'AdminUser', 'unique'),

(523, 1035, 1, 0.06, '20130321064742', 1, 'AdminUser', 'unique'),

(524, 1035, 1, 0.07, '20130321064744', 1, 'AdminUser', 'unique');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bids2`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bids2`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bids2` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `auction` int(32) DEFAULT NULL,

  `bidder` int(32) DEFAULT NULL,

  `bid` double(16,2) DEFAULT NULL,

  `bidwhen` varchar(14) DEFAULT NULL,

  `quantity` int(11) DEFAULT '0',

  `current_high_bidder` varchar(30) NOT NULL,

  `accounttype` varchar(10) NOT NULL,

  `bid_credit_type` varchar(10) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=525 ;



--

-- Dumping data for table `PHPAUCTIONXL_bids2`

--



INSERT INTO `PHPAUCTIONXL_bids2` (`id`, `auction`, `bidder`, `bid`, `bidwhen`, `quantity`, `current_high_bidder`, `accounttype`, `bid_credit_type`) VALUES

(1, 1000, 2, 0.01, '20130312053832', 1, 'kapiltare', 'unique', 'free'),

(2, 1000, 2, 0.02, '20130312053835', 1, 'kapiltare', 'unique', 'free'),

(3, 1000, 2, 0.03, '20130312053838', 1, 'kapiltare', 'unique', 'free'),

(4, 1000, 2, 0.04, '20130312053843', 1, 'kapiltare', 'unique', 'free'),

(5, 1000, 2, 0.05, '20130312053847', 1, 'kapiltare', 'unique', 'free'),

(6, 1001, 2, 0.01, '20130312054512', 1, 'kapiltare', 'unique', 'free'),

(7, 1001, 2, 0.02, '20130312054515', 1, 'kapiltare', 'unique', 'free'),

(8, 1001, 2, 0.03, '20130312054518', 1, 'kapiltare', 'unique', 'free'),

(9, 1001, 2, 0.04, '20130312054521', 1, 'kapiltare', 'unique', 'free'),

(10, 1001, 2, 0.05, '20130312054524', 1, 'kapiltare', 'unique', 'free'),

(11, 1001, 2, 0.06, '20130312054527', 1, 'kapiltare', 'unique', 'free'),

(12, 1001, 2, 0.07, '20130312054530', 1, 'kapiltare', 'unique', 'free'),

(13, 1001, 2, 0.08, '20130312054533', 1, 'kapiltare', 'unique', 'free'),

(14, 1001, 2, 0.09, '20130312054537', 1, 'kapiltare', 'unique', 'free'),

(15, 1001, 2, 0.10, '20130312054542', 1, 'kapiltare', 'unique', 'free'),

(16, 1001, 2, 0.11, '20130312054545', 1, 'kapiltare', 'unique', 'free'),

(17, 1000, 2, 0.06, '20130312054556', 1, 'kapiltare', 'unique', 'free'),

(18, 1000, 2, 0.07, '20130312054600', 1, 'kapiltare', 'unique', 'free'),

(19, 1000, 2, 0.08, '20130312054603', 1, 'kapiltare', 'unique', 'free'),

(20, 1000, 2, 0.09, '20130312054609', 1, 'kapiltare', 'unique', 'free'),

(21, 1000, 2, 0.10, '20130312054743', 1, 'kapiltare', 'unique', 'free'),

(22, 1000, 2, 0.11, '20130312054747', 1, 'kapiltare', 'unique', 'free'),

(23, 1002, 1, 0.04, '20130312055757', 1, 'AdminUser', 'unique', 'free'),

(24, 1002, 1, 0.05, '20130312055803', 1, 'AdminUser', 'unique', 'free'),

(25, 1002, 1, 0.06, '20130312055806', 1, 'AdminUser', 'unique', 'free'),

(26, 1002, 1, 0.07, '20130312055809', 1, 'AdminUser', 'unique', 'free'),

(27, 1002, 1, 0.08, '20130312055812', 1, 'AdminUser', 'unique', 'free'),

(28, 1002, 1, 0.09, '20130312055814', 1, 'AdminUser', 'unique', 'free'),

(29, 1002, 1, 0.10, '20130312055817', 1, 'AdminUser', 'unique', 'free'),

(30, 1002, 1, 0.11, '20130312055820', 1, 'AdminUser', 'unique', 'free'),

(31, 1003, 1, 0.01, '20130312055844', 1, 'AdminUser', 'unique', 'free'),

(32, 1003, 1, 0.02, '20130312055846', 1, 'AdminUser', 'unique', 'free'),

(33, 1003, 1, 0.03, '20130312055847', 1, 'AdminUser', 'unique', 'free'),

(34, 1003, 1, 0.04, '20130312055848', 1, 'AdminUser', 'unique', 'free'),

(35, 1003, 1, 0.05, '20130312055849', 1, 'AdminUser', 'unique', 'free'),

(36, 1003, 1, 0.06, '20130312055849', 1, 'AdminUser', 'unique', 'free'),

(37, 1003, 1, 0.07, '20130312055850', 1, 'AdminUser', 'unique', 'free'),

(38, 1003, 1, 0.08, '20130312055851', 1, 'AdminUser', 'unique', 'free'),

(39, 1003, 1, 0.09, '20130312055852', 1, 'AdminUser', 'unique', 'free'),

(40, 1003, 1, 0.10, '20130312055852', 1, 'AdminUser', 'unique', 'free'),

(41, 1003, 1, 0.11, '20130312055853', 1, 'AdminUser', 'unique', 'free'),

(42, 1003, 1, 0.12, '20130312055854', 1, 'AdminUser', 'unique', 'free'),

(43, 1003, 1, 0.13, '20130312055855', 1, 'AdminUser', 'unique', 'free'),

(44, 1003, 1, 0.14, '20130312055856', 1, 'AdminUser', 'unique', 'free'),

(45, 1003, 1, 0.15, '20130312055857', 1, 'AdminUser', 'unique', 'free'),

(46, 1003, 1, 0.16, '20130312055858', 1, 'AdminUser', 'unique', 'free'),

(47, 1004, 1, 0.01, '20130312061001', 1, 'AdminUser', 'unique', 'free'),

(48, 1004, 1, 0.02, '20130312061004', 1, 'AdminUser', 'unique', 'free'),

(49, 1004, 1, 0.03, '20130312061008', 1, 'AdminUser', 'unique', 'free'),

(50, 1004, 1, 0.04, '20130312061010', 1, 'AdminUser', 'unique', 'free'),

(51, 1004, 1, 0.05, '20130312061013', 1, 'AdminUser', 'unique', 'free'),

(52, 1004, 1, 0.06, '20130312061016', 1, 'AdminUser', 'unique', 'free'),

(53, 1004, 1, 0.07, '20130312061019', 1, 'AdminUser', 'unique', 'free'),

(54, 1004, 1, 0.08, '20130312061034', 1, 'AdminUser', 'unique', 'free'),

(55, 1004, 1, 0.09, '20130312061037', 1, 'AdminUser', 'unique', 'free'),

(56, 1004, 1, 0.10, '20130312061411', 1, 'AdminUser', 'unique', 'free'),

(57, 1004, 1, 0.11, '20130312062711', 1, 'AdminUser', 'unique', 'free'),

(58, 1005, 1, 0.01, '20130312063504', 1, 'AdminUser', 'unique', 'free'),

(59, 1008, 1, 0.01, '20130313014120', 1, 'AdminUser', 'unique', 'free'),

(60, 1008, 1, 0.02, '20130313024533', 1, 'AdminUser', 'unique', 'free'),

(61, 1008, 2, 0.03, '20130313024551', 1, 'kapiltare', 'unique', 'free'),

(62, 1008, 1, 0.04, '20130313024600', 1, 'AdminUser', 'unique', 'free'),

(63, 1008, 2, 0.05, '20130313024605', 1, 'kapiltare', 'unique', 'free'),

(64, 1008, 1, 0.06, '20130313024608', 1, 'AdminUser', 'unique', 'free'),

(65, 1008, 1, 0.07, '20130313024610', 1, 'AdminUser', 'unique', 'free'),

(66, 1008, 1, 0.08, '20130313024611', 1, 'AdminUser', 'unique', 'free'),

(67, 1008, 1, 0.09, '20130313024612', 1, 'AdminUser', 'unique', 'free'),

(68, 1008, 1, 0.10, '20130313024613', 1, 'AdminUser', 'unique', 'free'),

(69, 1008, 1, 0.11, '20130313024615', 1, 'AdminUser', 'unique', 'free'),

(70, 1008, 2, 0.12, '20130313024621', 1, 'kapiltare', 'unique', 'free'),

(71, 1008, 2, 0.13, '20130313024624', 1, 'kapiltare', 'unique', 'free'),

(72, 1008, 2, 0.14, '20130313024629', 1, 'kapiltare', 'unique', 'free'),

(73, 1008, 2, 0.15, '20130313024632', 1, 'kapiltare', 'unique', 'free'),

(74, 1008, 2, 0.16, '20130313024635', 1, 'kapiltare', 'unique', 'free'),

(75, 1008, 2, 0.17, '20130313024638', 1, 'kapiltare', 'unique', 'free'),

(76, 1008, 2, 0.18, '20130313024639', 1, 'kapiltare', 'unique', 'free'),

(77, 1008, 2, 0.19, '20130313024640', 1, 'kapiltare', 'unique', 'free'),

(78, 1008, 2, 0.20, '20130313024641', 1, 'kapiltare', 'unique', 'free'),

(79, 1008, 2, 0.21, '20130313024642', 1, 'kapiltare', 'unique', 'free'),

(80, 1008, 2, 0.22, '20130313024642', 1, 'kapiltare', 'unique', 'free'),

(81, 1008, 2, 0.23, '20130313024643', 1, 'kapiltare', 'unique', 'free'),

(82, 1008, 2, 0.24, '20130313024644', 1, 'kapiltare', 'unique', 'free'),

(83, 1008, 1, 0.25, '20130313024653', 1, 'AdminUser', 'unique', 'free'),

(84, 1008, 1, 0.26, '20130313024654', 1, 'AdminUser', 'unique', 'free'),

(85, 1008, 1, 0.27, '20130313024656', 1, 'AdminUser', 'unique', 'free'),

(86, 1008, 1, 0.28, '20130313024656', 1, 'AdminUser', 'unique', 'free'),

(87, 1008, 1, 0.29, '20130313024657', 1, 'AdminUser', 'unique', 'free'),

(88, 1008, 2, 0.30, '20130313024727', 1, 'kapiltare', 'unique', 'free'),

(89, 1008, 2, 0.31, '20130313024728', 1, 'kapiltare', 'unique', 'free'),

(90, 1008, 2, 0.32, '20130313024729', 1, 'kapiltare', 'unique', 'free'),

(91, 1008, 2, 0.33, '20130313024729', 1, 'kapiltare', 'unique', 'free'),

(92, 1008, 2, 0.34, '20130313024730', 1, 'kapiltare', 'unique', 'free'),

(93, 1008, 2, 0.35, '20130313024731', 1, 'kapiltare', 'unique', 'free'),

(94, 1008, 2, 0.36, '20130313024731', 1, 'kapiltare', 'unique', 'free'),

(95, 1008, 2, 0.37, '20130313024748', 1, 'kapiltare', 'unique', 'free'),

(96, 1008, 1, 0.38, '20130313025016', 1, 'AdminUser', 'unique', 'free'),

(97, 1008, 1, 0.39, '20130313025019', 1, 'AdminUser', 'unique', 'free'),

(98, 1008, 1, 0.40, '20130313025022', 1, 'AdminUser', 'unique', 'free'),

(99, 1009, 1, 0.01, '20130313025714', 1, 'AdminUser', 'unique', 'free'),

(100, 1008, 1, 0.41, '20130313025804', 1, 'AdminUser', 'unique', 'free'),

(101, 1008, 1, 0.42, '20130313025931', 1, 'AdminUser', 'unique', 'free'),

(102, 1008, 1, 0.43, '20130313025934', 1, 'AdminUser', 'unique', 'free'),

(103, 1008, 1, 0.44, '20130313025936', 1, 'AdminUser', 'unique', 'free'),

(104, 1008, 1, 0.45, '20130313025938', 1, 'AdminUser', 'unique', 'free'),

(105, 1008, 1, 0.46, '20130313025943', 1, 'AdminUser', 'unique', 'free'),

(106, 1008, 1, 0.47, '20130313025950', 1, 'AdminUser', 'unique', 'free'),

(107, 1008, 1, 0.48, '20130313030051', 1, 'AdminUser', 'unique', 'free'),

(108, 1008, 1, 0.49, '20130313030055', 1, 'AdminUser', 'unique', 'free'),

(109, 1008, 1, 0.50, '20130313030135', 1, 'AdminUser', 'unique', 'free'),

(110, 1008, 1, 0.51, '20130313030138', 1, 'AdminUser', 'unique', 'free'),

(111, 1008, 1, 0.52, '20130313030140', 1, 'AdminUser', 'unique', 'free'),

(112, 1008, 1, 0.53, '20130313030141', 1, 'AdminUser', 'unique', 'free'),

(113, 1008, 1, 0.54, '20130313030142', 1, 'AdminUser', 'unique', 'free'),

(114, 1008, 1, 0.55, '20130313030443', 1, 'AdminUser', 'unique', 'free'),

(115, 1009, 2, 0.02, '20130313031521', 1, 'kapiltare', 'unique', 'free'),

(116, 1009, 1, 0.03, '20130313031521', 1, 'AdminUser', 'unique', 'free'),

(117, 1009, 2, 0.04, '20130313031523', 1, 'kapiltare', 'unique', 'free'),

(118, 1009, 1, 0.05, '20130313031629', 1, 'AdminUser', 'unique', 'free'),

(119, 1009, 2, 0.06, '20130313031650', 1, 'kapiltare', 'unique', 'free'),

(120, 1009, 1, 0.07, '20130313032004', 1, 'AdminUser', 'unique', 'free'),

(121, 1009, 2, 0.08, '20130313032024', 1, 'kapiltare', 'unique', 'free'),

(122, 1009, 1, 0.09, '20130313032734', 1, 'AdminUser', 'unique', 'free'),

(123, 1009, 2, 0.10, '20130313032739', 1, 'kapiltare', 'unique', 'free'),

(124, 1009, 1, 0.11, '20130313032856', 1, 'AdminUser', 'unique', 'free'),

(125, 1009, 2, 0.12, '20130313032918', 1, 'kapiltare', 'unique', 'free'),

(126, 1009, 1, 0.13, '20130313032926', 1, 'AdminUser', 'unique', 'free'),

(127, 1009, 2, 0.14, '20130313032937', 1, 'kapiltare', 'unique', 'free'),

(128, 1009, 1, 0.15, '20130313032941', 1, 'AdminUser', 'unique', 'free'),

(129, 1009, 2, 0.16, '20130313032944', 1, 'kapiltare', 'unique', 'free'),

(130, 1009, 1, 0.17, '20130313032946', 1, 'AdminUser', 'unique', 'free'),

(131, 1009, 2, 0.18, '20130313032948', 1, 'kapiltare', 'unique', 'free'),

(132, 1009, 1, 0.19, '20130313032950', 1, 'AdminUser', 'unique', 'free'),

(133, 1009, 2, 0.20, '20130313032952', 1, 'kapiltare', 'unique', 'free'),

(134, 1009, 1, 0.21, '20130313033026', 1, 'AdminUser', 'unique', 'free'),

(135, 1009, 2, 0.22, '20130313033042', 1, 'kapiltare', 'unique', 'free'),

(136, 1009, 1, 0.23, '20130313033054', 1, 'AdminUser', 'unique', 'free'),

(137, 1009, 2, 0.24, '20130313033108', 1, 'kapiltare', 'unique', 'free'),

(138, 1011, 1, 0.01, '20130313170314', 1, 'AdminUser', 'unique', 'free'),

(139, 1012, 1, 0.01, '20130313170756', 1, 'AdminUser', 'unique', 'free'),

(140, 1013, 1, 0.01, '20130313171113', 1, 'AdminUser', 'unique', 'free'),

(141, 1013, 1, 0.02, '20130313171116', 1, 'AdminUser', 'unique', 'free'),

(142, 1013, 1, 0.03, '20130313171119', 1, 'AdminUser', 'unique', 'free'),

(143, 1013, 1, 0.04, '20130313171121', 1, 'AdminUser', 'unique', 'free'),

(144, 1013, 1, 0.05, '20130313171123', 1, 'AdminUser', 'unique', 'free'),

(145, 1014, 1, 0.01, '20130313171524', 1, 'AdminUser', 'unique', 'free'),

(146, 1014, 1, 0.02, '20130313171531', 1, 'AdminUser', 'unique', 'free'),

(147, 1014, 1, 0.03, '20130313171533', 1, 'AdminUser', 'unique', 'free'),

(148, 1014, 1, 0.04, '20130313171534', 1, 'AdminUser', 'unique', 'free'),

(149, 1014, 1, 0.05, '20130313171535', 1, 'AdminUser', 'unique', 'free'),

(150, 1014, 1, 0.06, '20130313171535', 1, 'AdminUser', 'unique', 'free'),

(151, 1014, 1, 0.07, '20130313171535', 1, 'AdminUser', 'unique', 'free'),

(152, 1015, 1, 0.01, '20130313171801', 1, 'AdminUser', 'unique', 'free'),

(153, 1015, 1, 0.02, '20130313171814', 1, 'AdminUser', 'unique', 'free'),

(154, 1015, 1, 0.03, '20130313171816', 1, 'AdminUser', 'unique', 'free'),

(155, 1015, 1, 0.04, '20130313171819', 1, 'AdminUser', 'unique', 'free'),

(156, 1015, 1, 0.05, '20130313171821', 1, 'AdminUser', 'unique', 'free'),

(157, 1015, 1, 0.06, '20130313171823', 1, 'AdminUser', 'unique', 'free'),

(158, 1015, 1, 0.07, '20130313171825', 1, 'AdminUser', 'unique', 'free'),

(159, 1016, 1, 0.01, '20130313174439', 1, 'AdminUser', 'unique', 'free'),

(160, 1016, 1, 0.02, '20130313174505', 1, 'AdminUser', 'unique', 'free'),

(161, 1016, 1, 0.03, '20130313174506', 1, 'AdminUser', 'unique', 'free'),

(162, 1016, 1, 0.04, '20130313174506', 1, 'AdminUser', 'unique', 'free'),

(163, 1016, 1, 0.05, '20130313174506', 1, 'AdminUser', 'unique', 'free'),

(164, 1016, 1, 0.06, '20130313174507', 1, 'AdminUser', 'unique', 'free'),

(165, 1016, 1, 0.07, '20130313174507', 1, 'AdminUser', 'unique', 'free'),

(166, 1016, 1, 0.08, '20130313174508', 1, 'AdminUser', 'unique', 'free'),

(167, 1016, 1, 0.09, '20130313174508', 1, 'AdminUser', 'unique', 'free'),

(168, 1016, 1, 0.10, '20130313174509', 1, 'AdminUser', 'unique', 'free'),

(169, 1016, 1, 0.11, '20130313174509', 1, 'AdminUser', 'unique', 'free'),

(170, 1012, 2, 0.02, '20130314010245', 1, 'kapiltare', 'unique', 'free'),

(171, 1017, 1, 0.01, '20130314020257', 1, 'AdminUser', 'unique', 'free'),

(172, 1018, 1, 0.01, '20130314020757', 1, 'AdminUser', 'unique', 'free'),

(173, 1018, 1, 0.02, '20130314020803', 1, 'AdminUser', 'unique', 'free'),

(174, 1018, 1, 0.03, '20130314020817', 1, 'AdminUser', 'unique', 'free'),

(175, 1018, 1, 0.04, '20130314020823', 1, 'AdminUser', 'unique', 'free'),

(176, 1018, 1, 0.05, '20130314020826', 1, 'AdminUser', 'unique', 'free'),

(177, 1018, 1, 0.06, '20130314020828', 1, 'AdminUser', 'unique', 'free'),

(178, 1018, 1, 0.07, '20130314020830', 1, 'AdminUser', 'unique', 'free'),

(179, 1018, 1, 0.08, '20130314020833', 1, 'AdminUser', 'unique', 'free'),

(180, 1018, 1, 0.09, '20130314020835', 1, 'AdminUser', 'unique', 'free'),

(181, 1018, 1, 0.10, '20130314020837', 1, 'AdminUser', 'unique', 'free'),

(182, 1018, 1, 0.11, '20130314020839', 1, 'AdminUser', 'unique', 'free'),

(183, 1018, 1, 0.12, '20130314020841', 1, 'AdminUser', 'unique', 'free'),

(184, 1018, 1, 0.13, '20130314020843', 1, 'AdminUser', 'unique', 'free'),

(185, 1018, 1, 0.14, '20130314020846', 1, 'AdminUser', 'unique', 'free'),

(186, 1018, 1, 0.15, '20130314020850', 1, 'AdminUser', 'unique', 'free'),

(187, 1018, 1, 0.16, '20130314020853', 1, 'AdminUser', 'unique', 'free'),

(188, 1018, 1, 0.17, '20130314020856', 1, 'AdminUser', 'unique', 'free'),

(189, 1018, 1, 0.18, '20130314020859', 1, 'AdminUser', 'unique', 'free'),

(190, 1018, 1, 0.19, '20130314020902', 1, 'AdminUser', 'unique', 'free'),

(191, 1018, 1, 0.20, '20130314020904', 1, 'AdminUser', 'unique', 'free'),

(192, 1018, 1, 0.21, '20130314020906', 1, 'AdminUser', 'unique', 'free'),

(193, 1018, 1, 0.22, '20130314020909', 1, 'AdminUser', 'unique', 'free'),

(194, 1018, 1, 0.23, '20130314020913', 1, 'AdminUser', 'unique', 'free'),

(195, 1018, 1, 0.24, '20130314020917', 1, 'AdminUser', 'unique', 'free'),

(196, 1012, 1, 0.03, '20130314022103', 1, 'AdminUser', 'unique', 'free'),

(197, 1012, 2, 0.04, '20130314063837', 1, 'kapiltare', 'unique', 'free'),

(198, 1019, 1, 0.01, '20130317181630', 1, 'AdminUser', 'unique', 'free'),

(199, 1019, 1, 0.02, '20130317181636', 1, 'AdminUser', 'unique', 'free'),

(200, 1019, 1, 0.03, '20130317181639', 1, 'AdminUser', 'unique', 'free'),

(201, 1019, 1, 0.04, '20130317181640', 1, 'AdminUser', 'unique', 'free'),

(202, 1019, 1, 0.05, '20130317181644', 1, 'AdminUser', 'unique', 'free'),

(203, 1019, 1, 0.06, '20130317181645', 1, 'AdminUser', 'unique', 'free'),

(204, 1019, 1, 0.07, '20130317181646', 1, 'AdminUser', 'unique', 'free'),

(205, 1019, 1, 0.08, '20130317181646', 1, 'AdminUser', 'unique', 'free'),

(206, 1019, 1, 0.09, '20130317181646', 1, 'AdminUser', 'unique', 'free'),

(207, 1019, 1, 0.10, '20130317181647', 1, 'AdminUser', 'unique', 'free'),

(208, 1019, 1, 0.11, '20130317181647', 1, 'AdminUser', 'unique', 'free'),

(209, 1019, 1, 0.12, '20130317181652', 1, 'AdminUser', 'unique', 'free'),

(210, 1019, 1, 0.13, '20130317181654', 1, 'AdminUser', 'unique', 'free'),

(211, 1019, 1, 0.14, '20130317181657', 1, 'AdminUser', 'unique', 'free'),

(212, 1019, 1, 0.15, '20130317181658', 1, 'AdminUser', 'unique', 'free'),

(213, 1019, 1, 0.16, '20130317181701', 1, 'AdminUser', 'unique', 'free'),

(214, 1019, 1, 0.17, '20130317181701', 1, 'AdminUser', 'unique', 'free'),

(215, 1019, 1, 0.18, '20130317181702', 1, 'AdminUser', 'unique', 'free'),

(216, 1019, 1, 0.19, '20130317181704', 1, 'AdminUser', 'unique', 'free'),

(217, 1019, 1, 0.20, '20130317181704', 1, 'AdminUser', 'unique', 'free'),

(218, 1019, 1, 0.21, '20130317181704', 1, 'AdminUser', 'unique', 'free'),

(219, 1019, 1, 0.22, '20130317181705', 1, 'AdminUser', 'unique', 'free'),

(220, 1019, 1, 0.23, '20130317181705', 1, 'AdminUser', 'unique', 'free'),

(221, 1019, 1, 0.24, '20130317181706', 1, 'AdminUser', 'unique', 'free'),

(222, 1019, 1, 0.25, '20130317181706', 1, 'AdminUser', 'unique', 'free'),

(223, 1019, 1, 0.26, '20130317181707', 1, 'AdminUser', 'unique', 'free'),

(224, 1019, 1, 0.27, '20130317181707', 1, 'AdminUser', 'unique', 'free'),

(225, 1019, 2, 0.28, '20130318004828', 1, 'kapiltare', 'unique', 'free'),

(226, 1019, 2, 0.29, '20130318004829', 1, 'kapiltare', 'unique', 'free'),

(227, 1019, 2, 0.30, '20130318004830', 1, 'kapiltare', 'unique', 'free'),

(228, 1019, 2, 0.31, '20130318004833', 1, 'kapiltare', 'unique', 'free'),

(229, 1019, 2, 0.32, '20130318004833', 1, 'kapiltare', 'unique', 'free'),

(230, 1019, 2, 0.33, '20130318004834', 1, 'kapiltare', 'unique', 'free'),

(231, 1019, 2, 0.34, '20130318004835', 1, 'kapiltare', 'unique', 'free'),

(232, 1019, 2, 0.35, '20130318004836', 1, 'kapiltare', 'unique', 'free'),

(233, 1019, 2, 0.36, '20130318004836', 1, 'kapiltare', 'unique', 'free'),

(234, 1019, 2, 0.37, '20130318004837', 1, 'kapiltare', 'unique', 'free'),

(235, 1019, 2, 0.38, '20130318004838', 1, 'kapiltare', 'unique', 'free'),

(236, 1019, 2, 0.39, '20130318004839', 1, 'kapiltare', 'unique', 'free'),

(237, 1019, 2, 0.40, '20130318004839', 1, 'kapiltare', 'unique', 'free'),

(238, 1019, 2, 0.41, '20130318004840', 1, 'kapiltare', 'unique', 'free'),

(239, 1019, 2, 0.42, '20130318004841', 1, 'kapiltare', 'unique', 'free'),

(240, 1019, 2, 0.43, '20130318004841', 1, 'kapiltare', 'unique', 'free'),

(241, 1019, 2, 0.44, '20130318004842', 1, 'kapiltare', 'unique', 'free'),

(242, 1019, 2, 0.45, '20130318004843', 1, 'kapiltare', 'unique', 'free'),

(243, 1019, 2, 0.46, '20130318004844', 1, 'kapiltare', 'unique', 'free'),

(244, 1019, 2, 0.47, '20130318004844', 1, 'kapiltare', 'unique', 'free'),

(245, 1019, 2, 0.48, '20130318004845', 1, 'kapiltare', 'unique', 'free'),

(246, 1019, 2, 0.49, '20130318004846', 1, 'kapiltare', 'unique', 'free'),

(247, 1019, 2, 0.50, '20130318004847', 1, 'kapiltare', 'unique', 'free'),

(248, 1019, 2, 0.51, '20130318004907', 1, 'kapiltare', 'unique', 'free'),

(249, 1019, 3, 0.52, '20130318052213', 1, 'abc123', 'unique', 'free'),

(250, 1019, 3, 0.53, '20130318052222', 1, 'abc123', 'unique', 'free'),

(251, 1019, 3, 0.54, '20130318052224', 1, 'abc123', 'unique', 'free'),

(252, 1019, 3, 0.55, '20130318052227', 1, 'abc123', 'unique', 'free'),

(253, 1019, 3, 0.56, '20130318052301', 1, 'abc123', 'unique', 'free'),

(254, 1019, 3, 0.57, '20130318053233', 1, 'abc123', 'unique', 'free'),

(255, 1019, 3, 0.58, '20130318053235', 1, 'abc123', 'unique', 'free'),

(256, 1019, 3, 0.59, '20130318053235', 1, 'abc123', 'unique', 'free'),

(257, 1019, 3, 0.60, '20130318053236', 1, 'abc123', 'unique', 'free'),

(258, 1019, 3, 0.61, '20130318053237', 1, 'abc123', 'unique', 'free'),

(259, 1019, 3, 0.62, '20130318053238', 1, 'abc123', 'unique', 'free'),

(260, 1019, 3, 0.63, '20130318053239', 1, 'abc123', 'unique', 'free'),

(261, 1019, 3, 0.64, '20130318053239', 1, 'abc123', 'unique', 'free'),

(262, 1019, 3, 0.65, '20130318053243', 1, 'abc123', 'unique', 'free'),

(263, 1019, 3, 0.66, '20130318053317', 1, 'abc123', 'unique', 'free'),

(264, 1019, 3, 0.67, '20130318053318', 1, 'abc123', 'unique', 'free'),

(265, 1019, 3, 0.68, '20130318053319', 1, 'abc123', 'unique', 'free'),

(266, 1019, 3, 0.69, '20130318053319', 1, 'abc123', 'unique', 'free'),

(267, 1019, 3, 0.70, '20130318053320', 1, 'abc123', 'unique', 'free'),

(268, 1019, 3, 0.71, '20130318053321', 1, 'abc123', 'unique', 'free'),

(269, 1019, 3, 0.72, '20130318053321', 1, 'abc123', 'unique', 'free'),

(270, 1019, 3, 0.73, '20130318053322', 1, 'abc123', 'unique', 'free'),

(271, 1019, 3, 0.74, '20130318053508', 1, 'abc123', 'unique', 'free'),

(272, 1019, 3, 0.75, '20130318053510', 1, 'abc123', 'unique', 'free'),

(273, 1019, 3, 0.76, '20130318053512', 1, 'abc123', 'unique', 'free'),

(274, 1019, 3, 0.77, '20130318053512', 1, 'abc123', 'unique', 'free'),

(275, 1019, 3, 0.78, '20130318053513', 1, 'abc123', 'unique', 'free'),

(276, 1019, 3, 0.79, '20130318053514', 1, 'abc123', 'unique', 'free'),

(277, 1019, 3, 0.80, '20130318053515', 1, 'abc123', 'unique', 'free'),

(278, 1019, 3, 0.81, '20130318053515', 1, 'abc123', 'unique', 'free'),

(279, 1019, 3, 0.82, '20130318053516', 1, 'abc123', 'unique', 'free'),

(280, 1019, 3, 0.83, '20130318053517', 1, 'abc123', 'unique', 'free'),

(281, 1019, 3, 0.84, '20130318053517', 1, 'abc123', 'unique', 'free'),

(282, 1019, 1, 0.85, '20130318062801', 1, 'AdminUser', 'unique', 'free'),

(283, 1019, 1, 0.86, '20130318062805', 1, 'AdminUser', 'unique', 'free'),

(284, 1019, 1, 0.87, '20130318062810', 1, 'AdminUser', 'unique', 'free'),

(285, 1019, 3, 0.88, '20130318071102', 1, 'abc123', 'unique', 'free'),

(286, 1019, 3, 0.89, '20130318071142', 1, 'abc123', 'unique', 'free'),

(287, 1019, 3, 0.90, '20130318071249', 1, 'abc123', 'unique', 'free'),

(288, 1019, 3, 0.91, '20130318071250', 1, 'abc123', 'unique', 'free'),

(289, 1019, 3, 0.92, '20130318071251', 1, 'abc123', 'unique', 'free'),

(290, 1019, 3, 0.93, '20130318071301', 1, 'abc123', 'unique', 'free'),

(291, 1020, 1, 0.01, '20130318180657', 1, 'AdminUser', 'unique', 'free'),

(292, 1020, 1, 0.02, '20130318180700', 1, 'AdminUser', 'unique', 'free'),

(293, 1020, 1, 0.03, '20130318180704', 1, 'AdminUser', 'unique', 'free'),

(294, 1020, 1, 0.04, '20130318180707', 1, 'AdminUser', 'unique', 'free'),

(295, 1019, 5, 0.94, '20130319115753', 1, 'lokesh101', 'unique', 'free'),

(296, 1019, 3, 0.95, '20130319121053', 1, 'abc123', 'unique', 'free'),

(297, 1019, 3, 0.96, '20130319121132', 1, 'abc123', 'unique', 'free'),

(298, 1019, 5, 0.97, '20130319121212', 1, 'lokesh101', 'unique', 'free'),

(299, 1019, 5, 0.98, '20130319121219', 1, 'lokesh101', 'unique', 'free'),

(300, 1019, 5, 0.99, '20130319121219', 1, 'lokesh101', 'unique', 'free'),

(301, 1019, 5, 1.00, '20130319121220', 1, 'lokesh101', 'unique', 'free'),

(302, 1019, 5, 1.01, '20130319121221', 1, 'lokesh101', 'unique', 'free'),

(303, 1019, 3, 1.02, '20130319121221', 1, 'abc123', 'unique', 'free'),

(304, 1019, 5, 1.03, '20130319121221', 1, 'lokesh101', 'unique', 'free'),

(305, 1019, 5, 1.04, '20130319121222', 1, 'lokesh101', 'unique', 'free'),

(306, 1019, 5, 1.05, '20130319121223', 1, 'lokesh101', 'unique', 'free'),

(307, 1019, 5, 1.06, '20130319121224', 1, 'lokesh101', 'unique', 'free'),

(308, 1019, 3, 1.07, '20130319121233', 1, 'abc123', 'unique', 'free'),

(309, 1019, 3, 1.08, '20130319121239', 1, 'abc123', 'unique', 'free'),

(310, 1019, 3, 1.09, '20130319121253', 1, 'abc123', 'unique', 'free'),

(311, 1019, 5, 1.10, '20130319121504', 1, 'lokesh101', 'unique', 'free'),

(312, 1019, 5, 1.11, '20130319121523', 1, 'lokesh101', 'unique', 'free'),

(313, 1019, 5, 1.12, '20130319121523', 1, 'lokesh101', 'unique', 'free'),

(314, 1019, 5, 1.13, '20130319121524', 1, 'lokesh101', 'unique', 'free'),

(315, 1019, 5, 1.14, '20130319121525', 1, 'lokesh101', 'unique', 'free'),

(316, 1019, 5, 1.15, '20130319121547', 1, 'lokesh101', 'unique', 'free'),

(317, 1019, 5, 1.16, '20130319121557', 1, 'lokesh101', 'unique', 'free'),

(318, 1019, 5, 1.17, '20130319121602', 1, 'lokesh101', 'unique', 'free'),

(319, 1019, 5, 1.18, '20130319121608', 1, 'lokesh101', 'unique', 'free'),

(320, 1019, 5, 1.19, '20130319121613', 1, 'lokesh101', 'unique', 'free'),

(321, 1019, 5, 1.20, '20130319121614', 1, 'lokesh101', 'unique', 'free'),

(322, 1019, 5, 1.21, '20130319121619', 1, 'lokesh101', 'unique', 'free'),

(323, 1019, 5, 1.22, '20130319121647', 1, 'lokesh101', 'unique', 'free'),

(324, 1019, 5, 1.23, '20130319121649', 1, 'lokesh101', 'unique', 'free'),

(325, 1019, 5, 1.24, '20130319121650', 1, 'lokesh101', 'unique', 'free'),

(326, 1019, 5, 1.25, '20130319121650', 1, 'lokesh101', 'unique', 'free'),

(327, 1019, 5, 1.26, '20130319121651', 1, 'lokesh101', 'unique', 'free'),

(328, 1019, 5, 1.27, '20130319121652', 1, 'lokesh101', 'unique', 'free'),

(329, 1019, 5, 1.28, '20130319121653', 1, 'lokesh101', 'unique', 'free'),

(330, 1019, 5, 1.29, '20130319121653', 1, 'lokesh101', 'unique', 'free'),

(331, 1019, 5, 1.30, '20130319121655', 1, 'lokesh101', 'unique', 'free'),

(332, 1019, 5, 1.31, '20130319121655', 1, 'lokesh101', 'unique', 'free'),

(333, 1019, 5, 1.32, '20130319121656', 1, 'lokesh101', 'unique', 'free'),

(334, 1019, 5, 1.33, '20130319121657', 1, 'lokesh101', 'unique', 'free'),

(335, 1019, 5, 1.34, '20130319121657', 1, 'lokesh101', 'unique', 'free'),

(336, 1019, 5, 1.35, '20130319121712', 1, 'lokesh101', 'unique', 'free'),

(337, 1019, 5, 1.36, '20130319121712', 1, 'lokesh101', 'unique', 'free'),

(338, 1019, 5, 1.37, '20130319121713', 1, 'lokesh101', 'unique', 'free'),

(339, 1019, 5, 1.38, '20130319121713', 1, 'lokesh101', 'unique', 'free'),

(340, 1019, 5, 1.39, '20130319121714', 1, 'lokesh101', 'unique', 'free'),

(341, 1019, 5, 1.40, '20130319121715', 1, 'lokesh101', 'unique', 'free'),

(342, 1019, 5, 1.41, '20130319121715', 1, 'lokesh101', 'unique', 'free'),

(343, 1019, 5, 1.42, '20130319121716', 1, 'lokesh101', 'unique', 'free'),

(344, 1019, 5, 1.43, '20130319121717', 1, 'lokesh101', 'unique', 'free'),

(345, 1019, 5, 1.44, '20130319121717', 1, 'lokesh101', 'unique', 'free'),

(346, 1019, 1, 1.45, '20130319123012', 1, 'AdminUser', 'unique', 'free'),

(347, 1019, 1, 1.46, '20130319123018', 1, 'AdminUser', 'unique', 'free'),

(348, 1019, 1, 1.47, '20130319123021', 1, 'AdminUser', 'unique', 'free'),

(349, 1019, 1, 1.48, '20130319123038', 1, 'AdminUser', 'unique', 'free'),

(350, 1019, 1, 1.49, '20130319123309', 1, 'AdminUser', 'unique', 'free'),

(351, 1019, 1, 1.50, '20130319130006', 1, 'AdminUser', 'unique', 'free'),

(352, 1019, 1, 1.51, '20130319131544', 1, 'AdminUser', 'unique', 'free'),

(353, 1019, 1, 1.52, '20130319132158', 1, 'AdminUser', 'unique', 'free'),

(354, 1021, 1, 0.01, '20130319132216', 1, 'AdminUser', 'unique', 'free'),

(355, 1021, 1, 0.02, '20130319132223', 1, 'AdminUser', 'unique', 'free'),

(356, 1021, 1, 0.03, '20130319132226', 1, 'AdminUser', 'unique', 'free'),

(357, 1021, 1, 0.04, '20130319132230', 1, 'AdminUser', 'unique', 'free'),

(358, 1021, 1, 0.05, '20130319132240', 1, 'AdminUser', 'unique', 'free'),

(359, 1021, 1, 0.06, '20130319132455', 1, 'AdminUser', 'unique', 'free'),

(360, 1021, 1, 0.07, '20130319134052', 1, 'AdminUser', 'unique', 'free'),

(361, 1021, 1, 0.08, '20130319134054', 1, 'AdminUser', 'unique', 'free'),

(362, 1021, 1, 0.09, '20130319134057', 1, 'AdminUser', 'unique', 'free'),

(363, 1021, 1, 0.10, '20130319134059', 1, 'AdminUser', 'unique', 'free'),

(364, 1021, 1, 0.11, '20130319134105', 1, 'AdminUser', 'unique', 'free'),

(365, 1021, 1, 0.12, '20130319134107', 1, 'AdminUser', 'unique', 'free'),

(366, 1021, 1, 0.13, '20130319134108', 1, 'AdminUser', 'unique', 'free'),

(367, 1021, 1, 0.14, '20130319134120', 1, 'AdminUser', 'unique', 'free'),

(368, 1021, 1, 0.15, '20130319134121', 1, 'AdminUser', 'unique', 'free'),

(369, 1021, 1, 0.16, '20130319134123', 1, 'AdminUser', 'unique', 'free'),

(370, 1021, 1, 0.17, '20130319134125', 1, 'AdminUser', 'unique', 'free'),

(371, 1021, 1, 0.18, '20130319134127', 1, 'AdminUser', 'unique', 'free'),

(372, 1021, 1, 0.19, '20130319134128', 1, 'AdminUser', 'unique', 'free'),

(373, 1021, 1, 0.20, '20130319134129', 1, 'AdminUser', 'unique', 'free'),

(374, 1021, 1, 0.21, '20130319134130', 1, 'AdminUser', 'unique', 'paid'),

(375, 1021, 1, 0.22, '20130319134130', 1, 'AdminUser', 'unique', 'paid'),

(376, 1021, 1, 0.23, '20130319134131', 1, 'AdminUser', 'unique', 'paid'),

(377, 1021, 1, 0.24, '20130319134132', 1, 'AdminUser', 'unique', 'paid'),

(378, 1021, 1, 0.25, '20130319134133', 1, 'AdminUser', 'unique', 'paid'),

(379, 1021, 1, 0.26, '20130319140213', 1, 'AdminUser', 'unique', 'paid'),

(380, 1021, 1, 0.27, '20130319140215', 1, 'AdminUser', 'unique', 'paid'),

(381, 1021, 1, 0.28, '20130319142935', 1, 'AdminUser', 'unique', 'paid'),

(382, 1021, 1, 0.29, '20130319142936', 1, 'AdminUser', 'unique', 'paid'),

(383, 1021, 1, 0.30, '20130319142937', 1, 'AdminUser', 'unique', 'paid'),

(384, 1021, 1, 0.31, '20130319142939', 1, 'AdminUser', 'unique', 'paid'),

(385, 1021, 1, 0.32, '20130319142941', 1, 'AdminUser', 'unique', 'paid'),

(386, 1021, 1, 0.33, '20130319142942', 1, 'AdminUser', 'unique', 'paid'),

(387, 1021, 1, 0.34, '20130319142943', 1, 'AdminUser', 'unique', 'paid'),

(388, 1021, 1, 0.35, '20130319142944', 1, 'AdminUser', 'unique', 'paid'),

(389, 1021, 1, 0.36, '20130319142946', 1, 'AdminUser', 'unique', 'paid'),

(390, 1021, 1, 0.37, '20130319142947', 1, 'AdminUser', 'unique', 'paid'),

(391, 1021, 1, 0.38, '20130319142950', 1, 'AdminUser', 'unique', 'paid'),

(392, 1021, 1, 0.39, '20130319142951', 1, 'AdminUser', 'unique', 'paid'),

(393, 1021, 1, 0.40, '20130319142952', 1, 'AdminUser', 'unique', 'paid'),

(394, 1021, 1, 0.41, '20130319142953', 1, 'AdminUser', 'unique', 'paid'),

(395, 1021, 1, 0.42, '20130319142955', 1, 'AdminUser', 'unique', 'paid'),

(396, 1021, 1, 0.43, '20130319142955', 1, 'AdminUser', 'unique', 'paid'),

(397, 1021, 1, 0.44, '20130319142956', 1, 'AdminUser', 'unique', 'paid'),

(398, 1021, 1, 0.45, '20130319142958', 1, 'AdminUser', 'unique', 'paid'),

(399, 1021, 1, 0.46, '20130319142958', 1, 'AdminUser', 'unique', 'paid'),

(400, 1021, 1, 0.47, '20130319143000', 1, 'AdminUser', 'unique', 'paid'),

(401, 1021, 1, 0.48, '20130319143001', 1, 'AdminUser', 'unique', 'paid'),

(402, 1021, 1, 0.49, '20130319143003', 1, 'AdminUser', 'unique', 'paid'),

(403, 1021, 1, 0.50, '20130319143004', 1, 'AdminUser', 'unique', 'paid'),

(404, 1021, 1, 0.51, '20130319143005', 1, 'AdminUser', 'unique', 'paid'),

(405, 1021, 1, 0.52, '20130319143006', 1, 'AdminUser', 'unique', 'paid'),

(406, 1021, 1, 0.53, '20130319143008', 1, 'AdminUser', 'unique', 'paid'),

(407, 1022, 1, 0.01, '20130319164014', 1, 'AdminUser', 'unique', 'paid'),

(408, 1022, 1, 0.02, '20130319164020', 1, 'AdminUser', 'unique', 'paid'),

(409, 1022, 1, 0.03, '20130319164025', 1, 'AdminUser', 'unique', 'paid'),

(410, 1022, 1, 0.04, '20130319164035', 1, 'AdminUser', 'unique', 'paid'),

(411, 1022, 1, 0.05, '20130319164037', 1, 'AdminUser', 'unique', 'paid'),

(412, 1022, 1, 0.06, '20130319164038', 1, 'AdminUser', 'unique', 'paid'),

(413, 1022, 1, 0.07, '20130319164040', 1, 'AdminUser', 'unique', 'paid'),

(414, 1021, 6, 0.54, '20130319164633', 1, 'test123', 'unique', 'free'),

(415, 1021, 6, 0.55, '20130319164645', 1, 'test123', 'unique', 'free'),

(416, 1021, 6, 0.56, '20130319164649', 1, 'test123', 'unique', 'free'),

(417, 1021, 6, 0.57, '20130319164652', 1, 'test123', 'unique', 'free'),

(418, 1021, 6, 0.58, '20130319164656', 1, 'test123', 'unique', 'free'),

(419, 1019, 6, 1.53, '20130319164800', 1, 'test123', 'unique', 'free'),

(420, 1019, 1, 1.54, '20130319165413', 1, 'AdminUser', 'unique', 'paid'),

(421, 1019, 1, 1.55, '20130319165420', 1, 'AdminUser', 'unique', 'paid'),

(422, 1019, 1, 1.56, '20130319165430', 1, 'AdminUser', 'unique', 'paid'),

(423, 1023, 1, 0.01, '20130319170218', 1, 'AdminUser', 'unique', 'paid'),

(424, 1023, 1, 0.02, '20130319170223', 1, 'AdminUser', 'unique', 'paid'),

(425, 1023, 1, 0.03, '20130319170229', 1, 'AdminUser', 'unique', 'paid'),

(426, 1025, 5, 101.01, '20130320001732', 1, 'lokesh101', 'unique', 'paid'),

(427, 1026, 5, 10.01, '20130320002024', 1, 'lokesh101', 'unique', 'paid'),

(428, 1028, 5, 11.00, '20130320003942', 1, 'lokesh101', 'unique', 'paid'),

(429, 1028, 7, 12.00, '20130320005047', 1, 'lokesh', 'unique', 'free'),

(430, 1028, 5, 13.00, '20130320005056', 1, 'lokesh101', 'unique', 'paid'),

(431, 1028, 7, 14.00, '20130320005057', 1, 'lokesh', 'unique', 'free'),

(432, 1028, 5, 15.00, '20130320005113', 1, 'lokesh101', 'unique', 'paid'),

(433, 1028, 7, 16.00, '20130320005129', 1, 'lokesh', 'unique', 'free'),

(434, 1028, 5, 17.00, '20130320005130', 1, 'lokesh101', 'unique', 'paid'),

(435, 1028, 7, 18.00, '20130320005130', 1, 'lokesh', 'unique', 'free'),

(436, 1028, 5, 19.00, '20130320005250', 1, 'lokesh101', 'unique', 'paid'),

(437, 1028, 7, 20.00, '20130320015737', 1, 'lokesh', 'unique', 'free'),

(438, 1028, 3, 21.00, '20130320025241', 1, 'abc123', 'unique', 'paid'),

(439, 1028, 5, 22.00, '20130320030215', 1, 'lokesh101', 'unique', 'paid'),

(440, 1028, 7, 23.00, '20130320030621', 1, 'lokesh', 'unique', 'free'),

(441, 1028, 5, 24.00, '20130320030631', 1, 'lokesh101', 'unique', 'paid'),

(442, 1028, 7, 25.00, '20130320030635', 1, 'lokesh', 'unique', 'free'),

(443, 1028, 5, 26.00, '20130320030638', 1, 'lokesh101', 'unique', 'paid'),

(444, 1028, 7, 27.00, '20130320031412', 1, 'lokesh', 'unique', 'free'),

(445, 1028, 5, 28.00, '20130320031436', 1, 'lokesh101', 'unique', 'paid'),

(446, 1028, 3, 29.00, '20130320031837', 1, 'abc123', 'unique', 'paid'),

(447, 1028, 1, 30.00, '20130320033006', 1, 'AdminUser', 'unique', 'free'),

(448, 1028, 5, 31.00, '20130320033646', 1, 'lokesh101', 'unique', 'paid'),

(449, 1028, 1, 32.00, '20130320033819', 1, 'AdminUser', 'unique', 'free'),

(450, 1028, 5, 33.00, '20130320052317', 1, 'lokesh101', 'unique', 'paid'),

(451, 1028, 7, 34.00, '20130320052527', 1, 'lokesh', 'unique', 'free'),

(452, 1029, 1, 0.01, '20130320053210', 1, 'AdminUser', 'unique', 'free'),

(453, 1029, 1, 0.02, '20130320053212', 1, 'AdminUser', 'unique', 'free'),

(454, 1029, 1, 0.03, '20130320053214', 1, 'AdminUser', 'unique', 'free'),

(455, 1029, 1, 0.04, '20130320053216', 1, 'AdminUser', 'unique', 'free'),

(456, 1029, 1, 0.05, '20130320053218', 1, 'AdminUser', 'unique', 'free'),

(457, 1029, 1, 0.06, '20130320053221', 1, 'AdminUser', 'unique', 'free'),

(458, 1029, 1, 0.07, '20130320053224', 1, 'AdminUser', 'unique', 'free'),

(459, 1029, 1, 0.08, '20130320053326', 1, 'AdminUser', 'unique', 'free'),

(460, 1029, 1, 0.09, '20130320053327', 1, 'AdminUser', 'unique', 'free'),

(461, 1029, 1, 0.10, '20130320053329', 1, 'AdminUser', 'unique', 'free'),

(462, 1029, 1, 0.11, '20130320053334', 1, 'AdminUser', 'unique', 'free'),

(463, 1029, 1, 0.12, '20130320053337', 1, 'AdminUser', 'unique', 'free'),

(464, 1029, 1, 0.13, '20130320053340', 1, 'AdminUser', 'unique', 'free'),

(465, 1029, 1, 0.14, '20130320053341', 1, 'AdminUser', 'unique', 'free'),

(466, 1029, 1, 0.15, '20130320053353', 1, 'AdminUser', 'unique', 'free'),

(467, 1029, 1, 0.16, '20130320053356', 1, 'AdminUser', 'unique', 'free'),

(468, 1029, 1, 0.17, '20130320053420', 1, 'AdminUser', 'unique', 'free'),

(469, 1029, 1, 0.18, '20130320053422', 1, 'AdminUser', 'unique', 'free'),

(470, 1029, 1, 0.19, '20130320053424', 1, 'AdminUser', 'unique', 'free'),

(471, 1029, 1, 0.20, '20130320053426', 1, 'AdminUser', 'unique', 'free'),

(472, 1029, 1, 0.21, '20130320053428', 1, 'AdminUser', 'unique', 'free'),

(473, 1029, 1, 0.22, '20130320053434', 1, 'AdminUser', 'unique', 'free'),

(474, 1029, 1, 0.23, '20130320053437', 1, 'AdminUser', 'unique', 'free'),

(475, 1029, 1, 0.24, '20130320053439', 1, 'AdminUser', 'unique', 'free'),

(476, 1029, 1, 0.25, '20130320053442', 1, 'AdminUser', 'unique', 'free'),

(477, 1029, 1, 0.26, '20130320053444', 1, 'AdminUser', 'unique', 'free'),

(478, 1029, 5, 0.27, '20130320053617', 1, 'lokesh101', 'unique', 'paid'),

(479, 1029, 5, 0.28, '20130320053628', 1, 'lokesh101', 'unique', 'paid'),

(480, 1029, 5, 0.29, '20130320053633', 1, 'lokesh101', 'unique', 'paid'),

(481, 1028, 5, 35.00, '20130320053653', 1, 'lokesh101', 'unique', 'paid'),

(482, 1029, 1, 0.30, '20130320053708', 1, 'AdminUser', 'unique', 'free'),

(483, 1029, 1, 0.31, '20130320053710', 1, 'AdminUser', 'unique', 'free'),

(484, 1029, 1, 0.32, '20130320054320', 1, 'AdminUser', 'unique', 'free'),

(485, 1029, 1, 0.33, '20130320054321', 1, 'AdminUser', 'unique', 'free'),

(486, 1029, 1, 0.34, '20130320054323', 1, 'AdminUser', 'unique', 'free'),

(487, 1029, 1, 0.35, '20130320054327', 1, 'AdminUser', 'unique', 'free'),

(488, 1029, 1, 0.36, '20130320054329', 1, 'AdminUser', 'unique', 'free'),

(489, 1028, 4, 36.00, '20130320054815', 1, 'reliance', 'unique', 'free'),

(490, 1029, 4, 0.37, '20130320054819', 1, 'reliance', 'unique', 'free'),

(491, 1029, 4, 0.38, '20130320054819', 1, 'reliance', 'unique', 'free'),

(492, 1029, 4, 0.39, '20130320054826', 1, 'reliance', 'unique', 'free'),

(493, 1029, 4, 0.40, '20130320054827', 1, 'reliance', 'unique', 'free'),

(494, 1029, 4, 0.41, '20130320054827', 1, 'reliance', 'unique', 'free'),

(495, 1031, 1, 0.01, '20130320064113', 1, 'AdminUser', 'unique', 'free'),

(496, 1031, 1, 0.02, '20130320064125', 1, 'AdminUser', 'unique', 'free'),

(497, 1031, 1, 0.03, '20130320064238', 1, 'AdminUser', 'unique', 'free'),

(498, 1031, 1, 0.04, '20130320064247', 1, 'AdminUser', 'unique', 'free'),

(499, 1032, 1, 0.01, '20130320064427', 1, 'AdminUser', 'unique', 'free'),

(500, 1032, 1, 0.02, '20130320064429', 1, 'AdminUser', 'unique', 'free'),

(501, 1033, 1, 0.01, '20130320064531', 1, 'AdminUser', 'unique', 'free'),

(502, 1028, 5, 37.00, '20130320073546', 1, 'lokesh101', 'unique', 'paid'),

(503, 1028, 1, 38.00, '20130320075315', 1, 'AdminUser', 'unique', 'free'),

(504, 1028, 5, 39.00, '20130320075407', 1, 'lokesh101', 'unique', 'paid'),

(505, 1032, 5, 0.03, '20130320080128', 1, 'lokesh101', 'unique', 'paid'),

(506, 1032, 5, 0.04, '20130320080132', 1, 'lokesh101', 'unique', 'paid'),

(507, 1032, 5, 0.05, '20130320080134', 1, 'lokesh101', 'unique', 'paid'),

(508, 1032, 5, 0.06, '20130320080134', 1, 'lokesh101', 'unique', 'paid'),

(509, 1032, 5, 0.07, '20130320080135', 1, 'lokesh101', 'unique', 'paid'),

(510, 1032, 5, 0.08, '20130320080136', 1, 'lokesh101', 'unique', 'paid'),

(511, 1032, 5, 0.09, '20130320080136', 1, 'lokesh101', 'unique', 'paid'),

(512, 1032, 5, 0.10, '20130320080137', 1, 'lokesh101', 'unique', 'paid'),

(513, 1029, 5, 0.42, '20130320080209', 1, 'lokesh101', 'unique', 'paid'),

(514, 1029, 5, 0.43, '20130320080210', 1, 'lokesh101', 'unique', 'paid'),

(515, 1029, 5, 0.44, '20130320080211', 1, 'lokesh101', 'unique', 'paid'),

(516, 1029, 4, 0.45, '20130321020132', 1, 'reliance', 'unique', 'free'),

(517, 1029, 4, 0.46, '20130321020454', 1, 'reliance', 'unique', 'free'),

(518, 1035, 1, 0.01, '20130321064435', 1, 'AdminUser', 'unique', 'free'),

(519, 1035, 1, 0.02, '20130321064445', 1, 'AdminUser', 'unique', 'free'),

(520, 1035, 1, 0.03, '20130321064510', 1, 'AdminUser', 'unique', 'free'),

(521, 1035, 1, 0.04, '20130321064739', 1, 'AdminUser', 'unique', 'free'),

(522, 1035, 1, 0.05, '20130321064741', 1, 'AdminUser', 'unique', 'free'),

(523, 1035, 1, 0.06, '20130321064742', 1, 'AdminUser', 'unique', 'free'),

(524, 1035, 1, 0.07, '20130321064744', 1, 'AdminUser', 'unique', 'free');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_bid_packs`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_bid_packs`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_bid_packs` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `bids` int(32) NOT NULL,

  `price` double(16,2) NOT NULL,

  `title` tinytext NOT NULL,

  `note1` tinytext NOT NULL,

  `note2` tinytext NOT NULL,

  `image` tinytext NOT NULL,

  `bonus_bids_qty` double(16,2) NOT NULL,

  `bonus_bids_percentage` double(16,2) NOT NULL,

  `active` varchar(1) NOT NULL DEFAULT '1',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



--

-- Dumping data for table `PHPAUCTIONXL_bid_packs`

--



INSERT INTO `PHPAUCTIONXL_bid_packs` (`id`, `bids`, `price`, `title`, `note1`, `note2`, `image`, `bonus_bids_qty`, `bonus_bids_percentage`, `active`) VALUES

(1, 100, 60.00, 'test1', '', '', '', 0.00, 0.00, '1'),

(2, 10, 1.00, 'new bid', '', '', '', 0.00, 0.00, '1');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_browsers`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_browsers`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_browsers` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` varchar(4) NOT NULL DEFAULT '',

  `browser` varchar(50) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_categories`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_categories`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_categories` (

  `cat_id` int(4) NOT NULL AUTO_INCREMENT,

  `parent_id` int(4) DEFAULT NULL,

  `cat_name` tinytext,

  `deleted` int(1) DEFAULT NULL,

  `sub_counter` int(11) DEFAULT NULL,

  `counter` int(11) DEFAULT NULL,

  `cat_colour` tinytext NOT NULL,

  `cat_image` tinytext NOT NULL,

  `feesfree` enum('y','n') NOT NULL DEFAULT 'n',

  PRIMARY KEY (`cat_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



--

-- Dumping data for table `PHPAUCTIONXL_categories`

--



INSERT INTO `PHPAUCTIONXL_categories` (`cat_id`, `parent_id`, `cat_name`, `deleted`, `sub_counter`, `counter`, `cat_colour`, `cat_image`, `feesfree`) VALUES

(1, 0, 'Auctions', 0, 3, 3, '', '', 'n');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_categories_plain`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_categories_plain`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_categories_plain` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `cat_id` int(11) DEFAULT NULL,

  `cat_name` tinytext,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67529 ;



--

-- Dumping data for table `PHPAUCTIONXL_categories_plain`

--



INSERT INTO `PHPAUCTIONXL_categories_plain` (`id`, `cat_id`, `cat_name`) VALUES

(67528, 1, 'Auctions');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_cats_translated`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_cats_translated`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_cats_translated` (

  `cat_id` int(11) NOT NULL DEFAULT '0',

  `lang` char(2) NOT NULL DEFAULT '',

  `cat_name` varchar(255) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_cats_translated`

--



INSERT INTO `PHPAUCTIONXL_cats_translated` (`cat_id`, `lang`, `cat_name`) VALUES

(1, 'EN', 'Auctions'),

(1, 'ES', 'Auctions');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_closedrelisted`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_closedrelisted`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_closedrelisted` (

  `auction` int(32) DEFAULT '0',

  `relistdate` varchar(8) NOT NULL DEFAULT '',

  `newauction` int(32) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_community`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_community`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_community` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `name` varchar(255) NOT NULL DEFAULT '0',

  `messages` int(11) NOT NULL DEFAULT '0',

  `lastmessage` varchar(14) NOT NULL DEFAULT '0',

  `msgstoshow` int(11) NOT NULL DEFAULT '0',

  `active` int(1) NOT NULL DEFAULT '1',

  KEY `msg_id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



--

-- Dumping data for table `PHPAUCTIONXL_community`

--



INSERT INTO `PHPAUCTIONXL_community` (`id`, `name`, `messages`, `lastmessage`, `msgstoshow`, `active`) VALUES

(1, 'Selling', 0, '', 30, 1),

(2, 'Buying', 0, '20050823103800', 30, 1);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_comm_messages`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_comm_messages`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_comm_messages` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `boardid` int(11) NOT NULL DEFAULT '0',

  `msgdate` varchar(14) NOT NULL DEFAULT '',

  `user` int(11) NOT NULL DEFAULT '0',

  `username` varchar(255) NOT NULL DEFAULT '',

  `message` text NOT NULL,

  KEY `msg_id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_counters`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_counters`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_counters` (

  `users` int(11) DEFAULT '0',

  `auctions` int(11) DEFAULT '0',

  `closedauctions` int(11) NOT NULL DEFAULT '0',

  `inactiveusers` int(11) NOT NULL DEFAULT '0',

  `bids` int(11) NOT NULL DEFAULT '0',

  `transactions` int(11) NOT NULL DEFAULT '0',

  `totalamount` double NOT NULL DEFAULT '0',

  `resetdate` varchar(8) NOT NULL DEFAULT '',

  `fees` double NOT NULL DEFAULT '0',

  `suspendedauction` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_counters`

--



INSERT INTO `PHPAUCTIONXL_counters` (`users`, `auctions`, `closedauctions`, `inactiveusers`, `bids`, `transactions`, `totalamount`, `resetdate`, `fees`, `suspendedauction`) VALUES

(7, 3, 19, 0, 31, 0, 0, '20070101', 0, 0);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_counterstoshow`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_counterstoshow`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_counterstoshow` (

  `auctions` enum('y','n') NOT NULL DEFAULT 'y',

  `users` enum('y','n') NOT NULL DEFAULT 'y',

  `online` enum('y','n') NOT NULL DEFAULT 'y'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_counterstoshow`

--



INSERT INTO `PHPAUCTIONXL_counterstoshow` (`auctions`, `users`, `online`) VALUES

('y', 'y', 'y');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_countries`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_countries`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_countries` (

  `country` varchar(30) NOT NULL DEFAULT '',

  PRIMARY KEY (`country`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_countries`

--



INSERT INTO `PHPAUCTIONXL_countries` (`country`) VALUES

('Afghanistan'),

('Albania'),

('Algeria'),

('American Samoa'),

('Andorra'),

('Angola'),

('Anguilla'),

('Antarctica'),

('Antigua And Barbuda'),

('Argentina'),

('Armenia'),

('Aruba'),

('United Arab Emirates'),

('Austria'),

('Azerbaijan'),

('Bahamas'),

('Bahrain'),

('Bangladesh'),

('Barbados'),

('Belarus'),

('Belgium'),

('Belize'),

('Benin'),

('Bermuda'),

('Bhutan'),

('Bolivia'),

('Bosnia and Herzegowina'),

('Botswana'),

('Bouvet Island'),

('Brazil'),

('British Indian Ocean Territory'),

('Brunei Darussalam'),

('Bulgaria'),

('Burkina Faso'),

('Burma'),

('Burundi'),

('Cambodia'),

('Cameroon'),

('Canada'),

('Cape Verde'),

('Cayman Islands'),

('Central African Republic'),

('Chad'),

('Chile'),

('China'),

('Christmas Island'),

('Cocos (Keeling) Islands'),

('Colombia'),

('Comoros'),

('Congo'),

('Congo, the Democratic Republic'),

('Cook Islands'),

('Costa Rica'),

('Cote d''Ivoire'),

('Croatia'),

('Cyprus'),

('Czech Republic'),

('Denmark'),

('Djibouti'),

('Dominica'),

('Dominican Republic'),

('East Timor'),

('Ecuador'),

('Egypt'),

('El Salvador'),

('England'),

('Equatorial Guinea'),

('Eritrea'),

('Estonia'),

('Ethiopia'),

('Falkland Islands'),

('Faroe Islands'),

('Fiji'),

('Finland'),

('France'),

('French Guiana'),

('French Polynesia'),

('French Southern Territories'),

('Gabon'),

('Gambia'),

('Georgia'),

('Germany'),

('Ghana'),

('Gibraltar'),

('Great Britain'),

('Greece'),

('Greenland'),

('Grenada'),

('Guadeloupe'),

('Guam'),

('Guatemala'),

('Guinea'),

('Guinea-Bissau'),

('Guyana'),

('Haiti'),

('Heard and Mc Donald Islands'),

('Holy See (Vatican City State)'),

('Honduras'),

('Hong Kong'),

('Hungary'),

('Iceland'),

('India'),

('Indonesia'),

('Ireland'),

('Israel'),

('Italy'),

('Jamaica'),

('Japan'),

('Jordan'),

('Kazakhstan'),

('Kenya'),

('Kiribati'),

('Korea (South)'),

('Kuwait'),

('Kyrgyzstan'),

('Lao People''s Democratic Republ'),

('Latvia'),

('Lebanon'),

('Lesotho'),

('Liberia'),

('Liechtenstein'),

('Lithuania'),

('Luxembourg'),

('Macau'),

('Macedonia'),

('Madagascar'),

('Malawi'),

('Malaysia'),

('Maldives'),

('Mali'),

('Malta'),

('Marshall Islands'),

('Martinique'),

('Mauritania'),

('Mauritius'),

('Mayotte'),

('Mexico'),

('Micronesia, Federated States o'),

('Moldova, Republic of'),

('Monaco'),

('Mongolia'),

('Montserrat'),

('Morocco'),

('Mozambique'),

('Namibia'),

('Nauru'),

('Nepal'),

('Netherlands'),

('Netherlands Antilles'),

('New Caledonia'),

('New Zealand'),

('Nicaragua'),

('Niger'),

('Nigeria'),

('Niuev'),

('Norfolk Island'),

('Northern Ireland'),

('Northern Mariana Islands'),

('Norway'),

('Oman'),

('Pakistan'),

('Palau'),

('Panama'),

('Papua New Guinea'),

('Paraguay'),

('Peru'),

('Philippines'),

('Pitcairn'),

('Poland'),

('Portugal'),

('Puerto Rico'),

('Qatar'),

('Reunion'),

('Romania'),

('Russian Federation'),

('Rwanda'),

('Saint Kitts and Nevis'),

('Saint Lucia'),

('Saint Vincent and the Grenadin'),

('Samoa (Independent)'),

('San Marino'),

('Sao Tome and Principe'),

('Saudi Arabia'),

('Scotland'),

('Senegal'),

('Seychelles'),

('Sierra Leone'),

('Singapore'),

('Slovakia'),

('Slovenia'),

('Solomon Islands'),

('Somalia'),

('South Africa'),

('South Georgia and the South Sa'),

('Spain'),

('Sri Lanka'),

('St. Helena'),

('St. Pierre and Miquelon'),

('Suriname'),

('Svalbard and Jan Mayen Islands'),

('Swaziland'),

('Sweden'),

('Switzerland'),

('Taiwan'),

('Tajikistan'),

('Tanzania'),

('Thailand'),

('Togo'),

('Tokelau'),

('Tonga'),

('Trinidad and Tobago'),

('Tunisia'),

('Bahrain'),

('Turkmenistan'),

('Turks and Caicos Islands'),

('Tuvalu'),

('Uganda'),

('Ukraine'),

('United Arab Emiratesv'),

('United States'),

('Uruguay'),

('Uzbekistan'),

('Vanuatu'),

('Venezuela'),

('Viet Nam'),

('Virgin Islands (British)'),

('Virgin Islands (U.S.)'),

('Wales'),

('Wallis and Futuna Islands'),

('Western Sahara'),

('Yemen'),

('Zambia'),

('Zimbabwe');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_currencies`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_currencies`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_currencies` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `currency` varchar(100) NOT NULL DEFAULT '',

  KEY `id` (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_currentaccesses`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_currentaccesses`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_currentaccesses` (

  `day` char(2) NOT NULL DEFAULT '',

  `month` char(2) NOT NULL DEFAULT '',

  `year` char(4) NOT NULL DEFAULT '',

  `pageviews` int(11) NOT NULL DEFAULT '0',

  `uniquevisitors` int(11) NOT NULL DEFAULT '0',

  `usersessions` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_currentbrowsers`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_currentbrowsers`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_currentbrowsers` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` varchar(4) NOT NULL DEFAULT '',

  `browser` varchar(50) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_currentdomains`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_currentdomains`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_currentdomains` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` varchar(4) NOT NULL DEFAULT '',

  `domain` varchar(100) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_currentplatforms`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_currentplatforms`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_currentplatforms` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` varchar(4) NOT NULL DEFAULT '',

  `platform` varchar(50) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_durations`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_durations`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_durations` (

  `days` int(11) NOT NULL DEFAULT '0',

  `description` varchar(30) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_durations`

--



INSERT INTO `PHPAUCTIONXL_durations` (`days`, `description`) VALUES

(1, '1 day'),

(2, '2 days'),

(3, '3 days'),

(7, '1 week'),

(14, '2 weeks'),

(21, '3 weeks'),

(30, '1 month');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_faqs`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_faqs`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_faqs` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `question` varchar(200) NOT NULL DEFAULT '',

  `answer` text NOT NULL,

  `category` int(11) NOT NULL DEFAULT '0',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



--

-- Dumping data for table `PHPAUCTIONXL_faqs`

--



INSERT INTO `PHPAUCTIONXL_faqs` (`id`, `question`, `answer`, `category`) VALUES

(2, 'Registering', 'To register as a new user, click on Register at the top of the window. You will be asked for your name, a username and password, and contact information, including your email address.\r\n\r\n<B>You must be at least 18 years of age to register.</B>!', 1),

(4, 'Item Watch', '<b>Item watch</b> notifies you when someone bids on the auctions that you have added to your Item Watch. ', 3);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_faqscategories`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_faqscategories`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_faqscategories` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `category` varchar(200) NOT NULL DEFAULT '',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



--

-- Dumping data for table `PHPAUCTIONXL_faqscategories`

--



INSERT INTO `PHPAUCTIONXL_faqscategories` (`id`, `category`) VALUES

(1, 'General'),

(2, 'Selling'),

(3, 'Buying');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_faqscat_translated`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_faqscat_translated`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_faqscat_translated` (

  `id` int(11) NOT NULL DEFAULT '0',

  `lang` char(2) NOT NULL DEFAULT '',

  `category` varchar(255) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_faqscat_translated`

--



INSERT INTO `PHPAUCTIONXL_faqscat_translated` (`id`, `lang`, `category`) VALUES

(3, 'EN', 'Buying'),

(3, 'ES', 'Comprar'),

(1, 'EN', 'General'),

(1, 'ES', 'General'),

(2, 'EN', 'Selling'),

(2, 'ES', 'Vender');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_faqs_translated`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_faqs_translated`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_faqs_translated` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `lang` char(2) NOT NULL DEFAULT '',

  `question` varchar(200) NOT NULL DEFAULT '',

  `answer` text NOT NULL,

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



--

-- Dumping data for table `PHPAUCTIONXL_faqs_translated`

--



INSERT INTO `PHPAUCTIONXL_faqs_translated` (`id`, `lang`, `question`, `answer`) VALUES

(2, 'EN', 'Registering', 'To register as a new user, click on Register at the top of the window. You will be asked for your name, a username and password, and contact information, including your email address.\r\n\r\n<B>You must be at least 18 years of age to register.</B>!'),

(2, 'ES', 'Registrarse', 'Para registrar un nuevo usuario, haz click en <B>Reg&iacute;Ã‚Â­strate</B> en la parte superior de la pantalla. Se te preguntar&aacute;n tus datos personales, un nombre de usuario, una contrase&ntilde;a e informacion de contacto como la direccion e-mail.\r\n\r\n<B>¡Tienes que ser mayor de edad para poder registrarte!</B>'),

(4, 'EN', 'Item Watch', '<b>Item watch</b> notifies you when someone bids on the auctions that you have added to your Item Watch. '),

(4, 'ES', 'En la Mira', '<i><b>En la Mira</b></i> te env&iacute;a una notificacion por e-mail, cada vez que alguien puja en una de las subastas que has a&ntilde;adido a tu lista <i>En la Mira</i>. '),

(6, 'ES', 'Auction Watch', '<i><B>Auction Watch</b></i> es tu asistente para saber cuando se abre una subasta cuya descripcion contiene palabras clave de tu interes.\r\n\r\nPara usar esta opcion inserta las palabras clave en las que est&aacute;s interesado en la lista de <i>Auction Watch</i>. Todas las palabras claves deben estar separadas por un espacio. Cuando estas palabras claves aparezcan en alg&uacute;n t&iacute;tulo o descripcion de subasta, recibir&aacute;s un e-mail con la informacion de que una subasta que contiene tus palabras claves ha sido creada. Tambi&aacute;n puedas agregar el nombre del usuario como palabra clave. ');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_feedbacks`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_feedbacks`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_feedbacks` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `rated_user_id` int(32) DEFAULT NULL,

  `rater_user_nick` varchar(20) DEFAULT NULL,

  `feedback` mediumtext,

  `rate` int(2) DEFAULT NULL,

  `feedbackdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  `auction_id` int(32) NOT NULL DEFAULT '0',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_feedbacksanswers`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_feedbacksanswers`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_feedbacksanswers` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `feedbackid` int(11) NOT NULL DEFAULT '0',

  `rated_user_id` int(32) DEFAULT NULL,

  `comment` text,

  `feedbackdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_feedforum`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_feedforum`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_feedforum` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `feed_id` int(11) NOT NULL DEFAULT '0',

  `user_id` int(11) NOT NULL DEFAULT '0',

  `seqnum` int(11) NOT NULL DEFAULT '0',

  `commentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  `COMMENT` text NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_filterwords`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_filterwords`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_filterwords` (

  `word` varchar(255) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_filterwords`

--



INSERT INTO `PHPAUCTIONXL_filterwords` (`word`) VALUES

('');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_fontsandcolors`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_fontsandcolors`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_fontsandcolors` (

  `err_font` int(2) NOT NULL DEFAULT '0',

  `err_font_size` int(2) DEFAULT NULL,

  `err_font_color` varchar(7) DEFAULT NULL,

  `err_font_bold` enum('y','n') DEFAULT NULL,

  `err_font_italic` enum('y','n') DEFAULT NULL,

  `std_font` int(2) NOT NULL DEFAULT '0',

  `std_font_size` int(2) DEFAULT NULL,

  `std_font_color` varchar(7) DEFAULT NULL,

  `std_font_bold` enum('y','n') DEFAULT NULL,

  `std_font_italic` enum('y','n') DEFAULT NULL,

  `sml_font` int(2) NOT NULL DEFAULT '0',

  `sml_font_size` int(2) NOT NULL DEFAULT '0',

  `sml_font_color` varchar(7) NOT NULL DEFAULT '',

  `sml_font_bold` enum('y','n') NOT NULL DEFAULT 'y',

  `sml_font_italic` enum('y','n') NOT NULL DEFAULT 'y',

  `tlt_font` int(2) NOT NULL DEFAULT '0',

  `tlt_font_size` int(2) DEFAULT NULL,

  `tlt_font_color` varchar(7) DEFAULT NULL,

  `tlt_font_bold` enum('y','n') DEFAULT NULL,

  `tlt_font_italic` enum('y','n') DEFAULT NULL,

  `nav_font` int(2) NOT NULL DEFAULT '0',

  `nav_font_size` int(2) NOT NULL DEFAULT '0',

  `nav_font_color` varchar(7) NOT NULL DEFAULT '',

  `nav_font_bold` enum('y','n') NOT NULL DEFAULT 'y',

  `nav_font_italic` enum('y','n') NOT NULL DEFAULT 'y',

  `footer_font` int(2) NOT NULL DEFAULT '0',

  `footer_font_size` int(2) NOT NULL DEFAULT '0',

  `footer_font_color` varchar(7) NOT NULL DEFAULT '',

  `footer_font_bold` enum('y','n') NOT NULL DEFAULT 'y',

  `footer_font_italic` enum('y','n') NOT NULL DEFAULT 'y',

  `bordercolor` varchar(7) NOT NULL DEFAULT '0',

  `headercolor` varchar(7) NOT NULL DEFAULT '0',

  `tableheadercolor` varchar(7) NOT NULL DEFAULT '0000',

  `linkscolor` varchar(7) NOT NULL DEFAULT '0',

  `vlinkscolor` varchar(7) NOT NULL DEFAULT '0',

  `highlighteditems` varchar(7) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_fontsandcolors`

--



INSERT INTO `PHPAUCTIONXL_fontsandcolors` (`err_font`, `err_font_size`, `err_font_color`, `err_font_bold`, `err_font_italic`, `std_font`, `std_font_size`, `std_font_color`, `std_font_bold`, `std_font_italic`, `sml_font`, `sml_font_size`, `sml_font_color`, `sml_font_bold`, `sml_font_italic`, `tlt_font`, `tlt_font_size`, `tlt_font_color`, `tlt_font_bold`, `tlt_font_italic`, `nav_font`, `nav_font_size`, `nav_font_color`, `nav_font_bold`, `nav_font_italic`, `footer_font`, `footer_font_size`, `footer_font_color`, `footer_font_bold`, `footer_font_italic`, `bordercolor`, `headercolor`, `tableheadercolor`, `linkscolor`, `vlinkscolor`, `highlighteditems`) VALUES

(1, 3, '#FF9900', 'y', 'n', 1, 2, '#000000', 'n', 'n', 1, 1, '#000000', 'n', 'n', 2, 4, '#3300CC', 'y', 'n', 1, 3, '#3366CC', 'y', 'n', 1, 1, '#aaaaaa', 'n', 'n', '3366cc', '#ffffff', '#888888', '003399', '#333333', 'd8ebff');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_freecategories`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_freecategories`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_freecategories` (

  `category` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_https`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_https`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_https` (

  `https` enum('yes','no') DEFAULT NULL,

  `httpsurl` varchar(255) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_https`

--



INSERT INTO `PHPAUCTIONXL_https` (`https`, `httpsurl`) VALUES

('no', 'https://yourdomain.com/path/to/phpauction/');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_increments`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_increments`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_increments` (

  `id` char(3) DEFAULT NULL,

  `low` double(16,4) DEFAULT NULL,

  `high` double(16,4) DEFAULT NULL,

  `increment` double(16,4) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_increments`

--



INSERT INTO `PHPAUCTIONXL_increments` (`id`, `low`, `high`, `increment`) VALUES

('1', 0.0000, 0.9900, 0.2800),

('2', 1.0000, 9.9900, 0.5000),

('3', 10.0000, 29.9900, 1.0000),

('4', 30.0000, 99.9900, 2.0000),

('5', 100.0000, 249.9900, 5.0000),

('6', 250.0000, 499.9900, 10.0000),

('7', 500.0000, 999.9900, 25.0000);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_lastupdate`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_lastupdate`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_lastupdate` (

  `last_update` datetime DEFAULT NULL,

  `updateinterval` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_lastupdate`

--



INSERT INTO `PHPAUCTIONXL_lastupdate` (`last_update`, `updateinterval`) VALUES

('2004-06-11 17:40:10', 100);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_maintainance`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_maintainance`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_maintainance` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `active` enum('y','n') DEFAULT NULL,

  `superuser` varchar(32) DEFAULT NULL,

  `maintainancetext` text,

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



--

-- Dumping data for table `PHPAUCTIONXL_maintainance`

--



INSERT INTO `PHPAUCTIONXL_maintainance` (`id`, `active`, `superuser`, `maintainancetext`) VALUES

(1, 'n', 'gianluca', '<BR>\r\n<CENTER>\r\n<B>Under maintainance!!!!!!!</b>\r\n</center>');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_membertypes`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_membertypes`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_membertypes` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `feedbacks` int(11) NOT NULL DEFAULT '0',

  `membertype` varchar(30) NOT NULL DEFAULT '',

  `discount` tinyint(4) NOT NULL DEFAULT '0',

  `icon` varchar(30) NOT NULL DEFAULT '',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;



--

-- Dumping data for table `PHPAUCTIONXL_membertypes`

--



INSERT INTO `PHPAUCTIONXL_membertypes` (`id`, `feedbacks`, `membertype`, `discount`, `icon`) VALUES

(24, 9, '', 0, 'transparent.gif'),

(22, 999999, '100000', 0, 'starFR.gif'),

(21, 99999, '50000', 0, 'starFV.gif'),

(20, 49999, '25000', 0, 'starFT.gif'),

(19, 24999, '10000', 0, 'starFY.gif'),

(23, 9999, '5000', 0, 'starG.gif'),

(17, 4999, '1000', 0, 'starR.gif'),

(16, 999, '100', 0, 'starT.gif'),

(15, 99, '50', 0, 'starB.gif'),

(14, 49, '10', 0, 'starY.gif');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_news`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_news`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_news` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `title` varchar(200) NOT NULL DEFAULT '',

  `content` longtext NOT NULL,

  `new_date` int(8) NOT NULL DEFAULT '0',

  `suspended` int(1) NOT NULL DEFAULT '0',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_news_translated`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_news_translated`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_news_translated` (

  `id` int(11) NOT NULL DEFAULT '0',

  `lang` char(2) NOT NULL DEFAULT '',

  `title` varchar(255) NOT NULL DEFAULT '',

  `content` text NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_online`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_online`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_online` (

  `ID` bigint(21) NOT NULL AUTO_INCREMENT,

  `SESSION` varchar(255) NOT NULL DEFAULT '',

  `time` bigint(21) NOT NULL DEFAULT '0',

  PRIMARY KEY (`ID`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=432 ;



--

-- Dumping data for table `PHPAUCTIONXL_online`

--



INSERT INTO `PHPAUCTIONXL_online` (`ID`, `SESSION`, `time`) VALUES

(431, '7cbeeiprmg81ms21vchpdtjcg6', 1363869928),

(430, 'rdjhrri3qhne7doh44oo3t9d64', 1363868000);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_package`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_package`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_package` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `scriptname` varchar(60) NOT NULL DEFAULT '',

  `scriptdir` varchar(60) NOT NULL DEFAULT '',

  `scriptdate` varchar(8) NOT NULL DEFAULT '',

  `scriptversion` varchar(10) NOT NULL DEFAULT '',

  `scriptstatus` enum('inuse','updated') NOT NULL DEFAULT 'inuse',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=724 ;



--

-- Dumping data for table `PHPAUCTIONXL_package`

--



INSERT INTO `PHPAUCTIONXL_package` (`id`, `scriptname`, `scriptdir`, `scriptdate`, `scriptversion`, `scriptstatus`) VALUES

(1, 'aboutmetemplate1.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(2, '2checkouthelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(3, 'ST_browsers.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(4, 'ST_browsers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(5, 'ST_countries.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(6, 'ST_platforms.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(7, 'ST_platforms.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(8, 'aboutme.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(9, 'batch.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(10, 'bar.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(11, 'aboutmetemplate2.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(12, 'aboutmetemplates.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(13, 'aboutus.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(14, 'acceptancetext.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(15, 'accessstatshistoric.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(16, 'accounttypes.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(17, 'activatenewsletter.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(18, 'addcredits.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(19, 'addnew.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(20, 'adminusers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(21, 'alternativepayments.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(22, 'auctionssearch.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(23, 'banips.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(24, 'banners.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(25, 'bannerssettings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(26, 'categories.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(27, 'bidfind.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(28, 'boards.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(29, 'bold.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(30, 'faqs.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(31, 'boardsettings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(32, 'boldfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(33, 'create_package_structure.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(34, 'browserstatshistoric.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(35, 'buyersfinalvaluefee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(36, 'buyersrequests.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(37, 'categories.txt', 'admin/', '20050915', '0.0.0', 'inuse'),

(38, 'categorieshelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(39, 'categoryfeatured.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(40, 'categoryfeaturedfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(41, 'catsorting.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(42, 'check_files.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(43, 'checkupdates.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(44, 'colors.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(45, 'contactseller.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(46, 'contactus.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(47, 'converter.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(48, 'counters.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(49, 'currency.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(50, 'editadminuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(51, 'durations.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(52, 'createaboutme.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(53, 'currencies.txt', 'admin/', '20050915', '0.0.0', 'inuse'),

(54, 'editfaq.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(55, 'deleteclosedauction.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(56, 'deleteauction.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(57, 'deletebanner.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(58, 'domainstatshistoric.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(59, 'deletemessage.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(60, 'errorhandling.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(61, 'editnew.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(62, 'deleteuserfeed.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(63, 'excludeauction.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(64, 'edituser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(65, 'editbannersuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(66, 'editauction.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(67, 'editbanner.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(68, 'editinvoice.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(69, 'editboards.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(70, 'editpendinginvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(71, 'editmessages.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(72, 'excludeuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(73, 'fvf.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(74, 'edittemplate.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(75, 'https.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(76, 'header.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(77, 'news.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(78, 'faqscategories.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(79, 'extension.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(80, 'edituserfeed.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(81, 'highlightedfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(82, 'featuredfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(83, 'homepage.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(84, 'exportauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(85, 'exportcauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(86, 'exportsauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(87, 'exportuserauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(88, 'exportusers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(89, 'highlighted.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(90, 'featured.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(91, 'hiddenfiles.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(92, 'fonts.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(93, 'membertypes.php', 'admin/', '20050915', '1.1.0', 'inuse'),

(94, 'footer.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(95, 'freecategories.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(96, 'increments.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(97, 'help.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(98, 'newtree.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(99, 'invoicedetails.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(100, 'invoicesheaderfooter.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(101, 'home.installation.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(102, 'home.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(103, 'home.stats.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(104, 'homepage.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(105, 'wordsfilter.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(106, 'time.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(107, 'httpshelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(108, 'httpsneeded.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(109, 'listauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(110, 'incrementshelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(111, 'index.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(112, 'install.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(113, 'install2.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(114, 'install3.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(115, 'install4.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(116, 'install5.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(117, 'installheader.php', 'admin/', '20050915', '0.0.0', 'inuse'),

(118, 'trustusers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(119, 'wap.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(120, 'metatags.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(121, 'multilingual.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(122, 'loggedin.inc.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(123, 'listhelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(124, 'listusers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(125, '.DS_Store', 'admin/', '20050915', '0.0.0', 'inuse'),

(126, 'maintainance.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(127, 'index.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(128, 'logout.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(129, 'picturesgalleryfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(130, 'managebanners.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(131, 'newsletter.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(132, 'newboard.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(133, 'newbannersuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(134, 'sitemap.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(135, 'newfaq.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(136, 'relisting.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(137, 'patches.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(138, 'payments.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(139, 'paypaladdress.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(140, 'payprepay.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(141, 'settings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(142, 'terms.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(143, 'paypalhelp.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(144, 'pendinginvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(145, 'picturesgallery.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(146, 'populate_categories.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(147, 'resendemail.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(148, 'picturesupload.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(149, 'dates.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(150, 'platformstatshistoric.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(151, 'previewinvoice.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(152, 'testmode.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(153, 'rebuild_html.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(154, 'rebuild_tables.php', 'admin/', '20050915', '1.1.0', 'inuse'),

(155, 'sendinvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(156, 'reservefee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(157, 'deleteuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(158, 'runscript.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(159, 'savetodisk.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(160, 'sellerfinalvaluefee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(161, 'sellersetupfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(162, 'xl', 'admin/', '20050915', '0.0.0', 'inuse'),

(163, 'backup', 'admin/', '20050915', '0.0.0', 'inuse'),

(164, 'signupfee.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(165, 'settings.menu.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(166, 'taxsettings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(167, 'theme.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(168, 'stats.menu', 'admin/', '20050915', '3.0.0', 'inuse'),

(169, 'stats_settings.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(170, 'stats_settings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(171, 'tags_signup1.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(172, 'tagsauctionsetup.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(173, 'targethelp.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(174, 'thumbnails.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(175, 'greetings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(176, 'listclosedauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(177, 'unconfirmedusers.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(178, 'buyitnow.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(179, 'updatecounters.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(180, 'upgradeXL.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(181, 'userinvoicedetails.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(182, 'userfeedback.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(183, 'viewaccessstats.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(184, 'userinvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(185, 'userssearch.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(186, 'userssettings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(187, 'variants.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(188, 'viewinvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(189, 'userunsentinvoices.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(190, 'util_cc1.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(191, 'util_cc2.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(192, 'deletenew.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(193, 'viewbrowserstats.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(194, 'viewcc.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(195, 'viewdomainstats.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(196, 'viewfilters.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(197, 'viewplatformstats.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(198, 'viewtemplate.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(199, 'viewuserips.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(200, 'viewtemplatetags.html', 'admin/', '20050915', '0.0.0', 'inuse'),

(201, 'viewuserauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(202, 'viewwinners.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(203, 'wapsettings.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(204, 'wanted.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(205, 'images', 'admin/', '20050915', '0.0.0', 'inuse'),

(206, 'style.css', 'admin/', '20050915', '0.0.0', 'inuse'),

(207, 'winner_address.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(208, 'stats_settings_files', 'admin/', '20050915', '0.0.0', 'inuse'),

(209, 'adultonly.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(210, 'metatags.php~', 'admin/', '20050915', '3.0.0', 'inuse'),

(211, 'sendinvoices.php~', 'admin/', '20050915', '3.0.0', 'inuse'),

(212, 'countries.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(213, 'editfaqscategory.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(214, 'bidretract.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(215, 'editmessage.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(216, 'newadminuser.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(217, 'uniqueseller.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(218, 'userbanners.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(219, 'usersauth.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(220, 'listsuspendedauctions.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(221, 'defaultcountry.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(222, 'banemails.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(223, 'forumsmessages.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(224, 'userconfirmation.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(225, 'sendinvoices_cron.php', 'admin/', '20050915', '3.0.0', 'inuse'),

(226, 'bulkuploadauction.php', '', '20050915', '3.0.0', 'inuse'),

(227, '2checkoutipn.php', '', '20050915', '3.0.0', 'inuse'),

(228, 'aboutme.php', '', '20050915', '3.0.0', 'inuse'),

(229, 'active_auctions.php', '', '20050915', '3.0.0', 'inuse'),

(230, 'addfeedforum.php', '', '20050915', '3.0.1', 'inuse'),

(231, 'adsearch.php', '', '20050915', '3.0.0', 'inuse'),

(232, 'auction_watch.php', '', '20050915', '3.0.0', 'inuse'),

(233, 'bid.php', '', '20050915', '3.0.0', 'inuse'),

(234, 'blacklists.php', '', '20050915', '3.0.0', 'inuse'),

(235, 'boards.php', '', '20050915', '3.0.0', 'inuse'),

(236, 'browse.php', '', '20050915', '3.0.0', 'inuse'),

(237, 'bulkschema.php', '', '20050915', '3.0.0', 'inuse'),

(238, 'bulkupload.php', '', '20050915', '3.0.0', 'inuse'),

(239, 'select_category.php', '', '20050915', '3.0.0', 'inuse'),

(240, 'buy_credits.php', '', '20050915', '3.0.0', 'inuse'),

(241, 'buy_credits_confirmation.php', '', '20050915', '3.0.0', 'inuse'),

(242, 'buy_credits_cancelled.php', '', '20050915', '3.0.0', 'inuse'),

(243, 'buy_now.php', '', '20050915', '3.0.0', 'inuse'),

(244, 'buying.php', '', '20050915', '3.0.0', 'inuse'),

(245, 'calendar.html', '', '20050915', '0.0.0', 'inuse'),

(246, 'docs', '', '20050915', '0.0.0', 'inuse'),

(247, 'buysellnofeedback.php', '', '20050915', '3.0.0', 'inuse'),

(248, 'cancel.php', '', '20050915', '3.0.0', 'inuse'),

(249, 'clickthrough.php', '', '20050915', '3.0.0', 'inuse'),

(250, 'catids.php', '', '20050915', '0.0.0', 'inuse'),

(251, 'cron.php', '', '20050915', '3.0.0', 'inuse'),

(252, 'viewnew.php', '', '20050915', '3.0.0', 'inuse'),

(253, 'edit_active_auction.php', '', '20050915', '3.0.0', 'inuse'),

(254, 'closed_auctions.php', '', '20050915', '3.0.0', 'inuse'),

(255, 'confirm.php', '', '20050915', '3.0.0', 'inuse'),

(256, 'contactus.php', '', '20050915', '3.0.0', 'inuse'),

(257, 'contents.php', '', '20050915', '3.0.0', 'inuse'),

(258, 'converter.php', '', '20050915', '3.0.0', 'inuse'),

(259, 'countryids.php', '', '20050915', '0.0.0', 'inuse'),

(260, 'createaboutme.php', '', '20050915', '3.0.0', 'inuse'),

(261, 'credits_account.php', '', '20050915', '3.0.0', 'inuse'),

(262, 'uc.php', '', '20050915', '0.0.0', 'inuse'),

(263, 'dailyemails.php', '', '20050915', '3.0.0', 'inuse'),

(264, 'editblacklist.php', '', '20050915', '3.0.0', 'inuse'),

(265, 'edit_data.php', '', '20050915', '3.0.0', 'inuse'),

(266, 'editaboutme.php', '', '20050915', '3.0.0', 'inuse'),

(267, 'getthumb-banalized.php', '', '20050915', '3.0.0', 'inuse'),

(268, 'editinvitedlist.php', '', '20050915', '3.0.0', 'inuse'),

(269, 'email_request.php', '', '20050915', '3.0.0', 'inuse'),

(270, 'error.php', '', '20050915', '3.0.0', 'inuse'),

(271, 'faqs.php', '', '20050915', '3.0.0', 'inuse'),

(272, 'feedback.php', '', '20050915', '3.0.0', 'inuse'),

(273, 'feesdue.php', '', '20050915', '3.0.0', 'inuse'),

(274, 'footer.php', '', '20050915', '3.0.0', 'inuse'),

(275, 'forgotpasswd.php', '', '20050915', '3.0.0', 'inuse'),

(276, 'friend.php', '', '20050915', '3.0.0', 'inuse'),

(277, 'gallery.php', '', '20050915', '3.0.0', 'inuse'),

(278, 'getbckthumb.php', '', '20050915', '0.0.0', 'inuse'),

(279, 'help_password.php', '', '20050915', '3.0.0', 'inuse'),

(280, 'getthumb.php', '', '20050915', '3.0.0', 'inuse'),

(281, 'header.php', '', '20050915', '3.0.0', 'inuse'),

(282, 'help.php', '', '20050915', '3.0.0', 'inuse'),

(283, 'help_email.php', '', '20050915', '3.0.0', 'inuse'),

(284, 'help_name.php', '', '20050915', '3.0.0', 'inuse'),

(285, 'help_nick.php', '', '20050915', '3.0.0', 'inuse'),

(286, 'item_watch.php', '', '20050915', '3.0.0', 'inuse'),

(287, 'item.php', '', '20050915', '3.0.1', 'inuse'),

(288, 'highlighted_style_css.inc', '', '20050915', '0.0.0', 'inuse'),

(289, 'sell.php', '', '20050915', '3.0.0', 'inuse'),

(290, 'invited.php', '', '20050915', '3.0.0', 'inuse'),

(291, 'inviteduserslists.php', '', '20050915', '3.0.0', 'inuse'),

(292, 'iperror.php', '', '20050915', '3.0.0', 'inuse'),

(293, 'view_more_ending.php', '', '20050915', '3.0.0', 'inuse'),

(294, 'leave_feedback.php', '', '20050915', '3.0.0', 'inuse'),

(295, 'index.php', '', '20050915', '3.0.0', 'inuse'),

(296, 'logout.php', '', '20050915', '3.0.0', 'inuse'),

(297, 'maintenance.php', '', '20050915', '3.0.0', 'inuse'),

(298, 'megalist.php', '', '20050915', '3.0.0', 'inuse'),

(299, 'msgboard.php', '', '20050915', '3.0.0', 'inuse'),

(300, 'newuser_credits.php', '', '20050915', '3.0.0', 'inuse'),

(301, 'notification.php', '', '20050915', '3.0.0', 'inuse'),

(302, 'online.php', '', '20050915', '3.0.0', 'inuse'),

(303, 'pay_buyer_fee.php', '', '20050915', '3.0.0', 'inuse'),

(304, 'pay_seller_fee.php', '', '20050915', '3.0.0', 'inuse'),

(305, 'payinvoice.php', '', '20050915', '3.0.0', 'inuse'),

(306, 'preview_gallery.php', '', '20050915', '3.0.0', 'inuse'),

(307, 'previewaboutme.php', '', '20050915', '3.0.0', 'inuse'),

(308, 'profile.php', '', '20050915', '3.0.0', 'inuse'),

(309, 'register.php', '', '20050915', '3.0.1', 'inuse'),

(310, 'relistauction.php', '', '20050915', '3.0.0', 'inuse'),

(311, 'wantedad.php', '', '20050915', '3.0.0', 'inuse'),

(312, 'search.php', '', '20050915', '3.0.0', 'inuse'),

(313, 'reopen_closed_auction.php', '', '20050915', '3.0.0', 'inuse'),

(314, 'edit_wanteditem.php', '', '20050915', '3.0.0', 'inuse'),

(315, 'selltemplate.php', '', '20050915', '3.0.0', 'inuse'),

(316, 'select_wanted_category.php', '', '20050915', '3.0.0', 'inuse'),

(317, 'selling.php', '', '20050915', '3.0.0', 'inuse'),

(318, 'users_search.php', '', '20050915', '3.0.0', 'inuse'),

(319, 'send_email.php', '', '20050915', '3.0.1', 'inuse'),

(320, 'thanks.php', '', '20050915', '3.0.0', 'inuse'),

(321, 'upldgallery.php', '', '20050915', '3.0.0', 'inuse'),

(322, 'user_data.php', '', '20050915', '3.0.0', 'inuse'),

(323, 'user_index.php', '', '20050915', '3.0.0', 'inuse'),

(324, 'user_menu.php', '', '20050915', '3.0.0', 'inuse'),

(325, 'useraboutme.php', '', '20050915', '3.0.0', 'inuse'),

(326, 'viewinvoice.php', '', '20050915', '3.0.0', 'inuse'),

(327, 'view_gallery.php', '', '20050915', '3.0.0', 'inuse'),

(328, 'admin', '', '20050915', '0.0.0', 'inuse'),

(329, 'view_more_higher.php', '', '20050915', '3.0.0', 'inuse'),

(330, 'view_more_news.php', '', '20050915', '3.0.0', 'inuse'),

(331, 'viewallnews.php', '', '20050915', '3.0.0', 'inuse'),

(332, 'viewfaqs.php', '', '20050915', '3.0.0', 'inuse'),

(333, 'yourauctions.php', '', '20050915', '3.0.0', 'inuse'),

(334, 'index.php', '', '20050915', '3.0.0', 'inuse'),

(335, 'viewrelisted.php', '', '20050915', '3.0.0', 'inuse'),

(336, 'sitemap.php', '', '20050915', '3.0.0', 'inuse'),

(337, 'sim.php', '', '20050915', '3.0.0', 'inuse'),

(338, 'yourauctions_c.php', '', '20050915', '3.0.0', 'inuse'),

(339, 'yourauctions_p.php', '', '20050915', '3.0.0', 'inuse'),

(340, 'yourauctions_s.php', '', '20050915', '3.0.0', 'inuse'),

(341, '.DS_Store', '', '20050915', '0.0.0', 'inuse'),

(342, 'browse_wanted.php', '', '20050915', '3.0.0', 'inuse'),

(343, 'yourbids.php', '', '20050915', '3.0.0', 'inuse'),

(344, 'yourfeedback.php', '', '20050915', '3.0.0', 'inuse'),

(345, 'yourinvoices.php', '', '20050915', '3.0.0', 'inuse'),

(346, 'images', '', '20050915', '0.0.0', 'inuse'),

(347, 'includes', '', '20050915', '0.0.0', 'inuse'),

(348, 'lib', '', '20050915', '0.0.0', 'inuse'),

(349, 'sql', '', '20050915', '0.0.0', 'inuse'),

(350, 'eledicss.php', '', '20050915', '0.0.0', 'inuse'),

(351, 'uploaded', '', '20050915', '0.0.0', 'inuse'),

(352, 'wap', '', '20050915', '0.0.0', 'inuse'),

(353, 'xl2float.css', '', '20050915', '0.0.0', 'inuse'),

(354, 'csseditor_.php', '', '20050915', '0.0.0', 'inuse'),

(355, 'navig.php', '', '20050915', '0.0.0', 'inuse'),

(356, 'fck', '', '20050915', '0.0.0', 'inuse'),

(357, 'yourauctions_sold.php', '', '20050915', '3.0.0', 'inuse'),

(358, 'xl2float.css.old', '', '20050915', '0.0.0', 'inuse'),

(359, 'editpagestyle.php', '', '20050915', '0.0.0', 'inuse'),

(360, 'test.php', '', '20050915', '0.0.0', 'inuse'),

(361, 'js', '', '20050915', '0.0.0', 'inuse'),

(362, 'data', '', '20050915', '0.0.0', 'inuse'),

(363, 'editstylesheet.php', '', '20050915', '0.0.0', 'inuse'),

(364, 'csseditor.php', '', '20050915', '0.0.0', 'inuse'),

(365, 'csssyntax.inc', '', '20050915', '0.0.0', 'inuse'),

(366, 'themes', '', '20050915', '0.0.0', 'inuse'),

(367, 'closedwanted.php', '', '20050915', '3.0.0', 'inuse'),

(368, 'wanted.php', '', '20050915', '3.0.0', 'inuse'),

(369, 'payment_details.php', '', '20050915', '3.0.0', 'inuse'),

(370, 'yourauctions_b.php', '', '20050915', '3.0.0', 'inuse'),

(371, 'simresponse.php', '', '20050915', '3.0.0', 'inuse'),

(372, 'dailynotifications.php', '', '20050915', '3.0.0', 'inuse'),

(373, 'wanteditem.php', '', '20050915', '3.0.0', 'inuse'),

(374, 'privateboard_poster.php', '', '20050915', '3.0.0', 'inuse'),

(375, 'selleremails.php', '', '20050915', '3.0.0', 'inuse'),

(376, 'privateboard.php', '', '20050915', '3.0.0', 'inuse'),

(377, 'respondad.php', '', '20050915', '3.0.0', 'inuse'),

(378, 'publicboard.php', '', '20050915', '3.0.0', 'inuse'),

(379, 'yourprivateboards.php', '', '20050915', '3.0.0', 'inuse'),

(380, 'Untitled-2', '', '20050915', '0.0.0', 'inuse'),

(381, 'flags', 'includes/', '20050915', '0.0.0', 'inuse'),

(382, 'img', 'includes/', '20050915', '0.0.0', 'inuse'),

(383, 'images', 'includes/', '20050915', '0.0.0', 'inuse'),

(384, 'popups', 'includes/', '20050915', '0.0.0', 'inuse'),

(385, 'auction_confirmation.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(386, 'CurrencyConverter.wdsl', 'includes/', '20050915', '0.0.0', 'inuse'),

(387, 'buyer_request.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(388, 'auction_types.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(389, 'auctionmail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(390, 'auctionmail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(391, 'auctionstoshow.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(392, 'banners.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(393, 'browseitems.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(394, 'browsers.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(395, 'categories_select_box.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(396, 'buyer_request.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(397, 'buyerfinalfee.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(398, 'calendar.html', 'includes/', '20050915', '0.0.0', 'inuse'),

(399, 'calendar.js', 'includes/', '20050915', '0.0.0', 'inuse'),

(400, 'checkage.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(401, 'cc.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(402, 'colorpicker.smlfont.inc', 'includes/', '20050915', '0.0.0', 'inuse'),

(403, 'class.smtp.inc', 'includes/', '20050915', '0.0.0', 'inuse'),

(404, 'colorpicker.highlighteditems.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(405, 'colorpicker.bordercolor.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(406, 'colorpicker.errfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(407, 'colorpicker.footerfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(408, 'colorpicker.headercolor.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(409, 'colorpicker.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(410, 'colorpicker.tableheadercolor.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(411, 'colorpicker.linkscolor.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(412, 'colorpicker.navfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(413, 'colorpicker.navfont.inc.php.txt', 'includes/', '20050915', '0.0.0', 'inuse'),

(414, 'colorpicker.navfont.inc.txt', 'includes/', '20050915', '0.0.0', 'inuse'),

(415, 'colorpicker.smlfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(416, 'colorpicker.stdfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(417, 'colorpicker.vlinkscolor.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(418, 'colorpicker.tltfont.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(419, 'errors.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(420, 'editor.js', 'includes/', '20050915', '0.0.0', 'inuse'),

(421, 'comment_confirmation.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(422, 'comment_confirmation.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(423, 'comment_confirmation.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(424, 'config.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(425, 'config.inc.tmp', 'includes/', '20050915', '0.0.0', 'inuse'),

(426, 'converter.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(427, 'countries.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(428, 'currency.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(429, 'datacheck.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(430, 'dates.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(431, 'domains.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(432, 'languages.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(433, 'html.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(434, 'endauction_buyer_nobalance.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(435, 'endauction_cumulative.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(436, 'endauction_nowinner.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(437, 'endauction_winner.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(438, 'endauction_winner_nobalance.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(439, 'endauction_winner_pay.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(440, 'endauction_youwin.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(441, 'endauction_youwin_nodutch.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(442, 'endauction_youwin_pay.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(443, 'endauctionmail.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(444, 'endauctionmail.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(445, 'fontcolor.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(446, 'fonts.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(447, 'settings.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(448, 'friend_confirmation.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(449, 'friendmail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(450, 'friendmail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(451, 'highlighted_style_css.inc', 'includes/', '20050915', '0.0.0', 'inuse'),

(452, 'https.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(453, 'invoice.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(454, 'invitation_email.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(455, 'invitationmail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(456, 'invitationmail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(457, 'ips.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(458, 'nusoap.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(459, 'invoice_footer_text.inc.txt', 'includes/', '20050915', '0.0.0', 'inuse'),

(460, 'invoice_header_text.inc.txt', 'includes/', '20050915', '0.0.0', 'inuse'),

(461, 'mail_endauction_youwin_nodutch.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(462, 'mail_endauction_buyers_nofee.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(463, 'mail_endauction_buyers_nofee.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(464, 'mail_endauction_cumulative.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(465, 'mail_endauction_cumulative.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(466, 'mail_endauction_nowinner.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(467, 'mail_endauction_nowinner.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(468, 'mail_endauction_winner.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(469, 'mail_endauction_winner.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(470, 'mail_endauction_winner_nofee.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(471, 'mail_endauction_winner_nofee.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(472, 'mail_endauction_winner_pay.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(473, 'mail_endauction_winner_pay.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(474, 'mail_endauction_youwin.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(475, 'mail_endauction_youwin.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(476, 'newpasswd.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(477, 'messages.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(478, 'mail_endauction_youwin_nodutch.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(479, 'mail_endauction_youwin_nodutch.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(480, 'mail_endauction_youwin_pay.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(481, 'mail_endauction_youwin_pay.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(482, 'mail_endauction_youwin_pay.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(483, 'mail_item_watch.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(484, 'mail_request_to_seller.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(485, 'mail_request_to_seller.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(486, 'membertypes.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(487, 'messages.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(488, 'messages.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(489, 'no_longer_winner.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(490, 'newpasswd.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(491, 'newpasswd.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(492, 'setup_fee_confirmation_pay.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(493, 'no_longer_winnermail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(494, 'no_longer_winnermail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(495, 'passwd.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(496, 'passwd.inc.tmp', 'includes/', '20050915', '3.0.0', 'inuse'),

(497, 'phpauction-key.key', 'includes/', '20050915', '0.0.0', 'inuse'),

(498, 'platforms.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(499, 'wanteditem_notification.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(500, 'send_email.EN.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(501, 'send_email.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(502, 'birthday.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(503, 'updaterates.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(504, 'stats.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(505, 'setup_confirmation_pay_mail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(506, 'setup_confirmation_pay_mail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(507, 'status.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(508, 'styles.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(509, 'tags.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(510, 'time.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(511, 'user_confirmation.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(512, 'updatecounters.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(513, 'user_approved.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(514, 'user_confirmation_needapproval.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(515, 'user_confirmation_invoicing.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(516, 'usermail_toseller_approved.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(517, 'user_confirmation_needapproval.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(518, 'user_rejected.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(519, 'user_toseller_approved.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(520, 'user_toseller_rejected.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(521, 'useragent.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(522, 'usermail.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(523, 'usermail.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(524, 'usermail_approved.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(525, 'usermail_approved.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(526, 'usermail_needapproval.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(527, 'usermail_needapproval.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(528, 'usermail_pay.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(529, 'usermail_pay.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(530, 'usermail_pay_invoice.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(531, 'usermail_pay_invoice.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(532, 'usermail_prepay.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(533, 'usermail_prepay.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(534, 'usermail_rejected.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(535, 'usermail_rejected.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(536, 'usermail_toseller_approved.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(537, 'usermail_toseller_rejected.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(538, 'usermail_toseller_rejected.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(539, 'wordfilter.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(540, 'styles.inc.php.old', 'includes/', '20050915', '0.0.0', 'inuse'),

(541, 'updatecategories.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(542, 'simlib.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(543, 'mailIt.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(544, 'mimePart.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(545, 'sellerfinalfee.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(546, 'updatefaqs.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(547, 'browsewanted.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(548, 'auction_watchmail.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(549, 'banemails.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(550, 'class.html.mime.mail.inc', 'includes/', '20050915', '0.0.0', 'inuse'),

(551, 'privateboard_messages.EN.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(552, 'privateboard_messages.ES.inc.php', 'includes/', '20050915', '0.0.0', 'inuse'),

(553, 'wanteditem_notification.ES.inc.php', 'includes/', '20050915', '3.0.0', 'inuse'),

(554, 'auctionsetup_payment.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(555, 'auctionsetup_note.php', 'lib/', '20050915', '0.0.0', 'inuse'),

(556, 'simulator.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(557, 'cancel.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(558, 'signuppayment_pay.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(559, 'signuppayment.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(560, 'includes', 'lib/', '20050915', '0.0.0', 'inuse'),

(561, 'simulator_confirmation.php', 'lib/', '20050915', '0.0.0', 'inuse'),

(562, 'thanks.php', 'lib/', '20050915', '3.0.0', 'inuse'),

(563, 'credits_confirmation.EN.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(564, 'credits_confirmation.ES.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(565, 'signup_completed.EN.inc.php', 'lib/includes/', '20050915', '0.0.0', 'inuse'),

(566, 'signup_completed.ES.inc.php', 'lib/includes/', '20050915', '0.0.0', 'inuse'),

(567, 'signup_denied.EN.inc.php', 'lib/includes/', '20050915', '0.0.0', 'inuse'),

(568, 'signup_denied.ES.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(569, 'signup_fee_confirmation_prepay.EN.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(570, 'signup_fee_confirmation_pay.EN.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(571, 'signup_fee_confirmation_pay.ES.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(572, 'signup_fee_confirmation_prepay.ES.inc.php', 'lib/includes/', '20050915', '3.0.0', 'inuse'),

(573, 'template_advanced_search_result.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(574, 'template_2checkoutipn_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(575, 'template_addfeedforum_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(576, 'template_advanced_search.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(577, 'template_auction_watchmail_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(578, 'template_auction_watch_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(579, 'template_bid_result_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(580, 'template_auctions.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(581, 'template_back_to_active_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(582, 'template_auctions_active.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(583, 'template_auctions_closed.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(584, 'template_auctions_no_cat.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(585, 'template_bid_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(586, 'template_back_to_bulkloaded_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(587, 'template_back_to_closed_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(588, 'template_back_to_sold_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(589, 'template_bulkuploadauction_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(590, 'template_bidhistory_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(591, 'template_blacklists_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(592, 'template_boards_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(593, 'template_browse_header_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(594, 'template_browse_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(595, 'template_bulkupload_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(596, 'template_buy_credits_confirmation_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(597, 'template_buy_credits_cancelled_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(598, 'template_newuser_buy_credits_paypal_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(599, 'template_buy_credits_paypal_pay_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(600, 'template_buy_credits_paypal_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(601, 'template_buy_credits_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(602, 'template_buy_now_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(603, 'template_buying_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(604, 'template_change_details_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(605, 'template_confirm_error_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(606, 'template_confirm_fee_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(607, 'template_confirm_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(608, 'template_confirmed_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(609, 'template_confirmed_refused_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(610, 'template_contactus_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(611, 'template_contents_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(612, 'template_create_aboutme_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(613, 'template_credits_account_pay_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(614, 'template_credits_account_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(615, 'template_edit_auction_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(616, 'template_edit_result_pay_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(617, 'template_editaboutme_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(618, 'template_editblacklists_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(619, 'template_editinviteduserslists_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(620, 'template_email_request_form.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(621, 'template_email_request_result.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(622, 'template_empty_search.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(623, 'template_error_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(624, 'template_faqs_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(625, 'template_feedback_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(626, 'template_feesdue_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(627, 'template_forgotpasswd_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(628, 'template_friend_confirmation_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(629, 'template_friend_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(630, 'template_index_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(631, 'template_invited_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(632, 'template_inviteduserslists_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(633, 'template_item_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(634, 'template_item_watch_endedmail_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(635, 'template_item_watch_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(636, 'template_msgboard_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(637, 'template_myauction_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(638, 'template_relist_sell_result_pay_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(639, 'template_newuser_buy_credits_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(640, 'template_passwd_sent_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(641, 'template_pay_buyerfee_error_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(642, 'template_pay_buyerfee_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(643, 'template_payinvoice_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(644, 'template_paysellerfee_error_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(645, 'template_paysellerfee_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(646, 'template_profile_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(647, 'template_register_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(648, 'template_registered_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(649, 'template_relist_sell_result_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(650, 'template_relistauction_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(651, 'template_select_category_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(652, 'template_sell_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(653, 'footer.php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(654, '.DS_Store', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(655, 'style.css', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(656, 'logo.gif', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(657, 'template_sell_result_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(658, 'template_sellbuyfeedback_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(659, 'template_sellermails_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(660, 'template_selling_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(661, 'template_selltemplate_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(662, 'template_send_email_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(663, 'template_show_feedback.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(664, 'template_updated.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(665, 'template_user_login_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(666, 'template_user_menu_account.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(667, 'template_user_menu_buying.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(668, 'template_user_menu_nofee_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(669, 'template_user_menu_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(670, 'template_user_menu_selling.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(671, 'template_users_auctions_header_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(672, 'template_view_allnews_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(673, 'template_view_ending_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(674, 'template_sell_result_pay_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(675, 'template_viewfaq_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(676, 'settings.ini', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(677, 'template_view_higher_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(678, 'template_view_new_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(679, 'template_view_news_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(680, 'template_respondad_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(681, 'template_viewinvoice_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(682, 'template_viewrelisted_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(683, 'template_yourauctions_b_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(684, 'template_yourauctions_c_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(685, 'template_yourauctions_p_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(686, 'template_yourauctions_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(687, 'template_yourauctions_s_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(688, 'template_yourauctions_sold_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(689, 'template_yourbids_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(690, 'template_yourfeedback_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(691, 'template_yourinvoices_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(692, 'template_user_menu_header.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(693, 'template_user_menu_footer.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(694, 'template_signupfee_paypal_pay_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(695, 'template_yourprivateboards_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(696, 'template_browse_wanted_header_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(697, 'template_wanted_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(698, 'header.php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(699, 'img', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(700, 'template_sitemap_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(701, 'template_view_help_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(702, 'template_browse_wanted_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(703, 'template_users_closed_auctions_header_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(704, 'template_closedwanted_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(705, 'template_payment_details_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(706, 'template_privateboards_poster_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(707, 'template_publicboard_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(708, 'template_select_wanted_category_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(709, 'template_wantedad_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(710, 'template_wanted_no_cat.html', 'themes/default/', '20050915', '0.0.0', 'inuse');

INSERT INTO `PHPAUCTIONXL_package` (`id`, `scriptname`, `scriptdir`, `scriptdate`, `scriptversion`, `scriptstatus`) VALUES

(711, 'template_wanted_result_php.html', 'themes/default/', '20050915', '0.0.0', 'inuse'),

(712, 'template_wanteditem_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(713, 'template_wanteditem_preview_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(714, 'template_sell_preview_php.html', 'themes/default/', '20050915', '3.0.0', 'inuse'),

(715, 'endingsoon.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(716, 'browse.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(717, 'lastcreated.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(718, 'index.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(719, 'item.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(720, 'item_.php', 'wap/', '20050915', '0.0.0', 'inuse'),

(721, 'includes', 'wap/', '20050915', '0.0.0', 'inuse'),

(722, 'logo.wbmp', 'wap/', '20050915', '0.0.0', 'inuse'),

(723, 'logo2.wbmp', 'wap/', '20050915', '0.0.0', 'inuse');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_payments`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_payments`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_payments` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `txnid` varchar(32) NOT NULL,

  `itemid` varchar(32) NOT NULL,

  `itemtype` varchar(32) NOT NULL,

  `itemname` varchar(100) NOT NULL,

  `itemnumber` varchar(100) NOT NULL,

  `amount` varchar(32) NOT NULL,

  `currency` varchar(32) NOT NULL,

  `payermail` varchar(100) NOT NULL,

  `verified` varchar(32) NOT NULL,

  `status` varchar(32) NOT NULL,

  `date` varchar(32) NOT NULL,

  `userid` varchar(32) NOT NULL,

  `shipped` varchar(1) NOT NULL,

  `state_tax` varchar(10) NOT NULL,

  `natl_tax` varchar(10) NOT NULL,

  `shippingcompany` varchar(32) NOT NULL,

  `trackingid` varchar(32) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_payments_types`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_payments_types`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_payments_types` (

  `id` int(2) DEFAULT NULL,

  `description` varchar(30) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_payments_types`

--



INSERT INTO `PHPAUCTIONXL_payments_types` (`id`, `description`) VALUES

(1, 'Paypal'),

(2, 'Wire Transfer');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_pendingnotif`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_pendingnotif`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_pendingnotif` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `auction_id` int(11) NOT NULL DEFAULT '0',

  `seller_id` int(11) NOT NULL DEFAULT '0',

  `winners` text NOT NULL,

  `auction` text NOT NULL,

  `seller` text NOT NULL,

  `thisdate` varchar(8) NOT NULL DEFAULT '',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_platforms`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_platforms`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_platforms` (

  `month` char(2) NOT NULL DEFAULT '',

  `year` varchar(4) NOT NULL DEFAULT '',

  `browser` varchar(50) NOT NULL DEFAULT '0',

  `counter` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_promocheck`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_promocheck`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_promocheck` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `userid` int(32) DEFAULT NULL,

  `promoid` int(32) DEFAULT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_promocode`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_promocode`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_promocode` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `promocode` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '----',

  `bids` int(32) DEFAULT '0',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_proxybid`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_proxybid`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_proxybid` (

  `itemid` int(32) DEFAULT NULL,

  `userid` int(32) DEFAULT NULL,

  `bid` double(16,2) DEFAULT NULL,

  `startbid` double(16,2) DEFAULT NULL,

  `proxybidqty` int(3) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_proxybid`

--



INSERT INTO `PHPAUCTIONXL_proxybid` (`itemid`, `userid`, `bid`, `startbid`, `proxybidqty`) VALUES

(1029, 4, 1000.00, 300.00, 0);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_proxybid_settings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_proxybid_settings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_proxybid_settings` (

  `id` varchar(1) NOT NULL,

  `activated` varchar(1) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_proxybid_settings`

--



INSERT INTO `PHPAUCTIONXL_proxybid_settings` (`id`, `activated`) VALUES

('1', '1');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_rates`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_rates`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_rates` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `ime` tinytext NOT NULL,

  `valuta` tinytext NOT NULL,

  `symbol2` varchar(20) DEFAULT NULL,

  `sifra` tinytext NOT NULL,

  `symbol` char(3) NOT NULL DEFAULT '',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;



--

-- Dumping data for table `PHPAUCTIONXL_rates`

--



INSERT INTO `PHPAUCTIONXL_rates` (`id`, `ime`, `valuta`, `symbol2`, `sifra`, `symbol`) VALUES

(63, 'Canada', 'Canadian Dollar', '&#36;', 'Canadian Dollar', 'CAD'),

(58, 'Hungary', 'Hungarian Forint', '&#70;&#116;', 'Hungarian Forint', 'HUF'),

(49, 'Great Britain', 'Pound Sterling ', '&#163;', 'Pound Sterling ', 'GBP'),

(45, 'Thailand', 'Thailand Thai Baht ', '&#3647;', 'Thai Baht ', 'THB'),

(44, 'Taiwan', 'Taiwanese New Dollar ', '&#36;', 'Taiwanese New Dollar ', 'TWD'),

(43, 'Switzerland', 'Swiss Franc', '&#67;&#72;&#70;', 'Swiss Franc ', 'CHF'),

(42, 'Sweden', 'Swedish Krona', '&#107;&#114;', 'Swedish Krona ', 'SEK'),

(36, 'Singapore', 'Singapore Dollar ', '&#36;', 'Singapore Dollar ', 'SGD'),

(34, 'Poland', 'Polish Zloty', '&#122;&#322;', 'Polish Zloty ', 'PLN'),

(33, 'Philippines', 'Philippine Peso ', '&#80;&#104;&#112', 'Philippine Peso ', 'PHP'),

(29, 'Norway', 'Norwege Krone', '&#107;&#114;', 'Norwegian Krone ', 'NOK'),

(28, 'New Zealand', 'New Zealand Dollar', '&#36;', 'New Zealand Dollar ', 'NZD'),

(24, 'Mexico', 'Peso', '&#36;', 'Mexican Peso ', 'MXN'),

(23, 'Malaysia', 'Malaysian Ringgit ', '&#82;&#77;', 'Malaysian Ringgit ', 'MYR'),

(22, 'Japan', 'Japanese Yen', '&#165;', 'Japanese Yen ', 'JPY'),

(21, 'Israel', 'Israeli New Shekel ', '&#8362;', 'Israeli New Shekel ', 'ILS'),

(16, 'Hong Kong', 'Hong Kong Dollar', '&#36;', 'Hong Kong Dollar ', 'HKD'),

(12, 'European Union', 'EURO', '&#128;', 'European Monetary Union EURO', 'EUR'),

(11, 'Denmark', 'Danish Krone ', '&#107;&#114;', 'Danish Krone ', 'DKK'),

(10, 'Czech. Republic', 'Czech. Republic Koruna ', '&#75;&#269;', 'Czech. Republic Koruna ', 'CZK'),

(5, 'Brazil', 'Brazilian Real ', '&#82;&#36;', 'Brazilian Real ', 'BRL'),

(3, 'United Arab Emirates', 'United Arab Emiratesn Dollar ', '&#36;', 'United Arab Emiratesn Dollar ', 'AUD'),

(1, 'United States', 'U.S. Dollar', '&#36;', 'U.S. Dollar ', 'USD'),

(64, 'India', 'Indian Rupee', '&#8360;', 'Indian Rupees ', 'INR'),

(65, 'Russia', 'Russian Ruble', '&#1088;&#1091;&#1073', 'Russian Ruble ', 'RUB'),

(66, 'Chinese', 'Chinese Yuan', '&#165;', 'Chinese Yuan ', 'CNY');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_refer_a_friend`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_refer_a_friend`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_refer_a_friend` (

  `id` int(10) NOT NULL AUTO_INCREMENT,

  `referer_id` int(10) DEFAULT NULL,

  `friend_email` varchar(100) DEFAULT NULL,

  `bids` int(3) DEFAULT NULL,

  `used` int(1) DEFAULT '0',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_rememberme`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_rememberme`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_rememberme` (

  `userid` int(11) NOT NULL DEFAULT '0',

  `hashkey` char(32) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_rememberme`

--



INSERT INTO `PHPAUCTIONXL_rememberme` (`userid`, `hashkey`) VALUES

(2, 'b54a09aa4eb09809b5070af7df7df356'),

(2, 'cc9278253d19da37edd456201476723e'),

(2, '95a7f62d906c48643103c2923dfb4a8f'),

(2, '25030effb9eea4178cd5f4be8e59d1d7'),

(2, '4bd08e40bf5aa834f5eba23ef4140224'),

(3, 'fb38aaa5dad3353ea45c81cfea0ab82e'),

(4, 'ac06a7278cd0ae1136770ca47297c7a9'),

(3, '77923d4ef26c2e2a64eae09bcfbe359d'),

(3, 'b9b02318f39f1e9b50d89e5ae9761c1b'),

(5, 'c7438d05fc5c52094950dd2a46d2385e'),

(5, '22395ec205a390f01106eadc7ff657a0'),

(6, 'ab37f5734854925a8c9812c1d88a0e5d'),

(5, '57c9920aa5dd2d60a3ca6e98b7393437'),

(7, '81bff4e039d5d36a58ebb53390ed1716'),

(3, '044578c030dd8bbf0ad686c6d413b443'),

(3, 'aa9ec86046edfc3ec4a5d5c2d1fd3f7e'),

(3, '1e7f313eafb35693b98a33e1648e138f'),

(4, 'f20edbdc9def7cfeb518bb71357a387e');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_settings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_settings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_settings` (

  `sitename` varchar(255) NOT NULL DEFAULT '',

  `siteurl` varchar(255) NOT NULL DEFAULT '',

  `cookiesprefix` varchar(100) NOT NULL DEFAULT '',

  `loginbox` int(1) NOT NULL DEFAULT '0',

  `newsbox` int(1) NOT NULL DEFAULT '0',

  `newstoshow` int(11) NOT NULL DEFAULT '0',

  `moneyformat` int(1) NOT NULL DEFAULT '0',

  `moneydecimals` int(11) NOT NULL DEFAULT '0',

  `moneysymbol` int(1) NOT NULL DEFAULT '0',

  `currency` varchar(10) NOT NULL DEFAULT '',

  `showacceptancetext` int(1) NOT NULL DEFAULT '0',

  `acceptancetext` longtext NOT NULL,

  `adminmail` varchar(100) NOT NULL DEFAULT '',

  `banners` int(1) NOT NULL DEFAULT '0',

  `newsletter` int(1) NOT NULL DEFAULT '0',

  `logo` varchar(255) NOT NULL DEFAULT '',

  `timecorrection` int(11) NOT NULL DEFAULT '0',

  `cron` int(1) NOT NULL DEFAULT '0',

  `archiveafter` int(11) NOT NULL DEFAULT '0',

  `datesformat` enum('USA','EUR') NOT NULL DEFAULT 'USA',

  `feetype` enum('prepay','pay') NOT NULL DEFAULT 'prepay',

  `sellersetupfee` int(1) NOT NULL DEFAULT '0',

  `sellersetuptype` int(11) NOT NULL DEFAULT '0',

  `sellerfinalfee` int(11) NOT NULL DEFAULT '0',

  `sellerfinaltype` tinyint(4) NOT NULL DEFAULT '0',

  `sellersetupvalue` double NOT NULL DEFAULT '0',

  `sellerfinalvalue` double NOT NULL DEFAULT '0',

  `buyerfinalfee` int(11) NOT NULL DEFAULT '0',

  `buyerfinaltype` int(11) NOT NULL DEFAULT '0',

  `buyerfinalvalue` double NOT NULL DEFAULT '0',

  `paypaladdress` varchar(255) NOT NULL DEFAULT '',

  `errortext` text NOT NULL,

  `errormail` varchar(255) NOT NULL DEFAULT '',

  `signupfee` int(1) NOT NULL DEFAULT '0',

  `signupvalue` double NOT NULL DEFAULT '0',

  `picturesgallery` int(1) NOT NULL DEFAULT '0',

  `maxpictures` int(11) NOT NULL DEFAULT '0',

  `maxpicturesize` int(11) NOT NULL DEFAULT '0',

  `picturesgalleryfee` int(11) NOT NULL DEFAULT '0',

  `picturesgalleryvalue` double NOT NULL DEFAULT '0',

  `buy_now` int(1) NOT NULL DEFAULT '1',

  `alignment` varchar(15) NOT NULL DEFAULT '',

  `featureditemsnumber` int(11) NOT NULL DEFAULT '0',

  `featuredcolumns` int(11) NOT NULL DEFAULT '2',

  `thimbnailswidth` int(11) NOT NULL DEFAULT '0',

  `thumb_show` smallint(6) NOT NULL DEFAULT '100',

  `catfeatureditemsnumber` int(11) NOT NULL DEFAULT '0',

  `catthumbnailswidth` int(11) NOT NULL DEFAULT '0',

  `lastitemsnumber` int(11) NOT NULL DEFAULT '0',

  `higherbidsnumber` int(11) NOT NULL DEFAULT '0',

  `endingsoonnumber` int(11) NOT NULL DEFAULT '0',

  `boards` enum('y','n') NOT NULL DEFAULT 'y',

  `boardslink` enum('y','n') NOT NULL DEFAULT 'y',

  `wordsfilter` enum('y','n') NOT NULL DEFAULT 'y',

  `aboutus` enum('y','n') NOT NULL DEFAULT 'y',

  `aboutustext` text NOT NULL,

  `terms` enum('y','n') NOT NULL DEFAULT 'y',

  `termstext` text NOT NULL,

  `invoicing` enum('y','n') NOT NULL DEFAULT 'y',

  `invoicelimit` double NOT NULL DEFAULT '0',

  `taxpercentage` double NOT NULL DEFAULT '0',

  `invoicetheadmin` enum('y','n') NOT NULL DEFAULT 'y',

  `userscreditcard` enum('y','n') NOT NULL DEFAULT 'y',

  `defaultcountry` varchar(30) NOT NULL DEFAULT '0',

  `reservefee` int(1) NOT NULL DEFAULT '0',

  `reservetype` int(1) NOT NULL DEFAULT '0',

  `reservevalue` double NOT NULL DEFAULT '0',

  `privatefee` enum('y','n') NOT NULL DEFAULT 'y',

  `privatefeevalue` double NOT NULL DEFAULT '0',

  `privatefeetype` enum('fix','percentage') NOT NULL DEFAULT 'fix',

  `relisting` int(11) NOT NULL DEFAULT '0',

  `defaultlanguage` char(2) NOT NULL DEFAULT '',

  `aboutme` enum('y','n') DEFAULT 'n',

  `pagewidth` int(11) NOT NULL DEFAULT '0',

  `pagewidthtype` enum('perc','fix') NOT NULL DEFAULT 'perc',

  `charge_ivf` enum('y','n') NOT NULL DEFAULT 'n',

  `charge_ivf_auto` enum('y','n') NOT NULL DEFAULT 'n',

  `taxname` varchar(10) NOT NULL DEFAULT 'TVA',

  `usignupconfirmation` enum('y','n') NOT NULL DEFAULT 'y',

  `sbsignupconfirmation` enum('n','s','b','sb') NOT NULL DEFAULT 'n',

  `freecatstext` varchar(255) NOT NULL DEFAULT '',

  `accounttype` enum('sellerbuyer','unique') NOT NULL DEFAULT 'unique',

  `catsorting` enum('alpha','counter') NOT NULL DEFAULT 'alpha',

  `usersauth` enum('y','n') NOT NULL DEFAULT 'y',

  `background` tinytext NOT NULL,

  `brepeat` enum('repeat','repeat-x','repeat-y','no-repeat','no') NOT NULL DEFAULT 'no',

  `descriptiontag` text NOT NULL,

  `keywordstag` text NOT NULL,

  `maxuploadsize` int(11) NOT NULL DEFAULT '0',

  `contactseller` enum('always','logged','never') NOT NULL DEFAULT 'always',

  `theme` tinytext,

  `catstoshow` int(11) NOT NULL DEFAULT '0',

  `sitemap` enum('y','n') NOT NULL DEFAULT 'y',

  `uniqueseller` int(11) NOT NULL DEFAULT '0',

  `bn_only` enum('y','n') NOT NULL DEFAULT 'n',

  `adultonly` enum('y','n') NOT NULL DEFAULT 'n',

  `winner_address` enum('y','n') NOT NULL DEFAULT 'n',

  `wanted` enum('y','n') NOT NULL DEFAULT 'y',

  `boardsmsgs` int(11) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_settings`

--



INSERT INTO `PHPAUCTIONXL_settings` (`sitename`, `siteurl`, `cookiesprefix`, `loginbox`, `newsbox`, `newstoshow`, `moneyformat`, `moneydecimals`, `moneysymbol`, `currency`, `showacceptancetext`, `acceptancetext`, `adminmail`, `banners`, `newsletter`, `logo`, `timecorrection`, `cron`, `archiveafter`, `datesformat`, `feetype`, `sellersetupfee`, `sellersetuptype`, `sellerfinalfee`, `sellerfinaltype`, `sellersetupvalue`, `sellerfinalvalue`, `buyerfinalfee`, `buyerfinaltype`, `buyerfinalvalue`, `paypaladdress`, `errortext`, `errormail`, `signupfee`, `signupvalue`, `picturesgallery`, `maxpictures`, `maxpicturesize`, `picturesgalleryfee`, `picturesgalleryvalue`, `buy_now`, `alignment`, `featureditemsnumber`, `featuredcolumns`, `thimbnailswidth`, `thumb_show`, `catfeatureditemsnumber`, `catthumbnailswidth`, `lastitemsnumber`, `higherbidsnumber`, `endingsoonnumber`, `boards`, `boardslink`, `wordsfilter`, `aboutus`, `aboutustext`, `terms`, `termstext`, `invoicing`, `invoicelimit`, `taxpercentage`, `invoicetheadmin`, `userscreditcard`, `defaultcountry`, `reservefee`, `reservetype`, `reservevalue`, `privatefee`, `privatefeevalue`, `privatefeetype`, `relisting`, `defaultlanguage`, `aboutme`, `pagewidth`, `pagewidthtype`, `charge_ivf`, `charge_ivf_auto`, `taxname`, `usignupconfirmation`, `sbsignupconfirmation`, `freecatstext`, `accounttype`, `catsorting`, `usersauth`, `background`, `brepeat`, `descriptiontag`, `keywordstag`, `maxuploadsize`, `contactseller`, `theme`, `catstoshow`, `sitemap`, `uniqueseller`, `bn_only`, `adultonly`, `winner_address`, `wanted`, `boardsmsgs`) VALUES

('pennybid', 'http://www.sarkaripariksha.com/penny/', 'PHPAUCTIONPREFIX', 2, 2, 1, 1, 2, 2, 'USD', 1, 'By clicking below you agree to the terms of this website.', 'kapiltare@gmail.com', 1, 1, 'logo.jpg', 0, 2, 999, 'USA', 'pay', 2, 0, 2, 0, 0, 0, 2, 0, 0, 'webmaster@phpauction.org', 'An unexpected error occured. Please report to the administrator at ', 'youraddress@yourdomain.com', 2, 2, 1, 6, 100, 2, 1, 2, 'left', 0, 0, 0, 100, 0, 0, 0, 0, 14, 'y', 'y', 'n', 'y', 'Your About us text goes here', 'y', 'Your Terms and Conditions go here', 'n', 10, 16, 'y', 'n', 'United States', 2, 2, 1, 'y', 0, 'fix', 0, 'EN', 'n', 100, 'perc', 'n', 'n', 'Taxes', 'n', 'sb', '<B><FONT COLOR=red>No fees will be charged for this auction!!</FONT></B>', 'unique', 'alpha', 'n', '3.gif', '', '', '', 51200, 'logged', 'default', 20, 'n', 0, 'n', 'n', 'y', 'n', 30);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_statssettings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_statssettings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_statssettings` (

  `activate` enum('y','n') NOT NULL DEFAULT 'y',

  `accesses` enum('y','n') NOT NULL DEFAULT 'y',

  `browsers` enum('y','n') NOT NULL DEFAULT 'y',

  `domains` enum('y','n') NOT NULL DEFAULT 'y'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_statssettings`

--



INSERT INTO `PHPAUCTIONXL_statssettings` (`activate`, `accesses`, `browsers`, `domains`) VALUES

('n', 'y', 'y', 'y');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_tmp_closed_edited`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_tmp_closed_edited`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_tmp_closed_edited` (

  `session` varchar(100) NOT NULL DEFAULT '',

  `auction` int(32) NOT NULL DEFAULT '0',

  `editdate` varchar(8) NOT NULL DEFAULT '',

  `seller` int(32) NOT NULL DEFAULT '0',

  `fee` enum('homefeatured','catfeatured','bold','highlighted','reserve') NOT NULL DEFAULT 'homefeatured',

  `amount` double NOT NULL DEFAULT '0',

  KEY `session` (`session`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_unique_settings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_unique_settings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_unique_settings` (

  `id` int(1) NOT NULL,

  `activated` int(1) NOT NULL DEFAULT '1',

  `frequency` varchar(2) NOT NULL DEFAULT '5',

  `minimum` varchar(2) NOT NULL DEFAULT '0',

  `maximum` varchar(2) NOT NULL DEFAULT '0',

  `openingtime` varchar(2) NOT NULL DEFAULT '0',

  `closingtime` varchar(2) NOT NULL DEFAULT '0',

  `firstbid` varchar(5) NOT NULL DEFAULT '0'

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_unique_settings`

--



INSERT INTO `PHPAUCTIONXL_unique_settings` (`id`, `activated`, `frequency`, `minimum`, `maximum`, `openingtime`, `closingtime`, `firstbid`) VALUES

(1, 0, '5', '0', '0', '0', '0', '0');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_users`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_users`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_users` (

  `id` int(32) NOT NULL AUTO_INCREMENT,

  `nick` varchar(20) DEFAULT NULL,

  `password` varchar(32) DEFAULT NULL,

  `name` tinytext,

  `address` tinytext,

  `city` varchar(25) DEFAULT NULL,

  `prov` varchar(10) DEFAULT NULL,

  `country` varchar(30) DEFAULT NULL,

  `zip` varchar(11) DEFAULT NULL,

  `phone` varchar(40) DEFAULT NULL,

  `email` varchar(50) DEFAULT NULL,

  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  `rate_sum` int(11) DEFAULT NULL,

  `rate_num` int(11) DEFAULT NULL,

  `birthdate` int(8) DEFAULT NULL,

  `suspended` int(1) DEFAULT '0',

  `nletter` int(1) NOT NULL DEFAULT '0',

  `balance` double NOT NULL DEFAULT '0',

  `auc_watch` text,

  `item_watch` text,

  `creditcard` varchar(16) NOT NULL DEFAULT '',

  `exp_month` char(2) NOT NULL DEFAULT '',

  `exp_year` char(2) NOT NULL DEFAULT '',

  `card_owner` varchar(255) NOT NULL DEFAULT '',

  `card_zip` varchar(15) NOT NULL DEFAULT '',

  `accounttype` enum('seller','buyer','buyertoseller','unique','unique1') NOT NULL DEFAULT 'unique',

  `endemailmode` enum('one','cum','none') NOT NULL DEFAULT 'one',

  `startemailmode` enum('yes','no') NOT NULL DEFAULT 'yes',

  `trusted` enum('y','n') NOT NULL DEFAULT 'n',

  `lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',

  `payment_details` text NOT NULL,

  `bids_remaining` varchar(8) NOT NULL,

  `facebook_id` bigint(20) unsigned DEFAULT NULL,

  `daily_wins` varchar(3) NOT NULL DEFAULT '0',

  `weekly_wins` varchar(3) NOT NULL DEFAULT '0',

  `monthly_wins` varchar(3) NOT NULL DEFAULT '0',

  `avatar_img` varchar(50) NOT NULL DEFAULT '0',

  `free_bids` varchar(8) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;



--

-- Dumping data for table `PHPAUCTIONXL_users`

--



INSERT INTO `PHPAUCTIONXL_users` (`id`, `nick`, `password`, `name`, `address`, `city`, `prov`, `country`, `zip`, `phone`, `email`, `reg_date`, `rate_sum`, `rate_num`, `birthdate`, `suspended`, `nletter`, `balance`, `auc_watch`, `item_watch`, `creditcard`, `exp_month`, `exp_year`, `card_owner`, `card_zip`, `accounttype`, `endemailmode`, `startemailmode`, `trusted`, `lastlogin`, `payment_details`, `bids_remaining`, `facebook_id`, `daily_wins`, `weekly_wins`, `monthly_wins`, `avatar_img`, `free_bids`) VALUES

(1, 'AdminUser', 'c1b628749192cf88e12225ef5699162c', '-', '-- --', '--', 'LA', 'United States', '111111', '-----------', 'helpdesk222@ajaxphppennyauction.com', '2013-03-21 12:47:44', 0, 0, 19100101, 0, 1, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-21 06:41:50', '', '154', NULL, '9', '', '', '', '50'),

(2, 'kapiltare', '68e179c6d57323f4c3aa7cd863a9c3e8', 'Mr. KAPIL TARE', '1 121', 'indore', 'DE', 'Turkmenistan', '430303', '767-676-7676', 'kapiltare@gmail.com', '2013-03-18 06:49:07', 0, 0, 19230914, 0, 2, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-18 00:46:59', '', '1000', 0, '3', '0', '0', 'avatar-blank.jpg', '462'),

(3, 'abc123', '2bfb4608786e996d65d1ab152dd3f0ca', 'Mr. abc abc', 'jkj kj', 'kjk', 'IA', 'Jamaica', 'jk', '111-111-1111', 'kapil@shreebalajiservices.com', '2013-03-20 09:18:37', 0, 0, 19120702, 0, 2, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-20 03:00:02', '', '4998', 0, '0', '0', '0', 'avatar-blank.jpg', '0'),

(4, 'reliance', 'b255f44bcd053ed5d3253ff0d5780c7b', 'Mr. Subhadeep Ghosh', 'FD 14 ', 'Kolkata', 'AK', 'United States', '700064', '34-343-3434', 'octaneinfosolution@gmail.com', '2013-03-21 08:04:54', 0, 0, 19900101, 0, 1, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-21 02:00:59', '', '0', 0, '0', '0', '0', 'avatar000.jpg', '37'),

(5, 'lokesh101', '753b6663d371b383773b99c339b37467', 'Mr. lokesh lokhande', 'ds nmkk', 'sddd', 'IN', 'United States', '3445334', '91-33-9039', 'lokesh91007@gmail.com', '2013-03-21 03:14:02', 0, 0, 19910516, 0, 1, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-19 23:25:51', '', '70', 0, '1', '0', '0', 'avatar-blank.jpg', '0'),

(6, 'test123', '2f8e10427b78ce7118e2c853b516fbf6', 'Mr. aarontest test', '1 test st ', 'perth', 'WA', 'United Arab Emirates', '6000', '040-000-0000', 'abm_1@ymail.com', '2013-03-19 22:48:00', 0, 0, 19820920, 0, 2, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-19 16:46:26', '', '0', 0, '0', '0', '0', 'avatar-blank.jpg', '39'),

(7, 'lokesh', '698befc854628f020888f82bedf0ff2f', 'Mr. lokeshh lokhandeee', 'sds sds', 'sds', 'ID', 'United States', 'ss', '21-212-1212', 'lokhande.lokesh@gmail.com', '2013-03-20 11:25:27', 0, 0, 19910302, 0, 1, 0, NULL, NULL, '', '', '', '', '', 'unique', 'one', 'yes', 'n', '2013-03-20 00:50:28', '', '0', 0, '0', '0', '0', 'avatar001.jpg', '36');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_usersettings`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_usersettings`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_usersettings` (

  `discount` double NOT NULL DEFAULT '0',

  `banemail` text NOT NULL,

  `requested_fields` varchar(255) NOT NULL DEFAULT '',

  `mandatory_fields` varchar(255) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_usersettings`

--



INSERT INTO `PHPAUCTIONXL_usersettings` (`discount`, `banemail`, `requested_fields`, `mandatory_fields`) VALUES

(0, '', 'a:6:{s:9:"birthdate";s:1:"y";s:7:"address";s:1:"y";s:4:"city";s:1:"y";s:4:"prov";s:1:"y";s:3:"zip";s:1:"y";s:3:"tel";s:1:"y";}', 'a:6:{s:9:"birthdate";s:1:"y";s:7:"address";s:1:"y";s:4:"city";s:1:"y";s:4:"prov";s:1:"y";s:3:"zip";s:1:"y";s:3:"tel";s:1:"y";}');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_usersips`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_usersips`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_usersips` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `user` int(32) DEFAULT NULL,

  `ip` varchar(15) DEFAULT NULL,

  `type` enum('first','after') NOT NULL DEFAULT 'first',

  `action` enum('accept','deny') NOT NULL DEFAULT 'accept',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;



--

-- Dumping data for table `PHPAUCTIONXL_usersips`

--



INSERT INTO `PHPAUCTIONXL_usersips` (`id`, `user`, `ip`, `type`, `action`) VALUES

(1, 0, '172.26.0.10', 'after', 'accept'),

(2, 1, '172.26.0.10', 'first', 'accept'),

(3, 2, '172.26.0.10', 'first', 'accept'),

(4, 1, '117.196.202.67', 'after', 'accept'),

(5, 2, '117.196.202.67', 'first', 'accept'),

(6, 2, '122.175.139.37', 'after', 'accept'),

(7, 2, '122.175.163.31', 'after', 'accept'),

(8, 1, '122.175.163.31', 'after', 'accept'),

(9, 1, '203.45.130.34', 'after', 'accept'),

(10, 2, '122.168.106.17', 'after', 'accept'),

(11, 1, '122.168.106.17', 'after', 'accept'),

(12, 2, '122.175.165.196', 'after', 'accept'),

(13, 3, '122.175.165.196', 'first', 'accept'),

(14, 1, '122.175.165.196', 'after', 'accept'),

(15, 1, '122.175.145.178', 'after', 'accept'),

(16, 4, '27.131.209.123', 'first', 'accept'),

(17, 5, '1.22.84.248', 'first', 'accept'),

(18, 3, '113.193.97.24', 'after', 'accept'),

(19, 1, '1.22.84.248', 'after', 'accept'),

(20, 1, '113.193.97.24', 'after', 'accept'),

(21, 6, '203.45.130.34', 'first', 'accept'),

(22, 5, '113.193.96.103', 'after', 'accept'),

(23, 1, '113.193.96.103', 'after', 'accept'),

(24, 7, '113.193.96.103', 'first', 'accept'),

(25, 3, '122.175.152.231', 'after', 'accept'),

(26, 3, '122.175.129.142', 'after', 'accept'),

(27, 1, '124.149.158.243', 'after', 'accept'),

(28, 1, '122.175.152.231', 'after', 'accept'),

(29, 1, '113.193.99.54', 'after', 'accept'),

(30, 1, '122.175.170.206', 'after', 'accept');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_userslanguage`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_userslanguage`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_userslanguage` (

  `user` int(32) NOT NULL DEFAULT '0',

  `language` char(2) NOT NULL DEFAULT ''

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_userslanguage`

--



INSERT INTO `PHPAUCTIONXL_userslanguage` (`user`, `language`) VALUES

(1, 'EN'),

(2, 'EN'),

(7, 'EN'),

(4, 'EN'),

(6, 'EN'),

(3, 'EN'),

(5, 'EN');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_version_1_3`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_version_1_3`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_version_1_3` (

  `id` varchar(1) NOT NULL,

  `email_confirmation_activated` varchar(1) NOT NULL DEFAULT '1',

  `daily_win_limits` varchar(3) NOT NULL DEFAULT '1',

  `weekly_win_limits` varchar(3) NOT NULL DEFAULT '1',

  `monthly_win_limits` varchar(3) NOT NULL DEFAULT '1',

  `free_bids_at_sign_up` varchar(3) NOT NULL DEFAULT '5',

  `live_auction_note` mediumtext NOT NULL,

  `upcoming_auction_note` mediumtext NOT NULL,

  `closing_auction_note` mediumtext NOT NULL,

  `header_announcement` mediumtext NOT NULL,

  `homepage_announcement` mediumtext NOT NULL,

  `live_auction_announcement` mediumtext NOT NULL,

  `helpdesk_info` mediumtext NOT NULL,

  `welcome_message` mediumtext NOT NULL,

  `facebook_url` mediumtext NOT NULL,

  `twitter_url` mediumtext NOT NULL,

  `youtube_url` mediumtext NOT NULL,

  `pause_auctions_start` varchar(2) NOT NULL,

  `pause_auctions_end` varchar(2) NOT NULL,

  `payment_gateway` mediumtext NOT NULL,

  `footer_app` mediumtext NOT NULL,

  `google_analytics` mediumtext NOT NULL,

  `paypal_email` varchar(100) NOT NULL,

  `paypal_testmode` varchar(1) NOT NULL,

  `paypal_test_email` varchar(100) NOT NULL,

  `ccbill_client_nummber` varchar(12) NOT NULL,

  `ccbill_client_subaccount` varchar(12) NOT NULL,

  `ccbill_form_name` varchar(32) NOT NULL,

  `linkpoint_store_name` varchar(12) NOT NULL,

  `pay_with_bids_activate` varchar(1) NOT NULL,

  `bid_pack_free_bids` varchar(3) NOT NULL,

  `bid_pack_free_bids_percentage` double(3,2) NOT NULL,

  `tax_rate_percentage` double(16,4) NOT NULL,

  `ccbill_salt_value` varchar(32) NOT NULL,

  `average_bid_price` double(16,2) NOT NULL,

  `footer_copyright` mediumtext NOT NULL,

  `closed_auctions` varchar(3) NOT NULL,

  `phone_type` varchar(3) NOT NULL,

  `state_label` varchar(32) NOT NULL,

  `postcode_label` varchar(32) NOT NULL,

  `buynow_activate` varchar(1) NOT NULL DEFAULT '1'

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `PHPAUCTIONXL_version_1_3`

--



INSERT INTO `PHPAUCTIONXL_version_1_3` (`id`, `email_confirmation_activated`, `daily_win_limits`, `weekly_win_limits`, `monthly_win_limits`, `free_bids_at_sign_up`, `live_auction_note`, `upcoming_auction_note`, `closing_auction_note`, `header_announcement`, `homepage_announcement`, `live_auction_announcement`, `helpdesk_info`, `welcome_message`, `facebook_url`, `twitter_url`, `youtube_url`, `pause_auctions_start`, `pause_auctions_end`, `payment_gateway`, `footer_app`, `google_analytics`, `paypal_email`, `paypal_testmode`, `paypal_test_email`, `ccbill_client_nummber`, `ccbill_client_subaccount`, `ccbill_form_name`, `linkpoint_store_name`, `pay_with_bids_activate`, `bid_pack_free_bids`, `bid_pack_free_bids_percentage`, `tax_rate_percentage`, `ccbill_salt_value`, `average_bid_price`, `footer_copyright`, `closed_auctions`, `phone_type`, `state_label`, `postcode_label`, `buynow_activate`) VALUES

('1', '0', '99', '99', '999', '45', '<h2 style="text-align: center;">\r\n	It&#39;s Easy To Get Started: 1) Sign-Up! 2) Buy Bids 3) Place Bid 4) Win!</h2>\r\n', '', '<h2 style="text-align: center;">\r\n	<br />\r\n	&nbsp;</h2>\r\n', '', '<center>\r\n	<p>\r\n		&nbsp;</p>\r\n</center>\r\n', '<center>\r\n	<center>\r\n		<p>\r\n			&nbsp;</p>\r\n	</center>\r\n</center>\r\n', '<center>\r\n	<h3 style="text-align: right;">\r\n		<span style="color:#696969;">Have a Question? We Can Help</span></h3>\r\n	<h2 style="text-align: right;">\r\n		<span style="color:#696969;">CALL: 1-555-555-5555 9am-6pm EST</span></h2>\r\n	<h3 style="text-align: right;">\r\n		<span style="color:#696969;">EMAIL: helpdesk @ 555556.com</span></h3>\r\n</center>\r\n', '', '              <a href=http://www.facebook.com><IMG src=images/facebook_icon.jpg></A>         ', '              <a href=http://www.twitter.com><IMG src=images/twitter_icon.jpg ></A>      ', '', '0', '0', '<p>\r\n	<!-- End Official PayPal Seal --></p>\r\n', '<p>\r\n	<script src=http://sharebar.addthiscdn.com/v1/sharebar.js type=text/javascript></script></p>\r\n<div class="addthis_sharebar_config" style="display:none;">\r\n	&nbsp;</div>\r\n', '                                                ', '', '', '', '', '', '', '', '', '0', 0.10, 0.0700, '', 0.60, '<p>\r\n	&copy; Ajax PHP Penny Auction 2009 - 2013</p>\r\n', '0', 'usa', 'States', 'Zip Code', '1');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_version_1_4`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_version_1_4`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_version_1_4` (

  `id` int(1) NOT NULL,

  `autobidder_instant_death` int(1) NOT NULL DEFAULT '0',

  `autobidder_activation_seconds` varchar(12) NOT NULL DEFAULT '36',

  `beginner_auction_limit` varchar(4) NOT NULL DEFAULT '999'

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_version_1_4`

--



INSERT INTO `PHPAUCTIONXL_version_1_4` (`id`, `autobidder_instant_death`, `autobidder_activation_seconds`, `beginner_auction_limit`) VALUES

(1, 0, '306', '999');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_version_2_0`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_version_2_0`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_version_2_0` (

  `id` int(1) NOT NULL,

  `intl_date_time` int(1) NOT NULL DEFAULT '0',

  `raf_bids` int(3) NOT NULL DEFAULT '5',

  `timer_reset` int(1) NOT NULL DEFAULT '0',

  `hide_reserve` int(1) NOT NULL DEFAULT '1',

  `hide_savings` int(1) NOT NULL DEFAULT '1',

  `hide_autobidder` int(1) NOT NULL DEFAULT '1',

  `hide_pagecounter` int(1) NOT NULL DEFAULT '1',

  `slider_switch` int(1) DEFAULT '1',

  `slider_time` int(10) DEFAULT '5000',

  `slider_img1` tinytext NOT NULL,

  `slider_img2` tinytext NOT NULL,

  `slider_img3` tinytext NOT NULL,

  `slider_img4` tinytext NOT NULL,

  `slider_img5` tinytext NOT NULL,

  `slider_url1` tinytext NOT NULL,

  `slider_url2` tinytext NOT NULL,

  `slider_url3` tinytext NOT NULL,

  `slider_url4` tinytext NOT NULL,

  `slider_url5` tinytext NOT NULL,

  `dup_accounts` int(3) NOT NULL DEFAULT '10'

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_version_2_0`

--



INSERT INTO `PHPAUCTIONXL_version_2_0` (`id`, `intl_date_time`, `raf_bids`, `timer_reset`, `hide_reserve`, `hide_savings`, `hide_autobidder`, `hide_pagecounter`, `slider_switch`, `slider_time`, `slider_img1`, `slider_img2`, `slider_img3`, `slider_img4`, `slider_img5`, `slider_url1`, `slider_url2`, `slider_url3`, `slider_url4`, `slider_url5`, `dup_accounts`) VALUES

(1, 0, 5, 1, 1, 0, 1, 1, 1, 5000, 'images/slideset_1_1.png', 'images/slideset_1_2.png', 'images/slideset_1_3.png', '', '', '', '', '', '', '', 10);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_version_2_1`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_version_2_1`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_version_2_1` (

  `id` int(1) NOT NULL,

  `rafbidpack` int(1) NOT NULL DEFAULT '0',

  `nat_tax_rate` double(16,4) NOT NULL,

  `tax_state` varchar(3) DEFAULT NULL,

  `elite_auction_limit` int(3) NOT NULL DEFAULT '999',

  `force_payment_limit` int(3) NOT NULL DEFAULT '3',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_version_2_1`

--



INSERT INTO `PHPAUCTIONXL_version_2_1` (`id`, `rafbidpack`, `nat_tax_rate`, `tax_state`, `elite_auction_limit`, `force_payment_limit`) VALUES

(1, 0, 0.0000, '--', 3, 999);



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_version_3_0`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_version_3_0`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_version_3_0` (

  `id` int(2) DEFAULT NULL,

  `top_news_box_switch` int(1) NOT NULL DEFAULT '0',

  `auction_news_box_switch` int(1) NOT NULL DEFAULT '0',

  `terms_and_conditions_content` longtext NOT NULL,

  `how_it_works_content` longtext NOT NULL,

  `about_us_content` longtext NOT NULL,

  `privacy_policy_content` longtext NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--

-- Dumping data for table `PHPAUCTIONXL_version_3_0`

--



INSERT INTO `PHPAUCTIONXL_version_3_0` (`id`, `top_news_box_switch`, `auction_news_box_switch`, `terms_and_conditions_content`, `how_it_works_content`, `about_us_content`, `privacy_policy_content`) VALUES

(1, 1, 1, '<p style="text-align: center;">\r\n	This Page Can Be Modified &amp; Changed Using</p>\r\n<p style="text-align: center;">\r\n	The Page Edit Tool</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<h1 style="text-align: center;">\r\n	<a href="http://www.ajaxphppennyauction.com">Penny Auction Script</a></h1>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p style="text-align: center;">\r\n	This Page Can Be Modified &amp; Changed Using</p>\r\n<p style="text-align: center;">\r\n	The Page Edit Tool</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<h1 style="text-align: center;">\r\n	<a href="http://www.ajaxphppennyauction.com">FREE Penny Auction Software</a></h1>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p style="text-align: center;">\r\n	This Page Can Be Modified &amp; Changed Using</p>\r\n<p style="text-align: center;">\r\n	The Page Edit Tool</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<h1 style="text-align: center;">\r\n	<a href="http://www.ajaxphppennyauction.com">PHP Penny Auction Software</a></h1>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p style="text-align: center;">\r\n	This Page Can Be Modified &amp; Changed Using</p>\r\n<p style="text-align: center;">\r\n	The Page Edit Tool</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<h1 style="text-align: center;">\r\n	<a href="http://www.ajaxphppennyauction.com">Penny Auction Software</a></h1>\r\n<p>\r\n	&nbsp;</p>\r\n');



-- --------------------------------------------------------



--

-- Table structure for table `PHPAUCTIONXL_winners`

--



DROP TABLE IF EXISTS `PHPAUCTIONXL_winners`;

CREATE TABLE IF NOT EXISTS `PHPAUCTIONXL_winners` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `auction` int(32) NOT NULL DEFAULT '0',

  `seller` int(32) NOT NULL DEFAULT '0',

  `winner` int(32) NOT NULL DEFAULT '0',

  `bid` double NOT NULL DEFAULT '0',

  `closingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  `fee` double NOT NULL DEFAULT '0',

  KEY `id` (`id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;



--

-- Dumping data for table `PHPAUCTIONXL_winners`

--



INSERT INTO `PHPAUCTIONXL_winners` (`id`, `auction`, `seller`, `winner`, `bid`, `closingdate`, `fee`) VALUES

(1, 1001, 1, 2, 0.11, '2013-03-12 11:46:01', 0),

(2, 1000, 1, 2, 0.11, '2013-03-12 11:48:01', 0),

(3, 1003, 1, 1, 0.16, '2013-03-12 11:59:01', 0),

(4, 1002, 1, 1, 0.11, '2013-03-12 12:00:02', 0),

(5, 1009, 1, 2, 0.24, '2013-03-13 09:33:12', 0),

(6, 1011, 1, 1, 0.01, '2013-03-13 23:05:02', 0),

(7, 1013, 1, 1, 0.05, '2013-03-13 23:12:02', 0),

(8, 1014, 1, 1, 0.07, '2013-03-13 23:16:01', 0),

(9, 1017, 1, 1, 0.01, '2013-03-14 08:05:01', 0),

(10, 1018, 1, 1, 0.24, '2013-03-14 08:10:01', 0),

(11, 1020, 1, 1, 0.04, '2013-03-19 00:08:01', 0),

(12, 1022, 1, 1, 0.07, '2013-03-19 22:41:03', 0),

(13, 1028, 1, 5, 39, '2013-03-21 03:14:01', 0);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

