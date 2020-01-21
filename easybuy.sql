/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.0.22-community-nt : Database - easybuy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`easybuy` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `easybuy`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cartid` int(4) NOT NULL auto_increment COMMENT '购物车id',
  `cid` int(4) default NULL COMMENT '用户id',
  `pid` int(4) default NULL COMMENT '产品id',
  `num` int(4) default '1' COMMENT '数量',
  PRIMARY KEY  (`cartid`),
  KEY `购物车-用户` (`cid`),
  KEY `购物车-产品` (`pid`),
  CONSTRAINT `购物车-用户` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  CONSTRAINT `购物车-产品` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cart` */

insert  into `cart`(`cartid`,`cid`,`pid`,`num`) values (1,1,1,9),(2,1,5,1),(3,1,1,1),(4,1,1,2),(5,1,2,1),(6,1,6,1),(7,1,3,1);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `cid` int(4) NOT NULL auto_increment COMMENT '用户id',
  `cname` varchar(20) NOT NULL default '' COMMENT '姓名',
  `account` varchar(20) default '' COMMENT '账号',
  `pwd` varchar(20) NOT NULL COMMENT '密码',
  `sex` varchar(2) default NULL COMMENT '性别',
  `email` varchar(50) default NULL COMMENT 'Email',
  `phone` varchar(11) default NULL COMMENT '手机',
  `caddress` varchar(50) default NULL COMMENT '地址',
  `head` varchar(100) default NULL COMMENT '头像',
  `cstatus` int(1) default '0' COMMENT '状态:(0：用户)',
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`cid`,`cname`,`account`,`pwd`,`sex`,`email`,`phone`,`caddress`,`head`,`cstatus`) values (1,'w','101','w','男','1111','11321','紫薇里',NULL,0),(2,'a','102','a','女','12331','aaa','上海',NULL,1),(3,'小明','aaa','aa','男','aaa','aaa','河南',NULL,0),(4,'小股东','hah','haha','男','hahah','haha','商丘',NULL,0),(5,'小红','q','q','女','q','q','南阳','图片1.png',0),(6,'小何','o','o','男','o','o','信阳','2.png',0),(7,'次奥','aaa','aa','男','a','a','洛阳','1.png',0);

/*Table structure for table `guestbook` */

DROP TABLE IF EXISTS `guestbook`;

CREATE TABLE `guestbook` (
  `gid` int(4) NOT NULL auto_increment COMMENT '留言内容id',
  `cid` int(4) NOT NULL COMMENT '用户id',
  `gname` varchar(50) default NULL COMMENT '昵称',
  `gtitle` varchar(50) default NULL COMMENT '标题',
  `word` text COMMENT '留言内容',
  `reply` text COMMENT '后台-回复内容',
  `time` datetime default NULL COMMENT '时间',
  `gstatus` int(1) default '0' COMMENT '状态(0:未回复)',
  PRIMARY KEY  (`gid`),
  KEY `cc` (`cid`),
  CONSTRAINT `cc` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `guestbook` */

insert  into `guestbook`(`gid`,`cid`,`gname`,`gtitle`,`word`,`reply`,`time`,`gstatus`) values (1,1,'标题','哈哈','留言','hahha','2019-10-01 19:07:18',1),(2,2,'哈哈','贵得很','aaaaaaaaaaaaaaaaa',NULL,'2019-10-14 18:55:11',0),(3,2,'哈哈a','贵得很','zzzzzzzzzzzzzzzzzzzz',NULL,'2019-10-14 18:48:12',0),(5,2,'a','贵得很','aaaaaaagasrgsdhsdeh',NULL,'2019-10-14 18:55:51',0),(6,2,'哈哈a','贵得很','gagaga',NULL,'2019-10-02 19:22:16',0),(7,2,'昵称','留言标题','adfadgagsa',NULL,'2019-10-19 19:22:12',0),(8,2,'aa','aa','aa',NULL,'2019-10-14 19:21:52',0);

/*Table structure for table `kind` */

DROP TABLE IF EXISTS `kind`;

CREATE TABLE `kind` (
  `kid` int(4) NOT NULL auto_increment COMMENT '分类表id',
  `kname` varchar(50) default NULL COMMENT '分类表名称',
  PRIMARY KEY  (`kid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kind` */

insert  into `kind`(`kid`,`kname`) values (1,'外星人电脑'),(2,'联想'),(5,'华为111'),(6,'联想'),(8,'外星人电脑'),(9,'三星'),(11,'0000'),(12,'a'),(13,'a'),(14,'外星人电脑'),(15,'外星人电脑'),(16,'外星人电脑'),(17,'外星人电脑'),(18,'外星人电脑111111111');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `nid` int(4) NOT NULL auto_increment COMMENT '新闻表id',
  `title` varchar(50) default NULL COMMENT '新闻标题',
  `nword` text COMMENT '新闻内容',
  PRIMARY KEY  (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `news` */

insert  into `news`(`nid`,`title`,`nword`) values (1,'王思聪普思资本股权冻结','王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪王思聪'),(2,'俄中部军区装备“山毛榉”防空系统','防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防空系统防'),(3,'陆军红箭-10高海拔实弹打靶','实弹打靶实弹打靶实弹打靶实弹打靶实弹打靶实弹打靶实弹打靶实弹打靶实弹打靶'),(5,'2019年','今天可冷了可冷了可冷了可冷了可冷了可冷了可冷了'),(6,'冷空气来袭','太冷了太冷了太冷了太冷了太冷了太冷了太冷了太冷了太冷了'),(7,'美空军网络战部队正式成立','网络战部队网络战部队网络战部队网络战部队网络战部队网络战部队网络战部队'),(8,'a','a'),(9,'a','a'),(10,'a','a'),(11,'a','a'),(12,'a','a'),(17,'a','a'),(18,'a','a'),(19,'a','a');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `oid` int(4) NOT NULL auto_increment COMMENT '订单表id',
  `cid` int(4) default NULL COMMENT '用户id',
  `pid` int(4) default NULL COMMENT '产品id',
  `oaddress` varchar(50) default NULL COMMENT '发货地址',
  `num` int(6) default NULL COMMENT '购买数量',
  `ostatus` int(1) default '0' COMMENT '状态(0：审核通过；1：发货)',
  PRIMARY KEY  (`oid`),
  KEY `c` (`cid`),
  KEY `p` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`oid`,`cid`,`pid`,`oaddress`,`num`,`ostatus`) values (1,1,1,'紫薇里',0,0),(2,1,2,'紫薇里',0,0),(3,1,3,'紫薇里',0,0),(4,1,4,'紫薇里',0,0),(5,1,5,'紫薇里',0,0),(6,1,6,'紫薇里',0,0),(7,1,7,'紫薇里',0,0);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `pid` int(4) NOT NULL auto_increment COMMENT '商品表id',
  `pname` varchar(50) default NULL COMMENT '商品名称',
  `kid` int(4) default NULL COMMENT '商品分类id',
  `photo` varchar(50) default NULL COMMENT '图片',
  `price` float(6,2) default NULL COMMENT '价格',
  `brand` varchar(20) default NULL COMMENT '品牌',
  `save` int(8) default NULL COMMENT '库存',
  `bar` varchar(13) default NULL COMMENT '条码号',
  `notice` varchar(100) default NULL COMMENT '最新公告',
  `dongtai` varchar(100) default NULL COMMENT '新闻动态',
  PRIMARY KEY  (`pid`),
  KEY `k` (`kid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`pid`,`pname`,`kid`,`photo`,`price`,`brand`,`save`,`bar`,`notice`,`dongtai`) values (1,'法国德菲丝松露精品巧克力500g/盒',1,'1.jpg',159.00,NULL,1166,NULL,'王思聪普思资本股权冻结','程序员学习编程的36个网站，超实用'),(2,'乐扣普通型保鲜盒圣诞7件套',2,'2.jpg',69.90,'驰名商标',490,'123321123','俄中部军区装备“山毛榉”防空系统','大学生勘探地球物理大赛走进东方物探'),(3,'欧珀莱均衡保湿四件套',14,'3.jpg',279.00,'aaaaaa',989,'1230000','陆军红箭-10高海拔实弹打靶','高级技术培训班在成都开班'),(4,'联想笔记本电脑 高速独立显存',12,'4.jpg',4199.00,'aaaaaa',57,'123456','美空军网络战部队正式成立','第三届职工乒乓球赛圆满落幕'),(5,'法姿韩版显瘦彩边时尚牛仔铅笔裤',15,'5.jpg',49.00,'aaaaaa',664,'123456','','一次守初心担使命的学习之旅'),(6,'Genius925纯银施华洛世奇水晶吊坠',15,'6.jpg',69.90,'1111',110,'11111','',''),(7,'利仁2018M福满堂电饼铛 好用实惠',14,'7.jpg',268.00,'驰名商标',517,'123456','',''),(8,'达派高档拉杆箱20寸 经典款式',18,'8.jpg',198.00,'1',10,'1','',''),(9,'爱国者MP4 全屏触摸多格式播放',NULL,'9.jpg',289.00,NULL,5,NULL,'',''),(10,'多美滋金装金盾3阶段幼儿配方奶粉',NULL,'9.jpg',186.00,'',399,'',NULL,''),(11,'法国德菲丝松露精品巧克力500g/盒',NULL,'2.jpg',108.00,'',199,'',NULL,''),(12,'乐扣普通型保鲜盒圣诞7件套',NULL,'2.jpg',69.90,NULL,598,NULL,NULL,NULL);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) default NULL,
  `sex` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`user_name`,`sex`) values (1,'小威','男'),(2,'aa','女'),(3,'明威凤','男'),(5,'aa','男'),(6,'bbb','女'),(7,'aa','男'),(8,'dddd','男'),(9,'eee','女'),(10,'d','男'),(11,'ggggg','女');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
