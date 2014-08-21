<?php
include('common_constant.php');
include('common_function.php');

$key			= $_REQUEST['key'];
$tableName		= $_REQUEST['tableName'];
$keyFieldName	= $_REQUEST['keyFieldName'];
$textFieldName	= $_REQUEST['textFieldName'];
if(isset($_REQUEST['key'])) {
	$sql = "SELECT $textFieldName FROM $tableName WHERE $keyFieldName = '$key'  LIMIT 1";
	$result = mysql_query($sql, $dbConn);
	$rows	= mysql_num_rows($result);

	if($rows > 0) {
		$record = mysql_fetch_assoc($result);
		echo $record[$textFieldName];
	}
}
?>