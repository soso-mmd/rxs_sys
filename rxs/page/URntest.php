<?PHP
	function page_excult(){
		$rs='xx';
		if($GLOBALS["userDa"]["lineNotify"]!=""){
			$lineRes=sendLine($GLOBALS["userDa"]["lineNotify"],array("message"=>"測試通知，無須理會。"));
			if(isset($lineRes["status"]) && $lineRes["status"]==200)
				$rs=1;
		}
		echo json_encode(array("rs"=>$rs));
		exit();
	}
?>