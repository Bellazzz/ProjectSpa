<?php /* Smarty version Smarty-3.1.18, created on 2014-10-26 14:18:45
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_withdraws.html" */ ?>
<?php /*%%SmartyHeaderCode:31061544ca055721c26-23411333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3583887e4643428502610ed35f1f7ebd1be65551' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_withdraws.html',
      1 => 1413866833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31061544ca055721c26-23411333',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544ca0558d4d07_83697325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ca0558d4d07_83697325')) {function content_544ca0558d4d07_83697325($_smarty_tpl) {?><!DOCTYPE html>
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
                elem            : $('#ser_id'),
                tableName       : 'services',
                keyFieldName    : 'ser_id',
                textFieldName   : 'ser_id',
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_id'];?>
'
            });
             
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
                elem            : $('#emp_give_id'),
                tableName       : 'employees',
                keyFieldName    : 'emp_id',
                textFieldName   : 'emp_id,emp_name,emp_surname',
                searchTool      : true,
                defaultValue    : '<?php if ($_smarty_tpl->tpl_vars['values']->value['emp_give_id']) {?><?php echo $_smarty_tpl->tpl_vars['values']->value['emp_give_id'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['session_emp_id']->value;?>
<?php }?>',
                pattern         : 'CONCAT("(",emp_id,") ",emp_name," ",emp_surname)'
            });
            $('#wdw_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#wdw_date').blur();
                },
                timepicker:false
            });

			
       
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">    
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="ser_id,emp_id,emp_give_id,wdw_date">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td colspan="2">
                    <label class="input-required">พนักงานที่ให้เบิก</label>
                    <div id="emp_give_id" class="select-reference form-input full" require></div>
                </td>
            </tr>
            <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_give_id-require" class="errInputMsg err-emp_give_id">โปรดเลือกพนักงานที่ให้เบิก</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label class="input-required">พนักงานที่เบิก</label>
                    <div id="emp_id" class="select-reference form-input full" require></div>
                </td>
            </tr>
            <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-emp_id-require" class="errInputMsg err-emp_id">โปรดเลือกพนักงานที่เบิก</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label class="input-required">วันที่เบิกผลิตภัณฑ์</label>
                      <input id="wdw_date" name="wdw_date" type="text" class="mbk-dtp-th form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['wdw_date'];?>
" require>
                </td>
            </tr>
            <tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-wdw_date-require" class="errInputMsg err-wdw_date">โปรดป้อนวันที่เบิกผลิตภัณฑ์</span>
                </td>
            </tr>
            <tr>
               <td colspan="2">
                    <label class="input-required">รหัสการใช้บริการ</label>
                    <div id="ser_id" class="select-reference form-input full" require></div>
                </td>
		    </tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-ser_id-require" class="errInputMsg err-ser_id">โปรดเลือกรหัสการใช้บริการ</span>
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
