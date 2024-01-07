-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 04:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(50) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `nama_tumbnail` varchar(255) NOT NULL,
  `tanggal_terbit` datetime NOT NULL,
  `edit` int(1) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `id_pengguna` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `nama_tumbnail`, `tanggal_terbit`, `edit`, `id_kategori`, `id_pengguna`) VALUES
(27, 'Macan Lepas', 'olahragaTumbnail.png', '2024-01-05 10:02:52', 0, 2, 23000000),
(28, 'honto', 'politikTumbnail.png', '2024-01-05 22:29:36', 0, 1, 23000000),
(29, 'Asu', 'Asu-29jpg', '2024-01-06 14:05:10', 0, 1, 23000000),
(30, 'Asu', 'Asu-30jpg', '2024-01-06 14:06:17', 0, 2, 23000000),
(31, 'Exovalen', 'politikTumbnail.png', '2024-01-06 14:19:56', 0, 1, 23000000),
(32, 'wfwefwefwef', 'politikTumbnail.png', '2024-01-06 14:21:27', 0, 1, 23000000),
(33, 'wfwefwefwef', 'olahragaTumbnail.png', '2024-01-06 14:24:40', 0, 2, 23000000),
(34, 'Henota', 'Henota-34jpg', '2024-01-06 15:54:56', 0, 1, 23000000),
(35, 'Harara', 'Harara-35jpg', '2024-01-06 15:57:58', 0, 1, 23000000),
(36, 'halu', 'halu-36jpg', '2024-01-06 16:08:22', 0, 2, 23000000),
(37, 'dfsdfsdf', 'dfsdfsdf-37.jpg', '2024-01-06 16:13:54', 0, 1, 23000000),
(38, 'Assu', 'Assu-38.jpg', '2024-01-06 16:46:40', 0, 1, 23000000),
(39, 'Assu', 'Assu-39.jpg', '2024-01-06 16:47:39', 0, 1, 23000000),
(40, 'Jadwal Rangkaian Pernikahan Pangeran Abdul Mateen-Anisha Rosnah Selama 10 Hari', 'politikTumbnail.jpg', '2024-01-06 18:59:08', 0, 1, 23000000),
(41, 'Pedri Sindir Orang-orang yang Cibir Cristiano Ronaldo', 'politikTumbnail.jpg', '2024-01-06 19:18:06', 0, 1, 23000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Politik'),
(2, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `id_pengguna` int(50) DEFAULT NULL,
  `id_berita` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `isi_komentar`, `tanggal_komentar`, `id_pengguna`, `id_berita`) VALUES
(29, 'Yakin lu dek', '2024-01-06 14:12:17', NULL, 30),
(30, 'Norak Lo semua', '2024-01-06 14:34:29', NULL, 33),
(31, 'Lu ISapap', '2024-01-06 15:15:54', NULL, 33),
(32, 'Asu kau boy\r\n', '2024-01-06 18:52:36', 23000000, 39),
(33, 'Kontol\r\n', '2024-01-06 19:22:47', 23000000, 41);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_reply`
--

CREATE TABLE `komentar_reply` (
  `id_komentar` int(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `id_pengguna` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar_reply`
--

INSERT INTO `komentar_reply` (`id_komentar`, `isi_komentar`, `tanggal_komentar`, `id_pengguna`) VALUES
(29, 'Kontol sok asik', '2024-01-06 14:12:39', NULL),
(30, 'Hontol', '2024-01-06 14:44:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` set('ADMIN','USER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password`, `role`) VALUES
(23000000, 'Icun Gunawan', 'icungunawan@gmail.com', '330b8d964c0b81954959fae0e1b31b56', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `komentar_reply`
--
ALTER TABLE `komentar_reply`
  ADD KEY `reply_id` (`id_komentar`),
  ADD KEY `id_replyer` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23000001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_reply`
--
ALTER TABLE `komentar_reply`
  ADD CONSTRAINT `komentar_reply_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_reply_ibfk_2` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
