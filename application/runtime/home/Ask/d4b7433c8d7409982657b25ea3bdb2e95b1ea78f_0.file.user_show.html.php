<?php
/* Smarty version 3.1.33, created on 2019-09-21 11:20:19
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\ask\user_show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d860773623319_74548174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b7433c8d7409982657b25ea3bdb2e95b1ea78f' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\ask\\user_show.html',
      1 => 1569058539,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d860773623319_74548174 (Smarty_Internal_Template $_smarty_tpl) {
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
index/Css/ask.css" />
    <?php echo '<script'; ?>
>
        $(function () {
            // $(document).on('clink','.cate_id',function () {
            //
            // })
            $('.cate_id').click(function () {
                $("select[name='cate-son']").show();
                var cate_id=$(this).val();
                $.ajax({
                    type:'get',
                    url:"findSon",
                    data:{
                        cate_id:cate_id,
                    },
                    dataType:'json',
                    // beforeSend:function () {
                    // obj.html("发送中")
                    // },
                    success: function(data){
                        if(data.status==1){
                            var html;
                            $.each(data.cate_name, function(i, obj) {
                                html += '<option value="' + obj.cate_id + '">' + obj.cate_name + '</option>';  //循环遍历，拼接
                            });
                            $("select[name='cate-son']").html(html);
                        }else {
                            $("select[name='cate-son']").html('暂无数据');
                        }
                    },
                    error:function () {
                        $("select[name='cate-son']").html('网络错误');
                    }
                })

            });
            $('#ok').click(function () {
                var cate_id=$("select[name='cate-son']").val();
                $("input[name='cid']").val(cate_id);
                $('.close-window').trigger('click');
            });

            //判断金币值
            var user_gold=parseInt($('.my_gold').html());
            $("select[name='reward'] option").each(function(){
                var gold=$(this).val();
                if(user_gold<gold){
                    $(this).prop('disabled',true);
                }
            });


        })


    <?php echo '</script'; ?>
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

            <li><a href="" class='login'><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</a></li>
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
<div id='location'>
    <a href="">后盾问答</a>&nbsp;>&nbsp;提问
</div>

<!--------------------中部-------------------->
<div id='center'>
    <div class='send'>
        <div class='title'>
            <p class='left'>向亿万网友们提问</p>
            <p class='right'>您还可以输入<span id='num'>50</span>个字</p>
        </div>
        <form action="<?php echo url('add');?>
" method='post'>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" name="user_id">
            <div class='cons'>
                <textarea name="content"></textarea>
            </div>
            <div class='reward'>
                <span id='sel-cate' class='cate-btn'>选择分类</span>
                <ul>
                    <li>
                        我的金币：<span class="my_gold"><?php echo $_smarty_tpl->tpl_vars['user_gold']->value;?>
</span>
                    </li>
                    <li>
                        悬赏：<select name="reward">
                        <option value="0">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="80">80</option>
                        <option value="100">100</option>
                    </select>金币
                    </li>
                </ul>
            </div>
            <input type='hidden' name='cid' value=''/>
            <input type="submit" value='提交问题' class='send-btn'/>
        </form>
    </div>
</div>
<div id='category'>
    <p class='title'>
        <span>请选择分类</span>
        <a href="" class='close-window'></a>
    </p>
    <div class='sel'>
        <p>为您的问题选择一个合适的分类：</p>

        <select name="cate-one" size='16'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
" class="cate_id"><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>

        <select name="cate-son" size='16' class='hidden'></select>
        <!--        <select name="cate-one" size='16' class=''></select>-->
    </div>
    <p class='bottom'>
        <span id='ok'>确定</span>
    </p>
</div>
<!--------------------中部结束-------------------->

<!-- 底部 -->
<div id='bottom'>
    <p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
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
