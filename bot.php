<?php
use ybs\cli\base;

define("Connector","3696b14dc3ff4c4ad95ab0de4fb8d1c5");	
define('cli','runscript');	
require_once "base";	



$x = explode("/bot.php/" ,$_SERVER["REQUEST_URI"]);

if(count($x)==2)
	$file = APPPATH. "bot/"  . $x[1] . ".php";


if(isset($file)) {
	if(file_exists($file)){
			require_once BASEPATH.  "libraries/ybs/telegram/WebHook.php";
			require_once $file;
	}else{
		show_error404();
	}
}else{
	show_error404();
}

function show_error404(){
		$heading = "404 Page Not Found";
		$message = "&emsp; The page you requested was not found. <br><p> </p>";
		include APPPATH . "views/errors/html/error_404.php";
		die;
}

