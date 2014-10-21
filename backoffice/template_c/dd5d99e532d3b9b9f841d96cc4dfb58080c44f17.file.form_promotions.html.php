<?php /* Smarty version Smarty-3.1.18, created on 2014-10-21 12:25:18
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_promotions.html" */ ?>
<?php /*%%SmartyHeaderCode:119545445ee3e01a948-92556293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd5d99e532d3b9b9f841d96cc4dfb58080c44f17' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_promotions.html',
      1 => 1413814534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119545445ee3e01a948-92556293',
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
    'nowDate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5445ee3e26d4b7_58329379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5445ee3e26d4b7_58329379')) {function content_5445ee3e26d4b7_58329379($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_promotions.php';

		$(document).ready(function() {
			 
			uploadImageInput({
				area: $('#prm_picture'),
				input: $('input[name="prm_picture"]'),
				selector: $('#prm_picture_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['prm_picture']) {?>../img/promotions/<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_picture'];?>
<?php }?>'
			});

			$('#prm_startdate').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#prm_startdate').blur();
                },
                onShow:function( ct ){
                    if(action == 'ADD') {
                    	this.setOptions({
	                        minDate: realDateToTmpDate('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
'),
	                        maxDate:$('#prm_enddate').val()?unconvertThaiDate($('#prm_enddate').val()):false
	                    });
                    } else if(action == 'EDIT') {
                    	this.setOptions({
	                        maxDate:$('#prm_enddate').val()?unconvertThaiDate($('#prm_enddate').val()):false
	                    });
                    }
                },
                timepicker:false
            });

			$('#prm_enddate').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#prm_enddate').blur();
                },
                onShow:function( ct ){
                    if(action == 'ADD') {
                    	this.setOptions({
	                        minDate:$('#prm_startdate').val()?unconvertThaiDate($('#prm_startdate').val()):realDateToTmpDate('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
')
	                    });
                    } else if(action="EDIT") {
                    	this.setOptions({
	                        minDate:$('#prm_startdate').val()?unconvertThaiDate($('#prm_startdate').val()):false
	                    });
                    }
                },
                timepicker:false
            });

            // Check date
            $('#prm_startdate').change(function(){
                checkDate($(this), $('#prm_enddate'));
            });
            $('#prm_enddate').change(function() {
                checkDate($(this), $('#prm_startdate'));
            });
		});

		function checkDate(self, sibling) {
            // Skip check
            if(self.val() == '' || isDateThaiFormat(self.val())) {
                return;
            }

            var selfDate        = new Date(self.val());
            var siblingDate     = new Date(unconvertThaiDate(sibling.val()));
            var nowDate         = new Date(realDateToTmpDate('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
'));
            var selfId          = self.attr('id');

            // Check sibling
            if(sibling.val() != '') {
                if(selfId == 'prm_startdate') {
                    if(selfDate.getTime() > siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                        return;
                    }
                } else if(selfId == 'prm_enddate') {
                    if(selfDate.getTime() < siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                        return;
                    }
                }
            }

            if(action == 'ADD') {
            	// Check now date
                if(selfId == 'prm_startdate') {
                    if(selfDate.getTime() < nowDate.getTime()) {
                        showAlertInvalidDate(self, 'lessThanNow')
                    }
                } else if(selfId == 'prm_enddate') {
                    if(selfDate.getTime() < nowDate.getTime()) {
                        showAlertInvalidDate(self, 'lessThanNow')
                    }
                }
            }
        }
        function showAlertInvalidDate(self, errType) {
            var titleTxt    = '';
            var messageTxt  = '';
            var descTxt     = '';
            var selfId      = self.attr('id');

            if(selfId == 'prm_startdate') {
                titleTxt    = 'วันที่เริ่มใช้ไม่ถูกต้อง';
                descTxt     = 'ป้อนวันที่เริ่มใช้ใหม่';
                if(errType == 'overSibling') {
                    messageTxt  = 'วันที่เริ่มใช้ไม่สามารถอยู่หลังวันที่สิ้นสุดได้ค่ะ';
                } else if(errType == 'lessThanNow') {
                    messageTxt  = 'ไม่สามารถป้อนวันที่เริ่มใช้ย้อนหลังได้ค่ะ';
                }
            } else if(selfId == 'prm_enddate') {
                titleTxt    = 'วันที่สิ้นสุดไม่ถูกต้อง';
                descTxt     = 'ป้อนวันที่สิ้นสุดใหม่';
                if(errType == 'overSibling') {
                    messageTxt  = 'วันที่สิ้นสุดไม่สามารถอยู่ก่อนหน้าวันที่เริ่มใช้ได้ค่ะ';
                } else if(errType == 'lessThanNow') {
                    messageTxt  = 'ไม่สามารถป้อนวันที่สิ้นสุดย้อนหลังได้ค่ะ';
                }
            }

            if(parent.$('.action-dialog-container').length <= 0) {
                parent.showActionDialog({
                    title: titleTxt,
                    message: messageTxt,
                    actionList: [
                        {
                            id: 'ok',
                            name: 'ตกลง',
                            desc: descTxt,
                            func:
                            function() {
                                parent.hideActionDialog();
                                self.val('');
                                self.focus();
                            }
                        }
                    ],
                    boxWidth: 400
                });
            }
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
				<td colspan=2>
					<label class="input-required">ชื่อโปรโมชั่น</label>
					<input id="prm_name" name="prm_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_name'];?>
" require>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan=2>
                    <span id="err-prm_name-require" class="errInputMsg half err-prm_name">โปรดป้อนชื่อโปรโมชั่น</span>
                </td>
            </tr>
			<tr>
				<td>
					<label>จำนวนครั้งที่ใช้บริการ</label>
					<input id="prm_use_amount" name="prm_use_amount" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_use_amount'];?>
" valuepattern="number">
				</td>
			
				<td>
					<label>จำนวนครั้งที่ฟรี</label>
					<input id="prm_free_amount" name="prm_free_amount" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_free_amount'];?>
" valuepattern="number">
				</td>
			</tr>
			<tr class="errMsgRow">
                <td>
                    <span id="err-prm_use_amount-number" class="errInputMsg half err-prm_use_amount">โปรดกรอกเป็นตัวเลขจำนวนเต็ม</span>
                </td>
                <td>
                    <span id="err-prm_free_amount-number" class="errInputMsg half err-prm_free_amount">โปรดกรอกเป็นตัวเลขจำนวนเต็ม</span>
                </td>
            </tr>
			<tr>
				<td>
					<label class="input-required">วันที่เริ่มใช้</label>
                	<input id="prm_startdate" name="prm_startdate" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_startdate'];?>
" require>
                </td>
                <td>
					<label>วันที่สิ้นสุด</label>
                	<input id="prm_enddate" name="prm_enddate" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_enddate'];?>
">
                </td>
			</tr>
			<tr class="errMsgRow">
                <td>
                    <span id="err-prm_startdate-require" class="errInputMsg half err-prm_startdate">โปรดป้อนวันที่เริ่มใช้</span>
                </td>
                <td></td>
            </tr>
			
	    </tbody>
    </table>
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
