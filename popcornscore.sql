-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2025 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popcornscore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `ref_type` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`id`, `name`, `image`, `ref_id`, `ref_type`) VALUES
(33, 'Ryan Renolds', 'uploads/Free Guy/cast/1755672182_fg.png', 76, 'movie'),
(34, 'christen bale', 'uploads/ford v ferrari/cast/1755672020_Exodus (01).png', 77, 'movie'),
(35, 'matt demon', 'uploads/ford v ferrari/cast/1755672020_piki.jpg', 77, 'movie'),
(36, 'peter dinkladge', 'uploads/Game Of Thrones/cast/1753788382_lucifer.png', 4, 'tvshow'),
(37, 'kit harinton', 'uploads/Game Of Thrones/cast/1753788382_Gladiator.png', 4, 'tvshow'),
(38, 'Natsuki Hanae', 'uploads/Ghost Rider/cast/1753790527_0_kong.png', 78, 'movie'),
(39, 'john cena', 'uploads/Ghost Rider/cast/1753790527_1_jon.jpg', 78, 'movie'),
(40, 'Akari Kitō', 'uploads/Ghost Rider/cast/1753790527_2_ford.png', 78, 'movie'),
(41, 'brad pitt', 'uploads/Fight Club/cast/1755671633_Fight club (d).png', 79, 'movie'),
(42, 'john cena', 'uploads/man of steel/cast/1753790650_1_jon.jpg', 79, 'movie'),
(43, 'chris hemswoth', 'uploads/man of steel/cast/1753790650_2_ex.png', 79, 'movie'),
(44, 'ryan renolds', 'uploads/Fight Club/cast/1758520806_fg.png', 79, 'movie'),
(45, 'Jason Mamoa', 'uploads/Ghost Rider/cast/1754141883_0_see.jpg', 80, 'movie'),
(46, 'john cena', 'uploads/Ghost Rider/cast/1754141883_1_jon.jpg', 80, 'movie'),
(47, 'keanu reaves', 'uploads/Lucifer/cast/1754479015_0_1374034.png', 5, 'tvshow'),
(48, 'Heisenberg', 'uploads/Lucifer/cast/1754479015_1_1081359.jpg', 5, 'tvshow'),
(49, 'chris hemswoth', 'uploads/Thor Ragnarock/cast/1754891917_0_ex.png', 81, 'movie'),
(50, 'Ryan Gosling', 'uploads/Thor Ragnarock/cast/1754891917_1_ryan.jpeg', 81, 'movie'),
(51, 'keanu reaves', 'uploads/f1/cast/1755007324_0_Fight club (d).png', 82, 'movie'),
(52, 'pedro pascal', 'uploads/Gladiator 2/cast/1758522430_Gladiator.png', 83, 'movie'),
(53, 'chris hemswoth', 'uploads/King Of Monster/cast/1755671294_ex.png', 84, 'movie'),
(54, 'ty', 'uploads/yu/cast/1755498541_0_grava_of_the_fireflies__1988____folder_icon_by_hemlingo_deplq6l.png', 6, 'tvshow'),
(55, 'seth rogan', 'uploads/the studio/cast/1755498660_0_Gladiator.png', 7, 'tvshow'),
(56, 'Jason Mamoa', 'uploads/The Studio/cast/1755673329_see.jpg', 7, 'tvshow'),
(57, 'Brad pitt', 'uploads/F1/cast/1756296403_0_F1 (2025) New Folder Icon.png', 85, 'movie'),
(58, 'Bryan Cranston', 'uploads/Braking Bad/cast/1758260954_0_1081359.jpg', 8, 'tvshow'),
(59, 'A', 'uploads/A/cast/1758471217_0_1305369.jpeg', 86, 'movie'),
(60, 'keanu reaves', 'uploads/Game Of Thrones/cast/1758471340_0_1305369.jpeg', 9, 'tvshow'),
(61, 'Matt Smith', 'uploads/House Of Dragon/cast/1758549439_0_ryan.jpeg', 10, 'tvshow'),
(62, 'Cillian Murphy', 'uploads/Peaky Blinders/cast/1758549762_0_piki.jpg', 11, 'tvshow'),
(63, 'Jason Mamoa', 'uploads/Peaky Blinders/cast/1758549762_1_see.jpg', 11, 'tvshow'),
(64, 'john cena', 'uploads/Peaky Blinders/cast/1758549762_2_jon.jpg', 11, 'tvshow'),
(65, 'Antony Starr', 'uploads/The Boys/cast/1758550994_0_974892.jpg', 12, 'tvshow'),
(66, 'William Butucher', 'uploads/The Boys/cast/1758550994_1_900849.jpg', 12, 'tvshow'),
(67, 'keanu reaves', 'uploads/Rings Of Power/cast/1758551320_0_900849.jpg', 13, 'tvshow'),
(68, 'Andrew Lincon', 'uploads/The Walking Dead/cast/1758551604_0_1354563.jpeg', 14, 'tvshow'),
(69, 'Daryl Dixon', 'uploads/The Walking Dead/cast/1758551604_1_380849.png', 14, 'tvshow'),
(70, 'Nigan ', 'uploads/The Walking Dead/cast/1758551604_2_ex.png', 14, 'tvshow'),
(71, 'henry cavil', 'uploads/The Walking Dead/cast/1758551604_3_900849.jpg', 14, 'tvshow'),
(72, 'Bryan Cranston', 'uploads/The Walking Dead/cast/1758551604_4_1375376.png', 14, 'tvshow');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'jon', 'jon@gmail.com', 'good', 'i found this website very usefull ', '2025-08-28 07:12:34'),
(2, 'Jangad Rehan', 'rehan@123.com', 'good', 'nice', '2025-08-28 07:44:16'),
(3, 'homelander', 'home@lander.com', 'good', ';;', '2025-08-29 06:03:47'),
(4, 'homelander', 'home@lander.com', 'ljl', 'ljljljlnkj  kj kj ', '2025-08-29 06:05:11'),
(5, 'homelander', 'home@lander.com', 'dfghjk', 'fghj', '2025-08-29 06:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `moviename` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `poster` varchar(300) DEFAULT NULL,
  `details` varchar(3000) DEFAULT NULL,
  `director` varchar(300) DEFAULT NULL,
  `producer` varchar(300) DEFAULT NULL,
  `trailer` varchar(300) DEFAULT NULL,
  `wiki` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `moviename`, `photo`, `poster`, `details`, `director`, `producer`, `trailer`, `wiki`) VALUES
(76, 'Free Guy', 'uploads/free guy/fg.png', 'uploads/Free Guy/1758522324_1198451.jpg', 'Free Guy is a 2021 American action comedy film directed and produced by Shawn Levy from a screenplay by Matt Lieberman and Zak Penn, and a story by Lieberman. The film stars Ryan Reynolds, Jodie Comer, Lil Rel Howery, Utkarsh Ambudkar, Joe Keery, and Taika Waititi. It tells the story of a bank teller who discovers that he is a non-player character in a massively multiplayer online game who then partners with a player to find evidence that a gaming company\'s CEO stole the source code of the player\'s game.', 'Shawn Levy', 'Ryan Reynolds', 'https://www.youtube.com/embed/JORN2hkXLyM', 'https://en.wikipedia.org/wiki/Free_Guy'),
(77, 'Ford v Ferrari', 'uploads/ford v ferrari/ford.png', 'uploads/Ford v Ferrari/1758522347_1121401.jpg', 'Ford v Ferrari (titled Le Mans \'66 in some European countries)[4] is a 2019 American biographical sports drama film directed by James Mangold and written by Jez Butterworth, John-Henry Butterworth, and Jason Keller. It stars Matt Damon and Christian Bale, with Jon Bernthal, Caitríona Balfe, Tracy Letts, Josh Lucas, Noah Jupe, Remo Girone, and Ray McKinnon in supporting roles. The plot follows a determined team of American and English engineers and designers, led by automotive designer Carroll Shelby and his English driver, Ken Miles, who are hired by Henry Ford II and Lee Iacocca to build a race car to defeat the perennially dominant Italian racing team Scuderia Ferrari at the 1966 24 Hours of Le Mans race in France.', 'James Mangold', 'Peter Chernin', 'https://www.youtube.com/embed/zyYgDtY2AMY', 'https://en.wikipedia.org/wiki/Ford_v_Ferrari'),
(78, 'Demon Slayer', 'uploads/Ghost Rider/1753790527_ds.png', 'uploads/Demon Slayer/1758522362_1180819.jpg', 'Demon Slayer: Kimetsu no Yaiba – The Movie: Infinity Castle (Japanese: 劇場版「鬼滅の刃」無限城編, Hepburn: Gekijō-ban Kimetsu no Yaiba: Mugen Jō-hen), is a an upcoming Japanese animated dark fantasy action film based on the \"Infinity Castle\" arc of the 2016–20 manga series Demon Slayer: Kimetsu no Yaiba by Koyoharu Gotouge. It is a direct sequel to the fourth season of the anime television series as well as its fourth, fifth, and sixth film adaptations, following Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train (2020), Demon Slayer: Kimetsu no Yaiba – To the Swordsmith Village (2023), and Demon Slayer: Kimetsu no Yaiba – To the Hashira Training (2024). The films are directed by Haruo Sotozaki and produced by Ufotable, and written by the studio\'s staff members.', 'Haruo Sotozaki', 'Akifumi Fujio', 'https://www.youtube.com/embed/wyiZWYMilgk', 'https://en.wikipedia.org/wiki/Demon_Slayer:_Kimetsu_no_Yaiba_%E2%80%93_The_Movie:_Infinity_Castle'),
(79, 'Fight Club', 'uploads/man of steel/1753790650_Fight club (d).png', 'uploads/Fight Club/1758520806_brad-pitt-tyler-3840x2160-20017.png', 'Fight Club is a 1999 American film directed by David Fincher and starring Brad Pitt, Edward Norton and Helena Bonham Carter. It is based on the 1996 novel Fight Club by Chuck Palahniuk. Norton plays the unnamed narrator, who is discontented with his white-collar job. He forms a \"fight club\" with a soap salesman, Tyler Durden (Pitt) and becomes embroiled with an impoverished but beguiling woman, Marla Singer (Bonham Carter).', 'David Fincher', 'Art Linson', 'https://www.youtube.com/embed/dfeUzm6KF4g', 'https://en.wikipedia.org/wiki/Fight_Club'),
(80, 'Ghost Rider', 'uploads/Ghost Rider/1754141883_gr.png', 'uploads/Ghost Rider/1758522377_619885.jpg', 'Ghost Rider is a 2007 American superhero film written and directed by Mark Steven Johnson. Based on the Marvel Comics character of the same name, it was produced by Columbia Pictures in association with Marvel Entertainment, Crystal Sky Pictures, and Relativity Media, and distributed by Sony Pictures Releasing. The film stars Nicolas Cage as the titular character, with Eva Mendes, Wes Bentley, Sam Elliott, Donal Logue, Matt Long, and Peter Fonda in supporting roles. The film follows Johnny Blaze, a motorcycle stuntman who sells his soul and becomes the Ghost Rider, a bounty hunter of evil demons.', 'Martin Scosece', 'Kavin Fagie', 'https://www.youtube.com/embed/nu6R7ypaz5g', 'https://en.wikipedia.org/wiki/Ghost_Rider'),
(81, 'Thor Ragnarock', 'uploads/Thor Ragnarock/1754891917_thor.png', 'uploads/Thor Ragnarock/1758522400_104474.jpg', 'Thor: Ragnarok is a 2017 American superhero film based on the Marvel Comics character Thor, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to Thor (2011) and Thor: The Dark World (2013), and is the 17th film in the Marvel Cinematic Universe (MCU). The film was directed by Taika Waititi from a screenplay by Eric Pearson and the writing team of Craig Kyle and Christopher Yost, and stars Chris Hemsworth as Thor alongside Tom Hiddleston, Cate Blanchett, Idris Elba, Jeff Goldblum, Tessa Thompson, Karl Urban, Mark Ruffalo, and Anthony Hopkins. In Thor: Ragnarok, Thor must escape the alien planet Sakaar in time to save Asgard from Hela (Blanchett) and the impending Ragnarök.', 'taika waititi', 'Kavin Fagie', 'https://www.youtube.com/embed/ue80QwXMRHg', 'https://en.wikipedia.org/wiki/Thor:_Ragnarok'),
(82, 'Godzilla v Kong', 'uploads/Godzilla v Kong/1017257.jpg', 'uploads/Godzilla v Kong/1758551877_1372333.jpeg', 'Godzilla vs. Kong is a 2021 American monster film directed by Adam Wingard. Produced by Legendary Pictures and distributed by Warner Bros. Pictures, it is a sequel to Kong: Skull Island (2017) and Godzilla: King of the Monsters (2019), and is the fourth film in the Monsterverse. It is also the 36th film in the Godzilla franchise, the 12th film in the King Kong franchise, and the fourth Godzilla film to be completely produced by an American film studio.[b] The film stars Alexander Skarsgård, Millie Bobby Brown, Rebecca Hall, Brian Tyree Henry, Shun Oguri, Eiza González, Julian Dennison, Lance Reddick, Kyle Chandler, and Demián Bichir. Brown and Chandler reprise their roles from the previous Godzilla film. In the film, Kong clashes with Godzilla after the Monarch organization moves the ape from Skull Island to the Hollow Earth, homeworld of the monsters known as \"Titans\", and to retrieve a power source for a secret weapon intended to stop Godzilla\'s mysterious attacks.', 'Adam Wingard', 'Thomas Tull', 'https://www.youtube.com/embed/odM92ap8_c0', 'https://en.wikipedia.org/wiki/Godzilla_vs._Kong'),
(83, 'Gladiator 2', 'uploads/Gladiator 2/Gladiator.png', 'uploads/Gladiator 2/1758522430_1383771.jpg', 'Gladiator II is a 2024 historical epic film directed and produced by Ridley Scott that is a sequel to Gladiator (2000). Written by David Scarpa based on a story he wrote with Peter Craig, the film was produced by Scott Free Productions and distributed by Paramount Pictures. It stars Paul Mescal, Pedro Pascal, Joseph Quinn, Fred Hechinger, Connie Nielsen, and Denzel Washington.[7] Derek Jacobi and Nielsen reprise their roles from the first film, with Mescal replacing Spencer Treat Clark. Mescal portrays Lucius Verus Aurelius, the exiled Prince of Rome, who becomes a prisoner of war and fights as a gladiator for Macrinus, a former slave who plots to overthrow the twin emperors Geta and Caracalla.', 'rindly scott', 'james franco', 'http://youtube.com/embed/TQwSz88ITAE', 'https://en.wikipedia.org/wiki/Gladiator_II'),
(84, 'King Of Monster', 'uploads/King Of Monster/god.png', 'uploads/King Of Monster/1758522458_1017257.jpg', 'Godzilla: King of the Monsters[d] is a 2019 American[b] monster film produced by Legendary Pictures[a] and distributed by Warner Bros. Pictures. Co-written and directed by Michael Dougherty, it is a sequel to Godzilla (2014) and the third film in the Monsterverse. It is also the 35th film in the Godzilla franchise, and the third Godzilla film to be completely produced by a Hollywood studio.[e] The film stars Kyle Chandler, Vera Farmiga, Millie Bobby Brown, Bradley Whitford, Sally Hawkins, Charles Dance, Thomas Middleditch, Aisha Hinds, O\'Shea Jackson Jr., David Strathairn, Ken Watanabe, and Zhang Ziyi. In the film, eco-terrorists release King Ghidorah,', 'R.R.martin', 'stephan king', 'https://www.youtube.com/embed/6prr2MIHE0Q', 'https://en.wikipedia.org/wiki/Godzilla:_King_of_the_Monsters_(2019_film)'),
(85, 'F1', 'uploads/F1/F1 (2025) The Movie Folder Icon.png', 'uploads/F1/1758515922_1395613.jpg', 'F1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 is a racing Movie staring Brad pitt, Damson Idro produced this filmF1 is a racing Movie staring Brad pitt, Damson Idris and so many actors and real life drivers like sir lewis hamilton the 7time world champion in the world is also a part of this film and he also produced this filmF1 i', 'Joseph Kosinski', 'Lewis Hamilton', 'https://www.youtube.com/embed/KsBNOAAXiCY', 'https://en.wikipedia.org/wiki/F1_(film)');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `coments` varchar(300) DEFAULT NULL,
  `ref_type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `ref_id`, `rating`, `coments`, `ref_type`) VALUES
(1, 2, 77, 10, 'great', 'movie'),
(2, 2, 76, 9, 'good', 'movie'),
(3, 2, 79, 10, 'best of david fincher', 'movie'),
(4, 2, 80, 7, 'bike was cool', 'movie'),
(9, 2, 4, 10, 'best of 21 cetury', 'tvshow'),
(10, 2, 78, 9, 'good vibe', 'movie'),
(16, 11, 80, 8, 'cage time', 'movie'),
(17, 11, 79, 8, 'best', 'movie'),
(18, 11, 77, 8, 'besssttt', 'movie'),
(19, 11, 76, 7, 'timepaass', 'movie'),
(20, 11, 78, 7, 'good work', 'movie'),
(21, 11, 5, 9, 'hamilton is best', 'tvshow'),
(22, 11, 4, 9, 'great', 'tvshow'),
(23, 2, 5, 8, 'best director hamilton', 'tvshow'),
(24, 7, 76, 8, 'very good', 'movie'),
(25, 7, 77, 10, 'best of all time', 'movie'),
(26, 7, 78, 10, 'songs are not really good', 'movie'),
(27, 7, 79, 9, 'best of this century jjj', 'movie'),
(28, 7, 80, 7, 'good driving i think', 'movie'),
(29, 7, 5, 6, 'director rocks', 'tvshow'),
(30, 7, 4, 10, 'best', 'tvshow'),
(31, 2, 81, 9, 'good ending', 'movie'),
(34, 7, 7, 10, 'best acting by all cast ', 'tvshow'),
(35, 7, 83, 10, 'great set, great action', 'movie'),
(36, 7, 84, 7, 'ok movie', 'movie'),
(37, 12, 76, 7, 'not a big deal', 'movie'),
(38, 12, 77, 10, 'good racing movie so far not good as f1', 'movie'),
(39, 12, 78, 7, 'decent movie animation is best ', 'movie'),
(40, 12, 79, 10, 'it is best movie ', 'movie'),
(41, 12, 80, 4, 'not a big fan of ghost rider', 'movie'),
(42, 12, 81, 6, 'thor is best character from all of characters', 'movie'),
(43, 12, 82, 9, 'cgi is so good', 'movie'),
(44, 12, 83, 8, 'not good as first part but all though good movie', 'movie'),
(45, 12, 84, 5, 'monsters are not as good as they showed', 'movie'),
(46, 12, 7, 10, 'best work of seth rogan', 'tvshow'),
(47, 12, 5, 5, 'timepass', 'tvshow'),
(48, 12, 4, 8, 'greatness shows how to shine', 'tvshow'),
(49, 7, 85, 10, 'best racing movie', 'movie'),
(50, 13, 76, 7, 'timepass', 'movie'),
(51, 13, 77, 9, 'masterpiece', 'movie'),
(52, 13, 78, 8, 'good cgi', 'movie'),
(53, 13, 79, 9, 'best ', 'movie'),
(54, 13, 80, 7, 'good bike', 'movie'),
(55, 13, 81, 8, 'this time goes crazy', 'movie'),
(56, 13, 82, 6, 'nice cgi of kong', 'movie'),
(57, 13, 83, 10, 'masterpiece', 'movie'),
(58, 13, 84, 8, 'good movie all though', 'movie'),
(59, 13, 85, 9, 'one of the best racing movie ever made. ', 'movie'),
(60, 13, 4, 10, 'the goat seriese', 'tvshow'),
(61, 13, 5, 8, 'good but so long', 'tvshow'),
(62, 13, 7, 9, 'masterpiece', 'tvshow'),
(63, 14, 76, 8, 'timepass', 'movie'),
(64, 14, 77, 9, 'masterpiece', 'movie'),
(65, 14, 78, 7, 'good movie', 'movie'),
(66, 14, 79, 9, 'masterpiece', 'movie'),
(67, 14, 80, 9, 'timepass', 'movie'),
(68, 14, 81, 9, 'hulk goes crazy', 'movie'),
(69, 14, 82, 8, 'kong is huge', 'movie'),
(70, 14, 83, 8, 'masterpiece', 'movie'),
(71, 14, 84, 8, 'nice monstores', 'movie'),
(72, 14, 85, 9, 'best movie ever i watched in IMAX', 'movie'),
(73, 14, 4, 9, 'best drama seriese', 'tvshow'),
(74, 14, 5, 8, 'timepass', 'tvshow'),
(75, 14, 7, 9, 'masterpiece', 'tvshow'),
(76, 15, 76, 5, 'not good', 'movie'),
(77, 15, 77, 6, 'badass', 'movie'),
(78, 15, 78, 3, 'not a fan of it', 'movie'),
(79, 15, 79, 7, 'best by brad pitt', 'movie'),
(80, 15, 80, 4, 'nah worse movie', 'movie'),
(81, 15, 81, 8, 'where is loki', 'movie'),
(82, 15, 83, 7, 'best from diretor', 'movie'),
(83, 15, 82, 1, 'bad cgi', 'movie'),
(84, 15, 84, 2, 'bad movie', 'movie'),
(85, 15, 85, 10, 'i want to ride this freaking f1 car man', 'movie'),
(86, 15, 4, 9, 'best was season 4', 'tvshow'),
(87, 15, 5, 1, 'not like this ', 'tvshow'),
(88, 15, 7, 9, 'masterpiece', 'tvshow'),
(89, 16, 76, 6, 'Movie like one time watch', 'movie'),
(90, 16, 77, 10, 'It called masterpiece cinema ', 'movie'),
(91, 16, 78, 10, 'Animation is Absolute god level whenever you have time watch this movie ', 'movie'),
(92, 16, 4, 9, 'the series is Absolute watching but last session is ignore ', 'tvshow'),
(93, 16, 5, 7, 'the series is good but story sometimes is not suitable has per lucifer  ', 'tvshow'),
(94, 16, 7, 9, 'Absolute watch series why Because when writer Cooked in story    ', 'tvshow'),
(95, 17, 85, 10, 'the masterpiece movie perfect director and music is Absolute cinema  ', 'movie'),
(96, 2, 14, 9, 'best', 'tvshow'),
(97, 2, 12, 9, 'best', 'tvshow'),
(98, 2, 11, 10, 'best british drama ', 'tvshow'),
(99, 2, 13, 10, 'best visuals', 'tvshow'),
(100, 2, 10, 9, 'best', 'tvshow'),
(101, 2, 7, 9, 'seth rogan rocks', 'tvshow'),
(102, 2, 8, 10, 'best of the best', 'tvshow'),
(103, 7, 82, 8, 'wow', 'movie'),
(104, 7, 8, 9, 'greatest', 'tvshow'),
(105, 7, 10, 10, 'holy shit', 'tvshow'),
(106, 7, 11, 9, 'aura farming', 'tvshow'),
(107, 7, 12, 9, 'brutal', 'tvshow'),
(108, 7, 13, 10, 'best visuals', 'tvshow'),
(109, 7, 14, 9, 'deadly', 'tvshow'),
(110, 12, 8, 8, 'wow', 'tvshow'),
(111, 12, 10, 5, 'nice but not as got', 'tvshow'),
(112, 12, 11, 8, 'great seriese', 'tvshow'),
(113, 12, 12, 6, 'so brutal very aggrasive language used', 'tvshow'),
(114, 12, 13, 3, 'so boring', 'tvshow'),
(115, 12, 14, 5, 'very big so much to watch', 'tvshow'),
(116, 14, 8, 8, 'omg', 'tvshow'),
(117, 14, 10, 5, 'wow moments', 'tvshow'),
(118, 14, 11, 6, 'good but timepass', 'tvshow'),
(119, 14, 12, 8, 'very brutal', 'tvshow'),
(120, 14, 13, 8, 'wow graphics', 'tvshow'),
(121, 14, 14, 6, 'omg', 'tvshow'),
(122, 13, 14, 8, 'so good but long', 'tvshow'),
(123, 13, 13, 9, 'very imprasive  sets', 'tvshow'),
(124, 13, 12, 10, 'WTF', 'tvshow'),
(125, 13, 11, 4, 'timepass', 'tvshow'),
(126, 13, 10, 8, 'timepass but good', 'tvshow'),
(127, 13, 8, 9, 'hell yeah comon ', 'tvshow'),
(128, 15, 14, 4, 'timepass', 'tvshow'),
(129, 15, 13, 5, 'good work', 'tvshow'),
(130, 15, 12, 7, 'hell yes', 'tvshow'),
(131, 15, 10, 9, 'good work', 'tvshow'),
(132, 15, 11, 10, 'by order of peaky blinders', 'tvshow'),
(133, 15, 8, 6, 'where is my half', 'tvshow');

-- --------------------------------------------------------

--
-- Table structure for table `tvshow`
--

CREATE TABLE `tvshow` (
  `id` int(11) NOT NULL,
  `showname` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `poster` varchar(300) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `director` varchar(300) DEFAULT NULL,
  `producer` varchar(300) DEFAULT NULL,
  `trailer` varchar(300) DEFAULT NULL,
  `wiki` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tvshow`
--

INSERT INTO `tvshow` (`id`, `showname`, `photo`, `poster`, `details`, `director`, `producer`, `trailer`, `wiki`) VALUES
(4, 'Game Of Thrones', 'uploads/Game Of Thrones/1753786906_got.png', 'uploads/Game Of Thrones/1758519492_wallpaperflare.com_wallpaper.jpg', 'Game of Thrones is an American fantasy drama television series created by David Benioff and D. B. Weiss for HBO. It is an adaptation of A Song of Ice and Fire, a series of high fantasy novels by George R. R. Martin, the first of which is A Game of Thrones. The show premiered on HBO in the United Sta', 'R.R.martin', 'David Benioff', 'https://www.youtube.com/embed/KPLWWIOCOOQ', 'https://en.wikipedia.org/wiki/Game_of_Thrones'),
(5, 'Lucifer', 'uploads/Lucifer/lucifer.png', 'uploads/Lucifer/1758522554_1134172.jpg', 'Lucifer is an American urban fantasy television series developed by Tom Kapinos that began airing on January 25, 2016 and concluded on September 10, 2021. It revolves around Lucifer Morningstar (Tom Ellis), an alternate version of the DC Comics character of the same name created by Neil Gaiman, Sam ', 'Joe Henderson', 'Tom Kapinos', 'https://www.youtube.com/embed/KRQb74Cr9N0', 'https://en.wikipedia.org/wiki/Lucifer_(TV_series)'),
(7, 'The Studio', 'uploads/The Studio/The Studio TV Series (2025) Folder Icon.png', 'uploads/The Studio/1758520675_studio.jpg', 'The Studio is an American satirical cringe comedy television series created by Seth Rogen, Evan Goldberg, Peter Huyck, Alex Gregory, and Frida Perez. It stars Rogen as an embattled Hollywood studio head struggling to balance corporate demands with his own passion for producing quality films. Catheri', 'Seth Rogen', 'Seth Rogen', 'http://youtube.com/embed/ucgsmqxSJ1c', 'https://en.wikipedia.org/wiki/The_Studio_(TV_series)'),
(8, 'Braking Bad', 'uploads/Braking Bad/1758260954_bd.png', 'uploads/Braking Bad/1758519786_20231014_113044.jpg', 'Breaking Bad is an American neo-Western crime drama television series created and produced by Vince Gilligan for AMC. Set and filmed in Albuquerque, New Mexico, the series follows Walter White (Bryan Cranston), an over-qualified, dispirited high-school chemistry teacher struggling with a recent diagnosis of stage-three lung cancer. White turns to a life of crime and partners with a former student, Jesse Pinkman (Aaron Paul), to produce and distribute methamphetamine to secure his family\'s financial future before he dies, while navigating the dangers of the criminal underworld. The series also stars Anna Gunn, Dean Norris, RJ Mitte, Betsy Brandt, Giancarlo Esposito, Jonathan Banks, and Bob Odenkirk.', 'Vince Gilligan', 'Vince Gilligan', 'https://www.youtube.com/watch?v=4HRus-FhCE0', 'https://en.wikipedia.org/wiki/Breaking_Bad'),
(10, 'House Of Dragon', 'uploads/House Of Dragon/hotd.png', 'uploads/House Of Dragon/1758549439_1265780.jpg', 'House of the Dragon received a straight-to-series order in October 2019, with casting beginning in July 2020 and principal photography starting in April 2021 in the United Kingdom. The series premiered on August 21, 2022, with the first season consisting of ten episodes. The series was renewed for a second season five days after its premiere.', 'George R. R. Martin', 'Ryan Condal', 'https://www.youtube.com/watch?v=YN2H_sKcmGw', 'https://en.wikipedia.org/wiki/House_of_the_Dragon'),
(11, 'Peaky Blinders', 'uploads/Peaky Blinders/1758549762_pt85rqaaq2chcs9druhu52fm99-3352ff78a72a09b23e3a08757938c692.png', 'uploads/Peaky Blinders/1758549762_piki.jpg', 'Peaky Blinders is a British historical crime drama television series created by Steven Knight. Set in Birmingham, it follows the exploits of the Peaky Blinders crime gang in the direct aftermath of the First World War. The fictional gang is loosely based on a real urban youth gang active in the city from the 1880s to the 1920s.', 'Steven Knight', 'Steven Knight', 'https://www.youtube.com/watch?v=PxZ5gGfPtCQ', 'https://en.wikipedia.org/wiki/Peaky_Blinders_(TV_series)'),
(12, 'The Boys', 'uploads/The Boys/1758550994_boys.png', 'uploads/The Boys/1758550994_boys.jpg', 'The Boys is an American satirical superhero television series developed by Eric Kripke for Amazon Prime Video. Based on the comic book of the same name by Garth Ennis and Darick Robertson, it follows the eponymous team of vigilantes as they combat superpowered individuals (referred to as \"Supes\") who abuse their powers for personal gain and work for a powerful company (Vought International) that ensures the general public views them as heroes.', 'Eric Kripke', 'Karl Urban', 'https://www.youtube.com/watch?v=F9U-yoJbgWs', 'https://en.wikipedia.org/wiki/The_Boys_(TV_series)'),
(13, 'Rings Of Power', 'uploads/Rings Of Power/1758551320_rop.png', 'uploads/Rings Of Power/1758551320_1301451.jpg', 'The Lord of the Rings: The Rings of Power is an American fantasy television series developed by J. D. Payne and Patrick McKay for the streaming service Amazon Prime Video.Amazon acquired the television rights for The Lord of the Rings from the Tolkien Estate in November 2017, making a five-season production commitment worth at least US$1 billion. This would make it the most expensive television series ever made.', 'J. D. Payne', ' J. R. R. Tolkien', 'https://www.youtube.com/watch?v=x8UAUAuKNcU', 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings:_The_Rings_of_Power'),
(14, 'The Walking Dead', 'uploads/The Walking Dead/1758551604_pngegg (1).png', 'uploads/The Walking Dead/1758551604_1329203.jpeg', 'The Walking Dead is an American post-apocalyptic horror drama television series developed by Frank Darabont, based on the comic book series of the same name by Robert Kirkman, Tony Moore, and Charlie Adlard. Together, the show and the comic book series form the core of The Walking Dead franchise. The series features a large ensemble cast as survivors of a zombie apocalypse trying to stay alive under near-constant threat of attacks from zombies known as \"walkers\". With the collapse of modern civilization, these survivors must confront other human survivors who have formed groups and communities with their own sets of laws and morals, sometimes leading to open conflict between them. The series is the first television series within The Walking Dead franchise.', 'Frank Darabont', 'Andrew Lincoln', 'https://www.youtube.com/watch?v=Rj-OobZL8cM', 'https://en.wikipedia.org/wiki/The_Walking_Dead_(TV_series)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `photo`, `email`, `password`, `admin`) VALUES
(2, 'Admin', 'uploads/profilephotos/1756728126_avatar1.jpg', 'jon@gmail.com', '$2y$10$vKTmgkhayOHJqzwFu5Z8m.zhhGahzhjjNG9hLCon70q2sB1ijApHW', 1),
(7, 'homelander', 'uploads/profilephotos/1757311162_mortal.jpeg', 'home@lander.com', '$2y$10$4yZSuOV22puL3U./B67cDuVdhGu2bToHf8V.b2LkP1TRshS7XQkfa', 0),
(12, 'ryan', 'uploads/profilephotos/1757311059_ryan.jpeg', 'ryangosling@123.com', '$2y$10$JoH0ClN9LQHp9mGtQyJtmOLcUCFR95voG6ZMSeUn6acfo2DoPTOzC', 0),
(13, 'The Weekend', 'uploads/profilephotos/1757677011_brad-pitt-tyler-3840x2160-20017.png', 'weekend@gmail.cpm', '$2y$10$2/C8F.bWVitx2.BqKC6kfOd6mTPc6RGC0RZ1jtdH6JiWVQW6uO4MG', 0),
(14, 'Roronoa Zoro', 'uploads/profilephotos/1757677419_1352217.png', 'zoro@gmail.com', '$2y$10$w2FvLcPD7rMo8vH0I2E6veOAoHztp5CvPr2l4Cmt3ppDvWdhsoG.m', 0),
(15, 'Tony Stark', 'uploads/profilephotos/1757677998_350591.jpg', 'stark@gmail.com', '$2y$10$QZ2dCM54TlgmA3QJsRX1eOyJjrSSI78Xvd.AjKCF5ym6m7FgwJQPa', 0),
(16, 'Lord Vision', NULL, 'Vision@gmail.com', '$2y$10$dtvwNI2jmBo62ABDhBk0zujTz1PxbELRwA.SdtNwKEtNzXDbjamZm', 0),
(17, 'Yotei', NULL, 'yotei@gmail.com', '$2y$10$RSOGWhzRB9DbpXUxH9DnLOrqI8938Fl7cKdj9AarIteaY3BS/vvqC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ref_type` varchar(100) NOT NULL,
  `ref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `user_id`, `ref_type`, `ref_id`) VALUES
(3, 2, 'movie', 77),
(4, 2, 'movie', 78),
(5, 2, 'movie', 79),
(9, 2, 'tvshow', 4),
(10, 2, 'tvshow', 5),
(11, 2, 'movie', 82),
(12, 7, 'tvshow', 4),
(13, 7, 'tvshow', 7),
(14, 7, 'movie', 79),
(15, 7, 'movie', 77),
(16, 7, 'movie', 81),
(17, 7, 'tvshow', 5),
(18, 7, 'movie', 85),
(19, 2, 'movie', 80),
(20, 2, 'movie', 76),
(21, 2, 'movie', 81),
(22, 2, 'movie', 84),
(23, 0, 'tvshow', 5),
(24, 0, 'tvshow', 4),
(25, 0, 'movie', 77),
(26, 0, 'movie', 77),
(27, 0, 'tvshow', 5),
(28, 14, 'tvshow', 7),
(29, 14, 'movie', 78),
(30, 14, 'movie', 77),
(31, 14, 'movie', 85),
(32, 14, 'tvshow', 4),
(33, 12, 'movie', 77),
(34, 12, 'movie', 76),
(35, 12, 'tvshow', 4),
(36, 12, 'tvshow', 7),
(37, 12, 'movie', 83),
(38, 12, 'movie', 85),
(39, 16, 'movie', 78),
(40, 16, 'movie', 77),
(41, 7, 'tvshow', 8),
(42, 2, 'tvshow', 7),
(43, 2, 'tvshow', 10),
(44, 2, 'tvshow', 13),
(45, 2, 'tvshow', 14),
(46, 2, 'tvshow', 12),
(47, 2, 'tvshow', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvshow`
--
ALTER TABLE `tvshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tvshow`
--
ALTER TABLE `tvshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
