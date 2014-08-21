<?
include('../config/config.php');
include('../common/common_header.php');
$subDir = WEB_ROOTDIR.'/backoffice/';
$tplName = 'test.html';


$positionDetail = new Positions('POS0013');

$positionDetail->setFieldValue('pos_name', 'พนักงานนวด');

$positionDetail->commit();


include('../common/common_footer.php');
?>