<?php
/*
 * Process Zone
 */
include('../common/common_constant.php');
include('../common/common_function.php');

// Pre Valiable
$tableName	= 'orders';
$sortCol	= $_REQUEST['sortCol'];
$sortBy		= $_REQUEST['sortBy'];
$filter 	= $_REQUEST['filter'];
$where 		= 'WHERE o.emp_id = e.emp_id AND o.comp_id = c.comp_id '
			. 'AND o.ordtyp_id = ot.ordtyp_id ';
$tableInfo	= getTableInfo($tableName);

// Generate search
if(hasValue($_REQUEST['searchCol']) && hasValue($_REQUEST['searchInput'])) {
	$searchCol		= $_REQUEST['searchCol'];
	$searchInput	= $_REQUEST['searchInput'];
	$like			= "$searchCol like '%$searchInput%'";

	if($searchCol == 'emp_id') {
		$like = "(e.emp_name like '%$searchInput%' OR e.emp_surname like '%$searchInput%') ";
	} else {
		$like = str_replace('comp_id', 'c.comp_name', $like);
	}
	$where .= " AND $like";
}

// Generate filter
if(hasValue($_REQUEST['filter'])) {
	$filter = $_REQUEST['filter'];
	if($filter == 'WAIT') {
		$where .= "AND ordstat_id = 'OS01'";
	} else if($filter == 'REMAIN') {
		$where .= "AND ordstat_id = 'OS02'";
		$hideIconCol = true; // hide column action icon in thead
	} else if($filter == 'COMPLETED') {
		$where .= "AND ordstat_id = 'OS03'";
		$hideIconCol = true; // hide column action icon in thead
		// Display retroact 12 month
		$retroactDate = date('Y-m-d', strtotime('-1 years'));
		$where .= " AND ord_date >= '$retroactDate'";
	}
}

 	 	 	 	 	 	 	 	 	
// Query table data
$sql = "SELECT o.ord_id,
				CONCAT(e.emp_name, '  ', e.emp_surname) emp_id,
				c.comp_name comp_id,
				ot.ordtyp_name ordtyp_id,
				o.ord_date,
				o.ord_snd_date 
		FROM orders o, order_types ot, employees e, companies c 
		$where 
		ORDER BY o.ord_id DESC";
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
				<?
				if($filter == 'WAIT') {
				?>
					<td class="icon-col">
						<input type="checkbox" value="<?=$code?>" name="table-record[]" class="mbk-checkbox" onclick="checkRecord(this)">
					</td>
				<?
				}
				?>
					<td class="action-col">
						<a title="ดูใบสั่งซื้อ">
							<i class="fa fa-file-text-o" onclick="openPrintPurchaseOrder('<?=$code?>')"></i>
						</a>
						<?
						if($filter == 'WAIT') {
						?>
						<a title="แก้ไข">
							<i class="fa fa-pencil" onclick="openFormTable('EDIT', '<?=$code?>')"></i>
						</a>
						<a title="ลบ">
							<i class="fa fa-times" onclick="delteCurrentRecord('<?=$code?>')"></i>
						</a>
						<?
						}
						?>
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

	//$('#tmpScriptTableData1').remove();
	//$('#tmpScriptTableData2').remove();
</script>
