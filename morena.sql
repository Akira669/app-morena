-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2018 a las 02:38:49
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `morena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidopaterno` varchar(255) DEFAULT NULL,
  `apellidomaterno` varchar(20) DEFAULT NULL,
  `calle` varchar(20) DEFAULT NULL,
  `numext` varchar(20) DEFAULT NULL,
  `numint` varchar(20) DEFAULT NULL,
  `colonia` varchar(20) DEFAULT NULL,
  `codigopostal` int(10) DEFAULT NULL,
  `seccion` int(10) DEFAULT NULL,
  `claveelector` varchar(18) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `apellidopaterno`, `apellidomaterno`, `calle`, `numext`, `numint`, `colonia`, `codigopostal`, `seccion`, `claveelector`, `estado`) VALUES
(1, 'Guillermo ', 'Reyes', 'Martinez', 'Toluca', 'Mz 83', 'Lt 01', 'Guadalupana I', 56616, 1000, 'REMG9102279T6', '1'),
(20, 'Ignacio ', 'Ponce', 'Leon', 'Toluca', 'Mz 14', 'Lt 25', 'Guadalupana', 56616, 1000, 'REMG9102279T61', '1'),
(21, 'Sandra', 'Zaragoza', 'Ponce', 'Altamirano ', 'Mz 55', 'Lt 49', 'San Isidro ', 56617, 1000, 'REMG9102279T62', '1'),
(22, 'Pedro ', 'Ramos', 'Leon', 'Ote 50 ', 'Mz 14', 'Lt 25', 'Providencia ', 56616, 1001, 'JODUF773HDIKSD', '1'),
(23, 'Sandra ', 'Lopez', 'Gomez', 'Ote 44a', 'Mz 134', 'Lt 34', 'Guadalupana II', 56616, 1000, 'SAKDFJWDJF83747S', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `social_id`, `picture`, `created`) VALUES
(1, 'Admistrador', 'guillermo.reyes@abits.com', 'fd6169ec46aca35abb693ccf148bd5bc', '', '', '2018-05-07 20:59:36'),
(3, 'Admin', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', '', '', '2018-05-09 15:10:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `claveelector` (`claveelector`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`),
  ADD KEY `login` (`password`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
