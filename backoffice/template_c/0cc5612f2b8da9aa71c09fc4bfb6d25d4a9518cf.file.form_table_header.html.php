<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-08 18:37:59
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:27917540d8707453701-38817333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-08 18:38:33
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:29681540d8729ab9108-36726570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 50843fb937e32bc27379e698754d877fedf41197
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc5612f2b8da9aa71c09fc4bfb6d25d4a9518cf' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_table_header.html',
<<<<<<< HEAD
      1 => 1409902569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27917540d8707453701-38817333',
=======
      1 => 1410155713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29681540d8729ab9108-36726570',
>>>>>>> 50843fb937e32bc27379e698754d877fedf41197
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
  'unifunc' => 'content_540d87074bcb59_26531598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540d87074bcb59_26531598')) {function content_540d87074bcb59_26531598($_smarty_tpl) {?><div class="ftb-header">
=======
  'unifunc' => 'content_540d8729b0c040_56027772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540d8729b0c040_56027772')) {function content_540d8729b0c040_56027772($_smarty_tpl) {?><div class="ftb-header">
>>>>>>> 50843fb937e32bc27379e698754d877fedf41197
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
			    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
			    <a id="edit-btn">
				    <i class="fa fa-pencil"></i> แก้ไขข้อมูล
			    </a>
			    <?php }?>
		    </li>
		    <li>
			    <a id="cancel-btn">
			    	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
			    	<i class="fa fa-times"></i> ปิด
			    	<?php } else { ?>
				    <i class="fa fa-times"></i> ยกเลิก
				    <?php }?>
			    </a>
		    </li>
	    </ul>
    </div>
</div><?php }} ?>
