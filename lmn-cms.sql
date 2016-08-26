-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2016 at 05:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmn-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` int(255) NOT NULL,
  `Cat_Title` varchar(255) NOT NULL,
  `Cat_Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Title`, `Cat_Desc`) VALUES
(1, 'Uncategorized', 'Default Category');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `Dash_ID` int(255) NOT NULL,
  `Dash_Title` varchar(255) NOT NULL,
  `Dash_Content` longtext NOT NULL,
  `Dash_Author` int(255) NOT NULL,
  `Dash_Date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`Dash_ID`, `Dash_Title`, `Dash_Content`, `Dash_Author`, `Dash_Date`) VALUES
(1, 'Welcome to LMN CMS', 'Welcome to LMN CMS, your custom CMS. Please delete this message when you get started on the system.', 1, 1461172979);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `Maint_Site` varchar(255) NOT NULL,
  `Maint_Active` int(1) NOT NULL,
  `Maint_Title` text NOT NULL,
  `Maint_Context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`Maint_Site`, `Maint_Active`, `Maint_Title`, `Maint_Context`) VALUES
('core.lmn', 1, 'Maintence Mode', 'Testing the maintence mode out.');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `Page_ID` int(255) NOT NULL,
  `Page_Title` varchar(255) NOT NULL,
  `Page_Author` int(255) NOT NULL,
  `Page_Perma` text NOT NULL,
  `Page_Date` int(255) NOT NULL,
  `Page_Category` int(255) NOT NULL,
  `Page_Content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`Page_ID`, `Page_Title`, `Page_Author`, `Page_Perma`, `Page_Date`, `Page_Category`, `Page_Content`) VALUES
(2, 'Testing Page', 1, 'test', 1449668799, 1, 'Testing page for working on time function');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_ID` int(255) NOT NULL,
  `Post_Title` varchar(255) NOT NULL,
  `Post_Author` int(255) NOT NULL,
  `Post_Perma` text NOT NULL,
  `Post_Date` int(255) NOT NULL,
  `Post_Category` int(255) NOT NULL,
  `Post_Content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_ID`, `Post_Title`, `Post_Author`, `Post_Perma`, `Post_Date`, `Post_Category`, `Post_Content`) VALUES
(1, 'Hello World!', 1, 'none/hello-world', 0, 1, 'If you see this, you know that the system is currently working!'),
(6, 'Test Post', 1, 'none/test', 1449667786, 1, 'Testing the time function on posting software.'),
(7, 'test 2', 1, 'none/test-2', 1449681684, 0, 'The page contains something....');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Role_ID` int(255) NOT NULL,
  `Role_Name` varchar(255) NOT NULL,
  `Role_Descript` varchar(255) NOT NULL,
  `edit_roles` int(1) NOT NULL,
  `promote_users` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_ID`, `Role_Name`, `Role_Descript`, `edit_roles`, `promote_users`) VALUES
(1, 'Site Admin', 'Admin of the Entire Website', 1, 1),
(2, 'Standard', 'Default User', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `Site_ID` int(255) NOT NULL,
  `Site_Name` varchar(255) NOT NULL,
  `Site_URL` varchar(255) NOT NULL,
  `Site_AdminEmail` varchar(255) NOT NULL,
  `Site_Reg` int(1) NOT NULL,
  `Site_Facebook` varchar(255) NOT NULL,
  `Site_Twitter` varchar(255) NOT NULL,
  `Site_YT` varchar(255) NOT NULL,
  `Site_Insta` varchar(255) NOT NULL,
  `Site_Twitch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`Site_ID`, `Site_Name`, `Site_URL`, `Site_AdminEmail`, `Site_Reg`, `Site_Facebook`, `Site_Twitter`, `Site_YT`, `Site_Insta`, `Site_Twitch`) VALUES
(1, 'Littlered615 Media', 'core.lmn', 'littlered615media@gmail.com', 1, 'littlered615media', 'littlered615vid', 'thelittlered615media', 'littlered615media', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(255) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `User_Login` varchar(255) NOT NULL,
  `User_View` varchar(255) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_About` longtext NOT NULL,
  `User_Pass` varchar(255) NOT NULL,
  `User_Role` text NOT NULL,
  `User_Registered` bigint(20) NOT NULL,
  `User_Fb` varchar(255) NOT NULL,
  `User_Twitter` varchar(15) NOT NULL,
  `User_YT` varchar(255) NOT NULL,
  `User_Twitch` varchar(255) NOT NULL,
  `User_Hitbox` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Name`, `User_Login`, `User_View`, `User_Email`, `User_About`, `User_Pass`, `User_Role`, `User_Registered`, `User_Fb`, `User_Twitter`, `User_YT`, `User_Twitch`, `User_Hitbox`) VALUES
(1, 'Littlered615 Media', 'littlered615media', 'User_Name', 'littlered615media@gmail.com', 'I am the runner and the owner of the Littlered615 Media. If you have any problems with the site, you should email this account and I will get back with you soon.', '$2y$10$ZavzH32VXhBeSgaazysbHetTu/OvAU3rW4m2LK0qBTJXiv4wHCHo6', '1', 1446257175, 'littlered615media', 'littlered615vid', 'thelittlered615media', 'littlered615media', 'littlered615media'),
(2, 'Example 1', 'example1', 'User_Name', 'example1@example.com', '', '$2y$10$li/BbO7JEdwDu1rsEHSWIOhqgfoebTZG1fXh78OqRHB4E1EZy.IqW', '2', 0, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`Dash_ID`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`Maint_Site`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`Page_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`Site_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `Dash_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `Page_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Role_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `Site_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
