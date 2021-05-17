-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 07:03 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan_ponpes_alhanif`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `telepon`, `email`, `foto`, `Alamat`) VALUES
(1, 'admin', 'admin', 'Rizal Amin', '08996143927  ', 'aminrizal39@gmail.com', 'icon.jpg', 'Jl. Raya Grogol, Kp. Pulo Mangga Rt.02/04 No. 7 Kecamatan Limo Kota Depok');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `kelas`, `alamat`, `status`) VALUES
(1, 'Arya Sutisna', '7.3', 'Jl. Raya Grogol Kp.Pulo Pulo Mangga Rt.02/04 No.7 Kecamatan Limo Kota Depok', 'Aktif'),
(2, 'Amin Rizal', '7.2', 'Jl. Raya Parung Bogor', 'Aktif'),
(5, 'Sultan ', '7.2', 'Depok', 'Aktif'),
(6, 'Rizal Amin', '7.3', 'Jl. Raya Grogol Kp. Pulo Mangga Rt. 02/04 No.7 Kecamatan Limo Kota Depok', 'Aktif'),
(7, 'Zihan Alawiya', '7.3', 'Jl. Raya Meruyung Kecamatan Limo Kota Depok', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi_buku` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi_buku`, `tgl_input`) VALUES
(1, ' Matematika         ', 'Abdul Kadir', '  MediaKom        ', '2017', '  2345678        ', 6, 'Rak 2', '2019-04-21 09:28:29'),
(5, 'Bahasa Indonesia      ', 'Ridwan Kamil', 'asa      ', '2018', ' 4678764      ', 7, 'Rak 3', '2019-06-29 12:35:21'),
(6, 'Pemrogramman Database & MySQL  ', 'Abdul Kadir', 'Mediakom  ', '2014', '123489  ', 4, 'Rak 2', '2019-07-08 04:33:19'),
(7, 'Bahasa Inggris  ', 'Rizal Amin', 'Informatika  ', '2018', '2904722  ', 4, 'Rak 2', '2019-07-16 04:50:40'),
(8, 'Tur', 'Abdul Kadir', 'Mediakom', '2016', '2345678', 2, 'Rak 1', '2019-04-19 05:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` varchar(30) NOT NULL,
  `status` enum('Sedang Dipinjam','Telah Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
