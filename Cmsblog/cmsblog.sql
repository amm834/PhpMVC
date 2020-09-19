-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2020 at 04:31 PM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`) VALUES
(2, 'All About My Girl Friend');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postid`, `username`, `comment`, `commented_at`) VALUES
(1, 1, 'Aung Myat Moe', 'á€¡á€²á€·á€á€¬á€€á€»á€½á€”á€ºá€á€±á€¬á€·á€ºá€…á€±á€¬á€ºá€•á€«ðŸ˜†', '2020-09-15 20:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `sometext` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `catid`, `title`, `imgpath`, `sometext`, `content`, `created_at`) VALUES
(1, 2, 'á€€á€»á€½á€”á€ºá€á€±á€¬á€·á€ºá€€á€±á€¬á€„á€ºá€™á€œá€±á€¸', 'AMMWEBDEV_FB_IMG_1600020102480.jpg', 'á€žá€°á€€á€€á€»á€½á€”á€ºá€á€±á€¬á€·á€ºá€€á€±á€¬á€„á€ºá€™á€œá€±á€¸á€•á€«á‹á€…á€­á€á€ºá€”á€²á€·á€á€±á€¬á€„á€ºá€™á€•á€¼á€…á€ºá€™á€¾á€¬á€¸á€•á€«á€”á€²á€·á‹:3', 'á€á€€á€šá€ºá€á€±á€¬á€·á€…á€±á€¬á€ºá€™á€›á€¾á€­á€•á€«á€˜á€°á€¸á‹ðŸ‘', '2020-09-15 20:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `userrole` int(10) NOT NULL DEFAULT 0,
  `usertype` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `userrole`, `usertype`, `created_at`) VALUES
(1, 'Aung Myat Moe', 'admin@gmail.com', '$2y$10$19J4Ii95P1Th2beW8n0DtuRsAfPaRWaLJ4wmhQrkqzsz47g.1qPqC', 1, 0, '2020-09-15 13:51:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
