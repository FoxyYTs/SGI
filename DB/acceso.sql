-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 07:17:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `user` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `request_password` enum('0','1') NOT NULL DEFAULT '0',
  `token_password` varchar(200) NOT NULL,
  `roles_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`user`, `email`, `pass`, `request_password`, `token_password`, `roles_fk`) VALUES
('AnaSoto', 'ana_soto82222@elpoli.edu.co', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL),
('correo', 'correo@correo.com', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL),
('JoseDaza', 'jose_daza82222@elpoli.edu.co', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '1', '43b88fdbb587092d2a8c6d7bb7d8533e', NULL),
('LuzDelly', 'luzdelly@elpoli.edu.co', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL),
('Prueba', 'prueba@chingona.com', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL),
('Prueba2', 'chiquillo200401@gmail.com', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL),
('ViviMar', 'vivi_martinez@elpoli.edu.co', '7y01y3ey64y91y12ay151y187y216y242y273y307y331y363y39by42by451y482y51ey54ey570y60by633y66cy693y72by759y78cy81dy849y876y90cy93', '0', '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`user`),
  ADD KEY `fk_ACCESO_ROLES` (`roles_fk`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_ACCESO_ROLES` FOREIGN KEY (`roles_fk`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
