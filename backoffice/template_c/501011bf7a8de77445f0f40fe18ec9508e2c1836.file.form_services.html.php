<?php /* Smarty version Smarty-3.1.18, created on 2014-09-09 23:44:27
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_services.html" */ ?>
<?php /*%%SmartyHeaderCode:4680540f205b385e09-68227040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '501011bf7a8de77445f0f40fe18ec9508e2c1836' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_services.html',
      1 => 1410277456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4680540f205b385e09-68227040',
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
  'unifunc' => 'content_540f205b5278e0_98941632',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540f205b5278e0_98941632')) {function content_540f205b5278e0_98941632($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/datetimepicker/jquery.datetimepicker.css"> <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../inc/datetimepicker/jquery.datetimepicker.js"></script> <!--include if want to use datepicker-->
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
//ser_id    cus_id  emp_id  paytyp_id   bed_id  bkg_id  ser_date    ser_time    ser_total_price
        $(document).ready(function () {
             selectReference({
                elem            : $('#emp_id'),
                tableName       : 'employees',
                keyFieldName    : 'emp_id',
                textFieldName   : 'emp_id,emp_name,emp_surname',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_id'];?>
',
                pattern         : 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });
            selectReference({
                elem			: $('#cus_id'),
                tableName		: 'customers',
                keyFieldName	: 'cus_id',
                textFieldName	: 'cus_id,cus_name,cus_surname',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_id'];?>
',
				pattern			: 'CONCAT("(",cus_id,") ",cus_name," ",cus_surname)'
            });
              selectReference({
                elem            : $('#paytyp_id'),
                tableName       : 'pay_types',
                keyFieldName    : 'paytyp_id',
                textFieldName   : 'paytyp_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['paytyp_id'];?>
'
            });
               selectReference({
                elem            : $('#bed_id'),
                tableName       : 'beds',
                keyFieldName    : 'bed_id',
                textFieldName   : 'bed_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['bed_id'];?>
'
            });
               selectReference({
                elem            : $('#bkg_id'),
                tableName       : 'booking',
                keyFieldName    : 'bkg_id',
                textFieldName   : 'bkg_id',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_id'];?>
'
            });

            $('#ser_date').datetimepicker({
                lang:'th',
                timepicker:false,
                format:'Y-m-d',
                closeOnDateSelect:true
            });
             $('#ser_time').datetimepicker({
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
                        
    </div>
    <table class="table-view-detail">
        <tbody>
            <tr>
                <td>รหัสการใช้บริการ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>
            <tr>
                <td>ผู้ใช้บริการ :</td>
                <td><div id="cus_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>พนักงาน :</td>
                <td><div id="emp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ประเภทการชำระเงิน :</td>
                <td><div id="paytyp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>เตียง :</td>
                <td><div id="bed_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>รหัสการจอง :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['bkg_id'];?>
</td>
            </tr>
            <tr>
                <td>วันที่ใช้บริการ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['ser_date'];?>
</td>
            </tr>
            <tr>
                <td>เวลาที่ใช้บริการ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['ser_time'];?>
</td>
            </tr>
            <tr>
                <td>ราคารวมทั้งหมด(บาท) :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['ser_total_price'];?>
</td>
            </tr>
           
        </tbody> 
    </table> 
    <?php } else { ?>      
    <!-- ADD, EDIT -->             
    <form id="form-table" name="form-table" onsubmit="return false;">
    <input type="hidden" name="requiredFields" value="emp_id,cus_id,paytyp_id,bed_id,ser_date,ser_total_price,ser_time">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td colspan="2">
                    <label class="input-required">ชื่อ-นามสกุลผู้ใช้บริการ</label>
                    <div id="cus_id" class="select-reference form-input full" > </div>
                </td>
            </tr>
			<tr>
			    <td colspan="2">
				    <label class="input-required">พนักงานที่รับเงิน</label>
				    <div id="emp_id" class="select-reference form-input full" > </div>
			    </td>
		    </tr>
			<tr>          
                <td colspan="2">
                    <label class="input-required">ประเภทการชำระเงิน</label>
                    <div id="paytyp_id" class="select-reference form-input full" > </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">ชื่อเตียงนวด</label>
                    <div id="bed_id" class="select-reference form-input half" > </div>
                </td>
                            
                <td>
                    <label>รหัสการจอง</label>
                    <div id="bkg_id" class="select-reference form-input half" > </div>
                </td>
            </tr>
           <tr>
                <td>
                    <label class="input-required">วันที่ใช้บริการ</label>
                      <input id="ser_date" name="ser_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_date'];?>
">
                </td>
                <td>
                    <label class="input-required">เวลาที่ใช้บริการ</label>
                      <input id="ser_time" name="ser_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_time'];?>
">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">ราคารวมทั้งหมด(บาท)</label>
                    <input id="ser_total_price" name="ser_total_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_total_price'];?>
">
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
