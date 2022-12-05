-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Agu 2022 pada 15.11
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
-- Database: `spk_kayu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Kayu Jati'),
(2, 'Kayu Mahoni'),
(3, 'Kayu Mindi'),
(4, 'Kayu Trembesi'),
(5, 'Kayu Sungkai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `sifat_fisik` int(11) NOT NULL,
  `ketahanan` int(11) NOT NULL,
  `sifat_mekanik` int(11) NOT NULL,
  `kelas_kayu` int(11) NOT NULL,
  `tekstur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `alternatif`, `sifat_fisik`, `ketahanan`, `sifat_mekanik`, `kelas_kayu`, `tekstur`) VALUES
(1, 'Kayu Jati', 3, 5, 4, 5, 4),
(4, 'Kayu Trembesi', 2, 3, 4, 3, 4),
(5, 'Kayu Mahoni', 2, 5, 4, 4, 4),
(6, 'Kayu Sungkai', 2, 2, 4, 4, 1),
(7, 'Kayu Mindi', 3, 3, 4, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `kode_kriteria` varchar(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` float NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(1, 'C1', 'Sifat Fisik', 0.25, 'Benefit'),
(2, 'C2', 'Ketahanan', 0.25, 'Benefit'),
(4, 'C3', 'Sifat Mekanik', 0.2, 'Benefit'),
(5, 'C4', 'Kelas Kayu', 0.15, 'Benefit'),
(6, 'C5', 'Tekstur', 0.15, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_perangkingan` int(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ranking`
--

INSERT INTO `ranking` (`id_perangkingan`, `alternatif`, `nilai`) VALUES
(1, 'Kayu Jati', 1),
(2, 'Kayu Trembesi', 0.76),
(3, 'Kayu Mahoni', 0.89),
(4, 'Kayu Sungkai', 0.62),
(5, 'Kayu Mindi', 0.84);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(4, 1, 1, 'Sedang'),
(5, 1, 2, 'Keras'),
(6, 1, 3, 'Sangat Keras'),
(7, 2, 1, '1 - 5 Tahun'),
(8, 2, 2, '5 - 10 Tahun '),
(9, 2, 3, '10 â€“ 15 Tahun'),
(10, 2, 4, '15 â€“ 20 Tahun'),
(11, 2, 5, '20 Tahun Keatas '),
(12, 4, 1, 'Berat < 215'),
(13, 4, 2, 'Berat 300 â€“ 215 '),
(14, 4, 3, 'Berat 425 â€“ 300 '),
(15, 4, 4, 'Berat 650 â€“ 425 '),
(16, 4, 5, 'Berat > 650 '),
(17, 5, 1, 'Kekuatan < 0.30'),
(18, 5, 2, 'Kekuatan 0.30 â€“ 0.40'),
(19, 5, 3, 'Kekuatan 0.4 â€“ 0.60'),
(20, 5, 4, 'Kekuatan 0.60 â€“ 0.90 '),
(21, 5, 5, 'Kekuatan > 0.90'),
(22, 6, 1, 'Kasar'),
(23, 6, 2, 'Sedang '),
(24, 6, 3, 'Sedikit Halus'),
(25, 6, 4, 'Halus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_admin` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_admin`, `nama`, `username`, `password`) VALUES
(1, '', 'admin', '$2y$10$M80eHFnCpX6RzDiN7LfRNeNMmUZM51y4gT9NqnerVnud9onIWBvyq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_perangkingan`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_perangkingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
