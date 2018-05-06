-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-04-2018 a las 08:39:42
-- Versión del servidor: 5.6.39
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ulance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id`, `nombre`, `imagen`) VALUES
(1, 'BBVA', 'https://yt3.ggpht.com/a-/AJLlDp3O_EBSqjpO_fnOVu7yh1rUYHSOXYYhBu8H3Q=s900-mo-c-c0xffffffff-rj-k-no'),
(2, 'Santander', 'https://www.santander.cl/css/bitmaps/santander_facebook.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriamovimiento`
--

CREATE TABLE `categoriamovimiento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoriamovimiento`
--

INSERT INTO `categoriamovimiento` (`id`, `descripcion`) VALUES
(1, 'Trabajo'),
(2, 'Impuestos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentaasociada`
--

CREATE TABLE `cuentaasociada` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `cuentabancaria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuentaasociada`
--

INSERT INTO `cuentaasociada` (`id`, `descripcion`, `usuario_id`, `cuentabancaria_id`) VALUES
(1, 'Cuenta BBVA', 1, 3),
(2, 'Cuenta BBVA', 1, 5),
(3, 'Cuenta Santander', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabancaria`
--

CREATE TABLE `cuentabancaria` (
  `id` int(11) NOT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuentabancaria`
--

INSERT INTO `cuentabancaria` (`id`, `iban`, `banco_id`) VALUES
(3, 'ES11 5814 7570 5329 7994 4195', 1),
(4, 'ES77 7258 7103 5689 2786 0325', 2),
(5, 'ES93 2214 7600 5314 0294 4188', 1),
(6, 'ES18 0000 7600 9115 3330 2094', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `categoriamovimiento_id` int(11) NOT NULL,
  `cuentabancaria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `concepto`, `cantidad`, `fecha`, `categoriamovimiento_id`, `cuentabancaria_id`) VALUES
(4, 'Hosting Bacalaos S.A', 300, '2018-02-01 13:19:30', 1, 3),
(5, 'Impuesto circulación', -50, '2018-02-01 00:00:00', 2, 3),
(6, 'Desarrollo Web - Macareno S.L', 3000, '2017-12-06 15:45:28', 1, 5),
(7, 'Prueba 07', 250, '2018-04-12 00:00:00', 1, 5),
(8, 'Prueba 08', 150, '2018-03-21 00:00:00', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primerapellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundoapellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipousuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `primerapellido`, `segundoapellido`, `login`, `pass`, `email`, `tipousuario_id`) VALUES
(1, 'Julian', 'Martinez', 'Cordones', 'lian', 'ff7f4b05b7380f86e87e3e102c2302e5cd98b96027eec7ca5146acd7b776f98d', 'macareno@gmail.com', 1),
(2, 'Squall', 'Leonhart', 'Loire', 'squall', '82db894f7a7fd3c2ec9c32eb65243fdc70c59c6ea3cd88ccac1105b9cc3d98e9', 'squallFF8@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriamovimiento`
--
ALTER TABLE `categoriamovimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentaasociada`
--
ALTER TABLE `cuentaasociada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuentaasociada_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_cuentaasociada_cuenta1_idx` (`cuentabancaria_id`);

--
-- Indices de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuenta_banco1_idx` (`banco_id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_movimiento_tipomovimiento1_idx` (`categoriamovimiento_id`),
  ADD KEY `fk_movimiento_cuenta1_idx` (`cuentabancaria_id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_tipousuario_idx` (`tipousuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoriamovimiento`
--
ALTER TABLE `categoriamovimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuentaasociada`
--
ALTER TABLE `cuentaasociada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentaasociada`
--
ALTER TABLE `cuentaasociada`
  ADD CONSTRAINT `fk_cuentaasociada_cuenta1` FOREIGN KEY (`cuentabancaria_id`) REFERENCES `cuentabancaria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuentaasociada_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD CONSTRAINT `fk_cuenta_banco1` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento_cuenta1` FOREIGN KEY (`cuentabancaria_id`) REFERENCES `cuentabancaria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_tipomovimiento1` FOREIGN KEY (`categoriamovimiento_id`) REFERENCES `categoriamovimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`tipousuario_id`) REFERENCES `tipousuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
