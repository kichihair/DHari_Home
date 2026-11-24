-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 05:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempahan_homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KodKategori` varchar(3) NOT NULL,
  `KategoriRumah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KodKategori`, `KategoriRumah`) VALUES
('KD', 'Rumah Dua Tingkat'),
('KK', 'Rumah Kampung'),
('KS', 'Rumah Setingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `NoKP` varchar(12) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `NoTel` varchar(12) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `KataLaluan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`NoKP`, `NamaPelanggan`, `NoTel`, `Alamat`, `KataLaluan`) VALUES
('030919100218', 'Izzati', '0176331126', 'Kuantan, Pahang', 'izzati123'),
('031010140480', 'Alissa', '0162901427', 'Tumpat, Kelantan', 'alissa123'),
('031129100726', 'Alia', '0176207237', 'Klang, Selangor', 'alia123');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nama_pengurus` varchar(50) NOT NULL,
  `nokp_pengurus` varchar(12) NOT NULL,
  `katalaluan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nama_pengurus`, `nokp_pengurus`, `katalaluan`) VALUES
('Salsabila', '030808140178', 'hairyn1234');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `KodRumah` varchar(3) NOT NULL,
  `KategoriRumah` varchar(30) NOT NULL,
  `Harga` double(5,2) NOT NULL,
  `gambar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`KodRumah`, `KategoriRumah`, `Harga`, `gambar`) VALUES
('R01', 'Rumah Kampung', 105.00, 'a1.jpg'),
('R02', 'Rumah Kampung', 105.00, 'a2.jpg'),
('R03', 'Rumah Setingkat', 150.00, 'a3.jpg'),
('R04', 'Rumah Setingkat', 150.00, 'a4.jpg'),
('R05', 'Rumah Dua Tingkat', 200.00, 'a5.jpg'),
('R06', 'Rumah Dua Tingkat', 200.00, 'a6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `NoKP` varchar(12) NOT NULL,
  `KodRumah` varchar(3) NOT NULL,
  `Harga` double(5,2) NOT NULL,
  `TarikhMasuk` date NOT NULL,
  `TarikhKeluar` date NOT NULL,
  `JumlahBayaran` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`NoKP`, `KodRumah`, `Harga`, `TarikhMasuk`, `TarikhKeluar`, `JumlahBayaran`) VALUES
('030919100218', 'R01', 105.00, '2020-09-19', '2020-09-21', 204.00),
('031010140480', 'R02', 0.00, '2020-09-16', '2020-09-17', 105.00),
('031010140480', 'R03', 150.00, '2020-10-10', '2020-10-11', 150.00),
('031129100726', 'R05', 200.00, '2020-11-29', '2020-12-01', 400.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KodKategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`NoKP`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`nokp_pengurus`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`KodRumah`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD UNIQUE KEY `KodRumah` (`KodRumah`),
  ADD KEY `NoKP` (`NoKP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`NoKP`) REFERENCES `pelanggan` (`NoKP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`KodRumah`) REFERENCES `rumah` (`KodRumah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
