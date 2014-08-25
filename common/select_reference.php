<?php
include('common_constant.php');
include('common_function.php');

$id				= $_REQUEST['id'];
$tableName		= $_REQUEST['tableName'];
$keyFieldName	= $_REQUEST['keyFieldName'];
$textFieldName	= $_REQUEST['textFieldName'];
$searchText		= $_REQUEST['searchText'];
$begin			= $_REQUEST['begin'];
$limit			= $_REQUEST['limit'];
$where			= '';

if(hasValue($searchText)) {
	$where = "WHERE $textFieldName like '%$searchText%'";
}

$sql = "SELECT $keyFieldName, $textFieldName FROM $tableName $where LIMIT $begin,$limit";
$result = mysql_query($sql, $dbConn);
$rows	= mysql_num_rows($result);

if($rows > 0) {
	while($record = mysql_fetch_assoc($result)) {
		?>
		<li>
			<span class="text"><?=$record[$textFieldName]?></span>
			<span class="value"><?=$record[$keyFieldName]?></span>
        </li>
		<?
	}
} else {
	echo '<div class="no-result">ไม่พบข้อมูลที่ค้นหา</div>';
}

$nextBegin = $begin + $rows;
?>
<script id="temp-script" type="text/javascript">
$('#<?=$id?>').attr('responserows', <?=$rows?>);
$('#<?=$id?>').attr('begin', <?=$nextBegin?>);
$('#temp-script').remove();
</script>
