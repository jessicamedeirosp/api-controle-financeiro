-- MySQL dump 10.13  Distrib 5.6.41-84.1, for Linux (x86_64)
--
-- Host: localhost    Database: jessmede_controle_financeiro
-- ------------------------------------------------------
-- Server version	5.6.41-84.1

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
-- Table structure for table `extrato`
--

DROP TABLE IF EXISTS `extrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) COLLATE utf8_bin NOT NULL,
  `cpf_transferencia` varchar(11) COLLATE utf8_bin NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipo` varchar(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extrato`
--

LOCK TABLES `extrato` WRITE;
/*!40000 ALTER TABLE `extrato` DISABLE KEYS */;
INSERT INTO `extrato` (`id`, `cpf`, `cpf_transferencia`, `valor`, `tipo`) VALUES (1,'11111111111','',10.00,'d'),(2,'11111111111','',-10.00,'s'),(3,'11111111111','',100.00,'d'),(4,'11111111111','22222222222',-30.00,'t'),(5,'22222222222','11111111111',30.00,'t');
/*!40000 ALTER TABLE `extrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'jessmede_controle_financeiro'
--

--
-- Dumping routines for database 'jessmede_controle_financeiro'
--
/*!50003 DROP PROCEDURE IF EXISTS `creditarValor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cpses_je39r0r32m`@`localhost` PROCEDURE `creditarValor`(IN pcpf varchar(11), IN pvalor DECIMAL(10,2))
BEGIN
	DECLARE saldo DECIMAL(10,2);
    SET saldo = (SELECT (CASE WHEN SUM(valor) IS NULL THEN 0 ELSE SUM(valor) END) as saldo FROM extrato where cpf=pcpf);

	INSERT INTO extrato (cpf, valor, tipo) VALUES (pcpf, pvalor, 'd');
	SELECT (saldo + pvalor) as saldo, 'Valor creditado com sucesso' as mensagem;
  
    
     
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `debitarValor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cpses_je39r0r32m`@`localhost` PROCEDURE `debitarValor`(IN `pcpf` VARCHAR(11), IN `pvalor` DECIMAL(10,2))
BEGIN
	DECLARE saldo DECIMAL(10,2);
    SET saldo = (SELECT (CASE WHEN SUM(valor) IS NULL THEN 0 ELSE SUM(valor) END) as saldo FROM extrato where cpf=pcpf);
	IF(saldo >= (pvalor*-1)) THEN
		INSERT INTO extrato (cpf, valor, tipo) VALUES (pcpf, pvalor, 's');
		SELECT (saldo - (pvalor*-1)) as saldo, 'Valor debitado com sucesso' as mensagem;
    ELSE
    	SELECT saldo, 'Saldo insuficiente' as mensagem;
    END IF;
    
     
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `transferirValor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cpses_je39r0r32m`@`localhost` PROCEDURE `transferirValor`(IN `pcpf` VARCHAR(11), IN `pcpfd` VARCHAR(11), IN `pvalor` DECIMAL(10,2))
BEGIN
	DECLARE saldo DECIMAL(10,2);
    SET saldo = (SELECT (CASE WHEN SUM(valor) IS NULL THEN 0 ELSE SUM(valor) END) as saldo FROM extrato where cpf=pcpf);
	IF(saldo >= (pvalor*-1)) THEN
		INSERT INTO extrato (cpf, cpf_transferencia, valor, tipo) VALUES (pcpf, pcpfd, pvalor, 't');
        INSERT INTO extrato (cpf, cpf_transferencia, valor, tipo) VALUES (pcpfd, pcpf, (pvalor*-1), 't');
		SELECT (saldo - (pvalor*-1)) as saldo,  pcpfd as cpf_destinatario, 'Valor transferido com sucesso' as mensagem;
    ELSE
    	SELECT saldo, pcpfd as cpf_destinatario, 'Saldo insuficiente' as mensagem;
    END IF;
    
     
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-27 21:16:59
