-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Okt 28. 15:17
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `dors`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `carriers`
--

CREATE TABLE `carriers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `FirID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `simcards`
--

CREATE TABLE `simcards` (
  `ID` int(11) NOT NULL,
  `PhoneID` int(11) DEFAULT NULL,
  `Slot` tinyint(4) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `IMSI` varchar(100) DEFAULT NULL,
  `Expiration` date DEFAULT NULL,
  `MobilnetExpiration` date DEFAULT NULL,
  `MobilnetDataLimit` int(11) DEFAULT NULL,
  `MobilnetIP` varchar(100) DEFAULT NULL,
  `CarrierID` int(11) DEFAULT NULL,
  `Package` varchar(100) DEFAULT NULL,
  `TypeID` int(11) DEFAULT NULL,
  `Activated` tinyint(4) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Creator` int(11) DEFAULT NULL,
  `Created` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Updater` int(11) DEFAULT NULL,
  `Updated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `types`
--

CREATE TABLE `types` (
  `ID` int(11) NOT NULL,
  `Group` tinyint(4) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Created` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Updated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `simcards`
--
ALTER TABLE `simcards`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `carriers`
--
ALTER TABLE `carriers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `simcards`
--
ALTER TABLE `simcards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `types`
--
ALTER TABLE `types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
