-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Agu 2018 pada 00.24
-- Versi server: 10.1.31-MariaDB-cll-lve
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuqueuew_nuqueue`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_rs` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `no_antrian` varchar(20) NOT NULL,
  `tgl_antrian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipe_daftar` int(11) NOT NULL,
  `status_antrian` int(11) NOT NULL DEFAULT '2',
  `no_nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_user`, `id_rs`, `id_poli`, `id_jadwal`, `no_antrian`, `tgl_antrian`, `tipe_daftar`, `status_antrian`, `no_nik`) VALUES
(50, NULL, 2, 3, 7, '180502-237-2', '2018-05-02 02:00:48', 2, 1, '3204441701970022'),
(53, NULL, 6, 6, 8, '180502-668-1', '2018-05-02 02:07:30', 2, 3, '3204441701970022'),
(54, NULL, 6, 6, 8, '180502-668-2', '2018-05-02 02:07:43', 2, 1, '3204441701970023'),
(69, NULL, 2, 3, 7, '180504-237-2', '2018-05-04 03:06:05', 2, 3, '3204441701970005'),
(81, NULL, 2, 3, 7, '180504-237-14', '2018-05-04 22:46:00', 2, 3, '3204441701970100'),
(87, NULL, 2, 7, 10, '180505-2710-2', '2018-05-05 00:24:46', 2, 3, '3204441701970006'),
(88, NULL, 2, 7, 10, '180505-2710-3', '2018-05-05 00:24:52', 2, 3, '3204441701970007'),
(90, NULL, 2, 7, 10, '180505-2710-5', '2018-05-05 00:25:46', 2, 3, '3204441701970009'),
(91, NULL, 2, 7, 10, '180505-2710-6', '2018-05-05 00:25:54', 2, 3, '3204441701970011'),
(96, NULL, 2, 4, 6, '180625-246-3', '2018-06-25 09:25:04', 2, 3, '3204441701970005'),
(97, NULL, 2, 4, 6, '180625-246-4', '2018-06-25 09:26:07', 2, 3, '3204441701970006'),
(122, NULL, 2, 3, 7, '180704-237-14', '2018-07-04 12:26:14', 2, 1, '3204441701970004'),
(125, NULL, 2, 3, 9, '180705-239-1', '2018-07-05 16:27:41', 2, 3, '3204441701970004'),
(132, NULL, 2, 3, 9, '180712-239-1', '2018-07-12 22:29:34', 2, 3, '3204441701970004'),
(133, NULL, 2, 3, 9, '180712-239-2', '2018-07-12 22:57:03', 2, 3, '3204441701970004'),
(135, NULL, 2, 3, 7, '180713-237-1', '2018-07-13 00:09:36', 2, 3, '3204441701970004'),
(136, NULL, 2, 3, 7, '180713-237-2', '2018-07-13 07:26:32', 2, 3, '3204441701970005'),
(143, NULL, 2, 3, 7, '180713-237-6', '2018-07-13 07:39:13', 2, 3, '3204441701970006'),
(144, NULL, 2, 3, 7, '180713-237-7', '2018-07-13 07:40:44', 2, 3, '3204441701970007'),
(145, NULL, 2, 3, 7, '180713-237-8', '2018-07-13 07:42:36', 2, 3, '3204441701970008'),
(146, NULL, 2, 3, 7, '180713-237-9', '2018-07-13 07:43:21', 2, 3, '3204441701970009'),
(148, NULL, 2, 3, 7, '180713-237-11', '2018-07-13 07:46:53', 2, 3, '3204441701970010'),
(150, NULL, 2, 3, 7, '180713-237-12', '2018-07-13 07:57:42', 2, 3, '3204441701970012'),
(152, NULL, 2, 3, 7, '180713-237-13', '2018-07-13 08:01:01', 2, 3, '3204441701970013'),
(154, NULL, 2, 3, 7, '180713-237-13', '2018-07-13 08:03:20', 2, 3, '3204441701970004'),
(155, NULL, 2, 3, 7, '180713-237-14', '2018-07-13 08:05:43', 2, 3, '3204441701970004'),
(156, NULL, 2, 3, 7, '180713-237-15', '2018-07-13 08:05:52', 2, 3, '3204441701970005'),
(157, NULL, 2, 3, 7, '180713-237-16', '2018-07-13 08:12:23', 2, 3, '3204441701970006'),
(159, NULL, 2, 3, 7, '180713-237-17', '2018-07-13 08:14:15', 2, 3, '3204441701970007'),
(161, NULL, 2, 3, 7, '180713-237-19', '2018-07-13 08:15:07', 2, 3, '3204441701970009'),
(163, NULL, 2, 3, 7, '180713-237-19', '2018-07-13 08:17:23', 2, 3, '3204441701970008'),
(165, NULL, 2, 3, 7, '180713-237-20', '2018-07-13 08:19:56', 2, 3, '3204441701970010'),
(166, NULL, 2, 3, 7, '180713-237-21', '2018-07-13 08:20:06', 2, 3, '3204441701970010'),
(171, NULL, 2, 3, 7, '180713-237-26', '2018-07-13 08:26:18', 2, 3, '3204441701970004'),
(172, NULL, 2, 3, 7, '180713-237-27', '2018-07-13 08:26:24', 2, 3, '3204441701970004'),
(173, NULL, 2, 3, 7, '180713-237-28', '2018-07-13 08:29:12', 2, 3, '3204441701970005'),
(174, NULL, 2, 3, 7, '180713-237-29', '2018-07-13 08:30:35', 2, 3, '3204441701970006'),
(175, NULL, 2, 3, 7, '180713-237-30', '2018-07-13 08:30:39', 2, 3, '3204441701970006'),
(178, NULL, 2, 3, 7, '180713-237-33', '2018-07-13 08:36:21', 2, 3, '3204441701970004'),
(182, NULL, 2, 3, 7, '180713-237-37', '2018-07-13 08:49:41', 2, 3, '3204441701970006'),
(183, NULL, 2, 3, 7, '180713-237-38', '2018-07-13 08:51:37', 2, 3, '3204441701970005'),
(184, NULL, 2, 3, 7, '180713-237-39', '2018-07-13 08:53:18', 2, 3, '3204441701970007'),
(185, NULL, 2, 3, 7, '180713-237-40', '2018-07-13 08:55:09', 2, 3, '3204441701970008'),
(186, NULL, 2, 3, 7, '180713-237-41', '2018-07-13 08:58:33', 2, 3, '3204441701970010'),
(187, NULL, 2, 3, 7, '180713-237-42', '2018-07-13 08:58:54', 2, 3, '3204441701970011'),
(188, NULL, 2, 3, 7, '180713-237-43', '2018-07-13 09:00:06', 2, 3, '3204441701970004'),
(189, NULL, 2, 3, 7, '180713-237-44', '2018-07-13 09:00:55', 2, 3, '3204441701970006'),
(192, NULL, 2, 3, 7, '180713-237-47', '2018-07-13 09:03:57', 2, 3, '3204441701970010'),
(193, NULL, 2, 3, 7, '180713-237-48', '2018-07-13 09:05:22', 2, 3, '3204441701970009'),
(194, NULL, 2, 3, 7, '180713-237-49', '2018-07-13 09:08:32', 2, 3, '3204441701970011'),
(196, NULL, 2, 3, 7, '180713-237-51', '2018-07-13 09:10:24', 2, 2, '3204441701970012'),
(197, NULL, 2, 3, 7, '180713-237-52', '2018-07-13 09:12:04', 2, 2, '3204441701970013'),
(201, NULL, 2, 3, 7, '180713-237-55', '2018-07-13 14:41:34', 2, 2, '3204441701970200'),
(203, NULL, 2, 3, 9, '180731-239-1', '2018-07-31 13:54:14', 2, 1, '3204441701970009'),
(205, NULL, 2, 3, 9, '180731-239-2', '2018-07-31 13:56:03', 2, 2, '3204441701970010'),
(207, NULL, 2, 3, 9, '180731-239-3', '2018-07-31 13:58:51', 2, 2, '3204441701970011'),
(208, 1, 2, 3, 7, '180802-237-1', '2018-08-02 08:22:41', 1, 2, '3204441701970004'),
(209, 1, 2, 3, 7, '180802-237-2', '2018-08-02 08:23:04', 1, 2, '3204441701970005'),
(210, 1, 2, 3, 7, '180802-237-3', '2018-08-02 09:39:19', 1, 2, '3204441701970004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cs`
--

CREATE TABLE `cs` (
  `id_cs` int(11) NOT NULL,
  `nama_cs` varchar(30) NOT NULL,
  `username_cs` varchar(25) NOT NULL,
  `password_cs` varchar(20) NOT NULL,
  `id_rs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cs`
--

INSERT INTO `cs` (`id_cs`, `nama_cs`, `username_cs`, `password_cs`, `id_rs`) VALUES
(1, 'Yosua Raka J', 'yosuaraka', '1234', 2),
(4, 'CS Salak', 'cssalak1', '1234', 6),
(5, 'Eka Dicky', 'ekadicky', '1234', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `id_rs` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `id_rs`, `id_poli`) VALUES
(3, 'dr. Dicky Eka R', 2, 3),
(6, 'dr. Rani', 6, 6),
(7, 'dr. Rani', 2, 4),
(8, 'dr. Banny', 2, 7),
(9, 'dr. Gading', 2, 8),
(10, 'dr. Dicky Eka Ramadhan', 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal_poli` varchar(3) NOT NULL,
  `jammulai_poli` time NOT NULL,
  `jamselesai_poli` time NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_rs` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jadwal_poli`, `jammulai_poli`, `jamselesai_poli`, `id_poli`, `id_rs`, `id_dokter`) VALUES
(6, 'Mon', '16:51:00', '22:51:00', 4, 2, 7),
(7, 'Thu', '07:00:00', '11:00:00', 3, 2, 3),
(8, 'Sat', '07:00:00', '17:00:00', 6, 6, 6),
(9, 'Thu', '13:00:00', '16:00:00', 3, 2, 3),
(10, 'Sat', '08:00:00', '13:00:00', 7, 2, 8),
(11, 'Sun', '10:05:00', '13:00:00', 8, 2, 9),
(12, 'Fri', '14:00:00', '15:00:00', 10, 10, 10),
(13, 'Sat', '01:12:00', '03:20:00', 3, 2, 8),
(14, 'Sat', '01:00:00', '01:21:00', 8, 2, 9),
(15, 'Sat', '01:01:00', '01:30:00', 3, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nik`
--

CREATE TABLE `nik` (
  `id_nik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_nik` varchar(16) NOT NULL,
  `id_rs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nik`
--

INSERT INTO `nik` (`id_nik`, `id_user`, `no_nik`, `id_rs`) VALUES
(5, 1, '3204441701970004', 2),
(6, 1, '3204441701970005', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nqtemp`
--

CREATE TABLE `nqtemp` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tgllahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(30) NOT NULL,
  `telepon_pasien` varchar(14) NOT NULL,
  `jk_pasien` char(1) NOT NULL,
  `goldar_pasien` varchar(2) NOT NULL,
  `no_nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nqtemp`
--

INSERT INTO `nqtemp` (`id_pasien`, `nama_pasien`, `tgllahir_pasien`, `alamat_pasien`, `telepon_pasien`, `jk_pasien`, `goldar_pasien`, `no_nik`) VALUES
(12, 'Dicky Eka Ramadhan', '2018-04-25', 'Bandung', '08987471077', 'L', 'A', '3204441701970004'),
(13, 'Rizky Arya', '2018-04-03', 'Bandung', '08987471077', 'L', 'A', '3204441701970005'),
(14, 'Ali Akbar', '2018-04-04', 'Bandung', '08987471077', 'L', 'A', '3204441701970006'),
(15, 'Yofi Wahyu', '2018-03-27', 'Bandung', '08987471077', 'L', 'A', '3204441701970007'),
(16, 'Afifah Abdat', '2018-04-08', 'Bandung', '08987471077', 'L', 'A', '3204441701970008'),
(17, 'Nadya Mutiara', '2018-04-08', 'Bandung', '08987471077', 'L', 'A', '3204441701970009'),
(18, 'Banny Archard', '2018-04-09', 'Bandung', '08987471077', 'L', 'A', '3204441701970010'),
(19, 'Taqi Sabil', '2018-04-09', 'Bandung', '08987471077', 'L', 'A', '3204441701970011'),
(20, 'Kevin Klaudiansyah', '2018-04-01', 'Bandung', '08987471077', 'L', 'A', '3204441701970012'),
(21, 'Salsabila Diandra', '2018-04-02', 'Bandung', '08987471077', 'L', 'A', '3204441701970013'),
(25, 'Tiara Bestari Malau', '2018-04-25', 'Depok', '08987471077', 'P', 'A', '3204441701970066'),
(27, 'Tiara Eka Rabbania', '2018-05-08', 'Bogor', '08987471077', 'P', 'O', '3204441701970088'),
(31, 'Fatmi Aulia', '2018-04-09', 'Bandung', '08987471077', 'P', 'B', '3204441701970021'),
(32, 'Sri Wahyuni', '2018-05-14', 'Padang', '08987471077', 'P', 'A', '3204441701970022'),
(33, 'Yusi Yusrina', '2018-04-09', 'Cirebon', '08987471077', 'P', 'O', '3204441701970023'),
(34, 'Sri Aprianti', '2018-04-09', 'Bandung', '08987471077', 'P', 'B', '3204441701970024'),
(39, 'Dicky Ramadhan Eka', '2018-04-09', 'Bandung', '08987471077', 'L', 'O', '3204441701970100'),
(40, 'Abd Rozak', '2018-05-02', 'Depok', '1234125', 'L', 'AB', '3204441701970112'),
(41, 'Eka Dicky', '2018-04-09', 'Bandung', '08987471077', 'L', 'O', '3204441701970113'),
(42, 'Maharani Saras Ayu', '1997-03-15', 'Bogor', '087770202867', 'P', 'A', 'J3N115049'),
(45, 'Firhan', '2018-05-08', 'Jakarta', '12312341', 'P', 'A', '3204441701970111'),
(46, 'Dicky Eka Ramdany', '2018-04-09', 'Bandung', '08987471077', 'L', 'O', '3204441701970020'),
(47, 'Ramadhan Eka', '2018-07-17', 'Bogor', '08987471077', 'L', 'A', '3204441701970200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(40) NOT NULL,
  `id_rs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`, `id_rs`) VALUES
(3, 'Poliklinik Gigi', 2),
(4, 'Poliklinik Kandungan', 2),
(6, 'Poliklinik Umum', 6),
(7, 'Poliklinik Umum', 2),
(8, 'Poliklinik THT', 2),
(9, 'Poliklinik Anak', 2),
(10, 'Poliklinik Umum', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id_rs` int(11) NOT NULL,
  `nama_rs` varchar(50) NOT NULL,
  `alamat_rs` text NOT NULL,
  `telepon_rs` varchar(14) NOT NULL,
  `deskripsi_rs` varchar(120) NOT NULL,
  `email_rs` varchar(30) NOT NULL,
  `password_rs` varchar(20) NOT NULL,
  `lat_rs` double NOT NULL,
  `lon_rs` double NOT NULL,
  `status_rs` int(11) DEFAULT '3',
  `url_api` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`id_rs`, `nama_rs`, `alamat_rs`, `telepon_rs`, `deskripsi_rs`, `email_rs`, `password_rs`, `lat_rs`, `lon_rs`, `status_rs`, `url_api`) VALUES
(1, 'Admin', 'Bandung', '08987471077', 'Administrator', 'admin@nuqueue.com', 'admin', 0, 0, 1, NULL),
(2, 'Rumah Sakit Azra', 'Jl. Raya Pajajaran No.219, Bantarjati, Bogor Utara', '02518318456', 'RS Terbaik se Kota Bogor', 'custemerservice@rsazra.com', 'azra1234', -6.5792, 106.807468, 1, 'http://nuqueue.web.id/rsazra/api/'),
(3, 'RS PMI Bogor', 'Jl. Raya Pajajaran No.80, Bantarjati, Bogor Utara, Kota Bogor, Jawa Barat 16153', '02518324080', '', 'sekretariat@rspmibogor.or.id', 'pmi1234', 0, 0, 1, NULL),
(6, 'Salak Bogor Hospital', 'Jalan Jendral Sudirman No. 8', '02518345222', '', 'contact@rssalak.com', 'salak1234', 0, 0, 1, 'http://nuqueue.web.id/rssalak/api/'),
(7, 'tes', 'tes', 'ess', '', 'yosua_justico@yahoo.com', '1234', 0, 0, 0, NULL),
(8, 'tes', 'tes', 'tes', '', 'tes', 'tes', 0, 0, 3, NULL),
(9, 'asddas', 'dasdas', 'dasdas', '', 'dasdasd', 'dasdas', 0, 0, 3, NULL),
(10, 'RS Hasan Sadikin', 'Bandung', '08987471077', 'Rumah Sakit Terbaik', 'hasansadiki@gmail.com', '1234567', 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password_user` text NOT NULL,
  `tgllahir_user` date DEFAULT NULL,
  `alamat_user` varchar(30) DEFAULT NULL,
  `telepon_user` varchar(14) DEFAULT NULL,
  `jk_user` char(1) DEFAULT NULL,
  `goldar_user` varchar(2) DEFAULT NULL,
  `no_nik` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `tgllahir_user`, `alamat_user`, `telepon_user`, `jk_user`, `goldar_user`, `no_nik`) VALUES
(1, 'Dicky Eka', 'dickyeka17@gmail.com', 'itSCAafbUiY5Xx4hm7LM8w==\n', '2018-08-02', 'BDG', '1234', 'L', 'O', '3204441701970004'),
(10, 'Yofi Wahyu', 'yofiwahyu@gmail.com', 'gYe6yCPGyOiDRtC9Ko3Xgg==\n', NULL, NULL, '1234', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rs` (`id_rs`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `no_nik` (`no_nik`);

--
-- Indeks untuk tabel `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`id_cs`),
  ADD KEY `id_rs` (`id_rs`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_rs` (`id_rs`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_rs` (`id_rs`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `nik`
--
ALTER TABLE `nik`
  ADD PRIMARY KEY (`id_nik`),
  ADD KEY `id_rs` (`id_rs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `nqtemp`
--
ALTER TABLE `nqtemp`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `no_nik` (`no_nik`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `id_rs` (`id_rs`);

--
-- Indeks untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT untuk tabel `cs`
--
ALTER TABLE `cs`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nik`
--
ALTER TABLE `nik`
  MODIFY `id_nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nqtemp`
--
ALTER TABLE `nqtemp`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`id_rs`) REFERENCES `rumahsakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_ibfk_5` FOREIGN KEY (`no_nik`) REFERENCES `nqtemp` (`no_nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cs`
--
ALTER TABLE `cs`
  ADD CONSTRAINT `cs_ibfk_1` FOREIGN KEY (`id_rs`) REFERENCES `rumahsakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_rs`) REFERENCES `rumahsakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_rs`) REFERENCES `rumahsakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nik`
--
ALTER TABLE `nik`
  ADD CONSTRAINT `nik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD CONSTRAINT `poliklinik_ibfk_1` FOREIGN KEY (`id_rs`) REFERENCES `rumahsakit` (`id_rs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
