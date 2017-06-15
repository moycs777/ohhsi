-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2017 a las 22:17:08
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ohhsi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compras_clientes` int(10) UNSIGNED NOT NULL,
  `id_producto_venta` int(10) UNSIGNED NOT NULL,
  `opinion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrellas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `id_compras_clientes`, `id_producto_venta`, `opinion`, `estrellas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 6, 'Es Dexterrrrrr!!!!!!!!!!!!! es super finoo hehe, me encanto', 5, '2017-05-04 00:14:58', '2017-05-04 00:14:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_post`
--

CREATE TABLE `categoria_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categoria_padre` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_post`
--

INSERT INTO `categoria_post` (`id`, `descripcion`, `estado`, `id_categoria_padre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Categoria Post Padre', 'a', 0, '2015-03-15 03:00:00', NULL, NULL),
(2, 'Hijo Multimedia', 'a', 1, NULL, NULL, NULL),
(3, 'Nieto Multimedia', 'a', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categoria_padre` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id`, `descripcion`, `estado`, `id_categoria_padre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lubricantes', 'a', 0, NULL, NULL, NULL),
(2, 'Comestible', 'a', 1, NULL, NULL, NULL),
(3, 'Lubricante de Chocolate', 'a', 2, NULL, NULL, NULL),
(4, 'No comestible', 'a', 1, NULL, NULL, NULL),
(5, 'Locion humectante', 'a', 4, NULL, NULL, NULL),
(6, 'Ropa', 'a', 0, NULL, NULL, NULL),
(7, 'Hombre', 'a', 6, NULL, NULL, NULL),
(8, 'Boxer', 'a', 7, NULL, NULL, NULL),
(9, 'Mujer', 'a', 6, NULL, NULL, NULL),
(10, 'Bra', 'a', 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `lastname`, `email`, `password`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Moises', 'Serrano', 'moycs777@gmail.com', '$2y$10$e2A/.KzBa2gmSzG2P.O3PuBhVHCrYxzRpRnWayNaH0F87gf8jCTum', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_direccion_envio`
--

CREATE TABLE `cliente_direccion_envio` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `nombre_contacto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente_direccion_envio`
--

INSERT INTO `cliente_direccion_envio` (`id`, `id_cliente`, `nombre_contacto`, `pais`, `direccion1`, `direccion2`, `ciudad`, `estado`, `codigo_postal`, `telefono`, `principal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ejhkj', 'hjkjh', 'kh', 'khh', 'hkjhkh', 'khjhk', '46546', '45646', '1', '2017-05-04 00:14:38', '2017-05-04 00:14:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_clientes`
--

CREATE TABLE `compras_clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `monto_compra` double(8,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `despacho` tinyint(1) DEFAULT NULL,
  `calificacion` tinyint(1) DEFAULT NULL,
  `soporte_pago` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras_clientes`
--

INSERT INTO `compras_clientes` (`id`, `monto_compra`, `fecha_compra`, `fecha_despacho`, `despacho`, `calificacion`, `soporte_pago`, `id_cliente`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 123.00, '2017-05-03', NULL, 0, NULL, NULL, 1, '2017-05-04 00:14:45', '2017-05-04 00:14:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_clientes_detalle`
--

CREATE TABLE `compras_clientes_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto_venta` int(10) UNSIGNED NOT NULL,
  `id_compras_clientes` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras_clientes_detalle`
--

INSERT INTO `compras_clientes_detalle` (`id`, `id_producto_venta`, `id_compras_clientes`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 1, 1, 123.00, '2017-05-04 00:14:45', '2017-05-04 00:14:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laradrop_files`
--

CREATE TABLE `laradrop_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_thumbnail` smallint(6) NOT NULL DEFAULT '0',
  `meta` text COLLATE utf8mb4_unicode_ci,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_resource_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2015_08_09_000000_create_laradrop_files_table', 1),
(21, '2016_02_25_000000_modify_laradrop_files_table_add_nesting', 1),
(22, '2017_02_14_015723_create_multimedia_table', 1),
(23, '2017_02_14_023053_create_categorias_productos_table', 1),
(24, '2017_02_14_025626_create_productos_ventas_table', 1),
(25, '2017_02_14_025644_create_clientes_table', 1),
(26, '2017_02_14_025710_create_categorias_posts_table', 1),
(27, '2017_02_14_025711_create_posts_table', 1),
(28, '2017_02_14_025803_create_compras_clientes_table', 1),
(29, '2017_02_14_025824_create_productos_ventas_galerias_table', 1),
(30, '2017_02_14_025854_create_compras_clientes_detalles_table', 1),
(31, '2017_02_14_025926_create_clientes_direccions_envios_table', 1),
(32, '2017_02_14_030009_create_calificacion_table', 1),
(33, '2017_02_27_184527_producto_t', 1),
(34, '2017_03_23_070053_create_post_galeria_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id`, `ruta`, `tipo_archivo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/public/images/3.jpg', 'image/jpeg', '2017-05-04 00:03:03', '2017-05-04 00:03:03', NULL),
(2, '/public/images/12983396_624308171059913_437999983467292820_o.jpg', 'image/jpeg', '2017-05-04 00:03:31', '2017-05-04 00:03:31', NULL),
(3, '/public/images/14192623_1992385964321007_3180294472961223682_n.jpg', 'image/jpeg', '2017-05-04 00:03:59', '2017-05-04 00:03:59', NULL),
(4, '/public/images/aizen.jpg', 'image/jpeg', '2017-05-04 00:07:47', '2017-05-04 00:07:47', NULL),
(5, '/public/images/moycs777.jpg', 'image/jpeg', '2017-05-04 00:10:16', '2017-05-04 00:10:16', NULL),
(6, '/public/images/dexter.png', 'image/png', '2017-05-04 00:12:28', '2017-05-04 00:12:28', NULL),
(7, '/public/images/fuente.jpg', 'image/jpeg', '2017-05-04 00:12:50', '2017-05-04 00:12:50', NULL),
(8, '/public/images/siya.jpg', 'image/jpeg', '2017-05-04 00:13:48', '2017-05-04 00:13:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_categoria_post` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_galeria`
--

CREATE TABLE `post_galeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_multimedia` int(10) UNSIGNED NOT NULL,
  `id_post` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_categoria_producto` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`id`, `id_categoria_producto`, `titulo`, `slug`, `descripcion`, `cantidad`, `precio_venta`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'uno', 'uno', '<p>Descripcion del producto.</p>', 456, 546, '1', '2017-05-04 00:03:11', '2017-05-04 00:03:11', NULL),
(2, 3, 'dos', 'dos', '<p>Descripcion del producto.</p>', 456, 5645, '1', '2017-05-04 00:03:39', '2017-05-04 00:03:39', NULL),
(3, 10, 'tres', 'tres', '<p>Descripcion del producto.</p>', 65, 456, '1', '2017-05-04 00:04:08', '2017-05-04 00:04:08', NULL),
(4, 3, 'aizen', 'aizen', '<p>Descripcion del producto.</p>', 456, 654, '1', '2017-05-04 00:07:55', '2017-05-04 00:07:55', NULL),
(5, 3, 'Moises', 'moises', '<p>Descripcion del producto.</p>', 7, 777, '1', '2017-05-04 00:10:25', '2017-05-04 00:10:25', NULL),
(6, 3, 'Dexter', 'dexter', '<p>Descripcion del producto.</p>', 321, 123, '1', '2017-05-04 00:12:35', '2017-05-04 00:12:35', NULL),
(7, 3, 'Fuente', 'fuente', '<p>Descripcion del producto.</p>', 654, 456, '1', '2017-05-04 00:12:57', '2017-05-04 00:12:57', NULL),
(8, 10, 'Seiya', 'seiya', '<p>Descripcion del producto.</p>', 987, 789, '1', '2017-05-04 00:13:58', '2017-05-04 00:13:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta_galeria`
--

CREATE TABLE `producto_venta_galeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_multimedia` int(10) UNSIGNED NOT NULL,
  `id_producto_venta` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_venta_galeria`
--

INSERT INTO `producto_venta_galeria` (`id`, `id_multimedia`, `id_producto_venta`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2017-05-04 00:03:12', '2017-05-04 00:03:12', NULL),
(2, 2, 2, '2017-05-04 00:03:39', '2017-05-04 00:03:39', NULL),
(3, 3, 3, '2017-05-04 00:04:08', '2017-05-04 00:04:08', NULL),
(4, 4, 4, '2017-05-04 00:07:55', '2017-05-04 00:07:55', NULL),
(5, 5, 5, '2017-05-04 00:10:25', '2017-05-04 00:10:25', NULL),
(6, 6, 6, '2017-05-04 00:12:35', '2017-05-04 00:12:35', NULL),
(7, 7, 7, '2017-05-04 00:12:57', '2017-05-04 00:12:57', NULL),
(8, 8, 8, '2017-05-04 00:13:58', '2017-05-04 00:13:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `estado`, `profile`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Moises', 'Serrano', 'moycs777@gmail.com', '$2y$10$9IK0f/9vpEw3aeMYiFYuju.eHSsXWfyDqWdnkkBs0RikrUo.U2f4G', 'a', 1, NULL, NULL, NULL, NULL),
(2, 'Josefina', 'Gonzalez', 'fixpina21@gmail.com', '$2y$10$jgBbNg/RLuTHqlX6kkuIX.whnFupVqJZvaarEhXrfY/LSjC/YdiHq', 'a', 1, NULL, NULL, NULL, NULL),
(3, 'DevTeam', 'Bolivar', 'dev@team.com', '$2y$10$dXNidxJY.tSYBMj.rt2uTuPi/d0ih1d47rBdXwSOY0YlToUNDpyDO', 'a', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificacion_id_compras_clientes_foreign` (`id_compras_clientes`),
  ADD KEY `calificacion_id_producto_venta_foreign` (`id_producto_venta`);

--
-- Indices de la tabla `categoria_post`
--
ALTER TABLE `categoria_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`),
  ADD UNIQUE KEY `clientes_provider_id_unique` (`provider_id`);

--
-- Indices de la tabla `cliente_direccion_envio`
--
ALTER TABLE `cliente_direccion_envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_direccion_envio_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_clientes_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `compras_clientes_detalle`
--
ALTER TABLE `compras_clientes_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_clientes_detalle_id_producto_venta_foreign` (`id_producto_venta`),
  ADD KEY `compras_clientes_detalle_id_compras_clientes_foreign` (`id_compras_clientes`);

--
-- Indices de la tabla `laradrop_files`
--
ALTER TABLE `laradrop_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laradrop_files_parent_id_index` (`parent_id`),
  ADD KEY `laradrop_files_lft_index` (`lft`),
  ADD KEY `laradrop_files_rgt_index` (`rgt`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id_categoria_post_foreign` (`id_categoria_post`);

--
-- Indices de la tabla `post_galeria`
--
ALTER TABLE `post_galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_galeria_id_multimedia_foreign` (`id_multimedia`),
  ADD KEY `post_galeria_id_post_foreign` (`id_post`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producto_venta_slug_unique` (`slug`),
  ADD KEY `producto_venta_id_categoria_producto_foreign` (`id_categoria_producto`);

--
-- Indices de la tabla `producto_venta_galeria`
--
ALTER TABLE `producto_venta_galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_venta_galeria_id_multimedia_foreign` (`id_multimedia`),
  ADD KEY `producto_venta_galeria_id_producto_venta_foreign` (`id_producto_venta`);

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
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria_post`
--
ALTER TABLE `categoria_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente_direccion_envio`
--
ALTER TABLE `cliente_direccion_envio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `compras_clientes_detalle`
--
ALTER TABLE `compras_clientes_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `laradrop_files`
--
ALTER TABLE `laradrop_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `post_galeria`
--
ALTER TABLE `post_galeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto_venta_galeria`
--
ALTER TABLE `producto_venta_galeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_id_compras_clientes_foreign` FOREIGN KEY (`id_compras_clientes`) REFERENCES `compras_clientes` (`id`),
  ADD CONSTRAINT `calificacion_id_producto_venta_foreign` FOREIGN KEY (`id_producto_venta`) REFERENCES `producto_venta` (`id`);

--
-- Filtros para la tabla `cliente_direccion_envio`
--
ALTER TABLE `cliente_direccion_envio`
  ADD CONSTRAINT `cliente_direccion_envio_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  ADD CONSTRAINT `compras_clientes_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compras_clientes_detalle`
--
ALTER TABLE `compras_clientes_detalle`
  ADD CONSTRAINT `compras_clientes_detalle_id_compras_clientes_foreign` FOREIGN KEY (`id_compras_clientes`) REFERENCES `compras_clientes` (`id`),
  ADD CONSTRAINT `compras_clientes_detalle_id_producto_venta_foreign` FOREIGN KEY (`id_producto_venta`) REFERENCES `producto_venta` (`id`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_id_categoria_post_foreign` FOREIGN KEY (`id_categoria_post`) REFERENCES `categoria_post` (`id`);

--
-- Filtros para la tabla `post_galeria`
--
ALTER TABLE `post_galeria`
  ADD CONSTRAINT `post_galeria_id_multimedia_foreign` FOREIGN KEY (`id_multimedia`) REFERENCES `multimedia` (`id`),
  ADD CONSTRAINT `post_galeria_id_post_foreign` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD CONSTRAINT `producto_venta_id_categoria_producto_foreign` FOREIGN KEY (`id_categoria_producto`) REFERENCES `categoria_producto` (`id`);

--
-- Filtros para la tabla `producto_venta_galeria`
--
ALTER TABLE `producto_venta_galeria`
  ADD CONSTRAINT `producto_venta_galeria_id_multimedia_foreign` FOREIGN KEY (`id_multimedia`) REFERENCES `multimedia` (`id`),
  ADD CONSTRAINT `producto_venta_galeria_id_producto_venta_foreign` FOREIGN KEY (`id_producto_venta`) REFERENCES `producto_venta` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
