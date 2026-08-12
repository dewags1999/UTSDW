-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2026 pada 03.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampusstikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_table`
--

CREATE TABLE `mahasiswa_table` (
  `NIM` varchar(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `KODE_JURUSAN` varchar(10) NOT NULL,
  `GENDER` enum('L','P') NOT NULL,
  `TEMPAT` varchar(50) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` text NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NO_HP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa_table`
--
ALTER TABLE `mahasiswa_table`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
