<?php
	function page_excult(){
		if(isset($_COOKIE["p-tag"])){
			$redis = getRedis();
			$redis->del("ph_agent:{$_COOKIE["p-tag"]}");
			setcookie("p-tag",0,time()-1);
		}
		if(isset($_COOKIE["u-tag"])){
			$redis = getRedis();
			$redis->del("user:{$_COOKIE["u-tag"]}");
			setcookie("u-tag",0,time()-1);
		}
		echo "<script> location.href='/';</script>";
	}
?>