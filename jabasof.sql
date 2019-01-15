-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 jan. 2019 à 16:22
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
