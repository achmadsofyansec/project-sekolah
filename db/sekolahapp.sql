/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.5.9-MariaDB : Database - sekolahapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(34,'2022_07_20_030417_create_sessions_table',7);

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
('xAbgFUAbEkTUKdY6bEuAtyZzvmG2iJwNulTFE8lK',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWkdyeHNnbTU3VXVoM205WTF3MU9vTjJtbU1YUmdFMHRuZmVOMFZCMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vbG9jYWxob3N0L2FrYWRlbWlrIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1658287565);

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
(1,'CHOIRUL','admin@sipinter.com',NULL,'$2y$10$J5QhqMQTJpdcYAL9zgetsOzi3N0j5n0uxu2hNY6uYX/GGXDRvYoMa','1',NULL,NULL,'2022-07-18 04:37:56'),
(5,'Administrator','admin@gmail.com',NULL,'$2y$10$iHKGKSXkXhPhQOqFp71F/u34lxryrJv/MmK2B3l0Wu4NAr6QKfAqa','1',NULL,'2022-07-19 03:16:53','2022-07-19 03:16:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
