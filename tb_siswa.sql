-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2022 at 01:08 PM
-- Server version: 5.7.38
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p5bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_id` int(11) UNSIGNED NOT NULL,
  `siswa_nisn` varchar(20) DEFAULT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `siswa_jk` enum('L','P') DEFAULT NULL,
  `siswa_tempat_lahir` varchar(100) DEFAULT NULL,
  `siswa_tanggal_lahir` date DEFAULT NULL,
  `siswa_agama` varchar(100) DEFAULT NULL,
  `siswa_alamat` text,
  `siswa_telepon` varchar(20) DEFAULT NULL,
  `siswa_email` varchar(100) DEFAULT NULL,
  `siswa_kelas` int(11) UNSIGNED DEFAULT NULL,
  `siswa_tahun_masuk` year(4) DEFAULT NULL,
  `siswa_tahun_lulus` year(4) DEFAULT NULL,
  `siswa_status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `siswa_foto` varchar(100) DEFAULT NULL,
  `siswa_created_at` datetime DEFAULT NULL,
  `siswa_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_id`, `siswa_nisn`, `siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_tempat_lahir`, `siswa_tanggal_lahir`, `siswa_agama`, `siswa_alamat`, `siswa_telepon`, `siswa_email`, `siswa_kelas`, `siswa_tahun_masuk`, `siswa_tahun_lulus`, `siswa_status`, `siswa_foto`, `siswa_created_at`, `siswa_updated_at`) VALUES
(1, NULL, '00748/00748.070', 'Aaisyah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(2, NULL, '00749/00749.070', 'Amelia Faidatuzzuhdah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(3, NULL, '00750/00750.070', 'Annisa Wahyuningrum', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(4, NULL, '00751/00751.070', 'Arina Manasikana', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(5, NULL, '00752/00752.070', 'Avina Alia Rahmatika', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(6, NULL, '00753/00753.070', 'Ayyu Syahri Rahmadhani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(7, NULL, '00754/00754.070', 'Chesa Salwa Afifah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(8, NULL, '00755/00755.070', 'Dini Yuliani', 'P', NULL, NULL, 'KRISTEN', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(9, NULL, '00756/00756.070', 'Erfina Ismawati', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(10, NULL, '00757/00757.070', 'Erlina Nur Halimah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(11, NULL, '00758/00758.070', 'Fellycia Prasyani Angelique', 'P', NULL, NULL, 'KRISTEN', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(12, NULL, '00759/00759.070', 'Flora Febriani Bertania', 'P', NULL, NULL, 'KRISTEN', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(13, NULL, '00760/00760.070', 'Frida Wulandari', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(14, NULL, '00761/00761.070', 'Intan Fatin Nabila', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(15, NULL, '00762/00762.070', 'Kanaya Salsabilla Aditasya', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(16, NULL, '00763/00763.070', 'Lanjar Oktavia', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(17, NULL, '00764/00764.070', 'Maria Nasya Devitasari', 'P', NULL, NULL, 'KATOLIK', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(18, NULL, '00765/00765.070', 'Maylan Nindi Windrianingsih', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(19, NULL, '00766/00766.070', 'Mutiara Rani Agustin', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(20, NULL, '00767/00767.070', 'Novita Dono Arum Kusuwandani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(21, NULL, '00768/00768.070', 'Pasha Pitaloka Rahmadhani Kamal', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(22, NULL, '00769/00769.070', 'Riska Dwi Ramadani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(23, NULL, '00770/00770.070', 'Salsabilla Putri Aulia', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(24, NULL, '00771/00771.070', 'Septiana Nur Sulistiani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(25, NULL, '00772/00772.070', 'Shifa Arielya Wulandari', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(26, NULL, '00773/00773.070', 'Yesika Febriyani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 1, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(27, NULL, '00774/00774.070', 'Aisyah Nur Faiza', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(28, NULL, '00775/00775.070', 'Anas Abdilah', 'L', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(29, NULL, '00776/00776.070', 'Anissa Eka Nur Afiana', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(30, NULL, '00777/00777.070', 'Anugerah Eka Bintang', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(31, NULL, '00778/00778.070', 'Aulia Salsabila', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(32, NULL, '00779/00779.070', 'Ayudhiya Fitriani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(33, NULL, '00780/00780.070', 'Bunga Rahmawati', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(34, NULL, '00781/00781.070', 'Dian Tahta Pagelaran', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(35, NULL, '00782/00782.070', 'Erika Widya Wardani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(36, NULL, '00783/00783.070', 'Etika Citra Wardani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(37, NULL, '00784/00784.070', 'Fadli Muhammad Rafli Rasiddin', 'L', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(38, NULL, '00785/00785.070', 'Ferlina Hanisah Ecaputri', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(39, NULL, '00786/00786.070', 'Ika Prasetyaningsih', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(40, NULL, '00787/00787.070', 'Intan Sri Susilowati', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(41, NULL, '00788/00788.070', 'Khairun Nisa', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(42, NULL, '00789/00789.070', 'Lutvi Dina Sulistiani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(43, NULL, '00790/00790.070', 'Meisa Amellia', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(44, NULL, '00791/00791.070', 'Nafisah Ramadani', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(45, NULL, '00792/00792.070', 'Nur Afiyah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(46, NULL, '00793/00793.070', 'Salsabilla Nazia Asyifa', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(47, NULL, '00794/00794.070', 'Septi Via Nurjannah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(48, NULL, '00795/00795.070', 'Sherin Claudya', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(49, NULL, '00796/00796.070', 'Silvyana Nurul Indah', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(50, NULL, '00797/00797.070', 'Sinta Damayanti', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(51, NULL, '00798/00798.070', 'Sintiya Anggraini', 'P', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL),
(52, NULL, '00799/00799.070', 'Yusuf Aditia Nur Saputra', 'L', NULL, NULL, 'ISLAM', NULL, NULL, NULL, 2, NULL, NULL, 'Aktif', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `to_kelas` (`siswa_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `to_kelas` FOREIGN KEY (`siswa_kelas`) REFERENCES `tb_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
