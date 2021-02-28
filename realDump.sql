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
INSERT INTO `activities_property` VALUES (1,138);
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
INSERT INTO `address` VALUES (1,55,'Wilkinson Land',69318,'Port Violafurt','Hawaii','Czech Republic'),(2,131,'Rice Path',67941,'East Lisastad','Delaware','Sudan'),(3,474,'Ben Trafficway',46513,'Port Marceloborough','New York','Norway'),(4,99,'Cartwright Drives',65365,'Adamsborough','Kansas','Ethiopia'),(5,113,'Ara Mall',70078,'West Guillermoshire','Minnesota','Liberia'),(6,73,'Lori Wells',75639,'Guadalupeshire','West Virginia','Ghana'),(7,454,'Collin Canyon',34823,'New Alfonsobury','New Jersey','Lesotho'),(8,798,'Carli Haven',18400,'Daishashire','Arkansas','Iraq'),(9,155,'Dave Shore',83609,'South Kyle','Maine','Argentina'),(10,718,'Marjolaine Vista',233,'Wolffstad','Pennsylvania','Australia'),(11,817,'Dasia Ports',47669,'Anibalfort','Nevada','Uruguay'),(12,20,'Ortiz Landing',85091,'Reillybury','Illinois','Nepal'),(13,354,'Harris Orchard',75712,'New Tristonville','North Carolina','Uruguay'),(14,124,'Beahan Alley',23708,'East Blake','Florida','Qatar'),(15,387,'Anissa Ways',56511,'Homenickmouth','West Virginia','Canada'),(16,140,'Thompson Rue',76325,'Ambershire','Wyoming','Costa Rica'),(17,397,'Tracy Brooks',33931,'Torpberg','Connecticut','Spain'),(18,810,'Arjun Extensions',71115,'Port Giuseppeville','Illinois','Nigeria'),(19,382,'Hirthe Station',72089,'Hilpertberg','Virginia','Nepal'),(20,365,'Golden Trace',20816,'Lake Jadebury','Louisiana','Turks and Caicos Islands'),(21,831,'Gerlach Crest',40667,'Lake Marysetown','Alabama','Malawi'),(22,722,'Purdy Field',17271,'New Yolandaside','Kentucky','Tajikistan'),(23,17,'Khalid Knolls',81153,'Lake Ethylport','Mississippi','Guernsey'),(24,823,'Malika Manors',13188,'Schuylerberg','Washington','Chad'),(25,531,'Beahan Island',98599,'North Garrison','Rhode Island','Tokelau'),(26,752,'Weimann Green',14417,'Durganhaven','Alabama','Brazil'),(27,864,'Demetris Course',81334,'Quitzonview','Washington','Kyrgyz Republic'),(28,337,'Dietrich Park',8828,'Eloisemouth','New York','France'),(29,177,'Catalina Crossroad',35460,'Lake Cecileland','South Carolina','Uzbekistan'),(30,871,'Sawayn Parks',34872,'Goyettestad','Montana','Yemen'),(31,891,'Humberto Cape',46209,'Batzville','Hawaii','Belize'),(32,126,'Hill Brook',12558,'Bechtelarberg','Indiana','Turkmenistan'),(33,297,'Ankunding Isle',21915,'Filomenaville','Florida','New Zealand'),(34,867,'Elaina Park',20850,'Port Beverlyhaven','Illinois','Western Sahara'),(35,398,'Botsford Lakes',58702,'West Pattieton','Illinois','Tuvalu'),(36,855,'Vita Islands',8187,'Huelmouth','Kansas','Kazakhstan'),(37,204,'Maud Well',78705,'Hermanntown','New Mexico','Faroe Islands'),(38,685,'Nicolas Ville',14268,'Julesstad','Mississippi','Uzbekistan'),(39,19,'Dario Pass',82551,'Lake Alisaborough','Maryland','Croatia'),(40,85,'Mosciski Street',15283,'Lake Marlon','South Carolina','Brazil'),(41,537,'Turner Turnpike',21519,'Lake Shayne','New York','Belize'),(42,875,'King Hills',77769,'Lake Elyse','Illinois','Greece'),(43,660,'Jaskolski Plains',78756,'New Stephon','Alabama','Moldova'),(44,512,'Jaunita Overpass',95834,'North Kathryne','South Dakota','Uganda'),(45,176,'Keeling Road',18149,'Port Zacharyside','Florida','Turkey'),(46,501,'Hyman Parkway',94946,'Dietrichmouth','Arizona','Taiwan'),(47,851,'Ryan Mews',97241,'Parisianville','Illinois','Switzerland'),(48,271,'Greenholt Highway',53944,'Schmittview','Colorado','Fiji'),(49,266,'Glenda Stravenue',62529,'Magnoliafort','Nevada','Cambodia'),(50,679,'Schamberger Inlet',33068,'Lake Laurieport','Vermont','French Polynesia'),(51,820,'Corkery Tunnel',45723,'Lake Hettiefurt','District of Columbia','Central African Republic'),(52,704,'Tom Neck',20811,'Blickbury','Mississippi','Andorra'),(53,826,'Ryan Well',59194,'East Sarina','Tennessee','United Kingdom'),(54,122,'Elinor Club',42126,'Wunschfort','West Virginia','Aruba'),(55,481,'Cummerata Station',98961,'Baronport','Colorado','Greenland'),(56,729,'Kuhic Spur',66338,'New Betty','South Dakota','Fiji'),(57,425,'Makenna Spring',68559,'Michealport','Washington','Oman'),(58,717,'Verner Throughway',12235,'Lake Kurtisfurt','Connecticut','Reunion'),(59,453,'Gorczany Bypass',8645,'Reinafurt','Delaware','Marshall Islands'),(60,786,'Buck Lights',80874,'North Julietport','Nebraska','Peru'),(61,732,'Corwin Lane',27656,'Amandaville','Mississippi','Comoros'),(62,315,'Cole Glens',70707,'Reillyburgh','Alaska','Cuba'),(63,628,'Ava Lodge',90756,'Cortezhaven','Utah','Sudan'),(64,552,'Clair Light',60579,'North Mozellmouth','Rhode Island','Belize'),(65,860,'Cormier Fords',63411,'Adellatown','Kansas','British Virgin Islands'),(66,320,'Schuster Wells',22001,'Sipesside','Oklahoma','Saint Vincent and the Grenadines'),(67,365,'Dickens Haven',72084,'South Taylorside','Tennessee','Philippines'),(68,686,'Reyna Cliff',86736,'Port Keelyview','Montana','Mauritius'),(69,4,'Gerhold Rest',15198,'Mullerview','Mississippi','China'),(70,711,'Laverne Island',86375,'Weissnatland','Iowa','Kiribati'),(71,88,'Cloyd Inlet',22918,'Durwardborough','Florida','Malawi'),(72,154,'Hoeger Village',47319,'New Clovisport','Montana','Portugal'),(73,554,'Nadia Mountain',26802,'Elzahaven','Vermont','Norfolk Island'),(74,704,'Lynn Isle',6412,'West Horacehaven','Texas','Malaysia'),(75,315,'Fritsch Falls',55415,'Port Wellingtonbury','Illinois','Tunisia'),(76,401,'Torphy Garden',16878,'Marielleside','California','Switzerland'),(77,790,'Dameon Place',8497,'West Alexannefort','North Dakota','United States Virgin Islands'),(78,10,'Tessie Trace',47316,'Port Lisetteville','North Carolina','Cook Islands'),(79,858,'Marks Shores',47900,'Darrylberg','Alabama','Zimbabwe'),(80,483,'Titus Summit',70694,'Zitabury','Kansas','New Zealand'),(81,620,'Jamir Points',44229,'Dahliamouth','Idaho','Heard Island and McDonald Islands'),(82,100,'Brandt Plains',59122,'Ulicesside','Wyoming','Saint Kitts and Nevis'),(83,429,'Hansen Shoal',45438,'New Joaniemouth','New Jersey','Jordan'),(84,363,'Wellington Groves',40770,'Leraburgh','Wisconsin','Costa Rica'),(85,302,'Ada Camp',30613,'Lake Ryley','Virginia','India'),(86,504,'Danyka Drive',20882,'Douglasstad','Rhode Island','Guadeloupe'),(87,605,'Wilderman Ports',55209,'Norvalside','South Carolina','Isle of Man'),(88,693,'Flossie Haven',30992,'Port Vitaside','Hawaii','Botswana'),(89,809,'Feeney Villages',4320,'Germainebury','Tennessee','Philippines'),(90,63,'Boyle Trail',98755,'Lake Avisburgh','Virginia','Czech Republic'),(91,663,'Noelia Run',49383,'Henriettetown','Texas','Gibraltar'),(92,775,'Bode Trafficway',23104,'Lake Alyssonview','Alaska','Morocco'),(93,338,'Goodwin Pine',34587,'East Randalside','Pennsylvania','Tuvalu'),(94,176,'Gottlieb Circles',96409,'Howellborough','Colorado','Greece'),(95,792,'Swaniawski Road',23676,'Pagacchester','West Virginia','Ukraine'),(96,579,'Curt Cliffs',74534,'Port Brycen','Wyoming','Nepal'),(97,653,'Wyman Forest',31236,'North Bernadinestad','South Dakota','Croatia'),(98,275,'Bryana Ports',41768,'North Parisbury','North Dakota','Somalia'),(99,118,'Lebsack Isle',40289,'O\'Haraberg','Nebraska','Mongolia'),(100,589,'Verna Forest',2727,'Lottieburgh','North Carolina','Brazil'),(101,509,'Roob Place',20501,'Port Kennith','Tennessee','China'),(102,794,'Reyes Mission',81076,'West Celia','Rhode Island','Venezuela'),(103,240,'Monica Ramp',31386,'East Gayport','Hawaii','French Polynesia'),(104,395,'Eugene Court',99670,'O\'Connerburgh','Idaho','Benin'),(105,646,'Tamia Port',26266,'North Chadhaven','Oregon','Cameroon'),(106,171,'Noah Vista',51651,'East Asia','Oklahoma','Uruguay'),(107,109,'Mraz Common',12087,'Port Gracielatown','Washington','Ghana'),(108,754,'Rau Corner',48304,'Leuschkeside','Rhode Island','Finland'),(109,424,'Green Knoll',52197,'North Nicolefurt','Wyoming','Canada'),(110,861,'Eichmann Freeway',91131,'Lake Marianna','District of Columbia','Sao Tome and Principe'),(111,456,'Ledner Mount',15322,'Douglasland','Arkansas','Nigeria'),(112,434,'Estrella Burg',5544,'Elvaview','Oregon','Montserrat'),(113,653,'Norris Lock',98864,'North Pamelaborough','Massachusetts','Puerto Rico'),(114,668,'Mills Land',67916,'Port Jovanmouth','Delaware','Yemen'),(115,779,'Bradtke Common',91009,'New Broderick','Delaware','South Africa'),(116,546,'Johnson Wall',88308,'Jenkinston','Wyoming','Equatorial Guinea'),(117,759,'Jayme Villages',44047,'South Rachelle','Georgia','Tunisia'),(118,861,'Montana Estate',15663,'North Arlene','South Dakota','Mayotte'),(119,829,'Clementina Key',12924,'Vedaland','Alabama','Somalia'),(120,555,'Aurore Valley',10267,'South Hughbury','Kansas','Nicaragua'),(121,20,'Koepp Key',75465,'Hermannhaven','California','Latvia'),(122,16,'Clementina Spurs',63997,'Lake Franceshaven','California','Samoa'),(123,308,'Abdiel Via',22884,'Parkermouth','Kansas','Botswana'),(124,286,'Bill Ranch',76520,'Leannmouth','District of Columbia','Madagascar'),(125,292,'Karelle Fords',52053,'North Olga','Wisconsin','Mali'),(126,561,'Hudson Ways',75827,'Port Luz','Illinois','Saint Lucia'),(127,102,'Edison Shore',90519,'Kyleestad','Maryland','Cook Islands'),(128,653,'Nicolas Alley',77981,'Wolffmouth','Colorado','Korea'),(129,718,'Hintz Junction',13079,'West Pasqualemouth','North Dakota','Dominica'),(130,557,'Von Ramp',50395,'Lake Courtney','Arizona','Uganda'),(131,834,'Goyette Bypass',34201,'East Mabelle','Florida','Tanzania'),(132,163,'Marcelina Roads',40932,'North Jamirshire','Maryland','Peru'),(133,452,'Wyman Spurs',24369,'South Coleman','North Dakota','Azerbaijan'),(134,208,'Carmen Common',51628,'West Bradleytown','Connecticut','Guinea'),(135,169,'Cruickshank Via',85043,'Hudsonbury','Iowa','Sri Lanka'),(136,573,'Nikolaus Villages',95617,'Lake Mireya','Illinois','Vanuatu'),(137,306,'Steuber Hills',98783,'Kilbackshire','Washington','Hungary'),(138,514,'Baumbach Underpass',49774,'Pourosburgh','Hawaii','Turkey');
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
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden_words` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962A2A4DB562` (`activities_id`),
  KEY `IDX_5F9E962AB83297E7` (`reservation_id`),
  CONSTRAINT `FK_5F9E962A2A4DB562` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `FK_5F9E962AB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
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
INSERT INTO `disponibility` VALUES (1,1,'2021-02-24 00:00:00'),(2,1,'2021-02-25 00:00:00'),(3,1,'2021-02-26 00:00:00'),(4,1,'2021-02-27 00:00:00'),(5,1,'2021-02-28 00:00:00'),(6,1,'2021-03-01 00:00:00'),(7,1,'2021-03-02 00:00:00'),(8,1,'2021-03-03 00:00:00'),(9,1,'2021-03-04 00:00:00'),(10,1,'2021-03-05 00:00:00'),(11,1,'2021-03-06 00:00:00'),(12,1,'2021-03-07 00:00:00'),(13,1,'2021-03-08 00:00:00'),(14,1,'2021-03-09 00:00:00'),(15,1,'2021-03-10 00:00:00'),(16,1,'2021-03-11 00:00:00'),(17,1,'2021-03-12 00:00:00'),(18,1,'2021-03-13 00:00:00'),(19,1,'2021-03-14 00:00:00'),(20,1,'2021-03-15 00:00:00'),(21,2,'2021-02-24 00:00:00'),(22,3,'2021-02-25 00:00:00'),(23,4,'2021-02-26 00:00:00'),(24,5,'2021-02-27 00:00:00'),(25,6,'2021-02-28 00:00:00'),(26,7,'2021-03-01 00:00:00'),(27,8,'2021-03-02 00:00:00'),(28,9,'2021-03-03 00:00:00'),(29,10,'2021-03-04 00:00:00'),(30,11,'2021-03-05 00:00:00'),(31,12,'2021-03-06 00:00:00'),(32,13,'2021-03-07 00:00:00'),(33,14,'2021-03-08 00:00:00'),(34,15,'2021-03-09 00:00:00'),(35,16,'2021-03-10 00:00:00'),(36,17,'2021-03-11 00:00:00'),(37,18,'2021-03-12 00:00:00'),(38,19,'2021-03-13 00:00:00'),(39,20,'2021-03-14 00:00:00'),(40,21,'2021-03-15 00:00:00'),(41,22,'2021-03-16 00:00:00'),(42,23,'2021-03-17 00:00:00'),(43,24,'2021-03-18 00:00:00'),(44,25,'2021-03-19 00:00:00'),(45,26,'2021-03-20 00:00:00'),(46,27,'2021-03-21 00:00:00'),(47,28,'2021-03-22 00:00:00'),(48,29,'2021-03-23 00:00:00'),(49,30,'2021-03-24 00:00:00'),(50,31,'2021-03-25 00:00:00'),(51,33,'2021-02-24 23:16:37'),(52,34,'2021-03-24 23:16:37'),(53,35,'2021-04-24 23:16:37'),(54,36,'2021-05-24 23:16:37'),(55,37,'2021-06-24 23:16:37'),(56,38,'2021-07-24 23:16:37'),(57,39,'2021-08-24 23:16:37'),(58,40,'2021-09-24 23:16:37'),(59,41,'2021-10-24 23:16:37'),(60,42,'2021-11-24 23:16:37'),(61,43,'2021-12-24 23:16:37'),(62,44,'2022-01-24 23:16:37'),(63,45,'2022-02-24 23:16:37'),(64,46,'2022-03-24 23:16:37'),(65,47,'2022-04-24 23:16:37'),(66,48,'2022-05-24 23:16:37'),(67,49,'2022-06-24 23:16:37'),(68,50,'2022-07-24 23:16:37'),(69,51,'2022-08-24 23:16:37'),(70,52,'2022-09-24 23:16:37'),(71,53,'2022-10-24 23:16:37'),(72,54,'2022-11-24 23:16:37'),(73,55,'2022-12-24 23:16:37'),(74,56,'2023-01-24 23:16:37'),(75,57,'2023-02-24 23:16:37'),(76,58,'2023-03-24 23:16:37'),(77,59,'2023-04-24 23:16:37'),(78,60,'2023-05-24 23:16:37'),(79,61,'2023-06-24 23:16:37'),(80,62,'2023-07-24 23:16:37'),(81,32,'2021-02-24 23:16:37'),(82,32,'2021-03-24 23:16:37'),(83,32,'2021-04-24 23:16:37'),(84,32,'2021-05-24 23:16:37'),(85,32,'2021-06-24 23:16:37'),(86,32,'2021-07-24 23:16:37'),(87,32,'2021-08-24 23:16:37'),(88,32,'2021-09-24 23:16:37'),(89,32,'2021-10-24 23:16:37'),(90,32,'2021-11-24 23:16:37'),(91,32,'2021-12-24 23:16:37'),(92,32,'2022-01-24 23:16:37'),(93,32,'2022-02-24 23:16:37'),(94,32,'2022-03-24 23:16:37'),(95,32,'2022-04-24 23:16:37'),(96,32,'2022-05-24 23:16:37'),(97,32,'2022-06-24 23:16:37'),(98,32,'2022-07-24 23:16:37'),(99,32,'2022-08-24 23:16:37'),(100,32,'2022-09-24 23:16:37'),(101,64,'2021-02-24 00:00:00'),(102,65,'2021-02-25 00:00:00'),(103,66,'2021-02-26 00:00:00'),(104,67,'2021-02-27 00:00:00'),(105,68,'2021-02-28 00:00:00'),(106,69,'2021-03-01 00:00:00'),(107,70,'2021-03-02 00:00:00'),(108,71,'2021-03-03 00:00:00'),(109,72,'2021-03-04 00:00:00'),(110,73,'2021-03-05 00:00:00'),(111,74,'2021-03-06 00:00:00'),(112,75,'2021-03-07 00:00:00'),(113,76,'2021-03-08 00:00:00'),(114,77,'2021-03-09 00:00:00'),(115,78,'2021-03-10 00:00:00'),(116,79,'2021-03-11 00:00:00'),(117,80,'2021-03-12 00:00:00'),(118,81,'2021-03-13 00:00:00'),(119,82,'2021-03-14 00:00:00'),(120,83,'2021-03-15 00:00:00'),(121,84,'2021-03-16 00:00:00'),(122,85,'2021-03-17 00:00:00'),(123,86,'2021-03-18 00:00:00'),(124,87,'2021-03-19 00:00:00'),(125,88,'2021-03-20 00:00:00'),(126,89,'2021-03-21 00:00:00'),(127,90,'2021-03-22 00:00:00'),(128,91,'2021-03-23 00:00:00'),(129,92,'2021-03-24 00:00:00'),(130,93,'2021-03-25 00:00:00'),(131,94,'2021-02-24 23:16:37'),(132,94,'2021-03-24 23:16:37'),(133,94,'2021-04-24 23:16:37'),(134,94,'2021-05-24 23:16:37'),(135,94,'2021-06-24 23:16:37'),(136,94,'2021-07-24 23:16:37'),(137,94,'2021-08-24 23:16:37'),(138,94,'2021-09-24 23:16:37'),(139,94,'2021-10-24 23:16:37'),(140,94,'2021-11-24 23:16:37'),(141,94,'2021-12-24 23:16:37'),(142,94,'2022-01-24 23:16:37'),(143,94,'2022-02-24 23:16:37'),(144,94,'2022-03-24 23:16:37'),(145,94,'2022-04-24 23:16:37'),(146,94,'2022-05-24 23:16:37'),(147,94,'2022-06-24 23:16:37'),(148,94,'2022-07-24 23:16:37'),(149,94,'2022-08-24 23:16:37'),(150,94,'2022-09-24 23:16:37'),(151,95,'2021-02-24 00:00:00'),(152,96,'2021-02-25 00:00:00'),(153,97,'2021-02-26 00:00:00'),(154,98,'2021-02-27 00:00:00'),(155,99,'2021-02-28 00:00:00'),(156,100,'2021-03-01 00:00:00'),(157,101,'2021-03-02 00:00:00'),(158,102,'2021-03-03 00:00:00'),(159,103,'2021-03-04 00:00:00'),(160,104,'2021-03-05 00:00:00'),(161,105,'2021-03-06 00:00:00'),(162,106,'2021-03-07 00:00:00'),(163,107,'2021-03-08 00:00:00'),(164,108,'2021-03-09 00:00:00'),(165,109,'2021-03-10 00:00:00'),(166,110,'2021-03-11 00:00:00'),(167,111,'2021-03-12 00:00:00'),(168,112,'2021-03-13 00:00:00'),(169,113,'2021-03-14 00:00:00'),(170,114,'2021-03-15 00:00:00'),(171,115,'2021-03-16 00:00:00'),(172,116,'2021-03-17 00:00:00'),(173,117,'2021-03-18 00:00:00'),(174,118,'2021-03-19 00:00:00'),(175,119,'2021-03-20 00:00:00'),(176,120,'2021-03-21 00:00:00'),(177,121,'2021-03-22 00:00:00'),(178,122,'2021-03-23 00:00:00'),(179,123,'2021-03-24 00:00:00'),(180,124,'2021-03-25 00:00:00'),(181,125,'2021-02-24 23:16:37'),(182,125,'2021-03-24 23:16:37'),(183,125,'2021-04-24 23:16:37'),(184,125,'2021-05-24 23:16:37'),(185,125,'2021-06-24 23:16:37'),(186,125,'2021-07-24 23:16:37'),(187,125,'2021-08-24 23:16:37'),(188,125,'2021-09-24 23:16:37'),(189,125,'2021-10-24 23:16:37'),(190,125,'2021-11-24 23:16:37'),(191,125,'2021-12-24 23:16:37'),(192,125,'2022-01-24 23:16:37'),(193,125,'2022-02-24 23:16:37'),(194,125,'2022-03-24 23:16:37'),(195,125,'2022-04-24 23:16:37'),(196,125,'2022-05-24 23:16:37'),(197,125,'2022-06-24 23:16:37'),(198,125,'2022-07-24 23:16:37'),(199,125,'2022-08-24 23:16:37'),(200,125,'2022-09-24 23:16:37'),(201,125,'2021-02-24 23:16:37'),(202,125,'2021-03-24 23:16:37'),(203,125,'2021-04-24 23:16:37'),(204,125,'2021-05-24 23:16:37'),(205,125,'2021-06-24 23:16:37'),(206,125,'2021-07-24 23:16:37'),(207,125,'2021-08-24 23:16:37'),(208,125,'2021-09-24 23:16:37'),(209,125,'2021-10-24 23:16:37'),(210,125,'2021-11-24 23:16:37'),(211,125,'2021-12-24 23:16:37'),(212,125,'2022-01-24 23:16:37'),(213,125,'2022-02-24 23:16:37'),(214,125,'2022-03-24 23:16:37'),(215,125,'2022-04-24 23:16:37'),(216,125,'2022-05-24 23:16:37'),(217,125,'2022-06-24 23:16:37'),(218,125,'2022-07-24 23:16:37'),(219,125,'2022-08-24 23:16:37'),(220,125,'2022-09-24 23:16:37'),(221,135,'2021-02-24 00:00:00'),(222,135,'2021-02-25 00:00:00'),(223,135,'2021-02-26 00:00:00'),(224,135,'2021-02-27 00:00:00'),(225,135,'2021-02-28 00:00:00'),(226,135,'2021-03-01 00:00:00'),(227,135,'2021-03-02 00:00:00'),(228,135,'2021-03-03 00:00:00'),(229,135,'2021-03-04 00:00:00'),(230,135,'2021-03-05 00:00:00'),(231,135,'2021-03-06 00:00:00'),(232,135,'2021-03-07 00:00:00'),(233,135,'2021-03-08 00:00:00'),(234,135,'2021-03-09 00:00:00'),(235,135,'2021-03-10 00:00:00'),(236,135,'2021-03-11 00:00:00'),(237,135,'2021-03-12 00:00:00'),(238,135,'2021-03-13 00:00:00'),(239,135,'2021-03-14 00:00:00'),(240,135,'2021-03-15 00:00:00'),(241,136,'2021-02-24 23:16:37'),(242,136,'2021-03-24 23:16:37'),(243,136,'2021-04-24 23:16:37'),(244,136,'2021-05-24 23:16:37'),(245,136,'2021-06-24 23:16:37'),(246,136,'2021-07-24 23:16:37'),(247,136,'2021-08-24 23:16:37'),(248,136,'2021-09-24 23:16:37'),(249,136,'2021-10-24 23:16:37'),(250,136,'2021-11-24 23:16:37'),(251,136,'2021-12-24 23:16:37'),(252,136,'2022-01-24 23:16:37'),(253,136,'2022-02-24 23:16:37'),(254,136,'2022-03-24 23:16:37'),(255,136,'2022-04-24 23:16:37'),(256,136,'2022-05-24 23:16:37'),(257,136,'2022-06-24 23:16:37'),(258,136,'2022-07-24 23:16:37'),(259,136,'2022-08-24 23:16:37'),(260,136,'2022-09-24 23:16:37'),(261,137,'2021-02-24 23:16:37'),(262,137,'2021-03-03 23:16:37'),(263,137,'2021-03-10 23:16:37'),(264,137,'2021-03-17 23:16:37'),(265,137,'2021-03-24 23:16:37'),(266,137,'2021-03-31 23:16:37'),(267,137,'2021-04-07 23:16:37'),(268,137,'2021-04-14 23:16:37'),(269,137,'2021-04-21 23:16:37'),(270,137,'2021-04-28 23:16:37'),(271,138,'2021-02-24 23:16:37'),(272,138,'2021-03-03 23:16:37'),(273,138,'2021-03-10 23:16:37'),(274,138,'2021-03-17 23:16:37'),(275,138,'2021-03-24 23:16:37'),(276,138,'2021-03-31 23:16:37'),(277,138,'2021-04-07 23:16:37'),(278,138,'2021-04-14 23:16:37'),(279,138,'2021-04-21 23:16:37'),(280,138,'2021-04-28 23:16:37');
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
INSERT INTO `equipment` VALUES (1,0,1,1,0,1,1);
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
INSERT INTO `pictures` VALUES (1,NULL,138,NULL,'https://lorempixel.com/640/300/?84780',650,'s:14:\"en modération\";',NULL,NULL),(2,NULL,NULL,NULL,'https://lorempixel.com/640/300/?42372',650,'s:14:\"en modération\";',NULL,NULL),(3,NULL,NULL,2,'https://lorempixel.com/640/300/?62975',650,'s:14:\"en modération\";',NULL,NULL);
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
INSERT INTO `property` VALUES (1,1,2,1,1,'cabane dans les abres','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(2,1,2,1,2,'cabane dans les abres 0','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(3,1,2,1,3,'cabane dans les abres 1','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(4,1,2,1,4,'cabane dans les abres 2','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(5,1,2,1,5,'cabane dans les abres 3','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(6,1,2,1,6,'cabane dans les abres 4','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(7,1,2,1,7,'cabane dans les abres 5','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(8,1,2,1,8,'cabane dans les abres 6','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(9,1,2,1,9,'cabane dans les abres 7','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(10,1,2,1,10,'cabane dans les abres 8','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(11,1,2,1,11,'cabane dans les abres 9','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(12,1,2,1,12,'cabane dans les abres 10','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(13,1,2,1,13,'cabane dans les abres 11','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(14,1,2,1,14,'cabane dans les abres 12','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(15,1,2,1,15,'cabane dans les abres 13','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(16,1,2,1,16,'cabane dans les abres 14','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(17,1,2,1,17,'cabane dans les abres 15','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(18,1,2,1,18,'cabane dans les abres 16','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(19,1,2,1,19,'cabane dans les abres 17','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(20,1,2,1,20,'cabane dans les abres 18','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(21,1,2,1,21,'cabane dans les abres 19','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(22,1,2,1,22,'cabane dans les abres 20','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(23,1,2,1,23,'cabane dans les abres 21','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(24,1,2,1,24,'cabane dans les abres 22','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(25,1,2,1,25,'cabane dans les abres 23','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(26,1,2,1,26,'cabane dans les abres 24','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(27,1,2,1,27,'cabane dans les abres 25','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(28,1,2,1,28,'cabane dans les abres 26','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(29,1,2,1,29,'cabane dans les abres 27','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(30,1,2,1,30,'cabane dans les abres 28','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(31,1,2,1,31,'cabane dans les abres 29','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(32,2,10,1,32,'cabane sur l\'eau','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(33,1,10,1,33,'cabane sur l\'eau 0','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(34,1,10,1,34,'cabane sur l\'eau 1','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(35,1,10,1,35,'cabane sur l\'eau 2','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(36,1,10,1,36,'cabane sur l\'eau 3','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(37,1,10,1,37,'cabane sur l\'eau 4','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(38,1,10,1,38,'cabane sur l\'eau 5','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(39,1,10,1,39,'cabane sur l\'eau 6','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(40,1,10,1,40,'cabane sur l\'eau 7','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(41,1,10,1,41,'cabane sur l\'eau 8','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(42,1,10,1,42,'cabane sur l\'eau 9','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(43,1,10,1,43,'cabane sur l\'eau 10','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(44,1,10,1,44,'cabane sur l\'eau 11','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(45,1,10,1,45,'cabane sur l\'eau 12','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(46,1,10,1,46,'cabane sur l\'eau 13','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(47,1,10,1,47,'cabane sur l\'eau 14','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(48,1,10,1,48,'cabane sur l\'eau 15','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(49,1,10,1,49,'cabane sur l\'eau 16','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(50,1,10,1,50,'cabane sur l\'eau 17','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(51,1,10,1,51,'cabane sur l\'eau 18','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(52,1,10,1,52,'cabane sur l\'eau 19','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(53,1,10,1,53,'cabane sur l\'eau 20','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(54,1,10,1,54,'cabane sur l\'eau 21','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(55,1,10,1,55,'cabane sur l\'eau 22','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(56,1,10,1,56,'cabane sur l\'eau 23','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(57,1,10,1,57,'cabane sur l\'eau 24','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(58,1,10,1,58,'cabane sur l\'eau 25','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(59,1,10,1,59,'cabane sur l\'eau 26','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(60,1,10,1,60,'cabane sur l\'eau 27','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(61,1,10,1,61,'cabane sur l\'eau 28','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(62,1,10,1,62,'cabane sur l\'eau 29','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(63,8,10,1,63,'bulle','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(64,1,10,1,64,'bulle0','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(65,1,10,1,65,'bulle1','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(66,1,10,1,66,'bulle2','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(67,1,10,1,67,'bulle3','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(68,1,10,1,68,'bulle4','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(69,1,10,1,69,'bulle5','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(70,1,10,1,70,'bulle6','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(71,1,10,1,71,'bulle7','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(72,1,10,1,72,'bulle8','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(73,1,10,1,73,'bulle9','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(74,1,10,1,74,'bulle10','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(75,1,10,1,75,'bulle11','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(76,1,10,1,76,'bulle12','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(77,1,10,1,77,'bulle13','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(78,1,10,1,78,'bulle14','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(79,1,10,1,79,'bulle15','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(80,1,10,1,80,'bulle16','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(81,1,10,1,81,'bulle17','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(82,1,10,1,82,'bulle18','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(83,1,10,1,83,'bulle19','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(84,1,10,1,84,'bulle20','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(85,1,10,1,85,'bulle21','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(86,1,10,1,86,'bulle22','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(87,1,10,1,87,'bulle23','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(88,1,10,1,88,'bulle24','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(89,1,10,1,89,'bulle25','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(90,1,10,1,90,'bulle26','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(91,1,10,1,91,'bulle27','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(92,1,10,1,92,'bulle28','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(93,1,10,1,93,'bulle29','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(94,9,10,1,94,'tipi','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',0,0.2,'draft'),(95,1,10,1,95,'bulle0','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(96,1,10,1,96,'bulle1','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(97,1,10,1,97,'bulle2','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(98,1,10,1,98,'bulle3','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(99,1,10,1,99,'bulle4','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(100,1,10,1,100,'bulle5','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(101,1,10,1,101,'bulle6','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(102,1,10,1,102,'bulle7','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(103,1,10,1,103,'bulle8','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(104,1,10,1,104,'bulle9','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(105,1,10,1,105,'bulle10','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(106,1,10,1,106,'bulle11','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(107,1,10,1,107,'bulle12','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(108,1,10,1,108,'bulle13','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(109,1,10,1,109,'bulle14','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(110,1,10,1,110,'bulle15','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(111,1,10,1,111,'bulle16','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(112,1,10,1,112,'bulle17','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(113,1,10,1,113,'bulle18','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(114,1,10,1,114,'bulle19','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(115,1,10,1,115,'bulle20','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(116,1,10,1,116,'bulle21','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(117,1,10,1,117,'bulle22','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(118,1,10,1,118,'bulle23','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(119,1,10,1,119,'bulle24','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(120,1,10,1,120,'bulle25','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(121,1,10,1,121,'bulle26','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(122,1,10,1,122,'bulle27','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(123,1,10,1,123,'bulle28','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(124,1,10,1,124,'bulle29','très belle bulle. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(125,6,10,1,125,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(126,4,10,1,126,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(127,4,10,1,127,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(128,4,10,1,128,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(129,4,10,1,129,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(130,4,10,1,130,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(131,4,10,1,131,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(132,4,10,1,132,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(133,4,10,1,133,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(134,4,10,1,134,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(135,4,10,1,135,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(136,3,2,1,136,'yourtes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(137,6,2,1,137,'inclassables','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(138,5,2,1,138,'bateaux','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft');
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
  `type_value_id` int DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_73A85B9334DF9C5E` (`type_value_id`),
  CONSTRAINT `FK_73A85B9334DF9C5E` FOREIGN KEY (`type_value_id`) REFERENCES `type_value` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propriete`
--

LOCK TABLES `propriete` WRITE;
/*!40000 ALTER TABLE `propriete` DISABLE KEYS */;
INSERT INTO `propriete` VALUES (1,3,'profondeur de la cabane',1,'string'),(2,2,'barbecue',0,'booleen'),(3,1,'lit supplémentaire',0,'integer');
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
  `propriete_id` int DEFAULT NULL,
  `type_property_id` int DEFAULT NULL,
  `valeur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8784F39F18566CAF` (`propriete_id`),
  KEY `IDX_8784F39F1F8BC47D` (`type_property_id`),
  KEY `IDX_8784F39F4DAAD26` (`valeur_id`),
  CONSTRAINT `FK_8784F39F18566CAF` FOREIGN KEY (`propriete_id`) REFERENCES `propriete` (`id`),
  CONSTRAINT `FK_8784F39F1F8BC47D` FOREIGN KEY (`type_property_id`) REFERENCES `type_property` (`id`),
  CONSTRAINT `FK_8784F39F4DAAD26` FOREIGN KEY (`valeur_id`) REFERENCES `valeur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propriete_type_property`
--

LOCK TABLES `propriete_type_property` WRITE;
/*!40000 ALTER TABLE `propriete_type_property` DISABLE KEYS */;
INSERT INTO `propriete_type_property` VALUES (1,1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,4,32,'2021-02-25 00:00:00','2021-03-01 00:00:00',600,3,1,'[]','[]','en attente','tok_1IHxljKzuq8ewRYyYBlC0GSz'),(2,4,1,'2021-03-01 23:16:37','2021-03-31 23:16:37',1200,3,0,'[]','[]','rejetee','tok_1IHxljKzuq8ewRYyYBlC0GSz'),(3,4,125,'2021-01-01 23:16:37','2021-02-17 23:16:37',12000,3,1,'[]','[]','acceptee','tok_1IHxljKzuq8ewRYyYBlC0GSz');
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
-- Table structure for table `type_value`
--

DROP TABLE IF EXISTS `type_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_value` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_value`
--

LOCK TABLES `type_value` WRITE;
/*!40000 ALTER TABLE `type_value` DISABLE KEYS */;
INSERT INTO `type_value` VALUES (1,'entier'),(2,'booleen'),(3,'string');
/*!40000 ALTER TABLE `type_value` ENABLE KEYS */;
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
  `phone` int DEFAULT NULL,
  `roles` json NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` boolean COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO api.`user` (email,password,phone,roles,first_name,last_name, is_verified) VALUES
	 ('admin@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$yevzIhWbysZGEtzEYuNkCw$49gOd3Qu4qxTaU0E9TQux+zYBByZDpfbIlmm98q3vi8','975653132','["ROLE_ADMIN"]','Marc','Mahe', false),
	 ('proprio@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$5DPgrObwgyMzC349dOnf0w$d9XtKPM7grQ14N+BBDraOP/aubYngMJ1lEWLa6fFbVg','33','["ROLE_PROPRIO"]','Clémence','Fleury', false),
	 ('proprio2@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$jq8dbHnG76yY1GkPzUvfeQ$EP+0DCQ9nqRkEPdbFtRFYQNl5yA5y9CcUF0Dx1Ug06U','4','["ROLE_PROPRIO"]','Victoire','Colin', false),
	 ('proprio1@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$UGi5AMDzF8ssgzlK0TmTEw$ArYHIfyvAWRLE4AGAHQ3IZNF93T+NmW27Qu+Ar5aonE','33','["ROLE_PROPRIO"]','Patricia','Poirier', false),
	 ('locataire@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$UboiQLaa+NG4Qk7BUmqkGg$dcxb/J/nnaSAR+8yfkOzkklj4aJfP8n/NR/2zV2tsrY','751955225','["ROLE_USER"]','Yves','Pruvost', false),
	 ('user0@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$2RkoyuLoh/FEkJ96G7Z+qg$L6WsziuBoXQdQjXWSOgXEB54HtNZ2OZRJzTWE3SOOlc','33','["ROLE_USER"]','Nicolas','Cohen', false),
	 ('user1@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$5w/Sd2/GhijRJTBKWxX9nA$oR1ZDnt2SvH8xeBj0PXR9oUDx2hMyJUftQ8ngBB/nfQ','33','["ROLE_ADMIN"]','Aurore','Blot', false),
	 ('user2@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$usOYh2+0zDk2MNKK50NSSQ$CaAHA1F6y53r9MqC7JqN2EcYzqhFDslUEvr5uCtXbdY','33','["ROLE_USER"]','Éléonore','Lecomte', false),
	 ('user3@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$2Z7ZpR9wRTxkFtemrt5iSA$mAy9ywm3uC3mu+Fu8/1g2Xdi0rm5aNL7YYqqVPceAL0','33','["ROLE_USER"]','Élodie','Benoit', false),
	 ('user4@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$ORc3zqOtgU/SQxwfpGTQxQ$HVEDNk3SE4ZmkEf6q/UQIkjOl6wdrQhyVN4lvQQr7L0','7','["ROLE_USER"]','Guillaume','Becker', false);
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
  `property_id` int NOT NULL,
  `valeur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1B44CD51549213EC` (`property_id`),
  CONSTRAINT `FK_1B44CD51549213EC` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valeur`
--

LOCK TABLES `valeur` WRITE;
/*!40000 ALTER TABLE `valeur` DISABLE KEYS */;
INSERT INTO `valeur` VALUES (1,1,'5');
/*!40000 ALTER TABLE `valeur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-24 23:32:03
