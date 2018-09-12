-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Wrz 2018, 16:23
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sprawozdania`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instrukcje`
--

CREATE TABLE `instrukcje` (
  `IdInstrukcji` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `IdPrzedmiotu` int(11) DEFAULT NULL,
  `Instrukcja` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `instrukcje`
--

INSERT INTO `instrukcje` (`IdInstrukcji`, `Email`, `IdPrzedmiotu`, `Instrukcja`) VALUES
(1, '', 5, 'LAB10.pdf'),
(2, 'jankow@utp.edu.pl', NULL, 'LAB12.pdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kierunki`
--

CREATE TABLE `kierunki` (
  `Id` int(11) NOT NULL,
  `Stan` varchar(255) DEFAULT NULL COMMENT 'Stacjonarne czy nie stacjonarne',
  `Rok` int(11) DEFAULT NULL,
  `Nazwa` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kierunki`
--

INSERT INTO `kierunki` (`Id`, `Stan`, `Rok`, `Nazwa`) VALUES
(1, 'Stacjonarne', 2018, 'Informatyka'),
(2, 'Niestacjonarne', 2018, 'Informatyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prace`
--

CREATE TABLE `prace` (
  `IdPracy` int(11) NOT NULL,
  `Pesel` int(11) NOT NULL,
  `Zaliczone` varchar(255) DEFAULT NULL,
  `Uwagi` varchar(255) DEFAULT NULL,
  `Plik` varchar(255) DEFAULT NULL,
  `DataOddania` date DEFAULT NULL,
  `DataSprawdzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `prace`
--

INSERT INTO `prace` (`IdPracy`, `Pesel`, `Zaliczone`, `Uwagi`, `Plik`, `DataOddania`, `DataSprawdzenia`) VALUES
(1, 512305067, 'Dostateczny', 'MaÅ‚o, ale wystarczajÄ…co', 'Zal1.pdf', NULL, '2018-09-06'),
(2, 333442200, 'Niedostateczny', 'Praca nie na temat', 'Bombelkowe.pdf', NULL, '2018-09-06'),
(3, 333442200, 'Do poprawy', 'Za wiele bÅ‚Ä™dÃ³w', 'Proj.pdf', NULL, '2018-09-06'),
(4, 333442200, NULL, NULL, 'PBD 2.docx', '2018-09-06', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmiot`
--

CREATE TABLE `przedmiot` (
  `IdPrzedmiotu` int(11) NOT NULL,
  `IdKierunek` int(11) NOT NULL,
  `Nazwa` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `przedmiot`
--

INSERT INTO `przedmiot` (`IdPrzedmiotu`, `IdKierunek`, `Nazwa`) VALUES
(1, 1, 'Narzędzia'),
(2, 1, 'Bazy danych'),
(4, 2, 'Narzędzia'),
(5, 1, 'Algorytmy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relprzedmiot`
--

CREATE TABLE `relprzedmiot` (
  `IdPrzedmiotu` int(11) DEFAULT NULL,
  `IdStudenta` int(11) DEFAULT NULL,
  `IdPracy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `relprzedmiot`
--

INSERT INTO `relprzedmiot` (`IdPrzedmiotu`, `IdStudenta`, `IdPracy`) VALUES
(1, 119123112, 1),
(2, 119123112, NULL),
(5, 119123112, 2),
(1, 120100123, 3),
(2, 120100123, NULL),
(1, 333442200, NULL),
(4, 512305067, NULL),
(5, 512305067, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Pesel` int(11) NOT NULL,
  `Imie` varchar(255) DEFAULT NULL,
  `Nazwisko` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Haslo` varchar(255) DEFAULT NULL,
  `Status` varchar(2) NOT NULL COMMENT 'Student czy wykładowca',
  `Grupa` int(11) DEFAULT NULL COMMENT 'Grupa dziekańska (dot. studentów)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Pesel`, `Imie`, `Nazwisko`, `Email`, `Haslo`, `Status`, `Grupa`) VALUES
(119123112, 'Jan', 'Kowalski', 'jankow@utp.edu.pl', 'abc', '2', NULL),
(120100123, 'Adrian', 'Nowak', 'adrnow@utp.edu.pl', '1234', '2', NULL),
(333442200, 'Karol', 'Wojtyła', 'karwoj@utp.edu.pl', 'qwert', '1', NULL),
(512305067, 'Mateusz', 'Iksiński', 'matiks@utp.edu.pl', '1234', '1', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `instrukcje`
--
ALTER TABLE `instrukcje`
  ADD PRIMARY KEY (`IdInstrukcji`);

--
-- Indeksy dla tabeli `kierunki`
--
ALTER TABLE `kierunki`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `prace`
--
ALTER TABLE `prace`
  ADD PRIMARY KEY (`IdPracy`);

--
-- Indeksy dla tabeli `przedmiot`
--
ALTER TABLE `przedmiot`
  ADD PRIMARY KEY (`IdPrzedmiotu`),
  ADD KEY `IdKierunek` (`IdKierunek`);

--
-- Indeksy dla tabeli `relprzedmiot`
--
ALTER TABLE `relprzedmiot`
  ADD KEY `IdPracy` (`IdPracy`),
  ADD KEY `IdPrzedmiotu` (`IdPrzedmiotu`),
  ADD KEY `IdStudenta` (`IdStudenta`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Pesel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `instrukcje`
--
ALTER TABLE `instrukcje`
  MODIFY `IdInstrukcji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `kierunki`
--
ALTER TABLE `kierunki`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `prace`
--
ALTER TABLE `prace`
  MODIFY `IdPracy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `przedmiot`
--
ALTER TABLE `przedmiot`
  MODIFY `IdPrzedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
