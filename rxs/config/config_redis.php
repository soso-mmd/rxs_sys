<?php

$sys_redis=null;
$sys_redis_dbIndex=0;

function getRedis($i=0){
	global $sys_redis;
	 
	if($sys_redis!=null){
		$sys_redis->select($i);
		return $sys_redis;
	}
	require_once( PATH_HOME.'lib/Predis/Autoloader.php');
	Predis\Autoloader::register();		
	$sys_redis = new Predis\Client(array(
		'scheme' => 'tcp',
		'host'   => '127.0.0.1',
		'port'   => 6379,
	));
	$sys_redis->select($i);	
	
	return $sys_redis;
	}
?>
