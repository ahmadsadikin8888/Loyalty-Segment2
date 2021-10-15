<?php
namespace ybs\cli;

use ybs\cli\err_handle;
use ybs\cli\listener;
use ybs\cli\mvc;
use ybs\cli\migrate;
use ybs\cli\model;
use ybs\cli\support\Blueprint;
use ybs\cli\support\ColumnDefenition;
use ybs\cli\support\Schema;

if (!defined('cli'))
    exit('No direct script access allowed');

require_once "err_handle.php";
require_once "listener.php";
require_once "mvc.php";
require_once "migrate.php";
require_once "model.php";
require_once "support/Blueprint.php";
require_once "support/ColumnDefenition.php";
require_once "support/Schema.php";


require_once BASEPATH . "helpers/directory_helper.php";




class base extends err_handle {

public $listener;
public $mvc;

public function __construct(){
	$this->listener = new listener();
	$this->mvc  = new mvc();
	$this->migrate = new migrate();
}



	


	
public function show_command(){
$this->show_logo();	
echo "
  COMMAND:                    Descriptions
----------------------------------------------------------------------

  make:help                   list command in make
  make:[-c] [name]            create file controller
  make:[contoller] [name]     create file controller
  make:[-m] [name]            create file model
  make:[model] [name]         create file model
  make:[-v] [name]            create file view
  make:[view] [name]          create file view
  make:[-c-m-v] [name] 	      create file controller-view-model
  
  migrate:help                         list command migrate
  migrate                              install all file migrate
  migrate:create [name]                create file migration (empty)
  migrate:create [--c] [name] [table]  create file migration (schema create)
  migrate:create [--u] [name] [table]  create file migration (schema update)
  migrate:create [--all]               create file migration all table
  migrate:rollback                     rollback all migrate
  migrate:rollback --step=[value]      rollback step  


  
----------------------------------------------------------------------

----------------------------------------------------------------------
";		
}

public function show_command_make(){
$this->show_logo();	
echo "
  COMMAND:                      Descriptions
----------------------------------------------------------------------
  
  make:help                     list command in make
  make:[-c] [name]              create new file controller
  make:[contoller] [name]       create new file controller
  make:[-m] [name]              create new file model
  make:[model] [name]           create new file model
  make:[-v] [name]              create new file view
  make:[view] [name]            create new file view
  make:[-c-m-v][name]           create file controller-view-model
----------------------------------------------------------------------
-c : controller, -m : model , -v : view , name : path file  
----------------------------------------------------------------------
example :
- create controller file 
make:controller MyProject/First_Controller

or

make:-c MyProject/First_Controller

or

make:-c-m-v MyProject/First_Controller
---------------------------------------------------------------------- 
";		
}


public function show_command_migrate(){
$this->show_logo();	
echo "
  COMMAND:                             Descriptions
----------------------------------------------------------------------
  
  migrate:help                         list command migrate
  migrate                              install all file migrate
  migrate:create [name]                create file migration (empty)
  migrate:create [--c] [name] [table]  create file migration (schema create)
  migrate:create [--u] [name] [table]  create file migration (schema update)
  migrate:create [--all]               create file migration all table
  migrate:rollback                     rollback all migrate
  migrate:rollback --step=[value]      rollback step
----------------------------------------------------------------------
--c : schema create, --u : schema update , --all : generate all table ,
name : file name ,  table : table generate , value : step rollback 
----------------------------------------------------------------------\n";

echo "continue...\n";
$this->listener->on();
$a  = $this->listener->get();

echo "
example :

- create file migration (empty), file name mysample 

migrate:create mysample




- create file migration with Schema Create Table, file name mysample 

migrate:--c mysample sys_menu




- create file migration with Schema Update Table, file name mysample 

migrate:--u mysample sys_menu



";

echo "continue...\n";
$this->listener->on();
$a  = $this->listener->get();


echo "


- create file migration with Schema create Table
for all table in database, file name mysample 

migrate:--all mysample




- rollback all migrate

migrate:rollback




- rollback 3 step

migrate:rollback --step=3



---------------------------------------------------------------------- 
";		
	
	
	
	
	
}


public function show_error_command(){
	echo "your command not valid !";
}


private function show_logo(){
echo "
#######################################################################
 __   __ ____  ____    ____               _                   	
 \ \ / /| __ )/ ___|  / ___|  _   _  ___ | |_  ___  _ __ ___  	
  \ V / |  _ \\___ \  \___ \ | | | |/ __|| __|/ _ \| '_ ` _ \ 	
   | |  | |_) |___) |  ___) || |_| |\__ \| |_|  __/| | | | | |	
   |_|  |____/|____/  |____/  \__, ||___/ \__|\___||_| |_| |_|
                              |___/         					
#######################################################################";
}	




	
}	