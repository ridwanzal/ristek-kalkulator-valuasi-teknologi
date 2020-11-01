/*
MySQL Data Transfer
Source Host: localhost
Source Database: sikav_database
Target Host: localhost
Target Database: sikav_database
Date: 01/11/2020 21.25.38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sikav_cost
-- ----------------------------
DROP TABLE IF EXISTS `sikav_cost`;
CREATE TABLE `sikav_cost` (
  `id` int(11) NOT NULL,
  `id_sinta` int(11) NOT NULL,
  `id_google` int(11) NOT NULL,
  `id_afiliasi` int(11) NOT NULL,
  `nama_inventor` varchar(128) NOT NULL,
  `email_inventor` varchar(128) NOT NULL,
  `institusi` varchar(128) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL,
  `judul_penelitian` varchar(256) NOT NULL,
  `total_biaya` double NOT NULL,
  `asal_biaya` int(11) NOT NULL,
  `lampiran` text NOT NULL,
  `ki` double NOT NULL,
  `pi` double NOT NULL,
  `atbp` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sikav_cost_nonpaten
-- ----------------------------
DROP TABLE IF EXISTS `sikav_cost_nonpaten`;
CREATE TABLE `sikav_cost_nonpaten` (
  `id` int(11) NOT NULL,
  `id_cost` int(11) NOT NULL,
  `id_sinta` int(11) NOT NULL,
  `pub_internasional` int(11) NOT NULL,
  `pub_nasional` int(11) NOT NULL,
  `buku_internasional` int(11) NOT NULL,
  `buku_nasional` int(11) NOT NULL,
  `pub_prod_internasional` int(11) NOT NULL,
  `pub_prod_nasional` int(11) NOT NULL,
  `ki` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sikav_cost_paten
-- ----------------------------
DROP TABLE IF EXISTS `sikav_cost_paten`;
CREATE TABLE `sikav_cost_paten` (
  `id` int(11) NOT NULL,
  `id_cost` int(11) NOT NULL,
  `id_sinta` int(11) NOT NULL,
  `jenis_paten` varchar(32) NOT NULL,
  `status_permohonan` varchar(32) NOT NULL,
  `no_pendaftaran` varchar(128) NOT NULL,
  `sertifikat` varchar(128) NOT NULL,
  `asal_biaya_pendaftaran` varchar(128) NOT NULL,
  `lampiran` text NOT NULL,
  `biaya_proses_lain` double NOT NULL,
  `pi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for sikav_income_discount
-- ----------------------------
DROP TABLE IF EXISTS `sikav_income_discount`;
CREATE TABLE `sikav_income_discount` (
  `d_4` double(9,3) NOT NULL,
  `d_5` double(9,3) NOT NULL,
  `d_6` double(9,3) NOT NULL,
  `d_7` double(9,3) NOT NULL,
  `d_8` double(9,3) NOT NULL,
  `d_9` double(9,3) NOT NULL,
  `d_10` double(9,3) NOT NULL,
  `d_11` double(9,3) NOT NULL,
  `d_12` double(9,3) NOT NULL,
  `d_13` double(9,3) NOT NULL,
  `d_14` double(9,3) NOT NULL,
  `d_15` double(9,3) NOT NULL,
  `d_20` double(9,3) NOT NULL,
  `d_25` double(9,3) NOT NULL,
  `d_30` double(9,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `sikav_cost` VALUES ('35', '112910', '0', '1066', 'HARIS WAHYUDI', 'haris.wahyudi@mercubuana.ac.id', 'Universitas Mercu Buana', 'Teknik Mesin', 'PENGEMBANGAN PADUAN LOGAM NANO Fe-Mn UNTUK APLIKASI BIODEGRADABLE STENT', '50000000', '0', '[{\"image_name\":\"harikesaktian.png\"}]', '320', '48', '10271739', '2020-07-12 00:00:00');
INSERT INTO `sikav_cost_nonpaten` VALUES ('34', '35', '112910', '8', '0', '0', '0', '0', '0', '0');
INSERT INTO `sikav_cost_paten` VALUES ('31', '35', '112910', 'paten_granted', 'tersertifikasi', 'S00201803592', 'IDS000002940', 'paten_granted', 'paten_granted', '0', '0');
INSERT INTO `sikav_hki` VALUES ('1', '1', null, 'ANIS MASHDUROHATUN, M. MIFTAKUL AMIN, SLAMET WIDODO', 'APLIKASI MOBILE MUSICMOO SEBAGAI SARANA PENCARIAN JUDUL LAGU', 'Paten Sederhana', '2017', '2017-01/X/012', 'terdaftar', '2017-01', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('2', '1', null, 'ANIS MASHDUROHATUN', 'METODE ISOLASI KOLAGEN DARI TULANG', 'Paten', '2017', '2017-01/SBP-0999', 'granted', '2017-01', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('3', '1', null, 'ANIS MASHDUROHATUN', 'FORMULA SABUN CAIR PENYUCI NAJIS MUGHALLADZAH', 'Paten Sederhana', '2017', '2017-099999', 'granted', '2017-099999', '2017-099999', null);
INSERT INTO `sikav_hki` VALUES ('4', '1', null, 'ANIS MASHDUROHATUN', 'SERANGKAIAN PRIMER UNTUK DETEKSI GELATIN BABI DALAM PRODUK PERMEN', 'Paten', '2019', 'S00201909101', 'terdaftar', 'S00201909101', 'S00201909101', null);
INSERT INTO `sikav_hki` VALUES ('8', '1', null, 'ANIS MASHDUROHATUN', 'KOLAGEN DARI KULIT KAMBING KACANG', 'Perlindungan Varietas Tanaman', '2020', 'S00201909101', 'granted', 'S00201909101', 'S00201909101', null);
INSERT INTO `sikav_hki` VALUES ('10', '112910', null, 'HARIS WAHYUDI', 'MESIN KOMPUTER KONTROL NUMERIK ROUTER TIGA SUMBU PORTABEL', 'Paten', '2005', 'XXX', 'terdaftar', 'XXX', 'XXX', null);
INSERT INTO `sikav_income_discount` VALUES ('0.962', '0.952', '0.943', '0.935', '0.926', '0.917', '0.909', '0.901', '0.893', '0.885', '0.877', '0.870', '0.833', '0.800', '0.769');
INSERT INTO `sikav_income_discount` VALUES ('0.925', '0.907', '0.890', '0.873', '0.857', '0.842', '0.826', '0.812', '0.797', '0.783', '0.769', '0.756', '0.694', '0.640', '0.592');
INSERT INTO `sikav_income_discount` VALUES ('0.889', '0.864', '0.840', '0.816', '0.794', '0.772', '0.751', '0.731', '0.712', '0.693', '0.675', '0.658', '0.579', '0.512', '0.455');
INSERT INTO `sikav_income_discount` VALUES ('0.855', '0.823', '0.792', '0.763', '0.735', '0.708', '0.683', '0.659', '0.636', '0.613', '0.592', '0.572', '0.482', '0.410', '0.350');
INSERT INTO `sikav_income_discount` VALUES ('0.822', '0.784', '0.747', '0.713', '0.681', '0.650', '0.621', '0.593', '0.567', '0.543', '0.519', '0.497', '0.402', '0.328', '0.269');
INSERT INTO `sikav_income_discount` VALUES ('0.790', '0.746', '0.705', '0.666', '0.630', '0.596', '0.564', '0.535', '0.507', '0.480', '0.456', '0.432', '0.335', '0.262', '0.207');
INSERT INTO `sikav_income_discount` VALUES ('0.760', '0.711', '0.665', '0.623', '0.583', '0.547', '0.513', '0.482', '0.452', '0.425', '0.400', '0.376', '0.279', '0.210', '0.159');
INSERT INTO `sikav_income_discount` VALUES ('0.731', '0.677', '0.627', '0.582', '0.540', '0.502', '0.467', '0.434', '0.404', '0.376', '0.351', '0.327', '0.233', '0.168', '0.123');
INSERT INTO `sikav_income_discount` VALUES ('0.703', '0.645', '0.592', '0.544', '0.500', '0.460', '0.424', '0.391', '0.361', '0.333', '0.308', '0.284', '0.194', '0.134', '0.094');
INSERT INTO `sikav_income_discount` VALUES ('0.676', '0.614', '0.558', '0.508', '0.463', '0.422', '0.386', '0.352', '0.322', '0.295', '0.270', '0.247', '0.162', '0.107', '0.073');
INSERT INTO `sikav_income_discount` VALUES ('0.650', '0.585', '0.527', '0.475', '0.429', '0.388', '0.350', '0.317', '0.287', '0.261', '0.237', '0.215', '0.135', '0.086', '0.056');
INSERT INTO `sikav_income_discount` VALUES ('0.625', '0.557', '0.497', '0.444', '0.397', '0.356', '0.319', '0.286', '0.257', '0.231', '0.208', '0.187', '0.112', '0.069', '0.043');
INSERT INTO `sikav_income_discount` VALUES ('0.601', '0.530', '0.469', '0.415', '0.368', '0.326', '0.290', '0.258', '0.229', '0.204', '0.182', '0.163', '0.093', '0.055', '0.033');
INSERT INTO `sikav_income_discount` VALUES ('0.577', '0.505', '0.442', '0.388', '0.340', '0.299', '0.263', '0.232', '0.205', '0.181', '0.160', '0.141', '0.078', '0.044', '0.025');
INSERT INTO `sikav_income_discount` VALUES ('0.555', '0.481', '0.417', '0.362', '0.315', '0.275', '0.239', '0.209', '0.183', '0.160', '0.140', '0.123', '0.065', '0.035', '0.020');
INSERT INTO `sikav_income_discount` VALUES ('0.534', '0.458', '0.394', '0.339', '0.292', '0.252', '0.218', '0.188', '0.163', '0.141', '0.123', '0.107', '0.054', '0.028', '0.015');
INSERT INTO `sikav_income_discount` VALUES ('0.513', '0.436', '0.371', '0.317', '0.270', '0.231', '0.198', '0.170', '0.146', '0.125', '0.108', '0.093', '0.045', '0.023', '0.012');
INSERT INTO `sikav_income_discount` VALUES ('0.494', '0.416', '0.350', '0.296', '0.250', '0.212', '0.180', '0.153', '0.130', '0.111', '0.095', '0.081', '0.038', '0.018', '0.009');
INSERT INTO `sikav_income_discount` VALUES ('0.475', '0.396', '0.331', '0.277', '0.232', '0.194', '0.164', '0.138', '0.116', '0.098', '0.083', '0.070', '0.031', '0.014', '0.007');
INSERT INTO `sikav_income_discount` VALUES ('0.456', '0.377', '0.312', '0.258', '0.215', '0.178', '0.149', '0.124', '0.104', '0.087', '0.073', '0.061', '0.026', '0.012', '0.005');
INSERT INTO `sikav_income_discount` VALUES ('0.422', '0.377', '0.312', '0.258', '0.215', '0.178', '0.149', '0.124', '0.104', '0.087', '0.073', '0.061', '0.026', '0.012', '0.005');
INSERT INTO `sikav_income_discount` VALUES ('0.422', '0.342', '0.278', '0.226', '0.184', '0.150', '0.123', '0.101', '0.083', '0.068', '0.056', '0.046', '0.018', '0.007', '0.003');
INSERT INTO `sikav_income_discount` VALUES ('0.422', '0.342', '0.278', '0.226', '0.184', '0.150', '0.123', '0.101', '0.083', '0.068', '0.056', '0.046', '0.018', '0.007', '0.003');
INSERT INTO `sikav_income_discount` VALUES ('0.390', '0.310', '0.247', '0.197', '0.158', '0.126', '0.102', '0.082', '0.066', '0.053', '0.043', '0.035', '0.013', '0.005', '0.002');
INSERT INTO `sikav_income_discount` VALUES ('0.390', '0.295', '0.233', '0.184', '0.146', '0.116', '0.092', '0.074', '0.059', '0.047', '0.038', '0.030', '0.010', '0.004', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.375', '0.295', '0.233', '0.184', '0.146', '0.116', '0.092', '0.074', '0.059', '0.047', '0.038', '0.030', '0.010', '0.004', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.375', '0.295', '0.233', '0.184', '0.146', '0.116', '0.092', '0.074', '0.059', '0.047', '0.038', '0.030', '0.010', '0.004', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.375', '0.295', '0.233', '0.184', '0.146', '0.116', '0.092', '0.074', '0.059', '0.047', '0.038', '0.030', '0.010', '0.004', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.375', '0.295', '0.233', '0.184', '0.146', '0.116', '0.092', '0.074', '0.059', '0.047', '0.038', '0.030', '0.010', '0.004', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.308', '0.231', '0.174', '0.131', '0.099', '0.075', '0.057', '0.044', '0.033', '0.026', '0.020', '0.015', '0.004', '0.001', '0.001');
INSERT INTO `sikav_income_discount` VALUES ('0.308', '0.231', '0.174', '0.131', '0.099', '0.075', '0.057', '0.044', '0.033', '0.026', '0.020', '0.015', '0.004', '0.001', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.308', '0.231', '0.174', '0.131', '0.099', '0.075', '0.057', '0.044', '0.033', '0.026', '0.020', '0.015', '0.004', '0.001', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.308', '0.231', '0.174', '0.131', '0.099', '0.075', '0.057', '0.044', '0.033', '0.026', '0.020', '0.015', '0.004', '0.001', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.308', '0.231', '0.174', '0.131', '0.099', '0.075', '0.057', '0.044', '0.033', '0.026', '0.020', '0.015', '0.004', '0.001', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.253', '0.181', '0.130', '0.094', '0.068', '0.049', '0.036', '0.026', '0.019', '0.014', '0.010', '0.008', '0.002', '0.000', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.253', '0.181', '0.130', '0.094', '0.068', '0.049', '0.036', '0.026', '0.019', '0.014', '0.010', '0.008', '0.002', '0.000', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.253', '0.181', '0.130', '0.094', '0.068', '0.049', '0.036', '0.026', '0.019', '0.014', '0.010', '0.008', '0.002', '0.000', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.253', '0.181', '0.130', '0.094', '0.068', '0.049', '0.036', '0.026', '0.019', '0.014', '0.010', '0.008', '0.002', '0.000', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.253', '0.181', '0.130', '0.094', '0.068', '0.049', '0.036', '0.026', '0.019', '0.014', '0.010', '0.008', '0.002', '0.000', '0.000');
INSERT INTO `sikav_income_discount` VALUES ('0.208', '0.142', '0.097', '0.067', '0.046', '0.032', '0.022', '0.015', '0.011', '0.008', '0.005', '0.004', '0.001', '0.000', '0.000');
INSERT INTO `sikav_income_hki` VALUES ('1', '112910', null, null, 'Paten', 'S00201803592', 'PROSES PENGUJIAN MIKRO FATIK', '2018', '-', 'Dr. Ir. Haftirman, MEng.,Haris Wahyudi, ST. M.Sc,Nur Indah. S. ST., MT,Prof, (em) Dr. - Ing. Ir. Darwin Sebayang', 'granted', '2017/S/00402', '2017-07-07', 'IDS000002940', '2020-03-03');
INSERT INTO `sikav_income_hki` VALUES ('2', '112910', null, null, 'Paten', 'P00201802912', 'ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA', '2018', '-', 'ARBI DIMYATI,DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO', 'granted', '2018/11550', '2018-10-25', 'IDP000067783', '2020-02-28');
INSERT INTO `sikav_income_hki` VALUES ('3', '112910', null, '32606', 'paten', 'P00201707747', 'MESIN KOMPUTER KONTROL NUMERIK ROUTER TIGA SUMBU PORTABEL', '2017', '', 'Darwin Sebayang,Haris Wahyudi,Julpri Andika,Sugiarto', '', '2018/05446', '2018-05-25', 'IDP000057134', '2019-03-12');
INSERT INTO `sikav_income_hki` VALUES ('4', '112910', null, '35309', 'paten', 'P00201902221', 'TEKNIK PENGEMBANGAN NANO MATERIAL PADUAN FEMN', '2019', '', 'DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO,KONTAN TARIGAN', '', '2019/07101', '2019-09-27', '', '0000-00-00');
INSERT INTO `sikav_income_hki` VALUES ('5', '112910', null, '35322', 'paten', 'S00201701825', 'SISTEM PERALATAN PENGUJIAN MIKRO FATIK', '2017', '', 'Darwin Sebayang,Haftirman,Haris Wahyudi,Nur Indah', '', '2017/S/00402', '2017-07-07', 'IDS000001859', '2018-05-30');
INSERT INTO `sikav_income_hki` VALUES ('6', '112910', null, '35332', 'paten', 'S00201803592', 'PROSES PENGUJIAN MIKRO FATIK', '2018', '', 'Dr. Ir. Haftirman, MEng.,Haris Wahyudi, ST. M.Sc,Nur Indah. S. ST., MT,Prof, (em) Dr. - Ing. Ir. Darwin Sebayang', '', '2017/S/00402', '2017-07-07', 'IDS000002940', '2020-03-03');
INSERT INTO `sikav_income_hki` VALUES ('7', '112910', null, '35330', 'paten', 'P00201802912', 'ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA', '2018', '', 'ARBI DIMYATI,DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO', '', '2018/11550', '2018-10-25', 'IDP000067783', '2020-02-28');
INSERT INTO `sikav_income_hki` VALUES ('8', '112910', null, '35326', 'paten', 'S00201701826', 'PANEL PRAKTIKUM 2 (DUA)SISI PNEUMATIK/HIDROLIK', '2017', '', 'DARWIN SEBAYANG,HAFTIRMAN,HARIS WAHYUDI,I GUSTI AYU ARWATI,NUR INDAH', '', '2017/S/00398', '2017-07-07', 'IDS000001842', '2018-05-17');
INSERT INTO `sikav_income_kalkulasi` VALUES ('12', '112910', '1', 'Dr. Ir. Haftirman, MEng.,Haris Wahyudi, ST. M.Sc,Nur Indah. S. ST., MT,Prof, (em) Dr. - Ing. Ir. Darwin Sebayang', 'PROSES PENGUJIAN MIKRO FATIK', '5', '18000000000.00', '11.00', '1000000.00', 'persen2', '150000.00', '10.00', '3600.00', '50.00', '1800.00', '90.00', '35547200.00', '50121552.00', '103.00', '7978592000.00', '2596000000.00', '100000000.00', '15.00', '1371946666.00', '5.00', '20000000.00', '300000000.00', '997324000.00', '33802936489.57', null, null, null, null);
INSERT INTO `sikav_income_kalkulasi` VALUES ('13', '112910', '8', 'DARWIN SEBAYANG,HAFTIRMAN,HARIS WAHYUDI,I GUSTI AYU ARWATI,NUR INDAH', 'PANEL PRAKTIKUM 2 (DUA)SISI PNEUMATIK/HIDROLIK', '5', '18000000000.00', '11.00', '1000000.00', 'persen2', '150000.00', '10.00', '3600.00', '50.00', '1800.00', '90.00', '35547200.00', '50121552.00', '103.00', '7978592000.00', '2596000000.00', '100000000.00', '15.00', '1371946666.00', '5.00', '20000000.00', '300000000.00', '997324000.00', '33802936489.57', null, null, null, null);
