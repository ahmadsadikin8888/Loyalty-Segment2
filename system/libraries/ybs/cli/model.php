<?php 
namespace ybs\cli;
use ybs\cli\dbloader;

if (!defined('cli'))
    exit('No direct script access allowed');

require_once('dbloader.php');



class model extends dbloader{
	
	public function __construct(){
		parent :: __construct();
	}
	

}