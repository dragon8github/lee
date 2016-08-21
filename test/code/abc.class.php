<?php
/**
* 这是注释
* @Controller
*/
class abc
{
	/**
	* @RequestMapping("/getme/(?<name>\w{2,10})/(?<age>\w{2,10})",Method=GET);
	*/
	function index($name,$age)
	{
		echo 'hello '.$name."   ".$age;
	}

	/**
	* @RequestMapping("/login",Method=GET);
	*/
	function login($render)
	{
		$arr["name"] = "Lee";
		$render('login',$arr);
		//require('./vars');
		//include 'page/login.html';
	}
}