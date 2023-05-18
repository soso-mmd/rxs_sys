<?PHP
	define("PATH_HOME",	dirname(dirname(__FILE__)) . '/');
	define("ver",time());
	
	define("passCode","rxmanager");
	define("imgUrl","https://www.rxcloud.club/");
	define("mpage",serialize(array(
		"hlist"=>"藥局列表",
		"ihlist"=>"推薦藥局",
		"qalist"=>"FQA管理",
		"mset"=>"系統設定",
		
	)));
	define("ytSet",serialize(array(
		"indxYT"
	)));
	//ip
	$UserIP="";
	if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$UserIP=$_SERVER["HTTP_X_FORWARDED_FOR"];
		if(strpos($UserIP,',')!==false)
			{
			$UserIP = substr($UserIP,0,strpos($UserIP,','));
			}	
	}else if(isset($_SERVER["REMOTE_ADDR"])){
		$UserIP=$_SERVER["REMOTE_ADDR"];
	}
	$GLOBALS["UserIP"] = $UserIP;
?>