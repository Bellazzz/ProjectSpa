<?php /* Smarty version Smarty-3.1.18, created on 2014-09-30 09:55:36
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_booking.html" */ ?>
<?php /*%%SmartyHeaderCode:27282542a0d98956477-98960478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7558e3fa7d5af0ec85571adf319393c9fdf264ec' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_booking.html',
      1 => 1411441024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27282542a0d98956477-98960478',
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
    'session_emp_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542a0d98b4af25_54154518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a0d98b4af25_54154518')) {function content_542a0d98b4af25_54154518($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/datetimepicker/jquery.datetimepicker.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
        var ajaxUrl     = 'form_booking.php';

		$(document).ready(function() {
			 selectReference({
                elem            : $('#emp_id'),
                tableName       : 'employees',
                keyFieldName    : 'emp_id',
                textFieldName   : 'emp_id,emp_name,emp_surname',
                searchTool      : true,
                defaultValue    : '<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_id']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_id'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['session_emp_id']->value;?>
<?php }?>',
                pattern         : 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });
			  selectReference({
                elem            : $('#cus_id'),
                tableName       : 'customers',
                keyFieldName    : 'cus_id',
                textFieldName   : 'cus_id,cus_name,cus_surname',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_id'];?>
',
                pattern         : 'CONCAT("(",cus_id,") ",cus_name," ",cus_surname)'
            });
			  selectReference({
                elem            : $('#status_id'),
                tableName       : 'booking_status',
                keyFieldName    : 'bkgstat_id',
                textFieldName   : 'bkgstat_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['status_id'];?>
',
             
            });
			   selectReference({
                elem            : $('#bnkacc_id'),
                tableName       : 'bank_accounts',
                keyFieldName    : 'bnkacc_id',
                textFieldName   : 'bnkacc_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['bnkacc_id'];?>
',
             
            });
			
			uploadImageInput({
				area: $('#bkg_transfer_evidence'),
				input: $('input[name="bkg_transfer_evidence"]'),
				selector: $('#bkg_transfer_evidence_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence']) {?>../img/booking/<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence'];?>
<?php }?>'
			});
			//	 	

			$('#bkg_date').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});
			$('#bkg_transfer_date').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});
			 $('#bkg_time').datetimepicker({
                datepicker:false,
                format:'H:i',
                minTime:'06:00',
            });
			  $('#bkg_transfer_time').datetimepicker({
                datepicker:false,
                format:'H:i',
                minTime:'06:00',
            });
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
		<img src="../img/booking/<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence'];?>
">
	</div>
	<table class="table-view-detail">
		<tbody> 			
			<tr>
				<td>รหัสการจอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>ชื่อผู้ใช้บริการ :</td>
				<td><div id="cus_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>ชื่อพนักงาน :</td>
				<td><div id="emp_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>สถานะการจอง :</td>
				<td><div id="status_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>บัญชีธนาคาร :</td>
				<td><div id="bnkacc_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>วันที่โอน :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_date'];?>
</td>
			</tr>
			<tr>
				<td>เวลาที่โอน :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_time'];?>
</td>
			</tr>
			<tr>
				<td>ราคารวมการจองทั้งหมด(บาท) :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_total_price'];?>
</td>
			</tr>
			<tr>
				<td>วันที่จอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_date'];?>
</td>
			</tr>
			<tr>
				<td>เวลาที่จอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_time'];?>
</td>
			</tr>
			<tr>
				<td>จำนวนเงินที่โอน(บาท) :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_money'];?>
</td>
			</tr>
			
													
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 	 	 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="cus_id,emp_id,status_id,bnkacc_id,bkg_total_price,bkg_date,bkg_time,bkg_transfer_money">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td>
					<div id="bkg_transfer_evidence" class="uploadImageArea full"></div>
					<input type="hidden" name="bkg_transfer_evidence" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence'];?>
">
				</td>
		</tbody> 											
			</tr> 
    </table>
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<label class="input-required">ชื่อ-นามสกุลผู้ใช้บริการ</label>
					 <div id="cus_id" class="select-reference form-input half" > </div>
				</td>
			
				<td>
					<label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
					 <div id="emp_id" class="select-reference form-input half" > </div>
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">สถานะการจอง</label>
					 <div id="status_id" class="select-reference form-input half" > </div>
				</td>
				<td>
					<label class="input-required">บัญชีธนาคาร</label>
					 <div id="bnkacc_id" class="select-reference form-input half" > </div>
				</td>
			</tr>
			<tr>
				<td>
					<label>วันที่โอน</label>
                	<input id="bkg_transfer_date" name="bkg_transfer_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_date'];?>
">
                </td>
                <td>
					<label>เวลาที่โอน</label>
                	<input id="bkg_transfer_time" name="bkg_transfer_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_time'];?>
">
                </td>
			</tr>
			<tr>
				<td>
					<label class="input-required">ราคารวมการจอง(บาท)</label>
					<input id="bkg_total_price" name="bkg_total_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_total_price'];?>
">
				</td>
				<td>
					<label class="input-required">วันที่จอง</label>
					<input id="bkg_date" name="bkg_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_date'];?>
">
				</td>
			</tr>
			<tr>
				<td>
					<label class="input-required">เวลาที่จอง</label>
					<input id="bkg_time" name="bkg_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_time'];?>
">
				</td>
				<td>
					<label class="input-required">จำนวนเงินที่โอน(บาท)</label>
					<input id="bkg_transfer_money" name="bkg_transfer_money" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_money'];?>
">
				</td>
			</tr>
	    </tbody>
    </table>
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="bkg_transfer_evidence_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
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
