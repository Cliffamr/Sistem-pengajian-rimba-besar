-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 04:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_202253120_uas_web`
--
CREATE DATABASE IF NOT EXISTS `db_202253120_uas_web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_202253120_uas_web`;

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

DROP TABLE IF EXISTS `data_jabatan`;
CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Admin', '5000000', '300000', '500000'),
(2, 'Programmer', '9000000', '300000', '500000'),
(3, 'Manager', '15000000', '300000', '500000'),
(4, 'HRD', '9500000', '500000', '200000'),
(5, 'content creator', '6000000', '400000', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

DROP TABLE IF EXISTS `data_karyawan`;
CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(16) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(1, '1111912061', 'Arif Maulana Rokhman', 'arif', '25d55ad283aa400af464c76d713c07ad', 'Laki-Laki', 'Manager', '2022-05-01', 'Tetap', 'kharisma.png', 1),
(2, '112233445566', 'Axeline', 'admin', '550e1bafe077ff0b0b67f4e32f29d751', 'Perempuan', 'Admin', '2022-05-01', 'Tidak Tetap', 'axeline.png', 1),
(3, '9988776655', 'Budi', 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'Laki-Laki', 'Programmer', '2022-05-01', 'Tetap', 'budi.png', 2),
(4, '1203912301293', 'faris', 'fariss', '25d55ad283aa400af464c76d713c07ad', 'Laki-Laki', 'content creator', '2024-06-27', 'Tetap', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

DROP TABLE IF EXISTS `data_kehadiran`;
CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(1, '052022', '112233445566', 'Axeline', 'Perempuan', 'Admin', 15, 3, 2),
(2, '052022', '9988776655', 'Budi', 'Laki-Laki', 'Programmer', 10, 5, 5),
(3, '052022', '1111912061', 'Kharisma Aufa', 'Laki-Laki', 'Manager', 19, 1, 0),
(4, '032022', '112233445566', 'Axeline', 'Perempuan', 'Admin', 10, 0, 0),
(5, '032022', '9988776655', 'Budi', 'Laki-Laki', 'Programmer', 10, 0, 0),
(6, '032022', '1111912061', 'Kharisma Aufa', 'Laki-Laki', 'Manager', 10, 0, 0),
(7, '042022', '112233445566', 'Axeline', 'Perempuan', 'Admin', 15, 0, 0),
(8, '042022', '9988776655', 'Budi', 'Laki-Laki', 'Programmer', 15, 0, 0),
(9, '042022', '1111912061', 'Kharisma Aufa', 'Laki-Laki', 'Manager', 15, 0, 0),
(10, '062024', '112233445566', 'Axeline', 'Perempuan', 'Admin', 28, 0, 1),
(11, '062024', '9988776655', 'Budi', 'Laki-Laki', 'Programmer', 0, 0, 0),
(12, '062024', '1111912061', 'Kharisma Aufa', 'Laki-Laki', 'Manager', 0, 0, 0),
(13, '072024', '1111912061', 'Arif Maulana Rokhman', 'Laki-Laki', 'Manager', 25, 0, 4),
(14, '072024', '112233445566', 'Axeline', 'Perempuan', 'Admin', 28, 0, 2),
(15, '072024', '9988776655', 'Budi', 'Laki-Laki', 'Programmer', 29, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'karyawan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

DROP TABLE IF EXISTS `potongan_gaji`;
CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(1, 'Alpha', 100000),
(4, 'Sakit', 50000),
(5, 'Ijin', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
