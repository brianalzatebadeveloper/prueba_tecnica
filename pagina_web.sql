-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2018 a las 00:46:23
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `section` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url2` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `city`, `message`, `section`, `url`, `url2`, `status`, `notification`, `plan_id`, `created_at`, `updated_at`) VALUES
(2, 'Juan David Alzate', 'juan@gmail.com', '134151234', 'marinilla', 'hola', 'home', NULL, NULL, 1, 1, NULL, '2018-09-04 02:47:09', '2018-09-04 02:54:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `text_2` text COLLATE utf8_unicode_ci,
  `text_3` text COLLATE utf8_unicode_ci,
  `text_4` text COLLATE utf8_unicode_ci,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_3` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_4` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image4` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image4` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_2` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `name`, `text`, `text_2`, `text_3`, `text_4`, `image`, `image_2`, `image_3`, `image_4`, `title_image`, `alt_image`, `title_image2`, `alt_image2`, `title_image3`, `alt_image3`, `title_image4`, `alt_image4`, `url`, `url_2`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Intro - HOME', '<h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>', '<p><strong>What is Lorem Ipsum?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', NULL, NULL, 'IMG-CONT-1-1-1.jpg', NULL, NULL, NULL, 'Imagen intro', 'Imagen intro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-09-03 23:05:42'),
(2, 'Textos - Home', '<p>Encuentranos en nuestras redes sociales...</p>', '<h2>Estoy dispuesto hacer de la web tu mejor <br /><strong>Herramienta para ganar clientes y promocionar tus servicios o productos.</strong></h2>', NULL, NULL, 'IMG-CONT-1-1-2.jpg', NULL, NULL, NULL, 'banner info - home', 'banner info - home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-09-03 23:07:21'),
(16, 'Titulo y texto', '<h2>Cont&aacute;ctenos</h2>\r\n<p>D&eacute;dajanos tus comentarios...</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, '2018-09-03 23:21:07'),
(17, 'Contenido - Footer', 'Pauta Conmigo', '<p>Yo puedo ayudarte a materializar tus ideas, convirte tus debilidades en una estrategia para ganar clientes y potenciar tus ventas.</p>', '<h2>Sigueme en:</h2>', NULL, 'IMG-CONT-1-8-17.jpg', NULL, NULL, NULL, 'Imagen Footer', 'Imagen Footer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, '2018-01-01 18:57:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_doc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_doc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `type_member` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `name`, `lastname`, `email`, `tipo_doc`, `number_doc`, `phone`, `city`, `address`, `password`, `role`, `type_member`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eliana', 'Soto Montoya', 'eliana@gmail.com', 'cc', '1038410265', '3014375685', 'marinilla', 'cl 29', '$2y$10$W5/yfyKrPfHZ1jIZprOV6uWJnJJkfs4Y91c5NJMeEHsiiHysjLeUu', 2, 1, 1, NULL, NULL, '2018-09-04 00:55:22'),
(3, 'juana daza', NULL, 'juana@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$dMHwtf9XMfzGJhdUZ4phdeip1jt9IVCl6Ob.bbqJJomCMy.sOllRm', NULL, 1, NULL, NULL, '2018-09-04 01:38:37', '2018-09-04 01:38:37'),
(4, 'lola', NULL, 'lola@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$b3oEnu23ACf5DhzYwO3dK.R2c1XS9hWEdFYgD2RoWi/fN1U5hQaBi', NULL, 1, NULL, NULL, '2018-09-04 02:59:09', '2018-09-04 02:59:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2017_09_06_141558_Create_Sections_Table', 1),
(14, '2017_09_06_141629_Create_Contents_Table', 1),
(15, '2017_09_06_141705_Create_Sliders_Table', 1),
(16, '2017_09_06_141748_Create_Seos_Table', 1),
(17, '2017_09_06_141822_Create_Settings_Table', 1),
(18, '2017_09_06_141850_Create_Articles_Table', 1),
(20, '2017_09_06_142003_Create_Members_Table', 1),
(23, '2017_10_17_195146_Create_Services_Table', 2),
(26, '2017_10_18_151749_Create_Projects_Table', 3),
(28, '2017_10_19_160405_Create_Plans_Table', 4),
(32, '2017_09_06_141926_Create_Contacts_Table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, NULL),
(7, 'Formulario Contacto', NULL, NULL),
(8, 'Footer', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seos`
--

CREATE TABLE `seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `seos`
--

INSERT INTO `seos` (`id`, `section`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', NULL, NULL, NULL, '2018-09-03 23:42:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_intro` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `position_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `name`, `title`, `text_intro`, `text`, `image`, `icon`, `title_image`, `alt_image`, `featured`, `position_order`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '<h2>Facebook</h2>', 'facebook', '<p>facebook</p>', 'IMG-SER-1-1.jpg', 'icon-facebook2', 'Facebook', 'Facebook', 1, 1, '2017-10-18 02:17:11', '2018-09-03 23:12:34'),
(2, 'Instagram', '<h2>Instagram</h2>', 'Instagram', NULL, 'IMG-SER-1-2.jpg', 'icon-instagram', 'Instagram', 'Instagram', 1, 2, '2017-10-18 02:20:21', '2018-09-03 23:14:06'),
(12, 'Github', NULL, NULL, NULL, '', 'icon-github', NULL, NULL, 0, 3, '2018-09-03 23:19:17', '2018-09-03 23:19:23'),
(13, 'Telegram', NULL, NULL, NULL, '', 'icon-telegram', NULL, NULL, 0, 4, '2018-09-03 23:19:58', '2018-09-03 23:20:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_web` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_map` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `facebook`, `twitter`, `instagram`, `in_web`, `googleplus`, `youtube`, `latitude`, `longitude`, `key_map`, `contact_email`, `url`, `address`, `phone`, `cellphone`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://twitter.com', 'https://www.instagram.com', '', 'https://plus.google.com', 'https://www.youtube.com2', '6.1802055', '-75.34712260000003', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC_nuq-hjfS1Q2RzDUa8TooiEVe6neTWsw', 'brian.1997.alzate@gmail.com', '', '', '', '573207652170', NULL, '2018-09-03 23:45:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_responsive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_image2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_image2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `image_responsive`, `title_image`, `alt_image`, `title_image2`, `alt_image2`, `title`, `text`, `url`, `position_order`, `created_at`, `updated_at`) VALUES
(1, 'IMG-SLD-1-1.png', '', 'Slide 1', 'Slide 1', NULL, NULL, '<h2>Disfruta de mi sitio web<br /> <strong>Registrate</strong></h2>', '<p>Conoce m&aacute;s de nuestro contenido.</p>', '/', 1, '2017-10-18 00:13:09', '2018-09-03 23:59:13'),
(2, 'IMG-SLD-1-2.png', '', 'Sitio web Corporativo', 'Sitio web Corporativo', NULL, NULL, '<h2>Sitio web<br /> <strong>Corporativo</strong></h2>', '<p>informaci&oacute;n de sitios web</p>', '/', 2, '2017-10-18 00:14:42', '2018-09-03 23:41:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brian Alzate', 'brian.1997.alzate@gmail.com', '$2y$10$Qkpq.s6sV7p36k3hcY3pI.cmpPD3LdMkkKjQOOv00B6xVJe0fy8di', 1, 'bhF2pg1H2U6FYyHV8joi9f9wO6dBUPGipTb9mcYMIvt2ochSt9kTlTBJcyFf', NULL, '2018-09-04 02:52:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_plan_id_foreign` (`plan_id`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_section_id_foreign` (`section_id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

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
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
