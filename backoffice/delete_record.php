<?php
if(!isset($keySelected) || $keySelected == '') {
	echo 'NO_RECORD_SELECTED';
	exit();
}
include('../common/common_constant.php');
include('../common/common_function.php');

$keyName = $table[$tableName]['keyFieldName'];
$keyType = $table[$tableName]['keyFieldType'];

// Add single quote if field is varchar
if($keyType == 2) {
	foreach($keySelected as $index => $value) {
		$keySelected[$index] = wrapSingleQuote($value);
	}
}

// Delete record
$sql = "DELETE FROM $tableName WHERE $keyName in (" . implode($keySelected, ',') . ')';
if(mysql_query($sql, $dbConn)) {
	echo "PASS";
} else {
	throw new Exception('Cannot delete record');
}
?>