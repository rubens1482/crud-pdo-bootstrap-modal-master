-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jul-2019 às 00:42
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_mahasiswa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `is_mahasiswa`
--

CREATE TABLE `is_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `is_mahasiswa`
--

INSERT INTO `is_mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telepon`, `foto`) VALUES
('1731200001', 'Dedi Saputra', 'Bandar Lampung', '1990-02-01', 'Laki-laki', 'Islam', 'Jalan Gatot Subroto No. 10, Bandar Lampung', '085758857775', 'img-2.png'),
('1731200002', 'Iskadina Eka Putri', 'Jakarta', '1993-05-02', 'Perempuan', 'Islam', 'Jalan Pagar Alam No. 15, Kedaton, Bandar Lampung', '085789892909', 'img-11.png'),
('1731200003', 'Indra Styawantoro', 'Purbolinggo', '1991-05-15', 'Laki-laki', 'Islam', 'Perum Griya Gedung Meneng Blok C2 No. 2, Rajabasa, Bandar Lampung', '085669919769', 'img-6.png'),
('1731200004', 'Ayu Nurlina', 'Jakarta', '1994-12-19', 'Perempuan', 'Islam', 'Jalan Radin Intan No. 77, Tanjung Karang, Bandar Lampung', '089977955772', 'Certidao_MaraRubia.jpeg'),
('1731200005', 'Rio Rinaldo juba', 'Metro', '1979-03-16', 'Laki-laki', 'Islam', 'Jalan Zaenal Abidin Pagaralam No. 1, Bandar Lampung', '081922919212', 'Selos-montagem.jpg'),
('1731200006', 'Rinaldi da silva sauro', 'Jakarta lane', '1993-06-06', 'Perempuan', 'Islam', 'Jalan Yos Sudarso No. 135, Bandar Lampung', '081388955767', 'img1c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_mahasiswa`
--
ALTER TABLE `is_mahasiswa`
  ADD PRIMARY KEY (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
