<?php
namespace ybs\cli;


if (!defined('cli'))
    exit('No direct script access allowed');


require_once(BASEPATH.'database/DB.php');


class dbloader{
	
	
	public $db;
	public $dbforge;
	
	public function __construct(){
		$db =& DB("", TRUE,NULL);
		
		require_once(BASEPATH.'database/DB_forge.php');
		require_once(BASEPATH.'database/drivers/'.$db->dbdriver.'/'.$db->dbdriver.'_forge.php');

		if ( ! empty($db->subdriver))
		{
			$driver_path = BASEPATH.'database/drivers/'.$db->dbdriver.'/subdrivers/'.$db->dbdriver.'_'.$db->subdriver.'_forge.php';
			if (file_exists($driver_path))
			{
				require_once($driver_path);
				$class = 'CI_DB_'.$db->dbdriver.'_'.$db->subdriver.'_forge';
			}
		}
		else
		{
			$class = 'CI_DB_'.$db->dbdriver.'_forge';
		}


		$dbforge = new $class($db);
		
		
		$this->dbforge = $dbforge;
		$this->db = $db;
		
	}
	
	

	
	
}