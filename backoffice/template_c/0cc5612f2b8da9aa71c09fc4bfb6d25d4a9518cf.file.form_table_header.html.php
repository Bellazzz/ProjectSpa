<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-08-31 21:04:26
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:3069454031d5a3a6ab9-49894904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-08-31 21:01:32
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:1334754031cacb59058-76425545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 08121669a7788a57eb12c367f2acaf28f4f2524f
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc5612f2b8da9aa71c09fc4bfb6d25d4a9518cf' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_table_header.html',
<<<<<<< HEAD
      1 => 1409489276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3069454031d5a3a6ab9-49894904',
=======
      1 => 1408871450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1334754031cacb59058-76425545',
>>>>>>> 08121669a7788a57eb12c367f2acaf28f4f2524f
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
<<<<<<< HEAD
  'unifunc' => 'content_54031d5a3ca996_83795446',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54031d5a3ca996_83795446')) {function content_54031d5a3ca996_83795446($_smarty_tpl) {?><div class="ftb-header">
=======
  'unifunc' => 'content_54031cacbf89a1_51175770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54031cacbf89a1_51175770')) {function content_54031cacbf89a1_51175770($_smarty_tpl) {?><div class="ftb-header">
>>>>>>> 08121669a7788a57eb12c367f2acaf28f4f2524f
	<div class="title-container">
		<h1 id="ftb-title"></h1>
	</div>
    <div class="toolbar-container clearfix">
	    <ul class="toolbar-menu">
		    <li>
                <?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>
			    <a id="save-btn">
				    <i class="fa fa-check"></i> เพิ่ม
			    </a>
                <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
                <a id="save-btn">
				    <i class="fa fa-floppy-o"></i> บันทึก
			    </a>
                 <?php }?>
		    </li>
		    <li>
			    <a id="cancel-btn">
				    <i class="fa fa-times"></i> ยกเลิก
			    </a>
		    </li>
	    </ul>
    </div>
</div><?php }} ?>
