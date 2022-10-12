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
/*Table structure for table `absensis` */

DROP TABLE IF EXISTS `absensis`;

CREATE TABLE `absensis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_absensi` datetime NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_absen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `absensis` */

/*Table structure for table `agendas` */

DROP TABLE IF EXISTS `agendas`;

CREATE TABLE `agendas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_selesai_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `agendas` */

/*Table structure for table `akademik_kategori_nilais` */

DROP TABLE IF EXISTS `akademik_kategori_nilais`;

CREATE TABLE `akademik_kategori_nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_kategori_nilais` */

insert  into `akademik_kategori_nilais`(`id`,`kategori_nilai`,`created_at`,`updated_at`) values 
(1,'Pengetahuan','2022-10-01 15:02:12','2022-10-01 15:02:12'),
(2,'Keterampilan','2022-10-01 15:02:19','2022-10-01 15:02:19'),
(3,'Sikap','2022-10-01 15:02:29','2022-10-01 15:02:29');

/*Table structure for table `akademik_nilai_details` */

DROP TABLE IF EXISTS `akademik_nilai_details`;

CREATE TABLE `akademik_nilai_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_nilai_details` */

/*Table structure for table `akademik_nilai_ekstras` */

DROP TABLE IF EXISTS `akademik_nilai_ekstras`;

CREATE TABLE `akademik_nilai_ekstras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_nilai_ekstras` */

/*Table structure for table `akademik_nilai_prestasis` */

DROP TABLE IF EXISTS `akademik_nilai_prestasis`;

CREATE TABLE `akademik_nilai_prestasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peringkat_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_nilai_prestasis` */

/*Table structure for table `akademik_nilai_rapors` */

DROP TABLE IF EXISTS `akademik_nilai_rapors`;

CREATE TABLE `akademik_nilai_rapors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_nilai_rapors` */

/*Table structure for table `akademik_nilais` */

DROP TABLE IF EXISTS `akademik_nilais`;

CREATE TABLE `akademik_nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_nilais` */

/*Table structure for table `akademik_pindah_kelas` */

DROP TABLE IF EXISTS `akademik_pindah_kelas`;

CREATE TABLE `akademik_pindah_kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_disetujui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pindah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_pindah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akademik_pindah_kelas` */

insert  into `akademik_pindah_kelas`(`id`,`tgl_pengajuan`,`tgl_disetujui`,`kode_siswa`,`kode_kelas_siswa`,`kode_kelas_tujuan`,`status_pindah`,`ket_pindah`,`created_at`,`updated_at`) values 
(6,'2022-09-24','-','1','1','2','0','-','2022-09-24 15:26:48','2022-09-24 15:26:48'),
(7,'2022-10-01','-','2','1','2','0','-','2022-10-01 15:12:54','2022-10-01 15:12:54');

/*Table structure for table `aktivitas_belajars` */

DROP TABLE IF EXISTS `aktivitas_belajars`;

CREATE TABLE `aktivitas_belajars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aktivitas_belajars` */

insert  into `aktivitas_belajars`(`id`,`kode_siswa`,`kode_kelas`,`kode_tahun_ajaran`,`kode_jurusan`,`status_aktivitas`,`created_at`,`updated_at`) values 
(3,'9872989345','XII','EK-110','TKJ','1','2022-10-08 09:31:35','2022-10-08 09:31:35'),
(4,'123456789','X','EK-100','RPL','1',NULL,NULL),
(5,'987654321','X','EK-100','RPL','1',NULL,NULL),
(6,'1111111','XI','EK-101','MEKATRONIKA','1',NULL,NULL),
(7,'22222222','XI','EK-101','MEKATRONIKA','1',NULL,NULL),
(8,'33333333','XII','EK-102','RPL','1',NULL,NULL);

/*Table structure for table `anggota_ekstras` */

DROP TABLE IF EXISTS `anggota_ekstras`;

CREATE TABLE `anggota_ekstras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `anggota_ekstras` */

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

/*Table structure for table `barang_sitaans` */

DROP TABLE IF EXISTS `barang_sitaans`;

CREATE TABLE `barang_sitaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_sita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang_sitaans` */

/*Table structure for table `biaya_siswas` */

DROP TABLE IF EXISTS `biaya_siswas`;

CREATE TABLE `biaya_siswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kartu_spp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penunggakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `biaya_siswas` */

insert  into `biaya_siswas`(`id`,`nama_biaya`,`pos_biaya`,`tipe_biaya`,`tahun_ajaran_biaya`,`kartu_spp`,`penunggakan`,`created_at`,`updated_at`) values 
(1,'SPP','1','BULANAN','1','1','0','2022-10-08 02:47:58','2022-10-08 02:47:58'),
(2,'Uang Gedung','2','NONBULANAN','1','1','0','2022-10-08 02:48:41','2022-10-08 02:48:41'),
(3,'SPP','1','BULANAN','2','1','0','2022-10-08 07:31:14','2022-10-08 07:31:14'),
(4,'SPP','1','BULANAN','4','1','0','2022-10-08 07:31:26','2022-10-08 07:31:26'),
(5,'Uang Gedung','2','NONBULANAN','2','0','0','2022-10-08 07:31:42','2022-10-08 07:31:42'),
(6,'Uang Gedung','2','NONBULANAN','4','0','0','2022-10-08 07:32:16','2022-10-08 07:32:16'),
(7,'Uang Seragam','3','NONBULANAN','2','0','0','2022-10-10 02:44:02','2022-10-10 02:44:02'),
(8,'Uang Seragam','3','NONBULANAN','4','0','0','2022-10-10 02:44:53','2022-10-10 02:44:53');

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
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_ortus` */

insert  into `data_ortus`(`id`,`nik`,`id_siswa`,`nama_ortu`,`tmp_lahir_ortu`,`tgl_lhr_ortu`,`status_ortu`,`pendidikan_terakhir_ortu`,`pekerjaan_terakhir_ortu`,`domisili_ortu`,`no_tlp_ortu`,`penghasilan_ortu`,`alamat_ortu`,`tmp_tinggal_ortu`,`jns_ortu`,`created_at`,`updated_at`) values 
(10,'2-0982305','9872989345','mest','malang','2022-12-31','Duda','SMP','Buruh','Dalam Negeri','-','10000000','-','Milik Sendiri','ayah','2022-10-08 09:31:35','2022-10-08 09:31:35'),
(11,'1045234','9872989345','kljalkdsf','malang','2022-12-31','no','SMP','Buruh','Dalam Negeri','08080902945','10000000','-','Milik Sendiri','ibu','2022-10-08 09:31:35','2022-10-08 09:31:35'),
(12,'-','9872989345','-','-','2022-12-31','-','SD','-','Dalam Negeri','-','1000000','-','Milik Sendiri','wali','2022-10-08 09:31:35','2022-10-08 09:31:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_siswas` */

insert  into `data_siswas`(`id`,`nik`,`nama`,`nisn`,`kip`,`tmp_lahir`,`tgl_lhr`,`jns_kelamin`,`agama`,`anak`,`jml_saudara`,`hobi`,`cita_cita`,`no_hp`,`email`,`biaya_sekolah`,`kebutuhan_disabilitas`,`kebutuhan_khusus`,`alamat`,`tmp_tinggal`,`jarak_tinggal`,`waktu_tempuh`,`antar_jemput`,`foto_siswa`,`status_siswa`,`created_at`,`updated_at`) values 
(5,'9872989345','TEST','24352345','-','Malang','2022-12-31','Laki Laki','Islam',0,0,'-','-','-','admin@sipinter.com','Orang Tua','-','-','-','Tinggal Dengan Orangtua/Wali','0','0','Diantar','png_20220730_123144_0000.png','Aktif','2022-10-08 09:31:35','2022-10-08 13:52:17'),
(6,'123456789','Ahmad Sofyan Hadi','123456789','-','Malang','2003-09-22','Laki Laki','Islam',1,1,'Ngoding','Menjadi Imam Mu','089686527295','sofy@security.com','Orang Tua','-','-','Malang','Tinggal Dengan Orangtua/Wali','0','0','Diantar','Artboard 1.png','Aktif',NULL,NULL),
(7,'987654321','Choirul Dani','987654321','-','Malang','2003-09-22','Laki Laki','Islam',1,1,'Ngoding','Menjadi Imam Mu','089686527295','choirul@security.com','Orang Tua','-','-','Arjosaris','Tinggal Dengan Orangtua/Wali','0','0','Diantar','Artboard 1.png','Aktif',NULL,NULL),
(8,'1111111','Nailul ijlal Haq','1111111','-','Pasuruan','2004-11-07','Laki Laki','Islam',1,1,'Ngoding','Menjadi Imam Mu','089686527295','alil@security.com','Orang Tua','-','-','Arjosaris','Tinggal Dengan Orangtua/Wali','0','0','Diantar','Artboard 1.png','Aktif',NULL,NULL),
(9,'22222222','Erlagga Garuda Nusantara','22222222','-','Lawang','2005-11-07','Laki Laki','Islam',1,1,'Ngoding','Menjadi Imam Mu','089686527295','angga@security.com','Orang Tua','-','-','Lawang','Tinggal Dengan Orangtua/Wali','0','0','Diantar','Artboard 1.png','Aktif',NULL,NULL),
(10,'33333333','Gatau Kok Tanya saya','33333333','-','Lawang','2005-11-07','Laki Laki','Islam',1,1,'Ngoding','Menjadi Imam Mu','089686527295','gaktau@security.com','Orang Tua','-','-','Lawang','Tinggal Dengan Orangtua/Wali','0','0','Diantar','Artboard 1.png','Aktif',NULL,NULL);

/*Table structure for table `data_tamus` */

DROP TABLE IF EXISTS `data_tamus`;

CREATE TABLE `data_tamus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tamu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_tamus` */

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

/*Table structure for table `jadwals` */

DROP TABLE IF EXISTS `jadwals`;

CREATE TABLE `jadwals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jadwals` */

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jurusans` */

insert  into `jurusans`(`id`,`kode_jurusan`,`nama_jurusan`,`status_jurusan`,`created_at`,`updated_at`) values 
(5,'RPL','Rekayasa Perangkat Lunak','Aktif',NULL,NULL),
(6,'TKJ','Teknik Komputer Jaringan','Aktif',NULL,NULL),
(7,'MEKATRONIKA','Mekatronika','Aktif',NULL,NULL);

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

insert  into `kelas`(`id`,`kode_kelas`,`nama_kelas`,`status_kelas`,`created_at`,`updated_at`) values 
(4,'X','Sepuluh','Aktif',NULL,NULL),
(5,'XI','Sebelas','Aktif',NULL,NULL),
(6,'XII','Duabelas','Aktif',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

/*Table structure for table `keuangan_detail_nonbulanans` */

DROP TABLE IF EXISTS `keuangan_detail_nonbulanans`;

CREATE TABLE `keuangan_detail_nonbulanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_non_bulanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_input_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_detail_nonbulanans` */

insert  into `keuangan_detail_nonbulanans`(`id`,`kode_non_bulanan`,`tgl_input_detail`,`jenis_pembayaran_detail`,`nominal_detail`,`created_at`,`updated_at`) values 
(15,'13','2022-10-10','1','500000','2022-10-10 02:36:45','2022-10-10 02:36:45'),
(16,'13','2022-10-10','1','500000','2022-10-10 02:40:01','2022-10-10 02:40:01'),
(17,'14','2022-10-10','1','120000','2022-10-10 02:47:07','2022-10-10 02:47:07'),
(18,'14','2022-10-10','1','-120000','2022-10-10 02:48:55','2022-10-10 02:48:55'),
(19,'15','2022-10-12','1','150000','2022-10-12 00:46:56','2022-10-12 00:46:56'),
(20,'14','2022-10-12','1','1200000','2022-10-12 01:06:07','2022-10-12 01:06:07'),
(21,'14','2022-10-12','1','300000','2022-10-12 01:06:39','2022-10-12 01:06:39');

/*Table structure for table `keuangan_pembayaran_bulanans` */

DROP TABLE IF EXISTS `keuangan_pembayaran_bulanans`;

CREATE TABLE `keuangan_pembayaran_bulanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_biaya_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagihan_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_pembayaran_bulanans` */

insert  into `keuangan_pembayaran_bulanans`(`id`,`kode_siswa`,`kode_kelas`,`kode_jenis_pembayaran`,`kode_biaya_siswa`,`bulan_pembayaran`,`tagihan_pembayaran`,`nominal_pembayaran`,`tgl_bayar`,`status_pembayaran`,`ket_pembayaran`,`created_at`,`updated_at`) values 
(22,'5','6',NULL,'3','Juli','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(23,'5','6',NULL,'3','Agustus','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(24,'5','6',NULL,'3','September','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(25,'5','6',NULL,'3','Oktober','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(26,'5','6',NULL,'3','November','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(27,'5','6',NULL,'3','Desember','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(28,'5','6',NULL,'3','Januari','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(29,'5','6',NULL,'3','Februari','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(30,'5','6',NULL,'3','Maret','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(31,'5','6',NULL,'3','April','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(32,'5','6',NULL,'3','Mei','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(33,'5','6',NULL,'3','Juni','100000','0','-','0',NULL,'2022-10-10 04:06:26','2022-10-10 04:06:26'),
(58,'5','6','1','4','Juli','150000','150000','2022-10-12','1',NULL,'2022-10-12 01:14:55','2022-10-12 02:59:28'),
(59,'5','6','1','4','Agustus','150000','150000','2022-10-12','1',NULL,'2022-10-12 01:14:55','2022-10-12 03:00:00'),
(60,'5','6',NULL,'4','September','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(61,'5','6',NULL,'4','Oktober','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(62,'5','6',NULL,'4','November','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(63,'5','6',NULL,'4','Desember','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(64,'5','6',NULL,'4','Januari','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(65,'5','6',NULL,'4','Februari','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(66,'5','6',NULL,'4','Maret','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(67,'5','6',NULL,'4','April','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(68,'5','6',NULL,'4','Mei','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55'),
(69,'5','6',NULL,'4','Juni','150000','0','-','0',NULL,'2022-10-12 01:14:55','2022-10-12 01:14:55');

/*Table structure for table `keuangan_pembayaran_nonbulanans` */

DROP TABLE IF EXISTS `keuangan_pembayaran_nonbulanans`;

CREATE TABLE `keuangan_pembayaran_nonbulanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_biaya_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagihan_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_pembayaran_nonbulanans` */

insert  into `keuangan_pembayaran_nonbulanans`(`id`,`kode_siswa`,`kode_kelas`,`kode_jenis_pembayaran`,`kode_biaya_siswa`,`tagihan_pembayaran`,`nominal_pembayaran`,`tgl_bayar`,`status_pembayaran`,`ket_pembayaran`,`created_at`,`updated_at`) values 
(13,'6','4',NULL,'6','1000000','1000000','2022-10-10','1',NULL,'2022-10-10 02:36:06','2022-10-10 02:40:01'),
(14,'5','6',NULL,'6','1500000','1500000','2022-10-12','1',NULL,'2022-10-10 02:46:42','2022-10-12 01:06:39'),
(15,'5','6',NULL,'5','150000','150000','2022-10-12','1',NULL,'2022-10-12 00:46:36','2022-10-12 00:46:56');

/*Table structure for table `keuangan_penerimaan_lain_details` */

DROP TABLE IF EXISTS `keuangan_penerimaan_lain_details`;

CREATE TABLE `keuangan_penerimaan_lain_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_terima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_penerimaan_lain_details` */

insert  into `keuangan_penerimaan_lain_details`(`id`,`kode_penerimaan`,`pos_terima`,`detail_keterangan`,`detail_jumlah`,`created_at`,`updated_at`) values 
(3,'2','PP_HfhVJI0','SPP ngab','180000','2022-09-17 08:05:31','2022-09-17 08:05:31'),
(5,'3','PP_JZgNjZ2','-','10000000','2022-10-12 03:32:27','2022-10-12 03:32:27');

/*Table structure for table `keuangan_penerimaan_lains` */

DROP TABLE IF EXISTS `keuangan_penerimaan_lains`;

CREATE TABLE `keuangan_penerimaan_lains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerimaan_dari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `methode_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_penerimaan_lains` */

insert  into `keuangan_penerimaan_lains`(`id`,`tgl_penerimaan`,`penerimaan_dari`,`methode_bayar`,`desc_penerimaan`,`created_at`,`updated_at`) values 
(2,'2022-09-17','Bupati 1','MTD_z6RQW01','Santunan Santriwati','2022-09-17 06:21:29','2022-09-17 08:03:36'),
(3,'2022-10-12','Bupati','MTD_NXnza00','-','2022-10-12 03:32:09','2022-10-12 03:32:09');

/*Table structure for table `keuangan_pengeluaran_details` */

DROP TABLE IF EXISTS `keuangan_pengeluaran_details`;

CREATE TABLE `keuangan_pengeluaran_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_pengeluaran_details` */

insert  into `keuangan_pengeluaran_details`(`id`,`kode_pengeluaran`,`pos_sumber`,`pos_keluar`,`detail_keterangan`,`detail_jumlah`,`created_at`,`updated_at`) values 
(1,'1','PP_HfhVJI0','PP_EkXbk60','-','150000','2022-10-12 03:18:30','2022-10-12 03:18:30');

/*Table structure for table `keuangan_pengeluarans` */

DROP TABLE IF EXISTS `keuangan_pengeluarans`;

CREATE TABLE `keuangan_pengeluarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `methode_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_pengeluarans` */

insert  into `keuangan_pengeluarans`(`id`,`tgl_pengeluaran`,`methode_bayar`,`desc_pengeluaran`,`created_at`,`updated_at`) values 
(1,'2022-10-12','MTD_NXnza00','-','2022-10-12 03:18:10','2022-10-12 03:18:10');

/*Table structure for table `keuangan_tabungan_siswa_details` */

DROP TABLE IF EXISTS `keuangan_tabungan_siswa_details`;

CREATE TABLE `keuangan_tabungan_siswa_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_akhir_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_tabungan_siswa_details` */

insert  into `keuangan_tabungan_siswa_details`(`id`,`kode_detail`,`kode_tabungan`,`nominal_detail`,`saldo_awal_detail`,`saldo_akhir_detail`,`type_detail`,`keterangan_detail`,`created_at`,`updated_at`) values 
(7,'TDS_MngkDk0','2','150000','0','150000','0','-','2022-10-12 03:31:45','2022-10-12 03:31:45');

/*Table structure for table `keuangan_tabungan_siswas` */

DROP TABLE IF EXISTS `keuangan_tabungan_siswas`;

CREATE TABLE `keuangan_tabungan_siswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `keuangan_tabungan_siswas` */

insert  into `keuangan_tabungan_siswas`(`id`,`kode_tabungan`,`kode_siswa`,`saldo_tabungan`,`status_tabungan`,`desc_tabungan`,`created_at`,`updated_at`) values 
(2,'TS_JjEbxP0','5','150000','1','-','2022-10-12 03:28:23','2022-10-12 03:31:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mata_pelajarans` */

insert  into `mata_pelajarans`(`id`,`kode_kelompok`,`kode_mapel`,`nama_mapel`,`status_mapel`,`created_at`,`updated_at`) values 
(2,'K01','BIG','Bahasa Inggris','Aktif','2022-10-01 15:00:52','2022-10-01 15:00:52'),
(3,'K01','BIND','Bahasa Indonesia','Aktif','2022-10-01 15:01:07','2022-10-01 15:01:07'),
(4,'K01','MAT','Matematika','Aktif','2022-10-01 15:01:24','2022-10-01 15:01:24');

/*Table structure for table `methode_pembayarans` */

DROP TABLE IF EXISTS `methode_pembayarans`;

CREATE TABLE `methode_pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_methode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_methode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_methode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `methode_pembayarans` */

insert  into `methode_pembayarans`(`id`,`kode_methode`,`nama_methode`,`desc_methode`,`created_at`,`updated_at`) values 
(1,'MTD_NXnza00','TUNAI','Tunai ygy','2022-09-17 06:16:11','2022-09-17 06:16:11');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(200,'2019_12_14_000001_create_personal_access_tokens_table',1),
(201,'2022_08_25_012107_create_methode_pembayarans_table',1),
(202,'2022_08_25_022003_create_pos_penerimaans_table',1),
(203,'2022_08_25_022017_create_pos_pengeluarans_table',1),
(204,'2022_09_13_012216_create_biaya_siswas_table',1),
(205,'2022_09_14_032902_create_keuangan_pengeluarans_table',1),
(206,'2022_09_14_032940_create_keuangan_penerimaan_lains_table',1),
(207,'2022_09_14_033101_create_keuangan_pengeluaran_details_table',1),
(208,'2022_09_14_033135_create_keuangan_penerimaan_lain_details_table',1),
(209,'2022_09_14_033653_create_keuangan_tabungan_siswas_table',1),
(210,'2022_09_22_013200_create_keuangan_tabungan_siswa_details_table',1),
(211,'2022_10_05_021602_create_keuangan_pembayaran_bulanans_table',1),
(212,'2022_10_05_021622_create_keuangan_pembayaran_nonbulanans_table',1),
(213,'2022_07_23_054446_create_kelas_table',2),
(214,'2022_07_23_054739_create_jurusans_table',2),
(215,'2022_07_23_055106_create_tahun_ajarans_table',2),
(216,'2022_07_23_055330_create_kelompok_pelajarans_table',2),
(217,'2022_07_23_055445_create_mata_pelajarans_table',2),
(218,'2022_07_23_061916_create_data_siswas_table',2),
(219,'2022_07_23_061930_create_data_gurus_table',2),
(220,'2022_07_23_061955_create_data_ortus_table',2),
(221,'2022_07_27_014724_create_ekstrakulikulers_table',2),
(222,'2022_07_27_063906_create_predikats_table',2),
(223,'2022_07_30_034501_create_jadwals_table',2),
(224,'2022_07_30_060249_create_aktivitas_belajars_table',2),
(225,'2022_08_01_060418_create_absensis_table',2),
(226,'2022_08_04_021754_create_prestasis_table',2),
(227,'2022_08_17_015734_create_anggota_ekstras_table',2),
(228,'2022_09_21_092148_create_akademik_pindah_kelas_table',2),
(230,'2022_09_27_082000_create_akademik_kategori_nilais_table',2),
(231,'2022_09_30_092300_create_akademik_nilai_prestasis_table',3),
(232,'2022_09_30_093926_create_akademik_nilai_ekstras_table',3),
(233,'2022_10_03_101244_create_akademik_nilai_details_table',3),
(234,'2022_09_26_073804_create_akademik_nilais_table',4),
(235,'2022_10_08_073648_create_keuangan_detail_nonbulanans_table',5);

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

/*Table structure for table `pelanggarans` */

DROP TABLE IF EXISTS `pelanggarans`;

CREATE TABLE `pelanggarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_poin_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_minus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pelanggarans` */

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

/*Table structure for table `point_pelanggarans` */

DROP TABLE IF EXISTS `point_pelanggarans`;

CREATE TABLE `point_pelanggarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_poin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_poin_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `point_pelanggarans` */

/*Table structure for table `pos_penerimaans` */

DROP TABLE IF EXISTS `pos_penerimaans`;

CREATE TABLE `pos_penerimaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pos_penerimaans` */

insert  into `pos_penerimaans`(`id`,`kode_pos`,`nama_pos`,`desc_pos`,`created_at`,`updated_at`) values 
(1,'PP_HfhVJI0','SPP','SPP','2022-09-17 06:16:25','2022-09-17 06:16:25'),
(2,'PP_ljNWHP1','Uang Pendaftaran','-','2022-10-08 02:48:21','2022-10-08 02:48:21'),
(3,'PP_JZgNjZ2','Uang Seragam','-','2022-10-10 02:31:16','2022-10-10 02:31:16');

/*Table structure for table `pos_pengeluarans` */

DROP TABLE IF EXISTS `pos_pengeluarans`;

CREATE TABLE `pos_pengeluarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pos_pengeluarans` */

insert  into `pos_pengeluarans`(`id`,`kode_pos`,`nama_pos`,`desc_pos`,`created_at`,`updated_at`) values 
(1,'PP_EkXbk60','LISTRIK','LISTRIK','2022-09-17 06:16:38','2022-09-17 06:16:38');

/*Table structure for table `ppdb_pengaturans` */

DROP TABLE IF EXISTS `ppdb_pengaturans`;

CREATE TABLE `ppdb_pengaturans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prosedur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ppdb_pengaturans` */

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

/*Table structure for table `prestasis` */

DROP TABLE IF EXISTS `prestasis`;

CREATE TABLE `prestasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peringkat_diraih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prestasis` */

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

/*Table structure for table `sanksi_pelanggarans` */

DROP TABLE IF EXISTS `sanksi_pelanggarans`;

CREATE TABLE `sanksi_pelanggarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari_poin` int(11) NOT NULL,
  `sampai_poin` int(11) NOT NULL,
  `sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sanksi_pelanggarans` */

/*Table structure for table `sarpras_aset_lains` */

DROP TABLE IF EXISTS `sarpras_aset_lains`;

CREATE TABLE `sarpras_aset_lains` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_aset_lains` */

/*Table structure for table `sarpras_data_asets` */

DROP TABLE IF EXISTS `sarpras_data_asets`;

CREATE TABLE `sarpras_data_asets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_data_asets` */

/*Table structure for table `sarpras_gedungs` */

DROP TABLE IF EXISTS `sarpras_gedungs`;

CREATE TABLE `sarpras_gedungs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_lantai` int(11) NOT NULL,
  `kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_dibangun` int(11) NOT NULL,
  `luas_gedung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_gedungs` */

/*Table structure for table `sarpras_kategori_asets` */

DROP TABLE IF EXISTS `sarpras_kategori_asets`;

CREATE TABLE `sarpras_kategori_asets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_kategori_asets` */

/*Table structure for table `sarpras_kebutuhan_tambahans` */

DROP TABLE IF EXISTS `sarpras_kebutuhan_tambahans`;

CREATE TABLE `sarpras_kebutuhan_tambahans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_pengajuan` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sifat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rangking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_kebutuhan_tambahans` */

/*Table structure for table `sarpras_laboratoria` */

DROP TABLE IF EXISTS `sarpras_laboratoria`;

CREATE TABLE `sarpras_laboratoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_laboratoria` */

/*Table structure for table `sarpras_lahans` */

DROP TABLE IF EXISTS `sarpras_lahans`;

CREATE TABLE `sarpras_lahans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_lahans` */

/*Table structure for table `sarpras_lapangans` */

DROP TABLE IF EXISTS `sarpras_lapangans`;

CREATE TABLE `sarpras_lapangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_lapangans` */

/*Table structure for table `sarpras_mebels` */

DROP TABLE IF EXISTS `sarpras_mebels`;

CREATE TABLE `sarpras_mebels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_mebels` */

/*Table structure for table `sarpras_olahraga_senis` */

DROP TABLE IF EXISTS `sarpras_olahraga_senis`;

CREATE TABLE `sarpras_olahraga_senis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_olahraga_senis` */

/*Table structure for table `sarpras_penerangan_internets` */

DROP TABLE IF EXISTS `sarpras_penerangan_internets`;

CREATE TABLE `sarpras_penerangan_internets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_penerangan_internets` */

/*Table structure for table `sarpras_ruangans` */

DROP TABLE IF EXISTS `sarpras_ruangans`;

CREATE TABLE `sarpras_ruangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_dibangun` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_ruangans` */

/*Table structure for table `sarpras_sanitasis` */

DROP TABLE IF EXISTS `sarpras_sanitasis`;

CREATE TABLE `sarpras_sanitasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_sanitasis` */

/*Table structure for table `sarpras_sarana_administrasis` */

DROP TABLE IF EXISTS `sarpras_sarana_administrasis`;

CREATE TABLE `sarpras_sarana_administrasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_sarana_administrasis` */

/*Table structure for table `sarpras_sarana_belajars` */

DROP TABLE IF EXISTS `sarpras_sarana_belajars`;

CREATE TABLE `sarpras_sarana_belajars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sarana_pembelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_sarana_belajars` */

/*Table structure for table `sarpras_umums` */

DROP TABLE IF EXISTS `sarpras_umums`;

CREATE TABLE `sarpras_umums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sarpras_umums` */

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
(2,'00000','0000','2115251','A','SIPINTAR','JL.Sipintar','0.0','0.0','350706','350706001','65124','089524610353','sipintar@gmail.com','-','jamanu.png',NULL,NULL);

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
('2pc5eP7W1NIlWPq7Uh3bXfCcCz9BZ5dg1HN9QZmd',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaTgyMWdSc0VvalZrWnZGeGk3N0c1MVBmYW1QY0ZCUDVsRHQzZE1oTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vbG9jYWxob3N0L2tldWFuZ2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1665545579);

/*Table structure for table `siswa_daftars` */

DROP TABLE IF EXISTS `siswa_daftars`;

CREATE TABLE `siswa_daftars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nl_tpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nl_tpd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswa_daftars` */

/*Table structure for table `slideshows` */

DROP TABLE IF EXISTS `slideshows`;

CREATE TABLE `slideshows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `slideshows` */

/*Table structure for table `tahun_ajarans` */

DROP TABLE IF EXISTS `tahun_ajarans`;

CREATE TABLE `tahun_ajarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tahun_ajarans` */

insert  into `tahun_ajarans`(`id`,`kode_tahun_ajaran`,`tahun_ajaran`,`status_tahun_ajaran`,`created_at`,`updated_at`) values 
(2,'EK-100','2019/2020','Nonaktif',NULL,NULL),
(4,'EK-101','2021/2022','Aktif',NULL,'2022-10-08 14:30:06');

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
