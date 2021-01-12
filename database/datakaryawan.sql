-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 03.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakaryawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_karyawan`
--

CREATE TABLE `dt_karyawan` (
  `Nama` varchar(100) NOT NULL,
  `Idkaryawan` char(6) NOT NULL,
  `Gaji` int(11) NOT NULL,
  `LokasiKerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_karyawan`
--

INSERT INTO `dt_karyawan` (`Nama`, `Idkaryawan`, `Gaji`, `LokasiKerja`) VALUES
('Haykal Gibran Hakim', 'A001', 1300000, 'Cabang 1'),
('Abyakta', 'A002', 600000, 'CABANG 5'),
('Ihsan', 'A003', 500000, 'Cabang 1'),
('Gibran', 'A005', 14, 'Cabang 22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_karyawan`
--
ALTER TABLE `dt_karyawan`
  ADD PRIMARY KEY (`Idkaryawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
