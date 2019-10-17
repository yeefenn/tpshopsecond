<?php
/* Smarty version 3.1.33, created on 2019-09-03 12:36:41
  from 'D:\tpself\application\admin\view\home\home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6e5e5983b7b6_89725936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9cb2bd8193f4790f5222e1aac95f55d7318110c' => 
    array (
      0 => 'D:\\tpself\\application\\admin\\view\\home\\home.html',
      1 => 1567413800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6e5e5983b7b6_89725936 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    用户名称:<input type="text" name="admin_name" id="" placeholder="请输入用户名"><br>
    用户密码:<input type="password" name="admin_pwd" id="" placeholder="请输入密码"><br>
    验证码:<input type="text" name="code" id="" placeholder="请输入验证码">
    <img src="<?php echo url('code');?>
" alt=""><br>
    <input type="submit" value="登录">
</form>
</body>
</html><?php }
}
