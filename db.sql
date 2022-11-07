-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 07-11-2022 a las 11:41:40
-- Versión del servidor: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- Versión de PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Memes`
--
CREATE DATABASE IF NOT EXISTS `Memes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Memes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Memes`
--

CREATE TABLE `Memes` (
  `ID` int(11) NOT NULL,
  `ruta` varchar(800) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Memes`
--

INSERT INTO `Memes` (`ID`, `ruta`, `IdUsuario`) VALUES
(29, 'Bartus_281022110906.jpg', 4),
(30, 'farra_281022111521.jpg', 1),
(31, 'farra_281022112234.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(222) NOT NULL,
  `Nombre` varchar(343) NOT NULL,
  `Pwd` varchar(343) NOT NULL,
  `Foto` varchar(343) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Pwd`, `Foto`) VALUES
(1, 'farra', '4243', '00160079.jpg'),
(3, 'hola', '4243', '00160071.jpg'),
(4, 'Bartus', '4243', '00160142.jpg'),
(5, 'ana', '4243', '00160142.jpg'),
(6, 'manuel', '4243', 'bw_wallpaper_1_1920.jpg'),
(7, 'farra1', '4243', '00160154.jpg'),
(8, 'farra2', '4243', '00160096.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Memes`
--
ALTER TABLE `Memes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER_ID` (`IdUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Memes`
--
ALTER TABLE `Memes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Memes`
--
ALTER TABLE `Memes`
  ADD CONSTRAINT `USER_ID` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
