-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2022 at 05:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `harga_barang` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `unit`, `harga_barang`) VALUES
('BGR001', 'Laptop Asser', 'PCS', '12000000'),
('BGR002', 'Kabel VGA', 'PCS', '345000');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` varchar(50) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`) VALUES
('DVS001', 'IT'),
('DVS002', 'PPIC');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_asset`
--

CREATE TABLE `inventaris_asset` (
  `id` int(11) NOT NULL,
  `kode_inventaris` varchar(50) NOT NULL,
  `sn_inventaris` varchar(50) NOT NULL,
  `id_karyawan_user` varchar(25) NOT NULL,
  `id_karyawan_pic` varchar(25) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_kota` varchar(50) NOT NULL,
  `divisi_id` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris_asset`
--

INSERT INTO `inventaris_asset` (`id`, `kode_inventaris`, `sn_inventaris`, `id_karyawan_user`, `id_karyawan_pic`, `id_barang`, `id_jenis`, `status`, `tgl_pinjam`, `tgl_kembali`, `id_kota`, `divisi_id`, `keterangan`) VALUES
(1, 'YTP/INV/IT/19/001', 'CT19129001', '191011450285', '191011450345', 'BGR001', 'JNS001', 'normal', '2022-10-15', '2022-10-31', 'KTA001', 'DVS001', ''),
(2, 'YTP/INV/IT/19/002', 'CT1919822', '283874432', '191011450345', 'BGR002', 'JNS002', 'Normal', '2022-10-14', '2022-10-30', 'KTA002', 'DVS002', 'Keperluan Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
('JBT001', 'Manager'),
('JBT002', 'Staff Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(12) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `id_divisi` varchar(50) NOT NULL,
  `status` varchar(17) NOT NULL,
  `id_jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `jenis_kelamin`, `id_divisi`, `status`, `id_jabatan`, `alamat`, `email`, `no_tlp`) VALUES
('191011450285', 'Mila Amelia', 'Perempuan', 'DVS001', 'Tetap', 'JBT001', 'Jon cilobak', 'milaamelia.119@gmail.com', '08779308324'),
('191011450345', 'Hanief ', 'Laki-Laki', 'DVS002', 'Karyawan Kontrak', 'JBT002', 'Tes1', 'hanief@gmail.com', '08934836242'),
('283874432', 'Nani', 'Perempuan', 'DVS002', 'Karyawan Tetap', 'JBT002', 'tes', 'nana@gmail.com', '08934836242');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` varchar(50) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
('KTA001', 'Depok'),
('KTA002', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(3, 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kode_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`kode_jenis`, `nama_jenis`) VALUES
('JNS001', 'Kompter'),
('JNS002', 'VGA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_asset`
--
ALTER TABLE `inventaris_asset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis` (`id_jenis`),
  ADD KEY `fk_karyawan_pic` (`id_karyawan_pic`),
  ADD KEY `fk_karyawan_user` (`id_karyawan_user`),
  ADD KEY `fk_barang` (`id_barang`),
  ADD KEY `fk_kota` (`id_kota`),
  ADD KEY `fk_divisi_id` (`divisi_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_divisi` (`id_divisi`),
  ADD KEY `fk_jabatan` (`id_jabatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventaris_asset`
--
ALTER TABLE `inventaris_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris_asset`
--
ALTER TABLE `inventaris_asset`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_divisi_id` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`),
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`kode_jenis`),
  ADD CONSTRAINT `fk_karyawan_pic` FOREIGN KEY (`id_karyawan_pic`) REFERENCES `karyawan` (`nik`),
  ADD CONSTRAINT `fk_karyawan_user` FOREIGN KEY (`id_karyawan_user`) REFERENCES `karyawan` (`nik`),
  ADD CONSTRAINT `fk_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`),
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
