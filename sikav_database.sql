/*
MySQL Data Transfer
Source Host: localhost
Source Database: sikav_database
Target Host: localhost
Target Database: sikav_database
Date: 19/09/2020 10.03.01
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sikav_hki
-- ----------------------------
DROP TABLE IF EXISTS `sikav_hki`;
CREATE TABLE `sikav_hki` (
  `hki_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sinta_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `inventor` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `no_daftar` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `no_hki` varchar(100) DEFAULT NULL,
  `url_hki` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hki_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sikav_users
-- ----------------------------
DROP TABLE IF EXISTS `sikav_users`;
CREATE TABLE `sikav_users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `sikav_hki` VALUES ('1', '1', null, 'ANIS MASHDUROHATUN', 'APLIKASI MOBILE MUSICMOO SEBAGAI SARANA PENCARIAN JUDUL LAGU', 'Paten Sederhana', '2017', '2017-01/X/012', 'terdaftar', '2017-01', null, null);
INSERT INTO `sikav_hki` VALUES ('2', '1', null, 'ANIS MASHDUROHATUN', 'Spektroskopi Vibrasional: Teori dan Aplikasinya untuk Analisis Farmasi', 'Paten', '2017', '2017-01/SBP-0999', 'terdaftar', '2017-01', null, null);
