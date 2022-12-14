-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2022 at 10:53 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `aspek_penilaian`
--

CREATE TABLE `aspek_penilaian` (
  `aspek_id` int(11) NOT NULL,
  `dimensi_id` int(11) UNSIGNED NOT NULL,
  `rencana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek_penilaian`
--

INSERT INTO `aspek_penilaian` (`aspek_id`, `dimensi_id`, `rencana_id`) VALUES
(1, 3, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin Permision'),
(2, 'guru', 'Ini Untuk guru'),
(3, 'wali_kelas', 'walikelas ');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 1),
(1, 2),
(1, 2),
(1, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 1),
(2, 2),
(2, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'cahya@gmail.com', 1, '2022-09-26 19:58:28', 1),
(2, '::1', 'revanto@gmail.com', 2, '2022-09-26 19:58:45', 1),
(3, '::1', 'cahya@gmail.com', 1, '2022-09-26 19:59:15', 1),
(4, '::1', 'cahya@gmail.com', 1, '2022-09-26 20:37:09', 1),
(5, '::1', 'revanto@gmail.com', 2, '2022-09-26 20:37:27', 1),
(6, '::1', 'cahya@gmail.com', 1, '2022-09-27 19:33:54', 1),
(7, '::1', 'cahya@gmail.com', 1, '2022-09-28 10:47:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-profil', 'managemen profil user'),
(2, 'manage-user', ''),
(3, 'manage-nilai', 'input nilai');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dimensi`
--

CREATE TABLE `dimensi` (
  `id_dimensi` int(11) UNSIGNED NOT NULL,
  `nama_dimensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dimensi`
--

INSERT INTO `dimensi` (`id_dimensi`, `nama_dimensi`) VALUES
(1, 'Beriman, Bertakwa Kepada Tuhan Yang Maha Esa, dan Berakhlak Mulia'),
(2, 'Berkebinekaan Global'),
(3, 'Bergotong-Royong'),
(4, 'Mandiri'),
(5, 'Bernalar Kritis'),
(6, 'Kreatif');

-- --------------------------------------------------------

--
-- Table structure for table `elemen`
--

CREATE TABLE `elemen` (
  `id_elemen` int(11) UNSIGNED NOT NULL,
  `nama_elemen` varchar(255) NOT NULL,
  `dimensi_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elemen`
--

INSERT INTO `elemen` (`id_elemen`, `nama_elemen`, `dimensi_id`) VALUES
(1, 'Akhlak beragama', 1),
(2, 'Akhlak Pribadi', 1),
(3, 'Akhlak kepada manusia', 1),
(4, 'Akhlak kepada alam', 1),
(5, 'Akhlak bernegara', 1),
(6, 'Mengenal dan menghargai budaya', 2),
(7, 'Komunikasi dan interaksi antar budaya', 2),
(8, 'Refleksi dan bertanggung jawab terhadap pengalaman kebinekaan', 2),
(9, 'Berkeadilan Sosial', 2),
(10, 'Kolaborasi', 3),
(11, 'Kepedulian', 3),
(12, 'Berbagi', 3),
(13, 'Pemahaman diri dan situasi yang dihadapi', 4),
(14, 'Regulasi Diri', 4),
(15, 'Memperoleh dan memproses informasi dan gagasan', 5),
(16, 'Menganalisis dan mengevaluasi penalaran dan prosedurnya', 5),
(17, 'Refleksi pemikiran dan proses berpikir', 5),
(18, 'Menghasilkan gagasan yang orisinal', 6),
(19, 'Menghasilkan karya dan tindakan yang orisinal', 6),
(20, 'Memiliki keluwesan berpikir dalam mencari alternatif solusi permasalahan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-09-27-113700', 'App\\Database\\Migrations\\CreateTableSekolah', 'default', 'App', 1664330759, 1),
(2, '2022-09-27-130742', 'App\\Database\\Migrations\\CreateTbTahunAjar', 'default', 'App', 1664330759, 1),
(3, '2022-09-27-132117', 'App\\Database\\Migrations\\CreateTbSemester', 'default', 'App', 1664330759, 1),
(4, '2022-09-28-013117', 'App\\Database\\Migrations\\CreateTableSiswa', 'default', 'App', 1664330759, 1),
(5, '2022-09-28-013607', 'App\\Database\\Migrations\\CreateTableKelas', 'default', 'App', 1664330759, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_p5bk`
--

CREATE TABLE `nilai_p5bk` (
  `nilai_id` int(11) NOT NULL,
  `siswa_id` int(11) UNSIGNED NOT NULL,
  `aspek_id` int(11) NOT NULL,
  `elemen_id` int(11) UNSIGNED NOT NULL,
  `opsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opsi_penilaian`
--

CREATE TABLE `opsi_penilaian` (
  `opsi_id` int(11) NOT NULL,
  `kode_opsi` varchar(25) NOT NULL,
  `nama_opsi` varchar(255) NOT NULL,
  `deskripsi_opsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsi_penilaian`
--

INSERT INTO `opsi_penilaian` (`opsi_id`, `kode_opsi`, `nama_opsi`, `deskripsi_opsi`) VALUES
(1, 'BB', 'Belum Berkembang', '');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_budaya_kerja`
--

CREATE TABLE `rencana_budaya_kerja` (
  `rencana_id` int(11) NOT NULL,
  `kelas_id` int(11) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_budaya_kerja`
--

INSERT INTO `rencana_budaya_kerja` (`rencana_id`, `kelas_id`, `nama`, `deskripsi`) VALUES
(1, 1, 'Proyek 1', 'MEMBUAT AYANG');

-- --------------------------------------------------------

--
-- Table structure for table `sub_elemen`
--

CREATE TABLE `sub_elemen` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_sub_elemen` varchar(255) NOT NULL,
  `elemen_id` int(11) UNSIGNED NOT NULL,
  `capaian` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_elemen`
--

INSERT INTO `sub_elemen` (`id`, `nama_sub_elemen`, `elemen_id`, `capaian`) VALUES
(1, 'Mengenal dan Mencintai Tuhan Yang Maha Esa', 1, 'Menerapkan pemahamannya tentang kualitas atau sifat-sifat Tuhan dalam ritual ibadahnya baik ibadah yang bersifat personal maupun sosial.'),
(2, 'Pemahaman Agama/ Kepercayaan', 1, 'Memahami struktur organisasi, unsur-unsur utama agama /kepercayaan dalam konteks Indonesia, memahami kontribusi agama/kepercayaan terhadap peradaban dunia.'),
(3, 'Pelaksanaan Ritual Ibadah', 1, 'Melaksanakan ibadah secara rutin dan mandiri serta menyadari arti penting ibadah tersebut dan berpartisipasi aktif pada kegiatan keagamaan atau kepercayaan'),
(4, 'Integritas', 2, 'Menyadari bahwa aturan agama dan sosial merupakan aturan yang baik dan menjadi bagian dari diri sehingga bisa menerapkannya secara bijak dan kontekstual.'),
(5, 'Merawat Diri secara Fisik, Mental, dan Spiritual', 2, 'Melakukan aktivitas fisik, sosial, dan ibadah secara seimbang.'),
(6, 'Mengutamakan persamaan dengan orang lain dan menghargai perbedaan', 3, 'Mengidentifikasi hal yang menjadi permasalahan bersama, memberikan alternatif solusi untuk menjembatani perbedaan dengan mengutamakan kemanusiaan.'),
(7, 'Berempati kepada orang lain', 3, 'Memahami dan menghargai perasaan dan sudut pandang orang dan/atau kelompok lain.'),
(8, 'Memahami Keterhubungan Ekosistem Bumi', 4, 'Mengidentifikasi masalah lingkungan hidup di tempat ia tinggal dan melakukan langkah-langkah konkrit yang bisa dilakukan untuk menghindari kerusakan dan menjaga keharmonisan ekosistem yang ada di lingkungannya.'),
(9, 'Menjaga Lingkungan Alam Sekitar', 4, 'Mewujudkan rasa syukur dengan membangun kesadaran peduli lingkungan alam dengan menciptakan dan mengimplementasikan solusi dari permasalahan lingkungan yang ada.'),
(10, 'Melaksanakan Hak dan Kewajiban sebagai Warga Negara Indonesia', 5, 'Memperoleh hak dan melaksanakan kewajiban kewarganegaraan dan terbiasa mendahulukan kepentingan umum di atas kepentingan pribadi sebagai wujud dari keimanannya kepada Tuhan YME.'),
(11, 'Mendalami budaya dan identitas budaya', 6, 'Menganalisis pengaruh keanggotaan kelompok lokal, regional, nasional, dan global terhadap pembentukan identitas, termasuk identitas dirinya. Mulai menginternalisasi identitas diri sebagai bagian dari budaya bangsa.'),
(12, 'Mengeksplorasi dan membandingkan pengetahuan budaya, kepercayaan, serta praktiknya', 6, 'Menganalisis dinamika budaya yang mencakup pemahaman, kepercayaan, dan praktik keseharian dalam rentang waktu yang panjang dan konteks yang luas.'),
(13, 'Menumbuhkan rasa menghormati terhadap keanekaragaman budaya', 6, 'Memahami pentingnya saling menghormati dalam mempromosikan pertukaran budaya dan kolaborasi dalam dunia yang saling terhubung serta menunjukkannya dalam perilaku.'),
(14, 'Berkomunikasi antar budaya', 7, 'Menganalisis hubungan antara bahasa, pikiran, dan konteks untuk memahami dan meningkatkan komunikasi antar budaya yang berbeda-beda.'),
(15, 'Mempertimbangkan dan menumbuhkan berbagai perspektif', 7, 'Menyajikan pandangan yang seimbang mengenai permasalahan yang dapat menimbulkan pertentangan pendapat. Memperlakukan orang lain dan budaya yang berbeda darinya dalam posisi setara dengan diri dan budayanya, serta bersedia memberikan pertolongan ketika orang lain berada dalam situasi sulit.'),
(16, 'Refleksi terhadap pengalaman kebinekaan', 8, 'Merefleksikan secara kritis dampak dari pengalaman hidup di lingkungan yang beragam terkait dengan perilaku, kepercayaan serta tindakannya terhadap orang lain.'),
(17, 'Menghilangkan stereotip dan prasangka', 8, 'Mengkritik dan menolak stereotip serta prasangka tentang gambaran identitas kelompok dan suku bangsa serta berinisiatif mengajak orang lain untuk menolak stereotip dan prasangka.'),
(18, 'Menyelaraskan perbedaan budaya', 8, 'Mengetahui tantangan dan keuntungan hidup dalam lingkungan dengan budaya yang beragam, serta memahami pentingnya kerukunan antar budaya dalam kehidupan bersama yang harmonis.'),
(19, 'Aktif membangun masyarakat yang inklusif, adil, dan berkelanjutan', 9, 'Berinisiatif melakukan suatu tindakan berdasarkan identifikasi masalah untuk mempromosikan keadilan, keamanan ekonomi, menopang ekologi dan demokrasi sambil menghindari kerugian jangka panjang terhadap manusia, alam ataupun masyarakat.'),
(20, 'Berpartisipasi dalam proses pengambilan keputusan bersama', 9, 'Berpartisipasi menentukan pilihan dan keputusan untuk kepentingan bersama melalui proses bertukar pikiran secara cermat dan terbuka secara mandiri'),
(21, 'Memahami peran individu dalam demokrasi', 9, 'Memahami konsep hak dan kewajiban, serta implikasinya terhadap ekspresi dan perilakunya. Mulai mencari solusi untuk dilema terkait konsep hak dan kewajibannya.'),
(22, 'Kerja sama', 10, 'Membangun tim dan mengelola kerjasama untuk mencapai tujuan bersama sesuai dengan target yang sudah ditentukan.'),
(23, 'Komunikasi untuk mencapai tujuan bersama', 10, 'Aktif menyimak untuk memahami dan menganalisis informasi, gagasan, emosi, keterampilan dan keprihatinan yang disampaikan oleh orang lain dan kelompok menggunakan berbagai simbol dan media secara efektif, serta menggunakan berbagai strategi komunikasi untuk menyelesaikan masalah guna mencapai berbagai tujuan bersama.'),
(24, 'Saling-ketergantungan positif', 10, 'Menyelaraskan kapasitas kelompok agar para anggota kelompok dapat saling membantu satu sama lain memenuhi kebutuhan mereka baik secara individual maupun kolektif.'),
(25, 'Koordinasi Sosial', 10, 'Menyelaraskan dan menjaga tindakan diri dan anggota kelompok agar sesuai antara satu dengan lainnya serta menerima konsekuensi tindakannya dalam rangka mencapai tujuan bersama.'),
(26, 'Tanggap terhadap lingkungan Sosial', 11, 'Tanggap terhadap lingkungan sosial sesuai dengan tuntutan peran sosialnya dan berkontribusi sesuai dengan kebutuhan masyarakat untuk menghasilkan keadaan yang lebih baik.'),
(27, 'Persepsi sosial', 11, 'Melakukan tindakan yang tepat agar orang lain merespon sesuai dengan yang diharapkan dalam rangka penyelesaian pekerjaan dan pencapaian tujuan.'),
(28, 'Berbagi', 12, 'Mengupayakan memberi hal yang dianggap penting dan berharga kepada orang-orang yang membutuhkan di masyarakat yang lebih luas (negara, dunia).'),
(29, 'Mengenali kualitas dan minat diri serta tantangan yang dihadapi', 13, 'Mengidentifikasi kekuatan dan tantangan-tantangan yang akan dihadapi pada konteks pembelajaran, sosial dan pekerjaan yang akan dipilihnya di masa depan.'),
(30, 'Mengembangkan refleksi diri', 13, 'Melakukan refleksi terhadap umpan balik dari teman, guru, dan orang dewasa lainnya, serta informasi-informasi karir yang akan dipilihnya untuk menganalisis karakteristik dan keterampilan yang dibutuhkan dalam menunjang atau menghambat karirnya di masa depan.'),
(31, 'Regulasi emosi', 14, 'Mengendalikan dan menyesuaikan emosi yang dirasakannya secara tepat ketika menghadapi situasi yang menantang dan menekan pada konteks belajar, relasi, dan pekerjaan.'),
(32, 'Penetapan tujuan belajar, prestasi, dan pengembangan diri serta rencana strategis untuk mencapainya', 14, 'Mengevaluasi efektivitas strategi pembelajaran digunakannya, serta menetapkan tujuan belajar, prestasi, dan pengembangan diri secara spesifik dan merancang strategi yang sesuai untuk menghadapi tantangan-tantangan yang akan dihadapi pada konteks pembelajaran, sosial dan pekerjaan yang akan dipilihnya di masa depan.'),
(33, 'Menunjukkan inisiatif dan bekerja secara mandiri', 14, 'Menentukan prioritas pribadi, berinisiatif mencari dan mengembangkan pengetahuan dan keterampilan yang spesifik sesuai tujuan di masa depan.'),
(34, 'Mengembangkan pengendalian dan disiplin diri', 14, 'Melakukan tindakan-tindakan secara konsisten guna mencapai tujuan karir dan pengembangan dirinya di masa depan, serta berusaha mencari dan melakukan alternatif tindakan lain yang dapat dilakukan ketika menemui hambatan.'),
(35, 'Percaya diri, tangguh (resilient), dan adaptif', 14, 'Menyesuaikan dan mulai menjalankan rencana dan strategi pengembangan dirinya dengan mempertimbangkan minat dan tuntutan pada konteks belajar maupun pekerjaan yang akan dijalaninya di masa depan, serta berusaha untuk mengatasi tantangan-tantangan yang ditemui.'),
(36, 'Mengajukan pertanyaan', 15, 'Mengajukan pertanyaan untuk menganalisis secara kritis permasalahan yang kompleks dan abstrak.'),
(37, 'Mengidentifikasi, mengklarifikasi, dan mengolah informasi dan gagasan', 15, 'Secara kritis mengklarifikasi serta menganalisis gagasan dan informasi yang kompleks dan abstrak dari berbagai sumber. Memprioritaskan suatu gagasan yang paling relevan dari hasil klarifikasi dan analisis.'),
(38, 'Menganalisis dan mengevaluasi penalaran dan prosedurnya', 16, 'Menganalisis dan mengevaluasi penalaran yang digunakannya dalam menemukan dan mencari solusi serta mengambil keputusan.'),
(39, 'Merefleksi dan mengevaluasi pemikirannya sendiri', 17, 'Menjelaskan alasan untuk mendukung pemikirannya dan memikirkan pandangan yang mungkin berlawanan dengan pemikirannya dan mengubah pemikirannya jika diperlukan.'),
(40, 'Menghasilkan gagasan yang orisinal', 18, 'Menghasilkan gagasan yang beragam untuk mengekspresikan pikiran dan/atau perasaannya, menilai gagasannya, serta memikirkan segala risikonya dengan mempertimbangkan banyak perspektif seperti etika dan nilai kemanusiaan ketika gagasannya direalisasikan.'),
(41, 'Menghasilkan karya dan tindakan yang orisinal', 19, 'Mengeksplorasi dan mengekspresikan pikiran dan/atau perasaannya dalam bentuk karya dan/atau tindakan, serta mengevaluasinya dan mempertimbangkan dampak dan risikonya bagi diri dan lingkungannya dengan menggunakan berbagai perspektif.'),
(42, 'Memiliki keluwesan berpikir dalam mencari alternatif solusi permasalahan', 20, 'Bereksperimen dengan berbagai pilihan secara kreatif untuk memodifikasi gagasan sesuai dengan perubahan situasi.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) UNSIGNED NOT NULL,
  `kelas_nama` varchar(100) DEFAULT NULL,
  `kelas_wali` varchar(100) DEFAULT NULL,
  `kelas_tahun_ajaran` decimal(4,0) NOT NULL,
  `kelas_jurusan` varchar(100) DEFAULT NULL,
  `kelas_deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `kelas_nama`, `kelas_wali`, `kelas_tahun_ajaran`, `kelas_jurusan`, `kelas_deskripsi`) VALUES
(1, 'X Keb A', 'Cahya R', '2022', 'Keperawatan', 'Kelas 10'),
(2, 'X Keb B', 'cahya R', '2022', 'Keperawatan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `sekolah_id` int(5) UNSIGNED NOT NULL,
  `sekolah_npsn` varchar(100) DEFAULT NULL,
  `sekolah_nama` varchar(150) DEFAULT NULL,
  `sekolah_alamat` varchar(150) DEFAULT NULL,
  `sekolah_kodepos` varchar(10) DEFAULT NULL,
  `sekolah_telepon` varchar(20) DEFAULT NULL,
  `sekolah_email` varchar(100) DEFAULT NULL,
  `sekolah_website` varchar(100) DEFAULT NULL,
  `sekolah_created_at` datetime DEFAULT NULL,
  `sekolah_updated_at` datetime DEFAULT NULL,
  `sekolah_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`sekolah_id`, `sekolah_npsn`, `sekolah_nama`, `sekolah_alamat`, `sekolah_kodepos`, `sekolah_telepon`, `sekolah_email`, `sekolah_website`, `sekolah_created_at`, `sekolah_updated_at`, `sekolah_logo`) VALUES
(1, '255255255255', 'SMK RAHANI HUSADA', 'Plawikan ', '84564', '089542266651', 'sekolah@mail.com', 'http://sekolah.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `semester_id` decimal(4,0) UNSIGNED NOT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `periode_aktif` decimal(1,0) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tahun_ajaran_id` decimal(4,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_sync` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '123', '123', 'cahya', 'L', 'klaten', '2022-09-08', 'islam', 'karang sumyang', '08954222', 'cahya@mail.com', 1, 2010, 2022, 'Aktif', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `tahun_ajaran_id` decimal(4,0) UNSIGNED NOT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `periode_aktif` decimal(1,0) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_sync` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`tahun_ajaran_id`, `nama`, `periode_aktif`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `last_sync`) VALUES
('1', '2022/2023', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `fullname`, `email`, `username`, `avatar`, `alamat`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', '', 'cahya@gmail.com', 'cahya', NULL, NULL, '$2y$10$SEZzN0n7vvZvT1J/gQOwk.IjLk1CJqxQYc37owjTsx5/6sLCG42fW', NULL, NULL, NULL, '31cecabf2fe8073752d010a32d17c9cf', NULL, NULL, 1, 0, '2022-09-26 19:50:51', '2022-09-26 19:50:51', NULL),
(2, '', '', 'revanto@gmail.com', 'revanto', NULL, NULL, '$2y$10$ZPIBR7rRtS9mQmnLEc57f.yRri7nmtShR81AhYyBmuryco3opGo.u', NULL, NULL, NULL, 'aab858cc6a150eef33a4624bff792485', NULL, NULL, 1, 0, '2022-09-26 19:52:01', '2022-09-26 19:52:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD PRIMARY KEY (`aspek_id`),
  ADD KEY `get_dimensi` (`dimensi_id`),
  ADD KEY `get_perencanaaan` (`rencana_id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `dimensi`
--
ALTER TABLE `dimensi`
  ADD PRIMARY KEY (`id_dimensi`);

--
-- Indexes for table `elemen`
--
ALTER TABLE `elemen`
  ADD PRIMARY KEY (`id_elemen`),
  ADD KEY `to_dimensi` (`dimensi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_p5bk`
--
ALTER TABLE `nilai_p5bk`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `get_siswa` (`siswa_id`),
  ADD KEY `get _elemen` (`elemen_id`),
  ADD KEY `get_opsi` (`opsi_id`),
  ADD KEY `get_aspek` (`aspek_id`);

--
-- Indexes for table `opsi_penilaian`
--
ALTER TABLE `opsi_penilaian`
  ADD PRIMARY KEY (`opsi_id`);

--
-- Indexes for table `rencana_budaya_kerja`
--
ALTER TABLE `rencana_budaya_kerja`
  ADD PRIMARY KEY (`rencana_id`),
  ADD KEY `get_kelas` (`kelas_id`);

--
-- Indexes for table `sub_elemen`
--
ALTER TABLE `sub_elemen`
  ADD KEY `get_elemen` (`elemen_id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `tb_semester_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `to_kelas` (`siswa_kelas`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  MODIFY `aspek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_p5bk`
--
ALTER TABLE `nilai_p5bk`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opsi_penilaian`
--
ALTER TABLE `opsi_penilaian`
  MODIFY `opsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rencana_budaya_kerja`
--
ALTER TABLE `rencana_budaya_kerja`
  MODIFY `rencana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `sekolah_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD CONSTRAINT `get_dimensi` FOREIGN KEY (`dimensi_id`) REFERENCES `dimensi` (`id_dimensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_perencanaaan` FOREIGN KEY (`rencana_id`) REFERENCES `rencana_budaya_kerja` (`rencana_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_p5bk`
--
ALTER TABLE `nilai_p5bk`
  ADD CONSTRAINT `get _elemen` FOREIGN KEY (`elemen_id`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_aspek` FOREIGN KEY (`aspek_id`) REFERENCES `aspek_penilaian` (`aspek_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_opsi` FOREIGN KEY (`opsi_id`) REFERENCES `opsi_penilaian` (`opsi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`siswa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rencana_budaya_kerja`
--
ALTER TABLE `rencana_budaya_kerja`
  ADD CONSTRAINT `get_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`);

--
-- Constraints for table `sub_elemen`
--
ALTER TABLE `sub_elemen`
  ADD CONSTRAINT `get_elemen` FOREIGN KEY (`elemen_id`) REFERENCES `elemen` (`id_elemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD CONSTRAINT `tb_semester_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tb_tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `to_kelas` FOREIGN KEY (`siswa_kelas`) REFERENCES `tb_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
