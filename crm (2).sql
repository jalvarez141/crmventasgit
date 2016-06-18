-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2016 a las 10:53:26
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campana`
--

CREATE TABLE `campana` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: inactivo\n1: activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campana`
--

INSERT INTO `campana` (`id`, `nombre`, `estado`) VALUES
(100, 'cat01', 1),
(101, 'cat02', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `codigo` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id`, `descripcion`, `mes`, `anio`, `estado`, `codigo`) VALUES
(100, 'cat01', 1, 2016, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_producto`
--

CREATE TABLE `catalogo_producto` (
  `id` int(11) NOT NULL,
  `catalogo_id` int(11) NOT NULL,
  `campana_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `incentivo_id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `nomcatprod` varchar(45) NOT NULL,
  `precatprod` float NOT NULL,
  `tamcatprod` int(11) NOT NULL,
  `stocatprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogo_producto`
--

INSERT INTO `catalogo_producto` (`id`, `catalogo_id`, `campana_id`, `producto_id`, `incentivo_id`, `descripcion`, `estado`, `nomcatprod`, `precatprod`, `tamcatprod`, `stocatprod`) VALUES
(100, 100, 100, 100, 100, NULL, NULL, 'Perfume Urban', 66, 100, 12),
(101, 100, 101, 100, 100, NULL, NULL, 'Perfume Pulso', 100, 100, 5),
(102, 100, 100, 101, 100, NULL, NULL, 'Perfume Grazia', 37, 75, 12),
(103, 100, 100, 102, 100, NULL, NULL, 'Perfume Prints', 25, 50, 10),
(104, 100, 100, 103, 100, NULL, NULL, 'Perfume Nitro', 45, 100, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `despacho` (
  `id` int(11) NOT NULL,
  `operacion_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `codigo`, `nombre`, `latitud`, `longitud`, `estado`) VALUES
(100, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_premios`
--

CREATE TABLE `entrega_premios` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: inactivo\n1: activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `nombre`, `estado`) VALUES
(100, 'perfumes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganadoras`
--

CREATE TABLE `ganadoras` (
  `id` int(11) NOT NULL,
  `entrega_premios_id` int(11) NOT NULL,
  `interlocutor_comercial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incentivo`
--

CREATE TABLE `incentivo` (
  `id` int(11) NOT NULL,
  `tipo_incentivo_id` int(11) NOT NULL,
  `puntaje_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: inactivo\n1: activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `incentivo`
--

INSERT INTO `incentivo` (`id`, `tipo_incentivo_id`, `puntaje_id`, `producto_id`, `nombre`, `estado`) VALUES
(100, 100, 100, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interlocutor_comercial`
--

CREATE TABLE `interlocutor_comercial` (
  `id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `interlocutor_comercial`
--

INSERT INTO `interlocutor_comercial` (`id`, `zona_id`, `roles_id`, `codigo`, `nombre`, `apellido`, `email`, `telefono`, `estado`) VALUES
(100, 100, 100, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 100, 100, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` int(11) NOT NULL,
  `template_type` varchar(50) DEFAULT NULL,
  `subject` varchar(150) NOT NULL,
  `template` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL DEFAULT '',
  `body` text,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_by` enum('sender','receiver') DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `subject`, `body`, `is_read`, `deleted_by`, `created_at`) VALUES
(11, 10, 21, 'asunto', 'prueba de yii con bd', '0', 'receiver', '2016-06-15 00:00:00'),
(1234, 12345, 456789, 'saludos', 'prueba de ejmplo con codigo ampliado', '0', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `id` int(11) NOT NULL,
  `tipo_operacion_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `codigo_operacion` varchar(255) DEFAULT NULL,
  `monto_operacion` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `observacion` varchar(45) NOT NULL,
  `fecha_operacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion_detalle`
--

CREATE TABLE `operacion_detalle` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `producto_id_operacion` int(11) DEFAULT NULL,
  `operacion_id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `secuencia` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: ANULADO\n1: NO ANULADO',
  `fecha_operacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `tipo_pedido_id` int(11) NOT NULL,
  `interlocutor_comercial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `tipo_pedido_id`, `interlocutor_comercial_id`) VALUES
(8001, 800, 100),
(9001, 900, 100),
(9002, 800, 100),
(9003, 800, 100),
(9004, 800, 100),
(9005, 800, 100),
(9006, 800, 100),
(9007, 800, 100),
(9008, 800, 100),
(9009, 800, 100),
(9010, 900, 101),
(9011, 800, 101),
(9012, 800, 101),
(9013, 800, 101),
(9014, 900, 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido_detalle`
--

INSERT INTO `pedido_detalle` (`id`, `producto_id`, `pedido_id`, `cantidad`) VALUES
(1001, 100, 9001, 6),
(1002, 100, 9001, 6),
(1006, 102, 9001, 12),
(1007, 103, 8001, 1),
(1008, 103, 8001, 1),
(1011, 102, 9001, 12),
(1014, 103, 9001, 12),
(1015, 103, 9001, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_despacho`
--

CREATE TABLE `personal_despacho` (
  `id` int(11) NOT NULL,
  `despacho_id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `familia_id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `precio_vta` decimal(10,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `familia_id`, `codigo`, `nombre`, `unidad`, `precio`, `precio_vta`, `descuento`, `estado`) VALUES
(100, 100, 'pf100', 'perfume urban nite', 1000, '30.00', '35.00', 5, NULL),
(101, 100, '7001', 'Perfume Grazia', 75, '30.00', '35.00', NULL, NULL),
(102, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
  `id` int(11) NOT NULL,
  `interlocutor_comercial_id` int(11) NOT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: inactivo\n1: activo',
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`id`, `interlocutor_comercial_id`, `puntaje`, `estado`, `fecha`) VALUES
(100, 100, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion`
--

CREATE TABLE `relacion` (
  `id` int(11) NOT NULL,
  `tipo_relacion_id` int(11) NOT NULL,
  `interlocutor_comercial_id` int(11) NOT NULL,
  `interlocutor_comercial_id_alt` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `codigo`, `nombre`, `estado`) VALUES
(100, '1002', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_incentivo`
--

CREATE TABLE `tipo_incentivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: inactivo\n1: activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_incentivo`
--

INSERT INTO `tipo_incentivo` (`id`, `nombre`, `estado`) VALUES
(100, 'muestra', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

CREATE TABLE `tipo_operacion` (
  `id` int(11) NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pedido`
--

CREATE TABLE `tipo_pedido` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pedido`
--

INSERT INTO `tipo_pedido` (`id`, `nombre`, `estado`) VALUES
(800, 'consultora', NULL),
(900, 'tienda', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_relacion`
--

CREATE TABLE `tipo_relacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `code` char(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` varchar(64) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email_verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `code`, `name`, `surname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`, `username`, `email_verification_status`, `email_verification_code`) VALUES
(1, NULL, NULL, NULL, 'jLzyJFAZzZGi3_nhAge8qcRg39psgnMt', '$2y$13$4h5cKb9htS5Htmj47F6QM.8hNbbEsrn5FGrI82LBzk2iYu9z4gY96', NULL, 'tienda@ventas.com', 10, 1466105242, 1466105242, '', 'ventatienda', 0, NULL),
(111019, 'prueba', 'ejemplo', 'ejemplo2', '', 'tienda', NULL, 'tiendaejemplo', 1, 0, 0, '', 'tienda', 0, NULL),
(111020, NULL, NULL, NULL, '4jm3A2SlFt2-U5a3_fNa_OYzsM_vTe63', '$2y$13$v9T0IA3ZU0MDf.PHOgddpuRQ/WllCZV6EAEIz4LJF7GWsU4xjBCUu', NULL, 'tiendaventas@mail.com', 10, 1466107364, 1466107364, '', 'tiendaventas', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `despacho_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `distrito_id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `distrito_id`, `codigo`, `nombre`, `estado`) VALUES
(100, 100, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `campana`
--
ALTER TABLE `campana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_producto`
--
ALTER TABLE `catalogo_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catalogo_producto_catalogo_idx` (`catalogo_id`),
  ADD KEY `fk_catalogo_producto_producto1_idx` (`producto_id`),
  ADD KEY `fk_catalogo_producto_incentivo1_idx` (`incentivo_id`),
  ADD KEY `fk_catalogo_producto_campana1_idx` (`campana_id`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_despacho_operacion1_idx` (`operacion_id`),
  ADD KEY `fk_despacho_pedido1_idx` (`pedido_id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrega_premios`
--
ALTER TABLE `entrega_premios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrega_premios_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ganadoras`
--
ALTER TABLE `ganadoras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ganadoras_entrega_premios1_idx` (`entrega_premios_id`),
  ADD KEY `fk_ganadoras_interlocutor_comercial1_idx` (`interlocutor_comercial_id`);

--
-- Indices de la tabla `incentivo`
--
ALTER TABLE `incentivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_incentivo_tipo_incentivo1_idx` (`tipo_incentivo_id`),
  ADD KEY `fk_incentivo_puntaje1_idx` (`puntaje_id`),
  ADD KEY `fk_incentivo_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `interlocutor_comercial`
--
ALTER TABLE `interlocutor_comercial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_interlocutor_comercial_zona1_idx` (`zona_id`),
  ADD KEY `fk_interlocutor_comercial_roles1_idx` (`roles_id`);

--
-- Indices de la tabla `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender_id`),
  ADD KEY `reciever` (`receiver_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operacion_tipo_operacion2_idx` (`tipo_operacion_id`),
  ADD KEY `fk_operacion_pedido1_idx` (`pedido_id`);

--
-- Indices de la tabla `operacion_detalle`
--
ALTER TABLE `operacion_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operacion_detalle_producto1_idx` (`producto_id`),
  ADD KEY `fk_operacion_detalle_operacion1_idx` (`operacion_id`),
  ADD KEY `fk_operacion_detalle_zona1_idx` (`zona_id`),
  ADD KEY `fk_operacion_detalle_producto2_idx` (`producto_id_operacion`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_tipo_pedido1_idx` (`tipo_pedido_id`),
  ADD KEY `fk_pedido_interlocutor_comercial1_idx` (`interlocutor_comercial_id`);

--
-- Indices de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_detalle_producto1_idx` (`producto_id`),
  ADD KEY `fk_pedido_detalle_pedido1_idx` (`pedido_id`);

--
-- Indices de la tabla `personal_despacho`
--
ALTER TABLE `personal_despacho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_despacho_despacho1_idx` (`despacho_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_familia1_idx` (`familia_id`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_puntaje_interlocutor_comercial1_idx` (`interlocutor_comercial_id`);

--
-- Indices de la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_relacion_tipo_relacion1_idx` (`tipo_relacion_id`),
  ADD KEY `fk_relacion_interlocutor_comercial1_idx` (`interlocutor_comercial_id`),
  ADD KEY `fk_relacion_interlocutor_comercial2_idx` (`interlocutor_comercial_id_alt`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `tipo_incentivo`
--
ALTER TABLE `tipo_incentivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_relacion`
--
ALTER TABLE `tipo_relacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta_pedido1_idx` (`pedido_id`),
  ADD KEY `fk_venta_despacho1_idx` (`despacho_id`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta_detalle_venta1_idx` (`venta_id`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zona_distrito1_idx` (`distrito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campana`
--
ALTER TABLE `campana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `catalogo_producto`
--
ALTER TABLE `catalogo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `entrega_premios`
--
ALTER TABLE `entrega_premios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `incentivo`
--
ALTER TABLE `incentivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `interlocutor_comercial`
--
ALTER TABLE `interlocutor_comercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operacion_detalle`
--
ALTER TABLE `operacion_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9015;
--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;
--
-- AUTO_INCREMENT de la tabla `personal_despacho`
--
ALTER TABLE `personal_despacho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `relacion`
--
ALTER TABLE `relacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_incentivo`
--
ALTER TABLE `tipo_incentivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;
--
-- AUTO_INCREMENT de la tabla `tipo_relacion`
--
ALTER TABLE `tipo_relacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111021;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `catalogo_producto`
--
ALTER TABLE `catalogo_producto`
  ADD CONSTRAINT `fk_catalogo_producto_campana1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_catalogo` FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_incentivo1` FOREIGN KEY (`incentivo_id`) REFERENCES `incentivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD CONSTRAINT `fk_despacho_operacion1` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despacho_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrega_premios`
--
ALTER TABLE `entrega_premios`
  ADD CONSTRAINT `fk_entrega_premios_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ganadoras`
--
ALTER TABLE `ganadoras`
  ADD CONSTRAINT `fk_ganadoras_entrega_premios1` FOREIGN KEY (`entrega_premios_id`) REFERENCES `entrega_premios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ganadoras_interlocutor_comercial1` FOREIGN KEY (`interlocutor_comercial_id`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `incentivo`
--
ALTER TABLE `incentivo`
  ADD CONSTRAINT `fk_incentivo_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incentivo_puntaje1` FOREIGN KEY (`puntaje_id`) REFERENCES `puntaje` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incentivo_tipo_incentivo1` FOREIGN KEY (`tipo_incentivo_id`) REFERENCES `tipo_incentivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `interlocutor_comercial`
--
ALTER TABLE `interlocutor_comercial`
  ADD CONSTRAINT `fk_interlocutor_comercial_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_interlocutor_comercial_zona1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `fk_operacion_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacion_tipo_operacion2` FOREIGN KEY (`tipo_operacion_id`) REFERENCES `tipo_operacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacion_detalle`
--
ALTER TABLE `operacion_detalle`
  ADD CONSTRAINT `fk_operacion_detalle_operacion1` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacion_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacion_detalle_producto2` FOREIGN KEY (`producto_id_operacion`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacion_detalle_zona1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_interlocutor_comercial1` FOREIGN KEY (`interlocutor_comercial_id`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_tipo_pedido1` FOREIGN KEY (`tipo_pedido_id`) REFERENCES `tipo_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `fk_pedido_detalle_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal_despacho`
--
ALTER TABLE `personal_despacho`
  ADD CONSTRAINT `fk_personal_despacho_despacho1` FOREIGN KEY (`despacho_id`) REFERENCES `despacho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fk_puntaje_interlocutor_comercial1` FOREIGN KEY (`interlocutor_comercial_id`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD CONSTRAINT `fk_relacion_interlocutor_comercial1` FOREIGN KEY (`interlocutor_comercial_id`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relacion_interlocutor_comercial2` FOREIGN KEY (`interlocutor_comercial_id_alt`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relacion_tipo_relacion1` FOREIGN KEY (`tipo_relacion_id`) REFERENCES `tipo_relacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_despacho1` FOREIGN KEY (`despacho_id`) REFERENCES `despacho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD CONSTRAINT `fk_venta_detalle_venta1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_zona_distrito1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
