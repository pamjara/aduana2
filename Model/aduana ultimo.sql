-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: aduana
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `rut` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nive_usua` tinyint(1) NOT NULL COMMENT '1->admin \n2->otro',
  `fono` int(11) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (10123123,'yond1994','daniel@hotmail.com','123','YONATHAN DOS','SUAREZ',2,NULL,NULL),(11123123,'pamela','pame29jara@gmail.com','123','PAMELA','JARA',1,NULL,NULL),(12123123,'yond','yonathan@gmail.com','123','yonathan','suarez',1,NULL,NULL);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dus` int(50) NOT NULL,
  `fecha` date NOT NULL,
  `patente` varchar(50) NOT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `numero` bigint(30) NOT NULL,
  `kilos` int(30) NOT NULL,
  `pasajeros` int(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `rut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (7,0,'0000-00-00','HUEAWAI',2,50000,80000,0,'NUEVO',NULL),(8,0,'0000-00-00','SAMSUNG',1,100000,130000,0,'USADO',NULL),(9,0,'0000-00-00','HUEAWAI',0,50000,80000,0,'NUEVO',NULL),(10,0,'0000-00-00','HUEAWAI',0,100000,130000,0,'NUEVO',NULL),(11,0,'0000-00-00','papa',0,233,233232,0,'USADO',NULL),(12,0,'0000-00-00','marca',0,13123,124124,124124,'REPARADO',NULL),(13,0,'0000-00-00','dsgdsfg',0,434,36436,4636,'3',NULL),(14,0,'0000-00-00','werwer',0,2354,324234,234234,'A PIE',NULL),(15,1234,'2017-06-02','1234',0,12,1234,12,'BICICLETA',NULL);
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `id_movimientos` int(11) NOT NULL AUTO_INCREMENT,
  `cantidadm` int(30) NOT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `tipo_movimiento` varchar(50) NOT NULL,
  `admin` varchar(30) NOT NULL,
  `id_producto_m` int(50) NOT NULL,
  `motivo` varchar(30) DEFAULT NULL,
  UNIQUE KEY `id_movimientos` (`id_movimientos`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (42,2,'2016-09-13 04:34:42','ENTRADA','yonathan',7,'compra'),(43,1,'2016-09-13 04:37:56','ENTRADA','yonathan',25,'reparacion'),(44,1,'2016-09-13 15:57:08','ENTRADA','yonathan',8,'compra'),(45,1,'2016-09-13 15:59:28','ENTRADA','yonathan',25,'reparacion'),(46,0,'2016-09-13 16:00:16','SALIDA','yonathan',9,'entrega');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellos`
--

DROP TABLE IF EXISTS `sellos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sellos` (
  `nuloSellos` int(50) NOT NULL,
  `numRegSellos` int(50) NOT NULL,
  `numSellos` int(10) NOT NULL,
  `cantidadSellos` int(5) NOT NULL,
  `id_sellos` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_sellos`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellos`
--

LOCK TABLES `sellos` WRITE;
/*!40000 ALTER TABLE `sellos` DISABLE KEYS */;
INSERT INTO `sellos` VALUES (0,0,0,1,8),(0,0,0,0,9),(0,0,0,0,10),(0,0,0,0,11),(0,0,0,0,12),(0,0,0,0,13),(0,0,0,0,14),(0,0,0,0,15),(0,0,0,0,16),(0,0,0,0,17),(0,0,0,0,18);
/*!40000 ALTER TABLE `sellos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-24  2:10:22
