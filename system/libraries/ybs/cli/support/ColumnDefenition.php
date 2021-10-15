<?php
namespace ybs\cli\support;
if (!defined('cli'))
    exit('No direct script access allowed');


class ColumnDefenition{


public $column_pattern = array();
public $index_pattern = array();
public $key_pattern="";


public function __construct(){
	
}	
	
public function index(){
	$this->_inject_type("index",NULL);
	return $this;
}	

public function after($col='column'){
	
}	
	
public function autoIncrement(){
	$this->_inject_type("auto_increment",TRUE);
	return $this;	
}


public function primary(){
	$this->_inject_type("primary",NULL);	
	return $this;
}



public function charset($utf = 'utf8'){
	
}
	
	
public function collation($utf='utf8_unicode_ci'){
	
}	

public function comment($comment = 'my comment'){
	
}

public function default($value = NULL){
	$this->_inject_type("default",$value);
	return $this;
}

public function first(){
	
}
	
public function nullable($value = TRUE)	{
	$this->_inject_type("null",TRUE);
	return $this;
}

public function unsigned($value = TRUE){
	$this->_inject_type("unsigned",TRUE);
	return $this;
}	


private function _inject_type($index_name,$index_value){
	
	$end= count($this->column_pattern)-1;
	
	$key 	= array_keys($this->column_pattern);
	$skey   = end($key);
	
	
	if($index_name=="auto_increment"){
		$this->key_pattern = array($skey,TRUE);
	}
	
	if($index_name=="primary"){
		$this->key_pattern = array($skey,TRUE);
		return;
	}
	
	if($index_name=="index"){
		$this->index_pattern [] = $skey;
		return;
	}
	
		
	
	
	
	$type = $this->column_pattern[$skey];
	$type[$index_name] = $index_value;
	$this->column_pattern[$skey] = $type;
	
	
	
}
	
	
}