-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: morena
-- ------------------------------------------------------
-- Server version 5.7.22-0ubuntu18.04.1

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
-- Table structure for table `afiliados`
--

DROP TABLE IF EXISTS `afiliados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiliados` (
  `nombres` varchar(255) DEFAULT NULL,
  `apellidopaterno` varchar(50) DEFAULT NULL,
  `apellidomaterno` varchar(20) DEFAULT NULL,
  `calle` varchar(20) DEFAULT NULL,
  `numext` varchar(20) DEFAULT NULL,
  `numint` varchar(20) DEFAULT NULL,
  `colonia` varchar(20) DEFAULT NULL,
  `codigopostal` int(10) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `claveelector` varchar(18) NOT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`claveelector`),
  UNIQUE KEY `claveelector` (`claveelector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliados`
--

LOCK TABLES `afiliados` WRITE;
/*!40000 ALTER TABLE `afiliados` DISABLE KEYS */;
INSERT INTO `afiliados` VALUES ('asd','asd','asd','asdasd','12','12','asdsad',12,23423,'123','0'),('mmm','aaa','qqqqqq','dfdsf','12','12','asdasd',12,101010101,'1233434','0'),('dfgfdg','dsfdgf','sdf','sdfsdf','23','23','dsdf',23,45345,'54354','1'),('dfgdg','jkhkj','jhkjh','hvjhg','45','45','giug',45,767,'9876','0'),('Pedro ','Ramos','Leon','Ote 50 ','Mz 14','Lt 25','Providencia ',56616,1001,'JODUF773HDIKSD','1'),('Guillermo ','Reyes','Martinez','Toluca','Mz 83','Lt 01','Guadalupana I',56616,1000,'REMG9102279T6','1'),('Ignacio ','Ponce','Leon','Toluca','Mz 14','Lt 25','Guadalupana',56616,1000,'REMG9102279T61','1'),('Sandra','Zaragoza','Ponce','Altamirano ','Mz 55','Lt 49','San Isidro ',56617,1000,'REMG9102279T62','1'),('Sandra ','Lopez','Gomez','Ote 44a','Mz 134','Lt 34','Guadalupana II',56616,1000,'SAKDFJWDJF83747S','1');
/*!40000 ALTER TABLE `afiliados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`),
  KEY `login` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admistrador','guillermo.reyes@abits.com','fd6169ec46aca35abb693ccf148bd5bc','','','2018-05-07 20:59:36'),(3,'Admin','admin@admin.com','25d55ad283aa400af464c76d713c07ad','','','2018-05-09 15:10:25'),(5,'akira','akira@akira.com','96eea1fa04bd82b22db09e12a7bd85ee','','','2018-05-11 15:12:12');
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

-- Dump completed on 2018-05-18  1:37:36