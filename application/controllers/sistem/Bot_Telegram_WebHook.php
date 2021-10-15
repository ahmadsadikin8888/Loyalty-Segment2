<?php
require APPPATH. '/controllers/sistem/Bot_Telegram_WebHook_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_WebHook extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('sys/Bot_Telegram_WebHook_model','tmodel');
		$this->log_key ='log_Bot_Telegram_WebHook';
		$this->title = new Bot_Telegram_WebHook_config();
   }


	public function index(){
		$data = array(
			'title_page_big'		=> 'Set & Run Service',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/Bot_Telegram_WebHook/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'sistem/Bot_Telegram_WebHook/create',
			'link_update'			=> site_url().'sistem/Bot_Telegram_WebHook/update',
			'link_delete'			=> site_url().'sistem/Bot_Telegram_WebHook/delete_multiple',
			'link_send_command'		=> site_url().'sistem/Bot_Telegram_WebHook/send_command',
			'link_start_stop'		=> site_url().'sistem/Bot_Telegram_WebHook/start_stop_service',
			'link_register_bot'		=> site_url()."sistem/Bot_Telegram/Register_Bot",
			'link_create_service'	=> site_url()."sistem/Bot_Telegram_Service",
			'link_bot_command'		=> site_url()."sistem/Bot_Telegram_Service_CMD",
			'link_webhook'			=> site_url()."sistem/Bot_Telegram_WebHook",
			'link_bot_admin'		=> site_url()."sistem/Bot_Telegram_Admin",
		);
		
		$this->template->load('sistem/bot_manager/Telegram_WebHook_list',$data);
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
				
				if($val['name']=="" || $val['name']==null){
					$row['data'][$x]['name'] = '<span class="tag tag-red" style="font-size:10px">has been remove !</span>';
				}
				
				if($val['tbot_name']=="" ||$val['tbot_name']==null ){
					$row['data'][$x]['tbot_name'] = '<span class="tag tag-red" style="font-size:10px">has been remove !</span>';
				}
				
				
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
			'link_save'				=> site_url().'sistem/Bot_Telegram_WebHook/create_action',
			'link_back'				=> $this->agent->referrer(),			
		);
		
		$this->template->load('sistem/bot_manager/Telegram_WebHook_form',$data);

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
		if(!$o->not_empty($val['id_service'],'#id_service')){
			$o->message = "Service belum di pilih..!";
			echo $o->result();	
			return;
		}

		

		//mencegah data kosong
		if(!$o->not_empty($val['id_bot'],'#id_bot')){
			$o->message = "Bot belum di pilih..!";
			echo $o->result();	
			return;
		}

		
		//mencegah data double
		$field=array('id_bot'=>$val['id_bot']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#id_bot')){
			$o->message = "opps..bot sudah di gunakan, max 1 bot 1 service";
			echo $o->result();	
			return;
		}

		
		

		unset($val['id']);
		$val['start'] = 0;
		$success = $this->tmodel->insert($val);
		
	
		
		
		echo $o->auto_result($success);

	}
	


	public function update($id){
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		/** proses decode id 
		* important !! tempdata digunakan sbagai antisipasi
		* perubahan session saat membuka tab baru secara bersamaan
		**/
		$this->log_temp	= $this->session->userdata($this->log_key);
		$this->session->set_tempdata($id,$this->log_temp,300);
		
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		
		$row = $this->tmodel->get_by_id($id);
		
		if($row){
			$data = array(
				'title_page_big'		=> 'Buat Baru',
				'title'					=> $this->title,
				'link_save'				=> site_url().'sistem/Bot_Telegram_WebHook/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			$this->template->load('sistem/bot_manager/Telegram_WebHook_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	public function start_stop_service($id){
		$o = new Outputview();
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		$this->log_temp	= $this->session->userdata($this->log_key);
	
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		
		
		
		$data_hook = $this->tmodel->get_by_id($id);
		
		if($data_hook){
			
			$this->load->model("sys/Bot_Telegram_Register","tbot");
			$data_bot = $this->tbot->get_by_id($data_hook->id_bot);
			if($data_bot == null){
					$o->success ="false";
					$o->message ="Opps..tidak dapat di proses ,bot telah di hapus !";
					echo $o->result();
					return;
			}
			
			$bot = $this->YbsTelegram; 
			$bot->setToken($data_bot->token,$data_bot->chat_id);
			
			if($data_hook->start==0){
				$this->load->model("sys/Bot_Telegram_Service_model","tservice");
				$d = $this->tservice->get_by_id($data_hook->id_service); 
				//start webhook
				$urlhook = base_url(). "bot.php/telegram/" . $d->key ;
										
				if(strpos($urlhook,"https") === false){
					$o->success ="false";
					$o->message ="<b>WARNING : URL HARUS HTTPS</b> <br> your url : <br>" . base_url();
					echo $o->result();
					return;
				}
				
				$success = $bot->setWebHook($urlhook);
				
				if($success){
					
					$val = array("start"=>1);
					
					$this->tmodel->update($id,$val);
					
					$o->success ="redirect";
					$o->message = site_url() . "sistem/Bot_Telegram_WebHook" ;
					$this->session->set_flashdata('redirect_success','Service di jalankan');
					echo $o->result();
					return;
				}else{
					$o->success ="false";
					$o->message =$bot->getErrorMessage();
					echo $o->result();
					return;
				}
				
			}else{
				$success = $bot->setWebHook("");
				if($success){
					$val = array("start"=>0);
					$this->tmodel->update($id,$val);
					
					$o->success ="redirect";
					$o->message = site_url() . "sistem/Bot_Telegram_WebHook" ;
					$this->session->set_flashdata('redirect_success','Service di hentikan');
					echo $o->result();
					return;
				}else{
					$o->success ="false";
					$o->message =$bot->getErrorMessage();
					echo $o->result();
					return;
				}
			}
			
			
			
			
			
			
			
			$o->success ="true";
			$o->message ="test";
			echo $o->result();
			return;
		}
		
	
		$o->success ="false";
		$o->message ="Opps..data tidak valid";
		echo $o->result();
		
		
	}
	
	public function send_command($id){
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		$this->log_temp	= $this->session->userdata($this->log_key);
	
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		
		$row = $this->tmodel->get_by_id($id);
		
		if($row->tbot_name=="" ||$row->tbot_name==NULL){
			$this->session->set_flashdata("redirect_failed","Opps..tidak dapat di proses ,bot telah di hapus !");
			redirect(site_url().'sistem/Bot_Telegram_WebHook');
		}
		
		if($row->tservice_id=="" ||$row->tservice_id==NULL){
			$this->session->set_flashdata("redirect_failed","Opps..tidak dapat di proses ,service telah di hapus !");
			redirect(site_url().'sistem/Bot_Telegram_WebHook');
		}
		$this->load->model("sys/Bot_Telegram_Service_CMD_model","cmdModel");
		
		$cmd = $this->cmdModel->get_by_service($row->tservice_id);
		
		$d="";
		foreach($cmd as $val){
			$d  .= $val['name'] ." - ". $val['descriptions'] ."\n";
		}
		
		if($d==""){
			$this->session->set_flashdata("redirect_failed","Command Masih kosong..");
			redirect(site_url().'sistem/Bot_Telegram_WebHook');
			return;
		}
		
		
		$bot = $this->YbsTelegram;
		$bot->setToken($row->token,$row->chat_id);
		
		$mybot= $row->tbot_name;
		
		$m ="<b>YBS NOTIFICATION SYSTEM</b>\n<code>Update Command</code>\n\n<b>Buka BotFather</b> <code>\n/mybot &gt  $mybot &gt Edit bot &gt Edit Commands \n\nkemudian copy perintah berikut :</code>	
		";
	
		$bot->sendMessage($m);
		
		$bot->sendMessage($d);
		
		
		
		$this->session->set_flashdata("redirect_success","Command Telah di kirim ke bot");
		
		redirect(site_url().'sistem/Bot_Telegram_WebHook');
	}

	public function update_action(){
		$data 	= $this->input->post('data_ajax',true);
		$val	= json_decode($data,true);
		$this->log_temp		= $this->session->tempdata($val['id']);
		$val['id']				= _decode_id($val['id'],$this->log_temp);
		
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
		if(!$o->not_empty($val['id_service'],'#id_service')){
			$o->message = "Service belum di pilih..!";
			echo $o->result();	
			return;
		}

	

		//mencegah data kosong
		if(!$o->not_empty($val['id_bot'],'#id_bot')){
			$o->message = "Bot belum di pilih..!";
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('id_bot'=>$val['id_bot']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#id_bot')){
			$o->message = "opps..bot sudah di gunakan, max 1 bot 1 service";
			echo $o->result();	
			return;
		}


		$success = $this->tmodel->update($val['id'],$val);
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
/* Generated by YBS CRUD Generator 2019-12-22 21:04:07 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

