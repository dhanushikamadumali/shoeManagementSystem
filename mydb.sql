-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 05:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Sandals', 0),
(2, 'Flip Flops', 0),
(3, 'Flats', 0),
(4, 'Heels', 0),
(5, 'Shoe', 0),
(6, 'cover shoes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(45) NOT NULL,
  `collection_status` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `collection_status`, `discount`) VALUES
(1, 'Men', 1, 10),
(2, 'Women', 1, 15),
(3, 'Kids', 1, 20),
(4, 'other', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `collection_has_category`
--

CREATE TABLE `collection_has_category` (
  `collection_collection_id` int(11) NOT NULL,
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection_has_category`
--

INSERT INTO `collection_has_category` (`collection_collection_id`, `category_category_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `collection_has_sub_category`
--

CREATE TABLE `collection_has_sub_category` (
  `collection_collection_id` int(11) NOT NULL,
  `sub_category_sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection_has_sub_category`
--

INSERT INTO `collection_has_sub_category` (`collection_collection_id`, `sub_category_sub_category_id`) VALUES
(1, 1),
(1, 2),
(1, 13),
(1, 16),
(1, 17),
(2, 3),
(2, 4),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 14),
(3, 5),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_nic` varchar(45) NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  `customer_con1` varchar(45) NOT NULL,
  `customer_con2` varchar(45) NOT NULL,
  `customer_image` varchar(45) NOT NULL,
  `customer_gender` int(11) NOT NULL,
  `c_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_nic`, `customer_address`, `customer_con1`, `customer_con2`, `customer_image`, `customer_gender`, `c_status`) VALUES
(1, 'working customer', '', '', '', '', '', '', '', 0, 1),
(2, 'dhanushika', 'madumali', 'dhanushika76@gmail.com', '955943171v', 'No 41,Samagi mawatha,Akuressa,Galle', '0413423034', '0714116861', 'defaultImage.jpg', 0, 0),
(3, 'Janith ', 'Chathuranga', 'Janith@gmail.com', '972163337v', 'No 09,Fonseka Mawatha,Pliyandala.', '0412226669', '0715689234', '1609410650_pp.jpg', 1, 0),
(4, 'Harshani', 'Priyangika', 'harshani@gmail.com', '934567892v', 'No 07,Araliya Uyana Road,Baddegama,Galle', '0413645601', '0786345678', 'defaultImage.jpg', 0, 0),
(5, 'Sanduni', 'Sithara', 'sanduni@gmail.com', '926369457v', 'No 08,wakwalla Road,Galle', '0415689145', '0767258932', 'defaultImage.jpg', 0, 0),
(6, 'Shehani', 'Perera', 'shehani@gmail.com', '984567531v', 'No 9,Kalidasa Road,Matara.', '0115678943', '0773125467', '1611515323_pp (3).jpg', 1, 0),
(7, 'Ashka', 'kulasuriya', 'Aska@gmail.com', '957845631v', 'No 03,Pliyandala Road,Boralesgamuwa', '0114567231', '0782266850', 'defaultImage.jpg', 0, 0),
(8, 'Imalka', 'Chathumali', 'imalka@gmail.com', '981034789v', 'No 03,Ganemulla Road,Gampaha', '0413423055', '0714233850', '1619755540_5cb8b133b8342c1b45130629.jpg', 0, 0),
(9, 'shehani ', 'perera', 'perera@gmail.com', '209636999v', 'rathanapura', '0413423035', '0782266888', 'defaultImage.jpg', 0, 0),
(10, 'kasun', 'perera', 'kasu@gmail.com', '209636222v', 'rathanapura', '0413423033', '0782266857', '1620106614_defaultImage.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `customer_login_id` int(11) NOT NULL,
  `customer_login_username` varchar(45) NOT NULL,
  `customer_login_password` varchar(45) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`customer_login_id`, `customer_login_username`, `customer_login_password`, `customer_customer_id`) VALUES
(1, 'dhanushika76@gmail.com', '4a1c9a9bc5a6f94039d89db07a37a7a3f36ffd69', 2),
(2, 'Janith@gmail.com', '85901b615d9709dc6b96ffaabb371b0d3ca35e25', 3),
(3, 'harshani@gmail.com', '5981e5be5b018c7fde30ac99528310d3ab8fe74b', 4),
(4, 'sanduni@gmail.com', '0b7a3cd06904ec580ca5521f56ab8e8671054eec', 5),
(5, 'shehani@gmail.com', '86083c3a257d7d0aa0162ca62ad478dfac63084f', 6),
(6, 'Aska@gmail.com', '867e3b5e216a9dd6a3c5c2415fd9afba53aa3b59', 7),
(7, 'imalka@gmail.com', 'd850bb6bd552ecf68bb25a04ca9a6132b2114bcd', 8),
(8, 'perera@gmail.com', '3ec93cea4ace2794f1cd3dde995513451b0647eb', 9),
(9, 'kasu@gmail.com', 'fd35966aa32789aa2aa2564ea4c1a3e65205b23e', 10);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `deliver_name` varchar(45) NOT NULL,
  `customer_adrr` varchar(45) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_date`, `delivery_status`, `deliver_name`, `customer_adrr`, `invoice_id`) VALUES
(1, '2020-12-24', 1, 'Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 5),
(2, '2020-12-24', 1, 'Dhanushika', 'No41,Samagi mawath,Akmemana,Galle', 3),
(3, '2020-12-31', 1, 'H.H. Dhanushika', 'Nisansala,Pallegama,Deniyaya.', 8),
(4, '2021-05-01', 1, 'H.H. Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 6),
(5, '2021-01-27', 1, 'H.H. Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 17),
(6, '2021-04-30', 1, 'H.H. Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 57),
(7, '2021-04-30', 1, 'H.H. Dhanushika', 'No 08,wakwalla Road,Galle', 12),
(8, '2021-05-04', 1, 'H.H. Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 74),
(9, '2021-05-04', 1, 'H.H. Dhanushika', 'No 72,Pansala Para,Nupe,Matara', 81),
(10, '2021-05-03', 1, 'H.H. Dhanushika', 'Susira,Eramudugoda,Akuressa', 61),
(11, '2021-05-04', 1, 'H.H. Dhanushika', 'Susira,Eramudugoda,Akuressa', 82);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `grn_id` int(11) NOT NULL,
  `grn_no` varchar(45) NOT NULL,
  `supplier_id` varchar(45) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`grn_id`, `grn_no`, `supplier_id`, `create_date`, `status`) VALUES
(1, 'GRN20201006_0001', '1', '2020-10-06', '0'),
(2, 'GRN20201009_0001', '1', '2020-10-09', '0'),
(3, 'GRN20201009_0002', '2', '2020-10-09', '0'),
(4, 'GRN20201012_0001', '1', '2020-10-12', '1'),
(5, 'GRN20201012_0002', '2', '2020-10-12', '1'),
(6, 'GRN20201102_0001', '3', '2020-11-02', '1'),
(7, 'GRN20210127_0001', '3', '2021-01-27', '1'),
(8, 'GRN20210503_0001', '3', '2021-05-03', '0'),
(9, 'GRN20210504_0001', '2', '2021-05-04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(45) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_type` varchar(45) NOT NULL,
  `invoice_time` time NOT NULL DEFAULT current_timestamp(),
  `invoice_total` decimal(10,2) NOT NULL,
  `invoice_payamount` varchar(45) NOT NULL,
  `recieved_amount` decimal(10,2) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `invoice_date`, `invoice_type`, `invoice_time`, `invoice_total`, `invoice_payamount`, `recieved_amount`, `discount`, `balance`, `customer_customer_id`, `customer_fname`) VALUES
(1, 'INV20201216_0001', '2020-12-16', 'genaral', '09:05:23', '5400.00', '5400.00', '6000.00', '10', '600.00', 1, 'Working customer'),
(2, 'INV20201216_0002', '2020-12-16', 'genaral', '09:17:35', '3600.00', '3600.00', '0.00', '10', '0.00', 1, 'Working customer'),
(3, 'INV20201222_0001', '2020-12-22', 'online', '10:45:47', '4500.00', '4500.00', '0.00', '', '0.00', 2, 'Dhanushika'),
(4, 'INV20201224_0001', '2020-12-24', 'genaral', '10:49:53', '8000.00', '8000.00', '10000.00', '20', '2000.00', 1, 'Working customer'),
(5, 'INV20201224_0002', '2020-12-24', 'online', '10:51:32', '5500.00', '5500.00', '0.00', '', '0.00', 2, 'Harshani'),
(6, 'INV20201230_0001', '2020-12-30', 'online', '13:38:30', '3000.00', '3500.00', '0.00', '', '0.00', 2, 'Harshani '),
(7, 'INV20201230_0002', '2020-12-30', 'online', '13:43:39', '1000.00', '1500.00', '0.00', '', '0.00', 2, 'Shehani'),
(8, 'INV20201231_0001', '2020-12-31', 'online', '16:06:17', '3500.00', '4000.00', '0.00', '', '0.00', 3, 'Udara '),
(9, 'INV20201231_0002', '2020-12-31', 'genaral', '18:22:46', '4275.00', '4275.00', '4500.00', '5', '225.00', 1, 'Working customer'),
(10, 'INV20210118_0001', '2021-01-18', 'genaral', '09:30:31', '7200.00', '7200.00', '8000.00', '10', '800.00', 1, 'Working customer'),
(11, 'INV20210120_0001', '2021-01-20', 'genaral', '16:05:11', '3600.00', '3600.00', '4000.00', '10', '400.00', 1, 'Working customer'),
(12, 'INV20210120_0002', '2021-01-20', 'online', '16:31:06', '2700.00', '3200.00', '0.00', '', '0.00', 5, 'Sanduni'),
(13, 'INV20210120_0003', '2021-01-20', 'online', '16:44:22', '6200.00', '6700.00', '0.00', '', '0.00', 5, 'chandula '),
(14, 'INV20210125_0001', '2021-01-25', 'online', '00:33:59', '3200.00', '3700.00', '0.00', '', '0.00', 3, 'Nethmi'),
(15, 'INV20210125_0002', '2021-01-25', 'online', '00:41:56', '3500.00', '4000.00', '0.00', '', '0.00', 6, 'Hasini'),
(16, 'INV20210125_0003', '2021-01-25', 'genaral', '01:02:21', '2160.00', '2160.00', '2700.00', '20', '540.00', 1, 'Working customer'),
(17, 'INV20210127_0001', '2021-01-27', 'online', '16:06:15', '3000.00', '3500.00', '0.00', '', '0.00', 7, 'ashka'),
(18, 'INV20210127_0002', '2021-01-27', 'genaral', '16:46:20', '2375.00', '2375.00', '2500.00', '5', '125.00', 1, 'Working customer'),
(19, 'INV20210210_0001', '2021-02-10', 'genaral', '15:48:37', '3150.00', '3150.00', '4000.00', '10', '850.00', 1, 'Working customer'),
(20, 'INV20210210_0002', '2021-02-10', 'genaral', '16:08:32', '2560.00', '2560.00', '3000.00', '20', '440.00', 1, 'Working customer'),
(21, 'INV20210210_0003', '2021-02-10', 'online', '16:10:16', '3200.00', '3700.00', '0.00', '', '0.00', 7, 'Kalana '),
(22, 'INV20210214_0001', '2021-02-14', 'genaral', '16:14:51', '3600.00', '3600.00', '4000.00', '10', '400.00', 1, 'Working customer'),
(23, 'INV20210214_0002', '2021-02-14', 'online', '16:17:01', '3000.00', '3500.00', '0.00', '', '0.00', 5, 'Janith'),
(24, 'INV20210220_0001', '2021-02-20', 'genaral', '17:21:16', '8500.00', '8500.00', '9000.00', '15', '500.00', 1, 'Working customer'),
(25, 'INV20210220_0002', '2021-02-20', 'online', '17:26:11', '3000.00', '3500.00', '0.00', '', '0.00', 5, 'tharindu '),
(26, 'INV20210225_0001', '2021-02-25', 'online', '22:35:17', '5400.00', '5900.00', '0.00', '', '0.00', 6, 'Udara '),
(27, 'INV20210225_0002', '2021-02-25', 'genaral', '22:35:55', '2880.00', '2880.00', '3000.00', '10', '120.00', 1, 'Working customer'),
(28, 'INV20210228_0001', '2021-02-28', 'genaral', '11:38:22', '2250.00', '2250.00', '3000.00', '10', '750.00', 1, 'Working customer'),
(29, 'INV20210228_0002', '2021-02-28', 'online', '11:40:31', '2400.00', '2900.00', '0.00', '', '0.00', 6, 'dhanushika'),
(30, 'INV20210310_0001', '2021-03-10', 'genaral', '09:47:02', '3040.00', '3040.00', '4000.00', '5', '960.00', 1, 'Working customer'),
(31, 'INV20210310_0002', '2021-03-10', 'online', '09:50:21', '2500.00', '3000.00', '0.00', '', '0.00', 6, 'Vindula'),
(32, 'INV20210315_0001', '2021-03-15', 'online', '10:55:51', '2400.00', '2900.00', '0.00', '', '0.00', 6, 'Shashini'),
(33, 'INV20210315_0002', '2021-03-15', 'genaral', '10:56:19', '2700.00', '2700.00', '3000.00', '10', '300.00', 1, 'Working customer'),
(34, 'INV20210320_0001', '2021-03-20', 'online', '11:58:58', '4000.00', '4500.00', '0.00', '', '0.00', 6, 'Thilini'),
(35, 'INV20210320_0002', '2021-03-20', 'genaral', '11:59:23', '2700.00', '2700.00', '3000.00', '10', '300.00', 1, 'Working customer'),
(36, 'INV20210325_0001', '2021-03-25', 'online', '10:07:42', '6000.00', '6500.00', '0.00', '', '0.00', 5, 'Madushan'),
(37, 'INV20210325_0002', '2021-03-25', 'genaral', '10:08:40', '6300.00', '6300.00', '7000.00', '10', '700.00', 1, 'Working customer'),
(38, 'INV20210325_0003', '2021-03-25', 'genaral', '10:10:58', '900.00', '900.00', '1000.00', '10', '100.00', 1, 'Working customer'),
(39, 'INV20210325_0004', '2021-03-25', 'genaral', '10:13:43', '10450.00', '10450.00', '20000.00', '5', '9550.00', 1, 'Working customer'),
(40, 'INV20210330_0001', '2021-03-30', 'online', '11:27:08', '3200.00', '3700.00', '0.00', '', '0.00', 5, 'Sandun'),
(41, 'INV20210330_0002', '2021-03-30', 'genaral', '11:30:17', '3400.00', '3400.00', '4000.00', '15', '600.00', 1, 'Working customer'),
(42, 'INV20210410_0001', '2021-04-10', 'online', '11:58:39', '3200.00', '3700.00', '0.00', '', '0.00', 7, 'Madushii'),
(43, 'INV20210410_0002', '2021-04-10', 'genaral', '11:59:29', '5850.00', '5850.00', '6000.00', '10', '150.00', 1, 'Working customer'),
(44, 'INV20210415_0001', '2021-04-15', 'online', '13:04:36', '2200.00', '2700.00', '0.00', '', '0.00', 7, 'Amal'),
(45, 'INV20210415_0002', '2021-04-15', 'genaral', '13:05:40', '5850.00', '5850.00', '6000.00', '10', '150.00', 1, 'Working customer'),
(46, 'INV20210420_0001', '2021-04-20', 'genaral', '14:16:27', '3360.00', '3360.00', '4000.00', '20', '640.00', 1, 'Working customer'),
(47, 'INV20210420_0002', '2021-04-20', 'online', '14:21:54', '2500.00', '3000.00', '0.00', '', '0.00', 7, 'Hashani'),
(48, 'INV20210420_0003', '2021-04-20', 'online', '14:23:56', '3500.00', '4000.00', '0.00', '', '0.00', 7, 'Janith'),
(49, 'INV20210425_0001', '2021-04-25', 'genaral', '14:30:16', '5600.00', '5600.00', '6000.00', '20', '400.00', 1, 'Working customer'),
(50, 'INV20210425_0002', '2021-04-25', 'online', '14:40:58', '2200.00', '2700.00', '0.00', '', '0.00', 7, 'dhanushika'),
(51, 'INV20210427_0001', '2021-04-27', 'online', '13:18:26', '4000.00', '4500.00', '0.00', '', '0.00', 7, 'Harshani'),
(52, 'INV20210427_0002', '2021-04-27', 'genaral', '13:19:17', '2700.00', '2700.00', '3000.00', '10', '300.00', 1, 'Working customer'),
(53, 'INV20210428_0001', '2021-04-28', 'genaral', '15:20:10', '5890.00', '5890.00', '6000.00', '5', '110.00', 1, 'Working customer'),
(54, 'INV20210428_0002', '2021-04-28', 'online', '15:22:56', '3000.00', '3500.00', '0.00', '', '0.00', 7, 'Kalana '),
(55, 'INV20210429_0001', '2021-04-29', 'genaral', '11:24:51', '3150.00', '3150.00', '6000.00', '10', '2850.00', 1, 'Working customer'),
(56, 'INV20210429_0002', '2021-04-29', 'online', '11:28:15', '4000.00', '4500.00', '0.00', '', '0.00', 7, 'Shehani'),
(57, 'INV20210429_0003', '2021-04-29', 'online', '11:30:10', '5000.00', '5500.00', '0.00', '', '0.00', 7, 'harshani'),
(58, 'INV20210429_0004', '2021-04-29', 'online', '11:49:48', '3000.00', '3500.00', '0.00', '', '0.00', 3, 'Ashka '),
(59, 'INV20210430_0001', '2021-04-30', 'online', '12:04:28', '9600.00', '10100.00', '0.00', '', '0.00', 3, 'dhanushika'),
(60, 'INV20210430_0002', '2021-04-30', 'genaral', '12:05:20', '6660.00', '6660.00', '70000.00', '10', '63340.00', 1, 'Working customer'),
(61, 'INV20210430_0003', '2021-04-30', 'online', '12:07:23', '6000.00', '6500.00', '0.00', '', '0.00', 5, 'Tharindu'),
(62, 'INV20210430_0004', '2021-04-30', 'online', '12:09:31', '5000.00', '5500.00', '0.00', '', '0.00', 5, 'Janith'),
(63, 'INV20210430_0005', '2021-04-30', 'online', '10:02:04', '2000.00', '2500.00', '0.00', '', '0.00', 8, 'dhanushika'),
(64, 'INV20210430_0006', '2021-04-30', 'genaral', '10:14:25', '900.00', '900.00', '1000.00', '10', '100.00', 1, 'Working customer'),
(65, 'INV20210501_0001', '2021-05-01', 'genaral', '09:30:05', '12150.00', '12150.00', '13000.00', '10', '850.00', 1, 'Working customer'),
(66, 'INV20210501_0002', '2021-05-01', 'genaral', '09:30:59', '18050.00', '18050.00', '19000.00', '5', '950.00', 1, 'Working customer'),
(67, 'INV20210501_0003', '2021-05-01', 'genaral', '09:34:55', '23040.00', '23040.00', '25000.00', '10', '1960.00', 1, 'Working customer'),
(68, 'INV20210501_0004', '2021-05-01', 'online', '10:14:30', '1000.00', '1500.00', '0.00', '', '0.00', 8, 'Isuru'),
(69, 'INV20210501_0005', '2021-05-01', 'online', '10:16:53', '12000.00', '12500.00', '0.00', '', '0.00', 8, 'Nethuki'),
(70, 'INV20210501_0006', '2021-05-01', 'online', '10:19:56', '8100.00', '8600.00', '0.00', '', '0.00', 8, 'hashani'),
(71, 'INV20210501_0007', '2021-05-01', 'online', '10:22:46', '14400.00', '14900.00', '0.00', '', '0.00', 8, 'dhanushika'),
(72, 'INV20210501_0008', '2021-05-01', 'online', '10:31:59', '4000.00', '4500.00', '0.00', '', '0.00', 8, 'dhanushika'),
(73, 'INV20210502_0001', '2021-05-02', 'online', '16:23:54', '9200.00', '9700.00', '0.00', '', '0.00', 8, 'Janith'),
(74, 'INV20210502_0002', '2021-05-02', 'online', '16:29:36', '4000.00', '4500.00', '0.00', '', '0.00', 8, 'Himansi'),
(75, 'INV20210502_0003', '2021-05-02', 'online', '16:33:30', '5500.00', '6000.00', '0.00', '', '0.00', 8, 'Samadi '),
(76, 'INV20210502_0004', '2021-05-02', 'online', '16:36:27', '2200.00', '2700.00', '0.00', '', '0.00', 8, 'Madushan'),
(77, 'INV20210502_0005', '2021-05-02', 'online', '16:40:47', '2200.00', '2700.00', '0.00', '', '0.00', 8, 'dhanushika'),
(78, 'INV20210502_0006', '2021-05-02', 'genaral', '16:48:00', '2250.00', '2250.00', '0.00', '10', '0.00', 1, 'Working customer'),
(79, 'INV20210503_0001', '2021-05-03', 'genaral', '16:13:19', '4275.00', '4275.00', '5000.00', '5', '725.00', 1, 'Working customer'),
(80, 'INV20210503_0002', '2021-05-03', 'online', '16:16:02', '3000.00', '3500.00', '0.00', '', '0.00', 8, 'dhanushika'),
(81, 'INV20210503_0003', '2021-05-03', 'online', '17:22:23', '5400.00', '5900.00', '0.00', '', '0.00', 8, 'harshani'),
(82, 'INV20210504_0001', '2021-05-04', 'online', '08:24:53', '4200.00', '4700.00', '0.00', '', '0.00', 8, 'dhanushika'),
(83, 'INV20210504_0002', '2021-05-04', 'genaral', '08:26:05', '3600.00', '3600.00', '4000.00', '10', '400.00', 1, 'Working customer'),
(84, 'INV20210504_0003', '2021-05-04', 'online', '10:51:02', '3000.00', '3500.00', '0.00', '', '0.00', 9, 'dhanushika'),
(85, 'INV20210504_0004', '2021-05-04', 'genaral', '10:54:32', '1350.00', '1350.00', '2000.00', '10', '650.00', 1, 'Working customer'),
(86, 'INV20210504_0005', '2021-05-04', 'online', '11:27:03', '3000.00', '3500.00', '0.00', '', '0.00', 9, 'dhanushika');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(45) NOT NULL,
  `login_password` varchar(45) NOT NULL,
  `login_status` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_status`, `user_user_id`) VALUES
(1, 'dhanushika76@gmail.com', '4a1c9a9bc5a6f94039d89db07a37a7a3f36ffd69', 1, 1),
(2, 'hashani@gmail.com', 'edf3ff98ddf077de7b45cf7f8a25eeff73d7fae8', 1, 2),
(3, 'madhushan@gmail.com', '0d277fdfe94b0cb685250cd9d7cabb709774cae4', 1, 3),
(4, 'janith@gmail.com', '2a69731bab92ce7be5436a0abbefef0f845caff7', 1, 4),
(5, 'kalan@gmail.com', 'd09a977c651e0f2368a130bd2edab38a3dcdf8bf', 1, 5),
(6, 'harshanipriya@gmail.com', 'cff2b0b58d523247ee33a6a561c888dadaceba59', 0, 6),
(7, 'gayathri@gmail.com', '9b16f2638c62d8509d82eeeafca17076254e96f4', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`) VALUES
(1, 'User Management'),
(2, 'Customer Management'),
(3, 'Product Management'),
(4, 'Stock Management'),
(5, 'Order Management'),
(6, 'Supplier Management'),
(7, 'Delivery Management'),
(8, 'Report Management'),
(9, 'Payment Management');

-- --------------------------------------------------------

--
-- Table structure for table `order_product_table`
--

CREATE TABLE `order_product_table` (
  `order_product_table_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `quntity` int(11) NOT NULL,
  `order_table_order_table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product_table`
--

INSERT INTO `order_product_table` (`order_product_table_id`, `product_id`, `size_id`, `price`, `sub_total`, `quntity`, `order_table_order_table_id`) VALUES
(1, 6, 5, '1000.00', '1000.00', 1, 1),
(2, 9, 5, '1500.00', '1500.00', 1, 1),
(3, 4, 9, '2000.00', '2000.00', 1, 1),
(4, 1, 2, '1500.00', '1500.00', 1, 2),
(5, 2, 4, '2000.00', '4000.00', 2, 2),
(6, 6, 4, '1000.00', '1000.00', 1, 3),
(7, 6, 6, '1000.00', '2000.00', 2, 3),
(8, 6, 6, '1000.00', '1000.00', 1, 4),
(9, 5, 6, '1000.00', '2000.00', 2, 5),
(10, 10, 5, '1500.00', '1500.00', 1, 5),
(11, 9, 2, '1500.00', '1500.00', 1, 6),
(12, 13, 5, '1200.00', '1200.00', 1, 6),
(13, 15, 9, '1200.00', '1200.00', 1, 7),
(14, 14, 7, '5000.00', '5000.00', 1, 7),
(15, 15, 8, '1200.00', '1200.00', 1, 8),
(16, 4, 9, '2000.00', '2000.00', 1, 8),
(17, 1, 2, '1500.00', '1500.00', 1, 9),
(18, 2, 5, '2000.00', '2000.00', 1, 9),
(19, 2, 4, '2000.00', '2000.00', 1, 10),
(20, 6, 5, '1000.00', '1000.00', 1, 10),
(21, 18, 3, '2000.00', '2000.00', 1, 11),
(22, 16, 9, '1200.00', '1200.00', 1, 11),
(23, 5, 5, '1000.00', '1000.00', 1, 12),
(24, 12, 4, '2000.00', '2000.00', 1, 12),
(25, 6, 6, '1000.00', '1000.00', 1, 13),
(26, 2, 3, '2000.00', '2000.00', 1, 13),
(27, 9, 5, '1500.00', '3000.00', 2, 14),
(28, 16, 9, '1200.00', '2400.00', 2, 14),
(29, 13, 4, '1200.00', '1200.00', 1, 15),
(30, 16, 9, '1200.00', '1200.00', 1, 15),
(31, 9, 4, '1500.00', '1500.00', 1, 16),
(32, 17, 9, '1000.00', '1000.00', 1, 16),
(33, 15, 9, '1200.00', '1200.00', 1, 17),
(34, 13, 3, '1200.00', '1200.00', 1, 17),
(35, 4, 8, '2000.00', '2000.00', 1, 18),
(36, 2, 4, '2000.00', '2000.00', 1, 18),
(37, 19, 2, '5000.00', '5000.00', 1, 19),
(38, 8, 6, '1000.00', '1000.00', 1, 19),
(39, 17, 9, '1000.00', '2000.00', 2, 20),
(40, 13, 3, '1200.00', '1200.00', 1, 20),
(41, 6, 4, '1000.00', '2000.00', 2, 21),
(42, 15, 9, '1200.00', '1200.00', 1, 21),
(43, 15, 9, '1200.00', '1200.00', 1, 22),
(44, 17, 8, '1000.00', '1000.00', 1, 22),
(45, 10, 7, '1500.00', '1500.00', 1, 23),
(46, 6, 5, '1000.00', '1000.00', 1, 23),
(47, 1, 2, '1500.00', '1500.00', 1, 24),
(48, 2, 5, '2000.00', '2000.00', 1, 24),
(49, 16, 9, '1200.00', '1200.00', 1, 25),
(50, 17, 8, '1000.00', '1000.00', 1, 25),
(51, 22, 3, '2000.00', '2000.00', 1, 26),
(52, 23, 3, '2000.00', '2000.00', 1, 26),
(53, 22, 3, '2000.00', '2000.00', 1, 27),
(54, 25, 8, '1000.00', '1000.00', 1, 27),
(55, 4, 8, '2000.00', '2000.00', 1, 28),
(56, 12, 6, '2000.00', '2000.00', 1, 28),
(57, 19, 3, '5000.00', '5000.00', 1, 29),
(58, 6, 5, '1000.00', '1000.00', 1, 30),
(59, 2, 5, '2000.00', '2000.00', 1, 30),
(60, 8, 5, '1000.00', '3000.00', 3, 31),
(61, 3, 2, '3000.00', '3000.00', 1, 31),
(62, 15, 9, '1200.00', '3600.00', 3, 31),
(63, 14, 7, '5000.00', '5000.00', 1, 32),
(64, 8, 5, '1000.00', '1000.00', 1, 32),
(65, 17, 8, '1000.00', '1000.00', 1, 33),
(66, 25, 8, '1000.00', '4000.00', 4, 33),
(67, 6, 4, '1000.00', '2000.00', 2, 34),
(68, 6, 5, '1000.00', '1000.00', 1, 35),
(69, 24, 2, '1000.00', '3000.00', 3, 36),
(70, 25, 9, '1000.00', '3000.00', 3, 36),
(71, 2, 3, '2000.00', '6000.00', 3, 36),
(72, 6, 6, '1000.00', '3000.00', 3, 37),
(73, 1, 2, '1500.00', '1500.00', 1, 37),
(74, 16, 9, '1200.00', '3600.00', 3, 37),
(75, 13, 3, '1200.00', '7200.00', 6, 38),
(76, 16, 9, '1200.00', '1200.00', 1, 38),
(77, 1, 2, '1500.00', '6000.00', 4, 38),
(78, 2, 4, '2000.00', '2000.00', 1, 39),
(79, 22, 2, '2000.00', '2000.00', 1, 39),
(80, 3, 2, '3000.00', '6000.00', 2, 40),
(81, 6, 5, '1000.00', '2000.00', 2, 40),
(82, 16, 9, '1200.00', '1200.00', 1, 40),
(83, 6, 5, '1000.00', '1000.00', 1, 41),
(84, 24, 2, '1000.00', '1000.00', 1, 41),
(85, 22, 2, '2000.00', '2000.00', 1, 41),
(86, 4, 9, '2000.00', '2000.00', 1, 42),
(87, 9, 3, '1500.00', '1500.00', 1, 42),
(88, 18, 4, '2000.00', '2000.00', 1, 42),
(89, 17, 9, '1000.00', '1000.00', 1, 43),
(90, 15, 8, '1200.00', '1200.00', 1, 43),
(91, 25, 8, '1000.00', '1000.00', 1, 44),
(92, 16, 9, '1200.00', '1200.00', 1, 44),
(93, 1, 2, '1500.00', '1500.00', 1, 45),
(94, 9, 4, '1500.00', '1500.00', 1, 45),
(95, 6, 4, '1000.00', '3000.00', 3, 46),
(96, 16, 9, '1200.00', '2400.00', 2, 46),
(97, 3, 3, '3000.00', '3000.00', 1, 47),
(98, 16, 8, '1200.00', '1200.00', 1, 47),
(99, 3, 2, '3000.00', '3000.00', 1, 48),
(100, 3, 2, '3000.00', '3000.00', 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_table_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  `customer_town` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `invoice_invoice_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(45) NOT NULL,
  `mobile_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_table_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_town`, `email`, `customer_customer_id`, `invoice_invoice_id`, `order_date`, `order_status`, `mobile_number`) VALUES
(1, 'Dhanushika', 'Madumali', 'No41,Samagi mawath,Akmemana,Galle', 'Galle', 'dhanushika76@gmail.com', 2, 3, '2020-12-22', 'Delivered', 774116861),
(2, 'Harshani', 'Priyangika', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'harshanipriyangikabed@gmail.com', 2, 5, '2020-12-24', 'Shipped', 712372101),
(3, 'Harshani ', 'Priyangika', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'harshanipriyangikabed@gmail.com', 2, 6, '2020-12-30', 'Shipped', 712372101),
(4, 'Shehani', 'Perera', 'No 2,Wattala Road,Colombo', 'Colombo', 'shehani@gmail.com', 2, 7, '2020-12-30', 'Delivered', 773859336),
(5, 'Udara ', 'Sampath', 'Nisansala,Pallegama,Deniyaya.', 'Deniyaya', 'Udara@gmail.com', 3, 8, '2020-12-31', 'Shipped', 774233850),
(6, 'Sanduni', 'Sithara', 'No 08,wakwalla Road,Galle', 'Galle', 'sanduni@gmail.com', 5, 12, '2021-01-20', 'Shipped', 767258932),
(7, 'chandula ', 'janani', 'No 07,NUpe,Matara', 'Matara', 'chandu@gmail.com', 5, 13, '2021-01-20', 'Pending', 715018963),
(8, 'Nethmi', 'Kavindi', 'Susira,Eramudugoda,Akuressa', 'akuressa', 'nethmi@gmail.com', 3, 14, '2021-01-25', 'Pending', 714116861),
(9, 'Hasini', 'Ranasingha', 'No 07,Kottawa Road,Maharagama', 'Maharagama', 'hasini@gmail.com', 6, 15, '2021-01-25', 'Pending', 764233850),
(10, 'ashka', 'kulathunga', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'aska@gmail.com', 7, 17, '2021-01-27', 'Shipped', 714116861),
(11, 'Kalana ', 'Wijesakara', 'No 05,Demiyaya Road,Akuressa', 'Akuressa', 'kalana@gmail.com', 7, 21, '2021-02-10', 'Pending', 764233850),
(12, 'Janith', 'Chathuranga', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'janith@gmail.com', 5, 23, '2021-02-14', 'Pending', 764233850),
(13, 'tharindu ', 'udayakumara', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'tharindu@gmail.com', 5, 25, '2021-02-20', 'Pending', 774116861),
(14, 'Udara ', 'Sampath', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'udara@gmail.com', 6, 26, '2021-02-25', 'Pending', 764233850),
(15, 'dhanushika', 'madumali', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'madumali@gmali.com', 6, 29, '2021-02-28', 'Pending', 764233850),
(16, 'Vindula', 'Oshadi', 'No 09,Jaya Road,Galle.', 'Galle', 'vindula@gmail.com', 6, 31, '2021-03-10', 'Pending', 712372101),
(17, 'Shashini', 'Bhagya', 'No 9,Kalutara South,Kalutara', 'Kaluthara', 'shashini@gmail.com', 6, 32, '2021-03-15', 'Pending', 764233850),
(18, 'Thilini', 'Upeksha', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'Thilini@gmail.com', 6, 34, '2021-03-20', 'Pending', 712372101),
(19, 'Madushan', 'Sandaruwan', 'No 08,Wkwella Road,Galle', 'Galle', 'madushan@gmail.com', 5, 36, '2021-03-25', 'Pending', 713638077),
(20, 'Sandun', 'Bandara', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'Sandun@gmail.com', 5, 40, '2021-03-30', 'Pending', 774116861),
(21, 'Madushii', 'Balasuriya', 'No 01,Colombo Road,Galle', 'Galle', 'madushi@gmail.com', 7, 42, '2021-04-10', 'Pending', 774233850),
(22, 'Amal', 'Sudaraka', 'No 03,awissawella Road,Colombo', 'Colombo', 'amal@gmail.com', 7, 44, '2021-04-15', 'Pending', 712372101),
(23, 'Hashani', 'Imalka', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'hashani@gmail.com', 7, 47, '2021-04-20', 'Pending', 764233850),
(24, 'Janith', 'Chathuranga', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'janith@gmail.com', 7, 48, '2021-04-20', 'Pending', 712372101),
(25, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'akuressa', 'dhanushika76@gmail.com', 7, 50, '2021-04-25', 'Pending', 774116861),
(26, 'Harshani', 'Priyangika', 'No 72,Pansala Para,Awissawella', 'Awissawella', 'harshani@gmail.com', 7, 51, '2021-04-27', 'Pending', 774116861),
(27, 'Kalana ', 'Wijesakara', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'dhanushika76@gmail.com', 7, 54, '2021-04-28', 'Pending', 764233850),
(28, 'Shehani', 'Perera', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'harshanipriyangikabed@gmail.com', 7, 56, '2021-04-29', 'Shipped', 712372101),
(29, 'harshani', 'Pryangika', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'harshanipriyangikabed@gmail.com', 7, 57, '2021-04-29', 'Delivered', 764233850),
(30, 'Ashka ', 'Kulathunga', 'Susira,Eramudugoda,Akuressa', 'akuressa', 'dhanushika76@gmail.com', 3, 58, '2021-04-29', 'Pending', 774116861),
(31, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 3, 59, '2021-04-30', 'Pending', 774116861),
(32, 'Tharindu', 'Udaya Kumara', 'Susira,Eramudugoda,Akuressa', 'Akureesa', 'harshanipriyangikabed@gmail.com', 5, 61, '2021-04-30', 'Delivered', 712372101),
(33, 'Janith', 'Dilshan', 'No 09,Pasala Road,deniyaya', 'Deniyaya', 'dhanushika76@gmail.com', 5, 62, '2021-04-30', 'Pending', 764233850),
(34, 'dhanushika', 'madumali', 'No 72,Pansala Para,Nupe,Matara', 'Akuressa', 'dhanushika76@gmail.com', 8, 63, '2021-04-30', 'Pending', 714116861),
(35, 'Isuru', 'Lakmal', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'isuru@mail.com', 8, 68, '2021-05-01', 'Pending', 714116861),
(36, 'Nethuki', 'Akasha', 'No 10,Madapatha Road,Pliyandala', 'Pliyandala', 'nethuki@mail.com', 8, 69, '2021-05-01', 'Pending', 764233850),
(37, 'hashani', 'imalka', 'No 72,Pansala Para,Wadduwa,Kaluthara', 'Kalutara', 'hashani@gmail.com', 8, 70, '2021-05-01', 'Shipped', 714116861),
(38, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 8, 71, '2021-05-01', 'Shipped', 774116861),
(39, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 8, 72, '2021-05-01', 'Pending', 764233850),
(40, 'Janith', 'Chathuranga', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'janith@gmail.com', 8, 73, '2021-05-02', 'Pending', 714116861),
(41, 'Himansi', 'Chathurya', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'himansi@gmail.com', 8, 74, '2021-05-02', 'Delivered', 764233850),
(42, 'Samadi ', 'Wathsala', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'samadi@gmail.com', 8, 75, '2021-05-02', 'Shipped', 712372101),
(43, 'Madushan', 'Sandaruwan', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'madushan@gmail.com', 8, 76, '2021-05-02', 'Pending', 714116861),
(44, 'dhanushika', 'madumali', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'dhanushika76@gmail.com', 8, 77, '2021-05-02', 'Shipped', 764233850),
(45, 'dhanushika', 'madumali', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'dhanushika76@gmail.com', 8, 80, '2021-05-03', 'Pending', 714116861),
(46, 'harshani', 'Priyangika', 'No 72,Pansala Para,Nupe,Matara', 'Matara', 'harshanipriyangikabed@gmail.com', 8, 81, '2021-05-03', 'Delivered', 712372101),
(47, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 8, 82, '2021-05-04', 'Delivered', 764233850),
(48, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 9, 84, '2021-05-04', 'Pending', 714116861),
(49, 'dhanushika', 'madumali', 'Susira,Eramudugoda,Akuressa', 'Akuressa', 'dhanushika76@gmail.com', 9, 86, '2021-05-04', 'Pending', 764233850);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `paybill_no` varchar(45) NOT NULL,
  `payment_total_amount` decimal(10,0) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `p_status` varchar(45) NOT NULL,
  `comment` varchar(90) NOT NULL,
  `grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `paybill_no`, `payment_total_amount`, `payment_date`, `payment_type`, `p_status`, `comment`, `grn_id`) VALUES
(1, 'PBILL20201012_0001', '5000000', '2020-10-12', 'Cash', 'SUCCESS', 'Supplier Payment', 1),
(2, 'PBILL20210127_0001', '170000', '2021-01-27', 'Cash', 'SUCCESS', 'Supplier payment', 2),
(3, 'PBILL20210503_0001', '60000', '2021-05-03', 'Cash', 'SUCCESS', 'Supplier Payment', 8),
(4, 'PBILL20210504_0001', '2000000', '2021-05-04', 'Cash', 'SUCCESS', 'supplier payment', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `category_category_id` int(11) NOT NULL,
  `collection_collection_id` int(11) NOT NULL,
  `sub_category_sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_category_id`, `collection_collection_id`, `sub_category_sub_category_id`) VALUES
(1, 'Black T Strap Sandals', 1, 1, 2),
(2, 'Brown T Strap Sandals', 1, 1, 2),
(3, 'Black Heel Sandal-T-Strap', 1, 2, 3),
(4, 'Kids Black U Sandals ', 1, 3, 1),
(5, 'Gent Blue Flip Flops', 2, 1, 13),
(6, 'Ladies Blue Flip Flops', 2, 2, 14),
(7, 'Gent Red Flip Flops', 2, 1, 13),
(8, 'Gent Yellow Flip Flops', 2, 1, 13),
(9, 'Ladies Red Flip Flops', 2, 2, 14),
(10, 'Ladies Pink Flip Flops', 2, 2, 14),
(11, 'Pink Flat Slipper', 3, 2, 7),
(12, 'Ladies Black Box Heel', 4, 2, 11),
(13, 'Ladies Brown Flat Slipper', 3, 2, 7),
(14, 'Ladies Flat Shoe', 3, 2, 6),
(15, 'Kids Blue Flip Flops', 2, 3, 15),
(16, 'Kids Black Sandals ', 1, 3, 5),
(17, 'Kids Red Flip Flops', 2, 3, 15),
(18, 'Gent Brown Sandals', 1, 1, 2),
(19, 'Gent Blue Shoe', 5, 1, 16),
(20, 'Ladies Black Flat Slipper', 3, 2, 7),
(21, 'Ladies Black Flat Shoe', 3, 2, 6),
(22, 'Gent Orange Flip Flops', 2, 1, 13),
(23, 'Kids Red U Sandals', 1, 3, 1),
(24, 'Kids Pink Flip Flops', 2, 3, 15),
(25, 'Kids Yellow Flip Flops', 2, 3, 15),
(26, ' gents balack shoes', 4, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_size`
--

CREATE TABLE `product_has_size` (
  `product_product_id` int(11) NOT NULL,
  `size_size_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_has_size`
--

INSERT INTO `product_has_size` (`product_product_id`, `size_size_id`, `barcode`) VALUES
(1, 2, 582712),
(1, 3, 0),
(1, 4, 0),
(2, 3, 582723),
(2, 4, 582724),
(2, 5, 582725),
(2, 6, 582726),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(4, 8, 582748),
(4, 9, 582749),
(4, 10, 0),
(4, 11, 0),
(5, 4, 582754),
(5, 5, 0),
(5, 6, 0),
(6, 4, 0),
(6, 5, 0),
(6, 6, 0),
(7, 5, 0),
(7, 6, 0),
(7, 7, 0),
(8, 5, 0),
(8, 6, 0),
(8, 7, 0),
(9, 2, 582792),
(9, 3, 0),
(9, 4, 0),
(9, 5, 0),
(9, 6, 0),
(9, 7, 0),
(10, 5, 0),
(10, 6, 0),
(10, 7, 0),
(11, 5, 0),
(11, 6, 0),
(11, 7, 0),
(12, 3, 0),
(12, 4, 0),
(12, 5, 0),
(12, 6, 0),
(12, 7, 0),
(13, 3, 0),
(13, 4, 0),
(13, 5, 0),
(14, 6, 0),
(14, 7, 0),
(15, 8, 0),
(15, 9, 0),
(16, 8, 0),
(16, 9, 0),
(17, 8, 0),
(17, 9, 0),
(18, 3, 0),
(18, 4, 0),
(19, 2, 0),
(19, 3, 0),
(20, 2, 0),
(20, 3, 0),
(21, 3, 0),
(21, 4, 0),
(22, 2, 0),
(22, 3, 0),
(23, 3, 0),
(23, 4, 0),
(24, 2, 0),
(24, 3, 0),
(25, 8, 0),
(25, 9, 0),
(26, 4, 0),
(26, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `product_img_id` int(11) NOT NULL,
  `product_img_name` varchar(45) NOT NULL,
  `product_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`product_img_id`, `product_img_name`, `product_product_id`) VALUES
(1, '1619600301_images (24).jpg', 1),
(2, '1619600360_images (5).jpg', 2),
(3, '1619600474_46-500x500.jpg', 3),
(4, '1619600577_images (2).jpg', 4),
(5, '1619606707_91r68KhEcjL.jpg', 5),
(6, '1619606797_Pink-BB-300x300.jpg', 6),
(7, '1619609997_91ZrWmqAbvL.SS150.jpg', 7),
(8, '1619610216_81F2iQV30eL.SS150.jpg', 8),
(9, '1619610772_images (18).jpg', 9),
(10, '1619610849_images (27).jpg', 10),
(11, '1619611062_images (15).jpg', 11),
(12, '1610943372_71n-524CuOL._AC_UL320_.jpg', 12),
(13, '1619508246_images (17).jpg', 13),
(14, '1611140835_images (72).jpg', 14),
(15, '1611141017_image.webp', 15),
(16, '1612952472_images (5).jpg', 16),
(17, '1612952575_images (7).jpg', 17),
(18, '1612952769_sandals.jpg', 18),
(19, '1619972903_images (4).jpg', 19),
(20, '1619508272_images (16).jpg', 20),
(21, '1619508395_images (73).jpg', 21),
(22, '1619508928_images (48).jpg', 22),
(23, '1619509011_images (4).jpg', 23),
(24, '1619509298_kids_sandal_1-2-300x300 (1).jpg', 24),
(25, '1619509447_kids_design_3-1-300x300.jpg', 25),
(26, '1620105279_images (2).jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `productstock_id` int(11) NOT NULL,
  `a_quantity` int(11) NOT NULL,
  `current_quntity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stockdate` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `product_product_id` int(11) NOT NULL,
  `reorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`productstock_id`, `a_quantity`, `current_quntity`, `size_id`, `price`, `stockdate`, `status`, `product_product_id`, `reorder`) VALUES
(1, 134, 150, 2, '1500.00', '2020-11-10', 1, 1, 0),
(2, 135, 140, 3, '1500.00', '2020-11-10', 1, 1, 0),
(3, 129, 130, 4, '1350.00', '2020-11-10', 1, 1, 0),
(4, 196, 200, 3, '2000.00', '2020-11-10', 1, 2, 0),
(5, 201, 210, 4, '2000.00', '2020-11-10', 1, 2, 0),
(6, 189, 200, 5, '2000.00', '2020-11-10', 1, 2, 0),
(7, 199, 200, 6, '2000.00', '2020-11-10', 1, 2, 0),
(8, 89, 100, 2, '3000.00', '2020-11-10', 1, 3, 0),
(9, 97, 100, 3, '3000.00', '2020-11-10', 1, 3, 0),
(10, 87, 100, 8, '2000.00', '2020-11-28', 1, 4, 0),
(11, 144, 150, 9, '2000.00', '2020-11-28', 1, 4, 0),
(12, 87, 100, 4, '1000.00', '2020-11-28', 1, 5, 0),
(13, 90, 100, 4, '1000.00', '2020-11-28', 1, 6, 0),
(14, 138, 150, 5, '1000.00', '2020-11-28', 1, 6, 0),
(15, 146, 150, 5, '1500.00', '2020-12-22', 1, 10, 0),
(16, 145, 150, 6, '1500.00', '2020-12-22', 1, 10, 0),
(17, 145, 150, 7, '1500.00', '2020-12-22', 1, 10, 0),
(18, 95, 100, 2, '1500.00', '2020-12-22', 1, 9, 0),
(19, 88, 100, 3, '1200.00', '2021-01-18', 1, 13, 0),
(20, 97, 100, 4, '1200.00', '2021-01-18', 1, 13, 0),
(21, 49, 50, 5, '2000.00', '2021-01-18', 1, 12, 0),
(22, 45, 50, 6, '2000.00', '2021-01-18', 1, 12, 0),
(23, 98, 100, 6, '5000.00', '2021-01-20', 1, 14, 0),
(24, 97, 100, 7, '5000.00', '2021-01-20', 1, 14, 0),
(25, 147, 150, 8, '1200.00', '2021-01-20', 1, 15, 0),
(26, 142, 150, 9, '1200.00', '2021-01-20', 1, 15, 0),
(27, 95, 100, 8, '1200.00', '2021-02-10', 1, 16, 0),
(28, 96, 100, 9, '1000.00', '2021-02-10', 1, 17, 0),
(29, 96, 100, 3, '2000.00', '2021-02-10', 1, 18, 0),
(30, 97, 100, 4, '2000.00', '2021-02-10', 1, 18, 0),
(31, 99, 100, 5, '1000.00', '2021-05-02', 1, 7, 0),
(32, 99, 100, 6, '1000.00', '2021-05-02', 1, 8, 0),
(33, 93, 100, 2, '5000.00', '2021-05-02', 1, 19, 0),
(34, 93, 100, 3, '5000.00', '2021-04-27', 1, 21, 0),
(35, 100, 100, 2, '2000.00', '2021-04-27', 1, 20, 0),
(36, 100, 100, 3, '2000.00', '2021-04-27', 1, 20, 0),
(37, 97, 100, 2, '2000.00', '2021-04-27', 1, 22, 0),
(38, 97, 100, 3, '2000.00', '2021-04-27', 1, 23, 0),
(39, 93, 100, 2, '1000.00', '2021-04-27', 1, 24, 0),
(40, 92, 100, 8, '1000.00', '2021-04-27', 1, 25, 0),
(41, 100, 100, 4, '5000.00', '2021-05-04', 1, 26, 0),
(42, 100, 100, 2, '5000.00', '2021-05-04', 1, 1, 20),
(43, 21, 100, 2, '5000.00', '2021-05-04', 1, 1, 20),
(44, 20, 100, 2, '5000.00', '2021-05-04', 1, 1, 20),
(45, 15, 100, 2, '2000.00', '2021-05-04', 1, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Administrator', 1),
(2, 'Cashier', 1),
(3, 'Stock keeper', 1),
(4, 'Deliver manager', 1),
(5, 'Data entry clerk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_module`
--

CREATE TABLE `role_has_module` (
  `role_role_id` int(11) NOT NULL,
  `module_module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_has_module`
--

INSERT INTO `role_has_module` (`role_role_id`, `module_module_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(3, 4),
(4, 4),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `r_material`
--

CREATE TABLE `r_material` (
  `r_material_id` int(11) NOT NULL,
  `r_material_name` varchar(45) NOT NULL,
  `r_m_category_r_m_category_id` int(11) NOT NULL,
  `r_m_collection_r_m_collection_id` int(11) NOT NULL,
  `r_m_subcategory_r_m_subcategory_id` int(11) NOT NULL,
  `unit_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_material`
--

INSERT INTO `r_material` (`r_material_id`, `r_material_name`, `r_m_category_r_m_category_id`, `r_m_collection_r_m_collection_id`, `r_m_subcategory_r_m_subcategory_id`, `unit_unit_id`) VALUES
(1, 'Black sole sheet', 1, 1, 1, 1),
(2, 'Blue Sole Sheet', 1, 1, 1, 1),
(3, 'Small Gold Eyelet ', 3, 3, 5, 3),
(4, 'Small Aluminum Shoe Eyelet', 3, 3, 4, 3),
(5, 'Small PVC Flip Flops Straps', 2, 2, 3, 3),
(6, 'Small Eva Sheet', 1, 1, 6, 1),
(7, 'Small Black Sole', 4, 1, 7, 3),
(8, 'Large Red Rubber Strap', 2, 1, 2, 3),
(9, 'Large Pink PVC Strap', 2, 2, 3, 3),
(10, 'Plain Eva Rubber Sheet', 1, 1, 6, 1),
(11, 'Large Shoe Red Eyelet', 3, 3, 4, 3),
(12, 'Rubber Solve  Sheet', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_category`
--

CREATE TABLE `r_m_category` (
  `r_m_category_id` int(11) NOT NULL,
  `r_m_category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_category`
--

INSERT INTO `r_m_category` (`r_m_category_id`, `r_m_category_name`) VALUES
(1, 'Sheet'),
(2, 'Strap'),
(3, 'Eyelet'),
(4, 'Sole');

-- --------------------------------------------------------

--
-- Table structure for table `r_m_collection`
--

CREATE TABLE `r_m_collection` (
  `r_m_collection_id` int(11) NOT NULL,
  `r_m_collection_name` varchar(45) NOT NULL,
  `r_m_collection_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_collection`
--

INSERT INTO `r_m_collection` (`r_m_collection_id`, `r_m_collection_name`, `r_m_collection_status`) VALUES
(1, 'Rubber', 1),
(2, 'Plastic', 1),
(3, 'Metal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_collection_has_r_m_category`
--

CREATE TABLE `r_m_collection_has_r_m_category` (
  `r_m_collection_r_m_collection_id` int(11) NOT NULL,
  `r_m_category_r_m_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_collection_has_r_m_category`
--

INSERT INTO `r_m_collection_has_r_m_category` (`r_m_collection_r_m_collection_id`, `r_m_category_r_m_category_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 2),
(2, 4),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_collection_has_r_m_subcategory`
--

CREATE TABLE `r_m_collection_has_r_m_subcategory` (
  `r_m_collection_r_m_collection_id` int(11) NOT NULL,
  `r_m_subcategory_r_m_subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_collection_has_r_m_subcategory`
--

INSERT INTO `r_m_collection_has_r_m_subcategory` (`r_m_collection_r_m_collection_id`, `r_m_subcategory_r_m_subcategory_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 7),
(2, 3),
(2, 8),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_image`
--

CREATE TABLE `r_m_image` (
  `r_m_image_id` int(11) NOT NULL,
  `r_m_image_name` varchar(45) NOT NULL,
  `r_material_r_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_image`
--

INSERT INTO `r_m_image` (`r_m_image_id`, `r_m_image_name`, `r_material_r_material_id`) VALUES
(1, '1619708138_sole-sheets-250x250.jpg', 1),
(2, '1619708094_hawai-rubber-sheet-500x500.jpg', 2),
(3, '1619707650_metal-eyelet-250x250.jpg', 3),
(4, '1619707767_aluminium-shoe-eyelets-250x250.jpg', 4),
(5, '1619708060_pvc-footwear-strap-250x250.jpg', 5),
(6, '1619708415_eva-sheets-500x500.jpg', 6),
(7, '1619713434_images (43).jpg', 7),
(8, '1619713511_images (39).jpg', 8),
(9, '1619713637_images (63).jpg', 9),
(10, '1619713823_plain eva foam sheet.jpg', 10),
(11, '1612953253_images (69).jpg', 11),
(12, '1612953437_rubber solve sheet.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_order`
--

CREATE TABLE `r_m_order` (
  `r_m_order_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `r_material_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `unit` varchar(45) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_order`
--

INSERT INTO `r_m_order` (`r_m_order_id`, `supplier_id`, `r_material_id`, `price`, `qty`, `unit`, `sub_total`, `status`) VALUES
(1, 2, 11, 40000.00, '10', 'roll', 400000.00, '0'),
(2, 2, 17, 400005.00, '105', 'roll', 42000525.00, '0'),
(3, 1, 1, 40000.00, '2', 'roll', 80000.00, '0'),
(4, 1, 11, 400005.00, '20', 'roll', 8000100.00, '0'),
(5, 1, 16, 4000010.00, '2', 'roll', 8000020.00, '0'),
(6, 2, 12, 40000.00, '10', 'roll', 400000.00, '0'),
(7, 2, 17, 4005.00, '105', 'roll', 420525.00, '0'),
(8, 2, 15, 40000.00, '10', 'roll', 400000.00, '0'),
(9, 2, 15, 4.00, '10', 'roll', 400000.00, '0'),
(10, 2, 15, 4.00, '10', 'roll', 400000.00, '0'),
(11, 2, 15, 4.00, '1', 'roll', 4.00, '0'),
(12, 2, 1, 2.00, '10', 'roll', 20.00, '0'),
(13, 2, 12, 40000.00, '10', 'roll', 400000.00, '0'),
(14, 2, 2, 40000.00, '10', 'roll', 400000.00, '0'),
(15, 2, 1, 40000.00, '10', 'roll', 400000.00, '0'),
(16, 2, 15, 405.00, '1', 'rolls', 405.00, '0'),
(17, 1, 2, 40.00, '10', 'roll', 400.00, '1'),
(18, 2, 2, 40000.00, '10', 'roll', 400000.00, '0'),
(19, 2, 16, 4000010.00, '100', 'rolls', 99999999.99, '0'),
(20, 2, 13, 40000.00, '10', 'roll', 400000.00, '0'),
(21, 2, 2, 40000.00, '10', 'roll', 400000.00, '0'),
(22, 2, 11, 40000.00, '10', 'roll', 400000.00, '0'),
(23, 2, 12, 40000.00, '10', 'roll', 400000.00, '0'),
(24, 2, 2, 40000.00, '10', 'roll', 400000.00, '0'),
(25, 2, 11, 400.00, '10', 'roll', 400000.00, '0'),
(26, 2, 11, 400.00, '10', 'roll', 400000.00, '0'),
(27, 2, 11, 4000010.00, '10', 'roll', 400000.00, '0'),
(28, 2, 11, 4000010.00, '10', 'roll', 400000.00, '0'),
(29, 2, 11, 4000010.00, '10', 'roll', 400000.00, '0'),
(30, 1, 11, 40000.00, '10', 'roll', 400000.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `r_m_stock`
--

CREATE TABLE `r_m_stock` (
  `r_m_stock_id` int(11) NOT NULL,
  `r_m_stock_a_quantity` int(11) NOT NULL,
  `c_quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `unit_name` varchar(45) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `r_material_id` int(45) NOT NULL,
  `stock_date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `grn_grn_id` int(11) NOT NULL,
  `sub_total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_stock`
--

INSERT INTO `r_m_stock` (`r_m_stock_id`, `r_m_stock_a_quantity`, `c_quantity`, `unit_price`, `unit_name`, `supplier_id`, `r_material_id`, `stock_date`, `status`, `grn_grn_id`, `sub_total`) VALUES
(1, 100, 100, '40000.00', ' Sheet', 1, 1, '2020-10-06', '1', 1, 4000000.00),
(2, 50, 50, '3000.00', ' Sheet', 1, 2, '2020-10-09', '1', 2, 150000.00),
(3, 20, 20, '1000.00', ' Packet', 1, 3, '2020-10-09', '1', 2, 20000.00),
(4, 30, 30, '1500.00', ' Packet', 2, 4, '2020-10-09', '1', 3, 45000.00),
(5, 50, 50, '2500.00', ' Packet', 2, 5, '2020-10-09', '1', 3, 125000.00),
(6, 100, 100, '300.00', ' Packet', 1, 9, '2020-10-12', '1', 4, 30000.00),
(7, 10, 10, '1000.00', ' Packet', 2, 9, '2020-10-12', '1', 5, 10000.00),
(8, 100, 100, '40000.00', ' Packet', 3, 3, '2020-11-02', '1', 6, 4000000.00),
(9, 100, 100, '2000.00', ' Sheet', 3, 6, '2020-11-02', '1', 6, 200000.00),
(10, 10, 10, '40000.00', ' Sheet', 3, 6, '2021-01-27', '1', 7, 400000.00),
(11, 10, 10, '40000.00', ' Packet', 3, 4, '2021-01-27', '1', 7, 400000.00),
(12, 20, 20, '1000.00', ' Packet', 3, 3, '2021-05-03', '1', 8, 20000.00),
(13, 20, 20, '2000.00', ' Packet', 3, 5, '2021-05-03', '1', 8, 40000.00),
(14, 100, 100, '40000.00', ' Sheet', 2, 1, '2021-05-04', '1', 9, 4000000.00),
(15, 100, 100, '50000.00', ' Packet', 2, 3, '2021-05-04', '1', 9, 5000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `r_m_subcategory`
--

CREATE TABLE `r_m_subcategory` (
  `r_m_subcategory_id` int(11) NOT NULL,
  `r_m_subcategory_name` varchar(45) NOT NULL,
  `r_m_category_r_m_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `r_m_subcategory`
--

INSERT INTO `r_m_subcategory` (`r_m_subcategory_id`, `r_m_subcategory_name`, `r_m_category_r_m_category_id`) VALUES
(1, 'Sole Sheet', 1),
(2, 'Rubber Strap', 2),
(3, 'PVC Strap', 2),
(4, 'Aluminum Eyelet', 3),
(5, 'Gold Eyelet', 3),
(6, 'Eva Sheet', 1),
(7, 'Rubber Sole', 4),
(8, 'PVC Sole', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `product_qty` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  `product_price` varchar(45) NOT NULL,
  `product_subtotal` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `invoice_invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `product_qty`, `size`, `product_price`, `product_subtotal`, `product_id`, `invoice_invoice_id`) VALUES
(1, '2', '2', '1500.00', '3000.00', 1, 1),
(2, '1', '4', '1000.00', '1000.00', 5, 1),
(3, '2', '4', '1000.00', '2000.00', 6, 1),
(4, '1', '3', '3000.00', '3000.00', 3, 2),
(5, '1', '5', '1000.00', '1000.00', 6, 2),
(6, '1', '4', '1000.00', '1000.00', 5, 2),
(7, '2', '9', '2000.00', '4000.00', 4, 4),
(8, '3', '5', '2000.00', '6000.00', 2, 4),
(9, '1', '2', '1500.00', '1500.00', 9, 9),
(10, '1', '5', '1000.00', '1000.00', 6, 9),
(11, '1', '8', '2000.00', '2000.00', 4, 9),
(12, '1', '2', '3000.00', '3000.00', 3, 10),
(13, '2', '3', '1500.00', '3000.00', 1, 10),
(14, '2', '4', '1000.00', '2000.00', 5, 10),
(15, '1', '2', '3000.00', '3000.00', 3, 11),
(16, '1', '4', '1000.00', '1000.00', 5, 11),
(17, '1', '7', '1500.00', '1500.00', 10, 16),
(18, '1', '3', '1200.00', '1200.00', 13, 16),
(19, '1', '7', '1500.00', '1500.00', 10, 18),
(20, '1', '5', '1000.00', '1000.00', 6, 18),
(21, '1', '5', '2000.00', '2000.00', 2, 19),
(22, '1', '3', '1500.00', '1500.00', 1, 19),
(23, '1', '8', '1200.00', '1200.00', 16, 20),
(24, '1', '4', '2000.00', '2000.00', 18, 20),
(25, '1', '8', '2000.00', '2000.00', 4, 22),
(26, '1', '5', '2000.00', '2000.00', 12, 22),
(27, '1', '6', '2000.00', '2000.00', 12, 24),
(28, '2', '7', '1500.00', '3000.00', 10, 24),
(29, '1', '6', '5000.00', '5000.00', 14, 24),
(30, '1', '8', '1200.00', '1200.00', 15, 27),
(31, '1', '3', '2000.00', '2000.00', 18, 27),
(32, '1', '3', '1500.00', '1500.00', 1, 28),
(33, '1', '5', '1000.00', '1000.00', 6, 28),
(34, '1', '4', '1200.00', '1200.00', 13, 30),
(35, '1', '9', '2000.00', '2000.00', 4, 30),
(36, '1', '4', '1500.00', '1500.00', 1, 33),
(37, '1', '2', '1500.00', '1500.00', 1, 33),
(38, '1', '8', '2000.00', '2000.00', 4, 35),
(39, '1', '4', '1000.00', '1000.00', 5, 35),
(40, '1', '4', '2000.00', '2000.00', 18, 37),
(41, '1', '2', '5000.00', '5000.00', 19, 37),
(42, '1', '4', '1000.00', '1000.00', 5, 38),
(43, '1', '5', '1000.00', '1000.00', 7, 39),
(44, '2', '2', '5000.00', '10000.00', 19, 39),
(45, '1', '5', '2000.00', '2000.00', 2, 41),
(46, '1', '5', '2000.00', '2000.00', 2, 41),
(47, '1', '6', '1500.00', '1500.00', 10, 43),
(48, '1', '6', '5000.00', '5000.00', 14, 43),
(49, '1', '6', '1500.00', '1500.00', 10, 45),
(50, '1', '3', '3000.00', '3000.00', 3, 45),
(51, '1', '8', '2000.00', '2000.00', 4, 45),
(52, '1', '5', '1500.00', '1500.00', 10, 46),
(53, '1', '3', '1200.00', '1200.00', 13, 46),
(54, '1', '2', '1500.00', '1500.00', 9, 46),
(55, '1', '3', '2000.00', '2000.00', 18, 49),
(56, '1', '7', '5000.00', '5000.00', 14, 49),
(57, '1', '2', '2000.00', '2000.00', 22, 52),
(58, '1', '8', '1000.00', '1000.00', 25, 52),
(59, '1', '4', '1200.00', '1200.00', 13, 53),
(60, '1', '3', '5000.00', '5000.00', 21, 53),
(61, '1', '6', '2000.00', '2000.00', 2, 55),
(62, '1', '3', '1500.00', '1500.00', 1, 55),
(63, '1', '4', '1000.00', '1000.00', 5, 60),
(64, '2', '8', '2000.00', '4000.00', 4, 60),
(65, '2', '3', '1200.00', '2400.00', 13, 60),
(66, '1', '4', '1000.00', '1000.00', 5, 64),
(67, '3', '6', '1500.00', '4500.00', 10, 65),
(68, '2', '2', '1500.00', '3000.00', 9, 65),
(69, '3', '6', '2000.00', '6000.00', 12, 65),
(70, '3', '2', '1000.00', '3000.00', 24, 66),
(71, '1', '8', '1000.00', '1000.00', 25, 66),
(72, '3', '2', '5000.00', '15000.00', 19, 66),
(73, '1', '4', '2000.00', '2000.00', 2, 67),
(74, '3', '8', '1200.00', '3600.00', 16, 67),
(75, '4', '3', '5000.00', '20000.00', 21, 67),
(76, '1', '2', '1500.00', '1500.00', 1, 78),
(77, '1', '4', '1000.00', '1000.00', 5, 78),
(78, '1', '2', '1500.00', '1500.00', 1, 79),
(79, '1', '8', '2000.00', '2000.00', 4, 79),
(80, '1', '4', '1000.00', '1000.00', 5, 79),
(81, '1', '2', '3000.00', '3000.00', 3, 83),
(82, '1', '4', '1000.00', '1000.00', 5, 83),
(83, '1', '2', '1500.00', '1500.00', 1, 85);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 9),
(7, 10),
(8, 32),
(9, 34),
(10, 36),
(11, 38);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(45) NOT NULL,
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_category_id`) VALUES
(1, 'U Sandals', 1),
(2, 'T Strap Sandals', 1),
(3, 'Heel Sandal-T-Strap', 1),
(4, 'Heel Sandal-Slip-On', 1),
(5, 'Kids U Sandals', 1),
(6, 'Flats Shoe', 3),
(7, 'Flat Slipper', 3),
(8, 'Flat Sandal', 3),
(9, 'U Soft Flat Slipper', 3),
(10, 'Slip On Heel', 4),
(11, 'Box Heel', 4),
(12, 'U Strap Heel', 4),
(13, 'Gents Flat Slipper', 2),
(14, 'Laddies Flat Slipper', 2),
(15, 'Kids Flat Slipper', 2),
(16, 'Gent Shoe', 5),
(17, 'Ladies Cover Shoes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_fname` varchar(45) NOT NULL,
  `supplier_lname` varchar(45) NOT NULL,
  `supplier_email` varchar(80) NOT NULL,
  `supplier_address` varchar(45) NOT NULL,
  `supplier_con1` varchar(30) NOT NULL,
  `supplier_con2` varchar(30) NOT NULL,
  `supplier_image` varchar(45) NOT NULL,
  `supplier_gender` int(11) NOT NULL,
  `supplier_create_date` date NOT NULL DEFAULT current_timestamp(),
  `supplier_updated_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_fname`, `supplier_lname`, `supplier_email`, `supplier_address`, `supplier_con1`, `supplier_con2`, `supplier_image`, `supplier_gender`, `supplier_create_date`, `supplier_updated_date`) VALUES
(1, 'Sisira ', 'perera', 'sisira@gmail.com', 'No 3,Bataganwila,Galle', '0912225034', '0777723052', 'defaultImage.jpg', 1, '2020-10-06', '2020-10-06'),
(2, 'Samantha', 'Kumara', 'smantha@gmail.com', 'No 42,Akmeemana Road,Galle', '0916393531', '0772789456', '1601959284_images.jpg', 1, '2020-10-06', '2020-10-06'),
(3, 'Anura', 'Dolamulla', 'anura@gmail.com', 'No 04,Jaya Mawatha,Colombo 10', '0417894563', '0771234567', '1604257917_pp (1).jpg', 1, '2020-11-02', '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_cart`
--

CREATE TABLE `tmp_cart` (
  `tmp_cart_id` int(11) NOT NULL,
  `quntity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmp_cart`
--

INSERT INTO `tmp_cart` (`tmp_cart_id`, `quntity`, `customer_id`, `product_id`, `size_id`, `price`, `sub_total`, `cart_status`) VALUES
(68, 1, 7, 14, 0, '5000.00', '0.00', 0),
(69, 1, 7, 9, 0, '1500.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_cart_order`
--

CREATE TABLE `tmp_cart_order` (
  `tmp_cart_order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmp_cart_order`
--

INSERT INTO `tmp_cart_order` (`tmp_cart_order_id`, `customer_id`, `total`, `pay_amount`) VALUES
(1, 2, '0.00', '0.00'),
(2, 3, '0.00', '0.00'),
(3, 4, '0.00', '0.00'),
(4, 5, '0.00', '0.00'),
(5, 6, '0.00', '0.00'),
(6, 7, '0.00', '0.00'),
(7, 8, '0.00', '0.00'),
(8, 9, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'Sheet'),
(2, 'Roll'),
(3, 'Packet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_no` varchar(45) NOT NULL,
  `user_fname` varchar(45) NOT NULL,
  `user_lname` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_dob` date NOT NULL,
  `user_image` varchar(45) NOT NULL,
  `user_con1` varchar(20) NOT NULL,
  `user_con2` varchar(45) NOT NULL,
  `user_gender` int(11) NOT NULL,
  `user_nic` varchar(45) NOT NULL,
  `user_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(11) NOT NULL,
  `role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_no`, `user_fname`, `user_lname`, `user_email`, `user_dob`, `user_image`, `user_con1`, `user_con2`, `user_gender`, `user_nic`, `user_updated_date`, `user_status`, `role_role_id`) VALUES
(1, 'U_5827001', 'H.H. Dhanushika', 'Madumali', 'dhanushika76@gmail.com', '1995-04-03', '1619789808_me.jpg', '0413420343', '0774116861', 0, '955943171v', '2021-04-30 13:36:48', 1, 1),
(2, 'U_5827002', 'Hasha', 'Imalka', 'hashani@gmail.com', '1997-02-20', '1645717398_Untitled-1@0,33x.png', '0112963214', '0774967443', 0, '978956231v', '2022-02-24 15:43:18', 1, 5),
(3, 'U_5827003', 'Madhushan ', 'Sandaruwan', 'madhushan@gmail.com', '1995-07-31', '1600429125_pp (2).jpg', '0911236495', '0713638077', 1, '954567891v', '2020-09-18 11:38:45', 1, 4),
(4, 'U_5827004', 'Janith', 'Dilshan', 'janith@gmail.com', '1997-08-03', '1600605716_pp (1).jpg', '0411283416', '0713935364', 1, '972163007v', '2020-09-20 12:41:56', 1, 3),
(5, 'U_5827005', 'Kalana ', 'Wijesekara', 'kalan@gmail.com', '1994-05-10', '1603457164_pp.jpg', '0112546197', '0774618732', 1, '946385742v', '2020-10-23 12:46:04', 1, 2),
(6, 'U_5827006', 'harshani', 'priyangika', 'harshanipriya@gmail.com', '1993-03-31', '1620064508_5cb8b133b8342c1b45130629.jpg', '0112613199', '0714116931', 0, '934678912v', '2021-05-03 17:59:59', 0, 2),
(7, 'U_5827007', 'gayathri', 'madushani', 'gayathri@gmail.com', '1998-02-04', '1620106433_5cb8b133b8342c1b45130629.jpg', '0112613194', '0718956211', 0, '984675312v', '2021-05-04 05:33:53', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `collection_has_category`
--
ALTER TABLE `collection_has_category`
  ADD PRIMARY KEY (`collection_collection_id`,`category_category_id`),
  ADD KEY `fk_collection_has_category_category1` (`category_category_id`);

--
-- Indexes for table `collection_has_sub_category`
--
ALTER TABLE `collection_has_sub_category`
  ADD PRIMARY KEY (`collection_collection_id`,`sub_category_sub_category_id`),
  ADD KEY `fk_collection_has_sub_category_sub_category1` (`sub_category_sub_category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`customer_login_id`),
  ADD KEY `fk_customer_login_customer1` (`customer_customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grn_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `fk_invoice_customer1` (`customer_customer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `fk_login_user1` (`user_user_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `order_product_table`
--
ALTER TABLE `order_product_table`
  ADD PRIMARY KEY (`order_product_table_id`),
  ADD KEY `fk_order_product_table_order_table1` (`order_table_order_table_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_table_id`),
  ADD KEY `fk_order_table_customer1` (`customer_customer_id`),
  ADD KEY `fk_order_table_invoice1` (`invoice_invoice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category1` (`category_category_id`),
  ADD KEY `fk_product_collection1` (`collection_collection_id`),
  ADD KEY `fk_product_sub_category1` (`sub_category_sub_category_id`);

--
-- Indexes for table `product_has_size`
--
ALTER TABLE `product_has_size`
  ADD PRIMARY KEY (`product_product_id`,`size_size_id`),
  ADD KEY `fk_product_has_size_size1` (`size_size_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`product_img_id`),
  ADD KEY `fk_Product_img_product1` (`product_product_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`productstock_id`),
  ADD KEY `fk_product_stock_product1` (`product_product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_has_module`
--
ALTER TABLE `role_has_module`
  ADD PRIMARY KEY (`role_role_id`,`module_module_id`),
  ADD KEY `fk_role_has_module_module1` (`module_module_id`);

--
-- Indexes for table `r_material`
--
ALTER TABLE `r_material`
  ADD PRIMARY KEY (`r_material_id`),
  ADD KEY `fk_r_material_r_m_category1` (`r_m_category_r_m_category_id`),
  ADD KEY `fk_r_material_r_m_collection1` (`r_m_collection_r_m_collection_id`),
  ADD KEY `fk_r_material_r_m_subcategory1` (`r_m_subcategory_r_m_subcategory_id`),
  ADD KEY `fk_r_material_unit1` (`unit_unit_id`);

--
-- Indexes for table `r_m_category`
--
ALTER TABLE `r_m_category`
  ADD PRIMARY KEY (`r_m_category_id`);

--
-- Indexes for table `r_m_collection`
--
ALTER TABLE `r_m_collection`
  ADD PRIMARY KEY (`r_m_collection_id`);

--
-- Indexes for table `r_m_collection_has_r_m_category`
--
ALTER TABLE `r_m_collection_has_r_m_category`
  ADD PRIMARY KEY (`r_m_collection_r_m_collection_id`,`r_m_category_r_m_category_id`),
  ADD KEY `fk_r_m_collection_has_r_m_category_r_m_category1` (`r_m_category_r_m_category_id`);

--
-- Indexes for table `r_m_collection_has_r_m_subcategory`
--
ALTER TABLE `r_m_collection_has_r_m_subcategory`
  ADD PRIMARY KEY (`r_m_collection_r_m_collection_id`,`r_m_subcategory_r_m_subcategory_id`),
  ADD KEY `fk_r_m_collection_has_r_m_subcategory_r_m_subcategory1` (`r_m_subcategory_r_m_subcategory_id`);

--
-- Indexes for table `r_m_image`
--
ALTER TABLE `r_m_image`
  ADD PRIMARY KEY (`r_m_image_id`),
  ADD KEY `fk_r_m_image_r_material1` (`r_material_r_material_id`);

--
-- Indexes for table `r_m_order`
--
ALTER TABLE `r_m_order`
  ADD PRIMARY KEY (`r_m_order_id`);

--
-- Indexes for table `r_m_stock`
--
ALTER TABLE `r_m_stock`
  ADD PRIMARY KEY (`r_m_stock_id`),
  ADD KEY `fk_r_m_stock_grn1` (`grn_grn_id`);

--
-- Indexes for table `r_m_subcategory`
--
ALTER TABLE `r_m_subcategory`
  ADD PRIMARY KEY (`r_m_subcategory_id`),
  ADD KEY `fk_r_m_subcategory_r_m_category1` (`r_m_category_r_m_category_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `fk_sale_invoice1` (`invoice_invoice_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `fk_sub _category_category1` (`category_category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tmp_cart`
--
ALTER TABLE `tmp_cart`
  ADD PRIMARY KEY (`tmp_cart_id`);

--
-- Indexes for table `tmp_cart_order`
--
ALTER TABLE `tmp_cart_order`
  ADD PRIMARY KEY (`tmp_cart_order_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_role1` (`role_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `customer_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_product_table`
--
ALTER TABLE `order_product_table`
  MODIFY `order_product_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `product_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `productstock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_material`
--
ALTER TABLE `r_material`
  MODIFY `r_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `r_m_category`
--
ALTER TABLE `r_m_category`
  MODIFY `r_m_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_m_collection`
--
ALTER TABLE `r_m_collection`
  MODIFY `r_m_collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_m_image`
--
ALTER TABLE `r_m_image`
  MODIFY `r_m_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `r_m_order`
--
ALTER TABLE `r_m_order`
  MODIFY `r_m_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `r_m_stock`
--
ALTER TABLE `r_m_stock`
  MODIFY `r_m_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `r_m_subcategory`
--
ALTER TABLE `r_m_subcategory`
  MODIFY `r_m_subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmp_cart`
--
ALTER TABLE `tmp_cart`
  MODIFY `tmp_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tmp_cart_order`
--
ALTER TABLE `tmp_cart_order`
  MODIFY `tmp_cart_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection_has_category`
--
ALTER TABLE `collection_has_category`
  ADD CONSTRAINT `fk_collection_has_category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_collection_has_category_collection1` FOREIGN KEY (`collection_collection_id`) REFERENCES `collection` (`collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `collection_has_sub_category`
--
ALTER TABLE `collection_has_sub_category`
  ADD CONSTRAINT `fk_collection_has_sub_category_collection1` FOREIGN KEY (`collection_collection_id`) REFERENCES `collection` (`collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_collection_has_sub_category_sub_category1` FOREIGN KEY (`sub_category_sub_category_id`) REFERENCES `sub_category` (`sub_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD CONSTRAINT `fk_customer_login_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_product_table`
--
ALTER TABLE `order_product_table`
  ADD CONSTRAINT `fk_order_product_table_order_table1` FOREIGN KEY (`order_table_order_table_id`) REFERENCES `order_table` (`order_table_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `fk_order_table_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_table_invoice1` FOREIGN KEY (`invoice_invoice_id`) REFERENCES `invoice` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_collection1` FOREIGN KEY (`collection_collection_id`) REFERENCES `collection` (`collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_sub_category1` FOREIGN KEY (`sub_category_sub_category_id`) REFERENCES `sub_category` (`sub_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_has_size`
--
ALTER TABLE `product_has_size`
  ADD CONSTRAINT `fk_product_has_size_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_size_size1` FOREIGN KEY (`size_size_id`) REFERENCES `size` (`size_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `fk_Product_img_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `fk_product_stock_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_has_module`
--
ALTER TABLE `role_has_module`
  ADD CONSTRAINT `fk_role_has_module_module1` FOREIGN KEY (`module_module_id`) REFERENCES `module` (`module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_has_module_role1` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_material`
--
ALTER TABLE `r_material`
  ADD CONSTRAINT `fk_r_material_r_m_category1` FOREIGN KEY (`r_m_category_r_m_category_id`) REFERENCES `r_m_category` (`r_m_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_r_material_r_m_collection1` FOREIGN KEY (`r_m_collection_r_m_collection_id`) REFERENCES `r_m_collection` (`r_m_collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_r_material_r_m_subcategory1` FOREIGN KEY (`r_m_subcategory_r_m_subcategory_id`) REFERENCES `r_m_subcategory` (`r_m_subcategory_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_r_material_unit1` FOREIGN KEY (`unit_unit_id`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_m_collection_has_r_m_category`
--
ALTER TABLE `r_m_collection_has_r_m_category`
  ADD CONSTRAINT `fk_r_m_collection_has_r_m_category_r_m_category1` FOREIGN KEY (`r_m_category_r_m_category_id`) REFERENCES `r_m_category` (`r_m_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_r_m_collection_has_r_m_category_r_m_collection1` FOREIGN KEY (`r_m_collection_r_m_collection_id`) REFERENCES `r_m_collection` (`r_m_collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_m_collection_has_r_m_subcategory`
--
ALTER TABLE `r_m_collection_has_r_m_subcategory`
  ADD CONSTRAINT `fk_r_m_collection_has_r_m_subcategory_r_m_collection1` FOREIGN KEY (`r_m_collection_r_m_collection_id`) REFERENCES `r_m_collection` (`r_m_collection_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_r_m_collection_has_r_m_subcategory_r_m_subcategory1` FOREIGN KEY (`r_m_subcategory_r_m_subcategory_id`) REFERENCES `r_m_subcategory` (`r_m_subcategory_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_m_image`
--
ALTER TABLE `r_m_image`
  ADD CONSTRAINT `fk_r_m_image_r_material1` FOREIGN KEY (`r_material_r_material_id`) REFERENCES `r_material` (`r_material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_m_stock`
--
ALTER TABLE `r_m_stock`
  ADD CONSTRAINT `fk_r_m_stock_grn1` FOREIGN KEY (`grn_grn_id`) REFERENCES `grn` (`grn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `r_m_subcategory`
--
ALTER TABLE `r_m_subcategory`
  ADD CONSTRAINT `fk_r_m_subcategory_r_m_category1` FOREIGN KEY (`r_m_category_r_m_category_id`) REFERENCES `r_m_category` (`r_m_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_sale_invoice1` FOREIGN KEY (`invoice_invoice_id`) REFERENCES `invoice` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `fk_sub _category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
