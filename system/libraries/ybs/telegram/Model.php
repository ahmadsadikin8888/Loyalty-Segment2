<?php
namespace ybs\telegram;



if (!defined('Connector'))
    exit('No direct script access allowed');



include_once BASEPATH . "libraries/ybs/cli/dbloader.php";
use ybs\cli\dbloader;

class Model extends dbloader{
	
	public function __construct(){
		parent::__construct();
	}

	
	public function getBotAdminInfo($admin_bot_name){
		$field = array("sys_bot_telegram_register.*");
		$this->db->select($field);
		$this->db->where_in("sys_bot_telegram_admin_system.name",$admin_bot_name);
		$this->db->where("sys_bot_telegram_register.token <>",null);
		$this->db->join("sys_bot_telegram_register","sys_bot_telegram_register.id=sys_bot_telegram_admin_system.id_bot","LEFT");
		$admin = $this->db->get("sys_bot_telegram_admin_system")->result_array();
		return $admin;
		
	}
	
}	