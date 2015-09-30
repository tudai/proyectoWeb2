-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2015 a las 00:23:36
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2dai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(200) NOT NULL,
  `autor_libro` varchar(200) NOT NULL,
  `img_libro` varchar(300) NOT NULL,
  `url_libro` varchar(200) NOT NULL,
  `seccion_id_seccion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre_libro`, `autor_libro`, `img_libro`, `url_libro`, `seccion_id_seccion`) VALUES
(1, 'El fin de la eternidad', 'Isaac Asimov', 'uploaded/books//560c21ab8e219El fin de la eternidad - Isaac Asimov.epub/cover.jpg', 'uploaded/books//560c21ab8e219El fin de la eternidad - Isaac Asimov.epub/El fin de la eternidad - Isaac Asimov.epub', 9),
(2, 'Trilogia Los juegos de Hambre', 'Suzanne Collins', 'uploaded/books//560c54c82a787Trilogia Los juegos del hambre - Suzanne Collins (4).epub/cover.jpg', 'uploaded/books//560c54c82a787Trilogia Los juegos del hambre - Suzanne Collins (4).epub/Trilogia Los juegos del hambre - Suzanne Collins (4).epub', 9),
(3, 'El nuevo manifiesto de la Web 2.0', 'Toni Martin-Avila', 'uploaded/books//560c55220443eEl-nuevo-Manifiesto-de-la-web-20.pdf/cover.jpg', 'uploaded/books//560c55220443eEl-nuevo-Manifiesto-de-la-web-20.pdf/El-nuevo-Manifiesto-de-la-web-20.pdf', 11),
(4, 'Juego de tronos', 'George R. R. Martin', 'uploaded/books//560c554c0a1edJuego de tronos - George R. R. Martin (4).epub/cover.jpg', 'uploaded/books//560c554c0a1edJuego de tronos - George R. R. Martin (4).epub/Juego de tronos - George R. R. Martin (4).epub', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre_seccion`) VALUES
(9, 'Novela'),
(11, 'Conocimiento General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'vicky', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `fk_libro_seccion_idx` (`seccion_id_seccion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_seccion` FOREIGN KEY (`seccion_id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
