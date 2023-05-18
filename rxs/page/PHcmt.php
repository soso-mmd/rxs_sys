<?php
	function page_excult(){
		$ph =false;
		if(isset($_GET["p"])){
			$ph = db_queryOne("SELECT pag003 FROM `ph_agent` WHERE pag001='{$_GET["p"]}'");
			if($ph){
				$GLOBALS["page_name"]=$ph[0];
				$cmt = db_queryAll("SELECT rxo006,rxo015,rxo016,rxo019 FROM `rx_order` WHERE rxo011='{$_GET["p"]}' AND rxo015>0");
				view_assign("cmt",$cmt);
				view_assign("page","PHcmt");
				return;
			}
		}
		
		header("Location:URlogin");
	}
?>