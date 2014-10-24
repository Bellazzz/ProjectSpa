<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 07:51:29
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_sales.html" */ ?>
<?php /*%%SmartyHeaderCode:197865449a2914890c5-49830693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b6e6a516dc616d721fc74f9a356d6a69bc34341' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_sales.html',
      1 => 1413818477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197865449a2914890c5-49830693',
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
  'unifunc' => 'content_5449a291560447_02659219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449a291560447_02659219')) {function content_5449a291560447_02659219($_smarty_tpl) {?><!DOCTYPE html>
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
                elem            : $('#emp_id'),
                tableName       : 'employees',
                keyFieldName    : 'emp_id',
                textFieldName   : 'emp_id,emp_name,emp_surname',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_id'];?>
',
                pattern         : 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });
            $('#sale_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#sale_date').blur();
                },
                timepicker:false
            });
             $('#sale_time').datetimepicker({
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
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="emp_id,sale_date,sale_total_price,sale_time">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td colspan="2">
                    <label class="input-required">พนักงานขาย</label>
                    <div id="emp_id" class="select-reference form-input full" require></div>
                </td>
                
            </tr>
            <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_id-require" class="errInputMsg err-emp_id">โปรดเลือกพนักงานขาย</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">วันที่ขาย</label>
                      <input id="sale_date" name="sale_date" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['sale_date'];?>
" require>
                </td>
                <td>
                    <label class="input-required">เวลาที่ขาย</label>
                      <input id="sale_time" name="sale_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['sale_time'];?>
" require>
                </td>
		    </tr>
            <tr class="errMsgRow">
                <td>
                    <span id="err-sale_date-require" class="errInputMsg half err-sale_date">โปรดป้อนวันที่ขาย</span>
                </td>
                <td>
                    <span id="err-sale_time-require" class="errInputMsg half err-sale_time">โปรดป้อนเวลาที่ขาย</span>
                </td>
            </tr>
			<tr>
                 <td colspan="2">
                    <label class="input-required">ราคารวม(บาท)</label>
                   <input id="sale_total_price" name="sale_total_price" type="text" class="form-input full" 
                   value="<?php echo $_smarty_tpl->tpl_vars['values']->value['sale_total_price'];?>
" valuepattern="money" require>
                </td>         
            </tr>
            <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-sale_total_price-require" class="errInputMsg err-sale_total_price">โปรดป้อนราคารวม</span>
                    <span id="err-sale_total_price-money" class="errInputMsg err-sale_total_price">รูปแบบจำนวนเงินไม่ถูกต้อง จำนวนเงินเป็นได้เฉพาะตัวเลข ไม่มีคอมม่าคั่น จุดทศนิยม 2 ตำแหน่ง เช่น 130, 1600.25</span>
                </td>
            </tr>
	    </tbody>
    </table>
    </form>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
	3.  input[name="uniqueFields"] ใส่ชื่อฟิลด์ที่ต้องการเช็คว่าห้ามซ้ำ
--><?php }} ?>
