<?php
return [
    "default_module"=>"home",
    "default_controller"=>'home',
    'default_action'=>"home",
    'debug'=>true,
    "auto_start"=>"true",
    'csrf_validate' => false,
    'view_suffix'  => 'html',//模板的后缀
    "default_filter"=> 'htmlspecialchars,addslashes',//默认的全局过滤配置
    // 服务器地址
    'hostname'        => 'localhost',
    // 数据库名
    'database'        => 'dun',
    // 用户名
    'username'        => 'root',
    // 密码
    'password'        => 'root',
    // 端口
    'hostport'        => '3306',
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => 'dun_',
    //加密的数据
    "app_key"         => "abc",
    'config_status' => '',
    'config_sex' => '0',
    'config_news' => '25',
    'config_gold' => '15'
];

?>