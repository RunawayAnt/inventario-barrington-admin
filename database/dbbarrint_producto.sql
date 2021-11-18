CREATE DATABASE  IF NOT EXISTS `dbbarrint` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbbarrint`;
-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: dbbarrint
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.21.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_proveedor` int NOT NULL,
  `codigobarras` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `mininventario` int NOT NULL,
  `precioentrada` double NOT NULL,
  `preciosalida` double NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `id_usuario` int NOT NULL,
  `id_categoria` int NOT NULL,
  `creacion` datetime NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigobarras` (`codigobarras`),
  KEY `fk_id_usuario` (`id_usuario`),
  KEY `fk_id_categoria` (`id_categoria`),
  KEY `fk_id_proveedor` (`id_proveedor`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `fk_id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (59,12,'D53332412A','Jeans',' Tela jeans',3,20,25,'Metros',32,40,'2021-10-25 16:18:59','Inactivo'),(60,12,'D79058162A','Franela','Not description',2,30,40,'Metros',32,11,'2021-10-25 17:04:17','Inactivo'),(61,12,'D22993437A','Gabardina','Not description',10,85,90,'Metros',32,40,'2021-10-25 17:10:28','Inactivo'),(62,17,'D50562817A','Crepé','Not description',10,20,25,'Metros',32,41,'2021-10-25 17:11:47','Activo'),(63,12,'D32506659A','Encaje','Not description',10,22,25,'Metros',32,41,'2021-10-25 17:13:32','Activo'),(64,17,'D75024583A','Oxford','Not description',10,12,25,'Metros',32,40,'2021-10-25 17:14:08','Activo'),(65,12,'D02400463A','Tull','Not description',3,20,58,'Metros',32,14,'2021-10-25 17:17:55','Activo'),(66,17,'D42775580A','Mezclilla','Not description',10,50,65,'Metros',32,14,'2021-10-25 17:22:38','Activo'),(67,12,'D77203211A','Estopilla','Not description',10,20,25,'Metros',32,40,'2021-10-25 17:23:47','Activo');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-27 14:09:44
