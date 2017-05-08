-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 08, 2017 at 10:30 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `got`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `name` varchar(20) NOT NULL,
  `house` varchar(15) NOT NULL,
  `story` text NOT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`name`, `house`, `story`, `state`) VALUES
('jon snow', 'targarian', 'king in the north', 'alive'),
('petyr baelish', 'baelish', 'known as little fingre', 'alive'),
('arya stark', 'stark', 'she was no one but now shes arya stark.killed lord frey ...', 'alive'),
('tyrion lannister', 'lanister', 'he was named as hand of the queen by danaerys targarian', 'alive');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `dis_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `files` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `time_posted` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`dis_id`, `title`, `content`, `files`, `user`, `upvotes`, `downvotes`, `time_posted`) VALUES
(2, 'Is H Stark extinct?Is it going to die?', 'House Stark is not in as much trouble as people think. Out of all the people born Starks at the beginning of the series, Ned, Benjen, Robb, Sansa, Arya, Bran and Rickon, in the books only Ned and Robb are confirmed to be dead.\r\n\r\nHouse Stark is by no means the unluckiest House in the series. House Tully has lost three members, with only Edmure and his child living, who are both held hostage by the Lannisters. House Martell lost Elia and her children, Oberyn and Quentyn.\r\n\r\nSo no, House Stark is by no means extinct. Benjen is missing, and we don\'t know where he is. Sansa is safe in the Vale, Arya is reasonably safe in Braavos, Bran is secure beyond the Wall and Rickon is probably in Skagos with the cannibals and unicorns, but will probably be kept from harm by Osha.\r\n\r\nAs to whether it is going to die, I think so, by the end of the series. Arya is too fucked-up at this stage to live, and I think she\'ll die and live on as Nymeria. Rickon\'s story looks set to be a \'Shaggydog\' story which leads nowhere. Bran will die in the War for the Dawn, I think, although this is uncertain. Benjen will probably turn up again in the story but we don\'t have any evidence for this as of yet. Sansa I think is the most likely to live on, but I can\'t see her having a happy marriage and producing heirs, so I think House Stark is dead by the end of ADOS, even if all the members are not.\r\n\r\nOr, of course, Ned could still be alive and Syrio could have taken Ned\'s place.', 'd1.png', 'admin', 0, 1, '2017-05-04 02:53:00'),
(1, 'Who is the most beautiful woman on Game of Thrones?', '2. Shae - Another handmaiden. Love of the only Lannister we actually care about.\r\n3. Talisa Stark - The healer. One who had the most horrible death.\r\nDear Melisandre\r\nAfter Jon Snow, it\'s these three pretty women I want back.', 'd2.jpg', 'kholid', 1, 0, '2017-05-04 04:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_comments`
--

CREATE TABLE `discussion_comments` (
  `cid` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `user_commented` varchar(20) NOT NULL,
  `comment_text` text,
  `com_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_comments`
--

INSERT INTO `discussion_comments` (`cid`, `dis_id`, `user_commented`, `comment_text`, `com_time`) VALUES
(1, 2, 'kholid', 'Women can inherit titles in the North. Look no further than pint-sized Lyanna Mormont. On the show, she is the Lady of Bear Island, and she inherited from another woman, Maege Mormont. In the books, Maege is still alive, and her daughter Alysanne is her heir. We also know women can inherit because Catelyn complained when Robb wanted to name Jon his heir, as that would have cut Sansa and Arya out of the succession. Other examples exist throughout the Seven Kingdoms.', '2017-05-04 05:41:00'),
(2, 2, 'admin', 'Women who hold titles can pass their name, rather than their husband\'s name, to their children. Again, Lyanna Mormont is the daughter of Maege Mormont, so unless the Mormonts practice incest, her father had a different surname. In the books, Lady Anya Waynwood of the Vale passed her name on to her sons, and Lady Tanda Stokeworth of the Crownlands passed her name to her daughters.', '2017-05-04 06:41:00'),
(3, 1, 'admin', 'the night is dark and full of terrors', '2017-05-04 11:19:00'),
(4, 1, 'admin', 'test 8', '2017-05-07 05:07:57'),
(5, 1, 'admin', 'test 12', '2017-05-07 07:50:18'),
(6, 1, 'admin', 'test 13', '2017-05-07 07:51:05'),
(7, 1, 'admin', 'test 14', '2017-05-07 07:52:15'),
(8, 1, 'admin', 'test 15', '2017-05-07 07:53:08'),
(9, 1, 'admin', 'h', '2017-05-07 07:53:18'),
(10, 1, 'admin', '55563', '2017-05-07 07:55:22'),
(11, 1, 'admin', 'k', '2017-05-07 07:56:39'),
(12, 1, 'admin', 'k', '2017-05-07 07:58:36'),
(13, 1, 'admin', 'k', '2017-05-07 07:59:47'),
(14, 1, 'admin', 'its working baby. whuba luba dam dam', '2017-05-07 08:00:38'),
(15, 1, 'admin', 'll', '2017-05-07 08:01:32'),
(16, 2, 'admin', 'o', '2017-05-07 08:02:51'),
(17, 1, 'admin', 'jkjk', '2017-05-07 08:03:36'),
(18, 2, 'admin', 'u', '2017-05-07 08:04:27'),
(19, 1, 'admin', 'h', '2017-05-07 08:08:14'),
(20, 2, 'admin', 'y', '2017-05-07 08:12:34'),
(21, 1, 'admin', 'g', '2017-05-07 08:12:43'),
(22, 2, 'admin', 'a', '2017-05-07 08:12:53'),
(23, 2, 'admin', 'r', '2017-05-07 08:13:30'),
(24, 1, 'admin', 'k', '2017-05-07 08:15:12'),
(25, 1, 'admin', 'o', '2017-05-07 08:16:01'),
(26, 1, 'admin', 'u', '2017-05-07 08:16:57'),
(27, 1, 'admin', 't', '2017-05-07 08:17:18'),
(28, 1, 'admin', 'y', '2017-05-07 08:17:54'),
(29, 1, 'admin', 'y', '2017-05-07 08:18:35'),
(30, 1, 'admin', 'yyhhgtgngfd', '2017-05-07 08:19:57'),
(31, 2, 'admin', 'grffgvvgfdc', '2017-05-07 08:20:14'),
(32, 2, 'admin', 'rfgbhgfrd', '2017-05-07 08:20:20'),
(33, 2, 'admin', 'bvfdcfvbngfd', '2017-05-07 08:20:28'),
(34, 1, 'admin', 'fdxscvbvcx', '2017-05-07 08:20:35'),
(35, 1, 'admin', 'boom boom taka boom', '2017-05-07 08:22:26'),
(36, 1, 'admin', 'reply to e', '2017-05-07 08:22:41'),
(37, 1, 'admin', 'fvgbhgfdc', '2017-05-07 08:23:22'),
(38, 1, 'admin', 'vcvb vc', '2017-05-07 08:23:25'),
(39, 2, 'admin', 'jhygtfrrfjmk,mjhgfds', '2017-05-07 08:23:32'),
(40, 2, 'admin', 'im khaled', '2017-05-07 08:24:10'),
(41, 1, 'admin', 'gdfsdAVBVV', '2017-05-07 08:24:16'),
(42, 2, 'admin', 'KJUHYTREWQ', '2017-05-07 08:24:26'),
(43, 2, 'admin', 'yhyhyh', '2017-05-07 08:24:34'),
(44, 1, 'admin', 'bgvcx', '2017-05-07 08:25:32'),
(45, 1, 'admin', 'kjhgfdsa', '2017-05-07 08:25:57'),
(46, 2, 'admin', 'gf', '2017-05-07 08:26:24'),
(47, 2, 'admin', 'jhgfdsa', '2017-05-07 08:27:10'),
(48, 1, 'admin', 'gfdsza', '2017-05-07 08:30:30'),
(49, 1, 'admin', 'YHYHYHY', '2017-05-07 08:31:55'),
(50, 1, 'admin', 'HOHOHO', '2017-05-07 08:32:51'),
(51, 1, 'admin', 'yyhyhy', '2017-05-07 08:33:38'),
(52, 1, 'admin', 'yyy', '2017-05-07 08:35:53'),
(53, 1, 'admin', 'y', '2017-05-07 08:39:10'),
(54, 1, 'admin', 'y', '2017-05-07 08:40:14'),
(55, 1, 'admin', 'y', '2017-05-07 08:42:49'),
(56, 1, 'admin', 'lkjhmgfdsza', '2017-05-07 08:44:28'),
(57, 1, 'admin', 'hgfdxz', '2017-05-07 08:45:46'),
(58, 2, 'admin', 'ghjkl;', '2017-05-07 08:48:26'),
(59, 2, 'admin', 'ii', '2017-05-07 08:48:37'),
(60, 1, 'admin', 'gdfslfbvnb', '2017-05-07 08:50:36'),
(61, 1, 'admin', 'hh', '2017-05-07 08:52:42'),
(62, 1, 'admin', 'hbhbh', '2017-05-07 08:56:37'),
(63, 1, 'admin', 'jjhgfasvbnnbvbm,,mnbvnm,..,mnbvcm,mnbvcxbnm,nbvc', '2017-05-07 08:58:00'),
(64, 1, 'admin', 'yhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2017-05-07 09:00:08'),
(65, 1, 'admin', 'yyyy', '2017-05-07 09:00:34'),
(66, 1, 'admin', 'hgfdghm', '2017-05-07 09:00:42'),
(67, 1, 'admin', 'ioioio', '2017-05-07 09:00:48'),
(68, 1, 'admin', 'ioioio', '2017-05-07 09:01:17'),
(69, 1, 'admin', 'lol', '2017-05-07 09:04:04'),
(70, 1, 'admin', 'i cant do this anymore', '2017-05-07 09:05:20'),
(71, 1, 'admin', 'bitch btter have my money', '2017-05-07 09:05:40'),
(72, 1, 'admin', 'please', '2017-05-07 09:06:41'),
(73, 1, 'admin', 'now what', '2017-05-07 09:07:28'),
(74, 2, 'admin', 'yaaaay', '2017-05-07 09:07:39'),
(75, 1, 'admin', 'try', '2017-05-07 09:09:50'),
(76, 1, 'admin', 'and now', '2017-05-07 09:10:02'),
(77, 1, 'admin', 'niw', '2017-05-07 09:10:09'),
(78, 2, 'admin', 'mghgfdsa', '2017-05-07 09:10:16'),
(79, 1, 'admin', 'njhbgfd', '2017-05-07 09:11:17'),
(80, 1, 'admin', ' cx', '2017-05-07 09:11:35'),
(81, 1, 'admin', 'mnbvcx', '2017-05-07 09:11:41'),
(82, 1, 'admin', 'kjhgfds', '2017-05-07 09:12:36'),
(83, 1, 'admin', 'kkj', '2017-05-07 09:16:14'),
(84, 1, 'admin', 'uj', '2017-05-07 09:16:28'),
(85, 1, 'admin', 'KKB', '2017-05-07 09:18:48'),
(86, 1, 'admin', 'fdk,fc', '2017-05-07 09:19:01'),
(87, 1, 'admin', 'jnhbg', '2017-05-07 09:19:10'),
(88, 1, 'admin', ',jmghnfbv', '2017-05-07 09:19:19'),
(89, 1, 'admin', 'bmnbv', '2017-05-07 09:19:22'),
(90, 1, 'admin', 'bn', '2017-05-07 09:19:25'),
(91, 1, 'admin', 'jh,', '2017-05-07 09:19:35'),
(92, 2, 'admin', 'mn', '2017-05-07 09:19:41'),
(93, 2, 'admin', ';kljh', '2017-05-07 09:19:47'),
(94, 2, 'admin', 'b vcvx', '2017-05-07 09:19:56'),
(95, 2, 'admin', 'tytyty', '2017-05-08 05:52:22'),
(96, 1, 'admin', 'gjhgxxhhgf', '2017-05-08 09:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `downvotes`
--

CREATE TABLE `downvotes` (
  `dis_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downvotes`
--

INSERT INTO `downvotes` (`dis_id`, `name`) VALUES
(2, 'admin');

--
-- Triggers `downvotes`
--
DELIMITER $$
CREATE TRIGGER `decrement_downvotes` AFTER DELETE ON `downvotes` FOR EACH ROW BEGIN
           UPDATE discussions SET downvotes=downvotes-1 WHERE dis_id=OLD.dis_id;

    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_downvotes` AFTER INSERT ON `downvotes` FOR EACH ROW BEGIN
           UPDATE discussions SET downvotes=downvotes+1 WHERE dis_id=NEW.dis_id;

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE `upvotes` (
  `dis_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`dis_id`, `name`) VALUES
(1, 'admin');

--
-- Triggers `upvotes`
--
DELIMITER $$
CREATE TRIGGER `decrement_upvotes` AFTER DELETE ON `upvotes` FOR EACH ROW BEGIN
           UPDATE discussions SET upvotes=upvotes-1 WHERE dis_id=OLD.dis_id;

    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_upvotes` AFTER INSERT ON `upvotes` FOR EACH ROW BEGIN
           UPDATE discussions SET upvotes=upvotes+1 WHERE dis_id=NEW.dis_id;

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `team` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `team`) VALUES
('admin', 'khd.sayed@gmail.com', 'KK', 'dany'),
('kholid', 'h2@W', 'KK', 'snow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `discussion_comments`
--
ALTER TABLE `discussion_comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `downvotes`
--
ALTER TABLE `downvotes`
  ADD PRIMARY KEY (`dis_id`,`name`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`dis_id`,`name`),
  ADD KEY `fk2` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `discussion_comments`
--
ALTER TABLE `discussion_comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
