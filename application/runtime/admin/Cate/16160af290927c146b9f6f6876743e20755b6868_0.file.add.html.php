<?php
/* Smarty version 3.1.33, created on 2019-09-05 13:28:09
  from 'D:\QUES\application\admin\view\cate\add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d710d69eab3c4_01653695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16160af290927c146b9f6f6876743e20755b6868' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\cate\\add.html',
      1 => 1567682978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d710d69eab3c4_01653695 (Smarty_Internal_Template $_smarty_tpl) {
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
            <td>分类名称</td>
            <td><input type="text" name="cate_name"/></td>
        </tr>
        <tr>
            <td>分类顺序</td>
            <td><input type="text" name="cate_order"/></td>
        </tr>
        <tr>
            <td>分类状态</td>
            <td><input type="radio" name="cate_status" checked value="1"/>显示
                <input type="radio" name="cate_status"  value="0"/>不显示
            </td>
        </tr>
        <tr>
            <td>所属分类</td>
            <td>
                <select name="cate_pid">
                    <option value="0">顶级分类</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cates']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
">
                        <?php echo str_repeat("---",$_smarty_tpl->tpl_vars['vo']->value['level']);
echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>

                    </option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="添加" class="input_button"/>
                <input type="reset" class="input_button"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html><?php }
}
