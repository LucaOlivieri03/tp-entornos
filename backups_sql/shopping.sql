-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2024 a las 21:23:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopping`
--
CREATE DATABASE IF NOT EXISTS `shopping` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `shopping`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `local_cod` int(11) NOT NULL,
  `local_nombre` varchar(100) NOT NULL,
  `local_ubicacion` varchar(50) NOT NULL,
  `local_rubro` varchar(20) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `novedad_cod` int(11) NOT NULL,
  `novedad_texto` varchar(200) NOT NULL,
  `promo_fechain` date NOT NULL,
  `promo_fechafin` date NOT NULL,
  `novedad_categoria` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `promo_cod` int(11) NOT NULL,
  `promo_texto` varchar(200) NOT NULL,
  `promo_fechain` date NOT NULL,
  `promo_fechafin` date NOT NULL,
  `usuario_categoria` varchar(10) NOT NULL,
  `promo_dias` varchar(56) NOT NULL,
  `promo_estado` varchar(10) NOT NULL,
  `local_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usopromociones`
--

CREATE TABLE `usopromociones` (
  `usuario_id` int(11) NOT NULL,
  `promo_cod` int(11) NOT NULL,
  `usoprom_fecha` date NOT NULL,
  `usoprom_estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_mail` varchar(100) NOT NULL,
  `usuario_psw` varchar(60) NOT NULL,
  `usuario_tipo` varchar(15) NOT NULL,
  `usuario_categoria` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`local_cod`,`local_nombre`),
  ADD UNIQUE KEY `local_cod` (`local_cod`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`novedad_cod`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`promo_cod`),
  ADD KEY `local_cod` (`local_cod`);

--
-- Indices de la tabla `usopromociones`
--
ALTER TABLE `usopromociones`
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `promocion_cod` (`promo_cod`),
  ADD KEY `promo_cod` (`promo_cod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`,`usuario_mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `local_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `novedad_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `promo_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `locales`
--
ALTER TABLE `locales`
  ADD CONSTRAINT `locales_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`local_cod`) REFERENCES `locales` (`local_cod`);

--
-- Filtros para la tabla `usopromociones`
--
ALTER TABLE `usopromociones`
  ADD CONSTRAINT `usopromociones_ibfk_1` FOREIGN KEY (`promo_cod`) REFERENCES `promociones` (`promo_cod`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usopromociones` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
