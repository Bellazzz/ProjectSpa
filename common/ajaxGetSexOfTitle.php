<?php
include('../config/config.php');
include('../common/common_header.php');

$title_id = '';
if(hasValue($_REQUEST['title_id'])) {
	$title_id = $_REQUEST['title_id'];
}

$sql = "SELECT 	sex_id 
		FROM 	titles 
		WHERE 	title_id = '$title_id'";
$result = mysql_query($sql, $dbConn);
$row	= mysql_num_rows($result);
if($row > 0) {
	$titleRow = mysql_fetch_assoc($result);
	echo $titleRow['sex_id'];
} else {
	echo 'NO_ROWS';
}
?>