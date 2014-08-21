<?php
/*
 * Process Zone
 */
include('../common/common_constant.php');
include('../common/common_function.php');

// Pre Valiables
$tableName	= 'titles';
$sortCol	= '';
$sortBy		= 'asc';
$where		= '';
$like		= '';
$order		= '';

if(hasValue($_REQUEST['tableName'])) {
	$tableName = $_REQUEST['tableName'];
}
if(hasValue($_REQUEST['sortBy'])) {
	$sortBy	= $_REQUEST['sortBy'];
}
if(hasValue($_REQUEST['sortCol'])) {
	$sortCol = $_REQUEST['sortCol'];
	$order	 = "ORDER BY $sortCol $sortBy";
}

$searchCol = $table[$tableName]['keyFieldName'];
if(hasValue($_REQUEST['searchCol']) && hasValue($_REQUEST['searchInput'])) {
	$searchCol		= $_REQUEST['searchCol'];
	$searchInput	= $_REQUEST['searchInput'];
	$like			= "$searchCol like '%$searchInput%'";
}

// check for table that display special
switch ($tableName) {
	case 'employees':
		header("location:table_data_employees.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'service_lists':
		header("location:table_data_service_lists.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'packages':
		header("location:table_data_packages.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
	case 'spa':
		header("location:table_data_spa.php?sortCol=$sortCol&sortBy=$sortBy&order=$order&searchCol=$searchCol&searchInput=$searchInput");
		break;
}

// Query table data
switch ($tableName) {
	case 'beds':
		$where = 'WHERE b.room_id = r.room_id ';
		if(hasValue($like)) {
			$where .= " AND $like";
		}
		$sql = "SELECT b.bed_id,
				r.room_name,
				b.bed_name 
				FROM beds b, rooms r 
				$where 
				$order";
		break;
	case 'customers':
		$where = 'WHERE c.custype_id = ct.custype_id and c.title_id = t.title_id ';
		if(hasValue($like)) {
			$where .= " AND $like";
		}
		$sql = "SELECT c.cus_id,
				ct.custype_name,
				t.title_name,
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
				FROM customers c, customer_types ct, titles t 
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
<script id="tmpScriptTableData" type="text/javascript">
	var table = {
		'name'			: '<?=$tableName?>',
		'sortCol'		: '<?=$sortCol?>',
		'sortBy'		: '<?=$sortBy?>',
		'fieldNameList'	: <? echo json_encode($table[$tableName]['fieldNameList']); ?>
	};
	setTable(table);
	$('#tmpScriptTableData').remove();
</script>
<table class="mbk mbk-table-sortable">
	<thead>
		<tr>
			<th class="icon-col">
				<input type="checkbox" id="check-all-record" name="check-all-record" class="mbk-checkbox" onclick="checkAllRecord(this)">
			</th>
            <th class="action-col"></th>
			<?
			// Create table head
			foreach($tableData[0] as $fieldEn => $value) {
				$fieldTh	 = $table[$tableName]['fieldNameList'][$fieldEn];
				$classSorter = 'tablesorter-header';
				if($fieldEn == $sortCol) {
					$classSorter .= $sortBy == 'asc' ? ' tablesorter-headerAsc' : ' tablesorter-headerDesc';
				}
				?>
				<th id="tf-<?=$fieldEn?>" class="<?=$classSorter?>">
					<div class="table-sorter-header-inner">
						<a class="mbk-table-header-content"><?=$fieldTh?></a>
					</div>
				</th>
				<?
			}
			?>
		</tr>
	</thead>
	<tbody id="table-data">
		<?
		foreach($tableData as $key => $row) {
			$code = $row[$table[$tableName]['keyFieldName']];
			?>
			<tr>
				<td class="icon-col">
					<input type="checkbox" value="<?=$code?>" name="table-record[]" class="mbk-checkbox" onclick="checkRecord(this)">
				</td>
				<td class="action-col">
					<span class="mbk-icon mbk-edit" onclick="openFormTable('EDIT', '<?=$code?>')"></span>
					<span class="mbk-icon mbk-delete" onclick="delteCurrentRecord('<?=$code?>')"></span>
				</td>
			
			<?
			foreach($row as $field => $value) {
				?>
				<td><?=$value?></td>
				<?
			}
			?>
			</tr>
			<?
		}
		?>
	</tbody>
</table>
<?
}
else{
// No record will display notification
?>
<div id="table-data-empty">
	<img src="../img/backoffice/test.png"><br>
	ไม่พบข้อมูล
</div>
<?}?>
