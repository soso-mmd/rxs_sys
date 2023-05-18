<?php
	function page_excult(){
		$msg = "";
		if(isset($_POST["act"])){
			$msg = saveDate();
		}	
		view_assign("msg",$msg);	
		
		$items = array(
			"rxtype"=>"rxo002=%s",
			"rxtime"=>"DATE_SUB(CURDATE(),INTERVAL %s MONTH) <=  rxo003",
		);
		$itemVal = array(
			"rxtype"=>"-1",
			"rxtime"=>"-1",
		);
		$query = array();
		foreach($items as $item=>$qStr){
			if(isset($_POST[$item]) && $_POST[$item]!=""){
				$itemVal[$item]=$_POST[$item];
				$qStr = preg_replace("/\%s/",$_POST[$item],$qStr);
				$query[$item]=$qStr;
			}
		}
		if(!isset($query["rxtime"]))$query["rxtime"]="DATE_SUB(CURDATE(),INTERVAL 3 MONTH) <=  rxo003";
		$queryStr = "";
		if(count($query)>0){
			$queryStr = "AND ".implode(" AND ",$query);
		}
		if(isset($_GET["rx"]))
			$queryStr = "AND rxo001={$_GET["rx"]}";
		$rx_order = db_queryAll("SELECT rxo001,rxo002,rxo003,rxo006,rxo007,rxo008,rxo009,rxo010,rxo014,rxo015,rxo017,rxo018,rxo016,rxo020 FROM `rx_order` WHERE rxo011={$GLOBALS["agentDa"]["pid"]} {$queryStr} ORDER BY rxo003 DESC");
		view_assign("rx_order",$rx_order);
		view_assign("ORDER_TYPE",unserialize(ORDER_TYPE));
		view_assign("itemVal",$itemVal);
		view_assign("sary",unserialize(sary));
		view_assign("today",time());//背景刷新可領藥狀態
		
		view_assign("page","PHorder");
	}
	function saveDate(){
		$msg="";
		if(isset($_POST["val"]) && is_int((int)$_POST["val"])){
			switch($_POST["act"]){
				case "cls":
					$clsr = "";
					if(isset($_POST["bk"]) && $_POST["bk"]!="")
						$clsr = ",rxo018='{$_POST["bk"]}' ";
					$r=db_updateCount("UPDATE `rx_order` SET rxo002=4{$clsr} WHERE rxo001={$_POST["val"]} AND rxo011={$GLOBALS["agentDa"]["pid"]} AND rxo002<3");
					if($r){
						noticeUser($_POST["val"],2,$_POST["bk"]);
						$msg="取消訂單成功";
					}else
						$msg="修改失敗";
					break;
				case "ent":
					$r=db_update("UPDATE `rx_order` SET rxo002=1 WHERE rxo001={$_POST["val"]} AND rxo011={$GLOBALS["agentDa"]["pid"]}");
					if($r)
						$msg="修改成功，訂單已確認";
					else
						$msg="修改失敗";
					break;
				case "okt":
					$mdate = "";
					$msg="修改失敗";
					$getok=false;
					if(isset($_POST["bk"]) && $_POST["bk"]!=""){
						$dateAry = explode("@",$_POST["bk"]);
						if(preg_match("/^\d{4}\-\d{2}\-\d{2}$/",$dateAry[0]) && preg_match("/^\d{4}\-\d{2}\-\d{2}$/",$dateAry[1])){
							$mdate = " rxo017='{$dateAry[0]}',rxo020='{$dateAry[1]}'";
							if(strtotime($dateAry[0])<=time()){
								$mdate .= ",rxo002=2";
								$getok=true;
							}
						}
					}
					if($mdate!=""){
						$r=db_update("UPDATE `rx_order` SET {$mdate} WHERE rxo001={$_POST["val"]} AND rxo011={$GLOBALS["agentDa"]["pid"]}");
						if($r){
							$msg="修改成功，訂單可領藥";
							if($getok)
								noticeUser($_POST["val"],1);
						}
					}
					break;
				case "endt":
					$r=db_update("UPDATE `rx_order` SET rxo002=3 WHERE rxo001={$_POST["val"]} AND rxo011={$GLOBALS["agentDa"]["pid"]}");
					if($r)
						$msg="修改成功，訂單已領藥";
					else
						$msg="修改失敗";
					break;
			}
		}else
			$msg="修改失敗";
		return $msg;
	}
?>