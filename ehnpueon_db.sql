-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 07:16 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehnpueon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `finger_print` varchar(255) NOT NULL,
  `scanning_documents` varchar(255) NOT NULL,
  `act_number` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`id`, `type`) VALUES
(1, 'Active'),
(2, 'Blocked'),
(3, 'Suspended');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `type_name`) VALUES
(17, 'Certificates of Deposit'),
(19, 'Passbook Savings'),
(10, 'Premium'),
(11, 'Current'),
(12, 'Statement Savings'),
(13, 'Jumpstart Savings'),
(15, 'Savings'),
(16, 'EU,USD,GBP Domiciliary'),
(18, 'Private Wealth'),
(20, 'Diamond Checking');

-- --------------------------------------------------------

--
-- Table structure for table `act_holder_details`
--

CREATE TABLE `act_holder_details` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `currency` text NOT NULL,
  `cust_photo` varchar(255) NOT NULL,
  `cust_sex` varchar(255) NOT NULL,
  `cust_mail` varchar(255) NOT NULL,
  `cust_phone` varchar(255) NOT NULL,
  `cust_password` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_countrycode` int(11) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `cust_bank_name` varchar(255) NOT NULL,
  `cust_branch_name` varchar(255) NOT NULL,
  `cust_act_number` varchar(255) NOT NULL,
  `cust_atc_type` varchar(255) NOT NULL,
  `ifcs_code` varchar(255) NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `finger_print` varchar(255) NOT NULL,
  `scanning_documents` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bankidreq` tinyint(1) NOT NULL,
  `authcodereq` tinyint(1) NOT NULL,
  `clearancereq` tinyint(1) NOT NULL,
  `cemail` int(11) NOT NULL,
  `bemail` int(11) NOT NULL,
  `authemail` int(11) NOT NULL,
  `secemail` int(11) NOT NULL,
  `account_status` int(11) NOT NULL,
  `message` varchar(50) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `qid2` varchar(50) NOT NULL,
  `ans2` varchar(50) NOT NULL,
  `account_transfer` int(11) NOT NULL DEFAULT 1,
  `transfer_page_message` text NOT NULL,
  `cust_bank_account_status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `act_holder_details`
--

INSERT INTO `act_holder_details` (`id`, `cust_name`, `currency`, `cust_photo`, `cust_sex`, `cust_mail`, `cust_phone`, `cust_password`, `cust_address`, `cust_countrycode`, `joining_date`, `cust_bank_name`, `cust_branch_name`, `cust_act_number`, `cust_atc_type`, `ifcs_code`, `digital_signature`, `finger_print`, `scanning_documents`, `user_id`, `customer_id`, `bankidreq`, `authcodereq`, `clearancereq`, `cemail`, `bemail`, `authemail`, `secemail`, `account_status`, `message`, `qid`, `ans`, `qid2`, `ans2`, `account_transfer`, `transfer_page_message`, `cust_bank_account_status`) VALUES
(2, 'John Owen', 'USD', 'onli.png', 'male', 'paulunwin88@protonmail.com', '7605666056', '96895', '56 biscayen drive, fl', 1, '07.06.2020', '', 'Madrid ', '80235642', 'Diamond Checking', '', '', '', '', 208173746, 599305253, 0, 0, 0, 0, 0, 0, 0, 0, '', 'What is the name of your favorite book?', 'Richdad', 'What is the last name of your mother?', 'Maria', 1, '', 'Active'),
(4, 'Jean Alice Watson', 'USD', 'Jean.jpg', 'female', 'jean_watson@hotmail.com', '7595549755', '993968', '27 Orient Place, England UK', 44, '07.06.2020', '', 'Madrid ', '80235964', 'Diamond Checking', '', '', '', '', 873011905, 788609736, 0, 0, 0, 0, 0, 0, 0, 0, '', 'What is the name of your favorite book?', 'Voss', 'What is the name of your favorite book?', 'Voss', 1, '', 'Active'),
(9, 'Jane Erica Lehmkuhl', 'USD', '139641425_10158085622232909_7249372779065186328_n.jpg', 'female', 'ericajoneslehmkuhl@gmail.com', '+1(872)639-9694', '2233', '3271 NW 24th street Rd Miami Florida ', 1, '06.09.2021', '', 'Capital District  ', '00908447689', 'Certificates of Deposit', '', '', '', '', 918013310, 340409504, 0, 0, 0, 0, 0, 0, 0, 0, '', 'What is the last name of your mother?', 'Happiness ', 'what is the last name of your best friend?', 'John', 1, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'kurrupt80', 'info@mellatsaving.com');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `branch_add` varchar(255) NOT NULL,
  `available_type_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `branch_name`, `branch_code`, `ifsc_code`, `branch_add`, `available_type_id`) VALUES
(28, 'Capital District  ', '101', '101', 'Capital District  ', 'both'),
(29, 'Madrid ', '28020', '67-06', 'C/ Capitan Haya 1, 28020 Madrid', 'both');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `cust_act_number` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `check_book`
--

CREATE TABLE `check_book` (
  `id` int(11) NOT NULL,
  `cust_act_number` varchar(255) NOT NULL,
  `cust_chkbook_number` varchar(255) NOT NULL,
  `isseu_date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id` int(11) NOT NULL,
  `sender_act_number` varchar(255) NOT NULL,
  `receiver_act_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `chk_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_act_details`
--

CREATE TABLE `cust_act_details` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_act_no` varchar(30) NOT NULL,
  `cust_balance` int(11) NOT NULL,
  `cust_currency` varchar(10) NOT NULL,
  `led_bal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_act_details`
--

INSERT INTO `cust_act_details` (`id`, `cust_name`, `cust_act_no`, `cust_balance`, `cust_currency`, `led_bal`) VALUES
(1, 'John Owen', '80235642', 15000, 'USD', NULL),
(2, 'Jean Alice Watson', '80235964', 17037, 'USD', NULL),
(3, 'Ann DiGiacomo', '008767281409', 17625, 'USD', NULL),
(4, 'abc', '213124131412434', -12, 'USD', NULL),
(5, '', '213123123', 0, 'USD', NULL),
(6, '', '', 0, 'USD', NULL),
(7, 'Thomas Navic', '00908447689', 1500005, 'USD', NULL),
(8, '', 'asdsadasd', 12, 'USD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `reply_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `securityquestions`
--

CREATE TABLE `securityquestions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `securityquestions`
--

INSERT INTO `securityquestions` (`id`, `question`) VALUES
(1, 'What is the name of your favorite book?'),
(2, 'What is the last name of your mother?'),
(3, 'What is the name of your first pet?'),
(4, 'what is the last name of your best friend?');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `code` varchar(200) NOT NULL,
  `static` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tranferdetails`
--

CREATE TABLE `tranferdetails` (
  `id` varchar(20) NOT NULL,
  `b_account` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `act_number` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_date` date NOT NULL,
  `debited` varchar(255) NOT NULL,
  `credited` varchar(255) NOT NULL,
  `present_balance` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `chk_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `branch_add` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `number` varchar(100) NOT NULL,
  `bankid` varchar(100) NOT NULL,
  `authcode` varchar(100) NOT NULL,
  `security` varchar(100) NOT NULL,
  `stage` int(11) NOT NULL,
  `mini_statment` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `act_number`, `ifsc_code`, `transaction_id`, `transaction_date`, `debited`, `credited`, `present_balance`, `description`, `chk_number`, `status`, `branch_add`, `branch_name`, `cust_name`, `number`, `bankid`, `authcode`, `security`, `stage`, `mini_statment`) VALUES
(1, '80235642', '', 'kx9mgw', '2020-07-06', '', '15000', '15000', '*APPROVED INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(2, '80235964', '', 'vxmsqi', '2020-07-06', '', '17037', '17037', '*DIAMOND ACCOUNT SETUP FEE', '', 4, '', '', '', '', '', '', '', 0, 1),
(3, '008767281409', '', 'ivu7ys', '2020-08-03', '', '17625', '17625', '*DIAMOND ACCOUNT SETUP FEE.', '', 4, '', '', '', '', '', '', '', 0, 1),
(4, '213124131412434', '', 'iz5bcm', '2021-05-18', '', '121314', '121314', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(5, '213124131412434', '', 'q0az8h', '2021-05-18', '12', '', '0', 'Debited', '', 3, 'asdasdasd', 'asdasd', 'abc', '16829', '', '', '', 0, 1),
(7, '213123123', '33123123', 'q0az8h', '2021-05-18', '', '', '12', 'Credited', '', 3, 'asdasdasd', 'asdasd', 'asdasd', '', '', '', '', 0, 1),
(6, '213123123', '33123123', 'q0az8h', '2021-05-18', '', '12', '12', 'Credited', '', 3, 'asdasdasd', 'asdasd', 'asdasd', '', '', '', '', 0, 1),
(8, '00908447689', '', 'jx6e4b', '2021-05-19', '', '1,500,000,00', '1', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(9, '00908447689', '', '9ik33r', '2019-02-19', '', '1,500,000,000', '2', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(10, '00908447689', '', 'xdpda1', '2019-02-19', '', '1,500,000,000', '3', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(11, '213124131412434', '', 'ugwjl6', '2021-06-06', '', '1231231223', '1231231223', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(12, '213124131412434', '', 'xwp816', '2021-06-06', '12', '', '1231231211', 'Debited', '', 3, 'dasdasd', 'asdasdas', 'abc', '18105', '', '', '', 0, 1),
(13, 'asdsadasd', 'asdasdasd', 'xwp816', '2021-06-06', '', '12', '12', 'Credited', '', 3, 'dasdasd', 'asdasdas', 'adsasd', '', '', '', '', 0, 1),
(14, '00908447689', '', 'rusiug', '2021-06-09', '', '1500000', '1500003', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1),
(15, '00908447689', '', 'nw3wuj', '2021-06-09', '', '2,000,000.00', '1500005', 'APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R', '', 4, '', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_details`
--

CREATE TABLE `transfer_details` (
  `id` int(11) NOT NULL,
  `account` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `branch` varchar(40) DEFAULT NULL,
  `t_id` varchar(50) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `cust_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_details`
--

INSERT INTO `transfer_details` (`id`, `account`, `ifsc`, `branch`, `t_id`, `branch_name`, `cust_name`) VALUES
(5, '213123123', '33123123', 'asdasdasd', 'q0az8h', 'asdasd', 'asdasd'),
(12, 'asdsadasd', 'asdasdasd', 'dasdasd', 'xwp816', 'asdasdas', 'adsasd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_sex` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_accounts`
--

CREATE TABLE `users_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `birth` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `branch_p` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `currency` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `qid` text NOT NULL,
  `ans` text NOT NULL,
  `qid2` varchar(50) NOT NULL,
  `ans2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_accounts`
--

INSERT INTO `users_accounts` (`id`, `name`, `card_id`, `birth`, `mother_name`, `branch_p`, `email`, `address`, `city`, `country`, `phone_number`, `type`, `passport`, `currency`, `image`, `status`, `qid`, `ans`, `qid2`, `ans2`) VALUES
(1, 'nil', 'nil', 'nil', 'nil', 'nil', 'paulunwin88@gmail.com', 'nil', 'nil', 'nil', '890', 'Diamond Checking', '', 'USD', 'yui.png', 0, 'What is the name of your favorite book?', 'nil', 'What is the name of your first pet?', 'nil'),
(2, 'bh', '899', '89', 'hj', 'nil', 'paulunwin88@yahoo.com', 'nil', 'JKN', 'GH', '345', 'Certificates of Deposit', '', 'USD', 'yui.png', 0, 'What is the name of your favorite book?', 'OK', 'What is the name of your favorite book?', 'UI'),
(3, 'bjo', '890', '677', '8889', 'nil', 'paulunwin88@gmail.com', '899', '90p0', 'UK', '900', 'Diamond Checking', '', 'USD', 'onli.png', 0, 'What is the name of your favorite book?', 'KO', 'What is the name of your favorite book?', 'lo'),
(4, 'gha', 'nil', 'nil', 'nil', 'nil', 'paulunwin88@gmail.com', 'HHJ', 'NN', 'NN', '987', 'Certificates of Deposit', '', 'USD', 'onli.png', 0, 'What is the name of your favorite book?', 'NK', 'What is the name of your favorite book?', 'UI'),
(5, 'Jean Alice Watson', 'WK089761B', '09/10/51', 'Henderso', 'nil', 'jean_watson@hotmail.com', '27 Orient Place', 'Canterbury', 'Kent', '07595549755', 'Diamond Checking', '', 'USD', 'DRIVER LICENCE.jpg', 0, 'What is the name of your favorite book?', 'Voss', 'What is the name of your favorite book?', 'Voss'),
(6, 'nil', 'nil', 'il', 'nil', 'nil', 'knitting502@gmail.com', 'biNILnil', 'NIL', 'NIL', '+447710780988', 'Certificates of Deposit', '', 'USD', 'Sharon ID.jpg', 0, 'What is the name of your favorite book?', 'OK', 'What is the name of your favorite book?', 'HI'),
(7, 'Taryna Anne Bradford', 'WL976616B', '01011961', 'Walswort', 'nil', 'funky-t@hotmail.com', '30 Harlow Ave', 'Harrogate', 'United Kingdom', '07773326838', 'Diamond Checking', '', 'USD', 'Resized ID.jpg', 0, 'What is the name of your favorite book?', 'Rich Dad Poor Dad', 'what is the last name of your best friend?', 'Brown'),
(8, 'Lynda Voges', '5802090013081', '09.02.58', 'Greliche', 'nil', 'wordmechanix@gmail.com', '2 Rushbrook Road', 'Reading RG5 3DN', 'United Kingdom', '+447393934425', 'Current', '', 'USD', 'Voges passport 2018 (2).jpeg', 0, 'What is the name of your favorite book?', 'Pillars of the Earth', 'What is the name of your first pet?', 'Shandy'),
(9, 'Testing', 'nil', 'nil', 'nil', 'nil', 'paolodelpiero11@gmail.com', 'nil', 'nil', 'nil', '789', 'Certificates of Deposit', '', 'USD', 'resized.jpg', 0, 'What is the name of your favorite book?', 'nil', 'What is the name of your favorite book?', 'nil'),
(10, 'Miss Jedda Lorraine Toni Owusu', 'WM759084B', '07/05/62', 'Singleto', 'nil', 'jedda77@hotmail.com', '18 Highcliffe Road, Sneinton Dale', 'Nottingham, NG3 7DP', 'United Kingdom', '07806809154', 'Diamond Checking', '', 'USD', 'Passport Jedda.jpg', 0, 'what is the last name of your best friend?', 'mason', 'What is the name of your first pet?', 'perry'),
(11, 'Ann', 'DiGiacomo', '092253', 'Vassallo', 'nil', 'ajock9@comcast.net', '1914 Yorktown South ', ' Jeffersonville 19403', 'Pennsylvania 19403', '484-744-0232', 'Diamond Checking', '', 'USD', '9AA239A5-EF47-46BE-9E46-E0E927339850.jpeg', 0, 'what is the last name of your best friend?', 'Gavin', 'What is the last name of your mother?', 'Vassallo '),
(12, 'Susan Wylie', 'NA 70 78 45 A', '30061963', 'Carter', 'nil', 'suewylie@btinternet.com', 'Flat 3 5 Grosvenor Crescent', 'TN38 0BX', 'United Kingdom', '447446574015 ', 'Diamond Checking', '', 'USD', 'susan Licence latest .jpg', 0, 'What is the name of your favorite book?', 'Flowers in the attic', 'What is the name of your first pet?', 'Sophie ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `act_holder_details`
--
ALTER TABLE `act_holder_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cust_act_number` (`cust_act_number`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_book`
--
ALTER TABLE `check_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_act_details`
--
ALTER TABLE `cust_act_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `securityquestions`
--
ALTER TABLE `securityquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_details`
--
ALTER TABLE `transfer_details`
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_accounts`
--
ALTER TABLE `users_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `act_holder_details`
--
ALTER TABLE `act_holder_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_book`
--
ALTER TABLE `check_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_act_details`
--
ALTER TABLE `cust_act_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
