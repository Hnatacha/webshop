-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: webshops
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `accessoire`
--

DROP TABLE IF EXISTS `accessoire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessoire` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessoire`
--

LOCK TABLES `accessoire` WRITE;
/*!40000 ALTER TABLE `accessoire` DISABLE KEYS */;
INSERT INTO `accessoire` VALUES (1,'Bague'),(2,'Chaine'),(3,'Makeup'),(4,'Lunettes'),(5,'Sandale'),(6,'Tenis'),(7,'Talon'),(8,'Ceinture'),(9,'Casquette'),(10,'Sac'),(12,'chapeau');
/*!40000 ALTER TABLE `accessoire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bonne_affaire`
--

DROP TABLE IF EXISTS `bonne_affaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonne_affaire` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `pourcentage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonne_affaire`
--

LOCK TABLES `bonne_affaire` WRITE;
/*!40000 ALTER TABLE `bonne_affaire` DISABLE KEYS */;
INSERT INTO `bonne_affaire` VALUES (1,'2022-09-30','2022-10-15',10),(2,'2022-09-01','2022-09-10',20),(3,'2022-09-15','2022-09-22',8),(4,'2022-09-22','2022-09-28',25),(5,'2022-09-27','2022-09-30',30);
/*!40000 ALTER TABLE `bonne_affaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Jupe'),(2,'Robe'),(3,'Pantalon'),(4,'T-Shirt'),(5,'Short'),(6,'Combi-Short'),(7,'Combi-Pantalon'),(8,'Samara'),(9,'Chemise'),(10,'Jeans');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `compte_id` bigint(20) NOT NULL,
  `date_commande` datetime NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_FK` (`compte_id`),
  CONSTRAINT `commande_FK` FOREIGN KEY (`compte_id`) REFERENCES `compte` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (10,5,'2022-10-05 09:56:48','WESP20221005RES127',2),(11,5,'2022-10-05 19:17:03','WESP20221005RES154',1),(12,6,'2022-10-13 21:05:50','WESP20221013RES65',1),(13,6,'2022-10-17 08:22:59','WESP20221017RES40',10),(14,6,'2022-10-17 10:34:31','WESP20221017RES189',1);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compte` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `datedeconfirmation` datetime NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compte`
--

LOCK TABLES `compte` WRITE;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
INSERT INTO `compte` VALUES (5,'hillary','chidjui','root@gmail.com','$2y$10$CskXgrAMkjlTfrSpvqT1w.cRWA2sm0wKP4bE9SMMjCEPLc5Ffiwpq','2022-10-05 09:56:27',NULL,NULL),(6,'chidjui','hillary','toto@gmail.com','$2y$10$fnXdylRLHSmIBB22ewR0HeQ07o9LL01Hrrr4U1Y.dEp51kFVwT56q','2022-10-11 09:35:41','56783','hillary'),(7,'hillary','chouameni','olivia@gmail.com','$2y$10$//HqKOFomIqDBwq82iy3k.rrf7CGEgr7T0sdBILJqwBlb.u8X2hn6','2022-10-25 07:06:25',NULL,NULL);
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `idcontact` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` text DEFAULT NULL,
  `date_message` datetime NOT NULL,
  `etat` varchar(256) NOT NULL,
  PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (15,'chidjui hillary','root@gmail.com','hello','2022-10-05 14:22:09','0');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscription_delete`
--

DROP TABLE IF EXISTS `inscription_delete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscription_delete` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `datedeconfirmation` datetime NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscription_delete`
--

LOCK TABLES `inscription_delete` WRITE;
/*!40000 ALTER TABLE `inscription_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscription_delete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ligne_commande` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) NOT NULL,
  `commande_id` bigint(20) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `prix` double DEFAULT 0,
  `prix_total` double DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `ligne_commande_FK` (`commande_id`),
  KEY `ligne_commande_FK_1` (`produit_id`),
  CONSTRAINT `ligne_commande_FK` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ligne_commande_FK_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne_commande`
--

LOCK TABLES `ligne_commande` WRITE;
/*!40000 ALTER TABLE `ligne_commande` DISABLE KEYS */;
INSERT INTO `ligne_commande` VALUES (13,1,10,1,152,152),(14,39,10,1,152,152),(15,39,11,1,152,152),(16,40,11,1,225,225),(17,5,12,1,455,455),(18,39,13,1,152,152),(19,1,13,1,152,152),(20,40,14,2,225,450);
/*!40000 ALTER TABLE `ligne_commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newletter`
--

DROP TABLE IF EXISTS `newletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newletter` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newletter`
--

LOCK TABLES `newletter` WRITE;
/*!40000 ALTER TABLE `newletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `newletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(80) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(200) NOT NULL,
  `rate` int(5) NOT NULL,
  `categorie_id` bigint(20) DEFAULT NULL,
  `saison_id` bigint(20) DEFAULT NULL,
  `accessoire_id` bigint(20) DEFAULT NULL,
  `bonne_affaire_id` bigint(20) DEFAULT NULL,
  `prix_reduction` float DEFAULT NULL,
  `quantite` bigint(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_FK` (`categorie_id`),
  KEY `produit_FK_1` (`saison_id`),
  KEY `produit_FK_2` (`accessoire_id`),
  KEY `produit_FK_3` (`bonne_affaire_id`),
  CONSTRAINT `produit_FK` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `produit_FK_1` FOREIGN KEY (`saison_id`) REFERENCES `saison` (`id`),
  CONSTRAINT `produit_FK_2` FOREIGN KEY (`accessoire_id`) REFERENCES `accessoire` (`id`),
  CONSTRAINT `produit_FK_3` FOREIGN KEY (`bonne_affaire_id`) REFERENCES `bonne_affaire` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'Produit 1',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/women-02.jpg',4,1,2,NULL,2,121.6,0),(2,'Produit 2',458,'etyuiojhgfddfghjkkjhg fghjklkjhg bgyuikjn zdfghj','../assets/images/women-01.jpg',3,2,2,NULL,3,421,0),(3,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/women-03.jpg',4,3,2,NULL,3,139.84,0),(4,'Produit ',150,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/men-02.jpg',3,4,1,NULL,4,112.5,0),(5,'Produit ',455,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/men-01.jpg',4,5,2,NULL,1,409.5,0),(6,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/men-03.jpg',1,6,4,NULL,3,139.84,0),(7,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/pantalon.jpg',3,3,1,NULL,5,136.7,0),(8,'Produit ',117,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/RedPant.jpg',3,8,1,NULL,2,93.6,0),(9,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/kid-02.jpg',4,2,3,NULL,1,136.8,0),(10,'Produit ',155,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/kid-01.jpg',3,1,1,NULL,5,108.5,0),(11,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/kid-03.jpg',4,2,4,NULL,1,136.8,0),(12,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/pull03.jpg',9,4,1,NULL,3,139.84,0),(13,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/robe-zip.jpg',2,2,3,NULL,1,84.8,0),(14,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/robe-zip02.jpg',2,2,4,NULL,4,114,0),(15,'Produit ',225,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/PSgreen.jpg',5,1,1,NULL,5,157.5,0),(16,'Produit ',600,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/pantalon-short.jpg',3,3,4,NULL,3,552,0),(17,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/manteau-robe.jpg',2,2,4,NULL,2,121.6,0),(18,'Produit ',375,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/women-02.jpg',2,9,4,NULL,3,345,0),(19,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/pantalon-sport.jpg',3,3,3,NULL,2,114,0),(20,'Produit ',820,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/pantalon-vert-chemise.jpg',3,3,4,NULL,1,738,0),(21,'Produit ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/manteau-hiver.jpg',4,2,1,NULL,5,106.4,0),(22,'Produit ',100,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/manteau-vert-hiver.jpg',3,1,1,NULL,4,75,0),(23,'Produit ',425,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/women-03.jpg',3,10,3,NULL,5,297.5,0),(24,'Produit ',458,'etyuiojhgfddfghjkkjhg fghjklkjhg bgyuikjn zdfghj','../assets/images/women-01.jpg',2,8,2,NULL,2,366.4,0),(25,'Produit',350,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/women-01.jpg',2,7,4,NULL,4,262.5,0),(26,'Accessoire 1',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-01.jpg',4,9,2,7,NULL,121.6,0),(27,'Accessoire 2',458,'etyuiojhgfddfghjkkjhg fghjklkjhg bgyuikjn zdfghj','../assets/images/accessoir-02.jpg',3,6,2,9,NULL,421,0),(28,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-03.jpg',4,6,2,9,NULL,139.84,0),(29,'Accessoire ',150,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-04.jpg',3,9,1,9,NULL,112.5,0),(30,'Accessoire ',455,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-05.jpg',4,9,2,9,NULL,409.5,0),(31,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-06.jpg',1,9,2,9,NULL,139.84,0),(32,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-07.jpg',4,2,1,9,NULL,136.7,0),(33,'Accessoire ',117,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-08.jpg',2,3,1,6,NULL,93.6,0),(34,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-09.jpg',4,1,3,6,NULL,136.8,0),(35,'Accessoire ',155,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-10.jpg',3,8,1,7,NULL,108.5,0),(36,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-11.jpg',4,8,4,7,NULL,136.8,1520),(37,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-12.jpg',2,8,4,5,NULL,139.84,0),(38,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-13.jpg',1,5,3,7,NULL,84.8,0),(39,'Accessoire ',152,'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd','../assets/images/accessoir-14.jpg',3,8,4,5,NULL,114,0),(40,'Accessoire ',225,'un texte en faux latin, le Lorem ipsum ou Lipsum.','../assets/images/accessoir-15.jpg',5,1,1,7,NULL,157.5,30),(51,'Men\'s Terry Cloth Organic Cotton Robe',52,'tetdfsf dsfsfsfdsf sf ','../assets/images/20221019005140634f2dfcdfa98.jfif',3,2,4,NULL,NULL,50,12),(52,'Jean mom fit bleu-clair',22,'teer ffdfdffdfddddddddddddxc','../assets/images/20221019005417634f2e99306c8.jpg',3,5,4,NULL,NULL,18,52);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saison`
--

DROP TABLE IF EXISTS `saison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saison` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saison`
--

LOCK TABLES `saison` WRITE;
/*!40000 ALTER TABLE `saison` DISABLE KEYS */;
INSERT INTO `saison` VALUES (1,'Hiver'),(2,'Automne'),(3,'Printemps'),(4,'Eté');
/*!40000 ALTER TABLE `saison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_commande`
--

DROP TABLE IF EXISTS `status_commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_commande` (
  `id` bigint(25) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_commande`
--

LOCK TABLES `status_commande` WRITE;
/*!40000 ALTER TABLE `status_commande` DISABLE KEYS */;
INSERT INTO `status_commande` VALUES (1,'En cours','ENCR',NULL),(2,'Valider','VALD',NULL),(10,'Annuler','ANUL',NULL);
/*!40000 ALTER TABLE `status_commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'webshops'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-16 16:38:16
