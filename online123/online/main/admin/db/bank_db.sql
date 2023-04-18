-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: nbbvicom.fatcowmysql.com
-- Generation Time: Feb 22, 2013 at 05:51 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `digital_signature` varchar(255) NOT NULL,
  `finger_print` varchar(255) NOT NULL,
  `scanning_documents` varchar(255) NOT NULL,
  `act_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `digital_signature`, `finger_print`, `scanning_documents`, `act_number`) VALUES
(1, 'images.jpg', 'finger_images.jpg', '49015216.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `type_name`) VALUES
(2, 'savings'),
(4, 'current');

-- --------------------------------------------------------

--
-- Table structure for table `act_holder_details`
--

DROP TABLE IF EXISTS `act_holder_details`;
CREATE TABLE IF NOT EXISTS `act_holder_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `cust_sex` varchar(255) NOT NULL,
  `cust_mail` varchar(255) NOT NULL,
  `cust_phone` varchar(255) NOT NULL,
  `cust_password` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `cust_bank_name` varchar(255) NOT NULL,
  `cust_branch_name` varchar(255) NOT NULL,
  `cust_act_number` varchar(255) NOT NULL,
  `cust_atc_type` varchar(255) NOT NULL,
  `ifcs_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `act_holder_details`
--

INSERT INTO `act_holder_details` (`id`, `cust_name`, `cust_sex`, `cust_mail`, `cust_phone`, `cust_password`, `cust_address`, `joining_date`, `cust_bank_name`, `cust_branch_name`, `cust_act_number`, `cust_atc_type`, `ifcs_code`) VALUES
(2, 'customer1', 'male', 'cust@gmail.com', '25863489', '123456', 'abc road', '02.19.2013', 'pnb', 'tala', 'NJ1S9cLm', 'savings', ''),
(3, 'customer2', 'male', 'cust2@gmail.com', '1259563', '123456', 'asfasf', '02.20.2013', 'sbi', 'tala', 'XgWr4sVF', 'current', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `bank_name`, `branch_name`, `branch_code`) VALUES
(2, 'ubi', 'parkstreet', '555asdf452s'),
(3, 'sbi', 'tala', 'ss9cs1564'),
(4, 'pnb', 'salt lake', '7953sdy'),
(5, 'pnb', 'parkstreet', '25sad25'),
(6, 'pnb', 'tala', 'asf87545');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_act_number` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `cust_act_number`, `card_number`, `card_type`, `date`, `status`, `message`) VALUES
(1, 'NJ1S9cLm', '5jwhnz', 'debit', '2013-02-21', 'issued', 'asfdasfd');

-- --------------------------------------------------------

--
-- Table structure for table `check_book`
--

DROP TABLE IF EXISTS `check_book`;
CREATE TABLE IF NOT EXISTS `check_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_act_number` varchar(255) NOT NULL,
  `cust_chkbook_number` varchar(255) NOT NULL,
  `isseu_date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `check_book`
--


-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

DROP TABLE IF EXISTS `cheque`;
CREATE TABLE IF NOT EXISTS `cheque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_act_number` varchar(255) NOT NULL,
  `receiver_act_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `chk_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`id`, `sender_act_number`, `receiver_act_number`, `date`, `chk_number`, `bank_name`, `branch_name`, `amount`, `status`) VALUES
(1, 'NJ1S9cLm', 'XgWr4sVF', '2013-02-21', '12579853', 'sbi', 'tala', '1000', 'cancled');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_number` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `debited` varchar(255) NOT NULL,
  `credited` varchar(255) NOT NULL,
  `present_balance` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `chk_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `act_number`, `ifsc_code`, `transaction_id`, `transaction_date`, `debited`, `credited`, `present_balance`, `description`, `chk_number`) VALUES
(1, 'NJ1S9cLm', '159753', 'adbt157', '2013-02-20', '', '10000', '10000', '', ''),
(34, 'NJ1S9cLm', '157953', 'pf81kh', '2013-02-20', '', '500', '8500', '', ''),
(33, 'XgWr4sVF', '', 'pf81kh', '2013-02-20', '500', '', '1500', '', ''),
(30, 'XgWr4sVF', '157953', 'cmhuex', '2013-02-20', '', '1000', '2000', '', ''),
(29, 'NJ1S9cLm', '', 'cmhuex', '2013-02-20', '1000', '', '8000', '', ''),
(26, 'XgWr4sVF', '157953', 's309yt', '2013-02-20', '', '1000', '1000', '', ''),
(25, 'NJ1S9cLm', '', 's309yt', '2013-02-20', '1000', '', '9000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_sex` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_sex`, `user_mail`, `user_phone`, `user_password`, `user_address`, `joining_date`) VALUES
(2, 'tester', 'male', 'tester@gmail.com', 'tester@gmail.com', '2589633574100', 'abc road', '02.19.2013');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
