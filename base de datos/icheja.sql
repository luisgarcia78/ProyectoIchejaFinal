-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2023 a las 01:47:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `icheja`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinaciones`
--

CREATE TABLE `coordinaciones` (
  `IdCoord` int(15) NOT NULL,
  `N_C` varchar(10) DEFAULT NULL,
  `Clave1` varchar(10) NOT NULL,
  `Clave2` varchar(10) DEFAULT NULL,
  `Ubicacion` varchar(15) NOT NULL,
  `Inmueble` varchar(10) NOT NULL,
  `Nombre_Coord` varchar(60) NOT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Localizacion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `IdDeptos` int(15) NOT NULL,
  `N_C` varchar(10) DEFAULT NULL,
  `Clave1` varchar(10) NOT NULL,
  `Clave2` varchar(10) DEFAULT NULL,
  `Ubicacion` varchar(15) NOT NULL,
  `Inmueble` varchar(10) NOT NULL,
  `Nombre_Depto` varchar(60) NOT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Localizacion` varchar(500) DEFAULT NULL,
  `Estatusregistro` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`IdDeptos`, `N_C`, `Clave1`, `Clave2`, `Ubicacion`, `Inmueble`, `Nombre_Depto`, `Direccion`, `Localizacion`, `Estatusregistro`) VALUES
(1, '0003', '234', '132', '13213', '132321', 'tipopruebasezarblue', '413123', 'dqqdw', 1),
(2, '0003', '123', '132', '13213', '132321', 'tipopruebasezarblue', '413123', 'dqqdw', 0),
(3, '', '', '', '', '', '', '', '', 0),
(4, '4563', '234234', '2342', 'av prueba para ', '1231', 'prueba para paginacion', '3e2e32ed', 'dwdw23d3', 0),
(6, '312', '13', '16', 'kyukuk', 'yukyukuku', 'ykukyk', 'nfngfn', 'tyjtjngn', 1),
(8, '5674', '645', '564', 'sfsfde345', '675hfghf', 'ryty54y', 'bggtgr', 'e44t3t3t3', 0),
(9, '5155', '321688', '9845', 'kjbibini', '', 'ykukyk', '8498ffeffe', 'erfefr56', 1),
(10, '7', '777777', '7777', 'kk7.k7', '7777', 'vacas', '43535efr', 'frefr345', 0),
(11, '0003', '324', '872', '78277', '228', '2', '827', '782', 0),
(12, '782', '78278', '78272', '782782', '78', '787', '7282', '2222', 0),
(13, '572525478', '825425', '424420', '04552', '424252', '5875', '7585', '5978', 0),
(14, '7', '55', '454', '456456', '5464657', '5678678', '6867', '46546', 0),
(15, '9434', '4353', '5353', '4c3r', 'd34d4', 'paginacionprueba1', '3edewd', '32e32', 0),
(16, '1', '324', '24', '44', '2', '4443', '34', '34', 0),
(17, '23444444', '434', '3432', '4234rr', '23re', '23rer3', 'ffdfew', '32r32', 0),
(18, 'ger34', '4535', '5453', 'fefre34', '345', 'ertfntj', '543', 'fr', 0),
(19, '0003', '24343', '112', '123231', '45345', '345345', 'rrwer', 'r43r43r', 1),
(20, '1', '99', '77', 'gggd', '5y4y4tyr', '354435', 'ertete', '3t43t3', 0),
(21, '4344', '4343', '2445', 'efeebwd', '5252', 'pruebas', '25r23r', 'https://goo.gl/maps/VZQjAEhzc1amfYSk8', 1),
(22, '45345', '634634', '345345', 'erefngj', '45345', 'ykukyk', '345ffffffffffff', 'ffffffffff343', 1),
(24, '7888', '56765', '56756', 'fkkskofodo', '123221', '3123', 'dqdw', 'dqdwq', 1),
(25, '789785675', '75567', '56765', '7576', '5675', '5675656', '576575', '57567', 1),
(26, '54645', '464645', '5464', '2345', '34535', '35345', '34534', '34534', 1),
(27, '2953', '0100', '4443', 'werwr223', '23442r', '23r23r', 'wf32e', '2e23we', 1),
(29, '0003', '4', '4', '4', '4', '4', '4', '4', 0),
(30, '23', '4', '5', '5', '5', '5', '5', '5', 1),
(31, '222', '222', '222', '222', '222', '222', '222', '222', 1),
(32, '1', '1', '1', '1', '1', '1', '1', '1', 1),
(33, '6', '6', '6', '6', '6', '6', '6', '6', 1),
(34, '8', '8', '8', '8', '8', '8', '8', '8', 1),
(35, '9', '9', '9', '9', '9', '9', '9', '9', 1),
(36, '9', '9', '9', '9', '9', '9', '9', '9', 1),
(37, '0', '0', '0', '0', '0', '0', '0', '0', 1),
(38, '9', '98', '8', '8', '8', '8', '8', '8', 1),
(39, '3', '3', '3', '3', '3', '3', '3', '3', 1),
(40, '22', '22', '22', '22', '22', '22', '22', '22', 1),
(41, '87', '87', '87', '78', '87', '87', '87', '87', 1),
(42, '98', '98', '98', '98', '98', '98', '98', '98', 1),
(43, '1', '0000', '003', '07-101-0055\\r\\n', '0055', 'DIRECCION', '2A NORTE ENTRE 10 Y 11 PONIENTE NORTE\\r\\n', 'https://goo.gl/maps/VZQjAEhzc1amfYSk8', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coordinaciones`
--
ALTER TABLE `coordinaciones`
  ADD PRIMARY KEY (`IdCoord`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`IdDeptos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coordinaciones`
--
ALTER TABLE `coordinaciones`
  MODIFY `IdCoord` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `IdDeptos` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
