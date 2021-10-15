<?php 
class Profile extends CI_Controller { 

	public function __construct() {
		parent::__construct();
	}

	public function setting(){
		$data = array();
		$data['title_page_big'] = 'Setting Profile';
		$data['nmuser']			= $this->_user_name;
		$data['link_update']	= site_url().'sistem/Profile/update/'.$this->_token;
		$data['link_check']		= site_url().'sistem/Profile/check/'.$this->_token;
		
		$this->template->load('sistem/Setting_profile',$data);
	}
	
	
	public function update($token){
		if($token ==$this->_token){
			$data 	= $this->input->post('data_ajax',true);
			$val	= json_decode($data,true);
		
			$o = new Outputview();
			if($val['new_pass']==''){
				$o->success 	= 'false';
				$o->message		= 'Opss..password baru belum di isi ! ';
				$o->elementid   = '#new-pass';
				echo $o->result();
				return;
			}

			if($val['re_pass']==''){
				$o->success		= 'false';
				$o->message		= 'Opss..konfirmasi password baru belum di isi ! ';
				$o->elementid	= '#re-pass';
				echo $o->result();
				return;
			}

			if($val['re_pass'] !==$val['new_pass']){
				$o->success		= 'false';
				$o->message		= 'Opss..password tidak sama';
				$o->elementid	= '#new-pass';
				echo $o->result();
				return;
			}		
			
			$this->load->model('sys/Sys_user_model','tuser');
			
			$pass = _generate($val['new_pass']);
			$d= array('passuser'=>$pass);
			
			$success  = $this->tuser->update_pass($this->_user_id,$d);
			
			if($success){
				$o->success 	= 'true';
				$o->message		= 'password berhasil di update';
				$o->elementid	= '';
				echo $o->result();
			}else{
				$o->success 	= 'false';
				$o->message		= 'Opps..gagal mengupdate password';
				$o->elementid	= '#new-pass';
				echo $o->result();
			}
		}else{
			redirect('Auth');
		}
	}
	
	public function check($token){
		if($token==$this->_token){
			$data 	= $this->input->post('data_ajax',true);
			$val	= json_decode($data,true);
		
			$o = new Outputview();
			if($val['old_pass']==''){
				$o->success 	= 'false';
				$o->message		= 'Opss..Password belum di isi ! ';
				echo $o->result();
				return;
			}		
		
			$this->load->model('sys/Authorization','auth');
			$pass = _generate($val['old_pass']);
			
			$d = array('nmuser'=>$this->_user_name,'passuser'=>$pass);
			$valid = $this->auth->is_valid_password($d);
			if(!$valid){
				$o->success 	= 'false';
				$o->message		= 'Opss..Password tidak sesuai';
				echo $o->result();
				return;
			}
			
			$o->success 	= 'true';
			$o->message		= '';
			echo $o->result();
			return;
		}else{
			redirect('Auth');
		}
	}

} 