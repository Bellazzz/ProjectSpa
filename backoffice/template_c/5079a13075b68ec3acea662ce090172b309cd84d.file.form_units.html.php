<?php /* Smarty version Smarty-3.1.18, created on 2014-08-31 21:01:32
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_units.html" */ ?>
<?php /*%%SmartyHeaderCode:2286654031cac919d44-34754280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5079a13075b68ec3acea662ce090172b309cd84d' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_units.html',
      1 => 1408898372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2286654031cac919d44-34754280',
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
  'unifunc' => 'content_54031cacb21150_13238372',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54031cacb21150_13238372')) {function content_54031cacb21150_13238372($_smarty_tpl) {?><!DOCTYPE html>
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
">
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
