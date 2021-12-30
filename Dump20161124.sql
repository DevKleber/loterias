-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: megasena
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `megasena_jogo`
--

DROP TABLE IF EXISTS `megasena_jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `megasena_jogo` (
  `cd_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `nu_um` int(11) NOT NULL,
  `nu_dois` int(11) NOT NULL,
  `nu_tres` int(11) NOT NULL,
  `nu_quatro` int(11) NOT NULL,
  `nu_cinco` int(11) NOT NULL,
  `nu_seis` int(11) NOT NULL,
  `cd_user` int(11) NOT NULL,
  `nu_concurso` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_jogo`),
  KEY `fk_megasena_jogo_megasena_user_idx` (`cd_user`),
  CONSTRAINT `fk_megasena_jogo_megasena_user` FOREIGN KEY (`cd_user`) REFERENCES `megasena_user` (`cd_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `megasena_jogo`
--

LOCK TABLES `megasena_jogo` WRITE;
/*!40000 ALTER TABLE `megasena_jogo` DISABLE KEYS */;
INSERT INTO `megasena_jogo` VALUES (1,5,10,20,40,53,59,1,1879),(2,4,10,33,38,58,56,1,1879);
/*!40000 ALTER TABLE `megasena_jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `megasena_user`
--

DROP TABLE IF EXISTS `megasena_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `megasena_user` (
  `cd_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `megasena_user`
--

LOCK TABLES `megasena_user` WRITE;
/*!40000 ALTER TABLE `megasena_user` DISABLE KEYS */;
INSERT INTO `megasena_user` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `megasena_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-24 14:29:34
