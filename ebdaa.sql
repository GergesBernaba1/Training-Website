-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 05:15 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebdaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'ahmed', '01230123');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `name`, `image`, `code`) VALUES
(7, 'PEM', 'PrL-VS_plain_bck-example.jpg', 'PEM-01'),
(8, 'SS', 'pexels-photo-128458.jpeg', 'SS-01'),
(9, 'test', 'sunny_iceland-1280x800.jpg', 'test-01');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `hours` int(11) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `body_intro` text NOT NULL,
  `details` varchar(255) NOT NULL,
  `body_details` text NOT NULL,
  `certifications` varchar(100) NOT NULL,
  `certified` tinyint(1) NOT NULL,
  `lecturer` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `image`, `price`, `location`, `language`, `hours`, `intro`, `body_intro`, `details`, `body_details`, `certifications`, `certified`, `lecturer`) VALUES
(15, 'test For Images', '5ae58f5036997cfd4636917403c3c951.jpg', 10, '1', '0', 127, 'dasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgf', '           dasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgf           ', 'dasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgf', '           dasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgfdasljhsdjhsadju asgh ajus ghajusgb aiusgba fasydig asyidtf asrdf taudasd;o hsduj ghasvghcv ycugzhjxc vgyuhsadgf yasuhdgf           ', '8', 0, 12),
(17, 'test For All Now ', 'trolltunga.jpg', 150, '2', '2', 127, 'test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now ', ' test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now  ', 'test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now ', ' test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now test For All Now  ', '7, 8, 9', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `opinion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opinions`
--

INSERT INTO `opinions` (`id`, `name`, `opinion`) VALUES
(9, 'Gerges', 'this is first real opinion in ebdaa'),
(10, 'Ahmed', 'This is Our first Real Thing That I have Done'),
(12, 'Hamza', 'ابداع دي علوضعها ولو عاوز تفضل معلم ابعد عنها  # أصحي_للكلام');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `phone` int(14) NOT NULL,
  `course` varchar(255) NOT NULL,
  `R_time` datetime NOT NULL,
  `certification` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `email`, `phone`, `course`, `R_time`, `certification`) VALUES
(10, 'Ahned', 'payyoumy2018@yahoo.com', 1022844956, 'مرحبا بك في التجربه الاولي للموقع, Lorem ipsum dolor sit amet, consectetur adipisicing elit,', '2018-01-03 15:17:29', 0),
(12, 'akhg', 'dljshfdf@jdhfs', 1155809004, 'test For All Now', '2018-01-04 12:04:38', 0),
(13, 'PHP', 'sdhkvsd@wqgjsw', 1155809004, 'test For All Now', '2018-01-04 12:05:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_certification`
--

CREATE TABLE `user_certification` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `certification` text NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_certification`
--

INSERT INTO `user_certification` (`id`, `student_name`, `course_name`, `certification`, `Notes`) VALUES
(2, 'Ahmed', 'PEM', 'ECE335_Sheet4.pdf', '    2 This is Test    '),
(3, 'Gerges', 'MBI', 'ECE335_Sheet4.pdf', 'THis is second test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_certification`
--
ALTER TABLE `user_certification`
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
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_certification`
--
ALTER TABLE `user_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
