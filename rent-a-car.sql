-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2022 at 12:39 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-a-car`
--

-- --------------------------------------------------------

--
-- Table structure for table `automjetet`
--

CREATE TABLE `automjetet` (
  `automjetiid` int(11) NOT NULL,
  `kategoriaid` int(11) NOT NULL,
  `emri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nr_regjistrimi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pershkrimi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kostoja` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `automjetet`
--

INSERT INTO `automjetet` (`automjetiid`, `kategoriaid`, `emri`, `nr_regjistrimi`, `pershkrimi`, `kostoja`) VALUES
(2, 1, ' Maiores repudiandae ', '12333', 'Eius voluptatem irur', '44.00'),
(3, 2, 'Pariatur Quo vitae ', '5832154', 'Rem ipsum nesciunt', '35.00'),
(4, 1, 'Aut commodi dolor co', '55416369', 'Nulla quia quia veli', '30.00'),
(5, 1, 'Magni consectetur an', '5461698', 'Praesentium nisi ali', '40.00'),
(6, 2, 'Expedita sed excepte', '76984651', 'Non dolor nisi qui a', '40.00'),
(7, 2, 'Incididunt tenetur s', '685654', 'Quia maxime incidunt', '45.00');

-- --------------------------------------------------------

--
-- Table structure for table `kategorite`
--

CREATE TABLE `kategorite` (
  `kategoriaid` int(11) NOT NULL,
  `emri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pershkrimi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorite`
--

INSERT INTO `kategorite` (`kategoriaid`, `emri`, `pershkrimi`) VALUES
(1, 'Category1', ''),
(2, 'Category2', '');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

CREATE TABLE `perdoruesit` (
  `perdoruesiid` int(11) NOT NULL,
  `emri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mbiemri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoni` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrpersonal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`perdoruesiid`, `emri`, `mbiemri`, `email`, `password`, `telefoni`, `nrpersonal`, `adresa`, `role`) VALUES
(1, 'Aut similique maiore', 'Libero est commodo r', 'gijurihuqy@mailinator.com', '$2y$10$IOpbAvnEf47uDEHbzkccFuw6g8whshRNq1.REPEojzcwN7y7qIPWy', '+1 (267) 124-2844', '79', 'Ea sed similique qui', 'Klient'),
(2, 'Commodo non lorem ci', 'Officiis natus ut ei', 'urimzymberii@gmail.com', '$2y$10$N4beu2TIVuyubUTsaQlta.md0oyxyPhXRSf5mXtlFC4Gw8LAix812', '+1 (177) 614-4435', '87', 'At ex dolor enim sit', 'Klient'),
(5, 'Filan', 'Fisteku', 'fisteku199@gmail.com', '$2y$10$N4beu2TIVuyubUTsaQlta.md0oyxyPhXRSf5mXtlFC4Gw8LAix812', '+1 (935) 689-8123', '47', 'Ratione officiis lab', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `rezervimet`
--

CREATE TABLE `rezervimet` (
  `rezervimiid` int(11) NOT NULL,
  `automjetiid` int(11) NOT NULL,
  `perdoruesiID` int(11) NOT NULL,
  `dataemarrjes` date DEFAULT NULL,
  `dataekthimit` date DEFAULT NULL,
  `komente` text COLLATE utf8mb4_unicode_ci,
  `kostoja` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rezervimet`
--

INSERT INTO `rezervimet` (`rezervimiid`, `automjetiid`, `perdoruesiID`, `dataemarrjes`, `dataekthimit`, `komente`, `kostoja`) VALUES
(2, 2, 2, '2021-12-01', '2021-12-23', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automjetet`
--
ALTER TABLE `automjetet`
  ADD PRIMARY KEY (`automjetiid`),
  ADD KEY `kategoriaid` (`kategoriaid`);

--
-- Indexes for table `kategorite`
--
ALTER TABLE `kategorite`
  ADD PRIMARY KEY (`kategoriaid`);

--
-- Indexes for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD PRIMARY KEY (`perdoruesiid`),
  ADD UNIQUE KEY `nrpersonal` (`nrpersonal`);

--
-- Indexes for table `rezervimet`
--
ALTER TABLE `rezervimet`
  ADD PRIMARY KEY (`rezervimiid`),
  ADD KEY `automjetiid` (`automjetiid`),
  ADD KEY `perdoruesiID` (`perdoruesiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automjetet`
--
ALTER TABLE `automjetet`
  MODIFY `automjetiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategorite`
--
ALTER TABLE `kategorite`
  MODIFY `kategoriaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  MODIFY `perdoruesiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rezervimet`
--
ALTER TABLE `rezervimet`
  MODIFY `rezervimiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automjetet`
--
ALTER TABLE `automjetet`
  ADD CONSTRAINT `automjetet_ibfk_1` FOREIGN KEY (`kategoriaid`) REFERENCES `kategorite` (`kategoriaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervimet`
--
ALTER TABLE `rezervimet`
  ADD CONSTRAINT `rezervimet_ibfk_1` FOREIGN KEY (`automjetiid`) REFERENCES `automjetet` (`automjetiid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervimet_ibfk_2` FOREIGN KEY (`perdoruesiID`) REFERENCES `perdoruesit` (`perdoruesiid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
