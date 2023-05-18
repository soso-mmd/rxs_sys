<?php
	function page_excult(){
		$where = "";
		$items=array(
			"ph_country"=>"pag006",
			"ph_district"=>"pag007",
		);
		foreach($items as $i=>$v){
			$aValue="";
			if(isset($_POST[$i]) && $_POST[$i]!=""){
				$where.=" AND {$v}='{$_POST[$i]}' ";
				$aValue=$_POST[$i];
			}
			view_assign($i,$aValue);
		}
		if(isset($_GET["ph"]))
			$where = " AND pag001={$_GET["ph"]} ";
		$ph_agent = db_queryAll("SELECT pag001,pag003,pag006,pag007,pag008,pag012,pag013,pag014,pag015,pag016,pag017 FROM `ph_agent` WHERE pag005=1 {$where}");
		$chat = false;
		if(isset($GLOBALS["ACtype"]) && $GLOBALS["ACtype"]==2)
			$chat=true;
	
		view_assign("chat",$chat);
		view_assign("agent",$ph_agent);
		view_assign("page","AgentMap");
	}
?>