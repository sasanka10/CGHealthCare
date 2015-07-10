-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2015 at 10:15 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acl_test`
--
DROP DATABASE `acl_test`;
CREATE DATABASE IF NOT EXISTS `acl_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `acl_test`;

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

DROP TABLE IF EXISTS `app`;
CREATE TABLE IF NOT EXISTS `app` (
  `ID` int(11) unsigned zerofill NOT NULL,
  `restore` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `ID` bigint(20) unsigned zerofill NOT NULL,
  `permKey` varchar(30) NOT NULL,
  `permName` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`ID`, `permKey`, `permName`) VALUES
(00000000000000000001, 'access_site', 'Access Site'),
(00000000000000000002, 'access_admin', 'Access Admin System'),
(00000000000000000003, 'publish_articles', 'Publish Articles'),
(00000000000000000004, 'publish_events', 'Publish Events'),
(00000000000000000005, 'install_modules', 'Install Modules'),
(00000000000000000006, 'post_comments', 'Post Comments'),
(00000000000000000007, 'access_premium_content', 'Access Premium Content'),
(00000000000000000008, 'limited_admin', 'Limited Admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_perms`
--

DROP TABLE IF EXISTS `role_perms`;
CREATE TABLE IF NOT EXISTS `role_perms` (
  `ID` bigint(20) unsigned zerofill NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_perms`
--

INSERT INTO `role_perms` (`ID`, `roleID`, `permID`, `value`, `addDate`) VALUES
(00000000000000000016, 1, 2, 1, '2009-03-02 17:13:21'),
(00000000000000000017, 1, 7, 1, '2009-03-02 17:13:21'),
(00000000000000000018, 1, 1, 1, '2009-03-02 17:13:21'),
(00000000000000000019, 1, 5, 1, '2009-03-02 17:13:21'),
(00000000000000000020, 1, 8, 1, '2009-03-02 17:13:21'),
(00000000000000000021, 1, 6, 1, '2009-03-02 17:13:21'),
(00000000000000000022, 1, 3, 1, '2009-03-02 17:13:21'),
(00000000000000000023, 1, 4, 1, '2009-03-02 17:13:21'),
(00000000000000000024, 2, 1, 1, '2009-03-02 17:13:31'),
(00000000000000000025, 3, 7, 1, '2009-03-02 17:13:38'),
(00000000000000000026, 3, 8, 1, '2009-03-02 17:13:38'),
(00000000000000000027, 3, 6, 1, '2009-03-02 17:13:38'),
(00000000000000000028, 3, 3, 1, '2009-03-02 17:13:38'),
(00000000000000000029, 3, 4, 1, '2009-03-02 17:13:38'),
(00000000000000000030, 4, 7, 1, '2009-03-02 17:13:42'),
(00000000000000000031, 4, 6, 1, '2009-03-02 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ID` bigint(20) unsigned zerofill NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `roleName`) VALUES
(00000000000000000001, 'Administrators'),
(00000000000000000002, 'All Users'),
(00000000000000000003, 'Authors'),
(00000000000000000007, 'Doctor'),
(00000000000000000005, 'Patient'),
(00000000000000000004, 'Premium Members'),
(00000000000000000006, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user_perms`
--

DROP TABLE IF EXISTS `user_perms`;
CREATE TABLE IF NOT EXISTS `user_perms` (
  `ID` bigint(20) unsigned zerofill NOT NULL,
  `userID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_perms`
--

INSERT INTO `user_perms` (`ID`, `userID`, `permID`, `value`, `addDate`) VALUES
(00000000000000000001, 1, 2, 1, '2015-07-07 09:32:57'),
(00000000000000000002, 1, 7, 1, '2015-07-07 09:32:57'),
(00000000000000000003, 1, 1, 1, '2015-07-07 09:32:57'),
(00000000000000000004, 1, 5, 1, '2015-07-07 09:32:57'),
(00000000000000000005, 1, 6, 1, '2015-07-07 09:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `userID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`userID`, `roleID`, `addDate`) VALUES
(1, 1, '2009-03-02 17:14:45'),
(1, 2, '2009-03-02 17:14:45'),
(2, 2, '2009-03-02 17:27:23'),
(2, 3, '2009-03-02 17:27:23'),
(3, 2, '2009-03-02 17:27:05'),
(4, 2, '2009-03-02 17:27:32'),
(4, 4, '2009-03-02 17:27:32'),
(5, 5, '2015-07-09 21:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) unsigned zerofill NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(0000000001, 'Admin Steve', 'hanuman'),
(0000000002, 'Author Aaron', 'hanuman'),
(0000000003, 'Joe User', 'hanuman'),
(0000000004, 'Penelope Premium', 'hanuman'),
(0000000005, 'pavan', 'hanuman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `permKey` (`permKey`);

--
-- Indexes for table `role_perms`
--
ALTER TABLE `role_perms`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `roleID_2` (`roleID`,`permID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- Indexes for table `user_perms`
--
ALTER TABLE `user_perms`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `userID` (`userID`,`permID`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD UNIQUE KEY `userID` (`userID`,`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `ID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `role_perms`
--
ALTER TABLE `role_perms`
  MODIFY `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_perms`
--
ALTER TABLE `user_perms`
  MODIFY `ID` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
