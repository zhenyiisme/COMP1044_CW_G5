-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 03:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `book_id` int(20) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_copies` int(20) NOT NULL,
  `book_pub` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `copyright_year` year(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category`, `author`, `book_copies`, `book_pub`, `isbn`, `copyright_year`, `date_added`, `status`) VALUES
(15, 'Natural Resources', 'General', 'Robin Kerrod', 15, 'Marshall Cavendish Corporation', '1-85435-628-3', 1997, '2013-12-11 06:34:00', 'New'),
(16, 'Encyclopedia Americana', 'Encyclopedia', 'Grolier', 20, 'Connecticut', '0-7172-0119-8', 1988, '2013-12-11 06:36:00', 'Archive'),
(17, 'Algebra 1', 'Math', 'Carolyn Bradshaw, Michael Seals', 35, 'Pearson Education, Inc.', '0-13-125087-6', 2004, '2013-12-11 06:39:00', 'Damage'),
(18, 'The Philippine Daily Inquirer', 'Newspaper', 'NULL', 3, 'Pasay City', 'NULL', 2013, '2013-12-11 06:41:00', 'New'),
(19, 'Science in our World', 'Science', 'Brian Knapp', 25, 'Regency Publishing Group', '0-13-050841-1', 1996, '2013-12-11 06:44:00', 'Lost'),
(20, 'Literature', 'References', 'Greg Glowka', 20, 'Regency Publishing Group', '0-13-050841-1', 2001, '2013-12-11 06:47:00', 'Old'),
(21, 'Lexicon Universal Encyclopedia', 'Encyclopedia', 'Lexicon', 10, 'Lexicon Publication', '0-7172-2043-5', 1993, '2013-12-11 06:49:00', 'Old'),
(22, 'Science and Invention Encyclopedia', 'Encyclopedia', 'Clarke Donald, Dartford Mark', 16, 'H.S. Stuttman inc. Publishing', '0-87475-450-x', 1992, '2013-12-11 06:52:00', 'New'),
(23, 'Integrated Science Textbook', 'Science', 'Merde C. Tan', 15, 'Vibal Publishing House Inc.', '971-570-124-8', 2009, '2013-12-11 06:55:00', 'New'),
(24, 'Algebra 2', 'Math', 'Glencoe McGraw Hill', 15, 'The McGrawHill Companies Inc.', '978-0-07-873830-2', 2008, '2013-12-11 06:57:00', 'New'),
(25, 'Wiki at Panitikan', 'Newspaper', 'Lorenza P. Avera', 28, 'JGM & S Corporation', '971-07-1574-7', 2000, '2013-12-11 06:59:00', 'Damage'),
(26, 'English Expressways TextBook for 4th year', 'References', 'Virginia Bermudez Ed. O. et al', 23, 'SD Publications, Inc.', '978-971-0315-33-8', 2007, '2013-12-11 07:01:00', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan', 'General', 'Ricardo T. Jose, Ph . D.', 21, 'Vibal Publishing House Inc.', '971-07-2324-3', 2008, '2013-12-11 07:02:00', 'New'),
(28, 'Literature (the readers choice)', 'References', 'Glencoe McGraw Hill', 20, 'the McGrawHill Companies Inc.', '0-02-817934-x', 2001, '2013-12-11 07:05:00', 'Damage'),
(29, 'Beloved a Novel', 'References', 'Toni Morrison', 13, 'Alfred A. Knoff, Inc.', '0-394-53597-9', 1987, '2013-12-11 07:07:00', 'Old'),
(30, 'Silver Burdett Engish', 'English', 'Judy Brim', 12, 'Silver Burdett Company', '0-382-03575-5', 1985, '2013-12-11 09:22:00', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', 'General', 'Douglas K. Ramsey', 8, 'Houghton Miffin Company', '0-395-35487-0', 1987, '2013-12-11 09:25:00', 'Old'),
(32, 'Introduction to Information System', 'References', 'Cristine Redoblo', 10, 'CHMSC', '123-132', 2013, '2014-01-17 19:00:00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(20) NOT NULL,
  `member_id` int(20) NOT NULL,
  `date_borrow` datetime NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `date_borrow`, `due_date`) VALUES
(482, 52, '2014-03-20 23:38:00', '2014-03-21'),
(483, 55, '2014-03-20 23:49:00', '2014-03-21'),
(484, 55, '2014-03-20 23:50:00', '2014-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL,
  `borrow_id` int(20) NOT NULL,
  `borrow_status` varchar(255) NOT NULL,
  `date_return` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrow_status`, `date_return`) VALUES
(162, 15, 482, 'pending', NULL),
(163, 15, 483, 'returned', '2014-03-21 00:30:00'),
(164, 16, 484, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(30) NOT NULL,
  `type` varchar(255) NOT NULL,
  `year_level` varchar(255) DEFAULT NULL,
  `ban_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type`, `year_level`, `ban_status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', 212010, 'Teacher', NULL, 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona', 0, 'Student', 'Second Year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', 9, 'Student', 'First Year', 'Active'),
(55, 'Jonathan', 'Antanilla', 'Male', 'E.B. Magalona', 32, 'Student', 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', 3030, 'Student', 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', 90902, 'Student', 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', 123, 'Student', 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', 9340, 'Student', 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', 132134, 'Student', 'Second Year', 'Active'),
(62, 'Chairty Joy', 'Punzalan', 'Female', 'E.B. Magalona', 12423, 'Teacher', NULL, 'Active'),
(63, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', 1321, 'Student', 'Second Year', 'Active'),
(64, 'Chinie marie', 'Laborosa', 'Female', 'E.B. Magalona', 902101, 'Student', 'Second Year', 'Active'),
(65, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', 0, 'Teacher', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin', 'john', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `FK_memberid` (`member_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`),
  ADD KEY `FK_bookid` (`book_id`),
  ADD KEY `FK_borrowid` (`borrow_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrow_details_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `FK_memberid` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `FK_bookid` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_borrowid` FOREIGN KEY (`borrow_id`) REFERENCES `borrow` (`borrow_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
