## think-token
-  轻量级,无依赖
-  支持redis/mysql token
## 安装 
```shell
composer require  wenhainan/think-token
```
## 如何使用
```php
        //例如 redis-token 使用
        $token = Random::build('alpha',50);
        $token = new RedisToken();
        //设置信息
        $uid = 15;  //用户uid
        $expire_time = 60*30; //过期时间
        $token->set($token,$uid,$expire_time);
        //获取信息
        $info = $token->get($token);
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