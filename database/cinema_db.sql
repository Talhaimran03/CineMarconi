-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 11, 2023 alle 19:27
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `feedback`
--

CREATE TABLE `feedback` (
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `copertina` varchar(255) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `genere` varchar(255) NOT NULL,
  `durata_minuti` int(11) NOT NULL,
  `data_uscita` date NOT NULL,
  `direttori` varchar(255) NOT NULL,
  `attori` varchar(255) NOT NULL,
  `trailer_URL` varchar(255) DEFAULT NULL,
  `prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`id_film`, `copertina`, `titolo`, `genere`, `durata_minuti`, `data_uscita`, `direttori`, `attori`, `trailer_URL`, `prezzo`) VALUES
(1, 'img/movie-poster-1.jpg', 'The Avengers', 'Action, Adventure, Sci-Fi', 143, '2012-04-25', 'Joss Whedon', 'Robert Downey Jr., Chris Evans, Scarlett Johansson', 'https://www.youtube.com/watch?v=eOrNdBpGMv8', 15),
(2, 'img/movie-poster-2.jpg', 'Black Panther', 'Action, Adventure, Sci-Fi', 134, '2018-02-14', 'Ryan Coogler', 'Chadwick Boseman, Michael B. Jordan, Lupita Nyong', 'https://www.youtube.com/watch?v=xjDjIWPwcPU', 15),
(3, 'img/movie-poster-3.jpg', 'Guardians of the Galaxy', 'Action, Adventure, Comedy', 121, '2014-07-31', 'James Gunn', 'Chris Pratt, Zoe Saldana, Dave Bautista', 'https://www.youtube.com/watch?v=d96cjJhvlMA', 12),
(4, 'img/movie-poster-4.jpg', 'Spider-Man: Into the Spider-Verse', 'Animation, Action, Adventure', 117, '2018-12-13', 'Bob Persichetti, Peter Ramsey, Rodney Rothman', 'Shameik Moore, Jake Johnson, Hailee Steinfeld', 'https://www.youtube.com/watch?v=g4Hbz2jLxvQ', 10),
(5, 'img/movie-poster-5.jpg', 'Fast & Furious 7', 'Action, Crime, Thriller', 137, '2015-04-01', 'James Wan', 'Vin Diesel, Paul Walker, Dwayne Johnson', 'https://www.youtube.com/watch?v=yISKeT6sDOg', 12),
(6, 'img/movie-poster-6.jpg', 'The Dark Knight', 'Action, Crime, Drama', 152, '2008-07-14', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 15),
(7, 'img/movie-poster-7.jpg', 'Wonder Woman', 'Action, Adventure, Fantasy', 141, '2017-05-15', 'Patty Jenkins', 'Gal Gadot, Chris Pine, Robin Wright', 'https://www.youtube.com/watch?v=VSB4wGIdDwo', 15),
(8, 'img/movie-poster-8.jpg', 'Joker', 'Crime, Drama, Thriller', 122, '2019-08-31', 'Todd Phillips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 'https://www.youtube.com/watch?v=zAGVQLHvwOY', 12),
(9, 'img/movie-poster-9.jpg', 'Man of Steel', 'Action, Adventure, Sci-Fi', 143, '2013-06-12', 'Zack Snyder', 'Henry Cavill, Amy Adams, Michael Shannon', 'https://www.youtube.com/watch?v=T6DJcgm3wNY', 10),
(10, 'img/movie-poster-10.jpg', 'Mission: Impossible - Fallout', 'Action, Adventure, Thriller', 147, '2018-07-25', 'Christopher McQuarrie', 'Tom Cruise, Henry Cavill, Ving Rhames', 'https://www.youtube.com/watch?v=wb49-oV0F78', 15),
(11, 'img/movie-poster-11.jpg', 'Inception', 'Action, Adventure, Sci-Fi', 148, '2010-07-14', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', 'https://www.youtube.com/watch?v=d3A3-zSOBT4', 12),
(12, 'img/movie-poster-12.jpg', 'The Lord of the Rings: The Fellowship of the Ring', 'Action, Adventure, Drama', 178, '2001-12-19', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Orlando Bloom', 'https://www.youtube.com/watch?v=V75dMMIW2B4', 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `orario_film`
--

CREATE TABLE `orario_film` (
  `id_orario` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `orario_film`
--

INSERT INTO `orario_film` (`id_orario`, `id_film`, `data`, `ora`) VALUES
(1, 1, '2023-04-12', '15:00:00'),
(2, 1, '2023-04-12', '18:00:00'),
(3, 1, '2023-04-12', '21:00:00'),
(4, 1, '2023-04-13', '15:00:00'),
(5, 1, '2023-04-13', '18:00:00'),
(6, 1, '2023-04-13', '21:00:00'),
(7, 2, '2023-04-14', '15:00:00'),
(8, 2, '2023-04-14', '18:00:00'),
(9, 2, '2023-04-14', '21:00:00'),
(10, 2, '2023-04-15', '15:00:00'),
(11, 2, '2023-04-15', '18:00:00'),
(12, 2, '2023-04-15', '21:00:00'),
(13, 3, '2023-04-16', '15:00:00'),
(14, 3, '2023-04-16', '18:00:00'),
(15, 3, '2023-04-16', '21:00:00'),
(16, 3, '2023-04-17', '15:00:00'),
(17, 3, '2023-04-17', '18:00:00'),
(18, 3, '2023-04-17', '21:00:00'),
(19, 4, '2023-04-18', '15:00:00'),
(20, 4, '2023-04-18', '18:00:00'),
(21, 4, '2023-04-18', '21:00:00'),
(22, 4, '2023-04-19', '15:00:00'),
(23, 4, '2023-04-19', '18:00:00'),
(24, 4, '2023-04-19', '21:00:00'),
(25, 5, '2023-04-20', '15:00:00'),
(26, 5, '2023-04-20', '18:00:00'),
(27, 5, '2023-04-20', '21:00:00'),
(28, 5, '2023-04-21', '15:00:00'),
(29, 5, '2023-04-21', '18:00:00'),
(30, 5, '2023-04-21', '21:00:00'),
(31, 6, '2023-04-22', '15:00:00'),
(32, 6, '2023-04-22', '18:00:00'),
(33, 6, '2023-04-22', '21:00:00'),
(34, 6, '2023-04-23', '15:00:00'),
(35, 6, '2023-04-23', '18:00:00'),
(36, 6, '2023-04-23', '21:00:00'),
(37, 7, '2023-04-24', '15:00:00'),
(38, 7, '2023-04-24', '18:00:00'),
(39, 7, '2023-04-24', '21:00:00'),
(40, 8, '2023-04-25', '15:00:00'),
(41, 8, '2023-04-25', '18:00:00'),
(42, 8, '2023-04-25', '21:00:00'),
(43, 9, '2023-04-26', '15:00:00'),
(44, 9, '2023-04-26', '18:00:00'),
(45, 9, '2023-04-26', '21:00:00'),
(46, 10, '2023-04-27', '15:00:00'),
(47, 10, '2023-04-27', '18:00:00'),
(48, 10, '2023-04-27', '21:00:00'),
(49, 11, '2023-04-28', '15:00:00'),
(50, 11, '2023-04-28', '18:00:00'),
(51, 11, '2023-04-28', '21:00:00'),
(52, 12, '2023-04-29', '15:00:00'),
(53, 12, '2023-04-29', '18:00:00'),
(54, 12, '2023-04-29', '21:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `prezzo` varchar(255) NOT NULL,
  `data_giorno` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id_prenotazione`, `id_film`, `email`, `data`, `ora`, `tipo`, `prezzo`, `data_giorno`) VALUES
(17370811, 3, 'prova@gmail.com', '2023-04-12', '20:00:00', '2d', '10', '2023-04-09 14:03:27'),
(24750460, 1, 'prova@gmail.com', '2023-04-12', '15:00:00', '3d', '15', '2023-04-10 19:15:56'),
(36224332, 5, 'prova@gmail.com', '2023-03-03', '12:00:00', '2d', '8', '2023-04-09 13:20:33'),
(50755501, 2, 'prova@gmail.com', '2023-04-12', '20:00:00', '3d', '12', '2023-04-09 14:01:48'),
(88282596, 8, 'prova@gmail.com', '2023-04-12', '20:00:00', '2d', '5', '2023-04-09 14:03:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `numero_telefono` char(10) NOT NULL,
  `ruolo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`email`, `password`, `nome`, `cognome`, `data_nascita`, `numero_telefono`, `ruolo`) VALUES
('admin@gmail.com', 'admin', 'admin', 'admin', '2000-01-01', '1234567890', 'admin'),
('prova@gmail.com', 'prova', 'prova', 'prova', '2002-02-16', '0123456789', 'utente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD UNIQUE KEY `movieID` (`id_film`);

--
-- Indici per le tabelle `orario_film`
--
ALTER TABLE `orario_film`
  ADD PRIMARY KEY (`id_orario`),
  ADD KEY `fk_moviedatestable_movietable` (`id_film`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`,`id_film`,`email`,`data`,`ora`),
  ADD UNIQUE KEY `bookingID` (`id_prenotazione`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT per la tabella `orario_film`
--
ALTER TABLE `orario_film`
  MODIFY `id_orario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orario_film`
--
ALTER TABLE `orario_film`
  ADD CONSTRAINT `fk_moviedatestable_movietable` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
