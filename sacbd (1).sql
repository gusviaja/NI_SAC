-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2018 a las 02:14:51
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sacbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_categoria` varchar(60) NOT NULL,
  `gerente_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `ativa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name_categoria`, `gerente_id`, `ativa`) VALUES
(1, 'financ', 35, 0),
(3, 'software', 1, 1),
(4, 'suporte-tecnico', 1, 1),
(5, 'Infra', 35, 1),
(6, 'Compilance', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_atendentes`
--

CREATE TABLE `categorias_atendentes` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chamados`
--

CREATE TABLE `chamados` (
  `id` int(5) UNSIGNED NOT NULL,
  `codigo` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `criador_id` int(12) NOT NULL,
  `atendente_id` int(12) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'pendente',
  `assunto` varchar(255) NOT NULL,
  `categoria_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_de_usuario`
--

CREATE TABLE `nivel_de_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameNivel` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nivel_de_usuario`
--

INSERT INTO `nivel_de_usuario` (`id`, `nameNivel`) VALUES
(0, 'cliente'),
(1, 'gerente'),
(2, 'analista'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gusviaja@gmail.com', 'sx2KSrOcAzetVF6gHXy4PqmRhWC9EoIni5uvGwl3pZTJLD7081dMYbBkNUja', '2018-08-21 01:54:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `urlFotoPerfil` varchar(255) COLLATE utf8_unicode_ci DEFAULT '''src/img/perfil/anonimo.png''',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ativo`, `name`, `email`, `password`, `nivel_id`, `urlFotoPerfil`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gustavo Iglesias', 'gusviaja@gmail.com', '$2a$08$Wyl/udtQU34RfH5Z7vJPUef0gKEFhKmbfnhLLi1/XBS9MKCQZS3N2', 3, '/uploads/1/foto.jpg', '2018-04-21 03:09:05', '2018-08-21 01:23:32'),
(34, 1, 'Cliente Igles', 'gtedescoiglesias@gmail.com', '$2a$08$Wyl/udtQU34RfH5Z7vJPUef0gKEFhKmbfnhLLi1/XBS9MKCQZS3N2', 0, '/uploads/34/foto.jpg', '2018-07-26 01:25:13', '2018-08-21 01:23:32'),
(35, 1, 'Saint Gustav', 'gusviaja@hotmail.com', '$2a$08$Wyl/udtQU34RfH5Z7vJPUef0gKEFhKmbfnhLLi1/XBS9MKCQZS3N2', 1, '/uploads/35/foto.jpg', '2018-07-27 00:18:57', '2018-08-21 01:23:32'),
(36, 1, 'Chiclisto Pedale', 'chiclisto@pedale.com', '$2a$08$Wyl/udtQU34RfH5Z7vJPUef0gKEFhKmbfnhLLi1/XBS9MKCQZS3N2', 2, '/uploads/36/foto.jpg', '2018-08-13 19:14:21', '2018-08-21 01:23:32'),
(40, 1, 'Gustavo Tedesco', 'gustavo@tedesco.com', '$2a$08$Wyl/udtQU34RfH5Z7vJPUef0gKEFhKmbfnhLLi1/XBS9MKCQZS3N2', 0, 'src/perfil/anonimo.png', '2018-08-18 19:39:59', '2018-08-21 01:23:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gerente_id_fk` (`gerente_id`);

--
-- Indices de la tabla `categorias_atendentes`
--
ALTER TABLE `categorias_atendentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `categoria_id_fk` (`categoria_id`);

--
-- Indices de la tabla `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_de_usuario`
--
ALTER TABLE `nivel_de_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nameNivel` (`nameNivel`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `categorias_atendentes`
--
ALTER TABLE `categorias_atendentes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivel_de_usuario`
--
ALTER TABLE `nivel_de_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
