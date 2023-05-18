<?php
	function act_excult(){
		
		if(isset($_GET["search"]) && $_GET["search"]!="" ){
			$rs = db_keyAll("SELECT  `hda002` AS id, `hda002` AS text FROM `hospital_data` WHERE hda002 LIKE '%{$_GET["search"]}%'  ");
			array_push($rs,array("id"=>$_GET["search"],"text"=>$_GET["search"]));
			echo json_encode($rs);
		}else{
			echo json_encode(array());
		}
	}

?>