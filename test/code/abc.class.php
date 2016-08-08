<?php
/**
* 这是注释
* @Controller
*/
class abc
{
	/**
	* @RequestMapping("/getme",Method=GET);
	*/
	function index()
	{
		echo 'abc';
	}

	/**
	* @RequestMapping("/getage",Method=POST);
	*/
	function test()
	{
		echo 'abctest';
	}
}