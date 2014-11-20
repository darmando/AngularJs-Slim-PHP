-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2014 a las 21:44:40
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `testagular`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_precios`
--

CREATE TABLE IF NOT EXISTS `cat_precios` (
`cat_prec_id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cat_precios`
--

INSERT INTO `cat_precios` (`cat_prec_id`, `nombre`, `precio`) VALUES
(2, 'enriques', 23.5),
(5, 'TESTs', 234);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_precios`
--
ALTER TABLE `cat_precios`
 ADD PRIMARY KEY (`cat_prec_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_precios`
--
ALTER TABLE `cat_precios`
MODIFY `cat_prec_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
