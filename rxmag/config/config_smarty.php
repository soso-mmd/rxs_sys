<?php

define("SMART_TPL", PATH_HOME."_view/");


$tmp_view=null;
header('Content-type: text/html; charset=utf-8');

function getTemplate()
	{
	global $tmp_view;
	if($tmp_view==null)
		{
		require PATH_HOME."lib/smarty/Smarty.class.php";
		$tmp_view = new Smarty();
		$tmp_view->template_dir = SMART_TPL;
	
		$tmp_view->compile_dir = SMART_TPL."temp/";
		$tmp_view->cache_dir = SMART_TPL."cache/";	
		
		}
	return $tmp_view;
	}
function view_assign($name,$value)
	{
	global $tmp_view;
	getTemplate();

	$tmp_view->assign($name,$value);
	}
function view_fetch($page)
	{
	global $tmp_view;
	getTemplate();
	return $tmp_view->fetch($page);
	}	
function view_display($page)
	{
	global $tmp_view;
	getTemplate();
	$tmp_view->display($page);
	}
?>