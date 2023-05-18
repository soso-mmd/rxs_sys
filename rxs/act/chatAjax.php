<?PHP
	function act_excult(){
		// echo json_encode(array("rs"=>1));
		$uid = $GLOBALS["ACtype"] ==1?$GLOBALS["agentDa"]["pid"]:$GLOBALS["userDa"]["id"];
		$uname = $GLOBALS["ACtype"] ==1?$GLOBALS["agentDa"]["pname"]:$GLOBALS["userDa"]["name"];
		define("uid",$uid);
		define("uname",$uname);
		if(!isset($_POST["ac"]))return;
		switch($_POST["ac"]){
			case "1"://刷新消息與聯絡人
				$data = getmsg();
				echo json_encode($data);
				break;
			case "2"://刷新消息與聯絡人
				$data = chkmsg();
				echo json_encode($data);
				break;
			case "3"://已讀訊息
				if(!isset($_POST["act"])){
					break;
				}
				$rs=readed();
				$data = array();
				$data["rs"] = $rs;
				$data["act"] = $_POST["act"];
				echo json_encode($data);
				break;
			case "4"://儲存發送的訊息
				if(!isset($_POST["act"]) || strlen($_POST["msg"]) > 100 || !$_POST["msg"] || !in_array($_POST["msg_type"],array(0,1,2))){
					break;
				}
				$data = saveMsg();
				if(count($data)>0)
					$data["rs"] = 1;
				else
					$data["rs"] = 0;
				echo json_encode($data);
				break;
		}	
	}
	function saveMsg(){
		$uid = uid;
		$uname = uname;
		$ids = explode("-",$_POST["act"]);
		$dname = false;
		switch($ids[0]){
			case 1:
				$dname = db_queryOne("SELECT pag003 FROM `ph_agent` WHERE pag001={$ids[1]}");
				break;
			case 2:
				$dname = db_queryOne("SELECT usr002 FROM `user` WHERE usr001={$ids[1]}");
				break;
		}
		if(!$dname)return array();
		$lastm = db_queryOne("SELECT max(chm001) FROM `chat_msg` WHERE 1");
		$now = date("Y-m-d H:i:s");
		$sql = "INSERT INTO `chat_msg`(`chm002`, `chm003`, `chm004`, `chm005`, `chm006`, `chm007`, `chm008`, `chm009`, `chm010`, `chm011`) VALUES (";
		if(isset($_POST["mrx"])){
			$wstr=" AND O";
			$idx="";
			if($GLOBALS["ACtype"] ==1){
				$wstr = " AND rxo011 = {$GLOBALS["agentDa"]["pid"]}";
				$idx="CONCAT(2,'-',rxo004) AS act ";
			}elseif($GLOBALS["ACtype"] ==2){
				$wstr = " AND rxo004 = {$GLOBALS["userDa"]["id"]}";
				$idx="CONCAT(1,'-',rxo011) AS act ";
			}
			$rx = db_keyOne("SELECT rxo001 AS oid,{$idx},rxo014 AS hos FROM `rx_order` WHERE `rxo001` = {$_POST["mrx"]} {$wstr}; ");
			if($rx["act"]!=$_POST["act"])return array();
			$sql.=	"'{$GLOBALS["ACtype"]}',
				'{$uid}',
				'{$uname}',
				'{$ids[0]}',
				'{$ids[1]}',
				'{$dname[0]}',
				'2',
				'{$now}',
				0,
				'{$_POST["mrx"]}_{$rx["hos"]}'),(";
		}
		$sql.= "'{$GLOBALS["ACtype"]}',
				'{$uid}',
				'{$uname}',
				'{$ids[0]}',
				'{$ids[1]}',
				'{$dname[0]}',
				'{$_POST["msg_type"]}',
				'{$now}',
				0,
				'{$_POST["msg"]}')";
		$rs = db_updateLastid($sql);
		$da=array();
		if($rs){
			$da = getMsg($lastm[0]);
		}
		return $da;
	}
	function readed(){
		$uid = uid;
		$ids = explode("-",$_POST["act"]);
		$idStr = implode(",",$_POST["ids"]);
		$SQL = "UPDATE `chat_msg` SET `chm010`= 1 WHERE chm001 IN({$idStr}) AND chm002 = '{$ids[0]}' AND chm003 = '{$ids[1]}' AND chm005 = '{$GLOBALS["ACtype"]}' AND chm006 = '{$uid}'";
		$rs=db_update($SQL);
		return $rs;
	}
	function chkmsg(){
		$uid = uid;
		$SQL = "SELECT COUNT(*) AS rs FROM `chat_msg` WHERE 
					chm005={$GLOBALS["ACtype"]} 
					AND chm006='{$uid}' 
					AND chm010=0;";
		$msg = db_keyOne($SQL);
		return $msg;
	}
	function getmsg($lastmsg=0){
		$uid = uid;
		if($lastmsg==0)
			$lastmsg = isset($_POST["lmsg"])?$_POST["lmsg"]:0;
		$SQL = "SELECT `chm001` AS 'id',`chm002` AS 'stype',`chm003` AS 'sid', CONCAT(`chm002`,'-', `chm003`) AS 'sact', `chm004` AS 'sender',`chm005` AS 'dtype',`chm006` AS 'did', CONCAT(`chm005`,'-', `chm006`) AS 'dact',`chm007` AS des, DATE_FORMAT( chm009, '%m/%d %H:%i' ) AS 'time', `chm010` AS 'read', `chm011` AS 'msg', `chm008` AS 'msg_type' FROM `chat_msg` WHERE 
					chm001 > {$lastmsg} AND 
					((chm002={$GLOBALS["ACtype"]} AND chm003='{$uid}') OR (chm005={$GLOBALS["ACtype"]} AND chm006='{$uid}'))
					ORDER BY chm009 ASC";
		$msg = db_keyAll($SQL);
		$da = array(
			"f"=>array(),
			"msg"=>array(),
			"lsm"=>0
		);
		if(count($msg)>0){
			foreach($msg as $k => $m){
				if($msg[$k]["sact"] == "{$GLOBALS["ACtype"]}-{$uid}"){
					$msg[$k]["type"]=0;
					if(!isset($da["f"][$msg[$k]["dact"]])){
						$da["f"][$msg[$k]["dact"]]=array(
							"name"=>$m["des"],
							"id"=>$m["did"],
							"type"=>$m["dtype"],
							"lastmsg"=>$m["time"],
						);
					}else{
						$da["f"][$msg[$k]["dact"]]["lastmsg"]=$m["time"];
					}
				}else{
					$msg[$k]["type"]=1;
					if(!isset($da["f"][$msg[$k]["sact"]])){
						$da["f"][$msg[$k]["sact"]]=array(
							"name"=>$m["sender"],
							"id"=>$m["sid"],
							"type"=>$m["stype"],
							"lastmsg"=>$m["time"],
						);
					}else{
						$da["f"][$msg[$k]["sact"]]["lastmsg"]=$m["time"];
					}
				}
				$da["lsm"] = $m["id"];
			}
		}
		if(isset($_POST["rx"])){
			$wstr=" AND O";
			$idx="";
			if($GLOBALS["ACtype"] ==1){
				$wstr = " AND rxo011 = {$GLOBALS["agentDa"]["pid"]}";
				$idx="CONCAT(2,'-',rxo004) AS act ";
			}elseif($GLOBALS["ACtype"] ==2){
				$wstr = " AND rxo004 = {$GLOBALS["userDa"]["id"]}";
				$idx="CONCAT(1,'-',rxo011) AS act ";
			}
			$rx = db_keyOne("SELECT rxo001 AS oid,{$idx},rxo014 AS hos FROM `rx_order` WHERE `rxo001` = {$_POST["rx"]} {$wstr}; ");
			if($rx && count($rx)>0){
				$da["rx"]=$rx;
				if(!isset($da["f"][$rx["act"]])){
					$dname = false;
					$ids = explode("-",$rx["act"]);
					switch($ids[0]){
						case 1:
							$dname = db_queryOne("SELECT pag003 FROM `ph_agent` WHERE pag001={$ids[1]}");
							break;
						case 2:
							$dname = db_queryOne("SELECT usr002 FROM `user` WHERE usr001={$ids[1]}");
							break;
					}
					if(!$dname){
						unset($da["rx"]);
					}else{
						$da["f"][$rx["act"]]=array(
							"name"=>$dname[0],
							"id"=>$ids[1],
							"type"=>$ids[0],
							"lastmsg"=>date("m/d H:i"),
						);
					}
				}else{
					$da["f"][$rx["act"]]["lastmsg"]=date("m/d H:i");
				}
			}
		}
		if(isset($_POST["ph"])){
			$phda = db_queryOne("SELECT pag001,pag003 FROM `ph_agent` WHERE `pag001` = {$_POST["ph"]}");
			if($phda){
				$act = "1-{$phda[0]}";
				$da["ph"]=$act;
				if(!isset($da["f"][$act])){
					$da["f"][$act]=array(
						"name"=>$phda[1],
						"id"=>$phda[0],
						"type"=>1,
						"lastmsg"=>date("m/d H:i"),
					);
				}else{
					$da["f"][$act]["lastmsg"]=date("m/d H:i");
				}
			}
		}
		$da["msg"]=$msg;
		return $da;
	}
	
?>