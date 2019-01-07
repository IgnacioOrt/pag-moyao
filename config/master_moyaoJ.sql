-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2019 a las 10:38:05
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `master_moyao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`username`, `password`) VALUES
('admin', 'aecdee96e9359dbd81fca2ce1984501493f328d445225d123f4c202f2928ee5e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_pagina` int(11) NOT NULL,
  `archivo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_pagina`, `archivo`) VALUES
(4, 'archivos//48422310_10156115285177957_2022257683142279168_n.png'),
(6, 'archivos//49441974_2113485415357390_1793538695966490624_n.jpg'),
(7, 'archivos//49070787_1145191082310124_8929617143054467072_o.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `title` text,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `title`, `content`) VALUES
(1, 'Dios Santo', '<p>jajajaj</p>'),
(2, 'goblin slayer', ''),
(3, 'goblin slayer', ''),
(4, 'shingeky', ''),
(5, 'shingeky', ''),
(6, 'Hola', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

CREATE TABLE `sitio` (
  `title` text,
  `description` text,
  `picture` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sitio`
--

INSERT INTO `sitio` (`title`, `description`, `picture`) VALUES
('M.C. Yolanda Moyao Martínez', NULL, 'admin/fondos/descarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subpagina`
--

CREATE TABLE `subpagina` (
  `id_pagina` int(11) NOT NULL,
  `pagina_superior` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indices de la tabla `subpagina`
--
ALTER TABLE `subpagina`
  ADD UNIQUE KEY `id_pagina` (`id_pagina`),
  ADD KEY `pagina_superior` (`pagina_superior`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subpagina`
--
ALTER TABLE `subpagina`
  ADD CONSTRAINT `subpagina_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `pagina` (`id_pagina`),
  ADD CONSTRAINT `subpagina_ibfk_2` FOREIGN KEY (`pagina_superior`) REFERENCES `pagina` (`id_pagina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
