-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2024 pada 05.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis21`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `namalengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('al001', 'SILA'),
('al002', 'SYAHIDI'),
('al003', 'TRIAN'),
('al004', 'ZAHRA'),
('al005', 'ZALFA'),
('al006', 'SADDAM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `tipe_nilai` varchar(15) NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `tipe_nilai`, `sifat`) VALUES
('kr001', 'Rata-rata Nilai Akademik', 3, 'Form', 'benefit'),
('kr002', 'Rangking Kelas', 2, 'Form', 'cost'),
('kr003', 'Ekstrakulikuler', 4, 'Form', 'benefit'),
('kr004', 'Absensi Ketidakhadiran', 4, 'Form', 'cost'),
('kr005', 'Prestasi', 4, 'Form', 'benefit'),
('kr006', 'Projek 1 Kriteria 1 (B)', 4, 'Opsi', 'benefit'),
('kr007', 'Projek 1 Kriteria 2 (B)', 4, 'Opsi', 'benefit'),
('kr008', 'Projek 1 Kriteria 3 (B)', 4, 'Opsi', 'benefit'),
('kr009', 'Projek 2 Kriteria 1 (B)', 4, 'Opsi', 'benefit'),
('kr010', 'Projek 2 Kriteria 2 (B)', 4, 'Opsi', 'benefit'),
('kr011', 'Projek 2 Kriteria 3 (B)', 4, 'Opsi', 'benefit'),
('kr012', 'Projek 3 Kriteria 1 (B)', 4, 'Opsi', 'benefit'),
('kr013', 'Projek 3 Kriteria 2 (B)', 4, 'Opsi', 'benefit'),
('kr014', 'Projek 3 Kriteria 3 (B)', 4, 'Opsi', 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(217, 'al002', 'kr001', 89.36),
(218, 'al002', 'kr002', 29),
(219, 'al002', 'kr003', 1),
(220, 'al002', 'kr004', 0),
(221, 'al002', 'kr005', 2),
(222, 'al002', 'kr006', 3),
(223, 'al002', 'kr007', 3),
(224, 'al002', 'kr008', 3),
(225, 'al002', 'kr009', 3),
(226, 'al002', 'kr010', 3),
(227, 'al002', 'kr011', 3),
(228, 'al002', 'kr012', 3),
(229, 'al002', 'kr013', 3),
(230, 'al002', 'kr014', 3),
(231, 'al003', 'kr001', 91.73),
(232, 'al003', 'kr002', 17),
(233, 'al003', 'kr003', 1),
(234, 'al003', 'kr004', 0),
(235, 'al003', 'kr005', 1),
(236, 'al003', 'kr006', 4),
(237, 'al003', 'kr007', 3),
(238, 'al003', 'kr008', 4),
(239, 'al003', 'kr009', 4),
(240, 'al003', 'kr010', 4),
(241, 'al003', 'kr011', 4),
(242, 'al003', 'kr012', 4),
(243, 'al003', 'kr013', 4),
(244, 'al003', 'kr014', 4),
(245, 'al004', 'kr001', 94.36),
(246, 'al004', 'kr002', 6),
(247, 'al004', 'kr003', 0),
(248, 'al004', 'kr004', 1),
(249, 'al004', 'kr005', 1),
(250, 'al004', 'kr006', 4),
(251, 'al004', 'kr007', 4),
(252, 'al004', 'kr008', 4),
(253, 'al004', 'kr009', 4),
(254, 'al004', 'kr010', 4),
(255, 'al004', 'kr011', 4),
(256, 'al004', 'kr012', 4),
(257, 'al004', 'kr013', 4),
(258, 'al004', 'kr014', 4),
(259, 'al005', 'kr001', 96.27),
(260, 'al005', 'kr002', 2),
(261, 'al005', 'kr003', 1),
(262, 'al005', 'kr004', 0),
(263, 'al005', 'kr005', 1),
(264, 'al005', 'kr006', 4),
(265, 'al005', 'kr007', 4),
(266, 'al005', 'kr008', 4),
(267, 'al005', 'kr009', 4),
(268, 'al005', 'kr010', 4),
(269, 'al005', 'kr011', 4),
(270, 'al005', 'kr012', 4),
(271, 'al005', 'kr013', 4),
(272, 'al005', 'kr014', 4),
(273, 'al006', 'kr001', 90.55),
(274, 'al006', 'kr002', 24),
(275, 'al006', 'kr003', 1),
(276, 'al006', 'kr004', 1),
(277, 'al006', 'kr005', 1),
(278, 'al006', 'kr006', 3),
(279, 'al006', 'kr007', 3),
(280, 'al006', 'kr008', 4),
(281, 'al006', 'kr009', 3),
(282, 'al006', 'kr010', 3),
(283, 'al006', 'kr011', 3),
(284, 'al006', 'kr012', 3),
(285, 'al006', 'kr013', 4),
(286, 'al006', 'kr014', 4),
(287, 'al001', 'kr001', 94),
(288, 'al001', 'kr002', 7),
(289, 'al001', 'kr003', 1),
(290, 'al001', 'kr004', 0),
(291, 'al001', 'kr005', 1),
(292, 'al001', 'kr006', 4),
(293, 'al001', 'kr007', 4),
(294, 'al001', 'kr008', 4),
(295, 'al001', 'kr009', 4),
(296, 'al001', 'kr010', 4),
(297, 'al001', 'kr011', 4),
(298, 'al001', 'kr012', 4),
(299, 'al001', 'kr013', 4),
(300, 'al001', 'kr014', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
