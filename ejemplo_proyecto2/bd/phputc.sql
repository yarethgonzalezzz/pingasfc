/*
Navicat MySQL Data Transfer

Source Server         : CONEXION2C2023
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : phputc

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2023-08-06 16:27:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_alumnos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_alumnos`;
CREATE TABLE `tbl_alumnos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `cedula` int NOT NULL,
  `nombre` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `codigocurso` int NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_alumnos
-- ----------------------------
INSERT INTO `tbl_alumnos` VALUES ('3', '4456', 'Laura', 'laura@gmail.com', '2');
INSERT INTO `tbl_alumnos` VALUES ('4', '5646', 'Pedro', 'pedro@gmail.com', '3');
INSERT INTO `tbl_alumnos` VALUES ('10', '123', 'ANA', 'ana@gmail.com', '1');
INSERT INTO `tbl_alumnos` VALUES ('11', '48787', 'Emily', 'emily@gmail.com', '2');

-- ----------------------------
-- Table structure for `tbl_carreras`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_carreras`;
CREATE TABLE `tbl_carreras` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `carrera` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_carreras
-- ----------------------------
INSERT INTO `tbl_carreras` VALUES ('1', 'Ingenieria de Sistemas', 'Carrera Ciencias Naturales');
INSERT INTO `tbl_carreras` VALUES ('2', 'Administración de Empresas', 'Carrera Administración');

-- ----------------------------
-- Table structure for `tbl_cursos`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cursos`;
CREATE TABLE `tbl_cursos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `codigocarrera` int NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_cursos
-- ----------------------------
INSERT INTO `tbl_cursos` VALUES ('1', 'Programación', 'Primer Cuatrimestre', '1');
INSERT INTO `tbl_cursos` VALUES ('2', 'Matematicas', 'Primer Cuatrimestre', '1');
INSERT INTO `tbl_cursos` VALUES ('3', 'Contabilidad', 'Tercer Cuatrimestre', '2');
INSERT INTO `tbl_cursos` VALUES ('4', 'ad', 'Segundo Cuatrimestre', '2');
INSERT INTO `tbl_cursos` VALUES ('5', 'Estadisticas', 'Estadistica para administradores', '2');
INSERT INTO `tbl_cursos` VALUES ('6', '', '', '1');

-- ----------------------------
-- Table structure for `tbl_informacion`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_informacion`;
CREATE TABLE `tbl_informacion` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `cedula` int NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `codigoprovincia` int DEFAULT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- ----------------------------
-- Records of tbl_informacion
-- ----------------------------
INSERT INTO `tbl_informacion` VALUES ('1', '789', 'Laura', '4', ' Hola');

-- ----------------------------
-- Table structure for `tbl_provincia`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_provincia`;
CREATE TABLE `tbl_provincia` (
  `codigo` int NOT NULL,
  `provincia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_provincia
-- ----------------------------
INSERT INTO `tbl_provincia` VALUES ('1', 'Ssan Jose');
INSERT INTO `tbl_provincia` VALUES ('2', 'Alajuela');
INSERT INTO `tbl_provincia` VALUES ('3', 'Cartago');
INSERT INTO `tbl_provincia` VALUES ('4', 'Heredia');
INSERT INTO `tbl_provincia` VALUES ('5', 'Guanacaste');
INSERT INTO `tbl_provincia` VALUES ('6', 'Puntarenas');
INSERT INTO `tbl_provincia` VALUES ('7', 'Limón');
