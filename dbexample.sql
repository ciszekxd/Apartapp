-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Paź 2020, 01:52
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `apartments`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201007225529', '2020-10-09 19:13:23', 948),
('DoctrineMigrations\\Version20201009181837', '2020-10-09 20:25:39', 61),
('DoctrineMigrations\\Version20201010165603', '2020-10-10 18:56:40', 814);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `houses`
--

CREATE TABLE `houses` (
  `Address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `places` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `houses`
--

INSERT INTO `houses` (`Address`, `discount`, `id`, `price`, `places`) VALUES
('Kowalskiego 4/8', '5.00', 1, '50.00', '7'),
('Nowaka 17/67', '10.00', 2, '60.00', '1'),
('Wartowna 8/9', '8.00', 3, '100.00', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `Address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Rented_from` date NOT NULL,
  `Rented_to` date NOT NULL,
  `reserved_places` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `Address`, `Rented_from`, `Rented_to`, `reserved_places`) VALUES
(2, 'Kowalskiego 4/8', '2020-10-20', '2020-11-04', '1'),
(12, 'Kowalskiego 4/8', '2022-08-17', '2022-08-20', '2'),
(14, 'Nowaka 17/67', '2015-01-01', '2015-01-04', '1'),
(15, 'Kowalskiego 4/8', '2015-01-01', '2015-01-03', '2'),
(16, 'Wartowna 8/9', '2020-04-08', '2020-04-12', '2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
