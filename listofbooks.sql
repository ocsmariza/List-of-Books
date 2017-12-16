-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 03:30 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `bookslist`
--

CREATE TABLE `bookslist` (
  `ID` int(11) NOT NULL,
  `College` text NOT NULL,
  `booksname` text NOT NULL,
  `Count` int(11) NOT NULL,
  `dateborrowed` date DEFAULT NULL,
  `datereturned` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookslist`
--

INSERT INTO `bookslist` (`ID`, `College`, `booksname`, `Count`, `dateborrowed`, `datereturned`) VALUES
(22, 'Werpa', 'IC', 1, '2017-12-06', '2017-12-21'),
(21, 'Engineering', 'CED', 2, '2017-12-13', '2017-12-15'),
(19, 'Programming', 'IC', 2, '2017-12-13', '2017-12-15'),
(20, 'Mulawin', 'IC', 1, '2017-12-13', '2017-12-15'),
(18, 'Socitety of Economics', 'SAEC', 1, '2017-12-13', '2017-12-15'),
(23, 'jh', 'ic', 1, '2017-12-21', '2017-12-22'),
(24, 'King Snowman', 'IC', 2, '2017-12-14', '2017-12-21');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookslist`
--
ALTER TABLE `bookslist`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `bookslist`
--
ALTER TABLE `bookslist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
