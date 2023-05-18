<?php
	require_once("../_pub/superway.php");
	
	if(
		isset($_POST["act"]) && 
		isset($_POST["val"]) && 
		$_POST["act"]=="okt" && 
		$_POST["val"]!="" &&
		$_POST["enb"]!=""){
			$enb=1;
			if($_POST["enb"]==1)$enb=2;
			db_update("UPDATE `ph_agent` SET `pag005` = '{$enb}' WHERE `pag001` = {$_POST["val"]};");
			if($enb==2){
				$uid = db_queryOne("SELECT lou004 FROM `login_user` WHERE `lou002` = 2 AND `lou003` = {$_POST["val"]} ORDER BY `login_user`.`lou005` DESC");
				if($uid){
					$redis=getRedis();
					$redis->del("ph_agent:{$uid[0]}");
				}
			}
	}
	$ihtype="a";
	$sqlwh="1";
	if(isset($_POST["ihtype"])){
		$ihtype=$_POST["ihtype"];
		if($_POST["ihtype"]=="a")
			$sqlwh="1";
		else{
			if($_POST["ihtype"]==2){
				$sqlwh="pag005 IN(0,2);";
			}else{
				$sqlwh="pag005={$_POST["ihtype"]};";
			}
		}
			
	}
	$iph = db_keyAll("SELECT `pag001`, `pag002`, `pag003`, `pag005`, `pag006`, `pag007`, `pag008`, `pag009`, `pag010`, `pag011`, `pag014` FROM `ph_agent` WHERE {$sqlwh} ORDER BY pag005 , pag001 DESC");
	view_assign("ihtype",$ihtype);
	view_assign("iph",$iph);
	view_assign("imgUrl",imgUrl);
	view_display("hlist.tpe");
?>