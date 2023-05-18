<?php
	function page_excult(){
		if(isset($_GET["error"]) || !isset($_GET["code"]))dealErr();
		$rs = getLineloginTaken($_GET["code"],"https://{$_SERVER["HTTP_HOST"]}/llogin");
		if(isset($rs["error"]) || !isset($rs["id_token"]))dealErr();
		$ud = decodeTaken($rs["id_token"],"https://{$_SERVER["HTTP_HOST"]}/llogin");
		if(isset($ud["error"]) || !isset($ud["email"]))dealErr();
		$user = db_queryOne("SELECT usr001 FROM `user` WHERE usr003='{$ud['email']}'");
		if(!$user){//創建會員
			$pwd = substr(sha1(time().rand(1,999)),rand(0,10),rand(6,10));
			$now = date("Y-m-d H:i:s");
			$valStr = "'{$ud['name']}','{$ud['email']}','{$pwd}','','{$now}'";
			$user = db_updateLastid("INSERT INTO `user`(`usr002`, `usr003`, `usr004`, `usr005`, `usr006`) VALUES ({$valStr})");
		}
		$res=UserLogin("usr003='{$ud['email']}'");
		$dpag="URmain";
		view_assign("dpag",$dpag);
		view_assign("res",$res);
		view_display("clogin.tpe");
		exit();
	}
	
	function dealErr(){
		header("Location:/");
		exit();
	}
?>