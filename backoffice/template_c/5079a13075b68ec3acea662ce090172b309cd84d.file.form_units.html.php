<?php /* Smarty version Smarty-3.1.18, created on 2014-10-28 08:58:36
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_units.html" */ ?>
<?php /*%%SmartyHeaderCode:28608544ef84ca15468-44987651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5079a13075b68ec3acea662ce090172b309cd84d' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_units.html',
      1 => 1414215530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28608544ef84ca15468-44987651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544ef84cb0afe6_38248544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef84cb0afe6_38248544')) {function content_544ef84cb0afe6_38248544($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/mbk_common_function.js"></script>
    <script type="text/javascript" src="../js/mbk_main.js"></script>
    <script type="text/javascript" src="../js/mbk_form_table.js"></script>
    <script type="text/javascript">
        // Global variables
        var action = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';
        var tableName = '<?php echo $_smarty_tpl->tpl_vars['tableName']->value;?>
';
        var tableNameTH = '<?php echo $_smarty_tpl->tpl_vars['tableNameTH']->value;?>
';
        var code = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
        var ajaxUrl = 'form_table.php';
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="unit_name">
	<input type="hidden" name="uniqueFields" value="unit_name">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">ชื่อหน่วยนับ</label>
				    <input id="unit_name" name="unit_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['unit_name'];?>
" valuepattern="character" require>
			    </td>
		    </tr>
            <tr>
                <td>
                    <span id="err-unit_name-require" class="errInputMsg err-unit_name">โปรดป้อนชื่อหน่วยนับ</span>
                    <span id="err-unit_name-character" class="errInputMsg err-unit_name">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                    <span id="err-unit_name-unique" class="errInputMsg err-unit_name">หน่วยนับซ้ำ โปรดป้อนชื่อหน่วยนับใหม่</span>
                </td>
            </tr>
	    </tbody>
    </table>
    </form>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
