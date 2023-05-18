<?php          
function page_excult(){ 
	$msg="";
	if(isset($_POST["sa"]))
		$msg = saveDa();
	
	view_assign("msg",$msg);
	view_assign("page","introPH");
}    
function saveDa(){
	$items = array('pname','paddress');
	//確認資料不為空
	foreach($items as $item){
		if(!isset($_POST[$item]) || $_POST[$item]==""){
			return "資料有缺，請填寫完整";
		}
	}
	//確認驗證碼
	if(!chk_cap())
		return "驗證碼錯誤";
	
	$valAry=array();
	foreach($items as $item){
		array_push($valAry,"'{$_POST[$item]}'");
	}
	$now = date("Y-m-d H:i:s");
	array_push($valAry,"'{$now}'");
	$valStr= implode(",",$valAry);
	$rs = db_updateLastid("INSERT INTO `introducte_PH`(`inp002`, `inp003`, `inp004`) VALUES ({$valStr})");
	if($rs)
		return "推薦藥局成功! 感謝推薦，本站會盡快與推薦藥局接洽。";
	else
		return "推薦失敗";
		
}
?>  