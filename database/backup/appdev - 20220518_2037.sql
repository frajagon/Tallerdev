-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2022 a las 03:37:01
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
-- Base de datos: `appdev`
--
CREATE DATABASE IF NOT EXISTS `appdev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `appdev`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciondocentes`
--

DROP TABLE IF EXISTS `asignaciondocentes`;
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

DROP TABLE IF EXISTS `asignaturas`;
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

DROP TABLE IF EXISTS `cursos`;
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
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
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
  `estado` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `id_tipo_identificador`, `id_acudiente`, `id_genero`, `id_grado_academico_periodo`, `id_madre`, `id_padre`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `numero_identificacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'Andres', 'Felipe', 'Santa Maria', 'Saa', '2015-01-01', '123456789', 1, '2022-04-12 05:15:03', '2022-04-13 03:37:15'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'Juliana', NULL, 'Gonzalez', 'Sandoval', '2016-08-06', '147852369', 0, '2022-04-13 03:17:10', '2022-04-13 03:37:03'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'Marianna', NULL, 'Gonzalez', 'Sandoval', '2014-08-20', '159784632', 1, '2022-04-13 03:17:54', '2022-04-13 03:36:23'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 'Juan', 'Manuel', 'Saa', 'Pelaez', '2010-05-10', '159786324', 1, '2022-04-13 03:40:41', '2022-04-13 03:40:41'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 'Andres', 'Felipe', 'Peres', 'Saavedra', '2012-01-01', '654987321', 1, '2022-04-13 03:50:29', '2022-04-13 03:51:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
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

DROP TABLE IF EXISTS `personas`;
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

DROP TABLE IF EXISTS `roles`;
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

DROP TABLE IF EXISTS `role_user`;
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

DROP TABLE IF EXISTS `users`;
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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
