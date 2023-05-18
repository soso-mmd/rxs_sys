<?php
	function db_updateLastid($sql){
		$db = getDBw();
		$r = $db->exec($sql);
		if($r>0){
			return $db->lastInsertId();
		}else {
			showSqlError($sql);
			return 0;
		}
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
	function db_updateCount($sql)
	{
	$db = getDBw();

	$r = $db->query($sql);
	if($r===false)
		{
		return false;
		}else{
		return $r->rowCount();
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