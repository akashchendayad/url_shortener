/*
 Navicat MySQL Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : shorten_db

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 20/02/2022 20:16:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for url_shorten
-- ----------------------------
DROP TABLE IF EXISTS `url_shorten`;
CREATE TABLE `url_shorten`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `short_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hits` int NOT NULL,
  `added_date` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `short_key`(`short_code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of url_shorten
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
