-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2021 pada 04.02
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_electre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kd_alternatif` varchar(11) NOT NULL,
  `nm_alternatif` varchar(100) NOT NULL,
  `kd_daerah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daerah`
--

CREATE TABLE `tbl_daerah` (
  `id_daerah` int(11) NOT NULL,
  `nm_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kriteria`
--

CREATE TABLE `tbl_detail_kriteria` (
  `id_detai_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nm_detail_kriteria` varchar(128) NOT NULL,
  `bobot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kd_kriteria` varchar(11) NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kd_kriteria`, `nm_kriteria`) VALUES
(1, 'C1', 'Kondisi Rumah'),
(2, 'C2', 'Kondisi Materil'),
(3, 'C3', 'Kondisi Psikologis'),
(4, 'C4', 'Kondisi Lokasi Rumah Rawan Bencana'),
(5, 'C5', 'Kondisi Keluarga');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `tbl_detail_kriteria`
--
ALTER TABLE `tbl_detail_kriteria`
  ADD PRIMARY KEY (`id_detai_kriteria`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_kriteria`
--
ALTER TABLE `tbl_detail_kriteria`
  MODIFY `id_detai_kriteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
