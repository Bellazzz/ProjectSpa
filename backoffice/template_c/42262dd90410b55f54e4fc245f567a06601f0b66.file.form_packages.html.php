<?php /* Smarty version Smarty-3.1.18, created on 2014-09-01 21:33:36
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_packages.html" */ ?>
<?php /*%%SmartyHeaderCode:1269540475b0edca23-22766533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42262dd90410b55f54e4fc245f567a06601f0b66' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_packages.html',
      1 => 1409493315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1269540475b0edca23-22766533',
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
  'unifunc' => 'content_540475b1214736_47761999',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540475b1214736_47761999')) {function content_540475b1214736_47761999($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css"> 
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script> 
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
        var ajaxUrl     = 'form_packages.php';

		$(document).ready(function() {
			//pkg_id	pkg_name	pkg_start	pkg_stop	pkg_desc	pkg_price	pkg_picture
			uploadImageInput({
				area: $('#pkg_picture'),
				input: $('input[name="pkg_picture"]'),
				selector: $('#pkg_picture_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['pkg_picture']) {?>../img/packages/<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_picture'];?>
<?php }?>'
			});

			$("#pkg_start").datepicker();
			$("#pkg_stop").datepicker();
			// Set default value of textarea
			$('#pkg_desc').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_desc'];?>
');
		});
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="pkg_name,pkg_start,pkg_price">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<div id="pkg_picture" class="uploadImageArea full"></div>
					<input type="hidden" name="pkg_picture" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_picture'];?>
">
				</td>
			</tr>
		</tbody>
    </table>
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan=2>
					<label class="input-required">ชื่อแพ็คเกจ</label>
					<input id="pkg_name" name="pkg_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_name'];?>
">
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">วันที่เริ่มใช้</label>
                	<input id="pkg_start" name="pkg_start" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_start'];?>
">
                </td>
                <td>
					<label>วันที่สิ้นสุด</label>
                	<input id="pkg_stop" name="pkg_stop" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_stop'];?>
">
                </td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="input-required">ราคา</label>
					<input id="pkg_price" name="pkg_price" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_price'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label>คำอธิบาย</label>
					<textarea id="pkg_desc" name="pkg_desc" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pkg_desc'];?>
"></textarea>
				</td>
			</tr>
	    </tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="pkg_picture_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
	</form>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
