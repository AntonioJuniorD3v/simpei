-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: simpei
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

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
-- Table structure for table `equipamentos`
--

DROP TABLE IF EXISTS `equipamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipamentos` (
  `idEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `patrimonio` int(11) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `periodoPreditiva` varchar(45) DEFAULT NULL,
  `checklistPreditiva` text DEFAULT NULL,
  `ultimaManutencaoPreditiva` date DEFAULT NULL,
  `proximaManutencaoPreditiva` date DEFAULT NULL,
  `periodoPreventiva` varchar(45) DEFAULT NULL,
  `checklistPreventiva` text DEFAULT NULL,
  `ultimaManutencaoPreventiva` date DEFAULT NULL,
  `proximaManutencaoPreventiva` date DEFAULT NULL,
  PRIMARY KEY (`idEquipamento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipamentos`
--

LOCK TABLES `equipamentos` WRITE;
/*!40000 ALTER TABLE `equipamentos` DISABLE KEYS */;
INSERT INTO `equipamentos` VALUES (3,'NTBITU064','DELL Vostro','2019-09-12',123456,'Desativado','Semanal',NULL,'2019-11-22','2019-11-29','Quinzenal',NULL,'2019-11-22','2019-12-07'),(4,'DKTITU172','DELL Optiplex 380','2019-09-12',123456,'Manutenção',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Impressora Ricoh','MP 305','2019-09-17',123456,'Desativado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Datashow','Sony','2019-09-17',123456,'Produção',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'teste','123','2019-11-20',123,'Produção','Semanal','sdf','2019-11-21','2019-11-28','Mensal','sdf','2019-11-21','2019-12-21');
/*!40000 ALTER TABLE `equipamentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-21 23:09:06
