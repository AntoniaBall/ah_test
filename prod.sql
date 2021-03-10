-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: api
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'centre d\'equitation proche du logement','Equitation'),(2,'centre d\'equitation proche du logement','natation'),(3,'Lorem ipsum dolor sit amet','0 Activity'),(4,'Lorem ipsum dolor sit amet','1 Activity'),(5,'Lorem ipsum dolor sit amet','2 Activity'),(6,'Lorem ipsum dolor sit amet','3 Activity'),(7,'Lorem ipsum dolor sit amet','4 Activity'),(8,'Lorem ipsum dolor sit amet','5 Activity'),(9,'Lorem ipsum dolor sit amet','6 Activity'),(10,'Lorem ipsum dolor sit amet','7 Activity'),(11,'Lorem ipsum dolor sit amet','8 Activity'),(12,'Lorem ipsum dolor sit amet','9 Activity');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activities_property`
--

DROP TABLE IF EXISTS `activities_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities_property` (
  `activities_id` int NOT NULL,
  `property_id` int NOT NULL,
  PRIMARY KEY (`activities_id`,`property_id`),
  KEY `IDX_2EF0DB912A4DB562` (`activities_id`),
  KEY `IDX_2EF0DB91549213EC` (`property_id`),
  CONSTRAINT `FK_2EF0DB912A4DB562` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2EF0DB91549213EC` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities_property`
--

LOCK TABLES `activities_property` WRITE;
/*!40000 ALTER TABLE `activities_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` int NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,577,'Koelpin Mountains',49410,'New Sigridland','North Dakota','Iceland'),(2,678,'Carter Trail',23546,'Elodyview','Colorado','Marshall Islands'),(3,616,'Goyette Pass',97615,'East Russellburgh','New York','Sri Lanka'),(4,77,'Isabelle Lights',70836,'Schneidermouth','Delaware','Finland'),(5,570,'Keeling Islands',77402,'Boyleshire','Pennsylvania','Bangladesh'),(6,592,'Claudine Plaza',80173,'Lake Eileenfurt','Missouri','Romania'),(7,778,'Feil Common',45297,'Corrinefort','Delaware','Turks and Caicos Islands'),(8,667,'Wyman Loaf',61704,'Brandybury','Kentucky','Chile'),(9,138,'Rita Run',33786,'North Connerside','Utah','Sudan'),(10,881,'Brent Prairie',32736,'West Brandon','Delaware','Morocco'),(11,707,'Hermann Park',45904,'Kathrynville','North Dakota','India'),(12,420,'Taryn Fields',7801,'Kuphalshire','Wisconsin','Lebanon'),(13,588,'Sam Key',35146,'Hickleshire','Maryland','India'),(14,364,'Schiller Lights',12053,'Rolfsonberg','Hawaii','Bouvet Island (Bouvetoya)'),(15,793,'Brendon Curve',48423,'New Lexus','Arizona','Rwanda'),(16,260,'D\'Amore Bypass',17185,'West Rebekaburgh','Florida','Belize'),(17,274,'Schmeler Plains',92263,'West Gerryshire','Wisconsin','Moldova'),(18,360,'Savanah Circles',86967,'East Douglasburgh','Rhode Island','Martinique'),(19,515,'Colin Square',9305,'Lake Elinoreborough','Mississippi','Cocos (Keeling) Islands'),(20,441,'VonRueden Stream',76196,'Shanahanview','Texas','Japan'),(21,536,'Kenyon Shoal',25492,'West Roderick','New Jersey','Falkland Islands (Malvinas)'),(22,691,'Brown Ranch',41494,'Lake Johnnyberg','Alabama','Zimbabwe'),(23,640,'Boyer Shore',20390,'Lefflerburgh','Vermont','Russian Federation'),(24,707,'Hailey Overpass',13048,'Walshmouth','Connecticut','Latvia'),(25,311,'Ephraim Street',23554,'South Jayde','Florida','Bulgaria'),(26,196,'Keegan Valleys',28659,'Lake Mozelle','Wisconsin','Anguilla'),(27,272,'Makenzie Throughway',40944,'Brianamouth','South Carolina','Saint Pierre and Miquelon'),(28,54,'Mante Fork',48791,'Vidalstad','Arizona','Western Sahara'),(29,469,'Alysson Haven',71754,'New Giovaniton','Arizona','Taiwan'),(30,575,'Rickie Corners',34003,'Rossshire','Maine','Pakistan'),(31,5,'Perry Manors',81729,'Santosland','Minnesota','Papua New Guinea'),(32,383,'Lauretta Ranch',24049,'Carrollport','Illinois','Somalia'),(33,569,'Stanton Parkway',32757,'East Marcelinohaven','South Carolina','Lebanon'),(34,431,'Alan Trafficway',45968,'Kertzmanntown','Utah','Finland'),(35,507,'Jensen Fort',45692,'Markschester','Connecticut','Tokelau'),(36,314,'Ava Port',55581,'Littelbury','Connecticut','Pakistan'),(37,850,'Dach Drive',43415,'Connfurt','Colorado','Afghanistan'),(38,596,'Furman Highway',80388,'Freidaside','North Carolina','Guyana'),(39,693,'Malinda Island',20018,'Letitiaborough','Minnesota','Swaziland'),(40,471,'Hill Alley',55146,'North Amaniview','Louisiana','Jamaica'),(41,383,'Jarvis Overpass',46616,'Kurtisfort','Nebraska','Namibia'),(42,489,'Dessie Trace',95876,'Port Arneton','Missouri','Chile'),(43,830,'Jeffery Islands',63662,'Linnieville','South Carolina','Bouvet Island (Bouvetoya)'),(44,694,'Daniel Terrace',33201,'East Sabinaland','California','British Virgin Islands'),(45,813,'Simonis Squares',61612,'East Russel','Hawaii','India'),(46,391,'Purdy Row',20631,'Raynorhaven','Nevada','Czech Republic'),(47,83,'Bailey Isle',58719,'Port Dionview','New Hampshire','Moldova'),(48,647,'Brody Inlet',3323,'South Tedville','Missouri','Colombia'),(49,882,'Lemke Island',71764,'Casperfort','South Carolina','Kuwait'),(50,835,'Rempel Pike',1621,'South Bettye','Virginia','Belize'),(51,193,'Crist Road',10095,'South Nicolahaven','Texas','Nepal'),(52,222,'Boyd Villages',52056,'New Dahlia','Virginia','Benin'),(53,314,'McLaughlin Neck',20631,'New Elwynborough','North Carolina','Austria'),(54,377,'Brekke Circle',30255,'North Rory','Alabama','Syrian Arab Republic'),(55,204,'Lurline Cape',79773,'New Korbin','Washington','Norfolk Island'),(56,272,'Alan Cape',81403,'West Trace','Nebraska','Bulgaria'),(57,498,'Pouros View',33523,'Richardland','Nebraska','Sweden'),(58,368,'Emerald Extensions',28517,'Bodeland','Rhode Island','Argentina'),(59,65,'Jennifer Ferry',21797,'Franciscabury','Vermont','Syrian Arab Republic'),(60,201,'Muhammad Orchard',80147,'Avisbury','South Dakota','Brazil'),(61,870,'Citlalli Plains',83560,'Hintzmouth','Iowa','Qatar'),(62,253,'Aida Causeway',69462,'Moenland','Florida','Bouvet Island (Bouvetoya)'),(63,896,'Abner Creek',60965,'Osinskiburgh','New Mexico','Bulgaria'),(64,525,'Boyle Prairie',46858,'O\'Haraton','North Carolina','Jordan'),(65,192,'Lafayette Square',60189,'Cobyberg','Minnesota','Japan'),(66,434,'Buckridge Mall',42298,'Port Geraldineton','New Mexico','Palau'),(67,324,'Haley Island',17447,'Zemlakton','Maine','Mauritania'),(68,374,'Jarrett Passage',48499,'Rennerfort','Florida','Russian Federation'),(69,879,'Gunnar Village',83442,'Keyshawnfort','Delaware','Kiribati'),(70,277,'Carlotta Drives',74022,'Kihnborough','Nevada','Uzbekistan'),(71,787,'Bella Cape',76958,'Port Marianechester','Arkansas','Antarctica (the territory South of 60 deg S)'),(72,684,'Kilback Mill',62578,'East Thalialand','Michigan','Hong Kong'),(73,226,'Belle Port',50915,'Dibbertburgh','South Carolina','Singapore'),(74,306,'Marguerite Brooks',29572,'West Furman','Nevada','Saint Martin'),(75,113,'Kody Pines',79854,'North Serenity','Minnesota','Eritrea'),(76,518,'Eldora Terrace',13739,'Ocieland','Delaware','Kyrgyz Republic'),(77,800,'Gabriel Haven',42937,'Port Kaitlyn','Delaware','New Caledonia'),(78,687,'Batz Villages',84025,'Lake Katrinehaven','Indiana','Puerto Rico'),(79,663,'Everett Gardens',2606,'Israelfort','Oklahoma','Kiribati'),(80,864,'Bogan Vista',83619,'New Gennaro','Oklahoma','Armenia'),(81,204,'Hoppe Mountain',55209,'South Velma','Illinois','Estonia'),(82,536,'Emard Harbor',27267,'Joanneburgh','Ohio','Saint Lucia'),(83,322,'Vivienne Locks',54196,'Port Horaceborough','New Mexico','Moldova'),(84,209,'Rice Square',17414,'Opalborough','Maryland','Kiribati'),(85,658,'Schmeler Extension',26405,'Kohlerfurt','Delaware','Morocco'),(86,807,'Haley Brook',78018,'Samanthaside','Hawaii','Lithuania'),(87,118,'Cole Creek',59739,'North Eveton','New Mexico','Qatar'),(88,459,'Baumbach Trail',57210,'Connview','Indiana','Somalia'),(89,751,'Auer Inlet',21816,'Linneahaven','Arkansas','Lithuania'),(90,403,'Carrie Circles',9012,'South Eloyberg','New Jersey','Qatar'),(91,570,'Wunsch Glen',53529,'South Jewel','Utah','Bolivia'),(92,288,'Ernser Ridge',90321,'Tabithaport','Kansas','France'),(93,601,'Megane Ports',75272,'North Craig','Vermont','Ethiopia'),(94,354,'Emilio Locks',12256,'South Antoneberg','Indiana','Uganda'),(95,510,'Kenyatta Station',99357,'Siennahaven','Colorado','Falkland Islands (Malvinas)'),(96,886,'Emie Brook',60833,'North Winstonmouth','Wisconsin','Syrian Arab Republic'),(97,277,'O\'Connell Mews',71027,'South Assunta','New Jersey','Kazakhstan'),(98,468,'Louie Ports',717,'Bodeland','Arizona','Philippines'),(99,248,'Franco Island',73926,'Zboncakborough','Maine','Micronesia'),(100,683,'Kathleen Station',81976,'Kohlershire','Alaska','Belize'),(101,149,'Consuelo Mountain',54371,'West Melyssaside','Nevada','South Georgia and the South Sandwich Islands'),(102,562,'Quitzon Throughway',91557,'East Domingo','Utah','Korea'),(103,100,'Quitzon Extension',91127,'North Lyricberg','Maine','Argentina'),(104,748,'Ritchie Gardens',89292,'Leannonfort','Minnesota','Uganda'),(105,768,'Vena Trail',9051,'North Patsy','Ohio','Tuvalu'),(106,587,'Lela Lodge',20942,'West Valentinahaven','Iowa','Comoros'),(107,383,'Rosenbaum Camp',9463,'South Hershelview','North Carolina','Turks and Caicos Islands'),(108,839,'Graham Locks',48798,'Tremblaymouth','New York','Micronesia'),(109,551,'Pete Isle',18623,'Rafaelabury','Tennessee','Guyana'),(110,314,'Ziemann Island',41176,'Hamillton','Maryland','Tunisia'),(111,339,'Alena Mills',58117,'New Abigayle','Illinois','Cayman Islands'),(112,501,'Laurianne Road',75154,'Mosheville','New Mexico','Reunion'),(113,712,'Zula Course',40511,'Geraldstad','Ohio','Netherlands'),(114,7,'Crooks Station',93407,'Ullrichshire','Utah','Luxembourg'),(115,41,'Ryan Lock',17706,'Harveystad','Maryland','Liberia'),(116,258,'Jaydon Well',94224,'Anselport','New York','Mexico'),(117,155,'Marquardt Freeway',93859,'South Anastasiaburgh','Indiana','Honduras'),(118,67,'Travon Plains',71164,'Jimmyberg','North Dakota','Kiribati'),(119,746,'Wuckert Loop',85585,'New Onie','Colorado','South Georgia and the South Sandwich Islands'),(120,166,'Hosea Isle',82979,'Esperanzatown','South Carolina','Cuba'),(121,261,'Sven Rapid',91199,'Deborahfort','Minnesota','Kenya'),(122,596,'Kreiger Ways',30211,'Coryshire','Delaware','Malawi'),(123,738,'Padberg Viaduct',68063,'Port Nehafort','Massachusetts','Canada'),(124,738,'Peggie Trafficway',42347,'East Donaldtown','Pennsylvania','Russian Federation'),(125,877,'Kozey Loop',31930,'West Roycefort','Colorado','Kuwait'),(126,650,'Alfonso Gardens',23801,'South Tessie','Missouri','Netherlands Antilles'),(127,598,'Damian Ranch',33154,'South Cadentown','Iowa','Sri Lanka'),(128,355,'Jody Orchard',1670,'North Verna','Colorado','Cambodia'),(129,900,'Wiegand Ville',45099,'West Kamrynburgh','New York','Estonia'),(130,517,'Orval Ways',4139,'Gulgowskifurt','Montana','Papua New Guinea'),(131,744,'Heaney Mews',61504,'Lake Mikeland','Minnesota','Bouvet Island (Bouvetoya)'),(132,64,'Rau Point',58030,'Sydneyton','New Mexico','Gabon'),(133,352,'Parker Plains',337,'Port Veronica','Florida','Seychelles'),(134,408,'Dominic Haven',8975,'Dickinsonton','Wisconsin','New Zealand'),(135,430,'Wiza Pass',14917,'Padberghaven','West Virginia','Iraq'),(136,74,'Athena Passage',55476,'Mathildeburgh','North Carolina','Slovakia (Slovak Republic)'),(137,190,'Moore Fort',29085,'Roobfurt','Montana','Norway'),(138,403,'Jaleel Mission',68572,'Bethanyfort','Minnesota','Guinea-Bissau');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activities_id` int DEFAULT NULL,
  `reservation_id` int DEFAULT NULL,
  `auteur_id` int NOT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden_words` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `published_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962A2A4DB562` (`activities_id`),
  KEY `IDX_5F9E962AB83297E7` (`reservation_id`),
  KEY `IDX_5F9E962A60BB6FE6` (`auteur_id`),
  CONSTRAINT `FK_5F9E962A2A4DB562` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `FK_5F9E962A60BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_5F9E962AB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(2,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(3,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(4,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(5,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(6,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(7,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(8,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(9,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00'),(10,2,1,4,'totototot','a:3:{i:0;s:3:\"aaa\";i:1;s:6:\"aaaazz\";i:2;s:6:\"aefxcc\";}','2021-03-15 00:00:00');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibility`
--

DROP TABLE IF EXISTS `disponibility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disponibility` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int DEFAULT NULL,
  `jour_dispo` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_38BB9260549213EC` (`property_id`),
  CONSTRAINT `FK_38BB9260549213EC` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibility`
--

LOCK TABLES `disponibility` WRITE;
/*!40000 ALTER TABLE `disponibility` DISABLE KEYS */;
INSERT INTO `disponibility` VALUES (1,1,'2021-03-09 00:00:00'),(2,1,'2021-03-10 00:00:00'),(3,1,'2021-03-11 00:00:00'),(4,1,'2021-03-12 00:00:00'),(5,1,'2021-03-13 00:00:00'),(6,1,'2021-03-14 00:00:00'),(7,1,'2021-03-15 00:00:00'),(8,1,'2021-03-16 00:00:00'),(9,1,'2021-03-17 00:00:00'),(10,1,'2021-03-18 00:00:00'),(11,1,'2021-03-19 00:00:00'),(12,1,'2021-03-20 00:00:00'),(13,1,'2021-03-21 00:00:00'),(14,1,'2021-03-22 00:00:00'),(15,1,'2021-03-23 00:00:00'),(16,1,'2021-03-24 00:00:00'),(17,1,'2021-03-25 00:00:00'),(18,1,'2021-03-26 00:00:00'),(19,1,'2021-03-27 00:00:00'),(20,1,'2021-03-28 00:00:00'),(21,2,'2021-03-09 00:00:00'),(22,3,'2021-03-10 00:00:00'),(23,4,'2021-03-11 00:00:00'),(24,5,'2021-03-12 00:00:00'),(25,6,'2021-03-13 00:00:00'),(26,7,'2021-03-14 00:00:00'),(27,8,'2021-03-15 00:00:00'),(28,9,'2021-03-16 00:00:00'),(29,10,'2021-03-17 00:00:00'),(30,11,'2021-03-18 00:00:00'),(31,12,'2021-03-19 00:00:00'),(32,13,'2021-03-20 00:00:00'),(33,14,'2021-03-21 00:00:00'),(34,15,'2021-03-22 00:00:00'),(35,16,'2021-03-23 00:00:00'),(36,17,'2021-03-24 00:00:00'),(37,18,'2021-03-25 00:00:00'),(38,19,'2021-03-26 00:00:00'),(39,20,'2021-03-27 00:00:00'),(40,21,'2021-03-28 00:00:00'),(41,22,'2021-03-29 00:00:00'),(42,23,'2021-03-30 00:00:00'),(43,24,'2021-03-31 00:00:00'),(44,25,'2021-04-01 00:00:00'),(45,26,'2021-04-02 00:00:00'),(46,27,'2021-04-03 00:00:00'),(47,28,'2021-04-04 00:00:00'),(48,29,'2021-04-05 00:00:00'),(49,30,'2021-04-06 00:00:00'),(50,31,'2021-04-07 00:00:00'),(51,33,'2021-03-09 18:20:41'),(52,34,'2021-04-09 18:20:41'),(53,35,'2021-05-09 18:20:41'),(54,36,'2021-06-09 18:20:41'),(55,37,'2021-07-09 18:20:41'),(56,38,'2021-08-09 18:20:41'),(57,39,'2021-09-09 18:20:41'),(58,40,'2021-10-09 18:20:41'),(59,41,'2021-11-09 18:20:41'),(60,42,'2021-12-09 18:20:41'),(61,43,'2022-01-09 18:20:41'),(62,44,'2022-02-09 18:20:41'),(63,45,'2022-03-09 18:20:41'),(64,46,'2022-04-09 18:20:41'),(65,47,'2022-05-09 18:20:41'),(66,48,'2022-06-09 18:20:41'),(67,49,'2022-07-09 18:20:41'),(68,50,'2022-08-09 18:20:41'),(69,51,'2022-09-09 18:20:41'),(70,52,'2022-10-09 18:20:41'),(71,53,'2022-11-09 18:20:41'),(72,54,'2022-12-09 18:20:41'),(73,55,'2023-01-09 18:20:41'),(74,56,'2023-02-09 18:20:41'),(75,57,'2023-03-09 18:20:41'),(76,58,'2023-04-09 18:20:41'),(77,59,'2023-05-09 18:20:41'),(78,60,'2023-06-09 18:20:41'),(79,61,'2023-07-09 18:20:41'),(80,62,'2023-08-09 18:20:41'),(81,32,'2021-03-09 18:20:41'),(82,32,'2021-04-09 18:20:41'),(83,32,'2021-05-09 18:20:41'),(84,32,'2021-06-09 18:20:41'),(85,32,'2021-07-09 18:20:41'),(86,32,'2021-08-09 18:20:41'),(87,32,'2021-09-09 18:20:41'),(88,32,'2021-10-09 18:20:41'),(89,32,'2021-11-09 18:20:41'),(90,32,'2021-12-09 18:20:41'),(91,32,'2022-01-09 18:20:41'),(92,32,'2022-02-09 18:20:41'),(93,32,'2022-03-09 18:20:41'),(94,32,'2022-04-09 18:20:41'),(95,32,'2022-05-09 18:20:41'),(96,32,'2022-06-09 18:20:41'),(97,32,'2022-07-09 18:20:41'),(98,32,'2022-08-09 18:20:41'),(99,32,'2022-09-09 18:20:41'),(100,32,'2022-10-09 18:20:41'),(101,64,'2021-03-09 00:00:00'),(102,65,'2021-03-10 00:00:00'),(103,66,'2021-03-11 00:00:00'),(104,67,'2021-03-12 00:00:00'),(105,68,'2021-03-13 00:00:00'),(106,69,'2021-03-14 00:00:00'),(107,70,'2021-03-15 00:00:00'),(108,71,'2021-03-16 00:00:00'),(109,72,'2021-03-17 00:00:00'),(110,73,'2021-03-18 00:00:00'),(111,74,'2021-03-19 00:00:00'),(112,75,'2021-03-20 00:00:00'),(113,76,'2021-03-21 00:00:00'),(114,77,'2021-03-22 00:00:00'),(115,78,'2021-03-23 00:00:00'),(116,79,'2021-03-24 00:00:00'),(117,80,'2021-03-25 00:00:00'),(118,81,'2021-03-26 00:00:00'),(119,82,'2021-03-27 00:00:00'),(120,83,'2021-03-28 00:00:00'),(121,84,'2021-03-29 00:00:00'),(122,85,'2021-03-30 00:00:00'),(123,86,'2021-03-31 00:00:00'),(124,87,'2021-04-01 00:00:00'),(125,88,'2021-04-02 00:00:00'),(126,89,'2021-04-03 00:00:00'),(127,90,'2021-04-04 00:00:00'),(128,91,'2021-04-05 00:00:00'),(129,92,'2021-04-06 00:00:00'),(130,93,'2021-04-07 00:00:00'),(131,94,'2021-03-09 18:20:41'),(132,94,'2021-04-09 18:20:41'),(133,94,'2021-05-09 18:20:41'),(134,94,'2021-06-09 18:20:41'),(135,94,'2021-07-09 18:20:41'),(136,94,'2021-08-09 18:20:41'),(137,94,'2021-09-09 18:20:41'),(138,94,'2021-10-09 18:20:41'),(139,94,'2021-11-09 18:20:41'),(140,94,'2021-12-09 18:20:41'),(141,94,'2022-01-09 18:20:41'),(142,94,'2022-02-09 18:20:41'),(143,94,'2022-03-09 18:20:41'),(144,94,'2022-04-09 18:20:41'),(145,94,'2022-05-09 18:20:41'),(146,94,'2022-06-09 18:20:41'),(147,94,'2022-07-09 18:20:41'),(148,94,'2022-08-09 18:20:41'),(149,94,'2022-09-09 18:20:41'),(150,94,'2022-10-09 18:20:41'),(151,95,'2021-03-09 00:00:00'),(152,96,'2021-03-10 00:00:00'),(153,97,'2021-03-11 00:00:00'),(154,98,'2021-03-12 00:00:00'),(155,99,'2021-03-13 00:00:00'),(156,100,'2021-03-14 00:00:00'),(157,101,'2021-03-15 00:00:00'),(158,102,'2021-03-16 00:00:00'),(159,103,'2021-03-17 00:00:00'),(160,104,'2021-03-18 00:00:00'),(161,105,'2021-03-19 00:00:00'),(162,106,'2021-03-20 00:00:00'),(163,107,'2021-03-21 00:00:00'),(164,108,'2021-03-22 00:00:00'),(165,109,'2021-03-23 00:00:00'),(166,110,'2021-03-24 00:00:00'),(167,111,'2021-03-25 00:00:00'),(168,112,'2021-03-26 00:00:00'),(169,113,'2021-03-27 00:00:00'),(170,114,'2021-03-28 00:00:00'),(171,115,'2021-03-29 00:00:00'),(172,116,'2021-03-30 00:00:00'),(173,117,'2021-03-31 00:00:00'),(174,118,'2021-04-01 00:00:00'),(175,119,'2021-04-02 00:00:00'),(176,120,'2021-04-03 00:00:00'),(177,121,'2021-04-04 00:00:00'),(178,122,'2021-04-05 00:00:00'),(179,123,'2021-04-06 00:00:00'),(180,124,'2021-04-07 00:00:00'),(181,125,'2021-03-09 18:20:41'),(182,125,'2021-04-09 18:20:41'),(183,125,'2021-05-09 18:20:41'),(184,125,'2021-06-09 18:20:41'),(185,125,'2021-07-09 18:20:41'),(186,125,'2021-08-09 18:20:41'),(187,125,'2021-09-09 18:20:41'),(188,125,'2021-10-09 18:20:41'),(189,125,'2021-11-09 18:20:41'),(190,125,'2021-12-09 18:20:41'),(191,125,'2022-01-09 18:20:41'),(192,125,'2022-02-09 18:20:41'),(193,125,'2022-03-09 18:20:41'),(194,125,'2022-04-09 18:20:41'),(195,125,'2022-05-09 18:20:41'),(196,125,'2022-06-09 18:20:41'),(197,125,'2022-07-09 18:20:41'),(198,125,'2022-08-09 18:20:41'),(199,125,'2022-09-09 18:20:41'),(200,125,'2022-10-09 18:20:41'),(201,125,'2021-03-09 18:20:41'),(202,125,'2021-04-09 18:20:41'),(203,125,'2021-05-09 18:20:41'),(204,125,'2021-06-09 18:20:41'),(205,125,'2021-07-09 18:20:41'),(206,125,'2021-08-09 18:20:41'),(207,125,'2021-09-09 18:20:41'),(208,125,'2021-10-09 18:20:41'),(209,125,'2021-11-09 18:20:41'),(210,125,'2021-12-09 18:20:41'),(211,125,'2022-01-09 18:20:41'),(212,125,'2022-02-09 18:20:41'),(213,125,'2022-03-09 18:20:41'),(214,125,'2022-04-09 18:20:41'),(215,125,'2022-05-09 18:20:41'),(216,125,'2022-06-09 18:20:41'),(217,125,'2022-07-09 18:20:41'),(218,125,'2022-08-09 18:20:41'),(219,125,'2022-09-09 18:20:41'),(220,125,'2022-10-09 18:20:41'),(221,135,'2021-03-09 00:00:00'),(222,135,'2021-03-10 00:00:00'),(223,135,'2021-03-11 00:00:00'),(224,135,'2021-03-12 00:00:00'),(225,135,'2021-03-13 00:00:00'),(226,135,'2021-03-14 00:00:00'),(227,135,'2021-03-15 00:00:00'),(228,135,'2021-03-16 00:00:00'),(229,135,'2021-03-17 00:00:00'),(230,135,'2021-03-18 00:00:00'),(231,135,'2021-03-19 00:00:00'),(232,135,'2021-03-20 00:00:00'),(233,135,'2021-03-21 00:00:00'),(234,135,'2021-03-22 00:00:00'),(235,135,'2021-03-23 00:00:00'),(236,135,'2021-03-24 00:00:00'),(237,135,'2021-03-25 00:00:00'),(238,135,'2021-03-26 00:00:00'),(239,135,'2021-03-27 00:00:00'),(240,135,'2021-03-28 00:00:00'),(241,136,'2021-03-09 18:20:41'),(242,136,'2021-04-09 18:20:41'),(243,136,'2021-05-09 18:20:41'),(244,136,'2021-06-09 18:20:41'),(245,136,'2021-07-09 18:20:41'),(246,136,'2021-08-09 18:20:41'),(247,136,'2021-09-09 18:20:41'),(248,136,'2021-10-09 18:20:41'),(249,136,'2021-11-09 18:20:41'),(250,136,'2021-12-09 18:20:41'),(251,136,'2022-01-09 18:20:41'),(252,136,'2022-02-09 18:20:41'),(253,136,'2022-03-09 18:20:41'),(254,136,'2022-04-09 18:20:41'),(255,136,'2022-05-09 18:20:41'),(256,136,'2022-06-09 18:20:41'),(257,136,'2022-07-09 18:20:41'),(258,136,'2022-08-09 18:20:41'),(259,136,'2022-09-09 18:20:41'),(260,136,'2022-10-09 18:20:41'),(261,137,'2021-03-09 18:20:41'),(262,137,'2021-03-16 18:20:41'),(263,137,'2021-03-23 18:20:41'),(264,137,'2021-03-30 18:20:41'),(265,137,'2021-04-06 18:20:41'),(266,137,'2021-04-13 18:20:41'),(267,137,'2021-04-20 18:20:41'),(268,137,'2021-04-27 18:20:41'),(269,137,'2021-05-04 18:20:41'),(270,137,'2021-05-11 18:20:41'),(271,138,'2021-03-09 18:20:41'),(272,138,'2021-03-16 18:20:41'),(273,138,'2021-03-23 18:20:41'),(274,138,'2021-03-30 18:20:41'),(275,138,'2021-04-06 18:20:41'),(276,138,'2021-04-13 18:20:41'),(277,138,'2021-04-20 18:20:41'),(278,138,'2021-04-27 18:20:41'),(279,138,'2021-05-04 18:20:41'),(280,138,'2021-05-11 18:20:41');
/*!40000 ALTER TABLE `disponibility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pool` tinyint(1) NOT NULL,
  `baignoire` tinyint(1) NOT NULL,
  `jaccuzzi` tinyint(1) NOT NULL,
  `climatiseur` tinyint(1) NOT NULL,
  `chauffage` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (1,0,1,1,0,1,0);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paiement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int NOT NULL,
  `token_stripe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_paiement` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retour_stripe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_retour_stripe` datetime DEFAULT NULL,
  `montant` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B1DC7A1EB83297E7` (`reservation_id`),
  CONSTRAINT `FK_B1DC7A1EB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiement`
--

LOCK TABLES `paiement` WRITE;
/*!40000 ALTER TABLE `paiement` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pictures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comments_id` int DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  `activities_id` int DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_size` int NOT NULL,
  `status` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F7C2FC063379586` (`comments_id`),
  KEY `IDX_8F7C2FC0549213EC` (`property_id`),
  KEY `IDX_8F7C2FC02A4DB562` (`activities_id`),
  CONSTRAINT `FK_8F7C2FC02A4DB562` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `FK_8F7C2FC0549213EC` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`),
  CONSTRAINT `FK_8F7C2FC063379586` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,NULL,1,NULL,'https://lorempixel.com/640/300/?33838',650,'s:14:\"en modération\";',NULL,NULL),(2,NULL,1,NULL,'https://lorempixel.com/640/300/?41676',650,'s:14:\"en modération\";',NULL,NULL),(3,NULL,2,2,'https://lorempixel.com/640/300/?81571',650,'s:14:\"en modération\";',NULL,NULL);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_property_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `equipment_id` int DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int NOT NULL,
  `nbr_room` int NOT NULL,
  `rate` double NOT NULL,
  `max_travelers` int NOT NULL,
  `access_handicap` tinyint(1) NOT NULL,
  `water` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electricity` tinyint(1) NOT NULL,
  `tax` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8BF21CDEF5B7AF75` (`address_id`),
  KEY `IDX_8BF21CDE1F8BC47D` (`type_property_id`),
  KEY `IDX_8BF21CDEA76ED395` (`user_id`),
  KEY `IDX_8BF21CDE517FE9FE` (`equipment_id`),
  CONSTRAINT `FK_8BF21CDE1F8BC47D` FOREIGN KEY (`type_property_id`) REFERENCES `type_property` (`id`),
  CONSTRAINT `FK_8BF21CDE517FE9FE` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`),
  CONSTRAINT `FK_8BF21CDEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_8BF21CDEF5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (1,1,2,1,1,'cabane dans les abres','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(2,1,2,1,2,'cabane dans les abres 0','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(3,1,2,1,3,'cabane dans les abres 1','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(4,1,2,1,4,'cabane dans les abres 2','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(5,1,2,1,5,'cabane dans les abres 3','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(6,1,2,1,6,'cabane dans les abres 4','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(7,1,2,1,7,'cabane dans les abres 5','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(8,1,2,1,8,'cabane dans les abres 6','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(9,1,2,1,9,'cabane dans les abres 7','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(10,1,2,1,10,'cabane dans les abres 8','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(11,1,2,1,11,'cabane dans les abres 9','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(12,1,2,1,12,'cabane dans les abres 10','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(13,1,2,1,13,'cabane dans les abres 11','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(14,1,2,1,14,'cabane dans les abres 12','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(15,1,2,1,15,'cabane dans les abres 13','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(16,1,2,1,16,'cabane dans les abres 14','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(17,1,2,1,17,'cabane dans les abres 15','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(18,1,2,1,18,'cabane dans les abres 16','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(19,1,2,1,19,'cabane dans les abres 17','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(20,1,2,1,20,'cabane dans les abres 18','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(21,1,2,1,21,'cabane dans les abres 19','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(22,1,2,1,22,'cabane dans les abres 20','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(23,1,2,1,23,'cabane dans les abres 21','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(24,1,2,1,24,'cabane dans les abres 22','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(25,1,2,1,25,'cabane dans les abres 23','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(26,1,2,1,26,'cabane dans les abres 24','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(27,1,2,1,27,'cabane dans les abres 25','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(28,1,2,1,28,'cabane dans les abres 26','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(29,1,2,1,29,'cabane dans les abres 27','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(30,1,2,1,30,'cabane dans les abres 28','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(31,1,2,1,31,'cabane dans les abres 29','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(32,2,10,1,32,'cabane sur l\'eau','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(33,1,10,1,33,'cabane sur l\'eau 0','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(34,1,10,1,34,'cabane sur l\'eau 1','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(35,1,10,1,35,'cabane sur l\'eau 2','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(36,1,10,1,36,'cabane sur l\'eau 3','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(37,1,10,1,37,'cabane sur l\'eau 4','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(38,1,10,1,38,'cabane sur l\'eau 5','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(39,1,10,1,39,'cabane sur l\'eau 6','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(40,1,10,1,40,'cabane sur l\'eau 7','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(41,1,10,1,41,'cabane sur l\'eau 8','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(42,1,10,1,42,'cabane sur l\'eau 9','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(43,1,10,1,43,'cabane sur l\'eau 10','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(44,1,10,1,44,'cabane sur l\'eau 11','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(45,1,10,1,45,'cabane sur l\'eau 12','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(46,1,10,1,46,'cabane sur l\'eau 13','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(47,1,10,1,47,'cabane sur l\'eau 14','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(48,1,10,1,48,'cabane sur l\'eau 15','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(49,1,10,1,49,'cabane sur l\'eau 16','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(50,1,10,1,50,'cabane sur l\'eau 17','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(51,1,10,1,51,'cabane sur l\'eau 18','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(52,1,10,1,52,'cabane sur l\'eau 19','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(53,1,10,1,53,'cabane sur l\'eau 20','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(54,1,10,1,54,'cabane sur l\'eau 21','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(55,1,10,1,55,'cabane sur l\'eau 22','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(56,1,10,1,56,'cabane sur l\'eau 23','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(57,1,10,1,57,'cabane sur l\'eau 24','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(58,1,10,1,58,'cabane sur l\'eau 25','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(59,1,10,1,59,'cabane sur l\'eau 26','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(60,1,10,1,60,'cabane sur l\'eau 27','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(61,1,10,1,61,'cabane sur l\'eau 28','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(62,1,10,1,62,'cabane sur l\'eau 29','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(63,8,10,1,63,'bulle','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(64,1,10,1,64,'bulle0','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(65,1,10,1,65,'bulle1','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(66,1,10,1,66,'bulle2','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(67,1,10,1,67,'bulle3','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(68,1,10,1,68,'bulle4','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(69,1,10,1,69,'bulle5','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(70,1,10,1,70,'bulle6','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(71,1,10,1,71,'bulle7','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(72,1,10,1,72,'bulle8','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(73,1,10,1,73,'bulle9','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(74,1,10,1,74,'bulle10','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(75,1,10,1,75,'bulle11','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(76,1,10,1,76,'bulle12','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(77,1,10,1,77,'bulle13','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(78,1,10,1,78,'bulle14','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(79,1,10,1,79,'bulle15','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(80,1,10,1,80,'bulle16','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(81,1,10,1,81,'bulle17','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(82,1,10,1,82,'bulle18','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(83,1,10,1,83,'bulle19','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(84,1,10,1,84,'bulle20','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(85,1,10,1,85,'bulle21','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(86,1,10,1,86,'bulle22','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(87,1,10,1,87,'bulle23','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(88,1,10,1,88,'bulle24','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(89,1,10,1,89,'bulle25','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(90,1,10,1,91,'bulle26','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(91,1,10,1,90,'bulle27','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(92,1,10,1,92,'bulle28','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(93,1,10,1,93,'bulle29','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(94,9,10,1,94,'tipi','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',0,0.2,'draft'),(95,1,10,1,95,'bulle0','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(96,1,10,1,96,'bulle1','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(97,1,10,1,97,'bulle2','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(98,1,10,1,98,'bulle3','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(99,1,10,1,99,'bulle4','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(100,1,10,1,100,'bulle5','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(101,1,10,1,101,'bulle6','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(102,1,10,1,102,'bulle7','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(103,1,10,1,103,'bulle8','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(104,1,10,1,104,'bulle9','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(105,1,10,1,105,'bulle10','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(106,1,10,1,106,'bulle11','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(107,1,10,1,107,'bulle12','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(108,1,10,1,108,'bulle13','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(109,1,10,1,109,'bulle14','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(110,1,10,1,110,'bulle15','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(111,1,10,1,111,'bulle16','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(112,1,10,1,112,'bulle17','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(113,1,10,1,113,'bulle18','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(114,1,10,1,114,'bulle19','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(115,1,10,1,115,'bulle20','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(116,1,10,1,116,'bulle21','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(117,1,10,1,117,'bulle22','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(118,1,10,1,118,'bulle23','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(119,1,10,1,119,'bulle24','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(120,1,10,1,120,'bulle25','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(121,1,10,1,121,'bulle26','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(122,1,10,1,122,'bulle27','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(123,1,10,1,123,'bulle28','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(124,1,10,1,124,'bulle29','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(125,6,10,1,125,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(126,4,10,1,126,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(127,4,10,1,127,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(128,4,10,1,128,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(129,4,10,1,129,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(130,4,10,1,130,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(131,4,10,1,131,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(132,4,10,1,132,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(133,4,10,1,133,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(134,4,10,1,135,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(135,4,10,1,136,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(136,3,2,1,138,'yourtes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(137,6,2,1,137,'inclassables','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(138,5,2,1,134,'bateaux','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propriete`
--

DROP TABLE IF EXISTS `propriete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propriete` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_property_id` int DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_73A85B931F8BC47D` (`type_property_id`),
  CONSTRAINT `FK_73A85B931F8BC47D` FOREIGN KEY (`type_property_id`) REFERENCES `type_property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propriete`
--

LOCK TABLES `propriete` WRITE;
/*!40000 ALTER TABLE `propriete` DISABLE KEYS */;
INSERT INTO `propriete` VALUES (1,1,'profondeur de la cabane','string'),(2,2,'barbecue','booleen'),(3,3,'lit supplémentaire','integer');
/*!40000 ALTER TABLE `propriete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propriete_type_property`
--

DROP TABLE IF EXISTS `propriete_type_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propriete_type_property` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_property_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8784F39F1F8BC47D` (`type_property_id`),
  CONSTRAINT `FK_8784F39F1F8BC47D` FOREIGN KEY (`type_property_id`) REFERENCES `type_property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propriete_type_property`
--

LOCK TABLES `propriete_type_property` WRITE;
/*!40000 ALTER TABLE `propriete_type_property` DISABLE KEYS */;
INSERT INTO `propriete_type_property` VALUES (1,1);
/*!40000 ALTER TABLE `propriete_type_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `property_id` int NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `montant` double NOT NULL,
  `number_traveler` int NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `proprietes` json NOT NULL,
  `historical` json NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C84955A76ED395` (`user_id`),
  KEY `IDX_42C84955549213EC` (`property_id`),
  CONSTRAINT `FK_42C84955549213EC` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`),
  CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,4,32,'2021-03-10 00:00:00','2021-03-15 00:00:00',600,3,1,'[]','[]','en attente','tok_1IHxljKzuq8ewRYyYBlC0GSz'),(2,4,1,'2021-04-01 18:20:41','2021-04-13 18:20:41',1200,3,0,'[]','[]','rejetee','tok_1IHxljKzuq8ewRYyYBlC0GSz');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_property`
--

DROP TABLE IF EXISTS `type_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_property` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_property`
--

LOCK TABLES `type_property` WRITE;
/*!40000 ALTER TABLE `type_property` DISABLE KEYS */;
INSERT INTO `type_property` VALUES (1,'cabane dans les arbres','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(2,'cabane sur l\'eau','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(3,'yourte','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(4,'chalets','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(5,'bateaux','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(6,'Igloo dans le sud de la france','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(7,'Igloo dans le sud de la france','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(8,'bulle','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(9,'tipi','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder');
/*!40000 ALTER TABLE `type_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$satEcfmMjtdmtUG47uX1eA$K4zD1tzf5cA/86tadh41y43vKmHgsQCtMWEMCq9R0bo','1','[\"ROLE_ADMIN\"]','Philippe','Leclerc',NULL,NULL),(2,'proprio@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$rJvTD058Av7or9d4O3cR1A$fEa4DFvb0S8k0u52o6u/tWotBwBCy/FrGgGhmOuF+9M','33','[\"ROLE_PROPRIO\"]','Céline','Levy',NULL,NULL),(3,'proprio2@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$ySBdSBlq3aH5WS8O6MhEWg$Bnpa/0+7AZK7gQXrhp86E3DHQCdAqSz/ySxfDVGoGwk','4','[\"ROLE_PROPRIO\"]','Anaïs','Lefebvre',NULL,NULL),(4,'locataire@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$zWWYOHjNPhPT1wfLVpfnng$Sl8MuicQrBwT+8FY2EukmhVwArtZgigd8NsFxBnUw0A','1','[\"ROLE_USER\"]','Olivier','Robert',NULL,NULL),(5,'user0@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$oSl2/kR+AR/B9RynvyjrrQ$PsgoOJwMzmCb+sPKMLUJpdTxi/eebDcul69eo0qdxL8','33','[\"ROLE_USER\"]','Michel','Francois',NULL,NULL),(6,'user1@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$AEyLQAFHWOyosEYOzsFuSg$HqmjjujkST2v/MCZrdi3fkH2IRLVN78ZiFtKDraw+vY','33','[\"ROLE_ADMIN\"]','Hélène','Rousseau',NULL,NULL),(7,'user2@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$jiZkk6+2etCcH6N6QJIJRg$oYp8OrCnynFVSHk+vVxETQeodIL1CXMTxfdgUZve+Ak','755194829','[\"ROLE_USER\"]','Sylvie','Le Gall',NULL,NULL),(8,'user3@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$kgH+z91VVuLI6uBpgWJADg$P2g0uIdby12yHGg63QYmIOusR/0LMgqaLKCJiVT8AcU','782046532','[\"ROLE_USER\"]','Sébastien','Ramos',NULL,NULL),(9,'user4@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$00mI9VvMz6VHTiF7H/8qZA$OAb7x8LnDYmxsBDJdpfvIPqhD77BUCmEv3ewqk47goc','33','[\"ROLE_USER\"]','Gilbert','Richard',NULL,NULL),(10,'proprio1@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$E6s1acPL9FxzEMJHMBL/LA$CYcGaKZVjMlq4L5CsuvDcAppLGTNa/Tgm2VTGTMEWCE','33','[\"ROLE_PROPRIO\"]','Théodore','Klein',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valeur`
--

DROP TABLE IF EXISTS `valeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_id` int DEFAULT NULL,
  `property_id_id` int NOT NULL,
  `valeur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1B44CD5171179CD6` (`name_id`),
  KEY `IDX_1B44CD51B9575F5A` (`property_id_id`),
  CONSTRAINT `FK_1B44CD5171179CD6` FOREIGN KEY (`name_id`) REFERENCES `propriete` (`id`),
  CONSTRAINT `FK_1B44CD51B9575F5A` FOREIGN KEY (`property_id_id`) REFERENCES `property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valeur`
--

LOCK TABLES `valeur` WRITE;
/*!40000 ALTER TABLE `valeur` DISABLE KEYS */;
INSERT INTO `valeur` VALUES (1,1,1,5);
/*!40000 ALTER TABLE `valeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valeur_bool`
--

DROP TABLE IF EXISTS `valeur_bool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valeur_bool` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_id` int DEFAULT NULL,
  `property_id_id` int NOT NULL,
  `valeur` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_575578AF71179CD6` (`name_id`),
  KEY `IDX_575578AFB9575F5A` (`property_id_id`),
  CONSTRAINT `FK_575578AF71179CD6` FOREIGN KEY (`name_id`) REFERENCES `propriete` (`id`),
  CONSTRAINT `FK_575578AFB9575F5A` FOREIGN KEY (`property_id_id`) REFERENCES `property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valeur_bool`
--

LOCK TABLES `valeur_bool` WRITE;
/*!40000 ALTER TABLE `valeur_bool` DISABLE KEYS */;
/*!40000 ALTER TABLE `valeur_bool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuer_string`
--

DROP TABLE IF EXISTS `valuer_string`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valuer_string` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_id` int DEFAULT NULL,
  `property_id_id` int NOT NULL,
  `valeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EE5C57CD71179CD6` (`name_id`),
  KEY `IDX_EE5C57CDB9575F5A` (`property_id_id`),
  CONSTRAINT `FK_EE5C57CD71179CD6` FOREIGN KEY (`name_id`) REFERENCES `propriete` (`id`),
  CONSTRAINT `FK_EE5C57CDB9575F5A` FOREIGN KEY (`property_id_id`) REFERENCES `property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuer_string`
--

LOCK TABLES `valuer_string` WRITE;
/*!40000 ALTER TABLE `valuer_string` DISABLE KEYS */;
/*!40000 ALTER TABLE `valuer_string` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-10 13:01:11
