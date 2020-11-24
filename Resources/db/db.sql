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

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `areaid` int(6) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `area` */

insert  into `area`(`areaid`,`areaname`) values (1,'Tacurong City'),(2,'Isulan'),(3,'Surallah'),(5,'General Santos City');

/*Table structure for table `monthly_production_data` */

DROP TABLE IF EXISTS `monthly_production_data`;

CREATE TABLE `monthly_production_data` (
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

/*Data for the table `monthly_production_data` */

/*Table structure for table `pumping_station` */

DROP TABLE IF EXISTS `pumping_station`;

CREATE TABLE `pumping_station` (
  `pumpid` int(6) NOT NULL AUTO_INCREMENT,
  `areaid` int(6) DEFAULT NULL,
  `pumpstationname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`pumpid`),
  KEY `FK_pumping_table` (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pumping_station` */

insert  into `pumping_station`(`pumpid`,`areaid`,`pumpstationname`) values (5,1,'Pumping Station 1'),(9,1,'Pumping Station 2'),(12,3,'Pumping Station 3');

/*Table structure for table `pumping_station_user` */

DROP TABLE IF EXISTS `pumping_station_user`;

CREATE TABLE `pumping_station_user` (
  `pumpingstationuserid` int(6) NOT NULL AUTO_INCREMENT,
  `userid` int(6) DEFAULT NULL,
  `pumpid` int(6) DEFAULT NULL,
  PRIMARY KEY (`pumpingstationuserid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `pumping_station_user` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`userid`,`username`,`password`,`fullname`,`usertype`) values (19,'admin','admin','admin','ADMIN'),(20,'user','user','user','USER');

/*Table structure for table `view_pump_station_user` */

DROP TABLE IF EXISTS `view_pump_station_user`;

/*!50001 DROP VIEW IF EXISTS `view_pump_station_user` */;
/*!50001 DROP TABLE IF EXISTS `view_pump_station_user` */;

/*!50001 CREATE TABLE  `view_pump_station_user`(
 `pumpingstationuserid` int(6) ,
 `userid` int(6) ,
 `pumpid` int(6) ,
 `fullname` varchar(60) ,
 `usertype` varchar(20) ,
 `pumpstationname` varchar(60) ,
 `areaname` varchar(60) 
)*/;

/*Table structure for table `view_pumping_station` */

DROP TABLE IF EXISTS `view_pumping_station`;

/*!50001 DROP VIEW IF EXISTS `view_pumping_station` */;
/*!50001 DROP TABLE IF EXISTS `view_pumping_station` */;

/*!50001 CREATE TABLE  `view_pumping_station`(
 `pumpid` int(6) ,
 `areaid` int(6) ,
 `pumpstationname` varchar(60) ,
 `areaname` varchar(60) 
)*/;

/*View structure for view view_pump_station_user */

/*!50001 DROP TABLE IF EXISTS `view_pump_station_user` */;
/*!50001 DROP VIEW IF EXISTS `view_pump_station_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pump_station_user` AS select `pumping_station_user`.`pumpingstationuserid` AS `pumpingstationuserid`,`pumping_station_user`.`userid` AS `userid`,`pumping_station_user`.`pumpid` AS `pumpid`,`user`.`fullname` AS `fullname`,`user`.`usertype` AS `usertype`,`pumping_station`.`pumpstationname` AS `pumpstationname`,`area`.`areaname` AS `areaname` from (((`pumping_station_user` join `user` on((`pumping_station_user`.`userid` = `user`.`userid`))) join `pumping_station` on((`pumping_station_user`.`pumpid` = `pumping_station`.`pumpid`))) join `area` on((`pumping_station`.`areaid` = `area`.`areaid`))) */;

/*View structure for view view_pumping_station */

/*!50001 DROP TABLE IF EXISTS `view_pumping_station` */;
/*!50001 DROP VIEW IF EXISTS `view_pumping_station` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pumping_station` AS select `pumping_station`.`pumpid` AS `pumpid`,`pumping_station`.`areaid` AS `areaid`,`pumping_station`.`pumpstationname` AS `pumpstationname`,`area`.`areaname` AS `areaname` from (`pumping_station` join `area` on((`pumping_station`.`areaid` = `area`.`areaid`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
