-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: logins
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anotacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` longtext,
  `author` varchar(45) DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anotacoes`
--

LOCK TABLES `anotacoes` WRITE;
/*!40000 ALTER TABLE `anotacoes` DISABLE KEYS */;
INSERT INTO `anotacoes` VALUES (1,'loremip sum','gmapdev'),(2,'testleorem23o23','geraldo'),(3,'loremipsum','felipe'),(4,'testleorem23o23','geraldo'),(5,'3333','geraldo'),(6,'testleorem23o23','geraldo'),(7,'Freitas','Isabella'),(8,'gegege','Isabella'),(9,'\'a\'','geraldo'),(10,'testleorem23o\\\'2\\\'3','gerald\'ge\''),(11,'testleorem23o23','geraldo'),(12,'baby','Larissa'),(13,'testleorem23o23','geraldo'),(14,'12','geraldo');
/*!40000 ALTER TABLE `anotacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lgn_logins`
--

DROP TABLE IF EXISTS `lgn_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lgn_logins` (
  `idLogin` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(250) DEFAULT NULL,
  `nomeUsuario` varchar(250) DEFAULT '',
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(36) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `idTotovs` int DEFAULT NULL,
  `trocaSenha` int DEFAULT '0',
  `validadeSenha` date DEFAULT NULL,
  `token` longtext,
  `gestorUsuario` varchar(1) DEFAULT 'N',
  `gestorGrupo` varchar(1) DEFAULT 'N',
  `gestorPrograma` varchar(1) DEFAULT 'N',
  `ti` varchar(1) DEFAULT 'N',
  `si` varchar(1) DEFAULT 'N',
  `admin` varchar(1) DEFAULT 'N',
  `solicitante` varchar(1) DEFAULT 'S',
  `idFuncao` int DEFAULT '1',
  `cpf` varchar(45) DEFAULT NULL,
  `idSSO` varchar(45) DEFAULT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_acesso` datetime DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  PRIMARY KEY (`idLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=6978 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lgn_logins`
--

LOCK TABLES `lgn_logins` WRITE;
/*!40000 ALTER TABLE `lgn_logins` DISABLE KEYS */;
INSERT INTO `lgn_logins` VALUES (2400,'super','super Usuário','super@admin.com','1e5213b7cbc4d1780f09770123097879','2025-02-27',NULL,0,'2025-02-27',NULL,'S','S','S','S','S','S',NULL,1,'99999999999','super','2024-06-17 12:27:42',NULL,1),(6963,'gestorUsuario','Gestor de Usuarios Example','gestorUsuario@a2solutions.com.br','1e5213b7cbc4d1780f09770123097879','2025-02-27',NULL,0,'2025-02-27',NULL,'S','N','N','n','n','N','S',1,'11111111111','gestorUsuario','2024-06-24 11:15:53',NULL,0),(6964,'gestorGrupo','gestorGrupo','gestorGrupo@a2solutios.com.br','1e5213b7cbc4d1780f09770123097879','2025-02-27',NULL,0,'2025-02-27',NULL,'N','S','N','n','n','N','S',3,'22222222222','gestorGrupo','2024-06-24 11:17:31',NULL,1),(6965,'gestorGrupo2','gestorGrupo2','gestorGrupo2@a2solutions.com.br','1e5213b7cbc4d1780f09770123097879','2025-02-27',NULL,0,'2025-02-27',NULL,'N','S','N','n','n','N','S',1,'33333333333','gestorGrupo2','2024-06-24 11:18:27',NULL,1),(6966,'si','Segurança Informação Compliance','si@a2solutios.com.br','1e5213b7cbc4d1780f09770123097879','2025-02-27',NULL,0,'2025-02-27',NULL,'N','N','N','n','n','N','S',1,'55555555555','si','2024-06-24 11:19:21',NULL,1),(6967,'sabado','sabado','sas@a.com','9f09c80239f4b8fadeae9a8bb4b95347','9999-01-01',NULL,0,NULL,NULL,'N','S','N','n','n','N','S',4,'','','2024-06-29 11:03:27',NULL,0),(6968,'domingo','domingo  gestor','dom@com.com','694d59d8f581012b111e383c0bf77aeb','9999-01-01',NULL,1,NULL,NULL,'S','S','N','n','n','N','S',2,'','','2024-06-30 10:21:08',NULL,0),(6969,'bellafreitas','Bella Freitas','bella@as.com','1e5213b7cbc4d1780f09770123097879','9999-01-01',NULL,0,'2024-08-25',NULL,'S','N','S','n','n','S','S',3,'','','2024-06-30 18:00:36',NULL,0),(6970,'micaela','Micaela  Lorem','mier@a.com','a880d7ec92a0ae841525fd5fdeee54c2','2024-07-27',NULL,1,'2024-08-03',NULL,'N','N','N','n','n','N','S',1,'20222222222','micaela123','2024-07-01 13:15:00',NULL,0),(6971,'Loginteste','Login Nome Teste','gerald@a.com','92ce02b9bebfd88a29dba3ef645b2976','9999-01-01',NULL,1,NULL,NULL,'N','N','N','n','n','N','S',1,'','','2024-07-02 15:07:47',NULL,0),(6972,'Leona','Leona Pet','leona@a.com','c5927266d9372447207353514ec9aa6d','9999-01-01',NULL,1,NULL,NULL,'N','N','N','n','n','N','S',5,'56598956598','','2024-07-03 10:42:20',NULL,0),(6973,'getstarted','Always Full','get@started.com','58409cc1651177b3b1d55b7abdff8ec6','2024-08-10',NULL,1,NULL,NULL,'S','S','S','n','n','S','S',3,'565999','','2024-07-30 15:34:18',NULL,0),(6974,'loremipsum','Loremip sum','lorem@more.com','4ecb8b9d8f0122e2c0c639711feced69','9999-01-01',NULL,1,NULL,NULL,'N','N','N','n','n','N','S',5,'56565898523','','2024-08-14 10:39:09',NULL,0),(6975,'joaosilva','Joao da Silva','joao@a2.com','271125cf363e4ff155cf6ccbaa9cb9fa','9999-01-01',NULL,1,NULL,NULL,'N','N','N','n','n','S','S',5,'26565353565','','2024-08-14 10:41:40',NULL,0),(6976,'larissa211','Larissa Silva','lari@a.com','508dd8894702aad501cfbbd7ff63dfff','9999-01-01',NULL,1,'2024-09-30',NULL,'S','N','N','N','N','S','S',5,'56889656565','','2024-09-25 13:11:26',NULL,0),(6977,'supermario','Super Maria','maria@nitendo.com','654b87f74c0b1bc82c687895e0f16b34','9999-01-01',NULL,1,NULL,NULL,'S','S','N','N','N','S','S',1,'65656898983','','2024-10-04 12:57:38',NULL,0);
/*!40000 ALTER TABLE `lgn_logins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-16  9:48:45
