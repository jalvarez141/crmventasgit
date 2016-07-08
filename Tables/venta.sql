-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2016 a las 09:44:55
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
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `despacho_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `monto_venta` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL,
  `observacion` varchar(20) NOT NULL,
  `fecha_venta` date NOT NULL,
  `codigo_venta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




