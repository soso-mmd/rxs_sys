<?php
require_once(PATH_HOME."func/mail_fun.php"); 
function act_excult(){
	$res = array();
	if(!isset($_POST["email"]) || $_POST["email"]==""){
		$res["rs"]=-1;
		return showRes($res);
	}
	$ur = db_queryOne("SELECT usr001,usr002 FROM `user` WHERE `usr003` LIKE '{$_POST["email"]}'");
	if(!$ur){
		$res["rs"]=-2;
		return showRes($res);
	}
	$rcode = getCode(6,$ur);
	$cnt= <<<EOF
		<div style='width:60%;margin-left:auto;margin-right:auto;'>
			<h6>$ur[1] 您好:</h6>
			您是否正在嘗試登入?<br>
			如果是請使用以下帳號驗證碼完成重設密碼<br>
			<h2>帳號驗證碼:<br>$rcode</h2>
			<br>
			<br>
			祝您使用愉快！<br>
			慢箋雲端
		</div>
EOF;
	// echo $rcode;
	
	if(sendMail($_POST["email"],"您的帳號驗證碼 {$rcode} ",$cnt)){
		$res["rs"]=1;
		return showRes($res);
	}else{
		$res["rs"]=-3;
		return showRes($res);
	}
}

function getCode($c,$ur){
	do{
		$res = array();
		for($i=0;$i<$c;$i++){
			$r = rand(0,9);
			array_push($res,$r);
		}
		$rc= implode("",$res);
		$drs = db_queryOne("SELECT usr001 FROM `user` WHERE usr009='{$rc}'");
	}while($drs);
	db_updateCount("UPDATE `user` SET `usr009` = '{$rc}' WHERE `usr001` = {$ur[0]};");
	return $rc;
}
?>