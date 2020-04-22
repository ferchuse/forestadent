/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : atoshka

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2019-07-31 13:03:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for abonos
-- ----------------------------
DROP TABLE IF EXISTS `abonos`;
CREATE TABLE `abonos` (
  `id_abonos` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `importe` float(10,2) DEFAULT NULL,
  `saldo_anterior` float DEFAULT NULL,
  `saldo_restante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_abonos`),
  KEY `id_cliente_idx` (`id_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of abonos
-- ----------------------------
INSERT INTO `abonos` VALUES ('3', '1', '2019-07-09', '2131', '800.00', '1800', '1000');
INSERT INTO `abonos` VALUES ('5', '2', '2019-07-12', '222', '500.00', '1000', '500');
INSERT INTO `abonos` VALUES ('6', '3', '2019-07-17', '321312', '50.00', '100', '50');

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id_cargos` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(11) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `saldo_anterior` float DEFAULT NULL,
  `saldo_restante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cargos`),
  KEY `id_clientes` (`id_clientes`),
  CONSTRAINT `id_clientes` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES ('3', '1', '2019-07-09', '1232', '1000', '800', '1800');
INSERT INTO `cargos` VALUES ('6', '3', '2019-07-17', 'DASDAS', '100', '0', '100');
INSERT INTO `cargos` VALUES ('7', '1', '2019-07-25', '123', '500', '1200', '1700');
INSERT INTO `cargos` VALUES ('8', '1', '2019-07-25', '1000', '200', '1700', '1900');
INSERT INTO `cargos` VALUES ('9', '1', '2019-07-25', '123', '1000', '900', '1900');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `id_vendedores` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'CLIENTE 1', 'ASDASD', 'dasdsa@askjd.com', 'dadas', '1');
INSERT INTO `clientes` VALUES ('2', 'PRUEBA 2', 'PRUEBA DIRECCION', 'correo@hotmail.com', '8767868768', '2');
INSERT INTO `clientes` VALUES ('3', 'JUAN CARLOS', 'EEEEEE', 'dsad@jasdk.com', '123123', '2');
INSERT INTO `clientes` VALUES ('4', 'PEDRO', 'CALLE', 'correo@pruebas.com', '123456', '3');

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) DEFAULT NULL,
  `fecha_compras` datetime DEFAULT NULL,
  `total_compras` float(11,2) DEFAULT NULL,
  `motivocancelacion_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus_compras` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `articulos_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_proveedores` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_compras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of compras
-- ----------------------------

-- ----------------------------
-- Table structure for compras_detalle
-- ----------------------------
DROP TABLE IF EXISTS `compras_detalle`;
CREATE TABLE `compras_detalle` (
  `id_compras_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_compras` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `unidad_productos` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` float(10,3) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_compras_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of compras_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for departamentos
-- ----------------------------
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `id_departamentos` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_departamentos` varchar(255) DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_departamentos`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departamentos
-- ----------------------------
INSERT INTO `departamentos` VALUES ('2', 'CALICO', 'SADASD');
INSERT INTO `departamentos` VALUES ('4', 'FRESH', 'DASDASDAD');
INSERT INTO `departamentos` VALUES ('7', 'TEST', 'DDDDD');
INSERT INTO `departamentos` VALUES ('11', 'ARCOBALENO', '100GR');

-- ----------------------------
-- Table structure for egresos
-- ----------------------------
DROP TABLE IF EXISTS `egresos`;
CREATE TABLE `egresos` (
  `id_egresos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_egresos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_egresos` int(11) DEFAULT NULL,
  `area_egresos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_egresos` date DEFAULT NULL,
  `hora_egresos` time DEFAULT NULL,
  `estatus_egresos` varchar(255) COLLATE utf8_spanish_ci DEFAULT 'ACTIVO',
  `motivocancelacion_egresos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `turno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_egresos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of egresos
-- ----------------------------

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id_empresas` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_empresas` varchar(255) DEFAULT NULL,
  `logo_empresas` varchar(255) DEFAULT NULL,
  `direccion_empresas` varchar(255) DEFAULT NULL,
  `rfc_empresas` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_empresas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empresas
-- ----------------------------

-- ----------------------------
-- Table structure for entradas
-- ----------------------------
DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas` (
  `id_entradas` int(10) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `fecha_entradas` datetime DEFAULT NULL,
  `id_usuarios` int(10) DEFAULT NULL,
  `recibe` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `articulos` int(10) DEFAULT NULL,
  `referencia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_entradas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of entradas
-- ----------------------------
INSERT INTO `entradas` VALUES ('1', '2019-07-09 10:41:36', '1', '', null, null);
INSERT INTO `entradas` VALUES ('2', '2019-07-09 10:41:45', '1', '', null, null);
INSERT INTO `entradas` VALUES ('3', '2019-07-09 10:41:45', '1', '', null, null);
INSERT INTO `entradas` VALUES ('4', '2019-07-10 08:10:52', '1', '', null, null);
INSERT INTO `entradas` VALUES ('5', '2019-07-12 01:26:35', '1', '', null, null);
INSERT INTO `entradas` VALUES ('6', '2019-07-12 01:26:39', '1', '', null, null);
INSERT INTO `entradas` VALUES ('7', '2019-07-12 01:26:40', '1', '', null, null);
INSERT INTO `entradas` VALUES ('8', '2019-07-12 01:26:42', '1', '', null, null);
INSERT INTO `entradas` VALUES ('9', '2019-07-12 01:26:43', '1', '', null, null);
INSERT INTO `entradas` VALUES ('10', '2019-07-12 12:58:15', '1', '', null, null);
INSERT INTO `entradas` VALUES ('11', '2019-07-12 12:59:02', '1', '', null, null);
INSERT INTO `entradas` VALUES ('12', '2019-07-12 13:00:06', '1', '', null, null);
INSERT INTO `entradas` VALUES ('13', '2019-07-12 13:00:56', '1', '', null, null);
INSERT INTO `entradas` VALUES ('14', '2019-07-12 13:01:11', '1', '', null, null);
INSERT INTO `entradas` VALUES ('15', '2019-07-12 13:01:55', '1', '', null, null);
INSERT INTO `entradas` VALUES ('16', '2019-07-15 13:54:33', '1', '', null, null);
INSERT INTO `entradas` VALUES ('17', '2019-07-15 18:04:08', '1', '', null, null);
INSERT INTO `entradas` VALUES ('18', '2019-07-15 18:22:25', '1', '', null, null);
INSERT INTO `entradas` VALUES ('19', '2019-07-15 18:39:48', '1', '', '0', '');
INSERT INTO `entradas` VALUES ('20', '2019-07-15 18:43:04', '1', '', '0', '');
INSERT INTO `entradas` VALUES ('21', '2019-07-15 18:45:52', '1', '', '7', 'COMPRA 12345');
INSERT INTO `entradas` VALUES ('22', '2019-07-15 18:48:13', '1', '', '1', 'ASD132');
INSERT INTO `entradas` VALUES ('23', '2019-07-15 18:49:14', '1', '', '1', 'DASDA12321');
INSERT INTO `entradas` VALUES ('24', '2019-07-16 10:22:43', '1', '', '5', '1231231');
INSERT INTO `entradas` VALUES ('25', '2019-07-17 12:01:01', '1', '', '1', '12312');
INSERT INTO `entradas` VALUES ('26', '2019-07-17 12:01:17', '1', '', '1', '12312');
INSERT INTO `entradas` VALUES ('27', '2019-07-17 12:02:00', '1', null, '1', '12312');
INSERT INTO `entradas` VALUES ('28', '2019-07-17 12:02:17', '1', null, '1', '12312');
INSERT INTO `entradas` VALUES ('29', '2019-07-17 12:02:59', '1', null, '1', 'DASDASD');
INSERT INTO `entradas` VALUES ('30', '2019-07-17 12:03:52', '1', null, '1', 'FSDFSD');
INSERT INTO `entradas` VALUES ('31', '2019-07-25 22:09:48', '1', null, '1', '232131');
INSERT INTO `entradas` VALUES ('32', '2019-07-30 09:41:13', '1', null, '2', 'VENTA 123');

-- ----------------------------
-- Table structure for entradas_productos
-- ----------------------------
DROP TABLE IF EXISTS `entradas_productos`;
CREATE TABLE `entradas_productos` (
  `id_entradas` int(10) DEFAULT NULL,
  `id_productos` int(10) DEFAULT NULL,
  `cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of entradas_productos
-- ----------------------------
INSERT INTO `entradas_productos` VALUES ('1', '3', '1');
INSERT INTO `entradas_productos` VALUES ('1', '4', '5');
INSERT INTO `entradas_productos` VALUES ('2', '3', '1');
INSERT INTO `entradas_productos` VALUES ('2', '4', '5');
INSERT INTO `entradas_productos` VALUES ('3', '3', '1');
INSERT INTO `entradas_productos` VALUES ('3', '4', '5');
INSERT INTO `entradas_productos` VALUES ('4', '79', '2');
INSERT INTO `entradas_productos` VALUES ('4', '36', '3');
INSERT INTO `entradas_productos` VALUES ('5', '83', '1');
INSERT INTO `entradas_productos` VALUES ('6', '83', '1');
INSERT INTO `entradas_productos` VALUES ('7', '83', '1');
INSERT INTO `entradas_productos` VALUES ('8', '83', '1');
INSERT INTO `entradas_productos` VALUES ('9', '83', '1');
INSERT INTO `entradas_productos` VALUES ('10', '78', '1');
INSERT INTO `entradas_productos` VALUES ('11', '78', '1');
INSERT INTO `entradas_productos` VALUES ('12', '79', '1');
INSERT INTO `entradas_productos` VALUES ('13', '79', '1');
INSERT INTO `entradas_productos` VALUES ('14', '79', '1');
INSERT INTO `entradas_productos` VALUES ('15', '79', '1');
INSERT INTO `entradas_productos` VALUES ('16', '3', '5');
INSERT INTO `entradas_productos` VALUES ('17', '79', '1');
INSERT INTO `entradas_productos` VALUES ('18', '1', '1');
INSERT INTO `entradas_productos` VALUES ('19', '79', '9');
INSERT INTO `entradas_productos` VALUES ('20', '84', '1');
INSERT INTO `entradas_productos` VALUES ('20', '4', '1');
INSERT INTO `entradas_productos` VALUES ('21', '78', '1');
INSERT INTO `entradas_productos` VALUES ('21', '79', '6');
INSERT INTO `entradas_productos` VALUES ('22', '79', '1');
INSERT INTO `entradas_productos` VALUES ('23', '79', '1');
INSERT INTO `entradas_productos` VALUES ('24', '81', '5');
INSERT INTO `entradas_productos` VALUES ('25', '79', '1');
INSERT INTO `entradas_productos` VALUES ('26', '79', '1');
INSERT INTO `entradas_productos` VALUES ('27', '79', '1');
INSERT INTO `entradas_productos` VALUES ('28', '79', '1');
INSERT INTO `entradas_productos` VALUES ('29', '78', '1');
INSERT INTO `entradas_productos` VALUES ('30', '78', '1');
INSERT INTO `entradas_productos` VALUES ('31', '80', '1');
INSERT INTO `entradas_productos` VALUES ('32', '2', '1');
INSERT INTO `entradas_productos` VALUES ('32', '1', '1');

-- ----------------------------
-- Table structure for historial_precios
-- ----------------------------
DROP TABLE IF EXISTS `historial_precios`;
CREATE TABLE `historial_precios` (
  `id_productos` int(10) DEFAULT NULL,
  `fecha_precio` date DEFAULT NULL,
  `precio_anterior` decimal(10,2) DEFAULT NULL,
  `precio_nuevo` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of historial_precios
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_productos` int(10) NOT NULL AUTO_INCREMENT,
  `codigo_productos` varchar(255) DEFAULT NULL COMMENT 'TRIAL',
  `descripcion_productos` varchar(255) DEFAULT NULL COMMENT 'TRIAL',
  `costo_proveedor` decimal(10,2) DEFAULT NULL COMMENT 'TRIAL',
  `unidad_productos` varchar(255) DEFAULT 'PZA',
  `ganancia_menudeo_porc` float(10,2) DEFAULT NULL COMMENT 'TRIAL',
  `precio_mayoreo` decimal(10,2) DEFAULT NULL COMMENT 'TRIAL',
  `precio_menudeo` decimal(10,2) DEFAULT NULL COMMENT 'TRIAL',
  `existencia_productos` float(10,3) DEFAULT '0.000' COMMENT 'TRIAL',
  `min_productos` float(10,2) DEFAULT NULL COMMENT 'TRIAL',
  `id_departamentos` int(10) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT '',
  PRIMARY KEY (`id_productos`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COMMENT='TRIAL';

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('3', '8360', '8360 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '2', 'A1');
INSERT INTO `productos` VALUES ('4', '8361', '8361 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('5', '8363', '8363 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('6', '8364', '8364 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('7', '8365', '8365 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('8', '8366', '8366 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('9', '8367', '8367 - ARCOBALENO', null, 'KG', null, null, null, '4.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('10', '8368', '8368 - ARCOBALENO', null, 'KG', null, null, null, '6.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('11', '8370', '8370 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('12', '8372', '8372 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('13', '8373', '8373 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('14', '8374', '8374 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('15', '8377', '8377 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('16', '8379', '8379 - ARCOBALENO', null, 'KG', null, null, null, '10.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('17', '8380', '8380 - ARCOBALENO', null, 'KG', null, null, null, '2.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('18', '8383', '8383 - ARCOBALENO', null, 'KG', null, null, null, '2.000', '1.00', '1', '');
INSERT INTO `productos` VALUES ('19', '642', '642 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('20', '675', '675 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('21', '763', '763 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('22', '954', '954 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('23', '2031', '2031 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('24', '2035', '2035 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('25', '2061', '2061 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('26', '2145', '2145 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('27', '2177', '2177 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('28', '2319', '2319 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('29', '2522', '2522 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('30', '2901', '2901 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('31', '3239', '3239 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('32', '3243', '3243 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('33', '5000', '5000 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('34', '5008', '5008 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('35', '5250', '5250 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('36', '12246', '12246 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('37', '12504', '12504 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('38', '12549', '12549 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('39', '12732', '12732 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('40', '12930', '12930 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('41', '12959', '12959 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('42', '13427', '13427 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('43', '13701', '13701 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('44', '13995', '13995 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('45', '14004', '14004 - CALICO', null, 'KG', null, null, null, '0.000', '1.00', '2', '');
INSERT INTO `productos` VALUES ('46', '6549', '6549 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('47', '6567', '6567 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('48', '6568', '6568 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('49', '6570', '6570 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('50', '6572', '6572 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('51', '6573', '6573 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('52', '6574', '6574 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('53', '6575', '6575 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('54', '6576', '6576 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('55', '6577', '6577 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('56', '6579', '6579 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('57', '6582', '6582 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('58', '6587', '6587 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('59', '6588', '6588 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('60', '6589', '6589 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('61', '6590', '6590 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('62', '6591', '6591 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('63', '6592', '6592 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('64', '6594', '6594 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('65', '6596', '6596 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('66', '6597', '6597 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('67', '6598', '6598 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('68', '7823', '7823 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('69', '7825', '7825 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('70', '7828', '7828 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('71', '7829', '7829 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('72', '7832', '7832 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('73', '7835', '7835 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('74', '7855', '7855 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('75', '8654', '8654 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('76', '8655', '8655 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('77', '8656', '8656 - CABLE 5', null, 'KG', null, null, null, '0.000', '1.00', '3', '');
INSERT INTO `productos` VALUES ('78', '8164', '8164 - FRESH', null, 'KG', null, null, null, '1.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('79', '8166', '8166 - FRESH', null, 'KG', null, null, null, '3.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('80', '8167', '8167 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('81', '8169', '8169 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('82', '8170', '8170 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('83', '8171', '8171 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('84', '8172', '8172 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('85', '8173', '8173 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('86', '8710', '8710 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('87', '8711', '8711 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('88', '8712', '8712 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('89', '8713', '8713 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('90', '8715', '8715 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('91', '8716', '8716 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('92', '8717', '8717 - FRESH', null, 'KG', null, null, null, '0.000', '1.00', '4', '');
INSERT INTO `productos` VALUES ('93', '8665', '8665 - ITACA', null, 'KG', null, null, null, '0.000', '1.00', '5', '');
INSERT INTO `productos` VALUES ('94', '8666', '8666 - ITACA', null, 'KG', null, null, null, '0.000', '1.00', '5', '');
INSERT INTO `productos` VALUES ('95', '632', '632 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('96', '642', '642 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('97', '675', '675 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('98', '773', '773 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('99', '923', '923 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('100', '954', '954 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('101', '978', '978 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('102', '2021', '2021 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('103', '2061', '2061 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('104', '2520', '2520 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('105', '2522', '2522 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('106', '2901', '2901 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('107', '4002', '4002 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('108', '4003', '4003 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('109', '5000', '5000 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('110', '6953', '6953 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('111', '8000', '8000 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('112', '8564', '8564 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('113', '10040', '10040 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('114', '12246', '12246 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('115', '12504', '12504 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('116', '12732', '12732 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('117', '12975', '12975 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('118', '13701', '13701 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('119', '13975', '13975 - MISISNA', null, 'KG', null, null, null, '0.000', '1.00', '6', '');
INSERT INTO `productos` VALUES ('120', '6536', '6536 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('121', '6537', '6537 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('122', '6543', '6543 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('123', '6549', '6549 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('124', '6550', '6550 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('125', '6552', '6552 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('126', '6554', '6554 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('127', '6555', '6555 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('128', '6561', '6561 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('129', '6565', '6565 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('130', '7331', '7331 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('131', '7823', '7823 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('132', '7906', '7906 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('133', '7908', '7908 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('134', '7915', '7915 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('135', '7920', '7920 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('136', '8655', '8655 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('137', '8656', '8656 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('138', '8657', '8657 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('139', '8733', '8733 - NUOVO JAIPUR', null, 'KG', null, null, null, '0.000', '1.00', '7', '');
INSERT INTO `productos` VALUES ('140', '7619', '7619 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('141', '7647', '7647 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('142', '7648', '7648 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('143', '7649', '7649 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('144', '7652', '7652 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('145', '7653', '7653 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('146', '7654', '7654 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('147', '7657', '7657 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('148', '7659', '7659 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('149', '7660', '7660 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('150', '7661', '7661 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('151', '7662', '7662 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('152', '7664', '7664 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('153', '7665', '7665 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('154', '7666', '7666 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('155', '7667', '7667 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('156', '7669', '7669 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('157', '7672', '7672 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('158', '7855', '7855 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('159', '8718', '8718 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('160', '8719', '8719 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('161', '8721', '8721 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('162', '8722', '8722 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');
INSERT INTO `productos` VALUES ('163', '8723', '8723 - SUGAR', null, 'KG', null, null, null, '0.000', '1.00', '8', '');

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id_proveedores` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_proveedores` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_proveedores`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for salidas
-- ----------------------------
DROP TABLE IF EXISTS `salidas`;
CREATE TABLE `salidas` (
  `id_salidas` int(10) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `fecha_salidas` datetime DEFAULT NULL,
  `id_usuarios` int(10) DEFAULT NULL,
  `recibe` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `referencia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `articulos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_salidas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of salidas
-- ----------------------------
INSERT INTO `salidas` VALUES ('1', '2019-07-09 11:15:18', '1', '', null, null);

-- ----------------------------
-- Table structure for salidas_productos
-- ----------------------------
DROP TABLE IF EXISTS `salidas_productos`;
CREATE TABLE `salidas_productos` (
  `id_salidas` int(10) DEFAULT NULL,
  `id_productos` int(10) DEFAULT NULL,
  `cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of salidas_productos
-- ----------------------------
INSERT INTO `salidas_productos` VALUES ('0', '3', '1');
INSERT INTO `salidas_productos` VALUES ('0', '4', '5');
INSERT INTO `salidas_productos` VALUES ('0', '3', '1');
INSERT INTO `salidas_productos` VALUES ('0', '4', '5');
INSERT INTO `salidas_productos` VALUES ('1', '3', '1');
INSERT INTO `salidas_productos` VALUES ('1', '4', '5');

-- ----------------------------
-- Table structure for turnos
-- ----------------------------
DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `id_turnos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio_turnos` date DEFAULT NULL,
  `fecha_cierre_turnos` date DEFAULT NULL,
  `hora_inicios` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `saldo_final` decimal(10,2) DEFAULT NULL,
  `efectivo_inicial` decimal(10,2) DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `cerrado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_turnos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of turnos
-- ----------------------------
INSERT INTO `turnos` VALUES ('1', '2019-06-29', null, '16:20:46', null, null, null, null, '0');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuarios` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso_usuarios` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass_usuarios` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nick_usuarios` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'demo', 'administrador', 'demo', 'demo');
INSERT INTO `usuarios` VALUES ('2', 'ADMIN', 'Administrador', 'admin', null);

-- ----------------------------
-- Table structure for vendedores
-- ----------------------------
DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `id_vendedores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_vendedores` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_vendedores`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of vendedores
-- ----------------------------
INSERT INTO `vendedores` VALUES ('1', 'VENTAS1', 'ventas');
INSERT INTO `vendedores` VALUES ('2', 'VENTAS2', 'dasdas');
INSERT INTO `vendedores` VALUES ('3', 'VENDEDORE DE PRUEBAS', '1234');

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `id_turnos` int(255) DEFAULT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `fecha_ventas` date DEFAULT NULL,
  `subtotal_ventas` float(11,2) DEFAULT NULL,
  `descuento_ventas` float(11,2) DEFAULT NULL,
  `total_ventas` float(11,2) DEFAULT NULL,
  `hora_ventas` time DEFAULT NULL,
  `datos_cancelacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `facturado` tinyint(1) DEFAULT '0',
  `cambio_ventas` float(255,2) DEFAULT NULL,
  `pagocon_ventas` float(255,2) DEFAULT NULL,
  `iva_ventas` int(11) DEFAULT NULL,
  `articulos_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vale_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT '0',
  `efectivo_ventas` float(10,2) DEFAULT '0.00',
  `tarjeta_ventas` varchar(255) COLLATE utf8_spanish_ci DEFAULT '0',
  `prestamo_ventas` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pago_tarjeta` float(10,2) DEFAULT '0.00',
  `total_efectivo` float(10,2) DEFAULT '0.00',
  `ganancia_ventas` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_ventas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES ('1', '1', '1', '2019-06-29', null, null, '0.00', '20:10:09', null, 'PAGADO', '0', null, null, null, '1', '0', '0.00', '', null, '0.00', '0.00', null);

-- ----------------------------
-- Table structure for ventas_detalle
-- ----------------------------
DROP TABLE IF EXISTS `ventas_detalle`;
CREATE TABLE `ventas_detalle` (
  `id_ventas_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_ventas` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `unidad_productos` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` float(10,3) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `ganancia` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_ventas_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of ventas_detalle
-- ----------------------------
INSERT INTO `ventas_detalle` VALUES ('1', '1', '78', '', '1.000', '0.00', '8164 - FRESH', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('2', '0', '1', '', '4.000', '0.00', '8358 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('3', '0', '2', '', '4.000', '0.00', '8359 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('4', '0', '3', '', '4.000', '0.00', '8360 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('5', '0', '5', '', '4.000', '0.00', '8363 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('6', '0', '6', '', '4.000', '0.00', '8364 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('7', '0', '7', '', '4.000', '0.00', '8365 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('8', '0', '8', '', '4.000', '0.00', '8366 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('9', '0', '9', '', '4.000', '0.00', '8367 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('10', '0', '1', '', '10.000', '0.00', '8358 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('11', '0', '2', '', '10.000', '0.00', '8359 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('12', '0', '4', '', '6.000', '0.00', '8361 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('13', '0', '10', '', '6.000', '0.00', '8368 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('14', '0', '11', '', '10.000', '0.00', '8370 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('15', '0', '12', '', '10.000', '0.00', '8372 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('16', '0', '13', '', '10.000', '0.00', '8373 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('17', '0', '14', '', '10.000', '0.00', '8374 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('18', '0', '15', '', '10.000', '0.00', '8377 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('19', '0', '16', '', '10.000', '0.00', '8379 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('20', '0', '17', '', '2.000', '0.00', '8380 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('21', '0', '18', '', '2.000', '0.00', '8383 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('22', '0', '4', '', '4.000', '0.00', '8361 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('23', '0', '2', '', '1.000', '0.00', '8359 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('24', '0', '15', '', '1.000', '0.00', '8377 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('25', '0', '1', '', '1.000', '0.00', '8358 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('26', '0', '18', '', '1.000', '0.00', '8383 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('27', '0', '11', '', '1.000', '0.00', '8370 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('28', '0', '4', '', '1.000', '0.00', '8361 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('29', '0', '2', '', '1.000', '0.00', '8359 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('30', '0', '6', '', '1.000', '0.00', '8364 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('31', '0', '7', '', '1.000', '0.00', '8365 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('32', '0', '3', '', '1.000', '0.00', '8360 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('33', '0', '9', '', '1.000', '0.00', '8367 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('34', '0', '8', '', '1.000', '0.00', '8366 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('35', '0', '5', '', '1.000', '0.00', '8363 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('36', '0', '13', '', '1.000', '0.00', '8373 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('37', '0', '16', '', '1.000', '0.00', '8379 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('38', '0', '12', '', '1.000', '0.00', '8372 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('39', '0', '10', '', '1.000', '0.00', '8368 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('40', '0', '14', '', '1.000', '0.00', '8374 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('41', '0', '17', '', '1.000', '0.00', '8380 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('42', '0', '16', '', '2.000', '0.00', '8379 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('43', '0', '1', '', '2.000', '0.00', '8358 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('44', '0', '17', '', '1.000', '0.00', '8380 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('45', '0', '15', '', '2.000', '0.00', '8377 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('46', '0', '11', '', '2.000', '0.00', '8370 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('47', '0', '14', '', '2.000', '0.00', '8374 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('48', '0', '10', '', '2.000', '0.00', '8368 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('49', '0', '13', '', '2.000', '0.00', '8373 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('50', '0', '18', '', '1.000', '0.00', '8383 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('51', '0', '12', '', '1.000', '0.00', '8372 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('52', '0', '4', '', '2.000', '0.00', '8361 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('53', '0', '2', '', '2.000', '0.00', '8359 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('54', '0', '6', '', '2.000', '0.00', '8364 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('55', '0', '5', '', '2.000', '0.00', '8363 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('56', '0', '8', '', '2.000', '0.00', '8366 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('57', '0', '9', '', '2.000', '0.00', '8367 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('58', '0', '7', '', '2.000', '0.00', '8365 - ARCOBALENO', null, '0.00', '0.00');
INSERT INTO `ventas_detalle` VALUES ('59', '0', '3', '', '2.000', '0.00', '8360 - ARCOBALENO', null, '0.00', '0.00');
