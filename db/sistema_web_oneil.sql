-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-12-2020 a las 20:37:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Nombre de la Base de datos: `sistemaWeb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador', 1),
(2, 'usuario', 'e6c6f0bd956e9147cc453a9708f4926f8e60e477', 'Usuario Normal', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE IF NOT EXISTS `estudiantes` (
`idobs` int(11) NOT NULL,
  `idalumno` int(11) DEFAULT NULL,
  `codalumno` int(11) DEFAULT NULL,
  `codreg` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `nombres` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `correo` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `telef` int(11) NOT NULL,
  `repre` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `obs` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Tabla observacion';

--
-- Volcado de datos para la tabla `matriculaobs`
--

INSERT INTO `estudiantes` (`idobs`, `idalumno`, `codalumno`, `codreg`, `nombres`, `correo`, `telef`, `repre`, `fecha`, `obs`) VALUES
(1, 5175, 23980956, '42128306141AAGEJE151018', 'Villa Prado José', 'villa_pra12@outlook.com', '0987562322', 'Villalta Rojas Carlos', '2018-10-15', 'PAGO MEDIA BECA AL CONTADO '),
(9, 2343, 32456786, '343453', 'Vera Cruz William', 'William_vera1995@outlook.com', '0987991231', 'Saabedra Quispe Jorge', '2018-10-15', 'PAGO ADELANTADO UNA CUOTA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `matriculaobs`
--
ALTER TABLE `estudiantes`
 ADD PRIMARY KEY (`idobs`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `matriculaobs`
--
ALTER TABLE `estudiantes`
MODIFY `idobs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
