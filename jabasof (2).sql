-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 jan. 2019 à 14:50
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
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alarmclock`
--

INSERT INTO `alarmclock` (`id`, `name`, `frequency`, `val1`, `val2`, `time`, `room_id`) VALUES
(1, 'clock1', 'once', '1111-11-11', NULL, '11:11:00', 1),
(2, 'clock2', 'once', '2018-12-28', NULL, '00:00:00', 1),
(3, 'clock3', 'weekly', NULL, 'mardi, mercredi, jeudi', '09:09:00', 2),
(4, 'jackie', 'weekly', NULL, 'lundi, mardi', '08:00:00', 2),
(5, 'michel', 'weekly', NULL, 'mercredi', '09:00:00', 2),
(6, 'reveilroom3', 'weekly', NULL, 'lundi', '11:11:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cameras`
--

DROP TABLE IF EXISTS `cameras`;
CREATE TABLE IF NOT EXISTS `cameras` (
  `camera_id` int(11) NOT NULL AUTO_INCREMENT,
  `camera_url` text NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`camera_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cameras`
--

INSERT INTO `cameras` (`camera_id`, `camera_url`, `room_id`) VALUES
(1, 'https://ak5.picdn.net/shutterstock/videos/4768655/thumb/5.jpg', 3),
(2, 'https://ak4.picdn.net/shutterstock/videos/772624/thumb/7.jpg', 8);

-- --------------------------------------------------------

--
-- Structure de la table `captors`
--

DROP TABLE IF EXISTS `captors`;
CREATE TABLE IF NOT EXISTS `captors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `id_room` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(32) NOT NULL,
  `item_tag` varchar(32) NOT NULL,
  `item_description` text NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Support', 'Posez vos question ici !'),
(5, 'transport', 'aaa'),
(4, 'Test', 'Ceci est un exercice.'),
(10, 'CatÃ©gorie', 'Description');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `mail`) VALUES
('PUTMAN', 'Olivia', 'o.putman@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `fct_id` int(11) NOT NULL,
  `fct_name` varchar(32) NOT NULL,
  `fct_description` text NOT NULL,
  `fct_categorie` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `houselinks`
--

DROP TABLE IF EXISTS `houselinks`;
CREATE TABLE IF NOT EXISTS `houselinks` (
  `houselink_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`houselink_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `houselinks`
--

INSERT INTO `houselinks` (`houselink_id`, `house_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 4, 1),
(4, 6, 1),
(5, 4, 2),
(15, 4, 3),
(7, 4, 5),
(8, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_name` varchar(32) NOT NULL,
  `admin_id` varchar(32) NOT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `houses`
--

INSERT INTO `houses` (`house_id`, `house_name`, `admin_id`) VALUES
(1, 'Maison 1', ''),
(2, 'Maison 2', ''),
(3, 'la casa', ''),
(4, 'Rock House', '1'),
(5, 'la casa 2', ''),
(6, 'Main House', 'admin'),
(7, 'Map Demo House', '1'),
(8, 'Allez', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pageaccueil`
--

INSERT INTO `pageaccueil` (`id`, `titre`, `content`, `photo`) VALUES
(1, 'Nous facilitons et sécurisons la vie de nos utilisateurs 1', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 1', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(2, 'Nous facilitons et sécurisons la vie de nos utilisateurs 2', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 2', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(7, 'Article Premier', 'Tout utilisateur de ce site devra utiliser un Asus Zenbook PRO 501VW sans quoi il se verra mourrir le soir-même. - Jean-Baptiste de Villermont', 'https://www.asus.com/fr/Commercial-Laptops/ASUS-ZenBook-Pro-UX501VW/websites/global/products/cp7UN9BtMU7UNPWc/img/00/fg00.png'),
(3, 'Nous facilitons et sécurisons la vie de nos utilisateurs 3', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n                <br>- Le confort\r\n                <br>- La sécurité\r\n                <br>- La matinée\r\n                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal\r\n                pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons\r\n                enfin être réglables d\'un simple geste grâce à notre application.\r\n                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus\r\n                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit\r\n                tranquille. 3', 'https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(9, 'test', 'bonjour', 'rien');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pagefaq`
--

INSERT INTO `pagefaq` (`id`, `question`, `content`) VALUES
(1, 'Qui sommes-nous ?', 'Des étudiants de l\'Isep'),
(2, 'Etes-vous payés ?', '1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 2 1 2 3 4 5 6 7 8 9 3 1 2 3 4 5 6 7 8 9 4 1 2 3 4 5 6 7 8 9 5 1 23 4 5 6 7 8 9 6 1 2 3 4 56 7 8 9 7 1 2 3 4 5 67 8 9 8 1 2 3 4 5 6 7 8 9 9 1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 1 1 2 3 4 5 6 7 8 9 2 1 2 3 4 '),
(3, 'Qu\'avez-vous à faire à part un site ?', 'Un jeu de DomiNations'),
(4, 'modification speicale', 'vraiment speciale');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `movedetect` varchar(255) NOT NULL,
  `light` varchar(255) NOT NULL,
  `temperature` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `movedetect`, `light`, `temperature`, `house_id`) VALUES
(1, 'bathroom', 'off', 'off', 45, 0),
(2, 'bedroom', 'off', 'on', 2, 0),
(3, 'bedroom2', 'on', 'off', 3, 0),
(4, 'bedroom3', 'on', 'on', 22, 0),
(5, 'bathroom1', 'on', 'on', 22, 0),
(6, 'hallway', 'on', 'on', 22, 0),
(7, 'kitchen', 'off', 'on', 28, 0),
(8, 'livingroom', 'on', 'on', 22, 0),
(9, 'bathroom2', 'on', 'on', 22, 0),
(10, 'Living Room', 'on', 'off', 44, 4),
(11, 'Main Room', 'off', 'off', 20, 4),
(12, 'Guest Room', 'off', 'off', 20, 4),
(13, 'Kitchen', 'off', 'off', 20, 4),
(15, 'Cuisine', 'off', 'off', 25, 4),
(17, 'Chambre de JB', 'off', 'on', 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `technique`
--

DROP TABLE IF EXISTS `technique`;
CREATE TABLE IF NOT EXISTS `technique` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `technique`
--

INSERT INTO `technique` (`nom`, `prenom`, `mail`) VALUES
('DUVAL', 'Bernard', 'b.duval@gmail.com'),
('qsdrg', 'qdsfg', 'sdg@sqdg'),
('sdg', 'qsedg', 'qsdfg@qsdg'),
('', '', ''),
('qsdf', 'qsdf', 'qsdf@fqsdf');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_by` (`user_id`),
  KEY `topic_cat` (`topic_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `user_id`) VALUES
(1, 'Réveil', '0009-12-18 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_lastname` varchar(32) DEFAULT NULL,
  `user_firstname` varchar(32) DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_firstname`, `user_pass`, `user_email`, `user_date`) VALUES
(2, 'alain', 'NGUYEN', 'Alain', '8450103c06dbd58add9d047d761684096ac560ca', 'alain@mail.com', '2019-01-17 19:42:25'),
(1, 'admin', 'CHABCHOUB', 'Yousra', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', '2019-01-17 19:11:12'),
(3, 'momo', NULL, NULL, '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', 'momo@moom.fr', '2019-01-19 20:25:02'),
(4, 'test1', 'TEST1', 'Test1', 'lol', 'test1@test.com', '2019-01-20 15:43:16'),
(5, 'test2', 'TEST2', 'Test2', 'lol', 'test2@test.com', '2019-01-20 15:43:16'),
(6, 'test3', 'TEST3', 'Test3', 'lol', 'test3@test.com', '2019-01-20 15:43:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
