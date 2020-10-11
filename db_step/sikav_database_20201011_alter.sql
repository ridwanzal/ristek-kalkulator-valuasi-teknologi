-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2020 at 04:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikav_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `sikav_cost`
--

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

--
-- Dumping data for table `sikav_cost`
--

INSERT INTO `sikav_cost` (`id`, `id_sinta`, `id_google`, `id_afiliasi`, `nama_inventor`, `email_inventor`, `institusi`, `unit_kerja`, `judul_penelitian`, `total_biaya`, `asal_biaya`, `lampiran`, `ki`, `pi`, `atbp`, `tanggal`) VALUES
(35, 112910, 0, 1066, 'HARIS WAHYUDI', 'haris.wahyudi@mercubuana.ac.id', 'Universitas Mercu Buana', 'Teknik Mesin', 'PENGEMBANGAN PADUAN LOGAM NANO Fe-Mn UNTUK APLIKASI BIODEGRADABLE STENT', 50000000, 0, '[{\"image_name\":\"harikesaktian.png\"}]', 320, 48, 10271739, '2020-07-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sikav_cost_nonpaten`
--

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

--
-- Dumping data for table `sikav_cost_nonpaten`
--

INSERT INTO `sikav_cost_nonpaten` (`id`, `id_cost`, `id_sinta`, `pub_internasional`, `pub_nasional`, `buku_internasional`, `buku_nasional`, `pub_prod_internasional`, `pub_prod_nasional`, `ki`) VALUES
(34, 35, 112910, 8, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sikav_cost_paten`
--

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

--
-- Dumping data for table `sikav_cost_paten`
--

INSERT INTO `sikav_cost_paten` (`id`, `id_cost`, `id_sinta`, `jenis_paten`, `status_permohonan`, `no_pendaftaran`, `sertifikat`, `asal_biaya_pendaftaran`, `lampiran`, `biaya_proses_lain`, `pi`) VALUES
(31, 35, 112910, 'paten_granted', 'tersertifikasi', 'S00201803592', 'IDS000002940', 'paten_granted', 'paten_granted', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sikav_hki`
--

CREATE TABLE `sikav_hki` (
  `hki_id` bigint(20) NOT NULL,
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
  `berkas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sikav_hki`
--

INSERT INTO `sikav_hki` (`hki_id`, `sinta_id`, `email`, `inventor`, `judul`, `jenis`, `tahun`, `no_daftar`, `status`, `no_hki`, `url_hki`, `berkas`) VALUES
(1, 1, NULL, 'ANIS MASHDUROHATUN, M. MIFTAKUL AMIN, SLAMET WIDODO', 'APLIKASI MOBILE MUSICMOO SEBAGAI SARANA PENCARIAN JUDUL LAGU', 'Paten Sederhana', 2017, '2017-01/X/012', 'terdaftar', '2017-01', '2017-099999', NULL),
(2, 1, NULL, 'ANIS MASHDUROHATUN', 'METODE ISOLASI KOLAGEN DARI TULANG', 'Paten', 2017, '2017-01/SBP-0999', 'granted', '2017-01', '2017-099999', NULL),
(3, 1, NULL, 'ANIS MASHDUROHATUN', 'FORMULA SABUN CAIR PENYUCI NAJIS MUGHALLADZAH', 'Paten Sederhana', 2017, '2017-099999', 'granted', '2017-099999', '2017-099999', NULL),
(4, 1, NULL, 'ANIS MASHDUROHATUN', 'SERANGKAIAN PRIMER UNTUK DETEKSI GELATIN BABI DALAM PRODUK PERMEN', 'Paten', 2019, 'S00201909101', 'terdaftar', 'S00201909101', 'S00201909101', NULL),
(8, 1, NULL, 'ANIS MASHDUROHATUN', 'KOLAGEN DARI KULIT KAMBING KACANG', 'Perlindungan Varietas Tanaman', 2020, 'S00201909101', 'granted', 'S00201909101', 'S00201909101', NULL),
(10, 112910, NULL, 'HARIS WAHYUDI', 'MESIN KOMPUTER KONTROL NUMERIK ROUTER TIGA SUMBU PORTABEL', 'Paten', 2005, 'XXX', 'terdaftar', 'XXX', 'XXX', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sikav_income_discount`
--

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

--
-- Dumping data for table `sikav_income_discount`
--

INSERT INTO `sikav_income_discount` (`d_4`, `d_5`, `d_6`, `d_7`, `d_8`, `d_9`, `d_10`, `d_11`, `d_12`, `d_13`, `d_14`, `d_15`, `d_20`, `d_25`, `d_30`) VALUES
(0.962, 0.952, 0.943, 0.935, 0.926, 0.917, 0.909, 0.901, 0.893, 0.885, 0.877, 0.870, 0.833, 0.800, 0.769),
(0.925, 0.907, 0.890, 0.873, 0.857, 0.842, 0.826, 0.812, 0.797, 0.783, 0.769, 0.756, 0.694, 0.640, 0.592),
(0.889, 0.864, 0.840, 0.816, 0.794, 0.772, 0.751, 0.731, 0.712, 0.693, 0.675, 0.658, 0.579, 0.512, 0.455),
(0.855, 0.823, 0.792, 0.763, 0.735, 0.708, 0.683, 0.659, 0.636, 0.613, 0.592, 0.572, 0.482, 0.410, 0.350),
(0.822, 0.784, 0.747, 0.713, 0.681, 0.650, 0.621, 0.593, 0.567, 0.543, 0.519, 0.497, 0.402, 0.328, 0.269),
(0.790, 0.746, 0.705, 0.666, 0.630, 0.596, 0.564, 0.535, 0.507, 0.480, 0.456, 0.432, 0.335, 0.262, 0.207),
(0.760, 0.711, 0.665, 0.623, 0.583, 0.547, 0.513, 0.482, 0.452, 0.425, 0.400, 0.376, 0.279, 0.210, 0.159),
(0.731, 0.677, 0.627, 0.582, 0.540, 0.502, 0.467, 0.434, 0.404, 0.376, 0.351, 0.327, 0.233, 0.168, 0.123),
(0.703, 0.645, 0.592, 0.544, 0.500, 0.460, 0.424, 0.391, 0.361, 0.333, 0.308, 0.284, 0.194, 0.134, 0.094),
(0.676, 0.614, 0.558, 0.508, 0.463, 0.422, 0.386, 0.352, 0.322, 0.295, 0.270, 0.247, 0.162, 0.107, 0.073),
(0.650, 0.585, 0.527, 0.475, 0.429, 0.388, 0.350, 0.317, 0.287, 0.261, 0.237, 0.215, 0.135, 0.086, 0.056),
(0.625, 0.557, 0.497, 0.444, 0.397, 0.356, 0.319, 0.286, 0.257, 0.231, 0.208, 0.187, 0.112, 0.069, 0.043),
(0.601, 0.530, 0.469, 0.415, 0.368, 0.326, 0.290, 0.258, 0.229, 0.204, 0.182, 0.163, 0.093, 0.055, 0.033),
(0.577, 0.505, 0.442, 0.388, 0.340, 0.299, 0.263, 0.232, 0.205, 0.181, 0.160, 0.141, 0.078, 0.044, 0.025),
(0.555, 0.481, 0.417, 0.362, 0.315, 0.275, 0.239, 0.209, 0.183, 0.160, 0.140, 0.123, 0.065, 0.035, 0.020),
(0.534, 0.458, 0.394, 0.339, 0.292, 0.252, 0.218, 0.188, 0.163, 0.141, 0.123, 0.107, 0.054, 0.028, 0.015),
(0.513, 0.436, 0.371, 0.317, 0.270, 0.231, 0.198, 0.170, 0.146, 0.125, 0.108, 0.093, 0.045, 0.023, 0.012),
(0.494, 0.416, 0.350, 0.296, 0.250, 0.212, 0.180, 0.153, 0.130, 0.111, 0.095, 0.081, 0.038, 0.018, 0.009),
(0.475, 0.396, 0.331, 0.277, 0.232, 0.194, 0.164, 0.138, 0.116, 0.098, 0.083, 0.070, 0.031, 0.014, 0.007),
(0.456, 0.377, 0.312, 0.258, 0.215, 0.178, 0.149, 0.124, 0.104, 0.087, 0.073, 0.061, 0.026, 0.012, 0.005),
(0.422, 0.377, 0.312, 0.258, 0.215, 0.178, 0.149, 0.124, 0.104, 0.087, 0.073, 0.061, 0.026, 0.012, 0.005),
(0.422, 0.342, 0.278, 0.226, 0.184, 0.150, 0.123, 0.101, 0.083, 0.068, 0.056, 0.046, 0.018, 0.007, 0.003),
(0.422, 0.342, 0.278, 0.226, 0.184, 0.150, 0.123, 0.101, 0.083, 0.068, 0.056, 0.046, 0.018, 0.007, 0.003),
(0.390, 0.310, 0.247, 0.197, 0.158, 0.126, 0.102, 0.082, 0.066, 0.053, 0.043, 0.035, 0.013, 0.005, 0.002),
(0.390, 0.295, 0.233, 0.184, 0.146, 0.116, 0.092, 0.074, 0.059, 0.047, 0.038, 0.030, 0.010, 0.004, 0.001),
(0.375, 0.295, 0.233, 0.184, 0.146, 0.116, 0.092, 0.074, 0.059, 0.047, 0.038, 0.030, 0.010, 0.004, 0.001),
(0.375, 0.295, 0.233, 0.184, 0.146, 0.116, 0.092, 0.074, 0.059, 0.047, 0.038, 0.030, 0.010, 0.004, 0.001),
(0.375, 0.295, 0.233, 0.184, 0.146, 0.116, 0.092, 0.074, 0.059, 0.047, 0.038, 0.030, 0.010, 0.004, 0.001),
(0.375, 0.295, 0.233, 0.184, 0.146, 0.116, 0.092, 0.074, 0.059, 0.047, 0.038, 0.030, 0.010, 0.004, 0.001),
(0.308, 0.231, 0.174, 0.131, 0.099, 0.075, 0.057, 0.044, 0.033, 0.026, 0.020, 0.015, 0.004, 0.001, 0.001),
(0.308, 0.231, 0.174, 0.131, 0.099, 0.075, 0.057, 0.044, 0.033, 0.026, 0.020, 0.015, 0.004, 0.001, 0.000),
(0.308, 0.231, 0.174, 0.131, 0.099, 0.075, 0.057, 0.044, 0.033, 0.026, 0.020, 0.015, 0.004, 0.001, 0.000),
(0.308, 0.231, 0.174, 0.131, 0.099, 0.075, 0.057, 0.044, 0.033, 0.026, 0.020, 0.015, 0.004, 0.001, 0.000),
(0.308, 0.231, 0.174, 0.131, 0.099, 0.075, 0.057, 0.044, 0.033, 0.026, 0.020, 0.015, 0.004, 0.001, 0.000),
(0.253, 0.181, 0.130, 0.094, 0.068, 0.049, 0.036, 0.026, 0.019, 0.014, 0.010, 0.008, 0.002, 0.000, 0.000),
(0.253, 0.181, 0.130, 0.094, 0.068, 0.049, 0.036, 0.026, 0.019, 0.014, 0.010, 0.008, 0.002, 0.000, 0.000),
(0.253, 0.181, 0.130, 0.094, 0.068, 0.049, 0.036, 0.026, 0.019, 0.014, 0.010, 0.008, 0.002, 0.000, 0.000),
(0.253, 0.181, 0.130, 0.094, 0.068, 0.049, 0.036, 0.026, 0.019, 0.014, 0.010, 0.008, 0.002, 0.000, 0.000),
(0.253, 0.181, 0.130, 0.094, 0.068, 0.049, 0.036, 0.026, 0.019, 0.014, 0.010, 0.008, 0.002, 0.000, 0.000),
(0.208, 0.142, 0.097, 0.067, 0.046, 0.032, 0.022, 0.015, 0.011, 0.008, 0.005, 0.004, 0.001, 0.000, 0.000);

-- --------------------------------------------------------

--
-- Table structure for table `sikav_income_hki`
--

CREATE TABLE `sikav_income_hki` (
  `hki_id` bigint(20) NOT NULL,
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
  `tgl_registrasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sikav_income_hki`
--

INSERT INTO `sikav_income_hki` (`hki_id`, `sinta_id`, `email`, `id`, `kategori`, `nomor_permohonan`, `title`, `tahun_permohonan`, `pemegang_paten`, `inventor`, `status`, `no_publikasi`, `tgl_publikasi`, `no_registrasi`, `tgl_registrasi`) VALUES
(1, 112910, NULL, NULL, 'Paten', 'S00201803592', 'PROSES PENGUJIAN MIKRO FATIK', 2018, '-', 'Dr. Ir. Haftirman, MEng.,Haris Wahyudi, ST. M.Sc,Nur Indah. S. ST., MT,Prof, (em) Dr. - Ing. Ir. Darwin Sebayang', 'granted', '2017/S/00402', '2017-07-07', 'IDS000002940', '2020-03-03'),
(2, 112910, NULL, NULL, 'Paten', 'P00201802912', 'ALAT KERJA MULTI FUNGSI BERBASIS BUSUR PLASMA', 2018, '-', 'ARBI DIMYATI,DARWIN SEBAYANG,HARIS WAHYUDI,HENDI SARYANTO', 'granted', '2018/11550', '2018-10-25', 'IDP000067783', '2020-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `sikav_users`
--

CREATE TABLE `sikav_users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sikav_cost`
--
ALTER TABLE `sikav_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sikav_cost_nonpaten`
--
ALTER TABLE `sikav_cost_nonpaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_nonpaten` (`id_cost`);

--
-- Indexes for table `sikav_cost_paten`
--
ALTER TABLE `sikav_cost_paten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_paten` (`id_cost`);

--
-- Indexes for table `sikav_hki`
--
ALTER TABLE `sikav_hki`
  ADD PRIMARY KEY (`hki_id`);

--
-- Indexes for table `sikav_income_hki`
--
ALTER TABLE `sikav_income_hki`
  ADD PRIMARY KEY (`hki_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sikav_cost`
--
ALTER TABLE `sikav_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sikav_cost_nonpaten`
--
ALTER TABLE `sikav_cost_nonpaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sikav_cost_paten`
--
ALTER TABLE `sikav_cost_paten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sikav_hki`
--
ALTER TABLE `sikav_hki`
  MODIFY `hki_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sikav_income_hki`
--
ALTER TABLE `sikav_income_hki`
  MODIFY `hki_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sikav_cost_nonpaten`
--
ALTER TABLE `sikav_cost_nonpaten`
  ADD CONSTRAINT `cost_nonpaten` FOREIGN KEY (`id_cost`) REFERENCES `sikav_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sikav_cost_paten`
--
ALTER TABLE `sikav_cost_paten`
  ADD CONSTRAINT `cost_paten` FOREIGN KEY (`id_cost`) REFERENCES `sikav_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
