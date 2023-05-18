<?php
	function page_excult(){
		if(isset($GLOBALS["userDa"]))header("Location:/");
		dealLinelogin();		
		view_assign("page","URlogin");
	}
?>