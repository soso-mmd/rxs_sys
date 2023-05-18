<?php
ini_set('display_errors', 1);
//引用路徑http://mag.com/bg/hptCat/sheethub/getHospital.php
define("PATH_HOME",	dirname(dirname(dirname(dirname(__FILE__)))). '/');
require_once(PATH_HOME."config/config_db.php");
require_once(PATH_HOME."bg/hptCat/baseGetHospital.php");
class getHospital extends \base\BaseGetAns{ 	
	function __construct(){
		$nowUrl = "https://sheethub.com/ronnywang/%E5%81%A5%E4%BF%9D%E7%89%B9%E7%B4%84%E9%86%AB%E7%99%82%E9%99%A2%E6%89%80%E5%90%8D%E5%86%8A%E5%90%AB%E6%A9%9F%E6%A7%8B%E4%BB%A3%E7%A2%BC%E3%80%81%E5%9C%B0%E5%9D%80%E3%80%81%E9%9B%BB%E8%A9%B1%E3%80%81%E7%89%B9%E7%B4%84%E9%A1%9E%E5%88%A5?sql=SELECT+%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E4%BB%A3%E7%A2%BC%2C%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E5%90%8D%E7%A8%B1%2C%E6%A9%9F%E6%A7%8B%E5%9C%B0%E5%9D%80++FROM+this+WHERE+%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E7%A8%AE%E9%A1%9E%21%3D%27B%27%0D%0A%0D%0A&format=json&download=1";
		$reUrl = "https://sheethub.com/ronnywang/%E5%81%A5%E4%BF%9D%E7%89%B9%E7%B4%84%E9%86%AB%E7%99%82%E9%99%A2%E6%89%80%E5%90%8D%E5%86%8A%E5%90%AB%E6%A9%9F%E6%A7%8B%E4%BB%A3%E7%A2%BC%E3%80%81%E5%9C%B0%E5%9D%80%E3%80%81%E9%9B%BB%E8%A9%B1%E3%80%81%E7%89%B9%E7%B4%84%E9%A1%9E%E5%88%A5/sql?sql=SELECT+%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E4%BB%A3%E7%A2%BC%2C%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E5%90%8D%E7%A8%B1%2C%E6%A9%9F%E6%A7%8B%E5%9C%B0%E5%9D%80++FROM+this+WHERE+%E9%86%AB%E4%BA%8B%E6%A9%9F%E6%A7%8B%E7%A8%AE%E9%A1%9E%21%3D%27B%27%0D%0A%0D%0A";
		parent::init($nowUrl,$reUrl);
	}
	//擷取資訊
	function writeEnd(){
		$hAry = json_decode($this->lines_string,true);
		if(count($hAry)>0){
			$sqlAry = array();
			foreach($hAry["data"] as $hd){
				array_push($sqlAry,"('{$hd[0]}','{$hd[1]}','{$hd[2]}')");
			}
			$sqlStr = "TRUNCATE `hospital_data`;";
			$hdStr = implode(",",$sqlAry);
			$sqlStr .= "INSERT INTO `hospital_data`(`hda001`, `hda002`, `hda003`) VALUES {$hdStr};";
			$rs = db_execute($sqlStr);
			echo count($sqlAry);
		}
	}
}
$c = new getHospital();	
?>
	


