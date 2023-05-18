<?php
	require_once("../config/config_sys.php");
	require_once(PATH_HOME."config/config_db.php");
	require_once(PATH_HOME."config/config_redis.php");
	require_once(PATH_HOME."config/config_smarty.php");
	
	if(!isset($_COOKIE["mteg"]) || $_COOKIE["mteg"]!=passCode){
		echo "<script>top.location='/';</script>";
		exit;
	}
	view_assign("ver",ver);
?>