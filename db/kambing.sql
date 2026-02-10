/*
SQLyog Ultimate v10.3 
MySQL - 8.0.45-0ubuntu0.24.04.1 : Database - kambing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kambing` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kambing`;

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dibuat_tgl` date DEFAULT NULL,
  `dibuat_oleh` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`nama`,`dibuat_tgl`,`dibuat_oleh`) values (1,'Irving','2024-10-07','admin');

/*Table structure for table `group_user` */

DROP TABLE IF EXISTS `group_user`;

CREATE TABLE `group_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `group_user` */

insert  into `group_user`(`id`,`nama`) values (1,'Administrator'),(2,'Operator');

/*Table structure for table `identitas_kambing` */

DROP TABLE IF EXISTS `identitas_kambing`;

CREATE TABLE `identitas_kambing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `qr` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `jenis` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `berat_lahir` decimal(10,1) DEFAULT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kode_induk_jantan` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kode_induk_betina` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kondisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dibuat_oleh` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dibuat_tgl` date DEFAULT NULL,
  `diedit_oleh` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `diedit_tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `identitas_kambing` */

insert  into `identitas_kambing`(`id`,`kode`,`qr`,`jenis`,`tgl_lahir`,`berat_lahir`,`jenis_kelamin`,`kode_induk_jantan`,`kode_induk_betina`,`kondisi`,`keterangan`,`foto`,`path`,`dibuat_oleh`,`dibuat_tgl`,`diedit_oleh`,`diedit_tgl`) values (1,'Df.F1.J1','Df.F1.J1.png','Dorper F1','2023-11-07','47.6','Jantan','Kosong','Kosong','Sehat','<p>Berasal dari eco farm brastagi bg Heri sitepu</p><p>Tiba di lampung 16 okt 24</p><p>Bertanduk</p><p>20 des 24 dikasih obat cacing</p>','','','admin','2024-10-12','Budi','2024-12-20'),(2,'Df.F1.J2 merah','Df.F1.J2 merah.png','Dorper F1','2023-11-07','50.2','Jantan','Kosong','Kosong','Sehat','<p>Domba berasal dari eco farm brastagi bang heri sitepu.</p><p>Tidak bertanduk</p><p>Tiba di lampung tg l 16 oktober 24</p>','','','admin','2024-10-12','Budi','2024-11-04'),(3,'Df.F1.B1.M1','Df.F1.B1.M1.png','Dorper F1','2024-01-07','33.7','Betina','Kosong','Kosong','Sehat','<ul><li>Berasal dari sultan alfatih bang joko susilo</li><li>Tiba di lampung 16 0kt 24</li><li>2.11.24.keguguran 1 ekor anak</li></ul>','','','admin','2024-10-12','Budi','2024-12-03'),(4,'Df.F1.B2.M1','Df.F1.B2.M1.png','Dorper F1','2024-01-07','38.6','Betina','Kosong','Kosong','Sehat','<p>Berasal dari sultan alfatih farm bang joko</p><p>13 jan 25 melahirkan 1 anak betina kondisi anak mati,induk kesulitan ngeden sewaktu proses melahirkan</p>','','','admin','2024-10-12','admin','2025-01-13'),(5,'Df.F1.B3','Df.F1.B3.png','Dorper F1','2024-01-07','27.9','Betina','Kosong','Kosong','Sehat','<p>Berasal dari sultan alfatih<br></p>','','','admin','2024-10-12','admin','2024-10-12'),(6,'Df.F1.B4','Df.F1.B4.png','Dorper F1','2024-01-07','31.9','Betina','Kosong','Kosong','Sehat','Berasal dari Sultan alfatih farm<br>','','','admin','2024-10-12','','0000-00-00'),(7,'Df.F1.B5','Df.F1.B5.png','Dorper F1','2024-01-07','27.3','Betina','Kosong','Kosong','Sehat','<p>Berasal dari sultan alfatih farm<br></p>','','','admin','2024-10-12','admin','2024-10-12'),(8,'Df.F1.B6','Df.F1.B6.png','Dorper F1','2024-01-07','36.9','Betina','Kosong','Kosong','Sehat','<p>Berasal dari sultan alfatih farm</p>','','','admin','2024-10-12','','0000-00-00'),(9,'Hs.J1','Hs.J1.png','Hair Sheep','2023-02-07','0.0','Jantan','Kosong','Kosong','Sehat','<ul><li>Berasal dari percut bg angga</li><li>Warna putih hitam</li><li>10 des 24 dikasi obat cacing kalbazen</li></ul>','','','admin','2024-10-12','Budi','2024-12-10'),(10,'Hs.J2','Hs.J2.png','Hair Sheep','2023-02-07','0.0','Jantan','Kosong','Kosong','Sehat','<p>Berasal dari percut bg Angga</p><p>Tiba di lampung 16 okt 24</p>','','','admin','2024-10-12','Budi','2024-12-09'),(11,'Hs.J3 hijau','Hs.J3 hijau.png','Hair Sheep','2023-05-07','43.4','Jantan','Kosong','Kosong','Sehat','<ul><li>Berasal dari bang Herman Hq</li><li>Tiba di lampung 16 okt 24</li><li>Warna hijau</li></ul>','','','admin','2024-10-12','Budi','2024-12-08'),(12,'Bb.B1 hijau','Bb.B1 hijau.png','Bulu Bakar','2023-12-07','27.2','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari stabat bg  Andi</li><li>Tba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li><li>Warna hijau</li></ul>','','','admin','2024-10-20','Budi','2024-11-04'),(13,'Df.F1.B7','Df.F1.B7.png','Dorper F1','2024-01-07','303.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari joko al fatih</li></ul>','','','Budi','2024-10-21','Budi','2024-10-21'),(14,'Df.F1.B8','Df.F1.B8.png','Dorper F1','2024-01-15','33.8','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg joko al fatih</li></ul>','','','Budi','2024-10-21','Budi','2024-10-21'),(15,'Df.F1.B9.M1','Df.F1.B9.M1.png','Dorper F1','2024-01-07','38.2','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari joko al fatih</li><li>16 okt 24 tiba di lampung</li><li>15 des 24 melahirkan 2 ekor anak,1 betina dan 1 jantan</li></ul>','','','Budi','2024-10-21','Budi','2024-12-14'),(16,'Df.F1.B10','Df.F1.B10.png','Dorper F1','2024-01-04','39.7','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dsr bg joko al fatih</li></ul>','','','Budi','2024-10-21','Budi','2024-10-21'),(17,'Df.F1.B11','Df.F1.B11.png','Dorper F1','2024-01-15','35.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg joko al fatih</li></ul>','','','Budi','2024-10-21','','0000-00-00'),(18,'Hs.B1','Hs.B1.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asla dari bg Surya dolok masihul</li><li>Sampai di Lampung 16 okt 24</li><li>Tgl 23 okt pejantan Hs.J3</li><li>Hijau</li></ul>','','','Budi','2024-10-23','Budi','2025-04-28'),(19,'Hs.B2','Hs.B2.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg Surya Dolok masihul</li><li>Sampe di lampung 16 okt 24</li><li>Tgl 23 okt 34 pejantan Hs.j3</li><li>Hijau</li></ul>','','','Budi','2024-10-23','Budi','2024-11-03'),(20,'Hs.B3','Hs.B3.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg Surya dolok masihul</li><li>Sampai di lampung 16 okt 24</li><li>Tgl 23 okt 24 pejantan Hs.J3</li><li>Hijau</li></ul>','','','Budi','2024-10-23','Budi','2024-11-03'),(21,'Hs.B4','Hs.B4.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg Surya dolok masihul</li><li>Sampai di lamping 23 okt 24</li><li>Tgl 23 0kt 24 pejantan Hs.J3</li></ul>','','','Budi','2024-10-23','Budi','2024-10-23'),(22,'Hs.B5','Hs.B5.png','Hair Sheep','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya dolok madihul</li><li>Sampe fi lampung tgl 16 okt 24</li><li>Tgl 23 okt 24 pejantan Hs.J3</li></ul>','','','Budi','2024-10-23','','0000-00-00'),(23,'Hs.B6','Hs.B6.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya</li><li>Tiba di lampung 16 okt 24</li><li>Tg 23 okt 24 pajantan Hs.J3</li></ul>','','','Budi','2024-10-23','','0000-00-00'),(24,'Hs.B7','Hs.B7.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya</li><li>Tiba di lampung tgl 16 okt 24</li><li>Tgl 23 okt 24 pejantan Hs.J3</li></ul>','','','Budi','2024-10-23','','0000-00-00'),(25,'Hs.B8','Hs.B8.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sakit','<ul><li>Asal darri bg surya </li><li>Tiba di lampung 16 okt 24</li><li>23 okt 24 pejantah Hs.J3</li><li>12 nov 24 sakit koreng</li></ul>','','','Budi','2024-10-23','Budi','2024-11-12'),(26,'Hs.B9','Hs.B9.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Toba di lampung 16 okt 24</li><li>Pejantan Hs.J3</li></ul>','','','Budi','2024-10-28','','0000-00-00'),(27,'Hs.B10','Hs.B10.png','Hair Sheep','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','Budi','2024-12-04'),(28,'Hs.B.11','Hs.B.11.png','Hair Sheep','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya dolok masihul</li><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','','0000-00-00'),(29,'Hs.B.12','Hs.B.12.png','Hair Sheep','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Aslal dari bg surya dolok nasihul</li><li>Tiba di lampubg 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3 dari bg herman</li></ul>','','','Budi','2024-10-28','','0000-00-00'),(30,'Hs.B.13','Hs.B.13.png','Hair Sheep','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya dolok masihul</li><li>Tiba di lampubg 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','','0000-00-00'),(31,'Hs.B.14','Hs.B.14.png','Hair Sheep','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surya dolok masihul</li><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','','0000-00-00'),(32,'Hs.B15.M1','Hs.B15.M1.png','Hair Sheep','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg surua dolok masihul</li><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li><li>6 januari keguguran</li></ul>','','','Budi','2024-10-28','Budi','2025-01-10'),(33,'Bb.B.2','Bb.B.2.png','Bulu Bakar','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg andi stabat</li><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','Budi','2024-10-28'),(34,'Bb.B.3','Bb.B.3.png','Bulu Bakar','2023-12-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari bg andi stabat</li><li>Tiba di lamping 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-10-28','Budi','2024-11-01'),(35,'Bb.B.4','Bb.B.4.png','Bulu Bakar','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<ul><li>Asla dari stabat bg andi</li><li>Tiba di lampung tgl 16 okt 24</li><li>Pejantan Hs.J.3</li></ul>','','','Budi','2024-11-01','Budi','2024-11-01'),(36,'Bb.B.5','Bb.B.5.png','Bulu Bakar','2024-01-15','22.5','Betina','Kosong','Kosong','Sehat','<ul><li>Asal dari stabat</li><li>Tiba di lampung 16 okt 24</li><li>24 okt 24 pejantan Hs.J.3</li></ul>','','','Budi','2024-11-01','Budi','2024-11-02'),(37,'Bb.B6 merah','Bb.B6 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asala dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>24 okt 24 pejantan Df.F1.J.2</p>','','','Budi','2024-11-02','Budi','2024-12-08'),(38,'Bb.B7 merah','Bb.B7 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(39,'Bb.B8 merah','Bb.B8 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(40,'Bb.B9 merah +','Bb.B9 merah +.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p><p>Dikawini tgl 4 nov 24</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(41,'Bb.B.10 merah','Bb.B.10 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(42,'Bb.B.11 merah','Bb.B.11 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24 </p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(43,'Bb.B12 merah','Bb.B12 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejabtan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(44,'Bb.B.13 merah','Bb.B.13 merah.png','Bulu Bakar','2024-01-15','25.9','Betina','Kosong','Kosong','Sehat','<p>Asak dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(45,'Bb.B14 merah','Bb.B14 merah.png','Bulu Bakar','2024-01-15','23.9','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(46,'Bb.B15 merah','Bb.B15 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dsri stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(47,'Bb.B.16 merah','Bb.B.16 merah.png','Bulu Bakar','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(48,'Bb.B.17 merah','Bb.B.17 merah.png','Bulu Bakar','2024-01-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(49,'Bb.B.18 merah','Bb.B.18 merah.png','Bulu Bakar','2024-01-15','27.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejanyan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(50,'Bb.B.19 merah','Bb.B.19 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asak dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p><p><br></p>','','','Budi','2024-11-02','Budi','2024-11-04'),(51,'Bb.B.20 merah.M1','Bb.B.20 merah.M1.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stbat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df F1.J2</p><p>Tgl 1.12.24 melahirkan 1 ekor jantan berat 2 kg</p>','','','Budi','2024-11-02','Budi','2024-12-03'),(52,'Bb.B.21 merah','Bb.B.21 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(53,'Bb.B.22 merah','Bb.B.22 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J.2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(54,'Bb.B.23 merah','Bb.B.23 merah.png','Bulu Bakar','2024-01-15','29.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(55,'Bb.B.24 merah','Bb.B.24 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(56,'Bb.B.25 merah','Bb.B.25 merah.png','Bulu Bakar','2024-01-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari stabat</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Df.F1.J2</p>','','','Budi','2024-11-02','Budi','2024-11-04'),(57,'Hs.J 11','Hs.J 11.png','Hair Sheep','2023-11-12','50.0','Jantan','Kosong','Kosong','Sehat','<ul><li>Asal dari pak dolok</li><li>16 okt 24 iba di lampung</li><li>12 nov 24 diberi obat cacing kalbazen</li></ul>','','','Budi','2024-11-12','Budi','2024-12-06'),(58,'Hs.B16 .M1','Hs.B16 .M1.png','Hair Sheep','2024-02-15','25.0','Betina','Kosong','Kosong','Sehat','<p>16.5.24 tiba di lampung</p><p>26.11.24 melahirkan 1 ekor anak betina berat 2 kg</p><p><br></p>','','','Budi','2024-12-03','Budi','2024-12-03'),(59,'Rijek','Rijek.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>16.5.24 tiba di lampung</p><p>Asal dari dolok masihul</p><p>16.11.24 melahirkan 1 ekor anak betina,berat 2 kg</p>','','','Budi','2024-12-03','Budi','2024-12-03'),(60,'Hs.B17','Hs.B17.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung 16 okt 24</p>','','','Budi','2024-12-06','','0000-00-00'),(61,'Hs.B18','Hs.B18.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Tiba di lampung 16 0kt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(62,'Hs.B19','Hs.B19.png','Hair Sheep','2024-02-15','20.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lamping 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(63,'HS.B20','HS.B20.png','Hair Sheep','2024-02-15','22.0','Betina','','','Sehat','<p>Asal dari medan</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(64,'Hs.B21','Hs.B21.png','Hair Sheep','2024-03-15','22.0','Betina','','','Sehat','<p>Asal dari medan</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(65,'Hs.B22','Hs.B22.png','Hair Sheep','2024-02-15','22.0','Betina','','','Sehat','<p>Asal dari medan</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(66,'Hs.B23','Hs.B23.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lamung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(67,'Hs.B24','Hs.B24.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(68,'Hs.B25','Hs.B25.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 2024</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-08'),(69,'Hs.B26','Hs.B26.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>asal dari medan</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(70,'Hs.B27','Hs.B27.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(71,'Hs.B28','Hs.B28.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>asal dari medan</p><p>Tiba di lampung tgl 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(72,'Hs.B29','Hs.B29.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 2024</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(73,'Hs.B30','Hs.B30.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 24</p><p>Penjantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(74,'Hs.B31','Hs.B31.png','Hair Sheep','2024-02-19','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 24</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(75,'Hs.B32','Hs.B32.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari medan</p><p>Tiba di lampung tgl 16 okt 24</p>','','','Budi','2024-12-06','Budi','2024-12-06'),(76,'Hs.B33','Hs.B33.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari meda</p><p>16 okt 24 tiba di lampung</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','','0000-00-00'),(77,'Bb.B26','Bb.B26.png','Bulu Bakar','2024-02-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Setabat</p><p>16 okt 24 tiba di lampung</p><p>Pejantan Hs.J4</p><p><br></p>','','','Budi','2024-12-06','admin','2024-12-09'),(78,'Bb.B27','Bb.B27.png','Bulu Bakar','2024-02-15','23.0','Betina','Kosong','Kosong','Sehat','<p>asal dari stabat</p><p>16 okt 24 tiba di medan</p><p>Pejantan Hs.J4</p>','','','Budi','2024-12-06','admin','2024-12-09'),(79,'Hs.J4','Hs.J4.png','Hair Sheep','2023-10-15','45.0','Jantan','Kosong','Kosong','Sehat','<p>Asal dari Medan</p><p>16 okt 24 tiba di lampung</p>','','','admin','2024-12-06','Budi','2024-12-08'),(80,'Hs.B34','Hs.B34.png','Hair Sheep','2024-03-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul bg surya</p><p>16 okt tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(81,'Hs.B35','Hs.B35.png','Hair Sheep','2024-02-08','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di medan</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(82,'Hs.B36','Hs.B36.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(83,'Hs.B37','Hs.B37.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(84,'Hs.B38','Hs.B38.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(85,'Hs.B39','Hs.B39.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(86,'Hs.B40','Hs.B40.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(87,'Hs.B41','Hs.B41.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(88,'Hs.B42','Hs.B42.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(89,'Hs.B43','Hs.B43.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(90,'Hs.B44','Hs.B44.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihu Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(91,'Hs.B45','Hs.B45.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(92,'Hs.B46','Hs.B46.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(93,'Bb.B28','Bb.B28.png','Bulu Bakar','2024-02-15','22.0','Betina','Kosong','','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(94,'Bb.B29','Bb.B29.png','Bulu Bakar','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(95,'Bb.B30','Bb.B30.png','Bulu Bakar','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(96,'Bb.B31','Bb.B31.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(97,'Bb.B32','Bb.B32.png','Bulu Bakar','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(98,'Bb.B33','Bb.B33.png','Bulu Bakar','2024-02-08','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>!6 okt 24 tiba di lampung</p><p>Pejantan Hs.J2</p>','','','Budi','2024-12-08','','0000-00-00'),(99,'Hs.J5','Hs.J5.png','Hair Sheep','2022-06-16','45.0','Jantan','Kosong','Kosong','Sehat','<p>Asal dari Medan bg rizal</p><p>16 okt 24 tiba di lampung</p><p>10 des 24 diberi obat cacing</p>','','','Budi','2024-12-10','Budi','2024-12-12'),(100,'Hs.B47','Hs.B47.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(101,'Hs.B48','Hs.B48.png','Hair Sheep','2024-02-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(102,'Hs.B49','Hs.B49.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(103,'Hs.B50','Hs.B50.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(104,'Hs.B51','Hs.B51.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(105,'Hs.B52','Hs.B52.png','Hair Sheep','2024-03-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(106,'Hs.B53','Hs.B53.png','Hair Sheep','2024-03-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(107,'Hs.B54','Hs.B54.png','Hair Sheep','2024-03-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(108,'Hs.B55','Hs.B55.png','Hair Sheep','2024-03-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(109,'Hs.B56','Hs.B56.png','Hair Sheep','2024-05-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(110,'Hs.B57','Hs.B57.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(111,'Hs.B58','Hs.B58.png','Hair Sheep','2024-04-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(112,'Hs.B59','Hs.B59.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(113,'Hs.B60','Hs.B60.png','Hair Sheep','2024-03-15','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(114,'Hs.B61','Hs.B61.png','Hair Sheep','2024-03-12','22.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','Budi','2024-12-12'),(115,'Bb.B34','Bb.B34.png','Bulu Bakar','2024-03-12','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(116,'Bb.B35','Bb.B35.png','Bulu Bakar','2024-03-12','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(117,'Bb.B36','Bb.B36.png','Bulu Bakar','2024-03-15','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(118,'Bb.B37','Bb.B37.png','Bulu Bakar','2024-03-12','25.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p>','','','Budi','2024-12-12','','0000-00-00'),(119,'Hs.J6','Hs.J6.png','Hair Sheep','2023-07-07','45.0','Jantan','Kosong','Kosong','Sehat','<p>Asal dari deli tua medan</p><p>16 okt 24 tiba di lampung</p><p>Kandang K</p>','','','Budi','2024-12-20','Budi','2025-01-13'),(120,'Hs.B62','Hs.B62.png','Hair Sheep','2024-03-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(121,'Hs.B63','Hs.B63.png','Hair Sheep','2024-03-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(122,'Hs.B64','Hs.B64.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(123,'Hs.B65','Hs.B65.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(124,'Hs.B66','Hs.B66.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(125,'Hs.B67','Hs.B67.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(126,'Hs.B68','Hs.B68.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(127,'Hs.B69','Hs.B69.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(128,'Hs.B70','Hs.B70.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(129,'Hs.71','Hs.71.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(130,'Hs.B72','Hs.B72.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(131,'Hs.B73','Hs.B73.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(132,'Hs.B74','Hs.B74.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(133,'Hs.B75','Hs.B75.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(134,'Hs.B76','Hs.B76.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(135,'Hs.B77','Hs.B77.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(136,'Hs.B78','Hs.B78.png','Hair Sheep','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari dolok masihul</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(137,'Bb.B38','Bb.B38.png','Bulu Bakar','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(138,'Bb.B39','Bb.B39.png','Bulu Bakar','2024-03-20','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00'),(139,'Bb.B40','Bb.B40.png','Bulu Bakar','2024-03-15','23.0','Betina','Kosong','Kosong','Sehat','<p>Asal dari Stabat</p><p>16 okt 24 tiba di Lampung</p><p>Pejantan Hs.J6</p>','','','Budi','2024-12-20','','0000-00-00');

/*Table structure for table `jenis_kambing` */

DROP TABLE IF EXISTS `jenis_kambing`;

CREATE TABLE `jenis_kambing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `jenis_kambing` */

insert  into `jenis_kambing`(`id`,`nama`) values (1,'Dorper Full Blood'),(2,'Dorper F1'),(10,'Dorfer F2'),(11,'Hair Sheep'),(12,'Bulu Bakar');

/*Table structure for table `jenis_vaksin` */

DROP TABLE IF EXISTS `jenis_vaksin`;

CREATE TABLE `jenis_vaksin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `jenis_vaksin` */

insert  into `jenis_vaksin`(`id`,`nama`,`keterangan`) values (1,'Clostridial (CDT)','<p>Melindungi domba dari tetanus (disebabkan oleh <em>Clostridium tetani</em>) dan enterotoxemia (penyakit pembusukan usus, disebabkan oleh <em>Clostridium perfringens</em> tipe C dan D).<br></p>'),(2,'Soremouth (Orf)','<p>Penyakit ini menyebabkan lesi dan luka pada bibir dan mulut domba, dan sangat menular. Vaksin ini biasanya diberikan dengan cara menerapkan vaksin pada kulit yang tergores.<br></p>'),(3,'Pasteurella','<p>Vaksin ini membantu melindungi domba dari infeksi pernapasan yang bisa berakibat fatal, terutama pada domba muda.<br></p>'),(4,'Footrot','<p>Penyakit ini menyebabkan pembusukan dan infeksi pada kuku domba, menyebabkan kesulitan berjalan dan produktivitas yang menurun.<br></p>'),(5,'Chlamydia dan Campylobacter (Vibriosis)','<p>Vaksin ini diberikan terutama untuk domba betina yang sedang bunting atau yang akan bunting untuk mencegah keguguran.<br></p>'),(6,'Rabies','<p>Diberikan terutama di daerah di mana rabies merupakan ancaman bagi domba, meskipun jarang digunakan.<br></p>'),(7,'Anthrax','<p>Penyakit ini sangat mematikan dan bisa menyebar dengan cepat di antara hewan ternak. Vaksin diberikan terutama di daerah yang pernah mengalami wabah anthrax.<br></p>'),(8,'Brucellosis (Rev-1)','<p>Penyakit ini menyebabkan keguguran pada domba betina dan bisa menyebar ke manusia. Vaksin ini diberikan di daerah endemik.<br></p>'),(9,'Caseous Lymphadenitis (CLA)','<p>Penyakit ini menyebabkan pembengkakan kelenjar getah bening yang bernanah, yang bisa menyebabkan penurunan produksi dan kematian.<br></p>'),(11,'Johne\'s Disease','<p>Penyakit kronis yang menyebabkan diare dan penurunan berat badan. Vaksin ini dapat membantu mengendalikan penyebaran penyakit dalam kawanan.<br></p>');

/*Table structure for table `keuangan_konfigurasi` */

DROP TABLE IF EXISTS `keuangan_konfigurasi`;

CREATE TABLE `keuangan_konfigurasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_konfigurasi` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nilai` decimal(15,2) NOT NULL,
  `satuan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `diedit_tgl` date DEFAULT NULL,
  `diedit_oleh` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `keuangan_konfigurasi` */

insert  into `keuangan_konfigurasi`(`id`,`nama_konfigurasi`,`nilai`,`satuan`,`keterangan`,`diedit_tgl`,`diedit_oleh`) values (1,'harga_pasar_per_kg','65000.00','Rp/Kg','Estimasi harga jual daging kambing per kg',NULL,NULL),(2,'biaya_tenaga_kerja_per_ekor_bulan','50000.00','Rp','Biaya tenaga kerja yang dibebankan per ekor per bulan',NULL,NULL);

/*Table structure for table `keuangan_transaksi` */

DROP TABLE IF EXISTS `keuangan_transaksi`;

CREATE TABLE `keuangan_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` enum('Penjualan','Pembelian','Operasional') COLLATE latin1_general_ci NOT NULL,
  `kategori` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `kode_referensi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `keuangan_transaksi` */

/*Table structure for table `kondisi_kambing` */

DROP TABLE IF EXISTS `kondisi_kambing`;

CREATE TABLE `kondisi_kambing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `kondisi_kambing` */

insert  into `kondisi_kambing`(`id`,`nama`) values (1,'Sehat'),(2,'Sakit');

/*Table structure for table `master_kandang` */

DROP TABLE IF EXISTS `master_kandang`;

CREATE TABLE `master_kandang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kandang` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lokasi` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `kapasitas` int DEFAULT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `master_kandang` */

/*Table structure for table `master_pakan` */

DROP TABLE IF EXISTS `master_pakan`;

CREATE TABLE `master_pakan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pakan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `satuan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_pakan` enum('Hijauan','Konsentrat','Suplemen','Lainnya') COLLATE latin1_general_ci DEFAULT 'Hijauan',
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `master_pakan` */

/*Table structure for table `pemberian_pakan` */

DROP TABLE IF EXISTS `pemberian_pakan`;

CREATE TABLE `pemberian_pakan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kandang` int NOT NULL,
  `id_pakan` int NOT NULL,
  `tgl_pemberian` date NOT NULL,
  `waktu_pemberian` enum('Pagi','Siang','Sore','Malam') COLLATE latin1_general_ci NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kandang` (`id_kandang`),
  KEY `id_pakan` (`id_pakan`),
  CONSTRAINT `pemberian_pakan_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `master_kandang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pemberian_pakan_ibfk_2` FOREIGN KEY (`id_pakan`) REFERENCES `master_pakan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `pemberian_pakan` */

/*Table structure for table `riwayat_birahi` */

DROP TABLE IF EXISTS `riwayat_birahi`;

CREATE TABLE `riwayat_birahi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kambing` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_birahi` date NOT NULL,
  `tgl_prediksi_berikutnya` date NOT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_birahi` */

/*Table structure for table `riwayat_pengobatan` */

DROP TABLE IF EXISTS `riwayat_pengobatan`;

CREATE TABLE `riwayat_pengobatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_riwayat_sakit` int DEFAULT NULL,
  `tgl_pengobatan` date DEFAULT NULL,
  `obat` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `durasi` int DEFAULT NULL,
  `dokter` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `dibuat_tgl` date DEFAULT NULL,
  `dibuat_oleh` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_riwayat_sakit` (`id_riwayat_sakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_pengobatan` */

/*Table structure for table `riwayat_penyakit` */

DROP TABLE IF EXISTS `riwayat_penyakit`;

CREATE TABLE `riwayat_penyakit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kambing` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_diagnosa` date DEFAULT NULL,
  `penyakit` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `gejala` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `tindakan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `dokter` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dibuat_tgl` date DEFAULT NULL,
  `dibuat_oleh` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_penyakit` */

/*Table structure for table `riwayat_perkawinan` */

DROP TABLE IF EXISTS `riwayat_perkawinan`;

CREATE TABLE `riwayat_perkawinan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_induk_betina` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `kode_induk_jantan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_kawin` date NOT NULL,
  `tgl_hpl` date NOT NULL,
  `status` enum('Hamil','Gagal','Lahir','Monitor') COLLATE latin1_general_ci DEFAULT 'Monitor',
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_perkawinan` */

/*Table structure for table `riwayat_pertumbuhan` */

DROP TABLE IF EXISTS `riwayat_pertumbuhan`;

CREATE TABLE `riwayat_pertumbuhan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kambing` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_pengukuran` date DEFAULT NULL,
  `berat` decimal(10,1) DEFAULT NULL,
  `tinggi` decimal(10,1) DEFAULT NULL,
  `panjang` decimal(10,1) DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `dibuat_tgl` date DEFAULT NULL,
  `dibuat_oleh` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_pertumbuhan` */

/*Table structure for table `riwayat_vaksin` */

DROP TABLE IF EXISTS `riwayat_vaksin`;

CREATE TABLE `riwayat_vaksin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_kambing` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_vaksin` date DEFAULT NULL,
  `jenis_vaksin` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dosis` decimal(10,1) DEFAULT NULL,
  `dokter` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `dibuat_tgl` date DEFAULT NULL,
  `dibuat_oleh` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `riwayat_vaksin` */

/*Table structure for table `sex_kambing` */

DROP TABLE IF EXISTS `sex_kambing`;

CREATE TABLE `sex_kambing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `sex_kambing` */

insert  into `sex_kambing`(`id`,`nama`) values (1,'Jantan'),(2,'Betina');

/*Table structure for table `stok_pakan` */

DROP TABLE IF EXISTS `stok_pakan`;

CREATE TABLE `stok_pakan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pakan` int NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` enum('Masuk','Keluar') COLLATE latin1_general_ci NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `dibuat_tgl` date NOT NULL,
  `dibuat_oleh` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pakan` (`id_pakan`),
  CONSTRAINT `stok_pakan_ibfk_1` FOREIGN KEY (`id_pakan`) REFERENCES `master_pakan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `stok_pakan` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `dibuat_oleh` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dibuat_tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`nama_lengkap`,`user`,`pass`,`group_id`,`dibuat_oleh`,`dibuat_tgl`) values (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3',1,'admin','2024-10-12'),(10,'Budiman','budi','00dfc53ee86af02e742515cdcf075ed3',2,'admin','2024-10-12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
