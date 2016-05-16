/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : songqy

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-15 23:57:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `attendance`
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `salary_level` int(11) NOT NULL,
  `salary_pay` int(11) NOT NULL,
  `other_pay` int(11) NOT NULL,
  `real_pay` int(11) NOT NULL,
  `remark` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES ('1', '1', '5000', '4500', '300', '4800', '阿萨德把看病的金卡', '2');
INSERT INTO `attendance` VALUES ('2', '1', '5000', '4500', '300', '4800', '阿萨德把看病的金卡', '1');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `string` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', '市场部', '0', '', '');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名字',
  `department_id` tinyint(4) NOT NULL COMMENT '部门',
  `sex` enum('1','0') NOT NULL DEFAULT '1' COMMENT '性别：1男，0女',
  `phone` bigint(20) DEFAULT NULL COMMENT '手机',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `create_time` int(11) DEFAULT NULL COMMENT '入职时间',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '状态：1.在职，2.离职',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'cloud', '1', '1', '13564003116', '0', '1463171549', '1');

-- ----------------------------
-- Table structure for `manager`
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL COMMENT '员工id',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', '0', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for `recruit`
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
CREATE TABLE `recruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_sub` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sex` tinyint(2) NOT NULL,
  `limit_year` tinyint(2) NOT NULL,
  `limit_old` tinyint(2) NOT NULL,
  `salary_level` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `title_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------
INSERT INTO `recruit` VALUES ('1', '程序员', 'php相关', '1', '1', '20', '20', '5000', '3', '0', '啥都快乐哈可怜回到家看哈看机会的尽快哈家客户的即可很快拉黑的快乐哈卡洛斯的很快会尽快刘德华');
INSERT INTO `recruit` VALUES ('2', '程序员', 'php相关', '1', '0', '20', '20', '5000', '3', '0', '啥都快乐哈可怜回到家看哈看机会的尽快哈家客户的即可很快拉黑的快乐哈卡洛斯的很快会尽快刘德华');

-- ----------------------------
-- Table structure for `training`
-- ----------------------------
DROP TABLE IF EXISTS `training`;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lecturer` varchar(100) NOT NULL,
  `budget` int(11) NOT NULL,
  `attend_number` int(11) NOT NULL,
  `attend_person` varchar(255) NOT NULL,
  `attend_address` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of training
-- ----------------------------
INSERT INTO `training` VALUES ('1', '仗剑独行', 'cloud', '1200', '20', '程序员', '吴中路', '1', '阿萨德噶看得见哈空间的环境看');
