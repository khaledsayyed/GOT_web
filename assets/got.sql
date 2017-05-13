-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 13, 2017 at 12:27 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`, `email`) VALUES
('admin', 'KK1', 'khd.sayed@gmail.com');

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
('Daenerys Targaryen', 'Targaryen', 'Queen Daenerys I Targaryen, also known as Dany and Daenerys Stormborn, is the younger sister of Rhaegar Targaryen and Viserys Targaryen, the paternal aunt of Jon Snow, and the youngest child of King Aerys II Targaryen and Queen Rhaella Targaryen, who were both ousted from the Iron Throne during Robert Baratheon&amp;apos;s rebellion.', 'Alive'),
('John Snow', 'stark', 'King Jon Snow is the son of Lady Lyanna Stark and Rhaegar Targaryen, the Prince of Dragonstone. From infancy, Jon is presented as the bastard son of Lord Eddard Stark, Lyanna&amp;apos;s brother, and raised by Eddard alongside his lawful children at Winterfell but his true parentage is kept secret from everyone, including Jon himself. In order to escape his bastard status, Jon joins the Night&amp;apos;s Watch and is eventually chosen as Lord Commander. However, his decision to allow thousands of Free Folk safe passage through the Wall alienates many of his black brothers, culminating in a mutiny where Jon is killed but later revived by Melisandre. Freed from his Night&amp;apos;s Watch vows, Jon executes the mutineers and joins his cousin, Sansa Stark, in building an army to retake Winterfell from House Bolton. After securing help from a few other Northern Houses and the Vale of Arryn, they successfully retake the castle from Ramsay Bolton, restoring House Stark&amp;apos;s dominion over the North with Jon being declared the new King in the North by the Northern Lords.', 'Alive'),
('Sansa Stark', 'stark', 'Princess Sansa Stark is the eldest daughter of Lord Eddard Stark of Winterfell and his wife Lady Catelyn, sister of Robb, Arya, Bran and Rickon Stark, and &amp;quot;half-sister&amp;quot; of Jon Snow. She initially starts off as a soppy, slightly petulant girl with a very naive view of the world, but as time goes on and she and her family suffer one cruelty and betrayal after another, she becomes a more hardened and learned individual.', 'Alive'),
('Arya Stark', 'stark', 'Princess Arya Stark is the third child and second daughter of Lord Eddard Stark and his wife, Lady Catelyn Stark. She is later trained as a Faceless Man at the House of Black and White in Braavos.', 'Alive'),
('Brandon Stark', 'stark', 'Prince Brandon Stark, commonly called Bran Stark, is the fourth child and second son of Eddard and Catelyn Stark. Bran is a warg and currently the new three-eyed raven.', 'Alive'),
('Edmure Tully', 'stark', 'Edmure Tully is a recurring character in the third, sixth and seventh seasons. He is played by guest star Tobias Menzies and debuts in &amp;quot;Walk of Punishment&amp;quot;. Edmure is the son and heir of the late Lord Hoster Tully of Riverrun. He is the younger brother of Catelyn and Lysa, nephew of Brynden Tully, and maternal uncle of Robb Stark, Sansa Stark, Arya Stark, Bran Stark, Rickon Stark, and Robin Arryn.', 'Alive'),
('Davos Seaworth', 'stark', 'Ser Davos Seaworth, also known as the Onion Knight, is a landed knight, and a former smuggler who was in the service of Stannis Baratheon, Lord of Dragonstone and claimant to the Iron Throne, whom he served as Hand of the King.After Stannis&amp;apos;s defeat and death at Winterfell, Davos remains at Castle Black, where he is caught in the midst of a mutiny among the Night&amp;apos;s Watch that initially led to the death of Lord Commander Jon Snow. Siding with Jon&amp;apos;s followers, Davos becomes one of his lieutenants after persuading Melisandre to resurrect Jon. He later sides with House Stark and proclaims Jon Snow the King in the North after Jon retakes Winterfell from House Bolton.', 'Alive'),
('Tormund', 'stark', 'Tormund, often called Tormund Giantsbane, is a renowned leader and raider among the Free Folk and one of the key leaders behind Mance Rayder. Tormund respected Mance as the King-Beyond-the-Wall and suspected he was the man to lead them through the Long Night. But as time passes and Mance is killed on the orders of Stannis Baratheon, he believes the prophesied warrior is his enemy-turned-friend Jon Snow. He is played by Kristofer Hivju.', 'Alive'),
('Meera Reed', 'stark', 'Meera Reed is the elder sister of Jojen Reed, and the only daughter of Howland Reed. Both she and her brother believe Bran Stark to be crucial in the oncoming war against the White Walkers.', 'Alive'),
('Lyanna Mormont', 'stark', 'Lady Lyanna Mormont is a recurring character in the sixth and seventh seasons, who was previously mentioned in the fifth season. She is portrayed by guest star Bella Ramsey and debuts in &amp;quot;The Broken Man&amp;quot;, although she was first mentioned in &amp;quot;The House of Black and White&amp;quot;. She is the young Lady of Bear Island and thus the head of House Mormont of Bear Island ever since the death of her mother, Maege Mormont. She is the niece of Lord Commander Jeor Mormont of the Night&amp;apos;s Watch and the first cousin of Ser Jorah Mormont.', 'Alive'),
('Benjen Stark', 'stark', 'Benjen Stark is the First Ranger of the Night&amp;apos;s Watch. He embarks on a ranging north of the Wall, and does not return. He is finally encountered again when he saves Bran Stark and Meera Reed from wights after they escape from the cave of the three-eyed raven. Afterwards he leads Bran and Meera close to the Wall but stays behind because he cannot pass through it due to his undead status.', 'Alive'),
('Robb Stark', 'stark', 'King Robb Stark is the eldest son of Lord Eddard Stark of Winterfell and his wife, Lady Catelyn. He is the older brother of Sansa, Arya, Bran, and Rickon Stark, and cousin (believed to be half-brother) of Jon Snow. He also adopts a direwolf named Grey Wind. Robb is declared the King in the North during the War of the Five Kings.Despite his young age, he commands great respect and is notable for never having lost a battle, earning himself the nickname &amp;quot;the Young Wolf&amp;quot;after the sigil of his house. He rules the North and the Riverlands until he is murdered at the Red Wedding, alongside his pregnant wife, his mother, and many of his lords&amp;apos; bannermen, by Houses Frey and Bolton. Robb is personally killed by his bannerman, Roose Bolton, and House Stark is thus stripped of their lands and titles, which are then handed over to House Bolton.', 'Dead'),
('Eddard Stark', 'stark', 'Lord Eddard Stark, also known as Ned Stark, was the head of House Stark, the Lord of Winterfell, Lord Paramount and Warden of the North, and later Hand of the King to King Robert I Baratheon. He was the older brother of Benjen, Lyanna and the younger brother of Brandon Stark. He is the father of Robb, Sansa, Arya, Bran and Rickon by his wife, Catelyn Tully, and uncle of Jon Snow, who he raised as his bastard son. He was a dedicated husband and father, a loyal friend and an honorable lord.Eddard&amp;apos;s execution and revealing the illegitimacy of Cersei&amp;apos;s children was the spark of the War of the Five Kings between Joffrey Baratheon, Robb, Renly Baratheon, Stannis Baratheon and Balon Greyjoy - being posthumously responsible for the involvement of four of the kings in this war.', 'Dead'),
('Catelyn Stark', 'stark', 'Catelyn Stark, nÃ©e Tully, is a major character in the first, second and third seasons. She is played by starring cast member Michelle Fairley, and debuts in the series premiere. She was played in the unaired pilot by Jennifer Ehle but the role was recast.Catelyn was born into House Tully and married into House Stark. Her husband, Eddard Stark, is the Lord Paramount of the North, and together they have five children: Robb, Sansa, Arya, Bran, and Rickon. Catelyn is a devoted mother and is fiercely protective of her children.', 'Dead'),
('Cersei Lannister', 'Lannister ', 'Queen Cersei I Lannister is the widow of King Robert Baratheon and Queen of the Seven Kingdoms. She is the daughter of Lord Tywin Lannister, twin sister of Jaime Lannister and elder sister of Tyrion Lannister. She has an incestuous relationship with Jaime, who is secretly the father of her three children, Joffrey, Myrcella and Tommen.After the assassinations of Joffrey and Myrcella and Tommen&amp;apos;s suicide in the wake of the destruction of the Great Sept of Baelor, Cersei assumed the throne under the name of Cersei of the House Lannister, the First of Her Name, Queen of the Andals and the First Men, Protector of the Seven Kingdoms.', 'Alive'),
('Jaime Lannister', 'Lannister ', 'Ser Jaime Lannister is the eldest son of Tywin, younger twin brother of Cersei, and older brother of Tyrion Lannister. He is also involved in an incestuous relationship with Cersei and is the biological father of her three children, Joffrey, Myrcella, and Tommen.Jaime previously served in the Kingsguard of Aerys Targaryen, known as the Mad King, before infamously backstabbing him during the Sack of King&amp;apos;s Landing, earning Jaime the nickname of the Kingslayer. He continued to serve in the Kingsguard of Robert Baratheon, and as Lord Commander for Robert&amp;apos;s alleged sons Joffrey and Tommen. However, a confrontation with the Faith of the Seven led to his dismissal from the sworn order.', 'Alive'),
('Tyrion Lannister', 'Lannister ', 'Tyrion Lannister is the youngest child of Lord Tywin Lannister and younger brother of Cersei and Jaime Lannister. A dwarf, he uses his wit and intellect to overcome the prejudice he faces.His abduction by Catelyn Stark for a crime he did not commit serves as one of the catalysts of the War of the Five Kings. After escaping his captors, Tyrion is appointed by his father as acting Hand of the King to Joffrey Baratheon and successfully defends King&amp;apos;s Landing against Stannis Baratheon, after which he is stripped of his power, demoted to Master of Coin and eventually framed for Joffrey&amp;apos;s murder. After his champion, Oberyn Martell, dies in Tyrion&amp;apos;s trial by combat, Tyrion flees to Essos with help from Jaime after murdering his father, whereupon he is captured by Jorah Mormont and taken to Daenerys Targaryen in Meereen, who decides to enlist his help in reclaiming the Iron Throne. For his loyalty and service, Tyrion is named as Daenerys&amp;apos;s Hand before they set sail for Westeros with Daenerys&amp;apos;s new army.', 'Alive'),
('Qyburn', 'Lannister ', 'Qyburn is a recurring character in the third, fourth, fifth, sixth and seventh seasons. He is portrayed by Anton Lesser and debuts in &amp;quot;Valar Dohaeris&amp;quot;. He is an unethical former maester who was thrown out of the order for conducting illegal human experimentation. After coming into Cersei Lannister&amp;apos;s service, he becomes Varys&amp;apos;s replacement as Master of Whisperers on the small council. After Cersei is crowned as Queen of the Andals and the First Men, he becomes her Hand of the Queen.', 'Alive'),
('Gregor Clegane', 'Lannister ', 'Ser Gregor Clegane is the head of House Clegane, the older brother of Sandor Clegane, and a notoriously fearsome warrior, with a tendency toward extreme and at times excessive violence. Due to his freakishly huge size, he is called &amp;quot;The Mountain That Rides&amp;quot; or more often simply &amp;quot;The Mountain&amp;quot;.', 'Alive'),
('Tywin Lannister', 'Lannister ', 'Lord Tywin Lannister was the head of House Lannister, Lord of Casterly Rock, Warden of the West, Lord Paramount of the Westerlands, Hand of the King for three different kings, and Protector of the Realm. He is the father of Cersei, Jaime, and Tyrion Lannister, and sole grandfather of the incest-born Joffrey, Myrcella, and Tommen Baratheon.', 'Dead'),
('Joffrey I Baratheon', 'Lannister ', 'King Joffrey I Baratheon is a major character in the first, second, third, and fourth seasons. He is played by starring cast member Jack Gleeson and debuts in the series premiere. Though believed by most to be the eldest son of King Robert Baratheon and Queen Cersei Lannister, Joffrey is actually a bastard born from Cersei&amp;apos;s incestuous relationship with her twin brother, Ser Jaime Lannister of the Kingsguard. He is the older brother of Myrcella Baratheon and Tommen Baratheon, both of whom share the same parentage with Cersei and Jaime Lannister.', 'Dead'),
('Tommen I Baratheon', 'Lannister ', 'King Tommen I Baratheon was the younger brother of King Joffrey and Princess Myrcella. Though legally the son of the late King Robert Baratheon and Queen Cersei Lannister, his true father is Ser Jaime Lannister, the Queen&amp;apos;s twin brother. His sole biological grandparents, Tywin and Joanna Lannister, were also first cousins.After his brother&amp;apos;s death during his wedding to Margaery Tyrell, Tommen assumed the throne under the name of Tommen of the House Baratheon, the First of His Name. After witnessing the destruction of the Great Sept of Baelor and learning of the death of his beloved Queen among all the casualites, Tommen committed suicide by jumping out of a window in the Red Keep.', 'Dead'),
('Petyr Baelish', 'Baelish', 'Lord Petyr Baelish, popularly called Littlefinger, was the Master of Coin on the Small Council. He is a skilled manipulator and uses his ownership of brothels in King&amp;apos;s Landing to both accrue intelligence on political rivals and acquire vast wealth. Baelish&amp;apos;s spy network is eclipsed only by that of Varys.After marrying Lady Lysa Tully, widow of Lord Jon Arryn of the Vale, and her subsequent death at his hand, he becomes the Lord Protector of the Vale. Because of his relationship with Robin&amp;apos;s mother, Baelish is able to heavily influence the young Lord Robin Arryn, the new Lord Paramount of the Vale.', 'Alive'),
('Brienne Tarth', 'Tarth', 'Brienne Tarth, commonly known as Brienne of Tarth, is a warrior of House Tarth, vassals to House Baratheon, and the only daughter of Lord Selwyn Tarth.', 'Alive'),
('Melisandre', 'Lord of Light', 'Melisandre, often referred to as the Red Woman, is a Red Priestess in the religion of R&amp;apos;hllor, the Lord of Light, and a close counselor to Stannis Baratheon in his campaign to take the Iron Throne. After Stannis Baratheon&amp;apos;s death at the Battle of Winterfell, she revives Jon Snow after he was murdered by various members of the Night&amp;apos;s Watch. She believes him to be The Prince That Was Promised. She&amp;apos;s an adviser to Jon until she is banished from the North after the Battle of the Bastards when Ser Davos Seaworth tells Jon that she burned Shireen Baratheon shortly before the Battle of Winterfell.', 'Alive');

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
-- Table structure for table `editable`
--

CREATE TABLE `editable` (
  `Things` varchar(20) NOT NULL,
  `val` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editable`
--

INSERT INTO `editable` (`Things`, `val`) VALUES
('timer', '2017/0/16'),
('video', 'Long_Walk.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `lid` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `uploader` varchar(40) DEFAULT NULL,
  `url` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`lid`, `title`, `pic`, `uploader`, `url`) VALUES
(1, 'Coldplay\'s Game of Thrones: The Musical', 'coldplay_got.jpg', 'Coldplay', 'https://www.youtube.com/watch?v=zs7xO5P3Az4'),
(2, 'Game of Desks', 'game_of_desks.jpg', 'The Tonight Show Starring Jimmy Fallon', 'https://www.youtube.com/watch?v=Gqgdyn6wg7E&t=321s'),
(3, 'Game of Thrones Hall of Faces', 'hall of faces.jpg', 'The Late Late Show with James Corden', 'https://www.youtube.com/watch?v=pk7E5HNqgxY'),
(4, 'GRAHAM OF THRONES', 'got graham norton.jpg', 'The Graham Norton Show', 'https://www.youtube.com/watch?v=2enLWj3dVQw&t=314s');

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
('admin', 'khd.sayed@gmail.com', 'KK', 'cersei'),
('kholid', 'h2@W', 'KK', 'snow'),
('', '', '', 'none');

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
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`lid`);

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
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
