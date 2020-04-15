# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: robin_collection_shinkansen
# Generation Time: 2020-04-13 20:16:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table shinkansens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shinkansens`;

CREATE TABLE `shinkansens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(20) NOT NULL DEFAULT '',
  `topSpeedMph` smallint(4) unsigned NOT NULL,
  `topSpeedKmh` smallint(4) unsigned NOT NULL,
  `introducedYr` year(4) NOT NULL,
  `withdrawn` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `withdrawnYr` year(4) DEFAULT NULL,
  `imgUrl` varchar(500) NOT NULL DEFAULT '',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `shinkansens` WRITE;
/*!40000 ALTER TABLE `shinkansens` DISABLE KEYS */;

INSERT INTO `shinkansens` (`id`, `series`, `topSpeedMph`, `topSpeedKmh`, `introducedYr`, `withdrawn`, `withdrawnYr`, `imgUrl`, `deleted`)
VALUES
	(1,'0',135,220,'1964',1,'2008','images/japan-974730_1920.jpg',0),
	(2,'500',185,300,'1997',0,NULL,'images/bullet-train-66091_1280.jpg',0),
	(3,'N700',185,300,'2007',0,NULL,'images/bullet-train-1918480_1280.jpg',0);

/*!40000 ALTER TABLE `shinkansens` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
