<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 22:10:16
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_promotion_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:2376654217f48e4c905-50812105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 22:26:45
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_promotion_service_lists.html" */ ?>
<?php /*%%SmartyHeaderCode:17472542183255352d0-01183219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 98b87d80794d7d3874680374d25c43398a77c817
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60ea36815315be1e19cea1ca0304c346f069ae1a' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_promotion_service_lists.html',
<<<<<<< HEAD
      1 => 1410276224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2376654217f48e4c905-50812105',
=======
      1 => 1410277944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17472542183255352d0-01183219',
>>>>>>> 98b87d80794d7d3874680374d25c43398a77c817
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
<<<<<<< HEAD
  'unifunc' => 'content_54217f4911e042_09642106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54217f4911e042_09642106')) {function content_54217f4911e042_09642106($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_5421832572d342_22899697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5421832572d342_22899697')) {function content_5421832572d342_22899697($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> 98b87d80794d7d3874680374d25c43398a77c817
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
                elem			: $('#svl_id'),
                tableName		: 'service_lists',
                keyFieldName	: 'svl_id',
                textFieldName	: 'svl_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
'
            });

			selectReference({
                elem			: $('#prm_id'),
                tableName		: 'promotions',
                keyFieldName	: 'prm_id',
                textFieldName	: 'prm_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['prm_id'];?>
'
            });
            $('#prmsvl_start').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});
			$('#prmsvl_end').datetimepicker({
				lang:'th',
				timepicker:false,
				format:'Y-m-d',
				closeOnDateSelect:true
			});

			

			// Set default value of textarea
			$('#prmsvl_desc').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_desc'];?>
');
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="svl_id,prm_id,prmsvl_price,prmsvl_start,prmsvl_end">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อรายการบริการ</label>
				    <div id="svl_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อโปรโมชั่น</label>
				    <div id="prm_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
		    <tr>
			    <td colspan="2">
				    <label class="input-required">ราคา (บาท)</label>
				    <input id="prmsvl_price" name="prmsvl_price" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_price'];?>
">
			    </td>
		    </tr>
			<tr>
                <td>
                    <label class="input-required">วันที่เริ่มใช้</label>
				    <input id="prmsvl_start" name="prmsvl_start" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_start'];?>
">
			    </td>
			    <td>
				    <label class="input-required">วันที่สิ้นสุด</label>
				    <input id="prmsvl_end" name="prmsvl_end" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_end'];?>
">
			    </td>
		    </tr>
            <tr>
			    <td colspan="2">
				    <label>คำอธิบาย</label>
					<textarea id="prmsvl_desc" name="prmsvl_desc" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prmsvl_desc'];?>
"></textarea>
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
