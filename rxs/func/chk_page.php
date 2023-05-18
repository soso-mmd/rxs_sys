<?PHP	
	function UserLogin($where){
		$uda = db_keyOne("SELECT usr001 AS id,usr002 AS name,usr003 AS email,usr005 AS phone,usr008 AS lineNotify, 0 AS rod FROM `user` WHERE {$where}");
		if($uda){
			$uid = sha1(time()."{$uda['email']}@{$uda['phone']}");
			$now = date("Y-m-d H:i:s");
			db_execute("INSERT INTO `login_user`(`lou002`, `lou003`, `lou004`, `lou005`, `lou006`) VALUES (1,{$uda['id']},'{$uid}','{$now}','{$GLOBALS["UserIP"]}')");
			db_execute("UPDATE `user` SET usr007='{$now}' WHERE usr001={$uda["id"]} ");
			
			$redis = getRedis();
			$redis->hmset("user:".$uid,$uda);
			$domanin=preg_replace("/www\./","",$_SERVER["HTTP_HOST"]);
			setcookie("u-tag",$uid,time()+(3600*24),"",".{$domanin}");
			if(isset($_COOKIE["dpag"])){
				$dpag=$_COOKIE["dpag"];
				setcookie("dpag","",time()-1);
			}
			return 1;
		}
	}
	
	function chk_page($page){
		$pg_auth = unserialize(PAGE_AUTH);
		$SHARE_PAGE = unserialize(SHARE_PAGE);
		$user_page = unserialize(USER_PAGE);
		$agent_page = unserialize(AGENT_PAGE);
		$page=$_GET["page"];
		if(!isset($pg_auth[$page])){ //確認是網站頁面
			header("HTTP/1.0 404 Not Found");
			exit();
		}
		
		if(in_array($page,$SHARE_PAGE) && !isset($GLOBALS["userDa"]) && !isset($GLOBALS["agentDa"])){	//確認共同頁面需要登入會員或藥局
			header("Location:/");
			setcookie("dpag",$page,time()+3600);
		}
		if(in_array($page,$user_page) && !isset($GLOBALS["userDa"])){	//確認會員頁面需要登入
			header("Location:URlogin");
			setcookie("dpag",$page,time()+3600);
		}
		if(in_array($page,$agent_page) && !isset($GLOBALS["agentDa"])){	//確認藥局頁面需要登入
			header("Location:PHlogin");
			setcookie("dpag",$page,time()+3600);
		}
		$pg_org = unserialize(PAGE_ORG);
		$org = array();
		if(isset($pg_org[$page]))
			$org = $pg_org[$page];
		$GLOBALS["page_org"]=$org;
		$GLOBALS["page_name"]=$pg_auth[$page];
	}
	// function getUserType(){
		// if(isset($GLOBALS["userDa"]))
			// return 1;
		// elseif(isset($GLOBALS["agentDa"]))
			// return 2;
	// }
	function chk_acc(&$type){//判斷登入狀態
		$redis = getRedis();
				
		//藥局登入狀態檢查
		if(isset($_COOKIE["p-tag"]) && $redis->exists("ph_agent:{$_COOKIE["p-tag"]}")){
			$pAgent = $redis->hgetall("ph_agent:{$_COOKIE["p-tag"]}");
			$GLOBALS["agentDa"] = $pAgent;
			$GLOBALS["ACtype"] = 1;
			$type=1;
			return;
		}
		//使用者登入狀態檢查
		if(isset($_COOKIE["u-tag"]) && $redis->exists("user:{$_COOKIE["u-tag"]}")){
			$ud = $redis->hgetall("user:{$_COOKIE["u-tag"]}");
			$GLOBALS["userDa"] = $ud;
			$GLOBALS["ACtype"] = 2;
			$type=2;
			
		}
	}
	function chk_cap(){  //判斷驗證碼
		session_start(); 
		if(!isset($_SESSION["cap_code"]) || !isset($_POST["cap_code"]) || $_SESSION["cap_code"] != $_POST["cap_code"]){
			return false;
		}else{
			unset($_SESSION["cap_code"]);
		}
		return true;
	}
?>