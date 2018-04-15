CREATE DATABASE  IF NOT EXISTS `store` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `store`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: store
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_key` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `hotels_id` int(11) NOT NULL,
  `checked` tinyint(4) DEFAULT '-1',
  PRIMARY KEY (`id`),
  KEY `fk_bookings_guest_key_idx` (`guest_key`),
  KEY `fk_bookings_hotels_id_idx` (`hotels_id`),
  CONSTRAINT `fk_bookings_guest_key` FOREIGN KEY (`guest_key`) REFERENCES `guests` (`key`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bookings_hotels_id` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (4,'5ad2a1af72b9b','2018-04-14 20:49:55','2018-04-14 20:49:55',1,1),(5,'5ad2a1af72b9b','2018-04-14 20:55:31','2018-04-14 20:55:31',1,1),(6,'5ad2a1af72b9b','2018-04-14 20:55:37','2018-04-14 20:55:37',1,1),(7,'5ad2a1af72b9b','2018-04-14 20:56:30','2018-04-14 20:56:30',1,-1),(8,'5ad2a1af72b9b','2018-04-14 20:56:31','2018-04-14 20:56:31',1,-1),(9,'5ad2a1af72b9b','2018-04-14 20:56:32','2018-04-14 20:56:32',1,-1),(10,'5ad2a1af72b9b','2018-04-14 20:56:44','2018-04-14 20:56:44',1,-1);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(45) NOT NULL,
  `key` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (1,'Harir','Khorsandi','harir.khorsand@gmail.com','2018-04-14 19:07:28','2018-04-14 19:07:28','xddd','5ad289b0382f6'),(2,'Harir','Khorsandi','harir.khorsand3@gmail.com','2018-04-14 19:10:27','2018-04-14 19:10:27','www','5ad28a63cc566'),(3,'Harir','Khorsandi','harir.khorsand4@gmail.com','2018-04-14 19:11:20','2018-04-14 19:11:20','ee','5ad28a981cd02'),(4,'Harir','Khorsandi','harir.khorsand7@gmail.com','2018-04-14 19:11:52','2018-04-14 19:11:52','sss','5ad28ab827120'),(5,'Harir','Khorsandi','harir.khorsand9@gmail.com','2018-04-14 19:12:35','2018-04-14 19:12:35','www','5ad28ae30a32b'),(6,'Harir','Khorsandi','harir.khorsand8@gmail.com','2018-04-14 20:41:38','2018-04-14 20:41:38','dfgdfgdf','5ad29fc23ae42'),(7,'Harir','Khorsandi','harir.khorsand1@gmail.com','2018-04-14 20:47:19','2018-04-14 20:47:19','sdsdfdsfsdfsd','5ad2a11712802'),(8,'Harir','Khorsandi','harir.khorsand2@gmail.com','2018-04-14 20:49:51','2018-04-14 20:49:51','sdcdsfsd','5ad2a1af72b9b'),(9,'%','%','harir.khorsand5@gmail.com','2018-04-14 21:53:21','2018-04-14 21:53:21','ddd','5ad2b091b4655');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` blob NOT NULL,
  `picture` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Hilton Hotel','Hilton hotel description is here','images/hilton.jpg'),(2,'Sheraton hotel','Sheraton hotel description is here','images/sheraton.jpg');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-14 23:01:27
