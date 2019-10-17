<?php
/* Smarty version 3.1.33, created on 2019-09-05 15:55:35
  from 'D:\QUES\application\admin\view\cate\update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d712ff7ed49c1_84625296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7d7422774ffaa6cbdceebe5dbd433ca1b966d54' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\cate\\update.html',
      1 => 1567698842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d712ff7ed49c1_84625296 (Smarty_Internal_Template $_smarty_tpl) {
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
        <input type="hidden" name="cate_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_id'];?>
">
        <tr>
            <td>分类名称</td>
            <td><input type="text" name="cate_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_name'];?>
"/></td>
        </tr>
        <tr>
            <td>分类顺序</td>
            <td><input type="text" name="cate_order" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_order'];?>
"/></td>
        </tr>
        <tr>
            <td>分类状态</td>
            <td> <input type="radio" name="cate_status" value="1"
                <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_status'] == '1') {?>
                checked
                <?php }?> />显示
                <input type="radio" name="cate_status"  value="0"
                <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_status'] == '0') {?>
                checked
                <?php }?> />
                不显示
            </td>
        </tr>
        <tr>
            <td>所属分类</td>
            <td>
                <select name="cate_pid">
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_id'];?>
">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_pid'] == '0') {?>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['cate_name'];?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['cate_pid'] != '0') {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cates']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_pid'] == $_smarty_tpl->tpl_vars['vo']->value['cate_id']) {?>
                                <?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>

                                <?php }?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </option>
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
                <input type="submit" value="确认修改" class="input_button"/>
                <input type="reset" class="input_button"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html><?php }
}
