/*
 Navicat Premium Data Transfer

 Source Server         : 本地数据库
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : onlineshopping

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 07/05/2020 10:45:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `add_id` int(11) NOT NULL COMMENT '地址id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '地址',
  `receiver` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '收件人',
  `tel` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '电话',
  `post` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '邮编',
  PRIMARY KEY (`add_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate`  (
  `cate_id` int(11) NOT NULL COMMENT '分类id',
  `cate_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '分类名',
  PRIMARY KEY (`cate_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cate
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `goods_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '商品名',
  `cate_id` int(10) NULL DEFAULT NULL COMMENT '分类id',
  `brand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '品牌',
  `stock` int(11) NOT NULL COMMENT '库存',
  `is_hot` tinyint(1) NULL DEFAULT 0 COMMENT '是否热卖 0否 1是',
  `max_price` decimal(10, 2) NOT NULL COMMENT '最高价格,默认显示最高价格',
  `min_price` decimal(10, 2) NOT NULL COMMENT '最低价格',
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '描述',
  `is_rec` tinyint(1) NULL DEFAULT NULL COMMENT '是否推荐 0否 1是',
  `is_up` tinyint(1) NULL DEFAULT NULL COMMENT '是否上架 0否 1是',
  `status` tinyint(1) NULL DEFAULT 0 COMMENT '是否放入回收站 0否 1是',
  PRIMARY KEY (`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img`  (
  `img_id` int(255) NOT NULL COMMENT '图片id',
  `img_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '图片名',
  `goods_id` int(10) NULL DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`img_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of img
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `orders_id` int(10) NOT NULL COMMENT '订单Id',
  `orders_price` decimal(10, 2) NOT NULL COMMENT '订单总金额',
  `goods_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '产品id，有多个逗号分隔',
  `goods_count` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '产品数量，有多个逗号分隔',
  `user_id` int(11) NOT NULL COMMENT '用户Id',
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否已支付，0未，1已，下面同',
  `is_send` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否发送',
  `is_receive` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否收到',
  `is_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否放入回收站',
  PRIMARY KEY (`orders_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '密码',
  `tel` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '电话',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '邮箱',
  `sex` tinyint(1) NULL DEFAULT 0 COMMENT '性别 0保密 1男 2女',
  `age` int(3) NULL DEFAULT 0 COMMENT '年龄',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态 0为正常 1被禁',
  `power` tinyint(1) NOT NULL DEFAULT 0 COMMENT '权力 0普通用户 1管理员',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100003 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (100001, 'test', '202CB962AC59075B964B07152D234B70', '13012345678', '123@qq.com', 1, 1, 1, 0);
INSERT INTO `users` VALUES (100002, 'teso', '202CB962AC59075B964B07152D234B70', '13012345670', '123', NULL, NULL, 1, 0);

SET FOREIGN_KEY_CHECKS = 1;
