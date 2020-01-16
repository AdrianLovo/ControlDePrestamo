-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: prestamo
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `cuotaprestamo`
--

DROP TABLE IF EXISTS `cuotaprestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuotaprestamo` (
  `idCuotaPrestamo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `idPrestamo` int(11) DEFAULT NULL,
  `numeroCuota` int(11) DEFAULT NULL,
  `fechaCancelada` date DEFAULT NULL,
  PRIMARY KEY (`idCuotaPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotaprestamo`
--

LOCK TABLES `cuotaprestamo` WRITE;
/*!40000 ALTER TABLE `cuotaprestamo` DISABLE KEYS */;
INSERT INTO `cuotaprestamo` VALUES (1,1,1,NULL),(12,9,1,'2019-07-15'),(13,9,2,'2019-07-31'),(14,9,3,'2019-08-15'),(15,9,4,'2019-09-03'),(16,9,5,'2019-09-19'),(17,9,6,'2019-09-30'),(18,10,1,NULL),(19,11,1,'2019-07-31'),(20,11,2,'2019-08-15'),(21,11,3,'2019-08-31'),(22,11,4,'2019-09-19'),(23,12,1,'2019-08-15'),(24,12,2,'2019-08-31'),(25,12,3,'2019-09-16'),(26,12,4,'2019-10-08'),(27,13,1,NULL),(28,14,1,'2019-10-18'),(29,14,2,'2019-11-05'),(30,14,3,'2019-11-19'),(31,14,4,'2019-12-04'),(32,15,1,'2019-10-18'),(33,15,2,'2019-11-05'),(34,15,3,'2019-11-17'),(35,15,4,'2019-12-01'),(36,15,5,'2019-12-14'),(37,15,6,'2019-12-16'),(38,16,1,'2019-11-05'),(39,16,2,'2019-11-19'),(40,16,3,'2019-12-02'),(41,16,4,'2019-12-16'),(42,17,1,'2019-11-25'),(43,18,1,'2019-11-19'),(44,19,1,'2019-11-19'),(45,19,2,'2019-12-02'),(46,19,3,'2019-12-18'),(47,19,4,'2020-01-02'),(48,20,1,'2019-11-19'),(49,21,1,'2019-12-14'),(50,22,1,'2019-11-19'),(51,22,2,'2019-12-02'),(52,22,3,'2019-12-16'),(53,22,4,'2020-01-01'),(54,22,5,NULL),(55,22,6,NULL),(56,20,4,'2019-12-09'),(57,20,3,'2019-12-18'),(58,20,2,NULL),(59,20,6,NULL),(60,20,5,NULL),(61,18,5,'2019-12-02'),(62,18,4,'2019-12-02'),(63,18,3,'2019-12-16'),(64,18,2,'2020-01-02'),(65,23,1,'2019-12-04'),(66,23,2,'2019-12-18'),(67,23,3,'2020-01-01'),(68,23,4,NULL),(69,23,5,NULL),(70,23,6,NULL),(71,24,1,'2020-01-09'),(72,24,2,NULL),(73,24,3,NULL),(74,24,4,NULL),(75,24,5,NULL),(76,24,6,NULL),(80,25,1,'2020-01-02'),(81,25,2,NULL),(82,25,3,NULL),(83,25,4,NULL),(84,25,5,NULL),(85,25,6,NULL),(86,25,7,NULL),(87,25,8,NULL),(88,26,1,'2019-12-20'),(89,26,2,NULL),(90,26,3,NULL),(91,26,4,NULL);
/*!40000 ALTER TABLE `cuotaprestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombrePersona` varchar(50) DEFAULT NULL,
  `totalPrestamo` int(11) DEFAULT NULL,
  `cuota` int(11) DEFAULT NULL,
  `cantidadCuotas` int(11) DEFAULT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  `montoPendiente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPrestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` VALUES (1,'Papá (Lentes)',260,260,1,'2019-03-01',260),(9,'Paty',300,60,6,'2019-07-01',0),(10,'Chele',30,30,1,'2019-01-01',30),(11,'Nelson (Ofi)',100,30,4,'2019-07-18',0),(12,'Alex ',100,30,4,'2019-08-06',0),(13,'Mamá',275,275,1,'2019-01-01',275),(14,'Paty',200,60,4,'2019-10-01',0),(15,'Alex',150,30,6,'2019-10-01',0),(16,'Oficina (Nelson)',100,30,4,'2019-10-15',0),(17,'Chele (Libros)',15,15,1,'2019-11-01',0),(18,'Oficina (Cucufate)',125,30,5,'2019-11-06',0),(19,'Oficina (Jonathan)',100,30,4,'2019-11-07',0),(20,'Cecy',250,50,6,'2019-11-07',150),(21,'Paty Segundo',60,72,1,'2019-11-08',0),(22,'Oficina (Marlon)',200,40,6,'2019-11-11',80),(23,'Oficina (Caro)',300,60,6,'2019-11-22',180),(24,'Paty Tercero',300,60,6,'2019-12-14',300),(25,'Alex',200,30,8,'2019-12-16',210),(26,'Oficina (Nelson)',100,30,4,'2019-12-18',90);
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-16 11:42:55
