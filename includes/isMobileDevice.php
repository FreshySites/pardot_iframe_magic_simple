<?php
function isMobileDevice() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
, $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){
	$is_mob = true;
}
else {
	$is_mob = false;
}
//var_dump(isMobileDevice());
//var_dump($is_mob);
?>
