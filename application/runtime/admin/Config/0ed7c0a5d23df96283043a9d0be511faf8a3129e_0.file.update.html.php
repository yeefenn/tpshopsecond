<?php
/* Smarty version 3.1.33, created on 2019-09-06 10:57:10
  from 'D:\QUES\application\admin\view\config\update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d723b86dc7c43_77163300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ed7c0a5d23df96283043a9d0be511faf8a3129e' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\config\\update.html',
      1 => 1567767421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d723b86dc7c43_77163300 (Smarty_Internal_Template $_smarty_tpl) {
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
        <input type="hidden" name="config_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['config_id'];?>
">
        <tr>
            <td>配置名称</td>
            <td><input type="text" name="config_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['config_name'];?>
"/></td>
        </tr>
        <tr>
            <td>配置变量</td>
            <td><input type="text" name="config_var" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['config_var'];?>
"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="确认修改" class="input_button"/>
                <input type="reset" class="input_button"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html><?php }
}
