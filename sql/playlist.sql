-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 avr. 2020 à 11:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `playlist`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`id`, `name`, `year`, `artist_id`) VALUES
(1, 'Lucky Jim', 1993, 6),
(5, 'Fire of love', 1981, 6),
(8, 'The Doors', 1967, 15),
(10, 'The Stooges', 1969, 3),
(13, 'Funhouse', 1970, 3),
(42, 'Brothers In Arms', 1985, 42),
(49, 'Dire Straits', 1978, 42),
(69, 'Doolittle', 1989, 54);

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `name`, `biography`, `image`) VALUES
(1, 'The Stooges', 'Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus.', NULL),
(2, 'The Gun Club', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien.', NULL),
(3, 'The Doors', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', NULL),
(4, 'Pink Floyd', 'Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', NULL),
(5, 'Dire Straits', 'Fusce vulputate sem at sapien. Vivamus leo. Aliquam libero eu enim. Nulla nec felis sed leo placerat imperdiet.', NULL),
(6, 'Pixies', 'Praesent blandit odio eu enim.', NULL),
(7, 'led zep', 'god	\r\n	', NULL),
(9, 'Nirvana', 'so cool	\r\n	', NULL),
(10, 'The black keys', 'très bonaussi', NULL),
(11, 'Max', 'bassiste très doué	\r\n	', '96d334090cc3e5c9b0b3aaaa8727519e.jpg'),
(14, 'sdfsdffsfd', 'fsdsdfs', '14.jpg'),
(16, 'w<cxwcxwc', 'gfdgfdgf', '16.jpg'),
(17, 'gdgdsgds', 'fdsfsd', '17.jpg'),
(18, 'sdfsdf', 'fsdfsfd', NULL),
(19, 'ffqsdfsqd', 'fdsfsfds', '19.jpg'),
(20, 'wxcxc', 'dqssd', NULL),
(21, 'test ', 'gfdgfdgg dfg fd', NULL),
(22, 'qsdqsds', 'qDSQSDQSD', NULL),
(23, 'dsqddqsd', 'qdsqdsqd', NULL),
(24, 'gdfsdsfd', 'sdfsdfsd', NULL),
(25, 'sdfsqdfsfd', 'fsds', NULL),
(26, '<script>alert(\'test\')</script>', 'qsdfsdfqfd', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `song`
--

INSERT INTO `song` (`id`, `title`, `artist_id`, `album_id`) VALUES
(1, 'I Wanna Be Your Dog', 3, 10),
(18, 'She\'s like Heroin to Me', 6, 5),
(23, 'No Fun', 3, 10),
(24, 'hey', 54, 69),
(38, 'Money for Nothing', 42, 42),
(56, 'Break on Through (To the other side)', 15, 8),
(63, 'Gouge Away', 54, 69),
(76, 'Light My Fire', 15, 8),
(98, 'Sex Beat', 6, 5),
(122, 'Sultans of Swing', 42, 49);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
