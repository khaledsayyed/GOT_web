-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 04, 2017 at 09:09 AM
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
(2, 'Is H Stark extinct?Is it going to die?', 'House Stark is not in as much trouble as people think. Out of all the people born Starks at the beginning of the series, Ned, Benjen, Robb, Sansa, Arya, Bran and Rickon, in the books only Ned and Robb are confirmed to be dead.\r\n\r\nHouse Stark is by no means the unluckiest House in the series. House Tully has lost three members, with only Edmure and his child living, who are both held hostage by the Lannisters. House Martell lost Elia and her children, Oberyn and Quentyn.\r\n\r\nSo no, House Stark is by no means extinct. Benjen is missing, and we don\'t know where he is. Sansa is safe in the Vale, Arya is reasonably safe in Braavos, Bran is secure beyond the Wall and Rickon is probably in Skagos with the cannibals and unicorns, but will probably be kept from harm by Osha.\r\n\r\nAs to whether it is going to die, I think so, by the end of the series. Arya is too fucked-up at this stage to live, and I think she\'ll die and live on as Nymeria. Rickon\'s story looks set to be a \'Shaggydog\' story which leads nowhere. Bran will die in the War for the Dawn, I think, although this is uncertain. Benjen will probably turn up again in the story but we don\'t have any evidence for this as of yet. Sansa I think is the most likely to live on, but I can\'t see her having a happy marriage and producing heirs, so I think House Stark is dead by the end of ADOS, even if all the members are not.\r\n\r\nOr, of course, Ned could still be alive and Syrio could have taken Ned\'s place.', 'd1.png', 'admin', 0, 0, '2017-05-04 02:53:00'),
(1, 'Who is the most beautiful woman on Game of Thrones?', '2. Shae - Another handmaiden. Love of the only Lannister we actually care about.\r\n3. Talisa Stark - The healer. One who had the most horrible death.\r\nDear Melisandre\r\nAfter Jon Snow, it\'s these three pretty women I want back.', 'd2.jpg', 'kholid', 0, 0, '2017-05-04 04:05:00');

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
(3, 1, 'admin', 'the night is dark and full of terrors', '2017-05-04 11:19:00');

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
