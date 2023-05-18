<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
	function page_excult(){
		$res=1;
		$pics = array(
			"license"=>'ph_license',
			"PHlicense"=>'ph_phlicense',
			"photo"=>'ph_photo'
		);
		//確認資料不為空
		foreach($pics as $pic){
			if(isset($_FILES[$pic])){
				if($_FILES[$pic]=="" || $_FILES[$pic]["error"]>0 ){
					$res=3;
				}elseif($_FILES[$pic]["size"]>2000000)
					$res=4;
			}elseif(isset($_POST[$pic]) && $_POST[$pic]!="" ){//前台壓縮過的圖
				$data = explode(',', $_POST[$pic]);
				if(count($data)!=2 || $data[0]=="" || !preg_match("/image\/jpeg/",$data[0]))$res=3;
			}
		}
		$items = array(
			'ph_name',
			'ph_mail',
			'ph_num',
			'ph_phname',
			'ph_runday',
			'ph_runtime',
			'ph_phone',
			'ph_country',
			'ph_district',
			'ph_address',
			'ph_introduction',
			'pwd'
		);
		//確認藥局未註冊過
		if(db_queryOne("SELECT pag002 FROM `ph_agent` WHERE pag002='{$_POST["ph_num"]}'"))
			$res=7;
		//確認手機符合格式
		if(preg_match("/\D/",$_POST["ph_phone"])){
			return "手機不符合格式";
		}
		
		//確認資料不為空
		foreach($items as $item){
			if(!isset($_POST[$item]) || $_POST[$item]==""){
				$res=2;
				break;
			}
		}
		//確認驗證碼
		if(!chk_cap())
			$res = 6;
		
		
		//密碼變成雜湊碼
		// $_POST["pwd"] = sha1($_POST["pwd"]);
		if($res==1){
			$now = date("Y-m-d H:i:s");
			$valAry=array(
				"'{$_POST["ph_num"]}'",
				"'{$_POST["ph_name"]}'",
				"'{$_POST["pwd"]}'",
				0,	
				"'{$_POST["ph_country"]}'",
				"'{$_POST["ph_district"]}'",
				"'{$_POST["ph_address"]}'",
				"'{$now}'",
				"'{$_POST["ph_phname"]}'",
				"'{$_POST["ph_runday"]}'",
				"'{$_POST["ph_runtime"]}'",
				"'{$_POST["ph_phone"]}'",
				"'{$_POST["ph_introduction"]}'",
				"'{$_POST["ph_mail"]}'",
			);
			$valStr= implode(",",$valAry);
			$phId = db_updateLastid("INSERT INTO `ph_agent`(`pag002`, `pag003`, `pag004`, `pag005`, `pag006`, `pag007`, `pag008`, `pag009`, `pag011`, `pag012`, `pag013`, `pag014`, `pag015`, `pag018`) VALUES ({$valStr})");
			if($phId==0 || $phId==""){
				$res = 5;
			}else{//存圖片
				foreach($pics as $k=>$p){
					if(isset($_FILES[$p])){//前台未壓縮
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
							if($uploadfile){
								img_press($uploadfile, PATH_HOME."photo/ph_img/img{$phId}_{$k}.jpg");
								if(!file_exists(PATH_HOME."photo/ph_img/img{$phId}_{$k}.jpg")){
									$res=3;
									break;
								}
							}else{
								$res=3;
								break; 
							}
						} else {   
							$res=4;
							break;
						}  
					}else{
						$r=saveBase64Img(PATH_HOME."photo/ph_img/img{$phId}_{$k}.jpg",$_POST[$p]);
						if(!$r){
							$res=3;
							break;
						}
					}
				}
				if($res!=1){
					db_execute("DELETE FROM `ph_agent` WHERE pag001={$phId}");
					foreach($pics as $k=>$p){
						$file = PATH_HOME."photo/ph_img/img{$phId}_{$k}.jpg";
						if(file_exists($file)){
							unlink($file);//將檔案刪除
						}
					}					
				}
			}
		}
		view_assign("res",$res);
		view_display("PHadd.tpe");
		exit();
	}
?>