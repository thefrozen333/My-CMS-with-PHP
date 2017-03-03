-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 02:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(3) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(3, 'Game Discussions'),
(2, 'Game Guides'),
(4, 'Game News'),
(1, 'Game Reviews'),
(7, 'Raffles');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` int(3) NOT NULL,
  `CategoryId` int(3) NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `Image` text CHARACTER SET utf8 NOT NULL,
  `Content` text CHARACTER SET utf8 NOT NULL,
  `Tags` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CommentCount` int(11) NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'draft '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `CategoryId`, `Title`, `Author`, `Date`, `Image`, `Content`, `Tags`, `CommentCount`, `Status`) VALUES
(1, 2, 'Diablo 3: Reaper of Souls New Barbarian Season Build', 'George Carwin', '2017-02-25', 'barb.jpg', 'The purpose of the beginner Barbarian guide is to provide you with a build and item recommendations that will reliably carry you from leveling, through the pre-Torment difficulties and get you into low Torment farming, without requiring specific legendary or set bonuses. The guide also includes a section for Season 9 Barbarians, explaining how best to take advantage of the free set from Haedrig\'s Gifts.', 'diablo3, barbarian, season, build, guide', 0, 'draft '),
(2, 1, 'Witcher 3 Review', 'Richard Banks', '2017-02-17', 'Witcher3_review.jpg', 'Unlike its predecessor, The Witcher 3: Wild Hunt doesn\'t exactly come screaming off the starting line. Compared to The Witcher 2, where you\'re immediately plunged headlong into a sexy story of intrigue and betrayal, this main quest can seem mundane, even perfunctory at times. But each time I stepped off the well-beaten path to blaze my own trail, it turned into a wild, open, exhilarating fantasy roleplaying experience, rife with opportunities to make use of its excellent combat. Even after over 100 hours with The Witcher 3, it still tempts me to press on - there\'s so much more I want to learn, and hunt.', 'witcher, rpg, review', 0, 'draft ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Name_2` (`Name`),
  ADD UNIQUE KEY `Name_3` (`Name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
