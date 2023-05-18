<?PHP
	function pcurl($url,$post,$options=false){
		$ch = curl_init();
		if(!$options){
			$options = array(
				CURLOPT_URL => $url,
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
	function getSYS(){
		$ary = db_queryAll("SELECT `sys001`, `sys002` FROM `sys_conf` WHERE 1");
		foreach($ary as $a){
			$GLOBALS[$a[0]]=$a[1];
		}
	}
	function saveBase64Img($furl,$base64_string){
		try{
			$data = explode(',', $base64_string);
			$file = fopen($furl, "wb");
			$data = explode(',', $base64_string);
			fwrite($file, base64_decode($data[1]));
			fclose($file);
			return true;
		}catch(Exception $e){
			return false;
		}
	}
	function img_press($uploadfile,$new) { 
		//取得當前圖片大小
		$width = imagesx($uploadfile);
		$height = imagesy($uploadfile);
		// $i=0.5;
		$maxwidth=$GLOBALS["imgPress"]>0?$GLOBALS["imgPress"]:500;
		//生成縮略圖的大小
		if($width > $maxwidth){
			$ratio = $maxwidth/$width;
			
			$newwidth = $width * $ratio;
			$newheight = $height * $ratio;
		  
			// $newwidth = $width * $i;
			// $newheight = $height * $i;
			if(function_exists("imagecopyresampled")){
				$uploaddir_resize = imagecreatetruecolor($newwidth, $newheight);
				imagecopyresampled($uploaddir_resize, $uploadfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			}else{
				$uploaddir_resize = imagecreate($newwidth, $newheight);
				imagecopyresized($uploaddir_resize, $uploadfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			}
  
			ImageJpeg ($uploaddir_resize,$new);
			ImageDestroy ($uploaddir_resize);
		}else{
			ImageJpeg ($uploadfile,$new);
		}
	}
	function showRes($res){
		echo json_encode($res);
	}
	//通知使用者
	function noticeUser($ord,$tp,$reson=false){
		$porder = db_queryOne("SELECT rxo004,rxo006,rxo014 FROM `rx_order` WHERE `rxo001` = {$ord}");
		$usr = db_queryOne("SELECT usr003,usr002,usr008 FROM `user` WHERE `usr001` = {$porder[0]}");
		$cnt="";
		$lineCnt="";
		$ctitle="";
		switch($tp){
			case 1:
				$ctitle="慢箋可領取通知";
				$cnt= <<<EOF
				<div style='width:60%;margin-left:auto;margin-right:auto;'>
					<h6>{$usr[1]} 您好:</h6>
					患者<b>{$porder[1]}</b>在<b>{$porder[2]}</b>的慢箋藥
					<br>
					<img style="width:200px;" src="{$_SERVER['HTTP_HOST']}/photo/rx_img/rx{$ord}.jpg">
					<br>
					已由<b>{$GLOBALS["agentDa"]["pname"]}</b>為您備好了。
					<br>
					請攜帶慢箋與患者健保卡至<b>{$GLOBALS["agentDa"]["pname"]}</b>領取，謝謝。
					<br>
					藥局地址:<br>
					<b>{$GLOBALS["agentDa"]["paddr"]}</b>
					<br>
					<br>
					祝您萬事順心！<br>
					慢箋雲端
				</div>
EOF;
					$lineCnt = <<<EOF
					\n{$usr[1]} 您好:
					患者{$porder[1]}在{$porder[2]}的慢箋藥
					已由{$GLOBALS["agentDa"]["pname"]}為您備好了。
					請攜帶慢箋與患者健保卡至
					{$GLOBALS["agentDa"]["pname"]}領取，謝謝。\n
					藥局地址:
					{$GLOBALS["agentDa"]["paddr"]}
					祝您萬事順心！
EOF;
				break;
			case 2:
				$ctitle="慢箋取消通知";
				$cnt= <<<EOF
				<div style='width:60%;margin-left:auto;margin-right:auto;'>
					<h6>{$usr[1]} 您好:</h6>
					很遺憾告訴您，
					<br>
					患者<b>{$porder[1]}</b>在<b>{$porder[2]}</b>的慢箋
					<br>
					<img style="width:200px;" src="{$_SERVER['HTTP_HOST']}/photo/rx_img/rx{$ord}.jpg">
					<br>
					已由<b>{$GLOBALS["agentDa"]["pname"]}</b>取消了。
					<br>
					理由為:
					<br>
					{$reson}
					<br>
					<br>
					請再與藥局聯繫或重新上傳慢箋
					<br>
					藥局電話:<b>{$GLOBALS["agentDa"]["phone"]}</b>
					<br>
					藥局地址:
					<br>
					<b>{$GLOBALS["agentDa"]["paddr"]}</b>
					<br>
					<br>
					祝您萬事順心！<br>
					慢箋雲端
				</div>
EOF;
					$lineCnt = <<<EOF
					\n{$usr[1]} 您好:
					很遺憾告訴您，
					患者{$porder[1]}在{$porder[2]}的慢箋
					已由{$GLOBALS["agentDa"]["pname"]}取消了。
					理由為:
					{$reson}
					
					請再與藥局聯繫或重新上傳慢箋
					藥局電話:{$GLOBALS["agentDa"]["phone"]}
					藥局地址:
					{$GLOBALS["agentDa"]["paddr"]}
					
					祝您萬事順心！
EOF;
				break;
		}
		sendMail($usr[0],$ctitle,$cnt);
		if($usr[2]!="" && chkUserLine($usr[2])){
			sendLine($usr[2],array("message"=>$lineCnt));
		}			
	}
?>