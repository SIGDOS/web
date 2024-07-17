-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2024 a las 21:17:42
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigdos3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(11) NOT NULL,
  `nomAccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nomActividad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nomActividad`) VALUES
(1, 'REVISION DE CABLEADO'),
(2, 'REVISION DE ROSETAS'),
(3, 'REVISON DE EQUIPO TELEFONICO'),
(4, 'REVISION DE DISTRIBUIDOR DE PISO'),
(5, 'REVISION DE FXB'),
(6, 'PONCHADO DE PAR TELEFONICO'),
(7, 'REVISION DE TONO'),
(8, 'TENDIDO DE CABLE'),
(9, 'INSTALACION DE ROSETA'),
(10, 'INSTALACION Y PRUEBAS'),
(11, 'TENDIDO DE CABLE'),
(12, 'CANALIZACION POR CIELO RAZO'),
(13, 'CANALIZACION POR PARED'),
(14, 'PONCHADO DE PAR TELEFONICO'),
(15, 'EMPALME TELEFONICO'),
(16, 'REVISION DE TELEFONO'),
(17, 'REVISION DE ROSETA'),
(18, 'REVISION DE TENDIDO DE CABLE'),
(19, 'REEMPALME'),
(20, 'REPONCHADO'),
(21, 'CAMBIO DE CABLE'),
(22, 'CAMBIO DE CABLE DE BOCINA'),
(23, 'CAMBIO DE PATCHCORD RJ11'),
(24, 'REVISION DE PC'),
(25, 'SE TRASLADA AL AREA DE IT'),
(26, 'REVISION DE DISCO DURO'),
(27, 'RESPALDO DE DATA'),
(28, 'FORMATEO A BAJO NIVEL'),
(29, 'INSTALACION DE WINDOWS 7'),
(30, 'INSTALACION DE WINDOWS 10'),
(31, 'INSTALACION DE WINDOWS 11'),
(32, 'INSTALACION DE OFIMATICA'),
(33, 'INSTALACION DE SEGURIDAD'),
(34, 'CONFIGURACION DE RED INTERNA/EXTERNA'),
(35, 'INSTALACION DE APLICATIVOS'),
(36, 'SE TRASLADA AL AREA DE TRABAJO'),
(37, 'REVISION DE PC'),
(38, 'PRUEBAS CON DISPOSITIVOS'),
(39, 'REPARAR LA FALLA SIN INSUMOS'),
(40, 'REPARAR LA FALLA CON INSUMOS'),
(41, 'SE REVISA EQUIPO'),
(42, 'SE TRASLADA AL AREA DE IT'),
(43, 'SE PRACTICA MANTENIMIENTO'),
(44, 'SE UBICA DVD Y SE SUSTITUYE '),
(45, 'SE HACEN PRUEBAS'),
(46, 'SE TRASLADA AL AREA DE TRABAJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `codArticulo` int(11) NOT NULL,
  `nomArticulo` varchar(50) NOT NULL,
  `cantArticulo` int(11) NOT NULL,
  `dimension` varchar(10) NOT NULL,
  `tipoArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `idAccion` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFin` timestamp NULL DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nomDepartamento` varchar(50) NOT NULL,
  `idLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nomDepartamento`, `idLocalidad`) VALUES
(1, 'DIRECCION', 1),
(2, 'ADMINISTRACION', 1),
(3, 'RECURSOS HUMANOS', 1),
(4, 'ALMACEN', 1),
(5, 'BIENES NACIONALES', 1),
(6, 'INFORMATICA', 1),
(7, 'SERVICIOS GENERALES', 1),
(8, 'COCINA', 1),
(9, 'RADIOLOGÍA', 1),
(10, 'SERVICIOS SOCIALES', 1),
(11, 'MORGUE', 1),
(12, 'EPIDEMIOLOGIA', 1),
(13, 'EMERGENCIA ADULTOS', 1),
(14, 'EMERGENCIA TRAUMA', 1),
(15, 'UCI ADULTO', 1),
(16, 'UCI PEDIATRICA', 1),
(17, 'CONSULTA CIRUGIA', 1),
(18, 'CONSULTA CARDIOLOGIA', 1),
(19, 'CONSULTA TRAUMATOLOGIA', 1),
(20, 'CONSULTA ARO', 1),
(21, 'CONSULTA ODONTOLOGIA', 1),
(22, 'MEDICINA FISICA Y REHABILIT.', 1),
(23, 'HOSPITALIZACION DE MEDICINA INTERNA', 1),
(24, 'HOSPITALIZACION DE PEDIATRIA', 1),
(25, 'HOSPITALIZACION DE CIRUGIA', 1),
(26, 'HOSPITALIZACION DE OBSTETRICIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposasign`
--

CREATE TABLE `equiposasign` (
  `id` int(11) NOT NULL,
  `nomEquipo` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `idTipoEquipo` int(11) NOT NULL,
  `idStatusEquipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `nomLocalidad` varchar(50) NOT NULL,
  `dirLocalidad` varchar(100) NOT NULL,
  `telefLocalidad` varchar(15) NOT NULL,
  `parroquia` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idTipoLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nomLocalidad`, `dirLocalidad`, `telefLocalidad`, `parroquia`, `municipio`, `estado`, `idTipoLocalidad`) VALUES
(1, 'DR. PASTOR OROPEZA RIERA', 'AV. LA SALLE FRENTE A LA URB. EL SISAL II', '02514421089', 'JUAN DE VILLEGAS', 'IRIBARREN', 'LARA', 1),
(2, 'DR. JUAN DAZA PEREYRA', 'CALLE 50 CON CARRERA 13', '02514454542', 'CONCEPCION', 'IRIBARREN', 'LARA', 1),
(3, 'DR. VICENTE ANDRADE', 'CARRERA 1 ENTRE CALLES 4 Y 5 BARRIO UNION', '02514453923', 'UNION', 'IRIBARREN', 'LARA', 2),
(4, 'BARQUISIMETO', 'CARRERA 24 ENTRE CALLES 30 Y 31', '02512333657', 'CATEDRAL', 'IRIBARREN', 'LARA', 3),
(5, 'SANTA ROSA', 'FINAL AVENIDA LOS LEONES', '02512547721', 'SANTA ROSA', 'TORRES', 'LARA', 3),
(6, 'CARORA', 'CALLE BOLIVAR ESQUINA CALLE COMERCIO FRENTE A LA PLAZA BOLIVAR', '02524216933', 'TRINIDAD SAMUEL', 'TORRES', 'LARA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaCulmacion` date DEFAULT NULL,
  `descOrden` varchar(252) NOT NULL,
  `statusOrden` tinyint(4) NOT NULL,
  `servicioRealizado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalle`
--

CREATE TABLE `orden_detalle` (
  `id` int(11) NOT NULL,
  `idOrden` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `nomArticulo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'TECNICO'),
(3, 'AUTORIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nomServicio` varchar(50) NOT NULL,
  `idTipoServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nomServicio`, `idTipoServicio`) VALUES
(1, 'REPARACION DE AVERIA TELEFONICA', 1),
(2, 'ASIGNACION DE TELEFONO', 1),
(3, 'MOVIMIENTO DE PUNTO DE VOZ', 1),
(4, 'CAIDA DE CONEXION TRONCAL', 1),
(5, 'SUSTITUCION DE TENDIDO DE CABLE', 1),
(6, 'MANTENIMIENTO DE TELEFONO', 1),
(7, 'INSTALACION DE PUNTO DE VOZ', 1),
(8, 'SUSTITUCION DE TENDIDO DE CABLE', 2),
(9, 'MANTENIMIENTO SWITCH', 2),
(10, 'INSTALACION DE PUNTO DE DATA', 2),
(11, 'CONFIGURACION DE INTRANET ', 2),
(12, 'CONFIGURACION DE ENLACES', 2),
(13, 'SOPORTE TECNICO SOFTWARE', 3),
(14, 'SOPORTE TECNICO HARDWARE', 3),
(15, 'DISCO DURO DAÑADO', 3),
(16, 'TARJETA MADRE DAÑADA', 3),
(17, 'INSTALACION DE WINDOWS/LINUX', 3),
(18, 'UNIDAD DVD NO LEE', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_actividad`
--

CREATE TABLE `servicio_actividad` (
  `id` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_actividad`
--

INSERT INTO `servicio_actividad` (`id`, `idServicio`, `idActividad`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 3, 8),
(12, 3, 12),
(13, 3, 6),
(14, 3, 15),
(15, 4, 16),
(16, 4, 17),
(17, 4, 18),
(18, 4, 19),
(19, 4, 20),
(20, 4, 21),
(21, 4, 22),
(22, 4, 23),
(23, 13, 24),
(24, 13, 25),
(25, 13, 26),
(26, 13, 27),
(27, 13, 28),
(28, 13, 29),
(29, 13, 30),
(30, 13, 31),
(31, 13, 32),
(32, 13, 33),
(33, 13, 34),
(34, 13, 35),
(35, 13, 36),
(36, 14, 24),
(37, 14, 38),
(38, 14, 39),
(39, 14, 40),
(40, 18, 41),
(41, 18, 25),
(42, 18, 45),
(43, 18, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idEquipo` int(11) DEFAULT NULL,
  `idServicio` int(11) NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `statusSolicitud` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statusequipo`
--

CREATE TABLE `statusequipo` (
  `id` tinyint(4) NOT NULL,
  `statusEquipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `statusequipo`
--

INSERT INTO `statusequipo` (`id`, `statusEquipo`) VALUES
(1, 'ACTIVO'),
(2, 'EN REPARACION'),
(3, 'DESINCORPORADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statusorden`
--

CREATE TABLE `statusorden` (
  `id` tinyint(4) NOT NULL,
  `statusOrden` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statussolicitud`
--

CREATE TABLE `statussolicitud` (
  `id` tinyint(4) NOT NULL,
  `statusSolicitud` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoarticulo`
--

CREATE TABLE `tipoarticulo` (
  `id` int(11) NOT NULL,
  `nomTipoArticulo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoequipo`
--

CREATE TABLE `tipoequipo` (
  `id` int(11) NOT NULL,
  `nomTipoEquipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoequipo`
--

INSERT INTO `tipoequipo` (`id`, `nomTipoEquipo`) VALUES
(1, 'PC ESCRITORIO'),
(2, 'LAPTOP'),
(3, 'TELEFONO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipolocalidad`
--

CREATE TABLE `tipolocalidad` (
  `id` int(11) NOT NULL,
  `nomTipoLocalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipolocalidad`
--

INSERT INTO `tipolocalidad` (`id`, `nomTipoLocalidad`) VALUES
(1, 'HOSPITAL'),
(2, 'AMBULATORIO'),
(3, 'OFICINA ADMINISTRATIVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicio`
--

CREATE TABLE `tiposervicio` (
  `id` int(11) NOT NULL,
  `nomTipoServicio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposervicio`
--

INSERT INTO `tiposervicio` (`id`, `nomTipoServicio`) VALUES
(1, 'TELEFONIA'),
(2, 'REDES'),
(3, 'COMPUTACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariossigdos`
--

CREATE TABLE `usuariossigdos` (
  `id` int(11) NOT NULL,
  `nomUsuario` varchar(50) NOT NULL,
  `claveUsuario` varchar(50) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoArticulo` (`tipoArticulo`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAccion` (`idAccion`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `equiposasign`
--
ALTER TABLE `equiposasign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipoEquipo` (`idTipoEquipo`),
  ADD KEY `idStatusEquipo` (`idStatusEquipo`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipoLocalidad` (`idTipoLocalidad`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSolicitud` (`idSolicitud`),
  ADD KEY `statusOrden` (`statusOrden`);

--
-- Indices de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrden` (`idOrden`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idPermiso` (`idPermiso`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipoServicio` (`idTipoServicio`);

--
-- Indices de la tabla `servicio_actividad`
--
ALTER TABLE `servicio_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idServicio` (`idServicio`),
  ADD KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idEquipo` (`idEquipo`),
  ADD KEY `statusSolicitud` (`statusSolicitud`),
  ADD KEY `idServicio` (`idServicio`);

--
-- Indices de la tabla `statusequipo`
--
ALTER TABLE `statusequipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `statusorden`
--
ALTER TABLE `statusorden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `statussolicitud`
--
ALTER TABLE `statussolicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `statususuario`
--
ALTER TABLE `statususuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipolocalidad`
--
ALTER TABLE `tipolocalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariossigdos`
--
ALTER TABLE `usuariossigdos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomUsuario` (`nomUsuario`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idStatus` (`idStatus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equiposasign`
--
ALTER TABLE `equiposasign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `servicio_actividad`
--
ALTER TABLE `servicio_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `statusequipo`
--
ALTER TABLE `statusequipo`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `statusorden`
--
ALTER TABLE `statusorden`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `statussolicitud`
--
ALTER TABLE `statussolicitud`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `statususuario`
--
ALTER TABLE `statususuario`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipolocalidad`
--
ALTER TABLE `tipolocalidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuariossigdos`
--
ALTER TABLE `usuariossigdos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`tipoArticulo`) REFERENCES `tipoarticulo` (`id`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuariossigdos` (`id`),
  ADD CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`idAccion`) REFERENCES `acciones` (`id`);

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidades` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `equiposasign`
--
ALTER TABLE `equiposasign`
  ADD CONSTRAINT `equiposasign_ibfk_1` FOREIGN KEY (`idTipoEquipo`) REFERENCES `tipoequipo` (`id`),
  ADD CONSTRAINT `equiposasign_ibfk_2` FOREIGN KEY (`idStatusEquipo`) REFERENCES `statusequipo` (`id`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_ibfk_1` FOREIGN KEY (`idTipoLocalidad`) REFERENCES `tipolocalidad` (`id`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitudes` (`id`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`statusOrden`) REFERENCES `statusorden` (`id`);

--
-- Filtros para la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD CONSTRAINT `orden_detalle_ibfk_1` FOREIGN KEY (`idOrden`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `orden_detalle_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`id`);

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`idPermiso`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`idTipoServicio`) REFERENCES `tiposervicio` (`id`);

--
-- Filtros para la tabla `servicio_actividad`
--
ALTER TABLE `servicio_actividad`
  ADD CONSTRAINT `servicio_actividad_ibfk_1` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `servicio_actividad_ibfk_2` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`idEquipo`) REFERENCES `equiposasign` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`statusSolicitud`) REFERENCES `statussolicitud` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_4` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `usuariossigdos`
--
ALTER TABLE `usuariossigdos`
  ADD CONSTRAINT `usuariossigdos_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `usuariossigdos_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuariossigdos_ibfk_3` FOREIGN KEY (`idStatus`) REFERENCES `statususuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
