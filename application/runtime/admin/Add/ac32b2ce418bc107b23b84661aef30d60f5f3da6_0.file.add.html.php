<?php
/* Smarty version 3.1.33, created on 2019-09-05 07:22:14
  from 'D:\QUES\application\admin\view\cate\cate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d70b7a6aab143_78286970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac32b2ce418bc107b23b84661aef30d60f5f3da6' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\cate\\cate.html',
      1 => 1567668129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d70b7a6aab143_78286970 (Smarty_Internal_Template $_smarty_tpl) {
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
        <tr >
            <td class="th" colspan="2">添加顶级分类</td>
        </tr>
        <tr>
            <td>分类名称</td>
            <td><input type="text" name="title"/></td>
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
