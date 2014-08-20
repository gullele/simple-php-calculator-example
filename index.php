<?php

define ('PROJECT_HOME', __DIR__);

$config = parse_ini_file(PROJECT_HOME.'/config/config.ini');

if ($config['allow_debug']) {
	error_reporting(E_ALL);
	ini_set("display_errors", "1");	
}

use framework\dispatcher\Dispatcher;

$dispatcher = new Dispatcher();
$dispatcher->dispatch();

/*
 * Use autoload with namespace to avoid the include and or require wherever the class is needed.
 */
function __autoload($class){
	$class = str_replace('\\', '/', $class);
	include (PROJECT_HOME.'/'.$class.'.php');
}