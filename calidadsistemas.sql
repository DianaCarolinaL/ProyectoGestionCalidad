-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2018 a las 21:16:47
-- Versión del servidor: 5.5.53-0+deb8u1
-- Versión de PHP: 7.0.13-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `calidadsistemas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
`ID` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`ID`, `nombre`, `email`, `contrasenia`) VALUES
(1, 'administrador', 'admin@ufps.edu.co', '$2y$10$VvI6xKm21TluhdlFZzIbX.QjAnHOPZxL3EBz8uMD1VQs53WdpqKFy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'planeación  estrategica'),
(2, 'aspectos curriculares'),
(3, 'autoevaluacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desc_img` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `id_admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
`id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_contenido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE IF NOT EXISTS `formacion` (
`id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tesis` text COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documentos`
--

CREATE TABLE IF NOT EXISTS `gestion_documentos` (
  `id_documento` int(11) NOT NULL,
  `fecha_modificacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `expide` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `version` decimal(10,1) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `revisado` tinyint(1) NOT NULL DEFAULT '0',
  `aprobado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`id` int(11) NOT NULL,
  `identificacion` int(15) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dir_laboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `competencias` text COLLATE utf8_spanish_ci NOT NULL,
  `url_cvlac` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `identificacion`, `nombre`, `apellidos`, `telefono`, `email`, `cargo`, `imagen`, `dir_laboral`, `competencias`, `url_cvlac`) VALUES
(1, 2147483647, 'werwerwer', 'werwerwer', '324234234', 'admin@ufps.edu.co', 'werwer', 'fb.png', 'dfsdfsdfsdf', 'sdfsdfsdfsdf', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
`id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria`
--

CREATE TABLE IF NOT EXISTS `sub_categoria` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sub_categoria`
--

INSERT INTO `sub_categoria` (`id`, `nombre`, `id_categoria`) VALUES
(4, 'Politicas de Calidad', 2),
(5, 'Objetivos de Calidad', 2),
(6, 'Estructura Organizacional', 3),
(7, 'Equipo de Trabajo', 3),
(28, 'Aspectos Generales', 1),
(30, 'Modelo de Objetos', 1),
(31, 'Modelo de Actores', 1),
(32, 'Modelo Documental', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria2`
--

CREATE TABLE IF NOT EXISTS `sub_categoria2` (
`id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_subcategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_categoria2`
--

INSERT INTO `sub_categoria2` (`id`, `nombre`, `id_subcategoria`) VALUES
(3, 'Mision', 28),
(4, 'Vision', 28),
(5, 'Objetivos', 28),
(6, 'Nueva Categoria', 30),
(7, 'Nueva Categoria', 30),
(8, 'Nueva categoria', 31);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
 ADD PRIMARY KEY (`id`), ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
 ADD PRIMARY KEY (`id`), ADD KEY `id_contenido` (`id_contenido`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
 ADD PRIMARY KEY (`id`), ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `gestion_documentos`
--
ALTER TABLE `gestion_documentos`
 ADD PRIMARY KEY (`id_documento`), ADD KEY `id_documento` (`id_documento`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
 ADD PRIMARY KEY (`id`), ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
 ADD PRIMARY KEY (`id`), ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `sub_categoria2`
--
ALTER TABLE `sub_categoria2`
 ADD PRIMARY KEY (`id`), ADD KEY `id_subcategoria` (`id_subcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `sub_categoria2`
--
ALTER TABLE `sub_categoria2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administradores` (`ID`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formacion`
--
ALTER TABLE `formacion`
ADD CONSTRAINT `formacion_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_documentos`
--
ALTER TABLE `gestion_documentos`
ADD CONSTRAINT `gestion_documentos_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_categoria`
--
ALTER TABLE `sub_categoria`
ADD CONSTRAINT `sub_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_categoria2`
--
ALTER TABLE `sub_categoria2`
ADD CONSTRAINT `sub_categoria2_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `sub_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
