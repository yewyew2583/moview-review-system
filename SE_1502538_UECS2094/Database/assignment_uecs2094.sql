-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2018 at 08:13 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_uecs2094`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_pk` bigint(20) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`genre_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_pk`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure'),
(4, 'Crime'),
(5, 'Drama'),
(6, 'Fantasy'),
(7, 'Historical'),
(8, 'Horror'),
(9, 'Mystery'),
(10, 'Political'),
(11, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `genre_assign`
--

DROP TABLE IF EXISTS `genre_assign`;
CREATE TABLE IF NOT EXISTS `genre_assign` (
  `genre_assign_pk` bigint(20) NOT NULL AUTO_INCREMENT,
  `movie_fk` bigint(20) NOT NULL,
  `genre_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`genre_assign_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_assign`
--

INSERT INTO `genre_assign` (`genre_assign_pk`, `movie_fk`, `genre_fk`) VALUES
(62, 5, 6),
(61, 5, 10),
(60, 5, 9),
(89, 14, 6),
(88, 14, 5),
(87, 14, 4),
(59, 4, 5),
(58, 4, 10),
(57, 3, 8),
(56, 3, 6),
(86, 13, 10),
(85, 13, 9),
(84, 13, 8),
(83, 12, 6),
(82, 12, 5),
(81, 12, 4),
(80, 11, 3),
(79, 11, 2),
(78, 10, 3),
(77, 10, 2),
(76, 10, 1),
(75, 9, 10),
(74, 9, 9),
(73, 9, 8),
(72, 8, 7),
(71, 8, 6),
(70, 8, 5),
(69, 8, 4),
(68, 7, 3),
(67, 7, 2),
(66, 7, 1),
(65, 6, 8),
(64, 6, 7),
(55, 2, 5),
(54, 2, 2),
(2, 2, 4),
(109, 1, 11),
(63, 6, 6),
(108, 1, 7),
(107, 1, 3),
(90, 15, 6),
(91, 15, 7),
(92, 15, 2),
(93, 16, 2),
(94, 16, 7),
(95, 16, 11),
(96, 17, 11),
(97, 18, 2),
(98, 19, 4),
(99, 18, 4),
(100, 19, 8),
(101, 20, 10),
(102, 20, 9),
(103, 69, 1),
(104, 69, 2),
(105, 69, 3),
(106, 69, 10),
(110, 70, 1),
(111, 70, 2),
(112, 70, 3),
(113, 70, 10);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_pk` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `member_type` varchar(20) NOT NULL DEFAULT 'ADMIN',
  PRIMARY KEY (`member_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_pk`, `username`, `password`, `fullname`, `phoneno`, `member_type`) VALUES
(1, 'admin', 'admin', 'My Name Admin', '0123456789', 'ADMIN'),
(25, 'qweqweqw', 'qwe', 'qwe', '0137182974', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `movie_pk` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `year` int(20) NOT NULL,
  `rating` int(5) DEFAULT '5',
  `synopsis` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`movie_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_pk`, `title`, `year`, `rating`, `synopsis`, `image`) VALUES
(5, 'Bright', 2016, 3, 'Set in a world where fantasy creatures live side by side with humans. A human cop is forced to work with an Orc to find a weapon everyone is prepared to kill for.', 'bright.png'),
(4, 'Logan', 2017, 4, 'In the near future, a weary Logan cares for an ailing Professor X, somewhere on the Mexican border. However, Logan\'s attempts to hide from the world, and his legacy, are upended when a young mutant arrives, pursued by dark forces.', 'logan.png'),
(3, 'Guardians of the Galaxy Vol. 2', 2017, 4, 'The Guardians must fight to keep their newfound family together as they unravel the mystery of Peter Quill\'s true parentage.', 'guardian.png'),
(2, 'Wonder Woman', 2017, 4, 'When a pilot crashes and tells of conflict in the outside world, Diana, an Amazonian warrior in training, leaves home to fight a war, discovering her full powers and true destiny.', 'wonderwomen.png'),
(1, 'Thor: Ragnarok', 2017, 5, 'Thor is imprisoned on the planet Sakaar, and must race against time to return to Asgard and stop Ragnarök, the destruction of his world, which is at the hands of the powerful and ruthless villain Hela.', 'thor.png'),
(6, 'Pitch Perfect 3', 2016, 4, 'Following their win at the world championship, the now separated Bellas reunite for one last singing competition at an overseas USO tour, but face a group who uses both instruments and voices.', 'pp.png'),
(7, 'All the Money in the World', 2015, 5, 'The story of the kidnapping of 16-year-old John Paul Getty III and the desperate attempt by his devoted mother to convince his billionaire grandfather Jean Paul Getty to pay the ransom.', 'money.png'),
(8, ' Star Wars: The Last Jedi', 2015, 5, 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.', 'starwar.png'),
(9, 'Ferdinand', 2014, 5, 'After Ferdinand, a bull with a big heart, is mistaken for a dangerous beast, he is captured and torn from his home. Determined to return to his family, he rallies a misfit team on the ultimate adventure.', 'ferdi.png'),
(10, 'Bullet Head', 2014, 5, 'Three career criminals find themselves trapped in a warehouse with the law closing in and an even worse threat waiting inside - a nigh unstoppable killer dog.', 'bullet.png'),
(11, 'Jumanji: Welcome to the Jungle', 2017, 5, 'Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.', 'juman.png'),
(12, ' Justice League', 2008, 4, 'Fueled by his restored faith in humanity and inspired by Superman\'s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.', 'justice.png'),
(13, 'The Man Who Invented Christmas', 2010, 5, 'The journey that led to Charles Dickens\' creation of \"A Christmas Carol,\" a timeless tale that would redefine Christmas.', 'christmasman.png'),
(14, 'November Criminals', 2013, 3, 'After his friend is murdered, a Washington, D.C. teenager undertakes his own investigation of the crime.', 'november.png'),
(15, ' Paddington 2', 2018, 5, 'Paddington, now happily settled with the Brown family and a popular member of the local community, picks up a series of odd jobs to buy the perfect present for his Aunt Lucy\'s 100th birthday, only for the gift to be stolen.', 'paddington.png'),
(16, 'Jigsaw', 2011, 5, 'Bodies are turning up around the city, each having met a uniquely gruesome demise. As the investigation proceeds, evidence points to one suspect: John Kramer, the man known as Jigsaw, who has been dead for over 10 years.', 'jigsaw.png'),
(17, ' Geostorm', 2015, 5, 'When the network of satellites designed to control the global climate starts to attack Earth, it\'s a race against the clock for its creator to uncover the real threat before a worldwide Geostorm wipes out everything and everyone.', 'geostorm.png'),
(18, 'Happy Death Day', 2005, 5, 'A college student must relive the day of her murder over and over again, in a loop that will end only when she discovers her killer\'s identity.', 'deathday.png'),
(19, 'The Snowman', 2006, 5, 'Detective Harry Hole investigates the disappearance of a woman whose scarf is found wrapped around an ominous-looking snowman.', 'snowman.png'),
(20, 'Blade Runner 2049', 2016, 5, 'A young blade runner\'s discovery of a long-buried secret leads him to track down former blade runner Rick Deckard, who\'s been missing for thirty years.', 'bladerunner.png'),
(70, 'Kingsman: The Golden Circle', 2015, 5, 'When their headquarters are destroyed and the world is held hostage, the Kingsman\'s journey leads them to the discovery of an allied spy organization in the US. These two elite secret organizations must band together to defeat a common enemy.', 'kingsman.png.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
