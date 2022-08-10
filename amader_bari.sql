-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 05:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amader_bari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `password`) VALUES
(1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `tcon_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `renemail` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT '0',
  `state` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`tcon_id`, `email`, `renemail`, `message`, `file`, `status`, `state`) VALUES
(15, 'ta@gmail.com', 'kawsaruddin238@gmail.com', 'fsdfd', '', 0, 0),
(16, 'kawsaruddin238@gmail.com', 'ta@gmail.com', 'fdd', 'important/85eb7.pdf', 1, 1),
(18, 'kawsaruddin238@gmail.com', 'ta@gmail.com', '56yui', '', 0, 1),
(19, 'yak@gmail.com', 'mahmud@gmail.com', 'hi sir', '', 1, 1),
(23, 'mahmud@gmail.com', 'yak@gmail.com', 'hi', '', 0, 0),
(24, 'mahmud@gmail.com', 'yak@gmail.com', 'gi', '', 0, 0),
(25, 'mahmud@gmail.com', 'yak@gmail.com', 'ok', '', 0, 0),
(26, 'mahmud@gmail.com', 'yak@gmail.com', 'ok', '', 1, 0),
(27, 'mahmud@gmail.com', 'yak@gmail.com', 'hy', 'important/53a6d.png', 0, 0),
(28, 'ka@gmail.com', 'ja@gmail.com', 'hi', '', 1, 0),
(29, 'ja@gmail.com', 'ka@gmail.com', 'okk', '', 0, 0),
(30, 'ka@gmail.com', 'ja@gmail.com', 'ok', '', 1, 0),
(31, 'ka@gmail.com', 'ja@gmail.com', 'fdd', '', 1, 0),
(33, 'ka@gmail.com', 'ja@gmail.com', 'adfasdffd', '', 1, 0),
(34, 'ka@gmail.com', 'ja@gmail.com', 'fadsferfasda', '', 1, 0),
(35, 'ja@gmail.com', 'ka@gmail.com', 'fadsfdsaf', '', 0, 0),
(36, 'ka@gmail.com', 'ja@gmail.com', 'dfsdgfd', 'important/074c8.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `owner_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `voterid` varchar(255) NOT NULL,
  `proff` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `flat_code` varchar(255) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `state` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `permit` int(255) NOT NULL,
  `pending` int(11) DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `name`, `gender`, `voterid`, `proff`, `company`, `number`, `email`, `title`, `pass`, `bname`, `flat_no`, `flat_code`, `zone_name`, `state`, `image`, `status`, `permit`, `pending`, `date`) VALUES
(5, 'Jamal', 'Male', '1234567890', 'Engineer', 'Government', '01914741978', 'ja@gmail.com', 'Owner', 'e10adc3949ba59abbe56e057f20f883e', 'jamalbanaban', 'All', 'Kaw-CC', 'Chawkbazar', 0, 'image/e2aa4.jpg', 0, 0, 0, '2020-12-24 05:50:20'),
(6, 'Mahmud', 'Male', '1234567898', 'Engineer', 'IELTS', '01914741989', 'mahmud@gmail.com', 'Owner', 'e10adc3949ba59abbe56e057f20f883e', 'mahbaban', 'All', 'mah-yy', 'Chawkbazar', 0, 'image/f0bd6.jpg', 0, 0, 0, '2021-01-24 15:34:34'),
(7, 'Kamal', 'Male', '1234567899', 'Engineer', 'IIUC', '01814741989', 'kam@gmail.com', 'Owner', 'e10adc3949ba59abbe56e057f20f883e', 'mahbaban', 'M', 'mah-yy', 'Chawkbazar', 0, 'image/b69f7.png', 0, 0, 0, '2021-01-27 05:33:36'),
(8, 'Mahmud', 'Male', '1234567893', 'Engineer', 'Government', '01914748980', 'maud@gmail.com', 'Owner', 'e10adc3949ba59abbe56e057f20f883e', 'mahbaban', 'All', 'mah-yk', 'Notun bridge', 0, 'image/668e6.png', 0, 0, 1, '2021-02-02 15:48:31'),
(9, 'Yakub', 'Male', '2234567890', 'Engineer', 'Government', '01354741980', 'yaku@gmail.com', 'Owner', 'e10adc3949ba59abbe56e057f20f883e', 'Yakub villah', 'All', 'yakub-cc', 'Chawkbazar', 0, 'image/28ab3.jpg', 0, 0, 0, '2021-02-03 04:22:42'),
(10, 'Jahan khan', 'Male', '3336678901', 'Engineer', 'IIUC', '01916741982', 'jah@gmail.com', 'Owner', '25d55ad283aa400af464c76d713c07ad', 'Jahan building', 'All', 'jaha-CC', 'Colonel hat', 0, 'image/076e1.jpg', 0, 0, 0, '2021-02-21 04:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pid` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remail` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `rentbill` int(255) NOT NULL,
  `waterbill` int(255) NOT NULL,
  `electricbill` int(255) NOT NULL,
  `gasbill` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `flat_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pid`, `email`, `remail`, `month`, `year`, `rentbill`, `waterbill`, `electricbill`, `gasbill`, `total`, `flat_no`, `flat_code`, `status`, `date`) VALUES
(39, 'ja@gmail.com', 'ka@gmail.com', 'January', '2020', 10000, 2500, 1200, 950, 14650, 'M', 'Kaw-CC', 1, '2021-02-03 04:11:17'),
(42, 'ja@gmail.com', 'ka@gmail.com', 'January', '2021', 10000, 2500, 1200, 600, 14300, 'M', 'Kaw-CC', 1, '2021-02-03 04:19:23'),
(43, 'ja@gmail.com', 'ka@gmail.com', 'February', '2021', 10000, 2500, 1200, 689, 14389, 'M', 'Kaw-CC', 1, '2021-02-03 04:19:41'),
(44, 'ja@gmail.com', 'ka@gmail.com', 'February', '2020', 10000, 250, 1200, 950, 12400, 'M', 'Kaw-CC', 0, '2021-02-03 06:31:44'),
(45, 'ja@gmail.com', 'ka@gmail.com', 'June', '2021', 10000, 970, 450, 1260, 12680, 'M', 'Kaw-CC', 0, '2021-06-03 16:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_renter`
--

CREATE TABLE `tbl_renter` (
  `renter_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `voterid` varchar(255) NOT NULL,
  `proff` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `flat_code` varchar(255) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `state` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `permit` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agreement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_renter`
--

INSERT INTO `tbl_renter` (`renter_id`, `name`, `gender`, `voterid`, `proff`, `company`, `number`, `email`, `title`, `pass`, `bname`, `flat_no`, `flat_code`, `zone_name`, `state`, `image`, `rent`, `status`, `permit`, `date`, `agreement`) VALUES
(4, 'Kamal', 'Male', '1234567897', 'Doctor', 'IELTS', '01915541989', 'kam@gmail.com', 'Renter', 'e10adc3949ba59abbe56e057f20f883e', 'jamalbanaban', 'D', 'Kaw-CC', 'Chawkbazar', 1, 'image/e3633.jpg', '10000', 0, 0, '2020-12-24 05:57:37', '2021-08-04 00:00:00'),
(5, 'sakib', 'Male', '1234567898', 'Engineer', 'IELTS', '01914741980', 'ka@gmail.com', 'Renter', 'e10adc3949ba59abbe56e057f20f883e', 'jamalbanaban', 'M', 'Kaw-CC', 'Chawkbazar', 1, 'image/30156.png', '10000', 0, 0, '2020-12-24 06:01:49', '2021-08-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `supid` int(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `flat_code` varchar(255) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `agreement` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `permission` int(255) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_upload`
--

INSERT INTO `tbl_upload` (`supid`, `bname`, `ownername`, `flat_no`, `room`, `address`, `contact`, `flat_code`, `zone_name`, `agreement`, `img`, `rent`, `permission`, `time`) VALUES
(23, 'jamalbanaban', 'Jamal', 'D', '2-bed 2-bath', 'Chawkbazar', '01914741980', 'Kaw-CC', 'Chawkbazar', 2, 'images/h1.jpg', '10000', 1, '2021-02-03 13:48:11'),
(24, 'jamalbanaban', 'Jamal', 'M', '2-bed 2-bath', 'Chawkbazar', '01914741980', 'Kaw-CC', 'Chawkbazar', 2, 'images/h2.jpg', '14000', 1, '2021-02-02 16:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `zone_name`
--

CREATE TABLE `zone_name` (
  `zoid` int(255) NOT NULL,
  `zonename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_name`
--

INSERT INTO `zone_name` (`zoid`, `zonename`) VALUES
(1, 'Muradpur'),
(2, 'Agrabad'),
(3, 'Chawkbazar'),
(4, 'Notun bridge'),
(5, 'Port'),
(6, 'Colonel hat'),
(7, 'Faiz lake'),
(8, 'Bahaddarhat'),
(9, 'Rahattarpul'),
(11, 'Noa bazar'),
(12, 'Bakolia'),
(13, 'Boalkhali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`tcon_id`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_renter`
--
ALTER TABLE `tbl_renter`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `zone_name`
--
ALTER TABLE `zone_name`
  ADD PRIMARY KEY (`zoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `tcon_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_renter`
--
ALTER TABLE `tbl_renter`
  MODIFY `renter_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `supid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `zone_name`
--
ALTER TABLE `zone_name`
  MODIFY `zoid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
