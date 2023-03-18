-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2022 at 03:13 PM
-- Server version: 10.8.4-MariaDB
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashmoneyprojects`
--

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

CREATE TABLE `projekti` (
  `id_projekta` int(11) NOT NULL,
  `naziv` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokacija` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rok` date NOT NULL,
  `aktivan` int(11) NOT NULL DEFAULT 1 COMMENT '0 - neaktivan ili zavrsen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`id_projekta`, `naziv`, `lokacija`, `rok`, `aktivan`) VALUES
(1, 'Ime projekta', 'Kragujevac', '2022-12-21', 1),
(2, 'Drugi projekat', 'Beograd', '2023-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stavke`
--

CREATE TABLE `stavke` (
  `id_stavke` int(11) NOT NULL,
  `id_usera` int(11) NOT NULL,
  `id_projekta` int(11) NOT NULL,
  `naziv` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 na cekanju, 1 u izradi, 2 zavrseno',
  `detalji` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentari` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavke`
--

INSERT INTO `stavke` (`id_stavke`, `id_usera`, `id_projekta`, `naziv`, `status`, `detalji`, `komentari`) VALUES
(1, 1, 1, 'Dodeljena stavka', 1, 'faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis', 'Proba komentara'),
(2, 1, 1, 'Druga stavka', 2, 'faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis', 'Komentari rade'),
(3, 5, 2, 'Neka stavka', 2, 'Detalji izrade neke stavke', ''),
(5, 5, 2, 'Dodata stavka', 1, 'Proba', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usera` int(11) NOT NULL,
  `ime` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '0 zaposleni, 1 menadzer, 2 admin',
  `komentar` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_usera`, `ime`, `email`, `password`, `role`, `komentar`) VALUES
(1, 'Milan Marinković', 'mm94261@gmail.com', 'milanmilanmilan123', 1, ''),
(2, 'Filip Jovanović', 'filip.jovanovic@cashmoneyprojects.com', '$2y$10$hrXZcjiphsE7W3utxKpcUeHSFyeHMkbPgncafasjLxCJXcdjir2K6', 2, ''),
(5, 'Petar Petrovic', 'petar.petrovic@sajt.com', '$2y$10$dpLcWCD1DOjKuSQ0DD4YoeTMUoyoSDOplgqjlYlgsPuJK2ASUdmvm', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projekti`
--
ALTER TABLE `projekti`
  ADD PRIMARY KEY (`id_projekta`);

--
-- Indexes for table `stavke`
--
ALTER TABLE `stavke`
  ADD PRIMARY KEY (`id_stavke`),
  ADD KEY `id_usera` (`id_usera`),
  ADD KEY `id_projekta` (`id_projekta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projekti`
--
ALTER TABLE `projekti`
  MODIFY `id_projekta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stavke`
--
ALTER TABLE `stavke`
  MODIFY `id_stavke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_usera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stavke`
--
ALTER TABLE `stavke`
  ADD CONSTRAINT `stavke_ibfk_1` FOREIGN KEY (`id_usera`) REFERENCES `user` (`id_usera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stavke_ibfk_2` FOREIGN KEY (`id_projekta`) REFERENCES `projekti` (`id_projekta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
