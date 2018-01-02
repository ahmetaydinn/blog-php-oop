-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

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
-- Current Database: `blog`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `blog`;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Victor','victor','1234');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `remark` longtext,
  `post_id` int(11) DEFAULT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_comment_1_idx` (`post_id`),
  CONSTRAINT `fk_comment_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'Arthur Nogueira','arthur.nogueira@gmail.com','http://blog.arthurnogueira.com.br','Donec sodales augue felis. Maecenas tempor faucibus elit. Nunc pellentesque hendrerit felis ut auctor. Pellentesque tincidunt suscipit elit eget dapibus. Donec rutrum massa non dolor efficitur egestas. Pellentesque sagittis et tellus eu ultricies. Sed ultrices arcu nec orci semper aliquam. Vestibulum condimentum quis diam vitae finibus. Vivamus pretium lacus sed neque congue consectetur. In non purus in orci interdum porta ac et leo. Sed pretium dolor ornare, gravida mi vel, posuere ex. Morbi a facilisis mauris, vel viverra orci. Nam maximus augue metus, ac iaculis felis pellentesque et. Aenean porta justo lectus, vitae lobortis massa efficitur ut.\r\n\r\nNam magna purus, pellentesque quis interdum id, bibendum at mauris. Sed lectus urna, bibendum ac tellus hendrerit, molestie placerat mi. Quisque purus ante, ullamcorper vitae eleifend ut, vulputate sit amet eros. Nulla hendrerit sed enim et ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lorem id purus mollis eleifend. Nullam quis mauris ac libero iaculis ultricies at in risus. Pellentesque eget convallis felis. Curabitur laoreet condimentum efficitur. Ut ut mauris sed lectus sodales imperdiet sed in mauris. Pellentesque et erat luctus, dignissim tellus nec, sagittis metus. Nulla sed diam vel eros malesuada dictum. Nunc aliquet vulputate augue, cursus tristique orci vestibulum quis. Quisque et massa lacus. Integer urna elit, scelerisque fermentum felis ut, ultrices feugiat tortor. Praesent mattis lectus a ex lobortis sagittis.',12,'2018-01-02 16:42:12'),(2,'Mary','mary122334@gmail.com','','Phasellus dictum justo sapien, at ultricies nunc ornare et. Nulla a lectus hendrerit, interdum felis eu, egestas mauris. Aliquam at eleifend libero. Quisque vel feugiat nulla. Duis vulputate maximus nisi a pellentesque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur felis eros, accumsan et sodales vestibulum, blandit in eros. Quisque eget dolor sit amet felis commodo porttitor in tincidunt sapien. Suspendisse et lacus eget augue suscipit tempus. Curabitur non ultrices odio.\r\n\r\nFusce quam neque, porta ullamcorper maximus in, pretium sed orci. Maecenas ac tincidunt augue, nec mattis tellus. Suspendisse sit amet scelerisque lectus, dignissim tempus nibh. Integer sit amet volutpat elit. Morbi sit amet nisi lorem. Fusce sit amet ligula arcu. Suspendisse luctus diam eget augue accumsan, sed pulvinar massa condimentum.\r\n\r\nProin ac laoreet sapien. Aliquam finibus risus eget luctus varius. Nulla interdum diam nec metus dignissim, vel ornare tortor hendrerit. Proin ultrices tellus quis tortor blandit ornare. Nulla iaculis posuere ipsum, nec accumsan arcu elementum vitae. Sed imperdiet nulla varius magna tincidunt lacinia. Praesent ultrices sem tortor, vitae aliquet leo malesuada ac.',12,'2018-01-02 16:43:38');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` longtext,
  `author_id` int(11) DEFAULT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_post_1_idx` (`author_id`),
  CONSTRAINT `fk_post_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (12,'Post Test','&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: &#039;Open Sans&#039;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius elementum eros ut pretium. Integer congue erat aliquet hendrerit congue. Morbi laoreet tempus nisi, sed vestibulum ante dictum ut. Aliquam posuere nulla pulvinar diam vulputate cursus. Nunc eros orci, dapibus et urna et, dictum vehicula diam. Quisque convallis eleifend ligula, id facilisis augue consectetur id. Morbi quis vulputate urna.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: &#039;Open Sans&#039;, Arial, sans-serif; text-align: justify;&quot;&gt;Duis ut vulputate lacus. Fusce interdum felis at dui vestibulum, fringilla semper nunc dictum. Ut consequat tempor magna et pulvinar. Donec eleifend risus a magna imperdiet, at pellentesque felis convallis. Integer faucibus pellentesque mauris, in consectetur erat lacinia a. Vivamus vel felis in nulla porta efficitur. Aenean efficitur lectus quis leo tincidunt sagittis. Curabitur sollicitudin augue sed magna mollis, vitae imperdiet orci bibendum. Duis tincidunt justo ultricies dignissim dapibus. Maecenas viverra, nunc quis sollicitudin imperdiet, odio ipsum egestas est, sit amet ultricies magna nulla sit amet dui. Donec congue purus tellus, non venenatis velit elementum ut. Ut eu malesuada ex. Phasellus placerat facilisis aliquam. Duis tincidunt in nunc quis condimentum. Duis neque libero, vehicula non pulvinar ut, iaculis id felis. Praesent lorem enim, aliquet in porttitor ac, vehicula nec massa.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: &#039;Open Sans&#039;, Arial, sans-serif; text-align: justify;&quot;&gt;Donec urna purus, consectetur at ante eget, tempor tempor turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi elit libero, fringilla non ante nec, posuere vestibulum magna. In metus nibh, fermentum eget fringilla a, auctor at erat. Praesent in viverra ipsum. Donec sit amet velit cursus nisi condimentum elementum. Etiam efficitur enim rhoncus, mattis libero tempor, aliquam dui. Vestibulum eget odio a ex laoreet scelerisque a eget nunc. In et commodo sapien. Sed ut tellus quis sapien consequat malesuada. Morbi eleifend eleifend elementum. Vestibulum et dolor eget quam elementum sodales.&lt;/p&gt;',1,'2018-01-02 17:34:57','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 15:37:35
