-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2026 pada 13.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`) VALUES
(1, 'Dr. Tirta Mandira Yudhi', 'Dokter Umum'),
(2, 'Dr. Sinta Maharani', 'Dokter Gigi'),
(3, 'Dr. Budi Santoso', 'Dokter Anak'),
(4, 'Dr. Rina Wijaya', 'Dokter Kandungan'),
(5, 'Dr. Dedi Kurniawan', 'Dokter Penyakit Dalam'),
(6, 'Dr. Gia Pratama Putra', 'Dokter Kulit'),
(7, 'Dr. Agus Saputra', 'Dokter Saraf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `kuota`) VALUES
(1, 1, 'Senin', '08:00:00', '12:00:00', 10),
(2, 1, 'Selasa', '08:00:00', '12:00:00', 10),
(3, 1, 'Rabu', '08:00:00', '12:00:00', 10),
(4, 1, 'Kamis', '08:00:00', '12:00:00', 10),
(5, 1, 'Jumat', '08:00:00', '11:00:00', 8),
(6, 1, 'Sabtu', '08:00:00', '11:00:00', 8),
(7, 1, 'Minggu', '09:00:00', '11:00:00', 6),
(8, 2, 'Senin', '13:00:00', '17:00:00', 8),
(9, 2, 'Selasa', '13:00:00', '17:00:00', 8),
(10, 2, 'Rabu', '13:00:00', '17:00:00', 8),
(11, 2, 'Kamis', '13:00:00', '17:00:00', 8),
(12, 2, 'Jumat', '13:00:00', '16:00:00', 6),
(13, 2, 'Sabtu', '10:00:00', '14:00:00', 6),
(14, 2, 'Minggu', '00:00:00', '00:00:00', 0),
(15, 3, 'Senin', '09:00:00', '12:00:00', 10),
(16, 3, 'Selasa', '09:00:00', '12:00:00', 10),
(17, 3, 'Rabu', '09:00:00', '12:00:00', 10),
(18, 3, 'Kamis', '09:00:00', '12:00:00', 10),
(19, 3, 'Jumat', '09:00:00', '11:00:00', 8),
(20, 3, 'Sabtu', '09:00:00', '11:00:00', 8),
(21, 3, 'Minggu', '00:00:00', '00:00:00', 0),
(22, 4, 'Senin', '14:00:00', '18:00:00', 6),
(23, 4, 'Selasa', '14:00:00', '18:00:00', 6),
(24, 4, 'Rabu', '14:00:00', '18:00:00', 6),
(25, 4, 'Kamis', '14:00:00', '18:00:00', 6),
(26, 4, 'Jumat', '14:00:00', '17:00:00', 5),
(27, 4, 'Sabtu', '10:00:00', '13:00:00', 5),
(28, 4, 'Minggu', '00:00:00', '00:00:00', 0),
(29, 5, 'Senin', '10:00:00', '14:00:00', 8),
(30, 5, 'Selasa', '10:00:00', '14:00:00', 8),
(31, 5, 'Rabu', '10:00:00', '14:00:00', 8),
(32, 5, 'Kamis', '10:00:00', '14:00:00', 8),
(33, 5, 'Jumat', '10:00:00', '13:00:00', 6),
(34, 5, 'Sabtu', '09:00:00', '12:00:00', 6),
(35, 5, 'Minggu', '00:00:00', '00:00:00', 0),
(36, 6, 'Senin', '15:00:00', '19:00:00', 6),
(37, 6, 'Selasa', '15:00:00', '19:00:00', 6),
(38, 6, 'Rabu', '15:00:00', '19:00:00', 6),
(39, 6, 'Kamis', '15:00:00', '19:00:00', 6),
(40, 6, 'Jumat', '15:00:00', '18:00:00', 5),
(41, 6, 'Sabtu', '10:00:00', '13:00:00', 5),
(42, 6, 'Minggu', '00:00:00', '00:00:00', 0),
(43, 7, 'Senin', '13:00:00', '16:00:00', 5),
(44, 7, 'Selasa', '13:00:00', '16:00:00', 5),
(45, 7, 'Rabu', '13:00:00', '16:00:00', 5),
(46, 7, 'Kamis', '13:00:00', '16:00:00', 5),
(47, 7, 'Jumat', '13:00:00', '15:00:00', 4),
(48, 7, 'Sabtu', '09:00:00', '12:00:00', 4),
(49, 7, 'Minggu', '00:00:00', '00:00:00', 0),
(50, 1, 'Senin', '08:00:00', '12:00:00', 10),
(51, 1, 'Selasa', '08:00:00', '12:00:00', 10),
(52, 1, 'Rabu', '08:00:00', '12:00:00', 10),
(53, 1, 'Kamis', '08:00:00', '12:00:00', 10),
(54, 1, 'Jumat', '08:00:00', '11:00:00', 8),
(55, 1, 'Sabtu', '08:00:00', '11:00:00', 8),
(56, 1, 'Minggu', '09:00:00', '11:00:00', 6),
(57, 2, 'Senin', '13:00:00', '17:00:00', 8),
(58, 2, 'Selasa', '13:00:00', '17:00:00', 8),
(59, 2, 'Rabu', '13:00:00', '17:00:00', 8),
(60, 2, 'Kamis', '13:00:00', '17:00:00', 8),
(61, 2, 'Jumat', '13:00:00', '16:00:00', 6),
(62, 2, 'Sabtu', '10:00:00', '14:00:00', 6),
(63, 2, 'Minggu', '00:00:00', '00:00:00', 0),
(64, 3, 'Senin', '09:00:00', '12:00:00', 10),
(65, 3, 'Selasa', '09:00:00', '12:00:00', 10),
(66, 3, 'Rabu', '09:00:00', '12:00:00', 10),
(67, 3, 'Kamis', '09:00:00', '12:00:00', 10),
(68, 3, 'Jumat', '09:00:00', '11:00:00', 8),
(69, 3, 'Sabtu', '09:00:00', '11:00:00', 8),
(70, 3, 'Minggu', '00:00:00', '00:00:00', 0),
(71, 4, 'Senin', '14:00:00', '18:00:00', 6),
(72, 4, 'Selasa', '14:00:00', '18:00:00', 6),
(73, 4, 'Rabu', '14:00:00', '18:00:00', 6),
(74, 4, 'Kamis', '14:00:00', '18:00:00', 6),
(75, 4, 'Jumat', '14:00:00', '17:00:00', 5),
(76, 4, 'Sabtu', '10:00:00', '13:00:00', 5),
(77, 4, 'Minggu', '00:00:00', '00:00:00', 0),
(78, 5, 'Senin', '10:00:00', '14:00:00', 8),
(79, 5, 'Selasa', '10:00:00', '14:00:00', 8),
(80, 5, 'Rabu', '10:00:00', '14:00:00', 8),
(81, 5, 'Kamis', '10:00:00', '14:00:00', 8),
(82, 5, 'Jumat', '10:00:00', '13:00:00', 6),
(83, 5, 'Sabtu', '09:00:00', '12:00:00', 6),
(84, 5, 'Minggu', '00:00:00', '00:00:00', 0),
(85, 6, 'Senin', '15:00:00', '19:00:00', 6),
(86, 6, 'Selasa', '15:00:00', '19:00:00', 6),
(87, 6, 'Rabu', '15:00:00', '19:00:00', 6),
(88, 6, 'Kamis', '15:00:00', '19:00:00', 6),
(89, 6, 'Jumat', '15:00:00', '18:00:00', 5),
(90, 6, 'Sabtu', '10:00:00', '13:00:00', 5),
(91, 6, 'Minggu', '00:00:00', '00:00:00', 0),
(92, 7, 'Senin', '13:00:00', '16:00:00', 5),
(93, 7, 'Selasa', '13:00:00', '16:00:00', 5),
(94, 7, 'Rabu', '13:00:00', '16:00:00', 5),
(95, 7, 'Kamis', '13:00:00', '16:00:00', 5),
(96, 7, 'Jumat', '13:00:00', '15:00:00', 4),
(97, 7, 'Sabtu', '09:00:00', '12:00:00', 4),
(98, 7, 'Minggu', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi_id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservasi_id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
