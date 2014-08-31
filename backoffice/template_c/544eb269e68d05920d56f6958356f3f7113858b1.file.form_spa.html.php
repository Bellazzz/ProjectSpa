<?php /* Smarty version Smarty-3.1.18, created on 2014-08-30 14:42:31
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_spa.html" */ ?>
<?php /*%%SmartyHeaderCode:280853ff3611a5c135-05059772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '544eb269e68d05920d56f6958356f3f7113858b1' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_spa.html',
      1 => 1409380939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280853ff3611a5c135-05059772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ff36123311c3_51652840',
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
<?php if ($_valid && !is_callable('content_53ff36123311c3_51652840')) {function content_53ff36123311c3_51652840($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_spa.php';

		$(document).ready(function() {
			//spa_id	spa_name	spa_addr	spa_tel	spa_fax	spa_logo
			uploadImageInput({
				area: $('#spa_logo'),
				input: $('input[name="spa_logo"]'),
				selector: $('#spa_logo_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['spa_logo']) {?>../img/spa/<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_logo'];?>
<?php }?>'
			});

			// Set default value of textarea
			$('#spa_addr').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_addr'];?>
');
		});
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="spa_name,spa_addr,spa_tel">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<div id="spa_logo" class="uploadImageArea full"></div>
					<input type="hidden" name="spa_logo" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_logo'];?>
">
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td colspan="2">
					<label class="input-required">ชื่อสปา</label>
					<input id="spa_name" name="spa_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_name'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label class="input-required">ที่อยู่</label>
					<textarea id="spa_addr" name="spa_addr" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_addr'];?>
"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">เบอร์โทร</label>
					<input id="spa_tel" name="spa_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_tel'];?>
">
				</td>
				<td>
					<label class="input-required">เบอร์โทร</label>
					<input id="spa_tel" name="spa_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_tel'];?>
">
				</td>
			</tr>
		</tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="spa_logo_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
	</form>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
