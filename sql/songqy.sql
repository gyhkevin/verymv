-- 创建数据库
CREATE DATABASE IF NOT EXISTS songqy;

-- 创建后台管理员表
CREATE TABLE `songqy`.`manager`( 
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`employee_id` INT(11) NOT NULL COMMENT '员工id', 
	`user_name` VARCHAR(255) NOT NULL COMMENT '用户名', 
	`password` CHAR(32) NOT NULL COMMENT '密码', 
	PRIMARY KEY (`id`) 
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci;

-- 创建员工表
CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名字',
  `department_id` tinyint(4) NOT NULL COMMENT '部门',
  `sex` enum('1','0') NOT NULL DEFAULT '1' COMMENT '性别：1男，0女',
  `phone` mediumint(11) DEFAULT NULL COMMENT '手机',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `create_time` int(11) DEFAULT NULL COMMENT '入职时间',
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '状态：1.在职，2.离职',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

-- 创建部门表
CREATE TABLE `songqy`.`department`( 
	`id` TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	PRIMARY KEY (`id`) 
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci;