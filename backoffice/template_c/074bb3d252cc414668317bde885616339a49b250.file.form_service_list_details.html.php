<?php /* Smarty version Smarty-3.1.18, created on 2014-08-28 00:04:28
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_service_list_details.html" */ ?>
<?php /*%%SmartyHeaderCode:1495753fda7eeb29b62-50461384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '074bb3d252cc414668317bde885616339a49b250' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_service_list_details.html',
      1 => 1409133995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1495753fda7eeb29b62-50461384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fda7eec1e7a1_43997526',
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
<?php if ($_valid && !is_callable('content_53fda7eec1e7a1_43997526')) {function content_53fda7eec1e7a1_43997526($_smarty_tpl) {?><!DOCTYPE html>
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

        $(document).ready(function () {
            
            selectReference({
                elem            : $('#svl_id'),
                tableName       : 'service_lists',
                keyFieldName    : 'svl_id',
                textFieldName   : 'svl_name',
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['svl_id'];?>
'
            });
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
                elem            : $('#sersvl_id'),
                tableName       : 'service_service_lists',
                keyFieldName    : 'sersvl_id',
                textFieldName   : 'sersvl_id',
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['sersvl_id'];?>
'
            });
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
    <input type="hidden" name="requiredFields" value="svl_id,emp_id,sersvl_id,svldtl_com">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>
                    <label class="input-required">รายการบริการ</label>
                    <div id="svl_id" class="select-reference form-input half"></div>
                </td>
                <td>
                    <label class="input-required">ชื่อ-นามสกุลพนักงาน</label>
                    <div id="emp_id" class="select-reference form-input half"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="input-required">รายละเอียดการใช้รายการบริการ</label>
                    <div id="sersvl_id" class="select-reference form-input half"></div>
                </td>
                <td>
                    <label class="input-required">ค่าคอมมิชชั่น(บาท)</label>
                     <input id="svldtl_com" name="svldtl_com" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['svldtl_com'];?>
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
