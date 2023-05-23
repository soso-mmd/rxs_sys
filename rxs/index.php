<?php
	// ini_set('display_errors', 1);
	require_once("./config/config_sys.php");
	require_once(PATH_HOME."config/config_smarty.php");
	require_once(PATH_HOME."config/config_redis.php");
	require_once(PATH_HOME."config/config_db.php");
	require_once(PATH_HOME."func/db_func.php");
	require_once(PATH_HOME."func/pub.php");
	require_once(PATH_HOME."func/chk_page.php");
	require_once(PATH_HOME."func/mail_fun.php");
	require_once(PATH_HOME."func/line_fun.php");
	pub();
	function pub(){
		$type=0;
		getSYS();
		chk_acc($type);
		view_assign("ctype",$type);
		$msgAry = array();
		if(isset($GLOBALS["fbPag"]	) && $GLOBALS["fbPag"]	!="0"	)$msgAry["facebook"]=$GLOBALS["fbPag"];
		if(isset($GLOBALS["lineUrl"]) && $GLOBALS["lineUrl"]!="0"	)$msgAry["line"]=$GLOBALS["lineUrl"];
		view_assign("msgAry",$msgAry);
		view_assign("ver",ver);
		view_assign("imgPress",$GLOBALS["imgPress"]);
		if(count($_GET)==0){ //首頁
			view_assign("page","index");
			view_assign("pAgent",isset($GLOBALS["agentDa"])?$GLOBALS["agentDa"]:false);
			view_assign("ud",isset($GLOBALS["userDa"])?$GLOBALS["userDa"]:false);
			view_assign("indxYT",$GLOBALS["indxYT"]);
			dealLinelogin();
			view_display("frame_page.tpe");
			return;
		}
		if(isset($_GET["type"]) && isset($_GET["type"])=="ac"){
			if(isset($_GET["page"])){
				chk_page($_GET["page"]);
				require_once(PATH_HOME."act/{$_GET["page"]}.php");
			}
			act_excult();
			return;
		}
		if(isset($_GET["page"])){
			chk_page($_GET["page"]);
			require_once(PATH_HOME."page/{$_GET["page"]}.php");
			page_excult();
			view_assign("page_org",$GLOBALS["page_org"]);
			view_assign("page_name",$GLOBALS["page_name"]);
		}
		view_assign("pAgent",isset($GLOBALS["agentDa"])?$GLOBALS["agentDa"]:false);
		view_assign("ud",isset($GLOBALS["userDa"])?$GLOBALS["userDa"]:false);
		view_display("frame_page.tpe");
	}
?>