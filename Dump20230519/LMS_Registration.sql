-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: LMS
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

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
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mobileno` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(233) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `hobbies` text,
  `profile` varchar(233) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registration`
--

LOCK TABLES `Registration` WRITE;
/*!40000 ALTER TABLE `Registration` DISABLE KEYS */;
INSERT INTO `Registration` VALUES (1,'Rutul Sheladiya','8320893080','rutulsheladiya2@gmail.com','$2y$10$vDt2a5wLVJtm4xSRDRvm0uBfBLvIDvs0qeLsGrimOZ0VjQVSfMTa6','male','cricket,chess,','Screenshot from 2023-05-17 14-28-11.png','2023-05-17 14:04:58',1,''),(2,'Ravi Mandani','8963214785','ravimandani@gmail.com','$2y$10$Cab4Z1O0onJTfPCwRWmVPemTJlCwbDXRMpRYWv3L/amq0Dutp3bga','male','cricket,chess,','Screenshot from 2023-05-16 18-55-52.png','2023-05-17 14:05:15',1,''),(3,'Purvish ','7412369850','purvishdhameliya@gmail.com','$2y$10$JJmy3hQ99XOE6nn/jPV8oOp4QGnOTHNMSu7XA1z/WfI4oJ12GKzHO','male','cricket,chess,','Screenshot from 2023-05-17 14-28-11.png','2023-05-17 14:05:34',1,''),(4,'Sumit','9632147855','sumitrajput@gmail.com','$2y$10$25uaANXR9FYvx1HrfXUucum2zzna0Lt9mYwHxQS6cO0hwnEWEdUC.','male','chess,football,','Screenshot from 2023-05-17 14-49-46.png','2023-05-17 14:06:00',1,''),(5,'Rutul Sheladiya','8320893080','rutulsheladiya2731@gmail.com','$2y$10$D0hPjKntMGZ7d9XveHZ4y.HxNDjdjKuNYflKi7XXHOe73qZDl.Mnu','male','cricket,chess,football,','Screenshot from 2023-05-17 14-28-11.png','2023-05-18 12:26:23',1,''),(6,'Mukund','8320893080','mayur@gmail.com','$2y$10$FlpxTlkIysyQWTDWogwrZ.y/AubkLhgLb2C4V6RDzNpAR5D8AIFKy','male','cricket,','Screenshot from 2023-05-16 18-55-52.png','2023-05-19 04:56:56',1,NULL);
/*!40000 ALTER TABLE `Registration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-19 20:35:05
