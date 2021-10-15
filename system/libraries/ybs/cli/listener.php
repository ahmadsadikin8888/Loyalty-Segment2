<?php
namespace ybs\cli;

if (!defined('cli'))
    exit('No direct script access allowed');



class listener{
	
	private $listen;
	public function on(){
		$this->listen = fopen("php://stdin","r");	
	}
	
	public function get(){
		return trim(fgets($this->listen));
	}
	
	public function getConsole(){
		return $_SERVER['argv'];
		
	}
	
}