<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 22:13:03
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_orders.html" */ ?>
<?php /*%%SmartyHeaderCode:379654217fef13e676-32576520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '162b5a1559ed76f7da3b10d56ea4271e32e1a227' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_orders.html',
      1 => 1411442280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '379654217fef13e676-32576520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'valuesDetail' => 0,
    'values' => 0,
    'session_emp_id' => 0,
    'nowDate' => 0,
    'orderDetailList' => 0,
    'orddlt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54217fef4fd2b9_84314457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54217fef4fd2b9_84314457')) {function content_54217fef4fd2b9_84314457($_smarty_tpl) {?><!DOCTYPE html>
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
    <style type="text/css">
        #order-detail-table tr:nth-child(3) .removeProductBtn {
            display: none;
        }
    </style>
    <script type="text/javascript">
        // Global variables
        var action          = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';
        var tableName       = '<?php echo $_smarty_tpl->tpl_vars['tableName']->value;?>
';
		var tableNameTH     = '<?php echo $_smarty_tpl->tpl_vars['tableNameTH']->value;?>
';
        var code            = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
        var ajaxUrl         = 'form_orders.php';
        var valuesDetail    = '';

        // Set valuesDetail
        
        <?php if ($_smarty_tpl->tpl_vars['valuesDetail']->value) {?>
        
            valuesDetail= <?php echo json_encode($_smarty_tpl->tpl_vars['valuesDetail']->value);?>
;
        
        <?php }?>
        

        $(document).ready(function () {
            $('#addProjectBtn').click(addProduct);

            selectReference({
                elem			: $('#ordtyp_id'),
                tableName		: 'order_types',
                keyFieldName	: 'ordtyp_id',
                textFieldName	: 'ordtyp_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['ordtyp_id'];?>
',
				
            });
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
                elem            : $('#comp_id'),
                tableName       : 'companies',
                keyFieldName    : 'comp_id',
                textFieldName   : 'comp_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_id'];?>
',
                
            });
            selectReference({
                elem            : $('#ordstat_id'),
                tableName       : 'order_status',
                keyFieldName    : 'ordstat_id',
                textFieldName   : 'ordstat_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['ordstat_id'];?>
',
                
            });

			$('#ord_date').datetimepicker({
                lang:'th',
                format:'Y/m/d',
                closeOnDateSelect:true,
                onShow:function( ct ){
                    this.setOptions({
                        minDate: '<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
',
                        maxDate:$('#ord_snd_date').val()?$('#ord_snd_date').val():false
                    })
                },
                timepicker:false
            });

            $('#ord_snd_date').datetimepicker({
                lang:'th',
                format:'Y/m/d',
                closeOnDateSelect:true,
                onShow:function( ct ){
                    this.setOptions({
                        minDate:$('#ord_date').val()?$('#ord_date').val():'<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
'
                    })
                },
                timepicker:false
            });

            // Create product input
            if(action == 'ADD') {
                addProduct({
                    defaultValue : false
                });
            } else if(action == 'EDIT') {
                for(i in valuesDetail) {
                     addProduct({
                        defaultValue : true,
                        orddtl_id   : valuesDetail[i].orddtl_id,
                        prd_id      : valuesDetail[i].prd_id,
                        prd_qty     : valuesDetail[i].orddtl_amount
                    });
                }
            }

            // Check date
            $('#ord_date').change(function(){
                checkDate($(this), $('#ord_snd_date'));
            });
            $('#ord_snd_date').change(function() {
                checkDate($(this), $('#ord_date'));
            });

            function checkDate(self, sibling) {
                var selfDate        = new Date(self.val());
                var siblingDate     = new Date(sibling.val());
                var nowDate         = new Date('<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
');
                var selfId          = self.attr('id');
                

                if(selfId == 'ord_date') {
                    if(selfDate.getTime() > siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                    } else if(selfDate.getTime() < nowDate.getTime()) {
                        showAlertInvalidDate(self, 'lessThanNow')
                    }
                } else if(selfId == 'ord_snd_date') {
                    if(selfDate.getTime() < siblingDate.getTime()) {
                        showAlertInvalidDate(self, 'overSibling');
                    } else if(selfDate.getTime() < nowDate.getTime()) {
                        showAlertInvalidDate(self, 'lessThanNow')
                    }
                }
            }
            function showAlertInvalidDate(self, errType) {
                var titleTxt    = '';
                var messageTxt  = '';
                var descTxt     = '';
                var selfId      = self.attr('id');

                if(selfId == 'ord_date') {
                    titleTxt    = 'วันที่สั่งซื้อไม่ถูกต้อง';
                    descTxt     = 'ป้อนวันที่สั่งซื้อใหม่';
                    if(errType == 'overSibling') {
                        messageTxt  = 'วันที่สั่งซื้อไม่สามารถอยู่หลังวันที่จัดส่งได้ค่ะ';
                    } else if(errType == 'lessThanNow') {
                        messageTxt  = 'ไม่สามารถป้อนวันที่สั่งซื้อย้อนหลังได้ค่ะ';
                    }
                } else if(selfId == 'ord_snd_date') {
                    titleTxt    = 'วันที่จัดส่งไม่ถูกต้อง';
                    descTxt     = 'ป้อนวันที่จัดส่งใหม่';
                    if(errType == 'overSibling') {
                        messageTxt  = 'วันที่จัดส่งไม่สามารถอยู่ก่อนหน้าวันที่สั่งซื้อได้ค่ะ';
                    } else if(errType == 'lessThanNow') {
                        messageTxt  = 'ไม่สามารถป้อนวันที่จัดส่งย้อนหลังได้ค่ะ';
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
        });
        
        function addProduct(data) {
            var randNum;
            var selectRefDefault = '';
            do {
                randNum     = parseInt(Math.random()*1000);
            } while($('prd_id_' + randNum).length > 0);
            var inputKeyId  = 'prd_id_' + randNum;
            var inputQtyId  = 'prd_qty_' + randNum;

            // Create HTML and append
            var prdRowHTML  = '<tr class="product-row">'
                            + '     <td>'
                            + '         <div id="' + inputKeyId + '" class="select-reference form-input half" ></div>'
                            + '     </td>'
                            + '     <td>';

            // add input product amount
            if(data.defaultValue) {
                prdRowHTML += '         <input id="' + inputQtyId + '" name="prd_qty[]" type="text" class="form-input half" value="' + data.prd_qty + '">';
                selectRefDefault = data.prd_id;
            } else {
                prdRowHTML += '         <input id="' + inputQtyId + '" name="prd_qty[]" type="text" class="form-input half">';
            }

            // add order detail id for update
            if(action == 'EDIT' && typeof(data.orddtl_id) != 'undefined') {
                prdRowHTML += '         <input name="orddtl_id[]" type="hidden" value="' + data.orddtl_id + '">';
            }

                prdRowHTML += '         <button class="removeProductBtn button button-icon button-icon-delete" onclick="removeProduct(\'' + randNum + '\')"></button>'
                            + '     </td>'
                            + '</tr>';
            $('#order-detail-table tbody').append(prdRowHTML);

            // Create select reference
            selectReference({
                elem            : $('#' + inputKeyId),
                tableName       : 'products',
                keyFieldName    : 'prd_id',
                textFieldName   : 'prd_name',
                searchTool      : true,
                defaultValue    : selectRefDefault,
                allowChangeOption : allowSelectPrdId,
                success         : 
                function() {
                    $('input[name="' + inputKeyId + '"]').attr('name', 'prd_id[]');
                }
            });
        }

        function removeProduct(randNum) {
            // Remove html
            $('#prd_id_' + randNum).parent().parent().remove();
        }

        function beforeSaveRecord() {
            // Check product input required
            var returnVal = false;
            $('input[name="prd_id[]"]').each(function() {
                if($(this).val() == '') {
                    $(this).parent().addClass('required');
                    returnVal = true;
                }
            });
            $('input[name="prd_qty[]"]').each(function() {
                if($(this).val() == '') {
                    $(this).addClass('required');
                    returnVal = true;
                }
            });
            return returnVal;
        }

        function allowSelectPrdId(selected) {
            var notDuplicate = true;
            $('input[name="prd_id[]"]').each(function() {
                if($(this).val() == selected) {
                     parent.showActionDialog({
                        title: 'ท่านเลือกผลิตภัณฑ์นี้แล้ว',
                        message: 'รายการผลิตภัณฑ์ไม่สามารถซ้ำกันได้ค่ะ',
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
                    notDuplicate = false;
                }
            });
            return notDuplicate;
        }
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
    <!-- VIEW_DETAIL -->
    <!--Orders Data-->
    <label class="article-title">ข้อมูลการสั่งซื้อ</label>
    <table class="table-view-detail">
        <tbody>
            <tr>
                <td>รหัสการสั่งซื้อ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>
            <tr>
                <td>ชื่อ-นามสกุลพนักงาน :</td>
                <td><div id="emp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>บริษัทจำหน่ายผลิตภัณฑ์ :</td>
                <td><div id="comp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ประเภทการสั่งซื้อ :</td>
                <td><div id="ordtyp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>วันที่สั่งซื้อ :</td>
                <td><?php if ($_smarty_tpl->tpl_vars['values']->value['ord_date']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['ord_date_th'];?>
<?php } else { ?>-<?php }?></td>
            </tr>
            <tr>
                <td>วันที่จัดส่ง :</td>
                <td><?php if ($_smarty_tpl->tpl_vars['values']->value['ord_snd_date']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['ord_snd_date_th'];?>
<?php } else { ?>-<?php }?></td>
            </tr>
            <tr>
                <td>สถานะการสั่งซื้อ :</td>
                <td><div id="ordstat_id" class="select-reference text"></td>
            </tr>
        </tbody>
    </table>
    <!--Order Details Data-->
    <label class="article-title">รายการผลิตภัณฑ์ที่สั่งซื้อ</label>
    <table class="view-detail-reference">
        <thead>
            <tr>
                <th>ผลิตภัณฑ์</th>
                <th>ราคา/หน่วย (บาท)</th>
                <th>จำนวน</th>
                <th>หน่วยนับ</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['orddlt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orddlt']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderDetailList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['orddlt']->key => $_smarty_tpl->tpl_vars['orddlt']->value) {
$_smarty_tpl->tpl_vars['orddlt']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['orddlt']->key;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['prd_name'];?>
</td>
                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['orddlt']->value['prd_price'],2,".",",");?>
</td>
                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['orddlt']->value['orddtl_amount'],0,'',",");?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['unit_name'];?>
</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>      
    <!-- ADD, EDIT -->       
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="ordtyp_id,emp_id,comp_id,ord_date">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td colspan="2">
                    <label class="group-title">ข้อมูลการสั่งซื้อ</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
                    <div id="emp_id" class="select-reference form-input full" ></div>
                </td>
            </tr>
            <tr>
                <td>
				    <label class="input-required">ชื่อบริษัทจำหน่ายผลิตภัณฑ์</label>
				    <div id="comp_id" class="select-reference form-input half" ></div>
			    </td>
                <td>
                    <label class="input-required">ประเภทการสั่งซื้อ</label>
                    <div id="ordtyp_id" class="select-reference form-input half" ></div>
                </td>
		    </tr>
			<tr>
                
			    <td>
                    <label class="input-required">วันที่สั่งซื้อ</label>
                    <input id="ord_date" name="ord_date" type="text" class="form-input half" value="<?php if ($_smarty_tpl->tpl_vars['values']->value['ord_date']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['ord_date'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
<?php }?>">
                </td>
                 <td>
                    <label>วันที่จัดส่ง</label>
                    <input id="ord_snd_date" name="ord_snd_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ord_snd_date'];?>
">
                </td>
		    </tr>
             
	    </tbody>
    </table>

    <table id="order-detail-table" class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="2">
                    <label class="group-title">รายละเอียดการสั่งซื้อ</label>
                </td>
            </tr>
            <tr>
                <td><label class="input-required">ผลิตภัณฑ์</label></td>
                <td><label class="input-required">จำนวน</label></td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>
            <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
            <?php }?>
        </tbody>
    </table>
    <button id="addProjectBtn" class="button button-icon button-icon-add">เพิ่มผลิตภัณฑ์</button>
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
