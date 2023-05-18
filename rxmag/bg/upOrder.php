<?PHP
	//將可領藥單改為可領藥
	//http://mag.com/bg/upOrder.php
	define("../config/config_sys.php");
	require_once(PATH_HOME."config/config_db.php");
	require_once(PATH_HOME."_pub/notic.php");
	$ords = db_queryAll("SELECT rxo004,rxo006,rxo014,rxo001 FROM `rx_order` WHERE rxo002=1 AND rxo017 < NOW()");
	$cmt=db_update("UPDATE `rx_order` SET rxo002=2 WHERE rxo002=1 AND rxo017 < NOW()");
	if($cmt){
		foreach($ords as $ord){
			noticeUser($ord,1);
		}
	}
?>