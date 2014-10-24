<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 07:49:38
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_promotion_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:236175449988ad55b54-38598837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60ea36815315be1e19cea1ca0304c346f069ae1a' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_promotion_service_lists.html',
      1 => 1414111772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236175449988ad55b54-38598837',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5449988af31e34_92429699',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449988af31e34_92429699')) {function content_5449988af31e34_92429699($_smarty_tpl) {?><!DOCTYPE html>
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
        var ajaxUrl     = 'form_table.php';

        $(document).ready(function () {
            selectReference({
                elem			: $('#svl_id'),
                tableName		: 'service_lists',
                keyFieldName	: 'svl_id',
                textFieldName	: 'svl_name',
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
'
            });

			selectReference({
                elem			: $('#prm_id'),
                tableName		: 'promotions',
                keyFieldName	: 'prm_id',
                textFieldName	: 'prm_name',
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_id'];?>
'
            });

			$('#prmsvl_start').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#prmsvl_start').blur();
                },
                onShow:function( ct ){
                    if(action == 'ADD') {
                    	this.setOptions({
	                        minDate: realDateToTmpDate('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
'),
	                        maxDate:$('#prmsvl_end').val()?unconvertThaiDate($('#prmsvl_end').val()):false
	                    });
                    } else if(action == 'EDIT') {
                    	this.setOptions({
	                        maxDate:$('#prmsvl_end').val()?unconvertThaiDate($('#prmsvl_end').val()):false
	                    });
                    }
                },
                timepicker:false
            });

			$('#prmsvl_end').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#prmsvl_end').blur();
                },
                onShow:function( ct ){
                    if(action == 'ADD') {
                    	this.setOptions({
	                        minDate:$('#prmsvl_start').val()?unconvertThaiDate($('#prmsvl_start').val()):realDateToTmpDate('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
')
	                    });
                    } else if(action="EDIT") {
                    	this.setOptions({
	                        minDate:$('#prmsvl_start').val()?unconvertThaiDate($('#prmsvl_start').val()):false
	                    });
                    }
                },
                timepicker:false
            });

            // Check date
            $('#prmsvl_start').change(function(){
                checkDate($(this), $('#prmsvl_end'));
            });
            $('#prmsvl_end').change(function() {
                checkDate($(this), $('#prmsvl_start'));
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
                if(selfId == 'prmsvl_start') {
                    if(selfDate.getTime() > siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                        return;
                    }
                } else if(selfId == 'prmsvl_end') {
                    if(selfDate.getTime() < siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                        return;
                    }
                }
            }

            if(action == 'ADD') {
            	// Check now date
                if(selfId == 'prmsvl_start') {
                    if(selfDate.getTime() < nowDate.getTime()) {
                        showAlertInvalidDate(self, 'lessThanNow')
                    }
                } else if(selfId == 'prmsvl_end') {
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

            if(selfId == 'prmsvl_start') {
                titleTxt    = 'วันที่เริ่มใช้ไม่ถูกต้อง';
                descTxt     = 'ป้อนวันที่เริ่มใช้ใหม่';
                if(errType == 'overSibling') {
                    messageTxt  = 'วันที่เริ่มใช้ไม่สามารถอยู่หลังวันที่สิ้นสุดได้ค่ะ';
                } else if(errType == 'lessThanNow') {
                    messageTxt  = 'ไม่สามารถป้อนวันที่เริ่มใช้ย้อนหลังได้ค่ะ';
                }
            } else if(selfId == 'prmsvl_end') {
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
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<table class="table-view-detail">
		<tbody> 			
			<tr>
				<td>รหัสรายการบริการที่จัดโปรโมชั่น :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>รหัสรายการบริการ :</td>
				<td>
					<a href="form_table.php?action=VIEW_DETAIL&tableName=service_lists&code=<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
&hideEditButton=true" class="normal-link" title="คลิกเพื่อดูรายละเอียด">
                		<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>

                	</a>
				</td>
			</tr>
			<tr>
				<td>รหัสโปรโมชั่น :</td>
				<td>
					<a href="form_table.php?action=VIEW_DETAIL&tableName=promotions&code=<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_id'];?>
&hideEditButton=true" class="normal-link" title="คลิกเพื่อดูรายละเอียด">
                		<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_id'];?>

                	</a>
				</td>
			</tr>
			<tr>
				<td>ราคา :</td>
				<td><?php echo number_format($_smarty_tpl->tpl_vars['values']->value['prmsvl_price'],2,".",",");?>
 บาท</td>
			</tr>
			<tr>
				<td>วันที่เริ่มใช้ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_start'];?>
</td>
			</tr>
			<tr>
				<td>วันที่สิ้นสุด :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['prmsvl_end']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_end'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
			<tr>
				<td>คำอธิบาย :</td>
				<td><?php if ($_smarty_tpl->tpl_vars['values']->value['prmsvl_desc']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_desc'];?>
<?php } else { ?>-<?php }?></td>
			</tr>
		
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="svl_id,prm_id,prmsvl_price,prmsvl_start">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อรายการบริการ</label>
				    <div id="svl_id" class="select-reference form-input full" require></div>
			    </td>
		    </tr>
		    <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-svl_id-require" class="errInputMsg half err-svl_id">โปรดเลือกรายการบริการ</span>
                </td>
            </tr>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อโปรโมชั่น</label>
				    <div id="prm_id" class="select-reference form-input full" require></div>
			    </td>
		    </tr>
		    <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-prm_id-require" class="errInputMsg half err-prm_id">โปรดเลือกโปรโมชั่น</span>
                </td>
            </tr>
		    <tr>
			    <td colspan="2">
				    <label class="input-required">ราคา (บาท)</label>
				    <input id="prmsvl_price" name="prmsvl_price" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_price'];?>
" valuepattern="money" require>
			    </td>
		    </tr>
		    <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-prmsvl_price-require" class="errInputMsg half err-prmsvl_price">โปรดป้อนราคา</span>
                    <span id="err-prmsvl_price-money" class="errInputMsg err-prmsvl_price">รูปแบบจำนวนเงินไม่ถูกต้อง จำนวนเงินเป็นได้เฉพาะตัวเลข ไม่มีคอมม่าคั่น จุดทศนิยม 2 ตำแหน่ง เช่น 130, 1600.25</span>
                </td>
            </tr>
			<tr>
                <td>
                    <label class="input-required">วันที่เริ่มใช้</label>
				    <input id="prmsvl_start" name="prmsvl_start" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_start'];?>
" require>
			    </td>
			    <td>
				    <label>วันที่สิ้นสุด</label>
				    <input id="prmsvl_end" name="prmsvl_end" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_end'];?>
">
			    </td>
		    </tr>
		    <tr class="errMsgRow">
                <td>
                    <span id="err-prmsvl_start-require" class="errInputMsg half err-prmsvl_start">โปรดป้อนวันที่เริ่มใช้</span>
                </td>
                <td></td>
            </tr>
            <tr>
			    <td colspan="2">
				    <label>คำอธิบาย</label>
					<textarea id="prmsvl_desc" name="prmsvl_desc" class="form-input full"><?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_desc'];?>
</textarea>
			    </td>
		    </tr>
	    </tbody>
    </table>
    </form>
    <?php }?>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
	3.  input[name="uniqueFields"] ใส่ชื่อฟิลด์ที่ต้องการเช็คว่าห้ามซ้ำ
--><?php }} ?>
