-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2018 a las 20:54:02
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_categoria` (IN `id_ccat` INT(11))  BEGIN
delete from categoria where id_cat= id_ccat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_producto` (IN `id_prod` INT(6))  BEGIN
delete from producto where id_prod= id_prod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_categoria` (IN `nnombre` VARCHAR(20), IN `ddescripcion` VARCHAR(200))  BEGIN
INSERT INTO categoria (nombre,descripcion) VALUES(nnombre,ddescripcion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_producto` (IN `id_ccat` INT(11), IN `nnombre` VARCHAR(20), IN `vvalor` INT(7), IN `ccantidad` INT(6))  BEGIN
INSERT INTO producto (id_cat, nombre,valor,cantidad) VALUES(id_ccat,nnombre,vvalor,ccantidad);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre`, `descripcion`) VALUES
(12, 'asasd', 'asdasdsssssss'),
(19, 'categoria', 'desc categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(6) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `valor` int(7) DEFAULT NULL,
  `cantidad` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `id_cat`, `nombre`, `valor`, `cantidad`) VALUES
(14, 19, 'producto1', 1, 2),
(15, 12, 'producto1', 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `productos` (
`nombreprod` varchar(20)
,`nombre` varchar(20)
,`valor` int(7)
,`cantidad` int(6)
,`id_prod` int(6)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_cat`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_cat` (
`id_cat` int(11)
,`nombre` varchar(20)
,`descripcion` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `productos`
--
DROP TABLE IF EXISTS `productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productos`  AS  select `p`.`nombre` AS `nombreprod`,`ca`.`nombre` AS `nombre`,`p`.`valor` AS `valor`,`p`.`cantidad` AS `cantidad`,`p`.`id_prod` AS `id_prod` from (`producto` `p` join `categoria` `ca` on((`p`.`id_cat` = `ca`.`id_cat`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_cat`
--
DROP TABLE IF EXISTS `vista_cat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_cat`  AS  select `categoria`.`id_cat` AS `id_cat`,`categoria`.`nombre` AS `nombre`,`categoria`.`descripcion` AS `descripcion` from `categoria` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
