<?php
	require_once("../_pub/superway.php");
	$res = array();
	$dealPage = array(
		"hlist"=>array("pag","ph_agent"),
		"ihlist"=>array("inp","introducte_PH")
	);
	foreach($dealPage as $dp=>$dv){
		$where = "";
		if(isset($_POST[$dp]) && $_POST[$dp]>0)
			$where = "AND {$dv[0]}001>{$_POST[$dp]}";
		$res[$dp] =db_keyOne("SELECT MAX({$dv[0]}001) AS mid, COUNT(*) AS c FROM `{$dv[1]}` WHERE {$dv[0]}005=0 {$where};");
	}
	echo json_encode($res);
?>