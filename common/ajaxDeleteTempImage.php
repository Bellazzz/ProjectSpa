<?
if(unlink($_REQUEST['imgPath'])) {
	echo 'PASS';
} else {
	echo 'DELETE_TEMP_IMAGE_FAIL';
}
?>