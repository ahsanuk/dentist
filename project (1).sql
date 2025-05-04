-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 05:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

-- Name: Ahsan Ul Kabir College Project
   --  https://github.com/ahsanuk    
	 --  https://www.linkedin.com/in/ahsanuk/

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastvisit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `lastvisit`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `first_name`, `last_name`, `email`, `contact`, `subject`, `message`, `_date`, `status`) VALUES
(1, 'swapnil', 'patil', 'swap@mail.com', '456132879', 'sss', 'dfsdfsdf', '2017-04-05', 'CANCEL'),
(2, 'swapnil', 'patil', 'swap@mail.com', '456132879', 'next appoinmnet ', 'please accept this appointment ', '2017-04-20', 'APPROVE'),
(3, 'swapnil', 'patil', 'swap@mail.com', '456132879', 'sub', 'hjhjhjk', '2017-01-05', 'PENDING'),
(4, 'swapnil', 'patil', 'swap@mail.com', '456132879', 'sub', 'hjhjhjk', '2017-01-06', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_created_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `last visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `gender`, `email`, `contact`, `address`, `password`, `account_created_date`, `status`, `last visit`) VALUES
(3, 'darshan', 'jadiye', 'male', 'dj@mail.com', '7894613145', 'raver', 'pass123', '2017-04-20', 'ACTIVE', '2017-04-11 12:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastvisit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `email`, `contact`, `address`, `password`, `lastvisit`) VALUES
(1, 'swapnil', 'patil', 'male', 'swap@mail.com', '456132879', 'dhule', 'pass123', '2017-04-11 13:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `website_contents`
--

CREATE TABLE `website_contents` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `fields` varchar(256) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_contents`
--

INSERT INTO `website_contents` (`id`, `name`, `fields`, `value`) VALUES
(3, 'consultation_fees', 'Ostheopathic Manipulation Therapy', '200'),
(4, 'consultation_fees', 'Urgent Medical Concerns', '40'),
(10, 'services', 'Emergency Contraception', 'NULL'),
(11, 'services', 'Laboratory', 'NULL'),
(12, 'services', 'Ostheopathic Manipulation Therapy', 'NULL'),
(13, 'services', 'Urgent Medical Concerns', 'NULL'),
(14, 'services', 'Weight Management', 'NULL'),
(15, 'consultation_fees', 'consultation demo ', '200'),
(16, 'consultation_fees', 'again consult', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_contents`
--
ALTER TABLE `website_contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `website_contents`
--
ALTER TABLE `website_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
