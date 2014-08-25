<?php /* Smarty version Smarty-3.1.18, created on 2014-08-25 00:39:48
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_bank_accounts.html" */ ?>
<?php /*%%SmartyHeaderCode:2799353f9b209566894-31275747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ea4002bfbbb5db7151a8f0586e7ba92b82b6b3' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_bank_accounts.html',
      1 => 1408898239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2799353f9b209566894-31275747',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53f9b20963e136_06456131',
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
<?php if ($_valid && !is_callable('content_53f9b20963e136_06456131')) {function content_53f9b20963e136_06456131($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="bnkacc_no,bnkacc_name,bnkacc_branch,bnkacc_type">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">เลขที่บัญชี</label>
				    <input id="bnkacc_no" name="bnkacc_no" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bnkacc_no'];?>
">
			    </td>
		    </tr>
			<tr>
			    <td>
				    <label class="input-required">ชื่อบัญชี</label>
				    <input id="bnkacc_name" name="bnkacc_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bnkacc_name'];?>
">
			    </td>
		    </tr>
			<tr>
			    <td>
				    <label class="input-required">สาขา</label>
				    <input id="bnkacc_branch" name="bnkacc_branch" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bnkacc_branch'];?>
">
			    </td>
		    </tr>
			<tr>
			    <td>
				    <label class="input-required">ประเภทบัญชี</label>
				    <input id="bnkacc_type" name="bnkacc_type" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bnkacc_type'];?>
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
--><?php }} ?>
