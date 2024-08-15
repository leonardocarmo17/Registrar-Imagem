-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql110.infinityfree.com
-- Generation Time: Aug 15, 2024 at 01:45 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37112360_imagens`
--

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE `arquivos` (
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `path` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=cp932 COLLATE=cp932_japanese_ci;

--
-- Dumping data for table `arquivos`
--

INSERT INTO `arquivos` (`nome`, `path`, `data_upload`) VALUES
('mapa mental.jpg', 'arquivos/66be12e6230c6.jpg', '2024-08-15 07:38:30'),
('66b6c66d61fb4.png', 'arquivos/66be454c37474.png', '2024-08-15 11:13:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
