-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jul 2023 pada 08.07
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsispro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(20) NOT NULL,
  `album` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` enum('Enabled','Disabled') DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `album`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lainnya', 'You can provide the answer that your potential customers are trying to find, so you can become the industry.', 'Enabled', '2021-11-15 22:35:17', '2023-06-26'),
(3, 'Media', 'Create and manage top-performing social campaigns and start developing a dedicated customer fan base.', 'Enabled', '2021-11-15 22:35:48', '2023-06-26'),
(4, 'Rumah Sakit', 'Create, publish and promote engaging content to generate more traffic and build a dedicated community.', 'Enabled', '2021-11-15 22:36:00', '2023-06-26'),
(5, 'Training', 'Get more website traffic, more customers, and more online visibility, online generate with powerful SEO services.', 'Enabled', '2021-11-15 22:36:14', '2023-06-26'),
(6, 'Pelatihan', 'Your website has to impress your visitors within just a few seconds. If it runs slow, if it feels outdated.', 'Enabled', '2021-11-15 22:36:26', '2023-06-26'),
(7, 'Seminar', 'Target your ideal search phrases and get found at the top of Google’s search results. PPC allows you immediate', 'Enabled', '2021-11-15 22:36:38', '2023-06-28'),
(8, 'Ruangan Simulasi', 'Keterangan Gambar Ruangan dan Peralatan', 'Enabled', '2023-06-27 16:38:34', '2023-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(30) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `message` text,
  `baca` enum('No','Yes') DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `baca`, `created_at`, `updated_at`) VALUES
(3, 'Hamzah', 'admin@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Yes', '2021-11-17 18:58:33', '2021-11-18 04:24:30'),
(4, 'Administrator', 'pd001@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Yes', '2021-11-17 19:48:10', '2021-11-18 03:50:03'),
(5, 'drtdrjt', 'sim@pms.rsuh', 'ej45e45e45', 'Yes', '2021-11-17 23:52:01', '2021-11-18 07:52:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_data_pasien` int(30) NOT NULL,
  `nm_pasien` text,
  `no_rkm_medis` varchar(300) DEFAULT NULL,
  `alamat` text,
  `jkel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` text,
  `tgl_lahir` date DEFAULT NULL,
  `no_tlp_1` varchar(500) DEFAULT NULL,
  `no_tlp_2` varchar(500) DEFAULT NULL,
  `diagnosis` text,
  `ef` text,
  `echocardiografi` text,
  `hasil_cath` text,
  `tgl_konferensi` varchar(500) DEFAULT NULL,
  `nm_dokter` varchar(500) DEFAULT NULL,
  `keputusan` text,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `tgl_dihubungi` varchar(500) DEFAULT NULL,
  `tgl_operasi` varchar(500) DEFAULT NULL,
  `nm_operasi` varchar(500) DEFAULT NULL,
  `status_pasien` enum('Bersedia','Masih Berunding','Tidak Bersedia') DEFAULT NULL,
  `konsul_pulmo` varchar(500) DEFAULT NULL,
  `konsul_tht` varchar(500) DEFAULT NULL,
  `konsul_gigi` varchar(500) DEFAULT NULL,
  `konsul_anestesi` varchar(500) DEFAULT NULL,
  `aktif_akun` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_data_pasien`, `nm_pasien`, `no_rkm_medis`, `alamat`, `jkel`, `tempat_lahir`, `tgl_lahir`, `no_tlp_1`, `no_tlp_2`, `diagnosis`, `ef`, `echocardiografi`, `hasil_cath`, `tgl_konferensi`, `nm_dokter`, `keputusan`, `status`, `tgl_dihubungi`, `tgl_operasi`, `nm_operasi`, `status_pasien`, `konsul_pulmo`, `konsul_tht`, `konsul_gigi`, `konsul_anestesi`, `aktif_akun`, `created_at`, `updated_at`) VALUES
(1, 'Ut consequat Est q', '786876', 'Ipsum at Nam rerum a', 'Laki-laki', 'Veritatis cillum qui', '2005-02-08', '0895321036194', '0895321036194', 'Quis ad eos corporis', '86', 'Adipisicing voluptat', 'Et labore dolorem ne', '2023-07-05', 'dr. Rahmawaty, M.Kes, Sp.A', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Aktif', '2023-07-06', '2023-07-06', 'Operasi Elective', 'Bersedia', NULL, 'Konsul THT', 'Konsul Gigi', NULL, NULL, '2023-06-30 13:34:49', '2023-07-06 18:52:48'),
(2, 'Nisi laborum Nam min', '343324', 'In asperiores maiore', 'Perempuan', 'Id quidem velit quis', '2023-12-10', '0895321036194', '0895321036194', 'Voluptatum ut volupt', '85', 'Totam omnis tenetur', 'Minim iusto ullamco', '2023-07-06', 'dr. Sudirman Katu, Sp.PD, K-PTI, FINASIM', 'Keputusan Dokter', 'Aktif', '2023-07-06', '2023-07-14', 'Nama Operasi', 'Bersedia', 'Konsul Pulmo', 'Konsul THT', NULL, NULL, NULL, '2023-06-30 13:36:18', '2023-07-06 22:17:05'),
(3, 'abcd', '000123', 'Similique et nihil v', 'Perempuan', 'Proident ipsa ulla', '1984-02-25', '087667898765', '085456787654', 'Rerum minim libero i', '30', 'Odit voluptatem sin', 'Quis exercitation si', '2023-07-05', 'Prof. dr. Harsinen Sanusi, Sp.PD, K-EMD', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Aktif', '2023-07-06', '2023-07-06', 'Operasi Emergency', 'Bersedia', 'Konsul Pulmo', 'Konsul THT', 'Konsul Gigi', 'Konsul Anestesi', NULL, '2023-06-30 13:46:04', '2023-07-07 01:31:24'),
(4, 'dewa', '067867', 'Tenetur enim dolor e', 'Laki-laki', 'Ut elit cumque et q', '1979-10-21', '0895321036194', '0895321036194', 'Ducimus esse sint d', '59', 'Provident similique', 'Natus sed consequatu', '2023-07-05', 'Prof. Dr. dr. NURPUDJI A. TASLIM, MPH, Sp.GK (K)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Aktif', '2023-07-07', '2023-07-05', 'Nama Operasi', 'Bersedia', 'Konsul Pulmo', NULL, NULL, NULL, 'Aktif', '2023-07-04 02:38:44', '2023-07-07 01:49:07'),
(5, 'Esse exercitation no', '087654', 'Dolor ipsum nobis e', 'Perempuan', 'Accusantium aliqua', '1992-03-12', '0895321036194', '0895321036194', 'Et voluptatem velit', '48', 'Voluptate laudantium', 'Aut quia ea illo fug', '2023-07-05', 'dr. Rahmawati Thamrin, Sp.And', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Aktif', '2023-07-06', NULL, '-', 'Masih Berunding', NULL, NULL, NULL, NULL, NULL, '2023-07-05 03:36:46', '2023-07-06 22:09:41'),
(6, 'Cipto Raharjo', '465345', 'Makassar', 'Laki-laki', 'Tempora exercitation', '2020-07-15', '08567656565', '089656765545', 'Exercitationem magna', '44', 'Anim aliquip harum u', 'Mollit temporibus om', '2023-07-07', 'dr. Sitti Rabiul Zatalia Ramadhan, Sp.PD, K-GH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Aktif', '2023-07-07', '2023-07-26', NULL, 'Bersedia', 'Konsul Pulmo', NULL, NULL, NULL, 'Aktif', '2023-07-07 06:26:44', '2023-07-07 14:33:19'),
(7, 'Susanto Nugraha', '456786', 'Et mollitia vel labo', 'Laki-laki', 'Ut nemo qui consequa', '2021-10-08', '08656545435', '085457656556', 'Eligendi ad fugiat', '50', 'Impedit magna dolor', 'Culpa dolorum ad fac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 07:25:44', '2023-07-07 15:25:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(20) NOT NULL,
  `id_album` int(20) DEFAULT NULL,
  `album` varchar(300) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` text,
  `status` enum('Enabled','Disabled') DEFAULT NULL,
  `image` text,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `general`
--

CREATE TABLE `general` (
  `id` int(20) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `link1` varchar(300) DEFAULT NULL,
  `url_link1` varchar(300) DEFAULT NULL,
  `link2` varchar(300) DEFAULT NULL,
  `url_link2` varchar(300) DEFAULT NULL,
  `link3` varchar(300) DEFAULT NULL,
  `url_link3` varchar(300) DEFAULT NULL,
  `made` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `general`
--

INSERT INTO `general` (`id`, `title`, `description`, `link1`, `url_link1`, `link2`, `url_link2`, `link3`, `url_link3`, `made`, `created_at`, `updated_at`) VALUES
(1, 'My Web Version 2021', '(My Official Website Online)', 'MYPatient', 'http://mypatient/', 'http://mypatient/', 'http://mypatient/', 'http://mypatient/', 'http://mypatient/', '@R3', '2021-07-27 03:38:32', '2021-10-06 07:04:56'),
(2, 'Introduce Best', 'SEO Services for Business', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-28 04:37:57', '2021-10-28 12:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `role` varchar(300) DEFAULT NULL,
  `tgl_kegiatan` varchar(300) DEFAULT NULL,
  `jam_kegiatan` varchar(300) DEFAULT NULL,
  `kegiatan` text,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `role`, `tgl_kegiatan`, `jam_kegiatan`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '2023-07-07', '11:19:51', 'Login Admin Sistem - Masuk', '2023-07-07 03:19:51', '2023-07-07 11:19:51'),
(2, 13, 'pasien', '2023-07-07', '11:50:27', 'Login Pasien - Username : 067867@jantungmakassar.id - Pasien : dewa', '2023-07-07 03:50:27', '2023-07-07 11:50:27'),
(3, 1, 'admin', '2023-07-07', '12:05:06', 'Login Admin Sistem - Masuk', '2023-07-07 04:05:06', '2023-07-07 12:05:06'),
(4, 1, 'admin', '2023-07-07', '14:24:52', 'Login Admin Sistem - Masuk', '2023-07-07 06:24:52', '2023-07-07 14:24:52'),
(5, 1, 'admin', '2023-07-07', '14:33:12', 'Login Admin Sistem - Masuk', '2023-07-07 06:33:12', '2023-07-07 14:33:12'),
(6, 14, 'pasien', '2023-07-07', '14:33:31', 'Login Pasien - Username : 465345@jantungmakassar.id - Pasien : Cipto Raharjo', '2023-07-07 06:33:31', '2023-07-07 14:33:31'),
(7, 1, 'admin', '2023-07-07', '14:33:49', 'Login Admin Sistem - Masuk', '2023-07-07 06:33:49', '2023-07-07 14:33:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `head` varchar(300) DEFAULT NULL,
  `info` varchar(300) DEFAULT NULL,
  `link1` varchar(300) DEFAULT NULL,
  `link2` varchar(300) DEFAULT NULL,
  `url_link1` varchar(300) DEFAULT NULL,
  `url_link2` varchar(300) DEFAULT NULL,
  `by` varchar(300) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `head`, `info`, `link1`, `link2`, `url_link1`, `url_link2`, `by`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Official MY WEB Ver.2021', '(Open Source Content Management  Web Application)', 'Google', 'Youtube', 'http://google/', 'http://youtube/', 'Makassar, Indonesia @R3', '88163341893423208_100000822928143_6987_ncopycopy.jpg', '2021-07-25 12:43:11', '2021-10-05 07:28:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id` int(20) NOT NULL,
  `meta_keyword` varchar(300) DEFAULT NULL,
  `meta_description` varchar(300) DEFAULT NULL,
  `meta_author` varchar(300) DEFAULT NULL,
  `favicon` varchar(300) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id`, `meta_keyword`, `meta_description`, `meta_author`, `favicon`, `title`, `logo`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'http://mypatient/', 'http://mypatient/', 'http://mypatient/', '101633444934unhas.png', 'http://mypatient/', '43163349359823208_100000822928143_6987_ncopycopy.jpg', 'MyWeb', 'http://mypatient/', '2021-07-25 18:37:40', '2021-10-06 04:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo_front`
--

CREATE TABLE `logo_front` (
  `id` int(30) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logo_front`
--

INSERT INTO `logo_front` (`id`, `name`, `logo`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Logo', '811635789959pngegg.png', 'http://localhost/myweb', '2021-10-15 07:28:59', '2021-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dokter`
--

CREATE TABLE `master_dokter` (
  `id_dokter` int(30) NOT NULL,
  `nm_dokter` text,
  `keterangan` text,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_dokter`
--

INSERT INTO `master_dokter` (`id_dokter`, `nm_dokter`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, '-', NULL, 'Tidak Aktif', NULL, NULL),
(2, 'Prof. Dr. dr. Amiruddin Aliah, MM, Sp.S (K)', NULL, 'Aktif', NULL, NULL),
(3, 'Prof. dr. Syarifuddin Wahid, Ph.D, Sp.PA (K)', NULL, 'Aktif', NULL, NULL),
(4, 'Prof. Dr. dr. Syarifuddin Rauf, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(5, 'Prof. Dr. dr. Ali Aspar Mappahya, Sp.PD, Sp.JP (K)', NULL, 'Aktif', NULL, NULL),
(6, 'dr. Ruland DN Pakasi, Sp.PK (K)', NULL, 'Aktif', NULL, NULL),
(7, 'dr. Djumadi Achmad, Sp. PA (K)', NULL, 'Aktif', NULL, NULL),
(8, 'Prof. dr. Peter Kabo, Ph.D, Sp.F (K), Sp.JP (K)', NULL, 'Aktif', NULL, NULL),
(9, 'Prof. Dr. dr. Idrus A Patturusi, Sp.B, Sp.OT (K) Spine', NULL, 'Aktif', NULL, NULL),
(10, 'dr. Cahyono Kaelan, Ph.D, Sp.PA (K), Sp.S', NULL, 'Aktif', NULL, NULL),
(11, 'Prof. Dr. dr. Syakib Bakri, Sp.PD, K-GH', NULL, 'Aktif', NULL, NULL),
(12, 'dr. Mahmud Ghaznawie, Ph.D,. Sp.PA (K)', NULL, 'Aktif', NULL, NULL),
(13, 'dr. Muhammad Nuralim Mallapasi, Sp.B, Sp.BTKV', NULL, 'Aktif', NULL, NULL),
(14, 'Prof. Dr. dr. Muhammad Ilyas, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(15, 'Dr. dr. Andi Fachruddin Benyamin, Sp.PD, K-HOM', NULL, 'Aktif', NULL, NULL),
(16, 'dr. Nurlaily Idris, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(17, 'dr. Tarsisia Truly Djimahit, Sp.PA (K)', NULL, 'Aktif', NULL, NULL),
(18, 'Prof. Dr. dr. Farida Tabri, Sp.KK (K) FINSDV, FAADV', NULL, 'Aktif', NULL, NULL),
(19, 'Prof. dr. A. Jayalangkara T, Ph.D, Sp.KJ (K)', NULL, 'Aktif', NULL, NULL),
(20, 'Prof. Dr. dr. Andi Asadul Islam, Sp.BS (K)', NULL, 'Aktif', NULL, NULL),
(21, 'Prof. Dr. dr. Nurpudji A. Taslim, MPH, Sp.GK (K)', NULL, 'Aktif', NULL, NULL),
(22, 'dr. Abdul Wahab, Sp.An', NULL, 'Aktif', NULL, NULL),
(23, 'Prof. dr. Mochammad Hatta, Ph.D., Sp.MK (K)', NULL, 'Aktif', NULL, NULL),
(24, 'Dr. dr. Susi Aulina, Sp.S (K)', NULL, 'Aktif', NULL, NULL),
(25, 'dr. Haryasena, Sp.B (K) ONK', NULL, 'Aktif', NULL, NULL),
(26, 'Dr. dr. William Hamdani, Sp.B (K) ONK', NULL, 'Aktif', NULL, NULL),
(27, 'dr. Setia Budi Salekede, Sp. A (K)', NULL, 'Aktif', NULL, NULL),
(28, 'Dr. dr. Halimah Pagarra, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(29, 'Prof. Dr. dr. Muh. Ramli Ahmad, Sp.An-KAP-KMN', NULL, 'Aktif', NULL, NULL),
(30, 'Dr. dr. Nur Ahmad Tabri, Sp.PD, K-P, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(31, 'Dr. dr. Andi Mardiah Tahir, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(32, 'dr. Hadia Angriani Machmoed, Sp.A (K), MARS', NULL, 'Aktif', NULL, NULL),
(33, 'Dr. dr. Ibrahim Labeda, Sp.B-KBD', NULL, 'Aktif', NULL, NULL),
(34, 'Dr. dr. Hasyim Kasim, Sp.PD, K-GH', NULL, 'Aktif', NULL, NULL),
(35, 'Dr. dr. Aminuddin, Sp.THT-KL (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(36, 'Dr. dr. Riskiana Djamin, Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(37, 'Prof. Dr. dr. Suryani As’ad, M.Sc,. Sp.GK (K)', NULL, 'Aktif', NULL, NULL),
(38, 'dr. David Lotisna, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(39, 'Dr. dr. Noro Waspodo, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(40, 'Prof. Dr. dr. Bachtiar Murtala, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(41, 'Dr. dr. Syamsul Hilal Salam, Sp.An-KIC', NULL, 'Aktif', NULL, NULL),
(42, 'Dr. dr. Habibah S. Muhidin, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(43, 'Prof. Dr. dr. Nusratuddin Abdullah, Sp.OG (K). MARS', NULL, 'Aktif', NULL, NULL),
(44, 'Prof. Dr. dr. Eka Savitri, Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(45, 'Dr. dr. Warsinggih, Sp.B-KBD', NULL, 'Aktif', NULL, NULL),
(46, 'Prof. Dr. dr. Sutji Prawiti Rahardjo, Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(47, 'Prof. Dr. dr. Anis Irawan Anwar, Sp.DV (K), FINSDV', NULL, 'Aktif', NULL, NULL),
(48, 'dr. Abdul Muis, Sp.S (K)', NULL, 'Aktif', NULL, NULL),
(49, 'dr. Muhammad Akbar, Ph.D, Sp.S (K), DFM', NULL, 'Aktif', NULL, NULL),
(50, 'Prof. Dr. dr. Syahrul Rauf, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(51, 'dr. Amiruddin L, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(52, 'Prof. Dr. dr. Abdul Qadar Punagi, Sp.THT-KL (K), FICS', NULL, 'Aktif', NULL, NULL),
(53, 'Dr. dr. Ronald Erasio Lusikooy, Sp.B-KBD', NULL, 'Aktif', NULL, NULL),
(54, 'Dr. dr. Faridin HP, Sp.PD, K-R', NULL, 'Aktif', NULL, NULL),
(55, 'dr. Syafruddin Gaus, Ph.D, Sp.An-KMN-KNA', NULL, 'Aktif', NULL, NULL),
(56, 'Dr. dr. Andi Kurnia Bintang, Sp.N (K) MARS', NULL, 'Aktif', NULL, NULL),
(57, 'Prof. Dr. dr. Andi Makbul Aman, Sp.PD, K-EMD', NULL, 'Aktif', NULL, NULL),
(58, 'Dr. dr. Hasmawaty Basir, Sp.S (K)', NULL, 'Aktif', NULL, NULL),
(59, 'Prof. dr. Mansyur Arif, Ph.D, Sp.PK (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(60, 'Dr. dr. Martira Maddeppungeng, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(61, 'Dr. dr. Nasrullah Mustamir, Sp.BS (K)', NULL, 'Aktif', NULL, NULL),
(62, 'Dr. dr. Siswanto Wahab DP, Sp.DV(K), FINSDV, FAADV', NULL, 'Aktif', NULL, NULL),
(63, 'dr. Muh. Ilyas, Sp.PD, K-P, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(64, 'Dr. dr. Karya Triko Biakto, Sp.OT (K) Spine', NULL, 'Aktif', NULL, NULL),
(65, 'dr. Ahmadwirawan, Sp.B, Sp.BA (K)', NULL, 'Aktif', NULL, NULL),
(66, 'dr. Samuel Sampetoding, Sp.B-KBD', NULL, 'Aktif', NULL, NULL),
(67, 'dr. A. Dwi Bahagia Febriani, Ph.D., Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(68, 'Dr. dr. Idar Mappangara, Sp.PD, Sp.JP (K), FIHA', NULL, 'Aktif', NULL, NULL),
(69, 'dr. Rafidawaty, Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(70, 'Prof. dr. Budu, Ph.D, Sp.M (K), M.Med', NULL, 'Aktif', NULL, NULL),
(71, 'Dr. dr. Siti Maisuri Tadjuddin Chalid, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(72, 'Dr. dr. Rina Masadah, Sp.PA,. M.Phil', NULL, 'Aktif', NULL, NULL),
(73, 'Prof. Dr. dr. Syafri K. Arif, Sp.An-KIC-KAKV', NULL, 'Aktif', NULL, NULL),
(74, 'Dr. dr. Berti Julian Nelwan, M.Kes, Sp.PA (K)', NULL, 'Aktif', NULL, NULL),
(75, 'Prof. dr. Muh. Nasrum Massi, Ph.D, Sp.MK', NULL, 'Aktif', NULL, NULL),
(76, 'Dr. dr. Masyita Gaffar, Sp.THT-KL(K)', NULL, 'Aktif', NULL, NULL),
(77, 'dr. Rahmawati Minhajat, Ph.D, Sp.PD, K-HOM', NULL, 'Aktif', NULL, NULL),
(78, 'Prof. Dr. dr. Haerani Rasyid, M.Kes, Sp.PD, K-GH, Sp.GK', NULL, 'Aktif', NULL, NULL),
(79, 'dr. Uleng Bahrun, Sp.PK (K), Ph.D', NULL, 'Aktif', NULL, NULL),
(80, 'Dr. dr. Muh. Amsyar Akil, Sp.THT-KL (K), FICS', NULL, 'Aktif', NULL, NULL),
(81, 'Dr. dr. Jumraini T, Sp.N', NULL, 'Aktif', NULL, NULL),
(82, 'Dr. dr. Deviana Soraya Riu, Sp.OG', NULL, 'Aktif', NULL, NULL),
(83, 'dr. Nikmatia Latief, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(84, 'dr. Sriwijaya, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(85, 'Dr. dr. Syahrijuita, M.Kes, Sp.THT-KL', NULL, 'Aktif', NULL, NULL),
(86, 'dr. Djonny Ferianto Sambokaraeng, Sp.B (K) ONK', NULL, 'Aktif', NULL, NULL),
(87, 'dr. Ratna Dewi Artati, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(88, 'dr. Rizalinda, M.Sc, Ph.D, Sp.MK', NULL, 'Aktif', NULL, NULL),
(89, 'drg. Mohammad Gazali, Sp.BM (K), MARS', NULL, 'Aktif', NULL, NULL),
(90, 'Dr. dr. Saidah Syamsuddin, Sp.KJ', NULL, 'Aktif', NULL, NULL),
(91, 'dr. Andi Muhammad Ichsan, Ph.D, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(92, 'Dr. dr. Batari Todja Umar, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(93, 'Dr. dr. Ema Alasiry, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(94, 'dr. Sudirman Katu, Sp.PD, K-PTI, FINASIM', NULL, 'Aktif', NULL, NULL),
(95, 'dr. Jerny Dase, SH, Sp.FM., M.Kes', NULL, 'Aktif', NULL, NULL),
(96, 'dr. Muh. Iqbal Basri, M.Kes, Sp.S', NULL, 'Aktif', NULL, NULL),
(97, 'Dr. dr. Aidah Juliaty Alimuddin Baso, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(98, 'dr. Agussalim Bukhari, M.Med, Ph.D, Sp.GK (K)', NULL, 'Aktif', NULL, NULL),
(99, 'dr. Ninny Meutia Pelupessy, M.Kes, Sp.A', NULL, 'Aktif', NULL, NULL),
(100, 'Dr. dr. A. Muh. Luthfi, Sp.PD, K-GEH', NULL, 'Aktif', NULL, NULL),
(101, 'Dr. dr. Muh. Fadjar Perkasa, Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(102, 'Dr. dr. Muzakkir Amir, Sp.JP (K), FIHA', NULL, 'Aktif', NULL, NULL),
(103, 'Dr. dr. Mirna Muis, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(104, 'Dr. dr. Nu’man As Daud, Sp.PD, K-GEH', NULL, 'Aktif', NULL, NULL),
(105, 'Dr. dr. Sahyuddin, Sp.PD, K-HOM, FINASIM', NULL, 'Aktif', NULL, NULL),
(106, 'Dr. dr. Irawaty Djaharuddin, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(107, 'dr. Khoirul Kholis, Sp.U', NULL, 'Aktif', NULL, NULL),
(108, 'dr. Dario A. nelwan, Sp. Rad', NULL, 'Aktif', NULL, NULL),
(109, 'dr. Sri Asriyani, Sp.Rad (K), M.Med.Ed', NULL, 'Aktif', NULL, NULL),
(110, 'Dr. dr. Nadirah Rasyid Ridha, M.Kes., Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(111, 'Prof. drg. Muh.Ruslin, M.Kes, Ph.D, Sp.BM (K)', NULL, 'Aktif', NULL, NULL),
(112, 'Dr. dr. Nita Mariana, M.Kes, Sp.BA', NULL, 'Aktif', NULL, NULL),
(113, 'dr. Tommy Rubiyanto Habar, Sp.B., Sp.BA', NULL, 'Aktif', NULL, NULL),
(114, 'dr. Sulmiati, Sp.BA', NULL, 'Aktif', NULL, NULL),
(115, 'dr. Sitti Aizah Lawang, M.Kes, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(116, 'dr. Upik Anderiani Miskad, Ph.D, Sp.PA (K)', NULL, 'Aktif', NULL, NULL),
(117, 'Dr. dr. Himawan Dharmayani, Sp.PD, K-EMD', NULL, 'Aktif', NULL, NULL),
(118, 'dr. Hasnah, Sp.M, M.Kes (K)', NULL, 'Aktif', NULL, NULL),
(119, 'Dr. dr. Prihantono, Sp.B (K) ONK', NULL, 'Aktif', NULL, NULL),
(120, 'Dr. dr. A. Muh. Takdir Musba, Sp.An-KMN', NULL, 'Aktif', NULL, NULL),
(121, 'dr. M. Asykar Ansharullah Palinrungi, Sp.U', NULL, 'Aktif', NULL, NULL),
(122, 'Dr. dr. Fardhah Akil, Sp.PD, K-GEH', NULL, 'Aktif', NULL, NULL),
(123, 'dr. Bahrul Fikri, M.Kes, Sp.A, Ph.D', NULL, 'Aktif', NULL, NULL),
(124, 'dr. Syakri Syahrir, Sp.U', NULL, 'Aktif', NULL, NULL),
(125, 'dr. Nurjannah Lihawa, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(126, 'dr. Muhammad Andry Usman, Sp.OT (K), Ph.D', NULL, 'Aktif', NULL, NULL),
(127, 'Dr. dr. Femi Syahriani, Sp.PD, K-R, FINASIM', NULL, 'Aktif', NULL, NULL),
(128, 'Dr. dr. Risna Halim, Sp.PD, K-PTI, FINASIM', NULL, 'Aktif', NULL, NULL),
(129, 'dr. Rini Rachmawarni B, Sp.PD, K-GEH', NULL, 'Aktif', NULL, NULL),
(130, 'Dr. dr. Harun Iskandar, Sp.PD,K-P, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(131, 'dr. Jainal Arifin, M.Kes, Sp.OT (K) Spine', NULL, 'Aktif', NULL, NULL),
(132, 'dr. Sachraswaty R. Laiding, Sp.B, Sp.BP-RE', NULL, 'Aktif', NULL, NULL),
(133, 'Dr. dr. Elizabeth C. Jusuf, M.Kes, Sp.OG', NULL, 'Aktif', NULL, NULL),
(134, 'Dr. dr. Willy Adhimarta, Sp.BS (K)', NULL, 'Aktif', NULL, NULL),
(135, 'dr. Jusli Aras, M.Kes, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(136, 'dr. Aminuddin, M.Nut. & Diet, Ph.D, Sp.GK', NULL, 'Aktif', NULL, NULL),
(137, 'Dr. dr. Muhammad Sakti, Sp.OT (K)', NULL, 'Aktif', NULL, NULL),
(138, 'dr. Endy Adnan, Sp.PD, K-R', NULL, 'Aktif', NULL, NULL),
(139, 'Dr. dr. Audry Devisanty Wuysang, Sp.S (K), M.Si', NULL, 'Aktif', NULL, NULL),
(140, 'dr. Muhammad Husni Cangara, Ph.D, Sp.PA', NULL, 'Aktif', NULL, NULL),
(141, 'dr. Abdul Azis, Sp.U, Subsp. Onk', NULL, 'Aktif', NULL, NULL),
(142, 'dr. Andi Ihwan, Sp.BS', NULL, 'Aktif', NULL, NULL),
(143, 'dr. Ashari Bahar, M.Kes, Sp.S, FINS, FINA', NULL, 'Aktif', NULL, NULL),
(144, 'dr. Firdaus Hamid, Ph.D, Sp.MK', NULL, 'Aktif', NULL, NULL),
(145, 'dr. Salman Ardi Syamsu, Sp.B (K) ONK', NULL, 'Aktif', NULL, NULL),
(146, 'dr. Rusmin B. Sjukur, Sp.An', NULL, 'Aktif', NULL, NULL),
(147, 'Dr. dr. Azmi Mir’ah Zakiah, M.Kes., Sp.THT-KL (K)', NULL, 'Aktif', NULL, NULL),
(148, 'dr. Irma Savitri Ch. R, Sp.OG (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(149, 'dr. Airin Riskianty Nurdin, Sp.KK, M.Kes', NULL, 'Aktif', NULL, NULL),
(150, 'dr. Muhammad Yunus Amran, Ph.D, Sp.S (K), FIPM, FINR, FINA', NULL, 'Aktif', NULL, NULL),
(151, 'dr. Arif Santoso, Sp.P, Ph.D, FAPSR', NULL, 'Aktif', NULL, NULL),
(152, 'dr. Monika Fitria Farid, Sp.OG, M.Kes', NULL, 'Aktif', NULL, NULL),
(153, 'dr. Satriawan Abadi, Sp.PD, KIC', NULL, 'Aktif', NULL, NULL),
(154, 'Dr. dr. Yuyun Widaningsih, M.Kes, Sp.PK (K)', NULL, 'Aktif', NULL, NULL),
(155, 'dr. Fatmasari, Sp. Onk. Rad', NULL, 'Aktif', NULL, NULL),
(156, 'dr. Eka Yusuf Inra Kartika, M.Kes, Sp.A', NULL, 'Aktif', NULL, NULL),
(157, 'dr. Hasan Nyambe M.Med.Ed Sp.P', NULL, 'Aktif', NULL, NULL),
(158, 'dr. Adelina Titirina Poli, Sp.M, M.Kes', NULL, 'Aktif', NULL, NULL),
(159, 'dr. Rahmawaty, M.Kes, Sp.A', NULL, 'Aktif', NULL, NULL),
(160, 'dr. Muh. Abrar Ismail, Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(161, 'Dr. dr. A. Yasmin Syauki, M.Sc., Sp.GK (K)', NULL, 'Aktif', NULL, NULL),
(162, 'dr. Ahmad Ashraf Amalius, Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(163, 'dr. Ririn Nislawati, Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(164, 'dr. Idrianti Idrus Patturusi, Sp.KK, M.Kes', NULL, 'Aktif', NULL, NULL),
(165, 'dr. Andi Adil, M.Kes, Sp.An', NULL, 'Aktif', NULL, NULL),
(166, 'dr. Ayu Fitriani, M.Kes., Sp.PD', NULL, 'Aktif', NULL, NULL),
(167, 'dr. Yunita Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(168, 'Dr. dr. Syarif Bakri, Sp.U (K)', NULL, 'Aktif', NULL, NULL),
(169, 'Dr. dr. Yose Waluyo, Sp.KFR (K)', NULL, 'Aktif', NULL, NULL),
(170, 'dr. Jayarasti Kusumanegara, Sp.BTKV', NULL, 'Aktif', NULL, NULL),
(171, 'dr. Rinvil Renaldi, M. Kes., Sp.KJ (K)', NULL, 'Aktif', NULL, NULL),
(172, 'dr. Nur Surya Wirawan, M.Kes, Sp.An-KMN., FIPM', NULL, 'Aktif', NULL, NULL),
(173, 'dr. Akhtar Fajar Muzakkir, Sp.JP, FIHA', NULL, 'Aktif', NULL, NULL),
(174, 'dr. Rafikah Rauf, M.Kes, Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(175, 'dr. Irawati K', NULL, 'Aktif', NULL, NULL),
(176, 'dr. Muh. Phetrus Johan, M.Kes, Sp.OT (K), Ph.D', NULL, 'Aktif', NULL, NULL),
(177, 'dr. Citra Rosyidah, Sp.S, M.Kes', NULL, 'Aktif', NULL, NULL),
(178, 'dr. Lisa Tenriesa, M.Med.Sc., Sp.MK', NULL, 'Aktif', NULL, NULL),
(179, 'dr. Aslim Taslim, Sp.Onk.Rad, M.Kes', NULL, 'Aktif', NULL, NULL),
(180, 'dr. Dimas Bayu, Sp.PD, K-HOM, FINASIM', NULL, 'Aktif', NULL, NULL),
(181, 'dr. Widya Widita, Sp.KK, M.Kes', NULL, 'Aktif', NULL, NULL),
(182, 'dr. Masriani, M.Kes, Sp.An-KIC', NULL, 'Aktif', NULL, NULL),
(183, 'dr. Devintha Virani, M.Kes, Sp.GK', NULL, 'Aktif', NULL, NULL),
(184, 'dr. Nilam Smaradhania Thaufix, M.Kes, Sp.B (K) Onk', NULL, 'Aktif', NULL, NULL),
(185, 'dr. Liong Boy Kurniawan, M.Kes, Sp.PK (K)', NULL, 'Aktif', NULL, NULL),
(186, 'dr. Irda Yulianti, S.Ked.', NULL, 'Aktif', NULL, NULL),
(187, 'dr. Kartika Paramita, Sp.PK', NULL, 'Aktif', NULL, NULL),
(188, 'dr. Maulina Yunus, S.Ked.', NULL, 'Aktif', NULL, NULL),
(189, 'dr. Andi Nirmalasari', NULL, 'Aktif', NULL, NULL),
(190, 'dr. Alia Amalia, Sp.Rad', NULL, 'Aktif', NULL, NULL),
(191, 'dr. Andi Alief Utama Armyn, M.Kes, Sp.JP', NULL, 'Aktif', NULL, NULL),
(192, 'dr. Anshory Sahlan, Sp.KFR (K)', NULL, 'Aktif', NULL, NULL),
(193, 'dr. Husnul Mubarak, Sp.KFR', NULL, 'Aktif', NULL, NULL),
(194, 'dr. Aussie Fitriani Ghaznawie, Sp.JP, FIHA', NULL, 'Aktif', NULL, NULL),
(195, 'dr. Andi Munawirah, Sp.PK', NULL, 'Aktif', NULL, NULL),
(196, 'dr. Andi Pangeran Ali Arya', NULL, 'Aktif', NULL, NULL),
(197, 'dr. Amrillah Hamdi', NULL, 'Aktif', NULL, NULL),
(198, 'dr. Widyarizkhi Ayuditha Pratiwi', NULL, 'Aktif', NULL, NULL),
(199, 'dr. Andi Wija Indrawan Pangerang Sp.An', NULL, 'Aktif', NULL, NULL),
(200, 'dr. Sultan Hasanuddin, Sp.M', NULL, 'Aktif', NULL, NULL),
(201, 'dr. Nur Amelia Bachtiar, MPH, Sp.Rad', NULL, 'Aktif', NULL, NULL),
(202, 'dr. Sigit Dwi Pramono', NULL, 'Aktif', NULL, NULL),
(203, 'dr. Irvicha Triayunanda Dahri, S.Ked.', NULL, 'Aktif', NULL, NULL),
(204, 'dr. Rezki Argha Nauli', NULL, 'Aktif', NULL, NULL),
(205, 'dr. Putri Auliyah, S.Ked', NULL, 'Aktif', NULL, NULL),
(206, 'drg. Dian Ayu Puspita Paisal, S.KG', NULL, 'Aktif', NULL, NULL),
(207, 'dr. Durriah Dayana S.', NULL, 'Aktif', NULL, NULL),
(208, 'dr. Utami Wahyuningsih, S.Ked', NULL, 'Aktif', NULL, NULL),
(209, 'dr. Yusfiana, S.Ked', NULL, 'Aktif', NULL, NULL),
(210, 'dr. Andi Suci Setyawati, S.Ked', NULL, 'Aktif', NULL, NULL),
(211, 'dr. Melda Warliani, Sp.KFR', NULL, 'Aktif', NULL, NULL),
(212, 'dr. Andi Hardianty, Sp.DV', NULL, 'Aktif', NULL, NULL),
(213, 'dr. Akhyar Albaar, Sp.PD, K-GH, FINASIM', NULL, 'Aktif', NULL, NULL),
(214, 'dr. Rezki Hardiyanti, Sp.An', NULL, 'Aktif', NULL, NULL),
(215, 'dr. Besse Sarmila, M.Kes, Sp.A', NULL, 'Aktif', NULL, NULL),
(216, 'dr. Wasis Udaya, Sp.PD, K-Ger', NULL, 'Aktif', NULL, NULL),
(217, 'dr. Adhyatma Jaya Ningrat, Sp.B, M.Kes', NULL, 'Aktif', NULL, NULL),
(218, 'dr. Andi Suryanita Tajuddin, Sp. M', NULL, 'Aktif', NULL, NULL),
(219, 'dr. Luthfy Attamimi, Sp.Rad', NULL, 'Aktif', NULL, NULL),
(220, 'dr. Idayani Panggalo, Sp.M', NULL, 'Aktif', NULL, NULL),
(221, 'Dr. dr. Sonny Teddy Lisal, Sp.KJ', NULL, 'Aktif', NULL, NULL),
(222, 'Dr. dr. Nova Audrey Luetta Pieter, Sp.THT-KL (K)., FICS', NULL, 'Aktif', NULL, NULL),
(223, 'dr. Lenny Lisal, Sp.OG', NULL, 'Aktif', NULL, NULL),
(224, 'Dr. dr. Erwin Arief, Sp.PD, K-P, Sp.P (K)', NULL, 'Aktif', NULL, NULL),
(225, 'dr. Suriani Alimuddin, Sp.PD, K-AI', NULL, 'Aktif', NULL, NULL),
(226, 'dr. Junaedi Sirajuddin, Sp.M (K)', NULL, 'Aktif', NULL, NULL),
(227, 'dr. Junus Asiu Bulu Baan Sp.Rad (K)', NULL, 'Aktif', NULL, NULL),
(228, 'Prof. dr. Farid Nur Mantu, Sp.B,. Sp.BA, FICS', NULL, 'Aktif', NULL, NULL),
(229, 'drg. Yossy Yoanita Ariestiana, Sp.BM', NULL, 'Aktif', NULL, NULL),
(230, 'dr. Baedah Madjid, Sp.MK (K)', NULL, 'Aktif', NULL, NULL),
(231, 'dr. Mokhammad Ikhsan Nurkholis, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(232, 'dr. Eddy Hartono, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(233, 'Dr. dr. Nugraha Utama Pelupessy, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(234, 'dr. Muhammad Irfan, M.Kes, Sp.M', NULL, 'Aktif', NULL, NULL),
(235, 'dr. Ellen Theresia Wewengkang, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(236, 'Dr. dr. Tutik Hardjianti, Sp.PD, K-HOM, FINASIM', NULL, 'Aktif', NULL, NULL),
(237, 'dr. Madonna Damayanthie Datu, Sp.An', NULL, 'Aktif', NULL, NULL),
(238, 'Dr. dr. Citrakesumasari, M.Kes, Sp.GK', NULL, 'Aktif', NULL, NULL),
(239, 'dr. Ari Santri Palinrungi, M.Kes, Sp.An', NULL, 'Aktif', NULL, NULL),
(240, 'Dr. dr. Isharyah Surjandari Kambaliretno Sunarno, Sp.OG (K)', NULL, 'Aktif', NULL, NULL),
(241, 'dr. Ratih Natasha, Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(242, 'dr. Faisal, Sp.An-KIC', NULL, 'Aktif', NULL, NULL),
(243, 'dr. Andi Akhmad Faisal, Sp.M, M.Kes', NULL, 'Aktif', NULL, NULL),
(244, 'dr. Haizah Nurdin, M.Kes, Sp.An-KIC', NULL, 'Aktif', NULL, NULL),
(245, 'dr. Marliyanti N. Akib, Sp.M (K), M.Kes', NULL, 'Aktif', NULL, NULL),
(246, 'Prof. dr. Harsinen Sanusi, Sp.PD, K-EMD', NULL, 'Aktif', NULL, NULL),
(247, 'Dr. dr. Djoko Widodo, Sp.BS (K)', NULL, 'Aktif', NULL, NULL),
(248, 'dr. Sitti Rabiul Zatalia Ramadhan, Sp.PD, K-GH', NULL, 'Aktif', NULL, NULL),
(249, 'dr. Urfianty, M.Kes, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(250, 'Dr. dr. Husaini Umar, Sp.PD, K-EMD', NULL, 'Aktif', NULL, NULL),
(251, 'dr. Agus Sudarso, Sp.PD., K-Ger', NULL, 'Aktif', NULL, NULL),
(252, 'dr. Dyah Ayu Windyasmara Putri, Sp.M', NULL, 'Aktif', NULL, NULL),
(253, 'dr. Rani Yunita Patong, Sp.M', NULL, 'Aktif', NULL, NULL),
(254, 'dr. Adhariana HK, M.Kes, Sp.A (K)', NULL, 'Aktif', NULL, NULL),
(255, 'dr. Rahmawati Thamrin, Sp.And', NULL, 'Aktif', NULL, NULL),
(260, 'Prof. Dr. dr. NURPUDJI A. TASLIM, MPH, Sp.GK (K)', NULL, 'Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_dokter2`
--

CREATE TABLE `master_dokter2` (
  `id_dokter` int(30) NOT NULL,
  `nm_dokter` text,
  `keterangan` text,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unit`
--

CREATE TABLE `master_unit` (
  `id_unit` int(11) NOT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `level_unit` varchar(5) DEFAULT NULL,
  `jabatan_pimpinan` varchar(50) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_unit`
--

INSERT INTO `master_unit` (`id_unit`, `unit`, `level_unit`, `jabatan_pimpinan`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', '2', 'Direktur Pelayanan Penunjang, Sarana Medik & Kerja', 'Direktorat Utama', NULL, NULL, NULL),
(12, 'Direktorat Pelayanan Medik & Keperawatan', '2', 'Direktur Pelayanan Medik & Keperawatan', 'Direktorat Utama', NULL, NULL, NULL),
(11, 'Direktorat Pendidikan, Pelatihan & Penelitian', '2', 'Direktur Pendidikan, Pelatihan & Penelitian', 'Direktorat Utama', NULL, NULL, NULL),
(10, 'Direktorat Utama', '1', 'Direktur Utama', 'Rektor Unhas', NULL, NULL, NULL),
(14, 'Direktorat Keuangan, SDM & Administrasi Umum', '2', 'Direktur Keuangan, SDM & Administrasi Umum', 'Direktorat Utama', NULL, NULL, NULL),
(15, 'Komite Medik', '2', 'Ketua Komite Medik', 'Direktorat Utama', NULL, NULL, NULL),
(16, 'Komite Etik dan Hukum', '2', 'Ketua Etik dan Hukum', 'Direktorat Utama', NULL, NULL, NULL),
(17, 'Komite Keperawatan', '2', 'Ketua Komite Keperawatan', 'Direktorat Utama', NULL, NULL, NULL),
(18, 'Komite Farmasi dan Terapi Rasional', '2', 'Ketua Komite Farmasi dan Terapi Rasional', 'Direktorat Utama', NULL, NULL, NULL),
(19, 'Satuan Pemeriksaan Internal', '2', 'Ketua Satuan Pemeriksaan Internal', 'Direktorat Utama', NULL, NULL, NULL),
(77, 'Divisi Keselamatan Pasien', '4', 'Ketua Divisi Keselamatan Pasien', 'Satuan Penjaminan Mutu', NULL, '2021-07-21 22:11:13', '2021-07-22 06:11:13'),
(21, 'Bidang Pendidikan dan Pelatihan', '3', 'Kepala Bidang Pendidikan dan Pelatihan', 'Direktorat Pendidikan, Pelatihan & Penelitian', NULL, NULL, NULL),
(22, 'Bidang Penelitian dan Inovasi', '3', 'Kepala Bidang Penelitian dan Inovasi', 'Direktorat Pendidikan, Pelatihan & Penelitian', NULL, NULL, NULL),
(23, 'Bidang Pelayanan Medik', '3', 'Kepala Bidang Pelayanan Medik', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(24, 'Bidang Pelayanan Keperawatan', '3', 'Kepala Bidang Pelayanan Keperawatan', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(25, 'Bidang Pelayanan Penunjang dan Sarana Medik', '3', 'Kepala Bidang Pelayanan Penunjang dan Sarana Medik', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, NULL),
(26, 'Bidang Pemasaran dan Kerjasama', '3', 'Kepala Bidang Pemasaran dan Kerjasama', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, NULL),
(27, 'Bidang Keuangan', '3', 'Kepala Bidang Keuangan', 'Direktorat Keuangan, SDM & Administrasi Umum', NULL, NULL, NULL),
(28, 'Bidang Perencanaan dan Evaluasi', '3', 'Kepala Bidang Perencanaan dan Evaluasi', 'Direktorat Keuangan, SDM & Administrasi Umum', NULL, NULL, NULL),
(29, 'Bidang SDM dan Administrasi Umum', '3', 'Kepala Bidang SDM dan Administrasi Umum', 'Direktorat Keuangan, SDM & Administrasi Umum', NULL, NULL, NULL),
(30, 'Research Center', '3', 'Ketua Research Center', 'Direktorat Pendidikan, Pelatihan & Penelitian', NULL, NULL, NULL),
(31, 'Casemix', '3', 'Ketua Casemix', 'Direktorat Keuangan, SDM & Administrasi Umum', NULL, NULL, NULL),
(32, 'Pusat Layanan Pengadaan', '3', 'Ketua Pusat Layanan Pengadaan', 'Direktorat Keuangan, SDM & Administrasi Umum', NULL, NULL, NULL),
(33, 'Seksi Pendidikan', '4', 'Kepala Seksi Pendidikan', 'Bidang Pendidikan dan Pelatihan', NULL, NULL, NULL),
(34, 'Seksi Pelatihan dan PKRS', '4', 'Kepala Seksi Pelatihan dan PKRS', 'Bidang Pendidikan dan Pelatihan', NULL, NULL, NULL),
(35, 'Seksi Penelitian dan Inovasi', '4', 'Kepala Seksi Penelitian dan Inovasi', 'Bidang Penelitian dan Inovasi', NULL, NULL, NULL),
(36, 'Seksi Pelayanan Medik', '4', 'Kepala Seksi Pelayanan Medik', 'Bidang Pelayanan Medik', NULL, NULL, NULL),
(37, 'Seksi Pelayanan Keperawatan', '4', 'Kepala Seksi Pelayanan Keperawatan', 'Bidang Pelayanan Keperawatan', NULL, NULL, NULL),
(38, 'Seksi Pelayanan Penunjan dan Sarana Medik', '4', 'Kepala Seksi Pelayanan Penunjan dan Sarana Medik', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(39, 'Seksi Pemasaran dan Humas', '4', 'Kepala Seksi Pemasaran dan Humas', 'Bidang Pemasaran dan Kerjasama', NULL, NULL, NULL),
(40, 'Seksi Kerjasama', '4', 'Kepala Seksi Kerjasama', 'Bidang Pemasaran dan Kerjasama', NULL, NULL, NULL),
(41, 'Seksi Manajemen Keuangan', '4', 'Kepala Seksi Manajemen Keuangan', 'Bidang Keuangan', NULL, NULL, NULL),
(42, 'Seksi Akuntansi dan Pelaporan Keuangan', '4', 'Kepala Seksi Akuntansi dan Pelaporan Keuangan', 'Bidang Keuangan', NULL, NULL, NULL),
(44, 'Seksi SDM', '4', 'Kepala Seksi SDM', 'Bidang SDM dan Administrasi Umum', NULL, NULL, NULL),
(45, 'Seksi Administrasi Umum', '4', 'Kepala Seksi Administrasi Umum', 'Bidang SDM dan Administrasi Umum', NULL, NULL, NULL),
(46, 'Instalasi Gawat Darurat', '3', 'Kepala Instalasi Gawat Darurat', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(47, 'Instalasi Rawat Jalan', '3', 'Kepala Instalasi Rawat Jalan', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(48, 'Instalasi Rawat Inap dan Kamar Bersalin', '3', 'Kepala Instalasi Rawat Inap dan Kamar Bersalin', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(49, 'Instalasi Bedah Central', '3', 'Kepala Instalasi Bedah Central', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(50, 'Instalasi Radiologi', '3', 'Kepala Instalasi Radiologi', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, NULL),
(51, 'Instalasi Farmasi', '3', 'Kepala Instalasi Farmasi', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, NULL),
(52, 'Instalasi Gizi', '3', 'Kepala Instalasi Gizi', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, NULL),
(53, 'Instalasi Forensik dan Medikolegal', '3', 'Kepala Instalasi Forensik dan Medikolegal', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(54, 'Instalasi Pemeliharaan Sarana dan Prasarana Rumah Sakit', '3', 'Kepala Instalasi Pemeliharaan Sarana dan Prasarana', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(55, 'Instalasi Perawatan Intensif', '3', 'Kepala Instalasi Perawatan Intensif', 'Bidang Pelayanan Medik', NULL, NULL, NULL),
(56, 'Instalasi Perawatan Khusus', '3', 'Kepala Instalasi Perawatan Khusus', 'Bidang Pelayanan Medik', NULL, NULL, NULL),
(57, 'Instalasi Rekam Medik', '3', 'Kepala Instalasi Rekam Medik', 'Direktorat Pelayanan Penunjang, Sarana Medik & Kerjasama', NULL, NULL, '2021-08-02 01:32:43'),
(58, 'Instalasi Rehab Medis', '3', 'Kepala Instalasi Rehab Medis', 'Bidang Pelayanan Medik', NULL, NULL, NULL),
(59, 'Instalasi Gigi dan Mulut', '3', 'Kepala Instalasi Gigi dan Mulut', 'Bidang Pelayanan Medik', NULL, NULL, NULL),
(60, 'Instalasi Laboratorium Patologi Klinik', '3', 'Kepala Instalasi Laboratorium Patologi Klinik', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(61, 'Instalasi Laboratorium Patologi Anatomi', '3', 'Kepala Instalasi Laboratorium Patologi Anatomi', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(62, 'Instalasi Laboratorium Mikrobiologi Klinik', '3', 'Kepala Instalasi Laboratorium Mikrobiologi Klinik', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(63, 'Instalasi CSSD dan Laundry', '3', 'Kepala Instalasi CSSD dan Laundry', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(64, 'Seksi Sistem Informasi dan Managemen', '4', 'Kepala Seksi Sistem Informasi dan Managemen', 'Bidang Perencanaan dan Evaluasi', NULL, NULL, NULL),
(65, 'Instalasi Radioterapi', '3', 'Kepala Instalasi Radioterapi', 'Direktorat Pelayanan Medik & Keperawatan', NULL, NULL, NULL),
(66, 'Seksi Rumah Tangga dan Aset', '4', 'Kepala Seksi Rumah Tangga dan Aset', 'Bidang SDM dan Administrasi Umum', NULL, NULL, NULL),
(67, 'Seksi Penunjang dan Sarana Medis', '5', 'Staf Seksi Penunjang dan Sarana Medis', 'Bidang Pelayanan Penunjang dan Sarana Medik', NULL, NULL, NULL),
(68, 'Satuan Penjaminan Mutu', '5', 'Staf SPM', 'Satuan Penjaminan Mutu', NULL, NULL, NULL),
(78, 'Devisi Pencegahan dan Pengendalian Infeksi', '4', 'Ketua Divisi Pencegahan dan Pengendalian Infeksi', 'Satuan Penjaminan Mutu', NULL, '2021-07-21 22:13:46', '2021-07-22 06:13:46'),
(79, 'Koordinator K3Kl (Kesehatan dan Keselamatan Kerja)', '4', 'Koordinator K3K', 'Satuan Penjaminan Mutu', NULL, '2021-07-21 22:15:09', '2022-06-30 04:20:34'),
(80, 'Dewan Pengawas', '1', 'Dewan Pengawas', 'Direktorat Utama', NULL, '2021-07-28 18:56:17', '2021-07-29 02:56:17'),
(81, 'Sekretaris Dirut', '5', 'Sekretaris Dirut', 'Bidang SDM dan Administrasi Umum', NULL, '2021-08-02 01:09:14', '2021-08-02 09:09:14'),
(82, 'Bendahara Penerimaan', '3', 'Bendahara Penerimaan', 'Bidang Keuangan', NULL, '2021-08-31 19:35:30', '2021-09-01 03:35:30'),
(83, 'Bendahara Pengeluaran', '3', 'Bendahara Pengeluaran', 'Bidang Keuangan', NULL, '2021-08-31 19:35:53', '2021-09-01 03:35:53'),
(84, 'Kepala Satuan Penjaminan Mutu', '3', 'Kepala Satuan Penjaminan Mutu', 'Satuan Penjaminan Mutu', NULL, '2021-12-28 00:10:46', '2021-12-28 08:10:46'),
(85, 'Ketua Divisi Mutu dan Keselamatan Kerja', '3', 'Ketua Divisi Mutu dan Keselamatan Kerja', 'Satuan Penjaminan Mutu', NULL, '2021-12-28 00:19:32', '2021-12-28 08:19:32'),
(86, 'Euro Grant', '3', 'Pimpinan', 'Direktorat Keuangan, SDM & Administrasi Umum', 'Aktif', '2022-06-30 19:43:23', '2023-06-26 10:21:54'),
(87, 'JICA', '1', 'Pimpinan', 'Direktorat Utama', 'Aktif', '2022-06-30 19:46:15', '2023-06-26 10:22:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navbar`
--

CREATE TABLE `navbar` (
  `id` int(30) NOT NULL,
  `about_us` varchar(300) DEFAULT NULL,
  `link_about_us` varchar(300) DEFAULT NULL,
  `faq` varchar(300) DEFAULT NULL,
  `link_faq` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `linkedin` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `place` varchar(300) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navbar`
--

INSERT INTO `navbar` (`id`, `about_us`, `link_about_us`, `faq`, `link_faq`, `twitter`, `facebook`, `linkedin`, `instagram`, `place`, `location`, `email`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'https://www.google.co.id/', 'FAQ', 'https://www.google.co.id/', 'https://twitter.com/?lang=en', 'https://facebook.com/', 'https://www.linkedin.com/', 'https://www.instagram.com/', '401 University TS, Settle, USA', 'https://goo.gl/maps/8xCXXCYVVUxGPM5VA', 'canggoreng2@gmail.com', '2021-10-15 07:00:04', '2021-10-18 07:06:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcomment`
--

CREATE TABLE `subcomment` (
  `id_subcomment` int(20) NOT NULL,
  `id_comment` int(20) DEFAULT NULL,
  `id_articles` int(30) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `comment` text,
  `status` enum('Enabled','Disabled') DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subcomment`
--

INSERT INTO `subcomment` (`id_subcomment`, `id_comment`, `id_articles`, `name`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Amir', 'ok', 'Enabled', '2021-11-15 07:45:57', '2021-11-15'),
(2, 2, 9, 'jdejderj', 'tjcdr', 'Enabled', '2021-11-18 07:50:07', '2021-11-18'),
(3, 3, 9, 'canggoreng', 'fvcrgvg', 'Enabled', '2022-05-24 15:57:29', '2022-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(30) NOT NULL,
  `menu_id_menu` int(30) DEFAULT NULL,
  `submenu` varchar(300) DEFAULT NULL,
  `url_submenu` varchar(300) DEFAULT NULL,
  `status_submenu` enum('Enabled','Disabled') DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `menu_id_menu`, `submenu`, `url_submenu`, `status_submenu`, `created_at`, `updated_at`) VALUES
(3, 4, 'Mission', '/myweb/not_found', 'Disabled', '2021-10-24 05:37:10', '2021-10-24 16:30:42'),
(6, 4, 'All Articles/News', '/myweb/blog_grid', 'Enabled', '2021-10-24 05:46:43', '2021-11-01 06:01:56'),
(7, 3, 'Not Found', '/myweb/not_found', 'Enabled', '2021-10-24 08:06:33', '2021-11-16 08:20:29'),
(8, 4, 'Galery', '/myweb/gallery_album', 'Enabled', '2021-11-15 18:52:01', '2021-11-16 08:18:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `id_data_pasien` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `register` varchar(300) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `unit` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `blokir` enum('Y','N') DEFAULT 'N',
  `block` enum('Y','N') DEFAULT 'N',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_data_pasien`, `name`, `register`, `password`, `role`, `unit`, `phone`, `email`, `address`, `foto`, `blokir`, `block`, `created_at`, `updated_at`) VALUES
(1, 0, 'Administrator', NULL, '$2y$10$pGK3Tl2dYkOgH/zUHzGSWO50o7lvmY6j7fJ75b8tSLFumJd1R87nG', 'admin', NULL, '085344072018', 'admin@gmail.com', 'Indonesia', '6116789015521200px-Logo_UH.png', 'N', 'N', '2020-09-26 05:05:46', '2023-03-16 01:32:32'),
(13, 4, 'dewa', NULL, '$2y$10$mQ/V.f47xTgWO0TqQ2Z.2.wYX6McEUY7Rdu5zMDr5wPmNmT0IGk26', 'pasien', NULL, '0895321036194', '067867@jantungmakassar.id', 'Tenetur enim dolor e', NULL, 'N', 'N', '2023-07-06 17:49:07', '2023-07-07 01:49:07'),
(14, 6, 'Cipto Raharjo', NULL, '$2y$10$w1KYLS6uXsiGsvp0fjk3z.76ie38GwLy1EHycrRbkukPWzEJN7LXS', 'pasien', NULL, '08567656565', '465345@jantungmakassar.id', 'Makassar', NULL, 'N', 'N', '2023-07-07 06:30:19', '2023-07-07 14:33:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_data_pasien`) USING BTREE;

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logo_front`
--
ALTER TABLE `logo_front`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_dokter`
--
ALTER TABLE `master_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `master_dokter2`
--
ALTER TABLE `master_dokter2`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subcomment`
--
ALTER TABLE `subcomment`
  ADD PRIMARY KEY (`id_subcomment`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id_data_pasien` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `general`
--
ALTER TABLE `general`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `logo_front`
--
ALTER TABLE `logo_front`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_dokter`
--
ALTER TABLE `master_dokter`
  MODIFY `id_dokter` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT untuk tabel `master_dokter2`
--
ALTER TABLE `master_dokter2`
  MODIFY `id_dokter` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subcomment`
--
ALTER TABLE `subcomment`
  MODIFY `id_subcomment` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
