-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 04:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fish`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_table`
--

CREATE TABLE `access_table` (
  `access_name` varchar(40) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_table`
--

INSERT INTO `access_table` (`access_name`, `access_level`) VALUES
('Admin', 2),
('Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `order_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL DEFAULT '1',
  `test_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `uploader_id` varchar(10) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(200) NOT NULL,
  `print_status` varchar(10) NOT NULL DEFAULT 'false',
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`order_id`, `warehouse_id`, `test_id`, `amount`, `num`, `uploader_id`, `date_received`, `session_id`, `print_status`, `day`, `month`, `year`) VALUES
(1, 1, 3, 3000, 16, '1', '2018-11-09 23:04:28', 'ceqgeol16smmm4jjnscgot8m80', 'true', 9, 11, 2018),
(2, 1, 5, 2500, 15, '1', '2018-11-09 23:05:30', 'ceqgeol16smmm4jjnscgot8m80', 'true', 9, 11, 2018),
(3, 1, 3, 3000, 7, '1', '2018-11-10 05:58:21', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(4, 1, 7, 21550, 9, '1', '2018-11-10 05:58:37', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(5, 1, 6, 3000, 10, '1', '2018-11-10 07:24:02', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(6, 1, 6, 3000, 42, '1', '2018-11-10 07:28:23', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(7, 1, 6, 3000, 44, '1', '2018-11-10 07:28:54', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(8, 1, 6, 3000, 39, '1', '2018-11-10 07:29:09', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(9, 1, 3, 3000, 147, '1', '2018-11-10 08:16:22', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(10, 1, 4, 7000, 217, '1', '2018-11-10 08:16:33', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(11, 1, 3, 3000, 12, '1', '2018-11-10 09:57:42', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(12, 1, 5, 2500, 15, '1', '2018-11-10 10:02:35', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(13, 1, 3, 3000, 5, '1', '2018-11-10 10:04:35', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(14, 1, 6, 3000, 14, '1', '2018-11-10 10:04:49', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(15, 1, 3, 30, 36, '1', '2018-11-10 10:05:50', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(16, 1, 4, 50, 125, '1', '2018-11-10 10:06:05', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 10, 2018),
(17, 1, 3, 3000, 10, '1', '2018-11-10 12:27:44', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(18, 1, 4, 7000, 15, '1', '2018-11-10 12:27:53', 'ceqgeol16smmm4jjnscgot8m80', 'true', 10, 11, 2018),
(20, 1, 5, 2500, 15, '1', '2018-12-08 10:16:49', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(21, 1, 3, 3000, 3, '1', '2018-12-08 10:42:54', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(22, 1, 3, 3000, 3, '2', '2018-12-08 11:01:47', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(23, 1, 7, 21550, 23, '2', '2018-12-08 11:01:57', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(24, 1, 3, 3000, 1, '2', '2018-12-08 11:02:56', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(27, 6, 3, 3000, 6, '2', '2018-12-08 11:08:59', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(28, 6, 4, 7000, 3, '2', '2018-12-08 11:13:28', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(29, 6, 3, 3000, 1, '1', '2018-12-08 11:18:04', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(30, 1, 3, 3000, 1, '1', '2018-12-08 14:55:49', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018),
(31, 3, 4, 7000, 1, '1', '2018-12-08 15:07:32', 'p9n5q6cdnqu2re5rt588p3g6qk', 'true', 8, 12, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `item_update`
--

CREATE TABLE `item_update` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL DEFAULT '1',
  `test_id` int(11) NOT NULL,
  `quantity_before` int(11) NOT NULL,
  `quantity_added` int(11) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_update`
--

INSERT INTO `item_update` (`id`, `warehouse_id`, `test_id`, `quantity_before`, `quantity_added`, `uploader_id`, `day`, `month`, `year`, `date_uploaded`) VALUES
(1, 1, 5, 30, 4, 1, 9, 11, 2018, '0000-00-00 00:00:00'),
(2, 1, 8, 40, 4, 1, 9, 11, 2018, '2018-11-09 21:53:03'),
(3, 1, 4, 9, 13, 1, 10, 11, 2018, '2018-11-10 06:13:17'),
(4, 1, 7, 34, 12, 1, 10, 11, 2018, '2018-11-10 06:13:25'),
(5, 1, 3, 6, 482, 1, 10, 11, 2018, '2018-11-10 06:52:12'),
(6, 5, 3, 278, 2, 1, 7, 12, 2018, '2018-12-07 20:07:01'),
(7, 2, 5, 19, 30, 1, 8, 12, 2018, '2018-12-08 11:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `staff_table`
--

CREATE TABLE `staff_table` (
  `staff_id` int(11) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `access_level` int(11) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_table`
--

INSERT INTO `staff_table` (`staff_id`, `login_id`, `password`, `access_level`, `creator`, `date_created`) VALUES
(1, 'admin', '1234', 2, '', '2018-05-27 21:15:11'),
(2, 'staff', '123', 1, '', '2018-05-27 21:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 260, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 4, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 23, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 49, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test3`
--

CREATE TABLE `test3` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test3`
--

INSERT INTO `test3` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 6, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test4`
--

CREATE TABLE `test4` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test4`
--

INSERT INTO `test4` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test5`
--

CREATE TABLE `test5` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test5`
--

INSERT INTO `test5` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 299, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test6`
--

CREATE TABLE `test6` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test6`
--

INSERT INTO `test6` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 271, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 3, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 18, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test7`
--

CREATE TABLE `test7` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test7`
--

INSERT INTO `test7` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test8`
--

CREATE TABLE `test8` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test8`
--

INSERT INTO `test8` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test9`
--

CREATE TABLE `test9` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test9`
--

INSERT INTO `test9` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `test10`
--

CREATE TABLE `test10` (
  `test_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `uploader_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test10`
--

INSERT INTO `test10` (`test_id`, `name`, `price`, `quantity`, `uploader_id`, `date`) VALUES
(3, 'Product 2', 3000, 278, '1', '2018-05-28 12:43:44'),
(4, 'Product 3', 7000, 7, '1', '2018-05-28 13:12:06'),
(5, 'Product 4', 2500, 19, '1', '2018-06-14 15:35:40'),
(6, 'Product5', 3000, 1, '1', '2018-11-09 19:35:27'),
(7, 'Product6', 21550, 46, '1', '2018-11-09 19:36:53'),
(8, '45/77', 3000, 10, '1', '2018-11-09 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`) VALUES
(1, 'Warehouse 1'),
(2, 'Warehouse 2'),
(3, 'Warehouse 3'),
(4, 'Warehouse 4'),
(5, 'Warehouse 5'),
(6, 'Warehouse 6'),
(7, 'Warehouse 7'),
(8, 'Warehouse 8'),
(9, 'Warehouse 9'),
(10, 'Warehouse 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_table`
--
ALTER TABLE `access_table`
  ADD PRIMARY KEY (`access_name`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `item_update`
--
ALTER TABLE `item_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_table`
--
ALTER TABLE `staff_table`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test2`
--
ALTER TABLE `test2`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test3`
--
ALTER TABLE `test3`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test4`
--
ALTER TABLE `test4`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test5`
--
ALTER TABLE `test5`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test6`
--
ALTER TABLE `test6`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test7`
--
ALTER TABLE `test7`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test8`
--
ALTER TABLE `test8`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test9`
--
ALTER TABLE `test9`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test10`
--
ALTER TABLE `test10`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `item_update`
--
ALTER TABLE `item_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff_table`
--
ALTER TABLE `staff_table`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test2`
--
ALTER TABLE `test2`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test3`
--
ALTER TABLE `test3`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test4`
--
ALTER TABLE `test4`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test5`
--
ALTER TABLE `test5`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `test6`
--
ALTER TABLE `test6`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test7`
--
ALTER TABLE `test7`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test8`
--
ALTER TABLE `test8`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test9`
--
ALTER TABLE `test9`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test10`
--
ALTER TABLE `test10`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
