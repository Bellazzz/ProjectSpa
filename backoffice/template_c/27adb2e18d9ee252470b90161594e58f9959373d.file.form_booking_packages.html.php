<?php /* Smarty version Smarty-3.1.18, created on 2014-08-27 15:04:05
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_booking_packages.html" */ ?>
<?php /*%%SmartyHeaderCode:2945753fd62b78fc722-12558662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27adb2e18d9ee252470b90161594e58f9959373d' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_booking_packages.html',
      1 => 1409123039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2945753fd62b78fc722-12558662',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fd62b7a17123_11236645',
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
<?php if ($_valid && !is_callable('content_53fd62b7a17123_11236645')) {function content_53fd62b7a17123_11236645($_smarty_tpl) {?><!DOCTYPE html>
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
                elem			: $('#pkgsvl_id'),
                tableName		: 'package_service_lists',
                keyFieldName	: 'pkgsvl_id',
                textFieldName	: 'pkgsvl_id',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['pkgsvl_id'];?>
',
				
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

			$("#bkgpkg_date").datepicker();
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="pkgsvl_id,bkg_id,bkgpkg_date,bkgpkg_total_price,bkgpkg_persons">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td>
                    <label class="input-required">รายการบริการที่จัดแพ็คเกจ</label>
                    <div id="pkgsvl_id" class="select-reference form-input half" > </div>
                </td>
            			    
                <td>
				    <label class="input-required">รหัสการจอง</label>
				    <div id="bkg_id" class="select-reference form-input half" > </div>
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">วัน-เวลาที่ใช้บริการ</label>
				      <input id="bkgpkg_date" name="bkgpkg_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgpkg_date'];?>
">
			    </td>
			    <td>
				    <label class="input-required">ราคารวมการจองแพ็คเกจ(บาท)</label>
				    <input id="bkgpkg_total_price" name="bkgpkg_total_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgpkg_total_price'];?>
">
			    </td>
		    </tr>
            <tr>
                <td>
                    <label class="input-required">จำนวนผู้ใช้บริการ</label>
                    <input id="bkgpkg_persons" name="bkgpkg_persons" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgpkg_persons'];?>
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
