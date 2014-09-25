<?php /* Smarty version Smarty-3.1.18, created on 2014-09-25 21:59:47
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_payrolls.html" */ ?>
<?php /*%%SmartyHeaderCode:2525054241fd330c417-36640103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f6b5fe50418d9648bdbbe8a9fee3ac0520b3718' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_payrolls.html',
      1 => 1410277944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2525054241fd330c417-36640103',
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
  'unifunc' => 'content_54241fd348f0a1_05460908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54241fd348f0a1_05460908')) {function content_54241fd348f0a1_05460908($_smarty_tpl) {?><!DOCTYPE html>
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
                elem			: $('#emp_id'),
                tableName		: 'employees',
                keyFieldName	: 'emp_id',
                textFieldName	: 'emp_id,emp_name,emp_surname',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_id'];?>
',
				pattern			: 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });

            $('#payroll_monthly').datetimepicker({
                lang:'th',
                format:'Y/M',
                closeOnDateSelect:true,
                timepicker:false
            });

            $('#payroll_date').datetimepicker({
                lang:'th',
                format:'Y/m/d',
                closeOnDateSelect:true,
                timepicker:false
            });
            
			
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="emp_id,payroll_salary,payroll_monthly,payroll_date">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
				    <div id="emp_id" class="select-reference form-input full" > </div>
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">จำนวนเงินเดือน(บาท)</label>
				    <input id="payroll_salary" name="payroll_salary" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['payroll_salary'];?>
">
			    </td>
			    <td>
				    <label>ค่าคอมมิชชั่น(บาท)</label>
				    <input id="payroll_commission" name="payroll_commission" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['payroll_commission'];?>
">
			    </td>
		    </tr>
            <tr>
                <td>
                    <label class="input-required">ประจำเดือน-ปี</label>
                    <input id="payroll_monthly" name="payroll_monthly" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['payroll_monthly'];?>
">
                </td>
                <td>
                    <label class="input-required">วันที่จ่ายเงินเดือน</label>
                    <input id="payroll_date" name="payroll_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['payroll_date'];?>
">
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
