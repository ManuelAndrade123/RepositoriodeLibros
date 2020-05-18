SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `librarysystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `librarysystem`;

CREATE TABLE IF NOT EXISTS `administrador` (
  `CodigoAdmin` varchar(70) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `administrador` (`CodigoAdmin`, `Estado`, `Nombre`, `NombreUsuario`, `Clave`, `Email`) VALUES
('I12217Y2015A1N6684', 'Activo', 'Super Administrador', 'Administrador', '2a2e9a58102784ca18e2605a4e727b5f', '');

CREATE TABLE IF NOT EXISTS `bitacora` (
  `Codigo` varchar(100) NOT NULL,
  `CodigoUsuario` varchar(70) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Entrada` varchar(30) NOT NULL,
  `Salida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `categoria` (
  `CodigoCategoria` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `docente` (
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Especialidad` varchar(40) NOT NULL,
  `Jornada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `encargado` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `estudiante` (
  `NIE` varchar(20) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Parentesco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `institucion` (
  `CodigoInfraestructura` int(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Distrito` varchar(30) NOT NULL,
  `Telefono` int(8) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `libro` (
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
  `Ubicacion` varchar(50) NOT NULL,
  `Cargo` varchar(7) NOT NULL,
  `Editorial` varchar(70) NOT NULL,
  `Existencias` int(7) NOT NULL,
  `Prestado` int(20) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `personal` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `prestamo` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `CodigoLibro` varchar(70) NOT NULL,
  `CorrelativoLibro` varchar(70) NOT NULL,
  `CodigoAdmin` varchar(70) NOT NULL,
  `FechaSalida` varchar(30) NOT NULL,
  `FechaEntrega` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `prestamodocente` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `prestamoestudiante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `NIE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `prestamopersonal` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `prestamovisitante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Institucion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `proveedor` (
  `CodigoProveedor` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `ResponAtencion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `seccion` (
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CodigoAdmin`);

ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`Codigo`), ADD KEY `PrimaryKey` (`CodigoUsuario`);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodigoCategoria`);

ALTER TABLE `docente`
  ADD PRIMARY KEY (`DUI`), ADD KEY `CodigoSeccion` (`CodigoSeccion`);

ALTER TABLE `encargado`
  ADD PRIMARY KEY (`DUI`);

ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`NIE`), ADD KEY `DUI` (`DUI`), ADD KEY `CodigoSeccion` (`CodigoSeccion`);

ALTER TABLE `institucion`
  ADD PRIMARY KEY (`CodigoInfraestructura`);

ALTER TABLE `libro`
  ADD PRIMARY KEY (`CodigoLibro`), ADD KEY `CodigoCategoria` (`CodigoCategoria`), ADD KEY `CodigoProveedor` (`CodigoProveedor`), ADD KEY `CodigoInfraestructura` (`CodigoInfraestructura`);

ALTER TABLE `personal`
  ADD PRIMARY KEY (`DUI`);

ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`CodigoPrestamo`), ADD KEY `CodigoLibro` (`CodigoLibro`), ADD KEY `CodigoAdmin` (`CodigoAdmin`);

ALTER TABLE `prestamodocente`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`), ADD KEY `DUI` (`DUI`), ADD KEY `CodigoPrestamo_2` (`CodigoPrestamo`);

ALTER TABLE `prestamoestudiante`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`), ADD KEY `NIE` (`NIE`);

ALTER TABLE `prestamopersonal`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`), ADD KEY `DUI` (`DUI`);

ALTER TABLE `prestamovisitante`
  ADD KEY `CodigoPrestamo` (`CodigoPrestamo`);

ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`CodigoProveedor`);

ALTER TABLE `seccion`
  ADD PRIMARY KEY (`CodigoSeccion`);


ALTER TABLE `docente`
ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`CodigoSeccion`) REFERENCES `seccion` (`CodigoSeccion`);

ALTER TABLE `estudiante`
ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`DUI`) REFERENCES `encargado` (`DUI`),
ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`CodigoSeccion`) REFERENCES `seccion` (`CodigoSeccion`);

ALTER TABLE `libro`
ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`CodigoInfraestructura`) REFERENCES `institucion` (`CodigoInfraestructura`),
ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categoria` (`CodigoCategoria`),
ADD CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`CodigoProveedor`) REFERENCES `proveedor` (`CodigoProveedor`);

ALTER TABLE `prestamo`
ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`CodigoLibro`) REFERENCES `libro` (`CodigoLibro`),
ADD CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`CodigoAdmin`) REFERENCES `administrador` (`CodigoAdmin`);

ALTER TABLE `prestamodocente`
ADD CONSTRAINT `prestamodocente_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
ADD CONSTRAINT `prestamodocente_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `docente` (`DUI`);

ALTER TABLE `prestamoestudiante`
ADD CONSTRAINT `prestamoestudiante_ibfk_1` FOREIGN KEY (`NIE`) REFERENCES `estudiante` (`NIE`),
ADD CONSTRAINT `prestamoestudiante_ibfk_2` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`);

ALTER TABLE `prestamopersonal`
ADD CONSTRAINT `prestamopersonal_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
ADD CONSTRAINT `prestamopersonal_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `personal` (`DUI`);

ALTER TABLE `prestamovisitante`
ADD CONSTRAINT `prestamovisitante_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
