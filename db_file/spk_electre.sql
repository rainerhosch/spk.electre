-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jul 2021 pada 11.25
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_electre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE IF NOT EXISTS `tbl_alternatif` (
`id_alternatif` int(11) NOT NULL,
  `kd_daerah` int(11) NOT NULL,
  `kd_alternatif` varchar(11) NOT NULL,
  `nm_alternatif` varchar(100) NOT NULL,
  `C1` int(11) NOT NULL,
  `C2` int(11) NOT NULL,
  `C3` int(11) NOT NULL,
  `C4` int(11) NOT NULL,
  `C5` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `kd_daerah`, `kd_alternatif`, `nm_alternatif`, `C1`, `C2`, `C3`, `C4`, `C5`) VALUES
(8, 1, 'A1', 'DADANG MODIF', 3, 5, 5, 5, 5),
(9, 1, 'A2', 'CECEP', 3, 3, 3, 3, 1),
(10, 1, 'A3', 'Asep', 1, 3, 3, 1, 1),
(11, 1, 'A4', 'Luki', 1, 3, 5, 5, 1),
(12, 1, 'A5', 'SARMIN', 3, 3, 5, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daerah`
--

CREATE TABLE IF NOT EXISTS `tbl_daerah` (
`id_daerah` int(11) NOT NULL,
  `nm_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daerah`
--

INSERT INTO `tbl_daerah` (`id_daerah`, `nm_daerah`) VALUES
(1, 'Purwakarta'),
(2, 'Subang'),
(3, 'Karawang'),
(4, 'Bandung'),
(5, 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kriteria`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_kriteria` (
`id_detail_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nm_detail_kriteria` varchar(128) NOT NULL,
  `nilai` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detail_kriteria`
--

INSERT INTO `tbl_detail_kriteria` (`id_detail_kriteria`, `id_kriteria`, `nm_detail_kriteria`, `nilai`) VALUES
(7, 11, 'Utuh', 5),
(8, 11, 'Beberapa Rusak', 3),
(9, 11, 'Hancur', 1),
(10, 12, 'Utuh', 5),
(11, 12, 'Beberapa Hilang/Rusak', 3),
(12, 12, 'Hancur', 1),
(13, 13, 'Sadar/Emosi Stabil', 5),
(14, 13, 'Panik', 3),
(15, 13, 'Gangguan Mental', 1),
(16, 14, 'Lengkap/Tidak Ada Korban', 5),
(17, 14, 'Lengkap/Beberapa Luka-luka', 3),
(18, 14, 'Tidak Lengkap/Luka Parah', 1),
(19, 15, 'Jauh dari lokasi bencana', 5),
(20, 15, 'Tidak terlalu jauh', 3),
(21, 15, 'Sangat dekat dengan lokasi bencana', 1),
(22, 16, 'Utuh', 5),
(23, 16, 'Beberapa Rusak', 3),
(24, 16, 'Hancur', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE IF NOT EXISTS `tbl_kriteria` (
`id_kriteria` int(11) NOT NULL,
  `kd_kriteria` varchar(11) NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  `bobot_kr` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kd_kriteria`, `nm_kriteria`, `bobot_kr`) VALUES
(12, 'C2', 'Kondisi Materil', 2),
(13, 'C3', 'Kondisi Psikologis', 1),
(14, 'C4', 'Kondisi Keluarga', 5),
(15, 'C5', 'Kondisi Lokasi Rumah', 4),
(16, 'C1', 'Kondisi Rumah', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
  `kode_alternatif` varchar(11) NOT NULL,
  `kode_kriteria` varchar(11) NOT NULL,
  `kode_sub` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_relasi`
--

CREATE TABLE IF NOT EXISTS `tbl_relasi` (
`id_relasi` int(11) NOT NULL,
  `kode_alternatif` varchar(11) NOT NULL,
  `kode_kriteria` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `pass`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
 ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
 ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `tbl_detail_kriteria`
--
ALTER TABLE `tbl_detail_kriteria`
 ADD PRIMARY KEY (`id_detail_kriteria`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
 ADD PRIMARY KEY (`id_relasi`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_detail_kriteria`
--
ALTER TABLE `tbl_detail_kriteria`
MODIFY `id_detail_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
