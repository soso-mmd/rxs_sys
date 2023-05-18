<?php
	function page_excult(){
		$dpag="PHmain";
		$res=0;
		$items = array('ph_id','pwd');
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
			$uda = db_keyOne("SELECT `pag001` AS pid, `pag002` AS pac, `pag003` AS pname,CONCAT(`pag006`,`pag007`,`pag008`) AS paddr,pag014 AS phone FROM `ph_agent` WHERE pag002='{$_POST["ph_id"]}' AND pag004='{$_POST["pwd"]}' AND pag005=1");
			if($uda){
				$uid = sha1(time()."{$uda['pid']}@{$uda['pac']}");
				$now = date("Y-m-d H:i:s");
				db_execute("INSERT INTO `login_user`(`lou002`, `lou003`, `lou004`, `lou005`, `lou006`) VALUES (2,{$uda['pid']},'{$uid}','{$now}','{$GLOBALS["UserIP"]}')");
				db_execute("UPDATE `ph_agent` SET pag010='{$now}' WHERE pag001={$uda["pid"]} ");
				
				$redis = getRedis();
				$redis->hmset("ph_agent:".$uid,$uda);
				
				setcookie("p-tag",$uid,time()+(3600*24*30));
				$res=1;
				if(isset($_COOKIE["dpag"])){
					$dpag=$_COOKIE["dpag"];
					setcookie("dpag","",time()-1);
				}
			}
		}
		// print_r($redis->hgetall("user:".$_COOKIE["u-tag"]));
		view_assign("dpag",$dpag);
		view_assign("res",$res);
		view_display("plogin.tpe");
		exit();
	}
?>