-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Sty 2022, 11:31
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komis_samochodowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbklienci`
--

CREATE TABLE `tbklienci` (
  `id_klienta` int(11) NOT NULL,
  `nazwisko` text NOT NULL,
  `imie` text NOT NULL,
  `data_ur` date NOT NULL,
  `pesel` text NOT NULL,
  `kod_pocztowy` text NOT NULL,
  `miasto` text NOT NULL,
  `ulica` text NOT NULL,
  `nr_domu` text NOT NULL,
  `telefon` text NOT NULL,
  `mail` text NOT NULL,
  `rodzaj_dok` text NOT NULL,
  `nr_dok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbkolory`
--

CREATE TABLE `tbkolory` (
  `id_koloru` int(11) NOT NULL,
  `nazwa_koloru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbmarki`
--

CREATE TABLE `tbmarki` (
  `id_marki` int(11) NOT NULL,
  `nazwa_marki` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbmodele`
--

CREATE TABLE `tbmodele` (
  `id_modelu` int(11) NOT NULL,
  `nazwa_modelu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbpojazdy`
--

CREATE TABLE `tbpojazdy` (
  `id_pojazdu` int(11) NOT NULL,
  `id_marki` int(11) NOT NULL,
  `id_modelu` int(11) NOT NULL,
  `id_koloru` int(11) NOT NULL,
  `rok_prod` int(11) NOT NULL,
  `nr_vin` text NOT NULL,
  `przebieg` int(11) NOT NULL,
  `rodzaj_poj` enum('Sedan','Hatchback','Kombi','Van','Kabriolet','Coupe','SUV') NOT NULL,
  `nr_rej` text NOT NULL,
  `poj_silnika` int(11) NOT NULL,
  `powypadkowy` enum('Tak','Nie') NOT NULL,
  `cena` int(11) NOT NULL,
  `rezerwacja` enum('Tak','Nie') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbtransakcje`
--

CREATE TABLE `tbtransakcje` (
  `id_transakcji` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `rodzaj_tran` enum('Kupno','Sprzedaż') NOT NULL,
  `kwota` int(11) NOT NULL,
  `nr_faktury` text NOT NULL,
  `sp_zaplaty` enum('Przelew','Gotówka') NOT NULL,
  `data_transakcji` date NOT NULL,
  `zaplacono` enum('Tak','Nie') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `tbklienci`
--
ALTER TABLE `tbklienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `tbkolory`
--
ALTER TABLE `tbkolory`
  ADD PRIMARY KEY (`id_koloru`);

--
-- Indeksy dla tabeli `tbmarki`
--
ALTER TABLE `tbmarki`
  ADD PRIMARY KEY (`id_marki`);

--
-- Indeksy dla tabeli `tbmodele`
--
ALTER TABLE `tbmodele`
  ADD PRIMARY KEY (`id_modelu`);

--
-- Indeksy dla tabeli `tbpojazdy`
--
ALTER TABLE `tbpojazdy`
  ADD PRIMARY KEY (`id_pojazdu`),
  ADD KEY `id_marki` (`id_marki`),
  ADD KEY `id_modelu` (`id_modelu`),
  ADD KEY `id_koloru` (`id_koloru`);

--
-- Indeksy dla tabeli `tbtransakcje`
--
ALTER TABLE `tbtransakcje`
  ADD PRIMARY KEY (`id_transakcji`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `tbklienci`
--
ALTER TABLE `tbklienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tbkolory`
--
ALTER TABLE `tbkolory`
  MODIFY `id_koloru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tbmarki`
--
ALTER TABLE `tbmarki`
  MODIFY `id_marki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tbmodele`
--
ALTER TABLE `tbmodele`
  MODIFY `id_modelu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tbpojazdy`
--
ALTER TABLE `tbpojazdy`
  MODIFY `id_pojazdu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tbtransakcje`
--
ALTER TABLE `tbtransakcje`
  MODIFY `id_transakcji` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `tbpojazdy`
--
ALTER TABLE `tbpojazdy`
  ADD CONSTRAINT `tbpojazdy_ibfk_1` FOREIGN KEY (`id_marki`) REFERENCES `tbmarki` (`id_marki`),
  ADD CONSTRAINT `tbpojazdy_ibfk_2` FOREIGN KEY (`id_koloru`) REFERENCES `tbkolory` (`id_koloru`),
  ADD CONSTRAINT `tbpojazdy_ibfk_3` FOREIGN KEY (`id_modelu`) REFERENCES `tbmodele` (`id_modelu`);

--
-- Ograniczenia dla tabeli `tbtransakcje`
--
ALTER TABLE `tbtransakcje`
  ADD CONSTRAINT `tbtransakcje_ibfk_1` FOREIGN KEY (`id_pojazdu`) REFERENCES `tbpojazdy` (`id_pojazdu`),
  ADD CONSTRAINT `tbtransakcje_ibfk_2` FOREIGN KEY (`id_klienta`) REFERENCES `tbklienci` (`id_klienta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
