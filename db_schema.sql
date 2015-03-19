-- phpMyAdmin SQL Dump
-- version 4.4.0-beta1
-- http://www.phpmyadmin.net
--
-- Gép: localhost
-- Létrehozás ideje: 2015. Már 19. 10:30
-- Kiszolgáló verziója: 5.6.23-1~dotdeb.1
-- PHP verzió: 5.4.38-1~dotdeb.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `solar`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `battVolt` float NOT NULL,
  `pvVolt` float NOT NULL,
  `battCurr` float NOT NULL,
  `chargePower` int(11) NOT NULL,
  `energyGen` float NOT NULL,
  `maxBattVolt` float NOT NULL,
  `minBattVolt` float NOT NULL,
  `battState` varchar(8) NOT NULL,
  `chargeState` varchar(10) NOT NULL,
  `soc` int(11) NOT NULL,
  `remoteTemp` float NOT NULL,
  `localTemp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time` (`time`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
