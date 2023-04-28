-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 05:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(10) NOT NULL,
  `ques_id` int(10) NOT NULL,
  `ans_num` int(10) NOT NULL,
  `choices` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `ques_id`, `ans_num`, `choices`) VALUES
(1, 1, 1, 'A) A programming language used in web development'),
(2, 1, 2, 'B) A security vulnerability found in web applications'),
(3, 1, 3, 'C) A software used for creating databases'),
(4, 1, 4, 'D) A tool used for web scraping'),
(5, 2, 1, 'A) Steal sensitive information'),
(6, 2, 2, 'B) Redirect users to malicious websites'),
(7, 2, 3, 'C) Manipulate web content'),
(8, 2, 4, 'D) All of the above'),
(9, 3, 1, 'A) DOM'),
(10, 3, 2, 'B) Stored'),
(11, 3, 3, 'C) Reflected'),
(12, 3, 4, 'D) Inflicted'),
(13, 4, 1, 'A) Compromise of users'),
(14, 4, 2, 'B) Loss of data integrity'),
(15, 4, 3, 'C) Destruction of data'),
(16, 4, 4, 'D) None of the above'),
(17, 5, 1, 'A) \''),
(18, 5, 2, 'B) !'),
(19, 5, 3, 'C) <'),
(20, 5, 4, 'D) $'),
(21, 6, 1, 'A) htmlspecialchars()'),
(22, 6, 2, 'B) textContent()'),
(23, 6, 3, 'C) escape()'),
(24, 6, 4, 'D) All of the above'),
(25, 7, 1, 'A) encodeURI()'),
(26, 7, 2, 'B) escape()'),
(27, 7, 3, 'C) encodeURIComponent()'),
(28, 7, 4, 'D) All of the above'),
(29, 8, 1, 'A) All types of XSS'),
(30, 8, 2, 'B) Stored XSS'),
(31, 8, 3, 'C) Reflected XSS'),
(32, 8, 4, 'D) DOM based XSS'),
(33, 9, 1, 'A) <script>alert(document.URL);</script>'),
(34, 9, 2, 'B) <script>alert(document.title);</script>'),
(35, 9, 3, 'C) <script>alert(document.cookie);</script>'),
(36, 9, 4, 'D) <script>alert(document.origin);</script>'),
(37, 10, 1, 'A) <div>document.cookie</div>'),
(38, 10, 2, 'B) <script>console.log(document.cookie);</script>'),
(39, 10, 3, 'C) <img src=\"image.jpg\" onerror=\"alert(document.cookie)\">'),
(40, 10, 4, 'D) All of the above');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` int(5) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `series_order` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `game_pic` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `game_name`, `release_date`, `series_order`, `developer`, `publisher`, `platform`, `genre`, `game_pic`, `description`) VALUES
(1, 'Kingdom Hearts', 'March 28, 2002 (JPN)', '6th in timeline,\r\n1st in release', 'Square Enix', 'Square Enix', 'Playstation 2', 'Action RPG', 'includes\\khc\\KH1.png', 'Kingdom Hearts is the first game in the Kingdom Hearts series developed and published by Square Enix (formerly Square Co., LTD) for PlayStation 2 and directed by Tetsuya Nomura. This action RPG game began as a collaboration between Square and Disney Interactive Studios and feature a cast of Disney voice actors. The game was very well-received for mixing action and RPG gameplay elements and for incorporating Disney, Final Fantasy, and the game\'s own original characters.'),
(2, 'Kingdom Hearts: Chain of Memories', 'November 11, 2004 (JPN)', '7th in timeline,\r\n2nd in release', 'Square Enix & Jupiter', 'Square Enix', 'Game Boy Advance & Playstation 2', 'Action RPG', 'includes\\khc\\KHCOM.png', 'Kingdom Hearts: Chain of Memories is a sequel to Kingdom Hearts developed by Jupiter and published by Square Enix for the Game Boy Advance in 2004. It was the second game released in the series and the third game in the timeline after Kingdom Hearts Birth by Sleep and Kingdom Hearts, and takes place during Kingdom Hearts 358/2 Days and before Kingdom Hearts II.'),
(3, 'Kingdom Hearts II', 'December 22, 2005 (JPN)', '9th in timeline,\r\n3rd in release', 'Square Enix', 'Square Enix', 'Playstation 2', 'Action RPG', 'includes\\khc\\KH2.png', 'Kingdom Hearts II is an action role-playing game developed and published by Square Enix and released in 2005. It is the sequel to Kingdom Hearts and Kingdom Hearts: Chain of Memories, and like the two previous games, focuses on Sora and his friends\' continued battle against the Darkness. It also offers a number of improvements over the original with many new features, most notably Sora\'s Drive Form function, an improved camera, and in-battle options called Reaction Commands.'),
(4, 'Kingdom Hearts Coded', 'November 8, 2008 (JPN)', '10th in timeline,\r\n4th in release', 'Square Enix & h.a.n.d Inc.', 'Square Enix', 'Mobile Phone & Nintendo DS', 'Console RPG', 'includes\\khc\\KHCODED.webp', 'Kingdom Hearts Coded is a game in the Kingdom Hearts series that was released on the mobile phone as a puzzle game using 3D backgrounds. It focuses on King Mickey and Sora, depicting the events that transpired prior to the end of Kingdom Hearts II; the game is also deeply linked with Kingdom Hearts Birth by Sleep. It is because of this that the game did not release its final episode until after the release of Kingdom Hearts Birth by Sleep, so that the ending of Kingdom Hearts coded did not spoil the ending of Kingdom Hearts Birth by Sleep with their connection. The game was announced at the 2007 Tokyo Game Show, and did not conclude until early 2010. Kingdom Hearts coded was released on the Panasonic phone: the Docomo Prime Series-P-01A. The game was released in downloadable episodes.'),
(5, 'Kingdom Hearts 358/2 Days', 'May 30, 2007 (JPN)', '8th in timeline,\r\n5th in release', 'h.a.n.d Inc.', 'Square Enix', 'Nintendo DS, PlayStation 2', 'Action RPG', 'includes\\khc\\KH3582D.webp', 'Kingdom Hearts 358/2 Days (read \"Kingdom Hearts Three-Five-Eight Days over Two\") is an RPG developed by Square Enix and published by Square Enix for the Nintendo DS. It focuses on the life of Roxas between the end of Kingdom Hearts and the beginning of Kingdom Hearts II. It explores the time from Roxas\'s creation, to his daily life in Organization XIII, and finally until his confrontation with Riku that leads to his placement in the Simulated Twilight Town.'),
(6, 'Kingdom Hearts Birth by Sleep', 'November 7, 2009', '4th in timeline,\r\n6th in release', 'Square Enix', 'Square Enix', 'Playstation Portable', 'Action RPG', 'includes\\khc\\KHBBS.png', 'Kingdom Hearts Birth by Sleep is a Kingdom Hearts prequel published and developed by Square Enix for the Sony PlayStation Portable (PSP). It was released in Japan on January 9, 2010, September 7, 2010 in North America, and September 10, 2010 in Europe.[1] The game\'s name is shared with the secret video at the end of Kingdom Hearts II Final Mix, \"Birth by sleep\", which depicts a stylized version of a scene from the game. Kingdom Hearts Birth by Sleep was developed by the same team that created Kingdom Hearts Re:Chain of Memories.'),
(7, 'Kingdom Hearts 3D: Dream Drop Distance', 'March 29, 2012 (JPN)', '11th in timeline,\r\n7th in release', 'Square Enix', 'Square Enix', 'Nintendo 3DS', 'Console RPG', 'includes\\khc\\KHDDD.png', 'Kingdom Hearts 3D: Dream Drop Distance (previously known as Kingdom Hearts 3D) is a game in the Kingdom Hearts series released on the Nintendo 3DS hand-held system. It was released on March 29, 2012 in Japan, July 31, 2012 in US and Canada, July 20, 2012 in Europe, and July 26th in Australia.'),
(8, 'Kingdom Hearts X[chi]', 'July 18, 2013 (JPN)', '2nd in timeline\r\n8th in release', 'Square Enix', 'Square Enix', 'PC, Mobile Phone', 'Online Browser Game, Smartphone RPG', 'includes\\khc\\KHX.webp', 'Kingdom Hearts χ[chi] was a Kingdom Hearts game that was exclusive to PC browsers as the eighth game of the series. The game itself was free to play, but there were items available within it that can be purchased. Set before the events of the Keyblade War, Kingdom Hearts χ[chi] has simple, 2D graphics and allows all players to become Keyblade wielders.'),
(9, 'Kingdom Hearts χ Back Cover', 'January 12, 2017 (JPN)', '1st in timeline,\r\n9th in release', 'Square Enix', 'Square Enix', 'PlayStation 4, Xbox One', 'Film', 'includes\\khc\\KHXBC.png', 'Kingdom Hearts χ Back Cover is a collection of HD cutscenes taking place around the time of Kingdom Hearts χ, formatted into an hour-long movie. It is included with a package of games entitled Kingdom Hearts HD 2.8 Final Chapter Prologue.'),
(10, 'Kingdom Hearts 0.2 Birth by Sleep -A fragmentary passage-', 'January 12, 2017 (JPN)', '5th in timeline,\r\n10th in release', 'Square Enix', 'Square Enix', 'PlayStation 4, Xbox One', 'Action RPG', 'includes\\khc\\KH0.2.png', 'Kingdom Hearts 0.2: Birth by Sleep – A Fragmentary Passage is a new game told from the perspective of the protagonist Aqua. The story begins after Kingdom Hearts: Dream Drop Distance when King Mickey reveals that he has secrets to confess relating to Aqua and her time in the Realm of Darkness. The story then picks up right after the secret ending of Kingdom Hearts: Birth by Sleep Final Mix and details Aqua\'s journey through the Realm of Darkness during the following ten years. Fragments of worlds previously found in Birth by Sleep make up the game\'s environments.'),
(11, 'Kingdom Hearts III', 'January 25, 2019 (JPN)', '12th in timeline,\r\n11th in release', 'Square Enix', 'Square Enix', 'Playstation 4, Xbox One, Windows, Nintendo Switch', 'Action RPG', 'includes\\khc\\KH3.png', 'Kingdom Hearts III  is a 2019 action role-playing game developed and published by Square Enix for the PlayStation 4, Xbox One, Windows and Nintendo Switch. It is the twelfth installment in the Kingdom Hearts series, and serves as a conclusion of the \"Dark Seeker Saga\" story arc that began with the original game. Set after the events of Kingdom Hearts 3D: Dream Drop Distance, returning protagonist Sora is joined by Donald Duck, Goofy, King Mickey and Riku in their search for seven guardians of light as they attempt to thwart Xehanort\'s plan to bring about a second Keyblade War. Their journey has them cross paths with characters and visit worlds based on different Disney and Pixar intellectual properties.'),
(12, 'Kingdom Hearts Dark Road', 'June 22, 2020 (JPN)', '3rd in timeline,\r\n12th in release', 'Square Enix', 'Square Enix', 'iOS, Android, Fire OS', 'Mobile RPG, Collectable Card Game', 'includes\\khc\\KHDR.png', 'Kingdom Hearts Dark Road is a Kingdom Hearts game for the iOS, Android, and Fire OS. It focuses on Xehanort and Eraqus\' time in Scala ad Caelum where he is tasked by Master Odin to search for the Lost Masters, while Xehanort questions his alignment of wanting to side with the darkness. It takes place centuries after Union χ.'),
(13, 'Kingdom Hearts Melody of Memory', 'November 11, 2020 (JPN)', '13th in timeline,\r\n13th in release', 'Square Enix & indieszero', 'Square Enix', 'PlayStation 4, Xbox One, Windows, Nintendo Switch', 'Rhythm Game', 'includes\\khc\\KHMOM.png', 'Kingdom Hearts: Melody of Memory is a 2020 rhythm action game developed by Square Enix and indieszero, and published by Square Enix for the Nintendo Switch, PlayStation 4, Xbox One and Windows. It is the fourteenth installment in the Kingdom Hearts series, retelling the events of the series so far, while also being set after Kingdom Hearts III\'s Re Mind downloadable content scenario.'),
(14, 'Kingdom Hearts Missing-Link', 'TBA, Beta: January 13, 2023 (JPN)', 'TBA (timeline),\r\nTBA (release)', 'Square Enix', 'Square Enix', 'iOS, Android', 'Mobile RPG', 'includes\\khc\\KHML.webp', 'Kingdom Hearts Missing-Link is the upcoming game set in the Kingdom Hearts series. It was officially announced at Kingdom Hearts 20th Anniversary event on April 10, 2022. A prototype beta will commence initial limited testing exclusively in Japan for iOS devices between January 13-18, 2023.'),
(15, 'Kingdom Hearts IV', 'TBA', 'TBA (timeline),\r\nTBA (release)', 'Square Enix', 'Square Enix', 'TBA', 'Action RPG', 'includes\\khc\\KH4.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `lb_id` int(10) NOT NULL,
  `names` varchar(255) NOT NULL,
  `score` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`lb_id`, `names`, `score`) VALUES
(1, 'asd', '5/10'),
(2, 'jijoy', '9/10'),
(3, 'kaiju pika', '5/10'),
(4, 'sephiroth', '2/10');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ques_id` int(10) NOT NULL,
  `questions` mediumtext NOT NULL,
  `correct_ans` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `questions`, `correct_ans`) VALUES
(1, 'What is Cross-Site Scripting (XSS)?', 2),
(2, 'What can an attacker do with XSS?', 4),
(3, 'Which of the following is not a valid XSS attack?', 4),
(4, 'The main risk to a web application in a cross site scripting attack is …', 1),
(5, 'Which one of the following characters is most important to restrict when performing input validation to protect against XSS attacks?', 3),
(6, 'Which of the following functions can be used to prevent XSS in PHP?', 1),
(7, 'Which of the following functions can be used to prevent XSS in JavaScript?', 4),
(8, '\"<img src=x onerror=alert(document.cookie)>\"\r\n\r\nThis may lead to:', 2),
(9, 'Which of the following is the correct syntax for an XSS attack script that displays the victim\'s current URL?', 1),
(10, 'Which of the following is the correct syntax for an XSS attack script that displays the victim\'s cookie?', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `comment_id` int(5) NOT NULL,
  `col_id` int(5) NOT NULL,
  `timestamp` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `comments` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`comment_id`, `col_id`, `timestamp`, `name`, `comments`) VALUES
(1, 3, '2023-04-13 01:30:41', 'Anonymous', 'test'),
(2, 3, '2023-04-13 14:52:12', 'azierz xiii', 'nice game'),
(3, 2, '2023-04-13 14:56:11', 'Anonymous', 'need to try this game'),
(4, 12, '2023-04-21 20:52:55', 'Anonymous', '<script>alert(\"You have been attacked!\")</script>'),
(5, 4, '2023-04-26 14:08:14', 'azierz xiii', '<img src=x onerror=alert(document.cookie)>'),
(6, 10, '2023-04-27 16:16:26', 'Anonymous', 'why tho'),
(7, 5, '2023-04-27 16:44:40', 'Anonymous', '<script>console.log(\"Hello World!\");</script>'),
(8, 11, '2023-04-28 06:53:26', 'amano pikamee', 'naisu!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `type` int(5) NOT NULL,
  `first_name` mediumtext NOT NULL,
  `last_name` mediumtext NOT NULL,
  `phone_no` int(20) NOT NULL,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `registration_date` datetime NOT NULL,
  `profile_pic` mediumtext DEFAULT NULL,
  `about_me` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type`, `first_name`, `last_name`, `phone_no`, `email`, `password`, `registration_date`, `profile_pic`, `about_me`) VALUES
(1, 0, 'jijoy', 'xiii', 123456789, 'jijoy@gm.com', '982e31de667c06b574fff0b94424fba736c75048', '2023-04-01 17:49:58', 'uploads/sora crown.jpg', 'There\'s nothing to say about me\r\n\r\nbut anyway, may your heart be your guiding key'),
(2, 0, 'amano', 'pikamee', 109283746, 'pikamee@voms.net', '95188fa66e3440610930f718e30ddeeebc41b4d7', '2023-04-28 06:48:55', 'includes/defaultpic.png', 'Ohao! \r\nAmano Pikamee desu!\r\nOtsupika!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `lb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ques_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
