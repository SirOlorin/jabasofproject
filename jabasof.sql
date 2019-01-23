-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 23 jan. 2019 à 10:39
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alarmclock`
--

INSERT INTO `alarmclock` (`id`, `name`, `frequency`, `val1`, `val2`, `time`, `room_id`) VALUES
(1, 'clock1', 'once', '1111-11-11', NULL, '11:11:00', 1),
(2, 'clock2', 'once', '2018-12-28', NULL, '00:00:00', 1),
(3, 'clock3', 'weekly', NULL, 'mardi, mercredi, jeudi', '09:09:00', 2),
(4, 'Réveil perso', 'weekly', NULL, 'lundi, mardi', '08:00:00', 2),
(5, 'Réveil 5', 'weekly', NULL, 'mercredi', '09:00:00', 2),
(6, 'reveilroom3', 'weekly', NULL, 'lundi', '11:11:00', 3),
(7, 'travail', 'weekly', NULL, 'lundi, mercredi', '08:01:00', 8);

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
  `last_topic` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `last_topic`) VALUES
(10, 'Support', 'Posez ici vos question techniques !', 'None'),
(11, 'Cadre LÃ©gale', 'Discussions juridiques', 'Vide');

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
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL,
  `categorie` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`name`, `description`, `id`, `categorie`) VALUES
('Montre connectée', '', 0, 'objets'),
('Baguette magique', '', 1, 'objets'),
('Baguette magique', '', 1, 'objets'),
('Verrou digital', '', 2, 'fonctions'),
('Détecteur infrarouge', '', 3, 'capteurs'),
('Caméra infrarouge', '', 4, 'camera'),
('Support 24/7', '', 5, 'fonctions'),
('Capteur d\'ondes', ' ', 90, 'capteurs'),
('test', 'test', 45, 'objets');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(8, 4, 6),
(16, 8, 1),
(17, 9, 7),
(18, 10, 8);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(8, 'New', '1'),
(9, 'Maison d\'Adrien', '7'),
(10, 'maison de vacance', '8');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pageaccueil`
--

INSERT INTO `pageaccueil` (`id`, `titre`, `content`, `photo`) VALUES
(1, 'Nous facilitons et sécurisons la vie de nos utilisateurs', 'Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :\r\n- Le confort\r\n- La sécurité\r\n- La matinée\r\nÀ travers différents systèmes interconnectés nous vous assurons un confort optimal pour un effort moindre. La température, la luminosité, l\'ouverture des stores pourrons enfin être réglables d\'un simple geste grâce à notre application.\r\nGrâce à différents systèmes de caméra connectées à notre centre, vous n\'aurez plus de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l\'esprit tranquille.', 'http://img.izismile.com/img/img10/20171214/640/a_perfect_house_for_just_a_275_million_640_01.jpg'),
(15, 'Votre confort, notre objectif !', ' À travers différents système interconnecter nous vous assurons un confort optimal pour un effort moindre.  La température, la luminosité, l\'ouverture des stores pourrons enfin être réglable d\'un simple geste grâce à notre application.', '\r\nhttps://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg'),
(16, 'Faciliter les réveils difficiles est un de nos atouts', 'Grâce à réveil adapté à vos besoin le réveil ne sera plus une tâche difficile. Lumière progressive, musique apaisante, information de l\'heure de départs en direct... Tout y est !', 'http://absfreepic.com/absolutely_free_photos/small_photos/house-near-seaside-at-romantic-sunset-4500x2998_50433.jpg'),
(14, 'Votre sécurité nous importe aussi', 'Grâce à différents systèmes de caméra connecter à notre centre vous n\'aurez plus de soucis de cambriolage. Mais aussi nous tenons à vous protéger de certain risque d\'incendie grâce à notre détecteur de fumée connecté', 'https://www.allcooper.com/portals/0/Home-Security-1.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pagefaq`
--

INSERT INTO `pagefaq` (`id`, `question`, `content`) VALUES
(1, 'Qui sommes-nous ?', 'Des étudiants de l\'Isep'),
(2, 'Pourquoi devrions-nous vous faire confiance ?', 'Nous sommes spécialisés dans la domotique et dans le génie logiciel, notre formation nous offre une capacité de conception que vous ne trouverez nul part ailleurs.'),
(8, 'Avez-vous un superviseur ?', 'Nous sommes supervisés par le M. Angarita.'),
(9, 'Comment s\'appelle la solution ?', 'Jabasof.');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'Bonjour', '2019-01-22 22:41:54', 18, 1),
(2, 'Au secours', '2019-01-22 22:42:32', 19, 1),
(3, 'Mon voisin est trop bruyant, que puis-je faire ?', '2019-01-23 09:28:06', 20, 1),
(6, 'bonjour j\'ai un problÃ¨me', '2019-01-23 10:30:35', 21, 8),
(5, 'Merci encore !', '2019-01-23 09:33:22', 15, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
(8, 'livingroom', 'on', 'on', 20, 0),
(9, 'bathroom2', 'on', 'on', 22, 0),
(10, 'Living Room', 'off', 'off', 30, 4),
(11, 'Main Room', 'on', 'on', 20, 4),
(12, 'Guest Room', 'off', 'off', 20, 4),
(13, 'Kitchen', 'off', 'off', 20, 4),
(15, 'Cuisine', 'off', 'off', 25, 4),
(17, 'Chambre de JB', 'off', 'on', 5, 4),
(19, 'Chambre', 'off', 'off', 25, 9),
(20, 'Cuisine', 'off', 'off', 25, 9),
(21, 'Cuisine', 'off', 'off', 25, 10),
(22, 'Pièce d\'Olivier', 'off', 'off', 25, 4);

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
('DUVAL', 'Bernard', 'bduval@jabasof.fr');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`, `last_post`) VALUES
(18, 'C\'est reparti !', '2019-01-22 19:07:52', 4, 15, 'Comme en 40 !'),
(17, 'Voyons si Ã§a marche', '2019-01-22 13:35:00', 10, 1, 'Comment Ã§a marche ?'),
(15, 'Merci Jabasof !', '2019-01-22 12:28:53', 4, 18, 'On vous aime !'),
(16, 'Metro', '2019-01-22 12:46:52', 5, 18, 'J\'aime pas la ligne 13, et vous ?'),
(19, 'Je n\'arrive pas Ã  crÃ©er de catÃ©gorie', '2019-01-22 22:42:32', 10, 1, 'Au secours'),
(20, 'J\'ai un problÃ¨me avec mon voisin', '2019-01-23 09:28:06', 11, 1, 'Mon voisin est trop bruyant, que puis-je faire ?'),
(21, 'Je n\'arrive pas Ã  crÃ©er de catÃ©gorie', '2019-01-23 10:30:35', 10, 8, 'bonjour j\'ai un problÃ¨me');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_firstname`, `user_pass`, `user_email`, `user_date`) VALUES
(1, 'admin', 'CHABCHOUB', 'Yousra', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', '2019-01-17 19:11:12'),
(7, 'adrien', 'Doste', 'Arthur', '4d10829f147c13c63c4579f5297a87efba1143a3', 'adrien@jabasof.fr', '2019-01-23 09:20:31'),
(8, 'olivier', 'DEFAYE', 'olivier', '543b24ecc36f9811f3c6f0ee0e6df6dbe29891bb', 'o', '2019-01-23 10:26:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
