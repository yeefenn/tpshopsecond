<?php
/* Smarty version 3.1.33, created on 2019-09-21 01:11:29
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\login\login_do.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8578c1484022_15004412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9df4dddb6578cdd337e6a73b2c5a485b249dba84' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\login\\login_do.html',
      1 => 1569028266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8578c1484022_15004412 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>后盾问答</title>
    <meta name="keywords" content="后盾问答"/>
    <meta name="description" content="后盾问答"/>
    <link rel="stylesheet" href="<?php echo resource();?>
index/Css/common.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
index/Js/jquery-1.7.2.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
index/Js/top-bar.js'><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo resource();?>
index/Css/index.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
index/Js/index.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
index/Js/validate.js'><?php echo '</script'; ?>
>
</head>
<body>
<!-- top -->
<div id='login' class=''>
    <div class='login-title'>
        <p>欢迎您登录后盾问答</p>
        <a href="" title='关闭' class='close-window'></a>
    </div>
    <div class='login-form'>
<!--        <span id='login-msg'></span>-->
        <!-- 登录FORM -->
        <form action="" method='post' name='login'>
            <ul>
                <li>
                    <label for="login-acc">账号</label>
                    <input type="text" name='user_account' class='input' id='login-acc' placeholder="手机号或邮箱"/>
                    <span id='login-msg'></span>
                </li>
                <li>
                    <label for="login-pwd">密码</label>
                    <input type="password" name='user_pwd' class='input' id='login-pwd' placeholder="6-20个字符:字母、数字或下划线 _"/>
                    <span id='home-msg' style="color: red"></span>
                </li>
                <li>
                    <label for="login-verify">验证码</label>
                    <input type="text" name='code' id='login-verify'/>
                    <span id='code-msg' style="color: red"></span>
                    <span style="display: inline-block;padding: 3px;border: 1px solid #ccc;border-radius: 5px;cursor: pointer" class="sendCode"  >发送验证码</span>
                </li>
                <li class='login-auto'>
                    <label for="auto-login">
                        <input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;下一次自动登录
                    </label>
                    <a href="" id='regis-now'>注册新账号</a>
                </li>
                <li>
                    <input type="submit" value='' id='login-btn'/>
                </li>
            </ul>
        </form>
    </div>
</div>

</body>
</html>
<!-- 底部结束 -->


<?php }
}
