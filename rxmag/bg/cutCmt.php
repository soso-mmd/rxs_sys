<?PHP
	//統計評分
	//http://mag.com/bg/cutCmt.php
	
	define("PATH_HOME",	dirname(dirname(__FILE__)). '/');
	require_once(PATH_HOME."config/config_db.php");
	$cmt=db_queryAll("SELECT rxo011,FORMAT(SUM(rxo015)/COUNT(*),1),COUNT(*) FROM `rx_order` WHERE rxo015>0 GROUP BY rxo011");
	foreach($cmt as $c){
		db_update("UPDATE `ph_agent` SET pag016={$c[1]},pag017={$c[2]} WHERE pag001={$c[0]};");
	}
?>