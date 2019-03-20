-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2019 at 10:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` smallint(6) NOT NULL,
  `book_isbn` varchar(13) NOT NULL,
  `book_title` varchar(500) NOT NULL,
  `book_category_id` varchar(4) NOT NULL,
  `book_publishing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_isbn`, `book_title`, `book_category_id`, `book_publishing`) VALUES
(2, '9870136019701', 'เทคโนโลยีสารสนเทศ1', '002', '2019-03-20'),
(3, '9870136019708', 'คอมพิวเตอร์ศึกษา3', '001', '2019-03-20'),
(4, '9870136019703', 'ชีวศึกษา3', '002', '2019-03-19'),
(6, '9870136011111', 'เทคโนโลยีสารสนเทศ', '003', '2019-03-21'),
(12, '9870136011112', 'ชีวะ', '003', '2019-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `book_amount`
--

CREATE TABLE `book_amount` (
  `book_a_id` smallint(6) NOT NULL,
  `book_a_code` varchar(15) NOT NULL,
  `book_isbn` varchar(13) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_amount`
--

INSERT INTO `book_amount` (`book_a_id`, `book_a_code`, `book_isbn`, `date_create`) VALUES
(1, '20190321022736', '9870136019703', '2019-03-20 19:27:36'),
(2, '20190321022736', '9870136019701', '2019-03-20 19:27:36'),
(3, '20190321022736', '9870136019708', '2019-03-20 19:27:36'),
(4, '20190321022737', '9870136019708', '2019-03-20 19:27:37'),
(5, '20190321022738', '9870136019701', '2019-03-20 19:27:38'),
(6, '20190321022738', '9870136019703', '2019-03-20 19:27:38'),
(7, '20190321022738', '9870136019703', '2019-03-20 19:27:38'),
(8, '20190321022739', '9870136019703', '2019-03-20 19:27:39'),
(9, '20190321022739', '9870136019701', '2019-03-20 19:27:39'),
(10, '20190321024002', '9870136019708', '2019-03-20 19:40:02'),
(11, '20190321024002', '9870136019708', '2019-03-20 19:40:02'),
(12, '20190321030030', '9870136019708', '2019-03-20 20:00:30'),
(18, '20190321031333', '9870136019708', '2019-03-20 20:13:33'),
(20, '20190321035920', '9870136011111', '2019-03-20 20:59:20'),
(22, '20190321040906', '9870136019701', '2019-03-20 21:09:06'),
(23, '20190321040907', '9870136019701', '2019-03-20 21:09:07'),
(24, '20190321040929', '9870136011111', '2019-03-20 21:09:29'),
(25, '20190321041002', '9870136019701', '2019-03-20 21:10:02'),
(26, '20190321041003', '9870136019701', '2019-03-20 21:10:03'),
(28, '20190321041612', '9870136011112', '2019-03-20 21:16:12'),
(29, '20190321041617', '9870136011112', '2019-03-20 21:16:17'),
(30, '20190321041834', '9870136011112', '2019-03-20 21:18:34'),
(31, '20190321041836', '9870136011112', '2019-03-20 21:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `book_category_id` varchar(4) NOT NULL,
  `book_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `book_category_name`) VALUES
('001', 'คอมพิวเตอร์'),
('002', 'ชีววิทยา่'),
('003', 'สังคม\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `bo_id` smallint(6) NOT NULL,
  `code` varchar(11) NOT NULL,
  `id_card_num` varchar(13) NOT NULL,
  `prefix_id` tinyint(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dept_id` tinyint(2) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`bo_id`, `code`, `id_card_num`, `prefix_id`, `fname`, `lname`, `gender`, `dept_id`, `address`, `tel`, `email`) VALUES
(9, '5811402379', '1319800167370', 1, 'ธนภัทร', 'แววศรี', 1, 1, 'Detudom Ubon', '0801567071', 'thorlivers@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrow_id` smallint(6) NOT NULL,
  `book_a_code` varchar(15) NOT NULL,
  `bo_code` varchar(11) NOT NULL,
  `st_id` tinyint(3) NOT NULL,
  `borrow_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `period_date` date NOT NULL,
  `return_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = ยืมอยู่, 2 = คืนแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrow_id`, `book_a_code`, `bo_code`, `st_id`, `borrow_date`, `period_date`, `return_date`, `status`) VALUES
(2, '20190320164038', '5811402379', 1, '2019-03-20 17:52:22', '2019-03-20', '2019-03-20 17:52:22', 2),
(3, '20190320164038', '5811402379', 1, '2019-03-21 01:39:57', '2019-03-20', '2019-03-21 01:39:57', 2),
(4, '20190320164054', '5811402379', 1, '2019-03-21 01:58:09', '2019-03-20', '2019-03-21 01:58:09', 2),
(5, '20190320164807', '5811402379', 1, '2019-03-20 18:43:01', '2019-03-20', '2019-03-20 18:43:01', 2),
(6, '20190320164807', '5811402379', 1, '2019-03-21 01:41:38', '2019-03-19', '2019-03-21 01:41:38', 2),
(7, '20190320164038', '5811402379', 1, '2019-03-21 02:13:05', '2019-03-21', '2019-03-21 02:13:05', 2),
(9, '20190321022736', '5811402379', 1, '2019-03-21 03:16:43', '2019-03-21', '2019-03-21 03:16:43', 2),
(10, '20190321022737', '5811402379', 1, '2019-03-21 03:20:15', '2019-03-21', '2019-03-21 03:20:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` tinyint(2) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'คณะวิทยาศาสตร์'),
(2, 'คณะบริหารศาสตร์'),
(3, 'คณะนิติศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `prefix_id` tinyint(2) NOT NULL,
  `prefix_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`prefix_id`, `prefix_title`) VALUES
(1, 'นาย'),
(2, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_id` tinyint(3) NOT NULL,
  `code` varchar(11) NOT NULL,
  `prefix _id` tinyint(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dept_id` tinyint(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `code`, `prefix _id`, `fname`, `lname`, `dept_id`, `tel`, `email`, `password`, `datetime_stamp`) VALUES
(1, 'ST001', 1, 'ธนภัทร', 'แววศรี', 1, '0801567071', 'thanapat.wa.58@ubu.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '2019-03-12 06:59:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_category_id` (`book_category_id`),
  ADD KEY `book_isbn` (`book_isbn`) USING BTREE;

--
-- Indexes for table `book_amount`
--
ALTER TABLE `book_amount`
  ADD PRIMARY KEY (`book_a_id`),
  ADD KEY `book_isbn` (`book_isbn`),
  ADD KEY `book_a_code` (`book_a_code`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`bo_id`),
  ADD KEY `prefix _id` (`prefix_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `bo_id` (`bo_code`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `book_a_code` (`book_a_code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `prefix _id` (`prefix _id`),
  ADD KEY `st_dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_amount`
--
ALTER TABLE `book_amount`
  MODIFY `book_a_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `bo_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrow_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `prefix_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`book_category_id`) REFERENCES `book_category` (`book_category_id`);

--
-- Constraints for table `book_amount`
--
ALTER TABLE `book_amount`
  ADD CONSTRAINT `book_amount_ibfk_1` FOREIGN KEY (`book_isbn`) REFERENCES `book` (`book_isbn`);

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_1` FOREIGN KEY (`prefix_id`) REFERENCES `prefix` (`prefix_id`),
  ADD CONSTRAINT `borrower_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

--
-- Constraints for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `borrowing_ibfk_3` FOREIGN KEY (`st_id`) REFERENCES `staff` (`st_id`),
  ADD CONSTRAINT `borrowing_ibfk_4` FOREIGN KEY (`book_a_code`) REFERENCES `book_amount` (`book_a_code`),
  ADD CONSTRAINT `borrowing_ibfk_5` FOREIGN KEY (`bo_code`) REFERENCES `borrower` (`code`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`prefix _id`) REFERENCES `prefix` (`prefix_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
