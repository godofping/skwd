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

/*Table structure for table `adminaccount_tbl` */

DROP TABLE IF EXISTS `adminaccount_tbl`;

CREATE TABLE `adminaccount_tbl` (
  `adminID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `adminaccount_tbl` */

insert  into `adminaccount_tbl`(`adminID`,`username`,`password`) values (1,'admin','admin');

/*Table structure for table `area_table` */

DROP TABLE IF EXISTS `area_table`;

CREATE TABLE `area_table` (
  `areaID` int(10) NOT NULL AUTO_INCREMENT,
  `areaName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`areaID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `area_table` */

insert  into `area_table`(`areaID`,`areaName`) values (1,'Tacurong City'),(2,'Isulan'),(3,'Surallah'),(5,'General Santos City');

/*Table structure for table `pumping_table` */

DROP TABLE IF EXISTS `pumping_table`;

CREATE TABLE `pumping_table` (
  `pumpID` int(10) NOT NULL AUTO_INCREMENT,
  `areaID` int(10) DEFAULT NULL,
  `pumpname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pumpID`),
  KEY `FK_pumping_table` (`areaID`),
  CONSTRAINT `FK_pumping_table` FOREIGN KEY (`areaID`) REFERENCES `area_table` (`areaID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pumping_table` */

insert  into `pumping_table`(`pumpID`,`areaID`,`pumpname`) values (5,1,'Pumping Station 1'),(9,1,'Pumping Station 2'),(12,3,'Pumping Station 3');

/*Table structure for table `user_data_table` */

DROP TABLE IF EXISTS `user_data_table`;

CREATE TABLE `user_data_table` (
  `userpumpID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
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
  PRIMARY KEY (`userpumpID`),
  KEY `FK_user_data_table` (`userID`),
  CONSTRAINT `FK_user_data_table` FOREIGN KEY (`userID`) REFERENCES `useraccount_tbl` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_data_table` */

/*Table structure for table `useraccount_tbl` */

DROP TABLE IF EXISTS `useraccount_tbl`;

CREATE TABLE `useraccount_tbl` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(5) DEFAULT NULL,
  `password` varchar(5) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `pumpID` int(10) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `FK_useraccount_tbl` (`pumpID`),
  CONSTRAINT `FK_useraccount_tbl` FOREIGN KEY (`pumpID`) REFERENCES `pumping_table` (`pumpID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `useraccount_tbl` */

insert  into `useraccount_tbl`(`userID`,`username`,`password`,`fullname`,`pumpID`) values (3,'test','test','test test test',5),(14,'aw','aw','aw aw aw',5),(18,'vince','vince','vince ancheta',5);

/*Table structure for table `accounts_view` */

DROP TABLE IF EXISTS `accounts_view`;

/*!50001 DROP VIEW IF EXISTS `accounts_view` */;
/*!50001 DROP TABLE IF EXISTS `accounts_view` */;

/*!50001 CREATE TABLE  `accounts_view`(
 `userID` int(11) ,
 `username` varchar(5) ,
 `password` varchar(5) ,
 `fullname` varchar(250) ,
 `pumpID` int(10) ,
 `areaID` int(10) ,
 `areaName` varchar(100) ,
 `pumpname` varchar(50) 
)*/;

/*Table structure for table `pumping_station_view` */

DROP TABLE IF EXISTS `pumping_station_view`;

/*!50001 DROP VIEW IF EXISTS `pumping_station_view` */;
/*!50001 DROP TABLE IF EXISTS `pumping_station_view` */;

/*!50001 CREATE TABLE  `pumping_station_view`(
 `pumpID` int(10) ,
 `areaID` int(10) ,
 `areaName` varchar(100) ,
 `pumpname` varchar(50) 
)*/;

/*Table structure for table `user_data_view` */

DROP TABLE IF EXISTS `user_data_view`;

/*!50001 DROP VIEW IF EXISTS `user_data_view` */;
/*!50001 DROP TABLE IF EXISTS `user_data_view` */;

/*!50001 CREATE TABLE  `user_data_view`(
 `userpumpID` int(10) ,
 `userID` int(10) ,
 `fullname` varchar(250) ,
 `pumpID` int(10) ,
 `areaID` int(10) ,
 `areaName` varchar(100) ,
 `pumpname` varchar(50) ,
 `capacity` int(11) ,
 `hourmeter` double ,
 `submersiblepump` double ,
 `hourmeter2` double ,
 `boosterpump` double ,
 `flowmeter` double ,
 `discharge` double ,
 `fhr` double ,
 `fmins` double ,
 `fsec` double ,
 `bhr` double ,
 `bmins` double ,
 `bsec` double ,
 `present2` double ,
 `previous2` double ,
 `fhr2` double ,
 `fmins2` double ,
 `fsec2` double ,
 `bhr2` double ,
 `bmins2` double ,
 `bsec2` double ,
 `lhr` double ,
 `lmin` double ,
 `whr` double ,
 `wmin` double ,
 `flushout` double ,
 `h2oused` double ,
 `flushout2` double ,
 `h2oused2` double 
)*/;

/*View structure for view accounts_view */

/*!50001 DROP TABLE IF EXISTS `accounts_view` */;
/*!50001 DROP VIEW IF EXISTS `accounts_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `accounts_view` AS select `useraccount_tbl`.`userID` AS `userID`,`useraccount_tbl`.`username` AS `username`,`useraccount_tbl`.`password` AS `password`,`useraccount_tbl`.`fullname` AS `fullname`,`useraccount_tbl`.`pumpID` AS `pumpID`,`pumping_table`.`areaID` AS `areaID`,`area_table`.`areaName` AS `areaName`,`pumping_table`.`pumpname` AS `pumpname` from ((`useraccount_tbl` join `pumping_table` on((`useraccount_tbl`.`pumpID` = `pumping_table`.`pumpID`))) join `area_table` on((`pumping_table`.`areaID` = `area_table`.`areaID`))) */;

/*View structure for view pumping_station_view */

/*!50001 DROP TABLE IF EXISTS `pumping_station_view` */;
/*!50001 DROP VIEW IF EXISTS `pumping_station_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pumping_station_view` AS select `pumping_table`.`pumpID` AS `pumpID`,`pumping_table`.`areaID` AS `areaID`,`area_table`.`areaName` AS `areaName`,`pumping_table`.`pumpname` AS `pumpname` from (`pumping_table` join `area_table` on((`pumping_table`.`areaID` = `area_table`.`areaID`))) */;

/*View structure for view user_data_view */

/*!50001 DROP TABLE IF EXISTS `user_data_view` */;
/*!50001 DROP VIEW IF EXISTS `user_data_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data_view` AS select `user_data_table`.`userpumpID` AS `userpumpID`,`user_data_table`.`userID` AS `userID`,`useraccount_tbl`.`fullname` AS `fullname`,`useraccount_tbl`.`pumpID` AS `pumpID`,`pumping_table`.`areaID` AS `areaID`,`area_table`.`areaName` AS `areaName`,`pumping_table`.`pumpname` AS `pumpname`,`user_data_table`.`capacity` AS `capacity`,`user_data_table`.`hourmeter` AS `hourmeter`,`user_data_table`.`submersiblepump` AS `submersiblepump`,`user_data_table`.`hourmeter2` AS `hourmeter2`,`user_data_table`.`boosterpump` AS `boosterpump`,`user_data_table`.`flowmeter` AS `flowmeter`,`user_data_table`.`discharge` AS `discharge`,`user_data_table`.`fhr` AS `fhr`,`user_data_table`.`fmins` AS `fmins`,`user_data_table`.`fsec` AS `fsec`,`user_data_table`.`bhr` AS `bhr`,`user_data_table`.`bmins` AS `bmins`,`user_data_table`.`bsec` AS `bsec`,`user_data_table`.`present2` AS `present2`,`user_data_table`.`previous2` AS `previous2`,`user_data_table`.`fhr2` AS `fhr2`,`user_data_table`.`fmins2` AS `fmins2`,`user_data_table`.`fsec2` AS `fsec2`,`user_data_table`.`bhr2` AS `bhr2`,`user_data_table`.`bmins2` AS `bmins2`,`user_data_table`.`bsec2` AS `bsec2`,`user_data_table`.`lhr` AS `lhr`,`user_data_table`.`lmin` AS `lmin`,`user_data_table`.`whr` AS `whr`,`user_data_table`.`wmin` AS `wmin`,`user_data_table`.`flushout` AS `flushout`,`user_data_table`.`h2oused` AS `h2oused`,`user_data_table`.`flushout2` AS `flushout2`,`user_data_table`.`h2oused2` AS `h2oused2` from (((`user_data_table` join `useraccount_tbl` on((`user_data_table`.`userID` = `useraccount_tbl`.`userID`))) join `pumping_table` on((`useraccount_tbl`.`pumpID` = `pumping_table`.`pumpID`))) join `area_table` on((`pumping_table`.`areaID` = `area_table`.`areaID`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
