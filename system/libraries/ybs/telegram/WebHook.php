<?php
namespace ybs\telegram;
use ybs\telegram\BotManager;

include_once "BotManager.php";



class WebHook extends BotManager{


	public $request;	
	public $service;


	
	public function __construct(){
		parent::__construct();
		
		$req =  file_get_contents("php://input");
		$req =  json_decode($req,TRUE);
		
		$this->request = array();
		$this->request["first_name"] 	= $req['message']['chat']['first_name'];
		$this->request["last_name"] 	= $req['message']['chat']['last_name'];
		$this->request["chat_id"] 		= $req['message']['chat']['id'];
		$this->request["message"] 		= $req['message']['text'];
		$this->request["all"]			= $req;
	
		$a = get_class($this);
		$this->getService($a);
		
		if($this->_TEST_CODE==true){
				$this->test();
		}else{
				$this->run();
		}
		
	}
	
	
	private function run(){

		if($this->service['command'])
		foreach($this->service['command'] as $cmd ){
			$command = "/".$cmd['name'];
		
			if($command==$this->request['message']){
				
				//mengirimkan pesan ke bot yang terdaftar walaupun di akses oleh berbeda device
				//karena menggunakan $this->request['chat_id']
				$this->action(	$command,$cmd['message'],
								$this->service['bot']['token'],
								$this->request['chat_id']
							  );
				break;
			}
		}
	}
	
	
	private function getService($token){
			
			$this->db->where("sys_bot_telegram_service.key",$token);
			$data  = $this->db->get("sys_bot_telegram_service")->result_array();
			
			if($data){
					 $id 		= $data[0]['id'];
					 $name 		= $data[0]['name'];
					 $bot	   	= $this->getBot($id);
					
					 $command 	= $this->getCommand($id);
					 
					 $this->service = array();
					 $this->service["name"] = $name;
					 $this->service["bot"]	  = $bot;
					 $this->service["command"] = $command;
					
					
					 
			}
		
			
			return $this;
	}
	
	
	private function getCommand($id_service){
			$this->db->select(array(
									"sys_bot_telegram_service_cmd.name",
									"sys_bot_telegram_service_cmd.descriptions",
									"sys_bot_telegram_service_cmd.message"
									));
									
			$this->db->where("sys_bot_telegram_service_cmd.id_service",$id_service);
			$data  = $this->db->get("sys_bot_telegram_service_cmd")->result_array();			
			return $data;
	}
	
	private function getBot($id_service){
			$this->db->select(array(
									"sys_bot_telegram_register.name",
									"sys_bot_telegram_register.token",
									"sys_bot_telegram_register.chat_id"
									));							
			$this->db->join("sys_bot_telegram_register", "sys_bot_telegram_register.id=sys_bot_telegram_webhook.id_bot","LEFT");	
			$this->db->where("sys_bot_telegram_webhook.id_service",$id_service);								
			$data  = $this->db->get("sys_bot_telegram_webhook")->result_array();

			if($data){
				return $data[0]; 
			}								
			return NULL;
	}
	

	
	
	
	
	
	
	
	
	
	
}

