-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 02:20 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `member_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `bid_time` datetime NOT NULL,
  `bidding_increment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`member_id`, `item_id`, `bid_time`, `bidding_increment`) VALUES
(4, 52, '2015-01-22 14:45:10', 2),
(5, 45, '2015-01-22 13:18:49', 8),
(5, 52, '2015-01-22 14:45:55', 3),
(6, 34, '2015-01-22 13:14:21', 10),
(6, 44, '2015-01-22 13:16:18', 56);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_category` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin7 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_category`) VALUES
(1, 'Laptops', NULL),
(2, 'Comp. Accessories', NULL),
(3, 'Personal Accessories', NULL),
(4, 'Media', NULL),
(5, 'Sports', NULL),
(11, 'HP', 1),
(12, 'DELL', 1),
(13, 'Sony', 1),
(21, 'Mouse', 2),
(22, 'Keyboard', 2),
(23, 'Headphone', 2),
(24, 'Printers', 2),
(25, 'Inkjet', 2),
(26, 'Laser', 2),
(31, 'Wallets	', 3),
(32, 'Handbags	', 3),
(33, 'Watches	', 3),
(41, 'Books', 4),
(42, 'DVDs', 4),
(51, 'Tennis', 5),
(52, 'FootBall', 5);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sold_to_id` int(10) DEFAULT NULL,
  `buyer_rating` int(1) DEFAULT NULL,
  `seller_rating` int(1) DEFAULT NULL,
  `buyer_comment` varchar(255) DEFAULT NULL,
  `seller_comment` varchar(255) DEFAULT NULL,
  `placed_by_id` int(10) NOT NULL,
  `starting_bid_price` float NOT NULL,
  `current_bid_price` float NOT NULL,
  `auction_start_date` datetime NOT NULL,
  `auction_end_date` datetime NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin7 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `description`, `sold_to_id`, `buyer_rating`, `seller_rating`, `buyer_comment`, `seller_comment`, `placed_by_id`, `starting_bid_price`, `current_bid_price`, `auction_start_date`, `auction_end_date`, `category_id`) VALUES
(33, 'HP 530 KP464AA ( 15.4 inch, 80 GB)', '', NULL, NULL, NULL, NULL, NULL, 4, 2500, 2500, '2015-01-22 12:54:57', '2015-01-24 11:11:00', 11),
(34, 'Corsair Vengeance M65', '', 6, NULL, NULL, NULL, NULL, 4, 45, 55, '2015-01-22 12:55:29', '2015-01-24 14:22:00', 21),
(35, 'headphone beats blutooth', '', NULL, NULL, NULL, NULL, NULL, 4, 50, 50, '2015-01-22 12:56:17', '2015-01-24 15:33:00', 23),
(36, 'Stereo Headset for the Samsung Galaxy Ace 3', '', NULL, NULL, NULL, NULL, NULL, 4, 110, 110, '2015-01-22 12:56:54', '2015-01-29 14:22:00', 23),
(37, 'Babolat Pure Drive Roddick Plus 2013', '', NULL, NULL, NULL, NULL, NULL, 4, 3300, 3300, '2015-01-22 12:57:28', '2015-01-29 14:22:00', 51),
(38, 'Casio MTP-1096Q-7A For Men (Analog, Casual Watch)', '', NULL, NULL, NULL, NULL, NULL, 4, 10000, 10000, '2015-01-22 12:57:57', '2015-01-29 11:11:00', 33),
(40, 'hp Compaq 8510p', '', NULL, NULL, NULL, NULL, NULL, 5, 1500, 1500, '2015-01-22 13:01:08', '2015-01-31 14:22:00', 11),
(41, 'Sony E Series E14 (Black) Laptop Keyboard', '', NULL, NULL, NULL, NULL, NULL, 5, 90, 90, '2015-01-22 13:01:32', '2015-02-24 14:22:00', 22),
(42, 'Refillable Ink Cartridge compatible with HP 82 Cya', '', NULL, NULL, NULL, NULL, NULL, 5, 45, 45, '2015-01-22 13:01:56', '2015-01-26 02:14:00', 25),
(43, 'Dunlop FORT ELITE Balls', '', NULL, NULL, NULL, NULL, NULL, 5, 100, 100, '2015-01-22 13:02:31', '2015-01-31 14:22:00', 51),
(44, 'adidas 11Pro SL (Core Black/White)', '', 6, NULL, NULL, NULL, NULL, 5, 1000, 1056, '2015-01-22 13:03:01', '2015-01-23 14:22:00', 52),
(45, 'Inspiron 17R - 5720', '', 5, NULL, NULL, NULL, NULL, 6, 2500, 2508, '2015-01-22 13:04:04', '2015-01-27 14:22:00', 12),
(46, 'HP 12A Black LaserJet Toner Cartridge', '', NULL, NULL, NULL, NULL, NULL, 6, 250, 250, '2015-01-22 13:04:29', '2015-01-22 14:22:00', 26),
(47, 'Tommy Hilfiger Mens Ranger Passcase / Brown', '', NULL, NULL, NULL, NULL, NULL, 6, 250, 250, '2015-01-22 13:04:48', '2015-01-23 14:22:00', 31),
(48, 'Sony VAIO VPCEB1S8E/WI', '', NULL, NULL, NULL, NULL, NULL, 6, 4000, 4000, '2015-01-22 13:05:20', '2015-01-22 23:11:00', 13),
(49, 'The tale of two cities shakespeare', '', NULL, NULL, NULL, NULL, NULL, 6, 88, 88, '2015-01-22 13:05:53', '2015-01-23 11:11:00', 41),
(50, 'ULTRA SLIM WALLET CASE', '', NULL, NULL, NULL, NULL, NULL, 6, 450, 450, '2015-01-22 13:06:15', '2015-01-27 14:22:00', 31),
(51, 'Logitech G602 Wireless Gaming Mouse', '', NULL, NULL, NULL, NULL, NULL, 6, 25, 25, '2015-01-22 13:06:37', '2015-01-26 14:22:00', 21),
(52, 'Database systems El masry', '', 5, 0, 8, '', 'Good', 6, 75, 80, '2015-01-22 13:07:07', '2015-01-22 14:51:00', 41),
(53, 'Calvin Klein K2G2G1C3 For Men', '', NULL, NULL, NULL, NULL, NULL, 6, 9000, 9000, '2015-01-22 13:07:46', '2015-01-22 21:09:00', 33);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bank` int(12) NOT NULL,
  `rtn` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin7 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `pass`, `fname`, `lname`, `home_address`, `shipping_address`, `phone`, `bank`, `rtn`) VALUES
(1, 'ahmed@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Ahmed', 'Nabeel', 'Sedi Gaber', 'Smouha', '01077846513', 1234543221, 2147483647),
(2, 'Gasser@live.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Gasser', 'Montaser', 'Bokla', 'Bokla', '4567892', 1234543777, 773453477),
(3, 'Nader@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mohamed', 'Nader', 'Sedi Gaber', 'Sedi Gaber', '01029475613', 2147483647, 234775716),
(4, 'user01@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Chris2', 'Econn2', 'add2', 'add1', '11', 11111, 111111),
(5, 'user02@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jonathan', 'Kalbfled', 'add3', 'add2', '22', 222222, 222222),
(6, 'user03@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jerome', 'Porter', 'add4', 'add3', '33', 333333, 33333333),
(7, 'user04@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'John', 'Adams', 'add5', 'add4', '44', 44444, 44444),
(8, 'user05@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Doug', 'Willbanks', 'add6', 'add5', '55', 555555, 55555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
 ADD PRIMARY KEY (`member_id`,`item_id`,`bid_time`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`), ADD KEY `parent_category` (`parent_category`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`), ADD KEY `sold_to_id` (`sold_to_id`), ADD KEY `placed_by_id` (`placed_by_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`sold_to_id`) REFERENCES `member` (`member_id`),
ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`placed_by_id`) REFERENCES `member` (`member_id`),
ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
