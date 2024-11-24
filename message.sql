/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : message

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2024-11-20 01:39:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mess
-- ----------------------------
DROP TABLE IF EXISTS `mess`;
CREATE TABLE `mess` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `state` int(1) NOT NULL DEFAULT '2',
  `back` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mess
-- ----------------------------
INSERT INTO `mess` VALUES ('74', 'admin', '欢迎！来到留言板，请留言哦', '2024-11-20 01:23', '2', '30925755');
INSERT INTO `mess` VALUES ('75', 'admin', '哈哈哈哈哈哈', '2024-11-20 01:23', '2', '91714910');
INSERT INTO `mess` VALUES ('76', 'admin', 'Hello World', '2024-11-20 01:24', '2', '84238069');
INSERT INTO `mess` VALUES ('77', 'admin', '太高级了', '2024-11-20 01:24', '2', '80547963');
INSERT INTO `mess` VALUES ('81', 'admin', 'HHHH', '2024-11-20 01:25', '2', '25631682');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '5');
INSERT INTO `users` VALUES ('2', '123456', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `users` VALUES ('3', '123', '202cb962ac59075b964b07152d234b70', '1');
