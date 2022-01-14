## think-token
-  轻量级,无依赖
-  支持redis/mysql token
## 安装 
```shell
composer require  wenhainan/think-token
```
- 安装后会自动生成，config/token.php配置文件
- 自行配置下，主要参数如下
```
<?php
/**
 * auther by wenhainan
 * email  whndeweilai@163.com
 * QQ     610176732
 * nickname  阿修罗
 */
// +----------------------------------------------------------------------
// | Token设置 这个不能删除
// +----------------------------------------------------------------------
return [
    // 驱动方式 Mysql redis
    'type'     => 'redis',
    // 缓存前缀  这个可以自定义
    'key'      => '5LiH5LqL5aaC5oSP',
    // 加密方式  如果你不懂这个不要修改，保持默认即可
    'hashalgo' => 'ripemd160',
    //启用redis token必填 用于连接redis
    'redis'=>[
        'host'        => '127.0.0.1',
        'port'        => 6379,
        'password'    => '',
        'select'      => 0,
        'timeout'     => 0,
        'persistent'  => false,
        'userprefix'  => 'up:',
        'tokenprefix' => 'tp:',
    ],
    // 启用mysql token必填 用于连接mysql
    'mysql'=>[
        //token存储表
        'table'      => 'user_token',
        //如果是用系统的数据库，默认不用填,保持注释状态即可
        //'connection' => [],
    ]
];
```


## 如何使用
```php
        use think\wenhainan\Token;
        use think\wenhainan\tool\Random;
        //例如 redis-token 使用
        $token = Random::build('alpha',50);
        //设置信息
        $uid = 15;  //用户uid
        $expire_time = 60*30; //过期时间
        Token::set($token,$uid,$expire_time);
        //获取信息
        $info = Token::get($token);
```

## 配置要求
- PHP 5.4+
- 适用于thinkphp6
## 如果是mysql token需要先创建表  
- 注意 如果你的数据库设置了前缀，要加上前缀哦  比如 pre_user_token
```mysql
CREATE TABLE `user_token` (
      `token` VARCHAR ( 50 ) NOT NULL COMMENT 'Token',
      `user_id` INT ( 10 ) UNSIGNED NOT NULL DEFAULT '0' COMMENT '会员ID',
      `createtime` INT ( 11 ) DEFAULT NULL COMMENT '创建时间',
      `expiretime` INT ( 11 ) DEFAULT NULL COMMENT '过期时间',
      PRIMARY KEY ( `token` ) USING BTREE
) ENGINE = INNODB DEFAULT CHARSET = utf8 COMMENT = '会员Token表';
```