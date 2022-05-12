-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Maj 2022, 00:11
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis_ogloszeniowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `ID` int(11) NOT NULL,
  `Nazwa` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Telefon` varchar(12) COLLATE utf8_polish_ci DEFAULT NULL,
  `Tresc` varchar(5000) COLLATE utf8_polish_ci DEFAULT NULL,
  `Data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`ID`, `Nazwa`, `Imie`, `Nazwisko`, `Telefon`, `Tresc`, `Data`) VALUES
(1, 'Tobiasz', 'Tobiasz', 'Tobiasz', '123456789', 'Dzień dobry, Jestem założycielem strony, pozdrawiam :D', '2022-05-12 00:08:36'),
(2, 'Bartek', 'Bartek', 'Bartek', '123456788', 'Dzień dobry, Ja również jestem założycielem strony, pozdrawiam :D', '2022-05-12 00:09:11'),
(3, 'Maksymilian', 'Maksymilian', 'Maksymilian', '1234567777', 'Dzień dobry, Ja podobnie jak wy też jestem założycielem strony, pozdrawiam :D', '2022-05-12 00:09:42');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Adres_email` varchar(35) COLLATE utf8_polish_ci DEFAULT NULL,
  `Miejscowosc` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `Telefon` varchar(12) COLLATE utf8_polish_ci DEFAULT NULL,
  `Haslo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `Nazwa`, `Imie`, `Nazwisko`, `Adres_email`, `Miejscowosc`, `Telefon`, `Haslo`) VALUES
(1, 'Tobiasz', 'Tobiasz', 'Tobiasz', 'Tobiasz@tobiasz.tobiasz', 'Tobiasz', '123456789', '79db7ad71cab7b8d4bce79b1dafd5f09'),
(2, 'Bartek', 'Bartek', 'Bartek', 'Bartek@bartek.bartek', 'Bartek', '123456788', '2e7503c60dc01cfebb7a972b4adc0d7b'),
(3, 'Maksymilian', 'Maksymilian', 'Maksymilian', 'Maksymilian@maksymilian.maksymilian', 'Maksymilian', '1234567777', '951de19ef806b67662f3282df0458279');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
