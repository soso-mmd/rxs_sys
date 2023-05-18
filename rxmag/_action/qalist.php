<?php
	ini_set('display_errors', 1);
	
	require_once("../_pub/superway.php");
	if(isset($_POST["act"])){
		$iary = array(
			"val",
			"qq",
			"qa",
			"qtype",
			"qenb",
		);
		$rs=true;
		foreach($iary as $i){
			if(!isset($_POST[$i]) || $_POST[$i]===""){
				$rs=false;
			}
		}
		if($rs){
			$qa = getYT($_POST["qa"],$_POST["qtype"]);
			switch($_POST["act"]){
				case "sav":
					db_update("UPDATE `qa_list` SET `qal002` = '{$_POST["qq"]}',`qal003` = '{$qa}',`qal004` = '{$_POST["qtype"]}',`qal005` = '{$_POST["qenb"]}' WHERE `qal001` = {$_POST["val"]};");
					break;
				case "new":
					db_update("INSERT INTO `qa_list`(`qal002`, `qal003`, `qal004`, `qal005`) VALUES ('{$_POST["qq"]}','{$qa}','{$_POST["qtype"]}','{$_POST["qenb"]}');");
					break;
				case "del":
					db_update("DELETE FROM `qa_list` WHERE `qal001` = {$_POST["val"]};");
			}
		}
	}
	$ihtype="a";
	$sqlwh="1";
	if(isset($_POST["ihtype"])){
		$ihtype=$_POST["ihtype"];
		if($_POST["ihtype"]=="a")
			$sqlwh="1";
		else
			$sqlwh="qal005={$_POST["ihtype"]};";
	}
	$iph = db_queryAll("SELECT `qal001`, `qal002`, `qal003`, `qal004`, `qal005` FROM `qa_list` WHERE {$sqlwh} ORDER BY qal001 DESC");
	view_assign("ihtype",$ihtype);
	view_assign("iph",$iph);
	view_display("qalist.tpe");
	
	
	function getYT($qa,$qtype){
		if($qtype==1){
			$qa = preg_replace("/\/$/","",$qa);
			$qary = explode("/",$qa);
			return $qary[count($qary)-1];
		}else
			return $qa;
	}
?>