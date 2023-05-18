<?php
	function page_excult(){
		$rx = false;
		if(isset($_GET["rx"])){
			$rx_user = db_queryOne("SELECT rxu001,rxu002,rxu004,rxu005,rxu006,rxu007 FROM `rx_user` WHERE rxu003={$GLOBALS["userDa"]["id"]} AND rxu001={$_GET["rx"]} ");
			if($rx_user)
				$rx=true;
		}
		if(!$rx)header("Location:/");
		$msg="";
		if(isset($_POST["act"])){
			$msg=saveDa($rx_user);
		}
		
		view_assign("msg",$msg);
		
		view_assign("rx_user",$rx_user);
		view_assign("page","RXuser");
	}
	function saveDa(&$rx_user){
		$items = array(
			"name"=>"rxu002",
			"sid"=>"rxu004",
			"gender"=>"rxu005",
			"birth"=>"rxu006",
			"phone"=>"rxu007"
		);
		
		$udAry=array();
		$idx=0;
		foreach($items as $item=>$cow){
			$idx++;
			if(isset($_POST[$item]) && $_POST[$item]!="" && $_POST[$item]!=$rx_user[$idx])
				array_push($udAry,"{$cow}='{$_POST[$item]}'");	
		}
		//確認手機符合數字格式
		if(preg_match("/\D/",$_POST["phone"])){
			return "手機不符合格式";
		}
		//判斷身分證號
		if(!preg_match("/^[A-Z]\d{9}$/",$_POST["sid"])){
			return "身分證不符合格式";
		}
		//判斷生日格式
		if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/",$_POST["birth"])){
			return "生日格式:(西元年)年-月-日";
		}
		
		//確認性別的值
		if(!in_array($_POST["gender"],array("man","woman"))){
			return "性別值錯誤";
		}
		
		if(count($udAry)>0){
			$udStr = implode(",",$udAry);
			$r = db_update("UPDATE `rx_user` SET {$udStr} WHERE rxu003={$GLOBALS["userDa"]["id"]} AND rxu001={$_GET["rx"]}");
			if($r){
				$rx_user = db_queryOne("SELECT rxu001,rxu002,rxu004,rxu005,rxu006,rxu007 FROM `rx_user` WHERE rxu003={$GLOBALS["userDa"]["id"]} AND rxu001={$_GET["rx"]} ");
				return "修改成功";
			}else{
				// echo "UPDATE `rx_user` SET {$udStr} WHERE rxu003={$GLOBALS["userDa"]["id"]} AND rxu001={$_GET["rx"]}";
				return "修改失敗";
			}
		}
	}
?>