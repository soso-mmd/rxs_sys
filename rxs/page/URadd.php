<?php
	function page_excult(){
		$res=1;
		$items = array('uname','email','pwd','phonenum');
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
		
		//確認email未註冊過
		if(db_queryOne("SELECT usr001 FROM `user` WHERE usr003='{$_POST["email"]}'"))
			$res=3;
		
		//確認手機符合格式
		if(preg_match("/\D/",$_POST["phonenum"])){
			$res=4;
		}
		
		//密碼變成雜湊碼
		// $_POST["pwd"] = sha1($_POST["pwd"]);
		$lineClow="";
		//line 設定檢查
		if(isset($_POST["lineCode"]) && $_POST["lineCode"]!=""){
			$lineSet = chkUserLine($_POST["lineCode"]);
			if($lineSet){
				array_push($items,"lineCode");
				$lineClow=",`usr008`";
			}else{
				$res = 7;
			}
		}
		if($res==1){
			$valAry=array();
			foreach($items as $item){
				array_push($valAry,"'{$_POST[$item]}'");
			}
			$now = date("Y-m-d H:i:s");
			array_push($valAry,"'{$now}'");
			$valStr= implode(",",$valAry);
			$rs = db_updateLastid("INSERT INTO `user`(`usr002`, `usr003`, `usr004`, `usr005`{$lineClow}, `usr006`) VALUES ({$valStr})");
			if(!$rs)$res = 5;
		}
		view_assign("res",$res);
		view_display("URadd.tpe");
		exit();
	}
?>