<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-08 22:22:53
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:20201540dbbbd6abbb8-41848744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-08 20:55:55
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:19460540da75bf3ae83-83297940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 61a390baf21dcebdcc4a28ebb40c200120954d0f
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
  'nocache_hash' => '20201540dbbbd6abbb8-41848744',
=======
      1 => 1410155713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19460540da75bf3ae83-83297940',
>>>>>>> 61a390baf21dcebdcc4a28ebb40c200120954d0f
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
  'unifunc' => 'content_540dbbbd716a23_86485214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540dbbbd716a23_86485214')) {function content_540dbbbd716a23_86485214($_smarty_tpl) {?><div class="ftb-header">
=======
  'unifunc' => 'content_540da75c02f3e7_49266608',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540da75c02f3e7_49266608')) {function content_540da75c02f3e7_49266608($_smarty_tpl) {?><div class="ftb-header">
>>>>>>> 61a390baf21dcebdcc4a28ebb40c200120954d0f
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
