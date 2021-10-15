<?php
namespace ybs\cli;
use ybs\cli\base;

if (!defined('cli'))
    exit('No direct script access allowed');
require_once  "base.php";



class ybs_cli extends base {



public function run(){
	
	$cli  = $this->listener->getConsole();
	
	switch (count($cli)){
		//define ybs_cli
		case 1 :
			$this->show_command();
		break;
		
		//define command parent
		case 2:
			$cmd = $cli[1];
			$lcmd = explode(":",$cmd);
			if($lcmd[0]=="make"){
				if(count($lcmd)==1){
					//error if command is empty
					$this->show_error_command();
				}else{
					$this->define_command_parent_make($lcmd[1]);
				}
				
				
			}
			
			if($lcmd[0]=="migrate"){
				if(count($lcmd)==1){
						echo "migrate...";
						$this->migrate->install();
				}else{
					$this->define_command_parent_migrate($lcmd[1]);
				}	
			}
			
			
		break;
		
		
		//define command parent & detail command
		case 3:
			$cmd = $cli[1];
			$lcmd = explode(":",$cmd);
			if($lcmd[0]=="make"){
				if(count($lcmd)==1){
					//error if command is empty
					$this->show_error_command();
				}else{
					
					$argument = $cli[2];
					$this->define_command_make($lcmd[1],$argument);
					
				}
				
				
			}
			
			if($lcmd[0]=="migrate"){
				if(count($lcmd)==1){
						$this->show_error_command();
					
				}else{
					
				}	
			}
			
			
			
			
			
			
		break;
		
		
	}
	
}


private function define_command_parent_make($cmd){
	
		$cmd = strtolower($cmd);
		
		
		if($cmd==""){
			$this->show_error_command();
			return;
		}
	
		if($cmd=="help"){
				$this->show_command_make();
				return;
		}
					
		if($cmd=="-v"||$cmd=="view" || $cmd=="-m"||$cmd=="model" || $cmd=="-c"||$cmd=="controller"){	
			$this->listener->on();
			echo "enter name :";
			$pre = $this->listener->get();
			
			
			if($cmd=="-v"||$cmd=="view"){
				$this->mvc->create_view($pre);
				return;
			}
						
			if($cmd=="-m"||$cmd=="model"){
				$this->mvc->create_model($pre);
				return;
			}
											
			if($cmd=="-c"||$cmd=="controller"){
				$this->mvc->create_controller($pre,FALSE,FALSE);
				return;
			}	
		}else{
			$this->listener->on();
			echo "enter name :";
			$pre = $this->listener->get();
			
			$lcmd = explode("-",$cmd);
			$code = array_merge(array_diff($lcmd,array("")));
			
			
			$ltv = false;
			if(in_array("v",$code) || in_array("view",$code)){
				
				$this->mvc->create_view($pre);
				$ltv = true;
			}
			
			$ltm = false;
			if(in_array("m",$code) || in_array("model",$code)){
				
				$this->mvc->create_model($pre);
				$ltm = true;
			}
			
			if(in_array("c",$code) || in_array("controller",$code)){
				var_dump($pre);
				$this->mvc->create_controller($pre,$ltv,$ltm);
			}
			
			
			
		}											
	
}

private function define_command_make($cmd,$str){
	
	
	$cmd = strtolower($cmd);
	$str = strtolower($str);
	
	$str = str_replace("\\","/",$str);
	
	$lcmd = explode("-",$cmd);
	$code = array_merge(array_diff($lcmd,array("")));
	
	$ltv = false;
	
	$pre = array_merge(array_diff($code,array("c","m","v","controller","model","view","")));
	
	

	if(count($pre)>=1){
		$this->show_error_command();
		return;
	}

	if(in_array("v",$code) || in_array("view",$code)){
	
		$this->mvc->create_view($str);
		$ltv = true;
	}
			
	$ltm = false;
	if(in_array("m",$code) || in_array("model",$code)){
	
		$this->mvc->create_model($str);
		$ltm = true;
	}
			
	if(in_array("c",$code) || in_array("controller",$code)){
		
		$this->mvc->create_controller($str,$ltv,$ltm);
	}
	
	
	
			
	
}


public function define_command_parent_migrate($cmd){
	$cmd = strtolower($cmd);
	
		if($cmd==""){
			$this->show_error_command();
			return;
		}
		
		if($cmd=="help"){
				$this->show_command_migrate();
				return;
		}
		
		if($cmd=="rollback"){
				$this->show_command_migrate();
				return;
		}
		
		if($cmd=="create"){
				$this->show_error_command();
				echo "\n require [name]!";
				return;
		}
		
		
		
}


public function make_migrate($data){

	$this->migrate->install();
}



	
	
}

