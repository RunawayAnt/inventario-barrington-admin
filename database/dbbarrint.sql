-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2021 a las 22:33:40
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbbarrint`
--
CREATE DATABASE IF NOT EXISTS `dbbarrint` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbbarrint`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_agregar_detalle_temp`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_detalle_temp` (IN `in_codigo` INT, IN `cantidad` INT, IN `in_token_user` VARCHAR(255))  BEGIN 
    	DECLARE precio_actual double;
        SELECT 	preciosalida INTO precio_actual FROM producto WHERE id_producto = in_codigo;
        INSERT INTO `detalle_temp`(`id_product`, `token_user`, `cantidad`, `precio_venta`) VALUES (in_codigo, in_token_user,cantidad,precio_actual);
        SELECT detalle_temp.id_detallet, detalle_temp.id_product,producto.nombre,detalle_temp.cantidad,detalle_temp.precio_venta FROM detalle_temp INNER JOIN producto ON detalle_temp.id_product=producto.id_producto WHERE detalle_temp.token_user = in_token_user;
        END$$

DROP PROCEDURE IF EXISTS `sp_cambiar_estado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cambiar_estado` (IN `In_idusuario` INT(11), IN `In_estado` VARCHAR(20))  NO SQL
UPDATE usuarios SET estado = In_estado WHERE id = In_idusuario$$

DROP PROCEDURE IF EXISTS `sp_cambiar_estado_categoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cambiar_estado_categoria` (IN `In_id` INT(11), IN `In_estado` VARCHAR(20))  NO SQL
UPDATE categorias SET estado = In_estado WHERE id_categoria = In_id$$

DROP PROCEDURE IF EXISTS `sp_cambiar_estado_proveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cambiar_estado_proveedor` (IN `In_id` INT, IN `In_estado` VARCHAR(20))  NO SQL
UPDATE proveedor SET estado = In_estado WHERE id = In_id$$

DROP PROCEDURE IF EXISTS `sp_editar_categorias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_categorias` (IN `in_id` INT, IN `in_categ` VARCHAR(255), IN `in_descrip` TEXT)  NO SQL
BEGIN
UPDATE categorias SET 
nombre = in_categ,
descripcion= in_descrip
WHERE id_categoria = in_id;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_clientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_clientes` (IN `in_id` INT, IN `in_dni` INT(8), IN `in_nombres` VARCHAR(100), IN `in_apellidos` VARCHAR(100), IN `in_telefono` VARCHAR(30), IN `in_correo` VARCHAR(60))  NO SQL
BEGIN
UPDATE cliente SET 
dni = in_dni,
nombres = in_nombres,
apellidos = in_apellidos,
telefono = in_telefono,
correo = in_correo
WHERE id = in_id;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_productos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_productos` (IN `In_idproducto` INT, IN `In_nom` VARCHAR(50), IN `In_descrip` TEXT, IN `In_precentrada` DOUBLE, IN `In_precsalida` DOUBLE, IN `In_mininv` INT, IN `In_categ` INT, IN `In_prov` INT, IN `In_unidad` VARCHAR(255))  NO SQL
BEGIN
UPDATE producto SET
nombre = In_nom,
descripcion = In_descrip,
precioentrada = In_precentrada,
preciosalida = In_precsalida,
mininventario = In_mininv,
id_categoria = In_categ,
id_proveedor = In_prov,
unidad = In_unidad
WHERE id_producto = In_idproducto;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_proveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_proveedor` (IN `in_id` INT, IN `in_ruc` VARCHAR(11), IN `in_empresa` VARCHAR(100), IN `in_direccion` TEXT, IN `in_correo` VARCHAR(100), IN `in_telefono` VARCHAR(20))  NO SQL
BEGIN
UPDATE proveedor SET 
ruc = in_ruc,
razonsocial = in_empresa,
direccion = in_direccion,
correo = in_correo,
telefono = in_telefono
WHERE id = in_id;
END$$

DROP PROCEDURE IF EXISTS `sp_editar_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editar_usuarios` (IN `in_id` INT(11), IN `in_idrol` INT(11), IN `in_nombres` VARCHAR(100), IN `in_apellidos` VARCHAR(100), IN `in_dni` INT(8), IN `in_usuario` VARCHAR(50), IN `in_email` VARCHAR(100), IN `in_telefono` VARCHAR(20))  NO SQL
BEGIN
UPDATE usuarios SET 
id_rol = in_idrol,
nombres= in_nombres,
apellidos= in_apellidos,
dni= in_dni,
usuario= in_usuario,
email= in_email,
telefono=in_telefono
WHERE id = in_id;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_categorias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_categorias` ()  NO SQL
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT 
@CANTIDAD:=@CANTIDAD+1 AS posicion,
categorias.id_categoria,
categorias.nombre,
categorias.descripcion,
categorias.estado,
categorias.creacion
FROM categorias;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_clientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_clientes` ()  NO SQL
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT 
@CANTIDAD:=@CANTIDAD+1 AS posicion,
cliente.id,
cliente.dni,
cliente.nombres,
cliente.apellidos,
cliente.telefono,
cliente.correo,
cliente.creacion
FROM cliente;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_productos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_productos` ()  NO SQL
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
producto.id_producto,
producto.nombre,
producto.unidad,
producto.precioentrada,
producto.preciosalida,
producto.codigobarras,
producto.descripcion,
producto.creacion,
producto.mininventario,
producto.id_proveedor,
producto.id_categoria,
producto.estado
FROM producto;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_proveedores`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_proveedores` ()  NO SQL
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT 
@CANTIDAD:=@CANTIDAD+1 AS posicion,
proveedor.id,
proveedor.ruc,
proveedor.razonsocial,
proveedor.direccion,
proveedor.correo,
proveedor.telefono,
proveedor.estado,
proveedor.creacion
FROM proveedor;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_rol` ()  NO SQL
SELECT 
rol.id_rol,
rol.nombre_rol
FROM rol$$

DROP PROCEDURE IF EXISTS `sp_listar_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()  NO SQL
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT 
@CANTIDAD:=@CANTIDAD+1 AS posicion,
usuarios.id, 
usuarios.nombres,
usuarios.apellidos,
usuarios.dni,
usuarios.email,
usuarios.telefono,
rol.nombre_rol,
rol.id_rol,
usuarios.usuario, 
usuarios.estado,
usuarios.creacion
FROM usuarios INNER JOIN rol ON usuarios.id_rol = rol.id_rol;
END$$

DROP PROCEDURE IF EXISTS `sp_producto_categoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto_categoria` ()  NO SQL
BEGIN
SELECT 
id_categoria,
nombre
FROM categorias WHERE estado = 'Activo';
END$$

DROP PROCEDURE IF EXISTS `sp_producto_proveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto_proveedor` ()  NO SQL
BEGIN
SELECT 
id,
razonsocial
FROM proveedor WHERE estado = 'Activo';
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_categorias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_categorias` (IN `in_nombre` VARCHAR(255), IN `descripcion` TEXT)  NO SQL
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM categorias WHERE nombre = BINARY in_nombre);
IF @CANTIDAD = 0 THEN
INSERT INTO `categorias`(`nombre`, `descripcion`, `creacion`) VALUES (in_nombre,descripcion,Now());
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_clientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_clientes` (IN `in_nombres` VARCHAR(100), IN `in_apellidos` VARCHAR(100), IN `in_dni` INT(8), IN `in_telefono` VARCHAR(30), IN `in_correo` VARCHAR(60))  NO SQL
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM cliente WHERE dni = in_dni);
IF @CANTIDAD = 0 THEN
INSERT INTO `cliente`(`nombres`, `apellidos`, `dni`, `telefono`, `correo`, `creacion`) VALUES (in_nombres, in_apellidos, in_dni, in_telefono, in_correo, Now());
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_operacion_producto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_operacion_producto` (IN `In_idproducto` INT, IN `In_cantidad` FLOAT)  NO SQL
BEGIN
INSERT INTO `operacion`(`id_producto`, `cantidad`, `id_tipo_operacion`,`creacion`) VALUES (In_idproducto,In_cantidad,1,Now());
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_producto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_producto` (IN `In_idproveedor` INT, IN `In_codigobarras` VARCHAR(255), IN `In_nombre` VARCHAR(50), IN `In_descripcion` TEXT, IN `In_mininventario` INT, IN `In_precioentrada` DOUBLE, IN `In_preciosalida` DOUBLE, IN `In_unidad` VARCHAR(255), IN `In_idusuario` INT, IN `In_idcategoria` INT)  NO SQL
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM producto WHERE codigobarras = BINARY In_codigobarras);
IF @CANTIDAD = 0 THEN
INSERT INTO `producto`(`id_proveedor`, `codigobarras`, `nombre`, `descripcion`, `mininventario`, `precioentrada`, `preciosalida`, `unidad`, `id_usuario`, `id_categoria`, `creacion`, `estado`) VALUES (In_idproveedor,In_codigobarras,In_nombre,In_descripcion,In_mininventario,In_precioentrada,In_preciosalida,In_unidad,In_idusuario,In_idcategoria,Now(),'Activo');
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_proveedor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_proveedor` (IN `in_ruc` VARCHAR(11), IN `in_empr` VARCHAR(100), IN `in_direc` TEXT, IN `in_corre` VARCHAR(100), IN `in_telef` VARCHAR(20))  NO SQL
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM proveedor WHERE ruc =BINARY in_ruc);
IF @CANTIDAD = 0 THEN
INSERT INTO `proveedor`(`ruc`, `razonsocial`, `direccion`, `correo`, `telefono`, `estado`, `creacion`) VALUES (in_ruc,in_empr,in_direc,in_corre,in_telef,'Activo',Now());
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_registrar_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuarios` (IN `Inid_rol` INT(11), IN `Innombres` VARCHAR(100), IN `Inapellidos` VARCHAR(100), IN `Indni` INT(8), IN `Inusuario` VARCHAR(50), IN `Inemail` VARCHAR(100), IN `Intelefono` VARCHAR(20), IN `Incontrasen` VARCHAR(255))  NO SQL
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM usuarios WHERE usuario=BINARY Inusuario);
IF @CANTIDAD = 0 THEN
INSERT INTO `usuarios`(`id_rol`, `nombres`, `apellidos`, `dni`, `usuario`, `email`, `telefono`, `contrasen`, `estado`, `creacion`) VALUES (Inid_rol,Innombres,Inapellidos,Indni,Inusuario,Inemail,Intelefono,Incontrasen,'Activo',Now());
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_verificar_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verificar_usuarios` (IN `user` VARCHAR(50))  NO SQL
SELECT usuarios.id, usuarios.nombres, usuarios.apellidos, rol.nombre_rol, usuarios.usuario, usuarios.email, usuarios.contrasen, usuarios.estado, usuarios.creacion FROM usuarios INNER JOIN rol ON usuarios.id_rol = rol.id_rol WHERE usuario = BINARY user$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `estado`, `creacion`) VALUES
(11, 'Tela de Vestir', 'Not description', 'Inactivo', '2020-11-27 11:09:03'),
(14, 'Tela de Poliseda', 'Not description', 'Activo', '2020-11-29 23:01:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `nit` int(11) NOT NULL,
  `razon_social` varchar(90) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `iva` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `direccion`, `nit`, `razon_social`, `telefono`, `iva`) VALUES
(1, 'asd', 12345678, 'asdasd', '123133123', '18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

DROP TABLE IF EXISTS `detalle_temp`;
CREATE TABLE `detalle_temp` (
  `id_detallet` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `token_user` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

DROP TABLE IF EXISTS `operacion`;
CREATE TABLE `operacion` (
  `id_op` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `id_tipo_operacion` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `codigobarras` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `mininventario` int(11) NOT NULL,
  `precioentrada` double NOT NULL,
  `preciosalida` double NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `creacion` datetime NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `razonsocial` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `ruc`, `razonsocial`, `direccion`, `correo`, `telefono`, `estado`, `creacion`) VALUES
(12, '17022000000', 'Ambitex S.A.C', 'Calle Felipe Santiago Salaverry 140, Urbanizacion El Pino, San Luis, Lima Peru', 'comercial@gmail.com', '(+51) 983-231-969', 'Inactivo', '2020-11-30 21:35:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

DROP TABLE IF EXISTS `tipo_operacion`;
CREATE TABLE `tipo_operacion` (
  `id_tipop` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_operacion`
--

INSERT INTO `tipo_operacion` (`id_tipop`, `name`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasen` varchar(255) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_rol`, `nombres`, `apellidos`, `dni`, `usuario`, `email`, `telefono`, `contrasen`, `estado`, `creacion`) VALUES
(32, 1, 'Axcel Sting', 'Anchante Mosayhuate', 70769830, 'admin', 'axcelsting345@hotmail.com', '(+51) 944-947-498', '$2y$10$JCxxD0OB4HjRiQzj6EGhc.kB7vfXge/q6APgM7Cgjb3aIAjx3CyIS', 'Activo', '2020-11-23 16:53:53'),
(33, 2, 'Luis Jesus Enrique', 'Nestares Torres', 70769849, 'trabajador1', 'lui16nesta@gmail.com', '(+51) 970-407-066', '$2y$10$2lPOoQxqbfYNwV3jrLF5neaPaD3wPvUCuPd2idVlqt.szwh5rDKNy', 'Activo', '2020-11-23 19:28:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_usuar` int(11) DEFAULT NULL,
  `id_tipo_op` int(11) DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id_detallet`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `fk_id_producto` (`id_producto`),
  ADD KEY `fk_tipo_operacion` (`id_tipo_operacion`),
  ADD KEY `fk_venta` (`id_venta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigobarras` (`codigobarras`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_categoria` (`id_categoria`),
  ADD KEY `fk_id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruc` (`ruc`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`id_tipop`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_rol` (`id_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_id_caja` (`id_caja`),
  ADD KEY `id_usuar` (`id_usuar`),
  ADD KEY `id_tipo_op` (`id_tipo_op`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_prov` (`id_prov`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id_detallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  MODIFY `id_tipop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `fk_tipo_operacion` FOREIGN KEY (`id_tipo_operacion`) REFERENCES `tipo_operacion` (`id_tipop`),
  ADD CONSTRAINT `fk_venta` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `fk_id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_id_caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`),
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuar`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_tipo_op`) REFERENCES `tipo_operacion` (`id_tipop`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
