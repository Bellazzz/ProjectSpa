<?
include('../config/config.php');
include('../common/common_header.php');
$subDir = WEB_ROOTDIR.'/backoffice/';
$tplName = 'test.html';

$values = array(
	'fieldName' => array("title_name"),
	'fieldValue' => array("''")
);
$tableRecord = new TableSpa('titles', $values['fieldName'], $values['fieldValue']);



?>