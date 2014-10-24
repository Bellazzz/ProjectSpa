<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 08:39:31
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_positions.html" */ ?>
<?php /*%%SmartyHeaderCode:4025449add3d90db1-72791845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78d0c63242ad77f737ea1d5feb94f475e58f5920' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_positions.html',
      1 => 1413557917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4025449add3d90db1-72791845',
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
  'unifunc' => 'content_5449add3e2beb2_85268751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449add3e2beb2_85268751')) {function content_5449add3e2beb2_85268751($_smarty_tpl) {?><!DOCTYPE html>
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
	<input type="hidden" name="requiredFields" value="pos_name">
	<input type="hidden" name="uniqueFields" value="pos_name">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">ชื่อตำแหน่ง</label>
				    <input id="pos_name" name="pos_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pos_name'];?>
" require valuepattern="character">
			    </td>
		    </tr>
            <tr>
                <td>
                    <span id="err-pos_name-require" class="errInputMsg err-pos_name">โปรดป้อนชื่อตำแหน่ง</span>
                    <span id="err-pos_name-character" class="errInputMsg err-pos_name">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                    <span id="err-pos_name-unique" class="errInputMsg err-pos_name">มีตำแหน่งชื่อนี้อยู่แล้ว</span>
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
