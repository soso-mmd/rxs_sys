<?php
	function page_excult(){
		$rx=0;
		$ph=0;
		if(isset($_GET["rx"])){
			$wstr=" AND O";
			if($GLOBALS["ACtype"] ==1)
				$wstr = " AND rxo011 = {$GLOBALS["agentDa"]["pid"]}";
			elseif($GLOBALS["ACtype"] ==2)
				$wstr = " AND rxo004 = {$GLOBALS["userDa"]["id"]}";
			$rx = db_queryOne("SELECT rxo001 FROM `rx_order` WHERE `rxo001` = {$_GET["rx"]} {$wstr}; ");
			$rx = $rx[0];
		}
		if(isset($_GET["ph"])){
			$phda = db_queryOne("SELECT pag001 FROM `ph_agent` WHERE `pag001` = {$_GET["ph"]}");
			if($phda)
				$ph=$phda[0];
		}
		view_assign("ph",$ph);
		view_assign("rx",$rx);
		view_assign("ctype",$GLOBALS["ACtype"]);
		view_assign("page","Cmsg");
	}
?>