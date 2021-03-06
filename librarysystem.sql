-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 03:08:07
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `librarysystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `CodigoAdmin` varchar(70) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`CodigoAdmin`, `Estado`, `Nombre`, `NombreUsuario`, `Clave`, `Email`) VALUES
('I100Y2020A2N5962', 'Activo', 'JESUS DAVID MOLINA SANGUINO', 'jesus', '81dc9bdb52d04dc20036dbd8313ed055', 'jmolina17abc@gmail.com'),
('I100Y2020A3N5998', 'Activo', 'aksjjakskj', 'ricardo', 'e10adc3949ba59abbe56e057f20f883e', 'jkjjkejkdkj@gmail.com'),
('I12217Y2015A1N6684', 'Activo', 'Super Administrador', 'Administrador', '2a2e9a58102784ca18e2605a4e727b5f', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `Codigo` varchar(100) NOT NULL,
  `CodigoUsuario` varchar(70) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Entrada` varchar(30) NOT NULL,
  `Salida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`Codigo`, `CodigoUsuario`, `Tipo`, `Fecha`, `Entrada`, `Salida`) VALUES
('AI100Y2020A2N5962N3692-3', 'I100Y2020A2N5962', 'Administrador', '13-05-2020', '15:46:28', 'Sin registrar'),
('AI100Y2020A2N5962N4572-2', 'I100Y2020A2N5962', 'Administrador', '13-05-2020', '15:45:45', '15:45:57'),
('AI12217Y2015A1N6684N6892-1', 'I12217Y2015A1N6684', 'Administrador', '13-05-2020', '15:06:57', '15:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodigoCategoria` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodigoCategoria`, `Nombre`) VALUES
('100', 'fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`DUI`, `Nombre`, `Apellido`, `Telefono`, `correo`) VALUES
('1120753434', 'jesus ', 'molina ', 123, 'jmo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `NIE` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`NIE`, `Nombre`, `Apellido`, `correo`) VALUES
('464645', 'kkjklkl', 'lkklkl', 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `CodigoInfraestructura` int(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Distrito` varchar(30) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`CodigoInfraestructura`, `Nombre`, `Distrito`, `Telefono`, `Year`) VALUES
(100, 'ROIG Y VILLALBA', 'CALLE 17 # 20-113', 2147483647, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `CodigoLibro` varchar(70) NOT NULL,
  `CodigoCorrelativo` varchar(20) NOT NULL,
  `CodigoCategoria` varchar(20) NOT NULL,
  `CodigoProveedor` varchar(70) NOT NULL,
  `CodigoInfraestructura` int(20) NOT NULL,
  `Autor` varchar(70) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Year` varchar(7) NOT NULL,
  `Estimado` decimal(30,2) NOT NULL,
  `Titulo` varchar(77) NOT NULL,
  `Edicion` varchar(50) NOT NULL,
  `Editorial` varchar(70) NOT NULL,
  `Existencias` int(7) NOT NULL,
  `Prestado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `CodigoLibro` varchar(70) NOT NULL,
  `CorrelativoLibro` varchar(70) NOT NULL,
  `CodigoAdmin` varchar(70) NOT NULL,
  `FechaSalida` varchar(30) NOT NULL,
  `FechaEntrega` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamodocente`
--

CREATE TABLE `prestamodocente` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamoestudiante`
--

CREATE TABLE `prestamoestudiante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `NIE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamopersonal`
--

CREATE TABLE `prestamopersonal` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamovisitante`
--

CREATE TABLE `prestamovisitante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Institucion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `CodigoProveedor` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `ResponAtencion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CodigoAdmin`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `PrimaryKey` (`CodigoUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodigoCategoria`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`DUI`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`DUI`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`NIE`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`CodigoInfraestructura`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`CodigoLibro`),
  ADD KEY `CodigoCategoria` (`CodigoCategoria`),
  ADD KEY `CodigoProveedor` (`CodigoProveedor`),
  ADD KEY `CodigoInfraestructura` (`CodigoInfraestructura`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`DUI`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`CodigoPrestamo`),
  ADD KEY `CodigoLibro` (`CodigoLibro`),
  ADD KEY `CodigoAdmin` (`CodigoAdmin`);

--
-- Indices de la tabla `prestamodocente`
--
ALTER TABLE `prestamodocente`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`),
  ADD KEY `DUI` (`DUI`),
  ADD KEY `CodigoPrestamo_2` (`CodigoPrestamo`);

--
-- Indices de la tabla `prestamoestudiante`
--
ALTER TABLE `prestamoestudiante`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`),
  ADD KEY `NIE` (`NIE`);

--
-- Indices de la tabla `prestamopersonal`
--
ALTER TABLE `prestamopersonal`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`),
  ADD KEY `DUI` (`DUI`);

--
-- Indices de la tabla `prestamovisitante`
--
ALTER TABLE `prestamovisitante`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`CodigoProveedor`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`CodigoSeccion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categoria` (`CodigoCategoria`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`CodigoLibro`) REFERENCES `libro` (`CodigoLibro`),
  ADD CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`CodigoAdmin`) REFERENCES `administrador` (`CodigoAdmin`);

--
-- Filtros para la tabla `prestamodocente`
--
ALTER TABLE `prestamodocente`
  ADD CONSTRAINT `prestamodocente_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  ADD CONSTRAINT `prestamodocente_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `docente` (`DUI`);

--
-- Filtros para la tabla `prestamoestudiante`
--
ALTER TABLE `prestamoestudiante`
  ADD CONSTRAINT `prestamoestudiante_ibfk_1` FOREIGN KEY (`NIE`) REFERENCES `estudiante` (`NIE`),
  ADD CONSTRAINT `prestamoestudiante_ibfk_2` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`);

--
-- Filtros para la tabla `prestamopersonal`
--
ALTER TABLE `prestamopersonal`
  ADD CONSTRAINT `prestamopersonal_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  ADD CONSTRAINT `prestamopersonal_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `personal` (`DUI`);

--
-- Filtros para la tabla `prestamovisitante`
--
ALTER TABLE `prestamovisitante`
  ADD CONSTRAINT `prestamovisitante_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
