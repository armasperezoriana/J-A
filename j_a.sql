-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2022 a las 03:56:40
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `j_a`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `accion` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tabla` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dato_referencia` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idbitacora`, `fecha`, `accion`, `tabla`, `dato_referencia`) VALUES
(1, '2022-10-31 22:04:18', 'Actualizar', 'Dolar', 'Valor_actual: 5.22'),
(2, '2022-10-31 22:10:23', 'Actualizar', 'Cargo', 'Nombre_cargo: admin'),
(3, '2022-10-31 22:12:39', 'Registrar', 'Cargo', 'Nombre_cargo: Electricista'),
(4, '2022-10-31 22:12:54', 'Registrar', 'Cargo', 'Nombre_cargo: Supervisor'),
(5, '2022-10-31 22:12:55', 'Registrar', 'Cargo', 'Nombre_cargo: Supervisor'),
(6, '2022-10-31 22:12:59', 'Actualizar', 'Cargo', 'Nombre_cargo: Supervisor'),
(7, '2022-10-31 22:13:27', 'Registrar', 'Cargo', 'Nombre_cargo: Ayudante electricista'),
(8, '2022-10-31 22:13:49', 'Registrar', 'Cargo', 'Nombre_cargo: Contador'),
(9, '2022-10-31 22:14:16', 'Registrar', 'Cargo', 'Nombre_cargo: Adiministrador'),
(10, '2022-10-31 22:14:31', 'Registrar', 'Cargo', 'Nombre_cargo: Gerente general'),
(11, '2022-10-31 22:19:00', 'Actualizar', 'Trabajadores', 'Cedula_trabajador: 26561481'),
(12, '2022-10-31 22:19:58', 'Registrar', 'Trabajadores', 'Cedula_trabajador: 12345678'),
(13, '2022-10-31 22:20:13', 'Actualizar', 'Trabajadores', 'Cedula_trabajador: 26561481'),
(14, '2022-10-31 22:20:23', 'Actualizar', 'Trabajadores', 'Cedula_trabajador: 26561483'),
(15, '2022-10-31 22:21:07', 'Registrar', 'Trabajadores', 'Cedula_trabajador: 4562589'),
(16, '2022-10-31 22:21:49', 'Registrar', 'Trabajadores', 'Cedula_trabajador: 78945625'),
(17, '2022-10-31 22:22:08', 'Actualizar', 'Trabajadores', 'Cedula_trabajador: 26561487'),
(18, '2022-10-31 22:22:22', 'Actualizar', 'Trabajadores', 'Cedula_trabajador: 26561487'),
(19, '2022-10-31 22:23:21', 'Registrar', 'Trabajadores', 'Cedula_trabajador: 9634158'),
(20, '2022-10-31 22:23:30', 'Actualizar', 'Permisos', 'Cedula_trabajador: 26561483'),
(21, '2022-10-31 22:23:48', 'Registrar', 'Permisos', 'Cedula_trabajador: 4562589'),
(22, '2022-10-31 22:24:04', 'Registrar', 'Permisos', 'Cedula_trabajador: 12345678'),
(23, '2022-10-31 22:24:21', 'Registrar', 'Permisos', 'Cedula_trabajador: 78945625'),
(24, '2022-10-31 22:24:41', 'Registrar', 'Permisos', 'Cedula_trabajador: 9634158'),
(25, '2022-10-31 22:24:58', 'Actualizar', 'Recibo_bonos', 'Id_recibo_bono: 1'),
(26, '2022-10-31 22:25:07', 'Actualizar', 'Nomina', 'Id_nomina: 3'),
(27, '2022-10-31 22:25:12', 'Actualizar', 'Trabajos_extras', 'Cedula_trabajador: 26561483'),
(28, '2022-10-31 22:27:10', 'Registrar', 'Trabajos_extras', 'Cedula_trabajador: 78945625'),
(29, '2022-10-31 22:33:03', 'Registrar', 'Trabajos_extras', 'Cedula_trabajador: 9634158'),
(30, '2022-10-31 22:33:26', 'Registrar', 'Nomina', 'Id_nomina: 4'),
(31, '2022-10-31 22:33:50', 'Registrar', 'Nomina', 'Id_nomina: 5'),
(32, '2022-10-31 22:34:09', 'Registrar', 'Nomina', 'Id_nomina: 6'),
(33, '2022-10-31 22:34:26', 'Registrar', 'Nomina', 'Id_nomina: 7'),
(34, '2022-10-31 22:34:39', 'Registrar', 'Nomina', 'Id_nomina: 8'),
(35, '2022-10-31 22:34:56', 'Registrar', 'Nomina', 'Id_nomina: 9'),
(36, '2022-10-31 22:35:12', 'Registrar', 'Nomina', 'Id_nomina: 10'),
(37, '2022-10-31 22:35:27', 'Registrar', 'Nomina', 'Id_nomina: 11'),
(38, '2022-10-31 22:35:41', 'Registrar', 'Nomina', 'Id_nomina: 12'),
(39, '2022-10-31 22:35:53', 'Registrar', 'Nomina', 'Id_nomina: 13'),
(40, '2022-10-31 22:36:33', 'Actualizar', 'Bonos', 'Nombre_bono: Buen samaritano'),
(41, '2022-10-31 22:41:25', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(42, '2022-10-31 22:47:27', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(43, '2022-10-31 22:47:43', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(44, '2022-10-31 22:50:44', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(45, '2022-10-31 22:50:56', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(46, '2022-10-31 22:51:26', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(47, '2022-10-31 22:51:51', 'Registrar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(48, '2022-10-31 22:52:06', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(49, '2022-10-31 22:52:19', 'Registrar', 'Bonos', 'Nombre_bono: Cestaticket'),
(50, '2022-10-31 22:52:33', 'Actualizar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(51, '2022-10-31 22:52:40', 'Actualizar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(52, '2022-10-31 22:53:07', 'Registrar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(53, '2022-10-31 22:53:18', 'Registrar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(54, '2022-10-31 22:53:35', 'Registrar', 'Bonos', 'Nombre_bono: Compensacion alimentaria'),
(55, '2022-10-31 22:53:59', 'Registrar', 'Recibo_bonos', 'Id_recibo_bono: 2'),
(56, '2022-10-31 22:54:17', 'Registrar', 'Recibo_bonos', 'Id_recibo_bono: 3'),
(57, '2022-10-31 22:54:41', 'Registrar', 'Recibo_bonos', 'Id_recibo_bono: 4'),
(58, '2022-10-31 22:55:00', 'Registrar', 'Recibo_bonos', 'Id_recibo_bono: 5'),
(59, '2022-10-31 22:55:43', 'Actualizar', 'Usuarios', 'Cedula_trabajador: 26561483');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonos`
--

CREATE TABLE `bonos` (
  `id_bono` int(11) NOT NULL,
  `nombre_bono` varchar(50) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `moneda` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bonos`
--

INSERT INTO `bonos` (`id_bono`, `nombre_bono`, `valor`, `dias`, `id_cargo`, `moneda`, `status`) VALUES
(2, 'Buen samaritano', '100', 5, 3, 1, 0),
(3, 'Cestaticket', '40', 15, 13, 2, 1),
(4, 'Cestaticket', '50', 15, 12, 2, 1),
(5, 'Cestaticket', '50', 15, 11, 2, 1),
(6, 'Cestaticket', '50', 15, 10, 2, 1),
(7, 'Cestaticket', '50', 15, 8, 2, 1),
(8, 'Cestaticket', '50', 15, 7, 2, 1),
(9, 'Compensacion alimentaria', '80', 7, 13, 1, 1),
(10, 'Compensacion alimentaria', '60', 7, 12, 1, 1),
(11, 'Compensacion alimentaria', '50', 7, 11, 1, 1),
(12, 'Compensacion alimentaria', '30', 7, 10, 1, 1),
(13, 'Compensacion alimentaria', '40', 7, 7, 1, 1),
(14, 'Compensacion alimentaria', '50', 7, 8, 1, 1);

--
-- Disparadores `bonos`
--
DELIMITER $$
CREATE TRIGGER `after_insert_bonos` AFTER INSERT ON `bonos` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Bonos"),
    CONCAT("Nombre_bono: ", NEW.nombre_bono)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_bonos` AFTER UPDATE ON `bonos` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Bonos"),
    CONCAT("Nombre_bono: ", NEW.nombre_bono)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(30) DEFAULT NULL,
  `sueldo_semanal` varchar(20) DEFAULT NULL,
  `prima_por_hogar` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `sueldo_semanal`, `prima_por_hogar`, `status`) VALUES
(1, 'root', '000', '000', 3),
(3, 'admin', '55', '10', 0),
(5, 'holass', '100000', '15000', 0),
(6, 'hola', '0.02', '0.04', 0),
(7, 'Electricista', '50', '10', 1),
(8, 'Supervisor', '70', '10', 1),
(9, 'Supervisor', '70', '10', 0),
(10, 'Ayudante electricista', '35', '10', 1),
(11, 'Contador', '50', '10', 1),
(12, 'Adiministrador', '60', '10', 1),
(13, 'Gerente general', '90', '10', 1);

--
-- Disparadores `cargo`
--
DELIMITER $$
CREATE TRIGGER `after_insert_cargo` AFTER INSERT ON `cargo` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Cargo"),
    CONCAT("Nombre_cargo: ", NEW.nombre_cargo)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_cargo` AFTER UPDATE ON `cargo` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Cargo"),
    CONCAT("Nombre_cargo: ", NEW.nombre_cargo)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `id_deducciones` int(11) NOT NULL,
  `ivss` varchar(10) DEFAULT NULL,
  `rpe` varchar(10) DEFAULT NULL,
  `faov` varchar(10) DEFAULT NULL,
  `inces` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id_deducciones`, `ivss`, `rpe`, `faov`, `inces`) VALUES
(1, '5', '0.5', '1', '0');

--
-- Disparadores `deducciones`
--
DELIMITER $$
CREATE TRIGGER `after_update_deducciones` AFTER UPDATE ON `deducciones` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Deducciones"),
    CONCAT("Id_deducciones: ", NEW.id_deducciones)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolar`
--

CREATE TABLE `dolar` (
  `id_dolar` int(11) NOT NULL,
  `valor_actual` varchar(15) DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dolar`
--

INSERT INTO `dolar` (`id_dolar`, `valor_actual`, `fecha_actualizacion`, `status`) VALUES
(1, '5.22', '2022-10-31', 1);

--
-- Disparadores `dolar`
--
DELIMITER $$
CREATE TRIGGER `after_update_dolar` AFTER UPDATE ON `dolar` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
values(   
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Dolar"),
    CONCAT("Valor_actual: ", NEW.valor_actual)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `key_usuarios`
--

CREATE TABLE `key_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `keyPrivada` varchar(3000) NOT NULL,
  `keyPublica` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `key_usuarios`
--

INSERT INTO `key_usuarios` (`idUsuario`, `keyPrivada`, `keyPublica`) VALUES
(1, 'RGG+6iXxr+fLEjVcBehNtbCZ15s0dC+lvIjolZ82KZxpPqwYi/o7baeJCUsP5M8pc3vap2dDvu/SY9ziK6zPFIFoITIUZw1RmO/F5+wonydfZTYHW/tBS63D1cZHzMcyiX0cTKGj7Z8l77RYwPedYirWhRBA7aw/YE+CZMS66ZqxDH8UqF5+Q8MIuP2E+RjfCswvZQ6Knt9Uz4DFVlkJ83RdD7hCnwItOZ5eufTzFdy4AsHoXC3rgSC57xTybhh3RHJmAFa6+kHVc9jY2ybGkPaVk5NAWt1XAqeSFMy4Ur9SWSOe7BWD0ypa5KWWHYs+WNbO2B6mpSMO9pPtfdfpYW9M6BhFLGE50NTNwV2NdnHukD7EroMlDan+e4k+6yv7Zkvm6R5iCbhmXJ47E5hdal9yyMajuX88zY2qbNQ0QrpjmXOvvtIBbn7JRXrvC0TyhIyprr/FyJ/k8m6AQgQj7+Azwx14y22f8Y8dXaNGj0Ms/m4D3/fDqTE9AOH9Yu9Kh7H2KKagetbWTGcr7OtvGL/HJMs653TK+v0HcFZ8s/Z/sdXUCfvQyd+iDNwB4kCuSuamMnBGRqwIsHnMIcMT61HSP6XoffUyStXUmUA0+IiJzs35CA6q/M0OdFH6tApVd3q3YpGDUk/rNQs8/IvuMp9rRHUJItzk4cAxKeQuxX89qODaUMI6sJQ+sUsYy/AnQ9GX0r82E+o6uY2xhgTZweXIm8LQuZjYVPdTndyfD0ZBLCBVPEaDnntJW6W5M5/sg7q4YZnSEuZg2jPY/a3E5tkFznNLj7gHJHQcuNEEo8q/9lFOjkc+bpRJT6Nhc5BXVhscfGRwzJqrqIaZDH/ogQfKcf6Rka37KfnImT+jiYPSQY/6I9wGoyJPKz+HBF8waoOX0W8hmxdkr4vuWRHgwA==', 'ZAMScNyXjHKLadB88W32+QJ2eJak7Gv9RoXAiRT0q4GOukta9fVNC30gW8rtN4Yy6eXqqNeDlBVV2M/86xWxkUbmJK+BW7Pp9ijLKqEz8W9LYNn722O6VvLMLsjZ0ttIuShK6XoWvZlhUF8dR7SGyMQx+J/F6iQBxfqISnTE5ikb2+VYfeJgHcWpk+Z58AWVJV1TS1R3xClpuRpaWyNMSAavEVza408Z6iiFBem4zALt2MfzttVqBU8TJ7SwM6Mh'),
(37, 'RGG+6iXxr+fLEjVcBehNtbCZ15s0dC+lvIjolZ82KZxpPqwYi/o7baeJCUsP5M8pc3vap2dDvu/SY9ziK6zPFIFoITIUZw1RmO/F5+wonycW6SbfYY3F9n3NTnKrRwkRpdYBjBm1da18HR0WCjslgCrWhRBA7aw/YE+CZMS66ZoyMkhHEnb84rbmx3h5321LJveuOVhUBWi/KrhMPCxQgFJabSh9Y+W7nLxZWRaewuDYZ6txrPE3v/DqDlW9Hne7NEv5TBnMbg3wda1V5EB4HxpRPY7lKLK1utu+MrR8a6didrxKJa+Q747g8I8961kt+FNhRuyo3g8/9dhG17ke1AvAymEBjtbQ4oqSvNk6DoB0xzf/RGrBeTHZJXjtENI/vJP+5NH7wJncGK25FYcOVP+SeYTkosOrsLouu2LIY1bpCIVzi7WsAiTkGoxUXCYqyWlc1X29GMa2g1/vvfY+InT6MsyZHu6u4vSWFD6UyI3w0nz+9s3xFtzN6W6fG5NhtVjI//TPnYxI0iEdEZT3uPBlFjyqSIlHts2pGoQGK9eTTEUgon6V+G3jCX4XxmzoOmP3ZZ77u7ZBK3DnaGHLqBCOlrdROTY8iavC37nsMxoAWsXUG/unjWM7qokKnLyW0fC/5eb1KONLKgaAij8qfolM1rf0hXNwpfj83NHJSORxmKhgofL5sabRpCEFNrEFk0+7DmF2pU4SAd2IwT7tPuPFNJVz0e6Cm/naTgR1UZIuARWyVOlUFkYCpuupviYV/qQPTTOcjPzcbGaugfTzb8QRH+EGcLpHA09fdQeaAgt+MSqEBszzOTQ+kC7KdtM/BYE7KBe1M9CH5lpQkYqObwfKcf6Rka37KfnImT+jiYPSQY/6I9wGoyJPKz+HBF8waoOX0W8hmxdkr4vuWRHgwA==', 'ZAMScNyXjHKLadB88W32+QJ2eJak7Gv9RoXAiRT0q4GOukta9fVNC30gW8rtN4Yyxd+2NhBtWSlF1RwN1V8VdlVScqAXcyoFccjSyZnfarAnRO7vPkObhDmQYxjQqpdvjL9ccyptpMmB3A1nfcrIfNVzc6PxFmYEuW3M2KlLUw+p81J0bXciCjTbuo2HGAKEfaNgWbOaumHnViDnoIpyogavEVza408Z6iiFBem4zALt2MfzttVqBU8TJ7SwM6Mh'),
(38, 'RGG+6iXxr+fLEjVcBehNtbCZ15s0dC+lvIjolZ82KZxpPqwYi/o7baeJCUsP5M8pc3vap2dDvu/SY9ziK6zPFIFoITIUZw1RmO/F5+wonycAVJDRte2mHCYFsWNFw9fC4I0a4m5+WJy3rsBNop/F9CrWhRBA7aw/YE+CZMS66ZpxH0PrJYRu0ITy4UgHKLUyBp/FAVN78wKC2FLshPPC+KriGl+gCN40/oBwnGbP5w5zgI24pz1H35MxEjoy8y9eyCPrJPsp8+YWvL6QqUIAD2QRvQf6RjART4iIqealP9V938oMKdZTFFDlHdkp4tOb0lR5u7tBua0CKrY79NzJszG61WPArFzab+0dn6JmSetKbTwUlv6cixrH8m8wwWBbjUpxaqnGFHHM95iF23GzThTMwdKY8UtekilUUrgaKh9VKoIUuLjRDub5lCLUuekWLSH1cgnRsQGV3n4s9//Afpkb8hER7CIanX6RN+seeLUGsmzbvp66A/JPz4GNb0N2OuF0Pq4rx3zVy0+oUAFH9EF5beI/oYZAjWc5Ngh88C2aSXV7vX+nZ+eCBz9X7UvrS8HmhjtnLvmcxhz+Pa+EGgjGiiEMDRVdD/zm5/Y+pI/jahWRF4kboeHeQnRj3Fm4fvNxReClNOS7cdr+14KE3DPUArbDRjPWF1mk04XbzrLXAe8gR5t91BY06mYFxZ9tmF9IsGx6+/a5OeBrlE39D4QpxlckUp6su+BFT3/dk8XHCw7mrfVCCT72cQnD+QZWGSYVV20MwHj8Qs/JVHiqpV/m6Us5KDdXUVXljz2goDuPuNcyp8ehGRkPajFGpPO+H21B5pUDO0Y1a0UxW1okKwfKcf6Rka37KfnImT+jiYPSQY/6I9wGoyJPKz+HBF8waoOX0W8hmxdkr4vuWRHgwA==', 'ZAMScNyXjHKLadB88W32+QJ2eJak7Gv9RoXAiRT0q4GOukta9fVNC30gW8rtN4YyzxmjJXnEkNawIzoObH7XD0SSA0DchZELwHG8CWB0z747c701Zx8XT2i9k9KGTy8MhKNFXajfUiRiWADv4+wptWlNblUnvoqpcryCDBtD+p9NXmlypuQAoW9XbmD1LoEADsk98iwQZMDDTW4LX1LBMAavEVza408Z6iiFBem4zALt2MfzttVqBU8TJ7SwM6Mh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMsj` int(11) NOT NULL,
  `idBuzon` int(11) NOT NULL,
  `idEmisor` int(11) NOT NULL,
  `idReceptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `icono` varchar(200) NOT NULL,
  `nombre_modulo` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `icono`, `nombre_modulo`, `status`) VALUES
(1, 'assets/img/Usuarios.png', 'Usuarios', 1),
(2, 'assets/img/trabajadores.png', 'Trabajadores', 1),
(3, 'assets/img/cargos.png', 'Cargo', 1),
(4, 'assets/img/Inasistencia.jpg', 'Inasistencias', 1),
(5, 'assets/img/nominas.png', 'Nominas', 1),
(6, 'assets/img/extras.png', 'TrabajosExtras', 1),
(7, 'assets/img/bonos.jpg', 'Bonos', 1),
(8, 'assets/img/candado.png', 'Seguridad', 1),
(9, 'assets/img/reporte.png', 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id_nomina` int(11) NOT NULL,
  `cedula_trabajador` varchar(8) DEFAULT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `tipo_pago` varchar(20) DEFAULT NULL,
  `horas_extras` int(11) DEFAULT NULL,
  `ivss` varchar(20) DEFAULT NULL,
  `rpe` varchar(20) DEFAULT NULL,
  `faov` varchar(20) DEFAULT NULL,
  `inces` varchar(20) DEFAULT NULL,
  `total_pagar_nomina` varchar(20) DEFAULT NULL,
  `inasistencias` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id_nomina`, `cedula_trabajador`, `periodo_desde`, `periodo_hasta`, `fecha_pago`, `tipo_pago`, `horas_extras`, `ivss`, `rpe`, `faov`, `inces`, `total_pagar_nomina`, `inasistencias`, `status`) VALUES
(3, '26561483', '2022-09-21', '2022-10-01', '2022-10-01', 'Efectivo', 5, '2.2', '0.275', '0.55', '0', '53.626785714286', 2, 0),
(4, '12345678', '2022-09-01', '2022-09-08', '2022-09-08', 'Efectivo', 0, '2.5', '0.25', '0.5', '0', '56.75', 0, 1),
(5, '12345678', '2022-09-08', '2022-09-15', '2022-09-15', 'Efectivo', 0, '2.5', '0.25', '0.5', '0', '56.75', 0, 1),
(6, '12345678', '2022-09-15', '2022-09-22', '2022-09-22', 'Efectivo', 0, '2.5', '0.25', '0.5', '0', '56.75', 0, 1),
(7, '26561481', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '1.75', '0.175', '0.35', '0', '42.725', 0, 1),
(8, '26561487', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '3', '0.3', '0.6', '0', '66.1', 0, 1),
(9, '12345678', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '2.5', '0.25', '0.5', '0', '56.75', 0, 1),
(10, '26561487', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '3', '0.3', '0.6', '0', '66.1', 0, 1),
(11, '4562589', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '4.5', '0.45', '0.9', '0', '94.15', 0, 1),
(12, '78945625', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', 0, '2.5', '0.25', '0.5', '0', '56.75', 0, 1),
(13, '9634158', '2022-09-30', '2022-10-07', '2022-09-30', 'Efectivo', 0, '3.5', '0.35', '0.7', '0', '75.45', 0, 1);

--
-- Disparadores `nomina`
--
DELIMITER $$
CREATE TRIGGER `after_insert_nomina` AFTER INSERT ON `nomina` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Nomina"),
    CONCAT("Id_nomina: ", NEW.id_nomina)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_nomina` AFTER UPDATE ON `nomina` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Nomina"),
    CONCAT("Id_nomina: ", NEW.id_nomina)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idNotificacion` int(11) NOT NULL,
  `idEmisor` int(11) NOT NULL,
  `idReceptor` int(11) DEFAULT NULL,
  `asunto` varchar(150) NOT NULL,
  `cifrado` blob NOT NULL,
  `mensaje` varchar(5000) DEFAULT NULL,
  `tipo` int(1) NOT NULL,
  `favorito` int(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id_operacion` int(11) NOT NULL,
  `nombre_operacion` varchar(100) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id_operacion`, `nombre_operacion`, `id_modulo`, `status`) VALUES
(1, 'Registrar Usuarios', 1, 1),
(2, 'Modificar Usuarios', 1, 1),
(3, 'Eliminar Usuarios', 1, 1),
(4, 'Consultar Usuarios', 1, 1),
(5, 'Registrar Trabajadores', 2, 1),
(6, 'Modificar Trabajadores', 2, 1),
(7, 'Eliminar Trabajadores', 2, 1),
(8, 'Consultar Trabajadores', 2, 1),
(9, 'Registrar Cargo', 3, 1),
(10, 'Modificar Cargo', 3, 1),
(11, 'Eliminar Cargo', 3, 1),
(12, 'Consultar Cargo', 3, 1),
(13, 'Registrar Inasistencias', 4, 1),
(14, 'Modificar Inasistencias', 4, 1),
(15, 'Eliminar Inasistencias', 4, 1),
(16, 'Consultar Inasistencias', 4, 1),
(17, 'Registrar Nóminas', 5, 1),
(18, 'Modificar Nóminas', 5, 1),
(19, 'Eliminar Nóminas', 5, 1),
(20, 'Consultar Nóminas', 5, 1),
(21, 'Registrar Trabajos Extras', 6, 1),
(22, 'Modificar Trabajos Extras', 6, 1),
(23, 'Eliminar Trabajos Extras', 6, 1),
(24, 'Consultar Trabajos Extras', 6, 1),
(25, 'Registrar Bonos', 7, 1),
(26, 'Modificar Bonos', 7, 1),
(27, 'Eliminar Bonos', 7, 1),
(28, 'Consultar Bonos', 7, 1),
(29, 'Consultar Bitácoras', 8, 1),
(30, 'Exportar Bitácoras', 8, 1),
(31, 'Eliminar Bitácoras', 8, 1),
(32, 'Registrar Roles', 8, 1),
(33, 'Modificar Roles', 8, 1),
(34, 'Eliminar Roles', 8, 1),
(35, 'Modificar Accesos', 8, 1),
(36, 'Consultar Reportes', 9, 1),
(37, 'Asignar Roles', 8, 1),
(38, 'Registrar Recibo bono', 7, 1),
(39, 'Modificar Recibo bono', 7, 1),
(40, 'Eliminar Recibo bono', 7, 1),
(41, 'Consultar Recibo bono', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `cedula_trabajador` varchar(8) DEFAULT NULL,
  `descripcion` varchar(7) DEFAULT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `cedula_trabajador`, `descripcion`, `desde`, `hasta`, `status`) VALUES
(1, '26561481', 'Reposo', '2022-09-05', '2022-09-24', 0),
(2, '26561481', 'Permiso', '2022-09-28', '2022-10-01', 0),
(3, '26561481', 'Permiso', '2022-09-28', '2022-10-01', 0),
(4, '26561481', 'Permiso', '2022-09-28', '2022-10-01', 0),
(5, '26561481', 'Permiso', '2022-09-28', '2022-10-14', 0),
(6, '26561483', 'Falta', '2022-09-30', '2022-10-08', 0),
(7, '26561487', 'Falta', '2022-09-14', '2022-09-30', 0),
(8, '4562589', 'Falta', '2022-09-14', '2022-09-16', 1),
(9, '12345678', 'Reposo', '2022-10-14', '2022-12-14', 1),
(10, '78945625', 'Falta', '2022-10-18', '2022-10-21', 1),
(11, '9634158', 'Falta', '2022-10-28', '2022-10-30', 1);

--
-- Disparadores `permiso`
--
DELIMITER $$
CREATE TRIGGER `after_insert_permiso` AFTER INSERT ON `permiso` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Permisos"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_permiso` AFTER UPDATE ON `permiso` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Permisos"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_seguridad`
--

CREATE TABLE `preguntas_seguridad` (
  `idPregunta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas_seguridad`
--

INSERT INTO `preguntas_seguridad` (`idPregunta`, `idUsuario`, `pregunta`, `respuesta`) VALUES
(208, 1, '¿Nombre de madre?', 'madre'),
(209, 1, 'a', 'a'),
(210, 1, 'b', 'b'),
(211, 1, 'Firma Digital', 'luis'),
(212, 38, '¿Nombre de padre?', 'padre'),
(213, 38, 'i', 'i'),
(214, 38, 'o', 'o'),
(215, 38, 'Firma Digital', 'gallina'),
(216, 37, '¿Color favorito?', 'favorito'),
(217, 37, 'y', 'y'),
(218, 37, 'u', 'u'),
(219, 37, 'Firma Digital', 'andreina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_bonos`
--

CREATE TABLE `recibos_bonos` (
  `id_recibo_bono` int(11) NOT NULL,
  `id_bono` int(11) DEFAULT NULL,
  `cedula_trabajador` varchar(8) DEFAULT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `tipo_pago` varchar(20) DEFAULT NULL,
  `total_pagar` varchar(20) DEFAULT NULL,
  `inasistencias` int(11) DEFAULT NULL,
  `valor_actual` varchar(15) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibos_bonos`
--

INSERT INTO `recibos_bonos` (`id_recibo_bono`, `id_bono`, `cedula_trabajador`, `periodo_desde`, `periodo_hasta`, `fecha_pago`, `tipo_pago`, `total_pagar`, `inasistencias`, `valor_actual`, `status`) VALUES
(1, 2, '26561481', '2022-10-06', '2022-10-14', '2022-10-21', 'Efectivo', '522', 0, '5.22', 0),
(2, 5, '12345678', '2022-10-01', '2022-10-15', '2022-10-01', 'Efectivo', '50', 0, '5.22', 1),
(3, 14, '9634158', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', '261', 0, '5.22', 1),
(4, 10, '26561487', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', '313.2', 0, '5.22', 1),
(5, 12, '26561481', '2022-09-30', '2022-10-07', '2022-10-07', 'Efectivo', '156.6', 0, '5.22', 1);

--
-- Disparadores `recibos_bonos`
--
DELIMITER $$
CREATE TRIGGER `after_insert_recibos_bonos` AFTER INSERT ON `recibos_bonos` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Recibo_bonos"),
    CONCAT("Id_recibo_bono: ", NEW.id_recibo_bono)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_recibos_bonos` AFTER UPDATE ON `recibos_bonos` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Recibo_bonos"),
    CONCAT("Id_recibo_bono: ", NEW.id_recibo_bono)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) DEFAULT NULL,
  `status_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `status_rol`) VALUES
(1, 'root', 3),
(2, 'admin', 1),
(3, 'ojeador', 1);

--
-- Disparadores `roles`
--
DELIMITER $$
CREATE TRIGGER `after_insert_roles` AFTER INSERT ON `roles` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Roles"),
    CONCAT("Nombre_rol: ", NEW.nombre_rol)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_updatet_roles` AFTER UPDATE ON `roles` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Roles"),
    CONCAT("Nombre_rol: ", OLD.nombre_rol)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operacion`
--

CREATE TABLE `rol_operacion` (
  `id_rol_operacion` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_operacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol_operacion`
--

INSERT INTO `rol_operacion` (`id_rol_operacion`, `id_rol`, `id_operacion`) VALUES
(440, 2, 5),
(441, 2, 6),
(442, 2, 7),
(443, 2, 8),
(444, 2, 13),
(445, 2, 14),
(446, 2, 15),
(447, 2, 16),
(448, 2, 26),
(449, 2, 32),
(948, 1, 1),
(949, 1, 2),
(950, 1, 3),
(951, 1, 4),
(952, 1, 5),
(953, 1, 6),
(954, 1, 7),
(955, 1, 8),
(956, 1, 9),
(957, 1, 10),
(958, 1, 11),
(959, 1, 12),
(960, 1, 13),
(961, 1, 14),
(962, 1, 15),
(963, 1, 16),
(964, 1, 17),
(965, 1, 18),
(966, 1, 19),
(967, 1, 20),
(968, 1, 21),
(969, 1, 22),
(970, 1, 23),
(971, 1, 24),
(972, 1, 25),
(973, 1, 26),
(974, 1, 27),
(975, 1, 28),
(976, 1, 38),
(977, 1, 39),
(978, 1, 40),
(979, 1, 41),
(980, 1, 29),
(981, 1, 30),
(982, 1, 31),
(983, 1, 32),
(984, 1, 33),
(985, 1, 34),
(986, 1, 35),
(987, 1, 37),
(988, 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `cedula` varchar(8) NOT NULL,
  `t_celular` varchar(5) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_cargo`, `nombre`, `apellido`, `cedula`, `t_celular`, `celular`, `fecha_nacimiento`, `fecha_ingreso`, `correo`, `estado`) VALUES
(1, 'Root', 'Root', '0000', '0424', '5196632', '1997-06-03', '2021-11-30', 'root@gmail.com', 1),
(11, 'Eliza', 'Soto', '12345678', '0412', '1234566', '2022-10-06', '2022-10-13', 'Soto@gmail.com', 1),
(3, 'wwww', 'lopez', '22222222', '0412', '2222222', '2022-09-13', '2022-10-07', 'luis@gmail.com', 0),
(10, 'Arnulfo', 'Carrera Garcia', '26561481', '0412', '9587785', '2022-09-06', '2022-08-31', 'Arnulfo@gmail.com', 1),
(3, 'luis', 'lopez', '26561483', '0412', '2222222', '2022-09-21', '2022-09-30', 'luis@gmail.com', 0),
(12, 'Andreina', 'Torres', '26561487', '0412', '2222222', '2022-09-06', '2022-10-01', 'Andreina@gmail.com', 1),
(13, 'Marco Tulio ', 'Galindo', '4562589', '0412', '1239632', '2022-10-06', '2022-10-28', 'Galido@gmail.com', 1),
(7, 'Rony David ', 'Salazar ', '78945625', '0412', '4567889', '2022-09-30', '2022-10-20', 'rony@gmail.com', 1),
(8, 'Mario Izariel ', 'Villatoro', '9634158', '0412', '1234569', '2022-10-05', '2022-10-13', 'maro@gmail.com', 1);

--
-- Disparadores `trabajadores`
--
DELIMITER $$
CREATE TRIGGER `after_insert_trabajadores` AFTER INSERT ON `trabajadores` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Trabajadores"),
    CONCAT("Cedula_trabajador: ", NEW.cedula)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_trabajadores` AFTER UPDATE ON `trabajadores` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Trabajadores"),
    CONCAT("Cedula_trabajador: ", NEW.cedula)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajosextras`
--

CREATE TABLE `trabajosextras` (
  `id_trabajosExtras` int(11) NOT NULL,
  `cedula_trabajador` varchar(8) DEFAULT NULL,
  `fecha_trabajo` date DEFAULT NULL,
  `descripcion_trabajo` varchar(210) DEFAULT NULL,
  `tipo_pago` varchar(15) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` varchar(20) DEFAULT NULL,
  `total_unidad` varchar(20) DEFAULT NULL,
  `total_pagar` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajosextras`
--

INSERT INTO `trabajosextras` (`id_trabajosExtras`, `cedula_trabajador`, `fecha_trabajo`, `descripcion_trabajo`, `tipo_pago`, `fecha_pago`, `descripcion`, `cantidad`, `total_unidad`, `total_pagar`, `status`) VALUES
(1, '26561483', '2022-09-30', 'hola', 'Efectivo', '2022-09-29', 'hola', '4', '10', '40', 0),
(2, '26561483', '2022-09-21', 'hola', 'Efectivo', '2022-09-29', 'a', '4', '10', '40', 0),
(3, '78945625', '2022-10-01', 'Instalacion de reflectores en el area de alcabala', 'Transferencia', '2022-10-11', 'Refltores de 100w led', '5', '29.99', '149.95', 1),
(4, '9634158', '2022-09-25', 'Remplazo de toma breke', 'Efectivo', '2022-10-07', 'Breke doble de 20 A', '1', '10', '10', 1);

--
-- Disparadores `trabajosextras`
--
DELIMITER $$
CREATE TRIGGER `after_insert_trabajosextras` AFTER INSERT ON `trabajosextras` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Trabajos_extras"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_trabajosextras` AFTER UPDATE ON `trabajosextras` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Trabajos_extras"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `cedula_trabajador` varchar(8) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pasoSeguridad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `foto`, `contrasena`, `cedula_trabajador`, `id_rol`, `status`, `pasoSeguridad`) VALUES
(1, 'assets/img/users/0000-il_570xN.3401735135_2751.jpg', '$2y$10$NOvB5FpKyJ/VGGUVCjNDC.Grs79eis3EEeWoRH4KvdFjAg0TP20oK', '0000', 1, 1, 0),
(37, 'assets/img/users/26561482-26561482-flor.jpg', '$2y$10$NOvB5FpKyJ/VGGUVCjNDC.Grs79eis3EEeWoRH4KvdFjAg0TP20oK', '26561481', 2, 1, 0),
(38, 'assets/img/users/26561482-26561482-flor.jpg', '$2y$10$t4qmf6/vVKhfH3pHnzw41.SF.oVFItQicb.LfnvcEPggg96XVHrkO', '26561483', 3, 0, 0);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_insert_usuarios` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Usuarios"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_usuarios` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Usuarios"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idbitacora`);

--
-- Indices de la tabla `bonos`
--
ALTER TABLE `bonos`
  ADD PRIMARY KEY (`id_bono`),
  ADD KEY `fk_cargo_bonos` (`id_cargo`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id_deducciones`);

--
-- Indices de la tabla `dolar`
--
ALTER TABLE `dolar`
  ADD PRIMARY KEY (`id_dolar`);

--
-- Indices de la tabla `key_usuarios`
--
ALTER TABLE `key_usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMsj`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id_nomina`),
  ADD KEY `fk2_trabajador` (`cedula_trabajador`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `idReceptor` (`idReceptor`),
  ADD KEY `notificaciones_ibfk_1` (`idEmisor`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id_operacion`),
  ADD KEY `fk_id_modulo` (`id_modulo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `fk_permiso_trabajador` (`cedula_trabajador`);

--
-- Indices de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `recibos_bonos`
--
ALTER TABLE `recibos_bonos`
  ADD PRIMARY KEY (`id_recibo_bono`),
  ADD KEY `fk3_trabajador` (`cedula_trabajador`),
  ADD KEY `id2_bono` (`id_bono`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD PRIMARY KEY (`id_rol_operacion`),
  ADD KEY `fk1_id_rol` (`id_rol`),
  ADD KEY `fk2_id_operacion` (`id_operacion`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `fk_cargo` (`id_cargo`);

--
-- Indices de la tabla `trabajosextras`
--
ALTER TABLE `trabajosextras`
  ADD PRIMARY KEY (`id_trabajosExtras`),
  ADD KEY `fk1_trabajador` (`cedula_trabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_rol` (`id_rol`),
  ADD KEY `fk_trabajador` (`cedula_trabajador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `bonos`
--
ALTER TABLE `bonos`
  MODIFY `id_bono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id_deducciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `key_usuarios`
--
ALTER TABLE `key_usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMsj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `recibos_bonos`
--
ALTER TABLE `recibos_bonos`
  MODIFY `id_recibo_bono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  MODIFY `id_rol_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=989;

--
-- AUTO_INCREMENT de la tabla `trabajosextras`
--
ALTER TABLE `trabajosextras`
  MODIFY `id_trabajosExtras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bonos`
--
ALTER TABLE `bonos`
  ADD CONSTRAINT `fk_cargo_bonos` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `fk2_trabajador` FOREIGN KEY (`cedula_trabajador`) REFERENCES `trabajadores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idReceptor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_permiso_trabajador` FOREIGN KEY (`cedula_trabajador`) REFERENCES `trabajadores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  ADD CONSTRAINT `preguntas_seguridad_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibos_bonos`
--
ALTER TABLE `recibos_bonos`
  ADD CONSTRAINT `fk3_trabajador` FOREIGN KEY (`cedula_trabajador`) REFERENCES `trabajadores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id2_bono` FOREIGN KEY (`id_bono`) REFERENCES `bonos` (`id_bono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD CONSTRAINT `fk1_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_id_operacion` FOREIGN KEY (`id_operacion`) REFERENCES `operaciones` (`id_operacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajosextras`
--
ALTER TABLE `trabajosextras`
  ADD CONSTRAINT `fk1_trabajador` FOREIGN KEY (`cedula_trabajador`) REFERENCES `trabajadores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trabajador` FOREIGN KEY (`cedula_trabajador`) REFERENCES `trabajadores` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
