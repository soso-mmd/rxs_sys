<?php
	function act_excult(){
		$item = array("rcode","pwd");
		$res=array();
		foreach($item as $i){
			if(!isset($_POST[$i]) || $_POST[$i]==""){
				$res["rs"]=-1;
				showRes($res);
			}
		}
		$pag = db_queryOne("SELECT pag001 FROM `ph_agent` WHERE `pag019` = '{$_POST["rcode"]}'");
		if($pag){
			db_update("UPDATE `ph_agent` SET pag004='{$_POST["pwd"]}',pag019=null WHERE pag001={$pag[0]} ;");
			$res["rs"]=1;
			showRes($res);
		}else{
			$res["rs"]=-2;
			showRes($res);
		}
	}
?>