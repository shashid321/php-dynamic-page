-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2017 at 10:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg2`
--

CREATE TABLE `reg2` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `date_posted` varchar(30) NOT NULL,
  `time_posted` time NOT NULL,
  `date_edited` varchar(30) NOT NULL,
  `time_edited` time NOT NULL,
  `public` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg2`
--

INSERT INTO `reg2` (`id`, `detail`, `date_posted`, `time_posted`, `date_edited`, `time_edited`, `public`) VALUES
(5, 'shashi', 'June 28, 2017', '00:10:04', 'June 28, 2017', '22:15:07', 'yes'),
(6, 'Prince shashi', 'June 28, 2017', '00:10:35', 'June 28, 2017', '07:27:05', 'no'),
(7, 'shadasjdahl', 'June 28, 2017', '00:10:48', 'June 28, 2017', '17:22:18', 'yes'),
(8, 'Desai', 'June 28, 2017', '07:26:23', 'June 28, 2017', '22:15:26', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(1, 'shashi', 'shashid321@outlook.com', '11eba10d3544ac6d881143c0ecb59852'),
(2, 'shashidesai', 'shashid321@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Prince', 'shashi321@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'shashid', 'shashi333@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg2`
--
ALTER TABLE `reg2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg2`
--
ALTER TABLE `reg2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
