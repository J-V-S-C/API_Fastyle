/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Fastyle
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `CNPJ` varchar(18) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Senha` varchar(255) NOT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Login` (`Email`),
  UNIQUE KEY `idx_cpf` (`CPF`),
  UNIQUE KEY `idx_cnpj` (`CNPJ`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`CPF` is not null or `CNPJ` is not null),
  CONSTRAINT `CONSTRAINT_2` CHECK (`CPF` is null or `CNPJ` is null)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` VALUES
(22,'Bill Gates','99999999999','7777777777',NULL,'Bill@Gates.com','senhaGates','Mansão Gates'),
(24,'Benjamin Pinto','96996996999','7377777777',NULL,'fake@Gates.com','senhapika','Mansão Gates'),
(25,'João Victor','12345678900','777666555',NULL,'joao@email.com','senha','Rua de Ouro');
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Fornecedor`
--

DROP TABLE IF EXISTS `Fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Fornecedor` (
  `CNPJ` varchar(14) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Fornecedor`
--

LOCK TABLES `Fornecedor` WRITE;
/*!40000 ALTER TABLE `Fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `Fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Funcionarios`
--

DROP TABLE IF EXISTS `Funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Funcionarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) DEFAULT NULL,
  `CPF` varchar(14) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `Salario` int(11) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CPF` (`CPF`),
  UNIQUE KEY `CNPJ` (`CNPJ`),
  CONSTRAINT `CPF_CNPJ` CHECK (`CPF` is not null or `CNPJ` is not null)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Funcionarios`
--

LOCK TABLES `Funcionarios` WRITE;
/*!40000 ALTER TABLE `Funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lote`
--

DROP TABLE IF EXISTS `Lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lote` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) DEFAULT NULL,
  `Data` varchar(10) DEFAULT NULL,
  `Localizacao` varchar(100) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `Cor` varchar(50) DEFAULT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Tamanho` varchar(20) DEFAULT NULL,
  `Preco` int(11) DEFAULT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `FuncionarioID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `CNPJ` (`CNPJ`),
  KEY `fk_funcionario` (`FuncionarioID`),
  CONSTRAINT `Lote_ibfk_1` FOREIGN KEY (`CNPJ`) REFERENCES `Fornecedor` (`CNPJ`),
  CONSTRAINT `fk_funcionario` FOREIGN KEY (`FuncionarioID`) REFERENCES `Funcionarios` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lote`
--

LOCK TABLES `Lote` WRITE;
/*!40000 ALTER TABLE `Lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `Lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedido`
--

DROP TABLE IF EXISTS `Pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedido` (
  `ProdutoID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `Data` datetime DEFAULT NULL,
  PRIMARY KEY (`ProdutoID`,`ClienteID`),
  KEY `ClienteID` (`ClienteID`),
  CONSTRAINT `Pedido_ibfk_1` FOREIGN KEY (`ProdutoID`) REFERENCES `Produtos` (`ID`),
  CONSTRAINT `Pedido_ibfk_2` FOREIGN KEY (`ClienteID`) REFERENCES `Cliente` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedido`
--

LOCK TABLES `Pedido` WRITE;
/*!40000 ALTER TABLE `Pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produtos`
--

DROP TABLE IF EXISTS `Produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produtos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Avaliacao` varchar(500) DEFAULT NULL,
  `Descricao` varchar(500) DEFAULT NULL,
  `LoteID` int(11) NOT NULL,
  `FuncionarioID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `LoteID` (`LoteID`),
  KEY `FuncionarioID` (`FuncionarioID`),
  CONSTRAINT `Produtos_ibfk_1` FOREIGN KEY (`LoteID`) REFERENCES `Lote` (`ID`),
  CONSTRAINT `Produtos_ibfk_2` FOREIGN KEY (`FuncionarioID`) REFERENCES `Funcionarios` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produtos`
--

LOCK TABLES `Produtos` WRITE;
/*!40000 ALTER TABLE `Produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-05 16:54:23
