<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 00:34:10
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_employees.html" */ ?>
<?php /*%%SmartyHeaderCode:208355404a002bd1062-52542044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda8342328ba1fe618076434ede7e93df947df7f' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_employees.html',
      1 => 1409589029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208355404a002bd1062-52542044',
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
  'unifunc' => 'content_5404a002d6fea0_66797972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5404a002d6fea0_66797972')) {function content_5404a002d6fea0_66797972($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_employees.php';

		$(document).ready(function() {
			$("#emp_birthdate").datepicker();

			selectReference({
                elem			: $('#title_id'),
                tableName		: 'titles',
                keyFieldName	: 'title_id',
                textFieldName	: 'title_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['title_id'];?>
'
            });
            selectReference({
                elem            : $('#pos_id'),
                tableName       : 'positions',
                keyFieldName    : 'pos_id',
                textFieldName   : 'pos_name',
                searchTool      : false,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['pos_id'];?>
'
            });

			uploadImageInput({
				area: $('#emp_pic'),
				input: $('input[name="emp_pic"]'),
				selector: $('#emp_pic_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_pic']) {?>../img/employees/<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
<?php }?>'
			});

			// Set default value of textarea
			$('#emp_addr').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_addr'];?>
');
		});
		
		function beforeSaveRecord() {
			alert('check re pass!');
		}
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="pos_id,title_id,emp_name,emp_surname,emp_addr,emp_tel,emp_birthdate,emp_user,emp_pass<?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>,emp_re_pass<?php }?>">
    <input type="hidden" name="uniqueFields" value="emp_user">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<div id="emp_pic" class="uploadImageArea"></div>
					<input type="hidden" name="emp_pic" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
">
				</td>
				<td style="vertical-align:top">
					<label class="input-required">คำนำหน้าชื่อ</label>
					<div id="title_id" class="select-reference form-input half"></div>
			
					<label class="input-required">ชื่อพนักงาน</label>
					<input id="emp_name" name="emp_name" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
">

					<label class="input-required">นามสกุล</label>
					<input id="emp_surname" name="emp_surname" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
">
	
					<label class="input-required">ตำแหน่ง</label>
					<div id="pos_id" class="select-reference form-input half"></div>
				</td>
			</tr>
		</tbody>
    </table>
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan=2>
					<label class="input-required">ที่อยู่</label>
					<textarea id="emp_addr" name="emp_addr" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_addr'];?>
"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">วันเกิด</label>
					<input id="emp_birthdate" name="emp_birthdate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_birthdate'];?>
">
				</td>
				<td>
					<label class="input-required">เบอร์โทรศัพท์</label>
					<input id="emp_tel" name="emp_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_tel'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="input-required">Username</label>
					<input id="emp_user" name="emp_user" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_user'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="input-required">Password</label>
					<input id="emp_pass" name="emp_pass" type="password" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pass'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="input-required">Re-Password</label>
					<input id="emp_re_pass" name="emp_re_pass" type="password" class="form-input full">
				</td>
			</tr>
	    </tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="emp_pic_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
	</form>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
