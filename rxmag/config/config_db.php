<?php
  
$sys_dbr=null;
$sys_dbw=null;
$main_dbName='rxs';
define("SHOW_DB_EORROR",1);
function getDBr()
	{
	global $sys_dbr,$main_dbName;
	
	if($sys_dbr!=null)return $sys_dbr;
	$host='127.0.0.1';
	$port='3306';
	$user='rxr';
	$pass='rx@read';
	$dns="mysql:host=$host;port=$port;dbname=$main_dbName";
	$sys_dbr=new PDO($dns, $user, $pass);
	$sys_dbr->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
	$sys_dbr->query("SET CHARACTER SET UTF8");
	return $sys_dbr;
	}
function getDBw()
	{
	global $sys_dbw,$main_dbName;
	
	if($sys_dbw!=null)return $sys_dbw;
	$host='127.0.0.1';
	$port='3306';
	$user='rxb';
	$pass='rx@backup';
	$dns="mysql:host=$host;port=$port;dbname=$main_dbName";
	$sys_dbw=new PDO($dns, $user, $pass);
	$sys_dbw->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
	$sys_dbw->query("SET CHARACTER SET UTF8");
	return $sys_dbw;
	}
function showSqlError($sql)
	{
	if(SHOW_DB_EORROR==1)
		echo 'error:'.$sql;
	
	}
	function db_updateLastid($sql){
		$db = getDBw();
		$r = $db->exec($sql);
		if($r>0){
			return $db->lastInsertId();
		}else{
			return 0;
		}
		return 0;

	}
	function db_queryOne($sql,$master=false){
		$db = $master?getDBw():getDBr();
		$rs = $db->query($sql);
		if($rs){
			$data = $rs->fetch();
			$rs->closeCursor();
			return $data;
		}else{
			showSqlError($sql);
			return null;
		}
	}
	function db_keyOne($sql,$master=false){
		$db = $master?getDBw():getDBr();
		$rs = $db->query($sql);
		if($rs){
			$data = $rs->fetch(PDO::FETCH_ASSOC);
			$rs->closeCursor();
			return $data;

		}else{
			showSqlError($sql);
			return null;
		}
	}
	function db_queryAll($sql,$master=false){
		$db = $master?getDBw():getDBr();

		$rs = $db->query($sql);
		if($rs){
			$data = $rs->fetchAll();
			$rs->closeCursor();
			return $data;
		}else{
			showSqlError($sql);
			return null;
		}
	}
		
	function db_keyAll($sql,$master=false,$key=false){
		$db = $master?getDBw():getDBr();

		$rs = $db->query($sql);
		if($rs){
			if($key){
				$data = array();
				while($row = $rs->fetch(FETCH_ASSOC)){
					$data[$row[$key]] = $row;
				}
			}else{
				$data = $rs->fetchAll(PDO::FETCH_ASSOC);
			}
			$rs->closeCursor();
			return $data;
		}else{
			showSqlError($sql);
		//	$rs->closeCursor();
			return null;
		}
	}
	function db_execute($sql){
		$db = getDBw();
		$rs = $db->query($sql);
		if($rs===false )
			{
			//return 'a';
			return false;
		}else{
			
		//	$rs->closeCursor();
			return true;
		}
	}	
	function db_update($sql){
		$db = getDBw();

		$r = $db->exec($sql);
		if($r===false){
			return false;
		}else{
			return true;
		}
	}
	function db_updates($sqls){
		$db = getDBw();
		$c=count($sqls);
		for($i=0;$i<$c;$i++){
			try{
				$r=$db->exec($sqls[$i]);
				if($r===false){
					showSqlError($sqls[$i]);
					return false;
				}
			}catch(PDOException $e){
				return false;
			}
		}
		return true;
	}
?>
