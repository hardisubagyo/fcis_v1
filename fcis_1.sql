/*
 Navicat Premium Data Transfer

 Source Server         : LOCALDISLAMBANGJA
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : fcis_1

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 15/04/2019 09:02:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for flight
-- ----------------------------
DROP TABLE IF EXISTS `flight`;
CREATE TABLE `flight`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_skenario` int(11) NOT NULL,
  `callsign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay` double(10, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (2, 'Hardi Subagyo', 'hardi@gmail.com', 'f45731e3d39a1b2330bbf93e9b3de59e', '2019-04-11 03:41:55', '2019-04-11 03:41:55');
INSERT INTO `login` VALUES (3, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-04-15 01:34:45', '2019-04-15 01:34:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_04_11_030410_create_logins_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_04_11_040008_create_skenarios_table', 2);
INSERT INTO `migrations` VALUES (3, '2019_04_11_040854_create_skenarios_table', 3);
INSERT INTO `migrations` VALUES (4, '2019_04_11_043915_create_flights_table', 4);
INSERT INTO `migrations` VALUES (5, '2019_04_11_063246_create_routes_table', 5);
INSERT INTO `migrations` VALUES (6, '2019_04_11_074149_create_waypoints_table', 6);

-- ----------------------------
-- Table structure for route
-- ----------------------------
DROP TABLE IF EXISTS `route`;
CREATE TABLE `route`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_flight` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_skenario` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for scenario
-- ----------------------------
DROP TABLE IF EXISTS `scenario`;
CREATE TABLE `scenario`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for waypoint
-- ----------------------------
DROP TABLE IF EXISTS `waypoint`;
CREATE TABLE `waypoint`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `x` double(15, 8) NOT NULL,
  `y` double(15, 8) NOT NULL,
  `alt` double(15, 8) NOT NULL,
  `speed` double(15, 8) NOT NULL,
  `delay` double(15, 8) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_route` int(20) NULL DEFAULT NULL,
  `id_flight` int(11) NULL DEFAULT NULL,
  `id_skenario` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
