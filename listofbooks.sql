-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 08:46 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `addtobookslist` (IN `s_id` VARCHAR(11), IN `col` VARCHAR(50), IN `book` TEXT, IN `c` INT, IN `date_b` DATE, IN `date_r` DATE)  BEGIN
	INSERT INTO bookslist(student_id,College,booksname,COUNT,date_borrowed,date_returned)
		VALUES
		(s_id,col,book,c,date_b,date_r);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `adminid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `adminid`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookslist`
--

CREATE TABLE `bookslist` (
  `ID` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `College` varchar(50) DEFAULT NULL,
  `booksname` text NOT NULL,
  `Count` int(11) NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookslist`
--

INSERT INTO `bookslist` (`ID`, `student_id`, `College`, `booksname`, `Count`, `date_borrowed`, `date_returned`) VALUES
(44, '2014-99575', 'CAS', 'Harry Potter', 1, '2017-12-20', '2017-12-27'),
(1, '2013-99575', 'IC', 'Petmalu Book', 1, '2017-12-20', '2017-12-25'),
(45, '2013-88575', 'IC', 'Tutorial', 1, '2017-12-20', '2017-12-25'),
(46, '2013-99999', 'SAO', 'IC', 1, '2017-12-21', '2017-12-28');

--
-- Triggers `bookslist`
--
DELIMITER $$
CREATE TRIGGER `after_booklist_inserted` AFTER INSERT ON `bookslist` FOR EACH ROW BEGIN
	INSERT INTO borrow_log(student_id,date_barrowed,Count) values (NEW.student_id,NEW.date_borrowed,NEW.Count);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_log`
--

CREATE TABLE `borrow_log` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `date_barrowed` date NOT NULL,
  `Count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_log`
--

INSERT INTO `borrow_log` (`log_id`, `student_id`, `date_barrowed`, `Count`) VALUES
(2, '2014-99575', '2017-12-20', 1),
(3, '2013-88575', '2017-12-20', 1),
(4, '2013-99999', '2017-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `IC` text NOT NULL,
  `CE` text NOT NULL,
  `SAEC` text NOT NULL,
  `CGB` text NOT NULL,
  `CED` text NOT NULL,
  `CAS` text NOT NULL,
  `CT` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `IC`, `CE`, `SAEC`, `CGB`, `CED`, `CAS`, `CT`) VALUES
(1, 'Programming', 'Statistics', 'Political Views', 'Business ', 'Physical Matter ABout something', 'Arts and Literature', 'How to fixed PC');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `Books Name` text NOT NULL,
  `Books Number` int(11) NOT NULL,
  `Date Borrowed` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `showbookslist`
-- (See below for the actual view)
--
CREATE TABLE `showbookslist` (
`ID` int(11)
,`student_id` varchar(11)
,`College` varchar(50)
,`booksname` text
,`Count` int(11)
,`date_borrowed` date
,`date_returned` date
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `studentid` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `studentid`) VALUES
(1, '2013-00521'),
(2, '2013-99575');

-- --------------------------------------------------------

--
-- Structure for view `showbookslist`
--
DROP TABLE IF EXISTS `showbookslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showbookslist`  AS  (select `bookslist`.`ID` AS `ID`,`bookslist`.`student_id` AS `student_id`,`bookslist`.`College` AS `College`,`bookslist`.`booksname` AS `booksname`,`bookslist`.`Count` AS `Count`,`bookslist`.`date_borrowed` AS `date_borrowed`,`bookslist`.`date_returned` AS `date_returned` from `bookslist`) ;

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `bookslist`
--
ALTER TABLE `bookslist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `borrow_log`
--
ALTER TABLE `borrow_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookslist`
--
ALTER TABLE `bookslist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `borrow_log`
--
ALTER TABLE `borrow_log`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
