<?php
/* Smarty version 3.1.33, created on 2019-09-06 13:23:23
  from 'D:\QUES\application\admin\view\config\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d725dcb325fd4_57451383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '053250747d4f5a555e5406848dc9c70f7b7dc072' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\config\\show.html',
      1 => 1567776192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d725dcb325fd4_57451383 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo resource();?>
admin/Css/add_category.css" />
    <title></title>
</head>
<body>
<form action="<?php echo url('update_config');?>
" method="post">

    <table class="table">
        <tr>
            <th>配置id</th>
            <th>配置名称</th>
            <th>配置变量</th>
            <th>配置值</th>
            <th>操作</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configs']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['config_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['config_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['config_var'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['html'];?>
</td>
            <td>
                <a href="">删除</a>
                <a href="<?php echo url('update',array('config_id'=>$_smarty_tpl->tpl_vars['vo']->value['config_id']));?>
">修改</a>
                <input type="hidden" name="config_id[]" value="<?php echo ($_smarty_tpl->tpl_vars['vo']->value['config_id']);?>
" >
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <input type="submit" value="保存配置">
<!--    <a href="<?php echo url('update_config');?>
"><input type="submit" value="保存配置"></a>-->

</form>
</body>
</html><?php }
}
