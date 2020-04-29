-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2020 pada 04.24
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `covid`
--

CREATE TABLE `covid` (
  `id_case` int(11) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `total_case` int(11) NOT NULL,
  `total_dead` int(11) NOT NULL,
  `case_baru` int(11) NOT NULL,
  `mati_baru` int(11) NOT NULL,
  `total_sembuh` int(11) NOT NULL,
  `case_positif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `covid`
--

INSERT INTO `covid` (`id_case`, `id_negara`, `total_case`, `total_dead`, `case_baru`, `mati_baru`, `total_sembuh`, `case_positif`) VALUES
(1, 1, 1029878, 58640, 19522, 1843, 140138, 831100),
(2, 2, 232128, 23822, 2706, 301, 123903, 84403),
(3, 3, 201505, 27359, 2091, 382, 68941, 105205),
(4, 4, 165911, 23660, 2638, 367, 46886, 95365),
(5, 5, 161145, 21678, 3996, 586, 0, 139123),
(6, 6, 159431, 6215, 673, 89, 117400, 35816),
(7, 7, 114653, 2992, 2392, 92, 38809, 72852),
(8, 8, 93558, 867, 6411, 73, 8456, 84235),
(9, 9, 92584, 5877, 1112, 71, 72439, 14268),
(10, 10, 82831, 4633, 6, 0, 77555, 648);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id_case`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `covid`
--
ALTER TABLE `covid`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
