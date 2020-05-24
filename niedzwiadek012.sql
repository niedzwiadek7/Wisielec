-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Paź 2019, 15:31
-- Wersja serwera: 10.3.17-MariaDB-102+cba
-- Wersja PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `niedzwiadek012`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(0, 'Powiedzenia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id_pyt` int(11) NOT NULL,
  `pytanie` varchar(50) CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `zaakceptowano` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id_pyt`, `pytanie`, `zaakceptowano`) VALUES
(1, 'BEZ PRACY NIE MA KOŁACZY', 1),
(2, 'SUPER TAJNE HASŁO', 1),
(3, 'Jest pięknie a w łóżku nie jestem egoistą', 1),
(4, 'Hasełko', 1),
(5, 'Gdzie kucharek sześć tam nie ma co jeść', 1),
(6, 'To by było puste hasło', 1),
(7, 'Zażółć gęślą jaźń', 1),
(8, 'Długość hasła to generalnie nie problem ', 1),
(9, 'Siemanko', 1),
(10, 'Dodaję nowe hasło', 1),
(11, 'Przecinek', 1),
(12, 'Zarąbiście długie hasło', 1),
(15, 'Piękny jest świat gdy się dwadzieścia lat', 1),
(14, 'Damian', 1),
(16, 'Dodanie nowego has?a', 0),
(17, 'Podanie nowego has?a', 0),
(18, 'Hase?ko', 0),
(19, 'Stó? z powa?ywanymi nogami', 0),
(23, 'Polskie Has?o', 0),
(24, '????Ó???', 0),
(25, 'xdddddddd', 0),
(26, 'las', 0),
(27, '', 0),
(28, 'ko?', 0),
(29, '1321', 0),
(30, 'patrycja', 0),
(31, 'hajs si? zgadza', 0),
(32, 'zatankuje punto', 0),
(33, 'pi?tek pi?teczek pi?tunio', 0),
(34, 'Piwo jest nie smaczne', 0),
(35, 'marcin straci? prawo jazdy', 0),
(36, 'wódke wódk? popija?', 0),
(37, 'straci?em cnot?', 0),
(38, 'youtube', 0),
(39, 'szybki i w?ciek?y', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `punkty` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `punkty`, `admin`) VALUES
(17, 'nowekonto', '$2y$10$aDUmqdUtnS8vU6FfBFHBY.pIbNi/m/UDNMjV2VeJevjpmImvUAXru', 'nowekonto@email.com', 0, 0),
(16, 'nick', '$2y$10$j1PlAu2ytgTv1fHbKHwwPOoFMPtjLy1ETrUNI6tDqrUyZCp8H3EL.', 'nick@nicki.pl', 0, 0),
(15, 'Patix2289', '$2y$10$P/vQOzVjY.nhLcusku9jv.8B0AHl8.fa.r9/K6XkRND7jr27mFWda', 'patka@gmail.com', 0, 0),
(11, 'nazwa', '$2y$10$wzrjQBDri0v01Le1TynokOzP4Q97OiDYtEDPRZ31JDVllA9cQfBSW', 'email@email.com', 14, 0),
(12, 'graczol', '$2y$10$rqEJWqOESiqRFXJykkLYheUDEbLhR.RtiWAe.0D2QN/moNDuAhVbq', 'graczol@email.com', 7, 1),
(13, 'konto', '$2y$10$XTz2mMOJ8pFdrbo9cNpZd.Lqa0l3aiTPJqwQJfzokDXOtwvGo2aUe', 'konto@gmail.com', 14, 0),
(14, 'konto33', '$2y$10$DfzkRyr/N5CkZVEARrXU8uX5sYHyCHOJ9y8PLxvr4NMsGxq3Jwf1C', 'konto33@gmail.com', 14, 0),
(18, 'derowic', '$2y$10$JASw0yJpsQipguM9S5uFKO/XwKmSdfpE7cLtqVI.UUv0Xbojx3baO', 'derowic321@gmail.com', 0, 0),
(19, 'bellatrx', '$2y$10$eRuAJ16jonWsE4TgH2R.lOfUXq4wFBnACWWQrrye7u3Bk5IxF2B/K', 'natalkanacia24@gmail.com', 0, 0),
(20, 'marcinwarszewski', '$2y$10$QDfjiDajpuDk25fadJJUTu4LVsQ.M/RANKN.emHTeOfZaJtqmApvO', 'marcin@wep.pl', -4, 0),
(21, 'damian123', '$2y$10$i54zX4FfSQ41C9BbBEOXzur8vTicrgQDjt1P708xe7wxG3sxDhG.C', 'nazwa@nazwa.com', -7, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id_pyt`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id_pyt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
