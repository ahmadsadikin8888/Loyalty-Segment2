<?php 
namespace ybs\cli;
use ybs\cli\support;

if (!defined('cli'))
    exit('No direct script access allowed');




class migrate {
	
	private $longVersion = 21;
	private $longName = 22;
	

	
	public function install(){
		
		$d_map = directory_map(APPPATH.'/migrate/',1);
		//$d = date('Y_m_d',time()) . "_" . time();
		//2020_01_07_1578379391_sample_01.php
		
		$this->create_migrate_table();
		
		foreach($d_map as $val){
			$version 		= substr($val,0,$this->longVersion);
			$name 			= substr($val,$this->longName);
			
			require_once APPPATH ."migrate/" . $val;
			$className 		= substr($name,0,strlen($name)-4);
		
			
			$c = new $className();
			$c->up();
			echo "Migrated : " .$val . "\n";
			
			
		}
		
		
		// $b = new sample_01();
		// $b->up();
		// unset($b);
	} 
	
	private function create_migrate_table(){
		$a = new model();
		$exist = $a->db->table_exists("migrations");
		if(!$exist){
			$f = array(
				"id" =>array(
					"type" 				=> "INT",
					"auto_increment"	=> TRUE,
				),
				"migration" =>array(
					"type" 				=> "VARCHAR",
					"constraint"		=> 191,
				),
				"batch" =>array(
					"type" 				=> "INT",
				),
			
			);
			$a->dbforge->add_field($f);
			$a->dbforge->add_key("id",TRUE);
			$a->dbforge->create_table("migrations");
		}
	}
	

	
	
	
	
}