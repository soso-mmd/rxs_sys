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
	$sys_dbr->query("SET CHARACTER SET UTF8MB4");
	return $sys_dbr;
	}
function getDBw()
	{
	global $sys_dbw,$main_dbName;
	
	if($sys_dbw!=null)return $sys_dbw;
	$host='127.0.0.1';
	$port='3306';
	$user='rxw';
	$pass='rx@write';
	$dns="mysql:host=$host;port=$port;dbname=$main_dbName";
	$sys_dbw=new PDO($dns, $user, $pass);
	$sys_dbw->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
	$sys_dbw->query("SET CHARACTER SET UTF8MB4");
	return $sys_dbw;
	}
function showSqlError($sql)
	{
	if(SHOW_DB_EORROR==1)
		echo 'error:'.$sql;
	
	}

?>
