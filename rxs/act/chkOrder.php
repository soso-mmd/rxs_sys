<?php
	function act_excult(){
		if(isset($_POST["type"]) && in_array($_POST["type"],array(1,2))){
			switch($_POST["type"]){
				case 1:
					$chOrd = db_queryOne("SELECT COUNT(rxo001) FROM `rx_order` WHERE `rxo011` = {$GLOBALS["agentDa"]["pid"]} AND (`rxo002` = 0 OR (`rxo002` = 2 AND NOW() > `rxo020`)) ;"); 
					echo json_encode(array("rs"=>$chOrd[0]));
					break;
				case 2:
					$whStr = "";
					if($GLOBALS["userDa"]["rod"]!="" && is_int((int)$GLOBALS["userDa"]["rod"]))
						$whStr=" AND rxo001>{$GLOBALS["userDa"]["rod"]}";
					$chOrd = db_queryOne("SELECT COUNT(rxo001) FROM `rx_order` WHERE `rxo004` = {$GLOBALS["userDa"]["id"]} AND `rxo002` = 2 {$whStr} ;"); 
					echo json_encode(array("rs"=>$chOrd[0]));
					break;
			}
		}else{
			echo json_encode(array("rs"=>0));
		}
	}

?>