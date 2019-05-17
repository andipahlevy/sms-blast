/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.25-0ubuntu0.16.04.2-log : Database - sms-blast
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sms-blast` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sms-blast`;

/*Table structure for table `campaign` */

DROP TABLE IF EXISTS `campaign`;

CREATE TABLE `campaign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kelompok` int(10) unsigned NOT NULL,
  `campaign_text` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id_kelompok_foreign` (`id_kelompok`),
  CONSTRAINT `campaign_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `campaign` */

/*Table structure for table `kelompok` */

DROP TABLE IF EXISTS `kelompok`;

CREATE TABLE `kelompok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelompok` */

insert  into `kelompok`(`id`,`nama_kelompok`,`deskripsi`,`created_at`,`updated_at`) values 
(1,'BADAN KEPEGAWAIAN DAERAH','Bidang Perencanaan dan Informasi Aparatur Sipil Negara','2019-05-13 23:03:02','2019-05-14 02:39:55'),
(2,'BADAN KEPEGAWAIAN DAERAH','Sekretariat','2019-05-13 23:03:14','2019-05-14 02:39:09'),
(3,'BADAN KEPEGAWAIAN DAERAH','Bidang Pengembangan Pegawai','2019-05-14 02:41:11','2019-05-14 02:41:11'),
(4,'BADAN KEPEGAWAIAN DAERAH','Bidang Kinerja dan Kesejahteraan','2019-05-14 02:41:36','2019-05-14 02:41:36'),
(5,'BADAN KEPEGAWAIAN DAERAH','Bidang Pengendalian Pegawai','2019-05-14 02:41:56','2019-05-14 02:41:56'),
(6,'BADAN KEPEGAWAIAN DAERAH','UPT Penilaian Potensi dan Kompetensi Jabatan fungsional','2019-05-14 02:42:14','2019-05-14 02:42:14'),
(7,'BADAN PENGELOLAAN KEUANGAN DAERAH','Sekretariat','2019-05-14 02:45:03','2019-05-14 02:46:15'),
(8,'BADAN PENGELOLAAN KEUANGAN DAERAH','Bidang Anggaran','2019-05-14 02:45:55','2019-05-14 02:45:55'),
(9,'BADAN PENGELOLAAN KEUANGAN DAERAH','Bidang Perbendaharaan','2019-05-14 02:47:39','2019-05-14 02:47:39'),
(10,'BADAN PENGELOLAAN KEUANGAN DAERAH','Bidang Akuntansi','2019-05-14 03:09:22','2019-05-14 03:09:22'),
(11,'BADAN PENGELOLAAN KEUANGAN DAERAH','Bidang Pembinaan Dan Evaluasi APRD Kab.Kota','2019-05-14 03:09:41','2019-05-14 03:09:41'),
(13,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Sekretariat','2019-05-14 03:10:58','2019-05-14 03:10:58'),
(14,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Bidang Ekonomi','2019-05-14 03:11:18','2019-05-14 03:11:18'),
(15,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Bidang Pengembangan Kelembagaan Dan Sumber Daya Manusia','2019-05-14 03:11:32','2019-05-14 03:11:32'),
(16,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Bidang Pengembangan Sumber Daya Alam Dan Prasarana Wilayah','2019-05-14 03:11:54','2019-05-14 03:11:54'),
(17,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Bidang Perencanaan Makro Dan Pembiayaan Pembangunan','2019-05-14 03:12:11','2019-05-14 03:12:11'),
(18,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Bidang Statistik Dan Evaluasi Kinerja Pembangunan','2019-05-14 03:12:28','2019-05-14 03:12:28'),
(19,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','Jabatan Fungsional','2019-05-14 03:13:23','2019-05-14 03:13:23'),
(21,'BIRO HUMAS DAN PROTOKOL','Bagian Hubungan Masyarakat','2019-05-14 03:14:24','2019-05-14 03:14:24'),
(22,'BIRO HUMAS DAN PROTOKOL','Bagian Tata Usaha','2019-05-14 03:14:38','2019-05-14 03:14:38'),
(23,'BIRO HUMAS DAN PROTOKOL','Bagian Protokol','2019-05-14 03:14:52','2019-05-14 03:14:52'),
(24,'BIRO HUMAS DAN PROTOKOL','Jabatan Fungsional','2019-05-14 03:15:05','2019-05-14 03:15:05'),
(25,'BIRO KESEJAHTERAAN','Bagian Tata Usaha, Kepemudaan, Keolahragaan, Pendidikan dan Seni Budaya','2019-05-14 03:24:44','2019-05-14 03:24:44'),
(26,'BIRO KESEJAHTERAAN','Bagian Kesejahteraan, Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga Berencana','2019-05-14 03:25:35','2019-05-14 03:25:35'),
(27,'BIRO KESEJAHTERAAN','Bagian Keagamaan','2019-05-14 03:25:48','2019-05-14 03:25:48'),
(28,'BIRO PEMBANGUNAN DAN PENGADAAN BARANG/JASA','Bagian Tata Usaha Dan Bina Usaha Jasa Pembangunan','2019-05-14 03:27:23','2019-05-14 03:27:23'),
(29,'BIRO PEMBANGUNAN DAN PENGADAAN BARANG/JASA','Bagian Pengendalian Dan Evaluasi Pembangunan Daerah','2019-05-14 03:27:40','2019-05-14 03:27:40'),
(30,'BIRO PEMBANGUNAN DAN PENGADAAN BARANG/JASA','Bagian Pengadaan Barang/ Jasa','2019-05-14 03:27:58','2019-05-14 03:27:58'),
(31,'BIRO PEREKONOMIAN','Bagian Tata Usaha Dan Bina Kelembagaan Ekonomi','2019-05-14 03:28:54','2019-05-14 03:28:54'),
(32,'BIRO PEREKONOMIAN','Bagian Bina Sarana Perekonomian','2019-05-14 03:29:11','2019-05-14 03:29:11'),
(33,'BIRO PEREKONOMIAN','Bagian Bina Perekonomian Sumber Daya Alam','2019-05-14 03:29:22','2019-05-14 03:29:22'),
(34,'BIRO UMUM DAN PERLENGKAPAN','Bagian Tata Usaha Umum','2019-05-14 03:30:04','2019-05-14 03:30:04'),
(35,'BIRO UMUM DAN PERLENGKAPAN','Bagian Rumah Tangga dan Perlengkapan','2019-05-14 03:30:16','2019-05-14 03:30:16'),
(36,'BIRO UMUM DAN PERLENGKAPAN','Bagian Keuangan Setda','2019-05-14 03:30:27','2019-05-14 03:30:27'),
(37,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Sekretariat','2019-05-14 03:31:26','2019-05-14 03:31:26'),
(38,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Bidang Fasilitasi Pendaftaran Penduduk Dan Pencatatan Sipil','2019-05-14 03:31:39','2019-05-14 03:31:39'),
(39,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Bidang Kelembagaan Dan Informasi Administrasi Kependudukan','2019-05-14 03:31:54','2019-05-14 03:31:54'),
(40,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Bidang Pengendalian Penduduk','2019-05-14 03:32:08','2019-05-14 03:32:08'),
(41,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Bidang Keluarga Berencana','2019-05-14 03:32:36','2019-05-14 03:32:36'),
(42,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Bidang Ketahanan Dan Kesejahteraan Keluarga','2019-05-14 03:32:58','2019-05-14 03:32:58'),
(43,'DINAS KEPENDUDUKAN, PENCATATAN SIPIL, PENGENDALIAN PENDUDUK, DAN KELUARGA BERENCANA','Jabatan Fungsional','2019-05-14 03:33:13','2019-05-14 03:33:13'),
(44,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Sekretariat','2019-05-14 03:35:54','2019-05-14 03:35:54'),
(45,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Bidang Komunikasi Publik','2019-05-14 03:36:08','2019-05-14 03:36:08'),
(46,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Bidang Informatika','2019-05-14 03:36:25','2019-05-14 03:36:25'),
(47,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Bidang Statistik Sektoral','2019-05-14 03:36:40','2019-05-14 03:36:40'),
(48,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Bidang Persandian','2019-05-14 03:36:55','2019-05-14 03:36:55'),
(49,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Bidang E-Government Dan Pengelolaan Data','2019-05-14 03:37:08','2019-05-14 03:37:08'),
(50,'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN','Jabatan Fungsional','2019-05-14 03:37:24','2019-05-14 03:37:24'),
(51,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Sekretariat','2019-05-14 03:42:33','2019-05-14 03:42:33'),
(52,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Bidang Kualitas Hidup Perempuan','2019-05-14 03:42:50','2019-05-14 03:42:50'),
(53,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Bidang Perlindungan Perempuan','2019-05-14 03:43:03','2019-05-14 03:43:03'),
(54,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Bidang Pemenuhan Hak Dan Perlindungan Anak','2019-05-14 03:44:22','2019-05-14 03:44:22'),
(55,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Bidang Data Dan Informasi','2019-05-14 03:44:46','2019-05-14 03:44:46'),
(56,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','UPT','2019-05-14 03:45:07','2019-05-14 03:45:07'),
(57,'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','Jabatan Fungsional','2019-05-14 03:45:22','2019-05-14 03:45:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(49,'2014_10_12_000000_create_users_table',1),
(50,'2014_10_12_100000_create_password_resets_table',1),
(51,'2019_05_13_180243_create_table_kelompok',1),
(52,'2019_05_13_193540_create_table_nomor',1),
(53,'2019_05_13_211550_create_table_sms',1),
(54,'2019_05_13_223354_create_table_campaign',1);

/*Table structure for table `nomor` */

DROP TABLE IF EXISTS `nomor`;

CREATE TABLE `nomor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kelompok` int(10) unsigned NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nomor_id_kelompok_foreign` (`id_kelompok`),
  CONSTRAINT `nomor_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nomor` */

insert  into `nomor`(`id`,`id_kelompok`,`nama_anggota`,`nip`,`nohp`,`created_at`,`updated_at`) values 
(1,23,'Andi firmansyah usman','199009082014061001','6281241670900','2019-05-14 03:16:51','2019-05-14 03:16:51'),
(2,13,'Rudi P','19770218200901006','6282188778886','2019-05-14 03:20:54','2019-05-14 03:20:54'),
(3,13,'Ratu beatris','198004112010012020','6282344487878','2019-05-14 03:21:34','2019-05-14 03:21:34'),
(4,25,'Andi Nurhamida, SKM','196907181997032001','6285340948864','2019-05-14 03:26:42','2019-05-14 03:26:42'),
(5,1,'Ety YS','1998004112010012013','6281241547639','2019-05-16 02:44:22','2019-05-16 02:44:22');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `sms` */

DROP TABLE IF EXISTS `sms`;

CREATE TABLE `sms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sms` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','andilevi@gmail.com','$2y$10$hYkq1jzDeSiQLsbgW7/muunbG1wQf761fNXkpMOfAzawPqTwiAX6.','m6bYkadZ6a6APvi7egKhSG2zVX65uUcpsLNdAbruJ9Hh2xHO2X7BA6oHRATb','2019-05-13 22:52:41','2019-05-13 22:52:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
