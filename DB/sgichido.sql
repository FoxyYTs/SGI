-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 17:16:08
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
CREATE DATABASE IF NOT EXISTS `sgi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sgi`;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`) VALUES
(0, 'fisica'),
(1, 'quimica'),
(2, 'electricidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id_guia` int(11) NOT NULL,
  `nombre_guia` varchar(45) DEFAULT NULL,
  `pdf_guia` varchar(100) DEFAULT NULL,
  `materia_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guia`
--

INSERT INTO `guia` (`id_guia`, `nombre_guia`, `pdf_guia`, `materia_fk`) VALUES
(1, 'Péndulo simple y compuesto', 'https://drive.google.com/file/d/1unM6J2bLJquHdaw83p-dQIUH83XdRTVR/view?usp=sharing', 1),
(2, 'Sistema masa resorte ', 'https://drive.google.com/file/d/1mw9tmWsge3PGo2AdiVFUevVz3WcBU-vx/view?usp=sharing', 1),
(3, 'Oscilador amortiguado', 'https://drive.google.com/file/d/1vPcfDw4Qw8Asfqv3tDapNfgbfo3xGOBt/view?usp=sharing', 1),
(4, 'Oscilador forzado', 'https://drive.google.com/file/d/1tVEFP-ZBOyDLhU5mxCWNgphOpj5aIJfQ/view?usp=sharing', 1),
(5, 'Características de una onda', 'https://drive.google.com/file/d/1Oy1WW6g0CmQs_GZ6YRcfgDg8AMoMljDP/view?usp=sharing', 1),
(6, 'Ondas estacionarias', 'https://drive.google.com/file/d/1XlX8oU5okVRbQ3f9GYVWzpkNy1xp-k0W/view?usp=sharing', 1),
(7, 'El sonido como una Onda', 'https://drive.google.com/file/d/1fS8rp0DIkMndoK2H_hckbpgThpX5RpTB/view?usp=sharing', 1),
(8, 'Análisis vectorial', 'https://drive.google.com/file/d/1bzO6s_rBqUmkoXSAcW3lrNBdTwdGFTNU/view?usp=sharing', 0),
(9, 'Análisis de datos ', 'https://drive.google.com/file/d/1wTLF8a1Ukas9eQ19UC46uQBorO73ZFZt/view?usp=sharing', 0),
(10, '2a Ley de Newton', 'https://drive.google.com/file/d/1DmfR7Uu-h93tv5W0lsIn5wY-l5HesSRz/view?usp=sharing', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `implemento`
--

CREATE TABLE `implemento` (
  `id_implemento` int(11) NOT NULL,
  `guia_uso_lab` varchar(100) DEFAULT NULL,
  `insumoI_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `implemento`
--

INSERT INTO `implemento` (`id_implemento`, `guia_uso_lab`, `insumoI_fk`) VALUES
(1, 'Poner el elemento a pesar en la placa y deslizar poco a poco hasta que se equilibre', 10),
(2, 'Usarlo dentro de la camara de gases', 11),
(3, 'Soporta quimicos y temperaturas altas', 3),
(4, 'Soporta quimicos y temperaturas altas', 4),
(5, 'Conectar las bananas a los puertos, usar las perillas para controlar el voltaje', 7),
(6, 'Conecta', 6),
(7, 'Girar su perilla para seleccionar lo que se quiera medir, al medir los Amperaje tener en cuenta dond', 8),
(8, 'Conectar el tubo de aire, nunca poner los moviles mientras el aire no este encendido', 1),
(9, 'Material pesado', 9),
(10, 'soporta altas temperaturas ', 43),
(11, 'Funciona con agua destilada', 41),
(12, 'Fijarse en los modos de uso', 44),
(13, 'asegurarse de que este bien fijo al soporte universar', 35),
(14, 'material fragil', 38),
(15, 'la pastilla va dentro del recipiente', 34),
(16, 'colocar en el fluido que se va a calentar', 36),
(17, 'material fragil', 39),
(18, 'material fragil', 40),
(19, 'asegurate de tarar antes de usar', 37),
(20, 'material fragil', 42),
(345, 'EL tarrito es para echar cosas', 61),
(567, 'EL tarrito es para echar cosas', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id_insumo` int(11) NOT NULL,
  `nombre_insumo` varchar(45) DEFAULT NULL,
  `tipo_insumo` varchar(20) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `stock_insumo` int(11) DEFAULT NULL,
  `ficha_tecnica` varchar(100) DEFAULT NULL,
  `ubicacion_fk` varchar(5) NOT NULL,
  `und_medida_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id_insumo`, `nombre_insumo`, `tipo_insumo`, `foto`, `stock_insumo`, `ficha_tecnica`, `ubicacion_fk`, `und_medida_fk`) VALUES
(2, 'Etanol', 'sustancia', 'fotoTarrito.jpeg', 8, '', 'GE', 1),
(3, 'Erlenmeyer en vidrio de 200ml', 'implemento', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYOVWAl6FRJtduL0chUokEcL1sJ8jB7jevKay2w9YsqSr4D1JKh2DHjXRu4Qwng6AA', 9, 'https://articulo.mercadolibre.com.co/MCO-836416066-erlenmeyer-en-vidrio-de-200-ml-schott-_JM', 'E2', 7),
(4, 'Erlenmeyer En Vidrio De 2000', 'implemento', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYOVWAl6FRJtduL0chUokEcL1sJ8jB7jevKay2w9YsqSr4D1JKh2DHjXRu4Qwng6AA', 3, 'https://articulo.mercadolibre.com.co/MCO-1419241749-erlenmeyer-frasco-de-676fl-oz-vidrio-de-borosili', 'E2', 7),
(5, 'Cinta De Magnesio', 'sustancia', 'https://http2.mlstatic.com/D_NQ_NP_808173-MCO52536317630_112022-O.webp', 2, '', 'Ofi', 1),
(6, 'Generador de  Van der Graaf', 'implemento', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw048rwvs_lNX1FeUOhmQ_2uNh44FG9KrHaw&s', 2, 'https://www.phywe.com/es/fisica/electricidad-y-magnetismo/la-electrostatica-y-el-campo-electrico/gen', 'Ofi', 7),
(7, 'fuentes de alimentacion de laboratorio dc', 'implemento', 'https://static2.efcomponentes.com.ar/6017-thickbox_default/fuente-de-laboratorio-regulable-32v-5a-3-canales-uni-t-utp330', 6, 'https://elektroautomatik.com/es/productos/fuentes-de-alimentacion-de-laboratorio-dc/', 'GE', 7),
(8, 'Multimetro', 'implemento', 'https://dam-assets.fluke.com/s3fs-public/styles/product_slideshow_main/public/flukeig/products/images/dmm/jpeg/115_300dp', 8, 'https://www.fluke.com/es-cr/producto/comprobacion-electrica/multimetros-digitales/fluke-115', 'GE', 7),
(9, 'Soporte universal', 'implemento', 'https://www.tplaboratorioquimico.com/wp-content/uploads/2015/01/soporte_universal_laboratorio.jpg', 17, 'https://fichastecnicas.pchmayoreo.com/CM4365B.pdf', 'Ofi', 7),
(10, 'Balanza de triple brazo', 'implemento', 'https://ftecnologica.udistrital.edu.co/laboratorios/ciencias-basicas/sites/lab-ciencias-basicas/files/imagen-principal-e', 6, 'https://www.fishersci.es/shop/products/ohaus-triple-beam-mechanical-balance/11869630', 'GE', 7),
(11, 'Destilador de agua', 'implemento', 'https://www.medicaecuador.com/wp-content/uploads/2021/07/Destilador.png', 1, 'https://www.dentaltix.com/es/sites/default/files/ficha-tecnica-destilador-de-agua.pdf', 'F2', 7),
(12, 'Ácido clorhídrico', 'sustancia', '', NULL, NULL, 'E2', 4),
(13, 'Cloruro de zinc', 'sustancia', '', NULL, NULL, 'E2', 4),
(14, 'Peroxido de Hidrogeno', 'sustancia', '', NULL, NULL, 'E2', 4),
(15, 'Ácido sulfúrico', 'sustancia', '', NULL, NULL, 'E2', 4),
(16, 'Hidróxido de amonio', 'sustancia', '', NULL, NULL, 'E2', 4),
(17, 'Acetona', 'sustancia', '', NULL, NULL, 'E2', 4),
(18, 'Azufre', 'sustancia', '', NULL, NULL, 'E2', 0),
(19, 'Hexano', 'sustancia', '', NULL, NULL, 'E2', 4),
(20, 'Ácido nítrico', 'sustancia', '', NULL, NULL, 'E2', 4),
(21, 'Ácido láctico', 'sustancia', '', NULL, NULL, 'E2', 4),
(22, 'Amoniaco', 'sustancia', '', NULL, NULL, 'E2', 4),
(23, 'Acido Oxálico ', 'sustancia', '', NULL, NULL, 'E2', 4),
(24, 'Reactivo de Tollens', 'sustancia', '', NULL, NULL, 'E2', 4),
(25, 'Hidróxido de potasio', 'sustancia', '', NULL, NULL, 'E2', 0),
(26, 'Hidróxido de sodio', 'sustancia', '', NULL, NULL, 'E2', 0),
(27, 'Reactivo de Kovacs', 'sustancia', '', NULL, NULL, 'E2', 4),
(28, 'cloruro de hierro', 'sustancia', '', NULL, NULL, 'E2', 0),
(29, 'Dicromato de sodio', 'sustancia', '', NULL, NULL, 'E2', 0),
(30, 'Plomo', 'sustancia', '', NULL, NULL, 'E2', 0),
(31, 'Acetato de plomo', 'sustancia', '', NULL, NULL, 'E2', 0),
(32, 'Azul de lactofenol', 'sustancia', '', NULL, NULL, 'E2', 4),
(33, 'Cloroformo', 'sustancia', '', NULL, NULL, 'E2', 4),
(34, 'Agitadores magnéticos', 'implemento', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXPXKzugtUZSBbcyiwxe_a3FmW-l9gliucag&s', 2, 'https://www.pce-iberica.es/medidor-detalles-tecnicos/instrumento-de-medida-laboratorio/agitador-labo', 'E2', 7),
(35, 'Aro metálico de 12 cm con nuez', 'implemento', 'https://36580daefdd0e4c6740b-4fe617358557d0f7b1aac6516479e176.ssl.cf1.rackcdn.com/products/13890.9303.jpg', 5, 'https://labcevallos.com/aro-metalico-12-5-cm-con-nuez/13890', 'E2', 7),
(36, 'Ayudas de ebullición paquetes', 'implemento', 'https://http2.mlstatic.com/D_NQ_NP_625770-MCO48273312133_112021-O.webp', 2, 'https://articulo.mercadolibre.com.co/MCO-833400255-perlas-de-ebullicion-de-vidrio-laboratorio-_JM', 'F2', 0),
(37, 'Balanza analítica', 'implemento', 'https://cdn.shopify.com/s/files/1/0258/6866/4931/files/IMAGEN_1_480x480.png?v=1635990279', 1, 'https://www.balanzasdigitales.com/analiticas/466-balanza-analitica-de-laboratorio-gram-fv.html', 'F2', 7),
(38, 'Balón de fondo plano de 100 mL', 'implemento', 'https://adbaquim.com/media/com_eshop/products/resized/balon-fondo-plano-500x500.jpg', 3, 'https://articulo.mercadolibre.com.co/MCO-2013259760-balon-fondo-plano-de-100-ml-duran-_JM#position=1', 'E2', 7),
(39, 'Beaker 100 mL', 'implemento', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrXIgv2qqk3BjDZ2fcga8XuSJZuO6Vf3gekg&s', 20, 'https://articulo.mercadolibre.com.co/MCO-840615604-beaker-de-vidrio-100-ml-laboratorio-vaso-de-preci', 'E2', 7),
(40, 'Bureta', 'implemento', 'https://www.grupocomsurlab.com/wp-content/uploads/2022/02/Bureta-recta-clase-B-llave-de-vidrio.png', 16, 'https://docs.gestionaweb.cat/1081/burn-bureta-con-llave-recta-de-vidrio.pdf', 'C5', 7),
(41, 'Carro con celda de combustible', 'implemento', 'https://i.ytimg.com/vi/Vnx7hZ9YKd0/maxresdefault.jpg', 1, 'https://www.tiendafotovoltaica.es/Kit-experimental-coche-pila-de-combustible', 'Ofi', 7),
(42, 'Condensador con tubo interno en espiral', 'implemento', 'https://www.vasodeprecipitado.online/wp-content/uploads/2023/03/tubo-refrigerante.jpg', 6, 'https://labexco.com/wp-content/uploads/2019/11/Condensador-Graham.pdf', 'E2', 7),
(43, 'Crisol', 'implemento', 'https://ae01.alicdn.com/kf/Hc9ad3929ab904f0092ffa973b25599452.jpg_640x640Q90.jpg_.webp', 12, 'https://www.auxilab.es/es/productos-laboratorio/crisol-forma-alta-jipo-30x38-mm/', 'E2', 7),
(44, 'Cronómetros', 'implemento', 'https://http2.mlstatic.com/D_Q_NP_694950-MLU70666206187_072023-O.webp', 4, 'https://www.auxilab.es/es/productos-laboratorio/cronometro-digital-hs-12/', 'E2', 7),
(61, 'Tarrito', 'IMPLEMENTO', 'fotoTarrito.jpeg', 4, 'fichaTarrito', 'Ofi', 7),
(63, 'pppppppp', 'IMPLEMENTO', 'fotoinsumoNuevo', 5, 'qwertyukjhdf', 'M4', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `tipo_mantenimiento` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `fecha_mantenimiento` date DEFAULT NULL,
  `implemento_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(45) DEFAULT NULL,
  `area_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `area_fk`) VALUES
(0, 'fisica de movimiento', 0),
(1, 'fisica de ondas', 0),
(2, 'quimica', 1),
(3, 'quimica general', 1),
(4, 'electricidad y magnetismo', 2),
(5, 'electronica digital', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabra_seguridad`
--

CREATE TABLE `palabra_seguridad` (
  `id_palabra` int(11) NOT NULL,
  `palabra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `palabra_seguridad`
--

INSERT INTO `palabra_seguridad` (`id_palabra`, `palabra`) VALUES
(1, 'explosivos'),
(2, 'Gases inflamables'),
(3, 'Aerosoles y productos químicos a presión'),
(4, 'Toxicidad aguda'),
(5, 'Gases a presión'),
(6, 'Líquidos pirofóricos'),
(7, 'Carcinogenicidad'),
(8, 'Lesiones oculares graves/irritación ocular'),
(9, 'Sólidos comburentes'),
(10, 'Peróxidos orgánicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `nombre_permiso` varchar(45) DEFAULT NULL,
  `descripcion_permiso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `id_permiso_rol` int(11) NOT NULL,
  `permiso_fk` int(11) NOT NULL,
  `rol_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `id_practica` int(11) NOT NULL,
  `insumo_fk` int(11) NOT NULL,
  `guia_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(45) DEFAULT NULL,
  `tel_proveedor` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_proveedor`, `tel_proveedor`) VALUES
(1, 'dotora', '123123123'),
(2, 'el otro', '1231231234'),
(3, 'federico', '123123123'),
(4, 'carlos', '5151515251'),
(5, 'pedro', '5151235123'),
(6, 'bastian', '23426234'),
(7, 'cortes', '51671236123'),
(8, 'marcos', '377546345373'),
(9, 'mario', '9839829834'),
(10, 'Carla', '52346234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_entrada`
--

CREATE TABLE `reg_entrada` (
  `id_entrada` int(11) NOT NULL,
  `cantidad_entra` int(11) DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `observaciones` varchar(80) DEFAULT NULL,
  `proveedor_fk` int(11) NOT NULL,
  `insumo_entra_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_salida`
--

CREATE TABLE `reg_salida` (
  `id_salida` int(11) NOT NULL,
  `cantidad_sale` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `observaciones` varchar(80) DEFAULT NULL,
  `insumo_sale_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(0, 'db_owner'),
(1, 'db_securityadmin'),
(2, 'db_accessadmin'),
(3, 'db_backupoperator'),
(4, 'db_ddladmin'),
(5, 'db_datawriter'),
(6, 'db_datareader'),
(7, 'db_denydatawriter'),
(8, 'db_denydatareader');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustancia`
--

CREATE TABLE `sustancia` (
  `id_sustancia` int(11) NOT NULL,
  `ficha_seguridad` varchar(300) DEFAULT NULL,
  `tel_emergencia` varchar(12) DEFAULT NULL,
  `formula_quimica` varchar(45) DEFAULT NULL,
  `numCAS` varchar(100) NOT NULL,
  `palabra_seguridad_fk` int(11) NOT NULL,
  `insumo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sustancia`
--

INSERT INTO `sustancia` (`id_sustancia`, `ficha_seguridad`, `tel_emergencia`, `formula_quimica`, `numCAS`, `palabra_seguridad_fk`, `insumo_fk`) VALUES
(0, 'https://www.carlroth.com/medias/SDB-4625-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMjAzN', '+34 91 562 0', 'HCl', '7647-01-0', 8, 12),
(1, 'https://www.carlroth.com/medias/SDB-7301-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyODc3O', '+34 91 562 0', 'C₂H₆O', '64-17-5', 8, 2),
(2, 'https://www.carlroth.com/medias/SDB-4468-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyNzA1N', '+34 91 562 0', 'Mg', '7439-95-4', 2, 5),
(4, 'https://www.carlroth.com/medias/SDB-7905-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzNDg3O', '+34 91 562 0', 'CCl₃D', '865-49-6', 4, 33),
(5, 'https://www.carlroth.com/medias/SDB-3097-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzNTk4M', '+34 91 562 0', 'C6h6o, C3H6O3,C3H8O3', '108-95-2,79-33-4,56-81-5', 4, 32),
(6, 'https://www.carlroth.com/medias/SDB-2559-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzNTUzODV8YXBwbGljYXRpb24vcGRmfGg3Yy9oMTcvOTE0NDA3MTQ4NzUxOC9TREJfMjU1OV9FU19FUy5wZGZ8OTBjOTZlMmI5YjExYmJjNjc3ODcwZTcyM2EyOWJlZTI4ZDIxNWFhY2IyMDlmNWQ2NWRlZDIzOGNlYjM2YjM4NQ', '+34 91 562 0', 'Pb(CH₃COO)₂ · 2 Pb(OH)₂', '1335-32-6', 9, 31),
(7, 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiVqdWpk7OGAxUoTTABHRgOAewQFnoECBsQAQ&url=https%3A%2F%2Fwww.carlroth.com%2Fmedias%2FSDB-1T77-ES-ES.pdf%3Fcontext%3DbWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMDQ5NzZ8YXBwbGljYXRpb24vcGRmfGg2OS9oMmYvOTE0MjEyMjY3NjI1NC9TR', '+34 91 562 0', 'Pb', '', 4, 30),
(8, 'https://www.carlroth.com/medias/SDB-7953-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3w0MDE2NTd8YXBwbGljYXRpb24vcGRmfGFERmtMMmczTnk4NU1UUTNOems0TmpFNE1UUXlMMU5FUWw4M09UVXpYMFZUWDBWVExuQmtaZ3xmYzg0ZTAxZTkwYmVkYWQzM2QwYWM4NDJkYzlmMmIzMTM5NzM2NDdkMDdlZDY2ZjQ1OThmMjEwYzIxYzlhYzA5', '+34 91 562 0', 'Na2Cr2O7', '7778-50-9', 4, 29),
(9, 'https://www.carlroth.com/medias/SDB-5192-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMzI0MDB8YXBwbGljYXRpb24vcGRmfGg2MS9oYmEvOTE0NTQ1NTkzNTUxOC9TREJfNTE5Ml9FU19FUy5wZGZ8YzM4NDI3ZjhhM2U1ZmRmY2ZjZjBkN2UwYmM0ZGViNmQ5YjdjYTNhZDU1Y2VkZWI3MzIyMGM0ZDllZWNiNTcwMA', '+34 91 562 0', 'FeCl3', '7705-08-0', 4, 28),
(10, 'https://www.carlroth.com/medias/SDB-2950-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMzcyMjJ8YXBwbGljYXRpb24vcGRmfHNlY3VyaXR5RGF0YXNoZWV0cy9oYzcvaDFjLzkwMTQ5ODQ0NDE4ODYucGRmfDg5ZjNjMmQzNTE5ZDQ0NjIzNjkyM2NlNzkwZGUwZDVkYjlkMmMyYWRjMmY3NTc0NTFmNWI4MDE3YzdlODFjODM', '+34 91 562 0', 'C5H12O HCl C9H11NO', '71-36-3, 7647-01-0, 71-36-3, 7647-01-0\r\n\r\n', 4, 27),
(11, 'https://www.carlroth.com/medias/SDB-6771-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyOTg4NDh8YXBwbGljYXRpb24vcGRmfGhkYy9oM2UvOTE0NjM3MjEyODc5OC9TREJfNjc3MV9FU19FUy5wZGZ8NThlZGU2M2I4OGFhN2E3NmEwZjQ0ZTUyMjc3MDk3NDEzYzhkYjM0MzU0NGIzN2M4ZmNmZDI1ZGVjYTU1N2RhMA', '+34 91 562 0', 'NaOH', '1310-73-2', 10, 26),
(12, 'https://www.coquinperu.com/Images/productos/pdf/ftec_20.pdf', '+34 91 562 0', ' KOH', '1310-73-2', 6, 25),
(13, 'https://reactivosmeyer.com.mx/datos/pdf/soluciones/hds_9500.pdf', '+34 91 562 0', '[Ag(NH3)2]NO3 (ac),', '1336-21-6, 7732-18-5, 7761-88-8, 1310-73-2', 4, 24),
(14, 'https://www.carlroth.com/medias/SDB-CN35-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyNTYwODl8YXBwbGljYXRpb24vcGRmfHNlY3VyaXR5RGF0YXNoZWV0cy9oYzkvaGQyLzkwNTkzMjE0NDY0MzAucGRmfDgxYjY0NDgxOTg1NmVjNjY1MzRjN2Q3MDRiMDA0MGJlMDI4OGI3NzVhYzM5YWZlOTAxM2U2YjQwNjQ4Y2Q5ZTI', '+34 91 562 0', '+34 91 562 0420', '6153-56-6, 6153-56-6', 4, 23),
(15, 'https://www.carlroth.com/medias/SDB-CP17-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMjI1MjN8YXBwbGljYXRpb24vcGRmfHNlY3VyaXR5RGF0YXNoZWV0cy9oODcvaDdiLzkwMzg0NTA3ODYzMzQucGRmfDI2ODc2YzI0MGRjNTYxNTgxMDgwNTU4ZDNkNmNhMTYwMjhiNDQ1Nzk2OTFkODA1NmIxMzYxYjhkMjg3YzMwNjM', '+34 91 562 0', 'NH3', '1336-21-6', 1, 22),
(16, 'https://www.carlroth.com/medias/SDB-8460-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMTgzMjJ8YXBwbGljYXRpb24vcGRmfHNlY3VyaXR5RGF0YXNoZWV0cy9oNjEvaGI3LzkwNDU1MTM2OTkzNTgucGRmfDBjMzVlMTc3YjNhZWRjNTAxMWQ1OTIzZDAwZmUxMzNjOTJiYWE1Y2M4NGVmZDY1NzY2ZjIxYzhhNGM4ZjQxNjg', '+34 91 562 0', 'C₃H₆O₃', '79-33-4', 5, 21),
(17, 'https://www.carlroth.com/medias/SDB-HN50-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzNTExNDd8YXBwbGljYXRpb24vcGRmfHNlY3VyaXR5RGF0YXNoZWV0cy9oZDEvaDA0LzkwOTk5NDU5MDIxMTAucGRmfDQ3ODUwZTJjOWJjOGY5NmQ1ZGIxZTQ2ZThiNTA3MTdiNDBlODQ0MzMxNTRjZTE4OTdlZjNjZGE0ZGQ2YzFkZjc', '+34 91 562 0', 'HNO₃', '7697-37-2', 4, 20),
(18, 'https://www.carlroth.com/medias/SDB-7339-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wzMTkwMjV8YXBwbGljYXRpb24vcGRmfGgwOC9oYmEvOTE0NjkyMjcyOTUwMi9TREJfNzMzOV9FU19FUy5wZGZ8ODkyMTMxZjllYjkxNDUyM2VhNzc4NzdkM2Y0MGU1ZDk3OGJjZTI1YzZiMDc5N2Y5MGRiZDhmZjVlNmE1OGNmMQ', '+34 91 562 0', 'C₆H₁₄', '110-54-3', 2, 19),
(19, 'https://www.carlroth.com/medias/SDB-9304-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyNTE0ODN8YXBwbGljYXRpb24vcGRmfGg1Zi9oMTUvOTE0MDE1NjYyOTAyMi9TREJfOTMwNF9FU19FUy5wZGZ8MjJiYWUxNTUyMTEzMDI5NmRlYjE2YjE2MGY1MzNjN2NmNjk5ZDlhNWQwNzE5OTg2NzUwOWNmNmFjNmU5MjY1Yw', '+34 91 562 0', 'S', '7704-34-9', 1, 18),
(20, 'https://www.carlroth.com/medias/SDB-7328-ES-ES.pdf?context=bWFzdGVyfHNlY3VyaXR5RGF0YXNoZWV0c3wyOTIxNzh8YXBwbGljYXRpb24vcGRmfGhiOC9oOGYvOTE0MjEyNjQxMTgwNi9TREJfNzMyOF9FU19FUy5wZGZ8MWVmNjhkNDBiZjk3YTQ0NGQ3ZTIzODI1M2QzYjZiN2I0Njc1Njc3M2Q3NGNhOTJkZThiNjc0OGNlMDRkYmEwNA', '+34 91 562 0', 'C₃H₆O', '67-64-1\r\n', 2, 17),
(44, 'aaaaaaaaa', '5555555', 'ddddddddd', '555555', 6, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id_transaccion` int(11) NOT NULL,
  `id_recibe` varchar(13) DEFAULT NULL,
  `tipo_transaccion` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `nombre_recibe` varchar(45) DEFAULT NULL,
  `insumo_transa_fk` int(11) NOT NULL,
  `user_fk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` varchar(5) NOT NULL,
  `descripcion_ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `descripcion_ubicacion`) VALUES
('1A', 'Primer Meson'),
('2A', 'Primer Meson'),
('B1', 'Segundo Meson'),
('C4', 'Tercer Meson'),
('C5', 'Tercer Meson'),
('E2', 'Estantes Blancos al lado izquierdo'),
('F2', 'Cajon grande de madera lado derecho'),
('GE', 'Gabinete Metalico a la Derecha'),
('M2', 'Lockers de madera lado derecho'),
('M4', 'Lockers de madera lado derecho'),
('M7', 'Lockers de madera lado derecho'),
('Ofi', 'Oficina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_medida` int(11) NOT NULL,
  `nombre_medida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_medida`, `nombre_medida`) VALUES
(0, 'gramos'),
(1, 'centimetro'),
(2, 'metro'),
(3, 'litro'),
(4, 'mililitro'),
(7, 'unidad');

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
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id_guia`),
  ADD KEY `fk_GUIA_MATERIA` (`materia_fk`);

--
-- Indices de la tabla `implemento`
--
ALTER TABLE `implemento`
  ADD PRIMARY KEY (`id_implemento`),
  ADD KEY `fk_IMPLEMENTO_INSUMO` (`insumoI_fk`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id_insumo`),
  ADD KEY `ubicacion_insumo` (`ubicacion_fk`),
  ADD KEY `medida_insumo` (`und_medida_fk`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `fk_MANTENIMIENTO_IMPLEMENTO` (`implemento_fk`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `fk_MATERIA_AREA` (`area_fk`);

--
-- Indices de la tabla `palabra_seguridad`
--
ALTER TABLE `palabra_seguridad`
  ADD PRIMARY KEY (`id_palabra`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`id_permiso_rol`),
  ADD KEY `fk_permiso_rol_permisos` (`permiso_fk`),
  ADD KEY `fk_permiso_rol_roles` (`rol_fk`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`id_practica`),
  ADD KEY `fk_PRACTICA_INSUMO` (`insumo_fk`),
  ADD KEY `fk_PRACTICA_GUIA` (`guia_fk`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `reg_entrada`
--
ALTER TABLE `reg_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `fk_REG_ENTRADA_PROVEEDOR` (`proveedor_fk`),
  ADD KEY `fk_REG_ENTRADA_INSUMO` (`insumo_entra_fk`);

--
-- Indices de la tabla `reg_salida`
--
ALTER TABLE `reg_salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `fk_REG_SALIDA_INSUMO` (`insumo_sale_fk`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sustancia`
--
ALTER TABLE `sustancia`
  ADD PRIMARY KEY (`id_sustancia`),
  ADD KEY `fk_SUSTANCIA_PALABRA_SEGURIDAD` (`palabra_seguridad_fk`),
  ADD KEY `fk_SUSTANCIA_INSUMO` (`insumo_fk`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `fk_TRANSACCION_INSUMO` (`insumo_transa_fk`),
  ADD KEY `fk_TRANSACCION_ACCESO` (`user_fk`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_medida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  MODIFY `id_permiso_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `id_practica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reg_entrada`
--
ALTER TABLE `reg_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reg_salida`
--
ALTER TABLE `reg_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_ACCESO_ROLES` FOREIGN KEY (`roles_fk`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `guia`
--
ALTER TABLE `guia`
  ADD CONSTRAINT `fk_GUIA_MATERIA` FOREIGN KEY (`materia_fk`) REFERENCES `materia` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `medida_insumo` FOREIGN KEY (`und_medida_fk`) REFERENCES `unidad_medida` (`id_medida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ubicacion_insumo` FOREIGN KEY (`ubicacion_fk`) REFERENCES `ubicacion` (`id_ubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
