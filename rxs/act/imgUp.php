<?PHP
	function act_excult(){
		$uid = $GLOBALS["ACtype"] ==1?$GLOBALS["agentDa"]["pid"]:$GLOBALS["userDa"]["id"];
		$fileid= "{$uid}_".md5(date('YmdHis').rand(100,999)).".jpg";
		$res=1;
		$pic = $_POST["pic"];
		if(isset($_FILES[$pic])){
			if($_FILES[$pic]=="" || $_FILES[$pic]["error"]>0 ){
				$res=3;
			}elseif($_FILES[$pic]["size"]>2000000)
				$res=4;
		}elseif(isset($_POST[$pic]) && $_POST[$pic]!="" ){//前台壓縮過的圖
			$data = explode(',', $_POST[$pic]);
			if(count($data)!=2 || $data[0]=="" || !preg_match("/image\/jpeg/",$data[0]))$res=3;
		}
		if($res==1){
			if(isset($_FILES[$pic])){//前台未壓縮
				// Get the extension name by uploaded filename  
				$extName = substr( $_FILES[$pic]["name"],strrpos($_FILES[$pic]["name"],".") );   
				$extName = strtolower($extName);
				// check the file type is image   
				$isImage =  getimagesize ($_FILES[$pic]["tmp_name"]) ;   
				$allow = array('.jpeg','.jpg','.png','.gif');// only jpg gif png file name ( or custom by yourself)
				if($isImage and in_array( $extName ,$allow)  ) { 
					$uploadfile=false;
					switch($extName){
						case ".jpeg":
						case ".jpg":
							$uploadfile = imagecreatefromjpeg($_FILES[$pic]["tmp_name"]);
						break;
						case ".png":
							$uploadfile = imageCreateFromPng($_FILES[$pic]["tmp_name"]);
							break;
						case ".gif":
							$uploadfile = imagecreatefromgif($_FILES[$pic]["tmp_name"]);
							break;
					}
					if($uploadfile){
						img_press($uploadfile, PATH_HOME."photo/ms_img/{$fileid}");
						if(!file_exists(PATH_HOME."photo/ms_img/{$fileid}")){
							$res=3;
						}
					}else{
						$res=3;
					}
				} else {   
					$res=4;
				}  
			}else{
				$r=saveBase64Img(PATH_HOME."photo/ms_img/{$fileid}",$_POST[$pic]);
				if(!$r){
					$res=3;
				}
			}
		}
		
		if($res==1){
			echo $fileid;
		}else{
			echo "err";
		}
	}
	
?>