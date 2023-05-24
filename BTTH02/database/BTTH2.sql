-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.11.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for btth2
CREATE DATABASE IF NOT EXISTS `btth2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `btth2`;

-- Dumping structure for table btth2.giangvien
CREATE TABLE IF NOT EXISTS `giangvien` (
  `IDGiangVien` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL DEFAULT '@',
  `MatKhau` varchar(100) NOT NULL,
  `SDT` bigint(100) NOT NULL,
  PRIMARY KEY (`IDGiangVien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.khoahoc
CREATE TABLE IF NOT EXISTS `khoahoc` (
  `IDKhoaHoc` int(11) NOT NULL AUTO_INCREMENT,
  `MaKhoaHoc` varchar(50) NOT NULL,
  `TieuDe` varchar(100) NOT NULL,
  `MoTa` varchar(1000) NOT NULL,
  `TenKhoaHoc` varchar(100) NOT NULL,
  `GiaDoan` varchar(100) NOT NULL,
  `HocKy` int(11) NOT NULL,
  PRIMARY KEY (`IDKhoaHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.lop
CREATE TABLE IF NOT EXISTS `lop` (
  `IDLop` int(11) NOT NULL AUTO_INCREMENT,
  `IDKhoaHoc` int(11) NOT NULL,
  `IDGiangVien` int(11) NOT NULL,
  `KhoangThoiGia` datetime NOT NULL,
  PRIMARY KEY (`IDLop`),
  KEY `FK_lop_khoahoc` (`IDKhoaHoc`),
  KEY `FK_lop_giangvien` (`IDGiangVien`),
  CONSTRAINT `FK_lop_giangvien` FOREIGN KEY (`IDGiangVien`) REFERENCES `giangvien` (`IDGiangVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_lop_khoahoc` FOREIGN KEY (`IDKhoaHoc`) REFERENCES `khoahoc` (`IDKhoaHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.quantrivien
CREATE TABLE IF NOT EXISTS `quantrivien` (
  `IDQtv` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  PRIMARY KEY (`IDQtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.sinhvien
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `IDSinhVien` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(50) NOT NULL DEFAULT '@',
  `SDT` int(11) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  PRIMARY KEY (`IDSinhVien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.suthamdu
CREATE TABLE IF NOT EXISTS `suthamdu` (
  `NgayThamDu` datetime DEFAULT NULL,
  `IDKhoaHoc` int(11) NOT NULL,
  `IDSinhVien` int(11) NOT NULL,
  `IDLop` int(11) NOT NULL,
  `TrangThaiThamDu` int(11) NOT NULL,
  KEY `FK_suthamdu_sinhvien` (`IDSinhVien`),
  KEY `FK_suthamdu_khoahoc` (`IDKhoaHoc`),
  KEY `FK_suthamdu_lop` (`IDLop`),
  CONSTRAINT `FK_suthamdu_khoahoc` FOREIGN KEY (`IDKhoaHoc`) REFERENCES `khoahoc` (`IDKhoaHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_suthamdu_lop` FOREIGN KEY (`IDLop`) REFERENCES `lop` (`IDLop`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_suthamdu_sinhvien` FOREIGN KEY (`IDSinhVien`) REFERENCES `sinhvien` (`IDSinhVien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table btth2.thamgiakhoahoc
CREATE TABLE IF NOT EXISTS `thamgiakhoahoc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDKhoaHoc` int(11) NOT NULL,
  `IDSinhVien` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_thamgiakhoahoc_khoahoc` (`IDKhoaHoc`),
  KEY `FK_thamgiakhoahoc_sinhvien` (`IDSinhVien`),
  CONSTRAINT `FK_thamgiakhoahoc_khoahoc` FOREIGN KEY (`IDKhoaHoc`) REFERENCES `khoahoc` (`IDKhoaHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_thamgiakhoahoc_sinhvien` FOREIGN KEY (`IDSinhVien`) REFERENCES `sinhvien` (`IDSinhVien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
