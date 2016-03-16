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
CREATE TABLE `songqy`.`employee`( 
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(30) NOT NULL, 
	`department_id` TINYINT(4) NOT NULL,
	`birthday` INT(11), 
	PRIMARY KEY (`id`) 
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci;

-- 创建部门表
CREATE TABLE `songqy`.`department`( 
	`id` TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(255) NOT NULL, 
	PRIMARY KEY (`id`) 
) ENGINE=MYISAM CHARSET=utf8 COLLATE=utf8_general_ci;