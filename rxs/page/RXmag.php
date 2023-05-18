<?php
	function page_excult(){
		$rx_user = db_queryAll("SELECT rxu001,rxu002,rxu005 FROM `rx_user` WHERE rxu003={$GLOBALS["userDa"]["id"]}");
		view_assign("rx_user",$rx_user);
		view_assign("page","RXmag");
	}
?>