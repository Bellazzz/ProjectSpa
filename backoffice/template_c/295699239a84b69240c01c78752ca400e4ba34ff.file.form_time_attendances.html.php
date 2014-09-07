<?php /* Smarty version Smarty-3.1.18, created on 2014-09-07 15:49:04
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_time_attendances.html" */ ?>
<?php /*%%SmartyHeaderCode:5103540c0be3912850-72792483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '295699239a84b69240c01c78752ca400e4ba34ff' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_time_attendances.html',
      1 => 1410076139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5103540c0be3912850-72792483',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_540c0be39d76d6_62797015',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540c0be39d76d6_62797015')) {function content_540c0be39d76d6_62797015($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css"> <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script> <!--include if want to use datepicker-->
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
                orderFieldName  : 'emp_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['emp_id'];?>
',
				pattern			: 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });

			$("#dateatt_in").datepicker();
			$("#dateatt_out").datepicker();
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="emp_id,timeatt_in,dateatt_in">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
				    <div id="emp_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">วันที่เข้า</label>
				    <input id="dateatt_in" name="dateatt_in" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['dateatt_in'];?>
">
			    </td>
			    <td>
				    <label class="input-required">เวลาที่เข้า</label>
				    <input id="timeatt_in" name="timeatt_in" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['timeatt_in'];?>
">
			    </td>
		    </tr>
            <tr>
                <td>
                    <label>วันที่ออก</label>
                    <input id="dateatt_out" name="dateatt_out" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['dateatt_out'];?>
">
                </td>
                <td>
                    <label>เวลาที่ออก</label>
                    <input id="timeatt_out" name="timeatt_out" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['timeatt_out'];?>
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
