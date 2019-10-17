<?php
/* Smarty version 3.1.33, created on 2019-09-06 02:02:22
  from 'D:\QUES\application\admin\view\config\add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d71be2e1498c5_43973804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d8793deb08c7bcf85db523cea1f0a3658a7d3cd' => 
    array (
      0 => 'D:\\QUES\\application\\admin\\view\\config\\add.html',
      1 => 1567735320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d71be2e1498c5_43973804 (Smarty_Internal_Template $_smarty_tpl) {
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
            <td>配置名称</td>
            <td><input type="text" name="config_name"/></td>
        </tr>
        <tr>
            <td>配置变量</td>
            <td><input type="text" name="config_var"/></td>
        </tr>
        <tr>
            <td>配置顺序</td>
            <td><input type="text" name="config_order"/></td>
        </tr>
        <tr>
            <td>配置说明</td>
            <td><input type="text" name="config_desc"/></td>
        </tr>
        <tr>
            <td>配置文本类型(这里给个下拉框，选择配置类型)</td>
            <td>
                <select name="config_input_type">
                    <option value="0">文本框</option>
                    <option value="1">文本域</option>
                    <option value="2">单选框</option>
                    <option value="3">下拉框</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>配置可选值</td>
            <td><input type="text" name="config_select_values"/>
                *格式：单选框：0|关闭，1|开启，下拉框：|
            </td>

        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="确认添加" class="input_button"/>
                <input type="reset" class="input_button"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html><?php }
}
