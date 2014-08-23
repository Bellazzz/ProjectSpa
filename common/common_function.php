<?php
function wrapSingleQuote($value) {
	return "'$value'";
}

function hasValue($variable) {//เช็คว่าตัวแปรตารางส่งมาหรทือไม่
	if(isset($variable) && $variable != null && $variable != '') {
		return true;
	} else {
		return false;
	}
}
?>