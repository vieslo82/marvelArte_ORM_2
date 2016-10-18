CREATE DATABASE  IF NOT EXISTS `marvelArte` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `marvelArte`;
-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: marvelArte
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `cuadros`
--

DROP TABLE IF EXISTS `cuadros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuadros` (
  `Codigo` varchar(7) COLLATE utf8_spanish2_ci NOT NULL,
  `Titulo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Artista` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha_Creacion` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha_Stock` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Dimensiones` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Oleo` tinyint(4) DEFAULT NULL,
  `Spray` tinyint(4) DEFAULT NULL,
  `Pastel` tinyint(4) DEFAULT NULL,
  `Tinta` tinyint(4) DEFAULT NULL,
  `Cera` tinyint(4) DEFAULT NULL,
  `Categoria` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Imagen` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Marco` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Material_Marco` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estilo_Marco` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Color_Marco` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuadros`
--

LOCK TABLES `cuadros` WRITE;
/*!40000 ALTER TABLE `cuadros` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuadros` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-13 19:01:00
