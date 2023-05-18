<?php
	function page_excult(){
		$dpag="URmain";
		if(isset($GLOBALS["agentDa"])){
			view_assign("dpag",$dpag);
			view_assign("res",0);
			view_display("clogin.tpe");
			exit();
		}
			
		$res=0;
		$items = array('email','pwd');
		//確認資料不為空
		foreach($items as $item){
			if(!isset($_POST[$item]) || $_POST[$item]==""){
				$res=2;
				break;
			}
		}
		//確認驗證碼
		if(!chk_cap())
			$res = 6;
		
		if($res==0){
			$res = UserLogin("usr003='{$_POST["email"]}' AND usr004='{$_POST["pwd"]}'");
		}
		// print_r($redis->hgetall("user:".$_COOKIE["u-tag"]));
		view_assign("dpag",$dpag);
		view_assign("res",$res);
		view_display("clogin.tpe");
		exit();
	}
?>