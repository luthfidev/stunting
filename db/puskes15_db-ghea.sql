-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2020 at 10:08 PM
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
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(8, 'ff', 'ff', 'admin'),
(12, 'perawat_adm', 'perawat01', 'perawat'),
(13, 'dokter_adm', 'dokter01', 'doktor'),
(14, 'ahligizi_adm', 'ahligizi01', 'doktor');

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
  `tanggal_lahir` varchar(25) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `berat` double NOT NULL,
  `tinggi` double NOT NULL,
  `keterangan` text,
  `status_stunting` text,
  `status_gizi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `no_medis`, `nama_anak`, `jk`, `nama_ibu`, `tanggal_lahir`, `umur`, `berat`, `tinggi`, `keterangan`, `status_stunting`, `status_gizi`, `tanggal`) VALUES
(5, '202001010003', 'dono', 'Laki-Laki', 'yoni', '12-12-2001', '0', 10, 4, 'Stunting Gizi Kurang', NULL, NULL, '2019-12-15'),
(6, '202001010003', 'Ica', 'Perempuan', 'Dini', '12-12-2001', '0', 15, 44, 'Stunting Gizi Baik', NULL, NULL, '2019-12-15'),
(8, '202001010003', 'ina', 'Perempuan', 'gita', '12-12-2001', '0', 10, 15, 'Stunting Gizi Buruk', NULL, NULL, '2019-12-19'),
(9, '202001010003', 'nana', 'Perempuan', 'ita', '12-12-2001', '0', 10, 44, 'Stunting Gizi Buruk', NULL, NULL, '2019-12-19'),
(10, '202001010003', 'dio', 'Laki-Laki', 'gigi', '12-12-2001', '0', 16, 44, 'Stunting Gizi Baik', NULL, NULL, '2019-12-19'),
(11, '202001010003', 'dido', 'Laki-Laki', 'cici', '13-12-2001', '0', 10, 44, 'Stunting Gizi Buruk', NULL, NULL, '2019-12-20'),
(12, '202001010003', 'ina', 'Perempuan', 'yuyu', '12-12-2001', '0', 10, 44, 'Stunting Gizi Baik', NULL, NULL, '2019-12-20'),
(13, '202001010003', 'iin', 'Perempuan', 'nani', '12-12-2001', '0', 12, 4, 'Stunting Gizi Baik', NULL, NULL, '2019-12-20'),
(21, '202001010003', 'dana', 'Laki-Laki', 'dani', '12-12-2001', '0', 22, 42, 'Gizi lebih', NULL, NULL, '2020-01-01'),
(22, '202001010004', 'fani', 'Laki-Laki', 'fana', '12-12-2001', '0', 21, 42, 'Gizi lebih', NULL, NULL, '2020-01-01'),
(23, '202001020005', 'temen', 'Laki-Laki', 'timin', '12-12-2001', '0', 30, 6, 'Gizi lebih', NULL, NULL, '2020-01-02'),
(27, '202001020009', 'tasa', 'Laki-Laki', 'tisa', '12-12-2001', '12', 20, 42, 'Gizi lebih', NULL, NULL, '2020-01-02'),
(28, '202001020010', 'romo', 'Laki-Laki', 'rami', '12-12-2019', '36', 10, 42, 'Stunting\nGizi Kurang', NULL, NULL, '2020-01-02'),
(29, '202001020011', 'rasa', 'Laki-Laki', 'raso', '12-12-2019', '40', 12, 42, 'Stunting Gizi Baik', NULL, NULL, '2020-01-02'),
(30, '202001020012', 'rasa', 'Laki-Laki', 'raso', '12-12-2019', '40', 20, 42, 'Gizi lebih', NULL, NULL, '2020-02-02'),
(31, '202001020013', 'lana', 'Perempuan', 'gina', '02012017', '36', 10, 44, 'Stunting\nGizi Kurang', NULL, NULL, '2020-01-02'),
(32, '202001070014', 'faza', 'Laki-Laki', 'fazi', '12-12-2009', '40', 24, 42, 'Stunting Gizi lebih', NULL, NULL, '2020-01-07'),
(33, '202001070015', 'rikii', 'Laki-Laki', 'roko', '12-12-2009', '25', 30, 6, 'Stunting Gizi lebih', NULL, NULL, '2020-01-07'),
(34, '202001070016', 'bibit', 'Laki-Laki', 'bobot', '12-12-2019', '12', 25, 6, ' Gizi lebih', NULL, NULL, '2020-01-07'),
(35, '202001080017', 'janat', 'Laki-Laki', 'jono', '12-12-2019', '40', 25, 100, 'Normal Gizi lebih', NULL, NULL, '2020-01-08'),
(36, '202001080018', 'primu', 'Laki-Laki', 'primi', '12-12-2019', '25', 20, 35, 'Stunting Gizi lebih', NULL, NULL, '2020-01-08'),
(37, '202001080019', 'jojo', 'Laki-Laki', 'joko', '12-12-2019', '24', 12, 30, ' Gizi Baik', NULL, NULL, '2020-01-08'),
(38, '202001090020', 'udin', 'Laki-Laki', 'udan', '12-12-2019', '12', 12, 12, ' Gizi Baik', NULL, NULL, '2020-01-09'),
(39, '202001100021', 'kamall', 'Laki-Laki', 'lala', '12-12-2019', '25', 70, 160, 'Stunting Gizi lebih', NULL, NULL, '2020-01-10'),
(40, '202001100022', 'jana', 'Laki-Laki', 'jini', '12-12-2019', '30', 40, 120, NULL, '', 'Gizi lebih', '2020-01-10'),
(41, '202001100023', 'farass', 'Laki-Laki', 'sdas', '12-12-2019', '27', 90, 80, NULL, '', 'Gizi lebih', '2020-01-10'),
(42, '202001100024', 'ss', 'Laki-Laki', 'qq', '12-12-2019', '40', 100, 25, NULL, '', 'Gizi lebih', '2020-01-10'),
(43, '202001100025', 'putras', 'laki laki', 'yati', '12-12-12', '20', 22, 22, NULL, 'normal', 'baik', '2020-01-10'),
(44, '202001100026', 'gg', 'Laki-Laki', 'gg', '12-12-12', '40', 25, 100, NULL, '', 'Gizi lebih', '2020-01-10'),
(45, '202001100027', 'vv', 'Laki-Laki', 'vv', '12-12-2019', '40', 30, 100, NULL, '', 'Gizi lebih', '2020-01-10'),
(46, '202001100028', 'hh', 'Laki-Laki', 'hh', '12-12-2019', '40', 12, 100, NULL, 'Stunting', 'Gizi Baik', '2020-01-10'),
(47, '202001100029', 'hh', 'Laki-Laki', 'hh', '2000', '20', 20, 100, NULL, '', 'Gizi lebih', '2020-01-10'),
(48, '202001100030', 'jk', 'Laki-Laki', 'jkk', '1999', '10', 30, 120, NULL, '', 'Gizi lebih', '2020-01-10'),
(49, '202001100031', 'fafa', 'Laki-Laki', 'faf', '1998', '10', 20, 100, NULL, '', 'Gizi lebih', '2020-01-10'),
(50, '202001100032', 'jiji', 'Laki-Laki', '222', '1982', '10', 30, 120, NULL, 'Stunting', 'Gizi lebih', '2020-01-10'),
(51, '202001100033', 'jkww', 'Laki-Laki', 'dssd', '1978', '20', 30, 120, NULL, 'Stunting', 'Gizi lebih', '2020-01-10'),
(52, '202001100034', 'gali', 'Laki-Laki', 'golo', '01-11-2018', '21', 25, 100, NULL, '', '', '2020-01-10'),
(53, '202001100035', 'santo', 'Laki-Laki', 'santi', '05-07-2018', '12', 25, 100, NULL, '', 'Gizi lebih', '2020-01-10'),
(54, '202001100036', 'gara', 'Laki-Laki', 'giri', '01-08-2018', '12', 26, 110, NULL, '', 'Gizi lebih', '2020-01-10'),
(55, '202001100037', 'qq', 'Laki-Laki', 'qq', '01-07-2018', '30', 24, 110, NULL, '', 'Gizi lebih', '2020-01-10'),
(56, '202001100038', 'hapa', 'Laki-Laki', 'hipi', '01-05-2018', '12', 34, 120, NULL, '', 'Gizi lebih', '2020-01-10'),
(57, '202001100039', 'haru', 'Laki-Laki', 'hari', '01-10-2017', '11', 35, 130, NULL, 'Stunting', 'Gizi lebih', '2020-01-10'),
(58, '202001100040', 'fari', 'Laki-Laki', 'fza', '01-03-2017', '0', 45, 150, NULL, 'Stunting', 'Gizi lebih', '2020-01-10'),
(59, '202001100041', 'fazzx', 'Laki-Laki', 'asd', '01-09-2019', '0', 45, 160, NULL, '', 'Gizi lebih', '2020-01-10'),
(60, '202001110042', 'hj', 'Laki-Laki', 'hu', '05-10-2018', '0', 27, 119, NULL, '', 'Gizi lebih', '2020-01-11'),
(61, '202001110043', 'lala', 'Laki-Laki', 'lili', '01-11-2017', 'null', 45, 130, NULL, 'Stunting', 'Gizi lebih', '2020-01-11'),
(62, '202001110044', 'kan', 'Laki-Laki', 'kon', '02-07-2018', '90', 35, 140, NULL, '', 'Gizi lebih', '2020-01-11'),
(63, '202001110045', 'hake', 'Laki-Laki', 'haki', '01-06-2019', 'null', 30, 11, NULL, '', 'Gizi lebih', '2020-01-11'),
(64, '202001120046', 'yonif', 'Laki-Laki', 'yona', '01-08-2018', '0', 35, 125, NULL, '', 'Gizi lebih', '2020-01-12'),
(65, '202001140047', 'dd', 'Laki-Laki', 'ww', '14-01-2020', '', 26, 140, NULL, '', 'Gizi lebih', '2020-01-14'),
(66, '202001150048', 'laki', 'Laki-Laki', 'loko', '15-01-2020', '', 50, 120, NULL, '', 'Gizi lebih', '2020-01-15'),
(67, '202001150049', 'k', 'Laki-Laki', 'k', '15-01-2020', '', 40, 130, NULL, '', 'Gizi lebih', '2020-01-15'),
(68, '202001150050', 'iin', 'Perempuan', 'ina', '15-01-2017', '', 15, 25, NULL, 'Stunting', 'Gizi Baik', '2020-01-15');

--
-- Triggers `anak`
--
DELIMITER $$
CREATE TRIGGER `kode_no_medis` BEFORE INSERT ON `anak` FOR EACH ROW begin
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

-- --------------------------------------------------------

--
-- Table structure for table `anak_1`
--

CREATE TABLE `anak_1` (
  `no_medisanak` varchar(50) NOT NULL,
  `nama_anak` text NOT NULL,
  `tgllahir_anak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(11) NOT NULL,
  `no_medisanak` varchar(50) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `no_medisanak`, `nama_ayah`, `nama_ibu`, `alamat`) VALUES
(1, '', 'putrasi', 'yati', '2019-12-12'),
(9, '', 'f', 'f', 'f'),
(10, '', 'danu', 'ina', 'sleman'),
(11, '', 'ayahhhh', 'ibuuuuu', 'ssss'),
(12, '', 'roy', 'riy', 'sdsd'),
(13, '', 'jojo', 'asas', '1212'),
(14, '', 'kamal', 'dasd', 'asdasd'),
(15, '', 'asd', 'asd', 'asdas'),
(16, '', 'as', 'asda', 'sdasd'),
(17, '', 'asa', 'sdf', 'asda'),
(18, '', 'asd', 'fa', 'fa'),
(19, '', 'f', 'a', 's'),
(20, '', 'asAS', 'asasd', 'SDSD'),
(21, '', 'asd', 'asd', 'aasd'),
(22, '', 'dani', 'joko', 'a'),
(23, '', 'fangki', 'fongko', '2'),
(24, '', 'jaja', 'jiji', 'down'),
(25, '', 'kk', 'kk', 'ww'),
(26, '', 'admind', 'e', 'ee'),
(27, '', 'jani', 'jo', 'fa'),
(28, '', 'odi', 'ina', 'seturan'),
(29, '', 'odi', 'ina', 'seturan'),
(30, '', 'toto', 'nana', 'sleman');

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
(1, '202001140047', 0, 'Laki-Laki', 40, 120, 'Stunting', 'Gizi lebih', '2020-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `temp_anak`
--

CREATE TABLE `temp_anak` (
  `id_anak` int(11) NOT NULL,
  `no_medis` varchar(50) DEFAULT NULL,
  `nama_anak` text NOT NULL,
  `jk` varchar(255) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` varchar(25) NOT NULL,
  `umur` int(11) NOT NULL,
  `berat` double NOT NULL,
  `tinggi` double NOT NULL,
  `keterangan` text,
  `status_stunting` text,
  `status_gizi` text,
  `tanggal` date NOT NULL
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
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `anak_1`
--
ALTER TABLE `anak_1`
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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id_pengukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_anak`
--
ALTER TABLE `temp_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
