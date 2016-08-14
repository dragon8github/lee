<?php
/**
* 这是注释
* @Controller
*/
class abc
{
	/**
	* @RequestMapping("/getme/\w{2,10}",Method=GET);
	*/
	function index()
	{
		echo 'abc';
	}

	/**
	* @RequestMapping("/getage/\w{2,10}",Method=POST);
	*/
	function test()
	{
		echo 'abctest';
	}
}