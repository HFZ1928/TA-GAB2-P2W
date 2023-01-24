/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.27-MariaDB : Database - p2w_rest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`p2w_rest` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `p2w_rest`;

/*Table structure for table `keys` */

DROP TABLE IF EXISTS `keys`;

CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `keys` */

LOCK TABLES `keys` WRITE;

insert  into `keys`(`id`,`user_id`,`key`,`level`,`ignore_limits`,`is_private_key`,`ip_addresses`,`date_created`) values (1,1,'p2w',1,0,0,NULL,1),(2,3,'rahasia',1,0,0,NULL,2);

UNLOCK TABLES;

/*Table structure for table `limits` */

DROP TABLE IF EXISTS `limits`;

CREATE TABLE `limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `limits` */

LOCK TABLES `limits` WRITE;

insert  into `limits`(`id`,`uri`,`count`,`hour_started`,`api_key`) values (1,'uri:Siswa/index:get',2,1674553344,'rahasia'),(2,'uri:Siswa/index:get',4,1674553364,'p2w');

UNLOCK TABLES;

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `mahasiswa` */

LOCK TABLES `mahasiswa` WRITE;

insert  into `mahasiswa`(`id`,`nama`,`nrp`,`email`,`jurusan`) values (25,'Doddy Ferdiansyah','133040123','doddy@yahoo.com','Teknik Informatika'),(30,'Sandhika Galih','043040023','sandhikagalih@unpas.ac.id','Teknik Informatika'),(31,'Nofariza Handayani','083030030','nofa@yahoo.com','Teknik Lingkungan');

UNLOCK TABLES;

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nrp` char(9) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `siswa` */

LOCK TABLES `siswa` WRITE;

insert  into `siswa`(`id`,`nrp`,`nama`,`email`,`jurusan`) values (1,'023040123','DODYYYHuhu','hajdjah400s@gmail.com','Teknik Informatika'),(2,'023040123','HANIF FZZZZ 9999','hajdjah400s@gmail.com','Teknik Industri'),(34,'19312122','HANIFFF','fzhani@gmail.com','Teknik Informatika'),(39,'1234567','Esa Fernanda','sasa@gmail.com','Teknik Informatika'),(40,'19312130','Made Wiratama','Tamawira82@gmail.com','Teknik Informatika'),(41,'9889000','hjawhdjhajd','ajhdakwjd@gmail.com','Teknik Informatika');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
