<?php /* Smarty version Smarty-3.1.18, created on 2014-11-11 10:57:10
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_titles.html" */ ?>
<?php /*%%SmartyHeaderCode:5870546189161eee68-98126227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27378bcd0e170dfc447ebcad9120101faf889e50' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_titles.html',
      1 => 1414723285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5870546189161eee68-98126227',
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
  'unifunc' => 'content_546189162dac73_21713285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546189162dac73_21713285')) {function content_546189162dac73_21713285($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css"> 
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script> 
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
        var ajaxUrl     = 'form_table.php'; // เปลี่ยนเป็นชื่อ form_ชื่อตาราง.php กรณีที่การทำงานแตกต่างจากปกติ

        $(document).ready(function () {
            $("#bk_date").datepicker();

            selectReference({
                elem: $('#ref_pos_id'),
                tableName: 'titles',
                keyFieldName: 'title_id',
                textFieldName: 'title_name',
                defaultValue: 'T01'
            });
            selectReference({
                elem            : $('#sex_id'),
                tableName       : 'sex',
                keyFieldName    : 'sex_id',
                textFieldName   : 'sex_name',
                searchTool      : false,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['sex_id'];?>
'
            });
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="title_name">
	<input type="hidden" name="uniqueFields" value="title_name">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label class="input-required">คำนำหน้าชื่อ</label>
				    <input id="title_name" name="title_name" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['title_name'];?>
" require valuepattern = "character"> 
			    </td>
            </tr>
            <tr class="errMsgRow">
                <td>
                    <span id="err-title_name-require" class="errInputMsg err-title_name">โปรดป้อนคำนำหน้าชื่อ</span>
                    <span id="err-title_name-unique" class="errInputMsg err-title_name">คำนำหน้าชื่อซ้ำ โปรดป้อนคำนำหน้าชื่อใหม่</span>
                    <span id="err-title_name-character" class="errInputMsg err-title_name">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                </td>
            </tr>
            <!--<tr>
                <td>
                    <label class="input-required">เพศ</label>
                    <label style="display:inline; margin-right:20px;"><input type="radio" name="sex_id" value="X1" <?php if ($_smarty_tpl->tpl_vars['values']->value['sex_id']=='X1') {?>checked<?php }?>> ชาย</label>
                    <label style="display:inline; margin-right:20px;"><input type="radio" name="sex_id" value="X2" <?php if ($_smarty_tpl->tpl_vars['values']->value['sex_id']=='X2') {?>checked<?php }?>> หญิง</label>
                    <label style="display:inline"><input type="radio" name="sex_id" value="" <?php if ($_smarty_tpl->tpl_vars['values']->value['sex_id']=='') {?>checked<?php }?>> ไม่ระบุ</label>
                </td>
		    </tr>-->
            <tr>
                <td>
                    <label class="input-required">เพศ</label>
                    <div id="sex_id" class="select-reference form-input half" require></div>
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
