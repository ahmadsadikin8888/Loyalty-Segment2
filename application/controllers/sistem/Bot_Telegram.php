<?php
require APPPATH. '/controllers/sistem/Bot_Telegram_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('sys/Bot_Telegram_Register','tmodel');
		$this->log_key ='log_RegisterBot_Telegram';
		$this->title = new Bot_Telegram_config();
   }


	public function index(){
		$data = array(
			'title_page_big'		=> 'Bot Telegram',
			'link_register_bot'		=> site_url()."sistem/Bot_Telegram/Register_Bot",
			'link_create_service'	=> site_url()."sistem/Bot_Telegram_Service",
			'link_bot_command'		=> site_url()."sistem/Bot_Telegram_Service_CMD",
			'link_webhook'			=> site_url()."sistem/Bot_Telegram_WebHook",
			'link_bot_admin'		=> site_url()."sistem/Bot_Telegram_Admin",
		);
		
		$this->template->load('sistem/bot_manager/Telegram_menu',$data);
	}
	
	
	public function Register_Bot(){
		$data = array(
			'title_page_big'		=> 'Register Bot',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/Bot_Telegram/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'sistem/Bot_Telegram/create',
			'link_delete'			=> site_url().'sistem/Bot_Telegram/delete_multiple',
			'link_register_bot'		=> site_url()."sistem/Bot_Telegram/Register_Bot",
			'link_create_service'	=> site_url()."sistem/Bot_Telegram_Service",
			'link_bot_command'		=> site_url()."sistem/Bot_Telegram_Service_CMD",
			'link_webhook'			=> site_url()."sistem/Bot_Telegram_WebHook",
			'link_bot_admin'		=> site_url()."sistem/Bot_Telegram_Admin",
		);
		
		$this->template->load('sistem/bot_manager/Telegram_bot_list',$data);
	}

	public function refresh_table($token){
		if($token==$this->_token){
			$row = $this->tmodel->json();
			
			//encode id 
			$tm = time();
			$this->session->set_userdata($this->log_key,$tm);
			$x = 0;
			foreach($row['data'] as $val){
				$idgenerate = _encode_id($val['id'],$tm);
				$row['data'][$x]['id'] = $idgenerate;
				
				$x++;
			}
			
			$o = new Outputview();
			$o->success	= 'true';
			$o->serverside	= 'true';
			$o->message	= $row;
			
			echo $o->result();
			

		}else{
			redirect('Auth');
		}
	}

	public function create(){
		$data = array(
			'title_page_big'		=> 'Buat Baru',
			'title'					=> $this->title,
			'link_save'				=> site_url().'sistem/Bot_Telegram/create_action',
			'link_back'				=> $this->agent->referrer(),			
		);
		
		$this->template->load('sistem/bot_manager/Telegram_bot_register',$data);

	}

	public function create_action(){
		$data 	= $this->input->post('data_ajax',true);
		$val	= json_decode($data,true);
		$o		= new Outputview(); 

		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/	

		//mencegah data kosong
		if(!$o->not_empty($val['token'],'#token')){
			echo $o->result();	
			return;
		}
		

		//mencegah data double
		$field=array('token'=>$val['token']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#token')){
			echo $o->result();	
			return;
		}


	
		$tel = $this->YbsTelegram;
		$tel->setToken($val['token']);
		
		$c = $tel->getMe();
	
		
		if($c==false){
			$o->success = "false";
			$o->message = $tel->getErrorMessage();
			echo $o->result();	
			return;
		}else{
			$val['name'] 	= 	$c['result']['username'];
		}
		
		
		$c = $tel->getChat_id();
		
		if($c==false){
			$o->success = "false";
			$o->message =  $tel->getErrorMessage;
			echo $o->result();	
			return;
		}else if($c=='null'){
			$o->success = "false";
			$o->message ="Proses Gagal ,buka bot anda terlebih dahulu,lalu tekan /start";
			echo $o->result();	
			return;	
		}else{
			$val['chat_id'] 	= 	$c;
		}
	
		$jam = date('H:i:s'); 
		$tangggal = date('d M Y');
		$site 	= site_url();
	
		$dd  = "
<b>YBS NOTIFICATION SYSTEM</b>
<code>Registration bot</code>
<code>DATE         : $tangggal</code> 
<code>TIME         : $jam</code>
<code>status       : success</code>

<code>REGISTER     :</code>
<a href='$site' >$site</a> 


";
		$tel->sendMessage($dd);
		
		
		
		
		
		unset($val['id']);
	
		$success = $this->tmodel->insert($val);
		
		
		
		echo $o->auto_result($success);

	}

	
	
	

	public function delete_multiple(){
		$data=$this->input->get('data_ajax',true);
		$val=json_decode($data,true);
		$data = explode(',',$val['data_delete']);

		//get key generate
		$log_id = $this->session->userdata($this->log_key);
		$xx=0;
		foreach($data as $value){
			$value =  _decode_id($value,$log_id);
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;	
		}
		
		$success = $this->tmodel->delete_multiple($data);
		
		$o = new Outputview();
		
		//create message
		if($success){
			$o->success 	= 'true';
			$o->message	= 'Data berhasil di hapus !';
		}else{
			$o->success 	= 'false';
			$o->message	= 'Opps..Gagal menghapus data !!';
		}
		
		
		echo $o->result();
	
	}

	

	
	
	

};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2019-12-05 13:10:23 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

