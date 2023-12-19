-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 19. pro 2023, 23:02
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `semestralni_prace`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `AKCE`
--

CREATE TABLE `AKCE` (
  `id` int(11) NOT NULL,
  `popis_akce` varchar(500) DEFAULT NULL,
  `datum_konani_zacatek` datetime NOT NULL,
  `datum_konani_konec` datetime NOT NULL,
  `id_typ_akce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `AKCE`
--

INSERT INTO `AKCE` (`id`, `popis_akce`, `datum_konani_zacatek`, `datum_konani_konec`, `id_typ_akce`) VALUES
(1, NULL, '2024-03-06 17:00:00', '2024-03-06 18:30:00', 2),
(2, NULL, '2024-03-08 17:00:00', '2024-03-08 18:30:00', 2),
(3, NULL, '2024-03-13 17:00:00', '2024-03-13 18:30:00', 2),
(4, NULL, '2024-03-15 17:00:00', '2024-03-15 18:30:00', 2),
(5, NULL, '2024-03-20 17:00:00', '2024-03-20 18:30:00', 2),
(6, NULL, '2024-03-22 17:00:00', '2024-03-22 18:30:00', 2),
(7, NULL, '2024-03-27 17:00:00', '2024-03-27 18:30:00', 2),
(8, NULL, '2024-03-29 17:00:00', '2024-03-29 18:30:00', 2),
(9, NULL, '2024-04-03 17:00:00', '2024-04-03 18:30:00', 2),
(10, NULL, '2024-04-05 17:00:00', '2024-04-05 18:30:00', 2),
(11, NULL, '2024-04-10 17:00:00', '2024-04-10 18:30:00', 2),
(12, NULL, '2024-04-12 17:00:00', '2024-04-12 18:30:00', 2),
(13, NULL, '2024-04-17 17:00:00', '2024-04-17 18:30:00', 2),
(14, NULL, '2024-04-19 17:00:00', '2024-04-19 18:30:00', 2),
(15, NULL, '2024-04-24 17:00:00', '2024-04-24 18:30:00', 2),
(16, NULL, '2024-04-26 17:00:00', '2024-04-26 18:30:00', 2),
(17, NULL, '2024-05-01 17:00:00', '2024-05-01 18:30:00', 2),
(18, NULL, '2024-05-03 17:00:00', '2024-05-03 18:30:00', 2),
(21, NULL, '2024-03-03 16:00:00', '2024-03-03 18:00:00', 1),
(22, NULL, '2024-03-10 16:00:00', '2024-03-10 18:00:00', 1),
(23, NULL, '2024-03-17 16:00:00', '2024-03-17 18:00:00', 1),
(24, NULL, '2024-03-24 16:00:00', '2024-03-24 18:00:00', 1),
(25, NULL, '2024-03-31 16:00:00', '2024-03-31 18:00:00', 1),
(26, NULL, '2024-04-07 16:00:00', '2024-04-07 18:00:00', 1),
(27, NULL, '2024-04-14 16:00:00', '2024-04-14 18:00:00', 1),
(28, NULL, '2024-04-21 16:00:00', '2024-04-21 18:00:00', 1),
(29, NULL, '2024-04-28 16:00:00', '2024-04-28 18:00:00', 1),
(30, NULL, '2024-05-05 16:00:00', '2024-05-05 18:00:00', 1),
(31, NULL, '2023-12-05 17:30:00', '2023-12-07 17:30:00', 2),
(33, NULL, '2023-12-08 19:13:00', '2023-12-04 19:13:00', 2),
(34, NULL, '2023-12-01 19:15:00', '2023-12-08 19:15:00', 2),
(35, NULL, '2023-12-14 16:01:00', '2023-12-15 16:01:00', 3),
(36, 'afd', '2023-12-24 17:34:00', '2023-12-30 17:34:00', 2),
(37, 'asdf', '2023-12-15 17:38:00', '2023-12-16 17:38:00', 2),
(38, 'Soustředění', '2024-01-02 10:49:00', '2024-01-05 10:50:00', 3),
(39, 'Soustředění', '2024-01-02 10:49:00', '2024-01-05 10:50:00', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `CLENOVE`
--

CREATE TABLE `CLENOVE` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `datum_narozeni` date NOT NULL,
  `o_clenovi` varchar(500) DEFAULT NULL,
  `heslo` varchar(200) NOT NULL,
  `id_pravo` int(11) NOT NULL,
  `id_pozice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `CLENOVE`
--

INSERT INTO `CLENOVE` (`id`, `jmeno`, `prijmeni`, `email`, `tel`, `datum_narozeni`, `o_clenovi`, `heslo`, `id_pravo`, `id_pozice`) VALUES
(2, 'David', 'De Gea', 'david.degea@email.com', '+123456789', '1990-11-07', 'David De Gea je španělský profesionální fotbalový brankář...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 1),
(3, 'Alisson', 'Becker', 'alisson.becker@email.com', '+987654321', '1992-10-02', 'Alisson Becker je brazilský profesionální fotbalový brankář...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 1),
(4, 'Manuel', 'Neuer', 'manuel.neuer@email.com', '+555666777', '1986-03-27', 'Manuel Neuer je německý profesionální fotbalový brankář...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 1),
(5, 'Andrew', 'Robertson', 'andrew.robertson@email.com', '+111222333', '1994-03-11', 'Andrew Robertson je skotský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(6, 'Raphael', 'Varane', 'raphael.varane@email.com', '+444555666', '1993-04-25', 'Raphael Varane je francouzský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(7, 'Ruben', 'Dias', 'ruben.dias@email.com', '+777888999', '1997-05-14', 'Ruben Dias je portugalský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(8, 'João', 'Cancelo', 'joao.cancelo@email.com', '+333444555', '1994-05-27', 'João Cancelo je portugalský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(9, 'David', 'Alaba', 'david.alaba@email.com', '+888999000', '1992-06-24', 'David Alaba je rakouský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(10, 'Leonardo', 'Bonucci', 'leonardo.bonucci@email.com', '+222333444', '1987-05-01', 'Leonardo Bonucci je italský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(11, 'Sergio', 'Ramos', 'sergio.ramos@email.com', '+123123123', '1986-03-30', 'Sergio Ramos je španělský profesionální fotbalový obránce...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 2),
(12, 'Kevin', 'De Bruyne', 'kevin.debruyne@email.com', '+111222333', '1991-06-28', 'Kevin De Bruyne je belgický profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(13, 'NGolo', 'Kanté', 'ngolo.kante@email.com', '+444555666', '1991-03-29', 'NGolo Kanté je francouzský profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(14, 'Bruno', 'Fernandes', 'bruno.fernandes@email.com', '+777888999', '1994-09-08', 'Bruno Fernandes je portugalský profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(15, 'Luka', 'Modrić', 'luka.modric@email.com', '+333444555', '1985-09-09', 'Luka Modrić je chorvatský profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(16, 'Frenkie', 'de Jong', 'frenkie.dejong@email.com', '+888999000', '1997-05-12', 'Frenkie de Jong je nizozemský profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(17, 'Jordan', 'Henderson', 'jordan.henderson@email.com', '+222333444', '1990-06-17', 'Jordan Henderson je anglický profesionální fotbalový záložník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 3),
(18, 'Robert', 'Lewandowski', 'robert.lewandowski@email.com', '+111222333', '1988-08-21', 'Robert Lewandowski je polský profesionální fotbalový útočník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 4),
(19, 'Harry', 'Kane', 'harry.kane@email.com', '+444555666', '1993-07-28', 'Harry Kane je anglický profesionální fotbalový útočník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 4),
(20, 'Erling', 'Haaland', 'erling.haaland@email.com', '+777888999', '2000-07-21', 'Erling Haaland je norský profesionální fotbalový útočník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 4),
(21, 'Kylian', 'Mbappé', 'kylian.mbappe@email.com', '+333444555', '1998-12-20', 'Kylian Mbappé je francouzský profesionální fotbalový útočník...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 4, 4),
(22, 'Josep', 'Guardiola', 'josep.guardiola@email.com', '+111222333', '1971-01-18', 'Josep Guardiola je španělský fotbalový trenér...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 3, NULL),
(23, 'Jürgen', 'Klopp', 'jurgen.klopp@email.com', '+444555666', '1967-06-16', 'Jürgen Klopp je německý fotbalový trenér...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 3, NULL),
(24, 'Zinedine', 'Zidane', 'zinedine.zidane@email.com', '+777888999', '1972-06-23', 'Zinedine Zidane je francouzský fotbalový trenér...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 3, NULL),
(25, 'Florentino', 'Perez', 'florentino.perez@email.com', '+123123123', '1947-03-08', 'Florentino Pérez je španělský podnikatel a majitel Real Madrid...', '$2y$10$8ZLG/OfUranx8P9H.ITmwOrVWu8/UiFquaD0XxmaWbC1ypQ1GsW0q', 2, NULL),
(39, 'Matyáš', 'Mašek', 'masek.matyas@seznam.cz', '739503763', '2003-06-03', 'Autor, hlavní admin', '$2y$10$jKu/sH/CHe7PGvmXSHyj4eC/t3.xROz3I7xc.04jhGzxqwNZBBWIm', 1, NULL),
(71, 'hrac', 'hrac1', 'hrac@hrac.cz', '123456', '2023-12-18', 'hrac zkouska', '$2y$10$Gcts2y1t0bFHuND54lwlOOsHJylkYAQMhRfp3Xsdmj3Htv2eZV.4W', 4, 3),
(72, 'Trenér', 'Trenér', 'trener@trener.cz', '123456789', '2023-12-18', 'Trenér zkouška', '$2y$10$fviZNdkyw7jUGKVr9oSLcuX13xf8fsAqf2N/PVktHrHhqG9owXjnm', 3, NULL),
(73, 'Majitel', 'Majitel', 'majitel@majitel.cz', '123456789', '2023-12-18', 'Majitel zkouška', '$2y$10$DPIiBmpAJ.apR65p2q8YQ.ddMWMi7O0dljOEDDh4MwS5dQYo6SKO6', 2, NULL),
(142, 'hrac', 'hrac2', 'hrac2@hrac2.cz', '1234', '2023-12-19', 'Hráč s fotkou', '$2y$10$RetNW9Ebmcoghw34mPo6UuRHtlk8xGE9F5qEIN20Zg6rqVu9xXk3G', 4, 4),
(143, 'Trenér', 'Trenér2', 'trener2@trener2.cz', '12345', '2023-12-19', 'Trenér s fotkou', '$2y$10$/vm8mBqc669oLGaET28sPeiJ0hkH.3XaraX8ZGjMo5IiT/jaEIszm', 3, NULL),
(144, 'Majitel', 'Majitel2', 'majitel2@majitel2.cz', '12345', '2023-12-19', 'Majitel s fotkou', '$2y$10$ibv104fKe2AFLEcDRxMMcOoPFgooORHSJVEjRL55CfnREnR2QfVx2', 2, NULL),
(148, 'Admin', 'Admin', 'admin@admin.cz', '12345', '2023-12-19', 'Admin s fotkou', '$2y$10$WpHeIxEPe7rUT4vdbpFbm./xDHzoXB4NwHGz/5/Ncfmao254X2zKi', 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `POZICE`
--

CREATE TABLE `POZICE` (
  `id` int(11) NOT NULL,
  `nazev_pozice` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `POZICE`
--

INSERT INTO `POZICE` (`id`, `nazev_pozice`) VALUES
(1, 'Brankář'),
(2, 'Obránce'),
(3, 'Záložník'),
(4, 'Útočník');

-- --------------------------------------------------------

--
-- Struktura tabulky `PRAVO`
--

CREATE TABLE `PRAVO` (
  `id` int(11) NOT NULL,
  `nazev_prava` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `PRAVO`
--

INSERT INTO `PRAVO` (`id`, `nazev_prava`) VALUES
(1, 'Admin'),
(2, 'Majitel'),
(3, 'Trenér'),
(4, 'Hráč');

-- --------------------------------------------------------

--
-- Struktura tabulky `SE_UCASTNI`
--

CREATE TABLE `SE_UCASTNI` (
  `id_akce` int(11) DEFAULT NULL,
  `id_clena` int(11) DEFAULT NULL,
  `muze_se_ucastnit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `SE_UCASTNI`
--

INSERT INTO `SE_UCASTNI` (`id_akce`, `id_clena`, `muze_se_ucastnit`) VALUES
(24, 39, 1),
(23, 71, 0),
(21, 71, 1),
(22, 71, 0),
(24, 71, 0),
(25, 71, 1),
(30, 71, 1),
(34, 71, 0),
(31, 71, 0),
(35, 71, 0),
(38, 71, 1),
(39, 71, 0),
(21, 72, 1),
(22, 72, 1),
(23, 72, 1),
(34, 72, 1),
(31, 72, 1),
(33, 72, 1),
(35, 72, 1),
(38, 72, 1),
(39, 72, 1),
(21, 73, 0),
(22, 73, 1),
(23, 73, 0),
(34, 73, 0),
(31, 73, 0),
(33, 73, 0),
(35, 73, 1),
(38, 73, 1),
(39, 73, 1),
(21, 39, 1),
(22, 39, 0),
(23, 39, 1),
(35, 39, 1),
(38, 39, 1),
(39, 39, 0),
(34, 39, 0),
(31, 39, 0),
(33, 39, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `TYP_AKCE`
--

CREATE TABLE `TYP_AKCE` (
  `id` int(11) NOT NULL,
  `nazev_typu_akce` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vypisuji data pro tabulku `TYP_AKCE`
--

INSERT INTO `TYP_AKCE` (`id`, `nazev_typu_akce`) VALUES
(1, 'Zápas'),
(2, 'Trénink'),
(3, 'Ostatní');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `AKCE`
--
ALTER TABLE `AKCE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_TYP_AKCE` (`id_typ_akce`);

--
-- Indexy pro tabulku `CLENOVE`
--
ALTER TABLE `CLENOVE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `fk_PRAVO` (`id_pravo`),
  ADD KEY `fk_POZICE` (`id_pozice`);

--
-- Indexy pro tabulku `POZICE`
--
ALTER TABLE `POZICE`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `PRAVO`
--
ALTER TABLE `PRAVO`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `SE_UCASTNI`
--
ALTER TABLE `SE_UCASTNI`
  ADD UNIQUE KEY `unique_combination` (`id_akce`,`id_clena`),
  ADD KEY `id_akce` (`id_akce`),
  ADD KEY `id_clena` (`id_clena`);

--
-- Indexy pro tabulku `TYP_AKCE`
--
ALTER TABLE `TYP_AKCE`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `AKCE`
--
ALTER TABLE `AKCE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pro tabulku `CLENOVE`
--
ALTER TABLE `CLENOVE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `AKCE`
--
ALTER TABLE `AKCE`
  ADD CONSTRAINT `fk_AKCE_TYP_AKCE1` FOREIGN KEY (`id_typ_akce`) REFERENCES `TYP_AKCE` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `CLENOVE`
--
ALTER TABLE `CLENOVE`
  ADD CONSTRAINT `fk_CLENOVE_POZICE1` FOREIGN KEY (`id_pozice`) REFERENCES `POZICE` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLENOVE_PRAVO` FOREIGN KEY (`id_pravo`) REFERENCES `PRAVO` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `SE_UCASTNI`
--
ALTER TABLE `SE_UCASTNI`
  ADD CONSTRAINT `se_ucastni_ibfk_1` FOREIGN KEY (`id_akce`) REFERENCES `AKCE` (`id`),
  ADD CONSTRAINT `se_ucastni_ibfk_2` FOREIGN KEY (`id_clena`) REFERENCES `CLENOVE` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
