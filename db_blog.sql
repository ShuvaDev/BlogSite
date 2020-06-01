-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'C'),
(6, 'C++'),
(7, 'Javascript'),
(8, 'C#'),
(9, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(2, 'S.R. Shanto', 'Dev', 'shanto@gmail.com', 'Hello! I am shanto. This is another test message!', 1, '2019-06-03 05:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright S.R. Shuva');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About US', '<p>This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.This is about us page. We created about us page dynamically in admin panel.</p>'),
(3, 'Privacy Page', '<p>Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.Privacy Page goes here.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(1, 1, 'Java Programming Language', '<p><strong>Java Programming language </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'c78342a936.jpg', 'S.R. Shuva Dev', 'Java', '2019-05-28 05:42:33', 0),
(2, 5, 'AB Programming Language', '<p><strong>C Programming language </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '265b2db032.png', 'S.R. Shuva Dev', 'c', '2019-05-28 05:43:18', 0),
(3, 5, 'AB Programming Language', '<p><strong>C Programming language </strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '7438e4ecef.png', 'S.R. Shuva Dev', 'c', '2019-05-28 05:44:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://googleplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'S.R. Shuva Dev', 'admin', '202cb962ac59075b964b07152d234b70', 's.r.shuvadeb@gmail.com', '<p>Hello! I am s.r. shuva dev.</p>', 0),
(2, '', 'author', '202cb962ac59075b964b07152d234b70', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Title', 'Website slogan goes here.', 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
