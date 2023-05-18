<?php
	function page_excult(){
		$msg="";
		if(isset($_POST["code"])){
			$token = getLineTaken($_POST["code"],"https://{$_SERVER["HTTP_HOST"]}/URinfo");
			if(isset($token["status"]) && $token["status"]==200 && isset($token["access_token"]) ){
				$r = db_update("UPDATE `user` SET usr008='{$token["access_token"]}' WHERE usr001={$GLOBALS["userDa"]["id"]}");
				if($r){
					$msg="設定成功";
					updateUser();
				}else
					$msg="設定失敗";
			}
		}
		if(isset($_POST["act"])){
			$msg=saveDa();
		} 
		$lineChk=false;
		if($GLOBALS["userDa"]["lineNotify"]!=""){
			$lineChk=chkUserLine($GLOBALS["userDa"]["lineNotify"]);
		}
		view_assign("ln_id",$GLOBALS["line_code"]);
		view_assign("lineChk",$lineChk);
		view_assign("msg",$msg);
		view_assign("da",array($GLOBALS["userDa"]["name"],$GLOBALS["userDa"]["phone"]));
		view_assign("page","URinfo");
	}
	function saveDa(){ 
		$items = array(
			"name"=>"usr002",
			"phone"=>"usr005"
		);
		$udAry=array();
		foreach($items as $item=>$cow){
			if(isset($_POST[$item]) && $_POST[$item]!="" && $_POST[$item]!=$GLOBALS["userDa"][$item])
				array_push($udAry,"{$cow}='{$_POST[$item]}'");	
		}
		//確認手機符合格式
		if(preg_match("/\D/",$_POST["phone"])){
			return "手機不符合格式";
		}
		//密碼檢查
		if(isset($_POST["pwd"]) && $_POST["pwd"]!="" && $_POST["pwd"]==$_POST["pwd_chk"])
			array_push($udAry,"usr004='{$_POST["pwd"]}'");
		/*//檢查line通知
		if(isset($_POST["lineCode"]) && $_POST["lineCode"]!=""){
			$lineSet = chkUserLine($_POST["lineCode"]);
			if($lineSet){
				array_push($udAry,"usr008='{$_POST["lineCode"]}'");
			}else{
				return "line通知權杖錯誤，無法傳送通知，請重新設定";
			}	
		}*/
		if(count($udAry)>0){
			$udStr = implode(",",$udAry);
			$r = db_update("UPDATE `user` SET {$udStr} WHERE usr001={$GLOBALS["userDa"]["id"]}");
			if($r){
				updateUser();
				return "修改成功";
			}else
				return "修改失敗";
		}
	}
	function updateUser(){
		$uda = db_keyOne("SELECT usr001 AS id,usr002 AS name,usr003 AS email,usr005 AS phone,usr008 AS lineNotify FROM `user` WHERE usr001='{$GLOBALS["userDa"]["id"]}'");
		$redis = getRedis();
		$redis->hmset("user:{$_COOKIE["u-tag"]}",$uda);
		$GLOBALS["userDa"] = $uda;
	}
?>