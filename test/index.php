<?php
/**
 * project name:test 
 * User: lee
 * Date: 2016-08-07 
 */
 header("Content-type: text/html; charset=utf-8");
 require('vars');
 require('functions');

 //测试专用临时超恶心路由
 $PATH = $_SERVER["PATH_INFO"];
 $controller = explode('/', $PATH)[1];
 $action = explode('/', $PATH)[2];
 require('./code/'.$controller.'.class.php');
 // $_controller = new $controller();
 // $_controller->$action();

 $f = new ReflectionClass($controller);
 $Doc = $f->getDocComment();
 if(preg_match('/@Controller/', $Doc))
 {
 	echo "控制器";
 }
