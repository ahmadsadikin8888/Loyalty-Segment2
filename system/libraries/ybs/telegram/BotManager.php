<?php
namespace ybs\telegram;


if (!defined('Connector'))
    exit('No direct script access allowed');




include_once "Model.php";

use ybs\telegram\Model;


class BotManager extends Model{
	
	private $URL_BOT  				= "https://api.telegram.org/bot";
	private $MTD_GET_ME 			= "/getMe"; 
	private $MTD_GET_UPDATES 		= "/getUpdates";
	private $MTD_INFO_WEBHOOK		= "/getWebHookInfo";
	private $MTD_DELETE_WEBHOOK		= "/deleteWebHook";
	private $MTD_SET_WEBHOOK		= "/setWebHook?url=";
	private $MTD_SEND_MESSAGE		= "/sendMessage?chat_id=";
	
	private $TOKEN					= "";
	private $CHAT_ID				= "";
	private $ERROR_MESSAGE			= "";
	
	public function __construct(){
		parent::__construct();
	}
	

	
	public function sendMessage($data,$token=null,$chat_id=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			

			$data = urlencode($data);            
			$data = htmlentities($data);
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_SEND_MESSAGE . $this->CHAT_ID . "&text=" .$data ."&parse_mode=HTML";
			$c 	  = file_get_contents($url);
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	public function sendMessageToAdmin($message,$admin_bot_name){
		
		$admin = $this->getBotAdminInfo($admin_bot_name);
		
		foreach($admin as $v){
		
			$success = $this->sendMessage($message,$v["token"],$v["chat_id"]) ;
			if(!$success){
				return false;
				break;
			}
		
		}
		return true;
		
	}
	
	
	
	public function getMe(){
		$c;
		
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		
		try{
		$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_ME);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		//restore throw
		$this->close_error_trap();
		
		if($c==false){
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			return $cc;
		}
	}
	
	public function getUpdates(){
		$c;
		
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		
		try{
			$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_UPDATES);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		
		//restore throw
		$this->close_error_trap();
		
		
		
		if($c==false){
			$c=false;
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			return $cc;
		}
	}
	

	
	
	
	
	public function getChat_id(){
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		$c;
		try{
			$hook = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_INFO_WEBHOOK);
			$hook = json_decode($hook,TRUE);
			$url = $hook['result']['url'];
			
			if($url==""){
				$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_UPDATES);
			}else{
				$d = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_DELETE_WEBHOOK);
				return 'null';
			}
			
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		
		//restore throw
		$this->close_error_trap();
		
		if($c==false){
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			if(!empty($cc)){
				$result = $cc['result'];
				if(empty($result)){
					return 'null';
				}else{
					$id = $result[0]['message']['chat']['id'];
					$this->CHAT_ID = $id;
					return $id;
				}
				
				
				
			}else{
				return false;
			}
			
		}
	
	}
	
	
	public function setWebHook($url=""){
		$this->open_error_trap();
		$c;
		try{

			$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_SET_WEBHOOK . $url);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	public function getWebHookInfo(){
		$this->open_error_trap();
		$c;
		try{

			$hook 	= file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_INFO_WEBHOOK);
			$hook 	= json_decode($hook,TRUE);
			$url 	= $hook['result'];
			$c 		= $url;
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	

	private function open_error_trap(){
		set_error_handler(
			function($s,$m,$f,$l){
				throw new \ErrorException($m,$s,$s,$f,$l);
			}
		);
	}
	
	private function close_error_trap(){
		restore_error_handler();
	}
	
	public function getErrorMessage(){
		$message = "";
		switch($this->ERROR_MESSAGE){
			case "file_get_contents(): php_network_getaddresses: getaddrinfo failed: No such host is known. " :
				$message ="no connection !..check your connection or your host!";
			break;

			
			default :
			$message =$this->ERROR_MESSAGE;
		}
		
		
		return $message;
	}
	
	
	public function setToken($token,$chat_id=""){
		$this->TOKEN = $token;
		$this->CHAT_ID = $chat_id;
	}
	
	
	
	public function getToken(){
		return $this->TOKEN;
	}
	
	


	
	
}