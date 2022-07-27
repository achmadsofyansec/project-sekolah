/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.6.5-MariaDB : Database - sekolahapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `data_gurus` */

DROP TABLE IF EXISTS `data_gurus`;

CREATE TABLE `data_gurus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `niptk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_gurus` */

/*Table structure for table `data_ortus` */

DROP TABLE IF EXISTS `data_ortus`;

CREATE TABLE `data_ortus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
<<<<<<< HEAD
=======
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
>>>>>>> 840b520bbeb43f7b59e06c372ce6ec5018462686
  `nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_terakhir_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ortu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_tinggal_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_ortus` */

/*Table structure for table `data_siswas` */

DROP TABLE IF EXISTS `data_siswas`;

CREATE TABLE `data_siswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `hobi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cita_cita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_disabilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_tempuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antar_jemput` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_siswas` */

/*Table structure for table `ekstrakulikulers` */

DROP TABLE IF EXISTS `ekstrakulikulers`;

CREATE TABLE `ekstrakulikulers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wajib_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ekstrakulikulers` */

insert  into `ekstrakulikulers`(`id`,`kode_ekstra`,`nama_ekstra`,`desc_ekstra`,`status_ekstra`,`wajib_ekstra`,`created_at`,`updated_at`) values 
(1,'EK-001','Kesenian Tari','Ekstra Tari Untuk Kesenian Tari','Aktif','Tidak Wajib','2022-07-27 02:15:33','2022-07-27 02:21:26');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jurusans` */

DROP TABLE IF EXISTS `jurusans`;

CREATE TABLE `jurusans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jurusans` */

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kecamatan` */

insert  into `kecamatan`(`id`,`kode_kecamatan`,`nama_kecamatan`,`ket_kecamatan`,`created_at`,`updated_at`) values 
(1,'350706','AmpelGading','AmpelGading','2022-07-19 11:14:57',NULL);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelas` */

/*Table structure for table `kelompok_pelajarans` */

DROP TABLE IF EXISTS `kelompok_pelajarans`;

CREATE TABLE `kelompok_pelajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelompok_pelajarans` */

/*Table structure for table `kelurahan` */

DROP TABLE IF EXISTS `kelurahan`;

CREATE TABLE `kelurahan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelurahan` */

insert  into `kelurahan`(`id`,`kode_kelurahan`,`kode_kecamatan`,`nama_kelurahan`,`created_at`,`updated_at`) values 
(1,'350706001','350706','Argoyuwono',NULL,NULL);

/*Table structure for table `mata_pelajarans` */

DROP TABLE IF EXISTS `mata_pelajarans`;

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mata_pelajarans` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> 840b520bbeb43f7b59e06c372ce6ec5018462686

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(21,'2014_10_12_000000_create_users_table',1),
(22,'2014_10_12_100000_create_password_resets_table',1),
(23,'2019_08_19_000000_create_failed_jobs_table',1),
(24,'2019_12_14_000001_create_personal_access_tokens_table',1),
(25,'2022_07_14_015617_create_roles_table',2),
(26,'2022_07_15_064050_sekolah',2),
(28,'2022_07_15_133155_create_notifs_table',3),
(30,'2022_07_18_033038_create_uploads_table',4),
(31,'2022_07_18_040111_create_sekolahs_table',5),
(32,'2022_07_19_023748_kelurahan',6),
(33,'2022_07_19_023804_kecamatan',6),
(34,'2022_07_20_030417_create_sessions_table',7),
(51,'2022_07_23_054446_create_kelas_table',8),
(52,'2022_07_23_054739_create_jurusans_table',8),
(53,'2022_07_23_055106_create_tahun_ajarans_table',8),
(54,'2022_07_23_055330_create_kelompok_pelajarans_table',8),
(65,'2022_07_23_055445_create_mata_pelajarans_table',9),
<<<<<<< HEAD
(66,'2022_07_23_061916_create_data_siswas_table',9),
(67,'2022_07_23_061930_create_data_gurus_table',9),
(68,'2022_07_23_061955_create_data_ortus_table',9);
=======
(70,'2022_07_23_061916_create_data_siswas_table',10),
(71,'2022_07_23_061930_create_data_gurus_table',10),
(72,'2022_07_23_061955_create_data_ortus_table',10),
(73,'2022_07_27_014724_create_ekstrakulikulers_table',11),
(74,'2022_07_27_063906_create_predikats_table',12);
>>>>>>> 840b520bbeb43f7b59e06c372ce6ec5018462686

/*Table structure for table `notifs` */

DROP TABLE IF EXISTS `notifs`;

CREATE TABLE `notifs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifs` */

insert  into `notifs`(`id`,`nama_pengumuman`,`isi_pengumuman`,`file_pengumuman`,`status_pengumuman`,`created_at`,`updated_at`) values 
(10,'Pengumuman Test','Ini Adalah Tes Untuk Pengumuman','WhatsApp Image 2022-07-16 at 10.56.19.jpeg','0','2022-07-19 05:06:53','2022-07-19 05:06:53');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `predikats` */

DROP TABLE IF EXISTS `predikats`;

CREATE TABLE `predikats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `predikats` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roles_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`roles_name`,`roles_access`,`id_roles`,`created_at`,`updated_at`) values 
(1,'Administrator','admin','0',NULL,NULL);

/*Table structure for table `sekolahs` */

DROP TABLE IF EXISTS `sekolahs`;

CREATE TABLE `sekolahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akreditasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sekolahs` */

insert  into `sekolahs`(`id`,`kode_sekolah`,`nsm`,`npsn`,`akreditasi`,`nama_sekolah`,`alamat_sekolah`,`longtitude`,`latitude`,`kode_kecamatan`,`kode_kelurahan`,`kode_pos`,`nomor_hp`,`email`,`website`,`logo_sekolah`,`created_at`,`updated_at`) values 
(2,'00000','0000','2115251','A','SIPINTAR','JL.Sipintar','0.0','0.0','350706','350706001','65124','089524610353','sipintar@gmail.com','-','-',NULL,NULL);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
<<<<<<< HEAD
('OEjMYPbw8VbwVpJV863KQAwHIKTsg38YnsQCcT1u',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNndzWmNmMUhwelp1UGVuUjFsYWE3dlBEZndvSlpDb2pJSE9Tb1g2aCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vbG9jYWxob3N0L2FrYWRlbWlrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1658813210);
=======
('irtLWj6skSHxZSBYaL35oM9x1lbIpik9qhn5YvAb',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTExzU0c5ZlNLMXE5alhRUGpVQk03RVFyZzNLaXhpNVV1cXhxQ0dmYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vbG9jYWxob3N0L2FrYWRlbWlrL3BpbmRhaF9rZWxhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1658906324);
>>>>>>> 840b520bbeb43f7b59e06c372ce6ec5018462686

/*Table structure for table `tahun_ajarans` */

DROP TABLE IF EXISTS `tahun_ajarans`;

CREATE TABLE `tahun_ajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `status_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tahun_ajarans` */

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `uploads` */

insert  into `uploads`(`id`,`name`,`path`,`created_at`,`updated_at`) values 
(3,'WhatsApp Image 2022-07-16 at 10.56.18.jpeg','C:\\xampp\\htdocs\\sekolahApp\\public\\public/uploads/WhatsApp Image 2022-07-16 at 10.56.18.jpeg','2022-07-19 04:52:41','2022-07-19 04:52:41'),
(4,'WhatsApp Image 2022-07-16 at 10.56.17.jpeg','C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.17.jpeg','2022-07-19 04:53:27','2022-07-19 04:53:27'),
(5,'WhatsApp Image 2022-07-16 at 10.56.19.jpeg','C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.19.jpeg','2022-07-19 05:06:53','2022-07-19 05:06:53');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`id_role`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin@sipinter.com',NULL,'$2y$10$J5QhqMQTJpdcYAL9zgetsOzi3N0j5n0uxu2hNY6uYX/GGXDRvYoMa','1',NULL,NULL,'2022-07-27 04:25:34'),
(5,'Administrator','admin@gmail.com',NULL,'$2y$10$iHKGKSXkXhPhQOqFp71F/u34lxryrJv/MmK2B3l0Wu4NAr6QKfAqa','1',NULL,'2022-07-19 03:16:53','2022-07-19 03:16:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
