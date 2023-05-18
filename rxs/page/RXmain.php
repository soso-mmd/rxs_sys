<?php
	function page_excult(){
		$msg = "";
		if(isset($_POST["act"])){
			if(isset($_POST["val"])){
				switch($_POST["act"]){
					case "cls":
						$r=db_updateCount("UPDATE `rx_order` SET rxo002=4 WHERE rxo001={$_POST["val"]} AND rxo004={$GLOBALS["userDa"]["id"]} AND rxo002=0");
						if($r>0)
							$msg="修改成功，訂單已取消";
						else
							$msg="修改失敗";
						break;
					case "cmtOrd":
						$oid = $_POST["val"];
						$r=false;
						
						if(isset($_POST["sco"]) && isset($_POST["cmt"]) && $_POST["sco"]>0){
							$now = date("Y-m-d H:i:s");
							$r=db_update("UPDATE `rx_order` SET rxo015={$_POST["sco"]}, rxo016='{$_POST["cmt"]}',rxo019='{$now}' WHERE rxo001={$_POST["val"]} AND rxo004={$GLOBALS["userDa"]["id"]}");
						}
						if($r)
							$msg="評論成功";
						else
							$msg="修改失敗";
						break;
				}
			}else
				$msg="修改失敗";
		}	
		view_assign("msg",$msg);	
		
		//判斷已看到可領藥慢箋
		$chOrd = db_queryOne("SELECT MAX(rxo001) FROM `rx_order` WHERE `rxo004` = {$GLOBALS["userDa"]["id"]} AND `rxo002` = 2;"); 
		if(isset($chOrd[0])){
			$redis = getRedis();
			$redis->hset("user:{$_COOKIE["u-tag"]}",'rod',$chOrd[0]);
		}
		
		
		$items = array(
			"rxuser"=>"rxo005=%s",
			"rxtype"=>"rxo002=%s",
			"rxtime"=>"DATE_SUB(CURDATE(),INTERVAL %s MONTH) <=  rxo003",
		);
		$itemVal = array(
			"rxuser"=>"-1",
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
		
		$rx_order = db_queryAll("SELECT rxo001,rxo002,rxo003,rxo006,rxo012,rxo014,rxo013,rxo015,rxo018,rxo016,rxo011,rxo020 FROM `rx_order` WHERE rxo004={$GLOBALS["userDa"]["id"]} {$queryStr} ORDER BY rxo003 DESC");
		
		view_assign("rx_order",$rx_order);
		
		$rx_user = db_queryAll("SELECT rxu001,rxu002 FROM `rx_user` WHERE rxu003={$GLOBALS["userDa"]["id"]}");
		
		view_assign("rx_user",$rx_user);
		view_assign("ORDER_TYPE",unserialize(ORDER_TYPE));
		view_assign("itemVal",$itemVal);
		
		
		view_assign("page","RXmain");
	}
?>