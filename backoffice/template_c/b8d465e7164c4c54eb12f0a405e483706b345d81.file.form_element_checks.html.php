<?php /* Smarty version Smarty-3.1.18, created on 2014-09-25 12:00:26
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_element_checks.html" */ ?>
<?php /*%%SmartyHeaderCode:6635423935a0b3659-30362760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8d465e7164c4c54eb12f0a405e483706b345d81' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_element_checks.html',
      1 => 1411612149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6635423935a0b3659-30362760',
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
  'unifunc' => 'content_5423935a29b4e7_35794408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5423935a29b4e7_35794408')) {function content_5423935a29b4e7_35794408($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/datetimepicker/jquery.datetimepicker.css"> <!--include if want to use datepicker-->
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
                elem			: $('#eletyp_id'),
                tableName		: 'element_types',
                keyFieldName	: 'eletyp_id',
                textFieldName	: 'eletyp_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['eletyp_id'];?>
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
                elem            : $('#cus_id'),
                tableName       : 'customers',
                keyFieldName    : 'cus_id',
                textFieldName   : 'cus_id,cus_name,cus_surname',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_id'];?>
',
                pattern         : 'CONCAT("(",cus_id,") ",cus_name," ",cus_surname)'
            });

            $('#elechk_date').datetimepicker({
                lang                : 'th',
                format              : 'Y/m/d',
                timepicker          :false,
                closeOnDateSelect   :true,
                scrollInput         :false,
                yearOffset          :543,
                onSelectDate: 
                function(){
                  $('#elechk_date').blur();
                }
            });
             $('#elechk_time').datetimepicker({
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
	<input type="hidden" name="requiredFields" value="eletyp_id,emp_id,cus_id,elechk_date,elechk_time">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td>
                    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
                    <div id="emp_id" class="select-reference form-input half" > </div>
                </td>
            			    
                <td>
				    <label class="input-required">ชื่อ-นามสกุลผู้ใช้บริการ</label>
				    <div id="cus_id" class="select-reference form-input half" > </div>
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">วันที่ตรวจ</label>
				      <input id="elechk_date" name="elechk_date" type="text" class="mbk-dtp-th form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['elechk_date'];?>
">
			    </td>
			    <td>
                    <label class="input-required">เวลาที่ตรวจ</label>
                      <input id="elechk_time" name="elechk_time" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['elechk_time'];?>
">
                </td>
		    </tr>
            <tr>
               <td>
                    <label class="input-required">ประเภทธาตุ</label>
                    <div id="eletyp_id" class="select-reference form-input half" > </div>
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
