<?php
	//---------------------------line login--------------------------------------------
	function dealLinelogin(){
		view_assign("linelogin_code",$GLOBALS["linelogin_code"]);
		view_assign("linelogin_url",$GLOBALS["linelogin_url"]);
		view_assign("burl","{$_SERVER['HTTP_HOST']}/llogin");
		
	}
	function decodeTaken($token,$callback){
		$url = $GLOBALS["linelogin_verify_url"];
		$post = array(
			"id_token"=>$token,
			"client_id"=>$GLOBALS["linelogin_code"],
		);
		return pcurl($url,$post);
	}
	
	function getLineloginTaken($code,$callback){
		$url = $GLOBALS["linelogin_token_url"];
		$post = array(
			"grant_type"=>"authorization_code",
			"code"=>$code,
			"redirect_uri"=>$callback,
			"client_id"=>$GLOBALS["linelogin_code"],
			"client_secret"=>$GLOBALS["linelogin_sec"],
		);
		return pcurl($url,$post);
	}
	
	//----------------------------line notify -----------------------------------------
	function getLineTaken($code,$callback){
		$url = "https://notify-bot.line.me/oauth/token";
		$post = array(
			"grant_type"=>"authorization_code",
			"code"=>$code,
			"redirect_uri"=>$callback,
			"client_id"=>$GLOBALS["line_code"],
			"client_secret"=>$GLOBALS["line_sec"],
		);
		return pcurl($url,$post);
	}
	function chkUserLine($lineCode){
		$lineRes = sendLine($lineCode,array(),"status");
		// $lineRes = sendLine($lineCode,array("message"=>"test123"));
		if(isset($lineRes["status"]) && $lineRes["status"]==200){
			return true;
		}else
			return false;
	}
	function sendLine($code,$post,$type="notify"){
		$url = "https://notify-api.line.me/api/{$type}";
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array("Authorization: Bearer {$code}"),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36",
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_REFERER => '',
			CURLOPT_NOSIGNAL => true,
			CURLOPT_TIMEOUT => '',
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_SSL_VERIFYHOST=>0,
			CURLOPT_SSL_VERIFYPEER=>0,
		);
		if($post) {
			$options[CURLOPT_POST] = true;
			$options[CURLOPT_POSTFIELDS] = http_build_query($post);
		}
		return pcurl($url,$post,$options);
	}
?>