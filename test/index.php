<?php
/**
 * name:test 
 * User: lee
 * Date: 2016-08-14 
 */
require('vars');
require('functions');

//自定义函数：仅保留key为字母的值
function justStrArr($arr)
{
	$arr2 = array();
	foreach ($arr as $key => $value) {
		if(preg_match('/[a-zA-Z]+/', $key)) $arr2[$key] = $value;
	}
	return $arr2;
}

//渲染模板
$render = function($tpl = "",$var = array())
{
	extract($var);
	require('vars');
	if($tpl != "") include "page/{$tpl}.html";
};

$PATH = isset($_SERVER["PATH_INFO"])?$_SERVER["PATH_INFO"]:false;
if(!$PATH) exit('404');  //没有路由参数

$request_route = require('request_route');  //引用路由文件
$route_keys = array_keys($request_route);   //获取路由文件中所有的key，即是url路由名以及验证规则

//遍历request_route文件下所有的key（正则）
foreach ($route_keys as $value) 
{  
	//为了使用正则表达式，必须转义
	$key = str_replace('/', '\/', $value);  
	 //与当前的url进行比对
	if(preg_match("/$key/", $PATH,$result))
	{
		//获取当前的路由数组
		$route = $request_route[$value];  
		//判断控制器中设置的访问方式和目前请求的访问方式是否相同
		if($route["RequestMethod"] == $_SERVER["REQUEST_METHOD"])
		{
			$className = $route["Class"];//获取request_rote文件中指定键的类名
			$methodName = $route["Method"];//获取request_rote文件中指定键的函数名
			$para = justStrArr($result); //仅保留key为字符串的值
			$para["render"] = $render;
			require('code/'.$className.'.class.php');  //引用真正的代码文件 
			$class_obj = new ReflectionClass($className);  //根据类名返回一个函数反射类
			$Reflec_Method = $class_obj->getMethod($methodName); //返回该类下的函数反射类
			$Reflec_Method->invokeArgs(new $className(),$para);//委托(该函数所在的类实例，参数集)
			// if($para && count($para) > 0)
			// {
			// 	//委托(该函数所在的类实例，参数集)
			// 	$Reflec_Method->invokeArgs(new $className(),$para);
			// }
			// else
			// {
			// 	//无参委托
			// 	$Reflec_Method->invoke(new $className());
			// }
		}
	}
}





