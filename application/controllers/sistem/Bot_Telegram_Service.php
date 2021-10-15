<?php
require APPPATH. '/controllers/sistem/Bot_Telegram_Service_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_Service extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('sys/Bot_Telegram_Service_model','tmodel');
		$this->log_key ='log_Bot_Telegram_Service';
		$this->title = new Bot_Telegram_Service_config();
   }


	public function index(){
		$data = array(
			'title_page_big'		=> 'Create Service',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/Bot_Telegram_Service/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'sistem/Bot_Telegram_Service/create',
			'link_update'			=> site_url().'sistem/Bot_Telegram_Service/update',
			'link_delete'			=> site_url().'sistem/Bot_Telegram_Service/delete_multiple',
			'link_register_bot'		=> site_url()."sistem/Bot_Telegram/Register_Bot",
			'link_create_service'	=> site_url()."sistem/Bot_Telegram_Service",
			'link_bot_command'		=> site_url()."sistem/Bot_Telegram_Service_CMD",
			'link_webhook'			=> site_url()."sistem/Bot_Telegram_WebHook",
			'link_bot_admin'		=> site_url()."sistem/Bot_Telegram_Admin",
		
		);
		
		$this->template->load('sistem/bot_manager/Telegram_Service_list',$data);
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
			'link_save'				=> site_url().'sistem/Bot_Telegram_Service/create_action',
			'link_back'				=> $this->agent->referrer(),			
		);
		
		$this->template->load('sistem/bot_manager/Telegram_Service_form',$data);

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
		if(!$o->not_empty($val['name'],'#name')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('name'=>$val['name']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#name')){
			echo $o->result();	
			return;
		}
		
		$this->load->helper("string");
		
		//create name folder
		$folder_name = _generate(random_string("alnum",20).time());
		
		$file_name = _generate($folder_name.time());
		
		
		$this->load->model("sys/Template_bot_telegram_hook","thok");
		
		
		$this->thok->create_file("Telegram_".$file_name, APPPATH . "bot/telegram",$val['name']);
		
		
		$val['key'] = "Telegram_".$file_name;
		unset($val['id']);
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
				'link_save'				=> site_url().'sistem/Bot_Telegram_Service/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			$this->template->load('sistem/bot_manager/Telegram_Service_form_update',$data);
		}else{
			redirect($this->agent->referrer());
		}
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
		if(!$o->not_empty($val['name'],'#name')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('name'=>$val['name']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#name')){
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
			$old_data = $this->tmodel->get_by_id($value);
			$file_name = $old_data->key . ".php";
			
			if(file_exists(APPPATH . "bot/telegram/$file_name")){
				unlink(APPPATH . "bot/telegram/$file_name");
			}
			
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
/* Generated by YBS CRUD Generator 2019-12-14 21:25:19 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

