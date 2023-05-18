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
		$usr = db_queryOne("SELECT usr001 FROM `user` WHERE `usr009` = '{$_POST["rcode"]}'");
		if($usr){
			db_update("UPDATE `user` SET usr004='{$_POST["pwd"]}',usr009=null WHERE usr001={$usr[0]} ;");
			$res["rs"]=1;
			showRes($res);
		}else{
			$res["rs"]=-2;
			showRes($res);
		}
	}
?>