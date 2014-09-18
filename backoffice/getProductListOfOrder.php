<?
include('../config/config.php');
$tplName = "getProductListOfOrder.html";
$subDir	 = WEB_ROOTDIR.'/backoffice/';
include('../common/common_header.php');

$ord_id = $_REQUEST['ord_id'];

if(!hasValue($ord_id)) {
	return 'no order id';
	exit();
}

$prdList = Array();
// Get orders data
$sql 	=  "SELECT 	od.orddtl_id,
					od.prd_id,
					p.prd_name,
					od.orddtl_amount,
					u.unit_name 
			FROM 	orders o, order_details od, products p, units u 
			WHERE 	o.ord_id = od.ord_id AND od.prd_id = p.prd_id 
					AND p.unit_id = u.unit_id 
					AND o.ord_id ='$ord_id'";

$result = mysql_query($sql, $dbConn);
$rows 	= mysql_num_rows($result);
$err 	= mysql_error($dbConn);
for($i=0; $i<$rows; $i++) {
	$orddtlRecord = mysql_fetch_assoc($result);
	$prdList[$orddtlRecord['prd_id']] = array(
		'no' 				=> $i+1,
		'orddtl_id' 		=> $orddtlRecord['orddtl_id'],
		'prd_id' 			=> $orddtlRecord['prd_id'],
		'prd_name' 			=> $orddtlRecord['prd_name'],
		'amount' 			=> $orddtlRecord['orddtl_amount'],
		'unit_name' 		=> $orddtlRecord['unit_name']
	);
}

// get resives data
$sql = "SELECT  rd.prd_id,
				rd.recdtl_amount 
		FROM 	receives r, receive_details rd 
		WHERE 	r.rec_id = rd.rec_id 
				AND r.ord_id = '$ord_id'";
$result = mysql_query($sql, $dbConn);
$rows 	= mysql_num_rows($result);
$err 	= mysql_error($dbConn);
for($i=0; $i<$rows; $i++) {
	$secdtlRecord = mysql_fetch_assoc($result);
	$prd_id 	  = $secdtlRecord['prd_id'];
	if(isset($prdList[$prd_id])) {
		$ordAmount = $prdList[$prd_id]['amount'];
		$recAmount = $secdtlRecord['recdtl_amount'];
		if($ordAmount > $recAmount) {
			$prdList[$prd_id]['amount'] = $ordAmount - $recAmount;
		} else {
			unset($prdList[$prd_id]);
		}
	}
}

$ordPrdList = array();
foreach ($prdList as $key => $value) {
	array_push($ordPrdList, $value);
}
$smarty->assign('ordPrdList', $ordPrdList);

include('../common/common_footer.php');
?>