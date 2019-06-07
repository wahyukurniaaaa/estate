/*
 Navicat Premium Data Transfer

 Source Server         : local mysql
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : estate

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 07/06/2019 09:19:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_about_us
-- ----------------------------
DROP TABLE IF EXISTS `tbl_about_us`;
CREATE TABLE `tbl_about_us`  (
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_about` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_about`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_about_us
-- ----------------------------
INSERT INTO `tbl_about_us` VALUES ('Sekilas Tentang Ciputat Residence', '<p>Ciputat Residence One adalah proyek pertama yang mulai dikembangkan oleh Ciputra Residence pada tahun 1984 sampai saat ini. Dahulu Ciputat Residence dikenal dengan nama Citra Garden atau Perumahan Citra. Hingga saat ini Ciputat Residence sudah memiliki beberapa proyek Citra, yakni Citra 1, Citra 1 Ext, Citra 2, Citra 2 Ext, Citra 3, Citra 3 Ext, Citra 5, Citra 6, Citra 7, Citra 7 Ext, dan Aeroworld8.</p>\r\n\r\n<p>Ciputat Residence merupakan perumahan yang ditujukan bagi masyarakat menengah ke atas. Proyek ini memiliki keunggulan lokasi yang berjarak hanya 15 km dari pusat kota serta dilengkapi dengan berbagai fasilitas komersil dan rekreasi yang komprehensif bagi penghuni dan penduduk sekitarnya. Saat ini, Ciputat Residence One telah semakin berkembang sebagai kota mandiri yang terintegrasi dengan total luas pengembangan 450.9 ha. Ciputat Residence One telah membangun sekitar 10.000 unit rumah dengan tingkat hunian mencapai 90%.</p>', 'image_5cf4e8fa36e1d.jpg', 1);

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`  (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES (0, 'Wawan Setiawan', NULL, NULL);
INSERT INTO `tbl_admin` VALUES (2, 'Wahwah', NULL, NULL);
INSERT INTO `tbl_admin` VALUES (3, 'Wawan Setiawan', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for tbl_contact_us
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contact_us`;
CREATE TABLE `tbl_contact_us`  (
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_contact` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_contact`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_contact_us
-- ----------------------------
INSERT INTO `tbl_contact_us` VALUES ('<h2>Hubungi Wahyu Kurnia kalau ada apa - apa</h2>\r\n\r\n<p>HP : 087883003209</p>\r\n\r\n<p>Instagram : papamwk</p>', 1);

-- ----------------------------
-- Table structure for tbl_highlight
-- ----------------------------
DROP TABLE IF EXISTS `tbl_highlight`;
CREATE TABLE `tbl_highlight`  (
  `id_highlight` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_highlight`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_highlight
-- ----------------------------
INSERT INTO `tbl_highlight` VALUES (2, 'Luxury Summer House', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>', 'image_5cf5f88cd5e53.jpg');
INSERT INTO `tbl_highlight` VALUES (3, 'Flinders Street Station', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>', 'image_5cf5f8a50f095.jpg');
INSERT INTO `tbl_highlight` VALUES (4, 'Milwaukee Summer House', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>', 'image_5cf5f8b8667a7.jpg');
INSERT INTO `tbl_highlight` VALUES (5, 'Rancangan Rumah', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus</p>', 'image_5cf5ff3139e18.jpg');

-- ----------------------------
-- Table structure for tbl_house_type
-- ----------------------------
DROP TABLE IF EXISTS `tbl_house_type`;
CREATE TABLE `tbl_house_type`  (
  `id_type` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_house_type
-- ----------------------------
INSERT INTO `tbl_house_type` VALUES (1, 'bbbbb', '<p>aaaaa</p>', 'image_5cf4d280a0893.jpg', 'dfasdfsd');

-- ----------------------------
-- Table structure for tbl_map_location
-- ----------------------------
DROP TABLE IF EXISTS `tbl_map_location`;
CREATE TABLE `tbl_map_location`  (
  `id_location` int(2) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_location`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_map_location
-- ----------------------------
INSERT INTO `tbl_map_location` VALUES (1, 'image_5cf4e52d9898b.jpg', 'dfsdf', '<p>dfsdf</p>');

-- ----------------------------
-- Table structure for tbl_post
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post`  (
  `id_post` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `post_date` date NULL DEFAULT NULL,
  `is_active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_by` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_post`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_post
-- ----------------------------
INSERT INTO `tbl_post` VALUES (6, 'Plant Trees While Searching The Web', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus</p>', '2019-06-12', '1', 'Wawan Setiawan', 'image_5cf605a423d5c.jpg');
INSERT INTO `tbl_post` VALUES (7, 'Plant Trees While Searching The Web', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>', '2019-06-20', '1', 'Wawan Setiawan', 'image_5cf605d072337.jpg');
INSERT INTO `tbl_post` VALUES (8, 'Plant Trees While Searching The Web', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.</p>', '2019-06-04', '1', 'Wawan Setiawan', 'image_5cf605fe880d9.jpg');

-- ----------------------------
-- Table structure for tbl_progress
-- ----------------------------
DROP TABLE IF EXISTS `tbl_progress`;
CREATE TABLE `tbl_progress`  (
  `id_progress` int(3) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_progress`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_site_plan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_site_plan`;
CREATE TABLE `tbl_site_plan`  (
  `id_plan` int(2) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_plan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_site_plan
-- ----------------------------
INSERT INTO `tbl_site_plan` VALUES (1, 'image_5cbb09a016834.jpg', 'tes', '<p>fdsf</p>');

-- ----------------------------
-- Table structure for tbl_slider
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE `tbl_slider`  (
  `id_slider` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_slider`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_slider
-- ----------------------------
INSERT INTO `tbl_slider` VALUES (2, 'Dream House Architecture Studio', 'Modern Houses', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet fa', 'image_5cf6014873002.jpg');
INSERT INTO `tbl_slider` VALUES (3, 'Modern Summer House', 'Summer House', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet fa', 'image_5cf6018ba7855.jpg');
INSERT INTO `tbl_slider` VALUES (4, 'Luxury Residence Here', 'Luxury House', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum mattis velit, sit amet fa', 'image_5cf601b912d5e.jpg');

-- ----------------------------
-- Table structure for tbl_specification
-- ----------------------------
DROP TABLE IF EXISTS `tbl_specification`;
CREATE TABLE `tbl_specification`  (
  `id_spec` int(2) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_spec`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_specification
-- ----------------------------
INSERT INTO `tbl_specification` VALUES (1, '<h2>Tipe 36</h2>\r\n\r\n<ul>\r\n <li>Pondasi = Rolak batu bata.</li>\r\n <li>Struktur = Beton bertulang.</li>\r\n <li>Dinding = Bata merah finishing plester aci dan cat.</li>\r\n <li>Lantai = Full keramik.</li>\r\n <li>Atap = Atap spandek rangka kayu.</li>\r\n <li>Kusen = kusen meranti atau setara.</li>\r\n <li>Pintu = Panel (pintu kamar triplek, pintu kamar mandi alumunium).</li>\r\n <li>Jendela = Rangka kayu (Kaca 5mm).</li>\r\n <li>Plafond = triplek rangka kayu.</li>\r\n <li>Sanitary = Closet jongkok, bak fiber, kran besi.</li>\r\n <li>Listrik = PLN 1300 watt.</li>\r\n <li>Air = PAM</li>\r\n</ul>');

SET FOREIGN_KEY_CHECKS = 1;
