<?php
/* Smarty version 3.1.33, created on 2019-09-25 03:52:22
  from 'D:\app\PHPTutorial\WWW\TP\application\home\view\ask\answer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8ae4761d3bc6_28114772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19eb26b9ed1b322ed6e9a097338362471b2b4a0c' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\home\\view\\ask\\answer.html',
      1 => 1569383537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8ae4761d3bc6_28114772 (Smarty_Internal_Template $_smarty_tpl) {
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
index/Css/question.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
index/Js/question.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function () {
            $('.expression').click(function () {
                // alert('assss');
                $('#phiz').show();
            });
            //采纳
            // $('.adopt-btn')

        //    分页
            $('.page a').click(function () {
                var ask_id=$(this).attr('ask_id');
                pagenow=$('.page').attr('pagenow');
                var pagesize=3;
                if($(this).is('.first')){
                    var p=1;
                }
                if($(this).is('.pre')){
                    var p=pagenow-1;
                }
                if($(this).is('.next')){
                    var p=pagenow+1;
                }
                if($(this).is('.last')){
                    var p=$('.page').attr('count');
                }
                dataType:'json';
                 $.ajax({
                     type:'get',
                     url:'http://localhost/tp/index.php/home/ask/getQuestion',
                     // url:"getQuestion",
                     data:{
                         ask_id:ask_id,
                         pagenow:p,
                         pagesize:pagesize
                     },
                     success:function (res) {
                         if(res.status){
                             // pagenow=pagenow
                         }
                     }

                 })

            })

        })


    <?php echo '</script'; ?>
>


</head>
<style>
    #phiz{
        width:400px;
        height:auto;
        border:1px solid #ccc;
        position: absolute;
        background: #fff;
    }
    #phiz div{
        background: #ccc;
        height: 30px;
    }
    #phiz div p{
        float: left;
    }
    #phiz div span{
        float: right;
    }
    #phiz ul li{
        display:inline-block;
    }
</style>

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
<!-- top 结束-->
<div id='location'>
    <a href="">全部分类</a>
    &gt;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cateline']->value[0]['cate_name'];?>
&nbsp;&nbsp;
    &gt;&nbsp;<a href=""><?php echo $_smarty_tpl->tpl_vars['cateline']->value[1]['cate_name'];?>
</a>&nbsp;&nbsp;
</div>

<!--------------------中部-------------------->
<div id='center-wrap'>
    <div id='center'>
        <div id='left'>
            <div id='answer-info'>
                <!-- 如果没有解决用wait -->
                <div class='ans-state wait'></div>
                <div class='answer'>
                    <p class='ans-title'><?php echo $_smarty_tpl->tpl_vars['res']->value['ask_content'];?>

                        <b class='point'><?php echo $_smarty_tpl->tpl_vars['res']->value['ask_gold'];?>
</b>
                    </p>
                </div>
                <ul>
                    <li><a href=""><?php echo $_smarty_tpl->tpl_vars['ask_user']->value;?>
</a></li>
                    <li><i class='level <?php echo $_smarty_tpl->tpl_vars['ask_level']->value;?>
' title='Level 1'></i></li>
                    <li><?php echo $_smarty_tpl->tpl_vars['res']->value['ask_time'];?>
</li>

                </ul>
                <div class='ianswer'>
                    <form action="<?php echo url('addAnswer');?>
" method='POST'>
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" name="user_name">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" name="user_id">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['ask_gold'];?>
" name="ask_gold">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ask_id']->value;?>
" name="ask_id">
                        <p>我来回答</p>
                        <textarea name="answer_content"></textarea>
                            <div>
                                <p class="expression">常用表情</p >
                            </div>
                        <input type="hidden" name='qid' value=''>
                        <input type="submit" value='提交回答' id='anw-sub'/>
                    </form>
                </div>
                <!-- 满意回答 -->
                <div class='ans-right'>
                    <p class='title'><i></i>满意回答<span></span></p>
                    <p class='ans-cons'><?php echo $_smarty_tpl->tpl_vars['answer_content']->value;?>
</p>
                    <dl>
                        <dt>
                            <a href=""><img src="<?php echo resource();?>
index/Images/noface.gif" width='48' height='48'/></a>
                        </dt>
                        <dd>
                            <a href=""><?php echo $_smarty_tpl->tpl_vars['get_answer']->value;?>
</a>
                        </dd>
                        <dd><i class='level lv1'></i></dd>
                        <dd>20%</dd>
                    </dl>
                </div>
                <!-- 满意回答 -->
            </div>

            <div id='all-answer'>
                <div class='ans-icon'></div>
                <p class='title'>共 <strong><?php echo $_smarty_tpl->tpl_vars['res']->value['ask_num_answer'];?>
</strong> 条回答</p>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answer']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
                    <li>
                        <div class='face'>
                            <a href="">
<!--                                <?php echo resource();?>
index/Images/noface.gif-->
                                <img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['answer_face'];?>
" width='48' height='48'/>
                            </a>
                        </div>
                        <div class='cons blue'>
                            <p><?php echo $_smarty_tpl->tpl_vars['vo']->value['answer_content'];?>
<span style='color:#888;font-size:12px'><?php echo $_smarty_tpl->tpl_vars['vo']->value['answer_time'];?>
</span></p>
                        </div>

                        <a href="" class='adopt-btn'>采纳</a>
                    </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                if(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
){
                    <div class='page' pagenow="1" count="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                        <a href="javascript:void 0" class="first" ask_id="<?php echo $_smarty_tpl->tpl_vars['ask_id']->value;?>
">首页</a>
                        <a href="javascript:void 0" class="pre" ask_id="<?php echo $_smarty_tpl->tpl_vars['ask_id']->value;?>
">上一页</a>
                        <a href="javascript:void 0" class="next" ask_id="<?php echo $_smarty_tpl->tpl_vars['ask_id']->value;?>
">下一页</a>
                        <a href="javascript:void 0" class="last" ask_id="<?php echo $_smarty_tpl->tpl_vars['ask_id']->value;?>
">尾页</a>
                    </div>

                }

            </div>
            <div id='other-ask'>
                <p class='title'>待解决的相关问题</p>
                <table>
                    <tr>
                        <td class='t1'><a href="">什么牌子电脑好？</a></td>
                        <td>20&nbsp;回答</td>
                        <td>1900.1.1</td>
                    </tr>
                </table>
            </div>
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

</div>

<!--------------------中部结束-------------------->
<div id="phiz" class="hidden">
    <div>
        <p>常用表情</p >
        <span class="close fright">关闭</span>
    </div>
    <ul>
        <li>< img src="<?php echo resource('phiz');?>
/hehe.gif" alt="呵呵" title="呵呵"></li>
        <li>< img src="<?php echo resource('phiz');?>
/xixi.gif" alt="嘻嘻" title="嘻嘻"></li>
        <li>< img src="<?php echo resource('phiz');?>
/haha.gif" alt="哈哈" title="哈哈"></li>
        <li>< img src="<?php echo resource('phiz');?>
/keai.gif" alt="可爱" title="可爱"></li>
        <li>< img src="<?php echo resource('phiz');?>
/kelian.gif" alt="可怜" title="可怜"></li>
        <li>< img src="<?php echo resource('phiz');?>
/wabisi.gif" alt="挖鼻屎" title="挖鼻屎"></li>
        <li>< img src="<?php echo resource('phiz');?>
/chijing.gif" alt="吃惊" title="吃惊"></li>
        <li>< img src="<?php echo resource('phiz');?>
/haixiu.gif" alt="害羞" title="害羞"></li>
        <li>< img src="<?php echo resource('phiz');?>
/jiyan.gif" alt="挤眼" title="挤眼"></li>
        <li>< img src="<?php echo resource('phiz');?>
/bizui.gif" alt="闭嘴" title="闭嘴"></li>
        <li>< img src="<?php echo resource('phiz');?>
/bishi.gif" alt="鄙视" title="鄙视"></li>
        <li>< img src="<?php echo resource('phiz');?>
/aini.gif" alt="爱你" title="爱你"></li>
        <li>< img src="<?php echo resource('phiz');?>
/lei.gif" alt="泪" title="泪"></li>
        <li>< img src="<?php echo resource('phiz');?>
/touxiao.gif" alt="偷笑" title="偷笑"></li>
        <li>< img src="<?php echo resource('phiz');?>
/qinqin.gif" alt="亲亲" title="亲亲"></li>
        <li>< img src="<?php echo resource('phiz');?>
/shengbin.gif" alt="生病" title="生病"></li>
        <li>< img src="<?php echo resource('phiz');?>
/taikaixin.gif" alt="太开心" title="太开心"></li>
        <li>< img src="<?php echo resource('phiz');?>
/ldln.gif" alt="懒得理你" title="懒得理你"></li>
    </ul>
</div>
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
