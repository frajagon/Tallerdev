-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 04:27:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_nacimiento` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acudientes`
--

INSERT INTO `acudientes` (`id`, `id_tipo_identificador`, `id_genero`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `numero_identificacion`, `email`, `password`, `imagen`, `estado`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Ana', 'Maria', 'Perez', NULL, '10000001', NULL, NULL, 'dist/img/acudientes/2AQIYN7ZjG6d8W5WRdtCkoLhWSYFN6EoddR9P6j2.png', 1, '1974-05-15', '2022-06-01 00:52:48', '2022-06-01 02:15:08'),
(2, NULL, NULL, 'Martha', NULL, 'Gonzalez', 'Rengifo', '123000458', NULL, NULL, 'dist/img/acudientes/c4mVnRZsPpBfhla2QwPO4Odz2QpwpsAKmgMV9ni3.png', 1, '1960-03-20', '2022-06-01 02:17:39', '2022-06-01 02:17:39'),
(3, NULL, NULL, 'July', 'Melissa', 'Sandoval', 'Becerra', '456900025', NULL, NULL, 'dist/img/acudientes/F4fcjgtyTJ5HDpCGkN0n8RqpTjRdi2D6rqzfAYrr.png', 1, '1995-06-05', '2022-06-01 02:18:28', '2022-06-01 02:18:28'),
(4, NULL, NULL, 'Luz', 'Marina', 'Gonzalez', 'Paz', '6854300522', NULL, NULL, 'dist/img/acudientes/QqEeeGsscGO1I94SLMFVLb8EHfh3TUlzVizOapuu.png', 1, '1965-07-05', '2022-06-01 02:21:23', '2022-06-01 02:21:23'),
(5, NULL, NULL, 'David', 'Andres', 'Gonzalez', 'Gonzalez', '987520004', NULL, NULL, 'dist/img/acudientes/XMhO4gMMN0HzlZPF9zQnNSbLHAracNA1x8KkgXZW.png', 1, '1985-11-01', '2022-06-01 02:22:04', '2022-06-01 02:22:04'),
(6, NULL, NULL, 'Edson', 'Alberto', 'Balanta', NULL, '96300145', NULL, NULL, 'dist/img/acudientes/wGbvHAwdYQITWtY3MJSo6JIPXTwTzkB11lNBgfDj.png', 1, '1989-04-10', '2022-06-01 02:22:43', '2022-06-01 02:22:52'),
(7, NULL, NULL, 'Maurio', NULL, 'Balanta', 'Gutierrez', '4567800123', NULL, NULL, 'dist/img/acudientes/7lWx4QuyOEvhIxefNbrgBMvFOudesr5Yi9tTsINr.png', 1, '1999-05-05', '2022-06-01 02:23:40', '2022-06-01 02:23:40'),
(8, NULL, NULL, 'Andres', 'Felipe', 'Barco', 'Santa', '7531598462', NULL, NULL, 'dist/img/acudientes/FAM1lu6SeoXJWgvYvXBXouO9JnsbNWFBB7tYc8E0.png', 1, '2000-09-09', '2022-06-01 02:24:12', '2022-06-01 02:24:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciondocentes`
--

CREATE TABLE `asignaciondocentes` (
  `id` int(10) NOT NULL,
  `asignaturas_id` int(10) NOT NULL,
  `personas_id` int(10) NOT NULL,
  `cursos_id` int(10) NOT NULL,
  `ano_lectivo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `asignaciondocentes`
--

INSERT INTO `asignaciondocentes` (`id`, `asignaturas_id`, `personas_id`, `cursos_id`, `ano_lectivo`) VALUES
(1, 2, 3, 1, 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(10) NOT NULL,
  `codigo_asignatura` int(10) NOT NULL,
  `nombre_asignatura` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `codigo_asignatura`, `nombre_asignatura`) VALUES
(1, 11111, 'Matemáticas'),
(2, 11111, 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) NOT NULL,
  `curso` int(10) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `nombre`) VALUES
(1, 111, '1B'),
(2, 112, '2B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_nacimiento` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `id_tipo_identificador`, `id_genero`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `numero_identificacion`, `email`, `password`, `imagen`, `estado`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Andres', NULL, 'Santamaria', 'Buitrago', '10000001', NULL, NULL, 'dist/img/docentes/0RZKMokT68tEoNNzoyHoiF2vBSoMKSF2wgaMha0G.png', 1, '1980-10-05', '2022-06-01 00:57:15', '2022-06-01 01:44:39'),
(2, NULL, NULL, 'Maria', 'Lucrecia', 'Gomez', 'Liscano', '100000056', NULL, NULL, 'dist/img/docentes/Oh3TFMGbmNfBJIfbYSeAvwFYRrlXifEJ3kMC7e0O.png', 1, '1986-05-12', '2022-06-01 01:06:26', '2022-06-01 01:44:53'),
(3, NULL, NULL, 'Maria', 'Alejandra', 'Gutierrez', 'Carmona', '147850003', NULL, NULL, 'dist/img/docentes/drBBDvvFGY2AOvKdje266UiXGIKF348h0SSTe9hG.png', 1, '1984-06-05', '2022-06-01 01:46:24', '2022-06-01 01:46:37'),
(4, NULL, NULL, 'Alberto', NULL, 'Saa', 'Torres', '456000187', NULL, NULL, 'dist/img/docentes/QsjF8cJp8MaxQPaOzFYLronIjzFlZCms6M3E6tt7.png', 1, '1987-05-12', '2022-06-01 01:47:29', '2022-06-01 01:47:29'),
(5, NULL, NULL, 'Lina', NULL, 'Rengifo', 'Balanta', '78900056', NULL, NULL, 'dist/img/docentes/H7FWFwVDDsIjLZMpG2YWz0FE4JBzzfERw8Mo8R8t.png', 1, '1986-12-10', '2022-06-01 01:48:34', '2022-06-01 01:48:34'),
(6, NULL, NULL, 'Sharon', NULL, 'Gaez', 'Prieto', '7534000055', NULL, NULL, 'dist/img/docentes/mjLQEFj6XvmSHAbOInGsyqIA2GnHxaSNf9QONrJd.png', 1, '1995-02-04', '2022-06-01 01:49:31', '2022-06-01 01:49:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(10) NOT NULL,
  `id_tipo_identificador` int(10) DEFAULT NULL,
  `id_acudiente` int(10) DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `id_grado_academico_periodo` int(10) DEFAULT NULL,
  `id_madre` int(10) DEFAULT NULL,
  `id_padre` int(10) DEFAULT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `id_tipo_identificador`, `id_acudiente`, `id_genero`, `id_grado_academico_periodo`, `id_madre`, `id_padre`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `numero_identificacion`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(1, NULL, 8, NULL, NULL, NULL, NULL, 'Andres', 'Felipe', 'Santa Maria', 'Saa', '2015-01-01', '123456789', 'dist/img/estudiantes/KZTNzkIDvwrbcrrhqGvN5afKHrtmzHapPQzjbNL4.png', 1, '2022-04-12 05:15:03', '2022-06-01 02:25:20'),
(3, NULL, 5, NULL, NULL, NULL, NULL, 'Juliana', NULL, 'Gonzalez', 'Sandoval', '2016-08-06', '147852369', 'dist/img/estudiantes/tp5ZxVuEo3gZtBPhoFChQ9EqyD6YrPDp0f2Dt4aE.png', 0, '2022-04-13 03:17:10', '2022-06-01 02:25:43'),
(4, NULL, 3, NULL, NULL, NULL, NULL, 'Marianna', NULL, 'Gonzalez', 'Sandoval', '2014-08-20', '159784632', 'dist/img/estudiantes/HRv5zEFPVXex9uCXMgqtGSwiHmOK0rjiKgPSXB2X.png', 1, '2022-04-13 03:17:54', '2022-06-01 02:25:54'),
(5, NULL, 2, NULL, NULL, NULL, NULL, 'Juan', 'Manuel', 'Saa', 'Pelaez', '2010-05-10', '159786324', NULL, 1, '2022-04-13 03:40:41', '2022-06-01 02:25:31'),
(6, NULL, 1, 2, NULL, NULL, NULL, 'Andres', 'Felipe', 'Peres', 'Saavedra', '2012-01-01', '654987321', 'dist/img/estudiantes/5RtswaHU8D3IYtNa9RJOFZwSqN7A3R0nrVO8uRLG.png', 1, '2022-04-13 03:50:29', '2022-06-01 01:03:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `descripcion` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(5) NOT NULL DEFAULT 999,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grados_academicos`
--

INSERT INTO `grados_academicos` (`id`, `nombre`, `descripcion`, `estado`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Parvulos', 'De 4 a 5 años', 1, 10, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(2, 'Pre-Jardín', '', 1, 20, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(3, 'Jardín', '', 1, 30, '2022-04-02 18:28:25', '2022-04-02 18:28:25'),
(4, 'Transición', NULL, 1, 40, '2022-04-02 18:28:25', '2022-06-01 00:59:10'),
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

--
-- Volcado de datos para la tabla `grados_academicos_periodos`
--

INSERT INTO `grados_academicos_periodos` (`id`, `id_grado_academico`, `id_docente`, `id_grupo`, `nombre`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2021 - 2022', '2022-01-01', '2022-12-31', 1, '2022-06-01 01:01:07', '2022-06-01 01:01:07');

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
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'GRP-001', 'Grupo 001', 1, '2022-06-01 00:36:18', '2022-06-01 00:36:18'),
(2, 'GRP-002', 'Grupo 002', 1, '2022-06-01 00:36:29', '2022-06-01 00:36:39'),
(3, 'GRP-003', 'Grupo 003', 1, '2022-06-01 00:37:08', '2022-06-01 00:37:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_05_04_001109_create_roles_table', 1),
(12, '2022_05_04_003135_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) UNSIGNED NOT NULL,
  `documento_identidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(191) COLLATE utf8_bin NOT NULL,
  `email` varchar(191) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `documento_identidad`, `nombre`, `apellido`, `email`, `telefono`, `created_at`, `updated_at`) VALUES
(1, '16917124', 'Carlos Andres', 'Bolaños', 'cabo@admon.uniajc.edu.co', '6652828', '2022-03-29 19:26:23', '2022-03-29 19:27:43'),
(2, '147852369', 'Mariana', 'Gonzalez SAndoval', 'mariana.gonzalez@gmail.com', '602 373 4599', '2022-03-29 19:26:23', '2022-03-29 19:27:43'),
(3, '147896325', 'Juliana', 'Gonzalez Sandoval', 'juliana.gonzalez@gmail.com', '602 373 4599', '2022-03-29 19:26:23', '2022-03-29 19:27:43'),
(4, '123456789', 'David Andres', 'Gonzalez Rengifo', 'david.gonzalez@gmail.com', '602 325 7894', '2022-03-29 19:26:23', '2022-03-29 19:27:43'),
(6, '369852147', 'Martha Rene', 'Gonzalez Rengifo', 'martha.gonzalez@gmail.com', '602 325 4789', '2022-03-30 00:28:49', '2022-03-30 00:29:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Usuario Administrador', '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(2, 'docente', 'Usario docente', '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(3, 'acudiente', 'Usuario acudiente', '2022-05-04 05:47:29', '2022-05-04 05:47:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(2, 1, 2, '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(3, 3, 3, '2022-05-04 05:47:29', '2022-05-04 05:47:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Docente', 'frajagon@gmail.com', NULL, '$2y$10$frvxuITm/ALqZXeKKjC0I.O3An9rjqpkN9QtvcMgFZCDzthqBKuIu', NULL, '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(2, 'Admin', 'fjgr323@gmail.com', NULL, '$2y$10$ktPEmAS5YK4ts9uHwLuEYeJERt64HxV8xewnOU3fPkPO1UwXzJA0a', NULL, '2022-05-04 05:47:29', '2022-05-04 05:47:29'),
(3, 'Acudiente', 'frajagon@hotmail.com', NULL, '$2y$10$usTyKXs.tvHbZBR61ahUj.6wYIfF2VTEhNaZl4Gr1wHRq4DOyZeXy', NULL, '2022-05-04 05:47:29', '2022-05-04 05:47:29');

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
-- Indices de la tabla `asignaciondocentes`
--
ALTER TABLE `asignaciondocentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asignaturas_id` (`asignaturas_id`),
  ADD KEY `fk_personas_id` (`personas_id`),
  ADD KEY `fk_cursos_id` (`cursos_id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento_identidad` (`documento_identidad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignaciondocentes`
--
ALTER TABLE `asignaciondocentes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados_academicos_periodos`
--
ALTER TABLE `grados_academicos_periodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciondocentes`
--
ALTER TABLE `asignaciondocentes`
  ADD CONSTRAINT `asignaciondocentes_FK` FOREIGN KEY (`personas_id`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `fk_asignaturas_id` FOREIGN KEY (`asignaturas_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_personas_id` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
