/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - utenti_php
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`utenti_php` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `utenti_php`;

/*Table structure for table `user_data` */

DROP TABLE IF EXISTS `user_data`;

CREATE TABLE `user_data` (
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_data` */

insert  into `user_data`(`username`,`pwd`) values 
('Ciao@difo.ipp','$2y$10$nSJ0ymcg0Nbigz67WxeXFeBQUbbKmR5pzRXLNq2H67k'),
('Ciao@difo.it','$2y$10$7FqTduvVK02wM/WCchx/8.6jmMg3x6m/BUIbxZ70LG1'),
('marco@de.it','$2y$10$vr4HyGF8grFVkjAjM5lOaeruKSnjgs676w4sbn4bZVO'),
('marco@deo.it','$2y$10$hZcRAZzDb.jMIiYpwwG2gOCL5uVi6W6wzwmuoas56z0'),
('test@test.it','$2y$10$YoROiDXuJeQpZjZcrqlk7.XozesMRicxcNP4bdpayubozsmKcK/Vu');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
