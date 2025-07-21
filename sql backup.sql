-- MySQL dump 10.9
--
-- Host: localhost    Database: 
-- ------------------------------------------------------
-- Server version	4.1.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `a310`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `a310` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `a310`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL default '',
  `password` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`username`),
  UNIQUE KEY `id` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--


/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
LOCK TABLES `admin` WRITE;
INSERT INTO `admin` VALUES ('admin','admin');
UNLOCK TABLES;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `sender_id` varchar(15) NOT NULL default '',
  `receiver_id` varchar(15) NOT NULL default '',
  `msg` varchar(200) default NULL,
  `msgtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--


/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
LOCK TABLES `chat` WRITE;
INSERT INTO `chat` VALUES ('dhruva','dinesh','well','2010-03-27 18:08:40'),('dhruva','dinesh','hw r u','2010-03-27 18:08:29'),('DINESH','rajendra','em chestunav ra','2010-03-27 19:12:08'),('dhruva','dinesh','hai','2010-03-27 18:08:05'),('dhruva','dinesh','em images','2010-03-27 18:09:21'),('DINESH','rajendra','hi i got your msg','2010-03-27 19:12:01'),('dhruva','dinesh','k.....bye i will do dat','2010-03-27 18:11:31'),('DINESH','haribabu','of course!!','2010-03-27 19:27:12'),('DINESH','haribabu','hi','2010-03-27 19:26:22'),('DINESH','sumo','doing ra','2010-03-27 19:28:36'),('DINESH','sumo','take the screen shots','2010-03-27 19:29:18');
UNLOCK TABLES;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `user_id` varchar(15) default NULL,
  `contact_id` varchar(15) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--


/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
LOCK TABLES `contacts` WRITE;
INSERT INTO `contacts` VALUES ('sumo','dinesh'),('dhruva','dinesh'),('rajendra','dinesh'),('haribabu','dinesh'),('haribabu','sumo'),('sumo','haribabu'),('harirocks','dinesh'),('harirocks','hemanth_kona'),('dinesh','sumo'),('dinesh','haribabu'),('dinesh','dhruva'),('DINESH','rajendra'),('rajendra','sumo'),('rajendra','rajendra'),('rajendra','haribabu');
UNLOCK TABLES;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `fid` int(11) NOT NULL default '0',
  `f_title` varchar(30) default NULL,
  `currently_viewing_number` int(11) default NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--


/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
LOCK TABLES `forum` WRITE;
INSERT INTO `forum` VALUES (1,'csit',0),(2,'ece',23),(3,'eee',0),(4,'mech',0),(5,'eie',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `user_id` varchar(15) NOT NULL default '',
  `last_login_time` time default NULL,
  `last_login_date` date default NULL,
  `last_mail_sent_to` varchar(15) default NULL,
  `last_mail_reveived_from` varchar(15) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--


/*!40000 ALTER TABLE `history` DISABLE KEYS */;
LOCK TABLES `history` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL auto_increment,
  `receiver_id` varchar(15) NOT NULL default '',
  `sender_id` varchar(15) NOT NULL default '',
  `msg_read` tinyint(1) default '0',
  `msg_sub` varchar(100) default NULL,
  `msg_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `msg_body` blob,
  PRIMARY KEY  (`msg_id`),
  KEY `receiver_id` (`receiver_id`),
  KEY `sender_id` (`sender_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--


/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
LOCK TABLES `messages` WRITE;
INSERT INTO `messages` VALUES (38,'dinesh','sumo',0,'hai','2010-03-27 17:36:51','shajsj'),(28,'harirocks','hemanth_kona',0,'hai','2010-03-26 16:01:51','hello i recently felled in love with you'),(29,'harirocks','harirocks',0,'wwww','2010-03-26 16:03:56','werrewerretfer'),(30,'hemanth_kona','haribabu',0,'asdsdfds','2010-03-26 16:13:31','dsfsdfsdf'),(39,'dhruva','dinesh',0,'online ki ra va','2010-03-27 17:49:58','online ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vaonline ki ra vavvvvvv'),(35,'sumo','haribabu',0,'jj','2010-03-27 14:41:50','ksdl'),(36,'dinesh','sumo',0,'hai','2010-03-27 15:04:23','today is the day'),(37,'sumo','haribabu',0,'gggfd','2010-03-27 16:18:39','fgfd'),(33,'dinesh','tummala',0,'hai','2010-03-27 13:05:19','where is the replay'),(34,'sumo','dinesh',0,'subject','2010-03-27 13:11:20','ssssssssssssssssssssssssssss'),(40,'dinesh','rajendra',0,'hai','2010-03-27 19:07:29','\r\nour project very well congratulations to our dovelopers');
UNLOCK TABLES;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `student_id` varchar(15) default NULL,
  `reason_text` text,
  `reporter_id` varchar(15) default NULL,
  `rid` int(11) NOT NULL auto_increment,
  `subject` varchar(50) default NULL,
  PRIMARY KEY  (`rid`),
  KEY `student_id` (`student_id`),
  KEY `reporter_id` (`reporter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--


/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
LOCK TABLES `reports` WRITE;
INSERT INTO `reports` VALUES ('haribabu','aasaaa','sumo',17,'sss'),('dinesh','d','sumo',18,'d'),('haribabu','wreewe3232323','sumo',22,'asa'),('dinesh','asasaasasaaaaaa','sumo',21,'assas'),('sumo','ssssssssssssssssss','dinesh',23,'sdfss');
UNLOCK TABLES;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;

--
-- Table structure for table `topic_post`
--

DROP TABLE IF EXISTS `topic_post`;
CREATE TABLE `topic_post` (
  `post_id` int(11) NOT NULL auto_increment,
  `user_id` varchar(15) default NULL,
  `fid` int(11) default NULL,
  `post_text` text,
  `post_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `no_of_replies` int(11) default NULL,
  `type` varchar(5) default NULL,
  `post_title` varchar(40) default NULL,
  PRIMARY KEY  (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_post`
--


/*!40000 ALTER TABLE `topic_post` DISABLE KEYS */;
LOCK TABLES `topic_post` WRITE;
INSERT INTO `topic_post` VALUES (1,'dinesh',1,'ddddddddddddd','2010-03-27 12:24:05',NULL,'q','ttttttt'),(2,'dinesh',1,'7877777777777777','2010-03-27 12:24:16',NULL,'r','ttttttt'),(3,'dinesh',1,'is about c programmingis about c programmingis about c programmingis about c programmingis about c programmingis about c programmingis about c programmingis about c programmingis about c programming','2010-03-27 12:24:56',NULL,'q','Qn about c programming'),(4,'dinesh',1,'idi veste !!!!','2010-03-27 12:25:19',NULL,'r','Qn about c programming'),(5,'dinesh',4,'eeeeeeeeeeeeeeeee','2010-03-27 12:27:22',NULL,'q','eie question'),(6,'dinesh',4,'eeeeeeeeeeeeeeeee','2010-03-27 12:27:25',NULL,'q','eie question'),(7,'dinesh',2,'IIIIIIIIIIIIIIII','2010-03-27 12:28:48',NULL,'q','ECE QN'),(8,'dinesh',2,'IIIIIIIIIIIIIIII','2010-03-27 12:28:50',NULL,'q','ECE QN'),(9,'dinesh',1,'sdssssssssssssssssss','2010-03-27 13:12:55',NULL,'q','2nd qn'),(10,'dinesh',1,'dddddddsgfdfgdf','2010-03-27 13:13:18',NULL,'r','2nd qn'),(11,'dinesh',1,'sfsdfsdfs','2010-03-27 13:20:31',NULL,'r','Qn about c programming'),(12,'sumo',1,'i cant understand what a deadlock is.\r\nsomeone send me a definition','2010-03-27 19:30:36',NULL,'q','what is deadlock??'),(13,'DINESH',1,'A deadlock is a situation in which two computer programs sharing the same resource are effectively preventing each other from accessing the resource, resulting in both programs ceasing to function.','2010-03-27 19:31:19',NULL,'r','what is deadlock??');
UNLOCK TABLES;
/*!40000 ALTER TABLE `topic_post` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `fname` varchar(15) NOT NULL default '',
  `lname` varchar(15) NOT NULL default '',
  `address` varchar(30) default NULL,
  `state` varchar(20) default NULL,
  `country` varchar(20) default NULL,
  `zipcode` int(11) NOT NULL default '0',
  `s_branch` varchar(5) NOT NULL default '',
  `sex` varchar(6) NOT NULL default '',
  `dob` date NOT NULL default '0000-00-00',
  `status` int(11) default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--


/*!40000 ALTER TABLE `users` DISABLE KEYS */;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES ('haribabu','12345','hari','babu','eluru addr','AP','ind',56465,'bio','','0000-00-00',0),('sumo','2345','sumanth','geesala','eluru addr','andhra pradesh','india',56465,'cs','','0000-00-00',0),('dhruva','dhruva','dhruva','kumar','housigboard','Andhra pradesh','india',12,'it','male','1989-12-07',1),('chaitu','123456','chaitu','pothineni','2134564y dfcds','Andhra pradesh','india',3546745,'ew454','male','1990-03-27',1),('nani','nani','nani','babu','eluru','Andhra pradesh','india',123,'cse','male','1990-05-06',1),('rajendra','raju0030','rajendra prasad','banavathu','pothana palli, chatrai(md), kr','Andhra pradesh','india',12,'cse','male','1987-05-20',0),('hemanth_kona','123','hemanth','kona','sdsd','Assam','india',2222,'cs','male','1990-02-28',1),('dinesh','123','dinesh','kadali','eluru','Andhra pradesh','india',234,'cse','male','2342-01-03',1),('govind_rocks','143','govind','b','vizag','Andhra pradesh','us',9999,'cse','male','1990-07-21',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

