-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2016 a las 11:47:10
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ya`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `up_cargarPedidoVenta` ()  BEGIN

declare idPedido int;
declare ide int;
declare cod varchar(20);
declare idTipoPedido int;
declare idInterlocutor int;
declare cantSinStock int default 0;
declare idPedidoDetalle int;
declare idProducto int(11);
declare cantProducto int(11);
declare cantProd int(11);
declare montoOperacion double default 0;
declare precio double;
declare pedidoId int;
declare flag int;

declare leer_pedidos cursor for
select id, tipo_pedido_id, interlocutor_comercial_id from pedido;


declare leer_detalle cursor for 
select id, producto_id, cantidad, pedido_id from pedido_detalle;


DECLARE CONTINUE HANDLER FOR NOT FOUND SET @hecho = TRUE;

open leer_pedidos;

loop1: loop

fetch leer_pedidos into idPedido, idTipoPedido, idInterlocutor;


IF @hecho THEN
LEAVE loop1;
END IF;


open leer_detalle;

loop2: loop

fetch leer_detalle into idPedidoDetalle, idProducto, cantProd, pedidoId;

IF @hecho THEN
LEAVE loop2;
END IF;



if pedidoId = idPedido then
set cantProducto = (select stock from catalogo_producto where id=idProducto);
if cantProducto > 0 then
set precio = (select precio_vta from catalogo_producto where id=idProducto);
if cantProducto > cantProd then
	update catalogo_producto set stock = (stock - cantProd) where producto_id = idProducto;
	update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
else
	if cantProducto = cantProd then
		update catalogo_producto set stock = 0 where producto_id = idProducto;
update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
	else
		set cantProd = cantProducto;
        update catalogo_producto set stock= 0 where producto_id = idProducto;
update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
    end if;
end if;
set montoOperacion = montoOperacion + (cantProd*precio); 
set flag=1;
end if;

end if;

end loop loop2;

if flag=1 then

set ide=(select max(id) + 1 from venta);
set cod=(select concat('VNT',ide) from venta limit 1);

insert into venta
(id,despacho_id, pedido_id, codigo_venta, monto_venta, estado, observacion, fecha_venta)
values
(ide,'', idPedido,cod
, montoOperacion, 1, 'Enviado',curdate());
end if;
set montoOperacion=0;
END LOOP loop1;


close leer_detalle;
close leer_pedidos;

END$$

DELIMITER ;

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
(1, 'Julio', 7, 2016, 1, '201607'),
(2, 'Junio', 6, 2016, 1, '201606');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_producto`
--

CREATE TABLE `catalogo_producto` (
  `id` int(11) NOT NULL,
  `catalogo_id` int(11) NOT NULL,
  `campana_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_vta` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `unidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantmaxzonas` int(11) DEFAULT NULL,
  `extension` int(11) DEFAULT NULL,
  `numzonas` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id`, `codigo`, `nombre`, `cantmaxzonas`, `extension`, `numzonas`, `estado`) VALUES
(1, NULL, 'CERCADO DE LIMA', NULL, NULL, NULL, 1),
(2, NULL, 'CALLAO', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interlocutor_comercial`
--

CREATE TABLE `interlocutor_comercial` (
  `id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `estado` varchar(12) NOT NULL,
  `celular` int(11) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estadoCivil` varchar(12) DEFAULT NULL,
  `ocupacion` varchar(20) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `FecNacimiento` varchar(45) DEFAULT NULL,
  `FecContratacion` varchar(45) DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL,
  `NumeroDoc` int(11) NOT NULL,
  `Descuento` double DEFAULT NULL,
  `CodPostal` varchar(30) DEFAULT NULL,
  `Fax` int(11) DEFAULT NULL,
  `PaginaWeb` varchar(45) DEFAULT NULL,
  `Zona` int(11) NOT NULL,
  `Rol` int(11) NOT NULL,
  `TipoDocumento_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `interlocutor_comercial`
--

INSERT INTO `interlocutor_comercial` (`id`, `zona_id`, `roles_id`, `distrito`, `nombre`, `apellido`, `direccion`, `ciudad`, `codigo`, `estado`, `celular`, `sexo`, `estadoCivil`, `ocupacion`, `telefono`, `email`, `FecNacimiento`, `FecContratacion`, `ReportsTo`, `NumeroDoc`, `Descuento`, `CodPostal`, `Fax`, `PaginaWeb`, `Zona`, `Rol`, `TipoDocumento_codigo`) VALUES
(1, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 12345678, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(2, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 1234567, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(3, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 135454354, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0);

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
(8001, 800, 1),
(9001, 900, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cantidad_at` int(11) DEFAULT NULL
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
(100, 1, 'PROD001', 'Colorette MacFactor', 5, '30.00', '45.00', 20, 1),
(101, 2, 'PROD0002', 'Tommy hilgiger - Hombre', 20, '100.00', '150.00', 10, 1),
(102, 3, 'PROD0003', 'Jabon Jhonson', 60, '10.00', '15.00', 15, 1),
(103, 2, 'PROD0004', 'Carolina Herrera - Mujer', 15, '100.00', '160.00', 8, 1),
(104, 1, 'PROD0004', 'Delineador Liquido Negro', 40, '12.00', '20.00', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, NULL, 'Rol 1', 1),
(2, NULL, 'ROL 2', 1);

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
(800, 'CONSULTORA', 1),
(900, 'TIENDA', 1);

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
  `despacho_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `monto_venta` decimal(10,2) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `observacion` varchar(20) NOT NULL,
  `fecha_venta` date NOT NULL,
  `codigo_venta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `distrito_id` int(11) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `CantMaxConsult` int(11) NOT NULL,
  `Extension` int(11) NOT NULL,
  `Distrito` int(11) NOT NULL,
  `Registrados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id`, `distrito_id`, `Codigo`, `Nombre`, `CantMaxConsult`, `Extension`, `Distrito`, `Registrados`) VALUES
(1, 1, NULL, 'ZONA 01', 0, 0, 0, NULL),
(2, 2, NULL, 'ZONA 2', 0, 0, 0, NULL);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `fk_catalogo_producto_campana1_idx` (`campana_id`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `interlocutor_comercial`
--
ALTER TABLE `interlocutor_comercial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_interlocutor_comercial_zona1_idx` (`zona_id`),
  ADD KEY `fk_interlocutor_comercial_roles1_idx` (`roles_id`);

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
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_familia1_idx` (`familia_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
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
  ADD KEY `fk_venta_pedido1_idx` (`pedido_id`);

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
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `catalogo_producto`
--
ALTER TABLE `catalogo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9002;
--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;
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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogo_producto`
--
ALTER TABLE `catalogo_producto`
  ADD CONSTRAINT `fk_catalogo_producto_campana1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_catalogo` FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `interlocutor_comercial`
--
ALTER TABLE `interlocutor_comercial`
  ADD CONSTRAINT `fk_interlocutor_comercial_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_interlocutor_comercial_zona1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_zona_distrito1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
