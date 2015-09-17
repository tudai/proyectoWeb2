-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-09-2015 a las 20:11:10
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `web2dai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_libro`
--

CREATE TABLE IF NOT EXISTS `categoria_libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fk_libro` int(11) NOT NULL,
  `id_fk_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fk_libro` (`id_fk_libro`),
  KEY `id_fk_categoria` (`id_fk_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_libro` varchar(200) NOT NULL,
  `descripcion_libro` varchar(400) NOT NULL,
  `url_libro` varchar(200) NOT NULL,
  `seccion_id_seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `fk_libro_seccion_idx` (`seccion_id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_seccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  ADD CONSTRAINT `id_fk_categoria` FOREIGN KEY (`id_fk_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `id_fk_libro` FOREIGN KEY (`id_fk_libro`) REFERENCES `libro` (`id_libro`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_seccion` FOREIGN KEY (`seccion_id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
