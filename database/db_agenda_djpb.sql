-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 08:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agenda_djpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(255) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `waktu_agenda` time NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `mengundang_pak_kanwil` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_agenda`, `tanggal_agenda`, `waktu_agenda`, `penanggung_jawab`, `via`, `ruang`, `mengundang_pak_kanwil`, `status`) VALUES
(1, 'Agenda 1', '2023-01-03', '04:21:27', 'Pak Ini', 'Online', 'Di Sana', 'Mengundang Pak Kanwil', 'Belum Berlangsung'),
(2, 'Agenda 2', '2023-01-04', '11:21:39', 'Pak Itu', 'Offline', 'Di Situ', 'Tidak Mengundang Pak Kanwil', 'Sudah Berlangsung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
