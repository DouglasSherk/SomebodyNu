-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: somebodynu
-- ------------------------------------------------------
-- Server version	5.1.49-3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'Starcraft'),(2,'Starcraft 2'),(3,'Warcraft 3'),(4,'League of Legends'),(5,'Defense of the Ancients'),(6,'Badminton'),(7,'Volleyball'),(8,'Basketball'),(9,'Skateboarding'),(10,'Petanque'),(11,'Bowling'),(12,'Rock Climbing'),(13,'Bouldering'),(14,'Cycling'),(15,'Mountain Biking'),(16,'Aikido'),(17,'Judo'),(18,'Jujitsu'),(19,'Sambo'),(20,'Wrestling'),(21,'Fencing'),(22,'Kendo'),(23,'Kung Fu'),(24,'Wushu'),(25,'Taichi'),(26,'Boxing'),(27,'Capoeira'),(28,'Karate'),(29,'Kickboxing'),(30,'Muay Thai'),(31,'Taekwondo'),(32,'Wing Chun'),(33,'Yoga'),(34,'Pool/Billiards'),(35,'Dancing'),(36,'Fishing'),(37,'Ultimate Frisbee'),(38,'Soccer'),(39,'Golf'),(40,'Gymnastics'),(41,'Parkour'),(42,'Juggling'),(43,'Handball'),(44,'Hunting'),(45,'Kite Flying'),(46,'Geocaching'),(47,'Kayaking'),(48,'Canoeing'),(49,'Rafting'),(50,'Rowing'),(51,'Dragon Boating'),(52,'Racquetball'),(53,'Table tennis / ping pong'),(54,'Tennis'),(55,'Running'),(56,'Sailing'),(57,'Windsurfing'),(58,'Kiteboarding'),(59,'Skiing (Alpine)'),(60,'Skiing (Cross Country)'),(61,'Luge'),(62,'Target Shooting'),(63,'Hockey'),(64,'Hiking'),(65,'Backpacking (Wilderness)'),(66,'Swimming'),(67,'Scuba Diving'),(68,'Snorkelling'),(69,'Igloo Construction'),(70,'Weightlifting'),(71,'Working Out'),(72,'Poker'),(73,'Card Games'),(74,'Speedcubing'),(75,'Chess'),(76,'Go / Weiqi / Baduk'),(77,'Checkers'),(78,'Othello / Reversi'),(79,'Chinese Chess / Xiangqi'),(80,'Shogi'),(81,'Philosophers\' Football'),(82,'Throwing'),(83,'Jumping'),(84,'Flight Simulators'),(85,'Video Games'),(86,'Counter-Strike'),(87,'Bungee Jumping'),(88,'Quidditch'),(89,'Skating'),(90,'Dinner'),(91,'Dating'),(92,'Coffee'),(93,'Lunch'),(94,'Coding'),(95,'Concert');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analytics`
--

DROP TABLE IF EXISTS `analytics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analytics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `counter` varchar(128) DEFAULT NULL,
  `kingdom` varchar(128) DEFAULT NULL,
  `phylum` varchar(128) DEFAULT NULL,
  `class` varchar(128) DEFAULT NULL,
  `family` varchar(128) DEFAULT NULL,
  `genus` varchar(128) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=378 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analytics`
--

LOCK TABLES `analytics` WRITE;
/*!40000 ALTER TABLE `analytics` DISABLE KEYS */;
INSERT INTO `analytics` VALUES (1,'view','landing','','','','129.97.224.10',1,'2012-03-27 21:27:30'),(2,'view','activity','','','','10',1,'2012-03-27 21:27:37'),(3,'view','location','','','','10',1,'2012-03-27 21:27:40'),(4,'location','43.4659633','-80.5423386','Waterloo','','10',1,'2012-03-27 21:27:41'),(5,'view','activity','','','','16',1,'2012-03-27 21:27:54'),(6,'view','activity','','','','16',1,'2012-03-27 21:27:55'),(7,'view','activity','','','','16',1,'2012-03-27 21:27:57'),(8,'view','match','','','','10',1,'2012-03-27 21:28:09'),(9,'view','match','','','','16',1,'2012-03-27 21:28:36'),(10,'view','activity','','','','16',1,'2012-03-27 21:28:37'),(11,'view','match','','','','10',1,'2012-03-27 21:29:14'),(12,'matches','8','Waterloo','0','','10',1,'2012-03-27 21:29:14'),(13,'view','activity','','','','10',1,'2012-03-27 21:29:15'),(14,'view','unqueue','','','','10',1,'2012-03-27 21:29:18'),(15,'view','match','','','','10',1,'2012-03-27 21:29:19'),(16,'matches','92','Waterloo','2','','10',1,'2012-03-27 21:29:19'),(17,'view','activity','','','','10',1,'2012-03-27 21:29:23'),(18,'view','activity','','','','10',1,'2012-03-27 21:29:25'),(19,'view','unqueue','','','','10',1,'2012-03-27 21:29:28'),(20,'view','match','','','','10',1,'2012-03-27 21:29:29'),(21,'matches','14','Waterloo','1','','10',1,'2012-03-27 21:29:29'),(22,'view','activity','','','','10',1,'2012-03-27 21:29:30'),(23,'view','unqueue','','','','10',1,'2012-03-27 21:29:33'),(24,'view','match','','','','10',1,'2012-03-27 21:29:34'),(25,'matches','43','Waterloo','1','','10',1,'2012-03-27 21:29:34'),(26,'view','activity','','','','10',1,'2012-03-27 21:29:36'),(27,'view','unqueue','','','','10',1,'2012-03-27 21:29:37'),(28,'view','match','','','','10',1,'2012-03-27 21:30:01'),(29,'matches','92','Waterloo','2','','10',1,'2012-03-27 21:30:01'),(30,'view','matchwith','','','','10',1,'2012-03-27 21:30:02'),(31,'partial','16','Waterloo','92','','10',1,'2012-03-27 21:30:04'),(32,'view','activity','','','','10',1,'2012-03-27 21:30:04'),(33,'view','match','','','','16',1,'2012-03-27 21:30:06'),(34,'matches','92','Waterloo','2','','16',1,'2012-03-27 21:30:06'),(35,'view','matchwith','','','','16',1,'2012-03-27 21:30:12'),(36,'partial','10','Waterloo','92','','16',1,'2012-03-27 21:30:12'),(37,'view','activity','','','','16',1,'2012-03-27 21:30:12'),(38,'view','match','','','','16',1,'2012-03-27 21:33:28'),(39,'matches','92','Waterloo','2','','16',1,'2012-03-27 21:33:28'),(40,'view','activity','','','','16',1,'2012-03-27 21:33:35'),(41,'view','match','','','','16',1,'2012-03-27 21:34:10'),(42,'matches','92','Waterloo','2','','16',1,'2012-03-27 21:34:10'),(43,'view','match','','','','16',1,'2012-03-27 21:34:16'),(44,'matches','92','Waterloo','2','','16',1,'2012-03-27 21:34:16'),(45,'view','activity','','','','16',1,'2012-03-27 21:35:05'),(46,'view','landing','','','','129.97.224.188',1,'2012-03-27 22:09:56'),(47,'view','activity','','','','16',1,'2012-03-27 22:10:04'),(48,'view','location','','','','16',1,'2012-03-27 22:10:04'),(49,'location','43.480926','-80.537664','Waterloo','','16',1,'2012-03-27 22:10:05'),(50,'view','landing','','','','129.97.224.10',1,'2012-03-27 22:37:07'),(51,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:55'),(52,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(53,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(54,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(55,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(56,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(57,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(58,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(59,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(60,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:56'),(61,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:57'),(62,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:57'),(63,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:00:58'),(64,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(65,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(66,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(67,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(68,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(69,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(70,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(71,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(72,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(73,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(74,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(75,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:01'),(76,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:02'),(77,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:02'),(78,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(79,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(80,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(81,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(82,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(83,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(84,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(85,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(86,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:03'),(87,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(88,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(89,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(90,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(91,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(92,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(93,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(94,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(95,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(96,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(97,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(98,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(99,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(100,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:06'),(101,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:07'),(102,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:07'),(103,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:07'),(104,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:07'),(105,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(106,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(107,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(108,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(109,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(110,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(111,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(112,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:08'),(113,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:11'),(114,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:11'),(115,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:11'),(116,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:11'),(117,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(118,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(119,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(120,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(121,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(122,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(123,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(124,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(125,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(126,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(127,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(128,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(129,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:12'),(130,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:13'),(131,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:13'),(132,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:13'),(133,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:16'),(134,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:16'),(135,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(136,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(137,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(138,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(139,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(140,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(141,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(142,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(143,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(144,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(145,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(146,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(147,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(148,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(149,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:17'),(150,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:18'),(151,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:18'),(152,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(153,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(154,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(155,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(156,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(157,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:19'),(158,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(159,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(160,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(161,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(162,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(163,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(164,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(165,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(166,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(167,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(168,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(169,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(170,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(171,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(172,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(173,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(174,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(175,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:22'),(176,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:23'),(177,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:23'),(178,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(179,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(180,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(181,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(182,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(183,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(184,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(185,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(186,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(187,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(188,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(189,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(190,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(191,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(192,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(193,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:24'),(194,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(195,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(196,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(197,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(198,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(199,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(200,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(201,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(202,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(203,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:25'),(204,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(205,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(206,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(207,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(208,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(209,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:26'),(210,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(211,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(212,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(213,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(214,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(215,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(216,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(217,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(218,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:29'),(219,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(220,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(221,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(222,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(223,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(224,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(225,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(226,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(227,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:35'),(228,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(229,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(230,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(231,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(232,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(233,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(234,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(235,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(236,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(237,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(238,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(239,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(240,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(241,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:36'),(242,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(243,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(244,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(245,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(246,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(247,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(248,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(249,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:37'),(250,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(251,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(252,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(253,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(254,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(255,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(256,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:38'),(257,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(258,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(259,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(260,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(261,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(262,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(263,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(264,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(265,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(266,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(267,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(268,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(269,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(270,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(271,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(272,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(273,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(274,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(275,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:39'),(276,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(277,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(278,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(279,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(280,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(281,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(282,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(283,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:40'),(284,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(285,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(286,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(287,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(288,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(289,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(290,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(291,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(292,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(293,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(294,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(295,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(296,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(297,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(298,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(299,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(300,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(301,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(302,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:41'),(303,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(304,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(305,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(306,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(307,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(308,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(309,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(310,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(311,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(312,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(313,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(314,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(315,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(316,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:42'),(317,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:43'),(318,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:43'),(319,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:43'),(320,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:43'),(321,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:43'),(322,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(323,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(324,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(325,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(326,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(327,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(328,'view','landing','','','','66.135.40.74',1,'2012-03-28 00:01:46'),(329,'view','landing','','','','76.184.152.139',1,'2012-03-28 01:21:07'),(330,'view','landing','','','','199.21.99.72',1,'2012-03-28 01:40:33'),(331,'view','landing','','','','199.21.99.72',1,'2012-03-28 01:40:35'),(332,'view','landing','','','','180.76.5.195',1,'2012-03-28 02:34:40'),(333,'view','landing','','','','129.97.208.21',1,'2012-03-28 03:53:22'),(334,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:13:09'),(335,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:13:16'),(336,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:13:21'),(337,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:13:22'),(338,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:16'),(339,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:18'),(340,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:19'),(341,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:20'),(342,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:21'),(343,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:23'),(344,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:24'),(345,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:25'),(346,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:26'),(347,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:27'),(348,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:27'),(349,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:28'),(350,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:29'),(351,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:30'),(352,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:31'),(353,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:32'),(354,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:32'),(355,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:36'),(356,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:37'),(357,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:38'),(358,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:39'),(359,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:40'),(360,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:40'),(361,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:41'),(362,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:42'),(363,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:43'),(364,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:44'),(365,'view','landing','','','','103.29.216.153',1,'2012-03-28 07:15:45'),(366,'view','landing','','','','129.97.210.139',1,'2012-03-28 09:09:26'),(367,'view','activity','','','','16',1,'2012-03-28 09:09:34'),(368,'view','location','','','','16',1,'2012-03-28 09:09:35'),(369,'location','43.480926','-80.537664','Waterloo','','16',1,'2012-03-28 09:09:36'),(370,'view','unqueue','','','','16',1,'2012-03-28 09:09:39'),(371,'view','match','','','','16',1,'2012-03-28 09:09:40'),(372,'matches','8','Waterloo','0','','16',1,'2012-03-28 09:09:40'),(373,'view','activity','','','','16',1,'2012-03-28 09:09:41'),(374,'view','unqueue','','','','16',1,'2012-03-28 09:09:42'),(375,'view','match','','','','16',1,'2012-03-28 09:09:44'),(376,'matches','92','Waterloo','2','','16',1,'2012-03-28 09:09:44'),(377,'view','activity','','','','16',1,'2012-03-28 09:09:45');
/*!40000 ALTER TABLE `analytics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partials`
--

DROP TABLE IF EXISTS `partials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `matched_user_id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`,`activity_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partials`
--

LOCK TABLES `partials` WRITE;
/*!40000 ALTER TABLE `partials` DISABLE KEYS */;
/*!40000 ALTER TABLE `partials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queues`
--

DROP TABLE IF EXISTS `queues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`,`activity_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queues`
--

LOCK TABLES `queues` WRITE;
/*!40000 ALTER TABLE `queues` DISABLE KEYS */;
INSERT INTO `queues` VALUES (167,21,14,'Waterloo','2012-01-28 11:25:06'),(108,14,8,'Toronto','2012-01-18 00:27:57'),(199,30,70,'Waterloo','2012-02-18 20:34:47'),(181,25,92,'Waterloo','2012-02-01 22:53:31'),(177,24,8,'San Mateo','2012-01-30 19:54:37'),(238,16,92,'Waterloo','2012-03-28 09:09:44'),(182,26,43,'San Francisco','2012-02-02 00:54:49'),(185,27,43,'Waterloo','2012-02-05 07:02:17'),(187,28,14,'','2012-02-08 15:11:53'),(197,29,70,'Guelph','2012-02-10 03:54:53'),(217,31,8,'Vancouver','2012-02-19 22:11:02'),(232,10,92,'Waterloo','2012-03-27 21:30:01');
/*!40000 ALTER TABLE `queues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'544387632','De Long Fu','Waterloo','delongfu@gmail.com',43.465789,-80.542587),(10,'512769141','Doug Sherk','Waterloo','doug@sherk.me',43.4659633,-80.5423386),(11,'712859352','Eugene Baumstein','Berkeley','eugene.baumstein@gmail.com',37.875134,-122.2643076),(12,'509435923','James Anselm','Waterloo','jamesanselm@gmail.com',NULL,NULL),(13,'517293303','Michaela Angemeer','Waterloo','mushroomness@hotmail.com',NULL,NULL),(14,'633370256','Ibrahim Muhammad','Toronto','ibrahim.mohammad@gmail.com',NULL,NULL),(15,'509849235','Yujeong Kim','Waterloo','yujeongkim@hotmail.com',NULL,NULL),(16,'1658071309','Jonathan Koff','Waterloo','jonathankoff@gmail.com',43.480926,-80.537664),(17,'516281914','Umar Aftab','Waterloo','u3aftab@gmail.com',43.4772112,-80.5489283),(18,'13609879','Ahmed Bebo','Montreal','ahmed.eldessouki@gmail.com',45.508867,-73.554242),(19,'503959853','Yat Choi','Toronto','yat_choi@hotmail.com',NULL,NULL),(20,'517128136','Michael Murray','Guelph','outersource@gmail.com',43.539102,-80.247622),(21,'100001183382270','Ramit Pal Singh','Waterloo','rockysinghsh4@gmail.com',43.4705902,-80.5328987),(22,'507223690','Omer Mullick','Waterloo','de_demon111@hotmail.com',NULL,NULL),(23,'100003098484654','Kevin DH Kim','Waterloo','90kevinkim90@gmail.com',NULL,NULL),(24,'684476483','Raullen Chai','San Mateo','raullenchai@gmail.com',37.5463878,-122.2838459),(25,'100002853356133','Erica Xu','Waterloo','xuziyin@yahoo.com.cn',NULL,NULL),(26,'122608475','Apoorva Mehta','San Francisco','apoorva.mehta@gmail.com',NULL,NULL),(27,'715076506','Khallil Mangalji','Waterloo','kmx411@gmail.com',NULL,NULL),(28,'671857749','Wendy Dischke Stirbet','','wstirbet@handfort.com',NULL,NULL),(29,'81002443','William Hancharek','Guelph','whanchar@uwaterloo.ca',43.5397937,-80.2761818),(30,'516852457','Yahya MG','Waterloo','ymzkala@gmail.com',NULL,NULL),(31,'100002705387730','Eli Phant','Vancouver','elizabethnenniger@gmail.com',49.2888227,-123.1280302),(32,'728963106','David Villarreal','Waterloo','dav.villa@gmail.com',NULL,NULL),(33,'1674960024','Shiva Bhardwaj','Waterloo','shiva_bhardwaj4@hotmail.com',NULL,NULL),(34,'542085305','Xingzhe Lu','Toronto','travislu@hotmail.com',NULL,NULL),(35,'511643053','Stephanie Niro','Toronto','ravebaby16@hotmail.com',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-28  9:23:34