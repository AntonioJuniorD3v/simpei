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
-- Table structure for table `ordem_servico`
--

DROP TABLE IF EXISTS `ordem_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordem_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEquipamento` int(11) DEFAULT NULL,
  `idAnalista` int(11) DEFAULT NULL,
  `idTecnico` int(11) DEFAULT NULL,
  `idSetor` int(11) DEFAULT NULL,
  `resumo` varchar(20) DEFAULT NULL,
  `tipoManutencao` varchar(25) DEFAULT NULL,
  `estadoEquipamento` varchar(25) DEFAULT NULL,
  `dataInicial` datetime DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `prioridade` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordem_servico`
--

LOCK TABLES `ordem_servico` WRITE;
/*!40000 ALTER TABLE `ordem_servico` DISABLE KEYS */;
INSERT INTO `ordem_servico` VALUES (12,3,2,1,4,'Trocar HD por SSD','Preventiva','Ativo','2019-11-10 11:39:27','2019-09-27','Em validação','Baixa'),(15,4,2,1,4,'Limpeza física','Preventiva','Ativo','2019-11-10 17:55:42','2019-09-15','Em processamento','Alta'),(16,4,2,2,4,'Trocar teclado','Corretiva','Ativo','2019-11-05 14:15:40','2019-09-24','Validado','Média'),(17,3,2,2,4,'Trocar Mouse','Preventiva','Ativo','2019-09-17 14:49:04','2019-09-17','Validado','Muito Alta'),(18,4,2,2,4,'Trocar Monitor','Preventiva','Ativo','2019-09-17 20:12:28','2019-09-17','Validado','Muito Alta'),(19,6,2,2,4,'Trocar lampada','Corretiva','Parado','2019-09-17 22:35:55','2019-09-17','Validado','Muito Alta'),(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-07-10 00:00:00',NULL,NULL,NULL);
/*!40000 ALTER TABLE `ordem_servico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-21 23:09:05
