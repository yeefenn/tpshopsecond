<?php
/* Smarty version 3.1.33, created on 2019-09-23 11:33:04
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\home\user_home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d88ad7018fa40_90165937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a7d4d0b9bbb8388a6e3925d80ca05945aaa501a' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\home\\user_home.html',
      1 => 1569238374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d88ad7018fa40_90165937 (Smarty_Internal_Template $_smarty_tpl) {
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
            <!--            <?php echo url('login');?>
-->
            <li><a href="<?php echo url('login/login_do');?>
" class='login'><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</a></li>
            <li style='color:#eaeaf1'>|</li>
            <!--            <?php echo url('register');?>
-->
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
        <a href="<?php echo url('ask/show');?>
" class='ask-btn'></a>
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
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cate_order']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
                <li>
                    <a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</a>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </li>
    </ul>
    <p class='total'>累计提问:</p>
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
            <form action="<?php echo url('login/register');?>
" method='post' name='register'>
                <ul>
                    <li>
                        <label for="reg-uname">用户名</label>
                        <input type="text" name='user_account' id='reg-uname'/>
                        <span>手机号码或邮箱</span>
                    </li>
                    <li>
                        <label for="reg-pwd">密码</label>
                        <input type="password" name='user_pwd' id='reg-pwd'/>
                        <span>6-20个字符:字母、数字或下划线 _</span>
                    </li>
                    <li>
                        <label for="reg-pwded">确认密码</label>
                        <input type="password" name='repwd' id='reg-pwded'/>
                        <span>请再次输入密码</span>
                    </li>
                    <li>
                        <label for="reg-verify">验证码</label>
                        <input type="text" name='code' id='reg-verify'/>
                        <span style="display: inline-block;padding: 3px;border: 1px solid #ccc;border-radius: 5px;cursor: pointer" class="sendCode"  >发送验证码</span>
                        <span>请输入图中的数字，不区分大小写</span>
                    </li>
                    <li class='submit'>
                        <input type="submit" value='立即注册'/>
                    </li>
                    <li>
                        <a href="<?php echo url('login/qq_login');?>
" onclick='toLogin()'>
                            <!--                        <a href="#" onclick='toLogin()'>-->
                            <img src='<?php echo resource();?>
index/Images/Connect_logo_1.png'>
                        </a>
                        <!--                        <?php echo '<script'; ?>
>-->
                        <!--                            function toLogin()-->
                        <!--                            {-->
                        <!--                                //以下为按钮点击事件的逻辑。注意这里要重新打开窗口-->
                        <!--                                //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口-->
                        <!--                                var A=window.open("index.php/home/login/qq_login","TencentLogin","width=450,height=320,menubar=0,scrollbars=1,resizable=1,status=1,titlebar=0,toolbar=0,location=1");-->
                        <!--                            }-->
                        <!--                        <?php echo '</script'; ?>
>-->
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<!----------登录框---------->
<div id='login' class='hidden'>
    <div class='login-title'>
        <p>欢迎您登录后盾问答</p >
        <a href="" title='关闭' class='close-window'></a >
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
                    <a href="" id='regis-now'>注册新账号</a >
                </li>
                <li>
                    <input type="submit" value='' id='login-btn'/>
                </li>
            </ul>
        </form>
    </div>
</div>


<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top -->
<div class='main'>
    <div id='left'>
        <p class='left-title'>所有问题分类</p>
        <ul class='left-list'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cate_order']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
            <li class='list-l1'>
                <div class='list-l1-wrap'>
                    <h4><a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</a></h4>
                    <ul class='list-l2'>
                        <li><a href=""></a></li>
                    </ul>
                </div>

                <div class='list-more hidden'>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vo']->value['child'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <ul>
                        <li><a href=""><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</a></li>
                    </ul>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </ul>
    </div>

    <div id='center'>
        <div id='animate'>
            <div class='imgs-wrap'>
                <ul>
                    <li>
                        <a href=""><img src="<?php echo resource();?>
index/Images/xiaozhu.png" width='558' height='190'/></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo resource();?>
index/Images/xiaozhu.png" width='558' height='190'/></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo resource();?>
index/Images/xiaozhu.png" width='558' height='190'/></a>
                    </li>
                </ul>
            </div>
            <ul class='ani-btn'>
                <li class='ani-btn-cur'>0学费学习<i></i></li>
                <li>超百G原创视频<i></i></li>
                <li style='border:none'>有实力做后盾<i></i></li>
            </ul>
        </div>

        <dl class='answer-list'>
            <dt>
                <span class='wait-as'>待解决问题</span>
                <a href=''>更多>></a>
            </dt>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ask']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
            <dd>
                <a href="<?php echo url('ask/answer',array('ask_id'=>$_smarty_tpl->tpl_vars['vo']->value['ask_id'],'user_id'=>$_smarty_tpl->tpl_vars['user_id']->value));?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_content'];?>
</a>
                <span><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_num_answer'];?>
回答</span>
            </dd>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </dl>

        <dl class='answer-list'>
            <dt>
                <span class='reward-as'>高分悬赏问题</span>
                <a href=''>更多>></a>
            </dt>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ask']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
            <dd>
                <a href="<?php echo url('ask/answer',array('ask_id'=>$_smarty_tpl->tpl_vars['vo']->value['ask_id'],'user_id'=>$_smarty_tpl->tpl_vars['user_id']->value));?>
"><b><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_gold'];?>
</b><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_content'];?>
</a>
                <span><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_num_answer'];?>
回答</span>
            </dd>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </dl>

    </div>
    <!-- 右侧 -->
    <div id='right'>
        <div class='userinfo'>
            <dl>
                <dt>
                    <a href=""><img src="" width='48' height='48' alt="占位符"/></a>
                </dt>
                <dd class='username'>
                    <a href="">
                        <b></b>
                    </a>
                    <a href="">
                        <i class='level lv1' title='Level 1'></i>
                    </a>
                </dd>
                <dd>金币：<a href="" style="color: #888888;">20<b class='point'></b></a></dd>
                <dd>经验值：200</dd>
            </dl>
            <table>
                <tr>
                    <td>回答数</td>
                    <td>采纳率</td>
                    <td class='last'>提问数</td>
                </tr>
                <tr>
                    <td><a href="">200</a></td>
                    <td><a href="">20%</a></td>
                    <td class='last'><a href="">回答数</a></td>
                </tr>
            </table>
            <ul>
                <li><a href="">我提问的</a></li>
                <li><a href="">我回答的</a></li>
            </ul>
        </div>
        <!-- <div class='r-home'>
            <span class='home'><i></i>&nbsp;登录</span>
            <span class='register'><i></i>&nbsp;注册</span>
        </div> -->
        <div class='clear'></div>
        <div class='star'>
            <p class='title'>后盾问答之星</p>
            <span class='star-name'>本日回答问题最多的人</span>
            <div class='star-info'>
                <div>
                    <a href="" class='star-face'>
                        <img src="" width='48px' height='48px' alt="头像站位"/>
                    </a>
                    <ul>
                        <li><a href="">后盾网</a></li>
                        <i class='level lv1' title='Level 1'></i>
                    </ul>
                </div>
                <ul class='star-count'>
                    <li>回答数：<span>100</span></li>
                    <li>采纳率：<span>20%</span></li>
                </ul>
            </div>
            <span class='star-name'>历史回答问题最多的人</span>

            <div class='star-info'>
                <div>
                    <a href="" class='star-face'>
                        <img src="" width='48px' height='48px' alt="头像站位"/>
                    </a>
                    <ul>
                        <li><a href="">后盾网</a></li>
                        <i class='level lv1' title='Level 1'></i>
                    </ul>
                </div>
                <ul class='star-count'>
                    <li>回答数：<span>200</span></li>
                    <li>采纳率：<span>100%</span></li>
                </ul>
            </div>
        </div>
        <div class='star-list'>
            <p class='title'>后盾问答助人光荣榜</p>
            <div>
                <ul class='ul-title'>
                    <li>用户名</li>
                    <li style='text-align:right;'>帮助过的人数</li>
                </ul>
                <ul class='ul-list'>
                    <li>
                        <a href=""><i class='rank r1'></i>houdunwang.com</a>
                        <span>100</span>
                    </li>
                    <li>
                        <a href=""><i class='rank r2'></i>houdunwang.com</a>
                        <span>100</span>
                    </li>
                    <li>
                        <a href=""><i class='rank r3'></i>houdunwang.com</a>
                        <span>100</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ---右侧结束---- -->
</div>
<!--------------------内容主体结束-------------------->
<div class='clear'></div>

<!-- 底部 -->
<div id='bottom'>
    <p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
    <p>京公安网备xxxxxxxxxxxx</p>
</div>
<!--[if IE 6]>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
home/Js/iepng.js"><?php echo '</script'; ?>
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
<!-- 底部结束 -->


<?php }
}
