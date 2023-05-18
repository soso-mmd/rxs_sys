<?php
	function page_excult(){
		$msg="";
		if(isset($_POST["act"])){
			$msg=saveDa();
		}
		$pda = db_keyOne("SELECT 	`pag001` AS pid, 
									`pag002` AS pac,
									`pag003` AS pname,
									`pag006` AS pcity,
									`pag007` AS pdist,
									`pag008` AS paddr,
									`pag011` AS pher,
									`pag012` AS rday,
									`pag013` AS rtime,
									`pag014` AS phone,
									`pag015` AS intro,
									`pag018` AS mail
						FROM `ph_agent` WHERE pag001='{$GLOBALS["agentDa"]["pid"]}'");
		view_assign("pda",$pda);
		view_assign("msg",$msg);
		view_assign("page","PHinfo");
	}
	function saveDa(){
		$pics = array(
			"license"=>'ph_license',
			"PHlicense"=>'ph_phlicense',
			"photo"=>'ph_photo'
		);
		//確認資料不為空
		foreach($pics as $pic){
			//確認圖片
			if(isset($_FILES[$pic])){
				if($_FILES[$pic]["size"]>2000000 || $_FILES[$pic]["error"]>0){
					return "圖片上傳錯誤";   
				}
			}elseif(isset($_POST[$pic]) && $_POST[$pic]!="" ){//前台壓縮過的圖
				$data = explode(',', $_POST[$pic]);
				if(count($data)!=2 || $data[0]=="" || !preg_match("/image\/jpeg/",$data[0]))return "圖片上傳錯誤";
			}
		}
		$items = array(
			'ph_num'			=>"pag002",
			'ph_name'			=>"pag003",
			'ph_phname'			=>"pag011",
			'ph_runday'			=>"pag012",
			'ph_runtime'		=>"pag013",
			'ph_phone'			=>"pag014",
			'ph_country'		=>"pag006",
			'ph_district'		=>"pag007",
			'ph_address'		=>"pag008",
			'ph_introduction'	=>"pag015",
			'ph_mail'	=>"pag018"
		);
		//確認藥局未註冊過
		if(db_queryOne("SELECT pag002 FROM `ph_agent` WHERE pag002='{$_POST["ph_num"]}' AND pag001!={$GLOBALS["agentDa"]["pid"]}"))
			return "藥局字號已註冊";
		$pda = db_keyOne("SELECT 
						pag002 AS ph_num,
						pag003 AS ph_name,
						pag011 AS ph_phname,
						pag012 AS ph_runday,
						pag013 AS ph_runtime,
						pag014 AS ph_phone,
						pag006 AS ph_country,
						pag007 AS ph_district,
						pag008 AS ph_address,
						pag015 AS ph_introduction, 
						pag018 AS ph_mail 
						FROM `ph_agent` WHERE pag001={$GLOBALS["agentDa"]["pid"]}");
		$udAry=array();
		foreach($items as $item=>$cow){
			if(isset($_POST[$item]) && $_POST[$item]!="" && $_POST[$item]!=$pda[$item])
				array_push($udAry,"{$cow}='{$_POST[$item]}'");	
		}
		//確認手機符合格式
		if(preg_match("/\D/",$_POST["ph_phone"])){
			return "手機不符合格式";
		}
		if(isset($_POST["pwd"]) && $_POST["pwd"]!="" && $_POST["pwd"]==$_POST["pwd_chk"])
			array_push($udAry,"pag004='{$_POST["pwd"]}'");
		$res = true;
		foreach($pics as $k=>$p){
			// Get the extension name by uploaded filename
			if(isset($_FILES[$p]) && $_FILES[$p]["error"]==0){
				$extName = substr( $_FILES[$p]["name"],strrpos($_FILES[$p]["name"],".") );   
				$extName = strtolower($extName);
				// check the file type is image   
				$isImage =  getimagesize ($_FILES[$p]["tmp_name"]) ;   
				$allow = array('.jpeg','.jpg','.png','.gif');// only jpg gif png file name ( or custom by yourself)
				if($isImage and in_array( $extName ,$allow)  ) { 
					$uploadfile=false;
					switch($extName){
						case ".jpeg":
						case ".jpg":
							$uploadfile = imagecreatefromjpeg($_FILES[$p]["tmp_name"]);
						break;
						case ".png":
							$uploadfile = imageCreateFromPng($_FILES[$p]["tmp_name"]);
							break;
						case ".gif":
							$uploadfile = imagecreatefromgif($_FILES[$p]["tmp_name"]);
							break;
					}
					if($uploadfile){
						img_press($uploadfile, PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg");
						if(!file_exists(PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg")){
							$res=false;
							break;
						}elseif(!rename(PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg",PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}.jpg")){
							$file = PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg";
							if(file_exists($file)){
								unlink($file);//將檔案刪除
							}
							$res=false;
							break;
						}
					}else{
						$res=false;
						break;
					}
				} else {   
					$res=false;
					break;
				}  
			}elseif(isset($_POST[$p]) && $_POST[$p]!=""){
				$r=saveBase64Img(PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg",$_POST[$p]);
				if($r){
					if(!file_exists(PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg")){
						$res=false;
						break;
					}elseif(!rename(PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg",PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}.jpg")){
						$file = PATH_HOME."photo/ph_img/img{$GLOBALS["agentDa"]["pid"]}_{$k}tmp.jpg";
						if(file_exists($file)){
							unlink($file);//將檔案刪除
						}
						$res=false;
						break;
					}
				}else{
					$res=false;
					break;
				}
			}
		}
		$msg = "";
		if($res)
			$msg="修改成功";
		else
			return "修改失敗";
			
		if(count($udAry)>0){
			$udStr = implode(",",$udAry);
			$r = db_update("UPDATE `ph_agent` SET {$udStr} WHERE pag001={$GLOBALS["agentDa"]["pid"]}");
			if($r){
				$nda = db_keyOne("SELECT `pag001` AS pid, `pag002` AS pac, `pag003` AS pname FROM `ph_agent` WHERE pag001={$GLOBALS["agentDa"]["pid"]}");
				$redis = getRedis();
				$redis->hmset("ph_agent:{$_COOKIE["p-tag"]}",$nda);
				$GLOBALS["agentDa"] = $nda;
				$msg= "修改成功";
			}else
				$msg= "修改失敗";
		}
		return $msg;
	}
?>