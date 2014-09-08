<?php /* Smarty version Smarty-3.1.18, created on 2014-09-08 18:37:59
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_promotions.html" */ ?>
<?php /*%%SmartyHeaderCode:7076540d870700e364-81269186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd5d99e532d3b9b9f841d96cc4dfb58080c44f17' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_promotions.html',
      1 => 1410172532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7076540d870700e364-81269186',
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
  'unifunc' => 'content_540d870739a8b0_04305815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540d870739a8b0_04305815')) {function content_540d870739a8b0_04305815($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_promotions.php';

		$(document).ready(function() {
			 
			uploadImageInput({
				area: $('#prm_picture'),
				input: $('input[name="prm_picture"]'),
				selector: $('#prm_picture_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['prm_picture']) {?>../img/promotions/<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_picture'];?>
<?php }?>'
			});

			$("#prm_startdate").datepicker();
			$("#prm_enddate").datepicker();
			
			
		});
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 
<div class="ftb-body">
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<div class="table-view-detail-image full">
		<img src="../img/promotions/<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_picture'];?>
">
	</div>
	<table class="table-view-detail">
		<tbody> 			
			<tr>
				<td>รหัสโปรโมชั่น :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>ชื่อโปรโมชั่น :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prm_name'];?>
</td>
			</tr>
			<tr>
				<td>จำนวนครั้งที่ใช้บริการ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prm_use_amount'];?>
</td>
			</tr>
			<tr>
				<td>จำนวนครั้งที่ฟรี :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prm_free_amount'];?>
</td>
			</tr>
			<tr>
				<td>วันที่เริ่มใช้ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prm_startdate'];?>
</td>
			</tr>
			<tr>
				<td>วันที่สิ้นสุด :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prm_enddate'];?>
</td>
			</tr>
			
			
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 	 	 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="prm_name,prm_startdate">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<div id="prm_picture" class="uploadImageArea full"></div>
					<input type="hidden" name="prm_picture" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_picture'];?>
">
				</td>
			</tr>
		</tbody>
    </table>
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan=2>
					<label class="input-required">ชื่อโปรโมชั่น</label>
					<input id="prm_name" name="prm_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_name'];?>
">
				</td>
			</tr>
			<tr>
				<td>
					<label>จำนวนครั้งที่ใช้บริการ</label>
					<input id="prm_use_amount" name="prm_use_amount" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_use_amount'];?>
">
				</td>
			
				<td>
					<label>จำนวนครั้งที่ฟรี</label>
					<input id="prm_free_amount" name="prm_free_amount" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_free_amount'];?>
">
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">วันที่เริ่มใช้</label>
                	<input id="prm_startdate" name="prm_startdate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_startdate'];?>
">
                </td>
                <td>
					<label>วันที่สิ้นสุด</label>
                	<input id="prm_enddate" name="prm_enddate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_enddate'];?>
">
                </td>
			</tr>
			
	    </tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="prm_picture_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
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
