/*
 Navicat Premium Data Transfer

 Source Server         : Brian
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : 127.0.0.1:3306
 Source Schema         : student

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 19/08/2021 18:20:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for student_data
-- ----------------------------
DROP TABLE IF EXISTS `student_data`;
CREATE TABLE `student_data`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `1st_grade` int(10) NULL DEFAULT NULL,
  `2st_grade` int(10) NULL DEFAULT NULL,
  `3st_grade` int(10) NULL DEFAULT NULL,
  `4st_grade` int(10) NULL DEFAULT NULL,
  `sc_board` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_data
-- ----------------------------
INSERT INTO `student_data` VALUES (1, 'Jone', 8, 3, 2, NULL, 0);
INSERT INTO `student_data` VALUES (2, 'Tom', 8, 9, 4, 3, 0);
INSERT INTO `student_data` VALUES (3, 'Andrei', 10, NULL, NULL, NULL, 1);
INSERT INTO `student_data` VALUES (4, 'Nishan', 3, 2, 8, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
