-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2025 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `kode` varchar(40) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `kode`, `nama_admin`) VALUES
(1, 'KODE1', 'Mhmd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int NOT NULL,
  `kode` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('offline','online') NOT NULL,
  `proses` enum('aktif','non-aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `kode`, `username`, `password`, `level`, `status`, `proses`) VALUES
(1, 'KODE1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'offline', 'aktif'),
(2, 'KODE2', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user', 'offline', 'aktif'),
(5, 'USE-0004', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user', 'online', 'aktif'),
(6, 'USE-0005', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user', 'offline', 'aktif'),
(7, 'USE-0006', 'user5', '0a791842f52a0acfbb3a783378c066b8', 'user', 'offline', 'aktif'),
(8, 'USE-0007', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user', 'offline', 'aktif'),
(9, 'USE-0008', 'user6', 'affec3b64cf90492377a8114c86fc093', 'user', 'offline', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int NOT NULL,
  `id_user` int NOT NULL,
  `judul_pengaduan` varchar(255) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `gambar_pengaduan` varchar(255) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `id_user`, `judul_pengaduan`, `isi_pengaduan`, `gambar_pengaduan`, `tgl_pengaduan`) VALUES
(16, 3, 'a', 'a', '', '2025-04-03 23:14:09'),
(18, 1, 'as', 'asasa', 'ISC2.png', '2025-04-03 23:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int NOT NULL,
  `id_admin` int NOT NULL,
  `id_pengaduan` int NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `tgl_tanggapan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `kode` varchar(40) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `kode`, `nama_user`, `pekerjaan`, `email`, `no_hp`, `foto`) VALUES
(1, 'KODE2', 'Mahmudi', 'Mahasiswa', 'mahmudi@gmail.com', '081111111111', 'LogoMhmd.jpg'),
(3, 'USE-0004', 'Neymar', 'Pemain Bola', 'neymar@gmail.com', '0998888', 'LogoUnsulbarpng.png'),
(4, 'USE-0005', 'Ronaldo', '', 'ronaldo@gmail.com', '', ''),
(5, 'USE-0006', 'Messi', '', 'messi@gmail.com', '', ''),
(6, 'USE-0007', 'Mudi', 'Mhs', 'mudi@gmail.com', '000000', 'ISC.jpg'),
(7, 'USE-0008', 'Anu', '', 'anu@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_follow`
--

CREATE TABLE `tb_user_follow` (
  `id` int NOT NULL,
  `kode` varchar(40) NOT NULL,
  `following` varchar(40) NOT NULL,
  `subscribed` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user_follow`
--

INSERT INTO `tb_user_follow` (`id`, `kode`, `following`, `subscribed`) VALUES
(4, 'KODE2', 'USE-0004', '2025-04-03 15:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_follow`
--
ALTER TABLE `tb_user_follow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user_follow`
--
ALTER TABLE `tb_user_follow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
