-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 jan. 2019 à 17:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jabasof`
--

-- --------------------------------------------------------

--
-- Structure de la table `alarmclock`
--

DROP TABLE IF EXISTS `alarmclock`;
CREATE TABLE IF NOT EXISTS `alarmclock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `val1` date DEFAULT NULL,
  `val2` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alarmclock`
--

INSERT INTO `alarmclock` (`id`, `name`, `frequency`, `val1`, `val2`, `time`) VALUES
(1, 'clock1', 'once', '1111-11-11', NULL, '11:11:00'),
(2, 'clock2', 'once', '2018-12-28', NULL, '00:00:00'),
(3, 'clock3', 'weekly', NULL, 'mardi, mercredi, jeudi', '09:09:00'),
(4, 'jackie', 'weekly', NULL, 'lundi, mardi', '08:00:00'),
(5, 'michel', 'weekly', NULL, 'mercredi', '09:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `last_topic` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `last_topic`) VALUES
(4, 'Retours utilisateurs', 'Exprimez ici votre satisfaction/mecontentement !', 'Merci Jabasof !'),
(10, 'Support', 'Posez ici vos question techniques !', 'None');

-- --------------------------------------------------------

--
-- Structure de la table `pageaccueil`
--

DROP TABLE IF EXISTS `pageaccueil`;
CREATE TABLE IF NOT EXISTS `pageaccueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `content` text NOT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pageaccueil`
--

INSERT INTO `pageaccueil` (`id`, `titre`, `content`, `photo`) VALUES
(1, 'Nous facilitons et sécurisons la vie de nos utilisateurs 1', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 1', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(2, 'Nous facilitons et sécurisons la vie de nos utilisateurs 2', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 2', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(7, 'Article Premier', 'Tout utilisateur de ce site devra utiliser un Asus Zenbook PRO 501VW sans quoi il se verra mourrir le soir-même. - Jean-Baptiste de Villermont', 'https://www.asus.com/fr/Commercial-Laptops/ASUS-ZenBook-Pro-UX501VW/websites/global/products/cp7UN9BtMU7UNPWc/img/00/fg00.png'),
(3, 'Nous facilitons et sécurisons la vie de nos utilisateurs 3', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 3', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(9, 'test', 'bonjour', 'rien'),
(12, 'wala', 'merci', 'elol');

-- --------------------------------------------------------

--
-- Structure de la table `pagefaq`
--

DROP TABLE IF EXISTS `pagefaq`;
CREATE TABLE IF NOT EXISTS `pagefaq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pagefaq`
--

INSERT INTO `pagefaq` (`id`, `question`, `content`) VALUES
(1, 'Qui sommes-nous ?', 'Des étudiants de l\'Isep'),
(2, 'Etes-vous payés ?', '1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 2 1 2 3 4 5 6 7 8 9 3 1 2 3 4 5 6 7 8 9 4 1 2 3 4 5 6 7 8 9 5 1 23 4 5 6 7 8 9 6 1 2 3 4 56 7 8 9 7 1 2 3 4 5 67 8 9 8 1 2 3 4 5 6 7 8 9 9 1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 2 1 2 3 4 '),
(3, 'Qu\'avez-vous à faire à part un site ?', 'Un jeu de DomiNations'),
(4, 'Bonjour hello hello hello hello hello hello hello hello hello', 'salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam salam ');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(255) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(255) NOT NULL,
  `post_by` int(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(46, ':D', '2019-01-22 13:22:52', 4, 1),
(44, 'J\'aime pas la ligne 13, et vous ?', '2019-01-22 12:46:52', 16, 18),
(47, 'Comment Ã§a marche ?', '2019-01-22 13:35:00', 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `movedetect` varchar(255) NOT NULL,
  `light` varchar(255) NOT NULL,
  `temperature` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `movedetect`, `light`, `temperature`) VALUES
(1, 'bathroom', 'off', 'off', 45),
(2, 'bedroom', 'off', 'on', 2),
(3, 'bedroom2', 'on', 'off', 3),
(4, 'bedroom3', 'on', 'on', 22),
(5, 'bathroom1', 'on', 'on', 22),
(6, 'hallway', 'on', 'on', 22),
(7, 'kitchen', 'off', 'on', 28),
(8, 'livingroom', 'on', 'on', 22),
(9, 'bathroom2', 'on', 'on', 22);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(255) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(255) NOT NULL,
  `topic_by` int(255) NOT NULL,
  `last_post` varchar(255) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_by` (`topic_by`),
  KEY `topic_cat` (`topic_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`, `last_post`) VALUES
(17, 'Voyons si Ã§a marche', '2019-01-22 13:35:00', 10, 1, 'Comment Ã§a marche ?'),
(15, 'Merci Jabasof !', '2019-01-22 12:28:53', 4, 18, 'On vous aime !'),
(16, 'Metro', '2019-01-22 12:46:52', 5, 18, 'J\'aime pas la ligne 13, et vous ?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`),
  UNIQUE KEY `user_email_unique` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`) VALUES
(15, 'TestBoi', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'testBoi@gmail.com', '2019-01-16 11:10:17'),
(9, 'UserTest', 'test', 'helloworld@gmail.com', '2018-12-09 22:28:07'),
(7, 'Olorin', 'a', 'ectorgomez27@aol.com', '2018-12-09 21:56:44'),
(16, 'anothertest', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'anothertest@gmail.com', '2019-01-20 16:24:00'),
(17, 'Olorinn', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'a@a.com', '2019-01-20 16:35:29'),
(1, 'Admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'admin@gmail.com', '2019-01-22 12:17:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
