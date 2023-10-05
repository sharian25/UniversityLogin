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
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(500) DEFAULT NULL,
  `CORREO` varchar(500) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `PASS` varchar(200) DEFAULT NULL,
  `DIRECCION` varchar(500) DEFAULT NULL,
  `NACIMIENTO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Lucas Martínez','admin@admin',1,'$2y$10$VCL4zpeNRP8gaP9OpmvVUOlqM7Ow6i1JdQUMUvH9jWhJrnNvMir.6',NULL,NULL),(2,'Valentina García','admin2@admin',1,'$2y$10$VCL4zpeNRP8gaP9OpmvVUOlqM7Ow6i1JdQUMUvH9jWhJrnNvMir.6',NULL,NULL);
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
  `ID_ROL` int(20) DEFAULT NULL,
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
INSERT INTO `alumnos` VALUES (1,1025654545,'Lucas Martinez','alumno@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G','123 centro','2002-03-04',3,'315-1354568'),(2,1056489463,'Valentina Garcia','alumno2@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G','south park','1992-10-10',3,'+573157143665'),(3,1478956259,'Alejandro Gonzales','alumno3@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G','Canada Central 54f-54','2000-10-25',3,'3215648954'),(4,1659874563,'Sofia Rodriguez','alumno4@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G','2589 esquina y broway','1980-12-24',3,'3356987451'),(5,NULL,'Mateo Fernández','alumno5@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(6,NULL,'Isabella López','alumno6@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(7,NULL,'Nicolás Pérez','alumno7@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(8,NULL,'Camila Díaz','alumno8@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(9,NULL,'Leonardo Torres','alumno9@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(10,NULL,'Victoria Ruiz','alumno10@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(11,NULL,'Daniel Ramírez','alumno11@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(12,NULL,'Renata Herrera','alumno12@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(13,NULL,'Sebastián Castro','alumno13@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(14,NULL,'Emma Flores','alumno14@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(15,NULL,'Adrián Sánchez','alumno15@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(16,NULL,'Julia Gómez','alumno16@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(17,NULL,'Samuel Vargas','alumno17@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(18,NULL,'Emilia Castro','alumno18@alumno','$2y$10$AAn3V/.zury1Das6tbGDvuAQEBJd283Ls4PIAr4E1sEJbMTeZ2V.G',NULL,NULL,3,NULL),(23,1236455,'Ricardo Turbaco','alumno23@alumno','$2y$10$315BfzwXJgY6gh75bK.ScOkYphHXAFHv4tHPdqXVm5XUDRN58YN..','casa azul junto al edificio','1950-05-26',3,'55-987456'),(24,7569236,'Sara valentina SalCo','alumno24@alumno','$2y$10$HtvKESZRKf/56tiG1BQkyO3e3XXST5PJqAXjpWIu/ounn5knU7UIq','Donde mi papá','2001-09-19',3,'555-458963');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos_clases`
--

DROP TABLE IF EXISTS `alumnos_clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos_clases` (
  `AC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNOS` int(11) DEFAULT NULL,
  `ID_CLASES` int(11) DEFAULT NULL,
  `MENSAJE` text DEFAULT NULL,
  PRIMARY KEY (`AC_ID`),
  KEY `alumnos_clases_ibfk_1` (`ID_ALUMNOS`),
  KEY `alumnos_clases_ibfk_2` (`ID_CLASES`),
  CONSTRAINT `alumnos_clases_ibfk_1` FOREIGN KEY (`ID_ALUMNOS`) REFERENCES `alumnos` (`ID`),
  CONSTRAINT `alumnos_clases_ibfk_2` FOREIGN KEY (`ID_CLASES`) REFERENCES `clases` (`ID_CLASES`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos_clases`
--

LOCK TABLES `alumnos_clases` WRITE;
/*!40000 ALTER TABLE `alumnos_clases` DISABLE KEYS */;
INSERT INTO `alumnos_clases` VALUES (1,10,1,NULL),(2,11,1,NULL),(3,12,2,NULL),(4,13,2,NULL),(6,15,13,NULL),(7,16,12,NULL),(8,17,4,NULL),(9,18,4,NULL),(10,5,13,NULL),(11,6,12,NULL),(12,7,8,NULL),(13,8,13,NULL),(14,9,4,NULL),(17,1,4,NULL),(18,2,NULL,NULL),(19,3,NULL,NULL),(32,10,7,NULL),(33,11,6,NULL),(34,12,6,NULL),(35,13,NULL,NULL),(36,14,NULL,NULL),(37,15,NULL,NULL),(38,16,NULL,NULL),(39,17,NULL,NULL),(40,18,NULL,NULL),(41,5,NULL,NULL),(42,6,NULL,NULL),(43,7,NULL,NULL),(44,8,NULL,NULL),(45,9,NULL,NULL),(47,24,NULL,NULL),(48,1,NULL,NULL),(49,2,NULL,NULL),(50,3,NULL,NULL),(51,4,NULL,NULL),(158,10,8,NULL),(160,10,5,NULL),(163,10,3,NULL),(173,NULL,2,NULL),(174,NULL,3,NULL),(175,NULL,4,NULL),(176,NULL,1,NULL),(177,NULL,3,NULL),(178,NULL,1,NULL),(179,NULL,3,NULL),(180,NULL,1,NULL),(181,NULL,6,NULL),(182,NULL,4,NULL),(183,NULL,4,NULL),(184,NULL,1,NULL),(188,23,12,NULL),(189,23,2,NULL),(190,23,13,NULL),(191,23,7,NULL),(192,23,4,NULL),(193,23,3,NULL),(194,4,7,NULL),(195,4,13,NULL),(196,4,4,NULL),(197,NULL,1,NULL),(198,NULL,1,NULL),(199,NULL,1,NULL),(200,NULL,1,NULL),(201,NULL,1,NULL);
/*!40000 ALTER TABLE `alumnos_clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `ID_CLASES` int(11) NOT NULL AUTO_INCREMENT,
  `CLASE` varchar(500) NOT NULL,
  `MAESTRO` varchar(500) DEFAULT NULL,
  `INSCRITOS` varchar(500) DEFAULT NULL,
  `ID_MAESTROS` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_CLASES`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (1,'Introducción a la Ciencia de la Computación',NULL,NULL,NULL),(2,'Historia del Arte Contemporáneo',NULL,NULL,NULL),(3,'Economía Global IV',NULL,NULL,NULL),(4,'Psicología del Desarrollo Humano',NULL,NULL,NULL),(5,'Química Orgánica Avanzada',NULL,NULL,NULL),(6,'Literatura Comparada',NULL,NULL,NULL),(7,'Ingeniería de Sistemas Distribuidos',NULL,NULL,NULL),(8,'Biología Molecular y Genética',NULL,NULL,NULL),(12,'Amplificadores Diferenciales',NULL,NULL,NULL),(13,'Filosofia Politica II',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` VALUES (1,'Estaban Jaramillo','maestro2@maestro','al lado de la playa','1985-10-03',NULL,2,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','596564','5558956'),(2,'Susana Contreras','maestro1@maestro','donde mi abuela','1992-04-05',NULL,2,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','156898987','5555-123648'),(5,'Mateo Fernández','maestro4@maestro',NULL,NULL,NULL,2,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(6,'Maria E. Giraldo','maestro6@maestro','en un edificio de 5pisos','1992-10-10',NULL,2,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','52985645','55565489856'),(7,'John Doe','maestro16@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(8,'Jane Smith','maestro7@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(9,'Michael Johnson','maestro8@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(10,'Emily Davis','maestro9@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(11,'William Miller','maestro10@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(12,'Olivia Wilson','maestro11@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(13,'James Anderson','maestro12@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(14,'Sophia Moore','maestro13@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(15,'Daniel Taylor','maestro14@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','',''),(16,'Ava Brown','maestro15@maestro',NULL,NULL,NULL,NULL,'$2y$10$xHhFNHNjR7hh0xZ7e20JbOLXnPx4agaTsw5cJUmtAy80RmFAE9/pm','','');
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros_clases`
--

DROP TABLE IF EXISTS `maestros_clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestros_clases` (
  `MC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MAESTROS` int(11) DEFAULT NULL,
  `ID_CLASES` int(11) DEFAULT NULL,
  `MENSAJE` text DEFAULT NULL,
  PRIMARY KEY (`MC_ID`),
  KEY `ID_MAESTROS` (`ID_MAESTROS`),
  KEY `ID_CLASES` (`ID_CLASES`),
  CONSTRAINT `maestros_clases_ibfk_1` FOREIGN KEY (`ID_MAESTROS`) REFERENCES `maestros` (`ID_MAESTROS`),
  CONSTRAINT `maestros_clases_ibfk_2` FOREIGN KEY (`ID_CLASES`) REFERENCES `clases` (`ID_CLASES`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros_clases`
--

LOCK TABLES `maestros_clases` WRITE;
/*!40000 ALTER TABLE `maestros_clases` DISABLE KEYS */;
INSERT INTO `maestros_clases` VALUES (2,6,1,NULL),(3,5,12,NULL),(4,5,12,NULL),(5,5,4,NULL),(6,1,1,NULL),(7,6,8,NULL),(10,2,2,NULL),(11,2,5,NULL),(16,2,7,NULL),(17,2,7,NULL),(19,5,3,NULL);
/*!40000 ALTER TABLE `maestros_clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `ID_PERMISOS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ADMIN` varchar(500) DEFAULT NULL,
  `ID_MAESTROS` varchar(500) DEFAULT NULL,
  `ID` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_PERMISOS`)
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

-- Dump completed on 2023-10-05 12:49:08
