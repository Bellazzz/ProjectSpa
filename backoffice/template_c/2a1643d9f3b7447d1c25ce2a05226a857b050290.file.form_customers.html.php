<?php /* Smarty version Smarty-3.1.18, created on 2014-09-09 23:12:16
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_customers.html" */ ?>
<?php /*%%SmartyHeaderCode:10847540f18d0397cf9-91710970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1643d9f3b7447d1c25ce2a05226a857b050290' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_customers.html',
      1 => 1410187983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10847540f18d0397cf9-91710970',
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
  'unifunc' => 'content_540f18d0640219_21632716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540f18d0640219_21632716')) {function content_540f18d0640219_21632716($_smarty_tpl) {?><!DOCTYPE html>
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
                elem            : $('#sex_id'),
                tableName       : 'sex',
                keyFieldName    : 'sex_id',
                textFieldName   : 'sex_name',
                searchTool      : false,
                defaultValue    : '<?php echo $_smarty_tpl->tpl_vars['values']->value['sex_id'];?>
'
            });
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
        // Add input password
            if(action == 'ADD') {
                addInputPassword();
            }
        });
        
        function beforeSaveRecord() {
            // Check password
            if($('#cus_pass').val() != $('#cus_re_pass').val()) {
                $('#cus_pass').addClass('required');
                $('#cus_re_pass').addClass('required');
                alert('กรุณาป้อน password ให้ตรงกันค่ะ');
                $('#cus_re_pass').focus();
                return true;
            } else {
                return false;
            }
        }

        function addInputPassword() {
            var inputPassHTML = '<tr>'
                              + '   <td colspan=2>'
                              + '       <label>Password</label>'
                              + '       <input id="cus_pass" name="cus_pass" type="password" class="form-input full">'
                              + '   </td>'
                              + '</tr>'
                              + '<tr>'
                              + '   <td colspan=2>'
                              + '       <label>Re-Password</label>'
                              + '       <input id="cus_re_pass" name="cus_re_pass" type="password" class="form-input full">'
                              + '   </td>'
                              + '</tr>';
            $('#tableforAddPass tbody').append(inputPassHTML);

            function removeRequired(input) {
                if (input.val() != '') {
                    input.removeClass('required');
                }
            }

            // Add event for remove required
            $('#cus_pass').focusout(function(){
                removeRequired($(this));
            });
            $('#cus_re_pass').focusout(function(){
                removeRequired($(this));
            });
        }

        function resetPass() {
            var oldRequired = $('input[name="requiredFields"]').val();
            $('input[name="requiredFields"]').val(oldRequired + ',cus_pass,cus_re_pass');
            $('#trResetPass').remove();
            addInputPassword();
        }
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <div class="ftb-body">
    <?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
    <!-- VIEW_DETAIL -->
    <div class="table-view-detail-image full">
       
    </div>
    <table class="table-view-detail">
        <tbody>
            <tr>
                <td>รหัสผู้ใช้บริการ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>
            <tr>
                <td>ประเภทผู้ใช้บริการ :</td>
                <td><div id="custype_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>คำนำหน้าชื่อ :</td>
                <td><div id="title_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ชื่อผู้ใช้บริการ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_name'];?>
</td>
            </tr>
            <tr>
                <td>นามสกุล :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_surname'];?>
</td>
            </tr>
            <tr>
                <td>เพศ :</td>
                <td><div id="sex_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ที่อยู่ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_addr'];?>
</td>
            </tr>
            <tr>
                <td>เบอร์โทรศัพท์ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_tel'];?>
</td>
            </tr>
            <tr>
                <td>ชื่อผู้ใช้งาน :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_user'];?>
</td>
            </tr>
            <tr>
                <td>รหัสผ่าน :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_pass'];?>
</td>
            </tr>
            <tr>
                <td>วันเกิด :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_birthdate'];?>
</td>
            </tr>
            <tr>
                <td>วันที่สมัคร :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_registered_date'];?>
</td>
            </tr>
            <tr>
                <td>ชื่อเฟสบุ๊ค :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_facebook'];?>
</td>
            </tr>
            <tr>
                <td>ไลน์ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_line_id'];?>
</td>
            </tr>
            <tr>
                <td>อีเมล์ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['cus_email'];?>
</td>
            </tr>
        </tbody> 
    </table> 
    <?php } else { ?>      
    <!-- ADD, EDIT -->                      

    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="custype_id,sex_id,title_id,cus_name,cus_surname,cus_addr,cus_tel,cus_registered_date,sex_id">
    <input type="hidden" name="uniqueFields" value="cus_user<?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>,cus_pass,cus_re_pass<?php }?>">
    <table id="tableforAddPass" class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
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
                    <label class="input-required">เพศ</label>
                    <div id="sex_id" class="select-reference form-input full"></div>
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
                <!--<td>
                    <label>Password</label>
                    <input id="cus_pass" name="cus_pass" type="password" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['cus_pass'];?>
">
                </td>-->
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
            <tr id="trResetPass">
                <td colspan="2">
                    <a href="javascript:resetPass();" class="normal-link">ตั้งรหัสผ่านใหม่</a>
                </td>
            </tr>
            <?php }?>
	    </tbody>
    </table>
    </form>
    <?php }?>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
	3.  input[name="uniqueFields"] ใส่ชื่อฟิลด์ที่ต้องการเช็คว่าห้ามซ้ำ
--><?php }} ?>
