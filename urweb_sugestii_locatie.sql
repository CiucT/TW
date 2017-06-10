-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: urweb
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `sugestii_locatie`
--

DROP TABLE IF EXISTS `sugestii_locatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sugestii_locatie` (
  `user_id` varchar(200) NOT NULL,
  `place_id` varchar(200) DEFAULT NULL,
  `descriere` varchar(300) DEFAULT NULL,
  `adresa` varchar(300) DEFAULT NULL,
  `latitudine` float DEFAULT NULL,
  `longitudine` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sugestii_locatie`
--

LOCK TABLES `sugestii_locatie` WRITE;
/*!40000 ALTER TABLE `sugestii_locatie` DISABLE KEYS */;
INSERT INTO `sugestii_locatie` VALUES ('1478509985553171','ChIJvUboJ2L7ykARLE5QZGhLPhk','Facultatea de Informatică, Strada General Henri Mathias Berthelot, Iași, Iași County, Romania','Strada General Henri Mathias Berthelot 16, Iași 700259, Romania',47.174,27.5749),('1478509985553171','ChIJgRShyGn6ykARfcuy7bA2wkg','Capitol, Valea Adâncă, Iași County, Romania','Str. Debarcaderului 66, Valea Adâncă 700063, Romania',47.1133,27.5586),('1478509985553171','ChIJj_VWxFH6ykAR8KpJ1iIlBq0','Hotel Capitol, Șoseaua Nicolina, Iași, Iași County, Romania','Șoseaua Nicolina 203A, Iași 707317, Romania',47.1135,27.5587);
/*!40000 ALTER TABLE `sugestii_locatie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-10 14:45:55
