<?php
/* Smarty version 3.1.33, created on 2019-09-17 03:53:34
  from 'D:\QUES\application\admin\view\login\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8058beb2fc58_19643507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb216a1c77d1c6d829e2a4c689958b65a00900e6' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\login\\login.html',
      1 => 1567699116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8058beb2fc58_19643507 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo resource();?>
admin/Css/login.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/login.js"><?php echo '</script'; ?>
>

    <title></title>
</head>
<body>
<div id="divBox">
    <form action="" method="POST" id="login">
        <input type="text" id="userName" name="admin_name"/>
        <input type="password" id="psd" name="admin_pwd"/>
        <input type="" value="" id="verify" name="code"/>
        <input type="submit" id="sub" value=""/>
        <img src="<?php echo url('code');?>
" id="verify_img" />
    </form>
    <div class="four_bj">

        <p class="f_lt"></p>
        <p class="f_rt"></p>
        <p class="f_lb"></p>
        <p class="f_rb"></p>
    </div>

    <ul id="peo">

    </ul>
    <ul id="psd">

    </ul>
    <ul id="ver">

    </ul>
</div>
<!--[if IE 6]>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/iepng.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    DD_belatedPNG.fix('form','background');
<?php echo '</script'; ?>
>
<![endif]-->
</body>
</html>
<?php }
}
