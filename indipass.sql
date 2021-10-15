/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : indipass

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 15/10/2021 10:13:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for ncli
-- ----------------------------
DROP TABLE IF EXISTS `ncli`;
CREATE TABLE `ncli`  (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NO_TELEPON` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NO_INTERNET` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ALAMAT_VERIFIKASI` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ALAMAT_KORESPONDENSI` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NAMA_PEMILIK` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `NAMA_PIC` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `STATUS` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HP_PIC` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `EMAIL_PIC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LUP_INSERT` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_ncli`(`id`) USING BTREE,
  INDEX `idx_telp`(`NO_TELEPON`) USING BTREE,
  INDEX `idx_email`(`EMAIL_PIC`) USING BTREE,
  INDEX `idx_hp`(`HP_PIC`) USING BTREE,
  INDEX `idx_nama`(`NAMA_PEMILIK`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ncli
-- ----------------------------

-- ----------------------------
-- Table structure for sample_golongan
-- ----------------------------
DROP TABLE IF EXISTS `sample_golongan`;
CREATE TABLE `sample_golongan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `golongan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_golongan
-- ----------------------------
INSERT INTO `sample_golongan` VALUES (1, 'I-A');
INSERT INTO `sample_golongan` VALUES (2, 'I-B');
INSERT INTO `sample_golongan` VALUES (3, 'I-C');
INSERT INTO `sample_golongan` VALUES (4, 'I-D');
INSERT INTO `sample_golongan` VALUES (5, 'I-E');
INSERT INTO `sample_golongan` VALUES (6, 'I-F');
INSERT INTO `sample_golongan` VALUES (7, 'II-A');
INSERT INTO `sample_golongan` VALUES (8, 'II-B');
INSERT INTO `sample_golongan` VALUES (9, 'II-C');
INSERT INTO `sample_golongan` VALUES (10, 'II-D');
INSERT INTO `sample_golongan` VALUES (11, 'II-E');
INSERT INTO `sample_golongan` VALUES (12, 'II-F');
INSERT INTO `sample_golongan` VALUES (13, 'III-A');
INSERT INTO `sample_golongan` VALUES (14, 'III-B');
INSERT INTO `sample_golongan` VALUES (15, 'III-C');
INSERT INTO `sample_golongan` VALUES (16, 'III-D');
INSERT INTO `sample_golongan` VALUES (17, 'III-E');
INSERT INTO `sample_golongan` VALUES (18, 'III-F');

-- ----------------------------
-- Table structure for sample_grup
-- ----------------------------
DROP TABLE IF EXISTS `sample_grup`;
CREATE TABLE `sample_grup`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `grup` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `iid`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_grup
-- ----------------------------
INSERT INTO `sample_grup` VALUES (1, 'SparePart');
INSERT INTO `sample_grup` VALUES (2, 'Assets');
INSERT INTO `sample_grup` VALUES (3, 'ATK (Alat Tulis Kantor)');

-- ----------------------------
-- Table structure for sample_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `sample_jabatan`;
CREATE TABLE `sample_jabatan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_jabatan
-- ----------------------------
INSERT INTO `sample_jabatan` VALUES (1, 'Staff');
INSERT INTO `sample_jabatan` VALUES (2, 'Officer');
INSERT INTO `sample_jabatan` VALUES (3, 'Supervisor');
INSERT INTO `sample_jabatan` VALUES (4, 'Head');
INSERT INTO `sample_jabatan` VALUES (5, 'Manager');

-- ----------------------------
-- Table structure for sample_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `sample_karyawan`;
CREATE TABLE `sample_karyawan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_golongan` int NULL DEFAULT NULL,
  `id_jabatan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_karyawan
-- ----------------------------
INSERT INTO `sample_karyawan` VALUES (1, 'Dhiya', 15, 5);
INSERT INTO `sample_karyawan` VALUES (2, 'Yayat', 13, 4);
INSERT INTO `sample_karyawan` VALUES (3, 'Johanes', 12, 3);
INSERT INTO `sample_karyawan` VALUES (4, 'Daud', 8, 2);
INSERT INTO `sample_karyawan` VALUES (5, 'Togar', 8, 2);
INSERT INTO `sample_karyawan` VALUES (6, 'Eko', 4, 1);
INSERT INTO `sample_karyawan` VALUES (7, 'Yayunk', 4, 1);
INSERT INTO `sample_karyawan` VALUES (8, 'Najihul', 4, 1);

-- ----------------------------
-- Table structure for sample_subgrup
-- ----------------------------
DROP TABLE IF EXISTS `sample_subgrup`;
CREATE TABLE `sample_subgrup`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_grup` int NULL DEFAULT NULL,
  `subgrup` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_subgrup
-- ----------------------------
INSERT INTO `sample_subgrup` VALUES (1, 1, 'Mobil');
INSERT INTO `sample_subgrup` VALUES (2, 1, 'Motor');
INSERT INTO `sample_subgrup` VALUES (3, 1, 'Truck');
INSERT INTO `sample_subgrup` VALUES (4, 2, 'CPU');
INSERT INTO `sample_subgrup` VALUES (5, 2, 'Monitor');
INSERT INTO `sample_subgrup` VALUES (6, 3, 'Kertas');
INSERT INTO `sample_subgrup` VALUES (7, 3, 'Pulpen');

-- ----------------------------
-- Table structure for sample_type
-- ----------------------------
DROP TABLE IF EXISTS `sample_type`;
CREATE TABLE `sample_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_subgrup` int NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sample_type
-- ----------------------------
INSERT INTO `sample_type` VALUES (1, 1, 'Honda');
INSERT INTO `sample_type` VALUES (2, 1, 'Hyndai');
INSERT INTO `sample_type` VALUES (3, 1, 'Mitsubishi');
INSERT INTO `sample_type` VALUES (4, 2, 'Yamaha');
INSERT INTO `sample_type` VALUES (5, 2, 'Honda');
INSERT INTO `sample_type` VALUES (6, 2, 'Suzuki');
INSERT INTO `sample_type` VALUES (7, 3, 'Dyna');
INSERT INTO `sample_type` VALUES (8, 3, 'Fuso');
INSERT INTO `sample_type` VALUES (9, 4, 'Lenovo');
INSERT INTO `sample_type` VALUES (10, 4, 'Acer');
INSERT INTO `sample_type` VALUES (11, 4, 'Dell');
INSERT INTO `sample_type` VALUES (12, 5, 'Lenovo');
INSERT INTO `sample_type` VALUES (13, 5, 'Flatron');
INSERT INTO `sample_type` VALUES (14, 5, 'Acer');
INSERT INTO `sample_type` VALUES (15, 5, 'Dell');
INSERT INTO `sample_type` VALUES (16, 6, 'Kertas A3');
INSERT INTO `sample_type` VALUES (17, 6, 'Kertas A4');
INSERT INTO `sample_type` VALUES (18, 7, 'Pulpen Cair');
INSERT INTO `sample_type` VALUES (19, 7, 'Pulpen Biasa');

-- ----------------------------
-- Table structure for sms_tracking
-- ----------------------------
DROP TABLE IF EXISTS `sms_tracking`;
CREATE TABLE `sms_tracking`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sms_tracking
-- ----------------------------
INSERT INTO `sms_tracking` VALUES (1, 0);

-- ----------------------------
-- Table structure for sys_authorized
-- ----------------------------
DROP TABLE IF EXISTS `sys_authorized`;
CREATE TABLE `sys_authorized`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_level` int NULL DEFAULT NULL,
  `id_form` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `ilevel`(`id_level`, `id_form`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_authorized
-- ----------------------------
INSERT INTO `sys_authorized` VALUES (30, 1, 1);
INSERT INTO `sys_authorized` VALUES (1, 1, 2);
INSERT INTO `sys_authorized` VALUES (2, 1, 3);
INSERT INTO `sys_authorized` VALUES (3, 1, 4);
INSERT INTO `sys_authorized` VALUES (4, 1, 5);
INSERT INTO `sys_authorized` VALUES (5, 1, 6);
INSERT INTO `sys_authorized` VALUES (6, 1, 7);
INSERT INTO `sys_authorized` VALUES (7, 1, 8);
INSERT INTO `sys_authorized` VALUES (8, 1, 9);
INSERT INTO `sys_authorized` VALUES (9, 1, 10);
INSERT INTO `sys_authorized` VALUES (10, 1, 11);
INSERT INTO `sys_authorized` VALUES (11, 1, 12);
INSERT INTO `sys_authorized` VALUES (12, 1, 13);
INSERT INTO `sys_authorized` VALUES (13, 1, 14);
INSERT INTO `sys_authorized` VALUES (14, 1, 15);
INSERT INTO `sys_authorized` VALUES (15, 1, 16);
INSERT INTO `sys_authorized` VALUES (16, 1, 17);
INSERT INTO `sys_authorized` VALUES (17, 1, 18);
INSERT INTO `sys_authorized` VALUES (18, 1, 19);
INSERT INTO `sys_authorized` VALUES (19, 1, 20);
INSERT INTO `sys_authorized` VALUES (20, 1, 21);
INSERT INTO `sys_authorized` VALUES (21, 1, 22);
INSERT INTO `sys_authorized` VALUES (22, 1, 23);
INSERT INTO `sys_authorized` VALUES (23, 1, 24);
INSERT INTO `sys_authorized` VALUES (24, 1, 25);
INSERT INTO `sys_authorized` VALUES (25, 1, 26);
INSERT INTO `sys_authorized` VALUES (27, 1, 28);
INSERT INTO `sys_authorized` VALUES (28, 1, 29);
INSERT INTO `sys_authorized` VALUES (29, 1, 30);
INSERT INTO `sys_authorized` VALUES (31, 1, 31);
INSERT INTO `sys_authorized` VALUES (32, 1, 32);
INSERT INTO `sys_authorized` VALUES (33, 1, 33);
INSERT INTO `sys_authorized` VALUES (34, 1, 34);
INSERT INTO `sys_authorized` VALUES (35, 1, 35);
INSERT INTO `sys_authorized` VALUES (36, 1, 36);
INSERT INTO `sys_authorized` VALUES (37, 1, 37);
INSERT INTO `sys_authorized` VALUES (38, 1, 38);
INSERT INTO `sys_authorized` VALUES (39, 1, 39);
INSERT INTO `sys_authorized` VALUES (40, 1, 40);
INSERT INTO `sys_authorized` VALUES (41, 1, 41);
INSERT INTO `sys_authorized` VALUES (42, 1, 42);
INSERT INTO `sys_authorized` VALUES (43, 1, 43);
INSERT INTO `sys_authorized` VALUES (44, 1, 44);
INSERT INTO `sys_authorized` VALUES (45, 1, 45);
INSERT INTO `sys_authorized` VALUES (46, 1, 46);
INSERT INTO `sys_authorized` VALUES (47, 1, 47);
INSERT INTO `sys_authorized` VALUES (48, 1, 48);
INSERT INTO `sys_authorized` VALUES (49, 1, 49);
INSERT INTO `sys_authorized` VALUES (50, 1, 50);
INSERT INTO `sys_authorized` VALUES (51, 1, 51);
INSERT INTO `sys_authorized` VALUES (52, 1, 52);
INSERT INTO `sys_authorized` VALUES (53, 1, 53);
INSERT INTO `sys_authorized` VALUES (54, 1, 54);
INSERT INTO `sys_authorized` VALUES (55, 1, 55);
INSERT INTO `sys_authorized` VALUES (56, 1, 56);
INSERT INTO `sys_authorized` VALUES (57, 1, 57);
INSERT INTO `sys_authorized` VALUES (58, 1, 58);
INSERT INTO `sys_authorized` VALUES (59, 1, 59);
INSERT INTO `sys_authorized` VALUES (60, 1, 60);
INSERT INTO `sys_authorized` VALUES (61, 1, 61);
INSERT INTO `sys_authorized` VALUES (62, 1, 62);
INSERT INTO `sys_authorized` VALUES (63, 1, 63);
INSERT INTO `sys_authorized` VALUES (64, 1, 64);
INSERT INTO `sys_authorized` VALUES (65, 1, 65);
INSERT INTO `sys_authorized` VALUES (66, 1, 66);
INSERT INTO `sys_authorized` VALUES (67, 1, 67);
INSERT INTO `sys_authorized` VALUES (68, 1, 68);
INSERT INTO `sys_authorized` VALUES (69, 1, 69);
INSERT INTO `sys_authorized` VALUES (70, 1, 70);
INSERT INTO `sys_authorized` VALUES (71, 1, 71);
INSERT INTO `sys_authorized` VALUES (72, 1, 72);
INSERT INTO `sys_authorized` VALUES (73, 1, 73);
INSERT INTO `sys_authorized` VALUES (74, 1, 74);
INSERT INTO `sys_authorized` VALUES (75, 1, 75);
INSERT INTO `sys_authorized` VALUES (76, 1, 76);
INSERT INTO `sys_authorized` VALUES (77, 1, 77);
INSERT INTO `sys_authorized` VALUES (78, 1, 78);
INSERT INTO `sys_authorized` VALUES (79, 1, 79);
INSERT INTO `sys_authorized` VALUES (80, 1, 80);
INSERT INTO `sys_authorized` VALUES (81, 1, 81);
INSERT INTO `sys_authorized` VALUES (82, 1, 82);
INSERT INTO `sys_authorized` VALUES (83, 1, 83);
INSERT INTO `sys_authorized` VALUES (84, 1, 84);
INSERT INTO `sys_authorized` VALUES (85, 1, 85);
INSERT INTO `sys_authorized` VALUES (86, 1, 86);
INSERT INTO `sys_authorized` VALUES (87, 1, 87);
INSERT INTO `sys_authorized` VALUES (88, 1, 88);
INSERT INTO `sys_authorized` VALUES (89, 1, 89);
INSERT INTO `sys_authorized` VALUES (90, 1, 90);
INSERT INTO `sys_authorized` VALUES (91, 1, 91);
INSERT INTO `sys_authorized` VALUES (92, 1, 92);
INSERT INTO `sys_authorized` VALUES (93, 1, 93);
INSERT INTO `sys_authorized` VALUES (94, 1, 94);
INSERT INTO `sys_authorized` VALUES (95, 1, 95);
INSERT INTO `sys_authorized` VALUES (96, 1, 96);
INSERT INTO `sys_authorized` VALUES (97, 1, 97);
INSERT INTO `sys_authorized` VALUES (98, 1, 98);
INSERT INTO `sys_authorized` VALUES (99, 1, 99);
INSERT INTO `sys_authorized` VALUES (100, 1, 100);
INSERT INTO `sys_authorized` VALUES (101, 1, 101);
INSERT INTO `sys_authorized` VALUES (102, 1, 102);
INSERT INTO `sys_authorized` VALUES (103, 1, 103);
INSERT INTO `sys_authorized` VALUES (104, 1, 104);
INSERT INTO `sys_authorized` VALUES (105, 1, 105);
INSERT INTO `sys_authorized` VALUES (106, 1, 106);
INSERT INTO `sys_authorized` VALUES (107, 1, 107);
INSERT INTO `sys_authorized` VALUES (109, 1, 108);
INSERT INTO `sys_authorized` VALUES (112, 1, 109);
INSERT INTO `sys_authorized` VALUES (113, 1, 110);
INSERT INTO `sys_authorized` VALUES (114, 1, 111);
INSERT INTO `sys_authorized` VALUES (115, 1, 112);
INSERT INTO `sys_authorized` VALUES (116, 1, 113);
INSERT INTO `sys_authorized` VALUES (110, 3, 107);
INSERT INTO `sys_authorized` VALUES (111, 3, 108);

-- ----------------------------
-- Table structure for sys_authorized_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_authorized_menu`;
CREATE TABLE `sys_authorized_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_level` int NULL DEFAULT NULL,
  `id_menu` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_authorized_menu
-- ----------------------------
INSERT INTO `sys_authorized_menu` VALUES (1, 1, 1);
INSERT INTO `sys_authorized_menu` VALUES (2, 1, 2);
INSERT INTO `sys_authorized_menu` VALUES (3, 1, 3);
INSERT INTO `sys_authorized_menu` VALUES (4, 1, 4);
INSERT INTO `sys_authorized_menu` VALUES (5, 1, 5);
INSERT INTO `sys_authorized_menu` VALUES (6, 1, 6);
INSERT INTO `sys_authorized_menu` VALUES (8, 1, 8);
INSERT INTO `sys_authorized_menu` VALUES (12, 3, 8);
INSERT INTO `sys_authorized_menu` VALUES (13, 1, 10);
INSERT INTO `sys_authorized_menu` VALUES (14, 1, 11);
INSERT INTO `sys_authorized_menu` VALUES (15, 1, 12);
INSERT INTO `sys_authorized_menu` VALUES (16, 1, 13);
INSERT INTO `sys_authorized_menu` VALUES (18, 1, 15);
INSERT INTO `sys_authorized_menu` VALUES (19, 1, 16);

-- ----------------------------
-- Table structure for sys_bot_telegram_admin_system
-- ----------------------------
DROP TABLE IF EXISTS `sys_bot_telegram_admin_system`;
CREATE TABLE `sys_bot_telegram_admin_system`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_bot` int NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_bot_telegram_admin_system
-- ----------------------------
INSERT INTO `sys_bot_telegram_admin_system` VALUES (1, NULL, 'ADMIN 1');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (2, NULL, 'ADMIN 2');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (3, NULL, 'ADMIN 3');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (4, NULL, 'ADMIN 4');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (5, NULL, 'ADMIN 5');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (6, NULL, 'ADMIN 6');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (7, NULL, 'ADMIN 7');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (8, NULL, 'ADMIN 8');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (9, NULL, 'ADMIN 9');
INSERT INTO `sys_bot_telegram_admin_system` VALUES (10, NULL, 'ADMIN 10');

-- ----------------------------
-- Table structure for sys_bot_telegram_register
-- ----------------------------
DROP TABLE IF EXISTS `sys_bot_telegram_register`;
CREATE TABLE `sys_bot_telegram_register`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chat_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `itoken`(`token`) USING BTREE,
  INDEX `ichat`(`chat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_bot_telegram_register
-- ----------------------------

-- ----------------------------
-- Table structure for sys_bot_telegram_service
-- ----------------------------
DROP TABLE IF EXISTS `sys_bot_telegram_service`;
CREATE TABLE `sys_bot_telegram_service`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `key` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `ikey`(`key`) USING BTREE,
  INDEX `iname`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_bot_telegram_service
-- ----------------------------

-- ----------------------------
-- Table structure for sys_bot_telegram_service_cmd
-- ----------------------------
DROP TABLE IF EXISTS `sys_bot_telegram_service_cmd`;
CREATE TABLE `sys_bot_telegram_service_cmd`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descriptions` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_service` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iservice`(`id_service`) USING BTREE,
  INDEX `iname`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_bot_telegram_service_cmd
-- ----------------------------

-- ----------------------------
-- Table structure for sys_bot_telegram_webhook
-- ----------------------------
DROP TABLE IF EXISTS `sys_bot_telegram_webhook`;
CREATE TABLE `sys_bot_telegram_webhook`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_service` int NULL DEFAULT NULL,
  `id_bot` int NULL DEFAULT NULL,
  `start` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `ibot`(`id_bot`) USING BTREE,
  INDEX `iservice`(`id_service`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_bot_telegram_webhook
-- ----------------------------

-- ----------------------------
-- Table structure for sys_complite
-- ----------------------------
DROP TABLE IF EXISTS `sys_complite`;
CREATE TABLE `sys_complite`  (
  `id` int NOT NULL,
  `complite` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_complite
-- ----------------------------
INSERT INTO `sys_complite` VALUES (1, 'COMPLITE');
INSERT INTO `sys_complite` VALUES (2, 'NOT COMPLITE');
INSERT INTO `sys_complite` VALUES (3, 'FAILED');

-- ----------------------------
-- Table structure for sys_dashboard
-- ----------------------------
DROP TABLE IF EXISTS `sys_dashboard`;
CREATE TABLE `sys_dashboard`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_form` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `i_user`(`id_user`) USING BTREE,
  INDEX `i_id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dashboard
-- ----------------------------

-- ----------------------------
-- Table structure for sys_dok
-- ----------------------------
DROP TABLE IF EXISTS `sys_dok`;
CREATE TABLE `sys_dok`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dok` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `opt_status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `inmlevel`(`dok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dok
-- ----------------------------
INSERT INTO `sys_dok` VALUES (1, 'Ijazah', 1);
INSERT INTO `sys_dok` VALUES (3, 'KTP', 1);

-- ----------------------------
-- Table structure for sys_dok_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_dok_user`;
CREATE TABLE `sys_dok_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dok` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_upload` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `inmlevel`(`dok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dok_user
-- ----------------------------

-- ----------------------------
-- Table structure for sys_form
-- ----------------------------
DROP TABLE IF EXISTS `sys_form`;
CREATE TABLE `sys_form`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` char(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `form_name` char(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shortcut` int NULL DEFAULT NULL COMMENT '1=YA, 2=TIDAK\r\nAkses langsung halaman melalui exekusi kode',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `icode`(`code`) USING BTREE,
  INDEX `ilink`(`link`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 114 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_form
-- ----------------------------
INSERT INTO `sys_form` VALUES (1, '000', '#', '--NO LINK--', 1);
INSERT INTO `sys_form` VALUES (2, 'SP', 'sistem/Pengaturan', 'SISTEM : Daftar Menu Pengaturan Sistem', 1);
INSERT INTO `sys_form` VALUES (3, 'SPMM', 'sistem/Pengaturan_tampilan/menu_management', 'SISTEM : Daftar Menu Management', 1);
INSERT INTO `sys_form` VALUES (4, 'SPMM01', 'sistem/Pengaturan_tampilan/create_menu', 'SISTEM : Form Buat Menu Baru', 1);
INSERT INTO `sys_form` VALUES (5, 'SPMM02', 'sistem/Pengaturan_tampilan/create_menu_action', 'SISTEM : Action Simpan  Menu Baru', 2);
INSERT INTO `sys_form` VALUES (6, 'SPMM03', 'sistem/Pengaturan_tampilan/update_menu', 'SISTEM : Form Update Menu', 2);
INSERT INTO `sys_form` VALUES (7, 'SPMM04', 'sistem/Pengaturan_tampilan/update_action', 'SISTEM : Action Simpan Update Menu', 2);
INSERT INTO `sys_form` VALUES (8, 'SPMM05', 'sistem/Pengaturan_tampilan/delete_multiple', 'SISTEM : Action Hapus Menu', 2);
INSERT INTO `sys_form` VALUES (9, 'SPR', 'sistem/Registrasi_form', 'SISTEM : Daftar Registrasi URL', 1);
INSERT INTO `sys_form` VALUES (10, 'SPR01', 'sistem/Registrasi_form/create', 'SISTEM : Form Buat Registrasi URL Baru', 1);
INSERT INTO `sys_form` VALUES (11, 'SPR02', 'sistem/Registrasi_form/create_action', 'SISTEM : Actionl Simpan Registrasi URL Baru', 2);
INSERT INTO `sys_form` VALUES (12, 'SPR03', 'sistem/Registrasi_form/update', 'SISTEM : Form  Update Registrasi', 2);
INSERT INTO `sys_form` VALUES (13, 'SPR04', 'sistem/Registrasi_form/update_action', 'SISTEM : Action Simpan Update Registrasi', 2);
INSERT INTO `sys_form` VALUES (14, 'SPR05', 'sistem/Registrasi_form/delete_multiple', 'SISTEM : Action  Hapus Registrasi', 2);
INSERT INTO `sys_form` VALUES (15, 'SPL', 'sistem/Pengaturan_level', 'SISTEM : Daftar Level', 1);
INSERT INTO `sys_form` VALUES (16, 'SPL01', 'sistem/Pengaturan_level/create', 'SISTEM : Form  Buat Level Konfigurasi Baru', 1);
INSERT INTO `sys_form` VALUES (17, 'SPL02', 'sistem/Pengaturan_level/create_action', 'SISTEM : Action Simpan  Level Konfigurasi Baru', 2);
INSERT INTO `sys_form` VALUES (18, 'SPL03', 'sistem/Pengaturan_level/update', 'SISTEM : Form Update Level', 2);
INSERT INTO `sys_form` VALUES (19, 'SPL04', 'sistem/Pengaturan_level/update_action', 'SISTEM : Action Simpan Update Level', 2);
INSERT INTO `sys_form` VALUES (20, 'SPL05', 'sistem/Pengaturan_level/delete_multiple', 'SISTEM : Action Hapus Level', 2);
INSERT INTO `sys_form` VALUES (21, 'SPU', 'sistem/Pengaturan_pengguna', 'SISTEM : Daftar User', 1);
INSERT INTO `sys_form` VALUES (22, 'SPU01', 'sistem/Pengaturan_pengguna/create', 'SISTEM : Form Buat User Baru', 1);
INSERT INTO `sys_form` VALUES (23, 'SPU02', 'sistem/Pengaturan_pengguna/create_action', 'SISTEM : Action Simpan User Baru', 2);
INSERT INTO `sys_form` VALUES (24, 'SPU03', 'sistem/Pengaturan_pengguna/update', 'SISTEM : Form Update User', 2);
INSERT INTO `sys_form` VALUES (25, 'SPU04', 'sistem/Pengaturan_pengguna/update_action', 'SISTEM : Action Simpan Update User', 2);
INSERT INTO `sys_form` VALUES (26, 'SPU05', 'sistem/Pengaturan_pengguna/delete_multiple', 'SISTEM : Action  Hapus User', 2);
INSERT INTO `sys_form` VALUES (28, 'DSI', 'sistem/Dokumentasi/sample_icon', 'SISTEM DOKUMENTASI : Daftar Sample Icon', 1);
INSERT INTO `sys_form` VALUES (29, 'DPK', 'sistem/Dokumentasi/petunjuk_penggunaan', 'SISTEM DOKUMENTASI : Petunjuk Penggunaan', 1);
INSERT INTO `sys_form` VALUES (30, 'DSE', 'sistem/Dokumentasi/sample_element', 'SISTEM DOKUMENTASI : Sample Element', 1);
INSERT INTO `sys_form` VALUES (31, 'CRUD', 'sistem/Crud_generator', 'SISTEM : CRUD GENERATOR', 1);
INSERT INTO `sys_form` VALUES (32, 'DSED', 'sistem/Dokumentasi/sample_element_dropzone', 'SISTEM DOKUMENTASI : Sample Element Dropzone', 1);
INSERT INTO `sys_form` VALUES (33, 'DSEP', 'sistem/Dokumentasi/petunjuk_penggunaan_tahap_lanjut', 'SISTEM DOKUMENTASI : Petunjuk Penggunaan Tahap Lanjut', 1);
INSERT INTO `sys_form` VALUES (34, 'SECER', 'sistem/Keamanan/error_report', 'SISTEM KEAMANAN: Error Report', 1);
INSERT INTO `sys_form` VALUES (35, 'SECCSRF', 'sistem/Keamanan/csrf_protection', 'SISTEM KEAMANAN: CSRF Protection', 1);
INSERT INTO `sys_form` VALUES (36, 'SECINJ', 'sistem/Keamanan/monitoring_injection', 'SISTEM KEAMANAN: Monitoring Injection', 1);
INSERT INTO `sys_form` VALUES (37, 'SPU06', 'sistem/Pengaturan_pengguna/create_multiple', 'SISTEM : Form Buat User Baru From Excel', 1);
INSERT INTO `sys_form` VALUES (38, 'SPU07', 'sistem/Pengaturan_pengguna/download_template_user', 'SISTEM : Download Template User', 2);
INSERT INTO `sys_form` VALUES (39, 'STS', 'sistem/Template_system/style', 'SISTEM : Pengaturan Logo Template', 1);
INSERT INTO `sys_form` VALUES (40, 'STS01', 'sistem/Template_system/update_login_setting', 'SISTEM : Pengaturan Logo Template  - Update Logo Login', 2);
INSERT INTO `sys_form` VALUES (41, 'STS02', 'sistem/Template_system/update_template_setting', 'SISTEM : Pengaturan Logo Template  - Update Logo Template', 2);
INSERT INTO `sys_form` VALUES (42, 'DK01', 'sistem/Dokumentasi_109', 'SISTEM : Dokumentasi 1.0.9', 1);
INSERT INTO `sys_form` VALUES (43, 'DK02', 'sistem/Dokumentasi_109/general', 'SISTEM : Dokumentasi 1.0.9 - Introduce', 1);
INSERT INTO `sys_form` VALUES (44, 'DK03', 'sistem/Dokumentasi_109/system_requirtment', 'SISTEM : Dokumentasi 1.0.9 - System Reqruitment', 1);
INSERT INTO `sys_form` VALUES (45, 'DK04', 'sistem/Dokumentasi_109/pengaturan_menu', 'SISTEM : Dokumentasi 1.0.9 - Pengaturan Menu', 1);
INSERT INTO `sys_form` VALUES (46, 'DK05', 'sistem/Dokumentasi_109/pengaturan_template', 'SISTEM : Dokumentasi 1.0.9 - Pengaturan Template', 1);
INSERT INTO `sys_form` VALUES (47, 'DK06', 'sistem/Dokumentasi_109/registrasi_form', 'SISTEM : Dokumentasi 1.0.9 - Registrasi Form', 1);
INSERT INTO `sys_form` VALUES (48, 'DK07', 'sistem/Dokumentasi_109/level_konfigurasi', 'SISTEM : Dokumentasi 1.0.9 - Level Konfigurasi', 1);
INSERT INTO `sys_form` VALUES (49, 'DK08', 'sistem/Dokumentasi_109/user_konfigurasi', 'SISTEM : Dokumentasi 1.0.9 - User Konfigurasi', 1);
INSERT INTO `sys_form` VALUES (50, 'DK09', 'sistem/Dokumentasi_109/crud_generator', 'SISTEM : Dokumentasi 1.0.9 - CRUD Generator', 1);
INSERT INTO `sys_form` VALUES (51, 'DK10', 'sistem/Dokumentasi_109/error_report', 'SISTEM : Dokumentasi 1.0.9 - Error Report', 1);
INSERT INTO `sys_form` VALUES (52, 'DK11', 'sistem/Dokumentasi_109/csrf_protection', 'SISTEM : Dokumentasi 1.0.9 - CSRF Protection', 1);
INSERT INTO `sys_form` VALUES (53, 'DK12', 'sistem/Dokumentasi_109/front_end', 'SISTEM : Dokumentasi 1.0.9 - Front End', 1);
INSERT INTO `sys_form` VALUES (54, 'DK13', 'sistem/Dokumentasi_109/page_maintenance', 'SISTEM : Dokumentasi 1.0.9 - Page Maintenance', 1);
INSERT INTO `sys_form` VALUES (55, 'DK14', 'sistem/Dokumentasi_109/panduan_form', 'SISTEM : Dokumentasi 1.0.9 - Panduan Form', 1);
INSERT INTO `sys_form` VALUES (56, 'DK15', 'sistem/Dokumentasi_109/panduan_form_lanjutan', 'SISTEM : Dokumentasi 1.0.9 - Panduan Form Lanjutan', 1);
INSERT INTO `sys_form` VALUES (58, 'REGIP', 'sistem/Register_ip', 'SISTEM : Register IP', 1);
INSERT INTO `sys_form` VALUES (59, 'REGIP01', 'sistem/Register_ip/create', 'SISTEM : Register IP - Form Buat Baru', 1);
INSERT INTO `sys_form` VALUES (60, 'REGIP02', 'sistem/Register_ip/create_action', 'SISTEM : Register IP - Tombol Simpan Form Buat Baru', 2);
INSERT INTO `sys_form` VALUES (61, 'REGIP03', 'sistem/Register_ip/update', 'SISTEM : Register IP - Form Update', 2);
INSERT INTO `sys_form` VALUES (62, 'REGIP04', 'sistem/Register_ip/update_action', 'SISTEM : Register IP - Tombol Simpan Form Update', 2);
INSERT INTO `sys_form` VALUES (63, 'REGIP05', 'sistem/Register_ip/delete_multiple', 'SISTEM : Register IP - Hapus Data', 2);
INSERT INTO `sys_form` VALUES (64, 'MNTC01', 'sistem/Maintenance/maintenance_setting_list', 'SISTEM : MAINTENANCE - List Data', 1);
INSERT INTO `sys_form` VALUES (65, 'MNTC02', 'sistem/Maintenance/create', 'SISTEM : MAINTENANCE - Form Buat Baru', 1);
INSERT INTO `sys_form` VALUES (66, 'MNTC03', 'sistem/Maintenance/save_n_run', 'SISTEM : MAINTENANCE - Tombo Save n Run Form Buat Baru', 2);
INSERT INTO `sys_form` VALUES (67, 'MNTC04', 'sistem/Maintenance/download_urlkey', 'SISTEM : MAINTENANCE -  Tombol Download Key', 2);
INSERT INTO `sys_form` VALUES (68, 'MNTC05', 'sistem/Maintenance/delete_schedule', 'SISTEM : MAINTENANCE -  Delete Schedule', 2);
INSERT INTO `sys_form` VALUES (69, 'MNTC06', 'sistem/Maintenance/stop_maintenance', 'SISTEM : MAINTENANCE -  Stop Maintenance', 2);
INSERT INTO `sys_form` VALUES (70, 'SECFRN', 'sistem/Keamanan/access_front_end', 'SISTEM KEAMANAN: Access Front End', 1);
INSERT INTO `sys_form` VALUES (71, 'SECLOG', 'sistem/User_Log', 'SISTEM KEAMANAN: Login Activity', 1);
INSERT INTO `sys_form` VALUES (72, 'SECLOG01', 'sistem/User_Log/detail', 'SISTEM KEAMANAN: Login Activity - Detail', 2);
INSERT INTO `sys_form` VALUES (73, 'SECLOG02', 'sistem/User_Log/delete_multiple', 'SISTEM KEAMANAN: Login Activity - Hapus Log', 2);
INSERT INTO `sys_form` VALUES (74, 'DK16', 'sistem/Dokumentasi_109/panduan_upload_file', 'SISTEM : Dokumentasi 1.0.9 - Panduan Upload File', 1);
INSERT INTO `sys_form` VALUES (75, 'CRUD01', 'sistem/Crud_generator/generator_form', 'SISTEM : CRUD GENERATOR - Tombol Generate Form', 2);
INSERT INTO `sys_form` VALUES (76, 'BOTTEL01', 'sistem/Bot_Telegram', 'SISTEM : BOT TELEGRAM - Menu Manager', 1);
INSERT INTO `sys_form` VALUES (77, 'BOTTEL02', 'sistem/Bot_Telegram/Register_Bot', 'SISTEM : BOT TELEGRAM - List Bot', 1);
INSERT INTO `sys_form` VALUES (78, 'BOTTLE03', 'sistem/Bot_Telegram/create', 'SISTEM : BOT TELEGRAM - Form Register Bot', 1);
INSERT INTO `sys_form` VALUES (79, 'BOTTLE04', 'sistem/Bot_Telegram/create_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan Form Register Bot', 2);
INSERT INTO `sys_form` VALUES (80, 'BOTTLE05', 'sistem/Bot_Telegram/delete_multiple', 'SISTEM : BOT TELEGRAM - Delete Register Bot', 2);
INSERT INTO `sys_form` VALUES (81, 'BOTTLE06', 'sistem/Bot_Telegram_Admin', 'SISTEM : BOT TELEGRAM - List Bot Admin', 1);
INSERT INTO `sys_form` VALUES (82, 'BOTTLE07', 'sistem/Bot_Telegram_Admin/update', 'SISTEM : BOT TELEGRAM - Form Update Bot Admin', 2);
INSERT INTO `sys_form` VALUES (83, 'BOTTLE08', 'sistem/Bot_Telegram_Admin/update_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan Form Update Bot Admin', 2);
INSERT INTO `sys_form` VALUES (84, 'BOTTLE09', 'sistem/Bot_Telegram_Service', 'SISTEM : BOT TELEGRAM - List Service', 1);
INSERT INTO `sys_form` VALUES (85, 'BOTTLE10', 'sistem/Bot_Telegram_Service/create', 'SISTEM : BOT TELEGRAM - From Create Service', 1);
INSERT INTO `sys_form` VALUES (86, 'BOTTLE11', 'sistem/Bot_Telegram_Service/create_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan From Create Service', 2);
INSERT INTO `sys_form` VALUES (87, 'BOTTLE12', 'sistem/Bot_Telegram_Service/update', 'SISTEM : BOT TELEGRAM - From Update Service', 2);
INSERT INTO `sys_form` VALUES (88, 'BOTTLE13', 'sistem/Bot_Telegram_Service/update_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan From Update Service', 2);
INSERT INTO `sys_form` VALUES (89, 'BOTTLE14', 'sistem/Bot_Telegram_Service/delete_multiple', 'SISTEM : BOT TELEGRAM - Delete Service', 2);
INSERT INTO `sys_form` VALUES (90, 'BOTTLE15', 'sistem/Bot_Telegram_Service_CMD', 'SISTEM : BOT TELEGRAM - List Command', 1);
INSERT INTO `sys_form` VALUES (91, 'BOTTLE16', 'sistem/Bot_Telegram_Service_CMD/create', 'SISTEM : BOT TELEGRAM - From Create Command', 1);
INSERT INTO `sys_form` VALUES (92, 'BOTTLE17', 'sistem/Bot_Telegram_Service_CMD/create_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan From Create Command', 2);
INSERT INTO `sys_form` VALUES (93, 'BOTTLE18', 'sistem/Bot_Telegram_Service_CMD/update', 'SISTEM : BOT TELEGRAM - From Update Command', 2);
INSERT INTO `sys_form` VALUES (94, 'BOTTLE19', 'sistem/Bot_Telegram_Service_CMD/update_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan From Update Command', 2);
INSERT INTO `sys_form` VALUES (95, 'BOTTLE20', 'sistem/Bot_Telegram_Service_CMD/test_output', 'SISTEM : BOT TELEGRAM - Test Output Command', 2);
INSERT INTO `sys_form` VALUES (96, 'BOTTLE21', 'sistem/Bot_Telegram_WebHook', 'SISTEM : BOT TELEGRAM - List WebHook', 1);
INSERT INTO `sys_form` VALUES (97, 'BOTTLE22', 'sistem/Bot_Telegram_WebHook/create', 'SISTEM : BOT TELEGRAM - Form Create WebHook', 1);
INSERT INTO `sys_form` VALUES (98, 'BOTTLE23', 'sistem/Bot_Telegram_WebHook/create_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan Form Create WebHook', 2);
INSERT INTO `sys_form` VALUES (99, 'BOTTLE24', 'sistem/Bot_Telegram_WebHook/update', 'SISTEM : BOT TELEGRAM - Form Update WebHook', 2);
INSERT INTO `sys_form` VALUES (100, 'BOTTLE25', 'sistem/Bot_Telegram_WebHook/update_action', 'SISTEM : BOT TELEGRAM - Tombol Simpan Form Update WebHook', 2);
INSERT INTO `sys_form` VALUES (101, 'BOTTLE26', 'sistem/Bot_Telegram_WebHook/delete_multiple', 'SISTEM : BOT TELEGRAM - Delete  WebHook', 2);
INSERT INTO `sys_form` VALUES (102, 'BOTTLE27', 'sistem/Bot_Telegram_WebHook/start_stop_service', 'SISTEM : BOT TELEGRAM - Start Stop Service WebHook', 2);
INSERT INTO `sys_form` VALUES (103, 'BOTTEL28', 'sistem/Bot_Telegram_WebHook/send_command', 'SISTEM : BOT TELEGRAM - Send Command', 2);
INSERT INTO `sys_form` VALUES (104, 'DK17', 'sistem/Dokumentasi_109/bot_telegram', 'SISTEM : Dokumentasi 1.0.9 - Bot Telegram', 1);
INSERT INTO `sys_form` VALUES (105, 'DK18', 'sistem/Dokumentasi_109/create_bot_telegram', 'SISTEM : Dokumentasi 1.0.9 - Bot Telegram #2', 1);
INSERT INTO `sys_form` VALUES (106, 'Recruitmen', 'Rekruitment/Rekruitment', 'Recruitment', 1);
INSERT INTO `sys_form` VALUES (107, 'update_pro', 'Rekruitment/Rekruitment/update', 'update_profile', 1);
INSERT INTO `sys_form` VALUES (108, 'upload_dok', 'Rekruitment/Rekruitment/detail', 'upload_dokument', 1);
INSERT INTO `sys_form` VALUES (109, 'report', 'Report/Report', 'report', 1);
INSERT INTO `sys_form` VALUES (110, 'Dashboard', 'Dashboard/Dashboard', 'Dashboard', 1);
INSERT INTO `sys_form` VALUES (111, 'report_mer', 'Report/Report/reprot_merchant', 'report_merchant', 1);
INSERT INTO `sys_form` VALUES (112, 'trx_point', 'Transaction_point_new/Transaction_point_new', 'Transaction Poin', 1);
INSERT INTO `sys_form` VALUES (113, 'voucher_ma', 'T_mgtvoucher/T_mgtvoucher', 'voucher_management', 1);

-- ----------------------------
-- Table structure for sys_level
-- ----------------------------
DROP TABLE IF EXISTS `sys_level`;
CREATE TABLE `sys_level`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nmlevel` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `opt_status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `inmlevel`(`nmlevel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_level
-- ----------------------------
INSERT INTO `sys_level` VALUES (1, 'Configurator', 1);
INSERT INTO `sys_level` VALUES (3, 'Recruitment', 1);

-- ----------------------------
-- Table structure for sys_maintenance_ip
-- ----------------------------
DROP TABLE IF EXISTS `sys_maintenance_ip`;
CREATE TABLE `sys_maintenance_ip`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_maintenance_ip
-- ----------------------------

-- ----------------------------
-- Table structure for sys_maintenance_mode
-- ----------------------------
DROP TABLE IF EXISTS `sys_maintenance_mode`;
CREATE TABLE `sys_maintenance_mode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `mode` int NULL DEFAULT NULL COMMENT '0 = Disable maintenance,\r\n1 = Enable Maintenance',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_maintenance_mode
-- ----------------------------
INSERT INTO `sys_maintenance_mode` VALUES (1, 0);

-- ----------------------------
-- Table structure for sys_maintenance_schedule
-- ----------------------------
DROP TABLE IF EXISTS `sys_maintenance_schedule`;
CREATE TABLE `sys_maintenance_schedule`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `start` int NULL DEFAULT NULL,
  `desc` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `actual_finish` int NULL DEFAULT NULL,
  `days` int NULL DEFAULT NULL,
  `hours` int NULL DEFAULT NULL,
  `minutes` int NULL DEFAULT NULL,
  `key` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_maintenance_schedule
-- ----------------------------

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_form` int NULL DEFAULT NULL,
  `name` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_parent` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iname`(`name`) USING BTREE,
  INDEX `iparent`(`is_parent`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES (1, 1, 'Pengaturan', 'fe fe-box', 0);
INSERT INTO `sys_menu` VALUES (6, 2, 'Sistem', 'fe fe-activity', 1);
INSERT INTO `sys_menu` VALUES (8, 107, 'Profile', 'fa fa-user-o', 0);
INSERT INTO `sys_menu` VALUES (10, 109, 'Report', 'fe fe-activity', 0);
INSERT INTO `sys_menu` VALUES (11, 110, 'Dashboard', 'fe fe-airplay', 0);
INSERT INTO `sys_menu` VALUES (12, 111, 'Report Merhant', 'fe fe-airplay', 10);
INSERT INTO `sys_menu` VALUES (13, 109, 'Report Transaction', 'fe fe-activity', 10);
INSERT INTO `sys_menu` VALUES (15, 112, 'Transaction Poin', 'fe fe-activity', 0);
INSERT INTO `sys_menu` VALUES (16, 113, 'VMS', 'fe fe-airplay', 0);

-- ----------------------------
-- Table structure for sys_show
-- ----------------------------
DROP TABLE IF EXISTS `sys_show`;
CREATE TABLE `sys_show`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `show` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ishow`(`show`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_show
-- ----------------------------
INSERT INTO `sys_show` VALUES (2, 'TIDAK');
INSERT INTO `sys_show` VALUES (1, 'YA');

-- ----------------------------
-- Table structure for sys_status
-- ----------------------------
DROP TABLE IF EXISTS `sys_status`;
CREATE TABLE `sys_status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `istatus`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_status
-- ----------------------------
INSERT INTO `sys_status` VALUES (1, 'AKTIF');
INSERT INTO `sys_status` VALUES (2, 'NON AKTIF');

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nmuser` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `passuser` char(100) CHARACTER SET latin1 COLLATE latin1_bin NULL DEFAULT NULL,
  `opt_level` int NULL DEFAULT NULL COMMENT '1=admin',
  `opt_status` int NULL DEFAULT NULL COMMENT '0=nonaktif,1=aktif, 2 = delete',
  `picture` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `inmuser`(`nmuser`) USING BTREE,
  INDEX `ilevel`(`opt_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_general_cs ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES (1, 'administrator', '64be7986b632435c109b6a07b4106d36', 1, 1, 'default.png', NULL, NULL, NULL, NULL);
INSERT INTO `sys_user` VALUES (3, 'ahmadsadikin8888@gmail.com', '64be7986b632435c109b6a07b4106d36', 3, 1, 'default.png', 'asdasd', '89667760226', 'Ahmad Sadikin', 'ahmadsadikin8888@gmail.com');

-- ----------------------------
-- Table structure for sys_user_log_accessuri
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_log_accessuri`;
CREATE TABLE `sys_user_log_accessuri`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_login` int NULL DEFAULT NULL,
  `url_access` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `type_request` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `os_access` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ip_address_access` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time_access` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iid_login`(`id_login`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_log_accessuri
-- ----------------------------
INSERT INTO `sys_user_log_accessuri` VALUES (1, 2420, 'http://localhost/indipass/report/', 'get', 'Windows 10', '::1', 1617180817);
INSERT INTO `sys_user_log_accessuri` VALUES (2, 2420, 'http://localhost/indipass/report/', 'get', 'Windows 10', '::1', 1617180817);
INSERT INTO `sys_user_log_accessuri` VALUES (3, 2420, 'http://localhost/indipass/report/auth', 'post', 'Windows 10', '::1', 1617180819);
INSERT INTO `sys_user_log_accessuri` VALUES (4, 48, 'http://localhost/indipass/report/Home', 'get', 'Windows 10', '::1', 1617180819);
INSERT INTO `sys_user_log_accessuri` VALUES (5, 48, 'http://localhost/indipass/report/Report/Report', 'get', 'Windows 10', '::1', 1617180842);
INSERT INTO `sys_user_log_accessuri` VALUES (6, 48, 'http://localhost/indipass/report/Report/Report', 'get', 'Windows 10', '::1', 1617182905);
INSERT INTO `sys_user_log_accessuri` VALUES (7, 49, 'http://localhost/indipass/report/Home', 'get', 'Windows 10', '::1', 1623259497);
INSERT INTO `sys_user_log_accessuri` VALUES (8, 49, 'http://localhost/indipass/report/sistem/Pengaturan', 'get', 'Windows 10', '::1', 1623259516);
INSERT INTO `sys_user_log_accessuri` VALUES (9, 49, 'http://localhost/indipass/report/sistem/Registrasi_form', 'get', 'Windows 10', '::1', 1623259518);
INSERT INTO `sys_user_log_accessuri` VALUES (10, 49, 'http://localhost/indipass/report/sistem/Registrasi_form/create', 'get', 'Windows 10', '::1', 1623259520);
INSERT INTO `sys_user_log_accessuri` VALUES (11, 49, 'http://localhost/indipass/report/sistem/Registrasi_form/get_file/f023e21041f5cd66cfe56f21f66cf9f3', 'get', 'Windows 10', '::1', 1623259522);
INSERT INTO `sys_user_log_accessuri` VALUES (12, 49, 'http://localhost/indipass/report/sistem/Registrasi_form/getfunction/f023e21041f5cd66cfe56f21f66cf9f3', 'get', 'Windows 10', '::1', 1623259523);
INSERT INTO `sys_user_log_accessuri` VALUES (13, 49, 'http://localhost/indipass/report/sistem/Registrasi_form/create_action', 'post', 'Windows 10', '::1', 1623259536);
INSERT INTO `sys_user_log_accessuri` VALUES (14, 49, 'http://localhost/indipass/report/sistem/Pengaturan', 'get', 'Windows 10', '::1', 1623259538);
INSERT INTO `sys_user_log_accessuri` VALUES (15, 49, 'http://localhost/indipass/report/sistem/Pengaturan_tampilan/menu_management', 'get', 'Windows 10', '::1', 1623259540);
INSERT INTO `sys_user_log_accessuri` VALUES (16, 49, 'http://localhost/indipass/report/sistem/Pengaturan_tampilan/refresh_table_menu/f023e21041f5cd66cfe56f21f66cf9f3', 'post', 'Windows 10', '::1', 1623259540);
INSERT INTO `sys_user_log_accessuri` VALUES (17, 49, 'http://localhost/indipass/report/sistem/Pengaturan_tampilan/create_menu', 'get', 'Windows 10', '::1', 1623259542);
INSERT INTO `sys_user_log_accessuri` VALUES (18, 49, 'http://localhost/indipass/report/sistem/Pengaturan_tampilan/create_menu_action', 'post', 'Windows 10', '::1', 1623259553);
INSERT INTO `sys_user_log_accessuri` VALUES (19, 49, 'http://localhost/indipass/report/home', 'get', 'Windows 10', '::1', 1623259554);
INSERT INTO `sys_user_log_accessuri` VALUES (20, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher', 'get', 'Windows 10', '::1', 1623259557);
INSERT INTO `sys_user_log_accessuri` VALUES (21, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623259565);
INSERT INTO `sys_user_log_accessuri` VALUES (22, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623259567);
INSERT INTO `sys_user_log_accessuri` VALUES (23, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher', 'get', 'Windows 10', '::1', 1623259571);
INSERT INTO `sys_user_log_accessuri` VALUES (24, 49, 'http://localhost/indipass/report/sistem/Pengaturan', 'get', 'Windows 10', '::1', 1623259573);
INSERT INTO `sys_user_log_accessuri` VALUES (25, 49, 'http://localhost/indipass/report/sistem/Keamanan/error_report', 'get', 'Windows 10', '::1', 1623259581);
INSERT INTO `sys_user_log_accessuri` VALUES (26, 49, 'http://localhost/indipass/report/sistem/keamanan/toggled_error_report', 'post', 'Windows 10', '::1', 1623259584);
INSERT INTO `sys_user_log_accessuri` VALUES (27, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher', 'get', 'Windows 10', '::1', 1623259585);
INSERT INTO `sys_user_log_accessuri` VALUES (28, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623259587);
INSERT INTO `sys_user_log_accessuri` VALUES (29, 49, 'http://localhost/indipass/report/sistem/keamanan/toggled_error_report', 'post', 'Windows 10', '::1', 1623259605);
INSERT INTO `sys_user_log_accessuri` VALUES (30, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher', 'get', 'Windows 10', '::1', 1623260214);
INSERT INTO `sys_user_log_accessuri` VALUES (31, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623260217);
INSERT INTO `sys_user_log_accessuri` VALUES (32, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623260268);
INSERT INTO `sys_user_log_accessuri` VALUES (33, 49, 'http://localhost/indipass/report/T_mgtvoucher/T_mgtvoucher/create', 'get', 'Windows 10', '::1', 1623260323);
INSERT INTO `sys_user_log_accessuri` VALUES (34, 50, 'http://localhost/indipass/report/Home', 'get', 'Windows 10', '::1', 1627872364);
INSERT INTO `sys_user_log_accessuri` VALUES (35, 50, 'http://localhost/indipass/report/Report/Report', 'get', 'Windows 10', '::1', 1627872368);
INSERT INTO `sys_user_log_accessuri` VALUES (36, 50, 'http://localhost/indipass/report/Report/Report', 'get', 'Windows 10', '::1', 1627872384);
INSERT INTO `sys_user_log_accessuri` VALUES (37, 50, 'http://localhost/indipass/report/sistem/Pengaturan', 'get', 'Windows 10', '::1', 1627879000);

-- ----------------------------
-- Table structure for sys_user_log_login
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_log_login`;
CREATE TABLE `sys_user_log_login`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `login_time` int NULL DEFAULT NULL,
  `logout_time` int NULL DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `browser` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `os` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iuser`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_log_login
-- ----------------------------
INSERT INTO `sys_user_log_login` VALUES (1, 1, 1611031904, 1611190578, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (2, 1, 1611190578, 1611192299, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (3, 1, 1611192325, 1611194238, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (4, 1, 1611194238, 1611194691, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (5, 1, 1611194918, 1611194930, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (6, 1, 1611277585, 1611277863, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (7, 1, 1611278140, 1611278391, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (8, 1, 1611672543, 1611703854, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (9, 1, 1611703854, 1611704879, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (10, 1, 1611704879, 1611876315, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (11, 1, 1611876315, 1611886584, '::1', 'Chrome 87.0.4280.141', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (12, 1, 1611886584, 1612493128, '::1', 'Chrome 88.0.4324.104', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (13, 1, 1612493128, 1612507568, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (14, 1, 1612507568, 1612518853, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (15, 1, 1612518853, 1612715176, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (16, 1, 1612715176, 1612749241, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (17, 1, 1612749241, 1612750446, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (18, 1, 1612750448, 1612750492, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (19, 3, 1612750518, 1612751672, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (20, 1, 1612751694, 1612751985, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (21, 1, 1612751988, 1612751991, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (22, 3, 1612751998, 1612752062, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (23, 1, 1612752067, 1612752228, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (24, 3, 1612752233, 1612754061, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (25, 3, 1612754295, 1612754300, '::1', 'Chrome 88.0.4324.146', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (26, 1, 1614184108, 1614212443, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (27, 1, 1614212443, 1614240454, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (28, 1, 1614240459, 1614250722, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (29, 1, 1614250795, 1614250798, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (30, 1, 1614250806, 1614250818, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (31, 1, 1614250878, 1614251281, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (32, 1, 1614251281, 1614251297, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (33, 1, 1614251324, 1614251327, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (34, 1, 1614258163, 1614300767, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (35, 1, 1614300767, 1614305602, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (36, 1, 1614305602, 1614307015, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (37, 1, 1614307015, 1614320169, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (38, 1, 1614320169, 1614391840, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (39, 1, 1614391840, 1614555102, '::1', 'Chrome 88.0.4324.182', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (40, 1, 1614555102, 1614581162, '::1', 'Chrome 88.0.4324.190', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (41, 1, 1614581162, 1614611594, '::1', 'Chrome 88.0.4324.190', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (42, 1, 1614611594, 1614698653, '::1', 'Chrome 88.0.4324.190', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (43, 1, 1614698653, 1614822213, '::1', 'Chrome 88.0.4324.190', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (44, 1, 1614822213, 1615890032, '::1', 'Chrome 88.0.4324.190', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (45, 1, 1615890032, 1615910779, '::1', 'Chrome 89.0.4389.82', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (46, 1, 1615910779, 1615950585, '::1', 'Chrome 89.0.4389.82', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (47, 1, 1615950585, 1617180819, '::1', 'Chrome 89.0.4389.82', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (48, 1, 1617180819, 1623259497, '::1', 'Chrome 89.0.4389.90', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (49, 1, 1623259497, 1627872364, '::1', 'Chrome 91.0.4472.77', 'Windows 10');
INSERT INTO `sys_user_log_login` VALUES (50, 1, 1627872364, NULL, '::1', 'Chrome 92.0.4515.107', 'Windows 10');

-- ----------------------------
-- Table structure for sys_user_upload
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_upload`;
CREATE TABLE `sys_user_upload`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `file_path` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orig_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ext` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iuser`(`id_user`, `time`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iex`(`id_user`, `ext`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_upload
-- ----------------------------

-- ----------------------------
-- Table structure for sys_user_upload_temp
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_upload_temp`;
CREATE TABLE `sys_user_upload_temp`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `file_path` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `orig_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ext` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `iuser`(`id_user`, `time`) USING BTREE,
  INDEX `iid`(`id`) USING BTREE,
  INDEX `iex`(`id_user`, `ext`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user_upload_temp
-- ----------------------------
INSERT INTO `sys_user_upload_temp` VALUES (3, 1, './upload_files/none/', '1614251272.png', 'a8a55d5628e101d506834214e6c04e80.png', '.png', '1614251293');

-- ----------------------------
-- Table structure for sys_userlogin
-- ----------------------------
DROP TABLE IF EXISTS `sys_userlogin`;
CREATE TABLE `sys_userlogin`  (
  `iduser` int NOT NULL,
  `tokenserial` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `login_time` char(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`) USING BTREE,
  INDEX `iiduser`(`iduser`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_userlogin
-- ----------------------------
INSERT INTO `sys_userlogin` VALUES (1, '8ec3b76793025cb0af5b7906690aaac0', '1627872364');
INSERT INTO `sys_userlogin` VALUES (3, 'e0133e71ace3fce40003dac585a39aea', '1612754295');

-- ----------------------------
-- Table structure for t_channel_payment
-- ----------------------------
DROP TABLE IF EXISTS `t_channel_payment`;
CREATE TABLE `t_channel_payment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_channel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori_payment` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_channel_payment
-- ----------------------------
INSERT INTO `t_channel_payment` VALUES (1, 'BRI', 'BANK');
INSERT INTO `t_channel_payment` VALUES (2, 'BNI', 'BANK');
INSERT INTO `t_channel_payment` VALUES (3, 'OVO', 'EPAYMENT');
INSERT INTO `t_channel_payment` VALUES (4, 'DANA', 'EPAYMENT');
INSERT INTO `t_channel_payment` VALUES (5, 'LINK AJA', 'EPAYMENT');

-- ----------------------------
-- Table structure for t_mgtvoucher
-- ----------------------------
DROP TABLE IF EXISTS `t_mgtvoucher`;
CREATE TABLE `t_mgtvoucher`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_voucher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `channel_payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_cashback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `percent_cashback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal_cashback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `max_nominal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `start_datelive` datetime(0) NULL DEFAULT NULL,
  `end_datelive` datetime(0) NULL DEFAULT NULL,
  `wording` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_voucher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_mgtvoucher
-- ----------------------------
INSERT INTO `t_mgtvoucher` VALUES (1, 'Voucher 10%', 'BNI', 'cashback', 'prepaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', 'asdfasdf', NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (2, 'Voucher 15%', 'BNI', 'cashback', 'postpaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', NULL, NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (3, 'Voucher 20%', 'BRI', 'cashback', 'prepaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', NULL, NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (4, 'Voucher 25%', 'BRI', 'cashback', 'postpaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', NULL, NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (5, 'Voucher 30%', 'OVO', 'cashback', 'prepaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', NULL, NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (6, 'Voucher 35%', 'OVO', 'cashback', 'postpaid', '10%', NULL, '10000', '2021-06-07 13:45:03', '2021-06-08 13:45:09', NULL, NULL, NULL, NULL);
INSERT INTO `t_mgtvoucher` VALUES (7, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);
INSERT INTO `t_mgtvoucher` VALUES (8, '', NULL, NULL, '1', '1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);
INSERT INTO `t_mgtvoucher` VALUES (9, '', NULL, NULL, '1', '1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);
INSERT INTO `t_mgtvoucher` VALUES (10, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);
INSERT INTO `t_mgtvoucher` VALUES (11, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);
INSERT INTO `t_mgtvoucher` VALUES (12, 'nm_1623060236.jpg', '0,1', '0,1', '1', '1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL);

-- ----------------------------
-- Table structure for transaction_point_new
-- ----------------------------
DROP TABLE IF EXISTS `transaction_point_new`;
CREATE TABLE `transaction_point_new`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_point` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `realname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trx_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `invoice` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ncli` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_id` int NOT NULL,
  `merchant_id` int NULL DEFAULT NULL,
  `redeem_key` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `point_id` int NOT NULL,
  `price` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` datetime(0) NOT NULL,
  `update_time` datetime(0) NOT NULL,
  `expired_time` datetime(0) NOT NULL,
  `used_time` datetime(0) NULL DEFAULT NULL,
  `used_merchant` datetime(0) NULL DEFAULT NULL,
  `kode_merchant` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `used_status` int NULL DEFAULT 0,
  `msisdn` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nd` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `use_otp` int NULL DEFAULT NULL,
  `product_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_price` int NULL DEFAULT NULL,
  `slcs_data_response` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slcs_update_time` datetime(0) NULL DEFAULT NULL,
  `use_exp` int NOT NULL DEFAULT 0,
  `myihx` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `trx_id`(`trx_id`, `ncli`) USING BTREE,
  INDEX `admin_id`(`admin_id`) USING BTREE,
  INDEX `user_id`(`ncli`) USING BTREE,
  INDEX `point_id`(`point_id`) USING BTREE,
  INDEX `trxid`(`trx_id`) USING BTREE,
  INDEX `use_time`(`used_time`) USING BTREE,
  INDEX `msisdn`(`msisdn`, `use_otp`) USING BTREE,
  INDEX `use_exp`(`use_exp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of transaction_point_new
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
