CREATE DATABASE  IF NOT EXISTS `ver4` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ver4`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ver4
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cay_vai_moc`
--

DROP TABLE IF EXISTS `cay_vai_moc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cay_vai_moc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_vai_id` int(10) unsigned NOT NULL,
  `so_met` int(10) unsigned NOT NULL,
  `nhan_vien_det_id` int(10) unsigned NOT NULL,
  `ma_may_det` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio_det` datetime NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `ngay_gio_nhap_kho` datetime NOT NULL,
  `phieu_xuat_moc_id` int(10) unsigned DEFAULT NULL,
  `lo_nhuom_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cay_vai_moc_loai_vai_id_foreign` (`loai_vai_id`),
  KEY `cay_vai_moc_nhan_vien_det_id_foreign` (`nhan_vien_det_id`),
  KEY `cay_vai_moc_kho_id_foreign` (`kho_id`),
  KEY `cay_vai_moc_phieu_xuat_moc_id_foreign` (`phieu_xuat_moc_id`),
  KEY `cay_vai_moc_lo_nhuom_id_foreign` (`lo_nhuom_id`),
  KEY `cay_vai_moc_created_by_foreign` (`created_by`),
  KEY `cay_vai_moc_updated_by_foreign` (`updated_by`),
  KEY `cay_vai_moc_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `cay_vai_moc_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `cay_vai_moc_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `cay_vai_moc_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `cay_vai_moc_lo_nhuom_id_foreign` FOREIGN KEY (`lo_nhuom_id`) REFERENCES `lo_nhuom` (`id`),
  CONSTRAINT `cay_vai_moc_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  CONSTRAINT `cay_vai_moc_nhan_vien_det_id_foreign` FOREIGN KEY (`nhan_vien_det_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `cay_vai_moc_phieu_xuat_moc_id_foreign` FOREIGN KEY (`phieu_xuat_moc_id`) REFERENCES `phieu_xuat_moc` (`id`),
  CONSTRAINT `cay_vai_moc_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cay_vai_moc`
--

LOCK TABLES `cay_vai_moc` WRITE;
/*!40000 ALTER TABLE `cay_vai_moc` DISABLE KEYS */;
INSERT INTO `cay_vai_moc` VALUES (1,5,1000,11,'MACD001','2017-04-16 09:21:52',12,'2017-04-16 23:27:06',1,NULL,NULL,'2017-04-16 09:28:03','2017-04-16 11:39:35',NULL,NULL,NULL,NULL),(2,5,1000,9,'MACD001','2017-04-16 09:36:39',12,'2017-04-16 23:28:48',1,8,NULL,'2017-04-16 09:29:31','2017-04-16 11:57:08',NULL,NULL,NULL,NULL),(3,2,10000,11,'RSI001','2017-04-15 05:05:05',10,'2017-04-16 23:50:58',2,4,NULL,'2017-04-16 09:51:47','2017-04-16 11:40:08',NULL,NULL,NULL,NULL),(4,1,100,9,'EMA001','2017-04-15 04:04:04',12,'2017-04-17 01:40:15',NULL,NULL,NULL,'2017-04-16 11:41:05','2017-04-16 11:41:05',NULL,NULL,NULL,NULL),(5,4,1,11,'SMA2','2017-04-17 01:55:48',12,'2017-04-17 01:55:48',NULL,5,NULL,'2017-04-16 11:56:17','2017-04-16 11:56:28',NULL,NULL,NULL,NULL),(6,2,1,9,'SMA2','2017-04-16 02:14:28',8,'2017-04-16 02:14:28',4,4,NULL,'2017-04-16 12:15:04','2017-04-16 12:16:30',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cay_vai_moc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cay_vai_thanh_pham`
--

DROP TABLE IF EXISTS `cay_vai_thanh_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cay_vai_thanh_pham` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cay_vai_moc_id` int(10) unsigned NOT NULL,
  `kich_co` decimal(15,2) unsigned DEFAULT NULL,
  `so_met` int(10) unsigned NOT NULL,
  `don_gia` bigint(20) unsigned NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `ngay_gio_nhap_kho` datetime NOT NULL,
  `hoa_don_xuat_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cay_vai_thanh_pham_cay_vai_moc_id_foreign` (`cay_vai_moc_id`),
  KEY `cay_vai_thanh_pham_kho_id_foreign` (`kho_id`),
  KEY `cay_vai_thanh_pham_hoa_don_xuat_id_foreign` (`hoa_don_xuat_id`),
  KEY `cay_vai_thanh_pham_created_by_foreign` (`created_by`),
  KEY `cay_vai_thanh_pham_updated_by_foreign` (`updated_by`),
  KEY `cay_vai_thanh_pham_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `cay_vai_thanh_pham_cay_vai_moc_id_foreign` FOREIGN KEY (`cay_vai_moc_id`) REFERENCES `cay_vai_moc` (`id`),
  CONSTRAINT `cay_vai_thanh_pham_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `cay_vai_thanh_pham_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `cay_vai_thanh_pham_hoa_don_xuat_id_foreign` FOREIGN KEY (`hoa_don_xuat_id`) REFERENCES `hoa_don_xuat` (`id`),
  CONSTRAINT `cay_vai_thanh_pham_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `cay_vai_thanh_pham_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cay_vai_thanh_pham`
--

LOCK TABLES `cay_vai_thanh_pham` WRITE;
/*!40000 ALTER TABLE `cay_vai_thanh_pham` DISABLE KEYS */;
INSERT INTO `cay_vai_thanh_pham` VALUES (1,3,0.85,8800,100000,9,'2017-04-17 03:11:20',NULL,NULL,'2017-04-16 13:13:25','2017-04-16 13:13:25',NULL,NULL,NULL,NULL),(2,6,NULL,1,100000,9,'2017-04-17 03:27:13',NULL,NULL,'2017-04-16 13:28:15','2017-04-16 13:28:15',NULL,NULL,NULL,NULL),(3,2,NULL,1000,500000000,9,'2017-04-17 03:28:22',NULL,NULL,'2017-04-16 13:29:10','2017-04-16 13:30:28',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cay_vai_thanh_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_hang_cong_ty`
--

DROP TABLE IF EXISTS `don_hang_cong_ty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `don_hang_cong_ty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_soi_id` int(10) unsigned NOT NULL,
  `nha_cung_cap_id` int(10) unsigned NOT NULL,
  `khoi_luong` int(10) unsigned NOT NULL,
  `han_chot` datetime DEFAULT NULL,
  `ngay_gio_dat_hang` datetime NOT NULL,
  `tinh_trang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mới',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `don_hang_cong_ty_loai_soi_id_foreign` (`loai_soi_id`),
  KEY `don_hang_cong_ty_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  KEY `don_hang_cong_ty_created_by_foreign` (`created_by`),
  KEY `don_hang_cong_ty_updated_by_foreign` (`updated_by`),
  KEY `don_hang_cong_ty_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `don_hang_cong_ty_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `don_hang_cong_ty_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `don_hang_cong_ty_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  CONSTRAINT `don_hang_cong_ty_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  CONSTRAINT `don_hang_cong_ty_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_hang_cong_ty`
--

LOCK TABLES `don_hang_cong_ty` WRITE;
/*!40000 ALTER TABLE `don_hang_cong_ty` DISABLE KEYS */;
/*!40000 ALTER TABLE `don_hang_cong_ty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_hang_khach_hang`
--

DROP TABLE IF EXISTS `don_hang_khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `don_hang_khach_hang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `khach_hang_id` int(10) unsigned NOT NULL,
  `loai_vai_id` int(10) unsigned NOT NULL,
  `mau_id` int(10) unsigned NOT NULL,
  `kich_co` decimal(15,2) unsigned DEFAULT NULL,
  `trong_so_met` int(10) unsigned NOT NULL,
  `han_chot` datetime DEFAULT NULL,
  `ngay_gio_dat_hang` datetime NOT NULL,
  `tinh_trang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mới',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `don_hang_khach_hang_khach_hang_id_foreign` (`khach_hang_id`),
  KEY `don_hang_khach_hang_loai_vai_id_foreign` (`loai_vai_id`),
  KEY `don_hang_khach_hang_mau_id_foreign` (`mau_id`),
  KEY `don_hang_khach_hang_created_by_foreign` (`created_by`),
  KEY `don_hang_khach_hang_updated_by_foreign` (`updated_by`),
  KEY `don_hang_khach_hang_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `don_hang_khach_hang_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `don_hang_khach_hang_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `don_hang_khach_hang_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  CONSTRAINT `don_hang_khach_hang_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  CONSTRAINT `don_hang_khach_hang_mau_id_foreign` FOREIGN KEY (`mau_id`) REFERENCES `mau` (`id`),
  CONSTRAINT `don_hang_khach_hang_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_hang_khach_hang`
--

LOCK TABLES `don_hang_khach_hang` WRITE;
/*!40000 ALTER TABLE `don_hang_khach_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `don_hang_khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoa_don_nhap`
--

DROP TABLE IF EXISTS `hoa_don_nhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoa_don_nhap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_cong_ty_id` int(10) unsigned NOT NULL,
  `nha_cung_cap_id` int(10) unsigned DEFAULT NULL,
  `so_thung` int(10) unsigned NOT NULL,
  `khoi_luong_thung` int(10) unsigned NOT NULL,
  `don_gia` bigint(20) unsigned NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `ngay_gio_xuat_hoa_don` datetime NOT NULL,
  `nhan_vien_nhap_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hoa_don_nhap_don_hang_cong_ty_id_foreign` (`don_hang_cong_ty_id`),
  KEY `hoa_don_nhap_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  KEY `hoa_don_nhap_kho_id_foreign` (`kho_id`),
  KEY `hoa_don_nhap_nhan_vien_nhap_id_foreign` (`nhan_vien_nhap_id`),
  KEY `hoa_don_nhap_created_by_foreign` (`created_by`),
  KEY `hoa_don_nhap_updated_by_foreign` (`updated_by`),
  KEY `hoa_don_nhap_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `hoa_don_nhap_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_nhap_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_nhap_don_hang_cong_ty_id_foreign` FOREIGN KEY (`don_hang_cong_ty_id`) REFERENCES `don_hang_cong_ty` (`id`),
  CONSTRAINT `hoa_don_nhap_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `hoa_don_nhap_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  CONSTRAINT `hoa_don_nhap_nhan_vien_nhap_id_foreign` FOREIGN KEY (`nhan_vien_nhap_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_nhap_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoa_don_nhap`
--

LOCK TABLES `hoa_don_nhap` WRITE;
/*!40000 ALTER TABLE `hoa_don_nhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoa_don_nhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoa_don_xuat`
--

DROP TABLE IF EXISTS `hoa_don_xuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoa_don_xuat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `don_hang_khach_hang_id` int(10) unsigned NOT NULL,
  `khach_hang_id` int(10) unsigned DEFAULT NULL,
  `ngay_gio_xuat_hoa_don` datetime NOT NULL,
  `nhan_vien_xuat_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hoa_don_xuat_don_hang_khach_hang_id_foreign` (`don_hang_khach_hang_id`),
  KEY `hoa_don_xuat_khach_hang_id_foreign` (`khach_hang_id`),
  KEY `hoa_don_xuat_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  KEY `hoa_don_xuat_created_by_foreign` (`created_by`),
  KEY `hoa_don_xuat_updated_by_foreign` (`updated_by`),
  KEY `hoa_don_xuat_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `hoa_don_xuat_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_xuat_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_xuat_don_hang_khach_hang_id_foreign` FOREIGN KEY (`don_hang_khach_hang_id`) REFERENCES `don_hang_khach_hang` (`id`),
  CONSTRAINT `hoa_don_xuat_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  CONSTRAINT `hoa_don_xuat_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `hoa_don_xuat_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoa_don_xuat`
--

LOCK TABLES `hoa_don_xuat` WRITE;
/*!40000 ALTER TABLE `hoa_don_xuat` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoa_don_xuat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khach_hang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cong_no` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `khach_hang_so_dien_thoai_unique` (`so_dien_thoai`),
  KEY `khach_hang_user_id_foreign` (`user_id`),
  KEY `khach_hang_created_by_foreign` (`created_by`),
  KEY `khach_hang_updated_by_foreign` (`updated_by`),
  KEY `khach_hang_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `khach_hang_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `khach_hang_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `khach_hang_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `khach_hang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
INSERT INTO `khach_hang` VALUES (8,16,'Lê Công Doãn','0982503643','Hóc Môn, Tp Hồ Chí Minh',0,NULL,'2017-04-14 16:45:02','2017-04-14 16:45:02',NULL,NULL,NULL,NULL),(10,26,'Vũ Duy Tiến','01686805322','unknown',0,NULL,'2017-04-15 03:45:30','2017-04-15 03:52:56',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kho`
--

DROP TABLE IF EXISTS `kho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kho` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_tich` decimal(15,2) unsigned NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhan_vien_quan_ly_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kho_ten_unique` (`ten`),
  UNIQUE KEY `kho_so_dien_thoai_unique` (`so_dien_thoai`),
  KEY `kho_nhan_vien_quan_ly_id_foreign` (`nhan_vien_quan_ly_id`),
  KEY `kho_created_by_foreign` (`created_by`),
  KEY `kho_updated_by_foreign` (`updated_by`),
  KEY `kho_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `kho_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `kho_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `kho_nhan_vien_quan_ly_id_foreign` FOREIGN KEY (`nhan_vien_quan_ly_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `kho_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kho`
--

LOCK TABLES `kho` WRITE;
/*!40000 ALTER TABLE `kho` DISABLE KEYS */;
INSERT INTO `kho` VALUES (8,'Kho sợi 1',1234.13,'268 Lý Thường Kiệt, phường 14, quận 10, Tp Hồ Chí Minh','+848 408 8888',11,NULL,'2017-04-14 16:45:02','2017-04-15 07:25:28',NULL,NULL,NULL,NULL),(9,'Kho vải thành phẩm 1',1.00,'N/A','113',9,NULL,'2017-04-15 07:27:29','2017-04-15 07:28:36',NULL,NULL,NULL,NULL),(10,'Kho mộc + sợi',1000.00,'N/A',NULL,NULL,NULL,'2017-04-15 15:27:49','2017-04-15 16:01:22',NULL,NULL,NULL,NULL),(12,'Kho mộc 1',1000.00,'N/A',NULL,11,NULL,'2017-04-15 16:01:43','2017-04-15 16:01:43',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lo_nhuom`
--

DROP TABLE IF EXISTS `lo_nhuom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lo_nhuom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_vai_id` int(10) unsigned DEFAULT NULL,
  `mau_id` int(10) unsigned NOT NULL,
  `nhan_vien_nhuom_id` int(10) unsigned DEFAULT NULL,
  `ngay_gio_nhuom` datetime NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lo_nhuom_loai_vai_id_foreign` (`loai_vai_id`),
  KEY `lo_nhuom_nhan_vien_nhuom_id_foreign` (`nhan_vien_nhuom_id`),
  KEY `lo_nhuom_created_by_foreign` (`created_by`),
  KEY `lo_nhuom_updated_by_foreign` (`updated_by`),
  KEY `lo_nhuom_deleted_by_foreign` (`deleted_by`),
  KEY `lo_nhuom_mau_id_foreign` (`mau_id`),
  CONSTRAINT `lo_nhuom_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `lo_nhuom_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `lo_nhuom_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  CONSTRAINT `lo_nhuom_mau_id_foreign` FOREIGN KEY (`mau_id`) REFERENCES `mau` (`id`),
  CONSTRAINT `lo_nhuom_nhan_vien_nhuom_id_foreign` FOREIGN KEY (`nhan_vien_nhuom_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `lo_nhuom_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lo_nhuom`
--

LOCK TABLES `lo_nhuom` WRITE;
/*!40000 ALTER TABLE `lo_nhuom` DISABLE KEYS */;
INSERT INTO `lo_nhuom` VALUES (1,1,1,NULL,'2017-04-16 11:44:00',NULL,'2017-04-15 21:45:22','2017-04-15 21:45:22',NULL,NULL,NULL,NULL),(2,1,1,NULL,'2017-04-16 11:45:00',NULL,'2017-04-15 21:45:53','2017-04-15 21:45:53',NULL,NULL,NULL,NULL),(3,1,1,NULL,'2017-04-16 11:46:00',NULL,'2017-04-15 21:47:25','2017-04-15 21:47:25',NULL,NULL,NULL,NULL),(4,2,4,NULL,'2017-04-16 12:43:05',NULL,'2017-04-15 21:52:03','2017-04-15 22:43:07',NULL,NULL,NULL,NULL),(5,4,3,11,'2017-04-16 12:13:58',NULL,'2017-04-15 22:14:09','2017-04-15 22:14:09',NULL,NULL,NULL,NULL),(6,3,1,NULL,'2017-04-16 12:14:58',NULL,'2017-04-15 22:15:01','2017-04-15 22:15:01',NULL,NULL,NULL,NULL),(7,3,3,9,'2017-04-16 12:15:42',NULL,'2017-04-15 22:15:55','2017-04-15 22:15:55',NULL,NULL,NULL,NULL),(8,NULL,4,NULL,'2017-04-16 12:43:23',NULL,'2017-04-15 22:17:19','2017-04-15 22:43:26',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `lo_nhuom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_soi`
--

DROP TABLE IF EXISTS `loai_soi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loai_soi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin_ky_thuat` text COLLATE utf8mb4_unicode_ci,
  `khoi_luong_ton` int(10) unsigned NOT NULL,
  `so_thung_ton` int(10) unsigned NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loai_soi_ten_unique` (`ten`),
  KEY `loai_soi_kho_id_foreign` (`kho_id`),
  KEY `loai_soi_created_by_foreign` (`created_by`),
  KEY `loai_soi_updated_by_foreign` (`updated_by`),
  KEY `loai_soi_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `loai_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_soi_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `loai_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_soi`
--

LOCK TABLES `loai_soi` WRITE;
/*!40000 ALTER TABLE `loai_soi` DISABLE KEYS */;
INSERT INTO `loai_soi` VALUES (1,'Sợi cotton',NULL,0,0,8,NULL,'2017-04-15 15:27:22','2017-04-15 15:27:22',NULL,NULL,NULL,NULL),(3,'Sợi tơ tằm','Lấy từ kén của con tằm, làm tùm lum tùm la ....',0,0,8,NULL,'2017-04-15 15:35:52','2017-04-15 18:32:35',NULL,NULL,NULL,NULL),(4,'Sợi bông','Xe từ cây bông',0,0,10,NULL,'2017-04-15 16:00:38','2017-04-15 16:00:48',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `loai_soi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_vai`
--

DROP TABLE IF EXISTS `loai_vai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loai_vai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` bigint(20) unsigned NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loai_vai_ten_unique` (`ten`),
  KEY `loai_vai_created_by_foreign` (`created_by`),
  KEY `loai_vai_updated_by_foreign` (`updated_by`),
  KEY `loai_vai_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `loai_vai_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_vai_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_vai_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_vai`
--

LOCK TABLES `loai_vai` WRITE;
/*!40000 ALTER TABLE `loai_vai` DISABLE KEYS */;
INSERT INTO `loai_vai` VALUES (1,'Cotton',1000000,NULL,'2017-04-15 16:23:21','2017-04-15 16:23:33',NULL,NULL,NULL,NULL),(2,'Vải sợi bông',500000,NULL,'2017-04-15 16:24:02','2017-04-15 16:24:02',NULL,NULL,NULL,NULL),(3,'Vải tơ tằm',2000000,NULL,'2017-04-15 16:24:28','2017-04-15 16:25:06',NULL,NULL,NULL,NULL),(4,'Vải tổng hợp',700000,NULL,'2017-04-15 16:24:49','2017-04-15 16:24:49',NULL,NULL,NULL,NULL),(5,'vải tơ nhện',50000000,NULL,'2017-04-16 08:43:19','2017-04-16 08:43:19',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `loai_vai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_vai_loai_soi`
--

DROP TABLE IF EXISTS `loai_vai_loai_soi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loai_vai_loai_soi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_vai_id` int(10) unsigned NOT NULL,
  `loai_soi_id` int(10) unsigned NOT NULL,
  `dinh_muc` decimal(15,2) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loai_vai_loai_soi_loai_vai_id_foreign` (`loai_vai_id`),
  KEY `loai_vai_loai_soi_loai_soi_id_foreign` (`loai_soi_id`),
  KEY `loai_vai_loai_soi_created_by_foreign` (`created_by`),
  KEY `loai_vai_loai_soi_updated_by_foreign` (`updated_by`),
  KEY `loai_vai_loai_soi_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `loai_vai_loai_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_vai_loai_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `loai_vai_loai_soi_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  CONSTRAINT `loai_vai_loai_soi_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  CONSTRAINT `loai_vai_loai_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_vai_loai_soi`
--

LOCK TABLES `loai_vai_loai_soi` WRITE;
/*!40000 ALTER TABLE `loai_vai_loai_soi` DISABLE KEYS */;
INSERT INTO `loai_vai_loai_soi` VALUES (1,1,1,2.00,NULL,'2017-04-15 18:09:35','2017-04-15 19:26:53',NULL,NULL,NULL,NULL),(2,3,3,1.00,NULL,'2017-04-15 18:09:52','2017-04-15 18:09:52',NULL,NULL,NULL,NULL),(4,2,4,NULL,NULL,'2017-04-15 19:32:40','2017-04-15 19:32:40',NULL,NULL,NULL,NULL),(5,4,1,NULL,NULL,'2017-04-15 19:34:04','2017-04-15 19:34:04',NULL,NULL,NULL,NULL),(6,4,4,0.33,NULL,'2017-04-15 19:34:17','2017-04-15 19:34:17',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `loai_vai_loai_soi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mau`
--

DROP TABLE IF EXISTS `mau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mau` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cong_thuc` text COLLATE utf8mb4_unicode_ci,
  `nhan_vien_pha_che_id` int(10) unsigned DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mau_ten_unique` (`ten`),
  KEY `mau_nhan_vien_pha_che_id_foreign` (`nhan_vien_pha_che_id`),
  KEY `mau_created_by_foreign` (`created_by`),
  KEY `mau_updated_by_foreign` (`updated_by`),
  KEY `mau_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `mau_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `mau_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `mau_nhan_vien_pha_che_id_foreign` FOREIGN KEY (`nhan_vien_pha_che_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `mau_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mau`
--

LOCK TABLES `mau` WRITE;
/*!40000 ALTER TABLE `mau` DISABLE KEYS */;
INSERT INTO `mau` VALUES (1,'đỏ',NULL,11,NULL,'2017-04-15 20:06:57','2017-04-15 20:06:57',NULL,NULL,NULL,NULL),(3,'xanh',NULL,NULL,NULL,'2017-04-15 20:07:53','2017-04-15 20:07:53',NULL,NULL,NULL,NULL),(4,'tím than','đỏ 40%,\r\nlam 50%,\r\nvàng 10%',11,NULL,'2017-04-15 20:15:25','2017-04-15 20:24:33',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `mau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (41,'2014_10_12_000000_create_users_table',1),(42,'2014_10_12_100000_create_password_resets_table',1),(43,'2017_04_06_200000_create_nhan_vien_table',1),(44,'2017_04_06_200100_create_nha_cung_cap_table',1),(45,'2017_04_06_200200_create_khach_hang_table',1),(46,'2017_04_06_200300_create_kho_table',1),(47,'2017_04_06_200400_create_loai_soi_table',1),(48,'2017_04_06_200500_create_loai_vai_table',1),(49,'2017_04_06_200600_create_loai_vai_loai_soi_table',1),(50,'2017_04_06_200700_create_mau_table',1),(51,'2017_04_06_200800_create_lo_nhuom_table',1),(52,'2017_04_06_200900_create_phieu_xuat_soi_table',1),(53,'2017_04_06_201000_create_phieu_xuat_moc_table',1),(54,'2017_04_06_201100_create_cay_vai_moc_table',1),(55,'2017_04_06_201200_create_don_hang_cong_ty_table',1),(56,'2017_04_06_201300_create_don_hang_khach_hang_table',1),(57,'2017_04_06_201400_create_hoa_don_nhap_table',1),(58,'2017_04_06_201500_create_hoa_don_xuat_table',1),(59,'2017_04_06_201600_create_cay_vai_thanh_pham_table',1),(60,'2017_04_06_201700_create_thu_chi_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nha_cung_cap`
--

DROP TABLE IF EXISTS `nha_cung_cap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nha_cung_cap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cong_no` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nha_cung_cap_ten_unique` (`ten`),
  UNIQUE KEY `nha_cung_cap_email_unique` (`email`),
  UNIQUE KEY `nha_cung_cap_so_dien_thoai_unique` (`so_dien_thoai`),
  UNIQUE KEY `nha_cung_cap_fax_unique` (`fax`),
  KEY `nha_cung_cap_created_by_foreign` (`created_by`),
  KEY `nha_cung_cap_updated_by_foreign` (`updated_by`),
  KEY `nha_cung_cap_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `nha_cung_cap_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `nha_cung_cap_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `nha_cung_cap_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nha_cung_cap`
--

LOCK TABLES `nha_cung_cap` WRITE;
/*!40000 ALTER TABLE `nha_cung_cap` DISABLE KEYS */;
INSERT INTO `nha_cung_cap` VALUES (1,'Hoa Sen Group HSG','N/A','hsg@gmail.com','0123123003',NULL,0,NULL,'2017-04-15 14:46:00','2017-04-15 15:00:18',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `nha_cung_cap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhan_vien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuc_vu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen_han` tinyint(4) NOT NULL DEFAULT '0',
  `luong` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nhan_vien_so_dien_thoai_unique` (`so_dien_thoai`),
  UNIQUE KEY `cmnd_UNIQUE` (`cmnd`),
  KEY `nhan_vien_user_id_foreign` (`user_id`),
  KEY `nhan_vien_created_by_foreign` (`created_by`),
  KEY `nhan_vien_updated_by_foreign` (`updated_by`),
  KEY `nhan_vien_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `nhan_vien_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `nhan_vien_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `nhan_vien_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `nhan_vien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_vien`
--

LOCK TABLES `nhan_vien` WRITE;
/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` VALUES (9,15,'Vũ Duy Trúc','272277194','1994-04-20','+84 163 222 8 000','606/49/2C, đường 3 tháng 2, phường 14, quận 10, Tp Hồ Chí Minh','M','Lập trình viên',0,0,NULL,'2017-04-14 16:45:01','2017-04-15 06:46:50',NULL,NULL,NULL,NULL),(11,21,'Trần Thị Kim Thoa','123456789001','1995-04-08','0985953619','N/A','F','Giám đốc',2,8000000,NULL,'2017-04-14 19:53:30','2017-04-15 03:30:16',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieu_xuat_moc`
--

DROP TABLE IF EXISTS `phieu_xuat_moc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phieu_xuat_moc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_vai_id` int(10) unsigned NOT NULL,
  `tong_so_cay_moc` int(10) unsigned NOT NULL,
  `tong_so_met` int(10) unsigned NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `nhan_vien_xuat_id` int(10) unsigned NOT NULL,
  `ngay_gio_xuat_kho` datetime NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phieu_xuat_moc_loai_vai_id_foreign` (`loai_vai_id`),
  KEY `phieu_xuat_moc_kho_id_foreign` (`kho_id`),
  KEY `phieu_xuat_moc_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  KEY `phieu_xuat_moc_created_by_foreign` (`created_by`),
  KEY `phieu_xuat_moc_updated_by_foreign` (`updated_by`),
  KEY `phieu_xuat_moc_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `phieu_xuat_moc_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_moc_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_moc_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `phieu_xuat_moc_loai_vai_id_foreign` FOREIGN KEY (`loai_vai_id`) REFERENCES `loai_vai` (`id`),
  CONSTRAINT `phieu_xuat_moc_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_moc_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieu_xuat_moc`
--

LOCK TABLES `phieu_xuat_moc` WRITE;
/*!40000 ALTER TABLE `phieu_xuat_moc` DISABLE KEYS */;
INSERT INTO `phieu_xuat_moc` VALUES (1,5,2,2000,12,11,'2017-04-17 01:23:40',NULL,'2017-04-16 11:24:41','2017-04-16 11:59:12',NULL,NULL,NULL,NULL),(2,2,1,10000,10,9,'2017-04-17 01:34:26',NULL,'2017-04-16 11:34:50','2017-04-16 11:39:56',NULL,NULL,NULL,NULL),(3,4,0,0,12,11,'2017-04-17 01:59:35',NULL,'2017-04-16 11:59:57','2017-04-16 12:05:53',NULL,NULL,NULL,NULL),(4,2,1,1,8,11,'2017-04-17 02:13:10',NULL,'2017-04-16 12:14:19','2017-04-16 12:37:22',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `phieu_xuat_moc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieu_xuat_soi`
--

DROP TABLE IF EXISTS `phieu_xuat_soi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phieu_xuat_soi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai_soi_id` int(10) unsigned NOT NULL,
  `so_thung` int(10) unsigned NOT NULL,
  `khoi_luong_thung` int(10) unsigned NOT NULL,
  `tong_khoi_luong_xuat` int(10) unsigned NOT NULL,
  `kho_id` int(10) unsigned NOT NULL,
  `nhan_vien_xuat_id` int(10) unsigned NOT NULL,
  `ngay_gio_xuat_kho` datetime NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phieu_xuat_soi_loai_soi_id_foreign` (`loai_soi_id`),
  KEY `phieu_xuat_soi_kho_id_foreign` (`kho_id`),
  KEY `phieu_xuat_soi_nhan_vien_xuat_id_foreign` (`nhan_vien_xuat_id`),
  KEY `phieu_xuat_soi_created_by_foreign` (`created_by`),
  KEY `phieu_xuat_soi_updated_by_foreign` (`updated_by`),
  KEY `phieu_xuat_soi_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `phieu_xuat_soi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_soi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_soi_kho_id_foreign` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`),
  CONSTRAINT `phieu_xuat_soi_loai_soi_id_foreign` FOREIGN KEY (`loai_soi_id`) REFERENCES `loai_soi` (`id`),
  CONSTRAINT `phieu_xuat_soi_nhan_vien_xuat_id_foreign` FOREIGN KEY (`nhan_vien_xuat_id`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `phieu_xuat_soi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieu_xuat_soi`
--

LOCK TABLES `phieu_xuat_soi` WRITE;
/*!40000 ALTER TABLE `phieu_xuat_soi` DISABLE KEYS */;
INSERT INTO `phieu_xuat_soi` VALUES (1,3,100,10,1000,10,11,'2017-04-16 17:36:54',NULL,'2017-04-16 03:28:21','2017-04-16 03:37:00',NULL,NULL,NULL,NULL),(2,1,1,20,20,8,11,'2017-04-16 17:38:35',NULL,'2017-04-16 03:38:52','2017-04-16 07:27:45',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `phieu_xuat_soi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thu_chi`
--

DROP TABLE IF EXISTS `thu_chi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thu_chi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khach_hang_id` int(10) unsigned DEFAULT NULL,
  `nha_cung_cap_id` int(10) unsigned DEFAULT NULL,
  `phuong_thuc_thanh_toan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_tien` bigint(20) unsigned NOT NULL,
  `ngay_gio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thu_chi_khach_hang_id_foreign` (`khach_hang_id`),
  KEY `thu_chi_nha_cung_cap_id_foreign` (`nha_cung_cap_id`),
  KEY `thu_chi_created_by_foreign` (`created_by`),
  KEY `thu_chi_updated_by_foreign` (`updated_by`),
  KEY `thu_chi_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `thu_chi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `thu_chi_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `nhan_vien` (`id`),
  CONSTRAINT `thu_chi_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  CONSTRAINT `thu_chi_nha_cung_cap_id_foreign` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `nha_cung_cap` (`id`),
  CONSTRAINT `thu_chi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `nhan_vien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thu_chi`
--

LOCK TABLES `thu_chi` WRITE;
/*!40000 ALTER TABLE `thu_chi` DISABLE KEYS */;
/*!40000 ALTER TABLE `thu_chi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `chu_tai_khoan_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_type_chu_tai_khoan_id_unique` (`type`,`chu_tai_khoan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (15,'truc','truc193204@gmail.com','123abc','N',9,NULL,'2017-04-14 16:45:01','2017-04-15 06:46:50'),(16,'doan','thitgaluoc94@gmail.com','thitgaluoc94','K',8,NULL,'2017-04-14 16:45:02','2017-04-14 16:45:02'),(21,'kimthoa.tran.39','willustills2me2morrow@gmail.com','12345687','N',11,NULL,'2017-04-14 19:53:29','2017-04-15 03:30:16'),(26,'bachkhoatphcm','bku@hcmut.edu.vn','12345687','K',10,NULL,'2017-04-15 03:45:30','2017-04-15 03:52:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-17 14:20:19
