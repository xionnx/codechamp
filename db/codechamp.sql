-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 08:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codechamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `gambar_artikel` varchar(128) NOT NULL,
  `judul_artikel` varchar(128) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_unggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `gambar_artikel`, `judul_artikel`, `isi_artikel`, `id_materi`, `id_user`, `tanggal_unggah`) VALUES
(1, 'artikel_1716737279.jpg', 'Apa itu html?', '<p><strong>HyperText Markup Language</strong> adalah bahasa markah standar untuk dokumen yang dirancang untuk ditampilkan di peramban internet. Ini dapat dibantu oleh teknologi seperti Cascading Style Sheets dan bahasa skrip lainnya seperti JavaScript, VBScript, dan PHP.</p>\r\n', 1, 2, '2024-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(5) NOT NULL,
  `id_peserta` int(5) NOT NULL,
  `id_soal_ujian` int(5) NOT NULL,
  `jawaban` varchar(15) NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `kode_materi` varchar(10) NOT NULL,
  `nama_materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `kode_materi`, `nama_materi`) VALUES
(1, '001', 'HTML'),
(2, '002', 'PHP'),
(3, '003', 'Git'),
(4, '004', 'Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_kursus` tinyint(1) NOT NULL,
  `status_kursus_kursus` int(11) NOT NULL,
  `benar` varchar(20) NOT NULL,
  `salah` varchar(20) NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_materi`
--

CREATE TABLE `soal_materi` (
  `id_soal_materi` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `kunci_jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `soal_materi`
--

INSERT INTO `soal_materi` (`id_soal_materi`, `id_materi`, `pertanyaan`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`) VALUES
(2, 1, '<p>Tag HTML mana yang digunakan untuk membuat paragraf?</p>\r\n', 'Tag p', 'Tag h1', 'Tag br', 'Tag div', 'Semua Benar', 'A'),
(3, 1, '<p>Apa kepanjangan dari HTML?</p>\r\n', 'HyperText Markup Language', 'HighText Machine Language', 'Ringan tangan', 'HyperText and Links Markup Language', 'HyperTool Markup Language', 'A'),
(19, 1, '<p>Tag HTML mana yang digunakan untuk menampilkan gambar?</p>\r\n', 'Tag img', 'Tag picture', 'Tag image', 'Tag graphic', 'Semua Benar', 'A'),
(20, 1, '<p>Atribut HTML mana yang digunakan untuk menentukan URL dari gambar dalam tag <code>&lt;img&gt;</code>?</p>\r\n', 'href', 'src', 'link', 'url', 'Semua Benar', 'B'),
(21, 1, '<p>Tag HTML mana yang digunakan untuk membuat hyperlink?</p>\r\n', 'Tag a', 'Tag link', 'Tag href', 'Tag nav', 'Semua Benar', 'A'),
(22, 3, '<p>Apa itu Git?</p>\r\n', 'Sebuah bahasa pemrograman', 'Sistem manajemen basis data', 'Sistem kontrol versi terdistribusi', 'Sebuah framework untuk pengembangan web', 'Semua Benar', 'C'),
(23, 3, '<p>Perintah apa yang digunakan untuk membuat repositori baru di Git?</p>\r\n', 'git create', 'git init', 'git start', 'git new', 'Semua Benar', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1. Admin, 2. Tutor, 3. User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama_user`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'Admin Kel 13', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'd@gmail.com', 'Muhamad Khadaffy', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(3, 'm@gmail.com', 'Muhammad Aditya', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(4, 'tutor@gmail.com', 'Tutor Kel 13', '7426d5652f54759e70b8d4ed5dff7757', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal_ujian` (`id_soal_ujian`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_matakuliah` (`id_materi`),
  ADD KEY `id_mahasiswa` (`id_user`);

--
-- Indexes for table `soal_materi`
--
ALTER TABLE `soal_materi`
  ADD PRIMARY KEY (`id_soal_materi`),
  ADD KEY `id_matakuliah` (`id_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal_materi`
--
ALTER TABLE `soal_materi`
  MODIFY `id_soal_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
