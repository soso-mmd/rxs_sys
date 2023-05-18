<?php
	function page_excult(){
		$res=1;
		$items = array('uname','birYear','birMonth','birDay','gender','nid','phone');
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
		//確認手機符合格式
		if(preg_match("/\D/",$_POST["phone"])){
			$res=4;
		}
		//判斷身分證號
		if(!preg_match("/^[A-Z]\d{9}$/",$_POST["nid"])){
			$res=3;
		}
		//判斷生日格式
		if(!preg_match("/^\d{4}$/",$_POST["birYear"])){
			$res=71;
		}
		if(!preg_match("/^\d{1,2}$/",$_POST["birMonth"])){
			$res=72;
		}
		if(!preg_match("/^\d{1,2}$/",$_POST["birDay"])){
			$res=73;
		}
		
		//確認性別的值
		if(!in_array($_POST["gender"],array("man","woman"))){
			$res=8;
		}
		
		
		//密碼變成雜湊碼
		// $_POST["pwd"] = sha1($_POST["pwd"]);
		if($res==1){
			$valAry=array(
				"'{$_POST["uname"]}'",
				$GLOBALS["userDa"]["id"],
				"'{$_POST["nid"]}'",
				"'{$_POST["gender"]}'",
				"'{$_POST["birYear"]}-{$_POST["birMonth"]}-{$_POST["birDay"]}'",
				"'{$_POST["phone"]}'"
			);
			$valStr= implode(",",$valAry);
			$rs = db_execute("INSERT INTO `rx_user`(`rxu002`, `rxu003`, `rxu004`, `rxu005`, `rxu006`, `rxu007`) VALUES ({$valStr})");
			if(!$rs){
				$res = 5;
			}
		}
		view_assign("res",$res);
		view_display("RXadd.tpe");
		exit();
	}
?>