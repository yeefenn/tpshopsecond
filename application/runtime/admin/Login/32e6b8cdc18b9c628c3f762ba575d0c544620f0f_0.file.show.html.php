<?php
/* Smarty version 3.1.33, created on 2019-09-17 03:53:56
  from 'D:\QUES\application\admin\view\login\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8058d477ff34_55617886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32e6b8cdc18b9c628c3f762ba575d0c544620f0f' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\login\\show.html',
      1 => 1567732955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8058d477ff34_55617886 (Smarty_Internal_Template $_smarty_tpl) {
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>HD问答后台首页</title>
    <link rel="stylesheet" href="<?php echo resource();?>
admin/css/admin.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/admin.js"><?php echo '</script'; ?>
>
    <!-- 默认打开目标 -->
    <base target="iframe"/>
</head>
<body>
<!-- 头部 -->
<div id="top_box">
    <div id="top">
        <p id="top_font">HD问答管理后台 （V1.1）</p>
        <ul id="menu2" class="menu">
            <li>
                <a href="">前台首页</a>
            </li>
            <li><a href="">查看栏目</a></li>
            <li><a href="">用户列表</a></li>
            <li><a href="<?php echo url('config/home');?>
">网站配置</a></li>
        </ul>
    </div>
    <div class="top_bar">
        <p class="adm">
            <span>超级</span>
            管理员：
            <span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
            <span class="adm_people">[houdunwang]</span>
        </p>
        <p class="now_time">
            今天是：2014-9-4
            星期三 |
            您的当前位置是：
            <span>首页</span>
        </p>
        <p class="out">
            <span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
            <a href="" target="_self">退出</a>
        </p>
    </div>
</div>
<!-- 左侧菜单 -->
<div id="left_box">
    <p class="use">常用菜单</p>

    <div class="menu_box">
        <h2>用户管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">用户的列表</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="menu_box">
        <h2>问题管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">所有的问题</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">待解决问题</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">已解决问题</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">无回答问题</a>
                </li>
            </ul>
        </div>
    </div>



    <div class="menu_box">
        <h2>回答管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">所有的回答</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href="" class="pos">未采纳回答</a></li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href="" class="pos">已采纳回答</a></li>
            </ul>
        </div>
    </div>

    <div class="menu_box">
        <h2>问题分类</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href="<?php echo url('cate/show');?>
" class="pos">问题分类列表</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href="<?php echo url('cate/add');?>
" class="pos">添加分类</a></li>
            </ul>
        </div>
    </div>

    <div class="menu_box">
        <h2>奖励管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href="" class="pos">金币奖励规则</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href="" class="pos">经验级别规则</a></li>
            </ul>
        </div>
    </div>

    <div class="menu_box">
        <h2>系统管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u">
                    <a href=""  class="pos">系统信息</a>
                </li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href=""  class="pos">修改密码</a></li>
            </ul>

            <ul class="con">
                <li class="nav_u"><a href=""  class="pos">网站配置</a></li>
            </ul>
        </div>
    </div>
    <div class="menu_box">
        <h2>后台用户管理</h2>
        <div class="text">
            <ul class="con">
                <li class="nav_u"><a href=""  class="pos">用户列表</a></li>
            </ul>
            <ul class="con">
                <li class="nav_u"><a href=""  class="pos">添加用户</a></li>
            </ul>
        </div>
    </div>

</div>
<!-- 右侧 -->
<div id="right">
    <iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo url("welcome");?>
">

    </iframe>
</div>
<!-- 底部 -->
<div id="foot_box">
    <div class="foot">
        <p>@Copyright © 2013-2013 MZY.com All Rights Reserved. 京ICP备0000000号</p>
    </div>
</div>
<!--[if IE 6]>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/iepng.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
<?php echo '</script'; ?>
>
<![endif]-->
</body>
</html>
</body>
</html><?php }
}