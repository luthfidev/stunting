-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2020 at 08:43 AM
-- Server version: 5.7.27-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskes15_db-ghea`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` enum('ortu','admin','doktor') NOT NULL DEFAULT 'ortu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(8, 'ff', 'ff', ''),
(12, 'perawat_adm', 'perawat01', ''),
(13, 'dokter_adm', 'dokter01', ''),
(14, 'ahligizi_adm', 'ahligizi01', ''),
(15, '202001190004', '19-01-2018', 'ortu');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `no_medisanak` varchar(50) NOT NULL,
  `nama_anak` text NOT NULL,
  `tgllahir_anak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`no_medisanak`, `nama_anak`, `tgllahir_anak`) VALUES
('202001180001', 'dada', 's'),
('202001180002', 'dara', '18-01-2018'),
('202001190003', 'jejen', '19-01-2018'),
('202001190004', 'fadil', '19-01-2018');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(11) NOT NULL,
  `no_medisanak` varchar(50) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `nama_ibu` text NOT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `no_medisanak`, `nama_ayah`, `nik_ayah`, `nama_ibu`, `nik_ibu`, `alamat`) VALUES
(2, '202001180001', 'rama', '1234', 'rami', '12345', 'jogjas'),
(4, '202001180002', 'dana', '12345', 'danas', '12344', 'jogjas'),
(5, '202001190003', 'haha', '123', 'hihi', '1234', 'aa'),
(6, '202001190004', 'kamal', '1234', 'kimil', '1234', 'jogjas');

--
-- Triggers `ortu`
--
DELIMITER $$
CREATE TRIGGER `no_medis_ortu` BEFORE INSERT ON `ortu` FOR EACH ROW begin
if new.no_medisanak is null then
set new.no_medisanak := (
select concat(curdate() + 0,
lpad(ifnull(cast(max(right(no_medisanak, 3)) as unsigned integer),0) +1,4,'0')
) from ortu
);
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengukuran`
--

CREATE TABLE `pengukuran` (
  `id_pengukuran` int(11) NOT NULL,
  `no_medisanak` varchar(50) NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `jenis_kelamin` text NOT NULL,
  `bb_anak` int(11) NOT NULL,
  `tb_anak` int(11) NOT NULL,
  `status_stunting` text NOT NULL,
  `status_gizi` text NOT NULL,
  `tanggal_pengukuran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengukuran`
--

INSERT INTO `pengukuran` (`id_pengukuran`, `no_medisanak`, `usia`, `jenis_kelamin`, `bb_anak`, `tb_anak`, `status_stunting`, `status_gizi`, `tanggal_pengukuran`) VALUES
(1, '202001180001', 12, 'as', 0, 0, '12', '12', '2020-01-13'),
(2, '202001180002', 0, 'Laki-Laki', 30, 120, '', 'Gizi Lebih', '2020-01-18'),
(3, '202001180002', 0, 'Laki-Laki', 25, 110, 'Stunting', 'Gizi Lebih', '2020-01-19'),
(4, '202001190003', 0, 'Laki-Laki', 25, 110, '', 'Gizi Lebih', '2020-01-19'),
(5, '202001190004', 0, 'Laki-Laki', 30, 120, '', 'Gizi Lebih', '2020-01-19'),
(6, '202001190004', 0, 'Laki-Laki', 30, 120, 'Stunting', 'Gizi Lebih', '2020-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `temp_anak`
--

CREATE TABLE `temp_anak` (
  `id_anak` int(11) NOT NULL,
  `no_medisanak` varchar(50) DEFAULT NULL,
  `nama_anak` text NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `umur` varchar(11) DEFAULT NULL,
  `berat` double NOT NULL,
  `tinggi` double NOT NULL,
  `status_stunting` text,
  `status_gizi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_anak`
--

INSERT INTO `temp_anak` (`id_anak`, `no_medisanak`, `nama_anak`, `jk`, `tanggal_lahir`, `umur`, `berat`, `tinggi`, `status_stunting`, `status_gizi`, `tanggal`) VALUES
(2, '202001180001', 'dada', 'as', 's', '12', 0, 0, '12', '12', '2020-01-13'),
(3, '202001180002', 'dara', 'Laki-Laki', '18-01-2018', '', 30, 120, '', 'Gizi lebih', '2020-01-18'),
(4, '202001190003', 'jejen', 'Laki-Laki', '19-01-2018', '', 25, 110, '', 'Gizi lebih', '2020-01-19'),
(5, '202001190004', 'fadil', 'Laki-Laki', '19-01-2018', '', 30, 120, '', 'Gizi lebih', '2020-01-19');

--
-- Triggers `temp_anak`
--
DELIMITER $$
CREATE TRIGGER `insert_admin` AFTER INSERT ON `temp_anak` FOR EACH ROW begin
INSERT INTO admin(username,password
) VALUES (new.no_medisanak, new.tanggal_lahir);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_anak_1` AFTER INSERT ON `temp_anak` FOR EACH ROW begin
INSERT INTO anak(no_medisanak, nama_anak, tgllahir_anak
) VALUES (new.no_medisanak, new.nama_anak, new.tanggal_lahir);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pengukuran` AFTER INSERT ON `temp_anak` FOR EACH ROW begin
INSERT INTO pengukuran(no_medisanak, usia, jenis_kelamin, bb_anak, tb_anak, status_stunting, status_gizi, tanggal_pengukuran) VALUES (new.no_medisanak, new.umur, new.jk, new.berat, new.tinggi, new.status_stunting, new.status_gizi, new.tanggal);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kode_no_medis` BEFORE INSERT ON `temp_anak` FOR EACH ROW begin
if new.no_medisanak is null then
set new.no_medisanak := (
select concat(curdate() + 0,
lpad(ifnull(cast(max(right(no_medisanak, 3)) as unsigned integer),0) +1,4,'0')
) from temp_anak
);
end if;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`no_medisanak`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`id_pengukuran`);

--
-- Indexes for table `temp_anak`
--
ALTER TABLE `temp_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id_pengukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp_anak`
--
ALTER TABLE `temp_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
