<?php
/* Smarty version 3.1.33, created on 2019-09-18 09:35:20
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\login\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d81fa58ec1638_89947123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c01a4cca4cf4e0d989e9414838609db45b38afad' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\login\\login.html',
      1 => 1568799311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d81fa58ec1638_89947123 (Smarty_Internal_Template $_smarty_tpl) {
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
<div id='top-fixed'>
    <div id='top-bar'>
        <ul class="top-bar-left fl">
            <li><a href="http://www.houdunwang.com" target='_blank'>后盾顶尖后盾PHP培训</a></li>
            <li><a href="http://www.houdunwang.com" target='_blank'>后盾论坛</a></li>
        </ul>
        <ul class='top-bar-right fr'>
            <!-- 			<li class='userinfo'>
                            <a href="" class='uname'></a>
                        </li>
                        <li style='color:#eaeaf1'>|</li>
                        <li><a href="">退出</a></li> -->

            <li><a href="" class='login'>登录</a></li>
            <li style='color:#eaeaf1'>|</li>
            <li><a href="" class='register'>注册</a></li>
        </ul>
    </div>
    <!-- 提问搜索框 -->
    <div id='search'>
        <div class='logo'><a href="" class='logo'></a></div>
        <form action="" method=''>
            <input type="text" name='' class='sech-cons'/>
            <input type="submit" class='sech-btn'/>
        </form>
        <a href="" class='ask-btn'></a>
    </div>
    <!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
    <ul class='list'>
        <li class='nav-sel'><a href="" class='home'>问答首页</a></li>
        <li class='nav-sel ask-cate'>
            <a href="" class='ask-list'><span>问题库</span><i></i></a>
            <ul class='hidden'>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
            </ul>
        </li>
    </ul>
    <p class='total'>累计提问：1123211</p>
</div>

<!----------注册框---------->
<div id='register' class='hidden'>
    <div class='reg-title'>
        <p>欢迎注册后盾问答</p>
        <a href="" title='关闭' class='close-window'></a>
    </div>
    <div id='reg-wrap'>
        <div class='reg-left'>
            <ul>
                <li><span>账号注册</span></li>
            </ul>
            <div class='reg-l-bottom'>
                已有账号，<a href="" id='login-now'>马上登录</a>
            </div>
        </div>
        <div class='reg-right'>
            <form action="" method='post' name='register'>
                <ul>
                    <li>
                        <label for="reg-account">账号</label>
                        <input type="text" name='account' id='reg-account'/>
                        <span>7-20个字符：以字母开头的字母、数字或下划线 _</span>
                    </li>
                    <li>
                        <label for="reg-uname">用户名</label>
                        <input type="text" name='username' id='reg-uname'/>
                        <span>2-14个字符：字母、数字或中文</span>
                    </li>
                    <li>
                        <label for="reg-pwd">密码</label>
                        <input type="password" name='pwd' id='reg-pwd'/>
                        <span>6-20个字符:字母、数字或下划线 _</span>
                    </li>
                    <li>
                        <label for="reg-pwded">确认密码</label>
                        <input type="password" name='pwded' id='reg-pwded'/>
                        <span>请再次输入密码</span>
                    </li>
                    <li>
                        <label for="reg-verify">验证码</label>
                        <input type="text" name='verify' id='reg-verify'/>
                        <img src="" width='99' height='35' alt="验证码" id='verify-img'/>
                        <span>请输入图中的字母或数字，不区分大小写</span>
                    </li>
                    <li class='submit'>
                        <input type="submit" value='立即注册'/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<!----------登录框---------->
<div id='login' class='hidden'>
    <div class='login-title'>
        <p>欢迎您登录后盾问答</p>
        <a href="" title='关闭' class='close-window'></a>
    </div>
    <div class='login-form'>
        <span id='login-msg'></span>
        <!-- 登录FORM -->
        <form action="" method='post' name='login'>
            <ul>
                <li>
                    <label for="login-acc">账号</label>
                    <input type="text" name='account' class='input' id='login-acc'/>
                </li>
                <li>
                    <label for="login-pwd">密码</label>
                    <input type="password" name='pwd' class='input' id='login-pwd'/>
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

<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top结束 -->
<!--中部-->
<div id='center'>
    <!-- 左侧 -->
    <div id='left'>
        <div class='userinfo'>
            <dl>
                <dt>
                    <a href=""><img src="" width='48' height='48' alt="占位符"/></a>
                </dt>
                <dd class='username'>
                    <a href=""><b>houdun</b>
                    </a>
                    <a href="">
                        <i class='level lv1' title='Level 1'></i>
                    </a>
                </dd>
                <dd>金币：<a href="" style="color: #888888;"><b class='point'>20</b></a></dd>
                <dd>经验值：20</dd>
            </dl>
            <table>
                <tr>
                    <td>回答数</td>
                    <td>采纳率</td>
                    <td class='last'>提问数</td>
                </tr>
                <tr>
                    <td><a href="">20</a></td>
                    <td><a href="">30%</a></td>
                    <td class='last'><a href="">20</a></td>
                </tr>
            </table>
        </div>

        <ul>
            <li class='myhome cur'>
                <a href="">我的首页</a>
            </li>
            <li class='myask'>
                <a href="">我的提问</a>
            </li>
            <li class='myanswer'>
                <a href="">我的回答</a>
            </li>
            <li class='mylevel'>
                <a href="">我的等级</a>
            </li>
            <li class='mygold'>
                <a href="">我的金币</a>
            </li>
            <li class='myface'>
                <a href="">上传头像</a>
            </li>

            <li style="background:none"></li>
        </ul>
    </div>
    <!-- 左侧结束 -->
    <div id='right'>
        <p class='title'>头像上传</p>
        <ul class='ask-filter'>
        </ul>
        <div class='imgface_box'>
            <img src="<?php echo resource();?>
index/Images/profile_avatar.jpg" id="preview">
            <form action="" method="POST">
                <input type="file" name="face" id="face" >
                <input type="submit" value="上传头像" id="sub">
            </form>
            <p>支持JPG、PNG、GIF图片类型，不能大于5M。推荐尺寸：180PX*180PX</p>
        </div>
    </div>
</div>
<!-- 底部 -->
<div id='bottom'>
    <p>Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
    <p>京公安网备xxxxxxxxxxxx</p>
</div>
<!--[if IE 6]>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
index/Js/iepng.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    DD_belatedPNG.fix('.logo','background');
    DD_belatedPNG.fix('.nav-sel a','background');
    DD_belatedPNG.fix('.ask-cate i','background');
<?php echo '</script'; ?>
>
<![endif]-->
</body>
</html>
<!-- 底部结束 --><?php }
}
