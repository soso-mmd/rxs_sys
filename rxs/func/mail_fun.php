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
		// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; //設定SMTP需要驗證 
		$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線 
		$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機 
		$mail->Port = 465; //Gamil的SMTP主機的SMTP埠位為465埠。 

		$mail->Username = $mailAuth["mailName"]; //設定驗證帳號 
		$mail->Password = $mailAuth["mailPass"]; //設定驗證密碼 
		// $mail->Password = "rxs@2019"; //設定驗證密碼 
		$mail->From = $mailAuth["mailName"]; //設定寄件者信箱 
		$mail->FromName = "慢箋雲端"; //設定寄件者姓名 

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
		// if(!$mail->Send()) {
			// echo "Mailer Error: " . $mail->ErrorInfo;
			// return false;
		// }
		// return true;
		return $mail->Send();
	}

?>