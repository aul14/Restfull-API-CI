-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 05:58 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpengaduan_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_sesi`
--

CREATE TABLE IF NOT EXISTS `detail_sesi` (
  `sesi_status` tinyint(1) NOT NULL,
  `sesi_nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_sesi`
--

INSERT INTO `detail_sesi` (`sesi_status`, `sesi_nama`) VALUES
(1, 'Login'),
(9, 'Logout');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE IF NOT EXISTS `sesi` (
`id_sesi` int(11) NOT NULL,
  `sesi_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sesi_key` varchar(64) DEFAULT NULL,
  `sesi_device` varchar(64) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `sesi_logout` datetime DEFAULT '0000-00-00 00:00:00',
  `sesi_status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `sesi_time`, `sesi_key`, `sesi_device`, `id_user`, `sesi_logout`, `sesi_status`) VALUES
(1, '2020-02-02 12:16:00', 'd45c39d1fe25bb452c8db05059bc1db3', '00000000-3dcd-2a3b-ffff-ffffad32ce91', 10, '2020-02-02 19:17:13', 9),
(2, '2020-02-02 12:17:13', 'd51f9cbf069fdf1c922d51ce056090c9', '00000000-3dcd-2a3b-ffff-ffffad32ce91', 10, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE IF NOT EXISTS `tbl_instansi` (
`id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `nama_instansi`) VALUES
(1, '- Pilih Instansi -'),
(2, 'Dinas Tata Ruang'),
(3, 'Dinas Kependudukan dan Catatan Sipil'),
(4, 'Dinas Lingkungan'),
(5, 'Badan Pendapatan Daerah'),
(6, 'Dinas Bina Marga dan Sumber daya Air'),
(7, 'Dinas Perhubungan'),
(8, 'Dinas Kesehatan'),
(9, 'Satuan Polisi Pamong Praja'),
(10, 'Dinas Komunikasi, Informatika, Statistik dan Persandian'),
(11, 'PDAM Tirta Patriot'),
(12, 'Dinas Perdagangan dan Perindustrian'),
(13, 'Dinas Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE IF NOT EXISTS `tbl_pengaduan` (
`id_pengaduan` int(11) NOT NULL,
  `judul_pengaduan` varchar(50) NOT NULL,
  `isi_pengaduan` varchar(450) NOT NULL,
  `lokasi_pengaduan` varchar(50) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saran_pengaduan` varchar(255) NOT NULL,
  `gambar_pengaduan` varchar(100) NOT NULL,
  `tanggal_pengaduan` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `judul_pengaduan`, `isi_pengaduan`, `lokasi_pengaduan`, `nama_instansi`, `id_user`, `saran_pengaduan`, `gambar_pengaduan`, `tanggal_pengaduan`) VALUES
(1, 'Sampah numpuk di sungai', 'Harap dinas terkait langsung menindak lanjuti sampah yg numpuk di sungai', 'Bekasi Timur', 'Dinas Lingkungan', 2, 'Harap ditindak dengan tegas', 'cropped7605372493597263228.jpg', '2019-12-10 11:28:39'),
(2, 'Test ngadu', 'Hanyaa nyoba cyk', 'Bekasi', 'Dinas Perhubungan', 10, 'kepo luu', 'cropped5034743877976834714.jpg', '2020-02-02 22:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
`id_status` int(11) NOT NULL,
  `status_nama` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status_nama`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggapan`
--

CREATE TABLE IF NOT EXISTS `tbl_tanggapan` (
`id_tanggapan` int(11) NOT NULL,
  `nama_menanggapi` varchar(30) NOT NULL,
  `isi_tanggapan` varchar(100) NOT NULL,
  `tanggal_tanggapan` datetime NOT NULL,
  `id_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `user_nama` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(260) NOT NULL,
  `user_hp` varchar(15) NOT NULL,
  `id_status` int(11) NOT NULL,
  `user_register` datetime NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user_nama`, `user_email`, `user_password`, `user_hp`, `id_status`, `user_register`, `keterangan`, `ip_address`) VALUES
(1, 'Aul Rahman', 'aul@gmail.com', '$2y$10$xGs.4Wi4iNUozPwrik.FoOfITuYtiQre8.xoMe6MErYoGMj8Tty66', '081398576895', 3, '2019-12-17 11:38:57', 'Daftar dengan manual', '192.168.43.24'),
(3, 'adit', 'adit@gmail.com', '$2y$10$8u4bfdDO/dbf9iH5/UcRhOLaKACXZPRVYH2wZS6Bem5pWo6LbJNy.', '0878847857687', 1, '2019-12-17 12:05:52', 'Daftar dengan manual', '::1'),
(5, 'Jono aja', 'jono@gmail.com', '$2y$10$mKxn9Nm82ckFk3Jba7d6BuH5MA.5LpaIhGaXjt8FZkBMusT0SZa/S', '0898487485875', 1, '2019-12-22 23:21:27', 'Daftar dengan manual', '::1'),
(9, 'coba', 'coba@gmail.com', '$2y$10$fz3P0Io6pUGkfl0kh33eI.UxNcWSnmnse7AJrLvzWJcZhAEQU91Ce', '6294586768796', 1, '2020-02-02 19:09:09', 'Daftar dengan manual', '::1'),
(10, 'silki dini', 'silki@gmail.com', '$2y$10$Dplr3YfCymeYSYICbRgO2eaUYEKjExBQYeo9Ls4NQbAiA93QgWxTa', '6249464664675', 2, '2020-02-02 19:15:44', 'Daftar dengan manual', '192.168.43.132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_sesi`
--
ALTER TABLE `detail_sesi`
 ADD PRIMARY KEY (`sesi_status`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
 ADD PRIMARY KEY (`id_sesi`) USING BTREE, ADD KEY `fk_sesi_user1_idx` (`id_user`) USING BTREE;

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
 ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
 ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
 ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
