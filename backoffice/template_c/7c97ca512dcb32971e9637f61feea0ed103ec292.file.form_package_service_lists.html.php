<?php /* Smarty version Smarty-3.1.18, created on 2014-08-25 00:41:54
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_package_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:1259453fa07c2678cf5-89159297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c97ca512dcb32971e9637f61feea0ed103ec292' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_package_service_lists.html',
      1 => 1408898306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1259453fa07c2678cf5-89159297',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fa07c272d640_29705740',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa07c272d640_29705740')) {function content_53fa07c272d640_29705740($_smarty_tpl) {?><!DOCTYPE html>
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
        var action      = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';
        var tableName   = '<?php echo $_smarty_tpl->tpl_vars['tableName']->value;?>
';
		var tableNameTH = '<?php echo $_smarty_tpl->tpl_vars['tableNameTH']->value;?>
';
        var code        = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
        var ajaxUrl     = 'form_table.php';

        $(document).ready(function () {
            selectReference({
                elem			: $('#svl_id'),
                tableName		: 'service_lists',
                keyFieldName	: 'svl_id',
                textFieldName	: 'svl_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
'
            });

			selectReference({
                elem			: $('#pkg_id'),
                tableName		: 'packages',
                keyFieldName	: 'pkg_id',
                textFieldName	: 'pkg_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_id'];?>
'
            });
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="svl_id,pkg_id">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">ชื่อรายการบริการ</label>
				    <div id="svl_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
            <tr>
			    <td>
				    <label class="input-required">ชื่อแพ็คเกจ</label>
				    <div id="pkg_id" class="select-reference form-input full"></div>
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
	3.  input[name="uniqueFields"] ใส่ชื่อฟิลด์ที่ต้องการเช็คว่าห้ามซ้ำ
--><?php }} ?>