-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2016 at 09:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrapbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` text,
  `bio` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `password`, `email`, `avatar`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'B-Matt', 'fd9d94340dbd72c11b37ebb0d2a19b4d05e00fd78e4e2ce8923b9ea3a54e900df181cfb112a8a73228d1f3551680e2ad9701a4fcfb248fa7fa77b95180628bb2', 'test@gmail.com', 'https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-9/13342896_105999229824012_7010689265060832149_n.jpg?oh=c99693ec80945a70a20604395a6b0556&oe=58C4355D', 'Croatia | Programmer | Scrapbook CEO', '2016-11-12 14:36:46', '2016-11-12 14:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `poster_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(70) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `poster_id`, `path`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/Chow-Chow-dog.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(2, 1, 'images/cat.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(3, 1, 'images/rabbit.jpg', 5, '2016-11-13 15:47:00', '2016-11-12 23:00:00'),
(4, 1, 'images/Chow-Chow-dog.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(5, 1, 'images/cat.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(6, 1, 'images/rabbit.jpg', 5, '2016-11-13 15:47:00', '2016-11-12 23:00:00'),
(7, 1, 'images/Chow-Chow-dog.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(8, 1, 'images/cat.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(9, 1, 'images/rabbit.jpg', 5, '2016-11-13 15:47:00', '2016-11-12 23:00:00'),
(10, 1, 'images/Chow-Chow-dog.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(11, 1, 'images/cat.jpg', 5, '2016-11-13 15:23:43', '2016-11-12 23:00:00'),
(12, 1, 'images/rabbit.jpg', 5, '2016-11-13 15:47:00', '2016-11-12 23:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
