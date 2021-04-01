-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Apr 2021 pada 09.33
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PustakaLiterasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_enc` varchar(255) NOT NULL,
  `slug_buku` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `forClass` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `download` int(11) NOT NULL,
  `reader` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `file_enc`, `slug_buku`, `author`, `judul_buku`, `penulis`, `penerbit`, `sampul`, `kategori`, `forClass`, `deskripsi`, `download`, `reader`, `rating`, `updated_at`, `created_at`) VALUES
(2, '1614224921_38d9bf0fafb4c4ad69df.pdf', 'Te102vpSfi24', 'admin Pustaka', 'K11 BS S1 MATEMATIKA', ' Bornok Sinaga, Pardomuan N.J.M. Sinambela, Andri Kristianto Sitanggang, Tri Andri Hutapea, Lasker Pangarapan Sinaga, Sudianto Manullang, dan Mangara Simanjorang.', ' Pusat Kurikulum dan Perbukuan, Balitbang, Kemdikbud', '21010W80224.png', '[\"TKJ\",\"MM\",\"TKR\",\"TBO\",\"TPL\",\"APAT\"]', 'Buku Kelas 11', 'Buku Matematika Kelas XI untuk Pendidikan Menengah ini disusun dengan tujuan memberi pengalaman\r\nkonkret-abstrak kepada peserta didik seperti uraian diatas. Pembelajaran matematika melalui buku ini akan\r\nmembentuk kemampuan peserta didik dalam menyajikan ', 1, 2, 1, '2021-03-21', '2021-02-24'),
(3, '1614225316_579459bde435c28a9ceb.pdf', 'T9n02v8cEa24', 'admin Pustaka', 'K11 BS Bhs Indo Sm1', ' Maryanto, Anik Muslikah Indriastuti, Dessy Wahyuni, dan Nur Hayati', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemdikbud', '21wt2rt0224.png', '[\"TKJ\",\"MM\",\"TKR\",\"TBO\",\"TPL\",\"APAT\"]', 'Buku Kelas 11', 'Buku ini disusun dengan berbasis teks, baik lisan maupun tulis, dengan menempatkan Bahasa Indonesia sebagai wahana untuk mengekspresikan perasaan dan pemikiran. Didalamnya dijelaskan berbagai cara penyajian perasaan dan pemikiran dalam berbagai macam jeni', 0, 5, 0, '2021-03-20', '2021-02-24'),
(4, '1614225779_d362aa8e309c1129db87.pdf', 'Yk102ez4dv24', 'admin Pustaka', 'BS - Bahasa Inggris - Kelas XI - Semester 1 - REV 12 4 2014', 'Mahrukh Bashir', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemdikbud', '21pBLuz0224.png', '[\"TKJ\",\"MM\",\"TKR\",\"TBO\",\"TPL\",\"APAT\"]', 'Buku Kelas 11', 'Buku ini disusun untuk meningkatkan kemampuan berbahasa.\r\nPenyajiannya adalah dengan menggunakan pendekatan pembelajaran berbasis teks, baik lisan maupun tulis, dengan menempatkan Bahasa Inggris sebagai wahana komunikasi. Pemahaman terhadap jenis, kaidah ', 1, 2, 1, '2021-03-20', '2021-02-24'),
(5, '1614226414_f070cfa7b92709ac298a.pdf', '4iv02itmVy24', 'admin Pustaka', '3-C2-Simulasi Digital-X-1', 'Eko Subiyantoro Haritz Cahya Nugraha Cahya Kusuma Ratih Reinaldo Rhesky Nosyrafil', '-', '21LdPcS0224.png', '[\"TKJ\"]', 'Buku Kelas 10', 'Buku teks “Simulasi Digital”ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model pembe', 0, 0, 1, '2021-03-03', '2021-02-24'),
(6, '1614226597_365244418c42a68320b9.pdf', 'tFv02FnHE024', 'admin Pustaka', '4-C2-Simulasi Digital-X-2', 'Abdul Munif Puryanto Prayitno', '-', '21OGHQN0224.png', '[\"TKJ\"]', 'Buku Kelas 10', 'Buku teks “Simulasi Digital” ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model pem', 0, 0, 0, '2021-02-24', '2021-02-24'),
(7, '1614227390_56796bf2779b7052bff1.pdf', 'G9H02z4VxS24', 'admin Pustaka', '8-C2-Jaringan Dasar-X-2', ' SUPRIYANTO NANIK S.', '-', '21LvnGy0224.png', '[\"TKJ\"]', 'Buku Kelas 10', 'Buku teks ′′Jaringan Dasar ′′ ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model pe', 1, 1, 1, '2021-03-24', '2021-02-24'),
(8, '1614227580_19185f2ce869b730f96c.pdf', 'I8602jeuaG24', 'admin Pustaka', '19-C3-MM-Desain multimedia-XI-1', 'NANIK SRI RAHAYU', '-', '21ISBy00224.png', '[\"MM\"]', 'Buku Kelas 11', 'Buku teks ′′Desain Multimedia′′ ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar kurikulum\r\nabad 21, yaitu pendekatan model ', 0, 0, 0, '2021-02-24', '2021-02-24'),
(9, '1614227793_33c717a5ec08a9e44f1a.pdf', 'ubi02LGKMl24', 'admin Pustaka', '22-C3-MM-Pengolahan Citra Digital-XI-2', 'NANIK SRI RAHAYU', '-', '21hx03Q0224.png', '[\"MM\"]', 'Buku Kelas 11', 'Buku teks ′′Desain Multimedia′′ ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar kurikulum\r\nabad 21, yaitu pendekatan model ', 0, 0, 0, '2021-02-24', '2021-02-24'),
(10, '1614227990_51888ba950e36052d80f.pdf', 'Ys202Ywuir24', 'admin Pustaka', '23-C3-MM-Teknik Animasi 2 Dimensi-XI-1', 'WAHYU PURNOMO, WAHYU ANDREAS', '-', '21rEiBG0224.png', '[\"MM\"]', 'Buku Kelas 12', 'Buku teks ′′Teknik Animasi 2D′′ ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model ', 2, 20, 2, '2021-03-20', '2021-02-24'),
(11, '1614228171_d3579e05d586f0d97bae.pdf', 'cVH0252F7I24', 'admin Pustaka', 'pneumatik_ms2010', 'SUDARYONO', '-', '21ebeRt0224.png', '[\"TKR\"]', 'Buku Kelas 11', 'Buku teks ′′Pneumatik & Hidrolik′′ ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan mod', 0, 1, 0, '2021-03-08', '2021-02-24'),
(12, '1614228267_b2c5e875677a9add53ee.pdf', 'iqz027oJIY24', 'admin Pustaka', 'TEKNIK DASAR PENGERJAAN LOGAM 1 rev', 'Dadang', '-', '21j5vaY0224.png', '[\"TPL\"]', 'Buku Kelas 10', 'Buku teks ′′Teknik Dasar Pengerjaan Logam 1” ini disusun berdasarkan tuntutan\r\nparadigma pengajaran dan pembelajaran kurikulum 2013 diselaraskan\r\nberdasarkan pendekatan model pembelajaran yang sesuai dengan kebutuhan\r\nbelajar kurikulum abad 21, yaitu pend', 0, 0, 0, '2021-02-24', '2021-02-24'),
(13, '1614228370_b57fca51b808668f7b9f.pdf', 'B0z02i1I5d24', 'admin Pustaka', 'Teknik Las SMAW  1 (Klas XI Sem.1)', 'Sukaini', '-', '21CDdjI0224.png', '[\"TPL\"]', 'Buku Kelas 10', 'Buku teks “Teknik Las SMAW” ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model pemb', 0, 0, 0, '2021-02-24', '2021-02-24'),
(14, '1614228479_0c2315fd1d5e938036d2.pdf', 'sB602Etxyv24', 'admin Pustaka', 'Pengecatan Bodi Kendaraan Kelas XI Semester 1', 'Sidik Argana', '-', '21KJpw00224.png', '[\"TBO\"]', 'Buku Kelas 11', 'Buku teks ′′PENGECATAN BODI KENDARAAN KELAS XI SEMESTER 1′′ ini disusun\r\nberdasarkan tuntutan paradigma pengajaran dan pembelajaran kurikulum 2013\r\ndiselaraskan berdasarkan pendekatan model pembelajaran yang sesuai dengan\r\nkebutuhan belajar kurikulum abad', 0, 0, 0, '2021-02-24', '2021-02-24'),
(15, '1614228648_c2058caa50328b5e1ebc.pdf', 'CNx02W5ty824', 'admin Pustaka', 'Teknik Body Repair FINAL', 'ANTENG / WIBOWO', '-', '21h2sUL0224.png', '[\"TBO\"]', 'Buku Kelas 11', 'Penyajian buku teks untuk Mata Pelajaran ′′ Teknik Kelistrikan Kendaraan\r\nRingan ′′ ini disusun dengan tujuan agar supaya peserta didik dapat melakukan\r\nproses pencarian pengetahuan berkenaan dengan materi pelajaran melalui\r\nberbagai aktivitas proses sain', 0, 0, 0, '2021-02-24', '2021-02-24'),
(16, '1614229017_90b8e878e83d48478de4.pdf', '2RI02edhG124', 'admin Pustaka', 'BS PAI Kelas XI', 'Mustahdi dan Mustakim.', ' Pusat Kurikulum Perbukuan, Balitbang, Kemdikbud.', '21PvRsC0224.png', '[\"TKJ\",\"MM\",\"TKR\",\"TBO\",\"TPL\",\"APAT\"]', 'Buku Kelas 11', 'Buku Pelajaran Agama Islam dan Budi Pekerti Kelas XI ini ditulis dengan semangat itu.\r\nPembelajarannya dibagi-bagi dalam kegiatan-kegiatan keagamaan yang harus dilakukan siswa dalam usaha memahami pengetahuan agamanya. Tetapi, tidak berhenti dengan penget', 0, 0, 0, '2021-02-24', '2021-02-24'),
(17, '1614229707_99b0093b89289ea49e78.pdf', 'PEs02FRk2q24', 'admin Pustaka', '(Androgeat) Naruto 01', 'Masashi Kishimoto', ' Shueisha, Viz Media', '21O2Ty30224.png', '[\"Komik\"]', 'Publik', 'Naruto (ナルト) adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keing', 1, 0, 1, '2021-03-24', '2021-02-24'),
(18, '1614229920_1ac9323d43b8b9957e3c.pdf', 'jww02rrJem24', 'admin Pustaka', '(Androgeat) Naruto 02', 'Masashi Kishimoto', ' Shueisha, Viz Media', '212OtEi0224.png', '[\"Komik\"]', 'Publik', 'Naruto (ナルト) adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keing', 0, 1, 0, '2021-02-24', '2021-02-24'),
(19, '1614230209_5bfda698d233109780b8.pdf', 'VN402NDXfZ24', 'admin Pustaka', '(Androgeat) Naruto 03', 'Masashi Kishimoto', ' Shueisha, Viz Media', '21gCd7X0224.png', '[\"Komik\"]', 'Publik', ' Naruto (ナルト) adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan kein', 0, 0, 0, '2021-02-24', '2021-02-24'),
(20, '1614230323_64a32ceae50a1c57bc5a.pdf', 'm0b02z7vLu24', 'admin Pustaka', '(Androgeat) Naruto 04', 'Masashi Kishimoto', ' Shueisha, Viz Media', '212Yab50224.png', '[\"Komik\"]', 'Publik', 'Naruto (ナルト) adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keing', 0, 0, 0, '2021-02-24', '2021-02-24'),
(21, '1614230401_0ba6b416409372770ce4.pdf', 'Mgs02kRDrx24', 'admin Pustaka', '(Androgeat) Naruto 05', 'Masashi Kishimoto', ' Shueisha, Viz Media', '21thiMD0224.png', '[\"Komik\"]', 'Publik', 'Naruto (ナルト) adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keing', 0, 0, 0, '2021-02-24', '2021-02-24'),
(22, '1614362777_f81e7addb3a5b77dfa89.pdf', 'Ycb028mTn526', 'admin Pustaka', 'Laskar pelangi', 'Andrea Hirata', 'Bentang Pustaka (Yogyakarta)', '21wPxTk0226.png', '[\"Cerita\"]', 'Publik', 'Laskar Pelangi adalah novel pertama karya Andrea Hirata yang diterbitkan oleh Bentang Pustaka pada tahun 2005. Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah (SD dan SMP) di sebuah sekolah Muhammadiyah di Belitung yang ', 0, 0, 1, '2021-03-09', '2021-02-26'),
(23, '1614363806_4c4bcf2b4b99917cf561.pdf', '5kF02SScin26', 'admin Pustaka', '9-C2-Pemrograman Web-X-1', 'Wahyu Purnomo, Endah Damayanti', 'Kemdikbud', '21bbNWv0226.png', '[\"TKJ\",\"MM\"]', 'Buku Kelas 10', 'Buku teks Pemrograman Web ini disusun berdasarkan tuntutan paradigma\r\npengajaran dan pembelajaran kurikulum 2013 diselaraskan berdasarkan\r\npendekatan model pembelajaran yang sesuai dengan kebutuhan belajar\r\nkurikulum abad 21, yaitu pendekatan model pembel', 0, 0, 0, '2021-02-26', '2021-02-26'),
(24, '1616567670_009731172bc200ad1345.pdf', 'PQd03k69hi24', 'admin Pustaka', '3-C2-Simulasi Digital-X-1', 'david ', 'david aprilio', '21L8nJa0324.png', '[\"Komik\"]', 'Publik', 'blblbllblblblblbll bblblbll', 0, 0, 0, '2021-03-24', '2021-03-24'),
(25, '1616596847_c49408658076f8e8305c.pdf', 'RAG03fcD8O24', 'admin Pustaka', 'Perpustaaan', 'qq', 'qq', '21PUFYs0324.png', '[\"MM\",\"TKR\"]', 'Buku Kelas 10', 'qqq', 0, 0, 0, '2021-03-24', '2021-03-24'),
(26, '1616597156_e5d5c1f207977fa8365e.pdf', 'DyY03FGIdD24', 'admin Pustaka', 'Perpustaaan', 'ff2', 'feff', '21mhHrQ0324.png', '[\"Komik\"]', 'Publik', 'mio', 0, 0, 0, '2021-03-24', '2021-03-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookReader`
--

CREATE TABLE `bookReader` (
  `id` int(11) NOT NULL,
  `idUser` varchar(30) NOT NULL,
  `idBook` varchar(30) NOT NULL,
  `time` time NOT NULL,
  `startTime` time NOT NULL,
  `start` time NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bookReader`
--

INSERT INTO `bookReader` (`id`, `idUser`, `idBook`, `time`, `startTime`, `start`, `updated_at`, `created_at`) VALUES
(1, 'tDdoIkJhMPnAVim', 'Ys202Ywuir24', '00:25:06', '23:00:18', '00:00:00', '2021-03-20 11:00:18', '2021-03-17 10:35:22'),
(3, 'tDdoIkJhMPnAVim', 'Yk102ez4dv24', '00:03:02', '23:21:09', '00:00:00', '2021-03-20 11:21:09', '2021-03-20 11:13:50'),
(4, 'tDdoIkJhMPnAVim', 'T9n02v8cEa24', '00:03:00', '11:48:00', '11:45:01', '2021-03-20 23:48:00', '2021-03-20 23:45:01'),
(5, 'tDdoIkJhMPnAVim', 'Te102vpSfi24', '00:01:00', '19:01:41', '19:00:42', '2021-03-21 07:01:41', '2021-03-21 07:00:42'),
(6, 'tDdoIkJhMPnAVim', 'G9H02z4VxS24', '00:00:59', '23:25:11', '23:24:12', '2021-03-24 11:25:11', '2021-03-24 11:24:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriT`
--

CREATE TABLE `kategoriT` (
  `id` int(11) UNSIGNED NOT NULL,
  `page` varchar(100) NOT NULL,
  `kat_grub` varchar(60) NOT NULL,
  `kat_menu` varchar(60) NOT NULL,
  `slugID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategoriT`
--

INSERT INTO `kategoriT` (`id`, `page`, `kat_grub`, `kat_menu`, `slugID`) VALUES
(1, '', 'Buku Kelas', 'Semua Buku', 'SemuaBuku@kbaduaBUdGd'),
(2, '', 'Buku Kelas', 'Buku Kelas 12', 'BukuKelas12@IbBibfiKUbifhi'),
(3, '', 'Buku Kelas', 'Buku Kelas 11', 'BukuKelas11@JBfiifvuUVKuf'),
(4, '', 'Buku Kelas', 'Buku Kelas 10', 'BukuKelas10@IHifhiLwKGwn'),
(5, '', 'Buku Produktif', 'TKJ', 'TKJ@LUgufgwVufGUifb'),
(6, '', 'Buku Produktif', 'MM', 'MM@ihIgflGKdhalihf'),
(7, '', 'Buku Produktif', 'TKR', 'TKR@IfbSkfnJdfKdaa'),
(8, '', 'Buku Produktif', 'TBO', 'TBO@fbuwBBbwufKfen'),
(9, '', 'Buku Produktif', 'TPL', 'TPL@giNIgeoanINifwn'),
(10, '', 'Buku Produktif', 'APAT', 'APAT@IhfwiUGfohwihi'),
(11, '', 'Lainnya', 'Komik', 'KOMIK@mMnw6b21ABbus'),
(12, '', 'Lainnya', 'Cerita', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
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
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-01-03-155248', 'App\\Database\\Migrations\\Book', 'default', 'App', 1613623097, 1),
(2, '2021-01-03-155317', 'App\\Database\\Migrations\\KategoriT', 'default', 'App', 1613623098, 1),
(3, '2021-01-03-155338', 'App\\Database\\Migrations\\Users', 'default', 'App', 1613623098, 1),
(4, '2021-02-14-125609', 'App\\Database\\Migrations\\ApiClientApps', 'default', 'App', 1613623099, 1),
(5, '2021-02-14-132737', 'App\\Database\\Migrations\\UserSiswa', 'default', 'App', 1613623099, 1),
(6, '2021-02-14-141213', 'App\\Database\\Migrations\\DataRegistrasi', 'default', 'App', 1613623100, 1),
(7, '2021-02-14-143356', 'App\\Database\\Migrations\\Documentation', 'default', 'App', 1613623100, 1),
(8, '2021-02-14-143849', 'App\\Database\\Migrations\\DocsMenu', 'default', 'App', 1613623100, 1),
(9, '2021-02-14-144636', 'App\\Database\\Migrations\\UserGuru', 'default', 'App', 1613623101, 1),
(10, '2021-02-14-145434', 'App\\Database\\Migrations\\Apps', 'default', 'App', 1613623101, 1),
(11, '2021-02-14-151351', 'App\\Database\\Migrations\\System', 'default', 'App', 1613623102, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stastik`
--

CREATE TABLE `stastik` (
  `id` int(11) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `system`
--

CREATE TABLE `system` (
  `id` int(11) UNSIGNED NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `value` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `system`
--

INSERT INTO `system` (`id`, `keyword`, `value`) VALUES
(1, 'themeAdmin', 'dark');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUniq` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jk` char(1) NOT NULL,
  `state` varchar(50) NOT NULL,
  `openBook` varchar(50) DEFAULT NULL,
  `bookColection` text DEFAULT NULL,
  `bookRead` text DEFAULT NULL,
  `favoriteBook` text DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `idUniq`, `nama`, `kelas`, `jk`, `state`, `openBook`, `bookColection`, `bookRead`, `favoriteBook`, `updated_at`, `created_at`) VALUES
(1, 'nhDBI03jwPQ', 'David Aprilio', '12 TKJ 1', 'L', 'offline', NULL, NULL, '', NULL, '2021-03-13 08:32:05', '2021-03-10 09:05:46'),
(2, 'nhDBI03jwPQ', 'David rudiato', '12 TKJ 2', 'L', 'offline', NULL, NULL, '', NULL, '2021-03-10 09:07:29', '2021-03-10 09:07:29'),
(3, 'tDdoIkJhMPnAVim', 'Ratih Nasyidah Nuraini', '10 MM 1', '', 'offline', NULL, NULL, '[\"Ys202Ywuir24\"]', NULL, '2021-03-24 11:26:32', '2021-03-13 08:49:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookReader`
--
ALTER TABLE `bookReader`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoriT`
--
ALTER TABLE `kategoriT`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stastik`
--
ALTER TABLE `stastik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `bookReader`
--
ALTER TABLE `bookReader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategoriT`
--
ALTER TABLE `kategoriT`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `stastik`
--
ALTER TABLE `stastik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
