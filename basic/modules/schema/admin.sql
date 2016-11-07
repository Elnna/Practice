DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE IF NOT EXISTS `shop_admin`(
	`admin_id` INT(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT '主键ID',
	`admin_user` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
	`admin_password` CHAR(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
	`admin_email` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '管理员电子邮箱',
	`login_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登录时间',
	`login_ip` BIGINT NOT NULL DEFAULT '0' COMMENT '登录IP',
	`create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
	`modified_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
	PRIMARY KEY(`admin_id`),
	UNIQUE shop_admin_admin_user_admin_password(`admin_user`,`admin_password`),
	UNIQUE shop_admin_admin_user_admin_email(`admin_user`,`admin_email`)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- INSERT INTO `shop_admin`(`admin_user`,`admin_email`,`admin_password`,`create_time`,`modified_time`) VALUES('admin','grahamhuang@126.com',md5('admin123'),UNIX_TIMESTAMP(),UNIX_TIMESTAMP());
INSERT INTO `shop_admin`(`admin_user`,`admin_email`,`admin_password`,`create_time`,`modified_time`) VALUES('admin','grahamhuang@126.com',md5('admin123'),CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);