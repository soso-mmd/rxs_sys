<?php  
	date_default_timezone_set("Asia/Taipei");
	session_start();  
	$ranStr = md5(microtime());  
	$ranStr = substr($ranStr, 0, 4);  
	$_SESSION['cap_code'] = $ranStr;  
	// setcookie("cap_code",$ranStr, time()+300,'/');//5min
	$newImage = imagecreatefromjpeg("./cap_bg1.jpg");  
	$txtColor = imagecolorallocate($newImage, 0, 0, 0);
	putenv('GDFONTPATH='.realpath('.'));
	imagettftext($newImage, 24, 5, 15, 30, $txtColor, dirname(__FILE__)."/arial.ttf", $ranStr); 
	
	header("Content-type: image/jpeg"); 
	imagejpeg($newImage);
?>  