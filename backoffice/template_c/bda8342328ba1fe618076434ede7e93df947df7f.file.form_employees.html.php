<?php /* Smarty version Smarty-3.1.18, created on 2014-11-18 13:03:27
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_employees.html" */ ?>
<?php /*%%SmartyHeaderCode:28738546ae12fac10f9-87639869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda8342328ba1fe618076434ede7e93df947df7f' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_employees.html',
      1 => 1414720046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28738546ae12fac10f9-87639869',
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
    'randNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_546ae1302716c9_65422218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ae1302716c9_65422218')) {function content_546ae1302716c9_65422218($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_employees.php';
        var sexIdOfTitle = '';

		$(document).ready(function() {
			$('#emp_indate').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#emp_indate').blur();
                },
                timepicker:false
            });

            $('#emp_birthdate').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#emp_birthdate').blur();
                },
                timepicker:false
            });

			selectReference({
                elem			: $('#title_id'),
                tableName		: 'titles',
                keyFieldName	: 'title_id',
                textFieldName	: 'title_name',
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['title_id'];?>
',
                onOptionSelect	: changeTitleId,
                success			:
                function() {
                	if(action == 'EDIT') {
                		changeTitleId();
                	}
                }
            });
            selectReference({
                elem            : $('#sex_id'),
                tableName       : 'sex',
                keyFieldName    : 'sex_id',
                textFieldName   : 'sex_name',
                searchTool      : false,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['sex_id'];?>
',
                beforeShow 		: allowSelectSex
            });
            selectReference({
                elem            : $('#pos_id'),
                tableName       : 'positions',
                keyFieldName    : 'pos_id',
                textFieldName   : 'pos_name',
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['pos_id'];?>
'
            });

			uploadImageInput({
				area: $('#emp_pic'),
				input: $('input[name="emp_pic"]'),
				selector: $('#emp_pic_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_pic']) {?>../img/employees/<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
<?php }?>'
			});

			// Add input password
			if(action == 'ADD') {
				addInputPassword();
			}

			$('#emp_user').focusout(checkUserAndPass);
		});
		
		function beforeSaveRecord() {
			checkUserAndPass();
			return false;
		}

		function addInputPassword() {
			var inputPassHTML = '<tr>'
							  + '	<td colspan=2>'
							  + '		<label>รหัสผ่าน</label>'
							  + '		<input id="emp_pass" name="emp_pass" type="password" class="form-input full">'
							  + '	</td>'
							  + '</tr>'
							   + '<tr class="errMsgRow">'
							  + '	<td colspan="2">'
							  + '		<span id="err-emp_pass-require" class="errInputMsg err-emp_pass">'
							  + '			กรุณาป้อนรหัสผ่าน'
							  + '		</span>'
							  + '	</td>'
							  + '</tr>'
							  + '<tr>'
							  + '	<td colspan=2>'
							  + '		<label>ป้อนรหัสผ่านอีกครั้ง</label>'
							  + '		<input id="emp_re_pass" name="emp_re_pass" type="password" class="form-input full">'
							  + '	</td>'
							  + '</tr>'
							  + '<tr class="errMsgRow">'
							  + '	<td colspan="2">'
							  + '		<span id="err-emp_re_pass-equal" class="errInputMsg err-emp_re_pass">'
							  + '			กรุณาป้อนรหัสผ่านให้ตรงกันค่ะ'
							  + '		</span>'
							  + '	</td>'
							  + '</tr>';

			$('#tableforAddPass tbody').append(inputPassHTML);
			// Add event
			$('#emp_pass').focusout(checkUserAndPass);
			$('#emp_re_pass').focusout(checkUserAndPass);
		}

		function resetPass() {
			$('#trResetPass').remove();
			addInputPassword();
		}

		function checkUserAndPass() {
			if($('#emp_pass').length > 0) {
				// Check username
				if($('#emp_pass').val() != '' || $('#emp_re_pass').val() != '') {
					if($('#emp_user').val() == '') {
						$('#emp_user').addClass('required');
						$('#err-emp_user-require').css('display', 'block');
					}
				}
			}
			
			// Check password
			if($('#emp_user').val() != '' && $('#emp_pass').val() == '') {
				$('#emp_pass').addClass('required');
				$('#err-emp_pass-require').css('display', 'block');
			} else {
				// Clear password error
				$('#emp_pass').removeClass('required');
				$('.err-emp_pass').css('display', 'none');
			}

			// Check re-password
			if($('#emp_pass').val() != $('#emp_re_pass').val()) {
				$('#emp_re_pass').addClass('required');
				$('#err-emp_re_pass-equal').css('display', 'block');
			} else {
				// Clear re-password error
				$('#emp_re_pass').removeClass('required');
				$('.err-emp_re_pass').css('display', 'none');
			}
		}

		function changeTitleId() {
			var titleId = $('input[name="title_id"]').val();
			if(titleId != '') {
				$.ajax({
					url: '../common/ajaxGetSexOfTitle.php',
					data: {
						title_id: titleId
					},
					success:
					function(responseJSON) {
						var response = $.parseJSON(responseJSON);
						if(response.status == 'PASS') {
							if(response.sex_id != '') {
								sexIdOfTitle = response.sex_id;
								$('#sex_id_' + response.sex_id).click();
							} else {
								sexIdOfTitle = '';
							}
						} else {
							alert(response.status);
						}
					}
				});
			} else {
				sexIdOfTitle = '';
			}
		}

		function allowSelectSex() {
			if(sexIdOfTitle == '') {
				return true;
			} else {
				var msg = 'คำนำหน้าชื่อ ' + $('#title_id').find('.select-reference-text').text()
						+ ' ถูกระบุให้เป็นได้เฉพาะเพศ' + $('#sex_id').find('.select-reference-text').text()
						+ 'เท่านั้น';
				parent.showActionDialog({
	                title: 'ไม่สามารถเลือกเพศได้',
	                message: msg,
	                actionList: [
	                    {
	                        id: 'ok',
	                        name: 'ตกลง',
	                        func:
	                        function() {
	                            parent.hideActionDialog();
	                        }
	                    }
	                ],
	                boxWidth: 400
	            });
				return false;
			}
		}
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body"> 	 
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<div class="table-view-detail-image full">
		<img src="<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_pic']!='-') {?>../img/employees/<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_pic'];?>
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
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
				<td>ชื่อพนักงาน :</td>
				<td><div id="title_id" class="select-reference text"></div><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_name']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
<?php } else { ?>-<?php }?> <?php if ($_smarty_tpl->tpl_vars['values']->value['emp_surname']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<!--<tr>
				<td>ชื่อพนักงาน :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_name']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>นามสกุล :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['emp_surname']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
<?php } else { ?>-<?php }?></td>
			</tr>-->
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
					<div id="title_id" class="select-reference form-input half" require></div>
				</td>
				<td>
					<label class="input-required">เพศ</label>
					<div id="sex_id" class="select-reference form-input half" require></div>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td>
                    <span id="err-title_id-require" class="errInputMsg half err-title_id">โปรดเลือกคำนำหน้าชื่อ</span>
                </td>
                <td>
                	<span id="err-sex_id-require" class="errInputMsg half err-sex_id">โปรดเลือกเพศ</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label class="input-required">ชื่อพนักงาน</label>
					<input id="emp_name" name="emp_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_name'];?>
" valuepattern="character" require>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_name-require" class="errInputMsg err-emp_name">โปรดป้อนชื่อพนักงาน</span>
                    <span id="err-emp_name-character" class="errInputMsg err-emp_name">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label class="input-required">นามสกุล</label>
					<input id="emp_surname" name="emp_surname" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_surname'];?>
" valuepattern="character" require>
	
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_surname-require" class="errInputMsg err-emp_surname">โปรดป้อนนามสกุล</span>
                    <span id="err-emp_surname-character" class="errInputMsg err-emp_surname">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                </td>
            </tr>
			<tr>
				<td>
					<label class="input-required">ตำแหน่ง</label>
					<div id="pos_id" class="select-reference form-input half" require></div>
				</td>
				<td>
					<label class="input-required">วันที่เข้าทำงาน</label>
					<input id="emp_indate" name="emp_indate" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_indate'];?>
" require>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td>
                    <span id="err-pos_id-require" class="errInputMsg half err-pos_id">โปรดเลือกตำแหน่ง</span>
                </td>
                <td>
                	<span id="err-emp_indate-require" class="errInputMsg half err-emp_indate">โปรดป้อนวันที่เข้าทำงาน</span>
                </td>
            </tr>
			<tr>
				<td colspan=2>
					<label class="input-required">ที่อยู่</label>
					<textarea id="emp_addr" name="emp_addr" class="form-input full" require><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_addr'];?>
</textarea>
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan=2>
                    <span id="err-emp_addr-require" class="errInputMsg err-emp_addr">โปรดป้อนที่อยู่</span>
                </td>
            </tr>
			<tr>
				<td>
					<label class="input-required">เบอร์โทรศัพท์</label>
					<input id="emp_tel" name="emp_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_tel'];?>
" valuepattern="tel" maxlength="10" size="10" require>
				</td>
				<td>
					<label>วันเกิด</label>
					<input id="emp_birthdate" name="emp_birthdate" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_birthdate'];?>
">
				</td>
			</tr>
			<tr class="errMsgRow">
                <td>
                    <span id="err-emp_tel-require" class="errInputMsg half err-emp_tel">โปรดป้อนเบอร์โทรศัพท์</span>
                    <span id="err-emp_tel-tel" class="errInputMsg half err-emp_tel">โปรดกรอกเบอร์โทรเป็นตัวเลข 10 หลัก</span>
                </td>
            </tr>
    	</tbody>
    </table>
    <table id="tableforAddPass" class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan=2>
					<label>ชื่อผู้ใช้งาน</label>
					<input id="emp_user" name="emp_user" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_user'];?>
" valuepattern="username">
				</td>
			</tr>
			<tr class="errMsgRow">
                <td colspan=2>
                    <span id="err-emp_user-require" class="errInputMsg err-emp_user">โปรดป้อนชื่อผู้ใช้งาน</span>
                    <span id="err-emp_user-username" class="errInputMsg err-emp_user">ชื่อผู้ใช้เป็นได้เฉพาะตัวอักษรภาษาอังกฤษและตัวเลขอย่างน้อย 6 ตัวอักษร ห้ามมีช่องว่าง และอักระพิเศษ</span>
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
	    			<label>รูปภาพพนักงาน</label>
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
