-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 12:00 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-ghea`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(5, 'd', 'dsds', 'perawat'),
(7, 'sd', 'sdsd', 'admin'),
(8, 'dsdsdsd', 'asdasd', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `no_medis` varchar(50) DEFAULT NULL,
  `nama_anak` text NOT NULL,
  `jk` varchar(255) NOT NULL,
  `nama_ibu` text NOT NULL,
  `umur` int(11) NOT NULL,
  `berat` double NOT NULL,
  `tinggi` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `no_medis`, `nama_anak`, `jk`, `nama_ibu`, `umur`, `berat`, `tinggi`, `keterangan`, `tanggal`) VALUES
(11, NULL, 'primass', 'Laki-Laki', 'Pis', 202223, 20, 120, 'Gizi Baik', '2019-12-23'),
(12, NULL, 'ss', 'Perempuan', 'ss', 20, 22, 2, 'Gizi Buruk', '2019-12-23'),
(13, NULL, 'sdsd', 'Laki-Laki', 'ss', 20, 22, 120, 'Gizi Baik', '2019-12-24'),
(14, NULL, 'sdsd', 'Laki-Laki', 'ss', 20, 22, 120, 'Gizi Buruk', '2019-12-24'),
(15, NULL, 'sdsd', 'Laki-Laki', 'ss', 20, 22, 120, 'Gizi Buruk', '2019-12-24'),
(16, NULL, 'sdsd', 'Laki-Laki', 'ss', 20, 22, 120, 'Gizi Buruk', '2019-12-24'),
(17, '201912300001', 'ss', 'ss', 'ss', 2, 2, 2, 'dd', '0000-00-00');

--
-- Triggers `anak`
--
DELIMITER $$
CREATE TRIGGER `no_medis` BEFORE INSERT ON `anak` FOR EACH ROW begin
if new.no_medis is null then
set new.no_medis := (
select concat(curdate() + 0,
lpad(ifnull(cast(max(right(no_medis, 3)) as unsigned integer),0) +1,4,'0')
) from anak
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
  ADD PRIMARY KEY (`id_anak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
