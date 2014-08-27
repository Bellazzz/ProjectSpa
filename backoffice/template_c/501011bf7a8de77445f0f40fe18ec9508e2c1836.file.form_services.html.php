<?php /* Smarty version Smarty-3.1.18, created on 2014-08-27 15:59:45
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_services.html" */ ?>
<?php /*%%SmartyHeaderCode:2916153fd8ff1625050-13514861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '501011bf7a8de77445f0f40fe18ec9508e2c1836' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_services.html',
      1 => 1409126373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2916153fd8ff1625050-13514861',
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
  'unifunc' => 'content_53fd8ff1745049_09960395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8ff1745049_09960395')) {function content_53fd8ff1745049_09960395($_smarty_tpl) {?><!DOCTYPE html>
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
                elem            : $('#svltyp_id'),
                tableName       : 'service_list_types',
                keyFieldName    : 'svltyp_id',
                textFieldName   : 'svltyp_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['svltyp_id'];?>
'
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

			$("#ser_date").datepicker();
			
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="cus_id,emp_id,svltyp_id,paytyp_id,bed_id,bkg_id,ser_date,ser_total_price">
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
                <td>
                    <label class="input-required">ประเภทรายการใช้บริการ</label>
                    <div id="svltyp_id" class="select-reference form-input half" > </div>
                </td>
                            
                <td>
                    <label class="input-required">ประเภทการชำระเงิน</label>
                    <div id="paytyp_id" class="select-reference form-input half" > </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">ชื่อเตียงนวด</label>
                    <div id="bed_id" class="select-reference form-input half" > </div>
                </td>
                            
                <td>
                    <label class="input-required">รหัสการจอง</label>
                    <div id="bkg_id" class="select-reference form-input half" > </div>
                </td>
            </tr>
           <tr>
                <td>
                    <label class="input-required">วัน-เวลาที่ใช้บริการ</label>
                      <input id="ser_date" name="ser_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_date'];?>
">
                </td>
                <td>
                    <label class="input-required">ราคารวมทั้งหมด(บาท)</label>
                    <input id="ser_total_price" name="ser_total_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['ser_total_price'];?>
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
