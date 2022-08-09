-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 08:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_boxes`
--

CREATE TABLE `arsip_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_box` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_boxes`
--

INSERT INTO `arsip_boxes` (`id`, `nama_box`, `created_at`, `updated_at`) VALUES
(2, 'NgoboxNgobox', '2022-08-09 11:00:19', '2022-08-09 11:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_data_uruts`
--

CREATE TABLE `arsip_data_uruts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_urut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_data_uruts`
--

INSERT INTO `arsip_data_uruts` (`id`, `nama_urut`, `created_at`, `updated_at`) VALUES
(1, '100', '2022-08-09 11:13:29', '2022-08-09 11:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_jenis_dokumens`
--

CREATE TABLE `arsip_jenis_dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_jenis_dokumens`
--

INSERT INTO `arsip_jenis_dokumens` (`id`, `nama_jenis_dokumen`, `created_at`, `updated_at`) VALUES
(1, '1001 Kode Nuklir Jepang', '2022-08-09 11:23:31', '2022-08-09 11:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_lemaris`
--

CREATE TABLE `arsip_lemaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lemari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_lemaris`
--

INSERT INTO `arsip_lemaris` (`id`, `nama_lemari`, `created_at`, `updated_at`) VALUES
(1, 'Lemari Palsu', '2022-08-09 11:15:21', '2022-08-09 11:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_maps`
--

CREATE TABLE `arsip_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_maps`
--

INSERT INTO `arsip_maps` (`id`, `nama_map`, `created_at`, `updated_at`) VALUES
(1, 'Mapan Bersamamu Amiin', '2022-08-09 11:05:44', '2022-08-09 11:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_raks`
--

CREATE TABLE `arsip_raks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_raks`
--

INSERT INTO `arsip_raks` (`id`, `nama_rak`, `created_at`, `updated_at`) VALUES
(1, 'Rak Aqua', '2022-08-09 10:53:08', '2022-08-09 10:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_ruangans`
--

CREATE TABLE `arsip_ruangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_ruangans`
--

INSERT INTO `arsip_ruangans` (`id`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'Ruangan penjara', '2022-08-09 11:15:02', '2022-08-09 11:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `cek_kelulusans`
--

CREATE TABLE `cek_kelulusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_gurus`
--

CREATE TABLE `data_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_ortus`
--

CREATE TABLE `data_ortus` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_siswas`
--

CREATE TABLE `data_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_siswas`
--

INSERT INTO `data_siswas` (`id`, `nik`, `nama`, `nisn`, `kip`, `tmp_lahir`, `tgl_lhr`, `jns_kelamin`, `agama`, `anak`, `jml_saudara`, `hobi`, `cita_cita`, `no_hp`, `email`, `biaya_sekolah`, `kebutuhan_disabilitas`, `kebutuhan_khusus`, `alamat`, `tmp_tinggal`, `jarak_tinggal`, `waktu_tempuh`, `antar_jemput`, `foto_siswa`, `status_siswa`, `created_at`, `updated_at`) VALUES
(7, '41141411311', 'Achmad Sofyan', '414111415', 'ya', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lemari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_dokumen` datetime NOT NULL,
  `jenis_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumens`
--

INSERT INTO `dokumens` (`id`, `ruangan`, `lemari`, `rak`, `box`, `map`, `urut`, `tanggal_dokumen`, `jenis_dokumen`, `nomor_dokumen`, `nama_dokumen`, `deskripsi`, `file`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, 'R0100', 'Rak Soeharto asu', '100', 'blogoblog', 'Mapan Bersamamu', '10000', '2022-08-06 05:27:03', 'Dalang pembunuan Munir', 1, 'Dokumen Rahasia Negara', 'Dokumen Rahasia', '', '0000-00-00', NULL, '2022-08-08 20:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikulers`
--

CREATE TABLE `ekstrakulikulers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wajib_ekstra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakulikulers`
--

INSERT INTO `ekstrakulikulers` (`id`, `kode_ekstra`, `nama_ekstra`, `desc_ekstra`, `status_ekstra`, `wajib_ekstra`, `created_at`, `updated_at`) VALUES
(1, 'EK-001', 'Kesenian Tari', 'Ekstra Tari Untuk Kesenian Tari', 'Aktif', 'Tidak Wajib', '2022-07-26 19:15:33', '2022-07-26 19:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dokumens`
--

CREATE TABLE `jenis_dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_dokumens`
--

INSERT INTO `jenis_dokumens` (`id`, `nama_jenis_dokumen`, `created_at`, `updated_at`) VALUES
(1, '1001 Kode Nuklir Jepang', '2022-08-09 11:14:36', '2022-08-09 11:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `ket_kecamatan`, `created_at`, `updated_at`) VALUES
(1, '350706', 'AmpelGading', 'AmpelGading', '2022-07-19 04:14:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_pelajarans`
--

CREATE TABLE `kelompok_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ujian` int(11) NOT NULL,
  `bind` int(11) NOT NULL,
  `mat` int(11) NOT NULL,
  `bing` int(11) NOT NULL,
  `kejuruhan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kode_kelurahan`, `kode_kecamatan`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, '350706001', '350706', 'Argoyuwono', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_06_025442_create_dokumens_table', 1),
(3, '2022_08_09_043407_create_tamus_table', 1),
(4, '2022_08_09_163910_create_jenis_dokumens_table', 1),
(5, '2022_08_09_170248_create_arsip_ruangans_table', 1),
(6, '2022_08_09_170623_create_arsip_lemaris_table', 1),
(7, '2022_08_09_171554_create_arsip_raks_table', 1),
(8, '2022_08_09_171957_create_arsip_boxes_table', 1),
(9, '2022_08_09_172902_create_arsip_maps_table', 1),
(10, '2022_08_09_173719_create_arsip_data_uruts_table', 1),
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_07_14_015617_create_roles_table', 2),
(26, '2022_07_15_064050_sekolah', 2),
(28, '2022_07_15_133155_create_notifs_table', 3),
(30, '2022_07_18_033038_create_uploads_table', 4),
(31, '2022_07_18_040111_create_sekolahs_table', 5),
(32, '2022_07_19_023748_kelurahan', 6),
(33, '2022_07_19_023804_kecamatan', 6),
(34, '2022_07_20_030417_create_sessions_table', 7),
(51, '2022_07_23_054446_create_kelas_table', 8),
(52, '2022_07_23_054739_create_jurusans_table', 8),
(53, '2022_07_23_055106_create_tahun_ajarans_table', 8),
(54, '2022_07_23_055330_create_kelompok_pelajarans_table', 8),
(65, '2022_07_23_055445_create_mata_pelajarans_table', 9),
(70, '2022_07_23_061916_create_data_siswas_table', 10),
(71, '2022_07_23_061930_create_data_gurus_table', 10),
(72, '2022_07_23_061955_create_data_ortus_table', 10),
(73, '2022_07_27_014724_create_ekstrakulikulers_table', 11),
(74, '2022_07_27_063906_create_predikats_table', 12),
(75, '2022_07_26_124447_create_cek_kelulusans_table', 13),
(76, '2022_07_26_140212_create_pengaturans_table', 13),
(77, '2022_07_30_023905_kelulusan', 13),
(78, '2022_08_02_135111_pengaturan_kelulusan', 13),
(79, '2022_08_06_025442_create_dokumens_table', 14),
(80, '2022_08_09_043407_create_tamus_table', 15),
(81, '2022_08_09_181907_create_arsip_jenis_dokumens_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`id`, `nama_pengumuman`, `isi_pengumuman`, `file_pengumuman`, `status_pengumuman`, `created_at`, `updated_at`) VALUES
(10, 'Pengumuman Test', 'Ini Adalah Tes Untuk Pengumuman', 'WhatsApp Image 2022-07-16 at 10.56.19.jpeg', '0', '2022-07-18 22:06:53', '2022-07-18 22:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengumuman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tahun` int(11) NOT NULL,
  `info_kelulusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_lainya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengumuman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tahun` int(11) NOT NULL,
  `info_kelulusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_lainya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predikats`
--

CREATE TABLE `predikats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_name`, `roles_access`, `id_roles`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `kode_sekolah`, `nsm`, `npsn`, `akreditasi`, `nama_sekolah`, `alamat_sekolah`, `longtitude`, `latitude`, `kode_kecamatan`, `kode_kelurahan`, `kode_pos`, `nomor_hp`, `email`, `website`, `logo_sekolah`, `created_at`, `updated_at`) VALUES
(2, '00000', '0000', '2115251', 'A', 'SIPINTAR', 'JL.Sipintar', '0.0', '0.0', '350706', '350706001', '65124', '089524610353', 'sipintar@gmail.com', '-', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jXzwKCxpD2TcwYQbysca9OjzTVciw62TEPa0xmn5', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1lab3YyVjdDQXFLUEZjMVZpUzRMa1ZlanFmZUJHVkY2eER5U2htVyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L2Fyc2lwL2plbmlzX2Rva3VtZW4vY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1660029518),
('wmZac0WTSlY0uySVBZwxXQV7M7dhCjNB2HDRA922', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.81 Safari/537.36 Edg/104.0.1293.47', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUnl5d243TExEYk1MWmRrbHVRZ1VjZXVIbkNlV3pGTVZGOUc2Z3MxcSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vbG9jYWxob3N0L2Fyc2lwL2plbmlzX2Rva3VtZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1660069491);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `status_tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamus`
--

CREATE TABLE `tamus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tamus`
--

INSERT INTO `tamus` (`id`, `nama`, `asal`, `alamat`, `keperluan`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Achmad Sofyan Hadi tes', 'Malang Timur', 'Malang', 'Mencari Dalang Pembunuhan Munir', 1314141, NULL, '2022-08-08 23:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(3, 'WhatsApp Image 2022-07-16 at 10.56.18.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\public/uploads/WhatsApp Image 2022-07-16 at 10.56.18.jpeg', '2022-07-18 21:52:41', '2022-07-18 21:52:41'),
(4, 'WhatsApp Image 2022-07-16 at 10.56.17.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.17.jpeg', '2022-07-18 21:53:27', '2022-07-18 21:53:27'),
(5, 'WhatsApp Image 2022-07-16 at 10.56.19.jpeg', 'C:\\xampp\\htdocs\\sekolahApp\\public\\uploads/WhatsApp Image 2022-07-16 at 10.56.19.jpeg', '2022-07-18 22:06:53', '2022-07-18 22:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@sipinter.com', NULL, '$2y$10$J5QhqMQTJpdcYAL9zgetsOzi3N0j5n0uxu2hNY6uYX/GGXDRvYoMa', '1', NULL, NULL, '2022-07-26 21:25:34'),
(5, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$iHKGKSXkXhPhQOqFp71F/u34lxryrJv/MmK2B3l0Wu4NAr6QKfAqa', '1', NULL, '2022-07-18 20:16:53', '2022-07-18 20:16:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_boxes`
--
ALTER TABLE `arsip_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_data_uruts`
--
ALTER TABLE `arsip_data_uruts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_jenis_dokumens`
--
ALTER TABLE `arsip_jenis_dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_lemaris`
--
ALTER TABLE `arsip_lemaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_maps`
--
ALTER TABLE `arsip_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_raks`
--
ALTER TABLE `arsip_raks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_ruangans`
--
ALTER TABLE `arsip_ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cek_kelulusans`
--
ALTER TABLE `cek_kelulusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_gurus`
--
ALTER TABLE `data_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ortus`
--
ALTER TABLE `data_ortus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_dokumens`
--
ALTER TABLE `jenis_dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tamus`
--
ALTER TABLE `tamus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_boxes`
--
ALTER TABLE `arsip_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsip_data_uruts`
--
ALTER TABLE `arsip_data_uruts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsip_jenis_dokumens`
--
ALTER TABLE `arsip_jenis_dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsip_lemaris`
--
ALTER TABLE `arsip_lemaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arsip_maps`
--
ALTER TABLE `arsip_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsip_raks`
--
ALTER TABLE `arsip_raks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsip_ruangans`
--
ALTER TABLE `arsip_ruangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_dokumens`
--
ALTER TABLE `jenis_dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamus`
--
ALTER TABLE `tamus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
