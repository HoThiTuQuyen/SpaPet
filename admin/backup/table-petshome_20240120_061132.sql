-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: petshome
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anh_dv`
--

DROP TABLE IF EXISTS `anh_dv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anh_dv` (
  `ma_anh` int(11) NOT NULL,
  `anhdv` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_anh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anh_dv`
--

LOCK TABLES `anh_dv` WRITE;
/*!40000 ALTER TABLE `anh_dv` DISABLE KEYS */;
/*!40000 ALTER TABLE `anh_dv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_donhang`
--

DROP TABLE IF EXISTS `chitiet_donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_donhang` (
  `mactdh` int(11) NOT NULL AUTO_INCREMENT,
  `madh` int(11) DEFAULT NULL,
  `masp` varchar(255) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gianhap` decimal(10,3) NOT NULL,
  `tonggia_nhap` decimal(10,3) NOT NULL,
  `gia` decimal(10,3) DEFAULT NULL,
  `tonggia` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`mactdh`),
  KEY `madh` (`madh`),
  KEY `masp` (`masp`),
  CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_donhang`
--

LOCK TABLES `chitiet_donhang` WRITE;
/*!40000 ALTER TABLE `chitiet_donhang` DISABLE KEYS */;
INSERT INTO `chitiet_donhang` VALUES (90,86,'SP001',2,150.000,300.000,200.000,400.000),(93,89,'SP008',2,140.000,280.000,180.000,360.000),(94,90,'SP008',2,140.000,280.000,180.000,360.000),(95,90,'SP006',7,110.000,770.000,150.000,1050.000),(96,91,'SP002',2,170.000,340.000,215.000,430.000),(97,92,'SP007',3,35.000,105.000,55.000,165.000),(98,93,'SP001',2,150.000,300.000,200.000,400.000),(99,94,'SP008',2,140.000,280.000,180.000,360.000),(100,95,'SP002',1,170.000,170.000,215.000,215.000),(101,96,'SP001',2,150.000,300.000,200.000,400.000),(102,97,'SP003',1,250.000,250.000,315.000,315.000),(103,98,'SP007',3,35.000,105.000,55.000,165.000),(104,99,'SP003',3,250.000,750.000,315.000,945.000),(105,100,'SP006',3,110.000,330.000,150.000,450.000),(106,101,'SP007',5,35.000,175.000,55.000,275.000),(107,101,'SP007',5,35.000,175.000,55.000,275.000),(108,101,'SP011',2,0.000,0.000,75.000,150.000),(109,101,'SP010',2,0.000,0.000,70.000,140.000),(110,101,'SP010',2,0.000,0.000,70.000,140.000),(111,101,'SP014',2,0.000,0.000,45.000,90.000),(112,102,'SP018',1,0.000,0.000,495.000,495.000),(113,102,'SP001',5,150.000,750.000,200.000,1000.000),(114,102,'SP002',3,170.000,510.000,215.000,645.000),(115,103,'SP004',6,170.000,1020.000,220.000,1320.000),(116,103,'SP001',7,150.000,1050.000,200.000,1400.000),(117,104,'SP002',10,170.000,1700.000,215.000,2150.000),(118,104,'SP008',2,140.000,280.000,180.000,360.000),(119,104,'SP010',2,0.000,0.000,70.000,140.000),(120,104,'SP010',2,0.000,0.000,70.000,140.000),(121,104,'SP011',1,0.000,0.000,75.000,75.000),(122,104,'SP003',2,250.000,500.000,315.000,945.000),(123,104,'SP003',2,250.000,500.000,315.000,945.000),(124,104,'SP006',2,110.000,220.000,150.000,450.000),(125,105,'SP001',8,150.000,1200.000,200.000,1600.000),(126,106,'SP003',3,250.000,750.000,315.000,945.000),(127,106,'SP003',3,250.000,750.000,315.000,945.000),(128,107,'SP003',1,250.000,250.000,315.000,315.000),(129,107,'SP003',1,250.000,250.000,315.000,315.000),(130,107,'SP003',1,250.000,250.000,315.000,315.000),(131,107,'SP005',1,18.000,18.000,25.000,25.000),(132,107,'SP005',1,18.000,18.000,25.000,25.000),(133,107,'SP005',1,18.000,18.000,25.000,25.000),(134,107,'SP005',1,18.000,18.000,25.000,25.000),(135,108,'SP002',19,170.000,3230.000,215.000,4945.000),(136,108,'SP005',10,18.000,180.000,25.000,425.000),(137,108,'SP009',7,0.000,0.000,90.000,630.000),(138,109,'SP006',12,110.000,1320.000,150.000,2100.000),(139,110,'SP002',4,170.000,680.000,215.000,860.000),(140,111,'SP002',1,170.000,170.000,215.000,215.000),(141,112,'SP002',2,170.000,340.000,215.000,430.000),(142,113,'SP003',2,250.000,500.000,315.000,630.000);
/*!40000 ALTER TABLE `chitiet_donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_datlich`
--

DROP TABLE IF EXISTS `ct_datlich`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_datlich` (
  `mact_ddv` int(11) NOT NULL AUTO_INCREMENT,
  `maddv` int(100) NOT NULL,
  `madv` int(11) NOT NULL,
  `maldv` int(100) NOT NULL,
  `giadv` decimal(10,3) NOT NULL,
  `tenpet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mact_ddv`),
  KEY `madv` (`madv`),
  KEY `maddv` (`maddv`),
  CONSTRAINT `ct_datlich_ibfk_1` FOREIGN KEY (`madv`) REFERENCES `dichvu` (`madv`),
  CONSTRAINT `ct_datlich_ibfk_2` FOREIGN KEY (`maddv`) REFERENCES `don_dichvu` (`maddv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_datlich`
--

LOCK TABLES `ct_datlich` WRITE;
/*!40000 ALTER TABLE `ct_datlich` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_datlich` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_phieunhap`
--

DROP TABLE IF EXISTS `ct_phieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_phieunhap` (
  `mact_pn` int(11) NOT NULL AUTO_INCREMENT,
  `mapn` int(11) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` decimal(10,3) DEFAULT NULL,
  `tongtien_sp` decimal(10,3) NOT NULL,
  PRIMARY KEY (`mact_pn`),
  KEY `mapn` (`mapn`,`masp`),
  KEY `masp` (`masp`),
  CONSTRAINT `ct_phieunhap_ibfk_1` FOREIGN KEY (`mapn`) REFERENCES `phieunhap` (`mapn`),
  CONSTRAINT `ct_phieunhap_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_phieunhap`
--

LOCK TABLES `ct_phieunhap` WRITE;
/*!40000 ALTER TABLE `ct_phieunhap` DISABLE KEYS */;
INSERT INTO `ct_phieunhap` VALUES (99,66,'SP001','',20,150.000,3000.000),(100,67,'SP002','',20,170.000,3400.000),(101,67,'SP003','',20,250.000,5000.000),(102,68,'SP008','',30,140.000,4200.000),(103,68,'SP006','',15,110.000,1650.000),(104,68,'SP007','',25,35.000,875.000),(105,69,'SP004','',30,170.000,5100.000),(106,69,'SP003','',20,250.000,5000.000),(107,69,'SP007','',28,35.000,980.000),(108,69,'SP010','',32,0.000,0.000),(109,69,'SP005','',35,18.000,630.000),(110,69,'SP011','',20,0.000,0.000),(111,70,'SP005','',28,18.000,504.000),(112,70,'SP019','',18,0.000,0.000),(113,70,'SP009','',22,0.000,0.000),(114,70,'SP017','',28,0.000,0.000),(115,70,'SP014','',26,0.000,0.000),(116,70,'SP012','',15,0.000,0.000),(117,71,'SP018','',11,0.000,0.000),(118,71,'SP022','',6,0.000,0.000),(119,71,'SP016','',30,0.000,0.000),(120,71,'SP010','',30,0.000,0.000),(121,73,'SP013','',18,0.000,0.000),(122,73,'SP005','',22,18.000,396.000),(123,73,'SP021','',7,0.000,0.000),(124,73,'SP020','',26,0.000,0.000),(125,73,'SP014','',22,0.000,0.000),(126,73,'SP009','',17,0.000,0.000),(127,74,'SP001','',14,150.000,2100.000),(128,74,'SP003','',10,250.000,2500.000),(129,74,'SP004','',18,170.000,3060.000),(130,74,'SP005','',22,18.000,396.000),(131,74,'SP009','',14,0.000,0.000),(132,74,'SP011','',6,0.000,0.000),(133,74,'SP010','',8,0.000,0.000),(134,74,'SP013','',12,0.000,0.000),(135,75,'SP011','',18,0.000,0.000),(136,75,'SP007','',23,35.000,805.000),(137,75,'SP012','',15,0.000,0.000);
/*!40000 ALTER TABLE `ct_phieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_phieuxuat`
--

DROP TABLE IF EXISTS `ct_phieuxuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_phieuxuat` (
  `mact_px` int(11) NOT NULL AUTO_INCREMENT,
  `mapx` int(11) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` decimal(10,3) NOT NULL,
  `tongtien_sp` decimal(10,3) NOT NULL,
  PRIMARY KEY (`mact_px`),
  KEY `mapx` (`mapx`,`masp`),
  KEY `masp` (`masp`),
  CONSTRAINT `ct_phieuxuat_ibfk_1` FOREIGN KEY (`mapx`) REFERENCES `phieuxuat` (`mapx`),
  CONSTRAINT `ct_phieuxuat_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_phieuxuat`
--

LOCK TABLES `ct_phieuxuat` WRITE;
/*!40000 ALTER TABLE `ct_phieuxuat` DISABLE KEYS */;
INSERT INTO `ct_phieuxuat` VALUES (19,22,'SP002','',1,215.000,215.000),(20,22,'SP001','',1,200.000,200.000),(21,23,'SP003','',2,315.000,630.000),(22,24,'SP007','',6,55.000,330.000);
/*!40000 ALTER TABLE `ct_phieuxuat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `danhmuc` (
  `madm` varchar(100) NOT NULL,
  `tendm` varchar(50) NOT NULL,
  `motadm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`madm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES ('DM01','Đồ dùng cho chó',''),('DM02','Đồ dùng cho mèo',''),('DM03','Thiết bị thông minh',''),('DM04','Hàng mới về','');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dat_lich`
--

DROP TABLE IF EXISTS `dat_lich`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dat_lich` (
  `madl` int(11) NOT NULL AUTO_INCREMENT,
  `loai_dich_vu` varchar(255) NOT NULL,
  `dich_vu` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `gio` varchar(255) NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL DEFAULT 'Đã đặt',
  PRIMARY KEY (`madl`),
  KEY `loai_dich_vu` (`loai_dich_vu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dat_lich`
--

LOCK TABLES `dat_lich` WRITE;
/*!40000 ALTER TABLE `dat_lich` DISABLE KEYS */;
/*!40000 ALTER TABLE `dat_lich` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datlich1`
--

DROP TABLE IF EXISTS `datlich1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datlich1` (
  `madatlich` int(11) NOT NULL AUTO_INCREMENT,
  `madv` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngay` date NOT NULL,
  `mangay` int(11) DEFAULT NULL,
  `makg` int(11) NOT NULL,
  `magio` int(11) DEFAULT NULL,
  `tenkh` varchar(255) NOT NULL,
  `sdt` int(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  PRIMARY KEY (`madatlich`),
  KEY `madv` (`madv`),
  KEY `makg` (`makg`),
  CONSTRAINT `datlich1_ibfk_1` FOREIGN KEY (`magio`) REFERENCES `gio1` (`magio`),
  CONSTRAINT `datlich1_ibfk_2` FOREIGN KEY (`madv`) REFERENCES `dichvu` (`madv`),
  CONSTRAINT `datlich1_ibfk_3` FOREIGN KEY (`mangay`) REFERENCES `ngay1` (`mangay`),
  CONSTRAINT `datlich1_ibfk_4` FOREIGN KEY (`makg`) REFERENCES `khung_gio` (`makg`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datlich1`
--

LOCK TABLES `datlich1` WRITE;
/*!40000 ALTER TABLE `datlich1` DISABLE KEYS */;
INSERT INTO `datlich1` VALUES (117,18,'2024-01-02','2024-01-03',NULL,3,NULL,'Tú Quyên',993854960,'httuquyen01@gmail.com','','DaDat'),(118,11,'2024-01-02','2024-01-04',NULL,1,NULL,'Khanh Ngan',987457151,'khanhngan220302@gmail.com','','DaDat'),(119,24,'2024-01-02','2024-01-04',NULL,2,NULL,'Khanh Ngan',987457151,'khanhngan220302@gmail.com','','DaDat'),(120,31,'2024-01-02','2024-01-06',NULL,3,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(121,18,'2024-01-02','2024-01-04',NULL,2,NULL,'Khanh Ngan',987457151,'khanhngan220302@gmail.com','','DaDat'),(122,40,'2024-01-02','2024-01-06',NULL,3,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(123,39,'2024-01-03','2024-01-04',NULL,2,NULL,'Tú Quyên',987457151,'ttptruong23@gmail.com','','DaDat'),(124,22,'2024-01-03','2024-01-07',NULL,3,NULL,'Tú Quyên',993854960,'ttptruong23@gmail.com','','DaDat'),(125,37,'2024-01-03','2024-01-05',NULL,6,NULL,'Tú Quyên',987457151,'zvsdgvdxzhb','','DaDat'),(126,23,'2024-01-04','2024-01-05',NULL,4,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(127,37,'2024-01-05','2024-01-05',NULL,1,NULL,'Ngọc',947748585,'ngocvo1603@gmail.com','','DaDat'),(128,23,'2024-01-05','2024-01-06',NULL,3,NULL,'Ngọc',987457151,'ngocvo1603@gmail.com','','DaDat'),(129,17,'2024-01-05','2024-01-06',NULL,2,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(130,23,'2024-01-05','2024-01-06',NULL,2,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(131,19,'2024-01-05','2024-01-06',NULL,1,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(132,33,'2024-01-09','2024-01-11',NULL,3,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(133,24,'2024-01-12','2024-01-13',NULL,3,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(134,31,'2024-01-12','2024-01-13',NULL,3,NULL,'Khanh Ngan',993854960,'httuquyen01@gmail.com','','DaDat'),(135,39,'2024-01-12','2024-01-13',NULL,3,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat'),(136,25,'2024-01-12','2024-01-13',NULL,2,NULL,'Tú Quyên',987457151,'httuquyen01@gmail.com','','DaDat');
/*!40000 ALTER TABLE `datlich1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dichvu`
--

DROP TABLE IF EXISTS `dichvu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dichvu` (
  `madv` int(11) NOT NULL AUTO_INCREMENT,
  `maldv` int(11) NOT NULL,
  `tendv` varchar(55) NOT NULL,
  `giadv` decimal(10,3) NOT NULL,
  `trangthai` varchar(55) NOT NULL DEFAULT 'Kích hoạt',
  PRIMARY KEY (`madv`),
  KEY `maldv` (`maldv`),
  CONSTRAINT `dichvu_ibfk_1` FOREIGN KEY (`maldv`) REFERENCES `loaidichvu` (`maldv`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dichvu`
--

LOCK TABLES `dichvu` WRITE;
/*!40000 ALTER TABLE `dichvu` DISABLE KEYS */;
INSERT INTO `dichvu` VALUES (11,19,'Thú cưng có trọng lượng < 2kg',200.000,'Kích hoạt'),(12,19,'Thú cưng có trọng lượng < 5kg',350.000,'Kích hoạt'),(13,19,'Thú cưng có trọng lượng 5-7kg',400.000,'Kích hoạt'),(14,19,'Thú cưng có trọng lượng 7-10kg',500.000,'Kích hoạt'),(15,19,'Thú cưng có trọng lượng 10-15kg',600.000,'Kích hoạt'),(16,19,'Thú cưng có trọng lượng 15-20kg',700.000,'Kích hoạt'),(17,20,'Thú cưng có trọng lượng < 2kg',150.000,'Kích hoạt'),(18,20,'Thú cưng có trọng lượng < 5kg',200.000,'Kích hoạt'),(19,20,'Thú cưng có trọng lượng 5-7kg',250.000,'Kích hoạt'),(20,20,'Thú cưng có trọng lượng 7-10kg',300.000,'Kích hoạt'),(21,20,'Thú cưng có trọng lượng 10-15kg',400.000,'Kích hoạt'),(22,20,'Thú cưng có trọng lượng 15-20kg',500.000,'Kích hoạt'),(23,21,'Cắt móng, mài móng',50.000,'Kích hoạt'),(24,21,'Vệ sinh tai + nhổ lông tai',50.000,'Kích hoạt'),(25,21,'Nhuộm 2 tai (1 màu)',200.000,'Kích hoạt'),(26,21,'Nhuộm 2 tai (2 màu)',250.000,'Kích hoạt'),(27,21,'Nhuộm 1 tai (1-2 màu)',150.000,'Kích hoạt'),(28,21,'Nhuộm 4 chân (1 màu)',250.000,'Kích hoạt'),(29,21,'Nhuộm 4 chân (2 màu)',300.000,'Kích hoạt'),(30,21,'Nhuộm 2 chân (1-2 màu)',250.000,'Kích hoạt'),(31,22,'Thú cưng có trọng lượng < 2kg',300.000,'Kích hoạt'),(32,22,'Thú cưng có trọng lượng < 5kg',350.000,'Kích hoạt'),(33,22,'Thú cưng có trọng lượng 5-7kg',450.000,'Kích hoạt'),(34,22,'Thú cưng có trọng lượng 7-10kg',550.000,'Kích hoạt'),(35,22,'Thú cưng có trọng lượng 10-15kg',700.000,'Kích hoạt'),(36,22,'Thú cưng có trọng lượng 15-20kg',800.000,'Kích hoạt'),(37,23,'Cắt móng-Nhuộm 2 tai',300.000,'Kích hoạt'),(38,23,'Cắt móng-Nhuộm 2 chân',300.000,'Kích hoạt'),(39,23,'Cắt móng-Nhuộm 4 chân',350.000,'Kích hoạt'),(40,23,'Cắt tỉa-Tắm spa  < 10kg',600.000,'Kích hoạt'),(41,23,'Cắt tỉa-Tắm spa  < 20kg',800.000,'Kích hoạt');
/*!40000 ALTER TABLE `dichvu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dmchinh`
--

DROP TABLE IF EXISTS `dmchinh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dmchinh` (
  `madmchinh` varchar(100) NOT NULL,
  `tendmchinh` varchar(50) NOT NULL,
  `motadmchinh` varchar(255) DEFAULT NULL,
  `madm` varchar(100) NOT NULL,
  PRIMARY KEY (`madmchinh`),
  KEY `madm` (`madm`),
  CONSTRAINT `lien_ket_01` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dmchinh`
--

LOCK TABLES `dmchinh` WRITE;
/*!40000 ALTER TABLE `dmchinh` DISABLE KEYS */;
INSERT INTO `dmchinh` VALUES ('DMC01','Thức ăn, dinh dưỡng ','','DM01'),('DMC02','Vệ sinh, chăm sóc','','DM01'),('DMC03','Đồ dùng, phụ kiện','','DM01'),('DMC04  ','Nhà, chuồng, niệm  ','','DM01'),('DMC05','Thức ăn cho mèo','','DM02'),('DMC06','Vệ sinh, chăm sóc mèo','','DM02'),('DMC07','Đồ dùng, phụ kiện mèo','','DM02'),('DMC08','Nhà, chuồng, niệm cho mèo','','DM02'),('DMC09','Máy ăn uống tự động','','DM03'),('DMC10','Nhà vệ sinh tự động','','DM03'),('DMC11','Đồ chơi tương tác','','DM03');
/*!40000 ALTER TABLE `dmchinh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dmphu`
--

DROP TABLE IF EXISTS `dmphu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dmphu` (
  `madmphu` varchar(100) NOT NULL,
  `tendmphu` varchar(50) NOT NULL,
  `motadmphu` varchar(255) DEFAULT NULL,
  `madmchinh` varchar(100) NOT NULL,
  PRIMARY KEY (`madmphu`),
  KEY `madmchinh` (`madmchinh`),
  CONSTRAINT `fk_dmphu` FOREIGN KEY (`madmchinh`) REFERENCES `dmchinh` (`madmchinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dmphu`
--

LOCK TABLES `dmphu` WRITE;
/*!40000 ALTER TABLE `dmphu` DISABLE KEYS */;
INSERT INTO `dmphu` VALUES ('MDP01','Thức ăn hạt khô ','','DMC01'),('MDP02','Pate &amp; nước sốt','','DMC01'),('MDP03','Súp thưởng ăn liền','','DMC01'),('MDP04','Xương gặm &amp; bánh thưởng','','DMC01'),('MDP05','Vitamin &amp; dinh dưỡng','','DMC01'),('MDP06','Bát ăn &amp; bình uống nước','','DMC01'),('MDP07','Tả bỉm &amp; tấm lót vệ sinh','','DMC02'),('MDP08','Khay hướng dẫn vệ sinh','','DMC02'),('MDP09','Sữa tắm &amp; xịt dưỡng','','DMC02'),('MDP10','Lược chải lông','','DMC02'),('MDP11','Kiềm cắt móng','','DMC02'),('MDP12','Tông đơ &amp; máy mài móng','','DMC02'),('MDP13','Máy sấy lông','','DMC02'),('MDP14','Quần áo &amp; mũ nón','','DMC03'),('MDP15','Vòng cổ &amp; dây thắt','','DMC03'),('MDP16','Rọ mõm','','DMC03'),('MDP17','Đồ chơi &amp; huấn luyện','','DMC03'),('MDP18','Địu chó','','DMC03'),('MDP19','Túi xách chó','','DMC03'),('MDP20','Balo đựng chó','','DMC03'),('MDP21','Lồng vận chuyển','','DMC03'),('MDP22','Nhà nhựa','','DMC04  '),('MDP23','Chuồng sắt &amp; gỗ','','DMC04  '),('MDP24','Quây chặn &amp; hàng rào','','DMC04  '),('MDP25','Ổ niệm &amp; thảm niệm','','DMC04  '),('MDP26','Thức ăn hạt khô - mèo','','DMC05'),('MDP27','Pate &amp; nước sốt - mèo','','DMC05'),('MDP28','Súp thưởng ăn liền - mèo','','DMC05'),('MDP29','Snack &amp; bánh thưởng','','DMC05'),('MDP30','Vitamin &amp; dinh dưỡng - mèo','','DMC05'),('MDP31','Cỏ mèo &amp; catnip','','DMC05'),('MDP32','Bát ăn &amp; bình uống nước - mèo','','DMC05'),('MDP33','Khay &amp; nhà vệ sinh - mèo','','DMC06'),('MDP34','Cát vệ sinh cho mèo','','DMC06'),('MDP35','Sữa tắm &amp; xịt dưỡng - mèo','','DMC06'),('MDP36','Lược chải lông - mèo','','DMC06'),('MDP37','Kiềm cắt móng - mèo','','DMC06'),('MDP38','Quần áo &amp; trang sức - mèo','','DMC07'),('MDP39','Vòng cổ &amp; dây thắt - mèo','','DMC07'),('MDP40','Túi xách mèo','','DMC07'),('MDP41','Balo đựng mèo','','DMC07'),('MDP42','Lồng vận chuyển mèo','','DMC07'),('MDP43','Nhà cho mèo &amp; nhà cây cattree','','DMC08'),('MDP44','Trụ cột &amp; bàn cào móng','','DMC08'),('MDP45','Chuồng mèo 1,2,3 tầng','','DMC08'),('MDP46','Ổ niệm &amp; thảm niệm - mèo','','DMC08'),('MDP47','Xúc xích thịt hộp - mèo','','DMC05'),('MDP48','Xúc xích thịt hộp - chó','','DMC01'),('MDP49','Máy ăn uống tự động chó mèo','','DMC09'),('MDP50','Nhà vệ sinh tự động chó mèo','','DMC10'),('MDP51','Đồ chơi tương tác chó mèo','','DMC11');
/*!40000 ALTER TABLE `dmphu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_dichvu`
--

DROP TABLE IF EXISTS `don_dichvu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `don_dichvu` (
  `maddv` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(255) NOT NULL,
  `tongdon` decimal(10,3) NOT NULL,
  `ngaytao` datetime NOT NULL,
  PRIMARY KEY (`maddv`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_dichvu`
--

LOCK TABLES `don_dichvu` WRITE;
/*!40000 ALTER TABLE `don_dichvu` DISABLE KEYS */;
INSERT INTO `don_dichvu` VALUES (1,'tgjh',355.000,'2023-12-26 09:52:39'),(2,'',0.000,'0000-00-00 00:00:00'),(3,'',0.000,'0000-00-00 00:00:00'),(4,'',0.000,'0000-00-00 00:00:00'),(5,'',0.000,'0000-00-00 00:00:00'),(7,'',0.000,'2024-01-02 04:20:37'),(8,'',0.000,'0000-00-00 00:00:00'),(9,'',0.000,'2024-01-02 04:31:03'),(10,'',0.000,'2024-01-02 04:31:09'),(12,'',0.000,'0000-00-00 00:00:00'),(13,'',0.000,'0000-00-00 00:00:00'),(14,'',0.000,'2024-01-02 05:00:48');
/*!40000 ALTER TABLE `don_dichvu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_dv_spa`
--

DROP TABLE IF EXISTS `don_dv_spa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `don_dv_spa` (
  `madvspa` int(11) NOT NULL AUTO_INCREMENT,
  `maldv` int(11) NOT NULL,
  `madv` int(11) NOT NULL,
  `giadv` decimal(10,3) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `sdt` int(11) DEFAULT NULL,
  `thue` decimal(10,3) NOT NULL,
  `tongtien` decimal(10,3) DEFAULT NULL,
  `ngaytao` date NOT NULL,
  `trangthai` varchar(255) NOT NULL DEFAULT 'Đã thanh toán',
  PRIMARY KEY (`madvspa`),
  KEY `maldv` (`maldv`),
  KEY `madv` (`madv`),
  CONSTRAINT `don_dv_spa_ibfk_1` FOREIGN KEY (`maldv`) REFERENCES `loaidichvu` (`maldv`),
  CONSTRAINT `don_dv_spa_ibfk_2` FOREIGN KEY (`madv`) REFERENCES `dichvu` (`madv`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_dv_spa`
--

LOCK TABLES `don_dv_spa` WRITE;
/*!40000 ALTER TABLE `don_dv_spa` DISABLE KEYS */;
INSERT INTO `don_dv_spa` VALUES (8,20,18,200.000,'Tú Quyên',987457151,16.000,216.000,'2024-01-03','Đã thanh toán'),(9,21,25,200.000,'Khanh Ngan',993854960,16.000,216.000,'2024-01-04','Đã thanh toán'),(10,23,40,600.000,'Phương Nga',836485697,48.000,648.000,'2024-01-04','Đã thanh toán'),(11,20,22,500.000,'Tú Phụng',839548538,40.000,540.000,'2024-01-04','Đã thanh toán'),(13,22,35,700.000,'Tú Quyên',987457151,56.000,756.000,'2024-01-01','Đã thanh toán'),(14,22,33,450.000,'Phương Nga',74857689,36.000,486.000,'2024-01-04','Đã thanh toán'),(15,21,30,250.000,'Khánh Ngân',993854960,20.000,270.000,'2024-01-04','Đã thanh toán'),(16,20,22,500.000,'Công Chính',993854960,40.000,540.000,'2024-01-04','Đã thanh toán'),(17,23,39,350.000,'Tú Phụng',836549647,28.000,378.000,'2024-01-04','Đã thanh toán');
/*!40000 ALTER TABLE `don_dv_spa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `tonggia_nhap` decimal(10,3) NOT NULL,
  `tonggia` decimal(10,3) DEFAULT NULL,
  `phigiaohang` decimal(10,3) DEFAULT NULL,
  `thue` decimal(10,3) NOT NULL,
  `thanhtien` decimal(10,3) NOT NULL,
  `trangthai` varchar(25) NOT NULL DEFAULT 'Đang duyệt',
  `hinhthuc` varchar(255) NOT NULL,
  PRIMARY KEY (`madh`),
  KEY `makh` (`makh`),
  CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` VALUES (86,4,'2023-12-31 06:18:39',300.000,400.000,35.000,32.000,467.000,'Đã hủy đơn','Tiền mặt'),(89,4,'2023-12-31 07:03:20',280.000,360.000,35.000,28.800,423.800,'Đã thanh toán','Chuyển khoản'),(90,4,'2023-12-31 08:10:01',1050.000,1410.000,0.000,112.800,1522.800,'Đã duyệt','Tiền mặt'),(91,4,'2023-12-31 12:36:28',340.000,430.000,35.000,34.400,499.400,'Đã hủy đơn','Tiền mặt'),(92,4,'2023-12-31 13:00:23',105.000,165.000,35.000,13.200,213.200,'Đã hủy đơn','Tiền mặt'),(93,4,'2024-01-03 03:08:42',300.000,400.000,35.000,32.000,467.000,'Đã duyệt','Tiền mặt'),(94,4,'2024-01-03 03:16:37',280.000,360.000,35.000,28.800,423.800,'Đã thanh toán','Chuyển khoản'),(95,4,'2024-01-03 06:34:11',170.000,215.000,35.000,17.200,267.200,'Đã thanh toán','Chuyển khoản'),(96,4,'2024-01-03 06:35:32',300.000,400.000,35.000,32.000,467.000,'Đã hủy đơn','Tiền mặt'),(97,4,'2024-01-03 12:08:27',250.000,315.000,35.000,25.200,375.200,'Đã thanh toán','Chuyển khoản'),(98,4,'2024-01-04 02:22:36',105.000,165.000,35.000,13.200,213.200,'Đã duyệt','Tiền mặt'),(99,4,'2024-01-04 02:33:19',750.000,945.000,0.000,75.600,1020.600,'Đã thanh toán','Chuyển khoản'),(100,4,'2024-01-04 15:22:53',330.000,450.000,35.000,36.000,521.000,'Đã duyệt','Tiền mặt'),(101,4,'2023-12-27 17:21:00',350.000,1070.000,0.000,85.600,1155.600,'Đã duyệt','Tiền mặt'),(102,4,'2024-01-04 17:26:21',1260.000,2140.000,0.000,171.200,2311.200,'Đã duyệt','Tiền mặt'),(103,4,'2024-01-29 17:27:18',2070.000,2720.000,0.000,217.600,2937.600,'Đã duyệt','Tiền mặt'),(104,4,'2023-12-28 17:33:00',3200.000,5205.000,0.000,416.400,5621.400,'Đã duyệt','Tiền mặt'),(105,4,'2024-01-05 06:48:07',1200.000,1600.000,0.000,128.000,1728.000,'Đã duyệt','Tiền mặt'),(106,4,'2024-01-05 07:54:30',1500.000,1890.000,0.000,151.200,2041.200,'Đang duyệt','Tiền mặt'),(107,4,'2024-01-09 14:13:01',822.000,1045.000,0.000,83.600,1128.600,'Đang duyệt','Tiền mặt'),(108,4,'2024-01-12 15:08:42',3410.000,6000.000,0.000,480.000,6480.000,'Đã thanh toán','Chuyển khoản'),(109,4,'2024-01-12 15:19:33',1320.000,2100.000,0.000,168.000,2268.000,'Đang duyệt','Tiền mặt'),(110,4,'2024-01-12 15:49:23',680.000,860.000,0.000,68.800,928.800,'Đang duyệt','Tiền mặt'),(111,4,'2024-01-12 15:50:56',170.000,215.000,35.000,17.200,267.200,'Đang duyệt','Tiền mặt'),(112,4,'2024-01-12 15:57:56',340.000,430.000,35.000,34.400,499.400,'Đang duyệt','Tiền mặt'),(113,4,'2024-01-12 15:58:40',500.000,630.000,0.000,50.400,680.400,'Đã thanh toán','Chuyển khoản');
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gio1`
--

DROP TABLE IF EXISTS `gio1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gio1` (
  `magio` int(11) NOT NULL AUTO_INCREMENT,
  `mangay` int(11) NOT NULL,
  `gio` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  PRIMARY KEY (`magio`),
  KEY `mangay` (`mangay`),
  CONSTRAINT `gio1_ibfk_1` FOREIGN KEY (`mangay`) REFERENCES `ngay1` (`mangay`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gio1`
--

LOCK TABLES `gio1` WRITE;
/*!40000 ALTER TABLE `gio1` DISABLE KEYS */;
/*!40000 ALTER TABLE `gio1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giohang` (
  `magh` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giaban` decimal(10,3) NOT NULL,
  `soluong` int(2) NOT NULL,
  `tonggia_sp` decimal(10,3) NOT NULL,
  PRIMARY KEY (`magh`),
  KEY `makh` (`makh`),
  KEY `masp` (`masp`),
  CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (198,4,'SP002','Thức ăn cho chó con cỡ nhỏ ROYAL CANIN Mini Puppy                ',215.000,1,215.000),(199,4,'SP005','Pate cho chó nước sốt vị thịt gà PEDIGREE Pouch Chicken   ',25.000,2,50.000),(200,4,'SP006','Xương cho chó gặm vị thịt bò VEGEBRAND 7 Dental Effects Beef Flavor       ',150.000,2,300.000);
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(25) NOT NULL,
  `reset_mk` varchar(255) DEFAULT NULL,
  `time_reset` datetime DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `image_kh` varchar(100) DEFAULT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`makh`),
  KEY `reset_mk` (`reset_mk`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (4,'Tú Quyên','httuquyen01@gmail.com','Tq12345@','','2024-01-02 09:20:53','987457151','Đ Nguyễn Biểu, Phường 1, Quận 5, Tp.Hồ Chí Minh',NULL,'2023-11-21 15:11:24'),(5,'Khanh Ngan','khngan223@gmail.com','123',NULL,NULL,'993854960','quan 5',NULL,'2023-11-22 15:50:26'),(20,'Chính ','congchinh0e@gmail.com','01663420113p',NULL,NULL,'0','ádasdsadasdsds',NULL,'2023-11-23 03:40:53'),(39,'Khánh Ngân','httuquyen01@gmail.com','12',NULL,NULL,NULL,NULL,NULL,'2024-01-03 16:16:24');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khung_gio`
--

DROP TABLE IF EXISTS `khung_gio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khung_gio` (
  `makg` int(11) NOT NULL AUTO_INCREMENT,
  `gio` varchar(255) NOT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`makg`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khung_gio`
--

LOCK TABLES `khung_gio` WRITE;
/*!40000 ALTER TABLE `khung_gio` DISABLE KEYS */;
INSERT INTO `khung_gio` VALUES (1,'9:00',''),(2,'10:00',NULL),(3,'11:00',NULL),(4,'13:30',NULL),(5,'14:30',NULL),(6,'15:30 ',NULL),(7,'16:00 ',NULL),(8,'16:30',NULL);
/*!40000 ALTER TABLE `khung_gio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaidichvu`
--

DROP TABLE IF EXISTS `loaidichvu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loaidichvu` (
  `maldv` int(11) NOT NULL AUTO_INCREMENT,
  `tenloaidv` varchar(255) NOT NULL,
  `trangthai` varchar(55) NOT NULL DEFAULT 'Kích hoạt',
  PRIMARY KEY (`maldv`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaidichvu`
--

LOCK TABLES `loaidichvu` WRITE;
/*!40000 ALTER TABLE `loaidichvu` DISABLE KEYS */;
INSERT INTO `loaidichvu` VALUES (19,'Cạo lông - Cắt tỉa','Kích hoạt'),(20,'Vệ sinh thú cưng','Kích hoạt'),(21,'Dịch vụ lẻ','Kích hoạt'),(22,'Trọn gói dịch vụ','Kích hoạt'),(23,'Gói combo ','Kích hoạt');
/*!40000 ALTER TABLE `loaidichvu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motasp`
--

DROP TABLE IF EXISTS `motasp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motasp` (
  `masp` varchar(100) NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `loiich` varchar(2000) DEFAULT NULL,
  `huongdan` varchar(2000) DEFAULT NULL,
  `luuy` varchar(1000) DEFAULT NULL,
  KEY `mamota` (`masp`),
  CONSTRAINT `motasp_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motasp`
--

LOCK TABLES `motasp` WRITE;
/*!40000 ALTER TABLE `motasp` DISABLE KEYS */;
INSERT INTO `motasp` VALUES ('SP002','Thức ăn cho chó con cỡ nhỏ ROYAL CANIN Mini Puppy dành cho các giống chó con dưới 10 tháng tuổi. Với công thức đặc chế riêng cho nhu cầu dinh dưỡng của chó con thuộc các giống cỡ nhỏ. Thức ăn cho chó con (các giống chó cỡ nhỏ) được nghiên cứu để cung cấp dinh dưỡng theo nhu cầu thực tế của chó con.  Duy trì sức đề kháng cho chó con: chất chống oxy hóa CELT. Hỗ trợ hệ tiêu hóa hoạt động ổn định: L.I.P, đường FOS. Cung cấp dinh dưỡng toàn diện cho chó: chế biến theo công thức cung cấp năng lượng cao.','ROYAL CANIN Mini Puppy có dạng viên hình tam giác phù hợp với cấu tạo răng của chó, giảm nguy cơ hình thành mảng bám răng ở chó. Kích thước hạt phù hợp cỡ răng, thông qua việc cọ xát vào răng giúp bảo vệ răng miệng cho chó.  Duy trì hệ tiêu hóa khỏe mạnh. Men tiêu hóa L.I.P hỗ trợ hấp thu chất dinh dưỡng cho chó, cân bằng hệ vi sinh đường ruột, giảm bớt lượng phân và mùi nhẹ hơn. Đường tự nhiên FOS: cân bằng hệ vi sinh đường ruột. Gia tăng số lượng lợi khuẩn, bảo vệ đường ruột khỏi vi khuẩn có hại.','Thức ăn hạt cho chó con cỡ nhỏ ROYAL CANIN Mini Puppy tạo thói quen ăn uống cho chó. Dựa theo tuổi của chó, cần cho ăn một ngày 3 lần vào các giờ cố định. Cho ăn tại một chỗ để tạo thói quen tốt cho chó. Nên cho chó ăn thức ăn chế biến riêng, không cho ăn thức ăn thừa của người. Vì thức ăn của người có nhiều thành phần khiến chó bị rối loạn tiêu hóa, dễ bị bệnh béo phì. Bảo đảm cung cấp đủ nước uống cho chó. Nếu thấy nước bị chó làm bẩn, cần thay nước mới ngay lập tức.  Khi muốn đổi thức ăn mới cho chó, có thể trộn lẫn thức ăn cũ và mới khi cho ăn. Tăng dần tỉ lệ trong vòng 7 ngày. Đột ngột thay đổi loại thức ăn mới có thể gây mất cân bằng hệ tiêu hóa. Chó dễ bị khó tiêu và đi ngoài.','Chó con mới mọc răng cần cho ăn thức ăn mềm, vì vậy trước khi cho ăn cần ngâm trong nước ấm 40°C-60°C. Sau 15′ thức ăn mềm là có thể cho ăn.  Chó con còn nhỏ không tiêu hóa được quá nhiều thức ăn. Chó con mới cai sữa ngày cho ăn 4 lần, dưới 4 tháng tuổi ngày cho ăn 3 lần. Tham khảo khuyến cáo trên bao bì sản phẩm để giúp chó con duy trì trạng thái tốt nhất. Hạn sử dụng 18 tháng kể từ ngày sản xuất.'),('SP001','Thức ăn cho chó con cỡ lớn ROYAL CANIN Maxi Puppy dưới 15 tháng tuổi. Thường được dùng cho các giống chó có kích thước lớn như: Alaskan Malamute, Husky, Samoyed, Becgie GSD, Golden Retriever, Labrado, Akita, Beauceron, Rottweiler…  Với công thức đặc chế riêng cho nhu cầu dinh dưỡng của chó con. Duy trì sức đề kháng cho chó: chất chống oxy hóa CELT. Hỗ trợ hệ tiêu hóa hoạt động ổn định: L.I.P, chất xơ hòa tan FOS. Cung cấp năng lượng để chó phát triển khỏe mạnh.  ','Thức ăn cho chó con cỡ lớn ROYAL CANIN Maxi Puppy là dạng viên phù hợp với cấu tạo răng của chó, giảm nguy cơ hình thành mảng bám răng ở chó. Kích thước hạt phù hợp cỡ răng, thông qua việc cọ xát vào răng giúp bảo vệ răng miệng cho chó. Hình dạng thức ăn kích thích chó nhai kĩ hơn, làm chậm quá trình ăn, giúp chó dễ tiêu hóa hơn. Duy trì hệ tiêu hóa khỏe mạnh.  Men tiêu hóa L.I.P hỗ trợ hấp thu chất dinh dưỡng cho chó, cân bằng hệ vi sinh đường ruột, giảm bớt lượng phân và mùi nhẹ hơn. Đường tự nhiên FOS: cân bằng hệ vi sinh đường ruột. Gia tăng số lượng lợi khuẩn, bảo vệ đường ruột khỏi vi khuẩn có hại.  ','Thức ăn hạt cho chó con cỡ lớn ROYAL CANIN Maxi Puppy tạo thói quen ăn uống cho chó. Dựa theo tuổi của chó, cần cho ăn một ngày 3 lần vào các giờ cố định. Cho ăn tại một chỗ để tạo thói quen tốt cho chó. Nên cho chó ăn thức ăn chế biến riêng, không cho ăn thức ăn thừa của người. Vì thức ăn của người có nhiều thành phần khiến chó bị rối loạn tiêu hóa, dễ bị bệnh béo phì. Bảo đảm cung cấp đủ nước uống cho chó. Nếu thấy nước bị chó làm bẩn, cần thay nước mới ngay lập tức.  Khi muốn đổi thức ăn mới cho chó, có thể trộn lẫn thức ăn cũ và mới khi cho ăn. Tăng dần tỉ lệ trong vòng 7 ngày. Đột ngột thay đổi loại thức ăn mới có thể gây mất cân bằng hệ tiêu hóa. Chó dễ bị khó tiêu và đi ngoài.  Chó con mới mọc răng cần cho ăn thức ăn mềm, vì vậy trước khi cho ăn cần ngâm trong nước ấm 40°C-60°C. Sau 15′ thức ăn mềm là có thể cho ăn. Chó con còn nhỏ không tiêu hóa được quá nhiều thức ăn. Chó con mới cai sữa ngày cho ăn 4 lần, dưới 6 tháng tuổi ngày cho ăn 3 lần. Tham khảo khuyến cáo trên bao bì sản phẩm để giúp chó con duy trì trạng thái tốt nhất. Hạn sử dụng 18 tháng kể từ ngày sản xuất. ','  -----');
/*!40000 ALTER TABLE `motasp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `manews` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `ngaydang` date NOT NULL,
  `loai` varchar(100) DEFAULT NULL,
  `tieude` text NOT NULL,
  `image_news` varchar(255) DEFAULT NULL,
  `tomtat` text NOT NULL,
  `noidung` text DEFAULT NULL,
  PRIMARY KEY (`manews`),
  KEY `id` (`id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (18,12,'2023-12-12','Chó cảnh','5 điều cần biết về lịch tẩy giun cho chó đúng cách','3.jpg','Tẩy giun không chỉ là một bước quan trọng trong việc bảo vệ sức khỏe của chó, mà còn phản ánh trách nhiệm của chủ nuôi. Bạn có biết rằng giun sán không chỉ ảnh hưởng đến chó mà còn có thể gây hại cho con người? Vậy làm sao để chọn thuốc tẩy giun an toàn và hiệu quả?','<h2><strong>Các loại giun thường ký sinh ở chó</strong></h2><p>Chó con, chó sơ sinh và chó trưởng thành, đều có thể bị nhiễm nhiều loại giun ký sinh. Dưới đây là một số loại giun thường gặp ở chó:</p><ol><li><a href=\"https://g.co/kgs/xCS8U1\"><strong>Giun đũa </strong></a><strong>:</strong> Còn gọi là sái dãi chó, giun tròn thường ký sinh ở ruột non của chó. Chó con thường bị nhiễm từ sữa mẹ. <a href=\"https://www.petmart.vn/cach-dieu-tri-cho-bi-giun-dua-tranh-lay-sang-nguoi\">Giun đũa chó mèo </a>trưởng thành có dạng dài và mảnh, thường màu trắng hoặc hơi vàng. Có thể gây ra vấn đề tiêu hóa ở chó và nguy hiểm cho con người.</li><li><a href=\"https://g.co/kgs/dJ97zA\"><strong>Giun móc </strong></a><strong>:</strong> Thường ký sinh ở ruột non. Gây ra triệu chứng như <a href=\"https://www.petmart.vn/dau-hieu-danh-gia-muc-do-cho-bi-tieu-chay-nang-nhe\">Chó bị tiêu chảy </a>, sự mất máu và mệt mỏi. Chó con có thể bị nhiễm khi tiếp xúc với môi trường bị nhiễm.</li><li><a href=\"https://g.co/kgs/ExMyzu\"><strong>Giun tim </strong></a><strong>:</strong> Ký sinh trong tim và động mạch lớn. Được truyền từ muỗi đến chó. Gây ra bệnh giun tim ở chó, có thể dẫn đến tử vong nếu không được điều trị.</li><li><a href=\"https://g.co/kgs/yRUWRH\"><strong>Giun tóc </strong></a><strong>:</strong> Ký sinh ở ruột già. Gây ra triệu chứng như tiêu chảy, đặc biệt là tiêu chảy có máu.</li><li><a href=\"https://g.co/kgs/tdGPpm\"><strong>Giun lươn </strong></a><strong>:</strong> Thường ký sinh ở ruột non. Gây ra triệu chứng tiêu hóa và sự mất nước.</li><li><a href=\"https://g.co/kgs/S6sLVE\"><strong>Giun dẹp </strong></a>: Bao gồm giun lươn và giun đốt. Ký sinh trong ruột chó và cần một loài trung gian như ve hoặc dế để phát triển.</li><li><a href=\"https://g.co/kgs/rkN3JP\"><strong>Giun sán dây </strong></a><strong>:</strong> Là một dạng giun đốt nhỏ. Đặc biệt nguy hiểm cho con người, có thể gây ra bệnh ở gan, phổi và các cơ quan khác.</li></ol><h2><strong>Độ tuổi sử dụng thuốc và lịch tẩy giun cho chó</strong></h2><p>Giun ký sinh trên chó là một vấn đề sức khỏe quan trọng và cần được giải quyết kịp thời. Để đảm bảo sức khỏe tốt nhất cho thú cưng của bạn, việc hiểu rõ lịch tẩy giun cho chó con và chó trưởng thành là điều không thể thiếu.</p><ul><li><strong>Tầm quan trọng của việc tẩy giun cho chó:</strong> Vì sao tẩy giun là quan trọng? Giun là loài ký sinh trùng có khả năng gây hại cho sức khỏe của chó. Chúng có thể sinh sôi nảy nở và lây lan nhanh chóng, ảnh hưởng tới chức năng tiêu hóa và sức đề kháng của chó.</li><li><strong>Thời điểm tẩy giun:</strong> Lúc cún con đạt độ tuổi 2-3 tuần, đây là thời điểm tốt nhất để bắt đầu quá trình xổ giun, ngăn chặn sự lây lan của trứng giun.</li><li><strong>Lưu ý khi tẩy giun:</strong> Thử nghiệm trước khi tẩy giun cho cả đàn, hãy thử nghiệm với một chú cún để đảm bảo không có phản ứng không mong muốn. Kết hợp đồng thời với lịch tiêm phòng, bạn cần lưu ý lịch tiêm phòng để đảm bảo việc tẩy giun và tiêm phòng cho chó không xảy ra cùng một lúc.</li></ul><h3><strong>Lịch tẩy giun cho chó con</strong></h3><p><strong>Nên tẩy giun cho chó con ở tuần thứ 3-4:</strong> Khi chú chó con bắt đầu tiếp xúc nhiều hơn với môi trường xung quanh và sữa mẹ giảm dần, đây là thời điểm quan trọng để tẩy giun lần đầu. <strong>Lịch các bác sĩ </strong><a href=\"https://www.petmart.vn/hoi-dap-thu-y-mien-phi\"><strong>thú y</strong></a><strong> đề xuất:</strong> Tẩy giun cho chó con theo lịch cụ thể ở tuần thứ 2, 4, 6, 8 và 12.</p><h3><strong>Lịch tẩy giun cho chó trưởng thành</strong></h3><p><strong>Bao lâu tẩy giun cho chó 1 lần?</strong> Sau 1 năm tuổi: Khi chó đã trưởng thành và có hệ thống miễn dịch ổn định, bạn chỉ cần tẩy giun một lần mỗi năm. Việc tẩy giun đúng cách và đúng thời điểm giúp chó của bạn phát triển mạnh mẽ và khỏe mạnh. Đừng quên tham khảo ý kiến của bác sĩ thú y để có lịch tẩy giun phù hợp nhất cho thú cưng của bạn.</p><h2><strong>Phương pháp và quy trình tẩy giun cho chó</strong></h2><p>Tẩy giun cho chó đúng cách không chỉ giúp bảo vệ sức khỏe của chúng mà còn giảm thiểu nguy cơ giun sán lây lan trong môi trường sống của bạn. Giống như con người, chó cũng phải đối mặt với nguy cơ bị giun sán xâm nhập và gây ra nhiều biến chứng. Hãy luôn tuân theo lời khuyên từ chuyên gia và sử dụng thuốc một cách cẩn trọng.</p><h3><strong>Tại sao chó không thích uống thuốc?</strong></h3><p>Một số bạn chó có thể cảm nhận mùi và vị của thuốc, dẫn đến việc kháng cự mạnh mẽ. Đặc biệt, một số thuốc có vị đắng hoặc không dễ chịu. Việc trộn thuốc với thức ăn có thể giúp, nhưng nhớ rằng một số chó thông minh có thể phát hiện và tránh thuốc. Cả chó và mèo thường không thích uống thuốc vì một số lý do sau:</p><ul><li><strong>Mùi vị</strong>: Nhiều loại thuốc có mùi và vị đặc trưng mà chó và mèo không thích. Động vật này có khả năng phát hiện mùi rất nhạy, và họ có thể nhận biết mùi thuốc từ xa.</li><li><strong>Kết cấu</strong>: Thuốc dạng viên hoặc viên nén có thể khó nuốt cho một số chó và mèo, đặc biệt là khi chúng không được chế biến thành hình dạng mềm hoặc gel.</li><li><strong>Phản xạ nôn</strong>: Một số thuốc khi được đặt sâu trong cổ họng có thể kích thích phản xạ nôn, khiến cho chó hoặc mèo muốn ợ ra.</li><li><strong>Không quen</strong>: Chó và mèo thích thói quen và có thể phản ứng lại những thay đổi trong thực đơn hoặc cách thức cho ăn. Thuốc là một thứ “mới mẻ” mà chúng không quen và có thể bị nghi ngờ.</li><li><strong>Bị ép buộc</strong>: Nếu chó hoặc mèo đã từng trải qua trạng thái không thoải mái sau khi uống thuốc trước đây (ví dụ: nôn mửa, tiêu chảy), chúng có thể liên kết việc uống thuốc với những trải nghiệm tiêu cực đó. Nếu chủ nhân sử dụng lực để mở miệng chó hoặc mèo và ép chúng uống thuốc, chúng có thể trở nên cảnh giác và kháng cự trong những lần tiếp theo.</li></ul><h3><strong>Cách xổ giun cho chó hiệu quả</strong></h3><p>Để giúp chó và mèo dễ dàng hơn trong việc uống thuốc, có một số cách làm như:</p><ul><li><strong>Cho uống trực tiếp:</strong> Đặt thuốc trực tiếp vào miệng chó và giữ miệng của chúng lại. Sau đó, vuốt nhẹ cổ chó cho đến khi nó nuốt thuốc.</li><li><strong>Trộn với thức ăn:</strong> Nghiền thuốc và trộn chung với thức ăn yêu thích của chó. Đảm bảo rằng chó ăn hết phần thức ăn có chứa thuốc&nbsp;(ví dụ: bánh quy dành cho chó/mèo có khe cắm thuốc).</li><li><strong>Ngoài ra:</strong> có thể sử dụng dạng thuốc gel hoặc lỏng nếu có sẵn. Hoặc sử dụng các dụng cụ đặc biệt giúp cho việc cho chó và mèo uống thuốc dễ dàng hơn. Tham khảo bác sĩ thú y về việc sử dụng các sản phẩm giúp làm giảm mùi và vị của thuốc.</li></ul><h3><strong>Liều lượng dùng thuốc tẩy giun cho chó?</strong></h3><p>Liều lượng thuốc tẩy giun cho chó phụ thuộc vào nhiều yếu tố, bao gồm loại thuốc, trọng lượng của chó, và tình trạng sức khỏe của chó. Dưới đây là một số hướng dẫn chung, nhưng quan trọng nhất, bạn luôn nên tham khảo ý kiến của bác sĩ thú y và tuân theo hướng dẫn trên nhãn thuốc:</p><ul><li><strong>Trọng lượng cân nặng</strong>: Nhiều thuốc tẩy giun đều dựa vào trọng lượng của chó để xác định liều lượng. Ví dụ, một chó nhỏ sẽ cần một liều lượng khác so với một chó lớn.</li><li><strong>Loại giun</strong>: Không phải tất cả các loại thuốc tẩy giun đều hoạt động chống lại tất cả các loại giun. Một số thuốc chỉ hoạt động chống lại một số loại giun cụ thể, trong khi những loại khác có phổ tác động rộng hơn. Bạn cần xác định chính xác chó của mình bị nhiễm loại giun nào để chọn thuốc phù hợp.</li><li><strong>Kiểu thuốc</strong>: Thuốc tẩy giun có thể dạng viên, dạng lỏng, hoặc dạng gel. Liều lượng và cách dùng sẽ khác nhau dựa trên hình thức thuốc.</li><li><strong>Tần suất</strong>: Một số thuốc tẩy giun chỉ cần dùng một lần, trong khi những loại khác cần được dùng trong một số ngày liên tiếp.</li><li><strong>Tuổi của chó</strong>: Liều lượng và tần suất xổ giun có thể khác nhau giữa chó con và chó trưởng thành. Một số thuốc không phù hợp cho chó con hoặc chó mang thai.</li></ul><p>Để biết liều lượng cụ thể và hướng dẫn sử dụng thuốc tẩy giun cho chó. Hãy luôn quan sát chó sau khi cho uống thuốc tẩy giun để phát hiện bất kỳ dấu hiệu tác dụng phụ nào và liên hệ ngay với bác sĩ thú y nếu có vấn đề.</p><h3><strong>Tẩy giun cho chó trước hay sau khi tiêm phòng?</strong></h3><p>Tẩy giun cho chó trước khi tiêm phòng là một biện pháp được nhiều bác sĩ thú y khuyến nghị. Nên tẩy giun cho chó từ 1-2 tuần trước khi tiêm phòng. Tuy nhiên, bạn nên tham khảo ý kiến của bác sĩ thú y riêng của mình để đưa ra quyết định phù hợp nhất cho chó của mình. Lý do là:</p><ul><li><strong>Sức kháng cơ thể tốt hơn:</strong> Giun sán và các loại ký sinh trùng khác có thể gây suy giảm sức kháng cơ thể của chó, khiến chúng trở nên nhạy cảm hơn với các tác nhân gây bệnh. Khi tẩy giun trước khi tiêm phòng, sức kháng cơ thể của chó sẽ tốt hơn, giúp chúng phản ứng tốt với vaccine.</li><li><strong>Hiệu quả vaccine tốt hơn:</strong> Một hệ tiêu hóa khỏe mạnh và không bị ảnh hưởng bởi giun sán sẽ giúp chó tiếp nhận và phản ứng tốt hơn với vaccine.</li><li><strong>Tránh tác dụng phụ:</strong> Nếu chó bị nhiễm giun và tiêm phòng cùng lúc, chúng có thể phản ứng không mong muốn với vaccine, gây ra các tác dụng phụ.</li><li><strong>Dễ dàng theo dõi sức khỏe: T</strong>ẩy giun trước tiêm phòng giúp bạn dễ dàng theo dõi bất kỳ biến đổi nào về sức khỏe của chó sau khi tiêm, không phải lo lắng liệu các triệu chứng có phải do giun sán hay vaccine gây ra.</li></ul><h3><strong>Tẩy giun cho chó trước hay sau khi ăn?</strong></h3><p>Tẩy giun cho chó nên được thực hiện sau khi chó ăn, và sau bữa ăn khoảng 1-2 tiếng. Dưới đây là những lý do:</p><ul><li><strong>Giảm kích thích dạ dày:</strong> Khi dạ dày chứa một lượng thức ăn, thuốc tẩy giun sẽ không gây kích thích trực tiếp lên niêm mạc dạ dày, giảm nguy cơ gây kích ứng hoặc nôn mửa cho chó.</li><li><strong>Hiệu quả tốt hơn:</strong> Thuốc tẩy giun sẽ hoạt động hiệu quả hơn khi có sự hiện diện của thức ăn, giúp việc diệt giun trở nên hiệu quả hơn.</li><li><strong>Tránh bị nôn thuốc:</strong> Khi chó có thức ăn trong dạ dày, chúng có ít khả năng nôn mửa. Điều này giúp thuốc tẩy giun được giữ lại trong dạ dày và ruột, cho phép nó hoạt động hiệu quả.</li><li><strong>Giảm căng thẳng:</strong> Một số chó có thể cảm thấy lo lắng hoặc không thoải mái khi phải uống thuốc trên dạ dày trống. Việc cho chó ăn trước khi tẩy giun giúp giảm bớt sự không thoải mái này.</li></ul><h3><strong>Sau khi tẩy giun cho chó có được tắm không?</strong></h3><p>Sau khi tẩy giun cho chó, nên tránh việc tắm chó ngay lập tức. Tuy nhiên, nếu có lý do cụ thể mà bạn cảm thấy cần tắm chó sau khi tẩy giun (ví dụ: chó bị dơ bẩn hoặc có mùi), hãy tham khảo ý kiến của bác sĩ thú y trước khi quyết định.</p><ul><li><strong>Tránh làm phiền chó:</strong> Uống thuốc tẩy giun có thể khiến chó cảm thấy không thoải mái hoặc mệt mỏi. Việc tắm chó ngay sau khi tẩy giun có thể làm chúng cảm thấy thêm phiền lòng.</li><li><strong>Quan sát tác dụng phụ:</strong> Sau khi tẩy giun, bạn nên giữ chó trong một môi trường yên tĩnh và quan sát chúng trong vài giờ đầu tiên để phát hiện bất kỳ dấu hiệu tác dụng phụ nào, như nôn mửa hoặc tiêu chảy. Tắm chó ngay lập tức có thể làm mất đi cơ hội quan sát này và gây ra nhiều rủi ro.</li><li><strong>Khuyến nghị thời gian chờ đợi:</strong> Nên đợi ít nhất 24-48 giờ sau khi tẩy giun trước khi tắm chó. Điều này giúp đảm bảo rằng thuốc đã có thời gian hoạt động hiệu quả và chó đã phục hồi hoàn toàn sau quá trình tẩy giun.</li></ul><h2><strong>Những phản ứng triệu chứng sau khi sổ lãi cho chó con</strong></h2><p>Đối với nhiều chủ nhân, việc tẩy giun cho chó là một nhiệm vụ quen thuộc. Tuy nhiên, quá trình này cũng có thể gây ra một số phản ứng không mong muốn. Để đảm bảo an toàn cho thú cưng của bạn, hãy tuân theo hướng dẫn của bác sĩ thú y và luôn quan sát chó sau khi tẩy giun. Nội dung dưới đây sẽ giúp bạn hiểu rõ hơn về những phản ứng này:</p><ul><li><strong>Không có phản ứng gì:</strong> Đây là tình huống lý tưởng. Nếu chó của bạn không có bất kỳ triệu chứng gì sau khi tẩy giun, đó là dấu hiệu cho thấy thuốc đã được hấp thụ tốt và dạ dày của chó đang hoạt động hiệu quả. Để thuốc phát huy hiệu quả tối ưu, bạn nên tránh cho chó ăn trong vòng hai giờ sau khi uống thuốc.</li><li><strong>Cơ thể ủ rũ, tình trạng không thoải mái:</strong> Một số chó có thể trở nên ủ rũ và mệt mỏi sau khi tẩy giun. Các triệu chứng như nôn mửa và tiêu chảy nhẹ cũng có thể xuất hiện. Trong trường hợp này, bạn nên cho chó nghỉ ngơi và quan sát chúng. Hãy cung cấp nước sạch và sau khoảng nửa ngày, nếu tình hình đã ổn định, bạn có thể cho chó ăn uống bình thường.</li><li><strong>Nôn trớ quá nhiều:</strong> Trong một số trường hợp, chó có thể nôn mửa nhiều sau khi tẩy giun. Điều này đặc biệt thường xảy ra với những chú chó có dạ dày yếu hoặc chó già. Nếu chó nôn mửa quá nhiều, bạn nên bổ sung nước và nếu tình trạng không cải thiện trong vòng 24 giờ, hãy đưa chó đến gặp bác sĩ thú y.</li></ul>'),(19,12,'2023-12-12','Chó cảnh','Các điều cần biết về chó Alaskan Malamute (chó Alaska)','lovely-pet-portrait-isolated.jpg','Chó Alaskan Malamute không chỉ nổi tiếng với vẻ ngoại hình bề thế và sức mạnh, mà chó Alaska còn là biểu tượng của sự thông minh và lòng trung thành. Nếu Olympic có một môn thể thao dành riêng cho giống chó cảnh này, thì chắc chắn chó Alaska sẽ là quán quân. Không chỉ hoạt bát và thông minh, chúng còn rất yêu thích sự tương tác và luôn sẵn lòng tham gia vào mọi hoạt động. Mỗi chú chó Alaska là một đồng hành đáng tin cậy, luôn sẵn sàng đồng hành cùng bạn trong mọi cuộc phiêu lưu.','<h4><strong>Lịch sử nguồn gốc chó Alaskan Malamute</strong></h4><p>Giống chó Alaskan Malamute không chỉ nổi tiếng với vẻ đẹp ngoại hình mà còn vì lịch sử và nguồn gốc rất phong phú. Để có một chú chó Alaska khỏe mạnh và vui vẻ, hãy đảm bảo bạn có đủ kiến thức và sẵn lòng dành thời gian cho việc huấn luyện, tập luyện và cách chăm sóc chúng.</p><ul><li><strong>Bắt nguồn từ Bắc Cực:</strong> Alaskan Malamute là giống chó kéo xe trượt tuyết cổ xưa từ vùng Bắc Cực, với lịch sử kéo dài hàng ngàn năm. Khác với giống chó Siberian Husky, chó Alaskan Malamute với sức mạnh và sức chịu đựng đã giúp chúng vận chuyển phục vụ cho những công việc kéo tải trọng nặng hơn với những quãng đường xa.</li><li><strong>Công dụng trong lịch sử:</strong> Những chú chó Alaska đã giúp con người trong nhiều sự kiện lịch sử, từ cuộc sốt vàng ở Alaska, thám hiểm Nam Cực, cho đến việc hỗ trợ quân đội trong Thế chiến thứ II.</li><li><strong>Tên gọi:</strong> Giống chó này được đặt theo tên của người Mahlemut, người đã yêu thích và nuôi dưỡng chúng ở Alaska.</li><li><strong>Công nhận và phổ biến:</strong> Mặc dù giống chó này đã gặp nhiều khó khăn sau chiến tranh, nhưng hiện tại, chúng vẫn được yêu thích và đứng ở vị trí thứ 67 trên danh sách các giống chó phổ biến của Câu lạc bộ Chó kiểng Hoa Kỳ (<a href=\"https://g.co/kgs/3Zr694\">AKC </a>). Năm 2010, chó Alaskan Malamute trở thành biểu tượng của tiểu bang Alaska.</li><li><strong>Đặc điểm vật lý:</strong> Ban đầu, chó Alaska chỉ có kích thước trung bình. Nhưng qua thời gian và quá trình lai giống, chúng trở nên to lớn hơn, với lớp lông dày và đa dạng màu sắc. Chúng có nhiều điểm tương đồng với chó sói và thường dễ bị nhầm lẫn.</li><li><strong>Tuổi thọ và chăm sóc:</strong> Dù tuổi thọ trung bình chỉ khoảng 10-12 năm, nhưng môi trường sống và chế độ tập luyện có thể tác động lớn đến sức khỏe và tuổi thọ của giống chó Alaska này.</li></ul><h4><strong>Đặc điểm hình dáng của chó Alaska</strong></h4><p>Trong bài viết này, hãy cùng chúng tôi tìm hiểu sâu hơn về những đặc điểm nổi bật và tính cách đáng yêu của giống chó này.</p><ol><li><strong>Ngoại hình tổng quát:</strong> Giống chó Alaskan Malamute tỏa sáng bởi vẻ ngoại hình ấn tượng, dáng vững chắc, xương cơ đều phát triển mạnh mẽ. Đặc biệt, với ngực sâu và vai rộng, chó Alaska thể hiện sự mạnh mẽ và khí phách. Đầu của chúng to và uy nghi, tạo nên một khuôn mặt hiền lành và thân thiện. Đôi mắt hình hạnh nhân, thường sáng và linh hoạt, luôn tràn đầy sự tò mò và hứng thú với mọi thứ xung quanh. Tai của chó Alaska đứng thẳng, không quá to so với khuôn mặt, tạo nên một vẻ đẹp cân đối. Răng của chúng chắc khỏe và đều nhau. Dẫu rằng, bước đi của Alaskan Malamute thể hiện sự uyển chuyển. Điểm nhấn là bộ lông đa dạng màu sắc, trong đó, màu xám trắng là màu phổ biến nhất. Chiếc đuôi to, xù xì là biểu tượng không thể nhầm lẫn của giống chó này.</li><li><strong>Đầu và mặt:</strong> Hình dạng đầu rộng và sâu, biểu cảm trên khuôn mặt cho thấy sự dịu dàng và tính cách yêu thương. Mắt hình hạnh nhân, màu nâu và luôn tỏ ra tò mò, thân thiện. Đôi khi, chó Alaskan Malamute và chó Husky bị nhầm lẫn với nhau vì nhiều điểm tương đồng. Tuy nhiên, chỉ cần chú ý, bạn có thể dễ dàng phân biệt: Đầu rộng hơn, với lông dày và xù. Mặt của chúng mang một vẻ thân thiện và tình cảm.</li><li><strong>Kích thước và tỉ lệ cơ thể:</strong> Chó đực – Cao <strong>64cm</strong>, nặng <strong>39kg</strong>. Chó cái – Cao <strong>58cm</strong>, nặng <strong>34kg</strong>. Những chú chó Alaska sở hữu một thân hình dài hơn chiều cao của chúng, với sự cân đối giữa kích thước và xương cốt. Những cá thể vượt quá 54kg được gọi là “Giant Alaska”. Tuy AKC và FCI không đặt ra kích thước cụ thể, nhưng vấn đề sức khỏe tiềm ẩn khiến việc nuôi chó kích thước quá lớn không được khuyến khích.</li><li><strong>Màu mắt:</strong> Về mắt, chó Alaska thuần chủng chỉ chấp nhận hai màu: nâu và nâu đen. Bất kỳ màu mắt nào khác, dễ biết chúng đã được lai tạp.</li><li><strong>Bộ lông:</strong> Lớp lông bảo vệ của chúng khá dày và có kháng nước tốt, bảo vệ chúng khỏi thời tiết khắc nghiệt của vùng Bắc Cực. Bộ lông của Alaska là điểm đặc trưng nổi bật nhất. Với hai lớp lông: lớp ngoài dài và thô cùng lớp trong mềm và mượt, chúng giữ nhiệt rất tốt. Bạn có thể gặp nhiều màu sắc từ đen trắng, xám trắng cho tới nâu đỏ trắng và đôi khi là màu đỏ hoặc vàng.</li><li><strong>Tai và mũi:</strong> Tai có hình tam giác, dựng đứng khi chúng đang quan sát hoặc tò mò. Mũi thường có màu đen, trừ những chú chó có màu lông đỏ có thể có chiếc mũi màu nâu.</li><li><strong>Tính cách:</strong> Alaskan Malamute không chỉ đẹp về ngoại hình mà còn thân thiện, trung thành và thông minh. Chúng rất nhạy cảm, dễ bị stress nếu bị giam lỏng. Sở hữu năng lượng dồi dào, giống chó Alaska cần được vận động hàng ngày. Chó Alaska nổi tiếng với tính cách thân thiện, không kén người và đặc biệt thích trẻ con. Chúng là những người bạn đồng hành tuyệt vời, luôn sẵn sàng tham gia các trò chơi và hoạt động dã ngoại.</li><li><strong>Môi trường sống: </strong>Nếu bạn đang ở một nơi có khí hậu nóng, hãy cân nhắc kỹ trước khi quyết định nuôi một chú chó Alaska Malamute. Chúng cần không gian rộng lớn và thời gian vận động đều đặn.</li></ol><h4><strong>Thang điểm đánh giá chó Alaskan Malamute</strong></h4><figure class=\"table\"><table><tbody><tr><td><strong>Tình cảm với chủ nhân</strong></td><td>3/5⭐</td><td><strong>Khả năng trông nhà</strong></td><td>4/5⭐</td></tr><tr><td><strong>Thân thiện với trẻ em</strong></td><td>3/5⭐</td><td><strong>Khả năng độc lập</strong></td><td>3/5⭐</td></tr><tr><td><strong>Thân thiện với vật nuôi khác</strong></td><td>3/5⭐</td><td><strong>Khả năng huấn luyện</strong></td><td>5/5⭐</td></tr><tr><td><strong>Mức độ rụng lông</strong></td><td>3/5⭐</td><td><strong>Năng lượng</strong></td><td>5/5⭐</td></tr><tr><td><strong>Nhu cầu chải chuốt</strong></td><td>3/5⭐</td><td><strong>Tần suất sủa</strong></td><td>3/5⭐</td></tr><tr><td><strong>Mức độ chảy nước dãi</strong></td><td>1/5⭐</td><td><strong>Tuổi thọ</strong></td><td>4/5⭐</td></tr><tr><td><strong>Cởi mở với người lạ</strong></td><td>3/5⭐</td><td><strong>Mức độ vui vẻ</strong></td><td>3/5⭐</td></tr></tbody></table></figure><h4><strong>Dinh dưỡng thức ăn cần thiết cho chó Alaska</strong></h4><p>Alaskan Malamute là một giống chó đầy năng lượng, yêu thú và có cấu trúc cơ thể mạnh mẽ. Để hỗ trợ sức khỏe và năng lượng của chúng, việc cung cấp chế độ ăn uống đầy đủ và cân đối là vô cùng quan trọng.</p><ul><li><strong>Dinh dưỡng cơ bản:</strong> Chó Alaskan Malamute nên được cung cấp thức ăn chất lượng cao, có thể là sản phẩm thương mại hoặc thức ăn tự chế biến nhưng phải dưới sự hướng dẫn của bác sĩ <a href=\"https://www.petmart.vn/hoi-dap-thu-y-mien-phi\">thú y</a>. Lưu ý chọn loại thức ăn phù hợp với lứa tuổi và nhu cầu dinh dưỡng của chó, từ giai đoạn còn là chó con, trưởng thành đến giai đoạn già. Việc theo dõi lượng calo và trọng lượng là cần thiết để phòng ngừa béo phì.</li><li><strong>Cách cho chó Alaskan Malamute ăn:</strong> Chúng có nhu cầu năng lượng cao, nên chế độ ăn của chúng cần phải cân nhắc kỹ. Để xác định khẩu phần ăn tốt nhất, hãy tìm kiếm sự tư vấn từ bác sĩ thú y hoặc chuyên gia dinh dưỡng. Ngoài ra, chúng cũng cần một chế độ ăn đều đặn, phân chia thành nhiều bữa nhỏ trong ngày để tránh nguy cơ đầy hơi và vấn đề về dạ dày.</li><li><strong>Dinh dưỡng và cách cho ăn:</strong> Alaskan Malamute, với cơ thể lớn và sức mạnh, cần một sự cân bằng dưỡng chất đặc biệt, khác biệt so với giống chó nhỏ. Những thực phẩm chất lượng cao như <a href=\"https://www.petmart.vn/thuong-hieu/mkb\">MKB</a>, <a href=\"https://www.petmart.vn/thuong-hieu/purina-pro-plan\">PURINA PRO PLAN</a>, NATURAL … chứa protein và mỡ vừa phải sẽ giúp hỗ trợ sức khỏe tốt cho chúng. Bổ sung axit béo giúp lớp lông của chúng trở nên mềm mại, óng mượt và khỏe mạnh.</li><li><strong>Chế độ dinh dưỡng:</strong> Chúng có xu hướng tăng cân nếu không được kiểm soát chế độ ăn uống. Một chế độ dinh dưỡng cân đối, với lượng calo hợp lý, sẽ giúp chúng giữ được trạng thái sức khỏe tốt. Để đảm bảo chó không bị tăng cân, hãy thường xuyên kiểm tra trọng lượng của chúng thông qua việc sờ lớp lông dày của chúng.</li><li><strong>Nhu cầu dinh dưỡng đề xuất:</strong> Dù chó Alaskan Malamute có lớp lông dày, nhưng bạn vẫn nên thường xuyên kiểm tra trạng thái sức khỏe của chúng thông qua việc sờ và cảm nhận. Chế độ ăn cho chó con nên nhấm nháp, giúp chúng phát triển một cách ổn định. Điều này không chỉ giúp chúng phát triển đúng cách mà còn giảm nguy cơ mắc bệnh ở tuổi trưởng thành.</li></ul><h4><strong>Chế độ vận động và huấn luyện chó Alaska</strong></h4><p>Chó Alaskan Malamute là giống chó có bản chất hoang dã, mạnh mẽ và đầy năng lượng. Để giúp bạn hiểu rõ hơn và áp dụng các phương pháp huấn luyện hiệu quả, bài viết dưới đây sẽ chia sẻ thông tin chi tiết về hành vi và cách huấn luyện giống chó này.</p><ul><li><strong>Nhu cầu vận động:</strong> Giống chó này cần phải vận động nhiều. Nếu không được vận động đủ, chó Alaska có thể tìm cách giải trí khác, chẳng hạn như “tấn công” đến chiếc sofa yêu thích của bạn.</li><li><strong>Cần sự quan tâm:</strong> Mặc dù thích vận động, sau khi được vận động đủ, Alaskan Malamute lại trở thành bạn đồng hành tuyệt vời trên ghế sofa, luôn đòi hỏi sự yêu thương và quan tâm từ chủ nhân.</li><li><strong>Sự tò mò:</strong> Alaskan Malamute rất tò mò và thích được làm trung tâm chú ý. Nếu cảm thấy chán chường hoặc không vui, giống chó này sẽ không ngần ngại bày tỏ cảm xúc của mình.</li><li><strong>Phương pháp tích cực:</strong> Alaskan Malamutes thích được huấn luyện thông qua phương pháp tiếp cận tích cực, sử dụng thưởng để kích thích chúng.</li><li><strong>Sự kiên nhẫn:</strong> Mặc dù thông minh, nhưng chó Alaska có thể rất cứng đầu. Đôi khi chúng có thể nghe và hiểu lệnh nhưng lại không muốn tuân theo. Vì vậy, chủ nhân cần phải kiên nhẫn và sáng tạo trong việc huấn luyện.</li><li><strong>Giảm thiểu hành vi đào bới:</strong> Như đã nói, chúng rất thích đào bới. Bạn cần giảm thiểu hành vi này bằng cách cung cấp cho chúng nhiều hoạt động vận động và huấn luyện.</li></ul>'),(21,12,'2023-12-13','Chó cảnh','Cách chăm sóc chó mang thai tại nhà cần phải biết','pet-lifestyle-together-with-owner.jpg','Việc chăm sóc chó mang thai tại nhà cũng không hề đơn giản. Nếu bạn không có kiến thức cũng như sự chuẩn bị kỹ càng thì việc sinh đẻ tự nhiên của chó có nguy cơ tử vong cao. Vì vậy, nếu bạn đang nghi ngờ chó của mình có thai thì đừng bỏ qua những dấu hiệu nhận biết chó mang thai và cách chăm sóc chúng được chia sẻ trong bài viết dưới đây của Qiy nhé.','<h3><strong>Dấu hiệu chó mang thai mà bạn cần biết</strong></h3><p>Trước khi đưa ra cách chăm sóc chó mang thai bạn cần nhận biết chú chó nhà bạn có đang mang thai hay không:</p><ul><li><strong>Sự thay đổi bên ngoài của chó:</strong> Dấu hiệu cơ bản nhận biết chó có thai chính là sự thay đổi của núm vú. Núm vú sẽ trở nên hồng hào và căng phình hơn. Dấu hiệu này chỉ rõ rệt khi thụ thai được 2 – 3 tuần.</li><li><strong>Tuần thứ 4 – 5 thì bụng chúng sẽ tròn và căng đầy hơn:</strong> Khi bước vào tuần thứ 6 – 9, cơ thể chúng mới có những biến đổi rõ rệt như tuyến vú căng phồng.</li><li><strong>Sau một thời gian chó được thụ tinh, chúng trở nên hiền:</strong> Đôi lúc mệt mỏi và có biểu hiện nghén. Lúc này bạn có thể chuẩn đoán được là chó nhà mình có mang thai hay không?</li><li><strong>Thay đổi khẩu vị:</strong> Khi chó có thai, tử cung của chúng sẽ phát triển hơn và chiếm nhiều diện tích. Vì vậy, lúc này chó mẹ sẽ cảm thấy khó chịu, mệt mỏi, chán ăn hoặc ăn từng chút một.</li><li><strong>Tìm ổ đẻ:</strong> Chó mẹ thường sẽ đi tìm vị trí và ổ đẻ trước khoảng 2 – 3 tuần. Thường vào những tuần cuối của giai đoạn mang thai. Do đó, để chăm sóc chó mang thai bạn cần chuẩn bị một nơi kín, đảm bảo yên tĩnh và thoáng rộng để cho chó mẹ nằm trước.</li><li><strong>Biện pháp chẩn đoán chó có thai:</strong> Thông thường sớm nhất cũng phải từ 26 – 35 ngàỵ sau phối giống chó. Tất cả đều dựa vào thăm khám lâm sàng của các bác sĩ <a href=\"https://www.petmart.vn/hoi-dap-thu-y-mien-phi\">thú y</a>.</li></ul><p>Bạn không được chụp X-quang khi chó mới mang thai. Chỉ được phép dùng X-quang để xác định số lượng con sau 45 ngày mang thai. Độ chính xác 95% về số lượng thai. Vì vậy, siêu âm cho chó là để xác định số lượng con chứ không có ý nghĩa chuẩn đoán.</p><h3><strong>Thông tin nên biết khi chó mang thai</strong></h3><p>Thông thường, kể từ khi thai hình thành và làm tổ ở sừng tử cung tới khi chó con ra đời là khoảng 58 – 68 ngày. Trung bình là 9 tuần. Vì vậy, thời gian mang thai của chó chỉ khoảng trong 2 – 3 tháng. Tuy nhiên, tùy từng giống chó mà thời gian mang thai của chúng sẽ khác nhau. Thường thì, chó càng ít thai như dưới 4 con với các giống chó Poodle, Tod, GSD, Rottweiler, Labrador, Golden… Hoặc dưới 2 con như giống Miniature Bull Terrier, Nhật, Bắc Kinh, Chihuahua … thì thời gian mang thai càng dài.</p><p>Thời gian chó rất dễ bị sảy thai là ngày thứ 28 – 45. Chính vì vậy bạn nên bạn phải kỹ lưỡng trong cách chăm sóc chó mang thai. Khi chó có thai, bạn không nên cho chúng nhảy cao, chạy nhanh, đánh nhau hoặc ủ rũ buồn rầu. Bạn nên thường xuyên dắt chúng đi dạo và chơi với chúng các trò chơi nhẹ nhàng.</p><h3><strong>Các giai đoạn khi chó đang mang thai</strong></h3><h4><strong>Giai đoạn đầu thai kỳ (1 – 30 ngày đầu)</strong></h4><p>Trong thời gian này, chó cái chưa có các dấu hiệu mang thai. Nhưng bạn vẫn cần cân chỉnh và chăm sóc chó mang thai bằng chế độ ăn uống hợp lý. Bổ sung thêm chất canxi vào khẩu phần ăn cho chó. Khi chó có thai, chúng rất biếng ăn. Thậm chí là bỏ ăn và mệt mỏi. Hiện tượng biếng ăn này thường xảy ra trong 3 – 4 tuần đầu mang thai. Nó sẽ sớm kết thúc sau khoảng 1 tuần. Sau đó, nếu chó vẫn biếng ăn, bỏ ăn dài ngày thì bạn cần đưa chúng đến ngay bác sĩ thú y để thăm khám.</p><h4><strong>Giai đoạn giữa thai kỳ (từ ngày 35 – 45)</strong></h4><p>Lúc này, cơ thể của chó mẹ mới bắt đầu có những thay đổi rõ ràng hơn. Thái độ và hành vi của chó cũng biến đổi. Đây cũng là giai đoạn bạn nên tăng cường chăm sóc chó mang thai và chế độ ăn cho chúng. Bạn không nên cho chúng ăn quá no mà chia thành từng bữa nhỏ. Bổ sung nhiều dưỡng chất cần thiết, nhất là chất sắt.</p><h4><strong>Giai đoạn cuối của thai kỳ (từ ngày 35 – 45)</strong></h4><p>Đến khoảng sau ngày 45 thai kỳ thì bạn có thể cho chó ăn Mega-cal. Tùy theo thể trọng của cún mẹ. Thỉnh thoảng cho chúng ít sụn xương hầm thật mềm để tăng lượng canxi cần thiết. Có thể nói, cách chăm sóc chó mang thai giai đoạn thai kỳ là một vấn đề khá phức tạp. Bạn không chỉ đầu tư công sức, thời gian, chi phí mà còn phải thật sự yêu thương và quan tâm chúng.</p><h4><strong>Dinh dưỡng cho chó mang thai</strong></h4><p>Thuốc cho chó mang thai hỗ trợ chăm sóc sức khỏe cho chó mẹ. Trong giai đoạn mang thai&nbsp;chúng cần rất nhiều sự hỗ trợ và giúp đỡ từ phía người nuôi. Để có 1 thai kì khoẻ mạnh và suôn sẻ mẹ tròn con vuông thì việc&nbsp; bổ sung thức ăn dinh dưỡng là vô cùng quan trọng.</p><p>Đặc biệt, 1 số loài <a href=\"https://www.petmart.vn/cho-canh\">chó cảnh</a> có nguy cơ sảy thai, số lượng thai ít, thai dị tật, đẻ khó, thai nhiễm khuẩn cao như: Rottweiler, Becgie, Chihuahua, Phú quốc, Phốc… thì càng cần phải quan tâm. Thông thường khi chó mang thai, chủ nhân thường xây dựng khẩu phần ăn đặc biệt. Tuy nhiên, lượng thức ăn và khả năng hấp thụ của chó mang thai có nhiều sự thay đổi. Chế độ ăn hàng ngày không thể cung cấp đầy đủ tất cả vitamin, khoáng chất cần thiết cho thai kì khoẻ mạnh.</p><p>Trong nhiều trường hợp lại cho ăn quá thừa chất đường bột, béo, canxi gây béo phì cả mẹ lẫn thai cũng gây nên tình trạng đẻ khó. Tuy vậy nhưng vẫn không cung cấp đủ các vitamin, khoáng chất cần thiết trong giai đoạn đặc biệt này . Trong khi đó, thiếu chất trong khi mang thai là nguyên nhân chính dẫn đến thai bị dị tật, sảy thai, đẻ khó.</p><p>Khi chăm sóc chó mang thai bạn cần cung cấp đủ vitamin, các vi lượng cần cho các giai đoạn. Chính vì vậy bạn cần bổ sung thuốc chứa acid folic, B12, sắt, magie. Đây đều là các thành phần có trong thuốc bổ thời kì mang thai cho chó.</p><p>Công dụng của thuốc cho chó mang thai nhằm tránh những trường hợp đáng tiếc như: Sảy thai, đẻ non, đẻ khó. Giảm sức đề kháng nên dễ nhiễm bệnh do virus: Parvo, carre, Viêm khí quản – phế quản truyền nhiễm. Hoặc các bệnh do vi trùng như sảy thai truyền nhiễm Brucellosis, Lepto, viêm tử cung, lộn tử cung khi phối giống. Bệnh liên quan tới gen di truyền như lai đồng huyết, cận huyết, thai quái dị.</p><h3><strong>Một số lưu ý khi chăm sóc chó mang thai</strong></h3><p>Để chó mẹ có thể sinh nở an toàn, chó mẹ cần phải được cách li khỏi những con chó khác trong nhà. Tránh tiếp xúc với những con vật khác ở bên ngoài. Chó mẹ cần có chế độ tập luyện thể dục và vận động hợp lý. Ngoài ra, bạn nên lưu ý trong cách chăm sóc chó mang thai với các vấn đề sau:</p><ul><li>Cung cấp các thức ăn giàu calo, canxi và phốt-pho.</li><li>Có hàm lượng chất béo cao hơn giúp thỏa mãn nhu cầu calo cao hơn.</li><li>Dễ tiêu hoá để tối đa hóa lượng calo tiêu thụ được từ thức ăn.</li><li>Có hàm lượng protein nhiều hơn để chó con phát triển khỏe mạnh.</li><li>DHA hỗ trợ sự phát triển hệ thần kinh của chó con.</li><li>Cung cấp nhiều chất sắt.</li><li>Đưa chó mẹ đi khám bác sĩ thú y để kiểm tra sức khỏe và khám thai định kỳ.</li></ul><p>Đối với chó Pitbull và các dòng chó lông sát hoặc gần như không có lông, thể hình thấp thì vẫn có thể tắm được cho chúng.&nbsp;Đối với các dòng chó to và cao như GSD (Becgie Đức) và Rott thì không nên cho tắm cho chúng. Vì thói quen lắc người liên tục sẽ ảnh hưởng lớn đến thai nhi trong bụng. Bạn nên lấy khăn thấm nước ấm và lau nhanh cho chó là được. Nếu bắt buộc phải tắm, thì nên tắm nhanh và bạn phải giữ chó. Lau hoặc sấy cho lông chúng thật khô. Tắm trong nhà vệ sinh kín gió và nên dùng nước có nhiệt độ thích hợp.</p><h4><strong>Cân nhắc tẩy giun sán cho chó mẹ</strong></h4><p>Giun chỉ và các ký sinh trùng đường ruột sẽ ảnh hưởng đến những chú chó mang thai. Do vậy, hãy kiểm tra kĩ tại bệnh viện trước khi <a href=\"https://www.petmart.vn/kinh-nghiem-phoi-giong-cho-tu-chuyen-gia-hang-dau\">phối giống chó </a>. Hãy chắc rằng chó của bạn đã được phòng ngừa cả các loại ký sinh trùng.</p><p>Có thể sử dụng Pyrantel pamoate hoặc Fenbedazole để tẩy giun sán ít nhất 2 lần trước khi phối giống chó. Lưu ý: việc tẩy giun cần có hướng dẫn và chỉ định của bác sĩ thú y. Ký sinh trùng đường ruột ở mẹ có thể lây sang cho con thông qua tử cung và qua sữa. Tình trạng này thường gặp ở các trại <a href=\"https://www.petmart.vn/muon-kiem-tien-tu-phoi-giong-va-nuoi-cho-sinh-san\">nuôi chó sinh sản </a>. Chúng cần được tẩy giun sán lúc 6, 7 và 11 tuần tuổi với Pyrantel pamoate. Cần tiếp tục phòng ngừa cho chó mẹ trong quá trình chăm sóc chó mang thai.</p><h4><strong>Diệt ve rận bọ chét cho chó mẹ</strong></h4><p>Việc kiểm soát bọ chét là rất cần thiết một khi chó con được sinh ra. Frontline, Advantage và Advantix là những nhãn hiệu được dùng phổ biến nhất hiện nay. Advantage và Advantix cùng thuộc <a href=\"https://www.petmart.vn/thuong-hieu/bayer\">Bayer</a> có tác dụng diệt 98-100% bọ chét trong vòng 12 tiếng. Frontline có tác dụng phòng ngừa bọ chét cho chó trong khoảng 2-3 tháng (hoặc hơn).</p><p>Tuy nhiên các hãng này đã có những cảnh báo về việc chỉ nên sử dụng cho động vật mang thai dưới 6 tháng. Trong quá trình chăm sóc chó mang thai, bạn có thể sử dụng thuốc xịt Methoprene để kiểm soát bọ chét. Không dùng những sản phẩm này đối với những chú chó mới sinh. Chỉ dùng nhíp bắt bọ chét và nhúng bọ chét vào chai rượu.</p><h4><strong>Dinh dưỡng cho chó mẹ đang mang thai</strong></h4><p>Cuối thai kỳ và cho con bú, chó có nhu cầu cao về dinh dưỡng. Chó cho con bú cần nhiều dinh dưỡng hơn cả chó đang lớn. Sáu tuần đầu mang thai, chó mẹ không nên ăn nhiều hơn lúc trước khi mang thai. Nhưng bắt đầu từ tuần thứ 6, cân nặng và sự thèm ăn của chó bắt đầu tăng. Bắt đầu tăng khoảng 25% lượng thức ăn. Chó mẹ cần được bổ sung thực phẩm giàu chất dinh dưỡng trong suốt các giai đoạn mang thai.</p><p>Bởi vì chó con sẽ gây áp lực lên các cơ quan nội tạng của chó mẹ nên chó mẹ không thể ăn nhiều trong một phần ăn như trước khi sinh. Do vậy, chia nhỏ bữa ăn thay vì cho ăn một hoặc hai bữa lớn. Đảm bảo luôn có sẵn nước sạch. Bạn cũng không cần các vitamin hay khoáng chất bổ sung.</p><h4><strong>Cho chó mẹ tập thể dục hàng ngày</strong></h4><p>Cho chó mẹ luyện tập tăng cường hay cho chó biểu diễn đều không phải là những ý tưởng tốt. Béo phì là nguy cơ tiềm ẩn của chó khi mang thai khi đến thời gian sinh để do đó kiểm soát xu hướng béo phì với việc tập luyện và chú ý điều chỉnh lượng calo cần thiết của chó. Việc thực hiện chế độ ăn uống hạn chế trước khi sinh đối với chó sẽ an toàn hơn việc áp dụng trong quá trình chăm sóc chó mang thai và sau khi mang thai.</p><p>Trong suốt 3 tuần cuối của thai kỳ, chó mẹ nên được tách riêng ra khỏi những con chó trong nhà bạn và những con chó khác. Việc cô lập này sẽ giúp bảo vệ chó mẹ tránh được việc tiếp xúc với vi rút Herpes ở chó. Đây là loại vi rút gây lở loét âm đạo và chảy nước mũi, không gây nghiêm trọng đối với chó mẹ nhưng thường khiến chó con tử vong.</p><h4><strong>Chuẩn bị làm ổ sinh cho chó sinh con</strong></h4><p>Nơi chó sinh cần phải có nền không thấm nước để có thể dễ dàng làm sạch và chăm sóc chó mang thai. Đồng thời phải là nơi không có gió lùa và yên tĩnh. Chuẩn bị giường có lót khăn hoặc quần áo không còn sử dụng và giúp chó làm quen với việc dùng giường này.</p><p>Nếu chó mẹ không nằm trên giường đó, bạn cần khuyên khích bằng cách vuốt ve và thưởng các món ăn nhẹ. Dẫn chó mẹ đến khu vực đã được thiết kế sẵn cho việc sinh. Nếu chó mẹ đẻ con ra ngoài khu vực đã được chỉ định được, hãy chấp nhận quyết định của nó và để chó mẹ sinh nở trong điều kiện tâm lý thoải mái nhất.</p><p>Khi chó mẹ đã sinh xong, di chuyển tất cả chúng tới giường chuẩn bị trước. Nhiều con chó có thể sẽ bám lấy bạn khi bắt đầu sinh và muốn bạn luôn ở bên chúng. Chúng cố gắng bám theo bạn cả khi bạn rời phòng. Bạn có thể cần nhiều thời gian với những con chó kiểu này để an ủi nó.</p><h3><strong>Chú ý chứng mang thai giả ở chó</strong></h3><p>Đây là hiện tượng rất hiếm xảy ra ở các loài vật khác. Nó lại thường xảy ra với loài chó ở độ tuổi sinh sản. Tình trạng này xảy ra hoàn toàn tự nhiên. Thường bắt gặp ở những chú chó đã từng bị hư thai trước đó.</p><p>Sau khi động dục khoảng 60 ngày, chó cái có dấu hiệu của việc mang thai. Dấu hiệu như bụng to dần lên, bầu vú căng hồng và có thể có sữa tiết ra. Tuy nhiên, vào giai đoạn cuối, chó cái đi tìm ổ để đẻ nhưng thực ra lại không có thai. Đây là hiện tượng rối loạn giai đoạn tiền kinh nguyệt. Gọi chung là mang thai giả.</p><p>Bạn không nên thấy chó có những dấu hiệu mang thai mà kết luận hoặc chắc chắn là chó có thai. Cách tốt nhất để biết chính xác là bạn nên đưa chó cưng của mình đến các trạm thú y để được khám. Đồng thời kiểm tra nhịp tim, siêu âm để có kết luận chính xác nhé.</p><p>Ngoài ra, bạn không nên quá lo lắng khi phát hiện <a href=\"https://www.petmart.vn/tim-hieu-dau-hieu-hoi-chung-cho-mang-thai-gia\">chó mang thai giả </a>. Hiện tượng này có thể tự hết trong vòng một tháng. Ngoài ra, bạn nên thường xuyên vệ sinh núm vú để ngăn ngừa các vi trùng thừa cơ tấn công. Bạn có thể sử dụng nước muối pha loãng để lau và vệ sinh cho chú chó của mình. Quan trọng nhất, bạn hãy dành nhiều thời gian hơn cho chúng. Việc cùng chơi đùa và thư giãn để đánh lạc hướng sự mang thai giả. Giảm sự khó chịu cho chó cưng.</p><h3><strong>Những hiện tượng bất thường khi chó mang thai</strong></h3><p>Nếu chó bị giảm cân mặc dù được cho ăn nhiều hơn, hãy bổ sung các thức ăn dinh dưỡng chuyên dụng.&nbsp;Khoảng thời gian sau khi sinh là khó chăm sóc về dinh dưỡng nhất: Chó sẽ ăn nhiều dần lên hơn 20-30 ngày sau khi sinh bởi vì đàn chó con đang lớn và cần được nuôi dưỡng nhiều hơn nữa.</p><p>Trước khi kết thúc tháng đầu, chó mẹ nên được cho ăn gấp 2 hoặc 4 lần lượng thức ăn bình thường. Cho chó ăn theo nhu cầu của nó. Nếu chó bắt đầu trở nên quá gầy, bạn nên khuyến khích chó ăn bằng cách làm ẩm thức ăn hoặc bổ sung các thức ăn đóng hộp mà chó yêu thích.</p><p>Một vài con chó sẽ chán ăn và có hiện tượng nghén ba hoặc bốn tuần đầu mang thai. Sau đó một tuần thì hiện tượng này sẽ hết. Việc chăm sóc chó mang thai, bổ sung canxi vào chế độ ăn của chó thực sự sẽ làm tăng nguy cơ sản giật hoặc sốt sữa khi sinh chó con. Việc thêm vitamin bổ sung cũng không cần thiết và đó có thể không phải là sự lựa chọn sáng suốt.</p><h3><strong>Nên đến bác sĩ thú y kiểm tra thai sản của chó</strong></h3><p>Chó mẹ cần có lịch khám bác sĩ thú y khi có thai khoảng 30 ngày nếu như chưa được kiểm tra trước khi mang thai. Bác sĩ sẽ sờ nắn bằng tay hoặc siêu âm hoặc phân tích hooc môn <a href=\"https://vi.wikipedia.org/wiki/Progesterone\">Progesterone </a>(hooc môn giới tính để duy trì thai) để xác nhận sự hiện diện của những chú chó con. Trước khoảng thời gian này, núm vú của chó sẽ bắt đầu sung lên.</p><p>Một số bác sĩ sẽ đề nghị chụp X-quang chó mẹ 3 tuần tuổi trước khi sinh để đếm số chó con. Như vậy bạn sẽ biết được khi nào thì chó sinh con xong và tất cả chó con đã ra hết. Tuy nhiên, việc cho chó mẹ tiếp xúc với phóng xạ sẽ không được đảm bảo có thích hợp hay không.</p><h3><strong>Chăm sóc chó mang thai trong quá trình sinh đẻ</strong></h3><p>Sau khi sinh một vài chú chó đầu, chó mẹ thường bận rộn với những chú chó con và không còn phụ thuộc vào sự hiện diện của bạn. Một số chó mẹ sẽ cố gắng tránh xa bạn và trốn đi. Cứ để khoảng không gian riêng cho chó của bạn, nhưng hãy kiểm tra và chăm sóc chó mang thai sau sinh thường xuyên. Rất có thể bạn sẽ bỏ lỡ toàn bộ quá trình sinh con. Một sáng bạn tỉnh dậy đi làm và khi về phát hiện ra bạn đã có một ổ chó mới đang bú sữa mẹ.</p><p>Nếu chỗ sinh cho chó không đủ ấm, bạn có thể sưởi ấm bằng cách bọc một miếng nêm nóng trong một chiếc khăn, đặt ở chế độ “thấp”, và đặt dưới ½ giường. Cách này giúp cho chó mẹ và chó con có thể tránh nguồn nhiệt nếu chúng muốn. Quấn băng keo xung quanh lõi miếng đệm nóng bởi vì chó con có xu hướng cắn lõi này.</p><h3><strong>Chăm sóc chó mẹ sau khi đã sinh xong</strong></h3><p>Cảm giác thèm ăn sẽ biến mất. Ở tuần thứ 3 hoặc 4, chó con sẽ tự ăn. Hãy khuyến khích chúng tự ăn thức ăn cứng để giảm áp lực cho chó mẹ phải sản sinh sữa. Trước tuần thứ 6 đến 8 tuần, chó con sẽ hoàn toàn cai sữa. Nên lượng <a href=\"https://www.petmart.vn/danh-muc/cho/thuc-an-cho\">thức ăn cho chó</a> mẹ có thể trở lại như bình thường lúc trước khi mang thai.</p><p>Khi bạn cai sữa cho chó con, cần giúp cho nguồn sữa của chó mẹ được làm khô bằng cách kiềm chế lượng thức ăn và chỉ cho chó uống ½ lượng nước mà chó thường dùng. Ngày tiếp theo, cho chó uống ¼ lượng nước. Tăng dần lượng thức ăn trong 5 ngày cho đến khi trở về mức trước khi mang thai. Nếu chó giảm cân trong quá trình mang thai, điều chỉnh lượng thức ăn tăng nên để bù vào trọng lượng bị mất.</p><p>Tóm lại, chủ chó cần chủ động tìm hiểu và chuẩn bị kỹ lưỡng cho quá trình trước, trong và sau khi chăm sóc chó mang thai, đồng thời cần tham khảo ý kiến bác sĩ thú y đặc biệt là khi sử dụng thuốc cho chó.</p>'),(22,12,'2023-12-13','Chó cảnh','Cách chăm sóc chó con mới đẻ an toàn khỏe mạnh','closeup-shot-cute-cocker-spaniel-puppy-with-long-ears-sitting-white-surface.jpg','Chăm sóc chó con mới đẻ và chăm sóc chó mẹ sau sinh  rất cần sự kiên nhẫn và kiến thức về nhu cầu dinh dưỡng và sức khỏe. Bài viết này của Qiy sẽ cung cấp cho bạn những thông tin khoa học và kỹ thuật chăm sóc chó con đúng đắn, giúp chó mẹ và chó con đều khỏe mạnh và hạnh phúc.','<p>Dù là chó con có mẹ hay chó con mất mẹ, việc hiểu rõ nhu cầu và cách chăm sóc sẽ giúp bạn tránh được nhiều khó khăn và thách thức. Nếu bạn đang chăm sóc một đàn chó con mới chào đời, hãy tham khảo bài viết để có những kiến thức và kỹ năng chăm sóc chó con mới đẻ cần thiết, từ việc chọn thức ăn dinh dưỡng đến việc tạo môi trường sống lý tưởng.</p><h3><strong>Chú ý ban đầu với chó mẹ và chó con sơ sinh</strong></h3><p>Dưới đây là hướng dẫn tổng quát những chỉ mục quan trọng cần thiết giúp bạn chăm sóc chó con mới đẻ và chó mẹ sau quá trình sinh nở, đảm bảo sức khỏe tốt nhất cho tất cả:</p><ol><li><strong>Biện pháp chăm sóc ban đầu:</strong> Sau khi chó mẹ sinh nở, việc tắm rửa sạch sẽ cho chó mẹ là cực kỳ quan trọng. Hãy sử dụng nước ấm và khăn lau, tránh sử dụng xà phòng hoặc chất khử trùng trừ khi theo hướng dẫn của bác sĩ thú y.</li><li><strong>Kiểm tra thể trạng:</strong> Kiểm tra kỹ lưỡng cả chó mẹ và chó con để đảm bảo không có dấu hiệu bất thường nào như chảy máu, tiết dịch có mùi hôi hay bất kỳ vấn đề gì khác.</li><li><strong>Dinh dưỡng và sức khỏe:</strong> Chó con cần được kiểm tra định kỳ để đảm bảo chúng đang bú đủ sữa và có sức khỏe tốt. Mẹ chó cũng cần được kiểm tra để đảm bảo không có dấu hiệu của viêm vú hoặc các vấn đề sức khỏe khác.</li><li><strong>Thăm khám bác sĩ thú y:</strong> Tất cả chó mẹ và chó con cần phải được kiểm tra bởi bác sĩ thú y trong vòng 48 giờ sau sinh để đảm bảo sức khỏe và phát hiện sớm các vấn đề có thể xuất hiện.</li><li><strong>Nguồn sữa mẹ:</strong> Nếu có dấu hiệu chó con không được bú đủ sữa, hãy tham khảo ý kiến bác sĩ thú y. Có thể bạn sẽ cần thức ăn và thức ăn bổ sung, cũng như hướng dẫn chi tiết về cách chuẩn bị và lượng thức ăn.</li><li><strong>Sản giật và sốt sữa: </strong>Nếu có dấu hiệu của sản giật, hãy liên hệ với bác sĩ thú y ngay lập tức. Đây là một tình trạng cấp cứu y tế có thể đe dọa tính mạng chó mẹ nếu không được điều trị kịp thời.</li></ol><h3><strong>Tiếp cận chó con sơ sinh một cách thận trọng</strong></h3><p>Chăm sóc chó con mới đẻ đòi hỏi sự thận trọng và kiên nhẫn, đặc biệt là trong những tuần đầu tiên của cuộc đời chúng. Cả chó mẹ và chó con đều cần sự yên tĩnh và không bị quấy rối để có thể phát triển một cách khỏe mạnh và an toàn. Dưới đây là một số hướng dẫn để bạn có thể tiếp cận và chăm sóc chó con mới đẻ một cách thận trọng và đúng đắn.</p><ul><li><strong>Thận trọng khi tiếp cận:</strong> Trong 2 tuần đầu tiên sau khi sinh, việc can thiệp ít nhất càng tốt. Chó con rất dễ mắc bệnh và có thể gây căng thẳng cho chó mẹ nếu có quá nhiều sự chăm sóc và vuốt ve. Hãy tiếp cận chó con một cách thận trọng và tránh làm phiền chúng nếu không cần thiết, đặc biệt là khi chó mẹ có vẻ căng thẳng hoặc bảo vệ.</li><li><strong>Tôn trọng không gian riêng tư:</strong> Chó mẹ có thể tỏ ra hung dữ nếu cảm thấy có mối đe dọa đến lũ chó con của mình. Hãy tôn trọng không gian của chó mẹ và chỉ tiếp xúc với chó con khi chó mẹ có vẻ thoải mái và không tỏ ra căng thẳng. Đây không chỉ giúp giảm thiểu stress<a href=\"https://vi.wikipedia.org/wiki/C%C4%83ng_th%E1%BA%B3ng_(t%C3%A2m_l%C3%BD)\"> </a>cho chó mẹ mà còn giúp tạo môi trường an toàn cho chó con.</li><li><strong>Hãy để chúng được yên tĩnh:</strong> Khi chó con bắt đầu lớn và năng động hơn, chó mẹ có thể cần thêm thời gian để nghỉ ngơi và thư giãn. Hãy cung cấp không gian yên tĩnh cho chó mẹ và chó con, nhưng đồng thời đảm bảo kiểm tra thường xuyên để đảm bảo rằng cả hai đều khỏe mạnh và an toàn.</li><li><strong>Giao lưu và hoạt động:</strong> Khi chó con ngày càng lớn và muốn khám phá thế giới xung quanh, hãy giúp chúng tìm hiểu về môi trường sống mới của mình một cách an toàn và kiểm soát. Giao lưu với các thành viên trong gia đình và hoạt động vận động nhẹ nhàng sẽ giúp chó con phát triển toàn diện và trở thành chú chó trưởng thành khỏe mạnh và hạnh phúc.</li></ul><h3><strong>Chăm sóc chó con mới đẻ bằng sữa mẹ</strong></h3><p>Trong những tuần đầu tiên của cuộc sống, việc chăm sóc chó con mới đẻ hoàn toàn phụ thuộc vào sữa mẹ, nguồn dinh dưỡng quan trọng giúp chúng phát triển và miễn dịch khỏi bệnh tật. Cung cấp sữa mẹ sớm và thường xuyên, đặc biệt là sữa non giàu kháng thể, là quan trọng để bảo vệ chó con khỏi các bệnh truyền nhiễm và giữ cho chúng mạnh mẽ và khỏe mạnh. Nếu chó mẹ không thể chăm sóc chó con, bạn cần phải can thiệp và giúp chó con bú sữa mẹ bởi:</p><ul><li><strong>Sự miễn dịch động vật từ sữa chó mẹ:</strong> Trong những ngày đầu tiên sau khi sinh, sữa mẹ cung cấp cho chó con các kháng thể cần thiết để chống lại vi khuẩn và vi trùng. Sữa non chứa nhiều chất dinh dưỡng giúp chó con phát triển. Sữa mẹ không chỉ cung cấp dinh dưỡng cần thiết mà còn chứa kháng thể giúp chó con phòng tránh bệnh tật. Số lượng Globulin miễn dịch (kháng thể) trong sữa mẹ phản ánh mức độ kháng thể trong cơ thể chó mẹ, giúp chó con tăng cường hệ thống miễn dịch tự nhiên.</li><li><strong>Bổ sung thêm sữa bột cho chó (sữa công thức):</strong> Trong trường hợp chó con mất mẹ hoặc không thể cho chó con bú. Hãy tránh sử dụng sữa của người và hãy tư vấn với bác sĩ thú y về việc lựa chọn sữa cho chó con<a href=\"https://www.petmart.vn/sua-cho-cho-con-qua-loi-khuyen-cua-cac-chuyen-gia\"> </a>thích hợp. Đối với chó con mồ côi mẹ, việc cho uống bằng bình ti sữa là điều không thể tránh khỏi. Hãy chắc chắn rằng bạn biết cách sử dụng bình sữa sao cho an toàn và hiệu quả.</li><li><strong>Đặc điểm sinh lý và phát triển của chó con:</strong> Hiểu rõ về các giai đoạn phát triển của chó con, từ việc mở mắt đến mọc răng, là quan trọng để cung cấp chăm sóc phù hợp và đảm bảo sức khỏe tốt nhất cho chúng.</li><li><strong>Đo nồng độ kháng thể:</strong> Việc đo nồng độ kháng thể trong máu giúp xác định mức độ bảo vệ mà chó mẹ có thể truyền lại cho chó con qua sữa mẹ. Chó mẹ với nồng độ kháng thể cao sẽ truyền lại sự bảo vệ mạnh mẽ hơn cho chó con trước các bệnh nguy hiểm như Cave ở chó<a href=\"https://www.petmart.vn/benh-care-o-cho\"> </a>và Parvo ở chó<a href=\"https://www.petmart.vn/benh-parvovirus-o-cho\"> </a>.</li></ul><h3><strong>Môi trường và nhiệt độ cho chó sơ sinh</strong></h3><p>Chăm sóc chó con mới đẻ là một trách nhiệm lớn và đầy thách thức, yêu cầu một hiểu biết sâu rộng về môi trường sống, nhiệt độ, và dinh dưỡng. Chó con phát triển nhanh chóng trong những tuần đầu tiên của cuộc sống, và việc cung cấp một môi trường ấm áp, sạch sẽ và yên tĩnh là cực kỳ quan trọng.</p><ul><li><strong>Môi trường sống:</strong> Chó con cần một môi trường sạch sẽ và an toàn để phát triển. Một ổ chó sạch sẽ và thoáng đãng trong mùa hè và ấm áp trong mùa đông sẽ giúp chó mẹ và chó con tránh được bệnh tật. Những tấm vải mềm là lựa chọn tốt nhất để lót ổ, giữ cho chó con ấm áp và thoải mái. Ánh sáng tự nhiên cũng là yếu tố quan trọng để phòng tránh bệnh còi cọc và giúp chăm sóc chó con mới đẻ phát triển khoẻ mạnh.</li><li><strong>Nhiệt độ ổn định:</strong> Nhiệt độ ấm áp là quan trọng để chó con duy trì nhiệt độ cơ thể và phát triển khỏe mạnh. Chó con không thể tự điều chỉnh nhiệt độ cơ thể của mình cho đến khi đạt 3-4 tuần tuổi. Sử dụng đèn sưởi và giữ nhiệt độ trong chuồng ổn định, giảm dần theo thời gian, sẽ giúp chó con thích ứng với môi trường mới của mình.</li></ul><h3><strong>Khi nào chó con mở mắt?</strong></h3><p>Tại sao chó con mới đẻ không mở mắt là câu hỏi nhiều người thắc mắc. Chó con mới đẻ chưa mở mắt là do các yếu tố hoàn toàn bình thường như sau:</p><ul><li><strong>Thời gian ở trong bụng mẹ:</strong> Do chó con chỉ phát triển trong bụng mẹ trong một khoảng thời gian ngắn, chúng sinh ra chưa đủ phát triển để mở mắt ngay lập tức.</li><li><strong>Sự phát triển của não bộ:</strong> Chó giống như tất cả động vật có vú, được nuôi dưỡng bằng sữa mẹ và trải qua các giai đoạn phát triển não bộ đặc biệt. Mắt của chó con sẽ mở ra khi não bộ phát triển đến một trạng thái nhất định, điều này liên quan chặt chẽ với sự trưởng thành của hệ thống thần kinh.</li><li><strong>Sự phát triển của cơ thể:</strong> Mỗi loài động vật có vú có thời gian tự chủ và rời bỏ mẹ ở các độ tuổi khác nhau, dựa vào sự phát triển cơ bản và cần thiết của cơ thể.</li></ul><h3><strong>Phòng bệnh khi chăm sóc chó con mới đẻ</strong></h3><p>Đây là giai đoạn nhạy cảm đối với chó con. Khi chó con mới lớn lên và bắt đầu ăn thức ăn thường, mức độ kháng thể từ sữa mẹ bắt đầu giảm. Để bảo vệ chó con khỏi các bệnh, tiêm phòng cho chó là rất quan trọng. Tuy nhiên, việc tiêm chủng quá sớm có thể bị kháng lại bởi kháng thể từ mẹ, làm giảm hiệu quả của vắc-xin. Giai đoạn này yêu cầu sự chăm sóc chó con mới sinh đặc biệt và kiên nhẫn.</p><ul><li><strong>Tiêm phòng là giải pháp tốt nhất:</strong> Tiêm phòng là cách hiệu quả nhất để bảo vệ chó con khỏi các bệnh. Vắc-xin mới được nghiên cứu và phát triển đang mang lại hi vọng cho việc chăm sóc chó con tốt hơn trong giai đoạn đầu đời.</li><li><strong>Phòng chống rối loạn tiêu hóa:</strong> Chó con có thể gặp vấn đề với tiêu hóa nếu chúng ăn phải các chất không tốt từ chó mẹ. Để phòng tránh, hãy: Vệ sinh sạch sẽ cho chó mẹ, đặc biệt là sau khi sinh (2 tiếng vệ sinh 1 lần là tốt nhất). Cung cấp men tiêu hóa cho chó con. Theo dõi chó con và ngăn chúng bú liếm bộ phận sinh dục và hậu môn của nhau. Đảm bảo chó con được bú sữa mẹ sạch sẽ, không bị viêm nhiễm.</li><li><strong>Ngăn chặn các vấn đề về hô hấp:</strong> Chó con cũng dễ bị các vấn đề về hô hấp. Để tránh: Vệ sinh thường xuyên cho chó mẹ. Giữ môi trường ổ đẻ sạch sẽ và thoáng đãng. Thay ổ lót thường xuyên, 1-3 tiếng 1 lần, vì con con đái rất nhiều. Theo dõi chó con và đảm bảo chúng không bị ảnh hưởng bởi các nguyên nhân gây bệnh. Nếu không làm tốt, chỉ cần 1 con bị đi ngoài hoặc viêm phổi, thì mầm bệnh này sẽ lây lan ra và các con khác sẽ bị theo.</li><li><strong>Chứng trụy tim đột tử ở chó con mới đẻ:</strong> Đột tử ở chó con là một vấn đề nghiêm trọng. Nguyên nhân có thể do: Chó con bị cảm lạnh, cảm nóng không thể điều hòa thân nhiệt thích ứng, hạ đường huyết đột ngột do bị đói, quá tham ăn mà bú no sặc sữa vào khí quản, do chó mẹ áp, đè bịt tắc mũi chó con gây ngạt thở, do chó con có vấn đề tim mạch sau khi sinh. Để tránh: Giữ chó con ấm áp và thoáng đãng, cung cấp thức ăn đủ và sạch sẽ, theo dõi chó con và ngăn chúng tiếp xúc với các nguyên nhân gây bệnh. Khi có dấu hiệu bất thường, liên hệ với bác sĩ thú y.</li></ul><h3><strong>Chế độ cai sữa, ăn dặm cho chó con</strong></h3><p>Chó con nên tăng khoảng 10% trọng lượng mỗi ngày. Điều này phụ thuộc vào giống chó và kích thước của chúng. Chế độ ăn dặm chăm sóc chó con mới đẻ đang bú sữa là một quá trình quan trọng và cần sự chăm sóc đặc biệt. Bằng cách tuân thủ lịch trình trên và lắng nghe nhu cầu của chó con, bạn sẽ đảm bảo chúng phát triển mạnh mẽ và khỏe mạnh. Đừng quên luôn tập trung vào chất lượng và sự đa dạng của thức ăn, cùng với việc duy trì sự hỗ trợ từ sữa mẹ trong suốt quá trình này.</p><ol><li><strong>Giai đoạn đầu đời:</strong> Khám phá hương vị đầu tiên<ul><li><strong>Ngày 1-14</strong>: Tại giai đoạn này, sữa mẹ là nguồn dinh dưỡng duy nhất và quan trọng nhất cho chó con. Tránh cho chó con tiếp xúc với thức ăn khác, bởi họ có thể từ chối sữa mẹ chứa kháng thể quý giá.</li><li><strong>Ngày 15-20</strong>: Bắt đầu giới thiệu sữa dê tươi, hâm nóng ở nhiệt độ thân thể chó con. Đây là bước đầu tiên để chó con làm quen với thức ăn khác ngoài sữa mẹ.</li></ul></li><li><strong>Giai đoạn chuyển giao: Từ sữa đến thức ăn rắn</strong><ul><li><strong>Ngày 20-25</strong>: Đưa cháo gạo kết hợp thịt xay hoặc thịt băm nhỏ vào chế độ ăn của chó con. Đảm bảo rằng thức ăn được chế biến đúng cách, mềm và dễ tiêu hóa.</li><li><strong>Ngày 25-30</strong>: Dần dà tăng lượng thức ăn và giảm lượng sữa. Đồng thời, bổ sung vitamin và khoáng chất cần thiết như Cloruacanxi để đảm bảo chó con phát triển mạnh mẽ.</li></ul></li><li><strong>Giai đoạn phát triển:</strong> Đa dạng thức ăn hơn<ul><li><strong>Ngày 30 trở đi</strong>: Đa dạng hóa thực đơn với khoai tây, rau xanh và tăng lượng thịt. Bổ sung vitamin A, D và các chất khoáng khác để giúp chó con phát triển toàn diện.</li><li><strong>Dưới 120 ngày tuổi</strong>: Đảm bảo chó con được ăn đủ 5 bữa mỗi ngày. Từ 4-6 tháng tuổi, giảm xuống còn 4 bữa/ngày và từ 6 tháng trở lên, chỉ cần 2-3 bữa/ngày.</li></ul></li></ol><p><strong>Lưu ý khi cai sữa: </strong>Trong quá trình chăm sóc chó con mới đẻ, nên tiếp cho chúng tục bú mẹ ít nhất 2 giờ/lần trong 2 tuần đầu. Từ 3-4 tuần tuổi, bạn có thể giới thiệu thức ăn dành cho chó con. Đảm bảo thức ăn mềm và dễ tiêu hóa. Vào khoảng 5-6 tuần, chó mẹ thường tự động cai sữa chó con do chúng đã bắt đầu có hàm răng sắc khỏe.</p><p>Chăm sóc chó con mới đẻ yêu cầu sự kiên nhẫn, tình yêu và sự hiểu biết về nhu cầu đặc biệt của chúng. Từ việc chăm sóc đến huấn luyện, mỗi bước trên hành trình này đều đem lại niềm vui và thách thức. Hãy nhớ tìm kiếm sự hỗ trợ và tư vấn từ các chuyên gia thú y để đảm bảo chó con của bạn phát triển mạnh mẽ và khỏe mạnh.</p>'),(23,12,'2023-12-16','Mèo cảnh','Chỉ từng bước cách cắt móng cho mèo dễ dàng','close-up-portrait-beautiful-cat.jpg','Cắt móng cho mèo không chỉ giúp giữ cho đồ vật trong nhà của bạn khỏi bị trầy xước mà còn là một phần quan trọng của việc chăm sóc sức khỏe của miu cưng. Mặc dù mèo tự nhiên thích chăm sóc bản thân và thường thể hiện sự độc lập, việc cắt móng cho mèo đôi khi có thể trở thành thách thức.','<h3><strong>Khi nào cần phải cắt móng cho mèo?</strong></h3><p>Thời điểm thích hợp nào để cắt móng cho mèo? Bạn cần chú ý đến mức độ dài của móng và biết đến những tác động khi móng mèo quá dài có thể gây ra.</p><ol><li><strong>Bao lâu thì bạn nên cắt móng cho mèo?</strong> Phần lớn mèo nuôi trong nhà cần cắt móng mỗi tuần. Đối với mèo con, vì móng của chúng mọc nhanh, việc cắt móng có thể cần thực hiện 1 tuần 1 lần. Tuy nhiên, một số mèo trưởng thành chỉ cần cắt móng mỗi tháng. Đối với mèo sống bên ngoài, móng sắc là một phần quan trọng giúp chúng tự vệ, nên việc cắt móng có thể chỉ cần thiết vài lần mỗi năm.</li><li><strong>Khi nào móng của mèo quá dài?</strong> Một số dấu hiệu cho thấy móng của mèo đã quá dài và cần được cắt: Mèo không thể rút móng vào hoàn toàn. Móng vuốt cong vút. Móng có độ sắc bén<strong>.</strong></li><li><strong>Điều gì xảy ra nếu móng mèo của tôi quá dài?</strong> Việc để móng mèo mọc quá dài không chỉ gây phiền toái mà còn có thể gây ra các vấn đề sức khỏe:<ul><li>Móng cong vào và tổn thương miếng đệm chân, gây đau đớn cho mèo.</li><li>Thay đổi cách mèo di chuyển, có thể ảnh hưởng đến xương và khớp dài hạn.</li><li>Móng dễ bị mắc kẹt trong thảm, vòng cổ hoặc đồ đạc, tạo ra nguy cơ chấn thương.</li><li>Gây hại cho đồ đạc trong nhà hoặc thậm chí là chủ nhân của chúng.</li></ul></li></ol><p>Như vậy, việc duy trì độ dài móng phù hợp cho mèo không chỉ là vấn đề thẩm mỹ mà còn ảnh hưởng trực tiếp đến sức khỏe và chất lượng cuộc sống của chúng. Đừng bỏ qua việc cắt móng đúng cách và đúng thời điểm để mèo của bạn luôn khỏe mạnh.</p><h3><strong>Có nên cắt móng cho mèo hay không?</strong></h3><p>Những câu hỏi như cắt móng cho mèo có đau không? Có nên cắt móng cho mèo con không là một chủ đề được nhiều người quan tâm. Mặc dù có những lợi ích rõ ràng từ việc cắt móng cho mèo, nhưng cũng có những quan ngại và nguy cơ:</p><ul><li><strong>Lý do nên thực hiện:</strong> Mèo với móng sắc có thể gây hại cho đồ đạc, như ghế sofa, và thậm chí có thể gây thương tích cho người, đặc biệt là trẻ nhỏ. Nếu móng mèo mọc quá dài, chúng có thể cong vào và đâm vào đệm chân của mèo, gây đau và nhiễm trùng. Móng dài có thể làm thay đổi cách mèo di chuyển và gây áp lực lên các khớp. Mèo thường thích cắn móng hoặc chơi đùa, và móng sắc có thể gây tổn thương cho bản thân chúng.</li><li><strong>Lý do gây quan ngại: </strong>Móng sắc là một phần quan trọng giúp mèo tự vệ. Mèo hay đi lang thang hoặc ở nơi có nguy cơ gặp mối đe dọa cần giữ móng sắc. Mèo sử dụng móng của mình để leo, cào và thực hiện nhiều hành vi tự nhiên khác. Một số mèo rất căng thẳng và lo lắng khi được cắt móng, và việc này có thể gây stress cho chúng. Việc cắt nhầm vào phần sống của móng có thể gây đau và chảy máu.</li></ul><h3><strong>Cách chọn và dùng kìm cắt móng cho mèo</strong></h3><p>Khi chăm sóc cho mèo của bạn, việc chọn dụng cụ phù hợp để cắt móng cho mèo là một quyết định quan trọng. Dựa vào nhu cầu của bạn và tính cách của mèo, bạn có thể chọn ra sản phẩm kìm cắt móng cho mèo<a href=\"https://www.petmart.vn/danh-muc/meo/kem-cat-mong-meo\"> </a>phù hợp nhất.</p><p>Một số con mèo có thể phản ứng mạnh mẽ với tiếng ồn hoặc cảm giác mới, vì vậy hãy lựa chọn dụng cụ kìm cắt móng cho mèo phù hợp với tính cách của chúng. Đối với người mới bắt đầu nuôi mèo, một dụng cụ đơn giản và dễ sử dụng có thể là lựa chọn tốt nhất:</p><ul><li><strong>Dụng cụ kiểu kéo</strong>: Như của BOBO, thiết kế giống như những chiếc kéo nhỏ, nó dễ sử dụng và phù hợp với nhiều người chăm sóc mèo. Với cấu trúc rãnh đặc trưng, loại này giúp cắt móng một cách dễ dàng mà không cần áp dụng quá nhiều lực.</li><li><strong>Dụng cụ bấm móng</strong>: Ví dụ như của PAW, có một lỗ nhỏ dành cho móng, sau đó lưỡi dao sẽ trượt qua để cắt. Mặc dù sắc bén và bền, nhưng nó có thể không phù hợp với mọi mèo, đặc biệt là những con mèo nhút nhát hoặc không kiên nhẫn.</li><li><strong>Kìm (kềm) cắt móng</strong>: Ví dụ như DELE, được trang bị lò xo, giúp cắt móng dày hoặc cứng một cách dễ dàng. Kiểu kìm này thường phù hợp cho những con mèo có móng dày hoặc chắc.</li><li><strong>Máy mài móng</strong>: Thương hiệu nổi tiếng là JOYU. không chỉ cắt móng mà còn giúp mài móng cho mèo, tạo ra bề mặt móng mịn màng. Tuy nhiên, tiếng ồn từ máy có thể khiến một số mèo cảm thấy lo lắng. Đối với mèo nhạy cảm, bạn cần dành thời gian để làm quen và trấn an chúng trước khi sử dụng.</li></ul><h3><strong>Hướng dẫn cách cắt móng cho mèo tại nhà</strong></h3><p>Mặc dù cắt móng là một nhiệm vụ cần thiết, nhưng việc này cũng đòi hỏi sự kiên nhẫn và nhẹ nhàng. Hãy nhớ rằng mèo cảm thấy an toàn và thoải mái sẽ giúp việc cắt móng trở nên dễ dàng hơn. Dưới đây là hướng dẫn từng bước cách cắt móng cho mèo tại nhà giúp bạn thực hiện việc này một cách an toàn.</p><h3><strong>Từng bước quy trình cắt móng cho mèo</strong></h3><p>Hãy quan sát kỹ trước khi cắt móng cho mèo. Bạn cần xác định được phần móng cần cắt, tránh cắt sâu quá vào phần tủy. Bạn sẽ thấy một khu vực màu hồng hoặc trắng đục khác hẳn với các khu vực móng hơi trong xung quanh. Khu vực này là mấu thịt ở móng. Nếu cắt phạm vào phần này sẽ khiến mèo bị đau và chảy máu nhiều. Tốt nhất, bạn nên để lại một khoảng nhỏ tầm 1mm. Bạn có thể dũa và mài để móng mèo đỡ sắc nhọn hơn.</p><ol><li><strong>Chuẩn bị đồ nghề:</strong> Trước hết, bạn cần chuẩn bị đầy đủ dụng cụ. Đảm bảo có kìm cắt móng cho mèo hoặc máy mài móng, đồ ăn bánh thưởng cbho mèo, bột cầm máu (hoặc bột mì, bột bắp), khăn (để quấn mèo nếu cần) và một người trợ giúp nếu mèo hơi dữ.</li><li><strong>Chọn địa điểm yên tĩnh:</strong> Để giảm căng thẳng cho mèo, chọn một nơi yên tĩnh trong nhà, tránh xa những tiếng động lạ. Hãy thử bế mèo ở nhiều tư thế khác nhau để xem tư thế nào phù hợp nhất.</li><li><strong>Chọn móng cần cắt:</strong> Khi đã tìm được tư thế thoải mái, hãy nhấc một chân của mèo và ấn nhẹ để móng vuốt kéo dài ra. Tìm phần màu trắng của móng để biết chỗ cần cắt.</li><li><strong>Cắt móng ở góc 45 độ:</strong> Để móng mèo không bị gãy hoặc vỡ ra khi cắt, bạn nên cắt ở góc 45 độ, giữ móng ở tư thế tự nhiên.</li><li><strong>Cắt từng chút một:</strong> Cắt từ phần đỉnh của móng, tránh cắt vào phần màu hồng bên trong móng. Lưu ý hãy làm thật từ tốn và chậm rãi, mèo sẽ cảm thấy đau nếu móng bị chảy máu.</li><li><strong>Cắt phần còn lại của móng vuốt mèo:</strong> Tiếp tục cắt lần lượt từng móng, đặc biệt chú ý đến móng sương mù ở bàn chân trước, vì nếu không cắt, chúng có thể mọc cong và gây tổn thương. Nếu mèo cảm thấy không thoải mái, bạn có thể chia việc cắt móng thành nhiều lần, thay vì cắt hết trong một lần.</li><li><strong>Thưởng cho mèo:</strong> Để giúp mèo có trải nghiệm tốt hơn trong những lần sau, bạn có thể thưởng cho mèo một ít đồ ăn hoặc súp thưởng cho mèo sau mỗi lần cắt móng.</li></ol>'),(25,12,'2024-01-02','Mèo cảnh','Cách sử dụng thuốc tẩy giun cho mèo hiệu quả','9063ea33565453515e65453f17295555.jpg','Việc hiểu rõ về tẩy giun cho mèo, dấu hiệu, cách sử dụng thuốc tẩy giun cho mèo giúp điều trị, ngăn ngừa nhiễm giun ở mèo là điều quan trọng đối với mọi chủ nhân.','<h4><strong>Mèo thường bị nhiễm những loại giun nào?</strong></h4><p>Việc nhận biết và điều trị kịp thời các loại giun nhiễm trùng ở mèo là rất quan trọng để đảm bảo sức khỏe và phúc lợi cho chúng. Các chủ nhân mèo nên thường xuyên thăm <a href=\"https://www.petmart.vn/hoi-dap-thu-y-mien-phi\">thú y</a> để kiểm tra và điều trị tẩy giun cho mèo định kỳ, giúp ngăn chặn sự lây lan và ảnh hưởng của các loại giun này.</p><h4><strong>Giun đũa (Tapeworms)</strong></h4><p>Đây là loại ký sinh phổ biến nhất ở mèo. Bạn có thể nhìn thấy giun đũa trong phân của mèo trưởng thành. Trong khi đó mèo con thường mắc phải giun từ sữa mẹ.</p><p>Giun đũa là loại giun dài và mảnh, thường bám vào và tấn công ruột của mèo. Giun đũa có nhiều đốt, mỗi đốt có cơ quan sinh sản riêng. Chúng thường được phát hiện khi thấy các đốt giun, trông giống hạt gạo, trong phân mèo. Có nhiều loại giun đũa, tùy thuộc vào vật chủ từ bọ chét đến động vật gặm nhấm. Mèo có thể bị nhiễm khi bị bọ chét cắn hoặc ăn phải động vật nhiễm giun. Một số loại giun đũa thường gặp ở mèo bao gồm <a href=\"https://g.co/kgs/7E5CNE\">Dipylidium caninum</a> (do bọ chét truyền) và <a href=\"https://g.co/kgs/bgcFRj\">Taenia taeniaeformis</a> (nhiễm từ chuột).</p><h4><strong>Giun tròn (Roundworms)</strong></h4><p>Mặc dù chúng khá hiếm, tuy nhiên giun tròn sống ký sinh trong phổi lại rất nguy hiểm. Chúng có thể gây ảnh hưởng đến phổi của mèo con. Nguyên nhân thường do mèo tiếp xúc với động vật bị nhiễm bệnh như chuột hay chim.</p><p>Giun tròn là loại giun phổ biến nhất ở cả mèo và chó, ảnh hưởng đến ruột của mèo. Hầu hết mèo đều bị nhiễm giun tròn trong đời, đặc biệt là khi còn là mèo con. Mèo có thể bị nhiễm qua việc ăn phải trứng giun, ăn chuột nhiễm bệnh, hoặc uống sữa từ mẹ bị nhiễm. Hai loại giun tròn phổ biến ở mèo là &nbsp;Toxocara và &nbsp;Toxascaris leonina. Mèo con thường bị nhiễm từ sữa mẹ.</p><h4><strong>Giun móc (Hookworms)</strong></h4><p>Mặc dù giun móc thường gặp ở chó nhiều hơn. Tuy nhiên không phải không ảnh hưởng đến mèo. Giun móc sẽ tấn công vào ruột non của mèo khi chúng ăn phải những con vật mắc bệnh.</p><p>Giun móc là loại ký sinh trùng ảnh hưởng đến đường tiêu hóa của mèo, thường là niêm mạc ruột. Chúng hút máu mèo và lây lan qua phân và đất nhiễm khuẩn. Giun móc rất nguy hiểm, đặc biệt với mèo con, vì chúng có thể gây chảy máu đường ruột, dẫn đến tử vong. Các loại giun móc thường gặp ở mèo bao gồm Ancylostoma tubaeforme và Uncinaria stenocephala.</p><h4><strong>Sân dây và các loại giun khác</strong></h4><p>Sán dây gặp khá phổ biến ở mèo và có thể nhìn thấy trên lông của mèo con đặc biệt là quanh khu vực hậu môn, nguyên nhân chính của việc này là do bọ chét. Giun chỉ là loại giun thường gặp, mèo có thể sẽ bị ảnh hưởng đến toàn bộ hệ thống tim mạch và có thể dẫn đến suy tim.</p><h4><strong>Nguyên nhân khiến cho mèo bị giun sán</strong></h4><p>Chăm sóc tốt cho mèo, từ việc giữ vệ sinh môi trường sống đến việc tẩy giun cho mèo định kỳ, sẽ giúp giảm thiểu rủi ro nhiễm giun sán, đảm bảo một cuộc sống khỏe mạnh và hạnh phúc cho thú cưng của bạn.</p><p>Môi trường sống là một trong những yếu tố chính ảnh hưởng đến nguy cơ mèo bị nhiễm giun. Mèo sống ngoài trời có nguy cơ cao hơn so với mèo sống trong nhà, nhưng mèo sống trong nhà cũng không hoàn toàn an toàn. Có nhiều cách khiến mèo có thể nhiễm giun, bao gồm:</p><ul><li><strong>Tẩy giun không đúng cách:</strong> Việc không điều trị và tẩy giun cho mèo đúng cách cho mèo có thể dẫn đến các rủi ro nghiêm trọng như tắc nghẽn ruột, tắc nghẽn dòng máu của tim, viêm động mạch và thậm chí tử vong.</li><li><strong>Từ lúc sinh ra:</strong> Mèo con có thể nhiễm giun từ mẹ, đặc biệt là khi bú sữa mẹ sau khi sinh.</li><li><strong>Từ môi trường:</strong> Giun lây qua phân của động vật bị nhiễm. Nếu mèo tiếp xúc với phân nhiễm, đất, cỏ, thức ăn hoặc nước ô nhiễm, chúng có nguy cơ bị nhiễm giun.</li><li>Môi trường sống sạch sẽ, tẩy giun cho mèo mẹ và các mèo khác, làm sạch hộp đựng cát định kỳ và giữ cho mèo không bị nhiễm bọ chét có thể giảm thiểu nguy cơ nhiễm giun đường tiêu hóa cho mèo con.</li><li><strong>Qua con mồi:</strong> Vì thỏ, chuột và các con mồi nhỏ khác có thể là vật chủ cho giun ký sinh, mèo săn mồi có nguy cơ cao bị nhiễm giun.&nbsp;Mèo có thể dễ dàng bị nhiễm giun nếu chúng có lối sống ngoài trời hoặc vừa sống trong nhà vừa ra ngoài. Các hoạt động như săn và ăn chuột nhiễm bệnh, tiếp xúc với bọ chét từ mèo khác, tiếp xúc với phân của mèo bị nhiễm bệnh, ăn thức ăn ô nhiễm, đi chân trên đất chứa trứng hoặc ấu trùng giun rồi tự vệ sinh có thể làm tăng nguy cơ nhiễm giun.</li><li><strong>Từ ve, bọ chét:</strong> Một số loại ve, bọ chét là vật truyền bệnh cho một số loại giun, như giun đũa.</li><li><strong>Qua thức ăn:</strong> Thịt sống hoặc chưa nấu chín có thể nhiễm giun đũa.</li></ul><h4><strong>Phương pháp chuẩn đoán mèo nhiễm giun</strong></h4><p>Quá trình chẩn đoán thường mất ít hơn 24 giờ. Việc chọn một phòng khám có dịch vụ chẩn đoán nhanh chóng là quan trọng để đảm bảo rằng mèo của bạn nhận được điều trị kịp thời và hiệu quả. Việc chậm trễ trong chẩn đoán có thể làm tăng nguy cơ biến chứng và ảnh hưởng xấu đến sức khỏe của mèo.</p><ol><li><strong>Nhận biết nhanh dấu hiệu giun ở mèo: </strong>Giun sán ở mèo có thể biểu hiện qua nhiều dấu hiệu khác nhau. Đôi khi, bạn có thể thấy giun hoặc các hạt trắng nhỏ bám quanh hậu môn của mèo hoặc trong phân của chúng. Mèo cũng có thể trườn trên sàn nhà, thảm, hoặc giường. Những biểu hiện như tiêu chảy và rối loạn đường tiêu hóa cũng là dấu hiệu cảnh báo về sự nhiễm giun.</li><li><strong>Xét nghiệm phân để chẩn đoán giun: </strong>Nếu bạn nghi ngờ mèo của mình bị nhiễm giun, điều quan trọng là phải đưa chúng đến thăm bác sĩ thú y. Bác sĩ thú y sẽ tiến hành xét nghiệm phân để xác định chính xác loại giun mà mèo đang mắc phải. Việc này cực kỳ quan trọng vì các loại giun khác nhau đòi hỏi các phương pháp điều trị khác nhau.</li></ol><p>Có hai loại xét nghiệm phân mà bạn có thể yêu cầu. Mỗi xét nghiệm đều yêu cầu một mẫu phân nhỏ từ mèo, mà bác sĩ sẽ gửi đến phòng thí nghiệm để đánh giá:</p><ul><li><strong>Xét nghiệm phân tìm trứng và ký sinh trùng</strong>: Loại xét nghiệm này hiệu quả trong việc xác định giardia, coccidia và các loại giun khác.</li><li><strong>Xét nghiệm PCR phân</strong>: Phương pháp này cung cấp thông tin chi tiết hơn về nhiễm khuẩn, vi-rút, cùng với các loại giun.</li></ul><h4><strong>Dấu hiệu triệu chứng mèo bị giun thường gặp</strong></h4><p>Giun sán là một vấn đề sức khỏe phổ biến ở mèo. Việc nhận biết sớm các dấu hiệu có thể giúp bạn đưa ra biện pháp điều trị tẩy giun cho mèo kịp thời. Dưới đây là các dấu hiệu chính giúp bạn nhận biết mèo của mình có thể đã bị nhiễm giun:</p><ul><li><strong>Bụng to hơn bình thường</strong>: Sưng bụng là một trong những dấu hiệu phổ biến của giun sán.</li><li><strong>Bỏ ăn, giảm cân</strong>: Mất hứng thú với thức ăn. Dù có ăn uống đầy đủ nhưng mèo vẫn giảm cân.</li><li><strong>Nôn mửa và tiêu chảy</strong>: Các vấn đề về đường tiêu hóa và nhầy trong phân thường xảy ra do sự xâm nhập của giun.</li><li><strong>Ho, khạc, hoặc thở khò khè</strong>: Đặc biệt nếu giun ảnh hưởng đến phổi.</li><li><strong>Bộ lông xỉn màu</strong>: Lông của mèo trở nên xỉn màu, thiếu sức sống. Biểu hiện của việc thiếu dinh dưỡng.</li><li><strong>Vấn đề về da</strong>: Nổi mẩn, ngứa ngáy hoặc kích ứng. Da tái nhợt là biểu hiện của thiếu máu.</li><li><strong>Lừ đừ, uể oải</strong>: Sự thay đổi về năng lượng và hoạt động.</li><li><strong>Hạch trắng trong phân</strong>: Một dấu hiệu cụ thể của giun đũa.</li><li><strong>Thiếu máu và Suy dinh dưỡng</strong>: Do giun hút chất dinh dưỡng từ mèo.</li><li><strong>Thay đổi trong khẩu phần ăn</strong>: Ăn quá nhiều hoặc mất cảm giác thèm ăn.</li><li><strong>Mèo bị nhiễm giun nặng</strong>: Có thể gặp phải giảm cân đáng kể, kích ứng ở hậu môn và suy giảm sức khỏe tổng thể.</li></ul><h4><strong>Các loại thuốc tẩy giun cho mèo hiệu quả</strong></h4><p>Chọn lựa thuốc tẩy giun cho mèo (Cat Dewormers &amp; Worm Medicine) phù hợp là một việc quan trọng. Thuốc tẩy giun thường là sự kết hợp của nhiều loại thuốc nhắm vào nhiều loại giun khác nhau. Lựa chọn thuốc phụ thuộc vào tuổi và cân nặng của mèo. Khi mua thuốc tẩy giun cho mèo, hãy chọn những thương hiệu uy tín.</p><p>Chúng tôi đã lựa chọn sản phẩm dựa trên các tiêu chí an toàn, hiệu quả, số lượng ký sinh trùng được nhắm đến và dễ sử dụng. Dưới đây là danh sách các loại thuốc tẩy giun cho mèo hiệu quả và được khuyên dùng:</p><ol><li><strong>BAYER Drontal Broad Spectrum Dewormer</strong>: Hiệu quả loại bỏ nhiều loại giun móc, giun đũa, giun dẹp, giun tròn, sán dây ký sinh, an toàn và đáng tin cậy. Sử dụng cho mèo con trên 2 tháng tuổi. Sử dụng 1 viên cho thể trọng 4kg. Có thể cho mèo ăn trực tiếp hoặc trộn lẫn vào thức ăn. Chống chỉ định với mèo đang mang thai. Mua Thuốc xổ giun cho mèo BAYER Drontal Cat tại đây.</li><li><strong>ELANCO Tapeworm Dewormer Tablets for Cats</strong>: Viên nhai giúp loại bỏ giun đũa. Được đánh giá cao về hiệu quả nhanh chóng, dễ dàng sử dụng, giá cả phải chăng và kết quả nhanh chóng.</li><li><strong>ADVANTAGE Multi Topical Solution for Cats</strong>: Thuốc dạng bôi hàng tháng kiểm soát bọ chét, ngăn ngừa nhiễm sán tim và diệt các loại giun sán khác.</li><li><strong>REVOLUTION Topical Solution for Cats</strong>: Giải pháp hàng tháng hiệu quả chống lại sán tim, bọ chét và các loại ký sinh trùng khác.</li><li><strong>HOMEOPET Wrm Clear</strong>: Phương pháp điều trị nhẹ nhàng và tự nhiên, an toàn cho mèo.</li><li><strong>BRAVECTO Plus Topical Solution for Cats</strong>: Bảo vệ mèo khỏi bọ chét, ve, sán tim, giun đũa và giun móc.</li><li><strong>CENTRAGARD Topical for Cats</strong>: Giải pháp bôi rộng phổ ngăn chặn bệnh sán tim và điều trị nhiều loại giun sán.</li><li><strong>DRONCIT Tablets for Cats</strong>: Diệt giun đũa nhanh chóng trong vòng 24 giờ.</li><li><strong>INTERCEPTOR Flavor Tabs</strong>: Phòng ngừa sán tim và điều trị và kiểm soát giun đũa, giun móc và giun đốt trưởng thành.</li></ol><h4><strong>Hướng dẫn cách tẩy giun cho mèo tại nhà</strong></h4><p>Trước khi tẩy giun cho mèo tại nhà, hãy đảm bảo rằng mèo của bạn không có vấn đề sức khỏe như tiêu chảy hay nôn mửa. Điều này có thể ảnh hưởng đến hiệu quả của thuốc tẩy giun. Ngoài ra, hãy chắc chắn rằng bạn thực hiện đúng các bước và sử dụng thuốc phù hợp để đảm bảo mèo cưng của bạn luôn khỏe mạnh và hạnh phúc.</p><p>Cách cho mèo uống thuốc tẩy giun tại nhà:</p><ol><li><strong>Chuẩn bị thuốc tẩy giun</strong>: Chọn thuốc phù hợp với cân nặng và tình trạng sức khỏe của mèo. Đối với mèo con, hãy chọn những dung dịch tẩy giun đặc biệt dành cho mèo con.</li><li><strong>Tư thế cho mèo uống thuốc</strong>: Quỳ gối trên sàn, giữ mèo quay lưng về phía bạn. Sử dụng tay trái giữ xương hàm dưới của mèo, nghiêng đầu mèo lên.</li><li><strong>Thao tác cho mèo uống thuốc</strong>: Nếu là thuốc viên, chèn móng tay vào giữa hai hàm răng mèo và đẩy thuốc xuống cổ họng. Đối với thuốc nước, dùng ống nhỏ giọt hoặc ống tiêm nhỏ thuốc vào miệng mèo.</li><li><strong>Mẹo cho mèo uống thuốc</strong>: Bạn có thể nhét thuốc vào miếng thịt hoặc pho mát để mèo dễ nuốt hơn.</li><li><strong>Thận trọng khi thực hiện</strong>: Hành động cần nhanh chóng và dứt khoát, tránh ôm chặt mèo quá mức để mèo không cảm thấy bất an.</li></ol><h4><strong>Khuyến cáo lịch tẩy giun cho mèo định kỳ</strong></h4><p>Lập kế hoạch lên lịch tẩy giun cho mèo định kỳ là một bước quan trọng trong việc chăm sóc sức khỏe cho mèo cưng của bạn. Hãy đảm bảo rằng bạn tuân thủ lịch trình phù hợp để giúp mèo cưng của bạn tránh xa các vấn đề sức khỏe do giun sán gây ra.</p><h3><strong>Lịch tẩy giun cho mèo con</strong></h3><ul><li><strong>Từ 3 tuần tuổi:</strong> Bắt đầu tẩy giun khi mèo con được 3 tuần tuổi, sau đó tẩy lại mỗi 2 tuần cho đến khi mèo được 3 tháng tuổi.</li><li><strong>Từ 3 tháng đến 6 tháng tuổi:</strong> Tẩy giun mỗi tháng một lần.</li><li><strong>Mèo mới mang về nhà:&nbsp;</strong>Thực hiện điều trị tẩy giun ngay lập tức và lặp lại sau 2 tuần, sau đó tuân theo lịch tẩy giun cho mèo theo độ tuổi.</li></ul><h4><strong>Lịch tẩy giun cho mèo trưởng thành</strong></h4><ul><li><strong>Mèo thường xuyên ở ngoài trời:</strong> Nên tẩy giun ít nhất mỗi 3 tháng một lần, hoặc hàng tháng nếu chúng thường xuyên tiếp xúc với môi trường ngoài trời.</li><li><strong>Mèo trong nhà có tiếp xúc với động vật hoang dã</strong>: Cũng nên tẩy giun ít nhất mỗi 3 tháng một lần.</li></ul><h4><strong>Lịch tẩy giun cho mèo mang thai và cho con bú</strong></h4><ul><li><strong>Mèo đang mang thai:</strong> Tẩy giun một lần trước khi giao phối và một lần nữa trước khi sinh khoảng 1 tuần.</li><li><strong>Mèo mẹ đang cho con bú:</strong> Tẩy giun cùng lúc với mèo con của nó.</li></ul><p>Lưu ý quan trọng: Xem xét tình trạng sức khỏe hiện tại của mèo để quyết định thời điểm tẩy giun cho mèo phù hợp. Luôn tham khảo ý kiến của bác sĩ thú y trước khi thực hiện tẩy giun, đặc biệt đối với mèo con, mèo ốm hoặc mèo già.</p>'),(26,12,'2024-01-02','Chó cảnh','Phân biệt chó chân vòng kiềng với chó bị hạ bàn','two-puppies-some-stone-steps.jpg','Chó chân vòng kiềng có lẽ không phải là trường hợp hiếm gặp. Bởi hầu hết các chú chó bị tật ở chân mà chúng ta biết đều được gọi là chó bị hạ bàn, chứ không phải vòng kiềng. Những chú chó mắc phải vấn đề này chân cong cong lại trông không thẩm mỹ chút nào cả. Vậy có cách nào để tránh tình trạng này không?','<h4><strong>Nguyên nhân khiến chó chân vòng kiềng và hạ bàn</strong></h4><p>Cún cưng ít có thời gian vận động, không được chủ dắt ra ngoài thường xuyên. Hằng ngày phải tiếp xúc với các bề mặt trơn trượt trong nhà. Khi tiếp xúc thường xuyên với bề mặt trơn. Chúng không thể bấu móng vào để di chuyển dẫn đến việc các bộ phận khác như cơ bắp, dây chằng, gân, xương bắt buộc phải biến dạng để thích nghi cho việc đi lại.</p><p>Chế độ ăn với các thành phần dinh dưỡng quá mức cần thiết. Nhiều người nuôi chó muốn cún cưng của mình lớn nhanh. To khỏe đã cho cún ăn nhiều bữa với số lượng thức ăn nhiều. Thậm chí nhiều người cho rằng càng bổ sung thật nhiều canxi càng tốt cho xương và hệ vận động của cún. Điều này vô tình làm chúng lên cân quá nhanh. Nhưng xương chân không được vận động nhiều hoặc không đúng cách sẽ phát triển không kịp. Không có khả năng chịu lực từ cơ thể dồn xuống.</p><p>Chó chân vòng kiềng cũng là do chúng ít vận động hoặc không được phơi nắng vào sáng sớm.</p><h4><strong>Dấu hiệu chó chân vòng kiềng</strong></h4><p>Chân có hiện tượng biến dạng vì chân yếu không đủ sức để chống cả cơ thể nặng nề bên trên. Lúc này chó đã bắt đầu lười vận động vì chân đau. Xương phải trên bị bè ra, đi lại khiến chúng thường bị run chân khi đứng hoặc đi lại khá đau đớn. Biểu hiện khá giống với trường hợp <a href=\"https://www.petmart.vn/cach-chua-tri-khi-cho-bi-trat-khop-xuong-banh-che\">chó bị trật khớp xương bánh chè</a>.</p><h4><strong>Lầm tưởng rằng chó bị hạ bàn</strong></h4><p>Nhiều người hiểu lầm khi chó chân vòng kiềng thì cứ nghĩ đó là bệnh <a href=\"https://www.petmart.vn/cach-chua-cho-bi-ha-ban-do-thieu-canxi-rat-hieu-qua\">chó bị hạ bàn</a>. Nên thường cho chó ăn để có thêm dinh dưỡng. Tăng cường lượng canxi thiếu hụt. Cách làm này không những không chữa được bệnh mà còn làm bệnh càng thêm trầm trọng hơn. Ăn càng nhiều, chó lên cân càng nhanh và dẫn theo đó là chân trước càng bị nặng hơn. Đồng thời dư thừa canxi còn gây nên các bệnh khác.</p><h4><strong>Cách phòng tránh tình trạng chó chân vòng kiềng</strong></h4><p>Trước khi đưa cún về nhà, bạn phải kiểm tra kĩ xem chân trước của chó con có gặp vấn đề gì không, nắn bóp ngay chỗ đầu gối chân trước xem chân có thẳng không.</p><p>Không cho chó đi lại nhiều trên sàn trơn trượt, hãy để chúng đi lại ở những nơi có độ ma sát như thảm, sân cỏ…</p><p>Có chế độ ăn hợp lý cộng với chế độ vận động vừa phải. Không cho chúng ăn quá nhiều, lượng dinh dưỡng nhất định, cho cún cưng đi dạo và chạy nhảy ở mức độ nhất định. Cho cún đi phơi nắng vào sáng sớm để bổ sung <a href=\"https://en.wikipedia.org/wiki/Vitamin_D\">vitamin D</a>.</p><h4><strong>Cách điều trị khi chó chân vòng kiềng</strong></h4><p>Không cho chúng tiếp xúc với sàn trơn nữa. Áp dụng chế độ giảm cân cho cún. Để kìm hãm độ phát triển của chó. Đồng thời tạo thời gian cho xương chân hồi phục và phát triển.</p><p>Nếu chó chân vòng kiềng nặng thì đưa chúng đến bác sĩ <a href=\"https://www.petmart.vn/hoi-dap-thu-y-mien-phi\">thú y</a> để tiến hành nẹp chân, định hình lại xương. Tuyệt đối nên nghe theo lời khuyên và sự chữa trị của bác sĩ thú ý. Nếu tự nẹp chân cho chúng, nẹp lỏng sẽ không có tác dụng. Còn nẹp chặt sẽ khiến máu không lưu thông, làm tình trạng càng xấu đi hơn.</p><p>Chân rất quan trọng với một loài ưa vận động như loài chó. Hãy đảm bảo cún cưng của bạn có bốn chân vững chãi, chắc khỏe, để chúng được thoải mái vui chơi và nô đùa nhé. Chúc các bạn thành công trong việc nuôi dạy thú cưng của mình.</p>'),(27,12,'2024-01-02','Mèo cảnh','Chỉ từng bước cách cắt móng cho mèo dễ dàng','b46f4e2cd6f4bc62419e6ab516a733ba.jpg','Cắt móng cho mèo không chỉ giúp giữ cho đồ vật trong nhà của bạn khỏi bị trầy xước mà còn là một phần quan trọng của việc chăm sóc sức khỏe của miu cưng. Mặc dù mèo tự nhiên thích chăm sóc bản thân và thường thể hiện sự độc lập, việc cắt móng cho mèo đôi khi có thể trở thành thách thức.','<p>Nhưng đừng lo, với sự hướng dẫn từ chuyên gia <a href=\"https://www.petmart.vn/cham-soc-meo\">chăm sóc mèo</a> có kinh nghiệm hơn 10 năm tại <a href=\"https://www.petmart.vn/\">Pet Mart</a>, việc này sẽ trở nên dễ dàng hơn nhiều. Điều quan trọng là phải tiếp cận mèo một cách nhẹ nhàng và kiên nhẫn, sử dụng phần thưởng và kỹ thuật đúng cách. Hãy cùng xem cách cắt móng tay cho mèo, giúp việc này trở nên nhanh chóng và ít căng thẳng nhất có thể.</p><h4><strong>Khi nào cần phải cắt móng cho mèo?</strong></h4><p>Thời điểm thích hợp nào để cắt móng cho mèo? Bạn cần chú ý đến mức độ dài của móng và biết đến những tác động khi móng mèo quá dài có thể gây ra.</p><ol><li><strong>Bao lâu thì bạn nên cắt móng cho mèo?</strong> Phần lớn mèo nuôi trong nhà cần cắt móng mỗi tuần. Đối với mèo con, vì móng của chúng mọc nhanh, việc cắt móng có thể cần thực hiện 1 tuần 1 lần. Tuy nhiên, một số mèo trưởng thành chỉ cần cắt móng mỗi tháng. Đối với mèo sống bên ngoài, móng sắc là một phần quan trọng giúp chúng tự vệ, nên việc cắt móng có thể chỉ cần thiết vài lần mỗi năm.</li><li><strong>Khi nào móng của mèo quá dài?</strong> Một số dấu hiệu cho thấy móng của mèo đã quá dài và cần được cắt: Mèo không thể rút móng vào hoàn toàn. Móng vuốt cong vút. Móng có độ sắc bén<strong>.</strong></li><li><strong>Điều gì xảy ra nếu móng mèo của tôi quá dài?</strong> Việc để móng mèo mọc quá dài không chỉ gây phiền toái mà còn có thể gây ra các vấn đề sức khỏe:<ul><li>Móng cong vào và tổn thương miếng đệm chân, gây đau đớn cho mèo.</li><li>Thay đổi cách mèo di chuyển, có thể ảnh hưởng đến xương và khớp dài hạn.</li><li>Móng dễ bị mắc kẹt trong thảm, vòng cổ hoặc đồ đạc, tạo ra nguy cơ chấn thương.</li><li>Gây hại cho đồ đạc trong nhà hoặc thậm chí là chủ nhân của chúng.</li></ul></li></ol><p>Như vậy, việc duy trì độ dài móng phù hợp cho mèo không chỉ là vấn đề thẩm mỹ mà còn ảnh hưởng trực tiếp đến sức khỏe và chất lượng cuộc sống của chúng. Đừng bỏ qua việc cắt móng đúng cách và đúng thời điểm để mèo của bạn luôn khỏe mạnh.</p><h4><strong>Có nên cắt móng cho mèo hay không?</strong></h4><p>Những câu hỏi như cắt móng cho mèo có đau không? Có nên cắt móng cho mèo con không là một chủ đề được nhiều người quan tâm. Mặc dù có những lợi ích rõ ràng từ việc cắt móng cho mèo, nhưng cũng có những quan ngại và nguy cơ:</p><ul><li><strong>Lý do nên thực hiện:</strong> Mèo với móng sắc có thể gây hại cho đồ đạc, như ghế sofa, và thậm chí có thể gây thương tích cho người, đặc biệt là trẻ nhỏ. Nếu móng mèo mọc quá dài, chúng có thể cong vào và đâm vào đệm chân của mèo, gây đau và nhiễm trùng. Móng dài có thể làm thay đổi cách mèo di chuyển và gây áp lực lên các khớp. Mèo thường thích cắn móng hoặc chơi đùa, và móng sắc có thể gây tổn thương cho bản thân chúng.</li><li><strong>Lý do gây quan ngại: </strong>Móng sắc là một phần quan trọng giúp mèo tự vệ. Mèo hay đi lang thang hoặc ở nơi có nguy cơ gặp mối đe dọa cần giữ móng sắc. Mèo sử dụng móng của mình để leo, cào và thực hiện nhiều hành vi tự nhiên khác. Một số mèo rất căng thẳng và lo lắng khi được cắt móng, và việc này có thể gây stress cho chúng. Việc cắt nhầm vào phần sống của móng có thể gây đau và chảy máu.</li></ul><h4><strong>Cách chọn và dùng kìm cắt móng cho mèo</strong></h4><p>Khi chăm sóc cho mèo của bạn, việc chọn dụng cụ phù hợp để cắt móng cho mèo là một quyết định quan trọng. Dựa vào nhu cầu của bạn và tính cách của mèo, bạn có thể chọn ra sản phẩm <a href=\"https://www.petmart.vn/danh-muc/meo/kem-cat-mong-meo\">kìm cắt móng cho mèo</a> phù hợp nhất.</p><p>Một số con mèo có thể phản ứng mạnh mẽ với tiếng ồn hoặc cảm giác mới, vì vậy hãy lựa chọn dụng cụ kìm cắt móng cho mèo phù hợp với tính cách của chúng. Đối với người mới bắt đầu nuôi mèo, một dụng cụ đơn giản và dễ sử dụng có thể là lựa chọn tốt nhất:</p><ul><li><strong>Dụng cụ kiểu kéo</strong>: Như của <a href=\"https://www.petmart.vn/thuong-hieu/bobopet\">BOBO</a>, thiết kế giống như những chiếc kéo nhỏ, nó dễ sử dụng và phù hợp với nhiều người chăm sóc mèo. Với cấu trúc rãnh đặc trưng, loại này giúp cắt móng một cách dễ dàng mà không cần áp dụng quá nhiều lực.</li><li><strong>Dụng cụ bấm móng</strong>: Ví dụ như của <a href=\"https://www.petmart.vn/thuong-hieu/paw\">PAW</a>, có một lỗ nhỏ dành cho móng, sau đó lưỡi dao sẽ trượt qua để cắt. Mặc dù sắc bén và bền, nhưng nó có thể không phù hợp với mọi mèo, đặc biệt là những con mèo nhút nhát hoặc không kiên nhẫn.</li><li><strong>Kìm (kềm) cắt móng</strong>: Ví dụ như <a href=\"https://www.petmart.vn/thuong-hieu/dele\">DELE</a>, được trang bị lò xo, giúp cắt móng dày hoặc cứng một cách dễ dàng. Kiểu kìm này thường phù hợp cho những con mèo có móng dày hoặc chắc.</li><li><strong>Máy mài móng</strong>: Thương hiệu nổi tiếng là <a href=\"https://www.petmart.vn/thuong-hieu/joyu\">JOYU</a>. không chỉ cắt móng mà còn giúp mài móng cho mèo, tạo ra bề mặt móng mịn màng. Tuy nhiên, tiếng ồn từ máy có thể khiến một số mèo cảm thấy lo lắng. Đối với mèo nhạy cảm, bạn cần dành thời gian để làm quen và trấn an chúng trước khi sử dụng.</li></ul><h4><strong>Hướng dẫn cách cắt móng cho mèo tại nhà</strong></h4><p>Mặc dù cắt móng là một nhiệm vụ cần thiết, nhưng việc này cũng đòi hỏi sự kiên nhẫn và nhẹ nhàng. Hãy nhớ rằng mèo cảm thấy an toàn và thoải mái sẽ giúp việc cắt móng trở nên dễ dàng hơn. Dưới đây là hướng dẫn từng bước cách cắt móng cho mèo tại nhà giúp bạn thực hiện việc này một cách an toàn.</p><h4><strong>Từng bước quy trình cắt móng cho mèo</strong></h4><p>Hãy quan sát kỹ trước khi cắt móng cho mèo. Bạn cần xác định được phần móng cần cắt, tránh cắt sâu quá vào phần tủy. Bạn sẽ thấy một khu vực màu hồng hoặc trắng đục khác hẳn với các khu vực móng hơi trong xung quanh. Khu vực này là mấu thịt ở móng. Nếu cắt phạm vào phần này sẽ khiến mèo bị đau và chảy máu nhiều. Tốt nhất, bạn nên để lại một khoảng nhỏ tầm 1mm. Bạn có thể dũa và mài để móng mèo đỡ sắc nhọn hơn.</p><ol><li><strong>Chuẩn bị đồ nghề:</strong> Trước hết, bạn cần chuẩn bị đầy đủ dụng cụ. Đảm bảo có kìm cắt móng cho mèo hoặc máy mài móng, đồ ăn <a href=\"https://www.petmart.vn/banh-thuong-meo\">bánh thưởng cho mèo</a>, bột cầm máu (hoặc bột mì, bột bắp), khăn (để quấn mèo nếu cần) và một người trợ giúp nếu mèo hơi dữ.</li><li><strong>Chọn địa điểm yên tĩnh:</strong> Để giảm căng thẳng cho mèo, chọn một nơi yên tĩnh trong nhà, tránh xa những tiếng động lạ. Hãy thử bế mèo ở nhiều tư thế khác nhau để xem tư thế nào phù hợp nhất.</li><li><strong>Chọn móng cần cắt:</strong> Khi đã tìm được tư thế thoải mái, hãy nhấc một chân của mèo và ấn nhẹ để móng vuốt kéo dài ra. Tìm phần màu trắng của móng để biết chỗ cần cắt.</li><li><strong>Cắt móng ở góc 45 độ:</strong> Để móng mèo không bị gãy hoặc vỡ ra khi cắt, bạn nên cắt ở góc 45 độ, giữ móng ở tư thế tự nhiên.</li><li><strong>Cắt từng chút một:</strong> Cắt từ phần đỉnh của móng, tránh cắt vào phần màu hồng bên trong móng. Lưu ý hãy làm thật từ tốn và chậm rãi, mèo sẽ cảm thấy đau nếu móng bị chảy máu.</li><li><strong>Cắt phần còn lại của móng vuốt mèo:</strong> Tiếp tục cắt lần lượt từng móng, đặc biệt chú ý đến móng sương mù ở bàn chân trước, vì nếu không cắt, chúng có thể mọc cong và gây tổn thương. Nếu mèo cảm thấy không thoải mái, bạn có thể chia việc cắt móng thành nhiều lần, thay vì cắt hết trong một lần.</li><li><strong>Thưởng cho mèo:</strong> Để giúp mèo có trải nghiệm tốt hơn trong những lần sau, bạn có thể thưởng cho mèo một ít đồ ăn hoặc <a href=\"https://www.petmart.vn/sup-thuong-meo\">súp thưởng cho mèo</a> sau mỗi lần cắt móng.</li></ol><h4><strong>Cắt móng cho mèo bị chảy máu có sao không</strong></h4><p>Điều gì xảy ra nếu cắt vào phần nhanh của móng? Đôi khi, chúng ta có thể cắt phải phần nhanh của móng mèo, gây đau đớn và chảy máu cho mèo. Trong tình huống này, hãy giữ bình tĩnh và sử dụng bột cầm máu hoặc bột mì để ngăn chảy máu. Đừng cảm thấy tội lỗi, mọi người đều có thể mắc phải lỗi này. Quan trọng nhất là biết cách xử lý tình huống.</p><p>Khi không may cắt vào phần tủy của mèo và bị chảy máu đừng quá hoảng hót. Hãy bình tĩnh lấy bông gòn có chấm ít nước muối NaCl 0.9%, chấm chấm vào chỗ bị cắt đang chảy máu. Nếu không có nước muối bạn dùng nước sạch cũng được. Sau đó bạn nên bôi ít thuốc đỏ (<a href=\"https://vi.wikipedia.org/wiki/Povidone-iodine\">Povidine</a>) lên để sát trùng. Chỉ cần bạn vệ sinh sát trùng luôn lúc đó, thì cũng không ảnh hưởng quá nghiêm trọng đến sức khỏe của chúng.</p><p>Sau khi cắt xong, hãy đưa mèo những phần thưởng như đồ ăn vặt, mối quan tâm hoặc thời gian chơi để kết thúc trải nghiệm một cách tích cực. Điều này không chỉ giúp mèo liên kết việc cắt móng với những trải nghiệm tốt, mà còn giúp tăng cường mối quan hệ giữa bạn và mèo.</p><h4><strong>Mẹo cắt móng tay cho mèo từ chuyên gia</strong></h4><p>Đối với nhiều người nuôi mèo, việc cắt móng cho mèo là một nhiệm vụ đầy thách thức. Mèo thường không thích để móng của mình bị cắt, và nếu không thực hiện đúng cách, việc này có thể gây ra tổn thương cho mèo hoặc chủ mèo. Dưới đây là một số mẹo từ các chuyên gia giúp bạn thực hiện việc này một cách suôn sẻ:</p><ol><li><strong>Thực hành trước:</strong> Trước khi thực sự bắt tay vào việc cắt móng cho mèo, bạn nên thực hành việc duỗi móng và cho mèo làm quen với tiếng ồn của máy mài móng (nếu sử dụng). Điều này giúp mèo giảm sự căng thẳng.</li><li><strong>Giữ tinh thần thoải mái:</strong> Mèo có thể cảm nhận được tâm trạng của bạn. Hãy giữ tinh thần thoải mái và tự tin, mèo sẽ cảm thấy yên tâm hơn. Âm nhạc êm dịu giúp cả bạn và mèo thư giãn, tạo nên một không gian thoải mái khi cắt móng.</li><li><strong>Sử dụng</strong><a href=\"https://www.petmart.vn/co-meo\"><strong> Catnip cho mèo</strong></a><strong>:</strong><a href=\"https://vi.wikipedia.org/wiki/Pheromone\"> Pheromone</a> là một thành phần có trong Catnip, nó có thể giúp mèo thư giãn, giảm căng thẳng và giúp quá trình cắt móng trở nên dễ dàng hơn.</li><li><strong>Cân nhắc vị trí cắt móng:</strong> Bàn ủi có đệm có thể giúp bạn dễ dàng hơn trong việc cắt móng, giúp bạn có góc nhìn tốt hơn và kiểm soát mèo tốt hơn.</li><li>Kiềm chế mèo nhẹ nhàng: Việc sử dụng lực mạnh tay có thể khiến mèo cảm thấy bị đe dọa. Hãy ôm mèo một cách nhẹ nhàng và thoải mái. Nếu mèo bày tỏ dấu hiệu căng thẳng, hãy dừng lại và thử lại sau.</li></ol><p>Nhớ rằng, cắt móng cho mèo là một phần quan trọng trong việc chăm sóc sức khỏe và vệ sinh cho mèo. Với những mẹo trên, bạn sẽ cảm thấy tự tin hơn và mèo cũng sẽ cảm thấy thoải mái hơn khi đến giờ cắt móng. Chúc bạn và mèo có những giây phút thoải mái cùng nhau!</p>'),(28,12,'2024-01-02','Chó cảnh','4 mẫu cắt tỉa lông chó Poodle đẹp được ưa chuộng','647b88898a8a870d741f679f5b32308a.jpg','Hiện nay chúng có rất nhiều kiểu mẫu cắt tỉa lông chó Poodle. Liên minh những người nuôi chó giống và Hiệp hội chó giống thế giới đều có những chú thích rõ ràng về tiêu chuẩn cắt tỉa lông nhất định dành cho chó Poodle. ','<p><a href=\"https://www.petmart.vn/cho-poodle-tieu-chuan-thuan-chung-gia-ban-thi-truong\">Giống chó Poodle</a> với hình tượng là những quý cô xinh xắn, yêu kiều trong họ chó. Tên “<a href=\"https://www.petmart.vn/chuyen-muc/cho-canh/cho-poodle\">Pudel</a>” trong tiếng Đức. Nghĩa là “thợ lặn” hay là “chó nước”. Bộ lông của chúng có thể đè bẹp cơ thể khi ở trong nước. Phần lông còn lại che phủ các khớp và các bộ phận quan trọng. Nó giúp cho chúng không bị lạnh và bị tổn thương.</p><h4><strong>Mẫu cắt tỉa lông chó Poodle kiểu mặt Teddy Bear</strong></h4><p><a href=\"https://www.petmart.vn/cach-nuoi-cho-poodle-tot-nhat-phu-hop-voi-moi-gia-dinh\">Cách nuôi chó Poodle</a> và cắt tỉa lông cho chúng luôn nhận được sự quan tâm của người yêu động vật trên thế giới.&nbsp;Trong đó kiểu Teddy Bear cho chó Poodle. Là một tạo hình” độc đáo” đối với giống chó Poodle. Teddy Bear là khái niệm ám chỉ kiểu tạo hình cắt tỉa lông cho chó Poodle. Chứ không hề tồn tại giống “Teddy Bear” hay là “Tiny”.</p><p>Teddy bear nói chính xác hơn, là một hình thức hóa trang làm đẹp theo kiểu “gấu Teddy”. Những cuộc thi hóa trang cho Poodle thường thấy có: kiểu chó con (Puppy), kiểu vận động (Sporing), kiểu Châu Âu (Contlental), kiểu yên ngựa nước Anh (English Saddle), không có kiểu “gấu Teddy”. Teddy đại diện cho giống Poodle. Một “cái tên” có phong cách rất hoạt hình. Chó Poodle cũng phải được lựa chọn kỹ lưỡng mới có thể tạo hình Teddy. Mặt phải nhỏ, phần đầu phải tròn, miệng bé, mũi phải vừa ngắn vừa to, tai rủ xuống áp vào đầu. Ở vị trí tương đương hoặc thấp hơn tầm mắt, chó Poodle hóa trang thành Teddy bear sẽ càng đáng yêu và xinh đẹp hơn.</p><p>Teddy bear là thú cưng của mọi người. Không cần quá để ý đến kích thước so với Poodle. Không nên yêu cầu nghiêm khắc làm thế nào để có chất lượng cao. Mục đích chúng ta nuôi chó Poodle không phải để khoe khoang hay chạy theo mốt. Bởi lẽ với kiểu dáng như vậy những chú cún của chúng ta trở nên đáng yêu hơn bao giờ hết.</p><h4><strong>Mẫu cắt tỉa lông chó Poodle theo style tiểu yêu tinh</strong></h4><p>Phong cách tiểu yêu tinh từ lâu đã là mẫu cắt tỉa lông chó Poodle được ưa chuộng tại các nước Âu Mỹ. Phong cách này tạo cho chó Poodle vẻ ngoài tinh nghịch, lanh lợi. Nhấn mạnh cá tính khác nhau của từng chú chó.</p><h4><strong>Hướng dẫn từng bước</strong></h4><ol><li><strong>Bước 1:</strong> tắm sạch và sấy khô. Dùng kéo thẳng cắt ngắn lông trên lưng của chó.</li><li><strong>Bước 2:</strong> tỉa gọn quanh ngực và hai bên sườn. Tạo dáng bo tròn, chú ý tỉa đều và mịn.</li><li><strong>Bước 3:</strong> cắt bo tròn lông quanh 4 chân. Lưu ý lông ở các bộ phận có sự chuyển tiếp mềm mại.</li><li><strong>Bước 4:</strong> lấy eo làm ranh giới, cắt gọn lông ở thân sau. Tạo dáng bo tròn và bông xốp.</li><li><strong>Bước 5:</strong> tạo hình cho khuôn mặt thành hình bầu dục, tạo độ phồng nhất định. Chú ý an toàn khi tỉa lông quanh mắt.</li><li><strong>Bước 6:</strong> nhuộm lông ở hai tai và đuôi.</li></ol><h4><strong>Lưu ý thêm</strong></h4><p>Theo mẫu cắt tỉa lông chó Poodle này, người thợ Groomer cần chú ý khi tạo hình phần mặt và eo. Riêng phần eo được tạo hình thành “thắt lưng”. Giúp chó trông gọn gàng hơn. Lông hai bên mặt được cắt gọn, không để lông xù. Chú ý tạo hình tròn đều, bông xù trên đỉnh đầu. Tạo ấn tượng giống như một chú gấu bông nhỏ. Phong cách này được áp dụng với những chú chó lông xù dày. Cần chăm sóc, <a href=\"https://www.petmart.vn/7-bi-kip-chuan-cham-soc-va-chai-long-cho-cho-poodle\">chải lông cho chó Poodle</a> hoặc <a href=\"https://www.petmart.vn/cach-tia-long-cho-poodle-tai-nha-ai-cung-lam-duoc\">cắt tỉa lông cho chó Poodle tại nhà</a> thường xuyên do lông của giống này mọc rất nhanh.</p><h4><strong>Mẫu cắt tỉa lông chó Poodle theo style Ai Cập huyền bí</strong></h4><p>Tỉa lông cho chó Poodle theo phong cách Ai Cập huyền bí được lấy cảm hứng từ bộ phim điện ảnh nổi tiếng “Nữ hoàng Cleopatra”. Phong cách này đặc biệt phù hợp với những giống chó nhỏ lông xù như Poodle, Bichon…</p><p>Trước tiên bạn cần chuẩn bị một bé cún để làm mẫu cắt tỉa lông chó Poodle. Những chú chó màu đen hoặc xám là phù hợp nhất với kiểu lông này. Chúng được sinh ra với sự cổ điển và thanh lịch, bí ẩn nhưng vẫn quyến rũ. Giống như nữ hoàng Cleopatra. Phong cách này đòi hỏi chó phải có bộ lông thật dài và dày, đặc biệt là trên đầu và quanh cổ. Trước khi bắt đầu tỉa lông, cần tắm sạch cho chó. Sấy khô và chải cho lông trở nên bông xù. Tách phần lông trên đỉnh đầu và hai tai của chó. Buộc gọn lại để riêng. Đặc điểm của mẫu cắt tỉa lông chó Poodle này là phản ánh sự độc đoán, bí ẩn và dịu dàng. Thể hiện thông qua các chi tiết trên đầu và hai bên tai của chú chó.</p><h4><strong>Hướng dẫn từng bước</strong></h4><ol><li><strong>Bước 1:</strong> Tỉa lông hai bên vai. Trước đó, chó cần được chải gọn bộ lông lộn xộn. Cắt theo đường thẳng để tạo hình vai và hai cẳng chân.</li><li><strong>Bước 2:</strong> Tỉa gọn lưng và eo. Lưu ý không tỉa lông quá sát. Phần lông trên người phải có sự chuyển tiếp nhịp nhàng với lông quanh đầu và cổ. Giữ nguyên phần lông bờm quanh cổ và phần trên sống lưng. Tạo dáng lưng càng ngắn càng tốt.</li><li><strong>Bước 3:</strong> Chân trước được cắt theo hình trụ gọn gàng. Có độ phồng tương đối và không quá ngắn. Có thể cạo một phần bàn chân hoặc để nguyên. Phương pháp mẫu cắt tỉa lông chó Poodle này có phần giống với phong cách tỉa tròn cơ bản ở Poodle.</li><li><strong>Bước 4:</strong> Từ phần sau hông tỉa ngắn hơn trên lưng. Tỉa eo gọn gàng để phân biệt rõ với phần thân trước. Tạo ấn tượng duyên dáng và uyển chuyển.</li><li><strong>Bước 5:</strong> Mông tỉa mịn và tròn như phần thắt lưng. Lông ở mông không được tỉa phồng hơn trên lưng. Tránh tạo thành hình đồng hồ cát.</li><li><strong>Bước 6:</strong> Chải bông đuôi chó. Cắt tạo hình thành một hình cầu mịn và mượt.</li></ol><h4><strong>Lưu ý thêm</strong></h4><p>Với kiểu tỉa lông cho chó này, các phần của bộ lông được sắp xếp theo bố cục gọn gàng. Từ đỉnh đầu đến đuôi có sự chuyển tiếp từ từ, không bị gãy khúc đột ngột. Khi nhìn nghiêng, bộ lông có cấu trúc hết sức hợp lý. Phần lông cổ và tai được tạo hình giống như vương miện của nữ hoàng Ai Cập. Làm nổi bật sự huyền bí và thanh lịch. Lông trán được buộc gọn giúp chó thoải mái hơn khi vận động. Ngực được tỉa tròn và nâng lên cao, làm cho chú chó trông khỏe khoắn hơn.</p><p>Với mẫu cắt tỉa lông chó Poodle này, việc chăm sóc sẽ khá vất vả. Do lông của chó Poodle mọc khá nhanh nên sẽ mau bị mất dáng. Tuy nhiên chú chó của bạn sẽ trở nên nổi bật hơn. Nếu đã chán phong cách tỉa tròn thông thường, thì Ai Cập huyền bí là một lựa chọn lý tưởng của bạn.</p><h4><strong>Tỉa lông cho chó Poodle phong cách công chúa</strong></h4><p><strong>Bước 1</strong></p><ul><li>Sử dụng kéo tỉa thẳng cắt gọn lông quanh hông và mông. Tạo hình lông sao cho đầy đặn, gọn gàng, không bị hẹp quá.</li><li>Lông chân sau tỉa thành hình trụ thẳng. Lông dưới đầu gối tương đối thô hơn phần bên trên.</li><li>Tỉa bo tròn bên trong và bên ngoài chân sau, sao cho lông có sự chuyển tiếp tự nhiên từ đùi xuống đầu gối và cẳng chân.</li></ul><p><strong>Bước 2:</strong></p><ul><li>Dùng kéo thẳng cắt gọn phần eo. Chú ý lông quanh eo không được quá ngắn. Chỉ cần ngắn hơn một chút so với mông là được.</li><li>Lông trước ngực cũng không cần quá dày, cách tỉa tương tự như ở mông. Chú ý mẫu cắt tỉa lông chó Poodle này không nên tạo khối quá lớn ở ngực.</li><li>Tỉa mịn một phần lông hai bên má, làm sao để được khuôn mặt tròn như quả táo và nở ra hai bên. Giống như các quý tộc thời kì Phục Hưng ở phương Tây.</li><li>Lưu ý không được tỉa mỏng phần lông ở đoạn từ eo trở lên. Tỉa thành một đường dốc nối từ gáy xuống giữa lưng.</li></ul><p><strong>Bước 3</strong></p><ul><li>Dùng kéo thẳng cắt bằng phần lông dưới tai. Chiều dài lông kéo dài đến ngang ngực là được.</li><li>Lông đuôi cắt thành hình phễu, không phải hình cầu.</li><li>Lông xung quanh và đỉnh đầu được giữ nguyên, đánh bông và vuốt ngược lên đỉnh đầu.</li><li>Lông trước trán được buộc túm lại. Nhìn tổng thể phần đầu chó Poodle như được đội một chiếc mũ lớn hình nấm.</li></ul><h4><strong>Tỉa lông cho chó Bichon và Poodle phong cách hoàng tử</strong></h4><p><strong>Bước 1</strong></p><ul><li>Sử dụng kéo thẳng tỉa tròn lông quanh bàn chân. Lưu ý không được tỉa quá ngắn, không để lộ bàn chân khi nhìn từ hai bên.</li><li>Tỉa bo tròn lông quanh đùi và bốn chân, làm sao để lông càng mịn càng tốt. Tạo dáng thành hình trụ thẳng đứng song song với nhau. Chân trước gọn gàng hơn chân sau</li><li>Căn cứ theo đường cong tự nhiên của chó để tỉa lông phần bụng. Tạo dáng phần eo gọn gàng nhưng vẫn thể hiện rõ vóc dáng khỏe khoắn của chó.</li></ul><p><strong>Bước 2</strong></p><ul><li>Cắt gọn lông phần ngực, sao cho lông càng mịn càng tốt. Phần lông ngực phải có sự chuyển tiếp tự nhiên với phần còn lại.</li><li>Đối với hai bên sườn, cắt tỉa tương tự như trước ngực. Chú ý lông phải gọn ngàng nhưng vẫn đảm bảo nở nang. Nhưng không phải là xõa tung. Không nên tỉa ngực phồng ra phía trước. Nếu không sẽ mất cân đối với tổng thể.</li><li>Không được tỉa ngắn lông gáy. Dùng kéo tỉa tạo độ dốc từ đỉnh đầu xuống lưng. Tạo dáng đầu to như bờm sư tử nhưng không xù ra mà ôm gọn quanh đầu.</li></ul><p><strong>Bước 3</strong></p><ul><li>Tỉa gọn vừa phải lông quanh mắt. Chó Bichon có đôi mắt tròn và to, việc tỉa mắt quá ngắn sẽ làm chó trông đáng yêu, mất đi sự bá đạo. Do đó chỉ nên tỉa một phần, không nên để toàn bộ đôi mắt lộ ra.</li><li>Đôi tai có thể để lộ ra hoặc che dấu đi. Tùy theo chó được tỉa lông để đi thi hay làm đẹp thông thường mà quyết định độ dài.</li></ul><h4><strong>Kết luận</strong></h4><p>Chó Bichon và Poodle là hai giống chó có hình dáng tương tự nhau. Chúng đều có đặc điểm chung là bộ lông xù dày. Do đó rất thuận tiện để sáng tạo nhiều kiểu mẫu cắt tỉa lông cho chúng. Những kiểu mẫu cắt tỉa lông chó Poodle trên sẽ giúp chúng có vẻ ngoài sang trọng, quý tộc. Là tâm điểm mỗi khi xuất hiện trước đám đông. Phong cách hoàng tử phù hợp hơn với những chú chó Bichon. Tuy nhiên đã có nhiều bạn áp dụng cho cả hai giống chó Bichon và Poodle. Nếu bạn là người ưa thích sự phá cách thì có thể tham khảo những kiểu lông trên. Rất thú vị phải không nào?</p>');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ngay`
--

DROP TABLE IF EXISTS `ngay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ngay` (
  `mangay` int(11) NOT NULL AUTO_INCREMENT,
  `ngay` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  PRIMARY KEY (`mangay`),
  CONSTRAINT `ngay_ibfk_1` FOREIGN KEY (`mangay`) REFERENCES `tg_dl` (`mangay`)
) ENGINE=InnoDB AUTO_INCREMENT=516 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ngay`
--

LOCK TABLES `ngay` WRITE;
/*!40000 ALTER TABLE `ngay` DISABLE KEYS */;
INSERT INTO `ngay` VALUES (5,'2023-12-17','0'),(6,'2023-12-18','0'),(7,'2023-12-19','0'),(8,'2023-12-20','0'),(9,'2023-12-21','0'),(10,'2023-12-22','0'),(11,'2023-12-23','0'),(12,'2023-12-24','0'),(13,'2023-12-25','0'),(14,'2023-12-26','0'),(16,'2023-12-28','0'),(17,'2023-12-29','0'),(18,'2023-12-30','0'),(19,'2023-12-31','0'),(20,'2024-01-01','0'),(21,'2024-01-02','0'),(22,'2024-01-03','0'),(23,'2024-01-04','0'),(24,'2024-01-05','0'),(25,'2024-01-06','0'),(26,'2024-01-07','0'),(27,'2024-01-08','0'),(28,'2024-01-09','0'),(29,'2024-01-10','0'),(30,'2024-01-11','0'),(31,'2024-01-12','0'),(32,'2024-01-13','0'),(33,'2024-01-14','0'),(34,'2024-01-15','0'),(35,'2024-01-16','0'),(36,'2024-01-17','0'),(37,'2024-01-18','0'),(38,'2024-01-19','0'),(39,'2024-01-20','0'),(40,'2024-01-21','0'),(41,'2024-01-22','0'),(42,'2024-01-23','0'),(43,'2024-01-24','0'),(44,'2024-01-25','0'),(45,'2024-01-26','0'),(46,'2024-01-27','0'),(47,'2024-01-28','0'),(48,'2024-01-29','0'),(49,'2024-01-30','0'),(50,'2024-01-31','0'),(51,'2024-02-01','0'),(52,'2024-02-02','0'),(53,'2024-02-03','0'),(54,'2024-02-04','0'),(55,'2024-02-05','0'),(56,'2024-02-06','0'),(57,'2024-02-07','0'),(58,'2024-02-08','0'),(59,'2024-02-09','0'),(60,'2024-02-10','0'),(61,'2024-02-11','0'),(62,'2024-02-12','0'),(63,'2024-02-13','0'),(64,'2024-02-14','0'),(65,'2024-02-15','0'),(66,'2024-02-16','0'),(67,'2024-02-17','0'),(68,'2024-02-18','0'),(69,'2024-02-19','0'),(70,'2024-02-20','0'),(71,'2024-02-21','0'),(72,'2024-02-22','0'),(73,'2024-02-23','0'),(74,'2024-02-24','0'),(75,'2024-02-25','0'),(76,'2024-02-26','0'),(77,'2024-02-27','0'),(78,'2024-02-28','0'),(79,'2024-02-29','0'),(80,'2024-03-01','0'),(81,'2024-03-02','0'),(82,'2024-03-03','0'),(83,'2024-03-04','0'),(84,'2024-03-05','0'),(85,'2024-03-06','0'),(86,'2024-03-07','0'),(87,'2024-03-08','0'),(88,'2024-03-09','0'),(89,'2024-03-10','0'),(90,'2024-03-11','0'),(91,'2024-03-12','0'),(92,'2024-03-13','0'),(93,'2024-03-14','0'),(94,'2024-03-15','0'),(95,'2024-03-16','0'),(96,'2024-03-17','0'),(97,'2024-03-18','0'),(98,'2024-03-19','0'),(99,'2024-03-20','0'),(100,'2024-03-21','0'),(101,'2024-03-22','0'),(102,'2024-03-23','0'),(103,'2024-03-24','0'),(104,'2024-03-25','0'),(105,'2024-03-26','0'),(106,'2024-03-27','0'),(107,'2024-03-28','0'),(108,'2024-03-29','0'),(109,'2024-03-30','0'),(110,'2024-03-31','0'),(111,'2024-04-01','0'),(112,'2024-04-02','0'),(113,'2024-04-03','0'),(114,'2024-04-04','0'),(115,'2024-04-05','0'),(116,'2024-04-06','0'),(117,'2024-04-07','0'),(118,'2024-04-08','0'),(119,'2024-04-09','0'),(120,'2024-04-10','0'),(121,'2024-04-11','0'),(122,'2024-04-12','0'),(123,'2024-04-13','0'),(124,'2024-04-14','0'),(125,'2024-04-15','0'),(126,'2024-04-16','0'),(127,'2024-04-17','0'),(128,'2024-04-18','0'),(129,'2024-04-19','0'),(130,'2024-04-20','0'),(131,'2024-04-21','0'),(132,'2024-04-22','0'),(133,'2024-04-23','0'),(134,'2024-04-24','0'),(135,'2024-04-25','0'),(136,'2024-04-26','0'),(137,'2024-04-27','0'),(138,'2024-04-28','0'),(139,'2024-04-29','0'),(140,'2024-04-30','0'),(141,'2024-05-01','0'),(142,'2024-05-02','0'),(143,'2024-05-03','0'),(144,'2024-05-04','0'),(145,'2024-05-05','0'),(146,'2024-05-06','0'),(147,'2024-05-07','0'),(148,'2024-05-08','0'),(149,'2024-05-09','0'),(150,'2024-05-10','0'),(151,'2024-05-11','0'),(152,'2024-05-12','0'),(153,'2024-05-13','0'),(154,'2024-05-14','0'),(155,'2024-05-15','0'),(156,'2024-05-16','0'),(157,'2024-05-17','0'),(158,'2024-05-18','0'),(159,'2024-05-19','0'),(160,'2024-05-20','0'),(161,'2024-05-21','0'),(162,'2024-05-22','0'),(163,'2024-05-23','0'),(164,'2024-05-24','0'),(165,'2024-05-25','0'),(166,'2024-05-26','0'),(167,'2024-05-27','0'),(168,'2024-05-28','0'),(169,'2024-05-29','0'),(170,'2024-05-30','0'),(171,'2024-05-31','0'),(172,'2024-06-01','0'),(173,'2024-06-02','0'),(174,'2024-06-03','0'),(175,'2024-06-04','0'),(176,'2024-06-05','0'),(177,'2024-06-06','0'),(178,'2024-06-07','0'),(179,'2024-06-08','0'),(180,'2024-06-09','0'),(181,'2024-06-10','0'),(182,'2024-06-11','0'),(183,'2024-06-12','0'),(184,'2024-06-13','0'),(185,'2024-06-14','0'),(186,'2024-06-15','0'),(187,'2024-06-16','0'),(188,'2024-06-17','0'),(189,'2024-06-18','0'),(190,'2024-06-19','0'),(191,'2024-06-20','0'),(192,'2024-06-21','0'),(193,'2024-06-22','0'),(194,'2024-06-23','0'),(195,'2024-06-24','0'),(196,'2024-06-25','0'),(197,'2024-06-26','0'),(198,'2024-06-27','0'),(199,'2024-06-28','0'),(200,'2024-06-29','0'),(201,'2024-06-30','0'),(202,'2024-07-01','0'),(203,'2024-07-02','0'),(204,'2024-07-03','0'),(205,'2024-07-04','0'),(206,'2024-07-05','0'),(207,'2024-07-06','0'),(208,'2024-07-07','0'),(209,'2024-07-08','0'),(210,'2024-07-09','0'),(211,'2024-07-10','0'),(212,'2024-07-11','0'),(213,'2024-07-12','0'),(214,'2024-07-13','0'),(215,'2024-07-14','0'),(216,'2024-07-15','0'),(217,'2024-07-16','0'),(218,'2024-07-17','0'),(219,'2024-07-18','0'),(220,'2024-07-19','0'),(221,'2024-07-20','0'),(222,'2024-07-21','0'),(223,'2024-07-22','0'),(224,'2024-07-23','0'),(225,'2024-07-24','0'),(226,'2024-07-25','0'),(227,'2024-07-26','0'),(228,'2024-07-27','0'),(229,'2024-07-28','0'),(230,'2024-07-29','0'),(231,'2024-07-30','0'),(232,'2024-07-31','0'),(233,'2024-08-01','0'),(234,'2024-08-02','0'),(235,'2024-08-03','0'),(236,'2024-08-04','0'),(237,'2024-08-05','0'),(238,'2024-08-06','0'),(239,'2024-08-07','0'),(240,'2024-08-08','0'),(241,'2024-08-09','0'),(242,'2024-08-10','0'),(243,'2024-08-11','0'),(244,'2024-08-12','0'),(245,'2024-08-13','0'),(246,'2024-08-14','0'),(247,'2024-08-15','0'),(248,'2024-08-16','0'),(249,'2024-08-17','0'),(250,'2024-08-18','0'),(251,'2024-08-19','0'),(252,'2024-08-20','0'),(253,'2024-08-21','0'),(254,'2024-08-22','0'),(255,'2024-08-23','0'),(256,'2024-08-24','0'),(257,'2024-08-25','0'),(258,'2024-08-26','0'),(259,'2024-08-27','0'),(260,'2024-08-28','0'),(261,'2024-08-29','0'),(262,'2024-08-30','0'),(263,'2024-08-31','0'),(264,'2024-09-01','0'),(265,'2024-09-02','0'),(266,'2024-09-03','0'),(267,'2024-09-04','0'),(268,'2024-09-05','0'),(269,'2024-09-06','0'),(270,'2024-09-07','0'),(271,'2024-09-08','0'),(272,'2024-09-09','0'),(273,'2024-09-10','0'),(274,'2024-09-11','0'),(275,'2024-09-12','0'),(276,'2024-09-13','0'),(277,'2024-09-14','0'),(278,'2024-09-15','0'),(279,'2024-09-16','0'),(280,'2024-09-17','0'),(281,'2024-09-18','0'),(282,'2024-09-19','0'),(283,'2024-09-20','0'),(284,'2024-09-21','0'),(285,'2024-09-22','0'),(286,'2024-09-23','0'),(287,'2024-09-24','0'),(288,'2024-09-25','0'),(289,'2024-09-26','0'),(290,'2024-09-27','0'),(291,'2024-09-28','0'),(292,'2024-09-29','0'),(293,'2024-09-30','0'),(294,'2024-10-01','0'),(295,'2024-10-02','0'),(296,'2024-10-03','0'),(297,'2024-10-04','0'),(298,'2024-10-05','0'),(299,'2024-10-06','0'),(300,'2024-10-07','0'),(301,'2024-10-08','0'),(302,'2024-10-09','0'),(303,'2024-10-10','0'),(304,'2024-10-11','0'),(305,'2024-10-12','0'),(306,'2024-10-13','0'),(307,'2024-10-14','0'),(308,'2024-10-15','0'),(309,'2024-10-16','0'),(310,'2024-10-17','0'),(311,'2024-10-18','0'),(312,'2024-10-19','0'),(313,'2024-10-20','0'),(314,'2024-10-21','0'),(315,'2024-10-22','0'),(316,'2024-10-23','0'),(317,'2024-10-24','0'),(318,'2024-10-25','0'),(319,'2024-10-26','0'),(320,'2024-10-27','0'),(321,'2024-10-28','0'),(322,'2024-10-29','0'),(323,'2024-10-30','0'),(324,'2024-10-31','0'),(325,'2024-11-01','0'),(326,'2024-11-02','0'),(327,'2024-11-03','0'),(328,'2024-11-04','0'),(329,'2024-11-05','0'),(330,'2024-11-06','0'),(331,'2024-11-07','0'),(332,'2024-11-08','0'),(333,'2024-11-09','0'),(334,'2024-11-10','0'),(335,'2024-11-11','0'),(336,'2024-11-12','0'),(337,'2024-11-13','0'),(338,'2024-11-14','0'),(339,'2024-11-15','0'),(340,'2024-11-16','0'),(341,'2024-11-17','0'),(342,'2024-11-18','0'),(343,'2024-11-19','0'),(344,'2024-11-20','0'),(345,'2024-11-21','0'),(346,'2024-11-22','0'),(347,'2024-11-23','0'),(348,'2024-11-24','0'),(349,'2024-11-25','0'),(350,'2024-11-26','0'),(351,'2024-11-27','0'),(352,'2024-11-28','0'),(353,'2024-11-29','0'),(354,'2024-11-30','0'),(355,'2024-12-01','0'),(356,'2024-12-02','0'),(357,'2024-12-03','0'),(358,'2024-12-04','0'),(359,'2024-12-05','0'),(360,'2024-12-06','0'),(361,'2024-12-07','0'),(362,'2024-12-08','0'),(363,'2024-12-09','0'),(364,'2024-12-10','0'),(365,'2024-12-11','0'),(366,'2024-12-12','0'),(367,'2024-12-13','0'),(368,'2024-12-14','0'),(369,'2024-12-15','0');
/*!40000 ALTER TABLE `ngay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ngay1`
--

DROP TABLE IF EXISTS `ngay1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ngay1` (
  `mangay` int(11) NOT NULL AUTO_INCREMENT,
  `ngay` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  PRIMARY KEY (`mangay`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ngay1`
--

LOCK TABLES `ngay1` WRITE;
/*!40000 ALTER TABLE `ngay1` DISABLE KEYS */;
INSERT INTO `ngay1` VALUES (45,'2023-12-26',''),(46,'2023-12-27',''),(47,'2023-12-28',''),(48,'2023-12-29',''),(49,'2023-12-30',''),(50,'2023-12-31',''),(51,'2024-01-02',''),(52,'2024-01-03',''),(53,'2024-01-04',''),(54,'2024-01-05',''),(55,'2024-01-06','');
/*!40000 ALTER TABLE `ngay1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhacc`
--

DROP TABLE IF EXISTS `nhacc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhacc` (
  `mancc` varchar(100) NOT NULL,
  `tenncc` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(11) NOT NULL,
  PRIMARY KEY (`mancc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhacc`
--

LOCK TABLES `nhacc` WRITE;
/*!40000 ALTER TABLE `nhacc` DISABLE KEYS */;
INSERT INTO `nhacc` VALUES ('NCC1','Công Ty THHH','Quận 1','67858533'),('NCC2','PetsSmart','Quận 1','024 7106990'),('NCC3','Paddy','Hà Nội','0867677891');
/*!40000 ALTER TABLE `nhacc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieunhap`
--

DROP TABLE IF EXISTS `phieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phieunhap` (
  `mapn` int(11) NOT NULL AUTO_INCREMENT,
  `mancc` varchar(100) NOT NULL,
  `id` int(5) NOT NULL,
  `sl_tong` int(11) NOT NULL,
  `giatri_tong` decimal(10,3) NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `lohang` varchar(11) NOT NULL,
  PRIMARY KEY (`mapn`),
  KEY `id` (`id`),
  KEY `mancc` (`mancc`) USING BTREE,
  CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`mancc`) REFERENCES `nhacc` (`mancc`),
  CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`id`) REFERENCES `tb_admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieunhap`
--

LOCK TABLES `phieunhap` WRITE;
/*!40000 ALTER TABLE `phieunhap` DISABLE KEYS */;
INSERT INTO `phieunhap` VALUES (66,'NCC2',12,20,3000.000,'2023-12-30 06:25:38','LOHANG001'),(67,'NCC1',12,40,8400.000,'2023-12-30 06:26:20','LOHANG002'),(68,'NCC3',12,70,6725.000,'2023-12-30 06:28:43','LOHANG003'),(69,'NCC2',12,165,11710.000,'2024-01-04 03:23:21','LOHANG004'),(70,'NCC1',12,137,504.000,'2024-01-04 18:14:31','LOHANG005'),(71,'NCC2',12,77,0.000,'2024-01-04 18:17:56','LOHANG006'),(73,'NCC2',12,112,396.000,'2024-01-04 18:23:47','LOHANG007'),(74,'NCC3',12,104,8056.000,'2024-01-09 14:58:20','LOHANG008'),(75,'NCC2',12,56,805.000,'2024-01-12 17:05:01','TEST');
/*!40000 ALTER TABLE `phieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieuxuat`
--

DROP TABLE IF EXISTS `phieuxuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phieuxuat` (
  `mapx` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `id` int(5) NOT NULL,
  `sl_xuat` varchar(100) NOT NULL,
  `giatri_tong` decimal(10,3) NOT NULL,
  `ngayxuat` datetime NOT NULL,
  `lohang` varchar(100) NOT NULL,
  PRIMARY KEY (`mapx`),
  KEY `makh` (`makh`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_admin` (`id`),
  CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;