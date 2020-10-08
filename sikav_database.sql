/*
MySQL Data Transfer
Source Host: localhost
Source Database: sikav_database
Target Host: localhost
Target Database: sikav_database
Date: 07/10/2020 19.30.45
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sikav_income_hki
-- ----------------------------
DROP TABLE IF EXISTS `sikav_income_hki`;
CREATE TABLE `sikav_income_hki` (
  `hki_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sinta_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `nomor_permohonan` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tahun_permohonan` year(4) DEFAULT NULL,
  `pemegang_paten` varchar(255) DEFAULT NULL,
  `inventor` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `no_publikasi` varchar(100) DEFAULT NULL,
  `tgl_publikasi` date DEFAULT NULL,
  `no_registrasi` varchar(100) DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL,
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
INSERT INTO `sikav_hki` VALUES ('1', '1', null, 'ANIS MASHDUROHATUN, M. MIFTAKUL AMIN, SLAMET WIDODO', 'APLIKASI MOBILE MUSICMOO SEBAGAI SARANA PENCARIAN JUDUL LAGU', 'Paten Sederhana', '2017', '2017-01/X/012', 'terdaftar', '2017-01', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('2', '1', null, 'ANIS MASHDUROHATUN', 'METODE ISOLASI KOLAGEN DARI TULANG', 'Paten', '2017', '2017-01/SBP-0999', 'granted', '2017-01', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('3', '1', null, 'ANIS MASHDUROHATUN', 'FORMULA SABUN CAIR PENYUCI NAJIS MUGHALLADZAH', 'Paten Sederhana', '2017', '2017-099999', 'granted', '2017-099999', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('4', '1', null, 'ANIS MASHDUROHATUN', 'SERANGKAIAN PRIMER UNTUK DETEKSI GELATIN BABI DALAM PRODUK PERMEN', 'Paten', '2019', 'S00201909101', 'terdaftar', 'S00201909101', 'S00201909101', null);
INSERT INTO `sikav_hki` VALUES ('8', '1', null, 'ANIS MASHDUROHATUN', 'KOLAGEN DARI KULIT KAMBING KACANG', 'Perlindungan Varietas Tanaman', '2020', 'S00201909101', 'granted', 'S00201909101', 'S00201909101', null);
INSERT INTO `sikav_hki` VALUES ('10', '112910', null, 'HARIS WAHYUDI', 'MESIN KOMPUTER KONTROL NUMERIK ROUTER TIGA SUMBU PORTABEL', 'Paten', '2005', 'XXX', 'terdaftar', 'XXX', 'XXX', null);
INSERT INTO `sikav_income_hki` VALUES ('1', '112910', null, null, 'Paten', 'S00201803592', 'PROSES PENGUJIAN MIKRO FATIK', '2018', '-', 'Dr. Ir. Haftirman, MEng.,Haris Wahyudi, ST. M.Sc,Nur Indah. S. ST., MT,Prof, (em) Dr. - Ing. Ir. Darwin Sebayang', 'granted', '2017/S/00402', '2017-07-07', 'IDS000002940', '2020-03-03');
INSERT INTO `sikav_income_hki` VALUES ('2', '112910', null, null, 'Paten', 'P00201802912', 'ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA', '2018', '-', 'ARBI DIMYATI,DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO', 'granted', '2018/11550', '2018-10-25', 'IDP000067783', '2020-02-28');
