<?php /* Smarty version Smarty-3.1.18, created on 2014-09-02 01:17:43
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_customers.html" */ ?>
<?php /*%%SmartyHeaderCode:174055404a65c39e385-08774600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1643d9f3b7447d1c25ce2a05226a857b050290' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_customers.html',
      1 => 1409591856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174055404a65c39e385-08774600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5404a65c504e98_32279379',
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
<?php if ($_valid && !is_callable('content_5404a65c504e98_32279379')) {function content_5404a65c504e98_32279379($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css"> 
    <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script> 
    <!--include if want to use datepicker-->
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
            $("#bk_date").datepicker();
            $("#bt_date").datepicker();

            selectReference({
                elem			: $('#custype_id'),
                tableName		: 'customer_types',
                keyFieldName	: 'custype_id',
                textFieldName	: 'custype_name',
				searchTool		: false,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['custype_id'];?>
'
            });
            selectReference({
                elem            : $('#title_id'),
                tableName       : 'titles',
                keyFieldName    : 'title_id',
                textFieldName   : 'title_name',
                searchTool      : false,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['title_id'];?>
'
            });
        });
        
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="custype_id,title_id,cus_name,cus_surname,cus_addr,cus_tel,cus_registered_date">
    <input type="hidden" name="uniqueFields" value="">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">ชื่อผู้ใช้บริการ</label>
				    <input id="cus_name" name="cus_name" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_name'];?>
">
			    </td>

                <td>
                    <label class="input-required">นามสกุลผู้ใช้บริการ</label>
                    <input id="cus_surname" name="cus_surname" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_surname'];?>
">
                </td>
		    </tr>
            <tr>
			    <td>
				    <label class="input-required">ประเภทผู้ใช้บริการ</label>
				    <div id="custype_id" class="select-reference form-input half"></div>
			    </td>

                <td>
                    <label class="input-required">คำนำหน้าชื่อ</label>
                    <div id="title_id" class="select-reference form-input half"></div>
                </td>    
		    </tr>
              <tr>
                <td colspan="2">
                    <label class="input-required">ที่อยู่</label>
                    <textarea id="cus_addr" name="cus_addr" type="text" class="form-input full"><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_addr'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">เบอร์โทร</label>
                    <input id="cus_tel" name="cus_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_tel'];?>
" maxlength="10">
                </td>
                <td>
                    <label>วันเกิด</label>
                    <input id="bk_date" name="cus_birthdate" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_birthdate'];?>
">
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>Faceook(Link)</label>
                    <input id="cus_facebook" name="cus_facebook" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_facebook'];?>
">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Line(ID)</label>
                    <input id="cus_line_id" name="cus_line_id" type="text" class="form-input full"  value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_line_id'];?>
">
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <label>E-mail</label>
                    <input id="cus_email" name="cus_email" type="text" class="form-input full" 
                    value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_email'];?>
" pattern = "email">
                </td>
            </tr>
            <tr>
                <td>
                    <label>วันที่สมัคร</label>
                    <input id="bt_date" name="cus_registered_date" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_registered_date'];?>
">
                </td>
            </tr>
             <tr>
                <td>
                    <label>Username</label>
                    <input id="cus_user" name="cus_user" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_user'];?>
">
                </td>
                <td>
                    <label>Password</label>
                    <input id="cus_pass" name="cus_pass" type="password" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_pass'];?>
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
