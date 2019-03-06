-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2019 at 07:36 AM
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
(3, '9870136019701', 'คอมพิวเตอร์ศึกษา', '001', '2019-02-27'),
(4, '9870136019702', 'ชีวศึกษา', '002', '2019-02-27'),
(5, '9870136019708', 'เทคโนโลยีสารสนเทศ', '001', '2019-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` smallint(6) NOT NULL,
  `book_id` smallint(6) NOT NULL,
  `bo_id` smallint(6) NOT NULL,
  `st_id` tinyint(3) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `period_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_amount`
--

CREATE TABLE `book_amount` (
  `book_a_id` smallint(6) NOT NULL,
  `book_a_code` varchar(15) NOT NULL,
  `book_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('002', 'ชีววิทยา่');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `bo_id` smallint(6) NOT NULL,
  `code` varchar(11) NOT NULL,
  `id_card_num` bigint(13) NOT NULL,
  `prefix_id` tinyint(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dept_id` tinyint(2) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrow_id` smallint(6) NOT NULL,
  `book_id` smallint(6) NOT NULL,
  `bo_id` smallint(6) NOT NULL,
  `st_id` tinyint(3) NOT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `period_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` tinyint(2) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `prefix_id` tinyint(2) NOT NULL,
  `prefix_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `gender` tinyint(1) NOT NULL,
  `dept_id` tinyint(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_category_id` (`book_category_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `bo_id` (`bo_id`),
  ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `book_amount`
--
ALTER TABLE `book_amount`
  ADD PRIMARY KEY (`book_a_id`),
  ADD KEY `book_id` (`book_id`);

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
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `bo_id` (`bo_id`),
  ADD KEY `st_id` (`st_id`);

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
  MODIFY `book_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_amount`
--
ALTER TABLE `book_amount`
  MODIFY `book_a_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `bo_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrow_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `prefix_id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` tinyint(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`book_category_id`) REFERENCES `book_category` (`book_category_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`bo_id`) REFERENCES `borrower` (`bo_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`st_id`) REFERENCES `staff` (`st_id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`booking_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `book_amount`
--
ALTER TABLE `book_amount`
  ADD CONSTRAINT `book_amount_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

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
  ADD CONSTRAINT `borrowing_ibfk_2` FOREIGN KEY (`bo_id`) REFERENCES `borrower` (`bo_id`),
  ADD CONSTRAINT `borrowing_ibfk_3` FOREIGN KEY (`st_id`) REFERENCES `staff` (`st_id`),
  ADD CONSTRAINT `borrowing_ibfk_4` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

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
