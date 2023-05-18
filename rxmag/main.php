<?PHP
	
	require_once("./config/config_sys.php");
	require_once(PATH_HOME."config/config_smarty.php");
	
	if(isset($_POST["q"]) && $_POST["q"]==passCode){
		setcookie("mteg",$_POST["q"],time()+(3600*24));
	}else{
		header("Location:/");
		exit();
	}
	$mpages = unserialize(mpage);
	view_assign("mpages",$mpages);
	view_assign("ver",ver);
	view_display("index.tpe");
?>

