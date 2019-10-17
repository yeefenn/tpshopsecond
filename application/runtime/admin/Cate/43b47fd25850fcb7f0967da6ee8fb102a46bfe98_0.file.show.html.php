<?php
/* Smarty version 3.1.33, created on 2019-09-06 14:10:08
  from 'D:\QUES\application\admin\view\cate\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d7268c05209e0_41362189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43b47fd25850fcb7f0967da6ee8fb102a46bfe98' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\cate\\show.html',
      1 => 1567765804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7268c05209e0_41362189 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo resource();?>
admin/Css/add_category.css" />
    <title></title>
</head>
<body>
<form action="" method="post">
    <table class="table">
        <tr>
            <th>分类id</th>
            <th>分类名称</th>
            <th>分类顺序</th>
            <th>分类状态</th>
            <th>操作分类</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cates']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
        <tr>
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

    </table>
</form>
</body>
</html><?php }
}
