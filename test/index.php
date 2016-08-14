<?php
/**
 * name:test 
 * User: lee
 * Date: 2016-08-14 
 */
require('vars');
require('functions');

$PATH = isset($_SERVER["PATH_INFO"])?$_SERVER["PATH_INFO"]:false;
if(!$PATH) exit('404');  //没有路由参数

$request_route = require('request_route');
$route_keys = array_keys($request_route);
foreach ($route_keys as $value) 
{
	$key = str_replace('/', '\/', $value);
	if(preg_match("/$key/", $PATH))
	{
		$route = $request_route[$value];
		if($route["RequestMethod"] == $_SERVER["REQUEST_METHOD"])
		{
			$className = $route["Class"];
			$methodName = $route["Method"];
			require('code/'.$className.'.class.php');
			$_controller = new $className();
			$_controller->$methodName();
		}
	}
}




