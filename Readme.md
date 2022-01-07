## think-token
-  轻量级,无依赖
-  支持redis/mysql token
## 安装 
```shell
composer require  wenhainan/think-token
```


## 配置要求
- PHP 5.4+
- 适用于thinkphp6
## 如果是mysql token需要先创建表
```mysql
CREATE TABLE `user_token` (
      `token` VARCHAR ( 50 ) NOT NULL COMMENT 'Token',
      `user_id` INT ( 10 ) UNSIGNED NOT NULL DEFAULT '0' COMMENT '会员ID',
      `createtime` INT ( 11 ) DEFAULT NULL COMMENT '创建时间',
      `expiretime` INT ( 11 ) DEFAULT NULL COMMENT '过期时间',
      PRIMARY KEY ( `token` ) USING BTREE
) ENGINE = INNODB DEFAULT CHARSET = utf8 COMMENT = '会员Token表';
```