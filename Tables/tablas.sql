SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;




CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `codigo` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `catalogo` (`id`, `descripcion`, `mes`, `anio`, `estado`, `codigo`) VALUES
(1, 'Julio', 7, 2016, 1, '201607'),
(2, 'Junio', 6, 2016, 1, '201606');

CREATE TABLE IF NOT EXISTS `catalogo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalogo_id` int(11) NOT NULL,
  `campana_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_vta` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `unidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  PRIMARY KEY (`id`),
  KEY `fk_catalogo_producto_catalogo_idx` (`catalogo_id`),
  KEY `fk_catalogo_producto_producto1_idx` (`producto_id`),
  KEY `fk_catalogo_producto_campana1_idx` (`campana_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `distrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantmaxzonas` int(11) DEFAULT NULL,
  `extension` int(11) DEFAULT NULL,
  `numzonas` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `distrito` (`id`, `codigo`, `nombre`, `cantmaxzonas`, `extension`, `numzonas`, `estado`) VALUES
(1, NULL, 'CERCADO DE LIMA', NULL, NULL, NULL, 1),
(2, NULL, 'CALLAO', NULL, NULL, NULL, 1);



CREATE TABLE IF NOT EXISTS `interlocutor_comercial` (
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
  `TipoDocumento_codigo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interlocutor_comercial_zona1_idx` (`zona_id`),
  KEY `fk_interlocutor_comercial_roles1_idx` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `interlocutor_comercial` (`id`, `zona_id`, `roles_id`, `distrito`, `nombre`, `apellido`, `direccion`, `ciudad`, `codigo`, `estado`, `celular`, `sexo`, `estadoCivil`, `ocupacion`, `telefono`, `email`, `FecNacimiento`, `FecContratacion`, `ReportsTo`, `NumeroDoc`, `Descuento`, `CodPostal`, `Fax`, `PaginaWeb`, `Zona`, `Rol`, `TipoDocumento_codigo`) VALUES
(1, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 12345678, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(2, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 1234567, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(3, 1, 1, '', '', NULL, '', '', NULL, '1', 0, NULL, NULL, NULL, 135454354, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0);

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pedido_id` int(11) NOT NULL,
  `interlocutor_comercial_id` int(11) NOT NULL,
   PRIMARY KEY (`id`),
  KEY `fk_pedido_tipo_pedido1_idx` (`tipo_pedido_id`),
  KEY `fk_pedido_interlocutor_comercial1_idx` (`interlocutor_comercial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `pedido` (`id`, `tipo_pedido_id`, `interlocutor_comercial_id`) VALUES
(8001, 800, 1),
(9001, 900, 2);

CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cantidad_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_detalle_producto1_idx` (`producto_id`),
  KEY `fk_pedido_detalle_pedido1_idx` (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `familia_id` int(11) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `precio_vta` decimal(10,2) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_familia1_idx` (`familia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

INSERT INTO `producto` (`id`, `familia_id`, `codigo`, `nombre`, `unidad`, `precio`, `precio_vta`, `descuento`, `estado`) VALUES
(100, 1, 'PROD001', 'Colorette MacFactor', 5, 30.00, 45.00, 20, 1),
(101, 2, 'PROD0002', 'Tommy hilgiger - Hombre', 20, 100.00, 150.00, 10, 1),
(102, 3, 'PROD0003', 'Jabon Jhonson', 60, 10.00, 15.00, 15, 1),
(103, 2, 'PROD0004', 'Carolina Herrera - Mujer', 15, 100.00, 160.00, 8, 1),
(104, 1, 'PROD0004', 'Delineador Liquido Negro', 40, 12.00, 20.00, 12, 1);

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `roles` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, NULL, 'Rol 1', 1),
(2, NULL, 'ROL 2', 1);

CREATE TABLE IF NOT EXISTS `tipo_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `tipo_pedido` (`id`, `nombre`, `estado`) VALUES
(800, 'CONSULTORA', 1),
(900, 'TIENDA', 1);




CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `despacho_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `monto_venta` decimal(10,2) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `observacion` varchar(20) NOT NULL,
  `fecha_venta` date NOT NULL,
  `codigo_venta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_pedido1_idx` (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `zona` (
  `id` int(11) NOT NULL,
  `distrito_id` int(11) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `CantMaxConsult` int(11) NOT NULL,
  `Extension` int(11) NOT NULL,
  `Distrito` int(11) NOT NULL,
  `Registrados` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zona_distrito1_idx` (`distrito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `zona` (`id`, `distrito_id`, `Codigo`, `Nombre`, `CantMaxConsult`, `Extension`, `Distrito`, `Registrados`) VALUES
(1, 1, NULL, 'ZONA 01', 0, 0, 0, NULL),
(2, 2, NULL, 'ZONA 2', 0, 0, 0, NULL);

ALTER TABLE `catalogo_producto`
  ADD CONSTRAINT `fk_catalogo_producto_campana1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_catalogo` FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_producto_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



ALTER TABLE `interlocutor_comercial`
  ADD CONSTRAINT `fk_interlocutor_comercial_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_interlocutor_comercial_zona1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_interlocutor_comercial1` FOREIGN KEY (`interlocutor_comercial_id`) REFERENCES `interlocutor_comercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_tipo_pedido1` FOREIGN KEY (`tipo_pedido_id`) REFERENCES `tipo_pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `fk_pedido_detalle_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `zona`
  ADD CONSTRAINT `fk_zona_distrito1` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
