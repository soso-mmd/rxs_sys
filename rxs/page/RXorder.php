<?php
	function page_excult(){
		$res=1;
		$items = array('rx_user','ph_agent','sel_hospital');
		//確認資料不為空
		foreach($items as $item){
			if(!isset($_POST[$item]) || $_POST[$item]=="" || $_POST[$item]=="0"){
				$res=2;
				break;
			}
		}
		//確認圖片
		if(isset($_FILES["rx"])){
			if( $_FILES["rx"]=="" || $_FILES["rx"]["error"]>0){
				$res=3;
			}elseif($_FILES["rx"]["size"]>2000000)
				$res=4;
		}elseif(isset($_POST["rx"]) && $_POST["rx"]!="" ){//前台壓縮過的圖
			$data = explode(',', $_POST["rx"]);
			if(count($data)!=2 || $data[0]=="" || !preg_match("/image\/jpeg/",$data[0]))$res=3;
		}
		
		//確認慢箋使用者
		$rxUserData = db_keyOne("SELECT 
									rxu001 AS rid,
									rxu002 AS rname,
									rxu004 AS rsid,
									rxu005 AS rgen,
									rxu006 AS rbir,
									rxu007 AS rphone FROM `rx_user` WHERE rxu001={$_POST["rx_user"]} AND rxu003={$GLOBALS["userDa"]["id"]}");
		if(!$rxUserData) $res=5;
		
		//確認藥局
		$phData = db_keyOne("SELECT 
									pag001 AS pid,
									pag003 AS pname,
									CONCAT(pag006,pag007,pag008) AS paddr FROM `ph_agent` WHERE pag001={$_POST["ph_agent"]} AND pag005=1");
		if(!$phData) $res=6;
		
		if($res==1){
			$valAry=array(
				"NOW()",
				$GLOBALS["userDa"]["id"],
				"'{$rxUserData["rid"]}'",
				"'{$rxUserData["rname"]}'",
				"'{$rxUserData["rsid"]}'",
				"'{$rxUserData["rgen"]}'",
				"'{$rxUserData["rbir"]}'",
				"'{$rxUserData["rphone"]}'",
				"'{$phData["pid"]}'",
				"'{$phData["pname"]}'",
				"'{$phData["paddr"]}'",
				"'{$_POST["sel_hospital"]}'"
			);
			$valStr= implode(",",$valAry);
			$orderId = db_updateLastid("INSERT INTO `rx_order`(`rxo003`, `rxo004`, `rxo005`, `rxo006`, `rxo007`, `rxo008`, `rxo009`, `rxo010`, `rxo011`, `rxo012`, `rxo013`, `rxo014`) VALUES ({$valStr})");
			if(!$orderId){
				$res = 5;
			}elseif(isset($_FILES["rx"])){//儲存並壓縮圖片
				$p = "rx";
				// Get the extension name by uploaded filename  
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
					if($uploadfile)
						img_press($uploadfile, PATH_HOME."photo/rx_img/rx{$orderId}.jpg");
					else
						$res=3;
				} else {   
					$res=4;
				}  
			}else{
				$r=saveBase64Img(PATH_HOME."photo/rx_img/rx{$orderId}.jpg",$_POST["rx"]);
				if(!$r)$res=3;
			}
			if($res!=1){
				db_execute("DELETE FROM `rx_order` WHERE pag001={$orderId}");
				$file = PATH_HOME."photo/rx_img/rx{$orderId}.jpg";
				if(file_exists($file)){
					unlink($file);//將檔案刪除
				}				
			}
		}
		view_assign("res",$res);
		view_display("RXorder.tpe");
		exit();
	}
	
?>