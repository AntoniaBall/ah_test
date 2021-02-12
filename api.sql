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
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'centre d\'equitation proche du logement','Equitation'),(2,'centre d\'equitation proche du logement','natation'),(3,'Lorem ipsum dolor sit amet','0 Activity'),(4,'Lorem ipsum dolor sit amet','1 Activity'),(5,'Lorem ipsum dolor sit amet','2 Activity'),(6,'Lorem ipsum dolor sit amet','3 Activity'),(7,'Lorem ipsum dolor sit amet','4 Activity'),(8,'Lorem ipsum dolor sit amet','5 Activity'),(9,'Lorem ipsum dolor sit amet','6 Activity'),(10,'Lorem ipsum dolor sit amet','7 Activity'),(11,'Lorem ipsum dolor sit amet','8 Activity'),(12,'Lorem ipsum dolor sit amet','9 Activity');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `activities_property`
--

LOCK TABLES `activities_property` WRITE;
/*!40000 ALTER TABLE `activities_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,169,'Gilda Harbors',92864,'Dewaynechester','California','Seychelles'),(2,87,'Ondricka Oval',48896,'Londonborough','Idaho','Greenland'),(3,155,'Chanel Landing',83371,'New Ora','Illinois','Cambodia'),(4,59,'Kutch Freeway',86205,'East Hal','Kansas','Saint Pierre and Miquelon'),(5,837,'Federico Mills',34073,'Lake Sigurd','New Mexico','Maldives'),(6,166,'Prosacco Path',45167,'Fanniemouth','Nebraska','Mauritius'),(7,275,'Watsica Lock',24519,'Armanimouth','Illinois','Belgium'),(8,344,'Alysa Alley',88229,'Nicholemouth','Connecticut','Iraq'),(9,568,'Dell Curve',77783,'South Ally','Massachusetts','Faroe Islands');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (1,1,1,0,0,1,0);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `indisponibility`
--

LOCK TABLES `indisponibility` WRITE;
/*!40000 ALTER TABLE `indisponibility` DISABLE KEYS */;
INSERT INTO `indisponibility` VALUES (1,1,'2020-01-01 00:00:00','2020-01-11 00:00:00');
/*!40000 ALTER TABLE `indisponibility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,NULL,9,NULL,'https://lorempixel.com/640/300/?69213',650,'s:14:\"en modération\";',NULL,NULL),(2,NULL,NULL,NULL,'https://lorempixel.com/640/300/?73922',650,'s:14:\"en modération\";',NULL,NULL),(3,NULL,NULL,2,'https://lorempixel.com/640/300/?42669',650,'s:14:\"en modération\";',NULL,NULL),(4,NULL,NULL,NULL,'https://lorempixel.com/640/300/?28342',650,'s:14:\"en modération\";',NULL,NULL),(5,NULL,NULL,NULL,'https://lorempixel.com/640/300/?52164',650,'s:14:\"en modération\";',NULL,NULL),(6,NULL,NULL,NULL,'https://lorempixel.com/640/300/?50754',650,'s:14:\"en modération\";',NULL,NULL),(7,NULL,NULL,NULL,'https://lorempixel.com/640/300/?67708',650,'s:14:\"en modération\";',NULL,NULL),(8,NULL,NULL,NULL,'https://lorempixel.com/640/300/?16099',650,'s:14:\"en modération\";',NULL,NULL),(9,NULL,NULL,NULL,'https://lorempixel.com/640/300/?68712',650,'s:14:\"en modération\";',NULL,NULL),(10,NULL,NULL,NULL,'https://lorempixel.com/640/300/?82758',650,'s:14:\"en modération\";',NULL,NULL),(11,NULL,NULL,NULL,'https://lorempixel.com/640/300/?78692',650,'s:14:\"en modération\";',NULL,NULL),(12,NULL,NULL,NULL,'https://lorempixel.com/640/300/?39196',650,'s:14:\"en modération\";',NULL,NULL),(13,NULL,NULL,NULL,'https://lorempixel.com/640/300/?39755',650,'s:14:\"en modération\";',NULL,NULL),(14,NULL,NULL,NULL,'https://lorempixel.com/640/300/?64663',650,'s:14:\"en modération\";',NULL,NULL),(15,NULL,NULL,NULL,'https://lorempixel.com/640/300/?14334',650,'s:14:\"en modération\";',NULL,NULL),(16,NULL,NULL,NULL,'https://lorempixel.com/640/300/?14878',650,'s:14:\"en modération\";',NULL,NULL),(17,NULL,NULL,NULL,'https://lorempixel.com/640/300/?72630',650,'s:14:\"en modération\";',NULL,NULL),(18,NULL,NULL,NULL,'https://lorempixel.com/640/300/?42354',650,'s:14:\"en modération\";',NULL,NULL),(19,NULL,NULL,NULL,'https://lorempixel.com/640/300/?78757',650,'s:14:\"en modération\";',NULL,NULL),(20,NULL,NULL,NULL,'https://lorempixel.com/640/300/?80777',650,'s:14:\"en modération\";',NULL,NULL),(21,NULL,NULL,NULL,'https://lorempixel.com/640/300/?18203',650,'s:14:\"en modération\";',NULL,NULL),(22,NULL,NULL,NULL,'https://lorempixel.com/640/300/?84575',650,'s:14:\"en modération\";',NULL,NULL),(23,NULL,NULL,NULL,'https://lorempixel.com/640/300/?17534',650,'s:14:\"en modération\";',NULL,NULL);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (1,1,12,1,1,'cabane dans les abres','très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',150,3,95.5,3,1,'eau courante',1,0.2,'draft'),(2,2,13,1,2,'cabane sur l\'eau','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(3,8,14,1,4,'bulle','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(4,9,12,1,3,'tipi','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',0,0.2,'draft'),(5,7,12,1,6,'roulottes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(6,4,14,1,7,'chalets','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(7,3,14,1,9,'yourtes','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(8,6,13,1,8,'inclassables','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft'),(9,5,14,1,5,'bateaux','très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..',30,3,95.5,3,0,'eau courante',1,0.2,'draft');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `propriete`
--

LOCK TABLES `propriete` WRITE;
/*!40000 ALTER TABLE `propriete` DISABLE KEYS */;
INSERT INTO `propriete` VALUES (1,3,'profondeur de la cabane',1,'string'),(2,2,'barbecue',0,'booleen'),(3,1,'lit supplémentaire',0,'integer');
/*!40000 ALTER TABLE `propriete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `propriete_type_property`
--

LOCK TABLES `propriete_type_property` WRITE;
/*!40000 ALTER TABLE `propriete_type_property` DISABLE KEYS */;
INSERT INTO `propriete_type_property` VALUES (1,1,1,1);
/*!40000 ALTER TABLE `propriete_type_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,15,2,'2021-02-12 23:34:34','2021-02-15 00:00:00',600,3,1,'[]','[]'),(2,15,1,'2021-03-01 23:34:34','2021-03-19 23:34:34',1200,3,1,'[]','[]');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_property`
--

LOCK TABLES `type_property` WRITE;
/*!40000 ALTER TABLE `type_property` DISABLE KEYS */;
INSERT INTO `type_property` VALUES (1,'cabane dans les arbres','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(2,'cabane sur l\'eau','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(3,'yourte','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(4,'chalets','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(5,'bateaux','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(6,'Igloo dans le sud de la france','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(7,'Igloo dans le sud de la france','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(8,'bulle','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder'),(9,'tipi','Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder');
/*!40000 ALTER TABLE `type_property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `type_value`
--

LOCK TABLES `type_value` WRITE;
/*!40000 ALTER TABLE `type_value` DISABLE KEYS */;
INSERT INTO `type_value` VALUES (1,'entier'),(2,'booleen'),(3,'string');
/*!40000 ALTER TABLE `type_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'dufour.thierry@andre.com','password',986166402,'[\"ROLE_ADMIN\"]','Guillaume','Chevallier'),(2,'eric65@barthelemy.fr','password',33,'[\"ROLE_ADMIN\"]','Marcel','Lemaire'),(3,'luce86@mercier.com','password',33,'[\"ROLE_ADMIN\"]','Étienne','Boyer'),(4,'etienne.valerie@club-internet.fr','password',33,'[\"ROLE_ADMIN\"]','Geneviève','Lemonnier'),(5,'emmanuelle79@desousa.org','password',9,'[\"ROLE_ADMIN\"]','Claudine','Verdier'),(6,'lebrun.stephanie@hotmail.fr','password',196035621,'[\"ROLE_ADMIN\"]','Richard','Blin'),(7,'robert.gauthier@laposte.net','password',33,'[\"ROLE_ADMIN\"]','Hortense','Bourgeois'),(8,'rpasquier@bourdon.com','password',4,'[\"ROLE_ADMIN\"]','Maggie','Boutin'),(9,'cbenard@bonnet.com','password',6,'[\"ROLE_ADMIN\"]','Sébastien','Gomez'),(10,'claudine.payet@lopez.com','password',6,'[\"ROLE_ADMIN\"]','Martin','Petitjean'),(11,'admin@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$43Xnt18WE+k0yASl/aAS5w$jGL3lAnB39d7+CEmdxkmp/or/tP4bufDK23UyyfIvRI',33,'[\"ROLE_ADMIN\"]','Nath','Moreno'),(12,'proprio@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$uFluIRIAWznFR/5pqUkiZQ$Y0tQRbwECeSYvhVFCsU4hGihWJf62qfqPp19o8hAjQw',4,'[\"ROLE_PROPRIO\"]','Brigitte','Vallee'),(13,'proprio2@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$OuenPHGvdkEJiEl/HYSeTQ$knmsLGOH8kfG7ON81R3xshxjWwOQWj1f0Rjjwq5FJUM',33,'[\"ROLE_PROPRIO\"]','Agnès','Mallet'),(14,'proprio1@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$ew8AqKT05WbRb/7p35ZPYw$Q8HW9rU1tJb+EnUrYE6n0uDvHF4ocKWjK17RgvD2F4M',33,'[\"ROLE_PROPRIO\"]','Lucas','Mercier'),(15,'locataire@yopmail.com','$argon2id$v=19$m=65536,t=4,p=1$9TE7/aCgGi3M5hRLQ8YSvQ$8a6+alnhy1WWpZ05Q1Pb5fKriYWEonI5XV6pGTzZD7I',33,'[\"ROLE_USER\"]','Tristan','Martin'),(16,'user0@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$JnfEAgWWA5Vo39JUnprVxg$kyivDElaRjkmgU6Zi5LqQOj+VEb4QDufG/gScjgK7JY',7,'[\"ROLE_USER\"]','Constance','Bonneau'),(17,'user1@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$t0h6nbQKRBelhQhUP9P+VQ$xR78zAbzXZGzEBD/eTC63bWqFPvxoOu9Amqbm0RdmSY',891060897,'[\"ROLE_ADMIN\"]','Nathalie','Cordier'),(18,'user2@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Y8VB0an1/85y/PP9a1g6bQ$RFuc0pINHEYEWgKEgH/OsRhpiXl7D2yt+SXRpr31MpI',8,'[\"ROLE_USER\"]','Anaïs','Collin'),(19,'user3@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Zyd/qBX4Pt2MMxeqFZGBtQ$XMTXfvQb3/yG+H5gqKXjFR9AnLYYpFqXI6v6nxQWDRk',1,'[\"ROLE_USER\"]','Sébastien','Raynaud'),(20,'user4@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$kepJ7HM9xlI8aWvoxIQBtQ$DH0JHZ9OAzSsgz4GsFvMbd93K2UK9nZF5ZQgpr12sqA',33,'[\"ROLE_USER\"]','Martin','Bigot');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2021-02-12 23:37:01
