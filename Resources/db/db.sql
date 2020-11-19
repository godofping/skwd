/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.37-MariaDB : Database - vincedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vincedb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vincedb`;

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `areaid` int(6) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `areas` */

insert  into `areas`(`areaid`,`areaname`) values (1,'Tacurong City'),(2,'Isulan'),(3,'Surallah'),(5,'General Santos City');

/*Table structure for table `monthly_production_datas` */

DROP TABLE IF EXISTS `monthly_production_datas`;

CREATE TABLE `monthly_production_datas` (
  `monthlyproductiondataid` int(6) NOT NULL AUTO_INCREMENT,
  `userid` int(6) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `hourmeter` double DEFAULT NULL,
  `submersiblepump` double DEFAULT NULL,
  `hourmeter2` double DEFAULT NULL,
  `boosterpump` double DEFAULT NULL,
  `flowmeter` double DEFAULT NULL,
  `discharge` double DEFAULT NULL,
  `fhr` double DEFAULT NULL,
  `fmins` double DEFAULT NULL,
  `fsec` double DEFAULT NULL,
  `bhr` double DEFAULT NULL,
  `bmins` double DEFAULT NULL,
  `bsec` double DEFAULT NULL,
  `present2` double DEFAULT NULL,
  `previous2` double DEFAULT NULL,
  `fhr2` double DEFAULT NULL,
  `fmins2` double DEFAULT NULL,
  `fsec2` double DEFAULT NULL,
  `bhr2` double DEFAULT NULL,
  `bmins2` double DEFAULT NULL,
  `bsec2` double DEFAULT NULL,
  `lhr` double DEFAULT NULL,
  `lmin` double DEFAULT NULL,
  `whr` double DEFAULT NULL,
  `wmin` double DEFAULT NULL,
  `flushout` double DEFAULT NULL,
  `h2oused` double DEFAULT NULL,
  `flushout2` double DEFAULT NULL,
  `h2oused2` double DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`monthlyproductiondataid`),
  KEY `FK_user_data_table` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `monthly_production_datas` */

/*Table structure for table `pumping_stations` */

DROP TABLE IF EXISTS `pumping_stations`;

CREATE TABLE `pumping_stations` (
  `pumpid` int(10) NOT NULL AUTO_INCREMENT,
  `areaid` int(10) DEFAULT NULL,
  `pumpname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pumpid`),
  KEY `FK_pumping_table` (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pumping_stations` */

insert  into `pumping_stations`(`pumpid`,`areaid`,`pumpname`) values (5,1,'Pumping Station 1'),(9,1,'Pumping Station 2'),(12,3,'Pumping Station 3');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`userid`,`username`,`password`,`fullname`,`usertype`) values (3,'test','test','test test test',NULL),(14,'aw','aw','aw aw aw',NULL),(18,'vince','vince','vince ancheta',NULL);

/*Table structure for table `users_assigned_areas` */

DROP TABLE IF EXISTS `users_assigned_areas`;

CREATE TABLE `users_assigned_areas` (
  `userassignedareaid` int(6) DEFAULT NULL,
  `userid` int(6) DEFAULT NULL,
  `areaid` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users_assigned_areas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
