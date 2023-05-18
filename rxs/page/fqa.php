<?php
	function page_excult(){
		$qa = db_queryAll("SELECT * FROM `qa_list` WHERE qal005=0;");
		$q = isset($_GET["q"])?$_GET["q"]:0;
		
		view_assign("q",$q);
		view_assign("qa",$qa);
		view_assign("page","fqa");
	}
?>