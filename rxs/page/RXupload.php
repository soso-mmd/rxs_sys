<?php
	function page_excult(){
		$rx = 0;
		if(isset($_GET["rx"]))$rx = $_GET["rx"];
		$rx_user = db_queryAll("SELECT rxu001,rxu002 FROM `rx_user` WHERE rxu003={$GLOBALS["userDa"]["id"]} ");
		$phData = db_queryAll("SELECT pag001,pag003,pag006,pag007 FROM `ph_agent` WHERE pag005=1");
		// $hpData = db_keyAll("SELECT  `hda002` AS id, `hda002` AS text FROM `hospital_data` WHERE 1 ");
		$ph_Agent=array();
		foreach($phData as $ph){
			if(!isset($ph_Agent[$ph[2]]))$ph_Agent[$ph[2]]=array();
			if(!isset($ph_Agent[$ph[2]][$ph[3]]))$ph_Agent[$ph[2]][$ph[3]]=array();
			array_push($ph_Agent[$ph[2]][$ph[3]],$ph);
		}
		
		view_assign("sel_rx",$rx);
		view_assign("rx_user",$rx_user);
		// view_assign("hpData",json_encode($hpData));
		view_assign("ph_agent",json_encode($ph_Agent));
		view_assign("page","RXupload");
		
	}
?>