-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 04 Mar 2018, 21:58
-- Wersja serwera: 5.5.59-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `MONITORING`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `DATA`
--

CREATE TABLE IF NOT EXISTS `DATA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MNUMBER` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VOLTS` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CURRENT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TEMP` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `DATA`
--

INSERT INTO `DATA` (`ID`, `MNUMBER`, `VOLTS`, `CURRENT`, `TEMP`, `TIME`) VALUES
(1, 'M37000', '21', '22', '16', '2018-03-03 13:59:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `MNUMBERS`
--

CREATE TABLE IF NOT EXISTS `MNUMBERS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MNUMBER` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `MNUMBERS`
--

INSERT INTO `MNUMBERS` (`ID`, `USERNAME`, `MNUMBER`) VALUES
(1, 'aaaa', 'M37000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `USERS`
--

INSERT INTO `USERS` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES
(1, 'aaaa', 'aaaa', 'aaaa@aaaa.aa'),
(2, 'aaaa', 'aaaa', 'aaaa@aaaa.aa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
