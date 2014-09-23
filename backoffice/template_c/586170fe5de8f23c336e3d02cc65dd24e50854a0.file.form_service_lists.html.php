<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 12:51:58
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:269445420fc6e357561-37945775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '586170fe5de8f23c336e3d02cc65dd24e50854a0' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_service_lists.html',
      1 => 1411015092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269445420fc6e357561-37945775',
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
  'unifunc' => 'content_5420fc6e595353_51260375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5420fc6e595353_51260375')) {function content_5420fc6e595353_51260375($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_service_lists.php';

		$(document).ready(function() {
			//svl_id	svltyp_id	svl_min	svl_hr	svl_name	svl_price	svl_commission	
			//svl_desc	svl_picture
			$("#emp_birthdate").datepicker();

			selectReference({
                elem			: $('#svltyp_id'),
                tableName		: 'service_list_types',
                keyFieldName	: 'svltyp_id',
                textFieldName	: 'svltyp_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['svltyp_id'];?>
'
            });

			uploadImageInput({
				area: $('#svl_picture'),
				input: $('input[name="svl_picture"]'),
				selector: $('#svl_picture_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['svl_picture']) {?>../img/service_lists/<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_picture'];?>
<?php }?>'
			});

			// Set default value of textarea
			$('#svl_desc').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_desc'];?>
');
		});
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<div class="table-view-detail-image full">
		<img src="../img/service_lists/<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_picture'];?>
">
	</div>
	<table class="table-view-detail">
		<tbody>
			<tr>
				<td>รหัสรายการบริการ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>ชื่อรายการบริการ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['svl_name'];?>
</td>
			</tr>
			<tr>
				<td>ประเภทรายการบริการ :</td>
				<td><div id="svltyp_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>เวลาที่ใช้ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['svl_hr'];?>
 ชั่วโมง <?php echo $_smarty_tpl->tpl_vars['values']->value['svl_min'];?>
 นาที</td>
			</tr>
			<tr>
				<td>ราคา :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['svl_price'];?>
 บาท</td>
			</tr>
			<tr>
				<td>ค่าคอมมิชชั่น :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['svl_commission'];?>
 บาท</td>
			</tr>
			<tr>
				<td>คำอธิบาย :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['svl_desc'];?>
</td>
			</tr>
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->		 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="svltyp_id,svl_name,svl_price,svl_commission">
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan=2>
					<label class="input-required">ชื่อรายการบริการ</label>
					<input id="svl_name" name="svl_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_name'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="input-required">ประเภทรายการบริการ</label>
					<div id="svltyp_id" class="select-reference form-input full"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>เวลาที่ใช้(ชั่วโมง)</label>
					<input id="svl_hr" name="svl_hr" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_hr'];?>
">
				</td>
				<td>
					<label>เวลาที่ใช้(นาที)</label>
					<input id="svl_min" name="svl_min" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_min'];?>
">
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">ราคา</label>
					<input id="svl_price" name="svl_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_price'];?>
">
				</td>
				<td>
					<label class="input-required">ค่าคอมมิชชั่น</label>
					<input id="svl_commission" name="svl_commission" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_commission'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label>คำอธิบาย</label>
					<textarea id="svl_desc" name="svl_desc" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_desc'];?>
"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<div id="svl_picture" class="uploadImageArea full"></div>
					<input type="hidden" name="svl_picture" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_picture'];?>
">
				</td>
			</tr>
	    </tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="svl_picture_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
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
