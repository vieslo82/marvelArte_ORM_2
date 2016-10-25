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
  `Pais` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Provincia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Poblacion` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
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
INSERT INTO `cuadros` VALUES ('CAV8796','CAPITANGRAN',111,'DAVID_MARQUEZ','02/10/2016','15/10/2016','22X14',1,1,0,0,0,'CAPITAN_AMERICA','/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1206542554-CA.jpg',NULL,NULL,NULL,'SI','PVC','MODERNO','BLANCO'),('DDD2334','RAZA',3434,'DAVID_ROSS','01/10/2016','15/10/2016','22X14',0,1,0,1,0,'DAREDEVIL','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1400624827-flowers.png',NULL,NULL,NULL,'SI','MADERA','RUSTICO','NEGRO'),('DFD3456','ESPE',1234,'JOHN_BEATTY','10/08/2000','15/10/2016','22X14',1,0,1,0,0,'DAREDEVIL','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1259714910-flowers.png',NULL,NULL,NULL,'SI','MADERA','BARROCO','AMARILLO'),('EEE3333','DEEE',4567,'STAN_LEE','02/10/2016','15/10/2016','22X14',0,1,0,0,0,'VIUDA_NEGRA','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/2024824197-flowers.png',NULL,NULL,NULL,'SI','PVC','MODERNO','ROJO'),('EEE3434','FFFFFFFF',55555,'STEFANO_CASELLI','01/10/2016','15/10/2016','22X14',0,0,1,0,0,'HULK','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1891835328-flowers.png',NULL,NULL,NULL,'SI','ALUMINIO','RUSTICO','BLANCO'),('EEE4567','ERTT',3456,'STAN_LEE','01/10/2016','23/10/2016','22X14',1,0,0,0,0,'DAREDEVIL','media/default-avatar.jpg','ES','39','AJA','SI','MADERA','MODERNO','BLANCO'),('ERE3456','FIERA',432,'ANDY_BRASE','02/09/2016','15/10/2016','22X14',1,1,1,0,0,'JESSICA_JONES','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/828774493-flowers.png',NULL,NULL,NULL,'SI','MADERA','MODERNO','NEGRO'),('FFF4546','ERRRRRR',3333,'STEFANO_CASELLI','02/10/2016','15/10/2016','22X14',0,0,0,0,1,'VENGADORES','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/499740293-flowers.png',NULL,NULL,NULL,'SI','PVC','FRANCES','AMARILLO'),('GHJ8945','SOMNI',4567,'DAVID_ROSS','01/10/2016','15/10/2016','22X14',0,1,0,0,1,'PUNISHER','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/697853575-flowers.png',NULL,NULL,NULL,'SI','PVC','MODERNO','ROJO'),('HJH3434','DSSDSD',5555,'STEFANO_CASELLI','01/10/2016','15/10/2016','22X14',0,0,0,0,0,'VIUDA_NEGRA','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/34601247-flowers.png',NULL,NULL,NULL,'SI','MADERA','FRANCES','ROJO'),('HJL7689','FFFFFF',45677,'ANDY_BRASE','01/10/2016','15/10/2016','22X14',0,0,1,0,0,'VENGADORES','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1672809245-flowers.png',NULL,NULL,NULL,'SI','MADERA','RUSTICO','ORIGINAL'),('LLL9876','JION',777,'DAVID_ROSS','04/10/2016','15/10/2016','22X14',0,0,1,0,0,'PUNISHER','/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/717230830-flowers.png',NULL,NULL,NULL,'SI','PVC','MODERNO','AMARILLO'),('QDF2567','DEDAL',4567,'STEFANO_CASELLI','02/10/2016','15/10/2016','22X14',0,0,1,1,0,'JESSICA_JONES','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/2116857034-flowers.png',NULL,NULL,NULL,'SI','MADERA','BARROCO','BLANCO'),('RRR6789','DFERE',54454,'ANDY_BRASE','01/10/2016','15/10/2016','22X14',0,0,0,0,0,'VIUDA_NEGRA','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1760079912-flowers.png',NULL,NULL,NULL,'SI','MADERA','RUSTICO','AMARILLO'),('RTY5678','RTETR',4554,'DAVID_MARQUEZ','01/10/2016','15/10/2016','22X14',1,0,0,0,0,'PUNISHER','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/44350169-flowers.png',NULL,NULL,NULL,'SI','MADERA','FRANCES','AMARILLO'),('SPI2222','ARACNIDO',3456,'JOHN_BEATTY','01/10/2016','15/10/2016','22X14',0,1,1,0,0,'VENGADORES','/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/439759661-spid.jpg',NULL,NULL,NULL,'SI','MADERA','RUSTICO','NEGRO'),('UIO9876','POZI',6543,'KEVIN_NOWLAN','01/10/2016','15/10/2016','22X14',0,0,0,0,1,'DAREDEVIL','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/39849483-flowers.png',NULL,NULL,NULL,'SI','PVC','MODERNO','BLANCO'),('VNE4567','LAVIU',5758,'KEVIN_NOWLAN','01/10/2016','23/10/2016','22X14',0,1,1,0,0,'VIUDA_NEGRA','media/default-avatar.jpg','ES','46','XATIVA','SI','MADERA','BARROCO','ORIGINAL'),('VVV3333','DDDDDD',4455,'KEVIN_NOWLAN','01/10/2016','15/10/2016','22X14',0,0,0,0,0,'DAREDEVIL','media/default-avatar.jpg',NULL,NULL,NULL,'SI','MADERA','FRANCES','ROJO'),('WEE2345','FFFFFFF',5677,'BRITTNEY_WILLIAMS','01/10/2016','15/10/2016','22X14',0,1,0,0,0,'DAREDEVIL','/var/www/html/php/marvelArte_ORM/1_bs_multipurpose_Ruma/media/1190872416-flowers.png',NULL,NULL,NULL,'SI','MADERA','FRANCES','ORIGINAL'),('WRT3456','DIDOD',2345,'DAVID_ROSS','01/10/2016','23/10/2016','22X14',0,1,0,0,0,'DAREDEVIL','media/default-avatar.jpg','ES','10','ALDEA MORET','SI','MADERA','BARROCO','ROJO'),('WWW3434','SSS',4444,'ANDY_BRASE','01/10/2016','15/10/2016','22X14',0,0,0,0,0,'VENGADORES','media/default-avatar.jpg',NULL,NULL,NULL,'SI','MADERA','BARROCO','AMARILLO');
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

-- Dump completed on 2016-10-24 16:27:12
