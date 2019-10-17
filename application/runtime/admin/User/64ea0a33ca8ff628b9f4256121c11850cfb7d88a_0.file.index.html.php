<?php
/* Smarty version 3.1.33, created on 2019-09-20 03:13:29
  from 'D:\app\PHPTutorial\WWW\TP\application\admin\view\user\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8443d985e7e9_89728781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64ea0a33ca8ff628b9f4256121c11850cfb7d88a' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\admin\\view\\user\\index.html',
      1 => 1568941025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8443d985e7e9_89728781 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" href="<?php echo resource();?>
admin/Css/public.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/Js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/Js/public.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/layer/layer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function () {
        //    点击展示详细信息
            $('.user_detail').click(function () {
                var user_exp=$(this).attr('user_exp');
                var user_gold=$(this).attr('user_gold');
                var user_face=$(this).attr('user_face');
                html="<p>经验："+user_exp+"</p>";
                html+="<p>金币："+user_gold+"</p>";
                html+="<p>头像："+user_face+"</p>";
                // iframe层
                layer.open({
                    type: 1,
                    skin: 'layui-layer-rim', //加上边框
                    area: ['420px', '240px'], //宽高
                    content: html
                });
            });
        //    点击修改状态
            $('.status').click(function () {
                var user_status =$(this).attr("user_status");
                obj=$(this);
                var user_id=$(this).parent().parent().attr("user_id");
                // alert(user_id);
                $.ajax({
                    type:'get',
                    url:"changeStatus",
                    data:{
                        user_status:user_status,
                        user_id:user_id
                    },
                    dataType:'json',
                    beforeSend:function () {
                        obj.html("发送中")
                    },
                    success:function(res){
                      if(res.status==1){
                         if(user_status==1){
                             obj.html("禁用");
                             obj.attr('user_status',0);
                         }else{
                              obj.html("正常");
                              obj.attr('user_status',1);
                          }
                      }else{
                          obj.html("修改失败");
                        }
                    },
                    error:function () {
                        obj.html("网络异常");
                    }
                })
            });
        // 点击修改用户名
        //    点击变成input
            $(document).on('click','.user_name',function () {
                user_name=$(this).html().trim();
                obj=$(this);
                obj.parent().html("<input  name='user_name' value='"+user_name+"'/>").find('input').focus();
            });
            // $('.user_name').click(function () {
            //     user_name=$(this).attr('user_name');
            //    obj=$(this);
            //    obj.parent().html("<input type='text' name='user_name' value='"+user_name+"'/>").find('input').focus();
            // });
        //失焦变成span
            $(document).on("blur","input[name='user_name']",function () {
                var new_user_name=$(this).val().trim();
                obj=$(this);
                if(new_user_name==''){
                    $(this).parent().html("<span class='user_name'>"+user_name+"</span>");
                }else {
                    if(new_user_name===user_name){
                        $(this).parent().html("<span class='user_name'>"+user_name+"</span>");
                    }else{
                    //    发送Ajax更改数据
                        var user_id=$(this).parent().parent().attr("user_id");
                        $.ajax({
                            type:'get',
                            url:'changeName',
                            data:{
                                user_name:new_user_name,
                                user_id:user_id
                            },
                            dataType:'json',
                            beforeSend:function () {
                                //暂时没弄好
                                obj.html("发送中")
                            },
                            success:function(res) {
                                if(res.status==1){
                                    obj.parent().html("<span class='user_name'>"+new_user_name+"</span>");
                                }else{
                                    obj.parent().html("<span class='user_name'>"+user_name+"修改失败</span>");
                                }
                            },
                            error:function() {
                                obj.parent().html("<span class='user_name'>"+user_name+"网络异常</span>");
                            }

                        })
                    }
                }

            });

        //    搜索分页
            $('#search').click(function () {
                // alert(1);
                obj=$(this);
                var user_phone=$("input[name='user_phone']").val();
                var user_email=$("input[name='user_email']").val();
                var user_status=$("select[name='user_status']").val();
                $.ajax({
                    type:'post',
                    url:"Search",
                    data:{
                        user_phone:user_phone,
                        user_email:user_email,
                        user_status:user_status
                    },
                    success:function(res) {
                        if(res.status==1){

                        }
                        if(res.status==-1){

                        }
                        if(res.staus==0){
                            $('tbody').html('<tr><td colspan="8">暂无数据</td></tr>');
                        }
                    },
                    error:function () {
                    obj.after().html("<span>网络异常</span>");
                        // obj.html('网络异常')
                    }


                })
            })


        })
    <?php echo '</script'; ?>
>


</head>
<body>
<table class="table" border="1">
    <input type="text" name="user_phone" placeholder="请输入手机号">
    <input type="text" name="user_email" placeholder="要搜索的邮箱">
    <select name="user_status" id="">
        <option value="-1">全部</option>
        <option value="1">正常</option>
        <option value="0">禁用</option>
    </select>
    <input type="submit" value="搜索" id="search">
    <thead>
    <tr class="tableTop">
        <td class="tdLittle1">id</td>
        <td>用户名</td>
        <td>用户手机号</td>
        <td>用户邮箱</td>
        <td>用户详情</td>
<!--        放到隐藏文本中。点击展示-->
<!--        <td>金币</td>-->
<!--        <td>经验</td>-->
        <td>注册时间</td>
        <td>帐号状态</td>
        <td>操作</td>
    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
    <tr user_id="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_id'];?>
">
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_id'];?>
</td>
        <td><span class="user_name" user_name="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_name'];?>
</span></td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_phone'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_email'];?>
</td>
        <td>
            <a user_exp="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_exp'];?>
" user_gold="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_gold'];?>
" user_face="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_face'];?>
"  class="user_detail" href="javascript:void(0)">用户详情</a>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_time'];?>
</td>
        <td><span class="status" user_status="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_status'];?>
"><?php if ($_smarty_tpl->tpl_vars['vo']->value['user_status'] == '1') {?>
            正常
            <?php } elseif ($_smarty_tpl->tpl_vars['vo']->value['user_status'] == '0') {?>
            禁用
            <?php }?>
            </span>
        </td>
        <td>
            <a href="">删除</a>
            <a href="">修改</a>
        </td>

    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

</body>
</html><?php }
}
