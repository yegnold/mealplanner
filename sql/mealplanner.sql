-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: mealplanner
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meals`
--

LOCK TABLES `meals` WRITE;
/*!40000 ALTER TABLE `meals` DISABLE KEYS */;
INSERT INTO `meals` VALUES (1,'Chicken Fanjitas'),(2,'Spag Bol Bake'),(3,'Spicy Chicken Pittas'),(4,'Barbeque Chicken'),(5,'Freaky Wraps'),(19,'Easy Crispy Chicken'),(7,'Jamie\'s Chilli Beef Brisket'),(9,'Salami Sandwich'),(10,'Cheese Mix Sandwich'),(11,'Tomato Soup'),(12,'Weightwatchers Meal'),(13,'Cheese and Pickle Sandwich'),(14,'Meatballs & Linguine'),(15,'Tomato & Chilli Pasta'),(16,'Pizza Muffans'),(17,'Filled Pasta with Tomato Sauce'),(18,'Ham, Mustard & Salad Sandwich');
/*!40000 ALTER TABLE `meals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meals_scheduled`
--

DROP TABLE IF EXISTS `meals_scheduled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meals_scheduled` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `meal_type` enum('L','D') NOT NULL DEFAULT 'L',
  `participant_id` int(11) NOT NULL,
  `is_disabled` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `meals_id` (`meal_id`),
  KEY `participants_id` (`participant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meals_scheduled`
--

LOCK TABLES `meals_scheduled` WRITE;
/*!40000 ALTER TABLE `meals_scheduled` DISABLE KEYS */;
INSERT INTO `meals_scheduled` VALUES (5,12,'2013-05-13','D',2,0),(2,3,'2013-05-13','D',1,0),(3,11,'2013-05-13','L',2,0),(4,5,'2013-05-13','L',1,0),(6,3,'2013-05-14','L',1,0),(7,13,'2013-05-14','L',2,0),(8,14,'2013-05-14','D',1,0),(9,14,'2013-05-14','D',2,0),(10,7,'2013-05-11','D',1,0),(11,7,'2013-05-11','D',2,0),(12,7,'2013-05-12','D',1,0),(13,7,'2013-05-12','D',2,0),(14,9,'2013-05-12','L',2,0),(15,5,'2013-05-12','L',1,0),(16,0,'2013-05-15','L',1,1),(17,0,'2013-05-15','D',1,1),(18,9,'2013-05-15','L',2,0),(19,15,'2013-05-15','D',2,0),(20,0,'2013-05-16','L',1,1),(21,16,'2013-05-16','D',1,0),(22,17,'2013-05-16','D',2,0),(23,13,'2013-05-16','L',2,0),(24,18,'2013-05-17','L',1,0),(25,0,'2013-05-17','D',1,1),(26,18,'2013-05-17','L',2,0),(27,0,'2013-05-17','D',2,1),(28,0,'2013-05-18','L',1,1),(29,0,'2013-05-18','L',2,1),(30,0,'2013-05-18','D',1,1),(31,0,'2013-05-18','D',2,1),(32,0,'2013-05-19','L',1,1),(33,0,'2013-05-19','L',2,1),(34,19,'2013-05-19','D',1,0),(35,19,'2013-05-19','D',2,0);
/*!40000 ALTER TABLE `meals_scheduled` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meals_shopping_list_check_items`
--

DROP TABLE IF EXISTS `meals_shopping_list_check_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meals_shopping_list_check_items` (
  `meals_id` int(11) NOT NULL,
  `shopping_list_check_items_id` int(11) NOT NULL,
  KEY `meals_id` (`meals_id`),
  KEY `shopping_list_check_items_id` (`shopping_list_check_items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meals_shopping_list_check_items`
--

LOCK TABLES `meals_shopping_list_check_items` WRITE;
/*!40000 ALTER TABLE `meals_shopping_list_check_items` DISABLE KEYS */;
INSERT INTO `meals_shopping_list_check_items` VALUES (1,11),(1,10),(1,9),(1,8),(1,7),(1,6),(1,5),(1,4),(1,3),(1,2),(2,12),(2,7),(2,13),(1,16),(1,17),(1,18),(3,6),(3,10),(3,14),(3,15),(3,16),(3,17),(4,22),(4,21),(4,20),(4,19),(4,17),(4,2),(4,1),(4,23),(4,24),(4,25),(4,26),(4,27),(4,28),(5,1),(5,4),(5,7),(7,4),(7,5),(7,21),(7,29),(7,30),(7,31),(7,32),(7,33),(7,34),(7,35),(7,36),(7,37),(7,38),(7,39),(7,40),(7,41),(9,43),(9,42),(10,7),(10,10),(10,17),(10,27),(10,42),(11,42),(11,44),(12,45),(13,7),(13,42),(13,46),(14,48),(14,47),(14,39),(14,29),(14,21),(14,17),(14,49),(14,50),(15,51),(15,52),(16,1),(16,7),(16,17),(16,21),(16,53),(16,54),(16,55),(17,1),(17,17),(17,21),(17,53),(17,54),(17,56),(18,6),(18,16),(18,27),(18,42),(18,57),(18,58),(19,59),(19,61),(19,2),(19,28),(19,42),(19,39),(19,60);
/*!40000 ALTER TABLE `meals_shopping_list_check_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,'Ed'),(2,'Kat');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_list_check_items`
--

DROP TABLE IF EXISTS `shopping_list_check_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_list_check_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_list_check_items`
--

LOCK TABLES `shopping_list_check_items` WRITE;
/*!40000 ALTER TABLE `shopping_list_check_items` DISABLE KEYS */;
INSERT INTO `shopping_list_check_items` VALUES (1,'Tomato Purée'),(2,'Chicken'),(3,'Fanjita Paste'),(4,'Waps'),(5,'Red Peppers'),(6,'Sarad'),(7,'Cheese'),(8,'Refried Beans'),(9,'Fanjita Spice Mix'),(10,'Mayonnaise'),(11,'Tomato & Red Pepper Relish'),(12,'Fusilli Pasta'),(13,'Spag Bol Sauce'),(14,'Pitta Breads'),(15,'Hot and Spicy Chicken'),(16,'Tomatoes'),(17,'Onions'),(18,'Spring Onions'),(19,'Ground Ginger'),(20,'Mustard Powder'),(21,'Garlic'),(22,'White Wine'),(23,'Soy Sauce'),(24,'Soft Sugar'),(25,'Potatoes'),(26,'Milk'),(27,'Butter'),(28,'Carrots'),(29,'Chopped Tomatoes'),(30,'Beef Stock'),(31,'Yellow Peppers'),(32,'Red Onion'),(33,'Red Chillies'),(34,'Bay Leaf'),(35,'Coriander'),(36,'Cinnamon Sticks'),(37,'Smoked Paprika'),(38,'Cumin'),(39,'Oregano'),(40,'Beef Brisket'),(41,'Rice'),(42,'Bread'),(43,'Salami'),(44,'Tomato Soup'),(45,'Weightwatchers Meal'),(46,'Pickle'),(47,'Beef Mince'),(48,'Carrots'),(49,'Linguine Pasta'),(50,'Red Wine'),(51,'Any Pasta'),(52,'Tomato & Chilli Pasta Sauce'),(53,'Passata'),(54,'Tabasco'),(55,'English Breakfast Muffans'),(56,'Filled Pasta'),(57,'Ham'),(58,'Mustard'),(59,'Natural Yoghurt'),(60,'Parmesan Cheese'),(61,'Green Beans');
/*!40000 ALTER TABLE `shopping_list_check_items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-11 21:10:22
