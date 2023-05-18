<?php
	require_once(PATH_HOME."lib/PHPMailer/PHPMailer.php"); 
	require_once(PATH_HOME."lib/PHPMailer/SMTP.php"); 
	function sendMail($add,$tit,$cnt){
		$mset = db_queryAll("SELECT sys001, sys002 FROM `sys_conf` WHERE `sys001` IN ('mailName','mailPass')");
		$mailAuth = array();
		foreach($mset as $ms){
			$mailAuth[$ms[0]]=$ms[1];
		}
		$mail = new PHPMailer\PHPMailer\PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; //設定SMTP需要驗證 
		$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線 
		$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機 
		$mail->Port = 465; //Gamil的SMTP主機的SMTP埠位為465埠。 

		$mail->Username = $mailAuth["mailName"]; //設定驗證帳號 
		$mail->Password = $mailAuth["mailPass"]; //設定驗證密碼 
		$mail->From = $mailAuth["mailName"]; //設定寄件者信箱 
		$mail->FromName = "慢籤雲端"; //設定寄件者姓名 

		//設定收件者 
		$mail->AddAddress($add); 
		//設定密件副本 
		//$mail->AddBCC("55555@abc.com"); 

		//設定信件字元編碼 
		$mail->CharSet="utf-8"; 
		//郵件主題 
		$mail->Subject=$tit; 
		//郵件內容 
		$mail->Body = $cnt;
		//郵件內容為html
		$mail->IsHTML(true);                          	 
		
		return $mail->Send();
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
		$ch = curl_init();
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
		
		curl_setopt_array($ch, $options);
		$rs = curl_exec($ch);
		$result = json_decode($rs,true);
		$error = curl_error($ch);
		curl_close($ch);
		if($error)
			return $error;
		else
			return $result;
	}
	//通知使用者
	function noticeUser($porder,$tp){
		$usr = db_queryOne("SELECT usr003,usr002,usr008 FROM `user` WHERE `usr001` = {$porder[0]}");
		$cnt="";
		$lineCnt="";
		switch($tp){
			case 1:
				$imgUrl = imgUrl;
				$cnt= <<<EOF
				<div style='width:60%;margin-left:auto;margin-right:auto;'>
					<h6>{$usr[1]} 您好:</h6>
					患者<b>{$porder[1]}</b>在<b>{$porder[2]}</b>的慢籤藥
					<br>
					<img style="width:200px;" src="{$imgUrl}/photo/rx_img/rx{$porder[3]}.jpg">
					<br>
					已由<b>{$GLOBALS["agentDa"]["pname"]}</b>為您備好了。
					<br>
					請攜帶慢籤與患者健保卡至<b>{$GLOBALS["agentDa"]["pname"]}</b>領取，謝謝。
					<br>
					藥局地址:<br>
					<b>{$GLOBALS["agentDa"]["paddr"]}</b>
					<br>
					<br>
					祝您萬事順心！<br>
					慢籤雲端
				</div>
EOF;
					$lineCnt = <<<EOF
					\n{$usr[1]} 您好:
					患者{$porder[1]}在{$porder[2]}的慢籤藥
					已由{$GLOBALS["agentDa"]["pname"]}為您備好了。
					請攜帶慢籤與患者健保卡至
					{$GLOBALS["agentDa"]["pname"]}領取，謝謝。\n
					藥局地址:
					{$GLOBALS["agentDa"]["paddr"]}
					祝您萬事順心！
EOF;
				break;
		}
		sendMail($usr[0],"慢籤可領取通知",$cnt);
		if($usr[2]!="" && chkUserLine($usr[2])){
			sendLine($usr[2],array("message"=>$lineCnt));
		}			
	}


?>