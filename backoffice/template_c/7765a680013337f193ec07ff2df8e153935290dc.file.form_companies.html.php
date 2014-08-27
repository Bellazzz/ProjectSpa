<?php /* Smarty version Smarty-3.1.18, created on 2014-08-27 17:51:10
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_companies.html" */ ?>
<?php /*%%SmartyHeaderCode:2026153fda9428b0d15-22836432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7765a680013337f193ec07ff2df8e153935290dc' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_companies.html',
      1 => 1409125673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2026153fda9428b0d15-22836432',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fda9429ba025_66010222',
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
<?php if ($_valid && !is_callable('content_53fda9429ba025_66010222')) {function content_53fda9429ba025_66010222($_smarty_tpl) {?><!DOCTYPE html>
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

        // Set default value of textarea
        $('#comp_addr').text('<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_addr'];?>
');
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="comp_name,comp_tel,comp_addr">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อบริษัท</label>
				    <input id="comp_name" name="comp_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_name'];?>
">
			    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label class="input-required">ที่อยู่</label>
                    <textarea id="comp_addr" name="comp_addr" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_addr'];?>
"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">เบอร์โทร</label>
                    <input id="comp_tel" name="comp_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_tel'];?>
">
                </td>
                <td>
                    <label>แฟ็ก</label>
                    <input id="fax" name="fax" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['fax'];?>
">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>ชื่อผู้ติดต่อ</label>
                    <input id="comp_contact" name="comp_contact" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['comp_contact'];?>
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
