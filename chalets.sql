-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2016 a las 20:04:57
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chalets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `image` varchar(10) NOT NULL,
  `autor` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `codigo`, `titulo`, `descripcion`, `image`, `autor`) VALUES
(2, 'R-ejm1', 'El Carma de Nestor', 'Ut sed tortor luctus, gravida nibh eget, volutpat odio. Proin rhoncus, sapien\r\n								mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum\r\n								condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus\r\n								ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque\r\n								eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et\r\n								turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius.\r\n								Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>\r\n								<p>Mauris eleifend eleifend felis aliquet ornare. Vestibulum porta velit at elementum\r\n								gravida nibh eget, volutpat odio. Proin rhoncus, sapien\r\n								mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum\r\n								condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus\r\n								ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque\r\n								eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et\r\n								turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius.\r\n								Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>\r\n								<p>Vestibulum pellentesque posuere lorem non aliquam. Mauris eleifend eleifend\r\n								felis aliquet ornare. Vestibulum porta velit at elementum elementum.', 'a29710.png', 'en construccion'),
(3, 'rtyui', 'Hola Mundo', '2do post', 'a82539.jpg', 'en construccion'),
(4, '1', 'yisus volvio', 'holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'a41683.jpg', 'en construccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chalet`
--

CREATE TABLE IF NOT EXISTS `chalet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `image` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `chalet`
--

INSERT INTO `chalet` (`id`, `codigo`, `nombre`, `estado`, `ubicacion`, `image`) VALUES
(1, 'R-123', 'los arkangeles', '2', 'mérida', 'a52489.png'),
(2, 'R-088', 'mi castillo', '1', 'mérida', 'a63508.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `capacidad_personas` int(3) NOT NULL,
  `piso` int(2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `chalet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chalet` (`chalet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

CREATE TABLE IF NOT EXISTS `huesped` (
  `ci` varchar(30) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_habitaciones` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_habitaciones` (`id_habitaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `codigo` int(6) NOT NULL,
  `fecha_reservacion` date NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `huesped` varchar(30) NOT NULL,
  `habitacion` int(3) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `huesped` (`huesped`),
  KEY `habitacion` (`habitacion`),
  KEY `huesped_2` (`huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ci` int(8) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `clave`, `nombre`, `apellido`, `email`) VALUES
(1, 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'julian', 'Prueba', 'prueba@prueba.com'),
(2, 23721652, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rosa', 'Uzcategui', 'rosa_valentina@outlook.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`chalet`) REFERENCES `chalet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_habitaciones`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`habitacion`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`huesped`) REFERENCES `huesped` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
