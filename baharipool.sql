/*
 Navicat Premium Data Transfer

 Source Server         : local_konek
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : baharipool

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 08/02/2022 11:01:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_comment`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (7, 'TKT20220203064510 - Remaja');

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id_hasil` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `jumlah` decimal(32, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil`) USING BTREE,
  INDEX `fk_order`(`id_order`) USING BTREE,
  CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (1, 8, '2022-02-03', 7000);
INSERT INTO `hasil` VALUES (2, 9, '2022-02-02', 120000);
INSERT INTO `hasil` VALUES (3, NULL, '2022-02-03', 12000);

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis`  (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `jenis_tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES (1, 'Anak Kecil');
INSERT INTO `jenis` VALUES (2, 'Remaja');
INSERT INTO `jenis` VALUES (3, 'Dewasa');
INSERT INTO `jenis` VALUES (4, 'Siswa Sekolah');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `id_comment` int NULL DEFAULT NULL,
  `nama_pembeli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_tiket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `harga` decimal(32, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  INDEX `fk_koment`(`id_comment`) USING BTREE,
  CONSTRAINT `fk_koment` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (8, NULL, 'Rizki', 'TIKET anak Kecil', '2022-02-04', 1, 7000);
INSERT INTO `order` VALUES (9, 7, 'Budi', 'Tiket Remaja', '2022-02-04', 10, 120000);

-- ----------------------------
-- Table structure for tiket
-- ----------------------------
DROP TABLE IF EXISTS `tiket`;
CREATE TABLE `tiket`  (
  `id_tiket` int NOT NULL AUTO_INCREMENT,
  `id_jenis` int NULL DEFAULT NULL,
  `id_comment` int NULL DEFAULT NULL,
  `nama_tiket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` decimal(32, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tiket`) USING BTREE,
  INDEX `fk_jenis`(`id_jenis`) USING BTREE,
  INDEX `fk_comment`(`id_comment`) USING BTREE,
  CONSTRAINT `fk_comment` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO `tiket` VALUES (96, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (97, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (98, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (99, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (100, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (101, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (102, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (103, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (104, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (105, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (106, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (107, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (108, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (109, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (110, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (111, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (112, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (113, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (114, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (115, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (116, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (117, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (118, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (119, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (120, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (121, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (122, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (123, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (124, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (125, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (126, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (127, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (128, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (129, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (130, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (131, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (132, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (133, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (134, 2, 7, 'Tiket Masuk Remaja', 12000);
INSERT INTO `tiket` VALUES (135, 2, 7, 'Tiket Masuk Remaja', 12000);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sandi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- View structure for vworder
-- ----------------------------
DROP VIEW IF EXISTS `vworder`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vworder` AS SELECT
	`order`.id_order, 
	`order`.nama_pembeli, 
	`order`.tanggal, 
	`order`.jumlah, 
	`order`.harga AS hatot, 
	`order`.nama_tiket
FROM
	`order` ;

-- ----------------------------
-- View structure for vwtiket
-- ----------------------------
DROP VIEW IF EXISTS `vwtiket`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwtiket` AS SELECT
	tiket.id_tiket, 
	tiket.id_jenis, 
	tiket.id_comment, 
	tiket.nama_tiket, 
	tiket.harga, 
	`comment`.`comment`, 
	jenis.jenis_tempat
FROM
	`comment`
	INNER JOIN
	tiket
	ON 
		`comment`.id_comment = tiket.id_comment
	INNER JOIN
	jenis
	ON 
		tiket.id_jenis = jenis.id_jenis ;

SET FOREIGN_KEY_CHECKS = 1;
