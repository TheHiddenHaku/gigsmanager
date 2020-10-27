# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: gigsmanager
# Generation Time: 2014-01-23 10:47:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table composers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `composers`;

CREATE TABLE `composers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `composers` WRITE;
/*!40000 ALTER TABLE `composers` DISABLE KEYS */;

INSERT INTO `composers` (`id`, `name`, `surname`, `created`, `modified`)
VALUES
	(1,'Johan Sebastian','Bach','2013-10-08 12:55:46','2013-10-08 12:55:48'),
	(2,'Wolfgang Amadeus','Mozart','2013-10-08 16:22:42','2013-10-08 16:22:42'),
	(3,'Ludwig','Van Beethoven','2013-10-08 16:23:07','2013-10-08 16:23:07'),
	(5,'Giuseppe','Verdi','2013-10-08 16:23:30','2013-10-08 16:45:47'),
	(6,'Richard','Wagner','2013-10-09 09:18:54','2013-10-09 09:18:54'),
	(7,'Frederich','Chopin','2013-10-09 11:56:10','2013-10-09 11:56:10'),
	(8,'Alexander','Scriabin','2013-10-09 11:57:16','2013-10-09 11:57:16'),
	(9,'Enrique','Granados','2013-10-09 11:58:28','2013-10-09 11:58:28'),
	(10,'Johan','Staruss Jr.','2013-10-09 11:58:43','2013-10-09 11:58:43'),
	(11,'Franz Josef ','Haydn','2013-10-09 12:02:53','2013-10-09 12:02:53'),
	(12,'Robert','Schubert','2013-10-09 12:03:18','2013-10-09 12:03:18'),
	(13,'Claude','Debussy','2013-10-09 12:12:49','2013-10-09 12:13:52'),
	(14,'Dimitri','Sostakovic','2013-10-09 12:14:20','2013-10-09 12:14:20'),
	(15,'Domenico ','Scarlatti','2013-10-09 12:24:03','2013-10-09 12:24:03'),
	(16,'Franz','Liszt','2013-10-09 12:24:28','2013-10-09 12:25:59'),
	(17,'Sergei','Rachmaninov','2013-10-09 12:25:09','2013-10-09 12:25:09'),
	(18,'Camille','Saint-Seans','2013-10-09 12:25:42','2013-10-09 12:25:42'),
	(19,'Johannes','Brahms','2013-10-09 12:37:36','2013-10-09 12:37:36'),
	(20,'Emanuele Rincon ','d\'Astroga','2013-10-09 12:59:32','2013-10-09 12:59:32'),
	(21,'Robert','Schumann','2013-10-09 13:37:40','2013-10-09 13:37:40'),
	(22,'Antonio','Vivaldi','2013-10-09 13:44:48','2013-10-09 13:44:48'),
	(23,'John','Dowland','2013-10-09 13:53:35','2013-10-09 13:53:35'),
	(24,'Gerolamo','Frescobaldi','2013-10-09 13:53:57','2013-10-09 13:53:57'),
	(25,'Manuel','Ponce','2013-10-09 13:54:11','2013-10-09 13:54:11'),
	(26,'Joaquin ','Turina','2013-10-09 13:54:28','2013-10-09 13:54:28'),
	(27,'Gianpaolo','Bracali','2013-10-09 13:54:42','2013-10-09 13:54:42'),
	(28,'Serghej','Prokofiev','2013-10-09 14:01:44','2013-10-09 14:01:44'),
	(30,'Anton','Webern','2013-10-09 14:15:19','2013-10-09 14:15:19'),
	(31,'Silvano','Bussotti','2013-10-09 14:15:35','2013-10-09 14:15:35'),
	(32,'Charles E.','Ives','2013-10-09 14:24:20','2013-10-09 14:24:20'),
	(33,'Salvatore','Sciarrino ','2013-10-09 14:58:05','2013-10-09 14:58:05'),
	(34,'Luigi ','Nono','2013-10-09 15:03:23','2013-10-09 15:03:23'),
	(35,'Arnold','Schonberg','2013-10-09 15:03:44','2013-10-09 15:03:44'),
	(36,'Karlheinz','Stockhausen','2013-10-09 15:12:30','2013-10-09 15:12:30'),
	(37,'Igor ','Stravinskij','2013-10-09 15:38:42','2013-10-09 15:38:42'),
	(38,'Kazuo ','Fukushima','2013-10-09 15:43:22','2013-10-09 15:43:22'),
	(40,'Bruno ','Maderna','2013-10-09 15:43:42','2013-10-09 15:43:42'),
	(41,'Maurice ','Ravel','2013-10-09 15:44:02','2013-10-09 15:44:02'),
	(42,'Francis ','Poulenc','2013-10-09 15:44:31','2013-10-09 15:44:31'),
	(43,'Franz ','Schubert','2013-10-09 16:02:34','2013-10-09 16:02:34'),
	(44,'Pierre ','Boulez ','2013-10-09 17:19:57','2013-10-09 17:19:57'),
	(45,'Moritz ','Moszkowski','2013-10-09 17:36:13','2013-10-09 17:36:13'),
	(46,'Gustav','Mahler','2013-10-10 05:20:56','2013-10-10 05:20:56'),
	(47,'Giacomo','Manzoni','2013-10-10 05:22:09','2013-10-10 05:22:09'),
	(48,'Piotr Ilic ','Ciaikovskij','2013-10-10 05:52:25','2013-10-10 05:52:25'),
	(49,'Cristobal','Halffter','2013-10-10 05:52:54','2013-10-10 05:52:54'),
	(51,'Georg Friedrich ','Haendel','2013-10-10 06:36:46','2013-10-10 06:36:46'),
	(52,'Anton','Bruckner','2013-10-10 08:19:31','2013-10-10 08:19:31'),
	(53,'Braian ','ferneyough','2013-10-10 08:24:45','2013-10-10 08:24:45'),
	(54,'Carl Maria','Von Weber','2013-10-10 08:44:10','2013-10-10 08:44:10'),
	(55,'Gian Francesco ','Ghedini','2013-10-10 09:07:30','2013-10-10 09:07:30'),
	(56,'Bela ','Bartok','2013-10-10 09:13:30','2013-10-10 09:13:30'),
	(57,'Richard','Strauss','2013-10-10 09:37:39','2013-10-10 09:37:39'),
	(58,'Leos','Janacek','2013-10-10 10:18:23','2013-10-10 10:18:23'),
	(59,'Bedrich','Smetana','2013-10-10 10:18:42','2013-10-10 10:18:42'),
	(60,'Modest','Musorgskji','2013-10-10 10:38:33','2013-10-10 10:38:33'),
	(61,'Witold','Lutoslawski','2013-10-10 10:41:51','2013-10-10 10:41:51'),
	(62,'Alessandro','Scarlatti','2013-10-10 15:37:53','2013-10-10 15:37:53'),
	(63,'Arcangelo','Corelli','2013-10-10 15:38:08','2013-10-10 15:38:08'),
	(64,'Gioachino','Rossini','2013-10-10 16:34:34','2013-10-10 16:34:34'),
	(65,'','Perotinus','2013-10-10 17:30:21','2013-10-10 17:30:21'),
	(66,'Arvo','Part','2013-10-10 17:30:38','2013-10-10 17:30:38'),
	(67,'Guillame ','De Machaut','2013-10-10 17:31:04','2013-10-10 17:31:04'),
	(68,'Pierluigi ','da Palestrina','2013-10-10 17:31:35','2013-10-10 17:31:35'),
	(70,'Compositore','Anonimo','2013-10-10 17:47:32','2013-10-10 17:47:32'),
	(71,'Francesco ','Landini','2013-10-10 17:48:24','2013-10-10 17:48:24'),
	(72,'John','Forest','2013-10-10 17:48:40','2013-10-10 17:48:40'),
	(73,'Hildegard ','von Bingen','2013-10-10 17:49:08','2013-10-10 17:49:08'),
	(74,'Codex ','Reina','2013-10-10 17:49:33','2013-10-10 17:49:33'),
	(75,'Pierre ','Des Molins','2013-10-10 17:49:53','2013-10-10 17:49:53'),
	(76,'Magister','Piero','2013-10-10 17:50:10','2013-10-10 17:50:10'),
	(77,'Johannes Simon','Hasprois','2013-10-10 17:51:52','2013-10-10 17:51:52'),
	(78,'Oswald ','von Wolkenstein','2013-10-10 17:52:26','2013-10-10 17:52:26'),
	(79,'Karol','Szymanowski','2013-10-10 18:33:26','2013-10-10 18:33:26');

/*!40000 ALTER TABLE `composers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gigs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gigs`;

CREATE TABLE `gigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL COMMENT 'data concerto',
  `place` varchar(250) DEFAULT NULL COMMENT 'luogo concerto',
  `organization` varchar(250) DEFAULT NULL COMMENT 'organizzatore',
  `title` varchar(250) DEFAULT NULL COMMENT 'titolo concerto',
  `description` text COMMENT 'descrizione o recensione',
  `rating` int(2) DEFAULT NULL COMMENT 'valutazione',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table gigs_players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gigs_players`;

CREATE TABLE `gigs_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gig_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table playlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `playlists`;

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gig_id` int(11) NOT NULL,
  `composer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
