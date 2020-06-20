-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 03:37 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vista`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans_detail`
--

CREATE TABLE `trans_detail` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_detail`
--

INSERT INTO `trans_detail` (`id`, `cust_id`, `type`, `date`, `amount`) VALUES
(2, 13, 'credit', '2020-06-13', 3434),
(3, 15, 'credit', '2020-06-23', 3434),
(4, 16, 'credit', '2020-06-23', 3434),
(5, 14, 'credit', '2020-08-19', 3434);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `accountno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `married_status` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `accountno`, `name`, `fname`, `married_status`, `contact`, `image`, `role`, `username`, `password`) VALUES
(1, '0', '', '', '', 0, '', 0, 'admin', '0192023a7bbd73250516f069df18b500'),
(12, 'ad0b092a0bd75df4', 'test', 'sdsd', 'yes', 1234567890, 'image114.jpg', 1, '', ''),
(13, '0046cb8dc539434d', 'test', 'sdsd', 'yes', 1234567890, 'image116.jpg', 1, '', ''),
(14, '5c6db419bb161d53', 'test', 'sdsd', 'yes', 1234567890, '53.jpg', 1, '', ''),
(15, 'd8e1325f0335499e', 'xcxc', 'sdsd', 'yes', 1234567890, 'pic_010_png.jpg', 1, '', ''),
(16, '0ec4183ab19526da', 'priya', 'dd', 'yes', 1234567890, '52.jpg', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_detail`
--
ALTER TABLE `trans_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accountno` (`accountno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_detail`
--
ALTER TABLE `trans_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
