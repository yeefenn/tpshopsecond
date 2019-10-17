<?php
/* Smarty version 3.1.33, created on 2019-09-20 12:06:08
  from 'D:\app\PHPTutorial\WWW\TP\application\admin\view\cate\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d84c0b038f7b6_03041387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a60382c5d70ab2fa3032fbb124b2de3b307ce083' => 
    array (
      0 => 'D:\\app\\PHPTutorial\\WWW\\TP\\application\\admin\\view\\cate\\show.html',
      1 => 1568981162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d84c0b038f7b6_03041387 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo resource();?>
admin/Css/add_category.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
index/Js/jquery-1.7.2.min.js'><?php echo '</script'; ?>
>
    <title>问题分类展示</title>
    <?php echo '<script'; ?>
>
        $(function () {
            $("tbody tr[cate_pid!='0']").hide();
            $(".showPlus").toggle(function () {
                var cate_id=$(this).parents("tr").attr("cate_id");
                $("tbody tr[cate_pid='"+cate_id+"']").show();
            },function () {
                var cate_id=$(this).parents("tr").attr("cate_id");
                $("tbody tr[cate_pid='"+cate_id+"']").hide();
            });

        });
    <?php echo '</script'; ?>
>
</head>
<body>
<form action="" method="post">
    <table class="table">
        <thead>
        <tr>
            <th>展开</th>
            <th>分类id</th>
            <th>分类名称</th>
            <th>分类顺序</th>
            <th>分类状态</th>
            <th>操作分类</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cates']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
        <tr cate_id="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
" cate_pid="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_pid'];?>
">
            <td><a href="javascript:void(0)" class="showPlus"></a></td>
            <td class="th" ><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
</td>
            <td class="th" >
<!--                str_repeat() 函数把字符串重复指定的次数-->
                <?php if ($_smarty_tpl->tpl_vars['vo']->value['cate_pid'] != '0') {?>
                <?php echo str_repeat("---",2);?>
.<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>

                <?php } elseif ($_smarty_tpl->tpl_vars['vo']->value['cate_pid'] == '0') {?>
                <?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>

                <?php }?>
            </td>
            <td class="th" ><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_order'];?>
</td>
            <td class="th" ><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_status'];?>
</td>
            <td class="th" >
                <a href="<?php echo url('delect');?>
">删除</a>
                <a href="<?php echo url('update',array('cate_id'=>$_smarty_tpl->tpl_vars['vo']->value['cate_id']));?>
">修改</a>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</form>
</body>
</html><?php }
}
