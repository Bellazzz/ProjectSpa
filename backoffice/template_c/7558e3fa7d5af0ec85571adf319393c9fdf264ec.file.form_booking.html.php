<?php /* Smarty version Smarty-3.1.18, created on 2014-10-25 13:17:45
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_booking.html" */ ?>
<?php /*%%SmartyHeaderCode:16012544b4089eb9b23-92841365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7558e3fa7d5af0ec85571adf319393c9fdf264ec' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_booking.html',
      1 => 1414207878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16012544b4089eb9b23-92841365',
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
    'randNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544b408a416953_61374523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544b408a416953_61374523')) {function content_544b408a416953_61374523($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/datetimepicker/jquery.datetimepicker.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../inc/datetimepicker/jquery.datetimepicker.js"></script> 
	<script type="text/javascript" src="../inc/datetimepicker/mbk.datetimepickerThai.js"></script>
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
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
<?php }?>'
			});
			//	 	

			$('#bkg_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#bkg_date').blur();
                },
                timepicker:false
            });
			$('#bkg_transfer_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#bkg_transfer_date').blur();
                },
                timepicker:false
            });
			 $('#bkg_time').datetimepicker({
                datepicker:false,
                format:'H:i'
            });
			  $('#bkg_transfer_time').datetimepicker({
                datepicker:false,
                format:'H:i'
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
	<table class="table-view-detail">
		<tbody> 			
			<tr>
				<td>รหัสการจอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>พนักงานที่บันทึก :</td>
				<td><div id="emp_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>ผู้ใช้บริการที่ทำการจอง :</td>
				<td><div id="cus_id" class="select-reference text"></td>
			</tr>
			<tr>
				<td>วันที่จอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_date'];?>
</td>
			</tr>
			<tr>
				<td>เวลาที่จอง :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_time'];?>
 น.</td>
			</tr>
			<tr>
				<td>ราคารวมการจองทั้งหมด :</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['values']->value['bkg_total_price']!='-') {?>
						<?php echo number_format($_smarty_tpl->tpl_vars['values']->value['bkg_total_price'],2,".",",");?>
 บาท
					<?php } else { ?>
						-
					<?php }?>
				</td>
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
				<td>
					<?php if ($_smarty_tpl->tpl_vars['values']->value['bkg_transfer_time']!='-') {?>
						<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_time'];?>
 น.
					<?php } else { ?>
						-
					<?php }?>
				</td>
			</tr>
			<tr>
				<td>จำนวนเงินที่โอน :</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['values']->value['bkg_transfer_money']!='-') {?>
						<?php echo number_format($_smarty_tpl->tpl_vars['values']->value['bkg_transfer_money'],2,".",",");?>
 บาท
					<?php } else { ?>
						-
					<?php }?>
				</td>
			</tr>
		</tbody>
	</table>
	<label>รูปภาพหลักฐานการโอนเงิน</label>
	<div class="table-view-detail-image full">
		<img src="<?php if ($_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence']!='-') {?>../img/booking/<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence'];?>
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
<?php } else { ?>../img/backoffice/no-pic.png<?php }?>">
	</div>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 	 	 	 	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="cus_id,emp_id,status_id,bkg_total_price,bkg_date,bkg_time">
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="2">
					<label class="input-required">พนักงานที่บันทึก</label>
					 <div id="emp_id" class="select-reference form-input full" require></div>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_id-require" class="errInputMsg err-emp_id">โปรดเลือกพนักงานที่บันทึก</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label class="input-required">ผู้ใช้บริการที่ทำการจอง</label>
					 <div id="cus_id" class="select-reference form-input full" require></div>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-cus_id-require" class="errInputMsg err-cus_id">โปรดเลือกผู้ใช้บริการที่ทำการจอง</span>
                </td>
            </tr>
            <tr>
            	<td>
					<label class="input-required">วันที่จอง</label>
					<input id="bkg_date" name="bkg_date" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_date'];?>
" require>
				</td>
				<td>
					<label class="input-required">เวลาที่จอง</label>
					<input id="bkg_time" name="bkg_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_time'];?>
" require>
				</td>
            </tr>
            <tr class="errMsgRow">
                <td>
                    <span id="err-bkg_date-require" class="errInputMsg half err-bkg_date">โปรดป้อนวันที่จอง</span>
                </td>
                <td>
                    <span id="err-bkg_time-require" class="errInputMsg half err-bkg_time">โปรดป้อนเวลาที่จอง</span>
                </td>
            </tr>
            <tr>
				<td colspan="2">
					<label class="input-required">ราคารวมการจอง(บาท)</label>
					<input id="bkg_total_price" name="bkg_total_price" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_total_price'];?>
" valuepattern="money" require>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-bkg_total_price-require" class="errInputMsg err-bkg_total_price">โปรดป้อนราคารวมการจอง</span>
                    <span id="err-bkg_total_price-money" class="errInputMsg err-bkg_total_price">รูปแบบจำนวนเงินไม่ถูกต้อง จำนวนเงินเป็นได้เฉพาะตัวเลข ไม่มีคอมม่าคั่น จุดทศนิยม 2 ตำแหน่ง เช่น 130, 1600.25</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label class="input-required">สถานะการจอง</label>
					 <div id="status_id" class="select-reference form-input full" require></div>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-status_id-require" class="errInputMsg err-status_id">โปรดเลือกสถานะการจอง</span>
                </td>
            </tr>
		</tbody>
    </table>
    <label class="article-title">ข้อมูลการชำระเงิน</label>
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="2">
					<label>บัญชีธนาคาร</label>
					 <div id="bnkacc_id" class="select-reference form-input full"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>วันที่โอน</label>
                	<input id="bkg_transfer_date" name="bkg_transfer_date" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_date'];?>
">
                </td>
                <td>
					<label>เวลาที่โอน</label>
                	<input id="bkg_transfer_time" name="bkg_transfer_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_time'];?>
">
                </td>
			</tr>
			<tr>
				<td colspan="2">
					<label>จำนวนเงินที่โอน(บาท)</label>
					<input id="bkg_transfer_money" name="bkg_transfer_money" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_money'];?>
">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>รูปภาพหลักฐานการโอนเงิน</label>
					<div id="bkg_transfer_evidence" class="uploadImageArea full"></div>
					<input type="hidden" name="bkg_transfer_evidence" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_transfer_evidence'];?>
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
