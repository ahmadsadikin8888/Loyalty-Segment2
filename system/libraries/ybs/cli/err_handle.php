<?php
namespace ybs\cli;

if (!defined('cli'))
    exit('No direct script access allowed');

class err_handle  {

	private $ERROR_MESSAGE;
	
	
	public function open_error_trap(){
		set_error_handler(
			function($s,$m,$f,$l){
				throw new ErrorException($m,$s,$s,$f,$l);
			}
		);
	}
	
	public function close_error_trap(){
		restore_error_handler();
	}
	
	
	public function setErrorMessage($err){
		 $this->ERROR_MESSAGE = $err;
	}
	
	public function getErrorMessage(){
		return $this->ERROR_MESSAGE;
	}
	
}

