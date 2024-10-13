/*
Navicat MySQL Data Transfer

Source Server         : CONEXION1C2024
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : bd_inventario

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2024-04-09 21:09:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_articulos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_articulos`;
CREATE TABLE `tbl_articulos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nombreArticulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcionarticulo` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cantidadExistencia` int NOT NULL,
  `precioArticulo` int DEFAULT NULL,
  `codigoMarca` int NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_articulos
-- ----------------------------
INSERT INTO `tbl_articulos` VALUES ('4', 'Air force 1', '2024-04-09', ' tipo suela', '6', '922', '5');
INSERT INTO `tbl_articulos` VALUES ('5', 'Chocolates', '2024-05-12', 'salado', '560', '18500', '3');
INSERT INTO `tbl_articulos` VALUES ('6', 'LECHE', '2024-04-10', ' Lacteo', '4', '700', '7');

-- ----------------------------
-- Table structure for `tbl_marcas`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_marcas`;
CREATE TABLE `tbl_marcas` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nombreMarca` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcionMarca` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `codigoProveedor` int NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_marcas
-- ----------------------------
INSERT INTO `tbl_marcas` VALUES ('3', 'PUMBA', ' tenis', '5');
INSERT INTO `tbl_marcas` VALUES ('4', 'adias', ' sxz', '3');
INSERT INTO `tbl_marcas` VALUES ('5', 'nike', ' rferer', '5');
INSERT INTO `tbl_marcas` VALUES ('7', 'DOS PINOS', ' lacteos', '5');

-- ----------------------------
-- Table structure for `tbl_proveedores`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_proveedores`;
CREATE TABLE `tbl_proveedores` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `cedulaProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombreProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefonoProveedor` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `codigoProvincia` int NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_provincias`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_provincias`;
CREATE TABLE `tbl_provincias` (
  `codigoProvincia` int NOT NULL,
  `nombreArticulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigoProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_provincias
-- ----------------------------
INSERT INTO `tbl_provincias` VALUES ('1', 'San José');
INSERT INTO `tbl_provincias` VALUES ('2', 'Alajuela');
INSERT INTO `tbl_provincias` VALUES ('3', 'Cartago');
INSERT INTO `tbl_provincias` VALUES ('4', 'Heredia');
INSERT INTO `tbl_provincias` VALUES ('5', 'Guanacaste');
INSERT INTO `tbl_provincias` VALUES ('6', 'Puntarenas');
INSERT INTO `tbl_provincias` VALUES ('7', 'Limon');
