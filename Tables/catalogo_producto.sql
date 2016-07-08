-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2016 a las 09:45:39
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
-- Estructura de tabla para la tabla `catalogo_producto`
--

CREATE TABLE `catalogo_producto` (
  `id` int(11) NOT NULL,
  `catalogo_id` int(11) NOT NULL,
  `campana_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT '0: INACTIVO\n1: ACTIVO',
  `precio_vta` decimal(10,2) NOT NULL,
  `unidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




