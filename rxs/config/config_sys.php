<?PHP
	ini_set("display_errors",true);
	define("PATH_HOME",	dirname(dirname(__FILE__)) . '/');
	define("ver",time());
	define("sary",serialize(array(
		"man"=>"男",
		"woman"=>"女"
	)));
		
	//頁面權限
	define("PAGE_AUTH", serialize(array(
		"mailtest"=>"常見問題FQA",
		"fqa"=>"常見問題FQA",
		"AgentMap"=>"尋找藥局",
		"introPH"=>"推薦藥局",
		"PHcmt"=>"藥局評論",
		"chkOrder"=>"確認慢箋狀態",
		"searchHP"=>"查詢醫院",
		"Cmsg"=>"雲端通",
		"chatAjax"=>"雲端通",
		"imgUp"=>"聊天傳圖",
		"llogin"=>"line login",
		
		//會員端
		"URforget"=>"會員忘記密碼",
		"dealForget"=>"發帳號驗證碼",
		"URreset"=>"重設密碼",
		"repass"=>"重設密碼ajax",
		"URregist"=>"會員註冊",
		"URntest"=>"測試通知",
		"URadd"=>"註冊檢查",
		"URlogin"=>"會員登入",
		"URlogout"=>"會員登出",
		"URmain"=>"會員中心",
		"URinfo"=>"會員資料更新",
		"clogin"=>"登入檢查",
		
		//慢箋
		"RXmain"=>"慢箋管理",
		"RXregister"=>"新增慢箋使用者",
		"RXadd"=>"慢箋使用者新增",
		"RXmag"=>"慢箋使用者管理",
		"RXuser"=>"慢箋使用者",
		"RXupload"=>"新增慢箋",
		"RXorder"=>"新增慢箋",
		
		//藥局端
		"PHforget"=>"藥局忘記密碼",
		"ForgetAjax"=>"發帳號驗證碼",
		"PHreset"=>"重設密碼",
		"PHrepass"=>"重設密碼ajax",
		
		
		"PHregister"=>"合作藥局註冊申請",
		"PHadd"=>"合作藥局註冊申請",
		"PHlogin"=>"合作藥局登入",
		"PHmain"=>"合作藥局專區",
		"PHorder"=>"慢箋管理",
		"PHinfo"=>"藥局資料更新",
		"plogin"=>"合作藥局登入檢查",
		
	)));
	//慢箋狀態
	define("ORDER_TYPE",serialize(array(
		0=>"慢箋申請",
		1=>"慢箋確認",
		2=>"可領藥",
		3=>"已領藥",
		4=>"已取消",
	)));
	
	//頁面組織線
	define("PAGE_ORG", serialize(array(
		"RXregister"=>array(
			"URmain"=>"會員中心",
			"RXmag"=>"慢箋使用者管理",
		),
		"RXuser"=>array(
			"URmain"=>"會員中心",
			"RXmag"=>"慢箋使用者管理",
		),
		"PHcmt"=>array(
			"AgentMap"=>"尋找藥局",
		),
		"RXmag"=>array(
			"URmain"=>"會員中心",
		),
		"URinfo"=>array(
			"URmain"=>"會員中心",
		),
		"RXmain"=>array(
			"URmain"=>"會員中心",
		),
		"Umsg"=>array(
			"URmain"=>"會員中心",
		),
		"RXupload"=>array(
			"URmain"=>"會員中心",
			"RXmain"=>"慢箋管理"
		),
		"PHorder"=>array(
			"PHmain"=>"合作藥局專區"
		),
		"PHinfo"=>array(
			"PHmain"=>"合作藥局專區"
		),
		"Cmsg"=>array(
			"PHmain"=>"合作藥局專區"
		),
	)));
	
	//共通頁面
	define("SHARE_PAGE",serialize(array(
		"Cmsg",
		"chatAjax",
		"imgUp",
	)));
	
	//會員頁面
	define("USER_PAGE",serialize(array(
		"RXmain",
		"RXregister",
		"RXadd",
		"RXmag",
		"RXuser",
		"RXupload",
		"RXorder",
		"URmain",
		"URinfo",
		"URntest",
	)));
	
	//藥局頁面
	define("AGENT_PAGE",serialize(array(
		"PHmain",
		"PHorder",
		"PHinfo",
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