-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 05:04 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listofbooks`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addtobookslist` (IN `s_name` VARCHAR(11), IN `s_id` VARCHAR(11), IN `col` VARCHAR(50), IN `book` TEXT, IN `c` INT, IN `date_b` DATE, IN `date_r` DATE, IN `stat` VARCHAR(100))  BEGIN
	INSERT INTO bookslist(Student_name,student_id,College,booksname,COUNT,date_borrowed,date_returned,Status)
		VALUES
		(s_name,s_id,col,book,c,date_b,date_r,stat);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookslist`
--

CREATE TABLE `bookslist` (
  `id` int(11) UNSIGNED NOT NULL,
  `Student_name` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `College` varchar(100) NOT NULL,
  `booksname` varchar(200) NOT NULL,
  `Count` int(11) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookslist`
--

INSERT INTO `bookslist` (`id`, `Student_name`, `student_id`, `College`, `booksname`, `Count`, `date_borrowed`, `date_returned`, `Status`) VALUES
(4, 'Mariza Ocoy', '2015-00999', 'Institute of Computing', 'HTML', 1, '2017-12-01', '2017-12-05', 'Not Returned'),
(3, 'Jay Lloyd', '2013-99575', 'Institute of Computing', 'PHP', 1, '2017-11-30', '2017-12-01', 'borrowed'),
(5, 'Theyo', '2015-12345', 'Institute of Computing', 'CSS', 1, '2017-11-01', '2017-11-30', 'Not Returned');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_log`
--

CREATE TABLE `borrow_log` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `Student_name` varchar(100) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `date_barrowed` date NOT NULL,
  `Count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_log`
--

INSERT INTO `borrow_log` (`log_id`, `Student_name`, `student_id`, `date_barrowed`, `Count`) VALUES
(2, '', '2014-99575', '2017-12-20', 1),
(3, '', '2013-88575', '2017-12-20', 1),
(4, '', '2013-99999', '2017-12-21', 1),
(5, '', '2013-22828', '2017-12-28', 5),
(6, '', '2013-22828', '2017-12-28', 5),
(7, '', '2013-00521', '2017-12-28', 1),
(8, '', 'Mariza', '2017-12-28', 1),
(9, '', 'Mariza', '2017-12-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_table`
--

CREATE TABLE `college_table` (
  `id` int(11) NOT NULL,
  `colleges` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_table`
--

INSERT INTO `college_table` (`id`, `colleges`) VALUES
(1, 'Institute of Computing'),
(2, 'College of Engineering'),
(3, 'College of Education'),
(4, 'College of Governance and Business'),
(5, 'College of Technology'),
(6, 'Economics'),
(7, 'Hotel Management');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `privilege` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`, `privilege`) VALUES
(2, 'user', 2),
(1, 'admin', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `showbooks`
-- (See below for the actual view)
--
CREATE TABLE `showbooks` (
`ID` int(11) unsigned
,`Student_name` varchar(100)
,`student_id` varchar(100)
,`College` varchar(100)
,`booksname` varchar(200)
,`Count` int(11)
,`date_borrowed` date
,`date_returned` date
,`Status` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `showlog`
-- (See below for the actual view)
--
CREATE TABLE `showlog` (
`student_id` varchar(11)
,`date_barrowed` date
,`Count` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilege` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `password`, `privilege`) VALUES
(1, 'mariza', '$2y$10$cKUZ7HOg47QwLJn8EO.jmOCW.XaeByszdJBiGfcTmZjENdGcPYN.C', 2),
(2, 'xavier', '$2y$10$HxJZ9j9tiRguKdvIxN5vsOSKgzPBdv0wu/hcnICqgnBgf7KasEiQ6', 1),
(3, 'jaylloyd', '$2y$10$hPtWayaAsWzOJbTrMrG2HeCpe5tE8mXhfr5XE4zRXBaVO6SvqXskK', 2),
(4, 'admin', '$2y$10$yzEWgq5/KFHcxGiy.y7C8e0KHSe68jwJWWxkhM5gFTTEkpF8koh7m', 2),
(5, 'user1', '$2y$10$1AEv.TCC2qMvk/hBdEUys.zSAjkWusA9Jh4Ly46rDgt7n5foczth.', 2),
(6, 'user2', '$2y$10$I4rq2U2qRkoQb.nl2dL6ku/FIm/UXcd1mEGlLiGYnbUzOWoc9bKQG', 2),
(7, 'user3', '$2y$10$P2cATd/yUli71WBZlgtsYuX25jnnDaz05Pt24N/5QTsN1Ju.FbHZe', 2),
(8, 'jayadmin', '$2y$10$Kgz9welsYodu5HYX5khoYuitiPc2eb4Hh2QdDZKGIUw7Z7KDrMHBG', 1);

-- --------------------------------------------------------

--
-- Structure for view `showbooks`
--
DROP TABLE IF EXISTS `showbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showbooks`  AS  (select `bookslist`.`id` AS `ID`,`bookslist`.`Student_name` AS `Student_name`,`bookslist`.`student_id` AS `student_id`,`bookslist`.`College` AS `College`,`bookslist`.`booksname` AS `booksname`,`bookslist`.`Count` AS `Count`,`bookslist`.`date_borrowed` AS `date_borrowed`,`bookslist`.`date_returned` AS `date_returned`,`bookslist`.`Status` AS `Status` from `bookslist`) ;

-- --------------------------------------------------------

--
-- Structure for view `showlog`
--
DROP TABLE IF EXISTS `showlog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showlog`  AS  (select `borrow_log`.`student_id` AS `student_id`,`borrow_log`.`date_barrowed` AS `date_barrowed`,`borrow_log`.`Count` AS `Count` from `borrow_log` order by `borrow_log`.`date_barrowed` desc) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookslist`
--
ALTER TABLE `bookslist`
  ADD KEY `id` (`id`);

--
-- Indexes for table `borrow_log`
--
ALTER TABLE `borrow_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `college_table`
--
ALTER TABLE `college_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookslist`
--
ALTER TABLE `bookslist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `borrow_log`
--
ALTER TABLE `borrow_log`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `college_table`
--
ALTER TABLE `college_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
