-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2022 a las 03:39:22
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uniajc_proyecto_integrador`
--
CREATE DATABASE IF NOT EXISTS `uniajc_proyecto_integrador` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uniajc_proyecto_integrador`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes_estudiantes`
--

CREATE TABLE `acudientes_estudiantes` (
  `id` int(10) NOT NULL,
  `id_acudiente` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias_estudiantes`
--

CREATE TABLE `asistencias_estudiantes` (
  `id` int(10) NOT NULL,
  `id_grado_academico_estudiante` int(10) NOT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT 1,
  `observaciones` text DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_actividades`
--

CREATE TABLE `calendario_actividades` (
  `id` int(10) NOT NULL,
  `id_grado_academico_periodo` int(10) NOT NULL,
  `id_grado_academico_periodo_estudiante` int(10) NOT NULL,
  `nombre_actividad` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_actividades_detalle`
--

CREATE TABLE `calendario_actividades_detalle` (
  `id` int(10) NOT NULL,
  `id_calendario_actividad` int(10) NOT NULL,
  `id_grado_academico_periodo_estudiante` int(10) NOT NULL,
  `archivo_adjunto` varchar(100) DEFAULT NULL,
  `nota` double NOT NULL,
  `anotaciones` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_notificaciones`
--

CREATE TABLE `categorias_notificaciones` (
  `id` int(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias_notificaciones`
--

INSERT INTO `categorias_notificaciones` (`id`, `codigo`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'ALIME', 'Alimentación', '', 1, '2022-04-28 03:05:08', '2022-04-28 03:05:08'),
(2, 'SALUD', 'Salud', '', 1, '2022-04-28 03:05:08', '2022-04-28 03:05:08'),
(3, 'ACCLASE', 'Actividades en Clase', '', 1, '2022-04-28 03:06:29', '2022-04-28 03:06:29'),
(4, 'COMPOR', 'Comportamiento', '', 1, '2022-04-28 03:06:29', '2022-04-28 03:06:29'),
(5, 'OBSERV', 'Observaciones', '', 1, '2022-04-28 03:07:02', '2022-04-28 03:07:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_notificaciones_detalle`
--

CREATE TABLE `categorias_notificaciones_detalle` (
  `id` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias_notificaciones_detalle`
--

INSERT INTO `categorias_notificaciones_detalle` (`id`, `id_categoria`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, '001-001', 'El niño desayunó', 1, '2022-04-28 03:15:02', '2022-04-28 03:15:02'),
(2, 1, '001-002', 'El niño Almorzó', 1, '2022-04-28 03:15:02', '2022-04-28 03:15:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_estudiantes`
--

CREATE TABLE `contactos_estudiantes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) DEFAULT NULL,
  `id_acudiente` int(10) DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `id_madre` int(10) DEFAULT NULL,
  `id_padre` int(10) DEFAULT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Mujer', '2022-04-02 17:52:55', '2022-04-02 17:52:55'),
(2, 'Hombre', '2022-04-02 17:52:55', '2022-04-02 17:52:55'),
(3, 'Otro', '2022-04-02 17:57:54', '2022-04-02 17:57:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_academicos`
--

CREATE TABLE `grados_academicos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripción` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(5) NOT NULL DEFAULT 999,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grados_academicos`
--

INSERT INTO `grados_academicos` (`id`, `nombre`, `descripción`, `estado`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Parvulos', 'De 4 a 5 años', 1, 10, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(2, 'Pre-Jardín', '', 1, 20, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(3, 'Jardín', '', 1, 30, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(4, 'Transición', '', 1, 40, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(5, 'Primero de primaria', NULL, 1, 50, '2022-04-02 18:30:27', '2022-04-02 18:30:27'),
(6, 'Segundo de primaria', NULL, 1, 60, '2022-04-02 18:30:27', '2022-04-02 18:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_academicos_periodos`
--

CREATE TABLE `grados_academicos_periodos` (
  `id` int(11) NOT NULL,
  `id_grado_academico` int(10) NOT NULL,
  `id_docente` int(10) NOT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_academicos_periodos_estudiantes`
--

CREATE TABLE `grados_academicos_periodos_estudiantes` (
  `id` int(10) NOT NULL,
  `id_grado_academico_periodo` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_atencion`
--

CREATE TABLE `horarios_atencion` (
  `id` int(10) NOT NULL,
  `id_docente` int(10) NOT NULL,
  `dia_semana` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `anotaciones` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos_identificacion`
--

CREATE TABLE `tipos_documentos_identificacion` (
  `id` int(11) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acudientes_tipo_doc_FK` (`id_tipo_identificador`),
  ADD KEY `acudientes_genero_FK` (`id_genero`);

--
-- Indices de la tabla `acudientes_estudiantes`
--
ALTER TABLE `acudientes_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acudientes_estudiantes_FK` (`id_acudiente`),
  ADD KEY `acudientes_estudiantes_FK_1` (`id_estudiante`);

--
-- Indices de la tabla `asistencias_estudiantes`
--
ALTER TABLE `asistencias_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_estudiantes_FK` (`id_grado_academico_estudiante`);

--
-- Indices de la tabla `calendario_actividades`
--
ALTER TABLE `calendario_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendario_actividades_FK` (`id_grado_academico_periodo`);

--
-- Indices de la tabla `calendario_actividades_detalle`
--
ALTER TABLE `calendario_actividades_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendario_actividades_detalle_FK` (`id_calendario_actividad`),
  ADD KEY `calendario_actividades_detalle_FK_1` (`id_grado_academico_periodo_estudiante`);

--
-- Indices de la tabla `categorias_notificaciones`
--
ALTER TABLE `categorias_notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_notificaciones_detalle`
--
ALTER TABLE `categorias_notificaciones_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_notificaciones_detalle_FK` (`id_categoria`);

--
-- Indices de la tabla `contactos_estudiantes`
--
ALTER TABLE `contactos_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactos_estudiantes_tipo_doc_FK` (`id_tipo_identificador`),
  ADD KEY `contactos_estudiantes_genero_FK` (`id_genero`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentes_tipo_doc_FK` (`id_tipo_identificador`),
  ADD KEY `docentes_genero_FK` (`id_genero`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acudiente` (`id_acudiente`),
  ADD KEY `estudiantes_FK` (`id_tipo_identificador`),
  ADD KEY `estudiantes_id_genero_IDX` (`id_genero`) USING BTREE,
  ADD KEY `estudiantes_madre_FK_2` (`id_madre`),
  ADD KEY `estudiantes_padre_FK_2` (`id_padre`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados_academicos`
--
ALTER TABLE `grados_academicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados_academicos_periodos`
--
ALTER TABLE `grados_academicos_periodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grados_academicos_periodos_FK` (`id_grado_academico`),
  ADD KEY `grados_academicos_periodos_docente_FK_1` (`id_docente`),
  ADD KEY `grados_academicos_periodos_id_grupo_IDX` (`id_grupo`) USING BTREE;

--
-- Indices de la tabla `grados_academicos_periodos_estudiantes`
--
ALTER TABLE `grados_academicos_periodos_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grados_academicos_periodos_estudiantes_FK` (`id_grado_academico_periodo`),
  ADD KEY `grados_academicos_periodos_estudiantes_FK_1` (`id_estudiante`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios_atencion`
--
ALTER TABLE `horarios_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_atencion_FK` (`id_docente`);

--
-- Indices de la tabla `tipos_documentos_identificacion`
--
ALTER TABLE `tipos_documentos_identificacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acudientes_estudiantes`
--
ALTER TABLE `acudientes_estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencias_estudiantes`
--
ALTER TABLE `asistencias_estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario_actividades`
--
ALTER TABLE `calendario_actividades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_notificaciones`
--
ALTER TABLE `categorias_notificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias_notificaciones_detalle`
--
ALTER TABLE `categorias_notificaciones_detalle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contactos_estudiantes`
--
ALTER TABLE `contactos_estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grados_academicos`
--
ALTER TABLE `grados_academicos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grados_academicos_periodos`
--
ALTER TABLE `grados_academicos_periodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados_academicos_periodos_estudiantes`
--
ALTER TABLE `grados_academicos_periodos_estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios_atencion`
--
ALTER TABLE `horarios_atencion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos_identificacion`
--
ALTER TABLE `tipos_documentos_identificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD CONSTRAINT `acudientes_genero_FK` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `acudientes_tipo_doc_FK` FOREIGN KEY (`id_tipo_identificador`) REFERENCES `tipos_documentos_identificacion` (`id`);

--
-- Filtros para la tabla `acudientes_estudiantes`
--
ALTER TABLE `acudientes_estudiantes`
  ADD CONSTRAINT `acudientes_estudiantes_FK` FOREIGN KEY (`id_acudiente`) REFERENCES `acudientes` (`id`),
  ADD CONSTRAINT `acudientes_estudiantes_FK_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`);

--
-- Filtros para la tabla `asistencias_estudiantes`
--
ALTER TABLE `asistencias_estudiantes`
  ADD CONSTRAINT `asistencias_estudiantes_FK` FOREIGN KEY (`id_grado_academico_estudiante`) REFERENCES `grados_academicos_periodos_estudiantes` (`id`);

--
-- Filtros para la tabla `calendario_actividades`
--
ALTER TABLE `calendario_actividades`
  ADD CONSTRAINT `calendario_actividades_FK` FOREIGN KEY (`id_grado_academico_periodo`) REFERENCES `grados_academicos_periodos` (`id`);

--
-- Filtros para la tabla `calendario_actividades_detalle`
--
ALTER TABLE `calendario_actividades_detalle`
  ADD CONSTRAINT `calendario_actividades_detalle_FK` FOREIGN KEY (`id_calendario_actividad`) REFERENCES `calendario_actividades` (`id`),
  ADD CONSTRAINT `calendario_actividades_detalle_FK_1` FOREIGN KEY (`id_grado_academico_periodo_estudiante`) REFERENCES `grados_academicos_periodos_estudiantes` (`id`);

--
-- Filtros para la tabla `categorias_notificaciones_detalle`
--
ALTER TABLE `categorias_notificaciones_detalle`
  ADD CONSTRAINT `categorias_notificaciones_detalle_FK` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_notificaciones` (`id`);

--
-- Filtros para la tabla `contactos_estudiantes`
--
ALTER TABLE `contactos_estudiantes`
  ADD CONSTRAINT `contactos_estudiantes_genero_FK` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `contactos_estudiantes_tipo_doc_FK` FOREIGN KEY (`id_tipo_identificador`) REFERENCES `tipos_documentos_identificacion` (`id`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_genero_FK` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `docentes_tipo_doc_FK` FOREIGN KEY (`id_tipo_identificador`) REFERENCES `tipos_documentos_identificacion` (`id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_FK` FOREIGN KEY (`id_tipo_identificador`) REFERENCES `tipos_documentos_identificacion` (`id`),
  ADD CONSTRAINT `estudiantes_genero_FK` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `estudiantes_madre_FK_2` FOREIGN KEY (`id_madre`) REFERENCES `contactos_estudiantes` (`id`),
  ADD CONSTRAINT `estudiantes_padre_FK_2` FOREIGN KEY (`id_padre`) REFERENCES `contactos_estudiantes` (`id`);

--
-- Filtros para la tabla `grados_academicos_periodos`
--
ALTER TABLE `grados_academicos_periodos`
  ADD CONSTRAINT `grados_academicos_periodos_FK` FOREIGN KEY (`id_grado_academico`) REFERENCES `grados_academicos` (`id`),
  ADD CONSTRAINT `grados_academicos_periodos_docente_FK_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `grados_academicos_periodos_grupo_FK_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`);

--
-- Filtros para la tabla `grados_academicos_periodos_estudiantes`
--
ALTER TABLE `grados_academicos_periodos_estudiantes`
  ADD CONSTRAINT `grados_academicos_periodos_estudiantes_FK` FOREIGN KEY (`id_grado_academico_periodo`) REFERENCES `grados_academicos_periodos` (`id`),
  ADD CONSTRAINT `grados_academicos_periodos_estudiantes_FK_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`);

--
-- Filtros para la tabla `horarios_atencion`
--
ALTER TABLE `horarios_atencion`
  ADD CONSTRAINT `horarios_atencion_FK` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
