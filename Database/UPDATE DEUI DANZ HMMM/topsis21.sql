-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2024 pada 18.11
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
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`, `jenis_kelamin`, `kelas`) VALUES
('al001', 'Siswa 1', 'Wanita', '7D'),
('al002', 'Siswa 2', 'Pria', '7D'),
('al003', 'Siswa 3', 'Pria', '7D'),
('al004', 'Siswa 4', 'Pria', '7D'),
('al005', 'Siswa 5', 'Wanita', '7D'),
('al006', 'Siswa 6', 'Pria', '7D');

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
('kr001', 'Rata-Rata Nilai Akademik', 4, 'Opsi1', 'benefit'),
('kr002', 'Rangking Kelas', 3, 'Opsi1', 'cost'),
('kr003', 'Ekstrakulikuler', 5, 'Opsi1', 'benefit'),
('kr004', 'Absensi Ketidakhadiran', 2, 'Opsi3', 'benefit'),
('kr005', 'Prestasi', 3, 'Opsi2', 'benefit'),
('kr006', 'Projek 1 Kriteria 1', 3, 'Opsi2', 'benefit'),
('kr007', 'Projek 1 Kriteria 2 ', 3, 'Opsi2', 'benefit'),
('kr008', 'Projek 1 Kriteria 3', 3, 'Opsi2', 'benefit'),
('kr009', 'Projek 2 Kriteria 1', 3, 'Opsi2', 'benefit'),
('kr010', 'Projek 2 Kriteria 2', 3, 'Opsi2', 'benefit'),
('kr011', 'Projek 2 Kriteria 3', 3, 'Opsi2', 'benefit'),
('kr012', 'Projek 3 Kriteria 1', 3, 'Opsi2', 'benefit'),
('kr013', 'Projek 3 Kriteria 2 ', 3, 'Opsi2', 'benefit'),
('kr014', 'Projek 3 Kriteria 3 ', 3, 'Opsi2', 'benefit');

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
(301, 'al001', 'kr001', 4),
(302, 'al001', 'kr002', 2),
(303, 'al001', 'kr003', 5),
(304, 'al001', 'kr004', 5),
(305, 'al001', 'kr005', 1),
(306, 'al001', 'kr006', 4),
(307, 'al001', 'kr007', 4),
(308, 'al001', 'kr008', 4),
(309, 'al001', 'kr009', 4),
(310, 'al001', 'kr010', 4),
(311, 'al001', 'kr011', 4),
(312, 'al001', 'kr012', 4),
(313, 'al001', 'kr013', 4),
(314, 'al001', 'kr014', 3),
(315, 'al002', 'kr001', 4),
(316, 'al002', 'kr002', 5),
(317, 'al002', 'kr003', 5),
(318, 'al002', 'kr004', 5),
(319, 'al002', 'kr005', 2),
(320, 'al002', 'kr006', 3),
(321, 'al002', 'kr007', 3),
(322, 'al002', 'kr008', 3),
(323, 'al002', 'kr009', 3),
(324, 'al002', 'kr010', 3),
(325, 'al002', 'kr011', 3),
(326, 'al002', 'kr012', 3),
(327, 'al002', 'kr013', 3),
(328, 'al002', 'kr014', 3),
(329, 'al003', 'kr001', 4),
(330, 'al003', 'kr002', 4),
(331, 'al003', 'kr003', 4),
(332, 'al003', 'kr004', 5),
(333, 'al003', 'kr005', 1),
(334, 'al003', 'kr006', 4),
(335, 'al003', 'kr007', 3),
(336, 'al003', 'kr008', 4),
(337, 'al003', 'kr009', 4),
(338, 'al003', 'kr010', 4),
(339, 'al003', 'kr011', 4),
(340, 'al003', 'kr012', 4),
(341, 'al003', 'kr013', 4),
(342, 'al003', 'kr014', 4),
(343, 'al004', 'kr001', 4),
(344, 'al004', 'kr002', 2),
(345, 'al004', 'kr003', 5),
(346, 'al004', 'kr004', 3),
(347, 'al004', 'kr005', 1),
(348, 'al004', 'kr006', 4),
(349, 'al004', 'kr007', 4),
(350, 'al004', 'kr008', 4),
(351, 'al004', 'kr009', 4),
(352, 'al004', 'kr010', 4),
(353, 'al004', 'kr011', 4),
(354, 'al004', 'kr012', 4),
(355, 'al004', 'kr013', 4),
(356, 'al004', 'kr014', 4),
(357, 'al005', 'kr001', 5),
(358, 'al005', 'kr002', 1),
(359, 'al005', 'kr003', 5),
(360, 'al005', 'kr004', 5),
(361, 'al005', 'kr005', 1),
(362, 'al005', 'kr006', 4),
(363, 'al005', 'kr007', 4),
(364, 'al005', 'kr008', 4),
(365, 'al005', 'kr009', 4),
(366, 'al005', 'kr010', 4),
(367, 'al005', 'kr011', 4),
(368, 'al005', 'kr012', 4),
(369, 'al005', 'kr013', 4),
(370, 'al005', 'kr014', 4),
(371, 'al006', 'kr001', 4),
(372, 'al006', 'kr002', 5),
(373, 'al006', 'kr003', 4),
(374, 'al006', 'kr004', 5),
(375, 'al006', 'kr005', 1),
(376, 'al006', 'kr006', 3),
(377, 'al006', 'kr007', 3),
(378, 'al006', 'kr008', 4),
(379, 'al006', 'kr009', 3),
(380, 'al006', 'kr010', 3),
(381, 'al006', 'kr011', 3),
(382, 'al006', 'kr012', 3),
(383, 'al006', 'kr013', 4),
(384, 'al006', 'kr014', 4),
(385, 'al007', 'kr001', 5),
(386, 'al007', 'kr002', 5),
(387, 'al007', 'kr003', 5),
(388, 'al007', 'kr004', 5),
(389, 'al007', 'kr005', 4),
(390, 'al007', 'kr006', 4),
(391, 'al007', 'kr007', 4),
(392, 'al007', 'kr008', 4),
(393, 'al007', 'kr009', 4),
(394, 'al007', 'kr010', 4),
(395, 'al007', 'kr011', 4),
(396, 'al007', 'kr012', 4),
(397, 'al007', 'kr013', 4),
(398, 'al007', 'kr014', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
