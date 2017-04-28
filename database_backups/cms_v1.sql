-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 11:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `PostId`, `Title`, `Author`, `Email`, `Content`, `Status`, `Date`) VALUES
(2, 1, 'saaststatas', 'aststsatas', 'astsa@aadb.bg', 'sattsatasats', 'approved', '2017-04-26'),
(3, 1, '', 'asfasffas', 'fasasfasf@abv.bg', 'asgagsagsgasgs', 'approved', '2017-04-20'),
(4, 1, '', 'rrrrrrrr', 'rrrr@abv.bg', 'assstastattas', 'approved', '2017-04-20');

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
(1, 2, 'Diablo 3: Reaper of Souls New Barbarian Season Build', 'George Carwin', '2017-02-25', 'barb.jpg', 'The purpose of the beginner Barbarian guide is to provide you with a build and item recommendations that will reliably carry you from leveling, through the pre-Torment difficulties and get you into low Torment farming, without requiring specific legendary or set bonuses. The guide also includes a section for Season 9 Barbarians, explaining how best to take advantage of the free set from Haedrig\'s Gifts.', 'diablo3, barbarian, season, build, guide', 3, 'draft '),
(2, 3, 'Hearthstone Tournament', 'George', '2017-04-20', 'hearthstone.jpg', 'If youï¿½ve ever seen some of the high energy matches between RDU and Amaz, Kolento and Strifecro, or any of your other favorite Hearthstone players then you know how fun and exciting tournament Hearthstone can be. What you may not be aware of, however, is that tournament Hearthstone isnï¿½t just for professional players. There are online tournaments happening on every server, several times a week. If dipping your feet into competitive Hearthstone sounds like something youï¿½d enjoy, then Iï¿½ve got the ABCs of online Hearthstone tournaments to help you get started.\r\n\r\nTaking it to the next level: why you should play in tournaments.\r\n\r\nThere are a lot of reasons to play in online Hearthstone tournaments. Tournament play is very fun and exciting. Whether you make it far in the tournament or not, itï¿½s still a joy competing against people. Playing in a tournament also has a significantly different feel from ladder. Tournament players are usually better at the game and your matches will probably be pretty close. In addition, playing in a series rather than a single game balances out some of the randomness that is a part of Hearthstone. You might even have the chance to play against some of your favorite Hearthstone players if you consistently play in online tournaments. One thing is for certain though, playing in tournaments will definitely make you a better Hearthstone player overall.', 'hearthstone, tournament, bigevent, prize', 0, 'draft '),
(3, 3, 'sggsagasa', 'asggasgas', '2017-04-20', 'dyinglight_screenshot_04.jpg', 'gasgsagsgssag', 'asfsfasgsa', 0, 'asggsagasa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserImage` text NOT NULL,
  `Username` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserImage`, `Username`, `FirstName`, `LastName`, `Email`, `Role`, `Password`) VALUES
(1, 'Girl.jpg', 'Chloe', 'Chloe', 'Jefferson', 'chloe231', 'admin', 'asfsafasfasf'),
(2, 'a3.jpg', 'Gosho', 'Georgi', 'Barev', 'gors@abv.bg', 'subscriber', 'saarr1r141'),
(3, 'ivan.jpg', 'Ivan22', 'Ivan', 'Cenov', 'iv@gmail.com', 'subscriber', 'asrsasar');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
