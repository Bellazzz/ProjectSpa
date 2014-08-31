<?php /* Smarty version Smarty-3.1.18, created on 2014-08-31 14:09:43
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_order_details.html" */ ?>
<?php /*%%SmartyHeaderCode:245865402bc273344a3-59487060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '898e068b2f9bd32e97b317cb9e68bfbbaaf864da' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_order_details.html',
      1 => 1409198538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245865402bc273344a3-59487060',
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
  'unifunc' => 'content_5402bc27486ea3_81884300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5402bc27486ea3_81884300')) {function content_5402bc27486ea3_81884300($_smarty_tpl) {?><!DOCTYPE html>
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
                elem			: $('#ord_id'),
                tableName		: 'orders',
                keyFieldName	: 'ord_id',
                textFieldName	: 'ord_id',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['ord_id'];?>
',
				
            });
             
             selectReference({
                elem            : $('#prd_id'),
                tableName       : 'products',
                keyFieldName    : 'prd_id',
                textFieldName   : 'prd_name',
                searchTool      : true,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_id'];?>
',
                
            });

        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">    
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="ord_id,prd_id,orddtl_amount">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
            <tr>
                <td>
                    <label class="input-required">รหัสการสั่งซื้อผลิตภัณฑ์</label>
                    <div id="ord_id" class="select-reference form-input half" > </div>
                </td>
                 <td>
                    <label class="input-required">ชื่อผลิตภัณฑ์</label>
                    <div id="prd_id" class="select-reference form-input half" > </div>
                </td>
            </tr>
            <tr>
               <td>
                    <label class="input-required">จำนวนที่สั่งซื้อ</label>
                       <input id="orddtl_amount" name="orddtl_amount" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['orddtl_amount'];?>
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
