-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: university
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(500) DEFAULT NULL,
  `CORREO` varchar(500) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `PASS` varchar(200) DEFAULT NULL,
  `DIRECCION` varchar(500) DEFAULT NULL,
  `NACIMIENTO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Lucas Martínez','admin@admin',1,'admin',NULL,NULL),(2,'Valentina García','admin2@admin',1,'admin',NULL,NULL);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` int(100) DEFAULT NULL,
  `NOMBRE` varchar(500) DEFAULT NULL,
  `CORREO` varchar(500) DEFAULT NULL,
  `PASS` varchar(500) DEFAULT NULL,
  `DIRECCION` varchar(500) DEFAULT NULL,
  `NACIMIENTO` varchar(500) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DNI` (`DNI`,`CORREO`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,1025654545,'Lucas Martinez','alumno@alumno','alumno','123 centro','2002-03-04',3,'315-1354568'),(2,1056489463,'Valentina Garcia','alumno2@alumno','alumno','south park','1992-10-10',3,'+573157143665'),(3,1478956259,'Alejandro Gonzales','alumno3@alumno','alumno','Canada Central 54f-54','2000-10-25',3,'3215648954'),(4,1659874563,'Sofia Rodriguez','alumno4@alumno','alumno','2589 esquina y broway','1980-12-24',3,'3356987451'),(5,NULL,'Mateo Fernández','alumno5@alumno','alumno',NULL,NULL,3,NULL),(6,NULL,'Isabella López','alumno6@alumno','alumno',NULL,NULL,3,NULL),(7,NULL,'Nicolás Pérez','alumno7@alumno','alumno',NULL,NULL,3,NULL),(8,NULL,'Camila Díaz','alumno8@alumno','alumno',NULL,NULL,3,NULL),(9,NULL,'Leonardo Torres','alumno9@alumno','alumno',NULL,NULL,3,NULL),(10,NULL,'Victoria Ruiz','alumno10@alumno','alumno',NULL,NULL,3,NULL),(11,NULL,'Daniel Ramírez','alumno11@alumno','alumno',NULL,NULL,3,NULL),(12,NULL,'Renata Herrera','alumno12@alumno','alumno',NULL,NULL,3,NULL),(13,NULL,'Sebastián Castro','alumno13@alumno','alumno',NULL,NULL,3,NULL),(14,NULL,'Emma Flores','alumno14@alumno','alumno',NULL,NULL,3,NULL),(15,NULL,'Adrián Sánchez','alumno15@alumno','alumno',NULL,NULL,3,NULL),(16,NULL,'Julia Gómez','alumno16@alumno','alumno',NULL,NULL,3,NULL),(17,NULL,'Samuel Vargas','alumno16@alumno','alumno',NULL,NULL,3,NULL),(18,NULL,'Emilia Castro','alumno18@alumno','alumno',NULL,NULL,3,NULL),(23,1236455,'Ricardo Turbaco','alumno23@alumno','$2y$10$315BfzwXJgY6gh75bK.ScOkYphHXAFHv4tHPdqXVm5XUDRN58YN..','casa azul junto al edificio','1950-05-26',NULL,'55-987456'),(24,7569236,'Sara valentina SalCo','alumno24@alumno','$2y$10$HtvKESZRKf/56tiG1BQkyO3e3XXST5PJqAXjpWIu/ounn5knU7UIq','Donde mi papá','2001-09-19',NULL,'555-458963');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLASE` varchar(500) DEFAULT NULL,
  `MAESTRO` varchar(500) DEFAULT NULL,
  `INSCRITOS` int(100) DEFAULT NULL,
  `ID_MAESTROS` int(11) DEFAULT NULL,
  `MAESTROS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_maestro` (`ID_MAESTROS`),
  CONSTRAINT `fk_maestro` FOREIGN KEY (`ID_MAESTROS`) REFERENCES `maestros` (`ID_MAESTROS`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (1,'Introducción a la Ciencia de la Computación',NULL,NULL,NULL,NULL),(2,'Historia del Arte Contemporáneo',NULL,NULL,NULL,NULL),(3,'Economía Global',NULL,NULL,NULL,NULL),(4,'Psicología del Desarrollo Humano',NULL,NULL,NULL,NULL),(5,'Química Orgánica Avanzada',NULL,NULL,NULL,NULL),(6,'Literatura Comparada',NULL,NULL,NULL,NULL),(7,'Ingeniería de Sistemas Distribuidos',NULL,NULL,NULL,NULL),(8,'Biología Molecular y Genética',NULL,NULL,NULL,NULL),(9,'Filosofía Política',NULL,NULL,NULL,NULL),(10,'Marketing Estratégico',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros`
--

DROP TABLE IF EXISTS `maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestros` (
  `ID_MAESTROS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(500) DEFAULT NULL,
  `CORREO` varchar(500) DEFAULT NULL,
  `DIRECCION` varchar(500) DEFAULT NULL,
  `NACIMIENTO` varchar(500) DEFAULT NULL,
  `ASIGNADAS` varchar(100) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `PASS` varchar(200) DEFAULT NULL,
  `DNI` varchar(100) NOT NULL,
  `TELEFONO` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_MAESTROS`),
  UNIQUE KEY `CORREO` (`CORREO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` VALUES (1,'Estaban Jaramillo','maestro@maestro','al lado de la playa','1973-05-03',NULL,2,'maestro','596564','555-89654'),(2,'Susana Contreras','maestro1@maestro','donde mi abuela','1992-04-05',NULL,2,'maestro','156898987','5555-123648'),(5,'Mateo Fernández','maestro4@maestro',NULL,NULL,NULL,2,'maestro','',''),(6,'Maria E. Giraldo','maestro6@maestro','en un edificio de 5pisos','1992-10-10',NULL,2,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','52985645','55565489856');
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(500) DEFAULT NULL,
  `PERMISO` varchar(500) DEFAULT NULL,
  `ESTADO` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `roles` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'maestros'),(3,'alumnos');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'university'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-03 12:32:06
