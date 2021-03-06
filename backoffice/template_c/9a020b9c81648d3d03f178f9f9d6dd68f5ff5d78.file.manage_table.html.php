<?php /* Smarty version Smarty-3.1.18, created on 2014-11-18 09:38:23
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\manage_table.html" */ ?>
<?php /*%%SmartyHeaderCode:19123546ab11fcb3ed4-74925556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a020b9c81648d3d03f178f9f9d6dd68f5ff5d78' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\manage_table.html',
      1 => 1414720046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19123546ab11fcb3ed4-74925556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'session_loggedin' => 0,
    'session_emp_name' => 0,
    'session_emp_surname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_546ab12007cd30_16593127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ab12007cd30_16593127')) {function content_546ab12007cd30_16593127($_smarty_tpl) {?>﻿<!DOCTYPE html>
<html>
<head>
	<title>Spa - Backoffice</title>
	<meta charset="utf-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../js/mbk_main.js"></script>
	<script type="text/javascript" charset="utf-8" src="../js/mbk_manage_table.js"></script>
	
</head>
<body>
    <div class="overlay-inner"></div>
    <div class="overlay-full"></div>
    <div id="manage-box">
        <div class="manage-box-loading"></div>
        <div class="iframe-container">
            <iframe id="iframe-form-table" src="form_titles.php?action=ADD" height="100%" width="100%" frameBorder="0"></iframe>
        </div>
    </div>
<div id="page">
	<div id="wrapper">
		<div id="header">
			<div id="header-logo">
				<img src="../img/backoffice/logo-back-office.png">
			</div>
			<ul class="nav">
				<li>
                    <a href="#" class="selected">
                        <img src="../img/backoffice/nav-manage-table.png"><br>
                        จัดการข้อมูล
                    </a>
                </li>
				<li>
                    <a href="#">
                        <img src="../img/backoffice/nav-cacher.png"><br>
                        แคชเชียร์
                    </a>
                </li>
				<li>
                    <a href="#">
                        <img src="../img/backoffice/nav-authen.png"><br>
                        จัดการสิทธิ์
                    </a>
                </li>
				<li>
                    <a href="#">
                        <img src="../img/backoffice/nav-web.png"><br>
                        จัดการเว็บไซต์
                    </a>
                </li>
			</ul>
			<ul id="header-tool">
				<li>
                    <div id="account-box">
                        <?php if ($_smarty_tpl->tpl_vars['session_loggedin']->value) {?>
                        <b>คุณ<?php echo $_smarty_tpl->tpl_vars['session_emp_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['session_emp_surname']->value;?>
</b>
                        <a href="logout.php" class="normal-link" style="color: rgb(60, 60, 60);">ออกจากระบบ</a>
                        <?php } else { ?>
                        <a href="login.php">เข้าสู่ระบบ</a>
                        <?php }?>
                    </div>
                </li>
			</ul>
		</div>
		<div class="sidebar" aria-expanded="true">
            <div class="sidebar-body">
                <div class="tree-view">
			        <div class="tree-view-root">
                        <a>
                            <span class="root-label">ข้อมูลพื้นฐาน(16)</span>
                            <span class="root-icon"></span>
                        </a>
			        </div>
			        <div class="tree-view-child">
				        <ul>
                            <li id="tn-sex">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-sex"></span>
                                    <span class="item-label">เพศ</span>
                                </a>
                            </li>
					        <li id="tn-titles">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-titles"></span>
                                    <span class="item-label">คำนำหน้าชื่อ</span>
                                </a>
					        </li>
					        <li id="tn-positions">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-positions"></span>
                                    <span class="item-label">ตำแหน่ง</span>
                                </a>
					        </li>
					        <li id="tn-units">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-units"></span>
                                    <span class="item-label">หน่วยนับ</span>
                                </a>
					        </li>
					         <li id="tn-bank_accounts">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-bank_accounts"></span>
                                    <span class="item-label">บัญชีธนาคาร</span>
                                </a>
                            </li>
                            <li id="tn-rooms">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-rooms"></span>
                                    <span class="item-label">ห้องนวด</span>
                                </a>
                            </li>
                            <li id="tn-beds">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-beds"></span>
                                    <span class="item-label">เตียงนวด</span>
                                </a>
                            </li>
                            <li id="tn-order_status">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-order_status "></span>
                                    <span class="item-label">สถานะการสั่งซื้อ</span>
                                </a>
                            </li>
                            <li id="tn-booking_status">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-booking_status"></span>
                                    <span class="item-label">สถานะการจอง</span>
                                </a>
                            </li>
                            <li id="tn-brands">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-brands"></span>
                                    <span class="item-label">ยี่ห้อผลิตภัณฑ์</span>
                                </a>
                            </li>
                            <li id="tn-pay_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-pay_types"></span>
                                    <span class="item-label">ประเภทการชำระเงิน</span>
                                </a>
                            </li>
                            <li id="tn-element_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-element_types"></span>
                                    <span class="item-label">ประเภทธาตุ</span>
                                </a>
                            </li>
                            <li id="tn-product_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-product_types"></span>
                                    <span class="item-label">ประเภทผลิตภัณฑ์</span>
                                </a>
                            </li>
                            <li id="tn-order_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-order_types"></span>
                                    <span class="item-label">ประเภทการสั่งซื้อ</span>
                                </a>
                            </li>
                            <li id="tn-service_list_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_list_types"></span>
                                    <span class="item-label">ประเภทรายการบริการ</span>
                                </a>
                            </li>
                            <li id="tn-customer_types">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-customer_types"></span>
                                    <span class="item-label">ประเภทผู้ใช้บริการ</span>
                                </a>
                            </li>
				        </ul>
			        </div>
		        </div>
		        <div class="tree-view">
			        <div class="tree-view-root">
                        <a>
                            <span class="root-label">ข้อมูลหลัก(9)</span>
                            <span class="root-icon"></span>
                        </a>
			        </div>
			        <div class="tree-view-child">
				        <ul>
				         <li id="tn-spa">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-spa"></span>
                                    <span class="item-label">สปา</span>
                                </a>
					        </li>
					        <li id="tn-employees">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-employees"></span>
                                    <span class="item-label">พนักงาน</span>
                                </a>
					        </li>
					        <li id="tn-customers">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-customers"></span>
                                    <span class="item-label">ผู้ใช้บริการ</span>
                                </a>
					        </li>
					        <li id="tn-service_lists">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_lists"></span>
                                    <span class="item-label">รายการบริการ</span>
                                </a>
					        </li>
					        <li id="tn-packages">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-packages"></span>
                                    <span class="item-label">แพ็คเกจ</span>
                                </a>
					        </li>
                            <!--<li id="tn-package_service_lists">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-package_service_lists"></span>
                                    <span class="item-label">รายการบริการที่จัดแพ็คเกจ</span>
                                </a>
                            </li>-->
					        <li id="tn-promotions">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-promotions"></span>
                                    <span class="item-label">โปรโมชั่น</span>
                                </a>
					        </li>
                            <li id="tn-promotion_service_lists">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-promotion_service_lists"></span>
                                    <span class="item-label">รายการบริการที่จัดโปรโมชั่น</span>
                                </a>
                            </li>
					        <li id="tn-companies">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-companies"></span>
                                    <span class="item-label">บริษัทจำหน่ายผลิตภัณฑ์</span>
                                </a>
					        </li>
					        <li id="tn-products">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-products"></span>
                                    <span class="item-label">ผลิตภัณฑ์</span>
                                </a>
					        </li>
				        </ul>
			        </div>
			    </div>
			     <div class="tree-view">
			        <div class="tree-view-root">
                        <a>
                            <span class="root-label">ข้อมูลอื่นๆ(9)</span>
                            <span class="root-icon"></span>
                        </a>
			        </div>
			        <div class="tree-view-child">
				        <ul>
				         <li id="tn-time_attendances">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-time_attendances"></span>
                                    <span class="item-label">การเข้า-ออกงาน</span>
                                </a>
					        </li>
					        <li id="tn-payrolls">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-payrolls"></span>
                                    <span class="item-label">การจ่ายเงินเดือน</span>
                                </a>
					        </li>
					        <li id="tn-booking">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-booking"></span>
                                    <span class="item-label">การจอง</span>
                                </a>
					        </li>
                            <!--<li id="tn-booking_service_lists">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-booking_sevice_lists"></span>
                                    <span class="item-label">รายละเอียดรายการบริการที่จอง</span>
                                </a>
                            </li>
                            <li id="tn-booking_packages">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-booking_packages"></span>
                                    <span class="item-label">รายละเอียดแพ็คเกจที่จอง</span>
                                </a>
                            </li>
                            <li id="tn-booking_promotions">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-booking_promotions"></span>
                                    <span class="item-label">รายละเอียดโปรโมชั่นที่จอง</span>
                                </a>
                            </li>-->
					        <li id="tn-services">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-services"></span>
                                    <span class="item-label">การใช้บริการ</span>
                                </a>
					        </li>
                            <!--<li id="tn-service_service_lists">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_service_lists"></span>
                                    <span class="item-label">รายละเอียดการใช้บริการรายการบริการ</span>
                                </a>
                            </li>
                            <li id="tn-service_list_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_list_details"></span>
                                    <span class="item-label">รายละเอียดรายการบริการ</span>
                                </a>
                            </li>
                            <li id="tn-service_packages">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_packages"></span>
                                    <span class="item-label">รายละเอียดการใช้บริการแพ็คเกจ</span>
                                </a>
                            </li>
                            <li id="tn-package_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-package_details"></span>
                                    <span class="item-label">รายละเอียดแพ็คเกจ</span>
                                </a>
                            </li>
                            <li id="tn-service_promotions">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-service_promotions"></span>
                                    <span class="item-label">รายละเอียดการใช้บริการโปรโมชั่น</span>
                                </a>
                            </li>
                            <li id="tn-promotion_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-promotion_details"></span>
                                    <span class="item-label">รายละเอียดโปรโมชั่น</span>
                                </a>-->
                            </li>
					        <li id="tn-element_checks">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-element_checks"></span>
                                    <span class="item-label">การตรวจธาตุ</span>
                                </a>
					        </li>
					        <li id="tn-orders">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-orders"></span>
                                    <span class="item-label">การสั่งซื้อ</span>
                                </a>
					        </li>
                            <!--<li id="tn-order_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-order-details"></span>
                                    <span class="item-label">รายละเอียดการสั่งซื้อ</span>
                                </a>-->
                            </li>
					        <li id="tn-receives">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-receives"></span>
                                    <span class="item-label">การรับ</span>
                                </a>
					        </li>
                            <!--<li id="tn-receive_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-receive-details"></span>
                                    <span class="item-label">รายละเอียดการรับ</span>
                                </a>-->
                            </li>
                            <li id="tn-withdraws">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-withdraws"></span>
                                    <span class="item-label">การเบิก</span>
                                </a>
                            </li>
                            <!--<li id="tn-withdraw_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-withdraw_details"></span>
                                    <span class="item-label">รายละเอียดการเบิก</span>
                                </a>-->
                            </li>
					        <li id="tn-sales">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-sales"></span>
                                    <span class="item-label">การขาย</span>
                                </a>
					        </li>
                             <!--<li id="tn-sale_details">
                                <a class="tree-view-item">
                                    <span class="item-icon mbk-icon icon-sale_details"></span>
                                    <span class="item-label">รายละเอียดการขาย</span>
                                </a>
                            </li>-->
				        </ul>
			        </div>
		        </div>
            </div>
            <div class="sidebar-footer">
                <div class="sidebar-footer-inner">
                    <span class="mbk-icon"></span>
                </div>
            </div>
		</div>
        <div id="table-control">
            <div class="table-control-inner">
                <div class="table-control-container">
					<div class="cur-table-name">
						<h1>กำลังโหลด...</h1>
					</div>
                    <div>
                        <button id="add-record-btn" class="button large button-icon button-icon-add">เพิ่ม</button>
						<div class="search-container">
                            <select id="search-record-filter" class="mbk-select" name="search-record-filter">
                            </select>
                            <div class="mbk-input-icon">
                                <span class="mbk-icon-16 mbk-icon-16-search"></span>
                                <input id="search-record-input" type="text" placeholder="ค้นหา...">
                                <span id="clear-search-record-input" class="mbk-icon-16 mbk-icon-16-clear-search"></span>
                            </div>
                        </div>
                    </div>
                    <div id="table-toolbar" class="clearfix">
						<div class="table-toolbar-inner">
							<span id="toolbar-curselect"></span>
							<button id="edit-record-btn" class="button button-icon button-icon-edit">แก้ไข</button>
							<button id="delete-record-btn" class="button button-icon button-icon-delete">ลบ</button>
							<button id="cancel-select-btn" class="button button-icon">ยกเลิก</button>
						</div>
                        <div class="table-toolbar-filter"></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="no-select-table">
		  <div class="no-select-table-inner">
			<i class="fa fa-list-alt"></i><br>No table selected
		  </div>
		</div>
		<div class="page-panel">
			<div class="page-panel-inner">
                <div class="page-panel-content">
                </div>
			</div>
		</div>
        <div id="pagingContainer"></div>
	</div>
</div>
<!-- end page-->
</body>
</html><?php }} ?>
