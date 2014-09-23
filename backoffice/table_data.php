<?php
/*
 * Process Zone
 */
include('../common/common_constant.php');
include('../common/common_function.php');

// Pre Valiables
$tableName	= 'titles';
if(hasValue($_REQUEST['tableName'])) {
	$tableName = $_REQUEST['tableName'];
}
$tableInfo	= getTableInfo($tableName);
$sortCol	= $tableInfo['keyFieldName'];
$sortBy		= 'asc';
$filter 	= '';
$where		= '';
$like		= '';
$order		= '';

if(hasValue($_REQUEST['sortBy'])) {
	$sortBy	= $_REQUEST['sortBy'];
}
if(hasValue($_REQUEST['sortCol'])) {
	$sortCol = $_REQUEST['sortCol'];
}
if(hasValue($_REQUEST['filter'])) {
	$filter = $_REQUEST['filter'];
}
$order	 = "ORDER BY $sortCol $sortBy";

$searchCol = $tableInfo['keyFieldName'];
if(hasValue($_REQUEST['searchCol']) && hasValue($_REQUEST['searchInput'])) {
	$searchCol		= $_REQUEST['searchCol'];
	$searchInput	= $_REQUEST['searchInput'];
	$like			= "$searchCol like '%$searchInput%'";
}

// check for table that display special
switch ($tableName) {
	case 'orders':
		header("location:table_data_orders.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput&filter=$filter");
		break;
	case 'receives':
		header("location:table_data_receives.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput&filter=$filter");
		break;
	/*case 'packages':
		header("location:table_data_packages.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'spa':
		header("location:table_data_spa.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'promotions':
		header("location:table_data_promotions.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'booking':
		header("location:table_data_booking.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;*/
}

// Query table data
switch ($tableName) {
	case 'beds':
		$where = 'WHERE b.room_id = r.room_id ';
		if(hasValue($like)) {
			$like	= str_replace('room_id', 'r.room_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT b.bed_id,
				b.bed_name,
				r.room_name room_id 
				FROM beds b, rooms r 
				$where 
				$order";
		break;

		case'booking':
		$where		= 'WHERE b.cus_id = c.cus_id and b.emp_id = e.emp_id and b.status_id = s.bkgstat_id and b.bnkacc_id = a.bnkacc_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			} else if($searchCol == 'cus_id') {
				$like = "(c.cus_name like '%$searchInput%' OR c.cus_surname like '%$searchInput%') ";
			} else {
				$like		= str_replace('cus_id','c.cus_name', $like);
				$like		= str_replace('emp_id','e.emp_name', $like);
				$like		= str_replace('status_id','s.bkgstat_name', $like);
				$like		= str_replace('bnkacc_id','a.bnkacc_no', $like);
			}
			$where .= " AND $like";						
		}
		$sql = "SELECT b.bkg_id,
				CONCAT(c.cus_name, ' ', c.cus_surname) cus_id,
				CONCAT(e.emp_name, ' ', e.emp_surname) emp_id,
				s.bkgstat_name status_id,
				a.bnkacc_no bnkacc_id,
				b.bkg_transfer_date,
				b.bkg_transfer_time,
				b.bkg_transfer_evidence,
				b.bkg_total_price,
				b.bkg_total_price,
				b.bkg_date,
				b.bkg_time,
				b.bkg_transfer_money 
		FROM booking b, booking_status s, employees e, bank_accounts a, customers c 
		$where 
		$order";
		break;

		case 'service_lists':
		$where		= 'WHERE s.svltyp_id = t.svltyp_id';
		if(hasValue($like)) {
			$like		= str_replace('svltyp_id', 't.svltyp_name', $like);
			$where .= " AND $like";
			//$where	   .= ' AND '.$like;
		}
		$sql = "SELECT s.svl_picture,
				s.svl_id,
				s.svl_name,
				t.svltyp_name svltyp_id,
				s.svl_desc,
				s.svl_hr,
				s.svl_min,
				s.svl_price,
				s.svl_commission
		FROM service_lists s, service_list_types t 
		$where 
		$order";
		break;

		case 'employees':
		$where = 'WHERE e.sex_id = s.sex_id AND e.title_id = t.title_id AND p.pos_id = e.pos_id ';
		if(hasValue($like)) {
			$like		= "$searchCol like '%$searchInput%'";
			$like		= str_replace('sex_id', 's.sex_name', $like);
			$like		= str_replace('title_id', 't.title_name', $like);
			$like		= str_replace('pos_id', 'p.pos_name', $like);
			$where	   .= ' AND '.$like;
		}
		$sql = "SELECT e.emp_pic,
				e.emp_id,
				s.sex_name sex_id,
				t.title_name title_id,
				e.emp_name,
				e.emp_surname,
				e.emp_addr,
				e.emp_tel,
				p.pos_name pos_id,
				e.emp_birthdate,
				e.emp_indate,
				e.emp_user,
				e.emp_pass 
		FROM employees e, sex s, titles t, positions p 
		$where
		$order";
		break;

	case 'customers':
		$where = 'WHERE c.sex_id = s.sex_id AND c.custype_id = ct.custype_id and c.title_id = t.title_id ';
		if(hasValue($like)) {
			$like	= str_replace('sex_id', 's.sex_name', $like);
			$like	= str_replace('custype_id', 'ct.custype_name', $like);
			$like	= str_replace('title_id', 't.title_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT c.cus_id,
				ct.custype_name custype_id,
				s.sex_name sex_id,
				t.title_name title_id,
				c.cus_name,
				c.cus_surname,
				c.cus_addr,
				c.cus_tel,
				c.cus_user,
				c.cus_pass,
				c.cus_birthdate,
				c.cus_registered_date,
				c.cus_line_id,
				c.cus_facebook,
				c.cus_email 
				FROM customers c, sex s, customer_types ct, titles t 
				$where 
				$order";
		break;
	
	case 'package_service_lists':
		$where = 'WHERE ps.svl_id = s.svl_id AND ps.pkg_id = p.pkg_id ';
		if(hasValue($like)) {
			$like	= str_replace('room_id', 'r.room_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT ps.pkgsvl_id,
				s.svl_name svl_id,
				p.pkg_name pkg_id 
				FROM package_service_lists ps, service_lists s, packages p 
				$where 
				$order";
		break;

	case 'promotion_service_lists':
		$where = 'WHERE ps.svl_id = s.svl_id AND ps.prm_id = p.prm_id ';
		if(hasValue($like)) {
			$like	= str_replace('svl_id', 's.svl_name', $like);
			$like	= str_replace('prm_id', 'p.prm_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT ps.prmsvl_id,
				s.svl_name svl_id,
				p.prm_name prm_id,
				ps.prmsvl_start,
				ps.prmsvl_end,
				ps.prmsvl_desc,
				ps.prmsvl_price 
				FROM promotion_service_lists ps, service_lists s, promotions p 
				$where 
				$order";
		break;
	 	
	case 'products':
		$where = 'WHERE p.prdtyp_id = pt.prdtyp_id AND p.unit_id = u.unit_id AND p.brand_id = b.brand_id ';
		if(hasValue($like)) {
			$like	= str_replace('prdtyp_id', 'pt.prdtyp_name', $like);
			$like	= str_replace('unit_id', 'u.unit_name', $like);
			$like	= str_replace('brand_id', 'b.brand_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT p.prd_id,
				p.prd_name,
				pt.prdtyp_name prdtyp_id,
				b.brand_name brand_id,
				p.prd_price,
				p.prd_amount,
				u.unit_name unit_id 
				FROM products p, product_types pt, units u, brands b  
				$where 
				$order";
		break;

	case 'time_attendances':
		$where = 'WHERE t.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}//timeatt_id	emp_id	dateatt_in	timeatt_in	dateatt_out	timeatt_out
		$sql = "SELECT t.timeatt_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				t.dateatt_in,
				t.timeatt_in,
				t.dateatt_out,
				t.timeatt_out 
				FROM time_attendances t, employees e 
				$where 
				$order";
		break;
 	 	 	 	
	case 'payrolls':
		$where = 'WHERE p.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT p.payroll_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				p.payroll_salary,
				p.payroll_commission,
				p.payroll_monthly,
				p.payroll_date 
				FROM payrolls p, employees e 
				$where 
				$order";
		break;
 	  	 	 	 	 	 	
	case 'services':
		$where = 'WHERE s.cus_id = c.cus_id '
			   . 'AND s.emp_id = e.emp_id AND s.paytyp_id = p.paytyp_id AND s.bed_id = b.bed_id ';
		if(hasValue($like)) {
			if($searchCol == 'cus_id') {
				$like = "(c.cus_name like '%$searchInput%' OR c.cus_surname like '%$searchInput%') ";
			} else if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			} else {
				$like	= str_replace('paytyp_id', 'p.paytyp_name', $like);
				$like	= str_replace('bed_id', 'b.bed_name', $like);
			}
			$where .= " AND $like";
		}
		$sql = "SELECT s.ser_id,
				s.bkg_id,
				s.ser_date,
				s.ser_time,
				CONCAT(c.cus_name, '  ', c.cus_surname) cus_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				p.paytyp_name paytyp_id,
				b.bed_name bed_id,
				s.ser_total_price 
				FROM services s, customers c, employees e, pay_types p, beds b 
				$where 
				$order";
		break;
 	 	 	 	
	case 'package_details':
		$where = 'WHERE p.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT p.pkgdtl_id,
				p.serpkg_id,
				p.pkgsvl_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				p.pkgdtl_comm 
				FROM package_details p, employees e 
				$where 
				$order";
		break;

	case 'service_list_details':
		$where = 'WHERE s.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT s.svldtl_id,
				s.sersvl_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				s.svldtl_com 
				FROM service_list_details s, employees e 
				$where 
				$order";
		break;
 	 	 	 	
	case 'promotion_details':
		$where = 'WHERE p.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT p.prmdtl_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				p.serprm_id,
				p.svl_id,
				p.prmdtl_comm 
				FROM promotion_details p, employees e 
				$where 
				$order";
		break;

	case 'element_checks':
		$where = 'WHERE ec.cus_id = c.cus_id AND ec.emp_id = e.emp_id AND ec.eletyp_id = et.eletyp_id';
		if(hasValue($like)) {
			if($searchCol == 'cus_id') {
				$like = "(c.cus_name like '%$searchInput%' OR c.cus_surname like '%$searchInput%') ";
			} else if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			} else {
				$like	= str_replace('eletyp_id', 'et.eletyp_name', $like);
			}
			$where .= " AND $like";
		}
		$sql = "SELECT ec.elechk_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				CONCAT(c.cus_name, '  ', c.cus_surname) cus_id,
				ec.elechk_date,
				ec.elechk_time,
				et.eletyp_name eletyp_id 
				FROM element_checks ec, employees e, customers c, element_types et
				$where 
				$order";
		break;
 	 	 	 	 	
	case 'orders':
		$where = 'WHERE o.emp_id = e.emp_id AND o.comp_id = c.comp_id '
			   . 'AND o.ordtyp_id = ot.ordtyp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			} else {
				$like	= str_replace('comp_id', 'c.comp_name', $like);
			}
			$where .= " AND $like";
		}
		$sql = "SELECT o.ord_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				c.comp_name comp_id,
				ot.ordtyp_name ordtyp_id,
				o.ord_date,
				o.ord_snd_date 
				FROM orders o, order_types ot, employees e, companies c 
				$where 
				$order";
		break;
 	 	 	
	case 'order_details':
		$where = 'WHERE o.prd_id = p.prd_id ';
		if(hasValue($like)) {
			$like	= str_replace('prd_id', 'p.prd_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT o.orddtl_id,
				o.ord_id,
				p.prd_name prd_id,
				o.orddtl_amount 
				FROM order_details o, products p 
				$where 
				$order";
		break;
 	 	 	 	
	case 'receives':
		$where = 'WHERE r.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT r.rec_id,
				r.ord_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				r.rec_date,
				r.rec_total_price 
				FROM receives r, employees e 
				$where 
				$order";
		break;
 	 	 	 	
	case 'receive_details':
		$where = 'WHERE r.prd_id = p.prd_id ';
		if(hasValue($like)) {
			$like	= str_replace('prd_id', 'p.prd_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT r.recdtl_id,
				r.rec_id,
				p.prd_name prd_id,
				r.recdtl_amount,
				r.recdtl_price 
				FROM receive_details r, products p 
				$where 
				$order";
		break;

	case 'withdraws':
		$where = 'WHERE w.emp_give_id = eg.emp_id AND w.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			} else if($searchCol == 'emp_give_id') {
				$like = "(eg.emp_name like '%$searchInput%' OR eg.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT w.wdw_id,
				CONCAT(eg.emp_name, '  ', eg.emp_surname) emp_give_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				w.wdw_date,
				w.ser_id 
				FROM withdraws w, employees eg, employees e 
				$where 
				$order";
		break;
 	 	 	
	case 'withdraw_details':
		$where = 'WHERE w.prd_id = p.prd_id ';
		if(hasValue($like)) {
			$like	= str_replace('prd_id', 'p.prd_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT w.wdwdtl_id,
				w.wdw_id,
				p.prd_name prd_id,
				w.wdwdtl_amount 
				FROM withdraw_details w, products p 
				$where 
				$order";
		break;
 	 	 	
	case 'sales':
		$where = 'WHERE s.emp_id = e.emp_id ';
		if(hasValue($like)) {
			if($searchCol == 'emp_id') {
				$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
			}
			$where .= " AND $like";
		}
		$sql = "SELECT s.sale_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				s.sale_date,
				s.sale_time,
				s.sale_total_price 
				FROM sales s, employees e 
				$where 
				$order";
		break;
 	 	 	 	
	case 'sale_details':
		$where = 'WHERE s.prd_id = p.prd_id ';
		if(hasValue($like)) {
			$like	= str_replace('prd_id', 'p.prd_name', $like);
			$where .= " AND $like";
		}
		$sql = "SELECT s.saledtl_id,
				s.sale_id,
				p.prd_name prd_id,
				s.saledtl_amount,
				s.saledtl_price 
				FROM sale_details s, products p 
				$where 
				$order";
		break;
		
	default:
		if(hasValue($like)) {
			$where = "WHERE $like";
		}
		$sql = "SELECT * FROM $tableName $where $order";
		break;
}

$result		= mysql_query($sql, $dbConn);
$rows 		= mysql_num_rows($result);
$tableData	= array();

// Get table data
for($i = 0; $i < $rows; $i++) {
	array_push($tableData, mysql_fetch_assoc($result));
}

?>

<?
/*
 * Display Zone
 */

if($rows > 0){
//Has record will display table data
?>
<table class="mbk mbk-table-sortable">
	<? include('table_data_thead.php') ?>
	<tbody id="table-data">
		<?
		foreach($tableData as $key => $row) {
			$code = $row[$tableInfo['keyFieldName']];
			?>
			<tr>
				<td class="icon-col">
					<input type="checkbox" value="<?=$code?>" name="table-record[]" class="mbk-checkbox" onclick="checkRecord(this)">
				</td>
				<td class="action-col">
					<?
						if($tableName == 'employees'){
							?>
							<a title="พิมพ์บัตรพนักงาน">
								<i class="fa fa-credit-card" onclick="openPrintEmpCard('<?=$code?>')"></i>
							</a>
							<?
						} else if($tableName == 'orders') {
							?>
							<a title="พิมพ์ใบสั่งซื้อ">
								<i class="fa fa-file-text-o" onclick="openPrintPurchaseOrder('<?=$code?>')"></i>
							</a>
							<?
						}
					?>
					<a title="แก้ไข">
						<i class="fa fa-pencil" onclick="openFormTable('EDIT', '<?=$code?>')"></i>
					</a>
					<a title="ลบ">
						<i class="fa fa-times" onclick="delteCurrentRecord('<?=$code?>')"></i>
					</a>
				</td>
			<?
			$offset = 0;
			foreach($row as $field => $value) {
				//Skip hidden field
				if(isset($tableInfo['hiddenFields']) && in_array($field, $tableInfo['hiddenFields'])){
					$offset++;
					continue;
				}
				//Display field
				if($field == $tableInfo['keyFieldName']) {
					if(isset($tableInfo['hiddenFields'])) {
						// ถ้าตารางนี้มี hiddenFields แสดงว่าต้องมีหน้าแสดงรายละเอียด
						?>
						<td><a href="javascript:openFormTable('VIEW_DETAIL', '<?=$value?>');" class="normal-link" title="คลิกเพื่อดูรายละเอียด"><?=$value?></a></td>
						<?
					} else {
						?>
						<td><?=$value?></td>
						<?
					}
				}
				else if(mysql_field_type($result, $offset) == 'real') {
					?>
					<td class="real-col"><? echo number_format($value,2);?></td>
					<?
				} 
				else if (mysql_field_type($result, $offset) == 'int'){
					?>
					<td class="real-col"><?=$value?></td>
					<?
				}
				else if (mysql_field_type($result, $offset) == 'date' || mysql_field_type($result, $offset) == 'datetime'){
					$time 		= strtotime($value);
					$yearMinTH 	= substr(date('Y', $time) + 543, 2);
					$month 		= $monthThaiMin[(int)date('m', $time)-1];
					$dateValue 	= date('d', $time).' '.$month.' '.$yearMinTH;
					?>
					<td><?=$dateValue?></td>
					<?
				}
				else {
					?>
					<td><?=$value?></td>
					<?
				}
				$offset++;
			}
			?>
			</tr>
			<?
		}
		?>
	</tbody>
</table>
<?
} else{
?>
	<!-- No record will display notification-->
	<div id="table-data-empty">
		<img src="../img/backoffice/test.png"><br>
		ไม่พบข้อมูล
	</div>
<?
}
?>

<script id="tmpScriptTableData1" type="text/javascript" src="../js/table_data.js"></script>
<script id="tmpScriptTableData2" type="text/javascript">
	// Set table data
	var table = {
		'name'			: '<?=$tableName?>',
		'nameTH'		: '<?=$tableInfo["tableNameTH"]?>',
		'sortCol'		: '<?=$sortCol?>',
		'sortBy'		: '<?=$sortBy?>',
		'fieldNameList'	: <? echo json_encode($tableInfo['fieldNameList']); ?>,
		'searchFields' 	: 
		<? 
			if(hasValue($tableInfo['searchFields'])) {
				echo json_encode($tableInfo['searchFields']); 
			} else {
				echo "[]"; // empty array
			}
		?>
	};
	setTable(table);

	// Config column
	configColumn(<? echo count($tableInfo['fieldNameList']); ?>);

	$('#tmpScriptTableData1').remove();
	$('#tmpScriptTableData2').remove();
</script>