<?php
/**
 * project name:test 
 * User: lee
 * Date: 2016-08-07 
 */
 echo "hello world";

 $PATH = $_SERVER["PATH_INFO"];
 $controller = explode('/', $PATH)[1];
 $action = explode('/', $PATH)[2];
 echo $controller . $action;

