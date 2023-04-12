-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 05, 2023 at 09:15 AM
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
-- Database: `apskatilatviju`
--

-- --------------------------------------------------------

--
-- Table structure for table `galamerkis`
--

CREATE TABLE `galamerkis` (
  `GalamID` int(100) NOT NULL,
  `Nosaukums` varchar(40) NOT NULL,
  `Attels` varchar(1000) NOT NULL,
  `Apraksts` text NOT NULL,
  `Lokācija` varchar(30) NOT NULL,
  `Cena` int(20) NOT NULL,
  `ID_Lietotajs` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jaunumi`
--

CREATE TABLE `jaunumi` (
  `JaunumiID` int(11) NOT NULL,
  `Nosaukums` varchar(40) NOT NULL,
  `Attels` varchar(1000) NOT NULL,
  `Apraksts` text NOT NULL,
  `Datums` date NOT NULL,
  `IDLietotajs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lietotajs`
--

CREATE TABLE `lietotajs` (
  `id` int(6) NOT NULL,
  `lietotajvards` int(20) NOT NULL,
  `parole` varchar(20) NOT NULL,
  `irAdmins` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pakalpojumi`
--

CREATE TABLE `pakalpojumi` (
  `PakalpojumiID` int(100) NOT NULL,
  `Nosaukums` varchar(40) NOT NULL,
  `Attels` varchar(1000) NOT NULL,
  `Apraksts` text NOT NULL,
  `Cena` int(50) NOT NULL,
  `IDLietotajs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pieteikums`
--

CREATE TABLE `pieteikums` (
  `id` int(11) NOT NULL,
  `vards` varchar(40) NOT NULL,
  `uzvards` varchar(40) NOT NULL,
  `dzimsanasDati` date NOT NULL,
  `celojums` varchar(30) NOT NULL,
  `lidzbrauceji` int(10) NOT NULL,
  `Telefons` int(8) NOT NULL,
  `e-pasts` varchar(30) NOT NULL,
  `komentars` text NOT NULL,
  `statuss` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `StatussID` int(100) NOT NULL,
  `Apskatits` tinyint(1) NOT NULL,
  `Apstiprinats` tinyint(1) NOT NULL,
  `Atteikts` tinyint(1) NOT NULL,
  `Neizskatits` tinyint(1) NOT NULL,
  `IDLietotajs` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galamerkis`
--
ALTER TABLE `galamerkis`
  ADD PRIMARY KEY (`GalamID`),
  ADD KEY `ID_Lietotajs` (`ID_Lietotajs`);

--
-- Indexes for table `jaunumi`
--
ALTER TABLE `jaunumi`
  ADD PRIMARY KEY (`JaunumiID`),
  ADD KEY `IDLietotajs` (`IDLietotajs`);

--
-- Indexes for table `lietotajs`
--
ALTER TABLE `lietotajs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakalpojumi`
--
ALTER TABLE `pakalpojumi`
  ADD PRIMARY KEY (`PakalpojumiID`),
  ADD KEY `IDLietotajs` (`IDLietotajs`);

--
-- Indexes for table `pieteikums`
--
ALTER TABLE `pieteikums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`StatussID`),
  ADD KEY `IDLietotajs` (`IDLietotajs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galamerkis`
--
ALTER TABLE `galamerkis`
  MODIFY `GalamID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jaunumi`
--
ALTER TABLE `jaunumi`
  MODIFY `JaunumiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lietotajs`
--
ALTER TABLE `lietotajs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakalpojumi`
--
ALTER TABLE `pakalpojumi`
  MODIFY `PakalpojumiID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pieteikums`
--
ALTER TABLE `pieteikums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `StatussID` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galamerkis`
--
ALTER TABLE `galamerkis`
  ADD CONSTRAINT `galamerkis_ibfk_1` FOREIGN KEY (`ID_Lietotajs`) REFERENCES `lietotajs` (`id`);

--
-- Constraints for table `jaunumi`
--
ALTER TABLE `jaunumi`
  ADD CONSTRAINT `jaunumi_ibfk_1` FOREIGN KEY (`IDLietotajs`) REFERENCES `lietotajs` (`id`);

--
-- Constraints for table `pakalpojumi`
--
ALTER TABLE `pakalpojumi`
  ADD CONSTRAINT `pakalpojumi_ibfk_1` FOREIGN KEY (`IDLietotajs`) REFERENCES `lietotajs` (`id`);

--
-- Constraints for table `statuss`
--
ALTER TABLE `statuss`
  ADD CONSTRAINT `statuss_ibfk_1` FOREIGN KEY (`IDLietotajs`) REFERENCES `lietotajs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
