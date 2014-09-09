<?php
if(!isset($keySelected) || $keySelected == '') {
	echo 'NO_RECORD_SELECTED';
	exit();
}

include('../common/class_database.php');
include('../common/common_function.php');

$tableInfo	= getTableInfo($tableName);
$keyName	= $tableInfo['keyFieldName'];
$keyType	= $tableInfo['keyFieldType'];

// Add single quote
foreach($keySelected as $index => $value) {
	$keySelected[$index] = "'$value'";
}

// Delete detail
if($tableName == 'orders') {
	foreach($keySelected as $index => $ord_id) {
		$sql = "SELECT orddtl_id FROM order_details WHERE ord_id = $ord_id";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		for($i=0; $i<$rows; $i++) {
			$resultRow = mysql_fetch_assoc($result);
			$orddtl_id = $resultRow['orddtl_id'];
			$orderDetailRecord = new TableSpa('order_details', $orddtl_id);
			if(!$orderDetailRecord->delete()) {
				echo "DELETE_ORDER_DETAIL_FAIL";
				exit();
			}
		}
	}
}

// Delete record
$sql = "DELETE FROM $tableName WHERE $keyName in (" . implode($keySelected, ',') . ')';

try {
	if(mysql_query($sql, $dbConn)) {
		echo "PASS";
	} else {
		throw new Exception(mysql_error(), mysql_errno());
	}
} catch (Exception $e) {
    if ($e->getCode() == 1451) {
        echo "DELETE_REFERENCE";
    }
}
?>