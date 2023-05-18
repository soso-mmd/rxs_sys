<?php
	function page_excult(){
		$code="";
		if(isset($_POST["code"])){
			$token = getLineTaken($_POST["code"],"https://{$_SERVER["HTTP_HOST"]}/URregist");
			if(isset($token["status"]) && $token["status"]==200 && isset($token["access_token"]) )
				$code=$token["access_token"];
		}
		view_assign("ln_id",$GLOBALS["line_code"]);
		view_assign("code",$code);
		view_assign("page","URregist");
	}
?>