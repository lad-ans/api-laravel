/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : indiqueganhedb

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 14/12/2022 13:43:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for estabelecimentos
-- ----------------------------
DROP TABLE IF EXISTS `estabelecimentos`;
CREATE TABLE `estabelecimentos`  (
  `PK_ESTABELECIMENTO_ETIG` int(11) NOT NULL AUTO_INCREMENT,
  `DS_NOME_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_IMAGEM_URL_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_BIO_ETIG` text COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_IMAGEM_COVER_URL_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_TERMO_ACEITACAO_ETIG` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_PORTBANCO_ETIG` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_HOSTBANCO_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_NOMEBANCO_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_USERBANCO_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DS_SENHABANCO_ETIG` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DT_CADASTRO_ETIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_ESTABELECIMENTO_ETIG`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `PK_USUARIO_USIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_ESTABELECIMENTO_USIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_EMAIL_USIG` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_TELEFONE_USIG` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_CELULAR_USIG` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_LOGIN_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_SENHA_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NR_PONTOS_USIG` int(11) NULL DEFAULT NULL,
  `DT_CADASTRO_USIG` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`PK_USUARIO_USIG`) USING BTREE,
  INDEX `fk_estabelecimento_esig`(`FK_ESTABELECIMENTO_USIG`) USING BTREE,
  CONSTRAINT `fk_estabelecimento_esig` FOREIGN KEY (`FK_ESTABELECIMENTO_USIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios_sistema
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_sistema`;
CREATE TABLE `usuarios_sistema`  (
  `PK_USUARIO_SISTEMA_USIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_ESTABELECIMENTO_USIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_EMAIL_USIG` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_TELEFONE_USIG` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_CELULAR_USIG` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_LOGIN_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_SENHA_USIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NR_PONTOS_USIG` int(11) NULL DEFAULT NULL,
  `DT_CADASTRO_USIG` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`PK_USUARIO_SISTEMA_USIG`) USING BTREE,
  INDEX `fk_estabelecimento_usig`(`FK_ESTABELECIMENTO_USIG`) USING BTREE,
  CONSTRAINT `fk_estabelecimento_usig` FOREIGN KEY (`FK_ESTABELECIMENTO_USIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
-- ----------------------------
-- Table structure for indicacoes_aguardando
-- ----------------------------
DROP TABLE IF EXISTS `indicacoes_aguardando`;
CREATE TABLE `indicacoes_aguardando`  (
  `PK_INDICACAO_AGUARDANDO_IAIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIO_IAIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_IAIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_IAIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_CELULAR_IAIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DT_INDICACAO_IAIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_INDICACAO_AGUARDANDO_IAIG`) USING BTREE,
  INDEX `fk_usuario_iaig`(`FK_USUARIO_IAIG`) USING BTREE,
  INDEX `fk_estabelecimento_iaig`(`FK_ESTABELECIMENTO_IAIG`) USING BTREE,
  CONSTRAINT `fk_usuario_iaig` FOREIGN KEY (`FK_USUARIO_IAIG`) REFERENCES `usuarios` (`PK_USUARIO_USIG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estabelecimento_iaig` FOREIGN KEY (`FK_ESTABELECIMENTO_IAIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for indicacoes_json
-- ----------------------------
DROP TABLE IF EXISTS `indicacoes_json`;
CREATE TABLE `indicacoes_json`  (
  `PK_INDICACAO_JSON_IJIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIO_IJIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_IJIG` int(11) NULL DEFAULT NULL,
  `TX_JSON_IJIG` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `DT_INDICACAO_IJIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_INDICACAO_JSON_IJIG`) USING BTREE,
  INDEX `fk_usuarios_ijig`(`FK_USUARIO_IJIG`) USING BTREE,
  INDEX `fk_estabelecimento_ijig`(`FK_ESTABELECIMENTO_IJIG`) USING BTREE,
  CONSTRAINT `fk_usuarios_ijig` FOREIGN KEY (`FK_USUARIO_IJIG`) REFERENCES `usuarios` (`PK_USUARIO_USIG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estabelecimento_ijig` FOREIGN KEY (`FK_ESTABELECIMENTO_IJIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for indicacoes_sem_sucesso
-- ----------------------------
DROP TABLE IF EXISTS `indicacoes_sem_sucesso`;
CREATE TABLE `indicacoes_sem_sucesso`  (
  `PK_INDICACAO_SEM_SUCESSO_IXIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIO_IXIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_IXIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_IXIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_CELULAR_IXIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DT_INDICACAO_IXIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_INDICACAO_SEM_SUCESSO_IXIG`) USING BTREE,
  INDEX `fk_usuario_ixig`(`FK_USUARIO_IXIG`) USING BTREE,
  INDEX `fk_estabelecimento_ixig`(`FK_ESTABELECIMENTO_IXIG`) USING BTREE,
  CONSTRAINT `fk_usuario_ixig` FOREIGN KEY (`FK_USUARIO_IXIG`) REFERENCES `usuarios` (`PK_USUARIO_USIG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estabelecimento_ixig` FOREIGN KEY (`FK_ESTABELECIMENTO_IXIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for indicacoes_sucesso
-- ----------------------------
DROP TABLE IF EXISTS `indicacoes_sucesso`;
CREATE TABLE `indicacoes_sucesso`  (
  `PK_INDICACAO_SUCESSO_ISIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIO_ISIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_ISIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_ISIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_CELULAR_ISIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DT_INDICACAO_ISIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_INDICACAO_SUCESSO_ISIG`) USING BTREE,
  INDEX `fk_usuario_isig`(`FK_USUARIO_ISIG`) USING BTREE,
  INDEX `fk_estabelecimento_isig`(`FK_ESTABELECIMENTO_ISIG`) USING BTREE,
  CONSTRAINT `fk_estabelecimento_isig` FOREIGN KEY (`FK_ESTABELECIMENTO_ISIG`) REFERENCES `estabelecimentos` (`PK_ESTABELECIMENTO_ETIG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_isig` FOREIGN KEY (`FK_USUARIO_ISIG`) REFERENCES `usuarios` (`PK_USUARIO_USIG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `PK_PRODUTO_PRIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_ESTABELECIMENTO_PRIG` int(11) NULL DEFAULT NULL,
  `DS_NOME_PRIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DS_DESCRICAO_PRIG` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NR_QTD_ESTOQUE_PRIG` int(11) NULL DEFAULT NULL,
  `VL_PRODUTO_PRIG` float(10, 2) NULL DEFAULT NULL,
  `ST_STATUS_PRIG` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'A',
  `DT_CADASTRO_PRIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_PRODUTO_PRIG`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resgates
-- ----------------------------
DROP TABLE IF EXISTS `resgates`;
CREATE TABLE `resgates`  (
  `PK_RESGATE_RGIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USUARIO_RGIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_RGIG` int(11) NULL DEFAULT NULL,
  `NR_PONTOS_RGIG` int(10) NOT NULL,
  `DS_STATUS_RGIG` varchar(10) NOT NULL,
  PRIMARY KEY (`PK_RESGATE_RGIG`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resgates_premios
-- ----------------------------
DROP TABLE IF EXISTS `resgates_premios`;
CREATE TABLE `resgates_premios`  (
  `PK_RESGATE_PREMIOS_RPIG` int(11) NOT NULL AUTO_INCREMENT,
  `FK_PRODUTO_RPIG` int(11) NULL DEFAULT NULL,
  `FK_USUARIO_RPIG` int(11) NULL DEFAULT NULL,
  `FK_ESTABELECIMENTO_RPIG` int(11) NULL DEFAULT NULL,
  `DS_PREMIO_RPIG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DT_PREMIACAO_RPIG` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`PK_RESGATE_PREMIOS_RPIG`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;
