<?php /* Smarty version Smarty-3.1.18, created on 2014-09-30 09:51:32
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_employees.html" */ ?>
<?php /*%%SmartyHeaderCode:14365542a0ca458f807-16529728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda8342328ba1fe618076434ede7e93df947df7f' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_employees.html',
      1 => 1410269612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14365542a0ca458f807-16529728',
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
  'unifunc' => 'content_542a0ca48d3bc4_99453750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a0ca48d3bc4_99453750')) {function content_542a0ca48d3bc4_99453750($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<!--<link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css">-->
	<link rel="stylesheet" type="text/css" href="../inc/datetimepicker/jquery.datetimepicker.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script>-->
	<script type="text/javascript" src="../inc/datetimepicker/jquery.datetimepicker.js"></script>
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
			$('#emp_indate').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});
			$('#emp_birthdate').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});


			selectReference({
                elem			: $('#sex_id'),
                tableName		: 'sex',
                keyFieldName	: 'sex_id',
                textFieldName	: 'sex_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['sex_id'];?>
'
            });
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

			// Add input password
			if(action == 'ADD') {
				addInputPassword();
			}
		});
		
		function beforeSaveRecord() {
			// Check password
			if($('#emp_pass').val() != $('#emp_re_pass').val()) {
				$('#emp_pass').addClass('required');
				$('#emp_re_pass').addClass('required');
				alert('กรุณาป้อน password ให้ตรงกันค่ะ');
				$('#emp_re_pass').focus();
				return true;
			} else {
				return false;
			}
		}

		function addInputPassword() {
			var inputPassHTML = '<tr>'
							  + '	<td colspan=2>'
							  + '		<label>รหัสผ่าน</label>'
							  + '		<input id="emp_pass" name="emp_pass" type="password" class="form-input full">'
							  + '	</td>'
							  + '</tr>'
							  + '<tr>'
							  + '	<td colspan=2>'
							  + '		<label>ป้อนรหัสผ่านอีกครั้ง</label>'
							  + '		<input id="emp_re_pass" name="emp_re_pass" type="password" class="form-input full">'
							  + '	</td>'
							  + '</tr>';
			$('#tableforAddPass tbody').append(inputPassHTML);

			function removeRequired(input) {
				if (input.val() != '') {
		            input.removeClass('required');
		        }
			}

			// Add event for remove required
			$('#emp_pass').focusout(function(){
				removeRequired($(this));
			});
			$('#emp_re_pass').focusout(function(){
				removeRequired($(this));
			});
		}

		function resetPass() {
			//var oldRequired = $('input[name="requiredFields"]').val();
			//$('input[name="requiredFields"]').val(oldRequired + ',emp_pass,emp_re_pass');
			$('#trResetPass').remove();
			addInputPassword();
		}
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 	 
	<div class="ftb-body">
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<div class="table-view-detail-image full">
		<img src="<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_pic']) {?>../img/employees/<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
<?php } else { ?>../img/backoffice/no-pic.png<?php }?>">
	</div>
	<table class="table-view-detail">
		<tbody>
			<tr>
				<td>รหัสพนักงาน :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>คำนำหน้าชื่อ :</td>
				<td><div id="title_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>ชื่อพนักงาน :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_name']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>นามสกุล :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_surname']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>เพศ :</td>
				<td><div id="sex_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>ตำแหน่ง :</td>
				<td><div id="pos_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>ที่อยู่ :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_addr']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_addr'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>เบอร์โทรศัพท์ :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_tel']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_tel'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>วันเกิด :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_birthdate']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_birthdate'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>วันที่เข้าทำงาน :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_indate']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_indate'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>ชื่อผู้ใช้งาน :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_user']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_user'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="pos_id,title_id,emp_name,emp_surname,emp_addr,emp_tel,emp_indate,sex_id">
    <input type="hidden" name="uniqueFields" value="emp_user">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<label class="input-required">คำนำหน้าชื่อ</label>
					<div id="title_id" class="select-reference form-input half"></div>
				</td>
				<td>
					<label class="input-required">เพศ</label>
					<div id="sex_id" class="select-reference form-input half"></div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label class="input-required">ชื่อพนักงาน</label>
					<input id="emp_name" name="emp_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label class="input-required">นามสกุล</label>
					<input id="emp_surname" name="emp_surname" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
">
	
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">ตำแหน่ง</label>
					<div id="pos_id" class="select-reference form-input half"></div>
				</td>
				<td>
					<label class="input-required">วันที่เข้าทำงาน</label>
					<input id="emp_indate" name="emp_indate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_indate'];?>
">
				</td>
			</tr>
		</tbody>
    </table>
	<table id="tableforAddPass" class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
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
					<label class="input-required">เบอร์โทรศัพท์</label>
					<input id="emp_tel" name="emp_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_tel'];?>
">
				</td>
				<td>
					<label>วันเกิด</label>
					<input id="emp_birthdate" name="emp_birthdate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_birthdate'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label>ชื่อผู้ใช้งาน</label>
					<input id="emp_user" name="emp_user" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_user'];?>
">
				</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
			<tr id="trResetPass">
				<td colspan="2">
					<a href="javascript:resetPass();" class="normal-link">ตั้งรหัสผ่านใหม่</a>
				</td>
			</tr>
			<?php }?>
	    </tbody>
    </table>
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
	    	<tr>
	    		<td>
					<div id="emp_pic" class="uploadImageArea full"></div>
					<input type="hidden" name="emp_pic" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
">
				</td>
	    	</tr>
	    </tbody>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="emp_pic_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
	</form>
	<?php }?>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
