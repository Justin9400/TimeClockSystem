-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: timeclocksystem
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Current Database: `timeclocksystem`
--

/*!40000 DROP DATABASE IF EXISTS `timeclocksystem`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `timeclocksystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `timeclocksystem`;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `ID` int(5) DEFAULT NULL,
  `ClockInDate` date DEFAULT NULL,
  `ClockInTime` time DEFAULT NULL,
  `ClockOutDate` date DEFAULT NULL,
  `ClockOutTime` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (37931,'2022-04-25','14:51:34','2022-04-25','14:51:47'),(37931,'2022-04-25','11:47:15','2022-04-25','14:51:15'),(37931,'2022-04-25','11:46:57','2022-04-25','11:47:05'),(37931,'2022-04-25','11:17:11','2022-04-25','11:17:57'),(37931,'2022-04-23','18:39:16','2022-04-23','18:59:01'),(37931,'2022-04-23','18:38:34','2022-04-23','18:38:42'),(37931,'2022-04-25','15:15:26','2022-04-25','15:15:36');
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userid`
--

DROP TABLE IF EXISTS `userid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userid` (
  `ID` int(5) DEFAULT NULL,
  `FirstName` varchar(16) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Position` varchar(25) DEFAULT NULL,
  `Password` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userid`
--

LOCK TABLES `userid` WRITE;
/*!40000 ALTER TABLE `userid` DISABLE KEYS */;
INSERT INTO `userid` VALUES (37931,'Will','Briggs','Yes','$2y$10$yKNpvtNkXb7Bde8MaZZ.m.T0oaMSPq5R3csfy5cOv.E5I7m6LuB0G'),(32084,'Justin','Kachornvanich','No','$2y$10$6Bg03F4YtpZla0JKC7LbFO0sfhi7lrC6KXFBTGzODtKcFJyS2.PY6'),(27020,'Sean ','Novak','Yes','$2y$10$5IjGTKDIqi2xIyx3KtTSW.Q2dlFVgZVdypXHrAtnYuwJGJRzjqZQq');
/*!40000 ALTER TABLE `userid` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-25 19:24:27
