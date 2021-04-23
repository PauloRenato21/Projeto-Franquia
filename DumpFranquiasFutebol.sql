-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: db_projeto_franquias_futebol
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `atleta`
--

DROP TABLE IF EXISTS `atleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atleta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `endereco_rua` varchar(50) DEFAULT NULL,
  `endereco_numero` varchar(5) DEFAULT NULL,
  `endereco_bairro` varchar(50) DEFAULT NULL,
  `endereco_CEP` varchar(10) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `problema_saude` varchar(100) DEFAULT NULL,
  `alergia` varchar(100) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fk_turma_id` int DEFAULT NULL,
  `fk_Responsavel_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_atleta_2` (`fk_turma_id`),
  KEY `FK_atleta_3` (`fk_Responsavel_id`),
  CONSTRAINT `FK_atleta_2` FOREIGN KEY (`fk_turma_id`) REFERENCES `turma` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `FK_atleta_3` FOREIGN KEY (`fk_Responsavel_id`) REFERENCES `responsavel` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atleta`
--

LOCK TABLES `atleta` WRITE;
/*!40000 ALTER TABLE `atleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `atleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clube_futebol`
--

DROP TABLE IF EXISTS `clube_futebol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clube_futebol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clube_futebol`
--

LOCK TABLES `clube_futebol` WRITE;
/*!40000 ALTER TABLE `clube_futebol` DISABLE KEYS */;
/*!40000 ALTER TABLE `clube_futebol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franquias`
--

DROP TABLE IF EXISTS `franquias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `franquias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  `endereco_rua` varchar(50) DEFAULT NULL,
  `endereco_numero` varchar(5) DEFAULT NULL,
  `endereco_bairro` varchar(50) DEFAULT NULL,
  `endereco_CEP` varchar(10) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fk_clube_futebol_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_franquias_2` (`fk_clube_futebol_id`),
  CONSTRAINT `FK_franquias_2` FOREIGN KEY (`fk_clube_futebol_id`) REFERENCES `clube_futebol` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franquias`
--

LOCK TABLES `franquias` WRITE;
/*!40000 ALTER TABLE `franquias` DISABLE KEYS */;
/*!40000 ALTER TABLE `franquias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `endereco_rua` varchar(50) DEFAULT NULL,
  `endereco_numero` varchar(5) DEFAULT NULL,
  `endereco_bairro` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fk_franquias_id` int DEFAULT NULL,
  `fk_cargo_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_funcionarios_2` (`fk_franquias_id`),
  KEY `FK_funcionarios_3` (`fk_cargo_id`),
  CONSTRAINT `FK_funcionarios_2` FOREIGN KEY (`fk_franquias_id`) REFERENCES `franquias` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `FK_funcionarios_3` FOREIGN KEY (`fk_cargo_id`) REFERENCES `cargo` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `responsavel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `grau_parentesco` varchar(100) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `local_trabalho` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsavel`
--

LOCK TABLES `responsavel` WRITE;
/*!40000 ALTER TABLE `responsavel` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsavel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `horario_inicial` time DEFAULT NULL,
  `horario_termino` time DEFAULT NULL,
  `fk_categoria_id` int DEFAULT NULL,
  `fk_franquias_id` int DEFAULT NULL,
  `fk_funcionarios_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_turma_2` (`fk_categoria_id`),
  KEY `FK_turma_3` (`fk_franquias_id`),
  KEY `FK_turma_4` (`fk_funcionarios_id`),
  CONSTRAINT `FK_turma_2` FOREIGN KEY (`fk_categoria_id`) REFERENCES `categoria` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `FK_turma_3` FOREIGN KEY (`fk_franquias_id`) REFERENCES `franquias` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `FK_turma_4` FOREIGN KEY (`fk_funcionarios_id`) REFERENCES `funcionarios` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-22 14:18:20
