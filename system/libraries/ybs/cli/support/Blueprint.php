<?php
namespace ybs\cli\support;
use ybs\cli\model;
use ybs\cli\support\ColumnDefenition;


if (!defined('cli'))
    exit('No direct script access allowed');

include "ColumnDefenition.php";



class Blueprint extends ColumnDefenition{
	
	
public 
$char 				= array(),
$bigIncrements 		= array(),
$bigInteger 		= array(),
$binary 			= array(),
$date 				= array(),
$dateTime 			= array(),
$decimal 			= array(),
$double 			= array(),
$float 				= array(),
$increments 		= array(),
$integer 			= array(),
$mediumInteger 		= array(),
$mediumText 		= array(),
$multiLineString 	= array(), 
$longText 			= array(),
$smallIncrements 	= array(),
$smallInteger 		= array(),
$string 			= array(),
$text 				= array(),
$timestamp 			= array();
        

private $table_name;		
		public function __construct(){
		
		}
		public function table_name($name){
			$this->table_name = $name;
		}
		
		public function run(){
			$a= new model();
			$a->dbforge->add_field($this->column_pattern);
			
			if(!empty($this->key_pattern)){
				$a->dbforge->add_key($this->key_pattern[0],$this->key_pattern[1]);
			}
			
			$a->dbforge->create_table($this->table_name);
			
			
			if(!empty($this->index_pattern)){
					foreach($this->index_pattern as $val){
						$sql = "CREATE INDEX $this->table_name"."_".$val."_index ON $this->table_name($val)";
						$a->db->query($sql);
					
					
					}
					
			}
			
			
	
		}
		
				public function tinyInteger($name,$l=NULL){
						return $this->add_column($name,"TINYINT",$l);
				}
				
				public function smallInteger($name,$l=NULL) {
					return $this->add_column($name,"SMALLINT",$l);
                }
            
				
                public function mediumInteger($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMINT",$l);
					
                }
				
				public function int($name,$l=NULL) {
					return $this->add_column($name,"INT",$l);
					
                }
				
				public function integer($name,$l=NULL) {
					return $this->add_column($name,"INTEGER",$l);
					
                }
				
				public function bigInteger($name="id",$l=NULL) {
					return $this->add_column($name,"BIGINT",$l);
                }
			
				public function double($name,$l=8,$d=2) {
					return $this->add_column($name,"DOUBLE",$l,$d);
                }
			
				public function float($name,$l=8,$d=2) {
					return $this->add_column($name,"FLOAT",$l,$d);
					
                }
				
				
				public function decimal($name,$l=8,$d=2) {
					return $this->add_column($name,"DECIMAL",$l,$d);
                }
				
                public function char($name,$l=20) {
					return $this->add_column($name,"CHAR",$l);
                }
				
				public function string($name,$l=100) {
					return $this->add_column($name,"VARCHAR",$l);
                }
				public function varchar($name,$l=100) {
					return $this->add_column($name,"VARCHAR",$l);
                }
				
				public function date($name="created_at",$l=NULL) {              
					return $this->add_column($name,"DATE",$l);
                }
				
				public function time($name="created_at",$l=NULL) {              
					return $this->add_column($name,"TIME",$l);
                }
				
				public function year($name="created_at",$l=NULL) {              
					return $this->add_column($name,"YEAR",$l);
                }
				
				public function timestamp($name,$l=NULL) {
					return $this->add_column($name,"TIMESTAMP",$l);
					
                }
				
				public function dateTime($name="created_at",$l=NULL) {
					return $this->add_column($name,"DATETIME",$l);
                }
				
				
				public function bit($name,$l=NULL) {
					return $this->add_column($name,"BIT",$l);
                }
				
				public function real($name,$l=NULL) {
					return $this->add_column($name,"REAL",$l);
                }
				
				public function numeric($name,$l=NULL) {
					return $this->add_column($name,"NUMERIC",$l);
                }
				
				public function point($name,$l=NULL) {
					return $this->add_column($name,"POINT",$l);
                }
				public function multiPoint($name,$l=NULL) {
					return $this->add_column($name,"MULTIPOINT",$l);
                }
				public function linestring($name,$l=NULL) {
					return $this->add_column($name,"LINESTRING",$l);
                }
				
				public function polygon($name,$l=NULL) {
					return $this->add_column($name,"POLYGON",$l);
                }
				public function multiPolygon($name,$l=NULL) {
					return $this->add_column($name,"MULTIPOLYGON",$l);
                }
				public function geometry($name,$l=NULL) {
					return $this->add_column($name,"GEOMETRY",$l);
                }
				public function geometryCollection($name,$l=NULL) {
					return $this->add_column($name,"GEOMETRYCOLLECTION",$l);
                }
				
				
				
				
				
				
				
				

              

               

                public function binary($name, $l=20) {
					return $this->add_column($name,"BINARY ",$l);
                }

                
				public function tinyIncrements($name="id",$l=NULL) {
					$this->add_column($name,"TINYINT",$l)->autoIncrement();
					return $this; 
                }
				
                public function smallIncrements($name="id",$l=NULL) {
					$this->add_column($name,"INT",$l)->autoIncrement();
					return $this; 
                }

                public function increments($name="id",$l=NULL) {
					$this->add_column($name,"INT",$l)->autoIncrement();
					return $this; 
                }

				
				public function mediumIncrements($name,$l=NULL) {
					$this->add_column($name,"MEDIUMINT",$l)->autoIncrement();
					return  $this;
					
                }
				
				public function bigIncrements($name="id",$l=NULL) {
					$this->add_column($name,"BIGINT",$l)->autoIncrement();
					return $this;
				
                }

				public function tinyText($name,$l=NULL) {
					return $this->add_column($name,"TINYTEXT",$l);
                }
                public function text($name,$l=NULL) {
					return $this->add_column($name,"TEXT",$l);
                }

                public function mediumText($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMTEXT",$l);
					
                }
				
				public function longText($name,$l=NULL) {;
					return $this->add_column($name,"LONGTEXT",$l);
				
                }

                public function multiLineString($name,$l=NULL) {
					return $this->add_column($name,"MULTILINESTRING",$l);
                }

				public function tinyBlob($name,$l=NULL) {
					return $this->add_column($name,"TINYBLOB",$l);
                }
				public function blob($name,$l=NULL) {
					return $this->add_column($name,"BLOB",$l);
                }
				public function mediumBlob($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMBLOB",$l);
                }
				public function longBlob($name,$l=NULL) {
					return $this->add_column($name,"LONGBLOB",$l);
                }
               

               

              

               


               

	private function add_column($column,$type,$l=NULL,$d=NULL){
		$a = array();
		
		if($l!== NULL && $d==NULL){

			$this->column_pattern[$column] = array("type"=>$type,"constraint"=>$l);
		}
		
		if($l !== NULL && $d!==NULL && $d > 0){
			$l = $l . "," . $d;
	
			$this->column_pattern[$column] = array("type"=>$type,"constraint"=>$l);
		}
		
		if($l == NULL && $d==NULL){
			$this->column_pattern[$column] = array("type"=>$type);
		}
		

		return $this;
	}
	
	
	
}