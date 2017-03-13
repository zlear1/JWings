/*
SQLyog v10.2 
MySQL - 5.6.24 : Database - jwings
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jwings` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `jwings`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `accountNumber` char(20) NOT NULL COMMENT '账号',
  `password` char(20) NOT NULL COMMENT '密码',
  PRIMARY KEY (`accountNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`accountNumber`,`password`) values ('csusthome','likeloub203');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `Name` char(12) NOT NULL COMMENT '姓名',
  `Sexkind` char(2) NOT NULL COMMENT '性别',
  `Class` char(30) NOT NULL COMMENT '年级',
  `Stuno` char(12) NOT NULL COMMENT '学号',
  `SelfAss` text COMMENT '自我评价',
  `Major` char(12) NOT NULL COMMENT '专业',
  `password` char(20) NOT NULL COMMENT '密码',
  PRIMARY KEY (`Stuno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`Name`,`Sexkind`,`Class`,`Stuno`,`SelfAss`,`Major`,`password`) values ('?','?','??1503','201516080325',NULL,'????','111111');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
