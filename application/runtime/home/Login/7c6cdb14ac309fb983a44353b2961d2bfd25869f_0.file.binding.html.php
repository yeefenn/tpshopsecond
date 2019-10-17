<?php
/* Smarty version 3.1.33, created on 2019-09-21 02:59:09
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\login\binding.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8591fd511d46_34162159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c6cdb14ac309fb983a44353b2961d2bfd25869f' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\login\\binding.html',
      1 => 1569034748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8591fd511d46_34162159 (Smarty_Internal_Template $_smarty_tpl) {
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
<center>
<div id='login' class=''>
    <div class='login-title'>
        <p>欢迎您注册后盾问答</p >
<!--        <a href="" title='关闭' class='close-window'></a >-->
    </div>
    <div class='login-form'>

        <!-- 登录FORM -->
        <form action="<?php echo url('login/binding');?>
" method='post' name='login'>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" name="user_name">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_face']->value;?>
" name="user_face">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
" name="openid">
            <ul>
                <li>
                    <label for="login-acc">账号</label>
                    <input type="text" name='user_account' class='input' id='login-acc'/>
                    <span id='login-msg'></span>
                </li>
                <li>
                    <label for="login-verify">验证码</label>
                    <input type="text" name='code' id='login-verify'/>
                    <span id='code-msg' style="color: red"></span>
                    <span style="display: inline-block;padding: 3px;border: 1px solid #ccc;border-radius: 5px;cursor: pointer" class="sendCode"  >发送验证码</span>
                </li>

                <li>
                    <input type="submit" value='确认绑定' />
                </li>
            </ul>
        </form>
    </div>
</div>
</center>

</body>
</html>
<!-- 底部结束 -->


<?php }
}
