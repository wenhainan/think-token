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
        'expire'      => 0,
        'persistent'  => false,
        'userprefix'  => 'up:',
        'tokenprefix' => 'tp:',
    ],
    // 启用mysql token必填 用于连接mysql
    'mysql'=>[
        //token存储表
        'table'      => 'user_token',
        //如果是用系统的数据库，默认不用填
        'connection' => [],
    ]
];