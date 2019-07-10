-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2019 a las 13:22:47
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conferencia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizaCupos` (IN `id` INT)  BEGIN
UPDATE conferencias
SET conf_cupos = conf_cupos + 1
WHERE conf_id = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `asi_id` int(255) NOT NULL,
  `conf_id` int(255) DEFAULT NULL,
  `asi_confirmacion` tinyint(1) DEFAULT NULL,
  `asi_prioridad` int(3) DEFAULT NULL,
  `asi_estado` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`asi_id`, `conf_id`, `asi_confirmacion`, `asi_prioridad`, `asi_estado`, `created_at`, `updated_at`) VALUES
(51, 1, 1, 0, 'confirmado', '2019-07-09 22:30:41', '2019-07-09 22:30:41'),
(52, 5, 0, 1, 'pendiente', '2019-07-09 22:42:29', '2019-07-09 22:42:29'),
(56, 8, 1, 0, 'confirmado', '2019-07-09 23:17:12', '2019-07-09 23:17:12'),
(57, 5, 0, 2, 'pendiente', '2019-07-09 23:19:35', '2019-07-09 23:19:35'),
(58, 9, 1, 0, 'confirmado', '2019-07-09 23:20:33', '2019-07-09 23:20:33'),
(59, 9, 1, 0, 'confirmado', '2019-07-09 23:21:52', '2019-07-09 23:21:52'),
(60, 4, 1, 0, 'confirmado', '2019-07-09 23:22:44', '2019-07-09 23:22:44'),
(61, 6, 1, 0, 'confirmado', '2019-07-09 23:22:57', '2019-07-09 23:22:57'),
(62, 2, 1, 0, 'confirmado', '2019-07-09 23:26:19', '2019-07-09 23:26:19'),
(63, 1, 1, 0, 'confirmado', '2019-07-10 13:17:44', '2019-07-10 13:17:44'),
(64, 1, 1, 0, 'confirmado', '2019-07-10 13:17:53', '2019-07-10 13:17:53'),
(65, 5, 0, 3, 'pendiente', '2019-07-10 13:18:28', '2019-07-10 13:18:28'),
(66, 5, 0, 4, 'pendiente', '2019-07-10 13:18:43', '2019-07-10 13:18:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE `conferencias` (
  `conf_id` int(255) NOT NULL,
  `conf_tema` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `conf_descripcion` text CHARACTER SET utf8,
  `conf_area` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `conf_cupos` int(3) DEFAULT NULL,
  `pon_id` int(255) DEFAULT NULL,
  `lab_id` int(10) DEFAULT NULL,
  `hor_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conferencias`
--

INSERT INTO `conferencias` (`conf_id`, `conf_tema`, `conf_descripcion`, `conf_area`, `conf_cupos`, `pon_id`, `lab_id`, `hor_id`) VALUES
(1, 'Estudio de escenarios de derrame de hidrocarburos en el medio marino ', NULL, 'Física', 3, 1, 1, 1),
(2, 'Desarrollo de robots submarinos para exploración Antártica', NULL, 'Telecomunicaciones', 1, 2, 1, 3),
(4, 'Inteligencia articial y sus aplicaciones en la investigación cientíca', NULL, 'Software', 1, 4, 1, 7),
(5, 'Técnicas de reconocimiento facial con Machine Learning', NULL, 'Seguridad Informática', 24, 5, 2, 2),
(6, 'Ciberseguridad: tendencias y amenazas', NULL, 'Seguridad Informática', 1, 6, 2, 4),
(7, 'Aquacultura offshore', NULL, 'Física', 0, 7, 2, 6),
(8, 'Modelado de celdas solares', NULL, 'Física', 1, 8, 3, 2),
(9, 'Nanotecnología', NULL, 'Otras', 2, 9, 3, 4),
(10, 'Ecuador en la Antártida', NULL, 'Otras', 0, 3, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE `encargados` (
  `enc_id` int(20) NOT NULL,
  `lab_id` int(10) DEFAULT NULL,
  `enc_nombre` varchar(50) DEFAULT NULL,
  `enc_apellido` varchar(100) DEFAULT NULL,
  `enc_semestre` varchar(20) DEFAULT NULL,
  `enc_curso` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`enc_id`, `lab_id`, `enc_nombre`, `enc_apellido`, `enc_semestre`, `enc_curso`, `created_at`, `updated_at`) VALUES
(3, 3, 'ANA BELEN ', 'LAMAS RIPOLL', 'Sexto', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(4, 3, 'ELENA ', 'CHICO MORCILLO', 'Septimo', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(5, 2, 'CRISTINA ', 'MORATO ANTUNEZ', 'Sexto', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(6, 2, 'CAROLINA ', 'MELGAREJO MINGUEZ', 'Octavo', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(7, 1, 'ROCIO ', 'MAYOL GAMARRA', 'Quinto', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(8, 1, 'MARIA ', 'ANGELES ARANA LARA', 'Octavo', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(9, 4, 'GLORIA ', 'SANMARTIN MOSQUERA', 'Septimo', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(10, 4, 'ANA BELEN', ' LUJAN PALOMAR', 'Sexto', '1', '2019-07-07 00:00:00', '2019-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `grup_id` int(255) NOT NULL,
  `grup_nombre` varchar(100) DEFAULT NULL,
  `grup_n_miembros` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`grup_id`, `grup_nombre`, `grup_n_miembros`) VALUES
(1, 'Cet', 15),
(2, 'Robótica', 30),
(3, 'Estudiantes', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `hor_id` int(10) NOT NULL,
  `hor_inicio` time DEFAULT NULL,
  `hor_fin` time DEFAULT NULL,
  `hor_duracion` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`hor_id`, `hor_inicio`, `hor_fin`, `hor_duracion`) VALUES
(1, '09:30:00', '09:50:00', 20),
(2, '09:50:00', '10:10:00', 20),
(3, '10:10:00', '10:30:00', 20),
(4, '10:30:00', '11:00:00', 30),
(5, '11:00:00', '11:20:00', 20),
(6, '11:20:00', '11:40:00', 20),
(7, '11:40:00', '12:00:00', 20),
(8, '09:30:00', '12:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `int_id` int(255) NOT NULL,
  `int_nombre` varchar(50) DEFAULT NULL,
  `int_apellido` varchar(100) DEFAULT NULL,
  `int_curso` varchar(100) DEFAULT NULL,
  `int_semestre` varchar(100) DEFAULT NULL,
  `int_carrera` varchar(100) DEFAULT NULL,
  `grup_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `lab_id` int(10) NOT NULL,
  `lab_nombre` varchar(50) DEFAULT NULL,
  `lab_capacidad` int(3) DEFAULT NULL,
  `lab_porcenjajte_desborde` int(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`lab_id`, `lab_nombre`, `lab_capacidad`, `lab_porcenjajte_desborde`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorio 4/5', 60, 10, '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(2, 'Laboratorio 3', 20, 10, '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(3, 'Laboratorio 2', 20, 10, '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(4, 'Laboratorio 1', 20, 10, '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(5, 'Explanada 1', 0, 0, '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(6, 'Explanada 2', 0, 0, '2019-07-07 00:00:00', '2019-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moderador`
--

CREATE TABLE `moderador` (
  `mod_id` int(10) NOT NULL,
  `lab_id` int(10) DEFAULT NULL,
  `mod_nombre` varchar(50) DEFAULT NULL,
  `mod_apellido` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `moderador`
--

INSERT INTO `moderador` (`mod_id`, `lab_id`, `mod_nombre`, `mod_apellido`, `created_at`, `updated_at`) VALUES
(1, 1, 'R', 'Robira', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(2, 2, 'W', 'Torres', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(3, 3, 'M', 'Bayas', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(4, 4, 'A', 'Andrade', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(5, 5, 'E', 'Villamar', '2019-07-07 00:00:00', '2019-07-07 00:00:00'),
(6, 6, 'I', 'Balón', '2019-07-07 00:00:00', '2019-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponentes`
--

CREATE TABLE `ponentes` (
  `pon_id` int(255) NOT NULL,
  `pon_cedula` varchar(10) DEFAULT NULL,
  `pon_nombre` varchar(50) DEFAULT NULL,
  `pon_apellido` varchar(100) DEFAULT NULL,
  `pon_titulo` varchar(255) DEFAULT NULL,
  `pon_sexo` char(1) DEFAULT NULL,
  `pon_telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ponentes`
--

INSERT INTO `ponentes` (`pon_id`, `pon_cedula`, `pon_nombre`, `pon_apellido`, `pon_titulo`, `pon_sexo`, `pon_telefono`) VALUES
(1, NULL, 'Jairo', 'Viteri Viteri', 'Msc', 'M', NULL),
(2, NULL, 'Arturo', 'Cadena', 'Ing', 'M', NULL),
(3, NULL, 'Santiago', 'Coral Carrillo', 'Msc', 'M', NULL),
(4, NULL, 'Unknow', 'Unknow', NULL, 'M', NULL),
(5, NULL, 'Shendry', 'Rosero', 'Ing', 'M', NULL),
(6, NULL, 'Daniel', 'Quirumbay', 'Lsi', 'M', NULL),
(7, NULL, 'Omar', 'Castellanos', 'Phd', 'M', NULL),
(8, NULL, 'Luis', 'Chiquimarca', 'Ing', 'M', NULL),
(9, NULL, 'David', 'Sanchez', 'Ing', 'M', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `pro_id` int(255) NOT NULL,
  `pro_tema` varchar(255) DEFAULT NULL,
  `pro_descripcion` text,
  `grup_id` int(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`pro_id`, `pro_tema`, `pro_descripcion`, `grup_id`) VALUES
(1, 'Exposición de Proyectos', 'Presentación de los proyectos desarollados por los estudiantes perteneciantes al Cet', 1),
(2, 'Batalla de Robots', 'Demostración en vivo de alucinante batalla de robots, creados por alumnos de Electrónica y Sistemas pertenecientes al club de Robótica', 2),
(3, 'Experimientos Física y Química', 'Presentación de proyectos desarollados por los estudiantes que cursan las materias de física y quimíca', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(255) NOT NULL,
  `usu_cedula` varchar(10) DEFAULT NULL,
  `usu_nombre` varchar(50) DEFAULT NULL,
  `usu_apellido` varchar(100) DEFAULT NULL,
  `usu_correo` varchar(100) DEFAULT NULL,
  `usu_tipo` varchar(12) DEFAULT NULL,
  `usu_sexo` char(1) DEFAULT NULL,
  `usu_clave` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_correo`, `usu_tipo`, `usu_sexo`, `usu_clave`, `created_at`, `updated_at`) VALUES
(7, '2400000000', 'Sergio', 'Floreano', 'sergio@gmail.com', '', 'M', '$2y$04$TrXDQ4mfpGK6u5Q3JNF5feE.DMturlU8BTmKU.1K9rh15w7OUXNcq', '2019-07-08 12:08:52', '2019-07-08 12:08:52'),
(8, '2324300000', 'Lucero', 'López Méndez', 'lucero@gmail.com', '', 'F', '$2y$04$o0.QQrDOWAfaKepesz8yHuKX4/r.PZbWtlso2ocNBah1cSCHGIJZm', '2019-07-09 00:46:04', '2019-07-09 00:46:04'),
(9, '2334444444', 'Sebastian', 'Alejandro Matias', 'sebastian@gmail.com', '', 'M', '$2y$04$SedlWsR5y.tSfDfKKI54ee7Rbi/BKUmwLvjQoGpi0VzFwaLttzQa.', '2019-07-09 01:08:21', '2019-07-09 01:08:21'),
(10, '2323423423', 'Karina', 'De la Cruz Viteri', 'karina@gmail.com', '', 'M', '$2y$04$rohO1WQgl250X9oiDGkEkOawuMW0kUNB/DQHFSP4vo6JEs7A25fOm', '2019-07-09 01:10:46', '2019-07-09 01:10:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_asis`
--

CREATE TABLE `usu_asis` (
  `usu_id` int(255) NOT NULL,
  `asi_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usu_asis`
--

INSERT INTO `usu_asis` (`usu_id`, `asi_id`) VALUES
(7, 51),
(7, 52),
(7, 56),
(10, 57),
(10, 58),
(8, 59),
(8, 60),
(8, 61),
(7, 62),
(7, 63),
(7, 64),
(7, 65),
(7, 66);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`asi_id`),
  ADD KEY `fk_conferencia_asistencia` (`conf_id`);

--
-- Indices de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  ADD PRIMARY KEY (`conf_id`),
  ADD KEY `fk_ponente_conferencia` (`pon_id`),
  ADD KEY `fk_laboratorio_conferencia` (`lab_id`),
  ADD KEY `fk_horario_conferencia` (`hor_id`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`enc_id`),
  ADD KEY `fk_encargado_laboratorio` (`lab_id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`grup_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`hor_id`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`int_id`),
  ADD KEY `fk_grupo_integrante` (`grup_id`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indices de la tabla `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `fk_moderador_laboratorio` (`lab_id`);

--
-- Indices de la tabla `ponentes`
--
ALTER TABLE `ponentes`
  ADD PRIMARY KEY (`pon_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_grupo_proyecto` (`grup_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `usu_asis`
--
ALTER TABLE `usu_asis`
  ADD KEY `fk_usu_asi_usuario` (`usu_id`),
  ADD KEY `fk_usu_asi_asistencias` (`asi_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `asi_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  MODIFY `conf_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `encargados`
--
ALTER TABLE `encargados`
  MODIFY `enc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `grup_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `hor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `int_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `lab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `moderador`
--
ALTER TABLE `moderador`
  MODIFY `mod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ponentes`
--
ALTER TABLE `ponentes`
  MODIFY `pon_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `fk_conferencia_asistencia` FOREIGN KEY (`conf_id`) REFERENCES `conferencias` (`conf_id`);

--
-- Filtros para la tabla `conferencias`
--
ALTER TABLE `conferencias`
  ADD CONSTRAINT `fk_horario_conferencia` FOREIGN KEY (`hor_id`) REFERENCES `horarios` (`hor_id`),
  ADD CONSTRAINT `fk_laboratorio_conferencia` FOREIGN KEY (`lab_id`) REFERENCES `laboratorios` (`lab_id`),
  ADD CONSTRAINT `fk_ponente_conferencia` FOREIGN KEY (`pon_id`) REFERENCES `ponentes` (`pon_id`);

--
-- Filtros para la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD CONSTRAINT `fk_encargado_laboratorio` FOREIGN KEY (`lab_id`) REFERENCES `laboratorios` (`lab_id`);

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `fk_grupo_integrante` FOREIGN KEY (`grup_id`) REFERENCES `grupos` (`grup_id`);

--
-- Filtros para la tabla `moderador`
--
ALTER TABLE `moderador`
  ADD CONSTRAINT `fk_moderador_laboratorio` FOREIGN KEY (`lab_id`) REFERENCES `laboratorios` (`lab_id`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_grupo_proyecto` FOREIGN KEY (`grup_id`) REFERENCES `grupos` (`grup_id`);

--
-- Filtros para la tabla `usu_asis`
--
ALTER TABLE `usu_asis`
  ADD CONSTRAINT `fk_usu_asi_asistencias` FOREIGN KEY (`asi_id`) REFERENCES `asistencias` (`asi_id`),
  ADD CONSTRAINT `fk_usu_asi_usuario` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
