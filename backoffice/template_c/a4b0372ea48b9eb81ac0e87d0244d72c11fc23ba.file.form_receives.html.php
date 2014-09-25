<?php /* Smarty version Smarty-3.1.18, created on 2014-09-25 22:41:25
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_receives.html" */ ?>
<?php /*%%SmartyHeaderCode:1024154242082a85aa6-95182787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4b0372ea48b9eb81ac0e87d0244d72c11fc23ba' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_receives.html',
      1 => 1411656073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1024154242082a85aa6-95182787',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54242082da6023_76588523',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'nowDate' => 0,
    'ord_date' => 0,
    'values' => 0,
    'session_emp_id' => 0,
    'receiveDetailList' => 0,
    'recdlt' => 0,
    'sum_amount' => 0,
    'recPrdList' => 0,
    'recPrd' => 0,
    'ordPrdList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54242082da6023_76588523')) {function content_54242082da6023_76588523($_smarty_tpl) {?><!DOCTYPE html>
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
    <script type="text/javascript" src="../inc/datetimepicker/mbk.datetimepickerThai.js"></script>
    <script type="text/javascript" src="../js/mbk_common_function.js"></script>
    <script type="text/javascript" src="../js/mbk_main.js"></script>
    <script type="text/javascript" src="../js/mbk_form_table.js"></script>
    <script type="text/javascript" src="../js/form_receives.js"></script>
    <style type="text/css">
        #receives-product-list {
            border-collapse: collapse;
            width: 100%;
        }
        #receives-product-list th {
            color: #ffffff;
            background-color: #555555;
            border: 1px solid #555555;
            padding: 5px;
            vertical-align: top;
            text-align: center;
            white-space: nowrap;
        }
        #receives-product-list td {
            border:1px solid #ddd;
            padding: 5px;
        }
        tr.tfootSummary {
            background: none;
        }
        tr.tfootSummary td {
            background: white;
        }
        #receives-product-list input[type="text"] {
            text-align: right;
            outline: none;
            border: 1px solid #ccc;
            padding: 5px;
            width: 100%;
        }
        #receives-product-list input[type="text"]:hover, #receives-product-list input[type="text"]:focus {
            border: 1px solid #666;
        }
        #receives-product-list input[type="text"].required, #receives-product-list input[type="text"].required:hover {
            border-color: rgb(216, 0, 0);
        }
        #receives-product-list #total_price, #receives-product-list #total_amount {
            font-weight: bold;
        }
    </style>
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
        var ajaxUrl     = 'form_receives.php';
        var nowDate     = '<?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
';
        var ordDate     = '<?php echo $_smarty_tpl->tpl_vars['ord_date']->value;?>
';

        $(document).ready(function () {
            selectReference({
                elem            : $('#ord_id'),
                tableName       : 'orders',
                keyFieldName    : 'ord_id',
                textFieldName   : 'ord_id',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['ord_id'];?>
',
                condition       : "ordstat_id != 'OS03'",
                onOptionSelect  : changeOrderId,
                allowChangeOption : allowChangeOrderId
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
             

            $('#rec_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#rec_date').blur();
                },
                 onShow:function( ct ){
                    setMinDate(this);
                }
            });

            // Calculate auto
            if(action == 'EDIT') {
                calculate();
                addEventRecPrdTable();
            }
       
        });

        function setMinDate(datepicker) {
            if(ordDate != '') {
                datepicker.setOptions({
                    minDate: realDateToTmpDate(ordDate)
                });
            } else {
                datepicker.setOptions({
                    minDate: realDateToTmpDate(nowDate)
                });
            }
        }

        function setOrdDate(date) {
            ordDate = date;
        }
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">  
    <?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
    <!-- VIEW_DETAIL -->
    <!--Orders Data-->
    <label class="article-title">ข้อมูลการรับ</label>
    <table class="table-view-detail">
        <tbody>
            <tr>
                <td>รหัสการรับ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>
             <tr>
                <td>รหัสการสั่งซื้อ :</td>
                <td>
                    <a class="normal-link" href="form_orders.php?action=VIEW_DETAIL&code=<?php echo $_smarty_tpl->tpl_vars['values']->value['ord_id'];?>
" title="คลิกเพื่อดูรายละเอียด"><?php echo $_smarty_tpl->tpl_vars['values']->value['ord_id'];?>
</a>
                </td>
            </tr>
            <tr>
                <td>ชื่อ-นามสกุลพนักงาน :</td>
                <td><div id="emp_id" class="select-reference text"></td>
            </tr>
             <tr>
                <td>วันที่รับผลิตภัณฑ์ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['rec_date_th'];?>
</td>
            </tr>
        </tbody>
    </table>
    <!--Receives Details Data-->
    <label class="article-title">รายการผลิตภัณฑ์ที่รับ</label>
    <table class="view-detail-reference">
        <thead>
            <tr>
                <th>ผลิตภัณฑ์</th>
                <th>หน่วบนับ</th>
                <th>ราคา/หน่วย (บาท)</th>
                <th>จำนวนที่รับ</th>
                <th>ราคารวม (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['recdlt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recdlt']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['receiveDetailList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recdlt']->key => $_smarty_tpl->tpl_vars['recdlt']->value) {
$_smarty_tpl->tpl_vars['recdlt']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['recdlt']->key;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['recdlt']->value['prd_name'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['recdlt']->value['unit_name'];?>
</td>
                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['recdlt']->value['recdtl_price'],2,".",",");?>
</td>
                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['recdlt']->value['recdtl_amount'],0,'',",");?>
</td>
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['recdlt']->value['sum_price'];?>
</td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="tfootSummary">
                <td align="right" colspan="3">รวมทั้งหมด</td>
                <td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['sum_amount']->value,0,'',",");?>
</b></td>
                <td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['values']->value['rec_total_price'],2,".",",");?>
</b></td>
            </tr>
        </tfoot>
    </table>
    <?php } else { ?>      
    <!-- ADD, EDIT -->    
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="ord_id,emp_id,rec_date,rec_total_price">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td>
                    <label class="input-required">รหัสการสั่งซื้อผลิตภัณฑ์</label>
                      <div id="ord_id" class="select-reference form-input half" > </div>
                </td>
                <td>
                    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
                    <div id="emp_id" class="select-reference form-input half" > </div>
                </td>
                <td class="samerow">
                    <label class="input-required">วันที่รับผลิตภัณฑ์</label>
                      <input id="rec_date" name="rec_date" type="text" class="mbk-dtp-th form-input half" value="<?php if ($_smarty_tpl->tpl_vars['values']->value['rec_date']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['rec_date'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['nowDate']->value;?>
<?php }?>">
                </td>
            </tr>
	    </tbody>
    </table>
    <div id="receives-product-list-container">
    <?php if ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
        <table id="receives-product-list">
            <tr>
                <th>ลำดับ</th>
                <th>ผลิตภัณฑ์</th>
                <th>จำนวนที่สั่ง</th>
                <th>หน่วยนับ</th>
                <th>จำนวนที่รับ</th>
                <th>ราคาต่อหน่วย (บาท)</th>
                <th>ราคารวม</th>
                <th>คงเหลือ</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['recPrd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recPrd']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recPrdList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recPrd']->key => $_smarty_tpl->tpl_vars['recPrd']->value) {
$_smarty_tpl->tpl_vars['recPrd']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['recPrd']->key;
?>
            <tr>
                <td align="center">
                    <?php echo $_smarty_tpl->tpl_vars['recPrd']->value['no'];?>

                    <input type="hidden" name="prd_id[]" value="<?php echo $_smarty_tpl->tpl_vars['recPrd']->value['prd_id'];?>
">
                    <input type="hidden" name="recdtl_id[]" value="<?php echo $_smarty_tpl->tpl_vars['recPrd']->value['recdtl_id'];?>
">
                </td>
                <td>
                    <span class="prd_name"><?php echo $_smarty_tpl->tpl_vars['recPrd']->value['prd_name'];?>
</span>
                </td>
                <td align="right">
                    <span class="ordPrd_amount"><?php echo $_smarty_tpl->tpl_vars['ordPrdList']->value[$_smarty_tpl->tpl_vars['recPrd']->value['prd_id']]['amount'];?>
</span>
                </td>
                <td align="center">
                    <span class="unit_name"><?php echo $_smarty_tpl->tpl_vars['recPrd']->value['unit_name'];?>
</span>
                </td>
                <td>
                    <input type="text" name="recdtl_amount[]" value="<?php echo $_smarty_tpl->tpl_vars['recPrd']->value['recdtl_amount'];?>
" min="0" max="<?php echo $_smarty_tpl->tpl_vars['ordPrdList']->value[$_smarty_tpl->tpl_vars['recPrd']->value['prd_id']]['amount'];?>
">
                </td>
                <td>
                    <input type="text" name="recdtl_price[]" value="<?php echo $_smarty_tpl->tpl_vars['recPrd']->value['recdtl_price'];?>
">
                </td>
                <td align="right">
                    <span class="sum_price"></span>
                </td>
                <td align="right">
                    <span class="remain"></span>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="6" align="right">
                    รวม
                </td>
                <td align="right">
                    <span id="total_price"></span>
                    <input type="hidden" name="rec_total_price" value="0">
                </td>
                <td align="right">
                    <span id="total_amount"></span>
                </td>
            </tr>
        </table>
    <?php }?>
    </div>
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
