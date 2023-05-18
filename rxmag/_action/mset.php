<?php
	require_once("../_pub/superway.php");
	$YTset = unserialize(ytSet);
	if(isset($_POST["act"]) && isset($_POST["val"])){
		$val = $_POST["val"];
		if(in_array($_POST["act"],$YTset))
			$val = getYT($_POST["val"]);
		if($_POST["act"]!="" && $val!="")
			db_update("UPDATE `sys_conf` SET `sys002` = '{$val}' WHERE `sys001` = '{$_POST["act"]}';");
	}
	$tmiph = db_queryAll("SELECT `sys001`, `sys002`, `sys003`, `sys004` FROM `sys_conf` WHERE 1");
	$iph = array();
	foreach($tmiph as $t){
		if(!isset($iph[$t[3]])) $iph[$t[3]]=array();
		array_push($iph[$t[3]],$t);
	}
	view_assign("YTset",$YTset);
	view_assign("iph",$iph);
	view_display("mset.tpe");
	
	
	function getYT($val){
		$val = preg_replace("/\/$/","",$val);
		$qary = explode("/",$val);
		return $qary[count($qary)-1];
	}
?>