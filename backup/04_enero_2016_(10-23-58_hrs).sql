SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS librarysystem;

USE librarysystem;

DROP TABLE IF EXISTS administrador;

CREATE TABLE `administrador` (
  `CodigoAdmin` varchar(70) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO administrador VALUES("I12217Y2015A1N6684","Activo","Super Administrador","Administrador","2a2e9a58102784ca18e2605a4e727b5f","");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `Codigo` varchar(100) NOT NULL,
  `CodigoUsuario` varchar(70) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Entrada` varchar(30) NOT NULL,
  `Salida` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `PrimaryKey` (`CodigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `CodigoCategoria` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS docente;

CREATE TABLE `docente` (
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Especialidad` varchar(40) NOT NULL,
  `Jornada` varchar(50) NOT NULL,
  PRIMARY KEY (`DUI`),
  KEY `CodigoSeccion` (`CodigoSeccion`),
  CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`CodigoSeccion`) REFERENCES `seccion` (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS encargado;

CREATE TABLE `encargado` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS estudiante;

CREATE TABLE `estudiante` (
  `NIE` varchar(20) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Parentesco` varchar(50) NOT NULL,
  PRIMARY KEY (`NIE`),
  KEY `DUI` (`DUI`),
  KEY `CodigoSeccion` (`CodigoSeccion`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`DUI`) REFERENCES `encargado` (`DUI`),
  CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`CodigoSeccion`) REFERENCES `seccion` (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS institucion;

CREATE TABLE `institucion` (
  `CodigoInfraestructura` int(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Distrito` varchar(30) NOT NULL,
  `Telefono` int(8) NOT NULL,
  `Year` int(4) NOT NULL,
  PRIMARY KEY (`CodigoInfraestructura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS libro;

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
  `Ubicacion` varchar(50) NOT NULL,
  `Cargo` varchar(7) NOT NULL,
  `Editorial` varchar(70) NOT NULL,
  `Existencias` int(7) NOT NULL,
  `Prestado` int(20) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoLibro`),
  KEY `CodigoCategoria` (`CodigoCategoria`),
  KEY `CodigoProveedor` (`CodigoProveedor`),
  KEY `CodigoInfraestructura` (`CodigoInfraestructura`),
  CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`CodigoInfraestructura`) REFERENCES `institucion` (`CodigoInfraestructura`),
  CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categoria` (`CodigoCategoria`),
  CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`CodigoProveedor`) REFERENCES `proveedor` (`CodigoProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS personal;

CREATE TABLE `personal` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamo;

CREATE TABLE `prestamo` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `CodigoLibro` varchar(70) NOT NULL,
  `CorrelativoLibro` varchar(70) NOT NULL,
  `CodigoAdmin` varchar(70) NOT NULL,
  `FechaSalida` varchar(30) NOT NULL,
  `FechaEntrega` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  PRIMARY KEY (`CodigoPrestamo`),
  KEY `CodigoLibro` (`CodigoLibro`),
  KEY `CodigoAdmin` (`CodigoAdmin`),
  CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`CodigoLibro`) REFERENCES `libro` (`CodigoLibro`),
  CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`CodigoAdmin`) REFERENCES `administrador` (`CodigoAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamodocente;

CREATE TABLE `prestamodocente` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `DUI` (`DUI`),
  KEY `CodigoPrestamo_2` (`CodigoPrestamo`),
  CONSTRAINT `prestamodocente_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamodocente_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `docente` (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamoestudiante;

CREATE TABLE `prestamoestudiante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `NIE` varchar(20) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `NIE` (`NIE`),
  CONSTRAINT `prestamoestudiante_ibfk_1` FOREIGN KEY (`NIE`) REFERENCES `estudiante` (`NIE`),
  CONSTRAINT `prestamoestudiante_ibfk_2` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamopersonal;

CREATE TABLE `prestamopersonal` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `DUI` (`DUI`),
  CONSTRAINT `prestamopersonal_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamopersonal_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `personal` (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS prestamovisitante;

CREATE TABLE `prestamovisitante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Institucion` varchar(70) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamovisitante_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `CodigoProveedor` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `ResponAtencion` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS seccion;

CREATE TABLE `seccion` (
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




SET FOREIGN_KEY_CHECKS=1;