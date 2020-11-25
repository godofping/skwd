/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.4.11-MariaDB : Database - vincedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
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
  `pumpingstationuserid` int(6) DEFAULT NULL,
  `d10` double DEFAULT NULL,
  `e10` double DEFAULT NULL,
  `d11` double DEFAULT NULL,
  `d12` double DEFAULT NULL,
  `d13` double DEFAULT NULL,
  `d15` double DEFAULT NULL,
  `d16` double DEFAULT NULL,
  `d17` double DEFAULT NULL,
  `d19` double DEFAULT NULL,
  `d20` double DEFAULT NULL,
  `d21` double DEFAULT NULL,
  `d23` double DEFAULT NULL,
  `e23` double DEFAULT NULL,
  `d24` double DEFAULT NULL,
  `e24` double DEFAULT NULL,
  `d25` double DEFAULT NULL,
  `e25` double DEFAULT NULL,
  `e26` double DEFAULT NULL,
  `c27` double DEFAULT NULL,
  `d27` double DEFAULT NULL,
  `d30` double DEFAULT NULL,
  `e30` double DEFAULT NULL,
  `d31` double DEFAULT NULL,
  `e31` double DEFAULT NULL,
  `d32` double DEFAULT NULL,
  `e32` double DEFAULT NULL,
  `e33` double DEFAULT NULL,
  `c34` double DEFAULT NULL,
  `d34` double DEFAULT NULL,
  `d38` double DEFAULT NULL,
  `d39` double DEFAULT NULL,
  `d40` double DEFAULT NULL,
  `d43` double DEFAULT NULL,
  `e43` double DEFAULT NULL,
  `d44` double DEFAULT NULL,
  `e44` double DEFAULT NULL,
  `d45` double DEFAULT NULL,
  `e45` double DEFAULT NULL,
  `e46` double DEFAULT NULL,
  `c47` double DEFAULT NULL,
  `d47` double DEFAULT NULL,
  `d50` double DEFAULT NULL,
  `e50` double DEFAULT NULL,
  `d51` double DEFAULT NULL,
  `e51` double DEFAULT NULL,
  `d52` double DEFAULT NULL,
  `e52` double DEFAULT NULL,
  `e53` double DEFAULT NULL,
  `c55` double DEFAULT NULL,
  `d55` double DEFAULT NULL,
  `d58` double DEFAULT NULL,
  `e58` double DEFAULT NULL,
  `d59` double DEFAULT NULL,
  `e59` double DEFAULT NULL,
  `e60` double DEFAULT NULL,
  `d61` double DEFAULT NULL,
  `e61` double DEFAULT NULL,
  `d62` double DEFAULT NULL,
  `e62` double DEFAULT NULL,
  `e63` double DEFAULT NULL,
  `e65` double DEFAULT NULL,
  `forval` double DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  PRIMARY KEY (`monthlyproductiondataid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `monthly_production_data` */

insert  into `monthly_production_data`(`monthlyproductiondataid`,`pumpingstationuserid`,`d10`,`e10`,`d11`,`d12`,`d13`,`d15`,`d16`,`d17`,`d19`,`d20`,`d21`,`d23`,`e23`,`d24`,`e24`,`d25`,`e25`,`e26`,`c27`,`d27`,`d30`,`e30`,`d31`,`e31`,`d32`,`e32`,`e33`,`c34`,`d34`,`d38`,`d39`,`d40`,`d43`,`e43`,`d44`,`e44`,`d45`,`e45`,`e46`,`c47`,`d47`,`d50`,`e50`,`d51`,`e51`,`d52`,`e52`,`e53`,`c55`,`d55`,`d58`,`e58`,`d59`,`e59`,`e60`,`d61`,`e61`,`d62`,`e62`,`e63`,`e65`,`forval`,`datecreated`) values (3,16,32,51840,21407.35,20958.18,449.17,13,5,8,2702417.4,2646455.9,55961.5,1,1,2,0.03,3,0,1.03,124.59,128.33,2,2,3,0.05,4,0,2.05,124.59,900.2,2360572.2,2246270,114302.2,50,50,30,0.5,5,0,50.5,0.001,0.05,560,560,30,0.5,30,0.01,560.51,0.001,0.56,4,4,49,0.82,4.82,0,0,62,1.03,1.03,5.85,67.5,'2020-11-25'),(4,16,322,521640,21407.35,20958.18,449.17,13,5,8,2702417.4,2646455.9,55961.5,1,1,2,0.03,3,0,1.03,124.59,128.33,2,2,3,0.05,4,0,2.05,124.59,900.2,2360572.2,2246270,114302.2,50,50,30,0.5,5,0,50.5,0.001,0.05,560,560,30,0.5,30,0.01,560.51,0.001,0.56,4,4,49,0.82,4.82,0,0,62,1.03,1.03,5.85,67.5,'2020-11-25');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `pumping_station_user` */

insert  into `pumping_station_user`(`pumpingstationuserid`,`userid`,`pumpid`) values (16,20,5),(17,NULL,NULL),(18,NULL,NULL);

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

/*Table structure for table `view_monthly_production_data` */

DROP TABLE IF EXISTS `view_monthly_production_data`;

/*!50001 DROP VIEW IF EXISTS `view_monthly_production_data` */;
/*!50001 DROP TABLE IF EXISTS `view_monthly_production_data` */;

/*!50001 CREATE TABLE  `view_monthly_production_data`(
 `monthlyproductiondataid` int(6) ,
 `pumpingstationuserid` int(6) ,
 `d10` double ,
 `e10` double ,
 `d11` double ,
 `d12` double ,
 `d13` double ,
 `d15` double ,
 `d16` double ,
 `d17` double ,
 `d19` double ,
 `d20` double ,
 `d21` double ,
 `d23` double ,
 `e23` double ,
 `d24` double ,
 `e24` double ,
 `d25` double ,
 `e25` double ,
 `e26` double ,
 `c27` double ,
 `d27` double ,
 `d30` double ,
 `e30` double ,
 `d31` double ,
 `e31` double ,
 `d32` double ,
 `e32` double ,
 `e33` double ,
 `c34` double ,
 `d34` double ,
 `d38` double ,
 `d39` double ,
 `d40` double ,
 `d43` double ,
 `e43` double ,
 `d44` double ,
 `e44` double ,
 `d45` double ,
 `e45` double ,
 `e46` double ,
 `c47` double ,
 `d47` double ,
 `d50` double ,
 `e50` double ,
 `d51` double ,
 `e51` double ,
 `d52` double ,
 `e52` double ,
 `e53` double ,
 `c55` double ,
 `d55` double ,
 `d58` double ,
 `e58` double ,
 `d59` double ,
 `e59` double ,
 `e60` double ,
 `d61` double ,
 `e61` double ,
 `d62` double ,
 `e62` double ,
 `e63` double ,
 `e65` double ,
 `forval` double ,
 `datecreated` date ,
 `userid` int(6) ,
 `pumpid` int(6) ,
 `fullname` varchar(60) ,
 `usertype` varchar(20) ,
 `areaid` int(6) ,
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

/*View structure for view view_monthly_production_data */

/*!50001 DROP TABLE IF EXISTS `view_monthly_production_data` */;
/*!50001 DROP VIEW IF EXISTS `view_monthly_production_data` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_monthly_production_data` AS select `monthly_production_data`.`monthlyproductiondataid` AS `monthlyproductiondataid`,`monthly_production_data`.`pumpingstationuserid` AS `pumpingstationuserid`,`monthly_production_data`.`d10` AS `d10`,`monthly_production_data`.`e10` AS `e10`,`monthly_production_data`.`d11` AS `d11`,`monthly_production_data`.`d12` AS `d12`,`monthly_production_data`.`d13` AS `d13`,`monthly_production_data`.`d15` AS `d15`,`monthly_production_data`.`d16` AS `d16`,`monthly_production_data`.`d17` AS `d17`,`monthly_production_data`.`d19` AS `d19`,`monthly_production_data`.`d20` AS `d20`,`monthly_production_data`.`d21` AS `d21`,`monthly_production_data`.`d23` AS `d23`,`monthly_production_data`.`e23` AS `e23`,`monthly_production_data`.`d24` AS `d24`,`monthly_production_data`.`e24` AS `e24`,`monthly_production_data`.`d25` AS `d25`,`monthly_production_data`.`e25` AS `e25`,`monthly_production_data`.`e26` AS `e26`,`monthly_production_data`.`c27` AS `c27`,`monthly_production_data`.`d27` AS `d27`,`monthly_production_data`.`d30` AS `d30`,`monthly_production_data`.`e30` AS `e30`,`monthly_production_data`.`d31` AS `d31`,`monthly_production_data`.`e31` AS `e31`,`monthly_production_data`.`d32` AS `d32`,`monthly_production_data`.`e32` AS `e32`,`monthly_production_data`.`e33` AS `e33`,`monthly_production_data`.`c34` AS `c34`,`monthly_production_data`.`d34` AS `d34`,`monthly_production_data`.`d38` AS `d38`,`monthly_production_data`.`d39` AS `d39`,`monthly_production_data`.`d40` AS `d40`,`monthly_production_data`.`d43` AS `d43`,`monthly_production_data`.`e43` AS `e43`,`monthly_production_data`.`d44` AS `d44`,`monthly_production_data`.`e44` AS `e44`,`monthly_production_data`.`d45` AS `d45`,`monthly_production_data`.`e45` AS `e45`,`monthly_production_data`.`e46` AS `e46`,`monthly_production_data`.`c47` AS `c47`,`monthly_production_data`.`d47` AS `d47`,`monthly_production_data`.`d50` AS `d50`,`monthly_production_data`.`e50` AS `e50`,`monthly_production_data`.`d51` AS `d51`,`monthly_production_data`.`e51` AS `e51`,`monthly_production_data`.`d52` AS `d52`,`monthly_production_data`.`e52` AS `e52`,`monthly_production_data`.`e53` AS `e53`,`monthly_production_data`.`c55` AS `c55`,`monthly_production_data`.`d55` AS `d55`,`monthly_production_data`.`d58` AS `d58`,`monthly_production_data`.`e58` AS `e58`,`monthly_production_data`.`d59` AS `d59`,`monthly_production_data`.`e59` AS `e59`,`monthly_production_data`.`e60` AS `e60`,`monthly_production_data`.`d61` AS `d61`,`monthly_production_data`.`e61` AS `e61`,`monthly_production_data`.`d62` AS `d62`,`monthly_production_data`.`e62` AS `e62`,`monthly_production_data`.`e63` AS `e63`,`monthly_production_data`.`e65` AS `e65`,`monthly_production_data`.`forval` AS `forval`,`monthly_production_data`.`datecreated` AS `datecreated`,`pumping_station_user`.`userid` AS `userid`,`pumping_station_user`.`pumpid` AS `pumpid`,`user`.`fullname` AS `fullname`,`user`.`usertype` AS `usertype`,`pumping_station`.`areaid` AS `areaid`,`pumping_station`.`pumpstationname` AS `pumpstationname`,`area`.`areaname` AS `areaname` from ((((`monthly_production_data` join `pumping_station_user` on(`monthly_production_data`.`pumpingstationuserid` = `pumping_station_user`.`pumpingstationuserid`)) join `user` on(`pumping_station_user`.`userid` = `user`.`userid`)) join `pumping_station` on(`pumping_station_user`.`pumpid` = `pumping_station`.`pumpid`)) join `area` on(`pumping_station`.`areaid` = `area`.`areaid`)) */;

/*View structure for view view_pumping_station */

/*!50001 DROP TABLE IF EXISTS `view_pumping_station` */;
/*!50001 DROP VIEW IF EXISTS `view_pumping_station` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pumping_station` AS select `pumping_station`.`pumpid` AS `pumpid`,`pumping_station`.`areaid` AS `areaid`,`pumping_station`.`pumpstationname` AS `pumpstationname`,`area`.`areaname` AS `areaname` from (`pumping_station` join `area` on(`pumping_station`.`areaid` = `area`.`areaid`)) */;

/*View structure for view view_pump_station_user */

/*!50001 DROP TABLE IF EXISTS `view_pump_station_user` */;
/*!50001 DROP VIEW IF EXISTS `view_pump_station_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pump_station_user` AS select `pumping_station_user`.`pumpingstationuserid` AS `pumpingstationuserid`,`pumping_station_user`.`userid` AS `userid`,`pumping_station_user`.`pumpid` AS `pumpid`,`user`.`fullname` AS `fullname`,`user`.`usertype` AS `usertype`,`pumping_station`.`pumpstationname` AS `pumpstationname`,`area`.`areaname` AS `areaname` from (((`pumping_station_user` join `user` on(`pumping_station_user`.`userid` = `user`.`userid`)) join `pumping_station` on(`pumping_station_user`.`pumpid` = `pumping_station`.`pumpid`)) join `area` on(`pumping_station`.`areaid` = `area`.`areaid`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
