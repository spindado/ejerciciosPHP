-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-03-2019 a las 20:40:17
-- Versión del servidor: 5.6.38
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`) VALUES
(1, 'Chalet'),
(2, 'Adosado'),
(3, 'Piso'),
(4,'Apartamento');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

CREATE TABLE `viviendas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(11) NOT NULL,
  `zona` varchar(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `dormitorios` int(11) NOT NULL,
  `garage` varchar(2) NOT NULL,
  `jardin` varchar(2) NOT NULL,
  `padel` varchar(2) NOT NULL,
  `piscina` varchar(2) NOT NULL,
  `zonascomunes` varchar(2) NOT NULL,
  `imagen` varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`tipo`, `zona`, `precio`, `dormitorios`, `garage`, `jardin`, `padel`, `piscina`, `zonascomunes` ,`imagen`) VALUES
('Chalet', 'Majadahonda', 200000, 3, 'si', 'no', 'si', 'si', 'no','Null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `lugar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `lugar`) VALUES
(1, 'Majadahonda'),
(2, 'Pozuelo'),
(3, 'Las Rozas'),
(4, 'Villalba'),
(5, 'Galapagar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipos`

-- Indices de la tabla `zonas`
--
