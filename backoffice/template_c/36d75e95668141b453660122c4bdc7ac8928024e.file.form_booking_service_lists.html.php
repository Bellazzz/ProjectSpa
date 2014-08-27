<?php /* Smarty version Smarty-3.1.18, created on 2014-08-26 21:44:50
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_booking_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:2102753fc8987a24679-19481296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36d75e95668141b453660122c4bdc7ac8928024e' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_booking_service_lists.html',
      1 => 1409060668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2102753fc8987a24679-19481296',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fc8987b30886_38325152',
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
<?php if ($_valid && !is_callable('content_53fc8987b30886_38325152')) {function content_53fc8987b30886_38325152($_smarty_tpl) {?><!DOCTYPE html>
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
                elem			: $('#svl_id'),
                tableName		: 'service_lists',
                keyFieldName	: 'svl_id',
                textFieldName	: 'svl_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
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

			$("#bkgsvl_date").datepicker();
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="svl_id,bkg_id,bkgsvl_date,bkgsvl_total_price,bkgsvl_persons">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td>
                    <label class="input-required">รายการบริการ</label>
                    <div id="svl_id" class="select-reference form-input half" > </div>
                </td>
            			    
                <td>
				    <label class="input-required">รหัสการจอง</label>
				    <div id="bkg_id" class="select-reference form-input half" > </div>
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">วัน-เวลาที่ใช้บริการ</label>
				      <input id="bkgsvl_date" name="bkgsvl_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgsvl_date'];?>
">
			    </td>
			    <td>
				    <label class="input-required">ราคารวมการจองรายการบริการ(บาท)</label>
				    <input id="bkgsvl_total_price" name="bkgsvl_total_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgsvl_total_price'];?>
">
			    </td>
		    </tr>
            <tr>
                <td>
                    <label class="input-required">จำนวนผู้ใช้บริการ</label>
                    <input id="bkgsvl_persons" name="bkgsvl_persons" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bkgsvl_persons'];?>
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
