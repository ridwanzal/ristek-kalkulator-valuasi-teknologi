/*
MySQL Data Transfer
Source Host: localhost
Source Database: sikav_database
Target Host: localhost
Target Database: sikav_database
Date: 02/05/2021 15.11.02
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sikav_income_kalkulasi
-- ----------------------------
DROP TABLE IF EXISTS `sikav_income_kalkulasi`;
CREATE TABLE `sikav_income_kalkulasi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sinta_id` bigint(20) DEFAULT NULL,
  `hki_id` bigint(20) NOT NULL,
  `hki_inventor` text DEFAULT NULL,
  `hki_judul` varchar(255) DEFAULT NULL,
  `periode` int(9) DEFAULT NULL,
  `modal` double(20,2) DEFAULT NULL,
  `sukubunga` decimal(20,2) DEFAULT NULL,
  `marketsize` double(20,2) DEFAULT 0.00,
  `marketshare` char(10) DEFAULT '',
  `pagu_maksimal` double(20,2) DEFAULT 0.00,
  `discount_factor` double(9,2) DEFAULT NULL,
  `target` double(9,2) DEFAULT NULL,
  `marketshare_persen` double(9,2) DEFAULT NULL,
  `qty_tahun1` double(9,2) DEFAULT NULL,
  `marketshare_tahun2` decimal(20,2) DEFAULT NULL,
  `biaya_cogs` double(20,2) DEFAULT NULL,
  `harga_tahun1` double(20,2) DEFAULT NULL,
  `harga_tahun2` double(20,2) DEFAULT NULL,
  `biaya_investasi` double(20,2) DEFAULT NULL,
  `biaya_riset` double(20,2) DEFAULT NULL,
  `biaya_lisensi` double(20,2) DEFAULT NULL,
  `persen_lisensi` double(20,2) DEFAULT NULL,
  `biaya_tetap` double(20,2) DEFAULT NULL,
  `biaya_marketing` double(20,2) DEFAULT NULL,
  `biaya_perawatan` double(20,2) DEFAULT NULL,
  `biaya_warehouse` double(20,2) DEFAULT NULL,
  `biaya_depresiasi` double(20,2) DEFAULT NULL,
  `nilai_npv` double(20,2) DEFAULT NULL,
  `item_cogs` text DEFAULT NULL,
  `item_harga` text DEFAULT NULL,
  `item_fcost` text DEFAULT NULL,
  `item_investasi` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `sikav_income_kalkulasi` VALUES ('15', '112910', '8', 'DARWIN SEBAYANG,HAFTIRMAN,HARIS WAHYUDI,I GUSTI AYU ARWATI,NUR INDAH', 'PANEL PRAKTIKUM 2 (DUA)SISI PNEUMATIK/HIDROLIK', '5', '18000000000.00', '11.00', '1000000.00', 'persen2', '150000.00', '20.00', '3600.00', '50.00', '1800.00', '90.00', '35547200.00', '50000000.00', '103.00', '7978592000.00', '2596000000.00', '100000000.00', '15.00', '1371946666.00', '5.00', '20000000.00', '300000000.00', '997324000.00', '23754415854.06', null, null, null, null, '2021-05-02 14:33:41');
INSERT INTO `sikav_income_kalkulasi` VALUES ('16', '112910', '2', 'ARBI DIMYATI,DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO', 'ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA', '5', '18000000000.00', '11.00', '1000000.00', 'persen2', '150000.00', '10.00', '3600.00', '50.00', '1800.00', '90.00', '35547200.00', '50121552.00', '103.00', '7978592000.00', '2596000000.00', '100000000.00', '15.00', '1371946666.00', '5.00', '20000000.00', '300000000.00', '997324000.00', '33348262383.51', null, null, null, null, '2021-05-02 14:33:50');
INSERT INTO `sikav_income_kalkulasi` VALUES ('17', '6074662', '17', 'M.Miftakhul Amin,S.Kom,M.Eng,Slamet Widodo,S.Kom,M.Kom', 'SISTEM PENDETEKSI GAS CO,CO2 DAN CH4 PADA RUANGAN TERTUTUP DENGAN PENGATURAN TINGKAT KECEPATAN MOTOR DC SESUAI KADAR PALUTAN PPM PEMBACAAN SENSOR', '5', '18000000000.00', '11.00', '3600.00', 'persen3', '360.00', '10.00', '3600.00', '50.00', '1800.00', '90.00', '35547200.00', '50000000.00', '103.00', '7978592000.00', '2596000000.00', '100000000.00', '15.00', '1371946666.00', '5.00', '20000000.00', '300000000.00', '997324000.00', '32267533906.14', null, null, null, null, '2021-05-02 09:54:05');
