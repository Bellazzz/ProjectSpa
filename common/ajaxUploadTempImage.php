<?
$uploadPath	= '../img/temp/';
$imgType	= $_REQUEST['imgType'];

// Generage temp name
$rand		= substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,9);
$imgName	= "temp_".$rand.".".$imgType;

// Upload image to tmp dir
if(file_put_contents($uploadPath.$imgName, file_get_contents('php://input'))) {
	$pass = true;
} else {
	$pass = false;
}

// Return response
if($pass) {
	$response = array(
		'status'	=> "PASS",
		'imgName'	=> $imgName,
		'imgType'	=> $imgType,
	);
} else {
	$response = array(
		'status'	=> "FAIL"
	);
}
echo json_encode($response);

?>