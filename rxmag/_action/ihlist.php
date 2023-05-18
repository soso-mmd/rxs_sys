<?php
	require_once("../_pub/superway.php");
	
	$sqlwh="inp005=0;";
	if(isset($_POST["act"]) && isset($_POST["val"]) && $_POST["act"]=="okt" && $_POST["val"]!=""){
		db_update("UPDATE `introducte_PH` SET `inp005` = '1' WHERE `inp001` = {$_POST["val"]};");
	}
	$ihtype="0";
	if(isset($_POST["ihtype"])){
		$ihtype=$_POST["ihtype"];
		if($_POST["ihtype"]=="a")
			$sqlwh="1";
		else
			$sqlwh="inp005={$_POST["ihtype"]};";
	}
	$iph = db_queryAll("SELECT `inp001`, `inp002`, `inp003`, `inp004`, `inp005` FROM `introducte_PH` WHERE {$sqlwh} ORDER BY inp004 DESC");
	view_assign("ihtype",$ihtype);
	view_assign("iph",$iph);
	view_display("ihlist.tpe");
?>