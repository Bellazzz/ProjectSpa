<?php
/*
 * Process Zone
 */
include('../common/common_constant.php');
include('../common/common_function.php');

// Pre Valiable
$tableName	= 'packages';
$sortCol	= $_REQUEST['sortCol'];
$sortBy		= $_REQUEST['sortBy'];
$order		= $_REQUEST['order'];
$pathSpaPic = '../img/spa/';
$where		= '';

if(hasValue($_REQUEST['searchCol']) && hasValue($_REQUEST['searchInput'])) {
	$searchCol		= $_REQUEST['searchCol'];
	$searchInput	= $_REQUEST['searchInput'];
	$like			= "$searchCol like '%$searchInput%'";
	$where		   .= ' WHERE '.$like;
}
								
// Query table data	
					
$sql = "SELECT  s.spa_logo,
		s.spa_id,
		s.spa_name,
		s.spa_addr,
		s.spa_tel,
		s.spa_fax 
		FROM spa s
		$where 
		$order";
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
<script type="text/javascript">
	var table = {
		'name'			: '<?=$tableName?>',
		'sortCol'		: '<?=$sortCol?>',
		'sortBy'		: '<?=$sortBy?>',
		'fieldNameList'	: <? echo json_encode($table[$tableName]['fieldNameList']); ?>
	};
	parent.setTable(table);
</script>
<table class="mbk mbk-table-sortable">
	<thead>
		<tr>
			<th class="icon-col">
				<input type="checkbox" id="check-all-record" class="mbk-checkbox" onclick="checkAllRecord(this)">
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
				if($field == 'spa_logo') {
				?>
					<td><img src="<?echo $pathSpaPic.$value?>" style="width: 100px;" title="<?=$value?>"></td>
				<?
				} else {
				?>
					<td><?=$value?></td>
				<?
				}
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
