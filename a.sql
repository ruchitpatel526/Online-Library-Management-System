-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 23, 2018 at 09:06 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `searchengine`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `filename` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `author` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(50) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`filename`, `type`, `author`, `subject`, `date`, `detail`, `fid`) VALUES
('InsertionSort.pdf', 'pdf', 'aaa', 'a', '2018-03-18', 'sort', 1),
('KE-4_FC_vs_BC.pdf', 'pdf', 'a', 'a', '2018-03-18', 'fc', 2),
('ChannelRegistrationFormA4.pdf', 'pdf', 'aa', 'a', '2018-03-18', 'form', 3),
('3d_271.jpg', 'jpg', 'yara', 'a', '2018-03-18', 'image', 5),
('index.php', 'php', 'ruchit', 'index', '2018-03-23', 'ita', 6),
('20180318_181335.gif', 'gif', 'ruchit', 'ita', '2018-03-23', 'adfasd', 7);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `sid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`sid`, `name`, `mail`, `password`, `permission`) VALUES
(3, 'raj', 'rd@gmail.cm', '83W/XkmRXWU2g', 1),
(5, 'Ruchit', 'parthivm20@gmail.com', '83Qp4Chng0ucA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
