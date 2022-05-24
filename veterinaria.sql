-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: veterinaria
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `veterinaria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `veterinaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `veterinaria`;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (41,'ded4','ded',1234567892),(42,'wswsw34','sws',2147483647),(43,'s34','fe',1234567892),(44,'dÃ©Ã“2','XSXS',1231231232),(45,'orlando','tulipanres',1235095953),(46,'dedede de de de de','de',1231231231),(47,'JULÃO cesar LÃ“pez jimÃ©nez','cdcd',1231231231);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especie` (
  `id_especie` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_especie`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (5,'dd'),(6,'julio'),(8,'cesar'),(9,'ffrfr');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mascotas` (
  `id_mascotas` int(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `id_especiefk` int(11) DEFAULT NULL,
  `id_clientefk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mascotas`),
  KEY `FK_mascotas_cliente` (`id_clientefk`),
  KEY `FK_mascotas_especie` (`id_especiefk`),
  CONSTRAINT `FK_mascotas_cliente` FOREIGN KEY (`id_clientefk`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mascotas_especie` FOREIGN KEY (`id_especiefk`) REFERENCES `especie` (`id_especie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (46,'gbg','gbfg','gfgnfg',8,43);
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascotasvacunados`
--

DROP TABLE IF EXISTS `mascotasvacunados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mascotasvacunados` (
  `id_vacunacion` int(20) NOT NULL AUTO_INCREMENT,
  `fechaDeDosisAplicadas` date DEFAULT NULL,
  `fechaDeDosisAAplicar` date DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `id_mascotafk` int(20) DEFAULT NULL,
  `id_vacunafk` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_vacunacion`),
  KEY `fk_mascotas Vacunados_mascotas1_idx` (`id_mascotafk`),
  KEY `fk_mascotas Vacunados_vacuna1_idx` (`id_vacunafk`),
  CONSTRAINT `fk_mascotas Vacunados_mascotas1` FOREIGN KEY (`id_mascotafk`) REFERENCES `mascotas` (`id_mascotas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mascotas Vacunados_vacuna1` FOREIGN KEY (`id_vacunafk`) REFERENCES `vacuna` (`id_vacuna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotasvacunados`
--

LOCK TABLES `mascotasvacunados` WRITE;
/*!40000 ALTER TABLE `mascotasvacunados` DISABLE KEYS */;
INSERT INTO `mascotasvacunados` VALUES (9,'2019-08-15','2019-08-14','dgbfgb',46,1),(10,'0000-00-00','0000-00-00','v3',46,1);
/*!40000 ALTER TABLE `mascotasvacunados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `user` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('julio','12345678');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacuna`
--

DROP TABLE IF EXISTS `vacuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacuna` (
  `id_vacuna` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_vacuna`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacuna`
--

LOCK TABLES `vacuna` WRITE;
/*!40000 ALTER TABLE `vacuna` DISABLE KEYS */;
INSERT INTO `vacuna` VALUES (1,'juluoo'),(4,'dede'),(5,'dede');
/*!40000 ALTER TABLE `vacuna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-10 15:56:15
