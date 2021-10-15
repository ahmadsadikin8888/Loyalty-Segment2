<?php

if (!defined('Connector'))
    exit('No direct script access allowed');



class Connector {
	
	public $db;
	
	private $connection;
	
	public function __construct(){

	
	
		include APPPATH . "config" . DIRECTORY_SEPARATOR . "database.php";
		
		$g = $db['default'];
		$g = json_encode($g);
		$g = json_decode($g,false);

		$server		= $g->hostname; //sesuaikan dengan nama server
		$user		= $g->username; //sesuaikan username
		$password	= $g->password; //sesuaikan password
		$database	= $g->database; //sesuaikan target databese
		
		$this->connection = mysqli_connect($server, $user, $password,$database) ;
		
		
		
		if(mysqli_connect_errno()){
			echo "failed connected.." .mysqli_connect_error() ;
			die;
		}
		
		mysqli_set_charset($this->connection, 'utf8');
		
		$this->db = $this;
	
	}
	
	
	public function escape_string($data){
		$a =  $this->connection->real_escape_string($data);
		return $a;
	}
	
	public function query($q){
		$query = mysqli_query($this->connection, $q);
		
		if(!$query){
			$error_number = mysqli_errno($this->connection);
			$error_message = mysqli_error($this->connection);
			$query = $q;
			include "view/error/error_db.php";	
			die;
		}
		
		
		$data= array();
		while($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		return $data;
	}

	
	public function close(){
		mysqli_close($this->connection);
	}
	
	
	
}
