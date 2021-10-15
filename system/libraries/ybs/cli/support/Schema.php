<?php
namespace ybs\cli\support;
use ybs\cli\support\Blueprint;


require_once "Blueprint.php";








class Schema  {
	
	public function __construct(){
	
		
	}
	
	public static function create($table,$f){
		$a = new Blueprint();
		$f($a);
		$a->table_name($table);
		$a->run();
	}

	
	
	
}
