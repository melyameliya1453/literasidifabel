-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 08:54 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_literatur`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id_anggota` int(8) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `tgl_lahir` int(10) NOT NULL,
  `bulan_lahir` varchar(100) NOT NULL,
  `tahun_lahir` int(8) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id_anggota`, `nama_anggota`, `tgl_lahir`, `bulan_lahir`, `tahun_lahir`, `jk`, `alamat`, `nama_kelas`) VALUES
(1, 'Setiawan', 3, 'Juni', 1985, 'L', 'Jalan mekar sari', 'Dongeng'),
(7, 'Iis Permata', 27, 'Agustus', 1995, 'P', 'Puncak Bogor', 'Dongeng'),
(6, 'Heru Permana', 17, 'April', 2002, 'L', 'Cempaka', 'Dongeng'),
(8, 'Dwi Usi', 15, 'April', 2007, 'P', 'Menteng', 'Laskar'),
(9, 'Maman Cui', 26, 'Juni', 1993, 'L', 'Lembang', 'Hompimpa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelas`
--

CREATE TABLE `jenis_kelas` (
  `id_jenis_kelas` int(8) NOT NULL,
  `nama_jenis_kelas` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelas`
--

INSERT INTO `jenis_kelas` (`id_jenis_kelas`, `nama_jenis_kelas`, `keterangan`) VALUES
(1, 'Dongeng', 'kelas dongeng'),
(2, 'Laskar', 'kelas laskar'),
(16, 'Pelangi', 'kelas pelangi'),
(15, 'Gambreng', 'kelas gambreng'),
(14, 'Hompimpa', 'kelas hompimpa');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(200) NOT NULL,
  `penulis_komentar` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` varchar(100) NOT NULL,
  `id_post` int(100) NOT NULL,
  `pp_penulis` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `lihat_komentar` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `penulis_komentar`, `isi_komentar`, `tanggal_komentar`, `id_post`, `pp_penulis`, `penulis_post`, `lihat_komentar`) VALUES
(105, 'abdullah', '1000 dapet 3 mangkok', '14:00 06/07/2018', 26, '20180706_130536Screenshot_5.png', 'abdullah', 1),
(106, 'abdullah', 'bisa aja gw', '14:01 06/07/2018', 27, '20180706_130536Screenshot_5.png', 'abdullah', 1),
(107, 'abdullah', 'hehe', '13:21 07/07/2018', 28, '20180706_130536Screenshot_5.png', 'mawar', 1),
(108, 'mawar', 'wat?', '13:21 07/07/2018', 28, '20180707_74940pp (1).jpg', 'mawar', 1),
(104, 'abdullah', 'itu bubur om', '14:00 06/07/2018', 26, '20180706_130536Screenshot_5.png', 'abdullah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(200) NOT NULL,
  `judul_post` varchar(200) NOT NULL,
  `isi_post` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `gambar_post` text NOT NULL,
  `suka_post` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `judul_post`, `isi_post`, `penulis_post`, `tanggal_post`, `gambar_post`, `suka_post`) VALUES
(27, 'Ini topik kedua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'abdullah', '14:01 06/07/2018', '20180706_140129038e2962-b46c-40e0-84b7-c43717f11a41.jpg', 2),
(26, 'Topik pertama ini', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'abdullah', '14:00 06/07/2018', '20180706_1400028acf3d3d-5718-4a75-9b51-13a0007db42b.jpg', 2),
(28, 'Aku membuat topik', 'disini ditulis deskripsi', 'mawar', '7:48 07/07/2018', '20180707_74858eeef368f-52cc-4ead-a2ea-77b0b9930c90.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suka_post`
--

CREATE TABLE `suka_post` (
  `id_suka` bigint(20) UNSIGNED NOT NULL,
  `user_suka` varchar(100) NOT NULL,
  `id_post` int(200) NOT NULL,
  `post_suka` int(5) NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_suka` varchar(100) NOT NULL,
  `lihat_suka` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suka_post`
--

INSERT INTO `suka_post` (`id_suka`, `user_suka`, `id_post`, `post_suka`, `penulis_post`, `tanggal_suka`, `lihat_suka`) VALUES
(77, 'mawar', 26, 1, 'abdullah', '7:49 07/07/2018', 1),
(76, 'mawar', 28, 1, 'mawar', '7:49 07/07/2018', 1),
(75, 'abdullah', 26, 1, 'abdullah', '14:02 06/07/2018', 1),
(74, 'abdullah', 27, 1, 'abdullah', '14:02 06/07/2018', 1),
(78, 'mawar', 27, 1, 'abdullah', '7:49 07/07/2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_user` varchar(100) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk_user` varchar(50) NOT NULL,
  `tanggal_lahir_user` varchar(2) NOT NULL,
  `bulan_lahir_user` varchar(50) NOT NULL,
  `tahun_lahir_user` varchar(4) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `pp_user` text NOT NULL,
  `tanggal_login_user` varchar(100) NOT NULL,
  `bio_user` text NOT NULL,
  `hp_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `level_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_user`, `pass_user`, `nama_user`, `jk_user`, `tanggal_lahir_user`, `bulan_lahir_user`, `tahun_lahir_user`, `status_user`, `pp_user`, `tanggal_login_user`, `bio_user`, `hp_user`, `alamat_user`, `level_user`) VALUES
('abdullah', 'abdullah', 'Abdul Rahman', 'Pria', '1', 'April', '1983', 'Offline', '20180706_130536Screenshot_5.png', '13:21 07/07/2018', '                                           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam                                                            ', '08971158242', 'Jalan Raya Subang Bandung KM 1102                    ', 1),
('mawar', 'mawar', 'Mawar merah', 'P', '15', 'Oktober', '1993', 'Offline', '20180707_74940pp (1).jpg', '13:21 07/07/2018', 'Harum sekali', '084566578512', 'Griya Bandung Indah', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  ADD PRIMARY KEY (`id_jenis_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `suka_post`
--
ALTER TABLE `suka_post`
  ADD PRIMARY KEY (`id_suka`),
  ADD UNIQUE KEY `id_suka` (`id_suka`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id_anggota` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  MODIFY `id_jenis_kelas` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `suka_post`
--
ALTER TABLE `suka_post`
  MODIFY `id_suka` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
