<?php /* Smarty version Smarty-3.1.18, created on 2014-11-16 15:41:37
         compiled from "C:\AppServ\www\projectSpa\pos\template\point_of_sale.html" */ ?>
<?php /*%%SmartyHeaderCode:230454686341b9e7a9-38643476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e72f872714535b41289731d7b257b837bad50a61' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\pos\\template\\point_of_sale.html',
      1 => 1416122986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230454686341b9e7a9-38643476',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54686341c0e105_68914625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54686341c0e105_68914625')) {function content_54686341c0e105_68914625($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Spa - Point of sale</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/point_of_sale.css">
	<script type="text/javascript">
	$(document).ready(function(){
		$('#sale-product-list').css('height', '100%');
	});
	</script>
</head>
<body>
<div id="header"></div>
<div id="control-sale">
	<div id="sale-transaction">
		<div id="sale-transaction-inner">
			<div id="sale-tranaction-inner-header">
				<h1>รหัสการขาย : S0000001</h1>
			</div>
			<div id="sale-product-list-container">
				<div id="sale-product-list-header">
					<table>
						<thead>
							<th class="prdName-col">ชื่อสินค้า</th>
							<th class="qty-col">จำนวน</th>
							<th class="money-col">ราคา/หน่วย</th>
							<th class="money-col">ราคารวม</th>
						</thead>
					</table>
				</div>
				<div id="sale-product-list-body">
					<table id="sale-product-list">
						<tbody>
							<tr>
								<td class="prdName-col">น้ำมันไพรนวดตัว</td>
								<td class="qty-col">1</td>
								<td class="money-col">฿150</td>
								<td class="money-col">฿150</td>
							</tr>
							<tr>
								<td class="prdName-col">น้ำมันไพรนวดตัว</td>
								<td class="qty-col">1</td>
								<td class="money-col">฿150</td>
								<td class="money-col">฿150</td>
							</tr>
							<tr>
								<td class="prdName-col">น้ำมันไพรนวดตัว</td>
								<td class="qty-col">1</td>
								<td class="money-col">฿150</td>
								<td class="money-col">฿150</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<table id="summary-sale-tranaction">
				<tbody>
					<tr>
						<td>จำนวนรายการ:</td>
						<td>3</td>
						<td align="right">ราคาสุทธิ</td>
						<td align="right"><span id="total-price">฿350</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="quick-product-container">
	<div id="quick-product">
		<div id="quick-product-header">
			
		</div>
		<div id="quick-product-body">
			<div id="columns">
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <div class="pin-container">
			    	<div class="pin">
			    		<img src="../img/products/PD0009.jpeg" alt="PlaceKitten" />
			        	<p>Leggings pour-over banksy, DIY wolf tattooed ... </p>
			    	</div>
			    </div>
			    <!-- and so on ...  -->
			</div>
		</div>
	</div>
</div>
</body>
</html><?php }} ?>
