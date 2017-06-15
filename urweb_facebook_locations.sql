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
-- Table structure for table `facebook_locations`
--

DROP TABLE IF EXISTS `facebook_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebook_locations` (
  `user_id` varchar(200) NOT NULL,
  `place_id` varchar(200) DEFAULT NULL,
  `descriere` varchar(500) DEFAULT NULL,
  `strada` varchar(500) DEFAULT NULL,
  `oras` varchar(100) DEFAULT NULL,
  `tara` varchar(100) DEFAULT NULL,
  `latitudine` float DEFAULT NULL,
  `longitudine` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebook_locations`
--

LOCK TABLES `facebook_locations` WRITE;
/*!40000 ALTER TABLE `facebook_locations` DISABLE KEYS */;
INSERT INTO `facebook_locations` VALUES ('1478509985553171','201748156540888','Faleza Nord,Constanta','','','',44.273,28.6194),('1478509985553171','196203610426004','Delfinariu Constanta','B-dul Mamaia nr.255','Constanta','Romania',44.2054,28.6433),('1478509985553171','188089221380134','Teatrul National \"Vasile Alecsandri\" Iasi Official','Teatru National','Iasi','Romania',47.1667,27.6),('1478509985553171','111075942255910','Izvorul Muntelui, Neamt, Romania','','Izvorul Muntelui','Romania',46.9333,26.0833),('1478509985553171','133798616695276','Cabana Fantanele','','Ceahlau','Romania',46.9989,25.9474),('1478509985553171','144912538952874','Pârtia Parc Vatra Dornei','','Vatra Dornei','',47.3427,25.3538),('1478509985553171','418650624869343','Cetatea Neamţului','Targu Neamt','Piatra Neamt','Romania',47.2117,26.3451),('1478509985553171','457756184322690','Gradina Botanica Iasi','Str. Dumbrava Roşie, Nr. 7-9','Iasi','Romania',47.4552,26.2973),('1478509985553171','205405766144368','Coopers Club Lounge','Tudor Vladimirescu','Iasi','Romania',47.1547,27.6059),('1478509985553171','196910093680326','Golden Stone Iasi','ciric','Iasi','Romania',47.1824,27.6045),('1478509985553171','344356385646180','Busteni,valea Cerbului','','','',45.4186,25.5368),('1478509985553171','381664158554049','Balea Lac - Transfagarasan','','','',45.6037,24.6155),('1478509985553171','168303753236935','Cascada Duruitoarea','','Bicazu Ardelean','',46.9977,25.9277),('1478509985553171','170827779637436','Zona de agrement Ciric','Zona de agrement Ciric Iasi, Romania','Iasi','Romania',47.1796,27.6056),('1478509985553171','343861029016525','Palatul Culturii','Piata Stefan cel Mare si Sfant nr.1, Iasi','Iasi','Romania',47.1583,27.5865),('1478509985553171','304179499660120','Varful Toaca, Muntele Ceahlau','','','',46.965,25.9487);
/*!40000 ALTER TABLE `facebook_locations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-15 22:41:30
