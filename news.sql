/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.0.22-community-nt : Database - news
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`news` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `news`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `userid` int(4) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `userpwd` varchar(10) NOT NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`userid`,`username`,`userpwd`) values (1,'admin','admin'),(2,'a','a');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `newsid` int(4) NOT NULL auto_increment COMMENT '编号',
  `topname` varchar(50) default NULL COMMENT '主题',
  `title` varchar(50) default '' COMMENT '标题',
  `author` varchar(20) default '' COMMENT '作者',
  `summary` varchar(50) default NULL COMMENT '摘要',
  `ncontent` text COMMENT '内容',
  `pic` varchar(50) default NULL COMMENT '照片',
  PRIMARY KEY  (`newsid`),
  KEY `a` (`topname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `news` */

insert  into `news`(`newsid`,`topname`,`title`,`author`,`summary`,`ncontent`,`pic`) values (1,NULL,'a','a','a','',''),(2,NULL,'a','a','a','a','C:\\Users\\Administrator\\Desktop\\é¡¶å²å®ä¹ \\1.png'),(3,NULL,'å','å','å','å','C:\\Users\\Administrator\\Desktop\\é¡¶å²å®ä¹ \\2.png'),(4,NULL,'','å','','',''),(5,'å°å¨','æ','æ¯','å°','å¨','');

/*Table structure for table `topic` */

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `topid` int(4) NOT NULL auto_increment,
  `topname` varchar(50) NOT NULL,
  PRIMARY KEY  (`topid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `topic` */

insert  into `topic`(`topid`,`topname`) values (1,'小威'),(2,'哈哈'),(3,'吼吼吼'),(4,'aa'),(5,'bb'),(6,'cc'),(7,'哈哈哈'),(8,'吼吼吼');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
